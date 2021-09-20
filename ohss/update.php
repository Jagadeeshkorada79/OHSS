<?php
session_start();
include 'db_con.php';
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  $userid=$_SESSION['username'];
?>
 <!DOCTYPE html>
 <html>
 <head>
  <title>update</title>
  <style>
    .avatar{
        vertical-align:middle;
        width:225px;
        height:225px;
        border-radius:50%;
        margin:auto;
        padding:20px;
    } 
    input{
  border-radius: 05px;
  padding: 8px 15px 8px 15px;
  margin: 0px 0px 0px 0px;
  box-shadow: 1px 1px 2px 1px grey;
  </style>
 </head>
 <body>
      <form method="post" action="" enctype="multipart/form-data">
  <h1 style="text-align: center;">STUDENT UPDATE FORM</h1>
   <div style="height: 630px; width: 60%; border:2px solid #365978; margin-top: 10px;margin-left: 350px;">
       <?php
 include 'db_con.php';
  $sql="SELECT * FROM sdata WHERE uid='$userid'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
      <div style="width: 60%; float: left;">
   <table style="margin-top: 40px; margin-left: 40px; height: 400px;">
    <tr class="tr2"><td style="margin-left: 10px;">NAME :</td><td><input type="text" name="uname" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uname'] ?>" readonly></td></tr>
      <tr class="tr2"><td>ID NO :</td><td><input type="text" name="uid" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uid'] ?>" readonly></td></tr>
      <tr class="tr2"><td>GENDER :</td><td><input type="text" name="ugender" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['ugender'] ?>"></td></tr>
      <tr class="tr2"><td>CASTE:</td><td><input type="text" name="ucaste" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['ucaste'] ?>"></td></tr>
      <tr class="tr2"><td>Status :</td><td><input type="text" name="status" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['status'] ?>"></td></tr>
      <tr class="tr2"><td>ROOM NO :</td><td><input type="text" name="uroom" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['uroom'] ?>"></td></tr>
      <tr class="tr2"><td>CLASS : </td><td><input type="text" name="class" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['class'] ?>"></td></tr>
      <tr class="tr2"><td>BRANCH : </td><td><input type="text" name="ubrnch" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['ubrnch'] ?>"></td></tr>
      <tr class="tr2"><td>MOBILE NUMBER :</td><td><input type="text" name="unum" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['unum'] ?>"></td></tr>
      <tr class="tr2"><td>CGPA : </td><td><input type="text" name="ucgpa" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['ucgpa'] ?>"></td></tr>
      <tr class="tr2"><td>PARENT NAME :</td><td><input type="text" name="upname" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['upname'] ?>"></td></tr>
      <tr class="tr2"><td>PARENT MOBILE NUMBER :</td><td><input type="text" name="upnum" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['upnum'] ?>"></td></tr>
      <tr class="tr2"><td>OTHER ROOM MATE IDS:</td><td> <input type="text" name="others" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['others'] ?>"></td></tr>
      <tr class="tr2"><td>Password:</td><td><input type="password" name="password" style="padding-right: 60px; margin-left: 3px;"></td></tr>
      <tr class="tr2"><td>Change Password:</td><td><input type="password" name="npassword" style="padding-right: 60px; margin-left: 3px;"></td></tr>
    </table>
      <center><button style="margin-top: 50px;margin-left: 280px;" name="update">Update</button></center>
    </div>
    <div style="width: 40%; float: left; margin-top: 10px;">
      <img src="uploads/<?php echo $row['img']; ?>" class="avatar">
           <?php
}
?>
      <input type="file" name="image"/>
    </div>
  </div>
</form>
<center><a href="student.php"><button>Go back</button></a></center>
</body>
</html>
<?php
include 'db_con.php';
 if (isset($_POST['update'])) {
  $id=$_POST['uid'];
  $uname=($_POST['uname']);
  $pass=($_POST['password']);
  $npass=($_POST['npassword']);
  $filename = $_FILES['image']['name'];
  $sql="UPDATE sdata SET uname='$_POST[uname]',unum='$_POST[unum]',status='$_POST[status]',uroom='$_POST[uroom]',class='$_POST[class]',ubrnch='$_POST[ubrnch]',ucgpa='$_POST[ucgpa]',upname='$_POST[upname]',upnum='$_POST[upnum]',others='$_POST[others]' WHERE uid='$id' ";
    $result=mysqli_query($conn,$sql);

    $sqlp="SELECT * FROM logs WHERE uid='$id'";

    $resultp=mysqli_query($conn,$sqlp);

    move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);

    $sqlu = "UPDATE sdata SET img ='$filename' WHERE uid = '$id' ";
    
    $resultu = mysqli_query($conn,$sqlu); 

    if (mysqli_num_rows($resultp) === 1) {

      $rows=mysqli_fetch_assoc($resultp);

      if ($rows['password'] === $pass) {
           $sqlU="UPDATE logs SET password='$npass' WHERE uid='$id' ";

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
else{
  echo '<script type="text/javascript">
    alert("INCORRECT OLD PASSWORD")</script>';
}
}
}
}
?>