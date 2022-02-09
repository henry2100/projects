<?php
	include_once "admin/model/Slider_Table.class.php";
	$sliderData = new Slider_Table($db);

	$result = $sliderData->getImgs();

	$output = include_once "views/common/carousel.php";
	return $output;
?>