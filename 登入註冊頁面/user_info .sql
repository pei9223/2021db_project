-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主�?�?127.0.0.1
-- ?��??��?�?2021-05-18 17:29:20
-- 伺�??��??��? 10.4.19-MariaDB
-- PHP ?�本�?8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資�?庫�? `registration`
--

-- --------------------------------------------------------

--
-- 資�?表�?�?`user_info`
--

CREATE TABLE `user_info` (
  `帳�?` text NOT NULL,
  `密碼` text NOT NULL,
  `?��?` text NOT NULL,
  `身�?` int(11) NOT NULL,
  `體�?` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ?�印資�?表�?資�? `user_info`
--

INSERT INTO `user_info` (`帳�?`, `密碼`, `?��?`, `身�?`, `體�?`) VALUES
('222', '92374622', '?�亭??, 162, 46),
('wp123', 'iamgenius', 'trista', 180, 40),
('0816016', '12345', 'tris', 165, 46),
('0816010', '111', 'dsada', 165, -1),
('77777re', '92374622', '?�亭??, 345, 23),
('1217', '92374622', '小郭', 165, 40);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
