-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 15 déc. 2020 à 15:51
-- Version du serveur :  5.7.30
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discussion`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(140) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES
(1, 'Salut la team comment ça va?', 39, '2020-12-04'),
(2, 'Comment ça va bande de moules?', 39, '2020-12-04'),
(3, 'J\'ai mal à la narine droite', 39, '2020-12-04'),
(4, 'PHP c\'est pas des lol', 39, '2020-12-04'),
(5, 'Qu\'est-ce qui est jaune et qui attends?', 40, '2020-12-04'),
(6, 'Mmmmh, Jonathan?', 41, '2020-12-04'),
(7, 'Salut la team!', 46, '2020-12-13'),
(8, 'Z\'êtes trop drôle', 47, '2020-12-13');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(30, 'Tarzan', '$2y$12$xA7cOiMiCT8u/nHDjJHhsuC3znYLWV0ft62UEDyV77FRu52xunWcq'),
(31, 'Leo', '$2y$12$OMX6aCT1T2wkkLUPE/FqG.U1uXj6L4soNk1gTJxt3lJW4rZEf/OTq'),
(32, 'Carotte', '$2y$12$P44TqKkrh0tF/67ui7jpLOE2jxmrGxPSY2BWiUEAhwh0qM7zSRq0G'),
(33, 'Antoine', '$2y$12$hb4LQdtG.IVQVhHtm1adBOEPCe8euFR618zd1k1Vdei0ba4ofgArG'),
(34, 'Léon', '$2y$12$SQqF04HnDt1/qrY2WjiZG.tK8OlyRNcP4cr7ldpo4iCQfaAxA2gVi'),
(35, 'Ali', '$2y$12$63LL4WXLonOtnK2KEjivRO8dwIQagUoA2b1DxWy1/OFp.RIdIhpzG'),
(38, 'Zozo', '$2y$12$WSUpzKEh.lBQ8f7PxozsieAlQq.rSD2CMjv5Icg7uBl8yhYQi8Iea'),
(39, 'Nuno', '$2y$12$6jH5fVpS3lJILsUz/jU3GeDy.AO2VF6vFJqMkZw7XoKic/UQ0qpn6'),
(40, 'Michel', '$2y$12$qDclL8Gm2y/S95GbIoFbYuQfN99zVV5yUji1GR/nEGCQy3kRiIuMy'),
(41, 'Zola', '$2y$12$3IS3ks0h1mPdiM7UsGoYiega2FGlenIwVG/Jy1WGiZrXUByZjPN6a'),
(42, 'Canard', '$2y$12$1WrObMiSSsOmwushXC0zsOnjoWqX2n1fLeNDSiDVg1q8nEiFyNCaq'),
(43, 'Hello', '$2y$12$kqJiQ.Yb2TGx6IKZX.QBCuToGeaJxqDkwE.s23EioxCm.S/eeiTDG'),
(44, 'Bonjour', '$2y$12$lwBNPMKvOFvLHaYA.QS43eTuPq3E0EfM6StAj/XNLr4y17hM3ZYxq'),
(45, 'Ruben', '$2y$12$PSBwWLaQcQLPE4yzKdtmMeaS7o7Q4b/NWo0syJUTMxNyby8oHYbJ6'),
(46, 'toreapat', '$2y$12$PxmK.SOY0ROhp/kthvYROe6QQzececYQ1eIJt9Biz2rC5HIGSieXy'),
(47, 'Michoubg', '$2y$12$/exakTNPCzw39Y7UniBP3.JAQ7RQqkgZg9V9z5TWoZDyJxmA9xPC6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
