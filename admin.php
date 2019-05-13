<?php
	require "reqAdmin.php";
?>
<!DOCTYPE html>
<html>
<body>
	<!--3 Buttons that redirect-->
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