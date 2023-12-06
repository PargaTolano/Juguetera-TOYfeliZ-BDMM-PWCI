<?php
include ('../classes/clase_registro.php');

class RegistroControlador extends Register {
    private $correo;
    private $contrasenia;
    private $usuario;
    private $nacimiento;
    private $sexo;
    private $nombre;
    private $apellido;
    private $ID_ROL;
    private $privacidad;
    private $foto;
    public $result = 0;

    public function __construct($nombre, $apellido, $nacimiento, $usuario, $correo, $contrasenia, $sexo, $privacidad, $foto, $ID_ROL){
        $this->nombre= $nombre;
        $this->apellido= $apellido;
        $this->nacimiento= $nacimiento;
        $this->usuario= $usuario;
        $this->correo= $correo;
        $this->contrasenia= $contrasenia;
        $this->sexo= $sexo;
        $this->privacidad= $privacidad;
        $this->foto= $foto;
        $this->ID_ROL= $ID_ROL;
    }

    public function registrarUsuarios(){
        if ($this->inputVacio() == false ){
            $this->result = 1;
            echo json_encode($this->result);
            //header ("location: ../index.php?error=inputVacio");
            exit();
            
        }
        if ($this->correoUnico() == false ){
            $this->result = 2;        
            echo json_encode($this->result);
            //header ("location: ../index.php?error=correoUnico");
            exit();
        }
        if ($this->usuarioUnico() == false ){
            $this->result = 3;        
            echo json_encode($this->result);
            //header ("location: ../index.php?error=correoUnico");
            exit();
        }
        $this->insertarUsuario($this->nombre, $this->apellido, $this->nacimiento, $this->usuario,  $this->correo,  $this->contrasenia, $this->sexo, $this->privacidad, $this->foto, $this->ID_ROL);
        $this->result = 4;
        echo json_encode($this->result);
         
    }

    private function inputVacio(){
        $check;
        if (empty($this->contrasenia) || empty ($this->correo) || empty ($this->nombre) ||empty ($this->apellido)  || empty ($this->usuario)|| empty ($this->nacimiento) || empty ($this->privacidad) || empty ($this->ID_ROL) || empty ($this->sexo) || empty ($this->foto)){
            $check = false;
        }else {
            $check = true;
        }
        return $check;
    }
    
    private function correoUnico (){
      return $this->RevisarCorreo($this->correo);
    }

    private function usuarioUnico (){
      return $this->RevisarUsuario($this->usuario);
    }
}

?>