-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2020 pada 14.46
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `useradmin`, `passadmin`, `noadmin`, `emailadmin`, `alamatadmin`, `ktpadmin`) VALUES
(1, 'yais01', 'yais123', '083134920109', 'yais@gamil.com', 'jember', ''),
(2, 'ketrinamarga01', 'ketrina123', '081931594351', 'ketrina@gmail.com', 'jember', ''),
(5, 'ijak1409', 'ijak123', '085335718044', 'ijka@gmail.com', 'jember', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakos`
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
-- Dumping data untuk tabel `datakos`
--

INSERT INTO `datakos` (`id_kos`, `id_pemilik`, `namakos`, `alamatkos`, `khususkos`, `fasilitaskos`, `lingkungankos`, `peraturankos`) VALUES
(1, 1, 'Kos oren', 'Mastrip Timur 80 c sumber sari,jember', 'putra', 'tempat parkir, dapur, wifi,tempat jemur,ruang cuci,ruang tamu', 'Dekat mushola', 'Tidak boleh membawa anak perempuan ke kamar'),
(2, 1, 'Kos oren', 'Mastrip Timur 85 c sumber sari,jember', 'putri', 'Spring bed,lemari,kamar mandi dalam', 'Dekat mushola', 'Tidak boleh membawa anak laki-laki ke kamar'),
(8, 2, 'kos bidadari', 'Batu raden A7', 'putri', 'spring bed, lemari', 'Dekat Foodland, indomaret ', 'Tidak boleh membawa anak laki-laki ke kamar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `userpem` varchar(20) NOT NULL,
  `passpem` varchar(20) NOT NULL,
  `alamatpem` varchar(50) NOT NULL,
  `nopem` varchar(13) NOT NULL,
  `emailpem` varchar(20) NOT NULL,
  `ktppem` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `userpem`, `passpem`, `alamatpem`, `nopem`, `emailpem`, `ktppem`) VALUES
(1, 'rammaboom', 'ramma123', 'Blitar', '083854132888', 'sindyra@gmail.com', ''),
(2, 'indyraaw', 'indy123', 'Mastrip timur 80 C jember', '081333125829', 'rammaboom99@gmail.co', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
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
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `userpen`, `passpen`, `fotopen`, `jkpen`, `pekerjaanpen`, `nopen`, `alamatpen`, `emailpen`, `ktppen`) VALUES
(1, 'Bayupamungkan2008', 'bay123', '', 'laki-laki', 'pelajar', '081232355252', 'pasuruan', 'bayu@gmail.com', ''),
(2, 'fitriaAz', 'tria123', '', 'Perempuan', 'Mahasiswa', '0812323552552', 'Pasuruan', 'fitriaaziati@gmail.c', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
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
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `tgl_bayar`, `tgl_dateline`, `status`, `bukti`, `id_kos`, `id_penyewa`) VALUES
(1, '2020-04-21 11:27:39', '2020-04-22 11:27:39', 'Lunas', '', 8, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipekamar`
--

CREATE TABLE `tipekamar` (
  `id_kamar` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `penghuni` varchar(8) NOT NULL,
  `fasilitaskamar` varchar(100) NOT NULL,
  `fotokamar` varchar(25) NOT NULL,
  `id_kos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipekamar`
--

INSERT INTO `tipekamar` (`id_kamar`, `ukuran`, `stok`, `harga`, `penghuni`, `fasilitaskamar`, `fotokamar`, `id_kos`) VALUES
(1, '3X3', 4, 400000, '1 orang', 'spring bed, lemari', 'kos.jpg', 1),
(2, '4X4', 5, 550000, '1 orang', 'spring bed, lemari, kamar mandi dalam', 'kos.jpg', 1),
(18, '3X3', 7, 350000, '1 orang', 'spring bed, lemari', 'kos.jpg', 2),
(20, '3X4', 6, 450000, '1 orang', 'spring bed, lemari', 'kos.jpg', 8);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vdetailkos`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vdetailkos` (
`namakos` varchar(20)
,`alamatkos` varchar(50)
,`khususkos` varchar(10)
,`fasilitaskos` varchar(100)
,`ukuran` varchar(20)
,`harga` int(10)
,`penghuni` varchar(8)
,`fasilitaskamar` varchar(100)
,`fotokamar` varchar(25)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_penyewa`, `id_kos`) VALUES
(1, 2, 8);

-- --------------------------------------------------------

--
-- Struktur untuk view `vdetailkos`
--
DROP TABLE IF EXISTS `vdetailkos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetailkos`  AS  select `d`.`namakos` AS `namakos`,`d`.`alamatkos` AS `alamatkos`,`d`.`khususkos` AS `khususkos`,`d`.`fasilitaskos` AS `fasilitaskos`,`tk`.`ukuran` AS `ukuran`,`tk`.`harga` AS `harga`,`tk`.`penghuni` AS `penghuni`,`tk`.`fasilitaskamar` AS `fasilitaskamar`,`tk`.`fotokamar` AS `fotokamar` from (`datakos` `d` join `tipekamar` `tk`) where (`d`.`id_kos` = `tk`.`id_kos`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `datakos`
--
ALTER TABLE `datakos`
  ADD PRIMARY KEY (`id_kos`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_kos` (`id_kos`),
  ADD KEY `id_penyewa` (`id_penyewa`);

--
-- Indeks untuk tabel `tipekamar`
--
ALTER TABLE `tipekamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_kos` (`id_kos`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `datakos`
--
ALTER TABLE `datakos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tipekamar`
--
ALTER TABLE `tipekamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
