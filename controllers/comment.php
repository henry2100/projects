<?php
	include_once "admin/model/Comment_Table.class.php";
	$commentsTable = new Comment_Table($db);

	include_once "models/User_Table.class.php";
	$userData = new User_Table($db);

	include_once "models/Response_Table.class.php";
	$reply = new Response_Table($db);

	if($user_log->isLogged_In()){
		$email = $_SESSION['email'];
        $uname = $_SESSION['uname'];

        $loggedUser = $userData->getUserData($email, $uname);
	}else{
		//$loggedUser = $userData->getUserData($email, $uname);
	}

	$commentSubmitted = isset($_POST['newComment']);
	if($commentSubmitted){
		$post = $_POST['entry-id'];
		$user = $_POST['user-name'];
		$comment = $_POST['new-comment'];
		if(!empty($user) and !empty($comment)){
			$commentsTable->saveComment($post, $user, $comment);
		}else{
			try{
				$commentErr = new Exception("Your comments cannot be empty.");
				throw $commentErr;
 			}catch(Exception $commentErr){
 				$commentFormMessage = $commentErr->getMessage();
 			}
		}
	}

	/*if(isset($_POST['reply_btn'])){
		$id = $_POST['comment_id'];
		$name = $_POST['author'];
		$reply = $_POST['reply'];

		echo $id;
		if(!empty($id) || !empty($name) || !empty($reply)){
			$reply->saveResponse($name, $reply, $id);
		}
	}*/


	$Comments = $commentsTable->getCommentsById($blog_id);
	$allComments = $commentsTable->getAllCommentsById($blog_id);
	$totalComments = $commentsTable->getNumComment($blog_id);

	$output = include_once "views/comment_v.php";
	return $return;
	/*if(!empty($id) || !empty($name) || !empty($reply)){
		$reply->saveResponse($name, $reply, $id);
	}*/
    //<!--<input type='hidden' name='comment_id' value='$Comments->id'>-->

?>