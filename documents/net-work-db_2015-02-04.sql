# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38)
# Database: net-work-db
# Generation Time: 2015-02-04 12:05:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table equipement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `equipement`;

CREATE TABLE `equipement` (
  `EQUIPEMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE` varchar(64) NOT NULL,
  `NOM` varchar(32) NOT NULL,
  `FABRIQUANT` varchar(32) NOT NULL,
  `ADRESSE_PHYSIQUE` varchar(32) NOT NULL,
  `ADRESSE_IP` varchar(32) NOT NULL,
  `PROPRIETAIRE` varchar(32) NOT NULL,
  `LOCALISATION` varchar(32) NOT NULL,
  `NUMERO_SUPPORT` int(24) NOT NULL,
  `ETAT_TECHNIQUE` varchar(32) NOT NULL,
  `ETAT_FONCTIONNEL` varchar(32) NOT NULL,
  `COMMENT` varchar(128) NOT NULL,
  `PARENT` int(11) DEFAULT NULL,
  PRIMARY KEY (`EQUIPEMENT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

LOCK TABLES `equipement` WRITE;
/*!40000 ALTER TABLE `equipement` DISABLE KEYS */;

INSERT INTO `equipement` (`EQUIPEMENT_ID`, `TYPE`, `NOM`, `FABRIQUANT`, `ADRESSE_PHYSIQUE`, `ADRESSE_IP`, `PROPRIETAIRE`, `LOCALISATION`, `NUMERO_SUPPORT`, `ETAT_TECHNIQUE`, `ETAT_FONCTIONNEL`, `COMMENT`, `PARENT`)
VALUES
	(1,'routeur5','nomRouteur','Apple','chaispas','168d.0.0.1','Kevin','Aix',566611,'bon','chais pas','oulala',5),
	(2,'routeur5','nomRouteur','Apple','chaispas','168d.0.0.1','Kevin','Aix',566611,'bon','chais pas','oulala',5),
	(47,'routeur','nomRouteur','Apple','chaispas','168d.0.0.1','Kevin','Aix',566611,'bon','chais pas','oulala',5),
	(48,'routeur','nomRouteur','Apple','chaispas','168d.0.0.1','Kevin','Aix',566611,'bon','chais pas','oulala',5),
	(49,'routeur','nomRouteur','Apple','chaispas','168d.0.0.1','Kevin','Aix',566611,'bon','chais pas','oulala',5),
	(51,'routeur','nomRouteur','Apple','chaispas','168d.0.0.1','Kevin','Aix',566611,'bon','chais pas','oulala',5),
	(52,'routeur','nomRouteur','Apple','chaispas','168d.0.0.1','Kevin','Aix',566611,'bon','chais pas','oulala',5),
	(54,'routeur','nomRouteur','Apple','chaispas','168d.0.0.1','Kevin','Aix',566611,'bon','chais pas','oulala',5);

/*!40000 ALTER TABLE `equipement` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table fabriquant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fabriquant`;

CREATE TABLE `fabriquant` (
  `NOM_FABRIQUANT` varchar(32) NOT NULL,
  `NATIONALITE` varchar(32) NOT NULL,
  PRIMARY KEY (`NOM_FABRIQUANT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `fabriquant` WRITE;
/*!40000 ALTER TABLE `fabriquant` DISABLE KEYS */;

INSERT INTO `fabriquant` (`NOM_FABRIQUANT`, `NATIONALITE`)
VALUES
	('APPLE','ETATS-UNIS'),
	('ASUS','ETATS-UNIS'),
	('CANON','ETATS-UNIS'),
	('CISCO','ETATS-UNIS'),
	('HEWLETT-PACKARD','ETATS-UNIS'),
	('MICROSOFT','ETATS-UNIS'),
	('SAMSUNG','CORÉE');

/*!40000 ALTER TABLE `fabriquant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table localisation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `localisation`;

CREATE TABLE `localisation` (
  `NOM_SITE` varchar(32) NOT NULL,
  `PAYS` varchar(32) NOT NULL,
  PRIMARY KEY (`NOM_SITE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `localisation` WRITE;
/*!40000 ALTER TABLE `localisation` DISABLE KEYS */;

INSERT INTO `localisation` (`NOM_SITE`, `PAYS`)
VALUES
	('MARSEILLE','FRANCE'),
	('MILAN','ITALIE');

/*!40000 ALTER TABLE `localisation` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pays
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pays`;

CREATE TABLE `pays` (
  `NOM_PAYS` varchar(32) NOT NULL,
  `SHORT_NOM_PAYS` varchar(2) NOT NULL,
  PRIMARY KEY (`NOM_PAYS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;

INSERT INTO `pays` (`NOM_PAYS`, `SHORT_NOM_PAYS`)
VALUES
	('CAMBODGE','KH'),
	('CORÉE','KR'),
	('ETATS-UNIS','EU'),
	('FRANCE','FR'),
	('ITALIE','IT'),
	('JAPON','JP');

/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table statut_fonctionnel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statut_fonctionnel`;

CREATE TABLE `statut_fonctionnel` (
  `LIBELLE_STATUT` varchar(32) NOT NULL,
  PRIMARY KEY (`LIBELLE_STATUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `statut_fonctionnel` WRITE;
/*!40000 ALTER TABLE `statut_fonctionnel` DISABLE KEYS */;

INSERT INTO `statut_fonctionnel` (`LIBELLE_STATUT`)
VALUES
	('En arrêt de maintenance'),
	('En marche'),
	('En veille'),
	('Éteint');

/*!40000 ALTER TABLE `statut_fonctionnel` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table statut_technique
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statut_technique`;

CREATE TABLE `statut_technique` (
  `LIBELLE_STATUT` varchar(32) NOT NULL,
  PRIMARY KEY (`LIBELLE_STATUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `statut_technique` WRITE;
/*!40000 ALTER TABLE `statut_technique` DISABLE KEYS */;

INSERT INTO `statut_technique` (`LIBELLE_STATUT`)
VALUES
	('En panne majeure'),
	('En panne mineure'),
	('Fonctionnel'),
	('Inconnu');

/*!40000 ALTER TABLE `statut_technique` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `LIBELLE_TYPE` varchar(64) NOT NULL,
  PRIMARY KEY (`LIBELLE_TYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;

INSERT INTO `type` (`LIBELLE_TYPE`)
VALUES
	('Imprimante'),
	('Ordinateur fixe'),
	('Ordinateur portable'),
	('Photocopieuse'),
	('Routeur'),
	('Serveur'),
	('Téléphone');

/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
