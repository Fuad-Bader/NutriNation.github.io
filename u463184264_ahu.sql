-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 04:04 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u463184264_ahu`
--

-- --------------------------------------------------------

--
-- Table structure for table `MedicalRecords`
--

CREATE TABLE `MedicalRecords` (
  `record_id` int(11) NOT NULL,
  `record_user_guid` char(36) NOT NULL,
  `record_height` int(11) NOT NULL,
  `record_weight` int(11) NOT NULL,
  `record_age` int(11) NOT NULL,
  `record_physicalActivity` varchar(256) NOT NULL,
  `record_Target` varchar(256) NOT NULL,
  `record_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `MedicalRecords`
--

INSERT INTO `MedicalRecords` (`record_id`, `record_user_guid`, `record_height`, `record_weight`, `record_age`, `record_physicalActivity`, `record_Target`, `record_date`) VALUES
(1, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 180, 73, 26, 'moderately active', 'Gain weight', '2023-05-12'),
(2, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 181, 72, 26, 'lightly active', 'Lose weight', '2023-05-12'),
(3, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 183, 74, 26, 'lightly active', 'Stay at the same weight', '2023-05-12'),
(4, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 185, 76, 26, 'sedentary', 'Lose weight', '2023-05-12'),
(5, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 185, 76, 28, 'sedentary', 'Lose weight', '2023-05-12'),
(6, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 185, 76, 28, 'sedentary', 'Lose weight', '2023-05-12'),
(7, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 185, 76, 28, 'sedentary', 'Lose weight', '2023-05-12'),
(8, '832feb29-f22f-11ed-87b8-7ae924f6661a', 190, 100, 21, 'sedentary', 'Lose weight', '2023-05-14'),
(9, '832feb29-f22f-11ed-87b8-7ae924f6661a', 190, 100, 22, 'sedentary', 'Lose weight', '2023-05-14'),
(10, '832feb29-f22f-11ed-87b8-7ae924f6661a', 178, 75, 21, 'sedentary', 'Lose weight', '2023-05-14'),
(11, 'be14d88f-f243-11ed-87b8-7ae924f6661a', 0, 0, 0, '0', '0', '2023-05-14'),
(12, 'de9cadff-f243-11ed-87b8-7ae924f6661a', 0, 0, 0, '0', '0', '2023-05-14'),
(13, 'e6cfc87b-f251-11ed-87b8-7ae924f6661a', 76, 85, 0, 'lightly active', 'Lose weight', '2023-05-14'),
(14, '70c38f12-f33a-11ed-87b8-7ae924f6661a', 187, 85, 0, 'lightly active', 'Gain weight', '2023-05-15'),
(15, '70c38f12-f33a-11ed-87b8-7ae924f6661a', 187, 85, 0, 'lightly active', 'Gain weight', '2023-05-15'),
(16, '70c38f12-f33a-11ed-87b8-7ae924f6661a', 187, 85, 0, 'lightly active', 'Gain weight', '2023-05-15'),
(17, '832feb29-f22f-11ed-87b8-7ae924f6661a', 190, 100, 21, 'sedentary', 'Lose weight', '2023-05-15'),
(18, 'b0bbe72e-f5b2-11ed-87b8-7ae924f6661a', 182, 125, 55, 'lightly active', 'Lose weight', '2023-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `guid` char(36) DEFAULT uuid(),
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user',
  `vkey` varchar(1000) NOT NULL,
  `verified` int(1) NOT NULL DEFAULT 0,
  `FullName` varchar(250) NOT NULL,
  `user_pic` varchar(256) NOT NULL DEFAULT 'images/NutriNation-logo.png',
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `Gender` varchar(5) NOT NULL DEFAULT 'None',
  `birthday` date NOT NULL,
  `Age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthday`,curdate())) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `guid`, `email`, `password`, `type`, `vkey`, `verified`, `FullName`, `user_pic`, `createdate`, `Gender`, `birthday`) VALUES
(9194, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 'abdalrhmanalsmadi1997@gmail.com', '85bf5831e593431e882887e077400b7f', 'user', 'e00cb91edcb32532b1583913e0cf99d0', 1, 'abdalrhman amen ismail alsmadi', 'images/NutriNation-logo.png', '2023-05-12 17:50:01.728667', 'Male', '1997-09-02'),
(9195, '832feb29-f22f-11ed-87b8-7ae924f6661a', 'fuad.bader@outlook.com', '71f41e8d5f020d37005606081ea67f52', 'user', '7382d0e99abf6eca30c8f24806242d38', 1, 'Fuad Ahmad Bader', 'images/NutriNation-logo.png', '2023-05-14 08:15:39.669169', 'Male', '2001-09-11'),
(9196, 'be14d88f-f243-11ed-87b8-7ae924f6661a', 'awwad.khaled69@gmail.com', '90abfb95b1edbf3fd315997fd0f1ae36', 'user', 'b9f1b890868e408fee2228614f66c17b', 0, 'Khaled', 'images/NutriNation-logo.png', '2023-05-14 10:40:28.411895', 'Male', '0000-00-00'),
(9197, 'de9cadff-f243-11ed-87b8-7ae924f6661a', '', 'ffb308b6e56f644aaf06173e8df3f00d', 'user', '92e6b9471dc50d6ca60e8ae4b8ac0a3c', 0, '', 'images/NutriNation-logo.png', '2023-05-14 10:41:22.989250', 'Femal', '2023-05-14'),
(9199, 'e6cfc87b-f251-11ed-87b8-7ae924f6661a', 'abdullahqaisi7@gmail.com', 'ce7425326eb064e79e9ba2830dcb8bda', 'user', 'e54239aa3f8c54504a4bfae4ab3f52a3', 0, 'Andullah', 'images/NutriNation-logo.png', '2023-05-14 12:21:49.700141', 'Male', '2023-05-14'),
(9200, '70c38f12-f33a-11ed-87b8-7ae924f6661a', 'vrlabvip@gmail.com', '0b647321a2a464a526061d5b949415c7', 'user', '3d7240b9709b1a14dfe97983dd542cee', 1, 'Khaled', 'images/NutriNation-logo.png', '2023-05-15 16:06:24.386024', 'Male', '2002-05-13'),
(9201, 'b0bbe72e-f5b2-11ed-87b8-7ae924f6661a', 'abader@jadara.edu.jo', '2f24632e682c2f12bb47a96c9505029f', 'user', '779989c4a6a48727ebdbb443d92db39c', 1, 'Ahmad', 'images/NutriNation-logo.png', '2023-05-18 19:32:13.643988', 'Male', '1967-12-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MedicalRecords`
--
ALTER TABLE `MedicalRecords`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `guid` (`guid`),
  ADD UNIQUE KEY `guid_2` (`guid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MedicalRecords`
--
ALTER TABLE `MedicalRecords`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
