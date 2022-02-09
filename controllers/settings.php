<?php
	include_once "models/User_Table.class.php";
    $userTable = new User_Table($db);

	if(isset($_POST['change_bg'])){
		$fileName = $_FILES['bg_img']['name'];
		$fileType = $_FILES['bg_img']['type'];
		$fileError = $_FILES['bg_img']['error'];
		$fileTmpName = $_FILES['bg_img']['tmp_name'];
		$fileSize = $_FILES['bg_img']['size'];

		$id = $_POST['user_id'];

		$fileExt = explode(".", $fileName);
		$fileActExt = strtolower(end($fileExt));

		$allowed = array("jpg", "jpeg", "png");
		if(in_array($fileActExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 20000000){
					$fileNewName = uniqid("",true).".".$fileActExt;
					$fileDestination = "admin/img/uploads/Profile_bg_img/bg_image".$fileNewName;
					move_uploaded_file($fileTmpName, $fileDestination);
					try{
						$userTable->updateBG($id, $fileDestination);
						$success = "You have successfully changed your Background Image.";
						$editProfileMssg = $success;
						header("location: index.php?page=profile");
					}catch (Exception $e){
						$editProfileMssg = $e->getMessage();
					}
				}else{
					try{

					}catch(Exception $e){

					}
				}	
			}else{
				try{

				}catch(Exception $e){

				}
			}	
		}else{
			try{

			}catch(Exception $e){

			}
		}	
	}

	if(isset($_POST['changePic'])){
		$fileName = $_FILES['prof_pic']['name'];
		$fileTmpName = $_FILES['prof_pic']['tmp_name'];
		$fileSize = $_FILES['prof_pic']['size'];
		$fileError = $_FILES['prof_pic']['error'];
		$fileType = $_FILES['prof_pic']['type'];

		$id = $_POST['user_id'];

		$fileExt = explode(".", $fileName);
		$fileActExt = strtolower(end($fileExt));

		$allowed = array("jpg", "jpeg", "png");

		if(in_array($fileActExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 20000000){
					$fileNewName = uniqid('', true).".".$fileActExt;
					$fileDestination = "admin/img/uploads/profile_pic/member".$fileNewName;
					move_uploaded_file($fileTmpName, $fileDestination);
					try{
						$userTable->updateUserProfile($id, $fileDestination);
						$success = "You have successfully changed your profile picture.";
						$editProfileMssg = $success;
						header("location: index.php?page=profile");
					}catch (Exception $e){
						$editProfileMssg = $e->getMessage();
					}
				}else{
					try{
						$sizeErr = new Exception("Please, Your file is too large!");
						throw $sizeErr;
					}catch (Exception $sizeErr){
						$adminFormMessage = $sizeErr->getMessage();
					}
				}
			}else{
				try{
					$ErrUploadingFile = new Exception("There was an error uploading your file, Please try again.");
					throw $ErrUploadingFile;
				}catch (Exception $ErrUploadingFile){
					$adminFormMessage = $ErrUploadingFile->getMessage();
				}
			}
		}else{
			try{
			$fileExtErr = new Exception("You cannot upload files of this type. jpg, jpeg and png files only!");
				throw $fileExtErr;
			}catch (Exception $fileExtErr){
				$adminFormMessage = $fileExtErr->getMessage();
			}
		}
	}

	if(isset($_POST['editProfile'])){
		$id = $_POST['id'];
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];

		if(!empty($id) || !empty($fname) || !empty($lname)){
			$userTable->updateUserProfileInfo($id, $fname, $lname);
			header("location: index.php?page=profile");
		}else{
			try{
				$emptyErr = new Exception("Please fill all fields!");
				throw $emptyErr;
			}catch (Exception $emptyErr){
				$adminFormMessage2 = $emptyErr->getMessage();
			}
		}
	}

	if(isset($_POST['changePasswd'])){
		$id = $_POST['id'];
		$oldPasswd = $_POST['oldPassword'];
		$newPasswd1 = $_POST['password_1'];
		$newPasswd2 = $_POST['password_2'];

		if(!empty($oldPasswd) || !empty($newPasswd1) || !empty($newPasswd2)){
			if($newPasswd1 === $newPasswd2){
				try{
					$userTable->updateUserProfilePasswd($id, $oldPasswd, $newPasswd1);
					$success = "You have successfully changed your password.";
					$editProfileMssg = $success;
					header("location: index.php?page=profile");
				}catch(Exception $passwdChng){
					$editProfileMssg = $passwdChng->getMessage();
				}catch (Exception $Passwd){
					$editProfileMssg = $Passwd->getMessage();
				}
			}else{
				try{
					$passwdMatchErr = new Exception("Your new password dosen't match!");
					throw $passwdMatchErr;
				}catch(Exception $passwdMatchErr){
					$editProfileMssg = $passwdMatchErr->getMessage();
				}
			}
		}
	}

	//$output = include_once "views/settings_v.php";
	//return $output;
?>