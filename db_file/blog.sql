-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 07:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(5000) NOT NULL,
  `created` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `created`, `description`, `attachment`, `user_id`, `category`) VALUES
(5, 'Demo', '14-12-2020 23:18:27 pm', 'Demo ', 'http://localhost/demoBlog/images/daa6dc5fde263e7f784c90145379f95b.jpg', 4, 'angular'),
(6, 'Just Trying things', '14-12-2020 23:23:08 pm', 'Demo ', 'http://localhost/demoBlog/images/a0754e1a2d20bfb97055fc229e2717fb.jpg', 4, 'vue'),
(7, 'Material Angular', '14-12-2020 23:31:34 pm', 'Built by the Angular team to integrate seamlessly with Angular. Internationalized and accessible components for everyone. Well tested to ensure performance and reliability. Straightforward APIs with consistent cross platform behaviour. Provide tools that help developers build their own custom components with common interaction patterns. Customizable within the bounds of the Material Design specification. ', 'http://localhost/demoBlog/images/1e512f3ade2dfa7826772fca8ac42f51.png', 5, 'angular');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `lastname`) VALUES
(1, 'sid@gmail.com', '$2y$10$Hi1BMVeFagExtpnwJfhckuHuRU0VDbNKlvMFrX5laTh4c7tcXQ49K', 'Siddhant', 'Gawai'),
(2, 'sid@gmail.co', '$2y$10$lp0aQjWoS2fHGAFj6Wa.iOjV6hqB3sSkJt4Y0BNsK8Y2ARq/.IE8e', 'Siddhant', 'Gawai'),
(3, 'sid@gmail.co.in', '$2y$10$6TDQw58nW3C2V9.F/gOGU.p58kuzP4ZvKLdyxL6PSBUA6Jl2stXM2', 'Siddhant', 'Gawai'),
(4, 'i.siddhant.gawai@gmail.com', '$2y$10$BltpSjKpJvxqDfyr9Azbe.6qyD2eUtReSvTKdee/PbrnJtVo1.m62', 'Siddhant', 'Gawai'),
(5, 'siddhantgawai007@gmail.com', '$2y$10$2s0stKZnnq6zF0/mqW4owe7d9kMnfA5mZtdPyAkx9meNXm8KFoTz2', 'John', 'Wick');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
