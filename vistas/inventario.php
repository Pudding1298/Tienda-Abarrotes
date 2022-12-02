<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Inventario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../vistas/pag_principal.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Inventario</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar producto
        </button><br><br>

        <!-- Modal -->
        <form class="row g-3" action="ingresar_producto.php" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-md-7">
                                    <label for="validationDefault05" class="form-label">Ingresar el nombre del
                                        producto</label>
                                    <input type="text" class="form-control" name="nombre_producto"
                                        id="validationDefault05" required placeholder="Nombre del producto">
                                </div>
                                <div class="col-md-9">
                                    <label for="file" class="form-label">Ingresar la imagen del
                                        producto</label>
                                    <input type="file" name="file" id="file" accept=".jpg,.png" required><br />
                                </div>
                                <div class="col-md-7">
                                    <label for="validationDefault05" class="form-label">Ingresar el nombre del
                                        proveedor</label>
                                    <input type="text" class="form-control" name="nombre_proveedor"
                                        id="validationDefault05" required placeholder="Nombre del Proveedor">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form><!-- Modal -->
        <!-- Modal -->
        <form class="row g-3" action="editar_producto.php" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="editar_imagen" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <input id="id" name="id" type="hidden">
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-md-7">
                                    <label for="nombre" class="form-label">Nombre del
                                        producto</label>
                                    <input type="text" class="form-control" name="nombre_producto" id="nombre_producto"
                                        required placeholder="Nombre del producto">
                                </div>
                                <div class="col-md-9">
                                    <label for="file" class="form-label">Imagen del
                                        producto</label>
                                    <input type="file" name="file" id="file" accept=".jpg,.png" required><br />

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form><!-- Modal -->
        <!-- Modal -->
        <form class="row g-3" action="editar_producto2.php" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="editar_estatus" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <input id="id1" name="id1" type="hidden">
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-md-7">
                                    <label for="nombre_producto1" class="form-label">Nombre del
                                        producto</label>
                                    <input type="text" class="form-control" name="nombre_producto1"
                                        id="nombre_producto1" required placeholder="Nombre del producto">
                                </div>
                                <div class="col-md-7">
                                    <label for="estatus1" class="form-label">Estatus del
                                        producto</label>
                                    <select class="form-select" name="estatus1" id="estatus1" required>
                                        <option selected disabled value="">Estatus</option>
                                        <option >Activo</option>
                                        <option >Suspendido</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form><!-- Modal -->
    </div>
    <br>
    <h5>Productos con stock</h5>
    <div class="container-fluid">
        <table id="inventario" name="inventario" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Id Producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Estatus</th>                  
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php         
                $conexion = mysqli_connect("localhost","root", "", "abarrotes");
                $sql = "SELECT p.id_product,p.name,p.image,p.supplier,p.status FROM product p";
                $result= mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_row($result)){            
                ?>
                <tr>
                    <td><?php echo $mostrar[0] ?></td>
                    <td><?php echo $mostrar[1] ?></td>
                    <td><img src="data:image/jpg;base64,<?php echo base64_encode($mostrar[2]) ?>" height="100"></td>
                    <td><?php echo $mostrar[3] ?></td> 
                    <td><?php echo $mostrar[4] ?></td>               
                    <td><button type="button" name="btnEditarProductoI" id="btnEditarProductoI"
                            class="btnEditarProductoI btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#editar_imagen">
                            Imagen
                        </button>
                        <button type="button" name="btnEditarProducto2" id="btnEditarProducto2"
                            class="btnEditarProducto2 btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#editar_estatus">
                            Estatus
                        </button>
                    </td>
                </tr>
                <?php                           
                }                
                ?>
            </tbody>
        </table>

    </div><!-- /.container-fluid -->
    <?php  include('ModalEditar.php'); ?>
</div><!-- /.content -->
<script>
$(document).ready(function() {
    table = $('#inventario').DataTable({
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
$('#inventario').on('click', '.btnEditarProducto2', function() {

    accion = 4; //seteamos la accion para editar

    $("#editar_estatus").modal('show');

    var data = table.row($(this).parents('tr')).data();
    console.log("🚀 ~ file: inventario.php ~ line 164 ~ $ ~ data", data)

    $("#id1").val(data[0]);
    $("#nombre_producto1").val(data[1]);
})
$('#inventario').on('click', '.btnEditarProductoI', function() {

    accion = 4; //seteamos la accion para editar

    $("#editar_imagen").modal('show');

    var data = table.row($(this).parents('tr')).data();
    //console.log("🚀 ~ file: inventario.php ~ line 164 ~ $ ~ data", data)

    $("#id").val(data[0]);
    $("#nombre_producto").val(data[1]);
})
</script>