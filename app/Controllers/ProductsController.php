<?php

namespace App\Controllers;

use App\Models\Product;

// Classe gérant les produits (listes et ajouts)
class ProductsController extends CoreController {
    /**
     * 
     * 
     */
    public function productsList() {
        // Instanciation de la classe Category (pas obligé d'utiliser la méthode en static comme dans CategoryController)
        $productClass = new Product();

        // Je récupère tous les produits grâce à la méthode findAll du model Product.
        $productList = $productClass->findAll();
        $this->show('products/products_list', [
            'productList' => $productList
        ]);
    }

    public function productsAdd() {

        $this->show('products/products_add');
    }

    
}