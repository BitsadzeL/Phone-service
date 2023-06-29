-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 02:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `coworkers`
--

CREATE TABLE `coworkers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `pers_id` varchar(15) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coworkers`
--

INSERT INTO `coworkers` (`id`, `name`, `surname`, `pers_id`, `position`) VALUES
(1, 'John', 'Brown', '123456789', 'Call Operator'),
(4, 'Sam', 'McKennie', '123456798', 'Marketing specialist'),
(6, 'Andrei', 'Gonzalez', '147258368', 'Developer'),
(7, 'Elon', 'Musk', '987654321', 'CEO'),
(8, 'Aaron', 'Ramsey', '159753148', 'Manager'),
(9, 'Kevin', 'Milner', '854321598', 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(5) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `rating` int(3) DEFAULT NULL,
  `feedback` varchar(310) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `username`, `rating`, `feedback`) VALUES
(1, 'luka', 5, 'Very good service! Professional coworkers!'),
(2, 'luka', 5, 'Very good service! Professional coworkers!'),
(3, 'luka', 5, ''),
(4, 'luka', 1, ''),
(5, 'luka', 4, 'Pretty good TBH!'),
(6, 'luka', 4, 'Pretty good TBH!'),
(7, 'luka', 4, 'It took a little much time, but the result was pretty good'),
(8, 'test', 3, 'It is what it is!');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(10) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `working_hours` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `city`, `address`, `working_hours`) VALUES
(1, 'Tbilisi', 'Xosharauli street #9', '09:00-18:00'),
(2, 'Batumi', 'Ximshiashvili street #45', '12:00-20:00'),
(3, 'Tbilisi', 'Trading center \"Kidobani\"', '09:00-18:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `phonename` varchar(100) DEFAULT NULL,
  `phonecolor` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `phonename`, `phonecolor`, `address`, `contact`) VALUES
(1, 'Iphone 14 Pro Max', 'White', 'Tbilisi,Khosharauli str #9', '+995500123456'),
(2, 'Samsung Galaxy S22', 'Black', 'Chiatura, 9 aprili str', '+995987456014'),
(3, 'Iphone 13', 'Blue', 'agladze str #4', '+995500123456'),
(4, 'Samsung Galaxy S22', 'Black', 'Tbilisi, Gamrekeli str 38', '+995500123456'),
(5, 'Iphone 13', 'Blue', 'Batumi, Ximshiashvili street #45', '+995500123456'),
(6, 'Samsung Galaxy S22', 'Green', 'Tbilisi,Khosharauli str #9', '+995987456014'),
(7, 'Iphone 14 Pro Max', 'White', 'Rustavi, Central park', '+995987456014'),
(8, 'Samsung Galaxy S22', 'Green', 'Batumi, bulvari', '+995521023320'),
(9, 'Iphone 14 Pro Max', 'White', 'Tbilisi, IBSU', '+995568147000');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `phonephoto` varchar(255) DEFAULT NULL,
  `phonename` varchar(255) DEFAULT NULL,
  `phonecolor` varchar(255) DEFAULT NULL,
  `phoneprice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `phonephoto`, `phonename`, `phonecolor`, `phoneprice`) VALUES
(1, 'photos/iphone13-blue.png', 'Iphone 13', 'Blue', 799.00),
(2, 'photos/iphone13-red.png', 'Iphone 13', 'Red', 850.00),
(3, 'photos/iphone14max-white.jpeg', 'Iphone 14 Pro Max', 'White', 1100.00),
(4, 'photos/samsungs22-black.jpg', 'Samsung Galaxy S22', 'Black', 699.99),
(5, 'photos/samsungs22-green.jpg', 'Samsung Galaxy S22', 'Green', 749.99),
(6, 'photos/pocox3.jpeg', 'Xiaomi Poco X3', 'Dark blue', 510.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'luka', 'bec170723ab9c6edef68f03efd40da96'),
(3, 'system', '54b53072540eeeb8f8e9343e71f28176'),
(6, 'test', '098f6bcd4621d373cade4e832627b4f6'),
(7, 'jorik', '95d47be0d380a7cd3bb5bbe78e8bed49'),
(8, 'generali', '5e304482490da19864cdcfbe8e0adb7f'),
(9, 'tester', '76280b08373fa04dc5be97734624a69e');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(10) NOT NULL,
  `service` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `service`, `date`, `time`) VALUES
(3, 'Software service', '2023-06-16', '13:30'),
(4, 'Fix charging port', '2023-06-18', '13:30'),
(6, 'Apply screen protector', '2023-06-16', '15:00'),
(7, 'Battery replacement', '2023-06-18', '13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coworkers`
--
ALTER TABLE `coworkers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pers_id` (`pers_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_password` (`password`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coworkers`
--
ALTER TABLE `coworkers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
