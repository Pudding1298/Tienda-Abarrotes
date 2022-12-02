<?php

require_once "conexion.php";

class DashboardModelo{
    

    static public function mdlGetVentasMesActual(){

        $stmt = Conexion::conectar()->prepare('call prc_ObtenerVentasMesActual');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}