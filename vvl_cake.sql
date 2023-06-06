-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 06:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vvl_cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk_kami`
--

CREATE TABLE `produk_kami` (
  `id_produkkami` int(10) NOT NULL,
  `gambar_pk` varchar(255) NOT NULL,
  `judul_pk` varchar(80) NOT NULL,
  `deskripsi_pk` varchar(255) NOT NULL,
  `kustomisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_kami`
--

INSERT INTO `produk_kami` (`id_produkkami`, `gambar_pk`, `judul_pk`, `deskripsi_pk`, `kustomisasi`) VALUES
(36, '9f55f369967836fc270f5afe0e78ed6e.jpg', 'Kue Ulang Tahun', 'Kue untuk orang-orang yang berulang tahun, dibalut dengan hiasan keren dengan tema yang disesuaikan. ', 'Warna, Isian, Ukuran, Rasa, Tema'),
(37, '27f0e26a30fb625270af28e4b5376712.jpg', 'Kue Kering', 'Kue dan snack manis yang dapat menemani hari-harimu dalam segala kegiatan agar tetap bahagia dan semangat.', 'Isian, Ukuran, Rasa'),
(38, 'f078881af11e7a2b23081ec8de24f473.jpg', 'Dessert', 'Kue yang dilapisi coklat bertaburi manisnya ceres coklat, dipadukan dengan saus coklat asli yang manis.', 'Warna, Isian, Rasa, Tema'),
(39, '3a9bd0f468d43452dfb39c8679b4bc48.jpg', 'Kue Basah', 'Kue basah seperti bolu kukus atau lapis legit memiliki kelembutan yang menggoda di setiap gigitannya, sementara brownies menghadirkan rasa kaya dan beraroma cokelat yang lezat.', 'Isian, Rasa');

-- --------------------------------------------------------

--
-- Table structure for table `produk_laris`
--

CREATE TABLE `produk_laris` (
  `id_produklaris` int(10) NOT NULL,
  `gambar_pl` varchar(255) NOT NULL,
  `judul_pl` varchar(255) NOT NULL,
  `harga_pl` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `idt` int(11) NOT NULL,
  `imgp` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `idt`, `imgp`, `name`, `email`, `password`) VALUES
(22, 1, '7ef9957c8fb40ad968de7f94c97aa1e0.jpg', 'Hendrik Krisma', 'hendrik@gmail.com', '202cb962ac59075b964b07152d234b70'),
(49, 1, 'df870afda63964e7f8e3a7c4988cf290.jpg', 'Cristina', 'cris@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `idt` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`idt`, `type`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk_kami`
--
ALTER TABLE `produk_kami`
  ADD PRIMARY KEY (`id_produkkami`);

--
-- Indexes for table `produk_laris`
--
ALTER TABLE `produk_laris`
  ADD PRIMARY KEY (`id_produklaris`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`idt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk_kami`
--
ALTER TABLE `produk_kami`
  MODIFY `id_produkkami` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `produk_laris`
--
ALTER TABLE `produk_laris`
  MODIFY `id_produklaris` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `idt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
