-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2013 at 08:09 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `neoglobal_stylista`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `pk_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT '1',
  `cat_image` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`pk_cat_id`, `category_name`, `category_desc`, `category_status`, `cat_image`) VALUES
(1, 'Electronics', 'this is a test description', 1, 'Penguins.jpg'),
(2, 'Furniture', 'this is a test description', 1, 'Chrysanthemum.jpg'),
(3, 'Mobile', 'this is a test description', 1, 'Desert.jpg'),
(4, 'House Hold', 'this is a test description', 1, 'Tulips.jpg'),
(5, 'Other', 'this is a test description', 1, 'Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deals`
--

CREATE TABLE IF NOT EXISTS `tbl_deals` (
  `pk_deal_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_name` varchar(255) NOT NULL,
  `deal_description` text NOT NULL,
  `deal_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=payment not verified, 1=payment verified',
  `date_added` datetime NOT NULL,
  `exp_date` datetime NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `deal_image` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_deal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_deals`
--

INSERT INTO `tbl_deals` (`pk_deal_id`, `deal_name`, `deal_description`, `deal_status`, `date_added`, `exp_date`, `fk_user_id`, `deal_image`) VALUES
(1, 'test deal', 'test+description%0D%0A', 0, '2012-12-25 15:10:51', '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE IF NOT EXISTS `tbl_package` (
  `pk_package_id` int(11) NOT NULL AUTO_INCREMENT,
  `pkg_name` varchar(255) NOT NULL,
  `pkg_desc` text NOT NULL,
  `pkg_price` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`pk_package_id`, `pkg_name`, `pkg_desc`, `pkg_price`) VALUES
(1, 'shop', 'this is a test description', '500'),
(2, 'product', 'this is a test description', '300'),
(3, 'deals', 'this is a test description', '250');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `pk_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `date_added` datetime NOT NULL,
  `exp_date` datetime NOT NULL,
  `fk_store_id` int(11) NOT NULL DEFAULT '0',
  `fk_cat_id` int(11) NOT NULL DEFAULT '0' COMMENT '0=if no category',
  `prd_main_image` varchar(255) NOT NULL,
  `prd_thumb_1` varchar(255) NOT NULL,
  `prd_thumb_2` varchar(255) NOT NULL,
  `prd_thumb_3` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE IF NOT EXISTS `tbl_store` (
  `pk_store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) NOT NULL,
  `store_description` text NOT NULL,
  `date_added` datetime NOT NULL,
  `exp_date` datetime NOT NULL,
  `store_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=payment not verified, 1=payment verified',
  `fk_user_id` int(11) NOT NULL,
  `store_image` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_store_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_store`
--

INSERT INTO `tbl_store` (`pk_store_id`, `store_name`, `store_description`, `date_added`, `exp_date`, `store_status`, `fk_user_id`, `store_image`) VALUES
(1, 'Baig Super Store', 'this is a test description for Baig super store', '2012-12-21 16:00:00', '2013-02-21 16:00:00', 1, 1, ''),
(2, 'Xyz Super Store', 'This is a test description for 2nd store from baig', '2012-12-21 16:00:00', '2013-02-21 16:00:00', 0, 1, ''),
(3, 'Hassan Super Store', 'This is a test description for 1st store from hassan', '2012-12-21 16:03:00', '2013-02-21 16:03:00', 1, 2, ''),
(4, 'Abc Super Store', 'This is a test description for 2nd store for hassan', '2012-12-21 16:03:00', '2012-12-21 15:03:00', 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `pk_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `nic_num` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL COMMENT 'will be taken as user_name for login process',
  `location` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`pk_user_id`, `full_name`, `nic_num`, `shop_name`, `location`, `user_email`, `user_password`, `user_phone`) VALUES
(1, 'Muhammed Ahmed Baig', '37405-6441053-1', 'baig772', 'Rawalpindi', 'baig772@gmail.com', '1234', '03215624662');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_pkg`
--

CREATE TABLE IF NOT EXISTS `tbl_user_pkg` (
  `pk_user_pkg_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(11) NOT NULL,
  `fk_pkg_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_user_pkg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
