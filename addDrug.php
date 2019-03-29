
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
 // $addId = $_GET['addID'];
  $addName = $_GET['addName'];
$addCost= $_GET['addCost'];
$addUse = $_GET['addUse'];
$addType = $_GET['addType'];
$addmDate = $_GET['addmDate'];
$addeDate = $_GET['addeDate'];
$addQuantity = $_GET['addQuantity'];
  $sql = "insert into pharmacy values(DEFAULT,'$addName','$addCost','$addUse','$addType','$addmDate','$addeDate','$addQuantity');";
  $result = mysqli_query($conn, $sql);
  header("Location:pharmacy.php");
  ?>