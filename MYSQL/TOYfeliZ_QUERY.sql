#-----------------------------QUERYS----------------------------------

SELECT ID_LISTA, nombre FROM listas WHERE ID_CLIENTE = 2;
SELECT * FROM listas;
SELECT * FROM deseos;
SELECT * FROM usuarios;
SELECT * FROM poductoscarrito;
SELECT * FROM carrito;
SELECT * FROM rol;
SELECT * FROM categorias;
SELECT * FROM categoriajuguete;
SELECT * FROM comentarios ;
SELECT * FROM juguetes;
SELECT * FROM imagenes;
SELECT * FROM videos;
SELECT * FROM pedidosyventas;

		 UPDATE poductoscarrito set estatus = 0 where ID_CLIENTE = 5;
insert into pedidosyventas (precioFinalProducto, cantidadCompradaVendida, ID_JUGUETE, ID_CLIENTE, ID_VENDEDOR ) values (150, 1, 7, 2, 1);
CALL sp_gestionCarrito (3, null, 5, null, null);                
INSERT into poductoscarrito (ID_CARRITO, ID_JUGUETE, ID_CLIENTE, cantidadCompra, preciocotizado) VALUES (2, 7, 5, 1, 120);
delete from poductoscarrito where ID_JUGUETE = 10 AND ID_CLIENTE = 5;
insert into carrito (ID_CLIENTE) values (5);

select CONVERT(video USING utf8) from videos;
