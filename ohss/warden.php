<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  $usermail=$_SESSION['username'];
  include 'db_con.php';
  $sqlc="SELECT * FROM wdata WHERE uemail='$usermail'";
    $resultcf=mysqli_query($conn,$sqlc);
    $rowc=mysqli_fetch_array($resultcf);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    box-sizing: border-box
  }
body 
  {
    font-family: "Lato", sans-serif;
  }
  input{
  border-radius: 05px;
  padding: 8px 15px 8px 15px;
  margin: 0px 0px 0px 0px;
  box-shadow: 1px 1px 2px 1px grey;
  margin-left: 10px;
}
  .dropdown-content {
  display: none;
}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown {
  float: left;
}
.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: white;
  font-family: inherit;
  margin: 0;
}


.tab 
{
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 28.7%;
  height: 650px;
  margin-left: 10px;
  margin-top: 10px;
}
.h{
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 75%;
  margin-top: 20px;
  height: 32px;
}
.f{
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 20%;
  height: 92%;
}

.tab button 
{
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}
.h button{
  display: inline-block;
  background-color: inherit;
  color: black;
  padding: 5px 6px;
  width: 20%;
  border: none;
  outline: none;
  cursor: pointer;
  text-align: center;
  transition: 0.3s;
  font-size: 17px;
}
.f button{
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  border: none;
  width: 100%;
  outline: none;
  cursor: pointer;
  text-align: left;
  transition: 0.3s;
  font-size: 17px;
}
.hcontent .roomcontent{
  float: left;
  width: 78%;
  margin-top: 10px;
  border:1px solid black;
  margin-left: 10px;
  height: 530px;
}
.hcontent .roomcontenta{
  float: left;
  width: 78%;
  margin-top: 10px;
  border:1px solid black;
  margin-left: 10px;
  height: 530px;
}
.hcontent .roomcontentb{
  float: left;
  width: 78%;
  margin-top: 10px;
  border:1px solid black;
  margin-left: 10px;
  height: 530px;
}
.wi{
  float: left;
  width: 50%;
  padding-left: 200px;
}
.wc{
  float: left;
  width: 50%;
}
.tb2{
    border : 1px solid black;
    height: 210px;
    margin-top: 30px;
    border-radius: 10px;
  }

