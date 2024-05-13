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
	
	$select = "SELECT * FROM schedule WHERE id='$edit_id'";
	$run = mysqli_query($conn,$select);
	$row_content = mysqli_fetch_array($run);
		$doctorid = $row_content['doctorid'];
		$appointmentdate = $row_content['appointmentdate'];
		$appointmenttime = $row_content['appointmenttime'];
	}
	
?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Doctor ID</label>
      <input type="text" class="form-control" value ="<?php echo $doctorid?>" placeholder="Enter Doctor ID" name="doctorid">
    </div>
    <div class="form-group">
      <label>Appointment Date</label>
      <input type="text" class="form-control" value ="<?php echo $appointmentdate?>" placeholder="Enter Appointment Date" name="appointmentdate">
    </div>
	 <div class="form-group">
      <label>Appointment Time</label>
      <input type="text" class="form-control" value ="<?php echo $appointmenttime?>" placeholder="Enter Appointment Time" name="appointmenttime">
    </div>
    <input type="submit" name="insert-btn" class="btn btn-primary">
  </form>
 
<?php
$conn = mysqli_connect ('localhost','root','','healthcare');

if (isset($_POST['insert-btn'])){
	
	$edoctorid = $_POST['doctorid'];
	$eappointmentdate = $_POST['appointmentdate'];
	$appointmenttime = $_POST['appointmenttime'];
	
	$update = "UPDATE schedule SET doctorid ='$edoctorid',appointmentdate='$eappointmentdate',appointmenttime='$eappointmenttime' WHERE id='$edit_id'";
	
	$run_update = mysqli_query ($conn,$update);
	if ($run_update === true){
		echo "<script>window.open('schedule_data.php','_self');</script>";
	}else{
		echo "Failed.Try again";
	}
	
}
?>
 

</div>

</body>
</html>