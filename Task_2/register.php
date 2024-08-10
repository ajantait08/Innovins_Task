<?php
session_start();
require 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $_SESSION['errors'] = [];

    if (empty($_POST["username"])) {
      $_SESSION['errors'][] = "Username is required.";
    } elseif (!preg_match('/^[a-zA-Z0-9 ]*$/', $_POST["username"])) {
      $_SESSION['errors'][] = "Username must contain only alphanumeric characters with spaces.";
    }

    if (empty($_POST["email"])) {
      $_SESSION['errors'][] = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $_SESSION['errors'][] = "Invalid email format.";
    }

    if (empty($_POST["password"])) {
      $_SESSION['errors'][] = "Password is required.";
    } elseif (strlen($_POST["password"]) < 8) {
      $_SESSION['errors'][] = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/^[a-zA-Z0-9!@]+$/', $_POST["password"])) {
      $_SESSION['errors'][] = "Password must contain only alphanumeric characters and !@ as special characters.";
    }

    if (empty($_SESSION['errors'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing password
    // Insert user into database
    if($conn->query("INSERT INTO users_task2 (username, email, password) VALUES ('$username', '$email', '$password')")){
        $_SESSION['message'] = 'User Registration successful!';
    } else {
        $_SESSION['errors'][] = 'Registration failed!';
    }
    }
    else {
      foreach ($_SESSION['errors'] as $error) {
        echo "<p style='color:red;'>$error</p>";
      }
    }
    header('Location: register.php');
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../Task_2/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../Task_2/assets/img/favicon.png">
  <title>
    Material Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../Task_2/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../Task_2/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="../Task_2/assets/css/register-form.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../Task_2/assets/css/material-dashboard.css" rel="stylesheet" />
  <script>
    function validateForm() {
      const username = document.forms["myForm"]["username"].value;
      const email = document.forms["myForm"]["email"].value;
      const password = document.forms["myForm"]["password"].value;

      if (username === "") {
        alert("Username must be filled out");
        return false;
      }
      else{
        const alphanumericPattern = /^[a-zA-Z0-9 ]*$/;
        if (!alphanumericPattern.test(username)) {
          alert("Username must contain only alphanumeric characters with spaces");
          return false;
        }
      }

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email === "" || !emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
      }

      // Password validation
      if (password === "") {
        alert("Password must be filled out");
        return false;
      }
      if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
      }
      const passwordPattern = /^[a-zA-Z0-9!@]+$/;
      if (!passwordPattern.test(password)) {
        alert("Password must contain only alphanumeric characters and !@ as special characters");
        return false;
      }

      return true;
    }
  </script>
</head>
<body class="g-sidenav-show bg-gray-100">
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
            <?php if (isset($_SESSION['message'])): ?>
               <div class="alert alert-success text-white" role="alert">
                <strong>Success!</strong>
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
                </div>
            <?php endif; ?>
            <h2 class="text-uppercase text-center mb-2"><u>Register</u></h2>
            <?php if(!empty($_SESSION['errors'])) { ?>
                <ul class="mb-5" style="list-style: none;background-color: #ac3030;color:white;padding: 5px 5px 5px 14px;font-weight: 600;font-size: 12px;border-radius: 6px;">
                <span>SOMETHING WENT WRONG !!</span>
                <?php $i = 1; foreach ($_SESSION['errors'] as $value) { ?>

                        <li><?php echo $i.".".$value; ?></li>
                      <?php $i++; } ?>
                      </ul>
            <?php } ?>
              <form name="myForm" action="" onsubmit="return validateForm()" method="post">
              <div class="input-group input-group-outline my-3">
              <label class="form-label" style="font-weight:bold">Username</label>
              <input type="text" name="username" autocomplete="off" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label" style="font-weight:bold">Email</label>
              <input type="text" name="email" autocomplete="off" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label" style="font-weight:bold">Password</label>
              <input type="password" name="password" autocomplete="off" class="form-control">
            </div>
            <div>

              <ul class="gradient-custom-4" style="list-style: none;color:black;padding: 5px 5px 5px 14px;font-weight: 600;font-size: 12px;border-radius: 6px;">
                <span>NOTE ::</span>
                <li>1. The length of the password must be at least 8 characters.</li>
                <li>2. The password can contain only ! and @ as special characters.</li>
                <li>3. The password must be alphanumeric.</li>
              </ul>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Submit</button>
              </form>

              <p class="text-center text-muted mt-5 mb-0" style="font-weight:bold">Have already an account? <a href="index.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!--   Core JS Files   -->

  <script src="../Task_2/assets/js/core/popper.min.js"></script>
  <script src="../Task_2/assets/js/core/bootstrap.min.js"></script>

  <!-- Plugin for the charts, full documentation here: https://www.chartjs.org/ -->
  <script src="../Task_2/assets/js/plugins/chartjs.min.js"></script>
  <script src="../Task_2/assets/js/plugins/Chart.extension.js"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Task_2/assets/js/material-dashboard.min.js"></script>
</body>

</html>
