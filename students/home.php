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
	$st_name = $sad->student_info_select($st_username);
	
	$student_name_display = $st_name->fetch_assoc();
	/*$st_grade = $st_name->fetch_assoc();
	var_dump($st_grade);*/
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
	<title>Student's Panel</title>
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
									<?php echo ucfirst($student_name_display['st_fullname']); ?> </h2>
								<div class="graph">
									<nav>
										<ul>
											<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Information</span></a></li>
											<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Change Password</span></a></li>
											
											<li><a href="#section-5" class="icon-truck"> <span>Results</span></a></li>
											<li><a href="#section-6" class="icon-truck"> <span>Payment</span></a></li>
										</ul>
									</nav>
									<div class="content tab">
										<section id="section-1">
											<div class="mediabox">
												<strong>Personal Information</strong>
												<p> <strong>WELCOME</strong>,
													<?php echo ucfirst($student_name_display['st_fullname']); ?>
												</p>
												<p><strong>standard: </strong>
													<?php echo ucfirst($student_name_display['st_grade']); ?>
												</p>
												<p><strong>Roll No: </strong>
													<?php echo ucfirst($student_name_display['roll_no']); ?>
												</p>
												<p><strong>Gender: </strong>
													<?php echo ucfirst($student_name_display['st_gender']); ?>
												</p>
												<p> <strong>Date of Birth:</strong>
													<?php echo ucfirst($student_name_display['st_dob']); ?>
												</p>

											</div>
											<div class="mediabox">
												<strong>Contact Details</strong>

												<p> <strong>Address:</strong>
													<?php echo ucfirst($student_name_display['st_address']); ?>
												</p>
												<p> <strong>District:</strong>
													<?php echo ucfirst($student_name_display['st_district']); ?>
												</p>
												<p> <strong>Username:</strong>
													<?php echo ucfirst($student_name_display['st_username']); ?>
												</p>
											</div>
											<div class="mediabox">
												<strong>Parents Detail</strong>
												<p><strong>Father Name: </strong>
													<?php echo ucfirst($student_name_display['st_father']); ?>
												</p>
												<p><strong>Mother Name: </strong>
													<?php echo ucfirst($student_name_display['st_mother']); ?>
												</p>
												<p><strong>Parents Contact: </strong>
													<?php echo ucfirst($student_name_display['st_parents_contact']); ?>
												</p>
											</div>
										</section>
										<section id="section-2">
										
											
											<div class="col-md-12">
												<?php 
												if(isset($_POST['change_password']))
												{
													
													$prev_password = $student_name_display['st_password'];
													$old_password = $_POST['old_password'];
													
													if($prev_password!=$old_password)
													{ 
														echo "<script>alert('Old Password Does not Matched');</script>";	
													}
													else
													{
														$st_username = $student_name_display['st_username'];
													$st_password_update = $_POST['new_password'];
														$update_success = $sad->student_password_change($st_password_update,$st_username);
														print_r($update_success);
													
													if($update_success==true)
													{
													echo "<script>window.location = 'home.php?success';</script>";
													}
														else
														{
															echo "<script>alert('cant update password');</script>";
														}
													}
													
												}
										
												?>
												<form method="post">
												<div class="input-group input-icon">
													<span class="input-group-addon">
												<i class="fa fa-key"></i>	</span>
													<input type="password" class="form-control1 icon" name="old_password" placeholder="Old Password">
													
												</div>
												<div class="input-group input-icon">
													<span class="input-group-addon">
												<i class="fa fa-key"></i>	</span>
													<input type="password" class="form-control1 icon" placeholder="New Password" name="new_password">
													
												</div>	
										
													<input type="submit" name="change_password" class="a_demo_four" value="Change Password">
													</form>
											</div>
										</section>
										<section id="section-3">
												<div class="graph">
															<div class="tables">
															
																<table class="table table-hover"> 
																	<thead>
																		<tr> 
																			<th>#</th> 
																			<th>Photo</th> 
																			<th>Teacher Name</th> 
																			<th>Subject</th>
																			<th>Email</th> 
																			<th>Time</th>
																		</tr> 
																	</thead> 
																	<tbody>
															<?php 
															$st_grade = $student_name_display['st_grade'];
															$sn = 1;
															$teacher_info_in_student = $sad->teacher_info_instudent($st_grade);
																while($t_info = $teacher_info_in_student->fetch_assoc())		{ 
																		?>
																		
																		<tr>
																			<th scope="row"><?php echo $sn; ?></th>
																			<td></td>
																			<td><?php echo ucwords($t_info['t_fullname']); ?></td> 
																			<td><?php echo ucwords($t_info['subject_name']); ?></td> 
																			<td><?php echo strtolower($t_info['t_email']); ?></td> 
																			<td><?php echo $t_info['time']; ?></td>
																		</tr> 
																		<?php $sn++; } ?>
																	</tbody> 
																</table>
															</div>
												
													</div>
											
										
										</section>
										<section id="section-4">
											<div class="graph">
											<div class="tables">
															
																<table class="table table-hover"> 
																	<thead>
																		<tr> 
																			<th>#</th> 
																	 
																			<th>Teacher Name</th> 
																			<th>Subject</th>
																			
																		</tr> 
																	</thead> 
																	<tbody>
															<?php 
															$st_grade = $student_name_display['st_grade'];
															$sn = 1;
															$teacher_info_in_student = $sad->teacher_info_instudent($st_grade);
																while($t_info = $teacher_info_in_student->fetch_assoc())		{ 
																		?>
																		
																		<tr>
																			<th scope="row"><?php echo $sn; ?></th>
																		
																			<td><?php echo ucwords($t_info['t_fullname']); ?></td> 
																			<td><?php echo ucwords($t_info['subject_name']); ?></td> 
																			
																		</tr> 
																		<?php $sn++; } ?>
																	</tbody> 
																</table>
															</div>
											</div>
										</section>
										<section id="section-5">
											<div class="mediabox">

											</div>
											<div class="mediabox">

											</div>
											<div class="mediabox">

											</div>
										</section>
										<section id="section-6">
											<div class="col-md-12">
												<div class="card">
													<div class="card-header">
														<h5>Payment History</h5>
													</div>
													<div class="card-body">
														<?php 
														$amnt = 0;
														$paymentQuery = "SELECT payments.amount, st_info.st_fullname,st_info.st_username FROM payments INNER JOIN st_info ON payments.st_id=st_info.st_id where st_info.st_username='$st_username';";

														$payment_list = $sad->connectdb->query($paymentQuery);

														
														$st_grade = $student_name_display['st_grade'];


														$classQuery = "SELECT * FROM amount where class='$st_grade' Limit 1;";
														$payment_amount = $sad->connectdb->query($classQuery);
														$payment_amount = $payment_amount->fetch_assoc();
														//var_dump($payment_amount);
												
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
																<td><?php echo $payments['st_username'] ?></td>
																<td>
																	<?php $amnt += $payments['amount'] ?>
																	<?php echo $payments['amount'] ?>
																</td>
															</tr>
														<?php } ?>
														</table>
													</div>
													Payable = <?php echo $payment_amount['payable_amount']; ?>
													<br>
													Total Paid = <?php echo $amnt ?>
													<br>
													Dues = <?php echo $payment_amount['payable_amount'] -$amnt ?>
												</div>
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
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="../index.php"> <span id="logo"> <h1>Student</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
				<a href="#"><img src="images/s.jpg"></a>
				<a href="#"><span class=" name-caret"><?php echo $student_name_display['st_fullname']; ?></span></a>
				<p>Student</p>
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

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
