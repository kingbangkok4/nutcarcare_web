-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 05:45 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutcarcare_mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_car`
--

CREATE TABLE `tb_car` (
  `id` int(11) NOT NULL,
  `license_plate` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `scar` varchar(1000) DEFAULT NULL,
  `front_image` varchar(3000) DEFAULT NULL,
  `left_image` varchar(3000) DEFAULT NULL,
  `right_image` varchar(3000) DEFAULT NULL,
  `behide_image` varchar(3000) DEFAULT NULL,
  `top_image` varchar(3000) DEFAULT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_car`
--

INSERT INTO `tb_car` (`id`, `license_plate`, `brand`, `type`, `color`, `scar`, `front_image`, `left_image`, `right_image`, `behide_image`, `top_image`, `cust_id`) VALUES
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `name`, `mobile`, `email`) VALUES
(1, 'qqq', '9999999999', 'dada@mail.com'),
(2, 'ryeyeyeyeyey', '42424242', 'dada@mail.com'),
(3, 'aaa', 'aaa', 'aaa'),
(4, 'anusak pankam', 'anusak pankam', 'anusak pankam'),
(5, 'nong munkeaw', '0856698555', 'aaa@mail.com'),
(14, 'หนู', '0851236459', 'ipwer@gmail.com'),
(13, 'dghb', '85698', 'xfhvc'),
(12, 'dghb', '85698', 'xfhvc'),
(10, 'ดำ', '0885963274', 'dghhj'),
(16, 'Nattapon Prakonpan', '0834444098', 'kingbangkok4@gmail.com'),
(18, 'a', 'b', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `mobile` text,
  `email` text,
  `address` text,
  `gender` text,
  `user_ref` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`id`, `fullname`, `mobile`, `email`, `address`, `gender`, `user_ref`) VALUES
(1, 'ผู้ดูแลระบบ', '0898908909', 'admin@mail.com', 'กรุงเทพมหานคร', 'ชาย', 1),
(2, 'นาย ณัฏฐ์ เจ้าของร้าน', '0869998888', 'contact@nutcarcare.com', 'กรุงเทพมหานคร', 'ชาย', 2),
(4, 'สมศรี  รักชาติ', '0946782345', 'aa@mail.com', 'กรุงเทพมหานคร', 'หญิง', 4),
(5, 'สมใจ รักดี', '0804567890', 'sdgh@hotmail.com', 'กรุงเทพมหานคร', 'หญิง', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `order_detail` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `signature_cust_image` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `print` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `cust_id`, `order_detail`, `price`, `order_date`, `signature_cust_image`, `order_by`, `status`, `print`) VALUES
(1, 5, 'gdssgsdgsg', '500', '2016-02-05 19:41:00', NULL, 'admin', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_service`
--

CREATE TABLE `tb_service` (
  `id` int(11) NOT NULL,
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_care`
--

CREATE TABLE `tb_type_care` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_type_care`
--

INSERT INTO `tb_type_care` (`id`, `name`) VALUES
(1, 'เก๋ง'),
(2, 'กระบะตอนเดียว'),
(3, 'กระบะแคป'),
(4, 'กระบะ 4 ประตู'),
(5, 'รถแวน'),
(6, 'รถตู้');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin1', '12345', 'Admin'),
(4, 'Staff1', '1234', 'Staff'),
(7, 'staff2', '9999', 'Staff'),
(8, 'uu', '0000', 'Staff'),
(2, 'nut', '1234', 'Owner'),
(6, 'admin', '1234', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_car`
--
ALTER TABLE `tb_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_type_care`
--
ALTER TABLE `tb_type_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_car`
--
ALTER TABLE `tb_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_type_care`
--
ALTER TABLE `tb_type_care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
