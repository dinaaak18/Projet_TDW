-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 16, 2025 at 08:47 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asso_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activite`
--

CREATE TABLE `Activite` (
  `id` int NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Activite`
--

INSERT INTO `Activite` (`id`, `titre`, `description`, `date`, `lieu`, `categorie`) VALUES
(1, 'Marathon Solidaire', 'Course pour collecter des dons', '2025-03-15 00:00:00', 'Alger', 'Evenement'),
(2, 'Conférence sur la santé', 'Conférence avec des experts médicaux', '2025-04-10 00:00:00', 'Oran', 'Evenement'),
(3, 'Nouveau Partenaire', 'Nouveau partenaire avec notre association: Al-Nozha Travel Agency!', '2025-01-01 20:25:50', '/', 'Annonce'),
(4, 'Visite pour les enfants cancéreux', 'L\'association organise une visite pour les enfants cancéreux', '2025-01-17 20:32:15', 'Mustafa Bacha', 'Evenement'),
(5, 'Compagne de nettoyage des plages de Bordj El Behri', 'L\'association organise une compagne pour le nettoyage des plages de Bordj El Behri', '2025-02-26 20:51:04', 'Brodj El Beer', 'Evenement'),
(6, 'q', 'q', '2025-01-10 00:00:00', 'q', 'Evenement');

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `username`, `password`) VALUES
(9, 'admin', '$2y$10$T4PRZDbssvx0NCg6U21F8OOi00l40/0fEkkpopKZjRmBnZR5hWiM2');

-- --------------------------------------------------------

--
-- Table structure for table `Aide`
--

CREATE TABLE `Aide` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `datenais` date NOT NULL,
  `description` text,
  `etat` varchar(50) DEFAULT NULL,
  `dossier` varchar(255) DEFAULT NULL,
  `typeaide` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Aide`
--

INSERT INTO `Aide` (`id`, `user`, `nom`, `prenom`, `datenais`, `description`, `etat`, `dossier`, `typeaide`) VALUES
(13, 24, 'a', 'a', '2025-01-05', 'a', 'en attente', '/uploads/aide_678047c88aa06.zip', 'قفة رمضان'),
(14, 24, 'a', 'a', '2025-01-05', 'a', 'En attente', '/uploads/aide_678047ec454ac.zip', 'قفة رمضان'),
(15, 24, 'a', 'a', '2025-01-13', 'a', 'En attente', '/uploads/aide_67804ad47c2a0.zip', 'قفة رمضان'),
(16, 24, 'a', 'a', '2025-01-09', 'a', 'En attente', '/uploads/aide_67804d6b361b0.zip', 'Accident'),
(17, 22, 'q', 'q', '2025-01-06', 'qq', 'En attente', '/uploads/aide_67883f0bcef85.zip', 'Maladie'),
(18, 22, 'rf', 'fe', '2025-01-07', 'fef', 'En attente', '/uploads/aide_678841484f3dc.zip', 'Accident'),
(19, 24, 'aa', 'aa', '2025-01-14', 'aa', 'En attente', '/uploads/aide_6788c27741bae.zip', 'Maladie');

-- --------------------------------------------------------

--
-- Table structure for table `Avantage`
--

CREATE TABLE `Avantage` (
  `id` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `partenaire` int NOT NULL,
  `description` text,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Avantage`
--

