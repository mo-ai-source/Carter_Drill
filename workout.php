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
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <script type="module"
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule=""
            src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

    <script defer
            src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>
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
                <li><a href="#" onclick="location.href='home.php';" class="main-nav-link">Home</a></li>
                <li><a href="#" class="main-nav-link">Workout</a></li>
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



        <button class="btn-mobile-nav">
            <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
            <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
        </button>
    </header>

    
     <div class="input">
      <button class="AIbutton talk content center sticky"><i class="fas fa-microphone-alt"></i></button>
     </div> 







     



        <main>
            
            <section class="section-hero center-text">

                <p class="about-me-text"></p>


            </section>
            <section class="section-1" id="section-1">
                <section class="section-how" id="how">

                    <div class="container center-text">
                        <span class="subheading">How it Work</span>
                        <h2 class="heading-secondary">

                            Overview

                        </h2>

                        <p class="hero-description">
                            The workout section presents a range of basketball exercises that can be selected according to individual fitness goals and abilities.
                            To enhance the experience and provide a deeper understanding of form and technique, there is also a video analysis section that leverages the power of OpenPose.
                            This advanced software is capable of detecting and tracking the movements of the body in real-time, allowing users to see how their bodies are moving and identify areas for improvement during basketball games.
                            By combining expert basketball workout instructions with cutting-edge video analysis technology, this platform provides a comprehensive and effective solution for anyone looking to take their basketball skills to the next level.
                        </p>
                    </div>


                </section>
            </section>



            <section class="section-2" id="section-2">

                <section class="section-workouts" id="workout">
                    <div class="container center-text">
                        <span class="subheading">Workouts</span>
                        <h2 class="heading-secondary">
                            Select a Workout
                        </h2>
                    </div>

                    <div class="container grid grid--3-cols margin-bottom-md">
                       
                        <?php 
                            $myquery ="SELECT * FROM workout";
                            $run= mysqli_query($conn,$myquery);
                                while($fet=mysqli_fetch_Array($run)){

                        ?>
                        <div class="workout">
                        <?php 
                         $id=$fet['id'];
                            $pic= $fet['img'];
                        ?>
                           <a  href="#" onclick="location.href='user_workout_registration.php?id=<?php echo $fet['id'] ?>';">
                            <img src="<?php echo "./img/workouts/".$pic?>"
                                 class="workout-img"
                                 alt="Conditioning" /> </a>   
                            <div class="workout-content">
                                <div class="workout-tags">
                                    <?php
                                      
                                       if($id==1 || $id== 4){
                                        ?>
                                        <span class="tag tag--beginner">Beginner</span>
                                        <?php
                                       }
                                       elseif($id==2 || $id==5 ){
                                        ?>
                                            <span class="tag tag--guide">Guide</span>
                                            <span class="tag tag--advance">Advance</span>
                                       
                                        <?php
                                       }
                                       elseif ($id==3 || $id==6 ) {
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
                            <!-- <a href="#" class="d-flex justify-content-center   text-white pt-2 pb-2 text-decoration-none" style="background-color: #cf711f; font-size:18px;">View More</a> -->
                        </div>
                        <?php 
                                }
                        ?>

                    </div>




                </section>
            </section>


           

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
        <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"> </script>
    <script src="./assets/vendors/bootstrap/js/bootstrap.min.js"></script>


    </body>
</html >
