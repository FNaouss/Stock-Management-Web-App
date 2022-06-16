-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 jan. 2022 à 20:54
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `virgin`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id_prod` int(11) NOT NULL,
  `id_achat` int(11) NOT NULL,
  `qte_achat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`id_prod`, `id_achat`, `qte_achat`) VALUES
(16, 118, 1),
(16, 122, 2),
(16, 126, 2),
(16, 128, 1),
(17, 122, 2),
(17, 130, 1),
(18, 118, 1),
(18, 125, 2),
(18, 126, 3),
(18, 128, 1);

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement`
--

CREATE TABLE `approvisionnement` (
  `id_achat` int(11) NOT NULL,
  `date_ach` date DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `approvisionnement`
--

INSERT INTO `approvisionnement` (`id_achat`, `date_ach`, `id_fournisseur`) VALUES
(115, '2000-07-11', 6),
(116, '2000-07-11', 6),
(117, '2000-07-11', 6),
(118, '2021-12-10', 6),
(119, '2021-12-10', 6),
(120, '2021-12-10', 6),
(121, '2021-12-10', 6),
(122, '2001-01-01', 6),
(123, '2001-01-01', 6),
(124, '2001-01-01', 6),
(125, '2001-02-02', 6),
(126, '2023-02-12', 6),
(127, '2023-02-12', 6),
(128, '2017-12-17', 6),
(129, '2017-12-17', 6),
(130, '2017-12-17', 6);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `designation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `designation`) VALUES
(1, 'Informatique'),
(2, 'Mobile'),
(3, 'Livres'),
(4, 'Son'),
(5, 'Consoles Gaming'),
(9, 'Jouets');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_cli` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `numTel` varchar(10) DEFAULT NULL,
  `Fidélité` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_cli`, `nom`, `email`, `adresse`, `numTel`, `Fidélité`) VALUES
(34, 'Soufiane', 'Soufiane@gmail.Com', 'Salé', '612345678', 7);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int(11) NOT NULL,
  `date_cmd` date DEFAULT NULL,
  `id_cli` int(11) DEFAULT NULL,
  `id_facture` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_cmd`, `date_cmd`, `id_cli`, `id_facture`) VALUES
(17, '2022-01-09', 34, 25),
(18, '2022-01-09', 34, 26),
(19, '2022-01-09', 34, 27),
(20, '2022-01-09', 34, 27),
(21, '2022-01-09', 34, 28),
(22, '2022-01-09', 34, 29),
(23, '2022-01-09', 34, 29),
(24, '2022-01-09', 34, 29),
(25, '2022-01-09', 34, 30),
(26, '2022-01-09', 34, 30),
(27, '2022-01-09', 34, 30),
(28, '2022-01-10', 34, 31),
(29, '2022-01-10', 34, 31),
(30, '2022-01-11', 34, 31),
(31, '2022-01-11', 34, 31),
(32, '2022-01-11', 34, 31),
(33, '2022-01-11', 34, 32),
(34, '2022-01-11', 34, 32),
(35, '2022-01-11', 34, 32),
(36, '2022-01-11', 34, 33),
(37, '2022-01-11', 34, 34),
(38, '2022-01-11', 34, 35);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_fact` int(11) NOT NULL,
  `date_fact` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id_fact`, `date_fact`) VALUES
(25, '2022-01-09'),
(26, '2022-01-09'),
(27, '2022-01-09'),
(28, '2022-01-09'),
(29, '2022-01-09'),
(30, '2022-01-09'),
(31, '2022-01-10'),
(32, '2022-01-11'),
(33, '2022-01-11'),
(34, '2022-01-11'),
(35, '2022-01-11');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `adresse` varchar(40) DEFAULT NULL,
  `num_tel` int(11) DEFAULT NULL,
  `Fidélité` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom`, `email`, `adresse`, `num_tel`, `Fidélité`) VALUES
(6, 'Mehdi', 'mehdi@gmail.Com', 'Casa', 59593, 6004);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_user`, `username`, `PASSWORD`) VALUES
(1, 'Nacer@gmail.com', 'Nacer');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProd` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `Qté` int(11) DEFAULT NULL,
  `prixAch` float DEFAULT NULL,
  `prixV` float DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProd`, `libelle`, `reference`, `Qté`, `prixAch`, `prixV`, `id_cat`, `photo`) VALUES
(16, 'iPhone 11 Pro Max', 'IP011PM', 12, 7000, 9000, 2, 'IP011PM.png'),
(17, 'HP EliteBook G3', 'PC000', 2, 2500, 4000, 1, 'PC000.png'),
(18, 'PS5', 'PS_005', 13, 7000, 9000, 5, 'PS_005.png');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `id_prod` int(11) NOT NULL,
  `id_cmd` int(11) NOT NULL,
  `qte_vente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id_prod`, `id_cmd`, `qte_vente`) VALUES
(16, 18, 5),
(16, 21, 5),
(16, 22, 10),
(16, 25, 2),
(16, 30, 1),
(16, 33, 2),
(16, 36, 1),
(16, 37, 1),
(16, 38, 2),
(17, 19, 10),
(17, 20, 5),
(17, 23, 5),
(17, 26, 3),
(17, 28, 1),
(17, 31, 1),
(17, 34, 1),
(18, 24, 5),
(18, 27, 1),
(18, 29, 2),
(18, 32, 1),
(18, 35, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_prod`,`id_achat`),
  ADD KEY `fk_idachat` (`id_achat`);

--
-- Index pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD PRIMARY KEY (`id_achat`),
  ADD KEY `fk_id_fourn` (`id_fournisseur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_cli`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `fk_idcli` (`id_cli`),
  ADD KEY `fk_idfact` (`id_facture`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_fact`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `fk_idcat` (`id_cat`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_prod`,`id_cmd`),
  ADD KEY `fk_idcmd` (`id_cmd`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  MODIFY `id_achat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_cmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_fact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `fk_idachat` FOREIGN KEY (`id_achat`) REFERENCES `approvisionnement` (`id_achat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idprod2` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`idProd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD CONSTRAINT `fk_id_fourn` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_idcli` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id_cli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idfact` FOREIGN KEY (`id_facture`) REFERENCES `facture` (`id_fact`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_idcat` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `fk_idcmd` FOREIGN KEY (`id_cmd`) REFERENCES `commande` (`id_cmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idprod` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`idProd`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
