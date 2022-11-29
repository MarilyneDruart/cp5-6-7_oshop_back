<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class ProductController extends CoreController
{
    /**
     * Listing des produits
     */
    public function list()
    {
        //$this->checkAuthorization(['admin', 'catalog-manager']); remplacé dans CoreController

        $products = Product::findAll();
        $this->show('product/list', [
            'products' => $products,
        ]);
    }

    /**
     * Formulaire d'ajout d'un produit
     */
    public function add()
    {
        //$this->checkAuthorization(['admin', 'catalog-manager']); remplacé dans CoreController

        $categories = Category::findAll();
        $brands = Brand::findAll();
        $types = Type::findAll();
        $this->show('product/add', [
            'categories' => $categories,
            'brands' => $brands,
            'types' => $types,
        ]);
    }

    /**
     * Ajout d'un produit
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
        if (isset($description) && !empty($description) && (!is_string($description) || strlen($description) < 3)) {
            $errors[] = 'La description est invalide';
        }

        // $picture est optionnel
        if (isset($picture) && !empty($picture) && (!is_string($picture) || strlen($picture) < 3)) {
            $errors[] = 'L\'image est invalide';
        }

        if (!isset($price) || !filter_var($price, FILTER_VALIDATE_FLOAT)) {
            $errors[] = 'Le prix est invalide';
        }

        if (!isset($status) || !in_array($status, [1, 2])) {
            $errors[] = 'Le statut est invalide';
        }

        if (!isset($category) || !filter_var($category, FILTER_VALIDATE_INT)) {
            $errors[] = 'La catégorie est invalide';
        }

        if (!isset($brand) || !filter_var($brand, FILTER_VALIDATE_INT)) {
            $errors[] = 'La marque est invalide';
        }

        if (!isset($type) || !filter_var($type, FILTER_VALIDATE_INT)) {
            $errors[] = 'Le type est invalide';
        }

        if (!$errors) {
            $product = $forUpdate ? Product::find($id) : new Product();

            $product->setName(htmlspecialchars($name));
            $product->setDescription(isset($description) ? htmlspecialchars($description) : null);
            $product->setPicture(isset($picture) ? htmlspecialchars($picture) : null);
            $product->setPrice($price);
            $product->setRate(0);
            $product->setStatus($status);
            $product->setBrandId($brand);
            $product->setCategoryId($category);
            $product->setTypeId($type);

            if ($product->save()) {
                global $router;
                $redirect = $forUpdate ? $router->generate('product-edit', ['id' => $product->getId()]) : $router->generate('product-list');
                header('Location: ' . $redirect);
                return;
            } else {
                $errors[] = 'Echec lors de l\'enregistrement';
            }
        }

        $categories = Category::findAll();
        $brands = Brand::findAll();
        $types = Type::findAll();

        if ($forUpdate) {
            $this->show('product/edit', [
                'errors' => $errors,
                'categories' => $categories,
                'brands' => $brands,
                'types' => $types,
                'product' => Product::find($id),
            ]);
        } else {
            $this->show('product/add', [
                'errors' => $errors,
                'categories' => $categories,
                'brands' => $brands,
                'types' => $types,
            ]);
        }
    }

    public function edit($id)
    {
        //$this->checkAuthorization(['admin', 'catalog-manager']); remplacé dans CoreController

        $product = Product::find($id);

        if (!$product) {
            $error = new ErrorController();
            $error->err404();
            return;
        }

        $categories = Category::findAll();
        $brands = Brand::findAll();
        $types = Type::findAll();

        $this->show('product/edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'types' => $types,
        ]);
    }
}
