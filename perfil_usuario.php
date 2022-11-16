<?php
include('./templates/header.php');
?>


<section>
<br>
    <div class="container bg-light text-center" style="padding: 30px">
        <img src=""  style="border-radius: 50%;"  width = 200px height =200px alt="" id ="foto_pefil" name="foto">
        <div style="padding: 20px" id="perfilbuttons">

        </div>
        
        <hr>
        
        <p id="USER"> Usuario </p>
        <p id="PRIVACIDAD"> USUARIO PRIVADO / PUBLICO si es publico se mostrara todo, si no, este mensaje es lo último que se muestra</p>
        
        <p id="NOMBRES">Nombre + Apellidos</p>
        <p id="NACIMIENTO"> Fecha nacimiento </p>
        <p id="CORREO"> Correo@dominio.com </p>
        <p id ="txtq"> Se unio en: </p> <label id="UNIONALAPLATAFORMA"> </label> <br>
        <?php
            if ($_SESSION['ID_ROL']==1){
                echo '<p> Rol de usuario: Cliente </p>';
        ?>

        <?php
            } else  if ($_SESSION['ID_ROL']==2){
                echo '<p> Rol de usuario: Vendedor </p>';

        ?>

        <?php
            } else  if ($_SESSION['ID_ROL']==3){
                echo '<p> Rol de usuario: Administrador </p>';
            }
        ?>

        <!--   Si el perfil es tuyo se muestra este boton   -->

        <!--<p> Si es vendedor se mostrarán los productos que vende, si es cliente, se mostraran sus listas, si es admin los productos de autorizó </p> -->

        <?php
            if ($_SESSION['ID_ROL']==1){
            
        ?>
        <div class="container" id ="listas_usuario"> <H2 class="Titulos"> LISTAS </H2> <a href=""> Lista #1 </a> <br><a href=""> Lista #2 </a> <br><a href=""> Lista #3 </a> <br> </div>
        
        <?php
            }
        ?>

        <?php
            if ($_SESSION['ID_ROL']==3){
            
        ?>
        <div class="container"> <H2 class="Titulos"> PRODUCTOS QUE AUTORIZÓ </H2> <div class="container-fluid separadorDoble" > <div class="row"><div class="col-3 text-center" ><img src="imagenes/LOGO.png" class="img-thumbnail" width="200px" alt=""> </div> <div class="col-9 bg-info separador" > <p> Categoria </p> <p> Nombre producto </p> <p> Descripcion dsdasdasdsadasdsddddddddddddddddddddddddddddd </p> <p> Precio o para cotizar </p> <div align = "right"> <button type="button" id="Ver" class="btn btn-primmary bg-warning" style="right: 10px;"> Ver </button> </div> </div> </div> </div> </div>

        <?php
            }
        ?>
        
     </div>
</section>

<?php
include('./templates/footer.php');
?>
