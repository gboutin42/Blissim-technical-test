<?php

namespace App\Models;

class Products
{
	public $products;

	public function __construct($url)
	{
		if ($url)
			$this->products = $this->getProductsByApi($url);
		else
			return "Wrong Api Url, please check the Api url.";
	}

	private function getProductsByApi($url)
	{
		if ($response = file_get_contents($url))
			return json_decode($response);
		return "No products found.";
	}
	
	public function getProduct($id)
	{
		$products = $this->getProductsByApi('https://fakestoreapi.com/products');
		foreach ($products as $product)
		{
			if ($product->id == $id)
				return $product;
		}
		return "Product not found.";
	}
}