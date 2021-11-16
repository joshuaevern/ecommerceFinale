<?php
require('../models/cart_class.php');

// add to cart
function add_carts($prod_id, $ip, $qty){
   
	$ip = Cart::getIpAddress();
        
    $cart_instance = new Cart();
   
    //check for duplicates
    $check = validate_cart($ip, $prod_id);

    if(count($check) > 0){
        print('Item already in cart');
        
    } 
    else{ 
            $add = $cart_instance->add_carts($prod_id, $ip, $qty);
        if($add){
            header("Location: ../view/cart.php");

        } 
        else{
            print("Failed");
        }

    }

}


//remove from cart
function remove_carts($prod_id){
    $arr = array();
    $ip = Cart::getIpAddress();
    $cart_instance = new Cart();

    $remove = $cart_instance->remove_carts($prod_id, $ip);
        if($remove){
            header("Location: ../view/cart.php");

        } 
        else{
            print("Deletion failed");
        }

}

function select_one_cart($id){
    // create an instance of the Product class
    $cart_instance = new Cart();
    // call the method from the class

    $arr = array();
    
    //check data and return boolean (true /false)
    $check = $cart_instance->select_one_cart($id);
    
    //loops through all
    if($check){
        //for each data call the row using the method fetch
        while($each = $cart_instance->fetch()){

            //now loop through everything and put into the array
            $arr[]= $each;
        }
     
               
    }

    return $arr;
    

}

//update cart
function update_cart_quantity($id, $qty){
    $arr = array();
    $ip = Cart::getIpAddress();
    $cart_instance = new Cart();

    $cart= $cart_instance->update_cart_quantity($id, $qty, $ip);    
    if($cart){
        return $cart;
    }


}

//validate cart for uniqueness
function validate_cart($ip, $prod_id){
    //Create an array variable to hold list of search records
    $cart_array = array();

    //create an instance of the product class
    $cart_object = new Cart();

    //run the search product method
    $carts = $cart_object->validate_cart($ip, $prod_id);

    //check if the method worked
    if ($carts) {

        //loop to see if there is more than one result
        //fetch one at a time
        while ($cart = $cart_object->fetch()) {

            //Assign each result to the array
            $cart_array[] = $cart;
        }
    }
    //return the array
    return $cart_array;
}


function cart_items(){
  //Create an array variable to hold list of search records
  $cart_array = array();

  //create an instance of the product class
  $cart_object = new Cart();

  //run the search product method
  $ip = Cart::getIpAddress();
  $carts = $cart_object->cart_items($ip);

  //check if the method worked
  if ($carts) {

      //loop to see if there is more than one result
      //fetch one at a time
      while ($cart = $cart_object->fetch()) {

          //Assign each result to the array
          $cart_array[] = $cart;
      }
  }
  //return the array
  return $cart_array;

}

function displayCart(){
    $ip = Cart::getIpAddress();

  $cart = cart_items($ip);
  // $amt =getTotalItemAmountInCart();

  if ($cart) {
      foreach ($cart as $value) {
        $id = $value['product_id'];
        $product_title = $value['product_title'];
        $product_price = $value['product_price'];
        $product_quantity = $value['qty'];
        $product_image = $value['product_image'];
        $product_desc = $value['product_desc'];
        $amount = $product_price*$product_quantity;

        $ip = Cart::getIpAddress();

        $method = select_one_cart($id);
        $getID = $method[0]['p_id'];
       

      
          

         

        echo <<< _ALL
       

             <table cellspacing="0" class="shop_table cart">
            <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
            </tr>
            </thead>
            <tbody>
            <tr class="cart_item">
                <td class="product-remove">
                    <a title="Remove this item" class="remove" href="">x</a> 
                </td>

                <td class="product-thumbnail">
                    <a href="singleProduct.php"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="$product_image"></a>
                </td>

                <td class="product-name">
                    <a href="singleProduct.php">$product_title</a> 
                </td>

                <td class="product-price">
                    <span class="amount">$product_price</span> 
                </td>

                <td class="product-quantity">
                    
                <div class="quantity buttons_added">
                  <form action="../actions/cart_action.php">

                     
                <input type="button" class="minus" value="-">
                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="qty" min="0" step="1">
                        <input type="button" class="plus" value="+">
                    </div>
                </td>

                <td class="product-subtotal">
                    <span class="amount">$amount</span> 
                </td>
                <input class="form-control" type="hidden" placeholder="id" name="id" value="$getID">


                </tr>
                <tr>
                <td class="actions" colspan="6">

                <input type="submit" class="btn btn-primary" name="$ip" value="Update Item" > 
                
              
                </form> 
                   
                    <a class="btn btn-primary" href='../actions/cart_action.php?deleteID={$value['product_id']}'> 
                        Delete Item
                    </a>

                   

                    
                    <a class="btn btn-primary" href='../login/login.php?payID={$value['product_id']}'> 
                        Checkout
                    </a>
                    
                    
                </td>
            </tr>
            </tbody>
        </table>
      

        <div class="cart-collaterals">


        <div class="cross-sells">
        <h2>You may be interested in...</h2>
        <ul class="products">
        <li class="product">
            <a href="singleProduct.php">
                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="$product_image">
                <h3>Ship Your Idea</h3>
                <span class="price"><span class="amount">$product_price</span></span>
            </a>

            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="singleProduct.php">Select options</a>
        </li>

        
        </ul>
        </div>


        <div class="cart_totals ">
        <h2>Cart Totals</h2>

        <table cellspacing="0">
        <tbody>
            <tr class="cart-subtotal">
                <th>Cart Subtotal</th>
                <td><span class="amount">$amount</span></td>
            </tr>

            <tr class="shipping">
                <th>Shipping and Handling</th>
                <td>Free Shipping</td>
            </tr>

            <tr class="order-total">
                <th>Order Total</th>
                <td><strong><span class="amount">$amount</span></strong> </td>
            </tr>
        </tbody>
        </table>
        </div>

        _ALL;

      }
    }

}


function total_quantity(){
    $ip = Cart::getIpAddress();
    $cart_instance = new Cart();
    $arr = $cart_instance-> cart_item_quantity($ip);
    if($arr){
        $row = $cart_instance->count();
        return ($row != null) ? $row : "0";
    }  else{
        return "0";
    }
}

function total_cart(){
    $ip = Cart::getIpAddress();
    $cart_instance = new Cart();
    $arr = $cart_instance->cart_item_amount($ip);
    if($arr){
        $row = $cart_instance->fetch();
        return ($row['amount'] != null) ? $row['amount'] : "0";
    }  
    else{
        return "0";
    }
}

function add_orders($status, $invoice){
    $arr = false;
    $ip = Cart::getIpAddress();
    $user_id=$_SESSION['user_id'];
    $cart_instance = new Cart();
    $cartProducts = $cart_instance->cart_items($ip);
    if($cartProducts){
        $cartItems = $cartObj->fetch();

        foreach ($cartItems as $item =>$value) {
            $prod_id = $value[0];
            $qty = $value[10];
            $toReturn = $cart_instance->add_orders($user_id, $prod_id, $qty, $invoice, $status);
        }
    }
   return $arr;
}




?>