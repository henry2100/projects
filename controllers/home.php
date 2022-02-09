<?php
	include_once "models/User_Table.class.php";
	$userData = new User_Table($db);

	/*include_once "admin/model/Slider_Table.class.php";
	$carouselData = new Slider_Table($db);

	$imgID = $carouselData->getImgID();
	//echo $imgID->id;

	//if(!empty($_GET['id'])){
    if(isset($_GET['id'])){
    //Get image data from database
    	//echo $imgID->id;
		try{
			$result = $carouselData->getImgs($imgID);
			echo $result->img; 
		}catch(Exception $emptySlider){
			$sliderMssg = $emptySlider->getMessage();
		}
	}*/

	if($user_log->isLogged_In()){
		$email = $_SESSION['email'];
		$out = $userData->getUserBymail($email); 
		$output = include_once "views/home_v.php";
	}else{
		$output = include_once "views/home_v.php";	
	}
	return $output;								
?>