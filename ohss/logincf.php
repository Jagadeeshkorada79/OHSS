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
	
		$sqlc="SELECT * FROM logcf WHERE umail='$uname' AND password='$pass'";
	
		$resultcf=mysqli_query($conn,$sqlc);

		if (mysqli_num_rows($resultcf) === 1) {
			$rowc=mysqli_fetch_assoc($resultcf);
			if ($rowc['umail'] === $uname && $rowc['password'] === $pass) {
				$_SESSION['username']=$rowc['umail'];
				 $_SESSION['id']=$rowc['id'];
				 header("Location: chief.php");
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
