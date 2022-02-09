<?php
	if(isset($loggedErrMssg) === false ) {
		$loggedErrMssg = "";
    }
    if(isset($adminFormMessage) === false ) {
        $adminFormMessage = "";
    }
    if(isset($adminFormMessage2) === false ) {
        $adminFormMessage2 = "";
    }
    if(isset($editProfileMssg) === false ) {
        $editProfileMssg = "";
    }
    if(isset($success) == false){
        $success = "";
    }
	$return =  "<div class='content_body'>
                    <div id='profile_page'>
    					<h4>Profile</h4>
    					<hr/>";
        if($loggedErrMssg and ($loggedErrMssg == $_SESSION['message'])){
                $return .= "<div id='err_block' class='alert alert-success alert-dismissible fade show' role='alert'>
                                <i class='material-icons'>check</i>
                                <b>Success:</b> $loggedErrMssg
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true' class='close'>
                                        <i class='material-icons'>clear</i>
                                    </span>
                                </button>
                            </div>";
            unset($_SESSION['message']);

            $return .= "<script>
                            setTimeout(function() {
                                let alert = document.querySelector('.alert');
                                    alert.remove();
                            }, 3000);
                        </script>";
        }else{
            $return .= "";
        }
		$return .= "<div id='user_contain'>
                        <div class='user_page user_img' style=''>
                            <img id='image' src='$loggedUser->profile_pic' alt='user_image' style='width:100%; height:350px; border-radius:50%;'>
                        </div>
                        <div class='user_page user_data'>
                            <div class='data_sect tab_sect'>
                                <table class='table table-hover'>
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td class='tab-data'>$loggedUser->fname $loggedUser->lname</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td class='tab-data'>$loggedUser->uname</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td class='tab-data' style='color:green;'>$loggedUser->email</td>
                                        </tr>
                                        <tr>
                                            <th>Registeration Date</th>
                                            <td class='tab-data'>$loggedUser->reg_date</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class='data_sect edit_btn'>
                                <form id='profile_btn' action='#' method=''>
                                    <button type='button' class='my_btn more_comment' id='myBtn_1' data-target='#myModal_1'>
                                        Profile picture
                                    </button>

                                    <button type='button' class='my_btn more_comment' id='myBtn_2' data-target='#myModal_2'>
                                        Edit Name
                                    </button>

                                    <button type='button' class='my_btn more_comment' id='myBtn_3' data-target='#myModal_3'>
                                        Edit Password
                                    </button>

                                    <button type='button' class='my_btn more_comment' id='myBtn_4' data-target='#myModal_4'>
                                        Change Background 
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
               	</div>
            </div>

               	<div>
                    <div id='myModal_1' class='modal myModals bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Manage Profile Picture</h5>
                                </div>
                                <div class='modal-body'>
                                    <form action='index.php?page=settings' method='post' enctype='multipart/form-data'>
                                        <center>
                                            <h4 style='color:#575757;'>Change Profile Picture</h4>
                                        </center>
                                        <div class='form-group'>
                                            <input type='hidden' name='user_id' value='$loggedUser->user_id'>
                                            <label for='exampleInputFile'>Change Profile Picture</label>
                                            <input type='file' name='prof_pic' class='form-control p-input' value='$loggedUser->profile_pic' required>
                                            <small class='form-text text-muted'>Select a picture to serve as your blog post profile picture.</small>
                                        </div>
                                        <center>
                                            <button class='btn btn-outline-success' type='submit' name='changePic' value='upload' style='width:50%; margin:2%; margin-bottom:0%;'>
                                                Upload
                                            </button>
                                        </center>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true' class='close1'>
                                            <i class='material-icons'>clear</i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id='myModal_2' class='modal myModals bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Manage Name</h5>
                                </div>
                                <div class='modal-body'>
                                    <form action='index.php?page=settings' method='post'>
                                        <center>
                                            <h4 style='color:#575757;'>Edit Name</h4>
                                        </center>
                                        <input type='hidden' name='id' value='$loggedUser->user_id'>
                                        <div class='form-group'>
                                            <label class='small mb-1' for='inputFirstName'>First Name</label>
                                            <input class='form-control py-4' id='inputFirstName' type='text' name='firstname' value='$loggedUser->fname'/>
                                        </div>
                                        <div class='form-group'>
                                            <label class='small mb-1' for='inputLastName'>Last Name</label>
                                            <input class='form-control py-4' id='inputLastName' type='text' name='lastname' value='$loggedUser->lname'/>
                                        </div>
                                        <!--<div class='form-group'>
                                            <label class='small mb-1' for='inputUsername'>Username</label>
                                            <input class='form-control py-4' id='inputUsername' type='text' aria-describedby='username' name='username' value='$loggedUser->uname'/>
                                        </div>
                                        <div class='form-group'>
                                            <label class='small mb-1' for='inputEmailAddress'>Email</label>
                                            <input class='form-control py-4' id='inputEmailAddress' type='email' aria-describedby='emailHelp' name='email' value='$loggedUser->email'/>
                                        </div>-->
                                        <center>
                                            <button class='btn btn-outline-success but_' type='submit' name='editProfile' value='save' style='width:50%; margin:2%; margin-bottom:0%;'>
                                                Save
                                            </button>
                                        </center>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true' class='close2'>
                                            <i class='material-icons'>clear</i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id='myModal_3' class='modal myModals bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Manage Password</h5>
                                </div>
                                <div class='modal-body'>
                                    <form action='index.php?page=settings' method='post'>
                                        <center>
                                            <h4 style='color:#575757;'>Change Password</h4>
                                        </center>
                                        <input type='hidden' name='id' value='$loggedUser->user_id'>
                                        <div class='form-group'>
                                            <label class='small mb-1' for='userpass'>Old Password</label>
                                            <input class='form-control py-4' id='userpass' type='password' aria-describedby='userpass' name='oldPassword' placeholder='Enter your old password here'/>
                                        </div>
                                        <div class='form-group'>
                                           <label class='small mb-1' for='inputPassword'>Password</label>
                                           <input class='form-control py-4' id='inputPassword' type='password' name='password_1' placeholder='Enter new password'/>
                                        </div>
                                        <div class='form-group'>
                                           <label class='small mb-1' for='inputConfirmPassword'>Confirm Password</label>
                                           <input class='form-control py-4' id='inputConfirmPassword' type='password' name='password_2' placeholder='Confirm new password'/>
                                        </div>
                                        <center>
                                            <button class='btn btn-outline-success but_' type='submit' name='changePasswd' value='save' style='width:50%; margin:2%; margin-bottom:0%;'>
                                                Save
                                            </button>
                                        </center>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true' class='close3'>
                                            <i class='material-icons'>clear</i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id='myModal_4' class='modal myModals bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Manage Background Image</h5>
                                </div>
                                <div class='modal-body'>
                                    <form action='index.php?page=settings' method='post' enctype='multipart/form-data'>
                                        <center>
                                            <h4 style='color:#575757;'>Upload a new background Picture</h4>
                                        </center>
                                        <div class=''>
                                            <input type='hidden' name='user_id' value='$loggedUser->user_id'>
                                            <label for='exampleInputFile'>Change Profile Picture</label>

                                            <input type='file' name='bg_img' class='form-control p-input' value='$loggedUser->profile_pic' required>

                                            <small class='form-text text-muted'>Select a picture to serve as your profile background image.</small>
                                        </div>
                                        <center>
                                            <button class='btn btn-outline-success' type='submit' name='change_bg' value='upload' style='width:50%; margin:2%; margin-bottom:0%;'>
                                                Upload
                                            </button>
                                        </center>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-danger' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true' class='close4'>
                                            <i class='material-icons'>clear</i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
	return $return;
?>