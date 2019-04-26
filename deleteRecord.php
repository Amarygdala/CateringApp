<html>
<header>
<link rel="stylesheet" href="styletable.css">
<link rel="stylesheet" href="globalStyle.css">
</header>
<body>

<div class=box></div>
<div id="sidebar"></div>
<div class="burgerTOP">
<div class="burger">
    <button onclick="dropFunction()" class="dropbtn"></button>
    <div id="dropMenu" class="menuContent">
        <a href="form.php">Form</a>
        <a href="showTable.php">Show Table</a>
        <a href="deleteRecord.php">Delete Record</a>
    </div>
</div>
<div class="burger"></div>
<div class="burger"></div>
</div>
<div class="formTOP">

<form action="" method="POST">
    <input type= "number" name="ID" placeholder="ID">
    <button type="submit">Delete</button>
</form>
</div>


<script type="text/javascript">
    function dropFunction(){
        document.getElementById("dropMenu").classList.toggle("show");
    }
    window.onclick = function(event){
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("menuContent");
            var i;
            for(i=0;i<dropdowns.length;i++){
                var openDropdown=dropdowns[i];
                if(openDropdown.classList.contains('show')){
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<?php

	include("..\CateringApp\connection.php");
    $sql = "SELECT * FROM cateringdata;";
    $result = mysqli_query( $connection, $sql );
echo "<table id='datatable'>";
    $resultCheck = mysqli_num_rows($result);
	/*if(isset($_POST['ID'])){
		header("Location:/Iristestproject/index1.php");
	} //move back to form once deletion completes*/
    if($resultCheck>0){
	    	echo "  <tr><th>ID</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Room</th><th>Delivery Time</th><th>Morning Break</th><th>Afternoon Break</th><th>Floor</th><th>Number of Attendees</th><th>Purpose</th><th>Restrictions</th><th>Hot or Cold</th><th>Drinks</th><th>Vendor</th><th>Food</th></tr>";
	    while($all =mysqli_fetch_assoc($result) ){
	        echo "<tr><td>" .$all['ID'] . "</td><td>" .  $all['Date'] . "</td><td>" . $all['StartTime'] . "</td><td>". $all['EndTime'] . "</td><td>". $all['Room'] . "</td><td>". $all['DeliveryTime'] . "</td><td>". $all['MorningBreak'] . "</td><td>" .$all['AfternoonBreak'] . "</td><td>".$all['Floor'] . "</td><td>".$all['Attendees'] . "</td><td>".$all['Purpose'] . "</td><td>".$all['Restrictions'] . "</td><td>".$all['HotCold'] . "</td><td>".$all['Drinks'] . "</td><td>". $all['Vendor'] . "</td><td>". $all['Food'] . "</td></tr>"; 
}

echo "</table>"; //Close the table in HTML

	}

	$deleteID=$_POST['ID']??'';
	$dbDelete = "DELETE FROM `cateringdata` WHERE `cateringdata`.`ID` = $deleteID";
	mysqli_query( $connection, $dbDelete); 


?>
</body>
</html>