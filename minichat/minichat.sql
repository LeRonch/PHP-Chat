-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 12, 2021 at 03:17 PM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minichat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_msgs`
--

CREATE TABLE `chat_msgs` (
  `msg_id` int(11) NOT NULL,
  `msg_userId` int(11) NOT NULL,
  `msg_time` datetime NOT NULL DEFAULT current_timestamp(),
  `msg_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_msgs`
--

INSERT INTO `chat_msgs` (`msg_id`, `msg_userId`, `msg_time`, `msg_text`) VALUES
(17, 7, '2021-03-09 10:37:14', 'bonjour'),
(23, 2, '2021-03-09 10:55:30', 'beusile'),
(24, 2, '2021-03-09 10:55:51', 'maxime'),
(31, 8, '2021-03-09 12:46:46', 'Salut a tous'),
(32, 8, '2021-03-09 13:05:44', 'J\'aimes les chicons <3'),
(40, 1, '2021-03-10 08:28:59', 'blabla'),
(41, 1, '2021-03-10 09:28:57', 'bonjour bonjour'),
(70, 7, '2021-03-10 11:17:33', 'Je suis une salade'),
(71, 7, '2021-03-10 11:26:23', 'salut'),
(74, 2, '2021-03-10 11:29:30', 're'),
(75, 9, '2021-03-10 12:22:23', 'Salut à tous'),
(85, 9, '2021-03-10 13:56:52', 'j\'aimes pas les pates'),
(86, 1, '2021-03-10 14:08:15', 'ça marche, INCROYABLE !'),
(98, 8, '2021-03-10 15:40:56', 'Would you look at you ? WORTHLESS UGLY FREAKS !'),
(126, 1, '2021-03-11 14:51:45', 'final test actu enter'),
(320, 2, '2021-03-12 11:10:05', 'y\'a tout qui marche, omg omg'),
(321, 1, '2021-03-12 11:24:31', 'bonjour'),
(325, 14, '2021-03-12 14:58:26', 'bonjour bonjour');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_pseudo` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `IP` varchar(25) NOT NULL,
  `user_color` varchar(10) NOT NULL,
  `statut` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_pseudo`, `user_password`, `IP`, `user_color`, `statut`) VALUES
(1, 'LeRonch', 'azerty', '172.16.238.1', '#BD8B9C', 'admin'),
(2, 'Romainz', 'chatelet', '172.16.238.1', '#87F1FF', 'user'),
(7, 'Patata', 'salade', '172.16.238.1', '#F7B801', 'user'),
(8, 'Juju', 'martinou', '172.16.238.1 ', '#F35B04', 'user'),
(9, 'Beusile', 'leboss', '172.16.238.1 ', '#119822', 'user'),
(10, 'Jean-Jean', 'couleur', '172.16.238.1 ', '#bae0f4', 'user'),
(14, 'Tootoos', 'elea', '172.16.238.1 ', '#ff8ca7', 'user'),
(15, 'Basou', 'koch', '172.16.238.1 ', '#eda1ba', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_msgs`
--
ALTER TABLE `chat_msgs`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `msg_userId` (`msg_userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_msgs`
--
ALTER TABLE `chat_msgs`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_msgs`
--
ALTER TABLE `chat_msgs`
  ADD CONSTRAINT `chat_msgs_ibfk_1` FOREIGN KEY (`msg_userId`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
