-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2012 at 04:23 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tgiq`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `option_1` varchar(500) NOT NULL,
  `option_2` varchar(500) NOT NULL,
  `option_3` varchar(500) NOT NULL,
  `option_4` varchar(500) NOT NULL,
  `answer` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`) VALUES
(1, 'When was India''s National Anthem first sung?', 'April 11,1924', 'December 27, 1911', 'November 28, 1912', 'March 3, 1910', 2),
(2, 'Who is the founder of Forward Block formed in 1939?', 'Sarojini Naidu', 'Subhash Chandra Bose', 'Mahatma Gandhi', 'Sardar Vallabhai Patel', 2),
(3, 'Which was the summer capital of India during the British rule?', 'Shimla', 'Musoorie', 'Delhi', 'Ooty', 1),
(4, 'When was the Dandi March started?', 'March 8, 1930', 'March 22, 1930', 'March 12, 1930', 'March 4, 1990', 3),
(5, 'Who was the first Indian Woman president of Indian National Congress?', 'Lakshmi Sehgal', 'Pandita Ramabai', 'Asima Chatterjee', 'Sarojini Naidu', 4),
(6, 'Subhash Chandra Bose was referred to as the “Netaji” first by?', 'Sardar Vallabhbhai Patel', 'Bhagat Singh', 'M.K.Gandhi', 'Nehru', 3),
(7, 'Who started the Hindustan Socialist republican Association in 1928?', 'Rajguru', 'Chandrashekar Azad', 'Bhagat Singh', 'Sardar Vallabhai Patel', 2),
(8, 'Who said ”Swaraj is my birth right and I must have it”?', 'G.K.Gokhale', 'Acharya Kripalani', 'W.C.Banerjee', 'Bal Gangadhar Tilak', 4),
(9, 'Who was the founder of Indian National Congress?', 'A.O.Hume', 'Bal Gangadhar Tilak', 'Gokul Das', 'Mahatma Gandhi', 1),
(10, 'Who was the first Muslim president of Indian National Congress?', 'Muhammad Ali Jinnah', 'Badruddin Tyabjee', 'Maulana Mohammad Ali', 'Aga Khan', 2),
(11, 'What does the Saffron colour in our National Flag stand for?', 'Sacrifice', 'Purity', 'Honesty', 'Loyalty', 1),
(12, 'When did the First war of Independence start?', '1832', '1839', '1849', '1857', 4),
(13, 'When was Quit India Movement started?', '1946', '1944', '1942', '1939', 3),
(14, 'Jallianwala Bagh Massacre took place in which year?', '1912', '1918', '1919', '1923', 3),
(15, 'Indian Independence Act was passed on?', 'July 1, 1947', 'August 14, 1947', 'June 3, 1946', 'August 15, 1947', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
