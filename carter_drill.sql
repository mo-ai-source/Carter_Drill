-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 10:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carter_drill`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL,
  `question_id` varchar(225) NOT NULL,
  `answer_msg` varchar(225) NOT NULL,
  `ans_username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `question_id`, `answer_msg`, `ans_username`) VALUES
(2, '11', 'my third answer ', 'my_developing_journal'),
(3, '10', 'my second answer ', 'my_developing_journal'),
(4, '10', 'my second secoond time answer ', 'my_developing_journal');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `msg` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `username`, `msg`, `date`) VALUES
(9, '1', 'my_developing_journal', 'my first question\r\n', '24-04-2023'),
(10, '1', 'my_developing_journal', 'my second question', '24-04-2023'),
(11, '1', 'my_developing_journal', 'my third question', '24-04-2023');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'my_developing_journal', 'meezabfatima3@gmail.com', '123'),
(2, 'meezab', 'meezabdev3@gmail.com', '123'),
(3, 'ali', 'ali@gmail.com', '123'),
(4, 'ali zehre', 'ali123@gmail.com', '123'),
(5, 'fatima', 'fatima@gmail.com', '111');

-- --------------------------------------------------------

--
-- Table structure for table `user_workout`
--

CREATE TABLE `user_workout` (
  `reg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `workout_name` varchar(22) NOT NULL,
  `status` varchar(225) NOT NULL,
  `workoutid` int(11) NOT NULL,
  `progress` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_workout`
--

INSERT INTO `user_workout` (`reg_id`, `user_id`, `username`, `user_email`, `workout_name`, `status`, `workoutid`, `progress`) VALUES
(22, 1, 'my_developing_journal', 'meezabfatima3@gmail.com', 'Conditioning', 'complete', 1, 100),
(25, 1, 'my_developing_journal', 'meezabfatima3@gmail.com', 'Dunking', 'complete', 2, 100),
(27, 4, 'ali zehre', 'ali123@gmail.com', 'Conditioning', 'complete', 1, 100),
(28, 1, 'my_developing_journal', 'meezabfatima3@gmail.com', 'Shooting 1', 'complete', 4, 100),
(29, 5, 'fatima', 'fatima@gmail.com', 'Dunking', 'complete', 2, 100),
(30, 5, 'fatima', 'fatima@gmail.com', 'Shooting 1', 'complete', 4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `id` int(11) NOT NULL,
  `workout_name` varchar(225) NOT NULL,
  `moves` varchar(225) NOT NULL,
  `strength` varchar(225) NOT NULL,
  `rating` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`id`, `workout_name`, `moves`, `strength`, `rating`, `img`) VALUES
(1, 'Conditioning', 'Burn 600 Calories', '5 Different Strength Training', '4.9 rating', 'workout-1.jpg'),
(2, 'Dunking', '6+ vertical', '7 Different Plyometics Exercises', '4.8 rating\r\n', 'workout-2.jpg'),
(3, 'Handles', '10 different moves', '7 Different Dribbing Skills', '5 rating', 'workout-3.jpg'),
(4, 'Shooting 1', 'Shooting Form', '3 Basic Shooting Drills', '4.2 rating', 'workout-4.jpg'),
(5, 'Shooting 2', 'Catch and Shoot', '7 balance exercises', '4.4 rating', 'workout-5.jpg'),
(6, 'Shooting 3', 'Deep 3\'s', '5 Advance Shooting exercise', '5.0 rating', 'workout-6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_workout`
--
ALTER TABLE `user_workout`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_workout`
--
ALTER TABLE `user_workout`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
