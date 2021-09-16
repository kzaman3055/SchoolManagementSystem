<?php 
session_start();

if(@$_SESSION['t_user'])
{
	header("location:home.php");
}
 include "../setting/config.php";
if(isset($_POST['t_signin']))
{
 $t_username = $_POST['t_username'];
	
	$t_password = $_POST['t_password']; 
	
	if($t_username=="" || $t_password=="")
	{
      echo "<script>alert('Please Fill Properly');</script>";
	}
	 else
	 {
	$go = $sad->t_login_check($t_username,$t_password);
	if($go==1)
	{
		$_SESSION['t_user'] = $t_username;
		header("location:home.php");
	}
	else
	{
		echo "<script>alert('login failed');</script>";
	}
	 }
	
}

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Teacher Login Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<!--clock init-->
</head> 
<body>
								<!--/login-->
								
									   <div class="error_page">
												<!--/login-top-->
												
													<div class="error-top">
													<h2 class="inner-tittle page">Teacher Login</h2>
													    <div class="login">
														<h3 class="inner-tittle t-inner">Login</h3>
																<div class="buttons login">
																			
																				<div class="clearfix"></div>
																			
																		</div>
																<form method="post">
																		<input type="text" class="text" name="t_username" placeholder="Username">
																		<input type="password" placeholder="Password" name="t_password">
																		<div class="submit"><input type="submit" value="Login" name="t_signin"></div>
																		<div class="clearfix"></div>
																	</form>
														</div>

														
													</div>
									
													
													
												<!--//login-top-->
										   </div>
										   
										  	<!--//login-->
										    <!--footer section start-->
										<div class="footer">
										<div class="error-btn">
															<a class="read fourth" href="../index.php">Return to Home</a>
															</div>
										   <p>All Rights Reserved. © 2020 by HCMSC</p>
										</div>
									<!--footer section end-->
									<!--/404-->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
