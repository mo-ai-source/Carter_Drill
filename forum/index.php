<?php
include('conn.php');
 $connect= new mysqli("localhost" , "root" , "","carter_drill");
function check_login($connect)
    {
      if(isset($_SESSION['username']))
      {
          $id= $_SESSION['id'];
          $query = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
          
          $result= mysqli_query($connect, $query);
          
          if($result && mysqli_num_rows($result) >0)
          {
           $userdata = mysqli_fetch_assoc($result);
       
           return $userdata;
          }

      }
      header('Location:../login.php');
      die;
  }
@session_start();
@$userid = $_SESSION['id'];
@$user_email = $_SESSION['email'];
@$user_name = $_SESSION['username'];
@$userdata = check_login($connect);

$currentTime = time();
if ($currentTime > $_SESSION['expire']) {
  header("location: ../login.php");
  session_unset();
  session_destroy();
}
if(isset($_POST['save'])){
  
$userid = $_POST['userid'];
$user_name = $_POST['user_name'];
$msg = $_POST['msg'];
$date=date('d')."-".date('m')."-".date('Y'); 
if($user_name != "" && $msg != ""){
	$sql = "INSERT INTO `chat`(`user_id`, `username`, `msg`,`date`) VALUES ('$userid','$user_name','$msg','$date')";
	$run= mysqli_query($connect, $sql);
	if($run){
		header("Refresh:0");
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
          <li><a href="#" onclick="location.href='forum/index.php';" class="main-nav-link">Forum</a></li>
          <li><a href="#" onclick="location.href='../game.php';" class="main-nav-link">Game</a></li>
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

<div class="panel panel-default" style="margin-top:50px">
  <div class="panel-body">
    <h3>Community forum</h3>
    <hr>
    <form action="#" method="post">
        <input type="hidden" id="commentid" name="userid" value="<?php echo $userid ?>">
        <div class="form-group">
          <label for="usr">Write your name:</label>
          <input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>" required>
        </div>
          <div class="form-group">
            <label for="comment">Write your question:</label>
            <textarea class="form-control" rows="5" name="msg" required></textarea>
          </div>
        <input type="submit" id="butsave" name="save" class="btn btn-primary" value="Send">
     </form>
    </div>
  </div>
  

<div class="panel panel-default">
  <div class="panel-body">
    <h4>Recent questions</h4>           
	<table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
	  <tbody id="record">
    <?php
        $conn= new mysqli("localhost" , "root" , "","carter_drill");
        $sql = "SELECT *  FROM `chat` ORDER BY id desc";
        $result = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($result)){

          $qid=$row['id'];
    ?>
          	<tr><td style="padding-left:30px"><b><img src="avatar.jpg" width="30px" height="30px" /><?php echo $row['username'] ?><i>  <?php echo $row['date'] ?></i></b></br><p style="padding-left:40px"><?php echo $row['msg'] ?></p>
            <!-- <a  onmouseover=openmodal();>Reply</a> -->
            <a  href="#" onclick="location.href='./replyforum.php?id=<?php echo $row['id'] ?>';" style="border:none; background-color:transparent;" data-toggle="modal" data-target="#exampleModal">
              Reply
              
            </a>
           </td></tr>
           <?php
              $anssql = "SELECT *  FROM `answer` WHERE `question_id`='$qid'";
              $ansres = mysqli_query($conn , $anssql);
              while($arow = mysqli_fetch_array($ansres)){
                ?>
                <tr>
                  <td style="padding-left:80px">
                  <b><img src="avatar.jpg" width="30px" height="30px" /><?php echo $arow['ans_username'] ?></b></br>
                  <p style="padding-left:40px"><?php echo $arow['answer_msg'] ?></p>
                  </td>
                </tr>
                <?php
              }
            ?>
          	
        
        <?php
        
}

?>
	
	  </tbody>
	</table>
  </div>
</div>

</div>

</body>
</html>