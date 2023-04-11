-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 12:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_izin_keluar_kantor`
--

CREATE TABLE `form_izin_keluar_kantor` (
  `id_izin` int(11) NOT NULL,
  `inp_nama` longtext NOT NULL,
  `inp_nip` varchar(50) NOT NULL,
  `inp_unit_kerja` varchar(100) NOT NULL,
  `inp_tujuan` varchar(255) NOT NULL,
  `inp_alasan` text NOT NULL,
  `inp_waktu_berangkat` datetime NOT NULL,
  `inp_waktu_kembali` datetime NOT NULL,
  `inp_tgl_surat` varchar(255) NOT NULL,
  `inp_kepala_bagian` varchar(255) NOT NULL,
  `inp_nip_ketua` varchar(50) NOT NULL,
  `create_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `alasan_ditolak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_izin_keluar_kantor`
--

INSERT INTO `form_izin_keluar_kantor` (`id_izin`, `inp_nama`, `inp_nip`, `inp_unit_kerja`, `inp_tujuan`, `inp_alasan`, `inp_waktu_berangkat`, `inp_waktu_kembali`, `inp_tgl_surat`, `inp_kepala_bagian`, `inp_nip_ketua`, `create_by`, `status`, `alasan_ditolak`) VALUES
(24, 'izatunnisa', '122221', 'SIMRS', 'DINAS KESEHATAN LUBUK PAKAM', 'makan sama ibel', '2023-04-10 15:23:00', '2023-04-10 20:22:00', 'Lubuk Pakam, 10 Maret 2023', 'dormansyah', '099777', 30, '1', 'ghak boleh'),
(25, 'dian', '12111', 'UNIT TRANSFUSI DARAH', 'DINAS KESEHATAN LUBUK PAKAM', 'ADA YANG MAU DIURUS', '2023-04-10 17:07:00', '2023-04-10 17:07:00', 'Lubuk Pakam, 10 Maret 2023', 'tiara g', '534', 32, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_surat`
--

CREATE TABLE `kategori_surat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nm_atasan`
--

CREATE TABLE `nm_atasan` (
  `id_atasan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kd_atasan` varchar(100) NOT NULL,
  `nama_atasan` varchar(255) NOT NULL,
  `inp_nip_atasan` varchar(50) NOT NULL,
  `barcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nm_atasan`
--

INSERT INTO `nm_atasan` (`id_atasan`, `id_user`, `kd_atasan`, `nama_atasan`, `inp_nip_atasan`, `barcode`) VALUES
(12, 20, 'tiara1212', 'Tiara Tes', '12121212', 'QR_code_for_mobile_English_Wikipedia.svg.png'),
(13, 29, 'k77', 'dormansyah', '099777', 'QR_code_for_mobile_English_Wikipedia.svg.png'),
(14, 31, 't33', 'tiara g', '534', '');

-- --------------------------------------------------------

--
-- Table structure for table `nm_ruangan`
--

CREATE TABLE `nm_ruangan` (
  `id_nm_ruangan` int(11) NOT NULL,
  `kd_ruangan` varchar(100) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nm_ruangan`
--

INSERT INTO `nm_ruangan` (`id_nm_ruangan`, `kd_ruangan`, `nama_ruangan`) VALUES
(11, 'dasasd', 'rfwa'),
(12, 'ffe3', 'tess');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_us` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_user` varchar(200) DEFAULT NULL,
  `inp_email` varchar(255) NOT NULL,
  `inp_password` varchar(100) NOT NULL,
  `inp_nik` varchar(20) NOT NULL,
  `inp_level` enum('superadmin','admin','user') NOT NULL,
  `inp_token_us` varchar(255) NOT NULL,
  `inp_kabag` int(11) DEFAULT NULL,
  `upload_barcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_us`, `username`, `nama_user`, `inp_email`, `inp_password`, `inp_nik`, `inp_level`, `inp_token_us`, `inp_kabag`, `upload_barcode`) VALUES
(2, 'NOVA JUNI ERMI', 'NOVA JUNI ERMI', 'nova@gmail.com', '202cb962ac59075b964b07152d234b70', '98887', 'superadmin', '359124', NULL, ''),
(13, 'verania', 'Verania', 'verania@gmail.com', '202cb962ac59075b964b07152d234b70', '3232323267', 'user', '857682', 4, '1641-scanttd_1.jpg'),
(16, 'manda', 'Manda Lika', 'manda@gmail.com', '202cb962ac59075b964b07152d234b70', '4565465', 'user', '660753', 9, '1002-fff.jpg'),
(29, 'dormansyah', 'oman', 'dormansyah@gmail.com', '202cb962ac59075b964b07152d234b70', '232323', 'user', '165779', 1, '1006-QR_code_for_mobile_English_Wikipedia.svg.png'),
(30, 'izatunnisa', 'izatunnisa', 'izatunnisa@gmail.com', '202cb962ac59075b964b07152d234b70', '12123222', 'user', '844022', 13, '1018-QR_code_for_mobile_English_Wikipedia.svg.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_izin_keluar_kantor`
--
ALTER TABLE `form_izin_keluar_kantor`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `kategori_surat`
--
ALTER TABLE `kategori_surat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nm_atasan`
--
ALTER TABLE `nm_atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `nm_ruangan`
--
ALTER TABLE `nm_ruangan`
  ADD PRIMARY KEY (`id_nm_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_izin_keluar_kantor`
--
ALTER TABLE `form_izin_keluar_kantor`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori_surat`
--
ALTER TABLE `kategori_surat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_atasan`
--
ALTER TABLE `nm_atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nm_ruangan`
--
ALTER TABLE `nm_ruangan`
  MODIFY `id_nm_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
