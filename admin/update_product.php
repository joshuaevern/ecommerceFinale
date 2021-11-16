

<?php
//start session
session_start();
require ('../controllers/product_controller.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];
   
    $products_one = select_one_products_controller($id);
    
    
    $categories = select_all_categories_controller();
    $brands = select_all_brands_controller();
    $products = select_all_products_controller();

    $product_id = $products_one[0]['product_id'];
    $product_cat = $products_one[0]['product_cat'];
    $product_brand = $products_one[0]['product_brand'];
    $product_title = $products_one[0]['product_title'];
    $product_price = $products_one[0]['product_price'];
    $product_desc = $products_one[0]['product_desc'];  
    $product_img = $products_one[0]['product_image'];
  

   

  
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    
        <!-- Page Content  -->
<div id="content" class="p-4 p-md-5">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <li class="nav-item active">
            <a class="nav-link" href="logout.php">Home</a>
        </li>
  <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>         

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav ml-auto">                

          
          <li class="nav-item">
              <a class="nav-link btn" data-toggle="modal" data-target="#addCategoryModal">Update Category</a>
          </li>

          <li class="nav-item">
              <a class="nav-link btn" data-toggle="modal" data-target="#addBrandModal">Update Brand </a>
          </li>

          <li class="nav-item">
              <a class="nav-link btn" data-toggle="modal" data-target="#addProductModal" >Update Product</a>
          </li>
        
        
      </ul>
    </div>
  </div>
</nav>

       



    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>

    </div>
        <div class="">
                <div id="error_message" style="color: firebrick;"></div>
                <div class="modal-body">
                <form method="post" id="UploadForm" action="../actions/product_action.php" enctype="multipart/form-data" onsubmit="return validateUpload()">


<div class="form-group">
    <div class="input-group input-group-merge input-group-alternative mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-ui-04"></i></span>
        </div>
        <select id="brand_id" class="form-control" name="brand_name" required>
            <option  value="" disabled selected> -- select brand -- </option>
        <?php
        if ($brands){
            foreach ($brands as $value){
                $brand_name = $value['brand_name'];
                $brand_id = $value['brand_id'];
                

                echo "<option value='$brand_id'>$brand_name</option>";
            }

        }
        ?>
        </select >
        <small style="color:red;" id="category_error"></small>

<!--                                      <input id="name" type="text" placeholder="Name" class="form-control " name="name"   autocomplete="name" autofocus>-->
        <select id="category_id" class="form-control pull-right" name="cat_name"  required>
            <option value="" disabled selected> -- select category -- </option>
            <?php
            if ($categories){
                foreach ($categories as $value){
                    $cat_name = $value['cat_name'];
                    $cat_id = $value['cat_id'];
                   
                    echo "<option value='$cat_id' >$cat_name</option>";
                }

            }
            ?>

        </select>
    </div>


                            <small style="color:red;" id="category_error"></small>
                        </div>

                        <div class="form-group">
                            <small class="mb-2">Product title: </small>
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-align-left-2"></i></span>
                                </div>
                                <input  type="text" placeholder="Product title" class="form-control " name="prod_title" id="prod_title" value="<?=isset($product_title)?($product_title):'' ?>"  autocomplete="title" autofocus required>
                            </div>


                            <small style="color:red;" id="title_error"></small>

                        </div>
                        <div class="form-group">
                            <small class="mb-2">Price: </small>
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-active-40"></i></span>
                                </div>
                                <input  type="number" placeholder="Product price"  class="form-control "  id="prod_price" name="prod_price" value="<?=isset($product_price)?($product_price):'' ?>"  autocomplete="price" required>

                            </div>


                            <small style="color:red;" id="price_error"></small>

                        </div>

                        <div class="form-group">
                            <small class="mb-2">Product description: </small>
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-align-left-2"></i></span>
                                </div>
                                <input  type="text" id="prod_desc" placeholder="Product description" name="prod_desc" class="form-control" value="<?=isset($product_desc)?($product_desc):'' ?>"   required></input>


                            </div>


                            <small style="color:red;" id="description_error"></small>

                        </div>

                        <div class="form-group">
                            <small class="mb-2">Product image: </small>
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-image"></i></span>
                                </div>
                                <input type="file" class="form-control" id="prod_img" name="prod_img" accept="image/x-png,image/gif,image/jpeg" placeholder="Select product image" required>
                                <input type="hidden" class="form-control" value="<?=isset($product_id)?($product_id):'' ?>"  id="prod_id" name="prod_id" required>



                            </div>

                            <small style="color:red;" id="image_error" ></small>
                        </div>

                     


                        <input type="submit" name="update_product" class="btn btn-primary" value="Update Product">


                    </form>

                </div>
            </div>










        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/alert.js"></script>
        <script src="js/ajax.js"></script>

</body>
</html> 