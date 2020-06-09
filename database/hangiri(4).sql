-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 03:27 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hangiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_in_out`
--

CREATE TABLE `cash_in_out` (
  `id` int(11) NOT NULL,
  `kode_rekening` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` decimal(10,0) NOT NULL,
  `keluar` decimal(10,0) NOT NULL,
  `id_hutang_dibayar` int(11) DEFAULT NULL,
  `id_piutang_dibayar` int(11) DEFAULT NULL,
  `id_penjualan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_dibayar_history`
--

CREATE TABLE `hutang_dibayar_history` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_hutang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_history`
--

CREATE TABLE `hutang_history` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `nominal_dibayar` decimal(10,0) NOT NULL,
  `nomor_faktur` varchar(100) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `tanggal_lunas` date NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `sudah_lunas` enum('0','1') NOT NULL DEFAULT '0',
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kartu_stok`
--

CREATE TABLE `kartu_stok` (
  `id` int(11) NOT NULL,
  `nomor_rec_penerimaan` varchar(100) DEFAULT NULL,
  `id_utility` int(11) DEFAULT NULL,
  `id_stok_opname` int(11) DEFAULT NULL,
  `id_stok_keluar` int(11) DEFAULT NULL,
  `id_penjualan` varchar(50) DEFAULT NULL,
  `kode_item` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_transaksi` enum('pembelian ke supplier','retur penjualan','stok opname','stok utility','retur pembelian','penjualan','retur penjualan') NOT NULL DEFAULT 'retur pembelian',
  `jumlah_masuk` int(5) NOT NULL,
  `jumlah_keluar` int(5) NOT NULL,
  `stok_sisa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_user`
--

CREATE TABLE `kategori_user` (
  `id` int(11) NOT NULL,
  `kategori_user` varchar(100) NOT NULL,
  `beranda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_user`
--

INSERT INTO `kategori_user` (`id`, `kategori_user`, `beranda`) VALUES
(31, 'Manager', 1),
(32, 'Kasir', 25),
(33, 'User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_user_modul`
--

CREATE TABLE `kategori_user_modul` (
  `id` int(11) NOT NULL,
  `kategori_user` int(11) NOT NULL,
  `modul` int(11) NOT NULL,
  `akses` enum('read','add','edit','delete') NOT NULL DEFAULT 'read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_user_modul`
--

INSERT INTO `kategori_user_modul` (`id`, `kategori_user`, `modul`, `akses`) VALUES
(11956, 31, 1, 'read'),
(11957, 31, 2, 'read'),
(11958, 31, 3, 'read'),
(11959, 31, 4, 'read'),
(11960, 31, 5, 'read'),
(11961, 31, 6, 'read'),
(11962, 31, 7, 'read'),
(11963, 31, 8, 'read'),
(11964, 31, 9, 'read'),
(11965, 31, 10, 'read'),
(11966, 31, 11, 'read'),
(11967, 31, 12, 'read'),
(11968, 31, 13, 'read'),
(11969, 31, 14, 'read'),
(11970, 31, 15, 'read'),
(11971, 31, 16, 'read'),
(11972, 31, 17, 'read'),
(11973, 31, 18, 'read'),
(11974, 31, 19, 'read'),
(11975, 31, 20, 'read'),
(11976, 31, 21, 'read'),
(11977, 31, 22, 'read'),
(11978, 31, 23, 'read'),
(11979, 31, 24, 'read'),
(11980, 31, 25, 'read'),
(11981, 31, 26, 'read'),
(11982, 31, 27, 'read'),
(11983, 31, 28, 'read'),
(11984, 31, 29, 'read'),
(11985, 31, 30, 'read'),
(11986, 31, 31, 'read'),
(11987, 31, 32, 'read'),
(11988, 31, 33, 'read'),
(11989, 31, 34, 'read'),
(11990, 31, 35, 'read'),
(11991, 31, 36, 'read'),
(11992, 31, 37, 'read'),
(11993, 31, 38, 'read'),
(11994, 31, 39, 'read'),
(11995, 31, 40, 'read'),
(11996, 31, 41, 'read'),
(11997, 31, 42, 'read'),
(11998, 31, 43, 'read'),
(11999, 31, 3, 'add'),
(12000, 31, 4, 'add'),
(12001, 31, 5, 'add'),
(12002, 31, 6, 'add'),
(12003, 31, 7, 'add'),
(12004, 31, 8, 'add'),
(12005, 31, 9, 'add'),
(12006, 31, 10, 'add'),
(12007, 31, 12, 'add'),
(12008, 31, 13, 'add'),
(12009, 31, 14, 'add'),
(12010, 31, 15, 'add'),
(12011, 31, 17, 'add'),
(12012, 31, 18, 'add'),
(12013, 31, 19, 'add'),
(12014, 31, 23, 'add'),
(12015, 31, 24, 'add'),
(12016, 31, 27, 'add'),
(12017, 31, 28, 'add'),
(12018, 31, 29, 'add'),
(12019, 31, 38, 'add'),
(12020, 31, 39, 'add'),
(12021, 31, 42, 'add'),
(12022, 31, 3, 'edit'),
(12023, 31, 4, 'edit'),
(12024, 31, 5, 'edit'),
(12025, 31, 6, 'edit'),
(12026, 31, 7, 'edit'),
(12027, 31, 8, 'edit'),
(12028, 31, 9, 'edit'),
(12029, 31, 10, 'edit'),
(12030, 31, 12, 'edit'),
(12031, 31, 13, 'edit'),
(12032, 31, 15, 'edit'),
(12033, 31, 24, 'edit'),
(12034, 31, 27, 'edit'),
(12035, 31, 29, 'edit'),
(12036, 31, 38, 'edit'),
(12037, 31, 39, 'edit'),
(12038, 31, 41, 'edit'),
(12039, 31, 43, 'edit'),
(12040, 31, 3, 'delete'),
(12041, 31, 4, 'delete'),
(12042, 31, 5, 'delete'),
(12043, 31, 6, 'delete'),
(12044, 31, 7, 'delete'),
(12045, 31, 8, 'delete'),
(12046, 31, 9, 'delete'),
(12047, 31, 10, 'delete'),
(12048, 31, 12, 'delete'),
(12049, 31, 13, 'delete'),
(12050, 31, 14, 'delete'),
(12051, 31, 15, 'delete'),
(12052, 31, 17, 'delete'),
(12053, 31, 18, 'delete'),
(12054, 31, 19, 'delete'),
(12055, 31, 23, 'delete'),
(12056, 31, 24, 'delete'),
(12057, 31, 27, 'delete'),
(12058, 31, 28, 'delete'),
(12059, 31, 29, 'delete'),
(12060, 31, 38, 'delete'),
(12061, 31, 39, 'delete'),
(12062, 32, 14, 'read'),
(12063, 32, 25, 'read'),
(12064, 32, 14, 'add'),
(12065, 33, 16, 'read'),
(12066, 33, 2, 'read'),
(12067, 33, 9, 'read'),
(12068, 33, 43, 'read'),
(12069, 33, 43, 'edit'),
(12070, 31, 44, 'read'),
(12071, 31, 44, 'add'),
(12072, 31, 44, 'edit'),
(12073, 31, 44, 'delete'),
(12074, 31, 45, 'read'),
(12075, 31, 46, 'read'),
(12076, 31, 46, 'add'),
(12077, 31, 46, 'edit'),
(12078, 31, 46, 'delete'),
(12079, 31, 1, 'edit'),
(12080, 31, 47, 'read'),
(12081, 31, 47, 'add'),
(12082, 31, 47, 'edit'),
(12083, 31, 47, 'delete'),
(12090, 31, 21, 'add'),
(12091, 31, 48, 'read'),
(12092, 31, 48, 'add'),
(12093, 31, 48, 'edit');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `tanggal_jam` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `total_harga_item` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `hold` enum('0','1') NOT NULL DEFAULT '0',
  `keterangan_hold` varchar(200) NOT NULL,
  `waktu_hold` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `jenis_penjualan` enum('ppn','nonppn','online','') NOT NULL DEFAULT 'ppn'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `tanggal_jam`, `id_admin`, `id_pembeli`, `total_harga_item`, `total`, `hold`, `keterangan_hold`, `waktu_hold`, `status`, `jenis_penjualan`) VALUES
(3, '2020-06-09 08:26:21', 1, NULL, '0', '0', '0', '', '', 0, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_detail`
--

CREATE TABLE `keranjang_detail` (
  `id` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `kuantiti` float NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komisi_detail`
--

CREATE TABLE `komisi_detail` (
  `idd` int(11) NOT NULL,
  `id_komisi` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `komisi` varchar(50) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL DEFAULT 'laki-laki',
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `handphone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aktif` enum('0','1') NOT NULL DEFAULT '1',
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`id`, `kategori`, `username`, `password`, `nama_admin`, `jenis_kelamin`, `alamat`, `telepon`, `handphone`, `email`, `aktif`, `waktu_update`) VALUES
(1, 31, 'admin', '$2y$10$GqSP/ynXwcWbmyAwz0yKluIXG7Nv3S18l6D7btXxIhTeRolAi0nh6', 'admin', 'laki-laki', 'Jl Danau Toba 70B Jember', '', '081217736148', 'kantorposku@gmail.com', '1', '2020-05-04 12:04:44'),
(2, 32, 'user_kasir', '$2y$10$l1yNDeXjOcFP5jUAvp/be.C4aiC4J.5kwr26wiupnzbkduT4IKe3y', 'Andika', 'laki-laki', 'Jalan kelapa muda no 21', '', '082183439921', 'andika@gmail.com', '1', '2019-07-05 04:24:09'),
(3, 33, 'users', '$2y$10$l1yNDeXjOcFP5jUAvp/be.C4aiC4J.5kwr26wiupnzbkduT4IKe3y', 'Sang User', 'laki-laki', 'Jl. Dummy nomor Coba-coba', '', '081122334455', 'iniemail@mail.com', '1', '2020-01-07 11:58:10'),
(18, 32, 'pegawai2', '$2y$10$hEy/Pu48iCgAXMSoHcZBeODGAg1ISt9cSlju8GNO8/dURYkDjNrQW', 'pegawai 2', 'laki-laki', '', '', '', 'a@a.com', '1', '2020-06-08 00:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `master_diskon_kelipatan`
--

CREATE TABLE `master_diskon_kelipatan` (
  `id` int(11) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `min_kuantiti` int(2) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `waktu_update_diskon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_item`
--

CREATE TABLE `master_item` (
  `kode_item` varchar(100) NOT NULL,
  `kategori` int(11) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `gambar` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `harga_jual` decimal(10,0) NOT NULL DEFAULT '0',
  `harga_jual2` decimal(10,0) NOT NULL DEFAULT '0',
  `harga_beli` varchar(10) NOT NULL DEFAULT '0',
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `netto` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_expired` date NOT NULL,
  `jenis_item` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_item`
--

INSERT INTO `master_item` (`kode_item`, `kategori`, `nama_item`, `keterangan`, `gambar`, `harga_jual`, `harga_jual2`, `harga_beli`, `waktu_update`, `netto`, `stok`, `tgl_expired`, `jenis_item`) VALUES
('10', 1, 'CHICKEN CRISPY ROLL', 'keterangan', 'default.jpg', '20000', '25000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('100', 1, 'FANTA', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('101', 1, 'SPRITE', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('102', 1, 'COCA COLA', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('103', 1, 'FRESTEA', 'keterangan', 'default.jpg', '6000', '7500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('104', 1, 'NASI', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('11', 1, 'SOFT ROLL', 'keterangan', 'default.jpg', '24000', '30000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('12', 1, 'TERIYAKI ROLL', 'keterangan', 'default.jpg', '20000', '25000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('13', 1, 'SPICY TUNA ROLL', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('14', 1, 'CALIFORNIA ROLL', 'keterangan', 'default.jpg', '27000', '33750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('15', 1, 'BAKED SALMON ROLL', 'keterangan', 'default.jpg', '32000', '40000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('16', 1, 'SALMON FRESH ROLL', 'keterangan', 'default.jpg', '27000', '33750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('17', 1, 'SAKE MAKI', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('18', 1, 'EBITO ROLL', 'keterangan', 'default.jpg', '27000', '33750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('19', 1, 'TAMAGO CRUNCH', 'keterangan', 'default.jpg', '18000', '22500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('2', 1, 'TOBIKO SUSHI', 'keterangan', 'default.jpg', '20000', '25000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('20', 1, 'SALMON TERIYAKI DON', 'keterangan', 'default.jpg', '29000', '36250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('21', 1, 'SALMON KATSU DON', 'keterangan', 'default.jpg', '29000', '36250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('22', 1, 'SALMON YAKINIKU DON', 'keterangan', 'default.jpg', '29000', '36250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('23', 1, 'KATSU DON', 'keterangan', 'default.jpg', '22000', '27500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('24', 1, 'EBY DON', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('25', 1, 'EBY FURAI BENTO', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('26', 1, 'CHICKEN KATSU BENTO', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('27', 1, 'CHICKEN TERIYAKI BENTO', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('28', 1, 'CHICKEN YAKINIKU BENTO', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('29', 1, 'BEEF KATSU BENTO', 'keterangan', 'default.jpg', '30000', '37500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('3', 1, 'SALMON MAYO', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('30', 1, 'BEEF TERIYAKI BENTO', 'keterangan', 'default.jpg', '30000', '37500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('31', 1, 'BEEF YAKINIKU BENTO', 'keterangan', 'default.jpg', '30000', '37500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('32', 1, 'CHICKEN TERIYAKI', 'keterangan', 'default.jpg', '20000', '25000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('33', 1, 'ENOKI CRISPY', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('34', 1, 'TAKOYAKI SOSIS', 'keterangan', 'default.jpg', '11000', '13750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('35', 1, 'TAKOYAKI CUMI', 'keterangan', 'default.jpg', '15000', '18750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('36', 1, 'TAKOYAKI CHICKEN', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('37', 1, 'CHICKEN CURRY RAMEN', 'keterangan', 'default.jpg', '22000', '27500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('38', 1, 'EBY CURRY RAMEN', 'keterangan', 'default.jpg', '23000', '28750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('39', 1, 'SAKURA RAMEN', 'keterangan', 'default.jpg', '20000', '25000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('4', 1, 'SALMON SUSHI', 'keterangan', 'default.jpg', '23000', '28750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('40', 1, 'TOKYO RAMEN', 'keterangan', 'default.jpg', '21000', '26250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('41', 1, 'TORI YAKISOBA', 'keterangan', 'default.jpg', '20000', '25000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('42', 1, 'NIKU YAKISOBA', 'keterangan', 'default.jpg', '22000', '27500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('43', 1, 'SALMON SASHIMI', 'keterangan', 'default.jpg', '30000', '37500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('44', 1, 'SHABU PAKET SMALL', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('45', 1, 'SHABU PAKET MEDIUM', 'keterangan', 'default.jpg', '40000', '50000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('46', 1, 'SHABU PAKET LARGE', 'keterangan', 'default.jpg', '55000', '68750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('47', 1, 'SHABU CHICKEN', 'keterangan', 'default.jpg', '22000', '27500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('48', 1, 'SHABU SEAFOOD', 'keterangan', 'default.jpg', '35000', '43750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('49', 1, 'SHABU BEEF', 'keterangan', 'default.jpg', '30000', '37500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('5', 1, 'KANI CRISPY ROLL', 'keterangan', 'default.jpg', '23000', '28750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('50', 1, 'SAUCE GOMA', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('51', 1, 'SAUCE TOMYUM', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('52', 1, 'YAKINIKU PAKET REGULER', 'keterangan', 'default.jpg', '37000', '46250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('53', 1, 'YAKINIKU PAKET EXTRA', 'keterangan', 'default.jpg', '60000', '75000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('54', 1, 'YAKINIKU CHICKEN', 'keterangan', 'default.jpg', '18000', '22500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('55', 1, 'YAKINIKU BEEF', 'keterangan', 'default.jpg', '22000', '27500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('56', 1, 'YAKINIKU SEAFOOD', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('57', 1, 'SAUCE YAKINIKU', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('58', 1, 'SAUCE BLACKPAPPER', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('59', 1, 'SAUCE BBQ', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('6', 1, 'TUNA CRISPY ROLL', 'keterangan', 'default.jpg', '25000', '31250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('60', 1, 'EXTRA PAKCOI', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('61', 1, 'EXTRA ENOKI', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('62', 1, 'EXTRA DAUN BAWANG', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('63', 1, 'EXTRA SAWI PUTIH', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('64', 1, 'EXTRA WORTEL', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('65', 1, 'EXTRA BOMBAY', 'keterangan', 'default.jpg', '4000', '5000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('66', 1, 'EXTRA CUMI', 'keterangan', 'default.jpg', '14000', '17500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('67', 1, 'EXTRA CHIKUWA', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('68', 1, 'EXTRA UDANG', 'keterangan', 'default.jpg', '17000', '21250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('69', 1, 'EXTRA BAKSO IKAN', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('7', 1, 'SALMON FRY ROLL', 'keterangan', 'default.jpg', '30000', '37500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('70', 1, 'EXTRA BEEF', 'keterangan', 'default.jpg', '14000', '17500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('71', 1, 'EXTRA IKAN DORI', 'keterangan', 'default.jpg', '14000', '17500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('72', 1, 'EXTRA KANI STICK', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('73', 1, 'EXTRA CHICKEN', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('74', 1, 'EXTRA SOSIS', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('75', 1, 'TAGOR SOSIS+TEH TAREEK', 'keterangan', 'default.jpg', '17000', '21250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('76', 1, 'TAGOR AYAM+TEH TAREEK', 'keterangan', 'default.jpg', '18000', '22500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('77', 1, 'TAGOR CUMI+THE TAREEK', 'keterangan', 'default.jpg', '21000', '26250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('78', 1, 'ICE OCHA', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('79', 1, 'HOT OCHA', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('8', 1, 'EBY FURAI ROLL', 'keterangan', 'default.jpg', '21000', '26250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('80', 1, 'HOT TEA', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('81', 1, 'ICE TEA', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('82', 1, 'HOT JERUK', 'keterangan', 'default.jpg', '7000', '8750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('83', 1, 'ICE JERUK', 'keterangan', 'default.jpg', '7000', '8750', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('84', 1, 'HOT CAPPUCINO', 'keterangan', 'default.jpg', '10000', '12500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('85', 1, 'ICE CAPPUCINO', 'keterangan', 'default.jpg', '10000', '12500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('86', 1, 'HOT LYCHEE TEA', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('87', 1, 'ICE LYCHEE TEA', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('88', 1, 'HOT CHOCOLATE', 'keterangan', 'default.jpg', '10000', '12500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('89', 1, 'ICE CHOCOLATE', 'keterangan', 'default.jpg', '10000', '12500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('9', 1, 'SAUZIE ROLL', 'keterangan', 'default.jpg', '18000', '22500', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('90', 1, 'HOT LEMON TEA', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('91', 1, 'ICE LEMON TEA', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('92', 1, 'AIR MINERAL', 'keterangan', 'default.jpg', '5000', '6250', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('93', 1, 'STRAWBERRY SMOOTIE', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('94', 1, 'ISLAND FREEZE', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('95', 1, 'MELON FREEZE', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('96', 1, 'LEMON SQUASH', 'keterangan', 'default.jpg', '12000', '15000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('97', 1, 'THE TAREEK MATCHA', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('98', 1, 'THE TAREEK OVALTINE', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual'),
('99', 1, 'THE TAREEK TIRAMISU', 'keterangan', 'default.jpg', '8000', '10000', '0', '2020-06-09 01:26:05', '0', 1, '2020-06-09', 'jual');

-- --------------------------------------------------------

--
-- Table structure for table `master_kategori`
--

CREATE TABLE `master_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kategori`
--

INSERT INTO `master_kategori` (`id`, `nama_kategori`, `waktu_update`) VALUES
(0, 'Minuman', '2020-06-01 20:12:00'),
(1, 'Makanan', '2020-05-18 01:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `master_komisi`
--

CREATE TABLE `master_komisi` (
  `id_komisi` int(11) NOT NULL,
  `id_penjualan` varchar(30) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_spg` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_operasional`
--

CREATE TABLE `master_operasional` (
  `id` int(11) NOT NULL,
  `tgl_operasional` date NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` varchar(60) NOT NULL,
  `editor` varchar(50) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_pegawai`
--

CREATE TABLE `master_pegawai` (
  `id` int(11) NOT NULL,
  `no_ijin` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nik` varchar(50) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pegawai`
--

INSERT INTO `master_pegawai` (`id`, `no_ijin`, `nama_pegawai`, `alamat`, `nik`, `kontak`, `waktu_update`, `id_admin`) VALUES
(1, '91230010', 'pegawai 1', 'Jember', '35203123100', '08123121', '2020-03-19 12:06:16', 0),
(2, '', 'pegawai 2', 'aaaa', '2342', '123', '2020-05-18 01:51:55', 18);

-- --------------------------------------------------------

--
-- Table structure for table `master_pembeli`
--

CREATE TABLE `master_pembeli` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pembeli`
--

INSERT INTO `master_pembeli` (`id`, `nama_pembeli`, `alamat`, `hp`, `waktu_update`) VALUES
(1, 'pembeli 2', 'jember', '123123', '2020-06-01 20:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `keterangan` text,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_supplier`
--

INSERT INTO `master_supplier` (`id`, `nama_supplier`, `alamat`, `telepon`, `keterangan`, `waktu_update`) VALUES
(1, 'supplier 1', 'jember', '123', '123', '2020-06-01 20:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `master_utility`
--

CREATE TABLE `master_utility` (
  `id_utility` int(11) NOT NULL,
  `nomor_ref` varchar(50) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `ket_utility` text NOT NULL,
  `stok_sebelum` int(11) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `nama_function` varchar(100) NOT NULL,
  `aksi_edit` enum('0','1') NOT NULL DEFAULT '1',
  `aksi_hapus` enum('0','1') NOT NULL DEFAULT '1',
  `aksi_tambah` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `label`, `controller`, `nama_function`, `aksi_edit`, `aksi_hapus`, `aksi_tambah`) VALUES
(1, 'Dashboard', 'dashboard', 'index', '1', '0', '1'),
(2, 'Master Data Beranda', 'master', 'index', '0', '0', '0'),
(3, 'Master Data Dokter', 'master', 'dokter', '1', '1', '1'),
(4, 'Master Data pembeli', 'master', 'pembeli', '1', '1', '1'),
(5, 'Master Data Supplier', 'master', 'supplier', '1', '1', '1'),
(6, 'Master Data Kategori Item', 'master', 'itemkategori', '1', '1', '1'),
(7, 'Master Data Satuan Item', 'master', 'satuan', '1', '1', '1'),
(8, 'Master Data Merk', 'master', 'merk', '1', '1', '1'),
(9, 'Master Data Obat dan Alkes', 'master', 'items', '1', '1', '1'),
(10, 'Master Racikan', 'master', 'racikan', '1', '1', '1'),
(11, 'Pembelian Beranda', 'pembelian', 'index', '0', '0', '0'),
(12, 'Purchase Order', 'pembelian', 'po', '1', '1', '1'),
(13, 'Pembelian ke Supplier', 'pembelian', 'langsung', '1', '1', '1'),
(14, 'Penerimaan Barang', 'pembelian', 'penerimaan', '0', '1', '1'),
(15, 'Retur Pembelian', 'pembelian', 'retur', '1', '1', '1'),
(16, 'Stok Beranda', 'stok', 'index', '0', '0', '0'),
(17, 'Stok Keluar Retur Pembelian', 'stok', 'keluar', '0', '1', '1'),
(18, 'Stok Adjustment', 'stok', 'adjustment', '0', '1', '1'),
(19, 'Stok Opname', 'stok', 'opname', '0', '1', '1'),
(20, 'Cetak Barcode', 'stok', 'barcode', '0', '0', '0'),
(21, 'Kartu Stok', 'stok', 'kartustok', '1', '1', '1'),
(22, 'Penjualan Beranda', 'penjualan', 'index', '0', '0', '0'),
(23, 'Diskon Produk', 'penjualan', 'diskon', '0', '1', '1'),
(24, 'Jenis Pembayaran', 'penjualan', 'jenispembayaran', '1', '1', '1'),
(25, 'Kasir / Point Of Sales', 'penjualan', 'kasir', '0', '0', '0'),
(26, 'Keuangan Beranda', 'keuangan', 'index', '0', '0', '0'),
(27, 'Kode Rekening', 'keuangan', 'koderekening', '1', '1', '1'),
(28, 'Hutang', 'keuangan', 'hutang', '0', '1', '1'),
(29, 'Cash in Cash Out', 'keuangan', 'cashinout', '1', '1', '1'),
(30, 'Laporan Beranda', 'laporan', 'index', '0', '0', '0'),
(31, 'Laporan Purchase Order', 'laporan', 'po', '0', '0', '0'),
(32, 'Laporan Pembelian', 'laporan', 'pembelian', '0', '0', '0'),
(33, 'Laporan Penerimaan Barang', 'laporan', 'penerimaan', '0', '0', '0'),
(34, 'Laporan Stok', 'laporan', 'stok', '0', '0', '0'),
(35, 'Laporan Penjualan', 'laporan', 'penjualan', '0', '0', '0'),
(36, 'Laporan Keuangan', 'laporan', 'keuangan', '0', '0', '0'),
(37, 'User Beranda', 'user', 'index', '0', '0', '0'),
(38, 'Kategori User', 'user', 'kategori', '1', '1', '1'),
(39, 'Data User', 'user', 'user', '1', '1', '1'),
(40, 'Tools Beranda', 'tools', 'index', '0', '0', '0'),
(41, 'Profil Apotek', 'tools', 'profil', '1', '0', '0'),
(42, 'Import Produk', 'tools', 'import_item', '0', '0', '1'),
(43, 'Edit Password', 'password', 'index', '1', '0', '0'),
(44, 'SPG', 'master', 'pegawai', '0', '0', '0'),
(45, 'Laporan SPG', 'laporan', 'pegawai', '0', '0', '0'),
(46, 'Master Biaya Operasional', 'master', 'operasional', '1', '1', '1'),
(47, 'Stok Utility', 'stok', 'utility', '1', '0', '1'),
(48, 'Target', 'penjualan', 'target', '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `isi` text,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_langsung`
--

CREATE TABLE `pembelian_langsung` (
  `nomor_faktur` varchar(100) NOT NULL,
  `kategori` enum('Pembelian Langsung','Purchase Order') NOT NULL DEFAULT 'Pembelian Langsung',
  `nomor_rec` varchar(100) DEFAULT NULL,
  `tgl_pembelian` date NOT NULL,
  `termin` int(5) NOT NULL,
  `pembayaran` enum('cash','hutang','lain-lain') NOT NULL DEFAULT 'cash',
  `supplier` int(11) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `waktu_update_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_langsung_detail`
--

CREATE TABLE `pembelian_langsung_detail` (
  `idd` int(11) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `sku` varchar(200) NOT NULL,
  `no_bet` varchar(20) DEFAULT NULL,
  `nama_item` varchar(200) NOT NULL,
  `tgl_expired` date NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `satuan_kecil` varchar(100) NOT NULL,
  `kuantiti` int(5) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `diskon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_barang`
--

CREATE TABLE `penerimaan_barang` (
  `nomor_rec` varchar(100) NOT NULL,
  `nomor_po` varchar(100) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `penerima` varchar(200) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_barang_detail`
--

CREATE TABLE `penerimaan_barang_detail` (
  `idd` int(11) NOT NULL,
  `nomor_rec` varchar(100) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `sku` varchar(200) NOT NULL,
  `no_bet` varchar(30) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `tgl_expired` date NOT NULL,
  `kuantiti` int(5) NOT NULL,
  `satuan_kecil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` varchar(50) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `total_harga_item` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jam` datetime NOT NULL,
  `retur` enum('0','1') NOT NULL DEFAULT '0',
  `tanggal_retur` datetime NOT NULL,
  `admin_retur` int(11) DEFAULT NULL,
  `jenis_penjualan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `kuantiti` float NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_pembayaran`
--

CREATE TABLE `penjualan_pembayaran` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `cara_bayar` enum('cash','credit card','debet') NOT NULL DEFAULT 'cash',
  `swipe` varchar(100) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `holder_name` varchar(100) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `security_code` varchar(100) NOT NULL,
  `catatan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `piutang_dibayar_history`
--

CREATE TABLE `piutang_dibayar_history` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_piutang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `piutang_history`
--

CREATE TABLE `piutang_history` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `judul` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `nominal_dibayar` decimal(10,0) NOT NULL,
  `sudah_lunas` enum('0','1') NOT NULL DEFAULT '0',
  `tanggal_lunas` date NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_apotek`
--

CREATE TABLE `profil_apotek` (
  `id` varchar(2) NOT NULL,
  `nama_apotek` varchar(300) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `no_npwp` varchar(20) NOT NULL,
  `nama_npwp` varchar(20) NOT NULL,
  `alamat_npwp` text NOT NULL,
  `bank` varchar(10) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `an` varchar(30) NOT NULL,
  `no_apoteker` varchar(20) NOT NULL,
  `tgl_masa` date NOT NULL,
  `apoteker` varchar(50) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `no_sipa` varchar(20) NOT NULL,
  `tgl_sipa` date NOT NULL,
  `nama_ttk` varchar(20) NOT NULL,
  `footer_struk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_apotek`
--

INSERT INTO `profil_apotek` (`id`, `nama_apotek`, `alamat`, `logo`, `telepon`, `hp`, `no_npwp`, `nama_npwp`, `alamat_npwp`, `bank`, `rekening`, `an`, `no_apoteker`, `tgl_masa`, `apoteker`, `alamat_ktp`, `alamat_tinggal`, `no_sipa`, `tgl_sipa`, `nama_ttk`, `footer_struk`) VALUES
('1', 'PT Airlangga Sentral Internasional', 'Kelurahan Kawangrejo Mumbulsari Jember', '1571878350.png', '0811212121', '089999', 'FP.01.04/IV/0045-e/2', 'PT Airlangga Sentral', 'Kelurahan Kawangrejo Mumbulsari Jember', 'Mandiri', '01231111', 'PT Airlangga Sentral Internasi', '0123199121112', '2025-11-27', 'riza putri agustina, S.Farm.Apt', 'disana', 'disini', '100321923', '2028-11-30', 'Katakuri', 'Terimakasih telah berbelanja');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `nomor_po` varchar(100) NOT NULL,
  `tgl_po` date NOT NULL,
  `termin` int(5) NOT NULL,
  `pembayaran` enum('cash','hutang','lain-lain') NOT NULL DEFAULT 'cash',
  `supplier` int(11) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `waktu_update_po` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `idd` int(11) NOT NULL,
  `nomor_po` varchar(100) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `sku` varchar(200) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `satuan_besar` varchar(100) NOT NULL,
  `kuantiti` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening_kode`
--

CREATE TABLE `rekening_kode` (
  `kode_rekening` varchar(30) NOT NULL,
  `kategori` enum('pemasukan','pengeluaran') NOT NULL DEFAULT 'pemasukan',
  `nama_rekening` varchar(200) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `editable` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening_kode`
--

INSERT INTO `rekening_kode` (`kode_rekening`, `kategori`, `nama_rekening`, `waktu_update`, `editable`) VALUES
('10001', 'pemasukan', 'Penjualan', '2019-05-28 14:03:51', '0'),
('10002', 'pemasukan', 'Piutang customer', '2019-05-31 10:12:45', '0'),
('10003', 'pemasukan', 'Setoran Dana Pemilik', '2019-06-05 13:31:42', '1'),
('10004', 'pemasukan', 'Penjualan Aset', '2019-06-25 03:24:04', '1'),
('20001', 'pengeluaran', 'Pembelian ke supplier', '2019-05-28 14:03:51', '0'),
('20002', 'pengeluaran', 'Pembayaran telepon', '2019-05-28 14:53:27', '1'),
('20003', 'pengeluaran', 'Pembayaran listrik', '2019-05-28 14:53:40', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stok_adjustment`
--

CREATE TABLE `stok_adjustment` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_ref` varchar(100) NOT NULL,
  `stok_sebelum` int(11) NOT NULL,
  `kuantiti_berubah` int(5) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `tgl_expired` date NOT NULL,
  `satuan_kecil` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar`
--

CREATE TABLE `stok_keluar` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_ref` varchar(100) NOT NULL,
  `nomor_retur_pembelian` varchar(100) DEFAULT NULL,
  `kuantiti` int(5) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `tgl_expired` date NOT NULL,
  `satuan_kecil` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_opname`
--

CREATE TABLE `stok_opname` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_ref` varchar(100) NOT NULL,
  `stok_sebelum` int(11) NOT NULL,
  `kuantiti_berubah` int(5) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `tgl_expired` date NOT NULL,
  `satuan_kecil` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verifikasi` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_in_out`
--
ALTER TABLE `cash_in_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_rekening` (`kode_rekening`),
  ADD KEY `id_hutang_dibayar` (`id_hutang_dibayar`),
  ADD KEY `id_piutang_dibayar` (`id_piutang_dibayar`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `hutang_dibayar_history`
--
ALTER TABLE `hutang_dibayar_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hutang` (`id_hutang`);

--
-- Indexes for table `hutang_history`
--
ALTER TABLE `hutang_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomor_faktur` (`nomor_faktur`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_item` (`kode_item`),
  ADD KEY `nomor_rec` (`nomor_rec_penerimaan`),
  ADD KEY `id_stok_keluar` (`id_stok_keluar`),
  ADD KEY `id_stok_adjustment` (`id_utility`),
  ADD KEY `id_stok_opname` (`id_stok_opname`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `kategori_user`
--
ALTER TABLE `kategori_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_user` (`kategori_user`),
  ADD KEY `beranda` (`beranda`);

--
-- Indexes for table `kategori_user_modul`
--
ALTER TABLE `kategori_user_modul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_user` (`kategori_user`),
  ADD KEY `modul` (`modul`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_keranjang` (`id_keranjang`),
  ADD KEY `kode_item` (`kode_item`);

--
-- Indexes for table `komisi_detail`
--
ALTER TABLE `komisi_detail`
  ADD PRIMARY KEY (`idd`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `master_diskon_kelipatan`
--
ALTER TABLE `master_diskon_kelipatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_item`
--
ALTER TABLE `master_item`
  ADD PRIMARY KEY (`kode_item`);

--
-- Indexes for table `master_kategori`
--
ALTER TABLE `master_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_komisi`
--
ALTER TABLE `master_komisi`
  ADD PRIMARY KEY (`id_komisi`);

--
-- Indexes for table `master_operasional`
--
ALTER TABLE `master_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pembeli`
--
ALTER TABLE `master_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_utility`
--
ALTER TABLE `master_utility`
  ADD PRIMARY KEY (`id_utility`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_langsung`
--
ALTER TABLE `pembelian_langsung`
  ADD PRIMARY KEY (`nomor_faktur`),
  ADD KEY `supplier` (`supplier`),
  ADD KEY `nomor_rec` (`nomor_rec`) USING BTREE;

--
-- Indexes for table `pembelian_langsung_detail`
--
ALTER TABLE `pembelian_langsung_detail`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `kode_item` (`kode_item`),
  ADD KEY `nomor_po` (`nomor_faktur`);

--
-- Indexes for table `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD PRIMARY KEY (`nomor_rec`);

--
-- Indexes for table `penerimaan_barang_detail`
--
ALTER TABLE `penerimaan_barang_detail`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `nomor_rec` (`nomor_rec`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `admin_retur` (`admin_retur`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_item` (`kode_item`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `penjualan_pembayaran`
--
ALTER TABLE `penjualan_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `piutang_dibayar_history`
--
ALTER TABLE `piutang_dibayar_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_piutang` (`id_piutang`);

--
-- Indexes for table `piutang_history`
--
ALTER TABLE `piutang_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `profil_apotek`
--
ALTER TABLE `profil_apotek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`nomor_po`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `kode_item` (`kode_item`),
  ADD KEY `nomor_po` (`nomor_po`);

--
-- Indexes for table `rekening_kode`
--
ALTER TABLE `rekening_kode`
  ADD PRIMARY KEY (`kode_rekening`);

--
-- Indexes for table `stok_adjustment`
--
ALTER TABLE `stok_adjustment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_ref` (`nomor_ref`),
  ADD KEY `kode_item` (`kode_item`);

--
-- Indexes for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_ref` (`nomor_ref`),
  ADD KEY `kode_item` (`kode_item`),
  ADD KEY `stok_keluar_ibfk_2` (`nomor_retur_pembelian`);

--
-- Indexes for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_ref` (`nomor_ref`),
  ADD KEY `kode_item` (`kode_item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_in_out`
--
ALTER TABLE `cash_in_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hutang_dibayar_history`
--
ALTER TABLE `hutang_dibayar_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hutang_history`
--
ALTER TABLE `hutang_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori_user`
--
ALTER TABLE `kategori_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `kategori_user_modul`
--
ALTER TABLE `kategori_user_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12094;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `komisi_detail`
--
ALTER TABLE `komisi_detail`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `master_diskon_kelipatan`
--
ALTER TABLE `master_diskon_kelipatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_kategori`
--
ALTER TABLE `master_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_komisi`
--
ALTER TABLE `master_komisi`
  MODIFY `id_komisi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_operasional`
--
ALTER TABLE `master_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_pembeli`
--
ALTER TABLE `master_pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_utility`
--
ALTER TABLE `master_utility`
  MODIFY `id_utility` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembelian_langsung_detail`
--
ALTER TABLE `pembelian_langsung_detail`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penerimaan_barang_detail`
--
ALTER TABLE `penerimaan_barang_detail`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penjualan_pembayaran`
--
ALTER TABLE `penjualan_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piutang_dibayar_history`
--
ALTER TABLE `piutang_dibayar_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piutang_history`
--
ALTER TABLE `piutang_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stok_adjustment`
--
ALTER TABLE `stok_adjustment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_in_out`
--
ALTER TABLE `cash_in_out`
  ADD CONSTRAINT `cash_in_out_ibfk_2` FOREIGN KEY (`id_hutang_dibayar`) REFERENCES `hutang_dibayar_history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cash_in_out_ibfk_3` FOREIGN KEY (`id_piutang_dibayar`) REFERENCES `piutang_dibayar_history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cash_in_out_ibfk_4` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hutang_dibayar_history`
--
ALTER TABLE `hutang_dibayar_history`
  ADD CONSTRAINT `hutang_dibayar_history_ibfk_1` FOREIGN KEY (`id_hutang`) REFERENCES `hutang_history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hutang_history`
--
ALTER TABLE `hutang_history`
  ADD CONSTRAINT `hutang_history_ibfk_1` FOREIGN KEY (`nomor_faktur`) REFERENCES `pembelian_langsung` (`nomor_faktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hutang_history_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `master_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  ADD CONSTRAINT `kartu_stok_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_stok_ibfk_2` FOREIGN KEY (`nomor_rec_penerimaan`) REFERENCES `penerimaan_barang` (`nomor_rec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_stok_ibfk_3` FOREIGN KEY (`id_stok_keluar`) REFERENCES `stok_keluar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_stok_ibfk_5` FOREIGN KEY (`id_stok_opname`) REFERENCES `stok_opname` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartu_stok_ibfk_6` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori_user`
--
ALTER TABLE `kategori_user`
  ADD CONSTRAINT `kategori_user_ibfk_1` FOREIGN KEY (`beranda`) REFERENCES `modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori_user_modul`
--
ALTER TABLE `kategori_user_modul`
  ADD CONSTRAINT `kategori_user_modul_ibfk_1` FOREIGN KEY (`kategori_user`) REFERENCES `kategori_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategori_user_modul_ibfk_2` FOREIGN KEY (`modul`) REFERENCES `modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `master_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD CONSTRAINT `keranjang_detail_ibfk_1` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_detail_ibfk_2` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD CONSTRAINT `master_admin_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pembelian_langsung_detail`
--
ALTER TABLE `pembelian_langsung_detail`
  ADD CONSTRAINT `pembelian_langsung_detail_ibfk_1` FOREIGN KEY (`nomor_faktur`) REFERENCES `pembelian_langsung` (`nomor_faktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_langsung_detail_ibfk_2` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerimaan_barang_detail`
--
ALTER TABLE `penerimaan_barang_detail`
  ADD CONSTRAINT `penerimaan_barang_detail_ibfk_1` FOREIGN KEY (`nomor_rec`) REFERENCES `penerimaan_barang` (`nomor_rec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `master_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `master_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`admin_retur`) REFERENCES `master_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `penjualan_detail_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_detail_ibfk_2` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan_pembayaran`
--
ALTER TABLE `penjualan_pembayaran`
  ADD CONSTRAINT `penjualan_pembayaran_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piutang_dibayar_history`
--
ALTER TABLE `piutang_dibayar_history`
  ADD CONSTRAINT `piutang_dibayar_history_ibfk_1` FOREIGN KEY (`id_piutang`) REFERENCES `piutang_history` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piutang_history`
--
ALTER TABLE `piutang_history`
  ADD CONSTRAINT `piutang_history_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `master_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piutang_history_ibfk_3` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`supplier`) REFERENCES `master_supplier` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD CONSTRAINT `purchase_order_detail_ibfk_1` FOREIGN KEY (`nomor_po`) REFERENCES `purchase_order` (`nomor_po`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_order_detail_ibfk_2` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok_adjustment`
--
ALTER TABLE `stok_adjustment`
  ADD CONSTRAINT `stok_adjustment_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  ADD CONSTRAINT `stok_keluar_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD CONSTRAINT `stok_opname_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
