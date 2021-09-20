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
		$sqlse="SELECT * FROM logse WHERE umail='$uname' AND password='$pass'";
		
		$resultse=mysqli_query($conn,$sqlse);
		if ( mysqli_num_rows($resultse) === 1) {
			$rowse=mysqli_fetch_assoc($resultse);
			if ($rowse['umail'] === $uname && $rowse['password'] === $pass) {
				$_SESSION['username']=$rowse['umail'];
				 $_SESSION['id']=$rowse['id'];
				 header("Location: security.php");
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
