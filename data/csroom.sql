-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-05-05 22:40:25
-- 服务器版本： 5.5.37-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csroom`
--
CREATE DATABASE IF NOT EXISTS `csroom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `csroom`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--
-- 创建时间： 2014-05-05 12:04:30
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` char(40) CHARACTER SET utf8 NOT NULL,
  `password` char(40) CHARACTER SET utf8 NOT NULL,
  `duty` varchar(50) CHARACTER SET utf8 NOT NULL,
  `number` varchar(50) NOT NULL,
  `root` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`name`, `password`, `duty`, `number`, `root`) VALUES
('common', '202cb962ac59075b964b07152d234b70', 'common manager', '123', 1),
('å”æœ¬è¾¾', 'e10adc3949ba59abbe56e057f20f883e', 'å¤§ç¥ž', '0', 1),
('admin', '202cb962ac59075b964b07152d234b70', '1', '123', 1),
('摄政王', '202cb962ac59075b964b07152d234b70', '管理员', '123456', 0),
('大神', '202cb962ac59075b964b07152d234b70', '大神', '123456', 0),
('1', 'c4ca4238a0b923820dcc509a6f75849b', '1', '123456789', 0),
('2', 'c4ca4238a0b923820dcc509a6f75849b', '1', '2147483647', 0),
('唐本达', '202cb962ac59075b964b07152d234b70', '调试员', '123456789012345', 0);

-- --------------------------------------------------------

--
-- 表的结构 `apply_meeting_room`
--
-- 创建时间： 2014-04-24 04:48:40
--

CREATE TABLE IF NOT EXISTS `apply_meeting_room` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `leader` char(20) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `time` char(20) CHARACTER SET utf8 NOT NULL,
  `detail` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `apply_site`
--
-- 创建时间： 2014-05-05 12:04:02
--

CREATE TABLE IF NOT EXISTS `apply_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` char(100) CHARACTER SET utf8 NOT NULL,
  `leader` char(30) CHARACTER SET utf8 NOT NULL,
  `number` varchar(30) NOT NULL,
  `sum_member` int(10) NOT NULL,
  `sum` int(10) NOT NULL,
  `time_from` date NOT NULL,
  `time_to` date NOT NULL,
  `apply_time` datetime NOT NULL,
  `detail` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `blacklist`
--
-- 创建时间： 2014-04-24 04:48:40
--

CREATE TABLE IF NOT EXISTS `blacklist` (
  `name` char(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `blacklist`
--

INSERT INTO `blacklist` (`name`) VALUES
('asdfgdfhdfjfgf');

-- --------------------------------------------------------

--
-- 表的结构 `detail_of_csroom`
--
-- 创建时间： 2014-05-05 13:08:33
--

CREATE TABLE IF NOT EXISTS `detail_of_csroom` (
  `content` varchar(700) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='关于网站，通告，及管理员联络方式';

--
-- 转存表中的数据 `detail_of_csroom`
--

INSERT INTO `detail_of_csroom` (`content`, `phone`, `mail`) VALUES
('nano可以用Ctrl+w来搜索将 safe_mode = off safe_mode = 设置为 safe_mode = on safe_mode = /var/www/htdocs/ 以上 /var/www/htdocs/是您在上面设置个网站根目录，请按照情况修改，结尾的/是一定要', '123456789', '12345@123.com');

-- --------------------------------------------------------

--
-- 表的结构 `night`
--
-- 创建时间： 2014-04-24 04:48:40
--

CREATE TABLE IF NOT EXISTS `night` (
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `site` int(10) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(300) CHARACTER SET utf8 NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `site_distribution`
--
-- 创建时间： 2014-04-24 04:48:40
--

CREATE TABLE IF NOT EXISTS `site_distribution` (
  `site` int(15) NOT NULL,
  `activity` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `time_from` date NOT NULL,
  `time_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `team_member`
--
-- 创建时间： 2014-04-24 04:48:40
--

CREATE TABLE IF NOT EXISTS `team_member` (
  `id` int(50) NOT NULL,
  `member` varchar(200) CHARACTER SET utf8 NOT NULL,
  `have_site` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
