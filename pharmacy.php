<!DOCTYPE html>
<html>
<head>
	<style>
	body {font-family: Arial, Helvetica, sans-serif;}
input[type=text]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
   display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
input[type=date] {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
   display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.container {
    padding: 16px;
}

.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; 
    border: 1px solid #888;
    width: 80%;
}
.close {
    position: absolute;
    right: 145px;
    top: 18%;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
}
  table {
    border-collapse: collapse;
    width: 75%;
    margin-top: 5%;
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

.form1{
	top:10%;
	position:relative;
	left:12%;
}
.form12{
	top: 7.9%;
	position:fixed;
	left:90.6%;
}
.dt{
	position: fixed;
	background-color: solid black;
     margin-left: 90%;
}	
.back{
    background-color: #36445b;
    color:white;
     padding-top: 4px;
     padding-bottom: 6px;
     padding-right: 4px;
     padding-left: 4px;
}
	</style>
</head>
<body>
	<a class="back" href="front.php" style="text-decoration: none;" >&larr;</a><br>
	<center style="position: fixed; text-align: center;" ><h1>&nbsp>&nbsp>&nbsp>&nbsp>&nbsp>&nbsp  MedStar Pharmacy</h1></center>
	<?php
$date = date('d M y');
echo "<b><span  class='dt'><label>Date:</label>".$date."</span></b><br>";
?>
<hr style="margin-left: 91%;">
	<img src="pharmacy.jpg" width="118" height="118" style="position: fixed;" >
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
  $sql = "select * from pharmacy";
  $result = mysqli_query($conn, $sql);
  echo "<form class='form1' style='text-align:center;' action='removeDrug.php' method='get'><table><tr><th>Drug ID</th><th>Drug Name</th><th>Cost/Piece</th><th>Used_In</th><th>Type</th><th>Manufactured Date</th><th>Expiry Date</th><th>Quantity Available </th><th></th></tr>";
  while($row = mysqli_fetch_assoc($result)){
  	echo "<tr><td>".$row['mid']."</td><td>".$row['mname']."</td><td>".$row['mcost']."₹</td><td>".$row['use_in']."</td><td>".$row['type']."</td><td>".$row['manufactureDate']."</td><td>"
  	.$row['expiryDate']."</td><td>".$row['avlquantity']."</td><td><button type='submit' name='remove' class='button'  value='".$row['mid']."'>Discard</button></td></tr>";
  }
  echo "</table></form>";
?>
<button class="form12" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Drug</button>
<div id="id01" class="modal">
  <form class="modal-content animate" action='addDrug.php' method='get'>
  <div class="container">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

      <label for="addName"><b>Drug Name</b></label>
      <input type="text" placeholder="Enter Drug Name" name="addName" required>
           
      <label for="addCost"><b>Cost/Piece</b></label>
      <input type="text" placeholder="Enter Cost" name="addCost" required>

      <label for="addUse"><b>Used_In</b></label>
      <input type="text" placeholder="Enter Usage" name="addUse" required>

      <label for="addType"><b>Drug Type</b></label>
      <input type=radio name='addType' value="Liquid"> Liquid<input type=radio name='addType' value="Tablet"> Tablet
      <input type=radio name='addType' value="Capsules"> Capsules<input type=radio name='addType' value="Cream"> Cream
      <input type=radio name='addType' value="Drops"> Drops<input type=radio name='addType' value="Inhalers">Inhalers
      <input type=radio name='addType' value="Injections">Injections<input type=radio name='addType' value="Buccal "> Buccal <br><br>
      
       <label for="addavl"><b>Available Quantity</b></label>
      <input type="text" placeholder="Enter Quantity" name="addQuantity" required>

      <label for="addDate"><b>Manufactured Date</b></label><br>
      <input type="date" placeholder="Enter Manufactured Date" name="addmDate" required>  <br>

      <label for="addDate"><b>Expiry Date</b></label><br>
      <input type="date" placeholder="Enter Expiry Date" name="addeDate" required>  

       <button type="submit" class="button" >Add</button> 
    </div>
  </form>
</div>
</body>
<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>