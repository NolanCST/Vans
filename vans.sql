-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 nov. 2023 à 11:12
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vans`
--

-- --------------------------------------------------------

--
-- Structure de la table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `id_auction` int NOT NULL AUTO_INCREMENT,
  `new_auction` text NOT NULL,
  `date_auction` datetime NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  PRIMARY KEY (`id_auction`),
  KEY `id_user` (`id_user`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `auction`
--

INSERT INTO `auction` (`id_auction`, `new_auction`, `date_auction`, `id_user`, `id_product`) VALUES
(14, '60000', '2023-11-14 21:01:45', 1, 5),
(15, '65000', '2023-11-14 21:01:56', 1, 5),
(16, '70000', '2023-11-15 11:13:35', 1, 5),
(17, '71000', '2023-11-15 12:04:16', 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` blob NOT NULL,
  `starting_price` int NOT NULL,
  `last_price` int NOT NULL,
  `end_date` date NOT NULL,
  `model` text NOT NULL,
  `mark` text NOT NULL,
  `power` text NOT NULL,
  `year` year NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_product`, `title`, `image`, `starting_price`, `last_price`, `end_date`, `model`, `mark`, `power`, `year`, `description`) VALUES
(5, 'Mustang Shelby 1976', '', 55000, 71000, '2023-09-24', 'Shelby', 'Mustang', '350', 1976, 'Magnifique Mustang Shelby de 1976, completement restaure'),
(8, 'Ferrari F40 Restaure', '', 450000, 0, '2023-11-30', 'F40', 'Ferrari', '650', 1980, 'Ferrari F40 entierement restaure, roule parfaitement bien'),
(9, 'Citroen 2CH', '', 15000, 0, '2023-11-30', '2CH', 'citroen', '2', 1950, 'Magnifique 2CH des annees 50'),
(10, '1972 Ford Capri (RS 2600 specification)', '', 33000, 0, '2023-11-29', 'Capri', 'Ford', '256', 1972, 'Description\r\n\r\nKilométrage : 46 784 km\r\n\r\n\r\nPoints forts\r\n\r\nResplendissant dans une peinture d\'époque frappante rappelant les voitures de compétition d\'usine\r\nV6 RS de 2,6 litres reconditionné monté en août 2016\r\nA fait l\'objet d\'une révision mécanique co'),
(11, '1972 Mercedes-Benz 280SE Automatic', '', 26000, 0, '2023-11-30', '280SE', 'Mercedes', '145', 1972, 'Description\r\n\r\nKilométrage : 186 844 km\r\n\r\n\r\nPoints forts\r\n\r\nMoteur I6 de 2,8 litres avec transmission automatique\r\nTrès original et jamais restauré\r\nPeinture crème et intérieur bleu');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `lastname`, `firstname`, `email`, `password`) VALUES
(1, 'Costa', 'Nolan', 'nolan.costa06@gmail.com', '$2y$10$V.j299rhzMoIw4YK3jdkDucbeYLaNc8olFfRCFXzqJKTJpVIH3BMO'),
(49, 'Mauffray', 'Thomas', 'Thomas.mauffray@gmail.com', '$2y$10$q2BM2KW5r2PYjVSEBoRLHOq09KCJ61G9XhUMF0DzjSrzb528lkIgm');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
