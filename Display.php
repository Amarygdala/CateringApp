<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="DisplayStyle.css">
	<link rel="stylesheet" href="globalStyle.css">
	<!--Refresh every 5 minutes-->
	<meta http-equiv="refresh" content="300">
<?php 
//If there is no value for shrtNum in the url then automatically redirect to shrtNum=0
//This redirects the page when user only types in 'display.php' and not 'display.php?shrtNum=0'
if(!isset($_GET['shrtNum'])){
  header('Location: ../display.php?shrtNum=0');
}
?>
</head>

<body>
<div class="header">
	<img src="dshop-logo-small.png">
	  <div class="header-right">
	  		<!-- Settings, not implemented.
	  			<a class="active" href="../Settings.php">Settings</a>-->
	  		<button value="Refresh Page" onClick="window.location.reload()">Refresh</button></br>
	  		<p id="dateTime"></p>
	  		<!--JS code for last refreshed time-->
	  		<script> let d = new Date(); document.getElementById("dateTime").innerHTML ="Last Refreshed:"+ d;</script>
	</div>
</div>

<?php
	require 'connection.php';
?>
<!-- Below is right sidebar for short description content -->
<div class="outbox">
	<div id="selector">
		<div class="shrtcntt shrtcntt0" onclick="replaceShow('0')">
			<?php
				//First box that prints the date and time data for the first dataset
				//All shrtcntt classes are the same, but for the next box and dataset.
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 0, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);

				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 0, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 0, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
		<div class="shrtcntt shrtcntt1" onclick="replaceShow('1')">
			<?php
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 1, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);

				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 1, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 1, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
		<div class="shrtcntt shrtcntt2" onclick="replaceShow('2')">
			<?php
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 2, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);
				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 2, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 2, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
		<div class="shrtcntt shrtcntt3" onclick="replaceShow('3')">
			<?php
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 3, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);

				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 3, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 3, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
		<div class="shrtcntt shrtcntt4" onclick="replaceShow('4')">
			<?php
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 4, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);

				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 4, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 4, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
		<div class="shrtcntt shrtcntt5" onclick="replaceShow('5')">
			<?php
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 5, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);

				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 5, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 5, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
		<div class="shrtcntt shrtcntt6" onclick="replaceShow('6')">
			<?php
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 6, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);

				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 6, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 6, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
		<div class="shrtcntt shrtcntt7" onclick="replaceShow('7')">
			<?php
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 7, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);

				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 7, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 7, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
		<div class="shrtcntt shrtcntt8" onclick="replaceShow('8')">
			<?php
				$resultEmp = mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 8, 1;");
				$allEmp =mysqli_fetch_assoc($resultEmp);

				echo"<h1>Purpose:</h1>";
				echo $allEmp['Purpose'];

				echo"<h1>Date:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 8, 1;");
		    	$allT =mysqli_fetch_assoc($resultT);
		    	echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];

				echo"<h1>Floor:</h1>";
				echo $allEmp['Floor'];

				echo"<h1>Room:</h1>";
				echo $allEmp['Room'];

				echo"<h1>Delivery Time:</h1>";
				$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT 8, 1;");
				$allT =mysqli_fetch_assoc($resultT);
				echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
			?>
		</div>
	</div>
<!--PHP code for changing the color, and JS for redirecting url to the shrtcntt class box number the user selects-->
<?php
	$showNum=$_GET['shrtNum'];
	echo "<script>document.getElementsByClassName('shrtcntt'+$showNum)[0].style.backgroundColor = 'lightgrey';</script>";
?>

<script type="text/javascript">
function replaceShow(shrtNum){
	window.location.href = "../display.php?shrtNum="+shrtNum;
	return;
}
</script>
<!-- Below is main display -->
<?php
	$all=mysqli_fetch_assoc(mysqli_query( $connection, "SELECT * FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT $showNum, 1;"));
?>

<div class="show">
<!--Show all data in display one by one-->
	<div id="PurposeID" class="size1">
		<h2>Purpose</h2>
		<?php
			echo $all["Purpose"];
		?>
</div>
	<div id="DateID" class="size1">
		<h2>Date</h2>
		<?php
		    $resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(Date, '%b %e, %Y') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT $showNum, 1;");
		    $allT =mysqli_fetch_assoc($resultT);
		    echo $allT["DATE_FORMAT(Date, '%b %e, %Y')"];
		?>
</div>
	<div id="FloorID" class="size1">
		<h2>Floor</h2>
		<?php
			echo $all["Floor"];
		?>
</div>
	<div id="RoomID" class="size1">
		<h2>Room</h2>
		<p><?php
			echo $all["Room"];
		?></p>
	</div>
	<div id="AttendeesID" class="size1">
		<h2>Number of Attendees</h2>
		<?php
			echo $all["Attendees"]. " people";
		?>
</div>	
	<div id="FoodID" class="size1">
		<h2>Food</h2>
		<p><?php
			echo $all["Food"];
		?></p>

</div>
	<div id="dTimeID" class="size1">
		<h2>Delivery Time</h2>
		<?php
			$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(DeliveryTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT $showNum, 1;");
			$allT =mysqli_fetch_assoc($resultT);
			echo $allT["DATE_FORMAT(DeliveryTime, '%h:%i %p')"];
		?>
</div>
	<div id="TimeID">
		<h2>Time(start to end)</h2><?php echo $all["Meal"]; ?>
		<?php
			$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(StartTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT $showNum, 1;");
			$allT =mysqli_fetch_assoc($resultT);
			echo $allT["DATE_FORMAT(StartTime, '%h:%i %p')"];
			echo " to ";
			$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(EndTime, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT $showNum, 1;");
			$allT =mysqli_fetch_assoc($resultT);
			echo $allT["DATE_FORMAT(EndTime, '%h:%i %p')"];
    ?>
</div>
	<div id="MBreakID">
		<h2>Morning Break</h2>
		<?php
			$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(MorningBreak, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT $showNum, 1;");
			$allT =mysqli_fetch_assoc($resultT);
			echo $allT["DATE_FORMAT(MorningBreak, '%h:%i %p')"];
		?>
</div>
	<div id="ABreakID">
		<h2>Afternoon Break</h2>
		<?php
			$resultT = mysqli_query( $connection, "SELECT DATE_FORMAT(AfternoonBreak, '%h:%i %p') FROM cateringdata WHERE Date>CURDATE() ORDER BY date,StartTime ASC LIMIT $showNum, 1;");
			$allT =mysqli_fetch_assoc($resultT);
			echo $allT["DATE_FORMAT(AfternoonBreak, '%h:%i %p')"];
		?>
</div>
	<div id="RestrictionsID">
		<h2>Notes/Dietary Restrictions</h2>
		<p><?php
			echo $all["Restrictions"];
		?></p>
</div>
	<div id="HotColdID">
		<h2>Hot/Cold</h2>
		<?php
			echo $all["HotCold"];
		?>
</div>
	<div id="DrinksID">
		<h2>Drinks</h2>
		<p><?php
			echo $all["Drinks"];
		?></p>
</div>
	<div id="VendorID">
		<h2>Vendor</h2>
		<?php
			echo $all["Vendor"];
		?>
</div>
</div>
</div>
</body>
</html>
