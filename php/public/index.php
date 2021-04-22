<?php
require '../vendor/autoload.php';

$router = new AltoRouter();

include_once("app/router/router.php");

$match = $router->match();
if ($match != false)
{
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$match["target"]($match['params']['productId'] ?? '');
	}
	else {
		require_once("../app/Views/Inc/header.php");
		$match["target"]($match['params']['productId'] ?? '');
		require_once("../app/Views/Inc/footer.php");
	}
}
else
{
	require_once("../app/Views/Errors/404.php");
	header("Refresh: 5;URL=../products");
}

