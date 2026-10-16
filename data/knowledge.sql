-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2014-12-31 17:22:37
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `0911`
--

-- --------------------------------------------------------

--
-- 表的结构 `knowledge`
--

CREATE TABLE `knowledge` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `mean` varchar(1000) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- 转存表中的数据 `knowledge`
--

INSERT INTO `knowledge` (`id`, `name`, `mean`) VALUES
(1, '芽茶', '以芽为制造原料称为芽茶，如，龙井茶。'),
(2, '叶茶', '以叶为制造原料称为“叶茶”，如，碧螺春茶。'),
(3, '嫩芽', '生产上通常所说的茶芽（或嫩梢），系指新梢上适合制茶的鲜叶。'),
(4, '驻芽', '又称休止芽，是顶芽变成叶片，新芽停止生长转入休眠状态，其形状十分瘦小者'),
(5, '摊叶', '即夹叶，系指与驻芽连接的两片叶，其节间甚短，着生叶片形如对生。'),
(6, '晾青', '即摊晾，是将采摘的茶鲜叶均匀摊放的作业，可散热、失水、挥发青草气，促进成分转化，让叶片变软便于杀青。'),
(7, '萎凋（也称走水）', '鲜叶经水分蒸发、叶片软化，增强酶活性促使内含物转化，形成茶叶品质，常见于白茶、红茶、乌龙茶。'),
(8, '发酵', '是一种单纯的氧化作用，就是将茶青放在空气即可。发酵一般有先发酵（不发酵、部分发酵、全发酵）和后发酵。'),
(9, '渥堆', '不用先氧化，而是等到杀青后揉捻再堆放，被称为后发酵。'),
(10, '杀青', '用高温杀死叶细胞而不再发酵，分为炒青、烘青、蒸青和晒青。'),
(11, '炒青', '用高温铁锅炒制，如，龙井、碧螺春、雨花茶等。'),
(12, '烘青', '用烘笼或烘干机直接高温烘焙，如，黄山毛峰、太平猴魁、高桥银峰等。'),
(13, '蒸青', '采用蒸汽杀青工艺制作，如，煎茶、玉露、抹茶等。'),
(14, '晒青', '靠太阳晒干或先晒后烘，先晒后炒干，如，滇青、川青、陕青等。'),
(15, '揉捻', '茶青成熟后外干内潮需通过揉捻将内部的茶汁揉出来，使叶细胞能在浸泡过程中充分溶解。'),
(16, '干燥', '把制造完毕地后的杀青蒸发去水分。'),
(17, '覆火', '茶叶的再次被干燥。'),
(18, '紧压', '把生产出的茶经过蒸软加压成块状的过程。');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knowledge`
--
ALTER TABLE `knowledge`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `knowledge`
--
ALTER TABLE `knowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
