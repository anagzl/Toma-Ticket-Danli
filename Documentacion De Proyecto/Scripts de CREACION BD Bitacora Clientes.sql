-- MySQL Workbench Synchronization
-- Generated: 2022-05-24 14:36
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Administrador

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `bitacora_servicio_cliente_ip`.`Usuario` 
DROP FOREIGN KEY `fk_Usuario_TipoCliente1`;

ALTER TABLE `bitacora_servicio_cliente_ip`.`Usuario` 
DROP COLUMN `TipoCliente_idTipoCliente`,
DROP COLUMN `numeroTelefonoFijo`,
ADD COLUMN `TipoUsuario_idTipoUsuario` INT(11) NOT NULL AFTER `Genero_idGenero`,
ADD COLUMN `Rol_idRol` INT(11) NOT NULL AFTER `TipoUsuario_idTipoUsuario`,
CHANGE COLUMN `email` `correo` VARCHAR(45) NULL DEFAULT NULL ,
ADD INDEX `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario_idTipoUsuario` ASC) ,
ADD INDEX `fk_Usuario_Rol1_idx` (`Rol_idRol` ASC) ,
DROP INDEX `fk_Usuario_TipoCliente1_idx` ;
;

ALTER TABLE `bitacora_servicio_cliente_ip`.`TipoCliente` 
CHANGE COLUMN `idTipoCliente` `idTipoUsuario` INT(11) NOT NULL ,
CHANGE COLUMN `nombreTipoClientecol` `nombre` VARCHAR(100) NULL DEFAULT NULL , RENAME TO  `bitacora_servicio_cliente_ip`.`TipoUsuario` ;

