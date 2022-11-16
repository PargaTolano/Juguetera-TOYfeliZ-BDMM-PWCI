<?php
include ('../classes/database.php');


class Login extends Dbh {

    protected function identificar($correo, $contrasenia){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionUsuarios (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(2, null, null, null, null, null, $correo ,null, null, null, null, null))){
            $stmt = null;
            exit();
        }

        $check;
        if ($stmt->rowCount() == 0){
            $stmt = null;
            echo "El correo no existe. Verifica tus datos.";
            exit();
        }


        //que las contraseñas hagan match
        //$checkPwd = password_verify($contrasenia, $usuario[0]['contrasenia']);
        
        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($contrasenia != $usuario[0]['contrasenia']) {
            $stmt = null;
            echo "Contraseña incorrecta.";
            //header ("location: ../index.php?error=wrongpassword");
            exit();
        }else if ($contrasenia == $usuario[0]['contrasenia'])
        {
            session_start();
            $_SESSION['correo_usuario'] = $correo;
            $_SESSION['username_usuario'] = $usuario[0]['usuario'];
            $_SESSION['ID_ROL'] = $usuario[0]['ID_ROL'];
            $_SESSION['estatus'] = $usuario[0]['estatus'];
            $_SESSION['ID_USUARIO'] = $usuario[0]['ID_USUARIO'];
        }
        $stmt = null; 
    }

}



?>