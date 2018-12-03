-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 oct. 2018 à 07:39
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `unbilletpourlalaska`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` tinytext,
  `author` varchar(11) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `signaled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_post` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `author`, `comment_date`, `post_id`, `signaled`) VALUES
(1, 'oui', 'david', '2018-08-20 21:55:34', 1, 0),
(2, 'oui', 'david', '2018-08-20 21:55:47', 1, 1),
(3, 'oui', 'david', '2018-08-22 22:21:17', 2, 0),
(4, 'tres bien ', 'david', '2018-08-22 22:58:58', 2, 0),
(5, 'tres bien ', 'jean', '2018-08-26 15:07:39', 2, 0),
(6, 'on est d accord ', 'jacques', '2018-08-26 15:07:54', 2, 0),
(7, 'a quand la suite ?', 'pierre', '2018-08-26 15:16:29', 2, 0),
(8, 'a quand la suite ?', 'pierre', '2018-08-26 15:16:46', 2, 0),
(11, 'oui', 'david', '2018-08-26 20:28:21', 2, 0),
(12, 'a quand la suite ', 'matthieu', '2018-08-26 20:28:39', 2, 0),
(16, 'c est bien ', 'luc', '2018-09-03 21:02:56', 2, 0),
(17, 'c est bien ', 'luc', '2018-09-03 21:04:43', 2, 0),
(18, 'non', 'luc', '2018-09-03 21:09:58', 2, 0),
(19, 'et la suite ? pour bientot', 'baptiste', '2018-09-03 21:23:53', 2, 0),
(20, 'un essai', 'luc', '2018-09-03 21:32:55', 2, 1),
(21, 'oui', 'david', '2018-09-24 21:53:06', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `pseudo`, `password`) VALUES
(1, 'rocheforte', 'jean', 'jr', '$2y$10$JkKMOZ6T2kHbw5uTh5izpe.QYerOQT3Q33tm4tq7zTKombkmi0IFW');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `content` varchar(500) NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_member_id` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `post_date`, `member_id`,`member firstname`,`member lastname`) VALUES
(1, 'un chemin improbable ', '    Je venais tout juste de partir d'Anchorage avec mon guide                ', '2018-07-30 21:17:43', 1),
(2, 'Une louve protectrice', '  Alors que javais passe la foret et etabli mon camp  dans une grotte , jentendis un grondement et des plaintes .Je n'approchais docuement de la source des bruits                  ', '2018-07-30 21:23:16', 1),
(3, 'Une foret dangereuse ', '                        <p>Alors que le soleil se levait , je devais partir vers ma prochaine destination</p>                    ', '2018-09-10 21:48:53', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
