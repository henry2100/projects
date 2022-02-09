<?php
	error_reporting(E_ALL);
	ini_set("display_error", 1);

	$dbInfo = "mysql:host=localhost; dbname=personal_db";
	$dbUser = "root";
	$dbPass = "";
	$db = new PDO($dbInfo, $dbUser, $dbPass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	include_once "models/User_Session_Log.class.php";
	$user_log = new User_Session_Log();

	include_once "models/Page_Data.class.php";
	$pg_var = new Page_Data();

	include_once "models/User_Table.class.php";
	$userData = new User_Table($db);

	$pg_var->nav = include_once "views/common/nav.php";
	//$pg_var->nav2 = include_once "views/common/nav2.php";
	if($user_log->isLogged_In()){
		$pg_var->title = "frontend logged";
		
		$navIsClicked = isset($_GET['page']);
		if($navIsClicked){
			$fileToLoad = $_GET['page'];
		}else{
			$fileToLoad = 'profile';
		}
		$email = $_SESSION['email'];
        $uname = $_SESSION['uname'];
        try{
        	$loggedUser = $userData->getUserData($email, $uname);
        }catch(Excception $e){
        	$loggedErrMssg = $e->getMessage();
        }

		$pg_var->content = include_once "controllers/$fileToLoad.php";
		$pg_var->prof_side = include_once "controllers/prof_side_ctrl.php";
	}else{

		$pg_var->title = "frontend no_session";
		//$pg_var->nav = include_once "views/common/nav.php";
		$navIsClicked = isset($_GET['page']);
		if($navIsClicked){
			$fileToLoad = $_GET['page'];
		}else{
			$fileToLoad = 'home';
		}
		$pg_var->content = include_once "controllers/$fileToLoad.php";
	}
	$pg_var->carousel = include_once "controllers/slider_ctrl.php";
	$pg_var->sidebar = include_once "controllers/sidebar_ctrl.php";
	$pg_var->footer = include_once "views/common/footer.php";
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
	$pg_var->addCSS("admin/assets/material_resources/css/material-kit.css?v=2.0.7");
	$pg_var->addCSS("admin/assets/material_resources/demo/demo.css");
	$pg_var->addCSS("css/jssor_slider.css");
	$pg_var->addCSS("css/layout_52.css");
	$pg_var->addCSS("css/loader.css");

	//$pg_var->addJS("js/jquery-1.9.1.min.js");
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
    $pg_var->addJS("js/jssor.slider.min.js");
	$pg_var->addJS("js/docs.min.js");
	$pg_var->addJS("js/ie10-viewport-bug-workaround.js");
	$pg_var->addJS("js/modal_1.js");
	$pg_var->addJS("js/modal_2.js");
	$pg_var->addJS("js/control.js");
	/*$pg_var->addJS("js/default.js");*/
	$pg_var->addJS("js/slider_ctrl.js");
	$pg_var->addJS("js/change_navbar_5.js");

	$pg_var->embeddedStyle =   "<style>
									body .wrapp .nav .sect_two a[href *= '?page=$fileToLoad']{
										text-decoration: none;
										color:rgba(0,0,100,0.5);
										border-bottom:5px solid rgba(0,0,150,1);
										padding:2%;
										font-weight:400;
									}
									body .wrapp #nav .sect_three a[href *= '?page=$fileToLoad']{
										text-decoration: none;
										color:rgba(0,0,100,0.5);
										border-bottom:5px solid rgba(0,0,150,1);
										padding:4%;
										font-weight:400;
									}
									body footer .main_footer #sect_two .foot_links a[href *= '?page=$fileToLoad']{
										color:#f0f0f0;
										padding:1%;
										font-weight:400;
										background-color:rgba(0, 0, 150, 1);
										/*box-shadow: rgba(0, 0, 100, 0.4) 2px 2px 2px 2px;*/
									}
								</style>";

	$page = include_once "views/temp/page.php";
	echo $page;
?>