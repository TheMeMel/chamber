
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";





--Base de données: `dbhotel`


-- Structure de la table `attente`


CREATE TABLE IF NOT EXISTS `attente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` int(11) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `numclient` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;


-- Contenu de la table `attente`


INSERT INTO `attente` (`id`, `prix`, `datedebut`, `datefin`, `numclient`) VALUES
(17, 12000, '2020-05-28', '2020-05-30', '66909123'),
(18, 12000, '2020-05-21', '2020-05-27', '99121378');




-- Structure de la table `chambre`


CREATE TABLE IF NOT EXISTS `chambre` (
  `numporte` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `numclient` varchar(20) DEFAULT NULL,
  `occupee` varchar(10) NOT NULL,
  PRIMARY KEY (`numporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Contenu de la table `chambre`

INSERT INTO `chambre` (`numporte`, `prix`, `datedebut`, `datefin`, `numclient`, `occupee`) VALUES
(1, 15000, '0000-00-00', '0000-00-00', 'NULL', 'non'),
(2, 12000, '2020-05-27', '2020-05-31', '66454545', 'non'),
(4, 15000, '2020-05-18', '2020-05-22', '62889900', 'oui'),
(5, 21000, '0000-00-00', '0000-00-00', 'NULL', 'non'),
(6, 12000, '2020-05-21', '2020-05-28', '66090945', 'non'),
(7, 12000, '2020-05-17', '2020-05-26', '90778890', 'non'),
(8, 21000, '2020-05-26', '2020-05-29', '90778866', 'non');