INSERT INTO `Avantage` (`id`, `titre`, `partenaire`, `description`, `deadline`) VALUES
(1, 'Ftor a l\'hôtel New Days gratuit pour le mois du ramadan ', 1, 'Ftor a l\'hôtel New Days gratuit pour le mois du ramadan ', '2025-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `Benevolat`
--

CREATE TABLE `Benevolat` (
  `id` int NOT NULL,
  `membre_id` int NOT NULL,
  `activite_id` int NOT NULL,
  `etat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Benevolat`
--

INSERT INTO `Benevolat` (`id`, `membre_id`, `activite_id`, `etat`) VALUES
(10, 24, 1, NULL),
(11, 24, 5, NULL),
(12, 22, 2, NULL),
(16, 24, 4, NULL),
(17, 24, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Benevstat`
--

CREATE TABLE `Benevstat` (
  `id` int NOT NULL,
  `stat` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Benevstat`
--

INSERT INTO `Benevstat` (`id`, `stat`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Don`
--

CREATE TABLE `Don` (
  `id` int NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `membre_id` int NOT NULL,
  `Recu` varchar(255) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `utilisation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Don`
--

INSERT INTO `Don` (`id`, `montant`, `membre_id`, `Recu`, `etat`, `utilisation`) VALUES
(1, 5000.00, 1, NULL, NULL, NULL),
(2, 3000.00, 2, NULL, NULL, NULL),
(3, 7000.00, 3, NULL, NULL, NULL),
(7, 500.00, 24, '/uploads/6780368430b90_Screenshot 2025-01-09 at 20.03.34.png', NULL, NULL),
(8, 300.00, 24, '/uploads/67804b8190779_Exemple cours ACP.pdf', NULL, NULL),
(9, 300.00, 24, '/uploads/67804ca872e36_Exemple cours ACP.pdf', 'En attente', NULL),
(10, 100.00, 24, '/uploads/6787b703be8a1_Screenshot 2025-01-15 at 02.10.56.png', 'Confirmé', NULL),
(11, 100.00, 24, '/uploads/6787cb16c54e6_Screenshot 2025-01-14 at 15.25.12.png', 'En attente', NULL),
(12, 100.00, 24, '/uploads/6787cb2b381df_Screenshot 2025-01-14 at 15.25.12.png', 'En attente', NULL),
(13, 100.00, 24, '/uploads/6787cb33c7e41_Screenshot 2025-01-14 at 15.25.12.png', 'En attente', NULL),
(14, 10000.00, 22, '/uploads/678809186bd3b_Screenshot 2025-01-15 at 02.10.56.png', 'En attente', NULL),
(15, 100.00, 24, '/uploads/6788c2c0531f2_tempImage1IWAXE.jpg', 'En attente', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Donstat`
--

CREATE TABLE `Donstat` (
  `id` int NOT NULL,
  `stat` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Donstat`
--

INSERT INTO `Donstat` (`id`, `stat`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Historique`
--

CREATE TABLE `Historique` (
  `id` int NOT NULL,
  `user` int DEFAULT NULL,
  `remise` decimal(10,2) DEFAULT NULL,
  `partenaire_id` int DEFAULT NULL,
  `avantage_id` int DEFAULT NULL,
  `don_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Membre`
--

CREATE TABLE `Membre` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `approuv` tinyint(1) DEFAULT NULL,
  `cartedemande` enum('Premium','Jeune','Classique') DEFAULT NULL,
  `cartetype` enum('Premium','Jeune','Classique') DEFAULT NULL,
  `dateinscription` datetime DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `carteid` varchar(255) DEFAULT NULL,
  `carte` varchar(255) DEFAULT NULL,
  `recu` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Membre`
--

INSERT INTO `Membre` (`id`, `username`, `password`, `nom`, `prenom`, `approuv`, `cartedemande`, `cartetype`, `dateinscription`, `adresse`, `profession`, `carteid`, `carte`, `recu`, `photo`) VALUES
(1, 'lina', '$2y$10$KY0RFbPPoIwpi2RVCkRWzuMn2L414OG77elMz00s9tcQeel6r6GqC', 'Lina', 'Hadjadj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ritadj', '$2y$10$/TPr2ksTku9iCbEzCrqGBOSYuafw.1Fz82g7P7YR6ADxDCQpn8ujK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'tesnim', '$2y$10$pykEwd21VMbbsj/WPOLZguUKLvculN2QoFSCyiLjPQiITWDTl92xa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'widjden', '$2y$10$4GMiThHJXUpUZuor0sCsxevVua3qDw9PmBaFKVDVr1Gpn1r5P049S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'ayoub', '$2y$10$UELHnAOJkHLAXy8zZh6Nmutt3jV1LYCptf6eiUi3KergWcZhd9MdG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'abdou', '$2y$10$wiHtq.GV6ettQXbL8quRH.109DQKn.YpxoEeOZmg61O4nY.ObMRkm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'nassim', '$2y$10$GQc.2Q91rtRw9lHvEfUal.g3G.QnGbYqUoE2jhz2idgssS0gfg3xu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'dina', '$2y$10$EwSexzKryMgKXOdeER4vMuThpNInxewVjU5KONaRFbSDRotJziczK', 'Keddour', 'Dinaaaa', 1, 'Jeune', 'Jeune', '2025-01-16 00:00:00', 'q', 'etud', '/uploads/Screenshot 2025-01-08 at 02.54.03.png', '/Projet_WEB/public/uploads/cartes/22_carte.png', '/uploads/Screenshot 2025-01-08 at 02.54.03.png', '/uploads/Screenshot 2025-01-08 at 02.54.03.png'),
(23, 'oudjoud', '$2y$10$rqCK6sjJkek1q/RHPKzo.e9c5T4B5uHmOoPAKTI8ARQdAfgHJBQqK', 'Keddour', 'Oudjoud', NULL, 'Premium', NULL, '2025-01-16 00:00:00', 'a', 'a', '/uploads/tempImageZLm0RK.jpg', '/Projet_WEB/public/uploads/cartes/23_carte.png', '/uploads/tempImageTWsAma.jpg', '/uploads/IMG_8125.HEIC'),
(24, 'q', '$2y$10$l/kdkxgcn6QbIVMk8vc.JenDFLPKtU9pdJXvZPcNegNGizA2zwKDe', 'qq', 'q', NULL, 'Premium', NULL, '2025-01-16 00:00:00', 'rue', 'Prof', '/uploads/tempImageaUZg5W.jpg', '/Projet_WEB/public/uploads/cartes/24_carte.png', '/uploads/tempImage83uQi5.jpg', '/uploads/IMG_8125.HEIC');

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

CREATE TABLE `Notification` (
  `id` int NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `titre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Notification`
--

INSERT INTO `Notification` (`id`, `contenu`, `date`, `titre`) VALUES
(1, 'Réunion mensuelle le 15 janvier', '2025-01-10 10:00:00', 'Reunion'),
(2, 'Nouveau partenariat avec Hotel Lux', '2025-01-12 15:00:00', 'Nouveauté'),
(7, 'a', '2025-01-15 18:22:11', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `ParteFav`
--

CREATE TABLE `ParteFav` (
  `id` int NOT NULL,
  `membre_id` int NOT NULL,
  `partenaire_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ParteFav`
--

INSERT INTO `ParteFav` (`id`, `membre_id`, `partenaire_id`) VALUES
(2, 24, 81),
(4, 24, 86),
(5, 22, 85),
(6, 22, 78);

-- --------------------------------------------------------

--
-- Table structure for table `Partenaire`
--

CREATE TABLE `Partenaire` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `categorie` enum('Hotel','Clinique','Ecole','Agence de Voyage','Residence') NOT NULL,
  `wilaya` varchar(50) NOT NULL,
  `remiseP` varchar(50) NOT NULL,
  `remiseJ` varchar(50) NOT NULL,
  `remiseC` varchar(50) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `carte` varchar(255) DEFAULT NULL,
  `Description` text,
  `Stat` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Partenaire`
--

INSERT INTO `Partenaire` (`id`, `nom`, `username`, `password`, `categorie`, `wilaya`, `remiseP`, `remiseJ`, `remiseC`, `contact`, `adresse`, `photo`, `logo`, `carte`, `Description`, `Stat`) VALUES
(1, 'New day hotel', 'newdayhotel', '$2y$10$rZPKYm4vfbBpSx/TAZDkGOVwu2SZBhC1pLKRR3KQKruxdaLGRqbI6', 'Hotel', 'Alger ', '12', '12', '12', '0123456789', 'Alger Centre', '/Projet_WEB/public/assets/images/partners/hotel.jpeg', '/Projet_WEB/public/assets/images/partners/sahelhotel.png', NULL, '<br />\r\n<b>Warning</b>:  Undefined array key \"description\" in <b>/Applications/MAMP/htdocs/Projet_WEB/app/views/partners/edit.php</b> on line <b>38</b><br />\r\n<br />\r\n<b>Deprecated</b>:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in <b>/Applications/MAMP/htdocs/Projet_WEB/app/views/partners/edit.php</b> on line <b>38</b><br />\r\n', 61),
(68, 'Sahel Hotel', 'sahelhotel', '$2y$10$fjXH.A0uOQ9cqN0vsSVO2.hhjqCOp.Ze1C5ZIr9EKQ6D66aAyfF82', 'Hotel', 'Alger', '20', '15', '10', '0123456790', 'Sahel', '/Projet_WEB/public/assets/images/partners/hotel.jpeg', '/Projet_WEB/public/assets/images/partners/sahelhotel.png', NULL, NULL, NULL),
(69, 'Faiz Hotel', 'faizhotel', '$2y$10$rMQLSlbC6iPCwVIs3TTQ4e9D2v6XLVdpcqvhz0jLKi9d.q0PABeo6', 'Hotel', 'Alger', '20', '15', '10', '0123456781', 'Faiz District', '/Projet_WEB/public/assets/images/partners/hotel.jpeg', '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(70, 'Sofiane Hotel', 'sofianehotel', '$2y$10$9uMClBRHm.H/ktsHdgv3.ezfpDTXk3IO696qSoSeY.K0jdTzGO5vm', 'Hotel', 'Alger', '20', '15', '10', '0123456782', 'Sofiane Zone', '/Projet_WEB/public/assets/images/partners/hotel.jpeg', '/Projet_WEB/public/assets/images/partners/faizhotel.jpeg', NULL, NULL, NULL),
(71, 'Al-Azhar Clinic Dali Ibrahim', 'alazharclinic', '$2y$10$dXtmxHqxptB97x9OjDZVceKn3l1CSXiM6S6.jxyUDTkLw0quQ2Mv6', 'Clinique', 'Alger', '10', '5', '5', '0123456783', 'Dali Ibrahim', '/Projet_WEB/public/assets/images/partners/clinique.jpeg', '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(72, 'Harawa Dental Surgery Clinic', 'harawaclinic', '$2y$10$BStw0gT7LeMpq80itClYTeA0.PI5qtFR2SI2WH2C/D2K/F1cJqrZu', 'Clinique', 'Alger', '20', '15', '10', '0123456784', 'Harawa', '/Projet_WEB/public/assets/images/partners/clinique.jpeg', '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(73, 'Glamour Clinic (cosmetic)', 'glamourclinic', '$2y$10$yc3Ns10pqgVkHV92cmW7GuDY22PTf9UlI7ug0Eo.Oxvyj2x.iQDHG', 'Clinique', 'Alger', '40', '30', '20', '0123456785', 'Glamour Center', '/Projet_WEB/public/assets/images/partners/clinique.jpeg', '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(74, 'MG School for Phone Repair', 'mgschool', '$2y$10$MD6gDexU4Wuu1ewB0FNX1uvjDL1mhSpnxhNMwC69zV/3CPD7BYa6i', 'Ecole', 'Alger', '20', '15', '10', '0123456786', 'Harrach', '/Projet_WEB/public/assets/images/partners/school.jpeg', '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(75, 'Sabri Hotel', 'sabrihotel', '$2y$10$S0PYyOsbQnWO0tLTl.AvUO7SiDdHiLV076xtnmkghlEUuPJX20TQ.', 'Hotel', 'Annaba', '20', '15', '10', '0223456789', 'Sabri District', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(76, 'CH Shaker Hotel', 'chshakerhotel', '$2y$10$mMA/pFUw29KNaynRt5B88emFkHFNBdruXVhMDTl2.JUAu9aYmsS1S', 'Hotel', 'Annaba', '25', '20', '15', '0223456790', 'Annaba Center', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(77, 'Cortile Hotel', 'cortilehotel', '$2y$10$Dd3zqN0sa8aaWeWTTDOn3.0fs4fsykmfmzrOrpijzQ6TX7ThSAYYK', 'Hotel', 'Batna', '25', '20', '15', '0323456789', 'Cortile Zone', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(78, 'Painless Dentistry Clinic', 'painlessclinic', '$2y$10$qc4yOF4lc8dPH6uRikJzwerhNpcGhTWbHlXhinRNkFAnRDfPT5d.W', 'Clinique', 'Batna', '30', '25', '20', '0323456790', 'Batna Center', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(79, 'Raya Academy', 'rayaacademy', '$2y$10$gi5MHpvxASfFVYjLgPeUTuKnJ7fgM5.mSMbUhUEompbI.rNY0xuS2', 'Ecole', 'Batna', '30', '25', '20', '0323456781', 'Raya Campus', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(80, 'Golden H Hotel', 'goldenhhotel', '$2y$10$Civ68YsvHY2VPdB2tfuKMOCymd5Y3wRcGvAnLo7gKlB1cetyPQ/JW', 'Hotel', 'Batna', '25', '20', '15', '0323456782', 'Golden Zone', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(81, 'Atlantis Hotel', 'atlantishotel', '$2y$10$1tnrIYE9AqBZyeg6XSB/HOlXCGonCVtn/fi.IxUSl0hjTiXZWZ6/G', 'Hotel', 'Batna', '30', '25', '20', '0323456783', 'Atlantis Area', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(82, 'Rameau d\'Olivier Clinic', 'rameauclinic', '$2y$10$pPJ.xkVdk7yBaXuffyhE..dyYmlB3dMqWg6lDeCATTEkDpzMBLoHi', 'Clinique', 'Bejaia', '10', '5', '5', '0433456789', 'Bejaia Center', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(83, 'Brayline Travel Agency', 'braylinetravel', '$2y$10$O7HRX80V16BkumWTYRGoBOPR6PX2H3JmlfcGs9hsndzSrWirnje4y', 'Agence de Voyage', 'Bejaia', 'Non spécifié', 'Non spécifié', 'Non spécifié', '0433456790', 'Bejaia', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(84, 'Tassili School', 'tassilischool', '$2y$10$tEK6oqj.FZiqH7UBWja2UeH5ngNi8W2K/SKRflRK2DGW.Xwfek6Xy', 'Ecole', 'Bejaia', 'Non spécifié', 'Non spécifié', 'Non spécifié', '0433456781', 'Tassili Area', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(85, 'Agrimas Hotel', 'agrimashotel', '$2y$10$NzdeeH3ShYGpw.Pg5iGq8uUb2a7C9VrViZTAX30PJe4LrxWFpykG6', 'Hotel', 'Mascara', '30', '25', '20', '0483456789', 'Mascara District', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, 'Hotel en Alger centre', NULL),
(86, 'Beladi Suite Hotel', 'beladisuite', '$2y$10$lXRYyR6fV18wpLoB8.xpje3p6OELeCOBLt0sPU1PK.AC02dJZDJRK', 'Hotel', 'Oran', '30', '25', '20', '0493456789', 'Oran Center', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL),
(87, 'Residence Haja Yamina', 'hajayamina', '$2y$10$bTxgazi0yth8P901i30tj.t2TqnZufQjn.Ur.wEAk6E6QIZxrf/8.', 'Residence', 'Tlemcen', '30', '25', '20', '0433456782', 'Tlemcen', NULL, '/Projet_WEB/public/assets/images/partners/newdayhotel.jpeg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `TypeAide`
--

CREATE TABLE `TypeAide` (
  `id` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `TypeAide`
--

INSERT INTO `TypeAide` (`id`, `type`, `description`) VALUES
(1, 'Maladie', 'un dossier qui contient des certificats médicaux doit être joigne, la carte national et des photos de la personne concernée'),
(2, 'Accident', 'les documents suivants sont nécessaires:\r\nActe familiale,\r\nCertificats médicaux,\r\nAssurance.'),
(3, 'قفة رمضان', 'Revenu annuel,\r\nLivret de famille.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Activite`
--
ALTER TABLE `Activite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Aide`
--
ALTER TABLE `Aide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `Avantage`
--
ALTER TABLE `Avantage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partenaire` (`partenaire`);

--
-- Indexes for table `Benevolat`
--
ALTER TABLE `Benevolat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_benevolat` (`membre_id`,`activite_id`),
  ADD KEY `activite_id` (`activite_id`);

--
-- Indexes for table `Benevstat`
--
ALTER TABLE `Benevstat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Don`
--
ALTER TABLE `Don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membre_id` (`membre_id`);

--
-- Indexes for table `Donstat`
--
ALTER TABLE `Donstat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Historique`
--
ALTER TABLE `Historique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `partenaire_id` (`partenaire_id`),
  ADD KEY `avantage_id` (`avantage_id`),
  ADD KEY `don_id` (`don_id`);

--
-- Indexes for table `Membre`
--
ALTER TABLE `Membre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ParteFav`
--
ALTER TABLE `ParteFav`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membre_id` (`membre_id`),
  ADD KEY `partenaire_id` (`partenaire_id`);

--
-- Indexes for table `Partenaire`
--
ALTER TABLE `Partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TypeAide`
--
ALTER TABLE `TypeAide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Activite`
--
ALTER TABLE `Activite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Aide`
--
ALTER TABLE `Aide`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Avantage`
--
ALTER TABLE `Avantage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Benevolat`
--
ALTER TABLE `Benevolat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Benevstat`
--
ALTER TABLE `Benevstat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Don`
--
ALTER TABLE `Don`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Donstat`
--
ALTER TABLE `Donstat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Historique`
--
ALTER TABLE `Historique`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Membre`
--
ALTER TABLE `Membre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Notification`
--
ALTER TABLE `Notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ParteFav`
--
ALTER TABLE `ParteFav`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Partenaire`
--
ALTER TABLE `Partenaire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `TypeAide`
--
ALTER TABLE `TypeAide`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Aide`
--
ALTER TABLE `Aide`
  ADD CONSTRAINT `aide_ibfk_1` FOREIGN KEY (`user`) REFERENCES `Membre` (`id`);

--
-- Constraints for table `Avantage`
--
ALTER TABLE `Avantage`
  ADD CONSTRAINT `avantage_ibfk_1` FOREIGN KEY (`partenaire`) REFERENCES `Partenaire` (`id`);

--
-- Constraints for table `Benevolat`
--
ALTER TABLE `Benevolat`
  ADD CONSTRAINT `benevolat_ibfk_1` FOREIGN KEY (`membre_id`) REFERENCES `Membre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `benevolat_ibfk_2` FOREIGN KEY (`activite_id`) REFERENCES `Activite` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Don`
--
ALTER TABLE `Don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`membre_id`) REFERENCES `Membre` (`id`);

--
-- Constraints for table `Historique`
--
ALTER TABLE `Historique`
  ADD CONSTRAINT `historique_ibfk_1` FOREIGN KEY (`user`) REFERENCES `Membre` (`id`),
  ADD CONSTRAINT `historique_ibfk_2` FOREIGN KEY (`partenaire_id`) REFERENCES `Partenaire` (`id`),
  ADD CONSTRAINT `historique_ibfk_3` FOREIGN KEY (`avantage_id`) REFERENCES `Avantage` (`id`),
  ADD CONSTRAINT `historique_ibfk_4` FOREIGN KEY (`don_id`) REFERENCES `Don` (`id`);

--
-- Constraints for table `ParteFav`
--
ALTER TABLE `ParteFav`
  ADD CONSTRAINT `partefav_ibfk_1` FOREIGN KEY (`membre_id`) REFERENCES `Membre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partefav_ibfk_2` FOREIGN KEY (`partenaire_id`) REFERENCES `Partenaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
