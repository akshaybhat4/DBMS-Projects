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
	$pid=$_GET['remove'];
     $sql = "delete from genpatient where pid=$pid;";
     $result = mysqli_query($conn, $sql);
     header("Location:viewgeneral.php");	 
?>