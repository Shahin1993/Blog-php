-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2017 at 07:52 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Computer'),
(9, 'Destop'),
(10, 'Mobile'),
(11, 'Laptop'),
(13, 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_url` varchar(255) NOT NULL,
  `c_message` text NOT NULL,
  `c_date` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`c_id`, `c_name`, `c_email`, `c_url`, `c_message`, `c_date`, `p_id`, `active`) VALUES
(1, 'shahin', 'shain.chf@gmail.com', '', 'fgfgf', '2017-02-01', 5, 1),
(2, 'jamal', 'jaml@gmail.com', '', 'this is a nice', '2017-02-01', 5, 1),
(3, 'jamal', 'jaml@gmail.com', '', 'this is a nice', '2017-02-01', 5, 1),
(4, 'akas', 'akas@gmail.com', '', 'very good', '2017-02-01', 4, 1),
(5, 'akas', 'akas@gmail.com', '', 'very good', '2017-02-01', 4, 1),
(6, 'akas', 'akas@gmail.com', '', 'very good', '2017-02-01', 4, 1),
(7, 'akas', 'akas@gmail.com', '', 'very good', '2017-02-01', 4, 1),
(8, 'akas', 'akas@gmail.com', '', 'very good', '2017-02-01', 4, 1),
(9, 'durjoy', 'shahin.chf@gmail.com', '', 'this is the best page', '2017-02-02', 5, 1),
(10, 'durjoy', 'shahin.chf@gmail.com', '', 'this is the best page', '2017-02-02', 5, 1),
(11, 'ssss', 'shain.chf@gmail.com', '', 'how ', '2017-02-02', 5, 1),
(12, 'ssss', 'shain.chf@gmail.com', '', 'how ', '2017-02-02', 5, 1),
(13, 'ssss', 'shain.chf@gmail.com', '', 'how ', '2017-02-02', 5, 0),
(14, 'ssss', 'shain.chf@gmail.com', '', 'how ', '2017-02-02', 5, 0),
(15, 'ssss', 'shain.chf@gmail.com', '', 'how ', '2017-02-02', 5, 0),
(16, 'ssss', 'shain.chf@gmail.com', '', 'how ', '2017-02-02', 5, 1),
(17, 'ssss', 'shain.chf@gmail.com', '', 'how ', '2017-02-02', 5, 1),
(18, 'ssss', 'shain.chf@gmail.com', '', 'how ', '2017-02-02', 5, 1),
(19, 'nazmul', 'shahin@gmail.com', 'www.fb.com', 'good and very godd for every person that ', '2017-02-03', 8, 1),
(20, 'nazmul', 'shahin@gmail.com', 'www.fb.com', 'good and very godd for every person that ', '2017-02-03', 8, 0),
(21, 'shahin', 'shain.chf@gmail.com', '', 'very good', '2017-02-07', 9, 1),
(22, 'vvv', 'akas@gmail.com', '', 'very good for post with', '2017-03-02', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ft_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `ft_description`) VALUES
(1, 'copy right &copy shahin watch video');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tag_id` varchar(255) NOT NULL,
  `p_date` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `p_time` int(255) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`p_id`, `p_title`, `p_description`, `p_image`, `cat_id`, `tag_id`, `p_date`, `year`, `month`, `p_time`) VALUES
(2, 'seven post', '<p>sss admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country</p>', '2.png', 9, '5,3', '2017-01-22', '2017', '01', 1485043200),
(3, 'Post six', '<p>sss admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country</p>', '3.png', 9, '5,3', '2017-01-22', '2017', '01', 1485043200),
(4, 'four post', '<p>Xsds admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country</p>', '4.jpg', 1, '5,3', '2017-01-22', '2017', '01', 1485043200),
(5, 'THIRD POST', '<p>Xsds admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country</p>', '5.jpg', 1, '5,3,2', '2017-01-22', '2017', '01', 1485043200),
(6, 'Compiter is the ', '<p>cvnvc admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country admin Bangladesh is the biggest country</p>', '6.jpg', 1, '5,3,8', '2017-01-22', '2017', '01', 1485043200),
(7, 'Bangladeshh 1', '<p>admin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest countryadmin Bangladesh is the biggest country</p>', '7.jpg', 13, '5,3', '2017-01-26', '2017', '01', 1485388800),
(8, 'This is the last post', '<p>This is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last postThis is the last post</p>', '8.jpg', 10, '5', '2017-02-01', '2017', '02', 1485907200),
(9, 'Noitikota adorsor ', '<ul><li><em>Amra aj amader gurujonder ke recpect korte jaina, Ekta somoy chilo jokhon manus guru jonder k sobchay besi somman korto r aj amra ta manina bollei chole ki hobe amader a sikkha diye age to boroder recpect korte sikkhte hobe , recpect amon ekta jinis jeta chailei keo jor kore nite pare na manus jodi tar nij theke recpect na kore tobe kokhonoi ta joe kore neoa jay na , recpect kora sikte hobe eta manuser sobche boro jinis je recpect koete jane se recpect pete o pare valo basa jemon sobai pay na temoni sobar proti hridoyer tan o jage na hridoy na buje kacher deoya agat</em></li><li><em>manus sob kisu soite pare but kacer manusre deyoa agat soite pare na a agat bro nistho agat a jeno chaileo mana jay na </em></li><li><em>kicu manus nijer ojantei nijer hoye jay kew bolte pare na kemon kore se hoye jay onner hariye jay onner maje nije ke r khuje pay na tribobne manus manus k valobase abar valobese abar protarona o kore to amar thred diey ajob prithibi ajob manus kake bolbr j tomi valo manus sombob noy </em></li></ul>', '9.jpg', 10, '3', '2017-02-04', '2017', '02', 1486166400);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`tag_id`, `tag_name`) VALUES
(2, 'January'),
(3, 'Fabruary'),
(5, 'April'),
(8, 'Jun');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
