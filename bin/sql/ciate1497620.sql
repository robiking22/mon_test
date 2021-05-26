-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 05 mai 2021 à 12:27
-- Version du serveur :  10.3.25-MariaDB-0+deb10u1
-- Version de PHP : 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ciate1497620`
--

-- --------------------------------------------------------

--
-- Structure de la table `info_pvit`
--

CREATE TABLE `info_pvit` (
  `id` int(11) NOT NULL,
  `token` varchar(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `info_pvit`
--

INSERT INTO `info_pvit` (`id`, `token`) VALUES
(1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..M2uyuo03OtGKsaNPRQWwuK9OhC8xhs1g2jZPSV/ReIg=');

-- --------------------------------------------------------

--
-- Structure de la table `OM_mot_de_passe_oublie`
--

CREATE TABLE `OM_mot_de_passe_oublie` (
  `id` int(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `state` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `OM_panier`
--

CREATE TABLE `OM_panier` (
  `id` int(11) NOT NULL,
  `id_app` varchar(255) NOT NULL,
  `produit_id` varchar(255) NOT NULL,
  `id_marchand` int(2) NOT NULL,
  `id_client` int(2) NOT NULL,
  `produit_nom` varchar(255) NOT NULL,
  `produit_prix` int(16) NOT NULL,
  `date_enr` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `OM_produit`
--

CREATE TABLE `OM_produit` (
  `id` int(11) NOT NULL,
  `id_boutique` varchar(255) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `prix` int(10) NOT NULL,
  `date_pub` int(10) NOT NULL,
  `date_exp` int(10) NOT NULL,
  `type_pub` int(1) NOT NULL,
  `point_boost` int(11) NOT NULL,
  `image_file` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `OM_user`
--

CREATE TABLE `OM_user` (
  `id` int(32) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `OM_user`
--

INSERT INTO `OM_user` (`id`, `user_name`, `user_pre`, `email`, `password`, `tel`) VALUES
(1, 'OYONO NSO', 'King Ferdinand', '222littleking@gmail.com', 'robiking', '+24162081617'),
(2, 'Ferdinand', 'OYONO NSO', 'oyononso@gmail.com', '22', '+24174854899'),
(3, 'Ferdinand', 'OYONO NSO', 'oyononso@ciatel.ga', 'KK', '065214466'),
(4, 'dine', 'billker', 'billkerdine@gmail.com', 'MM', '074467177');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `info_pvit`
--
ALTER TABLE `info_pvit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `OM_mot_de_passe_oublie`
--
ALTER TABLE `OM_mot_de_passe_oublie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `OM_panier`
--
ALTER TABLE `OM_panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `OM_produit`
--
ALTER TABLE `OM_produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `OM_user`
--
ALTER TABLE `OM_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `info_pvit`
--
ALTER TABLE `info_pvit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `OM_mot_de_passe_oublie`
--
ALTER TABLE `OM_mot_de_passe_oublie`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `OM_panier`
--
ALTER TABLE `OM_panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `OM_produit`
--
ALTER TABLE `OM_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `OM_user`
--
ALTER TABLE `OM_user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
