﻿<?php 
include("./conn.php");
@session_start();
@$userid = $_SESSION['id'];
@$user_email = $_SESSION['email'];
@$user_name = $_SESSION['username'];
include('./check-login.php');
@$userdata = check_login($conn);

$currentTime = time();
if ($currentTime > $_SESSION['expire']) {
  header('Refresh: 0; URL=login.php');
  session_unset();
  session_destroy();
}

$id= $_GET['id'];
if(isset($_POST['conbtn'])){
  $getprogress="SELECT * FROM `user_workout` WHERE `user_id`= '$userid' and `status`='pending'";
  $rungetprogress=mysqli_query($conn,$getprogress);
  $fetch=mysqli_fetch_array($rungetprogress);

   $progress= $fetch['progress']+20;

   $query="UPDATE `user_workout` SET `progress`='$progress' WHERE `workoutid`='$id' and `user_id`= '$userid'";
   $run=mysqli_query($conn, $query);
   if($run){
    header('Refresh: 0; URL=firstshooting5.php?id=' . $id);
   }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
          content="Welcome to The Carter Drill, the ultimate destination for basketball workout programs and training!" />

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="img/favicon.png" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="manifest" href="manifest.webmanifest" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
          rel="stylesheet" />

    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/queries.css" />
    <link rel="stylesheet" href="css/workout.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils@0.1/control_utils.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="demo.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils@0.1/camera_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils@0.1/control_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils@0.2/drawing_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/pose@0.2/pose.js" crossorigin="anonymous"></script>


    <script type="module"
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule=""
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

    <script defer
            src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>
    <script defer src="js/script.js"></script>




    <title> The Carter Drill</title>

    <style>
    #progress-bar {
      width: 250px;
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

    <header class="header2">
        <a href="#" onclick="location.href='workout.php';">
            <img class="logo" alt="Carterdrill logo" src="img/carterdrill-logo.png" />
        </a>

        <nav class="main-nav">
            <ul class="main-nav-list">

            <?php

                if(isset($_SESSION['email'])){

                ?>
                <li><a class='main-nav-link' href='#' onclick="location.href='userdashboard.php';"> <?php echo $_SESSION['username'] ?> </a></li>

                <?php 
                }

                ?>


            </ul>
        </nav>



    </header>
    <main>

        <div class="sidenav">

            <img src="img/workouts/workout-4.jpg" alt="Image description">

            <?php
              include("TestProgressBar.php");

                ?>


            <a href="#" onclick="location.href='firstshooting1.php';">

                Welcome
            </a>
            <button class="dropdown-btn">
                Shooting 1
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="#" onclick="location.href='firstshooting2.php';">

                    Shooting 1: Introduction
                </a>
                <a href="#" onclick="location.href='firstshooting3.php';">Shooting 1: Workout</a>
                <a href="#" onclick="location.href='firstshooting4.php';">Shooting 1: Shooting Form</a>
            </div>

            <a href="#" onclick="location.href='firstshooting5.php';">Whats Next?</a>
        </div>

        <div class="maininfo">




            <h1> Shooting Form Detection</h1>

           
            <!-- CONTENTS -->
            <div class="container" style="margin-top: 20px;">

                <div class="columns">

                    <!-- WEBCAM INPUT -->
                    <div class="column">
                        <article class="panel is-info">
                            <p class="panel-heading">
                                Webcam Input
                            </p>
                            <div class="panel-block">
                                <video class="input_video5"></video>
                            </div>
                            <div class="panel-block">
                                <div id="shootingFormStatus" style="font-size: 24px;"></div>
                            </div>
                        </article>
                    </div>

                    <!-- MEDIAPIPE OUTPUT -->
                    <div class="column">
                        <article class="panel is-info">
                            <p class="panel-heading">
                                Form Detection
                            </p>
                            <div class="panel-block">
                                <canvas class="output5" width="300px" height="300px"></canvas>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="loading">
                    <div class="spinner"></div>
                </div>
                <div style="visibility: hidden;" class="control5">
                </div>
                <script type="text/javascript" src="js/shootingform.js"></script>

            </div>
                <hr />


                <form style="margin-left:auto;" action="#" method="post">
                <input type="hidden" name="progress" value="20">
                <input type="submit" name="conbtn" class="btn2" id="completed-button" value="continue">
            </form>
        </div>
</main>

</body>
</html>