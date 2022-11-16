#-----------------------------QUERYS----------------------------------


SELECT ID_LISTA, nombre from listas WHERE ID_CLIENTE = 2;
SELECT * from  listas;
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
UPDATE usuarios set estatus = 1 WHERE ID_USUARIO = 2;
SELECT a.ID_VENTA, a.fechaCOMPRA, a.cantidadCompradaVendida, a.precioFinalProducto, a.ID_CLIENTE, b.nombre, b.ID_PRODUCTO,  group_concat(distinct e.nombre ) categorias, d.calificación
FROM pedidosyventas a INNER JOIN juguetes b ON a.ID_JUGUETE = b.ID_PRODUCTO INNER JOIN categoriajuguete c ON a.ID_JUGUETE = c.ID_JUGUETE
INNER JOIN  categorias e ON e.ID_CATEGORIA = c.ID_CATEGORIA INNER JOIN comentarios d WHERE a.ID_CLIENTE = 1 group by 1;

SELECT a.ID_VENTA, a.fechaCOMPRA, a.cantidadCompradaVendida, a.precioFinalProducto, a.ID_CLIENTE, b.nombre, b.cantidad, b.ID_PRODUCTO, b.valoracion, group_concat(distinct e.nombre ) categoria
		FROM pedidosyventas a INNER JOIN juguetes b ON a.ID_JUGUETE = b.ID_PRODUCTO INNER JOIN categoriajuguete c ON a.ID_JUGUETE = c.ID_JUGUETE
		INNER JOIN  categorias e ON e.ID_CATEGORIA = c.ID_CATEGORIA WHERE a.ID_VENDEDOR =1  group by 1;

SELECT a.ID_VENTA, a.fechaCOMPRA, a.cantidadCompradaVendida, a.precioFinalProducto, b.ID_PRODUCTO, b.valoracion, group_concat(distinct e.nombre ) categoria
		FROM pedidosyventas a INNER JOIN juguetes b ON a.ID_JUGUETE = b.ID_PRODUCTO INNER JOIN categoriajuguete c ON a.ID_JUGUETE = c.ID_JUGUETE
		INNER JOIN  categorias e ON e.ID_CATEGORIA = c.ID_CATEGORIA WHERE a.ID_VENDEDOR =1  group by 1;
        
        
                
INSERT into poductoscarrito (ID_CARRITO, ID_JUGUETE, cantidadCompra) VALUES (1, 6, 1);
UPDATE juguetes set autorizado = 1 WHERE ID_PRODUCTO = 3;
INSERT into deseos (ID_LISTA, ID_JUGUETE) VALUES (1, 5);

/* INSERT into usuarios(nombre, apellido, nacimiento, usuario, correo, contrasenia, sexo, privacidad, foto, ID_ROL)
			VALUES ('Blanca', 'Trujillo', '15/05/2001', 'Blankury', 'b@gmail.com', 'contra', 'Mujer', 'Publico', 'imagenes/logo.png', '2');
INSERT into juguetes (nombre, descripcion, tipoVenta, valoracion, precio, cantidad, ID_VENDEDOR)
			VALUES ('Play-Doh lata azul', 'Incluye una lata de masa modeladora playdoh', 'Cotizar', 0 , 0, 40, 1);
INSERT into imagenes (imagen, ID_JUGUETE)
			VALUES ('xd3434', 3);
INSERT into videos (video, ID_JUGUETE)
			VALUES ('xd', 3);
INSERT into categorias (nombre, descripcion, ID_VENDEDOR)
			VALUES ('Niños', 'juguetes para niños', 3);
INSERT into categorias (nombre, descripcion, ID_VENDEDOR)
			VALUES ('Didacticos', 'Juguetes que ayudaran a los niños a dearrollar ', 3);
INSERT into categorias (nombre, descripcion, ID_VENDEDOR)
			VALUES ('Masas', 'si', 3);
INSERT into categoriajuguete (ID_JUGUETE, ID_CATEGORIA)
			VALUES (4, 1);
INSERT into categoriajuguete (ID_JUGUETE, ID_CATEGORIA)
			VALUES (4, 4);
INSERT into categoriajuguete (ID_JUGUETE, ID_CATEGORIA)
			VALUES (3, 5);
INSERT into categoriajuguete (ID_JUGUETE, ID_CATEGORIA)
			VALUES (3, 6);
INSERT into comentarios (descripcion, calificación, ID_CLIENTE, ID_JUGUETE)
			VALUES ('100% recomendado.', '5', 2, 3);
*/