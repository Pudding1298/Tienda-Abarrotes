<?php

$conexion = mysqli_connect("localhost","root", "", "abarrotes");

//Disminuir cantidad en product_price
//Obtener las id de los diferentes productos
$query="SELECT DISTINCT id_product AS productos FROM detail_sell";
$result=mysqli_query($conexion,$query);

$contador=0;//Contador para recorrer array con los ids de productos

//Llenado del array (el array es $prod)
$prod = array();
$cont = 0;
while ($row = @mysqli_fetch_array($result)) {
   $prod[$cont] = $row['productos'];
   $cont++;
}


while($contador < sizeof($prod)){
    $idProducto=$prod[$contador];//Variable asignada por el casillero seleccionado por el contador

    //Obtener las id de los lotes
    $query="SELECT DISTINCT pBatch AS lote FROM detail_sell WHERE id_product='$idProducto'";
    $result=mysqli_query($conexion,$query);

    $contador2=0;//Contador para recorrer array con los ids de lotes

    //Llenado del array (el array es $lote)
    $lote = array();
    $cont = 0;
    while ($row = @mysqli_fetch_array($result)) {
        $lote[$cont] = $row['lote'];
        $cont++;
    }


    while($contador2 < sizeof($lote)){
        $lotes=$lote[$contador2];//Variable asignada por el casillero seleccionado por el contador 2

        //Variable que contiene la cantidad de producto
        $query="SELECT amount FROM product_price WHERE id_product='$idProducto' AND batch='$lotes'";
        $result=mysqli_query($conexion,$query);
        $row=mysqli_fetch_array($result);
        $existencia=$row[0];

        //Variable que contiene la cantidad de producto a restar
        $query="SELECT COUNT(pBatch) FROM detail_sell WHERE id_product='$idProducto' AND pBatch='$lotes'";
        $result=mysqli_query($conexion,$query);
        $row=mysqli_fetch_array($result);
        $vendido=$row[0];

        //Realizar disminución del stock del producto
        $query="UPDATE product_price SET amount=('$existencia'+'$vendido') WHERE batch='$lotes' AND id_product='$idProducto'";
        $ejecutar=mysqli_query($conexion,$query);

        $contador2=$contador2+1;//Incremento del contador2 para pasar a la siguiente id de lote
    }
    $contador=$contador+1;//Incremento del contador para pasar a la siguiente id de producto
}

$sql = "TRUNCATE TABLE detail_sell";
$ejecutar = mysqli_query($conexion,$sql);

header("location: vista_ventas.php");
exit();
?>

