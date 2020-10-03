
CREATE database IF NOT EXISTS `socially` ;
USE `socially` ;

-- -----------------------------------------------------
-- Table `socially`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socially`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(25) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `rol` ENUM('Admin', 'Edit') NOT NULL,
  `profImg` VARCHAR(100) NOT NULL DEFAULT 'anonymus.png',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `NICKNAME` (`username` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `socially`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socially`.`posts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(25) NOT NULL,
  `texto` LONGTEXT NOT NULL,
  `imagen` VARCHAR(50) NOT NULL,
  `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarios_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `usuarios_id`),
  INDEX `fk_posts_usuarios_idx` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_posts_usuarios`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `socially`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `socially`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socially`.`comentarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `texto` TEXT NOT NULL,
  `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarios_id` INT(11) NOT NULL,
  `posts_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `usuarios_id`, `posts_id`),
  INDEX `fk_comentarios_usuarios1_idx` (`usuarios_id` ASC) ,
  INDEX `fk_comentarios_posts1_idx` (`posts_id` ASC) ,
  CONSTRAINT `fk_comentarios_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `socially`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarios_posts1`
    FOREIGN KEY (`posts_id`)
    REFERENCES `socially`.`posts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 30
DEFAULT CHARACTER SET = latin1;

