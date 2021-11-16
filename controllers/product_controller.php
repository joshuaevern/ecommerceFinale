<?php

require_once('../models/product_class.php');
require_once('../models/cart_class.php');


function add_products_controller($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->add_products($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image);

}

function add_brands_controller($name){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->add_brands($name);

}

function add_categories_controller($name){
     // create an instance of the Product class
     $product_instance = new Product();
     // call the method from the class
     return $product_instance->add_categories($name);
 
 }
   

function delete_products_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->delete_one_products($id);

}


function delete_brands_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->delete_one_brands($id);

}


function delete_categories_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->delete_one_categories($id);

}

function update_products_controller($product_catID,$product_brandID,$product_title,$product_price,$product_desc,$fileName1, $product_id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_one_products($product_catID,$product_brandID,$product_title,$product_price,$product_desc,$fileName1, $product_id);

}

function update_brands_controller($brand_id, $brand_name){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_one_brands($brand_id, $brand_name);

}

function update_categories_controller($cat_id, $cat_name){
    
   
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_one_categories($cat_id, $cat_name);
       

}

function displayOneProduct($id){
    $all = select_one_products_controller($id);
    foreach ($all as $value){
        $product_id = $value['product_id'];
        $product_title = $value['product_title'];
        $product_price = $value['product_price'];
        $product_image = $value['product_image'];
        $product_desc = $value['product_desc'];
        $ip = Cart::getIpAddress();
      
        
        
       

  
    echo <<<ALL

    <div class="col-sm-6">
    <div class="product-images">
        <div class="product-main-img">
            <img src="$product_image" alt="Product Image">
        </div>
        
       
    </div>
    </div>

    <div class="col-sm-6">
    <div class="product-inner">
        <h2 class="product-name">$product_title</h2>
        <div class="product-inner-price">
            <ins>GHS $product_price.00</ins> 
        </div>    
        
        <form method="GET" action="../actions/cart_action.php" class="cart">
            <div class="quantity">
                <input type="hidden" value="$ip" name="ip_address">
                <input type="hidden" value="$product_id" name="product_id">
                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">                
            </div>
            <button name="addCartButton" type="submit">Add to cart</button>
        </form>   
        
        <div class="product-inner-category">
            <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
        </div> 
        
        <div role="tabpanel">
            <ul class="product-tab" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home">
                    <h2>Product Description</h2>  
                    <p>$product_desc</p>

              
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile">
                    <h2>Reviews</h2>
                    <div class="submit-review">
                        <p><label for="name">Name</label> <input name="name" type="text"></p>
                        <p><label for="email">Email</label> <input name="email" type="email"></p>
                        <div class="rating-chooser">
                            <p>Your rating</p>

                            <div class="rating-wrap-post">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                        <p><input type="submit" value="Submit"></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>

    ALL;
    }
    
}

function displayAllProduct(){
    $all = select_all_products_controller();
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
            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="singleProduct.php?id=$product_id">Select Product</a>
        </div>                       
    </div>
    </div>
    ALL;
    }
    
}

function select_all_products_controller(){
    // create an instance of the Product class

        
    $product_instance = new Product();
    
    //create empty array
    $arr = array();
    
    //check data and return boolean (true /false)
    $all = $product_instance->select_all_products();
    
    //loops through all
    if($all){
        //for each data call the row using the method fetch
        while($each = $product_instance->fetch()){

            //now loop through everything and put into the array
            $arr[]= $each;
        }
     
               
    }

    return $arr;

}

function select_all_brands_controller(){
    // create an instance of the Product class
    
    $brand_instance = new Product();
    
    //create empty array
    $arr = array();
    
    //check data and return boolean (true /false)
    $all = $brand_instance->select_all_brands();
    
    //loops through all
    if($all){
        //for each data call the row using the method fetch
        while($each = $brand_instance->fetch()){

            //now loop through everything and put into the array
            $arr[]= $each;
        }
     
               
    }

    return $arr;

}

function select_all_categories_controller(){
    // create an instance of the Product class
    
    $categories_instance = new Product();
    
    //create empty array
    $arr = array();
    
    //check data and return boolean (true /false)
    $all = $categories_instance ->select_all_categories();
    
    //loops through all
    if($all){
        //for each data call the row using the method fetch
        while($each = $categories_instance ->fetch()){

            //now loop through everything and put into the array
            $arr[]= $each;
        }
     
               
    }

    return $arr;

}

function select_one_products_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class

    $arr = array();
    
    //check data and return boolean (true /false)
    $check = $product_instance->select_one_products($id);
    
    //loops through all
    if($check){
        //for each data call the row using the method fetch
        while($each = $product_instance->fetch()){

            //now loop through everything and put into the array
            $arr[]= $each;
        }
     
               
    }

    return $arr;
    

}


function select_one_brands_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class

    $arr = array();
    
    //check data and return boolean (true /false)
    $check = $product_instance->select_one_brands($id);
    
    //loops through all
    if($check){
        //for each data call the row using the method fetch
        while($each = $product_instance->fetch()){

            //now loop through everything and put into the array
            $arr[]= $each;
        }
     
               
    }

    return $arr;
    

}


function select_one_categories_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class

    $arr = array();
    
    //check data and return boolean (true /false)
    $check = $product_instance->select_one_categories($id);
    
    //loops through all
    if($check){
        //for each data call the row using the method fetch
        while($each = $product_instance->fetch()){

            //now loop through everything and put into the array
            $arr[]= $each;
        }
     
               
    }

    return $arr;
    

}



?>