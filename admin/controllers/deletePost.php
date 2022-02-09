<?php
	include_once "admin/model/Blog_Entry_Table.class.php";
	$entryData = new Blog_Entry_Table($db);

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$entryData->deleteBlogEntry($id);
		header('location: admin.php?ad_page=blog');
	}
?>