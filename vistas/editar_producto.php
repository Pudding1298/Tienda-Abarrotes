<?php
$conexion = mysqli_connect("localhost","root", "", "abarrotes");

$id=$_POST['id'];
$nombre=$_POST['nombre_producto'];
$imagen=addslashes(file_get_contents($_FILES['file']['tmp_name']));



    $update = ("UPDATE product 
          SET 
          name= '$nombre',   
          image = '$imagen'           
          WHERE id_product = $id
    ");   

//Abre la conexion a la BD y ejecuta el query
$ejecutar = mysqli_query($conexion, $update);

if($ejecutar){    
        header("location: ../vistas/vista_inventario.php");
}else{   
    header("location: ../vistas/vista_inventario.php");
}
?>