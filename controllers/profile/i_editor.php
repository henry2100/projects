<?php
	include_once "models/User_Table.class.php";
	$data = new User_Table($db);
	
	if(isset($_POST['i_btn'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		//$uname = $_POST['uname'];
		//$email = $_POST['email'];
		$dob = $_POST['dob'];
		$mobile = $_POST['mobile'];

		if(!empty($fname) || !empty($lname) || !empty($dob) || !empty($mobile) /*|| !empty($uname) || !empty($email)*/){
			try{
				$data->updateUserProfileInfo($id, $fname, $lname, $dob, $mobile);
			}catch(Exception $e){
				$updateErr = $e->getMessage();
			}
		}
	}

	$output = include_once "views/profile/i_editor_v.php";
	return $output;
?>