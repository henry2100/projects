<?php
	if(isset($admin_log_err) === false){
		$admin_log_err = "";
	}
	if(isset($success) === false){
		$success = "";
	}
	$return =  "<form id='login_form' action='admin.php?ad_page=login' method='post'>
					<h3>Login</h3>
					<hr/>";
                if($admin_log_err and ($admin_log_err != $success)){
                    $return .= "<div id='err_block' class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <i class='material-icons'>warning</i>
                                    <b>Warning:</b> $admin_log_err
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true' class='close'>
                                            <i class='material-icons'>clear</i>
                                        </span>
                                    </button>
                                </div>";
                }else{
                    $return .= "";
                }
		$return .= "<div class='row'>
						<label>Email</label>
						<div class='inner_div'>
							<input class='style_input' type='email' name='email' placeholder='Email'>
						</div>
					</div>
					<div class='row'>
						<label>Password</label>
						<div class='inner_div'>
							<input class='style_input' type='password' name='pwd' placeholder='Password'>
						</div>
					</div>
					<hr/>
					<center>
						<div class='row btn_div'>
							<button name='login_btn'>
								Submit
							</button>
						</div>
						<a href='index.php?page=register'>Create Profile</a>
					</center>
				</form>";
	return $return;
?>