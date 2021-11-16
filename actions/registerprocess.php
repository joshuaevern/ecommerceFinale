<?php
session_start();

require('../controllers/customer_controller.php');

//userregistration
//chech for a POST variable with the name 

if(isset($_POST['registerUser'])){
    
    //retrieve the customer details
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_pass = $_POST['customer_pass'];
    $customer_country = $_POST['customer_country'];
    $customer_city = $_POST['customer_city'];
    $customer_contact = $_POST['customer_contact'];
    $user_role = $_POST['user_role'];


    $hashed_password = password_hash($customer_pass, PASSWORD_DEFAULT);
    
    //call the add customer controller
    $register = addCustomerController($customer_name, $customer_email, $hashed_password, $customer_country,$customer_city,$customer_contact,$user_role);
   
    if($register){
        
        header("Location: ../login/login.php");
        $_SESSION['register-success'] = 'Successfully created';
    }
  else {
      header("Location: register.php");
      $_SESSION['register-error'] = 'Error registering';
  }

}



if(isset($_POST['registerAdmin'])){
    
    //retrieve the customer details
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_pass = $_POST['customer_pass'];
    $customer_country = $_POST['customer_country'];
    $customer_city = $_POST['customer_city'];
    $customer_contact = $_POST['customer_contact'];
    $user_role = $_POST['user_role'];


    $hashed_password = password_hash($customer_pass, PASSWORD_DEFAULT);
    
    //call the add customer controller
    $register = addCustomerController($customer_name, $customer_email, $hashed_password, $customer_country,$customer_city,$customer_contact,$user_role);
   
    if($register){
        
        header("Location: ../admin/adminLogin.php");
        $_SESSION['register-success'] = 'Successfully created';
    }
  else {
      header("Location: register.php");
      $_SESSION['register-error'] = 'Error registering';
  }

}


    
?>