-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-butternotes17.alwaysdata.net
-- Generation Time: Jun 16, 2024 at 04:15 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `butternotes17_labase`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `identifiant` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom`, `prenom`, `email`, `mdp`, `identifiant`) VALUES
(0, '[value-2]', '[value-3]', '[value-4]', '123', 'papa');

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `id_eleve` int(6) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `TD` int(11) DEFAULT NULL,
  `TP` varchar(255) DEFAULT NULL,
  `formation` varchar(255) DEFAULT NULL,
  `annee_formation` int(5) DEFAULT NULL,
  `identifiant` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`id_eleve`, `nom`, `prenom`, `email`, `mdp`, `TD`, `TP`, `formation`, `annee_formation`, `identifiant`) VALUES
(1, 'YO KING CHUEN', 'DAREL', 'darel.yo-king-chuen@edu.univ-eiffel.fr', '123', 3, 'TPE', 'MMI', 1, 'mama');

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(11) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `matiere` varchar(255) DEFAULT NULL,
  `ue` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `identifiant` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `prenom`, `nom`, `matiere`, `ue`, `email`, `mdp`, `identifiant`) VALUES
(0, '[value-2]', '[value-3]', '[value-4]', '[value-5]', 'ty@kui.com', '123', 'ens'),
(1, 'Chan Nam', 'GUYANNE', 'Marketing', 'CONCEVOIR', 'chan-nam.guyanne@edu.univ-eiffeil.fr', '123', 'chan-nam.guyanne');

-- --------------------------------------------------------

--
-- Table structure for table `epreuve`
--

CREATE TABLE `epreuve` (
  `id_epreuve` int(11) NOT NULL,
  `ressource` varchar(255) DEFAULT NULL,
  `coeff` int(11) DEFAULT NULL,
  `note_elemin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `epreuve`
--

INSERT INTO `epreuve` (`id_epreuve`, `ressource`, `coeff`, `note_elemin`) VALUES
(1, '1', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `id_eleve` int(11) DEFAULT NULL,
  `id_ressource` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_note`, `note`, `id_eleve`, `id_ressource`) VALUES
(1, 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ressources`
--

CREATE TABLE `ressources` (
  `id_ressource` int(11) DEFAULT NULL,
  `matiere` varchar(255) DEFAULT NULL,
  `id_enseignant` int(11) DEFAULT NULL,
  `id_ue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ressources`
--

INSERT INTO `ressources` (`id_ressource`, `matiere`, `id_enseignant`, `id_ue`) VALUES
(1, 'MARKETING', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ue`
--

CREATE TABLE `ue` (
  `id_ue` int(11) DEFAULT NULL,
  `intitule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ue`
--

INSERT INTO `ue` (`id_ue`, `intitule`) VALUES
(1, 'COMPRENDRE'),
(2, 'ENTREPRENDRE'),
(3, 'sdhvb'),
(4, 'snivsjdv'),
(5, 'sdgjnsodvjo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id_eleve`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- Indexes for table `epreuve`
--
ALTER TABLE `epreuve`
  ADD PRIMARY KEY (`id_epreuve`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
