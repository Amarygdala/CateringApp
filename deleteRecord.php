<?php
    require "reqUser.php";
    if($_SESSION['delete']==1||$_SESSION['change']==1){
        //...
    }
    else if($_SESSION['delete']==0||$_SESSION['change']==0){
        echo "You do not have either delete and change privileges.";
        exit();
    }else{
        echo "There is something wrong with your privileges, ask the Admin for assistance.";
        exit();
    }
?>
<html>
<title>Change/Delete Records</title>
<header>
    <link rel="stylesheet" href="globalStyle.css">
    <link rel="stylesheet" href="styletable.css">
</header>
<body>
<!--Burger icon that shows a dropdown to redirect to other pages-->
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
<!--JS function that show/hide the dropdown menu form the burger icon-->
<script>function dropFunction(){document.getElementById("dropMenu").classList.toggle("show");}</script>

<div class="formTOP">
<!--Input box for deleting records-->
<form action="" method="POST">
    <input type="number" name="ID" placeholder="ID">
    <select name="Col">
        <option value="" disabled selected>Select Column</option>
        <option value="ID">ID</option>
        <option value="Date">Date</option>
        <option value="StartTime">Start Time</option>
        <option value="EndTime">End Time</option>
        <option value="Room">Room</option>
        <option value="DelieveryTime">Delivery Time</option>
        <option value="MorningBreak">Morning Break</option>
        <option value="AfternoonBreak">Afternoon Break</option>
        <option value="Floor">Floor</option>
        <option value="Attendees">Number of Attendees</option>
        <option value="Purpose">Purpose(Internal/External)</option>
        <option value="Restrictions">Restrictions/Notes</option>
        <option value="HotCold">Hot or Cold</option>
        <option value="Drinks">Drinks</option>
        <option value="Vendor">Vendor</option>
        <option value="Food">Food</option>
    </select>
    <input type="text" name="Change" placeholder="Change To">
    <input type="submit" name="deleteRecord" onclick="confirm('Are you sure you want to make changes')" value="Delete">
    <input type="submit" name="updateRecord" onclick="confirm('Are you sure you want to make changes')" value="Update">
</form>
</div>

<?php
//Prints out table for record viewing.
	require 'connection.php';
    $sql = "SELECT * FROM cateringdata;";
    $result = mysqli_query( $connection, $sql );
    echo "<table id='datatable'>";
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
	    echo "  <tr><th>ID</th><th>Date\n(yyyy-mm-dd)</th><th>Start Time\n(hh:mm:ss)</th><th>End Time</th><th>Room</th><th>Delivery Time</th><th>Morning Break</th><th>Afternoon Break</th><th>Floor</th><th>Number of Attendees</th><th>Purpose</th><th>Restrictions/Notes</th><th>Hot or Cold</th><th>Drinks</th><th>Vendor</th><th>Food</th></tr>";
	    while($all =mysqli_fetch_assoc($result) ){
	        echo "<tr><td>" .$all['ID'] . "</td><td>" .  $all['Date'] . "</td><td>" . $all['StartTime'] . "</td><td>". $all['EndTime'] . "</td><td>". $all['Room'] . "</td><td>". $all['DeliveryTime'] . "</td><td>". $all['MorningBreak'] . "</td><td>" .$all['AfternoonBreak'] . "</td><td>".$all['Floor'] . "</td><td>".$all['Attendees'] . "</td><td>".$all['Purpose'] . "</td><td>".$all['Restrictions'] . "</td><td>".$all['HotCold'] . "</td><td>".$all['Drinks'] . "</td><td>". $all['Vendor'] . "</td><td>". $all['Food'] . "</td></tr>"; 
}
echo "</table>"; 
	}
    //Gets the id for the record the admin wishes to delete.
if(isset($_POST['deleteRecord'])&&$_SESSION['delete']==1){
    $deleteID=$_POST['ID']??'';
    $dbDelete = "DELETE FROM `cateringdata` WHERE `cateringdata`.`ID` = $deleteID";//DO NOT CHANGE QUOTATION MARKS.
}else if(isset($_POST['deleteRecord'])&&$_SESSION['delete']==0){
    echo "You do not have permission to delete.";
}
if(isset($_POST['ID'])&&isset($_POST['Col'])&&isset($_POST['Change'])&&isset($_POST['updateRecord'])&&$_SESSION['change']==1){
    $changeID=$_POST['ID'];
    $changeCol=$_POST['Col'];
    $changeTo=$_POST['Change'];
    $dbChange="UPDATE cateringdata SET $changeCol = '$changeTo' WHERE cateringdata. ID = $changeID";//DO NOT CHANGE QUOTATION MARKS.
    mysqli_query( $connection, $dbChange); 
}else if(isset($_POST['ID'])&&isset($_POST['Col'])&&isset($_POST['Change'])&&isset($_POST['updateRecord'])&&$_SESSION['change']==0){
    echo "You do not have permission to change.";
}

    echo 'Fill out only ID if you wish to delete. Fill out all fields if you wish to update.';

?>

</script>
</body>
</html>