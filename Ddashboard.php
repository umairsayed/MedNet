<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="dash.css">
</head>

<body>
  <header>
    <div class="logo">MedNet</div>
  </header>
  <div class="nav-btn">Menu</div>
  <div class="container">

    <div class="sidebar">
      <nav>
        <a href="#">MedNet</a>
        <ul>
          <li class="active"><a href="#">Dashboard</a></li>
          <li><a href="contactus.html" target="_blank">Contact</a></li>
          <li><a href="index.php?logout='1'">Log Out</a></li>
        </ul>
      </nav>
    </div>

    <div class="main-content">
      <!-- <h1>Dashboard</h1>
      <p>Welcome to MedNet!</p> -->
      <h2>Appointment Details</h2>


      <table>
        <tr>
          <th>Patient Id</th>
          <th>Name</th>
          <th>Date of appointment</th>
          <th>Medication</th>
          <th>Medication Details</th>
          <th>Diagnosis Form</th>
        </tr>
        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <?php   // LOOP TILL END OF DATA
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mednet";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        $row = "";
        $sql = "SELECT patient_id,p_name,dates,medication,mdetails FROM appointment ORDER BY dates";
        $result = $conn->query($sql);
        while ($rows = $result->fetch_assoc()) {
          $patientid = $rows['patient_id'];
        ?>

          <tr>
            <!--FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN-->
            <td><?php echo $rows['patient_id']; ?></td>
            <td><?php echo $rows['p_name']; ?></td>
            <td><?php echo $rows['dates']; ?></td>
            <td><?php echo $rows['medication']; ?></td>
            <td><?php echo $rows['mdetails']; ?></td>
            <td><a href='Ddiagnosis.php?patient_id=<?php echo $patientid ?>' style='color:black; text-decoration:none;'>Click here</a></td>
          </tr>
        <?php
        }
        ?>
      </table>


      <script>
        $(document).ready(function() {
          $('.nav-btn').on('click', function(event) {
            event.preventDefault();
            /* Act on the event */
            $('.sidebar').slideToggle('fast');

            window.onresize = function() {
              if ($(window).width() >= 768) {
                $('.sidebar').show();
              } else {
                $('.sidebar').hide();
              }
            };
          });
        });
      </script>
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



?>