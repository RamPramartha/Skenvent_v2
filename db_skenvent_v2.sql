-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 02:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE `db_skenvent_v2`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skenvent_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `available_qty` int(20) NOT NULL,
  `id_jurusan` int(2) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama`, `kode`, `qty`, `available_qty`, `id_jurusan`, `deskripsi`) VALUES
(1, 'Laptop', 'ashiap', 10, 8, 1, 'Masih Bagus'),
(2, 'Obeng', 'ashiap', 10, 6, 2, 'Obeng biasa'),
(3, 'Tang', 'ashiap', 13, 2, 2, 'Tang biasa'),
(4, 'Bor', 'ashiap', 20, 4, 2, 'Bor'),
(5, 'CPU Komputer', 'ashiap', 35, 30, 1, 'CPU Komputer, Processor Intel i3, Ram 8GB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Multimedia'),
(3, 'Teknik Komputer dan Jaringan'),
(4, 'Teknik Kendaraan Ringan dan Otomotif'),
(5, 'Teknik Bisnis Sepeda Motor'),
(6, 'Teknik Instalasi Tenaga Listrik'),
(7, 'Teknik Pendingin dan Tata Udara'),
(8, 'Audio Video'),
(9, 'Permesinan'),
(10, 'Design Permodelan dan Informasi Bangunan'),
(11, 'Bisnis Kontruksi dan Properti');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_user` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nisn` char(5) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `gender` int(2) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_user`, `fullname`, `email`, `username`, `password`, `nisn`, `jurusan`, `kelas`, `gender`, `status`, `avatar`) VALUES
('u-272455e7b841e1d3ee', 'i gusti putu ngurah prihandana', 'ngurahprihandana27@gmail.com', 'Ngurah Prihandana', '$2y$10$fLPiEDrB5xIyi2d3Z2wWUO.uAZ4mtHaDsZqZtlUhvYMPGBA5t18cW', '27245', 'RPL', 'XI RPL 1', NULL, 1, 'default.jpg'),
('u-272455e82a5d0a3b7a', 'I Gusti Putu Ngurah Hans', 'prihandana27@gmail.com', 'Ngurah Hans', '$2y$10$uzlIbLBP1lgV.ewGgz1kv.T10mf0zIymSVF60l2T6swqMAiN5VVHu', '27245', 'RPL', 'XI RPL 1', NULL, 1, 'default.jpg'),
('u-272505e65a714021e0', 'i putu dwi payana', 'ini.dwiii@gmail.com', 'Dwi Payana', '$2y$10$twdksXsUkUkAhef16vVDe.1To.WrWWBexplxuJuT3A1ZEvzs6w4Je', '27250', 'RPL', 'XI RPL 1', NULL, 1, 'default.jpg'),
('u-272585e82804a983df', 'saomi novelia gunawan', 'saominvl@gmail.com', 'Novelia Gunawan', '$2y$10$M30ljdL8EInPFUSw1g6f5.XAfxh0pV2Xvn8TUStQeYB9/egw0t1IC', '27258', 'RPL', 'XI RPL 1', NULL, 1, 'default.jpg'),
('u-272695e827e740e4e5', 'wishnu ahmad syahputra', 'wishnuahmad@gmail.com', 'Ahmad Syahputra', '$2y$10$RuLQzH/3fwN0T/gLHH2AQuRvp4YK2CLyw83G/QHkPpJRRb3hh/Qwa', '27269', 'RPL', 'XI RPL 1', NULL, 1, 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
