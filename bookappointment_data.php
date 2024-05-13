<?php
session_start();
$connect = mysqli_connect("localhost","root","","healthcare");
$query = "SELECT * FROM bookappointment ORDER BY ID DESC";
$result = mysqli_query($connect, $query);

if(!isset($_SESSION['email'])){
	echo "<script>window.open('login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html>

<br><br>
	<head>
		<link href="style2.css" rel="stylesheet" type="text/css">
		<title>HEALTHCARE | SALAM Medical Record</title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/jqc-1.12.4/dt-1.13.1/b-2.3.3/sc-2.0.7/sb-1.4.0/datatables.min.css"/>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jqc-1.12.4/dt-1.13.1/b-2.3.3/sc-2.0.7/sb-1.4.0/datatables.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
	</head>
	
	<body>
	
	<header>
	 <div class="container">
            <div class="top-bar">
                <a href="patientinfo_data.php">Patient Info</a>
                <a href="messages_data.php">Messages</a>
                <a href="reviews_data.php">Reviews</a>
				<a href="schedule_data.php">Schedule</a>
                <a href="bookappointment_data.php">Book Appointment</a>
                <a href="editprofile_data.php">Edit Profile</a>
                <!-- Add more pages as needed -->

                <!-- Add other content here -->
            </div>

	
	<div class ="container">
		<h3 align ="center">HEALTHCARE | SALAM Medical Record</h3>
		<br>
		<div class ="table-responsive">
			<table id ="view_data" class ="table table-striped table-bordered">
				<thead>
					<tr>
						<td>Doctor Name</td>
						<td>Appointment Date</td>
						<td>Appointment Time</td>
						<td>Status</td>
						<td>Update</td>
						<td>Delete</td>
						
					</tr>
				</thead>
				<?php
				while($row=mysqli_fetch_array($result))
				{
					echo'
					<tr>
						<td>'.$row["doctorname"].'</td>
						<td>'.$row["appointmentdate"].'</td>
						<td>'.$row["appointmenttime"].'</td>
						<td>'.$row["status"].'</td>
						<td><a class="btn btn-primary" href="edit_bookappointment.php?edit='.$row["id"].'">Update</a></td> 
						<td><a class="btn btn-danger" href="bookappointment_data.php?del='.$row["id"].'">Delete</a></td>
					</tr>
				';}
				?>
			</table>
			<a class="btn btn-success" href="add_bookappointment.php">Add New Data</a>
			<a class="btn btn-danger" href="logout.php">Logout</a>
		</div>
	</div>
	</header>
	</body>		
</html>
<?php
$conn = mysqli_connect ("localhost","root","","healthcare");

if (isset($_GET['del'])){
	$del_id = $_GET['del'];
	$delete = "DELETE FROM bookappointment WHERE id='$del_id'";
	$run_delete = mysqli_query($connect,$delete);
		if ($run_delete === true){
			echo "<script>window.open('bookappointment_data.php','_self')</script>";
		}else {
			echo "Failed, try again.";
		}
}
?>
<script>
$(document).ready(function(){
$('#view_data').DataTable();
});
</script>