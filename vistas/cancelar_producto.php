<?php
$conexion = mysqli_connect("localhost","root", "", "abarrotes");

$id=$_GET['id'];
$lote=$_GET['lote'];
$update = ("UPDATE product_price 
          SET       
          amount = amount+1   
          WHERE batch = $lote
        ");  
$query="DELETE FROM detail_sell WHERE id = $id";
mysqli_query($conexion,$update);
mysqli_query($conexion,$query);

header("location: vista_ventas.php");
exit();
?>