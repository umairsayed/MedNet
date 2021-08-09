<?php

session_start();
$user_id = $_SESSION['user_id']

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Diagnosis Form</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./assets/css/diagnosis.css">

</head>

<body>

	<form autocomplete="on" method="POST" enctype="multipart/form-data">
		<h1>Diagnosis Form</h1>
		<div class="wrapper">
			<ul>
				<div class="row1">
					<h2>Personal Details</h2>
					<li>
						<label for="name">Full Name</label>
						<input type="text" id="name" name="name" required>
					</li>

					<li>
						<label for="phone">Phone Number</label>
						<input type="tel" id="phone" name="phone" pattern="[0-9]{10}">
					</li>

					<li>
						<label for="email">Email ID</label>
						<input type="email" id="email" name="email">
					</li>


					<li>
						<label for="age">Age</label>
						<input type="number" id="age" name="age" min="0" required>
					</li>
				</div>

				<div class="row6">
					<li><label id="gender">Gender</label>
						<div class="wrapperrb">
							<input type="radio" name="gender" id="option-1" checked value="male">
							<input type="radio" name="gender" id="option-2" value="female">
							<label for="option-1" class="option option-1">
								<div class="dot"></div>
								<span>Male</span>
							</label>
							<label for="option-2" class="option option-2">
								<div class="dot"></div>
								<span>Female</span>
							</label>
						</div>
					</li>
				</div>

				<div class="row2 ">
					<h2>Common Type of illness</h2>
					<div class="checkbox">
						<li>
							<label for="fever">Fever</label>
							<input type="checkbox" name="illness[]" value="fever">
						</li>

						<li>
							<label for="cold">Cold</label>
							<input type="checkbox" name="illness[]" value="cold">
						</li>

						<li>
							<label for="cough">Cough</label>
							<input type="checkbox" name="illness[]" value="cough">
						</li>

						<li>
							<label for="allergies">Allergies</label>
							<input type="checkbox" name="illness[]" value="allergies">
						</li>

						<li>
							<label for="Diarrhea">Diarrhea</label>
							<input type="checkbox" name="illness[]" value="diarrhea">
						</li>

						<li>
							<label for="Stomach Ache">Stomach Ache</label>
							<input type="checkbox" name="illness[]" value="stomach ache">
						</li>

						<li>
							<label for="Head Ache">Head Ache</label>
							<input type="checkbox" name="illness[]" value="head ache">
						</li>

						<li>
							<label for="Nausea and Vomiting">Nausea and Vomiting</label>
							<input type="checkbox" name="illness[]" value="nausea and vomiting">
						</li>

						<li>
							<label for="Conjunctivitis">Conjunctivitis</label>
							<input type="checkbox" name="illness[]" value="conjunctivitis">
						</li>
					</div>

					<li>
						<label for="otherillness">Other illness</label>
						<input type="text" id="oitext" name="illness[]">
					</li>
				</div>

				<div class="row3">
					<h2>Current Physical Or Mental Status</h2>
					<li>
						<label for="Body Temperature">Body Temperature (F)</label>
						<input type="number" id="bt" name="Body_Temperature" min="56.7" max="115" step="0.1" value="98.6">
					</li>

					<li>
						<label for="Blood Sugar">Blood Sugar (mg/dL):</label>
						<label>Pre-Meal</label>
						<input type="number" id="bs1" name="Blood_Sugar[]" min="20" max="1000" step="1" value="100"><br>
						<label>After-Meal</label>
						<input type="number" id="bs2" name="Blood_Sugar[]" min="20" max="1000" step="1" value="140">
					</li>

					<li>
						<label for="Blood Pressure">Blood Pressure (mm Hg):</label>
						<label>Systolic</label>
						<input type="number" id="bp1" name="Blood_Pressure[]" min=10><br>
						<label>Diastolic</label>
						<input type="number" id="bp2" name="Blood_Pressure[]" min=10>
					</li>

					<li>
						<label for="Oxygen Level">Oxygen Level</label>
						<input type="number" id="ol" name="Oxygen_Level" min="50" max="110" step="1">
					</li>

					<li>
						<label for="Pulse Rate">Pulse Rate</label>
						<input type="number" id="pr" name="Pulse_Rate" min="50" max="110" step="1">
					</li>
				</div>

				<div class="row4">
					<li>
						<p class="file">
							<input type="file" name="files1" id="file" />
							<label name="button" for="file">Upload Medical Report</label>
						</p>
					</li>
				</div>


				<div class="row5">
					<li>
						<label for="Additional">Additional Information</label>
						<textarea id="addi" name="Additional"></textarea>
					</li>
				</div>

				<div class="buttons">
					<div class="submitrow ">
						<input class="btn " type="submit" value="Submit" name="submit">
					</div>
				</div>
			</ul>

		</div>
	</form>

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
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$illlist = json_encode($illness = $_POST['illness']);
	$BodyT = $_POST['Body_Temperature'];
	$Bp = json_encode($BloodP = $_POST['Blood_Pressure']);
	$Bs = json_encode($BloodS = $_POST['Blood_Sugar']);
	$oxyL = $_POST['Oxygen_Level'];
	$pulseR = $_POST['Pulse_Rate'];
	$additional = $_POST['Additional'];



	/*file*/
	$query = "INSERT INTO diagnosis (patient_id,patient_name,phone_no,patient_emailid,patient_age,patient_gender,illness_name,b_temp,b_press,b_sugar,oxy_lev,pulse_rate,additional) VALUES ($user_id,'$name','$phone','$email','$age','$gender',' $illlist', '$BodyT','$Bp',' $Bs','$oxyL','$pulseR','$additional')";
	if (mysqli_query($conn, $query)) {
	}



	$file_name = rand(1000, 10000) . "-" . $_FILES['files1']['name'];
	$file_temp = $_FILES["files1"]["tmp_name"];
	$upload_dir = 'D:\xampp\images';
	move_uploaded_file($file_temp, $upload_dir . '/' . $file_name);
	$sql = "INSERT into diagnosis(fi) VALUES('$file_name')";

	if (mysqli_query($conn, $sql)) {
		echo "file uploaded";
	} else {
		echo "Error";
	}
}
mysqli_close($conn);
?>