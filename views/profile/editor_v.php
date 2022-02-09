<?php
	$entryDataFound = isset( $entryData );
	if( $entryDataFound === false ){
	 	$entryData = new StdClass();
	 	$entryData->id = 0;
	 	$entryData->blog_pic = "";
	 	$entryData->author = "";
	 	$entryData->category = "";
	 	$entryData->blog_title = "";
	 	$entryData->blog_entry = "";
	}
	$return = " <div class='content_body'>
          			<form class='editor_form' action='index.php?content=editor' method='post' enctype='multipart/form-data'>
          				<div class='editor_title form_div'>
		                  	<h4 class='card-title'>Blog Editor</h4>
      						<p class='card-category'>Create new blog entries.</p>
		                </div>
		                <div class='form-group'>
				            <input type='hidden' name='id' value='$entryData->id'/>
				            <input type='hidden' name='user_id' value='$loggedUser->user_id'>
				        </div>";
        if($entryData->id > 0){
	    	$return .= "<div class='single_entry_inner'>
                            <img class='single_entry_img' src='$entryData->blog_pic' alt='blog_img'>
                        </div>";
	    }else{
	    	$return .= "";
	    }
			$return .= "<div class='row div_row'>
	                        <label>Profile Image</label>
	                        <div class='inner_div'>
	                            <input class='btn btn-primary' type='file' name='blog_pic' style='border:0.5px solid #ccc; border-radius:5px;' width:100%;'>
	                        </div>
	                    </div>
	                    <div class='row div_row'>
	                    	<div class='inner_div form_txt'>
		                        <label>Category</label>
		                        <select class='style_input' name='category' value='$entryData->category'>
									<option value='Current News'>Current News</option>
				                    <option value='Lifestyle'>Lifestyle</option>
				                    <option value='Parenting'>Parenting</option>
				                    <option value='Travel'>Travel</option>
				                </select>
		                    </div>";
	        if($entryData->id > 0){
	          	$return .= "<div class='inner_div form_txt'>
	                        	<label>Auhor</label>
	                            <input class='style_input' type='text' name='author' placeholder='Auhor' value='$entryData->author'>
	                        </div>";
	        }else{
	        	$return .= " <div class='inner_div form_txt'>
	                        	<label>Auhor</label>
	                            <input class='style_input' type='text' name='author' placeholder='Auhor' value='$loggedUser->fname $loggedUser->lname'>
	                        </div>";
	        }
	        $return .= "</div>
	                    <div class='row div_row'>
	                        <label>Blog Title</label>
	                        <div class='inner_div'>
	                            <input class='style_input full_input' type='text' name='blog_title' placeholder='Title' value='$entryData->blog_title'>
	                        </div>
	                    </div>
	                    <div class='row div_row'>
	                        <label>Blog Entry</label>
	                        <div class='inner_div'>
	                            <textarea name='blog_entry' placeholder='Write your blog post here' class='style_input full_input' rows='10'>$entryData->blog_entry</textarea>
	                        </div>
	                    </div>
	                    <center>
					     	<div class='crd_foot_inner submit_user'>";
			    if($entryData->id > 0){
			 		$return .= "<button style='width:20%;' type='submit' class='btn btn-success user_btn' name='action' value='update'>
					            	Update
					            </button>
					            <button style='width:20%;' type='submit' class='btn btn-danger user_btn' name='action' value='delete'>
					            	Delete
					            </button>
					            <!--<a class='btn btn-danger user_btn' href='index.php?content=delete&amp;id=$entryData->id'>
	                                Delete
	                            </a>-->";	
		     	}else{
		     		$return .= "<button style='width:20%;' type='submit' class='btn btn-primary user_btn' name='action' value='save'>
					            	Save
					            </button>
					            <button style='width:20%;' type='reset' class='btn btn-secondary user_btn' name='action' value='refresh'>
					            	Refresh
					            </button>";
				}
				$return .= "</div>
					    </center>
		            </form>
				</div>";
	return $return;
?>