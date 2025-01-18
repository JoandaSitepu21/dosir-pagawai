-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 11:49 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_dosir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text,
  `inbox_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` int(11) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_nama`, `inbox_email`, `inbox_kontak`, `inbox_pesan`, `inbox_tanggal`, `inbox_status`) VALUES
(2, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ping !', '2017-06-21 03:44:12', 1),
(3, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ini adalah pesan ', '2017-06-21 03:45:57', 1),
(5, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ping !', '2017-06-21 03:53:19', 1),
(7, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Hi, there!', '2017-07-01 07:28:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepegawaian`
--

CREATE TABLE `tbl_kepegawaian` (
  `kepegawaian_id` int(11) NOT NULL,
  `kepegawaian_nip` varchar(225) NOT NULL,
  `kepegawaian_nrp` varchar(225) NOT NULL,
  `kepegawaian_jabatan` varchar(225) NOT NULL,
  `kepegawaian_pangkat` varchar(225) NOT NULL,
  `kepegawaian_tempatlahir` varchar(225) NOT NULL,
  `kepegawaian_tanggallahir` varchar(225) NOT NULL,
  `kepegawaian_nama` varchar(225) NOT NULL,
  `kepegawaian_agama` varchar(225) NOT NULL,
  `kepegawaian_jk` varchar(225) NOT NULL,
  `kepegawaian_goldarah` varchar(225) NOT NULL,
  `kepegawaian_alamat` varchar(500) NOT NULL,
  `kepegawaian_notelp` varchar(225) NOT NULL,
  `kepegawaian_email` varchar(225) NOT NULL,
  `kepegawaian_unitkerja` varchar(225) NOT NULL,
  `kepegawaian_foto` varchar(225) NOT NULL,
  `kepegawaian_author` varchar(100) NOT NULL,
  `kepegawaian_tanngal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kepegawaian`
--

INSERT INTO `tbl_kepegawaian` (`kepegawaian_id`, `kepegawaian_nip`, `kepegawaian_nrp`, `kepegawaian_jabatan`, `kepegawaian_pangkat`, `kepegawaian_tempatlahir`, `kepegawaian_tanggallahir`, `kepegawaian_nama`, `kepegawaian_agama`, `kepegawaian_jk`, `kepegawaian_goldarah`, `kepegawaian_alamat`, `kepegawaian_notelp`, `kepegawaian_email`, `kepegawaian_unitkerja`, `kepegawaian_foto`, `kepegawaian_author`, `kepegawaian_tanngal`) VALUES
(66, '111222', '110293', 'IT Staff', 'IIID', 'Medan', '11 Januari 1994', 'Joanda Fernando Sitepu', 'Protestan', 'Laki-Laki', 'O', 'Merauke', '082296160713', 'joandafernando19@gmail.com', 'Tindak Pidana Khusus', '081874fb5e4a16714839e3f6607b275a.jpg', '', '2022-02-24 07:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapdua`
--

CREATE TABLE `tbl_mapdua` (
  `mapdua_id` int(11) NOT NULL,
  `mapdua_pegawai_id` int(11) NOT NULL,
  `mapdua_namaberkas` varchar(225) NOT NULL,
  `mapdua_tanggalberkas` varchar(225) NOT NULL,
  `mapdua_fileberkas` varchar(225) NOT NULL,
  `mapdua_author` varchar(225) NOT NULL,
  `mapdua_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapdua`
--

INSERT INTO `tbl_mapdua` (`mapdua_id`, `mapdua_pegawai_id`, `mapdua_namaberkas`, `mapdua_tanggalberkas`, `mapdua_fileberkas`, `mapdua_author`, `mapdua_tanggal`) VALUES
(1, 62, 'SK CPNS', '22 Januari 2022', '4f49c505b19b3373122cb560b858e583.docx', '', '2022-02-22 06:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapempat`
--

CREATE TABLE `tbl_mapempat` (
  `mapempat_id` int(11) NOT NULL,
  `mapempat_pegawai_id` int(11) NOT NULL,
  `mapempat_namaberkas` varchar(225) NOT NULL,
  `mapempat_tanggalberkas` varchar(225) NOT NULL,
  `mapempat_fileberkas` varchar(225) NOT NULL,
  `mapempat_author` varchar(225) NOT NULL,
  `mapempat_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maplima`
--

CREATE TABLE `tbl_maplima` (
  `maplima_id` int(11) NOT NULL,
  `maplima_pegawai_id` int(11) NOT NULL,
  `maplima_namaberkas` varchar(225) NOT NULL,
  `maplima_tanggalberkas` varchar(225) NOT NULL,
  `maplima_fileberkas` varchar(225) NOT NULL,
  `maplima_author` varchar(225) NOT NULL,
  `maplima_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapsatu`
--

CREATE TABLE `tbl_mapsatu` (
  `mapsatu_id` int(11) NOT NULL,
  `mapsatu_pegawai_id` int(11) NOT NULL,
  `mapsatu_namaberkas` varchar(225) NOT NULL,
  `mapsatu_tanggalberkas` varchar(225) NOT NULL,
  `mapsatu_fileberkas` varchar(225) NOT NULL,
  `mapsatu_author` varchar(225) NOT NULL,
  `mapsatu_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maptiga`
--

CREATE TABLE `tbl_maptiga` (
  `maptiga_id` int(11) NOT NULL,
  `maptiga_pegawai_id` int(11) NOT NULL,
  `maptiga_namaberkas` varchar(225) NOT NULL,
  `maptiga_tanggalberkas` varchar(225) NOT NULL,
  `maptiga_fileberkas` varchar(225) NOT NULL,
  `maptiga_author` varchar(225) NOT NULL,
  `maptiga_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_moto` varchar(100) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_tentang` text,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_facebook` varchar(35) DEFAULT NULL,
  `pengguna_twitter` varchar(35) DEFAULT NULL,
  `pengguna_linkdin` varchar(35) DEFAULT NULL,
  `pengguna_google_plus` varchar(35) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT '1',
  `pengguna_level` varchar(3) DEFAULT NULL,
  `pengguna_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_moto`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_tentang`, `pengguna_email`, `pengguna_nohp`, `pengguna_facebook`, `pengguna_twitter`, `pengguna_linkdin`, `pengguna_google_plus`, `pengguna_status`, `pengguna_level`, `pengguna_register`, `pengguna_photo`) VALUES
(5, 'Kurotama', NULL, 'L', 'kuro', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'kurotama888@gmail.com', '082296160713', NULL, NULL, NULL, NULL, 1, '1', '2022-02-24 03:43:59', '292bd29235f9060ff7ea614da76115a8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `tbl_kepegawaian`
--
ALTER TABLE `tbl_kepegawaian`
  ADD PRIMARY KEY (`kepegawaian_id`);

--
-- Indexes for table `tbl_mapdua`
--
ALTER TABLE `tbl_mapdua`
  ADD PRIMARY KEY (`mapdua_id`);

--
-- Indexes for table `tbl_mapempat`
--
ALTER TABLE `tbl_mapempat`
  ADD PRIMARY KEY (`mapempat_id`);

--
-- Indexes for table `tbl_maplima`
--
ALTER TABLE `tbl_maplima`
  ADD PRIMARY KEY (`maplima_id`);

--
-- Indexes for table `tbl_mapsatu`
--
ALTER TABLE `tbl_mapsatu`
  ADD PRIMARY KEY (`mapsatu_id`);

--
-- Indexes for table `tbl_maptiga`
--
ALTER TABLE `tbl_maptiga`
  ADD PRIMARY KEY (`maptiga_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kepegawaian`
--
ALTER TABLE `tbl_kepegawaian`
  MODIFY `kepegawaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_mapdua`
--
ALTER TABLE `tbl_mapdua`
  MODIFY `mapdua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mapempat`
--
ALTER TABLE `tbl_mapempat`
  MODIFY `mapempat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_maplima`
--
ALTER TABLE `tbl_maplima`
  MODIFY `maplima_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mapsatu`
--
ALTER TABLE `tbl_mapsatu`
  MODIFY `mapsatu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_maptiga`
--
ALTER TABLE `tbl_maptiga`
  MODIFY `maptiga_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
