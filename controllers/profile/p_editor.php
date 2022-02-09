<?php
	include_once "models/User_Table.class.php";
	$data = new User_Table($db);

	if(isset($_POST['p_btn'])){
		$fileName = $_FILES['p_pic']['name'];
		$fileTmpName = $_FILES['p_pic']['tmp_name'];
		$fileSize = $_FILES['p_pic']['size'];
		$fileError =$_FILES['p_pic']['error'];
		$fileType = $_FILES['p_pic']['type'];

		$user_id = $_POST['user_id'];

		$fileExt = explode(".", $fileName);
		$fileActExt = strtolower(end($fileExt));

		$allowed = array("jpg", "jpeg", "png");

		if(!empty($user_id)){
			if(in_array($fileActExt, $allowed)){
				if($fileSize < 20000000){
					if($fileError === 0){
						$fileNewName = uniqid("", true).".".$fileActExt;
						$fileDestination = "admin/img/uploads/profile_pic/user".$fileNewName;
						move_uploaded_file($fileTmpName, $fileDestination);
						try{
							$data->updateUserProfile($user_id, $fileDestination);
							header("location: index.php?content=p_editor");
						}catch(Exception $e){
							$updateErr = $e->getMessage();
						}
					}
				}
			}
		}
	}

	$output = include_once "views/profile/p_editor_v.php";
	return $output;
?>