<?php
require '../../vendor/autoload.php';
use App\Controllers\ProductsController;

$router = new AltoRouter();

$router->map('GET', '/', function() {
	header("Location: /products");
});

$router->map('GET', '/install', function() {
	require_once("../config/setup.php");
	header("Refresh: 3;URL=../products");
});

$router->map('GET', '/products', function () {
	new ProductsController();
});


$match = $router->match();
if ($match != false)
{
	require_once("../app/Views/Inc/header.php");
	$match["target"]();
	require_once("../app/Views/Inc/footer.php");
}
else
{
	require_once("../app/Views/Errors/404.php");
	header("Refresh: 5;URL=../products");
}

