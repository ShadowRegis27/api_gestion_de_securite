-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 oct. 2023 à 18:49
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetagl`
--

-- --------------------------------------------------------

--
-- Structure de la table `priorite_incidents`
--

DROP TABLE IF EXISTS `priorite_incidents`;
CREATE TABLE IF NOT EXISTS `priorite_incidents` (
  `id_Priorite_Incident` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_Priorite_Incident` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_Priorite_Incident` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_Priorite_Incident`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `priorite_incidents`
--

INSERT INTO `priorite_incidents` (`id_Priorite_Incident`, `nom_Priorite_Incident`, `niveau_Priorite_Incident`, `created_at`, `updated_at`) VALUES
(1, 'Faible', '1', '2023-10-24 13:06:47', '2023-10-24 13:06:47'),
(2, 'Moyen', '2', '2023-10-24 13:07:15', '2023-10-24 13:07:15'),
(3, 'Grave', '3', '2023-10-24 16:59:53', '2023-10-24 16:59:53'),
(4, 'Urgent', '4', '2023-10-24 17:09:00', '2023-10-24 17:09:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
