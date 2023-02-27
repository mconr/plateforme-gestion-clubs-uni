-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 02:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estg_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(350) NOT NULL,
  `pass_admin` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `email_admin`, `pass_admin`) VALUES
(1, 'admin', '$2y$10$nX.G3oBpPTSJlYlEc4l5S.PAMFHfDc4DiOQaPuuJyzPLy8/rt0baG');

-- --------------------------------------------------------

--
-- Table structure for table `appartient`
--

CREATE TABLE `appartient` (
  `id_club` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appartient`
--

INSERT INTO `appartient` (`id_club`, `id_membre`) VALUES
(34, 29);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `nom_club` varchar(150) NOT NULL,
  `description_club` text NOT NULL,
  `logo_club` varchar(350) NOT NULL,
  `id_president` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id_club`, `nom_club`, `description_club`, `logo_club`, `id_president`) VALUES
(34, 'TNL ', 'le Club de Techno, c’est : – une classe en ligne pour mes élèves – l’hébergeur du “Techno Club”, une sélection de films à destination des élèves du collège, à regarder ou à enregistrer sur les chaînes gratuites de la TNT (que j’ai relancé en septembre 2018) – un site de ressources pédagogiques et technologiques plus ou moins utiles à destination de tous les collègues curieux La mise à jour du site avance petit-à-petit : – Les pages dédiées à l’utilisation d’Arduino et de mBlock sont rédigées – Les progressions du cycle 4 sont enfin finies !!!! Les 30 séquences sont en ligne, toutes ne sont pas encore corrigées … – Les corrections des fiches sont consultables après avoir récupéré un mot de passe par mail (à leclubdetechno – at- gmail.com) – La progression du cycle 3 prend son temps … Mais il ne reste plus qu’une seule séquence à finaliser … vous êtes de plus en plus nombreux à visiter le site et à me faire des retours sur le travail présenté. Merci beaucoup pour tous ces mots encourageants et positifs !!! Je me permets juste de vous indiquer que, en cas de sollicitation pour un mot de passe via les commentaires du site, je vous répondrai directement par mail car cela allège les pages. Afin de me permettre de vous répondre dans les plus brefs délais, veuillez vérifier l’adresse mail que vous m’envoyez car il m’arrive souvent d’être face à des adresses erronées. j’attends vos remarques sur mes nouvelles progressions (même si elles ne sont pas encore terminées)', 'uploads/logo-tnl.jpg', 34),
(35, 'Club Social', 'Description du Club ', 'uploads/VUE JS.webp', 35),
(36, 'club admin', 'kafjkfajfa', 'uploads/cryptage.jpg', 36);

-- --------------------------------------------------------

--
-- Table structure for table `demande_club`
--

