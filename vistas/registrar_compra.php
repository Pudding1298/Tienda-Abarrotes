<?php
$conexion = mysqli_connect("localhost","root", "", "abarrotes");

$nombre = $_POST['producto'];
$sql = "SELECT p.id_product FROM product p WHERE p.name = '$nombre'";
$result= mysqli_query($conexion,$sql);  
if(mysqli_num_rows($result) > 0){ 
    $row=mysqli_fetch_row($result); 
    $id_producto=$row[0];
    $fecha = $_POST['date'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $precio_venta = $_POST['precio_venta'];
    $query = "INSERT INTO product_price(id_product, date, amount, price,sale_price) 
                VALUES('$id_producto', '$fecha','$cantidad','$precio','$precio_venta')";
    //Abre la conexion a la BD y ejecuta el query
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo     
            header("location: ../vistas/vista_compras.php");
    }else{   
        header("location: ../vistas/vista_compras.php");
    }
}else{
    include '../vistas/vista_compras.php';
    echo '
        <script>               
        alert("Producto no existe, verifique en nombre del producto");   
        </script>
        ';
    header("location: ../vistas/vista_compras.php");
}
?>