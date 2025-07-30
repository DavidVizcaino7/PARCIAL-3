# SQL Manager 2007 for MySQL 4.1.2.1
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : new_db


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `new_db`;

CREATE DATABASE `new_db`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `new_db`;

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
  ('Alex','$2y$10$NDOI.w50rPyb6hwaGkELyu1HNy/A.KfLsJIDwz5DelERJN8t9R4te',15),
  ('Juan','$2y$10$kkSzLLKZcv5zXv2tJZeCHeiFfEHglQOXuJBNnoTtlK5ddDrfRs8G6',26),
  ('fernando','$2y$10$4uzzi26IQKD/yRrsnq9D0.Gv8BHFL54Q5vrmhBOg/ef9nvjwCRnme',27);

COMMIT;

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
    SELECT id_login, user, password
    FROM usuarios;
END;

#
# Definition for the `SP_INSERT_USUARIO` procedure : 
#

DROP PROCEDURE IF EXISTS `SP_INSERT_USUARIO`;

CREATE DEFINER = 'root'@'localhost' PROCEDURE `SP_INSERT_USUARIO`(IN users VARCHAR(30), IN passwords VARCHAR(255))
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
    INSERT INTO usuarios (user, password)
    VALUES (users, passwords);
END;

#
# Definition for the `SP_DELETE_USUARIO` procedure : 
#

DROP PROCEDURE IF EXISTS `SP_DELETE_USUARIO`;

CREATE DEFINER = 'root'@'localhost' PROCEDURE `SP_DELETE_USUARIO`(IN id INTEGER)
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN
   DELETE FROM usuarios WHERE id_login =id; 
   
   COMMIT;
END;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;