<!DOCTYPE html>
<html>
<head>
  <title>forgot</title>
  <meta charset="utf-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
      body{
        color:black;
      }
      .login-box{
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  border-bottom-color: green;
  }
  .login-box h1{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
 }
 .textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
 }
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
 }
 .textbox input{
  border: none;
  outline: none;
  background: none;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.btn{
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: black;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
      
    </style>
<body>
  <form action="forgot.php" method="POST">
    <div class="login-box">
  <h1>Reset Password</h1>
  <div class="textbox">
    <i class="fa fa-user"></i>
    <input type="text" name="uname" placeholder=" Enter Username">
  </div>

  <div class="textbox">
    <i class="fa fa-lock"></i>
    <input type="password"  name="password" placeholder="Enter New Password">
  </div>
  <div class="textbox">
    <i class="fa fa-lock"></i>
    <input type="password"  name="cpassword" placeholder="Conform New Password">
  </div>
  <input type="submit" class="btn" value="Submit" name="update">
  <div class="pass">
<a href="index.php">Home</a></div>
</div>
</div>
  </form>
</body>
</html>
<?php
include 'db_con.php';
if (isset($_POST['update'])) {
  $uname=($_POST['uname']);
  $pass=($_POST['password']);
  $cpass=($_POST['cpassword']);
    if (empty($uname)) {
    echo '<script type="text/javascript">
    alert("username reqried ")</script>';
  }elseif (empty($pass)) {
    echo '<script type="text/javascript">
    alert("password reqried")</script>';
  }
  elseif (empty($cpass)) {
    echo '<script type="text/javascript">
    alert(" confirm password reqried")</script>';
  }else{

    $sql="SELECT * FROM logs WHERE username='$uname'";

    $result=mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) === 1) {

      $row=mysqli_fetch_assoc($result);

      if ($row['username'] === $uname) {
          if ($pass===$cpass) {
           $sql="UPDATE logs SET password='$pass' WHERE username='$uname' ";

    $result=mysqli_query($conn,$sql);

    if($result )
  {
    echo '<script type="text/javascript">
    alert("DATABASE UPDATED")</script>';
  }
  else{
    echo '<script type="text/javascript">
    alert("DATABASE NOT UPDATED")</script>';
  }}
  else{
    echo '<script type="text/javascript">
    alert("confirm password not match")</script>';
          }
      }else{
        echo '<script type="text/javascript">
    alert("Inncorrect Username")</script>';
    }
      
    }else{
     echo '<script type="text/javascript">
    alert("Inncorrect Username")</script>';
    } 
}
}
?>