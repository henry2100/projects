<?php
	include_once "admin/model/Slider_Table.class.php";
	$img_data = new Slider_Table($db);
	$entry = $img_data->getAllImgs();

	if(isset($_POST['slider_btn'])){
		$cap = $_POST['caption'];
		$link = $_POST['link'];

		if(!empty($cap) || !empty($link)){

			$fileName = $_FILES['slider_img']['name'];
			$fileTmpName = $_FILES['slider_img']['tmp_name'];
			$fileSize = $_FILES['slider_img']['size'];
			$fileError = $_FILES['slider_img']['error'];
			$fileType = $_FILES['slider_img']['type'];	

			$fileExt = explode('.', $fileName);
			$fileActExt = strtolower(end($fileExt));

			$allowed = array("jpg", "jpeg", "png");

			if(in_array($fileActExt, $allowed)){
				if($fileError === 0){
					if($fileSize <= 20000000){
						try{
							$fileNewName = uniqid('', true).".".$fileActExt;
							$fileDestination = "admin/img/uploads/Slider_img/img".$fileNewName;
							move_uploaded_file($fileTmpName, $fileDestination);
							$img_data->addImg($fileDestination, $cap, $link);
							$success = "Uploaded Successfully!";
                            $mssg = $success;
						}catch(Exception $uploadErrSlider){
							$mssg = $uploadErrSlider->getMessage();
						}
					}
				}
			}else{
				try{
					$typeErr = new Exception("Invalid file format, jpg, jpeg and png files only.");
					throw $typeErr;
				}catch(Exception $typeErr){
					$mssg = $typeErr->getMessage();
				}
			}
		}
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$img_data->removeSlide($id);
		header("location: admin.php?ad_page=slider");
	}
	$output = include_once "admin/views/slider_v.php";
	return $output;
?>