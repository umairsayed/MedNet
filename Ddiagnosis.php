<?php

session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$patientid = $_GET['patient_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis Details</title>
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
                <a href="index.php">MedNet</a>
                <ul>
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="contactus.html" target="_blank">Contact</a></li>
                    <li><a href="index.php?logout='1'">Log Out</a></li>
                </ul>
            </nav>
        </div>

        <div class="main-content">
            <h2>Diagnosis Details</h2>


            <table border=1>
                <tr>
                    <th>Patient Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Illness</th>
                    <th>Sugar Level</th>
                    <th>Temperature</th>
                    <th>Blood Pressure</th>
                    <th>Oxygen Level</th>
                    <th>Pulse Rate</th>
                    <th>Additional</th>
                    <th>Phone Number</th>
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
                $sql = "SELECT patient_id,patient_name,patient_emailid,patient_age,patient_gender,illness_name,b_sugar,b_temp,b_press,oxy_lev,pulse_rate,fi,additional,phone_no FROM diagnosis WHERE patient_id=$patientid ORDER by sr_no desc";
                $result = $conn->query($sql);
                while ($rows = $result->fetch_assoc()) {

                ?>
                    <tr>
                        <!--FETCHING DATA FROM EACH
                  ROW OF EVERY COLUMN-->
                        <td><?php echo $rows['patient_id']; ?></td>
                        <td><?php echo $rows['patient_name']; ?></td>
                        <td><?php echo $rows['patient_emailid']; ?></td>
                        <td><?php echo $rows['patient_age']; ?></td>
                        <td><?php echo $rows['patient_gender']; ?></td>
                        <td><?php print_r($rows['illness_name']); ?></td>
                        <td><?php echo $rows['b_sugar']; ?></td>
                        <td><?php echo $rows['b_temp']; ?></td>
                        <td><?php print_r($rows['b_press']); ?></td>
                        <td><?php echo $rows['oxy_lev']; ?></td>
                        <td><?php echo $rows['pulse_rate']; ?></td>
                        <td><?php echo $rows['additional']; ?></td>
                        <td><?php echo $rows['phone_no']; ?></td>
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