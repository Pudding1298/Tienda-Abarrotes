<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tablero Principal</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../vistas/pag_principal.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Tablero Principal</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Productos -->
            <div class="col-lg-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php         
                $conexion = mysqli_connect("localhost","root", "", "abarrotes");
                $sql = "SELECT COUNT(p.id_product) as producto FROM product p";
                $result= mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){            
                ?>
                        <h4 id="totalProductos"><?php echo $mostrar['producto'] ?></h4>
                        <?php
                }
                ?>
                        <p style="font-size: 13px;">Productos registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>                 
                </div>
            </div>
            <!-- Compras -->
            <div class="col-lg-2">
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php                         
                $sql = "SELECT SUM(p.price*p.amount) as compras FROM product_price p
                Where YEAR(p.date) =YEAR(curdate()) and MONTH(p.date) =MONTH(curdate())";
                $result= mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){            
                ?>
                        <h4 id="totalCompras"><?php echo "$ ",$mostrar['compras'] ?></h4>
                        <?php
                }
                ?>
                        <p style="font-size: 13px;">Total de compras</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>             
                </div>
            </div>
            <!-- Ventas -->
            <div class="col-lg-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
                $sql = "SELECT SUM(s.total_price) as ventas FROM sell s
                Where YEAR(s.date) =YEAR(curdate()) and MONTH(s.date) =MONTH(curdate())";
                $result= mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){            
                ?>
                        <h4 id="totalVentas"><?php echo "$ ",$mostrar['ventas'] ?></h4>
                        <?php
                }
                ?>
                        <p style="font-size: 13px;">Total de ventas</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-cart"></i>
                    </div>                    
                </div>
            </div>
            <!-- Ventas dia actual -->
            <div class="col-lg-2">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <?php                         
                $sql = "SELECT SUM(sell.total_price) as ventas FROM sell
                WHERE sell.date = curdate()";
                $result= mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){            
                ?>
                        <h4 id="ventasDia"><?php echo "$ ",$mostrar['ventas'] ?></h4>
                        <?php
                }
                ?>
                        <p style="font-size: 13px;">Ventas de hoy</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-calendar"></i>
                    </div>                  
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    <!-- row Grafico de barras -->
    <div class="row">

        <div class="col-12">

            <div class="card card-info">

                <div class="card-header">

                    <h3 class="card-title" id="title-header"></h3>

                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>

                    </div> <!-- ./ end card-tools -->

                </div> <!-- ./ end card-header -->


                <div class="card-body">

                    <div class="chart">

                        <canvas id="barChart" style="min-height: 250px; height: 300px; max-height: 350px; width: 100%;">

                        </canvas>

                    </div>

                </div> <!-- ./ end card-body -->

            </div>

        </div>

    </div><!-- ./row Grafico de barras -->
</div>
<!-- /.content -->
<script>
/* =======================================================
    SOLICITUD AJAX GRAFICO DE BARRAS DE VENTAS DEL MES
    =======================================================*/
$.ajax({
    url: "../ajax/dashboard.ajax.php",
    method: 'POST',
    data: {
        'accion': 1 //parametro para obtener las ventas del mes
    },
    dataType: 'json',
    success: function(respuesta) {
        //console.log("respuesta", respuesta);

        var fecha_venta = [];
        var total_venta = [];        

        var total_ventas_mes = 0;

        for (let i = 0; i < respuesta.length; i++) {

            fecha_venta.push(respuesta[i]['fecha_venta']);
            total_venta.push(respuesta[i]['total_venta']);            
            total_ventas_mes = parseFloat(total_ventas_mes) + parseFloat(respuesta[i][
                'total_venta'
            ]);

        }

        total_venta.push(0);
        // total_venta.push(600);

        // console.log(total_ventas_mes);

        $(".card-title").html('Ventas del Mes: $ ' + total_ventas_mes.toString().replace(
            /\d(?=(\d{3})+\.)/g, "$&,"));

        var barChartCanvas = $("#barChart").get(0).getContext('2d');

        var areaChartData = {
            labels: fecha_venta,
            datasets: [{
                label: 'Ventas del Mes',
                backgroundColor: 'rgba(60,141,188,0.9)',
                data: total_venta
            }]
        }

        var barChartData = $.extend(true, {}, areaChartData);

        var temp0 = areaChartData.datasets[0];

        barChartData.datasets[0] = temp0;

        var barChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            events: false,
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            },
            animation: {
                duration: 500,
                easing: "easeOutQuart",
                onComplete: function() {
                    var ctx = this.chart.ctx;
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global
                        .defaultFontFamily, 'normal',
                        Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function(dataset) {
                        for (var i = 0; i < dataset.data.length; i++) {
                            var model = dataset._meta[Object.keys(dataset
                                    ._meta)[0]].data[i]._model,
                                scale_max = dataset._meta[Object.keys(dataset
                                    ._meta)[0]].data[i]._yScale.maxHeight;
                            ctx.fillStyle = '#444';
                            var y_pos = model.y - 5;
                            // Make sure data value does not get overflown and hidden
                            // when the bar's value is too close to max value of scale
                            // Note: The y value is reverse, it counts from top down
                            if ((scale_max - model.y) / scale_max >= 0.93)
                                y_pos = model.y + 20;
                            ctx.fillText(dataset.data[i], model.x, y_pos);
                        }
                    });
                }
            }
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })


    }
});
</script>