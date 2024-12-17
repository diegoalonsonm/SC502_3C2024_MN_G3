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
    idEstado int ,
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
    idEstado int,
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado)
);

CREATE table sensor(
    idSensor int not null PRIMARY key AUTO_INCREMENT,
    codigo varchar(100) not null UNIQUE,
    marca varchar(100) not null,
    idEstado int ,
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado)
);

create table alcantarilla(
    idAlcantarilla int not null PRIMARY KEY AUTO_INCREMENT,
    codigo varchar(100) unique,
    idSensor int not null,
    idEstado int ,
    idDireccion int not null,
    FOREIGN KEY (idSensor) REFERENCES sensor (idSensor),
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado),
    FOREIGN KEY (idDireccion) REFERENCES direccion(idDireccion)
);

create TABLE alarma(
    idAlarma int not null PRIMARY key AUTO_INCREMENT,
    textoAlerta varchar(500) not null,
    idEstado int,
    idAlcantarilla int not null,
    idUsuarioAlertar int not null,
    FOREIGN KEY (idEstado) REFERENCES estado (idEstado),
    FOREIGN KEY (idUsuarioAlertar) REFERENCES usuario (idUsuario)
);

-- insert de datos quemados para pruebas
INSERT INTO estado (descrpcion) VALUES ('Activo');
INSERT INTO estado (descrpcion) VALUES ('Inactivo');
INSERT INTO estado (descrpcion) VALUES ('Pendiente');
INSERT INTO estado (descrpcion) VALUES ('En mantenimiento');

INSERT INTO rol (descrpcion) VALUES ('Administrador');
INSERT INTO rol (descrpcion) VALUES ('Usuario');
INSERT INTO rol (descrpcion) VALUES ('Mantenimiento');

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
INSERT INTO direccion (provincia, canton, distrito, otrasDirecciones, coordenadasY, coordenadasX, idEstado)
VALUES
('San José', 'Escazú', 'San Rafael', 'Cerca del parque central, casa azul', '9.92759', '-84.13715', 1),
('Alajuela', 'San Carlos', 'Quesada', 'Detrás del estadio, portón negro', '10.33835', '-84.42729', 2),
('Cartago', 'Turrialba', 'La Suiza', '100 metros norte de la iglesia, casa amarilla', '9.90566', '-83.67739', 1),
('Heredia', 'San Rafael', 'Concepción', 'Frente al supermercado, edificio blanco', '10.01584', '-84.08849', 3),
('Guanacaste', 'Liberia', 'Curubandé', '2 km al oeste del cruce principal, finca El Paraíso', '10.66675', '-85.45648', 2),
('Puntarenas', 'Osa', 'Puerto Cortés', 'Cerca del muelle, edificio color crema', '8.95506', '-83.52738', 1),
('Limón', 'Pococí', 'Guápiles', 'A la par de la estación de bomberos', '10.21511', '-83.78753', 3),
('San José', 'Desamparados', 'San Miguel', 'Frente al colegio, casa de dos pisos', '9.88454', '-84.04839', 1),
('Alajuela', 'Grecia', 'San Roque', '100 metros al este del mercado, portón verde', '10.06903', '-84.31677', 2),
('Cartago', 'Jiménez', 'Juan Viñas', 'Sobre la carretera principal, casa blanca', '9.89448', '-83.70542', 3),
('Heredia', 'Belén', 'San Antonio', 'Frente al parque industrial, edificio gris', '9.97303', '-84.15494', 1),
('Guanacaste', 'Santa Cruz', 'Tamarindo', 'Cerca de la playa, edificio de madera', '10.29977', '-85.84163', 2),
('Puntarenas', 'Montes de Oro', 'Miramar', 'En la montaña, finca Los Abuelos', '10.09659', '-84.75477', 1),
('Limón', 'Talamanca', 'Bratsi', 'En la comunidad indígena, edificio comunitario', '9.73177', '-83.06404', 2),
('San José', 'Goicoechea', 'Guadalupe', 'Al frente del centro comercial, casa azul', '9.94531', '-84.05932', 3);


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

