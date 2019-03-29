<!DOCTYPE html>
<html>
<head>
	<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color:rgba(0, 0, 0, 0.5);
}
* {
    box-sizing: border-box;
}
input[type=text] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #e5e7ea;
}
input[type=date] {
    width: 20%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #e5e7ea;
}
input[type=text]:focus {
    background-color: #ddd;
    outline: none;
}
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
.registerbtn:hover {
    opacity: 1;
}
.select {
    background:#e5e7ea;
    border: none;
    color: solid black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>
<a href="front.php" style="text-decoration: none; position: fixed; background-color:black; color: white;" class="previous">&laquo; HOME</a><br>
<form action="addprivatepatient.php" method="get">
  <div class="container">
    <h1>Private Patient Register</h1>
    <hr>
     <label for="addDate"><b>Date</b></label><br>
     <input type="date" placeholder="Enter  Date" name="addDate" required>
     <br>
    <label for="roomno"><b>Patient Room Number</b></label>
    <input type="text" placeholder="Enter Patient Room Number" name="addroomno" required>

    <label for="pname"><b>Patient Name</b></label>
    <input type="text" placeholder="Enter Patient Name" name="addname" required>

     <label for="page"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="addage" required>

    <label for="psex"><b>Gender</b></label>
     <input type=radio name='addsex' value="M"> Male<input type=radio name='addsex' value="F"> Female<br><br>

    <label for="pphno"><b>Phone NO.</b></label>
    <input type="text" placeholder="Enter Phone NO." name="addphone" required>

     <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="addaddress" required>

    <label for="reason"><b>Problem Description: </b></label>
    <input type="text" placeholder="Enter Patient Problem" name="addproblem" required>
     
    <button type="submit" class="registerbtn" name="submit" >Register</button>
  </div>
  </form>
</body>
</html>
