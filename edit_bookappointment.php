<?php
session_start();

if(!isset($_SESSION['email'])){
	echo "<script>window.open('login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HEALTHCARE | SALAM Medical Record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>Edit Content</h2>
 
 <?php
	$conn = mysqli_connect ('localhost','root','','healthcare');
	if (isset($_GET['edit'])){
		$edit_id = $_GET['edit'];
	
	$select = "SELECT * FROM bookappointment WHERE id='$edit_id'";
	$run = mysqli_query($conn,$select);
	$row_content = mysqli_fetch_array($run);
		$doctorname = $row_content['doctorname'];
		$appointmentdate = $row_content['appointmentdate'];
		$appointmenttime = $row_content['appointmenttime'];
		$status = $row_content['status'];
	}
	
?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Doctor Name</label>
      <input type="text" class="form-control" value ="<?php echo $fullname?>" placeholder="Enter Doctor Name" name="fullname">
    </div>
    <div class="form-group">
      <label>Appointment Date</label>
      <input type="text" class="form-control" value ="<?php echo $appointmentdate?>" placeholder="Enter Appointment Date" name="appointmentdate">
    </div>
	 <div class="form-group">
      <label>Appointment Time</label>
      <input type="text" class="form-control" value ="<?php echo $appointmenttime?>" placeholder="Enter Appointment Time" name="appointmenttime">
    </div>
	<div class="form-group">
      <label>Status</label>
      <input type="text" class="form-control" value ="<?php echo $status?>" placeholder="Enter Status" name="status">
    </div>
    <input type="submit" name="insert-btn" class="btn btn-primary">
  </form>
 
<?php
$conn = mysqli_connect ('localhost','root','','healthcare');

if (isset($_POST['insert-btn'])){
	
	$edoctorname = $_POST['doctorname'];
	$eappointmentdate = $_POST['appointmentdate'];
	$eappointmenttime = $_POST['appointmenttime'];
	$status = $_POST['status'];
	
	$update = "UPDATE patientinfo SET doctorname ='$edoctorname',appointmentdate='$eappointmentdate',appointmenttime='$eappointmenttime',status='$estatus' WHERE id='$edit_id'";
	
	$run_update = mysqli_query ($conn,$update);
	if ($run_update === true){
		echo "<script>window.open('bookappointment_data.php','_self');</script>";
	}else{
		echo "Failed.Try again";
	}
	
}
?>
 

</div>

</body>
</html>