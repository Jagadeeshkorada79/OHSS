 <?php
session_start();
include 'db_con.php';
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  $userid=$_SESSION['username'];
?>
 <!DOCTYPE html>
 <html>
 <head>
  <style>
    .avatar{
        vertical-align:middle;
        width:200px;
        height:200px;
        border-radius:50%;
        margin:auto;
        padding:20px;
    } 
    input{
  border-radius: 05px;
  padding: 8px 15px 8px 15px;
  margin: 0px 0px 0px 0px;
  box-shadow: 1px 1px 2px 1px grey;
}
  </style>
 </head>
 <body>
    <form method="post" action="" enctype="multipart/form-data">
  <h1 style="text-align: center;">SECURITY UPDATE FORM</h1>
 <div style="height: 630px; width: 60%; border:2px solid #365978; margin-top: 10px;margin-left: 350px;">
  <?php
 include 'db_con.php';
  $sql="SELECT * FROM sedata WHERE uemail='$userid'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
      <div style="width: 60%; float: left;">
  <table style="margin-top: 40px; margin-left: 40px; height: 400px;">
    <tr class="tr2"><td>NAME :</td><td><input type="text" name="uname" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uname'] ?>"></td></tr>
      <tr class="tr2"><td>MOBILE NUMBER :</td><td><input type="text" name="unum" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['unum'] ?>"></td></tr>
      <tr class="tr2"><td>EMAIL :</td><td><input type="text" name="uemail" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uemail'] ?>"></td></tr>
      <tr class="tr2"><td>SHIFT :</td><td><input type="text" name="ushift" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['ushift'] ?>"></td></tr>
      <tr class="tr2"><td>Password:</td><td><input type="password" name="password" style="padding-right: 60px; margin-left: 3px;"></td></tr>
      <tr class="tr2"><td>Change Password:</td><td><input type="password" name="npassword" style="padding-right: 60px; margin-left: 3px;"></td></tr>
  </table>
   <center><button style="margin-top: 50px;margin-left: 280px;" name="update">Update</button></center>
</div>
  <div style="width:40%; float: left; margin-top: 10px;"><img src="uploads/<?php echo $row['img']; ?>" class="avatar">
  <input type="file" name="image"/></div>
</div>
   <?php
}
?>
</form>
<center><a href="security.php"><button>Go back</button></a></center>
</body>
</html>
<?php
include 'db_con.php';
 if (isset($_POST['update'])) {
  $id=$_POST['uemail'];
  $uname=($_POST['uname']);
  $pass=($_POST['password']);
  $npass=($_POST['npassword']);
  $filename = $_FILES['image']['name'];
  $sql="UPDATE sedata SET uname='$_POST[uname]',unum='$_POST[unum]',ushift='$_POST[ushift]' WHERE uemail='$id' ";
    $result=mysqli_query($conn,$sql);

    $sqlp="SELECT * FROM logse WHERE umail='$id'";

    $resultp=mysqli_query($conn,$sqlp);
    move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);

    $sqlu = "UPDATE sedata SET img ='$filename' WHERE uemail = '$id' ";
    
    $resultu = mysqli_query($conn,$sqlu);

    if (mysqli_num_rows($resultp) === 1) {

      $rows=mysqli_fetch_assoc($resultp);

      if ($rows['password'] === $pass) {
           $sqlU="UPDATE logse SET password='$npass' WHERE umail='$id' ";

    $resultU=mysqli_query($conn,$sqlU);

    if($result && $resultU )
  {
    echo '<script type="text/javascript">
    alert("DATABASE UPDATED")</script>';
  }
  else{
    echo '<script type="text/javascript">
    alert("DATABASE NOT UPDATED")</script>';
  }
}
}
}
}
?>