-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 08:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms-4.2.1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(5) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `addedby` varchar(60) NOT NULL,
  `datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`, `addedby`, `datetime`) VALUES
(1, 'dummy1', '1234', 'dummy2', ''),
(2, 'dummy2', '3456', 'dummy1', '06-09-2022 15:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `datetime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'computational', 'john', '12/8/2022'),
(2, 'Science', 'Ken', '4-3-2021'),
(3, 'statistic', 'dummy', '01-09-2022'),
(4, 'fiction', 'dummy1', '01-09-2022'),
(5, 'animal', 'dummy1', '01-09-2022'),
(6, 'fruits', 'dummy1', '06-09-2022');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmnt_id` int(5) NOT NULL,
  `commentator` varchar(50) NOT NULL,
  `commentator_email` varchar(50) NOT NULL,
  `comment_content` varchar(500) NOT NULL,
  `comment_time` varchar(50) NOT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `status` varchar(5) NOT NULL,
  `post_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmnt_id`, `commentator`, `commentator_email`, `comment_content`, `comment_time`, `approved_by`, `status`, `post_id`) VALUES
(3, 'ruth', 'rs.expoit123@gmail.com', 'this post is helpful', '06-09-2022 14:37:02', NULL, 'OFF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(5) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `category_title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `post_description` varchar(200) NOT NULL,
  `post_img` varchar(50) DEFAULT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `category_title`, `author`, `post_description`, `post_img`, `datetime`) VALUES
(1, 'Atomic theorum', 'Science', 'dummy1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus, veniam debitis harum amet accusamus laborum veritatis nisi saepe nesciunt ', 'hello.jpg', '02-09-2022 12:01:58'),
(6, 'Mango', 'fruits', 'dummy1', 'great taste', 'mango.jpg', '06-09-2022 19:19:05'),
(7, 'Lion', 'animal', 'dummy1', 'king of the jungle', 'lion.jpeg', '06-09-2022 19:20:44'),
(8, 'tiger', 'animal', 'dummy1', 'the proud of sudarban', 'tiger.jpg', '06-09-2022 19:22:57'),
(9, 'particle', 'Science', 'dummy1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, velit?', 'particles.jpg', '07-09-2022 07:21:13'),
(10, 'fiction 1', 'fiction', 'dummy1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, culpa.\r\n', 'fic1.jpg', '07-09-2022 07:25:02'),
(11, 'fiction 2', 'fiction', 'dummy1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, culpa.\r\n', 'fic2.png', '07-09-2022 07:25:30'),
(12, 'fic 3', 'fiction', 'dummy1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, culpa.\r\n', 'fic3.png', '07-09-2022 07:25:50'),
(13, 'fic 4', 'fiction', 'dummy1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, culpa.\r\n', 'fic4.jpg', '07-09-2022 07:26:05'),
(14, 'fic 5', 'fiction', 'dummy1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, culpa.\r\n', 'fic5.jpg', '07-09-2022 07:26:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmnt_id`),
  ADD KEY `fg_post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmnt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fg_post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
