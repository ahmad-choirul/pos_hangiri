-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 05:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rig_obat`
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

--
-- Dumping data for table `cash_in_out`
--

INSERT INTO `cash_in_out` (`id`, `kode_rekening`, `tanggal`, `masuk`, `keluar`, `id_hutang_dibayar`, `id_piutang_dibayar`, `id_penjualan`, `keterangan`) VALUES
(4, '10003', '2019-06-27', '5000000', '0', NULL, NULL, NULL, 'keterangan'),
(6, '20003', '2019-06-30', '0', '850000', NULL, NULL, NULL, 'oke'),
(7, '10003', '2019-06-02', '4000000', '0', NULL, NULL, NULL, 'tes'),
(8, '10003', '2019-06-03', '700000', '0', NULL, NULL, NULL, 'deee'),
(11, '10003', '2019-06-20', '6000000', '0', NULL, NULL, NULL, '-'),
(12, '10003', '2019-06-06', '700000', '0', NULL, NULL, NULL, 'keterangan'),
(38, '10001', '2019-06-30', '16000', '0', NULL, NULL, '300619000001', ''),
(39, '10001', '2019-06-30', '16000', '0', NULL, NULL, '300619000002', ''),
(40, '10001', '2019-06-30', '18000', '0', NULL, NULL, '300619000003', ''),
(41, '10001', '2019-06-30', '21000', '0', NULL, NULL, '300619000004', ''),
(42, '10001', '2019-06-30', '116000', '0', NULL, NULL, '300619000005', ''),
(43, '10001', '2019-07-05', '21000', '0', NULL, NULL, '050719000006', ''),
(44, '10001', '2019-07-05', '220000', '0', NULL, NULL, '050719000007', ''),
(45, '10001', '2019-10-23', '93000', '0', NULL, NULL, '231019000008', ''),
(46, '10001', '2019-10-23', '93000', '0', NULL, NULL, '231019000009', ''),
(47, '10001', '2019-10-23', '93000', '0', NULL, NULL, '231019000010', ''),
(48, '10001', '2019-10-23', '114000', '0', NULL, NULL, '231019000011', ''),
(49, '10001', '2019-10-23', '114000', '0', NULL, NULL, '231019000012', ''),
(50, '10001', '2019-10-23', '114000', '0', NULL, NULL, '231019000013', ''),
(51, '10001', '2019-10-24', '81000', '0', NULL, NULL, '241019000014', ''),
(52, '10001', '2019-10-24', '510000', '0', NULL, NULL, '241019000015', ''),
(53, '10001', '2019-10-24', '20000', '0', NULL, NULL, '241019000016', ''),
(54, '10001', '2019-10-24', '170000', '0', NULL, NULL, '241019000017', ''),
(55, '10001', '2019-10-24', '12000', '0', NULL, NULL, '241019000018', ''),
(56, '10001', '2019-10-24', '11000', '0', NULL, NULL, '241019000019', ''),
(57, '10001', '2019-10-24', '150000', '0', NULL, NULL, '241019000020', ''),
(58, '10001', '2019-11-06', '70000', '0', NULL, NULL, '061119000021', ''),
(59, '10001', '2019-11-06', '148000', '0', NULL, NULL, '061119000022', ''),
(60, '10001', '2019-11-12', '23000', '0', NULL, NULL, '121119000023', ''),
(61, '10001', '2019-11-12', '231000', '0', NULL, NULL, '121119000024', ''),
(62, '10001', '2019-11-16', '660000', '0', NULL, NULL, '161119000025', ''),
(63, '10001', '2019-11-19', '23000', '0', NULL, NULL, '191119000026', ''),
(64, '10001', '2019-11-20', '99000', '0', NULL, NULL, '201119000027', ''),
(65, '10001', '2019-11-20', '466000', '0', NULL, NULL, '201119000028', ''),
(66, '10001', '2019-12-04', '649500', '0', NULL, NULL, '041219000029', ''),
(67, '10001', '2019-12-04', '474000', '0', NULL, NULL, '041219000030', ''),
(68, '10001', '2019-12-27', '105000', '0', NULL, NULL, '271219000031', ''),
(69, '10001', '2020-04-30', '559000', '0', NULL, NULL, '300420000032', ''),
(70, '10001', '2020-04-30', '84000', '0', NULL, NULL, '300420000033', ''),
(71, '10001', '2020-04-30', '460000', '0', NULL, NULL, '300420000034', ''),
(72, '10001', '2020-04-30', '524000', '0', NULL, NULL, '300420000035', ''),
(73, '10001', '2020-04-30', '64000', '0', NULL, NULL, '300420000036', ''),
(74, '10001', '2020-04-30', '460000', '0', NULL, NULL, '300420000037', ''),
(75, '10001', '2020-04-30', '64000', '0', NULL, NULL, '300420000038', ''),
(76, '10001', '2020-05-03', '529000', '0', NULL, NULL, '030520000039', ''),
(77, '10001', '2020-05-03', '530000', '0', NULL, NULL, '030520000040', ''),
(78, '10001', '2020-05-03', '68000', '0', NULL, NULL, '030520000041', ''),
(88, '10001', '2020-05-04', '530500', '0', NULL, NULL, '040520000042', ''),
(89, '10001', '2020-05-05', '1009000', '0', NULL, NULL, '050520000043', ''),
(93, '10001', '2020-05-05', '3027000', '0', NULL, NULL, '050520000044', ''),
(94, '10001', '2020-05-05', '1009000', '0', NULL, NULL, '050520000045', ''),
(95, '10001', '2020-05-05', '41500', '0', NULL, NULL, '050520000046', '');

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

--
-- Dumping data for table `hutang_history`
--

INSERT INTO `hutang_history` (`id`, `judul`, `tanggal`, `nominal`, `nominal_dibayar`, `nomor_faktur`, `id_supplier`, `tanggal_lunas`, `tanggal_jatuh_tempo`, `sudah_lunas`, `waktu_update`, `keterangan`) VALUES
(14, 'pembelian ke supplier', '2019-06-12', '12040000', '0', 'F1306190001', 3, '0000-00-00', '2019-06-12', '0', '2019-06-13 15:27:40', '-'),
(15, 'pembelian ke supplier', '2019-06-13', '126000000', '0', 'F1306190002', 2, '0000-00-00', '2019-07-23', '0', '2019-06-13 15:27:56', '-'),
(16, 'pembelian ke supplier', '2019-06-14', '870000000', '0', 'F1306190003', 4, '0000-00-00', '2019-07-29', '0', '2019-06-13 15:28:18', '-'),
(17, 'pembelian ke supplier', '2019-06-12', '1232000000', '0', 'F1306190004', 2, '0000-00-00', '2019-06-12', '0', '2019-06-13 15:28:47', '-'),
(18, 'pembelian ke supplier', '2019-06-13', '535000000', '0', 'F1306190005', 2, '0000-00-00', '2019-06-13', '0', '2019-06-13 15:29:27', '-'),
(19, 'pembelian ke supplier', '2019-06-14', '598500000', '0', 'F1306190006', 2, '0000-00-00', '2019-06-14', '0', '2019-06-13 15:29:46', '-'),
(20, 'pembelian ke supplier', '2019-06-13', '169000000', '0', 'F1306190007', 4, '0000-00-00', '2019-08-02', '0', '2019-06-13 15:30:23', '-'),
(21, 'pembelian ke supplier', '2019-06-12', '1970000000', '0', 'F1306190008', 2, '0000-00-00', '2019-06-12', '0', '2019-06-13 15:30:50', '-'),
(22, 'pembelian ke supplier', '2019-06-13', '909000', '0', 'F2306190009', 2, '0000-00-00', '2019-06-13', '0', '2019-06-23 16:36:23', '-'),
(24, 'pembelian ke supplier', '2017-05-11', '0', '0', 'F1111190011', 2, '0000-00-00', '2017-06-01', '0', '2019-11-11 11:26:30', '-'),
(25, 'pembelian ke supplier', '2020-04-01', '80000', '0', 'F0203200011', 4, '0000-00-00', '2020-04-01', '0', '2020-03-02 04:05:29', '-'),
(26, 'pembelian ke supplier', '2020-03-14', '2750000', '0', 'F1403200012', 3, '0000-00-00', '2020-04-13', '0', '2020-03-14 07:59:59', '-');

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
  `satuan_kecil` varchar(100) NOT NULL,
  `stok_sisa` varchar(100) NOT NULL,
  `tgl_expired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_stok`
--

INSERT INTO `kartu_stok` (`id`, `nomor_rec_penerimaan`, `id_utility`, `id_stok_opname`, `id_stok_keluar`, `id_penjualan`, `kode_item`, `tanggal`, `jenis_transaksi`, `jumlah_masuk`, `jumlah_keluar`, `satuan_kecil`, `stok_sisa`, `tgl_expired`) VALUES
(193, 'PE1205200018', NULL, NULL, NULL, NULL, '01', '2020-05-02', 'pembelian ke supplier', 10, 0, '1', '', '2020-05-12');

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
  `token` varchar(200) NOT NULL,
  `tanggal_jam` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `total_upah_peracik` decimal(10,0) NOT NULL,
  `total_harga_item` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `hold` enum('0','1') NOT NULL DEFAULT '0',
  `keterangan_hold` varchar(200) NOT NULL,
  `waktu_hold` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `token`, `tanggal_jam`, `id_admin`, `id_pembeli`, `total_upah_peracik`, `total_harga_item`, `total`, `hold`, `keterangan_hold`, `waktu_hold`, `status`) VALUES
(69, 'a5a857b77a4e28dc0df2c5192c6c90be', '2019-06-30 01:42:32', 1, NULL, '0', '44000', '44000', '0', '', '', 1),
(71, 'dccbbb8941d22dac340a245b4b7052fd', '2019-06-30 03:38:33', 1, NULL, '0', '84000', '84000', '1', 'ok', '1561883934', 1),
(72, 'dccbbb8941d22dac340a245b4b7052fd', '2019-07-01 01:33:14', 1, NULL, '0', '27000', '27000', '0', '', '', 1),
(74, '4ac14df063b1729185d4e0e2a6e4379e', '2019-07-01 01:08:36', 1, NULL, '5000', '182000', '187000', '0', '', '', 1),
(75, '982c1b7178f668d87e8cf3e21a072cb8', '2019-07-02 05:31:44', 1, NULL, '0', '10500', '10500', '0', '', '', 1),
(76, '904fd9e8537785f5c73d403ffef24ee6', '2019-07-03 02:03:35', 1, 14, '0', '21000', '21000', '0', 'ddd', '1562094224', 1),
(78, 'b1f95b98bf3941e3b3c07338a2cd6402', '2019-07-03 03:31:28', 1, NULL, '0', '0', '0', '0', '', '', 1),
(79, '8f24b84bb00133ed237217cb89ae9805', '2019-07-03 10:03:52', 1, NULL, '0', '0', '0', '0', '', '', 1),
(83, '4e4b5bc22437966870148131f801a2a3', '2019-10-23 11:08:31', 1, NULL, '0', '15000', '15000', '0', 'ok', '1571846927', 1),
(88, 'cbda80635d6da07fcf23f608f30415ec', '2019-10-24 08:32:52', 2, NULL, '0', '21000', '21000', '0', '', '', 1),
(89, '9f11b01f6074db2a7bb266cc1d6b1655', '2019-10-24 09:58:24', 1, 14, '0', '0', '0', '0', '', '', 1),
(97, '7d24614628f834e6e49257d641c52e87', '2019-11-13 07:02:58', 1, NULL, '0', '48000', '48000', '0', '', '', 1),
(100, 'cf89bff1076b9c05c0351e1df063a6da', '2019-11-19 10:19:13', 1, NULL, '0', '11000', '11000', '0', '', '', 1),
(102, '492336a6f659dd9b452acab699c342ad', '2019-11-20 05:13:07', 1, 17, '0', '0', '0', '0', '', '', 1),
(103, '8d07ef2013867393fcb30b5b592ecac1', '2020-02-08 07:15:32', 1, NULL, '0', '64000', '64000', '0', '', '', 1),
(104, 'dd3ec00217ada344c6d0ea36514b31fc', '2020-02-09 10:16:42', 1, NULL, '0', '544000', '544000', '0', '', '', 1),
(106, 'b76610a60568f84746cd67e25833baf1', '2020-02-10 02:28:51', 1, NULL, '0', '90000', '90000', '0', '', '', 1),
(107, '5341f9f2db926212509d8e52ade12d97', '2020-02-11 09:06:25', 1, NULL, '0', '1502000', '1502000', '0', '', '', 1),
(108, '8c4e9995db223749a90ee6888f132a85', '2020-02-11 09:28:10', 1, NULL, '0', '466500', '466500', '0', '', '', 1),
(109, '9069dbcca8c778e0c3a7a806d69e3dbe', '2020-02-11 05:06:01', 1, NULL, '0', '15000', '15000', '0', '', '', 1),
(110, '5881b331699742cca577a420a044d334', '2020-02-24 09:55:32', 1, NULL, '0', '460000', '460000', '0', '', '', 1),
(111, 'e0f61879810127757db1ddc58b201404', '2020-03-05 11:47:34', 1, NULL, '0', '636000', '636000', '0', '', '', 1),
(112, '9ccbe7eead66c02a7bbf9f60dbbcb723', '2020-03-05 06:09:38', 1, NULL, '0', '168000', '168000', '0', '', '', 1),
(113, 'b443989cbcd82c33bd32f43a95331d2e', '2020-03-08 04:28:23', 1, NULL, '0', '1612000', '1612000', '0', '', '', 1),
(114, 'eacae93cf712447112b042d2e3219fa2', '2020-03-09 10:13:56', 1, NULL, '0', '232000', '232000', '0', '', '', 1),
(115, 'd2387a3a823e8a58a9ace4d9920dc03f', '2020-03-14 02:27:40', 1, NULL, '0', '544000', '544000', '0', '', '', 1),
(116, 'b83b8ce82760e8460ae38ec038aebff4', '2020-03-14 03:04:53', 1, NULL, '0', '460000', '460000', '0', '', '', 1),
(117, '4dfe29195a14c7e337388d3fe23c011e', '2020-03-18 06:55:23', 1, NULL, '0', '64000', '64000', '0', '', '', 1),
(118, '71b1bb2bda4c815903bdb848d9b127be', '2020-04-01 10:36:27', 1, NULL, '0', '6000', '6000', '0', '', '', 1),
(126, '4523330518cafde46e676368641d090f', '2020-04-30 03:32:35', 1, NULL, '0', '4717500', '4717500', '0', '', '', 1),
(132, '34b417f00060362cd1dd2a7fff5d3b67', '2020-05-04 10:47:28', 1, NULL, '0', '504000', '504000', '0', '', '', 0),
(136, '36c92b0609aaaa33cadc834e4d6383cd', '2020-05-05 01:19:06', 1, NULL, '0', '64000', '64000', '0', '', '', 0),
(138, 'c54c67eb176fba6f09f9cdf79b329b10', '2020-05-10 01:02:46', 1, 17, '0', '460000', '460000', '0', '', '', 0),
(139, 'a977e567680bc49fe2cd4113fa4340fa', '2020-05-12 10:18:48', 1, NULL, '0', '76000', '76000', '1', 'asdas', '1589253610', 0),
(140, '548b6ed9d3483c939fa29a6a0dc459ab', '2020-05-16 02:35:51', 1, NULL, '0', '200000', '200000', '0', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_detail`
--

