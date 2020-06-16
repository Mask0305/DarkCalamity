-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2019 年 05 月 10 日 09:58
-- 伺服器版本： 8.0.16
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `darkcalamity`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `num` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`num`, `name`, `type`) VALUES
('111001', '稍舊的斧頭(斧)', '裝備'),
('111002', '村長的頭盔(鎧)', '裝備'),
('111003', '村長的胸甲(鎧)', '裝備'),
('111004', '村長的手甲(鎧)', '裝備'),
('111005', '村長的褲甲(鎧)', '裝備'),
('111006', '村長的鞋甲(鎧)', '裝備'),
('112001', '稍舊的長劍(劍)', '裝備'),
('112002', '村長的頭甲(鎖)', '裝備'),
('112003', '村長的鎖甲(鎖)', '裝備'),
('112004', '村長的臂甲(鎖)', '裝備'),
('112005', '村長的腿甲(鎖)', '裝備'),
('112006', '村長的脛甲(鎖)', '裝備'),
('113001', '稍舊的短弓(弓)', '裝備'),
('113002', '村長的皮帽(皮)', '裝備'),
('113003', '村長的皮甲(皮)', '裝備'),
('113004', '村長的手套(皮)', '裝備'),
('113005', '村長的褲子(皮)', '裝備'),
('113006', '村長的鞋子(皮)', '裝備'),
('210001', '迪雷德爾草', '消耗'),
('310001', '史萊姆殘渣', '雜物'),
('310002', '史萊珠', '雜物'),
('310003', '破舊布', '雜物');

-- --------------------------------------------------------

--
-- 資料表結構 `chapter`
--

CREATE TABLE `chapter` (
  `ch` int(2) NOT NULL,
  `ch_num` varchar(10) NOT NULL,
  `ch_extent` varchar(10) NOT NULL,
  `emeny_health` int(10) NOT NULL,
  `emeny_att` int(4) NOT NULL,
  `emeny_def` int(4) NOT NULL,
  `emeny_hit` int(3) NOT NULL,
  `emeny_dodge` int(3) NOT NULL,
  `emeny_fatal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `chapter`
--

INSERT INTO `chapter` (`ch`, `ch_num`, `ch_extent`, `emeny_health`, `emeny_att`, `emeny_def`, `emeny_hit`, `emeny_dodge`, `emeny_fatal`) VALUES
(1, '1-0', '1', 25, 10, 5, 3, 5, 5),
(1, '1-1', '1', 50, 14, 7, 3, 5, 5),
(1, '1-2', '1', 75, 16, 9, 3, 5, 3),
(1, '1-3', '1', 100, 18, 11, 3, 5, 3),
(1, '1-4', '1', 150, 25, 15, 10, 8, 5),
(1, '1-5', '1', 175, 20, 13, 3, 5, 3),
(1, '1-6', '1', 200, 22, 15, 3, 5, 3),
(1, '1-7', '1', 225, 24, 17, 3, 5, 3),
(1, '1-8', '1', 250, 26, 19, 3, 5, 3),
(1, '1-9', '2', 300, 32, 25, 10, 8, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `characters`
--

CREATE TABLE `characters` (
  `Id` int(10) NOT NULL,
  `job` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `race` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `physique` int(3) DEFAULT NULL,
  `power` int(3) DEFAULT NULL,
  `wisdom` int(3) DEFAULT NULL,
  `agile` int(3) DEFAULT NULL,
  `lucky` int(3) DEFAULT NULL,
  `unicode` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `characters`
--

INSERT INTO `characters` (`Id`, `job`, `race`, `physique`, `power`, `wisdom`, `agile`, `lucky`, `unicode`) VALUES
(19, 'knight', '獸人', 30, 10, 10, 8, 6, 'fea4abbfe2d1c0c1c51268b4ccfc09c30295f0da');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `Id` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(8) NOT NULL,
  `account` varchar(16) NOT NULL,
  `password` varchar(40) NOT NULL,
  `unicode` varchar(40) NOT NULL,
  `active` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`Id`, `email`, `name`, `account`, `password`, `unicode`, `active`) VALUES
(19, 'a10070305@gmail.com', 'Mask', 'a10070305', '5f2d8a3eac0e63b6a8812d312804a82f', 'fea4abbfe2d1c0c1c51268b4ccfc09c30295f0da', 'ok');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`num`);

--
-- 資料表索引 `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`ch_num`);

--
-- 資料表索引 `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 已傾印資料表的限制(constraint)
--

--
-- 資料表的限制(constraint) `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `darkcalamity.user.Id` FOREIGN KEY (`Id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