/* Change background color of buttons on hover */
.tab button:hover 
{
  background-color: #ddd;
}
.h button:hover
{
  background-color: #ddd;
}
.f button:hover
{
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active 
{
  background-color: #ccc;
}
.h button.active
{
  background-color: #ccc;
}
.f button.active
{
  background-color: #ccc;
}
/* Style the tab content */
.tabcontent 
{
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 650px;
  margin-top: 10px;
}
.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}
.ct{
  margin-left: 10px;
  margin-right: 10px;
}
.avatar{
        vertical-align:middle;
        width:225px;
        height:225px;
        border-radius:50%;
        margin:auto;
        padding:20px;
    } 

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}
.navbar input {
  float: left;
  padding: 10px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar input:hover {
  background-color: #000;
}
.title{
  font-size: 30px;
  font-style: bold;
}
.tb1{
  width:100%;
  margin-top: 10px;
}
.td1,.th1{
  border : 1px solid;
}
.th1{
  background-color: #dddddd;
}

.active {
  background-color: #4CAF50;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}
.modal-content {
  background-color: #fefefe;
  margin: 1% auto 1% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}
.modal-contenta{
  background-color: #fefefe;
  width: 80%;
  height: 90%;
  border: 1px solid black;
  margin-left: 120px;
  overflow-y: scroll;
}
.tr2{
  margin-top: 10px;
}
@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
  .navbar input{
    float: none;
    display: block;
  }
}

           .showLeft{
                    text-shadow: none !important;
                    color:#fff !important;
                    margin-top: 50px;
                    margin-right:20px;
                }

                .icons li {
                    background: none repeat scroll 0 0 #fff;
                    height: 5px;
                    width: 5px;
                    line-height: 0;
                    list-style: none outside none;
                    margin-right: 20px;
                    margin-top: 3px;
                    vertical-align: top;
                    border-radius:50%;
                    pointer-events: none;
                }

                .btn-left {
                    left: 0.1em;
                }

                .btn-right {
                    right: 0.2em;
                }

                .btn-left, .btn-right {
                    position:absolute;
                    top: 0.1em;
                }
                .dropbtna {
                    position: fixed;
                    color: black;
                    font-size: 16px;
                    cursor: pointer;
                }

                .dropdowna {
                    position: absolute;
                    display:block;
                    right: 0.2em;
                }

                .dropdown-contentx {
                    display: none;
                    position: relative;
                    margin-top: 60px;
                    width: 120px;
                    overflow: auto;
                    background-color: #555;
                    color: white;
                }

                .dropdown-contenta a {
                    color: black;
                    padding: 6px 16px;
                    text-decoration: none;
                    display: block;
                }

                .dropdowna a:hover {background-color: black;width: 100%;}

                .show {display:block;}

</style>
</head>
<body>
<center class="title">WARDEN</center>
<div class="container ct">
<div class="navbar">
  <a class="active" href="warden.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="about.php"><i class="fa fa-fw fa-question"></i>About</a>
  <a href="contact.php"><i class ="fa fa-fw fa-envelope"></i>Contact</a>
  <a class="link dim dark-gray f3 dib mr3 mr4-l" href="warden.php" style="margin-left: 600px">WELCOME <?php echo $rowc['uname']; ?> </a>
  <input type="search" placeholder="search...." style="margin-left:50px"><a><i class="fa fa-fw fa-search"></i></a>
  <div class="dropdowna">
                    <!-- three dots -->
                    <ul class="dropbtna icons btn-right showLeft" onclick="showDropdown()">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- menu -->
                    <div id="myDropdown" class="dropdown-contentx">
                        <a href="updatew.php">Update</a>
                        <a href="index.php">Logout</a>
                    </div>
                </div>
</div>
</div>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'cts')" id="defaultOpen">Complaints</button>
  <button class="tablinks" onclick="openCity(event, 'lo')">Leaves/Outing Request</button>
  <button class="tablinks" onclick="openCity(event, 'low')">Leaves/Outing Details</button>
  <button class="tablinks" onclick="openCity(event, 'no')">Notifications</button>
  <button class="tablinks" onclick="openCity(event, 'sd')">Student Details</button>
  <button class="tablinks" onclick="openCity(event, 'rd')">Room Details</button>
  <button class="tablinks" onclick="openCity(event, 'ri')">Rooms Information</button>
  <button class="tablinks" onclick="openCity(event, 'ct')">Care Taker</button>
  <button class="tablinks" onclick="openCity(event, 'sc')">Security</button>
</div>

