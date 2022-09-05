-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 07:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-simrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Kepala Bidang'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(128) NOT NULL,
  `id_variabel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `id_variabel`) VALUES
(1, 'Pernyataan 1	\r\n', 1),
(3, 'pernyataan 2', 1),
(4, 'pernyataan 3', 1),
(5, 'pernyataan 4', 1),
(6, 'Pernyataan 5', 1),
(7, 'Pernyataan 1', 2),
(8, 'pernyataan 2', 2),
(9, 'pernyataan 3', 2),
(10, 'Pernyataan 4', 2),
(11, 'Pernyataan 5', 2),
(12, 'Pernyataan 1', 3),
(13, 'Pernyataan 2', 3),
(14, 'Pernyataan 3', 3),
(15, 'Pernyataan 4', 3),
(16, 'Pernyataan 5', 3),
(17, 'Pernyataan 1', 4),
(18, 'Pernyataan 2', 4),
(19, 'Pernyataan 3', 4),
(20, 'Pernyataan 4', 4),
(21, 'Pernyataan 5', 4),
(22, 'Pernyataan 1', 5),
(23, 'Pernyataan 2', 5),
(24, 'Pernyataan 3', 5),
(25, 'Pernyataan 4', 5),
(26, 'Pernyataan 5', 5),
(27, 'Pernyataan 1', 6),
(28, 'Pernyataan 2', 6),
(29, 'Pernyataan 3', 6),
(30, 'Pernyataan 4', 6),
(31, 'Pernyataan 5', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'sma'),
(2, 'D-III'),
(3, 'D-IV'),
(4, 'S-1'),
(5, 'S-2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_respon`
--

