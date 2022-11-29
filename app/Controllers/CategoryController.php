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
        // Instanciation de la classe Category
        $categoryClass = new Category();

        // Je récupère toutes les catégories grâce à la méthode findAll du model Category.
        $categoryList = $categoryClass->findAll();
        $this->show('category/category_list', [
            'categoryList' => $categoryList
        ]);
    }

    public function categoryAdd() {

        $this->show('category/category_add');
    }

    
}