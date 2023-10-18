<?php 
include("./conn.php");
@session_start();
@$userid = $_SESSION['id'];
@$user_email = $_SESSION['email'];
@$user_name = $_SESSION['username'];

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
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
          rel="stylesheet" />

    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/queries.css" />

    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <script type="module"
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule=""
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

    <script defer
            src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>
    <script defer src="js/script.js"></script>
     <style>
      body, html {
        height: 100%;
        margin: 0;
      }
  
      .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
      }
     </style>



    <title> The Carter Drill</title>
</head>
<body>
    <header class="header">
        <a href="#">
            <img class="logo" alt="Carterdrill logo" src="img/carterdrill-logo.png" />
        </a>

        <nav class="main-nav">
            <ul class="main-nav-list">
                <li><a href="#" onclick="location.href='home.php';" class="main-nav-link">Home</a></li>
                <li><a  href="#" onclick="location.href='workout.php';" class="main-nav-link">Workout</a></li>
                <li><a  href="#" onclick="location.href='forum/index.php';" class="main-nav-link">Forum</a></li>
                <li><a href="#" onclick="location.href='game.php';" class="main-nav-link">Game</a></li>
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

            </ul>
        </nav>
        
    </header>


   
    

       
    <main>
         <section class="section-hero">
            <div class="hero">
              <div class="hero-text-box" style="text-align: center;">
                  <h1 class="heading-primary">
                      GAME
                  </h1>
              </div>
            </div>
          </section>
          
          <div class="center-container">
             <iframe src="http://localhost/The-Carter-Drill-last/my_game/index.html" width="1080" height="700" frameborder="0" allowfullscreen></iframe>
          </div>
     
     

    </main>


    <footer class="footer">
        <div class="container grid grid--footer">
            <div class="logo-col">
                <a href="#" class="footer-logo">
                    <img class="logo" alt="Carter-drill-logo" src="img/carterdrill-logo.png" />
                </a>

                <ul class="social-links">
                    <li>
                        <a class="footer-link" href="#">
                            <ion-icon class="social-icon" name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a class="footer-link" href="#">
                            <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a class="footer-link" href="#">
                            <ion-icon class="social-icon" name="logo-twitter"></ion-icon>
                        </a>
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
</body>
</html>
