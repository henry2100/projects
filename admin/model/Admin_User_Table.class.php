<?php
	include_once "admin/model/Table.class.php";

	class Admin_User_Table extends Table{
		public function saveAdminUser($email, $passwd){
			$sql = "INSERT INTO admin_users (email, password) VALUES (?, MD5(?))";
			$data = array($passwd, $email);
			$statement = $this->executeStatement($sql, $data);
		}
		public function checkCredentials($email, $pwd){
			$sql = "SELECT email, password FROM admin_users WHERE email = ? and password = MD5(?)";
			$data = array($email, $pwd);
			$statement = $this->executeStatement($sql, $data);
			if($statement->rowCount() === 1){
				$out = true;
			}else{
				$loginErr = new Exception("Login failed! Incorrect email or password.");
				throw $loginErr;
			}
		}
		public function getUserByID($id){
			$sql = "SELECT * FROM admin_users WHERE user_id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getUsers(){
			$sql = "SELECT *, date_created AS reg_date FROM admin_users DESC LIMIT 5";
			$statement = $this->executeStatement($sql);
			return $statement;
		}
		public function getAdminCount(){
			$sql = "SELECT COUNT(*) AS adminCount FROM admin_users";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getAdminData($email){
			$sql = "SELECT * FROM admin_users WHERE email = ?";
			$data = array($email);
			$statement = $this->executeStatement($sql, $data);
			$model = $statement->fetchObject();
			return $model;
		}
	}
?>