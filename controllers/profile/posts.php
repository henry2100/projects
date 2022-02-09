<?php
	include_once "admin/model/Blog_Entry_Table.class.php";
	$entry_data = new Blog_Entry_Table($db);

	include_once "admin/model/Comment_Table.class.php";
	$comment_data = new Comment_Table($db);

	$user_id = $loggedUser->user_id;
	
	$isEntryClicked = isset($_GET['id']);
	if($isEntryClicked){
		$blog_id = $_GET['id'];

		$data = $entry_data->getEntryById($blog_id);

		$commentCount = $comment_data->getNumComment($blog_id);

		$output = include_once "views/profile/post_v.php";
		//$output .= include_once "controllers/comment.php";
	}else{
		if(isset($_GET['page_no']) && $_GET['page_no']!="") {
	    	$page_no = $_GET['page_no'];
	    } else {
	        $page_no = 1;
	    }
	    $total_records_per_page = 8;
	    $offset = ($page_no-1) * $total_records_per_page;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = "2";

		$total_records = $entry_data->getEntryCountByUserID($user_id);
		$entries = $entry_data->getEntriesForPagination();

		$totalRecords = $total_records->postCount;
		$total_no_of_pages = ceil($totalRecords / $total_records_per_page);
		$second_last = $total_no_of_pages - 1;

		$entries = $entry_data->getEntryByUserID($user_id);
		$output = include_once "views/profile/posts_v.php";
	}
	return $output;
?>
