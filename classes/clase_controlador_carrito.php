<?php
include ('../classes/clase_carrito.php');

class CarritoControlador extends Carrito {
    private $estatus;
    private $precioPagar;
    private $cantidadCompra;
    private $ID_CLIENTE;
    private $ID_PRODUCTOS;
    private $ID_CARRITO;

    public function __construct($estatus, $cantidadCompra, $precioPagar, $ID_CLIENTE, $ID_CARRITO, $ID_PRODUCTOS){
        $this->estatus= $estatus;
        $this->cantidadCompra= $cantidadCompra;
        $this->precioPagar= $precioPagar;
        $this->ID_CLIENTE= $ID_CLIENTE;
        $this->ID_PRODUCTOS= $ID_PRODUCTOS;
        $this->ID_CARRITO= $ID_CARRITO;
    }
    
    public function MostrarProuctos(){
        $this->Cargar($this->ID_CLIENTE);
    }

    public function Agregarproducto(){
        $this->Añadir($this->ID_PRODUCTOS, $this->cantidadCompra, $this->ID_CLIENTE);
        echo "Se agrego el producto.";
    }
}


?>