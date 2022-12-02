<?php

    session_start();

    if(isset($_SESSION['Usuario'])){
        require_once "controladores/plantilla.controlador.php";
        $plantilla = new PlantillaControlador();
        $plantilla -> CargarPlantilla();
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/estilos.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar en la pagina</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesion</button>
                </div>

                <div class="caja__trasera-register">
                    <h3>¿No eres administrador?</h3>
                    <p>Puedes iniciar como invitado</p>                                   
                </div>
            </div>
            <!--Formulario de login y registro-->
            <div class="contenedor__login-register">
                <!--Login inicir sesion-->
                <form action="php/login_usuario.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesion</h2>
                    <input type="text" placeholder="Nombre de usuario" name="usuario">

                    <input type="password" placeholder="Contraseña" name="clave">
                    <button>Entrar</button>
                    <br>
                    <br>
                    <div >                        
                            <p>Ingresar como <a href="vistas_invitado/pag_principal.php">invitado</a>.</p>                        
                    </div>
                </form>              
            </div>
        </div>
    </main>

    <script src="assets/js/script.js"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
</body>

</html>