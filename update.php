<?php
require_once('connect.php');

if (isset($_POST['update'])) {
	$pass = $_POST['newpassword'];
	$Userid = $_GET['ID'];

	$query = "UPDATE registrationdetails SET Password = '".$pass."' WHERE UserID = '".$Userid."'";

	$result = mysqli_query($conn, $query);

	if($result){
		header("location:display.php");
	}
}

?>