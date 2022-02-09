<?php
	$return =  "<div class='content_body'>
					<div class='card'>
						<table class='table table-hover table-borderless tab'>
							<thead>
								<tr>
									<th>ID</th>
									<th>Image</th>
									<th>Author</th>
									<th>Category</th>
									<th>Blog title</th>
									<th>Date Posted</th>
								</tr>
							</thead>
							<tbody>";
							while($row = $entries->fetchObject()){
								$href = "admin.php?ad_page=blog&amp;id=$row->id";
					$return .= "<tr>
									<td>$row->id</td>
									<td><a href='$href'><img src='$row->blog_pic' alt='blog_img' style='width:75px; height:40px; border-radius:5px;'></a></td>
									<td><a href='$href'>$row->author</a></td>
									<td><a href='$href'>$row->category</a></td>
									<td><a href='$href'>$row->blog_title</a></td>
									<td><a href='$href'>$row->date_created</a></td>
								</tr>";
							}
				$return .= "</tbody>
						</table>
					</div>";
					
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
												<a class='page-link' href='admin.php?ad_page=blog&amp;page_no=1'>
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
												<a class='page-link' href='admin.php?ad_page=blog&amp;page_no=$previous_page'>
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
												<a class='page-link' href='admin.php?ad_page=blog&amp;page_no=$next_page'>
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
												<a class='page-link' href='admin.php?ad_page=blog&amp;page_no=$total_no_of_pages'>
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