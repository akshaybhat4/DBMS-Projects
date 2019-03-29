<?php
  session_start(); 
  if(!isset($_SESSION['loginUser'])){
    header("Location:logout.php");
  }
?>
<!DOCTYPE html>
<html>

<style>


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

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display:none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 110px;
    border-radius: 8px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    margin-left: 10px;
}

.dropdown-content a {
    color: black;
    padding: 10px 10px;
   
    text-decoration: none;
    display: block;

}
.logout{
  margin-left: 95%;
  background-color: black;
  color:white;
}


.button:hover {
    background-color: #f1f1f1;
}
.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}	

</style>
<head>

	<title></title>
</head>
	<body style="background-image:url('frontpage.jpg'); background-size: cover;">	
    <button class="logout" onclick="location.href='logout.php'">Logout</button>

		<h1 style="font-family:Garamond;">Hospital Management System</h1>
		<div>
			<button onclick="location.href='doctorconnection.php';" class="button">Doctor</button>
			<button onclick="location.href='nurseconnect.php';" class="button">Nurse</button>
			<div class="dropdown">
               <button class="button">Add Patient</button>
                   <div class="dropdown-content">
                       <a style="border-bottom: 0.1px solid #7f8184;" href="genpatient.php">General Ward</a>
                       <a href="pripatient.php">Private Ward</a>
                   </div>
               </div>
 			<div class="dropdown">
               <button class="button">View Patient</button>
                   <div class="dropdown-content">
                       <a style="border-bottom: 0.1px solid #7f8184;" href="viewgeneral.php">General Ward</a>
                       <a href="viewprivatepatient.php">Private Ward</a>
                   </div>
               </div>
			<button class="button" onclick="location.href='Pharmacy.php';">Pharmacy</button>
            <button onclick="location.href='billing.php';" class="button">Accountant</button>
			<a href="contact.html"><button class="button">Contact Us</button></a>
			<a href="about.html"><button class="button">About Us</button></a>
		</div>

</body>
</html>