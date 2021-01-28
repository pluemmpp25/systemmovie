-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2021 at 05:27 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systemmovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `discountcode`
--

CREATE TABLE `discountcode` (
  `code_id` int(11) NOT NULL COMMENT 'รหัสโค้ตส่วนลด',
  `code_name` varchar(50) NOT NULL COMMENT 'ชื่อโค้ตส่วนลด',
  `code_discount` int(11) NOT NULL COMMENT 'ราคาที่ลด',
  `code_exdate` date NOT NULL COMMENT 'วันที่หมดอายุ',
  `code_extime` time NOT NULL COMMENT 'เวลาหมดอายุ',
  `u_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `discountcode`
--

INSERT INTO `discountcode` (`code_id`, `code_name`, `code_discount`, `code_exdate`, `code_extime`, `u_id`) VALUES
(1, 'mv1234', 30, '2021-01-25', '05:07:14', 0),
(123457, 'mv2234', 25, '2021-01-17', '00:13:00', 0),
(123459, 'mv3234', 25, '2021-01-08', '06:27:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `moviename`
--

CREATE TABLE `moviename` (
  `name_id` int(11) NOT NULL COMMENT 'รหัสหนัง',
  `name_th` varchar(100) NOT NULL COMMENT 'ชื่อหนังภาษาไทย',
  `name_en` varchar(100) NOT NULL COMMENT 'ชื่อหนังภาษาอังกฤษ',
  `name_time` varchar(100) NOT NULL COMMENT 'ความยาวของหนัง',
  `name_timem` int(11) NOT NULL COMMENT 'ความยาวนาที',
  `name_details` varchar(255) NOT NULL COMMENT 'รายละเอียด',
  `type_id` int(11) NOT NULL COMMENT 'รหัสประเภทหนัง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `moviename`
--

INSERT INTO `moviename` (`name_id`, `name_th`, `name_en`, `name_time`, `name_timem`, `name_details`, `type_id`) VALUES
(1, 'อวตาร', 'avatar', '24', 1, 'เป็นเรื่องราวเกี่ยวกับ.............', 6),
(3, 'ต้มยำกุ้ง', 'tomyumgung', '23', 2, 'เป็นเรื่องราวเกี่นวกับ.................', 6),
(7, 'ไอรอนแมน', 'ironman', '24', 3, 'เป็นภาพยนต์เกี่ยวกับ.............', 10),
(8, 'ต้มยำกุ้ง1', '1111', '3', 2, 'llllll', 6);

-- --------------------------------------------------------

--
-- Table structure for table `movietheater`
--

CREATE TABLE `movietheater` (
  `t_id` int(11) NOT NULL COMMENT 'รหัสโรงฉาย',
  `t_name` varchar(20) NOT NULL COMMENT 'ชื่อโรงฉาย',
  `u_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `st_id` int(11) NOT NULL COMMENT 'รหัสสถานะโรงฉาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movietheater`
--

INSERT INTO `movietheater` (`t_id`, `t_name`, `u_id`, `st_id`) VALUES
(1, 'โรง1', 0, 1),
(2, 'โรง2', 1001, 1),
(6, 'โรง3', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movietime`
--

CREATE TABLE `movietime` (
  `time_id` int(11) NOT NULL COMMENT 'รหัสรอบฉาย',
  `time_playdate` date NOT NULL COMMENT 'วันที่ฉาย',
  `time_playtime` time NOT NULL COMMENT 'เวลาที่ฉาย',
  `time_price` int(11) NOT NULL COMMENT 'ราคาแถวหน้า',
  `time_pricen` int(11) NOT NULL COMMENT 'ราคาแถวหลัง',
  `t_id` int(11) NOT NULL COMMENT 'รหัสโรงฉาย',
  `name_id` int(11) NOT NULL COMMENT 'รหัสหนัง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movietime`
--

INSERT INTO `movietime` (`time_id`, `time_playdate`, `time_playtime`, `time_price`, `time_pricen`, `t_id`, `name_id`) VALUES
(5, '2021-01-08', '17:45:00', 80, 125, 2, 1),
(6, '2021-01-14', '17:47:00', 100, 130, 1, 7),
(7, '2020-12-31', '22:48:00', 120, 160, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `movietype`
--

CREATE TABLE `movietype` (
  `type_id` int(11) NOT NULL COMMENT 'รหัสประเภทหนัง',
  `type_th` varchar(100) NOT NULL COMMENT 'ชื่อประเภทภาษาไทย',
  `type_en` varchar(100) NOT NULL COMMENT 'ชื่อประเภทภาษาอังกฤษ',
  `u_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movietype`
--

INSERT INTO `movietype` (`type_id`, `type_th`, `type_en`, `u_id`) VALUES
(3, 'แอคชั่น', 'action', 1001),
(6, 'ดราม่า', 'darma', 1001),
(10, 'ตลก', 'commedy', 1001),
(12, 'แอคชั่น1', 'action1', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `theater_status`
--

CREATE TABLE `theater_status` (
  `st_id` int(11) NOT NULL COMMENT 'รหัสสถานะโรงฉาย',
  `st_name` varchar(50) NOT NULL COMMENT 'ชื่อสถานะโรงฉาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `theater_status`
--

INSERT INTO `theater_status` (`st_id`, `st_name`) VALUES
(1, 'เปิดใช้งาน'),
(2, 'ปิดใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `tk_id` int(11) NOT NULL COMMENT 'รหัสตั๋ว',
  `tk_payment` int(11) NOT NULL COMMENT 'ราคาตั๋วสุทธิ',
  `tk_status` varchar(50) NOT NULL COMMENT 'สถานะ',
  `tk_seat` varchar(5) NOT NULL COMMENT 'ที่นั้ง',
  `type_id` int(11) NOT NULL COMMENT 'ประเภทหนัง',
  `code_id` int(11) NOT NULL COMMENT 'รหัสโค้ตส่วนลด',
  `u_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `u_username` varchar(50) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `u_email` varchar(100) NOT NULL COMMENT 'อีเมล',
  `u_password` varchar(50) NOT NULL COMMENT 'รหัสผ่าน',
  `st_id` int(11) NOT NULL COMMENT 'รหัสสถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_username`, `u_email`, `u_password`, `st_id`) VALUES
(1001, 'pluem', 'pluem@gmail.com', 'p123456789', 1),
(1002, 'ppp333', 'p@gmail.com', 'Pi12345678', 2),
(1008, '55555555555', '11@gmail.com', 'Pi12345678', 2),
(1011, 'pluem1', 'p1@gmail.com', 'Pi12345678', 1),
(1012, 'pluem3', 'p3@gmail.com', 'i12345678', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `st_id` int(11) NOT NULL COMMENT 'รหัสสถานะ',
  `st_name` varchar(50) NOT NULL COMMENT 'ชื่อสถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`st_id`, `st_name`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'ผู้ใช้งาน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discountcode`
--
ALTER TABLE `discountcode`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `moviename`
--
ALTER TABLE `moviename`
  ADD PRIMARY KEY (`name_id`);

--
-- Indexes for table `movietheater`
--
ALTER TABLE `movietheater`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `movietime`
--
ALTER TABLE `movietime`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `movietype`
--
ALTER TABLE `movietype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `theater_status`
--
ALTER TABLE `theater_status`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`tk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discountcode`
--
ALTER TABLE `discountcode`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโค้ตส่วนลด', AUTO_INCREMENT=123460;

--
-- AUTO_INCREMENT for table `moviename`
--
ALTER TABLE `moviename`
  MODIFY `name_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหนัง', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movietheater`
--
ALTER TABLE `movietheater`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโรงฉาย', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movietime`
--
ALTER TABLE `movietime`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรอบฉาย', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movietype`
--
ALTER TABLE `movietype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทหนัง', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `theater_status`
--
ALTER TABLE `theater_status`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสถานะโรงฉาย', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `tk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตั๋ว';

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสถานะ', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
