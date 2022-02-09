<?php
    $return =  "<!DOCTYPE html5>
			    <html>
			        <head>
			            <title>$pg_var->title</title>
			            <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>            
			            <meta name='viewport' width='device-width; initial-scale=1.0'>
			           $pg_var->css
			            $pg_var->embeddedStyle
			        </head>
			        <body>";
			    if(($fileToLoad == 'login') or ($fileToLoad == 'signup')){
			$return .= "<div class='wrapper'>
							$pg_var->content
						</div>";
				}else{
			$return .= "<div id='contain_all' class='wrapp_all'>
			            	$pg_var->sidebar
			                <div id='body_wrapper-id' class='body_wrapper'>
			                    $pg_var->nav
			                    <div class='main_panel common'>
			                        <div class='content_wrapper'>
			                            $pg_var->content
			                            $pg_var->footer
			                        </div>
			                    </div>
			                </div>
			            </div>";
			    }
		$return .= "</body>
			        $pg_var->js
			    </html>
			    $pg_var->loader";
	return $return;
?>