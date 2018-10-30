-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 08:24 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `audio_name` varchar(120) NOT NULL,
  `original_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(220) NOT NULL,
  `category_image` varchar(120) NOT NULL,
  `category_image_title` varchar(225) NOT NULL,
  `template_num` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`, `category_image_title`, `template_num`, `created_by`) VALUES
(1, 'Alphabets', '282876554345.png', '282876554352.png', 1, 1),
(2, 'NUMBERS', '282876554348.png', '282876554355.png', 1, 1),
(3, 'Colors', '282876554346.png', '282876554353.png', 1, 1),
(4, 'Facial Expression', '282876554347.png', '282876554354.png', 1, 1),
(5, 'ACTION WORDS', '282876554344.png', '282876554351.png', 1, 1),
(6, 'SHAPES', '282876554349.png', '282876554356.png', 1, 1),
(8, 'Example', '282876554345.png', '282876554352.png', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `user_id`) VALUES
(1, 'admin', 'Administrator', 1),
(2, 'student', 'General User', 1),
(15, 'Grade 1', 'Grade 1', 24),
(16, 'Grade 2', 'Grade 2', 31),
(17, 'GRADE 1', 'Grade 1', 33);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_name` varchar(120) NOT NULL,
  `original_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `img_name`, `original_name`) VALUES
