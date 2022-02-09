<?php
	$return = " <div class='content_body'>
						<div class='card'>
							<img src='$userEntry->profile_pic' alt=''>
						</div>
						<table class='table table-hover'>
							<tbody>
								<tr>
									<th>Name</th>
									<td>$userEntry->lname $userEntry->fname</td>
								</tr>
								<tr>
									<th>Username</th>
									<td>$userEntry->uname</td>
								</tr>
									<th>Email</th>
									<td>$userEntry->email</td>
								</tr>
								<tr>
									<th>Joined</th>
									<td>$userEntry->reg_date</td>
								</tr>
							</tbody>
						</table>
				</div>";
	return $return;
?>