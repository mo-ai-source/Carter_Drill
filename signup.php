<?php
  
   include("./conn.php");
   session_start();
   if(isset($_POST['register']))
   {  

        $username= $_POST['username'];
        $email = $_POST['email'];
        $password= $_POST['password'];

        $usercheck = "SELECT * FROM `user` WHERE username='$username'";
        $useresult = mysqli_query($conn,$usercheck );
        $getrow= mysqli_num_rows($useresult); 
        if ($getrow > 0) {
            echo "<script>alert('Username Already Exist. Please Change it.')</script>";
            mysqli_close($conn);
          }
          else{
            if(!empty($username) && !empty($email)&& !empty($password) )
            { 

            $query= "INSERT INTO user(`username`, `email` , `password` ) VALUES('$username','$email','$password' )";
              $runn= mysqli_query($conn, $query);
              if($runn>0){
                header("location:login.php");
                // echo "everthing is good";
              }
              else{
                echo "something went wrong";
              }
            
            }else
            {
            echo'<script>alert(" Please Enter Valid Information!")</script>';
            }
          }
        

   }


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
g
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
          <li><a href="#" onclick="location.href='home.php';"  class="main-nav-link">Home</a></li>
          <li><a href="#" onclick="location.href='workout.php';" class="main-nav-link">Workout</a></li>
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
         Sign Up
      </h1>
    </div>
    <div class="d-flex justify-content-center">
         <div>Enter your details to create an account</div>
    </div>
    <div class="signup d-flex justify-content-center">
      
      <form action="#" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" required class="form-control" id="username" >
        </div>
        <div class="mb-3">
          <label for="Email1" class="form-label">Email address</label>
          <input type="email" name="email" required class="form-control" id="Email1">
        </div>
        <div class="mb-3">
          <label for="Password1" class="form-label">Password</label>
          <input type="password" name="password" required class="form-control" id="Password1">
        </div>
        <div class="d-flex justify-content-between align-items-end">
          <a href="#" onclick="location.href='login.php';" class="signupa text-dark">Already have account? Login Here</a>
          <button type="submit" name="register" class="form-btn">Sign Up</button>
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
