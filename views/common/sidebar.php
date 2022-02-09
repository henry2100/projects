<?php
	$return =  "<div class='sidebar_content main_div'>
					<h5 style='padding-left:5%; padding-top:5%;'>Recent Posts</h5>";
				while($row = $entries->fetchObject()){
		$return .= "<a class='sidebar_body' href='index.php?page=blog&amp;id=$row->id'>
						<div class='sidebar sect_img'>
							<img src='$row->blog_pic' alt='' width='100%' height='100%'>
						</div>
						<div class='sidebar sect_body'>
                            <h6>$row->blog_title</h6>
                            <p>$row->intro...</p>
                    	 </div>
					</a>";
				}
	$return .= "</div>";
	return $return;
?>