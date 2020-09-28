<?php 
require_once('connect.php');
if (isset($_POST['login'])) {
	$name = $_POST['name'];
	$pic = $_POST['image'];
	$emailaddress = $_POST['email'];
	$pass = $_POST['password'];

	if ($conn->connect_error) {
		die('Connection Failed: '.connect_error);
	}
	else{
		 $stmt = "SELECT * FROM registrationdetails WHERE Email='$emailaddress' AND Password='$pass'";
		// $stmt = "SELECT * FROM registrationdetails";
		$result = mysqli_query($conn, $stmt);

		$row = mysqli_fetch_array($result);
		if ($row['Email'] == $emailaddress && $row['Password'] == $pass) {
			
			setcookie('name', $name, time()+60*60+7);
        session_start();
        $_SESSION['email'] =$emailaddress;
        session_start();
        $_SESSION['name'] = $name;
        session_start();
        $_SESSION['pic'] = $pic;
        header("location: display.php");
		}


		else{
			echo "You have entered an Incorrect Password";
			$conn -> close();
			header("Location: http:login.php");
		}
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="sign_up_form">
	<h1>Login Here</h1>
	<hr><!-- this is to draw a line to separate
	  -->
	<form action="login.php" method="POST">

		<input type="text" id="email" name="email" value="" required="required" class="Register"placeholder="Enter Email Address" autocomplete="off">
		<br>

		<input type="password" name="password" required="required" class="Register" placeholder="Enter your Password" autocomplete="off">
		<br>

		<input id="btn1" type="submit" class="Register" name="login" value="Login" >
		<hr>
		<p><a href="register.php">Register</a></p>
		
	</form>
</div>
</body>
</html>

