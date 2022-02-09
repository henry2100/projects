<?php
    if(isset($signupErrMssg) === false){
        $signupErrMssg = "";
    }
    if(isset($success) === false){
        $success = "";
    }
    $return =  "<form id='reg_form' action='index.php?page=register' method='post' enctype='multipart/form-data'>
                    <h4>Create Account</h4>
                    <hr/>";
                    if($signupErrMssg){
                        if($signupErrMssg != $success){
                            $return .= "<div id='err_block' class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            <i class='material-icons'>warning</i>
                                            <b>Warning:</b> $signupErrMssg
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true' class='close'>
                                                    <i class='material-icons'>clear</i>
                                                </span>
                                            </button>
                                        </div>";
                        }else{
                            $return .= "<div id='err_block' class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <i class='material-icons'>check</i>
                                            <b>Warning:</b> $signupErrMssg
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
        $return .= "<div class='row div_row'>
                        <label>Profile Image</label>
                        <div class='inner_row'>
                            <input class='style_input full_input' type='file' name='user_pic' style='border:1px solid #ccc; border-radius:5px;' width:100%; margin-bottom:10%;>
                        </div>
                    </div>
                    <div class='row div_row'>
                        <label>Name</label>
                        <div class='inner_div'>
                            <input class='style_input half_input' type='text' name='firstname' placeholder='Firstname'>
                            <input class='style_input half_input' type='text' name='lastname' placeholder='Lastname'>
                        </div>
                    </div>
                    <div class='row div_row'>
                        <label>Username</label>
                        <div class='inner_div'>
                            <input class='style_input full_input' type='text' name='username' placeholder='Username'>
                        </div>
                    </div>
                    <div class='row div_row'>
                        <label>Email</label>
                        <div class='inner_div'>
                            <input class='style_input full_input' type='email' name='email' placeholder='Email'>
                        </div>
                    </div>
                    <div class='row div_row spec_div'>
                        <div class='inner_div inner_spec a'>
                            <label>Phone Number</label><br/>
                            <input class='style_input full_input' id='mobile' type='text' name='mobile' placeholder='Enter your mobile number'>
                        </div>
                        <div class='inner_div inner_spec b'>
                            <label> Date of birth</label><br/>
                            <input class='style_input full_input' type='date' name='dob' placeholder='Date of birth'>
                        </div>
                    </div>
                    <div class='row div_row'>
                        <label>Password</label>
                        <div class='inner_div'>
                            <input class='style_input half_input' type='password' name='pwd_1' placeholder='Password'>
                            <input class='style_input half_input' type='password' name='pwd_2' placeholder='Confirm Password'>
                        </div>
                    </div>
                    <a class='form_link' href='index.php?page=home'>return</a>
                    <hr/>
                    <center>
                        <div class='row div_row btn_div'>
                            <button name='signup_btn'>
                                Submit
                            </button>
                        </div>
                        <a href='index.php?page=login'>Login</a>
                    </center>
                </form>";
    return $return;
?>