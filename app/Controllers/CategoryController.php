<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends CoreController
{
    /**
     * Listing des catégories
     */
    public function list()
    {
        //$this->checkAuthorization(['admin', 'catalog-manager']); remplacé dans CoreController

        // Appel statique à findAll()
        $categories = Category::findAll();
        $this->show('category/list', [
            'categories' => $categories,
        ]);
    }

    /**
     * Formulaire d'ajout d'une catégorie
     */
    public function add()
    {
        //$this->checkAuthorization(['admin', 'catalog-manager']); remplacé dans CoreController

        $this->show('category/add');
    }

    /**
     * Ajout d'une catégorie
     */
    public function store($id = null)
    {
        //$this->checkAuthorization(['admin', 'catalog-manager']); remplacé dans CoreController

        $forUpdate = isset($id);

        extract($_POST, EXTR_SKIP);

        $errors = [];

        // Intérêt d'utiliser isset() puis empty()
        // $_POST['name'] = "" => isset() = true / empty() = true

        // Si $name n'existe pas OU qu'il n'est pas une chaîne OU que la chaîne est < 3 caractères
        if (!isset($name) || !is_string($name) || strlen($name) < 3) {
            $errors[] = 'Le nom est invalide';
        }

        // $subtitle est optionnel
        if (isset($subtitle) && !empty($subtitle) && (!is_string($subtitle) || strlen($subtitle) < 3)) {
            $errors[] = 'Le sous-titre est invalide';
        }

        // $picture est optionnel
        if (isset($picture) && !empty($picture) && (!is_string($picture) || strlen($picture) < 3)) {
            $errors[] = 'L\'image est invalide';
        }

        // S'il n'y a pas d'erreurs
        if (!$errors) {
            // On créé/modifie la catégorie
            // Si forUpdate est faux : On créé une nouvelle catégorie en instanciant une nouvelle catégorie
            // et inserer les données ->insert
            // Si forUpdate est vrai: on utilise la méthode find($id) pour récup la catégorie ciblé
            // pour la mettre à jour ->update
            $category = $forUpdate ? Category::find($id) : new Category();

            // On fixe des valeurs pour nos propriétés
            $category->setName(htmlspecialchars($name));
            $category->setSubtitle(isset($subtitle) ? htmlspecialchars($subtitle) : null);
            $category->setPicture(isset($picture) ? htmlspecialchars($picture) : null);

            // On teste si l'insertion dans la table s'est bien passée
            if ($category->save()) {
                global $router;
                $redirect = $forUpdate ? $router->generate('category-edit', ['id' => $category->getId()]) : $router->generate('category-list');
                header('Location: ' . $redirect);
                return;
            } else {
                $errors[] = 'Echec lors de l\'enregistrement';
            }
        }

        if ($forUpdate) {
            $this->show('category/edit', [
                'errors' => $errors,
                'category' => Category::find($id),
            ]);
        } else {
            $this->show('category/add', [
                'errors' => $errors,
            ]);
        }
    }

    public function edit($id)
    {
        //$this->checkAuthorization(['admin', 'catalog-manager']); remplacé dans CoreController

        $category = Category::find($id);

        if (!$category) {
            $error = new ErrorController();
            $error->err404();
            return;
        }

        $this->show('category/edit', [
            'category' => $category,
        ]);
    }
}
