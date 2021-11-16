<?php
session_start();
require('../controllers/customer_controller.php');

    //customer log in
     if (isset($_POST['loginUser']) ){
       //check login details
        $customer_email = $_POST['customer_email'];
        $customer_pass = $_POST['customer_pass'];         
        
        //call the select one customer controller
        //it is not working
        $login = selectOneCustomerController($customer_email); 
       
               
        if ($login){         
          $hashed_password = $login['customer_pass'];

          if(password_verify($customer_pass, $hashed_password)){
            header("Location: ../view/initialize.php");
            $_SESSION['register-success'] = 'Successfully created';
          }  
          else {
          header("Location: ../login/register.php");
          $_SESSION['register-error'] = 'Error registering';
          }
  }

}


if (isset($_POST['loginAdmin']) ){
  //check login details
   $customer_email = $_POST['customer_email'];
   $customer_pass = $_POST['customer_pass'];   
          
   
   //call the select one customer controller
   //it is not working
   $login = selectOneCustomerController($customer_email); 
  
          
   if ($login){         
     $hashed_password = $login['customer_pass'];

     if(password_verify($customer_pass, $hashed_password)){
       header("Location: ../admin/index.php");
       $_SESSION['register-success'] = 'Successfully created';
     }  
     else {
     header("Location: ../admin/adminRegister.php");
     $_SESSION['register-error'] = 'Error registering';
     }
}

}


    
    
?>