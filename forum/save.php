<?php
session_start();
$conn= new mysqli("localhost" , "root" , "","carter_drill");
$userid = $_POST['userid'];
$name = $_POST['name'];
$msg = $_POST['msg'];
$date=date('d')."-".date('m')."-".date('Y'); 
if($name != "" && $msg != ""){
	$sql = "INSERT INTO `chat`(`user_id`, `username`, `msg`,`date`) VALUES ('$userid','$name','$msg','$date')";
	$run= mysqli_query($conn, $sql);
	if($run){
		echo json_encode(array("statusCode"=>200));
		header("Refresh:0");
	}
	
}
else{
	echo json_encode(array("statusCode"=>201));
}
$conn = null;

?>