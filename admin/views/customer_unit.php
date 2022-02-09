<?php
	$return =  "<div id='profile_page'>
					<h4>Profile</h4>
					<hr/>
					<p>Below are the account details of user <em>$user->uname</em></p>
        			<div id='user_contain'>
                        <div class='user_page user_img' style=''>
                            <img id='image' src='$user->profile_pic' alt='user_image' style='width:100%; height:350px; border-radius:20px;'>
                        </div>
                        <div class='user_page user_data'>
                            <table class='table table-striped' style='margin:2% auto;'>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td class='tab-data'>$user->fname $user->lname</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td class='tab-data'>$user->uname</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td class='tab-data'>$user->email</td>
                                    </tr>
                                    <tr id='desktop_nav'>
                                        <th>Password</th>
                                        <td class='tab-data'>$user->passwd</td>
                                    </tr>
                                    <tr>
                                        <th>Registeration Date</th>
                                        <td class='tab-data'>$user->reg_date</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>";
    return $return;
?>