<!DOCTYPE html>
<html>
<head>
	<title>Display Details</title>
</head>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
		<table border="1" align="center" style="line-height: 100px" width="900px">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Profile Pic</th>
				</tr>
			</thead>
			
			<?php 
				require_once('connect.php');

				session_start();
			$email = $_SESSION['email'];
				
				$query = "SELECT * FROM registrationdetails WHERE Email='$email'";

				$query_run = mysqli_query($conn, $query);

				while($row = mysqli_fetch_array($query_run)){
					$UserId = $row["UserID"];
					?>
					<p class="session">Welcome <?php echo" $email"?></p>

					

				<tr>
						<td>
							<?php
							 echo $row['Name'];
							?>
						</td>
						<td>
							<?php echo '<img src="data:image;base64,'. base64_encode($row['ProfilePic']).'" alt="Image" style="width: 100px; height: 100px" >'; ?>
						</td>
					</tr>
				
				<p><a href="logout.php">Log Out</a></p>
				<p><a href="editpassword.php?GetID=<?echo $UserId ?>">Update Password</a></p>
 			<?php
}
 			?>



		</table>
	</form>
</body>
</html>

