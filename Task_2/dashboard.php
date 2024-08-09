<?php
require 'auth_check.php'; // Ensure the user is authenticated
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
  <body class="g-sidenav-show bg-gray-100">
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
    <h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
    <a href="logout.php" style="font-weight:bold;font-size:20px;">Logout</a>
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