CREATE TABLE `demande_club` (
  `id_demande_club` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `telephone` int(20) NOT NULL,
  `filliere` varchar(100) NOT NULL,
  `email` varchar(350) NOT NULL,
  `password` varchar(400) NOT NULL,
  `nom_club` varchar(300) NOT NULL,
  `motivation` text NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `demande_evenement`
--

CREATE TABLE `demande_evenement` (
  `id_demande_eve` int(11) NOT NULL,
  `nom_eve` varchar(500) NOT NULL,
  `description_eve` varchar(5000) NOT NULL,
  `photo_eve` varchar(400) NOT NULL,
  `date_eve` date NOT NULL,
  `lieu_eve` text NOT NULL,
  `id_club` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `demande_inscription`
--

CREATE TABLE `demande_inscription` (
  `id_demande` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  `motivation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `title_evenement` text NOT NULL,
  `description_evenement` text NOT NULL,
  `date_evenement` date NOT NULL,
  `lieu_evenement` varchar(500) NOT NULL,
  `logo_evenement` varchar(400) NOT NULL,
  `id_club` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `title_evenement`, `description_evenement`, `date_evenement`, `lieu_evenement`, `logo_evenement`, `id_club`) VALUES
(19, 'Utiliser Arduino en Technologie', 'Les nouveaux programmes de Technologie (depuis 2016) nous demandent de développer l’algorithmique et la programmation dans nos activités. Ce domaine est aussi à présent développé par nos collègues de Mathématiques dans leurs nouveaux programmes. Afin d’aborder ces nouveaux concepts avec nos élèves sans les bloquer par l’apprentissage d’un langage informatique, il a été, non-officiellement, convenu d’utiliser la programmation par blocs d’instructions (type Scratch et tous ses dérivés). Dans un souci de travailler en démarche de projet et d’avoir la possibilité de réaliser du prototypage rapide, il a été nécessaire de trouver des supports physiques sur lesquels nous pouvions développer des prototypes de systèmes automatisés simples, démontables et facilement pris en main par les élèves. Les collègues de Mathématiques, quant à eux, restent sur la partie théorique de la programmation et développent des projets purement numériques comme des applications ou des jeux vidéos.', '2021-06-03', 'EST Guelmim', 'uploads/ardouino.jpg', 34),
(21, 'How to become Programmer 2021', 'Les nouveaux programmes de Technologie (depuis 2016) nous demandent de développer l’algorithmique et la programmation dans nos activités. Ce domaine est aussi à présent développé par nos collègues de Mathématiques dans leurs nouveaux programmes. Afin d’aborder ces nouveaux concepts avec nos élèves sans les bloquer par l’apprentissage d’un langage informatique, il a été, non-officiellement, convenu d’utiliser la programmation par blocs d’instructions (type Scratch et tous ses dérivés). Dans un souci de travailler en démarche de projet et d’avoir la possibilité de réaliser du prototypage rapide, il a été nécessaire de trouver des supports physiques sur lesquels nous pouvions développer des prototypes de systèmes automatisés simples, démontables et facilement pris en main par les élèves. Les collègues de Mathématiques, quant à eux, restent sur la partie théorique de la programmation et développent des projets purement numériques comme des applications ou des jeux vidéos.', '2021-06-16', 'EST Guelmim', 'uploads/NODEJS.png', 34),
(22, 'How to become Millionaire from scratch', 'jofalgkmgahlga', '2021-06-16', 'EST Guelmim', 'uploads/25.png', 34);

-- --------------------------------------------------------

--
-- Table structure for table `filliere`
--

CREATE TABLE `filliere` (
  `id_filliere` int(11) NOT NULL,
  `nom_filliere` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filliere`
--

INSERT INTO `filliere` (`id_filliere`, `nom_filliere`) VALUES
(52, 'JKFJAFFA'),
(59, 'DUT Informatique'),
(61, 'DUT Informatique'),
(63, 'DUT Informatique'),
(64, 'af,af,,af'),
(65, 'DUT Informatique'),
(66, 'DUT Informatique'),
(67, 'DUT Informatique');

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `email_membre` varchar(350) NOT NULL,
  `date_inscription` date NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `email_membre`, `date_inscription`, `id_personne`) VALUES
(20, 'badrtaha@gmail.com', '2021-05-28', 39),
(25, 'WISSAL@GMAIL.COM', '2021-06-01', 48),
(27, 'dawsonkolber@gmail.com', '2021-06-02', 50),
(28, 'adjajhjafh', '2021-06-02', 51),
(29, 'mohamed@gmail.com', '2021-06-16', 54);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `telephone` int(20) NOT NULL,
  `id_filliere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `telephone`, `id_filliere`) VALUES
(39, 'Ezzaki', 'Abdelmajid', 661990340, 52),
(46, 'Badr', 'Ezzaki', 643345205, 59),
(48, 'Haji', 'wissal', 66666666, 61),
(50, 'Kolber', 'Dawson', 643345205, 63),
(51, 'afafa', ',a;f,;afda', 2147483647, 64),
(52, 'Kolber', 'Dawson', 643345205, 65),
(53, 'admin', 'admin', 645455545, 66),
(54, 'Elbekri', 'Mohamed', 645879878, 67);

-- --------------------------------------------------------

--
-- Table structure for table `president`
--

CREATE TABLE `president` (
  `id_president` int(11) NOT NULL,
  `email_president` varchar(200) NOT NULL,
  `pass_president` varchar(500) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `president`
--

INSERT INTO `president` (`id_president`, `email_president`, `pass_president`, `id_personne`) VALUES
(34, 'badr.mstk@gmail.com', '$2y$10$/fY2drNlahv9QrkmNfqdK.8rmM2fRoTDJfDfxaOFn3NFEbKtLQMiW', 46),
(35, 'dawsonkolber@gmail.com', '$2y$10$FDwdnLxXAUT3iehV/fgql.Zf3D5AXXHMOZ59n0pDNn1ydvOhgZDtS', 52),
(36, 'admin@gmail.com', '$2y$10$g3EwA7FxUjLCcHTDADaIfeSiqutMHawGQZTjFrUXC/nseyvDVreIy', 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`id_membre`,`id_club`),
  ADD KEY `fkAppartient` (`id_club`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`),
  ADD UNIQUE KEY `id_president` (`id_president`);

--
-- Indexes for table `demande_club`
--
ALTER TABLE `demande_club`
  ADD PRIMARY KEY (`id_demande_club`);

--
-- Indexes for table `demande_evenement`
--
ALTER TABLE `demande_evenement`
  ADD PRIMARY KEY (`id_demande_eve`),
  ADD KEY `id_club` (`id_club`) USING BTREE;

--
-- Indexes for table `demande_inscription`
--
ALTER TABLE `demande_inscription`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `fk1` (`id_membre`),
  ADD KEY `fk2` (`id_club`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `fk_eve` (`id_club`);

--
-- Indexes for table `filliere`
--
ALTER TABLE `filliere`
  ADD PRIMARY KEY (`id_filliere`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD KEY `id_personne` (`id_personne`) USING BTREE;

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`),
  ADD KEY `id_filliere` (`id_filliere`) USING BTREE;

--
-- Indexes for table `president`
--
ALTER TABLE `president`
  ADD PRIMARY KEY (`id_president`),
  ADD UNIQUE KEY `id_personne` (`id_personne`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `demande_club`
--
ALTER TABLE `demande_club`
  MODIFY `id_demande_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `demande_evenement`
--
ALTER TABLE `demande_evenement`
  MODIFY `id_demande_eve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `demande_inscription`
--
ALTER TABLE `demande_inscription`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `filliere`
--
ALTER TABLE `filliere`
  MODIFY `id_filliere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `president`
--
ALTER TABLE `president`
  MODIFY `id_president` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `fkAppartient` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`),
  ADD CONSTRAINT `fkAppartient2` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`);

--
-- Constraints for table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `fkPresident` FOREIGN KEY (`id_president`) REFERENCES `president` (`id_president`);

--
-- Constraints for table `demande_evenement`
--
ALTER TABLE `demande_evenement`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`);

--
-- Constraints for table `demande_inscription`
--
ALTER TABLE `demande_inscription`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`);

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_eve` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`);

--
-- Constraints for table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fkMembre` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Constraints for table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `fkFilliere` FOREIGN KEY (`id_filliere`) REFERENCES `filliere` (`id_filliere`);

--
-- Constraints for table `president`
--
ALTER TABLE `president`
  ADD CONSTRAINT `fkPersonne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
