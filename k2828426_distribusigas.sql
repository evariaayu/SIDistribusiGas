-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Mar 2015 pada 01.02
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k2828426_distribusigas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost_lainlain`
--

CREATE TABLE IF NOT EXISTS `cost_lainlain` (
`idCost_lainlain` int(11) NOT NULL,
  `namabarang` varchar(45) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filebarang` varchar(200) NOT NULL,
  `namafolder` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cost_lainlain`
--

INSERT INTO `cost_lainlain` (`idCost_lainlain`, `namabarang`, `harga`, `tanggal`, `filebarang`, `namafolder`) VALUES
(1, '12', 12, '2015-03-23 19:29:00', '', '2015-03-23 202900'),
(2, '111', 111, '2015-03-23 19:48:20', 'pilates-abs-010.jpg', '2015-03-23 204820'),
(3, 'HP', 20000000, '2015-03-23 21:16:11', '10358962_10201227696293359_7925542885028873396_o.jpg', '2015-03-23 221611'),
(4, 'Margarin', 11111, '2015-03-23 21:19:48', 'shafeea_dress.JPG', '2015-03-23 221948');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_jabatan`
--

CREATE TABLE IF NOT EXISTS `keterangan_jabatan` (
`idKeterangan_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keterangan_jabatan`
--

INSERT INTO `keterangan_jabatan` (`idKeterangan_jabatan`, `nama_jabatan`) VALUES
(1, 'direktur'),
(2, 'pegawai'),
(3, 'supir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `hakakses` varchar(45) DEFAULT NULL,
  `idPegawai` int(11) DEFAULT NULL,
  `idPangkalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `hakakses`, `idPegawai`, `idPangkalan`) VALUES
('adjiparjono', '6e6bb6ef15e71de0346b7f5d8185072f', 'pangkalan', NULL, 1),
('eva', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, 0),
('evaria', '81dc9bdb52d04dc20036dbd8313ed055', 'pangkalan', 0, 0),
('pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai', 1, 0),
('pinas', 'edba1e1129776cba39479609bbb6df4d', 'direktur', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkalan`
--

CREATE TABLE IF NOT EXISTS `pangkalan` (
`idPangkalan` int(11) NOT NULL,
  `namapangkalan` varchar(45) NOT NULL,
  `alamatpangkalan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pangkalan`
--

INSERT INTO `pangkalan` (`idPangkalan`, `namapangkalan`, `alamatpangkalan`) VALUES
(1, 'Adji Parjono', 'Semarang'),
(2, 'Agus', 'Cilacap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`idPegawai` int(11) NOT NULL,
  `namapegawai` varchar(45) NOT NULL,
  `alamatpegawai` varchar(45) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `notelepon` varchar(45) DEFAULT NULL,
  `idKeterangan_jabatan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namapegawai`, `alamatpegawai`, `jk`, `notelepon`, `idKeterangan_jabatan`) VALUES
(1, 'evaria', 'surabaya', 'P', '082133749300', 2),
(2, 'pinasthika', 'kalideres', 'p', '092881912', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE IF NOT EXISTS `pemasukan` (
`idPemasukan` int(11) NOT NULL,
  `jumlahgas` varchar(45) DEFAULT NULL,
  `hargabeli` varchar(45) DEFAULT NULL,
  `tanggalpembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idPegawai` int(11) NOT NULL,
  `hargajual` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`idPemasukan`, `jumlahgas`, `hargabeli`, `tanggalpembelian`, `idPegawai`, `hargajual`) VALUES
(1, '1', '1', '2015-03-22 13:02:37', 1, '1'),
(2, '2', '2', '2015-03-22 13:02:51', 1, '2'),
(5, '5', '5', '2015-03-22 13:02:56', 1, '5'),
(7, '100', '11000', '2015-03-05 15:46:11', 1, '12000'),
(8, '1200', '11300', '2015-03-22 07:04:28', 1, '14000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_perbulan`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_perbulan` (
  `idPengeluaran_Tetap` int(11) NOT NULL,
  `idCost_lainlain` int(11) NOT NULL,
`idPengeluaran_Perbulan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengeluaran_perbulan`
--

INSERT INTO `pengeluaran_perbulan` (`idPengeluaran_Tetap`, `idCost_lainlain`, `idPengeluaran_Perbulan`) VALUES
(10, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_tetap`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_tetap` (
`idPengeluaran_Tetap` int(11) NOT NULL,
  `pengeluaranPLN` int(11) DEFAULT NULL,
  `filePLN` varchar(300) DEFAULT NULL,
  `pengeluaranPAM` int(11) DEFAULT NULL,
  `filePAM` varchar(300) DEFAULT NULL,
  `pengeluaranInternet` int(11) DEFAULT NULL,
  `fileInternet` varchar(300) DEFAULT NULL,
  `total` int(45) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idPegawai` int(11) NOT NULL,
  `namafolder` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengeluaran_tetap`
--

INSERT INTO `pengeluaran_tetap` (`idPengeluaran_Tetap`, `pengeluaranPLN`, `filePLN`, `pengeluaranPAM`, `filePAM`, `pengeluaranInternet`, `fileInternet`, `total`, `tanggal`, `idPegawai`, `namafolder`) VALUES
(10, 12000, 'pilates-abs-07.jpg', 12000, 'pilates-abs-05.jpg', 15000, 'pilates-abs-08.jpg', 39000, '2015-03-23 20:49:45', 1, '2015-03-23 214945');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pemesanan`
--

CREATE TABLE IF NOT EXISTS `status_pemesanan` (
  `idstatus_pemesanan` int(11) NOT NULL,
  `namastatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`idstatus_pemesanan`, `namastatus`) VALUES
(1, 'waiting'),
(2, 'confirmed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_gudang`
--

CREATE TABLE IF NOT EXISTS `stok_gudang` (
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah_stok` varchar(45) DEFAULT NULL,
`idstok_gudang` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `stok_gudang`
--

INSERT INTO `stok_gudang` (`tanggal`, `jumlah_stok`, `idstok_gudang`) VALUES
('2015-03-05 15:30:11', '1000', 1),
('2015-03-05 15:46:11', '100', 2),
('2015-03-22 07:04:28', '1300', 3),
('2015-03-22 13:37:00', '1299', 4),
('2015-03-22 13:37:11', '1298', 5),
('2015-03-22 13:37:13', '1293', 6),
('2015-03-22 13:37:15', '1291', 7),
('2015-03-22 13:42:11', '1290', 8),
('2015-03-22 13:42:18', '1278', 9),
('2015-03-22 14:20:36', '1276', 10),
('2015-03-22 14:20:38', '1275', 11),
('2015-03-22 21:48:16', '1275', 12),
('2015-03-22 22:03:19', '1275', 13),
('2015-03-22 22:05:40', '1271', 14),
('2015-03-22 22:05:54', '1257', 15),
('2015-03-22 22:09:16', '1254', 16),
('2015-03-22 22:10:20', '1251', 17),
('2015-03-23 05:29:36', '1241', 18),
('2015-03-23 05:29:39', '1231', 19),
('2015-03-23 05:29:41', '1221', 20),
('2015-03-23 05:29:43', '1211', 21),
('2015-03-23 05:29:45', '1201', 22),
('2015-03-23 05:29:47', '1191', 23),
('2015-03-23 05:29:48', '1181', 24),
('2015-03-23 16:45:57', '1171', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_offline`
--

CREATE TABLE IF NOT EXISTS `transaksi_offline` (
`idTransaksi_Offline` int(11) NOT NULL,
  `jumlahGas` varchar(45) DEFAULT NULL,
  `tanggalTransaksiOffline` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `totalhargabelioff` varchar(45) DEFAULT NULL,
  `idPangkalan` int(100) NOT NULL,
  `idPegawai` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi_offline`
--

INSERT INTO `transaksi_offline` (`idTransaksi_Offline`, `jumlahGas`, `tanggalTransaksiOffline`, `totalhargabelioff`, `idPangkalan`, `idPegawai`) VALUES
(1, '3', NULL, '15', 1, 0),
(2, '3', NULL, '15', 2, 0),
(3, '2', '2015-03-22 21:16:42', '10', 1, 0),
(4, '4', '2015-03-22 21:48:16', '20', 2, 0),
(5, '4', '2015-03-22 22:03:19', '20', 2, 0),
(6, '4', '2015-03-22 22:05:40', '20', 1, 0),
(7, '14', '2015-03-22 22:05:54', '70', 1, 0),
(8, '3', '2015-03-22 22:09:16', '15', 1, 0),
(9, '3', '2015-03-22 22:10:20', '15', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_online`
--

CREATE TABLE IF NOT EXISTS `transaksi_online` (
`idTransaksi_Online` int(11) NOT NULL,
  `tanggalTransaksiOnline` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlahGas` varchar(45) DEFAULT NULL,
  `totalhargabeli` varchar(45) DEFAULT NULL,
  `idstatus_pemesanan` varchar(45) NOT NULL,
  `idPangkalan` int(11) NOT NULL,
  `namapangkalan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi_online`
--

INSERT INTO `transaksi_online` (`idTransaksi_Online`, `tanggalTransaksiOnline`, `jumlahGas`, `totalhargabeli`, `idstatus_pemesanan`, `idPangkalan`, `namapangkalan`) VALUES
(19, '2015-03-22 20:05:35', '12', '60', '1', 1, ''),
(21, '2015-03-23 05:30:18', '10', '50', '2', 1, 'adjiparjono');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukar_barang`
--

CREATE TABLE IF NOT EXISTS `tukar_barang` (
`idTukar_Barang` int(11) NOT NULL,
  `jumlahbarangrusak` varchar(45) DEFAULT NULL,
  `tanggalTukarBarang` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idPangkalan` int(11) NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jumlahbarangkosong` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cost_lainlain`
--
ALTER TABLE `cost_lainlain`
 ADD PRIMARY KEY (`idCost_lainlain`);

--
-- Indexes for table `keterangan_jabatan`
--
ALTER TABLE `keterangan_jabatan`
 ADD PRIMARY KEY (`idKeterangan_jabatan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pangkalan`
--
ALTER TABLE `pangkalan`
 ADD PRIMARY KEY (`idPangkalan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`idPegawai`,`idKeterangan_jabatan`), ADD KEY `fk_Pegawai_Keterangan_jabatan1_idx` (`idKeterangan_jabatan`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
 ADD PRIMARY KEY (`idPemasukan`), ADD KEY `fk_Pemasukan_Pegawai1_idx` (`idPegawai`);

--
-- Indexes for table `pengeluaran_perbulan`
--
ALTER TABLE `pengeluaran_perbulan`
 ADD PRIMARY KEY (`idPengeluaran_Perbulan`), ADD KEY `fk_Pengeluaran_Tetap_has_Cost_lainlain_Cost_lainlain1_idx` (`idCost_lainlain`), ADD KEY `fk_Pengeluaran_Tetap_has_Cost_lainlain_Pengeluaran_Tetap_idx` (`idPengeluaran_Tetap`);

--
-- Indexes for table `pengeluaran_tetap`
--
ALTER TABLE `pengeluaran_tetap`
 ADD PRIMARY KEY (`idPengeluaran_Tetap`), ADD KEY `fk_Pengeluaran_Tetap_Pegawai1_idx` (`idPegawai`);

--
-- Indexes for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
 ADD PRIMARY KEY (`idstatus_pemesanan`);

--
-- Indexes for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
 ADD PRIMARY KEY (`idstok_gudang`);

--
-- Indexes for table `transaksi_offline`
--
ALTER TABLE `transaksi_offline`
 ADD PRIMARY KEY (`idTransaksi_Offline`);

--
-- Indexes for table `transaksi_online`
--
ALTER TABLE `transaksi_online`
 ADD PRIMARY KEY (`idTransaksi_Online`), ADD KEY `idTransaksi_Online` (`idTransaksi_Online`);

--
-- Indexes for table `tukar_barang`
--
ALTER TABLE `tukar_barang`
 ADD PRIMARY KEY (`idTukar_Barang`,`idPegawai`), ADD KEY `fk_Tukar_Barang_Pangkalan1_idx` (`idPangkalan`), ADD KEY `fk_Tukar_Barang_Pegawai1_idx` (`idPegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cost_lainlain`
--
ALTER TABLE `cost_lainlain`
MODIFY `idCost_lainlain` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `keterangan_jabatan`
--
ALTER TABLE `keterangan_jabatan`
MODIFY `idKeterangan_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pangkalan`
--
ALTER TABLE `pangkalan`
MODIFY `idPangkalan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `idPegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
MODIFY `idPemasukan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengeluaran_perbulan`
--
ALTER TABLE `pengeluaran_perbulan`
MODIFY `idPengeluaran_Perbulan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengeluaran_tetap`
--
ALTER TABLE `pengeluaran_tetap`
MODIFY `idPengeluaran_Tetap` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
MODIFY `idstok_gudang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `transaksi_offline`
--
ALTER TABLE `transaksi_offline`
MODIFY `idTransaksi_Offline` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transaksi_online`
--
ALTER TABLE `transaksi_online`
MODIFY `idTransaksi_Online` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tukar_barang`
--
ALTER TABLE `tukar_barang`
MODIFY `idTukar_Barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
ADD CONSTRAINT `fk_Pegawai_Keterangan_jabatan1` FOREIGN KEY (`idKeterangan_jabatan`) REFERENCES `keterangan_jabatan` (`idKeterangan_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
ADD CONSTRAINT `fk_Pemasukan_Pegawai1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengeluaran_perbulan`
--
ALTER TABLE `pengeluaran_perbulan`
ADD CONSTRAINT `fk_Pengeluaran_Tetap_has_Cost_lainlain_Cost_lainlain1` FOREIGN KEY (`idCost_lainlain`) REFERENCES `cost_lainlain` (`idCost_lainlain`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Pengeluaran_Tetap_has_Cost_lainlain_Pengeluaran_Tetap` FOREIGN KEY (`idPengeluaran_Tetap`) REFERENCES `pengeluaran_tetap` (`idPengeluaran_Tetap`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengeluaran_tetap`
--
ALTER TABLE `pengeluaran_tetap`
ADD CONSTRAINT `fk_Pengeluaran_Tetap_Pegawai1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tukar_barang`
--
ALTER TABLE `tukar_barang`
ADD CONSTRAINT `fk_Tukar_Barang_Pangkalan1` FOREIGN KEY (`idPangkalan`) REFERENCES `pangkalan` (`idPangkalan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Tukar_Barang_Pegawai1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
