<?php
	$return =  "<nav id='' class='nav desktop_view'>
					<div class='nav_sect sect_one'>
						<span>IMS</span>
					</div>
					<div class='nav_sect sect_two'>
						<center>";
						if($user_log->isLogged_In()){
				$return .= "<a href='index.php?page=blog'>Home</a>
							<a href='index.php?page=profile'>Profile</a>
							<a href='index.php?page='>Posts</a>";
						}else{
				$return .= "<a href='index.php?page=home'>Home</a>
							<a href='#about_box'>About</a>
							<a href='#services_box'>Services</a>
							<a href='#contact_box'>Contact Us</a>
							<a href='index.php?page=blog'>Blogs</a>
							<a href='#faqs_box'>FAQs</a>";
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
				</nav>

				<nav id='' class='nav_m mobile_view'>
					<div class='nav_sect_m sect_one_m'>
						<span>BUSINESS LOGO</span>
					</div>
					<div class='nav_sect_m sect_two_m'>
						<div id='menu_btn' class='d-flex'>
						  	<div class='drp_dwn_sect dropdown me-1'>
							    <button type='button' class='nav_menu dropdown-toggle' id='dropdownMenuOffset' data-bs-toggle='dropdown' aria-expanded='false' data-bs-offset='10,20'>
							      	Menu
							    </button>
							    <ul class='dropdown-menu' aria-labelledby='dropdownMenuOffset'>
							      	<li><a class='dropdown-item' href='#'>Home</a></li>
							      	<li><a class='dropdown-item' href='#'>Blog</a></li>
							      	<li><a class='dropdown-item' href='#'>About</a></li>
							      	<li><a class='dropdown-item' href='#'>Contact Us</a></li>
							      	<li><a class='dropdown-item' href='#'>FAQs</a></li>
							      	<li><hr class='dropdown-divider'></li>
								  	<li><a class='dropdown-item' href='#'>Register</a></li>
								  	<li><a class='dropdown-item' href='#'>Log In</a></li>
							    </ul>
							</div>
						</div>
					</div>
				</nav>";
	return $return;
?>
