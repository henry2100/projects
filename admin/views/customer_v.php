<?php
	$return =  "<div class='customers' style='background-color:rgba(0,0,0,0.1); border-radius:10px;'>
					<center>
                        <h1 class='searchResult'>All <em style='color:rgba(47, 57, 71, 0.8);'>Customers</em></h1>
                    </center>
                    <div id='stu_sect'>
                    	<table class='table table-hover'>
                    		<thead>
                    			<tr>
                    				<th>profile Image</th>
                    				<th>Name</th>
                    				<th>Username</th>
                    				<th>Email</th>
                    				<th>Remove</th>
                    			</tr>
                    		</thead>
                    		<tbody>";
                while($row = $customer->fetchObject()) {
                	$href = "admin.php?ad_page=customers&amp;id=$row->user_id";
                	$href2 = "admin.php?ad_page=remove_entity&amp;id=$row->user_id";
                	$href3 = "admin.php?ad_page=register_student&amp;id=$row->user_id";
                	$return .= "<tr>
                    				<td><a class='table_links' href='$href'><img src='$row->profile_pic' alt='profile_pic' style='width:45px; height:45px;  border-radius:50%;'></a></td>
                    				<td><a class='table_links' href='$href'>$row->lname $row->fname</a></td>
                    				<td><a class='table_links' href='$href'>$row->uname</a></td>
                    				<td><a class='table_links' href='$href'>$row->email</a></td>
                    				<td>
                    					<a class='btn btn-danger' href='$href2'>
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
													<a class='page-link' href='admin.php?ad_page=customers&amp;page_no=1'>
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
													<a class='page-link' href='admin.php?ad_page=customers&amp;page_no=$previous_page'>
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
													<a class='page-link' href='admin.php?ad_page=customers&amp;page_no=$next_page'>
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
													<a class='page-link' href='admin.php?ad_page=customers&amp;page_no=$total_no_of_pages'>
														Last Page &rsaquo;&rsaquo;
													</a>
												</li>";
								}
					$return .= "</ul>
							</nav>
						</div>
                    </div>
				</div>";
	return $return;
?>