-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 07:17 PM
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
(2, 'hahha', 1),
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
(16, 'Pernyataan 5', 3);

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
-- Table structure for table `tb_responden`
--

CREATE TABLE `tb_responden` (
  `id_responden` int(11) NOT NULL,
  `nama_responden` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_responden`
--

INSERT INTO `tb_responden` (`id_responden`, `nama_responden`, `tempat_lahir`, `tanggal_lahir`, `id_pendidikan`, `id_jabatan`) VALUES
(201, 'Maun', 'Aceh Jaya', '2002-02-19', 2, 2),
(202, 'umar', 'aceh tamiang', '1999-02-21', 5, 1);

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
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
