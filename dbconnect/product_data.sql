-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2022 at 02:33 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `id` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productDetail` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productCode` varchar(6) NOT NULL,
  `productStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`id`, `productName`, `productDetail`, `productPrice`, `productCode`, `productStatus`) VALUES
(1, 'xxxxxxxxxx', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde corporis harum magnam consectetur nostrum aspernatur, debitis provident, fugit explicabo soluta tempora iure numquam adipisci veniam, consequuntur facilis. Aut, animi cupiditate, earum commodi aspernatur voluptatibus voluptatum sit omnis ad sapiente rem sequi minima et blanditiis delectus odio magni, ullam porro! Distinctio error, tempore excepturi voluptatem, quibusdam animi maiores aliquid eos itaque pariatur qui quia sapiente! Sol', 1000, '456789', 0),
(2, 'azsdf', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde corporis harum magnam consectetur nostrum aspernatur, debitis provident, fugit explicabo soluta tempora iure numquam adipisci veniam, consequuntur facilis. Aut, animi cupiditate, earum commodi aspernatur voluptatibus voluptatum sit omnis ad sapiente rem sequi minima et blanditiis delectus odio magni, ullam porro! Distinctio error, tempore excepturi voluptatem, quibusdam animi maiores aliquid eos itaque pariatur qui quia sapiente! Sol', 12300, '359396', 0),
(4, 'testtset', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde corporis harum magnam consectetur nostrum aspernatur, debitis provident, fugit explicabo soluta tempora iure numquam adipisci veniam, consequuntur facilis. Aut, animi cupiditate, earum commodi aspernatur voluptatibus voluptatum sit omnis ad sapiente rem sequi minima et blanditiis delectus odio magni, ullam porro! Distinctio error, tempore excepturi voluptatem, quibusdam animi maiores aliquid eos itaque pariatur qui quia sapiente! Sol', 456879, '38238', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
