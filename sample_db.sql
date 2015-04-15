-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2015 at 10:22 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`serial`, `name`, `email`, `address`, `phone`) VALUES
(1, 'Adrianne Ajeng', 'adrianne.kreydle@gmail.com', '18A-4 Third Floor', '085959'),
(2, '0', '0', '0', '0'),
(3, 'Orenji Ebi', 'orenjiebi@outlook.com', 'Jalan Ki Hajar Dewantara Kota Jababeka Cikarang Baru Bekasi', '8we78wq78e'),
(4, '0', 'adrianneavs@gmail.com', 'dhkjass', '2317462386'),
(5, '0', 'adrianneavs@gmail.com', 'Kreydle', '3298328'),
(6, '0', 'adrianne.kreydle@gmail.com', '18A-4 Third Floor', '39884794'),
(7, '0', 'adrianne.kreydle@gmail.com', '18A-4 Third Floor', '45939485095'),
(8, '0', 'adrianne.kreydle@gmail.com', '18A-4 Third Floor', '3492023'),
(9, '0', 'adrianne.kreydle@gmail.com', '18A-4 Third Floor', '3492023'),
(10, '0', 'adrianne.kreydle@gmail.com', '18A-4 Third Floor', '334335'),
(11, '0', 'adrianne.kreydle@gmail.com', '18A-4 Third Floor', '334335'),
(12, '0', 'adrianne.kreydle@gmail.com', 'malaysia', '3403598435'),
(13, '0', 'adrianne.ajeng@outlook.com', 'Bandung', '39483444'),
(14, '0', 'adrianne.ajeng@outlook.com', 'Bandung', '39483444'),
(15, '0', 'vanyadevina@gmail.com', 'indonesia', '4374784'),
(16, '0', 'vanyadevina@gmail.com', 'indonesia', '4374784'),
(17, '0', 'vanyadevina@gmail.com', 'indonesia', '4374784');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`serial`, `date`, `customerid`) VALUES
(1, '2015-04-12', 1),
(2, '2015-04-12', 2),
(3, '2015-04-12', 3),
(4, '2015-04-13', 4),
(5, '2015-04-13', 5),
(6, '2015-04-15', 6),
(7, '2015-04-15', 7),
(8, '2015-04-15', 8),
(9, '2015-04-15', 9),
(10, '2015-04-15', 10),
(11, '2015-04-15', 11),
(12, '2015-04-15', 12),
(13, '2015-04-15', 13),
(14, '2015-04-15', 14),
(15, '2015-04-15', 15),
(16, '2015-04-15', 16),
(17, '2015-04-15', 17);

-- --------------------------------------------------------

--
-- Table structure for table `order_complete`
--

CREATE TABLE IF NOT EXISTS `order_complete` (
  `date` date NOT NULL,
  `orderid` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `phone` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderid`, `productid`, `quantity`, `price`) VALUES
(1, 1, 4, 30),
(1, 2, 1, 5),
(2, 1, 4, 30),
(2, 2, 1, 5),
(3, 1, 1, 30),
(4, 1, 1, 30),
(4, 2, 1, 5),
(5, 1, 9, 30);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(80) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`serial`, `name`, `description`, `price`, `picture`) VALUES
(1, 'Macarons', 'Colorfull', 30, 'images/f_macarons.jpg'),
(2, 'Chocolate Lava Cake', 'Sweet', 5, 'images/f_cake.jpg'),
(3, 'Kitkat', 'Coklat', 7, 'images/f_kitkat.jpg'),
(4, 'Doughnut', 'Donat', 5, 'images/f_donat.jpg'),
(9, 'Orange', 'Juice', 5, 'images/b_orange.jpg'),
(10, 'Teh Tarik', 'Malaysia', 5, 'images/b_tarik.jpg'),
(5, 'Waffle', 'Waffle', 20, 'images/f_waffle.jpg'),
(8, 'Milo', 'Ais', 5, 'images/b_milo.jpg'),
(6, 'Cappucino', 'Ice/Hot', 4, 'images/b_cappucino.jpg'),
(7, 'Cendol', 'Indonesia', 5, 'images/b_cendol.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `modified`) VALUES
(28, 'John', 'Dalisay', '', 'john', 'john123', '2012-01-14 23:26:14'),
(39, 'Jem', 'Panlilio', '', 'jemboy09', 'jem123', '2012-01-14 23:26:46'),
(40, 'Darwin', 'Dalisay', '', 'dada08', 'dada123', '2012-01-14 23:25:34'),
(46, 'Jaylord', 'Bitamug', '', 'jayjay', 'jay123', '2012-01-14 23:27:04'),
(49, 'Justine', 'Bongola', '', 'jaja', 'jaja123', '2012-01-14 23:27:21'),
(50, 'Jun', 'Sabayton', '', 'jun', 'jun123', '2012-02-05 02:15:14'),
(51, 'Lourd', 'De Veyra', '', 'lourd', 'lourd123', '2012-02-05 02:15:36'),
(52, 'Asi', 'Taulava', '', 'asi', 'asi123', '2012-02-05 02:15:58'),
(53, 'James', 'Yap', '', 'james', 'jame123', '2012-02-05 02:16:17'),
(54, 'Chris', 'Tiu', '', 'chris', 'chris123', '2012-02-05 02:16:29'),
(55, 'Gu', 'He Ra', 'guhera@sing.com', 'guhera', 'again123', '2015-04-03 08:54:04'),
(57, 'Dimas', 'Danang', 'dimas@danang.com', 'dimasdanang', '1022', '2015-04-03 09:51:25'),
(68, 'himnae', 'jinyoung', 'himnae@jinyoung.com', 'himnae', 'jinyoung', '2015-04-13 08:16:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
