-- phpMyAdmin SQL Dump

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE IF NOT EXISTS `office` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `name`) VALUES
(1, 'Home Worker'),
(2, 'London'),
(3, 'Sheffield'),
(4, 'Liverpool'),
(5, 'Manchester');
