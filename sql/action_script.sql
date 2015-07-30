-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 30 Juillet 2015 à 07:07
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `action_script`
--
CREATE DATABASE IF NOT EXISTS `action_script` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `action_script`;

-- --------------------------------------------------------

--
-- Structure de la table `culte`
--

CREATE TABLE IF NOT EXISTS `culte` (
  `id_culte` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_culte`),
  KEY `fk_culte_utilisateur1_idx` (`id_utilisateur`),
  KEY `description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `enregistrement`
--

CREATE TABLE IF NOT EXISTS `enregistrement` (
  `id_enregistrement` int(11) NOT NULL AUTO_INCREMENT,
  `auteur_action` varchar(45) NOT NULL,
  `nom_action` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `retro_action` varchar(5) NOT NULL,
  `heure_action` varchar(20) NOT NULL,
  `id_culte` int(11) NOT NULL,
  PRIMARY KEY (`id_enregistrement`),
  KEY `fk_enregistrement_culte_idx` (`id_culte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
  `id_password` int(11) NOT NULL AUTO_INCREMENT,
  `pass` varchar(12) NOT NULL,
  PRIMARY KEY (`id_password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `password`
--

INSERT INTO `password` (`id_password`, `pass`) VALUES
(1, 'action2015');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `date_connect` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `culte`
--
ALTER TABLE `culte`
  ADD CONSTRAINT `fk_culte_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enregistrement`
--
ALTER TABLE `enregistrement`
  ADD CONSTRAINT `fk_enregistrement_culte` FOREIGN KEY (`id_culte`) REFERENCES `culte` (`id_culte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
