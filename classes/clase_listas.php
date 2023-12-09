<?php
include ('../classes/database.php');


class Listas extends Dbh {

    protected function CrearLista($nombre, $descripcion, $ID_CLIENTE, $privacidad, $imagenes){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(1, null, $nombre, $descripcion, $ID_CLIENTE, $privacidad, null, null))){
            $stmt = null;
            echo "Error al insertar lista";
            exit();
        }
        
        $stmt = null; 
       
        foreach($imagenes as $imagen):
            $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
            if (!$stmt->execute(array(2, null, null, null, null, null, $imagen, null))){
                $stmt = null;
                echo "Error al insertar imagenes";
                exit();
            }
            
            $stmt = null; 
        endforeach;
    }

    protected function InsertarDeseo($ID_JUGUETE, $ID_LISTA, $ID_CLIENTE){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(3, $ID_LISTA, null, null, $ID_CLIENTE, null, null, $ID_JUGUETE))){
            $stmt = null;
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null; 
    }

    protected function RemoverDeseo($ID_JUGUETE, $ID_LISTA, $ID_CLIENTE){
      $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
      if (!$stmt->execute(array(9, $ID_LISTA, null, null, $ID_CLIENTE, null, null, $ID_JUGUETE))){
          $stmt = null;
          header ("location: ../index.php?error=stmtfailed");
          exit();
      }
      
      $stmt = null; 
  }

    protected function CargarListas($ID_CLIENTE){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(6, null, null, null, $ID_CLIENTE, null, null, null))){

            $stmt = null;
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }

        $listas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lista_listas = [];

        foreach ($listas as $row): 
            $nombre = $row['nombre'];
            $ID_LISTA = $row['ID_LISTA'];
            $lista_listas[] = array("nombre" => $nombre, "ID_LISTA" => $ID_LISTA);
        endforeach;

        echo json_encode($lista_listas);
        $stmt = null; 
    } 

    protected function CargarListasPublicas(){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(5, null, null, null, null, 'Publica', null, null))){
            $stmt = null;
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }

        $listas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lista_listas = [];

        foreach ($listas as $row): 
            $nombre = $row['nombre'];
            $ID_LISTA = $row['ID_LISTA'];
            $lista_listas[] = array("nombre" => $nombre, "ID_LISTA" => $ID_LISTA);
        endforeach;

        echo json_encode($lista_listas);
        $stmt = null; 
    } 


    protected function CargarlistaInfo($ID_LISTA){
        $lista_info = array(
            'list' => array(),
            'imgs' => array(),
            'productos' => array()
        );
        $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(4, $ID_LISTA, null, null, null, null, null, null))){
        
            $stmt = null;
            echo "Error al cargar la lista.";
            exit();
        }
        
        $lista_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lista_info as $row): 
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $fechaCreacion = $row['fechaCreacion'];
            $propietario = $row['propietario'];
            $lista_info['list'][] = array("nombre" => $nombre, "descripcion" => $descripcion,
            "fechaCreacion" => $fechaCreacion, "propietario" => $propietario);
        endforeach;

        $stmt = null; 

        $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
        
        if (!$stmt->execute(array(8, $ID_LISTA,  null, null, null, null, null, null))){
            $stmt = null;
            echo "Error al cargar las imagenes.";

            //header ("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $imgs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($imgs as $row): 
            $ruta = $row['ruta'];
            $lista_info['imgs'][] = array("ruta" => $ruta);
        endforeach;

        $stmt = null; 

     
        $stmt = $this-> connect()-> prepare('CALL sp_gestionListas (?, ?, ?, ?, ?, ?, ?, ?);');	
        if (!$stmt->execute(array(7, $ID_LISTA, null, null, null, null, null, null))){
            $stmt = null;
            echo "Error al cargar deseos.";
            //header ("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $deseos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($deseos as $row): 
            $ID_PRODUCTO = $row['ID_PRODUCTO'];
            $nombre = $row['nombre'];
            $icono = $row['icono'];

            $lista_info['productos'][] = array("ID_PRODUCTO" => $ID_PRODUCTO, "nombre" => $nombre, 
            "icono" => $icono);
        endforeach;

        $stmt = null;

        echo json_encode($lista_info);
        
    } 
}



?>