<?php

require_once "../controladores/dashboard.controlador.php";
require_once "../modelos/dashboard.modelo.php";

class AjaxDashboard{    

    public function getVentasMesActual(){
        $ventasMesActual = DashboardControlador::ctrGetVentasMesActual();
        echo json_encode($ventasMesActual);
    }
  
}


if(isset($_POST['accion']) && $_POST['accion'] == 1){ //Ejecutar function ventas del mes (Grafico de Barras)

    $ventasMesActual = new AjaxDashboard();
    $ventasMesActual -> getVentasMesActual();

}else{
    $datos = new AjaxDashboard();
    $datos -> getDatosDashboard();
}