<?php
include("./conn.php");
session_start();
$userid = $_SESSION['id'];
$user_email= $_SESSION['email'];
$user_name =$_SESSION['username']; 
$progress = $_POST['progress'];

$sql = "UPDATE `user_workout` SET `progress`='$progress' WHERE user_id = '$userid'";

if ($conn->query($sql) === TRUE) {
//   echo "Progress updated successfully";
if($progress==100){
    $sql = "UPDATE `user_workout` SET `status`='complete' WHERE user_id = '$userid' and `progress`=100";
    if ($conn->query($sql) === TRUE) {
          echo "Progress updated successfully";
    }
}

} else {
  echo "Error updating progress: " . $conn->error();
}

$conn->close();
?>