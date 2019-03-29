<!DOCTYPE html>
<html>
<head>
	<style>
	table * {
		border: 1px solid black;
	}
	.dt{
	position: relative;
	background-color: solid black;
     margin-left: 92%;
}
	</style>
</head>
<body>
	<?php
$date = date('d/m/y');
echo "<b><span  class='dt'><label>Date:</label>".$date."</span></b>";
?>
	<a href="front.php">Home</a>
	<h1 style="margin-left: 2%;">Billing Section</h1>

    <form action="new.php" method="get"><button type="submit" class="button" name="new" >New</button></form> <br>

	<form action="addgenbill.php" method="get" class="input">
		<table class="aa" ><tr><th>Enter Customer Name:</th><th>Enter Drug Name:</th><th>Enter Drug-Price/Piece:</th><th>Enter Quantity</th><th></th></tr>
		<tr><td><input type="text" name="name" placeholder="Enter Name"></td>
		
		<td><input type="text" name="mname" placeholder="Enter Drug Name"></td>
		<td><input type="text" name="Price" placeholder="Enter Price"></td>
   
	<td><input type="text" name="getquantity" placeholder="Enter the Quantity"></td>
	 <td><button type="submit" class="button" >Add</button> </td></tr></table>
     </form><hr>
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
      

	$tot=0;
$sql = "select * from generalbill;";
$result = mysqli_query($conn, $sql);
echo "<form action='delmedicine.php' method='get' ><table class='aa'><tr><th>Name</th><th>Tablet_Name</th><th>Quantity</th><th>Amount</th><th></th></tr>";
while ($row=mysqli_fetch_assoc($result)){

	echo "<tr><td>".$row['name']."</td><td>".$row['mname']."</td><td>".$row['quantity']."</td><td>".$row['amount']."</td><td><button  type='submit' name='remove' class='button'  value='".$row['mname']."'>Remove</button></th></tr>";
	$tot=$tot+$row['amount'];
}

echo "</table></form><hr>";
echo "<b>Total Amount: </b>".$tot;
     ?> 

</body>
</html>