<?php

namespace App\Controllers;

use App\Models\Products;

class ProductsController
{
    public function __construct($id = null)
    {
        if ($id != null)
            $this->getProductByid($id);
        else
            $this->getProductsList();
    }

    public function getProductsList()
    {
        $products = new Products('https://fakestoreapi.com/products');
        if (is_object($products))
        {
            $products = $products->products;
            require_once("../app/Views/Products/products.php");
        }
    }

    public function getProductByid($id)
    {
        $product = Products::getProductById('https://fakestoreapi.com/products', $id);
        $product = $product;
        require_once("../app/Views/Products/showProduct.php");
    }
}