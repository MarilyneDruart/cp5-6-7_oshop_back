<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

// Si j'ai besoin du Model Category
// use App\Models\Category;

class MainController extends CoreController
{
    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        $categories = Category::findTheFirstThree();
        $products = Product::findTheFirstThree();

        $this->show('main/home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
