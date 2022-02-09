<?php
	$return = "<div class='content_body'>
					<div id='contact_box'>
						<h4>Contact</h4>
						<hr/>
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
				</div>";
	return $return;
?>