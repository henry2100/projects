<?php
	$return =  "<div class='content_body'>
					<div class='card'>
						<div classs='img_div'>
							<img src='$entryData->blog_pic' class='card-img-top' alt='blog_pic'>
						</div>
				  		<div class='card-body'>
				  			<div class='title_div'>
				    			<h4 class='card-title' style='text-transform:uppercase;'>$entryData->blog_title</h4>
				    		</div>
				    		<p class='card-text'>$entryData->blog_entry</p>
				    		<center>
					    		<a href='admin.php?ad_page=editor&amp;id=$entryData->id' style='width:20%;' class='btn btn-primary'>Edit</a>
					    		<a href='admin.php?ad_page=deletePost&amp;id=$entryData->id' style='width:20%;' class='btn btn-danger'>Delete</a>
					    	</center>
				    		<hr/>
				    		<div class='social_sect'>
				    			<div class='social share_sect'>
									<h6><small class='mb-5' style='text-transform:uppercase;'>Share</small></h6>
								</div>
								<div class='social icon_sect'>
								    <a href='#' class='p-2'><i aria-hidden='true' class='fab fa-twitter'></i></a>
						            <a href='#' class='p-2'><i aria-hidden='true' class='fab fa-facebook'></i></a>
						            <a href='#' class='p-2'><i aria-hidden='true' class='fab fa-linkedin'></i></a>
						            <a href='#' class='p-2'><i aria-hidden='true' class='fab fa-instagram'></i></a>
						            <a href='#' class='p-2'><i aria-hidden='true' class='fab fa-whatsapp'></i></a>
						            <a href='#' class='p-2'><i aria-hidden='true' class='fab fa-pinterest'></i></a>
						        </div>
						        <div class='social bottom comment'>";
					    		if($commentCount->numofComments > 1){
					    			$return .= "<small class='text-muted'>$commentCount->numofComments Comments</small>";
					    		}else{
					    			$return .= "<small class='text-muted'>$commentCount->numofComments Comment</small>";
					    		}
					$return .= "</div>
								<div class='social bottom category'>
									<h6><small class='text-muted'>Category: </small> $entryData->category</h6>
								</div>
					        </div>
				  		</div>
					</div>
				</div>";
	return $return;
?>