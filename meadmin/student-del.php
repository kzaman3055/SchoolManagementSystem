<?php 
 $del_student = $_GET['studentid'];
$del_done = $sad->delete_student($del_student);
if($del_done==true)
{
	echo "<script>window.location = 'home.php?student=student-delete'; alert('success delete');</script>";
	
}
else
{
	echo "<script>window.location='home.php?student=student-delete'; alert('cant delete');</script>";
}
?>