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
	pro_id int auto_increment not null unique,
    pro_nombre varchar (30),
    pro_apellido varchar (30),
    pro_foto varchar(50),
    pro_correo varchar (30),
    pro_cuit varchar(12),
    pro_domicilio varchar(60),
    pro_tel varchar(11),
	primary key (pro_id)
);

-- create table categoria(
-- 	cat_id int auto_increment not null unique,
--    cat_nombre varchar(30),
--    cat_observaciones varchar (255),
--    primary key (cat_id)
-- );

create table servicios(
    ser_id int(9),
    ser_nombre varchar(30),
    ser_precio float(9.2),
    primary key (ser_id) 
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
    pro_id int(9),
    ser_id int(9),
    primary key (tur_id,usu_id,ser_id),
    foreign key (usu_id) references usuarios (usu_id),
    foreign key (pro_id) references profesionales (pro_id),
    foreign key (ser_id) references servicios (ser_id),
    foreign key (est_id) references estados (est_id)
);

create table facturasCabecera(
	fac_id int auto_increment not null unique,
    fac_Total float(9.2),
    fac_fecha date,
    usu_id int,
    pro_id int,
    tur_id int,
    primary key(fac_id,usu_id),
    foreign key (usu_id) references usuarios (usu_id),
    foreign key (pro_id) references profesionales (pro_id),
    foreign key (tur_id) references turnos (tur_id)
);

create table facturasDetalle(
	fac_id int,
    ser_id int(9),
    fac_precioSer float (9,2),
    primary key (fac_id,ser_id),
    foreign key (fac_id) references facturasCabecera(fac_id),
    foreign key (ser_id) references servicios (ser_id)
);

create table contabilidad(
    con_id int auto_increment,
    fac_id int,
    ser_id int(9),
    primary key (con_id,fac_id),
    foreign key (fac_id) references facturasDetalle(fac_id),
    foreign key (ser_id) references facturasDetalle(ser_id)
);


