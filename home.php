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
          <li><a href="#" class="main-nav-link">Home</a></li>
          <li><a href="#" onclick="location.href='workout.php';" class="main-nav-link">Workout</a></li>
          <li><a href="#" onclick="location.href='forum/index.php';" class="main-nav-link">Forum</a></li>
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
          <li><a class="main-nav-link nav-cta" href="#cta">Try for free</a></li>
        </ul>
      </nav>

      <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
      </button>
    </header>

    <main>
      <section class="section-hero">
        <div class="hero">
          <div class="hero-text-box">
              <h1 class="heading-primary">
                  The only way to get better at basketball is to put in the work
              </h1>
              <p class="hero-description">
                  We also offer personalized training plans, tailored to your specific goals and needs. 
                  Whether you want to become a better shooter, improve your defense, or increase your vertical jump,
                  we can create a plan that's right for you.
              </p>
            <a href="#cta" class="btn btn--full margin-right-sm"
              >Start Now</a
            >

            <a href="#how" class="btn btn--outline">Learn more &darr;</a>
            <div class="delivered-workout">
              <div class="delivered-imgs">
                <img src="img/customers/customer-1.jpg" alt="Customer photo" />
                <img src="img/customers/customer-2.jpg" alt="Customer photo" />
                <img src="img/customers/customer-3.jpg" alt="Customer photo" />
                <img src="img/customers/customer-4.jpg" alt="Customer photo" />
                <img src="img/customers/customer-5.jpg" alt="Customer photo" />
                <img src="img/customers/customer-6.jpg" alt="Customer photo" />
              </div>
              <p class="delivered-text">
                  <span>250,000+</span>of our clients have reported improved stamina and endurance on the court!
              </p>
            </div>
          </div>
          <div class="hero-img-box">
            <picture>
              <source srcset="img/hero.webp" type="image/webp" />
              <source srcset="img/hero-min.png" type="image/png" />

              <img
                src="img/hero-min.png"
                class="hero-img"
                alt="Basketball Players"
              />
            </picture>
          </div>
        </div>
      </section>

      <section class="section-featured">
        <div class="container">
          <h2 class="heading-featured-in">As featured in</h2>
          <div class="logos">
            <img src="img/logos/techcrunch.png" alt="Techcrunch logo" />
            <img
              src="img/logos/business-insider.png"
              alt="Business Insider logo"
            />
            <img
              src="img/logos/the-new-york-times.png"
              alt="The New York Times logo"
            />
            <img src="img/logos/forbes.png" alt="Forbes logo" />
            <img src="img/logos/usa-today.png" alt="USA Today logo" />
          </div>
        </div>
      </section>

      <section class="section-how" id="how">
        <div class="container">
          <span class="subheading">How it works</span>
          <h2 class="heading-secondary">
            How to use this website in 3 simple steps
          </h2>
        </div>

        <div class="container grid grid--2-cols grid--center-v">
          <!-- STEP 01 -->
          <div class="step-text-box">
            <p class="step-number">01</p>
            <h3 class="heading-tertiary">
              Log-in and Start
            </h3>
            <p class="step-description">
                Create an account: Start by creating an account on the website. 
                This will allow you to save your progress and access all the features of the website.!
            </p>
          </div>

          <div class="step-img-box">
            <img
              src="img/app/app-screen-1.png"
              class="step-img"
              alt="Log in page"
            />
          </div>

          <!-- STEP 02 -->
          <div class="step-img-box">
            <img
              src="img/app/app-screen-2.png"
              class="step-img"
              alt="Workout page"
            />
          </div>
          <div class="step-text-box">
            <p class="step-number">02</p>
            <h3 class="heading-tertiary">Choose A drill</h3>
            <p class="step-description">
                Choose a drill: After you find a drill that you like,
                click on it to view the instructions and video demonstration of the drill.
            </p>
          </div>

          <!-- STEP 03 -->
          <div class="step-text-box">
            <p class="step-number">03</p>
            <h3 class="heading-tertiary">Compare with Professionals</h3>
            <p class="step-description">
                Send video of you completing the workout.
                Offer the option to get feedback from coaches or other players.
            </p>
          </div>
          <div class="step-img-box">
            <img
              src="img/app/app-screen-3.png"
              class="step-img"
              alt="OpenPose Picture"
            />
          </div>
        </div>
      </section>

      <section class="section-workouts" id="workout">
        <div class="container center-text">
          <span class="subheading">Workouts</span>
          <h2 class="heading-secondary">
            The Carter Drill have up to 5,000+ drills
          </h2>
        </div>

        <div class="container grid grid--3-cols margin-bottom-md">
          <div class="workout">
            <img
              src="img/workouts/workout-1.jpg"
              class="workout-img"
              alt="Conditioning"
            />
            <div class="workout-content">
              <div class="workout-tags">
                <span class="tag tag--beginner">Beginner</span>
              </div>
              <p class="workout-title">Conditioning</p>
              <ul class="workout-attributes">
                <li class="workout-attribute">
                  <ion-icon class="workout-icon" name="flame-outline"></ion-icon>
                  <span>Burn <strong>600 </strong> Calories</span>
                </li>
                <li class="workout-attribute">
                    <ion-icon class="workout-icon" name="walk"></ion-icon>
                    <span><strong>5</strong> Different Strength Training </span>
                </li>
                <li class="workout-attribute">
                  <ion-icon class="workout-icon" name="star-outline"></ion-icon>
                  <span><strong>4.9</strong> rating</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="workout">
            <img
              src="img/workouts/workout-2.jpg"
              class="workout-img"
              alt="Dunking"
            />
            <div class="workout-content">
              <div class="workout-tags">
                <span class="tag tag--guide">Guide</span>
                <span class="tag tag--advance">Advance</span>
              </div>
              <p class="workout-title">Dunking</p>
              <ul class="workout-attributes">
                <li class="workout-attribute">
                  <ion-icon class="workout-icon" name="flame-outline"></ion-icon>
                  <span><strong>6+</strong> vertical</span>
                </li>
                <li class="workout-attribute">
                    <ion-icon class="workout-icon"  name="walk"></ion-icon>
                  <span><strong>7</strong> Different Plyometics Exercises</span>
                </li>
                <li class="workout-attribute">
                  <ion-icon class="workout-icon" name="star-outline"></ion-icon>
                  <span><strong>4.8</strong> rating </span>
                </li>
              </ul>
            </div>
          </div>

          <div class = "diets">
            <h3 class="heading-tertiary">Includes All Type of Drills:</h3>
            <ul class="list">
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Agility</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Endurance</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Scrimmages</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Ball-handling</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Shooting</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Cardio</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Balance</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Footwork</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Power</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="container all-workouts">
          <a href="#" class="link">See all workouts &rarr;</a>
        </div>
      </section>

      <section class="section-testimonials" id="testimonials">
        <div class="testimonials-container">
          <span class="subheading">Testimonials</span>
          <h2 class="heading-secondary">Once you try it, you can't go back</h2>

          <div class="testimonials">
            <figure class="testimonial">
              <img
                class="testimonial-img"
                alt="Photo of customer Dave Bryson"
                src="img/customers/dave.jpg"
              />
              <blockquote class="testimonial-text">
                  "The Carter Drill website has been a game-changer for my basketball training. 
                  I highly recommend The Carter Drill website to any basketball player looking to take their game to the next level
              </blockquote>
              <p class="testimonial-name">&mdash; Dave Bryson</p>
            </figure>

            <figure class="testimonial">
              <img
                class="testimonial-img"
                alt="Photo of customer Ben Hadley"
                src="img/customers/ben.jpg"
              />
              <blockquote class="testimonial-text">
                  I've been a coach for more than 15 years, and I've never seen such comprehensive and effective basketball drills like the ones on The Carter Drill website. 
                  I highly recommend it to any coach or player looking to take their game to the next level.
              </blockquote>
              <p class="testimonial-name">&mdash; Ben Hadley</p>
            </figure>

            <figure class="testimonial">
              <img
                class="testimonial-img"
                alt="Photo of customer Steve Miller"
                src="img/customers/steve.jpg"
              />
              <blockquote class="testimonial-text">
                  The Carter Drill website has helped me improve my speed and quickness.
                  The drills are challenging but doable and the website is easy to navigate. 
                  I highly recommend it to anyone looking to improve their basketball skills.
              </blockquote>
              <p class="testimonial-name">&mdash; Steve Miller</p>
            </figure>

            <figure class="testimonial">
              <img
                class="testimonial-img"
                alt="Photo of customer Hannah Smith"
                src="img/customers/hannah.jpg"
              />
              <blockquote class="testimonial-text">
                  "The Carter Drill website has been a valuable resource for my basketball training. 
                  The drills are well-designed and helped me improve my ball handling and shooting. 
                  I highly recommend it to any basketball player looking to take their game to the next level.
              </blockquote>
              <p class="testimonial-name">&mdash; Hannah Smith</p>
            </figure>
          </div>
        </div>

        <div class="gallery">
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-1.jpg"
              alt="People playing basketball"
            />
            <!-- <figcaption>Caption</figcaption> -->
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-2.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-3.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-4.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-5.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-6.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-7.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-8.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-9.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-10.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-11.jpg"
              alt="People playing basketball"
            />
          </figure>
          <figure class="gallery-item">
            <img
              src="img/gallery/gallery-12.jpg"
              alt="People playing basketball"
            />
          </figure>
        </div>
      </section>

      <section class="section-pricing" id="pricing">
        <div class="container">
          <span class="subheading">Pricing</span>
          <h2 class="heading-secondary">
            Become Pro today!
          </h2>
        </div>

        <div class="container grid grid--2-cols margin-bottom-md">
          <div class="pricing-plan pricing-plan--starter">
            <header class="plan-header">
              <p class="plan-name">Starter</p>
              <p class="plan-price"><span>£</span>399</p>
              <p class="plan-text">per month. That's just £13 per exercise!</p>
            </header>
            <ul class="list">
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>1 exercise per day</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Chat is open from 11am to 9pm</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Game is accessible</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="close-outline"></ion-icon>
              </li>
            </ul>
            <div class="plan-sing-up">
              <a href="#" class="btn btn--full">Start today</a>
            </div>
          </div>

          <div class="pricing-plan pricing-plan--complete">
            <header class="plan-header">
              <p class="plan-name">Complete</p>
              <p class="plan-price"><span>£</span>649</p>
              <p class="plan-text">per month. That's just $11 per exercise!</p>
            </header>
            <ul class="list">
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span><strong>2 exercises</strong> per day</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Chat <strong>24/7</strong></span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Game is accessible</span>
              </li>
              <li class="list-item">
                <ion-icon class="list-icon" name="checkmark-outline"></ion-icon>
                <span>Feedback with video analysis</span>
              </li>
            </ul>
            <div class="plan-sing-up">
              <a href="#" class="btn btn--full">Start Today</a>
            </div>
          </div>
        </div>

        <div class="container grid">
          <aside class="plan-details">
            Prices include all applicable taxes. You can cancel at any time.
            Both plans include the following:
          </aside>
        </div>

        <div class="container grid grid--4-cols">
          <div class="feature">
            <ion-icon class="feature-icon" name="infinite-outline"></ion-icon>
            <p class="feature-title">24/7!</p>
            <p class="feature-text">
              Our subscriptions cover 365 days per year, even including major
              holidays.
            </p>
          </div>
          <div class="feature">
            <ion-icon class="feature-icon" name="eye"></ion-icon>
            <p class="feature-title">Seen by the Best</p>
            <p class="feature-text">
              Our drills have been review by experts and used by players across the world .
            </p>
          </div>
          <div class="feature">
            <ion-icon class="feature-icon" name="camera"></ion-icon>
            <p class="feature-title">Video Analysis</p>
            <p class="feature-text">
              Our feature of video analysis allow you to check your form compare to professionals.
            </p>
          </div>
          <div class="feature">
            <ion-icon class="feature-icon" name="pause-outline"></ion-icon>
            <p class="feature-title">Pause anytime</p>
            <p class="feature-text">
              Going on vacation? Just pause your subscription, and we refund
              unused days.
            </p>
          </div>
        </div>
      </section>

      <section class="section-cta" id="cta">
        <div class="container">
          <div class="cta">
            <div class="cta-text-box">
              <h2 class="heading-secondary">Become a Pro now!</h2>
              <p class="cta-text">
                All time of basketball drills are waiting for you. Start
                training today. You can cancel or pause anytime. 
              </p>

              <form class="cta-form" action="./signup.php" method="Post" netlify>
                <div>
                  <label for="full-name">Full Name</label>
                  <input
                    id="full-name"
                    type="text"
                    placeholder="John Smith"
                    name="username" 
                    required
                  />
                </div>

                <div>
                  <label for="email">Email address</label>
                  <input
                    id="email"
                    type="email"
                    placeholder="me@example.com"
                    name="email"
                    required
                  />
                </div>

                <div>
                  <label for="pass">Password</label>
                  <input
                    id="pass"
                    type="password"
                    placeholder="me@example.com"
                    name="password"
                    required
                  />
                </div>

                <button class="btn btn--form" name="register">Sign up now</button>
                 
                <!-- <input type="checkbox" />
                <input type="number" /> -->
                <a href="#" onclick="location.href='login.php';" class="signupa" style="font-size: 12px; color:white;">Already have account? Login Here</a>
              </form>
            </div>
            <div
              class="cta-img-box"
              role="img"
              aria-label="Basketball player drawn"
            ></div>
          </div>
        </div>
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
  </body>
</html>
