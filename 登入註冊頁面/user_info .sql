-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ‰∏ªÊ?Ôº?127.0.0.1
-- ?¢Á??ÇÈ?Ôº?2021-05-18 17:29:20
-- ‰º∫Ê??®Á??¨Ô? 10.4.19-MariaDB
-- PHP ?àÊú¨Ôº?8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Ë≥áÊ?Â∫´Ô? `registration`
--

-- --------------------------------------------------------

--
-- Ë≥áÊ?Ë°®Á?Êß?`user_info`
--

CREATE TABLE `user_info` (
  `Â∏≥Ë?` text NOT NULL,
  `ÂØÜÁ¢º` text NOT NULL,
  `?çÂ?` text NOT NULL,
  `Ë∫´È?` int(11) NOT NULL,
  `È´îÈ?` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ?æÂç∞Ë≥áÊ?Ë°®Á?Ë≥áÊ? `user_info`
--

INSERT INTO `user_info` (`Â∏≥Ë?`, `ÂØÜÁ¢º`, `?çÂ?`, `Ë∫´È?`, `È´îÈ?`) VALUES
('222', '92374622', '?é‰∫≠??, 162, 46),
('wp123', 'iamgenius', 'trista', 180, 40),
('0816016', '12345', 'tris', 165, 46),
('0816010', '111', 'dsada', 165, -1),
('77777re', '92374622', '?é‰∫≠??, 345, 23),
('1217', '92374622', 'Â∞èÈÉ≠', 165, 40);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
