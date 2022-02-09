<?php
	include_once "models/User_Table.class.php";
	$userData = new User_Table($db);

	if($user_log->isLogged_In()){
		$email = $_SESSION['email'];
        $uname = $_SESSION['uname'];
        try{
        	$loggedUser = $userData->getUserData($email, $uname);

           /* $var =  $loggedUser->reg_date;

            $date = date("F d, Y h:i:s A");*/

            /*$timestamp = time($loggedUser->reg_date);*/

           /* $date1 = mktime(23, 35, 40, 3, 27, 1998);

            $date = date("F d, Y h:i:s A", $date1);*/
        	
        	$_SESSION['message'] = "Logged in successfully!";

            $loggedErrMssg = $_SESSION['message'];
        }catch(Excception $e){
        	$loggedErrMssg = $e->getMessage();
        }
	}

    include_once "models/Content_Ctrl.class.php";

    $pg = new Content_Ctrl();

    $sidebarClicked = isset($_GET['content']);
    if($sidebarClicked){
        $ctrl = $_GET['content'];
    }else{
        $ctrl = 'dash';
    }
    $pg->prof_content = include_once "controllers/profile/$ctrl.php";
    $pg->prof_side = include_once "controllers/prof_side_ctrl.php";
    $pg->eStyle ="  <style>
                        body .wrapp .prof_wrap .side_sect .action_sect a[href *= '?content=$ctrl']{
                            display: block;
                            color:#fff;
                            padding:1rem;
                            background-color: rgba(0,0,0,0.5);
                        }
                    </style>";
?>