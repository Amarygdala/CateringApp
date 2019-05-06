
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="DisplayStyle.css">
	<link rel="stylesheet" href="globalStyle.css">
	<meta http-equiv="refresh" content="300">
	<title></title>
</head>
<body>
<!-- Below is main display -->
<?php
	include("..\CateringApp\connection.php");
	$all=mysqli_fetch_assoc(mysqli_query( $connection, "SELECT * FROM cateringdata ORDER BY ID DESC LIMIT 0, 1;"));
?>
<div class="header">
	  <div class="header-right">
	  		<a class="active" href="../CateringApp/Settings.php">Settings</a>
	  		<button value="Refresh Page" onClick="window.location.reload()">Refresh</button> 
	  		</br>
	  		<p id="dateTime"></p>
	  		<script> let d = new Date(); document.getElementById("dateTime").innerHTML ="Last Refreshed:"+ d;</script>
	</div>
</div>

<div class="outbox">
	<div class="show">
	<div id="DateID">
		<h1>Date</h1>
<?php
    $resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 0, 1;");
    $allT =mysqli_fetch_assoc($resultT);
    echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
    ?>
</div>
	
	<div id="TimeID">
		<h1>Time(start to end)</h1>
		<?php 
	$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 0, 1;");
	$allT =mysqli_fetch_assoc($resultT);
	echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
	echo " to ";
	$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 0, 1;");
	$allT =mysqli_fetch_assoc($resultT);
	echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
    ?>
</div>
	<div id="dTimeID">
		<h1>Delivery Time</h1>
	<?php
	$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 0, 1;");
	$allT =mysqli_fetch_assoc($resultT);
	echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
	?>
</div>

<div id="MBreakID">
	<h1>Morning Break</h1>
	<?php
	$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 0, 1;");
	$allT =mysqli_fetch_assoc($resultT);
	echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
	?>
</div>

<div id="ABreakID">
	<h1>Afternoon Break</h1>
	<?php
	$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 0, 1;");
	$allT =mysqli_fetch_assoc($resultT);
	echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
	?>
	</div>

	<div id="RoomID">
		<h1>Room</h1>
	<?php
		echo $all["Room"]; 
	?>
	</div>


	<div id="FloorID">
		<h1>Floor</h1>
		<?php
		echo $all["Floor"]; 
		?>
</div>

	<div id="AttendeesID">
		<h1>Number of Attendees</h1>
		<?php
		echo $all["Attendees"]. " people"; 
		?>
</div>

	<div id="PurposeID">
		<h1>Purpose</h1>
		<?php
		echo $all["Purpose"]; 
		?>
</div>

	<div id="RestrictionsID">
		<h1>Restrictions</h1>
		<?php
		echo $all["Restrictions"]; 
		?>
</div>

	<div id="HotColdID">
		<h1>Hot/Cold</h1>
		<?php
		echo $all["HotCold"]; 
		?>
</div>

	<div id="DrinksID">
		<h1>Drinks</h1>
		<?php
		echo $all["Drinks"]; 
		?>
</div>

	<div id="VendorID">
		<h1>Vendor</h1>
		<?php
		echo $all["Vendor"]; 
		?>
</div>
	<div id="FoodID">
		<h1>Food</h1>
		<?php
		echo $all["Food"]; 
		?>
</div>

	</div>

<!-- Below is right sidebar for short description content -->

	<div id="selector">
		<div id="shrtcntt">
			<?php
				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 1, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
				echo"<h1>Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 1, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
				echo " to ";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 1, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
			?>

		</div>
		<div id="shrtcntt">
			<?php
				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 2, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
				echo"<h1>Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 2, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
				echo " to ";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 2, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
			?>
		</div>
		<div id="shrtcntt">
			<?php
				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 3, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
				echo"<h1>Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 3, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
				echo " to ";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 3, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
			?>
		</div>
		<div id="shrtcntt">
			<?php
				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 4, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
				echo"<h1>Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 4, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
				echo " to ";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 4, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
			?>
		</div>
		<div id="shrtcntt">
			<?php
				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 5, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
				echo"<h1>Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 5, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
				echo " to ";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 5, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
			?>
		</div>
		<div id="shrtcntt">
			<?php
				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 6, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
				echo"<h1>Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 6, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
				echo " to ";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 6, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
			?>
		</div>
		<div id="shrtcntt">
			<?php
				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 7, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
				echo"<h1>Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 7, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
				echo " to ";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 7, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
			?>
		</div>
		<div id="shrtcntt">
			<?php
				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata ORDER BY ID DESC LIMIT 8, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
				echo"<h1>Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 8, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
				echo " to ";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata ORDER BY ID DESC LIMIT 8, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
			?>
		</div>
	</div>


<img src="dshop-logo-small.png">
</div>



</body>
</html>