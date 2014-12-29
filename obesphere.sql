-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2014 at 10:19 PM
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
  `id_pegawai_fk_absen` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket_absen` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_pegawai_fk_absen`, `tgl_absen`, `ket_absen`) VALUES
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
(219, 17, '2015-02-27', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE IF NOT EXISTS `gaji` (
`id_gaji` int(11) NOT NULL,
  `id_pegawai_gaji` int(11) NOT NULL,
  `bulan_gaji` varchar(255) NOT NULL,
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
  `bersih_gaji` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_pegawai_gaji`, `bulan_gaji`, `tahun_gaji`, `gapok_gaji`, `gakeh_gaji`, `tunja_gaji`, `kotor_gaji`, `netto_tahun_gaji`, `ptkp_tahun_gaji`, `pkp_tahun_gaji`, `persen_gaji`, `pph_tahun_gaji`, `pph_bulan_gaji`, `bersih_gaji`) VALUES
(8, 19, 'Desember', 2014, 1561000, 1080000, 800000, 3441000, 41292000, 18480000, 22812000, 5, 1140600, 95050, 3345950),
(9, 20, 'Desember', 2014, 1861000, 1400000, 1000000, 4261000, 51132000, 19800000, 31332000, 5, 1566600, 130550, 4130450),
(11, 18, 'Desember', 2014, 1361000, 936000, 500000, 2797000, 33564000, 15840000, 17724000, 5, 886200, 73850, 2723150),
(13, 19, 'November', 2014, 1561000, 960000, 800000, 3321000, 39852000, 18480000, 21372000, 5, 1068600, 89050, 3231950),
(14, 17, 'Desember', 2014, 1361000, 1008000, 500000, 2869000, 34428000, 15840000, 18588000, 5, 929400, 77450, 2791550);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `gaji_kehadiran` double NOT NULL,
  `tunjangan` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
`id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `nip` varchar(8) NOT NULL,
  `jabatan_pegawai` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tlp_pegawai` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status_kawin` int(11) NOT NULL,
  `npwp_pegawai` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `jabatan_pegawai`, `alamat`, `tlp_pegawai`, `jenis_kelamin`, `agama`, `tgl_lahir`, `status_kawin`, `npwp_pegawai`) VALUES
(20, 'Zainal', '98888768', 8, 'Jakarta Pusat', '085654327865', 'Laki-laki', 'islam', '1990-10-30', 5, '88-382-838-2-783-787'),
(18, 'Agus', '982938', 6, 'Bekasi', '081234567899', 'Laki-laki', 'islam', '1990-03-01', 1, '32-999-289-8-292-992'),
(19, 'Putri', '232343', 7, 'Bekasi', '085678901234', 'Laki-laki', 'islam', '1990-06-12', 4, '76-726-673-7-727-273'),
(17, 'Fanny', '878787', 6, 'Jakarta Timur', '081234567890', 'Perempuan', 'islam', '1990-02-06', 1, '81-298-998-9-898-989');

-- --------------------------------------------------------

--
-- Table structure for table `ptkp`
--

CREATE TABLE IF NOT EXISTS `ptkp` (
`id_ptkp` int(11) NOT NULL,
  `kode_ptkp` varchar(5) NOT NULL,
  `nama_ptkp` varchar(255) NOT NULL,
  `nilai_ptkp` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ptkp`
--

INSERT INTO `ptkp` (`id_ptkp`, `kode_ptkp`, `nama_ptkp`, `nilai_ptkp`) VALUES
(1, 'TK', 'Tidak Kawin', 15840000),
(3, 'K0', 'Kawin tanpa tanggungan', 17160000),
(4, 'K1', 'Kawin satu tanggungan', 18480000),
(5, 'K2', 'Kawin dua tanggungan', 19800000),
(6, 'K3', 'Kawin tiga tanggungan', 21120000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Hari', 'hari', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(3, 'tyo', 'tyo', '81dc9bdb52d04dc20036dbd8313ed055', 'manager'),
(5, 'koko', 'koko66', '81dc9bdb52d04dc20036dbd8313ed055', 'manager'),
(14, 'asd', 'ddd', '81dc9bdb52d04dc20036dbd8313ed055', 'manager'),
(8, 'ahmad', 'ahamdasd', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(13, 'kiki', '8989', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(10, 'harisasdasdad', 'username baru', '81dc9bdb52d04dc20036dbd8313ed055', 'manager');

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
 ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `ptkp`
--
ALTER TABLE `ptkp`
 ADD PRIMARY KEY (`id_ptkp`);

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
MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=220;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ptkp`
--
ALTER TABLE `ptkp`
MODIFY `id_ptkp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
