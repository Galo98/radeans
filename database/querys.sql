use radeans;
insert into roles (rol_desc) values ('administrador'),('cliente');
insert into usuarios (usu_nombre,usu_apellido,usu_correo,usu_tel,usu_pass,rol_id) values
('admin','admin','radeans.com.ar@gmail.com','1112345678','1234',1),
('juan','vega','juan@gmail.com','1112345678','1234',2),
('raul','lopez','raul@gmail.com','1112345678','1234',2);
insert into profesionales (prof_nombre,prof_apellido,prof_foto,prof_correo,prof_cuit,prof_domicilio,prof_tel) values
('lautaro','hurigue','ruta/ruta','lauhu@gmail.com','20309089872','cuzco 116','1186789586'),
('sasha','grey','ruta/ruta','sashez@gmail.com','20409089872','rivadavia 1546','11265895796'),
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

UPDATE profesionales set prof_apellido = "grey" where prof_id = 2;
select DISTINCT serv_nombre from servicios;
select ser_desc from servicios where serv_nombre = "peluqueria";
select * from servicios;
update turnos set usu_id = null where tur_id = 1;
select * from turnos where tur_fecha BETWEEN '2023-08-22 08:00:00' and '2023-08-26 18:00:00' order by tur_fecha;
select * from turnos where tur_fecha BETWEEN '2023-08-29 08:00:00' and '2023-09-02 18:00:00' order by tur_fecha;
select * from usuarios;
select * from servicios;
select * from estados;
insert into turnos (tur_fecha,est_id,usu_id,prof_id,serv_id) values 
('2023-10-23 18:00:00',1,null,2,4);

drop table turnos;
delete from turnos where tur_fecha = '2023-10-23 10:00:00';

select * from turnos where est_id = 1;

select tur_fecha from turnos where prof_id = 2 and serv_id = 6 and tur_fecha BETWEEN '2023-08-22 08:00:00 ' and '2023-08-26 18:00:00 ';

select 
turnos.tur_id, turnos.tur_fecha ,turnos.prof_id, turnos.serv_id, profesionales.prof_id ,profesionales.prof_nombre ,profesionales.prof_apellido ,servicios.serv_id ,servicios.serv_desc 
from turnos inner join profesionales on 
turnos.prof_id = profesionales.prof_id 
inner join servicios on 
turnos.serv_id = servicios.serv_id
where turnos.est_id = 1 and turnos.serv_id = 6;

select DISTINCT turnos.prof_id, profesionales.prof_nombre, profesionales.prof_apellido from turnos inner join profesionales on turnos.prof_id = profesionales.prof_id where est_id = 1 and serv_id = 6;

SELECT
tur_id, tur_fecha 
from turnos
where serv_id = 6 and prof_id = 2 and est_id = 1;

select * from turnos;
select * from usuarios;


select tur_id, tur_fecha from turnos where serv_id = 1 and prof_id = 1 and est_id = 1;

select * from turnos where serv_id = 1 and prof_id = 1;

select * from profesionales;

select turnos.tur_fecha ,servicios.serv_desc, profesionales.prof_nombre, profesionales.prof_apellido 
from turnos inner join servicios on 
servicios.serv_id = turnos.serv_id 
inner join profesionales on
profesionales.prof_id = turnos.prof_id
where usu_id = 4 and est_id = 2 and tur_fecha = (select tur_fecha from turnos where tur_id = 1);

select * from turnos where prof_id = 7;

select * from profesionales;

select * from servicios where serv_id = 10;

select * from usuarios where usu_id = 4;

select * from turnos where usu_id = 4 and est_id = 2;

select * from usuarios;
select * from servicios;
select * from profesionales;
select
    turnos.tur_id,
    turnos.tur_fecha,
    servicios.serv_nombre,
    servicios.serv_desc,
    profesionales.prof_nombre,
    profesionales.prof_apellido,
    profesionales.prof_foto
from turnos
    inner join servicios on servicios.serv_id = turnos.serv_id
    inner join profesionales on profesionales.prof_id = turnos.prof_id
where
    usu_id = 2
    and est_id = 2;

select * from turnos;
select * from turnos;
6 = caducado;
update turnos set est_id = case when est_id = 1 then 6 when est_id = 2 then 4 else est_id end where tur_fecha < CURRENT_DATE();

update turnos set est_id = 5 where tur_id in (1,4);

select * from roles;

select * from usuarios;

select turnos.*,estados.est_desc,usuarios.usu_nombre,usuarios.usu_apellido,profesionales.prof_nombre,profesionales.prof_apellido,servicios.serv_nombre,servicios.serv_desc from turnos left join estados on estados.est_id = turnos.est_id left join usuarios on usuarios.usu_id = turnos.usu_id left join profesionales on profesionales.prof_id = turnos.prof_id left join servicios on servicios.serv_id = turnos.serv_id order by usuarios.usu_nombre;

update usuarios set usu_nombre=" ", usu_apellido=" ", usu_correo=" ",usu_tel=" ", usu_pass="15483153510", rol_id=2;
insert into usuarios (usu_nombre,usu_apellido,usu_correo,usu_tel,usu_pass,rol_id) values ("admin","admin","radeans.com.ar@gmail.com","111234567",1);
select * from turnos where tur_id = (select max(tur_id) from turnos);

