-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 03:24 PM
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
(11, 'pernyataan 5', 1),
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
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_respon`
--

INSERT INTO `tb_respon` (`id`, `id_user`, `id_kriteria`, `id_variabel`, `jawabanskala`, `skalasts`, `skalats`, `skalas`, `skalass`, `tanggal`) VALUES
(61, 201, 1, 1, 3, 0, 0, 3, 0, '0000-00-00'),
(62, 201, 3, 1, 3, 0, 0, 3, 0, '0000-00-00'),
(63, 201, 4, 1, 2, 0, 1, 0, 0, '0000-00-00'),
(64, 201, 5, 1, 2, 0, 1, 0, 0, '0000-00-00'),
(65, 201, 6, 1, 3, 0, 0, 3, 0, '0000-00-00'),
(66, 201, 7, 2, 2, 0, 1, 0, 0, '0000-00-00'),
(67, 201, 8, 2, 2, 0, 1, 0, 0, '0000-00-00'),
(68, 201, 9, 2, 3, 0, 0, 3, 0, '0000-00-00'),
(69, 201, 10, 2, 3, 0, 0, 3, 0, '0000-00-00'),
(70, 201, 11, 2, 4, 0, 0, 0, 1, '0000-00-00'),
(71, 201, 12, 3, 3, 0, 0, 3, 0, '0000-00-00'),
(72, 201, 13, 3, 3, 0, 0, 3, 0, '0000-00-00'),
(73, 201, 14, 3, 4, 0, 0, 0, 1, '0000-00-00'),
(74, 201, 15, 3, 4, 0, 0, 0, 1, '0000-00-00'),
(75, 201, 16, 3, 4, 0, 0, 0, 1, '0000-00-00'),
(76, 201, 17, 4, 3, 0, 0, 3, 0, '0000-00-00'),
(77, 201, 18, 4, 3, 0, 0, 3, 0, '0000-00-00'),
(78, 201, 19, 4, 3, 0, 0, 3, 0, '0000-00-00'),
(79, 201, 20, 4, 2, 0, 1, 0, 0, '0000-00-00'),
(80, 201, 21, 4, 4, 0, 0, 0, 1, '0000-00-00'),
(81, 201, 22, 5, 3, 0, 0, 3, 0, '0000-00-00'),
(82, 201, 23, 5, 3, 0, 0, 3, 0, '0000-00-00'),
(83, 201, 24, 5, 3, 0, 0, 3, 0, '0000-00-00'),
(84, 201, 25, 5, 4, 0, 0, 0, 1, '0000-00-00'),
(85, 201, 26, 5, 4, 0, 0, 0, 1, '0000-00-00'),
(86, 201, 27, 6, 3, 0, 0, 3, 0, '0000-00-00'),
(87, 201, 28, 6, 3, 0, 0, 3, 0, '0000-00-00'),
(88, 201, 29, 6, 3, 0, 0, 3, 0, '0000-00-00'),
(89, 201, 30, 6, 4, 0, 0, 0, 1, '0000-00-00'),
(90, 201, 31, 6, 4, 0, 0, 0, 1, '0000-00-00'),
(91, 202, 1, 1, 3, 0, 0, 0, 1, '0000-00-00'),
(92, 202, 3, 1, 4, 0, 0, 0, 1, '0000-00-00'),
(93, 202, 4, 1, 3, 0, 0, 3, 0, '0000-00-00'),
(94, 202, 5, 1, 3, 0, 0, 3, 0, '0000-00-00'),
(95, 202, 6, 1, 4, 0, 0, 0, 1, '0000-00-00'),
(96, 202, 7, 2, 4, 0, 0, 0, 1, '0000-00-00'),
(97, 202, 8, 2, 4, 0, 0, 0, 1, '0000-00-00'),
(98, 202, 9, 2, 4, 0, 0, 0, 1, '0000-00-00'),
(99, 202, 10, 2, 3, 0, 0, 3, 0, '0000-00-00'),
(100, 202, 11, 2, 3, 0, 0, 3, 0, '0000-00-00'),
(101, 202, 12, 3, 3, 0, 0, 3, 0, '0000-00-00'),
(102, 202, 13, 3, 3, 0, 0, 3, 0, '0000-00-00'),
(103, 202, 14, 3, 3, 0, 0, 3, 0, '0000-00-00'),
(104, 202, 15, 3, 4, 0, 0, 0, 1, '0000-00-00'),
(105, 202, 16, 3, 4, 0, 0, 0, 1, '0000-00-00'),
(106, 202, 17, 4, 3, 0, 0, 3, 0, '0000-00-00'),
(107, 202, 18, 4, 3, 0, 0, 3, 0, '0000-00-00'),
(108, 202, 19, 4, 3, 0, 0, 3, 0, '0000-00-00'),
(109, 202, 20, 4, 4, 0, 0, 0, 1, '0000-00-00'),
(110, 202, 21, 4, 4, 0, 0, 0, 1, '0000-00-00'),
(111, 202, 22, 5, 3, 0, 0, 3, 0, '0000-00-00'),
(112, 202, 23, 5, 3, 0, 0, 3, 0, '0000-00-00'),
(113, 202, 24, 5, 3, 0, 0, 3, 0, '0000-00-00'),
(114, 202, 25, 5, 4, 0, 0, 0, 1, '0000-00-00'),
(115, 202, 26, 5, 4, 0, 0, 0, 1, '0000-00-00'),
(116, 202, 27, 6, 3, 0, 0, 3, 0, '0000-00-00'),
(117, 202, 28, 6, 3, 0, 0, 3, 0, '0000-00-00'),
(118, 202, 29, 6, 3, 0, 0, 3, 0, '0000-00-00'),
(119, 202, 30, 6, 4, 0, 0, 0, 1, '0000-00-00'),
(120, 202, 31, 6, 4, 0, 0, 0, 1, '0000-00-00'),
(721, 203, 1, 1, 4, 0, 0, 0, 4, '2022-11-09'),
(722, 203, 3, 1, 4, 0, 0, 0, 4, '2022-11-09'),
(723, 203, 4, 1, 3, 0, 0, 3, 0, '2022-11-09'),
(724, 203, 5, 1, 3, 0, 0, 3, 0, '2022-11-09'),
(725, 203, 6, 1, 1, 1, 0, 0, 0, '2022-11-09'),
(726, 203, 11, 1, 2, 0, 2, 0, 0, '2022-11-09'),
(727, 203, 7, 2, 3, 0, 0, 3, 0, '2022-11-09'),
(728, 203, 8, 2, 2, 0, 2, 0, 0, '2022-11-09'),
(729, 203, 9, 2, 4, 0, 0, 0, 4, '2022-11-09'),
(730, 203, 10, 2, 1, 1, 0, 0, 0, '2022-11-09'),
(731, 203, 12, 3, 3, 0, 0, 3, 0, '2022-11-09'),
(732, 203, 13, 3, 3, 0, 0, 3, 0, '2022-11-09'),
(733, 203, 14, 3, 4, 0, 0, 0, 4, '2022-11-09'),
(734, 203, 15, 3, 4, 0, 0, 0, 4, '2022-11-09'),
(735, 203, 16, 3, 2, 0, 2, 0, 0, '2022-11-09'),
(736, 203, 17, 4, 3, 0, 0, 3, 0, '2022-11-09'),
(737, 203, 18, 4, 3, 0, 0, 3, 0, '2022-11-09'),
(738, 203, 19, 4, 2, 0, 2, 0, 0, '2022-11-09'),
(739, 203, 20, 4, 2, 0, 2, 0, 0, '2022-11-09'),
(740, 203, 21, 4, 1, 1, 0, 0, 0, '2022-11-09'),
(741, 203, 22, 5, 3, 0, 0, 3, 0, '2022-11-09'),
(742, 203, 23, 5, 3, 0, 0, 3, 0, '2022-11-09'),
(743, 203, 24, 5, 4, 0, 0, 0, 4, '2022-11-09'),
(744, 203, 25, 5, 4, 0, 0, 0, 4, '2022-11-09'),
(745, 203, 26, 5, 2, 0, 2, 0, 0, '2022-11-09'),
(746, 203, 27, 6, 3, 0, 0, 3, 0, '2022-11-09'),
(747, 203, 28, 6, 3, 0, 0, 3, 0, '2022-11-09'),
(748, 203, 29, 6, 1, 1, 0, 0, 0, '2022-11-09'),
(749, 203, 30, 6, 4, 0, 0, 0, 4, '2022-11-09'),
(750, 203, 31, 6, 1, 1, 0, 0, 0, '2022-11-09');

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
(2, 'admin2', '-', '0000-00-00', 1, 1, 1, '$2y$10$reCuu48yLVpqH/2p4v.O5.rA.sycsHJ1Ky64H5bfcFcrZP25g3yke'),
(201, 'Maun', 'Aceh Jaya', '2002-02-19', 2, 2, 2, '$2y$10$6QiI6B.3/LdKDcxLEZmP.uzht9n/XgbbIwdreJAxCNizlc4PBYZ6i'),
(202, 'umar', 'aceh tamiang', '1999-02-21', 5, 1, 2, '$2y$10$6QiI6B.3/LdKDcxLEZmP.uzht9n/XgbbIwdreJAxCNizlc4PBYZ6i'),
(203, 'itsna', 'meulaboh', '2000-12-05', 1, 2, 2, '$2y$10$i6VcYRCPT642M9oSZDPuqOiXYbk8jvE4PwxmBRBm1FWEqu0Ssq8Qm');

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
(2, 1, 'STSS'),
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
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_respon`
--
ALTER TABLE `tb_respon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=751;

--
-- AUTO_INCREMENT for table `tb_skalalikert`
--
ALTER TABLE `tb_skalalikert`
  MODIFY `id_skalalikert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
