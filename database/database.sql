CREATE DATABASE softwares;
USE softwares;

-- Tabla software
CREATE TABLE software
(
	idsoftware 			INT AUTO_INCREMENT PRIMARY KEY,
	nombre 				VARCHAR(100)	NOT NULL,
	precio				DECIMAL(7,2)	NOT NULL,
	fechalanzamiento		DATE 		NOT NULL,
	tiposoftware			CHAR(1) 		NOT NULL,
	desarrollador			VARCHAR(80)	NOT NULL,
	lenguajedesarrollado	VARCHAR(150)	NOT NULL,
	estado				CHAR(1) 		NOT NULL DEFAULT('1'),
	fecharegistro			DATETIME		NOT NULL DEFAULT NOW()
)ENGINE=INNODB;

-- Valores insertados
INSERT INTO software (nombre, precio, fechalanzamiento, tiposoftware, desarrollador, lenguajedesarrollado)
	VALUES('Adobe Photoshop', 71.77, '1990-02-19', 'A', 'Adobe Systems Incorporated', 'Pascal, C++'),
		('Notepad++', 00, '2003-11-24', 'P', 'Don Ho', 'C++'),
		('Google Chrome', 00, '2008-09-02', 'P', 'Google', 'JavaScript, Python');

-- Listar los datos de la tabla software
DELIMITER $$
CREATE PROCEDURE spu_software_listar()
BEGIN
	SELECT idsoftware, nombre, fechalanzamiento,
	CASE
		WHEN tiposoftware = 'A' THEN 'Software de aplicación'
		WHEN tiposoftware = 'P' THEN 'Software de programación'
		WHEN tiposoftware = 'S' THEN 'Software de sistema'
	END 'tiposoftware', 
	desarrollador, lenguajedesarrollado,
	CASE
		WHEN precio = 0 THEN 'Gratis'
		WHEN precio THEN precio
	END 'precio'
	FROM software
	WHERE estado = '1'
	ORDER BY idsoftware DESC;
END $$

CALL spu_software_listar;

-- Registrar datos en la tabla software 
DELIMITER $$
CREATE PROCEDURE spu_software_registrar
(
	IN _nombre 				VARCHAR(100),
	IN _precio				DECIMAL(7,2),
	IN _fechalanzamiento		DATE,
	IN _tiposoftware			CHAR(1),
	IN _desarrollador			VARCHAR(80),
	IN _lenguajedesarrollado		VARCHAR(150)
)
BEGIN
	INSERT INTO software (nombre, precio, fechalanzamiento, tiposoftware, desarrollador, lenguajedesarrollado)
	VALUES ( _nombre, _precio, _fechalanzamiento, _tiposoftware, _desarrollador, _lenguajedesarrollado);
END $$

CALL spu_cursos_registrar('Python para todos', 'ETI', 'B', '2023-05-10', 120);

-- Eliminar datos en la tabla software 
DELIMITER $$
CREATE PROCEDURE spu_software_eliminar(IN _idsoftware INT)
BEGIN	
  UPDATE software
	SET estado = '0'
	WHERE idsoftware = _idsoftware;
END $$		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		