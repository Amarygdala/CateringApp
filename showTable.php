<?php
session_start();
if(!isset($_SESSION['userId']))
{
    header('Location: ../CateringApp/login_page.php');
    exit();
}
?>
<html>
<header>
<link rel="stylesheet" href="styletable.css">

</header>
<body>
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
<script src="burger.js"></script>
</div>
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
            echo "  <tr><th>Date</th><th>Start Time</th><th>End Time</th><th>Room</th><th>Delivery Time</th><th>Morning Break</th><th>Afternoon Break</th><th>Floor</th><th>Number of Attendees</th><th>Purpose</th><th>Restrictions</th><th>Hot or Cold</th><th>Drinks</th><th>Vendor</th><th>Food</th></tr>";
        while($all =mysqli_fetch_assoc($result) ){
            echo "<tr><td>" . $all['Date'] . "</td><td>" . $all['StartTime'] . "</td><td>". $all['EndTime'] . "</td><td>". $all['Room'] . "</td><td>". $all['DeliveryTime'] . "</td><td>". $all['MorningBreak'] . "</td><td>" .$all['AfternoonBreak'] . "</td><td>".$all['Floor'] . "</td><td>".$all['Attendees'] . "</td><td>".$all['Purpose'] . "</td><td>".$all['Restrictions'] . "</td><td>".$all['HotCold'] . "</td><td>".$all['Drinks'] . "</td><td>". $all['Vendor'] . "</td><td>". $all['Food'] . "</td></tr>"; 
}

echo "</table>"; //Close the table in HTML

    }



?>
</body>
</html>
