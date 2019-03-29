<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbpassword = "";
	$dbName = "hospital";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbpassword, $dbName);
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	$mname=$_GET['remove'];
     $sql = "delete from generalbill where mname='".$mname."';";
     $result = mysqli_query($conn, $sql);
     header("Location:billing.php");
	 
	 
?>