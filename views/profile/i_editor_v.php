<?php
	$return = " <div class='content_body'>
					<form class='' action='index.php?content=p_editor' method='post'>
                        <h4 style='color:#2a2a2a;'>Change profile information</h4>
						<input type='hidden' name='user_id' value='$loggedUser->user_id'>
						<div>
							<label>Name</label>
							<div>
								<input class='form-control p-input btn' type='text' name='fname' placeholder='Firstname'> 
								<input class='form-control p-input btn' type='text' name='lname' placeholder='Lastname'> 
							</div>
						</div>
						<div>
							<div>
								<label>Date of Birth</label>
								<input class='form-control p-input btn' type='date' name='dob'>
							</div>
							<div>
								<label>Mobile</label>
								<input class='form-control p-input btn' type='text' name='mobile' placeholder='Phone Number'>
							</div>
						</div>

						<!--<div>
							<div>
								<label>Username</label>
								<input class='form-control p-input btn' type='text' name='uname' placeholder='Username'>
							</div>
							<div>
								<label>email</label>
								<input class='form-control p-input btn' type='text' name='email' placeholder='Email'>
							</div>
						</div>-->

						<small class='form-text text-muted' style='text-align:left;'>Select a picture to serve as your profile picture.</small>
						<div>
							<center>
								<button class='btn btn-success' name='p_btn'>
									Update
								</button>
							<center>
						</div>
					</form>
				</div>";
	return $return;
?>