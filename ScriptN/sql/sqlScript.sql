-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema script_action
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema script_action
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `script_action` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `script_action` ;

-- -----------------------------------------------------
-- Table `script_action`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `script_action`.`utilisateur` (
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(25) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `date_connect` DATETIME NULL,
  PRIMARY KEY (`id_utilisateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `script_action`.`culte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `script_action`.`culte` (
  `id_culte` INT NOT NULL,
  `titre` VARCHAR(45) NULL,
  `date` DATE NOT NULL,
  `id_utilisateur` INT NOT NULL,
  PRIMARY KEY (`id_culte`),
  INDEX `fk_culte_utilisateur1_idx` (`id_utilisateur` ASC),
  CONSTRAINT `fk_culte_utilisateur1`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `script_action`.`utilisateur` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `script_action`.`enregistrement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `script_action`.`enregistrement` (
  `id_enregistrement` INT NOT NULL,
  `auteur_action` VARCHAR(45) NOT NULL,
  `nom_action` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NULL,
  `retro_action` VARCHAR(5) NOT NULL,
  `heure_action` VARCHAR(20) NOT NULL,
  `id_culte` INT NOT NULL,
  PRIMARY KEY (`id_enregistrement`),
  INDEX `fk_enregistrement_culte_idx` (`id_culte` ASC),
  CONSTRAINT `fk_enregistrement_culte`
    FOREIGN KEY (`id_culte`)
    REFERENCES `script_action`.`culte` (`id_culte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `script_action`.`password`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `script_action`.`password` (
  `id_password` INT NOT NULL,
  `pass` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`id_password`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
