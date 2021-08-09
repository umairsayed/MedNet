<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="login.css" />
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <title>Sign in/Sign up</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="login.php" method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" required name="p_name" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" required name="p_password" />
            <span> <?php if ($error != "") {
                      echo ($error);
                    } ?> </span>
          </div>
          <input type="submit" value="Login" class="btn solid" name="logsubmit" />
          <p class="social-text"><a id="doclogin" href="../doclogin/doclogin.php">Sign in as a Doctor</a></p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="login.php" method="POST" name="signup-form" class="sign-up-form">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" required name="p_name" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" required name="p_email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" required name="p_password" />
          </div>
          <input type="submit" class="btn" value="Sign up" name="submit" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            We are commited to your health
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Making health care better together
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="login.js"></script>
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
  $name = $_POST['p_name'];
  $password = $_POST['p_password'];
  $email = $_POST['p_email'];

  $query = "INSERT INTO patient(patient_name,patient_password,patient_emailid) VALUES ('$name','$password','$email')";
  if (mysqli_query($conn, $query)) {
  }
}

if (isset($_POST["logsubmit"])) {
  $name = $_POST['p_name'];
  $password = $_POST['p_password'];
  $rs = mysqli_query($conn, "SELECT * from patient where patient_name='$name' and patient_password='$password'");
  $row = mysqli_fetch_assoc($rs);
  if (mysqli_num_rows($rs) < 1) {
    $found = "N";
    $error = "Incorrect password";
  } else {
    $_SESSION["user_id"] = $row['patient_id'];
    $_SESSION["user_name"] = $row['patient_name'];
    // header('Location: ../index.php');
    $error = "";
  }
}


mysqli_close($conn);

?>