(1, 1, '282876554344.png', 'action words.png'),
(2, 1, '282876554345.png', 'alphabets.png'),
(3, 1, '282876554346.png', 'colors.png'),
(4, 1, '282876554347.png', 'expression.png'),
(5, 1, '282876554348.png', 'numbers.png'),
(6, 1, '282876554349.png', 'shapes.png'),
(7, 1, '282876554351.png', 'action words.png'),
(8, 1, '282876554352.png', 'alphabets.png'),
(9, 1, '282876554353.png', 'colors.png'),
(10, 1, '282876554354.png', 'facial expression.png'),
(11, 1, '282876554355.png', 'numbers.png'),
(12, 1, '282876554356.png', 'shapes.png'),
(13, 1, '282876741139.png', 'letter n.png'),
(14, 1, '282876741140.png', 'letter A.png'),
(15, 1, '282876741141.png', 'letter b.png'),
(16, 1, '282876741142.png', 'letter c.png'),
(17, 1, '282876741143.png', 'letter d.png'),
(18, 1, '282876741145.png', 'letter e.png'),
(19, 1, '282876741146.png', 'letter f.png'),
(20, 1, '282876741147.png', 'letter g.png'),
(21, 1, '282876741148.png', 'letter h.png'),
(22, 1, '282876741149.png', 'letter i.png'),
(23, 1, '282876741150.png', 'letter j.png'),
(24, 1, '282876741151.png', 'letter k.png'),
(25, 1, '282876741153.png', 'letter l.png'),
(26, 1, '282876741154.png', 'letter m.png'),
(27, 1, '282876751211.png', 'letter w.png'),
(28, 1, '282876751212.png', 'letter x.png'),
(29, 1, '282876751213.png', 'letter y.png'),
(30, 1, '282876751214.png', 'letter z.png'),
(31, 1, '282876751215.png', 'letter o.png'),
(32, 1, '282876751216.png', 'letter p.png'),
(33, 1, '282876751217.png', 'letter q.png'),
(34, 1, '282876751219.png', 'letter r.png'),
(35, 1, '282876751220.png', 'letter s.png'),
(36, 1, '282876751221.png', 'letter t.png'),
(37, 1, '282876751222.png', 'letter u.png'),
(38, 1, '282876751223.png', 'letter v.png'),
(39, 1, '282876771523.png', 'Ap.png'),
(40, 1, '282876771524.png', 'Bp.png'),
(41, 1, '282876771526.png', 'Cp.png'),
(42, 1, '282876771527.png', 'Dp.png'),
(43, 1, '282876771528.png', 'Ep.png'),
(44, 1, '282876771529.png', 'Fp.png'),
(45, 1, '282876771530.png', 'Gp.png'),
(46, 1, '282876771531.png', 'Hp.png'),
(47, 1, '282876771532.png', 'Ip.png'),
(48, 1, '282876771533.png', 'Jp.png'),
(49, 1, '282876771535.png', 'Kp.png'),
(50, 1, '282876771536.png', 'Lp.png'),
(51, 1, '282876771537.png', 'Mp.png'),
(52, 1, '282876771538.png', 'Np.png'),
(53, 1, '282876771539.png', 'Sp.png'),
(54, 1, '282876771540.png', 'Tp.png'),
(55, 1, '282876771541.png', 'Up.png'),
(56, 1, '282876771542.png', 'Vp.png'),
(57, 1, '282876771544.png', 'Wp.png'),
(58, 1, '282876771545.png', 'Xp.png'),
(59, 1, '282876771546.png', 'Yp.png'),
(60, 1, '282876771547.png', 'Zp.png'),
(61, 1, '282876771548.png', 'Op.png'),
(62, 1, '282876771549.png', 'Pp.png'),
(63, 1, '282876771550.png', 'Qp.png'),
(64, 1, '282876771552.png', 'Rp.png'),
(65, 1, '282876771604.png', 'aap.png'),
(66, 1, '282876771605.png', 'bbp.png'),
(67, 1, '282876771606.png', 'ccp.png'),
(68, 1, '282876771607.png', 'ddp.png'),
(69, 1, '282876771610.png', 'jjp.png'),
(70, 1, '282876771611.png', 'kkp.png'),
(71, 1, '282876771612.png', 'llp.png'),
(72, 1, '282876771613.png', 'mmp.png'),
(73, 1, '282876771614.png', 'nnp.png'),
(74, 1, '282876771616.png', 'oop.png'),
(75, 1, '282876771617.png', 'ppp.png'),
(76, 1, '282876771618.png', 'qqp.png'),
(77, 1, '282876771619.png', 'rrp.png'),
(78, 1, '282876781620.png', 'ssp.png'),
(79, 1, '282876781621.png', 'ttp.png'),
(80, 1, '282876781622.png', 'uup.png'),
(81, 1, '282876781623.png', 'vvp.png'),
(82, 1, '282876781701.png', 'wwp.png'),
(83, 1, '282876781702.png', 'xxp.png'),
(84, 1, '282876781703.png', 'yyp.png'),
(85, 1, '282876781705.png', 'zzp.png'),
(86, 1, '282876893326.png', 'alligator_v.png'),
(87, 1, '282876893327.png', 'angel_v.png'),
(88, 1, '282876893328.png', 'ant_v.png'),
(89, 1, '282876893329.png', 'apple_v.png'),
(90, 1, '282876893330.png', 'armchair_v.png'),
(91, 1, '282876893331.png', 'ball_v.png'),
(92, 1, '282876893333.png', 'banana_v.png'),
(93, 1, '282876893334.png', 'bird_v.png'),
(94, 1, '282876893335.png', 'boat_v.png'),
(95, 1, '282876903336.png', 'bread_v.png'),
(96, 1, '282876903337.png', 'carrot_v.png'),
(97, 1, '282876903338.png', 'cat_v.png'),
(98, 1, '282876903339.png', 'corn_v.png'),
(99, 1, '282876903341.png', 'cow_v.png'),
(100, 1, '282876903342.png', 'deer_v.png'),
(101, 1, '282876903343.png', 'dog_v.png'),
(102, 1, '282876903344.png', 'egg_v.png'),
(103, 1, '282876903345.png', 'eggplant_v.png'),
(104, 1, '282876903346.png', 'elephant_v.png'),
(105, 1, '282876903347.png', 'eyes_v.png'),
(106, 1, '282876903348.png', 'fan_v.png'),
(107, 1, '282876903350.png', 'fence_v.png'),
(108, 1, '282876903351.png', 'fire_v.png'),
(109, 1, '282876903353.png', 'igloo_v.png'),
(110, 1, '282876903354.png', 'island_v.png'),
(111, 1, '282876903355.png', 'jacket_v.png'),
(112, 1, '282876903357.png', 'jam_v.png'),
(113, 1, '282876903358.png', 'giraffe v.png'),
(114, 1, '282876903359.png', 'goat v.png'),
(115, 1, '282876903400.png', 'grapes v.png'),
(116, 1, '282876903401.png', 'hat_v.png'),
(117, 1, '282876903402.png', 'hay_v.png'),
(118, 1, '282876903403.png', 'honey_v.png'),
(119, 1, '282876903404.png', 'house_v.png'),
(120, 1, '282876903406.png', 'ice_v.png'),
(121, 1, '282876903407.png', 'icecream_v.png'),
(122, 1, '282876903408.png', 'kite_v.png'),
(123, 1, '282876903409.png', 'koala_v.png'),
(124, 1, '282876903410.png', 'leaf_v.png'),
(125, 1, '282876903411.png', 'lemon_v.png'),
(126, 1, '282876903412.png', 'moon_v.png'),
(127, 1, '282876903414.png', 'net_v.png'),
(128, 1, '282876903415.png', 'nose_v.png'),
(129, 1, '282876903416.png', 'nurse_v.png'),
(130, 1, '282876903417.png', 'pencil_v.png'),
(131, 1, '282876903418.png', 'pie_v.png'),
(132, 1, '282876903419.png', 'popcorn_v.png'),
(133, 1, '282876903420.png', 'pumpkin_v.png'),
(134, 1, '282876903422.png', 'quail_v.png'),
(135, 1, '282876903423.png', 'queen_v.png'),
(136, 1, '282876903424.png', 'quicksand_v.png'),
(137, 1, '282876903425.png', 'quiet_v.png'),
(138, 1, '282876903426.png', 'rabbit_v.png'),
(139, 1, '282876903427.png', 'rain_v.png'),
(140, 1, '282876903428.png', 'robot_v.png'),
(141, 1, '282876903429.png', 'rose_v.png'),
(142, 1, '282876903431.png', 'shirt_v.png'),
(143, 1, '282876903432.png', 'toys_v.png'),
(144, 1, '282876903433.png', 'tree_v.png'),
(145, 1, '282876903434.png', 'UFO_v.png'),
(146, 1, '282876903435.png', 'umbrella_v.png'),
(147, 1, '282876903436.png', 'unicorn_v.png'),
(148, 1, '282876903437.png', 'unicycle_v.png'),
(149, 1, '282876903439.png', 'van_v.png'),
(150, 1, '282876903440.png', 'vase_v.png'),
(151, 1, '282876903441.png', 'vegetables_v.png'),
(152, 1, '282876903442.png', 'violin_v.png'),
(153, 1, '282876903443.png', 'wagon_v.png'),
(154, 1, '282876903444.png', 'whale_v.png'),
(155, 1, '282876903446.png', 'whistle_v.png'),
(156, 1, '282876903447.png', 'yogurt_v.png'),
(157, 1, '282876903448.png', 'yoyo_v.png'),
(158, 1, '282876903449.png', 'zebra_v.png'),
(159, 1, '282876903450.png', 'zigzag_v.png'),
(160, 1, '282876903451.gif', 'angel.gif'),
(161, 1, '282876903452.gif', 'ant.gif'),
(162, 1, '282876903454.jpeg', 'apple.jpeg'),
(163, 1, '282876903455.gif', 'alligator.gif'),
(164, 1, '282876903457.gif', 'butterfly.gif'),
(165, 1, '282876903459.gif', 'car2.gif'),
(166, 1, '282876903500.gif', 'carrot.gif'),
(167, 1, '282876903501.gif', 'cat.gif'),
(168, 1, '282876913505.gif', 'flamingo.gif'),
(169, 1, '282876913506.gif', 'flower.gif'),
(170, 1, '282876913508.gif', 'food.gif'),
(171, 1, '282876913509.gif', 'giraffe.gif'),
(172, 1, '282876913510.gif', 'drums6.gif'),
(173, 1, '282876913511.gif', 'duck.gif'),
(174, 1, '282876913512.gif', 'eagle2.gif'),
(175, 1, '282876913513.gif', 'egg.gif'),
(176, 1, '282876913515.gif', 'elephant.gif'),
(177, 1, '282876913516.gif', 'eyes2.gif'),
(178, 1, '282876913517.gif', 'fan2.gif'),
(179, 1, '282876913518.gif', 'Fire.gif'),
(180, 1, '282876913519.gif', 'flag.gif'),
(181, 1, '282876913520.gif', 'hop2.gif'),
(182, 1, '282876913522.gif', 'horse.gif'),
(183, 1, '282876913523.gif', 'house2.gif'),
(184, 1, '282876913524.gif', 'ice.gif'),
(185, 1, '282876913525.gif', 'ice_cream3.gif'),
(186, 1, '282876913526.gif', 'ink3.gif'),
(187, 1, '282876913527.gif', 'island2.gif'),
(188, 1, '282876913529.gif', 'jacket.gif'),
(189, 1, '282876913530.gif', 'jam.gif'),
(190, 1, '282876913531.gif', 'jeep2.gif'),
(191, 1, '282876913532.gif', 'juice3.gif'),
(192, 1, '282876913533.gif', 'kanggaroo.gif'),
(193, 1, '282876913534.gif', 'mango.gif'),
(194, 1, '282876913536.gif', 'milk3.gif'),
(195, 1, '282876913537.gif', 'mirror.gif'),
(196, 1, '282876913538.gif', 'key3.gif'),
(197, 1, '282876913539.gif', 'kitchen2.gif'),
(198, 1, '282876913540.gif', 'kite.gif'),
(199, 1, '282876913541.gif', 'leaf.gif'),
(200, 1, '282876913543.gif', 'lemon.gif'),
(201, 1, '282876913544.gif', 'lion.gif'),
(202, 1, '282876913545.gif', 'lollipop3.gif'),
(203, 1, '282876913546.gif', 'octopus2.gif'),
(204, 1, '282876913547.gif', 'oen.gif'),
(205, 1, '282876913548.gif', 'orange.gif'),
(206, 1, '282876913550.gif', 'paint3.gif'),
(207, 1, '282876913551.gif', 'popcorn.gif'),
(208, 1, '282876913552.gif', 'prncil.gif'),
(209, 1, '282876913553.gif', 'pumpkin.gif'),
(210, 1, '282876913554.gif', 'quet.gif'),
(211, 1, '282876913555.gif', 'quicksand.gif'),
(212, 1, '282876913557.gif', 'rabbit.gif'),
(213, 1, '282876913558.gif', 'watch.gif'),
(214, 1, '282876913559.gif', 'water.gif'),
(215, 1, '282876913600.gif', 'window.gif'),
(216, 1, '282876913601.gif', 'xmas.gif'),
(217, 1, '282876913602.gif', 'tiger.gif'),
(218, 1, '282876913603.gif', 'toys.gif'),
(219, 1, '282876913605.gif', 'unicorn2.gif'),
(220, 1, '282876913606.gif', 'unicycle.gif'),
(221, 1, '282876913607.gif', 'van.gif'),
(222, 1, '282876913608.gif', 'vase.gif'),
(223, 1, '282876913610.gif', 'yoyo.gif'),
(224, 1, '282876913611.gif', 'zebra.gif'),
(225, 1, '282876913612.gif', 'zero.gif'),
(226, 1, '282876913613.gif', 'zigzag.gif'),
(227, 1, '292913295457.png', 'eep.png'),
(228, 1, '292913330054.png', 'ffp.png'),
(229, 1, '292913330056.png', 'ggp.png'),
(230, 1, '292913330057.png', 'hhp.png'),
(231, 1, '292913340058.png', 'iip.png'),
(232, 1, '292915972024.png', '10.png'),
(233, 1, '292915972025.png', '0.png'),
(234, 1, '292915972026.png', '1.png'),
(235, 1, '292915972027.png', '2.png'),
(236, 1, '292915972029.png', '3.png'),
(237, 1, '292915972030.png', '4.png'),
(238, 1, '292915972031.png', '5.png'),
(239, 1, '292915972032.png', '6.png'),
(240, 1, '292915972034.png', '7.png'),
(241, 1, '292915972035.png', '8.png'),
(242, 1, '292915972036.png', '9.png'),
(243, 1, '292915982224.png', '0.png'),
(244, 1, '292915982225.png', '1.png'),
(245, 1, '292915982226.png', '2.png'),
(246, 1, '292915982227.png', '3.png'),
(247, 1, '292915982229.png', '4.png'),
(248, 1, '292915982230.png', '5.png'),
(249, 1, '292915982231.png', '6.png'),
(250, 1, '292915982232.png', '7.png'),
(251, 1, '292915982233.png', '8.png'),
(252, 1, '292915992235.png', '9.png'),
(253, 1, '292915992236.png', '10.png'),
(254, 1, '292915992237.png', 'eight.png'),
(255, 1, '292915992238.png', 'five.png'),
(256, 1, '292915992240.png', 'four.png'),
(257, 1, '292915992241.png', 'nine.png'),
(258, 1, '292915992242.png', 'one.png'),
(259, 1, '292915992243.png', 'seven.png'),
(260, 1, '292915992244.png', 'six.png'),
(261, 1, '292915992245.png', 'ten.png'),
(262, 1, '292915992247.png', 'three.png'),
(263, 1, '292915992248.png', 'two.png'),
(264, 1, '292915992249.png', 'zero.png');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `user_id` int(120) NOT NULL,
  `cat_id` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `user_id`, `cat_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(10, 1, 1),
(11, 1, 1),
(12, 1, 1),
(13, 1, 1),
(14, 1, 1),
(15, 1, 1),
(16, 31, 8),
(17, 1, 2),
(18, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_example`
--

