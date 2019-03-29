<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "hospital";

$conn = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
if(mysqli_connect_errno()){
	echo "Failed to connect to MYSQL".mysqli_connect_error();
}
$addRoomNo= $_GET['addroomno'];
$addName = $_GET['addname'];
$addAge = $_GET['addage'];
$addSex = $_GET['addsex'];
$addPhone = $_GET['addphone'];
$addAddress = $_GET['addaddress'];
$addDate=$_GET['addDate'];
$addproblem=$_GET['addproblem'];
$sql="insert into pripatient values(DEFAULT,'$addRoomNo','$addName','$addAge','$addSex','$addPhone','$addAddress','$addDate','$addproblem');";
$result = mysqli_query($conn,$sql);
echo "<script>alert('Private Patient Details Added!!');</script>";
        header("refresh:0;url=front.php");?>
