<?php
require '../vendor/autoload.php';

$router = new AltoRouter();

include_once("app/router/router.php");

$match = $router->match();
if ($match != false)
{
	if($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['api'])) {
		$params = $match['params']['productId'] ??
					$match['params']['commentId'] ?? '';
		$match["target"]($params);
	}
	else {
		require_once("../app/Views/Inc/header.php");
		$params = $match['params']['productId'] ??
					$match['params']['commentId'] ?? '';
		$match["target"]($params);
		require_once("../app/Views/Inc/footer.php");
	}
}
else
{
	require_once("../app/Views/Errors/404.php");
	header("Refresh: 5;URL=../products");
}

