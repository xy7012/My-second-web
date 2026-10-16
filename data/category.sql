-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2014-12-31 19:59:00
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
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `variety` enum('传统茶','再加工茶','特色茶') COLLATE utf8_croatian_ci NOT NULL,
  `guess` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `cha` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `special` varchar(60) COLLATE utf8_croatian_ci NOT NULL,
  `p` varchar(500) COLLATE utf8_croatian_ci NOT NULL,
  `image` varchar(20) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `variety`, `guess`, `cha`, `special`, `p`, `image`) VALUES
(1, '传统茶', '杀青锁鲜，春色入盏', '绿茶', '<span>鲜爽</span><span>清香</span><span>嫩绿</span>', '不发酵（0%），高温杀青阻断氧化，工艺：杀青→揉捻→干燥。代表茶：西湖龙井（扁形豆香）、碧螺春（卷曲花果香）。汤色碧绿，清香鲜爽，富含茶多酚，宜80℃冲泡，清热提神。  ', 'category1.jpg'),
(2, '传统茶', '银针披白毫，三年成药香', '白茶', '<span>清甜</span><span>毫香</span><span>陈韵</span>', '微发酵（5%-10%），自然萎凋不炒不揉，工艺：萎凋→干燥。代表茶：白毫银针（单芽银毫）、寿眉（陈化枣香）。汤色杏黄，清甜柔润，新茶有青草香，老茶显药韵，可煮可泡。  \r\n', 'category2.jpg'),
(3, '传统茶', '金镶玉色，三起三落', '黄茶', '<span>甘醇</span><span>熟香</span><span>金黄</span>', '轻发酵（10%-20%），闷黄工艺形成黄叶黄汤，工艺：杀青→闷黄→干燥。代表茶：君山银针（金镶玉三起三落）、霍山黄芽（熟栗香）。甘醇温和，汤色金黄，助消化，明清贡茶之选。  \r\n', 'category3.jpg'),
(4, '传统茶', '岩骨花香，七泡余韵', '青茶', '<span>高香</span><span>岩韵</span>', '半发酵（30%-70%），摇青激发花果香，工艺：晒青→摇青→烘焙。代表茶：铁观音（兰香观音韵）、大红袍（岩骨花香）。汤色琥珀，香高韵长，岩茶带矿物质味，工夫茶文化核心。  \r\n', 'category4.jpg'),
(5, '传统茶', '松烟入骨，红汤始祖', '红茶', '<span>甜醇</span><span>蜜果</span><span>红艳</span>', '全发酵（80%-90%），揉捻发酵红变，工艺：萎凋→揉捻→发酵→干燥。代表茶：祁门红茶（祁门香似玫瑰）、正山小种（松烟香）。红汤红叶，甜醇温润，兼容调饮，秋冬暖胃佳品。  \r\n', 'category5.jpg'),
(6, '传统茶', '渥堆藏岁月，茶马古道魂', '黑茶', '<span>厚重</span><span>陈香</span><span>药效</span>', '后发酵（微生物转化），渥堆陈化，工艺：杀青→揉捻→渥堆→干燥。代表茶：普洱熟茶（陈香顺滑）、安化黑茶（金花菌药香）。汤色红褐，醇厚甘滑，越陈越香，边疆“生命之饮”。  \r\n', 'category6.jpg'),
(7, '再加工茶', '香透九重天，冰糖锁清甜', '茉莉花茶', '<span>鲜灵</span><span>甘甜</span><span>冷香</span>', '窨制工艺代表，以绿茶为坯反复吸附茉莉鲜香，茶汤鲜灵甘甜带冰糖韵，冷泡尤显清透花香，福州传统名茶。', 'category7.jpg'),
(8, '再加工茶', '水中绽白莲，越泡越香甜', '茉莉绣球', '<span>清雅</span><span>柔和</span><span>耐泡</span>', '工艺花茶，手工捆扎茉莉与白毫银针成球状，冲泡时如白莲绽放，耐泡度高，兼具观赏性与淡雅花香。', 'category8.jpg'),
(9, '再加工茶', '陈香藏岁月，茶砖泛金花', '六堡茶砖', '<span>陈香</span><span>醇厚</span><span>药香</span>', '广西黑茶紧压成砖，后发酵产生陈香、槟榔香，汤色红浓似琥珀，祛湿功效显著，越陈越醇厚。', 'category9.jpg'),
(10, '再加工茶', '三秒即入喉，茶味随身走', '速溶红茶', '<span>便捷</span><span>单一</span><span>淡薄</span>', '现代萃取技术制成，即冲即溶无茶渣，保留红茶基础风味，便携性强，适合制作奶茶或冰饮。', 'category10.jpg'),
(11, '再加工茶', '蜜桃撞乌龙，冷泡更清透', '蜜桃乌龙', '<span>果香</span><span>甜润</span><span>清新</span>', '调味茶代表，以乌龙茶为基底混合蜜桃果粒或香精，果香奔放茶味清爽，冷泡更具夏日清凉感。', 'category11.jpg'),
(12, '再加工茶', '明目清火方，甘苦皆入喉', '菊花枸杞茶', '<span>清凉</span><span>甘甜</span><span>润喉</span>', '杭白菊配宁夏枸杞，茶汤甘甜微苦，清肝明目降火气，办公族养生标配，可加冰糖调和。', 'category12.jpg'),
(13, '再加工茶', '炭火炼观音，喉韵藏焦糖', '炭焙铁观音', '<span>炭韵</span><span>醇厚</span><span>回甘</span>', '传统炭火慢焙的铁观音，焦糖香与兰花底韵交织，喉韵深沉带火工香，老茶客偏爱之选。', 'category13.jpg'),
(14, '再加工茶', '清凉无需茶，一叶醒三焦', '薄荷茶', '<span>清凉</span><span>清爽</span><span>草本</span>', '薄荷叶单独冲泡的代用茶，无咖啡因且清凉醒脑，适合夏季消暑或搭配蜂蜜润喉。', 'category14.jpg'),
(15, '特色茶', '碾春成末翠生烟', '抹茶', '<span>鲜爽</span><span>清香</span><span>冷香</span>', '日本传统绿茶粉，以遮阴茶树叶经石磨碾磨成细末，色泽翠绿鲜亮，口感鲜醇带海苔香，茶道仪式感强，亦广泛用于甜品烘焙。', 'category15.jpg'),
(16, '特色茶', '苦尽甘来众人享', '马黛茶', '<span>草香</span><span>醇厚</span><span>回甘</span>', '南美洲特色茶饮，由冬青树叶制成，苦味浓郁，传统以金属吸管（Bombilla）多人共饮，富含咖啡因，提神效果显著。', 'category16.jpg'),
(17, '特色茶', '虫酿奇香千金换', '虫屎茶', '<span>甘醇</span><span>独特</span><span>陈香</span>', '中国广西小众茶，昆虫食茶排泄物发酵而成，茶汤深红透亮，带独特药香与蜜甜，口感顺滑，因产量稀少而珍贵。', 'category17.jpg'),
(18, '特色茶', '糯香入茶不思饭', '糯米香茶', '<span>米香</span><span>甜润</span><span>清香</span>', '云南傣族特色茶，天然糯米香叶与普洱茶混合，散发软糯谷物香气，汤色金黄，暖胃解腻，冷泡热饮皆宜。', 'category18.jpg'),
(19, '特色茶', '碧水浮雪暗香凝', '碧潭飘雪', '<span>花香</span><span>鲜灵</span><span>甘醇</span>', '四川茉莉花茶代表，绿茶为底多次窨制茉莉鲜花，冲泡时茶汤碧绿、花瓣如雪浮沉，香气鲜灵，冰糖甜感突出。', 'category19.jpg'),
(20, '特色茶', '银毫如雪淡如月', '白牡丹', '<span>毫香</span><span>清甜</span><span>淡雅</span>', '白茶中上品，一芽一叶或两叶，满披白毫如银雪，汤色杏黄清透，滋味清甜带花香蜜韵，陈放后枣香渐显。', 'category20.jpg'),
(21, '特色茶', '炭焙观音喉韵沉', '冻顶乌龙', '<span>果香</span><span>醇厚</span><span>韵味</span>', '台湾高山乌龙茶，重发酵炭焙工艺，茶汤琥珀透亮，兰花香与焦糖香交织，喉韵深沉回甘，耐泡度高。', 'category21.jpg'),
(22, '特色茶', '南非红汤夜安神', '南非博士茶', '<span>甜润</span><span>草香</span><span>柔滑</span>', '南非国宝级草本茶，针状红茶色泽橙红，天然无咖啡因，口感微甜带木质香，助眠抗氧化，老少皆宜。', 'category22.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
