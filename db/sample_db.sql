-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 09:20 AM
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
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(30) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `o_username` varchar(100) NOT NULL,
  `o_foodname` varchar(100) NOT NULL,
  `o_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(1, 'PD1001', 'Macarons', 'Color', 'macarons.jpeg', 200.50),
(2, 'PD1002', 'Milo Ais', 'Sweet', 'lcd-tv.jpg', 500.85),
(3, 'PD1003', 'Kitkat', 'coklat', 'external-hard-disk.jpg', 100.00),
(4, 'PD1004', 'orenji', 'juice', 'wrist-watch.jpg', 400.30);

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
  `key` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `modified`, `key`) VALUES
(28, 'John', 'Dalisay', '', 'john', 'john123', '2012-01-14 23:26:14', '0'),
(39, 'Jem', 'Panlilio', '', 'jemboy09', 'jem123', '2012-01-14 23:26:46', '0'),
(40, 'Darwin', 'Dalisay', '', 'dada08', 'dada123', '2012-01-14 23:25:34', '0'),
(46, 'Jaylord', 'Bitamug', '', 'jayjay', 'jay123', '2012-01-14 23:27:04', '0'),
(49, 'Justine', 'Bongola', '', 'jaja', 'jaja123', '2012-01-14 23:27:21', '0'),
(50, 'Jun', 'Sabayton', '', 'jun', 'jun123', '2012-02-05 02:15:14', '0'),
(51, 'Lourd', 'De Veyra', '', 'lourd', 'lourd123', '2012-02-05 02:15:36', '0'),
(52, 'Asi', 'Taulava', '', 'asi', 'asi123', '2012-02-05 02:15:58', '0'),
(53, 'James', 'Yap', '', 'james', 'jame123', '2012-02-05 02:16:17', '0'),
(54, 'Chris', 'Tiu', '', 'chris', 'chris123', '2012-02-05 02:16:29', '0'),
(55, 'Gu', 'He Ra', 'guhera@sing.com', 'guhera', 'again123', '2015-04-03 08:54:04', ''),
(56, 'Adrianne', 'Ajeng', 'adrianne.kreydle@gmail.com', 'adrianneavs', '123angka', '2015-04-03 08:55:27', 'd5aef0b0505d14f711c5ce702ebdae'),
(57, 'Dimas', 'Danang', 'dimas@danang.com', 'dimasdanang', '1022', '2015-04-03 09:51:25', 'baa4a68a786546fff5333e8e38db57'),
(58, 'Shen', 'Chia', 'shen@chiayi.com', 'shenchiayi', 'apple', '2015-04-06 02:43:37', 'aba6ad6113f395d31a19416a4cfaf5'),
(60, 'vanya', 'devina', 'adrianneavs@gmail.com', 'vanyadev', 'vanyadev', '2015-04-07 04:29:14', '24126cd17afccdc1b5787002246fe1'),
(62, 'Orenji', 'Ebi', 'orenjiebi@outlook.com', 'orenjiebi', 'orenjiebi.com', '2015-04-07 04:40:02', '1b44f67ad82be79ea077a23ef3134a'),
(63, 'Ajeng', 'Ajeng', 'adrianne.ajeng@outlook.com', 'adrianne', 'hahaha', '2015-04-07 04:49:55', '80d0222417c85784bebac801e59d53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
