<?php

namespace App\Controllers;

use App\Models\Products;

class ProductsController
{
    public function __construct()
    {
        $products = new Products('https://fakestoreapi.com/products');
        if (is_object($products))
        {
            $products = $products->products;
            require_once("../app/Views/Products/products.php");
        }
    }
}