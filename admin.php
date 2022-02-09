<?php
	error_reporting(E_ALL);
	ini_set("display_error", 1);

	$dbInfo = "mysql:host=localhost; dbname=personal_db";
	$dbUser = "root";
	$dbPass = "";
	$db = new PDO($dbInfo, $dbUser, $dbPass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	include_once "admin/model/Session_Log.class.php";
	$admin_log = new Session_Log();

	include_once "models/Page_Data.class.php";
	$pg_var = new Page_Data();

	if($admin_log->isLoggedIn()){
		$pg_var->title = "Admin";
		$pg_var->nav = include_once "admin/controllers/common_ctrls/nav.php";
		$navIsClicked = isset($_GET['ad_page']);
		if($navIsClicked){
			$fileToLoad = $_GET['ad_page'];
		}else{
			$fileToLoad = 'dashboard';
		}
		$pg_var->content = include_once "admin/controllers/$fileToLoad.php";
		$pg_var->sidebar = include_once "admin/controllers/common_ctrls/sidebar.php";
		$pg_var->footer = include_once "admin/controllers/common_ctrls/footer.php";
	}else{
		$fileToLoad = 'login';
		$pg_var->title = "Admin not logged";
		$pg_var->content = include_once "admin/controllers/$fileToLoad.php";
	}
	$pg_var->loader = include_once "views/common/loader.php";

	$pg_var->addCSS("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap.min.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap-utilities.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap-utilities.min.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap-grid.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap-grid.min.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap.rtl.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap.rtl.min.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap-utilities.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap-utilities.rtl.css");
    $pg_var->addCSS("admin/assets/bootstrap-5/css/bootstrap-utilities.rtl.min.css");
	$pg_var->addCSS("admin/assets/fontawesome-free/css/all.css");
	$pg_var->addCSS("admin/assets/fontawesome-free/css/all.min.css");
	$pg_var->addCSS("admin/assets/fontawesome-free/css/fontawesome.css");
	$pg_var->addCSS("admin/assets/fontawesome-free/css/fontawesome.min.css");
	/*$pg_var->addCSS("admin/assets/material_resources/css/material-kit.css?v=2.0.7");
	$pg_var->addCSS("admin/assets/material_resources/demo/demo.css");*/
	$pg_var->addCSS("css/jssor_slider.css");
	$pg_var->addCSS("admin/css/layout_20.css");
	$pg_var->addCSS("css/loader.css");

	$pg_var->addJS("admin/assets/JQUERY/jquery-3.3.1.js");
	$pg_var->addJS("admin/assets/material_resources/js/core/jquery.min.js");
    $pg_var->addJS("admin/assets/bootstrap-5/js/bootstrap.bundle.js");
    $pg_var->addJS("admin/assets/bootstrap-5/js/bootstrap.bundle.min.js");
    $pg_var->addJS("admin/assets/bootstrap-5/js/bootstrap.esm.js");
    $pg_var->addJS("admin/assets/bootstrap-5/js/bootstrap.esm.min.js");
    $pg_var->addJS("admin/assets/bootstrap-5/js/bootstrap.js");
    $pg_var->addJS("admin/assets/bootstrap-5/js/bootstrap.min.js");
    $pg_var->addJS("admin/assets/fontawesome-free/js/all.js");
    $pg_var->addJS("admin/assets/fontawesome-free/js/all.min.js");
    //$pg_var->addJS("admin/assets/tinymce_5.9.2_dev/tinymce/js/tinymce/tinymce.min.js");
    $pg_var->addJS("admin/js/contrl_2.js");
	$pg_var->addJS("js/control.js");

	$pg_var->embeddedStyle =   "<style>
									body .wrapp_all .sidebar .sidebar_div nav .nav_links a[href *= '?ad_page=$fileToLoad']{
										border
										radius: 0px;
										color:#f0f0f0;
										padding:1rem;
										font-weight:400;
										box-shadow: 0px 1px 4px #2a2a2a;
										background-color:rgba(100, 100, 100, 0.5);
									}
									body .wrapp_all .body_wrapper #ad_nav .three a[href *= '?ad_page=$fileToLoad']{
										color:rgba(0, 0, 100, 0.4);
										background-color: rgba(0,0,0,0.1);
										border-bottom:3px solid rgba(0, 0, 100, 0.4);
										padding:8%;
										font-weight:400;
									}
								</style>";

	$page = include_once "admin/views/temp/ad_page.php";
	echo $page;
?>