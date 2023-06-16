-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 05:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_awal` double(15,2) NOT NULL,
  `status` enum('New','In Proccess','Sold') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `harga_awal`, `status`) VALUES
(1, 'Akun Endgame', '<p>AR : 60</p><p>Server : Asia</p><p>Bind : Username &amp; Email</p><p>Status : Aman Reff First Own</p><p>Main Character : Aether</p><p>• Character : Zhongli, Venti, Raiden Shogun, Nahida, Eula, Ganyu, Yelan C1, Hutao C1,Kazuha,Xiao, Shenhe, Ayaka, Cyno, Yae Miko, Childe, Klee</p><p>• Weapon : Aqua Simulacra, Amos\' Bow, Elegy, Floating Dreams, Staff Of The Scarlett Sands 2x, Engulfing, Vortex, Skywarb Spine, Staff Of Homa, SOBP, Beacon Of the reed sea 2x</p><p>Rincian : AllSet ,Rate Off ,NoMinus , Blessing On, Fragile Resin Utuh, End Game, All Map 100% , WellBuild, Easy Spiral Abyss, Matrial Melimpah, Weapon Event &amp; Pet Lengkap (Endora Ada)</p>', 2000000.00, 'Sold'),
(2, 'Akun Midgame', '<p>Ar55, user only (normal)</p><p>   bd gmail unset</p><p>   Tignari c1</p><p>Rate on pity 15, primo 1600+</p><p>IF 26   f2p  ( ada akun hi3 )</p>', 300000.00, 'Sold'),
(3, 'Akun Midgame2', '<p>Spek : AR 40 an, Nahida + Tighnari, rate on high pity,</p><p>Wp b5 skyward blade &amp; atlas, All Unset, F2p</p><p>Tuker : Al Haitam + kuki + xingqiu, Rate on , All unset, Ar 28 ke atas, MC cowo</p>', 50000.00, 'In Proccess'),
(4, 'Akun Starter', '<p>Xiao C1+ Sign </p>', 80000.00, 'In Proccess'),
(5, 'Akun Midgame3', '<p>spek : AR 40, All unset, Nahida ,Nilou, Yelan, Cyno C1, Jean C2, F2P</p><p>Pengen tuker ke Varian : Al haitam + Nahida + Kuki + xingquu, all unset, ar 28 keatas, MC cowo</p>', 100000.00, 'In Proccess'),
(6, 'Akun Endgame2', '<p>Asia Server AR 59 F2P</p><p>c1 hutao + homa, c1 kokomi, c1 ganyu, c1 kazuha, c1 qiqi, c2 diluc, c2 keqing, c3 mona</p>', 300000.00, 'In Proccess'),
(7, 'Akun Starter2', '<p>Ar10 Asia username set, Bd unset</p><p>Xinqiu c5, Ningguang c1, Beidou c2</p>', 20000.00, 'In Proccess'),
(8, 'Akun Starter3', '<p>Ar 10 Asia</p><p>username set, Pitty event 40, Bd unset, xingqiu c2, chongyun c1, Beidou c2, Barbara c2, Noelle c1</p>', 200000.00, 'New'),
(9, 'Akun Midgame4', '<p>Kazuha qiqi </p><p>rate on pity 72 if</p>', 80000.00, 'New'),
(10, 'Akun Midgame5', '<p>Eula qiqi</p><p>rate on pity 62 if 28</p>', 80000.00, 'New'),
(11, 'Akun Endgame3', '<p><span style=\"color: var(--primary-text);\">AR 58</span></p><p><span style=\"color: var(--primary-text);\">Allset</span></p><p><span style=\"color: var(--primary-text);\">Pity 30 rate off</span></p><p><span style=\"color: var(--primary-text);\">Weapon B5 : pjws, lost prayer, the unforged, skyward pride</span></p><p><span style=\"color: var(--primary-text);\">Msih banyak ladang primo di sumeru</span></p><p><span style=\"color: var(--primary-text);\">Akun udh gak ke urus</span></p>', 600000.00, 'In Proccess');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_barang`
-- (See below for the actual view)
--
CREATE TABLE `detail_barang` (
`id_barang` int(11)
,`nama_barang` varchar(100)
,`deskripsi` text
,`harga_awal` double(15,2)
,`gambar` varchar(100)
,`status` enum('New','In Proccess','Sold')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_lelang`
-- (See below for the actual view)
--
CREATE TABLE `detail_lelang` (
`id_lelang` int(11)
,`id_barang` int(11)
,`tgl_mulai` date
,`tgl_akhir` date
,`nama_barang` varchar(100)
,`gambar` varchar(100)
,`deskripsi` text
,`harga_awal` double(15,2)
,`harga_akhir` double(15,2)
,`status` enum('open','closed','cancel','confirmed')
,`confirm_date` datetime
,`created_by` int(11)
,`penanggungjawab` varchar(50)
,`created_date` datetime
,`id_masyarakat` int(11)
,`pemenang` varchar(100)
,`email` varchar(100)
,`nik` char(16)
,`jk` enum('Perempuan','Laki-laki')
,`no_hp` varchar(15)
,`alamat` varchar(250)
,`allow_edit` varchar(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_penawaran`
-- (See below for the actual view)
--
CREATE TABLE `detail_penawaran` (
`id_penawaran` int(11)
,`id_masyarakat` int(11)
,`nama_penawar` varchar(100)
,`email_penawar` varchar(100)
,`no_hp` varchar(15)
,`status_penawar` tinyint(1)
,`status_lelang` enum('open','closed','cancel','confirmed')
,`id_lelang` int(11)
,`tgl_penawaran` datetime
,`id_barang` int(11)
,`nama_barang` varchar(100)
,`deskripsi` text
,`gambar` varchar(100)
,`harga_awal` double(15,2)
,`harga_penawaran` double(15,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `utama` tinyint(1) DEFAULT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_barang`, `nama_gambar`, `gambar`, `utama`, `urutan`) VALUES
(1, 1, 'genshin5.jpg', '640bd32f5c6f4915864545.jpg', 1, 0),
(2, 2, 'genshin4.jpg', '640bd95e033af151121888.jpg', 1, 0),
(3, 2, 'genshin4(1).jpg', '640bd965e1444073817847.jpg', 0, 1),
(4, 1, 'genshin5(1).jpg', '640bd97393a11719091240.jpg', 0, 1),
(5, 1, 'genshin5(2).jpg', '640bd978a03c5080115964.jpg', 0, 2),
(6, 1, 'genshin5(3).jpg', '640bd97d5647f141317410.jpg', 0, 3),
(7, 3, 'p1.jpg', '640bf8213f96d048832240.jpg', 1, 0),
(9, 3, 'p1(1).jpg', '640bf841949eb917018478.jpg', 0, 2),
(10, 3, 'p1(2).jpg', '640bf8931fa6f748649856.jpg', 0, 3),
(11, 4, 'p2.jpg', '640bf90fb52be173553433.jpg', 1, 0),
(12, 4, 'p2(2).jpg', '640bf91b05e62834766547.jpg', 0, 1),
(13, 4, 'p2(3).jpg', '640bf92066e7e210981124.jpg', 0, 2),
(14, 5, 'p3.jpg', '640bfa4cb50db098725613.jpg', 1, 0),
(15, 5, 'p3(1).jpg', '640bfa57501eb771762801.jpg', 0, 1),
(16, 5, 'p3(2).jpg', '640bfa7e3b569620860052.jpg', 0, 2),
(17, 6, 'p4.jpg', '640bfb84684e3365789424.jpg', 1, 0),
(18, 6, 'p4(1).jpg', '640bfbb054d7c121643681.jpg', 0, 1),
(19, 6, 'p4(2).jpg', '640bfbb483bff988513288.jpg', 0, 2),
(20, 7, 'p5.jpg', '640bfc0046a9a024435206.jpg', 1, 0),
(21, 8, 'p6.jpg', '640bfc4472801592355557.jpg', 1, 0),
(22, 9, 'p7.jpg', '640bfc929536d833175333.jpg', 1, 0),
(23, 10, 'p8.jpg', '640bfccbcde20348594340.jpg', 1, 0),
(24, 11, 'p9.jpg', '640c01445f5fb216786873.jpg', 1, 0),
(25, 11, 'p9(1).jpg', '640c014eaed7d464499978.jpg', 0, 1),
(26, 11, 'p9(2).jpg', '640c015d5c169869848306.jpg', 0, 2),
(27, 11, 'p9(3).jpg', '640c0163b1fbf353561647.jpg', 0, 3);

--
-- Triggers `gambar`
--
DELIMITER $$
CREATE TRIGGER `update urutan` BEFORE INSERT ON `gambar` FOR EACH ROW set NEW.urutan = (select ifnull((max(g.urutan) + 1),0) from gambar g where g.id_barang = NEW.id_barang)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `get_max_penawaran`
-- (See below for the actual view)
--
CREATE TABLE `get_max_penawaran` (
`id_lelang` int(11)
,`id_masyarakat` int(11)
,`harga_penawaran` double(15,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `harga_awal` double(15,2) NOT NULL,
  `status` enum('open','closed','cancel','confirmed') DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `id_masyarakat` int(11) DEFAULT NULL,
  `harga_akhir` double(15,2) DEFAULT NULL,
  `confirm_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `id_barang`, `tgl_mulai`, `tgl_akhir`, `harga_awal`, `status`, `created_by`, `created_date`, `id_masyarakat`, `harga_akhir`, `confirm_date`) VALUES
(1, 1, '2023-03-11', '2023-03-18', 2000000.00, 'confirmed', 2, '2023-03-11 08:29:50', 2, 2600000.00, NULL),
(2, 2, '2023-03-11', '2023-03-18', 300000.00, 'closed', 2, '2023-03-11 08:34:47', 4, 400000.00, NULL),
(3, 3, '2023-03-11', '2023-06-10', 50000.00, 'open', 2, '2023-03-11 11:00:34', NULL, NULL, NULL),
(4, 4, '2023-03-11', '2023-03-25', 80000.00, 'open', 2, '2023-03-11 11:01:51', NULL, NULL, NULL),
(5, 5, '2023-03-11', '2023-07-29', 100000.00, 'open', 2, '2023-03-11 11:02:06', NULL, NULL, NULL),
(6, 6, '2023-03-11', '2023-03-18', 300000.00, 'open', 2, '2023-03-11 11:02:48', NULL, NULL, NULL),
(7, 7, '2023-03-20', '2023-03-22', 20000.00, 'cancel', 2, '2023-03-11 11:07:13', NULL, NULL, NULL),
(8, 11, '2023-03-11', '2023-06-16', 600000.00, 'open', 2, '2023-03-11 11:20:18', NULL, NULL, NULL),
(9, 7, '2023-03-11', '2023-07-15', 20000.00, 'open', 2, '2023-03-11 13:51:40', NULL, NULL, NULL),
(10, 9, '2023-03-18', '2023-03-20', 80000.00, 'cancel', 2, '2023-03-11 13:52:43', NULL, NULL, NULL);

--
-- Triggers `lelang`
--
DELIMITER $$
CREATE TRIGGER `insert harga awal` BEFORE INSERT ON `lelang` FOR EACH ROW set NEW.harga_awal = (select harga_awal from barang where id_barang = NEW.id_barang)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update barang` AFTER INSERT ON `lelang` FOR EACH ROW update barang set status = "In Proccess" WHERE id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `lelang_berlangsung`
-- (See below for the actual view)
--
CREATE TABLE `lelang_berlangsung` (
`id_lelang` int(11)
,`id_barang` int(11)
,`nama_barang` varchar(100)
,`gambar` varchar(100)
,`deskripsi` text
,`tgl_mulai` date
,`tgl_akhir` date
,`harga_awal` double(15,2)
,`total_penawaran` bigint(21)
,`harga_tertinggi` double(15,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('Perempuan','Laki-laki') DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `tgl_join` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 1,
  `update_by` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `email`, `username`, `password`, `nik`, `nama`, `jk`, `no_hp`, `alamat`, `tgl_join`, `status`, `update_by`, `update_date`) VALUES
(2, 'irwanaja@gmail.com', 'Irwan', '$2y$10$Y2KzYExxBH1tGtPVOqLfaO.EHv9OiRVQM50wXy80FWV0q90rSYSP.', '3721839183192', 'Irwan Hendriansyah', 'Laki-laki', '038127381989', 'Curug Dengdeng', '2023-03-11 02:41:36', 1, 1, '2023-03-11 08:33:27'),
(3, 'rakhisyuda@gmail.com', 'RakhisYudha', '$2y$10$97mZVLraITeLztBXF5sLguUyAGKCnD3hSoUb9PjYFWd5KfizYmGvS', '32839139109320', 'Rakhis Yudha', 'Laki-laki', '0838217381728', 'Gang Casar', '2023-03-11 07:41:49', 1, NULL, '2023-03-11 13:41:49'),
(4, 'saya@gmail.com', 'ejesss', '$2y$10$imVafnCznYe./EGBbTFqeOF99I3pLcJfgxHXOLGEVkYciPKIP0QZi', '3232813988219', 'Syahreiza', 'Laki-laki', '082142892381', 'Cibedug', '2023-03-11 08:01:21', 1, NULL, '2023-03-11 14:01:21');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pemenang_lelang`
-- (See below for the actual view)
--
CREATE TABLE `pemenang_lelang` (
`id_lelang` int(11)
,`tgl_mulai` date
,`tgl_akhir` date
,`id_masyarakat` int(11)
,`pemenang` varchar(100)
,`nik` char(16)
,`jk` enum('Perempuan','Laki-laki')
,`email` varchar(100)
,`no_hp` varchar(15)
,`alamat` varchar(250)
,`id_barang` int(11)
,`nama_barang` varchar(100)
,`deskripsi` text
,`harga_awal` double(15,2)
,`harga_akhir` double(15,2)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id_penawaran` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `tgl_penawaran` datetime DEFAULT current_timestamp(),
  `harga_penawaran` double(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id_penawaran`, `id_masyarakat`, `id_lelang`, `tgl_penawaran`, `harga_penawaran`) VALUES
(1, 2, 1, '2023-03-11 09:04:21', 2500000.00),
(2, 2, 1, '2023-03-11 09:08:02', 2600000.00),
(6, 3, 2, '2023-03-11 13:59:17', 350000.00),
(7, 4, 2, '2023-03-11 14:01:37', 400000.00);

-- --------------------------------------------------------

--
-- Stand-in structure for view `riwayat_penawaran`
-- (See below for the actual view)
--
CREATE TABLE `riwayat_penawaran` (
`nik` char(16)
,`nama` varchar(100)
,`email` varchar(100)
,`no_hp` varchar(15)
,`nama_barang` varchar(100)
,`harga_awal` double(15,2)
,`harga_penawaran` double(15,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` enum('Admin','Petugas','Masyarakat') NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nip`, `nama`, `password`, `role`, `status`) VALUES
(1, 'cocogoat', '3216561231', 'Azzam', '$2y$10$C2LOHFixfOr4a7yEz.MT8.tRLj5N8IvNKN4VgEnuUVa0eUlTEws5C', 'Admin', 1),
(2, 'dame0', '431431515351', 'Damian Lillard', '$2y$10$HqtNo9ta92VsTNkiMURSlOMtYivCXKwgCI0It/pL1PUFrwqerDLQ2', 'Petugas', 1),
(3, 'sayaaa', '392927938129', 'Bu Kendall', '$2y$10$Q95Za97uMTdPNllUnzdLQeDJ4Fz9RA1aeTSaESaaB7cjvuINQ4ZoC', 'Admin', 1),
(4, 'RakhisYudha ', '354526316', 'Rakhis Yudha', '$2y$10$Bmfy1ce0Ph1y61cX1WA5VudXsLkPZn98pLlM2NCSXl7nXo1K2ObZ6', 'Petugas', 1),
(5, 'saya', '2163125317175', 'Nazwa', '$2y$10$cRXuitkVT/a/iWPJi45zpOsqPD7mmQUm1lST.tdaw0cGGMabKhKnu', 'Petugas', 1);

-- --------------------------------------------------------

--
-- Structure for view `detail_barang`
--
DROP TABLE IF EXISTS `detail_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_barang`  AS SELECT `b`.`id_barang` AS `id_barang`, `b`.`nama_barang` AS `nama_barang`, `b`.`deskripsi` AS `deskripsi`, `b`.`harga_awal` AS `harga_awal`, `g`.`gambar` AS `gambar`, `b`.`status` AS `status` FROM (`barang` `b` left join `gambar` `g` on(`b`.`id_barang` = `g`.`id_barang` and `g`.`utama` = 1)) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_lelang`
--
DROP TABLE IF EXISTS `detail_lelang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_lelang`  AS SELECT `a`.`id_lelang` AS `id_lelang`, `a`.`id_barang` AS `id_barang`, `a`.`tgl_mulai` AS `tgl_mulai`, `a`.`tgl_akhir` AS `tgl_akhir`, `b`.`nama_barang` AS `nama_barang`, `g`.`gambar` AS `gambar`, `b`.`deskripsi` AS `deskripsi`, `a`.`harga_awal` AS `harga_awal`, `a`.`harga_akhir` AS `harga_akhir`, `a`.`status` AS `status`, `a`.`confirm_date` AS `confirm_date`, `a`.`created_by` AS `created_by`, `c`.`nama` AS `penanggungjawab`, `a`.`created_date` AS `created_date`, `a`.`id_masyarakat` AS `id_masyarakat`, `d`.`nama` AS `pemenang`, `d`.`email` AS `email`, `d`.`nik` AS `nik`, `d`.`jk` AS `jk`, `d`.`no_hp` AS `no_hp`, `d`.`alamat` AS `alamat`, CASE WHEN curdate() between `a`.`tgl_mulai` and `a`.`tgl_akhir` THEN '0' ELSE '1' END AS `allow_edit` FROM ((((`lelang` `a` join `barang` `b` on(`a`.`id_barang` = `b`.`id_barang`)) left join `gambar` `g` on(`g`.`id_barang` = `b`.`id_barang` and `g`.`utama` = 1)) join `user` `c` on(`a`.`created_by` = `c`.`id`)) left join `masyarakat` `d` on(`a`.`id_masyarakat` = `d`.`id_masyarakat`)) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_penawaran`
--
DROP TABLE IF EXISTS `detail_penawaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_penawaran`  AS SELECT `a`.`id_penawaran` AS `id_penawaran`, `a`.`id_masyarakat` AS `id_masyarakat`, `m`.`nama` AS `nama_penawar`, `m`.`email` AS `email_penawar`, `m`.`no_hp` AS `no_hp`, `m`.`status` AS `status_penawar`, `b`.`status` AS `status_lelang`, `a`.`id_lelang` AS `id_lelang`, `a`.`tgl_penawaran` AS `tgl_penawaran`, `b`.`id_barang` AS `id_barang`, `c`.`nama_barang` AS `nama_barang`, `c`.`deskripsi` AS `deskripsi`, `d`.`gambar` AS `gambar`, `b`.`harga_awal` AS `harga_awal`, `a`.`harga_penawaran` AS `harga_penawaran` FROM ((((`penawaran` `a` join `lelang` `b` on(`a`.`id_lelang` = `b`.`id_lelang`)) join `barang` `c` on(`b`.`id_barang` = `c`.`id_barang`)) left join `gambar` `d` on(`c`.`id_barang` = `d`.`id_barang` and `d`.`utama` = 1)) join `masyarakat` `m` on(`a`.`id_masyarakat` = `m`.`id_masyarakat`)) ;

-- --------------------------------------------------------

--
-- Structure for view `get_max_penawaran`
--
DROP TABLE IF EXISTS `get_max_penawaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_max_penawaran`  AS SELECT `p`.`id_lelang` AS `id_lelang`, `p`.`id_masyarakat` AS `id_masyarakat`, max(`p`.`harga_penawaran`) AS `harga_penawaran` FROM `penawaran` AS `p` GROUP BY `p`.`id_lelang`, `p`.`id_masyarakat` ORDER BY max(`p`.`harga_penawaran`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `lelang_berlangsung`
--
DROP TABLE IF EXISTS `lelang_berlangsung`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lelang_berlangsung`  AS SELECT `a`.`id_lelang` AS `id_lelang`, `a`.`id_barang` AS `id_barang`, `c`.`nama_barang` AS `nama_barang`, `d`.`gambar` AS `gambar`, `c`.`deskripsi` AS `deskripsi`, `a`.`tgl_mulai` AS `tgl_mulai`, `a`.`tgl_akhir` AS `tgl_akhir`, `a`.`harga_awal` AS `harga_awal`, ifnull(`b`.`total_penawaran`,0) AS `total_penawaran`, ifnull(`b`.`harga_tertinggi`,0) AS `harga_tertinggi` FROM (((`lelang` `a` left join (select `p`.`id_lelang` AS `id_lelang`,max(`p`.`harga_penawaran`) AS `harga_tertinggi`,count(`p`.`id_penawaran`) AS `total_penawaran` from `penawaran` `p` group by `p`.`id_lelang`) `b` on(`a`.`id_lelang` = `b`.`id_lelang`)) join `barang` `c` on(`a`.`id_barang` = `c`.`id_barang`)) left join `gambar` `d` on(`c`.`id_barang` = `d`.`id_barang` and `d`.`utama` = 1)) WHERE `a`.`status` = 'open' AND curdate() between `a`.`tgl_mulai` and `a`.`tgl_akhir` ;

-- --------------------------------------------------------

--
-- Structure for view `pemenang_lelang`
--
DROP TABLE IF EXISTS `pemenang_lelang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemenang_lelang`  AS SELECT `a`.`id_lelang` AS `id_lelang`, `a`.`tgl_mulai` AS `tgl_mulai`, `a`.`tgl_akhir` AS `tgl_akhir`, `a`.`id_masyarakat` AS `id_masyarakat`, `b`.`nama` AS `pemenang`, `b`.`nik` AS `nik`, `b`.`jk` AS `jk`, `b`.`email` AS `email`, `b`.`no_hp` AS `no_hp`, `b`.`alamat` AS `alamat`, `a`.`id_barang` AS `id_barang`, `c`.`nama_barang` AS `nama_barang`, `c`.`deskripsi` AS `deskripsi`, `a`.`harga_awal` AS `harga_awal`, `a`.`harga_akhir` AS `harga_akhir`, CASE WHEN `a`.`status` <> 'confirmed' THEN 'Unconfirmed' ELSE 'Confirmed' END AS `status` FROM ((`lelang` `a` join `masyarakat` `b` on(`a`.`id_masyarakat` = `b`.`id_masyarakat`)) join `barang` `c` on(`a`.`id_barang` = `c`.`id_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `riwayat_penawaran`
--
DROP TABLE IF EXISTS `riwayat_penawaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `riwayat_penawaran`  AS SELECT `a`.`nik` AS `nik`, `a`.`nama` AS `nama`, `a`.`email` AS `email`, `a`.`no_hp` AS `no_hp`, `b`.`nama_barang` AS `nama_barang`, `b`.`harga_awal` AS `harga_awal`, `c`.`harga_penawaran` AS `harga_penawaran` FROM ((`masyarakat` `a` join `barang` `b` on(`a`.`id_masyarakat` = `b`.`id_barang`)) join `penawaran` `c` on(`b`.`id_barang` = `c`.`id_penawaran`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD KEY `update_by` (`update_by`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id_penawaran`),
  ADD KEY `id_masyarakat` (`id_masyarakat`),
  ADD KEY `id_lelang` (`id_lelang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `lelang_ibfk_3` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`);

--
-- Constraints for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`update_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD CONSTRAINT `penawaran_ibfk_1` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`),
  ADD CONSTRAINT `penawaran_ibfk_2` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id_lelang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
