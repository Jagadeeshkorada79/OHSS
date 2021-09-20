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
		$sqlct="SELECT * FROM logct WHERE umail='$uname' AND password='$pass'";
		
		$resultct=mysqli_query($conn,$sqlct);
		if ( mysqli_num_rows($resultct) === 1 ) {		
			$rowct=mysqli_fetch_assoc($resultct);
			if ($rowct['umail'] === $uname && $rowct['password'] === $pass) {
				$_SESSION['username']=$rowct['umail'];
				 $_SESSION['id']=$rowct['id'];
				 header("Location: caretaker.php");
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