CREATE TABLE `tb_respon` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `jawabanskala` int(11) NOT NULL,
  `skalasts` int(11) NOT NULL,
  `skalats` int(11) NOT NULL,
  `skalas` int(11) NOT NULL,
  `skalass` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_respon`
--

INSERT INTO `tb_respon` (`id`, `id_user`, `id_kriteria`, `id_variabel`, `jawabanskala`, `skalasts`, `skalats`, `skalas`, `skalass`, `tanggal`) VALUES
(61, 201, 1, 1, 3, 0, 0, 3, 0, 1661960353),
(62, 201, 3, 1, 3, 0, 0, 3, 0, 1661960353),
(63, 201, 4, 1, 2, 0, 1, 0, 0, 1661960353),
(64, 201, 5, 1, 2, 0, 1, 0, 0, 1661960353),
(65, 201, 6, 1, 3, 0, 0, 3, 0, 1661960353),
(66, 201, 7, 2, 2, 0, 1, 0, 0, 1661960353),
(67, 201, 8, 2, 2, 0, 1, 0, 0, 1661960353),
(68, 201, 9, 2, 3, 0, 0, 3, 0, 1661960353),
(69, 201, 10, 2, 3, 0, 0, 3, 0, 1661960353),
(70, 201, 11, 2, 4, 0, 0, 0, 1, 1661960353),
(71, 201, 12, 3, 3, 0, 0, 3, 0, 1661960353),
(72, 201, 13, 3, 3, 0, 0, 3, 0, 1661960353),
(73, 201, 14, 3, 4, 0, 0, 0, 1, 1661960353),
(74, 201, 15, 3, 4, 0, 0, 0, 1, 1661960353),
(75, 201, 16, 3, 4, 0, 0, 0, 1, 1661960353),
(76, 201, 17, 4, 3, 0, 0, 3, 0, 1661960353),
(77, 201, 18, 4, 3, 0, 0, 3, 0, 1661960353),
(78, 201, 19, 4, 3, 0, 0, 3, 0, 1661960353),
(79, 201, 20, 4, 2, 0, 1, 0, 0, 1661960353),
(80, 201, 21, 4, 4, 0, 0, 0, 1, 1661960353),
(81, 201, 22, 5, 3, 0, 0, 3, 0, 1661960353),
(82, 201, 23, 5, 3, 0, 0, 3, 0, 1661960353),
(83, 201, 24, 5, 3, 0, 0, 3, 0, 1661960353),
(84, 201, 25, 5, 4, 0, 0, 0, 1, 1661960353),
(85, 201, 26, 5, 4, 0, 0, 0, 1, 1661960353),
(86, 201, 27, 6, 3, 0, 0, 3, 0, 1661960353),
(87, 201, 28, 6, 3, 0, 0, 3, 0, 1661960353),
(88, 201, 29, 6, 3, 0, 0, 3, 0, 1661960353),
(89, 201, 30, 6, 4, 0, 0, 0, 1, 1661960353),
(90, 201, 31, 6, 4, 0, 0, 0, 1, 1661960353),
(91, 202, 1, 1, 3, 0, 0, 0, 1, 1662265551),
(92, 202, 3, 1, 4, 0, 0, 0, 1, 1662265551),
(93, 202, 4, 1, 3, 0, 0, 3, 0, 1662265551),
(94, 202, 5, 1, 3, 0, 0, 3, 0, 1662265551),
(95, 202, 6, 1, 4, 0, 0, 0, 1, 1662265551),
(96, 202, 7, 2, 4, 0, 0, 0, 1, 1662265551),
(97, 202, 8, 2, 4, 0, 0, 0, 1, 1662265551),
(98, 202, 9, 2, 4, 0, 0, 0, 1, 1662265551),
(99, 202, 10, 2, 3, 0, 0, 3, 0, 1662265551),
(100, 202, 11, 2, 3, 0, 0, 3, 0, 1662265551),
(101, 202, 12, 3, 3, 0, 0, 3, 0, 1662265551),
(102, 202, 13, 3, 3, 0, 0, 3, 0, 1662265551),
(103, 202, 14, 3, 3, 0, 0, 3, 0, 1662265551),
(104, 202, 15, 3, 4, 0, 0, 0, 1, 1662265551),
(105, 202, 16, 3, 4, 0, 0, 0, 1, 1662265551),
(106, 202, 17, 4, 3, 0, 0, 3, 0, 1662265551),
(107, 202, 18, 4, 3, 0, 0, 3, 0, 1662265551),
(108, 202, 19, 4, 3, 0, 0, 3, 0, 1662265551),
(109, 202, 20, 4, 4, 0, 0, 0, 1, 1662265551),
(110, 202, 21, 4, 4, 0, 0, 0, 1, 1662265551),
(111, 202, 22, 5, 3, 0, 0, 3, 0, 1662265551),
(112, 202, 23, 5, 3, 0, 0, 3, 0, 1662265551),
(113, 202, 24, 5, 3, 0, 0, 3, 0, 1662265551),
(114, 202, 25, 5, 4, 0, 0, 0, 1, 1662265551),
(115, 202, 26, 5, 4, 0, 0, 0, 1, 1662265551),
(116, 202, 27, 6, 3, 0, 0, 3, 0, 1662265551),
(117, 202, 28, 6, 3, 0, 0, 3, 0, 1662265551),
(118, 202, 29, 6, 3, 0, 0, 3, 0, 1662265551),
(119, 202, 30, 6, 4, 0, 0, 0, 1, 1662265551),
(120, 202, 31, 6, 4, 0, 0, 0, 1, 1662265551),
(121, 203, 1, 1, 2, 0, 1, 0, 0, 1662399271),
(122, 203, 3, 1, 3, 0, 0, 3, 0, 1662399271),
(123, 203, 4, 1, 1, 1, 0, 0, 0, 1662399271),
(124, 203, 5, 1, 1, 1, 0, 0, 0, 1662399271),
(125, 203, 6, 1, 3, 0, 0, 3, 0, 1662399271),
(126, 203, 7, 2, 2, 0, 1, 0, 0, 1662399271),
(127, 203, 8, 2, 2, 0, 1, 0, 0, 1662399271),
(128, 203, 9, 2, 4, 0, 0, 0, 1, 1662399271),
(129, 203, 10, 2, 4, 0, 0, 0, 1, 1662399271),
(130, 203, 11, 2, 3, 0, 0, 3, 0, 1662399271),
(131, 203, 12, 3, 3, 0, 0, 3, 0, 1662399271),
(132, 203, 13, 3, 3, 0, 0, 3, 0, 1662399271),
(133, 203, 14, 3, 4, 0, 0, 0, 1, 1662399271),
(134, 203, 15, 3, 4, 0, 0, 0, 1, 1662399271),
(135, 203, 16, 3, 2, 0, 1, 0, 0, 1662399271),
(136, 203, 17, 4, 3, 0, 0, 3, 0, 1662399271),
(137, 203, 18, 4, 3, 0, 0, 3, 0, 1662399271),
(138, 203, 19, 4, 4, 0, 0, 0, 1, 1662399271),
(139, 203, 20, 4, 4, 0, 0, 0, 1, 1662399271),
(140, 203, 21, 4, 2, 0, 1, 0, 0, 1662399271),
(141, 203, 22, 5, 3, 0, 0, 3, 0, 1662399271),
(142, 203, 23, 5, 3, 0, 0, 3, 0, 1662399271),
(143, 203, 24, 5, 4, 0, 0, 0, 1, 1662399271),
(144, 203, 25, 5, 4, 0, 0, 0, 1, 1662399271),
(145, 203, 26, 5, 2, 0, 1, 0, 0, 1662399271),
(146, 203, 27, 6, 3, 0, 0, 3, 0, 1662399271),
(147, 203, 28, 6, 3, 0, 0, 3, 0, 1662399271),
(148, 203, 29, 6, 4, 0, 0, 0, 1, 1662399271),
(149, 203, 30, 6, 4, 0, 0, 0, 1, 1662399271),
(150, 203, 31, 6, 3, 0, 0, 3, 0, 1662399271);

-- --------------------------------------------------------

--
-- Table structure for table `tb_responden`
--

CREATE TABLE `tb_responden` (
  `id_responden` int(11) NOT NULL,
  `nama_responden` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_responden`
