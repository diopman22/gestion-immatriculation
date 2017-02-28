-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 14 Août 2015 à 11:29
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gondwana3`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `password`, `type`, `nom`, `prenom`) VALUES
(1, 'mans', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'admin', 'DIOP', 'Mansour'),
(2, 'diop', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'agent', 'SAMB', 'Mohamed'),
(4, 'dieng', '482f7629a2511d23ef4e958b13a5ba54bdba06f2', 'agent', 'DIENG', 'Ibrahima');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `num_tel_gondwana` varchar(255) NOT NULL,
  `adresse_gondwana` varchar(255) NOT NULL,
  `num_tel_senegal` varchar(255) NOT NULL,
  `adresse_senegal` varchar(255) NOT NULL,
  `adresse_pro` varchar(255) NOT NULL,
  `adresse_domicile` varchar(255) NOT NULL,
  `id_etat_civil` int(11) NOT NULL,
  PRIMARY KEY (`id_contact`),
  UNIQUE KEY `num_tel_gondwana` (`num_tel_gondwana`),
  UNIQUE KEY `num_tel_senegal` (`num_tel_senegal`),
  KEY `id_etat_civil` (`id_etat_civil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id_contact`, `email`, `num_tel_gondwana`, `adresse_gondwana`, `num_tel_senegal`, `adresse_senegal`, `adresse_pro`, `adresse_domicile`, `id_etat_civil`) VALUES
(1, 'manbaro@hotmail.fr', '0033172041807', 'Paris', '446461323131', 'Dakar', 'Paris', 'BORDEAUX', 1),
(2, 'minatou@hotmail.fr', '0033172031807', 'Londres', '778974568', 'Mbour', 'LILLE', 'Londres', 2),
(3, 'thierno@gmail.com', '0033172031808', 'Paris', '768974125', 'Mbour', 'Manchester', 'BORDEAUX', 3),
(4, 'jony@hotmail.fr', '0033172041811', 'Londres', '778945621', 'Louga', 'Manchester', 'Londres', 5),
(5, 'ndiaye@gmail.com', '0033172041801', 'Londres', '778450125', 'Louga', 'Paris', 'Paris', 6);

-- --------------------------------------------------------

--
-- Structure de la table `etat_civil`
--

CREATE TABLE IF NOT EXISTS `etat_civil` (
  `id_etat_civil` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `sexe` char(1) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `situation_matrimonial` varchar(255) NOT NULL,
  `cni_ou_passeport` varchar(255) NOT NULL,
  `date_delivrance` date NOT NULL,
  `date_fin_validite` date NOT NULL,
  `discipline` varchar(255) DEFAULT NULL,
  `date_entree_gondwana` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `teint` varchar(255) NOT NULL,
  `taille` int(11) NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etat_civil`),
  UNIQUE KEY `cni_ou_passeport` (`cni_ou_passeport`),
  UNIQUE KEY `photo` (`photo`),
  UNIQUE KEY `immatriculation` (`immatriculation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `etat_civil`
--

INSERT INTO `etat_civil` (`id_etat_civil`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `sexe`, `profession`, `situation_matrimonial`, `cni_ou_passeport`, `date_delivrance`, `date_fin_validite`, `discipline`, `date_entree_gondwana`, `photo`, `teint`, `taille`, `immatriculation`) VALUES
(1, 'DIOP', 'Mansour Baro', '1992-12-31', 'Dagana', 'M', 'Etudiant', 'Célibataire', '1770199204875', '2015-12-31', '2018-12-31', 'Informatique', '2007-12-31', 'photo/IMG_0781.JPG', 'Noir', 181, '2015-00001'),
(2, 'NDIAYE', 'Aminata', '1997-12-30', 'Dagana', 'F', 'Etudiante', 'Célibataire', '1654654654654', '2015-01-31', '2020-01-01', 'Gestion', '2012-12-30', 'photo/IMG_0032.JPG', 'Noir', 176, '2015-00002'),
(3, 'NIANG', 'Thierno', '1976-12-31', 'THIES', 'M', 'Professeur', 'Marié(e)', '1882000144423', '2015-01-02', '2019-01-02', 'Télécoms', '2011-01-01', 'photo/IMG_0306.JPG', 'Noir', 180, '2015-00003'),
(5, 'DIENG', 'Jonathan Gabriel', '1960-12-31', 'THIES', 'M', 'Professeur', 'Marié(e)', '1770199204876', '2015-01-01', '2020-01-01', 'Gestion', '2008-01-01', 'photo/IMG_7814.JPG', 'Noir', 165, '2015-00004'),
(6, 'NDIAYE', 'Mary', '1976-12-31', 'Dagana', 'F', 'Informaticienne', 'Célibataire', '1770199204877', '2015-12-31', '2019-12-31', 'Télécoms', '2009-12-31', 'photo/IMG_0498.JPG', 'Noir', 178, '2015-00005'),
(7, 'DIAGNE', 'Mayoro', '1988-02-01', 'Dakar', 'M', 'Professeur', 'Marié(e)', '1770199204598nnn', '2014-01-01', '2016-01-01', 'Informatique', '2012-01-31', 'photo/beach-sunset-wallpapers-801x501.jpg', 'Noir', 169, '2015-00006');

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `id_parents` int(11) NOT NULL AUTO_INCREMENT,
  `prenom_pere` varchar(255) NOT NULL,
  `prenom_mere` varchar(255) NOT NULL,
  `nom_mere` varchar(255) NOT NULL,
  `prenom_conjoint` varchar(255) DEFAULT NULL,
  `nom_conjoint` varchar(255) DEFAULT NULL,
  `id_etat_civil` int(11) NOT NULL,
  PRIMARY KEY (`id_parents`),
  KEY `id_etat_civil` (`id_etat_civil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `parents`
--

INSERT INTO `parents` (`id_parents`, `prenom_pere`, `prenom_mere`, `nom_mere`, `prenom_conjoint`, `nom_conjoint`, `id_etat_civil`) VALUES
(1, 'Modou', 'Anta', 'DIOP', 'Mamadou', 'DIENG', 1),
(2, 'Demba', 'Mbène', 'DIAGNE', 'Abdou', 'DIALLO', 2),
(3, 'Modou', 'Dieynaba', 'SOW', 'Ibrahima', 'SOW', 3),
(4, 'Modou', 'Mariama', 'DIOP', 'Mamadou', 'DIENG', 5),
(5, 'Modou', 'fatou', 'dieng', 'modou', 'NDIAYE', 6),
(6, 'Modou', 'Mariama', 'DIOP', 'modou', 'DIENG', 7);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE IF NOT EXISTS `piece` (
  `id_piece` int(11) NOT NULL AUTO_INCREMENT,
  `id_etat_civil` int(11) NOT NULL,
  `scan_cni` varchar(255) NOT NULL,
  PRIMARY KEY (`id_piece`),
  UNIQUE KEY `scan_cni` (`scan_cni`),
  KEY `id_etat_civil` (`id_etat_civil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `id_etat_civil`, `scan_cni`) VALUES
(1, 1, 'pieces/Projet DIC 1 2015 _ facile.pdf'),
(2, 2, 'pieces/carte_consulaire_avec_certificat_immatriculation_Gondwana.pdf'),
(3, 3, 'pieces/verso_carte_consulaire.pdf'),
(4, 5, 'pieces/art-zebra-design-801x501.jpg'),
(5, 6, 'pieces/beach-sunset-wallpapers-801x501.jpg'),
(6, 7, 'pieces/create_thumb.png');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`),
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_ibfk_3` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`) ON DELETE CASCADE;

--
-- Contraintes pour la table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`),
  ADD CONSTRAINT `parents_ibfk_2` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`) ON DELETE CASCADE,
  ADD CONSTRAINT `parents_ibfk_3` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`) ON DELETE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`),
  ADD CONSTRAINT `piece_ibfk_2` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`) ON DELETE CASCADE,
  ADD CONSTRAINT `piece_ibfk_3` FOREIGN KEY (`id_etat_civil`) REFERENCES `etat_civil` (`id_etat_civil`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
