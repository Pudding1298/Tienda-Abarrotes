<!--[I]-Funciones-->
<?php
    //Proceso para ingresar un item a la lista de venta
    if(isset($_POST['productCode'])){
        $conexion = mysqli_connect("localhost","root", "", "abarrotes");
        $productName = $_POST["productCode"];
        $cantProd = $_POST["cantidad"];

        //Obtener status del producto
        $query="SELECT p.status FROM product p WHERE p.name='$productName'";
        $result=mysqli_query($conexion,$query);
        $row=mysqli_fetch_array($result);
        $productStatus=$row[0];

        if($productStatus == 'Activo') {//En caso de que el producto se encuentre disponible
            while($cantProd >= 1){
                //Obtener id del producto mediante el nombre
                $query="SELECT p.id_product FROM product p WHERE p.name='$productName'";
                $result=mysqli_query($conexion,$query);
                $row=mysqli_fetch_array($result);
                $productCode=$row[0];
                
                //Obteniendo el lote del que se venderá
                $query="SELECT pp.batch FROM product_price pp WHERE pp.amount >= 1 AND pp.id_product='$productCode' ORDER BY pp.date";
                $result=mysqli_query($conexion,$query);
                $row=mysqli_fetch_array($result);
                $lote=$row[0];
        
                //Obteniendo la cantidad de producto que tiene el lote
                $result=mysqli_query($conexion,"SELECT pp.amount FROM product_price pp WHERE pp.amount >= 1 AND pp.id_product='$productCode' AND pp.batch='$lote' ORDER BY pp.date");
                $row=mysqli_fetch_array($result);
                $cantidad=$row[0];
                
                //Registrando producto en la lista
                $sql = "INSERT INTO detail_sell (id_product,pName,pDate,pBatch,pPrice) SELECT p.id_product, p.name, pp.date, pp.batch, pp.sale_price FROM product p INNER JOIN product_price pp WHERE p.id_product='$productCode' AND pp.batch='$lote'";
                $ejecutar = mysqli_query($conexion,$sql);
        
                //Reduciendo producto
                $sql2 = "UPDATE product_price SET amount=('$cantidad'-1) WHERE batch='$lote'";
                $ejecutar = mysqli_query($conexion,$sql2);
        
                $cantProd=$cantProd-1;
            }
            header("location: vista_ventas.php");
            exit();
        }else{//Si el producto se encuentra suspendido
            if($productStatus = 'Suspendido'){
                echo '<script language="javascript">alert("El producto se encuentra suspendido");</script>';
                header("location: vista_ventas.php");
                exit();
            }
        }
    }
?>