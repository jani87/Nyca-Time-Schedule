-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema nycatime
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema nycatime
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `nycatime` DEFAULT CHARACTER SET utf8 ;
USE `nycatime` ;

-- -----------------------------------------------------
-- Table `nycatime`.`persons`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nycatime`.`persons` (
  `person_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'AI=100',
  `first_name` VARCHAR(45) NULL DEFAULT NULL,
  `last_name` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `phone` INT(10) NULL DEFAULT NULL,
  `username` VARCHAR(45) NULL DEFAULT NULL,
  `passwd` VARCHAR(45) NULL DEFAULT NULL,
  `created_by` INT(11) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_by` INT(11) NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `phone_UNIQUE` (`phone` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nycatime`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nycatime`.`roles` (
  `role_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'AI=10',
  `role_name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nycatime`.`acl`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nycatime`.`acl` (
  `person_id` INT(11) NULL DEFAULT NULL,
  `role_id` INT(11) NULL DEFAULT NULL,
  INDEX `fk_p_id_idx` (`person_id` ASC),
  INDEX `fk_r_id_idx` (`role_id` ASC),
  CONSTRAINT `fk_p_id`
    FOREIGN KEY (`person_id`)
    REFERENCES `nycatime`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_r_id`
    FOREIGN KEY (`role_id`)
    REFERENCES `nycatime`.`roles` (`role_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nycatime`.`instructor_time`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nycatime`.`instructor_time` (
  `ins_time_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ai-1000',
  `inst_id` INT(11) NULL DEFAULT NULL,
  `student_id` INT(11) NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  `hours` TIME NULL DEFAULT NULL,
  `status` VARCHAR(45) NOT NULL,
  `created_by` INT(11) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_by` INT(11) NULL DEFAULT NULL,
  `updated_at` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ins_time_id`),
  INDEX `fk_inst_id_idx` (`inst_id` ASC),
  INDEX `fk_student_id_idx` (`student_id` ASC),
  CONSTRAINT `fk_inst_time_id`
    FOREIGN KEY (`inst_id`)
    REFERENCES `nycatime`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_time_id`
    FOREIGN KEY (`student_id`)
    REFERENCES `nycatime`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nycatime`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nycatime`.`status` (
  `status_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'AI=0',
  `status_name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nycatime`.`inst_time_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nycatime`.`inst_time_status` (
  `inst_time_id` INT(11) NULL DEFAULT NULL,
  `status_id` INT(11) NULL DEFAULT NULL,
  INDEX `fk_inst_t_id_idx` (`inst_time_id` ASC),
  INDEX `fk_status_id_idx` (`status_id` ASC),
  CONSTRAINT `fk_inst_t_id`
    FOREIGN KEY (`inst_time_id`)
    REFERENCES `nycatime`.`instructor_time` (`ins_time_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_id`
    FOREIGN KEY (`status_id`)
    REFERENCES `nycatime`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nycatime`.`instructor_enrollment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nycatime`.`instructor_enrollment` (
  `inst_id` INT(11) NOT NULL,
  `student_id` INT(11) NULL DEFAULT NULL,
  `start_date` DATE NULL DEFAULT NULL,
  `created_by` INT(11) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_by` INT(11) NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`inst_id`),
  INDEX `fk_student_id_idx` (`student_id` ASC),
  CONSTRAINT `fk_inst_id`
    FOREIGN KEY (`inst_id`)
    REFERENCES `nycatime`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_id`
    FOREIGN KEY (`student_id`)
    REFERENCES `nycatime`.`persons` (`person_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
