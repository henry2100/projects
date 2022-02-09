<?php
	include_once "admin/model/Product_Table.class.php";
	$product = new Product_Table($db);
	$item = $product->getProducts();

	$output = include_once "admin/views/product_v.php";
	return $output;
?>  