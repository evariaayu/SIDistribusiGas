-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2015 at 08:51 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `distribusigas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cost_lainlain`
--

CREATE TABLE IF NOT EXISTS `cost_lainlain` (
  `idCost_lainlain` int(11) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(45) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filebarang` varchar(200) NOT NULL,
  `namafolder` varchar(100) NOT NULL,
  PRIMARY KEY (`idCost_lainlain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_jabatan`
--

CREATE TABLE IF NOT EXISTS `keterangan_jabatan` (
  `idKeterangan_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idKeterangan_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `keterangan_jabatan`
--

INSERT INTO `keterangan_jabatan` (`idKeterangan_jabatan`, `nama_jabatan`) VALUES
(1, 'direktur'),
(2, 'pegawai'),
(3, 'supir');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `hakakses` varchar(45) DEFAULT NULL,
  `idPegawai` int(11) DEFAULT NULL,
  `idPangkalan` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `hakakses`, `idPegawai`, `idPangkalan`) VALUES
('adjiparjono', '6e6bb6ef15e71de0346b7f5d8185072f', 'pangkalan', NULL, 1),
('eva', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, 0),
('pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai', 1, 0),
('pinas', 'edba1e1129776cba39479609bbb6df4d', 'direktur', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pangkalan`
--

CREATE TABLE IF NOT EXISTS `pangkalan` (
  `idPangkalan` int(11) NOT NULL AUTO_INCREMENT,
  `namapangkalan` varchar(45) NOT NULL,
  `alamatpangkalan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPangkalan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pangkalan`
--

INSERT INTO `pangkalan` (`idPangkalan`, `namapangkalan`, `alamatpangkalan`) VALUES
(1, 'Adji Parjono', 'Semarang'),
(2, 'Agus', 'Cilacap');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `idPegawai` int(11) NOT NULL AUTO_INCREMENT,
  `namapegawai` varchar(45) NOT NULL,
  `alamatpegawai` varchar(45) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `notelepon` varchar(45) DEFAULT NULL,
  `idKeterangan_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`idPegawai`,`idKeterangan_jabatan`),
  KEY `fk_Pegawai_Keterangan_jabatan1_idx` (`idKeterangan_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namapegawai`, `alamatpegawai`, `jk`, `notelepon`, `idKeterangan_jabatan`) VALUES
