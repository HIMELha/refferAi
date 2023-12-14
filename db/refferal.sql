-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 01:42 PM
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
-- Database: `refferal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `reff_users`
--

CREATE TABLE `reff_users` (
  `id` int(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `reffered` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reff_users`
--

INSERT INTO `reff_users` (`id`, `username`, `reffered`) VALUES
(2, 'himela', 'alexis');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `reffers` int(255) NOT NULL,
  `reffered_by` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reg_date`, `balance`, `reffers`, `reffered_by`) VALUES
(1, 'webha@gmail.com', 'webha@gmail.com', 'webha@gmail.com', '20 may 2023 , 20:18:07', 357, 22, NULL),
(2, 'arian44@gmail.com', 'arian44@gmail.com', 'arian44@gmail.com', '13 May 2023 , 06:35:32  ', 30, 4, NULL),
(44, 'Admin@Dasf.Cm', 'Admin@Dasf.Cm', 'Admin@Dasf.Cm', '14 May 2023 , 01:38:44  ', 10, 0, 1),
(45, 'himelhasan@gmail.com', 'himelhasan@gmail.com', 'himelhasan@gmail.com', '14 May 2023 , 12:34:08  ', 10, 0, 2),
(46, 'arian44@gm', 'arian44@gm', 'arian44@gm', '14 May 2023 , 02:42:28  ', 10, 0, 1),
(47, 'Tajbir islam ', 'studenttajbirislam@gmail.com', '123456', '14 May 2023 , 02:43:58  ', 10, 0, 2),
(48, 'misraf', 'misraf.social@gmail.com', 'misraf', '14 May 2023 , 03:01:24  ', 10, 0, 2),
(49, 'Suuuh', 'admin@yourdomain.com', '112233', '14 May 2023 , 03:10:07  ', 10, 0, 2),
(50, 'Jjh', 'jhh@gmail.com', 'hhh', '14 May 2023 , 03:26:19  ', 10, 0, 1),
(51, 'x', 'abc@gmail.com', 'abc@gmail.com', '14 May 2023 , 04:49:11  ', 10, 0, 1),
(52, 'Rofiq', 'rofiqulislamrobiul23@gmail.com', 'asdfgh', '14 May 2023 , 05:00:56  ', 10, 0, 1),
(53, 'Asd', 'asd@asd.com', 'asdasdas', '14 May 2023 , 05:18:29  ', 10, 0, 1),
(54, 'Uuuj', 'Hhhh.@gmail.com', 'vyhb777b', '14 May 2023 , 09:06:26  ', 10, 0, 1),
(55, 'Ghgh', 'afrantarek123456789@gmail.com', '111111111', '15 May 2023 , 12:45:22  ', 10, 0, 1),
(56, 'Fhhfhf', 'lteach@gmail.com', 'lteach@gmail.com', '15 May 2023 , 03:35:23  ', 10, 0, 1),
(57, 'hello', 'hello@gmail.com', 'hello', '15 May 2023 , 04:04:16  ', 10, 0, 1),
(58, 'akibha@ga', 'akibha@ga', 'akibha@ga', '15 May 2023 , 07:10:24  ', 3, 0, 1),
(59, 'test', 'test@mail.com', 'test', '15 May 2023 , 07:19:21  ', 1, 0, 1),
(60, 'adminâ€™ or â€˜1â€™ = â€˜1', 'gafiko9209@syswift.com', 'O!n#EGSG^XqBd55L', '15 May 2023 , 04:46:37  ', 0, 0, 1),
(61, 'Hi', 'hubd@gmail.com', 'hubd@gmail.com', '18 May 2023 , 03:06:21  ', 1010, 1, 1),
(62, 'HEY', 'hibd@gmail.com', 'hibd@gmail.com', '18 May 2023 , 11:43:18  ', 1000, 0, 61),
(63, 'nafy@mailinator.com', 'nafy@mailinator.com', 'nafy@mailinator.com', '14 Dec 2023 , 01:21:20  ', 9900, 0, 1),
(64, 'user@mail.com', 'user@mail.com', '123456', '14 Dec 2023 , 01:36:20  ', 9900, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `draw_date` varchar(255) NOT NULL,
  `pay_condition` varchar(255) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `name`, `amount`, `method`, `address`, `draw_date`, `pay_condition`) VALUES
(4, 'webha@gmail.com', 100, 'nagad', '1747760521', '18:25 , 13 May, 2023', 'Paid'),
(25, 'webha@gmail.com', 100, 'nagad', '193743534', '14:02 , 14 May, 2023', 'Paid'),
(26, 'webha@gmail.com', 500, 'binance', '16735674', '12:09 , 14 May, 2023', 'Paid'),
(27, 'arian44@gmail.com', 100, 'nagad', '1890906890', '12:36 , 14 May, 2023', 'Paid'),
(28, 'arian44@gmail.com', 100, 'nagad', '259957895789', '12:36 , 14 May, 2023', 'Paid'),
(29, 'akibha@ga', 200, 'bkash', '959590859', '07:11 , 15 May, 2023', 'Reject'),
(30, 'test', 599, 'nagad', '1943543543', '07:19 , 15 May, 2023', 'Paid'),
(31, 'test', 100, 'binance', '879759', '07:20 , 15 May, 2023', 'Paid'),
(32, 'adminâ€™ or â€˜1â€™ = â€˜1', 1000, 'bkash', '1721377289', '16:47 , 15 May, 2023', 'Paid'),
(33, 'test', 100, 'binance', '546537', '15:32 , 30 May, 2023', 'Paid'),
(34, 'test', 100, 'bkash', '3453453465', '17:37 , 02 Jun, 2023', 'Reject'),
(35, 'test', 100, 'binance', '76976956789', '05:10 , 04 Jun, 2023', 'Paid'),
(36, 'akibha@ga', 507, 'nagad', '90869087690', '14:46 , 17 Jun, 2023', 'Paid'),
(37, 'akibha@ga', 290, 'bkash', '456436', '17:45 , 27 Jun, 2023', 'Paid'),
(39, 'user@mail.com', 100, 'bkash', '1923423424', '13:38 , 14 Dec, 2023', 'Paid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `reff_users`
--
ALTER TABLE `reff_users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
