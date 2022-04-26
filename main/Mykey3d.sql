-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 26 avr. 2022 à 14:54
-- Version du serveur :  10.5.15-MariaDB-0+deb11u1-log
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Mykey3d`
--

-- --------------------------------------------------------

--
-- Structure de la table `authorisation`
--

CREATE TABLE `authorisation` (
  `authorisation_id` int(11) NOT NULL,
  `perm` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `authorisation`
--

INSERT INTO `authorisation` (`authorisation_id`, `perm`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `operation_id` int(11) NOT NULL,
  `product_value` int(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ok_element` int(50) NOT NULL DEFAULT 0,
  `assigned_order` int(70) NOT NULL,
  `assigned_time` int(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`operation_id`, `product_value`, `quantity`, `ok_element`, `assigned_order`, `assigned_time`, `create_date`, `status`) VALUES
(1, 1, 24, 14, 1, 120, '2022-04-25 06:04:21', 3),
(2, 2, 5, 0, 1, 24, '2022-04-26 08:42:27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orderOperation`
--

CREATE TABLE `orderOperation` (
  `order_id` int(70) NOT NULL,
  `operation_id` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orderOperation`
--

INSERT INTO `orderOperation` (`order_id`, `operation_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `assigned_operation` int(30) NOT NULL,
  `assigned_time` varchar(50) NOT NULL,
  `created_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `name`, `assigned_operation`, `assigned_time`, `created_order`, `status`) VALUES
(1, 'Clé USB', 1, '140', '2022-04-26 08:28:20', 1);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`product_id`, `name`) VALUES
(1, 'Plastique'),
(2, 'Pâte Fimo');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `assigned_workbench` int(50) NOT NULL DEFAULT 0,
  `assigned_authorisation` int(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `username`, `password`, `assigned_workbench`, `assigned_authorisation`, `created_at`) VALUES
(3, 'Blanchard', 'Pierre', 'pierre.blanchard', '$2y$16$xIyduiJsmukwKT3EY7ScJ.foh1fh5IfxYa5WqcQtm..Xwvfd2cu1.', 1, 2, '2022-04-15 13:50:59'),
(4, 'laurenson', 'thibault', 'thibault.laurenson', '$2y$16$VU5.TWjZnTRB59kMC0t1COfFCRGGwTqO8hffohEznHm0KTb6Ags1u', 0, 2, '2022-04-26 06:58:42');

-- --------------------------------------------------------

--
-- Structure de la table `workbench`
--

CREATE TABLE `workbench` (
  `workbench_id` int(11) NOT NULL,
  `workbench_name` varchar(50) NOT NULL,
  `assigned_operation` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `workbench`
--

INSERT INTO `workbench` (`workbench_id`, `workbench_name`, `assigned_operation`) VALUES
(1, 'Plastique', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authorisation`
--
ALTER TABLE `authorisation`
  ADD PRIMARY KEY (`authorisation_id`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`operation_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `workbench`
--
ALTER TABLE `workbench`
  ADD PRIMARY KEY (`workbench_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authorisation`
--
ALTER TABLE `authorisation`
  MODIFY `authorisation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `workbench`
--
ALTER TABLE `workbench`
  MODIFY `workbench_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
