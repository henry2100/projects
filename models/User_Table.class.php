<?php
	include_once "admin/model/Table.class.php";
    class User_Table extends Table{
        public function saveNewUser($user_img, $fname, $lname, $uname, $email, $dob, $mobile, $pwd_1, $bg_img){
        	$this->isEmailValid($email);
        	$this->isUnameValid($uname);
        	$this->isPasswdValid($pwd_1);
            $sql = "INSERT INTO users (profile_pic, fname, lname, uname, email, dob, mobile, passwd, bg_img) VALUES (?, ?, ?, ?, ?, ?, ?, MD5(?), ?)";
            $data = array($user_img, $fname, $lname, $uname, $email, $dob, $mobile, $pwd_1, $bg_img);
            $statement = $this->executeStatement($sql, $data);
            return $statement;
		}
		public function checkLoginCredentials($email, $uname, $passwd){
			$sql = "SELECT email FROM users WHERE email = ? AND uname = ? AND passwd = MD5(?)";
			$data = array($email, $uname, $passwd);
			$statement = $this->executeStatement($sql, $data);
			if($statement->rowCount() === 1){
				$out = true;
			}else{
				$loginErr = new Exception("Login failed! Incorrect Email, Username or Password.");
				throw $loginErr;
			}
		}
        public function isEmailValid($email){
        	$sql = "SELECT email FROM users WHERE email = ?";
        	$data = array($email);
        	$statement = $this->executeStatement($sql, $data);
        	if($statement->rowCount() === 1){
        		$emailErr = new Exception("Email '$email' alredy exists!");
        		throw $emailErr;
        	}
        }
        public function isUnameValid($uname){
        	$sql = "SELECT uname FROM users WHERE uname = ?";
        	$data = array($uname);
        	$statement = $this->executeStatement($sql, $data);
        	if($statement->rowCount() === 1){
        		$unameErr = new Exception("Username '$uname' alredy exists!");
        		throw $unameErr;
        	}
        }
        public function isPasswdValid($pwd_1){
        	$valid = true;

        	$len = strlen($pwd_1);
        	if(($len < 6) || ($len > 16)){
        		$passwdErr = new Exception("Password should have a min of 6 and max of 16 characters.");
        		throw $passwdErr;
        		$valid = false;
        	}

        	if(!preg_match("/[A-Z]/", $pwd_1)){
        		$passwdErr = new Exception("Password must contain at leats one Capital letter.");
        		throw $passwdErr;
        		$valid = false;
        	}

        	if(!preg_match("/[a-z]/", $pwd_1)){
        		$passwdErr = new Exception("Password must contain at leats one small letter.");
        		throw $passwdErr;
        		$valid = false;
        	}

        	if(!preg_match("/\d/", $pwd_1)){
        		$passwdErr = new Exception("Password must contain at leats one digit.");
        		throw $passwdErr;
        		$valid = false;
        	}
		}
		public function getNumOfPages(){
			$sql = "SELECT COUNT(*) AS numUsers FROM users";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getCustomers(){
			if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	    	$page_no = $_GET['page_no'];
		    } else {
		        $page_no = 1;
		    }
		    $total_records_per_page = 10;
		    $offset = ($page_no-1) * $total_records_per_page;
			$adjacents = "2";

			$sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT $offset, $total_records_per_page";
			$statement = $this->executeStatement($sql);
			return $statement;
		}
		public function getUserBymail($email){
			$sql = "SELECT * FROM users WHERE email = ?";
			$data = array($email);
			$statement = $this->executeStatement($sql, $data);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getUserData($email, $uname){
			$sql = "SELECT * FROM users WHERE email = ? AND uname = ?";
			$data = array($email, $uname);
			$statement = $this->executeStatement($sql, $data);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getUsers(){
			if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	    	$page_no = $_GET['page_no'];
		    } else {
		        $page_no = 1;
		    }
		    $total_records_per_page = 4;
		    $offset = ($page_no-1) * $total_records_per_page;
			$adjacents = "2";

			$sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT $offset, $total_records_per_page";
			$statement = $this->executeStatement($sql);
			return $statement;
		}

		/*public function getNumOfPages(){
			$sql = "SELECT COUNT(*) AS numUsers FROM users";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}*/

		/*public function getEntriesForPagination(){
			if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	    	$page_no = $_GET['page_no'];
		    } else {
		        $page_no = 1;
		    }
		    $total_records_per_page = 4;
		    $offset = ($page_no-1) * $total_records_per_page;
			$adjacents = "2";

			$sql = "SELECT *, SUBSTRING(blog_title, 1, 15) AS name, SUBSTRING(blog_entry, 1, 150) AS intro FROM blog_table ORDER BY id DESC LIMIT $offset, $total_records_per_page";
			$statement = $this->executeStatement($sql);
			return $statement;
		}*/



		public function getUserCount(){
			$sql = "SELECT COUNT(*) AS userCount FROM users";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getUsersById($id){
			$sql = "SELECT * FROM users WHERE user_id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getUnverified(){
			$sql = "SELECT * FROM users WHERE exco = 0 AND office = '' ORDER BY user_id DESC LIMIT 10";
			$statement = $this->executeStatement($sql);
			return $statement;
		}
		public function getUnverifiedCount(){
			$sql = "SELECT COUNT(*) AS uvCount FROM users WHERE exco = 0 AND office = '' ";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}
		public function getVerified(){
			$sql = "SELECT * FROM users WHERE exco = 1 AND office = '' ORDER BY user_id DESC LIMIT 5";
			$statement = $this->executeStatement($sql);
			return $statement;
		}
		public function getVerifiedCount(){
			$sql = "SELECT COUNT(*) AS vCount FROM users WHERE exco = 1 AND office = '' ";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}
		public function deleteUser($id){
			$sql = "DELETE FROM users WHERE user_id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function verifyUser($id){
			$sql = "UPDATE users SET exco = '1' WHERE user_id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function unverifyUser($id){
			$sql = "UPDATE users SET exco = '0', office = '' WHERE user_id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function searchMembers($searchTerm){
			$sql = "SELECT * FROM users WHERE fname LIKE ? OR lname LIKE ? OR uname LIKE ? OR email LIKE ? OR office LIKE ?";
			$data = array("%$searchTerm%","%$searchTerm%","%$searchTerm%","%$searchTerm%", "%$searchTerm%");
			$statement = $this->executeStatement($sql, $data);
			if(!$statement){
				$searchErr = new Exception("Something went wrong!");
				throw $searchErr;
			}else{
				return $statement;
			}
		}
		public function updateUserProfile($id, $dpic){
			$sql = "UPDATE users SET profile_pic = ? WHERE user_id = ?";
			$data = array($dpic, $id);
			$statement = $this->executeStatement($sql, $data);
			if($statement){
				$out = true;
			}else{
				$e = new Exception("There was an error updating your Profile picture, please try again.");
				throw $e;
			}
			return $out;
		}
		public function updateBG($id, $bg_img){
			$sql = "UPDATE users SET bg_img = ? WHERE user_id = ?";
			$data = array($bg_img, $id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function updateUserProfileInfo($id, $fname, $lname, $dob, $mobile){
			//$this->isUnameValid($uname);
			//$this->isEmailValid($email);
			$sql = "UPDATE users SET fname = ?, lname = ?, dob = ?, mobile = ? WHERE user_id = ?";
			$data = array($fname, $lname, $dob, $mobile, $id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function updateUserProfilePasswd($id, $old_passwd, $new_passwd){
			$this->isPasswdValid($new_passwd);
			$this->checkPasswd($old_passwd);
			$sql = "UPDATE users SET passwd = MD5(?) WHERE user_id = ?";
			$data = array($new_passwd, $id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function deleteUserByID($id){
			$sql = "DELETE FROM users WHERE user_id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function checkPasswd($password){
			$sql = "SELECT uname FROM users WHERE passwd = MD5(?)";
			$data = array($password);
			$statement = $this->executeStatement($sql, $data);
			if($statement->rowCount() === 1){
				$out = true;
			}else{
				$passwdChng = new Exception("Incorrect Password!");
				throw $passwdChng;
			}
			return $out;
		}
    }
?>