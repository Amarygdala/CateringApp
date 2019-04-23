<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>SAP Catering</title>
		<link rel="stylesheet" href="style.css">
        
    </head>
	<body>
<!-- Side bar incomplete
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

<form action="action.php" method="POST">

   	<h1>SAP Catering Form</h1> 
<div class="formclass">
    <label for="date">Date:</label>
    <input type= "date" name="date">
    <label for="start_time">Time(Start to end):</label>
    <input type= "time" name="start_time">
    <label for="end_time"></label>
    <input type= "time" name="end_time">
    <label for="room">Room:</label>
    <input type= "text" name="room">
    <label for="delivery_time">Catering Delivery Time:</label>
    <input type="time" name="delivery_time">
    <label for="morning_break">Morning Break:</label>
    <input type= "time" name="morning_break">
    <label for="afternoon_break">Afternoon Break:</label>
    <input type= "time" name="afternoon_break">
    <label for="floor">Floor:</label>
    <select name="floor">
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
	</select>
    <label for="attendees">Number of Attendees:</label>
    <input type= "number" name="attendees">
    <label for="purpose">Purpose of Meeting:</label>
        <select name="purpose">
    	<option value="external">External</option>
    	<option value="internal">Internal</option>
		</select>
	<label for="restrictions">Restrictions:</label>
	<input type="text" name="restrictions">
    <label for="hot_cold">Cold/Hot:</label>
        <select name="hot_cold">
    	<option value="cold">Cold</option>
    	<option value="hot">Hot</option>
		</select>
	<label for="drinks">Drinks(Coffee,Water,Tea,Juice,Pop):</label>
	<input type="text" name="drinks">
    <label for="vendor">Vendor:</label>
        <select name="vendor">
			<option value="aroma">Aroma</option>
			<option value="burger_king">Burger King</option>
			<option value="druxys">Druxys</option>
			<option value="eggsmart">Eggsmart</option>
			<option value="iq_restaurants">IQ Restaurants</option>
			<option value="jimmy_the_greek">Jimmy the Greek</option>
			<option value="la_prep">La Prep</option>
			<option value="longos">Longos</option>
			<option value="mcdonalds">McDonalds</option>
			<option value="mcewans">McEwans</option>
			<option value="nofrills">Nofrills</option>
			<option value="soup_nutsy">Soup Nutsy</option>
			<option value="tim_hortons">Tim Hortons</option>
		</select>
	<label for="food">Food</label>
	<input type="text" name="food">
    <button type="submit">Submit</button>

</form>

</div>
</body>
<img src="sap.png">
</html>