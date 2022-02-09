<?php
	include_once "models/Subscriber_Table.class.php";
	$userTab = new Subscriber_Table($db);
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$userTab->deleteSubscriber($id);
		header("location: admin.php?ad_page=subscribers");
	}
?>