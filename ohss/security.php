<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
$usermail=$_SESSION['username'];
  include 'db_con.php';
  $sqlc="SELECT * FROM sedata WHERE uemail='$usermail'";
    $resultcf=mysqli_query($conn,$sqlc);
    $rowc=mysqli_fetch_array($resultcf);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.tabcontent 
{
  float: left;
  border: 1px solid black;
  width: 95%;
  height: 600px;
  margin-top: 10px;
  margin-right: 10px;
  margin-left: 40px;
}
input{
  border-radius: 05px;
  padding: 8px 15px 8px 15px;
  margin: 0px 0px 0px 0px;
  box-shadow: 1px 1px 2px 1px grey;
  margin-left: 10px;
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
.ct{
  margin-left: 10px;
  margin-right: 10px;
}
.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}
.active {
  background-color: #4CAF50;
}
.tb1{
  width:100%;
  margin-top: 10px;
}
.tb2{
  width: 100%;
  margin-top: 10px;
}
.td1,.th1{
  border : 1px solid;
}
.th1{
  background-color: #dddddd;
}
.tablec{
  margin-left: 10px;
  margin-right: 10px;
  height: 90%; 
  overflow-y: scroll;
}
.tableb{
  height: 100px;
  padding:6px 12px;
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
.title{
  font-size: 30px;
  font-style: bold;
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
                    font-size: px;
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
</style>
</head>
<body>
  <center class="title">SECURITY</center>
<div class="container ct">
<div class="navbar">
  <a class="active" href="security.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="about.php"><i class="fa fa-fw fa-question"></i>About</a>
  <a href="contact.php"><i class ="fa fa-fw fa-envelope"></i>Contact</a>
   <a class="link dim dark-gray f3 dib mr3 mr4-l" href="security.php" style="margin-left: 700px">WELCOME <?php echo $rowc['uname']; ?> </a>
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
                        <a href="updatese.php">Update</a>
                        <a href="index.php">Logout</a>
                    </div>
                </div>
</div>
</div>
  <div id="id1" class="modal">
   <div class="modal-content animate" style="border: 5px solid green;">
    <div class="tableb">
    <table class="tb2">
      <tr class="tr1">
        <th class="th1">IDno</th>
        <th class="th1">Type</th>
        <th class="th1">Reporting date</th>
        <th class="th1">Reporting time</th>
        <th class="th1">Update</th>
      </tr>

    </table>
</div>
  </div>
  </div>
<div id="no" class="tabcontent" style="margin-top: 30px;">
  <input type="search" name="st" style="width: 80%;margin-left: 40px;margin-right: 10px;margin-top: 10px;border-radius: 5px;"><button onclick="document.getElementById('id1').style.display='block'"><i class="fa fa-fw fa-search"></i></button>
  <div class="tablec" style="margin-top: 10px;">
    <table class="tb1">
      <tr class="tr1">
        <th class="th1">S.no</th>
        <th class="th1">ID no</th>
        <th class="th1">Type</th>
        <th class="th1">Approved by</th>
        <th class="th1">Indate</th>
       <th class="th1">Outdate</th>
        <th class="th1">Update</th>
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
      <td class="td1"><?php echo $rowt['sby']?></td>
      <td class="td1"><?php echo $rowt['intime']?></td>
      <td class="td1"><?php echo $rowt['outtime']?></td>
     <td class="td1"><a href="status.php?id=<?php echo $rowt['id'] ?>"><button type="submit" name="Approved" class="btn btn-danger">Status</button></a></td>
    </tr>
    <?php
                     }
          
                     ?>
    </table>
  </div>
</div>
<script>
  var m = document.getElementById('id1');
   window.onclick=function(event){
    if(event.target==m){
       m.style.display="none";
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
   function showDropdown() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

</script>
</body>
</html>
<?php
}
?> 