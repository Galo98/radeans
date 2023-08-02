create database radeans;

use radeans;

create table roles(
	rol_id int auto_increment not null unique,
    rol_desc varchar(20),
    primary key (rol_id)
);

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

create table profesionales (
	prof_id int auto_increment not null unique,
    prof_nombre varchar (30),
    prof_apellido varchar (30),
    prof_foto varchar(50),
    prof_correo varchar (30),
    prof_cuit varchar(12),
    prof_domicilio varchar(60),
    prof_tel varchar(11),
	primary key (prof_id)
);

-- create table categoria(
-- 	cate_id int auto_increment not null unique,
--    cate_nombre varchar(30),
--    cate_observaciones varchar (255),
--    primary key (cate_id)
-- );

create table servicios(
    serv_id int(9),
    serv_nombre varchar(30),
    serv_precio float(9.2),
    primary key (serv_id) 
);

create table estados (
	est_id int(1) auto_increment not null unique,
    est_desc varchar(1),
    primary key (est_id)
);

create table turnos(
	tur_id int auto_increment not null unique,
    tur_fecha date,
    tur_horario varchar(5),
    tur_puntuacion int (1),
    est_id int(1),
    usu_id int(9),
    prof_id int(9),
    serv_id int(9),
    primary key (tur_id,usu_id,serv_id),
    foreign key (usu_id) references usuarios (usu_id),
    foreign key (pro_id) references profesionales (prof_id),
    foreign key (ser_id) references servicios (serv_id),
    foreign key (est_id) references estados (est_id)
);

create table facturasCabecera(
	fac_id int auto_increment not null unique,
    fac_Total float(9.2),
    fac_fecha date,
    usu_id int,
    prof_id int,
    tur_id int,
    primary key(fac_id,usu_id),
    foreign key (usu_id) references usuarios (usu_id),
    foreign key (prof_id) references profesionales (prof_id),
    foreign key (tur_id) references turnos (tur_id)
);

create table facturasDetalle(
	fac_id int,
    serv_id int(9),
    fac_precioSer float (9,2),
    primary key (fac_id,serv_id),
    foreign key (fac_id) references facturasCabecera(fac_id),
    foreign key (serv_id) references servicios (serv_id)
);

create table contabilidad(
    con_id int auto_increment,
    fac_id int,
    serv_id int(9),
    primary key (con_id,fac_id),
    foreign key (fac_id) references facturasDetalle(fac_id),
    foreign key (serv_id) references facturasDetalle(serv_id)
);

use radeans;
select * from servicios;