-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 05:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ul2laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `price`, `category`) VALUES
(1, 'Fog Entry', 499, 'rose'),
(2, 'Sash', 149, 'decoration'),
(3, 'Party Props', 199, 'decoration'),
(4, 'LED Name and Numbers', 199, 'decoration'),
(5, 'Message Box', 99, 'decoration'),
(6, 'Single Rose', 49, 'decoration'),
(7, 'Rose Bouquet', 349, 'decoration'),
(8, 'Photography - 15 mins', 249, 'rose'),
(13, 'Candle Entry', 199, 'rose');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(2, 'admin@demo.com', 'sdkj');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `mobile` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `final_price` int(11) DEFAULT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `order_id` varchar(15) DEFAULT NULL,
  `tx_amount` varchar(5) DEFAULT NULL,
  `tx_id` varchar(15) DEFAULT NULL,
  `tx_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` date DEFAULT NULL,
  `slot` int(11) DEFAULT NULL,
  `theatre` varchar(50) DEFAULT NULL,
  `decoration` int(11) DEFAULT NULL,
  `cake` varchar(500) DEFAULT NULL,
  `addons` varchar(500) DEFAULT NULL,
  `food` int(11) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `nick_name` varchar(256) DEFAULT NULL,
  `your_name` varchar(256) DEFAULT NULL,
  `partner_name` varchar(256) DEFAULT NULL,
  `promocode` varchar(500) DEFAULT NULL,
  `applied_code` varchar(500) DEFAULT NULL,
  `no_limit` int(11) DEFAULT NULL,
  `payment_status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `mobile`, `email`, `final_price`, `discounted_price`, `order_id`, `tx_amount`, `tx_id`, `tx_time_stamp`, `date`, `slot`, `theatre`, `decoration`, `cake`, `addons`, `food`, `people`, `nick_name`, `your_name`, `partner_name`, `promocode`, `applied_code`, `no_limit`, `payment_status`, `created_at`, `updated_at`) VALUES
(9, 'Sharma', '7899419048', 'sharma22@gmail.com', 999, 999, '669cbe197026f', '', '', '2024-07-21 07:51:53', '2024-07-22', 32, '3', 0, '0', '', 0, 2, '', '', '', 'cY6NeNNHJ7CV', '', 1, NULL, '2024-08-14 06:08:02', NULL),
(10, 'Uday ', '8088491967', 'udaymnaidu456@gmail.com', 2847, 2847, '669de775c439b', '100', 'T24072210310669', '2024-07-22 05:01:22', '2024-07-22', 42, '4', 1, '3', '6,13', 0, 2, 'Happy Birthday Sushmitha', '', '', 'giTUVAiXQTVG', '', 1, 1, '2024-08-14 06:08:02', NULL),
(11, 'Theja', '7095949545', 'gurutheja666@gmail.com', 2898, 2898, '669df5c98e457', '100', 'T24072211322759', '2024-07-22 06:02:37', '2024-07-22', 25, '2', 1, '3', '4', 0, 4, 'Akhi', '', '', '7L03mfK3YN1F', '', 1, 1, '2024-08-14 06:08:02', NULL),
(12, 'Test Verification', '9845012345', 'TestVerification@gmail.co.us', 2849, 2849, '669f38d244cf7', '', '', '2024-07-23 05:00:02', '2024-07-23', 24, '2', 3, '8', '', 0, 1, 'd', '', '', 'NtWHzNXOvANF', '', 1, NULL, '2024-08-14 06:08:02', NULL),
(13, 'Dbjnd', '8975453694', 'Kris.vd@gmail.com', 4147, 4147, '669f3be8ed247', '59900', 'T24072310433628', '2024-07-23 05:13:43', '2024-07-23', 3, '1', 3, '2', '2,4', 0, 7, 'Hsbdbbd', '', '', 'kiBC32go75B8', '', 1, 1, '2024-08-14 06:08:02', NULL),
(22, 'Sai pavan', '8919000911', 'saipavan301903@gmail.com', 2047, 2047, '66a0dc632e730', '59900', 'T24072416203415', '2024-07-24 10:50:42', '2024-07-25', 34, '3', 0, '0', '', 0, 4, 'Kanna', '', '', '', '', 1, 1, '2024-08-14 06:08:02', NULL),
(24, 'Rishikesh Ranjan', '8804757524', 'thakurrishikeshr@gmail.com', 3046, 3046, '66a11dd8b635b', '59900', 'T24072421001300', '2024-07-24 15:30:16', '2024-08-10', 24, '2', 0, '0', '', 0, 4, 'Rajdeep', '', '', '', '', 1, 1, '2024-08-14 06:08:02', NULL),
(25, 'NAVEEN N', '9880650605', 'naveennsb3@gmail.com', 3097, 3097, '66a461f489ea1', '', '', '2024-07-27 02:56:52', '2024-08-01', 25, '2', 1, '1', '4,8', 0, 1, 'MONVITH N', '', '', 'pwO9pyGO4p8d', '', 1, NULL, '2024-08-14 06:08:02', NULL),
(26, 'Rakshith', '7975054564', 'rakshithshetty700@gmail.com', 999, 999, '66a6b2566fec6', '', '', '2024-07-28 21:04:22', '2024-08-03', 32, '3', 0, '0', '', 0, 1, '', '', '', 'u8dj8KXHfUHz', '', 1, NULL, '2024-08-14 06:08:02', NULL),
(27, 'Sai Deepthi SV ', '9603091284', 'svsaideepthi@gmail.com', 999, 999, '66a90283ae03a', '59900', 'T24073020412154', '2024-07-30 15:11:28', '2024-07-31', 32, '3', 7, '0', '', 0, 2, '', 'Deepthi', 'Abhishek', '7yWS5XTA7b5L', '', 1, 1, '2024-08-14 06:08:02', NULL),
(28, 'Chaithanya ', '9966005527', 'Chaithanyaa20@gmail.com', 2846, 2846, '66aba35e5385d', '', '', '2024-08-01 15:01:50', '2024-08-02', 42, '4', 1, '0', '1,5,4', 0, 2, 'PA', '', '', 'kKAWkFXuxLW1', '', 1, NULL, '2024-08-14 06:08:02', NULL),
(29, 'Mahmood ', '8088330427', 'mahmoodmasoodkhan20@gmail.com', 3295, 3295, '66ad2fcecffc5', '', '', '2024-08-02 19:13:18', '2024-08-08', 41, '4', 7, '8', '7,5,1,13', 0, 1, '', 'Khan', 'Khanum', '9VkiiDEOJNAI', '', 1, NULL, '2024-08-14 06:08:02', NULL),
(30, NULL, NULL, NULL, 2958, NULL, NULL, NULL, NULL, '2024-08-14 06:08:58', NULL, NULL, 'Opera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 01:08:58', '2024-08-14 01:08:58'),
(31, NULL, NULL, NULL, 2958, NULL, NULL, NULL, NULL, '2024-08-14 06:10:57', NULL, NULL, 'Opera', NULL, 'Chocolate Truffle, Chocolate Coffee', 'Special Ad-On, LED Name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 01:10:57', '2024-08-14 01:10:57'),
(32, NULL, NULL, NULL, 2958, NULL, NULL, NULL, NULL, '2024-08-14 06:14:49', NULL, NULL, 'Opera', NULL, 'Chocolate Truffle, Chocolate Coffee', 'LED Name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 01:14:49', '2024-08-14 01:14:49'),
(33, NULL, NULL, NULL, 2958, NULL, NULL, NULL, NULL, '2024-08-14 06:15:19', NULL, NULL, 'Opera', NULL, 'Chocolate Truffle, Chocolate Coffee', 'LED Name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 01:15:19', '2024-08-14 01:15:19'),
(34, NULL, NULL, NULL, 2958, NULL, NULL, NULL, NULL, '2024-08-14 06:15:37', NULL, NULL, 'Opera', NULL, 'Chocolate Truffle, Chocolate Coffee', 'LED Name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 01:15:37', '2024-08-14 01:15:37'),
(35, NULL, NULL, NULL, 2958, NULL, NULL, NULL, NULL, '2024-08-14 06:23:03', NULL, NULL, 'Opera', NULL, 'Chocolate Truffle, Chocolate Coffee', 'LED Name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 01:23:03', '2024-08-14 01:23:03'),
(36, 'Afzal Ahmed', '03242020457', 'afzal_209@hotmail.com', 3756, NULL, NULL, NULL, NULL, '2024-08-14 11:15:51', NULL, NULL, 'Opera', NULL, 'Vanilla, Strawberry, Butterscotch', 'Party Props, Message Box, LED Name', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 06:15:51', '2024-08-14 06:15:51'),
(37, 'Afzal Ahmed', '03350212563', 'afzal02747@gmail.com', 3756, NULL, NULL, NULL, NULL, '2024-08-14 11:44:02', NULL, NULL, 'Opera', NULL, 'Chocolate, Butterscotch, Strawberry', 'Message Box, LED Name, Party Props', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 06:44:02', '2024-08-14 06:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `id` int(11) NOT NULL,
  `cake` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `egless_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `cake`, `price`, `egless_price`) VALUES
