<div class="outter-wp">
									<!--sub-heard-part-->
									  <div class="sub-heard-part">
									   <ol class="breadcrumb m-b-0">
											<li><a href="index.html">Home</a></li>
											<li class="active"><?php if(isset($_GET['sad'])){ echo strtoupper($page=$_GET['sad']); } ?></li>
										</ol>
									   </div>
								  <!--//sub-heard-part-->
									<div class="graph-visual tables-main">
											<h2 class="inner-tittle"><?php echo strtoupper($_GET['sad']); ?></h2>
												
											<form method="post">
								<select name="class_students_data" id="selector1" class="form-control1">
							<option>Select Class</option>
													<?php 
												$opt = $sad->grade($grade);
													while($op=$opt->fetch_assoc())
													{
														
													
													?>
												
							<option value="<?php echo $op['class']; ?>"><?php echo $op['class']; ?></option>
													<?php }?>
											
							</select>
								<input type="submit" name="students_info" class="btn red" value="View Class Data">
									</form>	
										<?php
										
										if(isset($_POST['students_info']))
										{
											$class_students_data = $_POST['class_students_data'];
										$student_dis_admin=	$sad->student_info_display_admin($class_students_data);
											$s_sn = 1;
														
										
										?>
										
										
															  <div class="graph">
															<div class="tables">
														
																<table class="table table-bordered "> 
															 
																	<thead>
																		<tr>
																			<th>#</th>
																			 
																			<th>Student Fullname</th> 
																			<th>Class</th>
																			<th>Roll</th>
																			<th>Username</th>
																			<th>Password</th>
																			<th>Address</th>
																			<th>Father</th>
																			<th>Mother</th>
																			<th>DOB</th>
																			<th>District</th>
																			<th>Contact</th>
																			<th>Gender</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody> 
																		
										
												
														
													
																													



																	<?php 
											 if($student_dis_admin->num_rows>0){
												$s_sn = 1;
											while($student_info_admin =$student_dis_admin->fetch_assoc())					{ ?>




											
																	
																
														<tr>
														<th scope="row">
																	<?php echo $s_sn; ?></td>
															</th>
														
															<td>
															<?php echo $student_info_admin['st_fullname']; ?></td>
															<td><?php echo $student_info_admin['st_grade']; ?></td>
															<td><?php echo $student_info_admin['roll_no']; ?></td>
															<td><?php echo $student_info_admin['st_username']; ?></td>
															<td><?php echo $student_info_admin['st_password']; ?></td>
															<td><?php echo $student_info_admin['st_address']; ?></td>
															<td><?php echo $student_info_admin['st_father']; ?></td>
															<td><?php echo $student_info_admin['st_mother']; ?></td>
															<td><?php echo $student_info_admin['st_dob']; ?></td>
															<td><?php echo $student_info_admin['st_district'] ?></td>
															<td><?php echo $student_info_admin['st_parents_contact']; ?></td>
															<td><?php echo $student_info_admin['st_gender']; ?></td>
																		<td>
                                                                        <a href="home.php?sad=student-editnow&studentid=<?php echo $student_info_admin['st_id']; ?>" class="btn red">Edit</a>
															</tr>	<?php $s_sn++; }} else {
										 ?>
																		<td colspan="12">No any Students information found
																			</td>
																		<?php 
										}  } ?>
																	</tbody> 
															
																</table> 
															</div>
													</div>
																
											
										</div>
										<!--//graph-visual-->
									</div>