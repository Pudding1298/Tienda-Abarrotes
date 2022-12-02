<?php
$conexion = mysqli_connect("localhost","root", "", "abarrotes");

$lote=$_POST['lote'];
$date=$_POST['date'];
$amount=$_POST['cantidad'];
$precio=$_POST['precio'];
$precio_venta=$_POST['precio_venta'];

$update = ("UPDATE product_price 
          SET 
          date = '$date',   
          amount = '$amount',
          price = '$precio',
          sale_price = '$precio_venta'  
          WHERE batch = $lote
        ");            

//Abre la conexion a la BD y ejecuta el query
$ejecutar = mysqli_query($conexion, $update);

if($ejecutar){
    echo 
        '<script>
            alert("Cambios guardados exitosamente");            
        </script>';
        header("location: ../vistas/vista_compras.php");
}else{
    echo 
    '<script>
        alert("Intente de nuevo, error al editar el producto");        
    </script>';
    header("location: ../vistas/vista_compras.php");
}
?>