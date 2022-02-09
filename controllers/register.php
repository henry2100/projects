<?php
    include_once "models/User_Table.class.php";
    $userData = new User_Table($db);

    include_once "models/Subscriber_Table.class.php";
    $subUser = new Subscriber_Table($db);
    if(isset($_POST['signup_btn'])){
        $FileName = $_FILES['user_pic']['name'];
        $FileType = $_FILES['user_pic']['type'];
        $FileSize = $_FILES['user_pic']['size'];
        $FileError = $_FILES['user_pic']['error'];
        $FileTmpName = $_FILES['user_pic']['tmp_name'];

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $uname = $_POST['username'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $mobile = $_POST['mobile'];
        $pwd_1 = $_POST['pwd_1'];
        $pwd_2 = $_POST['pwd_2'];
 
        $FileExt = explode(".", $FileName);
        $FileActExt = strtolower(end($FileExt));

        $allowed = array("jpg", "jpeg", "png");

        if(!empty($fname) || !empty($lname) || !empty($uname) || !empty($email) || !empty($pwd_1) || !empty($pwd_2)){
            if(in_array($FileActExt, $allowed)){
                if($FileError === 0){
                    if($FileSize < 2000000){
                        if($pwd_1 === $pwd_2){
                            $FileNewName = uniqid("", true).".".$FileActExt;
                            $FileDestination = "admin/img/uploads/profile_pic/user".$FileNewName;
                            move_uploaded_file($FileTmpName, $FileDestination);
                            try{
                                $userData->saveNewUser($FileDestination, $fname, $lname, $uname, $email, $dob, $mobile, $pwd_1);
                                $subUser->saveClientEmails($email);
                                $success = "New user created for $email!";
                                $signupErrMssg = $success;
                                header("location: index.php?page=login");
                            }catch(Exception $emailErr){
                                $signupErrMssg = $emailErr->getMessage();
                            }catch(Exception $unameErr){
                                $signupErrMssg = $unameErr->getMessage();
                            }catch(Exception $passwdErr){
                                $signupErrMssg = $passwdErr->getMessage();
                            }
                        }else{
                            try{
                                $matchErr = new Exception("Your password doesn't match!");
                                throw $matchErr;
                            }catch(Exception $matchErr){
                                $signupErrMssg = $matchErr->getMessage();
                            }
                        }
                    }else{
                        try{
                            $sizeErr = new Exception("File too large! Not more than 20MB");
                            throw $sizeErr;
                        }catch(Exception $sizeErr){
                            $signupErrMssg = $sizeErr->getMessage();
                        }
                    }
                }else{
                    try{
                        $fileErr = new Exception("There was an error uploading your file, please try again.");
                        throw $fileErr;
                    }catch(Exception $fileErr){
                        $signupErrMssg = $fileErr->getMessage();
                    }
                }
            }else{
                try{
                    $allowedErr = new Exception("File type not allowed. jpg, jpeg and png files only.");
                    throw $allowedErr;
                }catch(Exception $allowedErr){
                    $signupErrMssg = $allowedErr->getMessage();
                }
            }
        }else{
            try{
                $emptyErr = new Exception("Please fill all fields!");
                throw $emptyErr;
            }catch(Exception $emptyErr){
                $signupErrMssg = $emptyErr->getMessage();
            }
        }
    }

    $output = include_once "views/authentication/register_v.php";
    return $output;
?>