-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 02:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_furniture`
--
CREATE DATABASE IF NOT EXISTS `db_furniture` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_furniture`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `status`) VALUES
(1, 'Lamp', b'1'),
(2, 'Chair', b'1'),
(3, 'Accessories', b'1'),
(4, 'Table', b'1'),
(5, 'Sofa', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(2) NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` char(10) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `user_id`, `firstname`, `lastname`, `birthday`, `phone`, `status`) VALUES
(1, 1, 'Bảo', 'Nguyễn', '2002-11-20', '0946777777', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(2) NOT NULL,
  `user_id` int(2) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `phone` char(10) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `user_id`, `firstname`, `lastname`, `birthday`, `phone`, `status`) VALUES
(1, 2, 'Bảo', 'Nguyễn Ngọc', '2002-11-20', '0946777827', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `img_id` int(2) NOT NULL,
  `prod_image_id` varchar(5) NOT NULL,
  `img_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`img_id`, `prod_image_id`, `img_link`) VALUES
(1, 'img01', 'img01-1.jpg'),
(2, 'img01', 'img01-2.jpg'),
(3, 'img02', 'img02-1.jpg'),
(4, 'img02', 'img02-2.jpg'),
(5, 'img03', 'img03-1.jpg'),
(6, 'img03', 'img03-2.jpg'),
(7, 'img04', 'img04-1.jpg'),
(8, 'img04', 'img04-2.jpg'),
(9, 'img05', 'img05-1.jpg'),
(10, 'img05', 'img05-2.jpg'),
(11, 'img05', 'img05-3.jpg'),
(12, 'img06', 'img06-1.jpg'),
(13, 'img06', 'img06-2.jpg'),
(14, 'img06', 'img06-3.jpg'),
(15, 'img06', 'img06-4.jpg'),
(16, 'img07', 'img07-1.jpg'),
(17, 'img07', 'img07-2.jpg'),
(18, 'img07', 'img07-3.jpg'),
(19, 'img07', 'img07-4.jpg'),
(20, 'img08', 'img08-1.jpg'),
(21, 'img08', 'img08-2.jpg'),
(22, 'img08', 'img08-3.jpg'),
(23, 'img08', 'img08-4.jpg'),
(24, 'img08', 'img08-5.jpg'),
(25, 'img09', 'img09-1.jpg'),
(26, 'img09', 'img09-2.jpg'),
(27, 'img09', 'img09-3.jpg'),
(28, 'img09', 'img09-4.jpg'),
(29, 'img10', 'img10-1.jpg'),
(30, 'img10', 'img10-2.jpg'),
(31, 'img10', 'img10-3.jpg'),
(32, 'img10', 'img10-4.jpg'),
(33, 'img11', 'img11-1.jpg'),
(34, 'img11', 'img11-2.jpg'),
(35, 'img11', 'img11-3.jpg'),
(36, 'img11', 'img11-4.jpg'),
(37, 'img12', 'img12-1.jpg'),
(38, 'img12', 'img12-2.jpg'),
(39, 'img12', 'img12-3.jpg'),
(40, 'img13', 'img13-1.jpg'),
(41, 'img13', 'img13-2.jpg'),
(42, 'img13', 'img13-3.jpg'),
(43, 'img14', 'img14-1.jpg'),
(44, 'img14', 'img14-2.jpg'),
(45, 'img15', 'img15-1.jpg'),
(46, 'img15', 'img15-2.jpg'),
(47, 'img15', 'img15-3.jpg'),
(48, 'img15', 'img15-4.jpg'),
(49, 'img16', 'img16-1.jpg'),
(50, 'img16', 'img16-2.jpg'),
(51, 'img17', 'img17-1.jpg'),
(52, 'img17', 'img17-2.jpg'),
(53, 'img18', 'img18-1.jpg'),
(54, 'img18', 'img18-2.jpg'),
(55, 'img18', 'img18-3.jpg'),
(56, 'img18', 'img18-4.jpg'),
(57, 'img19', 'img19-1.jpg'),
(58, 'img19', 'img19-2.jpg'),
(59, 'img20', 'img20-1.jpg'),
(60, 'img20', 'img20-2.jpg'),
(61, 'img20', 'img20-3.jpg'),
(62, 'img20', 'img20-4.jpg'),
(63, 'img21', 'img21-1.jpg'),
(64, 'img21', 'img21-2.jpg'),
(65, 'img22', 'img22-1.jpg'),
(66, 'img22', 'img22-2.jpg'),
(67, 'img24', 'img24-1.jpg'),
(68, 'img24', 'img24-2.jpg'),
(69, 'img25', 'img25-1.jpg'),
(70, 'img25', 'img25-2.jpg'),
(71, 'img26', 'img26-1.jpg'),
(72, 'img26', 'img26-2.jpg'),
(73, 'img26', 'img26-3.jpg'),
(74, 'img26', 'img26-4.jpg'),
(75, 'img27', 'img27-1.jpg'),
(76, 'img27', 'img27-2.jpg'),
(77, 'img27', 'img27-3.jpg'),
(78, 'img28', 'img28-1.jpg'),
(79, 'img28', 'img28-2.jpg'),
(80, 'img28', 'img28-3.jpg'),
(81, 'img28', 'img28-4.jpg'),
(82, 'img29', 'img29-1.jpg'),
(83, 'img29', 'img29-2.jpg'),
(84, 'img29', 'img29-3.jpg'),
(85, 'img30', 'img30-1.jpg'),
(86, 'img30', 'img30-2.jpg'),
(87, 'img32', 'img32-1.jpg'),
(88, 'img32', 'img32-2.jpg'),
(89, 'img34', 'img34-1.jpg'),
(90, 'img34', 'img34-2.jpg'),
(91, 'img35', 'img35-1.jpg'),
(92, 'img35', 'img35-2.jpg'),
(93, 'img36', 'img36-1.jpg'),
(94, 'img36', 'img36-2.jpg'),
(95, 'img38', 'img38-1.jpg'),
(96, 'img38', 'img38-2.jpg'),
(97, 'img38', 'img38-3.jpg'),
(98, 'img39', 'img39-1.jpg'),
(99, 'img39', 'img39-2.jpg'),
(100, 'img39', 'img39-3.jpg'),
(101, 'img40', 'img40-1.jpg'),
(102, 'img40', 'img40-2.jpg'),
(103, 'img40', 'img40-3.jpg'),
(104, 'img41', 'img41-1.jpg'),
(105, 'img41', 'img41-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(2) NOT NULL,
  `cus_id` int(2) DEFAULT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `cus_id`, `firstname`, `lastname`, `address`, `city`, `phone`, `email`, `notes`, `status`) VALUES
