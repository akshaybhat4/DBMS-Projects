
<!DOCTYPE html>
<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text] {
    width: 100%;
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
    .cancelbtn {
       width: 100%;
    }
}
.button {
    background-color: #ddd;
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
    background-color: #f1f1f1;
}
table {
    border-collapse: collapse;
    width: 70%;
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
 a {
    text-decoration: none;
    display: inline-block;
    padding: 7px 14px;
}


a:hover {
    background-color:#ddd;
    color: black;
}
   .previous {
    background-color: #36445b;
    color:white;
}
.form1{
    
    margin-top:0%;
    position:relative;
    left:15%;
}
.form{
    top: 10.9%;
    position:fixed;
    left:90.6%;
}
</style>
</head>
<body style="background-image:url('dctr.jpg'); background-repeat: no-repeat;">
   <center><h1 style="padding: 8px 16px; background-color: #322dbc;color: white; position: none;">Our Doctors</h1></center> 
	<a href="front.php" class="previous">&laquo; HOME</a>
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
     $sql = "select * from doctor;";
     $result = mysqli_query($conn, $sql);
     echo "<form class='form1' style='text-align:center;' action='removeDoctor.php' method='get'><table><tr><th>Doctor ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Qualification</th><th>Phone No.</th><th>Specialist In</th><th></th></tr>";
     while ($row = mysqli_fetch_assoc($result)) {
     	echo "<tr><td>".$row['did']."</td><td>".$row['dname']."</td><td>".$row['dage']."</td><td>".$row['dsex']."</td><td>".$row['dqualification']."</td><td>".$row['dphno']."</td><td>".$row['specialisation']."</td><td><button  type='submit' name='remove' class='button'  value='".$row['did']."'>Remove</button></td></tr>";
     }
     echo "</table></form>";
?>
	<button class="form" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Doctor</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action='addDoctor.php' method='get'>

    <div class="container">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

      <label for="addName"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="addName" required>
           
      <label for="addAge"><b>Age</b></label>
      <input type="text" placeholder="Enter Age" name="addAge" required>

      <label for="addSex"><b>Gender</b></label>
      <input type=radio name='addSex' value="m"> Male<input type=radio name='addSex' value="f"> Female<br><br>

      <label for="addQualification"><b>Qualification</b></label>
      <input type="text" placeholder="Enter Qualification" name="addQualification" required>

      <label for="addPhone"><b>Phone NO.</b></label>
      <input type="text" placeholder="Enter Phone NO" name="addPhone" required>  

      <label for="adds"><b>Specialisation</b></label>
      <input type="text" placeholder="Enter Specialisation" name="adds" required>
       
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
</html>
