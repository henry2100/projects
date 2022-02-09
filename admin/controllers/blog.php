<?php
	include_once "admin/model/Blog_Entry_Table.class.php";
	$entryTable = new Blog_Entry_Table($db);
	$entryCount = new Blog_Entry_Table($db);

	include_once "admin/model/Comment_Table.class.php";
	$data = new Comment_Table($db);

	//include_once "admin/model/User_Table.class.php";
	//$userTable = new User_Table($db);

	$isEntryClicked = isset($_GET['id']);
	if($isEntryClicked){
		$blog_id = $_GET['id'];

		$entryData = $entryTable->getPostById($blog_id);
		
		$commentCount = $data->getNumComment($blog_id);
		
		$blogOutput = include_once "admin/views/blog_single.php";
		//$blogOutput .= include_once "controllers/comments.php";
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

		$total_records = $entryCount->getNumOfPages();
		$entries = $entryTable->getEntriesForPagination();

		$totalRecords = $total_records->numRecords;
		$total_no_of_pages = ceil($totalRecords / $total_records_per_page);
		$second_last = $total_no_of_pages - 1;

		$entriesR = $entryTable->getAllEntriesForSide();
		$blogOutput = include_once "admin/views/blog_v.php";
	}
    return $blogOutput;
?>