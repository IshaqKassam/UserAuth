<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="sign_up_form">
	<h1>Register Here</h1>
	<hr><!-- this is to draw a line to separate
	  -->
	<form action="register.php" method="POST" enctype="multipart/form-data">

		<input type="text" id="fname" name="name" value="" required="required" placeholder="Enter your Full Name" class="Register">
		<br>

		<input type="text" id="email" name="email" value="" required="required" class="Register"placeholder="Enter Email Address">
		<br>

		<input type="text" name="city" name="city" placeholder="Enter City Of Residence" class="Register" required="required">
		<br>

		<input type="password" name="password" required="required" class="Register" placeholder="Enter your Password">
		<br>

		<label for="image">Upload Profile Pic</label><br>
		<input type="file" name="image" id="image">
		<br><br>

		<input id="btn1" type="submit" class="Register" name="Register" value="Register" >
		<hr>
		<p><a href="login.php">Log In</a></p>

		
	</form>
</div>
</body>
</html>


<?php 
require_once('connect.php');

if(isset($_POST['Register'])){

	$file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$name = $_POST['name'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	$pass = $_POST['password'];

// $SELECT = "SELECT Email from registrationdetails where Email = ? Limit 1";
	// $INSERT = "INSERT INTO registrationdetails (Name, Email, City, Password, ProfilePic) VALUES (?, ?, ?, ?, ?)";
	$INSERT = "INSERT INTO registrationdetails (UserID, Name, Email, City, Password, ProfilePic) VALUES ('', '$name', '$email', '$city', '$pass', '$file')";
	$query_run = mysqli_query($conn, $INSERT);

	if ($query_run) {
		header('location:login.php');
	}

	// $stmt = $conn->prepare($SELECT);
	// $stmt->bind_param("s", $email);
	// $stmt->execute();
	// $stmt->bind_result($email);
	// $stmt->store_result();
	// $rnum = $stmt->num_rows;

	// if($rnum == 0){
	// 	$stmt->close();

	// 	$stmt = $conn->prepare($INSERT);
	// 	$stmt->bind_param("sssss", $name, $email, $city, $pass, $file);
	// 	$stmt->execute();
	// 	header('location:login.php');
	// 	// echo "New Record Inserted Successfully";
	// }
	// else{
	// 	echo "Someone already registered using this email";
	// }

	// $stmt->close();
	// $conn->close();


}
// 	$query = "INSERT INTO registrationdetails (UserID, Name, Email, City, Password, ProfilePic) VALUES ('', $name, $email, $city, $pass, $file)";

// 	$query_run = mysqli_query($conn, $query);

// 	if ($query_run) {
// 		echo '<script type="text/javascript"> alert("Image Profile uploaded") </script>';
// 	}
// 	else{
// 		 echo (mysqli_error($conn));
// 		 echo '<script type="text/javascript"> alert("Image Profile  Not uploaded") </script>';
// 	}
// }


 ?>