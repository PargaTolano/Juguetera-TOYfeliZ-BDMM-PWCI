<?php
include ('../classes/clase_categorias.php');

class CategoriesControlador extends Categories {
    private $nombre;
    private $descripcion;
    private $ID_VENDEDOR;
    private $ID_CATEGORIA;


    public function __construct($nombre, $descripcion, $ID_VENDEDOR){
        $this->nombre= $nombre;
        $this->descripcion= $descripcion;
        $this->ID_VENDEDOR= $ID_VENDEDOR;
    }
    
    public function Mostrar(){
        $this->CargarCategorias();
    }

    public function InsertarCategoria(){
        if ($this->inputVacio() == false) {
            echo "Campos vacios";
            header ("location: ../indice.php?error=inputVacio");
            exit();
        }
        $this->Insertar($this->nombre, $this->descripcion, $this->ID_VENDEDOR);
        echo "Se agrego la categoria.";
    }

    private function inputVacio(){
        $check;
        if (empty ($this->nombre) || empty ($this->descripcion) || empty ($this->ID_VENDEDOR)){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
}


?>