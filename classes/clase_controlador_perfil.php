<?php
include ('../classes/clase_perfil.php');

class PerfilControlador extends PerfilActions {
    private $correo;
    private $usuario;
    private $nacimiento;
    private $sexo;
    private $nombre;
    private $apellido;
    private $ID_ROL;
    private $privacidad;
    private $foto;
    private $ID_USUARIO;
    public $result = 0;

    public function __construct($nombre, $apellido, $nacimiento, $usuario, $correo, $sexo, $privacidad, $foto, $ID_ROL, $ID_USUARIO){
        $this->nombre= $nombre;
        $this->apellido= $apellido;
        $this->nacimiento= $nacimiento;
        $this->usuario= $usuario;
        $this->correo= $correo;
        $this->sexo= $sexo;
        $this->privacidad= $privacidad;
        $this->foto= $foto;
        $this->ID_ROL= $ID_ROL;
        $this->ID_USUARIO= $ID_USUARIO;
    }

    public function ActualizarInfo(){
        if ($this->inputVacio()){
            echo "Llena todos los datos";
            //header ("location: ../index.php?error=inputVacio");
            exit();
            
        }
        if (!$this->correoUnico() ){
            echo "El correo ya existe.";
            //header ("location: ../index.php?error=correoUnico");
            exit();
        }
        if (!$this->usuarioUnico() ){
            echo "Nombre de usuario en uso.";
            //header ("location: ../index.php?error=correoUnico");
            exit();
        }
        $this->ActualizarYa($this->nombre, $this->apellido, $this->nacimiento, $this->usuario,  $this->correo, $this->sexo, $this->privacidad, $this->foto, $this->ID_ROL, $this->ID_USUARIO);
        echo 1;
         
    }

    public function Mostrar(){
        $this->CargarInfo($this->usuario);
    }

    public function desactivarcuenta(){
        $this->Bajalogica($this->ID_USUARIO);
    }

    private function inputVacio(){
        return empty($this->nombre) || 
                empty ($this->apellido) || 
                empty ($this->nacimiento) ||
                empty ($this->usuario)  || 
                empty ($this->correo) || 
                empty ($this->sexo) ||  
                empty ($this->foto) || 
                empty ($this->ID_ROL);
    }
    
    private function correoUnico (){
        return $this->RevisarCorreo($this->correo, $this->ID_USUARIO);
    }

    private function usuarioUnico (){
        return $this->RevisarUsuario($this->usuario, $this->ID_USUARIO);
    }
}

?>