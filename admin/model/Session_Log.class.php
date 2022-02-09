<?php
	class Session_Log{
		private $loggedIn = false;

		public function __construct(){
			session_start();
		}

		public function isLoggedIn(){
			$sessionSet = isset($_SESSION['session_set']);
			if($sessionSet){
				$out = $_SESSION['session_set'];
			}else{
				$out = false;
			}
			return $out;
		}

		public function logIn($email){
			$_SESSION['session_set'] = true;
			$_SESSION['email'] = $email;
			//$_SESSION['name'] = $uname;
		}

		public function logOut(){
			session_destroy($_SESSION['session_set']);
			$_SESSION['session_set'] = false;
		}
	}
?>