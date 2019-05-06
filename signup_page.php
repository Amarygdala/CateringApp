<?php
require "reqAdmin.php";
?>
<main>
		<link rel="stylesheet" type="text/css" href="globalStyle.css">
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
	<div class="wrapper">
		<h1>Signup</h1>
	<form action="../CateringApp/signupCon.php" method="post">
		<input type="text" name="uid" placeholder="Username">
		<input type="password" name="pwd" placeholder="Password">
		<input type="password" name="pwd-repeat" placeholder="Repeat Password">
		<button type="submit" name="signup-submit">Signup</button>
	</form>
	<form action="../CateringApp/admin.php">
		<button type="submit">Back</button>
	</form>
</div>

</main>