<?php 

 $student_id = $_GET['studentid'];
 $edit_student_info = $sad->edit_studentid($student_id);
	$edit_student_display = $edit_student_info->fetch_assoc();


if(isset($_POST['up_student']))
{
	
	
	$up_sfullname = $_POST['up_sfullname'];
	$up_grade = $_POST['up_grade'];
	$up_rollno = $_POST['up_rollno'];
	$up_susername = $_POST['up_susername'];
	$up_spassword = $_POST['up_spassword'];
	$up_saddress = $_POST['up_saddress'];
	$up_sfather = $_POST['up_sfather'];
	$up_smother = $_POST['up_smother'];
	$up_sdob = $_POST['up_sdob'];
	$up_sdistrict = $_POST['up_sdistrict'];
	$up_parents_contact = $_POST['up_parents_contact'];
	$up_sgender = $_POST['up_sgender'];
	
	$update_done = $sad->update_student_info($up_sfullname,$up_grade,$up_rollno,$up_susername,$up_spassword,$up_saddress,$up_sfather,$up_smother,$up_sdob,$up_sdistrict,$up_parents_contact,$up_sgender,$student_id);
	if($update_done==true)
	{
		echo "<script>window.location='home.php?sad=student-information';</script>";
	}
	else
	{
		echo "<script>alert('Cant update Information');</script>";
	}
	

}

?>
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="index.html">Home</a></li>
			<li class="active">
				<?php if(isset($_GET['sad'])){ echo strtoupper($page=$_GET['sad']); } ?>
			</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h2 class="inner-tittle">
			<?php echo strtoupper($_GET['sad']); ?>
		</h2>

		<div class="grid-1">
			<div class="form-body">
				<form class="form-horizontal" method="post">
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="up_sfullname" value="<?php echo $edit_student_display['st_fullname']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Grade</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="up_grade" value="<?php echo $edit_student_display['st_address']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Roll</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_rollno" value="<?php echo $edit_student_display['roll_no']; ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_susername" value="<?php echo $edit_student_display['st_username']; ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">PASSWORD</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_spassword" value="<?php echo $edit_student_display['st_password']; ?>"> </div>

					</div>

					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_saddress" value="<?php echo $edit_student_display['st_address']; ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Father</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_sfather" value="<?php echo $edit_student_display['st_father']; ?>"> </div>

					</div>
					
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Mother</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_smother" value="<?php echo $edit_student_display['st_mother']; ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">DOB</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_sdob" value="<?php echo $edit_student_display['st_dob']; ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">District</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_sdistrict" value="<?php echo $edit_student_display['st_district']; ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Contact</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_parents_contact" value="<?php echo $edit_student_display['st_parents_contact']; ?>"> </div>

					</div>
					<div class="form-group">


						<select id="selector1" class="form-control1" name="up_sgender">
						   <option value="<?php echo $edit_student_display['st_gender']; ?>">Select Gender</option>
							<option>Male</option>
						   <option>Female</option>
							</select>
					</div>


					<div class="col-sm-offset-2"> <button type="submit" class="btn btn-default" name="up_student">Update student Profile</button> </div>
				</form>
			</div>

		</div>


	</div>