(1, 'Vanilla Cake', 500, 550),
(2, 'Strawberry Cake', 550, 600),
(3, 'Butterscotch Cake', 550, 600),
(6, 'Chocolate Cake', 600, 650),
(8, 'Black Forest Cake', 600, 650),
(12, 'Dry Fruit Cake', 650, 700),
(14, 'Chocolate Coffee Cake', 700, 750),
(15, 'Chocolate Truffle Cake', 700, 750);

-- --------------------------------------------------------

--
-- Table structure for table `decoration`
--

CREATE TABLE `decoration` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `nick_name` varchar(500) NOT NULL,
  `partner_name` varchar(500) NOT NULL,
  `noofperson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `decoration`
--

INSERT INTO `decoration` (`id`, `name`, `price`, `nick_name`, `partner_name`, `noofperson`) VALUES
(1, 'Birthday', 600, '', '', 1),
(2, 'Anniversary', 600, '', '', 2),
(3, 'Bride to be', 600, '', '', 1),
(5, 'Mom to be', 600, '', '', 1),
(7, 'Romantic Date', 600, '', '', 2),
(11, 'Congratulations', 600, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `name`, `discount`) VALUES
(1, 'referral', 2099);

-- --------------------------------------------------------

--
-- Table structure for table `refral`
--

CREATE TABLE `refral` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `promocode` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refral`
--

