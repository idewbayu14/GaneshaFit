  -- phpMyAdmin SQL Dump
  -- version 5.2.1
  -- https://www.phpmyadmin.net/
  --
  -- Host: 127.0.0.1
  -- Generation Time: Jan 20, 2025 at 03:01 PM
  -- Server version: 10.4.32-MariaDB
  -- PHP Version: 8.0.30

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Database: `ganeshafit`
  --

  -- --------------------------------------------------------

  --
  -- Table structure for table `catatan_kunjungan`
  --

  CREATE TABLE `catatan_kunjungan` (
    `id_kunjungan` varchar(50) NOT NULL,
    `id_pengunjung` varchar(15) NOT NULL,
    `id_petugas` varchar(15) NOT NULL,
    `waktu_kunjungan_masuk` datetime NOT NULL,
    `waktu_kunjungan_keluar` datetime DEFAULT NULL,
    `tanggal` date NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  --
  -- Dumping data for table `catatan_kunjungan`
  --

  INSERT INTO `catatan_kunjungan` (`id_kunjungan`, `id_pengunjung`, `id_petugas`, `waktu_kunjungan_masuk`, `waktu_kunjungan_keluar`, `tanggal`) VALUES
  ('KJ_20240712201013MEp23L0C', 'P20240712000256', 'PG01', '2024-07-12 20:10:13', '2024-07-12 15:32:20', '2024-07-12'),
  ('KJ_2024071220360643vxu0Cg', 'P20240712000355', 'PG01', '2024-07-12 20:36:06', '2024-07-12 20:36:09', '2024-07-12'),
  ('KJ_20240712214159j0VCQtcj', 'P20240712000256', 'PG01', '2024-07-12 21:41:59', '2024-07-13 19:15:24', '2024-07-12'),
  ('KJ_20240712220454wd1rkjHb', 'P20240712000502', 'PG01', '2024-07-12 22:04:54', '2025-01-12 15:05:01', '2024-07-12'),
  ('KJ_20240713191337y3YcSfRC', 'P20240713191325', 'PG01', '2024-07-13 19:13:37', '2024-07-13 23:44:35', '2024-07-13'),
  ('KJ_20240713231427QPfY0cw9', 'P20240713231415', 'PG01', '2024-07-13 23:14:27', '2025-01-12 15:05:08', '2024-07-13'),
  ('KJ_20240713234441fVX4NIhl', 'P20240713191325', 'PG01', '2024-07-13 23:44:41', '2025-01-12 15:05:06', '2024-07-13'),
  ('KJ_20250112163813ybhdDUY6', 'P20240712000256', 'PG02', '2025-01-12 16:38:13', '2025-01-13 12:13:41', '2025-01-12'),
  ('KJ_20250119131539f4635327', 'P20250119191534', 'PG01', '2025-01-19 19:15:39', '2025-01-19 19:18:07', '2025-01-19'),
  ('KJ_2025011913174905a78751', 'P20250119191747', 'PG01', '2025-01-19 19:17:49', '2025-01-19 19:23:36', '2025-01-19'),
  ('KJ_2025011913244355fd5d38', 'P20250119192439', 'PG01', '2025-01-19 19:24:43', '2025-01-19 19:45:31', '2025-01-19'),
  ('KJ_20250119192306hDdaScnx', 'P20240712000256', 'PG01', '2025-01-19 19:23:06', '2025-01-19 19:23:37', '2025-01-19');

  -- --------------------------------------------------------

  --
  -- Table structure for table `pengunjung`
  --

  CREATE TABLE `pengunjung` (
    `id_pengunjung` varchar(15) NOT NULL,
    `nama_lengkap` varchar(30) NOT NULL,
    `alamat` text NOT NULL,
    `no_hp` varchar(15) NOT NULL,
    `tgl_bergabung` date NOT NULL,
    `masa_berlaku` date NOT NULL,
    `nama_jenis_pengunjung` varchar(10) NOT NULL,
    `status` enum('Aktif','Tidak aktif','') NOT NULL,
    `biaya` varchar(15) NOT NULL,
    `id_pt` varchar(15) DEFAULT NULL COMMENT 'Foreign Key to personal_trainer'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  --
  -- Dumping data for table `pengunjung`
  --

  INSERT INTO `pengunjung` (`id_pengunjung`, `nama_lengkap`, `alamat`, `no_hp`, `tgl_bergabung`, `masa_berlaku`, `nama_jenis_pengunjung`, `status`, `biaya`, `id_pt`) VALUES
  ('P20240712000256', 'HAIKAL HIMALAYA', 'Buah batu', '08904324234', '2024-07-12', '2030-01-13', 'harian', 'Aktif', '900000', NULL),
  ('P20240712000355', 'RAKA PUTRA', 'Cikoneng', '08753543789543', '2024-07-12', '2024-08-12', 'bulanan', 'Aktif', '180000', NULL),
  ('P20240712000419', 'I DEWA NYOMAN', 'Bali', '083456786554', '2024-07-12', '2026-11-13', 'harian', 'Aktif', '150000', NULL),
  ('P20240712000502', 'ABRIEL FATA', 'Arcamanik', '08465784354', '2024-07-12', '2025-01-13', 'bulanan', 'Aktif', '250000', 'PT01'),
  ('P20240712000527', 'FEBRIAN NUGRAHA', 'Kab.Rancacekek\r\n', '08546678543', '2024-07-12', '2024-08-12', 'bulanan', 'Aktif', '180000', NULL),
  ('P20240712084950', 'I DEWA NYOMAN BAYU SATRIA W', 'KOMPLEK TAMAN MELATI E2-11', '085176778657', '2024-07-12', '2024-08-13', 'harian', 'Aktif', '250000', 'PT01'),
  ('P20240713191325', 'BAGAS', 'Jl Kencana', '08743243243253', '2024-07-13', '2024-09-13', 'bulanan', 'Aktif', '180000', NULL),
  ('P20240713231415', 'AGUS', 'JL MAWAR 76', '083674573254354', '2024-07-13', '2025-01-13', 'bulanan', 'Aktif', '180000', NULL),
  ('P20240713234221', 'I DEWA NYOMAN BAYU SATRIA W', 'KOMPLEK TAMAN MELATI E2-11', '085176778657', '2024-07-13', '2025-02-14', 'bulanan', 'Aktif', '1500000', 'PT01'),
  ('P20250119191534', 'Agus Agung', 'Jalan Singa Perbangsa, Kota Bandung', '0821154641165', '2025-01-19', '2025-05-19', 'bulanan', 'Aktif', '750000', 'PT01'),
  ('P20250119191747', 'sadsad', 'asdadaaw', '10392391123', '2025-01-19', '2025-02-20', 'harian', 'Aktif', '250000', 'PT01'),
  ('P20250119192439', 'asgaag', 'sfgvBSD ', '987655432576', '2025-01-19', '2025-04-20', 'harian', 'Aktif', '750000', 'PT02');

  -- --------------------------------------------------------

  --
  -- Table structure for table `personal_trainer`
  --

  CREATE TABLE `personal_trainer` (
    `id_pt` varchar(15) NOT NULL,
    `nama_lengkap` varchar(30) NOT NULL,
    `alamat` text NOT NULL,
    `no_handphone` varchar(15) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  --
  -- Dumping data for table `personal_trainer`
  --

  INSERT INTO `personal_trainer` (`id_pt`, `nama_lengkap`, `alamat`, `no_handphone`) VALUES
  ('PT01', 'Rusdi', 'Jalan lengkong 1234', '08912319546'),
  ('PT02', 'Rusman', 'Jalan Manggis 123', '08812831249');

  -- --------------------------------------------------------

  --
  -- Table structure for table `petugas`
  --

  CREATE TABLE `petugas` (
    `id_petugas` varchar(15) NOT NULL,
    `nama_lengkap` varchar(30) NOT NULL,
    `alamat` text NOT NULL,
    `password` varchar(15) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  --
  -- Dumping data for table `petugas`
  --

  INSERT INTO `petugas` (`id_petugas`, `nama_lengkap`, `alamat`, `password`) VALUES
  ('PG01', 'Pur', 'fdafadfafda', '123'),
  ('PG02', 'Jaka Sembung', 'Jl teratai 02', '321');

  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `catatan_kunjungan`
  --
  ALTER TABLE `catatan_kunjungan`
    ADD PRIMARY KEY (`id_kunjungan`),
    ADD KEY `id_pengunjung` (`id_pengunjung`),
    ADD KEY `id_petugas` (`id_petugas`);

  --
  -- Indexes for table `pengunjung`
  --
  ALTER TABLE `pengunjung`
    ADD PRIMARY KEY (`id_pengunjung`),
    ADD KEY `fk_id_pt_pengunjung` (`id_pt`);

  --
  -- Indexes for table `personal_trainer`
  --
  ALTER TABLE `personal_trainer`
    ADD PRIMARY KEY (`id_pt`);

  --
  -- Indexes for table `petugas`
  --
  ALTER TABLE `petugas`
    ADD PRIMARY KEY (`id_petugas`);

  --
  -- Constraints for dumped tables
  --

  --
  -- Constraints for table `catatan_kunjungan`
  --
  ALTER TABLE `catatan_kunjungan`
    ADD CONSTRAINT `catatan_kunjungan_ibfk_1` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id_pengunjung`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `catatan_kunjungan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

  --
  -- Constraints for table `pengunjung`
  --
  ALTER TABLE `pengunjung`
    ADD CONSTRAINT `fk_id_pt_pengunjung` FOREIGN KEY (`id_pt`) REFERENCES `personal_trainer` (`id_pt`) ON DELETE SET NULL ON UPDATE CASCADE;
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
