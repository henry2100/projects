<?php
	include_once "admin/model/Admin_User_Table.class.php";
	$admin_user = new Admin_User_Table($db);

	if(isset($_POST['login_btn'])){
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];

		if(!empty($email) || !empty($pwd)){
			try{
				$admin_user->checkCredentials($email, $pwd);
				$admin_log->logIn($email);
				$success = "Logged in Successfully!";
				$admin_log_err = $success;
			}catch(Exception $loginErr){
				$admin_log_err = $loginErr->getMessage();
			}	
		}else{
			try{
				$emptyErr = new Exception("Please fill all fields!");
				throw $emptyErr;
			}catch(Exception $emptyErr){
				$admin_log_err = $emptyErr->getMessagae();
			}
		}
	}	
	$output = null;
	if($admin_log->isLoggedIn()){
		header("location: admin.php");
	}else{
		$output = include_once "admin/views/login_v.php";
	}
	return $output;
?>