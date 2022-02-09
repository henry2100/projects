<?php
    $idIsFound = isset($blog_id);
    if($idIsFound === false){
        trigger_error('view/comment-form.php needs an $blog_id');
    }

    $commentsFound = isset( $Comments );
    if($commentsFound === false){
        trigger_error('views/comment-view.php needs $allComments' );
    }
     
    if(isset( $allComments ) === false){
        trigger_error('view/comment-view.php needs $allComments' );
    }
    if( isset($commentFormMessage) === false ) {
        $commentFormMessage = "";
    }

	$return = " <div class='content_body'>";
                if($user_log->isLogged_In()){
        $return .= "<div class='comment_form'>
                        <form class='row comment_sect' action='index.php?page=blog&amp;id=$blog_id' method='post' id='comment-form'>
                            <div class='img_div'>
                                <img src='$loggedUser->profile_pic' alt='user_img'>
                            </div>
                            <input type='hidden' name='entry-id' value='$blog_id' class='form-control p-input comment_input'/>
                            <div class='row comment_div'>
                                <!--<i class='material-icons'>person</i><b style='color:#000;'>Name</b>-->
                                <input type='text' name='user-name' placeholder='Your name' class='form-control p-input comment_input' value='$loggedUser->fname $loggedUser->lname'/>
                            </div>
                            <div class='row comment_div'>
                                <i class='material-icons'>bubble_chart</i><b style='color:#000;'>Comment</b>
                                <textarea name='new-comment' placeholder='Your comment.' class='form-control p-input comment_input' rows='5'></textarea>
                            </div>
                            <div class='form-group comment_button_div' >
                                <button type='submit' class='my_btn' name='newComment' style='width:98%;'>Post</button>
                            </div>
                        </form>
                    </div>";
                }else{
        $return .= "<p>
                        Sign in to respond to this post.
                        <a href='index.php?page=login' class='my_btn'>
                            Sign in
                        </a>
                    </p>";
                }
    $return .= "</div>
                <div class='content_body'>
                    <div class='comment'>
                        <div class='comment_view'>";
                        if($totalComments->numofComments > 0){
                            while ($row = $Comments->fetchObject()) {
                                $return .= "<div class='comment_body'>
                                                <i class='user material-icons'>person</i>
                                                <h5 class='user'>$row->author</h5>
                                                <p>$row->comment_entry</p>
                                                <small class='text-muted'>$row->dp</small>
                                            </div>";
                            }
                            $return .= "<button type='button' class='my_btn more_comment' id='modalBtn' data-target='#comment_Modal'>
                                            Show more comments-&rsaquo;&rsaquo;
                                        </button>";
                        }else{
                            $return .="<div>
                                        <i class='material-icons'>face</i><b style='color:#000;'>No Comments yet, be the first to comment on this post.</b>
                                    </div>
                                    <hr/>";
                        }
            $return .= "</div>
                    </div>
                </div>

                <div id='comment_Modal' class='modal bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Comments</h5>";
                                    if($totalComments->numofComments > 1){
                                        $return .= "<small>$totalComments->numofComments Comments</small>";
                                    }else{
                                        $return .= "<small>$totalComments->numofComments Comment</small>";
                                    }
                    $return .= "</div>
                                <div class='modal-body'>
                                    <div class='comment-sect' id='comments-display-2'>";
                                    while ($row2 = $allComments->fetchObject()) {
                            $return .= "<p style='color:#575757; font-size:20px; font-weight:100;'><i class='material-icons'>person</i> $row2->author</p>
                                        <p style='color:#666; font-weigth:100;'>$row2->comment_entry</p>
                                        <small style='color:#ccc; font-weigth:100;'>$row2->date_posted</small>
                                        <div class=''>
                                            <button type='submit' onclick='replyFunc()' class='my_btn_sm reply_btn' data-target='#reply_form'>
                                                Reply
                                            </button>
                                            <!--<a class='my_btn_sm reply_btn' id='btn_link' onclick='myfunction();' href='#&amp;id=$row2->id'>Reply</a>-->
                                        </div>
                                        <hr/>";
                                    }
                        $return .= "</div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn my_btn' data-dismiss='modal' aria-label='cancel'>
                                        <span aria-hidden='true' class='cancel'>
                                            <i class='material-icons'>clear</i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id='reply_form' class='modal bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>Comments</h5>
                                </div>
                                <div class='modal-body'>
                                    <form class='' action='index.php?page=comment' method='post'>
                                        <div class='row div_row'>
                                            <label>Author</label>
                                            <div class='inner_div'>
                                                <input class='style_input' type='text' name='author' placeholder='What is your name?'>
                                            </div>
                                        </div>
                                        <div class='row div_row'>
                                            <label>Comment</label>
                                            <div class='inner_div'>
                                                <input class='style_input' type='text' name='reply' placeholder='Response'>
                                            </div>
                                        </div>
                                        <div>
                                            <center>
                                                <button type='submit' class='my_btn my_btn_green' data-dismiss='modal' name='reply_btn'>
                                                    <span aria-hidden='true'>
                                                        <i class='material-icons'>check</i>
                                                    </span> 
                                                </button>
                                            </center>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-primary' data-dismiss='modal' aria-label='cancel_1'>
                                        <span aria-hidden='true' class='cancel_1'>
                                            <i class='material-icons'>clear</i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>";
	return $return;
?>