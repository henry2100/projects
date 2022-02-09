<?php
	$return =  "<div>
					<table class='table table-hover'>
						<thead>
							<tr>
								<th>Icon</th>
								<th>Name</th>
								<th>description</th>
								<th>Category</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>";
					while($row = $item->fetchObject()){
				$return .= "<tr>
								<td>$row->product_image</td>
								<td>$row->product_name</td>
								<td>$row->product_info</td>
								<td>$row->product_category</td>
								<td>$row->price</td>
							</tr>";
					}
			$return .= "</tbody>
					</table>
				</div>";
	return $return;
?>