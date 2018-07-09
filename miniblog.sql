-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 09 juil. 2018 à 14:24
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `miniblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `password`, `email`) VALUES
(1, 'Forteroche', 'adminjeanforteroche', 'admin@forteroche.com');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `signalised` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `author`, `comment`, `comment_date`, `signalised`) VALUES
(78, 43, 'meuhfunk', 'enfin ça marche!', '2018-07-09 11:05:28', 0),
(79, 43, 'nicolas leymarie', 'oh my gog! Ca marche!!!', '2018-07-09 11:06:14', 0),
(80, 79, 'nicolas leymarie', 'Que c\'est beau en plus ca marche!', '2018-07-09 12:26:02', 1),
(81, 78, 'Nicolas Leymarie', 'Un peu de poesie dans ce monde de brute! Bordel!', '2018-07-09 12:44:54', 0),
(77, 43, 'croc', 'super', '2018-07-08 16:57:36', 0),
(82, 81, 'Nicolas Leymarie', 'De la pure poesie. Bordel!', '2018-07-09 14:15:14', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(79, 'Le cri de la faim', '<blockquote>\r\n<div style=\"left: 93.3333px; top: 247.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.798077); text-align: center;\">La journ&eacute;e d&eacute;buta sous de meilleurs auspices. Les deux hommes n\'avaient</div>\r\n</blockquote>\r\n<div style=\"left: 93.3333px; top: 279.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.864191); text-align: center;\">pas perdu de chien durant la nuit, et c\'est l\'esprit plus l&eacute;ger qu\'ils se</div>\r\n<div style=\"left: 93.3333px; top: 311.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.815995); text-align: center;\">remirent en chemin dans le silence, le noir et le froid. Bill semblait avoir</div>\r\n<div style=\"left: 93.3333px; top: 343.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.772578); text-align: center;\">oubli&eacute; ses sinistres pressentiments et quand, &agrave; midi, les chiens renvers&egrave;rent</div>\r\n<div style=\"left: 93.3333px; top: 375.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.863194); text-align: center;\">le tra&icirc;neau &agrave; un mauvais passage, c\'est en plaisantant qu\'il accueillit</div>\r\n<div style=\"left: 93.3333px; top: 407.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.769524); text-align: center;\">l\'accident.</div>\r\n<div style=\"left: 93.3333px; top: 471.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.801347); text-align: center;\">C\'&eacute;tait pourtant un effrayant p&ecirc;le-m&ecirc;le. Le tra&icirc;neau, sens dessus dessous,</div>\r\n<div style=\"left: 93.3333px; top: 503.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.848482); text-align: center;\">demeurait entre le tronc d\'un arbre et un &eacute;norme roc. Il fallut d\'abord</div>\r\n<div style=\"left: 93.3333px; top: 535.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.793483); text-align: center;\">d&eacute;harnacher les chiens afin de les d&eacute;gager et de d&eacute;m&ecirc;ler leurs traits. Ceci</div>\r\n<div style=\"left: 93.3333px; top: 567.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.843997); text-align: center;\">fait et tandis que les deux hommes s\'occupaient &agrave; remettre sur pied le</div>\r\n<div style=\"left: 93.3333px; top: 599.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.774074); text-align: center;\">tra&icirc;neau, Henry aper&ccedil;ut N\'a-qu\'une-Oreille qui &eacute;tait en train de se d&eacute;filer en rampant</div>\r\n<p>&nbsp;</p>', '2018-07-06 22:36:41'),
(78, 'La louve', '<div style=\"left: 93.3333px; top: 247.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.769661); text-align: center;\">Le d&eacute;jeuner termin&eacute; et le rudimentaire mat&eacute;riel du campement recharg&eacute; sur</div>\r\n<div style=\"left: 93.3333px; top: 279.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.78859); text-align: center;\">le tra&icirc;neau, les deux hommes tourn&egrave;rent le dos au feu joyeux et pouss&egrave;rent</div>\r\n<div style=\"left: 93.3333px; top: 311.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.810376); text-align: center;\">de l\'avant dans les t&eacute;n&egrave;bres qui n\'&eacute;taient point encore dissip&eacute;es. Les cris</div>\r\n<div style=\"left: 93.3333px; top: 343.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.775633); text-align: center;\">d\'appel, fun&egrave;bres et f&eacute;roces, continuaient &agrave; retentir et &agrave; se r&eacute;pondre dans la</div>\r\n<div style=\"left: 93.3333px; top: 375.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.851966); text-align: center;\">nuit et le froid. Ils se turent quand le jour, &agrave; neuf heures, commen&ccedil;a &agrave;</div>\r\n<div style=\"left: 93.3333px; top: 407.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.834037); text-align: center;\">para&icirc;tre. &Agrave; midi, le ciel, vers le sud, parut se r&eacute;chauffer et se teignit de</div>\r\n<div style=\"left: 93.3333px; top: 439.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.780883); text-align: center;\">couleur rose. Puis se dessina la ligne de d&eacute;marcation que met la rondeur de</div>\r\n<div style=\"left: 93.3333px; top: 471.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.826315); text-align: center;\">la terre entre le monde du nord et les pays m&eacute;ridionaux o&ugrave; luit le soleil.</div>\r\n<div style=\"left: 93.3333px; top: 503.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.792461); text-align: center;\">Mais la couleur rose se fana rapidement. Un jour gris lui succ&eacute;da, qui dura</div>\r\n<div style=\"left: 93.3333px; top: 535.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.859456); text-align: center;\">jusqu\'&agrave; trois heures pour dispara&icirc;tre &agrave; son tour, et le p&acirc;le cr&eacute;puscule</div>\r\n<div style=\"left: 93.3333px; top: 567.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.7742); text-align: center;\">arctique redescendit sur la terre solitaire et silencieuse. Lorsque l\'obscurit&eacute;</div>\r\n<div style=\"left: 93.3333px; top: 599.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.88633); text-align: center;\">fut revenue, les cris de chasse recommenc&egrave;rent &agrave; droite, &agrave; gauche,</div>\r\n<div style=\"left: 93.3333px; top: 631.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.774005); text-align: center;\">provoquant de folles paniques parmi les chiens, tout harass&eacute;s qu\'ils &eacute;taient.</div>', '2018-07-02 22:37:13'),
(81, 'La piste de la viande', '<div style=\"text-align: center;\">\r\n<div style=\"left: 93.3333px; top: 247.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.839304);\">De chaque c&ocirc;t&eacute; du fleuve glac&eacute;, l\'immense for&ecirc;t de sapins s\'allongeait,</div>\r\n<div style=\"left: 93.3333px; top: 279.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.806373);\">sombre et mena&ccedil;ante. Les arbres, d&eacute;barrass&eacute;s par un vent r&eacute;cent de leur</div>\r\n<div style=\"left: 93.3333px; top: 311.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.788663);\">blanc manteau de givre, semblaient s\'accouder les uns sur les autres, noirs</div>\r\n<div style=\"left: 93.3333px; top: 343.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.820428);\">et fatidiques dans le jour qui p&acirc;lissait. La terre n\'&eacute;tait qu\'une d&eacute;solation</div>\r\n<div style=\"left: 93.3333px; top: 375.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.793263);\">infinie et sans vie o&ugrave; rien ne bougeait, et elle &eacute;tait si froide, si abandonn&eacute;e</div>\r\n<div style=\"left: 93.3333px; top: 407.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.830639);\">que la pens&eacute;e s\'enfuyait, devant elle, au-del&agrave; m&ecirc;me de la tristesse. Une</div>\r\n<div style=\"left: 93.3333px; top: 439.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.812788);\">envie de rire s\'emparait de l\'esprit, rire tragique comme celui du Sphinx,</div>\r\n<div style=\"left: 93.3333px; top: 471.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.778569);\">rire transi et sans joie, comme le sarcasme de l\'&Eacute;ternit&eacute; devant la futilit&eacute; de</div>\r\n<div style=\"left: 93.3333px; top: 503.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.877229);\">l\'existence et les vains efforts de notre &ecirc;tre. C\'&eacute;tait le Wild. Le Wild</div>\r\n<div style=\"left: 93.3333px; top: 535.2px; font-size: 26.6667px; font-family: serif; transform: scaleX(0.778459);\">farouche, glac&eacute; jusqu\'au c&oelig;ur, de la terre du Nord.</div>\r\n</div>', '2018-07-09 14:13:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
