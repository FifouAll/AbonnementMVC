-- --------------------------------------------------------
-- Hôte:                         172.19.0.19
-- Version du serveur:           5.5.5-10.1.26-MariaDB-0+deb9u1 - Debian 9.1
-- Serveur OS:                   debian-linux-gnu
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la base pour abonnements
CREATE DATABASE IF NOT EXISTS `abonnements` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `abonnements`;


-- Export de la structure de table abonnements. abonnement
CREATE TABLE IF NOT EXISTS `abonnement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_depart` varchar(50) NOT NULL,
  `prix_mensuel` decimal(5,2) NOT NULL,
  `date_fin` varchar(50) DEFAULT NULL,
  `date_cloture` varchar(50) DEFAULT NULL,
  `date_fin_promotion` varchar(50) DEFAULT NULL,
  `prix_mensuel_promotion` decimal(5,2) DEFAULT NULL,
  `cloturer` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `abonnemnt_user_FK` (`id_user`),
  KEY `abonnement_type_FK` (`id_type`),
  CONSTRAINT `abonnement_type_FK` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`),
  CONSTRAINT `abonnemnt_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

-- Export de données de la table abonnements.abonnement: ~31 rows (environ)
/*!40000 ALTER TABLE `abonnement` DISABLE KEYS */;
INSERT INTO `abonnement` (`id`, `date_depart`, `prix_mensuel`, `date_fin`, `date_cloture`, `date_fin_promotion`, `prix_mensuel_promotion`, `cloturer`, `id_user`, `id_type`) VALUES
	(3, '12/10/2017', 5.00, NULL, '2019-01-18', NULL, NULL, 1, 1, 'Internet'),
	(6, '2018-10-05', 5.20, NULL, NULL, '', NULL, 1, 1, 'Internet'),
	(7, '2018-10-18', 5.23, '2018-12-18', NULL, '', NULL, 0, 1, 'Internet'),
	(8, '2018-10-18', 5.23, NULL, '2018-12-17', '', NULL, 1, 1, 'Internet'),
	(9, '2018-10-18', 5.50, NULL, '2019-01-18', '', NULL, 1, 1, 'Internet'),
	(10, '2018-10-09', 5.30, '', NULL, '', NULL, 1, 1, 'Internet'),
	(11, '2018-10-09', 5.30, '', NULL, '', NULL, 1, 1, 'Internet'),
	(12, '2018-10-09', 50.50, NULL, '', '', NULL, 1, 2, 'Sport'),
	(13, '2018-10-09', 50.25, '', NULL, '', NULL, 0, 2, 'TV'),
	(14, '2018-10-09', 12.20, '', NULL, '', NULL, 0, 2, 'Mobile'),
	(15, '2018-10-17', 500.25, NULL, '', '', NULL, 1, 1, 'Sport'),
	(36, '2018-12-17', 3.55, NULL, '2018-11-17', '2018-01-17', 1.75, 1, 2, 'Mobile'),
	(37, '2018-10-17', 2.00, NULL, NULL, NULL, NULL, 1, 1, 'Mobile'),
	(38, '2018-10-17', 2.00, NULL, NULL, NULL, NULL, 0, 1, 'Mobile'),
	(39, '2018-10-17', 200.00, NULL, NULL, NULL, NULL, 0, 1, 'Mobile'),
	(43, '2018-12-17', 100.00, '2021-03-17', NULL, '', 0.00, 0, 2, 'Internet'),
	(44, '2018-10-02', 25.00, '', NULL, '', 0.00, 0, 1, 'Internet'),
	(45, '2018-10-17', 25.00, '', NULL, '', 0.00, 0, 1, 'Internet'),
	(47, '2018-10-11', 52.00, '', NULL, NULL, NULL, 0, 1, 'Internet'),
	(48, '2018-10-17', 24.00, '', NULL, NULL, NULL, 0, 1, 'Mobile'),
	(49, '2018-10-17', 24.00, NULL, '', '2018-10-16', 21.00, 1, 1, 'Internet'),
	(50, '2018-10-18', 24.00, '2018-10-16', NULL, NULL, NULL, 0, 1, 'Internet'),
	(51, '2018-10-18', 24.00, '2018-10-16', NULL, NULL, NULL, 0, 1, 'Internet'),
	(52, '2018-12-31', 24.00, '2018-12-30', NULL, '', 0.00, 0, 1, 'Internet'),
	(53, '2018-10-31', 0.00, '2018-10-30', NULL, '', 0.00, 0, 1, 'Internet'),
	(54, '2018-10-10', 0.00, '2018-10-19', NULL, NULL, NULL, 0, 1, 'Internet'),
	(55, '2018-10-10', 0.00, '2018-10-02', NULL, NULL, NULL, 0, 1, 'Internet'),
	(56, '1998-04-20', 49.99, NULL, '', NULL, NULL, 1, 1, 'Sport'),
	(57, '2018-11-18', 1.56, '2022-10-18', NULL, '2020-10-18', 1.15, 0, 9, 'Sport'),
	(58, '2018-01-01', 50.00, NULL, '', NULL, NULL, 1, 10, 'Internet'),
	(59, '2018-05-01', 10.00, '', NULL, NULL, NULL, 0, 10, 'Internet');
/*!40000 ALTER TABLE `abonnement` ENABLE KEYS */;


-- Export de la structure de table abonnements. type
CREATE TABLE IF NOT EXISTS `type` (
  `id` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Export de données de la table abonnements.type: ~4 rows (environ)
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` (`id`, `nom`) VALUES
	('Internet', 'Internet'),
	('Mobile', 'Mobile'),
	('Sport', 'Sport'),
	('TV', 'TV');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;


-- Export de la structure de table abonnements. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(150) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Export de données de la table abonnements.user: ~6 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `login`, `mdp`) VALUES
	(1, 'test', 'test'),
	(2, 'Toto', 'toto'),
	(3, 'Alpha', 'Beta'),
	(8, '123', '4'),
	(9, 'fichtre', 'dsl'),
	(10, 'titi', 'titi');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
