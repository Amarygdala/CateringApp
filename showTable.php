<html>
<header>
<link rel="stylesheet" href="styletable.css">

</header>
<body>
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
</div>
<?php

  include("C:\Users\Dshop\Desktop\maybexampp\htdocs\Iristestproject\connection.php");
    $sql = "SELECT * FROM iris;";
    $sql1="SELECT * FROM iris WHERE Sepal_length = 5";
    $result = mysqli_query( $connection, $sql );
echo "<table id='datatable'>";
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
        echo "  <tr><th>ID</th><th>Sepal Length</th><th>Sepal Width</th><th>Petal Length</th><th>Petal Width</th><th>Flower Type</th></tr>";
      while($all =mysqli_fetch_assoc($result) ){
          echo "<tr><td>" . $all['id'] . "</td><td>" . $all['Sepal_length'] . "</td><td>". $all['Sepal_width'] . "</td><td>". $all['Petal_length'] . "</td><td>". $all['Petal_width'] . "</td><td>". $all['Flower_type'] . "</td></tr>"; 
}

echo "</table>"; //Close the table in HTML

echo "<form action='index1.php'><button type='submit'>Back To Form</button></form>";
  }
?>
</body>
</html>