INSERT INTO alcantarilla (codigo, idSensor, idEstado, idDireccion) VALUES
('ALC006', 1, 1, 1),
('ALC007', 2, 2, 2),
('ALC008', 3, 3, 3),
('ALC009', 4, 1, 4),
('ALC010', 5, 2, 5),
('ALC011', 1, 3, 6),
('ALC012', 2, 1, 7),
('ALC013', 3, 2, 8),
('ALC014', 4, 3, 9),
('ALC015', 5, 1, 10),
('ALC016', 1, 2, 11),
('ALC017', 2, 3, 12),
('ALC018', 3, 1, 13),
('ALC019', 4, 2, 14),
('ALC020', 5, 3, 15),
('ALC021', 1, 1, 1),
('ALC022', 2, 2, 2),
('ALC023', 3, 3, 3),
('ALC024', 4, 1, 4),
('ALC025', 5, 2, 5),
('ALC026', 1, 3, 6),
('ALC027', 2, 1, 7),
('ALC028', 3, 2, 8),
('ALC029', 4, 3, 9),
('ALC030', 5, 1, 10);

INSERT INTO alcantarilla (codigo, idSensor, idEstado, idDireccion)
VALUES
('ALC031', 1, 1, 11),
('ALC032', 1, 2, 12),
('ALC033', 2, 3, 13),
('ALC034', 2, 1, 14),
('ALC035', 2, 2, 15),
('ALC036', 3, 3, 1),
('ALC037', 4, 1, 2),
('ALC038', 4, 2, 3),
('ALC039', 4, 3, 4),
('ALC040', 5, 1, 5);


INSERT INTO alarma (textoAlerta, idEstado, idAlcantarilla, idUsuarioAlertar) VALUES
                                                                                 ('Nivel de agua alto en la alcantarilla ALC001', 1, 1, 1),
                                                                                 ('Sensor desactivado en la alcantarilla ALC002', 2, 2, 2),
                                                                                 ('Obstrucción detectada en la alcantarilla ALC003', 1, 3, 3),
                                                                                 ('Fallo en el sensor de la alcantarilla ALC004', 3, 4, 4),
                                                                                 ('Revisión programada para la alcantarilla ALC005', 1, 5, 5);

-- tabla de reportes
create table reportes(
	idReporte int not null PRIMARY KEY AUTO_INCREMENT,
    comentario text not null,
    fecha datetime not null,
    idUsuario int not null,
    idAlcantarilla int not null,
    idEstado int not null,
    foreign key (idUsuario) references usuario (idUsuario),
    foreign key (idAlcantarilla) references alcantarilla (idAlcantarilla),
    foreign key (idEstado) references estado (idEstado)  
);  

-- inserts para la tabla de reportes
INSERT INTO reportes (comentario, fecha, idUsuario, idAlcantarilla, idEstado) VALUES
('Reporte inicial de inspección en la alcantarilla ALC001.', '2024-12-12', 1, 1, 1),
('Revisión técnica realizada, todo en orden en la alcantarilla ALC002.', '2024-12-12', 2, 2, 1),
('Se detectó acumulación de desechos en la alcantarilla ALC003, requiere limpieza.', '2024-12-12', 3, 3, 2),
('Informe de fallo en el sensor de la alcantarilla ALC004.', '2024-12-12', 4, 4, 3),
('Inspección periódica completada en la alcantarilla ALC005, sin novedades.', '2024-12-12', 5, 5, 1),
('Se encontró un problema menor en la alcantarilla ALC006, será reparado pronto.', '2024-12-12', 1, 6, 2),
('Reporte de posible bloqueo en la alcantarilla ALC007, requiere intervención.', '2024-12-12', 2, 7, 2),
('Actualización de estado en la alcantarilla ALC008, todo funciona correctamente.', '2024-12-12', 3, 8, 1),
('Se ha detectado daño estructural en la alcantarilla ALC009.', '2024-12-12', 4, 9, 3),
('El nivel de agua en la alcantarilla ALC010 está en valores normales.', '2024-12-12', 5, 10, 1);

-- tabla de mantenimiento
create table mantenimiento(
    idMantenimiento int not null PRIMARY KEY AUTO_INCREMENT,
    fechaInicio datetime not null,
    fechaFin datetime not null,
    instrucciones text not null,
    idUsuario int not null,
    idAlcantarilla int not null,
    idEstado int,
    foreign key (idUsuario) references usuario (idUsuario),
    foreign key (idAlcantarilla) references alcantarilla (idAlcantarilla),
    foreign key (idEstado) references estado (idEstado)  
);

