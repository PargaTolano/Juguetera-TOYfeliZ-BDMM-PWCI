<?php
include ('../classes/database.php');


class Listas extends Dbh {

    protected function Cargar($ID_CLIENTE){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(3, $ID_LISTA, null, null, $ID_CLIENTE, null, null, $ID_JUGUETE))){
            $stmt = null;
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null; 
    }
    protected function Añadir($ID_PRODUCTOS, $cantidadCompra, $ID_CLIENTE){
        $stmt = $this-> connect()-> prepare('SELECT ID_LISTA, nombre FROM listas WHERE ID_CLIENTE =  ?;');	
        if (!$stmt->execute(array($ID_CLIENTE))){
            $stmt = null;
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }

        $listas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($listas as $row): 
            $nombre = $row['nombre'];
            $ID_LISTA = $row['ID_LISTA'];
            $lista_listas[] = array("nombre" => $nombre, "ID_LISTA" => $ID_LISTA);
        endforeach;

        echo json_encode($lista_listas);
        $stmt = null; 
    } 


}



?>