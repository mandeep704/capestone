-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 02:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `pizza_id` int(10) NOT NULL,
  `pizza_name` varchar(50) NOT NULL,
  `pizza_description` varchar(1000) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`pizza_id`, `pizza_name`, `pizza_description`, `price`, `quantity`, `image`) VALUES
(1, 'Pizza1', 'This 37mm limited-edition Starmaster features a cream satin dial that lights up, three-hand movement and a brown leather strap.', 30, 49, 'images/pizza1.jpg'),
(2, 'Pizza2', 'From the Essential Ultra Slim Collection. This 40mm case quartz watch features a handsome sunray blue dial with goldtone details and a leather croco-embossed strap.', 50, 135, 'images/pizza2.jpg'),
(3, 'Pizza3', 'GUESS Watches is YOUNG, SEXY and ADVENTUROUS as we evolve into our 30th year with fashion, innovation and iconic timepieces.', 25, 48, 'images/pizza3.jpg'),
(4, 'Pizza4', 'From the Marine Star Series\r\nStainless steel and rose goldtone accents pop on navy with this chronograph timepiece\r\nQuartz movement', 32, 70, 'images/pizza4.jpg'),
(5, 'Pizza5', 'Classic watch featuring a leather strap and a minimalist design\r\nQuartz movement\r\nWater-resistant to 5 ATM\r\nSmooth bezel', 25, 54, 'images/pizza5.jpg'),
(6, 'Pizza6', 'Drawing inspiration from Mid-Century modernism, Dean\'s clean lines and classic shape produce a subtle yet visually striking effect. With a shiny steel case and gold-tone accents, this versatile timepiece can take you from day to night with ease. This Dean watch also features a chronograph movement.', 30, 44, 'images/pizza6.jpg'),
(7, 'Pizza7', 'Big Bang Tourbillon Power Reserve 5 Days Sapphire Baguettes', 22, 125, 'images/pizza7.jpg'),
(8, 'Pizza8', 'BVLGARI watch with stainless steel case, 18 kt rose gold bezel engraved with double logo, brown satiné soleil lacquered dial, diamond indexes and 18 kt rose gold and stainless steel bracelet', 24, 120, 'images/pizza8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `payment` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `address`, `payment`) VALUES
(5, 'vishal', 'kumar', '1224555', 'Credit card'),
(6, 'abc', 'def', 'dfkvd', 'Credit card'),
(7, 'Mandeep', 'Kaur', 'sgssgsgsgsg', 'Credit card'),
(8, 'gcgh', 'ddtg', 'cghc', 'Credit card');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`pizza_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `pizza_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
