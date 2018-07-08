-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 08 juil. 2018 à 14:08
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
(1, 'nico', 'nico', 'leymarien@gmail.com');

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
(75, 42, 'Mama', 'Je n\'aime pas trop...', '2018-02-11 22:41:27', 0),
(73, 43, 'Lola', 'Oula ! A quand la suite ?!', '2018-02-11 22:40:51', 0),
(71, 43, 'Lulu', 'Quelle aventure !', '2018-02-11 22:40:05', 0),
(72, 43, 'Milo', 'Ca alors, que voilà un bon écrivain.', '2018-02-11 22:40:31', 0),
(74, 42, 'Marine', 'C\'est très chouette !', '2018-02-11 22:41:08', 0),
(76, 41, 'FalK', 'Ouais, y a de l\'idée !', '2018-02-11 22:41:44', 0);

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
(12, 'A travers le désert...', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Etiam facilisis maximus feugiat. Suspendisse at blandit odio. Duis quis ipsum in tellus ornare sodales. Sed varius ante quis hendrerit eleifend. Etiam consequat odio at est fringilla ultrices. Praesent dignissim metus enim, et consectetur mauris fringilla sit amet. Quisque sed orci diam. Praesent tristique facilisis efficitur. Maecenas ac est eget diam scelerisque tincidunt. Aenean tempor interdum leo nec imperdiet.</span></p>', '2018-01-27 13:53:53'),
(11, 'Un voyage extraordinaire', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Ut a luctus dolor. Vestibulum fringilla eu libero sit amet posuere. Nullam dignissim convallis leo, quis molestie risus condimentum sit amet. Vestibulum placerat sit amet leo eu venenatis. Proin eget nulla consectetur, vulputate lectus in, maximus metus. Fusce mattis elit sit amet leo laoreet tincidunt. Etiam facilisis sapien vel elit vestibulum elementum. Curabitur eget semper turpis. Sed ultrices massa vitae lobortis blandit. Maecenas justo est, convallis at leo vitae, vehicula congue ligula. Maecenas id lacinia massa, eu porta nibh. Maecenas semper mi vitae sodales pharetra. Integer posuere, metus a cursus dapibus, augue est varius dui, a blandit arcu dui ut nisi. Ut venenatis aliquam enim.</span></p>', '2018-01-27 13:52:48'),
(13, 'Une piste ?', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Sed porta ligula non lobortis pretium. Duis a arcu in neque ullamcorper sollicitudin et eu metus. Pellentesque ut ipsum quam. Vestibulum leo est, tincidunt quis blandit id, euismod eget orci. Vestibulum nec urna id turpis tincidunt pulvinar. Ut nulla tortor, mollis condimentum mauris vel, fermentum egestas turpis. Nulla in nulla ac nulla lacinia porttitor. Duis venenatis et sem a semper. Vivamus ac diam feugiat, vulputate turpis vitae, mattis orci. Etiam quis nisi consectetur, suscipit nunc vel, sollicitudin lorem. Proin porttitor nec urna non eleifend. Ut accumsan dui semper enim tristique pharetra. Curabitur at fringilla elit. Etiam dapibus gravida sem non vulputate. In placerat volutpat vehicula. Donec blandit metus vitae tincidunt viverra.</span></p>', '2018-01-27 13:54:14'),
(40, 'Le but indéfini', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Morbi dolor lacus, tincidunt at sodales vestibulum, auctor nec nisl. Curabitur lobortis imperdiet tempor. Sed lacinia ipsum sed metus convallis, nec viverra est blandit. Nullam bibendum egestas est, sit amet tincidunt odio. Nulla feugiat enim a lacus porttitor, ut lobortis odio blandit. Etiam interdum lacus et blandit varius. Proin mollis at eros ut vulputate. Nam quis suscipit eros, sit amet finibus odio. Proin eu mauris imperdiet, convallis dui et, dictum nisl. Morbi sollicitudin purus eget velit posuere euismod. Nulla sodales lacinia auctor. Mauris convallis semper urna, in scelerisque augue imperdiet et. Donec nec semper est.</span></p>', '2018-02-11 22:36:11'),
(41, 'Quand vint la chute', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Vestibulum malesuada enim et finibus venenatis. Morbi dignissim maximus arcu, eu malesuada nulla maximus in. Nam tincidunt vehicula pretium. Phasellus tristique sit amet urna nec scelerisque. Pellentesque euismod nec lorem at eleifend. Vestibulum tempor vulputate orci, sed euismod est mollis quis. Suspendisse et libero sit amet nisi facilisis interdum et vitae ligula. Integer ac neque commodo, rutrum ipsum non, malesuada urna. Nunc blandit, mi id tincidunt pharetra, lacus leo molestie quam, in sollicitudin magna odio et sem. Sed vestibulum, sapien non sagittis finibus, felis ipsum posuere ipsum, eu feugiat enim justo volutpat dolor. In auctor id enim ut semper. Sed in massa vel odio elementum euismod eleifend id risus. Donec aliquam condimentum auctor. Vivamus imperdiet tortor massa, sit amet luctus nisl vehicula sed.</span></p>', '2018-02-11 22:36:41'),
(42, 'La porte de glace', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Nulla facilisi. In sem lorem, tempus sed scelerisque vitae, mollis eget ex. Sed feugiat semper est eget imperdiet. Quisque sapien eros, elementum et gravida a, fringilla et enim. Ut nec mattis ipsum, vel lacinia ligula. Aliquam a luctus ipsum, non ultricies nisl. Pellentesque sollicitudin vel elit sed convallis. Nam nec erat mattis, interdum ex a, viverra risus. Nulla posuere congue faucibus. Nam a tempus leo. Mauris porttitor sagittis lacinia. Sed vel bibendum urna. Donec non consectetur erat. Mauris feugiat ipsum vitae mollis congue. Donec nec mauris ac ligula blandit sollicitudin at et mauris.</span></p>', '2018-02-11 22:37:13'),
(43, 'Derrière la colline', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">In vehicula ultrices ligula a pellentesque. Nunc commodo mauris id risus venenatis, eget aliquam nunc vehicula. Duis eros eros, porta sit amet luctus at, pulvinar facilisis dui. Donec a mollis risus. Donec volutpat iaculis vulputate. Fusce sapien ipsum, cursus et nunc quis, accumsan viverra nunc. Nullam condimentum nec enim at elementum. Pellentesque placerat tristique felis sit amet euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec dignissim non sapien id cursus. Fusce luctus metus sem, sit amet tempor est pulvinar at. Maecenas ut blandit purus.</span></p>', '2018-02-11 22:37:58');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
