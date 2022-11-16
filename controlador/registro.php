<?php
include ('../classes/clase_controlador_registro.php');
//false en caso de que la variable sea NULL o no exista
//if(isset($_POST))

if (!empty( $_FILES["foto"]["name"])){

$fileName = basename($_FILES["foto"]["name"]);
$imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$allowedTypes = array("png", "jpg", "gif");

if (in_array($imageType, $allowedTypes)){
    $imageName = $_FILES["foto"]["tmp_name"]; //accede a la carpeta temporal de imgs del servidor (XAMP)
    $image64 = base64_encode(file_get_contents($imageName)); //codifica los bits en base 64
    
    $_realImage = 'data:image/'. $imageType. ';base64, '.$image64;

}else{
    echo "formato no valido.";
    exit();  
}
}else{
    echo "no subiste foto";
    exit();
}

$nombre = $_POST['Nombres'];
$apellido = $_POST['Apellidos'];
$correo = $_POST['Correo'];
$usuario = $_POST['Usuario'];
$contrasenia = $_POST['Contraseña'];
$nacimiento = $_POST['Nacimiento'];
$privacidad = 'Publico';
$sexo = $_POST['Sexo'];
$ID_ROL = $_POST['TipoCuenta'];
$foto = $_realImage;

$registro = new RegistroControlador($nombre, $apellido, $nacimiento, $usuario, $correo, $contrasenia, $sexo, $privacidad, $foto, $ID_ROL); 
$registro->registrarUsuarios();

//header ("location: ../index.php?error=none");