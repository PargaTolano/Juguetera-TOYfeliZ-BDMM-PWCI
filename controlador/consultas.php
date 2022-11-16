<?php
include ('../classes/clase_controlador_consultas.php');

if (isset($_GET['action'])){
    $action = $_GET['action'];
    if ($action == 'HistorialCliente') 
    HistorialCliente();
    else if ($action == 'HistorialVendedor')
    HistorialVendedor();
}

function HistorialCliente(){
    
    $desde = $_GET['fecha1'];
    $hasta = $_GET['fecha2'];
    session_start();

    $ID_USUARIO = $_SESSION['ID_USUARIO'];
    $consulta = new HistorialControlador($desde, $hasta, $ID_USUARIO);
    $consulta->historialCliente();
}

function HistorialVendedor(){
    $desde = $_GET['fecha1'];
    $hasta = $_GET['fecha2'];
    session_start();
    $ID_USUARIO = $_SESSION['ID_USUARIO'];

    $consulta = new HistorialControlador($desde, $hasta, $ID_USUARIO);
    $consulta->historialVendedor();
}
