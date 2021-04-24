<?php

$DB_NAME		= "my_db_name";
$DB_DSN_LIGHT	= "mysql:host=localhost:3306";
$DB_DSN			= $DB_DSN_LIGHT . ";dbname=" . $DB_NAME;
$DB_USER		= "root";
$DB_PWD			= "my_db_password";

$DB_CREATE		= "CREATE DATABASE ";
$DB_DROP		= "DROP DATABASE ";

$DB_TABLE_COMMENTS	=
	"CREATE TABLE IF NOT EXISTS comments
	(
		`id_comment`   		INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		`author_name`		VARCHAR(255) NOT NULL,
		`id_product`		INT NOT NULL,
		`comment`			TEXT COLLATE utf8mb4_general_ci NOT NULL,
		`time_comment`		DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	);";
