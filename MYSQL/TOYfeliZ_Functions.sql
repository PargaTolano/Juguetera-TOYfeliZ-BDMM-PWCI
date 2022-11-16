
#-----------------------------FUNCTIONS----------------------------------

delimiter =)
CREATE FUNCTION f_unidadesDisponibles ( fID_PRODUCTO smallint)
	RETURNS INT
READS SQL DATA
BEGIN
    DECLARE total_UNIDADES	INT;
	set total_UNIDADES = (SELECT cantidad	FROM juguetes WHERE ID_PRODUCTO = pID_PRODUCTO);
	return total_UNIDADES;
END =)
delimiter ;

delimiter (?
CREATE FUNCTION f_precioAPagar ( fID_CARRITO float)
	RETURNS float
READS SQL DATA
BEGIN
    DECLARE total flat;
	set total_UNIDADES = (SELECT cantidad	FROM juguetes WHERE ID_PRODUCTO = pID_PRODUCTO);
	return total_UNIDADES;
END (?
delimiter ;

delimiter (?
CREATE FUNCTION f_valoracion ( fID_PRODUCTO float)
	RETURNS float
READS SQL DATA
BEGIN
    DECLARE promedio float;
	set promedio = (SELECT sum(calificación)/count(calificación) FROM comentarios WHERE ID_JUGUETE = fID_PRODUCTO);
	return promedio;
END (?
delimiter ;



SELECT count(b.precio) precio FROM poductoscarrito INNER JOIN juguetes b ;                
SELECT ID_CARRITO, ID_JUGUETE, cantidadCompra, nombre, precio FROM viewCarrito WHERE ID_CLIENTE =5;
