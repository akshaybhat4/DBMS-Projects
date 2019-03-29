<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "hospital";

$conn = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
if(mysqli_connect_errno()){
	echo "Failed to connect to MYSQL".mysqli_connect_error();
}
$addName= $_GET['addName'];
$addAge = $_GET['addAge'];
$addSex = $_GET['addSex'];
$addQualification = $_GET['addQualification'];
$addPhone = $_GET['addPhone'];
$addshift = $_GET['shift'];
$sql = "insert into nurse values(DEFAULT, '$addName', '$addAge', '$addSex', '$addQualification', '$addPhone','$addshift');";
$result = mysqli_query($conn, $sql);
header("Location:nurseconnect.php"); 
?>