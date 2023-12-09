<?php
include ('../classes/database.php');


class Historial extends Dbh {

    protected function cargarHistorialCliente( $desde, $hasta, $ID_USUARIO){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionHistorial (?, ?, ?, ?);');	
        if (!$stmt->execute(array(1, $hasta, $desde, $ID_USUARIO))){
            $stmt = null;
            echo 'error al cargar datos.';
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() <= 0){
            $stmt = null;
            echo 'No hay productos comprados en estas fechas.';
            exit();
        }
          
        $compras = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($compras as $row): 
            $ID_VENTA = $row['ID_VENTA'];
            $fechaCOMPRA = $row['fechaCOMPRA'];
            $cantidadCompradaVendida = $row['cantidadCompradaVendida'];
            $precioFinalProducto = $row['precioFinalProducto'];
            $ID_CLIENTE = $row['ID_CLIENTE'];
            $nombre = $row['nombre'];
            $ID_PRODUCTO = $row['ID_PRODUCTO'];
            $calificación = $row['calificación'];
            $categoria = $row['categoria'];
            $lista_info[] = array("nombre" => $nombre,"ID_VENTA" => $ID_VENTA, "fechaCOMPRA" => $fechaCOMPRA,
            "cantidadCompradaVendida" => $cantidadCompradaVendida, "precioFinalProducto" => $precioFinalProducto,
            "ID_CLIENTE" => $ID_CLIENTE, "ID_PRODUCTO" => $ID_PRODUCTO, "categoria" => $categoria, "calificación" => $calificación
          );
        endforeach;

        
        $stmt = null; 

        echo json_encode($lista_info);

    }

    protected function cargarHistorialVendedor( $desde, $hasta, $ID_USUARIO){
        $stmt = $this-> connect()-> prepare('CALL sp_gestionHistorial (?, ?, ?, ?);');	
        if (!$stmt->execute(array(2, $hasta, $desde, $ID_USUARIO))){
            $stmt = null;
            echo 'error al cargar datos.';
            header ("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() <= 0){
            $stmt = null;
            echo 'No hay productos comprados en estas fechas.';
            exit();
        }
          
        $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ventas as $row): 
            $ID_VENTA = $row['ID_VENTA'];
            $fechaCOMPRA = $row['fechaCOMPRA'];
            $cantidadCompradaVendida = $row['cantidadCompradaVendida'];
            $precioFinalProducto = $row['precioFinalProducto'];
            $nombre = $row['nombre'];
            $calificación = $row['calificación'];
            $cantidad = $row['cantidad'];

            $categoria = $row['categoria'];
            $lista_info[] = array("nombre" => $nombre,"ID_VENTA" => $ID_VENTA, "fechaCOMPRA" => $fechaCOMPRA,
            "cantidadCompradaVendida" => $cantidadCompradaVendida, "precioFinalProducto" => $precioFinalProducto,
            "categoria" => $categoria, "calificación" => $calificación, "cantidad" => $cantidad);

        endforeach;

        
        $stmt = null; 

        echo json_encode($lista_info);
    } 
}



?>