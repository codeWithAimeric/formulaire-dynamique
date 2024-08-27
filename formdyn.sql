-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2024 at 01:26 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formdyn`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240827112652', '2024-08-27 11:27:05', 147),
('DoctrineMigrations\\Version20240827121855', '2024-08-27 12:19:05', 74);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`) VALUES
(1, 'sdsqfq'),
(2, 'test'),
(3, 'testtes'),
(4, 'tes3'),
(5, 'jojojojo'),
(6, 'terstesqf'),
(7, 'sqdfsqdf'),
(8, 'erhrztze'),
(9, 'jijijijji'),
(10, 'dfdf'),
(11, 'popopo'),
(12, 'sqdfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `form_field`
--

DROP TABLE IF EXISTS `form_field`;
CREATE TABLE IF NOT EXISTS `form_field` (
  `id` int NOT NULL AUTO_INCREMENT,
  `form_id` int DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8B2E19B5FF69B7D` (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_field`
--

INSERT INTO `form_field` (`id`, `form_id`, `label`, `type`) VALUES
(1, 1, 'dfqsdf', 'text'),
(2, 2, 'destd', 'text'),
(3, 2, 'azer', 'date'),
(4, 3, 'nom', 'text'),
(5, 3, 'prenom', 'text'),
(6, 3, 'dadte', 'date'),
(7, 4, 'nom', 'text'),
(8, 4, 'daette', 'date'),
(9, 5, 'nom', 'text'),
(10, 6, 'test', 'textarea'),
(11, 7, 'tata', 'text'),
(12, 7, 'arez', 'textarea'),
(13, 8, 'nom', 'text'),
(14, 8, 'prenom', 'textarea'),
(15, 8, 'date', 'date'),
(16, 9, 'test', 'text'),
(17, 10, 'poihjiohj', 'number'),
(18, 11, 'oioio', 'date'),
(19, 12, 'qsdfqdsf', 'textarea');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `form_id` int DEFAULT NULL,
  `field_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `form_id`, `field_label`, `field_value`) VALUES
(1, 4, 'nom', 'john'),
(2, 4, 'daette', '2024-08-01'),
(3, 5, 'nom', 'test'),
(4, 6, 'test', 'hello world!!!'),
(5, 7, 'tata', 'tesqera'),
(6, 7, 'arez', 'zerazfzefhjykhloiloyitltyil'),
(7, 8, 'nom', 'john '),
(8, 8, 'prenom', 'Doe dfte'),
(9, 8, 'date', '2024-08-21'),
(10, 9, 'test', 'jojhoijho'),
(11, 10, 'poihjiohj', '16'),
(12, 11, 'oioio', '2024-08-04'),
(13, 3, 'nom', 'tost'),
(14, 3, 'prenom', 'totototo'),
(15, 3, 'dadte', '2024-08-06'),
(16, 5, 'nom', 'hghghgh33'),
(17, 12, 'qsdfqdsf', 'jijpazoejhfpazoeihjozajeafef'),
(18, 1, 'dfqsdf', 'eazfez');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_field`
--
ALTER TABLE `form_field`
  ADD CONSTRAINT `FK_D8B2E19B5FF69B7D` FOREIGN KEY (`form_id`) REFERENCES `form` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
