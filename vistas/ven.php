<?php
    $conexion = mysqli_connect("localhost","root", "", "abarrotes");

    $moneyReceived = $_POST["moneyReceived"];
    $totalPrice = $_POST["totalPrice"];

    if($moneyReceived >= $totalPrice){
        //Registro en la venta completa
        //Obteniendo el precio total
        $query="SELECT SUM(pPrice) FROM detail_sell";
        $result=mysqli_query($conexion,$query);
        $row=mysqli_fetch_array($result);
        $precioTotal=$row[0];

        $sql="INSERT INTO sell (id_sell, date, total_price) VALUES (null, curdate(), '$precioTotal')";
        $ejecutar = mysqli_query($conexion,$sql);

        //---------------------------------------------------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------------------------------------------------

        //Registro en el detalle
        //Obtener la id del registro recién creado
        $query="SELECT @@identity";
        $result=mysqli_query($conexion,$query);
        $row=mysqli_fetch_array($result);
        $idNuevoRegistro=$row[0];

        //Hacer obtener las id de los productos
        $query="SELECT DISTINCT id_product AS productos FROM detail_sell";
        $result=mysqli_query($conexion,$query);

        $contador=0;//Contador para recorrer array con los ids

        //Llenado del array (el array es $dir)
        $dir = array();
        $cont = 0;
        while ($row = @mysqli_fetch_array($result)) {
        $dir[$cont] = $row['productos'];
        $cont++;
        }

        while($contador < sizeof($dir)){
            //Impleementar metodo iterativo que se repita hasta que se termine el vector que contiene las id de los productos
            $idProductos=$dir[$contador];//<--Vector que contiene las id de los productos

            //Obtener cantidad del producto vendido (sin diferenciar lotes)
            $query="SELECT COUNT(id_product) FROM detail_sell WHERE id_product='$idProductos'";
            $result=mysqli_query($conexion,$query);
            $row=mysqli_fetch_array($result);
            $cantidadProductos=$row[0];

            //Obtener precio total del producto vendido (sin diferenciar lotes)
            $query="SELECT SUM(pPrice) FROM detail_sell WHERE id_product='$idProductos'";
            $result=mysqli_query($conexion,$query);
            $row=mysqli_fetch_array($result);
            $precioTotalPorPorducto=$row[0];

            //Insertar los datos en el detalle
            $sql="INSERT INTO detail (id_product, id_sell, cuantity, total_price_product) VALUES ('$idProductos', '$idNuevoRegistro', '$cantidadProductos', '$precioTotalPorPorducto')";
            $ejecutar = mysqli_query($conexion,$sql);
            $contador=$contador+1;
        }

        //---------------------------------------------------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------------------------------------------------

        $sql = "TRUNCATE TABLE detail_sell";
        $ejecutar = mysqli_query($conexion,$sql);

        header("location: vista_ventas.php");
        exit();
    }else{
        header("location: vista_ventas.php");
        exit();
    }
?>