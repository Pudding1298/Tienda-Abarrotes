<?php

    session_start();
    //Conexion a la BD
    include 'conexion_be.php';

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $clave_encript = hash('sha512', $clave);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios 
    WHERE usuario = '$usuario' and Clave = '$clave_encript'");

    //Valida correo y contraseña para iniciar sesion
    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['Usuario'] = $usuario;        
        header("location: ../vistas/pag_principal.php");        
        exit();
    }else{        
        echo '
        <script>        
        window.location = "../index.php";
        alert("Usuario no existe, verifique los datos introducidos");   
        </script>
        ';
        exit();
    }

?>