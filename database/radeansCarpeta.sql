create database radeansCarpeta;

use radeansCarpeta;

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
    usu_clave varchar(16),
    usu_razSoc varchar(60),
    usu_cuitl int (11),    
    usu_condIVA varchar(30),
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

create table estados (
	est_id int(1) auto_increment not null unique,
    est_desc varchar(20),
    primary key (est_id)
);

create table categorias(
	cat_id int auto_increment not null unique,
    cat_desc varchar(40),
    est_id int,
    primary key (cat_id),
    foreign key (est_id) references estados (est_id)
);

create table servicios(
	ser_id int auto_increment not null unique,
    ser_desc varchar(30),
    cat_id int,
    est_id int,
    primary key (ser_id),
    foreign key (cat_id) references categorias (cat_id),
    foreign key (est_id) references estados (est_id)
);
	
create table turnos(
	tur_id int auto_increment not null unique,
    tur_fecha date,
    tur_horario varchar(5),
    est_id int,
    usu_id int,
    prof_id int,
    cat_id int,
    primary key (tur_id,usu_id,cat_id),
    foreign key (usu_id) references usuarios (usu_id),
    foreign key (prof_id) references profesionales (prof_id),
    foreign key (cat_id) references categorias (cat_id),
    foreign key (est_id) references estados (est_id)
);

create table comprobantes(
	comp_id int auto_increment not null unique,
    comp_desc char(1),
    primary key (comp_id)
);

create table tiposFact(
	tiposF_id int auto_increment not null unique,
    tiposF_desc char(1),
    primary key (tiposF_id)
);

create table facturasCabecera(
	fac_id int auto_increment not null unique,
    fac_Total float(9.2),
    fac_fecha date,
    fac_cae varchar(49),
    usu_id int,
    tur_id int,
    comp_id int,
    tiposF_id int,
    primary key(fac_id,usu_id),
    foreign key (usu_id) references usuarios (usu_id),
    foreign key (tur_id) references turnos (tur_id),
    foreign key (comp_id) references comprobantes (comp_id),
    foreign key (tiposF_id) references tiposFact(tiposF_id)
);

create table facturasDetalle(
	fdet_id int auto_increment not null unique,
    fdet_cant int(2),
    fdet_preunit float(9.2),
    fdet_descuen float (9.2),
    fdet_monto float(9.2),
    fdet_iva float(1.2),
    fdet_total float(9.2),
    fac_id int,
    ser_id int,
    primary key (fac_id,ser_id),
    foreign key (fac_id) references facturasCabecera(fac_id),
    foreign key (ser_id) references servicios (ser_id)
);

-- create table contabilidad(
--    con_id int auto_increment,
--    fac_id int,
--    ser_id int(9),
--    primary key (con_id,fac_id),
--    foreign key (fac_id) references facturasDetalle(fac_id),
--    foreign key (ser_id) references facturasDetalle(ser_id)
-- );

-- objetivos limites alcances, der, contexto, nivel 0 y nivel 1

-- drop database radeansCarpeta;