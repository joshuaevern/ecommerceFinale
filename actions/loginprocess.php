<?php
  require('../controllers/customer_controller.php');
  require('../settings/core.php');

    //customer log in
     if (isset($_POST['loginUser']) ){
       //check login details
        $customer_email = $_POST['email'];
        $customer_pass = $_POST['pass_1'];         
        
        //call the select one customer controller
        //it is not working
        $login = selectOneCustomerController($customer_email); 
       
               
        if ($login){         
          $hashed_password = $login['customer_pass'];

          if(password_verify($customer_pass, $hashed_password)){
            //header("Location: ../view/initialize.php");
            $_SESSION['register-success'] = 'Successfully created';
            $_SESSION['user_id'] =$result["customer_id"];
            $_SESSION['user_role']=$result["user_role"];

            //var_dump($_SESSION['user_role']);
            if($_SESSION['user_role']==1){
              //if role is 1 load admin index page
              header("Location: ../Admin/index.php");
          }
          //other wise user is a regular customer, laod user view index page
          else header("Location: ../View/products.php");
          }  
          else {
            echo '<script>alert("Incorrect Password");
            window.location ="../view/login.php";
            </script>';
          //header("Location: ../login/register.php");
          //$_SESSION['register-error'] = 'Error registering';
          }
  }

}


// if (isset($_POST['loginAdmin']) ){
//   //check login details
//    $customer_email = $_POST['customer_email'];
//    $customer_pass = $_POST['customer_pass'];   
          
   
//    //call the select one customer controller
//    //it is not working
//    $login = selectOneCustomerController($customer_email); 
  
          
//    if ($login){         
//      $hashed_password = $login['customer_pass'];

//      if(password_verify($customer_pass, $hashed_password)){
//        header("Location: ../admin/index.php");
//        $_SESSION['register-success'] = 'Successfully created';
//      }  
//      else {
//      header("Location: ../admin/adminRegister.php");
//      $_SESSION['register-error'] = 'Error registering';
//      }
// }

//}


    
    
?>