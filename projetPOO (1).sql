-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 01 Juillet 2019 à 10:43
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetPOO`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `id_batiment` int(11) NOT NULL,
  `nom batiment` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `batiment`
--

INSERT INTO `batiment` (`id_batiment`, `nom batiment`) VALUES
(1, 'pavillon 1'),
(2, 'pavillon 2'),
(3, 'pavillon 3'),
(4, 'pavillon 4');

-- --------------------------------------------------------

--
-- Structure de la table `boursier`
--

CREATE TABLE `boursier` (
  `id_etudiant` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boursier`
--

INSERT INTO `boursier` (`id_etudiant`, `id_type`) VALUES
(1, 1),
(88, 1),
(97, 2),
(98, 2);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `id_batiment` int(11) NOT NULL,
  `nom chambre` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `id_batiment`, `nom chambre`) VALUES
(1, 1, 'chambreune'),
(2, 2, 'chambredeux'),
(3, 3, 'chambretrois'),
(4, 4, 'chambrequatre'),
(5, 2, 'pop'),
(6, 1, 'mouhamed'),
(7, 1, 'mouhamed'),
(8, 3, 'boy kha'),
(9, 3, 'boy kha'),
(10, 3, 'jean marie'),
(11, 3, 'diene'),
(12, 1, 'mboup');

-- --------------------------------------------------------

--
-- Structure de la table `ETUDIANT`
--

CREATE TABLE `ETUDIANT` (
  `id_etudiant` int(11) NOT NULL,
  `matricule` int(11) NOT NULL,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(35) NOT NULL,
  `date_de_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ETUDIANT`
--

INSERT INTO `ETUDIANT` (`id_etudiant`, `matricule`, `nom`, `prenom`, `email`, `telephone`, `date_de_naissance`) VALUES
(1, 1, 'fall', 'modou', 'modoufall@gmail.com', 778889944, '2019-06-19'),
(15, 25, 'diakhite', 'abdoulaye', 'abdoudiak@gm.com', 88, '2019-06-15'),
(25, 777, 'bane', 'banane', 'mbirame@gmail.com', 7777, '2019-06-22'),
(42, 555, 'mouhamed', 'jkl', 'paulmboup@live.fr', 5, '2019-06-28'),
(76, 6, 'dieng', 'mouhamed', 'mbirame@gmail.com', 66666, '2019-05-31'),
(80, 8, 'kha', 'boy', 'boy@kha.com', 77777, '2019-06-15'),
(88, 99999, 'marie', 'jean', 'mbirame@gmail.com', 9999999, '2019-06-14'),
(94, 555, 'senghor', 'diene', 'diene@senghor.com', 55555555, '2019-06-22'),
(97, 85255, 'kebe', 'fatou', 'fatou@kebe.com', 778466585, '2019-06-14'),
(98, 85255, 'kebe', 'fatou', 'fatou@kebe.com', 778466585, '2019-06-14');

-- --------------------------------------------------------

--
-- Structure de la table `loger`
--

CREATE TABLE `loger` (
  `id_chambre` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `loger`
--

INSERT INTO `loger` (`id_chambre`, `id_etudiant`) VALUES
(7, 76),
(9, 80),
(11, 94);

-- --------------------------------------------------------

--
-- Structure de la table `non_boursier`
--

CREATE TABLE `non_boursier` (
  `id_etudiant` int(11) NOT NULL,
  `adresse` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `non_boursier`
--

INSERT INTO `non_boursier` (`id_etudiant`, `adresse`) VALUES
(15, 'hlm grand yoff'),
(25, 'keur gor'),
(42, 'zone sud');

-- --------------------------------------------------------

--
-- Structure de la table `type_boursier`
--

CREATE TABLE `type_boursier` (
  `id_type` int(11) NOT NULL,
  `libellé` varchar(111) NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_boursier`
--

INSERT INTO `type_boursier` (`id_type`, `libellé`, `montant`) VALUES
(1, 'demi pension', 20000),
(2, 'pension', 40000);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`id_batiment`);

--
-- Index pour la table `boursier`
--
ALTER TABLE `boursier`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_batiment` (`id_batiment`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `loger`
--
ALTER TABLE `loger`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `non_boursier`
--
ALTER TABLE `non_boursier`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `type_boursier`
--
ALTER TABLE `type_boursier`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `id_batiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `boursier`
--
ALTER TABLE `boursier`
  ADD CONSTRAINT `boursier_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type_boursier` (`id_type`),
  ADD CONSTRAINT `boursier_ibfk_3` FOREIGN KEY (`id_etudiant`) REFERENCES `ETUDIANT` (`id_etudiant`);

--
-- Contraintes pour la table `loger`
--
ALTER TABLE `loger`
  ADD CONSTRAINT `loger_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `ETUDIANT` (`id_etudiant`),
  ADD CONSTRAINT `loger_ibfk_2` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`);

--
-- Contraintes pour la table `non_boursier`
--
ALTER TABLE `non_boursier`
  ADD CONSTRAINT `non_boursier_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `ETUDIANT` (`id_etudiant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
