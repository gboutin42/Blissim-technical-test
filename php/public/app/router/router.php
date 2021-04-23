<?php
use App\Controllers\ProductsController;
use App\Controllers\CommentsController;
use App\Models\Db;

$router->map('GET', '/', function() {
	header("Location: /products");
});

$router->map('GET', '/install', function() {
	$db = new Db();
	$db->create();
	header("Refresh: 3;URL=../products");
});

$router->map('GET', '/products', function () {
	new ProductsController();
});

$router->map('GET', '/product-[i:productId]', function ($productId) {
	new ProductsController($productId);
});

$router->map('POST', '/add-comment-product-[i:productId]', function ($productId) {
	$comment = new CommentsController();
	return $comment->addComment($productId);
});

$router->map('POST', '/update-comment-[i:commentId]', function ($commentId) {
	$comment = new CommentsController();
	return $comment->updateComment($commentId);
});

$router->map('POST', '/delete-comment-product-[i:commentId]', function ($commentId) {
	$comment = new CommentsController();
	return $comment->deleteComment($commentId);
});

$router->map('POST', '/get-comments-product-[i:productId]', function ($productId) {
	$comment = new CommentsController();
	return $comment->getComments($productId);
});