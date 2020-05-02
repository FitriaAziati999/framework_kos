-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 02:05 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

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
  `ktpadmin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `useradmin`, `passadmin`, `noadmin`, `emailadmin`, `alamatadmin`, `ktpadmin`) VALUES
(1, 'yais01', 'yais123', '083134920109', 'yais@gamil.com', 'jember', ''),
(2, 'ketrinamarga01', 'ketrina123', '081931594351', 'ketrina@gmail.com', 'jember', ''),
(5, 'ijak1409', 'ijak123', '085335718044', 'ijka@gmail.com', 'jember', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cari_kos`
-- (See below for the actual view)
--
CREATE TABLE `cari_kos` (
`id_pemilik` int(11)
,`namakos` varchar(20)
,`khususkos` varchar(10)
,`userpem` varchar(20)
,`harga` int(10)
,`stok` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cari_kosan`
-- (See below for the actual view)
--
CREATE TABLE `cari_kosan` (
`namakos` varchar(20)
,`alamatkos` varchar(50)
,`khususkos` varchar(10)
,`stok` int(10)
,`harga` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cari_kosss`
-- (See below for the actual view)
--
CREATE TABLE `cari_kosss` (
`namakos` varchar(20)
,`alamatkos` varchar(50)
,`khususkos` varchar(10)
,`stok` int(10)
,`harga` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cari_kost`
-- (See below for the actual view)
--
CREATE TABLE `cari_kost` (
`id_pemilik` int(11)
,`namakos` varchar(20)
,`khususkos` varchar(10)
,`nopem` varchar(13)
,`harga` int(10)
,`stok` int(10)
);

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
(1, 1, 'Kos oren', 'Mastrip Timur 80 c sumber sari,jember', 'putra', 'tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat mushola', 'Tidak boleh membawa anak perempuan ke kamar'),
(2, 1, 'Kos oren', 'Mastrip Timur 85 c sumber sari,jember', 'putri', 'Spring bed,lemari,kamar mandi dalam', 'Dekat mushola', 'Tidak boleh membawa anak laki-laki ke kamar'),
(8, 2, 'kos bidadari', 'Batu raden A7', 'putri', 'spring bed, lemari', 'Dekat Foodland, indomaret ', 'Tidak boleh membawa anak laki-laki ke kamar');

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_kos`
-- (See below for the actual view)
--
CREATE TABLE `data_kos` (
`id_pemilik` int(11)
,`namakos` varchar(20)
,`khususkos` varchar(10)
,`alamatkos` varchar(50)
,`harga` int(10)
,`stok` int(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pem` varchar(25) NOT NULL,
  `userpem` varchar(20) NOT NULL,
  `passpem` varchar(20) NOT NULL,
  `alamatpem` varchar(50) NOT NULL,
  `nopem` varchar(13) NOT NULL,
  `emailpem` varchar(20) NOT NULL,
  `nikpem` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pem`, `userpem`, `passpem`, `alamatpem`, `nopem`, `emailpem`, `nikpem`) VALUES
(1, 'Ramma', 'rammaboom', 'ramma123', 'Blitar', '083854132888', 'sindyra@gmail.com', '3657808976590001'),
(2, 'indyra Ayu W', 'indyraaw', 'indy123', 'Mastrip timur 80 C jember', '081333125829', 'rammaboom99@gmail.co', '3567098765460001');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `namapen` varchar(25) NOT NULL,
  `userpen` varchar(20) NOT NULL,
  `passpen` varchar(100) NOT NULL,
  `fotopen` varchar(25) NOT NULL,
  `jkpen` varchar(10) NOT NULL,
  `pekerjaanpen` varchar(20) NOT NULL,
  `nopen` varchar(13) NOT NULL,
  `alamatpen` varchar(50) NOT NULL,
  `emailpen` varchar(20) NOT NULL,
  `ktppen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `namapen`, `userpen`, `passpen`, `fotopen`, `jkpen`, `pekerjaanpen`, `nopen`, `alamatpen`, `emailpen`, `ktppen`) VALUES
(1, 'Bayu Pamungkas', 'Bayupamungkan2008', 'bay123', 'aku.jpg', 'laki-laki', 'pelajar', '081232355252', 'pasuruan', 'bayu@gmail.com', 'kos.jpg'),
(2, 'Fitria Azati', 'fitriaAz', 'tria123', '', 'Perempuan', 'Mahasiswa', '0812323552552', 'Pasuruan', 'fitriaaziati@gmail.c', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `profile_penyewa`
-- (See below for the actual view)
--
CREATE TABLE `profile_penyewa` (
`id_penyewa` int(11)
,`userpen` varchar(20)
,`passpen` varchar(100)
,`fotopen` varchar(25)
,`jkpen` varchar(10)
,`pekerjaanpen` varchar(20)
,`nopen` varchar(13)
,`alamatpen` varchar(50)
,`emailpen` varchar(20)
,`ktppen` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `profile_penyewakos`
-- (See below for the actual view)
--
CREATE TABLE `profile_penyewakos` (
`id_penyewa` int(11)
,`userpen` varchar(20)
,`passpen` varchar(100)
,`fotopen` varchar(25)
,`jkpen` varchar(10)
,`pekerjaanpen` varchar(20)
,`nopen` varchar(13)
,`alamatpen` varchar(50)
,`emailpen` varchar(20)
,`ktppen` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `profil_penyewa`
-- (See below for the actual view)
--
CREATE TABLE `profil_penyewa` (
`id_penyewa` int(11)
,`userpen` varchar(20)
,`passpen` varchar(100)
,`fotopen` varchar(25)
,`jkpen` varchar(10)
,`pekerjaanpen` varchar(20)
,`nopen` varchar(13)
,`alamatpen` varchar(50)
,`emailpen` varchar(20)
,`ktppen` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `tgl_dateline` datetime NOT NULL,
  `status` varchar(15) NOT NULL,
  `bukti` blob NOT NULL,
  `id_kos` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `tgl_bayar`, `tgl_dateline`, `status`, `bukti`, `id_kos`, `id_penyewa`) VALUES
(1, '2020-04-21 11:27:39', '2020-04-22 11:27:39', 'Lunas', '', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipekamar`
--

CREATE TABLE `tipekamar` (
  `id_kamar` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `penghuni` varchar(8) NOT NULL,
  `fasilitaskamar` varchar(100) NOT NULL,
  `fotokamar` blob NOT NULL,
  `id_kos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipekamar`
--

INSERT INTO `tipekamar` (`id_kamar`, `ukuran`, `stok`, `harga`, `penghuni`, `fasilitaskamar`, `fotokamar`, `id_kos`) VALUES
(1, '3X3', 4, 400000, '1 orang', 'spring bed, lemari', '', 1),
(2, '4X4', 5, 550000, '1 orang', 'spring bed, lemari, kamar mandi dalam', '', 1),
(18, '3X3', 7, 350000, '1 orang', 'spring bed, lemari', '', 2),
(20, '3X4', 6, 450000, '1 orang', 'spring bed, lemari', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_penyewa`, `id_kos`) VALUES
(1, 2, 8);

-- --------------------------------------------------------

--
-- Structure for view `cari_kos`
--
DROP TABLE IF EXISTS `cari_kos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cari_kos`  AS  select `d`.`id_pemilik` AS `id_pemilik`,`d`.`namakos` AS `namakos`,`d`.`khususkos` AS `khususkos`,`p`.`userpem` AS `userpem`,`t`.`harga` AS `harga`,`t`.`stok` AS `stok` from ((`datakos` `d` join `pemilik` `p` on((`d`.`id_pemilik` = `p`.`id_pemilik`))) join `tipekamar` `t` on((`d`.`id_kos` = `t`.`id_kos`))) ;

-- --------------------------------------------------------

--
-- Structure for view `cari_kosan`
--
DROP TABLE IF EXISTS `cari_kosan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cari_kosan`  AS  select `d`.`namakos` AS `namakos`,`d`.`alamatkos` AS `alamatkos`,`d`.`khususkos` AS `khususkos`,`t`.`stok` AS `stok`,`t`.`harga` AS `harga` from (`datakos` `d` join `tipekamar` `t`) ;

-- --------------------------------------------------------

--
-- Structure for view `cari_kosss`
--
DROP TABLE IF EXISTS `cari_kosss`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cari_kosss`  AS  select `d`.`namakos` AS `namakos`,`d`.`alamatkos` AS `alamatkos`,`d`.`khususkos` AS `khususkos`,`t`.`stok` AS `stok`,`t`.`harga` AS `harga` from (`datakos` `d` join `tipekamar` `t` on((`d`.`id_kos` = `t`.`id_kos`))) ;

-- --------------------------------------------------------

--
-- Structure for view `cari_kost`
--
DROP TABLE IF EXISTS `cari_kost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cari_kost`  AS  select `d`.`id_pemilik` AS `id_pemilik`,`d`.`namakos` AS `namakos`,`d`.`khususkos` AS `khususkos`,`p`.`nopem` AS `nopem`,`t`.`harga` AS `harga`,`t`.`stok` AS `stok` from ((`datakos` `d` join `pemilik` `p` on((`d`.`id_pemilik` = `p`.`id_pemilik`))) join `tipekamar` `t` on((`d`.`id_kos` = `t`.`id_kos`))) ;

-- --------------------------------------------------------

--
-- Structure for view `data_kos`
--
DROP TABLE IF EXISTS `data_kos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_kos`  AS  select `d`.`id_pemilik` AS `id_pemilik`,`d`.`namakos` AS `namakos`,`d`.`khususkos` AS `khususkos`,`d`.`alamatkos` AS `alamatkos`,`t`.`harga` AS `harga`,`t`.`stok` AS `stok` from ((`datakos` `d` join `pemilik` `p` on((`d`.`id_pemilik` = `p`.`id_pemilik`))) join `tipekamar` `t` on((`d`.`id_kos` = `t`.`id_kos`))) ;

-- --------------------------------------------------------

--
-- Structure for view `profile_penyewa`
--
DROP TABLE IF EXISTS `profile_penyewa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_penyewa`  AS  select `penyewa`.`id_penyewa` AS `id_penyewa`,`penyewa`.`userpen` AS `userpen`,`penyewa`.`passpen` AS `passpen`,`penyewa`.`fotopen` AS `fotopen`,`penyewa`.`jkpen` AS `jkpen`,`penyewa`.`pekerjaanpen` AS `pekerjaanpen`,`penyewa`.`nopen` AS `nopen`,`penyewa`.`alamatpen` AS `alamatpen`,`penyewa`.`emailpen` AS `emailpen`,`penyewa`.`ktppen` AS `ktppen` from `penyewa` where (`penyewa`.`id_penyewa` = '1') ;

-- --------------------------------------------------------

--
-- Structure for view `profile_penyewakos`
--
DROP TABLE IF EXISTS `profile_penyewakos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_penyewakos`  AS  select `penyewa`.`id_penyewa` AS `id_penyewa`,`penyewa`.`userpen` AS `userpen`,`penyewa`.`passpen` AS `passpen`,`penyewa`.`fotopen` AS `fotopen`,`penyewa`.`jkpen` AS `jkpen`,`penyewa`.`pekerjaanpen` AS `pekerjaanpen`,`penyewa`.`nopen` AS `nopen`,`penyewa`.`alamatpen` AS `alamatpen`,`penyewa`.`emailpen` AS `emailpen`,`penyewa`.`ktppen` AS `ktppen` from `penyewa` where (`penyewa`.`alamatpen` = 'pasuruan') ;

-- --------------------------------------------------------

--
-- Structure for view `profil_penyewa`
--
DROP TABLE IF EXISTS `profil_penyewa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profil_penyewa`  AS  select `penyewa`.`id_penyewa` AS `id_penyewa`,`penyewa`.`userpen` AS `userpen`,`penyewa`.`passpen` AS `passpen`,`penyewa`.`fotopen` AS `fotopen`,`penyewa`.`jkpen` AS `jkpen`,`penyewa`.`pekerjaanpen` AS `pekerjaanpen`,`penyewa`.`nopen` AS `nopen`,`penyewa`.`alamatpen` AS `alamatpen`,`penyewa`.`emailpen` AS `emailpen`,`penyewa`.`ktppen` AS `ktppen` from `penyewa` where (`penyewa`.`alamatpen` = 'pasuruan') ;

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
  ADD KEY `id_penyewa` (`id_penyewa`);

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
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
