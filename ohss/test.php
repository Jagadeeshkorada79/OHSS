<?php
session_start();
include 'db_con.php';
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  $userid=$_SESSION['username'];
?>
<!DOCTYPE html> 
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

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
.tablez{
  height: 200px;
  overflow-y: scroll;
}
.tablec{
  overflow-y: scroll;
  height: 250px;
}
.tb1{
  width:100%;
  margin-top: 10px;
}
.td1,.th1{
  border : 1px solid;
}
.td1{
  text-align: center;
}
.th1{
  background-color: #dddddd;
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


.active {
  background-color: #4CAF50;
}

* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 28.7%;
  height:650px;
  margin-left: 10px;
  margin-top: 10px;
}
.title{
  font-size: 30px;
  font-style: bold;
}

/* Style the buttons inside the tab */
.tab button {
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

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 650px;
  margin-top: 10px;
}
#bt{
  width: 100%;
}
#h2{
  width: 50%;
}

.tc{
  width :100%;
  float: left;
}

.lo{
  display: block;
  font-size: 1.5em;
  font-weight: bold;
}
.lof{
  border: 1px solid black;
  margin-top: 10px;
  background-color: #1111;
  border-radius: 5px;
  margin-right: 270px;
  margin-left: 270px;
}
textarea{
   width:100%;
   height: 150px;
   background-color:#f8f8f8;
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
.avatar{
        vertical-align:middle;
        width:225px;
        height:225px;
        border-radius:50%;
        margin:auto;
        padding:20px;
    } 
  .tb2{
    border : 1px solid black;
    height: 210px;
    margin-top: 30px;
    border-radius: 10px;
  }

input{
  border-radius: 05px;
  padding: 8px 15px 8px 15px;
  margin: 0px 0px 0px 0px;
  box-shadow: 1px 1px 2px 1px grey;
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
<body>
<center class="title">STUDENT</center>
<div class="container ct">
<div class="navbar">
  <a class="active" href="student.php?<?php echo $_SESSION['id'] ?>"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="about.php"><i class="fa fa-fw fa-question"></i>About</a>
  <a href="contact.php"><i class ="fa fa-fw fa-envelope"></i>Contact</a>
  <input type="text" placeholder="search...." style="margin-left:800px"><a><i class="fa fa-fw fa-search"></i></a>
  <div class="dropdowna">
                    <!-- three dots -->
                    <ul class="dropbtna icons btn-right showLeft" onclick="showDropdown()">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- menu -->
                    <div id="myDropdown" class="dropdown-contentx">
                        <a href="test.php">Update</a>
                        <a href="index.php">Logout</a>
                    </div>
                </div>
</div>
</div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event,'myprofile')" id="defaultOpen">Myprofile</button>
  <button class="tablinks" onclick="openCity(event, 'Complaints')">Complaints</button>
  <button class="tablinks" onclick="openCity(event, 'LeavesOutings')">Leaves/Outings</button>
  <button class="tablinks" onclick="openCity(event, 'Notifications')">Notifications</button>
  <button class="tablinks" onclick="openCity(event, 'Warden')">Warden</button>
  <button class="tablinks" onclick="openCity(event, 'Care taker')">Care taker</button>
</div>
<div id = "myprofile" class = "tabcontent">
  <form action="" method="post">
  <div style=" height:800px; width: 100%;  margin-top: 5px">
    <div style="width: 100%; float: left;border:2px solid #365978;">
       <?php
 include 'db_con.php';
  $sql="SELECT * FROM sdata WHERE uid='$userid'";
    $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_array($result)) {
      ?>
   <table style="margin-top: 15px; margin-left: 40px; height: 400px;">
    <tr class="tr2"><td><img src="ia.jpg" class="avatar"></td><td style="margin-left: 10px;">NAME :</td><td><input type="text" name="uname" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uname'] ?>"></td></tr>
      <tr class="tr2"><td></td><td>ID NO :</td><td><input type="text" name="uid" style="padding-right: 60px; margin-left: 3px;" value="<?php echo $row['uid'] ?>"></td></tr>
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
     <?php
}
?>
</div>
</div>
</form>
</div>
<div id="Complaints" class="tabcontent">
  <h2 id="h2">Raise a complaint to......</h2>
  <div id ="bt" class="dropdown">
    <button class="dropbtn">Choose 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <button onclick="openPage(event,'Cheifwarden')" id ="defaultOpend" class = "tl">Cheif warden</button>
      <button onclick="openPage(event,'warden')" class="tl" >Warden</button>
      <button onclick="openPage(event,'Care-taker')" class="tl">Care taker</button>  
  </div>
  <div class="tc" id="Cheifwarden">
  <p>Type your complaint</p>
  <br>
  <form action="" method="post">
    <textarea name="message">Respected Cheif warden,</textarea>
  <center><input type="submit"  name="submit" value="SUBMIT"></center>
