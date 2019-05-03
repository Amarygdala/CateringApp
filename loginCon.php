<?php

if(isset($_POST['login-submit'])){
	require 'loginSystemConn.php';

	$username=$_POST['userid'];
	$password=$_POST['pwd'];

	if(empty($username)||empty($password)){
		header("Location:../CateringApp/login_page.php?error=emptyfields");
		exit();
	}else{
		$sql="SELECT * FROM users WHERE uid=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../CateringApp/login_page.php?error=sql");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"s", $username);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if($row=mysqli_fetch_assoc($result)){
				$pwdCheck=password_verify($password, $row['upwd']);
				if ($pwdCheck==false) {
					header("Location:../CateringApp/login_page.php?error=wrongpwd");//change to username or password not found.
					exit();
				}else if($pwdCheck==true){
					session_start();
					$_SESSION['userId'] = $row['id'];
					$_SESSION['userUid'] = $row['uid'];
					if($row['uid']=="dshop"){
						header("Location:../CateringApp/admin.php");
						exit();
					}else{
						header("Location:../CateringApp/form.php?login=success");
						exit();
					}
				}else{
					header("Location:../CateringApp/login_page.php?error=4");
					exit();
				}
			}else{
				header("Location:../CateringApp/login_page.php?error=usernamenotfound");//change to username or password not found.
				exit();
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysql_close($conn);
}else{
	header("Location:../CateringApp/login_page.php");
	exit();
}

