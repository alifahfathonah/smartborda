-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 07:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_donasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `borda`
--

CREATE TABLE `borda` (
  `id_borda` int(11) NOT NULL,
  `point_borda` float DEFAULT NULL,
  `id_sm` int(11) DEFAULT NULL,
  `id_periode` int(6) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borda`
--

INSERT INTO `borda` (`id_borda`, `point_borda`, `id_sm`, `id_periode`, `id_user`, `updated_at`) VALUES
(1, 17.58, 8, 12020, 11, '2020-04-01 12:29:22'),
(3, 9.38, 8, 12020, 13, '2020-04-01 12:23:28'),
(5, NULL, 8, 12020, 14, NULL),
(7, 236.25, 9, 12020, 11, '2020-04-01 12:29:22'),
(8, 347.5, 9, 12020, 13, '2020-04-01 12:23:28'),
(9, NULL, 9, 12020, 14, NULL),
(10, NULL, 10, 12020, 11, NULL),
(11, 41.25, 10, 12020, 13, '2020-04-01 12:23:28'),
(12, NULL, 10, 12020, 14, NULL),
(13, 65.63, 11, 12020, 11, '2020-04-01 12:29:22'),
(14, 113.44, 11, 12020, 13, '2020-04-01 12:23:28'),
(15, NULL, 11, 12020, 14, NULL),
(16, NULL, 12, 22020, 11, '2020-03-31 23:33:49'),
(17, NULL, 12, 22020, 13, '2020-03-31 23:33:49'),
(18, NULL, 12, 22020, 14, '2020-03-31 23:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `m_foto`
--

CREATE TABLE `m_foto` (
  `id_foto` int(11) NOT NULL,
  `foto` text,
  `id_sm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_foto`
--

INSERT INTO `m_foto` (`id_foto`, `foto`, `id_sm`) VALUES
(58, '8--2020-03-26--lake-aurora-3840x2160-4k-hd-wallpaper-florida-night-sky-stars-12771.jpg', 8),
(60, '8--2020-03-26--Ecommerce-CRM-software-archiz-solutions.jpg', 8),
(64, '8--2020-03-26--1102034.jpg', 8),
(65, '8--2020-03-26--1102033.jpg', 8),
(66, '8--2020-03-26--314827.jpg', 8),
(67, '8--2020-03-26--1102013.jpg', 8),
(68, '8--2020-03-26--796857.jpg', 8),
(69, '8--2020-03-26--wp2669031.jpg', 8),
(70, '8--2020-03-26--wp3931529.png', 8),
(71, '9--2020-03-30--lake-aurora-3840x2160-4k-hd-wallpaper-florida-night-sky-stars-12771.jpg', 9),
(72, '9--2020-03-30--software-crm-indonesia-700x525.jpg', 9),
(73, '9--2020-03-30--Ecommerce-CRM-software-archiz-solutions.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `m_kriteria`
--

CREATE TABLE `m_kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `kd_kriteria` varchar(5) DEFAULT NULL,
  `kriteria` varchar(300) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `normalisasi` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kriteria`
--

INSERT INTO `m_kriteria` (`id_kriteria`, `kd_kriteria`, `kriteria`, `bobot`, `normalisasi`) VALUES
(1, 'K1', 'Finansial', 85, 0.265625),
(2, 'K2', 'Keadaan Umum', 80, 0.25),
(3, 'K3', 'Keadaan Fisik', 85, 0.265625),
(4, 'K4', 'Keluarga Pra Sejahtera', 70, 0.21875);

-- --------------------------------------------------------

--
-- Table structure for table `m_pekerjaan`
--

CREATE TABLE `m_pekerjaan` (
  `id_pekerjaan` int(5) NOT NULL,
  `nama_pekerjaan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pekerjaan`
--

INSERT INTO `m_pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Pegawai negeri Sipil (PNS)'),
(2, 'Petani'),
(3, 'TNI/Polisi'),
(4, 'Pensiunan PNS/TNI/POLRI'),
(5, 'Pengusaha'),
(6, 'Seniman'),
(7, 'Artis'),
(8, 'Karyawan Perusahaan Swasta'),
(9, 'Keryawan Perusahaan Pemerintah'),
(10, 'Montir'),
(11, 'Pedagang'),
(12, 'Penjahit'),
(13, 'Sopir'),
(14, 'Swasta'),
(15, 'Serabutan'),
(16, 'Tukang'),
(18, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `m_periode`
--

CREATE TABLE `m_periode` (
  `id_periode` int(6) NOT NULL,
  `bulan` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `status` enum('1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_periode`
--

INSERT INTO `m_periode` (`id_periode`, `bulan`, `tahun`, `status`) VALUES
(12020, '1', 2020, '1'),
(22020, '2', 2020, NULL),
(42020, '4', 2020, NULL),
(62020, '6', 2020, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_sosokmulia`
--

CREATE TABLE `m_sosokmulia` (
  `id_sm` int(11) NOT NULL,
  `nama_sm` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `umur` float DEFAULT NULL,
  `alamat_sm` text,
  `penghasilan` varchar(200) DEFAULT NULL,
  `pengeluaran` varchar(200) DEFAULT NULL,
  `keadaan_kesehatan` varchar(200) DEFAULT NULL,
  `keterangan` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at_borda` datetime DEFAULT NULL,
  `id_pekerjaan` int(5) DEFAULT NULL,
  `id_usertim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_sosokmulia`
--

INSERT INTO `m_sosokmulia` (`id_sm`, `nama_sm`, `jenis_kelamin`, `umur`, `alamat_sm`, `penghasilan`, `pengeluaran`, `keadaan_kesehatan`, `keterangan`, `created_at`, `updated_at_borda`, `id_pekerjaan`, `id_usertim`) VALUES
(8, 'Farhan', 'Wanita', 89, 'as', 'asd', 'xxz', 'asdasdada', 'das', NULL, '2020-03-31 22:51:35', 16, 1),
(9, 'Eldi', 'Pria', 78, 'adasd', '', '', '', '', NULL, '2020-03-31 23:32:41', 1, 13),
(10, 'Sinta', 'Pria', 45, 'dasd', '', '', '', 'asdas', NULL, '2020-03-31 23:22:44', 1, 11),
(11, 'Lusiana', 'Wanita', 45, 'Jln. Skip Ujung Palembang', '', '', '', '', NULL, '2020-04-01 12:11:34', 11, 14),
(12, 'Joko', 'Pria', 57, 'Tanggerang', '', '', '', '', '2020-03-30 06:36:31', NULL, 1, 11),
(13, 'Rendy Insa', 'Pria', 45, 'Purwokerto', '', '', '', '', '2020-04-01 11:33:53', NULL, 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `m_subkriteria`
--

CREATE TABLE `m_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `subkriteria` varchar(200) DEFAULT NULL,
  `nilai` int(1) DEFAULT NULL,
  `id_kriteria` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_subkriteria`
--

INSERT INTO `m_subkriteria` (`id_subkriteria`, `subkriteria`, `nilai`, `id_kriteria`) VALUES
(1, 'Berkecukupan', 2, 1),
(2, 'Cukup', 4, 1),
(3, 'Tidak Cukup', 6, 1),
(4, 'Sangat Tidak Cukup', 12, 1),
(5, 'Layak', 2, 2),
(6, 'Kurang Layak', 4, 2),
(7, 'Tidak Layak', 6, 2),
(8, 'Sangat Tidak Layak', 12, 2),
(9, 'Sehat', 2, 3),
(10, 'Sering Sakit', 4, 3),
(12, 'Memiliki Keterbatasan / Sakit Parah', 12, 3),
(13, 'Renta', 12, 3),
(14, 'Keluarga Sejahtera 3', 2, 4),
(15, 'Keluarga Sejahtera 2', 4, 4),
(16, 'Keluarga Sejahtera 1', 6, 4),
(17, 'Keluarga Pra Sejahtera', 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_sm` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `utility` float DEFAULT NULL,
  `utinor` float DEFAULT NULL,
  `id_kriteria` int(5) DEFAULT NULL,
  `id_periode` int(6) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_sm`, `point`, `utility`, `utinor`, `id_kriteria`, `id_periode`, `updated_at`, `id_user`) VALUES
(1, 8, 6, 25, 6.64062, 1, 12020, '2020-03-31 22:51:35', 11),
(2, 8, 4, 0, 0, 2, 12020, '2020-03-31 22:51:35', 11),
(3, 8, 2, 0, 0, 3, 12020, '2020-03-31 22:51:35', 11),
(4, 8, 4, 50, 10.9375, 4, 12020, '2020-03-31 22:51:35', 11),
(9, 8, 2, 0, 0, 1, 12020, '2020-03-31 22:28:14', 13),
(10, 8, 4, 20, 5, 2, 12020, '2020-03-31 22:28:14', 13),
(11, 8, 2, 0, 0, 3, 12020, '2020-03-31 22:28:14', 13),
(12, 8, 4, 20, 4.375, 4, 12020, '2020-03-31 22:28:14', 13),
(17, 8, NULL, 100, 62.5, 1, 12020, NULL, 14),
(18, 8, NULL, 0, 0, 2, 12020, NULL, 14),
(19, 8, NULL, 0, 0, 3, 12020, NULL, 14),
(20, 8, NULL, 50, 10.9, 4, 12020, NULL, 14),
(25, 9, 12, 100, 26.5625, 1, 12020, '2020-03-31 23:32:41', 11),
(26, 9, 12, 100, 25, 2, 12020, '2020-03-31 23:32:41', 11),
(27, 9, 4, 20, 5.3125, 3, 12020, '2020-03-31 23:32:41', 11),
(28, 9, 6, 100, 21.875, 4, 12020, '2020-03-31 23:32:41', 11),
(29, 9, 12, 100, 26.5625, 1, 12020, '2020-03-31 22:28:31', 13),
(30, 9, 12, 100, 25, 2, 12020, '2020-03-31 22:28:32', 13),
(31, 9, 12, 100, 26.5625, 3, 12020, '2020-03-31 22:28:32', 13),
(32, 9, 6, 40, 8.75, 4, 12020, '2020-03-31 22:28:32', 13),
(33, 9, NULL, 0, 0, 1, 12020, NULL, 14),
(34, 9, NULL, 100, 25, 2, 12020, NULL, 14),
(35, 9, NULL, 100, 26.5, 3, 12020, NULL, 14),
(36, 9, NULL, 0, 0, 4, 12020, NULL, 14),
(37, 10, NULL, 100, 26.5625, 1, 12020, NULL, 11),
(38, 10, NULL, 0, 0, 2, 12020, NULL, 11),
(39, 10, NULL, 100, 26.5625, 3, 12020, NULL, 11),
(40, 10, NULL, 20, 4.375, 4, 12020, NULL, 11),
(41, 10, 4, 20, 5.3125, 1, 12020, '2020-03-31 23:22:44', 13),
(42, 10, 6, 40, 10, 2, 12020, '2020-03-31 23:22:44', 13),
(43, 10, 4, 20, 5.3125, 3, 12020, '2020-03-31 23:22:44', 13),
(44, 10, 2, 0, 0, 4, 12020, '2020-03-31 23:22:44', 13),
(45, 10, NULL, 0, 0, 1, 12020, NULL, 14),
(46, 10, NULL, 0, 0, 2, 12020, NULL, 14),
(47, 10, NULL, 100, 26.5, 3, 12020, NULL, 14),
(48, 10, NULL, 100, 21.8, 4, 12020, NULL, 14),
(49, 11, 4, 0, 0, 1, 12020, '2020-03-31 22:46:28', 11),
(50, 11, 6, 25, 6.25, 2, 12020, '2020-03-31 22:46:28', 11),
(51, 11, 12, 100, 26.5625, 3, 12020, '2020-03-31 22:46:28', 11),
(52, 11, 2, 0, 0, 4, 12020, '2020-03-31 22:46:28', 11),
(53, 11, 6, 40, 10.625, 1, 12020, '2020-04-01 12:11:34', 13),
(54, 11, 2, 0, 0, 2, 12020, '2020-04-01 12:11:34', 13),
(55, 11, 4, 20, 5.3125, 3, 12020, '2020-04-01 12:11:34', 13),
(56, 11, 12, 100, 21.875, 4, 12020, '2020-04-01 12:11:34', 13),
(57, 11, NULL, NULL, NULL, 1, 12020, NULL, 14),
(58, 11, NULL, NULL, NULL, 2, 12020, NULL, 14),
(59, 11, NULL, NULL, NULL, 3, 12020, NULL, 14),
(60, 11, NULL, NULL, NULL, 4, 12020, NULL, 14),
(61, 12, NULL, NULL, NULL, 1, 22020, NULL, 11),
(62, 12, NULL, NULL, NULL, 2, 22020, NULL, 11),
(63, 12, NULL, NULL, NULL, 3, 22020, NULL, 11),
(64, 12, NULL, NULL, NULL, 4, 22020, NULL, 11),
(65, 12, NULL, NULL, NULL, 1, 22020, NULL, 13),
(66, 12, NULL, NULL, NULL, 2, 22020, NULL, 13),
(67, 12, NULL, NULL, NULL, 3, 22020, NULL, 13),
(68, 12, NULL, NULL, NULL, 4, 22020, NULL, 13),
(69, 12, NULL, NULL, NULL, 1, 22020, NULL, 14),
(70, 12, NULL, NULL, NULL, 2, 22020, NULL, 14),
(71, 12, NULL, NULL, NULL, 3, 22020, NULL, 14),
(72, 12, NULL, NULL, NULL, 4, 22020, NULL, 14);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profil` int(3) NOT NULL,
  `nama_depan` varchar(200) DEFAULT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `jk` enum('Pria','Wanita') DEFAULT NULL,
  `alamat` text,
  `tmpt_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `peringatan` int(1) DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profil`, `nama_depan`, `nama_belakang`, `jk`, `alamat`, `tmpt_lahir`, `tgl_lahir`, `kontak`, `foto`, `peringatan`, `id_user`) VALUES
(1, 'Admin', '', 'Pria', 'Palembang', 'Palembang', '1970-01-01', '07118723', 'default.png', NULL, 1),
(13, 'Tim 1', 'ok', 'Pria', 'Palembang no 100', 'Palembang', '1998-03-18', '23424234', 'default.png', 1, 11),
(14, 'Juwita', '', 'Wanita', '', '', '1970-01-01', '', 'default.png', NULL, 12),
(15, 'Tim 3', '', 'Wanita', '', '', '1970-01-01', '', 'default.png', NULL, 14),
(16, 'Tim 2', 'okk', 'Pria', '', '', '1970-01-01', '', 'default.png', NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` enum('admin','tim','kepala') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `login_at` datetime DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `level`, `created_at`, `login_at`, `aktif`) VALUES
(1, 'admin', NULL, '$2y$10$kRlofuRmgeM58XhTDc.vR.3SqV6Q8W/eSD8g20dBsHPA4xTOpV/IW', 'admin', '2018-07-02 09:18:41', '2020-04-01 12:30:00', 'Y'),
(11, 'tim1', 'tim1@gmail.com', '$2y$10$7O3y/JtxvkVjGENcA0B8YOafcGvnt0H04qELoltDUcho9YAV9r1.i', 'tim', '2019-02-09 00:31:18', '2020-04-01 12:29:09', 'Y'),
(12, 'kepala', 'kepala@gmail.com', '$2y$10$jAbd7Xx4BElDM476OQXXneNySqTBWaXX0YWOz4C8iAf.OJCTZKIoy', 'kepala', '2020-04-01 11:11:32', '2020-04-01 12:27:48', 'Y'),
(13, 'tim2', NULL, '$2y$10$YkHYC./FoEcQFjRiCgbJvuDPBt6K.RgBnGuFm/saeAd99QQpWkJZ2', 'tim', '2020-04-01 09:57:08', '2020-04-01 11:31:19', 'Y'),
(14, 'tim3', NULL, '$2y$10$M8pI80b1Kym.gB7S3DxtAu1BpmuwoJVc.hrHbs1idePyiTKxpc63e', 'tim', '2019-02-09 00:31:18', '2020-04-01 12:28:47', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borda`
--
ALTER TABLE `borda`
  ADD PRIMARY KEY (`id_borda`),
  ADD KEY `id_sm` (`id_sm`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `m_foto`
--
ALTER TABLE `m_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_sm` (`id_sm`);

--
-- Indexes for table `m_kriteria`
--
ALTER TABLE `m_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `m_pekerjaan`
--
ALTER TABLE `m_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `m_periode`
--
ALTER TABLE `m_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `m_sosokmulia`
--
ALTER TABLE `m_sosokmulia`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`),
  ADD KEY `id_usertim` (`id_usertim`);

--
-- Indexes for table `m_subkriteria`
--
ALTER TABLE `m_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_sm` (`id_sm`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `profil_ibfk_1` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borda`
--
ALTER TABLE `borda`
  MODIFY `id_borda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `m_foto`
--
ALTER TABLE `m_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `m_kriteria`
--
ALTER TABLE `m_kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_pekerjaan`
--
ALTER TABLE `m_pekerjaan`
  MODIFY `id_pekerjaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `m_sosokmulia`
--
ALTER TABLE `m_sosokmulia`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_subkriteria`
--
ALTER TABLE `m_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profil` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borda`
--
ALTER TABLE `borda`
  ADD CONSTRAINT `borda_ibfk_1` FOREIGN KEY (`id_sm`) REFERENCES `m_sosokmulia` (`id_sm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borda_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borda_ibfk_3` FOREIGN KEY (`id_periode`) REFERENCES `m_periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_sosokmulia`
--
ALTER TABLE `m_sosokmulia`
  ADD CONSTRAINT `m_sosokmulia_ibfk_1` FOREIGN KEY (`id_pekerjaan`) REFERENCES `m_pekerjaan` (`id_pekerjaan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `m_sosokmulia_ibfk_2` FOREIGN KEY (`id_usertim`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `m_subkriteria`
--
ALTER TABLE `m_subkriteria`
  ADD CONSTRAINT `m_subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `m_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `m_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `m_periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_sm`) REFERENCES `m_sosokmulia` (`id_sm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
