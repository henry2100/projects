<?php
	include_once "models/User_Table.class.php";
	$userData = new User_Table($db);

	if(isset($_POST['user_login_btn'])){
		$email = $_POST['email'];
		$uname = $_POST['uname'];
		$pwd = $_POST['pwd'];

		if(!empty($email) || !empty($uname) || !empty($pwd)){
			try{
				$userData->checkLoginCredentials($email, $uname, $pwd);
				$user_log->log_In($uname, $email);
				$success = "User \"$uname\" logged in Successfully!";
				$signIn_ErrMssg = $success;
			}catch(Exception $loginErr){
				$signIn_ErrMssg = $loginErr->getMessage();
			}
		}else{
			try{
				$emptyErr = new Exception("Please fill all fields!");
				throw $emptyErr;
			}catch(Exception $emptyErr){
				$signIn_ErrMssg = $emptyErr->getMessage();
			}
		}
	}
	$output = null;
	if($user_log->isLogged_In()){
		header("location: index.php");
	}else{
		$output = include_once "views/authentication/login_v.php";
	}
	return $output;
?>