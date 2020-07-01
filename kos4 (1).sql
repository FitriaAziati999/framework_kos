-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 05:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `useradmin` varchar(20) NOT NULL,
  `passadmin` varchar(256) NOT NULL,
  `noadmin` varchar(13) NOT NULL,
  `emailadmin` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `alamatadmin` varchar(50) NOT NULL,
  `is_activate` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `useradmin`, `passadmin`, `noadmin`, `emailadmin`, `image`, `alamatadmin`, `is_activate`, `date_create`) VALUES
(18, 'yais', '$2y$10$v3zPovR.gcx2g', '7889451616541', 'ferrysnainin@gmail.com', 'default.png', 'kraksaan', 1, 1593597257),
(19, 'ferrysnainin@gmail.c', '$2y$10$HwPFS9measPvX', '7889451616541', 'ferrysnainin05@gmail.com', 'default.png', 'kraksaan', 1, 1593597997),
(20, 'ODK', '$2y$10$Ko6HBMDirJuU5', '085123456789', 'khafid@polije.ac.id', 'default.png', 'kraksaan', 1, 1593598141),
(21, 'gojeng', '$2y$10$65nEmT3SOR1inyNoxgZ6h.PD/nGGdlB/Yi5ynOTJXSpXps3BAlsja', '7889451616541', 'ferrys.nainin@yahoo.com', 'default.png', 'kraksaan', 1, 1593611488),
(22, 'Fakhri', '$2y$10$rT.zEr1RIKo7yS9KKvBR.OYyR.PEdCbJTg/6gGTXLdLs1zF8l1mQ2', '085123456789', 'titi@gmail.com', 'default.jpg', 'kraksaan', 1, 1593614929);

-- --------------------------------------------------------

--
-- Table structure for table `datakos`
--

CREATE TABLE `datakos` (
  `id_kos` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `namakos` varchar(20) NOT NULL,
  `alamatkos` varchar(50) NOT NULL,
  `khususkos` varchar(10) NOT NULL,
  `fasilitaskos` varchar(100) NOT NULL,
  `lingkungankos` varchar(50) NOT NULL,
  `peraturankos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datakos`
--

INSERT INTO `datakos` (`id_kos`, `id_pemilik`, `namakos`, `alamatkos`, `khususkos`, `fasilitaskos`, `lingkungankos`, `peraturankos`) VALUES
(1, 1, 'Kos oren', 'Mastrip Timur 80 c sumber sari,jember', 'Putra', 'tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat mushola', 'Tidak boleh membawa anak perempuan ke kamar'),
(2, 1, 'Kos oren', 'Mastrip Timur 85 c sumber sari,jember', 'Putri', 'Spring bed,lemari,kamar mandi dalam', 'Dekat mushola', 'Tidak boleh membawa anak laki-laki ke kamar'),
(8, 2, 'kos bidadari', 'Batu raden A7', 'Putri', 'spring bed, lemari', 'Dekat Foodland, indomaret ', 'Tidak boleh membawa anak laki-laki ke kamar');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `userpem` varchar(20) NOT NULL,
  `passpem` varchar(20) NOT NULL,
  `namapem` varchar(25) NOT NULL,
  `alamatpem` varchar(50) NOT NULL,
  `nopem` varchar(13) NOT NULL,
  `emailpem` varchar(20) NOT NULL,
  `nikpem` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `userpem`, `passpem`, `namapem`, `alamatpem`, `nopem`, `emailpem`, `nikpem`) VALUES
(1, 'rammaboom', 'ramma123', 'Ramma Eka', 'Blitar', '083854132888', 'sindyra@gmail.com', '3509216806660001'),
(2, 'indyraaw', 'indy123', 'Indyra Ayu', 'Mastrip timur 80 C jember', '081333125829', 'rammaboom99@gmail.co', '3509216206770004');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `userpen` varchar(20) NOT NULL,
  `passpen` varchar(100) NOT NULL,
  `namapen` varchar(25) NOT NULL,
  `fotopen` varchar(25) NOT NULL,
  `jkpen` varchar(10) NOT NULL,
  `pekerjaanpen` varchar(20) NOT NULL,
  `nopen` varchar(13) NOT NULL,
  `alamatpen` varchar(50) NOT NULL,
  `emailpen` varchar(20) NOT NULL,
  `nikpen` varchar(16) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(2) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `userpen`, `passpen`, `namapen`, `fotopen`, `jkpen`, `pekerjaanpen`, `nopen`, `alamatpen`, `emailpen`, `nikpen`, `role_id`, `date_created`, `is_active`, `last_update`) VALUES
