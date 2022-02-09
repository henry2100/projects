<?php
	include_once "admin/model/Blog_Entry_Table.class.php";
	$entry_data = new Blog_Entry_Table($db);
	isset($_GET['id']);
	$blog_id = $_GET['id'];
	$entry_data->deleteBlogEntry($blog_id);
	header("location: index.php?content=posts");
?>