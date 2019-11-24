-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2019 at 12:47 PM
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
-- Table structure for table `detail_poli`
--

CREATE TABLE `detail_poli` (
  `no` int(11) NOT NULL,
  `kd_poli` int(11) NOT NULL,
  `kd_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE `detail_resep` (
  `no` int(11) NOT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `kd_obat` varchar(15) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`no`, `no_faktur`, `kd_obat`, `harga`, `jumlah`, `sub_total`) VALUES
(90, '191102-001', '24', 1000, 12, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_dokter`
--

CREATE TABLE `gaji_dokter` (
  `id` int(11) NOT NULL,
  `kd_dokter` varchar(30) NOT NULL,
  `pendapatan` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_poli`
--

CREATE TABLE `jenis_poli` (
  `kd_poli` int(11) NOT NULL,
  `nama_poli` varchar(30) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kd_pasien` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `nama_ibu`, `nohp`) VALUES
(7, 'Hidayatul Sidiq', 'pria', 'Padang Panjang', '2019-11-06', 'Jalan Padang Panjang no 92', 'Sumatera Barat', 'padang', 'Nanggalo', 'surau gadang', 'Inur', '082169146904');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `kd_absensi` int(11) NOT NULL,
  `kd_dokter` varchar(15) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tarif` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `kd_dokter` int(11) NOT NULL,
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
(25, 'RAZITUL IKHLAS', 'pria', '082169146904', '1711082035', 'Jalan Padang 4 no 424 siteba', 'Sumatera Barat', 'padang', 'nanggalo', 'surau gadang', 'Padang', '1997-11-04', 'PA', 'razituli@gmail.com', '123', 'user8-128x128.jpg'),
(26, 'Elang', 'pria', '082169146904', '1711082029', 'ad', 'sumbar', 'padang', 'nangga', 'surau gadang', 'Padang', '2019-11-08', 'PA', 'razituli@gmail.com', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `no` int(11) NOT NULL,
  `kd_dokter` varchar(15) NOT NULL,
  `kd_spesialis` varchar(15) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `tarif` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kd_jadwal` int(11) NOT NULL,
  `kd_poli` varchar(12) NOT NULL,
  `kd_dokter` varchar(15) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kd_poli`, `kd_dokter`, `waktu`, `tanggal`, `status`, `Keterangan`) VALUES
(18, 'PA', '25', '10:09 PM', '11/02/2019', 'tersedia', 'Satu jam sebelum berobat ambil darah'),
(20, 'PA', '26', '6:29 PM', '11/02/2019', 'tersedia', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `kd_obat` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `tgl_masuk` varchar(20) NOT NULL,
  `expired` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`kd_obat`, `nama_obat`, `jenis_obat`, `tgl_masuk`, `expired`, `keterangan`, `harga`) VALUES
(24, 'Paramex', 'Pil', '2019-11-01', '2019-11-14', 'Obat Anak', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `no_pendaftaran` varchar(200) NOT NULL,
  `kd_pasien` varchar(15) NOT NULL,
  `kd_poli` varchar(12) NOT NULL,
  `kd_jadwal` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nama_pelayan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`no_pendaftaran`, `kd_pasien`, `kd_poli`, `kd_jadwal`, `keterangan`, `nama_pelayan`) VALUES
('191102PA-001', '7', 'PA', 18, 'Satu jam sebelum berobat ambil darah', ''),
('191102PA-002', '7', 'PA', 18, 'Satu jam sebelum berobat ambil darah', ''),
('191102PA-003', '7', 'PA', 20, '', ''),
('191102PM-001', '7', 'PM', 19, 'CHECK DARAH 1 JAM SEBELUM BEROBAT', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poli`
--

CREATE TABLE `tbl_poli` (
  `id` int(11) NOT NULL,
  `kd_poli` int(11) NOT NULL,
  `kd_dokter` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resep`
--

CREATE TABLE `tbl_resep` (
  `no_faktur` varchar(15) NOT NULL,
  `kd_pasien` varchar(15) NOT NULL,
  `kd_dokter` varchar(15) NOT NULL,
  `total_harga` double NOT NULL,
  `dibayar` double NOT NULL,
  `kembalian` double NOT NULL,
  `pelayan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resep`
--

INSERT INTO `tbl_resep` (`no_faktur`, `kd_pasien`, `kd_dokter`, `total_harga`, `dibayar`, `kembalian`, `pelayan`) VALUES
('191102-001', '7', '25', 12000, 20000, 8000, 'Razitul Ikhlas');

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
('PA', 'Anak', 100000, 'Dokter yang ahli di bidang anak\n'),
('PM', 'Mata', 30000, '! jam sebelum berobat chek darah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_poli`
--
ALTER TABLE `detail_poli`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `gaji_dokter`
--
ALTER TABLE `gaji_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_poli`
--
ALTER TABLE `jenis_poli`
  ADD PRIMARY KEY (`kd_poli`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`kd_absensi`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`kd_dokter`);

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
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `kd_pasien` (`kd_pasien`);

--
-- Indexes for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `tbl_spesialis`
--
ALTER TABLE `tbl_spesialis`
  ADD PRIMARY KEY (`kd_spesialis`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_poli`
--
ALTER TABLE `detail_poli`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `jenis_poli`
--
ALTER TABLE `jenis_poli`
  MODIFY `kd_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kd_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `kd_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `kd_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `kd_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `kd_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
