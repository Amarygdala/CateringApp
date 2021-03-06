<?php
    require "reqUser.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>SAP Catering</title>
        <link rel="stylesheet" href="globalStyle.css">
		<link rel="stylesheet" href="style.css">

    </head>
	<body>
        <!--The user icon-->
        <div class="user">
            <img src="usericon.png" class="usericon" onclick="userDropFunction()">
            <div id="dropMenuUser" class="menuContentUser">
                <a><?php echo "Hello ".$_SESSION['userUid']?></a>
                <a></a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <!--JS function for the user icon, showing dropdown-->
        <script type="text/javascript">function userDropFunction(){document.getElementById("dropMenuUser").classList.toggle("show");} </script>
<!-- Side bar incomplete, would replace dropdown menu of burger.
<div id="sidebar">
    <div class="togglebtn" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>
        <a href="form.php">Form</a>
        <a href="showTable.php">Show Table</a>
        <a href="deleteRecord.php">Delete Record</a>
</div>
<script type="text/javascript">
    function toggleSidebar(){
        document.getElementById("sidebar").classList.toggle('active');
    }
</script>-->
<!--Burger icon that shows a dropdown to redirect to other pages-->
<div class="burger">
    <button onclick="dropFunction()" class="dropbtn"></button>
    <div id="dropMenu" class="menuContent">
        <a href="form.php">Form</a>
        <a href="showTable.php">Show Table</a>
        <a href="deleteRecord.php">Delete/Change</a>
    </div>
</div>
<div class="burger"></div>
<div class="burger"></div>
<!--JS function that show/hide the dropdown menu form the burger icon-->
<script type="text/javascript">function dropFunction(){document.getElementById("dropMenu").classList.toggle("show");}</script>
<!-- The form, input boxes for everything-->
<form action="action.php" method="POST">
   	<h1>SAP Catering Form</h1> 
