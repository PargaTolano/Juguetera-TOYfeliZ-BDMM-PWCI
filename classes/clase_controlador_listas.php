<?php
include ('../classes/clase_listas.php');

class ListasControlador extends Listas {
    private $nombre;
    private $descripcion;
    private $imagenes;
    private $privacidad;
    private $ID_CLIENTE;
    private $ID_PRODUCTOS;
    private $ID_LISTA;

    public function __construct($nombre, $descripcion, $privacidad, $imagenes, $ID_CLIENTE, $ID_LISTA, $ID_PRODUCTOS){
        $this->nombre= $nombre;
        $this->descripcion= $descripcion;
        $this->privacidad= $privacidad;
        $this->imagenes= $imagenes;
        $this->ID_CLIENTE= $ID_CLIENTE;
        $this->ID_PRODUCTOS= $ID_PRODUCTOS;
        $this->ID_LISTA= $ID_LISTA;

    }
    
    public function MostrarListas(){
        $this->Cargarlistas($this->ID_CLIENTE);
    }

    public function MostrarListasPublicas(){
        $this->CargarListasPublicas();
    }

    public function MostrarListafullInfo(){
        $this->CargarlistaInfo($this->ID_LISTA);
    }
    public function InsertarLista(){
        if ($this->inputVacio() == false) {
            echo "Campos vacios";
            header ("location: ../indice.php?error=inputVacioLlenatodowe");
            exit();
        }
        $this->CrearLista($this->nombre, $this->descripcion, $this->ID_CLIENTE, $this->privacidad, $this->imagenes);
        echo "Se agrego la lista.";
    }
    
    public function Agregarproducto(){
        $this->InsertarDeseo($this->ID_PRODUCTOS, $this->ID_LISTA, $this->ID_CLIENTE);
        echo "Se agrego el producto.";
    }

    private function inputVacio(){
        $check;
        if (empty ($this->nombre) || empty ($this->descripcion) || empty ($this->imagenes)|| empty ($this->privacidad)||
        empty ($this->ID_CLIENTE)){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
}


?>