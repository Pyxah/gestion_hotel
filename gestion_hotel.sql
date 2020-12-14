-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 14 déc. 2020 à 11:03
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `etage` int(255) NOT NULL,
  `numero` int(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `employee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `etage`, `numero`, `statut`, `employee`) VALUES
(26, 1, 1, 1, NULL),
(27, 1, 2, 1, NULL),
(28, 1, 3, 1, NULL),
(29, 1, 4, 1, NULL),
(30, 1, 5, 1, NULL),
(31, 1, 6, 1, NULL),
(32, 1, 7, 1, NULL),
(33, 1, 8, 1, NULL),
(34, 2, 9, 1, NULL),
(35, 2, 10, 1, NULL),
(36, 2, 11, 1, NULL),
(37, 2, 12, 1, NULL),
(38, 2, 13, 1, NULL),
(39, 2, 14, 1, NULL),
(40, 2, 15, 1, NULL),
(41, 2, 16, 1, NULL),
(42, 3, 17, 1, NULL),
(43, 3, 18, 1, NULL),
(44, 3, 19, 1, NULL),
(45, 3, 20, 1, NULL),
(46, 3, 21, 1, NULL),
(47, 3, 22, 1, NULL),
(48, 3, 23, 1, NULL),
(49, 3, 24, 1, NULL),
(50, 3, 25, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `chambre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id_employee`, `nom`, `prenom`, `chambre`) VALUES
(5, 'Clement', 'Pierre', NULL),
(6, 'Delachapelle', 'Laure', NULL),
(7, 'Fossard', 'Thomas', NULL),
(8, 'Provost', 'Jeremy', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `statut`) VALUES
(1, 'libre'),
(2, 'occupe'),
(3, 'nettoyage');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
(1, 'test@test', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `statut` (`statut`),
  ADD KEY `employee` (`employee`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `chambre` (`chambre`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`statut`) REFERENCES `statut` (`id_statut`),
  ADD CONSTRAINT `chambre_ibfk_2` FOREIGN KEY (`employee`) REFERENCES `employee` (`id_employee`);

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`chambre`) REFERENCES `chambre` (`id_chambre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
