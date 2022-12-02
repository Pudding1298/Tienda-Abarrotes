<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Realizar venta</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../vistas/pag_principal.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Realizar venta</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <link rel="stylesheet" href="default.css">
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!--[I]-Campo y botón para agregar el producto-->
        <form class="row g-3" action="vender.php" method="POST" autocomplete="off">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="productCode"> Nombre del producto</label>
                    <form action="#" autocomplete="off" method="POST">
                        <div class="autocompletar ">
                            <input required type="text" name="productCode" id="productCode" key='productCode'
                                placeholder="Escribe el nombre del producto">
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <label for="cantidad"> Cantidad a vender</label>
                    <input id="cantidad" placeholder="Cantidad a vender" value="1" type="number" name="cantidad"
                        key="cantidad" min="1" pattern="^[0-9]+" required>
                </div>
                <div class="col-md-4">
                    <br>
                    <button name="agregarP" id="agregarP" key="agregarP" type="submit" class="btn btn-primary">Agregar a
                        la lista</button>
                </div>
            </div>

        </form>
        <!--[F]-Campo y botón para agregar el producto-->
        <br>
        <!--[I]-Mostrar la lista en forma de tabla-->
        <table id="Lista" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id producto</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Lote</th>
                    <th>Precio</th>
                    <th>Cancelar</th>
                </tr>
            </thead>
            <tbody>
                <?php         
                $conexion = mysqli_connect("localhost","root", "", "abarrotes");
                $sql = "SELECT * FROM detail_sell";
                $result= mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){            
                ?>
                <tr>
                    <td><?php echo $mostrar['id_product'] ?></td>
                    <td><?php echo $mostrar['pName'] ?></td>
                    <td><?php echo $mostrar['pDate'] ?></td>
                    <td><?php echo $mostrar['pBatch'] ?></td>
                    <td><?php echo $mostrar['pPrice'] ?></td>
                    <td><a
                            href="cancelar_producto.php?id=<?php echo $mostrar['id'] ?>&lote=<?php echo $mostrar['pBatch'] ?>">❌</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>



        <form action="ven.php" method="POST">
            <div class="row g-3">
                <div class="col-md-3">
                    <label>Dinero recibido:</label>
                    <input id="moneyReceived" type="number" name="moneyReceived" key="moneyReceived" min="1"
                        pattern="^[0-9]+" required>
                </div>
                <div class="col-md-3">
                    <label>Precio total:</label>
                    <input id="totalPrice" type="text" readonly="readonly" name="totalPrice" key="totalPrice" required
                        value="<?php
                                    $query="SELECT SUM(pPrice) FROM detail_sell";
                                    $result=mysqli_query($conexion,$query);
                                    $row=mysqli_fetch_array($result);
                                    $precioTotal=$row[0];
                                    echo $precioTotal
                                ?>">
                </div>
            </div>
            <br>
            <div>
                <button name="confirmarVenda" id="confirmarVenda" key="confirmarVenda" type="submit"
                    class="btn btn-success" onclick="alertaVenta()">Confirmar Venda</button>
            </div>
        </form>
        <br>
        <div class="row g-2">
            <div class="col-md-3">
                <form action="cancelar.php">
                    <button name="confirmarVenda" id="confirmarVenda" key="confirmarVenda" type="submit"
                        class="btn btn-danger">Cancelar Venda</button>
                </form>
            </div>
        </div>



    </div>
    <!--[F]-Mostrar la lista en forma de tabla-->
</div><!-- /.container-fluid -->
<script src="controlAutocompletar.js"></script>
<!--JS que controla el autocmpletar-->
<script src="alertas.js"></script>
</div>
<!-- /.content -->