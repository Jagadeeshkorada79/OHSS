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
		
		$sqlw="SELECT * FROM logw WHERE umail='$uname' AND password='$pass'";
		
		$resultw=mysqli_query($conn,$sqlw);
		if (mysqli_num_rows($resultw) === 1 ) {
			$roww=mysqli_fetch_assoc($resultw);
			if ($roww['umail'] === $uname && $roww['password'] === $pass) {
				$_SESSION['username']=$roww['umail'];
				 $_SESSION['id']=$roww['id'];
				 header("Location: warden.php");
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
