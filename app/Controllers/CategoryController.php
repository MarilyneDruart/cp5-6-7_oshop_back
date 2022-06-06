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
        $this->show('category/add');
    }

    /**
     * Ajout d'une catégorie
     */
    public function store()
    {
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
            // On créé une nouvelle catégorie
            $category = new Category();

            // On fixe des valeurs pour nos propriétés
            $category->setName(htmlspecialchars($name));
            $category->setSubtitle(isset($subtitle) ? htmlspecialchars($subtitle) : null);
            $category->setPicture(isset($picture) ? htmlspecialchars($picture) : null);

            // On teste si l'insertion dans la table s'est bien passée
            if ($category->insert()) {
                global $router;
                header('Location: ' . $router->generate('category-list'));
                return;
            } else {
                $errors[] = 'Echec lors de l\'enregistrement';
            }
        }

        $this->show('category/add', [
            'errors' => $errors,
        ]);
    }

    /**
     * Formulaire de modification d'une catégorie
     */
    public function update(int $id)
    {
        $category = Category::find($id);
        $this->show('category/[i:id]/edit', ['category' => $category]);
    }

    /**
     * Modification d'une catégorie
     */
    public function edit(int $id)
    {
        extract($_GET, EXTR_SKIP);

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
            // On met à jour la catégorie
            $category = new Category();

            // On fixe des valeurs pour nos propriétés
            $category->setName(htmlspecialchars($name));
            $category->setSubtitle(isset($subtitle) ? htmlspecialchars($subtitle) : null);
            $category->setPicture(isset($picture) ? htmlspecialchars($picture) : null);

            // On teste si l'insertion dans la table s'est bien passée
            if ($category->update()) {
                global $router;
                header('Location: ' . $router->generate('category-list'));
                return;
            } else {
                $errors[] = 'Echec lors de l\'enregistrement';
            }
        }

        $this->show('category/edit', [
            'errors' => $errors,
        ]);

        $categories = Category::findAll();
        $this->show('category/edit', [
            'categories' => $categories,
        ]);
    }
}
