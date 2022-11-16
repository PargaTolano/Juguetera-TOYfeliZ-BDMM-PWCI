<?php
include ('../classes/clase_consultas.php');

class HistorialControlador extends Historial {
    private $desde;
    private $hasta;
    private $ID_USUARIO;

    public function __construct($desde, $hasta, $ID_USUARIO){
        $this->hasta= $hasta;
        $this->desde= $desde;
        $this->ID_USUARIO = $ID_USUARIO;
    }

    public function historialCliente(){
        
        $this->cargarHistorialCliente($this->hasta, $this->desde, $this->ID_USUARIO);      
    }
    public function historialVendedor(){
       
        $this->cargarHistorialVendedor($this->hasta, $this->desde, $this->ID_USUARIO);      
    }
    private function inputVacio(){
        $check;
        if (empty($this->desde) || empty($this->hasta)){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
}

?>

