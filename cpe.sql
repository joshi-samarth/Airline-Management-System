-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 03:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `1010_mumbai_delhi_2025_04_30_11_11_00`
--

CREATE TABLE `1010_mumbai_delhi_2025_04_30_11_11_00` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `flightNumber` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `seat` varchar(10) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `source` varchar(20) DEFAULT NULL,
  `destination` varchar(20) DEFAULT NULL,
  `departureDate` varchar(30) DEFAULT NULL,
  `departureTime` varchar(30) DEFAULT NULL,
  `arrivalTime` varchar(30) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `1010_mumbai_delhi_2025_04_30_11_11_00`
--

INSERT INTO `1010_mumbai_delhi_2025_04_30_11_11_00` (`id`, `username`, `flightNumber`, `name`, `gender`, `email`, `age`, `mobile`, `seat`, `price`, `source`, `destination`, `departureDate`, `departureTime`, `arrivalTime`, `timestamp`) VALUES
(1, '', '1010', 'sam', 'female', 'samarth31j@gmailcom', 56, '9876567890', 'B6', '7000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-03-31 17:06:39'),
(2, '', '1010', 'joshi', 'male', 'samarth31j@gmail.com', 67, '9876567890', 'E7', '3000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-03-31 17:06:39'),
(3, 'samarth.the.legend1@gmail.com', '1010', 'sam', 'male', 'sam@gmail.com', 45, '6666666666', 'F18', '5000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-04-01 02:28:44'),
(4, 'samarth.the.legend1@gmail.com', '1010', 'sama', 'male', 'sam@gmail.com', 34, '6666666666', 'E20', '3000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-04-01 02:28:44'),
(5, 'samarth.the.legend1@gmail.com', '1010', 'samarth', 'male', 's@gmail.com', 56, '5656565665', 'F18', '5000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-04-01 02:30:58'),
(6, 'samarth.the.legend1@gmail.com', '1010', 'sam', 'male', 's@gmail.com', 34, '6556565656', 'E20', '3000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-04-01 02:30:58'),
(7, 'samarth.the.legend1@gmail.com', '1010', 'samarth', 'male', 's@gmail.com', 56, '5656565665', 'F18', '5000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-04-01 02:31:17'),
(8, 'samarth.the.legend1@gmail.com', '1010', 'sam', 'male', 's@gmail.com', 34, '6556565656', 'E20', '3000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-04-01 02:31:17'),
(9, 'samarth.the.legend1@gmail.com', '1010', 'sam', 'male', 'samarth31j@gmailcom', 56, '9876567890', 'B5', '7000.00', 'mum', 'del', '2025-04-30', '11:11:00', '15:15:00', '2024-04-01 02:41:30'),
(10, 'samarth.the.legend1@gmail.com', '1010', 'sam', 'male', 'samarth31j@gmailcom', 56, '9876567890', 'B5', '7000.00', 'mumbai', 'delhi', '2025-04-30', '11:11:00', '15:15:00', '2024-04-01 02:43:33'),
(11, 'samarth.the.legend1@gmail.com', '1010', 'sam', 'male', 'samarth31j@gmailcom', 56, '9876567890', 'F16', '5000.00', 'mumbai', 'delhi', '2025-04-30', '11:11:00', '15:15:00', '2024-04-02 15:01:01'),
(12, 'samarth.the.legend1@gmail.com', '1010', 'joshi', 'female', 'samarth31j@gmail.com', 67, '9876567890', 'E6', '3000.00', 'mumbai', 'delhi', '2025-04-30', '11:11:00', '15:15:00', '2024-04-02 15:01:01'),
(13, 'samarth.the.legend1@gmail.com', '1010', 'samarth', 'male', 'sam@gmail.com', 12, '6565655665', 'F17', '5000.00', 'mumbai', 'delhi', '2025-04-30', '11:11:00', '15:15:00', '2024-04-02 15:02:13'),
(14, 'samarth.the.legend1@gmail.com', '1010', 'sam', 'male', 'sa@gg', 23, '2222222256', 'F7', '5000.00', 'mumbai', 'delhi', '2025-04-30', '11:11:00', '15:15:00', '2024-04-02 15:07:55'),
(15, 'samarth.the.legend1@gmail.com', '1010', 'sa', 'male', 's@gmai.g', 21, '4554444444', 'F6', '5000.00', 'mumbai', 'delhi', '2025-04-30', '11:11:00', '15:15:00', '2024-04-02 15:11:54'),
(16, 'samarth.the.legend1@gmail.com', '1010', 'sasa', 'male', 'sam@g', 23, '3232223332', 'B7', '7000.00', 'mumbai', 'delhi', '2025-04-30', '11:11:00', '15:15:00', '2024-04-02 15:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `2020_pune_nagpur_2024_05_07_14_11_00`
--

CREATE TABLE `2020_pune_nagpur_2024_05_07_14_11_00` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `flightNumber` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `seat` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `source` varchar(3) DEFAULT NULL,
  `destination` varchar(3) DEFAULT NULL,
  `departureDate` date DEFAULT NULL,
  `departureTime` time DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2020_pune_nagpur_2024_05_07_14_11_00`
--

INSERT INTO `2020_pune_nagpur_2024_05_07_14_11_00` (`id`, `username`, `flightNumber`, `name`, `gender`, `email`, `age`, `mobile`, `seat`, `price`, `source`, `destination`, `departureDate`, `departureTime`, `arrivalTime`, `timestamp`) VALUES
(1, 'sam@gmail.com', '2020', 'sma', 'male', 'sam@gmail.com', 12, '9356804973', 'B3', 1500.00, 'pun', 'nag', '2024-05-07', '14:11:00', '11:11:00', '2024-04-09 14:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `7070_delhi_punjab_2024_04_19_22_02_00`
--

CREATE TABLE `7070_delhi_punjab_2024_04_19_22_02_00` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `flightNumber` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `seat` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `source` varchar(3) DEFAULT NULL,
  `destination` varchar(3) DEFAULT NULL,
  `departureDate` date DEFAULT NULL,
  `departureTime` time DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `7070_kolkata_mumbai_2024_04_18_10_29_00`
--

CREATE TABLE `7070_kolkata_mumbai_2024_04_18_10_29_00` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `flightNumber` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `seat` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `source` varchar(3) DEFAULT NULL,
  `destination` varchar(3) DEFAULT NULL,
  `departureDate` date DEFAULT NULL,
  `departureTime` time DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `7070_kolkata_mumbai_2024_04_18_10_29_00`
--

INSERT INTO `7070_kolkata_mumbai_2024_04_18_10_29_00` (`id`, `username`, `flightNumber`, `name`, `gender`, `email`, `age`, `mobile`, `seat`, `price`, `source`, `destination`, `departureDate`, `departureTime`, `arrivalTime`, `timestamp`) VALUES
(1, 'sam@gmail.com', '7070', 'sma', 'male', 'sam@gmail.com', 12, '9356804973', 'E6', 2000.00, 'kol', 'mum', '2024-04-18', '10:29:00', '12:29:00', '2024-04-07 04:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `7070_kolkata_mumbai_2024_05_04_15_45_00`
--

CREATE TABLE `7070_kolkata_mumbai_2024_05_04_15_45_00` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `flightNumber` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `seat` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `source` varchar(3) DEFAULT NULL,
  `destination` varchar(3) DEFAULT NULL,
  `departureDate` date DEFAULT NULL,
  `departureTime` time DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `7070_kolkata_mumbai_2024_05_04_15_45_00`
--

INSERT INTO `7070_kolkata_mumbai_2024_05_04_15_45_00` (`id`, `username`, `flightNumber`, `name`, `gender`, `email`, `age`, `mobile`, `seat`, `price`, `source`, `destination`, `departureDate`, `departureTime`, `arrivalTime`, `timestamp`) VALUES
(1, 'sam@gmail.com', '7070', 'sma', 'male', 'sam@gmail.com', 12, '9356804973', 'B3', 5000.00, 'kol', 'mum', '2024-05-04', '15:45:00', '17:45:00', '2024-04-07 15:47:06'),
(2, 'sam@gmail.com', '7070', 'sma', 'male', 'sam@gmail.com', 12, '9356804973', 'E20', 2000.00, 'kol', 'mum', '2024-05-04', '15:45:00', '17:45:00', '2024-04-08 16:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `flightinsert`
--

CREATE TABLE `flightinsert` (
  `flightNumber` varchar(50) NOT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `departureDate` date NOT NULL,
  `departureTime` time NOT NULL,
  `arrivalTime` time NOT NULL,
  `economyPrice` decimal(10,2) NOT NULL,
  `businessPrice` decimal(10,2) NOT NULL,
  `firstclassPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flightinsert`
--

INSERT INTO `flightinsert` (`flightNumber`, `source`, `destination`, `departureDate`, `departureTime`, `arrivalTime`, `economyPrice`, `businessPrice`, `firstclassPrice`) VALUES
('7070', 'delhi', 'punjab', '2024-04-19', '22:02:00', '23:34:00', 1000.00, 3000.00, 2000.00),
('7070', 'pune', 'hydrabad', '2024-11-03', '11:11:00', '14:00:00', 1000.00, 3500.00, 2075.00),
('2020', 'pune', 'nagpur', '2024-05-07', '14:11:00', '11:11:00', 500.00, 1500.00, 1000.00),
('1010', 'pune', 'nagpur', '2025-11-11', '12:21:00', '22:01:00', 2112.00, 1500.00, 1122.00),
('3030', 'pune', 'nagpur', '2024-04-30', '30:27:04', '60:20:56', 5000.00, 7000.00, 5500.00),
('3030', 'pune', 'nagpur', '2024-04-30', '30:27:04', '60:20:56', 5000.00, 7000.00, 5500.00),
('3030', 'pune', 'nagpur', '2024-04-30', '30:27:04', '60:20:56', 5000.00, 7000.00, 5500.00),
('3030', 'pune', 'nagpur', '2024-04-30', '30:27:04', '60:20:56', 5000.00, 7000.00, 5500.00),
('3030', 'pune', 'nagpur', '2024-04-30', '30:27:04', '60:20:56', 5000.00, 7000.00, 5500.00);

-- --------------------------------------------------------

--
-- Table structure for table `flight_db`
--

CREATE TABLE `flight_db` (
  `flight_id` int(11) NOT NULL,
  `Source` varchar(255) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `Arrival Time` time NOT NULL,
  `Deparchar Time` time NOT NULL,
  `Date` date NOT NULL,
  `Seats` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight_db`
--

INSERT INTO `flight_db` (`flight_id`, `Source`, `Destination`, `Arrival Time`, `Deparchar Time`, `Date`, `Seats`, `Price`) VALUES
(1, 'New York', 'Los Angeles', '08:00:00', '10:00:00', '2024-04-01', 150, 200.00),
(2, 'Los Angeles', 'New York', '14:00:00', '16:00:00', '2024-04-01', 100, 250.00),
(3, 'Chicago', 'Miami', '09:30:00', '12:30:00', '2024-04-02', 200, 180.00),
(4, 'Miami', 'Chicago', '15:30:00', '18:30:00', '2024-04-02', 180, 190.00),
(5, 'San Francisco', 'Seattle', '11:00:00', '13:00:00', '2024-04-03', 120, 150.00),
(9, 'Denver', 'Dallas', '12:00:00', '14:00:00', '2024-04-05', 180, 170.00);

-- --------------------------------------------------------

--
-- Table structure for table `totalbookings`
--

CREATE TABLE `totalbookings` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `flightNumber` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `seat` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `departureDate` date DEFAULT NULL,
  `departureTime` time DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `totalbookings`
--

INSERT INTO `totalbookings` (`id`, `username`, `flightNumber`, `name`, `gender`, `email`, `age`, `mobile`, `seat`, `price`, `source`, `destination`, `departureDate`, `departureTime`, `arrivalTime`, `timestamp`) VALUES
(1, 'sam@gmail.com', '2020', 'sma', 'male', 'sam@gmail.com', 12, '9356804973', 'B3', 1500.00, 'pune', 'nagpur', '2024-05-07', '14:11:00', '11:11:00', '2024-04-09 14:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(4, 'samarth31j@gmail.com', 'e11170b8cbd2d74102651cb967fa28e5'),
(5, 'samarth.the.legend1@gmail.com', '1bbd886460827015e5d605ed44252251'),
(6, 'a86512306@gmail.com', '1bbd886460827015e5d605ed44252251'),
(7, 'omadmin@gmail.com', '1bbd886460827015e5d605ed44252251'),
(8, 'sam@g.com', '1bbd886460827015e5d605ed44252251'),
(9, 'samarth.the.legend2@gmail.com', '1bbd886460827015e5d605ed44252251'),
(10, 'samarth31n@gmail.com', '1bbd886460827015e5d605ed44252251'),
(11, 'omadmin1@gmail.com', '482f4bcc5f1eb72f0b85b8a0eb901c60'),
(12, 'shiv31jf@gmail.com', '785424b14e184689f302869d2d0049ff'),
(13, 'sam@gmail.com', '8cdd21051a8dd11a0e3dc8300f36d31d'),
(14, 'sak@gmail.com', '27e4175c7333be03aa37e276d5296b70');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'SAMARTH VISHNU JOSHI', 'samarth31j@gmail.com', '921718c2ba07faab93cbedb78fb27f87', 'IMG-20220317-WA0001.jpg'),
(2, 'Samarth Joshi ', 'samarth.the.legend1@gmail.com', '173b6301853277a0ac451dcf824a1d36', 'samarth.jpg'),
(3, 'Hi', 'samarth31j1@gmail.com', 'a061c361e610bc24b09c5a7d3012561c', 'IMG-20220314-WA0002.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1010_mumbai_delhi_2025_04_30_11_11_00`
--
ALTER TABLE `1010_mumbai_delhi_2025_04_30_11_11_00`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2020_pune_nagpur_2024_05_07_14_11_00`
--
ALTER TABLE `2020_pune_nagpur_2024_05_07_14_11_00`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `7070_delhi_punjab_2024_04_19_22_02_00`
--
ALTER TABLE `7070_delhi_punjab_2024_04_19_22_02_00`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `7070_kolkata_mumbai_2024_04_18_10_29_00`
--
ALTER TABLE `7070_kolkata_mumbai_2024_04_18_10_29_00`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `7070_kolkata_mumbai_2024_05_04_15_45_00`
--
ALTER TABLE `7070_kolkata_mumbai_2024_05_04_15_45_00`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_db`
--
ALTER TABLE `flight_db`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `totalbookings`
--
ALTER TABLE `totalbookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1010_mumbai_delhi_2025_04_30_11_11_00`
--
ALTER TABLE `1010_mumbai_delhi_2025_04_30_11_11_00`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `2020_pune_nagpur_2024_05_07_14_11_00`
--
ALTER TABLE `2020_pune_nagpur_2024_05_07_14_11_00`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `7070_delhi_punjab_2024_04_19_22_02_00`
--
ALTER TABLE `7070_delhi_punjab_2024_04_19_22_02_00`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `7070_kolkata_mumbai_2024_04_18_10_29_00`
--
ALTER TABLE `7070_kolkata_mumbai_2024_04_18_10_29_00`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `7070_kolkata_mumbai_2024_05_04_15_45_00`
--
ALTER TABLE `7070_kolkata_mumbai_2024_05_04_15_45_00`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flight_db`
--
ALTER TABLE `flight_db`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `totalbookings`
--
ALTER TABLE `totalbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
