-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 juil. 2021 à 23:19
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fleuriste`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--
INSERT INTO `client` (`id`, `nom`, `prenom`, `telephone`, `email`, `adresse`, `ville`) VALUES
(9, 'Jakobssen', 'Cinnamon', '5473973542', 'cjakobssen0@wikimedia.org', '0160 Harbort Way', 'Piteå'),
(10, 'MacGoun', 'Genevra', '7018238829', 'gmacgoun1@hexun.com', '296 Pond Place', 'Dehī'),
(11, 'Annon', 'Gideon', '2559104335', 'gannon2@prnewswire.com', '8586 Dwight Way', 'Pakxé'),
(12, 'Winstone', 'Trudi', '7273798994', 'twinstone3@npr.org', '72 Briar Crest Junction', 'Aripuanã'),
(13, 'Demanche', 'Zackariah', '1614702979', 'zdemanche4@ed.gov', '29 Karstens Park', 'Yangkang'),
(14, 'Croad', 'Cyndie', '5543557553', 'ccroad5@studiopress.com', '48 Rigney Pass', 'Mehrābpur'),
(15, 'Duffill', 'Randolph', '9552170867', 'rduffill6@plala.or.jp', '75396 Prairieview Lane', 'Volodymyr-Volyns’kyy'),
(16, 'Chatin', 'Bren', '7047441317', 'bchatin7@google.pl', '8675 Truax Road', 'Sui’an'),
(17, 'Collison', 'Lock', '2201406709', 'lcollison8@hatena.ne.jp', '88058 Arkansas Point', 'Surkhakhi'),
(18, 'Simonato', 'Janella', '6356302332', 'jsimonato9@webeden.co.uk', '1684 Glendale Pass', 'Velké Hoštice'),
(19, 'Whatson', 'Jodi', '6851013188', 'jwhatsona@woothemes.com', '65 Spohn Trail', 'Ciulu'),
(20, 'Fenelow', 'Angelita', '6625745443', 'afenelowb@drupal.org', '9869 Myrtle Road', 'Mehrān'),
(21, 'Addey', 'Sibyl', '7283676380', 'saddeyc@ox.ac.uk', '8328 Darwin Alley', 'Huambo'),
(22, 'Charge', 'Izaak', '8716624507', 'icharged@multiply.com', '375 Oneill Trail', 'Maglaj'),
(23, 'Demange', 'Francois', '8544033860', 'fdemangee@addtoany.com', '33029 Aberg Terrace', 'Mayo'),
(24, 'Buten', 'Marion', '8074134498', 'mbutenf@canalblog.com', '3553 Hooker Point', 'Trà Vinh'),
(25, 'Serle', 'Sally', '1059852644', 'sserleg@usnews.com', '470 Mosinee Avenue', 'Klagenfurt am Wörthersee'),
(26, 'Stower', 'Mile', '4429592342', 'mstowerh@wiley.com', '333 Sherman Alley', 'Kihurio'),
(27, 'McKinnon', 'Ronda', '8247943180', 'rmckinnoni@house.gov', '5 Bayside Junction', 'Cotabato'),
(28, 'Wilflinger', 'Gwenni', '8876700225', 'gwilflingerj@comcast.net', '35705 Brickson Park Place', 'Ikedachō'),
(29, 'Carlick', 'Leigh', '4367570173', 'lcarlickk@chronoengine.com', '25327 Haas Pass', 'Falköping'),
(30, 'Sincock', 'Celestyna', '1631523616', 'csincockl@independent.co.uk', '25 Vermont Lane', 'Fëdorovskoye'),
(31, 'Drinnan', 'Hanson', '6064970843', 'hdrinnanm@e-recht24.de', '70766 Oak Valley Park', 'Madur'),
(32, 'Micallef', 'Tomasina', '6267963273', 'tmicallefn@home.pl', '68 Stephen Avenue', 'Hongwansi'),
(33, 'Quinane', 'Denis', '2064087924', 'dquinaneo@list-manage.com', '0096 Melby Drive', 'Ibiá'),
(34, 'Hursey', 'Ad', '2775221997', 'ahurseyp@msn.com', '937 Golf Court', 'Líbeznice'),
(35, 'Syred', 'Chickie', '7672965234', 'csyredq@pagesperso-orange.fr', '7180 Maple Avenue', 'Bangkok'),
(36, 'Ellick', 'Venus', '3702530990', 'vellickr@oaic.gov.au', '24 Lukken Alley', 'Piura'),
(37, 'Hedin', 'Maddi', '1402319470', 'mhedins@oakley.com', '7359 Del Sol Park', 'Doom'),
(38, 'Keneford', 'Yehudit', '5263765256', 'ykenefordt@plala.or.jp', '6 Mayfield Trail', 'Gapluk'),
(39, 'Costa', 'Inge', '7793089711', 'icostau@wordpress.org', '1 Crest Line Point', 'Guacamaya'),
(40, 'Grishanin', 'Stearn', '1861304631', 'sgrishaninv@posterous.com', '38752 Valley Edge Point', 'Sedlčany'),
(41, 'McGilben', 'Debra', '5858756025', 'dmcgilbenw@disqus.com', '5 Westport Terrace', 'Calaba'),
(42, 'Meredith', 'Merci', '4877306164', 'mmeredithx@comcast.net', '819 Lunder Parkway', 'Congas'),
(43, 'Hudd', 'Katinka', '6497211572', 'khuddy@webs.com', '0586 5th Drive', 'Bolaoit'),
(44, 'Wall', 'Hervey', '1941358894', 'hwallz@free.fr', '8 Dayton Point', 'Nueva Guinea'),
(45, 'Ames', 'Clementius', '6247196831', 'cames10@time.com', '455 Boyd Court', 'Stupari'),
(46, 'Spens', 'Agata', '5115224316', 'aspens11@tinypic.com', '49227 Donald Avenue', 'Karangsono'),
(47, 'Quartley', 'Taddeusz', '5261200992', 'tquartley12@zdnet.com', '3 Lake View Street', 'Libice nad Cidlinou'),
(48, 'Carding', 'Rey', '4587937369', 'rcarding13@cpanel.net', '8692 2nd Terrace', 'Bururi'),
(49, 'Poll', 'Ryun', '3796157449', 'rpoll14@weather.com', '223 Wayridge Hill', 'Yāsūf'),
(50, 'Snooks', 'Vladimir', '3075302733', 'vsnooks15@bandcamp.com', '07 1st Avenue', 'Libon'),
(51, 'Nolleth', 'Dimitri', '8003518276', 'dnolleth16@arizona.edu', '9 Hintze Alley', 'Abay'),
(52, 'Wroth', 'Mitchell', '5782571031', 'mwroth17@skyrock.com', '610 Mosinee Point', 'Thanh Xuân'),
(53, 'Kopacek', 'Rodge', '1653279248', 'rkopacek18@pagesperso-orange.fr', '32 Elka Circle', 'Glafirovka'),
(54, 'Meeks', 'Aleta', '6793450183', 'ameeks19@networkadvertising.org', '2326 Moulton Terrace', 'Oetuke'),
(55, 'McGillacoell', 'Archibaldo', '1094284022', 'amcgillacoell1a@lycos.com', '57547 Saint Paul Court', 'Balud'),
(56, 'Coultish', 'Karia', '6917065578', 'kcoultish1b@time.com', '2 Roxbury Pass', 'Dąbrowice'),
(57, 'Valois', 'Betteanne', '4212676008', 'bvalois1c@scientificamerican.com', '87 Schiller Circle', 'El Progreso'),
(58, 'Edgerly', 'Giustina', '3537590969', 'gedgerly1d@ustream.tv', '7967 North Road', 'Brodokalmak'),
(59, 'Jaine', 'Sully', '7131540942', 'sjaine1e@ted.com', '94226 Kinsman Road', 'Bluff'),
(60, 'Pancoust', 'Nonie', '6958366126', 'npancoust1f@trellian.com', '28229 Aberg Court', 'Holma'),
(61, 'Ismead', 'Care', '7202065232', 'cismead1g@skyrock.com', '6 Trailsway Lane', 'Nice'),
(62, 'Cockings', 'Cecilla', '8318301486', 'ccockings1h@studiopress.com', '63 Sundown Alley', 'Nanhuang'),
(63, 'Montez', 'Shanda', '8177817411', 'smontez1i@ebay.com', '4776 Grover Alley', 'Kista'),
(64, 'Messent', 'Layla', '2157123949', 'lmessent1j@wiley.com', '73 Carioca Terrace', 'Tetyushi'),
(65, 'Alyoshin', 'Jackqueline', '8309135078', 'jalyoshin1k@studiopress.com', '37619 Stone Corner Lane', 'Argelia'),
(66, 'Isworth', 'Jim', '9244822862', 'jisworth1l@shutterfly.com', '12 Marcy Trail', 'El Hamma'),
(67, 'Boeter', 'Davis', '9533862260', 'dboeter1m@berkeley.edu', '81 Havey Park', 'Sakaiminato'),
(68, 'Gallimore', 'Pearle', '7653275415', 'pgallimore1n@eventbrite.com', '95719 Becker Court', 'Herceg-Novi'),
(69, 'Basson', 'Celle', '6709840140', 'cbasson1o@cocolog-nifty.com', '25 Debs Alley', 'Diavatós'),
(70, 'Courtman', 'Kendal', '1691746361', 'kcourtman1p@time.com', '9393 Bunker Hill Trail', 'Canguçu'),
(71, 'Kilian', 'Shirlene', '5893014893', 'skilian1q@wiley.com', '24741 Thackeray Drive', 'Lhokkruet'),
(72, 'Blakemore', 'Ban', '7631660002', 'bblakemore1r@merriam-webster.com', '50471 Granby Trail', 'Plácido de Castro'),
(73, 'Lowen', 'Jules', '9094494953', 'jlowen1s@symantec.com', '037 Melby Place', 'Yessentukskaya'),
(74, 'D\'Elia', 'Nevsa', '3946785397', 'ndelia1t@infoseek.co.jp', '43903 Judy Drive', 'Longos'),
(75, 'Jardein', 'Jacklin', '5958350574', 'jjardein1u@illinois.edu', '15453 Carioca Plaza', 'Río Colorado'),
(76, 'Maddy', 'Gage', '1708982026', 'gmaddy1v@google.cn', '60 Mitchell Alley', 'Sassandra'),
(77, 'McGuinness', 'Lesly', '8255368131', 'lmcguinness1w@ebay.com', '07456 Warrior Pass', 'Soras'),
(78, 'Edgars', 'Janene', '5134499609', 'jedgars1x@trellian.com', '52062 Orin Court', 'Lagoaça'),
(79, 'Andryushchenko', 'Andy', '4854119901', 'aandryushchenko1y@hao123.com', '8 Dayton Center', 'Malabar'),
(80, 'Linning', 'Nicol', '3319689323', 'nlinning1z@soundcloud.com', '22792 Corben Crossing', 'Pul-e Khumrī'),
(81, 'Devonald', 'Roch', '5791968181', 'rdevonald20@wikipedia.org', '8 Morningstar Parkway', 'Perosinho'),
(82, 'Coldrick', 'Lark', '2724522665', 'lcoldrick21@aol.com', '129 Grasskamp Street', 'Tomakomai'),
(83, 'Boys', 'Odey', '9671886120', 'oboys22@vk.com', '6139 Upham Trail', 'Áno Kalentíni'),
(84, 'Palffy', 'Aleece', '4289880720', 'apalffy23@amazon.co.uk', '6 Lerdahl Hill', 'Yug'),
(85, 'Hotton', 'Costa', '2052363666', 'chotton24@hexun.com', '7818 Killdeer Street', 'Hatava'),
(86, 'Prinett', 'Orel', '9817670998', 'oprinett25@edublogs.org', '238 Comanche Pass', 'Longgang'),
(87, 'Calvert', 'Sal', '8215145143', 'scalvert26@ox.ac.uk', '4 Buena Vista Place', 'Barão de Cocais'),
(88, 'Hourican', 'Cullan', '8399494726', 'chourican27@discovery.com', '0 Mosinee Pass', 'Castelões'),
(89, 'Duerden', 'Siward', '7024696805', 'sduerden28@delicious.com', '66 Springview Alley', 'Duantan'),
(90, 'Fahrenbach', 'Annadiane', '2237971346', 'afahrenbach29@fema.gov', '22665 Vidon Plaza', 'Ryūgasaki'),
(91, 'Ubank', 'Blythe', '8364227927', 'bubank2a@acquirethisname.com', '6949 Elgar Center', 'Taghazout'),
(92, 'Bernhardsson', 'Lauri', '8787266152', 'lbernhardsson2b@bbb.org', '3739 Pearson Place', 'Kut Chap'),
(93, 'Eseler', 'Venita', '7289913369', 'veseler2c@mapquest.com', '9578 Grayhawk Avenue', 'Suyang'),
(94, 'Grimestone', 'Aldwin', '7478583885', 'agrimestone2d@illinois.edu', '11 Namekagon Avenue', 'Blois'),
(95, 'Cristoforetti', 'Aurea', '4639470721', 'acristoforetti2e@toplist.cz', '3 Carey Plaza', 'Taiping'),
(96, 'Glidden', 'Anthia', '5405951443', 'aglidden2f@ycombinator.com', '46 Eggendart Place', 'Białołeka'),
(97, 'Kennett', 'Salomi', '3578845187', 'skennett2g@rakuten.co.jp', '16 Dexter Junction', 'Jangkungkusumo'),
(98, 'Combes', 'Giorgia', '4776503222', 'gcombes2h@yellowpages.com', '31 Vera Street', 'Cergy-Pontoise'),
(99, 'Baszniak', 'Antonie', '9673698404', 'abaszniak2i@slideshare.net', '779 Linden Crossing', 'Roczyny'),
(100, 'Ahrens', 'Shel', '3837320102', 'sahrens2j@newsvine.com', '67483 Luster Place', 'Cordeiro'),
(101, 'Orme', 'Elyssa', '8042874467', 'eorme2k@github.io', '33 Westend Court', 'Sandakan'),
(102, 'Woof', 'Norrie', '8475649946', 'nwoof2l@auda.org.au', '9 Spenser Circle', 'Volkhov'),
(103, 'Strodder', 'Alyss', '4057651544', 'astrodder2m@domainmarket.com', '6257 Messerschmidt Plaza', 'Yemva'),
(104, 'Gullivan', 'Aube', '4636728248', 'agullivan2n@mail.ru', '12 Swallow Plaza', 'Zhoukou'),
(105, 'Witcher', 'Aylmar', '8992271643', 'awitcher2o@blogspot.com', '8 Hazelcrest Hill', 'Hola Prystan’'),
(106, 'Gaskamp', 'Atalanta', '5114227231', 'agaskamp2p@wufoo.com', '40 Grover Road', 'Norrköping');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `num_commande` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  PRIMARY KEY (`num_commande`),
  KEY `commande_fk` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`num_commande`, `id_client`, `date_commande`) VALUES
(1, 66, '2020-02-25 03:34:52'),
(2, 73, '2020-01-15 20:03:21'),
(3, 78, '2020-01-01 16:33:20'),
(4, 85, '2020-01-10 04:24:38'),
(5, 90, '2020-02-05 20:21:22'),
(6, 9, '2020-02-06 01:11:41'),
(7, 24, '2020-02-10 01:00:42'),
(8, 70, '2020-01-16 19:51:46'),
(9, 68, '2020-01-22 14:38:08'),
(10, 41, '2020-01-24 01:48:39'),
(11, 85, '2020-02-24 23:12:09'),
(12, 28, '2020-01-27 14:54:42'),
(13, 89, '2019-12-24 19:34:48'),
(14, 15, '2020-01-05 18:14:47'),
(15, 25, '2020-01-21 15:04:10'),
(16, 73, '2020-02-25 23:56:19'),
(17, 72, '2020-01-07 22:30:38'),
(18, 51, '2020-02-18 14:27:24');

-- --------------------------------------------------------

--
-- Structure de la table `commande_fleur`
--

DROP TABLE IF EXISTS `commande_fleur`;
CREATE TABLE IF NOT EXISTS `commande_fleur` (
  `id_commande` bigint(20) NOT NULL,
  `id_fleur` int(11) NOT NULL,
  `tel_contact` varchar(14) DEFAULT NULL,
  `date_livraison` datetime DEFAULT NULL,
  `lieu_livraison` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_commande`,`id_fleur`),
  KEY `fleur_fk` (`id_fleur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande_fleur`
--

INSERT INTO `commande_fleur` (`id_commande`, `id_fleur`, `tel_contact`, `date_livraison`, `lieu_livraison`, `ville`) VALUES
(1, 1, '2034709616', '2021-05-09 00:00:00', '6831 Cardinal Drive', 'Yucun'),
(2, 2, '4623333768', '2021-05-31 00:00:00', '4578 7th Circle', 'Hujia'),
(4, 4, '9782865447', '2020-10-14 00:00:00', '33 Myrtle Place', 'Trasak'),
(5, 5, '9375261991', '2021-04-06 00:00:00', '286 Kenwood Parkway', 'Tancheng'),
(6, 6, '3982313398', '2021-06-25 00:00:00', '57 Moose Terrace', 'Moissy-Cramayel'),
(7, 7, '1383945655', '2020-08-22 00:00:00', '70 Sugar Street', 'Buang'),
(8, 8, '7417642840', '2020-07-29 00:00:00', '647 Welch Park', 'Cigembong'),
(9, 9, '7897479227', '2021-05-18 00:00:00', '630 3rd Parkway', 'San Lucas'),
(10, 10, '6461814913', '2021-05-31 00:00:00', '8373 Village Lane', 'Studzionka'),
(11, 11, '6747183397', '2021-03-10 00:00:00', '66502 Thompson Trail', 'Liuxia'),
(12, 12, '8267192154', '2021-01-13 00:00:00', '3042 Hayes Lane', 'Bambakashat'),
(13, 13, '8577834126', '2021-04-23 00:00:00', '1 Warbler Park', 'Kunyang'),
(14, 14, '1377223068', '2021-04-07 00:00:00', '7187 Browning Center', 'Jin’e'),
(15, 15, '8136979699', '2021-01-22 00:00:00', '79621 Oakridge Crossing', 'Sędziszów'),
(16, 16, '9553338555', '2021-04-18 00:00:00', '050 Warbler Circle', 'Henglian');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `couleur_uq` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`id`, `libelle`) VALUES
(9, 'Argenté'),
(2, 'Blanc'),
(19, 'Blanc cassé'),
(12, 'Bleu'),
(18, 'Ecru'),
(7, 'Fuchsia'),
(3, 'Jaune'),
(15, 'Jaune orangé'),
(10, 'Lavandre'),
(14, 'Marron'),
(1, 'Noir'),
(8, 'Or'),
(4, 'Orange'),
(5, 'Rose'),
(6, 'Rouge'),
(17, 'Rouille'),
(13, 'Turquoise'),
(11, 'Vert'),
(16, 'Vert Clair'),
(20, 'Violet');

