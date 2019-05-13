<?php
//Vulnerable to SQL injection attacks (The login system isn't).
//Gets the information from the form, then runs the query to insert into database.
	include("..\CateringApp\connection.php");
	$date = $_POST["date"]??'';
	$start_time = $_POST["start_time"]??'';
	$end_time = $_POST["end_time"]??'';
	$room = $_POST["room"]??'';
	$delivery_time = $_POST["delivery_time"]??'';
	$morning_break = $_POST["morning_break"]??'';
	$afternoon_break = $_POST["afternoon_break"]??'';
	$floor = $_POST["floor"]??'';
	$attendees = $_POST["attendees"]??'';
	$purpose = $_POST["purpose"]??'';
	$restrictions = $_POST["restrictions"]??'';
	$hot_cold = $_POST["hot_cold"]??'';
	$drinks = $_POST["drinks"]??'';
	$vendor = $_POST["vendor"]??'';
	$food = $_POST["food"]??'';
	$dbinsert = "INSERT INTO cateringdata (Date,StartTime,EndTime,Room,DeliveryTime,MorningBreak,AfternoonBreak,Floor,Attendees,Purpose,Restrictions,HotCold,Drinks,Vendor,Food) VALUES ('$date', '$start_time', '$end_time', '$room', '$delivery_time','$morning_break', '$afternoon_break', '$floor', '$attendees', '$purpose','$restrictions','$hot_cold', '$drinks', '$vendor', '$food');";
	mysqli_query( $connection, $dbinsert ); 

	header("Location: ../CateringApp/form.php?=success");