CREATE TABLE `lesson_example` (
  `id` int(11) NOT NULL,
  `lesson_id` int(120) NOT NULL,
  `img_id` int(120) NOT NULL,
  `lesson_example_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_example`
--

INSERT INTO `lesson_example` (`id`, `lesson_id`, `img_id`, `lesson_example_name`) VALUES
(1, 1, 428, 'Big letter A'),
(2, 1, 549, 'small letter a'),
(3, 1, 259, 'Apple'),
(4, 1, 570, 'Eating Apple'),
(5, 1, 258, 'Ant'),
(6, 1, 569, 'walking ant'),
(7, 2, 429, 'Big letter B'),
(8, 2, 679, 'Small letter b'),
(9, 2, 263, 'Bird'),
(10, 2, 566, 'Flying bird'),
(11, 2, 254, 'Ball'),
(12, 2, 572, 'Ball'),
(13, 3, 430, 'Big letter C'),
(14, 3, 680, 'Small letter c'),
(15, 3, 0, ''),
(16, 3, 0, ''),
(17, 3, 0, ''),
(18, 3, 0, ''),
(19, 4, 431, 'Big Letter D'),
(20, 4, 681, 'Small letter d'),
(21, 4, 0, ''),
(22, 4, 0, ''),
(23, 4, 0, ''),
(24, 4, 0, ''),
(25, 5, 432, 'Big letter E'),
(26, 5, 682, 'Small letter e'),
(27, 5, 0, ''),
(28, 5, 0, ''),
(29, 5, 0, ''),
(30, 5, 0, ''),
(31, 6, 433, 'Big letter F'),
(32, 6, 683, 'Small letter f'),
(33, 6, 0, ''),
(34, 6, 0, ''),
(35, 6, 0, ''),
(36, 6, 0, ''),
(37, 7, 434, 'Big Letter G'),
(38, 7, 684, 'Small letter g'),
(39, 7, 0, ''),
(40, 7, 0, ''),
(41, 7, 0, ''),
(42, 7, 0, ''),
(55, 10, 39, 'Big letter A'),
(56, 10, 65, 'small letter a'),
(57, 10, 88, 'Ant'),
(58, 10, 161, 'Walking Ant'),
(59, 10, 89, 'Apple'),
(60, 10, 162, 'Eating Apple'),
(61, 11, 40, 'Big letter B'),
(62, 11, 66, 'small letter b'),
(63, 11, 91, 'Ball'),
(64, 11, 164, 'Butterfly'),
(65, 11, 92, 'Banana'),
(66, 11, 94, 'Boat'),
(67, 12, 67, 'Big Letter C'),
(68, 12, 67, 'small letter c'),
(69, 12, 97, 'Cat'),
(70, 12, 167, 'Running Cat'),
(71, 12, 165, 'Car'),
(72, 12, 96, 'Carrot'),
(73, 13, 42, 'Big Letter D'),
(74, 13, 68, 'small letter d'),
(75, 13, 101, 'Dog'),
(76, 13, 173, 'Duck'),
(77, 13, 172, 'Drum'),
(78, 13, 100, 'Dear'),
(79, 14, 43, 'Big Letter E'),
(80, 14, 227, 'small letter e'),
(81, 14, 104, 'Elephant'),
(82, 14, 176, 'Walking Elephant'),
(83, 14, 102, 'Egg'),
(84, 14, 175, 'Egg'),
(85, 15, 44, 'Big Letter F'),
(86, 15, 228, 'small letter f'),
(87, 15, 106, 'Fan'),
(88, 15, 178, 'Fan'),
(89, 15, 0, ''),
(90, 15, 0, ''),
(91, 16, 230, 'h'),
(92, 16, 0, ''),
(93, 16, 0, ''),
(94, 16, 0, ''),
(95, 16, 0, ''),
(96, 16, 0, ''),
(97, 17, 243, '0'),
(98, 17, 264, 'Zero'),
(99, 17, 0, ''),
(100, 17, 0, ''),
(101, 17, 0, ''),
(102, 17, 0, ''),
(103, 18, 244, '1'),
(104, 18, 258, 'One'),
(105, 18, 0, ''),
(106, 18, 0, ''),
(107, 18, 0, ''),
(108, 18, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_image`
--

CREATE TABLE `lesson_image` (
  `id` int(11) NOT NULL,
  `lesson_id` int(120) NOT NULL,
  `img_id` int(120) NOT NULL,
  `lesson_name` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_image`
--

INSERT INTO `lesson_image` (`id`, `lesson_id`, `img_id`, `lesson_name`, `user_id`, `cat_id`) VALUES
(1, 1, 428, '1st Letter', 1, 1),
(2, 2, 429, '2nd Letter', 1, 1),
(3, 3, 430, '3rd Letter', 1, 1),
(4, 4, 431, '4th Letter', 1, 1),
(5, 5, 432, '5th Letter', 1, 1),
(6, 6, 433, '6th Letter', 1, 1),
(7, 7, 434, '7th Letter', 1, 1),
(10, 10, 14, '1st Letter Alphabet', 1, 1),
(11, 11, 15, '2nd Letter Alphabet', 1, 1),
(12, 12, 16, '3rd Letter Alphabet', 1, 1),
(13, 13, 17, '4th Letter Alphabet', 1, 1),
(14, 14, 18, '5th Letter Alphabet', 1, 1),
(15, 15, 19, '6th Letter Alphabet', 1, 1),
(16, 16, 230, 'hjvbknlmhgjb', 31, 8),
(17, 17, 233, 'ZERO', 1, 2),
(18, 18, 234, 'ONE', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_manager`
--

CREATE TABLE `lesson_manager` (
  `id` int(11) NOT NULL,
  `lesson_image_id` int(120) NOT NULL,
  `lesson_example_id` int(120) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_manager`
--

INSERT INTO `lesson_manager` (`id`, `lesson_image_id`, `lesson_example_id`, `user_id`) VALUES
(1, 1, 6, 1),
(2, 2, 12, 1),
(3, 3, 18, 1),
(4, 4, 24, 1),
(5, 5, 30, 1),
(6, 6, 36, 1),
(7, 7, 42, 1),
(10, 10, 60, 1),
(11, 11, 66, 1),
(12, 12, 72, 1),
(13, 13, 78, 1),
(14, 14, 84, 1),
(15, 15, 90, 1),
(16, 16, 96, 31),
(17, 17, 102, 1),
(18, 18, 108, 1);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(220) NOT NULL,
  `level_image` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level_name`, `level_image`, `created_by`) VALUES
(1, 'EASY', 'Easy.png', 1),
(2, 'MODERATE', 'moderate.png', 1),
(3, 'HARD', 'Difficult.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `category_id`, `level_id`, `quiz_id`, `user_id`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(120) NOT NULL,
  `user_id` int(120) NOT NULL,
  `category_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `question_image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `template_num` int(11) NOT NULL,
  `background` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `user_id`, `category_id`, `level_id`, `question`, `question_image`, `status`, `template_num`, `background`) VALUES
(1, 1, 1, 1, 'Match the LETTER.', '282876741140.png', 0, 1, 'FFFFFF'),
(2, 1, 1, 1, 'Match the LETTER.', '282876741141.png', 0, 1, 'FFFFFF'),
(3, 1, 1, 1, 'Match the LETTER.', '282876771606.png', 0, 1, 'FFFFFF'),
(4, 1, 1, 1, 'Match the LETTER.', '282876771527.png', 0, 1, 'FFFFFF'),
(5, 1, 1, 1, 'Match the LETTER.', '282876771528.png', 0, 1, 'FFFFFF'),
(6, 1, 1, 1, 'Match the LETTER.', '282876771529.png', 0, 1, 'FFFFFF'),
(7, 1, 1, 1, 'Match the LETTER.', '282876771530.png', 0, 1, 'FFFFFF'),
(8, 1, 1, 1, 'Match the LETTER.', '282876771531.png', 0, 1, 'FFFFFF'),
(9, 1, 1, 1, 'Match the LETTER.', '282876741149.png', 0, 1, 'FFFFFF'),
(10, 1, 1, 1, 'Match the LETTER.', '282876771533.png', 0, 1, 'FFFFFF'),
(11, 1, 1, 2, 'Which starts with A?', '282876741140.png', 0, 2, 'A56EAB'),
(12, 1, 1, 2, 'What starts with letter B?', '282876741141.png', 0, 2, 'A56EAB'),
(13, 1, 1, 2, 'What starts with letter C?', '282876741142.png', 0, 2, 'A56EAB'),
(14, 1, 1, 3, 'Guess the 1st letter of the alphabet?', '282876741140.png', 0, 3, 'A56EAB');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answer`
--

CREATE TABLE `quiz_answer` (
  `id` int(120) NOT NULL,
  `quiz_id` int(120) NOT NULL,
  `answer` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_answer`
--

INSERT INTO `quiz_answer` (`id`, `quiz_id`, `answer`) VALUES
(6, 21, '0'),
(7, 22, '0'),
(9, 24, '0');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_image`
--

CREATE TABLE `quiz_image` (
  `id` int(120) NOT NULL,
  `quiz_id` int(120) NOT NULL,
  `img_id` int(120) NOT NULL,
  `is_correct` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_image`
--

INSERT INTO `quiz_image` (`id`, `quiz_id`, `img_id`, `is_correct`) VALUES
(1, 1, 65, 1),
(2, 1, 66, 0),
(3, 1, 67, 0),
(4, 1, 68, 0),
(5, 2, 66, 1),
(6, 2, 80, 0),
(7, 2, 68, 0),
(8, 2, 83, 0),
(9, 3, 67, 1),
(10, 3, 65, 0),
(11, 3, 85, 0),
(12, 3, 0, 0),
(13, 4, 68, 1),
(14, 4, 70, 0),
(15, 4, 231, 0),
(16, 4, 72, 0),
(17, 5, 227, 1),
(18, 5, 78, 0),
(19, 5, 82, 0),
(20, 5, 0, 0),
(21, 6, 228, 1),
(22, 6, 229, 0),
(23, 6, 227, 0),
(24, 6, 231, 0),
(25, 7, 229, 1),
(26, 7, 227, 0),
(27, 7, 82, 0),
(28, 7, 0, 0),
(29, 8, 230, 1),
(30, 8, 74, 0),
(31, 8, 75, 0),
(32, 8, 0, 0),
(33, 9, 231, 1),
(34, 9, 227, 0),
(35, 9, 74, 0),
(36, 9, 0, 0),
(37, 10, 69, 1),
(38, 10, 70, 0),
(39, 10, 77, 0),
(40, 10, 0, 0),
(41, 11, 89, 1),
(42, 11, 104, 0),
(43, 11, 97, 0),
(44, 11, 0, 0),
(45, 12, 94, 1),
(46, 12, 148, 0),
(47, 12, 158, 0),
(48, 12, 0, 0),
(49, 13, 96, 1),
(50, 13, 145, 0),
(51, 13, 121, 0),
(52, 13, 0, 0),
(53, 14, 14, 1),
(54, 14, 15, 0),
(55, 14, 23, 0),
(56, 14, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `score` double(8,2) NOT NULL,
  `total_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_speed` double(8,2) NOT NULL,
  `accuracy` double(8,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attempts` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `score`, `total_time`, `average_speed`, `accuracy`, `user_id`, `attempts`, `quiz_id`, `category_id`, `level_id`, `remarks`) VALUES
(1, 10.00, '22.475', 2.25, 100.00, 1, 0, 0, 1, 1, 'A'),
(2, 9.00, '28.284', 2.83, 90.00, 1, 2, 0, 1, 1, 'A'),
(3, 10.00, '62.501', 6.25, 100.00, 29, 0, 0, 1, 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `admin_id`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1540823525, 1, 'Admin', 'istrator', 'ADMIN', '0', 1),
(15, '::1', 'jerichojamesranara@gmail.com', '$2y$08$5SefV8dyXL/JVrnXQ.XWS.VpVjGm21Mbk4kF1LBEOhf1lW4pxC.G2', NULL, 'jerichojamesranara@gmail.com', NULL, NULL, NULL, NULL, 1539087639, 1540730419, 1, 'Jericho James', 'Ranara', 'University of the Immaculate Concepcion', '09288432437', 15),
(16, '::1', 'chippyandmia@gmail.com', '$2y$08$MElXukChPLMe55sEgjWVwe8YvOfq7WHL2rvJKWVWFVYWAaiwRBoCO', NULL, 'chippyandmia@gmail.com', NULL, NULL, NULL, NULL, 1539087947, 1539087959, 1, 'Jericho', 'Ranara', 'UIC', '09288432437', 15),
(17, '::1', 'teacherjoysagun@yahoo.com', '$2y$08$cnMuzxeqIaWA1ZQZejUA5eaN1vnF8UAQ6DDyMzx1vS.1UfJYWHyQy', NULL, 'teacherjoysagun@yahoo.com', NULL, NULL, NULL, NULL, 1539139964, 1539139985, 1, 'Arianne  Joy', 'Sagun', 'Little Kaye\'s', '09057743789', 15),
(18, '::1', 'lorymaecaser@gmail.com', '$2y$08$JTjp5nmFV.0qchszBcBa1udK4qzYKNXBV9XyzpTIYWFG05Eq45cQ2', NULL, 'lorymaecaser@gmail.com', NULL, NULL, NULL, NULL, 1539141499, 1539141526, 1, 'Lory Mae', 'Caser', 'Little kaye\'s', '09174344416', 1),
(29, '::1', 'liza@gmail.com', '$2y$08$X1ywwLB7S.Nl9eVjjp.Kfepf/nNQy0fp10LQdatwZcDHVXgPdCAUW', NULL, 'liza@gmail.com', NULL, NULL, NULL, NULL, 1539918506, 1540814106, 1, 'Liza', 'Sldg', 'UIC', '', 31),
(33, '::1', 'gai@gmail.com', '$2y$08$rBVASnL6jj3hG3GiJcibpeH0a/GxcqPRpktsKdF/VgicHCkzyTKoG', NULL, 'gai@gmail.com', NULL, NULL, NULL, NULL, 1540822981, 1540822991, 1, 'Gai', 'Estimo', 'UIC', '', 0),
(34, '::1', 'gaistudent@gmail.com', '$2y$08$quI8cJAaKVJf/zHTGtWVIe8tmwm4pqsmwwxYISbVuVev7adB4Hys2', NULL, 'gaistudent@gmail.com', NULL, NULL, NULL, NULL, 1540824276, 1540824314, 1, 'gai student', 'gai', 'uic', '', 33);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(10, 1, 1),
(22, 15, 1),
(23, 16, 2),
(24, 17, 1),
(25, 18, 1),
(37, 29, 15),
(41, 33, 1),
(42, 34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `video_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `user_id`, `video_name`, `video_link`, `video_category_id`) VALUES
(8, 31, 'Sing', 'https://www.youtube.com/embed/Sjx2BNyN1HQ', 2),
(9, 1, 'Shapes Song', 'https://www.youtube.com/embed/Sjx2BNyN1HQ', 1),
(10, 1, 'Kids Vocabulary ', 'https://www.youtube.com/embed/o5jZIswSfSE', 1),
(11, 1, 'Count to ten', 'https://www.youtube.com/embed/aMFVmqWV1sY', 1),
(12, 1, 'Colors', 'https://www.youtube.com/embed/ybt2jhCQ3lA', 1),
(13, 1, 'Sing the alphabets', 'https://www.youtube.com/embed/g74vHQ6EwjA', 1),
(14, 1, 'Action Verbs', 'https://www.youtube.com/embed/4c6FyuetSVo', 1),
(15, 1, 'Baby Shark', 'https://www.youtube.com/embed/XqZsoesa55w', 2),
(16, 1, 'London Bridge', 'https://www.youtube.com/embed/m8c0bh8Rg6M', 2),
(17, 1, 'Old MacDonald', 'https://www.youtube.com/embed/oEo2FOghVH0', 2),
(18, 1, 'Twinkle Twinkle Little Star', 'https://www.youtube.com/embed/yCjJyiqpAuU', 2),
(19, 1, 'Go Bananas', 'https://www.youtube.com/embed/PKyuJhHQCfI', 2),
(20, 1, 'If you\'re happy and you know it', 'https://www.youtube.com/embed/13wd8KvOt58', 2),
(21, 1, 'A toy for spot', 'https://www.youtube.com/embed/zZd4kIb054I', 3),
(22, 1, 'The Grasshopper and the ant', 'https://www.youtube.com/embed/ripQ9jJnw1c', 3),
(23, 1, 'The Sun and the Wind', 'https://www.youtube.com/embed/0GGvRtuxglM', 3),
(24, 1, 'The milkmaid and her pail', 'https://www.youtube.com/embed/wErvPrTOaRo', 3),
(25, 1, 'The tortoise and the hare', 'https://www.youtube.com/embed/QzoQcIYhnqo', 3);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vid_name` varchar(120) NOT NULL,
  `original_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `vid_name`, `original_name`) VALUES
(28, 1, '262633421250.mp4', 'videoplayback (1).mp4'),
(29, 1, '262633451652.mp4', 'cake.mp4'),
(30, 1, '262633542950.mp4', 'hahhaha.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `video_category`
--

CREATE TABLE `video_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_category`
--

INSERT INTO `video_category` (`id`, `category_name`) VALUES
(1, 'Lessons'),
(2, 'Sing-A-Long'),
(3, 'Story Series');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_example`
--
ALTER TABLE `lesson_example`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_image`
--
ALTER TABLE `lesson_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_manager`
--
ALTER TABLE `lesson_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_answer`
--
ALTER TABLE `quiz_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_image`
--
ALTER TABLE `quiz_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_category`
--
ALTER TABLE `video_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lesson_example`
--
ALTER TABLE `lesson_example`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `lesson_image`
--
ALTER TABLE `lesson_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lesson_manager`
--
ALTER TABLE `lesson_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quiz_answer`
--
ALTER TABLE `quiz_answer`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quiz_image`
--
ALTER TABLE `quiz_image`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `video_category`
--
ALTER TABLE `video_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
