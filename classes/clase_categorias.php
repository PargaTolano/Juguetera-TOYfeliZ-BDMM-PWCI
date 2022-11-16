<?php
include ('../classes/database.php');


class Categories extends Dbh {

    protected function Insertar($nombre, $descripcion, $ID_VENDEDOR){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionCategorias (?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(1, null, $nombre, $descripcion, $ID_VENDEDOR))){
            $stmt = null;
            echo 'error al insertar categoria.';
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null; 
    }

    protected function CargarCategorias(){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionCategorias (?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(2, null, null, null, null))){
            $stmt = null;
            echo "Eror al cargar";
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }

        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categorias as $row): 
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $ID_VENDEDOR = $row['ID_VENDEDOR'];
            $ID_CATEGORIA = $row['ID_CATEGORIA'];

            $lista_categorias[] = array("nombre" => $nombre, "descripcion" => $descripcion,"ID_VENDEDOR" => $ID_VENDEDOR, "ID_CATEGORIA" => $ID_CATEGORIA );
        endforeach;

        $stmt = null; 

        echo json_encode($lista_categorias);
    } 
}



?>