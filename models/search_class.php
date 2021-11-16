<?php

require('../settings/dbconnection.php');

// inherit the methods from Connection
class Search extends Dbconnection{
	function  searchProduct($product_title){
		//a query to search product matching term
		$sql = "SELECT * FROM products WHERE product_title LIKE '%$product_title%'";
	
		//execute the query and return boolean
		return $this->query($sql);
	}
	
}

 
    ?>