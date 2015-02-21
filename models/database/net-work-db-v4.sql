-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 15 Février 2015 à 15:08
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `net-work-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE IF NOT EXISTS `equipement` (
  `EQUIPEMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE` varchar(64) NOT NULL,
  `NOM` varchar(32) NOT NULL,
  `FABRIQUANT` varchar(32) NOT NULL,
  `ADRESSE_PHYSIQUE` varchar(32) NOT NULL,
  `ADRESSE_IP` varchar(32) NOT NULL,
  `PROPRIETAIRE` varchar(32) NOT NULL,
  `LOCALISATION` varchar(32) NOT NULL,
  `NUMERO_SUPPORT` int(24) NOT NULL,
  `ETAT_TECHNIQUE` varchar(32) NOT NULL DEFAULT 'Fonctionnel',
  `ETAT_FONCTIONNEL` varchar(32) NOT NULL DEFAULT 'En marche',
  `COMMENT` varchar(128) NOT NULL,
  `PARENT` int(11) DEFAULT NULL,
  PRIMARY KEY (`EQUIPEMENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `equipement`
--

INSERT INTO `equipement` (`EQUIPEMENT_ID`, `TYPE`, `NOM`, `FABRIQUANT`, `ADRESSE_PHYSIQUE`, `ADRESSE_IP`, `PROPRIETAIRE`, `LOCALISATION`, `NUMERO_SUPPORT`, `ETAT_TECHNIQUE`, `ETAT_FONCTIONNEL`, `COMMENT`, `PARENT`) VALUES
(55, 'Ordinateur fixe', 'PC-HP-05123Y', 'APPLE', 'MILAN', '154.56.88.111', 'MAXIME', 'MILAN', 612457899, 'Fonctionnel', 'En veille', 'TODO MaJ', NULL),
(56, 'Ordinateur fixe', 'PC-HP-05124X', 'ASUS', 'SEOUL', '154.77.88.111', 'KEVIN', 'SEOUL', 612457899, 'En panne mineure', 'En arret de maintenance', 'TODO repair', NULL),
(57, 'Ordinateur portable', 'NB-AS-GTERX22', 'ASUS', 'CHICAGO', '144.2.8.56', 'DAVID', 'CHICAGO', 688442211, 'En panne majeure', 'En marche', 'test', 0),
(58, 'Serveur', 'SV-CS-YHT88', 'CISCO', 'CHICAGO', '111.22.3.8', 'MAXIME', 'CHICAGO', 688147233, 'Fonctionnel', 'En marche', 'TODO repair', NULL),
(59, 'Imprimante', 'CO-CA-IKILX', 'CANON', 'CHICAGO', '55.1.2.44', 'MAXIME', 'CHICAGO', 688779966, 'Fonctionnel', 'Eteint', '', 58),
(60, 'Ordinateur fixe', 'PC-HP-05123H', 'HEWLETT-PACKARD', 'MARSEILLE', '114.88.55.99', 'DAVID', 'MARSEILLE', 874112589, 'Fonctionnel', 'En marche', '', NULL),
(61, 'Ordinateur fixe', 'PC-HP-05124H', 'HEWLETT-PACKARD', 'MARSEILLE', '111.44.21.33', 'DAVID', 'MARSEILLE', 877445561, 'En panne mineure', 'En arret de maintenance', '', NULL),
(62, 'Routeur', 'RO-CI-YT10', 'CISCO', 'CHICAGO', '112.25.14.87', 'KEVIN', 'CHICAGO', 744115522, 'En panne majeure', 'Eteint', 'Cable d''alim down', NULL),
(63, 'Routeur', 'RO-CI-YT10', 'CISCO', 'CHICAGO', '115.22.33.44', 'KEVIN', 'CHICAGO', 577884411, 'En panne mineure', 'En veille', '', NULL),
(64, 'Ordinateur portable', 'OP-AS-HYJLK99', 'ASUS', 'LOS ANGELES', '125.66.91.33', 'KEVIN', 'LOS ANGELES', 577884411, 'Fonctionnel', 'En marche', '', -1);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `NOTIF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOTIF_DATE` varchar(64) NOT NULL,
  `NOTIF_EQUIP_ID` int(11) NOT NULL,
  `NOTIF_TYPE_ID` int(11) NOT NULL,
  `NOTIF_READ` tinyint(1) NOT NULL,
  `EQUIP_NOM` varchar(32) NOT NULL,
  `TYPE_NOTIF_LIBELLE` varchar(32) NOT NULL,
  `NOTIF_NEGATIVE` tinyint(1) NOT NULL,
  PRIMARY KEY (`NOTIF_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`NOTIF_ID`, `NOTIF_DATE`, `NOTIF_EQUIP_ID`, `NOTIF_TYPE_ID`, `NOTIF_READ`, `EQUIP_NOM`, `TYPE_NOTIF_LIBELLE`, `NOTIF_NEGATIVE`) VALUES
(14, '1424008414', 57, 3, 0, 'NB-AS-GTERX22', 'UPDATE', 0),
(16, '1424009146', 64, 2, 0, 'OP-AS-HYJLK99', 'CREATE', 0);

-- --------------------------------------------------------

--
-- Structure de la table `statut_fonctionnel`
--

CREATE TABLE IF NOT EXISTS `statut_fonctionnel` (
  `LIBELLE_STATUT` varchar(32) NOT NULL DEFAULT 'En marche',
  PRIMARY KEY (`LIBELLE_STATUT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut_fonctionnel`
--

INSERT INTO `statut_fonctionnel` (`LIBELLE_STATUT`) VALUES
('En arret de maintenance'),
('En marche'),
('En veille'),
('Eteint');

-- --------------------------------------------------------

--
-- Structure de la table `statut_technique`
--

CREATE TABLE IF NOT EXISTS `statut_technique` (
  `LIBELLE_STATUT` varchar(32) NOT NULL DEFAULT 'Fonctionnel',
  PRIMARY KEY (`LIBELLE_STATUT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut_technique`
--

INSERT INTO `statut_technique` (`LIBELLE_STATUT`) VALUES
('En panne majeure'),
('En panne mineure'),
('Fonctionnel'),
('Inconnu');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `TYPE_LIBELLE` varchar(32) NOT NULL,
  `HTML_DISPLAY` varchar(128) NOT NULL,
  PRIMARY KEY (`TYPE_LIBELLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`TYPE_LIBELLE`, `HTML_DISPLAY`) VALUES
('Imprimante', '<i class="fa fa-print fa-fw"></i> Imprimantes'),
('Ordinateur fixe', '<i class="fa fa-desktop fa-fw"></i> Ordinateurs fixes'),
('Ordinateur portable', '<i class="fa fa-laptop fa-fw"></i> Ordinateurs portables'),
('Routeur', '<i class="fa fa-cloud fa-fw"></i> Routeurs'),
('Serveur', '<i class="fa fa-server fa-fw"></i> Serveurs'),
('Telephone', '<i class="fa fa-phone fa-fw"></i> Téléphones');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
