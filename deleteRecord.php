<?php
    require "reqUser.php";
    error_reporting(0);
    /*if($_SESSION['delete']==1||$_SESSION['change']==1){
        //...
    }
    else if($_SESSION['delete']==0||$_SESSION['change']==0){
        echo "You do not have either delete and change privileges.";
        exit();
    }else{
        echo "There is something wrong with your privileges, ask the Admin for assistance.";
        exit();
    }*/
	require 'connection.php';
//Gets the id for the record the admin wishes to delete.
if(isset($_POST['deleteRecord'])&&isset($_POST['ID'])&&!isset($_POST['Col']))/*&&$_SESSION['delete']==1*/{
    $deleteID=mysqli_real_escape_string($connection, $_POST['ID']);
    $user=$_SESSION['userUid'];
    $result =mysqli_query($connection,"SELECT * FROM cateringdata WHERE `ID` = $deleteID");
    $all =mysqli_fetch_assoc($result);
    if($all['ID']!=null){
	    if($all['Date']>date('Y-m-d',time())){
	        $before=implode("|", $all);
	        $dblog = "INSERT INTO log (User,BeforeChange,Type) VALUES ('$user','$before', 'Delete');";
	        mysqli_query( $connection, $dblog );

	        $dbDelete = "DELETE FROM `cateringdata` WHERE `cateringdata`.`ID` = ?";//DO NOT CHANGE QUOTATION MARKS.
	        $stmt = mysqli_stmt_init($connection);
	        if(!mysqli_stmt_prepare($stmt,$dbDelete)){
	            echo "SQL FAIL";
	        }else{
	            mysqli_stmt_bind_param($stmt,"i",$deleteID);
	            mysqli_stmt_execute($stmt);
	            mysqli_stmt_close($stmt);   
	            header("Location:../deleteRecord.php");
	        }   
		}else{
			header("Location:../deleteRecord.php?err=RecPast");
		}
}else{
	header("Location:../deleteRecord.php?err=404");
	}
}/*else if(isset($_POST['deleteRecord'])&&$_SESSION['delete']==0){
    echo "You do not have permission to delete.";
}*/

if(isset($_POST['ID'])&&isset($_POST['Col'])&&isset($_POST['Change'])&&isset($_POST['updateRecord'])/*&&$_SESSION['change']==1*/){
    $user=$_SESSION['userUid'];
    $changeID=mysqli_real_escape_string($connection, $_POST['ID']);
    $changeCol=$_POST['Col'];
    $changeTo=$_POST['Change'];
    $result=mysqli_query($connection, "SELECT * FROM cateringdata WHERE ID = $changeID");
    $all =mysqli_fetch_assoc($result);
    if($all['ID']!=null){
	    if($all['Date']>date('Y-m-d',time())||$changeCol=='Cost'){
	        $before=implode("|", $all);
	        $dbChange="UPDATE cateringdata SET $changeCol = ? WHERE cateringdata. ID = $changeID";//DO NOT CHANGE QUOTATION MARKS.
	        $stmt1 = mysqli_stmt_init($connection);
	        if(!mysqli_stmt_prepare($stmt1,$dbChange)){
	            echo "SQL FAIL";
	        }else{
	            mysqli_stmt_bind_param($stmt1,"s",$changeTo);
	            mysqli_stmt_execute($stmt1);
	            mysqli_stmt_close($stmt1); 
	        }

	        $result=mysqli_query( $connection, "SELECT * FROM cateringdata WHERE ID = $changeID");
	        $all =mysqli_fetch_assoc($result);

	        $after=implode("|", $all);
	        $dblog = "INSERT INTO log (User,BeforeChange,AfterChange,Type) VALUES ('$user','$before','$after','Edit');";
	        mysqli_query( $connection, $dblog );
        	header("Location:../deleteRecord.php");
	    }else{
	    	header("Location:../deleteRecord.php?err=RecPast");
	    }
    }else{
	header("Location:../deleteRecord.php?err=404&id=".$changeID);
	}
}/*else if(isset($_POST['ID'])&&isset($_POST['Col'])&&isset($_POST['Change'])&&isset($_POST['updateRecord'])&&$_SESSION['change']==0){
    echo "You do not have permission to change.";
}*/
?>
<!-- Beneath is html-->
<html>
<title>Change/Delete Records</title>
<header>
    <link rel="stylesheet" href="globalStyle.css">
    <link rel="stylesheet" href="styletable.css">
</header>
<body>
<!--Burger icon that shows a dropdown to redirect to other pages-->
<div class="burgerTOP">
<div class="wrap">
<div class="burger">
    <button onclick="dropFunction()" class="dropbtn"></button>
    <div id="dropMenu" class="menuContent">
        <a href="form.php">Form</a>
        <a href="showTable.php">Show Table</a>
        <a href="deleteRecord.php">Delete/Change</a>
    </div>
