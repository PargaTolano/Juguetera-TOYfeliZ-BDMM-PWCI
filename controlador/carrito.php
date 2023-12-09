
<?php
include ('../classes/clase_controlador_carrito.php');

if (isset($_POST['action'])){
    $action = $_POST['action'];
    if ($action == 'getcarrito') 
    getcarrito();
    else if ($action == 'agregarproducto')
    agregarproducto();
    else if ($action == 'removerproducto')
    removerproducto();
    else if ($action == 'totalpagar')
    totalpagar();
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

function agregarproducto(){
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];

    $cantidad = $_POST['cantidad'];
    $ID_PRODUCTO = $_POST['ID_PRODUCTO'];

    $carrito = new CarritoControlador("", $cantidad, "", $ID_USUARIO, "", $ID_PRODUCTO);
    $carrito->Agregarproductos();
}

function removerproducto() {
  session_start();
  $ID_USUARIO = $_SESSION['ID_USUARIO'];

  $ID_PRODUCTO = $_POST['ID_PRODUCTO'];

  $carrito = new CarritoControlador("", "", "", $ID_USUARIO, "", $ID_PRODUCTO);
  $carrito->Removerproducto();
}

function totalpagar(){
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];
    $carrito = new CarritoControlador("", "", "", $ID_USUARIO, "", "");
    $carrito->buscartotal();
}
function vaciar(){
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];
    $carrito = new CarritoControlador("", "", "", $ID_USUARIO, "", "");
    $carrito->vaciartodo();
}
function Pagar(){
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];
    $carrito = new CarritoControlador("", "", "", $ID_USUARIO, "", "");
    $carrito->Comprar();
}


function deleteJuguetefromCarrito(){
    $carrito = new CarritoControlador("", "", "", "", "", "", "");
    $carrito->quitarproducto();
}