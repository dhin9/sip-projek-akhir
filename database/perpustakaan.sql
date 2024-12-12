-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 01:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `kode_anggota` char(10) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'foto_default.png',
  `no_telp` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `kode_anggota`, `nama_anggota`, `foto`, `no_telp`, `email`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`) VALUES
(1, 'A001', 'Farhan', 'foto_default.png', '081234567821', 'farhan@gmail.com', 'Amaci', 1, 'Miran', '2002-08-15'),
(2, 'A002', 'Syaiful', 'foto_default.png', '081234545821', 'syaiful@gmail.com', 'Liang', 1, 'Liang', '1999-10-21'),
(3, 'A003', 'Syarifuddin', 'foto_default.png', '082120786830', 'syarifuddin@gmail.com', 'Tulehu', 1, 'Negeri Lima', '2002-04-30'),
(4, 'A004', 'Hadi', 'foto_default.png', '082230786830', 'hadi@gmail.com', 'Ureng', 1, 'Ureng', '2015-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `aturan_perpustakaan`
--

CREATE TABLE `aturan_perpustakaan` (
  `id` int(11) NOT NULL,
  `waktu_peminjaman` int(11) NOT NULL,
  `maksimal_peminjaman` int(11) NOT NULL,
  `denda_keterlambatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aturan_perpustakaan`
--

INSERT INTO `aturan_perpustakaan` (`id`, `waktu_peminjaman`, `maksimal_peminjaman`, `denda_keterlambatan`) VALUES
(1, 3, 3, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `kode_peminjaman` varchar(20) NOT NULL,
  `kode_pustaka` varchar(20) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` int(11) NOT NULL,
  `jenis_denda` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `kode_peminjaman`, `kode_pustaka`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `jenis_denda`, `denda`) VALUES
