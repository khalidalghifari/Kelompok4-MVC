-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2024 at 08:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladdpackage`
--

CREATE TABLE `tbladdpackage` (
  `id` int NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `titlename` varchar(450) DEFAULT NULL,
  `PackageType` varchar(45) DEFAULT NULL,
  `PackageDuratiobn` varchar(45) DEFAULT NULL,
  `Price` varchar(45) DEFAULT NULL,
  `uploadphoto` varchar(450) DEFAULT NULL,
  `Description` varchar(450) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbladdpackage`
--

INSERT INTO `tbladdpackage` (`id`, `category`, `titlename`, `PackageType`, `PackageDuratiobn`, `Price`, `uploadphoto`, `Description`, `create_date`) VALUES
(1, '1', 'Free Fitness Gear Package', '1', '3 Month', '600', NULL, 'Free Fitness Gear\nComplimentary OnePass', '2022-03-05 02:55:34'),
(2, '1', '3 Months Membership Package', '1', '6 Month', '800', NULL, 'Book Six Days Different Trainers Class designed for fast Weight Loss / Weight Gain with combination of Latest Workouts in addition to complimentary access to gym area with personal training.', '2022-03-05 02:56:44'),
(3, '1', 'hgfhfgdfgdf', '1', '4 Month', '12000', NULL, 'hfdgfhfgh<div><br></div><div>fdgdfg</div>', '2022-05-22 02:34:08'),
(7, '1', 'asd', '7', '231', '233', NULL, 'asd', '2024-05-18 02:16:30'),
(8, '5', 'asd', '7', '231', '250', NULL, 'asd', '2024-05-18 02:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `email`, `mobile`, `password`, `create_date`) VALUES
(1, 'admin aja', 'admin@gmail.com', '99197896857', '7f95b733f4210c71482904eb422143f8', '2022-01-19 11:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int NOT NULL,
  `package_id` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment` varchar(45) DEFAULT NULL,
  `paymentType` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `package_id`, `userid`, `booking_date`, `payment`, `paymentType`) VALUES
(1, 2, 8, '2022-03-05 03:53:21', '800', 'Partial Payment'),
(2, 1, 1, '2022-03-05 03:53:28', '600', 'Partial Payment'),
(3, 2, 5, '2022-03-08 17:44:18', '300', 'Full Payment'),
(6, 1, 5, '2022-05-22 02:16:14', NULL, NULL),
(7, 2, 6, '2022-05-22 02:32:45', NULL, 'Full Payment'),
(8, 2, 8, '2024-05-18 01:21:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int NOT NULL,
  `category_name` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `category_name`, `status`) VALUES
(1, 'Category1', '0'),
(2, 'Category2', '0'),
(4, 'oke aja', '0'),
(5, 'shap', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblpackage`
--

CREATE TABLE `tblpackage` (
  `id` int NOT NULL,
  `cate_id` varchar(45) DEFAULT NULL,
  `PackageName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblpackage`
--

INSERT INTO `tblpackage` (`id`, `cate_id`, `PackageName`) VALUES
(7, '4', 'oke aja');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `id` int NOT NULL,
  `bookingID` int DEFAULT NULL,
  `paymentType` varchar(45) DEFAULT NULL,
  `payment` varchar(45) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`id`, `bookingID`, `paymentType`, `payment`, `payment_date`) VALUES
(1, 1, 'Partial Payment', '2000', '2024-05-18 07:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `fname`, `lname`, `email`, `mobile`, `password`, `state`, `city`, `address`, `create_date`) VALUES
(1, 'atul', 'kumar', 'atul@gmail.com', '8888888888', 'f925916e2754e5e03f75dd58a5733251', 'Uttar Pradesh', 'niuda', 'e-48 new asholk nagar hdd ', '2022-02-16 16:48:25'),
(2, 'ddd', 'ddf', 'df@gmail.com', '9968556', 'e10adc3949ba59abbe56e057f20f883e', 'fgfg', 'fsdf', NULL, '2022-02-16 17:00:20'),
(3, 'anuj', 'kumar', 'anuj@gmail.com', '9999999999', 'f925916e2754e5e03f75dd58a5733251', 'up', 'noida', NULL, '2022-03-02 15:37:22'),
(4, 'sssssss', 'sssssss', 'sssssss', 'sssssss', 'f925916e2754e5e03f75dd58a5733251', 'sssssss', 'sssssss', NULL, '2022-03-05 03:27:28'),
(5, 'Anuj k', 'kumar', 'anuj.doca@Gmail.com', '1234567890', '202cb962ac59075b964b07152d234b70', 'sghsdg', 'sahgsh', NULL, '2022-03-08 17:43:23'),
(6, 'John', 'Doe', 'john@test.com', '1425635241', 'f925916e2754e5e03f75dd58a5733251', 'Delhi', 'New Delhi', 'ABC Street XYZ Colony', '2022-05-22 02:31:54'),
(7, 'asd', 'asd', 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd@gmail.com', 'asd', NULL, '2024-05-18 06:59:00'),
(8, 'oke aja', 'oke', 'oke@gmail.com', '1312312312', '0079fcb602361af76c4fd616d60f9414', 'bwi', 'bwi', 'address aja', '2024-05-18 06:59:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladdpackage`
--
ALTER TABLE `tbladdpackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpackage`
--
ALTER TABLE `tblpackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladdpackage`
--
ALTER TABLE `tbladdpackage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpackage`
--
ALTER TABLE `tblpackage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD CONSTRAINT `tblbooking_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `tbladdpackage` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tblbooking_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `tbluser` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
