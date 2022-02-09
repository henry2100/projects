<?php
	class User_Session_Log{
		private $logged_In = false;

		public function __construct(){
			session_start();
		}

		public function isLogged_In(){
			$session_Set = isset($_SESSION['sessionSet']);
			if($session_Set){
				$out = $_SESSION['sessionSet'];
			}else{
				$out = false;
			}
			return $out;
		}

		public function log_In($uname, $email){
			$_SESSION['sessionSet'] = true;
			$_SESSION['uname'] = $uname;
			$_SESSION['email'] = $email;
		}

		public function log_Out(){
			session_destroy($_SESSION['sessionSet']);
			$_SESSION['sessionSet'] = false;
		}
	}
?>