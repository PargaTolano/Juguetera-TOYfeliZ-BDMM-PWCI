DELIMITER $$
create trigger trig_baja_usuarios before delete on usuario for each row 
begin
	insert into baja_usuarios(id_usuario,foto_perfil,ussername,Rol,correo,fecha_eliminado,`status`)
	values(old.user_id,old.foto_perfil,old.ussername_alias,old.tipo_userid, old.email, sysdate(), 'I');
end$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER tg_juguetesvendidos AFTER UPDATE ON noticias for each row
begin 
	IF(OLD.`status` = 'Normal' AND NEW.`status` = 'Urgente') then
	insert into noticias_urgentes(ciudad,colonia,pais,foto_principal,texto,titulo,descripcion,firma,fecha_publicacion,fecha_sucedieron_eventos,palabras_clave,categoria,fecha_creacion_n,creado_por_n)
    values(OLD.ciudad,OLD.colonia,OLD.pais,OLD.foto_principal,OLD.texto,OLD.titulo,OLD.descripcion,OLD.firma,OLD.fecha_publicacion,
    OLD.fecha_sucedieron_eventos,OLD.palabras_clave,OLD.categoria,OLD.fecha_creacion_n,OLD.creado_por_n);
    END IF;
end$$
DELIMITER ;
