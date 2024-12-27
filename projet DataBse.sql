-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Ven 12 Mai 2023 à 08:44
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_classe`
--

CREATE TABLE IF NOT EXISTS `t_classe` (
  `CodeClasse` int(50) NOT NULL AUTO_INCREMENT,
  `NomClasse` varchar(50) NOT NULL,
  `CodeGroupe` int(50) NOT NULL,
  `CodeDepartement` int(50) NOT NULL,
  PRIMARY KEY (`CodeClasse`),
  KEY `CodeGroup` (`CodeGroupe`,`CodeDepartement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `t_classe`
--

INSERT INTO `t_classe` (`CodeClasse`, `NomClasse`, `CodeGroupe`, `CodeDepartement`) VALUES
(1, 'classe1', 1, 1),
(2, 'classe2', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_departement`
--

CREATE TABLE IF NOT EXISTS `t_departement` (
  `CodeDepartement` int(50) NOT NULL AUTO_INCREMENT,
  `NomDepartement` varchar(50) NOT NULL,
  PRIMARY KEY (`CodeDepartement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `t_departement`
--

INSERT INTO `t_departement` (`CodeDepartement`, `NomDepartement`) VALUES
(1, 'departement1'),
(2, 'departement2');

-- --------------------------------------------------------

--
-- Structure de la table `t_enseignant`
--

CREATE TABLE IF NOT EXISTS `t_enseignant` (
  `CodeEnseignant` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateRecrutement` date NOT NULL,
  `adress` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `CodeDepartement` int(50) NOT NULL,
  `CodeGrade` int(50) NOT NULL,
  PRIMARY KEY (`CodeEnseignant`),
  KEY `codeDepartement` (`CodeDepartement`,`CodeGrade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_enseignant`
--

INSERT INTO `t_enseignant` (`CodeEnseignant`, `nom`, `prenom`, `dateRecrutement`, `adress`, `mail`, `tel`, `CodeDepartement`, `CodeGrade`) VALUES
(1, 'zitoun', 'Chaima', '2023-05-03', 'kesra', 'chaima@gmail.com', 5555555, 2, 2),
(2, 'barkeoui', 'hejer', '2023-05-04', 'manouba', 'hejer@gmail.com', 53216974, 1, 1),
(3, 'bbb', 'bbbb', '2023-05-11', 'manouba', 'hejer@gmail.com', 53216974, 1, 2),
(5, 'ben romdhane', 'aicha', '2023-05-06', 'manouba', 'aichabenromdhane06@gmail.com', 54514546, 2, 2),
(6, 'med', 'abedli', '2023-04-13', 'mahdia', 'med@gmail.com', 141414, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_etudiant`
--

CREATE TABLE IF NOT EXISTS `t_etudiant` (
  `CodeEtudiant` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `DateNaissance` date NOT NULL,
  `CodeClasse` int(50) NOT NULL,
  `NumInscription` int(11) NOT NULL,
  `Adress` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `Tel` int(11) NOT NULL,
  PRIMARY KEY (`CodeEtudiant`),
  KEY `CodeClasse` (`CodeClasse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `t_etudiant`
--

INSERT INTO `t_etudiant` (`CodeEtudiant`, `nom`, `prenom`, `DateNaissance`, `CodeClasse`, `NumInscription`, `Adress`, `mail`, `Tel`) VALUES
(2, 'benromdhan', 'raslen', '2010-06-02', 1, 1212, 'manouba', 'islem@gmail.com', 54514546),
(3, 'salah', 'salah', '2014-05-06', 2, 1210, 'mahdia', 'med@gmail.com', 50505050),
(4, 'ines', 'mohamed', '2000-05-06', 2, 1210, 'mahdia', 'ines@gmail.com', 50505050),
(5, 'nour', 'med', '2002-05-06', 1, 1209, 'mahdia', 'nour@gmail.com', 50505050),
(7, 'ayari', 'nourchen', '0000-00-00', 1, 111525, 'manouba', 'nourchen@gmail.com', 53216974),
(8, 'ayari', 'nourchen', '2008-02-10', 1, 111525, 'manouba', 'nourchen@gmail.com', 53216974);

-- --------------------------------------------------------

--
-- Structure de la table `t_ficheabsence`
--

CREATE TABLE IF NOT EXISTS `t_ficheabsence` (
  `CodeFicheAbsence` int(50) NOT NULL AUTO_INCREMENT,
  `DateJour` date NOT NULL,
  `CodeMatiere` int(50) NOT NULL,
  `CodeEnseignant` int(50) NOT NULL,
  `CodeClasse` int(50) NOT NULL,
  PRIMARY KEY (`CodeFicheAbsence`),
  KEY `CodeMatiere` (`CodeMatiere`,`CodeEnseignant`,`CodeClasse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `t_ficheabsence`
--

INSERT INTO `t_ficheabsence` (`CodeFicheAbsence`, `DateJour`, `CodeMatiere`, `CodeEnseignant`, `CodeClasse`) VALUES
(1, '2023-05-01', 1, 1, 1),
(2, '2023-05-01', 2, 2, 1),
(4, '2023-05-01', 3, 2, 2),
(5, '2023-05-01', 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_ficheabsenceseance`
--

CREATE TABLE IF NOT EXISTS `t_ficheabsenceseance` (
  `CodeFicheAbsence` int(50) NOT NULL AUTO_INCREMENT,
  `CodeSeance` int(50) NOT NULL,
  PRIMARY KEY (`CodeFicheAbsence`),
  KEY `CodeSeance` (`CodeSeance`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `t_ficheabsenceseance`
--

INSERT INTO `t_ficheabsenceseance` (`CodeFicheAbsence`, `CodeSeance`) VALUES
(1, 1),
(4, 1),
(5, 1),
(2, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_grade`
--

CREATE TABLE IF NOT EXISTS `t_grade` (
  `CodeGrade` int(50) NOT NULL AUTO_INCREMENT,
  `NomGrade` varchar(50) NOT NULL,
  PRIMARY KEY (`CodeGrade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `t_grade`
--

INSERT INTO `t_grade` (`CodeGrade`, `NomGrade`) VALUES
(1, 'grade1'),
(2, 'grade2');

-- --------------------------------------------------------

--
-- Structure de la table `t_groupe`
--

CREATE TABLE IF NOT EXISTS `t_groupe` (
  `CodeGroupe` int(50) NOT NULL AUTO_INCREMENT,
  `NomGroupe` varchar(50) NOT NULL,
  PRIMARY KEY (`CodeGroupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `t_groupe`
--

INSERT INTO `t_groupe` (`CodeGroupe`, `NomGroupe`) VALUES
(1, 'groupe1'),
(2, 'groupe2');

-- --------------------------------------------------------

--
-- Structure de la table `t_ligneabsence`
--

CREATE TABLE IF NOT EXISTS `t_ligneabsence` (
  `CodeFicheAbsence` int(50) NOT NULL AUTO_INCREMENT,
  `CodeEtudiant` int(50) NOT NULL,
  PRIMARY KEY (`CodeFicheAbsence`),
  KEY `CodeEtudiant` (`CodeEtudiant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `t_ligneabsence`
--

INSERT INTO `t_ligneabsence` (`CodeFicheAbsence`, `CodeEtudiant`) VALUES
(1, 1),
(5, 1),
(2, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_matiere`
--

CREATE TABLE IF NOT EXISTS `t_matiere` (
  `CodeMatiere` int(50) NOT NULL AUTO_INCREMENT,
  `NomMatiere` varchar(50) NOT NULL,
  `NbreHeureCoursParSemaine` int(11) NOT NULL,
  `NbreHeureTDParSemaine` int(11) NOT NULL,
  `NbreHeureTPParSemaine` int(11) NOT NULL,
  PRIMARY KEY (`CodeMatiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_matiere`
--

INSERT INTO `t_matiere` (`CodeMatiere`, `NomMatiere`, `NbreHeureCoursParSemaine`, `NbreHeureTDParSemaine`, `NbreHeureTPParSemaine`) VALUES
(1, 'SGBD', 3, 2, 4),
(2, 'reseau', 3, 2, 2),
(4, 'Web', 2, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `t_seance`
--

CREATE TABLE IF NOT EXISTS `t_seance` (
  `CodeSeance` int(50) NOT NULL AUTO_INCREMENT,
  `NomSeance` varchar(50) NOT NULL,
  `HeureDebut` varchar(50) NOT NULL,
  `HeureFin` varchar(50) NOT NULL,
  PRIMARY KEY (`CodeSeance`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_seance`
--

INSERT INTO `t_seance` (`CodeSeance`, `NomSeance`, `HeureDebut`, `HeureFin`) VALUES
(1, 's1', '12', '13'),
(2, 's2', '10', '14'),
(4, 's3', '9', '12');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` varchar(50) NOT NULL,
  `passe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `passe`) VALUES
('admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
