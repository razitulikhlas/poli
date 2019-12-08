-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 02:39 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_diagnosa`
--

CREATE TABLE `detail_diagnosa` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `kd_diagnosa` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_diagnosa`
--

INSERT INTO `detail_diagnosa` (`no`, `no_faktur`, `kd_diagnosa`, `created_at`) VALUES
(85, '191205PJ28-001', 6, '2019-12-05 16:26:52'),
(86, '191205PJ28-001', 7, '2019-12-05 16:26:56'),
(87, '191206PJ28-001', 6, '2019-12-06 02:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `detail_keluhan`
--

CREATE TABLE `detail_keluhan` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `keluhan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_keluhan`
--

INSERT INTO `detail_keluhan` (`no`, `no_faktur`, `keluhan`, `created_at`) VALUES
(36, '191205PJ28-001', 'sakit kepala', '2019-12-05 16:26:40'),
(37, '191205PJ28-001', 'Sakit Perut', '2019-12-05 16:26:48'),
(38, '191206PJ28-001', 'sakit kepala', '2019-12-06 02:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lab`
--

CREATE TABLE `detail_lab` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `kd_karyawan` bigint(20) NOT NULL,
  `kd_labor` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_lab`
--

INSERT INTO `detail_lab` (`no`, `no_faktur`, `kd_karyawan`, `kd_labor`, `harga`, `created_at`) VALUES
(25, '191205PJ28-001', 12, 2, 30000, '2019-12-05 16:27:17'),
(26, '191205PJ28-001', 12, 6, 27000, '2019-12-05 16:27:21'),
(27, '191206PJ28-001', 12, 2, 30000, '2019-12-06 02:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat`
--

CREATE TABLE `detail_obat` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(200) NOT NULL,
  `kd_obat` bigint(20) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `sub_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_obat`
--

INSERT INTO `detail_obat` (`no`, `no_faktur`, `kd_obat`, `jumlah`, `sub_total`, `created_at`) VALUES
(254, '191205PJ28-001', 32, 2, 1500, '2019-12-05 16:26:59'),
(255, '191205PJ28-001', 38, 2, 3000, '2019-12-05 16:27:05'),
(256, '191206PJ28-001', 32, 5, 3750, '2019-12-06 02:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tindakan`
--

CREATE TABLE `detail_tindakan` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `kd_tindakan` bigint(20) NOT NULL,
  `kd_karyawan` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tindakan`
--

INSERT INTO `detail_tindakan` (`no`, `no_faktur`, `kd_tindakan`, `kd_karyawan`, `harga`, `created_at`) VALUES
(52, '191205PJ28-001', 5, 12, 40000, '2019-12-05 16:27:11'),
(53, '191205PJ28-001', 4, 12, 1000000, '2019-12-05 16:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_dokter`
--

CREATE TABLE `gaji_dokter` (
  `id` bigint(20) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `pendapatan` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `no` bigint(20) NOT NULL,
  `tindakan` varchar(220) NOT NULL,
  `fee_dokter` double NOT NULL,
  `fee_karyawan` double NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`no`, `tindakan`, `fee_dokter`, `fee_karyawan`, `harga`, `deskripsi`) VALUES
(2, 'Check Darah', 10000, 2000, 30000, 'Check darah'),
(6, 'Periksa Gula Darah', 5000, 2000, 27000, 'Check gula darah');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'anggota');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kd_pasien` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `nama_ibu`, `nohp`, `created_at`) VALUES
(7, 'Hidayatul Sidiq', 'pria', 'Padang Panjang', '2019-11-06', 'Jalan Padang Panjang no 92', 'Sumatera Barat', 'padang', 'Nanggalo', 'surau gadang', 'Inur', '082169146904', '2019-11-12 04:42:34'),
(8, 'andre', 'pria', 'jakarta', '2019-11-14', 'padang,limau manih', 'sumatera barat', 'padang', 'kec.pauh', 'kel.pauh', 'mirnawati', '081245657856', '2019-11-24 17:13:21'),
(9, 'Inur', 'wanita', 'Padang', '2019-12-05', 'Jalan ', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'dsa', '082169146904', '2019-12-05 01:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `kd_absensi` bigint(20) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tarif` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`kd_absensi`, `kd_dokter`, `waktu`, `tarif`) VALUES
(191112, 26, '2019-11-12 04:44:29', 100000),
(191112, 27, '2019-11-12 09:51:03', 30000),
(191112, 30, '2019-11-12 07:21:45', 500000),
(191113, 27, '2019-11-13 10:40:22', 30000),
(191115, 30, '2019-11-15 02:13:06', 500000),
(191116, 30, '2019-11-16 05:08:41', 500000),
(191124, 30, '2019-11-24 00:16:41', 500000),
(191129, 30, '2019-11-29 02:12:34', 500000),
(191205, 30, '2019-12-05 15:29:56', 500000),
(191206, 30, '2019-12-06 02:20:45', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `no` bigint(20) NOT NULL,
  `nama_diagnosa` varchar(220) NOT NULL,
  `deskripsi` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diagnosa`
--

INSERT INTO `tbl_diagnosa` (`no`, `nama_diagnosa`, `deskripsi`) VALUES
(5, 'Asma', 'disebabkan oleh debu'),
(6, 'flu', 'harus di jaga makan dan kondisi badan'),
(7, 'Demam berdarah', 'demam tinggi'),
(8, 'Sakit kaki', 'terkilir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `kd_dokter` bigint(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `noizin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `tampat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `spesialis` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `photo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`kd_dokter`, `nama`, `jenis_kelamin`, `nohp`, `noizin`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `tampat_lahir`, `tanggal_lahir`, `spesialis`, `email`, `password`, `photo`) VALUES
(27, 'Iqbal', 'pria', '082169146904', '1711082035', 'sdsa', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'Padang', '2019-11-12', 'PM', 'iqbal@gmail.com', '123', 'AdminLTELogo.png'),
(28, 'Rizkhan Hadi', 'pria', '082169146904', '1711082039', 'jalan taruko no 2', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'Padang', '2019-11-05', 'PJ', 'rizkhanhadi@gmail.com', '123', 'avatar.png'),
(30, 'Elang Abdul Azis', 'pria', '082169146904', '1711082036', 'Jalan Padang 4 no 424 Siteba', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'Padang', '1997-11-04', 'PJ', 'razituli@gmail.com', '123', 'avatar5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `no` bigint(20) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `kd_spesialis` varchar(15) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `tarif` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kd_jadwal` bigint(20) NOT NULL,
  `kd_poli` varchar(12) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `Keterangan` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kd_poli`, `kd_dokter`, `waktu`, `tanggal`, `status`, `Keterangan`, `created_at`) VALUES
(33, 'PJ', 28, '3:24 PM', '2019-12-06', 'TERSEDIA', '1 jam sebelum berobat check darah', '2019-12-06 01:43:21'),
(34, 'PM', 27, '9:30 PM', '2019-12-06', 'TERSEDIA', '1 jam sebelum berobat check darah', '2019-12-06 02:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `no` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`no`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `alamat`) VALUES
(12, 'Widya', 'Wanita', '2019-11-26', '082169146904', 'jalan pasa baru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `kd_obat` bigint(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `miligram` int(11) NOT NULL,
  `jenis_obat` enum('Tablet','Kapsul','Salep','Cair') NOT NULL,
  `unit` enum('box','botol') NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `jumla_obat_unit` int(11) NOT NULL,
  `total_obat` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_modal` double NOT NULL,
  `harga_jual` double NOT NULL,
  `tgl_masuk` date NOT NULL,
  `expired` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`kd_obat`, `nama_obat`, `miligram`, `jenis_obat`, `unit`, `jumlah_unit`, `jumla_obat_unit`, `total_obat`, `harga_beli`, `harga_modal`, `harga_jual`, `tgl_masuk`, `expired`, `created_at`) VALUES
(32, 'paramex', 50, 'Tablet', 'box', 50, 10, 500, 5000, 500, 750, '2019-11-11', '2020-12-07', '2019-12-05 06:49:25'),
(38, 'Procold', 50, 'Tablet', 'box', 50, 10, 0, 10000, 1000, 1500, '2019-12-01', '2019-12-05', '2019-12-06 01:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `no_pendaftaran` varchar(200) NOT NULL,
  `kd_pasien` bigint(20) NOT NULL,
  `kd_poli` varchar(20) NOT NULL,
  `kd_jadwal` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`no_pendaftaran`, `kd_pasien`, `kd_poli`, `kd_jadwal`, `status`, `created_at`) VALUES
('191205PJ28-001', 7, 'PJ', 33, 1, '2019-12-05 16:27:23'),
('191206PJ28-001', 7, 'PJ', 33, 1, '2019-12-06 02:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spesialis`
--

CREATE TABLE `tbl_spesialis` (
  `kd_spesialis` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tarif` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spesialis`
--

INSERT INTO `tbl_spesialis` (`kd_spesialis`, `nama`, `tarif`, `keterangan`) VALUES
('PJ', 'JANTUNG', 500000, 'Dokter yang ahli dibagian penyakit dalam seperti jantung'),
('PK', 'Kaki', 500000, ''),
('PM', 'Mata', 30000, '! jam sebelum berobat chek darah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tindakan`
--

CREATE TABLE `tbl_tindakan` (
  `no` bigint(20) NOT NULL,
  `tindakan` varchar(220) NOT NULL,
  `fee_dokter` double NOT NULL,
  `fee_karyawan` double NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tindakan`
--

INSERT INTO `tbl_tindakan` (`no`, `tindakan`, `fee_dokter`, `fee_karyawan`, `harga`, `deskripsi`) VALUES
(4, 'operasi', 5000000, 5000, 1000000, 'operasi'),
(5, 'Jahit', 5000, 2000, 40000, 'Jahit'),
(6, 'terapi', 10000, 2000, 27000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `no_faktur` varchar(15) NOT NULL,
  `total_harga` double NOT NULL,
  `dibayar` double NOT NULL,
  `kembalian` double NOT NULL,
  `pelayan` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`no_faktur`, `total_harga`, `dibayar`, `kembalian`, `pelayan`, `created_at`) VALUES
('191205PJ28-001', 1101500, 1120000, 18500, 'Fikri', '2019-12-06 01:40:06'),
('191206PJ28-001', 33750, 35000, 1250, 'Fikri', '2019-12-06 02:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` int(11) NOT NULL,
  `us_active` int(1) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `level`, `us_active`, `date`) VALUES
(3, 'elang', 'elang_a_a@yahoo.com', 'default.jpg', '$2y$10$7XoHzengVAy7eoM/v01Heuu98A6ESpeVRAGfcq65Z.WqEK38HC2sO', 1, 1, 1574460218),
(4, 'razit', 'razituli@gmail.com', 'default.jpg', '$2y$10$ewgAffxcozWX33JxU83MMuU1zubmWMRFOmnYHmkBphDUaju6ljKyu', 2, 1, 1574463007),
(5, 'andre', 'andre@gmail.com', 'default.jpg', '$2y$10$lwQsCgZZSKzlgDy..0l9hOwFnSPFArlfse.dCWSh17QPW385zrCvW', 3, 1, 1574640731);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `level_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(123) NOT NULL,
  `url` varchar(123) NOT NULL,
  `icon` varchar(123) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Admin', 'admin', 'nav-icon fas fa-fw fa-user text-info', 1),
(2, 1, 'menu management', 'menu', 'fas fa-fw fa-file-medical-alt', 1),
(3, 1, 'subMenu Management', 'menu/submenu', 'fas fa-fw fa-file-medical-alt', 1),
(5, 3, 'diagnosa', 'diagnosa', 'fas fa-fw fa-procedures', 1),
(6, 3, 'profile', 'profile', 'fad fa-fw fa-file-user', 1),
(7, 2, 'pasien', 'pasien', 'fas fa-user-injured', 1),
(8, 2, 'jadwaldokter', 'jadwal\r\n', 'fad fa-file-user', 1),
(9, 2, 'obat', 'obat', 'fad fa-clinic-medical', 1),
(10, 2, 'daftarberobat', 'pendaftaran\r\n', 'fas fa-hospital-symbol', 1),
(11, 2, 'spesialis', 'spesialis', 'fas fa-ambulance', 1),
(12, 2, 'tindakan', 'tindakan', 'fas fa-stethoscope', 1),
(13, 2, 'lab', 'labor', 'fad fa-procedures', 1),
(15, 3, 'karyawan', 'karyawan', 'fas fa-hospital-user', 1),
(20, 1, 'dokter', 'dokter', 'fab fa-fw fa-youtube', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `detail_diagnosa_ibfk_2` (`kd_diagnosa`);

--
-- Indexes for table `detail_keluhan`
--
ALTER TABLE `detail_keluhan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `detail_lab`
--
ALTER TABLE `detail_lab`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kd_karyawan` (`kd_karyawan`),
  ADD KEY `kd_labor` (`kd_labor`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kd_obat` (`kd_obat`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kd_karyawan` (`kd_karyawan`),
  ADD KEY `kd_tindakan` (`kd_tindakan`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `gaji_dokter`
--
ALTER TABLE `gaji_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`kd_absensi`,`kd_dokter`),
  ADD KEY `kd_dokter` (`kd_dokter`);

--
-- Indexes for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`kd_dokter`),
  ADD UNIQUE KEY `noizin` (`noizin`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `spesialis` (`spesialis`);

--
-- Indexes for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_poli` (`kd_poli`),
  ADD KEY `kd_dokter` (`kd_dokter`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`,`kd_jadwal`),
  ADD KEY `kd_pasien` (`kd_pasien`),
  ADD KEY `kd_poli` (`kd_poli`),
  ADD KEY `kd_jadwal` (`kd_jadwal`);

--
-- Indexes for table `tbl_spesialis`
--
ALTER TABLE `tbl_spesialis`
  ADD PRIMARY KEY (`kd_spesialis`);

--
-- Indexes for table `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `detail_keluhan`
--
ALTER TABLE `detail_keluhan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `detail_lab`
--
ALTER TABLE `detail_lab`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `detail_obat`
--
ALTER TABLE `detail_obat`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kd_pasien` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `kd_absensi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191207;

--
-- AUTO_INCREMENT for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `kd_dokter` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `kd_jadwal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `kd_obat` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD CONSTRAINT `detail_diagnosa_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`),
  ADD CONSTRAINT `detail_diagnosa_ibfk_2` FOREIGN KEY (`kd_diagnosa`) REFERENCES `tbl_diagnosa` (`no`);

--
-- Constraints for table `detail_keluhan`
--
ALTER TABLE `detail_keluhan`
  ADD CONSTRAINT `detail_keluhan_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`);

--
-- Constraints for table `detail_lab`
--
ALTER TABLE `detail_lab`
  ADD CONSTRAINT `detail_lab_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `tbl_karyawan` (`no`),
  ADD CONSTRAINT `detail_lab_ibfk_2` FOREIGN KEY (`kd_labor`) REFERENCES `laboratorium` (`no`),
  ADD CONSTRAINT `detail_lab_ibfk_3` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`);

--
-- Constraints for table `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD CONSTRAINT `detail_obat_ibfk_1` FOREIGN KEY (`kd_obat`) REFERENCES `tbl_obat` (`kd_obat`),
  ADD CONSTRAINT `detail_obat_ibfk_2` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`);

--
-- Constraints for table `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  ADD CONSTRAINT `detail_tindakan_ibfk_2` FOREIGN KEY (`kd_karyawan`) REFERENCES `tbl_karyawan` (`no`),
  ADD CONSTRAINT `detail_tindakan_ibfk_3` FOREIGN KEY (`kd_tindakan`) REFERENCES `tbl_tindakan` (`no`),
  ADD CONSTRAINT `detail_tindakan_ibfk_4` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`);

--
-- Constraints for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD CONSTRAINT `tbl_dokter_ibfk_1` FOREIGN KEY (`spesialis`) REFERENCES `tbl_spesialis` (`kd_spesialis`);

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `tbl_jadwal_ibfk_1` FOREIGN KEY (`kd_poli`) REFERENCES `tbl_spesialis` (`kd_spesialis`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_2` FOREIGN KEY (`kd_dokter`) REFERENCES `tbl_dokter` (`kd_dokter`);

--
-- Constraints for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_1` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_2` FOREIGN KEY (`kd_poli`) REFERENCES `tbl_spesialis` (`kd_spesialis`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_3` FOREIGN KEY (`kd_jadwal`) REFERENCES `tbl_jadwal` (`kd_jadwal`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