ALTER TABLE `bitacora_servicio_cliente_ip`.`Bitacora` 
ADD COLUMN `Sede_idSede` INT(11) NOT NULL AFTER `idBitacora`,
ADD COLUMN `horaGeneracionTicket` TIME NULL DEFAULT NULL AFTER `fecha`,
ADD COLUMN `horaSalida` TIME NULL DEFAULT NULL AFTER `horaEntrada`,
ADD COLUMN `numeroTicket` INT(11) NULL DEFAULT NULL AFTER `Observacion`,
CHANGE COLUMN `hora` `horaEntrada` TIME NULL DEFAULT NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`idBitacora`, `Sede_idSede`),
ADD INDEX `fk_Bitacora_Sede1_idx` (`Sede_idSede` ASC) ;
;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`Ventanilla` (
  `idVentanilla` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Direccion_idDireccion` INT(11) NOT NULL,
  PRIMARY KEY (`idVentanilla`),
  INDEX `fk_Ventanilla_Direccion1_idx` (`Direccion_idDireccion` ASC) ,
  CONSTRAINT `fk_Ventanilla_Direccion1`
    FOREIGN KEY (`Direccion_idDireccion`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Direccion` (`idDireccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`TramitesHabilitadoVentanilla` (
  `idTramitesHabilitadoVentanilla` INT(11) NOT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  `Ventanilla_idVentanilla` INT(11) NOT NULL,
  PRIMARY KEY (`idTramitesHabilitadoVentanilla`),
  INDEX `fk_TramitesHabilitadoVentanilla_Ventanilla1_idx` (`Ventanilla_idVentanilla` ASC) ,
  CONSTRAINT `fk_TramitesHabilitadoVentanilla_Ventanilla1`
    FOREIGN KEY (`Ventanilla_idVentanilla`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Ventanilla` (`idVentanilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`JornadaLaboral` (
  `idJornadaLaboral` INT(11) NOT NULL,
  `obs` VARCHAR(1000) NULL DEFAULT NULL,
  `Usuario_idUsuario` VARCHAR(15) NOT NULL,
  `Ventanilla_idVentanilla` INT(11) NOT NULL,
  `TipoJornadaLaboral_idTipoJornadaLaboral` INT(11) NOT NULL,
  PRIMARY KEY (`idJornadaLaboral`),
  INDEX `fk_JornadaLaboral_Usuario1_idx` (`Usuario_idUsuario` ASC) ,
  INDEX `fk_JornadaLaboral_Ventanilla1_idx` (`Ventanilla_idVentanilla` ASC) ,
  INDEX `fk_JornadaLaboral_TipoJornadaLaboral1_idx` (`TipoJornadaLaboral_idTipoJornadaLaboral` ASC) ,
  CONSTRAINT `fk_JornadaLaboral_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_JornadaLaboral_Ventanilla1`
    FOREIGN KEY (`Ventanilla_idVentanilla`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Ventanilla` (`idVentanilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_JornadaLaboral_TipoJornadaLaboral1`
    FOREIGN KEY (`TipoJornadaLaboral_idTipoJornadaLaboral`)
    REFERENCES `bitacora_servicio_cliente_ip`.`TipoJornadaLaboral` (`idTipoJornadaLaboral`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`Direccion` (
  `idDireccion` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idDireccion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`TipoJornadaLaboral` (
  `idTipoJornadaLaboral` INT(11) NOT NULL,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  `horaInicio` TIME NULL DEFAULT NULL,
  `horaSalida` TIME NULL DEFAULT NULL,
  PRIMARY KEY (`idTipoJornadaLaboral`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`Ubicacion` (
  `idUbicacion` INT(11) NOT NULL,
  `nombreUbicacion` VARCHAR(45) NULL DEFAULT NULL,
  `siglas` VARCHAR(45) NULL DEFAULT NULL,
  `Municipio_idMunicipio` INT(11) NOT NULL,
  PRIMARY KEY (`idUbicacion`),
  INDEX `fk_Ubicacion_Municipio1_idx` (`Municipio_idMunicipio` ASC) ,
  CONSTRAINT `fk_Ubicacion_Municipio1`
    FOREIGN KEY (`Municipio_idMunicipio`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Municipio` (`idMunicipio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`Sede` (
  `idSede` INT(11) NOT NULL,
  `Ubicacion_idUbicacion` INT(11) NOT NULL,
  `nombreLocalidad` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idSede`),
  INDEX `fk_Sede_Ubicacion1_idx` (`Ubicacion_idUbicacion` ASC) ,
  CONSTRAINT `fk_Sede_Ubicacion1`
    FOREIGN KEY (`Ubicacion_idUbicacion`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Ubicacion` (`idUbicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`Municipio` (
  `idMunicipio` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Departamento_idDepartamento` INT(11) NOT NULL,
  PRIMARY KEY (`idMunicipio`),
  INDEX `fk_Municipio_Departamento1_idx` (`Departamento_idDepartamento` ASC) ,
  CONSTRAINT `fk_Municipio_Departamento1`
    FOREIGN KEY (`Departamento_idDepartamento`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Departamento` (`idDepartamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`Departamento` (
  `idDepartamento` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idDepartamento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`Rol` (
  `idRol` INT(11) NOT NULL,
  `nombreRol` VARCHAR(45) NULL DEFAULT NULL,
  `descripcionRol` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`TicketCatastro` (
  `idTicketCatastro` INT(11) NOT NULL,
  `Bitacora_idBitacora` INT(11) NOT NULL,
  `Bitacora_Sede_idSede` INT(11) NOT NULL,
  `disponibilidad` TINYINT(4) NULL DEFAULT NULL,
  `preferencia` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`idTicketCatastro`),
  INDEX `fk_TicketCatastro_Bitacora1_idx` (`Bitacora_idBitacora` ASC, `Bitacora_Sede_idSede` ASC) ,
  CONSTRAINT `fk_TicketCatastro_Bitacora1`
    FOREIGN KEY (`Bitacora_idBitacora` , `Bitacora_Sede_idSede`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Bitacora` (`idBitacora` , `Sede_idSede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `bitacora_servicio_cliente_ip`.`Usuario` 
ADD CONSTRAINT `fk_Usuario_TipoUsuario1`
  FOREIGN KEY (`TipoUsuario_idTipoUsuario`)
  REFERENCES `bitacora_servicio_cliente_ip`.`TipoUsuario` (`idTipoUsuario`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Usuario_Rol1`
  FOREIGN KEY (`Rol_idRol`)
  REFERENCES `bitacora_servicio_cliente_ip`.`Rol` (`idRol`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bitacora_servicio_cliente_ip`.`Bitacora` 
ADD CONSTRAINT `fk_Bitacora_Sede1`
  FOREIGN KEY (`Sede_idSede`)
  REFERENCES `bitacora_servicio_cliente_ip`.`Sede` (`idSede`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
