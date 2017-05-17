-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2017 at 04:53 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u220965490_water`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `ID` int(10) NOT NULL,
  `user` varchar(10) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `atvt` varchar(1000) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`ID`, `user`, `time`, `date`, `atvt`, `note`) VALUES
(1105, 'niaw', '04:54:05', ' 15-05-2017', 'เพิ่มข้อมูลระดับน้ำ', 'เพิ่มข้อมูล | สถานที่ ไม่ระบุชื่อ | ระดับน้ำ 2 เมตร '),
(1106, 'niaw', '04:54:12', ' 15-05-2017', 'เลือกเป็นแผนที่หลัก', ' เลือกใช้ข้อมูล | สถานที่ ไม่ระบุชื่อ | ไอดี 90'),
(1107, 'niaw', '22:52:36', ' 15-05-2017', 'เพิ่มรายงาน', ' เพิ่มข้อมูล | เรื่อง fgf'),
(1108, 'niaw', '22:52:41', ' 15-05-2017', 'ลบรายงาน', ' ลบข้อมูล | เรื่อง fgf | ไอดี 147'),
(1109, 'niaw', '22:52:49', ' 15-05-2017', 'แก้ไขสมาชิก', ' แก้ไขข้อมูล | ชื่อ  niaw | ไอดี   77'),
(1110, 'niaw', '11:14:59', ' 16-05-2017', 'แก้ไขสมาชิก', ' แก้ไขข้อมูล | ชื่อ  test | ไอดี   78'),
(1096, 'niaw', '04:12:34', ' 15-05-2017', 'เพิ่มรายงาน', ' เพิ่มข้อมูล | เรื่อง 111'),
(1097, 'niaw', '04:17:22', ' 15-05-2017', 'ลบรายงาน', ' ลบข้อมูล | เรื่อง 111 | ไอดี 145'),
(1098, 'niaw', '04:18:32', ' 15-05-2017', 'เพิ่มแผนที่', ' เพิ่มข้อมูล | สถานที่ ไม่ระบุชื่อ'),
(1099, 'niaw', '04:18:47', ' 15-05-2017', 'แก้ไขแผนที่', ' แก้ไขข้อมูล | สถานที่ ไม่ระบุชื่อ | ไอดี 89'),
(1100, 'niaw', '04:20:46', ' 15-05-2017', 'เพิ่มรายงาน', ' เพิ่มข้อมูล | เรื่อง 111'),
(1101, 'niaw', '04:20:49', ' 15-05-2017', 'ลบรายงาน', ' ลบข้อมูล | เรื่อง 111 | ไอดี 146'),
(1102, 'niaw', '04:22:54', ' 15-05-2017', 'ลบแผนที่', 'ลบข้อมูล | สถานที่ ไม่ระบุชื่อ | ไอดี 89'),
(1103, 'niaw', '04:53:46', ' 15-05-2017', 'เพิ่มแผนที่', ' เพิ่มข้อมูล | สถานที่ ไม่ระบุชื่อ'),
(1104, 'niaw', '04:53:54', ' 15-05-2017', 'แก้ไขแผนที่', ' แก้ไขข้อมูล | สถานที่ ไม่ระบุชื่อ | ไอดี 90');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `ID` int(20) NOT NULL,
  `h1` varchar(100) NOT NULL,
  `h2` varchar(500) NOT NULL,
  `la` varchar(20) NOT NULL,
  `lo` varchar(20) NOT NULL,
  `deep` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`ID`, `h1`, `h2`, `la`, `lo`, `deep`, `url`, `level`, `time`, `date`) VALUES
(90, 'ไม่ระบุชื่อ', '99, 99/1 ถนน Sri Chant Rd, Tambon Nai Mueang, Amphoe Mueang Khon Kaen, Chang Wat Khon Kaen 40000, Thailand', '16.43248349735633', '102.82498894259334', '3', 'map.jpg', '2', '12:12', '2017-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `img` varchar(300) NOT NULL,
  `time` varchar(10) NOT NULL,
  `time_log` int(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `lastactivity` varchar(100) NOT NULL,
  `countatvt` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `user`, `name`, `pass`, `email`, `sex`, `tel`, `status`, `img`, `time`, `time_log`, `date`, `lastactivity`, `countatvt`) VALUES
(77, 'niaw', '', 'c56d0e9a7ccec67b4ea131655038d604', 'niawkung2@gmail.com', 'ชาย', '', 'ADMIN', 'https://lh4.googleusercontent.com/-KrUpjv4wae8/AAAAAAAAAAI/AAAAAAAAHhM/iGPGrEMUnwQ/photo.jpg', '14:32:10', 1494927248, '16-05-2017', 'แก้ไขสมาชิก | ชื่อ test', 15),
(78, 'test', '', 'c56d0e9a7ccec67b4ea131655038d604', 'niawkung4@gmail.com', 'หญิง', '', 'USER', '', '13:14:37', 1494915314, '16-05-2017', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `showdata`
--

CREATE TABLE `showdata` (
  `ID` int(11) NOT NULL,
  `showh1` varchar(100) NOT NULL,
  `showh2` varchar(200) NOT NULL,
  `showla` varchar(20) NOT NULL,
  `showlo` varchar(20) NOT NULL,
  `showdeep` varchar(20) NOT NULL,
  `showurl` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `showdata`
--

INSERT INTO `showdata` (`ID`, `showh1`, `showh2`, `showla`, `showlo`, `showdeep`, `showurl`) VALUES
(238, 'ไม่ระบุชื่อ', '99, 99/1 ถนน Sri Chant Rd, Tambon Nai Mueang, Amphoe Mueang Khon Kaen, Chang Wat Khon Kaen 40000, Thailand', '16.43248349735633', '102.82498894259334', '3', 'map.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `ID` int(10) NOT NULL,
  `t2` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `date` varchar(10) NOT NULL,
  `postby` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `water_table`
--

CREATE TABLE `water_table` (
  `ID` int(100) NOT NULL,
  `place` varchar(20) NOT NULL,
  `level` float NOT NULL,
  `deep` varchar(20) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `water_table`
--

INSERT INTO `water_table` (`ID`, `place`, `level`, `deep`, `time`, `date`) VALUES
(3792, 'ไม่ระบุชื่อ', 2, ' 3', '12:12', '2017-05-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `showdata`
--
ALTER TABLE `showdata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `water_table`
--
ALTER TABLE `water_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `showdata`
--
ALTER TABLE `showdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `water_table`
--
ALTER TABLE `water_table`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3793;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
