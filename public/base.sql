-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema SistemaGestionVentas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SistemaGestionVentas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SistemaGestionVentas` DEFAULT CHARACTER SET utf8 ;
USE `SistemaGestionVentas` ;

-- -----------------------------------------------------
-- Table `SistemaGestionVentas`.`Proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SistemaGestionVentas`.`Proveedores` (
  `proveedores_id` INT NOT NULL AUTO_INCREMENT,
  `nombre_empresa` VARCHAR(45) NOT NULL,
  `direccion` TEXT NULL,
  `telefono` VARCHAR(17) NOT NULL,
  PRIMARY KEY (`proveedores_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SistemaGestionVentas`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SistemaGestionVentas`.`Productos` (
  `productos_ id` INT NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NULL,
  `descripcion` TEXT NOT NULL,
  `precio` INT NOT NULL COMMENT 'Campo para almacenar si el producto graba IVA o no\n1 = Graba IVA\n0 = No posee IVA',
  `stock` VARCHAR(45) NULL,
  PRIMARY KEY (`productos_ id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SistemaGestionVentas`.`IVA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SistemaGestionVentas`.`IVA` (
  `IVA_id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(45) NOT NULL COMMENT '8%\n12%\n15%',
  `estado` INT NOT NULL COMMENT '1 = activo\n0 = inactivo',
  `Valor` INT NULL COMMENT 'Campo para almacenar el valor en entero para realizar calculos',
  PRIMARY KEY (`IVA_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SistemaGestionVentas`.`Kardex`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SistemaGestionVentas`.`Kardex` (
  `kardex_id` INT NOT NULL AUTO_INCREMENT,
  `estado` INT NOT NULL COMMENT 'Campo para almacenar el estado del kardex\n1 = activo\n0 = inactivo',
  `fecha_transaccion` DATETIME NOT NULL,
  `cantidad` VARCHAR(45) NOT NULL,
  `valor_compra` DECIMAL NOT NULL,
  `valor_venta` DECIMAL NOT NULL,
  `valor_ganacia` DECIMAL NULL,
  `IVA` INT NOT NULL,
  `proveedores_proveedores_id` INT NOT NULL,
  `productos_productos_id` INT NOT NULL,
  `tipo_transaccion` INT NOT NULL COMMENT '1= entrada Ej: Compra\n0 = salida  Ej: Venta',
  `IVA_IVA_id` INT NOT NULL,
  PRIMARY KEY (`kardex_id`),
  INDEX `fk_Kardex_Proveedores1_idx` (`proveedores_proveedores_id` ASC) ,
  INDEX `fk_Kardex_Productos1_idx` (`productos_productos_id` ASC) ,
  INDEX `fk_Kardex_IVA1_idx` (`IVA_IVA_id` ASC) ,
  CONSTRAINT `fk_Kardex_Proveedores1`
    FOREIGN KEY (`proveedores_proveedores_id`)
    REFERENCES `SistemaGestionVentas`.`Proveedores` (`proveedores_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kardex_Productos1`
    FOREIGN KEY (`productos_productos_id`)
    REFERENCES `SistemaGestionVentas`.`Productos` (`productos_ id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kardex_IVA1`
    FOREIGN KEY (`IVA_IVA_id`)
    REFERENCES `SistemaGestionVentas`.`IVA` (`IVA_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SistemaGestionVentas`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SistemaGestionVentas`.`Clientes` (
  `cliente_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cliente_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SistemaGestionVentas`.`Factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SistemaGestionVentas`.`Factura` (
  `factura_id` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL,
  `sub_total` DECIMAL NOT NULL,
  `sub_total_iva` DECIMAL NOT NULL,
  `valor_IVA` DECIMAL NOT NULL,
  `Clientes_cliente_id` INT NOT NULL,
  PRIMARY KEY (`factura_id`),
  INDEX `fk_Factura_Clientes1_idx` (`Clientes_cliente_id` ASC) ,
  CONSTRAINT `fk_Factura_Clientes1`
    FOREIGN KEY (`Clientes_cliente_id`)
    REFERENCES `SistemaGestionVentas`.`Clientes` (`cliente_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SistemaGestionVentas`.`Detalle_Factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SistemaGestionVentas`.`Detalle_Factura` (
  `detalle_factura_id` INT NOT NULL AUTO_INCREMENT,
  `cantidad` VARCHAR(45) NOT NULL,
  `factura_factura_id` INT NOT NULL,
  `kardex_kardex_id` INT NOT NULL,
  `precio_unitario` DECIMAL NOT NULL,
  `sub_total_item` DECIMAL NOT NULL,
  PRIMARY KEY (`detalle_factura_id`),
  INDEX `fk_Detalle_Factura_Factura1_idx` (`factura_factura_id` ASC) ,
  INDEX `fk_Detalle_Factura_Kardex1_idx` (`kardex_kardex_id` ASC) ,
  CONSTRAINT `fk_Detalle_Factura_Factura1`
    FOREIGN KEY (`factura_factura_id`)
    REFERENCES `SistemaGestionVentas`.`Factura` (`factura_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Detalle_Factura_Kardex1`
    FOREIGN KEY (`kardex_kardex_id`)
    REFERENCES `SistemaGestionVentas`.`Kardex` (`kardex_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SistemaGestionVentas`.`Ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SistemaGestionVentas`.`Ventas` (
  `venta_id` INT NOT NULL AUTO_INCREMENT,
  `fecha_venta` DATETIME NOT NULL,
  `total_venta` DECIMAL(10,2) NOT NULL,
  `Clientes_cliente_id` INT NOT NULL,
  `Factura_factura_id` INT NOT NULL,
  PRIMARY KEY (`venta_id`),
  INDEX `fk_Ventas_Clientes1_idx` (`Clientes_cliente_id` ASC) ,
  INDEX `fk_Ventas_Factura1_idx` (`Factura_factura_id` ASC) ,
  CONSTRAINT `fk_Ventas_Clientes1`
    FOREIGN KEY (`Clientes_cliente_id`)
    REFERENCES `SistemaGestionVentas`.`Clientes` (`cliente_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ventas_Factura1`
    FOREIGN KEY (`Factura_factura_id`)
    REFERENCES `SistemaGestionVentas`.`Factura` (`factura_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
