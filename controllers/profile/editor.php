<?php
	include_once "admin/model/Blog_Entry_Table.class.php";
	$entry_data = new Blog_Entry_Table($db);
	
	if(isset($_POST['action'])){
		$actionValue = $_POST['action'];
		if($actionValue){
			$fileName = $_FILES['blog_pic']['name'];
			$fileTmpName = $_FILES['blog_pic']['tmp_name'];
			$fileSize = $_FILES['blog_pic']['size'];
			$fileError = $_FILES['blog_pic']['error'];
			$fileType = $_FILES['blog_pic']['type'];

			$blog_id = $_POST['id'];
			$user_id = $_POST['user_id'];
			$category = $_POST['category'];
			$author = $_POST['author'];
			$title = $_POST['blog_title'];
			$entry = $_POST['blog_entry'];
			
			$saveBtnClicked = ($actionValue === 'save' && $blog_id == 0);
			$updateBtnClicked = ($actionValue === 'update' && $blog_id > 0);
			$deleteBtnClicked = ($actionValue === 'delete' && $blog_id > 0);

			$fileExt = explode(".", $fileName);
			$fileActExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png');

			if(!empty($category) || !empty($author) || !empty($title) || !empty($entry)){
				if(in_array($fileActExt, $allowed)){
					if($fileError === 0){
						if($fileSize < 20000000){
							
							$fileNewName = uniqid("", true).'.'.$fileActExt;
							$fileDestination = "admin/img/uploads/Blog_pic/blog_pic".$fileNewName;
							move_uploaded_file($fileTmpName, $fileDestination);
							if($saveBtnClicked){
								$entry_data->saveBlogEntry($fileDestination, $category, $author, $title, $entry, $user_id);
							}elseif($updateBtnClicked){
								$entry_data->updateBlogEntry($blog_id, $fileDestination, $category, $author, $title, $entry, $user_id);
								header("location: index.php?content=posts"); 
							}
						}
					}
				}
			}
			if($deleteBtnClicked){
				$entry_data->deleteBlogEntry($blog_id);
				header("location: index.php?content=posts");
			}	
		}
	}
	$entryRequested = isset( $_GET['id'] );
	if ( $entryRequested ) {
	 	$id = $_GET['id'];
	 	$entryData = $entry_data->getEntry( $id );
	 	$entryData->id = $id;
	}
	$output = include_once "views/profile/editor_v.php";
	return $output;
?>