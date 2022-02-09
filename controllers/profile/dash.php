<?php
	include_once "admin/model/Blog_Entry_Table.class.php";
	$entry_data = new Blog_Entry_Table($db);
	$user_id = $loggedUser->user_id;
	$data = $entry_data->getEntryCountByUserID($user_id);
	$output = include_once "views/profile/dash_v.php";
	return $output;
?>