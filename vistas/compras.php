<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Compras</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../vistas/pag_principal.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Compras</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-9">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Registrar compra
                </button>

                <!-- Modal -->
                <form class="row g-3" action="registrar_compra.php" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Registrar compra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-md-7">
                                            <label for="validationDefault04" class="form-label">Producto a
                                                comprar</label>
                                            <input type="text" name="producto" list="listamodelos" placeholder="Producto 00g" class="form-control">
                                            <datalist id="listamodelos">
                                                required>
                                                <?php
                                    $conexion = mysqli_connect("localhost","root", "", "abarrotes");
                                    $sql = "SELECT p.name FROM product p WHERE p.status= 'Activo'";
                                    $result= mysqli_query($conexion,$sql);
                                    while($mostrar=mysqli_fetch_row($result)){            
                                    ?>
                                                
                                                <option value="<?php echo $mostrar[0]?>"></option>
                                                <?php
                                    }?>
                                            </datalist>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="validationDefault05" class="form-label">Fecha de compra</label>
                                            <input type="date" class="form-control" name="date" id="validationDefault05"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="validationDefault03" class="form-label">Cantidad</label>
                                            <input type="number" class="form-control" name="cantidad" min="1"
                                                placeholder="Cantidad a compra" id="validationDefault03" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault02" class="form-label">Precio de compra</label>
                                            <input type="number" class="form-control" name="precio" min="1"
                                                placeholder="$ de compra" id="validationDefault02" required>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label for="validationDefault02" class="form-label">Precio de venta</label>
                                            <input type="number" class="form-control" name="precio_venta" min="1"
                                                placeholder="$ de compra" id="validationDefault02" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <br>
                <table id="Compras" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Lote</th>
                            <th>Producto</th>
                            <th>Fecha de compra</th>
                            <th>Cantidad</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php         
                        $conexion = mysqli_connect("localhost","root", "", "abarrotes");
                        $sql = "SELECT pp.batch,p.name,pp.date,pp.amount,pp.price,pp.sale_price FROM product_price pp
                        INNER JOIN product p ON pp.id_product=p.id_product";
                        $result= mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result)){            
                        ?>
                        <tr>
                            <td><?php echo $mostrar['batch'] ?></td>
                            <td><?php echo $mostrar['name'] ?></td>
                            <td><?php echo $mostrar['date'] ?></td>
                            <td><?php echo $mostrar['amount'] ?></td>
                            <td><?php echo $mostrar['price'] ?></td>
                            <td><?php echo $mostrar['sale_price'] ?></td>
                            <td>
                                <button type="button" name="btnEditarProducto" id="btnEditarProducto"
                                    class="btnEditarProducto btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#editar">
                                    Editar
                                </button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php  include('ModalEditar.php'); ?>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<script>
$(document).ready(function() {
    table = $('#Compras').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
});
</script>
<script>
/* ======================================================================================
    EVENTO AL DAR CLICK EN EL BOTON EDITAR PRODUCTO
    =========================================================================================*/
$('#Compras').on('click', '.btnEditarProducto', function() {

    accion = 4; //seteamos la accion para editar

    $("#editar").modal('show');

    var data = table.row($(this).parents('tr')).data();

    $("#lote").val(data[0]);
    $("#batch").val(data[0]);
    $("#nombre_producto").val(data[1]);
    $("#date").val(data[2]);
    $("#cantidad").val(data[3]);
    $("#precio").val(data[4]);
    $("#precio_venta").val(data[5]);
})
</script>