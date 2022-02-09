<?php
	$return = "<nav id='' class='nav desktop_view'>
					<div class='nav_sect sect_one'>
						<span>HMS</span>
					</div>
					<div class='nav_sect sect_two'>
						<center>";
						if($user_log->isLogged_In()){
				$return .= "<a href='index.php?page=blog'>Home</a>
							<a href='index.php?page=profile'>Profile</a>
							<a href='index.php?page='>Posts</a>
							<a href='index.php?page=account'>Account</a>";
						}else{
				$return .= "<a href='index.php?page=home'>Home</a>
							<a href='index.php?page=about'>About</a>
							<a href='index.php?page=services'>Services</a>
							<a href='index.php?page=contact_pg'>Contact Us</a>
							<a href='index.php?page=blog'>Blogs</a>
							<a href='index.php?page=faqs'>FAQs</a>";
						}
			$return .= "</center>
					</div>
					<div class='nav_sect sect_three'>
						<center>";
						if($user_log->isLogged_In()){
							$return .= "<a href='index.php?page=logout'>Log Out</a>";
						}else{
							$return .= "<a href='index.php?page=login'>Log in</a>
										|
										<a href='index.php?page=register'>Register</a>";
						}
						$return .= "</center>
					</div>
				</nav>";
	return $return;
?>