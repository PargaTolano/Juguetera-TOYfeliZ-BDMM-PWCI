<?php
session_start();
?>

<?php
    if (!(isset($_SESSION["correo_usuario"]))){
        echo '<script type="text/javascript"> window.location.href = "index.php"; </script>';
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TOYfeliZ </title>

    <link  rel="stylesheet" type="text/css" href = "./css/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/LOGO.png">
</head>


<body style=" background:url(https://images7.alphacoders.com/333/thumb-1920-333950.jpg);
    background-size: cover;">



<header>
        <nav>
            <div class="container-fluid py-3" style=" background-color: pink;">
                <div class="row">
                    <div class="col-2 py-1" id = "logo">
                        <img class="logo" src="images/logo.png" width="40px" height="40px">
                        <img src="images/LOGO_large.png"  height="40px">

                    </div>
                    <div class="col-5 py-1 text-center" >
                        <form class="d-flex" action="" method="GET" id="FormSearch">
                            <input type="search" id = "busqueda" class="w-100" placeholder="Buscar juguetes">
                            <input type="submit" value="buscar"  id = "buscar" class="btn btn-primary btn-info text-end">
                        </form>
                    </div>
                    
                    <div class="col-5 py-1 text-end">
                            <?php
                                if ($_SESSION['ID_ROL']==1){
                                    
                            ?>
                                <button type="button" id="Listas" class="btn btn-primary btn-info" > Mis Listas </button> <button type="button" id="Carrito" class="btn btn-primary btn-info"> Carrito </button>
                                <button type="button" id="Consultas" class="btn btn-primary btn-info" > Consultas </button>

                           <?php
                                } else  if ($_SESSION['ID_ROL']==2){
                            ?>
                                    <button type="button" id="Consultas" class="btn btn-primary btn-info" > Consultas </button>

                            <?php
                                }   
                            ?>

                        <div class="dropdown">
                            <img class="icon" style="object-fit: cover;" id = "icon" src="images/LOGO.png"  width="40px" height="40px">
                            <label id = "nombre_usuario"></label>
                            <div class="dropdown-content">
                                <a href="perfil_usuario.php?user=<?php echo $_SESSION['username_usuario'] ?>" style= "text-decoration: none;"> Ver perfil </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </nav>
    </header>