<?php
	include_once "admin/model/Table.class.php";

	class Product_Table extends Table{
		public function saveProduct($product_image, $product_name, $product_info, $product_category, $price){
			$sql = "INSERT INTO products_tb (product_image, product_name, product_info, product_category, price) VALUES (?, ?, ?, ?, ?)";
			$data = array($product_image, $product_name, $product_info, $product_category, $price);
			$statement = $this->executeStatement($sql, $data);
			return $statement;
		}
		public function getProducts(){
			$sql = "SELECT * FROM products_tb";
			$statement = $this->executeStatement($sql);
			return $statement;
		}
	}
?>