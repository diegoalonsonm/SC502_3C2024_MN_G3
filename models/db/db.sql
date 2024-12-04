-- crear db
CREATE DATABASE PROYECTO_G3;

-- usar db
USE proyecto_g3;

-- crear tablas
CREATE TABLE estado (
    idEstado int not null PRIMARY KEY AUTO_INCREMENT,
    descrpcion varchar(100) not null
);

CREATE TABLE rol (
    idRol int not null PRIMARY KEY AUTO_INCREMENT,
    descrpcion varchar(100) not null
);

create table usuario(
    idUsuario int not null PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(100) not null,
    apellido1 varchar(100) not null,
    apellido2 varchar(100) not null,
    cedula varchar(100) not null UNIQUE,
    correo varchar(100) not null UNIQUE,
    telefono varchar(100) not null UNIQUE,
    contrasena varchar(100) not null,
    idRol int not null,
    idEstado int not null,
    FOREIGN KEY (idRol) REFERENCES rol(idRol),
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado)
);

CREATE TABLE direccion(
    idDireccion int PRIMARY KEY NOT null AUTO_INCREMENT,
    provincia varchar(100) not null,
    canton varchar(100) not null,
    distrito varchar(100) not null,
    otrasDirecciones varchar(500) not null,
    coordenadasY varchar(255),
    coordenadasX varchar(255),
    idEstado int not null,
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado)
);

CREATE table sensor(
    idSensor int not null PRIMARY key AUTO_INCREMENT,
    codigo varchar(100) not null UNIQUE,
    marca varchar(100) not null,
    idEstado int not null,
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado)
);

create table alcantarilla(
    idAlcantarilla int not null PRIMARY KEY AUTO_INCREMENT,
    codigo varchar(100) not null unique,
    idSensor int not null,
    idEstado int not null,
    idDireccion int not null,
    FOREIGN KEY (idSensor) REFERENCES sensor (idSensor),
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado),
    FOREIGN KEY (idDireccion) REFERENCES direccion(idDireccion)
);

create TABLE alarma(
    idAlarma int not null PRIMARY key AUTO_INCREMENT,
    textoAlerta varchar(500) not null,
    idEstado int not null,
    idAlcantarilla int not null,
    idUsuarioAlertar int not null,
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado),
    FOREIGN KEY (idUsuarioAlertar) REFERENCES usuario (idUsuario)
);

-- insert de datos quemados para pruebas
INSERT INTO estado (descrpcion) VALUES ('Activo');
INSERT INTO estado (descrpcion) VALUES ('Inactivo');
INSERT INTO estado (descrpcion) VALUES ('Pendiente');

INSERT INTO rol (descrpcion) VALUES ('Administrador');
INSERT INTO rol (descrpcion) VALUES ('Usuario');

INSERT INTO usuario (nombre, apellido1, apellido2, cedula, correo, telefono, contrasena, idRol, idEstado) VALUES
                                                                                                              ('Juan', 'Pérez', 'Gómez', '123456789', 'juan.perez@example.com', '1234567890', 'password123', 1, 1),
                                                                                                              ('María', 'López', 'Hernández', '987654321', 'maria.lopez@example.com', '0987654321', 'password456', 2, 1),
                                                                                                              ('Carlos', 'Rodríguez', 'Molina', '456123789', 'carlos.rodriguez@example.com', '4567891230', 'password789', 2, 2),
                                                                                                              ('Ana', 'Martínez', 'Vargas', '321654987', 'ana.martinez@example.com', '7891234560', 'password012', 1, 3),
                                                                                                              ('Laura', 'García', 'Rojas', '159753468', 'laura.garcia@example.com', '3216549870', 'password345', 2, 1);

INSERT INTO direccion (provincia, canton, distrito, otrasDirecciones, coordenadasY, coordenadasX, idEstado) VALUES
                                                                                                                ('San José', 'Central', 'Carmen', 'Cerca del parque central', '9.9333', '-84.0833', 1),
                                                                                                                ('Alajuela', 'Central', 'San José', 'Frente a la iglesia', '10.0167', '-84.2167', 2),
                                                                                                                ('Heredia', 'Central', 'San Francisco', 'Detrás del estadio', '10.0025', '-84.1167', 1),
                                                                                                                ('Cartago', 'Central', 'Oriental', 'A un costado del mercado', '9.8667', '-83.9167', 3),
                                                                                                                ('Puntarenas', 'Central', 'Barranca', 'Cerca de la playa', '9.9765', '-84.8335', 1);

INSERT INTO sensor (codigo, marca, idEstado) VALUES
                                                 ('SEN001', 'Bosch', 1),
                                                 ('SEN002', 'Honeywell', 2),
                                                 ('SEN003', 'Siemens', 1),
                                                 ('SEN004', 'Panasonic', 3),
                                                 ('SEN005', 'GE', 1);

INSERT INTO alcantarilla (codigo, idSensor, idEstado, idDireccion) VALUES
                                                                       ('ALC001', 1, 1, 1),
                                                                       ('ALC002', 2, 2, 2),
                                                                       ('ALC003', 3, 1, 3),
                                                                       ('ALC004', 4, 3, 4),
                                                                       ('ALC005', 5, 1, 5);

INSERT INTO alarma (textoAlerta, idEstado, idAlcantarilla, idUsuarioAlertar) VALUES
                                                                                 ('Nivel de agua alto en la alcantarilla ALC001', 1, 1, 1),
                                                                                 ('Sensor desactivado en la alcantarilla ALC002', 2, 2, 2),
                                                                                 ('Obstrucción detectada en la alcantarilla ALC003', 1, 3, 3),
                                                                                 ('Fallo en el sensor de la alcantarilla ALC004', 3, 4, 4),
                                                                                 ('Revisión programada para la alcantarilla ALC005', 1, 5, 5);