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
	
	$select = "SELECT * FROM reviews WHERE id='$edit_id'";
	$run = mysqli_query($conn,$select);
	$row_content = mysqli_fetch_array($run);
		$doctorname = $row_content['doctorname'];
		$rating = $row_content['rating'];
		$comments = $row_content['comments'];
	}
	
?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Doctor Name</label>
      <input type="text" class="form-control" value ="<?php echo $doctorname?>" placeholder="Enter Doctor Full Name" name="doctorname">
    </div>
    <div class="form-group">
      <label>Rating</label>
      <input type="text" class="form-control" value ="<?php echo $rating?>" placeholder="Enter Doctor Rating" name="rating">
    </div>
	 <div class="form-group">
      <label>Comments</label>
      <input type="text" class="form-control" value ="<?php echo $comments?>" placeholder="Enter Comments" name="comments">
    </div>
	
    <input type="submit" name="insert-btn" class="btn btn-primary">
  </form>
 
<?php
$conn = mysqli_connect ('localhost','root','','healthcare');

if (isset($_POST['insert-btn'])){
	
	$edoctorname = $_POST['doctorname'];
	$erating = $_POST['rating'];
	$ecomments = $_POST['comments'];
	
	$update = "UPDATE reviews SET doctorname ='$edoctorname',rating='$erating',comments='$ecomments, WHERE id='$edit_id'";
	
	$run_update = mysqli_query ($conn,$update);
	if ($run_update === true){
		echo "<script>window.open('reviews_data.php','_self');</script>";
	}else{
		echo "Failed.Try again";
	}
	
}
?>
 

</div>

</body>
</html>