(1, NULL, 'Dậu', 'Lồ ', 'CC Huỳnh Văn Chính', 'HCM', '0123456789', 'dau@gmail.com', '', b'0'),
(2, 1, 'Bảo', 'Nguyễn', 'Carillon 7', 'HCM', '0946777777', 'bao201102@gmail.com', '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(2) NOT NULL,
  `order_id` int(2) NOT NULL,
  `prod_id` int(2) NOT NULL,
  `quantity` int(100) NOT NULL,
  `prod_price` int(100) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `prod_id`, `quantity`, `prod_price`, `status`) VALUES
(1, 1, 8, 4, 1200, b'0'),
(2, 1, 2, 5, 510, b'0'),
(3, 2, 3, 3, 50, b'0'),
(4, 2, 5, 4, 123, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` int(2) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_quantity` int(100) NOT NULL,
  `prod_price` int(100) NOT NULL,
  `category_id` int(2) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_image_id` varchar(5) DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_quantity`, `prod_price`, `category_id`, `prod_description`, `prod_image_id`, `status`) VALUES
(1, 'Hanging Light', 15, 470, 1, 'More modern', 'img01', b'1'),
(2, 'Study Lamp', 21, 510, 1, 'Used to put on the desk', 'img02', b'1'),
(3, 'Classic Lamp', 16, 50, 1, 'Traditional style', 'img03', b'1'),
(4, 'Wooden Stool', 16, 350, 2, 'Compact design', 'img04', b'1'),
(5, 'Aether Vasee', 22, 123, 3, 'Comfortable', 'img05', b'1'),
(6, 'Classic Chairs', 24, 512, 2, 'So comfortable', 'img06', b'1'),
(7, 'Wooden Dining Chair', 17, 355, 2, 'Convenient', 'img07', b'1'),
(8, 'Round Coffee Table', 22, 1200, 4, 'So beautiful', 'img08', b'1'),
(9, 'Brown Long Table', 18, 230, 4, 'Suitable for family', 'img09', b'1'),
(10, 'Wooden Bowl', 13, 125, 3, 'Hard to break', 'img10', b'1'),
(11, 'Coffee Table', 24, 1849, 4, 'Beatiful', 'img11', b'1'),
(12, 'Aether Vasee 2', 59, 2637, 3, 'Beautiful', 'img12', b'1'),
(13, 'Classic Chairs 2', 53, 627, 2, 'Beautiful', 'img13', b'1'),
(14, 'Hanging Light 2', 148, 1746, 1, 'Beautiful', 'img14', b'1'),
(15, 'Wooden Dining Chair 2', 124, 2847, 2, 'Beautiful', 'img15', b'1'),
(16, 'Wooden Stool 2', 125, 135, 2, 'Beautiful', 'img16', b'1'),
(17, 'Study Lamp 2', 133, 1235, 1, 'Beautiful', 'img17', b'1'),
(18, 'Wooden Bowl 2', 112, 738, 3, 'Beautiful', 'img18', b'1'),
(19, 'Hanging Lightt 3', 134, 523, 1, 'Beautiful', 'img19', b'1'),
(20, 'Round Coffee Table 3', 113, 4143, 4, 'Beautiful', 'img20', b'1'),
(21, 'Study Lamp 3', 121, 1234, 1, 'Beautiful', 'img21', b'1'),
(22, 'Aether Vasee 3', 112, 1253, 3, 'Beautiful', 'img22', b'1'),
(24, 'Classic Lamp 3', 113, 1234, 1, 'Beautiful', 'img24', b'1'),
(25, 'Wooden Stool 3', 131, 3424, 4, 'Beautiful', 'img25', b'1'),
(26, 'Wooden Dining Chair 3', 123, 2133, 2, 'Beautiful', 'img26', b'1'),
(27, 'Classic Chairs 3', 112, 2132, 2, 'Beautiful', 'img27', b'1'),
(28, 'Round Coffee Table 4', 123, 2313, 4, 'Beautiful', 'img28', b'1'),
(29, 'Wooden Bowl 3', 1231, 243, 3, 'Beautiful', 'img29', b'1'),
(30, 'Hanging Light 4', 132, 674, 1, 'Beautiful', 'img30', b'1'),
(32, 'Study Lamp 4', 132, 233, 1, 'Beautiful', 'img32', b'1'),
(34, 'Classic Lamp 4', 133, 1233, 1, 'Beautiful', 'img34', b'1'),
(35, 'Wooden Stool 4', 13, 3212, 2, 'Beautiful', 'img35', b'1'),
(36, 'Aether Vasee 4', 133, 7345, 3, 'Beautiful', 'img36', b'1'),
(38, 'Classic Chairs 4', 187, 2323, 2, 'Beautiful', 'img38', b'1'),
(39, 'Wooden Dining Chair 4', 12, 734, 2, 'Beautiful', 'img39', b'1'),
(40, 'Wooden Bowl  4', 123, 6752, 3, 'Beautiful', 'img40', b'1'),
(41, 'Round Table', 133, 4232, 4, 'Beautiful', 'img41', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `created_date` date NOT NULL,
  `user_type` bit(1) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `user_password`, `created_date`, `user_type`, `status`) VALUES
(1, 'bao201102@gmail.com', 'e69a2bce39e2e49014e75579e046e526', '2022-10-20', b'1', b'1'),
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-11-03', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type` bit(1) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type`, `type`) VALUES
(b'0', 'Employee'),
(b'1', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`img_id`,`prod_image_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_name` (`prod_name`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `img_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
