<?php

namespace App\Models;

class Db
{
    public $pdo;

    public function __construct()
    {
        require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';

        try {
            $this->$pdo = new \PDO($DB_DSN, $DB_USER, $DB_PWD);
            $this->$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $error) {
            die("Error query " . $error->getMessage());
        }
    }
}