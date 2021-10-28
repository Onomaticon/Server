DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `key` varchar(25) NOT NULL,
  `value` longtext DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `cv`;
CREATE TABLE `cv` (
  `shortname` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shortname`),
  UNIQUE KEY `shortname_UNIQUE` (`shortname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `terms`;
CREATE TABLE `terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(45) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `language` varchar(5) DEFAULT NULL,
  `opaque` tinyint(4) DEFAULT NULL,
  `cv` varchar(30) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `invalid_reason` varchar(45) DEFAULT NULL,
  `broader` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `shortname_UNIQUE` (`shortname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO config VALUES('version_db', 1);
INSERT INTO config VALUES('version', 1);
INSERT INTO config VALUES('mode', 'production');
INSERT INTO config VALUES('default_lang', 'en');
INSERT INTO config VALUES('description', 'Description goes here.');
INSERT INTO config VALUES('site_name', 'Site name.');
INSERT INTO config VALUES('author', 'Firstname Surname');

