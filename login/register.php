

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Register Customer</title>

<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta property="og:title" content="Vide" />
        <meta name="keywords" content="Loozeelee Initiative" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="../css/style.css" rel='stylesheet' type='text/css' />
        <!-- js -->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <!-- //js -->
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="../js/move-top.js"></script>
        <script type="text/javascript" src="../js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){		
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
        <link href="../css/font-awesome.css" rel="stylesheet"> 
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
        <!--- start-rate---->
        <script src="../js/jstarbox.js"></script>
            <link rel="stylesheet" href="../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
                <script type="text/javascript">
                    jQuery(function() {
                    jQuery('.starbox').each(function() {
                        var starbox = jQuery(this);
                            starbox.starbox({
                            average: starbox.attr('data-start-value'),
                            changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                            ghosting: starbox.hasClass('ghosting'),
                            autoUpdateAverage: starbox.hasClass('autoupdate'),
                            buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                            stars: starbox.attr('data-star-count') || 5
                            }).bind('starbox-value-changed', function(event, value) {
                            if(starbox.hasClass('random')) {
                            var val = Math.random();
                            starbox.next().text(' '+val);
                            return val;
                            } 
                        })
                    });
                });
                </script>
        <!---//End-rate---->

</head>
<body>
<div class="header">
    <div class="container">
        <div class="logo">
            <h1 ><a href="../index.php"></b>LooZeeLee<span style="color:green">Act Transform Sustain</span></a></h1>
        </div>
    </div>

</div>



     <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Register</h3>
		<h4><a href="index.php">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--Register form-->

	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="../actions/registerprocess.php" method="post">
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Enter first name" name="Fname"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Enter last name " name="Lname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="email"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="" >
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="pass_1" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="" >
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Confirm Password" name="pass_2"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="" >
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fa fa-flag" aria-hidden="true"></i>
							<input  type="text" value="Country" name="country" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fas fa-city" aria-hidden="true"></i>
							<input  type="text" value="City" name="city"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="" >
							<div class="clearfix"></div>
						</div>

						<div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input  type="text" value="Enter phone number" name="contact"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="" >
							<div class="clearfix"></div>
						</div>
						
						<input type="submit" name ="registerUser" value="Submit">
					</form>
				</div>
				
			</div>
		</div>

</body>
</html>

<?php

	include_once "../services/footer.html";

?>