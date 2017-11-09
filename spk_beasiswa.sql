-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Nov 2017 pada 03.09
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_beasiswa`
--
CREATE DATABASE IF NOT EXISTS `spk_beasiswa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spk_beasiswa`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `NPM` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `No_HP` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NPM`, `Nama`, `Jenis_Kelamin`, `Alamat`, `No_HP`) VALUES
('123', 'TOMMY SUINDRA', 'Laki-laki', 'fadfsd', '2222'),
('12345', 'TOMMY SUINDRA', 'Laki-laki', 'dfsdf', '085266187958'),
('166666', 'qwr', 'Perempuan', 'sdfg', '45454'),
('222', 'TOMMY SUINDRA', 'Laki-laki', 'asdfsf', '085266187958'),
('346456456', 'werwer', 'Perempuan', 'werwer', '234234234'),
('555', 'wewe', 'Laki-laki', 'dsfsdfsdf', '333333'),
('5555', 'sdfsdfsdf', 'Laki-laki', 'sdfsdf', '56757'),
('58568', 'wewe', 'Laki-laki', 'qwrqw', '234234'),
('787878', 'ghfghg', 'Laki-laki', 'dsfsdf', '768678'),
('8888', 'wwdf', 'Perempuan', 'xcbvxcv', '666666'),
('888888', 'asfasdf', 'Laki-laki', 'asdfasdf', '234234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian` (
  `ID_Penilaian` int(11) NOT NULL,
  `NPM` varchar(20) NOT NULL,
  `IPK` double NOT NULL,
  `Penghasilan_Orangtua` int(15) NOT NULL,
  `Tanggungan_Orangtua` int(15) NOT NULL,
  `Jarak` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NPM`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`ID_Penilaian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `ID_Penilaian` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
