<?php
$conexion = mysqli_connect("localhost","root", "", "abarrotes");

$nombre_producto = $_POST['nombre_producto'];
$imagen=addslashes(file_get_contents($_FILES['file']['tmp_name']));
$nombre_proveedor = $_POST['nombre_proveedor'];

$query = "INSERT INTO product(name,image,supplier,status) 
            VALUES('$nombre_producto','$imagen','$nombre_proveedor','Activo')";

$verificar_producto = mysqli_query($conexion, "SELECT * FROM product WHERE name='$nombre_producto'");
    if(mysqli_num_rows($verificar_producto) > 0){
        include '../vistas/vista_inventario.php';
        echo 
        '<script>
            alert("Este producto ya existe, intenta con otro diferente"); 
            window.location = "../vistas/vista_inventario.php";           
        </script>';
        exit();
    }
//Abre la conexion a la BD y ejecuta el query
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo 
        '<script>                 
            window.location = "../vistas/vista_inventario.php";                           
        </script>';
        echo       
        exit();    
        
}else{    
    echo 
    '<script>        
        window.location = "../vistas/vista_inventario.php";    
    </script>';   
    exit();
}
?>