(8, 'Fitria99', 'e036d554c78aac6c96ca47db559b96d0', 'Fitria \'Aziati', 'IMG_20200606_0534311.jpg', 'Perempuan', 'PNS', '081333125829', 'Tenggilisrejo Rt2 RW 2 no 9, pasuruan, Jawa Timur', 'fitria@gmail.com', '3514234565320009', 2, '0000-00-00', 1, '0000-00-00'),
(9, 'bayu08', '92360c2c392c85b23f38c188996f8d74', 'Muhammad Bayu Pamungkas', 'default.jpg', 'Laki-Laki', 'Pelajar / Mahasiswa', '088217445916', 'Tenggilisrejo Rt2 RW 2 no 9, pasuruan, Jawa Timur', 'bayu@gmail.com', '3514234565320009', 2, '0000-00-00', 1, '0000-00-00'),
(10, 'faizah89', '37efd455d19e4dec14ca3f2398dbfd4b', 'Nur Faizah', 'default.jpg', 'Laki-Laki', 'Pelajar / Mahasiswa', '081232355252', 'Tenggilisrejo Rt2 RW 2 no 9, pasuruan, Jawa Timur', 'faizah@gmail.com', '3514234565320009', 2, '2020-06-26', 1, '2020-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `namakos` varchar(20) NOT NULL,
  `alamatkos` varchar(50) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `namapen` varchar(25) NOT NULL,
  `alamatpen` varchar(50) NOT NULL,
  `nopen` varchar(13) NOT NULL,
  `masuk_kos` varchar(10) NOT NULL,
  `rek_tujuan` varchar(25) NOT NULL,
  `rek_penyewa` varchar(25) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `namakos`, `alamatkos`, `harga`, `namapen`, `alamatpen`, `nopen`, `masuk_kos`, `rek_tujuan`, `rek_penyewa`, `tgl_bayar`, `status`, `bukti`, `id_kos`, `id_penyewa`, `id_kamar`) VALUES
(12, 'Kos oren', 'Mastrip Timur 80 c sumber sari,jember', '400000', 'Muhammad Bayu Pamungkas', 'Tenggilisrejo Rt2 RW 2 no 9, pasuruan, Jawa Timur', '088217445916', 'Januari', '0021-05-027783-999 (BRI)', '2001989799 (BCA)', '2020-06-28', 'Proses Verifika', '', 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipekamar`
--

CREATE TABLE `tipekamar` (
  `id_kamar` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `harga` int(10) NOT NULL,
  `penghuni` varchar(8) NOT NULL,
  `fasilitaskamar` varchar(100) NOT NULL,
  `fotokamar` varchar(25) NOT NULL,
  `id_kos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipekamar`
--

INSERT INTO `tipekamar` (`id_kamar`, `ukuran`, `status`, `harga`, `penghuni`, `fasilitaskamar`, `fotokamar`, `id_kos`) VALUES
(1, '3X3', 'Tersedia', 400000, '1 orang', 'spring bed, lemari', 'test3.jpg', 1),
(2, '4X4', 'Tersedia', 550000, '1 orang', 'spring bed, lemari, kamar mandi dalam', 'test3.jpg', 1),
(18, '3X3', 'Tersedia', 350000, '1 orang', 'spring bed, lemari', 'test3.jpg', 2),
(20, '3X4', 'Tidak tersedia', 450000, '1 orang', 'spring bed, lemari', 'test3.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `datakos`
--
ALTER TABLE `datakos`
  ADD PRIMARY KEY (`id_kos`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_kos` (`id_kos`),
  ADD KEY `id_penyewa` (`id_penyewa`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `tipekamar`
--
ALTER TABLE `tipekamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_kos` (`id_kos`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `datakos`
--
ALTER TABLE `datakos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tipekamar`
--
ALTER TABLE `tipekamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
