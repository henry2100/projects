<?php
	$return = "	<div class='prof_nav'>
					<h4>
						$loggedUser->fname $loggedUser->lname
					</h4>
					<small class='text-muted'>$loggedUser->email</small>
					<hr/>
					<div class='inner img_sect'>
						<img id='image' src='$loggedUser->profile_pic' alt='user_image'>
					</div>
					<div class='inner action_sect'>
						<a href='index.php?content=dash'>Dashboard</a>
						<a href='index.php?content='>Personal Info</a>
						<a href='index.php?content=investment'>Investment</a>
						<a href='index.php?content=wallet'>Wallet</a>
						<div class='dropdown'>
							<a class='dropbtn'>Post</a>
							<div class='dropdown-content'>
							    <a href='index.php?content=posts'>My Posts</a>
							    <a href='index.php?content=editor'>Add New</a>
							</div>
						</div>
						<div class='dropdown'>
							<a class='dropbtn'>Settings</a>
							<div class='dropdown-content'>
							    <a href='index.php?content=bg_editor'>Background</a>
							    <a href='index.php?content=p_editor'>Profile Picture</a>
							    <a href='index.php?content=i_editor'>Details</a>
							    <a href='index.php?content=pwd_editor'>Password</a>
							</div>
						</div>
						<a href=''>Sign out</a>
					</div>
				</div>";
	return $return;
?>