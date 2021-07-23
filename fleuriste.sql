-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 23 juil. 2021 à 16:16
-- Version du serveur :  10.3.29-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fleuriste`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(14) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` char(5) NOT NULL,
  `ville` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `num_commande` bigint(20) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_commande` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande_fleur`
--

CREATE TABLE `commande_fleur` (
  `id_commande` bigint(20) NOT NULL,
  `id_fleur` int(11) NOT NULL,
  `tel_contact` varchar(14) DEFAULT NULL,
  `date_livraison` datetime DEFAULT NULL,
  `lieu_livraison` varchar(255) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id` smallint(6) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fleur`
--

CREATE TABLE `fleur` (
  `id_fleur` int(11) NOT NULL,
  `id_couleur` smallint(6) NOT NULL,
  `id_variete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fleur_fournisseur`
--

CREATE TABLE `fleur_fournisseur` (
  `id_fleur` int(11) NOT NULL,
  `id_fournisseur` tinyint(4) NOT NULL,
  `stock` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` tinyint(4) NOT NULL,
  `raison_soc` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `variete`
--

CREATE TABLE `variete` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`num_commande`),
  ADD KEY `commande_fk` (`id_client`);

--
-- Index pour la table `commande_fleur`
--
ALTER TABLE `commande_fleur`
  ADD PRIMARY KEY (`id_commande`,`id_fleur`),
  ADD KEY `fleur_fk` (`id_fleur`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `couleur_uq` (`libelle`);

--
-- Index pour la table `fleur`
--
ALTER TABLE `fleur`
  ADD PRIMARY KEY (`id_fleur`),
  ADD KEY `variete_fk` (`id_variete`),
  ADD KEY `couleur_fk` (`id_couleur`);

--
-- Index pour la table `fleur_fournisseur`
--
ALTER TABLE `fleur_fournisseur`
  ADD PRIMARY KEY (`id_fleur`,`id_fournisseur`),
  ADD KEY `fournisseur_fk` (`id_fournisseur`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fournisseur_uq` (`raison_soc`);

--
-- Index pour la table `variete`
--
ALTER TABLE `variete`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `variete_uq` (`libelle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `num_commande` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fleur`
--
ALTER TABLE `fleur`
  MODIFY `id_fleur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `variete`
--
ALTER TABLE `variete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