CREATE TABLE `keranjang_detail` (
  `id` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `racikan` enum('0','1') NOT NULL DEFAULT '0',
  `upah_peracik` decimal(10,0) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `kuantiti` float NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang_detail`
--

INSERT INTO `keranjang_detail` (`id`, `id_keranjang`, `kode_item`, `racikan`, `upah_peracik`, `harga`, `diskon`, `kuantiti`, `total`) VALUES
(215, 140, '00002', '0', '0', '100000', '0', 2, '200000');

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
(3, 33, 'users', '$2y$10$l1yNDeXjOcFP5jUAvp/be.C4aiC4J.5kwr26wiupnzbkduT4IKe3y', 'Sang User', 'laki-laki', 'Jl. Dummy nomor Coba-coba', '', '081122334455', 'iniemail@mail.com', '1', '2020-01-07 11:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `master_bank`
--

CREATE TABLE `master_bank` (
  `singkatan` varchar(30) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `jenis` enum('credit card','debet') NOT NULL DEFAULT 'debet',
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bank`
--

INSERT INTO `master_bank` (`singkatan`, `nama_bank`, `jenis`, `waktu_update`) VALUES
('Amex', 'Amex', 'credit card', '2019-06-28 11:04:06'),
('BCA', 'Bank Central Asia', 'debet', '2019-06-28 11:02:02'),
('BNI', 'Bank Nasional Indonesia', 'debet', '2019-06-28 11:02:26'),
('BRI', 'Bank Rakyat Indonesia', 'debet', '2019-06-28 11:02:26'),
('Discover', 'Discover', 'credit card', '2019-06-28 19:02:30'),
('Mandiri', 'Bank Mandiri', 'debet', '2019-06-28 11:02:02'),
('Master Card', 'Master Card', 'credit card', '2019-06-28 11:03:30'),
('Visa', 'Visa', 'credit card', '2019-06-28 11:03:30');

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
-- Table structure for table `master_dokter`
--

CREATE TABLE `master_dokter` (
  `kode_dokter` varchar(15) NOT NULL,
  `nama_dokter` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `handphone` varchar(30) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL DEFAULT 'laki-laki',
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_dokter`
--

INSERT INTO `master_dokter` (`kode_dokter`, `nama_dokter`, `alamat`, `telepon`, `handphone`, `jenis_kelamin`, `waktu_update`) VALUES
('01', 'abcd', 'JEMBER', '0331 555666', '081234567890', 'laki-laki', '2019-11-14 09:39:57'),
('D-00012', 'Iwan na beyor man', 'Jember Kota', '6581298', '081231231312', 'laki-laki', '2019-11-20 01:18:20'),
('D0001', 'Dr Steve Tyler', 'jalan mawar melati jakarta barat', '+192309402320', '+192309402331', 'laki-laki', '2019-06-11 14:40:38'),
('D0002', 'Dr Jhon Wick', 'Jalan pelangi diatas awan jakarta selatan', '+183948938493', '-', 'laki-laki', '2019-07-02 18:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `master_item`
--

CREATE TABLE `master_item` (
  `kode_item` varchar(100) NOT NULL,
  `jenis` enum('obat','alkes','racikan') NOT NULL DEFAULT 'obat',
  `kategori` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `nama_item` varchar(200) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `no_bet` varchar(30) NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `harga_jual_distributor` decimal(10,0) NOT NULL,
  `harga_jual_3` varchar(50) NOT NULL,
  `harga_jual_4` varchar(50) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `upah_peracik` decimal(10,0) NOT NULL,
  `aturan_pakai` varchar(100) NOT NULL,
  `komisi` varchar(30) DEFAULT NULL,
  `netto` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `stok_minimal` int(11) DEFAULT NULL,
  `tgl_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_item`
--

INSERT INTO `master_item` (`kode_item`, `jenis`, `kategori`, `satuan`, `merk`, `nama_item`, `keterangan`, `lokasi`, `gambar`, `no_bet`, `harga_jual`, `harga_jual_distributor`, `harga_jual_3`, `harga_jual_4`, `waktu_update`, `upah_peracik`, `aturan_pakai`, `komisi`, `netto`, `stok`, `stok_minimal`, `tgl_expired`) VALUES
('0', '', 'PPN', 'Box', 'Acne', 'Lychee Tea', '0', '0', '0.jpg', '0', '0', '0', '', '', '2020-05-16 07:56:43', '0', '', '', '0', 0, 0, '2020-05-16'),
('00002', '', 'PPN', 'Kapsul', 'Ambeven', 'Jeruk Ice / Hot', 'Buah', 'Rak b', '00002.jpg', '1234567', '100000', '101000', '102000', '103000', '2020-05-16 07:46:54', '0', 'diminum', '', '0', 1, 0, '2020-03-30'),
('01', '', 'PPN', 'Kapsul', 'Acne', 'Cappucino', 'contoh', 'Rak a', '01.jpg', '1', '40000', '5000', '45000', '50000', '2020-05-16 07:44:03', '0', 'diminum', '', '0', 11, 0, '2020-03-29'),
('0123', '', 'PPN', 'Kapsul', 'Acne', 'Chocolate', 'coklat', '0', '0123.jpg', '40', '5000', '0', '20000', '40000', '2020-05-16 07:45:35', '1000', '3X SEHARI', '', '0', 0, 0, '2019-11-03'),
('04', '', 'PPN', 'Botol', 'Acne', 'Island Freeze', '0', '0', '04.jpg', '0', '0', '0', '', '', '2020-05-16 07:50:32', '0', '', '', '0', 0, 0, '2020-05-01'),
('05', '', 'PPN', 'Botol', 'Acne', 'Lemon Squash', 'buah', '0', '05.jpg', '0', '0', '0', '', '', '2020-05-16 07:53:14', '0', '', '', '0', 0, 0, '2020-05-02'),
('06', '', 'PPN', 'Botol', 'Acne', 'Lemon Tea', '0', '0', '06.jpg', '0', '0', '0', '', '', '2020-05-16 07:55:05', '0', '', '', '0', 0, 0, '2020-05-03'),
('08', '', 'PPN', 'Botol', 'Acne', 'Melon freeze', '', '0', '08.jpg', '0', '0', '0', '', '', '2020-05-16 07:58:39', '0', '', '', '0', 0, 0, '2020-05-16'),
('09', '', 'PPN', 'Botol', 'Ambeven', 'Nabe Ramen', '', '0', '09.jpg', '0', '0', '0', '', '', '2020-05-16 07:59:24', '0', '', '', '0', 0, 0, '2020-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `master_kategori`
--

CREATE TABLE `master_kategori` (
  `id` varchar(100) NOT NULL,
  `lokasi_kategori` varchar(30) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_kategori`
--

INSERT INTO `master_kategori` (`id`, `lokasi_kategori`, `waktu_update`) VALUES
('PPN', '', '2020-04-22 14:34:55'),
('Tanpa PPN', '', '2020-04-22 14:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `master_komisi`
--

CREATE TABLE `master_komisi` (
  `id_komisi` int(11) NOT NULL,
  `id_penjualan` varchar(30) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_komisi`
--

INSERT INTO `master_komisi` (`id_komisi`, `id_penjualan`, `tgl_transaksi`, `id_pegawai`, `total`, `waktu_update`) VALUES
(1, '300619000006', '2020-05-05', 1, '2000', '2020-05-05 06:14:43'),
(2, '300619000006', '2020-05-05', 1, '4000', '2020-05-05 09:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `master_merk`
--

CREATE TABLE `master_merk` (
  `id` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_merk`
--

INSERT INTO `master_merk` (`id`, `waktu_update`) VALUES
('Acne', '2019-06-13 12:50:41'),
('Ambeven', '2019-06-13 12:24:48'),
('Bintang Toedjo', '2019-06-13 12:44:08'),
('Cussons', '2019-06-13 11:48:37'),
('PUYER', '2019-11-14 09:44:15');

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

--
-- Dumping data for table `master_operasional`
--

INSERT INTO `master_operasional` (`id`, `tgl_operasional`, `keterangan`, `jumlah`, `editor`, `waktu_update`) VALUES
(2, '2020-04-14', 'Api Es', '1000000', 'admin', '2020-03-24 04:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `master_pembeli`
--

CREATE TABLE `master_pembeli` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `no_npwp` varchar(20) NOT NULL,
  `nama_npwp` varchar(20) NOT NULL,
  `alamat_npwp` text NOT NULL,
  `bank` varchar(20) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `an` varchar(50) NOT NULL,
  `no_apoteker` varchar(30) DEFAULT NULL,
  `tgl_masa` date DEFAULT NULL,
  `kode_dokter` varchar(15) DEFAULT NULL,
  `apoteker` varchar(50) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_tinggal` text,
  `no_sipa` varchar(50) DEFAULT NULL,
  `nama_ttk` varchar(50) DEFAULT NULL,
  `tgl_sipa` date NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jenis_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pembeli`
--

INSERT INTO `master_pembeli` (`id`, `nama_pembeli`, `alamat`, `telepon`, `hp`, `no_npwp`, `nama_npwp`, `alamat_npwp`, `bank`, `rekening`, `an`, `no_apoteker`, `tgl_masa`, `kode_dokter`, `apoteker`, `alamat_ktp`, `alamat_tinggal`, `no_sipa`, `nama_ttk`, `tgl_sipa`, `waktu_update`, `jenis_pembeli`) VALUES
(1, 'Diana', 'jakarta', '087234394939', '', '', '', '', '', '', '', '082193943993', '0000-00-00', 'D0001', '', '0000-00-00', NULL, NULL, NULL, '0000-00-00', '2019-06-11 14:39:17', 0),
(2, 'Anisa', 'bekasi utara', '-', '', '', '', '', '', '', '', '-', '0000-00-00', NULL, '', '0000-00-00', NULL, NULL, NULL, '0000-00-00', '2019-06-11 14:53:42', 0),
(9, 'Rian', '-', '-', '', '', '', '', '', '', '', '-', '0000-00-00', 'D0001', '', '0000-00-00', NULL, NULL, NULL, '0000-00-00', '2019-06-13 19:14:44', 0),
(14, 'Andika', '-', '087234394939', '', '', '', '', '', '', '', '0821939439493', '0000-00-00', 'D0001', '', '0000-00-00', NULL, NULL, NULL, '0000-00-00', '2019-06-13 19:47:07', 0),
(15, 'Jonas', '-', '019000003', '', '', '', '', '', '', '', '-', '0000-00-00', 'D0001', '', '0000-00-00', NULL, NULL, NULL, '0000-00-00', '2019-06-16 15:03:18', 0),
(16, 'Ratna', '-', '0909090', '', '', '', '', '', '', '', '-', '0000-00-00', NULL, '', '0000-00-00', NULL, NULL, NULL, '0000-00-00', '2019-06-16 15:33:08', 0),
(17, 'ANI', 'JEMBER', '', '', '', '', '', '', '', '', '081111222333', '0000-00-00', NULL, '', '0000-00-00', NULL, NULL, NULL, '0000-00-00', '2019-11-14 09:41:50', 0),
(18, 'Senyum Gelas', 'Jember Kota', '0888888881213', '', '', '', '', '', '', '', '-', '0000-00-00', NULL, 'Sri Suratmi', '2020-01-15', NULL, 'sipa-001231', NULL, '2020-04-30', '2020-03-05 05:26:14', 2),
(20, 'Strakasia ', 'Nevada', '08881231', '', '', '', '', '', '', '', '', '2020-06-24', NULL, 'Michael Sumarko', '2020-06-19', NULL, 'sipa-001231', NULL, '2020-05-27', '2020-03-28 10:39:33', 2),
(22, 'Apotek baru', 'babarabu', '08111111111', '', '', '', '', '', '', '', '', '0000-00-00', NULL, 'Srita Shikaka', '2019-11-16', NULL, 'sipa-001231', NULL, '2019-11-28', '2020-03-05 05:26:09', 2),
(23, 'APOTEK SEMESTA COKROAMINOTO', 'JALAN HOS COKROAMINOTO NO 8 JEMBER', '0331 412548', '', 'NPWP-123111', 'Cokroaminoto', 'Jember', 'BCA', '001211', 'Aminoto', '1239213131231', '2020-09-11', NULL, 'Lusia., S.Apt.', 'alamat 1111', 'tinggal 232', 'sipa-001231', 'sitompul', '2023-01-01', '2020-03-08 09:37:42', 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_racikan`
--

CREATE TABLE `master_racikan` (
  `id` int(11) NOT NULL,
  `kode_racikan` varchar(100) NOT NULL,
  `kode_obat` varchar(100) NOT NULL,
  `jumlah_obat_dibuat` float NOT NULL,
  `jumlah_obat_dipakai` float NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_satuan`
--

CREATE TABLE `master_satuan` (
  `id` varchar(100) NOT NULL,
  `isi_persatuan` int(11) NOT NULL,
  `satuan_besar` varchar(20) DEFAULT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_satuan`
--

INSERT INTO `master_satuan` (`id`, `isi_persatuan`, `satuan_besar`, `waktu_update`) VALUES
('Botol', 4, 'Dus', '2020-02-12 03:12:20'),
('Box', 0, '', '2019-06-13 12:23:46'),
('Dus', 0, '', '2019-03-23 14:18:57'),
('FLS', 0, '', '2019-11-14 09:43:54'),
('Gram', 0, '', '2019-02-16 05:53:11'),
('Kapsul', 0, '', '2019-02-16 05:53:07'),
('Papan', 0, '', '2019-02-16 05:52:49'),
('Stik', 12, 'Box', '2020-02-12 04:31:28'),
('Tablet', 0, '', '2019-02-15 15:50:09'),
('Tube', 50, 'Papan', '2020-03-24 04:16:31');

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
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pegawai`
--

INSERT INTO `master_pegawai` (`id`, `no_ijin`, `nama_pegawai`, `alamat`, `nik`, `kontak`, `waktu_update`) VALUES
(1, '91230010', 'Supratno', 'Jember', '35203123100', '08123121', '2020-03-19 12:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(200) NOT NULL,
  `no_izin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `no_npwp` varchar(30) NOT NULL,
  `nama_npwp` varchar(30) NOT NULL,
  `alamat_npwp` text NOT NULL,
  `bank` varchar(10) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `an` varchar(30) NOT NULL,
  `no_apoteker` varchar(20) NOT NULL,
  `masa_apoteker` date NOT NULL,
  `apoteker` varchar(30) NOT NULL,
  `alamat_1` text NOT NULL,
  `alamat_2` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `no_sipa` varchar(20) NOT NULL,
  `tgl_sipa` date NOT NULL,
  `nama_ttk` varchar(30) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_supplier`
--

INSERT INTO `master_supplier` (`id`, `nama_supplier`, `no_izin`, `alamat`, `telepon`, `no_npwp`, `nama_npwp`, `alamat_npwp`, `bank`, `rekening`, `an`, `no_apoteker`, `masa_apoteker`, `apoteker`, `alamat_1`, `alamat_2`, `hp`, `no_sipa`, `tgl_sipa`, `nama_ttk`, `waktu_update`) VALUES
(2, 'PT Air Mancur', '232111', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '2020-03-05 04:29:41'),
(3, 'PT Maju Sejahtera Senantiasa', '8881231991', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '2020-03-05 04:29:37'),
(4, 'PT Pelangi Jaya Bersinar', '00123010', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '2020-03-05 04:29:30'),
(5, 'PT. Besar', '102319231231', 'disini', '08881231', '12223191', 'SUKAR', 'disana', 'BCA', '012319', 'Sukir', '012319991', '2020-03-01', 'Sukri ', 'ohohooh', 'hihihihih', '0123911', '0213109', '2020-03-07', 'karjo', '2020-02-22 12:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `master_target`
--

CREATE TABLE `master_target` (
  `id` int(11) NOT NULL,
  `target_1` varchar(100) NOT NULL,
  `target_2` varchar(100) NOT NULL,
  `target_3` varchar(100) NOT NULL,
  `target_4` varchar(100) NOT NULL,
  `target_5` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_target`
--

INSERT INTO `master_target` (`id`, `target_1`, `target_2`, `target_3`, `target_4`, `target_5`, `waktu_update`) VALUES
(1, '100000', '10000', '330000', '102311', '2000', '2020-04-30 09:32:35');

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

--
-- Dumping data for table `master_utility`
--

INSERT INTO `master_utility` (`id_utility`, `nomor_ref`, `kode_item`, `ket_utility`, `stok_sebelum`, `aksi`, `jumlah`, `waktu`) VALUES
(21, 'SU2204200003', '8999909028229', '100000', 10009, '-', 9, '2020-04-22 02:19:29'),
(24, 'SU2204200002', 'AMOX01', 'asdxfghjkl', 120, '+', 25, '2020-04-22 06:00:58'),
(27, 'SU0505200004', '8999909028222', 'dsa', 1189, '-', 1, '2020-05-05 00:58:56');

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
(44, 'pegawai', 'master', 'pegawai', '0', '0', '0'),
(45, 'Laporan pegawai', 'laporan', 'pegawai', '0', '0', '0'),
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

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `isi`, `waktu_update`) VALUES
(1, 'ashahahah', '2020-03-24 05:53:12');

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

--
-- Dumping data for table `pembelian_langsung`
--

INSERT INTO `pembelian_langsung` (`nomor_faktur`, `kategori`, `nomor_rec`, `tgl_pembelian`, `termin`, `pembayaran`, `supplier`, `total`, `keterangan`, `waktu_update_pembelian`) VALUES
('F0203200011', 'Purchase Order', 'PE0103200013', '2020-04-01', 0, 'cash', 4, '80000', 'uhu', '2020-03-02 04:05:29'),
('F1111190011', 'Purchase Order', 'PO2410190012', '2017-05-11', 21, 'hutang', 2, '0', 'bagus', '2019-11-11 11:26:30'),
('F1306190001', 'Purchase Order', 'PO1306190001', '2019-06-12', 0, 'cash', 3, '12040000', '-', '2019-06-13 15:27:40'),
('F1306190002', 'Purchase Order', 'PO1306190002', '2019-06-13', 40, 'hutang', 2, '126000000', '-', '2019-06-13 15:27:56'),
('F1306190003', 'Purchase Order', 'PO1306190003', '2019-06-14', 45, 'hutang', 4, '870000000', '-', '2019-06-13 15:28:18'),
('F1306190004', 'Purchase Order', 'PO1306190004', '2019-06-12', 0, 'cash', 2, '1232000000', '-', '2019-06-13 15:28:47'),
('F1306190005', 'Purchase Order', 'PO1306190005', '2019-06-13', 0, 'cash', 2, '535000000', '-', '2019-06-13 15:29:27'),
('F1306190006', 'Purchase Order', 'PO1306190006', '2019-06-14', 0, 'cash', 2, '598500000', '', '2019-06-13 15:29:46'),
('F1306190007', 'Purchase Order', 'PO1306190007', '2019-06-13', 50, 'hutang', 4, '169000000', '-', '2019-06-13 15:30:22'),
('F1306190008', 'Purchase Order', 'PO1306190008', '2019-06-12', 0, 'cash', 2, '1970000000', '-', '2019-06-13 15:30:50'),
('F1403200012', 'Purchase Order', 'PE1403200016', '2020-03-14', 30, 'hutang', 3, '2750000', 'klop', '2020-03-14 07:59:59'),
('F2306190009', 'Purchase Order', 'PO2206190011', '2019-06-13', 0, 'cash', 2, '909000', 'ss', '2019-06-23 16:36:23');

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

--
-- Dumping data for table `penerimaan_barang`
--

INSERT INTO `penerimaan_barang` (`nomor_rec`, `nomor_po`, `tanggal_penerimaan`, `penerima`, `keterangan`, `waktu_update`) VALUES
('PE0103200013', 'PO0103200016', '2020-03-31', 'Sumartiani', 'uhu', '2020-03-01 11:26:47'),
('PE0103200014', 'PO0103200016', '2020-03-28', 'Sumartiani', 'o1o1', '2020-03-01 11:31:00'),
('PE0103200015', 'PO0103200016', '2020-03-28', 'Sumartiani', 'ojo', '2020-03-01 11:33:27'),
('PE0412190010', 'PO2206190011', '2019-12-01', 'AYU', 'LENGKAP', '2019-12-04 00:10:43'),
('PE0505200017', 'PO123', '2020-05-01', 'aa', 'aa', '2020-05-05 05:31:54'),
('PE1205200018', 'PO12052020', '2020-05-02', 'kasir', 'kirim sebagian', '2020-05-12 03:36:11'),
('PE1306190001', 'PO1306190001', '2019-06-16', 'andika', 'barang sesuai', '2019-06-13 15:31:49'),
('PE1306190002', 'PO1306190002', '2019-06-15', 'andika', 'barang sesuai semua', '2019-06-13 15:32:28'),
('PE1306190003', 'PO1306190003', '2019-06-15', 'andika', 'semua sesuai', '2019-06-13 15:33:02'),
('PE1306190004', 'PO1306190004', '2019-06-15', 'andika', 'barang mantul', '2019-06-13 15:33:51'),
('PE1306190005', 'PO1306190005', '2019-06-15', 'andika', 'sesuai semua pemesanan', '2019-06-13 15:34:36'),
('PE1306190006', 'PO1306190006', '2019-06-15', 'andika', 'oke mantul semua', '2019-06-13 15:35:29'),
('PE1306190007', 'PO1306190007', '2019-06-15', 'andika', 'semua sesuai', '2019-06-13 15:36:00'),
('PE1306190008', 'PO1306190008', '2019-06-15', 'andika', 'oke mantul', '2019-06-13 15:36:49'),
('PE1403200016', 'PO1403200017', '2020-03-14', 'nurul ihsan', 'klop', '2020-03-14 07:57:18'),
('PE1411190009', 'PO2206190011', '2019-11-14', 'SAM', 'LENGKAP', '2019-11-14 11:00:26'),
('PE1702200011', 'PO2206190011', '2020-01-29', 'Saya', '001213', '2020-02-17 07:35:49'),
('PE2702200012', 'PO2602200015', '2020-02-28', 'Sumartiani', 'qwertyuio', '2020-02-27 04:03:30');

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

--
-- Dumping data for table `penerimaan_barang_detail`
--

INSERT INTO `penerimaan_barang_detail` (`idd`, `nomor_rec`, `kode_item`, `sku`, `no_bet`, `nama_item`, `tgl_expired`, `kuantiti`, `satuan_kecil`) VALUES
(1, 'PE1306190001', '8999909028213', '8999909028213', 'AS12100', 'AFI SALEP 15 GRAM', '2025-04-22', 2000, 'Botol'),
(2, 'PE1306190001', '8999909028214', '8999909028214', '1', 'PAGODA SALEP EXTRA 10G', '2027-06-17', 1200, 'Box'),
(3, 'PE1306190002', '8999909028215', '8999909028215', '555OA1', 'BETASON KRIM 5 GRAM', '2025-04-22', 800, 'Tube'),
(4, 'PE1306190002', '8999909028216', '8999909028216', '1', 'ABIXA 10 MG TABLET', '2025-04-22', 2500, 'Botol'),
(5, 'PE1306190002', '8999909028217', '8999909028217', '1', 'ABBOTIC XL 500 MG TABLET', '2025-04-22', 1000, 'Botol'),
(6, 'PE1306190003', '8999909028218', '8999909028218', '1', 'A-B VASK 10 MG BOX 100 TABLET', '2025-04-22', 2000, 'Tablet'),
(7, 'PE1306190003', '8999909028219', '8999909028219', '1', '3TC-HBV 100 MG TABLET', '2025-04-22', 10000, 'Tablet'),
(8, 'PE1306190003', '8999909028220', '8999909028220', '1', 'COOLANT 350 ML BOTOL', '2025-04-22', 2000, 'Botol'),
(9, 'PE1306190003', '8999909028221', '8999909028221', '1', 'BONEETO 5-12 TAHUN RASA COKLAT 700 GRAM', '2025-04-22', 1000, 'Box'),
(10, 'PE1306190004', '8999909028222', '8999909028222', '1', 'APPETON WEIGHT GAIN DEWASA RASA VANILA 900 GRAM KALENG', '2030-04-22', 1200, 'Box'),
(11, 'PE1306190004', '8999909028223', '8999909028223', '1', 'ANLENE ACTIFIT RASA COKELAT 250 GRAM', '2023-06-30', 5000, 'Box'),
(12, 'PE1306190004', '8999909028224', '8999909028224', '1', 'AL SHIFA MADU ARAB 250 GRAM', '2025-04-22', 1000, 'Botol'),
(13, 'PE1306190004', '8999909028225', '8999909028225', '1', 'ADEM SARI CHING KU LARUTAN 320 ML KALENG', '2025-04-22', 1500, 'Botol'),
(14, 'PE1306190005', '8999909028226', '8999909028226', '1', 'ACANTHE SUNSCREEN SPF30 30 GRAM KRIM', '2025-04-22', 3000, 'Botol'),
(15, 'PE1306190005', '8999909028227', '8999909028227', '1', 'ANTIPLAQUE PASTA GIGI 75 GRAM TUBE', '2025-04-22', 2000, 'Tube'),
(16, 'PE1306190005', '8999909028228', '8999909028228', '1', 'ALYSSA ASHLEY WHITE MUSK BODY LOTION 750 ML BOTOL', '2025-04-22', 2000, 'Botol'),
(17, 'PE1306190006', '8999909028229', '8999909028229', '1', 'ACNES TREATMENT SERIES ACNES SEALING JELL 15 GRAM TUBE', '2025-04-22', 10000, 'Tube'),
(18, 'PE1306190006', '8999909028230', '8999909028230', '1', 'BIOVISION STRIP 10 KAPSUL', '2025-04-22', 3000, 'Tablet'),
(19, 'PE1306190006', '8999909028231', '8999909028231', '1', 'BIO GOLD GAMAT EMAS 350 GRAM', '2025-04-22', 2000, 'Botol'),
(20, 'PE1306190006', '8999909028232', '8999909028232', '1', 'BINTANG TOEDJOE MASUK ANGIN PLUS 4 TUBE', '2025-04-22', 2500, 'Botol'),
(21, 'PE1306190007', '8999909028233', '8999909028233', '1', 'BALPIRIK BALSEM GOSOK EXTRA KUAT HIJAU 20 GRAM', '2025-04-22', 5000, 'Botol'),
(22, 'PE1306190007', '8999909028234', '8999909028234', '1', 'Cussons Baby Telon Oil Plus 60 Ml', '2030-04-22', 4000, 'Botol'),
(23, 'PE1306190007', '8999909028235', '8999909028235', '1', 'AIR MANCUR PARCOK 75 ML', '2025-04-22', 3000, 'Botol'),
(24, 'PE1306190008', '8999909028236', '8999909028236', '1', 'ALBIBET ALBIRUNI BOX 50 KAPSUL', '2025-04-22', 10000, 'Botol'),
(25, 'PE1306190008', '8999909028237', '8999909028237', '1', 'AMBEVEN BOX 100 KAPSUL', '2025-04-22', 10000, 'Box'),
(26, 'PE1306190008', '8999909028238', '8999909028238', '1', 'APRICOT SYRUP 100 ML', '2025-04-22', 10000, 'Botol'),
(27, 'PE1306190008', '8999909028239', '8999909028239', '1', 'BALJITOT MINYAK GOSOK 50 ML', '2025-04-22', 10000, 'Botol'),
(28, 'PE1411190009', '8999909028215', '8999909028215', '0123AI', 'BETASON KRIM 5 GRAM', '2019-06-14', 1010, '1'),
(29, 'PE0412190010', '8999909028215', '8999909028215', '0123AI', 'BETASON KRIM 5 GRAM', '2019-06-14', 500, '1'),
(30, 'PE1702200011', '8999909028215', '8999909028215', '0123AI', 'BETASON KRIM 5 GRAM', '2019-06-14', 3, '1'),
(31, 'PE2702200012', 'AMOX01', 'AMOX01', 'BET-199231', 'AMOXYCILLIN 500MG TAB', '2020-02-28', 9, 'Kardus'),
(32, 'PE0103200013', '8999909028229', '8999909028229', 'BAT-10029', 'ACNES TREATMENT SERIES ACNES SEALING JELL 15 GRAM TUBE', '2020-03-29', 4, 'Bendel'),
(33, 'PE0103200014', '8999909028229', '8999909028229', 'BAT-10029', 'ACNES TREATMENT SERIES ACNES SEALING JELL 15 GRAM TUBE', '2020-03-29', 2, 'Bendel'),
(34, 'PE0103200015', '8999909028229', '8999909028229', 'BAT-10029', 'ACNES TREATMENT SERIES ACNES SEALING JELL 15 GRAM TUBE', '2020-03-29', 3, 'Bendel'),
(35, 'PE1403200016', 'AMOX01', 'AMOX01', 'abcde1234', 'AMOXYCILLIN 500MG TAB', '2025-01-12', 100, 'box'),
(36, 'PE0505200017', '123123112', '123123112', '1', 'barang1', '2020-05-05', 10, '1'),
(37, 'PE1205200018', '00001', '00001', '123', 'ALCO ORAL DROPS', '2020-05-12', 10, '1'),
(38, 'PE1205200018', '8999909028213', '8999909028213', '123', 'AFI SALEP 15 GRAM', '2020-05-12', 10, '1'),
(39, 'PE1205200018', '8999909028220', '8999909028220', '123', 'COOLANT 350 ML BOTOL', '2020-05-12', 20, '2');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` varchar(50) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `total_upah_peracik` decimal(10,0) NOT NULL,
  `total_harga_item` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_jam` datetime NOT NULL,
  `retur` enum('0','1') NOT NULL DEFAULT '0',
  `tanggal_retur` datetime NOT NULL,
  `admin_retur` int(11) DEFAULT NULL,
  `jenis_penjualan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_pembeli`, `id_admin`, `id_pegawai`, `total_upah_peracik`, `total_harga_item`, `total`, `tanggal`, `tanggal_jam`, `retur`, `tanggal_retur`, `admin_retur`, `jenis_penjualan`) VALUES
('030520000039', 22, 1, 0, '0', '529000', '529000', '2020-05-03', '2020-05-03 17:50:29', '0', '0000-00-00 00:00:00', NULL, 1),
('030520000040', NULL, 1, 0, '0', '530000', '530000', '2020-05-03', '2020-05-03 17:51:12', '0', '0000-00-00 00:00:00', NULL, 1),
('030520000041', NULL, 1, 0, '0', '68000', '68000', '2020-05-03', '2020-05-03 17:52:20', '0', '0000-00-00 00:00:00', NULL, 1),
('040520000042', NULL, 1, 0, '0', '530500', '530500', '2020-05-04', '2020-05-04 20:31:01', '0', '0000-00-00 00:00:00', NULL, 1),
('041219000029', NULL, 1, 1, '0', '649500', '649500', '2019-12-04', '2019-12-04 06:04:42', '0', '0000-00-00 00:00:00', NULL, 1),
('041219000030', 18, 1, 1, '0', '474000', '474000', '2019-12-04', '2019-12-04 07:01:39', '0', '0000-00-00 00:00:00', NULL, 1),
('050520000043', NULL, 1, 0, '0', '1009000', '1009000', '2020-05-05', '2020-05-05 12:32:52', '0', '0000-00-00 00:00:00', NULL, 2),
('050520000044', NULL, 1, 0, '0', '3027000', '3027000', '2020-05-05', '2020-05-05 13:13:06', '0', '0000-00-00 00:00:00', NULL, 2),
('050520000045', NULL, 1, 0, '0', '1009000', '1009000', '2020-05-05', '2020-05-05 13:14:43', '0', '0000-00-00 00:00:00', NULL, 2),
('050520000046', NULL, 1, 0, '0', '41500', '41500', '2020-05-05', '2020-05-05 16:11:05', '0', '0000-00-00 00:00:00', NULL, 1),
('050719000006', NULL, 1, 1, '0', '21000', '21000', '2019-07-05', '2019-07-05 11:15:08', '0', '0000-00-00 00:00:00', NULL, 1),
('050719000007', NULL, 1, 1, '0', '220000', '220000', '2019-07-05', '2019-07-05 11:19:49', '0', '0000-00-00 00:00:00', NULL, 1),
('061119000021', NULL, 1, 1, '0', '70000', '70000', '2019-11-06', '2019-11-06 18:29:11', '0', '0000-00-00 00:00:00', NULL, 1),
('061119000022', NULL, 1, 1, '0', '148000', '148000', '2019-11-06', '2019-11-06 18:32:23', '0', '0000-00-00 00:00:00', NULL, 1),
('121119000023', NULL, 1, 1, '0', '23000', '23000', '2019-11-12', '2019-11-12 07:09:04', '0', '0000-00-00 00:00:00', NULL, 1),
('121119000024', NULL, 1, 1, '0', '231000', '231000', '2019-11-12', '2019-11-12 07:10:24', '0', '0000-00-00 00:00:00', NULL, 1),
('161119000025', NULL, 1, 1, '0', '660000', '660000', '2019-11-16', '2019-11-16 03:18:13', '0', '0000-00-00 00:00:00', NULL, 1),
('191119000026', NULL, 1, 1, '0', '23000', '23000', '2019-11-19', '2019-11-19 22:18:52', '0', '0000-00-00 00:00:00', NULL, 1),
('201119000027', NULL, 1, 1, '0', '99000', '99000', '2019-11-20', '2019-11-20 05:12:19', '0', '0000-00-00 00:00:00', NULL, 1),
('201119000028', NULL, 1, 1, '0', '466000', '466000', '2019-11-20', '2019-11-20 07:51:10', '0', '0000-00-00 00:00:00', NULL, 1),
('231019000008', NULL, 1, 1, '0', '93000', '93000', '2019-10-23', '2019-10-23 22:53:10', '0', '0000-00-00 00:00:00', NULL, 1),
('231019000009', NULL, 1, 1, '0', '93000', '93000', '2019-10-23', '2019-10-23 22:53:39', '0', '0000-00-00 00:00:00', NULL, 1),
('231019000010', NULL, 1, 2, '0', '93000', '93000', '2019-10-23', '2019-10-23 22:53:55', '0', '0000-00-00 00:00:00', NULL, 1),
('231019000011', NULL, 1, 2, '0', '114000', '114000', '2019-10-23', '2019-10-23 22:55:20', '0', '0000-00-00 00:00:00', NULL, 1),
('231019000012', NULL, 1, 2, '0', '114000', '114000', '2019-10-23', '2019-10-23 22:56:07', '0', '0000-00-00 00:00:00', NULL, 1),
('231019000013', NULL, 1, 2, '0', '114000', '114000', '2019-10-23', '2019-10-23 23:06:48', '0', '0000-00-00 00:00:00', NULL, 1),
('241019000014', NULL, 1, 2, '0', '81000', '81000', '2019-10-24', '2019-10-24 08:10:29', '0', '0000-00-00 00:00:00', NULL, 1),
('241019000015', NULL, 1, 2, '0', '510000', '510000', '2019-10-24', '2019-10-24 08:12:57', '0', '0000-00-00 00:00:00', NULL, 1),
('241019000016', NULL, 1, 2, '0', '20000', '20000', '2019-10-24', '2019-10-24 08:15:40', '0', '0000-00-00 00:00:00', NULL, 1),
('241019000017', 9, 1, 2, '0', '170000', '170000', '2019-10-24', '2019-10-24 09:45:56', '0', '0000-00-00 00:00:00', NULL, 1),
('241019000018', NULL, 1, 2, '0', '12000', '12000', '2019-10-24', '2019-10-24 10:36:26', '0', '0000-00-00 00:00:00', NULL, 1),
('241019000019', NULL, 1, 2, '0', '11000', '11000', '2019-10-24', '2019-10-24 10:40:07', '0', '0000-00-00 00:00:00', NULL, 1),
('241019000020', NULL, 1, 2, '0', '150000', '150000', '2019-10-24', '2019-10-24 10:49:15', '0', '0000-00-00 00:00:00', NULL, 1),
('271219000031', NULL, 1, 1, '0', '105000', '105000', '2019-12-27', '2019-12-27 16:20:22', '0', '0000-00-00 00:00:00', NULL, 1),
('300420000032', NULL, 1, 0, '0', '559000', '559000', '2020-04-30', '2020-04-30 15:19:13', '0', '0000-00-00 00:00:00', NULL, 1),
('300420000033', NULL, 1, 0, '0', '84000', '84000', '2020-04-30', '2020-04-30 15:24:14', '0', '0000-00-00 00:00:00', NULL, 1),
('300420000034', NULL, 1, 0, '0', '460000', '460000', '2020-04-30', '2020-04-30 15:24:28', '0', '0000-00-00 00:00:00', NULL, 1),
('300420000035', NULL, 1, 0, '0', '524000', '524000', '2020-04-30', '2020-04-30 15:27:32', '0', '0000-00-00 00:00:00', NULL, 1),
('300420000036', NULL, 1, 0, '0', '64000', '64000', '2020-04-30', '2020-04-30 15:29:23', '0', '0000-00-00 00:00:00', NULL, 1),
('300420000037', NULL, 1, 0, '0', '460000', '460000', '2020-04-30', '2020-04-30 15:29:39', '0', '0000-00-00 00:00:00', NULL, 1),
('300420000038', NULL, 1, 0, '0', '64000', '64000', '2020-04-30', '2020-04-30 15:30:43', '0', '0000-00-00 00:00:00', NULL, 1),
('300619000001', NULL, 1, 1, '5000', '11000', '16000', '2019-06-30', '2019-06-30 00:15:46', '0', '0000-00-00 00:00:00', NULL, 1),
('300619000002', 9, 1, 1, '5000', '11000', '16000', '2019-06-30', '2019-06-30 00:16:05', '0', '0000-00-00 00:00:00', NULL, 1),
('300619000003', NULL, 1, 1, '0', '18000', '18000', '2019-06-30', '2019-06-30 01:42:20', '0', '0000-00-00 00:00:00', NULL, 1),
('300619000004', NULL, 1, 1, '0', '21000', '21000', '2019-06-30', '2019-06-30 12:09:18', '0', '0000-00-00 00:00:00', NULL, 1),
('300619000005', NULL, 1, 1, '0', '116000', '116000', '2019-06-30', '2019-06-30 15:40:56', '0', '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `racikan` enum('0','1') NOT NULL DEFAULT '0',
  `upah_peracik` decimal(10,0) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `kuantiti` float NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `stok_sisa` int(11) DEFAULT NULL
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

--
-- Dumping data for table `penjualan_pembayaran`
--

INSERT INTO `penjualan_pembayaran` (`id`, `id_penjualan`, `nominal`, `cara_bayar`, `swipe`, `card_no`, `holder_name`, `bank`, `month`, `year`, `security_code`, `catatan`) VALUES
(29, '300619000001', '20000', 'cash', '', '', '', '', '', '', '', ''),
(30, '300619000002', '16000', 'cash', '', '', '', '', '', '', '', ''),
(31, '300619000003', '18000', 'cash', '', '', '', '', '', '', '', ''),
(32, '300619000004', '25000', 'cash', '', '', '', '', '', '', '', ''),
(33, '300619000005', '50000', 'cash', '', '', '', '', '', '', '', ''),
(34, '300619000005', '66000', 'credit card', '', '', '', 'Amex', '', '', '', ''),
(35, '050719000006', '21000', 'cash', '', '', '', '', '', '', '', ''),
(36, '050719000007', '220000', 'cash', '', '', '', '', '', '', '', ''),
(37, '231019000008', '100000', 'cash', '', '', '', '', '', '', '', ''),
(38, '231019000009', '100000', 'cash', '', '', '', '', '', '', '', ''),
(39, '231019000010', '200000', 'cash', '', '', '', '', '', '', '', ''),
(40, '231019000011', '300000', 'cash', '', '', '', '', '', '', '', ''),
(41, '231019000012', '300000', 'cash', '', '', '', '', '', '', '', ''),
(42, '231019000013', '200000', 'cash', '', '', '', '', '', '', '', ''),
(43, '241019000014', '100000', 'cash', '', '', '', '', '', '', '', ''),
(44, '241019000015', '510000', 'cash', '', '', '', '', '', '', '', ''),
(45, '241019000016', '200000', 'cash', '', '', '', '', '', '', '', ''),
(46, '241019000017', '200000', 'cash', '', '', '', '', '', '', '', ''),
(47, '241019000018', '50000', 'cash', '', '', '', '', '', '', '', ''),
(48, '241019000019', '12000', 'cash', '', '', '', '', '', '', '', ''),
(49, '241019000020', '400000', 'cash', '', '', '', '', '', '', '', ''),
(50, '061119000021', '370000', 'cash', '', '', '', '', '', '', '', ''),
(51, '061119000022', '148000', 'cash', '', '', '', '', '', '', '', ''),
(52, '121119000023', '50000', 'cash', '', '', '', '', '', '', '', ''),
(53, '121119000024', '2500000', 'cash', '', '', '', '', '', '', '', ''),
(54, '161119000025', '700000', 'cash', '', '', '', '', '', '', '', ''),
(55, '191119000026', '50000', 'cash', '', '', '', '', '', '', '', ''),
(56, '201119000027', '110000', 'cash', '', '', '', '', '', '', '', ''),
(57, '201119000028', '500000', 'cash', '', '', '', '', '', '', '', ''),
(58, '041219000029', '700000', 'cash', '', '', '', '', '', '', '', ''),
(59, '041219000030', '500000', 'cash', '', '', '', '', '', '', '', ''),
(60, '271219000031', '200000', 'cash', '', '', '', '', '', '', '', ''),
(61, '300420000032', '0', 'cash', '', '', '', '', '', '', '', ''),
(62, '300420000033', '0', 'cash', '', '', '', '', '', '', '', ''),
(63, '300420000034', '0', 'cash', '', '', '', '', '', '', '', ''),
(64, '300420000035', '0', 'cash', '', '', '', '', '', '', '', ''),
(65, '300420000036', '0', 'cash', '', '', '', '', '', '', '', ''),
(66, '300420000037', '0', 'cash', '', '', '', '', '', '', '', ''),
(67, '300420000038', '0', 'cash', '', '', '', '', '', '', '', ''),
(68, '030520000039', '0', 'cash', '', '', '', '', '', '', '', ''),
(69, '030520000040', '0', 'cash', '', '', '', '', '', '', '', ''),
(70, '030520000041', '0', 'cash', '', '', '', '', '', '', '', '');

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

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`nomor_po`, `tgl_po`, `termin`, `pembayaran`, `supplier`, `total`, `keterangan`, `waktu_update_po`) VALUES
('PO0103200016', '2020-04-01', 0, 'cash', 4, '0', 'uhu', '2020-03-01 11:25:27'),
('PO1111190013', '2017-05-11', 21, 'hutang', 2, '0', 'H', '2019-11-11 11:23:03'),
('PO12052020', '2020-05-01', 0, 'cash', 3, '0', 'pesan bahan makan', '2020-05-12 03:34:56'),
('PO123', '2020-05-01', 0, 'cash', 2, '0', 'a', '2020-05-05 05:30:44'),
('PO1306190001', '2019-06-02', 0, 'cash', 3, '12040000', '-', '2019-06-13 14:39:40'),
('PO1306190002', '2019-06-03', 40, 'hutang', 2, '126000000', '-', '2019-06-13 14:42:31'),
('PO1306190003', '2019-06-04', 45, 'hutang', 4, '870000000', '-', '2019-06-13 14:46:07'),
('PO1306190004', '2019-06-04', 0, 'cash', 2, '1232000000', '-', '2019-06-13 14:58:26'),
('PO1306190005', '2019-05-27', 0, 'cash', 2, '535000000', '-', '2019-06-13 15:05:37'),
('PO1306190006', '2019-05-06', 0, 'cash', 2, '598500000', '', '2019-06-13 15:10:00'),
('PO1306190007', '2019-05-11', 50, 'hutang', 4, '169000000', '-', '2019-06-13 15:13:15'),
('PO1306190008', '2019-05-10', 0, 'cash', 2, '1970000000', '-', '2019-06-13 15:16:39'),
('PO1403200017', '2020-03-10', 30, 'hutang', 3, '0', '', '2020-03-14 07:52:36'),
('PO1411190014', '2019-11-14', 30, 'hutang', 2, '0', 'CITO', '2019-11-14 10:05:04'),
('PO2206190009', '2019-08-23', 11, 'hutang', 2, '1800000', '-', '2019-06-30 14:31:48'),
('PO2206190010', '2019-05-31', 0, 'cash', 2, '1331000', '-', '2019-06-30 14:31:51'),
('PO2206190011', '2019-05-07', 0, 'cash', 2, '909000', '-', '2019-06-30 14:31:57'),
('PO2410190012', '2019-10-03', 0, 'cash', 2, '0', 'bagus', '2019-10-24 01:02:20'),
('PO2602200015', '2020-02-15', 1, 'hutang', 3, '0', 'baru', '2020-02-26 05:20:41');

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

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`idd`, `nomor_po`, `kode_item`, `sku`, `nama_item`, `satuan_besar`, `kuantiti`) VALUES
(53, 'PO12052020', '01', '00001', 'ALCO ORAL DROPS', '1', 0);

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
-- Table structure for table `retur_detail`
--

CREATE TABLE `retur_detail` (
  `idd` int(11) NOT NULL,
  `nomor_retur` varchar(100) NOT NULL,
  `kode_item` varchar(100) NOT NULL,
  `sku` varchar(200) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `tgl_expired` date NOT NULL,
  `kuantiti` int(5) NOT NULL,
  `satuan_kecil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_detail`
--

INSERT INTO `retur_detail` (`idd`, `nomor_retur`, `kode_item`, `sku`, `nama_item`, `tgl_expired`, `kuantiti`, `satuan_kecil`) VALUES
(5, 'RE2306190001', '8999909028236', '8999909028236', 'ALBIBET ALBIRUNI BOX 50 KAPSUL', '2025-04-22', 10, 'Botol'),
(6, 'RE2306190001', '8999909028237', '8999909028237', 'AMBEVEN BOX 100 KAPSUL', '2025-04-22', 20, 'Box'),
(7, 'RE2306190001', '8999909028238', '8999909028238', 'APRICOT SYRUP 100 ML', '2025-04-22', 11, 'Botol'),
(8, 'RE2306190001', '8999909028239', '8999909028239', 'BALJITOT MINYAK GOSOK 50 ML', '2025-04-22', 0, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

CREATE TABLE `retur_pembelian` (
  `nomor_retur` varchar(100) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL,
  `nomor_rec_penerimaan` varchar(100) NOT NULL,
  `tanggal_retur` date NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_pembelian`
--

INSERT INTO `retur_pembelian` (`nomor_retur`, `nomor_faktur`, `nomor_rec_penerimaan`, `tanggal_retur`, `keterangan`, `waktu_update`) VALUES
('RE2306190001', 'F1306190008', 'PE1306190008', '2019-06-26', 'koe', '2019-06-23 18:49:23');

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
-- Indexes for table `master_bank`
--
ALTER TABLE `master_bank`
  ADD PRIMARY KEY (`singkatan`);

--
-- Indexes for table `master_diskon_kelipatan`
--
ALTER TABLE `master_diskon_kelipatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_item` (`kode_item`);

--
-- Indexes for table `master_dokter`
--
ALTER TABLE `master_dokter`
  ADD PRIMARY KEY (`kode_dokter`);

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
-- Indexes for table `master_merk`
--
ALTER TABLE `master_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_operasional`
--
ALTER TABLE `master_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pembeli`
--
ALTER TABLE `master_pembeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_dokter` (`kode_dokter`);

--
-- Indexes for table `master_racikan`
--
ALTER TABLE `master_racikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_racikan_ibfk_1` (`kode_racikan`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `master_satuan`
--
ALTER TABLE `master_satuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_satuan_besar` (`satuan_besar`);

--
-- Indexes for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_target`
--
ALTER TABLE `master_target`
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
-- Indexes for table `retur_detail`
--
ALTER TABLE `retur_detail`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `nomor_rec` (`nomor_retur`);

--
-- Indexes for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD PRIMARY KEY (`nomor_retur`),
  ADD KEY `nomor_faktur` (`nomor_faktur`),
  ADD KEY `nomor_rec_penerimaan` (`nomor_rec_penerimaan`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `hutang_dibayar_history`
--
ALTER TABLE `hutang_dibayar_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hutang_history`
--
ALTER TABLE `hutang_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT for table `komisi_detail`
--
ALTER TABLE `komisi_detail`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_diskon_kelipatan`
--
ALTER TABLE `master_diskon_kelipatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `master_komisi`
--
ALTER TABLE `master_komisi`
  MODIFY `id_komisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_operasional`
--
ALTER TABLE `master_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_pembeli`
--
ALTER TABLE `master_pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `master_racikan`
--
ALTER TABLE `master_racikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_target`
--
ALTER TABLE `master_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_utility`
--
ALTER TABLE `master_utility`
  MODIFY `id_utility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian_langsung_detail`
--
ALTER TABLE `pembelian_langsung_detail`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `penerimaan_barang_detail`
--
ALTER TABLE `penerimaan_barang_detail`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `penjualan_pembayaran`
--
ALTER TABLE `penjualan_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
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
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `retur_detail`
--
ALTER TABLE `retur_detail`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_in_out`
--
ALTER TABLE `cash_in_out`
  ADD CONSTRAINT `cash_in_out_ibfk_1` FOREIGN KEY (`kode_rekening`) REFERENCES `rekening_kode` (`kode_rekening`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `kartu_stok_ibfk_4` FOREIGN KEY (`id_utility`) REFERENCES `stok_adjustment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `master_diskon_kelipatan`
--
ALTER TABLE `master_diskon_kelipatan`
  ADD CONSTRAINT `master_diskon_kelipatan_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_pembeli`
--
ALTER TABLE `master_pembeli`
  ADD CONSTRAINT `master_pembeli_ibfk_1` FOREIGN KEY (`kode_dokter`) REFERENCES `master_dokter` (`kode_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_racikan`
--
ALTER TABLE `master_racikan`
  ADD CONSTRAINT `master_racikan_ibfk_1` FOREIGN KEY (`kode_racikan`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_racikan_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `retur_detail`
--
ALTER TABLE `retur_detail`
  ADD CONSTRAINT `retur_detail_ibfk_1` FOREIGN KEY (`nomor_retur`) REFERENCES `retur_pembelian` (`nomor_retur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD CONSTRAINT `retur_pembelian_ibfk_1` FOREIGN KEY (`nomor_faktur`) REFERENCES `pembelian_langsung` (`nomor_faktur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `retur_pembelian_ibfk_2` FOREIGN KEY (`nomor_rec_penerimaan`) REFERENCES `penerimaan_barang` (`nomor_rec`) ON UPDATE CASCADE;

--
-- Constraints for table `stok_adjustment`
--
ALTER TABLE `stok_adjustment`
  ADD CONSTRAINT `stok_adjustment_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  ADD CONSTRAINT `stok_keluar_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_keluar_ibfk_2` FOREIGN KEY (`nomor_retur_pembelian`) REFERENCES `retur_pembelian` (`nomor_retur`) ON UPDATE CASCADE;

--
-- Constraints for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD CONSTRAINT `stok_opname_ibfk_1` FOREIGN KEY (`kode_item`) REFERENCES `master_item` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
