<?php
include ('../classes/clase_controlador_busqueda.php');

if (isset($_GET['action'])){
    $action = $_GET['action'];
    if ($action == 'searchUser') 
    searchUser();
    else if ($action == 'searchToys')
    searchToys();
}

function searchToys(){
    $busqueda = $_GET['busqueda'];
    $buscar = new BusquedaControlador($busqueda);
    $buscar->MostrarBuscados();
}

function searchUser(){
    $busqueda = $_GET['busqueda'];

    $buscar = new BusquedaControlador($busqueda);
    $buscar->MostrarBuscados();
}
