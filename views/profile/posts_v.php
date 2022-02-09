<?php
	$return = " <div class='content_body' style='padding:1rem;'>";
	while($row = $entries->fetchObject()){
		$return .= "<div class='card'>
						<a href='index.php?content=posts&amp;id=$row->id'>	
							<div class='post_sect'>	
								<div class='img_sect inner'>
									<img src='$row->blog_pic' alt='blog_img' class=''>
								</div>
								<div class='title inner'>
									<h6>
										$row->blog_title
									</h6>
									<center>
										<small class='likes'>
											<i class='fa fa-heart' aria-hidden='true'></i>
											0
										</small>
										<small class='comments'>
											<i class='fa fa-comments' aria-hidden='true'></i>
											7
										</small>
									</center>
								</div>
							</div>
						</a>
					</div>";
	}
		$return .= "<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
						<nav id='desktop_nav' class='pagination_nav' aria-label='Page navigation example'>
					  		<ul class='pagination justify-content-center'>";
							if($page_no <= 1){
								$return .= "<li class='page-item disabled'>
												<a class='btn btn-primary page-link '>
													&lsaquo;&lsaquo; First Page
												</a>
											</li>";
							}else{
								$return .= "<li class='page-item'>
												<a class='btn btn-primary page-link' href='index.php?content=posts&amp;page_no=1'>
													&lsaquo;&lsaquo; First Page
												</a>
											</li>";
							}
							if($page_no <= 1){
								$return .= "<li class='page-item disabled'>
									      		<a class='btn btn-primary page-link'>
									      			&lsaquo; Previous
									      		</a>
									    	</li>";
							}else{
								$return .= "<li class='page-item'>
												<a class='btn btn-primary page-link' href='index.php?content=posts&amp;page_no=$previous_page'>
													&lsaquo; Previous 
												</a>
											</li>";
							}

							$return .= "<li class='page-item disabled'>
											<strong class='page-link'>Page $page_no of $total_no_of_pages</strong>
										</li>";

							if($page_no >= $total_no_of_pages){
								$return .= "<li class='page-item disabled'>
									      		<a class='btn btn-primary page-link'>
									      			Next &rsaquo;
									      		</a>
									    	</li>";
							}else{
								$return .= "<li class='page-item'>
												<a class='btn btn-primary page-link' href='index.php?content=posts&amp;page_no=$next_page'>
													Next &rsaquo;
												</a>
											</li>";
							}
							if($page_no >= $total_no_of_pages){
								$return .= "<li class='page-item disabled'>
												<a class='btn btn-primary page-link'>
													Last Page &rsaquo;&rsaquo;
												</a>
											</li>";
							}else{
								$return .= "<li class='page-item'>
												<a class='btn btn-primary page-link' href='index.php?content=posts&amp;page_no=$total_no_of_pages'>
													Last Page &rsaquo;&rsaquo;
												</a>
											</li>";
							}
				$return .= "</ul>
						</nav>
					</div>
				</div>";
	return $return;
?>
