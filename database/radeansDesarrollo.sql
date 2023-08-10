
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
    prof_correo varchar (30) not null unique,
    prof_cuit varchar(12) not null unique,
    prof_domicilio varchar(60),
    prof_tel varchar(11),
	primary key (prof_id)
);

create table servicios(
	serv_id int auto_increment not null unique,
    serv_nombre varchar(30),
    serv_desc varchar (255),
    primary key (serv_id)
);

create table estados (
	est_id int auto_increment not null unique,
    est_desc varchar(20),
    primary key (est_id)
);

create table turnos(
	tur_id int auto_increment not null unique,
    tur_fecha TIMESTAMP,
    est_id int,
    usu_id int DEFAULT 0,
    prof_id int,
    serv_id int,
    primary key (tur_id,prof_id,serv_id),
    foreign key (usu_id) references usuarios (usu_id),
    foreign key (prof_id) references profesionales (prof_id),
    foreign key (serv_id) references servicios (serv_id),
    foreign key (est_id) references estados (est_id)
);

