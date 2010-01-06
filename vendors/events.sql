-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2010 at 09:30 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bison`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM  AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `description`, `startdate`, `enddate`, `status`, `created`, `modified`) VALUES
(1, 1, 'Event 1', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent vehicula, lectus vitae molestie fringilla; metus nisl vehicula neque, eget rhoncus sapien nunc id ligula. In dolor justo, fermentum vel ornare eget, tristique eu urna. Morbi massa nunc.\r\n', '2010-01-09 00:00:00', '2010-01-10 00:00:00', 1, '2010-01-05 00:38:21', '2010-01-05 19:33:53'),
(2, 1, 'Event 2', 'Curabitur non dolor urna. Ut vitae lacus eget purus cursus ultricies adipiscing ac tellus? Aliquam ac urna purus. Donec vulputate condimentum turpis at rhoncus. Proin dictum condimentum sem, sit amet tincidunt orci accumsan at! Quisque posuere pretium diam, vitae consectetur sed.\r\n', '2010-01-10 00:00:00', '2010-01-12 00:00:00', 1, '2010-01-05 00:38:53', '2010-01-05 20:07:59'),
(3, 1, 'Lunch', 'Cras ullamcorper porta urna condimentum iaculis! Aliquam vel ornare massa. Proin quis lacus odio, et ornare nibh. Fusce id tellus tortor. Sed eleifend enim at nunc euismod at amet.\r\n', '2009-12-03 12:32:00', '1970-01-01 12:32:00', 1, '2010-01-05 19:33:14', '2010-01-05 19:57:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
