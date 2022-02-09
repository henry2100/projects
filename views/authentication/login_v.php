<?php
	if(isset($signIn_ErrMssg) === false){
		$signIn_ErrMssg = "";
	}
	if(isset($success) === false){
		$success = "";
	}
	$return =  "<form id='login_form' action='index.php?page=login' method='post'>
					<h3>Login</h3>
					<hr/>";
                if($signIn_ErrMssg and ($signIn_ErrMssg != $success)){
                    $return .= "<div id='err_block' class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <i class='material-icons'>warning</i>
                                    <b>Warning:</b> $signIn_ErrMssg
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true' class='close'>
                                            <i class='material-icons'>clear</i>
                                        </span>
                                    </button>
                                </div>";
                }else{
                    $return .= "";
                }
		$return .= "<div class='row div_row'>
						<label>Username</label>
						<div class='inner_div'>
							<input class='style_input' type='text' name='uname' placeholder='Username'>
						</div>
					</div>
					<div class='row div_row'>
						<label>Email</label>
						<div class='inner_div'>
							<input class='style_input' type='email' name='email' placeholder='Email'>
						</div>
					</div>
					<div class='row div_row'>
						<label>Password</label>
						<div class='inner_div'>
							<input class='style_input' type='password' name='pwd' placeholder='Password'>
						</div>
					</div>
					<a class='form_link' href='index.php?page=home'>return</a>
					<hr/>
					<center>
						<div class='row div_row btn_div'>
							<button name='user_login_btn'>
								Submit
							</button>
						</div>
						<a href='index.php?page=register'>Create Profile</a>
					</center>
				</form>";
	return $return;
?>