</form>
<?php 
          if(isset($_POST['submit'])){
              $message = $_POST['message'];
              $querys ="INSERT INTO `compl`(`id`, `uname`, `authority`, `message`, `status`, `date`) VALUES (NULL,'doo','fwarden','$message','unread','2021/06/07')";
                }
          ?>
  <div class="tablec">
  <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1">Authority</th>
      <th class="th1">Complaint</th>
      <th class="th1">Status</th>
    </tr>
    <?php
     $query = "SELECT * from `compl` order by `date` DESC";
          $resultt=mysqli_query($conn,$query);
    while ($rowc=mysqli_fetch_array($resultt)){
                ?>
    <tr class="tr1">
      <td class="td1"><?php echo $rowc['id'] ?></td>
      <td class="td1"><?php echo $rowc['authority'] ?></td>
      <td class="td1"><?php echo $rowc['message'] ?></td>
      <td class="td1"><?php echo $rowc['status'] ?></td>
    </tr>
    <?php
                     }
                 
         ?>
  </table>
</div>
</div>
<div class="tc" id="warden">
  <p>Type your complaint</p>
  <br>
  <form><textarea name="cmp">Respected warden,</textarea></form>
  <center><button name="sub" type="submit">submit</button></center>
  <div class="tablec">
  <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1">Authority</th>
      <th class="th1">Complaint</th>
      <th class="th1">Status</th>
    </tr>
    <?php
     $query = "SELECT * from `compl` order by `id` DESC";
          $resultt=mysqli_query($conn,$query);
    while ($rowc=mysqli_fetch_array($resultt)){
                ?>
    <tr class="tr1">
      <td class="td1"><?php echo $rowc['id'] ?></td>
      <td class="td1"><?php echo $rowc['authority'] ?></td>
      <td class="td1"><?php echo $rowc['message'] ?></td>
      <td class="td1"><?php echo $rowc['status'] ?></td>
    </tr>
    <?php
                     }
                 
         ?>
  </table>
</div>
</div>
<div class="tc" id="Care-taker">
  <form method="post"> 
   <p>Type your complaint</p>
  <br>
  <form>
    <textarea name="cmp">Respected Care taker,</textarea>
  <center><button name="sub" type="submit">submit</button></center>
</form>
  <div class="tablec">
  <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1">Authority</th>
      <th class="th1">Complaint</th>
      <th class="th1">Status</th>
    </tr>
   <?php
     $query = "SELECT * from `compl` order by `id` DESC";
          $resultt=mysqli_query($conn,$query);
    while ($rowc=mysqli_fetch_array($resultt)){
                ?>
    <tr class="tr1">
      <td class="td1"><?php echo $rowc['id'] ?></td>
      <td class="td1"><?php echo $rowc['authority'] ?></td>
      <td class="td1"><?php echo $rowc['message'] ?></td>
      <td class="td1"><?php echo $rowc['status'] ?></td>
    </tr>
    <?php
                     }
                 
         ?>
  </table>
 </div>
</form>
</div>
</div>
</div>
<div id="LeavesOutings" class="tabcontent">
 <p class="lo">Choose either Leave or Outing...... <button onclick="openlo(event,'leave')" id ="defaultOpenc" class = "tlo">Leave</button>
 <button onclick="openlo(event,'outing')" class = "tlo">Outing</button></p>
<div id="leave" class="tloc">
<form class="lof">
  <p style="margin-left: 10px;">In Date <input type="text" name="ida"></p>
  <p style="margin-left: 8px;">Out Date <input type="text" name="oda"></p>
  <p style="margin-left: 10px;">Reason</p>
  <textarea style="margin-left: 30px;width: 70%;"></textarea>
  <p style="margin-left: 180px;"><button>submit</button></p>
</form>
<div class="tablez">
<table class="tb1">
  <tr class="tr1"><th class="th1">s.no</th><th class="th1">Details</th><th class="th1">Aprooved Date</th><th class="th1">Aprooved by</th></tr>
  </table>
</div>
</div>
<div id="outing" class="tloc">
<form class="lof">
  <p style="margin-left: 10px;">In Time <input type="text" name="ida"></p>
  <p style="margin-left: 8px;">Out Time<input type="text" name="oda"></p>
  <p style="margin-left: 10px;">Reason</p>
  <textarea style="margin-left: 30px;width: 70%;"></textarea>
  <p style="margin-left: 180px;"><button>submit</button></p>
