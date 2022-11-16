
<?php
include ('../classes/clase_controlador_listas.php');

if (isset($_POST['action'])){
    $action = $_POST['action'];
    if ($action == 'getcarrito') 
    getcarrito();
    else if ($action == 'deleteJuguetefromCarrito')
    deleteJuguetefromCarrito();
    else if ($action == 'Pagar')
    Pagar();
    else if ($action == 'vaciar')
    vaciar();
}

function getcarrito(){
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];
    $carrito = new CarritoControlador("", "", "", $ID_USUARIO, "", "");
    $carrito->MostrarProuctos();
}

function deleteJuguetefromCarrito(){
    $carrito = new CarritoControlador("", "", "", "", "", "", "");
    $carrito->quitarproducto();
}
function vaciar(){
    $carrito = new CarritoControlador("", "", "", "", "", "", "");
    $carrito->vaciartodo();
}
function Pagar(){
    $ID_LISTA = $_POST['ID_LISTA'];
    $carrito = new CarritoControlador("", "", "", "", "", $ID_LISTA, "");
    $carrito ->Pagar();
}
