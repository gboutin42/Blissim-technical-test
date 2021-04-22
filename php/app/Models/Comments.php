<?php

namespace App\Models;

use App\Models\Db;

class Comments
{
	private $db;

	public function __construct()
	{
		$this->db = new Db();
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
		catch (\PDOException $e)
		{
			die("Une erreur est survenue : " . $e->getMessage());
		}
	}

	public function getComments($idProduct)
	{
		$query = 'SELECT * FROM `comments` 
				WHERE id_product=? ORDER BY `time_comment` asc';
		$request = $this->db->pdo->prepare($query);
		$request->execute(array($idProduct));
		$result = $request->fetchAll();
		return $result;
	}

	public function deleteComment($idComment)
	{
		$query = 'DELETE FROM `comments` WHERE id_comment=?';
		$request = $this->db->pdo->prepare($query);
		$request->execute($idComment);
	}

	public function updateComment($idComment, $comment)
	{
		$query = 'UPDATE `comments` SET `comment`=? WHERE id_comment=?';
		$request = $this->db->pdo->prepare($query);
		$request->execute(array($comment, $idComment));
	}
}