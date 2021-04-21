<?php

	require_once 'database.php';
	
	//CREATE DB
	try {
		$pdo = new \PDO($DB_DSN_LIGHT, $DB_USER, $DB_PWD);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		$sql = $DB_DROP . " IF EXISTS " . $DB_NAME;
		$pdo->exec($sql);
		echo "Database DROPED successfully<br/>";
		
		$sql = $DB_CREATE . " IF NOT EXISTS " . $DB_NAME;
		$pdo->exec($sql);
		echo "Database CREATED successfully<br/>";
	}
	catch (PDOException $error) {
		die("ERROR CREATING DB: " . $error->getMessage() . "Aborting process");
	}

	//CREATE TABLE
	try {
		$pdo = new \PDO($DB_DSN, $DB_USER, $DB_PWD);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		// $sql = $DB_TABLE_USERS;
		// $pdo->exec($sql);
		// echo "Table Users CREATED successfully.<br/>";

		$sql = $DB_TABLE_PRODUCTS;
		$pdo->exec($sql);
		echo "Table Products CREATED successfully.<br/>";
		
		$sql = $DB_TABLE_COMMENTS;
		$pdo->exec($sql);
		echo "Table Comments CREATED successfully.<br/>";
		
	}
	catch (PDOException $error) {
		die("ERROR CREATING TABLES: " . $error->getMessage() . "Aborting process");
	}