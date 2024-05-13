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
  <h2>Add New Content</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Full Name</label>
      <input type="text" class="form-control" placeholder="Enter Patient Full Name" name="fullname">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" placeholder="Enter Patient Email" name="email">
    </div>
	 <div class="form-group">
      <label>Phone Number</label>
      <input type="text" class="form-control" placeholder="Enter Patient Phone Number" name="phonenumber">
    </div>
	</div>
	 <div class="form-group">
      <label>Messages</label>
      <input type="text" class="form-control" placeholder="Enter Messages" name="phonenumber">
    </div>
	
    <input type="submit" name="insert-btn" class="btn btn-primary">
  </form>
 
<?php
$conn = mysqli_connect ("localhost","root","","healthcare");

if (isset($_POST['insert-btn'])){
	
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$messages = $_POST['messages'];
	
	$insert = "INSERT INTO patientinfo (fullname,email,phonenumber,messages)
	VALUES ('$fullname','$email','$phonenumber','$messages')";
	
	$run_insert = mysqli_query ($conn,$insert);
	if ($run_insert === true){
		echo "<script>window.open('messages_data.php','_self');</script>";
	}else{
		echo "Failed.Try again";
	}
	
}
?>
 

</div>

</body>
</html>