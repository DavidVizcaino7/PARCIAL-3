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
  `password` varchar(30) default NULL,
  `id_login` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_login`),
  UNIQUE KEY `id_login` (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for the `usuarios` table  (LIMIT 0,500)
#

INSERT INTO `usuarios` (`user`, `password`, `id_login`) VALUES 
  ('david','1234',1),
  ('alex','4321',2);

COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;