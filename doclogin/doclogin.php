<?php

session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Doctor Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/ab.svg">
		</div>
		<div class="login-content">
			<form method="POST">
				<img src="img/doctor.svg">
				<h2 class="title">Welcome</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Username</h5>
						<input type="text" class="input" name="name">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="password">
					</div>
				</div>
				<a href="#">Forgot Password?</a>
				<input type="submit" class="btn" value="Login" name="submit">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mednet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}




if (isset($_POST["submit"])) {
	$name = $_POST['name'];
	$password = $_POST['password'];
	$rs = mysqli_query($conn, "SELECT * from doctor where doctor_name='$name' and doctor_password='$password'");
	$row = mysqli_fetch_assoc($rs);
	if (mysqli_num_rows($rs) < 1) {
		$found = "N";
	} else {
		$_SESSION["user_id"] = $row['doctor_id'];
		$_SESSION["user_name"] = $row['doctor_name'];
		header('Location: ../Ddashboard.php');
	}
}


mysqli_close($conn);

?>