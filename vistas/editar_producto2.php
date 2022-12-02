<?php
$conexion = mysqli_connect("localhost","root", "", "abarrotes");

$id=$_POST['id1'];
$nombre=$_POST['nombre_producto1'];
$estatus=$_POST['estatus1'];


    $update = ("UPDATE product 
          SET 
          name= '$nombre',   
          status = '$estatus'        
          WHERE id_product = $id
    ");   

//Abre la conexion a la BD y ejecuta el query
$ejecutar = mysqli_query($conexion, $update);

if($ejecutar){   
        header("location: ../vistas/vista_inventario.php");
}else{
    echo 
    '<script>
        alert("Intente de nuevo, error al editar el producto");        
    </script>';
    header("location: ../vistas/vista_inventario.php");
}
?>