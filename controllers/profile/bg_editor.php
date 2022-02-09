<?php
	include_once "models/User_Table.class.php";
	$user = new User_Table($db);

	if(isset($_POST['bg_btn'])){
		$fileName = $_FILES['bg_pic']['name'];
		$fileTmpName = $_FILES['bg_pic']['tmp_name'];
		$fileSize = $_FILES['bg_pic']['size'];
		$fileError =$_FILES['bg_pic']['error'];
		$fileType = $_FILES['bg_pic']['type'];

		$user_id = $_POST['user_id'];

		$fileExt = explode(".", $fileName);
		$fileActExt = strtolower(end($fileExt));

		$allowed = array("jpg", "jpeg", "png");

		if(!empty($user_id)){
			if(in_array($fileActExt, $allowed)){
				if($fileSize < 20000000){
					if($fileError === 0){
						$fileNewName = uniqid("",true).".".$fileActExt;
						$fileDestination = "admin/img/uploads/Profile_bg_img/bg_img".$fileNewName;
						move_uploaded_file($fileTmpName, $fileDestination);
						try{
							$user->updateBG($user_id, $fileDestination);
							header("location: index.php?content=bg_editor");
						}catch(Exception $e){
							$updateErr = $e->getMessage();
						}
					}
				}
			}
		}
	}

	$output = include_once "views/profile/bg_editor_v.php";
	return $return;
?>