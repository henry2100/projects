<?php
	$return = " <div class='content_body'>
					<form class='' action='index.php?content=bg_editor' method='post' enctype='multipart/form-data'>
						<center>
                            <h4 style='color:#2a2a2a;'>Upload a new background Picture</h4>
							<input type='hidden' name='user_id' value='$loggedUser->user_id'>
							<div>
								<label></label>
								<div>
									<input class='form-control p-input btn' type='file' name='bg_pic'> 
								</div>
								<small class='form-text text-muted' style='text-align:left;'>Select a picture to serve as your profile background image.</small>
							</div>
							<div>
								<button class='btn btn-success' name='bg_btn'>
									Update
								</button>
							</div>
						</center>
					</form>
				</div>";
	return $return;
?>