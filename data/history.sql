-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2025-04-12 09:41:01
-- 服务器版本： 8.0.39
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `2025-5-7`
--

-- --------------------------------------------------------

--
-- 表的结构 `history`
--

CREATE TABLE `history` (
  `id` int NOT NULL,
  `date` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_croatian_ci NOT NULL,
  `information` varchar(800) CHARACTER SET utf8mb3 COLLATE utf8mb3_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_croatian_ci;

--
-- 转存表中的数据 `history`
--

INSERT INTO `history` (`id`, `date`, `information`) VALUES
(1, '原始时期', '据传说，早在公元前2700多年前的神农氏时代，就有“神农尝百草，日遇七十二毒，得荼而解之”的记载，这里的“荼”就是茶。当时人们只是将茶叶鲜叶嚼食或煮成汤汁饮用，这是最原始的利用方式。'),
(2, '先秦时期', '巴蜀地区是中国最早的产茶地之一，茶叶已作为贡品。此时人们对茶叶的利用方式逐渐从食用向饮用过渡。'),
(3, '秦汉时期', '茶叶的种植和饮用逐渐传播开来。王褒《僮约》中提到“武阳买茶”，说明当时茶叶已经成为商品，有了一定的市场交易。'),
(4, '魏晋南北朝时期', '佛教盛行，和尚坐禅时常用茶来提神醒脑，促进了茶叶在寺庙中的种植和饮用。同时，文人雅士也开始将茶作为一种精神饮品，茶逐渐与文化相结合。'),
(5, '唐朝时期', '茶叶生产得到了极大发展，形成了较为系统的制茶工艺。陆羽撰写的《茶经》是世界上第一部茶叶专著，详细介绍了茶叶的种植、采摘、制作、饮用等方面的知识，对中国乃至世界茶文化的发展产生了深远影响。这一时期，蒸青绿茶是主要的制茶品种，通过蒸青、捣茶、拍茶、焙茶等工序制成饼茶。'),
(6, '宋朝时期', '制茶技术进一步提高，贡茶兴起，龙凤团茶盛行。朝廷设立了专门的贡茶院，负责制作高品质的茶叶供皇室享用。此时的制茶工艺更加精细，注重茶叶的外形和内质，出现了如“点茶”等复杂的茶艺。'),
(7, '元朝时期', '团茶逐渐被散茶所取代，蒸青散茶得到发展。人们开始采用更为简便的制作方法，将鲜叶直接蒸青后烘干，保留了茶叶的自然形态和香气。'),
(8, '明朝时期', '朱元璋罢造龙团凤饼，大力推广散茶。炒青技术得到广泛应用，通过高温炒制，使茶叶的香气更加浓郁，滋味更加醇厚，形成了绿茶、红茶、乌龙茶、黑茶等多种茶类的雏形。同时，黄茶、白茶等茶类也在这一时期逐渐形成独特的制作工艺。'),
(9, '清朝时期', '中国茶类日益丰富，除了传统的绿茶、红茶、乌龙茶、黑茶、黄茶、白茶外，还出现了各种花茶、紧压茶等。茶叶的制作工艺更加成熟和精细，各地形成了各具特色的名茶，如西湖龙井、武夷岩茶、祁门红茶、普洱茶等。茶叶贸易也十分繁荣，中国茶叶大量出口到世界各地，成为中国重要的出口商品之一。');

--
-- 转储表的索引
--

--
-- 表的索引 `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `history`
--
ALTER TABLE `history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
