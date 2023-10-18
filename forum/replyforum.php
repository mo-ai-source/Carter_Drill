<?php
include('conn.php');
 
@session_start();
@$userid = $_SESSION['id'];
@$user_email = $_SESSION['email'];
@$user_name = $_SESSION['username'];

$id= $_GET['id'];

if(isset($_POST['btnreply'])){
  $question_id = $_POST['question_id'];
  $ans_username = $_POST['ans_username'];
  $answer_msg = $_POST['answer_msg'];
  $ans_date=date('d')."-".date('m')."-".date('Y'); 
  if($ans_username != "" && $answer_msg != ""){
    $sql = "INSERT INTO `answer`(`question_id`, `answer_msg`, `ans_username`) VALUES ('$question_id','$answer_msg ','$ans_username')";
    $run= mysqli_query($conn, $sql);
    if($run){
        header("location: ./index.php");
    }
    else{
        echo"Something went wrong";
    }
    
  }
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
<title>forum</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- <script src="main.js"></script> -->
  <link rel="stylesheet" href="../css/general.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/queries.css" />
</head>

<body>
  
<header class="header">
      <a href="#">
        <img class="logo" alt="Carterdrill logo" src="../img/carterdrill-logo.png" />
      </a>

      <nav class="main-nav">
        <ul class="main-nav-list">
          <li><a href="#" onclick="location.href='../home.php';" class="main-nav-link">Home</a></li>
          <li><a href="#" onclick="location.href='../workout.php';" class="main-nav-link">Workout</a></li>
          <li><a href="#" onclick="location.href='./index.php';" class="main-nav-link">Forum</a></li>
          <li><a href="#" onclick="location.href='../forum.php';" class="main-nav-link">Game</a></li>
          <?php

                 if(isset($_SESSION['email'])){

                 ?>
                  <li><a class='main-nav-link' href='#' onclick="location.href='../userdashboard.php';"> <?php echo $_SESSION['username'] ?> </a></li>
                  
                <?php 
                }
                else{
                    ?> 
                   <a class='main-nav-link' href='#' onclick="location.href='../login.php';"> Login </a>
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

<div class="container">

<form action="#" method="post" style="margin-top:50px;">
            <input type="hidden" name="answer_user_id" value="<?php echo $userid ?>">
            
        	<div class="form-group">
        	  <label for="usr">Write your name:</label>
        	  <input type="text" class="form-control" name="ans_username"  value="<?php echo $user_name ?>" required>
        	</div>
            <div class="form-group">
            <?php 
            $myquery ="SELECT * FROM `chat` where id ='$id'";
            $run= mysqli_query($conn,$myquery);
            $fet=mysqli_fetch_Array($run);

             ?>  
              <label for="comment">Question:</label>
              <input class="form-control" rows="5" name="answer_q" value="<?php echo $fet['msg']?>" required> </input>
              <input class="form-control" type="hidden" name="question_id" value="<?php echo $fet['id']?>"> </input>
            </div>
            <div class="form-group">
              <label for="comment">Write your reply:</label>
              <textarea class="form-control" rows="5" name="answer_msg" required></textarea>
            </div>
        	 <input type="submit" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
      </form>

</div>

</body>
</html>