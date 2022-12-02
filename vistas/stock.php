<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Productos con stock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../vistas/pag_principal.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Productos con stock</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <table id="stock" name="stock" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id Producto</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php         
                $conexion = mysqli_connect("localhost","root", "", "abarrotes");
                $sql = "SELECT p.id_product,p.name,p.image,SUM(pp.amount) AS Cantidad FROM product p
                INNER JOIN product_price pp ON p.id_product = pp.id_product
                WHERE p.status = 'Activo'
                GROUP BY p.id_product";
                $result= mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_row($result)){  
                    if($mostrar[3]>0){ 
                ?>
                <tr>
                    <td><?php echo $mostrar[0] ?></td>
                    <td><?php echo $mostrar[1] ?></td>
                    <td><img src="data:image/jpg;base64,<?php echo base64_encode($mostrar[2]) ?>" height="100"></td>
                    <td><?php echo $mostrar[3] ?></td>
                </tr>
                <?php 
                    }                      
                }                
                ?>
            </tbody>
        </table>

    </div><!-- /.container-fluid -->
</div><!-- /.content -->
<script>
$(document).ready(function() {
    table = $('#stock').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });
});
</script>