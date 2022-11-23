#-----------------------------QUERYS----------------------------------

SELECT ID_LISTA, nombre from listas WHERE ID_CLIENTE = 2;
SELECT * from listas;
SELECT * from deseos;
SELECT* from usuarios;
SELECT * from poductoscarrito;
SELECT * from carrito;
SELECT * from rol;
SELECT * from categorias;
SELECT * from categoriajuguete;
SELECT * from comentarios ;
SELECT * from juguetes;
SELECT * from imagenes;
SELECT * FROM videos;
SELECT * from pedidosyventas;

		UPDATE poductoscarrito set estatus = 0 where ID_CLIENTE = 5;
insert into pedidosyventas (precioFinalProducto, cantidadCompradaVendida, ID_JUGUETE, ID_CLIENTE, ID_VENDEDOR ) values (150, 1, 7, 2, 1);
CALL sp_gestionCarrito (3, null, 5, null, null);                
INSERT into poductoscarrito (ID_CARRITO, ID_JUGUETE, ID_CLIENTE, cantidadCompra, preciocotizado) VALUES (2, 7, 5, 1, 120);
delete from poductoscarrito where ID_JUGUETE = 10 AND ID_CLIENTE = 5;
insert into carrito (ID_CLIENTE) values (5);