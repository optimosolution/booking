-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2015 at 11:48 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bna_pos`
--
CREATE DATABASE IF NOT EXISTS `bna_pos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bna_pos`;

-- --------------------------------------------------------

--
-- Table structure for table `os_company`
--

CREATE TABLE IF NOT EXISTS `os_company` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner` int(11) DEFAULT NULL,
  `company_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `fax` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `time_zone` int(11) DEFAULT NULL,
  `paypal_username` varchar(100) DEFAULT NULL,
  `paypal_password` varchar(100) DEFAULT NULL,
  `paypal_signature` varchar(150) DEFAULT NULL,
  `paypal_app_id` varchar(100) DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `company_logo` varchar(250) DEFAULT NULL,
  `summary` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `os_company`
--

INSERT INTO `os_company` (`id`, `owner`, `company_name`, `currency`, `country`, `state`, `city`, `address`, `email`, `phone`, `mobile`, `fax`, `website`, `time_zone`, `paypal_username`, `paypal_password`, `paypal_signature`, `paypal_app_id`, `expiry`, `company_logo`, `summary`) VALUES
(1, 1002, 'Untitled Company', 144, NULL, NULL, NULL, '', 'raihan@gmail.com', '', '', '', '', 567, '', '', '', '', NULL, '1400265870_mymanager-logo-for-unicorn.png', ''),
(2, 1003, 'Untitled Company', 144, NULL, NULL, NULL, NULL, 'usertest@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1007, 'Untitled Company', 144, NULL, NULL, NULL, NULL, 'asdf@adsfc.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1008, 'Untitled Company', 144, NULL, NULL, NULL, NULL, 'asdf@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `os_user`
--

CREATE TABLE IF NOT EXISTS `os_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `group_id` int(11) DEFAULT '6',
  `address` varchar(250) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `profile_picture` varchar(250) DEFAULT NULL,
  `company` int(11) NOT NULL DEFAULT '0',
  `shop_id` int(5) NOT NULL,
  `storeowner` tinyint(1) DEFAULT '0',
  `user_type` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `idx_name` (`name`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1010 ;

--
-- Dumping data for table `os_user`
--

INSERT INTO `os_user` (`id`, `name`, `username`, `email`, `password`, `registerDate`, `lastvisitDate`, `activation`, `group_id`, `address`, `country`, `state`, `city`, `phone`, `mobile`, `fax`, `website`, `profile_picture`, `company`, `shop_id`, `storeowner`, `user_type`, `status`) VALUES
(1001, 'Super Admin', 'sadmin', 'superadmin@gmail.com', '1a37e5eb4ea24b24b0d287e0df00f91715ca2e04', '2013-04-04 23:18:41', '2014-12-07 11:35:34', '9459b14a90b1585ba933d5fcd47927cf', 1, '', 18, 214, 46, '+8801911731214', '+8801911731214', '+8801911731214', 'http://www.saidur-rahman.com/', '1399968696_rana_3.jpg', 0, 0, 0, 1, 1),
(1002, 'Raihan Sabuj', 'raihan', 'raihan.sabuj@gmail.com', 'd0144852d177a5f61422e970b62d5b40c473c388', '2014-05-17 00:07:37', '2015-02-11 15:57:54', '9459b14a90b1585ba933d5fcd47927cf', 2, '', 38, NULL, NULL, '+8801711239679', '+8801971239679', '', '', '1417875291_raihansabuj.jpg', 1, 1, 0, 2, 1),
(1003, 'Store Owner', 'sowner', 'raihan.sabuj@yahoo.com', '402cea5ba8541c95c602c9b71c2dd54f41db2f14', '2014-10-05 23:06:27', '2015-01-07 16:39:41', 'adcf12e84d3b93ef9f736b73020d968c', 6, NULL, 38, NULL, NULL, '', '', '', '', NULL, 1, 1, 1, 6, 1),
(1004, 'Employee One', 'employee1', 'employee1@gmail.com', '73b6475fd5fe4c0750e094f547cd94abfb624351', '2013-04-04 23:18:41', '2014-12-07 01:58:53', '9459b14a90b1585ba933d5fcd47927cf', 7, '', 18, 214, 46, ' ', '+ ', '+ ', ' ', '1399968696_rana_3.jpg', 1, 1, 0, 7, 1),
(1006, 'employee 4', 'wetwet', 'vasdfae@gamial.com', '92429d82a41e930486c6de5ebda9602d55c39986', '2014-11-25 18:37:07', '0000-00-00 00:00:00', '739eb0fbc959b9a95ac4f2184fe695fc', 7, '', 38, NULL, NULL, '', '', '', '', NULL, 2, 0, 0, 0, 2),
(1007, 'adsfasd', 'adsfad', 'asdf@adsfc.com', '7854a33c725b08f967fd1b582d912e356d658fd2', '2014-11-25 18:38:51', '0000-00-00 00:00:00', '2aff9389f77fc6dcdc423e75e53c6489', 6, '', 38, NULL, NULL, '', '', '', '', NULL, 3, 0, 1, 0, 2),
(1008, 'Customer One', 'customer1', 'customer1@booking.com', '4f7eea980302db2975e55e09bf3e64858fd8b2ad', '2014-11-25 18:47:37', '2015-01-07 16:29:31', '0278dd2280e6791ade3e1115138d0284', 8, '', 38, NULL, NULL, '', '', '', '', NULL, 1, 1, 0, 8, 1),
(1009, 'New Employee 1', 'employee1', 'emp@rndinfo.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', '2014-12-04 16:05:18', '0000-00-00 00:00:00', '258ec6dd6634f134e97022e4d92219a7', 7, '', 38, NULL, NULL, '', '', NULL, NULL, '', 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `os_user_group`
--

CREATE TABLE IF NOT EXISTS `os_user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL,
  `details` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_usergroup_parent_title_lookup` (`title`),
  KEY `idx_usergroup_title_lookup` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `os_user_group`
--

INSERT INTO `os_user_group` (`id`, `title`, `details`) VALUES
(1, 'Super Users', NULL),
(2, 'Administrator', NULL),
(3, 'Manager', ''),
(4, 'Publisher', NULL),
(5, 'Editor', NULL),
(6, 'Store owner', NULL),
(7, 'Employee', 'General Employee of each Company and each shop.'),
(8, 'Customer', 'Customer or Registered Members of each Company and each shop.');

-- --------------------------------------------------------

--
-- Table structure for table `os_user_profile`
--

CREATE TABLE IF NOT EXISTS `os_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `expiry` date DEFAULT '0000-00-00',
  `birth_date` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_user_id_profile_key` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Simple user profile storage table' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `os_user_profile`
--

INSERT INTO `os_user_profile` (`id`, `user_id`, `profile_picture`, `country_id`, `state_id`, `city_id`, `address`, `mobile`, `phone`, `fax`, `website`, `expiry`, `birth_date`) VALUES
(1, 1001, '1396694224_rana-bb.png', 18, 653, 1, '', '+8801911731214', '', '', 'http://www.saidur-rahman.com', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `os_user_status`
--

CREATE TABLE IF NOT EXISTS `os_user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `os_user_status`
--

INSERT INTO `os_user_status` (`id`, `status`) VALUES
(1, 'Active'),
(2, 'Not Active'),
(3, 'Blocked'),
(4, 'Expired');

-- --------------------------------------------------------

--
-- Table structure for table `os_visitor`
--

CREATE TABLE IF NOT EXISTS `os_visitor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `page_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `page_link` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `server_time` timestamp NULL DEFAULT NULL,
  `browser` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `visitor_ip` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `os_visitor`
--

INSERT INTO `os_visitor` (`id`, `user_type`, `user_id`, `user_name`, `page_title`, `page_link`, `server_time`, `browser`, `visitor_ip`) VALUES
(1, 0, NULL, 'Guest', 'Learn Quran', 'http://localhost/learnquranbd/', '2014-04-30 17:08:55', 'Firefox', '::1'),
(2, 0, NULL, 'Guest', 'Learn Quran', 'http://localhost/learnquranbd/themes/default/css/styles.css', '2014-04-30 17:08:57', 'Firefox', '::1'),
(3, 0, NULL, 'Guest', 'Learn Quran', 'http://localhost/learnquranbd/themes/default/images/favicon.ico', '2014-04-30 17:08:57', 'Firefox', '::1'),
(4, 0, NULL, 'Guest', 'Learn Quran', 'http://localhost/learnquranbd/themes/default/images/favicon.ico', '2014-04-30 17:08:59', 'Firefox', '::1'),
(5, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:22:03', 'Firefox', '::1'),
(6, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/img/logo.png', '2014-04-30 17:22:04', 'Firefox', '::1'),
(7, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:23:19', 'Firefox', '::1'),
(8, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:24:03', 'Firefox', '::1'),
(9, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:24:30', 'Firefox', '::1'),
(10, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/img/works/full/image-01-full.jpg', '2014-04-30 17:24:48', 'Firefox', '::1'),
(11, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/img/works/full/image-04-full.jpg', '2014-04-30 17:24:50', 'Firefox', '::1'),
(12, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/img/works/full/image-03-full.jpg', '2014-04-30 17:24:50', 'Firefox', '::1'),
(13, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/img/works/full/image-02-full.jpg', '2014-04-30 17:24:50', 'Firefox', '::1'),
(14, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:25:52', 'Firefox', '::1'),
(15, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:26:36', 'Firefox', '::1'),
(16, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:32:24', 'Firefox', '::1'),
(17, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:32:37', 'Firefox', '::1'),
(18, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:33:23', 'Firefox', '::1'),
(19, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:33:40', 'Firefox', '::1'),
(20, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:34:21', 'Firefox', '::1'),
(21, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:35:19', 'Firefox', '::1'),
(22, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 17:39:14', 'Firefox', '::1'),
(23, 0, NULL, 'Guest', 'Learn Quran - Site', '/learnquranbd/', '2014-04-30 18:17:24', 'Firefox', '::1'),
(24, 1, 1, 'admin', 'Booking Management', 'http://localhost/booking/backend.php', '2014-05-13 06:33:30', 'Firefox', '::1'),
(25, 1, 1, 'admin', 'Users - Booking Management', 'http://localhost/booking/backend.php?r=user/admin', '2014-05-13 06:34:43', 'Firefox', '::1'),
(26, 1, 1, 'admin', 'Users - Booking Management', 'http://localhost/booking/backend.php?r=user/admin', '2014-05-13 06:35:39', 'Firefox', '::1'),
(27, 1, 1, 'admin', 'User details - Booking Management', 'http://localhost/booking/backend.php?r=user/view&id=1001', '2014-05-13 06:38:18', 'Firefox', '::1'),
(28, 1, 1, 'admin', 'User details - Booking Management', 'http://localhost/booking/backend.php?r=user/view&id=1001', '2014-05-13 06:39:56', 'Firefox', '::1'),
(29, 1, 1, 'admin', 'Edit admin user - Booking Management', 'http://localhost/booking/backend.php?r=userAdmin/update&id=1', '2014-05-13 06:40:16', 'Firefox', '::1'),
(30, 1, 1, 'admin', 'Users - Booking Management', 'http://localhost/booking/backend.php?r=user/admin', '2014-05-13 06:40:21', 'Firefox', '::1'),
(31, 1, 1, 'admin', 'New user - Booking Management', 'http://localhost/booking/backend.php?r=user/create', '2014-05-13 06:40:27', 'Firefox', '::1'),
(32, 1, 1, 'admin', 'Users - Booking Management', 'http://localhost/booking/backend.php?r=user/admin', '2014-05-13 06:40:38', 'Firefox', '::1'),
(33, 1, 1, 'admin', 'Edit user - Booking Management', 'http://localhost/booking/backend.php?r=user/update&id=1001', '2014-05-13 06:40:43', 'Firefox', '::1'),
(34, 1, 1, 'admin', 'User details - Booking Management', 'http://localhost/booking/backend.php?r=user/view&id=1001', '2014-05-13 06:40:53', 'Firefox', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `os_yiisession`
--

CREATE TABLE IF NOT EXISTS `os_yiisession` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  `userId` int(11) DEFAULT NULL,
  `userType` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `os_yiisession`
--

INSERT INTO `os_yiisession` (`id`, `expire`, `data`, `userId`, `userType`) VALUES
('661eqn3cime59cg5ilr0csnuv5', 1421753869, '', 1008, 0),
('fn0009peevc26e687bmiq92jb3', 1422603504, '', NULL, NULL),
('h8ghl23hd41jf02ocpdg18i7t5', 1423654713, 0x31643162353030363766366335643163376364616465393262373433653537615f5f72657475726e55726c7c733a31393a222f73617265655f686f7573652f61646d696e2f223b31643162353030363766366335643163376364616465393262373433653537615f5f69647c733a343a2231303032223b31643162353030363766366335643163376364616465393262373433653537615f5f6e616d657c733a363a2272616968616e223b316431623530303637663663356431633763646164653932623734336535376167726f75705f69647c733a313a2232223b316431623530303637663663356431633763646164653932623734336535376173746f72656f776e65727c733a313a2230223b3164316235303036376636633564316337636461646539326237343365353761656d61696c7c733a32323a2272616968616e2e736162756a40676d61696c2e636f6d223b316431623530303637663663356431633763646164653932623734336535376166756c6c6e616d657c733a31323a2252616968616e20536162756a223b3164316235303036376636633564316337636461646539326237343365353761757365725f747970657c733a313a2232223b3164316235303036376636633564316337636461646539326237343365353761636f6d70616e797c733a313a2231223b316431623530303637663663356431633763646164653932623734336535376173686f705f69647c733a313a2231223b31643162353030363766366335643163376364616465393262373433653537615f5f7374617465737c613a373a7b733a383a2267726f75705f6964223b623a313b733a31303a2273746f72656f776e6572223b623a313b733a353a22656d61696c223b623a313b733a383a2266756c6c6e616d65223b623a313b733a393a22757365725f74797065223b623a313b733a373a22636f6d70616e79223b623a313b733a373a2273686f705f6964223b623a313b7d6769695f5f72657475726e55726c7c733a33343a222f73617265655f686f7573652f61646d696e2f696e6465782e7068703f723d676969223b6769695f5f69647c733a353a227969696572223b6769695f5f6e616d657c733a353a227969696572223b6769695f5f7374617465737c613a303a7b7d61366233623933376665343661393738653239303137333231363661353430375f5f72657475726e55726c7c733a32353a222f6f6c645f776f726b732f706f732f6170702f61646d696e2f223b, 1002, 0),
('iae5m1kmu515dv8kivc3aggvq6', 1423398092, '', NULL, NULL),
('lgimvafo13vh06qd0apq8hi1b7', 1421827985, '', 1003, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
