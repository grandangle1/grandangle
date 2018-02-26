-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 26 fév. 2018 à 13:21
-- Version du serveur :  5.7.20-log
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `grand-angle`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `heure` datetime NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `idOeuvre` int(11) DEFAULT NULL,
  `idExpo` int(11) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`id`, `libelle`, `heure`, `idAdmin`, `idOeuvre`, `idExpo`, `idType`) VALUES
(17, 'delete', '2018-02-25 22:37:01', 15, 61, NULL, NULL),
(19, 'delete', '2018-02-25 22:38:21', 15, 72, NULL, NULL),
(20, 'edit', '2018-02-25 22:40:14', 15, 75, NULL, NULL),
(27, 'create', '2018-02-25 22:48:08', 14, 106, NULL, NULL),
(28, 'qr-code', '2018-02-25 22:51:09', 15, 73, NULL, NULL),
(29, 'delete', '2018-02-25 22:59:16', 15, NULL, NULL, 4),
(30, 'edit', '2018-02-25 23:01:42', 15, NULL, NULL, 1),
(31, 'create', '2018-02-25 23:03:53', 15, NULL, NULL, 9),
(33, 'delete', '2018-02-25 23:11:07', 15, NULL, 27, NULL),
(34, 'create', '2018-02-25 23:12:08', 15, NULL, 28, NULL),
(35, 'edit', '2018-02-25 23:12:25', 15, NULL, 28, NULL),
(36, 'edit', '2018-02-25 23:37:24', 15, 73, NULL, NULL),
(37, 'edit', '2018-02-25 23:37:32', 15, 73, NULL, NULL),
(38, 'delete', '2018-02-25 23:37:49', 15, 73, NULL, NULL),
(39, 'create', '2018-02-25 23:39:30', 15, 107, NULL, NULL),
(40, 'edit', '2018-02-25 23:39:55', 15, 107, NULL, NULL),
(41, 'qr-code', '2018-02-25 23:40:28', 14, 107, NULL, NULL),
(42, 'delete', '2018-02-25 23:40:32', 14, 107, NULL, NULL),
(43, 'delete', '2018-02-25 23:56:22', 14, NULL, 25, NULL),
(44, 'create', '2018-02-25 23:56:53', 14, NULL, 29, NULL),
(45, 'create', '2018-02-25 23:57:11', 14, 108, NULL, NULL),
(46, 'create', '2018-02-25 23:57:22', 14, 109, NULL, NULL),
(47, 'create', '2018-02-25 23:57:32', 14, 110, NULL, NULL),
(48, 'edit', '2018-02-25 23:59:40', 14, 108, NULL, NULL),
(49, 'qr-code', '2018-02-25 23:59:54', 14, 108, NULL, NULL),
(50, 'edit', '2018-02-26 00:21:42', 14, 108, NULL, NULL),
(51, 'edit', '2018-02-26 01:30:36', 15, 108, NULL, NULL),
(52, 'create', '2018-02-26 12:51:34', 15, NULL, NULL, 10),
(53, 'edit', '2018-02-26 12:51:51', 15, NULL, NULL, 10),
(54, 'delete', '2018-02-26 12:51:58', 15, NULL, NULL, 10),
(55, 'qr-code', '2018-02-26 12:53:23', 15, 110, NULL, NULL),
(56, 'edit', '2018-02-26 12:53:59', 15, 110, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time-token` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `identifiant`, `password`, `email`, `name`, `surname`, `token`, `time-token`) VALUES
(14, 'fredo', 'e26759692343e6a893729140ac7ae2a032bf5008', 'fred@gmail.com', 'Dupont', 'Fred', NULL, NULL),
(15, 'theo.lavigne3740@gmail.com', 'd11afb82d067ab640729c7b61b8aa3b70f39490d', 'theo.lavigne3740@gmail.com', 'dev', 'Lavignee', NULL, NULL),
(16, 'le test', 'c81019207890deb5cba8cda1de0dd6b1c229eeff', 'theo@gmi.com', 'henry', 'henry', NULL, NULL),
(17, 'eeeeeee', 'e7d0dc6d36cea367b1c9cc97ad81b429e434744c', 'ezoijf@gmp.vom', 'theo', 'theo', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `idArtist` int(11) NOT NULL AUTO_INCREMENT,
  `nameArtist` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surnameArtist` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date NOT NULL,
  `descrArtistFR` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `descrArtistEN` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `urlImg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idExpo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArtist`),
  KEY `FK_artist_idExpo` (`idExpo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`idArtist`, `nameArtist`, `surnameArtist`, `birthDate`, `descrArtistFR`, `descrArtistEN`, `urlImg`, `idExpo`) VALUES
(14, 'Lavigne', 'theo', '2018-02-25', 'fgggggggggggggggggggggggggggggggggggggggg', 'ggggggggggggggggggggggggggg', 'img/file_artist/image14.png', 18),
(22, 'DaVonca', 'Leonardo', '2018-02-03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque neque eget turpis aliquam, id malesuada dui mattis. Suspendisse potenti. Vivamus sed ultrices ex, sit amet suscipit turpis. Suspendisse ut volutpat enim. Praesent et libero leo. Praesent quis sapien ut eros finibus porta ut ac libero. Pellentesque ut iaculis nisi. Fusce aliquam eget arcu sodales ullamcorper. Suspendisse placerat tincidunt mollis. Aenean quis auctor risus, et bibendum nulla. Maecenas nec magna eget felis imperdiet suscipit sed et risus. Etiam ornare justo eget lacus facilisis, quis commodo ex rhoncus.\r\n\r\nQuisque in semper risus. Duis turpis turpis, vulputate in tincidunt ut, elementum sed lectus. Nam arcu nisi, eleifend sit amet convallis quis, auctor feugiat neque. Fusce facilisis bibendum metus eget iaculis. Morbi placerat dolor vehicula, rutrum ipsum nec, pulvinar ipsum. Phasellus sollicitudin arcu mi, id semper dolor tempor nec. Cras facilisis sem sem, quis sagittis magna sagittis a. Pellentesque quis eleifend quam, rhoncus sollicitudin nulla. Sed odio ante, sollicitudin vel viverra a, consequat vehicula nisl. Maecenas a libero metus. Suspendisse varius neque et faucibus pharetra. In tincidunt nibh sem, vitae hendrerit enim pharetra eget.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque neque eget turpis aliquam, id malesuada dui mattis. Suspendisse potenti. Vivamus sed ultrices ex, sit amet suscipit turpis. Suspendisse ut volutpat enim. Praesent et libero leo. Praesent quis sapien ut eros finibus porta ut ac libero. Pellentesque ut iaculis nisi. Fusce aliquam eget arcu sodales ullamcorper. Suspendisse placerat tincidunt mollis. Aenean quis auctor risus, et bibendum nulla. Maecenas nec magna eget felis imperdiet suscipit sed et risus. Etiam ornare justo eget lacus facilisis, quis commodo ex rhoncus.\r\n\r\nQuisque in semper risus. Duis turpis turpis, vulputate in tincidunt ut, elementum sed lectus. Nam arcu nisi, eleifend sit amet convallis quis, auctor feugiat neque. Fusce facilisis bibendum metus eget iaculis. Morbi placerat dolor vehicula, rutrum ipsum nec, pulvinar ipsum. Phasellus sollicitudin arcu mi, id semper dolor tempor nec. Cras facilisis sem sem, quis sagittis magna sagittis a. Pellentesque quis eleifend quam, rhoncus sollicitudin nulla. Sed odio ante, sollicitudin vel viverra a, consequat vehicula nisl. Maecenas a libero metus. Suspendisse varius neque et faucibus pharetra. In tincidunt nibh sem, vitae hendrerit enim pharetra eget.', 'img/file_artist/image22.png', 26),
(24, 'Lavigne', 'Theo', '2018-02-23', 'ssssssssssssssss', 'sssssssssssssssss', 'img/file_artist/audio24.mp3', 28),
(25, 'Lavigne', 'Theo', '2018-02-21', 'zzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzz', 'img/file_artist/image25.png', 29);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `nameContact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surnameContact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idExpo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContact`),
  KEY `FK_Contact_idExpo` (`idExpo`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `nameContact`, `surnameContact`, `email`, `telephone`, `address`, `city`, `idExpo`) VALUES
(25, 'g', 'bitflav', 'loic@ok.fr', '0987654345678', 'ezfergergerger', 'fergergerg', 18),
(33, 'Theo', 'Lav', 'eeeeeeeee@gmail.com', '85567890', 'ezfergergerger', 'greerg', NULL),
(34, 'Theo', 'Lav', 'eeeeeeeee@gmail.com', '85567890', 'ezfergergerger', 'greerg', 26),
(36, 'Flav', 'bitflav', 'flav@gmail.com', '85567890', 'eeeeeeeeeeeeee', 'greerg', 28),
(37, 'zzzzzzzz', 'bitflav', 'theo.lavigne3740@gmail.com', '85567890', 'eeeeeeeeeeeeee', 'greerg', 29);

-- --------------------------------------------------------

--
-- Structure de la table `exposition`
--

DROP TABLE IF EXISTS `exposition`;
CREATE TABLE IF NOT EXISTS `exposition` (
  `idExpo` int(11) NOT NULL AUTO_INCREMENT,
  `themeFr` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `themeEn` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `week` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `generalDescrFR` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `generalDescrEN` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `idContact` int(11) DEFAULT NULL,
  `idArtist` int(11) DEFAULT NULL,
  PRIMARY KEY (`idExpo`),
  KEY `FK_exposition_idArtist` (`idArtist`),
  KEY `FK_exposition_idContact` (`idContact`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `exposition`
--

INSERT INTO `exposition` (`idExpo`, `themeFr`, `themeEn`, `week`, `generalDescrFR`, `generalDescrEN`, `idContact`, `idArtist`) VALUES
(18, 'Art antique', 'Antic Art', '2018-08', 'Hannibal Barca (en phénicien Hanni-baal est un nom théophore signifiant « qui a la faveur de Baal »1 et Barca, « foudre »2), généralement appelé Annibal ou Hannibal, né en 247 av. J.-C. à Carthage (au nord-est de l’actuelle Tunis en Tunisie) et mort entre 183 av. J.-C. et 181 av. J.-C.3,4,5 en Bithynie (près de l’actuelle Bursa en Turquie), est un général et homme politique carthaginois, généralement considéré comme l’un des plus grands tacticiens militaires de l’histoire.Il grandit durant une période de tension dans le bassin méditerranéen, alors que Rome commence à imposer sa puissance en Méditerranée occidentale : après la prise de la Sicile et de la Sardaigne, conséquence de la première guerre punique, les Romains envoient des troupes en Illyrie et poursuivent la colonisation de l’Italie du Nord. Élevé, selon la tradition historiographique latine, dans la haine de Rome, il est, selon ses ennemis, à l’origine de la deuxième guerre punique que les Anciens appelaient d’ailleurs « guerre d’Hannibal ».À la fin de l’année 218 av. J.-C., il quitte l’Espagne avec son armée et traverse les Pyrénées, puis les Alpes pour gagner le Nord de l’Italie. Pourtant, il ne parvient pas à prendre Rome. Selon certains historiens, Hannibal ne possède alors pas le matériel nécessaire à l’attaque et au siège de la ville6.Pour John Francis Lazenby, ce ne serait pas le manque d’équipements, mais celui de ravitaillement et son ambition politique qui empêchent Hannibal d’attaquer la cité7. Néanmoins, il réussit à maintenir une armée en Italie durant plus d’une décennie sans toutefois parvenir à imposer ses conditions aux Romains. Une contre-attaque de ces derniers le force à retourner à Carthage où il est finalement défait à la bataille de Zama, en 202 av. J.-C..L’historien militaire Theodore Ayrault Dodge lui donne le surnom de « père de la stratégie »8 du fait que son plus grand ennemi, Rome, adopte par la suite des éléments de sa tactique militaire dans son propre arsenal stratégique. Cet héritage lui confère une réputation forte dans le monde contemporain où il est considéré comme un grand stratège par des militaires, tels que Napoléon Ier et le duc de Wellington. Sa vie sert plus tard de trame à de nombreux films et documentaires.', 'Hannibal (Hǎnnibal Barca, 247 BC – ? 183/2/1 BC), was a Carthaginian statesman and general. He was the greatest enemy of the Roman Republic.Hannibal is most famous for what he did in the Second Punic War. He marched an army from Iberia over the Pyrenees mountains and the Alps mountains into northern Italy and defeated the Romans in a series of battles. At the Battle of Cannae he defeated the largest army Rome had ever put together. The Roman army is reckoned at 16 legions and a total of 86,000 men. Over 80% of this army was killed or captured, including its commander.He kept an army in Italy for many years. Eventually, a Roman invasion of North Africa made him return to Carthage. He lost, and the Romans made him leave Carthage. He lived at the Seleucid court, and convinced its Emperor to fight Rome. When he lost a naval battle, Hannibal fled to the Bithynian court. When the Romans told him to give up, he killed himself.Btw: Love yourslefHannibal is listed as one of the greatest military commanders in history. Military historian Theodore Ayrault Dodge once called Hannibal the ', 25, 14),
(26, 'Une expo', 'Une expo', '2018-19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque neque eget turpis aliquam, id malesuada dui mattis. Suspendisse potenti. Vivamus sed ultrices ex, sit amet suscipit turpis. Suspendisse ut volutpat enim. Praesent et libero leo. Praesent quis sapien ut eros finibus porta ut ac libero. Pellentesque ut iaculis nisi. Fusce aliquam eget arcu sodales ullamcorper. Suspendisse placerat tincidunt mollis. Aenean quis auctor risus, et bibendum nulla. Maecenas nec magna eget felis imperdiet suscipit sed et risus. Etiam ornare justo eget lacus facilisis, quis commodo ex rhoncus.  Quisque in semper risus. Duis turpis turpis, vulputate in tincidunt ut, elementum sed lectus. Nam arcu nisi, eleifend sit amet convallis quis, auctor feugiat neque. Fusce facilisis bibendum metus eget iaculis. Morbi placerat dolor vehicula, rutrum ipsum nec, pulvinar ipsum. Phasellus sollicitudin arcu mi, id semper dolor tempor nec. Cras facilisis sem sem, quis sagittis magna sagittis a. Pellentesque quis eleifend quam, rhoncus sollicitudin nulla. Sed odio ante, sollicitudin vel viverra a, consequat vehicula nisl. Maecenas a libero metus. Suspendisse varius neque et faucibus pharetra. In tincidunt nibh sem, vitae hendrerit enim pharetra eget.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque neque eget turpis aliquam, id malesuada dui mattis. Suspendisse potenti. Vivamus sed ultrices ex, sit amet suscipit turpis. Suspendisse ut volutpat enim. Praesent et libero leo. Praesent quis sapien ut eros finibus porta ut ac libero. Pellentesque ut iaculis nisi. Fusce aliquam eget arcu sodales ullamcorper. Suspendisse placerat tincidunt mollis. Aenean quis auctor risus, et bibendum nulla. Maecenas nec magna eget felis imperdiet suscipit sed et risus. Etiam ornare justo eget lacus facilisis, quis commodo ex rhoncus.  Quisque in semper risus. Duis turpis turpis, vulputate in tincidunt ut, elementum sed lectus. Nam arcu nisi, eleifend sit amet convallis quis, auctor feugiat neque. Fusce facilisis bibendum metus eget iaculis. Morbi placerat dolor vehicula, rutrum ipsum nec, pulvinar ipsum. Phasellus sollicitudin arcu mi, id semper dolor tempor nec. Cras facilisis sem sem, quis sagittis magna sagittis a. Pellentesque quis eleifend quam, rhoncus sollicitudin nulla. Sed odio ante, sollicitudin vel viverra a, consequat vehicula nisl. Maecenas a libero metus. Suspendisse varius neque et faucibus pharetra. In tincidunt nibh sem, vitae hendrerit enim pharetra eget.', 34, 22),
(28, 'ssssssssssssssssssss', 'Antic Art', '2018-11', 'sssssssssssssssssssss', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 36, 24),
(29, 'ssssssssssssssssssss', 'Antic Art', '2018-10', 'eeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 37, 25);

-- --------------------------------------------------------

--
-- Structure de la table `fail`
--

DROP TABLE IF EXISTS `fail`;
CREATE TABLE IF NOT EXISTS `fail` (
  `nbFail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fail`
--

INSERT INTO `fail` (`nbFail`) VALUES
(30);

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

DROP TABLE IF EXISTS `oeuvre`;
CREATE TABLE IF NOT EXISTS `oeuvre` (
  `idOeuvre` int(11) NOT NULL AUTO_INCREMENT,
  `nomOeuvre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `urlFile` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descrOeuvreFr` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `descrOeuvreEn` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `salle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vues` int(11) NOT NULL DEFAULT '0',
  `idExpo` int(11) DEFAULT NULL,
  `idType` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOeuvre`),
  KEY `FK_oeuvre_idExpo` (`idExpo`),
  KEY `idType` (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `oeuvre`
--

INSERT INTO `oeuvre` (`idOeuvre`, `nomOeuvre`, `urlFile`, `descrOeuvreFr`, `descrOeuvreEn`, `salle`, `vues`, `idExpo`, `idType`) VALUES
(74, 'Le feu', 'img/file_oeuvre/video$74.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle2', 1, 18, 2),
(75, 'Le feu', 'img/file_oeuvre/video$75.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle2', 0, 18, NULL),
(76, 'Le feu', 'img/file_oeuvre/video$76.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle2', 0, 18, 2),
(77, 'Le feu', 'img/file_oeuvre/video$77.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle2', 0, 18, 2),
(78, 'La joconde', 'img/file_oeuvre/image$78.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'hall', 2, 18, 1),
(80, 'La joconde', 'img/file_oeuvre/image$80.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'hall', 0, 18, 1),
(81, 'La joconde', 'img/file_oeuvre/image$81.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'hall', 0, 18, 1),
(82, 'La joconde', 'img/file_oeuvre/image$82.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'hall', 0, 18, 1),
(83, 'La joconde', 'img/file_oeuvre/image$83.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'hall', 0, 18, 1),
(84, 'ddddddddddddddd', 'img/file_oeuvre/image$84.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle1', 2, 18, 1),
(85, 'erfref', 'img/file_oeuvre/image$85.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle1', 0, 18, 1),
(86, 'sssssss', 'img/file_oeuvre/audio$86.wav', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle1', 1, 18, 1),
(87, 'ssssssssssssss', 'img/file_oeuvre/audio$87.wav', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle1', 0, 18, 2),
(88, 'ssssssssssssss', 'img/file_oeuvre/audio$88.wav', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle1', 2, 18, 2),
(89, 'sssssssss', 'img/file_oeuvre/audio$89.wav', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'couloir', 1, 18, 1),
(90, 'sssssssss', 'img/file_oeuvre/audio$90.wav', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'couloir', 0, 18, 1),
(91, 'sssssss', 'img/file_oeuvre/image$91.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum interdum dui eu justo euismod mattis. Nulla aliquam at mauris vel rutrum. Pellentesque viverra scelerisque commodo. Mauris scelerisque ante ac nisl aliquet egestas. Fusce congue posuere erat, et cursus sem lobortis ac. Curabitur tincidunt vehicula arcu, quis ullamcorper purus fermentum vel. Nullam elementum interdum tortor, quis semper augue tempor a. Nunc iaculis, massa ac commodo aliquet, ante sem vulputate nibh, sit amet congue magna nibh a libero. Morbi semper mattis congue. Fusce auctor orci et arcu dignissim finibus. Nunc viverra molestie volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula tellus nec vulputate auctor. Sed risus diam, pretium at neque vel, fermentum molestie nisi. Maecenas rutrum accumsan vulputate. Integer egestas varius ligula quis tempor', 'salle1', 0, 18, 1),
(97, 'La joconde', 'img/file_oeuvre/image$97.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque neque eget turpis aliquam, id malesuada dui mattis. Suspendisse potenti. Vivamus sed ultrices ex, sit amet suscipit turpis. Suspendisse ut volutpat enim. Praesent et libero leo. Praesent quis sapien ut eros finibus porta ut ac libero. Pellentesque ut iaculis nisi. Fusce aliquam eget arcu sodales ullamcorper. Suspendisse placerat tincidunt mollis. Aenean quis auctor risus, et bibendum nulla. Maecenas nec magna eget felis imperdiet suscipit sed et risus. Etiam ornare justo eget lacus facilisis, quis commodo ex rhoncus.\r\n\r\nQuisque in semper risus. Duis turpis turpis, vulputate in tincidunt ut, elementum sed lectus. Nam arcu nisi, eleifend sit amet convallis quis, auctor feugiat neque. Fusce facilisis bibendum metus eget iaculis. Morbi placerat dolor vehicula, rutrum ipsum nec, pulvinar ipsum. Phasellus sollicitudin arcu mi, id semper dolor tempor nec. Cras facilisis sem sem, quis sagittis magna sagittis a. Pellentesque quis eleifend quam, rhoncus sollicitudin nulla. Sed odio ante, sollicitudin vel viverra a, consequat vehicula nisl. Maecenas a libero metus. Suspendisse varius neque et faucibus pharetra. In tincidunt nibh sem, vitae hendrerit enim pharetra eget.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque neque eget turpis aliquam, id malesuada dui mattis. Suspendisse potenti. Vivamus sed ultrices ex, sit amet suscipit turpis. Suspendisse ut volutpat enim. Praesent et libero leo. Praesent quis sapien ut eros finibus porta ut ac libero. Pellentesque ut iaculis nisi. Fusce aliquam eget arcu sodales ullamcorper. Suspendisse placerat tincidunt mollis. Aenean quis auctor risus, et bibendum nulla. Maecenas nec magna eget felis imperdiet suscipit sed et risus. Etiam ornare justo eget lacus facilisis, quis commodo ex rhoncus.\r\n\r\nQuisque in semper risus. Duis turpis turpis, vulputate in tincidunt ut, elementum sed lectus. Nam arcu nisi, eleifend sit amet convallis quis, auctor feugiat neque. Fusce facilisis bibendum metus eget iaculis. Morbi placerat dolor vehicula, rutrum ipsum nec, pulvinar ipsum. Phasellus sollicitudin arcu mi, id semper dolor tempor nec. Cras facilisis sem sem, quis sagittis magna sagittis a. Pellentesque quis eleifend quam, rhoncus sollicitudin nulla. Sed odio ante, sollicitudin vel viverra a, consequat vehicula nisl. Maecenas a libero metus. Suspendisse varius neque et faucibus pharetra. In tincidunt nibh sem, vitae hendrerit enim pharetra eget.', 'salle2', 1, 26, 3),
(98, 'La joconde', 'img/file_oeuvre/image$98.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque neque eget turpis aliquam, id malesuada dui mattis. Suspendisse potenti. Vivamus sed ultrices ex, sit amet suscipit turpis. Suspendisse ut volutpat enim. Praesent et libero leo. Praesent quis sapien ut eros finibus porta ut ac libero. Pellentesque ut iaculis nisi. Fusce aliquam eget arcu sodales ullamcorper. Suspendisse placerat tincidunt mollis. Aenean quis auctor risus, et bibendum nulla. Maecenas nec magna eget felis imperdiet suscipit sed et risus. Etiam ornare justo eget lacus facilisis, quis commodo ex rhoncus.\r\n\r\nQuisque in semper risus. Duis turpis turpis, vulputate in tincidunt ut, elementum sed lectus. Nam arcu nisi, eleifend sit amet convallis quis, auctor feugiat neque. Fusce facilisis bibendum metus eget iaculis. Morbi placerat dolor vehicula, rutrum ipsum nec, pulvinar ipsum. Phasellus sollicitudin arcu mi, id semper dolor tempor nec. Cras facilisis sem sem, quis sagittis magna sagittis a. Pellentesque quis eleifend quam, rhoncus sollicitudin nulla. Sed odio ante, sollicitudin vel viverra a, consequat vehicula nisl. Maecenas a libero metus. Suspendisse varius neque et faucibus pharetra. In tincidunt nibh sem, vitae hendrerit enim pharetra eget.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque neque eget turpis aliquam, id malesuada dui mattis. Suspendisse potenti. Vivamus sed ultrices ex, sit amet suscipit turpis. Suspendisse ut volutpat enim. Praesent et libero leo. Praesent quis sapien ut eros finibus porta ut ac libero. Pellentesque ut iaculis nisi. Fusce aliquam eget arcu sodales ullamcorper. Suspendisse placerat tincidunt mollis. Aenean quis auctor risus, et bibendum nulla. Maecenas nec magna eget felis imperdiet suscipit sed et risus. Etiam ornare justo eget lacus facilisis, quis commodo ex rhoncus.\r\n\r\nQuisque in semper risus. Duis turpis turpis, vulputate in tincidunt ut, elementum sed lectus. Nam arcu nisi, eleifend sit amet convallis quis, auctor feugiat neque. Fusce facilisis bibendum metus eget iaculis. Morbi placerat dolor vehicula, rutrum ipsum nec, pulvinar ipsum. Phasellus sollicitudin arcu mi, id semper dolor tempor nec. Cras facilisis sem sem, quis sagittis magna sagittis a. Pellentesque quis eleifend quam, rhoncus sollicitudin nulla. Sed odio ante, sollicitudin vel viverra a, consequat vehicula nisl. Maecenas a libero metus. Suspendisse varius neque et faucibus pharetra. In tincidunt nibh sem, vitae hendrerit enim pharetra eget.', 'salle2', 0, 26, 3),
(99, 'La joconde', 'img/file_oeuvre/image$99.png', 'get: function(field) {\r\n        var url = new URL(window.location.href);\r\n        return url.searchParams.get(field);\r\n    }', 'get: function(field) {\r\n        var url = new URL(window.location.href);\r\n        return url.searchParams.get(field);\r\n    }', 'couloir', 1, 26, 3),
(100, 'Le son ', 'img/file_oeuvre/audio$100.mp3', 'eeeeeeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeee', 'salle1', 1, 18, 2),
(101, 'Le son ', 'img/file_oeuvre/audio$101.mp3', 'eeeeeeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeee', 'salle1', 1, 18, 2),
(102, 'LoL', 'img/file_oeuvre/audio$102.wav', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeee', 'hall', 0, 18, 1),
(103, 'ddddddddddddddd', 'img/file_oeuvre/image$103.png', 'zzzzzzzzzzz', 'zzzzzzzzzzzz', 'couloir', 0, 18, 2),
(104, 'ddddddddddddddd', 'img/file_oeuvre/image$104.png', 'zzzzzzzzz', 'zzzzzzzzzzzzz', 'salle2', 0, 18, 2),
(105, 'ddddddddddddddd', 'img/file_oeuvre/image$105.png', 'zzzzzzzzz', 'zzzzzzzzzzzzz', 'salle2', 0, 18, 2),
(106, 'erfref', 'img/file_oeuvre/audio$106.mp3', 'zzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzz', 'couloir', 0, 18, 2),
(108, 'ddddddddddddddd', 'img/file_oeuvre/image$108.png', 'zzzzzzzzzzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzzzzzzzz', 'salle1', 1, 29, 2),
(109, 'erfref', 'img/file_oeuvre/image$109.png', 'zzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzz', 'salle1', 0, 29, 2),
(110, 'ddddddddddddddd', 'img/file_oeuvre/audio$110.wav', 'zzzzzzzzzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzzz', 'hall', 1, 29, 2);

-- --------------------------------------------------------

--
-- Structure de la table `typeoeuvre`
--

DROP TABLE IF EXISTS `typeoeuvre`;
CREATE TABLE IF NOT EXISTS `typeoeuvre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeFr` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `typeEn` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionFr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptionEn` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `typeoeuvre`
--

INSERT INTO `typeoeuvre` (`id`, `typeFr`, `typeEn`, `descriptionFr`, `descriptionEn`, `position`) VALUES
(1, 'statue', 'statue', 'Vous allez voir de belles statues', 'test en', NULL),
(2, 'audio', 'audio', 'Grand angle donne la possibilité à ses visiteurs de découvrir des oeuvres audios!', 'Grand angle gives the possiblity to its visitors to discover audio art!', NULL),
(3, 'Peinture', 'Painting', 'Vous découvrirez de magnifiques peinture dans cette exposition!', 'You will discover wonderfull painting in this exibition!', NULL),
(5, 'Tapisserie', 'tapestry', 'Vous découvrirez des oeuvres en toiles magnifiques!', 'You\'re going to discover amazing tapestry!', NULL),
(7, 'Instrument de musique', 'Music instrument', 'Des magnifiques instruments de musique à découvrir!', 'Wonderful music instruments to be seen!', NULL),
(8, 'Antiquité', 'antiquity', 'Des oeuvres antiques', 'Art work from an ol period!', NULL),
(9, 'Antiquité', 'antiquity', 'Des oeuvres antiques', 'Art work from an ol period!', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `FK_artist_idExpo` FOREIGN KEY (`idExpo`) REFERENCES `exposition` (`idExpo`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_Contact_idExpo` FOREIGN KEY (`idExpo`) REFERENCES `exposition` (`idExpo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `exposition`
--
ALTER TABLE `exposition`
  ADD CONSTRAINT `FK_exposition_idArtist` FOREIGN KEY (`idArtist`) REFERENCES `artist` (`idArtist`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_exposition_idContact` FOREIGN KEY (`idContact`) REFERENCES `contact` (`idContact`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD CONSTRAINT `FK_oeuvre_idExpo` FOREIGN KEY (`idExpo`) REFERENCES `exposition` (`idExpo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oeuvre_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeoeuvre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
