<?php
include ('../classes/database.php');


class Register extends Dbh {


    protected function insertarUsuario($nombre, $apellido, $nacimiento,  $usuario, $correo, $contrasenia, $sexo, $privacidad, $foto, $ID_ROL){
        //$stmt = $this->connect()->prepare('INSERT into usuarios (nombre, apellido, nacimiento, usuario, correo, contrasenia, sexo, privacidad, foto, ID_ROL) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');
        $stmt = $this-> connect()-> prepare('CALL sp_gestionUsuarios (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');	
        
        //para encriptar la contrasenia
        $passwordHashed = password_hash($contrasenia, PASSWORD_DEFAULT);

        if (!$stmt->execute(array(1, null, $nombre, $apellido, $nacimiento, $usuario, $correo, $contrasenia, $sexo, $privacidad, $foto, $ID_ROL))){
            $stmt = null;
            //header ("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function RevisarCorreo($correo){
        $stmt = $this-> connect()-> prepare('CALL sp_GetCorreoContra (?, ?, ?, ?);');
        if (!$stmt->execute(array(3, null, $correo, null))){ //false si no se pudo ejecutar
            $stmt = null;
            echo "El correo ya existe";

            exit();
        }
        $check;
        //cuantas filas con el correo trajo el stmt
        if ($stmt->rowCount() > 0){
            $check = false;
        }
        else{
            $check = true;
        }
        return $check;
    }

    protected function RevisarUsuario($usuario){
        $stmt = $this-> connect()-> prepare('CALL sp_GetCorreoContra (?, ?, ?, ?);');
        if (!$stmt->execute(array(4, $usuario, null, null))){ //false si no se pudo ejecutar
            $stmt = null;
            echo "El usuario ya existe";

            exit();
        }
        $check;
        //cuantas filas con el correo trajo el stmt
        if ($stmt->rowCount() > 0){
            $check = false;
        }
        else{
            $check = true;
        }
        return $check;
    }
}



?>


