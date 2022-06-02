<?php

namespace App\Controllers;

use App\Models\Category;

// Classe gérant les catégories (listes et ajouts)
class CategoryController extends CoreController {
    /**
     * 
     * 
     */
    public function categoryList() {
        // // Instanciation de la classe Category
        // $categoryClass = new Category();

        // // Je récupère toutes les catégories grâce à la méthode findAll du model Category.
        // $categoryList = $categoryClass->findAll();
        $categoryList = Category::findAll();

        $this->show('category/category_list', [
            'categoryList' => $categoryList
        ]);
    }

    public function categoryAdd() {

        $this->show('category/category_add');
    }

    public function categoryCreate() {

        $this->show('category/category_add');
        $name = $_POST ['categName'];
        $subtitle = $_POST ['categSubtitle'];
        $picture = $_POST ['categPicture'];
        
        //dump($_POST);

        if (!empty($_POST['categName']) && !empty($_POST['categSubtitle']) && !empty($_POST['categSubtitle'])) {
            $name = $_POST['categName'];
            $subtitle = $_POST['categSubtitle'];
            $picture = $_POST['categPicture'];
            // dump($name);
            // dump($subtitle);
            // dump($picture);

            // Pour insérer en DB, je crée d'abord une nouvelle instance du Model correspondant
            $post = new Category();

            // Puis je renseigne les valeurs pour chaque propriété correspondante dans l'instance.
            $post->setName($name);
            $post->setSubtitle($subtitle);
            $post->setPicture($picture);

            // En dernier, j'appelle la méthode du Model permettant d'ajouter en DB.
            $post->insert();
        }
    }
}