<div class="formclass">
    <label for="purpose">*Purpose of Meeting:</label>
        <select name="purpose">
            <option value="External">External</option>
            <option value="Internal">Internal</option>
        </select>
    <label for="date">*Date:</label>
        <input type= "date" name="date" class="formRight" required="required"></br>
    <label for="room">*Room:</label>
        <select name="room" id="room" onchange="Change()"><!--If new rooms are added go to the js function on the bottom, ALSO UPDATE deleteRecord.php-->
            <option value="" disabled selected>Select Room</option>
            <option value="Agincourt">Agincourt</option>
            <option value="Bayview Village">Bayview Village</option>
            <option value="Black Creek">Black Creek</option>
            <option value="Bridle Path">Bridle Path</option>
            <option value="Distillery District">Distillery District</option>
            <option value="Downsview">Downsview</option>
            <option value="Guildwood">Guildwood</option>
            <option value="High Park">High Park</option>
            <option value="Hoggs Hollow">Hoggs Hollow</option>
            <option value="Kingsway">Kingsway</option>
            <option value="Lawrence Heights">Lawrence Heights</option>
            <option value="Leslieville">Leslieville</option>
            <option value="Liberty Village">Liberty Village</option>   
            <option value="Little Italy">Little Italy</option>
            <option value="Mimico">Mimico</option>
            <option value="Parkdale">Parkdale</option>
            <option value="Port Union">Port Union</option>
            <option value="Rouge">Rouge</option>
            <option value="The Annex">The Annex</option>
            <option value="The Beaches">The Beaches</option>
            <option value="York Mills">York Mills</option>
        </select>
    <label for="floor">*Floor:</label>
        <input type="number" name="floor" class="formRight" id="floor" readonly></br>
    <label for="attendees">*Number of Attendees:</label>
        <input type= "number" name="attendees" required="required">
    <label for="food">*Food:</label>
       <input type="text" name="food" class="formRight" required="required"></br>
    <label for="delivery_time">*Catering Delivery Time:</label>
        <input type="time" name="delivery_time" required="required">
    <label for="meal">*Meal:</label>
    	<select name="meal" class="formRight">
    		<option value="Breakfast">Breakfast</option>
    		<option value="Lunch">Lunch</option>
    		<option value="Dinner">Dinner</option>
    	</select></br>
    <label for="start_time">*Time(Start):</label>
        <input type= "time" name="start_time" required="required">
    <label for="end_time">*Time(End):</label>
        <input type= "time" name="end_time" class="formRight" required="required"></br>
    <label for="morning_break" >Morning Break:</label>
        <input type= "time" name="morning_break">
    <label for="afternoon_break">Afternoon Break:</label>
        <input type= "time" name="afternoon_break" class="formRight"></br>
	<label for="restrictions">Notes/Dietary Restrictions:</label>
	   <input type="text" name="restrictions">
    <label for="hot_cold">*Hot/Cold:</label>
        <select name="hot_cold" class="formRight">
        	<option value="Cold">Cold</option>
        	<option value="Hot">Hot</option>
		</select></br>
	<label for="drinks">Drinks(Coffee,Water,Tea,Juice,Pop):</label>
	   <input type="text" name="drinks">
    <label for="vendor">*Vendor:</label>
        <input type="text" list="vendors" name="vendor" class="formRight" required="required" placeholder="Other">
        <datalist name="vendor" id="vendors">
			<option value="Aroma">Aroma</option>
			<option value="Burger King">Burger King</option>
			<option value="Druxys">Druxys</option>
			<option value="Eggsmart">Eggsmart</option>
			<option value="IQ Restaurants">IQ Restaurants</option>
			<option value="Jimmy the Greek">Jimmy the Greek</option>
			<option value="La Prep">La Prep</option>
			<option value="Longos">Longos</option>
			<option value="McDonalds">McDonalds</option>
			<option value="McEwans">McEwans</option>
			<option value="Nofrills">Nofrills</option>
			<option value="Soup Nutsy">Soup Nutsy</option>
			<option value="Tim Hortons">Tim Hortons</option>
		</datalist></br>
	<label for="cost_center">*Cost Center(4 Digit #):</label>
	 	<input type="number" min="1000" max="9999"  name="cost_center" required="required">
	<label for="organizer">*Organizer:</label>
		<input type="text" name="organizer" class="formRight" required="required"></br>
    <label for="Cost">Cost(Edit after Order)</label>
        <input type="number" name="Cost" step="0.01">
    <button type="submit" id="submitbutton">Submit</button>
</form>
</div>

<!--<script type="text/javascript">
	var insertpriv = <?php echo $_SESSION['insert']?>;
	console.log('insertpriv1');
	if(insertpriv!==1){
		document.getElementById("submitbutton").disabled=true;
	}

</script>-->
<script type="text/javascript">//This function changes the floor value according to the room selected. fieldsSelected is the rooms, in order of the forms. If inserting new rooms, redo all the numbers.
    function Change(){
        var fieldsSelected = document.getElementById('room').selectedIndex;
        console.log(fieldsSelected);
        if(fieldsSelected=="1"||fieldsSelected=="2"||fieldsSelected=="6"||fieldsSelected=="7"||fieldsSelected=="9"||fieldsSelected=="17"||fieldsSelected=="18"||fieldsSelected=="21"){//floor 18
            document.getElementById('floor').value="18";
        }else if(fieldsSelected=="3"||fieldsSelected=="4"||fieldsSelected=="8"||fieldsSelected=="10"||fieldsSelected=="11"||fieldsSelected=="14"||fieldsSelected=="15"||fieldsSelected=="16"){//19
            document.getElementById('floor').value="19";
        }else if(fieldsSelected=="5"||fieldsSelected=="12"||fieldsSelected=="13"||fieldsSelected=="19"||fieldsSelected=="20"){//20
            document.getElementById('floor').value="20";
        }
    }

</script>
<img src="sap.png" class="sapimage">
</body>
</html>