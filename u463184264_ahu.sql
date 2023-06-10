-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 10:39 AM
-- Server version: 10.6.12-MariaDB-cll-lve
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
-- Table structure for table `calories`
--

CREATE TABLE `calories` (
  `id` bigint(11) NOT NULL,
  `record_guid` char(36) NOT NULL DEFAULT 'uuid()',
  `user_guid` char(36) NOT NULL DEFAULT 'uuid()',
  `caloreis_record` bigint(11) NOT NULL DEFAULT 0,
  `record_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calories`
--

INSERT INTO `calories` (`id`, `record_guid`, `user_guid`, `caloreis_record`, `record_date`) VALUES
(13, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 2953, '2023-06-09'),
(15, '6e6a50e0-06f5-11ee-813e-1fbe5f9efc17', '3e7f8acc-06ba-11ee-813e-1fbe5f9efc17', 350, '2023-06-09'),
(16, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', '3b266756-0002-11ee-813e-1fbe5f9efc17', 2228, '2023-06-09'),
(17, '9995b1f8-070b-11ee-813e-1fbe5f9efc17', '18590ea4-0708-11ee-813e-1fbe5f9efc17', 0, '2023-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `calories_record_details`
--

CREATE TABLE `calories_record_details` (
  `id` bigint(11) NOT NULL,
  `calories_record_id` char(36) NOT NULL,
  `food_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calories_record_details`
--

INSERT INTO `calories_record_details` (`id`, `calories_record_id`, `food_id`) VALUES
(126, '6e6a50e0-06f5-11ee-813e-1fbe5f9efc17', 5),
(127, '6e6a50e0-06f5-11ee-813e-1fbe5f9efc17', 7),
(161, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 4),
(162, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 5),
(163, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 6),
(164, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 7),
(165, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 8),
(166, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 9),
(167, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 10),
(168, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 26),
(169, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 27),
(170, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 28),
(171, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 30),
(172, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 32),
(173, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 33),
(174, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 34),
(175, '2811b007-06f4-11ee-813e-1fbe5f9efc17', 12),
(176, '9995b1f8-070b-11ee-813e-1fbe5f9efc17', 4),
(177, '9995b1f8-070b-11ee-813e-1fbe5f9efc17', 5),
(178, '9995b1f8-070b-11ee-813e-1fbe5f9efc17', 6),
(187, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', 4),
(188, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', 10),
(189, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', 2),
(190, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', 26),
(191, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', 29),
(192, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', 11),
(193, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', 21),
(194, 'd38ac67c-0705-11ee-813e-1fbe5f9efc17', 25);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `food_pic` varchar(256) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Calories` int(10) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `Name`, `food_pic`, `Type`, `Calories`, `weight`) VALUES
(1, 'Apple', 'https://pngfre.com/wp-content/uploads/apple-43-1024x1015.png', 'Fruit', 44, 100),
(2, 'Banana', 'https://png.pngtree.com/png-clipart/20220716/ourmid/pngtree-banana-yellow-fruit-banana-skewers-png-image_5944324.png', 'Fruit', 65, 100),
(3, 'Cranberries', 'https://www.pngkey.com/png/full/107-1071513_about-cranberries-transparent-cranberry-clipart.png', 'Fruit', 25, 100),
(4, 'Arabic Bread', 'https://www.pngplay.com/wp-content/uploads/13/Pita-Bread-PNG-Photos.png', 'Carbs', 300, 100),
(5, 'White Bread', 'https://www.freepnglogos.com/uploads/bread-png/bread-png-transparent-image-pngpix-28.png', 'Carbs', 240, 100),
(6, 'Corn Flakes', 'https://ahu.snobar-software.tech/images/pngwing.com.png', 'Carbs', 370, 100),
(7, 'Boiled Pasta', 'https://www.pngmart.com/files/5/Spaghetti-PNG-Transparent-Image.png', 'Carbs', 110, 100),
(8, 'Oats', 'https://www.pngall.com/wp-content/uploads/10/Oats-Oatmeal-PNG-Images.png', 'Carbs', 55, 100),
(9, 'White Rice', 'https://www.pngall.com/wp-content/uploads/2018/04/Rice.png', 'Carbs', 140, 100),
(10, 'Brown Rice', 'https://www.pngarts.com/files/3/Brown-Rice-PNG-Picture.png', 'Carbs', 135, 100),
(11, 'Roasted Beef', 'https://freepngimg.com/thumb/meat/35946-7-cooked-meat.png', 'Protein', 280, 100),
(12, 'Roasted Lamb', 'https://static.vecteezy.com/system/resources/previews/021/217/694/non_2x/roasted-lamb-chop-png.png', 'Protein', 300, 100),
(13, 'Liver', 'https://images.eatthismuch.com/site_media/img/2768_HumairaRashid_01576d76-fdb6-4936-af88-fddfaca4c569.png', 'Protein', 150, 100),
(14, 'Roasted Chicken', 'https://th.bing.com/th/id/OIP.Ndvd8Yh78CTXTrHjDnrC9wHaH6?pid=ImgDet&rs=1', 'Protein', 200, 100),
(15, 'Roasted Duck', 'https://static.vecteezy.com/system/resources/previews/013/391/795/original/roast-duck-on-a-transparent-background-free-png.png', 'Protein', 430, 100),
(16, 'Salmon', 'https://www.hugosdeliveries.com/wp-content/uploads/2020/12/SALMON-STEAK.png', 'Protein', 180, 100),
(17, 'Canned Tuna (water)', 'https://th.bing.com/th/id/R.7121f8d5bc2fcfd677f168e6ae6d8745?rik=4QiQrecV25r39Q&riu=http%3a%2f%2fwww.galapesca.com%2fwp-content%2fuploads%2f2015%2f12%2fsolidpacks.png&ehk=E1E3d1e4tF%2fLcC%2b6iXgoZ3Q%2b78IXDFM51XCz%2bbYCU8E%3d&risl=&pid=ImgRaw&r=0', 'Protein', 100, 100),
(18, 'Canned Tuna (oil)', 'https://th.bing.com/th/id/R.abf940537398b89c7de17a80b278f822?rik=E8q9SVQc7DfaHQ&pid=ImgRaw&r=0', 'Protein', 180, 100),
(19, 'Crab', 'https://cdn.shopify.com/s/files/1/1111/6422/articles/DALL_E_2023-05-16_22.58.02_-_Canned_king_crab_meat_-_gourmet_seafood_delicacy_chatka.png?v=1684303102', 'Protein', 100, 100),
(20, 'Shrimp', 'https://www.seekpng.com/png/detail/15-150495_shrimps-png-shrimp-png.png', 'Protein', 100, 100),
(21, 'Luncheon', 'https://th.bing.com/th/id/R.3c72faf96083b6c5c0900bd1e700a598?rik=rMhWhVRUghLpog&pid=ImgRaw&r=0', 'Protein', 400, 100),
(22, 'Roasted Hot Dogs', 'https://th.bing.com/th/id/R.ff4673934674485cec71d81ce5d62f53?rik=tCY9ltM5lG%2fIhw&pid=ImgRaw&r=0', 'Protein', 280, 100),
(23, 'Fried Hot Dogs', 'https://th.bing.com/th/id/R.ac8be5b96dcd030067a8dde185702a74?rik=YnJ31%2fDYWXJKvw&riu=http%3a%2f%2fassets.stickpng.com%2fimages%2f5a0abf425a997e1c2cea1084.png&ehk=ijeuL17PKHfgp8iDrIh3rHoImHL2XfEJ9UBdLkHyNuk%3d&risl=&pid=ImgRaw&r=0', 'Protein', 320, 100),
(24, 'Boiled Eggs', 'https://th.bing.com/th/id/R.4b665839a69bcec0e3b6b0b45278eae4?rik=wq1weZx68ghmxQ&pid=ImgRaw&r=0', 'Protein', 150, 100),
(25, 'Fried Eggs', 'https://th.bing.com/th/id/R.605d8b0e02913a14c78a73ad886471b9?rik=RuaYEZS3yR0jvw&pid=ImgRaw&r=0', 'Protein', 180, 100),
(26, 'Fresh cheese', 'https://th.bing.com/th/id/R.6cacfa09cdabbff69a839e8d5fe48fe6?rik=K%2bVm8gPuA6uZvA&riu=http%3a%2f%2fwww.pngmart.com%2ffiles%2f8%2fCheese-PNG-Transparent-Images.png&ehk=68dRG8pwrrIIlikI9HpKWwIbpJcCVqEL263%2fXIk9rdc%3d&risl=&pid=ImgRaw&r=0', 'Milk', 440, 100),
(27, 'Low fat cheddar', 'https://th.bing.com/th/id/R.e5776b9ea055d645ae513161270896d0?rik=UrxPcT0a%2ffRA8Q&pid=ImgRaw&r=0', 'Milk', 260, 100),
(28, 'Mozzarella cheese', 'https://th.bing.com/th/id/OIP.ASzBRQS20bqz49Q8XFldQwHaDk?pid=ImgDet&rs=1', 'Milk', 280, 100),
(29, 'Cream cheese', 'https://th.bing.com/th/id/R.ce160039969df37ee11c2b56bce16983?rik=%2fWiEQ8ufH3orFw&pid=ImgRaw&r=0', 'Milk', 428, 100),
(30, 'Ice Cream', 'https://th.bing.com/th/id/OIP.zKM72wL-zvrXiq5KtGWOjgHaNa?pid=ImgDet&rs=1', 'Milk', 180, 100),
(31, 'Full fat milk', 'https://th.bing.com/th/id/OIP.JRTi7Qrj48Mn727c4EPYcwAAAA?pid=ImgDet&rs=1', 'Milk', 70, 100),
(32, 'Skimmed milk', 'https://sadafco.com/wp-content/uploads/2022/08/MILK-SKIMMED-MILK-Saudi-Made-1-Liter-English-Front-300x300.png', 'Milk', 38, 100),
(33, 'Yoghurt', 'https://th.bing.com/th/id/OIP.i0cInOsIKu-92ALyEGF0RAHaHa?pid=ImgDet&rs=1', 'Milk', 60, 100),
(34, 'Skimmed yoghurt', 'https://th.bing.com/th/id/R.935b2d60379606e765856c0ac4229917?rik=bVsNpPyiELqcEA&riu=http%3a%2f%2fpngimg.com%2fuploads%2fyogurt%2fyogurt_PNG15190.png&ehk=EHoPXb0bTIcl02H%2bJV5XyVQac1xvw6yZdqp8WMC1%2bPk%3d&risl=&pid=ImgRaw&r=0', 'Milk', 45, 100);

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
(18, 'b0bbe72e-f5b2-11ed-87b8-7ae924f6661a', 182, 125, 55, 'lightly active', 'Lose weight', '2023-05-18'),
(19, 'b9c9ee85-fa40-11ed-87b8-7ae924f6661a', 175, 95, 22, 'lightly active', 'Lose weight', '2023-05-24'),
(20, '53c306af-fcc0-11ed-813e-1fbe5f9efc17', 187, 85, 32, 'lightly active', 'Gain weight', '2023-05-27'),
(21, '3b266756-0002-11ee-813e-1fbe5f9efc17', 173, 60, 20, 'lightly active', 'Stay at the same weight', '2023-05-31'),
(22, '70c38f12-f33a-11ed-87b8-7ae924f6661a', 187, 85, 21, 'lightly active', 'Gain weight', '2023-06-03'),
(23, '1429fd21-05e8-11ee-813e-1fbe5f9efc17', 698, 7645, 26, 'lightly active', 'Lose weight', '2023-06-08'),
(24, '53c306af-fcc0-11ed-813e-1fbe5f9efc17', 187, 85, 32, 'lightly active', 'Gain weight', '2023-06-08'),
(25, '53c306af-fcc0-11ed-813e-1fbe5f9efc17', 187, 85, 21, 'lightly active', 'Gain weight', '2023-06-08'),
(26, '53c306af-fcc0-11ed-813e-1fbe5f9efc17', 187, 85, 21, 'lightly active', 'Gain weight', '2023-06-08'),
(27, '3b266756-0002-11ee-813e-1fbe5f9efc17', 173, 60, 20, 'lightly active', 'Stay at the same weight', '2023-06-08'),
(28, '7df79aa0-06b6-11ee-813e-1fbe5f9efc17', 200, 100, 29, 'sedentary', 'Lose weight', '2023-06-09'),
(29, 'fa121c62-06b7-11ee-813e-1fbe5f9efc17', 1, 1, 0, 'sedentary', 'Lose weight', '2023-06-09'),
(30, 'e1f24921-06b8-11ee-813e-1fbe5f9efc17', 1, 1, 0, 'sedentary', 'Lose weight', '2023-06-09'),
(31, '49b872fc-06b9-11ee-813e-1fbe5f9efc17', 69, 69, 0, 'sedentary', 'Lose weight', '2023-06-09'),
(32, 'c92b8ecc-06b9-11ee-813e-1fbe5f9efc17', 69, 69, 0, 'sedentary', 'Lose weight', '2023-06-09'),
(33, '3e7f8acc-06ba-11ee-813e-1fbe5f9efc17', 69, 69, 0, 'sedentary', 'Lose weight', '2023-06-09'),
(34, '92c13cc1-06dc-11ee-813e-1fbe5f9efc17', 165, 107, 20, 'very active', 'Lose weight', '2023-06-09'),
(35, 'c13d702e-06dd-11ee-813e-1fbe5f9efc17', 176, 75, 23, 'sedentary', 'Stay at the same weight', '2023-06-09'),
(36, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 185, 76, 25, 'sedentary', 'Gain weight', '2023-06-09'),
(37, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 185, 120, 25, 'sedentary', 'Gain weight', '2023-06-09'),
(38, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 185, 78, 25, 'sedentary', 'Gain weight', '2023-06-09'),
(39, '18590ea4-0708-11ee-813e-1fbe5f9efc17', 163, 40, 21, 'moderately active', 'Gain weight', '2023-06-09'),
(40, '18590ea4-0708-11ee-813e-1fbe5f9efc17', 163, 50, 21, 'moderately active', 'Gain weight', '2023-06-09'),
(41, '18590ea4-0708-11ee-813e-1fbe5f9efc17', 163, 40, 21, 'lightly active', 'Gain weight', '2023-06-09'),
(42, '18590ea4-0708-11ee-813e-1fbe5f9efc17', 163, 40, 21, 'lightly active', 'Lose weight', '2023-06-09'),
(43, '18590ea4-0708-11ee-813e-1fbe5f9efc17', 163, 40, 21, 'lightly active', 'Stay at the same weight', '2023-06-09'),
(44, '1b7bdef1-070d-11ee-813e-1fbe5f9efc17', 163, 40, 21, 'moderately active', 'Gain weight', '2023-06-09'),
(45, '1b7bdef1-070d-11ee-813e-1fbe5f9efc17', 163, 60, 21, 'moderately active', 'Gain weight', '2023-06-09'),
(46, '1b7bdef1-070d-11ee-813e-1fbe5f9efc17', 163, 60, 21, 'moderately active', 'Gain weight', '2023-06-09'),
(47, '1b7bdef1-070d-11ee-813e-1fbe5f9efc17', 163, 60, 21, 'moderately active', 'Gain weight', '2023-06-09'),
(48, 'fbb0c439-070d-11ee-813e-1fbe5f9efc17', 0, 0, 0, '0', '0', '2023-06-09'),
(49, '559cb9f9-070e-11ee-813e-1fbe5f9efc17', 200, 100, 21, 'sedentary', 'Lose weight', '2023-06-09'),
(50, '24ae9f0d-0711-11ee-813e-1fbe5f9efc17', 200, 100, 21, 'lightly active', 'Stay at the same weight', '2023-06-09'),
(51, '1b7bdef1-070d-11ee-813e-1fbe5f9efc17', 163, 40, 21, 'moderately active', 'Gain weight', '2023-06-10'),
(52, '1b7bdef1-070d-11ee-813e-1fbe5f9efc17', 163, 40, 21, 'moderately active', 'Gain weight', '2023-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `product_link` varchar(256) NOT NULL,
  `product_name` varchar(256) NOT NULL DEFAULT 'NutriNation',
  `product_desc` longtext NOT NULL,
  `product_price` float NOT NULL DEFAULT 0,
  `product_pic` varchar(500) NOT NULL,
  `product_view` varchar(256) NOT NULL DEFAULT 'Featured',
  `product_click` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_link`, `product_name`, `product_desc`, `product_price`, `product_pic`, `product_view`, `product_click`) VALUES
(1, 'https://www.carrefourjordan.com/mafjor/en/fitness-bars/grenade-protbar-pnut-60gr/p/599977', 'Grenade Bar High Protein Peanut Butter 60 Gram', 'Carb killa bars are the perfect snack for any occasion. whether youre in need of a post-workout pick-me-up or a indulgent treat on an evening. With a host of tasty flavour to choose from. itll be tough picking your favourite.', 2.6, 'https://cozmo.jo/pub/media/catalog/product/cache/498ed9154ca719046198f24acd330695/5/0/5060221206860.jpg', 'Featured', 0),
(9, 'https://www.carrefourjordan.com/mafjor/en/fitness-bars/probar-oat-cranberry-60gr/p/638446?list_name=people_who_viewed_this_item_also_viewed', 'The Incredible Oat Cranberry Chocolate 60 Gram', 'They are as delicious and convenient as a candy bar while maintaining all of the nutrition of a carefully prepared meal that and apos. s packed with fiber to make you feel full and to help with digestion and weight loss.', 1.55, 'https://cdnprod.mafretailproxy.com/sys-master-root/h02/hfd/13570106261534/638446_main.jpg_480Wx480H', 'Featured', 0),
(10, 'https://www.carrefourjordan.com/mafjor/en/keto-gluten-free/the-incredible-square-choco-oat-35g/p/713685?list_name=people_who_viewed_this_item_also_viewed', 'The Incredible Oat Square Chocolate 35 Gram', 'Very handy to slip in your pocket (Small size) perfect as a fast guilt-free snack.', 0.79, 'https://cdnprod.mafretailproxy.com/sys-master-root/h11/h20/28636382593054/713685_main.jpg_480Wx480H', 'Head', 0),
(11, 'https://www.carrefourjordan.com/mafjor/en/keto-gluten-free/drayke-gf-baked-bread-original-80g/p/746108?list_name=recently_viewed_items', 'Drayke Tostadas Baked Bread Original Gluten Free 80 Gram', 'Original Gluten Free', 1.3, 'https://cdnprod.mafretailproxy.com/sys-master-root/hde/h19/47643787329566/480Wx480H_746108_main.jpg', 'Head', 0),
(12, 'https://www.carrefourjordan.com/mafjor/en/sugar-free/vieira-digestive-sugar-free-29g/p/707933?list_name=people_who_viewed_this_item_also_viewed', 'Vieira Biscuits Digestive Thins Sugar Free 29 Gram', 'Packed with the goodness of wholewheat and fibre, digestives are a smart pick. These biscuits have wholewheat and not just maida, making it a better option.', 0.24, 'https://cdnprod.mafretailproxy.com/sys-master-root/hb0/hed/29407407964190/707933_main.jpg_480Wx480H', 'Head', 0);

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
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `Gender` varchar(10) NOT NULL DEFAULT 'None',
  `birthday` date NOT NULL,
  `Age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthday`,curdate())) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `guid`, `email`, `password`, `type`, `vkey`, `verified`, `FullName`, `createdate`, `Gender`, `birthday`) VALUES
(9194, 'b35b2051-f0ed-11ed-87b8-7ae924f6661a', 'abdalrhmanalsmadi1997@gmail.com', '85bf5831e593431e882887e077400b7f', 'admin', 'e00cb91edcb32532b1583913e0cf99d0', 1, 'abdalrhman amen ismail alsmadi', '2023-05-12 17:50:01.728667', 'Male', '1997-09-02'),
(9195, '832feb29-f22f-11ed-87b8-7ae924f6661a', 'fuad.bader@outlook.com', '71f41e8d5f020d37005606081ea67f52', 'admin', '7382d0e99abf6eca30c8f24806242d38', 1, 'Fuad Ahmad Bader', '2023-05-14 08:15:39.669169', 'Male', '2001-09-11'),
(9196, 'be14d88f-f243-11ed-87b8-7ae924f6661a', 'awwad.khaled69@gmail.com', '90abfb95b1edbf3fd315997fd0f1ae36', 'user', 'b9f1b890868e408fee2228614f66c17b', 0, 'Khaled', '2023-05-14 10:40:28.411895', 'Male', '0000-00-00'),
(9199, 'e6cfc87b-f251-11ed-87b8-7ae924f6661a', 'abdullahqaisi7@gmail.com', 'ce7425326eb064e79e9ba2830dcb8bda', 'user', 'e54239aa3f8c54504a4bfae4ab3f52a3', 0, 'Andullah', '2023-05-14 12:21:49.700141', 'Male', '2023-05-14'),
(9200, '70c38f12-f33a-11ed-87b8-7ae924f6661a', 'vrlabvip@gmail.com', '0b647321a2a464a526061d5b949415c7', 'user', '3d7240b9709b1a14dfe97983dd542cee', 1, 'Khaled', '2023-05-15 16:06:24.386024', 'Male', '2002-05-13'),
(9201, 'b0bbe72e-f5b2-11ed-87b8-7ae924f6661a', 'abader@jadara.edu.jo', '2f24632e682c2f12bb47a96c9505029f', 'user', '779989c4a6a48727ebdbb443d92db39c', 1, 'Ahmad', '2023-05-18 19:32:13.643988', 'Male', '1967-12-13'),
(9202, 'b9c9ee85-fa40-11ed-87b8-7ae924f6661a', 'fadelrrrt@gmail.com', 'c473086bbd3d44af2cb2e098d4541308', 'user', '634deb1a99d34207ef6f6bda197cd10e', 1, 'Fadel', '2023-05-24 14:39:02.022194', 'Male', '2001-04-27'),
(9203, '53c306af-fcc0-11ed-813e-1fbe5f9efc17', 'vrlabronaldo@gmail.com', '0b647321a2a464a526061d5b949415c7', 'user', '6ae9bd56155af27f533dc08d82a59677', 1, 'Khaleddd', '2023-05-27 18:57:28.756217', 'Male', '2002-05-13'),
(9204, '3b266756-0002-11ee-813e-1fbe5f9efc17', 'mohmmad.alassaf02@gmail.com', '0b74c830d868a939755255221c67018c', 'admin', 'a8a2877065568fa1626ec52224adc4b4', 1, 'Mohammad', '2023-05-31 22:26:47.736992', 'Male', '2002-09-01'),
(9220, '92c13cc1-06dc-11ee-813e-1fbe5f9efc17', 'ahmadkhalid96k@gmail.com', '55ff9dd62016c43d0290cdcdc5cda9aa', 'user', 'e8ba4c32a2527b81b6cc9da33076d941', 1, 'Omar', '2023-06-09 15:44:51.977205', 'Male', '2002-06-25'),
(9221, 'c13d702e-06dd-11ee-813e-1fbe5f9efc17', 'gdnOn@outlook.com', '64f519c271c8fdf1262262858987727a', 'user', '3cfe45fbfb61c8d56a260331c224bd0e', 1, 'Jihad', '2023-06-09 15:53:19.463076', 'Male', '1999-09-09'),
(9226, '1b7bdef1-070d-11ee-813e-1fbe5f9efc17', 'areeg.muhaiseen@gmail.com', 'fad2b778f333336e51823a5cd04ba20f', 'user', 'a0f3f70a491aed0d71bd8428fa1bd4aa', 1, 'areeg muhaisen', '2023-06-09 21:32:17.213543', 'Female', '2002-03-01'),
(9228, '559cb9f9-070e-11ee-813e-1fbe5f9efc17', 'poopmonki@hotmail.com', '71f41e8d5f020d37005606081ea67f52', 'user', '13dc6b0bb87961a9917065d1f19ee0d6', 1, 'Bruhman', '2023-06-09 21:41:04.233340', 'Male', '2001-09-15'),
(9229, '24ae9f0d-0711-11ee-813e-1fbe5f9efc17', 'fuad.bader2@gmail.com', '71f41e8d5f020d37005606081ea67f52', 'user', '0f4b86dba96baf9338b494cdbfe88fba', 1, 'Fuad', '2023-06-09 22:01:10.632527', 'Female', '2001-09-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calories`
--
ALTER TABLE `calories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calories_record_details`
--
ALTER TABLE `calories_record_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MedicalRecords`
--
ALTER TABLE `MedicalRecords`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
-- AUTO_INCREMENT for table `calories`
--
ALTER TABLE `calories`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `calories_record_details`
--
ALTER TABLE `calories_record_details`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `MedicalRecords`
--
ALTER TABLE `MedicalRecords`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9230;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
