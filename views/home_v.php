<?php
	$return =  "<div class='content_body'>
					<div id='content_text'>";
		if($user_log->isLogged_In()){
			$return .= "<h1 id='welcome_mssg'>Welcome, $out->fname $out->lname!</h1>";
		}else{
			$return .= "<div id='default_box'>
							<h2>Health care Netcentric solution</h2>
							<hr/>
							<br/>
							<p>A stress free approach to guaratee a healthy life.</p>

							

							<p>Click Register to create a secure profile with us and beging your journey to ensure you live a healthy life by being asigned a Medical practioner to respond to your health needs or click Sign in to log into your profile on this platform.</p>
						</div>";
		}
		$return .= "</div>
				</div>

				<div class='scroller_anchor'></div>
				<div class='content_body'>
					<div id='about_box'>
						<h4>About Us</h4>
						<hr/>
						<br/>
						<p>This is an Online platform where individual can easily chat with available medical practioners, and get required medical attention and also ask for advice about other health related issues. Only having to go to the clinic if absolutely neccessary.</p>
					</div>
				</div>

				<div class='scroller_1_anchor'></div>
				<div class='content_body'>
					<div id='services_box'>
						<h4>Services</h4>
						<hr/>
						<br/>
						<div class='main_service_sect'>
							<a href=''>
								<div class='service_divs'>
									<h6>Accounts</h6>
								</div>
							</a>

							<a href=''>
								<div class='service_divs'>
									<h6>Transfer</h6>
								</div>
							</a>

							<a href=''>
								<div class='service_divs'>
									<h6>VTU</h6>
								</div>
							</a>

							<a href=''>
								<div class='service_divs'>
									<h6>Utility</h6>
								</div>
							</a>

							<a href=''>
								<div class='service_divs'>
									<h6>My services</h6>
								</div>
							</a>

							<a href=''>
								<div class='service_divs'>
									<h6>Settings and Help</h6>
								</div>
							</a>
						</div>
					</div>
				</div>

				<div class='scroller_2_anchor'></div>
				<div class='content_body'>
					<div id='contact_box'>
						<h4>Contact</h4>
						<hr/>
						<br/>
						<form id='contact_form' action='index.php?page=' method='post'>
							<div class='row div_row'>
								<label>Name</label>
								<div class='inner_div'>
									<input class='style_input half_input' type='text' name='fname' placeholder='Firstname'>
									<input class='style_input half_input' type='text' name='lname' placeholder='Lastname'>
								</div>
							</div>
							<div class='row div_row'>
								<label>Email</label>
								<div class='inner_div'>
									<input class='style_input full_input' type='email' name='email' placeholder='Email'>
								</div>
							</div>
							<div class='row div_row'>
								<label>Message</label>
								<div class='inner_div'>
									<textarea class='style_input full_input' rows='5' placeholder='Write a direct Message to us'></textarea>
								</div>
							</div>
							<div class='row div_row btn_div'>
								<button class=''>
									Send
								</button>
							</div>
						</form>
					</div>
				</div>

				<div class='scroller_3_anchor'></div>
				<div class='content_body'>
					<div id='faqs_box'>
						<h4>FAQs</h4>
						<hr/>
						<br/>
					</div>
				</div>

				<section id='nav_sub'>
					<div class='hook scroller'>
						<a class='common hook_link'  href='#about_box'>About Us</a>
						<div class='common float_nav'>
							<a class='sub_hook_link' href='index.php?page=home'>Home</a>
							<a class='sub_hook_link' href='#services_box'>Services</a>
							<a class='sub_hook_link' href='#contact_box'>Contact Us</a>
							<a class='sub_hook_link' href='#faqs_box'>FAQs</a>
						</div>
					</div>

					<div class='hook scroller_1'>
						<a class='common hook_link' href='#services_box'>Services</a>
						<div class='common float_nav'>
							<a class='sub_hook_link' href='index.php?page=home'>Home</a>
							<a class='sub_hook_link'  href='#about_box'>About Us</a>
							<a class='sub_hook_link' href='#contact_box'>Contact Us</a>
							<a class='sub_hook_link' href='#faqs_box'>FAQs</a>
						</div>
					</div>
					
					<div class='hook scroller_2'>
						<a class='common hook_link' href='#contact_box'>Contact Us</a>
						<div class='common float_nav'>
							<a class='sub_hook_link' href='index.php?page=home'>Home</a>
							<a class='sub_hook_link' href='#about_box'>About Us</a>
							<a class='sub_hook_link' href='#services_box'>Services</a>
							<a class='sub_hook_link' href='#faqs_box'>FAQs</a>
						</div>
					</div>
					
					<div class='hook scroller_3'>
						<a class='common hook_link' href='#faqs_box'>FAQs</a>
						<div class='common float_nav'>
							<a class='sub_hook_link' href='index.php?page=home'>Home</a>
							<a class='sub_hook_link'  href='#about_box'>About Us</a>
							<a class='sub_hook_link' href='#services_box'>Services</a>
							<a class='sub_hook_link' href='#contact_box'>Contact Us</a>
						</div>
					</div>
				</section>";
	return $return;
?>