-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Juin 2018 à 20:29
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `unbilletpourlalaska`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(500) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `date`) VALUES
(1, 'un lac gelé dans une contrée perdue', 'Un jour alors que j’étais sur le territoire d''une tribu amérindienne, je devais traverser un lac gelé avec mes chiens de traineau et mon traineau . Il faut l''avouer j''avais un peu peur car je ne savais pas si la glace serait assez épaisse pour supporter notre poids total . Alors que j’allais traverser, je vis une ombre . C''était un amérindien  .Il me déconseilla de traverser le lac gelé et me montra un autre chemin , certes plus long mais qui passait par la terre ferme , je continua ma route. ', '2018-03-26 13:30:00'),
(2, 'Un foret dangereuse', '                         Alors que les soleils se levait , je devais partir ver ma prochaine destination.\\r\\nAlors que je m''''?loignais de mon camp de base , je voyais une foret se dessiner devant moi .\\r\\nUne fois dans la foret , je fis face a un silence assourdissant . Alors que je pensais que mon chemin serait rapide et sans probl?me, je dus faire face a un ours. Il commen?a a se dresser face a moi mais c??tait pour prot?ger ses petits.\\r\\nNous sommes restes statiques et l''ours continua son ch', '2018-03-27 11:15:00'),
(3, 'lorem ipsum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu', '2018-06-08 15:29:31'),
(4, 'lorem', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu', '2018-06-08 15:30:44'),
(5, 'Ad ius', 'Sea velit dignissim reformidans et. Vel ei oblique corrumpit instructior. Quodsi epicuri iracundia usu ad. Id vix appellantur vituperatoribus, eam modo everti utroque eu, vel te audire disputationi. Ferri quaerendum cum at, autem erroribus pri ut. Usu vero aliquam eu, per meis illum graece an.\r\n\r\nEam id mollis officiis disputationi, augue error nam et. Probo partem intellegebat sed ea, regione facilisi ad mel. Eum ut diam nullam quodsi. Apeirian deserunt eam ne, in est doming vivendo. Et philoso', '2018-06-08 15:34:54'),
(6, 'Soluta nemore ', 'Soluta nemore legimus sed ex, mollis facilisis pro ut. Case vidit usu ex, quo an cibo malis. An vim ponderum dissentias, placerat deseruisse ut eam. Et probo habemus cum, ridens mollis id nec.\r\n\r\nQuo at convenire comprehensam, augue nonumes argumentum te eum. Pri te fugit menandri. Aperiam salutatus mediocritatem ad per. Insolens concludaturque sed ex, pro ubique expetenda vituperatoribus cu. His persecuti deterruisset ne, at lorem abhorreant sit. Duo esse adversarium ne, cu ignota corpora usu.\r', '2018-06-08 15:37:02'),
(7, 'Ad odio', 'Ad odio elaboraret per, ne per corpora patrioque, quo id maluisset incorrupte elaboraret. Vidit simul prompta in sea, est at aliquam epicurei. Mei iriure prompta dolorem eu. No vel saepe nostrud platonem, cu percipit phaedrum qui, eam ex exerci adipiscing. Eu percipit molestiae cum.\r\n\r\nVerear impedit no duo, accusata torquatos sea ea, sale tamquam referrentur eum ne. Admodum habemus appetere ne vix, appetere conclusionemque in vix. Dicit persequeris has at. Qui enim antiopam senserit an.\r\n\r\nCu e', '2018-06-08 15:39:25');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `pseudo`, `motdepasse`) VALUES
(1, 'rocheforte', 'jean', 'jr', 'ubpla');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contenu` tinytext NOT NULL,
  `auteur` varchar(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `article_id` int(11) unsigned NOT NULL,
  `signaled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_article` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `contenu`, `auteur`, `date`, `article_id`, `signaled`) VALUES
(1, 'Interessant', 'jacques', '2018-03-26 10:33:26', 1, 1),
(8, 'a quand le prochain chapitre ?', 'david', '2018-03-14 08:35:56', 2, 1),
(11, 'ce voyage a l''air dangereux ', 'dany', '2018-03-18 12:09:24', 2, 1),
(12, 'j''ai envie de lire la suite ...', 'henri', '2018-03-26 13:32:35', 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
