<?php

$DB_NAME		= "blissim_test_technique";
$DB_DSN_LIGHT	= "mysql:host=localhost:3306";
$DB_DSN			= $DB_DSN_LIGHT . ";dbname=" . $DB_NAME;
$DB_USER		= "root";
$DB_PWD			= "Psyko987666!";

$DB_CREATE		= "CREATE DATABASE ";
$DB_DROP		= "DROP DATABASE ";

// $DB_TABLE_USERS	=
// 	"CREATE TABLE IF NOT EXISTS users
// 	(
// 		`id_user`			INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
// 		`firstname`			VARCHAR(50) NOT NULL,
// 		`lastname`			VARCHAR(50) NOT NULL,
// 		`mail`				VARCHAR(255) NOT NULL,
// 		`password`			VARCHAR(255) NOT NULL,
// 		`validate_account`	BOOLEAN NOT NULL DEFAULT '0'
// 	);";

$DB_TABLE_PRODUCTS	= 
	"CREATE TABLE IF NOT EXISTS products (
		`id_products`		INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		`title`   			VARCHAR(255) NOT NULL,
		`description`		TEXT COLLATE utf8mb4_general_ci NOT NULL,
		`image_product_url`	VARCHAR(255) NOT NULL,
		`category`	        VARCHAR(255) NOT NULL,
		`price`				DECIMAL(12,2) NOT NULL
	);";

$DB_TABLE_COMMENTS	=
	"CREATE TABLE IF NOT EXISTS comments
	(
		`id_comment`   		INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		`id_author`			INT NOT NULL,
		`id_products`		INT NOT NULL,
		`comment`			TEXT COLLATE utf8mb4_general_ci NOT NULL,
		`time_comment`		DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	);";
