<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  $usermail=$_SESSION['username'];
  include 'db_con.php';
  $sqlc="SELECT * FROM wdata WHERE uemail='$usermail'";
    $resultcf=mysqli_query($conn,$sqlc);
    $rowc=mysqli_fetch_array($resultcf);
?>
<div id="id2" class="modal">
   <div class="modal-content animate" style="border: 5px solid green;">
    <form action="" method="post">
      <h1>Full details</h1>
      <?php
      include 'db_con.php';
      $id = $_GET['id'];
                $query = "SELECT * from `outleave` where `id` = '$id'";
               $result=mysqli_query($conn,$query);
    while ($rowt=mysqli_fetch_array($result)) {
                ?>
    <table class="tb2" style="margin-left:150px;margin-bottom:10px">
    <tr class="tr2"><td class="td2">TYPE:</td><td><input type="text" name="type" value="<?php echo $rowt['type']?>"></td></tr>
    <tr class="tr2"><td class="td2">Reason:</td><td><input type="text" name="reason"value="<?php echo $rowt['reason']?>"></td></tr>
    </table>
     <input type="submit"  style="margin-left:150px" name="denied" value="Denied">
    <input type="submit"  style="margin-left:50px" name="approve" value="Approved">
<?php
                     }
          
                     ?>
    </form>
  </div>
  <center><a href="chief.php"><button>Go back</button></a></center>
  </div>
  <?php
  include 'db_con.php';
  if (isset($_POST['approve'])) {
    $sby=$rowc['uname'];
     $query ="UPDATE `outleave` SET `status` = 'Approved' ,`sdate`=CURRENT_TIMESTAMP, `sby`='$sby' WHERE `id` = $id";
     $query_run=mysqli_query($conn,$query);
  }
   if (isset($_POST['denied'])) {
    $sby=$rowc['uname'];
     $query ="UPDATE `outleave` SET `status` = 'Denied' ,`sdate`=CURRENT_TIMESTAMP, `sby`='$sby' WHERE `id` = $id";
     $query_run=mysqli_query($conn,$query);
  }
?>
<?php
  }
?>