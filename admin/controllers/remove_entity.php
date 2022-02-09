<?php
	include_once "models/User_Table.class.php";
	$userTab = new User_Table($db);
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$userTab->deleteUserByID($id);
		header("location: admin.php?ad_page=customers");
	}
?>