<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href= "style3.css" rel= "stylesheet" type= "text/css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>HEALTHCARE | SALAM Medical Record</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="submit" name="login-btn" class="btn btn-primary btn-block" value="Login"/>
        </div>       
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
	<p class="text-center"><a href="index.html">Home</a></p>
	
	<img src="images/log.png">

<?php 
$conn = mysqli_connect ('localhost','root','','healthcare');


	if(isset($_POST['login-btn'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

$select = "SELECT * FROM user WHERE user_email='$email'";
$run = mysqli_query ($conn,$select);
$row_user = mysqli_fetch_array($run);

	$db_email = $row_user['user_email'];
	$db_password = $row_user['user_password'];
if($email == $db_email && $password == $db_password) {
	echo "<script>window.open('patientinfo_data.php','_self');</script>";
	$_SESSION['email'] = $db_email;
		
}else{
	echo "Email or Password is Wrong!";
}
	
	
	}

?>
	
</div>
</body>
</html>