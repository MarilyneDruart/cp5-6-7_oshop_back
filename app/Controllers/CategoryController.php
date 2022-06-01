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
        $categoryObject = new Category;
        $categoryList = $categoryObject->findAll();

        $this->show('/category/category_list');
    }

    public function categoryAdd() {

        $this->show('/category/category_add');
    }

    
}