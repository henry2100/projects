<?php
	include_once "models/Subscriber_Table.class.php";
	$subT = new Subscriber_Table($db);
	
	$subCount = new Subscriber_Table($db);
	//$numCount = $subCount->getNumOfPages();

	if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }
    $total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$adjacents = "2";

	$total_records = $subCount->getNumOfPages();
	$custom = $subT->getSubscribers();

	$totalRecords = $total_records->numRecords;
	$total_no_of_pages = ceil($totalRecords / $total_records_per_page);
	$second_last = $total_no_of_pages - 1;

	$output = include_once "admin/views/subscriber_v.php";
	return $output;
?>