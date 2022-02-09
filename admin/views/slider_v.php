<?php
	if(isset($mssg) === false){
        $mssg = "";
    }
    if(isset($success) === false){
        $success = "";
    }

	$return =  "<div class='content_body'>
					<div class='card'>
						<div class='slider slider_input'>
							<form method='post' action='admin.php?ad_page=slider' enctype='multipart/form-data'>
								<div class='form_div title'>
									<h3>Add new Image</h3>
								</div>";
                    if($mssg){
                        if($mssg != $success){
                            $return .= "<div id='err_block' class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            <i class='material-icons'>warning</i>
                                            <b>Warning:</b> $mssg
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true' class='close'>
                                                    <i class='material-icons'>clear</i>
                                                </span>
                                            </button>
                                        </div>";
                        }else{
                            $return .= "<div id='err_block' class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <i class='material-icons'>check</i>
                                            <b>Success:</b> $mssg
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true' class='close'>
                                                    <i class='material-icons'>clear</i>
                                                </span>
                                            </button>
                                        </div>";
                        }
                    }else{
                        $return .= "";
                    }
       				$return .= "<div class='form_div file_input'>
									<label>Choose Image</label>
									<div class='sub_divs'>
										<input class='form-control p-input' type='file' name='slider_img'>
									</div>
								</div>
								<div class='form_div caption'>
									<label>Caption</label>
									<div class='sub_divs'>
										<input class='form-control p-input' type='text' name='caption' placeholder='Enter caption'>
									</div>
								</div>
								<div class='form_div img_link'>
									<label>Image Link</label>
									<div class='sub_divs'>
										<input class='form-control p-input' type='text' name='link' placeholder='Enter your desired link'>
									</div>
								</div>
								<div class='form_div form_btn'>
									<center>
										<button type='submit' name='slider_btn'>Post</button>
									</center>
								</div>
							</form>
						</div>
						<div class='slider slider_table'>
							<table class='table table-hover table-borderless'>
								<thead>
									<tr>
										<th>ID</th>
										<th>Image</th>
										<th>Caption</th>
										<th>Link</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody>";
							while($row = $entry->fetchObject()){
								$href = "admin.php?ad_page=slider&amp;id=$row->id";
								$return .= "<tr>
												<td>$row->id</td>
												<td><img src='$row->img' alt='slider_img' style='width:75px; height:40px; border-radius:5px;'></td>
												<td>$row->cap</td>
												<td>$row->imgs</td>
												<td>
													<a class='my_btn' style='color:#fafafa;' href='$href'>Delete</a>
												</td>
											</tr>";
							}
					$return .= "</tbody>
							</table>
						</div>
					</div>
				</div>";
	return $return;
?>