-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2017 at 01:05 PM
-- Server version: 10.0.26-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmutiwa_water`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `ID` int(10) NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `atvt` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`ID`, `user`, `time`, `date`, `atvt`, `note`) VALUES
(5, 'niaw', '12:29:39', ' 29-05-2017', 'เพิ่มแผนที่', ' เพิ่มข้อมูล | สถานที่ ไม่ระบุชื่อ'),
(6, 'niaw', '12:32:20', ' 29-05-2017', 'à¹à¸à¹‰à¹„à¸‚à¹à¸œà¸™à¸—à¸µà¹ˆ', ' à¹à¸à¹‰à¹„à¸‚à¸‚à¹‰à¸­à¸¡à¸¹à¸¥ | à¸ªà¸–à¸²à¸™à¸—à¸µà¹ˆ à¸—à¸”à¸ªà¸­à¸š 1 | à¹„à¸­à¸”à¸µ 2'),
(7, 'niaw', '12:33:11', ' 29-05-2017', 'à¹€à¸žà¸´à¹ˆà¸¡à¹à¸œà¸™à¸—à¸µà¹ˆ', ' à¹€à¸žà¸´à¹ˆà¸¡à¸‚à¹‰à¸­à¸¡à¸¹à¸¥ | à¸ªà¸–à¸²à¸™à¸—à¸µà¹ˆ à¸—à¸”à¸ªà¸­à¸š 2'),
(8, 'niaw', '12:35:33', ' 29-05-2017', 'เพิ่มแผนที่', ' เพิ่มข้อมูล | สถานที่ ไม่ระบุชื่อ'),
(9, 'niaw', '12:36:33', ' 29-05-2017', 'à¸¥à¸šà¹à¸œà¸™à¸—à¸µà¹ˆ', 'à¸¥à¸šà¸‚à¹‰à¸­à¸¡à¸¹à¸¥ | à¸ªà¸–à¸²à¸™à¸—à¸µà¹ˆ ??????????? | à¹„à¸­à¸”à¸µ 4'),
(10, 'niaw', '12:36:45', ' 29-05-2017', 'เพิ่มแผนที่', ' เพิ่มข้อมูล | สถานที่ ไม่ระบุชื่อ'),
(11, 'niaw', '12:39:00', ' 29-05-2017', 'เพิ่มแผนที่', ' เพิ่มข้อมูล | สถานที่ ไม่ระบุชื่อ'),
(12, 'niaw', '12:39:49', ' 29-05-2017', 'เพิ่มแผนที่', ' เพิ่มข้อมูล | สถานที่ ไม่ระบุชื่อ'),
(13, 'niawjunior', '12:53:00', ' 29-05-2017', 'à¹€à¸¥à¸·à¸­à¸à¹€à¸›à¹‡à¸™à¹à¸œà¸™à¸—à¸µà¹ˆà¸«à¸', ' à¹€à¸¥à¸·à¸­à¸à¹ƒà¸Šà¹‰à¸‚à¹‰à¸­à¸¡à¸¹à¸¥ | à¸ªà¸–à¸²à¸™à¸—à¸µà¹ˆ N/A | à¹„à¸­à¸”à¸µ 8'),
(14, 'niawjunior', '13:01:35', ' 29-05-2017', 'à¸¢à¸à¹€à¸¥à¸´à¸à¹€à¸›à¹‡à¸™à¹à¸œà¸™à¸—à¸µà¹ˆà¸', ' à¸¢à¸à¹€à¸¥à¸´à¸à¸à¸²à¸£à¹ƒà¸Šà¹‰à¸‚à¹‰à¸­à¸¡à¸¹à¸¥ | à¸ªà¸–à¸²à¸™à¸—à¸µà¹ˆ N/A | à¹„à¸­à¸”à¸µ 8'),
(15, 'niawjunior', '13:02:35', ' 29-05-2017', 'à¹€à¸¥à¸·à¸­à¸à¹€à¸›à¹‡à¸™à¹à¸œà¸™à¸—à¸µà¹ˆà¸«à¸¥à¸±à¸', ' à¹€à¸¥à¸·à¸­à¸à¹ƒà¸Šà¹‰à¸‚à¹‰à¸­à¸¡à¸¹à¸¥ | à¸ªà¸–à¸²à¸™à¸—à¸µà¹ˆ N/A | à¹„à¸­à¸”à¸µ 8');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `ID` int(20) NOT NULL,
  `h1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `h2` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `la` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `deep` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `level` float NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`ID`, `h1`, `h2`, `la`, `lo`, `deep`, `url`, `level`, `time`, `date`) VALUES
