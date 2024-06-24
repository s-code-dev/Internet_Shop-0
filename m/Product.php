<?php

	include_once 'm/SQL.php';

	class Product extends SQL {

		public $product_id, $product_image, $product_title, $product_content, $product_price;

		public function getAllProducts() {

			return parent::Select('goods');
		}

		public function getProduct($id) {

			return parent::Select("goods",$id);
		}
	}
?>