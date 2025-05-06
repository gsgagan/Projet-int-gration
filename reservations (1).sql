-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 13 avr. 2025 à 19:53
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservations`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste_type`
--

CREATE TABLE `artiste_type` (
  `id` int(11) NOT NULL,
  `artist_id_id` int(11) DEFAULT NULL,
  `type_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artiste_type`
--

INSERT INTO `artiste_type` (`id`, `artist_id_id`, `type_id_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 2),
(5, 1, 3),
(6, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `artiste_type_show`
--

CREATE TABLE `artiste_type_show` (
  `id` int(11) NOT NULL,
  `artiste_type_id_id` int(11) DEFAULT NULL,
  `show_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artiste_type_show`
--

INSERT INTO `artiste_type_show` (`id`, `artiste_type_id_id`, `show_id_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id`, `firstname`, `lastname`) VALUES
(1, 'Gagan', 'Singh'),
(2, 'lilian', 'thuram'),
(3, 'fabrice', 'davoix'),
(4, 'Yass', 'Dashing'),
(5, 'patrick', 'bru'),
(6, 'daniel', 'spa'),
(7, 'lara', 'croft'),
(8, 'songoku', 'dragon'),
(9, 'dragon', 'ball');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250405221204', '2025-04-05 22:12:08', 30),
('DoctrineMigrations\\Version20250406002444', '2025-04-06 00:24:55', 51),
('DoctrineMigrations\\Version20250406002839', '2025-04-06 00:28:41', 45),
('DoctrineMigrations\\Version20250406003706', '2025-04-06 00:37:07', 48),
('DoctrineMigrations\\Version20250406004254', '2025-04-06 00:42:59', 40),
('DoctrineMigrations\\Version20250406005131', '2025-04-06 00:51:33', 48),
('DoctrineMigrations\\Version20250406005455', '2025-04-06 00:55:00', 68),
('DoctrineMigrations\\Version20250406005656', '2025-04-06 00:56:59', 237),
('DoctrineMigrations\\Version20250406010453', '2025-04-06 01:04:55', 96),
('DoctrineMigrations\\Version20250406010714', '2025-04-06 01:07:17', 24),
('DoctrineMigrations\\Version20250406060411', '2025-04-06 06:04:14', 64),
('DoctrineMigrations\\Version20250406150634', '2025-04-06 15:07:20', 170),
('DoctrineMigrations\\Version20250406171319', '2025-04-06 17:13:40', 65),
('DoctrineMigrations\\Version20250406172254', '2025-04-06 17:23:11', 38),
('DoctrineMigrations\\Version20250406174935', '2025-04-06 17:49:45', 20),
('DoctrineMigrations\\Version20250406175528', '2025-04-06 17:55:43', 130),
('DoctrineMigrations\\Version20250410154059', '2025-04-10 15:41:36', 74),
('DoctrineMigrations\\Version20250410154521', '2025-04-10 15:45:31', 18),
('DoctrineMigrations\\Version20250410154739', '2025-04-10 15:47:50', 21),
('DoctrineMigrations\\Version20250410155707', '2025-04-10 15:57:17', 15),
('DoctrineMigrations\\Version20250410160124', '2025-04-10 16:01:32', 60),
('DoctrineMigrations\\Version20250410160611', '2025-04-10 16:06:19', 52),
('DoctrineMigrations\\Version20250410160739', '2025-04-10 16:07:49', 34),
('DoctrineMigrations\\Version20250410162138', '2025-04-10 16:21:47', 56),
('DoctrineMigrations\\Version20250410162925', '2025-04-10 16:29:33', 43),
('DoctrineMigrations\\Version20250410163343', '2025-04-10 16:33:50', 52),
('DoctrineMigrations\\Version20250410163816', '2025-04-10 16:38:24', 82),
('DoctrineMigrations\\Version20250410164154', '2025-04-10 16:42:07', 64),
('DoctrineMigrations\\Version20250410164523', '2025-04-10 16:45:31', 30),
('DoctrineMigrations\\Version20250410164746', '2025-04-10 16:47:54', 86),
('DoctrineMigrations\\Version20250410171617', '2025-04-10 17:16:26', 56),
('DoctrineMigrations\\Version20250410211036', '2025-04-10 21:11:19', 751),
('DoctrineMigrations\\Version20250413154324', '2025-04-13 15:43:35', 69);

-- --------------------------------------------------------

--
-- Structure de la table `localities`
--

CREATE TABLE `localities` (
  `id` int(11) NOT NULL,
  `postal_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `localities`
--

INSERT INTO `localities` (`id`, `postal_code`, `locality`) VALUES
(1, '1070', 'Anderlecht'),
(2, '1080', 'Molenbeek'),
(3, '1000', 'Bruxelles'),
(4, '1200', 'Paris'),
(5, '120990', 'Budapest'),
(6, '9011', 'Londres'),
(7, '11', 'New-york');

-- --------------------------------------------------------

--
-- Structure de la table `locality`
--

CREATE TABLE `locality` (
  `id` int(11) NOT NULL,
  `postal_code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `locality_id` int(11) DEFAULT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `locations`
--

INSERT INTO `locations` (`id`, `slug`, `designation`, `address`, `website`, `phone`, `locality_id`) VALUES
(1, 'notre-decription', 'notre decription', 'Rue memling 47, 1070 Anderlecht', 'www.google.com', '0480000000', 1),
(2, 'rue-du-progres-55', 'Rue du progrès 55', 'Rue du progrès 55', 'www.google.com', '0444444444', 2),
(3, 'grand-place', 'grand place', 'rue grand place 45', 'www.grand-place.com', '04I8233423', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prices`
--

INSERT INTO `prices` (`id`, `type`, `price`, `start_date`, `end_date`) VALUES
(1, 'type', '50.00', '2025-04-11', '2025-04-18'),
(2, 'VIP', '100.00', '2025-05-16', '2025-05-17'),
(3, 'VVIP', '1000.00', '2025-06-08', '2025-06-29');

-- --------------------------------------------------------

--
-- Structure de la table `representations`
--

CREATE TABLE `representations` (
  `id` int(11) NOT NULL,
  `showshow_id_id` int(11) DEFAULT NULL,
  `location_id_id` int(11) DEFAULT NULL,
  `schedule` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `representations`
--

INSERT INTO `representations` (`id`, `showshow_id_id`, `location_id_id`, `schedule`) VALUES
(1, 1, 2, '2025-04-10 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `representation_reservation`
--

CREATE TABLE `representation_reservation` (
  `id` int(11) NOT NULL,
  `representation_id_id` int(11) DEFAULT NULL,
  `reservation_id_id` int(11) DEFAULT NULL,
  `price_id_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `representation_reservation`
--

INSERT INTO `representation_reservation` (`id`, `representation_id_id`, `reservation_id_id`, `price_id_id`, `quantity`) VALUES
(1, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) DEFAULT NULL,
  `booking_date` datetime NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id_id`, `booking_date`, `status`) VALUES
(1, 3, '2025-04-12 20:06:42', 'paid');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) DEFAULT NULL,
  `show_id_id` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) NOT NULL,
  `validated` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role_id_id` int(11) DEFAULT NULL,
  `user_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `slug` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `created_in` int(11) NOT NULL,
  `bookable` tinyint(1) NOT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id_id` int(11) DEFAULT NULL,
  `promoted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shows`
--

INSERT INTO `shows` (`id`, `slug`, `title`, `poster_url`, `duration`, `created_in`, `bookable`, `short_desc`, `description`, `location_id_id`, `promoted`) VALUES
(1, 'nouveau-spectacle', 'La légende de l’Enchanteur', '2025-04-12-ea1c5d106ce956e64dad5c988a23d36140873954.png', 90, 2025, 1, 'Chanteuse énergique sous les projecteurs en pleine performance.', 'Un décor féérique aux accents médiévaux sert de cadre à La légende de l’Enchanteur, un conte théâtral et musical qui mêle mystère, magie et émotions. Dans cette scène captivante, une héroïne élève la voix face au destin, éclairée par une lumière chaude évoquant la flamme intérieure du personnage principal.', 1, 1),
(2, 'azerty', 'Le Grand Silence', '2025-04-12-666393f104f8ba51477c3a1e4dd21b0a4e7380d0.png', 60, 2025, 0, 'Projection d’ombres dans un spectacle visuel contemporain.', 'Le Grand Silence explore la poésie de l\'absence à travers un jeu d\'ombres, de silhouettes et de compositions sonores. Une mise en scène minimaliste, en noir et blanc, qui laisse toute la place à l’interprétation et à l’imaginaire du spectateur. Un spectacle sensible et profondément visuel, où chaque silence compte.', 2, 0),
(3, 'leveil-des-muses', 'L’éveil des Muses', '2025-04-12-02b10ee16a329d615e7fc1b99fd174837319b242.png', 145, 2025, 1, 'Un artiste seul sur scène sous un jeu de lumières captivant.', 'Un artiste se tient au centre de la scène, baigné dans une lumière dramatique bleue et rose, créant une ambiance électrisante. L’arrière-plan flou évoque un public captivé, soulignant l’intensité du moment.', 2, 0),
(4, 'danseurs-en-pleine-performance', 'Danseurs en pleine performance', '2025-04-12-979892a0ad6657dde3d4f2e061cd0f70d784913d.png', 123, 2025, 1, 'Duo de danseurs modernes dans une chorégraphie intense.', 'Deux danseurs évoluent en parfaite synchronisation sur une scène sombre, illuminée par des projecteurs rasants. Leurs corps expriment émotion, passion et puissance, capturant l’essence du mouvement.', NULL, 0),
(5, 'theatre-classique', 'Théâtre classique', '2025-04-12-2796f31ed214bd1a3b385323dcaf374460beed62.png', 100, 1992, 1, 'Rideau rouge prêt à s’ouvrir dans un théâtre élégant.', 'L’image montre l’instant suspendu avant le début d’un spectacle, avec un rideau rouge velours, un éclairage tamisé et une scène vide, emplie de promesse. Le décor suggère un théâtre classique, chic et intemporel.', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `spectacles`
--

CREATE TABLE `spectacles` (
  `id` int(11) NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `created_in` int(11) NOT NULL,
  `bookable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'Chanteur'),
(2, 'Auteur'),
(3, 'Metteur en scène'),
(4, 'Danseur'),
(5, 'directeur'),
(6, 'President'),
(7, 'Gérant');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `langue` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `firstname`, `lastname`, `email`, `langue`, `user_role`) VALUES
(2, 'Dashing', '$2y$13$8rt.BahmVV3.i/6KFyIoB.Ghc.vMfDqtwkVxwCbkr94FE9J1mEKsu', 'Yass', 'Dashing', 'dashing@outlook.com', 'fr', 'ROLE_ADMIN'),
(3, 'YassDashing', '$2y$13$0xaoJT68d7/sb0BzVG68BeT.Uzl8dy.E6NcnYBakak2sHvrHWYmuu', 'Yass', 'Dashing', 'yass@outlook.com', 'fr', 'ROLE_USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artiste_type`
--
ALTER TABLE `artiste_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_141633AA1F48AE04` (`artist_id_id`),
  ADD KEY `IDX_141633AA714819A0` (`type_id_id`);

--
-- Index pour la table `artiste_type_show`
--
ALTER TABLE `artiste_type_show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_812771F5C52781FA` (`artiste_type_id_id`),
  ADD KEY `IDX_812771F57DF5FA8B` (`show_id_id`);

--
-- Index pour la table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `localities`
--
ALTER TABLE `localities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `locality`
--
ALTER TABLE `locality`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5E9E89CB88823A92` (`locality_id`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_17E64ABA88823A92` (`locality_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `representations`
--
ALTER TABLE `representations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C90A401E5C09E` (`showshow_id_id`),
  ADD KEY `IDX_C90A401918DB72` (`location_id_id`);

--
-- Index pour la table `representation_reservation`
--
ALTER TABLE `representation_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A3F4FD36A1E50B04` (`representation_id_id`),
  ADD KEY `IDX_A3F4FD363C3B4EF0` (`reservation_id_id`),
  ADD KEY `IDX_A3F4FD36548D9637` (`price_id_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4DA2399D86650F` (`user_id_id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6970EB0F9D86650F` (`user_id_id`),
  ADD KEY `IDX_6970EB0F7DF5FA8B` (`show_id_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_332CA4DD88987678` (`role_id_id`),
  ADD KEY `IDX_332CA4DD9D86650F` (`user_id_id`);

--
-- Index pour la table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6C3BF144918DB72` (`location_id_id`);

--
-- Index pour la table `spectacles`
--
ALTER TABLE `spectacles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artiste_type`
--
ALTER TABLE `artiste_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `artiste_type_show`
--
ALTER TABLE `artiste_type_show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `localities`
--
ALTER TABLE `localities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `locality`
--
ALTER TABLE `locality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `representations`
--
ALTER TABLE `representations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `representation_reservation`
--
ALTER TABLE `representation_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `spectacles`
--
ALTER TABLE `spectacles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artiste_type`
--
ALTER TABLE `artiste_type`
  ADD CONSTRAINT `FK_141633AA1F48AE04` FOREIGN KEY (`artist_id_id`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `FK_141633AA714819A0` FOREIGN KEY (`type_id_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `artiste_type_show`
--
ALTER TABLE `artiste_type_show`
  ADD CONSTRAINT `FK_812771F57DF5FA8B` FOREIGN KEY (`show_id_id`) REFERENCES `shows` (`id`),
  ADD CONSTRAINT `FK_812771F5C52781FA` FOREIGN KEY (`artiste_type_id_id`) REFERENCES `artiste_type` (`id`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `FK_5E9E89CB88823A92` FOREIGN KEY (`locality_id`) REFERENCES `locality` (`id`);

--
-- Contraintes pour la table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `FK_17E64ABA88823A92` FOREIGN KEY (`locality_id`) REFERENCES `localities` (`id`);

--
-- Contraintes pour la table `representations`
--
ALTER TABLE `representations`
  ADD CONSTRAINT `FK_C90A401918DB72` FOREIGN KEY (`location_id_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `FK_C90A401E5C09E` FOREIGN KEY (`showshow_id_id`) REFERENCES `shows` (`id`);

--
-- Contraintes pour la table `representation_reservation`
--
ALTER TABLE `representation_reservation`
  ADD CONSTRAINT `FK_A3F4FD363C3B4EF0` FOREIGN KEY (`reservation_id_id`) REFERENCES `reservations` (`id`),
  ADD CONSTRAINT `FK_A3F4FD36548D9637` FOREIGN KEY (`price_id_id`) REFERENCES `prices` (`id`),
  ADD CONSTRAINT `FK_A3F4FD36A1E50B04` FOREIGN KEY (`representation_id_id`) REFERENCES `representations` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_4DA2399D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_6970EB0F7DF5FA8B` FOREIGN KEY (`show_id_id`) REFERENCES `shows` (`id`),
  ADD CONSTRAINT `FK_6970EB0F9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `FK_332CA4DD88987678` FOREIGN KEY (`role_id_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FK_332CA4DD9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `FK_6C3BF144918DB72` FOREIGN KEY (`location_id_id`) REFERENCES `locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
