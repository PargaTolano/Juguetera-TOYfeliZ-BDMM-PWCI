
<?php
include ('../classes/clase_controlador_listas.php');

if (isset($_POST['action'])){
    $action = $_POST['action'];
    if ($action == 'getlistas') 
    getlistas();
    else if ($action == 'setTOlist')
    setTOlist();
    else if ($action == 'getlistaINFO')
    getlistaINFO();
    else if ($action == 'getlistaspublicas')
    getlistaspublicas();
}
else {
    $imagenes = $_FILES['imagenes']['name'];
    $i =0;
    foreach($imagenes as $selected):
        $fileName = basename($selected);
        $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = array("png", "jpg", "gif");

        if (in_array($imageType, $allowedTypes)){
            $imageName = $_FILES["imagenes"]["tmp_name"][$i]; //accede a la carpeta temporal de imgs del servidor (XAMP)
            $image64 = base64_encode(file_get_contents($imageName)); //codifica los bits en base 64
            $_realImage[] = 'data:image/'. $imageType. ';base64, '.$image64;

        }else{
            echo "formato no valido.";
            exit();  
        }
        $i=$i+1;
    endforeach;

    $nombre = $_POST['NOMBRE'];
    $descripcion = $_POST['DESCRIPCION'];
    $imagenes = $_realImage;
    $privacidad = $_POST['privacidad'];
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];
    
    $juguetes = new ListasControlador($nombre, $descripcion, $privacidad, $imagenes, $ID_USUARIO, "", "");
    $juguetes->InsertarLista();
}


function getlistas(){
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];
    $juguetes = new ListasControlador("", "", "", "", $ID_USUARIO, "", "");
    $juguetes->MostrarListas();
}

function getlistaspublicas(){
    $juguetes = new ListasControlador("", "", "", "", "", "", "");
    $juguetes->MostrarListasPublicas();
}

function getlistaINFO(){
    $ID_LISTA = $_POST['ID_LISTA'];
    $juguetes = new ListasControlador("", "", "", "", "", $ID_LISTA, "");
    $juguetes->MostrarListafullInfo();
}

function setTOlist(){
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];
    $ID_LISTA = $_POST['ID_LISTA'];
    $ID_PRODUCTO = $_POST['ID_PRODUCTO'];
    $juguete = new ListasControlador("", "", "", "", $ID_USUARIO, $ID_LISTA ,$ID_PRODUCTO);
    $juguete->Agregarproducto();    
}