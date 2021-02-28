-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 02:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(5) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `book_code` int(10) NOT NULL,
  `book_price` varchar(50) NOT NULL,
  `book_isbn` varchar(25) NOT NULL,
  `author_name` varchar(62) NOT NULL,
  `book_edition` int(21) NOT NULL,
  `launch_year` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_code`, `book_price`, `book_isbn`, `author_name`, `book_edition`, `launch_year`) VALUES
(1, 'JAVA', 2198, '599', 'ISBN98765478', 'E Balagurusamy', 3, 2019),
(2, 'PHP Beginner', 2378, '629', 'ISBN98754895', 'Kamal Dev', 2, 2016),
(3, 'Histroy', 7645, '745', 'ISBN45785645', 'Mukul Singh', 1, 2002),
(4, 'Computer Network', 3241, '349', 'ISBN76655412', 'Alice M.', 7, 2009);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_course` varchar(50) NOT NULL,
  `member_phone` varchar(50) NOT NULL,
  `admis_year` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `password`, `member_name`, `member_course`, `member_phone`, `admis_year`) VALUES
(210001, 'admin', 'Sumit Singh', 'MBA', '9335719003', 2022),
(210002, 'raja1234', 'Aman Verma', 'MCA', '9899547845', 2017),
(210004, '1234', 'Pavan singh', 'mba', '6386928192', 2017);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
