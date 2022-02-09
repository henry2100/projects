<?php
	include_once "admin/model/Blog_Entry_Table.class.php";
	$post = new Blog_Entry_Table($db);
	$entries = $post->getAllEntriesForSide();
	$output = include_once "views/common/sidebar.php";
	return $output;
?>