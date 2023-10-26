-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 oct. 2023 à 18:48
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
-- Structure de la table `statu_incidents`
--

DROP TABLE IF EXISTS `statu_incidents`;
CREATE TABLE IF NOT EXISTS `statu_incidents` (
  `id_Statut_Incident` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_Statut_Incident` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_Statut_Incident`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statu_incidents`
--

INSERT INTO `statu_incidents` (`id_Statut_Incident`, `nom_Statut_Incident`, `created_at`, `updated_at`) VALUES
(1, 'Ouvert', '2023-10-24 17:10:39', '2023-10-24 17:10:39'),
(2, 'En cours', '2023-10-24 17:11:02', '2023-10-24 17:11:02'),
(3, 'Résolu', '2023-10-24 17:11:02', '2023-10-24 17:11:02'),
(4, 'Sortie', '2023-10-24 17:16:38', '2023-10-24 17:16:38'),
(5, 'Rentré', '2023-10-24 17:17:17', '2023-10-24 17:17:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
