<?php
  $serverName="localhost";
  $userName="root";
  $password="";
  $dbName="hospital";

  $conn=mysqli_connect($serverName,$userName,$password,$dbName);

  if($conn){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    if ($user=="Akshay" and $pass=="1234") {
      session_start();
      $_SESSION['loginUser']=$user;
      header("Location:front.php");
    }
    else{
      $sql="select * from loginform where user='$user' and pass='$pass';";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)==0){
        echo "<script>alert('User ID or Password is incorrect!');</script>";
        header("refresh:0;url=login.php");
      }
      else{
        session_start();
        $row=mysqli_fetch_assoc($result);
        $_SESSION['loginUser']=$user;
        header("Location:front.php");
      }
    }
  }
  else{
    die("Connection is failed: ".mysqli_connect_error());
  }
?>