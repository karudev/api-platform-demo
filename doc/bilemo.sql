-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bilemo
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bilemo` ;

-- -----------------------------------------------------
-- Schema bilemo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bilemo` DEFAULT CHARACTER SET latin1 ;
USE `bilemo` ;

-- -----------------------------------------------------
-- Table `bilemo`.`brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bilemo`.`brand` ;

CREATE TABLE IF NOT EXISTS `bilemo`.`brand` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `UNIQ_1C52F9585E237E06` (`name` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `bilemo`.`phone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bilemo`.`phone` ;

CREATE TABLE IF NOT EXISTS `bilemo`.`phone` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `brand_id` INT(11) NULL DEFAULT NULL,
  `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `operating_system` VARCHAR(16) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `state` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `color` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `storage_capacity` INT(11) NOT NULL,
  `price` INT(11) NOT NULL,
  `vat` DOUBLE NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `IDX_444F97DD44F5D008` (`brand_id` ASC),
  CONSTRAINT `FK_444F97DD44F5D008`
    FOREIGN KEY (`brand_id`)
    REFERENCES `bilemo`.`brand` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 20001
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `bilemo`.`api_customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bilemo`.`api_customer` ;

CREATE TABLE IF NOT EXISTS `bilemo`.`api_customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(255) NULL,
  `lastname` VARCHAR(64) NULL,
  `firstname` VARCHAR(64) NULL,
  `api_key` VARCHAR(255) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `api_key_UNIQUE` (`api_key` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bilemo`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bilemo`.`user` ;

CREATE TABLE IF NOT EXISTS `bilemo`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `api_customer_id` INT NOT NULL,
  `lastname` VARCHAR(64) NOT NULL,
  `firstname` VARCHAR(64) NOT NULL,
  `mobile_phone` VARCHAR(16) NULL,
  `email` VARCHAR(128) NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `username` VARCHAR(128) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_api_customer1_idx` (`api_customer_id` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  CONSTRAINT `fk_user_api_customer1`
    FOREIGN KEY (`api_customer_id`)
    REFERENCES `bilemo`.`api_customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
