<?php
	class Admin_Page_Data{
		public $title = "";
		public $content = "";
		public $sidebar = "";
		public $nav = "";
		public $footer = "";
		public $loader = "";
		public $css = "";
		public $js = "";
		public $embeddedStyle = "";

		public function addCSS($href){
			$this->css .= "<link rel='stylesheet' type='text/css' href='$href'>";
		}
		public function addScript($src){
			$this->js .= "<script type='text/javascript' src='$src'></script>";
		}
	}
?>