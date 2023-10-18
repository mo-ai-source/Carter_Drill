<?php 

include("./conn.php");
include('./check-login.php');
 session_start();
 $userid = $_SESSION['id'];
 $user_email= $_SESSION['email'];
 $user_name =$_SESSION['username']; 
 $userdata= check_login($conn);

 $currentTime = time();
if($currentTime> $_SESSION['expire']){
 
 header('Refresh: 0; URL=login.php');
 session_unset();
 session_destroy();
}


// session_start();
$id= $_GET['id'];
$userid = $_SESSION['id'];
$user_email= $_SESSION['email'];
$user_name =$_SESSION['username']; 
                

if(isset($_POST['enroll'])){


 $email= $_POST['email'];
 $username= $_POST['username'];
 $usersid= $_POST['usersid'];
 $workoutname = $_POST['workoutname'];
 $workoutid = $_POST['workoutid'];
 $progress= 0;
 $status= $_POST['status'];

 $workoutcheck = "SELECT * FROM `user_workout` WHERE `user_email`='$email' and `status` ='complete' and `workoutid` = '$id'";
 $userr = mysqli_query($conn,$workoutcheck );
 $getd= mysqli_num_rows($userr); 
 if ($getd > 0) {
  echo "<script>alert('You are already done with this course.')</script>";
  header('Refresh: 0; URL= workout.php');
  mysqli_close($conn);
 }
 else{
 


 $usercheck = "SELECT * FROM `user_workout` WHERE `user_email`='$email' and `status` ='pending'";
 $useresult = mysqli_query($conn,$usercheck );
 $getrow= mysqli_num_rows($useresult); 
 if ($getrow > 0) {
     echo "<script>alert('You are already enrolled  in another course.')</script>";
     header('Refresh: 0; URL=userdashboard.php');
     mysqli_close($conn);
   }
  else{
    $query= "INSERT INTO `user_workout`(`user_id`, `username`, `user_email`, `workout_name`,`status`,`workoutid`,`progress`) VALUES ('$usersid','$username','$email','$workoutname','$status','$workoutid','$progress')";
    $runn= mysqli_query($conn, $query);
    if($runn>0){
      if($id==4){
        header('Refresh: 0; URL=firstshooting1.php?id='.$id);
      }
      else{
        header('Refresh: 0; URL=test1.php?id='.$id);
      }
      
      // echo "everthing is good";
    }
    else{
      echo "something went wrong";
    }
  } 
 
}

}

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Welcome to The Carter Drill, the ultimate destination for basketball workout programs and training!"
    />

    <!-- Always include this line of code!!! -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="img/favicon.png" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="manifest" href="manifest.webmanifest" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/queries.css" />
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <script
      type="module"
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule=""
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"
    ></script>

    <script
      defer
      src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"
    ></script>
    <script defer src="js/script.js"></script>

    <title> The Carter Drill</title>
  </head>
  <body>
    <header class="header">
      <a href="#">
        <img class="logo" alt="Carterdrill logo" src="img/carterdrill-logo.png" />
      </a>

      <nav class="main-nav">
        <ul class="main-nav-list">
          <li><a href="home.php" class="main-nav-link">Home</a></li>
          <li><a href="#" onclick="location.href='workout.html';" class="main-nav-link">Workout</a></li>
          <li><a  href="#" onclick="location.href='forum/index.php';" class="main-nav-link">Forum</a></li>
          <li><a class="main-nav-link" href="#pricing">Game</a></li>
          <?php

            if(isset($_SESSION['email'])){

            ?>
            <li><a class='main-nav-link' href='#' onclick="location.href='userdashboard.php';"> <?php echo $_SESSION['username'] ?> </a></li>
            
            <?php 
            }
            else{
              ?> 
              <a class='main-nav-link' href='#' onclick="location.href='login.php';"> Login </a>
              <?php 
            }



            ?>
          <li><a class="main-nav-link nav-cta" href="#cta">Try for free</a></li>
        </ul>
      </nav>

      <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
      </button>
    </header>


    <!-- signup form -->
    <div class="d-flex justify-content-center">
      <h1 class="signupheading">
         Enroll Yourself Now!
      </h1>
    </div>
    <div class="d-flex justify-content-center">
         <div>Enter details to enroll yourself. Don't miss the oppertunity </div>
    </div>
    <div class="signup d-flex justify-content-center">
    <div class="w-25 bg-white rounded mt-5 me-5 mb-5">
        <?php 
            @$myquery ="SELECT * FROM workout where id = '$id'";
            @$run= mysqli_query($conn,$myquery);
            @$fet=mysqli_fetch_Array($run);

        ?>
        <div class="workout">
        <?php 
            $pic= $fet['img'];
        ?>
            <img src="<?php echo "./img/workouts/".$pic?>"
                    class="workout-img mt-4"
                    alt="Conditioning" />
            <div class="workout-content">
                <div class="workout-tags">
                    <?php
                        $wid=$fet['id'];
                        if($wid==1 || $wid== 4){
                        ?>
                        <span class="tag tag--beginner">Beginner</span>
                        <?php
                        }
                        elseif($wid==2 || $wid==5 ){
                        ?>
                            <span class="tag tag--guide">Guide</span>
                            <span class="tag tag--advance">Advance</span>
                        
                        <?php
                        }
                        elseif ($wid==3 || $wid==6 ) {
                        ?>
                
                
                            <span class="tag tag--advance">Advance</span>
                
                        <?php
                        }
                    ?>
                    
                </div>
                <p class="workout-title"><?php echo $fet['workout_name'] ?></p>
                <ul class="workout-attributes">
                    <li class="workout-attribute">
                        <ion-icon class="workout-icon" name="flame-outline"></ion-icon>
                        <span><?php echo $fet['moves'] ?> </span>
                    </li>
                    <li class="workout-attribute">
                        <ion-icon class="workout-icon" name="walk"></ion-icon>
                        <span><?php echo $fet['strength'] ?>  </span>
                    </li>
                    <li class="workout-attribute">
                        <ion-icon class="workout-icon" name="star-outline"></ion-icon>
                        <span><?php echo $fet['rating'] ?> </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form action="#" method="post" class="rounded"  >
        <div class="mb-3">
        <label for="username" class="form-label">Your Username</label>
        <input type="text" name="username"  required class="form-control" value="<?php echo $user_name ?>"   id="username">
        <input type="hidden" name="usersid" value="<?php  echo $userid ?>" class="form-control">
        <input type="hidden" name="workoutid"  value="<?php  echo $fet['id'] ?>"  class="form-control">
        <input type="hidden" name="workoutname"  value="<?php  echo $fet['workout_name'] ?>"  class="form-control">
        <input type="hidden" name="status"  value="pending"  class="form-control">




        </div>
        <div class="mb-3">
        <label for="Email1" class="form-label">Your Email</label>
        <input type="email" name="email" required  value="<?php echo $user_email ?>" class="form-control" id="Email1">
        </div>
        
        <div class="d-flex justify-content-end align-items-end">
        <button type="submit" name="enroll" class="form-btn">Enroll Now</button>
        </div>
    
    </form>

    </div>

    <!-- signup form ends -->



    <footer class="footer">
      <div class="container grid grid--footer">
        <div class="logo-col">
          <a href="#" class="footer-logo">
            <img class="logo" alt="Carter-drill-logo" src="img/carterdrill-logo.png" />
          </a>

          <ul class="social-links">
            <li>
              <a class="footer-link" href="#"
                ><ion-icon class="social-icon" name="logo-instagram"></ion-icon
              ></a>
            </li>
            <li>
              <a class="footer-link" href="#"
                ><ion-icon class="social-icon" name="logo-facebook"></ion-icon
              ></a>
            </li>
            <li>
              <a class="footer-link" href="#"
                ><ion-icon class="social-icon" name="logo-twitter"></ion-icon
              ></a>
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
              290 Reading Road, Yusuf Drive,  15677
            </p>
            <p>
              <a class="footer-link" href="tel:290-156-770">290-156-770</a
              ><br />
              <a class="footer-link" href="hello@carterdrill.com"
                >hello@carterdrill.com</a
              >
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
  </body>
</html>
