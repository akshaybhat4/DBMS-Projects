<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
.button {
    background-color:  #4CAF50;
    border: none;
    color: black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 16px;
}

.button:hover {
    background-color: #92fcc3;
}
a:hover {
    background-color:#ddd;
    color: black;
   padding-top: 8px;
   padding-bottom: 8px;
     padding-right: 4px;
     padding-left: 4px;
}
   .previous {
   position: absolute;
    background-color: #36445b;
    color:white;
     padding-top: 8px;
     padding-bottom: 8px;
     padding-right: 4px;
     padding-left: 4px;
}
.dt{
	position: relative;
	background-color: solid black;
     margin-left: 92%;

}
.hr {
	margin-right: 20%;
	
}

</style>	

</head>
<body>
	<a href="front.php" class="previous" style="text-decoration: none">&laquo; HOME</a>
	<?php
$date = date('d/m/y');
echo "<b><span  class='dt'><label>Date:</label>".$date."</span></b>";
?>
	<center><h1 style="padding: 8px 16px; background-color: #322dbc;color: white;">General Patient Details</h1></center> 
	
<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hospital";
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $tot=0;
  $sql = "select * from genpatient;";
  $result = mysqli_query($conn, $sql);
   echo "<br><form class='form1' style='text-align:center;' action='removeGpatient.php' method='get'><table><tr><th>Patient ID</th><th>Patient Room NO.</th><th>Patient Name</th><th>Patient Age</th><th>Gender</th><th>Phone</th><th>Address</th><th>Problem Description</th><th>Admitted Date</th><th></th></tr>";
   while ($row = mysqli_fetch_assoc($result)) {
   	$tot++;
   echo "<tr><td>".$row['pid']."</td><td>".$row['roomno']."</td><td>".$row['pname']."</td><td>".$row['page']."</td><td>".$row['psex']."</td><td>".$row['pphno']."</td><td>".$row['paddress']."</td><td>".$row['problem']."</td><td>".$row['admitdate']."</td><td><button  type='submit' name='remove' class='button'  value='".$row['pid']."'>Remove</button></td></tr>";
     }
    echo "</table></form>";
    echo "<hr class='hr'>";
    echo "<b><label>Total Number Of Patients: </label>".$tot."</b>";
    
      ?>
</body>
</html>