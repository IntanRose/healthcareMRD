<?php
session_start();
$conn = mysqli_connect ('localhost','root','','healthcare');
$query ="SELECT * FROM patientinfo ORDER BY ID DESC";
$result = mysqli_query($conn, $query);

	echo "<script>window.open('login.php','_self');</script>";
	
	session_destroy();
?>