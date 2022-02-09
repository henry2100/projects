<?php
	include_once "admin/model/Table.class.php";

	class Comment_Table extends Table{
		public function saveComment($entry_Id, $author, $txt){
			$sql = "INSERT INTO comments ( entry_id, author, comment_entry) VALUES (?, ?, ?)";
			$data = array($entry_Id, $author, $txt);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}

		public function getCommentsById($id){
			$sql = "SELECT *, date_posted AS dp FROM comments WHERE entry_id = ? ORDER BY id DESC LIMIT 4";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			//$model = $statement->fetchObject();
			return $statement;
		}

		public function getAllCommentsById($id){
			$sql = "SELECT * FROM comments WHERE entry_id = ? ORDER BY id DESC LIMIT 15";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}

		public function getNumComment($id){
			$sql = "SELECT COUNT(*) AS numofComments FROM comments  WHERE entry_id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			$model = $statement->fetchObject();
			return $model;
		}

		public function deleteByEntryId($id){
			$sql = "DELETE FROM comments WHERE entry_id = ?";
			$data  = array($id);
			$statement = $this->executeStatement($sql, $data);
		}

		public function getAllCommentsAdmin(){
			$sql = "SELECT *, SUBSTRING(txt, 1, 30) AS txt_intro FROM comments";
			$statement = $this->executeStatement($sql);
			return $statement;
		}
		public function getCommentsByIdAdmin($id){
			$sql = "SELECT * FROM comments WHERE id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			$model = $statement->fetchObject();
			return $model;
		}
		public function deleteComment($id){
			$sql = "DELETE FROM comments WHERE id = ?";
			$data  = array($id);
			$statement = $this->executeStatement($sql, $data);
		}
	}
?>