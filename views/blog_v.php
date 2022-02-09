<?php
	$return =  "<div class='content_body'>
					<center>
						<div class='blog'>";
							while($row = $entries->fetchObject()){
								$href = "index.php?page=blog&amp;id=$row->id";
								$return .= "<div class='each_entry'>
			                                    <a href='$href' style='text-decoration:none; text-align:center;'>
			                                        <div class='single_entry crd-container'>
			                                            <div class='single_entry_inner'>
			                                                <img class='single_entry_img' src='$row->blog_pic' alt='blog_img'>
			                                            </div>
			                                            <div class='overlay'>
			                                                
			                                            </div>
			                                        </div>
			                                    </a>
			                                    <div class='text'>
			                                        <a href='$href' style=''>
			                                            <h3 class='entry_title'><b>$row->blog_title</b></h3>
			                                        </a>
			                                        <div class='entry_info'>
			                                            <h5 style='color:#575757; text-align:left;'>$row->author</h5>
			                                            <small class='post_date'>";
			                                              if($row->category == 'Current News'){
														        $return .= "<a style='color:#9c27b0;' href='index.php?page=current_news'>$row->category</a>";
														    }else{
														        $return .= "<a style='color:#9c27b0;' href='index.php?page=$row->category'>$row->category</a>";
														    }
			                                $return .= "</small>
			                                			<small class='text-muted'>$row->date_created
			                                			</small>
			                                        </div>
			                                        <div class='entry_body'>
			                                            $row->intro...
			                                            <br/><br/>
			                                            <a href='$href = 'index.php?page=blog&amp;id=$row->id;' class='my_btn'>Open &rsaquo;&rsaquo;</a>
			                                        </div>
			                                    </div>
			                                </div>";
							}
				$return .= "<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
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
														<a class='page-link' href='index.php?page=blog&amp;page_no=1'>
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
														<a class='page-link' href='index.php?page=blog&amp;page_no=$previous_page'>
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
														<a class='page-link' href='index.php?page=blog&amp;page_no=$next_page'>
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
														<a class='page-link' href='index.php?page=blog&amp;page_no=$total_no_of_pages'>
															Last Page &rsaquo;&rsaquo;
														</a>
													</li>";
									}
						$return .= "</ul>
								</nav>
								<!--<nav id='mobile_nav' class='pagination_nav' aria-label='Page navigation example'>
							  		<ul class='pagination justify-content-center'>";
									if($page_no <= 1){
										$return .= "<li class='page-item disabled'>
														<a class='page-link '>
															&lsaquo;&lsaquo;
														</a>
													</li>";
									}else{
										$return .= "<li class='page-item'>
														<a class='page-link' href='index.php?page=blog&amp;page_no=1'>
															&lsaquo;&lsaquo;
														</a>
													</li>";
									}
									if($page_no <= 1){
										$return .= "<li class='page-item disabled'>
											      		<a class='page-link'>
											      			&lsaquo;
											      		</a>
											    	</li>";
									}else{
										$return .= "<li class='page-item'>
														<a class='page-link' href='index.php?page=blog&amp;page_no=$previous_page'>
															&lsaquo; 
														</a>
													</li>";
									}

									$return .= "<li class='page-item disabled'>
													<strong class='page-link'>$page_no / $total_no_of_pages</strong>
												</li>";

									if($page_no >= $total_no_of_pages){
										$return .= "<li class='page-item disabled'>
											      		<a class='page-link'>
											      			&rsaquo;
											      		</a>
											    	</li>";
									}else{
										$return .= "<li class='page-item'>
														<a class='page-link' href='index.php?page=blog&amp;page_no=$next_page'>
															&rsaquo;
														</a>
													</li>";
									}
									if($page_no >= $total_no_of_pages){
										$return .= "<li class='page-item disabled'>
														<a class='page-link'>
															&rsaquo;&rsaquo;
														</a>
													</li>";
									}else{
										$return .= "<li class='page-item'>
														<a class='page-link' href='index.php?page=blog&amp;page_no=$total_no_of_pages'>
															&rsaquo;&rsaquo;
														</a>
													</li>";
									}
						$return .= "</ul>
								</nav>-->
							</div>
						</div>
					</center>
				</div>";
	return $return;
?>