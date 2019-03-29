<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "hospital";

$conn = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
if(mysqli_connect_errno()){
    echo "Failed to connect to MYSQL".mysqli_connect_error();
}
if (isset($_GET['new'])) {
	
     $sql = "delete from generalbill";
     $result = mysqli_query($conn, $sql);
     header("Location:billing.php");
}

?>