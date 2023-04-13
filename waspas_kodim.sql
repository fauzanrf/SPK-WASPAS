-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 05:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waspas_kodim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_lengkap`, `password`) VALUES
(1, 'arif', 'Arif Setiawan', 'arif'),
(2, 'fauzan', 'Fauzan Rahadian', 'fauzan24'),
(3, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `bagian` varchar(35) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `blangko` varchar(255) NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `email`, `password`, `jabatan`, `bagian`, `no_hp`, `alamat`, `blangko`, `hasil`) VALUES
(1, 'Mustakitm', 'mustakim01@gmail.com', '12345678', 'Staff', 'Produksi', '0812345678', '      Jln.Bukit karya Dusun 12', '2021041207585416-32-1-SM.pdf', 0.539),
(2, 'Nirmawan', 'nirmawan02@gmail.com', '12345678', 'Staff', 'Produksi', '0812345678', 'Jln. Indah sari langkat', '', 0.547),
(3, 'Soni Putrawan Ginting', 'soniputrwanginting@gmail.com', '12345678', 'SPV', 'Produksi', '0812345678', 'Jln. Indah sari langkat', '', 0.549),
(4, 'Agus Miadi', 'agusmiadi@gmail.com', '12345678', 'Manager', 'Produksi', '0812345678', 'Jln.Pondok indah ', '', 0.548),
(5, 'Sabur utomo', 'saburutomo@gmail.com', '12345678', 'Staff', 'IT', '0812345678', ' Jln. Indah sari langkat', '202104111856582021040518294438-Jurnal Artikel Ilmiah-96-2-10-20190222.pdf', 0.54),
(6, 'Andri Prasetyo Wibowo', 'andripras@gmail.com', '12345678', 'SPV', 'IT', '0812345678', ' Jln. Indah sari langkat', '2021041118575637-Article Text-73-1-10-20161115.pdf', 0.557),
(7, 'Bina Satria', 'binasatria@gmail.com', '12345678', 'Manager', 'IT', '0812345678', 'Jln.Pondok indah ', '', 0.539),
(8, 'Fitriadi', 'fitriadifitri@gmail.com', '12345678', 'Staff', 'Finance', '0812345678', 'Jln. Pondok tengah', '', 0.549),
(9, 'Eddy H Hutabarat', 'eddyhutabarat', '12345678', 'Manager', 'Finanace', '0812345678', 'Jln.Ujung baka langkat', '', 0.539),
(10, 'Azwar', 'azwarazwar@gmail.com', '12345678', 'Staff', 'Finance', '0812345678', 'Jln. Paya rengas stabat', '', 0.564),
(14, 'Dimas', 'dimas@test.com', 'dimas123', 'Kodim', 'Apage', '12361235326', ' asdsadsad', '202302231240252021040513241638-Jurnal Artikel Ilmiah-96-2-10-20190222.pdf', 0.572);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(12) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'C1', 'Kedisiplinan', 0.028),
(2, 'C2', 'Tanggung Jawab', 0.03),
(3, 'C3', 'Keahlian', 0.03),
(4, 'C4', 'Kerja Sama Tim', 0.028),
(5, 'C5', 'Loyalitas', 0.028);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_calon_komandan` int(11) NOT NULL,
  `nama_calon_komandan` int(11) NOT NULL,
  `pesan_peng` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_karyawan`, `id_kriteria`, `nilai_bobot`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 4),
(3, 1, 3, 2),
(4, 1, 4, 3),
(5, 1, 5, 4),
(24, 2, 1, 4),
(25, 2, 2, 4),
(26, 2, 3, 2),
(27, 2, 4, 4),
(28, 2, 5, 3),
(68, 3, 1, 4),
(69, 3, 2, 3),
(70, 3, 3, 3),
(71, 3, 4, 4),
(72, 3, 5, 3),
(90, 4, 1, 3),
(91, 4, 2, 4),
(92, 4, 3, 4),
(93, 4, 4, 2),
(94, 4, 5, 4),
(112, 5, 1, 2),
(113, 5, 2, 4),
(114, 5, 3, 3),
(115, 5, 4, 4),
(116, 5, 5, 3),
(134, 6, 1, 3),
(135, 6, 2, 4),
(136, 6, 3, 4),
(137, 6, 4, 3),
(138, 6, 5, 4),
(156, 7, 1, 4),
(157, 7, 2, 3),
(158, 7, 3, 2),
(159, 7, 4, 4),
(160, 7, 5, 3),
(178, 8, 1, 3),
(179, 8, 2, 4),
(180, 8, 3, 3),
(181, 8, 4, 3),
(182, 8, 5, 4),
(200, 9, 1, 4),
(201, 9, 2, 2),
(202, 9, 3, 3),
(203, 9, 4, 4),
(204, 9, 5, 3),
(222, 10, 1, 4),
(223, 10, 2, 3),
(224, 10, 3, 4),
(225, 10, 4, 4),
(226, 10, 5, 4),
(251, 14, 1, 4),
(252, 14, 2, 4),
(253, 14, 3, 4),
(254, 14, 4, 4),
(255, 14, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subKriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_sub` varchar(255) NOT NULL,
  `bobot_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subKriteria`, `id_kriteria`, `nama_sub`, `bobot_sub`) VALUES
(1, 1, 'Baik Sekali', 4),
(2, 1, 'Baik', 3),
(3, 1, 'Cukup Baik', 2),
(4, 1, 'Kurang', 1),
(5, 2, 'Baik Sekali', 4),
(6, 2, 'Baik', 3),
(7, 2, 'Cukup Baik', 2),
(8, 2, 'Kurang', 1),
(9, 3, 'Baik Sekali', 4),
(10, 3, 'Baik', 3),
(11, 3, 'Cukup Baik', 2),
(12, 3, 'Kurang', 1),
(13, 4, 'Baik Sekali', 4),
(14, 4, 'Baik', 3),
(15, 4, 'Cukup Baik', 2),
(16, 4, 'Kurang', 1),
(17, 5, 'Baik Sekali', 4),
(18, 5, 'Baik', 3),
(19, 5, 'Cukup Baik', 2),
(20, 5, 'Kurang Baik', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_calon_komandan` (`id_karyawan`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subKriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
