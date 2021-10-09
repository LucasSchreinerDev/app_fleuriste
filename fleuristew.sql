-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 oct. 2021 à 23:49
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
-- Base de données :  `fleuristew`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `prenom`, `nom`, `telephone`, `email`, `adresse`, `ville`, `code_postal`) VALUES
(129, 'noess', 'Schreiner', '6710613', 'arthaauzzr@test.fr', '28 rue lechesne', 'Le mans', '2000'),
(131, 'Lucasss', 'Schreiner', '0671061385', 'arthpopur@test.fr', '28 rue lechesneee', 'Le mans', '2000'),
(133, 'Lucas', 'Schreiner', '0671061385', 'arthueer@test.fr', '28 rue lechesne', 'Le mans', '2000'),
(134, 'Lucas', 'Schreiner', '0671061385', 'arthokeozrkzeur@test.fr', '28 rue lechesne', 'Le mans', '2000'),
(135, 'no&eacute;', 'Schreiner', '0606060606', 'noeschreiner@gmiail.com', '28 rue lechesne', 'le mans', '72000');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `num_commande` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  PRIMARY KEY (`num_commande`),
  KEY `commande_fk` (`id_client`),
  KEY `users_fk` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`num_commande`, `id_client`, `id_users`, `date_commande`) VALUES
(42, 129, 21, '2021-10-02 17:59:06'),
(43, 131, 21, '2021-10-02 18:14:02'),
(44, 133, 21, '2021-10-03 23:27:11'),
(45, 133, 21, '2021-10-03 23:27:28');

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
  `adresse_livraison` varchar(255) DEFAULT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `quantite` smallint(6) NOT NULL,
  PRIMARY KEY (`id_commande`,`id_fleur`),
  KEY `fleur_fk` (`id_fleur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande_fleur`
--

INSERT INTO `commande_fleur` (`id_commande`, `id_fleur`, `tel_contact`, `date_livraison`, `adresse_livraison`, `code_postal`, `ville`, `quantite`) VALUES
(42, 43, '671061385', '2021-10-29 19:58:00', '28 rue lechesne', '2000', 'Le mans', 2),
(43, 43, '606060606', '2021-11-02 20:13:00', '28 rue lechesne', '72000', 'le mans', 20),
(44, 43, '671061385', '2021-10-29 01:27:00', '28 rue lechesne', '2000', 'Le mans', 2),
(45, 43, '671061385', '2021-09-10 01:27:00', '28 rue lechesne', '2000', 'Le mans', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

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
(23, 'Jaune poussin'),
(10, 'Lavandre'),
(14, 'Marron'),
(1, 'Noir'),
(8, 'Or'),
(4, 'Orange'),
(5, 'Rose'),
(6, 'Rouge'),
(17, 'Rouille'),
(13, 'Turquoise'),
(11, 'Vert');

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fleur`
--

INSERT INTO `fleur` (`id_fleur`, `id_couleur`, `id_variete`) VALUES
(43, 9, 14),
(44, 9, 8),
(45, 11, 15),
(46, 2, 15),
(47, 8, 15),
(48, 13, 15),
(49, 17, 7),
(50, 8, 13);

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
(43, 11, 14),
(43, 12, 1293),
(43, 13, 200),
(44, 1, 134),
(44, 15, 200),
(45, 11, 18),
(45, 13, 200),
(47, 13, 150),
(47, 15, 200),
(48, 11, 335),
(49, 11, 24),
(50, 11, 2000);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `raison_soc`, `nom`, `prenom`, `tel`) VALUES
(1, 'Super Fleurs', 'Valioukhahize', 'jadezz', '0243257885'),
(2, 'SARL Jean Dupont', 'gb', 'noezzz', '0243257588'),
(11, 'Lucus', 'mew', 'mew', '0606060606s'),
(12, 'Flower collider', 'mew', 'mew', '0606060606'),
(13, 'super', 'mew', 'mew', '0606060606'),
(15, 'Gorm flower', 'dindou', 'dadou', '0623584590');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grade` tinyint(4) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `telephone`, `email`, `password`, `grade`, `active`) VALUES
(21, 'Lucassss', 'Schreinerzzz', '0745842523', 'jetonlucas27@orange.fr', '$2y$12$ZRNnNdwe4HRgu469oYDTv.UyCVOSK56jPrRd3KYn7F.n5AU1LflTu', 3, 2),
(61, 'employer', 'employer', '0623584590', 'super@gmail.com', '$2y$12$swvKbH4x.zQWVdZ3R2H9IORlm1UaUkfLLEF..bD8wWmSgBKGhZ/sq', 1, 3),
(65, 'ze', 'ef', '0623584590', 'supeiir@gmail.com', '$2y$12$3Mlwna/KnhNm2xIVbCKCIe.5FtuL0uQ/tRksApMoW0XwAr2CN9TAK', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

DROP TABLE IF EXISTS `variete`;
CREATE TABLE IF NOT EXISTS `variete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `variete_uq` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `variete`
--

INSERT INTO `variete` (`id`, `libelle`, `prix`) VALUES
(1, 'Rose', 10),
(2, 'Tulipe', 25),
(3, 'Marguerite', 10),
(4, 'Muguet', 10),
(5, 'Fuschia', 15),
(6, 'Lila', 13),
(7, 'Mimosa', 10),
(8, 'Paquerette', 9),
(9, 'Oeillet', 15),
(10, 'Chrysanthème', 10),
(11, 'Jonquille', 5),
(12, 'Orchidee', 10),
(13, 'Iris', 5),
(14, 'Hortensia', 12),
(15, 'Mewos', 15);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_fk` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

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
