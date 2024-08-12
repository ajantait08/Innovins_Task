<?php
session_start();
require 'db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['errors']['forget_password'] = [];
    if (empty($_POST["email"])) {
      $_SESSION['errors']['forget_password'][] = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $_SESSION['errors']['forget_password'][] = "Invalid email format.";
    }
    if (empty($_SESSION['errors']['forget_password'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM users_task2 WHERE email = '$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    $username = $user['username'];
    $email = $user['email'];
    $id = $user['id'];

    if ($user) {
        $reset_token = '1111';
        $reset_token_expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $token_validity = "1 Hour";

        if($stmt = $conn->query("UPDATE users_task2 SET reset_token = '$reset_token', reset_token_expiry = '$reset_token_expiry' WHERE id = '$id'")) {

        $mailContent = "
            <html>
            <head>
                <style>
                    .email-container {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        color: #333333;
                    }
                    .otp {
                        font-size: 1.5em;
                        font-weight: bold;
                        color: #000000;
                    }
                    .footer {
                        margin-top: 20px;
                        font-size: 0.9em;
                        color: #777777;
                    }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <p>Dear {$username},</p>
                    <p>We received a request to reset your password for your account associated with this email address.</p>
                    <p>To reset your password, please use the following One-Time Password (OTP):</p>
                    <p class='otp'>OTP: {$reset_token}</p>
                    <p>This OTP is valid for the next <strong>{$token_validity}</strong>. If you did not request a password reset, please ignore this email or contact our support team immediately.</p>
                    <p>To reset your password, enter the OTP on the reset page , please <a href=http://localhost/Innovins/Task_2/reset_password.php>CLICK HERE !!</a> to access the reset page and follow the instructions.</p>
                    <p>Thank you</p>
                    <hr>
                    <p class='footer'>Note: For security reasons, please do not share this OTP with anyone.</p>
                </div>
            </body>
            </html>
            ";

            $to = $email;
            $subject = "OTP to reset Password";
            $message = $mailContent;
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: ajanta.au@iitism.ac.in". "\r\n";


            // Send email
            if(!mail($to,$subject,$message,$headers)) {
              $_SESSION['errors']['forget_password'][] =  'Message could not be sent.';
            } else {
              $_SESSION['message'] = 'OTP to reset your password has been to your email!';
            }
          }
          else {
          $_SESSION['errors']['forget_password'][] = 'Sorry some error occured while saving the data!';
          }
        } else {
            $_SESSION['errors']['forget_password'][] = 'Email not found!';
        }
    }
    else {
      foreach ($_SESSION['errors']['forget_password'] as $error) {
        echo "<p style='color:red;'>$error</p>";
      }
    }
    header('Location: forget_password.php');
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
      const email = document.forms["myForm"]["email"].value;
      const password = document.forms["myForm"]["password"].value;


      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email === "" || !emailPattern.test(email)) {
        alert("Please enter a valid email address");
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
            <h2 class="text-center mb-2"><u>FORGET PASSWORD</u></h2>
            <?php if(!empty($_SESSION['errors']['forget_password'])) { ?>
                <ul class="mb-5" style="list-style: none;background-color: #ac3030;color:white;padding: 5px 5px 5px 14px;font-weight: 600;font-size: 12px;border-radius: 6px;">
                <span>SOMETHING WENT WRONG !!</span>
                <?php $i = 1; foreach ($_SESSION['errors']['forget_password'] as $value) { ?>

                        <li><?php echo $i.".".$value; ?></li>
                      <?php $i++; } ?>
                      </ul>
            <?php } ?>
            <form name="myForm" action="" onsubmit="return validateForm()" method="post">

            <div class="input-group input-group-outline my-3">
              <label class="form-label" style="font-weight:bold">Email</label>
              <input type="text" name="email" autocomplete="off" class="form-control">
            </div>

            <div class="gradient-custom-4" style="list-style: none;color:black;padding: 5px 5px 5px 14px;font-weight: 600;font-size: 12px;border-radius: 6px;">
                <span>NOTE ::</span>
                <span>Please provide the email address to reset the password.</span>
                </div>
                <br>
            <button class="btn btn-primary" type="submit">Submit</button>
              </form>

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
