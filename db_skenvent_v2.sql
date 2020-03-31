-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 03:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skenvent_v2`
--
CREATE DATABASE IF NOT EXISTS `db_skenvent_v2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_skenvent_v2`;

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
('u-272505e65a714021e0', 'i putu dwi payana', 'ini.dwiii@gmail.com', 'Dwi Payana', '$2y$10$twdksXsUkUkAhef16vVDe.1To.WrWWBexplxuJuT3A1ZEvzs6w4Je', '27250', 'RPL', 'XI RPL 1', NULL, 1, 'default.jpg'),
('u-272585e82804a983df', 'saomi novelia gunawan', 'saominvl@gmail.com', 'Novelia Gunawan', '$2y$10$M30ljdL8EInPFUSw1g6f5.XAfxh0pV2Xvn8TUStQeYB9/egw0t1IC', '27258', 'RPL', 'XI RPL 1', NULL, 1, 'default.jpg'),
('u-272695e827e740e4e5', 'wishnu ahmad syahputra', 'wishnuahmad@gmail.com', 'Ahmad Syahputra', '$2y$10$RuLQzH/3fwN0T/gLHH2AQuRvp4YK2CLyw83G/QHkPpJRRb3hh/Qwa', '27269', 'RPL', 'XI RPL 1', NULL, 1, 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
