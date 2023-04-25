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

create table servicios(
	ser_id int auto_increment not null unique,
    ser_nombre varchar(30),
    ser_observaciones varchar (255),
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
