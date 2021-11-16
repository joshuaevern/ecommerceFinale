<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Create your account</p>
              <form action="../actions/registerprocess.php" method="POST">
                  <div class="form-group">
                    <label for="name" class="sr-only">Full Name</label>
                    <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Your name" onclick="return validateName()" required>
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="customer_email" id="customer_email" class="form-control" placeholder="Email address" onclick="return validateEmail()" required>
                    <?php if (isset($_SESSION['email-exist'])): ?>

                          <span class="focus-input100" style="color: firebrick;">
                               <?php
                               echo $_SESSION['email-exist'];
                               unset($_SESSION['email-exist']);
                               ?>
                          </span>

                    <?php endif ?>
                  </div>                  
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only"> Password</label>
                    <input type="password" name="customer_pass" id="customer_pass" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="password" class="sr-only">Confirm Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Confirm password" onclick="return validatePassword()" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="country" class="sr-only">Country</label>
                    <input type="text" name="customer_country" id="customer_country" class="form-control" placeholder="Your country" onclick="return validateCountry()" required>
                  </div>
                  <div class="form-group">
                    <label for="city" class="sr-only">City</label>
                    <input type="text" name="customer_city" id="customer_city" class="form-control" placeholder="Your city" onclick="return validateCity()" required>
                  </div>
                  <div class="form-group">
                    <label for="contact" class="sr-only">Contact</label>
                    <input type="tel" name="customer_contact" id="customer_contact" class="form-control" placeholder="Your contact" onclick="return validateContact()" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="userRole" class="sr-only">user_role</label>
                    <input type="hidden" name="user_role" id="user_role" class="form-control" placeholder="Your role" value="2">
                    
                  </div>

                  <input type="submit" name="registerUser" class="btn btn-block login-btn mb-4" value="Sign Up">
                </form>
               <!-- <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>-->
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use         </a>
                  <a href="#!">     Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="name" class="sr-only">name</label>
              <input type="name" name="name" id="name" class="form-control" placeholder="name">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script>src="../js/signup.js"</script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
