<!DOCTYPE html>
<html>
<head>
  <title>tester</title>
  <style type="text/css">
    body{
      background-color: lightblue;
    }
    input{
      width: 50%;
      height: 5%;
      border:1px;
      border-radius: 05px;
      padding: 8px 15px 8px 15px;
      margin: 10px 0px 15px 0px;
      box-shadow: 1px 1px 2px 1px grey;
    }
  </style>
</head>
<body>
<center>
  <h1>UPLOAD AND INSERT AN IMAGE</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <label>Choose an profile pic:</label>
     <input type="file" name="image" id="image"/><br>

     <label>enter username:</label>
     <input type="text"  name="username" placeholder="enter username" /><br>


     <input type="submit" name="upload" value="upload image and data" /><br>
  </form>
</center>
</body>
</html>
<?php 
  $connection=mysqli_connect("localhost","root","");
  $db=mysqli_select_db($connection,"logins");
  if (isset($_POST['upload'])) {
    $username=$_POST['username'];

    $query="UPDATE sdata SET img='$_POST[image]' WHERE uid=$username";
    $query_run=mysqli_query($connection,$query);
    if ($query_run) {
      echo '<script type="text/javascript"> alert ("Image profile updated")</script>';
    }
    else{
      echo '<script type="text/javascript"> alert ("Image profile not updated")</script>';
    }
  }
 ?>





