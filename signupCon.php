<?php
if(isset($_POST['signup-submit'])){
	require 'loginSystemConn.php';

	$username=$_POST['uid'];
	$password=$_POST['pwd'];
	$passwordR=$_POST['pwd-repeat'];

	if($password!==$passwordR){
		header("Location:../CateringApp/signup_page.php?error=passwordcheck&uid=".$username);
		exit();
	}else if(empty($username)||empty($password)||empty($passwordR)){
		header("Location:../CateringApp/signup_page.php?error=emptyfields");
		exit();
	}else{
		$sql="SELECT uid FROM users WHERE uid=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../CateringApp/signup_page.php?error=sql");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck=mysqli_stmt_num_rows($stmt);
			if($resultCheck>0){
				header("Location:../CateringApp/signup_page.php?error=usernametaken");
			exit();
			}else{
				$sql="INSERT INTO users(uid,upwd) VALUES(?,?);";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location:../CateringApp/signup_page.php?error=sql");
					exit();
				}else{
					$hashPwd=password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ss", $username, $hashPwd);
					mysqli_stmt_execute($stmt);
					header("Location:../CateringApp/signup_page.php?success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysql_close($conn);
}else{
	header("Location:../CateringApp/signup_page.php");
	exit();
}

