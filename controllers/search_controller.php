<?php
require('../models/search_class.php');

//search product function - takes the search term

function searchProduct($product_title){
    // create an instance of the Product class

        
    $search_instance = new Search();
    
    //create empty array
    $arr = array();
    
    //check data and return boolean (true /false)
    $all = $search_instance->searchProduct($product_title);
    
    //loops through all
    if($all){
        //for each data call the row using the method fetch
        while($each = $search_instance->fetch()){

            //now loop through everything and put into the array
            $arr[]= $each;
        }
     
               
    }

    return $arr;

}



function displaySearchProduct($product_title){
    $all = searchProduct($product_title);
    foreach ($all as $value){
        $product_id = $value['product_id'];
        $product_title = $value['product_title'];
        $product_price = $value['product_price'];
        $product_image = $value['product_image'];
        
       

  
    echo <<<ALL

    <div class="col-md-3 col-sm-6">
    <div class="single-shop-product">
        <div class="product-upper">
            <img src="$product_image" alt="Product image">
        </div>
        <h2><a href="">$product_title</a></h2>
        <div class="product-carousel-price">
            <ins>GHS $product_price.00</ins> 
        </div>  
        
   
        
        <div class="product-option-shop">
            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="../view/cart.php?id=$product_id">Add to Cart</a>
        </div>                       
    </div>
    </div>
    ALL;
    }
    
}



?>