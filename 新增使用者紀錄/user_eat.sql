-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-18 22:02:05
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `final_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `user_eat`
--

CREATE TABLE `user_eat` (
  `id` int(11) NOT NULL,
  `日期` date NOT NULL,
  `餐廳` varchar(20) CHARACTER SET utf8 NOT NULL,
  `品項` varchar(20) CHARACTER SET utf8 NOT NULL,
  `金額` int(11) NOT NULL,
  `熱量` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user_eat`
--

INSERT INTO `user_eat` (`id`, `日期`, `餐廳`, `品項`, `金額`, `熱量`) VALUES
(816016, '2021-05-18', '比司多_研三', '卡啦雞腿堡蛋套餐', 75, 1124),
(816054, '2021-05-18', '比司多_研三', '香雞排堡蛋套餐', 69, 845),
(816131, '2021-05-18', '四海遊龍', '韭菜水餃10顆', 60, 2060),
(816016, '2021-05-18', '李記小館', '脆皮燒肉飯', 80, 702),
(816061, '2021-05-18', '漢堡王', '奔牛肉堡', 120, 622),
(816016, '2021-05-18', '天晟燒臘', '蒜香鹹豬肉飯', 85, 706);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
