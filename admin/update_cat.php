<?php
  //start session

  require ('../controllers/product_controller.php');
  //calls methods in the controller to execute
  $id= $_GET['id'];
  $method = select_one_categories_controller($id);
 
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
                      <a class="nav-link btn" data-toggle="modal" data-target="#addBrandModal">Update Brand </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link btn" data-toggle="modal" data-target="#addCategoryModal">Update Category</a>
                  </li>
                
                  <li class="nav-item">
                      <a class="nav-link btn" data-toggle="modal" data-target="#addProductModal" >Update Product</a>
                  </li>
                
                
              </ul>
            </div>
          </div>
        </nav>
        
        <form method="POST" action="../actions/product_action.php" id="addProductForm" onsubmit="return validateNewBrand();">
                          <div class="form-group">
                          
                    <input class="form-control" type="text" placeholder="Category Name" name="cat_name" value="<?php echo $method[0]['cat_name']; ?>" >
				            <input class="form-control" type="hidden" placeholder="Category Name" name="cat_id" value="<?php echo $method[0]['cat_id']; ?>" >
			              </div>

                                                  
                		             
			                <input type="submit" value="update category">
                              
                          </form>

                             
                          </form>
                      </div>

                  </div>
              </div>
          </div>
