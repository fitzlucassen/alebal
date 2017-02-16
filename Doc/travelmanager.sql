-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 14 Mai 2016 à 15:47
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `travelmanager`
--

-- --------------------------------------------------------

--
-- Structure de la table `checkpoint`
--

DROP TABLE IF EXISTS `checkpoint`;
CREATE TABLE IF NOT EXISTS `checkpoint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `checkdate` date NOT NULL,
  `kilometers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `checkpoint`
--

INSERT INTO `checkpoint` (`id`, `city`, `resume`, `latitude`, `longitude`, `checkdate`, `kilometers`) VALUES
(1, 'Byron Bay, Nouvelle Galles du Sud, Australie', 'zefpuj zef piujzef', '-28.6441616', '153.6123788', '2015-10-08', 200),
(3, 'Melbourne, Victoria, Australie', 'zef zpojzef pojzef', '-37.814107', '144.96327999999994', '2015-10-22', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `checkpointphoto`
--

DROP TABLE IF EXISTS `checkpointphoto`;
CREATE TABLE IF NOT EXISTS `checkpointphoto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCheckpoint` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `imageDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `checkpointphoto`
--

INSERT INTO `checkpointphoto` (`id`, `idCheckpoint`, `title`, `caption`, `url`, `imageDate`) VALUES
(1, 3, 'sefzef', 'fghty', 'upload/55f309729dfbb.jpg', '2015-10-22'),
(2, 3, 'ukyuj', '', 'upload/55f30973175bb.jpg', '2015-10-22'),
(3, 3, 'erttrh', '', 'upload/55f30a34730f9.jpg', '2015-10-22');

-- --------------------------------------------------------

--
-- Structure de la table `header`
--

DROP TABLE IF EXISTS `header`;
CREATE TABLE IF NOT EXISTS `header` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `metaDescription` text NOT NULL,
  `metaKeywords` text NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `header`
--

INSERT INTO `header` (`id`, `title`, `metaDescription`, `metaKeywords`, `lang`) VALUES
(1, '', '', '', 'fr'),
(2, '', '', '', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

DROP TABLE IF EXISTS `lang`;
CREATE TABLE IF NOT EXISTS `lang` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL DEFAULT 'fr',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `code`) VALUES
(1, 'fr'),
(2, 'en');

-- --------------------------------------------------------

--
-- Structure de la table `rewrittingurl`
--

DROP TABLE IF EXISTS `rewrittingurl`;
CREATE TABLE IF NOT EXISTS `rewrittingurl` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `idRouteUrl` tinyint(5) NOT NULL,
  `urlMatched` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'fr',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rewrittingurl`
--

INSERT INTO `rewrittingurl` (`id`, `idRouteUrl`, `urlMatched`, `lang`) VALUES
(1, 1, '/accueil.html', 'fr'),
(2, 1, '/en/home.html', 'en'),
(3, 2, '/404.html', 'fr'),
(4, 2, '/en/404.html', 'en'),
(7, 5, '/australie/decouvrir.html', 'fr'),
(8, 6, '/australie/notre-carte.html', 'fr'),
(9, 5, '/en/australia/discover.html', 'en'),
(10, 6, '/en/australia/our-map.html', 'en'),
(21, 7, '/barcelone/decouvrir.html', 'fr'),
(22, 7, '/en/barcelona/discover.html', 'en'),
(23, 8, '/islande/decouvrir.html', 'fr'),
(24, 8, '/en/iceland/discover.html', 'en'),
(25, 9, '/new-york/decouvrir.html', 'fr'),
(26, 9, '/en/new-york/discover.html', 'en'),
(27, 10, '/londres/decouvrir.html', 'fr'),
(28, 10, '/en/london/discover.html', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `routeurl`
--

DROP TABLE IF EXISTS `routeurl`;
CREATE TABLE IF NOT EXISTS `routeurl` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `controller` varchar(100) NOT NULL DEFAULT '',
  `action` varchar(100) NOT NULL DEFAULT '',
  `order` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `routeurl`
--

INSERT INTO `routeurl` (`id`, `name`, `controller`, `action`, `order`) VALUES
(1, 'home', 'home', 'index', 0),
(2, 'error404', 'home', 'error404', 0),
(5, 'Australie', 'australia', 'index', 0),
(6, 'australiamap', 'australia', 'map', 0),
(7, 'Barcelone', 'barcelona', 'index', 0),
(8, 'Islande', 'islande', 'index', 0),
(9, 'New-York', 'newyork', 'index', 0),
(10, 'Londres', 'london', 'index', 0);

-- --------------------------------------------------------

--
-- Structure de la table `travel`
--

DROP TABLE IF EXISTS `travel`;
CREATE TABLE IF NOT EXISTS `travel` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `baseWidth` int(5) NOT NULL,
  `baseHeight` int(5) NOT NULL,
  `top` int(5) NOT NULL,
  `left` int(5) NOT NULL,
  `tooltipPosition` varchar(255) NOT NULL DEFAULT 'left',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `travel`
--

INSERT INTO `travel` (`id`, `name`, `title`, `logo`, `baseWidth`, `baseHeight`, `top`, `left`, `tooltipPosition`) VALUES
(1, 'Australie', 'Le guide de la côte est de l''Australie', 'Travel/Australie/australie.png', 1920, 955, 650, 1620, 'left'),
(2, 'Islande', 'Le guide du sud de l''Islande', 'Travel/Islande/islande.png', 1920, 955, 65, 780, 'left'),
(3, 'New-York', 'Le guide de New-York', 'Travel/New-York/newyork.png', 1920, 955, 235, 427, 'right'),
(4, 'Barcelone', 'Le guide de Barcelone', 'Travel/Barcelone/barcelona.png', 1920, 955, 222, 856, 'bottom'),
(5, 'Londres', 'Le guide de Londres', 'Travel/Londres/london.png', 1920, 955, 145, 855, 'left');

-- --------------------------------------------------------

--
-- Structure de la table `travelcarousel`
--

DROP TABLE IF EXISTS `travelcarousel`;
CREATE TABLE IF NOT EXISTS `travelcarousel` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idTravel` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_travelcarousel_travel` (`idTravel`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `travelcarousel`
--

INSERT INTO `travelcarousel` (`id`, `idTravel`, `title`, `caption`, `url`) VALUES
(1, 1, 'Les 12 apôtres', 'Great Ocean Road', 'Travel/Australia/Carousel/1.jpg'),
(2, 1, 'Whiskey Bay', 'Wilson Promontory National Park', 'Travel/Australia/Carousel/2.jpg'),
(3, 1, 'Wentworth Falls', 'Blue Mountains National Park', 'Travel/Australia/Carousel/3.jpg'),
(4, 1, 'Hill Inlet', 'Whitsunday Islands', 'Travel/Australia/Carousel/4.jpg'),
(5, 1, 'Josephine Falls', 'Cairns Region', 'Travel/Australia/Carousel/5.jpg'),
(6, 1, 'Osprey Reef', 'Grande barrière de corail', 'Travel/Australia/Carousel/6.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
