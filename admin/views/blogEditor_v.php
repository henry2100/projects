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
	if( isset($editorErrMssg)  === false ) {
        $editorErrMssg  = "";
    }
	$return =  "<div class='content_body'>
	          		<div class='card'>
	          			<form class='editor_form' action='admin.php?ad_page=editor' method='post'>
	          				<div class='editor_title form_div'>
			                  	<h4 class='card-title'>Blog Editor</h4>
          						<p class='card-category'>Create new blog entries.</p>
			                </div>";
			if($editorErrMssg ){
				$return .= "<div class='alert alert-warning'>
                                <div class='container'>
                                    <div class='alert-icon'>
                                        <i class='material-icons'>warning</i>
                                    </div>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                                    </button>
                                    <b>warning:</b> $editorErrMssg 
                                </div>
                            </div>";
			}else{
				$return .= "";
			}

	        	$return .= "<div class='form-group'>
					            <input type='hidden' name='id' value='$entryData->id'/>
					            <input type='hidden' name='ad_user_id' value='$loggedAdmin->user_id'>
					        </div>";
					        if($entryData->id > 0){
						    	$return .= "<div class='form-group'>
									           	<img id='blog_pic' src='$entryData->blog_pic' alt='blog_pic' class='blog_editor_pic'>
									        </div>";
						    }else{
						    	$return .= "";
						    }
				$return .= "<div class='form_div'>
								<label>File Input</label><br/>
								<div class='sub_form'>
					        		<input type='file' name='blog_pic' class='form-control p-input' value='$entryData->blog_pic'>
					        		<small class='form-text text-muted'>Select a picture to serve as your blog post cover picture.</small>
								</div>
							</div>
							<div class='form-group form_div'>
								<div class='sub_divs select_div'>
									<label>Category</label>
									<div class='sub_form'>
										<select class='form-control p-input' value='$entryData->category'>
											<option value='Current News'>Current News</option>
						                    <option value='Lifestyle'>Lifestyle</option>
						                    <option value='Parenting'>Parenting</option>
						                    <option value='Travel'>Travel</option>
						                </select>
						                <small class='form-text text-muted'>Select a category that best describes your blog post</small>
						            </div>
						        </div>
						        <div class='sub_divs author_div'>
						        	<label>Author</label>
						        	<div class='sub_form'>";
						        		if($entryData->id > 0){
									        $return .= "<input class='form-control p-input' type='text' name='author' value='$entryData->author' placeholder='Author'>";
									    }else{
									    	$return .= "<input class='form-control p-input' type='text' name='author' value='$loggedAdmin->uname' placeholder='Author'>";
									    }
						      $return .= "<small class='form-text text-muted'>Please input the your name or name of the writer of this post</small>
						        	</div>
						        </div>
							</div>
							<div class='form-group form_div'>
								<label>Blog Title</label>
								<div class='sub_form'>
					        		<input type='text' name='blog_title' placeholder='Blog title' class='form-control p-input' value='$entryData->blog_title'>
					        		<small class='form-text text-muted'>Please input a suitable title for your blog post</small>
								</div>
							</div>
							<div class='form-group form_div'>
								<label>Blog Entry</label><br/>
								<div class='sub_form'>
								    <textarea name='blog_entry' placeholder='Write your blog post here' class='form-control' rows='10'>$entryData->blog_entry</textarea>
					        		<small class='form-text text-muted'>You can type your blog post here</small>
								</div>
							</div>
							<center>
						     	<div class='crd_foot_inner submit_user'>";
				    if($entryData->id > 0){
				 		$return .= "<button style='width:20%;' type='submit' class='btn btn-success  user_btn' name='action_update'>
						            	Update
						            </button>
						            <button style='width:20%;' type='submit' class='btn btn-danger user_btn' name='action_delete'>
						            	Delete
						            </button>";	
			     	}else{
			     		$return .= "<button style='width:20%;' type='submit' class='btn btn-primary user_btn' name='action_save'>
						            	Save
						            </button>
						            <button style='width:20%;' type='reset' class='btn btn-secondary user_btn' name='action' value='refresh'>
						            	Refresh
						            </button>";
					}
					$return .= "</div>
						    </center>
	        			</form>
	          		</div>
		        </div>";
	return $return;
?>