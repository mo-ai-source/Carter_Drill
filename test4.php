<?php 
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

   $progress= $fetch['progress']+12;

   $query="UPDATE `user_workout` SET `progress`='$progress' WHERE `workoutid`='$id' and `user_id`= '$userid'";
   $run=mysqli_query($conn, $query);
   if($run){
    header('Refresh: 0; URL=test5.php?id='.$id);
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

    <!-- Always include this line of code!!! -->
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

    <script type="module"
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule=""
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

    <script defer
            src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>
    <script defer src="js/Quiz.js"></script>
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

            <img src="img/workouts/workout-1.jpg" alt="Image description">

            <?php
              include("TestProgressBar.php");

                ?>


            <a href="#" onclick="location.href='test1.php';">

                Welcome
            </a>
            <button class="dropdown-btn">
                Strength
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="#" onclick="location.href='test2.php';">

                    Strength 1: Introduction
                </a>
                <a href="#" onclick="location.href='test3.php';">Strength 1: Workout</a>
                <a href="#" onclick="location.href='test4.php';">Strength 1: Quiz</a>
            </div>
            <button class="dropdown-btn">
                Eccentric Focus
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="#" onclick="location.href='test5.php';">Strength 2: Introduction</a>
                <a href="#" onclick="location.href='test6.php';">Strength 2: Workout</a>
                <a href="#" onclick="location.href='test7.php';">Feedback with Openpose</a>
            </div>
            <a href="#" onclick="location.href='test8.php';">Whats Next?</a>
        </div>

        <div class="maininfo">



            <h1>Strength 1 : Quiz</h1>

           

            <div class="quiz-container" id="quiz">
                <div class="quiz-header">
                    <h2 id="question">Question Text</h2>
                    <ul>
                        <li>
                            <input type="radio" name="answer" id="a" class="answer">
                            <label for="a" id="a_text">Answer</label>
                        </li>
                        <li>
                            <input type="radio" name="answer" id="b" class="answer">
                            <label for="b" id="b_text">Answer</label>
                        </li>
                        <li>
                            <input type="radio" name="answer" id="c" class="answer">
                            <label for="c" id="c_text">Answer</label>
                        </li>
                        <li>
                            <input type="radio" name="answer" id="d" class="answer">
                            <label for="d" id="d_text">Answer</label>
                        </li>
                    </ul>
                </div>
                <button2 id="submit">Submit</button2>
            </div>

            <p></p>



            <hr />


            <form style="margin-left:auto;" action="#" method="post" >
          <input type="hidden" name="progress" value="12">
          <input  type="submit" name="conbtn" class="btn2" id="completed-button" value="continue">
        </form>
        </div>

    </main>

</body>
</html>