-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 oct. 2024 à 17:56
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
-- Base de données : `sen_recettes`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `recipe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Table des commentaires';

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `comment`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `recipe_id`) VALUES
(1, 4, 'jhjhgkjk', '2024-10-13 22:58:11', NULL, '2024-10-13 22:58:11', NULL, NULL, NULL, 1),
(2, 4, 'fdjfjdfjhdjhjdjfdfhks', '2024-10-13 23:00:14', NULL, '2024-10-13 23:00:14', NULL, NULL, NULL, 1),
(3, 4, 'ghkghkfkg', '2024-10-13 23:04:03', NULL, '2024-10-13 23:04:03', NULL, NULL, NULL, 1),
(23, 4, 'dhskhdkshdks', '2024-10-14 00:12:21', NULL, '2024-10-14 00:12:21', NULL, NULL, NULL, 3),
(24, 4, 'khkgkkfjgkf', '2024-10-14 01:06:02', NULL, '2024-10-14 01:06:02', NULL, NULL, NULL, 6),
(25, 4, 'dhfhghgjg', '2024-10-14 01:06:14', NULL, '2024-10-14 01:06:14', NULL, NULL, NULL, 6),
(26, 4, 'HKGKJGKJK', '2024-10-14 14:50:15', NULL, '2024-10-14 14:50:15', NULL, NULL, NULL, 1),
(27, 4, 'fdhfdkhkk', '2024-10-14 23:46:44', NULL, '2024-10-14 23:46:44', NULL, NULL, NULL, 1),
(28, 4, 'fhdkffkd', '2024-10-14 23:46:51', NULL, '2024-10-14 23:46:51', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `recipe` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Table des recettes';

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `recipe`, `author`, `is_enabled`, `image_path`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `views`) VALUES
(13, 'fdjflkfjs 12', 'sfhkfjjlfj', 'khadija@gmail.com', 1, '../uploads/piz4.jpg', '2024-10-14 23:49:19', NULL, '2024-10-15 11:56:02', NULL, NULL, NULL, 1),
(15, 'fjhkgjkdjs', 'dhkghkgjkj', 'khadija@gmail.com', 1, '../uploads/piz2.jpg', '2024-10-15 11:49:56', NULL, '2024-10-15 11:49:56', NULL, NULL, NULL, 0),
(16, 'Recette 23', 'dhgdsljgdsjdmJLS', 'khadija@gmail.com', 1, '../uploads/piz1.webp', '2024-10-15 11:50:29', NULL, '2024-10-15 11:50:29', NULL, NULL, NULL, 0),
(17, 'M546', 'HGKHKFGKFJGKJFK', 'mouhamed@gmail.com', 1, '../uploads/piz5.jpg', '2024-10-15 11:51:50', NULL, '2024-10-15 11:51:50', NULL, NULL, NULL, 0),
(18, 'hjdhfdhkdh 65', 'fhghgkfhkfhkfjkgfjkf', 'mademba@gmail.com', 1, '../uploads/piz3.jpg', '2024-10-15 11:53:45', NULL, '2024-10-15 11:53:45', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Table des utilisateurs';

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `prenom`, `nom`, `email`, `password`, `age`, `image_path`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Mickaël', 'Andrieu', 'mickael.andrieu@exemple.com', 'devine', 34, NULL, '2024-10-13 00:42:30', NULL, '2024-10-13 00:42:30', NULL, NULL, NULL),
(2, 'Mathieu', 'Nebra', 'mathieu.nebra@exemple.com', 'MiamMiam', 34, NULL, '2024-10-13 00:42:30', NULL, '2024-10-13 00:42:30', NULL, NULL, NULL),
(3, 'Laurène', 'Castor', 'laurene.castor@exemple.com', 'laCasto28', 28, NULL, '2024-10-13 00:42:30', NULL, '2024-10-13 00:42:30', NULL, NULL, NULL),
(4, 'khadija', 'Seck', 'khadija@gmail.com', '$2y$10$5P2qx51cIXXK0ROteIv3wO4zW0ypL7N4X/G1SFPWD1QHs6Oj.t4jq', 23, 'uploads/prf8.jpg', '2024-10-13 16:13:52', NULL, '2024-10-13 16:13:52', NULL, NULL, NULL),
(5, '', '', '', '$2y$10$IPEwgHPgETIQNYIwHnW/FOjWEDuGMojms7Fyvi/IaZAwsi8ohFZIG', 0, '../uploads/piz3.jpg', '2024-10-14 00:39:55', NULL, '2024-10-14 00:39:55', NULL, NULL, NULL),
(6, 'Moussa', 'Touré', 'moussa@gmail.com', '$2y$10$C3LcZVZ7VeT9pF9zF2mG4eDYEMCfjBrGH4GF6TbbCf3C6FE4rIHe2', 26, '../uploads/prf3.png', '2024-10-14 09:10:54', NULL, '2024-10-14 09:10:54', NULL, NULL, NULL),
(7, 'Seynabou', 'Seck', 'seynabou@gmail.com', '$2y$10$YXau7VDQFukQnSFFLUkyDuZ76SPBN91fp0xiMJp3FuS/6RqOBSlMy', 67, '../uploads/prf8.jpg', '2024-10-14 09:13:48', NULL, '2024-10-14 09:13:48', NULL, NULL, NULL),
(8, 'amadou', 'Sarr', 'amadou@gmail.com', '$2y$10$iMPlKo/McrQ1/IktF5IuSOuUwaAM2VzCmPyFca5fYthX6LI57bTaC', 45, '../uploads/prf7.jpg', '2024-10-14 09:20:37', NULL, '2024-10-14 09:20:37', NULL, NULL, NULL),
(9, 'Mouhamed', 'Diouf', 'mouhamed@gmail.com', '$2y$10$bJ1Om3hXnmAHMXjmvS1lFey5U1alz72C05QBptjUnNUf6rstQiCAS', 54, '../uploads/prf6.jpg', '2024-10-14 09:24:09', NULL, '2024-10-14 09:24:09', NULL, NULL, NULL),
(10, 'makham', 'mbaye', 'makham@gmail.com', '$2y$10$VqqSSWTqlp.Vv6cC3DBW0ebgePKQ4kLFb9M0bpcSsgFNwYsmr9FYq', 26, '../uploads/prf7.jpg', '2024-10-14 09:37:21', NULL, '2024-10-14 09:37:21', NULL, NULL, NULL),
(11, 'Mademba', 'seck', 'mademba@gmail.com', '$2y$10$DSD.zGe99su0jkxGCuVAHOPsq5zoSzKHJpni1KfO3i0GtY2qgUBwS', 45, '../uploads/prf7.jpg', '2024-10-14 09:47:47', NULL, '2024-10-14 09:47:47', NULL, NULL, NULL),
(12, 'khady', 'sene', 'khady@gmail.com', '$2y$10$xqyaQin.QKE9lVMzsqIvUel6I59TXLNO7J0x8zfw0jvugTg4qC/Am', 20, '../uploads/prf8.jpg', '2024-10-14 14:56:29', NULL, '2024-10-14 14:56:29', NULL, NULL, NULL),
(13, 'Konaté', 'sene', 'konate@gmail.com', '$2y$10$PbB2XxhLQ0LxRLV1pLBleOk6afGMqnTeiyD5sSLGWYyvjquHs5FoG', 54, '../uploads/prf2.jpg', '2024-10-15 11:58:16', NULL, '2024-10-15 11:58:16', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
