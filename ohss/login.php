<?php
session_start();
include 'db_con.php';
if (isset($_POST['uname']) && isset($_POST['uname']) ) {
	
	function validate($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	$uname=validate($_POST['uname']);
	$pass=validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User name requried ");
	}elseif (empty($pass)) {
		header("Location: index.php?error=Password requried ");
	}else{
		$sql="SELECT * FROM logs WHERE uid='$uname' AND password='$pass'";
		
		$result=mysqli_query($conn,$sql);
		
		if (mysqli_num_rows($result) === 1) {
			$row=mysqli_fetch_assoc($result);
			
			if ($row['uid'] === $uname && $row['password'] === $pass) {
				 $_SESSION['username']=$row['uid'];
				 $_SESSION['id']=$row['id'];
				 $uid=$row['id'];
				 header("Location: student.php?id=$uid");
					exit();

			}
			else{
				header("Location: index.php?error=Inncorrect username or password ");
					exit();
		}
			
		}else{
			header("Location: index.php?error=Inncorrect username or password ");
				exit();
		}
	}
}
else{
	header("Location:index.php?");
	exit();
}
