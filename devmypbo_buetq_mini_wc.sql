-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 08:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devmypbo_buetq_mini_wc`
--

-- --------------------------------------------------------

--
-- Table structure for table `fixture`
--

CREATE TABLE `fixture` (
  `sl` int(11) NOT NULL,
  `team1name` varchar(20) DEFAULT NULL,
  `team1goal` varchar(10) DEFAULT '-',
  `team2name` varchar(20) DEFAULT NULL,
  `team2goal` varchar(10) DEFAULT '-'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixture`
--

INSERT INTO `fixture` (`sl`, `team1name`, `team1goal`, `team2name`, `team2goal`) VALUES
(1, 'Brazil', '3', 'Argentina', '0'),
(2, 'Portugal', '0', 'France', '0'),
(3, 'France', '', 'Spain', ''),
(4, 'Germany', '', 'Argentina', '');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL,
  `player_name` varchar(25) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `goals` int(11) DEFAULT 0,
  `assists` int(11) DEFAULT 0,
  `clean_sheets` int(11) DEFAULT 0,
  `yellow_card` int(11) DEFAULT 0,
  `red_card` int(11) DEFAULT 0,
  `pos` int(5) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `player_name`, `team_id`, `goals`, `assists`, `clean_sheets`, `yellow_card`, `red_card`, `pos`) VALUES
