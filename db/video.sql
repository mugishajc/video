-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2015 at 07:54 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `video`
--
CREATE DATABASE IF NOT EXISTS `video` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `video`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `img`) VALUES
(1, 'Chris', '123123', 'IMG_20150629_133042.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` text NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `username`, `email`, `date`, `video_id`) VALUES
(78, 'birakaze msza', 'fred', 'connect@gmail.com', 'September 19, 2013, 3:08 am', 11),
(77, 'personaly', 'fred', 'connect@gmail.com', 'September 18, 2013, 6:27 pm', 20),
(16, 'fredderf', 'free', 'free@yahoo.fr', 'September 5, 2013, 5:59 am', 26),
(17, 'fredfredre', 'fred', 'mucyofred@yahoo.fr', 'September 5, 2013, 6:03 am', 26),
(18, 'fun we are', 'fred', 'fred@gmail.com', 'September 5, 2013, 6:09 am', 26),
(19, 'resw', 'herse', 'herse@yahoo.fgr', 'September 6, 2013, 5:03 am', 26),
(20, 'fvd', 'fred', 'fred@dgg.com', 'September 6, 2013, 5:04 am', 26),
(21, 'fredfred', 'fredn', 'fredd@gamil.com', 'September 6, 2013, 5:14 am', 26),
(22, 'jhgfmn', 'ferdferd', 'ngirabakunzivedaste@yahoo.com', 'September 6, 2013, 5:16 am', 26),
(23, 'fred', 'fredn', 'filsuo@facebook.com', 'September 6, 2013, 5:21 am', 26),
(24, 'fred', 'fredn', 'filsuo@facebook.com', 'September 6, 2013, 5:22 am', 26),
(25, 'now to now', 'fred now', 'mucy@yah.con', 'September 6, 2013, 5:52 am', 0),
(26, 'niw', 'niw', 'niw@niw.c', 'September 6, 2013, 5:54 am', 26),
(27, 'hi this what we want ', 'felix', 'feluix@bout.com', 'September 6, 2013, 5:55 am', 23),
(28, 'fred', 'fred', 'mucyo@yahoo.fr', 'September 6, 2013, 5:56 am', 23),
(29, 'gogogz', 'fred mucyo', 'mucyo@fred', 'September 6, 2013, 6:00 am', 29),
(30, 'now', 'fred', 'mucyofred@yahoo.fr', 'September 7, 2013, 11:04 pm', 23),
(31, 'on now', 'fred', 'fred', 'September 8, 2013, 1:26 am', 32),
(32, 'hi this is cool song ', 'zondang', 'zond@gmail.com', 'September 8, 2013, 2:58 am', 25),
(33, 'wewewe!!!', 'fred', 'mucyofred@yahoo.fr', 'September 8, 2013, 3:13 am', 25),
(34, 'wewewe!!!', 'fred', 'mucyofred@yahoo.fr', 'September 8, 2013, 3:13 am', 25),
(35, 'ghu', 'trackq', 'gu@hy.com', 'September 8, 2013, 3:16 am', 32),
(36, 'ghu', 'trackq', 'gu@hy.com', 'September 8, 2013, 3:17 am', 32),
(37, 'ghu', 'trackq', 'gu@hy.com', 'September 8, 2013, 3:17 am', 32),
(38, 'lonio poinload boihth beo\nkoraby ghyki gredty mordrevred\ncyomoylogugre\ngweukoi hydo bolve bgoje\nniu VGT ghkomuri bavre dgre\nlooo !!!!!', 'COx', 'cox@hotmail.com', 'September 8, 2013, 3:49 am', 32),
(39, 'ni nziza 2', 'fred', 'mucyofred@yahoo.fr', 'September 10, 2013, 4:54 am', 22),
(40, 'fed', 'fred', 'mutanganaog@gmail.com', 'September 12, 2013, 3:11 pm', 26),
(41, 'fresh', 'fred', 'mucyofred@yahoo.fr', 'September 15, 2013, 6:31 pm', 26),
(42, 'wewwww', 'fred', 'mucyofred@yahoo.fr', 'September 15, 2013, 6:32 pm', 26),
(43, 'wewwww', 'fred', 'mucyofred@yahoo.fr', 'September 15, 2013, 6:32 pm', 26),
(44, 'wewwww', 'fred', 'mucyofred@yahoo.fr', 'September 15, 2013, 6:32 pm', 26),
(45, 'mu@mal', 'u', 'mu@gmail.com', 'September 15, 2013, 8:39 pm', 26),
(46, 'frd', 'x', 'fred@gmail.com', 'September 15, 2013, 8:41 pm', 26),
(47, 'deed', 'fred', 'frdderf@gmail.com', 'September 15, 2013, 8:43 pm', 26),
(48, 'ghjjuuj', 'abayo', 'ab@w.fr', 'September 16, 2013, 4:19 am', 50),
(49, 'yes', 'bwami', 'ukaze@gmail.com', 'September 17, 2013, 5:12 pm', 11),
(50, 'wowe', 'fred', 'connect@gmail.com', 'September 17, 2013, 5:29 pm', 8),
(51, 'fred', 'fred', 'connect@gmail.com', 'September 17, 2013, 5:48 pm', 8),
(52, 'gooooo', 'fred', 'connect@gmail.com', 'September 17, 2013, 5:53 pm', 8),
(53, 'mhbsh', 'fred', 'mutanganaog@gmail.com', 'September 17, 2013, 6:04 pm', 8),
(54, 'mhbsh', 'fred', 'mutanganaog@gmail.com', 'September 17, 2013, 6:04 pm', 8),
(55, 'mhbsh', 'fred', 'mutanganaog@gmail.com', 'September 17, 2013, 6:04 pm', 8),
(56, 'mhbsh', 'fred', 'mutanganaog@gmail.com', 'September 17, 2013, 6:04 pm', 8),
(57, 'mhbsh', 'fred', 'mutanganaog@gmail.com', 'September 17, 2013, 6:04 pm', 8),
(58, 'mhbsh', 'fred', 'mutanganaog@gmail.com', 'September 17, 2013, 6:04 pm', 8),
(59, 'mhbsh', 'fred', 'mutanganaog@gmail.com', 'September 17, 2013, 6:04 pm', 8),
(60, 'drf', 'fred', 'mutanganaog@gmail.com', 'September 17, 2013, 6:05 pm', 8),
(61, 'fuckin', 'fred', 'connect@gmail.com', 'September 17, 2013, 6:05 pm', 8),
(62, 'king ni uwambere kb', 'shane', 'mutangana@gmail.com', 'September 17, 2013, 8:55 pm', 14),
(63, 'kbs', 'shane', 'mutangana@gmail.com', 'September 17, 2013, 9:04 pm', 12),
(64, 'pl', 'shane', 'mutangana@gmail.com', 'September 17, 2013, 9:05 pm', 14),
(65, 'n', 'shane', 'mutangana@gmail.com', 'September 17, 2013, 9:11 pm', 12),
(66, 'kanyoko', 'shane', 'mutangana@gmail.com', 'September 17, 2013, 9:17 pm', 12),
(67, 'kanyoko', 'shane', 'mutangana@gmail.com', 'September 17, 2013, 9:17 pm', 12),
(68, 'kanyoko', 'shane', 'mutangana@gmail.com', 'September 17, 2013, 9:18 pm', 12),
(69, 'free', 'fred', 'connect@gmail.com', 'September 18, 2013, 4:36 am', 15),
(70, 'fresh', 'fred', 'connect@gmail.com', 'September 18, 2013, 5:49 am', 11),
(71, 'fresh', 'fred', 'connect@gmail.com', 'September 18, 2013, 5:49 am', 11),
(72, 'fresh', 'fred', 'connect@gmail.com', 'September 18, 2013, 5:49 am', 11),
(73, 'fresh', 'fred', 'connect@gmail.com', 'September 18, 2013, 5:49 am', 11),
(74, 'fresh', 'fred', 'connect@gmail.com', 'September 18, 2013, 5:49 am', 11),
(75, 'fresh', 'fred', 'connect@gmail.com', 'September 18, 2013, 5:49 am', 11),
(76, 'hi', 'ndagano', 'hirwa.felix@yahoo.fr', 'September 18, 2013, 5:50 am', 11),
(79, 'Gd', 'el kees', 'kjj@hh.com', 'June 11, 2014, 4:06 pm', 2),
(80, 'hi mn kul song', 'el kees', 'iyakees@yahoo.com', 'June 12, 2014, 2:06 pm', 1),
(81, 'jfew', 'fjew', 'fe@jfej.com', 'August 2, 2014, 7:43 pm', 0),
(82, 'Kul', 'Kees', 'iyakees@yahoo.com', 'August 5, 2014, 12:57 pm', 4),
(83, 'jhoibnyi', 'Kees', 'iyakees@yahoo.com', 'August 5, 2014, 3:19 pm', 4),
(84, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 10:33 pm', 2),
(85, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(86, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(87, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(88, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(89, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(90, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(91, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(92, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(93, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(94, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(95, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(96, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(97, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(98, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(99, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(100, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(101, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(102, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(103, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(104, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(105, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2),
(106, 'JIJ', 'Kees', 'iyakees@yahoo.com', 'August 7, 2014, 11:02 pm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rating` varchar(7) NOT NULL,
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating`, `id`, `ip`) VALUES
('like', 1, '127.0.0.1'),
('like', 2, '127.0.0.1'),
('like', 50, '127.0.0.1'),
('like', 26, '127.0.0.1'),
('dislike', 22, '127.0.0.1'),
('like', 8, '127.0.0.1'),
('dislike', 5, '127.0.0.1'),
('like', 6, '127.0.0.1'),
('like', 11, '127.0.0.1'),
('like', 12, '127.0.0.1'),
('like', 20, '192.168.1.4'),
('like', 30, '192.168.1.4'),
('like', 8, '192.168.10.35'),
('like', 11, '192.168.10.35'),
('like', 2, '::1'),
('like', 4, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userimg` varchar(255) NOT NULL,
  `block` varchar(25) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `email`, `sex`, `age`, `username`, `password`, `userimg`, `block`) VALUES
(1, 'bahati', 'philbert', 'fred@gmail.com', 'male', '2010', 'mutulu', '202cb962ac59075b964b07152d234b70', 'mutulu.jpg', ' '),
(2, 'cooo', 'freddd', 'connect@gmail.com', 'male', '2000', 'fred', '202cb962ac59075b964b07152d234b70', 'tsitsi.jpg', 'yes'),
(10, 'fred', 'save', 'benj@gmail.com', 'male', '2001', 'ben', '202cb962ac59075b964b07152d234b70', '', 'yes'),
(12, 'selena', 'gomez', 'gomez@gmail.com', 'female', '1989', 'log', '202cb962ac59075b964b07152d234b70', '', 'yes'),
(14, 'uwarurema', 'olivier', 'tympaaolivier@twitter.com', 'male', '2000', 'tympaa@', '86e6578064dce80d033a715ac7392fde', '', 'yes'),
(16, 'connect', 'miller', 'connect@gmail.com', 'male', '2010', 'connect', '202cb962ac59075b964b07152d234b70', '', ''),
(17, 'Michael', 'Crook', 'micealn@gnail.com', 'male', '1994', 'crook', '202cb962ac59075b964b07152d234b70', '', 'yes'),
(18, 'Asher', 'Tyler', 'asher17@gmai.com', 'male', '1994', 'tyler', 'a556264fe357192cee9b863bcb92d431', '', ' '),
(19, 'bobi', 'bona', 'mucy@gmail.com', 'male', '2009', 'fredd', '202cb962ac59075b964b07152d234b70', '', ''),
(20, 'ndagano', 'felix', 'felix@gmail.com', 'male', '1996', 'felix', '202cb962ac59075b964b07152d234b70', '', 'yes'),
(21, 'shane', 'regis', 'mutangana@gmail.com', 'male', '1990', 'shane', '202cb962ac59075b964b07152d234b70', '3535regiss.jpg', 'yes'),
(22, 'ndabaga', 'micheal', 'micheal@gmail.com', 'male', '1994', 'muc', '202cb962ac59075b964b07152d234b70', '', ''),
(23, 'raymondz', 'ray', 'shanecali87@gmail.com', 'male', '1994', 'booby trap', '202cb962ac59075b964b07152d234b70', '', ''),
(24, 'bobo', 'df', 'fred@gmail.com', 'male', '1994', 'boboa', '202cb962ac59075b964b07152d234b70', 'ee.jpg', ''),
(25, 'bwami', 'ukaze', 'ukaze@gmail.com', 'male', '1995', 'ukaze', '202cb962ac59075b964b07152d234b70', '', ''),
(26, 'hirwa', 'felix', 'hirwa.felix@yahoo.fr', 'male', '1993', 'ndagano', 'e10adc3949ba59abbe56e057f20f883e', 'Penguins.jpg', ''),
(27, 'mutangana', 'shane brown ', 'shaneregisog@gmail.com', 'male', '1994', 'shane brown regis', '81dc9bdb52d04dc20036dbd8313ed055', 'regiss5.jpg', ''),
(28, 'bwami', 'jean', 'jean@gmail.com', 'male', '1995', 'bwamia', '202cb962ac59075b964b07152d234b70', '', ''),
(29, 'kees', 'kiew', 'iyakees@yahoo.com', 'male', '1995', 'el kees', '6eea9b7ef19179a06954edd0f6c05ceb', '5555regiss4.jpg', ' '),
(30, 'kees', 'Iri', 'iyakees@yahoo.com', 'male', '2004', 'Kees', '02880b08e40f15c62df78a915192b1a1', 'back.PNG', ''),
(31, 'mpinganzima', 'justine', 'mpingag@gmail.com', 'female', '1997', 'jolie', 'b5381908b04f7e2469b75b2650491c3e', 'no1.jpg', ''),
(32, 'kes', 'ir', 'iya@yahoo.com', 'male', '2014', 'keess', '02880b08e40f15c62df78a915192b1a1', '', ''),
(33, 'Elixxx', 'elx', 'iyakees@yahoo.com', 'Female', '2014', 'khgjkdjf', '02880b08e40f15c62df78a915192b1a1', '', ''),
(34, 'Elixxx', 'elx', 'iyakees@yahoo.com', 'Male', '2014', 'felixvg', '02880b08e40f15c62df78a915192b1a1', '', 'yes'),
(35, 'krngkrt', 'mktrh', 'iya@ya.com', 'male', '2014', 'kkkk', '202cb962ac59075b964b07152d234b70', '', ''),
(36, 'Manzi', 'Issa', 'iya12@yahoo.com', 'male', '1999', 'Issa M', '202cb962ac59075b964b07152d234b70', '8384772610_07d68a07cc_o.jpg', ''),
(37, 'RE', 'EEE', 'ASSA@GMAIL.COM', 'male', '1915', 'KAKA', '68306b660396a37d5efa9c40a56c2810', '', ''),
(38, 'Lando', 'Fred', 'ioa@yahoo.com', 'male', '1991', 'Lando', '02880b08e40f15c62df78a915192b1a1', 'no1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumbs` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `block` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `name`, `url`, `thumbs`, `userid`, `views`, `block`) VALUES
(1, 'Body 2 Body (Director''s Cut) (Explicit).mp4', '9064.mp4', '9064.jpg', 29, 27, ''),
(2, 'Jason Derulo -  Wiggle  feat. Snoop Dogg (Official HD Music Video).wmv', '29908.flv', '29908.jpg', 29, 39, ''),
(3, 'Jason Derulo -  Wiggle  feat. Snoop Dogg (Official HD Music Video).wmv', '1289.flv', '1289.jpg', 30, 0, ''),
(4, 'Top 10 Goals    International Friendlies Before World Cup 2014 - HD.mp4', '4878.mp4', '4878.jpg', 30, 6, ''),
(5, '', '4399.flv', '4399.jpg', 30, 0, ''),
(6, '20140601_161709.mp4', '19436.mp4', '19436.jpg', 36, 2, ''),
(7, 'UPA Conference  part 1.mp4', '26585.mp4', '26585.jpg', 38, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
