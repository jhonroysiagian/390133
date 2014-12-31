-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2015 at 12:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `obesphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
`id_absen` int(11) NOT NULL,
  `nip_fk_absen` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket_absen` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=403 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `nip_fk_absen`, `tgl_absen`, `ket_absen`) VALUES
(1, 17, '2014-12-01', 'masuk'),
(2, 17, '2014-12-02', 'masuk'),
(3, 17, '2014-12-03', 'masuk'),
(4, 17, '2014-12-04', 'masuk'),
(5, 17, '2014-12-05', 'masuk'),
(6, 17, '2014-12-06', 'masuk'),
(7, 17, '2014-12-07', 'masuk'),
(8, 17, '2014-12-08', 'masuk'),
(9, 17, '2014-12-09', 'masuk'),
(10, 17, '2014-12-10', 'masuk'),
(11, 17, '2014-12-11', 'off'),
(12, 17, '2014-12-12', 'masuk'),
(13, 17, '2014-12-13', 'masuk'),
(14, 17, '2014-12-14', 'masuk'),
(15, 17, '2014-12-15', 'masuk'),
(16, 17, '2014-12-16', 'masuk'),
(17, 17, '2014-12-17', 'masuk'),
(18, 17, '2014-12-18', 'masuk'),
(19, 17, '2014-12-19', 'masuk'),
(20, 17, '2014-12-20', 'off'),
(21, 17, '2014-12-21', 'masuk'),
(22, 17, '2014-12-22', 'masuk'),
(23, 17, '2014-12-23', 'masuk'),
(24, 17, '2014-12-24', 'masuk'),
(25, 17, '2014-12-25', 'masuk'),
(26, 17, '2014-12-26', 'masuk'),
(27, 17, '2014-12-27', 'off'),
(28, 17, '2014-12-28', 'masuk'),
(29, 17, '2014-12-29', 'masuk'),
(30, 17, '2014-12-30', 'masuk'),
(31, 17, '2014-12-31', 'masuk'),
(63, 19, '2014-12-01', 'sakit'),
(64, 19, '2014-12-02', 'masuk'),
(65, 19, '2014-12-03', 'masuk'),
(66, 19, '2014-12-04', 'masuk'),
(67, 19, '2014-12-05', 'masuk'),
(68, 19, '2014-12-06', 'masuk'),
(69, 19, '2014-12-07', 'masuk'),
(70, 19, '2014-12-08', 'masuk'),
(71, 19, '2014-12-09', 'masuk'),
(72, 19, '2014-12-10', 'masuk'),
(73, 19, '2014-12-11', 'masuk'),
(74, 19, '2014-12-12', 'masuk'),
(75, 19, '2014-12-13', 'off'),
(76, 19, '2014-12-14', 'masuk'),
(77, 19, '2014-12-15', 'masuk'),
(78, 19, '2014-12-16', 'masuk'),
(79, 19, '2014-12-17', 'masuk'),
(80, 19, '2014-12-18', 'off'),
(81, 19, '2014-12-19', 'masuk'),
(82, 19, '2014-12-20', 'masuk'),
(83, 19, '2014-12-21', 'masuk'),
(84, 19, '2014-12-22', 'masuk'),
(85, 19, '2014-12-23', 'masuk'),
(86, 19, '2014-12-24', 'masuk'),
(87, 19, '2014-12-25', 'masuk'),
(88, 19, '2014-12-26', 'off'),
(89, 19, '2014-12-27', 'masuk'),
(90, 19, '2014-12-28', 'masuk'),
(91, 19, '2014-12-29', 'masuk'),
(92, 19, '2014-12-30', 'masuk'),
(93, 19, '2014-12-31', 'masuk'),
(94, 20, '2014-12-01', 'masuk'),
(95, 20, '2014-12-02', 'masuk'),
(96, 20, '2014-12-03', 'masuk'),
(97, 20, '2014-12-04', 'masuk'),
(98, 20, '2014-12-05', 'masuk'),
(99, 20, '2014-12-06', 'masuk'),
(100, 20, '2014-12-07', 'masuk'),
(101, 20, '2014-12-08', 'masuk'),
(102, 20, '2014-12-09', 'masuk'),
(103, 20, '2014-12-10', 'masuk'),
(104, 20, '2014-12-11', 'off'),
(105, 20, '2014-12-12', 'masuk'),
(106, 20, '2014-12-13', 'masuk'),
(107, 20, '2014-12-14', 'masuk'),
(108, 20, '2014-12-15', 'masuk'),
(109, 20, '2014-12-16', 'masuk'),
(110, 20, '2014-12-17', 'off'),
(111, 20, '2014-12-18', 'masuk'),
(112, 20, '2014-12-19', 'masuk'),
(113, 20, '2014-12-20', 'masuk'),
(114, 20, '2014-12-21', 'masuk'),
(115, 20, '2014-12-22', 'masuk'),
(116, 20, '2014-12-23', 'masuk'),
(117, 20, '2014-12-24', 'masuk'),
(118, 20, '2014-12-25', 'masuk'),
(119, 20, '2014-12-26', 'masuk'),
(120, 20, '2014-12-27', 'off'),
(121, 20, '2014-12-28', 'masuk'),
(122, 20, '2014-12-29', 'masuk'),
(123, 20, '2014-12-30', 'masuk'),
(124, 20, '2014-12-31', 'masuk'),
(130, 18, '2014-12-06', 'masuk'),
(131, 18, '2014-12-07', 'masuk'),
(132, 18, '2014-12-08', 'masuk'),
(133, 18, '2014-12-09', 'masuk'),
(134, 18, '2014-12-10', 'masuk'),
(135, 18, '2014-12-11', 'masuk'),
(136, 18, '2014-12-12', 'masuk'),
(137, 18, '2014-12-13', 'masuk'),
(138, 18, '2014-12-14', 'masuk'),
(139, 18, '2014-12-15', 'cuti'),
(140, 18, '2014-12-16', 'cuti'),
(141, 18, '2014-12-17', 'cuti'),
(142, 18, '2014-12-18', 'cuti'),
(143, 18, '2014-12-19', 'cuti'),
(144, 18, '2014-12-20', 'masuk'),
(145, 18, '2014-12-21', 'masuk'),
(146, 18, '2014-12-22', 'masuk'),
(147, 18, '2014-12-23', 'masuk'),
(148, 18, '2014-12-24', 'masuk'),
(149, 18, '2014-12-25', 'masuk'),
(150, 18, '2014-12-26', 'masuk'),
(151, 18, '2014-12-27', 'masuk'),
(152, 18, '2014-12-28', 'masuk'),
(153, 18, '2014-12-29', 'masuk'),
(154, 18, '2014-12-30', 'masuk'),
(155, 18, '2014-12-31', 'masuk'),
(156, 18, '2014-12-01', 'alpa'),
(157, 18, '2014-12-02', 'alpa'),
(158, 18, '2014-12-03', 'alpa'),
(159, 18, '2014-12-04', 'sakit'),
(160, 18, '2014-12-05', 'sakit'),
(161, 19, '2014-11-01', 'masuk'),
(162, 19, '2014-11-02', 'masuk'),
(163, 19, '2014-11-03', 'masuk'),
(164, 19, '2014-11-04', 'masuk'),
(165, 19, '2014-11-05', 'masuk'),
(166, 19, '2014-11-06', 'off'),
(167, 19, '2014-11-07', 'masuk'),
(168, 19, '2014-11-08', 'masuk'),
(169, 19, '2014-11-09', 'masuk'),
(170, 19, '2014-11-10', 'masuk'),
(171, 19, '2014-11-11', 'masuk'),
(172, 19, '2014-11-12', 'off'),
(173, 19, '2014-11-13', 'masuk'),
(174, 19, '2014-11-14', 'masuk'),
(175, 19, '2014-11-15', 'masuk'),
(176, 19, '2014-11-16', 'masuk'),
(177, 19, '2014-11-17', 'masuk'),
(178, 19, '2014-11-18', 'sakit'),
(179, 19, '2014-11-19', 'sakit'),
(180, 19, '2014-11-20', 'masuk'),
(181, 19, '2014-11-21', 'masuk'),
(182, 19, '2014-11-22', 'masuk'),
(183, 19, '2014-11-23', 'cuti'),
(184, 19, '2014-11-24', 'cuti'),
(185, 19, '2014-11-25', 'masuk'),
(186, 19, '2014-11-26', 'masuk'),
(187, 19, '2014-11-27', 'masuk'),
(188, 19, '2014-11-28', 'masuk'),
(189, 19, '2014-11-29', 'masuk'),
(190, 19, '2014-11-30', 'masuk'),
(191, 17, '2015-02-01', 'masuk'),
(192, 17, '2015-02-02', 'masuk'),
(193, 17, '2015-02-03', 'masuk'),
(194, 17, '2015-02-04', 'masuk'),
(195, 17, '2015-02-05', 'masuk'),
(196, 17, '2015-02-06', 'masuk'),
(197, 17, '2015-02-07', 'masuk'),
(198, 17, '2015-02-08', 'masuk'),
(199, 17, '2015-02-09', 'masuk'),
(200, 17, '2015-02-10', 'masuk'),
(201, 17, '2015-02-11', 'masuk'),
(202, 17, '2015-02-12', 'masuk'),
(203, 17, '2015-02-13', 'masuk'),
(204, 17, '2015-02-14', 'masuk'),
(205, 17, '2015-02-15', 'masuk'),
(206, 17, '2015-02-16', 'masuk'),
(207, 17, '2015-02-17', 'masuk'),
(208, 17, '2015-02-18', 'masuk'),
(209, 17, '2015-02-19', 'masuk'),
(210, 17, '2015-02-20', 'masuk'),
(211, 17, '2015-02-21', 'masuk'),
(212, 17, '2015-02-22', 'masuk'),
(213, 17, '2015-02-23', 'masuk'),
(214, 17, '2015-02-24', 'masuk'),
(215, 17, '2015-02-25', 'masuk'),
(216, 17, '2015-02-26', 'masuk'),
(218, 17, '2015-02-28', 'cuti'),
(220, 12345678, '2014-12-01', 'masuk'),
(221, 12345678, '2014-12-02', 'masuk'),
(222, 12345678, '2014-12-03', 'masuk'),
(223, 12345678, '2014-12-04', 'masuk'),
(224, 12345678, '2014-12-05', 'masuk'),
(225, 12345678, '2014-12-06', 'masuk'),
(226, 12345678, '2014-12-07', 'masuk'),
(227, 12345678, '2014-12-08', 'masuk'),
(228, 12345678, '2014-12-09', 'masuk'),
(229, 12345678, '2014-12-10', 'masuk'),
(230, 12345678, '2014-12-11', 'masuk'),
(231, 12345678, '2014-12-12', 'masuk'),
(232, 12345678, '2014-12-13', 'masuk'),
(233, 12345678, '2014-12-14', 'masuk'),
(234, 12345678, '2014-12-15', 'masuk'),
(235, 12345678, '2014-12-16', 'masuk'),
(236, 12345678, '2014-12-17', 'masuk'),
(237, 12345678, '2014-12-18', 'masuk'),
(238, 12345678, '2014-12-19', 'masuk'),
(239, 12345678, '2014-12-20', 'masuk'),
(240, 12345678, '2014-12-21', 'masuk'),
(241, 12345678, '2014-12-22', 'masuk'),
(242, 12345678, '2014-12-23', 'masuk'),
(243, 12345678, '2014-12-24', 'masuk'),
(244, 12345678, '2014-12-25', 'masuk'),
(245, 12345678, '2014-12-26', 'masuk'),
(246, 12345678, '2014-12-27', 'masuk'),
(247, 12345678, '2014-12-28', 'masuk'),
(248, 12345678, '2014-12-29', 'masuk'),
(249, 12345678, '2014-12-30', 'masuk'),
(250, 12345678, '2014-12-31', 'sakit'),
(251, 19850726, '2014-12-01', 'masuk'),
(252, 19850726, '2014-12-02', 'masuk'),
(253, 19850726, '2014-12-03', 'masuk'),
(254, 19850726, '2014-12-04', 'masuk'),
(255, 19850726, '2014-12-05', 'masuk'),
(256, 19850726, '2014-12-06', 'masuk'),
(257, 19850726, '2014-12-07', 'masuk'),
(258, 19850726, '2014-12-08', 'masuk'),
(259, 19850726, '2014-12-09', 'masuk'),
(260, 19850726, '2014-12-10', 'masuk'),
(261, 19850726, '2014-12-11', 'masuk'),
(262, 19850726, '2014-12-12', 'masuk'),
(263, 19850726, '2014-12-13', 'masuk'),
(264, 19850726, '2014-12-14', 'masuk'),
(265, 19850726, '2014-12-15', 'masuk'),
(266, 19850726, '2014-12-16', 'masuk'),
(267, 19850726, '2014-12-17', 'masuk'),
(268, 19850726, '2014-12-18', 'masuk'),
(269, 19850726, '2014-12-19', 'masuk'),
(270, 19850726, '2014-12-20', 'masuk'),
(271, 19850726, '2014-12-21', 'masuk'),
(272, 19850726, '2014-12-22', 'cuti'),
(273, 19850726, '2014-12-23', 'alpa'),
(274, 19850726, '2014-12-24', 'masuk'),
(275, 19850726, '2014-12-25', 'sakit'),
(276, 19850726, '2014-12-26', 'masuk'),
(277, 19850726, '2014-12-27', 'masuk'),
(278, 19850726, '2014-12-28', 'cuti'),
(279, 19850726, '2014-12-29', 'masuk'),
(280, 19850726, '2014-12-30', 'masuk'),
(281, 19850726, '2014-12-31', 'masuk'),
(282, 12345679, '2014-12-01', 'masuk'),
(283, 12345679, '2014-12-02', 'masuk'),
(284, 12345679, '2014-12-03', 'masuk'),
(285, 12345679, '2014-12-04', 'masuk'),
(286, 12345679, '2014-12-05', 'masuk'),
(287, 12345679, '2014-12-06', 'masuk'),
(288, 12345679, '2014-12-07', 'masuk'),
(289, 12345679, '2014-12-08', 'masuk'),
(290, 12345679, '2014-12-09', 'masuk'),
(291, 12345679, '2014-12-10', 'masuk'),
(292, 12345679, '2014-12-11', 'masuk'),
(293, 12345679, '2014-12-12', 'masuk'),
(294, 12345679, '2014-12-13', 'masuk'),
(295, 12345679, '2014-12-14', 'masuk'),
(296, 12345679, '2014-12-15', 'masuk'),
(297, 12345679, '2014-12-16', 'masuk'),
(298, 12345679, '2014-12-17', 'masuk'),
(299, 12345679, '2014-12-18', 'masuk'),
(300, 12345679, '2014-12-19', 'masuk'),
(301, 12345679, '2014-12-20', 'masuk'),
(302, 12345679, '2014-12-21', 'masuk'),
(303, 12345679, '2014-12-22', 'masuk'),
(304, 12345679, '2014-12-23', 'masuk'),
(305, 12345679, '2014-12-24', 'masuk'),
(306, 12345679, '2014-12-25', 'masuk'),
(307, 12345679, '2014-12-26', 'masuk'),
(308, 12345679, '2014-12-27', 'masuk'),
(309, 12345679, '2014-12-28', 'masuk'),
(310, 12345679, '2014-12-29', 'masuk'),
(311, 12345679, '2014-12-30', 'masuk'),
(312, 12345679, '2014-12-31', 'masuk'),
(313, 12345678, '2014-11-01', 'masuk'),
(314, 12345678, '2014-11-02', 'masuk'),
(315, 12345678, '2014-11-03', 'masuk'),
(316, 12345678, '2014-11-04', 'masuk'),
(317, 12345678, '2014-11-05', 'masuk'),
(318, 12345678, '2014-11-06', 'masuk'),
(319, 12345678, '2014-11-07', 'masuk'),
(320, 12345678, '2014-11-08', 'masuk'),
(321, 12345678, '2014-11-09', 'masuk'),
(322, 12345678, '2014-11-10', 'masuk'),
(323, 12345678, '2014-11-11', 'masuk'),
(324, 12345678, '2014-11-12', 'masuk'),
(325, 12345678, '2014-11-13', 'masuk'),
(326, 12345678, '2014-11-14', 'masuk'),
(327, 12345678, '2014-11-15', 'masuk'),
(328, 12345678, '2014-11-16', 'masuk'),
(329, 12345678, '2014-11-17', 'masuk'),
(330, 12345678, '2014-11-18', 'masuk'),
(331, 12345678, '2014-11-19', 'masuk'),
(332, 12345678, '2014-11-20', 'masuk'),
(333, 12345678, '2014-11-21', 'masuk'),
(334, 12345678, '2014-11-22', 'masuk'),
(335, 12345678, '2014-11-23', 'masuk'),
(336, 12345678, '2014-11-24', 'masuk'),
(337, 12345678, '2014-11-25', 'masuk'),
(338, 12345678, '2014-11-26', 'masuk'),
(339, 12345678, '2014-11-27', 'masuk'),
(340, 12345678, '2014-11-28', 'masuk'),
(341, 12345678, '2014-11-29', 'masuk'),
(342, 12345678, '2014-11-30', 'masuk'),
(343, 19850726, '2014-11-01', 'masuk'),
(344, 19850726, '2014-11-02', 'masuk'),
(345, 19850726, '2014-11-03', 'masuk'),
(346, 19850726, '2014-11-04', 'masuk'),
(347, 19850726, '2014-11-05', 'masuk'),
(348, 19850726, '2014-11-06', 'masuk'),
(349, 19850726, '2014-11-07', 'masuk'),
(350, 19850726, '2014-11-08', 'masuk'),
(351, 19850726, '2014-11-09', 'masuk'),
(352, 19850726, '2014-11-10', 'masuk'),
(353, 19850726, '2014-11-11', 'masuk'),
(354, 19850726, '2014-11-12', 'masuk'),
(355, 19850726, '2014-11-13', 'masuk'),
(356, 19850726, '2014-11-14', 'masuk'),
(357, 19850726, '2014-11-15', 'masuk'),
(358, 19850726, '2014-11-16', 'masuk'),
(359, 19850726, '2014-11-17', 'masuk'),
(360, 19850726, '2014-11-18', 'masuk'),
(361, 19850726, '2014-11-19', 'masuk'),
(362, 19850726, '2014-11-20', 'masuk'),
(363, 19850726, '2014-11-21', 'masuk'),
(364, 19850726, '2014-11-22', 'masuk'),
(365, 19850726, '2014-11-23', 'masuk'),
(366, 19850726, '2014-11-24', 'masuk'),
(367, 19850726, '2014-11-25', 'masuk'),
(368, 19850726, '2014-11-26', 'masuk'),
(369, 19850726, '2014-11-27', 'masuk'),
(370, 19850726, '2014-11-28', 'masuk'),
(371, 19850726, '2014-11-29', 'masuk'),
(372, 19850726, '2014-11-30', 'masuk'),
(373, 12345679, '2014-11-01', 'masuk'),
(374, 12345679, '2014-11-02', 'masuk'),
(375, 12345679, '2014-11-03', 'masuk'),
(376, 12345679, '2014-11-04', 'masuk'),
(377, 12345679, '2014-11-05', 'masuk'),
(378, 12345679, '2014-11-06', 'masuk'),
(379, 12345679, '2014-11-07', 'masuk'),
(380, 12345679, '2014-11-08', 'masuk'),
(381, 12345679, '2014-11-09', 'masuk'),
(382, 12345679, '2014-11-10', 'masuk'),
(383, 12345679, '2014-11-11', 'masuk'),
(384, 12345679, '2014-11-12', 'masuk'),
(385, 12345679, '2014-11-13', 'masuk'),
(386, 12345679, '2014-11-14', 'masuk'),
(387, 12345679, '2014-11-15', 'masuk'),
(388, 12345679, '2014-11-16', 'masuk'),
(389, 12345679, '2014-11-17', 'masuk'),
(390, 12345679, '2014-11-18', 'masuk'),
(391, 12345679, '2014-11-19', 'masuk'),
(392, 12345679, '2014-11-20', 'masuk'),
(393, 12345679, '2014-11-21', 'masuk'),
(394, 12345679, '2014-11-22', 'masuk'),
(395, 12345679, '2014-11-23', 'masuk'),
(396, 12345679, '2014-11-24', 'masuk'),
(397, 12345679, '2014-11-25', 'masuk'),
(398, 12345679, '2014-11-26', 'masuk'),
(399, 12345679, '2014-11-27', 'masuk'),
(400, 12345679, '2014-11-28', 'masuk'),
(401, 12345679, '2014-11-29', 'masuk'),
(402, 12345679, '2014-11-30', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE IF NOT EXISTS `gaji` (
`id_gaji` int(11) NOT NULL,
  `nip_gaji` varchar(8) NOT NULL,
  `jabatan_gaji` varchar(25) DEFAULT NULL,
  `bulan_gaji` varchar(10) NOT NULL DEFAULT '',
  `tahun_gaji` year(4) NOT NULL,
  `gapok_gaji` double NOT NULL,
  `gakeh_gaji` double NOT NULL,
  `tunja_gaji` double NOT NULL,
  `kotor_gaji` double NOT NULL,
  `netto_tahun_gaji` double NOT NULL,
  `ptkp_tahun_gaji` double NOT NULL,
  `pkp_tahun_gaji` double NOT NULL,
  `persen_gaji` int(11) NOT NULL,
  `pph_tahun_gaji` double NOT NULL,
  `pph_bulan_gaji` double NOT NULL,
  `bersih_gaji` double NOT NULL,
  `masuk` int(11) DEFAULT '0',
  `off` int(11) DEFAULT '0',
  `cuti` int(11) DEFAULT '0',
  `sakit` int(11) DEFAULT '0',
  `alpa` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `nip_gaji`, `jabatan_gaji`, `bulan_gaji`, `tahun_gaji`, `gapok_gaji`, `gakeh_gaji`, `tunja_gaji`, `kotor_gaji`, `netto_tahun_gaji`, `ptkp_tahun_gaji`, `pkp_tahun_gaji`, `persen_gaji`, `pph_tahun_gaji`, `pph_bulan_gaji`, `bersih_gaji`, `masuk`, `off`, `cuti`, `sakit`, `alpa`) VALUES
(30, '12345678', 'manager', 'November', 2014, 1861000, 1500000, 1000000, 4361000, 52332000, 15840000, 36492000, 5, 1824600, 152050, 4208950, 30, 0, 0, 0, 0),
(31, '19850726', 'kasir', 'November', 2014, 1361000, 1080000, 500000, 2941000, 35292000, 18480000, 16812000, 5, 840600, 70050, 2870950, 30, 0, 0, 0, 0),
(33, '12345678', 'manager', 'Desember', 2014, 1861000, 1500000, 1000000, 4361000, 52332000, 15840000, 36492000, 5, 1824600, 152050, 4208950, 30, 0, 0, 1, 0),
(35, '12345679', 'supervisor', 'Desember', 2014, 1561000, 1240000, 800000, 3601000, 43212000, 19800000, 23412000, 5, 1170600, 97550, 3503450, 31, 0, 0, 0, 0),
(36, '19850726', 'kasir', 'Desember', 2014, 1361000, 972000, 500000, 2833000, 33996000, 18480000, 15516000, 5, 775800, 64650, 2768350, 27, 0, 2, 1, 1),
(37, '12345679', 'supervisor', 'November', 2014, 1561000, 1160000, 800000, 3521000, 42252000, 19800000, 22452000, 5, 1122600, 93550, 3427450, 29, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(25) NOT NULL DEFAULT '',
  `gaji_pokok` double NOT NULL,
  `gaji_kehadiran` double NOT NULL,
  `tunjangan` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `gaji_pokok`, `gaji_kehadiran`, `tunjangan`) VALUES
(6, 'kasir', 1361000, 36000, 500000),
(7, 'supervisor', 1561000, 40000, 800000),
(8, 'manager', 1861000, 50000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` varchar(8) NOT NULL DEFAULT '',
  `nama_pegawai` varchar(100) NOT NULL DEFAULT '',
  `jabatan_pegawai` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL DEFAULT '',
  `tlp_pegawai` varchar(12) NOT NULL DEFAULT '',
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(50) NOT NULL DEFAULT '',
  `tgl_lahir` date NOT NULL,
  `status_kawin` varchar(10) NOT NULL DEFAULT '0',
  `npwp_pegawai` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `jabatan_pegawai`, `alamat`, `tlp_pegawai`, `jenis_kelamin`, `agama`, `tgl_lahir`, `status_kawin`, `npwp_pegawai`) VALUES
('19850726', 'Setia', 6, 'Bekasid', '081234567890', 'Perempuan', 'islam', '2014-12-26', 'K1', '99-999-999-9-999-999'),
('12345678', 'Fanny', 8, 'pekayon', '085678901234', 'Perempuan', 'kristen protestan', '2014-12-24', 'TK', '33-333-333-3-333-333'),
('12345679', 'Zainal', 7, 'Jakarta Pusat', '081234567891', 'Perempuan', 'hindu', '2014-12-01', 'K2', '22-222-222-2-222-222');

-- --------------------------------------------------------

--
-- Table structure for table `ptkp`
--

CREATE TABLE IF NOT EXISTS `ptkp` (
  `kode_ptkp` varchar(5) NOT NULL,
  `nama_ptkp` varchar(50) NOT NULL DEFAULT '',
  `nilai_ptkp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ptkp`
--

INSERT INTO `ptkp` (`kode_ptkp`, `nama_ptkp`, `nilai_ptkp`) VALUES
('K0', 'Kawin tanpa tanggungan', 17160000),
('K1', 'Kawin satu tanggungan', 18480000),
('K2', 'Kawin dua tanggungan', 19800000),
('K3', 'Kawin tiga tanggungan', 21120000),
('TK', 'Tidak Kawin', 15840000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL DEFAULT '',
  `username` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `level` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Hari', 'hari', '81dc9bdb52d04dc20036dbd8313ed055 ', 'admin'),
(3, 'tyo', 'tyo', '81dc9bdb52d04dc20036dbd83', 'manager'),
(5, 'koko', 'koko66', '81dc9bdb52d04dc20036dbd83', 'manager'),
(14, 'asd', 'ddd', '81dc9bdb52d04dc20036dbd83', 'manager'),
(8, 'ahmad', 'ahamdasd', '81dc9bdb52d04dc20036dbd83', 'admin'),
(13, 'kiki', '8989', '81dc9bdb52d04dc20036dbd83', 'admin'),
(10, 'harisasdasdad', 'username baru', '81dc9bdb52d04dc20036dbd83', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
 ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
 ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `ptkp`
--
ALTER TABLE `ptkp`
 ADD PRIMARY KEY (`kode_ptkp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=403;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
