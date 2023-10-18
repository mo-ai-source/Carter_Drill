<?php
include("./conn.php");
session_start();
$userid = $_SESSION['id'];
$user_email= $_SESSION['email'];
$user_name =$_SESSION['username']; 
$progress = $_POST['progress'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $progress = $_POST['progress'];
  $conn= new mysqli("localhost" , "root" , "","carter_drill");
  if ($conn) {
    $sql = "UPDATE `user_workout` SET `progress`='$progress' WHERE user_id = '$userid'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo 'Progress saved!';
  } else {
    echo 'Failed to connect to database';
  }
$conn->close();
}
?>