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
	$addName = $_GET['addName'];
	$addAge = $_GET['addAge'];
	$addSex = $_GET['addSex'];
	$addQualification = $_GET['addQualification'];
	$addPhone = $_GET['addPhone'];
	$adds = $_GET['adds'];
     $sql = "insert  into doctor values(DEFAULT, '$addName', '$addAge', '$addSex', '$addQualification', '$addPhone','$adds');";
     $result = mysqli_query($conn, $sql);
     header("Location:doctorconnection.php");	 
?>
