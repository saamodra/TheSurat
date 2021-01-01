-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 05:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `bagian_id` int(11) NOT NULL,
  `bagian` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`bagian_id`, `bagian`, `keterangan`) VALUES
(2, 'Personalia', 'Personalia'),
(3, 'Sekretaris', 'Sekretaris'),
(4, 'Admin', 'Admin'),
(5, 'Keamanan', 'Keamanan'),
(28, 'Keuangan', 'Keuangan'),
(29, 'Teknik Informatika', 'Teknik Informartika');

-- --------------------------------------------------------

--
-- Table structure for table `block_ip`
--

CREATE TABLE `block_ip` (
  `blockip_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block_ip`
--

INSERT INTO `block_ip` (`blockip_id`, `ip`, `keterangan`) VALUES
(44, '192.122.8.134', 'Lenovo'),
(45, '168.83.127.4', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` int(11) NOT NULL,
  `nama_identitas` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `pemilik` varchar(50) DEFAULT NULL,
  `keuangan` varchar(50) DEFAULT NULL,
  `logo_kiri` varchar(50) DEFAULT NULL,
  `logo_kanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`identitas_id`, `nama_identitas`, `alamat`, `kota`, `telp`, `website`, `pemilik`, `keuangan`, `logo_kiri`, `logo_kanan`) VALUES
(1, 'SMK Negeri 1 Jenangan', 'Jl. Niken Gandini No. 98, Setono, Jenangan', 'Ponorogo', '352481236', 'www.smkn1jenpo.sch.id', '-', 'Bank Aldana', 'logo.smk.jenangan.png', 'logo.smk.jenangan.png'),
(2, 'SMKN 1 Jenangan', 'Jl. Niken Gandini No. 98, Setono, Jenangan', 'Ponorogo', '0352481236', 'www.smkn1jenpo.sch.id', '-', '-', 'logo.smk.jenangan.png', 'logo.smk.jenangan.png');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `instansi_id` int(11) NOT NULL,
  `nama_instansi` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `kontak_person` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`instansi_id`, `nama_instansi`, `alamat`, `kota`, `telp`, `hp`, `email`, `website`, `kontak_person`) VALUES
(1, 'Antar Mitra Sembada (AMS)', 'Babadan', 'Ponorogo', '132819328098', '0832457238772', 'ams@gmail.com', '-', '-'),
(3, 'PT. Beras Bulog', 'Geger', 'Madiun', '3489589384', '320982304', 'bulog@gmail.com', 'bbulog.com', '-'),
(4, 'PT. Roma Biskuit', 'Dolopo', 'Madiun', '093294820', '329482843', 'roma@gmail.com', '-', '-'),
(5, 'PT. Telkom Madiun', 'Mlilir', 'Madiun', '038492384209384', '8392048209', 'telkomad@gmail.com', '-', '-'),
(6, 'Lenovo Indonesia', 'Unknown', 'Jakarta', '9842402943890', '809384902849', 'lenovoindo@lenovo.com', 'lenovo.com', '-'),
(7, 'SMKN 1 Jenangan', 'Jenangan', 'Ponorogo', '3247298347', '92387489274', 'smkn1jenpo@yahoo.com', 'smkn1jenpo.sch.id', '-'),
(9, 'PT. Unilever', 'Unknown', 'Unknown', '839183091', '7382947294', 'unilever@gmail.com1', '-', '-'),
(12, 'Test', 'Test', 'Test', '839182', '938912', 'test@gmail.com', 'test.com', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `jenis`, `keterangan`) VALUES
(1, 'Surat Dinas2', 'Surat Dinas2'),
(2, 'Surat Rahasia', 'Surat Rahasia'),
(3, 'Surat Pribadi', 'Surat Pribadi'),
(4, 'Surat Resmi', 'Surat Resmi');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `lokasi_id` int(11) NOT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`lokasi_id`, `lokasi`, `keterangan`) VALUES
(1, 'Rak-01', 'Atas'),
(2, 'Rak-01', 'Tengah'),
(3, 'Rak-01', 'Bawah'),
(5, 'Rak-02', 'Tengah'),
(7, 'Rak-03', 'Atas'),
(8, 'Rak2', 'Atas');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `surat_keluar_id` bigint(20) NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `bagian_id` int(11) DEFAULT NULL,
  `sifat` varchar(50) DEFAULT NULL,
  `perihal` varchar(100) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `nomor_agenda` varchar(100) DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT NULL,
  `disposisi` text DEFAULT NULL,
  `tembusan` varchar(255) DEFAULT NULL,
  `instansi_id` int(11) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `lokasi_id` int(11) DEFAULT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`surat_keluar_id`, `nomor_surat`, `bagian_id`, `sifat`, `perihal`, `tanggal_surat`, `tanggal_kirim`, `nomor_agenda`, `lampiran`, `disposisi`, `tembusan`, `instansi_id`, `jenis_id`, `lokasi_id`, `user_id`, `waktu`) VALUES
