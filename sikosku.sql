-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 04:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikosku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `USERNAME_ADMIN` varchar(100) DEFAULT NULL,
  `PASSWORD_ADMIN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME_ADMIN`, `PASSWORD_ADMIN`) VALUES
(1, 'cready2000', '$2y$10$RD4XUL3QYSVH/6lpN12n6OM/n59ld61MrG4Epu.oC7A6U6xo66lHa');

-- --------------------------------------------------------

--
-- Table structure for table `data_kamar`
--

CREATE TABLE `data_kamar` (
  `ID_KAMAR` int(11) NOT NULL,
  `ID_KOS` int(11) DEFAULT NULL,
  `TIPE_KAMAR` varchar(15) DEFAULT NULL,
  `NAMA_KAMAR` varchar(50) DEFAULT NULL,
  `FASILITAS_KAMAR` text DEFAULT NULL,
  `STOK_KAMAR` varchar(15) DEFAULT NULL,
  `HARGA_KAMAR` decimal(10,0) DEFAULT NULL,
  `LINK_VIDEO_KAMAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kamar`
--

INSERT INTO `data_kamar` (`ID_KAMAR`, `ID_KOS`, `TIPE_KAMAR`, `NAMA_KAMAR`, `FASILITAS_KAMAR`, `STOK_KAMAR`, `HARGA_KAMAR`, `LINK_VIDEO_KAMAR`) VALUES
(1, 1, 'Sendiri', 'Kamar Dalam', 'Luas Kamar 3 x 3 meter, Kasur Lantai, Bantal, Lemari, dan Meja', '11', '700000', 'https://www.youtube.com/embed/6lM-vFAxTyg'),
(2, 1, 'Berdua', 'Kamar Luar', 'Luas Kamar 3 x 3 meter, Kasur (Semi Spring Bed), Bantal, Lemari, dan Meja', '30', '900000', 'https://www.youtube.com/embed/4oIKtfiRP-Q'),
(3, 2, 'Sendiri', 'Kamar Non AC', 'Kasur dan Lemari', '25', '750000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_kos`
--

CREATE TABLE `data_kos` (
  `ID_KOS` int(11) NOT NULL,
  `ID_WILAYAH` int(11) DEFAULT NULL,
  `ID_RADIUS` int(11) DEFAULT NULL,
  `ID_PEMILIK_KOS` int(11) DEFAULT NULL,
  `NAMA_KOS` varchar(50) DEFAULT NULL,
  `ALAMAT_KOS` varchar(100) DEFAULT NULL,
  `JUMLAH_KAMAR_KOS` int(11) DEFAULT NULL,
  `FASILITAS_KOS` text DEFAULT NULL,
  `TELEPON_KOS` varchar(15) DEFAULT NULL,
  `GENDER_KOS` varchar(15) DEFAULT NULL,
  `LONGITUDE_KOS` double DEFAULT NULL,
  `LATITUDE_KOS` double DEFAULT NULL,
  `DURASI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kos`
--

INSERT INTO `data_kos` (`ID_KOS`, `ID_WILAYAH`, `ID_RADIUS`, `ID_PEMILIK_KOS`, `NAMA_KOS`, `ALAMAT_KOS`, `JUMLAH_KAMAR_KOS`, `FASILITAS_KOS`, `TELEPON_KOS`, `GENDER_KOS`, `LONGITUDE_KOS`, `LATITUDE_KOS`, `DURASI`) VALUES
(1, 2, 1, 1, 'Kost HK', 'Jl. Rungkut Asri RK V No.20, Surabaya', 43, 'Free Wifi, Listrik, dan PDAM', '081218817995', 'Campur', 112.78843939304352, -7.330826567705244, '1 Bulan'),
(2, 1, 2, 2, 'Kos Mahasiswa Depan Stie Yapan', 'Perumahan IKIP Gunung Anyar Blok A-25, Surabaya', 25, 'Free Wifi, Listrik, dan PDAM', '087854943868', 'Pria', 112.78289526700974, -7.33247328074406, '1 Bulan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kamar_penyewa`
--

CREATE TABLE `detail_kamar_penyewa` (
  `ID_DETAIL` int(11) NOT NULL,
  `ID_KAMAR` int(11) NOT NULL,
  `ID_PENYEWA` int(11) NOT NULL,
  `ID_PEMESANAN` int(11) NOT NULL,
  `TANGGAL_MENEMPATI` date DEFAULT NULL,
  `TANGGAL_KELUAR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_kamar_penyewa`
--

INSERT INTO `detail_kamar_penyewa` (`ID_DETAIL`, `ID_KAMAR`, `ID_PENYEWA`, `ID_PEMESANAN`, `TANGGAL_MENEMPATI`, `TANGGAL_KELUAR`) VALUES
(5, 1, 1, 3, NULL, NULL),
(7, 1, 1, 5, NULL, NULL),
(4, 2, 1, 2, '2022-10-11', '2022-10-12'),
(6, 2, 1, 4, NULL, NULL),
(1, 1, 3, 1, '2022-09-26', '2022-10-26'),
(2, 1, 3, 1, '2022-10-26', '2022-11-26'),
(3, 1, 3, 1, '2022-11-26', '2022-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_kamar`
--

CREATE TABLE `gambar_kamar` (
  `ID_GAMBAR_KAMAR` int(11) NOT NULL,
  `ID_KAMAR` int(11) DEFAULT NULL,
  `FILE_GAMBAR_KAMAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar_kamar`
--

INSERT INTO `gambar_kamar` (`ID_GAMBAR_KAMAR`, `ID_KAMAR`, `FILE_GAMBAR_KAMAR`) VALUES
(1, 1, '1663443155_2e64969cf23d6f5d7728.jpg'),
(2, 1, '1663443155_a0622220f926f2dded7d.jpg'),
(3, 2, '1663443166_b3b19093752f8c8a071f.jpg'),
(4, 2, '1663443166_630541b8e983c9bec872.jpg'),
(5, 2, '1663443166_2e56429164cff079575c.jpg'),
(6, 2, '1663443166_8007cd608eba3a4ca39f.jpg'),
(7, 3, '1663443207_41ca6e6fbb176cc69f41.jpg'),
(8, 3, '1663443207_b58e62c97557561c8afc.jpg'),
(9, 3, '1663443207_40a91ebf3b5d96dd73c6.jpg'),
(10, 3, '1663443207_942592348021bb46c65a.jpg'),
(11, 3, '1663443207_f8518fef61d94e646c20.jpg'),
(12, 3, '1663443207_03000bb72d39e6979b88.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_kos`
--

CREATE TABLE `gambar_kos` (
  `ID_GAMBAR_KOS` int(11) NOT NULL,
  `ID_KOS` int(11) DEFAULT NULL,
  `FILE_GAMBAR_KOS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar_kos`
--

INSERT INTO `gambar_kos` (`ID_GAMBAR_KOS`, `ID_KOS`, `FILE_GAMBAR_KOS`) VALUES
(1, 1, '1663170598_d3aa542ff546dce68bf5.jpg'),
(2, 2, '1663171032_f00f39878aa95388d7b6.png');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id_otp` int(11) NOT NULL,
  `kode_otp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id_otp`, `kode_otp`, `email`) VALUES
(1, '605347', '18082010031@student.upnjatim.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `ID_SALDO` int(11) DEFAULT NULL,
  `ID_PENYEWA` int(11) DEFAULT NULL,
  `ID_PEMESANAN` int(11) DEFAULT NULL,
  `NO_REKENING_PENYEWA` varchar(15) DEFAULT NULL,
  `NAMA_REKENING_PENYEWA` varchar(100) DEFAULT NULL,
  `BANK_PENYEWA` varchar(50) DEFAULT NULL,
  `METODE_PEMBAYARAN` varchar(50) DEFAULT NULL,
  `JUMLAH_PEMBAYARAN` decimal(10,0) DEFAULT NULL,
  `TANGGAL_PEMBAYARAN` date DEFAULT NULL,
  `BUKTI_PEMBAYARAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_PEMBAYARAN`, `ID_ADMIN`, `ID_SALDO`, `ID_PENYEWA`, `ID_PEMESANAN`, `NO_REKENING_PENYEWA`, `NAMA_REKENING_PENYEWA`, `BANK_PENYEWA`, `METODE_PEMBAYARAN`, `JUMLAH_PEMBAYARAN`, `TANGGAL_PEMBAYARAN`, `BUKTI_PEMBAYARAN`) VALUES
(1, 1, 1, 3, 1, '12345678910', 'Cready', 'BCA', 'M-Banking', '700000', '2022-09-19', '1663570562_3d4ab3f26095633dec13.png'),
(2, NULL, NULL, 3, 1, '-', '-', '-', 'Tunai', NULL, '2022-10-26', '1663619410_a5a6a759992ed02b265a.jpg'),
(3, NULL, NULL, 3, 1, '-', '-', '-', 'Tunai', NULL, '2022-11-26', '1663619434_5078d0053c84d1850ff8.jpg'),
(4, 1, 1, 1, 2, '1112131415', 'Ni Putu Intan Komaladewi', 'BCA', 'M-Banking', '900000', '2022-10-10', '1665393751_b111bb031793ccf879ba.png');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` int(11) NOT NULL,
  `ID_PENYEWA` int(11) NOT NULL,
  `ID_KOS` int(11) DEFAULT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `TANGGAL_INPUT` date DEFAULT NULL,
  `TANGGAL_PEMESANAN` date DEFAULT NULL,
  `TOTAL_PEMESANAN` decimal(10,0) DEFAULT NULL,
  `STATUS_PEMESANAN` varchar(50) DEFAULT NULL,
  `STATUS_PENYEWA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PEMESANAN`, `ID_PENYEWA`, `ID_KOS`, `ID_ADMIN`, `TANGGAL_INPUT`, `TANGGAL_PEMESANAN`, `TOTAL_PEMESANAN`, `STATUS_PEMESANAN`, `STATUS_PENYEWA`) VALUES
(2, 1, 1, 1, '2022-10-10', '2022-10-11', '900000', 'Sudah Membayar', 'Bulan Pertama'),
(3, 1, 1, NULL, '2022-12-20', '2022-12-20', '700000', 'Belum Membayar', NULL),
(4, 1, 1, NULL, '2022-12-21', '2022-12-21', '900000', 'Belum Membayar', NULL),
(5, 1, 1, NULL, '2023-01-02', '2023-01-02', '700000', 'Belum Membayar', NULL),
(1, 3, 1, 1, '2022-09-19', '2022-09-26', '700000', 'Sudah Membayar', 'Lanjut');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kos`
--

CREATE TABLE `pemilik_kos` (
  `ID_PEMILIK_KOS` int(11) NOT NULL,
  `ID_SALDO` int(11) DEFAULT NULL,
  `NIK_PEMILIK_KOS` varchar(16) DEFAULT NULL,
  `NAMA_PEMILIK_KOS` varchar(100) DEFAULT NULL,
  `NO_TELEPON_PEMILIK_KOS` varchar(15) DEFAULT NULL,
  `EMAIL_PEMILIK_KOS` varchar(100) DEFAULT NULL,
  `PASSWORD_PEMILIK_KOS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemilik_kos`
--

INSERT INTO `pemilik_kos` (`ID_PEMILIK_KOS`, `ID_SALDO`, `NIK_PEMILIK_KOS`, `NAMA_PEMILIK_KOS`, `NO_TELEPON_PEMILIK_KOS`, `EMAIL_PEMILIK_KOS`, `PASSWORD_PEMILIK_KOS`) VALUES
(1, 1, '1234567898765432', 'Evni', '081218817995', 'evni@gmail.com', '$2y$10$76yDZ5oin.EKUS3AusWjgO3j3KUHIN0G69j84aUmWcJweVP1pjJFq'),
(2, 2, '9876543212345678', 'Safi\'i', '087854943868', 'safii@gmail.com', '$2y$10$6sJWvJrdjYmr3HR9HyG2xuhjnyZ0vUJmW1WjriPXpcTjlgB86lGo2');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_saldo`
--

CREATE TABLE `pengajuan_saldo` (
  `ID_PENGAJUAN_SALDO` int(11) NOT NULL,
  `ID_SALDO` int(11) DEFAULT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `ID_PEMILIK_KOS` int(11) DEFAULT NULL,
  `NO_REKENING_PEMILIK_KOS` varchar(15) DEFAULT NULL,
  `NAMA_REKENING_PEMILIK_KOS` varchar(100) DEFAULT NULL,
  `BANK_PEMILIK_KOS` varchar(50) DEFAULT NULL,
  `JUMLAH_PENARIKAN` decimal(10,0) DEFAULT NULL,
  `TANGGAL_PENARIKAN` date DEFAULT NULL,
  `TANGGAL_KONFIRMASI` date DEFAULT NULL,
  `BUKTI_TRANSFER` varchar(100) DEFAULT NULL,
  `STATUS_PENARIKAN_SALDO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_saldo`
--

INSERT INTO `pengajuan_saldo` (`ID_PENGAJUAN_SALDO`, `ID_SALDO`, `ID_ADMIN`, `ID_PEMILIK_KOS`, `NO_REKENING_PEMILIK_KOS`, `NAMA_REKENING_PEMILIK_KOS`, `BANK_PEMILIK_KOS`, `JUMLAH_PENARIKAN`, `TANGGAL_PENARIKAN`, `TANGGAL_KONFIRMASI`, `BUKTI_TRANSFER`, `STATUS_PENARIKAN_SALDO`) VALUES
(1, 1, 1, 1, '10987654321', 'Evni', 'BCA', '700000', '2022-09-20', '2022-09-20', '1663619729_fe0da782e6d7eca56f88.jpg', 'Selesai'),
(2, 1, 1, 1, '10987654321', 'Evni', 'BCA', '900000', '2022-10-10', '2022-10-10', '1665393997_4472a8558747da641285.jpg', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `ID_PENYEWA` int(11) NOT NULL,
  `NIK_PENYEWA` varchar(16) DEFAULT NULL,
  `NAMA_PENYEWA` varchar(100) DEFAULT NULL,
  `ALAMAT_PENYEWA` varchar(100) DEFAULT NULL,
  `NO_TELEPON_PENYEWA` varchar(15) DEFAULT NULL,
  `JENIS_KELAMIN_PENYEWA` varchar(15) DEFAULT NULL,
  `KTP_PENYEWA` varchar(100) DEFAULT NULL,
  `EMAIL_PENYEWA` varchar(100) DEFAULT NULL,
  `PASSWORD_PENYEWA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`ID_PENYEWA`, `NIK_PENYEWA`, `NAMA_PENYEWA`, `ALAMAT_PENYEWA`, `NO_TELEPON_PENYEWA`, `JENIS_KELAMIN_PENYEWA`, `KTP_PENYEWA`, `EMAIL_PENYEWA`, `PASSWORD_PENYEWA`) VALUES
(1, '5171015706020001', 'Ni Putu Intan Komaladewi', 'Jl. Buana Kartika No.29, Denpasar Barat', '081338569027', 'Wanita', '1663169079_726c327c416c0946a01b.jpg', 'intankomaladewi17@gmail.com', '$2y$10$M.KwqPc6MvCjoXRfX6Rzg.Uy5LItkfPsuAwGF.HEOZkgmbIpQ2Kre'),
(2, '8765432112345678', 'Rivaldo Hadi Winata', 'Jl. Mojokerto', '085105991200', 'Pria', '1663169162_fda3e829ac52252fb314.jpg', 'rivaldohadiwinata@gmail.com', '$2y$10$uu50OW91SGPdmHSLO.Kp3OwDd2syw2zUQrlYjvwsmCdF3M5P1gb6i'),
(3, '3578251703000003', 'Cready', 'Jl. Medokan Asri Utara V/12, Surabaya', '082230013246', 'Pria', '1663570400_941fee21f5f51006e9c1.jpg', 'creadycelgie03@gmail.com', '$2y$10$freV9woxAKGJF0c1W5PqLO3uwDq/AK3naK/fhp1QoGRCIdDmtgwXS');

-- --------------------------------------------------------

--
-- Table structure for table `radius`
--

CREATE TABLE `radius` (
  `ID_RADIUS` int(11) NOT NULL,
  `JARAK_RADIUS` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `radius`
--

INSERT INTO `radius` (`ID_RADIUS`, `JARAK_RADIUS`) VALUES
(1, '100 Meter'),
(2, '500 Meter');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `ID_SALDO` int(11) NOT NULL,
  `ID_PEMILIK_KOS` int(11) DEFAULT NULL,
  `JUMLAH_SALDO` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`ID_SALDO`, `ID_PEMILIK_KOS`, `JUMLAH_SALDO`) VALUES
(1, 1, '0'),
(2, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `ID_WILAYAH` int(11) NOT NULL,
  `NAMA_WILAYAH` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`ID_WILAYAH`, `NAMA_WILAYAH`) VALUES
(1, 'Gunung Anyar'),
(2, 'Medokan Ayu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `data_kamar`
--
ALTER TABLE `data_kamar`
  ADD PRIMARY KEY (`ID_KAMAR`),
  ADD KEY `ID_KOS` (`ID_KOS`);

--
-- Indexes for table `data_kos`
--
ALTER TABLE `data_kos`
  ADD PRIMARY KEY (`ID_KOS`),
  ADD KEY `ID_WILAYAH` (`ID_WILAYAH`),
  ADD KEY `ID_WILAYAH_2` (`ID_WILAYAH`),
  ADD KEY `ID_RADIUS` (`ID_RADIUS`),
  ADD KEY `ID_PEMILIK_KOS` (`ID_PEMILIK_KOS`);

--
-- Indexes for table `detail_kamar_penyewa`
--
ALTER TABLE `detail_kamar_penyewa`
  ADD PRIMARY KEY (`ID_PENYEWA`,`ID_KAMAR`,`ID_PEMESANAN`,`ID_DETAIL`);

--
-- Indexes for table `gambar_kamar`
--
ALTER TABLE `gambar_kamar`
  ADD PRIMARY KEY (`ID_GAMBAR_KAMAR`),
  ADD KEY `ID_KAMAR` (`ID_KAMAR`);

--
-- Indexes for table `gambar_kos`
--
ALTER TABLE `gambar_kos`
  ADD PRIMARY KEY (`ID_GAMBAR_KOS`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id_otp`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `ID_ADMIN` (`ID_ADMIN`),
  ADD KEY `ID_SALDO` (`ID_SALDO`),
  ADD KEY `ID_PENYEWA` (`ID_PENYEWA`),
  ADD KEY `ID_PEMESANAN` (`ID_PEMESANAN`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PENYEWA`,`ID_PEMESANAN`),
  ADD KEY `ID_KOS` (`ID_KOS`),
  ADD KEY `ID_ADMIN` (`ID_ADMIN`);

--
-- Indexes for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD PRIMARY KEY (`ID_PEMILIK_KOS`),
  ADD KEY `ID_SALDO` (`ID_SALDO`);

--
-- Indexes for table `pengajuan_saldo`
--
ALTER TABLE `pengajuan_saldo`
  ADD PRIMARY KEY (`ID_PENGAJUAN_SALDO`),
  ADD KEY `ID_ADMIN` (`ID_ADMIN`),
  ADD KEY `ID_SALDO` (`ID_SALDO`),
  ADD KEY `ID_PEMILIK_KOS` (`ID_PEMILIK_KOS`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`ID_PENYEWA`);

--
-- Indexes for table `radius`
--
ALTER TABLE `radius`
  ADD PRIMARY KEY (`ID_RADIUS`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`ID_SALDO`),
  ADD KEY `ID_PEMILIK_KOS` (`ID_PEMILIK_KOS`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`ID_WILAYAH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_kamar`
--
ALTER TABLE `data_kamar`
  MODIFY `ID_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_kos`
--
ALTER TABLE `data_kos`
  MODIFY `ID_KOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gambar_kamar`
--
ALTER TABLE `gambar_kamar`
  MODIFY `ID_GAMBAR_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gambar_kos`
--
ALTER TABLE `gambar_kos`
  MODIFY `ID_GAMBAR_KOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id_otp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  MODIFY `ID_PEMILIK_KOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan_saldo`
--
ALTER TABLE `pengajuan_saldo`
  MODIFY `ID_PENGAJUAN_SALDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `ID_PENYEWA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `radius`
--
ALTER TABLE `radius`
  MODIFY `ID_RADIUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `ID_SALDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `ID_WILAYAH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
