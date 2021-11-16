<?php
  //start session

  require ('../controllers/product_controller.php');
  //calls methods in the controller to execute
  $brands = select_all_brands_controller();
  $categories = select_all_categories_controller();
  $products = select_all_products_controller();

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Admin | Home </title>
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
                      <a class="nav-link btn" data-toggle="modal" data-target="#addCategoryModal">Add Category</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link btn" data-toggle="modal" data-target="#addBrandModal">Add Brand </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link btn" data-toggle="modal" data-target="#addProductModal" >Add Product</a>
                  </li>
                
                
              </ul>
            </div>
          </div>
        </nav>


        <!--          ADD PRODUCT MODAL-->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
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
                                  <div class="input-group input-group-merge input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-align-left-2"></i></span>
                                      </div>
                                      <input  type="text" placeholder="Product title" class="form-control " name="prod_title" id="prod_title" value=""  autocomplete="title" autofocus required>
                                  </div>


                                  <small style="color:red;" id="title_error"></small>

                              </div>
                              <div class="form-group">
                                  <small class="mb-2">Price: </small>
                                  <div class="input-group input-group-merge input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-active-40"></i></span>
                                      </div>
                                      <input  type="number" placeholder="Product price"  class="form-control "  id="prod_price" name="prod_price" value="" autocomplete="price" required>

                                  </div>


                                  <small style="color:red;" id="price_error"></small>

                              </div>

                              <div class="form-group">
                                  <div class="input-group input-group-merge input-group-alternative">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-align-left-2"></i></span>
                                      </div>
                                      <textarea   cols="3" rows="3" id="prod_desc" name="prod_desc" class="form-control"  placeholder="Product description" required></textarea>


                                  </div>


                                  <small style="color:red;" id="description_error"></small>

                              </div>

                              <div class="form-group">
                                  <div class="input-group input-group-merge input-group-alternative">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-image"></i></span>
                                      </div>
                                      <input type="file" class="form-control" id="prod_img" name="prod_img" accept="image/x-png,image/gif,image/jpeg" placeholder="Select product image" required>



                                  </div>

                                  <small style="color:red;" id="image_error" ></small>
                              </div>

                              <div class="form-group">

<!--                                  <div class="input-group input-group-merge input-group-alternative mb-3">-->
<!--                                      <div class="input-group-prepend">-->
<!--                                          <span class="input-group-text"><i class="ni ni-active-40"></i></span>-->
<!--                                      </div>-->
<!--                                      <input  type="hidden" class="form-control" name="status" value="1">-->
<!---->
<!--                                  </div>-->

                              </div>


                              <input type="submit" name="addProductButton" class="btn btn-primary" value="Add Product">


                          </form>

                      </div>

                  </div>
              </div>
          </div>

          <!--          ADD PRODUCT MODAL END -->



        <!-- ADD CATEGORY MODAL -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div id="error_message" style="color: firebrick;"></div>
                          <form method="POST" action="../actions/product_action.php" onsubmit="return validateAddNewCategory();">
                              <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Category Name:</label>
                                  <input type="text" class="form-control" id="name" name="category" required>
                              </div>
                             
                              <div id="error_message" style="color: firebrick;"></div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit"  name="addCategoryButton" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
                      </div>

                  </div>
              </div>
          </div>


          
<!--   ADD CATEGORY - END       -->

<!--         ADD BRAND MODAL  -->
          <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                          <form method="POST" action="../actions/product_action.php" id="addProductForm" onsubmit="return validateAddNewBrand();">
                          <div class="form-group">
				            <input class="form-control" type="text" placeholder="Brand Name" name="brand" >
			              </div>

			             
			                <input type="submit" name="addBrandButton">
                              
                          </form>
                      </div>

                  </div>
              </div>
          </div>
<!--  ADD PRODUCT MODAL  END -->


          <h5>Brand</h5>
          <table class="table table-hover ">
              <thead>
              <tr>

                  <th>Brand Name</th>
                 
                  
                  <th></th>
				  <th></th>

              </tr>
              </thead>
              <tbody>

              <?php

                foreach ($brands as $x) {
                                    
                                       
                    echo 
				"
				<tr>
					<td>{$x['brand_name']}</td>
					
					<td><a href='update_brand.php?id={$x['brand_id']}'>Update</a></td>
					<td><a href='../actions/product_action.php?deleteBrandsID={$x['brand_id']}'>Delete</a></td>
				</tr>
				";                     

                     
                }              

              ?>
              </tbody>
          </table>
          
          <h5>Category</h5>
          <table class="table table-hover ">
              <thead>
              <tr>

                  <th>Category Name</th>
                 
                  
                  <th></th>
				  <th></th>

              </tr>

              </thead>

              <tbody>

              <?php

                foreach ($categories as $x) {
                                    
                                       
                    echo 
				"
				<tr>
					<td>{$x['cat_name']}</td>
					
					<td><a href='update_cat.php?id={$x['cat_id']}'>Update</a></td>
					<td><a href='../actions/product_action.php?deleteCategoriesID={$x['cat_id']}'>Delete</a></td>
				</tr>
				";                     

                     
                }              

              ?>
              </tbody>
          </table>
          

          <h5>Products</h5>
          <table class="table table-hover ">
              <thead>
              <tr>

                      <th>ID</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Description</th>          
                  
                      <th>Action</th>
				 

              </tr>
              </thead>
              <tbody>

              <?php

                foreach ($products as $x) {
                                    
                                       
                    echo 
				"
				<tr>
                    <td>{$x['product_id']}</td>
					<td>{$x['product_cat']}</td>
                    <td>{$x['product_brand']}</td>
                    <td>{$x['product_title']}</td>
                    <td>{$x['product_price']}</td>
                    <td>{$x['product_desc']}</td>
                    
					
					<td><a href='update_product.php?id={$x['product_id']}'>Update</a></td>
					<td><a href='../actions/product_action.php?deleteProductsID={$x['product_id']}'>Delete</a></td>
				</tr>
				";                     

                     
                }              

              ?>
              </tbody>
          </table> 
          
         
 
         

          
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/alert.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/validation.js"></script>

  </body>
</html>
