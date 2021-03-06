-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2015 pada 02.45
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `distribusigas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost_lainlain`
--

CREATE TABLE IF NOT EXISTS `cost_lainlain` (
  `idCost_lainlain` int(11) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(45) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCost_lainlain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_jabatan`
--

CREATE TABLE IF NOT EXISTS `keterangan_jabatan` (
  `idKeterangan_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idKeterangan_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `hakakses`, `idPegawai`) VALUES
('eva', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1),
('pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkalan`
--

CREATE TABLE IF NOT EXISTS `pangkalan` (
  `idPangkalan` int(11) NOT NULL AUTO_INCREMENT,
  `namapangkalan` varchar(45) NOT NULL,
  `alamatpangkalan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPangkalan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
  `idPegawai` int(11) NOT NULL AUTO_INCREMENT,
  `namapegawai` varchar(45) NOT NULL,
  `alamatpegawai` varchar(45) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `notelepon` varchar(45) DEFAULT NULL,
  `idKeterangan_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`idPegawai`,`idKeterangan_jabatan`),
  KEY `fk_Pegawai_Keterangan_jabatan1_idx` (`idKeterangan_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namapegawai`, `alamatpegawai`, `jk`, `notelepon`, `idKeterangan_jabatan`) VALUES
(1, 'evaria', 'surabaya', 'P', '082133749300', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`idPemasukan`, `jumlahgas`, `hargabeli`, `tanggalpembelian`, `idPegawai`, `hargajual`) VALUES
(1, '1000', '10000', '2015-03-02 20:23:59', 1, '12000'),
(2, '1000', '10000', '2015-03-04 08:52:26', 1, '12000'),
(5, '1000', '7000', '2015-03-05 08:59:19', 1, '100'),
(7, '100', '11000', '2015-03-05 15:46:11', 1, '12000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_gas`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_gas` (
  `idPengeluaran_Gas` int(11) NOT NULL AUTO_INCREMENT,
  `metode` int(11) DEFAULT NULL,
  `idTransaksi` int(11) DEFAULT NULL,
  `idPangkalan` int(11) NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `idstatus_pemesanan` int(11) NOT NULL,
  PRIMARY KEY (`idPengeluaran_Gas`,`idPangkalan`),
  KEY `fk_Pengeluaran_Gas_Pangkalan1_idx` (`idPangkalan`),
  KEY `fk_Pengeluaran_Gas_Pegawai1_idx` (`idPegawai`),
  KEY `fk_Pengeluaran_Gas_status_pemesanan1_idx` (`idstatus_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_perbulan`
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
-- Struktur dari tabel `pengeluaran_tetap`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_tetap` (
  `idPengeluaran_Tetap` int(11) NOT NULL AUTO_INCREMENT,
  `pengeluaranPLN` varchar(45) DEFAULT NULL,
  `filePLN` blob,
  `pengeluaranPAM` varchar(45) DEFAULT NULL,
  `filePAM` blob,
  `pengeluaranInternet` varchar(45) DEFAULT NULL,
  `fileInternent` blob,
  `tanggal` timestamp NULL DEFAULT NULL,
  `idPegawai` int(11) NOT NULL,
  PRIMARY KEY (`idPengeluaran_Tetap`),
  KEY `fk_Pengeluaran_Tetap_Pegawai1_idx` (`idPegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pemesanan`
--

CREATE TABLE IF NOT EXISTS `status_pemesanan` (
  `idstatus_pemesanan` int(11) NOT NULL,
  `namastatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idstatus_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_gudang`
--

CREATE TABLE IF NOT EXISTS `stok_gudang` (
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah_stok` varchar(45) DEFAULT NULL,
  `idstok_gudang` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idstok_gudang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `stok_gudang`
--

INSERT INTO `stok_gudang` (`tanggal`, `jumlah_stok`, `idstok_gudang`) VALUES
('2015-03-05 15:30:11', '1000', 1),
('2015-03-05 15:46:11', '100', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_offline`
--

CREATE TABLE IF NOT EXISTS `transaksi_offline` (
  `idTransaksi_Offline` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahGas` varchar(45) DEFAULT NULL,
  `tanggalTransaksiOffline` timestamp NULL DEFAULT NULL,
  `totalhargabelioff` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTransaksi_Offline`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_online`
--

CREATE TABLE IF NOT EXISTS `transaksi_online` (
  `idTransaksi_Online` int(11) NOT NULL AUTO_INCREMENT,
  `tanggalTransaksiOnline` timestamp NULL DEFAULT NULL,
  `jumlahGas` varchar(45) DEFAULT NULL,
  `totalhargabeli` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTransaksi_Online`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukar_barang`
--

CREATE TABLE IF NOT EXISTS `tukar_barang` (
  `idTukar_Barang` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahbarangrusak` varchar(45) DEFAULT NULL,
  `tanggalTukarBarang` timestamp NULL DEFAULT NULL,
  `idPangkalan` int(11) NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jumlahbarangkosong` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTukar_Barang`,`idPegawai`),
  KEY `fk_Tukar_Barang_Pangkalan1_idx` (`idPangkalan`),
  KEY `fk_Tukar_Barang_Pegawai1_idx` (`idPegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Ketidakleluasaan untuk tabel `pengeluaran_gas`
--
ALTER TABLE `pengeluaran_gas`
  ADD CONSTRAINT `fk_Pengeluaran_Gas_Pangkalan1` FOREIGN KEY (`idPangkalan`) REFERENCES `pangkalan` (`idPangkalan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pengeluaran_Gas_Pegawai1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pengeluaran_Gas_status_pemesanan1` FOREIGN KEY (`idstatus_pemesanan`) REFERENCES `status_pemesanan` (`idstatus_pemesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
