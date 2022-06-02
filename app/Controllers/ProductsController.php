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

    public function productCreate() {

        $this->show('products/products_add');
        $name = $_POST ['prodName'];
        $description = $_POST ['prodDescript'];
        $picture = $_POST ['prodPicture'];
        $price = $_POST ['prodPrice'];
        $status = $_POST ['prodStatus'];
        $category = $_POST ['prodCategory'];
        $brand = $_POST ['prodBrand'];
        $type = $_POST ['prodType'];

        
        //dump($_POST);

        if (!empty($_POST['prodName']) && !empty($_POST['prodDescript']) && !empty($_POST['prodPicture']) && !empty($_POST['prodPrice']) && !empty($_POST['prodStatus']) && !empty($_POST['prodCategory']) && !empty($_POST['prodBrand']) && !empty($_POST['prodType'])) {
            $name = $_POST['prodName'];
            $description = $_POST ['prodDescript'];
            $picture = $_POST ['prodPicture'];
            $price = $_POST ['prodPrice'];
            $status = $_POST ['prodStatus'];
            $category = $_POST ['prodCategory'];
            $brand = $_POST ['prodBrand'];
            $type = $_POST ['prodType'];

            dump($name);
            dump($description);
            dump($picture);
            dump($price);
            dump($status);
            dump($category);
            dump($brand);
            dump($type);

            // Pour insérer en DB, je crée d'abord une nouvelle instance du Model correspondant
            $post = new Product();

            // Puis je renseigne les valeurs pour chaque propriété correspondante dans l'instance.
            $post->setName($name);
            $post->setDescription($description);
            $post->setPicture($picture);
            $post->setPrice($price);
            $post->setStatus($status);
            $post->setCategoryId($category);
            $post->setBrandId($brand);
            $post->setTypeId($type);

            // En dernier, j'appelle la méthode du Model permettant d'ajouter en DB.
            $post->insert();
        }

    }
    
}