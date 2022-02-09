<?php
	$return =  "<div class='content_body'>
					<div class='sect sect_one'>
						<div>
							<a href='admin.php?ad_page=blog'>
								<div class='sub_sect one'>
									Blog
								</div>
							</a>
						</div>
						<div>
							<a href='admin.php?ad_page=slider'>
								<div class='sub_sect two'>
									Carousel
								</div>
							</a>
						</div>
						<div>
							<a href='admin.php?ad_page=users'>
								<div class='sub_sect three'>
									Users
								</div>
							</a>
						</div>
						<div>
							<a href='admin.php?ad_page=subscribers'>
								<div class='sub_sect four'>
									Subscribers
								</div>
							</a>
						</div>
					</div>
					<div class='sect sect_two'>
						<div>
							<a href='admin.php?ad_page=customers'>
								<div class='sub_sect one'>
									Customers
									<b>$numUser->userCount</b>
								</div>
							</a>
						</div>
						<div>
							<a href='admin.php?ad_page=subscribers'>
								<div class='sub_sect two'>
									News Letter Subscribers
									<b>$numSub->subscriberCount</b>
								</div>
							</a>
						</div>
					</div>
					<div class='sect sect_three'>
						<div>
							<a href='admin.php?ad_page=adusers'>
								<div class='sub_sect one'>
									Admin Users
									<b>$numAdmin->adminCount</b>
								</div>
							</a>
						</div>
						<div class='sub_sect'>
							<table class='table table-hover'>
								<thead>
									<tr>
										<th>Username</th>
										<th>Email</th>
										<th>Date Registered</th>
									</tr>
								</thead>
								<tbody>";
							while($row = $all_admin->fetchObject()){
								$return .= "<tr>
												<td>$row->uname</td>
												<td>$row->email</td>
												<td>$row->reg_date</td>
											</tr>";
							}
					$return .= "</tbody>
							</table>
						</div>
					</div>
				</div>";
	return $return;
?>