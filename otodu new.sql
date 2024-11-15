-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 04:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otodu`
--

-- --------------------------------------------------------

--
-- Table structure for table `bab`
--

CREATE TABLE `bab` (
  `kode_bab` int(11) NOT NULL,
  `nama_bab` varchar(100) DEFAULT NULL,
  `kode_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bab`
--

INSERT INTO `bab` (`kode_bab`, `nama_bab`, `kode_materi`) VALUES
(1, 'Fungsi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `beli_subtopik`
--

CREATE TABLE `beli_subtopik` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_subtopik` int(11) DEFAULT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beli_subtopik`
--

INSERT INTO `beli_subtopik` (`id_pembelian`, `id_user`, `kode_subtopik`, `tanggal_pembelian`) VALUES
(1, 1, 1, '2024-10-28 08:17:15'),
(2, 16, 2, '2024-11-04 15:44:36'),
(3, 16, 1, '2024-11-04 15:45:01'),
(4, 16, 3, '2024-11-04 15:47:07'),
(5, 16, 4, '2024-11-04 15:49:13'),
(6, 13, 2, '2024-11-04 16:06:12'),
(7, 13, 1, '2024-11-04 16:06:27'),
(8, 1, 2, '2024-11-10 17:46:36'),
(9, 1, 3, '2024-11-10 17:47:39'),
(10, 1, 4, '2024-11-10 17:52:58'),
(11, 1, 7, '2024-11-12 14:39:01'),
(12, 1, 11, '2024-11-12 14:39:19'),
(13, 10, 1, '2024-11-13 12:02:48'),
(14, 10, 2, '2024-11-13 12:09:40'),
(15, 10, 3, '2024-11-13 12:40:04'),
(16, 10, 4, '2024-11-13 13:12:11'),
(17, 10, 8, '2024-11-13 13:21:15'),
(18, 10, 5, '2024-11-13 13:45:25'),
(19, 10, 6, '2024-11-13 13:45:30'),
(20, 10, 10, '2024-11-13 13:47:14'),
(21, 10, 9, '2024-11-13 14:04:45'),
(22, 10, 7, '2024-11-13 14:05:18'),
(23, 10, 11, '2024-11-13 14:08:20'),
(24, 13, 3, '2024-11-13 14:28:21'),
(25, 13, 4, '2024-11-13 14:29:34'),
(26, 13, 5, '2024-11-13 14:29:51'),
(27, 13, 10, '2024-11-13 14:30:20'),
(28, 13, 8, '2024-11-13 14:30:52'),
(29, 13, 9, '2024-11-13 14:31:10'),
(30, 13, 6, '2024-11-14 03:24:29'),
(31, 13, 11, '2024-11-14 03:26:50'),
(32, 13, 7, '2024-11-14 03:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `isi_latihan`
--

CREATE TABLE `isi_latihan` (
  `kode_latihan` int(11) NOT NULL,
  `soal` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `opsi` text DEFAULT NULL,
  `gambar_url` varchar(255) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `kode_subtopik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `isi_latihan`
--

