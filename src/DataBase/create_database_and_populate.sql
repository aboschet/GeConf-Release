--
-- Base de données : 'geconf'
--
CREATE DATABASE IF NOT EXISTS `geconf` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `geconf`;

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

CREATE TABLE `atelier` (
  `id` int(11) NOT NULL,
  `titre_definitif` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `laboratoire` int(11) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `duree` int(11) NOT NULL,
  `capacite` int(11) NOT NULL,
  `type_inscription` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `animateur` int(11) NOT NULL,
  `partenaire` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `contenu_pedagogique` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

CREATE TABLE `laboratoire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Index pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratoire` (`laboratoire`);

--
-- Index pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour la table `atelier`
--
ALTER TABLE `atelier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Contraintes pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD CONSTRAINT `atelier_laboratoire` FOREIGN KEY (`laboratoire`) REFERENCES `laboratoire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- --------------------------------------------------------

--
-- Population des tables
--

INSERT INTO `laboratoire` (`id`, `nom`, `lieu`) VALUES (NULL, 'CNRS', 'Bordeaux');
INSERT INTO `laboratoire` (`id`, `nom`, `lieu`) VALUES (NULL, 'INRIA', 'Bordeaux');

INSERT INTO `atelier` (`id`, `titre_definitif`, `theme`, `type`, `laboratoire`, `lieu`, `duree`, `capacite`, `type_inscription`, `date`, `description`, `animateur`, `partenaire`, `public`, `contenu_pedagogique`) VALUES (NULL, 'Conférence sur le Java', 'Développement Java', '0', '1', 'Labri salle 3', '3600', '60', '0', '2016-10-03 10:30:00', 'Conférence sur le développement java', '1', '0', '1', '');
INSERT INTO `atelier` (`id`, `titre_definitif`, `theme`, `type`, `laboratoire`, `lieu`, `duree`, `capacite`, `type_inscription`, `date`, `description`, `animateur`, `partenaire`, `public`, `contenu_pedagogique`) VALUES (NULL, 'Conférence sur le C++', 'Développement C++', '1', '1', 'Labri salle 4', '3600', '80', '0', '2016-10-03 10:30:00', 'Conférence sur le développement en C++', '1', '0', '1', '');
INSERT INTO `atelier` (`id`, `titre_definitif`, `theme`, `type`, `laboratoire`, `lieu`, `duree`, `capacite`, `type_inscription`, `date`, `description`, `animateur`, `partenaire`, `public`, `contenu_pedagogique`) VALUES (NULL, 'Analyse des environements', 'IDEs', '1', '2', 'Labri salle 3', '7200', '60', '0', '2016-10-04 10:00:00', 'Discours sur les IDEs', '1', '0', '1', '');