INSERT INTO `refral` (`id`, `email`, `promocode`, `date`) VALUES
(7, 'varshaoctact@gmail.com', '0EsnprEdN4UU', '2023-12-07'),
(8, 'aswinoctact@gmail.com', 'kJXbrPupYFJw', '2023-12-26'),
(9, 'sidhu.jonnalagadda@gmail.com', '2M4KNgRISkd4', '2024-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `theatreid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `name`, `theatreid`) VALUES
(1, '9:00 AM - 12:00 PM', 1),
(2, '12:30 PM - 3:00 PM', 1),
(3, '3:30 PM - 6:30 PM', 1),
(4, '7:00 PM - 10:00 AM', 1),
(5, '10:45 PM - 1:00 AM', 1),
(21, '10:00 AM - 12:00 PM', 2),
(22, '12:30 PM - 2:30 PM', 2),
(23, '3:00 PM - 5:00 PM', 2),
(24, '06:00 PM - 08:00 pm', 2),
(25, '8:30 PM - 10:30 PM', 2),
(26, '11:00 PM - 1:00 AM', 2),
(31, '10:00 AM -  1:00 PM', 3),
(32, '2:00 PM - 5:00 PM', 3),
(33, '6:00 PM - 9:00 PM', 3),
(34, '10:00 PM - 12:30 PM', 3),
(41, '9:00 AM - 11:00 AM', 4),
(42, '11:30 AM - 13:30 PM', 4),
(43, '2:30 PM - 4:30 AM', 4),
(44, '5:30 PM - 7:30 PM', 4),
(45, '8:00 PM - 10:00 PM', 4),
(46, '10:30 PM - 12:30 PM', 4);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `price` int(11) NOT NULL,
  `people` varchar(512) NOT NULL,
  `extraprice` int(11) NOT NULL,
  `bpeople` varchar(512) NOT NULL,
  `description` longtext NOT NULL,
  `max_people` int(11) NOT NULL,
  `people11` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `price`, `people`, `extraprice`, `bpeople`, `description`, `max_people`, `people11`) VALUES
(1, 'Opera', 1749, 'Upto 4 people', 300, '2 - 15 People', '150 inch enhanced 4k Video </br> Powerful Dolby atmos sound system </br> Ideal for friend`s and family', 12, 4),
(2, 'Galaxy', 1549, 'Upto 4 people', 300, '2 - 12 People', '150 inch enhanced 4k Video </br> Powerful Dolby atmos sound system </br> Ideal for friend`s and family', 11, 4),
(3, 'Symphony', 999, 'Upto 4 people', 150, '2 - 6 People', '100 inch Powerful Digital Dolby sound system </br> Ideal for couples, friends and family', 6, 4),
(4, 'Imperia', 1449, 'Couple', 0, '2 People', '120 inch enhanced 4k Video </br> Powerful Dolby atmos sound system </br>Ideal for couples', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decoration`
--
ALTER TABLE `decoration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refral`
--
ALTER TABLE `refral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `decoration`
--
ALTER TABLE `decoration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refral`
--
ALTER TABLE `refral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
