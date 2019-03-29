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
	$did=$_GET['remove'];
     $sql = "delete from doctor where did=$did;";
     $result = mysqli_query($conn, $sql);
     header("Location:doctorconnection.php");	 
?>