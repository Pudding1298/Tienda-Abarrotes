<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-9">
        <h1 class="m-0">Ventas</h1>
        </div><!-- /.col -->
        <div class="col-sm-9">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../vistas/pag_principal.php">Inicio</a></li>
            <li class="breadcrumb-item active">Ventas</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
    <table id="Ventas" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id venta</th>
                <th>Fecha</th>
                <th>Total</th>                             
            </tr>
        </thead>        
        <tbody>
        <?php         
         $conexion = mysqli_connect("localhost","root", "", "abarrotes");
         $sql = "SELECT s.id_sell,s.date,s.total_price FROM sell s";
         $result= mysqli_query($conexion,$sql);
         while($mostrar=mysqli_fetch_array($result)){            
        ?>
            <tr>
                <td><?php echo $mostrar['id_sell'] ?></td>
                <td><?php echo $mostrar['date'] ?></td>
                <td><?php echo $mostrar['total_price'] ?></td>                            
            </tr>
        <?php
         }
        ?>
        </tbody>        
        <tfoot>
            <tr>
                <th>Id venta</th>
                <th>Fecha</th>
                <th>Total</th>                  
            </tr>
        </tfoot>
    </table>    
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<script>
        $(document).ready(function () {        
        $('#Ventas').DataTable({
            language:{
                url:"https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
        }); 
    </script>    