-- inserts para la tabla de mantenimiento
INSERT INTO mantenimiento (fechaInicio, fechaFin, instrucciones, idUsuario, idAlcantarilla) VALUES
('2024-12-12', '2024-12-13', 'Limpieza de alcantarilla ALC001.', 4, 1),
('2024-12-12', '2024-12-13', 'Revisión técnica en alcantarilla ALC002.', 4, 2),
('2024-12-12', '2024-12-13', 'Mantenimiento preventivo en alcantarilla ALC003.', 5, 3),
('2024-12-12', '2024-12-13', 'Reparación de sensor en alcantarilla ALC004.', 1, 4),
('2024-12-12', '2024-12-13', 'Inspección de rutina en alcantarilla ALC005.', 1, 5),
('2024-12-12', '2024-12-13', 'Reparación de alcantarilla ALC006.', 1, 6),
('2024-12-12', '2024-12-13', 'Limpieza de alcantarilla ALC007.', 2, 7),
('2024-12-12', '2024-12-13', 'Revisión técnica en alcantarilla ALC008.', 5, 8),
('2024-12-12', '2024-12-13', 'Mantenimiento preventivo en alcantarilla ALC009.', 3, 9),
('2024-12-12', '2024-12-13', 'Reparación de sensor en alcantarilla ALC010.', 2, 10);

-- TRIGGERS DE ESTADO

-- usuario
DELIMITER $$
CREATE TRIGGER set_estado_usuario
BEFORE INSERT
ON usuario
FOR EACH ROW
BEGIN
    SET NEW.idEstado = 1;
END$$

DELIMITER ;

-- mantenimiento
DELIMITER $$
CREATE TRIGGER set_estado_mantenimiento
BEFORE INSERT
ON mantenimiento
FOR EACH ROW
BEGIN
    SET NEW.idEstado = 3;
END$$

DELIMITER ;

-- direccion
DELIMITER $$
CREATE TRIGGER set_estado_direccion
BEFORE INSERT
ON direccion
FOR EACH ROW
BEGIN
    SET NEW.idEstado = 1;
END$$

-- alarma
DELIMITER $$
CREATE TRIGGER set_estado_alarma
BEFORE INSERT
ON alarma
FOR EACH ROW
BEGIN
    SET NEW.idEstado = 1;
END$$

-- alcantarilla
DELIMITER $$
CREATE TRIGGER set_estado_alcantarilla
BEFORE INSERT
ON alcantarilla
FOR EACH ROW
BEGIN
    SET NEW.idEstado = 1;
END$$

-- reportes
DELIMITER $$
CREATE TRIGGER set_estado_reportes
BEFORE INSERT
ON reportes
FOR EACH ROW
BEGIN
    SET NEW.idEstado = 1;
END$$

-- sensores
DELIMITER $$
CREATE TRIGGER set_estado_sensores
BEFORE INSERT
ON sensor
FOR EACH ROW
BEGIN
    SET NEW.idEstado = 1;
END$$

-- TRIGGER DE SECUENICA
DELIMITER $$

DELIMITER $$
CREATE TRIGGER generar_codigo_alcantarilla
BEFORE INSERT
ON alcantarilla
FOR EACH ROW
BEGIN
    DECLARE nuevo_codigo INT;

    SELECT COALESCE(MAX(CAST(SUBSTRING(codigo, 4) AS UNSIGNED)), 0) + 1 
    INTO nuevo_codigo 
    FROM alcantarilla;

    SET NEW.codigo = CONCAT('ALC', LPAD(nuevo_codigo, 3, '0'));
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER generar_codigo_sensor
BEFORE INSERT
ON sensor
FOR EACH ROW
BEGIN
    DECLARE nuevo_codigo INT;

    SELECT CAST(SUBSTRING(codigo, 4) AS UNSIGNED) + 1 
    INTO nuevo_codigo
    FROM sensor
    ORDER BY CAST(SUBSTRING(codigo, 4) AS UNSIGNED) DESC
    LIMIT 1;

    SET NEW.codigo = CONCAT('SEN', LPAD(nuevo_codigo, 3, '0'));
END$$

DELIMITER ;

DELIMITER $$

DELIMITER //

CREATE TRIGGER actualizar_estado_alcantarilla
AFTER INSERT ON mantenimiento
FOR EACH ROW
BEGIN
    UPDATE alcantarilla
    SET idEstado = 4
    WHERE idAlcantarilla = NEW.idAlcantarilla;
END //

DELIMITER ;