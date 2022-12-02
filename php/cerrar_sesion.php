<?php
    //Cerrar Pagina
    session_start();
    session_destroy();
    header("location: ../index.php");

?>