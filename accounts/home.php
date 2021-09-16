<?php 
include "../setting/config.php";
 session_start();
if(!$_SESSION['st_user'])
{
	
	header("location:index.php");
}
else
{
	$st_username = $_SESSION['st_user'];
	$st_name = $sad->account_info_select($st_username);
	
	$student_name_display = $st_name->fetch_assoc();
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
	<title>Account's Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
	<script src="js/amcharts.js"></script>
	<script src="js/serial.js"></script>
	<script src="js/light.js"></script>
	<script src="js/radar.js"></script>
	<link href="css/barChart.css" rel='stylesheet' type='text/css' />
	<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>

	<script src="js/jquery.easydropdown.js"></script>

	<!--//skycons-icons-->
</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">

					<div class="clearfix"></div>
				</div>
				<!-- //header-ends -->
				<div class="outter-wp">
					<!--/tabs-->
					<div class="tab-main">
						<!--/tabs-inner-->
						<div class="tab-inner">
							<div id="tabs" class="tabs">
								<h2 class="inner-tittle">Welcome,
									<?php echo ucfirst($student_name_display['username']); ?> </h2>
								<div class="graph">
									<nav>
										<ul>
											<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Payment</span></a></li>
											<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>History</span></a></li>
											
										</ul>
									</nav>
									<div class="content tab">
										<section id="section-1">
											
											<div class="mediabox">
												<?php 
												
 
												 if(isset($_POST['s_name']))
												 {
													 // $std_fullname,$std_username,$std_password,$std_grade,$std_roll,$std_dob,$std_address,$std_district,$std_gender,$std_father,$std_mother,$std_parent_contact
													 $s_name = $_POST['s_name'];
													 $amount = $_POST['amount'];
													 //echo $s_name;
													 //echo $amount;
													 
													 $query = "INSERT INTO `payments` (`st_id`, `amount`) VALUES ($s_name, $amount);";
													 $add_payment = $sad->connectdb->query($query);
													 if($add_payment==true){
													 	echo "<script>alert('Payment added');</script>";
													 }else{
													 	echo "<script>alert('Something wrong');</script>";
													 }
													 
												 }


												?>
												<div class="card">
														<div class="card-header">
															<h5>Add Payment</h5>
														</div>
														<div class="card-body">
															<form action="" method="post">
														  <div class="form-group">
														    <label for="exampleInputEmail1">Student</label>
														    <select class="form-control demoSelect" name="s_name" style="padding: 0" required="">
														    	<option value="">Select Student</option>
														    	<?php 
																$student_list = $sad->get_student();
																//var_dump($students);
														    	while($students = $student_list->fetch_assoc())
																{
																?>
																	<option value="<?php echo $students['st_id']; ?>"><?php echo $students['st_id']; ?></option>
																		
																<?php } ?>
														    </select>
														    
														  </div>
														  <div class="form-group">
														    <label for="exampleInputPassword1">Amount</label>
														    <input type="number" name="amount" min="1" class="form-control" id="exampleInputPassword1" required="" placeholder="amount">
														  </div>
														  
														  <button type="submit" class="btn btn-primary">Submit</button>
														</form>
														</div>
													</div>

												
												<!--//forms-->
											</div>
										</section>

										<section id="section-2">
											
											<div class="col-md-12">
												<?php 
												$paymentQuery = "SELECT payments.amount, st_info.st_fullname FROM payments
												INNER JOIN st_info
												ON payments.st_id=st_info.st_id;";
												$payment_list = $sad->connectdb->query($paymentQuery);
										
												?>
												<table class="table">
													<tr>
														<th>Sl</th>
														<th>Student Name</th>
														<th>Amount</th>
													</tr>
													<?php 
													$i = 1;
													while ($payments = $payment_list->fetch_assoc()) {
													    
													
													?>
													<tr>
														<td><?php echo $i++ ?></td>
														<td><?php echo $payments['st_fullname'] ?></td>
														<td><?php echo $payments['amount'] ?></td>
													</tr>
												<?php } ?>
												</table>
											</div>
										</section>
										
									</div>
									<!-- /content -->
								</div>
								<!-- /tabs -->

							</div>
							<script src="js/cbpFWTabs.js"></script>
							<script>
								new CBPFWTabs(document.getElementById('tabs'));
							</script>
							<div class="clearfix"> </div>
						</div>
					</div>
					<!--//tabs-inner-->



					<!--/charts-->
					<div class="charts">
						<div class="chrt-inner">
							<!--//weather-charts-->
							<div class="graph-visualization">
								
								<div class="col-md-6 map-2">
									<div class="profile-nav alt">
										<section class="panel">
											<div class="user-heading alt clock-row terques-bg">
												<h3 class="sub-tittle clock">Easy Clock </h3>
											</div>
											<ul id="clock">
												<li id="sec"></li>
												<li id="hour"></li>
												<li id="min"></li>
											</ul>



										</section>

									</div>
								</div>
								<div class="clearfix"> </div>
							</div>


						</div>
						<!--/charts-inner-->
					</div>
					<!--//outer-wp-->
				</div>
				<!--footer section start-->
				<footer>
					<p>All Rights Reserved. © 2020 by HCMSC</p>
				</footer>
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<div class="sidebar-menu">
			<header class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="../index.php"> <span id="logo"> <h1>Account</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
				<a href="#"><img src="images/ac.jpg"></a>
				<a href="#"><span class=" name-caret"><?php echo $student_name_display['username']; ?></span></a>
				<p><?php echo $student_name_display['username']; ?></p>
				<ul>
					
					<li><a class="tooltips" href="logouts.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
				</ul>
			</div>
			<!--//down-->
			
		</div>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<link rel="stylesheet" href="css/vroom.css">
	<script type="text/javascript" src="js/vroom.js"></script>
	<script type="text/javascript" src="js/TweenLite.min.js"></script>
	<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
		$('.demoSelect').select2();
	})
	</script>
</body>

</html>
