<?php
include('conn.php');
include('./check-login.php');
session_start();
@$userid = $_SESSION['id'];
@$user_email = $_SESSION['email'];
@$user_name = $_SESSION['username'];
@$userdata = check_login($conn);

$currentTime = time();
if ($currentTime > $_SESSION['expire']) {
  header('Refresh: 0; URL=login.php');
  session_unset();
  session_destroy();
}

$checkwork="SELECT * from `user_workout` WHERE `user_id` = '$userid'	";
$runf=mysqli_query($conn,$checkwork);
$getdata=mysqli_fetch_array($runf);
if(empty($getdata) ){
  header('Refresh: 0; URL=workout.php');

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description"
    content="Welcome to The Carter Drill, the ultimate destination for basketball workout programs and training!" />

  <!-- Always include this line of code!!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" href="img/favicon.png" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/queries.css" />
  <link rel="stylesheet" href="./css/userdashboard.css" />
  <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


  <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

  <script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>
  <script defer src="js/script.js"></script>

  <title> The Carter Drill</title>
  <style>
         #progress-bar {
      width: 220px;
      height: 10px;
      background-color: #ddd;
      border-radius: 5px;
      margin-bottom: 10px;
      margin-left: auto;
      margin-right: auto;
    }

    #progress {
      width: 0%;
      height: 10px;
      background-color: black;
      border-radius: 5px;
    }

        button {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
  <header class="header">
    <a href="#">
      <img class="logo" alt="Carterdrill logo" src="img/carterdrill-logo.png" />
    </a>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a href="#" onclick="location.href='home.php';" class="main-nav-link">Home</a></li>
        <li><a href="#" onclick="location.href='workout.php';" class="main-nav-link">Workout</a></li>
        <li><a  href="#" onclick="location.href='forum/index.php';" class="main-nav-link">Forum</a></li>
        <li><a  href="#" onclick="location.href='game.php';" class="main-nav-link">Game</a></li>
        <li><a href="#" onclick="location.href='logout.php';" class="main-nav-link">Logout</a></li>
        
      </ul>
    </nav>

    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
  </header>
  <!-- dashboard cards -->
  <div class="container-lg mt-5">
    <div class="d-flex justify-content-center align-items-center">
      <p class="dashboard-heading">Overview Your Progress</p>
    </div>
    <div class="d-flex justify-content-center mt-3 flex-wrap">

      <div class="card me-3 d-flex flex-column justify-content-between">
        <div class="card-body">
          <div class="text-center icons"><i class="dashicon bi bi-book"></i></div>
          <h3 class="card-title text-center mb-0">Current courses</h3>
          <?php
          $qquery = "SELECT * FROM user_workout where user_id = '$userid' and `status`= 'pending'";
          $ruun = mysqli_query($conn, $qquery);
          while ($fet = mysqli_fetch_Array($ruun)) {

            ?>
            <li style="font-size:17px; list-style:none; margin-top:10px;">
              <?php echo $fet['workout_name'] ?>
          </li>
            <?php

          }

          ?>

          <p class="card-text  mb-5 ">
          <?php
            include("TestProgressBar.php");

            ?>
          <?php
          $myquery = "SELECT * FROM user_workout where user_id = '$userid' and `status`= 'complete'";
          $run = mysqli_query($conn, $myquery);
          while ($fet = mysqli_fetch_Array($run)) {

            ?>
            <li style="font-size:17px; list-style:none; margin-top:10px;">
              <?php echo $fet['workout_name'] ?>
            </li>
            <div id="progress-bar" style="width: 100%; height: 10px; background-color: #ddd;border-radius:10px; ">
              <div id="progress-bar-fill" style="height: 10px; background-color: #ffA500;border-radius:10px;
                background-image: radial-gradient(#ffA500, #f00); width: 100%;"></div>
            </div>
            <?php

          }

          ?>

          </p>

        </div>
        <a href="#" class="card-link d-flex justify-content-center">View More</a>
      </div>
      <div class="card me-3 d-flex flex-column justify-content-between">
        <div class="card-body">
          <div class="text-center icons"><i class="dashicon bi bi-bar-chart"></i></div>
          <h3 class="card-title text-center mb-5">performance metrics</h3>
          <p class="card-text text-start">

          <h6>

          </h6>
          <div id="piechart" class="piechart"></div>

          </p>

        </div>
        <a href="#" class="card-link d-flex justify-content-center">View More</a>
      </div>
      <div class="card d-flex flex-column justify-content-between">
      <div class="card-body">
          <div class="text-center icons"><i class="dashicon bi bi-journals"></i></div>
          <h3 class="card-title text-center">upcoming lessons</h3>
          <p class="card-text  mb-5 pt-4">
            <?php
            $array = array();
            $query = "SELECT * FROM user_workout where user_id = '$userid'";
            $runn = mysqli_query($conn, $query);

            while ($fetch = mysqli_fetch_array($runn)) {
              array_push($array, $fetch['workoutid']);
            }

            foreach ($array as $singleId) {
              $singleId = (string) $singleId;
            }

            $next = "SELECT * FROM workout WHERE id NOT IN(" . implode(',', $array) . ")";
            $nextrun = mysqli_query($conn, $next);

            while ($nextdata = mysqli_fetch_array($nextrun)) {
              ?>
              <li style="font-size:17px;">
                <?php echo $nextdata['workout_name'] ?>
              </li>
              <?php
            }
            ?>

          </p>
        </div>
        <a href="#" class="card-link d-flex justify-content-center">View More</a>
      </div>

    </div>
  </div>







  <!-- dashboard cards end -->





  <footer class="footer mt-5  ">
    <div class="container grid grid--footer">
      <div class="logo-col">
        <a href="#" class="footer-logo">
          <img class="logo" alt="Carter-drill-logo" src="img/carterdrill-logo.png" />
        </a>

        <ul class="social-links">
          <li>
            <a class="footer-link" href="#"><ion-icon class="social-icon" name="logo-instagram"></ion-icon></a>
          </li>
          <li>
            <a class="footer-link" href="#"><ion-icon class="social-icon" name="logo-facebook"></ion-icon></a>
          </li>
          <li>
            <a class="footer-link" href="#"><ion-icon class="social-icon" name="logo-twitter"></ion-icon></a>
          </li>
        </ul>

        <p class="copyright">
          Copyright &copy; <span class="year">2027</span> by The Carter Drill, Inc.
          All rights reserved.
        </p>
      </div>

      <div class="address-col">
        <p class="footer-heading">Contact us</p>
        <address class="contacts">
          <p class="address">
            290 Reading Road, Yusuf Drive, 15677
          </p>
          <p>
            <a class="footer-link" href="tel:290-156-770">290-156-770</a><br />
            <a class="footer-link" href="hello@carterdrill.com">hello@carterdrill.com</a>
          </p>
        </address>
      </div>

      <nav class="nav-col">
        <p class="footer-heading">Account</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Create account</a></li>
          <li><a class="footer-link" href="#">Sign in</a></li>

        </ul>
      </nav>

      <nav class="nav-col">
        <p class="footer-heading">Company</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">About Carter Drill</a></li>
          <li><a class="footer-link" href="#">For Business</a></li>
          <li><a class="footer-link" href="#">Careers</a></li>
        </ul>
      </nav>

      <nav class="nav-col">
        <p class="footer-heading">Resources</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Help center</a></li>
          <li><a class="footer-link" href="#">Privacy & terms</a></li>
        </ul>
      </nav>
    </div>
  </footer>


  <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"> </script>
  <script src="./assets/vendors/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript">
    // Load google charts
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 8],
        ['Eat', 5],
        ['Sleep', 8]
      ]);

      // Optional; add a title and set the width and height of the chart
      var options = { 'width': 250, 'height': 250 };

      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>

  <script>

    $(document).ready(function () {
      $('input[type="checkbox"]').change(function () {
        var checkedCount = $('input[type="checkbox"]:checked').length;
        var progressBarFillWidth = checkedCount * 20 + '%';
        $('#progress-bar-fill').animate({ width: progressBarFillWidth }, 500);
        $.ajax({
          type: "POST",
          url: "update-progress.php",
          data: { progress: checkedCount * 20 },
          success: function (response) {
            console.log(response);
          },
          error: function (xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
    });

  </script>
</body>

</html>