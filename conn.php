<?php


    $conn= new mysqli("localhost" , "root" , "","carter_drill");
    
    if($conn->connect_error)
    {
        die('connection failed : ' .$conn->connect_error);
    }
      
?>