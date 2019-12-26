-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Des 2019 pada 17.09
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

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
-- Struktur dari tabel `detail_diagnosa`
--

CREATE TABLE `detail_diagnosa` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `kd_diagnosa` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_diagnosa`
--

INSERT INTO `detail_diagnosa` (`no`, `no_faktur`, `kd_diagnosa`, `created_at`) VALUES
(102, '191222PJ28-001', 7, '2019-11-01 06:33:50'),
(103, '191223PJ28-001', 6, '2019-12-23 03:46:15'),
(104, '191223PJ28-001', 7, '2019-12-23 03:46:19'),
(105, '191223PJ28-002', 5, '2019-12-23 09:38:21'),
(106, '191226PJ28-001', 6, '2019-12-26 09:06:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keluhan`
--

CREATE TABLE `detail_keluhan` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `keluhan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_keluhan`
--

INSERT INTO `detail_keluhan` (`no`, `no_faktur`, `keluhan`, `created_at`) VALUES
(58, '191222PJ28-001', 'Sakit Kepala', '2019-12-22 06:33:45'),
(59, '191223PJ28-001', 'Demam Tinggi', '2019-12-23 03:46:09'),
(60, '191223PJ28-002', 'Sakit Kepala', '2019-12-23 09:38:21'),
(61, '191226PJ28-001', 'Sakit Kepala', '2019-12-26 09:06:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_lab`
--

CREATE TABLE `detail_lab` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `kd_karyawan` bigint(20) NOT NULL,
  `kd_labor` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `fee_karywan` double NOT NULL,
  `fee_dokter` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_lab`
--

INSERT INTO `detail_lab` (`no`, `no_faktur`, `kd_karyawan`, `kd_labor`, `harga`, `fee_karywan`, `fee_dokter`, `created_at`) VALUES
(57, '191222PJ28-001', 14, 2, 30000, 2000, 10000, '2019-12-22 06:34:29'),
(58, '191223PJ28-001', 14, 6, 27000, 2000, 5000, '2019-12-23 03:46:46'),
(59, '191226PJ28-001', 14, 2, 30000, 2000, 10000, '2019-12-26 09:06:43');

--
-- Trigger `detail_lab`
--
DELIMITER $$
CREATE TRIGGER `afterdetaillab` AFTER INSERT ON `detail_lab` FOR EACH ROW BEGIN
    INSERT into log_gaji_karyawan (kd_karyawan,keterangan,gaji) VALUES (new.kd_karyawan,concat(new.no_faktur," no detail_lab",new.no),new.fee_karywan);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_obat`
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
-- Dumping data untuk tabel `detail_obat`
--

INSERT INTO `detail_obat` (`no`, `no_faktur`, `kd_obat`, `jumlah`, `sub_total`, `created_at`) VALUES
(268, '191222PJ28-001', 32, 2, 1500, '2019-12-22 06:33:53'),
(269, '191223PJ28-001', 32, 5, 3750, '2019-12-23 03:46:33'),
(270, '191223PJ28-002', 32, 1, 750, '2019-12-23 09:38:24'),
(271, '191226PJ28-001', 32, 2, 1500, '2019-12-26 09:06:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tindakan`
--

CREATE TABLE `detail_tindakan` (
  `no` bigint(20) NOT NULL,
  `no_faktur` varchar(220) NOT NULL,
  `kd_tindakan` bigint(20) NOT NULL,
  `kd_karyawan` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `fee_dokter` double NOT NULL,
  `fee_karywan` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_tindakan`
--

INSERT INTO `detail_tindakan` (`no`, `no_faktur`, `kd_tindakan`, `kd_karyawan`, `harga`, `fee_dokter`, `fee_karywan`, `created_at`) VALUES
(79, '191222PJ28-001', 6, 12, 27000, 10000, 2000, '2019-12-22 06:34:22'),
(80, '191223PJ28-001', 5, 12, 40000, 5000, 2000, '2019-12-23 03:46:42'),
(81, '191223PJ28-002', 6, 12, 27000, 10000, 2000, '2019-12-23 09:38:18'),
(82, '191226PJ28-001', 4, 12, 1000000, 5000000, 5000, '2019-12-26 09:06:40');

--
-- Trigger `detail_tindakan`
--
DELIMITER $$
CREATE TRIGGER `afterdetailtindakan` AFTER INSERT ON `detail_tindakan` FOR EACH ROW BEGIN
    INSERT into log_gaji_karyawan (kd_karyawan,keterangan,gaji) VALUES (new.kd_karyawan,concat(new.no_faktur," no detail_tindakan",new.no),new.fee_karywan);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laboratorium`
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
-- Dumping data untuk tabel `laboratorium`
--

INSERT INTO `laboratorium` (`no`, `tindakan`, `fee_dokter`, `fee_karyawan`, `harga`, `deskripsi`) VALUES
(2, 'Check Darah', 10000, 2000, 30000, 'Check darah'),
(6, 'Periksa Gula Darah', 5000, 2000, 27000, 'Check gula darah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_gaji`
--

CREATE TABLE `log_gaji` (
  `id` bigint(20) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `gaji` double NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_gaji`
--

INSERT INTO `log_gaji` (`id`, `kd_dokter`, `gaji`, `keterangan`, `created_at`) VALUES
(1, 30, 500000, 'Absensi', '2019-12-11 05:16:28'),
(2, 28, 500000, 'Absensi', '2019-12-12 11:40:33'),
(3, 28, 500000, 'Absensi', '2019-12-13 17:44:20'),
(4, 28, 500000, 'Absensi', '2019-12-14 01:42:08'),
(5, 28, 500000, 'Absensi', '2019-12-15 01:21:38'),
(6, 28, 500000, 'Absensi', '2019-12-26 09:50:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_gaji_karyawan`
--

CREATE TABLE `log_gaji_karyawan` (
  `id` bigint(20) NOT NULL,
  `kd_karyawan` bigint(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `gaji` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_gaji_karyawan`
--

INSERT INTO `log_gaji_karyawan` (`id`, `kd_karyawan`, `keterangan`, `gaji`, `created_at`) VALUES
(30, 12, '191222PJ28-001 no detail_tindakan79', 2000, '2019-12-22 06:34:22'),
(31, 14, '191222PJ28-001 no detail_lab57', 2000, '2019-12-22 06:34:29'),
(32, 12, '191223PJ28-001 no detail_tindakan80', 2000, '2019-12-23 03:46:42'),
(33, 14, '191223PJ28-001 no detail_lab58', 2000, '2019-12-23 03:46:46'),
(34, 12, '191223PJ28-002 no detail_tindakan81', 2000, '2019-12-23 09:38:18'),
(35, 12, '191226PJ28-001 no detail_tindakan82', 5000, '2019-12-26 09:06:40'),
(36, 14, '191226PJ28-001 no detail_lab59', 2000, '2019-12-26 09:06:43');

--
-- Trigger `log_gaji_karyawan`
--
DELIMITER $$
CREATE TRIGGER `update_gaji_karyawan` AFTER INSERT ON `log_gaji_karyawan` FOR EACH ROW BEGIN
    update tbl_karyawan
    set gaji = gaji+new.gaji
    WHERE
    no =new.kd_karyawan; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_gaji_karyawan_delete` AFTER DELETE ON `log_gaji_karyawan` FOR EACH ROW BEGIN
    update tbl_karyawan
    set gaji = gaji-old.gaji
    WHERE
    no =old.kd_karyawan; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
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
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `nama_ibu`, `nohp`, `created_at`) VALUES
(7, 'Hidayatul Sidiq', 'pria', 'Padang Panjang', '2019-11-06', 'Jalan Padang Panjang no 92', 'Sumatera Barat', 'padang', 'Nanggalo', 'surau gadang', 'Inur', '082169146904', '2019-11-12 04:42:34'),
(8, 'andre', 'pria', 'jakarta', '2019-11-14', 'padang,limau manih', 'sumatera barat', 'padang', 'kec.pauh', 'kel.pauh', 'mirnawati', '081245657856', '2019-11-24 17:13:21'),
(9, 'Inur', 'wanita', 'Padang', '2019-12-05', 'Jalan ', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'dsa', '082169146904', '2019-12-05 01:07:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `kd_absensi` bigint(20) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tarif` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`kd_absensi`, `kd_dokter`, `waktu`, `tarif`) VALUES
(191211, 30, '2019-12-11 05:16:28', 500000),
(191212, 28, '2019-12-12 11:40:33', 500000),
(191213, 28, '2019-12-13 17:44:20', 500000),
(191214, 28, '2019-12-14 01:42:08', 500000),
(191215, 28, '2019-12-15 01:21:38', 500000),
(191226, 28, '2019-12-26 09:50:45', 500000);

--
-- Trigger `tbl_absensi`
--
DELIMITER $$
CREATE TRIGGER `absensigaji` AFTER INSERT ON `tbl_absensi` FOR EACH ROW BEGIN
    update tbl_dokter
    set gaji = gaji+new.tarif
    WHERE
    kd_dokter =new.kd_dokter; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `absensigajidokter` AFTER INSERT ON `tbl_absensi` FOR EACH ROW BEGIN
    INSERT into log_gaji (kd_dokter,gaji,keterangan) VALUES (new.kd_dokter,new.tarif,"Absensi");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `no` bigint(20) NOT NULL,
  `nama_diagnosa` varchar(220) NOT NULL,
  `deskripsi` varchar(220) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_diagnosa`
--

INSERT INTO `tbl_diagnosa` (`no`, `nama_diagnosa`, `deskripsi`, `kd_dokter`, `created_at`) VALUES
(5, 'Asma', 'disebabkan oleh debu', 27, '2019-12-12 11:42:52'),
(6, 'flu', 'harus di jaga makan dan kondisi badan', 27, '2019-12-12 11:42:52'),
(7, 'Demam berdarah', 'demam tinggi', 28, '2019-12-12 11:42:52'),
(8, 'Sakit kaki', 'terkilir', 28, '2019-12-12 11:42:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `kd_dokter` bigint(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gaji` double NOT NULL,
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
  `photo` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`kd_dokter`, `nama`, `gaji`, `jenis_kelamin`, `nohp`, `noizin`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `tampat_lahir`, `tanggal_lahir`, `spesialis`, `email`, `password`, `photo`, `created_at`) VALUES
(27, 'Iqbal', 0, 'pria', '082169146904', '1711082035', 'sdsa', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'Padang', '2019-11-12', 'PM', 'iqbal@gmail.com', '123', 'AdminLTELogo.png', '2019-12-09 12:57:19'),
(28, 'Rizkhan Hadi', 2500000, 'pria', '082169146904', '1711082039', 'jalan taruko no 2', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'Padang', '2019-11-05', 'PJ', 'rizkhanhadi@gmail.com', '123', 'avatar.png', '2019-12-26 09:50:45'),
(30, 'Elang Abdul Azis', 500000, 'pria', '082169146904', '1711082036', 'Jalan Padang 4 no 424 Siteba', 'SUMBAR', 'PADANG', 'NANGGALO', 'SURAU GADANG', 'Padang', '1997-11-04', 'PJ', 'razituli@gmail.com', '123', 'avatar5.png', '2019-12-11 05:16:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `kd_jadwal` bigint(20) NOT NULL,
  `kd_poli` varchar(12) NOT NULL,
  `kd_dokter` bigint(20) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Keterangan` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kd_poli`, `kd_dokter`, `waktu`, `tanggal`, `status`, `Keterangan`, `created_at`) VALUES
(35, 'PJ', 28, '10:09 PM', 'Sunday', 'tersedia', '1 jam sebelum berobat periksa darah', '2019-12-26 15:47:30'),
(36, 'PJ', 30, '10:09 PM', 'Tuesday,Thursday,Saturday', 'tersedia', '1 jam sebelum berobat periksa darah', '2019-12-26 15:53:43'),
(40, 'PM', 27, '9:15 AM', 'Thursday', 'tersedia', 'Check darah 1 jam sebelum berobat', '2019-12-26 14:59:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `no` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(220) NOT NULL,
  `gaji` double NOT NULL,
  `jenis` enum('perawat','labor','kasir','satpam') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`no`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `alamat`, `gaji`, `jenis`, `created_at`) VALUES
(12, 'Widya', 'Wanita', '2019-11-26', '082169146904', 'jalan pasa baru', 11000, 'perawat', '2019-12-26 09:06:40'),
(13, 'Elang Abdul Azis', 'Laki-Laki', '2019-12-22', '082169146904', 'sad', 0, 'satpam', '2019-12-22 06:24:06'),
(14, 'Aidil Putra', 'Laki-Laki', '2019-12-22', '082169146904', 'sad', 6000, 'labor', '2019-12-26 09:06:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
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
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`kd_obat`, `nama_obat`, `miligram`, `jenis_obat`, `unit`, `jumlah_unit`, `jumla_obat_unit`, `total_obat`, `harga_beli`, `harga_modal`, `harga_jual`, `tgl_masuk`, `expired`, `created_at`) VALUES
(32, 'paramex', 50, 'Tablet', 'box', 50, 10, 500, 5000, 500, 750, '2019-11-11', '2020-12-07', '2019-12-05 06:49:25'),
(38, 'Procold', 50, 'Tablet', 'box', 50, 10, 0, 10000, 1000, 1500, '2019-12-01', '2019-12-11', '2019-12-12 13:22:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
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
-- Dumping data untuk tabel `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`no_pendaftaran`, `kd_pasien`, `kd_poli`, `kd_jadwal`, `status`, `created_at`) VALUES
('191222PJ28-001', 7, 'PJ', 35, 1, '2019-12-22 06:34:31'),
('191223PJ28-001', 7, 'PJ', 35, 1, '2019-12-23 03:46:50'),
('191223PJ28-002', 8, 'PJ', 35, 1, '2019-12-23 09:38:29'),
('191226PJ28-001', 7, 'PJ', 35, 1, '2019-12-26 09:06:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_spesialis`
--

CREATE TABLE `tbl_spesialis` (
  `kd_spesialis` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tarif` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_spesialis`
--

INSERT INTO `tbl_spesialis` (`kd_spesialis`, `nama`, `tarif`, `keterangan`) VALUES
('PJ', 'JANTUNG', 500000, 'Dokter yang ahli dibagian penyakit dalam seperti jantung'),
('PM', 'Mata', 30000, 'Dokter yang berkompeten di bidang mata'),
('PS', 'saraf', 500000, 'Dokter yang berkompeten di bidang saraf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tindakan`
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
-- Dumping data untuk tabel `tbl_tindakan`
--

INSERT INTO `tbl_tindakan` (`no`, `tindakan`, `fee_dokter`, `fee_karyawan`, `harga`, `deskripsi`) VALUES
(4, 'operasi', 5000000, 5000, 1000000, 'operasi'),
(5, 'Jahit', 5000, 2000, 40000, 'Jahit'),
(6, 'terapi', 10000, 2000, 27000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
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
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`no_faktur`, `total_harga`, `dibayar`, `kembalian`, `pelayan`, `created_at`) VALUES
('191222PJ28-001', 58500, 60000, 1500, 'Fikri', '2019-12-22 06:35:16'),
('191223PJ28-001', 70750, 71000, 250, 'Fikri', '2019-12-23 09:52:41'),
('191223PJ28-002', 27750, 0, 0, '', '2019-12-23 09:38:29'),
('191226PJ28-001', 1031500, 1032000, 500, 'Fikri', '2019-12-26 09:16:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `level`, `us_active`, `date`) VALUES
(3, 'elang', 'elang_a_a@yahoo.com', 'default.jpg', '$2y$10$7XoHzengVAy7eoM/v01Heuu98A6ESpeVRAGfcq65Z.WqEK38HC2sO', 1, 1, 1574460218),
(4, 'razit', 'razituli@gmail.com', 'default.jpg', '$2y$10$ewgAffxcozWX33JxU83MMuU1zubmWMRFOmnYHmkBphDUaju6ljKyu', 2, 1, 1574463007),
(5, 'andre', 'andre@gmail.com', 'default.jpg', '$2y$10$lwQsCgZZSKzlgDy..0l9hOwFnSPFArlfse.dCWSh17QPW385zrCvW', 3, 1, 1574640731);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `level_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
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
-- Indeks untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `detail_diagnosa_ibfk_2` (`kd_diagnosa`);

--
-- Indeks untuk tabel `detail_keluhan`
--
ALTER TABLE `detail_keluhan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `detail_lab`
--
ALTER TABLE `detail_lab`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kd_karyawan` (`kd_karyawan`),
  ADD KEY `kd_labor` (`kd_labor`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kd_obat` (`kd_obat`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kd_karyawan` (`kd_karyawan`),
  ADD KEY `kd_tindakan` (`kd_tindakan`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_gaji`
--
ALTER TABLE `log_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_gaji_karyawan`
--
ALTER TABLE `log_gaji_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`kd_absensi`,`kd_dokter`),
  ADD KEY `kd_dokter` (`kd_dokter`);

--
-- Indeks untuk tabel `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`kd_dokter`),
  ADD UNIQUE KEY `noizin` (`noizin`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `spesialis` (`spesialis`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD UNIQUE KEY `kd_dokter_2` (`kd_dokter`),
  ADD KEY `kd_poli` (`kd_poli`),
  ADD KEY `kd_dokter` (`kd_dokter`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`,`kd_jadwal`),
  ADD KEY `kd_pasien` (`kd_pasien`),
  ADD KEY `kd_poli` (`kd_poli`),
  ADD KEY `kd_jadwal` (`kd_jadwal`);

--
-- Indeks untuk tabel `tbl_spesialis`
--
ALTER TABLE `tbl_spesialis`
  ADD PRIMARY KEY (`kd_spesialis`);

--
-- Indeks untuk tabel `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `detail_keluhan`
--
ALTER TABLE `detail_keluhan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `detail_lab`
--
ALTER TABLE `detail_lab`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT untuk tabel `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log_gaji`
--
ALTER TABLE `log_gaji`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `log_gaji_karyawan`
--
ALTER TABLE `log_gaji_karyawan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kd_pasien` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `kd_absensi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191227;

--
-- AUTO_INCREMENT untuk tabel `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `kd_dokter` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `kd_jadwal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `kd_obat` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD CONSTRAINT `detail_diagnosa_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`),
  ADD CONSTRAINT `detail_diagnosa_ibfk_2` FOREIGN KEY (`kd_diagnosa`) REFERENCES `tbl_diagnosa` (`no`);

--
-- Ketidakleluasaan untuk tabel `detail_keluhan`
--
ALTER TABLE `detail_keluhan`
  ADD CONSTRAINT `detail_keluhan_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`);

--
-- Ketidakleluasaan untuk tabel `detail_lab`
--
ALTER TABLE `detail_lab`
  ADD CONSTRAINT `detail_lab_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `tbl_karyawan` (`no`),
  ADD CONSTRAINT `detail_lab_ibfk_2` FOREIGN KEY (`kd_labor`) REFERENCES `laboratorium` (`no`),
  ADD CONSTRAINT `detail_lab_ibfk_3` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`);

--
-- Ketidakleluasaan untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD CONSTRAINT `detail_obat_ibfk_1` FOREIGN KEY (`kd_obat`) REFERENCES `tbl_obat` (`kd_obat`),
  ADD CONSTRAINT `detail_obat_ibfk_2` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`);

--
-- Ketidakleluasaan untuk tabel `detail_tindakan`
--
ALTER TABLE `detail_tindakan`
  ADD CONSTRAINT `detail_tindakan_ibfk_2` FOREIGN KEY (`kd_karyawan`) REFERENCES `tbl_karyawan` (`no`),
  ADD CONSTRAINT `detail_tindakan_ibfk_3` FOREIGN KEY (`kd_tindakan`) REFERENCES `tbl_tindakan` (`no`),
  ADD CONSTRAINT `detail_tindakan_ibfk_4` FOREIGN KEY (`no_faktur`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`);

--
-- Ketidakleluasaan untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD CONSTRAINT `tbl_dokter_ibfk_1` FOREIGN KEY (`spesialis`) REFERENCES `tbl_spesialis` (`kd_spesialis`);

--
-- Ketidakleluasaan untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `tbl_jadwal_ibfk_1` FOREIGN KEY (`kd_poli`) REFERENCES `tbl_spesialis` (`kd_spesialis`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_2` FOREIGN KEY (`kd_dokter`) REFERENCES `tbl_dokter` (`kd_dokter`);

--
-- Ketidakleluasaan untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_1` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_2` FOREIGN KEY (`kd_poli`) REFERENCES `tbl_spesialis` (`kd_spesialis`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_3` FOREIGN KEY (`kd_jadwal`) REFERENCES `tbl_jadwal` (`kd_jadwal`);

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
