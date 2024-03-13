-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2018 at 04:49 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(150) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Rio Saputra');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `password`, `nama_guru`, `tgl_lahir`, `jk`, `no_telp`, `alamat`) VALUES
('G001', '92afb435ceb16630e9827f54330c59c9', 'Muhammad Nur Rois', '2017-12-30', 'L', '45124521421', 'Sempu'),
('G002', '202cb962ac59075b964b07152d234b70', 'Achmad Naji', '2017-12-15', 'L', '214314512', 'Genteng'),
('G003', '202cb962ac59075b964b07152d234b70', 'Wafa Nur Fadilahs', '2017-12-14', 'L', '421452141', 'Gendoh'),
('G004', '', 'Vijay Komaini Malabar', '2017-11-29', 'L', '4148989', 'Penataban'),
('G005', '', 'Rio Saputra', '2017-11-28', 'L', '23415235', 'Curahjati'),
('G006', 'e10adc3949ba59abbe56e057f20f883e', 'Aries', '2017-12-21', 'L', '0283283', 'Banyuwangi');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nip_guru` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `nip_guru`) VALUES
(1, '10 IPS', 'G001'),
(2, '10 IPA', 'G002'),
(3, '11 IPA', 'G003'),
(4, '11 IPS', 'G004'),
(5, '12 IPA', 'G005'),
(6, '12 IPS', 'G006');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nis`, `nip`, `komentar`) VALUES
(0, 'S001', 'G001', 'bijimu remok kakean maen game! Sinau neh seng pateng le ojo game ae !');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(50) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`) VALUES
('MP_01', 'Bahasa Indonesia'),
('MP_02', 'Matematika'),
('MP_03', 'Fisika'),
('MP_04', 'Bahasa Arab'),
('MP_05', 'Biologi'),
('MP_06', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_nilai` int(11) NOT NULL,
  `kd_mapel` varchar(150) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_nilai`, `kd_mapel`, `nis`, `id_kelas`, `semester`, `nilai`) VALUES
(5, 'MP_03', 'S001', '2', 'Genap', 80),
(8, 'MP_01', 'S001', '2', 'Genap', 90),
(10, 'MP_01', 'S003', '1', 'Ganjil', 70),
(11, 'MP_02', 'S003', '1', 'Ganjil', 80),
(12, 'MP_04', 'S001', '3', 'Genap', 88),
(13, 'MP_03', 'S007', '1', 'Ganjil', 70),
(14, 'MP_01', 'S001', '3', 'Genap', 50),
(15, 'MP_01', 'S001', '3', 'Genap', 90),
(21, 'MP_01', 'S001', '5', 'Ganjil', 66),
(22, 'MP_02', 'S001', '5', 'Ganjil', 77),
(23, 'MP_03', 'S001', '5', 'Ganjil', 88),
(24, 'MP_04', 'S001', '5', 'Genap', 98),
(25, 'MP_05', 'S001', '5', 'Genap', 97),
(26, 'MP_06', 'S011', '4', 'Genap', 77),
(27, 'MP_05', 'S011', '6', 'Genap', 88),
(28, 'MP_04', 'S008', '1', 'Genap', 55),
(29, 'MP_02', 'S008', '4', 'Genap', 67),
(30, 'MP_04', 'S008', '6', 'Genap', 100),
(31, 'MP_03', 'S001', '1', 'Ganjil', 66);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `angkatan` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `password`, `nama_siswa`, `tgl_lahir`, `jk`, `no_telp`, `alamat`, `angkatan`, `jurusan`, `id_kelas`) VALUES
('S001', 'd5ed38fdbf28bc4e58be142cf5a17cf5', 'RIO SAPUTRA', '1995-11-17', 'L', '089670785100', 'SAMPIT', '2014/2015', 'IPS', 6),
('S002', '', 'Ayus', '2017-12-23', 'P', '21214', 'Makassar', '2017/2018', 'IPA', 1),
('S0024', 'a3590023df66ac92ae35e3316026d17d', 'Sulton', '2017-12-08', 'L', '023828', 'bwi', '2017/2018', 'IPS', 1),
('S003', 'd5ed38fdbf28bc4e58be142cf5a17cf5', 'Suci Wulandari', '2018-01-06', 'P', '231412421', 'Kalipuro', '2017/2018', 'IPS', 1),
('S005', '', 'Deerry', '2017-03-15', 'L', '234234', 'Cimahi', '2014/2015', 'IPA', 2),
('S006', '', 'Wida Ambar', '2017-12-30', 'P', '254365346', 'Kelir', '2017/2018', 'IPA', 1),
('S007', '', 'Suryo Hadi', '2018-01-27', 'L', '56346436', 'Kali Pait', '2017/2018', 'IPS', 2),
('S008', '', 'Genvia Ananta', '2018-02-08', 'P', '54356435', 'Jajag', '2017/2018', 'IPS', 1),
('S009', '', 'Roy Suryo', '2018-02-21', 'L', '4645645', 'Stail', '2017/2018', 'IPA', 2),
('S011', '', 'Tamara', '2018-04-05', 'P', '21352135', 'Jakarta', '2017/2018', 'IPS', 2),
('S012', '', 'Joni', '2018-07-25', 'L', '523523', 'Kali Baru', '2017/2018', 'IPA', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
