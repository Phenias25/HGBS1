-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2026 at 07:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hgbsltdc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `updates_id` bigint(20) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `view` int(11) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`updates_id`, `category`, `img`, `title`, `content`, `view`, `date`) VALUES
(1, 'AL', 'new_restuarant.jpg', 'Gupimwa indwara umunani, kugurisha umushongi no', '<p><a href=\"https://igihe.com/amakuru/article/u-bubiligi-twahinyuje-abashatse-gushyira-ibihato-mu-matora-andre-bucyana-avuga\" target=\"_blank\" style=\"color: rgb(51, 51, 51); background-color: rgba(0, 0, 0, 0.1);\">U Bubiligi: Twahinyuje abashatse gushyira ibihato mu matora - André Bucyana (Amafoto)</a><span style=\"color: rgb(51, 51, 51); background-color: rgba(0, 0, 0, 0.1);\">50&nbsp;0&nbsp;0</span></p><p><br></p>', 0, '2024-07-30 12:34:55'),
(2, 'AL', 'cole.jpeg', 'Breaking: Perezida Biden yaretse', '<p><span style=\"color: rgb(38, 38, 38);\">Mu gihe abanyarwanda bari kujya mu matora, Komisiyo y’Amatora (NEC) yashyize hanze urutonde rw’ibibujijwe kuri site y’itora ndetse no mu cyumba cy’itora.</span></p>', 0, '2024-07-21 21:18:41'),
(3, 'WY', 'istockphoto-1048890486-1024x1024.jpg', 'hhhas', '<p>gdhsjfkljhdgs</p>', 0, '2024-07-21 21:24:40'),
(4, 'WY', 'istockphoto-1076098272-1024x1024.jpg', 'dfdjk', '<p>sdfg</p>', 0, '2024-07-21 21:24:59'),
(5, 'AL', 'istockphoto-1426606749-1024x1024.jpg', 'dsfdgf', '<p>adsfg</p>', 0, '2024-07-21 21:25:28'),
(6, 'AL', 'istockphoto-1183335661-1024x1024.jpg', 'hkbk', '<p>ghkhjkjkj</p>', 0, '2024-07-21 21:27:39'),
(7, 'AL', 'j.jpg', 'hhh', '<p>jk</p>', 0, '2024-07-21 21:28:03'),
(8, 'WY', 'istockphoto-1458839549-1024x1024.jpg', 'jjj', '<p>hghbjnk</p>', 0, '2024-07-21 21:28:42'),
(9, 'AL', 'estevao.jpg', 'HHH', '<p>HHDSHD</p>', 0, '2024-07-24 11:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('admin123@gmail.com', 'e6e061838856bf47e1de730719fb2609');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`updates_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `updates_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