(8, 'N/A', 'Sri Chant Rd, Tambon Nai Mueang, Amphoe Mueang Khon Kaen, Chang Wat Khon Kaen 40000, Thailand', '16.432504078561873', '102.82154498621821', 'N/A', 'map.jpg', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID` int(20) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time_log` int(20) NOT NULL,
  `date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastactivity` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `countatvt` int(10) NOT NULL,
  `question` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `user`, `name`, `pass`, `email`, `sex`, `tel`, `status`, `img`, `time`, `time_log`, `date`, `lastactivity`, `countatvt`, `question`, `answer`) VALUES
(2, 'niawjunior', '', 'c56d0e9a7ccec67b4ea131655038d604', 'niawkung2@gmail.com', '', '', 'ADMIN', '', '12:58:09', 1496037808, '29-05-2017', 'à¹ƒà¸Šà¹‰à¹€à¸›à¹‡à¸™à¹à¸œà¸™à¸—à¸µà¹ˆà¸«à¸¥à¸±à¸ | à¸ªà¸–à¸²à¸™à¸—à¸µà¹ˆ N/A', 3, 'à¸‡à¸²à¸™à¸­à¸”à¸´à¹€à¸£à¸à¸‚à¸­à¸‡à¸„à¸¸à¸“à¸„à¸·à¸­?', 'à¹€à¸¥à¹ˆà¸™à¹€à¸à¸¡à¸ªà¹Œ'),
(3, 'natnon', '', 'c56d0e9a7ccec67b4ea131655038d604', 'nutnonkungza@gmail.com', '', '', 'ADMIN', '', '12:49:56', 1496037471, '29-05-2017', '', 0, 'à¸ªà¸±à¸•à¸¢à¹Œà¹€à¸¥à¸µà¹‰à¸¢à¸‡à¸•à¸±à¸§à¹à¸£à¸à¸‚à¸­à¸‡à¸„à¸¸à¸“à¸Šà¸·à¹ˆà¸­à¸§à¹ˆà¸²?', 'à¹à¸žà¸™à¸”à¹‰à¸²'),
(4, 'Admin', '', 'c56d0e9a7ccec67b4ea131655038d604', 'niawkungww2@gmail.com', '', '', 'USER', '', '', 0, '', '', 0, 'à¸ªà¸±à¸•à¸¢à¹Œà¹€à¸¥à¸µà¹‰à¸¢à¸‡à¸•à¸±à¸§à¹à¸£à¸à¸‚à¸­à¸‡à¸„à¸¸à¸“à¸Šà¸·à¹ˆà¸­à¸§à¹ˆà¸²?', 'à¸à¸');

-- --------------------------------------------------------

--
-- Table structure for table `showdata`
--

CREATE TABLE `showdata` (
  `ID` int(10) NOT NULL,
  `showh1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `showh2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `showla` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `showlo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `showdeep` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `showurl` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `showdata`
--

INSERT INTO `showdata` (`ID`, `showh1`, `showh2`, `showla`, `showlo`, `showdeep`, `showurl`) VALUES
(2, 'N/A', 'Sri Chant Rd, Tambon Nai Mueang, Amphoe Mueang Khon Kaen, Chang Wat Khon Kaen 40000, Thailand', '16.432504078561873', '102.82154498621821', 'N/A', 'map.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `ID` int(10) NOT NULL,
  `t2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `postby` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_table`
--

CREATE TABLE `water_table` (
  `ID` int(100) NOT NULL,
  `place` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` double NOT NULL,
  `deep` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `showdata`
--
ALTER TABLE `showdata`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `water_table`
--
ALTER TABLE `water_table`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
