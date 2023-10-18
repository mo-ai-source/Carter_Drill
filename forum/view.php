<?php
$conn= new mysqli("localhost" , "root" , "","carter_drill");
$data = array();
$sql = "SELECT *  FROM `chat`";
$result = mysqli_query($conn , $sql);
while($row = mysqli_fetch_array($result)){
        array_push($data, $row);
        array_push($data);
}

echo json_encode($data);
$conn = null;
?>




