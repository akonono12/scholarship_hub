-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2019 at 07:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_scholar`
--

CREATE TABLE `post_scholar` (
  `scholar_id` int(15) NOT NULL,
  `agency_id` int(15) NOT NULL,
  `Quota_applicant` int(15) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `minGWA` decimal(10,2) NOT NULL,
  `maxGWA` decimal(10,2) NOT NULL,
  `desc_scholar` mediumtext NOT NULL,
  `Status` int(11) NOT NULL,
  `TimeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `docsreq` text NOT NULL,
  `Subject_type` varchar(255) NOT NULL,
  `applicant_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_scholar`
--

INSERT INTO `post_scholar` (`scholar_id`, `agency_id`, `Quota_applicant`, `deadline`, `minGWA`, `maxGWA`, `desc_scholar`, `Status`, `TimeCreated`, `docsreq`, `Subject_type`, `applicant_type`) VALUES
(1, 2, 23, '12/15/2018', '1.20', '1.60', 'sdsdsd', 3, '2019-02-26 06:35:04', '', '', 1),
(3, 2, 33, '09/21/2019', '0.00', '0.00', '', 0, '2019-02-26 06:30:58', '', '', 2),
(4, 0, 0, '09/21/2019', '0.00', '0.00', '', 0, '2019-02-26 06:09:51', '', '', 1),
(5, 0, 0, '09/21/2018', '0.00', '0.00', '', 3, '2019-02-26 06:35:04', '', '', 1),
(6, 0, 0, '09/21/2018', '0.00', '0.00', '', 3, '2019-02-26 06:35:04', '', '', 2),
(7, 0, 0, '09/21/2018', '0.00', '0.00', '', 3, '2019-02-26 06:35:04', '', '', 1),
(8, 0, 0, '09/21/2019', '0.00', '0.00', '', 0, '2019-02-26 06:28:50', '', '', 2),
(9, 0, 0, '05/14/2017', '0.00', '0.00', '', 3, '2019-02-26 06:29:07', '', '', 2),
(10, 2, 22, '2019-02-22', '1.20', '1.60', '<p>asdadasdasd</p>', 3, '2019-02-26 06:29:10', '', '', 1),
(11, 2, 23, '02/19/2019', '1.20', '2.30', '<p>Please enter the description of the scholarship</p>', 3, '2019-02-26 06:29:15', 'Birth certificate;Report Card;School ID ', 'Math ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_scholar`
--
ALTER TABLE `post_scholar`
  ADD PRIMARY KEY (`scholar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_scholar`
--
ALTER TABLE `post_scholar`
  MODIFY `scholar_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
