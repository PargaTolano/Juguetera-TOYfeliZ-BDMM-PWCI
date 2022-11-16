<?php
include ('../classes/clase_controlador_InicioSesion.php');

    $correo = $_POST['nombre_usuario'];
    $contrasenia = $_POST['contraseña'];

    $login = new InicioSesionControlador($correo, $contrasenia); 
    $login->iniciarSesion();

    //header ("location: ../index.php?error=none");


    