--

INSERT INTO `tb_responden` (`id_responden`, `nama_responden`, `tempat_lahir`, `tanggal_lahir`, `id_pendidikan`, `id_jabatan`, `role_id`, `password`) VALUES
(1, 'admin', 'banda aceh', '2000-02-02', 4, 1, 1, '$2y$10$qj1029tneTWMfYOuJ9X3AeIFbEUnCT74Tz0s6jwG0D5AUjY004ggO'),
(201, 'Maun', 'Aceh Jaya', '2002-02-19', 2, 2, 2, '$2y$10$6QiI6B.3/LdKDcxLEZmP.uzht9n/XgbbIwdreJAxCNizlc4PBYZ6i'),
(202, 'umar', 'aceh tamiang', '1999-02-21', 5, 1, 2, '$2y$10$6QiI6B.3/LdKDcxLEZmP.uzht9n/XgbbIwdreJAxCNizlc4PBYZ6i'),
(203, 'itsna', 'meulaboh', '2000-12-05', 1, 2, 2, '$2y$10$0p7SOiCZQYPUMEr7i4sLO.v2R544MkxRjOSJSoO98OYaJaoFPnR.a'),
(206, 'user', 'aceh tenggara', '2000-04-04', 1, 2, 2, '$2y$10$0p7SOiCZQYPUMEr7i4sLO.v2R544MkxRjOSJSoO98OYaJaoFPnR.a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skalalikert`
--

CREATE TABLE `tb_skalalikert` (
  `id_skalalikert` int(11) NOT NULL,
  `nilai` int(2) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_skalalikert`
--

INSERT INTO `tb_skalalikert` (`id_skalalikert`, `nilai`, `keterangan`) VALUES
(2, 1, 'STS'),
(3, 2, 'TS'),
(4, 3, 'S'),
(5, 4, 'SS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_variabel`
--

CREATE TABLE `tb_variabel` (
  `id_variabel` int(11) NOT NULL,
  `nm_variabel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_variabel`
--

INSERT INTO `tb_variabel` (`id_variabel`, `nm_variabel`) VALUES
(1, 'HUMAN'),
(2, 'ORGANISASI'),
(3, 'teknologi'),
(4, 'pengetahuan pengguna'),
(5, 'regulasi'),
(6, 'manfaat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_respon`
--
ALTER TABLE `tb_respon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_responden`
--
ALTER TABLE `tb_responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `tb_skalalikert`
--
ALTER TABLE `tb_skalalikert`
  ADD PRIMARY KEY (`id_skalalikert`);

--
-- Indexes for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_respon`
--
ALTER TABLE `tb_respon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tb_skalalikert`
--
ALTER TABLE `tb_skalalikert`
  MODIFY `id_skalalikert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
