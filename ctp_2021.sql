-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 06 déc. 2021 à 09:01
-- Version du serveur : 5.7.19
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ctp_2021`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id_jeu` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `age_min` int(11) NOT NULL,
  `nb_joueur_min` int(11) NOT NULL,
  `nb_joueur_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id_jeu`, `nom`, `description`, `img`, `type`, `age_min`, `nb_joueur_min`, `nb_joueur_max`) VALUES
(1, 'Dominion', 'Dans Dominion, les joueurs incarnent des souverains de paisibles royaumes verdoyants rêvant de grandeur et d\'expension. Unifiez sous votre bannière les nombreux fiefs au bord de l\'anarchie et apporterez paix et civilisation.', 'img/upload/dominion-vf.jpg', 1, 8, 2, 4),
(2, '7 Wonders', 'Dans 7 Wonders Nouvelle Edition, prenez la tête de l\'une des sept grandes cités du monde antique et laissez votre empreinte dans l\'histoire des civilisations. Cette boîte est la 2ème édition de ce jeu devenu un classique.', 'img/upload/7-wonders.jpg', 2, 10, 3, 7),
(3, '7 Wonders Architects', '7 Wonders Architects est un nouveau jeu dans le monde de 7 Wonders. Conçu pour une expérience de jeu fluide et immersive, Architects propose une mécanique jeu légèrement simplifié mais qui conserve la profondeur stratégique pour laquelle la marque 7 Wonders est si bien connue.', 'img/upload/7-wonders-architects.jpg', 3, 8, 2, 7),
(4, 'Marvel Champions', 'Les super-vilains sèment le chaos un peu partout sur Terre ! Le monde a besoin de héros pour arrêter ces êtres diaboliques et faire respecter la hauteur. Serez-vous à la hauteur ?', 'img/upload/marvel-champions.jpg', 4, 12, 1, 4),
(5, 'Welcome To The Moon', 'Welcome to the Moon est le dernier volet de la trilogie de jeux Welcome. Après les lotissements résidentiels des années 1950, après les casinos des années 1960, vous allez partir à la conquête de l’espace...', 'img/upload/welcome-to-the-moon.jpg', 5, 10, 1, 6),
(6, 'Les Ruines Perdues De Narak', 'Les Ruines Perdues De Narak combine le deck building et le placement d\'ouvriers dans un jeu d\'exploration, de gestion des ressources et de découverte.\r\n', 'img/upload/les-ruines-perdues-de-narak.jpg', 1, 12, 1, 4),
(7, 'Parks', 'Parks est un jeu sur la thématique des Parcs nationaux américains dans lequel les joueurs incarnent deux randonneurs parcourant les sentiers d\'un parc durant les 4 saisons de l\'année.', 'img/upload/parks.jpg', 6, 10, 1, 5),
(9, 'Unlock ! Game Adventures', 'Unlock ! Games Adventures : Plongez dans l\'univers de Mysterium, Aventuriers du Rail et Pandemic !', 'img/upload/unlock-game-adventures.jpg', 7, 10, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(500) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `admin`) VALUES
(1, 'Test', 'Test', 'test', '$2y$10$LiIxtIh56DKKtnnjE40I2ulmmtUhepWCvtdN9ng/0wuu/dwkzuayi', 0),
(2, 'Admin', 'Admin', 'admin', '$2y$10$b7kYFRP8tAEsazs6USHoVuMreBgR7UyyjXMgwENPi6F3/GC7KXyeW', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id_jeu`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id_jeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
