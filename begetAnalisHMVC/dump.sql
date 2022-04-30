-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1,	'login',	'password');

DROP TABLE IF EXISTS `analis_param`;
CREATE TABLE `analis_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_analis_type` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `value` varchar(24) NOT NULL,
  `standart` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `analis_param` (`id`, `id_analis_type`, `name`, `value`, `standart`) VALUES
(1,	1,	'D count',	'N/nm',	'40-50'),
(2,	2,	'aa',	'W/km',	'3.14'),
(3,	2,	'name',	'value',	'standart');

DROP TABLE IF EXISTS `analis_type`;
CREATE TABLE `analis_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(52) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `analis_type` (`id`, `name`) VALUES
(1,	'D vitamin'),
(2,	'some else test');

DROP TABLE IF EXISTS `change_user`;
CREATE TABLE `change_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `change_user` (`id`, `user_id`) VALUES
(16,	1),
(17,	1),
(18,	1);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_analis_param` int(11) NOT NULL,
  `value` double NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `result` (`id`, `id_user`, `id_analis_param`, `value`, `date`) VALUES
(16,	1,	1,	3,	'0000-00-00 00:00:00'),
(17,	1,	1,	7,	'0000-00-00 00:00:00'),
(18,	1,	2,	1,	'0000-00-00 00:00:00'),
(19,	1,	3,	2,	'0000-00-00 00:00:00'),
(20,	1,	1,	40,	'0000-00-00 00:00:00'),
(21,	1,	1,	905,	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `name`, `login`, `password`) VALUES
(1,	'user',	'lll',	'newPass'),
(2,	'Name2',	'lll2',	'qwe');

-- 2021-06-12 06:32:04