(1, '00001', 'P0002', '2024-07-30', '2024-08-01', 2, 0, 0),
(2, '00002', 'P0003', '2024-07-30', '2024-08-01', 2, 0, 0),
(3, '00003', 'P0001', '2024-07-30', '2024-07-31', 2, 0, 0),
(4, '00004', 'P0002', '0000-00-00', '0000-00-00', 3, 0, 0),
(5, '00005', 'P0003', '0000-00-00', '0000-00-00', 3, 0, 0),
(6, '00006', 'P0003', '2024-07-31', '2024-08-01', 2, 0, 0),
(7, '00007', 'P0002', '0000-00-00', '0000-00-00', 3, 0, 0),
(8, '00007', 'P0001', '2024-07-31', '2024-08-01', 2, 2, 25000),
(9, '00008', 'P0002', '2024-08-01', '2024-08-06', 2, 1, 10000),
(10, '00009', 'P0003', '2024-08-01', '2024-08-04', 2, 0, 0),
(11, '00010', 'P0002', '2024-08-01', '2024-08-03', 2, 0, 0),
(12, '00011', 'P0001', '2024-08-02', '2024-08-06', 2, 1, 5000),
(13, '00012', 'P0001', '2024-08-03', '2024-08-06', 2, 0, 0),
(14, '00013', 'P0001', '2024-08-05', '2024-08-08', 2, 0, 0),
(15, '00013', 'P0002', '2024-08-05', '2024-08-08', 2, 0, 0),
(16, '00013', 'P0003', '2024-08-05', '2024-08-06', 2, 0, 0),
(17, '00014', 'P0002', '2024-08-06', '2024-08-08', 2, 0, 0),
(18, '00015', 'P0002', '2024-08-08', '2024-08-12', 2, 1, 5000),
(19, '00016', 'P0002', '2024-08-08', '2024-08-09', 2, 0, 0),
(20, '00017', 'P0002', '2024-08-09', '2024-08-10', 2, 0, 0),
(21, '00018', 'P0003', '2024-08-10', '2024-08-12', 2, 0, 0),
(22, '00019', 'P0002', '2024-08-10', '2024-08-11', 2, 0, 0),
(23, '00020', 'P0004', '2024-08-12', '2024-08-12', 2, 0, 0),
(24, '00021', 'P0002', '2024-08-12', '2024-08-12', 2, 2, 20000),
(25, '00022', 'P0001', '0000-00-00', '0000-00-00', 3, 0, 0),
(26, '00023', 'P0003', '2024-08-12', '2024-08-12', 2, 0, 0),
(27, '00024', 'P0005', '2024-08-13', '2024-08-14', 2, 0, 0),
(28, '00026', 'P0005', '2024-08-14', '2024-08-16', 2, 0, 0),
(29, '00027', 'P0005', '2024-08-14', '2024-08-15', 2, 0, 0),
(30, '00028', 'P0003', '2024-08-14', '2024-08-16', 2, 0, 0),
(32, '00028', 'P0001', '2024-08-14', '2024-08-16', 2, 0, 0),
(33, '00031', 'P0002', '2024-08-16', '2024-08-18', 2, 2, 10000),
(34, '00032', 'P0005', '2024-08-17', '2024-08-18', 2, 0, 0),
(35, '00033', 'P0002', '2024-08-18', '2024-08-20', 2, 0, 0),
(36, '00034', 'P0003', '2024-08-19', '2024-08-20', 2, 0, 0),
(37, '00035', 'P0001', '2024-08-19', '2024-08-20', 2, 0, 0),
(38, '00036', 'P0003', '2024-08-19', '2024-08-22', 2, 0, 0),
(39, '00037', 'P0004', '2024-08-20', '2024-08-22', 2, 0, 0),
(40, '00038', 'P0005', '2024-08-21', '2024-08-24', 2, 0, 0),
(41, '00040', 'P0003', '2024-08-21', '2024-08-24', 2, 0, 0),
(42, '00041', 'P0002', '2024-08-22', '2024-08-24', 2, 0, 0),
(43, '00042', 'P0005', '2024-08-23', '2024-08-25', 2, 0, 0),
(44, '00043', 'P0005', '2024-08-23', '2024-08-26', 2, 0, 0),
(45, '00044', 'P0002', '2024-08-24', '2024-08-26', 2, 0, 0),
(46, '00045', 'P0003', '0000-00-00', '0000-00-00', 3, 0, 0),
(47, '00046', 'P0002', '2024-08-25', '2024-08-26', 2, 0, 0),
(48, '00047', 'P0004', '2024-08-25', '2024-08-28', 2, 0, 0),
(49, '00048', 'P0001', '2024-08-26', '2024-08-28', 2, 0, 0),
(50, '00049', 'P0001', '2024-08-27', '2024-08-29', 2, 0, 0),
(51, '00050', 'P0001', '2024-08-27', '2024-08-28', 2, 0, 0),
(52, '00051', 'P0003', '2024-08-28', '2024-08-29', 2, 0, 0),
(53, '00052', 'P0005', '2024-08-28', '2024-08-31', 2, 0, 0),
(54, '00053', 'P0003', '2024-08-28', '2024-08-29', 2, 0, 0),
(55, '00054', 'P0003', '2024-08-29', '2024-08-31', 2, 0, 0),
(56, '00055', 'P0002', '2024-09-01', '2024-09-03', 2, 0, 0),
(57, '00056', 'P0003', '2024-09-01', '2024-09-03', 2, 0, 0),
(58, '00057', 'P0002', '2024-09-02', '2024-09-03', 2, 0, 0),
(59, '00058', 'P0005', '2024-09-03', '2024-09-07', 2, 1, 5000),
(60, '00059', 'P0004', '2024-09-04', '2024-09-05', 2, 0, 0),
(61, '00060', 'P0004', '2024-09-04', '2024-09-06', 2, 0, 0),
(62, '00061', 'P0003', '2024-09-05', '2024-09-09', 2, 2, 40000),
(63, '00062', 'P0001', '2024-09-06', '2024-09-09', 2, 0, 0),
(64, '00063', 'P0005', '2024-09-06', '2024-09-09', 2, 0, 0),
(65, '00063', 'P0003', '2024-09-06', '2024-09-09', 2, 0, 0),
(66, '00063', 'P0002', '2024-09-06', '2024-09-09', 2, 0, 0),
(67, '00064', 'P0002', '2024-09-09', '2024-09-11', 2, 0, 0),
(68, '00065', 'P0003', '0000-00-00', '0000-00-00', 3, 0, 0),
(69, '00066', 'P0001', '2024-09-12', '2024-09-15', 2, 0, 0),
(70, '00067', 'P0003', '2024-09-12', '2024-09-13', 2, 0, 0),
(71, '00068', 'P0005', '2024-09-13', '2024-09-15', 2, 0, 0),
(72, '00069', 'P0005', '2024-09-18', '2024-09-20', 2, 0, 0),
(73, '00070', 'P0003', '2024-09-19', '2024-09-20', 2, 0, 0),
(74, '00071', 'P0002', '2024-09-20', '2024-09-23', 2, 0, 0),
(75, '00072', 'P0004', '2024-09-20', '2024-09-21', 2, 0, 0),
(76, '00073', 'P0002', '2024-09-20', '2024-09-23', 2, 0, 0),
(77, '00074', 'P0001', '2024-09-20', '2024-09-23', 2, 0, 0),
(78, '00075', 'P0001', '2024-09-21', '2024-09-23', 2, 0, 0),
(79, '00076', 'P0002', '2024-09-23', '2024-09-25', 2, 0, 0),
(80, '00077', 'P0003', '2024-09-25', '2024-09-27', 2, 0, 0),
(81, '00078', 'P0003', '2024-09-29', '2024-10-02', 2, 0, 0),
(82, '00079', 'P0002', '2024-10-02', '2024-10-05', 2, 0, 0),
(83, '00080', 'P0002', '2024-10-05', '2024-10-07', 2, 0, 0),
(84, '00081', 'P0005', '2024-10-07', '2024-10-10', 2, 0, 0),
(85, '00082', 'P0004', '2024-10-07', '2024-10-10', 2, 0, 0),
(86, '00083', 'P0003', '2024-10-10', '2024-10-12', 2, 0, 0),
(87, '00084', 'P0002', '2024-10-10', '2024-10-11', 2, 0, 0),
(88, '00085', 'P0005', '2024-10-11', '2024-10-12', 2, 0, 0),
(89, '00086', 'P0001', '2024-10-16', '2024-10-18', 2, 0, 0),
(90, '00087', 'P0003', '2024-10-16', '2024-10-19', 2, 0, 0),
(91, '00088', 'P0001', '2024-10-18', '2024-10-19', 2, 0, 0),
(92, '00089', 'P0003', '2024-10-18', '2024-10-19', 2, 0, 0),
(93, '00090', 'P0005', '2024-10-19', '2024-10-22', 2, 0, 0),
(94, '00091', 'P0002', '2024-10-21', '2024-10-22', 2, 0, 0),
(95, '00092', 'P0001', '2024-10-21', '2024-10-22', 2, 0, 0),
(96, '00093', 'P0003', '2024-10-22', '2024-10-24', 2, 0, 0),
(97, '00094', 'P0005', '2024-10-24', '2024-10-27', 2, 0, 0),
(98, '00095', 'P0002', '2024-10-27', '2024-10-30', 2, 0, 0),
(99, '00096', 'P0005', '2024-10-27', '2024-10-29', 2, 0, 0),
(100, '00097', 'P0005', '2024-10-29', '2024-10-30', 2, 0, 0),
(101, '00098', 'P0002', '2024-10-29', '2024-10-30', 2, 0, 0),
(102, '00099', 'P0002', '2024-10-30', '2024-10-30', 2, 0, 0),
(103, '00100', 'P0003', '2024-10-30', '2024-11-01', 2, 0, 0),
(104, '00101', 'P0002', '2024-11-01', '2024-11-04', 2, 0, 0),
(105, '00102', 'P0003', '2024-11-04', '2024-11-05', 2, 0, 0),
(106, '00103', 'P0005', '2024-11-04', '2024-11-07', 2, 0, 0),
(107, '00103', 'P0002', '2024-11-04', '2024-11-07', 2, 0, 0),
(108, '00103', 'P0003', '2024-11-04', '2024-11-06', 2, 0, 0),
(109, '00104', 'P0005', '2024-11-05', '2024-11-07', 2, 0, 0),
(110, '00105', 'P0005', '2024-11-05', '2024-11-07', 2, 0, 0),
(111, '00106', 'P0002', '2024-11-07', '2024-11-09', 2, 0, 0),
(112, '00107', 'P0003', '2024-11-09', '2024-11-12', 2, 0, 0),
(113, '00108', 'P0005', '2024-11-09', '2024-11-10', 2, 0, 0),
(114, '00109', 'P0003', '2024-11-10', '2024-11-12', 2, 0, 0),
(115, '00110', 'P0002', '2024-11-13', '2024-11-15', 2, 0, 0),
(116, '00110', 'P0003', '2024-11-13', '2024-11-14', 2, 0, 0),
(117, '00110', 'P0005', '2024-11-13', '2024-11-14', 2, 0, 0),
(118, '00111', 'P0001', '2024-11-13', '2024-11-15', 2, 0, 0),
(119, '00112', 'P0005', '2024-11-13', '2024-11-14', 2, 0, 0),
(120, '00112', 'P0004', '2024-11-13', '2024-11-15', 2, 0, 0),
(121, '00113', 'P0004', '2024-11-14', '2024-11-15', 2, 0, 0),
(122, '00114', 'P0001', '2024-11-15', '2024-11-18', 2, 0, 0),
(123, '00115', 'P0002', '2024-11-29', '2024-12-03', 2, 1, 5000),
(124, '00116', 'P0003', '2024-12-02', '2024-12-05', 2, 0, 0),
(125, '00116', 'P0005', '2024-12-02', '2024-12-05', 2, 0, 0),
(126, '00117', 'P0005', '2024-12-03', '2024-12-05', 2, 0, 0),
(127, '00118', 'P0002', '2024-12-04', '2024-12-07', 2, 0, 0),
(128, '00119', 'P0001', '2024-12-06', '2024-12-09', 2, 0, 0),
(129, '00120', 'P0003', '2024-12-07', '2024-12-10', 2, 0, 0),
(130, '00121', 'P0003', '2024-12-08', '0000-00-00', 1, 0, 0),
(131, '00122', 'P0002', '2024-12-09', '0000-00-00', 1, 0, 0),
(132, '00123', 'P0001', '2024-12-10', '0000-00-00', 1, 0, 0),
(133, '00124', 'P0005', '2024-12-11', '0000-00-00', 1, 0, 0),
(134, '00125', 'P0001', '2024-12-12', '0000-00-00', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pustaka`
--

CREATE TABLE `kategori_pustaka` (
  `id_kategori_pustaka` int(11) NOT NULL,
  `kode_kategori_pustaka` varchar(10) NOT NULL,
  `nama_kategori_pustaka` varchar(50) NOT NULL,
  `gambar_kategori_pustaka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pustaka`
--

INSERT INTO `kategori_pustaka` (`id_kategori_pustaka`, `kode_kategori_pustaka`, `nama_kategori_pustaka`, `gambar_kategori_pustaka`) VALUES
(1, 'K001', 'Teknologi dan Komputer', ''),
(2, 'K002', 'Kesehatan', ''),
(3, 'K003', 'Musik', ''),
(4, 'K004', 'Sejarah', ''),
(5, 'K005', 'Novel', '');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `aktivitas` text DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_peminjaman` varchar(10) NOT NULL,
  `kode_anggota` varchar(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_peminjaman`, `kode_anggota`, `tanggal`) VALUES
(1, '00001', 'A001', '2024-07-30'),
(2, '00002', 'A002', '2024-07-30'),
(3, '00003', 'A003', '2024-07-30'),
(4, '00004', 'A002', '2024-07-30'),
(5, '00005', 'A002', '2024-07-31'),
(6, '00006', 'A003', '2024-07-31'),
(7, '00007', 'A001', '2024-07-31'),
(8, '00008', 'A002', '2024-08-01'),
(9, '00009', 'A001', '2024-08-01'),
(10, '00010', 'A003', '2024-08-01'),
(11, '00011', 'A002', '2024-08-02'),
(12, '00012', 'A003', '2024-08-03'),
(13, '00013', 'A001', '2024-08-05'),
(14, '00014', 'A002', '2024-08-06'),
(15, '00015', 'A003', '2024-08-08'),
(16, '00016', 'A001', '2024-08-08'),
(17, '00017', 'A002', '2024-08-09'),
(18, '00018', 'A001', '2024-08-10'),
(19, '00019', 'A002', '2024-08-10'),
(20, '00020', 'A004', '2024-08-12'),
(21, '00021', 'A003', '2024-08-12'),
(22, '00022', 'A004', '2024-08-12'),
(23, '00023', 'A001', '2024-08-12'),
(25, '00024', 'A001', '2024-08-13'),
(26, '00026', 'A002', '2024-08-14'),
(27, '00027', 'A003', '2024-08-14'),
(30, '00028', 'A004', '2024-08-14'),
(31, '00031', 'A004', '2024-08-16'),
(32, '00032', 'A001', '2024-08-17'),
(33, '00033', 'A003', '2024-08-18'),
(34, '00034', 'A002', '2024-08-19'),
(35, '00035', 'A001', '2024-08-19'),
(36, '00036', 'A004', '2024-08-19'),
(37, '00037', 'A003', '2024-08-20'),
(39, '00038', 'A004', '2024-08-21'),
(40, '00040', 'A002', '2024-08-21'),
(41, '00041', 'A004', '2024-08-22'),
(42, '00042', 'A001', '2024-08-23'),
(43, '00043', 'A002', '2024-08-23'),
(44, '00044', 'A004', '2024-08-24'),
(45, '00045', 'A003', '2024-08-24'),
(46, '00046', 'A003', '2024-08-25'),
(47, '00047', 'A001', '2024-08-25'),
(48, '00048', 'A003', '2024-08-26'),
(49, '00049', 'A004', '2024-08-27'),
(50, '00050', 'A002', '2024-08-27'),
(51, '00051', 'A003', '2024-08-28'),
(52, '00052', 'A002', '2024-08-28'),
(53, '00053', 'A001', '2024-08-28'),
(54, '00054', 'A004', '2024-08-29'),
(55, '00055', 'A003', '2024-09-01'),
(56, '00056', 'A002', '2024-09-01'),
(57, '00057', 'A001', '2024-09-02'),
(58, '00058', 'A003', '2024-09-03'),
(59, '00059', 'A001', '2024-09-04'),
(60, '00060', 'A002', '2024-09-04'),
(61, '00061', 'A004', '2024-09-05'),
(62, '00062', 'A001', '2024-09-06'),
(63, '00063', 'A002', '2024-09-06'),
(64, '00064', 'A003', '2024-09-09'),
(65, '00065', 'A001', '2024-09-11'),
(66, '00066', 'A004', '2024-09-12'),
(67, '00067', 'A003', '2024-09-12'),
(68, '00068', 'A002', '2024-09-13'),
(69, '00069', 'A003', '2024-09-18'),
(70, '00070', 'A001', '2024-09-19'),
(71, '00071', 'A002', '2024-09-20'),
(72, '00072', 'A004', '2024-09-20'),
(73, '00073', 'A003', '2024-09-20'),
(74, '00074', 'A001', '2024-09-20'),
(75, '00075', 'A004', '2024-09-21'),
(76, '00076', 'A003', '2024-09-23'),
(77, '00077', 'A004', '2024-09-25'),
(78, '00078', 'A002', '2024-09-29'),
(79, '00079', 'A003', '2024-10-02'),
(80, '00080', 'A002', '2024-10-05'),
(81, '00081', 'A004', '2024-10-07'),
(82, '00082', 'A003', '2024-10-07'),
(83, '00083', 'A004', '2024-10-10'),
(84, '00084', 'A003', '2024-10-10'),
(85, '00085', 'A003', '2024-10-11'),
(86, '00086', 'A003', '2024-10-16'),
(87, '00087', 'A002', '2024-10-16'),
(88, '00088', 'A001', '2024-10-18'),
(89, '00089', 'A003', '2024-10-18'),
(90, '00090', 'A001', '2024-10-19'),
(91, '00091', 'A003', '2024-10-21'),
(92, '00092', 'A002', '2024-10-21'),
(93, '00093', 'A004', '2024-10-22'),
(94, '00094', 'A003', '2024-10-24'),
(95, '00095', 'A001', '2024-10-27'),
(96, '00096', 'A003', '2024-10-27'),
(97, '00097', 'A002', '2024-10-29'),
(98, '00098', 'A003', '2024-10-29'),
(99, '00099', 'A001', '2024-10-30'),
(100, '00100', 'A004', '2024-10-30'),
(101, '00101', 'A004', '2024-11-01'),
(102, '00102', 'A003', '2024-11-04'),
(103, '00103', 'A001', '2024-11-04'),
(104, '00104', 'A003', '2024-11-05'),
(105, '00105', 'A002', '2024-11-05'),
(106, '00106', 'A003', '2024-11-07'),
(107, '00107', 'A002', '2024-11-09'),
(108, '00108', 'A001', '2024-11-09'),
(109, '00109', 'A003', '2024-11-10'),
(110, '00110', 'A001', '2024-11-13'),
(111, '00111', 'A003', '2024-11-13'),
(112, '00112', 'A002', '2024-11-13'),
(113, '00113', 'A004', '2024-11-14'),
(114, '00114', 'A003', '2024-11-15'),
(115, '00115', 'A001', '2024-11-29'),
(116, '00116', 'A002', '2024-12-02'),
(117, '00117', 'A003', '2024-12-03'),
(118, '00118', 'A001', '2024-12-04'),
(119, '00119', 'A003', '2024-12-06'),
(120, '00120', 'A001', '2024-12-07'),
(121, '00121', 'A002', '2024-12-08'),
(122, '00122', 'A002', '2024-12-09'),
(123, '00123', 'A003', '2024-12-10'),
(124, '00124', 'A001', '2024-12-11'),
(125, '00125', 'A001', '2024-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `kode_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `kode_penerbit`, `nama_penerbit`) VALUES
(1, 'U001', 'Mediakom'),
(2, 'U002', 'Unicorn Publising'),
(3, 'U003', 'Penerbit Yanita'),
(4, 'U004', 'Masmedia'),
(5, 'U005', 'Penerbit Buku Kompas');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `kode_pengguna` char(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `kode_pengguna`, `username`, `password`, `level`, `status`) VALUES
(1, '2402001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Petugas', 1),
(2, 'A001', 'farhan', '202cb962ac59075b964b07152d234b70', 'Anggota', 1),
(3, 'A002', 'syaiful', '202cb962ac59075b964b07152d234b70', 'Anggota', 1),
(4, 'A003', 'syarifuddin', '202cb962ac59075b964b07152d234b70', 'Anggota', 1),
(5, 'A004', 'hadi', '202cb962ac59075b964b07152d234b70', 'Anggota', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `kode_penulis` varchar(10) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `kode_penulis`, `nama_penulis`) VALUES
(1, 'P001', 'Hasnul Arifin'),
(2, 'P002', 'Karina Nurin R &amp;amp; Anzhor Adhi S, Amd.Kep'),
(3, 'P003', 'Kiki Laisa'),
(4, 'P004', 'suyamti dan listiyani d.a'),
(5, 'P005', 'Immanuela D. Nindhita');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `kode_petugas` char(20) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_telp` char(14) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `kode_petugas`, `nama_petugas`, `jk`, `email`, `alamat`, `no_telp`, `foto`) VALUES
(1, '2402001', 'Admin', '2', 'admin@gmail.com', 'Jl. Raya', '082120786830', 'a2be9863cbfc16ef630066aabeb5fc2d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profil_aplikasi`
--

CREATE TABLE `profil_aplikasi` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` char(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_aplikasi`
--

INSERT INTO `profil_aplikasi` (`id`, `nama_aplikasi`, `nama_pimpinan`, `alamat`, `no_telp`, `email`, `logo`) VALUES
(1, 'Perpustakaan SMA NEGERI 31 MALUKU TENGAH', 'Nama Lengkap', 'Ureng', '081219780655', 'sman31051malteng@gmail.com', 'perpurnas.png');

-- --------------------------------------------------------

--
-- Table structure for table `pustaka`
--

CREATE TABLE `pustaka` (
  `id_pustaka` int(11) NOT NULL,
  `kode_pustaka` varchar(10) NOT NULL,
  `judul_pustaka` varchar(100) NOT NULL,
  `kategori_pustaka` int(11) NOT NULL,
  `penerbit` int(11) NOT NULL,
  `penulis` int(11) NOT NULL,
  `tahun` char(4) NOT NULL,
  `gambar_pustaka` varchar(100) NOT NULL,
  `halaman` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pustaka`
--

INSERT INTO `pustaka` (`id_pustaka`, `kode_pustaka`, `judul_pustaka`, `kategori_pustaka`, `penerbit`, `penulis`, `tahun`, `gambar_pustaka`, `halaman`, `isbn`, `stok`, `rak`) VALUES
(1, 'P0001', 'Merakit Sendiri Komputer Tahan Banting Dengan Modal 1 Jutaan', 1, 1, 1, '2010', 'bukumerakitkomputer.png', 120, '9789798771187', 18, 'Komputer'),
(2, 'P0002', 'Keajaiban Air Mineral Bagi Kesehatan', 2, 2, 2, '2018', 'keajaiban-air-mineral-bagi-kesehatan.png', 210, '9786237210023', 8, 'Kesehatan'),
(3, 'P0003', 'Master Chord Gitar', 3, 3, 3, '2017', 'Master-Chord-Gitar.jpg', 178, '9786027395299', 7, 'Musik'),
(4, 'P0004', 'Sejarah', 4, 4, 4, '2000', 'gambar_default.png', 262, '9780622', 50, 'Rak 11'),
(5, 'P0005', 'Hati yang Berani, Sahabat Sejati', 5, 5, 5, '2022', 'Hati yang Berani Sahabat Sejati.png', 104, '9786231601544', 9, 'Fiksi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `aturan_perpustakaan`
--
ALTER TABLE `aturan_perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`);

--
-- Indexes for table `kategori_pustaka`
--
ALTER TABLE `kategori_pustaka`
  ADD PRIMARY KEY (`id_kategori_pustaka`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `profil_aplikasi`
--
ALTER TABLE `profil_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pustaka`
--
ALTER TABLE `pustaka`
  ADD PRIMARY KEY (`id_pustaka`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aturan_perpustakaan`
--
ALTER TABLE `aturan_perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `kategori_pustaka`
--
ALTER TABLE `kategori_pustaka`
  MODIFY `id_kategori_pustaka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil_aplikasi`
--
ALTER TABLE `profil_aplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pustaka`
--
ALTER TABLE `pustaka`
  MODIFY `id_pustaka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
