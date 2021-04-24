<?php

namespace App\Models;

use App\Models\Db;

class Comments
{
	private $db;

	public function __construct()
	{
		$this->db = new Db(true);
	}

	public function addComment($idProduct, $name, $comment)
	{
		try {
			$query = 'INSERT INTO `comments` 
						(`author_name`, `id_product`, `comment`, `time_comment`)
						VALUES (?, ?, ?, NOW())';
			$request = $this->db->pdo->prepare($query);
			$request->execute(array($name, $idProduct, $comment));
		}
		catch (\PDOException $e) {
			die("An error is occured : " . $e->getMessage());
		}
	}

	public function getComments($idProduct)
	{
		try {
			$query = 'SELECT * FROM `comments` 
						WHERE id_product=? ORDER BY `time_comment` asc';
			$request = $this->db->pdo->prepare($query);
			$request->execute(array($idProduct));
			return $request->fetchAll();
		} catch (\PDOException $e) {
			die("An error is occured : " . $e->getMessage());
		}
	}

	public function deleteComment($idComment)
	{
		try {
			$query = 'DELETE FROM `comments` WHERE id_comment=?';
			$request = $this->db->pdo->prepare($query);
			return $request->execute(array($idComment));
		} catch (\PDOException $e) {
			die("An error is occured : " . $e->getMessage());
		}
	}

	public function updateComment($idComment, $comment)
	{
		try {
			$query = 'UPDATE `comments` SET `comment`=? WHERE id_comment=?';
			$request = $this->db->pdo->prepare($query);
			return $request->execute(array($comment, $idComment));
		} catch (\PDOException $e) {
			die("An error is occured : " . $e->getMessage());
		}
	}
}