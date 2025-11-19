-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2024 at 04:40 PM
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
-- Database: `master_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback_msg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `name`, `email`, `feedback_msg`) VALUES
(1, 2, 'alice', 'alicethompson@gmail.com', 'Chat not working'),
(2, 2, 'alice', 'alicethompson@gmail.com', 'test'),
(3, 2, 'alice', 'alicethompson@gmail.com', 'test'),
(4, 2, 'alice', 'alicethompson@gmail.com', 'test'),
(5, 2, 'alice', 'alicethompson@gmail.com', 'test'),
(6, 1, 'James', 'jamescameroon@gmail.com', 'test123'),
(7, 1, 'James', 'jamescameroon@gmail.com', 'testing in progress'),
(8, 4, 'Janet', 'janetpearson@gmail.com', 'improve'),
(9, 4, 'Janet', 'janetpearson@gmail.com', 'Excellent'),
(10, 3, 'Peter', 'peterpan@gmail.com', 'Fine'),
(11, 3, 'Peter', 'peterpan@gmail.com', 'New update required'),
(12, 5, 'Andrew', 'andrewthompson@gmail.com', 'Efficient'),
(13, 5, 'Andrew', 'andrewthompson@gmail.com', 'Chat'),
(14, 3, 'Peter', 'peterpan@gmail.com', 'Testing'),
(15, 3, 'Peter', 'peterpan@gmail.com', 'Testing again'),
(16, 2, 'alice', 'alicethompson@gmail.com', 'fsvdfv');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `tile_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gameboard`
--

CREATE TABLE `gameboard` (
  `id` int(11) NOT NULL,
  `tile_id` varchar(30) NOT NULL,
  `icon_class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gameboard`
--

INSERT INTO `gameboard` (`id`, `tile_id`, `icon_class_name`) VALUES
(1, '0-0', 'fas fa-hamburger'),
(2, '0-1', 'fas fa-music'),
(3, '0-2', 'fas fa-coffee'),
(4, '0-3', 'fas fa-campground'),
(5, '0-4', 'fas fa-futbol'),
(6, '0-5', 'fas fa-music'),
(7, '0-6', 'fas fa-coffee'),
(8, '1-0', 'fas fa-music'),
(9, '1-1', 'fas fa-coffee'),
(10, '1-2', 'fas fa-hamburger'),
(11, '1-3', 'fas fa-campground'),
(12, '1-4', 'fas fa-futbol'),
(13, '1-5', 'fas fa-music'),
(14, '1-6', 'fas fa-hamburger'),
(15, '2-0', 'fas fa-campground'),
(16, '2-1', 'fas fa-coffee'),
(17, '2-2', 'fas fa-hamburger'),
(18, '2-3', 'fas fa-campground'),
(19, '2-4', 'fas fa-futbol'),
(20, '2-5', 'fas fa-music'),
(21, '2-6', 'fas fa-coffee'),
(22, '3-0', 'fas fa-coffee'),
(23, '3-1', 'fas fa-campground'),
(24, '3-2', 'fas fa-music'),
(25, '3-3', 'fas fa-futbol'),
(26, '3-4', 'fas fa-hamburger'),
(27, '3-5', 'fas fa-coffee'),
(28, '3-6', 'fas fa-music'),
(29, '4-0', 'fas fa-music'),
(30, '4-1', 'fas fa-coffee'),
(31, '4-2', 'fas fa-campground'),
(32, '4-3', 'fas fa-futbol'),
(33, '4-4', 'fas fa-hamburger'),
(34, '4-5', 'fas fa-coffee'),
(35, '4-6', 'fas fa-futbol'),
(36, '5-0', 'fas fa-futbol'),
(37, '5-1', 'fas fa-campground'),
(38, '5-2', 'fas fa-coffee'),
(39, '5-3', 'fas fa-music'),
(40, '5-4', 'fas fa-hamburger'),
(41, '5-5', 'fas fa-music'),
(42, '5-6', 'fas fa-futbol');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `message`, `timestamp`) VALUES
(1, 1, 'Helloo', '2024-06-21 17:36:06'),
(2, 2, 'helloo', '2024-06-21 17:39:49'),
(3, 5, 'Helloo\r\n', '2024-06-21 19:41:25'),
(4, 4, 'hii', '2024-06-21 19:42:51'),
(5, 3, 'hey\r\n', '2024-06-21 19:43:15'),
(6, 1, 'whatssup', '2024-07-17 10:23:27'),
(7, 1, 'helloo', '2024-07-17 10:23:39'),
(8, 1, 'I won', '2024-07-17 10:23:49'),
(9, 2, 'hello\r\n', '2024-07-17 10:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `score` int(11) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_picture`, `status`, `score`, `user`) VALUES
(1, 'James', 'Cameroon', 'jamescameroon@gmail.com', 'pass1', 'pass1', 'images/25.jpg', 'online', 0, 'student'),
(2, 'Alice', 'Thompson', 'alicethompson@gmail.com', 'pass2', 'pass2', 'images/user-profile1.jpg', 'online', 15, 'student'),
(3, 'Peter', 'Pan', 'peterpan@gmail.com', 'pass3', 'pass3', 'images/226.png', 'online', 0, 'student'),
(4, 'Janet', 'Pearson', 'janetpearson@gmail.com', 'pass4', 'pass4', 'images/9038.jpg', 'online', 10, 'student'),
(5, 'Andrew', 'Thompson', 'andrewthompson@gmail.com', 'pass5', 'pass5', 'images/8133.jpg', 'online', 25, 'student'),
(6, 'Ron', 'Weasley', 'ronweasley@gmail.com', 'pass6', 'pass6', 'images/default-profile-picture.jpg', 'offline', 0, 'admin'),
(8, 'Harry', 'Potter', 'harrypotter@gmail.com', 'pass7', 'pass7', 'images/default-profile-picture.jpg', 'offline', 0, 'staff'),
(9, 'Hermione', 'Granger', 'hermioniegranger@gmail.com', 'pass8', 'pass8', 'images/default-profile-picture.jpg', 'null', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`tile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gameboard`
--
ALTER TABLE `gameboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tile_id` (`tile_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gameboard`
--
ALTER TABLE `gameboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profile` (`user_id`);

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profile` (`user_id`);

--
-- Constraints for table `gameboard`
--
ALTER TABLE `gameboard`
  ADD CONSTRAINT `gameboard_ibfk_1` FOREIGN KEY (`tile_id`) REFERENCES `game` (`tile_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profile` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