</div>
<div class="burger"></div>
<div class="burger"></div> </div> 
<!--JS function that show/hide the dropdown menu form the burger icon-->
<script>function dropFunction(){document.getElementById("dropMenu").classList.toggle("show");}</script>


<!--Input box for deleting+changing records-->
<form action="" method="POST">
    <input type="number" name="ID" placeholder="ID">
    <select name="Col" id="fields" onchange="change()">
        <option value="" disabled selected>Select Column</option>
        <option value="Purpose">Purpose(Internal/External)</option>
        <option value="Date">Date</option>
        <option value="Floor">Floor</option>
        <option value="Room">Room</option>
        <option value="Attendees">Number of Attendees</option>
        <option value="Food">Food</option>
        <option value="DelieveryTime">Delivery Time</option>
        <option value="StartTime">Start Time</option>
        <option value="EndTime">End Time</option>
        <option value="MorningBreak">Morning Break</option>
        <option value="AfternoonBreak">Afternoon Break</option>
        <option value="Restrictions">Notes/Dietary Restrictions:</option>
        <option value="Meal">Meal</option>
        <option value="HotCold">Hot or Cold</option>
        <option value="Drinks">Drinks</option>
        <option value="Vendor">Vendor</option> 
        <option value="Cost">Cost</option>  
    </select>
    <input type="text" name="Change" id="changeInput" placeholder="Change To" step="0.01">
    <input type="submit" name="deleteRecord" onclick="return confirm('Are you sure you want to make changes?');" value="Delete">
    <input type="submit" name="updateRecord" onclick="return confirm('Are you sure you want to make changes?');" value="Update">
</form>
<?php  //If the record is edited...
echo "Fill out only ID if you wish to delete. Fill out all fields if you wish to update.";
if($_GET['err']=='RecPast'){
    	echo "<b>You cannot edit any records that have past(except for Cost)<b>";
    }else if($_GET['err']=='404'&& $changes = $_GET['id']){
    	echo "<b>ID ".$changes." is not found.</b>";
    }else if($_GET['err']=='404'){
    	echo "<b>ID is not found.</b>";
    }
?>
</div> 
<?php
	require 'connection.php';
    $sql = "SELECT * FROM cateringdata  ORDER BY ID ASC;";//WHERE Date>CURDATE() //Add this after cateringdata to make table only show records that didn't past yet.
    $result = mysqli_query( $connection, $sql );
    echo "<table id='datatable'>";
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
	    echo "  <tr><th>ID</th><th>Purpose</th><th>Date\n(yyyy-mm-dd)</th><th>Floor</th><th>Room</th><th>Number of Attendees</th><th>Food</th><th>Delivery Time</th><th>Start Time\n(hh:mm:ss)</th><th>End Time</th><th>Morning Break</th><th>Afternoon Break</th><th>Notes/Dietary Restrictions:</th><th>Meal</th><th>Hot or Cold</th><th>Drinks</th><th>Vendor</th><th>Cost</th></tr>";
	    while($all =mysqli_fetch_assoc($result) ){
	        echo "<tr><td>" .$all['ID'] . "</td><td>".$all['Purpose']. "</td><td>" .  $all['Date'] . "</td><td>".$all['Floor']. "</td><td>". $all['Room']. "</td><td>".$all['Attendees']. "</td><td>". $all['Food']. "</td><td>". $all['DeliveryTime']. "</td><td>" . $all['StartTime'] . "</td><td>". $all['EndTime']   . "</td><td>". $all['MorningBreak'] . "</td><td>" .$all['AfternoonBreak']    . "</td><td>".$all['Restrictions']. "</td><td>".$all['Meal'] . "</td><td>".$all['HotCold'] . "</td><td>".$all['Drinks'] . "</td><td>". $all['Vendor']. "</td><td>". $all['Cost']  . "</td></tr>"; 
}
echo "</table>"; 
	}
?>

<script type="text/javascript">
    function change(){
        var fieldsSelected = document.getElementById('fields').selectedIndex;
        console.log(fieldsSelected);
        if(fieldsSelected=="2"){//date
            document.getElementById('changeInput').type="date";
        }else if(fieldsSelected=="7"||fieldsSelected=="8"||fieldsSelected=="9"||fieldsSelected=="10"||fieldsSelected=="11"){//time
            document.getElementById('changeInput').type="time";
        }else if(fieldsSelected=="1"||fieldsSelected=="4"||fieldsSelected=="6"||fieldsSelected=="12"||fieldsSelected=="13"||fieldsSelected=="14"||fieldsSelected=="15"||fieldsSelected=="16"){//free text
            document.getElementById('changeInput').type="text";
        }else if(fieldsSelected=="3"||fieldsSelected=="5"||fieldsSelected=="17"){//number
            document.getElementById('changeInput').type="number";
        }
    }

</script>

</body>
</html>