select count(tur_id) from turnos;

select * from turnos;
select * from turnos where tur_fecha like "2023-09-15%" ;

update turnos set est_id = 2 where tur_id =293;

select * from estados;

select * from usuarios;

update usuarios set usu_pass = 'galo1234' where usu_correo = 'galon@gmail.com';

-- 4,galo,olguin,galon@gmail.com,1525412541,12345678,2 

select * from servicios;

update servicios set serv_desc = "Balayage" where serv_id = 1;
update servicios set serv_desc = "Tintura" where serv_id = 2;
update servicios set serv_desc = "Alisado Permanente" where serv_id = 3;
update servicios set serv_desc = "Corte Mujer" where serv_id = 4;
update servicios set serv_desc = "Corte Hombre" where serv_id = 5;
update servicios set serv_desc = "Afeitado" where serv_id = 6;
update servicios set serv_desc = "Recorte" where serv_id = 7;
update servicios set serv_desc = "Diseños" where serv_id = 8;
update servicios set serv_desc = "Coloracion" where serv_id = 9;
update servicios set serv_desc = "Perfil" where serv_id = 10;
update servicios set serv_desc = "Kapping Gel" where serv_id = 11;
update servicios set serv_desc = "Kapping Acrílico" where serv_id = 12;
update servicios set serv_desc = "Semipermanente" where serv_id = 13;
update servicios set serv_desc = "Uñas Esculpidas" where serv_id = 14;
update servicios set serv_desc = "Nails Art" where serv_id = 15;
select * from profesionales;

update profesionales set prof_foto = "/img/profs/1.png" where prof_id = 1;
update profesionales set prof_foto = "/img/profs/2.png" where prof_id = 2;
update profesionales set prof_foto = "/img/profs/3.png" where prof_id = 3;
update profesionales set prof_foto = "/img/profs/4.png" where prof_id = 4;
update profesionales set prof_foto = "/img/profs/5.png" where prof_id = 5;
update profesionales set prof_foto = "/img/profs/6.png" where prof_id = 6;
update profesionales set prof_foto = "/img/profs/7.png" where prof_id = 7;
update profesionales set prof_foto = "/img/profs/8.png" where prof_id = 8;
update profesionales set prof_foto = "/img/profs/9.png" where prof_id = 9;

select * from turnos where tur_fecha > "2023-10-03" and tur_fecha < "2023-10-07";

localhost:3306/id20650963_radeans/turnos/		https://databases-auth.000webhost.com/index.php?route=/sql&pos=0&db=id20650963_radeans&table=servicios

   Mostrando filas 0 - 24 (total de 216, La consulta tardó 0.0007 segundos.)


select * from turnos where tur_fecha > "2023-10-03" and tur_fecha < "2023-10-07";

insert into turnos (tur_fecha,est_id,usu_id,prof_id,serv_id) values
("2023-10-31 08:00:00",1,NULL,1,1),	
("2023-11-01 08:00:00",1,NULL,1,1),	
("2023-11-02 08:00:00",1,NULL,1,1),	
("2023-11-03 08:00:00",1,NULL,1,1),	
("2023-11-04 08:00:00",1,NULL,1,1), 
("2023-10-31 10:00:00",1,NULL,1,1),	
("2023-11-01 10:00:00",1,NULL,1,1),	
("2023-11-02 10:00:00",1,NULL,1,1),	
("2023-11-03 10:00:00",1,NULL,1,1),	
("2023-11-04 10:00:00",1,NULL,1,1), 
("2023-10-31 12:00:00",1,NULL,1,2),	
("2023-11-01 12:00:00",1,NULL,1,2),	
("2023-11-02 12:00:00",1,NULL,1,2),	
("2023-11-03 12:00:00",1,NULL,1,2),	
("2023-11-04 12:00:00",1,NULL,1,2), 
("2023-10-31 14:00:00",1,NULL,1,2),	
("2023-11-01 14:00:00",1,NULL,1,2),	
("2023-11-02 14:00:00",1,NULL,1,2),	
("2023-11-03 14:00:00",1,NULL,1,2),	
("2023-11-04 14:00:00",1,NULL,1,2), 
("2023-10-31 16:00:00",1,NULL,1,3),	
("2023-11-01 16:00:00",1,NULL,1,3),	
("2023-11-02 16:00:00",1,NULL,1,3),	
("2023-11-03 16:00:00",1,NULL,1,3),	
("2023-11-04 16:00:00",1,NULL,1,3), 
("2023-10-31 18:00:00",1,NULL,1,3),	
("2023-11-01 18:00:00",1,NULL,1,3),	
("2023-11-02 18:00:00",1,NULL,1,3),	
("2023-11-03 18:00:00",1,NULL,1,3),
("2023-11-04 18:00:00",1,NULL,1,3);

select * from servicios;

update servicios set serv_desc = "Simple" where serv_id = 16;
update servicios set serv_desc = "Clásica" where serv_id = 17;
update servicios set serv_desc = "Completa" where serv_id = 18;
update servicios set serv_desc = "SPA" where serv_id = 19;
update servicios set serv_desc = "Simple Francesa" where serv_id = 17;
