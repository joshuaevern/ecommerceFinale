<?php

require('../settings/dbconnection.php');

// inherit the methods from Connection
class Product extends Dbconnection{


	function add_products($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image){
		// return true or false
		return $this->query("insert into products(product_cat, product_brand, product_title, product_price, product_desc, product_image) values('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image')");
		

	}

	function add_brands($name){
		// return true or false
		return $this->query("insert into brands(brand_name) value('$name')");
	}

	function add_categories($name){
		// return true or false
		return $this->query("insert into categories(cat_name) value('$name')");
		// return $this->query("insert into category(name) value('testing')");
	}

	function delete_one_products($id){
		// return true or false
		return $this->query("delete from products where brand_id = '$id'");
	}

	function delete_one_brands($id){
		// return true or false
		return $this->query("delete from brands where brand_id = '$id'");
	}

	function delete_one_categories($id){
		// return true or false
		return $this->query("delete from categories where cat_id = '$id'");
	}

	

	function update_one_brands($brand_id, $brand_name){
		
		// return true or false
		return $this->query("UPDATE `brands` SET `brand_name` = '$brand_name' WHERE `brand_id`= $brand_id");
	}

	function update_one_categories($cat_id, $cat_name){
		
		// return true or false
		return $this->query("UPDATE `categories` SET `cat_name`='$cat_name' WHERE `cat_id`='$cat_id';");
	}

	function update_one_products($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_id){
		
		// return true or false
		return $this->query("UPDATE `products` SET `product_cat`='$product_cat',`product_brand`='$product_brand',`product_title`='$product_title',`product_price`='$product_price',`product_desc`='$product_desc',`product_image`='$product_image' WHERE `product_id`='$product_id'");
	}
	
	

	function select_all_products(){
		// return array or false
		return $this->query("select * from products");
	}
	
	function select_all_brands(){
		// return array or false
		return $this->query("select * from brands");
	}

	function select_all_categories(){
		// return array or false
		return $this->query("select * from categories");
	}

	function select_one_products($id){
		// return associative array or false
		return $this->query("select * from products where product_id='$id'");
	}

	function select_one_brands($id){
		return $this->query("select * from brands where brand_id='$id'");
	}

	function select_one_categories($id){
		return $this->query("select * from categories where cat_id='$id'");
	}

	

}

?>