(1, 'Tomal', 1, 2, 1, 0, 0, 0, 0),
(2, 'Fahim', 1, 0, 0, 0, 0, 0, 1),
(3, 'Shagor', 1, 0, 2, 0, 0, 0, 0),
(4, 'Sajed', 1, 1, 0, 0, 0, 0, 0),
(5, 'Nasir', 1, 0, 0, 0, 0, 0, 0),
(6, 'Ohi', 1, 0, 0, 0, 0, 0, 0),
(7, 'Mahmud', 1, 0, 0, 0, 0, 0, 0),
(8, 'Rahat', 1, 0, 0, 0, 0, 0, 0),
(9, 'Tanvir', 1, 0, 0, 0, 0, 0, 0),
(10, 'Shojib', 3, 0, 0, 0, 0, 0, 0),
(11, 'Taneem', 3, 0, 0, 0, 0, 0, 1),
(12, 'Sami', 3, 0, 0, 0, 0, 0, 0),
(13, 'Tahmid', 3, 0, 0, 0, 0, 0, 0),
(14, 'Shonjib', 3, 0, 0, 0, 0, 0, 0),
(15, 'Zubaer', 3, 0, 0, 0, 0, 0, 0),
(16, 'Pritom', 3, 0, 0, 0, 0, 0, 0),
(17, 'Sabbil', 3, 0, 0, 0, 0, 0, 0),
(18, 'Tamim', 3, 0, 0, 0, 0, 0, 0),
(19, 'Munna', 5, 0, 0, 0, 0, 0, 0),
(20, 'Jaber', 5, 0, 0, 0, 0, 0, 1),
(21, 'Sohan', 5, 0, 0, 0, 0, 0, 0),
(22, 'Ashraful', 5, 0, 0, 0, 0, 0, 0),
(23, 'Mahi', 5, 0, 0, 0, 0, 0, 0),
(24, 'Hamza', 5, 0, 0, 0, 0, 0, 0),
(25, 'Sakib', 5, 0, 0, 0, 0, 0, 0),
(26, 'Kowshik', 5, 0, 0, 0, 0, 0, 0),
(27, 'Jubayer', 5, 0, 0, 0, 0, 0, 0),
(28, 'Emon', 2, 0, 0, 0, 0, 0, 0),
(29, 'Fahim', 2, 0, 0, 0, 0, 0, 0),
(30, 'Mon', 2, 0, 0, 0, 0, 0, 0),
(31, 'Ananto', 2, 0, 0, 0, 0, 0, 1),
(32, 'Ifat', 2, 0, 0, 0, 0, 0, 0),
(33, 'Al-amin', 2, 0, 0, 0, 0, 0, 0),
(34, 'Azgor', 2, 0, 0, 0, 0, 0, 0),
(35, 'Rifat', 2, 0, 0, 0, 0, 0, 0),
(36, 'Akib', 2, 0, 0, 0, 0, 0, 0),
(37, 'Leon', 4, 0, 0, 0, 0, 0, 0),
(38, 'Hridoy', 4, 0, 0, 1, 0, 0, 1),
(39, 'Rubel', 4, 0, 0, 0, 0, 0, 0),
(40, 'Sunmoon', 4, 0, 0, 0, 0, 0, 0),
(41, 'Robin', 4, 0, 0, 0, 0, 0, 0),
(42, 'Maruf', 4, 0, 0, 0, 0, 0, 0),
(43, 'Ikram', 4, 0, 0, 0, 0, 0, 0),
(44, 'Anabil', 4, 0, 0, 0, 0, 0, 0),
(45, 'Mursalin', 4, 0, 0, 0, 0, 0, 0),
(46, 'Shimul', 6, 0, 0, 0, 0, 0, 0),
(47, 'Proshanto', 6, 0, 0, 0, 0, 0, 1),
(48, 'Sajel', 6, 0, 0, 0, 0, 0, 0),
(49, 'Faiyaz', 6, 0, 0, 0, 0, 0, 0),
(50, 'Rakib', 6, 0, 0, 0, 0, 0, 0),
(51, 'Rayhan', 6, 0, 0, 0, 0, 0, 0),
(52, 'Roman', 6, 0, 0, 0, 0, 0, 0),
(53, 'Fida', 6, 0, 0, 0, 0, 0, 0),
(54, 'Sowvik', 6, 0, 0, 0, 0, 0, 0),
(55, 'Shehab', 7, 0, 0, 1, 0, 0, 1),
(56, 'Nafis', 7, 0, 0, 0, 0, 0, 0),
(57, 'Xion', 7, 0, 0, 0, 0, 0, 0),
(58, 'Nabil', 7, 0, 0, 0, 0, 0, 0),
(59, 'Saeef', 7, 0, 0, 0, 0, 0, 0),
(60, 'Jobayer', 7, 0, 0, 0, 0, 0, 0),
(61, 'Atik', 7, 0, 0, 0, 0, 0, 0),
(62, 'Sakib', 7, 0, 0, 0, 0, 0, 0),
(63, 'Joy', 7, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `standings`
--

CREATE TABLE `standings` (
  `sl` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `played` int(11) DEFAULT 0,
  `won` int(11) DEFAULT 0,
  `lose` int(5) NOT NULL DEFAULT 0,
  `draw` int(11) DEFAULT 0,
  `ga` int(11) DEFAULT 0,
  `gf` int(11) DEFAULT 0,
  `gd` int(11) DEFAULT 0,
  `points` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standings`
--

INSERT INTO `standings` (`sl`, `team_id`, `played`, `won`, `lose`, `draw`, `ga`, `gf`, `gd`, `points`) VALUES
(1, 1, 1, 1, 0, 0, 0, 3, 3, 3),
(2, 2, 1, 0, 1, 0, 3, 0, -3, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 1, 0, 0, 1, 0, 0, 0, 1),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 7, 1, 0, 0, 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(20) DEFAULT NULL,
  `flag` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `flag`) VALUES
(1, 'Brazil', 'bra.png'),
(2, 'Argentina', 'arg.png'),
(3, 'Germany', 'ger.png'),
(4, 'Portugal', 'por.png'),
(5, 'France', 'fra.png'),
(6, 'Spain', 'spa.png'),
(7, 'Belgium', 'bel.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fixture`
--
ALTER TABLE `fixture`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `fk` (`team_id`);

--
-- Indexes for table `standings`
--
ALTER TABLE `standings`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `fk1` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fixture`
--
ALTER TABLE `fixture`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `standings`
--
ALTER TABLE `standings`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
