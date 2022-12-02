<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Top 10 productos más vendidos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../vistas_invitado/pag_principal.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Top 10 productos más vendidos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row ">
                <?php         
                $conexion = mysqli_connect("localhost","root", "", "abarrotes");
                $sql = "SELECT ROW_NUMBER() OVER(ORDER BY COUNT(d.id_product) DESC) as Top,p.name,p.image,COUNT(d.id_product) as Cantidad FROM product p
                INNER JOIN detail d ON p.id_product = d.id_product                
                GROUP BY d.id_product   
                ORDER BY COUNT(d.id_product) DESC
                limit 10";
                $result= mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_row($result)){            
                ?>
            <div class="col-sm-3">
                <div class="card" style="width: 10rem;">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($mostrar[2]) ?>" height="200"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Top <?php echo $mostrar[0] ?>:</h5>
                        <p class="card-text"><?php echo $mostrar[1] ?></p>
                    </div>
                </div>
            </div>
            <?php                           
                }                
                ?>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->