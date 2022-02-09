<?php
	include_once "models/User_Table.class.php";
	$user = new User_Table($db);

	if(isset($_GET['id'])){
		$user_id = $_GET['id'];
		$userEntry = $user->getUsersById($user_id);
		$output = include_once "admin/views/user_v.php";
	}else{
		if(isset($_GET['page_no']) && $_GET['page_no']!="") {
	    	$page_no = $_GET['page_no'];
	    } else {
	        $page_no = 1;
	    }
	    $total_records_per_page = 4;
	    $offset = ($page_no-1) * $total_records_per_page;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = "2";

		$total_records = $user->getNumOfPages();
		$data = $user->getUsers();

		$totalRecords = $total_records->numUsers;
		$total_no_of_pages = ceil($totalRecords / $total_records_per_page);
		$second_last = $total_no_of_pages - 1;

		$output = include_once "admin/views/users_v.php";
	}
	return $output;
?>