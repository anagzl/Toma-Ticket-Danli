-- MySQL Workbench Synchronization
-- Generated: 2022-08-11 16:40
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Administrador

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `bitacora_servicio_cliente_ip`.`Tramite` 
ADD COLUMN `siglasTramite` VARCHAR(3) NULL DEFAULT NULL AFTER `estado`;

ALTER TABLE `bitacora_servicio_cliente_ip`.`TicketCatastro` 
ADD COLUMN `reasignado` TINYINT(1) NULL DEFAULT NULL AFTER `llamando`;

ALTER TABLE `bitacora_servicio_cliente_ip`.`TicketPredial` 
ADD COLUMN `reasignado` TINYINT(1) NULL DEFAULT NULL AFTER `llamando`;

ALTER TABLE `bitacora_servicio_cliente_ip`.`TicketPropiedadIntelectual` 
ADD COLUMN `reasignado` TINYINT(1) NULL DEFAULT NULL AFTER `llamando`;

ALTER TABLE `bitacora_servicio_cliente_ip`.`TicketRegistroInmueble` 
ADD COLUMN `reasignado` TINYINT(1) NULL DEFAULT NULL AFTER `llamando`;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`TicketTramiteMultipleRegistroInmueble` (
  `idTicketTramiteMultipleRegistroInmueble` INT(11) NOT NULL,
  `TicketRegistroInmueble_idTicketRegistroInmueble` INT(11) NOT NULL,
  `cantidadDeExpedientesHaTramitar` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idTicketTramiteMultipleRegistroInmueble`),
  INDEX `fk_TicketTramiteMultipleRegistroInmueble_TicketRegistroInmu_idx` (`TicketRegistroInmueble_idTicketRegistroInmueble` ASC) ,
  CONSTRAINT `fk_TicketTramiteMultipleRegistroInmueble_TicketRegistroInmueb1`
    FOREIGN KEY (`TicketRegistroInmueble_idTicketRegistroInmueble`)
    REFERENCES `bitacora_servicio_cliente_ip`.`TicketRegistroInmueble` (`idTicketRegistroInmueble`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`BusquedaArchivoExpedienteRegistroInmueble` (
  `idBusquedaArchivo` INT(11) NOT NULL,
  `TicketRegistroInmueble_idTicketRegistroInmueble` INT(11) NOT NULL,
  `numeroExpediente` VARCHAR(45) NULL DEFAULT NULL,
  `urlQRSINAP` VARCHAR(45) NULL DEFAULT NULL,
  `BusquedaArchivoExpedienteRegistroInmueblecol` VARCHAR(45) NULL DEFAULT NULL,
  `Estado_idEstado` INT(11) NOT NULL,
  PRIMARY KEY (`idBusquedaArchivo`),
  INDEX `fk_BusquedaArchivoExpedienteRegistroInmueble_TicketRegistro_idx` (`TicketRegistroInmueble_idTicketRegistroInmueble` ASC) ,
  INDEX `fk_BusquedaArchivoExpedienteRegistroInmueble_Estado1_idx` (`Estado_idEstado` ASC) ,
  CONSTRAINT `fk_BusquedaArchivoExpedienteRegistroInmueble_TicketRegistroIn1`
    FOREIGN KEY (`TicketRegistroInmueble_idTicketRegistroInmueble`)
    REFERENCES `bitacora_servicio_cliente_ip`.`TicketRegistroInmueble` (`idTicketRegistroInmueble`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BusquedaArchivoExpedienteRegistroInmueble_Estado1`
    FOREIGN KEY (`Estado_idEstado`)
    REFERENCES `bitacora_servicio_cliente_ip`.`Estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`Estado` (
  `idEstado` INT(11) NOT NULL,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  `sigla` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `bitacora_servicio_cliente_ip`.`MediaVideoWeb` (
  `idMediaVideoWeb` INT(11) NOT NULL,
  `direccionURL` VARCHAR(45) NULL DEFAULT NULL,
  `descripcionDelVideo` VARCHAR(1000) NULL DEFAULT NULL,
  `activo` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`idMediaVideoWeb`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `bitacora_servicio_cliente_ip`.`Ventanilla` 
ADD CONSTRAINT `fk_Ventanilla_Direccion1`
  FOREIGN KEY (`Direccion_idDireccion`)
  REFERENCES `bitacora_servicio_cliente_ip`.`Direccion` (`idDireccion`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bitacora_servicio_cliente_ip`.`TramitesHabilitadoVentanilla` 
ADD CONSTRAINT `fk_TramitesHabilitadoVentanilla_Ventanilla1`
  FOREIGN KEY (`Ventanilla_idVentanilla`)
  REFERENCES `bitacora_servicio_cliente_ip`.`Ventanilla` (`idVentanilla`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bitacora_servicio_cliente_ip`.`TipoJornadaLaboral` 
ADD CONSTRAINT `fk_TipoJornadaLaboral_DiasLaborales1`
  FOREIGN KEY (`DiasLaborales_idDiasLaborales`)
  REFERENCES `bitacora_servicio_cliente_ip`.`DiasLaborales` (`idDiasLaborales`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
