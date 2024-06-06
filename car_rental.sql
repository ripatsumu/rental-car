-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 juin 2024 à 03:25
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
-- Base de données : `car_rental`
--

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `storage` int(11) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `bags` int(11) DEFAULT NULL,
  `mpg` int(11) DEFAULT NULL,
  `airbags` tinyint(1) DEFAULT NULL,
  `transmission` enum('manual','auto') DEFAULT NULL,
  `ac` tinyint(1) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `baby_seat` int(11) DEFAULT 0,
  `doors` int(11) DEFAULT 2,
  `power_steering` tinyint(1) DEFAULT 0,
  `central_locking` tinyint(1) DEFAULT 0,
  `co2_emission` float DEFAULT 0,
  `stereo_radio` varchar(255) DEFAULT '',
  `abs_brakes` tinyint(1) DEFAULT 0,
  `mileage_per_tank` float DEFAULT 0,
  `image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `title`, `price`, `image1`, `image2`, `storage`, `seats`, `bags`, `mpg`, `airbags`, `transmission`, `ac`, `description`, `baby_seat`, `doors`, `power_steering`, `central_locking`, `co2_emission`, `stereo_radio`, `abs_brakes`, `mileage_per_tank`, `image3`) VALUES
(1, '2016 Mercedes-Benz SLK', 79.00, 'images/i29.jpg', 'images/i40.jpg', 5, 2, 2, 150, 1, 'manual', 1, NULL, 0, 2, 0, 0, 0, '', 0, 0, 'z-car-1.png'),
(2, '2016 Chevrolet Malibu', 79.00, 'images/i28.jpg', 'images/i32.jpg', 2, 2, 2, 150, 1, 'auto', 1, NULL, 0, 2, 0, 0, 0, '', 0, 0, 'z-car-2.png'),
(3, 'Bugatti Veyron', 79.00, 'images/i27.jpg', 'images/i33.jpg', 2, 2, 2, 150, 1, 'auto', 1, NULL, 0, 2, 0, 0, 0, '', 0, 0, 'z-car-3.png'),
(4, '2016 Nissan Juke', 79.00, 'images/i31.jpg', 'images/i35.jpg', 2, 2, 2, 150, 1, 'manual', 1, NULL, 0, 2, 0, 0, 0, '', 0, 0, 'z-car-4.png');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dropping_off_location` varchar(255) NOT NULL,
  `picking_up_location` varchar(255) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `return_date` date NOT NULL,
  `return_time` time NOT NULL,
  `driver_age` int(11) NOT NULL,
  `car_selected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `username`, `dropping_off_location`, `picking_up_location`, `pickup_date`, `pickup_time`, `return_date`, `return_time`, `driver_age`, `car_selected`) VALUES
(5, 'mostafa', 'aadraoui', 'rip', 'test', 'test', '0000-00-00', '02:00:00', '0000-00-00', '02:00:00', 22, 2),
(6, 'mostafa', 'aadraoui', 'rip', 'oooo', 'oopo', '0000-00-00', '15:00:00', '0000-00-00', '17:00:00', 22, 2),
(7, 'mostafa', 'aadraoui', 'rip', 'fffff', 'fff', '2002-01-06', '14:00:00', '2004-01-03', '15:00:00', 22, 2),
(8, 'mouad', 'raffass', 'mouad', 'rabat', 'mohamadia', '2024-06-04', '04:00:00', '2024-08-02', '03:00:00', 22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(3, 'mostafa', 'aadraoui', 'mostafa@kamal.com', 'rip', '$2y$10$LL8E9VC.B4RqTOAE0ZCghuotokF5GWBsMGMaSwA4G11r9O/obfFgS'),
(4, 'oumayma', 'cherfani', 'oumaymacherfani@gmail.com', 'ouma', '$2y$10$4fqiwqLKNU54DHg3.jx.Juo9yoyFIcdY15f9TjfVSPqaDbOb.ACJe'),
(5, 'Maroua', 'mounach', 'maroua@gmail.com', 'marouamch', '$2y$10$C1zFUzh2T0c7n93BHTWcDetLG2jr.Kf2WykBoWh4hXvBcY2ls3kda'),
(6, 'mouad', 'raffass', 'mouad@gmail.com', 'mouad', '$2y$10$Kjh0G8ZwAem7r/aMVvtLHOxeJZznvyC0.Ab4wtmvH001Kg2o9Ctx2');

-- --------------------------------------------------------

--
-- Structure de la table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `expiry_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `session_token`, `expiry_timestamp`, `created_at`, `updated_at`) VALUES
(3, 3, '25360f05b20f8aafe97660c6565bafdc22be53a17807419fed3e262c1df52c08', '2024-04-22 19:00:12', '2024-04-22 17:00:12', '2024-04-22 17:00:12'),
(4, 3, '6722236f475672ad19ae2dc87ae671bdcbc4b52129e30f7b8a26c11ad411ecf2', '2024-04-22 19:10:36', '2024-04-22 17:10:36', '2024-04-22 17:10:36'),
(5, 3, 'cc4a7ca5c685d95cd6fb1f74f36b54447cdf9f6b4bc8b519bce3c4f526af69c4', '2024-04-23 00:50:27', '2024-04-22 22:50:27', '2024-04-22 22:50:27'),
(6, 3, '7c49b62e3a6735979d301b207fac9baa6b57407ec8a7039fc0bbf6c3936784fc', '2024-04-23 01:05:56', '2024-04-22 23:05:56', '2024-04-22 23:05:56'),
(7, 3, '1598c4ceb3e12f4c5653bb41be0997584b73b3e14bf1a18bc3dbf28daf33027a', '2024-04-23 12:10:30', '2024-04-23 10:10:30', '2024-04-23 10:10:30'),
(8, 4, 'cb93b9432785fb8e7d91d5b00eedbd437c07e6ad295c3c730724ccd45bb551cc', '2024-04-23 17:57:39', '2024-04-23 15:57:39', '2024-04-23 15:57:39'),
(9, 3, 'b3297b2995f81568e3208b5b755c43d22ca4729abfdbd19bf08e552f9e6f6713', '2024-04-28 17:14:56', '2024-04-28 15:14:56', '2024-04-28 15:14:56'),
(10, 3, '850ea21fc9b6c7c1208b19c85e9544b48e6a36f17cf3c0bbba8d199f4d69b153', '2024-04-28 23:58:41', '2024-04-28 21:58:41', '2024-04-28 21:58:41'),
(11, 5, 'a6cf0eb2560df840d7652cf81f4a5aa1564836744a606594b13f3c7e526b4340', '2024-05-08 18:36:55', '2024-05-08 16:36:55', '2024-05-08 16:36:55'),
(12, 3, 'c4ef4d7861c792d0fb0317d529afa8a2e97d5707eccf4d1b1246cdcbc8f8b996', '2024-05-09 14:04:01', '2024-05-09 12:04:01', '2024-05-09 12:04:01'),
(13, 3, '23622e6338e3802fa582857259e9348aa6e7f58cd6dd53779591efc117d1bbd9', '2024-05-19 02:15:34', '2024-05-19 00:15:34', '2024-05-19 00:15:34'),
(14, 3, '819101f71fd59adcdfb133e3eaf139344c98536f5dce9baf341481f21e5266ba', '2024-05-20 18:43:06', '2024-05-20 16:43:06', '2024-05-20 16:43:06'),
(15, 3, 'ef0061cc1f34a19bf37fae40091285fed188ab60f05fd89a33cde1716412db73', '2024-05-31 14:14:05', '2024-05-31 12:14:05', '2024-05-31 12:14:05'),
(16, 3, 'e678203ba0a18451c70f2167c034e5772fde62f75b267da44ba4abb5b2a59bec', '2024-05-31 15:49:24', '2024-05-31 13:49:24', '2024-05-31 13:49:24'),
(17, 3, 'e9d78c13200705121b9603d8edd934af840a69c55c7b044d23d68fb76c8f8776', '2024-05-31 15:54:02', '2024-05-31 13:54:02', '2024-05-31 13:54:02'),
(18, 3, '695db39d9deba6ce16de192c50ab5a65e700e94acd8aa4f0b9bceb823b7df480', '2024-05-31 16:03:25', '2024-05-31 14:03:25', '2024-05-31 14:03:25'),
(19, 6, 'f8d205a4c5107c65500cc3a701694a2267d4700677647340b52519f43bfb829d', '2024-06-01 02:51:33', '2024-06-01 00:51:33', '2024-06-01 00:51:33'),
(20, 3, 'e08ca575757f6214940fa1e9ce1c1a5863c67d6a9b61c61144aaff859cc6ebec', '2024-06-01 02:54:00', '2024-06-01 00:54:00', '2024-06-01 00:54:00'),
(21, 3, 'b2db3c290ac3d117ea415c5b443094b8894f55b4086844bba4fc22985e171c28', '2024-06-02 11:51:17', '2024-06-02 09:51:17', '2024-06-02 09:51:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_selected` (`car_selected`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_token_unique` (`session_token`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`car_selected`) REFERENCES `cars` (`id`);

--
-- Contraintes pour la table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
