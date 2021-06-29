-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 juin 2021 à 11:49
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jebouquine`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `codeAuteur` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cartebancaire`
--

CREATE TABLE `cartebancaire` (
  `codeCarte` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `numero` int(11) NOT NULL,
  `dateValide` date NOT NULL,
  `codeClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `codeClient` int(11) NOT NULL,
  `nomCl` varchar(20) NOT NULL,
  `prenomCl` varchar(20) NOT NULL,
  `adressCl` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `codeCmd` int(11) NOT NULL,
  `dateCmd` date NOT NULL,
  `modePaiment` varchar(10) NOT NULL,
  `AdressLivraison` varchar(20) NOT NULL,
  `codeCarte` int(11) NOT NULL,
  `delaiLivraison` date NOT NULL,
  `fraitDePort` float NOT NULL,
  `montantTotal` float NOT NULL,
  `codeClient` int(11) NOT NULL,
  `codePanier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `codeEditeur` int(11) NOT NULL,
  `nomEd` varchar(15) NOT NULL,
  `pays` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`codeEditeur`, `nomEd`, `pays`) VALUES
(1, 'John Wild', 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `est-ecrit-par`
--

CREATE TABLE `est-ecrit-par` (
  `codeAuteur` int(11) NOT NULL,
  `codeLivre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lignepanier`
--

CREATE TABLE `lignepanier` (
  `codeLigne` int(8) NOT NULL,
  `qte` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `codePanier` int(11) NOT NULL,
  `codeLivre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `codeLivre` int(11) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `sousTitre` varchar(50) NOT NULL,
  `ISBN` int(10) NOT NULL,
  `langue` varchar(10) NOT NULL,
  `rank` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `etat` varchar(10) NOT NULL,
  `promo` int(11) NOT NULL,
  `date` date NOT NULL,
  `prix` float NOT NULL,
  `path` varchar(500) NOT NULL,
  `codeEditeur` int(11) NOT NULL,
  `codeTH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`codeLivre`, `titre`, `sousTitre`, `ISBN`, `langue`, `rank`, `description`, `etat`, `promo`, `date`, `prix`, `path`, `codeEditeur`, `codeTH`) VALUES
(1, 'Batman Book', 'a', 1212121212, 'English', 3, 'lorem ipsum dollar site lorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar site', 'New', 20, '2021-05-03', 18.5, 'img/book/book1.jpg', 1, 1),
(3, 'Design Pattern', 'design', 1234567891, 'English', 1, '', 'Old', 30, '2020-07-30', 20, 'img/book/book4.jpg', 1, 2),
(5, 'James May Oh Cook !', 'toto', 1254125412, 'English', 4, '', 'New', 10, '2019-06-05', 42, 'img/book/book2.png', 1, 2),
(6, 'Comment développer a', 'toto', 1251251451, 'French', 4, '', 'old', 50, '2018-08-04', 100, 'img/book/book13.jpg', 1, 1),
(8, 'Tourisme Management', 'ta', 1237894581, 'English', 0, '', 'old', 0, '2021-05-29', 80, 'img/book/book9.jpg', 1, 2),
(9, 'A Bite-Sized History', 'A Bite-Sized History of France', 12121212, 'english', 4, 'lorem ipsum dollar site lorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar site', 'new', 20, '2015-10-08', 23.25, 'img/book/book14.jpg\r\n', 1, 3),
(11, 'A History of Austral', 'A History of Australia', 12121212, 'english', 4, 'lorem ipsum dollar site lorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar site', 'new', 20, '2012-12-13', 8.3, 'img/book/book15.jpg\r\n', 1, 3),
(12, 'Science Encyclopedia', 'Science Encyclopedia', 12121212, 'english', 3, 'lorem ipsum dollar site lorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar site', 'old', 30, '2016-05-05', 45.3, 'img\\book\\book16.jpg', 1, 6),
(13, 'The Science of Inter', 'The Science of Interstellar', 12121212, 'english', 4, 'lorem ipsum dollar site lorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar site', 'new', 30, '2018-02-05', 8.3, 'img\\book\\book17.jpg', 1, 6),
(14, 'Colette. I Only Want', 'Colette. I Only Want to be With You', 12121212, 'english', 4, 'lorem ipsum dollar site lorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar site', 'new', 30, '2011-06-09', 40.3, 'img/book/book18.jpg\r\n', 1, 7),
(15, 'programming c# 8.0', 'programming c# 8.0', 12121212, 'english', 3, 'lorem ipsum dollar site lorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar site', 'new', 30, '2021-06-06', 8.3, 'img/book/book8.jpg', 1, 5),
(16, 'Spider-Man Bleu', 'Spider-Man Bleu', 12121212, 'english', 4, 'lorem ipsum dollar site lorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar sitelorem ipsum dollar site', 'new', 30, '2021-06-06', 5.99, 'img/book/book19.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `CodePanier` int(11) NOT NULL,
  `total` float NOT NULL,
  `nombre_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `codeTheme` int(11) NOT NULL,
  `nomTh` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`codeTheme`, `nomTh`) VALUES
(1, 'Comic'),
(2, 'Design'),
(3, 'history'),
(5, 'programming'),
(6, 'science'),
(7, 'romance');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`codeAuteur`);

--
-- Index pour la table `cartebancaire`
--
ALTER TABLE `cartebancaire`
  ADD PRIMARY KEY (`codeCarte`,`numero`),
  ADD KEY `codeClient` (`codeClient`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`codeClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`codeCmd`),
  ADD KEY `codePanier` (`codePanier`),
  ADD KEY `codeClient` (`codeClient`),
  ADD KEY `codeCarte` (`codeCarte`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`codeEditeur`);

--
-- Index pour la table `est-ecrit-par`
--
ALTER TABLE `est-ecrit-par`
  ADD PRIMARY KEY (`codeAuteur`,`codeLivre`),
  ADD KEY `codeAuteur` (`codeAuteur`),
  ADD KEY `codeLivre` (`codeLivre`);

--
-- Index pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  ADD PRIMARY KEY (`codeLigne`),
  ADD KEY `codePanier` (`codePanier`),
  ADD KEY `codeLivre` (`codeLivre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`codeLivre`),
  ADD KEY `codeEditeur` (`codeEditeur`),
  ADD KEY `codeTH` (`codeTH`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`CodePanier`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`codeTheme`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `codeAuteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cartebancaire`
--
ALTER TABLE `cartebancaire`
  MODIFY `codeCarte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `codeClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `codeCmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `codeEditeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  MODIFY `codeLigne` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `codeLivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `CodePanier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `codeTheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cartebancaire`
--
ALTER TABLE `cartebancaire`
  ADD CONSTRAINT `cartebancaire_ibfk_1` FOREIGN KEY (`codeClient`) REFERENCES `client` (`codeClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`codePanier`) REFERENCES `panier` (`CodePanier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`codeClient`) REFERENCES `client` (`codeClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_3` FOREIGN KEY (`codeCarte`) REFERENCES `cartebancaire` (`codeCarte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `est-ecrit-par`
--
ALTER TABLE `est-ecrit-par`
  ADD CONSTRAINT `est-ecrit-par_ibfk_1` FOREIGN KEY (`codeAuteur`) REFERENCES `auteur` (`codeAuteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `est-ecrit-par_ibfk_2` FOREIGN KEY (`codeLivre`) REFERENCES `livre` (`codeLivre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lignepanier`
--
ALTER TABLE `lignepanier`
  ADD CONSTRAINT `lignepanier_ibfk_1` FOREIGN KEY (`codePanier`) REFERENCES `panier` (`CodePanier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lignepanier_ibfk_2` FOREIGN KEY (`codeLivre`) REFERENCES `livre` (`codeLivre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`codeEditeur`) REFERENCES `editeur` (`codeEditeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livre_ibfk_2` FOREIGN KEY (`codeTH`) REFERENCES `theme` (`codeTheme`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
