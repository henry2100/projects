<?php
	include_once "admin/model/Table.class.php";

	class Slider_Table extends Table{
		public function addImg($image, $caption, $link){
			$sql = "INSERT INTO slider_hp_tb (img, caption, img_link) VALUES (?, ?, ?)";
			$data = array($image, $caption, $link);
			$statement = $this->executeStatement($sql, $data);
			if($statement->rowCount() > 0){
				return $statement;
			}else{
				$uploadErrSlider = new Exception("There was a problem uploading this image to the slider!");
				throw $uploadErrSlider;
			}
		}
		public function getImgs(){
			$sql = "SELECT * FROM slider_hp_tb ORDER BY created DESC LIMIT 5";
			$statement = $this->executeStatement($sql);
			if($statement->rowCount() > 0){
				return $statement;
			}else{
				$emptySlider = new Exception("There are no images to display in the slider!");
				throw $emptySlider;
			}
		}
		public function getAllImgs(){
			$sql = "SELECT *, SUBSTRING(caption, 1, 15) AS cap, SUBSTRING(img_link, 1, 15) AS imgs FROM slider_hp_tb ORDER BY created DESC LIMIT 10";
			$statement = $this->executeStatement($sql);
			if($statement->rowCount() > 0){
				return $statement;
			}else{
				$emptySlider = new Exception("There are no images to display in the slider!");
				throw $emptySlider;
			}
		}
		public function getImgID(){
			$sql = "SELECT id, created FROM slider_hp_tb ORDER BY created DESC LIMIT 3";
			$statement = $this->executeStatement($sql);
			$model = $statement->fetchObject();
			return $model;
		}
		public function removeSlide($id){
			$sql = "DELETE FROM slider_hp_tb WHERE id = ?";
			$data = array($id);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
	}
?>