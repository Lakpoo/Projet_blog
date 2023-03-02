-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 02 mars 2023 à 10:36
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exo_conn`
--

-- --------------------------------------------------------

--
-- Structure de la table `donnee_conn`
--

CREATE TABLE `donnee_conn` (
  `id_user` int NOT NULL,
  `degre_privilege` tinyint NOT NULL,
  `nom` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `donnee_conn`
--

INSERT INTO `donnee_conn` (`id_user`, `degre_privilege`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 1, 'admin', 'admin', 'admin@admin.com', '$2y$10$NIhhLTguthIV8w.1LT677.3.wkPFg3NdVtW.qRP.6kHv4PKH0OEk.'),
(3, 3, 'azerty', 'azerty', 'azerty@gmail.com', '$2y$10$691c8LgtxNrhBK1O/n3waeG9aL8mSY1aKyjV0YPp1nTIZHogP6urC'),
(4, 2, 'd', 'd', 'd@gmail.com', '$2y$10$N/Q4aQz0uvegiEtz7ZYVOOsS9BhuR5InI4tgmnKocNneEgAlP9lYy'),
(23, 2, 'test', 'test', 'test@test.test', '$2y$10$qKFWvfM0V7676YhFXsxSYeTnD.KhBN1C/1jQQdiC86vNijSVB2X0m'),
(25, 2, 'Kilian', 'Dominik', 'kiliandominik93@gmail.com', '$2y$10$6mI2iRiPMh31d7mnvIOaFO3is6KOliQ14Cp0wZA.Y6E7GeoQhkhmq');

-- --------------------------------------------------------

--
-- Structure de la table `post_blog`
--

CREATE TABLE `post_blog` (
  `id_post` int NOT NULL,
  `id_user` int NOT NULL,
  `title` varchar(60) NOT NULL,
  `contenue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auteur` varchar(40) NOT NULL,
  `log` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `post_blog`
--

INSERT INTO `post_blog` (`id_post`, `id_user`, `title`, `contenue`, `auteur`, `log`) VALUES
(80, 25, 'Ceci est un article test', 'Ici le contenue de ce magnifique article', 'Dominik', '1677712643'),
(81, 25, 'J\'ai envie de dormir', 'Oui je fini mon projet apres minuit et alors ?\r\n', 'Dominik', '1677712678'),
(82, 25, 'Football', 'Bayern va gagner contre le psg je le dit pour ceux qui ne le saurais pas ', 'Dominik', '1677712720'),
(85, 25, 'Bayern Munich', 'Le Bayern Munich est un club allemand fondé le 27 février 1900 et basé à Munich, en Bavière. L\'équipe joue depuis 1965 en Bundesliga et est le club européen le plus titré du 21e siècle (2e au monde).', 'Dominik', '1677712967');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `donnee_conn`
--
ALTER TABLE `donnee_conn`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `post_blog`
--
ALTER TABLE `post_blog`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `donnee_conn`
--
ALTER TABLE `donnee_conn`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `post_blog`
--
ALTER TABLE `post_blog`
  MODIFY `id_post` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
