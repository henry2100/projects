<?php
	include_once "models/User_Table.class.php";
	$userData = new User_Table($db);
	$userCount = new User_Table($db);
	//$allCustomers = $userData->getUsers();


	$isEntryClicked = isset($_GET['id']);
	if($isEntryClicked){
		$user_id = $_GET['id'];
		$user = $userData->getUsersById($user_id);
		$output = include_once "admin/views/customer_unit.php";
	}else{
		if(isset($_GET['page_no']) && $_GET['page_no']!="") {
	    	$page_no = $_GET['page_no'];
	    } else {
	        $page_no = 1;
	    }
	    $total_records_per_page = 10;
	    $offset = ($page_no-1) * $total_records_per_page;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = "2";

		$total_records = $userCount->getNumOfPages();
		$customer = $userData->getCustomers();

		$totalRecords = $total_records->numRecords;
		$total_no_of_pages = ceil($totalRecords / $total_records_per_page);
		$second_last = $total_no_of_pages - 1;

		$output = include_once "admin/views/customer_v.php";
	}
	return $output;
?>