</form>
<div class="tablez">
<table class="tb1">
  <tr class="tr1"><th class="th1">s.no</th><th class="th1">Details</th><th class="th1">Aprooved Date</th><th class="th1">Aprooved by</th></tr>
</table>
</div>
</div>
</div>
<div id="Notifications" class="tabcontent" style="overflow-y: scroll;">
   <table class="tb1">
    <tr class="tr1">
      <th class="th1">S.no</th>
      <th class="th1" style="padding-right: 150px; padding-left:150px;">Details</th>
      <th class="th1">Upload Date</th>
    </tr>
    </table>
</div>
</div>
<div id="Warden" class="tabcontent" style="overflow-y: scroll;">
<table class="tabley">
  <div class="tb2">
  <div class="wc"><p>NAME:</p><p>MOBILE NUMBER:</p></div>
  <div class="wi"><img src="ia.jpg" class="avatar"></div>
</div>
<div class="tb2">
  <div class="wc"><p>NAME:</p><p>MOBILE NUMBER:</p></div>
  <div class="wi"><img src="ia.jpg" class="avatar"></div>
</div>
<div class="tb2">
  <div class="wc"><p>NAME:</p><p>MOBILE NUMBER:</p></div>
  <div class="wi"><img src="ia.jpg" class="avatar"></div>
</div>
</table>
</div>
<div id="Care taker" class="tabcontent" style="overflow-y: scroll;">
  <table class="tabley">
  <div class="tb2">
  <div class="wc"><p>NAME:</p><p>MOBILE NUMBER:</p><p>Shift:</p></div>
  <div class="wi"><img src="ia.jpg" class="avatar"></div>
</div>
<div class="tb2">
  <div class="wc"><p>NAME:</p><p>MOBILE NUMBER:</p><p>Shift:</p></div>
  <div class="wi"><img src="ia.jpg" class="avatar"></div>
</div>
<div class="tb2">
  <div class="wc"><p>NAME:</p><p>MOBILE NUMBER:</p><p>Shift:</p></div>
  <div class="wi"><img src="ia.jpg" class="avatar"></div>
</div>
</table>
  
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
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
<script>
function openlo(evt, optionName) {
  var k, tloc, tlo;
  tloc = document.getElementsByClassName("tloc");
  for (k = 0; k < tloc.length; k++) {
    tloc[k].style.display = "none";
  }
  tlo = document.getElementsByClassName("tlo");
  for (k = 0; k < tlo.length; k++) {
    tlo[k].className = tlo[k].className.replace(" active", "");
  }
  document.getElementById(optionName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpenc").click();

window.onclick=function(event){
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
 function showDropdown() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }
</script>
</body>
</html> 
<?php
}
?> 
<?php
include 'db_con.php';
if (isset($_POST['update'])) {
  $id=$_POST['uid'];
  $sql="UPDATE sdata SET uname='$_POST[uname]',unum='$_POST[unum]',uroom='$_POST[uroom]',ubrnch='$_POST[ubrnch]',ucgpa='$_POST[ucgpa]',upname='$_POST[upname]',upnum='$_POST[upnum]' WHERE uid='$id' ";

    $result=mysqli_query($conn,$sql);

    if($result )
  {
    echo '<script type="text/javascript">
    alert("DATABASE UPDATED")</script>';
  }
  else{
    echo '<script type="text/javascript">
    alert("DATABASE NOT UPDATED")</script>';
  }
}
if (isset($_POST['insert'])) {
  $uname=$_POST['uname'];
  $unum=$_POST['unum'];
  $uroom=$_POST['uroom'];
  $uid=$_POST['uid'];
  $ubrnch=$_POST['ubrnch'];
  $ucgpa=$_POST['ucgpa'];
  $upname=$_POST['upname'];
  $upnum=$_POST['upnum'];
  
  $sql="INSERT INTO `sdata`(`uname`, `unum`, `uroom`, `uid`, `ubrnch`, `ucgpa`, `upname`, `upnum`) VALUES ('$uname','$unum','$uroom','$uid','$ubrnch','$ucgpa','$upname','$upnum')";

    $result=mysqli_query($conn,$sql);

    if($result )
  {
    echo '<script type="text/javascript">
    alert("DATA INSERTED")</script>';
  }
  else{
    echo '<script type="text/javascript">
    alert("DATA NOT INSERTED")</script>';
  }
}
?>