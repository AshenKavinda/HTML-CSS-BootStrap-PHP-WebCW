-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2024 at 02:46 AM
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
-- Database: `chocoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `oderproduct`
--

DROP TABLE IF EXISTS `oderproduct`;
CREATE TABLE IF NOT EXISTS `oderproduct` (
  `OID` int NOT NULL,
  `PID` int NOT NULL,
  `count` int NOT NULL,
  UNIQUE KEY `OID` (`OID`,`PID`),
  KEY `PID` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `oderproduct`
--

INSERT INTO `oderproduct` (`OID`, `PID`, `count`) VALUES
(1, 1, 1),
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `OID` int NOT NULL,
  `price` int NOT NULL,
  `date` date NOT NULL,
  `cName` varchar(50) NOT NULL,
  `cAddress` varchar(100) NOT NULL,
  `cPno` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`OID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OID`, `price`, `date`, `cName`, `cAddress`, `cPno`, `status`) VALUES
(1, 3000, '2024-07-06', 'Ashen', 'Kalegana', 774237321, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `code` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`code`, `name`, `price`, `stock`, `image`) VALUES
(1, 'BigThree', 1000, 1, 'bigThree.jpeg'),
(2, 'Lindro 100g', 350, 0, 'redGood.jpeg'),
(3, 'Dairy Milk 60g', 400, 1, 'download.jpeg'),
(4, '21 pack', 2000, 1, 'giftPack.jpeg'),
(5, 'Rocher 200g', 800, 1, 'brown.jpeg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oderproduct`
--
ALTER TABLE `oderproduct`
  ADD CONSTRAINT `oderproduct_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `product` (`code`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `oderproduct_ibfk_2` FOREIGN KEY (`OID`) REFERENCES `order` (`OID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