-- --------------------------------------------------------

--
-- Structure de la table `fleur`
--

DROP TABLE IF EXISTS `fleur`;
CREATE TABLE IF NOT EXISTS `fleur` (
  `id_fleur` int(11) NOT NULL AUTO_INCREMENT,
  `id_couleur` smallint(6) NOT NULL,
  `id_variete` int(11) NOT NULL,
  PRIMARY KEY (`id_fleur`),
  KEY `variete_fk` (`id_variete`),
  KEY `couleur_fk` (`id_couleur`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fleur`
--

INSERT INTO `fleur` (`id_fleur`, `id_couleur`, `id_variete`) VALUES
(1, 5, 1),
(2, 12, 1),
(3, 11, 2),
(4, 6, 3),
(5, 7, 4),
(6, 2, 4),
(7, 1, 5),
(8, 3, 6),
(9, 8, 6),
(10, 4, 7),
(11, 9, 7),
(12, 11, 7),
(13, 10, 8),
(14, 1, 8),
(15, 13, 9),
(16, 14, 10),
(17, 12, 10),
(18, 15, 10),
(19, 16, 11),
(20, 17, 11),
(21, 18, 11),
(22, 19, 11),
(23, 20, 12),
(24, 17, 12),
(25, 20, 13),
(26, 18, 13),
(27, 19, 13),
(28, 17, 13),
(29, 20, 14),
(30, 17, 14),
(31, 19, 4),
(32, 11, 4),
(33, 12, 1),
(34, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fleur_fournisseur`
--

DROP TABLE IF EXISTS `fleur_fournisseur`;
CREATE TABLE IF NOT EXISTS `fleur_fournisseur` (
  `id_fleur` int(11) NOT NULL,
  `id_fournisseur` tinyint(4) NOT NULL,
  `stock` smallint(6) NOT NULL,
  PRIMARY KEY (`id_fleur`,`id_fournisseur`),
  KEY `fournisseur_fk` (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fleur_fournisseur`
--

INSERT INTO `fleur_fournisseur` (`id_fleur`, `id_fournisseur`, `stock`) VALUES
(1, 1, 20),
(1, 2, 50),
(2, 1, 12),
(4, 2, 20),
(6, 2, 20),
(7, 1, 2),
(8, 1, 50),
(11, 2, 120),
(12, 1, 50);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `raison_soc` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fournisseur_uq` (`raison_soc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `raison_soc`, `nom`, `prenom`, `tel`) VALUES
(1, 'Super Fleurs', 'Florine', 'jade', '0243257885'),
(2, 'SARL Jean Dupont', 'Dupont', 'Jean', '0243257588');

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

DROP TABLE IF EXISTS `variete`;
CREATE TABLE IF NOT EXISTS `variete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `variete_uq` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `variete`
--

INSERT INTO `variete` (`id`, `libelle`) VALUES
(10, 'Chrysanthème'),
(5, 'Fuschia'),
(14, 'Hortensia'),
(13, 'Iris'),
(11, 'Jonquille'),
(6, 'Lila'),
(3, 'Marguerite'),
(7, 'Mimosa'),
(4, 'Muguet'),
(9, 'Oeillet'),
(12, 'Orchidee'),
(8, 'Paquerette'),
(1, 'Rose'),
(2, 'Tulipe');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_fk` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `commande_fleur`
--
ALTER TABLE `commande_fleur`
  ADD CONSTRAINT `commande_fleur_fk` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`num_commande`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fleur_fk` FOREIGN KEY (`id_fleur`) REFERENCES `fleur` (`id_fleur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fleur`
--
ALTER TABLE `fleur`
  ADD CONSTRAINT `couleur_fk` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `variete_fk` FOREIGN KEY (`id_variete`) REFERENCES `variete` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fleur_fournisseur`
--
ALTER TABLE `fleur_fournisseur`
  ADD CONSTRAINT `fleur_fournisseur_fk` FOREIGN KEY (`id_fleur`) REFERENCES `fleur` (`id_fleur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fournisseur_fk` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
