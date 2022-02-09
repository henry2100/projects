<?php
	$return =  "<!DOCTYPE html>
				<html>
					<head>
						<title>$pg_var->title</title>
						<meta charset='utf-8'>
						<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
						<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
						$pg_var->css";
						if($fileToLoad == 'profile'){
							$return .= "$pg->eStyle";
						}
			$return .= "$pg_var->embeddedStyle
						<script type='text/javascript'>
							var _gaq = _gaq || [];
							_gaq.push(['_setAccount', 'UA-32573884-1']);
							_gaq.push(['_gat._forceSSL']);
							_gaq.push(['_setSiteSpeedSampleRate', 100]);
							_gaq.push(['_trackPageview']);
							(function () {
								var ga = document.createElement('script');
								ga.type = 'text/javascript';
								ga.async = true;
								ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
								var s = document.getElementsByTagName('script')[0];
								s.parentNode.insertBefore(ga, s);
							})();
						</script>
						<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
							<!-- BEGIN Tynt Script -->
							<script type='text/javascript'>
							if(document.location.protocol=='http:'){
								var Tynt=Tynt||[];Tynt.push('cIw852sN4r44npacwqm_6r');
								(function(){var s=document.createElement('script');s.async='async';s.type='text/javascript';s.src='http://tcr.tynt.com/ti.js';var h=document.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})();
							}
						</script>
					</head>
					<body id='top'>";
					if(($fileToLoad == 'login') or ($fileToLoad == 'register')){
			$return .= "<div class='wrapper'>
							$pg_var->content
						</div>";
					}else if($fileToLoad == 'home'){
			$return .= "<div class='wrapp'>
							$pg_var->nav
							<div class='slider_sect_home'>
								$pg_var->carousel
							</div>
							<div class='content main_div'>
								$pg_var->content
							</div>
							$pg_var->sidebar
						</div>
						$pg_var->footer";
					}else if($fileToLoad == 'profile'){
						$newCtrl_1 = ucfirst($ctrl);
					    $newCtrl = str_replace('_', ' ', $newCtrl_1);
					    if($ctrl === "dash"){
					    	$newCtrl = "Dashboard";
					    }elseif($ctrl === "investment"){
					    	$newCtrl = "Investment";
					    }elseif($ctrl === "savings"){
					    	$newCtrl = "Savings";
					    }elseif($ctrl === "post"){
					    	$newCtrl = "My Posts";
					    }elseif($ctrl === "settings"){
					    	$newCtrl = "Profile Settings";
					    }elseif($ctrl === "bg_editor"){
					    	$newCtrl = "Background Image Editor";
					    }elseif ($ctrl === "p_editor") {
					    	$newCtrl = "Profile Picture Editor";
					    }
						$return .= "<div class='wrapp'>
										$pg_var->nav
										<div class='prof_wrap'>
											<div class='profile_pg side_sect' style='background-image:url($loggedUser->bg_img);'>
												$pg->prof_side
											</div>
											<div class='profile_pg main_sect'>
												<h3>$newCtrl</h3>
												<hr/>
												$pg->prof_content
											</div>
										</div>
									</div>
									$pg_var->footer";
					}else{
			$return .= "<div class='wrapp'>
							$pg_var->nav
							<div class='img_sect'>";
							if($fileToLoad == 'contact_pg'){
					$return .= "<div class='img_sect_content pages' style='background-image:url(admin/img/defaults/background_imgs/talking_drum.jpg);'>
									<div class='pages_content'>
										<div class='page_body'>
											<h1>Contact Us</h1>
											<p><b>G</b>et in touch with us and also <b>get updated</b> on our <b>products</b> and <b>services</b> via any of our social media platforms.</p>
											<p><b>Also</b>, you can also get in touch with us by sending a direct message via the form below. We are available <b>24/7</b>, so your messages will be attended to as soon as possible.</p>
										</div>
									</div>
								</div>";
							}else if($fileToLoad == 'blog'){
					$return .= "<div class='img_sect_content pages' style='background-image:url(admin/img/defaults/background_imgs/img-4.png);'>
									<div class='pages_content'>
										<div class='page_body'>
											<h1>Blog</h1>
											<p><b>G</b>et in touch with us and also <b>get updated</b> on our <b>products</b> and <b>services</b> via any of our social media platforms.</p>
											<p><b>Also</b>, you can also get in touch with us by sending a direct message via the form below. We are available <b>24/7</b>, so your messages will be attended to as soon as possible.</p>
										</div>
									</div>
								</div>";			
							}
				$return .= "</div>
							<div class='content main_div'>
								$pg_var->content
							</div>
							$pg_var->sidebar
						</div>
						$pg_var->footer";
					}
		$return .= "$pg_var->js
				</body>
			</html>
			$pg_var->loader";
	return $return;
?>