INSERT INTO `isi_latihan` (`kode_latihan`, `soal`, `jawaban`, `opsi`, `gambar_url`, `keterangan`, `kode_subtopik`) VALUES
(1, 'Fungsi dapat digunakan untuk memodelkan fenomena dan menyelesaikan ______', 'masalah', NULL, NULL, 'isian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `isi_subtopik`
--

CREATE TABLE `isi_subtopik` (
  `kode_isi_subtopik` int(11) NOT NULL,
  `nomor` int(10) NOT NULL,
  `materi` text DEFAULT NULL,
  `gambar_url` varchar(255) DEFAULT NULL,
  `soal` varchar(255) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `opsi` text DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `kode_subtopik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `isi_subtopik`
--

INSERT INTO `isi_subtopik` (`kode_isi_subtopik`, `nomor`, `materi`, `gambar_url`, `soal`, `jawaban`, `opsi`, `keterangan`, `kode_subtopik`) VALUES
(1, 1, 'Fungsi adalah suatu relasi atau aturan yang menghubungkan setiap elemen dari satu set (domain) dengan tepat satu elemen di set lain (kodomain). Dalam matematika, fungsi biasanya dinyatakan dalam bentuk f(x), di mana x adalah input dan f(x) adalah output. Fungsi dapat digunakan untuk memodelkan berbagai fenomena dan menyelesaikan masalah, baik dalam konteks matematika murni maupun aplikasi dalam ilmu komputer, di mana fungsi berfungsi sebagai blok kode yang melakukan tugas tertentu dengan menerima parameter dan mengembalikan hasil.', NULL, 'Dalam notasi matematis, fungsi biasanya dituliskan sebagai f(x), di mana x adalah input dan f(x) adalah ______', 'output', 'domain,output', 'lengkap', 1),
(3, 2, 'ini materi nomor 2', NULL, '', NULL, NULL, 'materi', 1),
(5, 3, NULL, NULL, 'x + 5 = 2, x?', '-3', '2,-3', 'pilgan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kode_materi` int(11) NOT NULL,
  `nama_materi` varchar(100) DEFAULT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kode_materi`, `nama_materi`, `jenjang`, `kelas`) VALUES
(1, 'Matematika', 'SMA', '11');

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `id_user` int(11) NOT NULL,
  `matematika` int(11) DEFAULT 0,
  `bahasa_inggris` int(11) DEFAULT 0,
  `daspro` int(11) DEFAULT 0,
  `utbk` int(11) DEFAULT 0,
  `total_poin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poin`
--

INSERT INTO `poin` (`id_user`, `matematika`, `bahasa_inggris`, `daspro`, `utbk`, `total_poin`) VALUES
(16, 150, 200, 200, 200, 750),
(10, 200, 150, 150, 0, 500),
(13, 100, 100, 150, 200, 550),
(1, 100, 100, 100, 100, 400);

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `kode_statistik` int(11) NOT NULL,
  `minggu_lalu` int(11) DEFAULT NULL,
  `minggu_ini` int(11) DEFAULT NULL,
  `topik_selesai` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`kode_statistik`, `minggu_lalu`, `minggu_ini`, `topik_selesai`, `id_user`) VALUES
(1, 12, 18, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subbab`
--

CREATE TABLE `subbab` (
  `kode_subbab` int(11) NOT NULL,
  `nama_subbab` varchar(100) DEFAULT NULL,
  `kode_bab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subbab`
--

INSERT INTO `subbab` (`kode_subbab`, `nama_subbab`, `kode_bab`) VALUES
(1, 'Pengantar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subtopik`
--

CREATE TABLE `subtopik` (
  `kode_subtopik` int(11) NOT NULL,
  `nama_subtopik` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT 0,
  `status_bayar` tinyint(1) DEFAULT 0,
  `kode_topik` int(11) NOT NULL,
  `keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subtopik`
--

INSERT INTO `subtopik` (`kode_subtopik`, `nama_subtopik`, `harga`, `status_bayar`, `kode_topik`, `keterangan`) VALUES
(1, 'Subtopik 1', 10, 1, 1, 'materi'),
(2, 'Subtopik 2', 10, 1, 1, 'tambahan'),
(3, 'Subtopik 3', 12, 1, 1, 'tambahan'),
(4, 'Latihan 1', 13, 1, 1, 'latihan'),
(5, 'Subtopik 1', 10, 0, 2, 'materi'),
(6, 'Subtopik 2', 15, 0, 2, 'materi'),
(7, 'Subtopik 3', 13, 0, 2, 'tambahan'),
(8, 'Latihan 1', 12, 0, 2, 'latihan'),
(9, 'Subtopik 1', 15, 0, 3, 'materi'),
(10, 'Subtopik 1', 13, 0, 3, 'tambahan'),
(11, 'Latihan 1', 12, 0, 3, 'latihan');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `kode_target` int(11) NOT NULL,
  `nama_target` varchar(50) DEFAULT NULL,
  `selesai` int(11) DEFAULT NULL,
  `dipelajari` int(11) DEFAULT NULL,
  `dikuasai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`kode_target`, `nama_target`, `selesai`, `dipelajari`, `dikuasai`) VALUES
(1, 'ambis', 27, 7, 5),
(2, 'normal', 23, 5, 3),
(3, 'santai', 20, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `kode_topik` int(11) NOT NULL,
  `nama_topik` varchar(100) DEFAULT NULL,
  `rangkuman` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `kode_subbab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`kode_topik`, `nama_topik`, `rangkuman`, `video_url`, `kode_subbab`) VALUES
(1, 'Apa itu Fungsi?', 'Fungsi adalah konsep fundamental dalam matematika dan pemrograman yang berfungsi untuk menghubungkan suatu input dengan output tertentu. Dalam matematika, fungsi dapat dianggap sebagai sebuah aturan atau hubungan yang mengambil satu atau lebih nilai (input) dan mengubahnya menjadi satu nilai (output). Misalnya, fungsi 𝑓(𝑥) = 2𝑥+3\r\nakan mengambil nilai 𝑥 dan menghasilkan nilai baru berdasarkan rumus tersebut.\r\n\r\nDalam konteks pemrograman, fungsi juga berperan penting sebagai blok kode yang dirancang untuk melaksanakan tugas tertentu. Fungsi dapat menerima argumen (input), melakukan perhitungan atau operasi tertentu, dan kemudian mengembalikan hasilnya (output). Penggunaan fungsi membantu dalam mengorganisir kode, mengurangi pengulangan, dan meningkatkan keterbacaan serta pemeliharaan program.\r\n\r\nSecara keseluruhan, fungsi adalah alat yang sangat berguna baik dalam matematika maupun pemrograman, memungkinkan kita untuk menyelesaikan masalah dengan cara yang terstruktur dan efisien.', './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1),
(2, 'Beda fungsi dan bukan fungsi', 'Dalam matematika, fungsi adalah hubungan antara dua himpunan di mana setiap elemen di himpunan pertama (domain) memiliki tepat satu pasangan elemen di himpunan kedua (kodomain). Artinya, setiap input menghasilkan satu output yang unik. Sebagai contoh, pada fungsi \ny=2x+1, setiap nilai x hanya menghasilkan satu nilai y. Sebaliknya, suatu hubungan dikatakan bukan fungsi jika ada setidaknya satu elemen di domain yang berpasangan dengan lebih dari satu elemen di kodomain. Misalnya, jika suatu relasi menghubungkan nilai \n1 dengan nilai 3 dan 4 sekaligus, maka hubungan ini bukan fungsi karena satu input memiliki beberapa output.', './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1),
(3, 'Notasi Fungsi', 'Notasi fungsi adalah cara menyatakan aturan yang menghubungkan elemen di satu himpunan (domain) dengan elemen di himpunan lain (kodomain) dalam bentuk (x)=y. Dalam notasi ini, f mewakili nama fungsi, x adalah elemen di domain (nilai input), dan y adalah elemen hasil di kodomain (nilai output). Penulisan f(x)=y berarti bahwa fungsi f memasangkan nilai x dari domain dengan satu nilai y di kodomain. Selain itu, notasi f:A→B menunjukkan bahwa fungsi f menghubungkan himpunan A (domain) ke himpunan B (kodomain). Notasi ini memudahkan pemahaman bahwa setiap elemen domain memiliki satu output unik di kodomain, yang menjadi ciri utama dari suatu fungsi.', './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `jumlah`, `biaya`, `keterangan`, `waktu`) VALUES
(1, 20, 10, 5000, 'Beli Paket Sehari', '2024-11-10 17:00:00'),
(2, 20, 10, 5000, 'Beli Paket Sehari', '2024-11-10 17:00:00'),
(3, 20, 2, 4000, 'Beli 2 Koin', '2024-11-10 17:00:00'),
(4, 20, 3, 6000, 'Beli 3 Koin', '2024-11-10 17:00:00'),
(5, 20, 1, 2000, 'Beli 1 Koin', '2024-11-10 17:00:00'),
(6, 20, 4, 8000, 'Beli 4 Koin', '2024-11-10 17:00:00'),
(7, 20, 50, 20000, 'Beli Paket 5 Hari', '2024-11-12 12:48:57'),
(8, 20, 2, 4000, 'Beli 2 Koin', '2024-11-12 12:55:40'),
(9, 1, 50, 20000, 'Beli Paket 5 Hari', '2024-11-13 04:41:34'),
(10, 10, 50, 20000, 'Beli Paket 5 Hari', '2024-11-13 12:02:32'),
(11, 13, 10, 20000, 'Beli 10 Koin', '2024-11-14 03:34:37'),
(12, 13, 4, 8000, 'Beli 4 Koin', '2024-11-14 03:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(20) DEFAULT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) DEFAULT NULL,
  `koin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `nomor`, `latitude`, `longitude`, `password`, `role`, `koin`) VALUES
(1, 'jazilasyukron12@gmail.com', 'Muhamamd Syukron', '89966677713', 3.56188160, 98.69393920, '$2y$10$9azZK1ny0.GW9iW0S.TPhOIfW8/LPfWG08Nl0alV/EOGruplaHKNy', 'admin', 90),
(10, 'adilafurqon21@gmail.com', 'tez', '08666777999', 3.57192172, 98.69133567, '$2y$10$A3FoUqx3Wq49yXX7xSHn7OCtod30EoVrN/m/aLTQ/vxVznDkO6HwG', 'Siswa', 10),
(13, 'syukron9a@gmail.com', 'Jonto Amgis', '0899888777', 3.57803962, 98.68850325, '$2y$10$vECUhEXrGeq0Yiv7MuP3zeug4mzPOryIq5/0NlRFiUeqX24V1.lNO', 'Siswa', 89),
(16, 'jazilasyukron21@gmail.com', 'Sigma Skibidi', '08997777666', 3.55057534, 98.69943422, '$2y$10$NpHawhm.LMBEJQ5PGaF5seHOfygrVtgvZ2kgK0L0ipcHslwHq0Lli', 'Siswa', 45),
(17, 'widianto@gmail.com', 'Akbar Widianto', '0811122223333', 3.57304501, 98.76194000, '$2y$10$F06wy4muaIhO8w27LV4cEOTwULjD4mEyJih5UYs6wWEPKq.dkuidG', 'Mentor', 0),
(18, 'budi@gmail.com', 'Budie Arie', '0866644446666', 3.56412867, 98.69537968, '$2y$10$PVKIzbuKfhcuZMDE/0BVbOYiXQxH1p5EKq02oDfGwJwPHB0Gfw8gm', 'Mentor', 0),
(19, 'eko@gmail.com', 'Eko Kurniawan', '089131136778', 3.55392007, 98.70346672, '$2y$10$Xkt2/fNI4FypMr6OxwOpp.mTz8GJyAVCQd5tg4TkFathPraqRXNpy', 'Mentor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_materi`
--

CREATE TABLE `user_materi` (
  `id_user` int(11) NOT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `minat` varchar(100) DEFAULT NULL,
  `kode_target` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_materi`
--

INSERT INTO `user_materi` (`id_user`, `jenjang`, `minat`, `kode_target`) VALUES
(1, 'SMA', 'Matematika', 1),
(13, 'SMP', 'UTBK', 1),
(10, 'SD', 'Matematika', 2),
(16, 'Lain-lain', 'daspro', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`kode_bab`),
  ADD KEY `kode_materi` (`kode_materi`);

--
-- Indexes for table `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indexes for table `isi_latihan`
--
ALTER TABLE `isi_latihan`
  ADD PRIMARY KEY (`kode_latihan`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indexes for table `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  ADD PRIMARY KEY (`kode_isi_subtopik`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`kode_statistik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `subbab`
--
ALTER TABLE `subbab`
  ADD PRIMARY KEY (`kode_subbab`),
  ADD KEY `kode_bab` (`kode_bab`);

--
-- Indexes for table `subtopik`
--
ALTER TABLE `subtopik`
  ADD PRIMARY KEY (`kode_subtopik`),
  ADD KEY `kode_topik` (`kode_topik`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`kode_target`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`kode_topik`),
  ADD KEY `kode_subbab` (`kode_subbab`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_materi`
--
ALTER TABLE `user_materi`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_target` (`kode_target`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bab`
--
ALTER TABLE `bab`
  MODIFY `kode_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `isi_latihan`
--
ALTER TABLE `isi_latihan`
  MODIFY `kode_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  MODIFY `kode_isi_subtopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `kode_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `kode_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subbab`
--
ALTER TABLE `subbab`
  MODIFY `kode_subbab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subtopik`
--
ALTER TABLE `subtopik`
  MODIFY `kode_subtopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `kode_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `kode_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bab`
--
ALTER TABLE `bab`
  ADD CONSTRAINT `bab_ibfk_1` FOREIGN KEY (`kode_materi`) REFERENCES `materi` (`kode_materi`);

--
-- Constraints for table `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  ADD CONSTRAINT `beli_subtopik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `beli_subtopik_ibfk_2` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Constraints for table `isi_latihan`
--
ALTER TABLE `isi_latihan`
  ADD CONSTRAINT `isi_latihan_ibfk_1` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Constraints for table `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  ADD CONSTRAINT `isi_subtopik_ibfk_1` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Constraints for table `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `subbab`
--
ALTER TABLE `subbab`
  ADD CONSTRAINT `subbab_ibfk_1` FOREIGN KEY (`kode_bab`) REFERENCES `bab` (`kode_bab`);

--
-- Constraints for table `subtopik`
--
ALTER TABLE `subtopik`
  ADD CONSTRAINT `subtopik_ibfk_1` FOREIGN KEY (`kode_topik`) REFERENCES `topik` (`kode_topik`);

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_ibfk_1` FOREIGN KEY (`kode_subbab`) REFERENCES `subbab` (`kode_subbab`);

--
-- Constraints for table `user_materi`
--
ALTER TABLE `user_materi`
  ADD CONSTRAINT `user_materi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_materi_ibfk_2` FOREIGN KEY (`kode_target`) REFERENCES `target` (`kode_target`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
