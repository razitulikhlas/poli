-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 11:34 AM
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
(50, '191115PJ-001', 4, '2019-11-21 07:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lab`
--

CREATE TABLE `detail_lab` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `kd_karyawan` bigint(20) NOT NULL,
  `kd_labor` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat`
--

CREATE TABLE `detail_obat` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `kd_obat` bigint(20) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `sub_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_obat`
--

INSERT INTO `detail_obat` (`no`, `no_faktur`, `kd_obat`, `jumlah`, `sub_total`, `created_at`) VALUES
(204, '191115PJ-001', 32, 10, 7500, '2019-11-21 07:27:23'),
(205, '191115PJ-001', 34, 4, 4800, '2019-11-21 07:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tindakan`
--

CREATE TABLE `detail_tindakan` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `kd_tindakan` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `no` int(11) NOT NULL,
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
(2, 'Check Darah', 10000, 2000, 30000, 'Check gula darah'),
(6, 'Periksa Gula Darah', 5000, 2000, 27000, '');

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
(7, 'Hidayatul Sidiq', 'pria', 'Padang Panjang', '2019-11-06', 'Jalan Padang Panjang no 92', 'Sumatera Barat', 'padang', 'Nanggalo', 'surau gadang', 'Inur', '082169146904', '2019-11-12 04:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medik`
--

CREATE TABLE `rekam_medik` (
  `no_faktur` varchar(220) NOT NULL,
  `kd_pasien` bigint(20) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `keluhan` varchar(220) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medik`
--

INSERT INTO `rekam_medik` (`no_faktur`, `kd_pasien`, `kd_dokter`, `keluhan`, `created_at`) VALUES
('191115PJ-001', 7, 30, 'sakit kepala', '2019-11-21 07:16:27');

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
(191116, 30, '2019-11-16 05:08:41', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `no` int(11) NOT NULL,
  `nama_diagnosa` varchar(220) NOT NULL,
  `deskripsi` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diagnosa`
--

INSERT INTO `tbl_diagnosa` (`no`, `nama_diagnosa`, `deskripsi`) VALUES
(4, 'Demam Berdarah', 'disebabkan oleh nyamuk'),
(5, 'Asma', 'disebabkan oleh debu');

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
(30, 'Razitul Ikhlas', 'pria', '082169146904', '1711082036', 'Jalan Padang 4 no 424 Siteba', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'Padang', '1997-11-04', 'PJ', 'razituli@gmail.com', '123', 'avatar5.png');

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
(29, 'PM', 27, '', '2019-11-16', 'TERSEDIA', 'obat sakit kepala', '2019-11-16 08:30:28'),
(31, 'PJ', 30, '5:00 PM', '2019-11-14', 'TERSEDIA', '', '2019-11-16 08:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `no` int(11) NOT NULL,
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
(32, 'paramex', 50, 'Tablet', 'box', 50, 10, 500, 5000, 500, 750, '2019-11-12', '2019-11-30', '2019-11-19 04:15:59'),
(33, 'Procold', 50, 'Kapsul', 'box', 50, 5, 250, 2500, 500, 750, '2019-11-02', '2019-11-28', '2019-11-20 06:37:40'),
(34, 'obh', 10, 'Tablet', 'box', 10, 5, 50, 2500, 1000, 1200, '2019-11-05', '2019-11-30', '2019-11-20 12:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `no_pendaftaran` varchar(200) NOT NULL,
  `kd_pasien` bigint(20) NOT NULL,
  `kd_poli` varchar(20) NOT NULL,
  `kd_jadwal` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`no_pendaftaran`, `kd_pasien`, `kd_poli`, `kd_jadwal`, `created_at`) VALUES
('191112PJ-001', 7, 'PJ', 25, '2019-11-12 07:12:55'),
('191114PJ-001', 7, 'PJ', 29, '2019-11-14 16:01:20'),
('191114PJ-002', 7, 'PJ', 29, '2019-11-14 16:20:16'),
('191114PJ-003', 7, 'PJ', 29, '2019-11-14 16:20:24'),
('191115PJ-001', 7, 'PJ', 31, '2019-11-15 02:09:01');

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
  `no` int(11) NOT NULL,
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
(2, 'Jahit', 15000, 2000, 30000, 'Jahit'),
(3, 'operasi', 5000, 2000, 40000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `no_faktur` varchar(15) NOT NULL,
  `total_harga` double NOT NULL,
  `dibayar` double NOT NULL,
  `kembalian` double NOT NULL,
  `pelayan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`no_faktur`, `total_harga`, `dibayar`, `kembalian`, `pelayan`) VALUES
('191102-001', 12000, 20000, 8000, 'Razitul Ikhlas'),
('191112-001', 24000, 30000, 6000, 'Razitul Ikhlas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `no` bigint(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_lab`
--
ALTER TABLE `detail_lab`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  ADD PRIMARY KEY (`no`);

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
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indexes for table `rekam_medik`
--
ALTER TABLE `rekam_medik`
  ADD PRIMARY KEY (`no_faktur`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

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
  ADD PRIMARY KEY (`no_pendaftaran`,`kd_pasien`),
  ADD KEY `kd_pasien` (`kd_pasien`);

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
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `detail_lab`
--
ALTER TABLE `detail_lab`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_obat`
--
ALTER TABLE `detail_obat`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kd_pasien` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `kd_absensi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191117;

--
-- AUTO_INCREMENT for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `kd_dokter` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `kd_jadwal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `kd_obat` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `no` bigint(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
