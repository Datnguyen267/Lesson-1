-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2016 at 05:00 PM
-- Server version: 5.1.73-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lesson1`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: Male 2 Female',
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_disable` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `fullname`, `sex`, `birthday`, `address`, `email`, `hash`, `is_verified`, `is_disable`) VALUES
(1, 'van_a', 'vana123', 'Nguyen Van A', 1, '1987-01-31', 'Dinh Tien Hoang', 'van_a@gmail.com', '', 0, 0),
(2, 'thi_b', 'thib123', 'Tran Thi B', 2, '1990-02-28', 'Vo Thi Sau', 'thi_b@gmail.com', '', 0, 0),
(3, 'tran_c', 'tranc123', 'Tran C', 1, '1992-05-19', 'Nguyen Phi Khanh', 'tran_c@gmail.com', '', 0, 0),
(43, 'tiendat', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Tiến Đạt', 1, '1994-01-19', 'Nguyễn Phi Khanh', 'datnguyen267@gmail.com', '', 0, 0),
(57, 'tiendat2', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Tien Dat', 1, '1994-01-19', 'Nguyen Phi Khanh', 'tien_dat@lampart-vn.com', 'b0c0f02b25cc6b3671fa21de9ca49437', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
