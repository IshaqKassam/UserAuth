<?php 

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "iapgithub";

$conn = mysqli_connect($serverName, $username, $password, $dbName);

if (mysqli_connect_error()) {
	die('connect Error('.
		mysqli_connect_errno().')'.
		mysqli_connect_error());

}
 ?>