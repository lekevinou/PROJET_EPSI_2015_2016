-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 10 Février 2016 à 16:26
-- Version du serveur :  5.5.44-0+deb8u1
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `stumps`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE IF NOT EXISTS `batiment` (
`id_batiment` int(11) NOT NULL,
  `nom_batiment` varchar(100) NOT NULL,
  `cout_bois` int(11) NOT NULL,
  `cout_fer` int(11) NOT NULL,
  `cout_pierre` int(11) NOT NULL,
  `cout_nourriture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `joueur_ville`
--

CREATE TABLE IF NOT EXISTS `joueur_ville` (
`id_joueur_ville` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Fait le lien entre les villes et le joueur';

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id_message` int(11) NOT NULL,
  `date_message` date NOT NULL,
  `id_expediteur_message` int(11) NOT NULL,
  `objet_message` varchar(255) DEFAULT NULL,
  `txt_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message_destinataire`
--

CREATE TABLE IF NOT EXISTS `message_destinataire` (
`id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Pour un message qui aura plusieurs destinaires';

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
`id_race` int(11) NOT NULL,
  `nom_race` varchar(255) NOT NULL,
  `description_race` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_unite`
--

CREATE TABLE IF NOT EXISTS `type_unite` (
`id` int(11) NOT NULL,
  `id_type_unite` int(11) NOT NULL,
  `nom_type_unite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Fait le lien entre les types d''unité et la table unité';

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

CREATE TABLE IF NOT EXISTS `unite` (
`id_unite` int(11) NOT NULL,
  `nom_unite` varchar(255) NOT NULL,
  `description_unite` text,
  `attaque_unite` int(11) NOT NULL,
  `defense_infanterie_unite` int(11) NOT NULL,
  `defense_distant_unite` int(11) NOT NULL,
  `defense_cavalerie_unite` int(11) NOT NULL,
  `vitesse_unite` int(11) NOT NULL,
  `capacite_transport_unite` int(11) NOT NULL,
  `id_type_unite` int(11) NOT NULL,
  `cout_bois_unite` int(11) NOT NULL,
  `cout_fer_unite` int(11) NOT NULL,
  `cout_pierre_unite` int(11) NOT NULL,
  `cout_nourriture_unite` int(11) NOT NULL,
  `temps_creation_unite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id_utilisateur` int(11) NOT NULL,
  `pseudo_utilisateur` varchar(255) NOT NULL,
  `mail_utilisateur` varchar(255) NOT NULL,
  `mdp_utilisateur` varchar(255) NOT NULL,
  `id_race_utilisateur` int(11) NOT NULL,
  `description_utilisateur` text,
  `sexe_utilisateur` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo_utilisateur`, `mail_utilisateur`, `mdp_utilisateur`, `id_race_utilisateur`, `description_utilisateur`, `sexe_utilisateur`) VALUES
(1, 'aerzrjk', 'ezkrjzer@erg.gr', 'zffze', 0, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
`id_ville` int(11) NOT NULL,
  `nom_ville` varchar(255) NOT NULL,
  `positionX_ville` int(11) DEFAULT NULL,
  `positionY_ville` int(11) DEFAULT NULL,
  `nombre_population_ville` int(11) DEFAULT NULL,
  `nombre_bois_ville` int(11) DEFAULT '500',
  `nombre_fer_ville` int(11) DEFAULT '500',
  `nombre_pierre_ville` int(11) NOT NULL DEFAULT '500',
  `nombre_nourriture_ville` int(11) NOT NULL DEFAULT '500',
  `nombre_population_travail_ville` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ville_batiment`
--

CREATE TABLE IF NOT EXISTS `ville_batiment` (
`id` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_batiment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Fait le lien entre un ville et ses batiments';

-- --------------------------------------------------------

--
-- Structure de la table `ville_unite`
--

CREATE TABLE IF NOT EXISTS `ville_unite` (
`id` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_unite` int(11) NOT NULL,
  `id_nombre_unite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
 ADD PRIMARY KEY (`id_batiment`);

--
-- Index pour la table `joueur_ville`
--
ALTER TABLE `joueur_ville`
 ADD PRIMARY KEY (`id_joueur_ville`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `message_destinataire`
--
ALTER TABLE `message_destinataire`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
 ADD PRIMARY KEY (`id_race`);

--
-- Index pour la table `type_unite`
--
ALTER TABLE `type_unite`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `unite`
--
ALTER TABLE `unite`
 ADD PRIMARY KEY (`id_unite`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
 ADD PRIMARY KEY (`id_ville`);

--
-- Index pour la table `ville_batiment`
--
ALTER TABLE `ville_batiment`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ville_unite`
--
ALTER TABLE `ville_unite`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `batiment`
--
ALTER TABLE `batiment`
MODIFY `id_batiment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `joueur_ville`
--
ALTER TABLE `joueur_ville`
MODIFY `id_joueur_ville` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message_destinataire`
--
ALTER TABLE `message_destinataire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_unite`
--
ALTER TABLE `type_unite`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `unite`
--
ALTER TABLE `unite`
MODIFY `id_unite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville_batiment`
--
ALTER TABLE `ville_batiment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville_unite`
--
ALTER TABLE `ville_unite`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
