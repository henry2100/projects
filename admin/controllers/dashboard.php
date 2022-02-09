<?php
	include_once "admin/model/Admin_User_Table.class.php";
	$adminUser = new Admin_User_Table($db);
	$numAdmin = $adminUser->getAdminCount();
	$all_admin = $adminUser->getUsers();

	include_once "models/User_Table.class.php";
	$userData = new User_Table($db);
	$numUser = $userData->getUserCount();

	include_once "models/Subscriber_Table.class.php";
	$subTab = new Subscriber_Table($db);
	$numSub = $subTab->getSubscriberCount();
	
	$output = include_once "admin/views/dash_v.php";
	return $output;
?>