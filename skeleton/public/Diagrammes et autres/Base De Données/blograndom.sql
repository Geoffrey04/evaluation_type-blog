-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 08 avr. 2019 à 16:38
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blograndom`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `image`) VALUES
(1, 'Le debut de la fin', 'Test Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur tortor arcu, in dictum nisi molestie ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec convallis mi orci, eu ullamcorper erat placerat a. Nulla nec sem augue. Quisque rutrum hendrerit lectus sit amet cursus. Sed imperdiet eu purus in porta. Curabitur neque purus, aliquet et posuere ac, aliquet quis nisl. Phasellus leo velit, sollicitudin id nisl at, pharetra placerat velit. Donec posuere in libero eu egestas. Ut eros quam, viverra ac dictum at, ultrices in urna. Vestibulum vehicula mauris id lectus congue vehicula. Nam varius vitae erat at tempus.', '../images/kyle.jpg'),
(2, 'Fin du monde', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur tortor arcu, in dictum nisi molestie ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec convallis mi orci, eu ullamcorper erat placerat a. Nulla nec sem augue. Quisque rutrum hendrerit lectus sit amet cursus. Sed imperdiet eu purus in porta. Curabitur neque purus, aliquet et posuere ac, aliquet quis nisl. Phasellus leo velit, sollicitudin id nisl at, pharetra placerat velit. Donec posuere in libero eu egestas. Ut eros quam, viverra ac dictum at, ultrices in urna. Vestibulum vehicula mauris id lectus congue vehicula. Nam varius vitae erat at tempus.', '../images/cartmann_pc.jpg'),
(3, 'bien vu l\'aveugle dit le muet au sourd', 'Test Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur tortor arcu, in dictum nisi molestie ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec convallis mi orci, eu ullamcorper erat placerat a. Nulla nec sem augue. Quisque rutrum hendrerit lectus sit amet cursus. Sed imperdiet eu purus in porta. Curabitur neque purus, aliquet et posuere ac, aliquet quis nisl. Phasellus leo velit, sollicitudin id nisl at, pharetra placerat velit. Donec posuere in libero eu egestas. Ut eros quam, viverra ac dictum at, ultrices in urna. Vestibulum vehicula mauris id lectus congue vehicula. Nam varius vitae erat at tempus.', '../images/kenny_pc.jpg'),
(4, 'inédit : cyriak retrouvé inconscient', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur tortor arcu, in dictum nisi molestie ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec convallis mi orci, eu ullamcorper erat placerat a. Nulla nec sem augue. Quisque rutrum hendrerit lectus sit amet cursus. Sed imperdiet eu purus in porta. Curabitur neque purus, aliquet et posuere ac, aliquet quis nisl. Phasellus leo velit, sollicitudin id nisl at, pharetra placerat velit. Donec posuere in libero eu egestas. Ut eros quam, viverra ac dictum at, ultrices in urna. Vestibulum vehicula mauris id lectus congue vehicula. Nam varius vitae erat at tempus.', '../images/stan_pc.png');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `contenu`, `user_id`, `art_id`) VALUES
(1, 'Voici mon 1er com', 1, 1),
(2, 'voici un deuxieme com', 2, 2),
(5, '3eme com pour le 2eme article (normalement) ( user 4 : cartman)', 4, 2),
(6, '4eme com pour le 3eme article (normalement) ( user 8 : almanrich)', 8, 3),
(7, 'ah oue quand meme', 5, 4),
(8, 'saluuuuuuut', 6, 3),
(9, 'saluuuuuuut', 7, 4),
(10, 'bonjouuuuuur', 2, 1),
(11, 'saluuuuuuut', 9, 1),
(12, 'test 11:24', 9, 1),
(13, 'test 11:24', 9, 1),
(14, 'encoreuntest', 9, 1),
(15, 'again', 9, 1),
(16, 'again', 9, 1),
(17, 'again', 9, 1),
(18, 'again', 9, 1),
(19, 'Trop ouf ! ', 4, 3),
(20, 'Trop ouf ! ', 4, 3),
(21, 'Serieux ?!', 4, 3),
(22, 'hey ho hey ho ', 4, 4),
(23, 'azertyuiop', 4, 4),
(24, 'bonjour c tro nul', 4, 4),
(25, 'bonjour c tro bien', 4, 4),
(26, 't tro moch', 4, 2),
(34, 'ceci est un test', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `mail`, `role`) VALUES
(1, 'geoffrey', 'azerty', 'inconnu@fictif.fr', 'user'),
(2, 'kyle', 'servietsky', 'mazeltof@unknown.com', 'user'),
(3, 'admin', 'admin', 'letoutpuissant@godmail.com', 'admin'),
(4, 'cartman', 'leplusgros', 'cartman@southpark.com', 'user'),
(5, 'kenny', 'jesuismort', 'leparadis@leciel.com', 'user'),
(6, 'stan', 'bonnetbleu', 'bleu@southpark.fr', 'user'),
(7, 'servietsky', 'smokeweveryday', 'howhigh@mari.jea', 'user'),
(8, 'almanrich', 'minicooper', 'alman@rich.com', 'user'),
(9, 'romain', 'romaine', 'oulesromainsvousetesdes@romaines.net', 'user'),
(10, 'mrnobody', 'iamnobody', 'noface@noname.fr', 'user'),
(11, 'Gintoki', 'yorozuya', 'whitehair@idontcare.com', 'user'),
(12, 'kagura', 'stronger', 'moststrongerthanmybro@idontcare.com', 'user'),
(13, 'usertest', 'uiop', 'testtest@tetetest.te', 'user'),
(14, 'willy', 'savewilly', 'oceanpacific@pacificocean.oc', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
