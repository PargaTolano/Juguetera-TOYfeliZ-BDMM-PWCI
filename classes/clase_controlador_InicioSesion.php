<?php
include ('../classes/clase_InicioSesion.php');

class InicioSesionControlador extends Login {
    private $correo;
    private $contrasenia;

    public function __construct($correo, $contrasenia){
        $this->correo= $correo;
        $this->contrasenia= $contrasenia;
    }
    
    public function iniciarSesion(){
        if ($this->inputVacio() == false) {
            //header ("location: ../index.php?error=inputVacio");
            echo "Campos vacios";
            exit();
        }
        $this->identificar($this->correo, $this->contrasenia);
        echo 4;
    }

    private function inputVacio(){
        $check;
        if (empty ($this->contrasenia) || empty ($this->correo)){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
}


?>