create database radeans;

use radeans;

create table roles(
	rol_id int auto_increment not null unique,
    rol_desc varchar(20),
    primary key (rol_id)
);

insert into roles (rol_desc) values ('administrador'),('cliente');

create table usuarios(
	usu_id int auto_increment not null unique,
    usu_nombre varchar (30),
    usu_apellido varchar (30),
    usu_correo varchar (30) unique not null,
    usu_tel varchar (12),
    usu_pass varchar(16),
    rol_id int,
    primary key (usu_id),
    foreign key (rol_id) references roles (rol_id)
);

insert into usuarios (usu_nombre,usu_apellido,usu_correo,usu_tel,usu_pass,rol_id) values
-- ('admin','admin','radeans.com.ar@gmail.com','1112345678','1234',1),
('juan','vega','juan@gmail.com','1112345678','1234',2),
('raul','lopez','raul@gmail.com','1112345678','1234',2);

create table profesionales (
	pro_id int auto_increment not null unique,
    pro_nombre varchar (30),
    pro_apellido varchar (30),
    pro_foto varchar(50),
    pro_correo varchar (30) not null unique,
    pro_cuit varchar(12) not null unique,
    pro_domicilio varchar(60),
    pro_tel varchar(11),
	primary key (pro_id)
);

insert into profesionales (pro_nombre,pro_apellido,pro_foto,pro_correo,pro_cuit,pro_domicilio,pro_tel) values
('lautaro','hurigue','ruta/ruta','lauhu@gmail.com','20309089872','cuzco 116','1186789586'),
('sasha','nuñez','ruta/ruta','sashez@gmail.com','20409089872','rivadavia 1546','11265895796'),
('fernando','torres','ruta/ruta','ferres@gmail.com','20329069772','vergara 2039','1176859685'),
('juan','lopez','ruta/ruta','jlo@gmail.com','20309089872','belgrano 1667','1586950684'),
('daiana','sosa','ruta/ruta','daiso@gmail.com','20309089872','brasil 789','1184037930'),
('agustina','gimenez','ruta/ruta','aginez@gmail.com','20309089872','mexico 2932','1562238934'),
('romina','rodriguez','ruta/ruta','minaro@gmail.com','20309089872','calle 14 1980','1520395105'),
('roma','gomez','ruta/ruta','zerom@gmail.com','20309089872','centenario 512','1583948572'),
('silvia','sanchez','ruta/ruta','chezvia@gmail.com','20309089872','varela 216','1123439549');



create table servicios(
	ser_id int auto_increment not null unique,
    ser_nombre varchar(30),
    ser_desc varchar (255),
    primary key (ser_id)
);

insert into servicios (ser_nombre,ser_desc) values 
('peluqueria','peinado'), ('peluqueria','tintura'), ('peluqueria','alisado'), ('peluqueria','corte'), ('peluqueria','nutricion'),
('barberia','tradicional'),('barberia','corte'),('barberia','nutricion'),('barberia','color'),('barberia','perfil'), 
('manicura','kapping acrilico'),('manicura','esmaltado permanente'),('manicura','kapping gel'),('manicura','semi permanente'),('manicura','uñas esculpidas'),
('pedicura','tradicional'),('pedicura','sin esmaltado'),('pedicura','shellac'),('pedicura','vinilux'),('pedicura','spa');

create table estados (
	est_id int(1) auto_increment not null unique,
    est_desc varchar(20),
    primary key (est_id)
);

insert into estados (est_desc) values ('libre'), ('reservado'), ('cancelado'), ('ausente'), ('atendido'), ('caducado');

create table turnos(
	tur_id int auto_increment not null unique,
    tur_fecha date,
    tur_horario varchar(5),
    tur_puntuacion int (1),
    est_id int(1),
    usu_id int(9),
    pro_id int(9),
    ser_id int(9),
    primary key (tur_id,usu_id,ser_id),
    foreign key (usu_id) references usuarios (usu_id),
    foreign key (pro_id) references profesionales (pro_id),
    foreign key (ser_id) references servicios (ser_id),
    foreign key (est_id) references estados (est_id)
);

alter table turnos drop column tur_puntuacion;
select * from turnos;

-- drop database radeans;