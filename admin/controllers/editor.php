<?php
	include_once "admin/model/Blog_Entry_Table.class.php";
	$blogTable = new Blog_Entry_Table($db);

	include_once "admin/model/Admin_User_Table.class.php";
    $adminTable = new Admin_User_Table($db);

	if($admin_log->isLoggedIn()){
        $email = $_SESSION['email'];
        try{
            $loggedAdmin = $adminTable->getAdminData($email);
            //$success = "User '$uname' with email '$email' was successfully logged in!";

            //$_SESSION['message'] = "You have clicked on button successfully";
            //header("location:index.php?page=message");

            //$loggedErrMssg = $_SESSION['message'];
        }catch(Exception $e){
            $loggedErrMssg = $e->getMessage();
        }
    }
	
	$insertNewEntry = isset($_POST['action_save']);

	$updateEntry = isset($_POST['action_update']);

	$deleteDataEntry = isset($_POST['action_delete']);
	

		if($insertNewEntry){
			$id = $_POST['id'];
			$adminID = $_POST['ad_user_id'];

			$fileName = $_FILES['blog_pic']['name'];
			$fileTmpName = $_FILES['blog_pic']['tmp_name'];
			$fileSize = $_FILES['blog_pic']['size'];
			$fileError = $_FILES['blog_pic']['error'];
			$fileType = $_FILES['blog_pic']['type'];

			$category = $_POST['category'];
			$author = $_POST['author'];
			$title = $_POST['blog_title'];
			$entry = $_POST['blog_entry'];

			$fileExt = explode('.', $fileName);
			$fileActExt = strtolower(end($fileExt));

			$allowed = array("jpg", "jpeg", "png");

			if(in_array($fileActExt, $allowed)){
				if($fileError === 0){
					if($fileSize < 20000000){
						$fileNewName = uniqid('', true).".".$fileActExt;
						$fileDestination = "admin/img/uploads/Blog_pic/blog_pic".$fileNewName;
						move_uploaded_file($fileTmpName, $fileDestination);
						$blogTable->saveBlogEntry($fileDestination, $category, $author, $title, $entry, $adminID);
					}
				}
			}
		}else if($updateEntry){
			$id = $_POST['id'];
			$adminID = $_POST['ad_user_id'];
			
			if($id > 0 ){
				$fileName = $_FILES['blog_pic']['name'];
				$fileTmpName = $_FILES['blog_pic']['tmp_name'];
				$fileSize = $_FILES['blog_pic']['size'];
				$fileError = $_FILES['blog_pic']['error'];
				$fileType = $_FILES['blog_pic']['type'];

				$category = $_POST['category'];
				$author = $_POST['author'];
				$title = $_POST['blog_title'];
				$entry = $_POST['blog_entry'];

				$fileExt = explode('.', $fileName);
				$fileActExt = strtolower(end($fileExt));

				$allowed = array("jpg", "jpeg", "png");

				if(!empty($category) or !empty($fileName)){
					if(in_array($fileActExt, $allowed)){
						if($fileError === 0){
							if($fileSize < 20000000){	
								$fileNewName = uniqid('', true).".".$fileActExt;
								$fileDestination = "admin/img/uploads/Blog_pic/blog_pic".$fileNewName;
								move_uploaded_file($fileTmpName, $fileDestination);
								$blogTable->updateBlogEntry($id, $fileDestination, $category, $author, $title, $entry, $adminID);
							}else{
								echo "You file is too big!";
							}
						}else{
							echo "There was an error uploading your file!";
						}
					}else{
						echo "You cannot upload files of this type!";
					}
				}else{
					try{
						$ErrUpdating = new Exception("Error: Please choose a new or existing photo and category.");
						throw $ErrUpdating;
					}catch (Exception $ErrUpdating){
						$editorErrMssg = $ErrUpdating->getMessage();
					}
				}
			}
		}else if ($deleteDataEntry) {
			$id = $_POST['id'];
			$blogTable->deleteBlogEntry($id);
			header('location: admin.php?ad_page=blog');
		}
	$entryRequested = isset( $_GET['id'] );
	if ( $entryRequested ) {
	 	$id = $_GET['id'];
	 	$entryData = $blogTable->getEntry( $id );
	 	$entryData->id = $id;
	}
	$output = include_once "admin/views/blogEditor_v.php";
	return $output;
?>