(7, '21371', 2, 'RAHASIA', 'jdkljasd', '2018-04-03', '2018-04-05', '12', 'Navbar.docx', 'ghghj', 'gjhgj', 3, 2, 3, 'admin', '2018-04-28 06:56:59'),
(8, '12', 2, 'SANGAT RAHASIA', 'Prihal', '2018-04-06', '2018-04-12', 'sadasd', 'Tabel (4).xls', 'hghgh', 'hggj', 6, 3, 7, 'admin', NULL),
(9, '23321', 4, 'KONFIDENSIAL', 'njnjnjnj', '2018-04-20', '2018-04-13', '990', 'Menu.docx', 'sasd', 'sadasd', 7, 4, 5, 'admin', '2018-04-27 18:29:43'),
(10, 'saddsa', 3, 'KONFIDENSIAL', 'sdsdsa', '2018-05-11', '2018-05-09', '231321', 'Data AP 1.xlsx', 'dasddsa', 'adssaddsa', 7, 3, 3, 'admin', NULL),
(11, '1223312', 4, 'KONFIDENSIAL', '-', '2018-05-17', '2018-05-11', '98', 'Data Bagian 11-01-46_14-05-2018.xls', '-', '-', 7, 2, 3, 'admin@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `surat_masuk_id` bigint(20) NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `bagian_id` int(11) DEFAULT NULL,
  `sifat` varchar(50) DEFAULT NULL,
  `perihal` varchar(100) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `tanggal_expired` date DEFAULT NULL,
  `nomor_agenda` varchar(100) DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT NULL,
  `disposisi` text DEFAULT NULL,
  `tembusan` varchar(255) DEFAULT NULL,
  `instansi_id` int(11) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `tindak_lanjut` varchar(255) DEFAULT NULL,
  `lokasi_id` int(11) DEFAULT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`surat_masuk_id`, `nomor_surat`, `bagian_id`, `sifat`, `perihal`, `tanggal_surat`, `tanggal_terima`, `tanggal_expired`, `nomor_agenda`, `lampiran`, `disposisi`, `tembusan`, `instansi_id`, `jenis_id`, `tindak_lanjut`, `lokasi_id`, `user_id`, `waktu`) VALUES
(15, '898913', 2, 'RAHASIA', 'jskhkash', '2018-04-03', '2018-04-11', '2018-04-13', '8989', '1.oxps', '-', '-', 1, 2, 'TIDAK PERLU TINDAK LANJUT', 1, 'admin', NULL),
(16, '1223', 2, 'RAHASIA', 'sda', '2018-04-05', '2018-04-06', '2018-04-13', '123', 'Menu.docx', 'asa', 'ghjgh', 3, 2, 'PERLU TINDAK LANJUT', 3, 'admin', '2018-04-28 03:46:18'),
(22, '789798', 5, 'BIASA', 'Keuangan', '2018-04-07', '2018-04-13', '2018-04-20', '21', 'surat lamaran.pdf', 'sadas', 'sahdkj', 6, 4, 'PERLU TINDAK LANJUT', 3, 'admin', '2018-05-02 11:54:45'),
(23, '23231', 3, 'KONFIDENSIAL', 'sdsda', '2018-05-12', '2018-05-19', '2018-05-24', '213231', 'CSVFILE.csv', 'dsadsa', 'dsadsa', 5, 2, 'TIDAK PERLU TINDAK LANJUT', 1, 'admin', NULL),
(24, '2319', 3, 'KONFIDENSIAL', 'Rapat', '2018-05-05', '2018-05-06', '2018-05-06', '212', 'Manual Book.docx', '-', '-', 3, 2, 'PERLU TINDAK LANJUT', 3, 'admin@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(200) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` enum('Admin','User') DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `level`, `nama`, `profil`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', ''),
('admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 'avatar5.png'),
('iankco46@gmail.com', '3edcdf9f179e44e582f70b096d23b6f9', 'User', 'Muh. Hardiansah', ''),
('muhammadadimas20@gmail.com', 'db087f8b9ebba7f63c2d565f9e192388', 'User', 'Adimas', ''),
('samodra30@gmail.com', 'b1b8b07ea903893c76ac805b9f34ba52', 'Admin', 'Samodra', ''),
('szsamodra@gmail.com', 'Shinigami12', 'Admin', 'Shinigami', ''),
('user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'User', 'avatar04.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`bagian_id`);

--
-- Indexes for table `block_ip`
--
ALTER TABLE `block_ip`
  ADD PRIMARY KEY (`blockip_id`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`instansi_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`surat_keluar_id`),
  ADD KEY `bagian` (`bagian_id`),
  ADD KEY `instansi` (`instansi_id`),
  ADD KEY `jenis` (`jenis_id`),
  ADD KEY `lokasi` (`lokasi_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`surat_masuk_id`),
  ADD KEY `bagian` (`bagian_id`),
  ADD KEY `instansi` (`instansi_id`),
  ADD KEY `jenis` (`jenis_id`),
  ADD KEY `lokasi` (`lokasi_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `bagian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `block_ip`
--
ALTER TABLE `block_ip`
  MODIFY `blockip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `instansi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `lokasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `surat_keluar_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `surat_masuk_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk1` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keluar_ibfk2` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`instansi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keluar_ibfk3` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keluar_ibfk4` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`lokasi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_keluar_ibfk5` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `bagian` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `instansi` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`instansi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jenis` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lokasi` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`lokasi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
