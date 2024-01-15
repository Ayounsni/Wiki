-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 jan. 2024 à 03:13
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
-- Base de données : `wiki`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `categorie_name` varchar(50) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie_name`, `creation_date`) VALUES
(12, 'Sport', '2024-01-10 10:55:44'),
(14, 'Informatique', '2024-01-10 10:55:44'),
(17, 'Management', '2024-01-10 14:08:08'),
(18, 'Finance', '2024-01-10 14:09:36'),
(29, 'Cuisin', '2024-01-12 17:45:06'),
(30, 'Math', '2024-01-14 13:52:01');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id_tag` int(11) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id_tag`, `tag_name`) VALUES
(13, 'BOOTSTRAP'),
(19, 'CSS'),
(17, 'FOOT'),
(18, 'HTML'),
(15, 'MVC'),
(3, 'OOP');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('auteur','admin') NOT NULL DEFAULT 'auteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(1, 'Snini', 'Ayoub', 'Ayoubsnini@gmail.com', '$2y$10$UBmCsvK7irMLJNltukFtT.NJY9PfleQYpmRzyOi1r4AScvFN/jX3C', 'admin'),
(2, 'Snini', 'Ayoub', 'Ayoubsnini@gmail.co', '$2y$10$UBmCsvK7irMLJNltukFtT.NJY9PfleQYpmRzyOi1r4AScvFN/jX3C', 'auteur'),
(3, 'sah', 'soumia', 'Ayoub@gmail.com', '$2y$10$UBmCsvK7irMLJNltukFtT.NJY9PfleQYpmRzyOi1r4AScvFN/jX3C', 'auteur'),
(4, 'Tucker', 'Haley', 'nemimo@mailinator.com', '$2y$10$UBmCsvK7irMLJNltukFtT.NJY9PfleQYpmRzyOi1r4AScvFN/jX3C', 'auteur'),
(5, 'snini', 'boubker', 'boubker@gmail.com', '$2y$10$UBmCsvK7irMLJNltukFtT.NJY9PfleQYpmRzyOi1r4AScvFN/jX3C', 'auteur'),
(6, 'simo', 'ahmed', 'simo@gmail.com', '$2y$10$UBmCsvK7irMLJNltukFtT.NJY9PfleQYpmRzyOi1r4AScvFN/jX3C', 'auteur'),
(7, 'loun', 'samir', 'samir@gmail.com', '$2y$10$UBmCsvK7irMLJNltukFtT.NJY9PfleQYpmRzyOi1r4AScvFN/jX3C', 'auteur');

-- --------------------------------------------------------

--
-- Structure de la table `wikis`
--

CREATE TABLE `wikis` (
  `id_wiki` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `archive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wikis`
--

INSERT INTO `wikis` (`id_wiki`, `titre`, `contenu`, `user_id`, `categorie_id`, `dateCreation`, `archive`) VALUES
(15, 'Amethyst Alston', 'Dolorem accusantium', 2, 12, '2024-01-12 01:00:35', 0),
(16, 'Amethyst Alston', 'Dolorem accusantium', 2, 12, '2024-01-12 01:02:13', 0),
(18, 'Amethyst Alston', 'kkkkkkkkk', 2, 18, '2024-01-12 01:05:44', 0),
(20, 'fffff', 'kkkkkkkkkkkkkkk', 2, 12, '2024-01-12 01:12:38', 0),
(24, 'Amethyst Alston', 'hahahahahhaahhahahaahahahahahahahahahhahahahaahahahah', 3, 12, '2024-01-12 10:55:54', 0),
(25, 'salle', 'hahahahann vhahahahannhahahahann v hahahahannhahahahann hahahahannv hahahahann vhahahahann  hahahahann hahahahann hahahahann hahahahann hahahahann hahahahann vvhahahahann', 3, 17, '2024-01-12 13:59:27', 0),
(26, 'Asher Robbins', 'Laboris non ea solut hha jjd c ncc hss hzzb bxxbx jzhzhs ssbsijzeouhrbze zefbzlfblkzbefk  dfkzqebflkjzbefkljzekf  klfbzqkleb', 3, 18, '2024-01-12 15:51:28', 0),
(27, 'ouiii', 'test tesst', 3, 18, '2024-01-12 16:43:50', 1),
(28, 'k', 'dtggtxxgxdfx', 3, 17, '2024-01-12 16:46:12', 1),
(30, 'Amethyst Alston', 'azertyu', 2, 29, '2024-01-12 17:48:39', 1),
(31, 'kholouuuuuuuuuuudeee', 'kholouuuuuuuuuuudkholouuuuuuuuuuud kholouuuuuuuuuuud kholouuuuuuuuuuud kholouuuuuuuuuuud kholouuuuuuuuuuud kholouuuuuuuuuuud kholouuuuuuuuuuud hzhzh hahahah ah aha ahahahahah aha ha', 2, 14, '2024-01-12 22:16:34', 0),
(32, 'najw', 'najwaa j dddd fjjjn  cccck zknedzlkjfnqmlsjf s sdnf mlsdnfmlskd sl clkmsjdnflmjksndf sqdlk clmskdnfclmksndf qsldk clmsknflkms clsd clmjsdnlj', 2, 14, '2024-01-14 01:27:06', 0);

-- --------------------------------------------------------

--
-- Structure de la table `wikis_tags`
--

CREATE TABLE `wikis_tags` (
  `wiki_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wikis_tags`
--

INSERT INTO `wikis_tags` (`wiki_id`, `tag_id`) VALUES
(15, 3),
(16, 3),
(18, 3),
(20, 3),
(25, 13),
(26, 3),
(30, 3),
(31, 13),
(32, 3),
(32, 13),
(32, 15),
(32, 17);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `categorie_name` (`categorie_name`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD PRIMARY KEY (`id_wiki`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `wikis_ibfk_2` (`categorie_id`);

--
-- Index pour la table `wikis_tags`
--
ALTER TABLE `wikis_tags`
  ADD PRIMARY KEY (`wiki_id`,`tag_id`),
  ADD KEY `wikis_tags_ibfk_2` (`tag_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `id_wiki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `wikis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `wikis_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id_categorie`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wikis_tags`
--
ALTER TABLE `wikis_tags`
  ADD CONSTRAINT `wikis_tags_ibfk_1` FOREIGN KEY (`wiki_id`) REFERENCES `wikis` (`id_wiki`) ON DELETE CASCADE,
  ADD CONSTRAINT `wikis_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id_tag`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
