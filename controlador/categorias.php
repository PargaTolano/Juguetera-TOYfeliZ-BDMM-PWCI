<?php
include ('../classes/clase_controlador_categorias.php');

$action = $_GET['action'];

if ($action == 'setCategories') 
    setCategories();
else if ($action == 'getCategories')
getCategories();


function setCategories() {

    $nombre = $_GET['nombreCateg'];
    $descripcion = $_GET['descripcionCateg'];
    
    session_start();

    $ID_VENDEDOR = $_SESSION['ID_USUARIO'];

    $categoria = new CategoriesControlador($nombre, $descripcion, $ID_VENDEDOR); 
    $categoria->InsertarCategoria();

    //header ("location: ../inicio.php?error=none");
}

function getCategories() {
    
    $categoria = new CategoriesControlador("", "", ""); 
    $categoria->Mostrar();
    //header ("location: ../inicio.php?error=none");
}

