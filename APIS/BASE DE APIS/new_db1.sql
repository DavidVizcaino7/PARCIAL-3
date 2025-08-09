# SQL Manager 2007 for MySQL 4.1.2.1
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : new_db1


SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `new_db1`;

CREATE DATABASE `new_db1`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `new_db1`;

#
# Structure for the `usuarios` table : 
#

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `user` varchar(30) default '',
  `password` varchar(255) default NULL,
  `id_login` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_login`),
  UNIQUE KEY `id_login` (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for the `usuarios` table  (LIMIT 0,500)
#

INSERT INTO `usuarios` (`user`, `password`, `id_login`) VALUES 
  ('Diana','$2y$10$NbroLpEvAyekyz2ZAFoK.OKd/N4UhJBatZoKd.o/UKMMVkzwDrobe',15),
  ('Juan','$2y$10$kkSzLLKZcv5zXv2tJZeCHeiFfEHglQOXuJBNnoTtlK5ddDrfRs8G6',26),
  ('Daniela','$2y$10$qnNhwEkjKtha/3wwkaE7i.CdSY0XWYNlstfmt7IPNQVL3oKR7Nrd2',35),
  ('Paola','$2y$10$Pj5xkEwPqyG7ooaWVAJSy.U0K1mmGKAfEBS95sPVnpQbkjN2fgK86',36),
  ('DArwin','$2y$10$H5QdBbF7AIu2GNn6RWK3T.ERPEphlddAPiI3c/XOgSe6.eL1wiwyK',38);

COMMIT;

#
# Definition for the `SP_DELETE_USUARIO` procedure : 
#

DROP PROCEDURE IF EXISTS `SP_DELETE_USUARIO`;

CREATE DEFINER = 'root'@'localhost' PROCEDURE `SP_DELETE_USUARIO`(
    IN id INTEGER
)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
   DELETE FROM usuarios WHERE id_login = id; 
   COMMIT;
END;

#
# Definition for the `SP_INSERT_USUARIO` procedure : 
#

DROP PROCEDURE IF EXISTS `SP_INSERT_USUARIO`;

CREATE DEFINER = 'root'@'localhost' PROCEDURE `SP_INSERT_USUARIO`(
    IN users VARCHAR(30), 
    IN passwords VARCHAR(255)
)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
    INSERT INTO usuarios (`user`, `password`)
    VALUES (users, passwords);
END;

#
# Definition for the `SP_SELECT_USUARIO` procedure : 
#

DROP PROCEDURE IF EXISTS `SP_SELECT_USUARIO`;

CREATE DEFINER = 'root'@'localhost' PROCEDURE `SP_SELECT_USUARIO`()
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
    SELECT id_login, `user`, `password`
    FROM usuarios;
END;

#
# Definition for the `SP_UPDATE_USUARIO` procedure : 
#

DROP PROCEDURE IF EXISTS `SP_UPDATE_USUARIO`;

CREATE DEFINER = 'root'@'localhost' PROCEDURE `SP_UPDATE_USUARIO`(
    IN p_id INT,
    IN p_user VARCHAR(30),
    IN p_password VARCHAR(255)
)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
    UPDATE usuarios
    SET
        `user` = p_user,
        `password` = p_password
    WHERE id_login = p_id;

    COMMIT;
END;

