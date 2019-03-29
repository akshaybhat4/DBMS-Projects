<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "hospital";

$conn = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
if(mysqli_connect_errno()){
    echo "Failed to connect to MYSQL".mysqli_connect_error();
}
$tot='0';
$name= $_GET['name'];
$addname = $_GET['mname'];
$addquantity = $_GET['getquantity'];
$price=$_GET['Price'];
        $tot=$price*$addquantity;
echo $tot;
 $sql1 = "insert  into generalbill values('$addname', '$addquantity', '$tot', '$name');";
$result = mysqli_query($conn, $sql1);
header("Location:billing.php");
?>