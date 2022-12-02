<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Reportes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../vistas/pag_principal.php">Inicio</a></li>
            <li class="breadcrumb-item active">Reportes</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
    <table id="Reportes" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Total</th>                                         
            </tr>
        </thead>        
        <tbody>
        <?php         
         $conexion = mysqli_connect("localhost","root", "", "abarrotes");
         $sql = "SELECT date,SUM(total_price) as total FROM sell 
         GROUP BY date";
         $result= mysqli_query($conexion,$sql);
         while($mostrar=mysqli_fetch_array($result)){            
        ?>
            <tr>
                <td><?php echo $mostrar['date'] ?></td>
                <td><?php echo $mostrar['total'] ?></td>                   
            </tr>
        <?php
         }
        ?>
        </tbody>        
        <tfoot>
            <tr>
                <th>Id Producto</th>
                <th>Nombre</th>                    
            </tr>
        </tfoot>
    </table>    
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<script>
        $(document).ready(function () {        
        $('#Reportes').DataTable({
            language:{
                url:"https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
        });
    </script>  