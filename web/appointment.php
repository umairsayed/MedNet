<?php

session_start();
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>

<head>
	<title>MedNet Appointment Form </title>
	<!-- metatags-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="modern appointment form a Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--stylesheet-css-->
	<link href="//fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<!--online-fonts-->
	<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<!--online-fonts-->
	<!-- //css files -->
</head>

<body>
	<h1>App<span class="title">o</span>intment f<span class="title">o</span>rm</h1>
	<div class="w3l-main">
		<div class="w3l-from">
			<form action="#" method="post">
				<div class="w3l-user">
					<label class="head">name<span class="w3l-star"> * </span></label>
					<input type="text" name="Username" placeholder="patient name" required>
				</div>
				<div class="w3l-mail">
					<label class="head">mail<span class="w3l-star"> * </span></label>
					<input type="email" name="email" placeholder="enter your e-mail" required>
				</div>
				<div class="clear"></div>
				<div class="w3l-details1">
					<div class="w3l-num">
						<label class="head">phone number<span class="w3l-star"> * </span></label>
						<input type="text" name="phone" placeholder="Phone Number">
					</div>
					<div class="w3l-date">
						<label class="head">date of appointment<span class="w3l-star"> * </span></label>
						<div class="styled-input">
							<input class="date" name="dates" type="date" value="YYYY/MM/DD" min="2000-01-02" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'YYYY/MM/DD';}" required="">
						</div>
					</div>
					<div class="clear"></div>
					<div class="w3l-details3">
						<div class="w3l-options1">
							<select class="category1" required="" name="cat">
								<option value="">Specialization</option>
								<option value="Cardiology">Cardiology</option>
								<option value="Heart Surgery">Heart Surgery</option>
								<option value="Skin Care">Skin Care</option>
								<option value="Body Check-up">Body Check-up</option>
								<option value="Numerology">Numerology</option>
								<option value="Diagnosis">Diagnosis</option>
								<option value="">Others</option>
							</select>
						</div>
					</div>
					<div class="w3l-options2">
						<select class="category2" required="" name="hospital">
							<option value="">Choose Hospital</option>
							<option value="Hospital 1">Hospital 1</option>
							<option value="Hospital 2">Hospital 2</option>
							<option value="Hospital 3">Hospital 3</option>
							<option value="Hospital 4">Hospital 4</option>
							<option value="Hospital 5">Hospital 5</option>
						</select>
					</div>
					<div class="gender">
						<label class="head">gender<span class="w3l-star"> * </span></label>
						<select class="form-control" required name="gender">
							<option>gender</option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>
					<div class="w3l-sym">
						<label class="head">symptoms<span class="w3l-star"> * </span></label>
						<input type="text" name="details" required="">
					</div>
				</div>
				<div class="clear"></div>
				<div class="w3l-lef1">
					<label class="w3l-head2">Taking any medications currently?</label>
					<ul>
						<li>
							<input type="radio" value="yes" name="selector1">
							<label class="w3l-set">Yes</label>
						</li>
						<li>
							<input type="radio" value="no" name="selector1">
							<label class="w3l-set">No</label>
						</li>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="w3l-rem">
					<div class="w3l-right">
						<label class="w3l-set2">If yes,Please list it.</label>
						<textarea name="listing"></textarea>
					</div>
					<div class="btn">
						<input type="submit" name="submit" value="Book Appointment" />
					</div>
				</div>
				<div class="clear"></div>
			</form>
		</div>
	</div>
	<footer><br><br></footer>
	<!-- Default-JavaScript -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<!-- Calendar -->
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>
	<!-- //Calendar -->

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

	$Username = $_POST['Username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$dates = $_POST['dates'];
	$cat = $_POST['cat'];
	$hospital = $_POST['hospital'];
	$gender = $_POST['gender'];
	$details = $_POST['details'];
	$selector1 = $_POST['selector1'];
	$listing = $_POST['listing'];

	$query = "INSERT INTO appointment(patient_id,p_name,email,phone,dates,specialization,hospital,gender,details,medication,mdetails) VALUES ($user_id,'$Username','$email','$phone','$dates','$cat','$hospital','$gender','$details','$selector1','$listing')";
	if (mysqli_query($conn, $query)) {
		echo "<script>window.location.href='../payment/payment.html';</script>";
    }
}
mysqli_close($conn);
?>