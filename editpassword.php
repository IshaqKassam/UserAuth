<?php  
require_once('connect.php');

$UserId = $_GET['GetID'];
$query = "SELECT * FROM registrationdetails WHERE UserID = '".$UserId."'";
$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		$User_ID = $row["UserID"];
		$password = $row["Password"];
	}

		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Updating the Password</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="sign_up_form">
	<h1>Change Password</h1>
	<hr><!-- this is to draw a line to separate
	  -->

	<form action="update.php?ID=<?php echo $User_ID?>" method="POST">

		
		<input type="password" name="newpassword" required="required" class="Register" placeholder="New Password" autocomplete="off">
		<br>

		<input id="btn1" type="submit" class="Register" name="update" value="Update" >
		<hr>
		<p><a href="register.php">Register</a></p>
		
	</form>
</div>
</body>
</html>