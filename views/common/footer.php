<?php
    $return =  "<footer id='' class='desktop_view'>
    				<div class='footer_class'>
	    				<div class='main_footer'>
	    					<div class='foot_sect' id='sect_one'>
								<form class='sub_sect_one' action='index.php?page=news_letter' method='post'>
									<p><h5>Subscribe to our News letter</h5> To receive notifications about any new products and or musical instrument trends.</p>
									<div class='news_letter_sect'>
										<input class='news_letter form_input' type='text' name='email' placeholder='Enter your Email...'>
										<button class='news_letter form_button' name=''>Submit</button>
									</div>
								</form>
								<div class='sub_sect_one address_sect'>
									<h5>Visit or Talk to Us</h5>
					            	<table class='table table-hover table-borderless'>
					            		<tr>
					            			<th>Address:</th>
					            			<td>No 7, Akinsanmi Avenue, Imala, Elega, Abeokuta, Ogun State, Nigeria.</td>
					            		</tr>
					            		<tr>
					            			<th>Phone:</th>
					            			<td>09064627930</td>
					            		</tr>
					            		<tr>
					            			<th>Email:</th>
					            			<td>henryadedugba@gmail.com</td>
					            		</tr>
					            	</table>
	    						</div>
	    					</div>
	    					<div class='foot_sect' id='sect_two'>
	    						<h5>Useful Links</h5>
					            <div class='foot_links'>
		                            <a href='index.php?page=home'>Home</a>
		                            <a href='index.php?page=contact_pg'>Contact Us</a>
		                            <a href='index.php?page=privacy'>Privacy</a>
		                            <a href='index.php?page=terms_and_conditions'>Terms and Conditions</a>
		                            <a href='index.php?page=faq'>FAQs</a>
			                    </div>
	    					</div>
	    					<div class='foot_sect' id='sect_three'>
	    						<h5>Recent posts</h5>
	    						<div class='sub_sect_three'>";
	    					for($i = 1; $i <= 3; $i++) {
				    			$return .= "<div class='blog_sect'>
				    							<div class='blog_img'>
				    								$i
				    								<img src='' alt='' width='' height=''>
				    							</div>
				    							<div blog_content>
				    								<h6>Blog title here</h6>
				    								<p>
				    									lorem ipsum text as intro goes here, do not forget that...
				    								</p>
				    							</div>
				    						</div>";
				    		}
	    			$return .= "</div>
	    					</div>
	    				</div>
	    				<div class='sub_sect bottom_sect'>
	    					<div class='foot_class main'>
		                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									<b>BUSINESS LOGO</b> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class='fa fa-heart' aria-hidden='true'></i> by <a href='https://colorlib.com' target='_blank'>Henry...</a><br /> 
									Panthera ICL
								</p>
		                    </div>
	    				</div>
		            </div>
		        </footer>
		        
		        <footer id='' class='nav_m mobile_view'>
		        	<div class='footer_sect'>
	    				<div class='sub_sect one'>
	    					<h5>Recent posts</h5>
    						<div class='sub_sect_three'>";
    					for($i = 1; $i <= 3; $i++) {
			    			$return .= "<div class='blog_sect'>
			    							<div class='blog_img'>
			    								$i
			    								<img src='' alt='' width='' height=''>
			    							</div>
			    							<div blog_content>
			    								<h6>Blog title here</h6>
			    								<p>
			    									lorem ipsum text as intro goes here, do not forget that...
			    								</p>
			    							</div>
			    						</div>";
			    		}
    			$return .= "</div>
	    				</div>
	    				<div class='sub_sect two'>
	    					<form class='sub_sect_one' action='index.php?page=news_letter' method='post'>
								<p><h5>Subscribe to our News letter</h5> To receive notifications about any new products and or musical instrument trends.</p>
								<div class='news_letter_sect'>
									<input class='news_letter form_input' type='text' name='email' placeholder='Enter your Email...'>
									<button class='news_letter form_button' name=''>Submit</button>
								</div>
							</form>
	    				</div>
	    				<div class='sub_sect three'>
	    					<h5>Useful Links</h5>
				            <div class='foot_links'>
	                            <a href='index.php?page=home'>Home</a>
	                            <a href='index.php?page=contact'>Contact Us</a>
	                            <a href='index.php?page=privacy'>Privacy</a>
	                            <a href='index.php?page=terms_and_conditions'>Terms and Conditions</a>
	                            <a href='index.php?page=faq'>FAQs</a>
		                    </div>
	    				</div>
	    				<div class='sub_sect four'>
	    					<h5>Visit or Talk to Us</h5>
			            	<table class='table table-hover'>
			            		<tr>
			            			<th>Address:</th>
			            			<td>No 7, Akinsanmi Avenue, Imala, Elega, Abeokuta, Ogun State, Nigeria.</td>
			            		</tr>
			            		<tr>
			            			<th>Phone:</th>
			            			<td>09064627930</td>
			            		</tr>
			            		<tr>
			            			<th>Email:</th>
			            			<td>henryadedugba@gmail.com</td>
			            		</tr>
			            	</table>
	    				</div>
	    				<div class='sub_sect bottom_sect'>
	    					<div class='foot_class main'>
		                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									<b>BUSINESS LOGO</b> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class='fa fa-heart' aria-hidden='true'></i> by <a href='https://colorlib.com' target='_blank'>Henry...</a><br /> 
									Panthera ICL
								</p>
		                    </div>
	    				</div>
	    			</div>
                </footer>";
    return $return;
?>