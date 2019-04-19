<html>
<header>
<link rel="stylesheet" href="styletable.css">

</header>
<body>

<div class=box></div>
<div id="sidebar"></div>
<div class="burgerTOP">
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

	include("C:\Users\Dshop\Desktop\maybexampp\htdocs\Iristestproject\connection.php");
    $sql = "SELECT * FROM iris;";
    $sql1="SELECT * FROM iris WHERE Sepal_length = 5";
    $result = mysqli_query( $connection, $sql );
echo "<table id='datatable'>";
    $resultCheck = mysqli_num_rows($result);
	/*if(isset($_POST['ID'])){
		header("Location:/Iristestproject/index1.php");
	} //move back to form once deletion completes*/
    if($resultCheck>0){
	    	echo "  <tr><th>ID</th><th>Sepal Length</th><th>Sepal Width</th><th>Petal Length</th><th>Petal Width</th><th>Flower Type</th></tr>";
	    while($all =mysqli_fetch_assoc($result) ){
	        echo "<tr><td>" . $all['id'] . "</td><td>" . $all['Sepal_length'] . "</td><td>". $all['Sepal_width'] . "</td><td>". $all['Petal_length'] . "</td><td>". $all['Petal_width'] . "</td><td>". $all['Flower_type'] . "</td></tr>"; 
}

echo "</table>"; //Close the table in HTML

	}

	$deleteID=$_POST['ID']??'';
	$dbDelete = "DELETE FROM `iris` WHERE `iris`.`id` = $deleteID";
	mysqli_query( $connection, $dbDelete); 


?>
</body>
</html>