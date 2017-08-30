-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Auteur : AlgoStep Company
-- Généré le :  Mar 29 Août 2017 à 16:10
-- PHP 5.1 et 7 - MySQL classique (chiffrage MD5)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données
--

-- --------------------------------------------------------

--
-- Structure de la table `userswebos`
--

CREATE TABLE IF NOT EXISTS `userswebos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `fullname` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `code` varchar(75) COLLATE latin1_general_ci DEFAULT NULL,
  `extra1` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `extra2` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `extra3` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `extra4` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `extra5` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=169 ;

--
-- Contenu de la table `userswebos` - Mot de passe par defaut des comptes root et user "password" (en minuscule, sans les guillemets)
--

INSERT INTO `userswebos` (`id`, `username`, `fullname`, `password`, `email`, `active`, `code`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`) VALUES
(1, 'user', 'user', '5f4dcc3b5aa765d61d8327deb882cf99', 'votre-email@mail.fr', 1, 'NA', NULL, NULL, NULL, NULL, NULL),
(2, 'root', 'root', '5f4dcc3b5aa765d61d8327deb882cf99', 'votre-email@mail.fr', 1, 'NA', NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
