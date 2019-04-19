<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Iris Test Form</title>
		<link rel="stylesheet" href="style.css">
        
    </head>
	<body>
<div id="sidebar">
    <div class="togglebtn" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>
        <a href="index1.php">Form</a>
        <a href="showTable.php">Show Table</a>
        <a href="deleteRecord.php">Delete Record</a>
</div>
<script type="text/javascript">
    function toggleSidebar(){
        document.getElementById("sidebar").classList.toggle('active');
    }
</script>
<div class="burger">
    <button onclick="dropFunction()" class="dropbtn"></button>
    <div id="dropMenu" class="menuContent">
        <a href="index1.php">Form</a>
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

   	<h1>Iris Test Form</h1> 
<div class="formclass">
    <label for="sepal_lengp">Sepal Length:</label>
    <input type= "number" step="any" name="sepal_lengp">
    <label for="sepal_widthp">Sepal Width:</label>
    <input type= "number" step="any" name="sepal_widthp">
    <label for="petal_lengp">Petal Length:</label>
    <input type= "number" step="any" name="petal_lengp">
    <label for="petal_widthp">Petal Width:</label>
    <input type= "number" step="any" name="petal_widthp">
    <label for="Flower_type">Flower Type:</label>
    <select name="Flower_type">
    	<option value="Iris-setosa">Iris-setosa</option>
    	<option value="Iris-versicolor">Iris-versicolor</option>
    	<option value="Iris-virginica">Iris-virginica</option>

 </select>
    <button type="submit">Submit</button>

</form>

</div>
</body>
<img src="sap.png">
</html>