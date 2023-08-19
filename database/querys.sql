use radeans;
insert into roles (rol_desc) values ('administrador'),('cliente');
insert into usuarios (usu_nombre,usu_apellido,usu_correo,usu_tel,usu_pass,rol_id) values
('admin','admin','radeans.com.ar@gmail.com','1112345678','1234',1),
('juan','vega','juan@gmail.com','1112345678','1234',2),
('raul','lopez','raul@gmail.com','1112345678','1234',2);
insert into profesionales (prof_nombre,prof_apellido,prof_foto,prof_correo,prof_cuit,prof_domicilio,prof_tel) values
('lautaro','hurigue','ruta/ruta','lauhu@gmail.com','20309089872','cuzco 116','1186789586'),
('sasha','nuñez','ruta/ruta','sashez@gmail.com','20409089872','rivadavia 1546','11265895796'),
('fernando','torres','ruta/ruta','ferres@gmail.com','20329069772','vergara 2039','1176859685'),
('juan','lopez','ruta/ruta','jlo@gmail.com','20309089822','belgrano 1667','1586950684'),
('daiana','sosa','ruta/ruta','daiso@gmail.com','20309089572','brasil 789','1184037930'),
('agustina','gimenez','ruta/ruta','aginez@gmail.com','20309089772','mexico 2932','1562238934'),
('romina','rodriguez','ruta/ruta','minaro@gmail.com','20309083472','calle 14 1980','1520395105'),
('roma','gomez','ruta/ruta','zerom@gmail.com','20309089122','centenario 512','1583948572'),
('silvia','sanchez','ruta/ruta','chezvia@gmail.com','20302389872','varela 216','1123439549');
insert into servicios (serv_nombre,serv_desc) values 
('peluqueria','peinado'), ('peluqueria','tintura'), ('peluqueria','alisado'), ('peluqueria','corte'), ('peluqueria','nutricion'),
('barberia','tradicional'),('barberia','corte'),('barberia','nutricion'),('barberia','color'),('barberia','perfil'), 
('manicura','kapping acrilico'),('manicura','esmaltado permanente'),('manicura','kapping gel'),('manicura','semi permanente'),('manicura','uñas esculpidas'),
('pedicura','tradicional'),('pedicura','sin esmaltado'),('pedicura','shellac'),('pedicura','vinilux'),('pedicura','spa');
insert into estados (est_desc) values ('libre'), ('reservado'), ('cancelado'), ('ausente'), ('atendido'), ('caducado');
show tables;
select * from profesionales;

select DISTINCT serv_nombre from servicios;
select ser_desc from servicios where serv_nombre = "peluqueria";
select * from turnos;
select * from usuarios;
select * from servicios;
select * from estados;
insert into turnos (tur_fecha,est_id,usu_id,prof_id,serv_id) values 
('2023-10-23 18:00:00',1,null,2,4);

drop table turnos;
delete from turnos where tur_fecha = '2023-10-23 10:00:00';

select * from turnos where est_id = 1;