<?php
include("./conn.php");

function check_login($conn)
    {
      if(isset($_SESSION['username']))
      {
          $id= $_SESSION['id'];
          $query = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
          
          $result= mysqli_query($conn , $query);
          
          if($result && mysqli_num_rows($result) >0)
          {
           $userdata = mysqli_fetch_assoc($result);
       
           return $userdata;
          }

      }
      header('Location:login.php');
      die;
  }

?>