(1, 'evaria', 'surabaya', 'P', '082133749300', 2),
(2, 'pinasthika', 'kalideres', 'p', '092881912', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE IF NOT EXISTS `pemasukan` (
  `idPemasukan` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahgas` varchar(45) DEFAULT NULL,
  `hargabeli` varchar(45) DEFAULT NULL,
  `tanggalpembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idPegawai` int(11) NOT NULL,
  `hargajual` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPemasukan`),
  KEY `fk_Pemasukan_Pegawai1_idx` (`idPegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`idPemasukan`, `jumlahgas`, `hargabeli`, `tanggalpembelian`, `idPegawai`, `hargajual`) VALUES
(1, '1', '1', '2015-03-22 13:02:37', 1, '1'),
(2, '2', '2', '2015-03-22 13:02:51', 1, '2'),
(5, '5', '5', '2015-03-22 13:02:56', 1, '5'),
(7, '100', '11000', '2015-03-05 15:46:11', 1, '12000'),
(8, '1200', '11300', '2015-03-22 07:04:28', 1, '14000');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_perbulan`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_perbulan` (
  `idPengeluaran_Tetap` int(11) NOT NULL,
  `idCost_lainlain` int(11) NOT NULL,
  `idPengeluaran_Perbulan` varchar(45) NOT NULL,
  PRIMARY KEY (`idPengeluaran_Perbulan`),
  KEY `fk_Pengeluaran_Tetap_has_Cost_lainlain_Cost_lainlain1_idx` (`idCost_lainlain`),
  KEY `fk_Pengeluaran_Tetap_has_Cost_lainlain_Pengeluaran_Tetap_idx` (`idPengeluaran_Tetap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_tetap`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_tetap` (
  `idPengeluaran_Tetap` int(11) NOT NULL AUTO_INCREMENT,
  `pengeluaranPLN` int(11) DEFAULT NULL,
  `filePLN` varchar(300) DEFAULT NULL,
  `pengeluaranPAM` int(11) DEFAULT NULL,
  `filePAM` varchar(300) DEFAULT NULL,
  `pengeluaranInternet` int(11) DEFAULT NULL,
  `fileInternent` varchar(300) DEFAULT NULL,
  `total` int(45) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idPegawai` int(11) NOT NULL,
  `namafolder` varchar(100) NOT NULL,
  PRIMARY KEY (`idPengeluaran_Tetap`),
  KEY `fk_Pengeluaran_Tetap_Pegawai1_idx` (`idPegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status_pemesanan`
--

CREATE TABLE IF NOT EXISTS `status_pemesanan` (
  `idstatus_pemesanan` int(11) NOT NULL,
  `namastatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idstatus_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`idstatus_pemesanan`, `namastatus`) VALUES
(1, 'waiting'),
(2, 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `stok_gudang`
--

CREATE TABLE IF NOT EXISTS `stok_gudang` (
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah_stok` varchar(45) DEFAULT NULL,
  `idstok_gudang` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idstok_gudang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `stok_gudang`
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
('2015-03-23 05:30:18', '1171', 25);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_offline`
--

CREATE TABLE IF NOT EXISTS `transaksi_offline` (
  `idTransaksi_Offline` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahGas` varchar(45) DEFAULT NULL,
  `tanggalTransaksiOffline` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `totalhargabelioff` varchar(45) DEFAULT NULL,
  `idPangkalan` int(100) NOT NULL,
  `idPegawai` int(100) NOT NULL,
  PRIMARY KEY (`idTransaksi_Offline`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transaksi_offline`
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
-- Table structure for table `transaksi_online`
--

CREATE TABLE IF NOT EXISTS `transaksi_online` (
  `idTransaksi_Online` int(11) NOT NULL AUTO_INCREMENT,
  `tanggalTransaksiOnline` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlahGas` varchar(45) DEFAULT NULL,
  `totalhargabeli` varchar(45) DEFAULT NULL,
  `idstatus_pemesanan` varchar(45) NOT NULL,
  `idPangkalan` int(11) NOT NULL,
  `namapangkalan` varchar(100) NOT NULL,
  PRIMARY KEY (`idTransaksi_Online`),
  KEY `idTransaksi_Online` (`idTransaksi_Online`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `transaksi_online`
--

INSERT INTO `transaksi_online` (`idTransaksi_Online`, `tanggalTransaksiOnline`, `jumlahGas`, `totalhargabeli`, `idstatus_pemesanan`, `idPangkalan`, `namapangkalan`) VALUES
(19, '2015-03-22 20:05:35', '12', '60', '1', 1, ''),
(21, '2015-03-23 05:30:18', '10', '50', '2', 1, 'adjiparjono');

-- --------------------------------------------------------

--
-- Table structure for table `tukar_barang`
--

CREATE TABLE IF NOT EXISTS `tukar_barang` (
  `idTukar_Barang` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahbarangrusak` varchar(45) DEFAULT NULL,
  `tanggalTukarBarang` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idPangkalan` int(11) NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jumlahbarangkosong` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTukar_Barang`,`idPegawai`),
  KEY `fk_Tukar_Barang_Pangkalan1_idx` (`idPangkalan`),
  KEY `fk_Tukar_Barang_Pegawai1_idx` (`idPegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_Pegawai_Keterangan_jabatan1` FOREIGN KEY (`idKeterangan_jabatan`) REFERENCES `keterangan_jabatan` (`idKeterangan_jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `fk_Pemasukan_Pegawai1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengeluaran_perbulan`
--
ALTER TABLE `pengeluaran_perbulan`
  ADD CONSTRAINT `fk_Pengeluaran_Tetap_has_Cost_lainlain_Cost_lainlain1` FOREIGN KEY (`idCost_lainlain`) REFERENCES `cost_lainlain` (`idCost_lainlain`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pengeluaran_Tetap_has_Cost_lainlain_Pengeluaran_Tetap` FOREIGN KEY (`idPengeluaran_Tetap`) REFERENCES `pengeluaran_tetap` (`idPengeluaran_Tetap`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengeluaran_tetap`
--
ALTER TABLE `pengeluaran_tetap`
  ADD CONSTRAINT `fk_Pengeluaran_Tetap_Pegawai1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tukar_barang`
--
ALTER TABLE `tukar_barang`
  ADD CONSTRAINT `fk_Tukar_Barang_Pangkalan1` FOREIGN KEY (`idPangkalan`) REFERENCES `pangkalan` (`idPangkalan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tukar_Barang_Pegawai1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
