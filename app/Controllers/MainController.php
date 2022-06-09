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
        //$this->checkAuthorization(['admin', 'catalog-manager']); remplacé dans CoreController

        $categories = Category::findTheFirstThree();
        $products = Product::findTheFirstThree();

        $this->show('main/home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function shopHome()
    {        
        $this->show('/shop/home');
    }

    public function shopHomeEdit()
    {

        $categories = Category::findAllHomepage();

        if (!$categories) {
            $error = new ErrorController();
            $error->err404();
            return;
        }

        
        $this->show('/shop/home', [
            'categories' => $categories,
        ]);
    }
}
