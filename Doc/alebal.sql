-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Février 2017 à 10:27
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alebal`
--

-- --------------------------------------------------------

--
-- Structure de la table `competitor`
--

CREATE TABLE `competitor` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competitor`
--

INSERT INTO `competitor` (`id`, `name`, `date`) VALUES
(2, 'Thibault', '2017-02-17 10:35:32'),
(3, 'Roberte', '2017-02-17 10:35:32'),
(4, 'Mika', '2017-02-17 10:35:44'),
(5, 'Christophe', '2017-02-17 10:35:44'),
(6, 'Christiano', '2017-02-17 10:35:57'),
(7, 'Tan', '2017-02-17 10:35:57');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL,
  `id_Competitor1` int(10) NOT NULL,
  `id_Competitor2` int(10) NOT NULL,
  `score_Competitor1` int(10) NOT NULL DEFAULT '0',
  `score_Competitor2` int(10) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL 
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `id_Competitor1`, `id_Competitor2`, `score_Competitor1`, `score_Competitor2`, `date`) VALUES
(1, 2, 3, 11, 0, '2017-02-17 10:34:59'),
(2, 4, 5, 12, 14, '2017-02-17 10:34:59'),
(3, 6, 7, 11, 9, '2017-02-17 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `header`
--

CREATE TABLE `header` (
  `id` tinyint(5) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `metaDescription` text NOT NULL,
  `metaKeywords` text NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `lang` (
  `id` tinyint(5) NOT NULL,
  `code` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `rewrittingurl` (
  `id` tinyint(5) NOT NULL,
  `idRouteUrl` tinyint(5) NOT NULL,
  `urlMatched` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'fr'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rewrittingurl`
--

INSERT INTO `rewrittingurl` (`id`, `idRouteUrl`, `urlMatched`, `lang`) VALUES
(1, 1, '/accueil.html', 'fr'),
(2, 1, '/en/home.html', 'en'),
(3, 2, '/404.html', 'fr'),
(4, 2, '/en/404.html', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `routeurl`
--

CREATE TABLE `routeurl` (
  `id` tinyint(5) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `controller` varchar(100) NOT NULL DEFAULT '',
  `action` varchar(100) NOT NULL DEFAULT '',
  `order` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `routeurl`
--

INSERT INTO `routeurl` (`id`, `name`, `controller`, `action`, `order`) VALUES
(1, 'home', 'home', 'index', 0),
(2, 'error404', 'home', 'error404', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competitor`
--
ALTER TABLE `competitor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rewrittingurl`
--
ALTER TABLE `rewrittingurl`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `routeurl`
--
ALTER TABLE `routeurl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competitor`
--
ALTER TABLE `competitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `header`
--
ALTER TABLE `header`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `rewrittingurl`
--
ALTER TABLE `rewrittingurl`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `routeurl`
--
ALTER TABLE `routeurl`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
