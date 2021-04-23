<?php

namespace App\Controllers;

use App\Models\Comments;
use ErrorException;

class CommentsController
{
	private $name;
	private $comment;

	public function addComment($idProduct)
	{
		if (isset($_POST["name"]) && isset($_POST["comment"]))
		{
			try {
				$this->name = htmlspecialchars($_POST["name"]);
				$this->comment = htmlspecialchars($_POST["comment"]);
	
				$comment = new Comments();
				$comment->addComment($idProduct, $this->name, $this->comment);
				echo json_encode(array(
					'name' => $this->name,
					'comment' => $this->comment
				));
			}
			catch (ErrorException $e) {
				die("An error is occured : " . $e->getMessage());
			}
		}
	}

	public function updateComment($idComment)
	{
		if (isset($_POST["comment"]))
		{
			try {
				$this->comment = htmlspecialchars($_POST["comment"]);

				$comment = new Comments();
				echo json_encode($comment->updateComment($idComment, $this->comment));
			}
			catch (\ErrorException $e) {
				die("An error is occured : " . $e->getMessage());
			}
		}
	}

	public function deleteComment($idComment)
	{
		try {
			$comment = new Comments();
			echo json_encode($comment->deleteComment($idComment));

		}
		catch (\ErrorException $e) {
			die("An error is occured : " . $e->getMessage());
		}
	}

	public function getComments($idProduct)
	{
		try {
			$comment = new Comments();
			echo json_encode($comment->getComments($idProduct));
		} catch (\ErrorException $e) {
			die("An error is occured : " . $e->getMessage());
		}
	}
}