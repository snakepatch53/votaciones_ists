CREATE DATABASE votaciones;
USE votaciones;

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) DEFAULT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `administradores` VALUES (1,'Administrador','admin','admin');

CREATE TABLE `candidatos` (
  `id_candidato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `curso` varchar(70) DEFAULT NULL,
  `foto` longtext,
  `pass` varchar(50) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `id_lista` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_candidato`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_lista` (`id_lista`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

CREATE TABLE `fecha_max` (
  `id_fecha_max` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_fecha_max`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
INSERT INTO fecha_max SET id_fecha_max=1, fecha='2019-01-01';
INSERT INTO fecha_max SET id_fecha_max=2, fecha='2019-01-01';

CREATE TABLE `listas` (
  `id_lista` int(11) NOT NULL AUTO_INCREMENT,
  `letra` varchar(5) DEFAULT NULL,
  `frase` varchar(200) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_lista`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `votantes` (
  `id_votante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `curso` varchar(70) DEFAULT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `id_lista` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_votante`),
  KEY `id_lista` (`id_lista`)
) ENGINE=MyISAM AUTO_INCREMENT=551 DEFAULT CHARSET=latin1;

CREATE PROCEDURE `sp_administradores_consulta`()
BEGIN
SELECT * FROM administradores;
END;

CREATE PROCEDURE `sp_administradores_consultaEspecifica`(in id_administrador_ int)
BEGIN
SELECT * FROM administradores WHERE id_administrador = id_administrador_;
END;

CREATE PROCEDURE `sp_administradores_editar`(in nombre_ varchar(50),in cedula_ varchar(12),in pass_ varchar(50),in id_administrador_ int)
BEGIN
UPDATE administradores SET nombre=nombre_,cedula=cedula_,pass=pass_ WHERE id_administrador=id_administrador_;
END;

CREATE PROCEDURE `sp_administradores_eliminar`(in id_administrador_ int)
BEGIN
DELETE FROM administradores WHERE id_administrador = id_administrador_;
END;

CREATE PROCEDURE `sp_administradores_guardar`(in nombre_ varchar(50),in cedula_ varchar(12),in pass_ varchar(50))
BEGIN
INSERT INTO administradores SET nombre=nombre_,cedula=cedula_,pass=pass_;
END;

CREATE PROCEDURE `sp_administradores_login`(in cedula_ varchar(12), in pass_ varchar(50))
BEGIN
SELECT * FROM administradores WHERE cedula=cedula_ AND pass=pass_;
END;

CREATE PROCEDURE `sp_candidatos_consulta`()
BEGIN
SELECT
candidatos.id_candidato AS id_candidato,
candidatos.nombre AS nombre,
candidatos.apellido AS apellido,
candidatos.cedula AS cedula,
candidatos.curso AS curso,
candidatos.foto AS foto,
cargos.id_cargo AS id_cargo,
cargos.nombre AS cargo,
listas.id_lista AS id_lista,
listas.letra AS lista
FROM candidatos
INNER JOIN cargos ON candidatos.id_cargo=cargos.id_cargo
INNER JOIN listas ON candidatos.id_lista=listas.id_lista;
END;

CREATE PROCEDURE `sp_candidatos_consultaEspecifica`(in id_candidato_ int)
BEGIN
SELECT
candidatos.id_candidato AS id_candidato,
candidatos.nombre AS nombre,
candidatos.apellido AS apellido,
candidatos.cedula AS cedula,
candidatos.curso AS curso,
candidatos.foto AS foto,
cargos.id_cargo AS id_cargo,
cargos.nombre AS cargo,
listas.id_lista AS id_lista,
listas.letra AS lista
FROM candidatos
INNER JOIN cargos ON candidatos.id_cargo=cargos.id_cargo
INNER JOIN listas ON candidatos.id_lista=listas.id_lista
WHERE id_candidato = id_candidato_;
END;

CREATE PROCEDURE `sp_candidatos_editar`(in nombre_ varchar(50),in apellido_ varchar(50),in cedula_ varchar(12),in curso_ varchar(70),in foto_ longtext,in id_cargo_ int,in id_lista_ int,in id_candidato_ int)
BEGIN
UPDATE candidatos SET nombre=nombre_,apellido=apellido_,cedula=cedula_,curso=curso_,foto=foto_,id_cargo=id_cargo_,id_lista=id_lista_ WHERE id_candidato=id_candidato_;
END;

CREATE PROCEDURE `sp_candidatos_eliminar`(in id_candidato_ int)
BEGIN
DELETE FROM candidatos WHERE id_candidato = id_candidato_;
END;

CREATE PROCEDURE `sp_candidatos_guardar`(in nombre_ varchar(50),in apellido_ varchar(50),in cedula_ varchar(12),in curso_ varchar(70),in foto_ longtext,in id_cargo_ int,in id_lista_ int)
BEGIN
INSERT INTO candidatos SET nombre=nombre_,apellido=apellido_,cedula=cedula_,curso=curso_,foto=foto_, pass=cedula_,id_cargo=id_cargo_,id_lista=id_lista_;
END;

CREATE PROCEDURE `sp_candidatos_login`(in cedula_ varchar(12), in pass_ varchar(50))
BEGIN
SELECT * FROM candidatos WHERE cedula=cedula_ AND pass=pass_;
END;

CREATE PROCEDURE `sp_cargos_consulta`()
BEGIN
SELECT * FROM cargos;
END;

CREATE PROCEDURE `sp_cargos_consultaEspecifica`(in id_cargo_ int)
BEGIN
SELECT * FROM cargos WHERE id_cargo = id_cargo_;
END;

CREATE PROCEDURE `sp_cargos_editar`(in nombre_ varchar(50),in id_cargo_ int)
BEGIN
UPDATE cargos SET nombre=nombre_ WHERE id_cargo=id_cargo_;
END;

CREATE PROCEDURE `sp_cargos_eliminar`(in id_cargo_ int)
BEGIN
DELETE FROM cargos WHERE id_cargo = id_cargo_;
END;

CREATE PROCEDURE `sp_cargos_guardar`(in nombre_ varchar(50))
BEGIN
INSERT INTO cargos SET nombre=nombre_;
END;

CREATE PROCEDURE `sp_listas_consulta`()
BEGIN
SELECT * FROM listas;
END;

CREATE PROCEDURE `sp_listas_consultaEspecifica`(in id_lista_ int)
BEGIN
SELECT * FROM listas WHERE id_lista = id_lista_;
END;

CREATE PROCEDURE `sp_listas_editar`(in letra_ varchar(5),in frase_ varchar(200),in nombre_ varchar(50),in id_lista_ int)
BEGIN
UPDATE listas SET letra=letra_,frase=frase_,nombre=nombre_ WHERE id_lista=id_lista_;
END;

CREATE PROCEDURE `sp_listas_eliminar`(in id_lista_ int)
BEGIN
DELETE FROM listas WHERE id_lista = id_lista_;
END;

CREATE PROCEDURE `sp_listas_guardar`(in letra_ varchar(5),in frase_ varchar(200),in nombre_ varchar(50))
BEGIN
INSERT INTO listas SET letra=letra_,frase=frase_,nombre=nombre_;
END;

CREATE PROCEDURE `sp_votantes_consulta`()
BEGIN
SELECT * FROM votantes;
END;

CREATE PROCEDURE `sp_votantes_consultaEspecifica`(in id_votante_ int)
BEGIN
SELECT * FROM votantes WHERE id_votante = id_votante_;
END;

CREATE PROCEDURE `sp_votantes_editar`(in nombre_ varchar(50),in apellido_ varchar(50),in curso_ varchar(70),in cedula_ varchar(12),in pass_ varchar(50),in id_votante_ int)
BEGIN
UPDATE votantes SET nombre=nombre_,apellido=apellido_,curso=curso_,cedula=cedula_,pass=pass_ WHERE id_votante=id_votante_;
END;

CREATE PROCEDURE `sp_votantes_eliminar`(in id_votante_ int)
BEGIN
DELETE FROM votantes WHERE id_votante = id_votante_;
END;

CREATE PROCEDURE `sp_votantes_guardar`(in nombre_ varchar(50),in apellido_ varchar(50),in curso_ varchar(70),in cedula_ varchar(12),in pass_ varchar(50))
BEGIN
INSERT INTO votantes SET nombre=nombre_,apellido=apellido_,curso=curso_,cedula=cedula_,pass=pass_;
END;

CREATE PROCEDURE `sp_votantes_login`(in cedula_ varchar(12), in pass_ varchar(50))
BEGIN
SELECT * FROM votantes WHERE cedula=cedula_ AND pass=pass_;
END;