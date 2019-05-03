 <?php
 session_start();
 	if (!isset($_SESSION['userUid'])||$_SESSION['userUid']!=="dshop") {
 		header('Location: ../CateringApp/login_page.php?error=noaccess');
    	exit();
 	}
 ?>
 	<!DOCTYPE html>
 	<html>
 	<head>
 		<title></title>
 	</head>
 	<body>
		<form action="../CateringApp/signup_page.php" method="post"> 
			<button type="submit" >Sign Up</button>
		</form>
		<form action="../CateringApp/delete_user.php" method="post">
			<button type="submit "name="delete-user">Delete Users</button> 
		</form>
		<form action="/CateringApp/logout.php" method="post">
			<button  name="logout-submit">Logout</button> 
		</form>
 	</body>
 	</html>