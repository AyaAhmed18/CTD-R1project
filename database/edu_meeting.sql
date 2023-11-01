-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 02:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu_meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'HR section'),
(2, 'Academic'),
(4, 'marketing'),
(5, 'ICT'),
(6, 'Logistic');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `date`, `title`, `content`, `location`, `price`, `active`, `image`, `cat_id`) VALUES
(9, '2023-10-17', 'Media', 'Contents', 'Cairo', 22, 1, '5549ce358c09ac29519cf1623cdafd67.jpeg', 4),
(10, '2023-10-23', 'Frontend', 'HTML CSS JS', 'Giza', 27, 1, '2f9865fe26514fa15b60ec6b859e4551.jpeg', 2),
(11, '2023-11-11', 'HR training', 'Contents', 'Cairo', 25, 1, '8a336db0f8b92c5df624f4500b6e6f79.jpeg', 1),
(12, '2023-12-29', 'sales', 'marketing', 'Sohag', 13, 1, '9e61c243af98a3bffae474b88ff4ca3f.jpeg', 5),
(13, '2023-11-15', 'Backend', 'PHP basics', 'Qena', 31, 1, 'e029f1aaed17272da66d425bc600bfa0.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `regDate` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `regDate`, `name`, `username`, `email`, `active`, `password`) VALUES
(1, '2023-10-10', 'Aya Ahmed', 'AYA43', 'aya@gmail.com', 1, '$2y$10$QSRM3QSJn9eXu.ZvbDRTveKlZm.C98tB/5eyj03Q.hET6tVeJjfga'),
(2, '2023-10-10', 'Aya Gamal', 'root', 'aya78@gmail.com', 0, '$2y$10$PS7rmmupeYrrOeRA0KotzOte6FSP4WyD.vetkWDUQf5vYPyo8cZtm'),
(7, '2023-10-11', 'asmaa', 'asmaa23', 'asma@gmail.com', 1, '$2y$10$ccBSWlW1qxvrzDDFG0Gx/uOsyTcc56dJ9uU7DhuuMBT'),
(8, '2023-10-11', 'eslam', 'es23', 'eslam@gmail.com', 0, '$2y$10$idWSnsqzS4GjvpVS0mE/TeUjirrDLGco3tWR2FcTWFV'),
(9, '2023-10-11', 'osama', 'os23', 'osama@gmail.com', 1, '$2y$10$DKEejYc7wKOns8z.sSWWY./EQqM7l4oDrXES/zx705lzwCAJfleli'),
(10, '2023-10-11', 'salma', 's23', 's@yahoo.com', 0, '$2y$10$.ZwiHxpyFqvBWnEeMh0l2uVEzlcN3KaZxSBlwX3RrAobxN3KOlPmy'),
(11, '2023-10-12', 'nada', 'n2', 'n@gmail.com', 1, '$2y$10$.RhFW1KHXDqWTW4KRXTcpuoUJ4tPlF1WleAeSg2Q9R3NAcUbcq3n2'),
(23, '2023-10-19', 'Ahmed', 'as3', 'ahmed@gmail.com', 1, '$2y$10$M9//.ulllfzfBaMBtLnrSOQkciSZNZWLUcjL40oJWkMS9hdhJH7qS'),
(24, '2023-10-19', 'Eman Ali', 'em1', 'eman@mail.com', 1, '$2y$10$/nrbaXDzUVCvWzwvHyLkk.bG8Ymd6mNPgbN35gE5pxNRsurCXHzIq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
