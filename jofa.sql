-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 mai 2025 à 11:54
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jofa`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libAct` varchar(255) NOT NULL,
  `datePrev` date DEFAULT NULL,
  `dateFinAct` date DEFAULT NULL,
  `statut` varchar(255) NOT NULL,
  `etape_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`id`, `libAct`, `datePrev`, `dateFinAct`, `statut`, `etape_id`, `created_at`, `updated_at`) VALUES
(1, 'Identification des objectifs et des besoins spécifiques', NULL, NULL, 'Début', 1, NULL, NULL),
(2, 'Définition des critères de réussite et des indicateurs de performance', NULL, NULL, 'Début', 1, NULL, NULL),
(3, 'Validation des ressources nécessaires', NULL, NULL, 'Début', 1, NULL, NULL),
(4, 'Analyse détaillée des fonctionnalités', NULL, NULL, 'Début', 2, NULL, NULL),
(5, 'Rédaction des spécifications techniques et fonctionnelles', NULL, NULL, 'Début', 2, NULL, NULL),
(6, 'Validation des spécifications avec les parties prenantes', NULL, NULL, 'Début', 2, NULL, '2025-05-09 08:29:29'),
(7, 'Programmation des fonctionnalités conformément aux spécifications', NULL, NULL, 'Début', 3, NULL, NULL),
(8, 'Tests unitaires des modules développés', NULL, NULL, 'Début', 3, NULL, NULL),
(9, 'Intégration des différents composants du service', NULL, NULL, 'Début', 3, NULL, NULL),
(10, 'Préparation de l\'environnement de production', NULL, NULL, 'Début', 4, NULL, NULL),
(11, 'Installation et configuration', NULL, NULL, 'Début', 4, NULL, NULL),
(12, 'Vérification de la disponibilité et de la stabilité en production', NULL, NULL, 'Début', 4, NULL, NULL),
(13, 'Communication', NULL, NULL, 'Début', 5, NULL, NULL),
(14, 'Formation aux utilisateurs', NULL, NULL, 'Début', 5, NULL, NULL),
(15, 'évaluation continue de l\'adoption du changement', NULL, NULL, 'Début', 5, NULL, NULL),
(16, 'Accompagnement', NULL, NULL, 'Début', 5, NULL, NULL),
(17, 'collecte de feedbacks', NULL, NULL, 'Début', 5, NULL, NULL),
(18, 'ajustements nécessaires', NULL, NULL, 'Début', 5, NULL, NULL),
(19, 'collecte des données', NULL, NULL, 'Début', 6, NULL, NULL),
(20, 'identification des besoins', NULL, NULL, 'Début', 6, NULL, '0000-00-00 00:00:00'),
(21, 'validation du rapport d’état des lieux', NULL, NULL, 'Début', 6, NULL, NULL),
(22, 'définition de l’architecture logicielle', NULL, NULL, 'Début', 7, NULL, NULL),
(23, 'mise en place des interfaces utilisateurs', NULL, NULL, 'Début', 7, NULL, NULL),
(24, 'implémentation des fonctionnalités', NULL, NULL, 'Début', 7, NULL, NULL),
(25, 'définition des scénarios', NULL, NULL, 'Début', 8, NULL, NULL),
(26, 'exécution des scénarios', NULL, NULL, 'Début', 8, NULL, NULL),
(27, 'rapport de test', NULL, NULL, 'Début', 8, NULL, NULL),
(28, 'corrections des problèmes détectés lors des tests', NULL, NULL, 'Début', 9, NULL, NULL),
(29, 'préparation de l’environnement d’hébergement', NULL, NULL, 'Début', 10, NULL, NULL),
(30, 'installation', NULL, NULL, 'Début', 9, NULL, NULL),
(31, 'formation', NULL, NULL, 'Début', 11, NULL, NULL),
(32, 'surveillance des performances', NULL, NULL, 'Début', 12, NULL, NULL),
(33, 'correction des bugs', NULL, NULL, 'Début', 12, NULL, NULL),
(34, 'Communication', NULL, NULL, 'Début', 13, NULL, NULL),
(35, 'Formation aux utilisateurs', NULL, NULL, 'Début', 13, NULL, NULL),
(36, 'Accompagnement', NULL, NULL, 'Début', 13, NULL, NULL),
(37, 'évaluation continue de l\'adoption du changement', NULL, NULL, 'Début', 13, NULL, NULL),
(38, 'collecte de feedbacks', NULL, NULL, 'Début', 13, NULL, NULL),
(39, 'ajustements nécessaires', NULL, NULL, 'Début', 13, NULL, NULL),
(40, 'Analyse des exigences du système', NULL, NULL, 'Début', 14, NULL, '0000-00-00 00:00:00'),
(41, 'Planification des ressources nécessaires', NULL, NULL, 'Début', 14, NULL, NULL),
(42, 'Définition de l\'architecture de l\'infrastructure', NULL, NULL, 'Début', 15, NULL, NULL),
(43, 'Mise en place des composants matériels et logiciels nécessaires', NULL, NULL, 'Début', 15, NULL, NULL),
(44, 'Élaboration des schémas de conception', NULL, NULL, 'Début', 15, NULL, NULL),
(45, 'Identification des équipements nécessaires', NULL, NULL, 'Début', 16, NULL, NULL),
(46, 'Sélection des fournisseurs et des solutions logicielles', NULL, NULL, 'Début', 16, NULL, NULL),
(47, 'Acquisition des équipements et logiciels', NULL, NULL, 'Début', 16, NULL, NULL),
(48, 'Installation des équipements et logiciels', NULL, NULL, 'Début', 17, NULL, NULL),
(49, 'Configuration des composants pour assurer une intégration optimale', NULL, NULL, 'Début', 17, NULL, NULL),
(50, 'Vérification de la compatibilité entre les différents éléments', NULL, NULL, 'Début', 17, NULL, NULL),
(51, 'Définition des scénarios de test pour l\'infrastructure', NULL, NULL, 'Début', 18, NULL, NULL),
(52, 'Exécution des tests de fonctionnement', NULL, NULL, 'Début', 18, NULL, NULL),
(53, 'Rapport de test et correction des anomalies détectées', NULL, NULL, 'Début', 18, NULL, NULL),
(54, 'Mise en place de programmes de formation pour les utilisateurs et les administrateurs', NULL, NULL, 'Début', 19, NULL, NULL),
(55, 'Création de documentation technique et d\'utilisation', NULL, NULL, 'Début', 19, NULL, NULL),
(56, 'Formation du personnel sur l\'utilisation et la maintenance de l\'infrastructure', NULL, NULL, 'Début', 19, NULL, NULL),
(57, 'Communication', NULL, NULL, 'Début', 20, NULL, NULL),
(58, 'Accompagnement', NULL, NULL, 'Début', 20, NULL, NULL),
(59, 'évaluation continue de l\'adoption du changement', NULL, NULL, 'Début', 20, NULL, NULL),
(60, 'collecte de feedbacks', NULL, NULL, 'Début', 20, NULL, '0000-00-00 00:00:00'),
(61, 'ajustements nécessaires', NULL, NULL, 'Début', 13, NULL, NULL),
(62, 'Analyse des exigences du système', NULL, NULL, 'Début', 14, NULL, NULL),
(63, 'Planification des ressources nécessaires', NULL, NULL, 'Début', 14, NULL, NULL),
(64, 'Définition de l\'architecture de l\'infrastructure', NULL, NULL, 'Début', 15, NULL, NULL),
(65, 'Mise en place des composants matériels et logiciels nécessaires', NULL, NULL, 'Début', 15, NULL, NULL),
(66, 'Élaboration des schémas de conception', NULL, NULL, 'Début', 15, NULL, NULL),
(67, 'Identification des équipements nécessaires', NULL, NULL, 'Début', 16, NULL, NULL),
(68, 'Sélection des fournisseurs et des solutions logicielles', NULL, NULL, 'Début', 16, NULL, NULL),
(69, 'Acquisition des équipements et logiciels', NULL, NULL, 'Début', 15, NULL, NULL),
(70, 'Installation des équipements et logiciels', NULL, NULL, 'Début', 17, NULL, NULL),
(71, 'Configuration des composants pour assurer une intégration optimale', NULL, NULL, 'Début', 17, NULL, NULL),
(72, 'Vérification de la compatibilité entre les différents éléments', NULL, NULL, 'Début', 17, NULL, NULL),
(73, 'Définition des scénarios de test pour l\'infrastructure', NULL, NULL, 'Début', 18, NULL, NULL),
(74, 'Exécution des tests de fonctionnement', NULL, NULL, 'Début', 18, NULL, NULL),
(75, 'Rapport de test et correction des anomalies détectées', NULL, NULL, 'Début', 18, NULL, NULL),
(76, 'Mise en place de programmes de formation pour les utilisateurs et les administrateurs', NULL, NULL, 'Début', 19, NULL, NULL),
(77, 'Création de documentation technique et d\'utilisation', NULL, NULL, 'Début', 19, NULL, NULL),
(78, 'Formation du personnel sur l\'utilisation et la maintenance de l\'infrastructure', NULL, NULL, 'Début', 19, NULL, NULL),
(79, 'Communication', NULL, NULL, 'Début', 20, NULL, NULL),
(80, 'Accompagnement', NULL, NULL, 'Début', 20, NULL, NULL),
(81, 'évaluation continue de l\'adoption du changement', NULL, NULL, 'Début', 20, NULL, NULL),
(82, 'collecte de feedbacks', NULL, NULL, 'Début', 20, NULL, NULL),
(83, 'ajustements nécessaires', NULL, NULL, 'Début', 20, NULL, NULL),
(84, 'Recherche exhaustive et analyse critique des travaux existants dans le domaine d\'étude', NULL, NULL, 'Début', 21, NULL, NULL),
(85, 'Synthèse des connaissances actuelles et identification des lacunes', NULL, NULL, 'Début', 21, NULL, NULL),
(86, 'Évaluation des Forces', NULL, NULL, 'Début', 22, NULL, NULL),
(87, 'Faiblesses', NULL, NULL, 'Début', 22, NULL, NULL),
(88, 'Opportunités et Menaces liées à l\'objet d\'étude', NULL, NULL, 'Début', 22, NULL, NULL),
(89, 'Analyse de risques', NULL, NULL, 'Début', 22, NULL, NULL),
(90, 'Développement de différents scénarios possibles en fonction des résultats de l\'analyse SWOT', NULL, NULL, 'Début', 23, NULL, NULL),
(91, 'Modélisation des impacts potentiels de chaque scénario sur le projet', NULL, NULL, 'Début', 23, NULL, NULL),
(92, 'Formulation d\'un plan d\'action détaillé basé sur les scénarios envisagés', NULL, NULL, 'Début', 24, NULL, NULL),
(93, 'Définition des indicateurs de suivi', NULL, NULL, 'Début', 24, NULL, NULL),
(94, 'Assignation des responsabilités et des ressources nécessaires à chaque étape du plan', NULL, NULL, 'Début', 24, NULL, NULL),
(95, 'Implémentation des actions définies dans le plan d\'action', NULL, NULL, 'Début', 25, NULL, NULL),
(96, 'Surveillance continue des progrès réalisés', NULL, NULL, 'Début', 25, NULL, NULL),
(97, 'Ajustement du plan en fonction des résultats obtenus', NULL, NULL, 'Début', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libCat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libCat`, `created_at`, `updated_at`) VALUES
(1, 'E-services ', NULL, NULL),
(2, 'Développement logiciel ', NULL, NULL),
(3, 'Infrastructure numérique ', NULL, NULL),
(4, 'Etudes', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomDoc` varchar(255) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE `etapes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libEtape` varchar(255) NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etapes`
--

INSERT INTO `etapes` (`id`, `libEtape`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'Initialisation', 1, NULL, NULL),
(2, 'Spécification', 1, NULL, NULL),
(3, 'Développement', 1, NULL, NULL),
(4, 'Exploitation', 1, NULL, NULL),
(5, 'Conduite du changement ', 1, NULL, NULL),
(6, 'Analyse des besoins ', 2, NULL, NULL),
(7, 'Conception', 2, NULL, NULL),
(8, 'Tests ', 2, NULL, NULL),
(9, 'Intégration ', 2, NULL, NULL),
(10, 'Exploitation ', 2, NULL, NULL),
(11, 'Formation ', 2, NULL, NULL),
(12, 'Maintenance ', 2, NULL, NULL),
(13, 'Conduite du changement ', 2, NULL, NULL),
(14, 'Évaluation des besoins et planification ', 3, NULL, NULL),
(15, 'Conception de l’infrastructure ', 3, NULL, NULL),
(16, 'Acquisitions des équipements et logiciels ', 3, NULL, NULL),
(17, 'Intégration/Exploitation ', 3, NULL, NULL),
(18, 'Test de fonctionnement ', 3, NULL, NULL),
(19, 'Formation et documentation ', 3, NULL, NULL),
(20, 'Conduite du changement ', 3, NULL, NULL),
(21, 'Revues de la littérature ', 4, NULL, NULL),
(22, 'Analyse SWOT ', 4, NULL, NULL),
(23, 'Élaboration de scénarios ', 4, NULL, NULL),
(24, 'Élaboration du plan d\'action ', 4, NULL, NULL),
(25, 'Mise en œuvre et suivi ', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `financements`
--

CREATE TABLE `financements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libFinancement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_roles_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_02_000000_create_users_table', 1),
(5, '2025_04_01_091604_create_typedocs_table', 1),
(6, '2025_04_01_091816_create_prestataires_table', 1),
(7, '2025_04_01_091849_create_categories_table', 1),
(8, '2025_04_01_091922_create_programmes_table', 1),
(9, '2025_04_01_092002_create_etapes_table', 1),
(10, '2025_04_01_092018_create_activites_table', 1),
(11, '2025_04_01_092253_create_structures_table', 1),
(12, '2025_04_01_092336_create_statuts_projets_table', 1),
(13, '2025_04_01_092337_create_financements_table', 1),
(20, '2025_04_01_092338_create_projets_table', 2),
(21, '2025_04_01_092411_create_reunions_table', 2),
(22, '2025_04_01_092412_create_documents_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE `prestataires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `nomStructure` varchar(255) NOT NULL,
  `nomResponsable` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prestataires`
--

INSERT INTO `prestataires` (`id`, `code`, `nomStructure`, `nomResponsable`, `email`, `telephone`, `created_at`, `updated_at`) VALUES
(3, 'lkjhgfdsdfghjk', 'jhgfdswxdcfvgbhnjk,jhgfcdxswqwsxdfcgvbhnj', 'hgfvbn', 'seUUIK@gmail.com', '1234567890234567890', '2025-05-15 08:00:04', '2025-05-15 08:00:04'),
(4, 'da112', 'OIUYTREQQSYUIOPPOIUYTRA4567890°987YTREZARTG', 'hgfvbn', 'joOIUYTDDFK@gmail.com', '23456789O63456789', '2025-05-15 08:04:28', '2025-05-15 08:04:28'),
(6, 'fghjk', 'kjhgfdsqazertyujklmùmytrezqsdfghjknbvghbvhgv', 'mmommm', 'sennnn@gmail.com', '23456789O63456789', '2025-05-15 08:25:59', '2025-05-15 08:25:59'),
(7, 'HHHHH', 'MLKJHGFDSQSDFGHJKOPOIUYTRESGHJKLKJHGF', 'LOLO', 'chefkjhgfjnbvgjhghg@gmail.com', '09876543234567890', '2025-05-15 08:27:53', '2025-05-15 08:27:53');

-- --------------------------------------------------------

--
-- Structure de la table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `libProg` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `libProj` varchar(255) NOT NULL,
  `objectifs` text NOT NULL,
  `resAttendu` text NOT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `prestataire_id` bigint(20) UNSIGNED NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL,
  `structure_initiatrice_id` bigint(20) UNSIGNED NOT NULL,
  `structure_beneficiaire_id` bigint(20) UNSIGNED NOT NULL,
  `financement_id` bigint(20) UNSIGNED NOT NULL,
  `PTF` varchar(255) DEFAULT NULL,
  `statuts_projet_id` bigint(20) UNSIGNED NOT NULL,
  `chef_projet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reunions`
--

CREATE TABLE `reunions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `odreJour` varchar(255) NOT NULL,
  `compteRendu` text NOT NULL,
  `dateReunion` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libRole` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `libRole`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', NULL, NULL),
(2, 'Responsable', NULL, NULL),
(3, 'Directeur', NULL, NULL),
(4, 'ChefProjet', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9BGAAf7F8X1oHAHOUJdk1aMbAz0IY94HhzNJ6aRV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidTJqV1U4bTA2aGIzRkdQYWVRSURaWklDQVZLUE5KRHZNR29SQUQxcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9saXN0L3ByZXN0YXRhaXJlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1747301685);

-- --------------------------------------------------------

--
-- Structure de la table `statuts_projets`
--

CREATE TABLE `statuts_projets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `structures`
--

CREATE TABLE `structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `libStruc` varchar(255) NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typedocs`
--

CREATE TABLE `typedocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libtype` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `statut` enum('Actif','Inactif') NOT NULL DEFAULT 'Actif',
  `url_photo` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `email_verified_at`, `telephone`, `password`, `is_delete`, `statut`, `url_photo`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MOUSTAPHA', 'Faikoth', 'fa@gmail.com', NULL, '23456789987654323', '$2y$12$FT3GHitf92axzJNlIweX/eDU/.kNsgmUwu7d1gzTjnjNQ0.GZY7HW', 0, 'Actif', NULL, 1, NULL, NULL, NULL),
(2, 'SAGBO', 'Joseph', 'jo@gmail.com', NULL, '345678987654567', '$2y$12$FT3GHitf92axzJNlIweX/eDU/.kNsgmUwu7d1gzTjnjNQ0.GZY7HW', 0, 'Actif', NULL, 3, NULL, NULL, NULL),
(3, 'SONON', 'Sabin', 'sa@gmail.com', NULL, '345678765434567', '$2y$12$FT3GHitf92axzJNlIweX/eDU/.kNsgmUwu7d1gzTjnjNQ0.GZY7HW', 0, 'Actif', NULL, 2, NULL, NULL, '2025-05-15 07:49:59'),
(4, 'BOBO', 'Junior', 'chef@gmail.com', NULL, '2345678765434765', '$2y$12$FT3GHitf92axzJNlIweX/eDU/.kNsgmUwu7d1gzTjnjNQ0.GZY7HW', 0, 'Actif', NULL, 4, NULL, NULL, '2025-05-15 07:57:57');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activites_etape_id_foreign` (`etape_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_libcat_unique` (`libCat`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_type_id_foreign` (`type_id`),
  ADD KEY `documents_projet_id_foreign` (`projet_id`);

--
-- Index pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etapes_categorie_id_foreign` (`categorie_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `financements`
--
ALTER TABLE `financements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `prestataires`
--
ALTER TABLE `prestataires`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prestataires_code_unique` (`code`),
  ADD UNIQUE KEY `prestataires_nomstructure_unique` (`nomStructure`),
  ADD UNIQUE KEY `prestataires_email_unique` (`email`);

--
-- Index pour la table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programmes_code_unique` (`code`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projets_code_unique` (`code`),
  ADD KEY `projets_categorie_id_foreign` (`categorie_id`),
  ADD KEY `projets_prestataire_id_foreign` (`prestataire_id`),
  ADD KEY `projets_programme_id_foreign` (`programme_id`),
  ADD KEY `projets_structure_initiatrice_id_foreign` (`structure_initiatrice_id`),
  ADD KEY `projets_structure_beneficiaire_id_foreign` (`structure_beneficiaire_id`),
  ADD KEY `projets_financement_id_foreign` (`financement_id`),
  ADD KEY `projets_statuts_projet_id_foreign` (`statuts_projet_id`),
  ADD KEY `projets_chef_projet_id_foreign` (`chef_projet_id`);

--
-- Index pour la table `reunions`
--
ALTER TABLE `reunions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reunions_projet_id_foreign` (`projet_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `statuts_projets`
--
ALTER TABLE `statuts_projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `structures_code_unique` (`code`),
  ADD KEY `structures_programme_id_foreign` (`programme_id`);

--
-- Index pour la table `typedocs`
--
ALTER TABLE `typedocs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `financements`
--
ALTER TABLE `financements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `prestataires`
--
ALTER TABLE `prestataires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reunions`
--
ALTER TABLE `reunions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `statuts_projets`
--
ALTER TABLE `statuts_projets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `structures`
--
ALTER TABLE `structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typedocs`
--
ALTER TABLE `typedocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activites`
--
ALTER TABLE `activites`
  ADD CONSTRAINT `activites_etape_id_foreign` FOREIGN KEY (`etape_id`) REFERENCES `etapes` (`id`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `typedocs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD CONSTRAINT `etapes_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `projets_chef_projet_id_foreign` FOREIGN KEY (`chef_projet_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projets_financement_id_foreign` FOREIGN KEY (`financement_id`) REFERENCES `financements` (`id`),
  ADD CONSTRAINT `projets_prestataire_id_foreign` FOREIGN KEY (`prestataire_id`) REFERENCES `prestataires` (`id`),
  ADD CONSTRAINT `projets_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`),
  ADD CONSTRAINT `projets_statuts_projet_id_foreign` FOREIGN KEY (`statuts_projet_id`) REFERENCES `statuts_projets` (`id`),
  ADD CONSTRAINT `projets_structure_beneficiaire_id_foreign` FOREIGN KEY (`structure_beneficiaire_id`) REFERENCES `structures` (`id`),
  ADD CONSTRAINT `projets_structure_initiatrice_id_foreign` FOREIGN KEY (`structure_initiatrice_id`) REFERENCES `structures` (`id`);

--
-- Contraintes pour la table `reunions`
--
ALTER TABLE `reunions`
  ADD CONSTRAINT `reunions_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`);

--
-- Contraintes pour la table `structures`
--
ALTER TABLE `structures`
  ADD CONSTRAINT `structures_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
