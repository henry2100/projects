<?php
	$return =  "<div class='content_body'>
					<div class='card'>
						<div class='editor_title form_div'>
		                  	<h4 class='card-title'>Subscribers</h4>
		                </div>
	                    <div class='subscriber_table'>
	                    	<table class='table table-hover table-borderless'>
	                    		<thead>
	                    			<tr>
	                    				<th>ID</th>
	                    				<th>Email</th>
	                    				<th>Date of SubScription</th>
	                    				<th>Remove</th>
	                    			</tr>
	                    		</thead>
	                    		<tbody>";
	                while($row = $custom->fetchObject()) {
	                	$href2 = "admin.php?ad_page=remove_subscriber&amp;id=$row->id";
	                	$return .= "<tr>
	                    				<td><a class='table_links' href='#'>$row->id</a></td>
	                    				<td><a class='table_links' href='#'>$row->email</a></td>
	                    				<td><a class='table_links' href='#'>$row->sub_date</a></td>
	                    				<td>
	                    					<a class='my_btn' href='$href2'>
	                    						Delete
	                    					</a>
	                    				</td>
	                    			</tr>";
	                }
	                $return .= "</tbody>
	                		</table>
	            			<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
								<nav id='desktop_nav' class='pagination_nav' aria-label='Page navigation example'>
							  		<ul class='pagination justify-content-center'>";
									if($page_no <= 1){
										$return .= "<li class='page-item disabled'>
														<a class='page-link '>
															&lsaquo;&lsaquo; First Page
														</a>
													</li>";
									}else{
										$return .= "<li class='page-item'>
														<a class='page-link' href='admin.php?ad_page=subscribers&amp;page_no=1'>
															&lsaquo;&lsaquo; First Page
														</a>
													</li>";
									}
									if($page_no <= 1){
										$return .= "<li class='page-item disabled'>
											      		<a class='page-link'>
											      			&lsaquo; Previous
											      		</a>
											    	</li>";
									}else{
										$return .= "<li class='page-item'>
														<a class='page-link' href='admin.php?ad_page=subscribers&amp;page_no=$previous_page'>
															&lsaquo; Previous 
														</a>
													</li>";
									}

									$return .= "<li class='page-item disabled'>
													<strong class='page-link'>Page $page_no of $total_no_of_pages</strong>
												</li>";

									if($page_no >= $total_no_of_pages){
										$return .= "<li class='page-item disabled'>
											      		<a class='page-link'>
											      			Next &rsaquo;
											      		</a>
											    	</li>";
									}else{
										$return .= "<li class='page-item'>
														<a class='page-link' href='admin.php?ad_page=subscribers&amp;page_no=$next_page'>
															Next &rsaquo;
														</a>
													</li>";
									}
									if($page_no >= $total_no_of_pages){
										$return .= "<li class='page-item disabled'>
														<a class='page-link'>
															Last Page &rsaquo;&rsaquo;
														</a>
													</li>";
									}else{
										$return .= "<li class='page-item'>
														<a class='page-link' href='admin.php?ad_page=subscribers&amp;page_no=$total_no_of_pages'>
															Last Page &rsaquo;&rsaquo;
														</a>
													</li>";
									}
						$return .= "</ul>
								</nav>
							</div>
	                    </div>
					</div>
				</div>";
	return $return;
?>