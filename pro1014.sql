-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2020 lúc 03:35 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pro1014`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `slug`, `icon`, `created_time`, `updated_time`) VALUES
(1, 'Điện thoại', 'dien-thoai', '&lt;i class=&quot;fal fa-mobile&quot;&gt;&lt;/i&gt;', 1606526006, 1606527543),
(2, 'Laptop', 'laptop', '&lt;i class=&quot;fal fa-laptop&quot;&gt;&lt;/i&gt;', 1606526058, 1606527558),
(3, 'Máy tính bảng', 'may-tinh-bang', '<i class=\"fal fa-tablet\"></i>', 1606527014, 0),
(4, 'Đồng hồ thông minh', 'thiet-bi-deo', '<i class=\"fal fa-watch-calculator\"></i>', 1606527629, 0),
(5, 'Phụ Kiện', 'phu-kien', '<i class=\"fal fa-headphones\"></i>', 1606527670, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custumers`
--

CREATE TABLE `custumers` (
  `id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `custumers`
--

INSERT INTO `custumers` (`id`, `phone`, `fullname`, `email`, `created_time`) VALUES
(1, '0979081574', 'Nguyễn Văn A', '', 1607001349),
(2, '095943544', 'Nguyen Tien', '', 1607411623),
(3, '443434343', 'Nguyen Tien', '', 1607411731);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evaluates`
--

CREATE TABLE `evaluates` (
  `id` int(11) NOT NULL,
  `custumer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `voted` tinyint(4) NOT NULL,
  `content` text NOT NULL,
  `share` tinyint(4) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` char(200) NOT NULL,
  `created_time` int(11) NOT NULL DEFAULT 0,
  `updated_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `image_library`
--

INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `updated_time`) VALUES
(1, 1, '/04-12-2020/465883758.jpeg', 1607064963, 0),
(2, 1, '/04-12-2020/88600867.jpeg', 1607064963, 0),
(3, 1, '/04-12-2020/193451845.jpeg', 1607064963, 0),
(4, 1, '/04-12-2020/833049682.jpeg', 1607064963, 0),
(5, 1, '/04-12-2020/186074261.jpeg', 1607064963, 0),
(6, 1, '/04-12-2020/923432143.jpeg', 1607064963, 0),
(7, 2, '/04-12-2020/286885732.jpeg', 1607065996, 0),
(8, 2, '/04-12-2020/296834586.jpeg', 1607065996, 0),
(9, 2, '/04-12-2020/1922714375.jpeg', 1607065996, 0),
(10, 2, '/04-12-2020/2132584444.jpeg', 1607065996, 0),
(11, 2, '/04-12-2020/1992615027.jpeg', 1607065996, 0),
(12, 2, '/04-12-2020/597580656.jpeg', 1607065996, 0),
(13, 3, '/04-12-2020/1638471749.jpeg', 1607088289, 0),
(14, 3, '/04-12-2020/1040915171.jpeg', 1607088289, 0),
(15, 3, '/04-12-2020/1625951625.jpeg', 1607088289, 0),
(16, 3, '/04-12-2020/983950631.jpeg', 1607088289, 0),
(17, 3, '/04-12-2020/280920198.jpeg', 1607088289, 0),
(18, 4, '/04-12-2020/2100489953.jpeg', 1607088633, 0),
(19, 4, '/04-12-2020/1892633071.jpeg', 1607088633, 0),
(20, 4, '/04-12-2020/1454943618.jpeg', 1607088633, 0),
(21, 4, '/04-12-2020/1316922594.jpeg', 1607088633, 0),
(22, 4, '/04-12-2020/704442735.jpeg', 1607088633, 0),
(23, 4, '/04-12-2020/507054014.jpeg', 1607088633, 0),
(24, 5, '/04-12-2020/228024959.jpeg', 1607088985, 0),
(25, 5, '/04-12-2020/12102822.jpeg', 1607088985, 0),
(26, 5, '/04-12-2020/1826461343.jpeg', 1607088985, 0),
(27, 5, '/04-12-2020/1990848131.jpeg', 1607088985, 0),
(28, 5, '/04-12-2020/891546627.jpeg', 1607088985, 0),
(29, 5, '/04-12-2020/507054014 (1).jpeg', 1607088985, 0),
(30, 6, '/04-12-2020/2075925751.jpeg', 1607089580, 0),
(31, 6, '/04-12-2020/285281962.jpeg', 1607089580, 0),
(32, 6, '/04-12-2020/1895160829.jpeg', 1607089580, 0),
(33, 6, '/04-12-2020/1488940904.jpeg', 1607089580, 0),
(34, 7, '/04-12-2020/789274353.jpeg', 1607089920, 0),
(35, 7, '/04-12-2020/501503171.jpeg', 1607089920, 0),
(36, 7, '/04-12-2020/1362980745.jpeg', 1607089920, 0),
(37, 7, '/04-12-2020/890795730.jpeg', 1607089920, 0),
(38, 7, '/04-12-2020/1523470747.jpeg', 1607089920, 0),
(39, 7, '/04-12-2020/444235064.jpeg', 1607089920, 0),
(40, 8, '/04-12-2020/1256673391.jpeg', 1607090334, 0),
(41, 8, '/04-12-2020/2092582308.jpeg', 1607090334, 0),
(42, 8, '/04-12-2020/638180240.jpeg', 1607090334, 0),
(43, 8, '/04-12-2020/391372676.jpeg', 1607090334, 0),
(44, 8, '/04-12-2020/94107404.jpeg', 1607090334, 0),
(45, 9, '/04-12-2020/1137848926.jpeg', 1607090759, 0),
(46, 9, '/04-12-2020/283861357.jpeg', 1607090759, 0),
(47, 9, '/04-12-2020/985814149.jpeg', 1607090759, 0),
(48, 9, '/04-12-2020/1064338139.jpeg', 1607090759, 0),
(49, 9, '/04-12-2020/1935197382.jpeg', 1607090759, 0),
(50, 9, '/04-12-2020/1611398233.jpeg', 1607090759, 0),
(51, 9, '/04-12-2020/223909559.jpeg', 1607090759, 0),
(52, 10, '/04-12-2020/344381309.jpeg', 1607091089, 0),
(53, 10, '/04-12-2020/1826356119.jpeg', 1607091089, 0),
(54, 10, '/04-12-2020/1163873316.jpeg', 1607091089, 0),
(55, 11, '/04-12-2020/585377093.jpeg', 1607091414, 0),
(56, 11, '/04-12-2020/525819117.jpeg', 1607091414, 0),
(57, 11, '/04-12-2020/897778538.jpeg', 1607091414, 0),
(58, 11, '/04-12-2020/1710537812.jpeg', 1607091414, 0),
(59, 11, '/04-12-2020/1930979612.jpeg', 1607091414, 0),
(60, 11, '/04-12-2020/2145253016.jpeg', 1607091414, 0),
(61, 12, '/04-12-2020/494423535.jpeg', 1607091739, 0),
(62, 12, '/04-12-2020/293801151.jpeg', 1607091739, 0),
(63, 12, '/04-12-2020/694137121.jpeg', 1607091739, 0),
(64, 12, '/04-12-2020/1778801995 (1).jpeg', 1607091739, 0),
(65, 12, '/04-12-2020/802468897.jpeg', 1607091739, 0),
(66, 12, '/04-12-2020/528711468.jpeg', 1607091739, 0),
(67, 13, '/04-12-2020/1262975994.jpeg', 1607091989, 0),
(68, 13, '/04-12-2020/249095600.jpeg', 1607091989, 0),
(69, 13, '/04-12-2020/999141719.jpeg', 1607091989, 0),
(70, 13, '/04-12-2020/165181195.jpeg', 1607091989, 0),
(71, 14, '/04-12-2020/1412734899.jpeg', 1607092226, 0),
(72, 14, '/04-12-2020/862025894.jpeg', 1607092226, 0),
(73, 14, '/04-12-2020/625167184.jpeg', 1607092226, 0),
(74, 14, '/04-12-2020/1571069619.jpeg', 1607092226, 0),
(75, 14, '/04-12-2020/2142092320.jpeg', 1607092226, 0),
(76, 15, '/04-12-2020/1523392425.jpeg', 1607092427, 0),
(77, 15, '/04-12-2020/1842217147.jpeg', 1607092427, 0),
(78, 15, '/04-12-2020/701952025.jpeg', 1607092427, 0),
(79, 15, '/04-12-2020/540591271.jpeg', 1607092427, 0),
(80, 15, '/04-12-2020/433169023.jpeg', 1607092427, 0),
(81, 16, '/04-12-2020/1499761729.jpeg', 1607092631, 0),
(82, 16, '/04-12-2020/1844665564.jpeg', 1607092631, 0),
(83, 16, '/04-12-2020/1391013965.jpeg', 1607092631, 0),
(84, 18, '/04-12-2020/27109330.png', 1607093096, 0),
(85, 18, '/04-12-2020/1471562544.png', 1607093096, 0),
(86, 18, '/04-12-2020/1523475883.jpeg', 1607093096, 0),
(87, 19, '/04-12-2020/1825465166.jpeg', 1607093414, 0),
(88, 19, '/04-12-2020/542372706.jpeg', 1607093414, 0),
(89, 19, '/04-12-2020/388102885.jpeg', 1607093414, 0),
(90, 19, '/04-12-2020/1289847555.jpeg', 1607093414, 0),
(91, 19, '/04-12-2020/2123808079.jpeg', 1607093414, 0),
(92, 19, '/04-12-2020/1536200355.jpeg', 1607093414, 0),
(93, 20, '/04-12-2020/1701849745.jpeg', 1607093649, 0),
(94, 20, '/04-12-2020/1609480115.jpeg', 1607093649, 0),
(95, 20, '/04-12-2020/2062092849.jpeg', 1607093649, 0),
(96, 20, '/04-12-2020/1120255313.jpeg', 1607093649, 0),
(97, 21, '/04-12-2020/908582306.jpeg', 1607093897, 0),
(98, 21, '/04-12-2020/858765883.jpeg', 1607093897, 0),
(99, 21, '/04-12-2020/1871671725.jpeg', 1607093897, 0),
(100, 22, '/04-12-2020/1473217672.jpeg', 1607094183, 0),
(101, 22, '/04-12-2020/1408123334.jpeg', 1607094183, 0),
(102, 22, '/04-12-2020/1171432737.jpeg', 1607094183, 0),
(103, 22, '/04-12-2020/1096844309.jpeg', 1607094183, 0),
(104, 22, '/04-12-2020/460440619.jpeg', 1607094183, 0),
(105, 22, '/04-12-2020/1497635043.jpeg', 1607094183, 0),
(106, 23, '/04-12-2020/1321677499.jpeg', 1607094404, 0),
(107, 23, '/04-12-2020/1924208504.jpeg', 1607094404, 0),
(108, 23, '/04-12-2020/1205838802.jpeg', 1607094404, 0),
(109, 23, '/04-12-2020/797957135 (1).jpeg', 1607094404, 0),
(110, 24, '/04-12-2020/401271975.jpeg', 1607094646, 0),
(111, 24, '/04-12-2020/1919274752.jpeg', 1607094646, 0),
(112, 24, '/04-12-2020/2005760427.jpeg', 1607094646, 0),
(113, 25, '/04-12-2020/Untitled12139301752.png', 1607094823, 0),
(114, 26, '/04-12-2020/845349223.jpeg', 1607095100, 0),
(115, 26, '/04-12-2020/1940056617.jpeg', 1607095100, 0),
(116, 26, '/04-12-2020/1605724513.jpeg', 1607095100, 0),
(117, 26, '/04-12-2020/755347079.jpeg', 1607095100, 0),
(118, 26, '/04-12-2020/843287607.jpeg', 1607095100, 0),
(119, 26, '/04-12-2020/916669057.jpeg', 1607095100, 0),
(120, 26, '/04-12-2020/178688298.jpeg', 1607095100, 0),
(121, 26, '/04-12-2020/34367331.jpeg', 1607095100, 0),
(122, 26, '/04-12-2020/194689220.jpeg', 1607095100, 0),
(123, 26, '/04-12-2020/660406179.jpeg', 1607095100, 0),
(124, 27, '/04-12-2020/564035129.jpeg', 1607095326, 0),
(125, 27, '/04-12-2020/1115679429.jpeg', 1607095326, 0),
(126, 27, '/04-12-2020/1930951433.jpeg', 1607095326, 0),
(127, 28, '/04-12-2020/2082987688.jpeg', 1607095617, 0),
(128, 28, '/04-12-2020/1829712068.jpeg', 1607095617, 0),
(129, 28, '/04-12-2020/1712172853.jpeg', 1607095617, 0),
(130, 28, '/04-12-2020/1079665949.jpeg', 1607095617, 0),
(131, 28, '/04-12-2020/1821543494.jpeg', 1607095617, 0),
(132, 28, '/04-12-2020/717890440.jpeg', 1607095617, 0),
(133, 28, '/04-12-2020/707941586.jpeg', 1607095617, 0),
(134, 29, '/04-12-2020/504841866.jpeg', 1607096035, 0),
(135, 29, '/04-12-2020/24741401.jpeg', 1607096035, 0),
(136, 29, '/04-12-2020/1169273062.jpeg', 1607096035, 0),
(137, 29, '/04-12-2020/224533279.jpeg', 1607096035, 0),
(138, 29, '/04-12-2020/1890753809.jpeg', 1607096035, 0),
(139, 30, '/04-12-2020/1017343643.jpeg', 1607096253, 0),
(140, 30, '/04-12-2020/1792223121 (1).jpeg', 1607096253, 0),
(141, 30, '/04-12-2020/920909114.jpeg', 1607096253, 0),
(142, 30, '/04-12-2020/12073511.jpeg', 1607096253, 0),
(143, 30, '/04-12-2020/1512868388.jpeg', 1607096253, 0),
(144, 30, '/04-12-2020/1119168587.jpeg', 1607096253, 0),
(145, 31, '/04-12-2020/322047548.png', 1607096452, 0),
(146, 31, '/04-12-2020/1818936547.png', 1607096452, 0),
(147, 31, '/04-12-2020/1714501557.png', 1607096452, 0),
(148, 31, '/04-12-2020/1761062479.png', 1607096452, 0),
(149, 31, '/04-12-2020/36631655.png', 1607096452, 0),
(150, 32, '/04-12-2020/962247466.jpeg', 1607096710, 0),
(151, 32, '/04-12-2020/849848546.png', 1607096710, 0),
(152, 32, '/04-12-2020/2053091500.png', 1607096710, 0),
(153, 32, '/04-12-2020/2058065927.png', 1607096710, 0),
(154, 33, '/04-12-2020/787165111.jpeg', 1607096988, 0),
(155, 33, '/04-12-2020/375386658.jpeg', 1607096988, 0),
(156, 33, '/04-12-2020/708225133.jpeg', 1607096988, 0),
(157, 33, '/04-12-2020/322106842.jpeg', 1607096988, 0),
(158, 34, '/04-12-2020/861753598.jpeg', 1607097226, 0),
(159, 34, '/04-12-2020/1575771750.jpeg', 1607097226, 0),
(160, 34, '/04-12-2020/157397649.jpeg', 1607097226, 0),
(161, 34, '/04-12-2020/737914440.jpeg', 1607097226, 0),
(162, 35, '/04-12-2020/1483386399.jpeg', 1607097457, 0),
(163, 35, '/04-12-2020/394656626.jpeg', 1607097457, 0),
(164, 35, '/04-12-2020/1232513936.jpeg', 1607097457, 0),
(165, 35, '/04-12-2020/120899197.jpeg', 1607097457, 0),
(166, 36, '/04-12-2020/2046741992.jpeg', 1607097697, 0),
(167, 36, '/04-12-2020/91672639.png', 1607097697, 0),
(168, 36, '/04-12-2020/246565337.jpeg', 1607097697, 0),
(169, 36, '/04-12-2020/1958762688.jpeg', 1607097697, 0),
(170, 37, '/04-12-2020/825187333.png', 1607097977, 0),
(171, 37, '/04-12-2020/1839724035.jpeg', 1607097977, 0),
(172, 37, '/04-12-2020/764553251.jpeg', 1607097977, 0),
(173, 37, '/04-12-2020/878898319.jpeg', 1607097977, 0),
(174, 37, '/04-12-2020/1226166535.jpeg', 1607097977, 0),
(175, 37, '/04-12-2020/2004526811.jpeg', 1607097977, 0),
(176, 37, '/04-12-2020/226780358.jpeg', 1607097977, 0),
(177, 37, '/04-12-2020/341293539.jpeg', 1607097977, 0),
(178, 37, '/04-12-2020/253314235.jpeg', 1607097977, 0),
(179, 38, '/04-12-2020/255638692.jpeg', 1607098258, 0),
(180, 38, '/04-12-2020/1906351840.jpeg', 1607098258, 0),
(181, 38, '/04-12-2020/1264896171.jpeg', 1607098258, 0),
(182, 38, '/04-12-2020/1596488892.jpeg', 1607098258, 0),
(183, 39, '/04-12-2020/126378286.png', 1607098463, 0),
(184, 39, '/04-12-2020/1979390290.png', 1607098463, 0),
(185, 39, '/04-12-2020/984562552.png', 1607098463, 0),
(186, 39, '/04-12-2020/738897172.png', 1607098463, 0),
(187, 40, '/04-12-2020/862282348.jpeg', 1607098652, 0),
(188, 40, '/04-12-2020/1944089301.jpeg', 1607098652, 0),
(189, 41, '/04-12-2020/2012289348.jpeg', 1607098842, 0),
(190, 41, '/04-12-2020/769121641.jpeg', 1607098842, 0),
(191, 41, '/04-12-2020/1143499242.jpeg', 1607098842, 0),
(192, 41, '/04-12-2020/1198892601.jpeg', 1607098842, 0),
(193, 42, '/04-12-2020/634757061.jpeg', 1607099083, 0),
(194, 42, '/04-12-2020/966349782.jpeg', 1607099083, 0),
(195, 42, '/04-12-2020/1377673471.jpeg', 1607099083, 0),
(196, 42, '/04-12-2020/1997244263.jpeg', 1607099083, 0),
(197, 43, '/04-12-2020/875468153.jpeg', 1607099351, 0),
(198, 43, '/04-12-2020/396321542.jpeg', 1607099351, 0),
(199, 43, '/04-12-2020/1512039956.jpeg', 1607099351, 0),
(200, 43, '/04-12-2020/1984679735.jpeg', 1607099351, 0),
(201, 43, '/04-12-2020/1739223705.jpeg', 1607099351, 0),
(202, 43, '/04-12-2020/1808798930.jpeg', 1607099351, 0),
(203, 44, '/04-12-2020/113392808.jpeg', 1607100011, 0),
(204, 44, '/04-12-2020/1021773647.jpeg', 1607100011, 0),
(205, 44, '/04-12-2020/112938044.jpeg', 1607100011, 0),
(206, 44, '/04-12-2020/428281968.jpeg', 1607100011, 0),
(207, 44, '/04-12-2020/1104778524.jpeg', 1607100011, 0),
(208, 44, '/04-12-2020/1789275541.jpeg', 1607100011, 0),
(209, 45, '/07-12-2020/285281962.jpeg', 1607310980, 0),
(210, 45, '/07-12-2020/1488940904.jpeg', 1607310980, 0),
(211, 45, '/07-12-2020/586028032.jpeg', 1607310980, 0),
(212, 46, '/07-12-2020/782580235.jpeg', 1607311278, 0),
(213, 46, '/07-12-2020/680132414.jpeg', 1607311278, 0),
(214, 46, '/07-12-2020/713134347.jpeg', 1607311278, 0),
(215, 46, '/07-12-2020/514251997.jpeg', 1607311278, 0),
(216, 47, '/07-12-2020/1958873087.jpeg', 1607311718, 0),
(217, 47, '/07-12-2020/2107635522.jpeg', 1607311718, 0),
(218, 47, '/07-12-2020/1669946069.jpeg', 1607311718, 0),
(219, 47, '/07-12-2020/543694700.jpeg', 1607311718, 0),
(220, 48, '/07-12-2020/961238900.jpeg', 1607311986, 0),
(221, 48, '/07-12-2020/1167674748.jpeg', 1607311986, 0),
(222, 48, '/07-12-2020/1805551257.jpeg', 1607311986, 0),
(223, 48, '/07-12-2020/1386168155.jpeg', 1607311986, 0),
(224, 49, '/07-12-2020/1038885187.jpeg', 1607312231, 0),
(225, 49, '/07-12-2020/915046029.jpeg', 1607312231, 0),
(226, 49, '/07-12-2020/51109606.jpeg', 1607312231, 0),
(227, 49, '/07-12-2020/264460473.jpeg', 1607312231, 0),
(228, 50, '/07-12-2020/1923891225.jpeg', 1607312474, 0),
(229, 50, '/07-12-2020/2074848361.jpeg', 1607312474, 0),
(230, 50, '/07-12-2020/1045821718.jpeg', 1607312474, 0),
(231, 50, '/07-12-2020/1513941834.jpeg', 1607312474, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `active`, `created_time`, `updated_time`) VALUES
(1, '', '', '', '', 0, 1607411613, 0),
(2, 'Nguyen Tien', '095943544', '13 Thanh Vinh 8, Đà Nẵng', '', 0, 1607411623, 0),
(3, 'Nguyen Tien', '443434343', '13 Thanh Vinh 8, Đà Nẵng', '', 0, 1607411731, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `discount`) VALUES
(1, 1, 2, 1, 17490000, 3),
(2, 2, 2, 1, 17490000, 3),
(3, 3, 2, 1, 17490000, 3),
(4, 3, 4, 1, 29990000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `trademark_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_hot` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `hot` tinyint(4) NOT NULL DEFAULT 0,
  `installment` int(11) NOT NULL,
  `description` text NOT NULL,
  `number_view` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `trademark_id`, `name`, `image`, `image_hot`, `price`, `discount`, `hot`, `installment`, `description`, `number_view`, `active`, `created_time`, `updated_time`) VALUES
(1, 1, 1, 'iPhone 12 Pro Max 128GB', '/04-12-2020/iPhone 12 Pro -Pro Max-Blu-1 (1).jpg', '/04-12-2020/ẢNH-BÉO_IPHONE-12-PRO_128GB (1).jpg', 32990000, 0, 1, 0, '', 7, 0, 1607064963, 1607100464),
(2, 1, 1, 'iPhone 11 64GB ', '/04-12-2020/iPhone 11-Red-1 (1).jpg', '/04-12-2020/ẢNH-BÉO_IPHONE-12_64GB.jpg', 17490000, 3, 1, 0, '', 7, 0, 1607065996, 1607100357),
(3, 1, 1, 'iPhone XR 64GB ', '/04-12-2020/4580795516.jpg', '', 12990000, 7, 1, 0, '', 0, 0, 1607088289, 0),
(4, 1, 1, 'iPhone 12 Pro 128GB', '/04-12-2020/iPhone 12 Pro -Pro Max-Silv-1.jpg', '/04-12-2020/ẢNH-BÉO_IPHONE-12-PRO_128GB.jpg', 29990000, 0, 1, 0, '', 2, 0, 1607088633, 1607100404),
(5, 1, 1, 'iPhone 12 Pro Max 256GB', '/04-12-2020/iPhone 12 Pro -Pro Max-Gol-11516714723.jpg', '', 35990000, 0, 1, 0, '', 0, 0, 1607088985, 1607100172),
(6, 1, 2, 'Samsung Galaxy A51', '/04-12-2020/1.-A51_Sliver.jpg', '', 6790000, 15, 1, 0, '', 0, 0, 1607089580, 1607100200),
(7, 1, 1, 'Nokia 5.3 3GB-64GB ', '/04-12-2020/11766844179.jpg', '', 2790000, 0, 1, 0, '', 1, 0, 1607089920, 0),
(8, 1, 1, 'Samsung E1200 ', '/04-12-2020/samsung-e1200.jpg', '', 349000, 0, 0, 0, '', 0, 0, 1607090334, 0),
(9, 1, 1, 'iPhone 11 128GB ', '/04-12-2020/iPhone 11-Purp-1.jpg', '', 18990000, 5, 1, 0, '', 0, 0, 1607090759, 0),
(10, 1, 2, 'Samsung Galaxy Note20 ', '/04-12-2020/Care-SS-Note20-Mint-1.jpg', '/04-12-2020/Note20-t11-2.jpg', 17990000, 25, 1, 0, '', 0, 0, 1607091089, 1607095766),
(11, 1, 4, 'VIVO Y19 ', '/04-12-2020/Vivo Y19-Bla-1.jpeg', '', 4990000, 0, 0, 0, '', 0, 0, 1607091414, 0),
(12, 1, 2, 'Samsung Galaxy S20 Ultra', '/04-12-2020/Care-Galaxy S20 Ultra-Grey-1.jpg', '', 27990000, 0, 0, 0, '', 0, 0, 1607091739, 0),
(13, 1, 2, 'Samsung Galaxy S20+ ', '/04-12-2020/Care-Galaxy S20 Plus-Blu-1.jpg', '', 21990000, 0, 0, 0, '', 0, 0, 1607091989, 0),
(14, 1, 7, 'Vsmart Active 3 4GB-64GB ', '/04-12-2020/1Vsmart-Active-3-4GB-64GB.jpg', '', 3490000, 0, 0, 0, '', 0, 0, 1607092226, 0),
(15, 1, 9, 'Realme C3 3GB/32GB ', '/04-12-2020/637176200624636073_realme-c3-do-1.png.jpg', '', 2990000, 0, 0, 0, '', 0, 0, 1607092427, 0),
(16, 1, 3, 'OPPO Reno3 ', '/04-12-2020/viber_image_2020-05-05_11-56-36.jpg', '', 7490000, 0, 0, 0, '', 0, 0, 1607092631, 0),
(17, 1, 10, 'Xiaomi Redmi Note 9 4128GB ', '/04-12-2020/Redmi-note-9-4-128-W.jpg', '', 4690000, 0, 0, 0, '', 12, 0, 1607092820, 1607093190),
(18, 1, 10, 'Xiaomi Redmi Note 9 Pro 6128GB ', '/04-12-2020/Redmi-note-9-pro-6-Grey1455275569.jpg', '', 6490000, 0, 0, 0, '', 2, 0, 1607093096, 0),
(19, 1, 9, 'Realme 6i ', '/04-12-2020/Realme-6i--Gre1.jpg', '', 4990000, 0, 0, 0, '', 0, 0, 1607093414, 0),
(20, 1, 2, 'Samsung Galaxy A21s (3GB32GB) ', '/04-12-2020/A21s-Up anh NC4G.jpg', '', 4390000, 0, 0, 0, '', 0, 0, 1607093649, 0),
(21, 1, 3, 'OPPO A92', '/04-12-2020/A92-Whi-1.jpg', '', 6490000, 0, 0, 0, '', 25, 0, 1607093897, 0),
(22, 1, 11, 'Masstel Fami P20', '/04-12-2020/Fami P20-Bla-1.jpg', '', 550000, 0, 0, 0, '', 0, 0, 1607094183, 0),
(23, 1, 11, 'Masstel Fami 11', '/04-12-2020/Masstel Fami 11-1.jpg', '', 350000, 0, 0, 0, '', 0, 0, 1607094404, 0),
(24, 1, 12, 'Itel it2173 ', '/04-12-2020/Itel 2173-Gray-1.jpg', '', 250000, 0, 0, 0, '', 4, 0, 1607094646, 0),
(25, 1, 6, 'Homephone X1205 ', '/04-12-2020/Untitled12139301752.png', '', 500000, 0, 0, 0, '', 0, 0, 1607094823, 0),
(26, 1, 1, 'iPhone SE (2020) 128GB', '/04-12-2020/iPhoneSE-Blac-1.jpg', '', 12490000, 0, 0, 0, '', 0, 0, 1607095100, 0),
(27, 1, 1, 'iPhone 8 Plus 128GB ', '/04-12-2020/iPhone 8 Plus - Gol- 1.jpg', '', 13490000, 0, 0, 0, '', 0, 0, 1607095326, 0),
(28, 1, 1, 'iPhone 12 128GB ', '/04-12-2020/iPhone 12-Mini-Blu-1.jpg', '', 25990000, 0, 0, 0, '', 0, 0, 1607095617, 0),
(29, 1, 3, 'OPPO Reno4 Pro', '/04-12-2020/1Reno4-Pro-Whi-1.jpg', '/04-12-2020/anh-beo-OPPO-Reno4.jpg', 11990000, 0, 0, 0, '', 2, 0, 1607096035, 1607100523),
(30, 1, 4, 'Vivo Y1S ', '/04-12-2020/Vivo-Y1s-Blac-1.jpg', '', 2590000, 0, 0, 0, '', 0, 0, 1607096253, 0),
(31, 1, 3, 'OPPO Reno2 F', '/04-12-2020/637063038223413617_oppo-reno2-f-xanh-1-1.png', '', 6490000, 0, 0, 0, '', 0, 0, 1607096452, 0),
(32, 1, 3, 'OPPO A5 2020 4GB-128GB ', '/04-12-2020/trang1849068855.jpg', '', 4390000, 0, 0, 0, '', 0, 0, 1607096710, 0),
(33, 1, 3, 'OPPO A93 ', '/04-12-2020/OPPO-A93-Bla-1.jpg', '', 7490000, 0, 0, 0, '', 0, 0, 1607096988, 0),
(34, 1, 5, 'Nokia 2.4', '/04-12-2020/Nokia 2.4-Bla-1.jpg', '', 2390000, 0, 0, 0, '', 0, 0, 1607097226, 0),
(35, 1, 5, 'Nokia 8.3-5G ', '/04-12-2020/LG-5G-Nokia-8.3-1.jpg', '', 10990000, 0, 0, 0, '', 0, 0, 1607097457, 0),
(36, 1, 8, 'Energizer E241s (Wifi+4G) ', '/04-12-2020/E241.jpg', '', 890000, 0, 0, 0, '', 0, 0, 1607097697, 0),
(37, 1, 9, 'Realme 6 Pro', '/04-12-2020/637201240317028744_realme-6pro-do-1.png', '', 0, 0, 0, 0, '', 0, 0, 1607097977, 0),
(38, 1, 9, 'Realme C17', '/04-12-2020/Realme C17-Blu-1.jpg', '', 5290000, 0, 0, 0, '', 0, 0, 1607098258, 0),
(39, 1, 9, 'Realme XT ', '/04-12-2020/637039912038505433_realme-xt-1.png', '', 7990000, 0, 0, 0, '', 0, 0, 1607098463, 0),
(40, 1, 2, 'Samsung Galaxy Z Fold 2 ', '/04-12-2020/Galaxy Z Fold 2-1.jpg', '', 50000000, 0, 0, 0, '', 1, 0, 1607098652, 0),
(41, 1, 2, 'Samsung Galaxy Note20 Ultra 5G ', '/04-12-2020/LG-5G-SS-Note20-Ultra5G-Copper-1.jpg', '/04-12-2020/Note20-Ultra-2311.jpg', 26990000, 0, 0, 0, '', 1, 0, 1607098842, 1607100294),
(42, 1, 2, 'Samsung Galaxy S10+ 128GB ', '/04-12-2020/11468747307.jpg', '', 14990000, 0, 0, 0, '', 0, 0, 1607099083, 0),
(43, 1, 1, 'iPhone 12 Pro Max 512GB', '/04-12-2020/iPhone 12 Pro -Pro Max-Blu-1433881914.jpg', '', 39990000, 0, 0, 0, '', 0, 0, 1607099351, 0),
(44, 1, 2, 'Samsung Galaxy Z Flip ', '/04-12-2020/SS Z Flip-Bla-1.jpg', '', 29000000, 0, 0, 0, '', 0, 0, 1607100011, 0),
(45, 1, 2, 'Samsung Galaxy A51', '/07-12-2020/1895160829.jpeg', '/07-12-2020/ẢNH BÉO_GALAXY A51.jpg', 7990000, 10, 1, 0, '<h3>Galaxy A51 &ndash; Smartphone Android b&aacute;n chạy nhất thế giới trong qu&yacute; 1 năm 2020</h3>\r\n\r\n<p>Theo b&aacute;o c&aacute;o mới nhất từ Canalys th&igrave; trong qu&yacute; 1 vừa qua, Galaxy A51 đ&atilde; ch&iacute;nh thức vươn l&ecirc;n trở th&agrave;nh chiếc smartphone Android b&aacute;n chạy nhất của Samsung trong qu&yacute; 1 năm 2020.</p>\r\n\r\n<p><img alt=\"Galaxy A51 dẫn đầu trong danh sách những mẫu smartphone Android bán chạy nhất thế giới quý 1 năm 2020\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/07/Galaxy-A51-1.jpg\" /></p>\r\n\r\n<p><em>Galaxy A51 dẫn đầu trong danh s&aacute;ch những mẫu smartphone Android b&aacute;n chạy nhất thế giới qu&yacute; 1 năm 2020</em></p>\r\n\r\n<p>Cụ thể, đ&atilde; c&oacute; tới khoảng 6 triệu chiếc Galaxy A51 đ&atilde; được b&aacute;n ra trong 3 th&aacute;ng đầu năm nay, chiếm 2.3% thị phần, gi&uacute;p A51 đạt được vị tr&iacute; thứ 3 trong top 10 chiếc smartphone b&aacute;n chạy nhất qu&yacute; 1/2020. Xếp ngay sau Galaxy A51 l&agrave; mẫu Redmi 8 với 1.9% thị phần nhờ tấn c&ocirc;ng mạnh v&agrave;o thị trường Ấn Độ v&agrave; Trung Quốc.</p>\r\n\r\n<ul>\r\n	<li><em>Xem th&ecirc;m:&nbsp;</em><em><a href=\"https://tintuc.viettelstore.vn/samsung-da-ha-guc-nhieu-doi-thu-nhu-the-nao-bang-camera-macro-tren-galaxy-a51.html\">Samsung đ&atilde; hạ gục nhiều đối thủ như thế n&agrave;o bằng Camera Macro tr&ecirc;n Galaxy A51</a></em></li>\r\n</ul>\r\n\r\n<h3>V&igrave; sao m&agrave; Galaxy A51 lại đạt được th&agrave;nh c&ocirc;ng lớn đến như vậy?</h3>\r\n\r\n<p>Samsung đ&atilde; &aacute;p dụng chiến lược mới nhất của họ l&agrave; &ldquo;đổi mới đảo chiều&rdquo; &ndash; mang những t&iacute;nh năng, c&ocirc;ng nghệ mới nhất, đột ph&aacute; nhất trang bị cho d&ograve;ng Galaxy A trước, sau đ&oacute; mới đ&agrave;o s&acirc;u nghi&ecirc;n cứu v&agrave; ph&aacute;t triển th&ecirc;m để mang l&ecirc;n những d&ograve;ng S hoặc Note &ndash; đem đến những trải nghiệm tối t&acirc;n nhất cho Galaxy A51 so với những đối thủ kh&aacute;c trong ph&acirc;n kh&uacute;c gi&aacute; 8 triệu đồng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/07/Galaxy-A51-2.jpg\" /></p>\r\n\r\n<p>Với thế mạnh l&agrave; nh&agrave; sản xuất m&agrave;n h&igrave;nh thiết bị di động chiếm thị phần lớn nhất to&agrave;n cầu, Galaxy A51 được trang bị c&ocirc;ng nghệ m&agrave;n h&igrave;nh tr&agrave;n viền v&ocirc; cực Infinity-O SuperAmoled, độ ph&acirc;n giải FullHD+ v&agrave; k&iacute;ch thước l&ecirc;n đến 6,5&rdquo; inch &ndash; lớn nhất trong ph&acirc;n kh&uacute;c gi&aacute; &ndash;&nbsp; để dễ d&agrave;ng mang đến những trải nghiệm sinh động nhất khi xem phim, chơi game hay sử dụng c&aacute;c ứng dụng giải tr&iacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/07/Galaxy-A51-3.jpg\" /></p>\r\n\r\n<p>Chưa hết, m&aacute;y được cung cấp sức mạnh xử l&yacute; bởi con chip Exynos 9611 8 nh&acirc;n hiệu năng cao, đi k&egrave;m với thanh RAM v&agrave; bộ nhớ trong với dung lượng tối đa l&ecirc;n tới 8GB/128GB gi&uacute;p cho khả năng đa nhiệm v&agrave; lưu trữ dữ liệu gần như l&agrave; kh&ocirc;ng giới hạn đối với những người d&ugrave;ng chỉ c&oacute; những nhu cầu cơ bản.</p>\r\n', 6, 0, 1607310980, 0),
(46, 1, 10, 'Xiaomi Mi POCO X3 NFC 6/128GB', '/07-12-2020/713134347.jpeg', '/07-12-2020/Poco-X3.jpg', 6990000, 0, 1, 0, '<p><strong>Xiaomi đ&atilde; ch&iacute;nh thức giới thiệu POCO X3, chiếc smartphone thuộc ph&acirc;n kh&uacute;c tầm trung tiếp theo được Xiaomi ra mắt dưới thương hiệu POCO. POCO X3 mang trong m&igrave;nh nhiều điểm nhấn, c&oacute; thể kể tới như thiết kế mới, m&agrave;n h&igrave;nh 120Hz, trang bị chipset Snapdragon 732G đầu ti&ecirc;n v&agrave; c&oacute; mức gi&aacute; phải chăng. C&ugrave;ng Viettel Store t&igrave;m hiểu s&acirc;u hơn về Poco X3 NFC bạn nh&eacute;...</strong></p>\r\n\r\n<p><img alt=\"Mở hộp POCO X3 NFC\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/11/mo-hop-POCO-X3-NFC-1.jpg\" /></p>\r\n\r\n<p>POCO X3 được ho&agrave;n thiện từ chất liệu nhựa Polycarbonate, k&egrave;m với đ&oacute; l&agrave; khung viền kim loại chắc chắn. Mặt lưng n&agrave;y của m&aacute;y nổi bật với cụm 4 camera ch&iacute;nh được đặt trong một m&ocirc;-đun h&igrave;nh vu&ocirc;ng. Cảm biến v&acirc;n tay của điện thoại n&agrave;y sẽ được t&iacute;ch hợp v&agrave;o n&uacute;t nguồn ở cạnh b&ecirc;n.</p>\r\n\r\n<p><img alt=\"Cận cảnh 4 camera sau được nằm trong module hình chữ nhật cách điệu nhô lên\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/11/mo-hop-POCO-X3-NFC-10.jpg\" /></p>\r\n\r\n<p>Màn hình Xiaomi POCO X3 NFC sở hữu thi&ecirc;́t k&ecirc;́ màn hình đục l&ocirc;̃ với kích thước 6.67 inch có đ&ocirc;̣ ph&acirc;n giải Full HD+ và t&ocirc;́c đ&ocirc;̣ làm mới 120Hz sở hữu độ tương phản 1500:1, bao phủ 84% dải m&agrave;u NTSC v&agrave; 87.4% dải m&agrave;u DCI-P3, độ s&aacute;ng 450 nits v&agrave; được bảo vệ bởi k&iacute;nh cường lực Gorilla Glass 5.</p>\r\n\r\n<p><img alt=\"Màn hình POCO X3 NFC kích thước lớn\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/11/mo-hop-POCO-X3-NFC-13.jpg\" /></p>\r\n\r\n<p>POCO X3 NFC cũng là đi&ecirc;̣n thoại đ&acirc;̀u ti&ecirc;n tr&ecirc;n th&ecirc;́ giới được trang bị chip xử lý Snapdragon 732G của Qualcomm. So với chipset ti&ecirc;̀n nhi&ecirc;̣m Snapdragon 730G thì SoC này mang đ&ecirc;́n hi&ecirc;̣u năng tăng khoảng 15%. Poco X3 NFC mang tr&ecirc;n m&igrave;nh vi&ecirc;n pin dung lượng cực lớn 5.160 mAh v&agrave; hỗ trợ sạc nhanh c&ocirc;ng suất 33W. Poco X3 NFC đi k&egrave;m củ sạc 33W trong hộp. Theo thử nghiệm thực tế, bạn sẽ sạc được từ 0 l&ecirc;n 55% sau 30 ph&uacute;t v&agrave; sạc đầy ho&agrave;n to&agrave;n 100% trong 75 ph&uacute;t. Đ&acirc;y l&agrave; tốc độ sạc tương đối nhanh.</p>\r\n\r\n<p><img alt=\"Hệ thống 4 camera sau nhìn độc đáo và lạ mắt\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/11/mo-hop-POCO-X3-NFC-9.jpg\" /></p>\r\n\r\n<p>Về th&ocirc;ng số th&igrave; cụm camera n&agrave;y bao gồm: một camera g&oacute;c rộng 64MP f/1.89 sử dụng cảm biến Sony IMX682, một camera g&oacute;c si&ecirc;u rộng 13MP g&oacute;c nh&igrave;n 119 độ, một camera 2MP macro v&agrave; một camera 2MP đo chiều s&acirc;u. Ph&iacute;a trước l&agrave; camera selfie đơn với độ ph&acirc;n giải 20MP f/2.2.</p>\r\n', 1, 0, 1607311278, 0),
(47, 1, 2, 'Samsung Galaxy Note 10 Lite', '/07-12-2020/1958873087.jpeg', '/07-12-2020/ẢNH BÉO GALAXY NOTE10 LITE.jpg', 11490000, 5, 1, 0, '<p><strong>Galaxy Note 10 Lite sở hữu S Pen c&ugrave;ng hiệu năng vượt trội, đ&aacute;p ứng nhu cầu cho một thiết bị mạnh mẽ như một chiếc PC nhưng vẫn ph&ugrave; hợp với đại đa số người d&ugrave;ng. C&ugrave;ng Viettel Store đ&aacute;nh gi&aacute; nhanh Galaxy Note 10 Lite trong b&agrave;i viết dưới đ&acirc;y.</strong></p>\r\n\r\n<p><strong><img alt=\"Galaxy Note 10 Lite có thiết kế màn hình Infinity-O với màn hình lớn nhưng kiểu dáng bên ngoài vẫn thon gọn bởi các cạnh viền bezel đều siêu mỏng\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/02/tren-tay-Galaxy-Note-10-Lite-2.jpg\" /></strong></p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh</strong></p>\r\n\r\n<p>Kế thừa nhiều ưu điểm từ flagship Samsung, Galaxy Note 10 Lite sở hữu thiết kế m&agrave;n h&igrave;nh Infinity-O&nbsp; 6,7&rdquo; sang trọng. Galaxy Note 10 Lite sẽ c&oacute; thiết kế m&agrave;n h&igrave;nh phẳng thay v&igrave; m&agrave;n h&igrave;nh cong bởi đ&acirc;y l&agrave; phi&ecirc;n bản Lite. Phần khung viền m&aacute;y được l&agrave;m bằng chất liệu kim loại, v&agrave; mặt lưng l&agrave;m từ nhựa, mang lại cho người d&ugrave;ng cảm gi&aacute;c cầm nắm chắn chắn.</p>\r\n\r\n<p><strong>Cấu h&igrave;nh mạnh trong tầm gi&aacute;</strong></p>\r\n\r\n<p><strong><img alt=\"Màn hình Galaxy Note 10 Lite hỗ trợ công nghệ HDR giúp hiển thị nội dung trên YouTube với màu sắc rực rỡ và sống động hơn\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/02/tren-tay-Galaxy-Note-10-Lite-5.jpg\" /></strong></p>\r\n\r\n<p>Galaxy Note 10 Lite cũng trang bị cấu h&igrave;nh mạnh mẽ, bao gồm vi xử l&yacute; Exynos 9810, RAM 8GB, bộ nhớ trong 128GB, chạy hệ điều h&agrave;nh Android 10 với giao diện t&ugrave;y biến One UI 2.0 mới nhất được Samsung tối ưu...&nbsp;</p>\r\n\r\n<p>&nbsp;Ngo&agrave;i ra, Note 10 Lite cũng được trang bị b&uacute;t S-Pen với đầy đủ c&aacute;c t&iacute;nh năng tương tự như Note 10, vi&ecirc;n pin vi&ecirc;n pin dung lượng lớn 4.500 mAh v&agrave; hỗ trợ sạc nhanh tối đa 25W. M&aacute;y vẫn được t&iacute;ch hợp jack tai nghe 3.5mm</p>\r\n', 0, 0, 1607311718, 0),
(48, 1, 4, 'Vivo V20', '/07-12-2020/961238900.jpeg', '/07-12-2020/anh-beo-v20.jpg', 8490000, 0, 1, 0, '<h3>Đ&aacute;nh gi&aacute; nhanh Vivo V20:&nbsp; Về thiết kế v&agrave; m&agrave;n h&igrave;nh</h3>\r\n\r\n<p>Cảm nhận đầu ti&ecirc;n khi cầm chiếc Vivo V20 tr&ecirc;n tay l&agrave; m&aacute;y rất mỏng v&agrave; nhẹ. Vivo đ&atilde; l&agrave;m rất tốt việc sử dụng c&aacute;c linh kiện b&ecirc;n trong để đem đến một chiếc smartphone mỏng 7,38mm v&agrave; nặng 171 gram. Đ&acirc;y l&agrave; chiếc điện thoại mỏng nhất của h&atilde;ng hiện nay với c&aacute;c đường cong mềm mại gi&uacute;p đem đến sự thoải m&aacute;i cho người d&ugrave;ng khi sử dụng.</p>\r\n\r\n<p><img alt=\"Thay vì sử dụng chất liệu nhựa, mặt lưng máy đã được làm từ kính mờ giúp tăng thêm tính thẩm mỹ và hạn chế bám vân tay, bám bẩn lên máy\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/10/danh-gia-nhanh-vivo-v20-8.jpg\" /></p>\r\n\r\n<p><em>Thay v&igrave; sử dụng chất liệu nhựa, mặt lưng m&aacute;y đ&atilde; được l&agrave;m từ k&iacute;nh mờ gi&uacute;p tăng th&ecirc;m t&iacute;nh thẩm mỹ v&agrave; hạn chế b&aacute;m v&acirc;n tay, b&aacute;m bẩn l&ecirc;n m&aacute;y</em></p>\r\n\r\n<p>Vivo V20 l&agrave; một chiếc smartphone sở hữu ngoại h&igrave;nh cuốn h&uacute;t v&agrave; rất cao cấp d&ugrave; chỉ ở ph&acirc;n kh&uacute;c tầm trung. Thay v&igrave; sử dụng chất liệu nhựa, mặt lưng m&aacute;y đ&atilde; được l&agrave;m từ k&iacute;nh mờ gi&uacute;p tăng th&ecirc;m t&iacute;nh thẩm mỹ v&agrave; hạn chế b&aacute;m v&acirc;n tay, b&aacute;m bẩn l&ecirc;n m&aacute;y. Chưa hết, Vivo c&ograve;n sử dụng th&ecirc;m hiệu ứng chuyển m&agrave;u đẹp mắt gi&uacute;p tạo ra những m&agrave;u sắc kh&aacute;c nhau dưới c&aacute;c g&oacute;c nh&igrave;n kh&aacute;c nhau. Theo đ&aacute;nh gi&aacute; nhanh Vivo V20 của ch&uacute;ng t&ocirc;i, thiết kế n&agrave;y gi&uacute;p cho m&aacute;y lu&ocirc;n được biến h&oacute;a linh hoạt v&agrave; kh&ocirc;ng l&agrave;m người d&ugrave;ng cảm thấy nh&agrave;m ch&aacute;n khi sử dụng.</p>\r\n\r\n<p><img alt=\"Vivo V20 phiên bản màu đen Giai Điệu Hoàng Hôn\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/10/danh-gia-nhanh-vivo-v20-2.jpg\" /></p>\r\n\r\n<p><em>Vivo V20 phi&ecirc;n bản m&agrave;u đen Giai Điệu Ho&agrave;ng H&ocirc;n</em></p>\r\n\r\n<p>Ngo&agrave;i ra, mặt lưng c&ograve;n rất nổi bật với cụm camera được thừa hưởng từ d&ograve;ng sản phẩm X50 cao cấp. Ba cảm biến được xếp th&agrave;nh h&igrave;nh tam gi&aacute;c trong một khung h&igrave;nh chữ nhật lớn tạo l&ecirc;n sự kh&aacute;c biệt so với đại đa số smartphone hiện nay. Tuy nhi&ecirc;n, nhược điểm của m&aacute;y l&agrave; vẫn sử dụng m&agrave;n nh&igrave;n giọt nước chứ kh&ocirc;ng phải m&agrave;n h&igrave;nh đục lỗ.</p>\r\n\r\n<p><img alt=\"Vivo V20 sở hữu màn hình 6.44 inch, sử dụng tấm nền Super AMOLED, độ phân giải full HD+\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/10/danh-gia-nhanh-vivo-v20-3.jpg\" /></p>\r\n\r\n<p><em>Vivo V20 sở hữu m&agrave;n h&igrave;nh 6.44 inch, sử dụng tấm nền Super AMOLED, độ ph&acirc;n giải full HD+</em></p>\r\n\r\n<p>Vivo V20 sở hữu m&agrave;n h&igrave;nh 6.44 inch, sử dụng tấm nền Super AMOLED, độ ph&acirc;n giải full HD+ cho chất lượng hiển thị rất tốt. H&igrave;nh ảnh chi tiết, sống động v&agrave; bắt mắt. Kết hợp th&ecirc;m viền bezel si&ecirc;u mỏng sẽ đem đến những trải nghiệm tốt nhất cho người d&ugrave;ng khi chơi game, xem phim hay lướt web.</p>\r\n\r\n<h3>Về camera</h3>\r\n\r\n<p>N&oacute;i đến hệ thống camera, camera trước l&agrave; điểm nhấn rất quan trọng. M&aacute;y được trang bị cảm biến selfie 44MP vượt trội hơn rất nhiều mẫu smartphone kh&aacute;c trong c&ugrave;ng ph&acirc;n kh&uacute;c. Với cảm biến n&agrave;y người d&ugrave;ng c&oacute; thể thỏa sức chụp ảnh tự sướng v&agrave; cho ra những bức ảnh lung linh v&agrave; sắc n&eacute;t.</p>\r\n\r\n<p><img alt=\"Camera selfie của Vivo V20 được tích hợp công nghệ AI giúp nâng cao chất lượng hình ảnh\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/10/danh-gia-nhanh-vivo-v20-9.jpg\" /></p>\r\n\r\n<p><em>Camera selfie của Vivo V20 được t&iacute;ch hợp c&ocirc;ng nghệ AI gi&uacute;p n&acirc;ng cao chất lượng h&igrave;nh ảnh</em></p>\r\n\r\n<p>Tuy nhi&ecirc;n, giới chuy&ecirc;n m&ocirc;n đ&aacute;nh gi&aacute; nhanh Vivo V20 cũng cho biết camera sau cũng ấn tượng kh&ocirc;ng k&eacute;m. M&aacute;y được trang bị 3 cảm biến bao gồm: cảm biến ch&iacute;nh 64MP khẩu độ f/1.89, cảm biến g&oacute;c si&ecirc;u rộng 8MP v&agrave; cảm biến macro 2MP. Chưa hết, Vivo c&ograve;n t&iacute;ch hợp rất nhiều t&iacute;nh năng chụp ảnh cao cấp cho V20 như: chụp đ&ecirc;m, chụp g&oacute;c rộng 120 độ, chụp si&ecirc;u n&eacute;t, chụp đen trắng, chụp ch&acirc;n dung,&hellip; Người d&ugrave;ng c&oacute; thể thỏa sức s&aacute;ng tạo khi chụp ảnh.</p>\r\n', 0, 0, 1607311986, 0),
(49, 1, 9, 'Realme C15 ', '/07-12-2020/1038885187.jpeg', '/07-12-2020/anh-beo-realme-c15.jpg', 4190000, 0, 1, 0, '<p><strong>L&agrave; smartphone gi&aacute; rẻ hiếm hoi c&oacute; cấu h&igrave;nh kh&aacute; ổn, Realme C15 đang l&agrave; một trong những smartphone ưu t&uacute; trong ph&acirc;n kh&uacute;c gi&aacute; khoảng hơn 2 triệu đồng tr&ecirc;n thị trường. C&ugrave;ng Viettel Store đ&aacute;nh gi&aacute; nhanh smartphone rất đ&aacute;ng mua n&agrave;y bạn nh&eacute;&hellip;</strong></p>\r\n\r\n<p><strong><img alt=\"Hộp đựng Realme C15\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/07/tren-tay-realme-C15-1.jpg\" /></strong></p>\r\n\r\n<p><strong>Thiết kế - M&agrave;n h&igrave;nh</strong></p>\r\n\r\n<p>Realme C15 được nh&agrave; sản xuất trang bị m&agrave;n h&igrave;nh 6.5 inch, HD+ 1600*720, tỷ lệ hiển thị m&agrave;n h&igrave;nh 88.7%. Realme C15 cho ph&eacute;p người d&ugrave;ng xem phim, chơi game hay thực hiện bất kỳ trải nghiệm t&aacute;c vụ n&agrave;o kh&aacute;c tr&ecirc;n một trải nghiệm m&agrave;n h&igrave;nh rất rộng. Kiểu thiết kế m&agrave;n h&igrave;nh giọt nước, chỉ giữ lại duy nhất phần notch rất nhỏ gọn để chứa camera selfie m&agrave; th&ocirc;i.</p>\r\n\r\n<p><img alt=\"Tiến hành mở hộp và trên tay Realme C15\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/07/tren-tay-realme-C15-2.jpg\" /></p>\r\n\r\n<p>&nbsp;Mặc d&ugrave; kh&ocirc;ng gian hiển thị h&igrave;nh ảnh được mở rộng nhưng vẫn giữ được k&iacute;ch thước tổng thể m&aacute;y gọn nhẹ gi&uacute;p m&aacute;y dễ cầm nắm tr&ecirc;n tay v&agrave; sử dụng thời gian d&agrave;i kh&ocirc;ng mỏi tay.</p>\r\n\r\n<p><strong>Cấu h&igrave;nh tốt so với mức gi&aacute;</strong></p>\r\n\r\n<p>&nbsp;L&agrave; smartphone gi&aacute; rẻ nhưng Realme C15 vẫn được nh&agrave; sản xuất ưu &aacute;i một ch&uacute;t cho trải nghiệm chơi Game. M&aacute;y được trang bị vi xử l&yacute; Qualcomm SDM460được tập trung cải thiện mạnh về hiệu năng, ưu h&oacute;a cho trải nghiệm chơi game. Ngo&agrave;i ra, m&aacute;y c&oacute; bộ nhớ RAM 4 GB, ROM 64 GB v&agrave; c&oacute; khe cắm mở rộng microSD hỗ trợ dung lượng tối đa 256 GB.</p>\r\n\r\n<p><img alt=\"Thiết kế mặt trước hình giọt nước chứa camera selfie bên trong\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/07/tren-tay-realme-C15-4.jpg\" /></p>\r\n\r\n<p>&nbsp;Điểm nhấn tr&ecirc;n Realme C15 ch&iacute;nh l&agrave; thỏi pin dung lượng l&ecirc;n tới 6.000 mAh, hỗ trợ sạc nhanh 18W. Realme C15 ho&agrave;n to&agrave;n đ&aacute;p ứng nhu cầu sử dụng của bạn l&ecirc;n tới hai ng&agrave;y d&agrave;i kh&ocirc;ng lo lắng bị &lsquo;&rsquo;sập nguồn&rsquo;&rsquo; như nhiều smartphone kh&aacute;c.</p>\r\n\r\n<p><img alt=\"Realme C15 sở hữu viên pin khủng 6.000 mAh\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/07/Realme-C15-ra-mat-4.jpg\" /></p>\r\n\r\n<p>&nbsp;C&oacute; gi&aacute; kh&aacute; rẻ nhưng Realme C3 vẫn được c&agrave;i sẵn Android 10 giao diện Realme UI trải nghiệm mượt m&agrave;. Bạn c&oacute; thể cảm thấy trải nghiệm vuốt kh&aacute; cao cấp như tr&ecirc;n hệ điều h&agrave;nh iOS.</p>\r\n', 0, 0, 1607312231, 0),
(50, 1, 2, 'Samsung Galaxy A71 ', '/07-12-2020/1923891225.jpeg', '/07-12-2020/A71-2.jpg', 7990000, 0, 1, 0, '<p><strong>Sở hữu thiết kế đặc trưng của smartphone &lsquo;&rsquo;nh&agrave; Samsung&rsquo;&rsquo;, Galaxy A71 đang l&agrave; smartphone ph&acirc;n kh&uacute;c 10 triệu, một ph&acirc;n kh&uacute;c &iacute;t kẻ cạnh tranh nhưng kh&aacute; mạo hiểm. C&ugrave;ng Viettel Store t&igrave;m hiểu về những điểm &lsquo;&rsquo;hay ho&rsquo;&rsquo; của Galaxy A71 trong b&agrave;i viết dưới đ&acirc;y nh&eacute;.</strong></p>\r\n\r\n<p><strong><img alt=\"Galaxy A71 trang bị camera selfie 32MP, tích hợp các tiện ích làm đẹp khuôn mặt với phiên bản mới nhất sẽ làm cho làn da người dùng trắng hồng tự nhiên hơn, phù hợp với tiêu chí chọn lựa của phái nữ\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/01/tren-tay-Galaxy-A71-11.jpg\" /></strong></p>\r\n\r\n<p>R&otilde; r&agrave;ng, Galaxy A71 sở hữu kiểu thiết kế đặc trưng kh&ocirc;ng hề dễ nhầm lẫn của c&aacute;c&nbsp;<strong><a href=\"https://viettelstore.vn/samsung\">smartphone Samsung</a></strong>. Cụ thể, người d&ugrave;ng sẽ c&oacute; một chiếc điện thoại với m&agrave;n h&igrave;nh lớn hơn một đi k&egrave;m với đ&oacute; l&agrave;&nbsp;<strong><a href=\"https://tintuc.viettelstore.vn/tren-tay-galaxy-a71-tien-phong-va-dot-pha-cung-nhung-tinh-nang-dinh-cao.html\">thiết kế Infinity-O</a></strong>&nbsp;c&ugrave;ng viền m&agrave;n h&igrave;nh kh&aacute; mỏng, gi&uacute;p tăng trải nghiệm v&agrave; tối ưu ho&aacute; kh&ocirc;ng gian hiển thị.</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh</strong></p>\r\n\r\n<p>Galaxy A71 sở hữu m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước 6.7 inch, tỷ lệ 20:9. Tỷ lệ n&agrave;y rất chuẩn khi xem film full m&agrave;n h&igrave;nh theo chiều ngang. Ngo&agrave;i ra, m&aacute;y được trang bị m&agrave;n h&igrave;nh &lsquo;&rsquo;c&acirc;y nh&agrave; l&aacute; vườn&rsquo;&rsquo;&nbsp;<strong><a href=\"https://tintuc.viettelstore.vn/man-hinh-super-amoled-va-man-hinh-vo-cuc-giong-va-khac-nhau-diem-nao.html\">Super AMOLED</a></strong>&nbsp;độ ph&acirc;n giải&nbsp;<strong><a href=\"https://tintuc.viettelstore.vn/man-hinh-full-hd-la-gi.html\">Full HD+</a></strong>. Như vậy, mật độ điểm ảnh rơi v&agrave;o khoảng 393 ppi. N&oacute; vẫn đảm bảo được độ sắc n&eacute;t cho h&igrave;nh ảnh, c&ograve;n m&agrave;u sắc th&igrave; cực k&yacute; tuyệt vời.</p>\r\n\r\n<p><img alt=\"Màn hình Galaxy A71 có kích thước 6.7 inch cho không gian hiển thị nội dung rộng lớn gần tương tự máy tính bảng\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/01/tren-tay-Galaxy-A71-5.jpg\" /></p>\r\n\r\n<p>Trang bị vi&ecirc;n pin kh&aacute; khủng, l&ecirc;n tới 4500 mAh n&ecirc;n bạn c&oacute; thể sử dụng thiết bị khoảng một ng&agrave;y rưỡi. Hơn nữa, c&ocirc;ng nghệ sạc nhanh cũng được n&acirc;ng cấp, c&ocirc;ng sất tăng đến 25W. Bỏ ra 10 ph&uacute;t sạc, đổi lại l&agrave; 3 giờ li&ecirc;n lạc, xem phim hoặc nghe nhạc đến 10 giờ.</p>\r\n\r\n<ul>\r\n	<li>Tham khảo:&nbsp;<strong><a href=\"https://tintuc.viettelstore.vn/bo-bi-kip-sieu-chuan-giup-ban-luon-thoa-man-khi-dung-galaxy-a71.html\">Bộ b&iacute; k&iacute;p si&ecirc;u chuẩn gi&uacute;p bạn lu&ocirc;n thoả m&atilde;n khi d&ugrave;ng Galaxy A71</a></strong></li>\r\n</ul>\r\n\r\n<p><strong>Cấu h&igrave;nh</strong></p>\r\n\r\n<p>Về cấu h&igrave;nh, Galaxy A71 sử dụng vi xử l&yacute; Snapdragon 730, 8GB RAM v&agrave; 128GB bộ nhớ trong, c&oacute; khe cắm thẻ nhớ ngo&agrave;i tối đa 512GB. Với c&ocirc;ng nghệ sạc nhanh, Samsung tuy&ecirc;n bố chỉ cần 10 ph&uacute;t sạc pin, A71 c&oacute; thể cung cấp 3 giờ li&ecirc;n lạc, 3 giờ xem phim v&agrave; hơn 10 giờ nghe nhạc.</p>\r\n\r\n<p><img alt=\"Ngoài ưu điểm về màn hình, Galaxy A71 còn có hiệu năng mạnh mẽ sẽ đáp ứng tốt những dòng game đòi hỏi cấu hình cao hiện nay\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/01/tren-tay-Galaxy-A71-6.jpg\" /></p>\r\n\r\n<p>Theo trải nghiệm, c&aacute;c t&aacute;c vụ sử dụng b&igrave;nh thường, m&aacute;y c&oacute; thể d&ugrave;ng được tới 2 ng&agrave;y liền m&agrave; kh&ocirc;ng cần phải sạc pin. Kể cả c&oacute; cần sạc pin, m&aacute;y cũng sẽ c&oacute; thời gian sạc si&ecirc;u tốc với củ sạc 25W đi k&egrave;m, bạn ho&agrave;n to&agrave;n c&oacute; thể y&ecirc;n t&acirc;m về c&ocirc;ng nghệ sạc nhanh si&ecirc;u tốc n&agrave;y.</p>\r\n', 0, 0, 1607312474, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `screen` varchar(100) NOT NULL,
  `operating_system` varchar(50) NOT NULL,
  `rear_camera` varchar(100) NOT NULL,
  `front_camera` varchar(50) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `internal_memory` varchar(20) NOT NULL,
  `memory_stick` varchar(50) NOT NULL,
  `sim` varchar(50) NOT NULL,
  `battery_capacity` varchar(50) NOT NULL,
  `port_connect` varchar(50) NOT NULL,
  `conversation` varchar(50) NOT NULL,
  `graphic_card` varchar(100) NOT NULL,
  `design` varchar(50) NOT NULL,
  `size` varchar(100) NOT NULL,
  `launch_time` int(11) NOT NULL DEFAULT 0,
  `face_diameter` varchar(25) NOT NULL,
  `face_material` varchar(100) NOT NULL,
  `frame_material` varchar(100) NOT NULL,
  `wire_material` varchar(25) NOT NULL,
  `wire_width` varchar(10) NOT NULL,
  `utilities` varchar(100) NOT NULL,
  `waterproof` varchar(100) NOT NULL,
  `battery_life_time` varchar(50) NOT NULL,
  `object_use` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `screen`, `operating_system`, `rear_camera`, `front_camera`, `cpu`, `ram`, `internal_memory`, `memory_stick`, `sim`, `battery_capacity`, `port_connect`, `conversation`, `graphic_card`, `design`, `size`, `launch_time`, `face_diameter`, `face_material`, `frame_material`, `wire_material`, `wire_width`, `utilities`, `waterproof`, `battery_life_time`, `object_use`) VALUES
(1, '	OLED; 6.7', 'iOS 14', '	3 camera 12 MP; FullHD 1080p@30fps, 4K 2160p@30fps, HD 720p@30fps; Đèn LED kép; Ban đêm (Night Mode', '12 MP; Xoá phông, Nhãn dán (AR Stickers), Retina F', 'Apple A14 Bionic', '', '	128GB', '', '1 Nano SIM & 1 eSIM', 'Li-Ion; Tiết kiệm pin, Sạc không dây, Sạc pin nhan', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(2, '	IPS LCD, 6.1', '	iOS 13', '	Chính 12 MP & Phụ 12 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '	4 GB', '	64 GB', 'không', 'Nano SIM & eSIM, Hỗ trợ 4G', '	3110 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(3, '	IPS LCD 6.1 inch 1792 x 828 pixel', '	IOS 12', '12 MP', '	7 MP', '	Apple A12 Bionic 6 nhân', '	3 GB', '	64 GB', '', '	Nano Sim and eSim', '	2942 mah. Có sạc nhanh, 50% trong 30 phút. Sạc pi', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(4, '	Super Retina XDR display 6.1‑inch (diagonal) all‑screen OLED display 2532‑by‑1170-pixel resolution ', '	iOS 14', '	3 camera 12 MP; FullHD 1080p@30fps, 4K 2160p@30fps, HD 720p@30fps; Đèn LED kép; Ban đêm (Night Mode', '	12 MP; Xoá phông, Nhãn dán (AR Stickers), Retina ', '	Apple A14 Bionic 6 nhân', '	Apple GPU 6 nhân', '128GB', '', '	1 Nano SIM & 1 eSIM', '	Li-Ion; Tiết kiệm pin, Sạc không dây, Sạc pin nha', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(5, '	OLED; 6.7', 'iOS 14', '3 camera 12 MP; FullHD 1080p@30fps, 4K 2160p@30fps, HD 720p@30fps; Đèn LED kép; Ban đêm (Night Mode)', '12 MP; Xoá phông, Nhãn dán (AR Stickers), Retina F', 'Apple A14 Bionic', '	Apple GPU 6 nhân', '256GB', '', '1 Nano SIM & 1 eSIM', 'Li-Ion; Tiết kiệm pin, Sạc không dây, Sạc pin nhan', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(6, '	6.5 inches, FHD+', 'Android 10', '48MP, 5MP, 12MP, 5MP (4 camera)', '	32 MP', 'Exynos 9611, 8, Octa-core (4x2.3 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)', '6 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', 'Nano SIM, 2 Sim', '4000mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(7, '	IPS LCD, 6.55\", HD+', 'Android 10', 'Chính 13 MP & Phụ 5 MP, 2 MP, 2 MP', '8 MP', 'Snapdragon 665 8 nhân', '3 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(8, '	1.5\", QCIF, 128 x 128 pixels', 'Không', 'Không', 'Không', 'Không', 'Không', '32 MB', '32 MB', '	1 SIM, Sim thường', 'Li-Ion, 800 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(9, '6.1 inches, Liquid Retina HD', 'iOS 13', 'Chính 12 MP & Phụ 12 MP', '12 MP', 'Apple A13 Bionic', '4 GB', '128 GB', 'không', 'Nano SIM & eSIM, có hỗ trợ 4G', '3110 mAh- Pin chuẩn Li-Ion', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(10, 'Super AMOLED Plus, 6.7', 'Android 10', 'Chính 12 MP & Phụ 64 MP, 12 MP', '10 MP', 'Exynos 990 8 nhân', '8GB', '256GB', 'không', '2 Nano SIM HOẶC 1 Nano SIM + 1 eSIM, Hỗ trợ 4G', 'Pin chuẩn Li-Ion; 4300 mAh; Tiết kiệm pin, Siêu ti', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(11, '6.53 inches, 1080 x 2340 Pixels', 'Android 9', '16MP, 8MP, 2MP (3 camera)', '16.0 MP', 'MediaTek MT6768 8 nhân (Helio P65)', '6 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', 'Nano SIM, 3 ( 2 sim nano và 1 thẻ nhớ micro SD)', '5000mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(12, 'Dynamic AMOLED 2X, 6.9\", Quad HD+ (2K+)', 'Android 10', 'Chính 108 MP & phụ 48 MP, 12 MP, TOF 3D', '40 MP', 'Exynos 990 8 nhân', '12 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 1 TB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '5000 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(13, 'Dynamic AMOLED 2X, 6.7\", Quad HD+ (2K+)', 'Android 10', 'Chính 64 MP & phụ 12 MP, 12 MP, TOF 3D', '10 MP', 'Exynos 990 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 1 TB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4500 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(14, 'AMOLED, 6.39\", Full HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP', '16 MP', 'MediaTek Helio P60 8 nhân', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4020 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(15, '6.5 inchs, 720 x 1560 Pixels', 'Android 10.0', '12Mp + 2Mp + 2Mp', '5.0 MP', 'Mediatek Helio G70, 8, 2x2.0 GHz Cortex-A75 & 6x1.7 GHz Cortex-A55', '3 GB', '32 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '1 Micro SIM, 1 Nano SIM', '5000 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(16, 'AMOLED', 'ColorOS 7, nền tảng Android 10', '48 MP + 13 MP + 8 MP + 2 MP, 4 camera', '44 MP', 'Helio P90 8 nhân, tối đa 2.2GHz', '8GB', '128GB', 'Hỗ trợ thẻ nhớ tối đa 256GB', 'Dual nano-SIM + 1 thẻ nhớ', '4025mAh (Typ)', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(17, '6.53 inchs, Full HD +, 1080 x 2340 Pixels', 'Android 10.0 (MIUI 11)', 'Chính 48MP và Phụ 8MP + 2MP + 2MP', '13.0 MP', 'MediaTek Helio G85, 8, 2.0Ghz', '4 GB', '128 GB', '	Micro SD, 512 GB', 'Nano SIM, 2 Sim', '5020 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(18, '6.67 inchs, Full HD +, 1080 x 2400 Pixels', 'Android 10.0 (MIUI 11)', 'Chính 64 MP & Phụ 8 MP, 5 MP, 2 MP', '16.0 MP', 'Snapdragon Qualcomm 720G (8nm), 8, 2.3Ghz', '6 GB', '128 GB', 'Micro SD, 512 GB', 'Nano SIM, 2 Sim', '5020 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(19, 'IPS LCD, 6.5\", HD+', 'Android 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'MediaTek Helio G80 8 nhân', '4 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(20, '6.5 inchs, 720 x 1520 Pixels', 'Android 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '13.0 MP', '(Octa 2.0GHz), Đang cập nhật, Exynos 850', '3 GB', '32 GB', 'Micro SD', 'Có', '5000 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(21, 'TFT-LCD, 6.5 inch, màn hình chấm O, Full HD+', 'ColorOS 7.1, nền tảng Android 10', '48 MP + 8 MP + 2 MP + 2 MP, 4 camera', '16 MP', 'Qualcomm® SnapdragonTM 665 8 nhân, tối đa 2.0GHz', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '5000mAh (Typ)', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(22, 'TFT, FWVGA, 262k, 176 * 220, 2.2 inches, 2.5D', 'không', '0.08MP', 'không', 'MTK6261D', '32Mb', '32Mb', 'Micro SD 16GB', '2 Sim thường', '1400mAh Lithium', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(23, 'QQVGA; 262K; 128*160; 1.77”, QQVGA, màn hình ngang', 'không', '0.08 MP', 'không', 'SC6531E', '32MB', '32Mb', '	16GB', '2 Micro SIM', '800mAh, Li-ion', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(24, '1.77\" QQVGA', 'không', '0.08MP', 'không', 'SC6531E', '4MB', '4MB', 'không', 'co', '1000mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(25, '	1.8 inches', 'không', 'không', 'không', 'không', 'không', 'không', 'không', 'co', '	1000mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(26, 'IPS LCD, 4.7\", Retina', 'iOS 13', '12 MP', '7 MP', 'Apple A13 Bionic 6 nhân', '3 GB', '128 GB', 'không', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '1821 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(27, 'LED-backlit IPS LCD, Full HD (1080 x 1920 Pixels), 5.5\", Kính cường lực oleophobic (ion cường lực)', 'iOS 13', 'Chính 12 MP & Phụ 12 MP', '7.0 MP', 'Apple A11 Bionic 6 nhân', '3 GB', '128 GB', 'không', '1 sim Nano', '2691 mAh, Pin chuẩn Li-Ion, Tiết kiệm pin, Sạc pin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(28, 'OLED; Super Retina XDR display; 1170 x 2532 Pixels; 6.1\"', 'iOS 14', '2 camera 12 MP; FullHD 1080p@30fps, 4K 2160p@24fps, 4K 2160p@30fps, 4K 2160p@60fps, FullHD 1080p@120', '12 MP; Xoá phông, Quay phim 4K, Nhãn dán (AR Stick', 'Apple A14 Bionic 6 nhân', 'Apple GPU 6 nhân', '128GB', 'không', '1 Nano SIM & 1 eSIM', '	Li-Ion; Sạc không dây MagSafe, Tiết kiệm pin, Sạc', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(29, 'SUPER AMOLED, 90GHz, Gorilla Glass 5, 1080 x 2400 (FHD+), 16 triệu màu, 6.5 inch, màn hình đục lỗ', 'ColorOS 7.2 based on Android 10', '48 MP (IMX586) + 8 MP + 2 MP + 2 MP, 4 camera; F/1.7 + F/2.2 + F/2.4 + F/2.4', '32 MP (IMX616), F/2.4', 'ColorOS 7.2, nền tảng Android 10; Qualcomm Snapdragon 720G, tối đa 2.3GHz; Adreno 618', '8GB', '256GB', 'MicroSD, hỗ trợ tối đa 256GB', 'Dual nano-SIM + 1 thẻ nhớ, Hỗ trợ 4G', '4000 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(30, '6.22 inch, 1520×720 (HD+), LCD, Cảm ứng điện dung đa điểm', 'Funtouch OS_10.5 (Dựa trên Android 10)', '13MP', '5MP', 'MT6765', '2GB', '32GB', '', '2 sim', '4030mAh (TYP)', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(31, '6.5 inches, 1080 x 2340 Pixels', 'ColorOS 6.0.1, nền tảng Android 9.0', '48 MP, 8 MP + 2MP + 2MP ( 4 camera )', '16.0 MP', 'Mediatek MT6771V Helio P70 2.1 GHz', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(32, '6.5 inches, 720 x 1600 Pixels', 'ColorOS 6.0.1, nền tảng Android 9.0', '12 MP, 8 MP, 2 MP và 2 MP (4 camera)', '8.0 MP', 'Qualcomm® SnapdragonTM 665, 8, 2.0 GHz', '4 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', 'Dual nano-SIM', '5000 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(33, 'AMOLED 60Hz, Gorilla Glass 3+', 'ColorOS 7.2, nền tảng Android 10', '48 MP (GM1ST) + 8 MP + 2 MP + 2 MP, 4 camera', '16 MP (IMX471) + 2 MP', 'Helio P95, tối đa 2.2GHz', '8GB', '128GB', 'Hỗ trợ thẻ nhớ tối đa 256GB', 'Dual nano-SIM + 1 thẻ nhớ', '4000mAh (Typ) - 18W', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(34, '6.5” HD+ 20:9 1600 x 720', 'Android 10 - sẵn sàng cho Android 11', '13MP & 2MP', '5 MP', 'MediaTek Helio P22', '2 GB', '32 GB; MicroSD, hỗ t', 'co', '2 sim nano', '4500mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(35, '6.81\"FHD+ 20:9 1080*2400 pixcel / PureDisplay', 'Android 10', 'Sau: Ống kính ZEISS 64MP f/1.89 + Góc siêu rộng (UW) 12MP f/2.2, 120° FOV, AF, 1.4µm (2.8µm ở chế độ', 'Trước: ống kính ZEISS 24MP f/2.0', 'Qualcomm® Snapdragon™ 765G', '', 'RAM/ROM: 8/128GB2 | ', '', '2 SIM nano', '4500mAh, không thể tháo rời', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(36, '2.4” 240x320 QVGA TFT', 'KaiOS', 'QVGA', 'VGA', 'Dual Core1.3 GH', '512 MB', '4 GB', '	32 GB', '2 SIM thường, sim 4G', '1900mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(37, 'IPS LCD, 6.6\", Full HD+', 'Android 10', '	Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', '	Chính 16 MP & Phụ 8 MP', 'Snapdragon 720G 8 nhân', '8 GB', '	128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '4300 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(38, 'LCD - tần số quét 90Hz; HD+ 1600*720, tỷ lệ hiển thị màn hình 90%; 6.5 inch; Corning Gorilla Glass 3', 'Android 10', 'Camera chính: 13MP + f/2.2 Camera góc rộng: 8MP + f/2.2 Camera macro: 2MP + f/2.4 Camera mono: 2MP +', '	8MP + f/2.0; Videocall Hỗ trợ gọi điện thoại vide', 'Qualcomm SDM460; 8 nhân, xung nhịp lên đến 1.8GHz; Adreno 610', '	6GB', '128GB', 'Micro SD tối đa 256GB', '	Dual-SIM (Nano SIM)', '	Li-po; 5000mAh; Sạc nhanh 18W', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(39, '	6.4 inches, 1080 x 2340 Pixels', 'ColorOS 6.1, nền tảng Android 9.0', '64 MP, 8 MP, 2 MP, 2 MP', '16.0 MP', 'Qualcomm Snapdragon 712 AIE, 8, 2.3GHZ', '8 GB', '	128 GB', '	MicroSD, hỗ trợ tối đa 256 GB', 'Nano SIM, 2 ( Sim 2 có thể dùng Sim hoặc thẻ nhớ n', '4000mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(40, 'Chính: Dynamic AMOLED, phụ: Super AMOLED, Chính 7.59\" & Phụ 6.23\", Full HD+', 'Android 10', '	Chính 12 MP & Phụ 12 MP, 12 MP', '10 MP', 'Snapdragon 865+ 8 nhân', '12 GB', '	256 GB', 'không', '1 Nano SIM, Hỗ trợ 5G', '	Pin chuẩn Li-Po; 4500 mAh, Tiết kiệm pin, Siêu ti', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(41, 'Dynamic AMOLED 2X, 6.9', '	Android 10', '	Chính 108 MP & Phụ 12 MP, 12 MP, cảm biến Laser AF', '	10 MP', '	Exynos 990 8 nhân', '12GB', '256GB', 'không', '	2 Nano SIM HOẶC 1 Nano SIM + 1 eSIM, Hỗ trợ 4G', '	Pin chuẩn Li-Ion; 4500 mAh; Tiết kiệm pin, Siêu t', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(42, '	Infinity - O Dynamic AMOLED, 6.4 inch, Quad HD+ (2K+)', 'Android 9.0 (Pie)', '	12 MP, 12 MP, 16 MP (3 camera)', '	10 MP, 8 MP (Camera kép)', '	Exynos 9820 8 nhân 64 bit', '	8 GB', '128 GB', '	MicroSD, hỗ trợ tối đa 512 GB', '	2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '	4100 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(43, '	OLED; 6.7\", Super Retina XDR display; 2778-by-1284-pixel resolution at 458 ppi', '	iOS 14', '3 camera 12 MP; FullHD 1080p@30fps, 4K 2160p@30fps, HD 720p@30fps; Đèn LED kép; Ban đêm (Night Mode)', '	12 MP; Xoá phông, Nhãn dán (AR Stickers), Retina ', 'Apple A14 Bionic', 'Apple GPU 6 nhân', '	512GB', 'không', '	1 Nano SIM & 1 eSIM', 'Li-Ion; Tiết kiệm pin, Sạc không dây, Sạc pin nhan', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(44, 'Chính: Dynamic AMOLED, phụ: Super AMOLED, 6.7\", Quad HD (2K)', 'Android 10', '	Chính 12 MP & Phụ 12 MP', '	10 MP', '	Snapdragon 855+ 8 nhân', '	8 GB', '256GB', 'Không', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '3300 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(45, '6.5 inches, FHD+', 'Android 10', '	48MP, 5MP, 12MP, 5MP (4 camera)', '32 MB', '	Exynos 9611, 8, Octa-core (4x2.3 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)', '6 GB', '128 GB', '	MicroSD, hỗ trợ tối đa 512 GB', '	Nano SIM, 2 Sim', '	4000mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(46, 'IPS LCD; Full HD+ (1080 x 2400 Pixels); 6.67\"; ', 'Android 10', 'Chính 64 MP & Phụ 13 MP, 2 MP, 2 MP', '	20 MP', 'Snapdragon 732G 8 nhân; 2 nhân 2.3 Ghz & 6 nhân 1.8 Ghz; Adreno 618', '6 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '5160 mAh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(47, '6.7 inchs, Full HD +, 1080 x 2280 Pixels', 'Android 10', 'Chính 12 MP và Phụ 12 MP,12 MP', '32 MB', '4 nhân 2.7 GHz & 4 nhân 1.7 GHz,', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G', '4500 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(48, '6.44 inch; 2400×1080 (FHD+)', 'Funtouch OS 11 (dựa trên Android 11)', '64MP AF + 8MP A', '44 MP', 'Qualcomm® Snapdragon™ 720G', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '4200 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(49, 'LCD, HD+ 1600*720', 'Android 10', '13MP, 8MP, 2MP, 2MP', '8MP ', 'Qualcomm SDM460, 8 nhân,', '4 GB', '64 GB', 'Micro SD, 256 GB', 'Dual-SIM (Nano SIM)', '6000mAh, Sạc nhanh 18W', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', ''),
(50, 'Super AMOLED, 6.7\", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 12 MP, 5 MP, 5 MP', '32 MB', '2 nhân 2.2 GHz & 6 nhân 1.8 GHz', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G', '4500 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trademarks`
--

CREATE TABLE `trademarks` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `path` varchar(100) NOT NULL,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trademarks`
--

INSERT INTO `trademarks` (`id`, `category_id`, `name`, `path`, `created_time`, `updated_time`) VALUES
(1, 1, 'iPhone', '/28-11-2020/iPhone-(Apple)42-b_16 (1).jpg', 1606532648, 0),
(2, 1, 'Samsung', '/28-11-2020/Samsung42-b_25.jpg', 1606532846, 0),
(3, 1, 'Oppo', '/28-11-2020/OPPO42-b_27.png', 1606547706, 0),
(4, 1, 'Vivo', '/28-11-2020/Vivo42-b_50.jpg', 1606547745, 0),
(5, 1, 'Nokia', '/28-11-2020/Nokia42-b_21.jpg', 1606547804, 0),
(6, 1, 'Viettel', '/28-11-2020/viettel.png', 1606547859, 0),
(7, 1, 'Vsmart', '/28-11-2020/Vsmart42-b_40.png', 1606547911, 0),
(8, 1, 'Energizer', '/28-11-2020/Energizer42-b_32.jpg', 1606547949, 0),
(9, 1, 'Realme', '/28-11-2020/Realme42-b_37.png', 1606548018, 0),
(10, 1, 'Xiaomi', '/28-11-2020/Xiaomi42-b_45.jpg', 1606548041, 0),
(11, 1, 'Masstel', '/28-11-2020/Masstel42-b_0.png', 1606548060, 0),
(12, 1, 'Itel', '/28-11-2020/Itel42-b_54.jpg', 1606548094, 0),
(13, 1, 'Wiko', '/28-11-2020/wiko.png', 1606548144, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `active` bit(1) NOT NULL DEFAULT b'0',
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `avatar`, `email`, `phone`, `address`, `status`, `active`, `created_time`, `updated_time`) VALUES
(1, 'admin', '$2y$10$5ahjK0sgY.7zAA8TGG.cLOz.ci5Z2DId926RmNWrFvRFu9KJlBikq', 'Admin Nguyen', 'avatar-1.jpg', 'Admin01@gmail.com', '0979081574', 'Số 13 Thanh Vinh 8, Đà Nẵng', b'1', b'1', 1602861151, 1602861151);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `custumers`
--
ALTER TABLE `custumers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `evaluates`
--
ALTER TABLE `evaluates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id__ibfk1` (`product_id`),
  ADD KEY `custumer_idfk_1` (`custumer_id`);

--
-- Chỉ mục cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id__ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order__idfk_1` (`order_id`),
  ADD KEY `product_idfk_3` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trademark__idfk_1` (`trademark_id`),
  ADD KEY `category_idfk_2` (`category_id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category__ibfk_1` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `custumers`
--
ALTER TABLE `custumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `evaluates`
--
ALTER TABLE `evaluates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `evaluates`
--
ALTER TABLE `evaluates`
  ADD CONSTRAINT `custumer_idfk_1` FOREIGN KEY (`custumer_id`) REFERENCES `custumers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id__ibfk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `product_id__ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order__idfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_idfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_idfk_2` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trademark__idfk_1` FOREIGN KEY (`trademark_id`) REFERENCES `trademarks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  ADD CONSTRAINT `category__ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
