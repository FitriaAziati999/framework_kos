-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 10:29 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
  `passadmin` varchar(20) NOT NULL,
  `noadmin` varchar(13) NOT NULL,
  `emailadmin` varchar(20) NOT NULL,
  `alamatadmin` varchar(50) NOT NULL,
  `nikadmin` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `useradmin`, `passadmin`, `noadmin`, `emailadmin`, `alamatadmin`, `nikadmin`) VALUES
(1, 'yais01', 'yais123', '083134920109', 'yais@gamil.com', 'jember', '3514556678900049'),
(2, 'ketrinamarga01', 'ketrina123', '081931594351', 'ketrina@gmail.com', 'jember', '3517556678900049'),
(5, 'ijak1409', 'ijak123', '085335718044', 'ijka@gmail.com', 'jember', '3514056678900049');

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
(1, 1, 'Kos oren', 'Mastrip Timur 80 c sumber sari,jember', 'Putra', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat mushola', 'Tidak boleh membawa anak perempuan ke kamar'),
(2, 1, 'Kos oren', 'Mastrip Timur 85 c sumber sari,jember', 'Putri', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat mushola', 'Tidak boleh membawa anak laki-laki ke kamar'),
(8, 2, 'kos bidadari', 'Batu raden A7', 'Putri', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat Foodland, indomaret ', 'Tidak boleh membawa anak laki-laki ke kamar'),
(9, 3, 'Kos PINK', 'Bangasalsari RT2 RW2, Jember, Jawa Timur', 'Putra', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat masjid ', 'Membayar kos tidak molor'),
(10, 4, 'Kos Batu urip', 'Ambulu RT1 RT2 , Jember, Jawa Timur', 'Putri', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat alfamart', 'Tidak boleh membawa anak laki ke kamar, Gerbang ko'),
(13, 5, 'Kos Wadon', 'Wirowongso RT 2 RW 1, Jember Jawa Timur', 'Putri', 'Tempat parkir, dapur', 'Dekat SMAN 1 wirowongso, Pasar', 'Tidak boleh membawa anak laki ke kamar, Gerbang ko'),
(15, 6, 'Kos ijo', 'Bangasalsari RT4 RW2, Jember, Jawa Timur', 'Putra', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat Foodland, alfamart, mushola, cuci motor', 'Membayar kos tepat waktu'),
(16, 6, 'Kos ijo', 'Bangasalsari RT3 RW2, Jember, Jawa Timur', 'Putri', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat Foodland, alfamart, mushola, cuci motor', 'Membayar kos tepat waktu'),
(19, 8, 'Star Kos', 'Jl Mastrip Gang 5 no 5B krajan timur , Sumbersari,', 'Putri', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat masjid,Dekat polije', 'Tidak boleh membawa anak laki ke kamar, Gerbang ko'),
(20, 8, 'Star Kos', 'Kiduladem ,Malang, Jawa Timur', 'Putri', 'Tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat masjid', 'Tidak boleh membawa anak laki ke kamar, Gerbang ko');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `userpem` varchar(20) NOT NULL,
  `passpem` varchar(20) NOT NULL,
  `namapem` varchar(25) NOT NULL,
  `alamatpem` varchar(100) NOT NULL,
  `nopem` varchar(13) NOT NULL,
  `emailpem` varchar(20) NOT NULL,
  `nikpem` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `userpem`, `passpem`, `namapem`, `alamatpem`, `nopem`, `emailpem`, `nikpem`) VALUES
(1, 'rammaboom', 'ramma123', 'Ramma Eka Putera', 'Perumahan Asri blok B6, Banyuwangi, Jawa Timur', '083854132888', 'rammaboom99@gmail.co', '3509216806660001'),
(2, 'indyraaw', 'indy123', 'Indyra Ayu Wijianti', 'Mastrip timur 80 C jember', '081333125829', 'indyraayu@gmail.com', '3509216206770004'),
(3, 'Eli_susanti', 'eli123', 'Eli Susanti', 'Perumahan Mastrip Timur 80,Gumuk kerang Rt4 Rw20,s', '081232355244', 'eli_susanti@gmail.co', '3509216806660001'),
(4, 'Ishrohidayati', 'ishro123', 'Ishro hidayati', 'Mastrip 5, Sumbersari, Jember', '081234587880', 'ishrohidayati@gmail.', '3509216206770004'),
(5, 'awna', 'azhar123', 'Azhar Wahyu ', 'Palang sari Rt2 Rw1 ', '089232353677', 'azhar_wahyu@gmail.co', '3509216206770004'),
(6, 'ijak', 'ihza123', 'Ihza oktavira', 'Bondowoso,Jember', '089032353677', 'ihza@gmail.com', '3509216206770004'),
(7, 'ketrinamarga', 'ketrin123', 'Ketrina', 'Banyuwangi', '085032353677', 'ketrina@gmail.com', '3509216206770004'),
(8, 'fitria', 'tria123', 'Fitria aziati', 'Tenngilis rejo Rt2 Rw1 , Jawa Timur', '089032353677', 'fitria@gmail.com', '3509216206770004'),
(9, 'siti', 'siti123', 'siti zahro', 'Mastrip 4, Sumbersari Jember', '089032353677', 'zahro@gmail.com', '3509216206770004'),
(10, 'bambang', 'budi123', 'Bambang Budi utomo', 'Mastrip 5, Sumbersari Jember', '089532353677', 'bambang@gmail.com', '3509216206770004');

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
  `alamatpen` varchar(100) NOT NULL,
  `emailpen` varchar(50) NOT NULL,
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
(8, 'Fitria99', 'd6d69331a0324bb43c6097d6f154b6d8', 'Fitria \'Aziati', 'IMG_20200606_0534311.jpg', 'Perempuan', 'Pelajar / Mahasiswa', '081333125899', 'Tenggilisrejo Rt2 RW 2 no 9, Pasuruan, Jawa Timur', 'fitria@gmail.com', '3514234565320009', 2, '2020-05-03', 1, '2020-06-30'),
(9, 'bayu08', '92360c2c392c85b23f38c188996f8d74', 'Muhammad Bayu Pamungkas', 'default.jpg', 'Laki-Laki', 'PNS', '088217445916', 'Tenggilisrejo Rt2 RW 2 no 9, Pasuruan, Jawa Timur', 'bayu@gmail.com', '3514234565320009', 2, '2020-05-18', 1, '2020-06-30'),
(10, 'faizah89', '67f27ddf40a0dd24fe50fbe33c4460bb', 'Nur Faizah', 'default.jpg', 'Laki-Laki', 'PNS', '081232355252', 'Tenggilisrejo Rt2 RW 2 no 9, Pasuruan, Jawa Timur', 'faizah@gmail.com', '3514234565320009', 2, '2020-06-26', 1, '2020-07-01'),
(11, 'Admin', '2d36571886fbd94dacb692151494e05d', 'Admin Kos Kita', 'default.jpg', 'Perempuan', 'Pelajar / Mahasiswa', '081333125829', 'Jember', 'koskita@gmail.com', '3578098087608801', 1, '2020-06-30', 1, '2020-06-30'),
(13, 'Malik', '5ddc47513696be03631bd326219bf74b', 'Abdul Malik', 'default.jpg', 'Laki-Laki', 'Wirausaha', '081333125820', 'Sidoarjo perumahan indah asri, Jawa Timur', 'abdulmalik@gmail.com', '3514234565320009', 2, '2020-07-01', 1, '2020-07-01'),
(14, 'Mercy', '375d9d714cbdd036829fb36ab8720f85', 'Mercy indawati', 'default.jpg', 'Perempuan', 'Pelajar / Mahasiswa', '081333125827', 'Tenggilis rejo Rt2 RW 2 no 9, Pasuruan, Jawa Timur', 'mercyindawati07@gmail.com', '3598099912340005', 2, '2020-07-01', 1, '2020-07-01'),
(15, 'AninPutri', '73cf6a0eeb65ecb8e1ba516b633f1aa3', 'Anindiya azira putri', 'default.jpg', 'Perempuan', 'PNS', '085333125829', 'Jl sunan ampel no 5, waru ,Jawa Timur', 'anindiya@gmail.com', '3514234565320009', 2, '2020-07-01', 1, '2020-07-01'),
(16, 'Michela', 'bd5a02e1f62b842892544457b178feb9', 'Micheila Azkia Alfatih', 'default.jpg', 'Perempuan', 'Belum Bekerja', '081338125820', 'Tenggilisrejo Rt2 RW 2 no 9, Pasuruan, Jawa Timur', 'misel_alfatih@gmail.com', '3514556678900049', 2, '2020-07-01', 1, '2020-07-01'),
(17, 'Nova', 'ae991a6ebe1c42fc63dc509f35ad0c3b', 'Nur Mauila', 'default.jpg', 'Perempuan', 'Pekerja / wiraswasta', '081333129999', 'Tenggilisrejo RT 2 RW 2 no 9, Pasuruan, Jawa Timur', 'ila@gmail.com', '3514556678900000', 2, '2020-07-01', 1, '2020-07-01'),
(18, 'Yulik', 'df150986996ed9ee6ca8251665dd1acb', 'Yuliana', 'default.jpg', 'Perempuan', 'Pekerja / wiraswasta', '088217445916', 'Tenggilisrejo Rt2 RW 2 no 9, Pasuruan, Jawa Timur', 'yuli@gmail.com', '3514234565320009', 2, '2020-07-01', 1, '2020-07-01'),
(19, 'Aminah', '5c2e4a2563f9f4427955422fe1402762', 'Siti Aminah', 'default.jpg', 'Perempuan', 'Wirausaha', '081338125820', 'Cluster Tidar Asri Blok A7, Sumbersari, Jember', 'aminatul_siti@gmail.com', '3514234565320009', 2, '2020-07-01', 1, '2020-07-01'),
(20, 'Zikri', '8e6c62c3483f0a8bde12fccb1c0a9982', 'Muhammad zikri', 'default.jpg', 'Laki-Laki', 'Pelajar / Mahasiswa', '087333125820', 'Winongan Rt2 RW 2 no 9, Pasuruan, Jawa Timur', 'zikri_zik@gmail.com', '3514234565320009', 2, '2020-07-01', 1, '2020-07-01'),
(21, 'shinta', 'ad388556cdd6816279c1cc334c925a09', 'Shinta Dwi', 'default.jpg', 'Laki-Laki', 'Pelajar / Mahasiswa', '085338125920', 'Perumahan candi blok a38, Banyuwangi, Jawa timur', 'dwi_shinta@gmail.com', '3514956678900009', 2, '2020-07-01', 1, '2020-07-01'),
(22, 'arinda', 'e645ebd76e90b32c5327f39730665ed6', 'Yunia rinda maulid', 'default.jpg', 'Laki-Laki', 'Pelajar / Mahasiswa', '085667312529', 'jajar kebon Rt2 Rw3 , Gondangwetan, Jawa Timur', 'yuniarinda@gmail.com', '3514556678903009', 2, '2020-07-01', 1, '2020-07-01'),
(25, 'Elisa', '05d2881736a4d736df1f34dc83442287', 'Elisa qatrun', 'default.jpg', 'Perempuan', 'Pelajar / Mahasiswa', '081333125820', 'Perumahan candi blok A78,Bondowoso, Jawa timur', 'elisa@gmail.com', '3514234565320009', 2, '2020-07-01', 1, '2020-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `namakos` varchar(20) NOT NULL,
  `alamatkos` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `namapen` varchar(25) NOT NULL,
  `alamatpen` varchar(50) NOT NULL,
  `nopen` varchar(13) NOT NULL,
  `masuk_kos` varchar(10) NOT NULL,
  `rek_tujuan` varchar(25) NOT NULL,
  `rek_penyewa` varchar(25) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `namakos`, `alamatkos`, `harga`, `namapen`, `alamatpen`, `nopen`, `masuk_kos`, `rek_tujuan`, `rek_penyewa`, `tgl_bayar`, `status`, `bukti`, `id_kos`, `id_penyewa`, `id_kamar`, `id_pemilik`) VALUES
(31, 'Kos oren', 'Mastrip Timur 80 c sumber sari,jember', 550000, 'Muhammad Bayu Pamungkas', 'Tenggilisrejo Rt2 RW 2 no 9, pasuruan, Jawa Timur', '088217445916', 'Desember', '0021-05-027783-999 (BRI)', '2001989799 (BCA)', '2020-06-30', 'Proses Verifikasi', 'ss_ketrin.jpg', 1, 9, 2, 1),
(32, 'Kos oren', 'Mastrip Timur 80 c sumber sari,jember', 400000, 'Muhammad Bayu Pamungkas', 'Tenggilisrejo Rt2 RW 2 no 9, pasuruan, Jawa Timur', '088217445916', 'Januari', '0021-05-027783-999 (BRI)', '1430000801299 (Mandiri)', '2020-06-30', 'Proses Verifikasi', 'mokuoketr1.jpg', 1, 9, 1, 1),
(33, 'Kos oren', 'Mastrip Timur 85 c sumber sari,jember', 350000, 'Fitria \'Aziati', 'Tenggilisrejo Rt2 RW 2 no 9, pasuruan, Jawa Timur', '081333125829', 'Januari', '0021-05-027783-999 (BRI)', '2001989799 (BCA)', '2020-06-30', 'Proses Verifikasi', 'ket.jpg', 2, 8, 18, 1),
(34, 'Kos oren', 'Mastrip Timur 85 c sumber sari,jember', 350000, 'Muhammad Bayu Pamungkas', 'Tenggilisrejo Rt2 RW 2 no 9, pasuruan, Jawa Timur', '088217445916', 'Maret', '2001989999 (BCA)', '2001989799 (BCA)', '2020-07-01', 'Proses Verifikasi', 'ss_ketrin.jpg', 2, 9, 18, 1);

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
(1, '3X3', 'Tersedia', 400000, '1 orang', 'Spring bed, lemari, kamar mandi dalam,Kipas angin', '2.jpg', 1),
(2, '4X4', 'Tersedia', 550000, '1 orang', 'Spring bed, lemari, kamar mandi dalam, AC', '1.jpg', 1),
(18, '3X3', 'Tersedia', 350000, '1 orang', 'Spring bed, lemari,kipas angin', '3.jpg', 2),
(20, '3X4', 'Tidak tersedia', 450000, '1 orang', 'Spring bed, lemari, kamar mandi dalam, kipas angin', '4.jpg', 8),
(21, '3.5X3', 'Tersedia', 325000, '1 orang', 'Kasur, lemari, kipas angin', '5.jpg', 9),
(22, '3.5X3', 'Tersedia', 375000, '1 orang', 'Kasur, lemari, kipas angin', '6.jpg', 10),
(25, '3X4', 'Tidak Tersedia', 200000, '1 orang', 'Kosongan', 'o.jpg', 13),
(26, '3.5X3', 'Tersedia', 200000, '1 orang', 'Kasur', '14.jpg', 13),
(27, '4X3', 'Tersedia', 430000, '1 orang', 'Spring bed, lemari, kamar mandi dalam, kipas angin', '8.jpg', 13),
(31, '3X4', 'Tidak Tersedia', 350000, '1 orang', 'Spring bed, lemari,kipas angin', '10.jpg', 15),
(32, '3X4', 'Tersedia', 320000, '1 orang', 'Spring bed, lemari', '7.jpg', 15),
(33, '4X4', 'Tersedia', 480000, '2 orang', 'Spring bed, lemari ', '12.jpg', 15),
(34, '3X3', 'Tersedia', 445000, '1 orang', 'Spring bed, lemari, kamar mandi dalam ', '13.jpg', 16),
(35, '3X3', 'Tersedia', 200000, '1 orang', 'Kosongan', 'o.jpg', 16),
(41, '3.5X3', 'Tersedia', 450000, '1 orang', 'Spring bed, lemari, kamar mandi dalam, kipas angin', '18.jpg', 19),
(42, '3X4', 'Tersedia', 525000, '1 orang', 'Spring bed, lemari, kamar mandi dalam, kipas angin', '16.jpg', 20),
(43, '3.5X3', 'Tersedia', 470000, '1 orang', 'Spring bed, lemari, kamar mandi dalam, kipas angin', '17.jpg', 19),
(44, '3X4', 'Tersedia', 480000, '1 orang', 'Spring bed, lemari, kamar mandi dalam, kipas angin', '19.jpg', 20);

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
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_penyewa`, `id_kos`, `id_kamar`) VALUES
(6, 9, 2, 18),
(7, 8, 2, 18);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datakos`
--
ALTER TABLE `datakos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tipekamar`
--
ALTER TABLE `tipekamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
