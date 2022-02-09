<?php
	$return = " <div class='content_body'>
					<table class='table table-hover table-borderless'>
						<thead>
							<tr>
								<th>S/N</th>
								<th>Title</th>
								<th>Amount</th>
								<th>Monthly ROI</th>
								<th>Total Expected ROI</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>No Entry</td>
								<td>No Entry</td>
								<td>No Entry</td>
								<td>No Entry</td>
								<td>No Entry</td>
								<td>
									<a class='btn btn-danger' href=''>
										Delete
									</a>
								</td>
							</tr>
						</tbody>
					</table>
					<hr/>
					<div>
						<center>
							<a class='btn btn-success' href='index.php?content=add_inv'>Add New Investment</a>
							<a class='btn' href='index.php?content=edit_inv'>Manage old Investment</a>
						</center>
					</div>
				</div>";
	return $return;
?>