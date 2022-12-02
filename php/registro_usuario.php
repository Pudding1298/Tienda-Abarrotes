<?php

    //Conexion a la BD
    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    //hash para encriptar contraseñas
    $clave_encript = hash('sha512', $clave);

    
    $query = "INSERT INTO usuarios(Nombre_completo, Correo, Usuario, Clave) 
            VALUES('$nombre_completo', '$correo', '$usuario', '$clave_encript')";

    //Evitar repeticion de correos en la BD
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo='$correo'");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo 
        '<script>
            alert("Este correo ya existe, intenta con otro diferente");
            window.location = "../index.php";
        </script>';
        exit();
    }

    //Evitar repeticion de Usuarios en la BD
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario='$usuario'");
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo 
        '<script>
            alert("Este usuario ya existe, intenta con otro diferente");
            window.location = "../index.php";
        </script>';
        exit();
    }
    //Abre la conexion a la BD y ejecuta el query
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo 
            '<script>
                alert("Usuario almacenado exitosamente");
                window.location = "../index.php";
            </script>';
    }else{
        echo 
        '<script>
            alert("Intente de nuevo, error al registrarse");
            window.location = "../index.php";
        </script>';
    }

?>

