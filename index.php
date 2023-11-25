<?php
session_start();
?>

<?php
        if (isset($_SESSION["correo_usuario"])){
            echo '<script type="text/javascript"> window.location.href = "inicio.php"; </script>';
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Jugueteria BK </title>

    <link  rel="stylesheet" type="text/css" href = "./css/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/LOGO.png">

</head>
<body style=" overflow: hidden">
    <!-- landing page -->
    <div class="container-fluid ">
        <div class = "row vh-100 landing-page">
            <div class="col-6 d-none d-sm-none d-md-block p-0" >
                <img class="w-100 h-100" style="object-fit: cover;" src="images/wallpaper2.png">
            </div>
            <div class="col-12 col-md-6 bg-light p-0" >
                <img width="100px" class="py-2" src="images/logo.png">
                <div class="text-center px-2 px-md-5 py-5">
                    <h1 class ="Titulos"> JUGUETERIA TOYfeliZ </h1>
                    <h4 style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> En TZ encontrarás todo tipo de juguetes para tus hijos al mejor precio y de excelente calidad.</h4>
                    <button type="button" id="Registrase" class="btn btn-primary btn-info btn_titulo w-100 mb-4" data-bs-toggle="modal" data-bs-target="#registroModal" >REGISTRATE AQUI</button>
                    <label class="w-100 mb-4" style="color: rgb(81, 95, 95);"> Al registrarte, aceptas los Términos de servicio y la Política de privacidad, incluida la política de Uso de Cookies.</label>
                    <hr>
                    <label class="w-100 mb-4" style="color: rgb(81, 95, 95);"> ¿Ya tienes una cuenta? inicia sesión </label>
                    <button type="button" id="inciarSesion" class="btn btn-primary btn-info w-100 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal"> Inicia sesión </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de inicio sesión -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="inicio.php" method="POST" id="form_login">


                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title Titulos" id="exampleModalLabel">Ingresar</h5>
                        
                    </div>
                <div class="modal-body">
                        <input type="text" name="nombre_usuario" class="full_input" placeholder="Nombre de usuario o correo" required>
                        <input type="password" name="contraseña" class="full_input" placeholder="Contraseña" required >
                        <input type="checkbox" id="recordar" name="recordar">
                        <label for="recordar"> Recordar contraseña </label><br>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-warning" data-dismiss="modal"> Cerrar </button>
                        <input type="submit" id ="Ingresar" class="btn btn-primary btn-info" value="Ingresar" name="">
                    </div>
                </div>
            </form>
        </div>
    </div>

      <!-- Modal de registro -->

    <div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="inicio.php" method="POST" id="form_registro" enctype = "multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title Titulos" id="exampleModalLabel">Crear perfil</h5>
                    </div>
                <div class="modal-body">
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Nombre: </label>
                    <input type="text" name="Nombres" class="full_input " id="Nombres" placeholder="Nombre" maxlength="50">
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Apellidos: </label>
                    <input type="text" name="Apellidos" class="full_input" id="Apellidos" placeholder="Apellidos" maxlength="50">
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Correo electrónico: </label>
                    <input type="text" name="Correo" class="full_input " id="Correo" placeholder="Correo electrónico" maxlength="50">
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Nombre de usuario: </label>
                    <input type="text" name="Usuario" class="full_input " id="Usuario" placeholder="Nombre de usuario" maxlength="10">
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Contraseña: </label>
                    <input type="password" name="Contraseña" class="full_input Contraseña" id="Contraseña" placeholder="Contraseña" maxlength="50">
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Fecha de nacimiento: </label>
                    <input type="date" name="Nacimiento" class="full_input" id="fechaNacimiento" required >
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Tipo de cuenta: </label>
                    <select name="TipoCuenta" id="TipoCuenta" class="full_input">
                        <option value="1"> Cliente </option>
                        <option value="2"> Vendedor </option>
                    </select>
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Sexo: </label>
                    <input  type="radio" name="Sexo" id="flexRadioDefault1" value="Hombre" checked> 
                    <label class="form-check-label" for="flexRadioDefault1">Hombre </label>
                    <br> <br>
                    <input  type="radio" name="Sexo" id="flexRadioDefault2"  value="Mujer" >
                    <label class="form-check-label" for="flexRadioDefault2"> Mujer </label>


                    <br> <br>
                    <label style="width: 100%; margin-bottom: 20px; color: rgb(81, 95, 95);"> Foto de perfil: </label>
                    <input type="file" name="foto" id="foto" required>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-warning" data-dismiss="modal"> Cerrar </button>
                        <input type="submit" id="Registrarse" class="btn btn-primary btn-info" value="Registrar" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="./js/login_registro.js"></script>

</body>
</html>