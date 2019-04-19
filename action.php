<?php

	include("C:\Users\Dshop\Desktop\maybexampp\htdocs\Iristestproject\connection.php");

	$sepal_lengp = $_POST["sepal_lengp"]??'';
	$sepal_widthp = $_POST["sepal_widthp"]??'';
	$petal_lengp = $_POST["petal_lengp"]??'';
	$petal_widthp = $_POST["petal_widthp"]??'';
	$flower_typep = $_POST["Flower_type"]??'';


	$dbinsert = "INSERT INTO iris (Sepal_length, Sepal_width, Petal_length, Petal_width, Flower_type) VALUES ('$sepal_lengp', '$sepal_widthp', '$petal_lengp', '$petal_widthp', '$flower_typep');";

	mysqli_query( $connection, $dbinsert ); 
	header("Location: ../Iristestproject/index1.php?=success");