<div id="cts" class="tabcontent" style="overflow-y: scroll;">
  <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1">Student id</th>
      <th class="th1">Complaint</th>
      <th class="th1">Upload date</th>
    </tr>
   <?php
     $query = "SELECT * from `compl` order by `id` DESC";
          $resultt=mysqli_query($conn,$query);
    while ($rowc=mysqli_fetch_array($resultt)){
                ?>
    <tr class="tr1">
      <td class="td1"><?php echo $rowc['id'] ?></td>
      <td class="td1"><?php echo $rowc['uid'] ?></td>
      <td class="td1"><a style ="
                         <?php
                            if($rowc['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " href="view1.php?id=<?php echo $rowc['id'] ?>"><?php echo $rowc['message'] ?></a></td>
      <td class="td1"><?php echo $rowc['date'] ?></td>
    </tr>
    <?php
                     }
                 
         ?>
  </table>
</div>

<div id="lo" class="tabcontent" style="overflow-y: scroll;">
  <table class="tb1">
    <tr class="tr1">
       <th class="th1">S.no</th>
       <th class="th1">ID no</th>
       <th class="th1">Reason</th>
       <th class="th1">Type</th>
       <th class="th1">Indate</th>
       <th class="th1">Outdate</th>
       <th class="th1">Action</th>
     </tr>
      <?php
                $query = "SELECT * from `outleave` where status='pending' order by `id` DESC";
               $result=mysqli_query($conn,$query);
    while ($rowt=mysqli_fetch_array($result)) {
                ?>
    <tr class="tr1" style="text-align: center;">
      <td class="td1"><?php echo $rowt['id'] ?></td>
      <td class="td1"><?php echo $rowt['uid']?></td>
      <td class="td1"><?php echo $rowt['reason']?></td>
      <td class="td1"><?php echo $rowt['type']?></td>
      <td class="td1"><?php echo $rowt['intime']?></td>
      <td class="td1"><?php echo $rowt['outtime']?></td>
     <td class="td1"> <a href="outleav1.php?id=<?php echo $rowt['id'] ?>"><button type="submit" name="Approved" class="btn btn-danger">Status</button></a></td>
    </tr>
    <?php
                     }
          
                     ?>
  </table>
</div>
<div id="low" class="tabcontent">
  <div style="width: 100%; height: 30px;"><div style="width: 20%;float: left;height: 10px;"><p style="font-style: bold;font-size:20px;margin-top: 30px;">Sort accordingly</p></div>
  <div style="width: 80%; float: left; margin-top: 30px;">
     <div id ="bt" class="dropdown">
    <button class="dropbtn">Choose 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <button class = "tl" onclick="openPage(event,'today')" id ="defaultOpend">Today</button>
      <button class="tl" onclick="openPage(event,'week')">This Week</button>
      <button class="tl" onclick="openPage(event,'month')">This Month</button>
      <button class="tl" onclick="openPage(event,'all')">All</button>  
  </div>
 </div>
  </div>
</div>
<div class="tc" id='today'>
 <div style="width: 100%; height: 30px;">
<?php
                $count = "SELECT * from `outleave` where status='Approved' && type='leave'";
               $count_run=mysqli_query($conn,$count);
                ?>
  <div style="width: 50%; float: left;"><p>Today no of leaves:<input type="text" name="le" value="<?php echo (mysqli_num_rows($count_run))?>"></p></div>
  <?php 
$countout = "SELECT * from `outleave` where  type='outing' && status='Approved'";
               $countout_run=mysqli_query($conn,$countout);
  ?>
  <div style="width: 50%; float: left;"><p>Today no of outings:<input type="text" name="out" value="<?php echo (mysqli_num_rows($countout_run))?>"></p></div>
</div>
<div style="margin-top: 60px;">
  <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1">ID no</th>
      <th class="th1">Type</th>
      <th class="th1">Approved date</th>
      <th class="th1">Approved by</th>
    </tr>
    <?php
                $query = "SELECT * from `outleave` where status='Approved' order by `id` DESC";
               $result=mysqli_query($conn,$query);
    while ($rowt=mysqli_fetch_array($result)) {
                ?>
    <tr class="tr1" style="text-align: center;">
      <td class="td1"><?php echo $rowt['id'] ?></td>
      <td class="td1"><?php echo $rowt['uid']?></td>
      <td class="td1"><?php echo $rowt['type']?></td>
      <td class="td1"><?php echo $rowt['sdate']?></td>
      <td class="td1"><?php echo $rowt['sby']?></td>
    </tr>
    <?php
                     }
          
            ?>
  </table>
</div>
</div>
<div class="tc" id='week'>

 <div style="width: 100%; height: 30px;">
  <?php
                $count = "SELECT * from `outleave` where status='Approved' && type='leave'";
               $count_run=mysqli_query($conn,$count);
                ?>
  <div style="width: 50%; float: left;"><p>This Week no of leaves:<input type="text" name="le" value="<?php echo (mysqli_num_rows($count_run))?>"></p></div>
   <?php 
$countout = "SELECT * from `outleave` where  type='outing' && status='Approved'";
               $countout_run=mysqli_query($conn,$countout);
  ?>
  <div style="width: 50%; float: left;"><p>This Week no of outings:<input type="text" name="out" value="<?php echo (mysqli_num_rows($countout_run))?>">></p></div>
</div>
<div style="margin-top: 60px;">
  <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1">ID no</th>
      <th class="th1">Approved date</th>
      <th class="th1">Approved by</th>
    </tr>
    <?php
                $query = "SELECT * from `outleave` where status='Approved' order by `id` DESC";
               $result=mysqli_query($conn,$query);
    while ($rowt=mysqli_fetch_array($result)) {
                ?>
    <tr class="tr1" style="text-align: center;">
      <td class="td1"><?php echo $rowt['id'] ?></td>
      <td class="td1"><?php echo $rowt['uid']?></td>
      <td class="td1"><?php echo $rowt['sdate']?></td>
      <td class="td1"><?php echo $rowt['sby']?></td>
    </tr>
    <?php
                     }
          
            ?>
  </table>
</div>
</div>
<div class="tc" id='month'>
 <div style="width: 100%; height: 30px;">
   <?php
                $count = "SELECT * from `outleave` where status='Approved' && type='leave'";
               $count_run=mysqli_query($conn,$count);
                ?>
  <div style="width: 50%; float: left;"><p>This Month no of leaves:<input type="text" name="le" value="<?php echo (mysqli_num_rows($count_run))?>"></p></div>
   <?php 
$countout = "SELECT * from `outleave` where  type='outing' && status='Approved'";
               $countout_run=mysqli_query($conn,$countout);
  ?>
  <div style="width: 50%; float: left;"><p>This Month no of outings:<input type="text" name="out" value="<?php echo (mysqli_num_rows($countout_run))?>">></p></div>
</div>
<div style="margin-top: 60px;">
  <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1">ID no</th>
      <th class="th1">Approved date</th>
      <th class="th1">Approved by</th>
    </tr>
    <?php
                $query = "SELECT * from `outleave` where status='Approved' order by `id` DESC";
               $result=mysqli_query($conn,$query);
    while ($rowt=mysqli_fetch_array($result)) {
                ?>
    <tr class="tr1" style="text-align: center;">
      <td class="td1"><?php echo $rowt['id'] ?></td>
      <td class="td1"><?php echo $rowt['uid']?></td>
      <td class="td1"><?php echo $rowt['sdate']?></td>
      <td class="td1"><?php echo $rowt['sby']?></td>
    </tr>
    <?php
                     }
          
            ?>
  </table>
</div>
</div>
<div class="tc" id='all'>
 <div style="width: 100%; height: 30px;">
   <?php
                $count = "SELECT * from `outleave` where status='Approved' && type='leave'";
               $count_run=mysqli_query($conn,$count);
                ?>
  <div style="width: 50%; float: left;"><p>Total no of leaves:<input type="text" name="le" value="<?php echo (mysqli_num_rows($count_run))?>"></p></div>
   <?php 
$countout = "SELECT * from `outleave` where  type='outing' && status='Approved'";
               $countout_run=mysqli_query($conn,$countout);
  ?>
  <div style="width: 50%; float: left;"><p>Total no of outings:<input type="text" name="out" value="<?php echo (mysqli_num_rows($countout_run))?>">></p></div>
</div>
<div style="margin-top: 60px;">
  <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1">ID no</th>
      <th class="th1">Approved date</th>
      <th class="th1">Approved by</th>
    </tr>
    <?php
                $query = "SELECT * from `outleave` where status='Approved' order by `id` DESC";
               $result=mysqli_query($conn,$query);
    while ($rowt=mysqli_fetch_array($result)) {
                ?>
    <tr class="tr1" style="text-align: center;">
      <td class="td1"><?php echo $rowt['id'] ?></td>
      <td class="td1"><?php echo $rowt['uid']?></td>
      <td class="td1"><?php echo $rowt['sdate']?></td>
      <td class="td1"><?php echo $rowt['sby']?></td>
    </tr>
    <?php
                     }
          
            ?>
  </table>
</div>
</div>
</div>
</div>

<div id="no" class="tabcontent">
  <div class="tablec" style="height: 600px; overflow-y: scroll;">
    <table class="tb1">
      <tr class="tr1">
        <th class="th1">S.no</th>
        <th class="th1">Notification</th>
        <th class="th1">Upload Date</th>
        <th class="th1">Uploaded By</th>
      </tr>
      <?php
                $query = "SELECT * from `notification` order by `udate` DESC";
               $result=mysqli_query($conn,$query);
    while ($rowt=mysqli_fetch_array($result)) {
                ?>
    <tr class="tr1" style="text-align: center;">
      <td class="td1"><?php echo $rowt['id'] ?></td>
      <td class="td1"><?php echo $rowt['notification']?></td>
      <td class="td1"><?php echo $rowt['udate']?></td>
      <td class="td1"><?php echo $rowt['uby']?></td>
    </tr>
    <?php
                     }
          
                     ?>
    </table>
  </div>
  <div><center><button onclick="document.getElementById('id1').style.display='block'">post</button></center>
</div>
<div id="id1" class="modal">
   <div class="modal-content animate" style="border: 5px solid green;">
    <form action="" method="post">
      <p> Post Notification Details</p>
      <textarea style="width: 80%; height: 100px; margin-left: 50px;" name="nitification"></textarea><br><br>
      <button type="submit" style="margin-left: 250px; margin-bottom: 10px;" name="notify">Submit</button>
    </form>
    <?php
    include_once 'db_con.php';
    if(isset($_POST['notify'])){
      $notifi=$_POST['nitification'];
      $note="INSERT INTO `notification`(`id`, `notification`, `udate`, `uby`) VALUES (NULL,'$notifi',CURRENT_TIMESTAMP,'warden')";
      $note_run=mysqli_query($conn,$note);
    }
    ?>
  </div>
  </div>
</div>
<div id="sd" class="tabcontent" style="overflow-y: scroll;">
   <form action="" method="post">
    <input type="search" name="uid" placeholder="Enter Student Id.." style="height: 30px; width:90%; margin-top: 10px; margin-left: 10px;">
 <button type="submit" name="search" > <i class="fa fa-fw fa-search"></i></button>
 <div>
        <?php
include 'db_con.php';
if (isset($_POST['search'])) {
  $id=$_POST['uid'];
  $sql="SELECT * FROM sdata WHERE uid='$id'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
      <div style="width: 60%; float: left; margin-top: 30px;">
      <table style="margin-top: 40px; margin-left: 40px; height: 400px;">
    <tr class="tr2"><td><td style="margin-left: 10px;">NAME :</td><td><input type="text" name="uname" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uname'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>ID NO :</td><td><input type="text" name="uid" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uid'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>GENDER :</td><td><input type="text" name="uid" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['ugender'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>CASTE:</td><td><input type="text" name="uid" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['ucaste'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>Status :</td><td><input type="text" name="status" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['status'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>ROOM NO :</td><td><input type="text" name="uroom" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['uroom'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>CLASS : </td><td><input type="text" name="class" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['class'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>BRANCH : </td><td><input type="text" name="ubrnch" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['ubrnch'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>MOBILE NUMBER :</td><td><input type="text" name="unum" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['unum'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>CGPA : </td><td><input type="text" name="ucgpa" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['ucgpa'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>PARENT NAME :</td><td><input type="text" name="upname" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['upname'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>PARENT MOBILE NUMBER :</td><td><input type="text" name="upnum" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['upnum'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>OTHER ROOM MATE IDS:</td><td> <input type="text" name="others" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['others'] ?>"></td></tr>
    </table>
  </div>
  <div style="width: 40%;float: right;">
            <img src="uploads/<?php echo $row['img']; ?>" class="avatar"/>
    </div>
     <?php
    }
}
?>
  </div>
  </form>
</div>

<div id="rd" class="tabcontent">
  <div style="float: left; width: 25%;height:32px;"><h3>CHOOSE THE HOSTEL</h3></div>
  <div class="h">
    <button class="hl" onclick="opena(event,'i3')" id="r">I2</button>
    <button class="hl" onclick="opena(event,'i1')">I1</button>
    <button class="hl" onclick="opena(event,'k4')">K4</button>
  </div>
  <div class="hcontent" id="i3">
  <div class="f" style="margin-top: 10px;">
    <button onclick="openb(event,'ff')" class="rl" id="rc">First floor</button>
    <button onclick="openb(event,'sf')" class="rl">Second floor</button>
    <button onclick="openb(event,'tf')" class="rl">Third floor</button>
    <button onclick="openb(event,'upd')" class="rl">Update</button>
  </div>
  <div class="roomcontent" id="ff">
    <h1>I2 FirstFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table>
  </div>
  <div class="roomcontent" id="sf">
    <h1>I2 SecondFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table>
  </div>
  <div class="roomcontent" id="tf">
    <h1>I2 ThirdFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table>
  </div>
  <div class="roomcontent" id="upd">
    <h1>I2 Room Update Details</h1>
    <form method="post"  action="">
    <input type="search" name="uid" placeholder="Enter Student Id.." style="height: 30px; width:90%; margin-top: 10px; margin-left: 10px;">
 <button type="submit" name="sea" > <i class="fa fa-fw fa-search"></i></button>
 <?php
include 'db_con.php';
if (isset($_POST['sea'])) {
  $uid=$_POST['uid'];
  $sql="SELECT * FROM sdata WHERE uid='$uid'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
    <table style="margin-top: 5px; margin-left: 40px; height: 400px;">
      <tr>
        <td>STUDENT ID:</td>
        <td><input type="text" name="uid" style=" margin-left: 3px;" value="<?php echo $row['uid'] ?>" ></td>
      </tr>
      <tr>
        <td>ALLOCATE ROOM:</td>
        <td><input type="text" name="room" style=" margin-left: 3px;" value="<?php echo $row['uroom'] ?>"></td>
      </tr>
    </table>
    <center><input type="submit" name="uprom" value="UPDATE"></center>
    <?php
include 'db_con.php';
 if (isset($_POST['uprom'])) {
  $id=$_POST['uid']; 
  $sql="UPDATE sdata SET uroom='$_POST[room]' WHERE uid='$id' ";
  $sql_run=mysqli_query($conn,$sql);
}
?>
     <?php
    }
}
?>
</form>
  </div>
</div>
<div class="hcontent" id="i1">
  <div class="f" style="margin-top: 10px;">
    <button onclick="openc(event,'ff1')" class="rla" id="rc1">First floor</button>
    <button onclick="openc(event,'sf1')" class="rla">Second floor</button>
    <button onclick="openc(event,'tf1')" class="rla">Third floor</button>
    <button onclick="openc(event,'upd1')" class="rla">Update</button>
  </div>
  <div class="roomcontenta" id="ff1">
    <h1>I1 FirstFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table></div>
  <div class="roomcontenta" id="sf1">
    <h1>I1 SecondFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table>
  </div>
  <div class="roomcontenta" id="tf1">
     <h1>I1 ThirdFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table>
  </div>
  <div class="roomcontenta" id="upd1">
    <h1>I1 Room Update Details</h1>
   <form method="post"  action="">
    <input type="search" name="uid" placeholder="Enter Student Id.." style="height: 30px; width:90%; margin-top: 10px; margin-left: 10px;">
 <button type="submit" name="sea" > <i class="fa fa-fw fa-search"></i></button>
 <?php
include 'db_con.php';
if (isset($_POST['sea'])) {
  $uid=$_POST['uid'];
  $sql="SELECT * FROM sdata WHERE uid='$uid'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
    <table style="margin-top: 5px; margin-left: 40px; height: 400px;">
      <tr>
        <td>STUDENT ID:</td>
        <td><input type="text" name="uid" style=" margin-left: 3px;" value="<?php echo $row['uid'] ?>" ></td>
      </tr>
      <tr>
        <td>ALLOCATE ROOM:</td>
        <td><input type="text" name="room" style=" margin-left: 3px;" value="<?php echo $row['uroom'] ?>"></td>
      </tr>
    </table>
    <center><input type="submit" name="uprom" value="UPDATE"></center>
    <?php
include 'db_con.php';
 if (isset($_POST['uprom'])) {
  $id=$_POST['uid']; 
  $sql="UPDATE sdata SET uroom='$_POST[room]' WHERE uid='$id' ";
  $sql_run=mysqli_query($conn,$sql);
}
?>
     <?php
    }
}
?>
</form>
  </div>
</div>
<div class="hcontent" id="k4">
  <div class="f" style="margin-top: 10px;">
    <button onclick="opend(event,'ff2')" class="rlb" id="rc2">First floor</button>
    <button onclick="opend(event,'sf2')" class="rlb">Second floor</button>
    <button onclick="opend(event,'tf2')" class="rlb">Third floor</button>
    <button onclick="opend(event,'upd2')" class="rlb">Update</button>
  </div>
  <div class="roomcontentb" id="ff2">
    <h1>K4 FirstFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table></div>
  <div class="roomcontentb" id="sf2">
    <h1>K4 SecondFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table>
  </div>
  <div class="roomcontentb" id="tf2">
     <h1>K4 ThirdFloor Room Details</h1>
    <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
      <tr>
        <td>Fully allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Partially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
      <tr>
        <td>Unpartially allocated rooms:</td>
        <td><input type="text" name="allocated" style="padding-right: 60px; margin-left: 3px;"></td>
      </tr>
    </table>
  </div>
  <div class="roomcontentb" id="upd2">
   <h1>K4 Room Update Details</h1>
   <form method="post"  action="">
    <input type="search" name="uid" placeholder="Enter Student Id.." style="height: 30px; width:90%; margin-top: 10px; margin-left: 10px;">
 <button type="submit" name="sea" > <i class="fa fa-fw fa-search"></i></button>
 <?php
include 'db_con.php';
if (isset($_POST['sea'])) {
  $uid=$_POST['uid'];
  $sql="SELECT * FROM sdata WHERE uid='$uid'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
    <table style="margin-top: 5px; margin-left: 40px; height: 400px;">
      <tr>
        <td>STUDENT ID:</td>
        <td><input type="text" name="uid" style=" margin-left: 3px;" value="<?php echo $row['uid'] ?>" ></td>
      </tr>
      <tr>
        <td>ALLOCATE ROOM:</td>
        <td><input type="text" name="room" style=" margin-left: 3px;" value="<?php echo $row['uroom'] ?>"></td>
      </tr>
    </table>
    <center><input type="submit" name="uprom" value="UPDATE"></center>
    <?php
include 'db_con.php';
 if (isset($_POST['uprom'])) {
  $id=$_POST['uid']; 
  $sql="UPDATE sdata SET uroom='$_POST[room]' WHERE uid='$id' ";
  $sql_run=mysqli_query($conn,$sql);
}
?>
     <?php
    }
}
?>
</form>
  </div>
</div>
</div>
<div id="ri" class="tabcontent" style="overflow-y: scroll;">
  <form action="" method="post">
    <input type="search" name="uroom" placeholder="Please enter room number in the format of TF-60 or TF-59B" style="height: 30px; width:90%; margin-top: 10px; margin-left: 10px;">
 <button type="submit" name="rsearch" > <i class="fa fa-fw fa-search"></i></button>
 <div>
        <?php
include 'db_con.php';
if (isset($_POST['rsearch'])) {
  $uroom=$_POST['uroom'];
  $sql="SELECT * FROM sdata WHERE uroom='$uroom'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
      <div style="width: 60%; float: left; margin-top: 30px;">
      <table style="margin-top: 40px; margin-left: 40px; height: 400px;">
    <tr class="tr2"><td><td style="margin-left: 10px;">NAME :</td><td><input type="text" name="uname" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uname'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>ID NO :</td><td><input type="text" name="uid" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uid'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>GENDER :</td><td><input type="text" name="uid" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['ugender'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>CASTE:</td><td><input type="text" name="uid" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['ucaste'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>Status :</td><td><input type="text" name="status" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['status'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>ROOM NO :</td><td><input type="text" name="uroom" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['uroom'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>CLASS : </td><td><input type="text" name="class" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['class'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>BRANCH : </td><td><input type="text" name="ubrnch" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['ubrnch'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>MOBILE NUMBER :</td><td><input type="text" name="unum" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['unum'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>CGPA : </td><td><input type="text" name="ucgpa" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['ucgpa'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>PARENT NAME :</td><td><input type="text" name="upname" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['upname'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>PARENT MOBILE NUMBER :</td><td><input type="text" name="upnum" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['upnum'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>OTHER ROOM MATE IDS:</td><td> <input type="text" name="others" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $row['others'] ?>"></td></tr>
    </table>
  </div>
  <div style="width: 40%;float: right;">
            <img src="uploads/<?php echo $row['img']; ?>" class="avatar"/>
    </div>
     <?php
    }
}
?>
  </div>
  </form>
</div>
<div id="ct" class="tabcontent" style="overflow-y: scroll;">
 <form action="" method="post">
  <div style=" height:800px; width: 100%;  margin-top: 5px">
    <div >
       <?php
 include 'db_con.php';
  $sql="SELECT * FROM ctdata order by ushift";
    $result=mysqli_query($conn,$sql);
    while ($rowt=mysqli_fetch_array($result)) {
      ?>
      <div style="width: 60%; float: left;" class="tb2">
   <table class="tabley" style="margin-left: 30px; margin-top: 30px;">
    <tr class="tr2"><td style="margin-left: 10px;">NAME :</td><td><input type="text" name="uname" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $rowt['uname'] ?>"></td></tr>
      <tr class="tr2"><td>MOBILE NUMBER :</td><td><input type="text" name="unum" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $rowt['unum'] ?>"></td></tr>
      <tr class="tr2"><td>EMAIL ID :</td><td><input type="text" name="umail" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $rowt['uemail'] ?>"></td></tr>
      <tr class="tr2"><td>SHIFT : </td><td><input type="text" name="ushift" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $rowt['ushift'] ?>"></td></tr>
    </table>
  </div>
  <div style ="width: 40%;float: left;">
    <img src="uploads/<?php echo $rowt['img']; ?>" class="avatar"/>
  </div>
     <?php
}
?>
</div>
</div>
</form>
</div>
<div id="sc" class="tabcontent" style="overflow-y: scroll;">
   <form action="" method="post">
  <div style=" height:800px; width: 100%;  margin-top: 5px">
    <div >
       <?php
 include 'db_con.php';
  $sql="SELECT * FROM sedata order by ushift";
    $result=mysqli_query($conn,$sql);
    while ($rowt=mysqli_fetch_array($result)) {
      ?>
      <div style="width: 60%; float: left;" class="tb2">
   <table style="margin-left: 30px; margin-top: 35px;">
    <tr class="tr2"><td style="margin-left: 10px;">NAME :</td><td><input type="text" name="uname" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $rowt['uname'] ?>"></td></tr>
      <tr class="tr2"><td>MOBILE NUMBER :</td><td><input type="text" name="unum" style="padding-right: 60px; margin-left: 3px;"value="<?php echo $rowt['unum'] ?>"></td></tr>
      <tr class="tr2"><td>EMAIL ID :</td><td><input type="text" name="umail" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $rowt['uemail'] ?>"></td></tr>
    </table></div>
    <div style ="width: 40%;float: left;">
      <img src="uploads/<?php echo $rowt['img']; ?>" class="avatar"/>
  </div>
     <?php
}
?>
</div>
</div>
</form>  
  </div>

<script>

   var m = document.getElementById('id1');
   var ma= document.getElementById('id2');
   window.onclick=function(event){
    if(event.target==m){
       m.style.display="none";
    }
    if(event.target==ma){
      ma.style.display="none";
    }
    if (!event.target.matches('.dropbtna')) {
                        var dropdowns = document.getElementsByClassName("dropdown-contentx");
                        var w;
                        for (w = 0; w < dropdowns.length; w++) {
                            var openDropdown = dropdowns[w];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
   }

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) 
  {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) 
  {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

function openb(evt, rname) {
  var j, tc, tl;
  tc = document.getElementsByClassName("roomcontent");
  for (j = 0; j < tc.length; j++) 
  {
    tc[j].style.display = "none";
  }
  tl = document.getElementsByClassName("rl");
  for (j = 0; j < tl.length; j++) 
  {
    tl[j].className = tl[j].className.replace(" active", "");
  }
  document.getElementById(rname).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("rc").click();

function openc(evt, rnamea) {
  var y, tca, tla;
  tca = document.getElementsByClassName("roomcontenta");
  for (y = 0; y < tca.length; y++) 
  {
    tca[y].style.display = "none";
  }
  tla = document.getElementsByClassName("rla");
  for (y = 0; y < tla.length; y++) 
  {
    tla[y].className = tla[y].className.replace(" active", "");
  }
  document.getElementById(rnamea).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("rc1").click();
function opend(evt, rnameb) {
  var z, tcb, tlb;
  tcb = document.getElementsByClassName("roomcontentb");
  for (z = 0; z < tcb.length; z++) 
  {
    tcb[z].style.display = "none";
  }
  tlb = document.getElementsByClassName("rlb");
  for (z = 0; z < tlb.length; z++) 
  {
    tlb[z].className = tlb[z].className.replace(" active", "");
  }
  document.getElementById(rnameb).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("rc2").click();

function opena(evt, rce) {
  var k, rc, rl;
  rc = document.getElementsByClassName("hcontent");
  for (k = 0; k < rc.length; k++) 
  {
    rc[k].style.display = "none";
  }
  rl = document.getElementsByClassName("hl");
  for (k = 0; k < rl.length; k++) 
  {
    rl[k].className = rl[k].className.replace(" active", "");
  }
  document.getElementById(rce).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("r").click();
  function showDropdown() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }




</script>
    <script>
function openPage(evt, optionName) {
  var j, tc, tl;
  tc = document.getElementsByClassName("tc");
  for (j = 0; j < tc.length; j++) {
    tc[j].style.display = "none";
  }
  tl = document.getElementsByClassName("tl");
  for (j = 0; j < tl.length; j++) {
    tl[j].className = tl[j].className.replace(" active", "");
  }
  document.getElementById(optionName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpend").click();
</script>
</body>
</html> 
<?php
}
?> 
