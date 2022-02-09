<?php
	$return =  "<!-- Jssor Slider Begin -->

				<div id='slider1_container' class='main_slider' style='visibility: hidden; position: relative; margin: 0 auto; width: 100%; height:50px; overflow: hidden;'>

		            <!-- Slides Container -->
		            <div u='slides' class='slider_img' style='position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;
		            overflow: hidden;'>";

					while ($row = $result->fetchObject()) {
						$return .= "<div class='used_div'> 
										<a href='$row->img_link'>
											<img data-u='' src='$row->img' alt='slider_img' >
											<!--<figcaption>$row->caption</figcaption>-->
										</a>
									</div>";
					}

		            
		$return .= "</div>
					<!--#region Bullet Navigator Skin Begin -->
		            <!-- Help: https://www.jssor.com/development/slider-with-bullet-navigator.html -->
		            
		            <div data-u='navigator' class='jssorb031' style='position:absolute;bottom:5px;right:12px;' data-autocenter='1' data-scale='0.5' data-scale-bottom='0.75'>
		                <div data-u='prototype' class='i' style='width:10px;height:10px;'>
		                    <svg viewBox='0 0 16000 16000' style='position:absolute;top:0;left:0;width:100%;height:100%;'>
		                        <circle class='b' cx='8000' cy='8000' r='5800'></circle>
		                    </svg>
		                </div>
		            </div>
		            <!--#endregion Bullet Navigator Skin End -->
		        
		            <!--#region Arrow Navigator Skin Begin -->
		            <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
		        
		            <div data-u='arrowleft' class='jssora051' style='width:8px;height:8px;top:0px;left:25px;' data-autocenter='2' data-scale='0.75' data-scale-left='0.75'>
		                <svg viewBox='0 0 16000 16000' style='position:absolute;top:0;left:0;width:100%;height:100%;'>
		                    <polyline class='a' points='11040,1920 4960,8000 11040,14080 '></polyline>
		                </svg>
		            </div>
		            <div data-u='arrowright' class='jssora051' style='width:8px;height:8px;top:0px;right:25px;' data-autocenter='2' data-scale='0.75' data-scale-right='0.75'>
		                <svg viewBox='0 0 16000 16000' style='position:absolute;top:0;left:0;width:100%;height:100%;'>
		                    <polyline class='a' points='4960,1920 11040,8000 4960,14080 '></polyline>
		                </svg>
		            </div>
		            <!--#endregion Arrow Navigator Skin End -->
		        </div>
		        <!-- Jssor Slider End -->";
	return $return;
?>