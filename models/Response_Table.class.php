<?php
	include_once "admin/model/Table.class.php";
	class Response_Table extends Table{
		public function saveResponse($name, $text, $id){
			$sql = "INSERT INTO (author, reply_text, comment_id) VALUES (?, ?, ?)";
			$data = array($id, $name, $text);
			$statement = $this->executeStatement($sql, $data);
		}
	}
?>