<?php
	$return =  "<div class='content_body'>
					<center>
						<h2 class='entry_title'><b>$entryData->blog_title</b></h2>
						<div class='blog'>
							<div class='each_entry'>
                                <a href='' style='text-decoration:none; text-align:center;'>
                                    <div class='single_entry crd-container'>
                                        <div class='single_entry_inner'>
                                            <img class='single_entry_img' src='$entryData->blog_pic' alt='blog_img'>
                                        </div>
                                        <div class='overlay'>
                                            
                                        </div>
                                    </div>
                                </a>
                                <div class='text'>
                                    <div class='entry_info'>
                                        <h5 style='color:#575757; text-align:left;'>$entryData->author</h5>
                                        <small class='post_date'>";
                                          if($entryData->category == 'Current News'){
										        $return .= "<a style='color:#9c27b0;' href='index.php?page=current_news'>$entryData->category</a>";
										    }else{
										        $return .= "<a style='color:#9c27b0;' href='index.php?page=$entryData->category'>$entryData->category</a>";
										    }
                            $return .= "</small>";
                                        if($commentCount->numofComments > 1){
                                            $return .= "<small class='text-muted'>$commentCount->numofComments Comments</small>";
                                        }else{
                                            $return .= "<small class='text-muted'>$commentCount->numofComments Comment</small>";
                                        }
                            $return .= "<small class='text-muted'>$entryData->date_created</small>
                                    </div>
                                    <div class='entry_body'>
                                        $entryData->blog_entry
                                    </div>
                                </div>
                            </div>
						</div>
					</center>
				</div>
                <div class='content_body'>
                    <div class='interact_sect social_sect'>
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
                    </div>
                    <div class='interact_sect reaction'>
                        <center>
                            <div class='react_div like'>
                                <i class='far fa-thumbs-up'></i>
                            </div>
                            <div class='react_div dislike'>
                                <i class='far fa-thumbs-down'></i>
                            </div>
                        </center>
                    </div>
                </div>";
	return $return;
?>