<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['user_id'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: ./Login/login.php');
	die();
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after loggin out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user_id']);
	header("location: ./Login/login.php");
	die();
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>MedNet</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/all.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
</head>

<body>

	<!-- Header -->
	<header id="header">
		<div class="inner">
			<a href="index.php" class="logo">MedNet</a>
			<nav id="nav">
				<a href="index.php">Home</a>
				<a href="whyus.html">Why Us</a>


				<div class="dropdown">
					<div class="projects">
						<button id="userbt">
							<!--<i id="icon1" class="fas fa-user"></i>--><?php if (isset($_SESSION['user_id'])) echo $_SESSION['user_name']; ?></button>
						<ul>
							<li><a href="PDashboard.php">Dashboard</a></li>
							<li><a href="index.php?logout='1'">Log Out</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
		</div>
	</header>




	<!-- Banner -->
	<section id="banner">
		<h1>Welcome to MedNet</h1>
		<p>The best online website for medical diagnosis</p>
	</section>

	<!-- One -->
	<section id="one" class="wrapper">
		<div class="inner">
			<div class="flex flex-3">
				<article>
					<header>
						<h3>Patient Safety Advice</h3>
					</header>
					<p>Across our campuses, there's a new way of operating so we can protect staff and patients from the risk of COVID-19. See what it takes to create a safe place for care.</p>
					<footer>
						<a href="safety.html" class="button special">More</a>
					</footer>
				</article>
				<article>
					<header>
						<h3>COVID-19 Tracker</h3>
					</header>
					<p>Live statistics and coronavirus news tracking the number of confirmed cases, recovered patients, tests, and death toll due to the COVID-19</p>
					<footer>
						<a href="https://www.covid19india.org/" target="_blank" class="button special">More</a>
					</footer>
				</article>
				<article>
					<header>
						<h3>Contact Us</h3>
					</header>
					<p>If you would like to share a compliment or concern about your care at MedNet.<br>Feel free to contact us about your patient experience</p>
					<footer>
						<a href="contactus.html" target="_blank" class="button special">More</a>
					</footer>
				</article>
			</div>
		</div>
	</section>

	<!-- Two -->
	<section id="two" class="wrapper style1 special">
		<div class="inner">
			<header>
				<h2>Our Doctors</h2>
				<p>The best in the field</p>
			</header>
			<div class="flex flex-4">
				<div class="box person">
					<div class="image round">
						<img src="images/doctors/doc1.png" alt="Person 1" />
					</div>
					<h3>Dr Alex Morgan</h3>
					<p>Neurologist</p>
				</div>
				<div class="box person">
					<div class="image round">
						<img src="images/doctors/doc2.jpg" alt="Person 2" />
					</div>
					<h3>Dr George Smith</h3>
					<p>Dentist</p>
				</div>
				<div class="box person">
					<div class="image round">
						<img src="images/doctors/doc3.jpg" alt="Person 3" />
					</div>
					<h3>Dr Sebastian Luis</h3>
					<p>Radiologist</p>
				</div>
				<div class="box person">
					<div class="image round">
						<img src="images/doctors/doc4.png" alt="Person 4" />
					</div>
					<h3>Dr Rahul Krishnan</h3>
					<p>Dermatologist</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Three -->
	<section id="three" class="wrapper special">
		<div class="inner">
			<header class="align-center">
				<h2>Our Services</h2>
				<p>Exceptional Care Close to You</p>
			</header>
			<div class="flex flex-2">
				<article>
					<div class="image fit">
						<img src="images/diagnosis.jpg" alt="diagnosis" />
					</div>
					<header>
						<h3>Self Diagnosis</h3>
					</header>
					<p>Getting an accurate diagnosis can be one of the most impactful experiences that you can have — especially if you've been in search of that answer for a while. We can help you get there.</p>
					<footer>
						<a href="diagnosis.php" target="_blank" class="button special">More</a>
					</footer>
				</article>
				<article>
					<div class="image fit">
						<img src="images/appointment.jpg" alt="appointment" />
					</div>
					<header>
						<h3>Book an Appointment</h3>
					</header>
					<p>All appointments are prioritized on the basis of medical need, and the team members who will care for you or your family have the expertise and skills to provide the best care possible.</p>
					<footer>
						<a href="web/appointment.php" target="_blank" class="button special">More</a>
					</footer>
				</article>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer id="footer">
		<div class="inner">
			<div class="flex">
				<ul class="icons">
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
					<li><a href="#" class="icon fa-pinterest-p"><span class="label">Pinterest</span></a></li>
					<li><a href="#" class="icon fa-vimeo"><span class="label">Vimeo</span></a></li>
				</ul>
			</div>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>