-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2026 at 06:18 AM
-- Server version: 11.4.9-MariaDB-cll-lve
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larh6135_padel_db_hosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `lapangan_id`, `tanggal`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-01-12', '14:00:00', '16:00:00', '2026-01-11 21:50:04', '2026-01-11 21:50:04'),
(2, 1, '2026-01-12', '16:00:00', '18:00:00', '2026-01-11 21:51:05', '2026-01-11 21:51:05'),
(3, 3, '2026-01-12', '14:00:00', '17:00:00', '2026-01-11 21:52:45', '2026-01-11 21:52:45'),
(4, 3, '2026-01-12', '17:00:00', '20:00:00', '2026-01-11 21:53:09', '2026-01-11 21:53:09'),
(5, 4, '2026-01-12', '13:00:00', '14:00:00', '2026-01-11 21:53:51', '2026-01-11 21:53:51'),
(6, 4, '2026-01-12', '14:00:00', '15:00:00', '2026-01-11 21:54:08', '2026-01-11 21:54:08'),
(7, 4, '2026-01-12', '15:00:00', '16:00:00', '2026-01-11 21:54:32', '2026-01-11 21:54:32'),
(8, 3, '2026-01-12', '20:00:00', '23:00:00', '2026-01-12 07:08:09', '2026-01-12 07:39:49'),
(9, 4, '2026-01-12', '16:00:00', '17:00:00', '2026-01-12 08:11:44', '2026-01-12 08:12:13'),
(10, 1, '2026-01-12', '18:00:00', '20:00:00', '2026-01-12 08:12:31', '2026-01-12 08:13:00'),
(11, 1, '2026-01-12', '20:00:00', '22:00:00', '2026-01-12 08:13:33', '2026-01-12 08:13:33'),
(12, 4, '2026-01-12', '17:00:00', '18:00:00', '2026-01-12 08:14:18', '2026-01-12 08:14:33'),
(13, 4, '2026-01-12', '18:00:00', '19:00:00', '2026-01-12 08:15:01', '2026-01-12 08:15:01'),
(14, 4, '2026-01-12', '19:00:00', '20:00:00', '2026-01-12 08:15:22', '2026-01-12 08:15:33'),
(15, 4, '2026-01-12', '20:00:00', '21:00:00', '2026-01-12 08:16:09', '2026-01-12 08:16:09'),
(16, 5, '2026-01-17', '10:00:00', '13:00:00', '2026-01-16 19:20:49', '2026-01-16 19:20:49'),
(17, 5, '2026-01-17', '13:00:00', '16:00:00', '2026-01-16 19:24:23', '2026-01-16 19:24:23'),
(18, 5, '2026-01-17', '16:00:00', '19:00:00', '2026-01-16 19:25:35', '2026-01-16 19:25:35'),
(19, 5, '2026-01-17', '19:00:00', '22:00:00', '2026-01-16 19:26:03', '2026-01-16 19:26:03'),
(20, 6, '2026-01-18', '08:00:00', '11:00:00', '2026-01-16 19:26:27', '2026-01-16 19:26:27'),
(21, 6, '2026-01-18', '11:00:00', '14:00:00', '2026-01-16 19:26:51', '2026-01-16 19:26:51'),
(22, 6, '2026-01-18', '14:00:00', '17:00:00', '2026-01-16 19:27:17', '2026-01-16 19:27:17'),
(23, 6, '2026-01-18', '17:00:00', '20:00:00', '2026-01-16 19:27:46', '2026-01-16 19:27:46'),
(24, 6, '2026-01-18', '20:00:00', '23:00:00', '2026-01-16 19:28:14', '2026-01-16 19:28:14'),
(30, 1, '2026-01-27', '10:00:00', '12:00:00', '2026-01-25 22:00:27', '2026-01-25 22:00:27'),
(32, 14, '2026-01-12', '08:10:00', '10:23:00', '2026-01-27 04:23:16', '2026-01-27 04:23:16'),
(33, 14, '2026-01-12', '11:25:00', '13:25:00', '2026-01-27 04:24:35', '2026-01-27 04:25:30'),
(34, 14, '2026-01-27', '08:00:00', '10:30:00', '2026-01-27 04:26:27', '2026-01-27 04:26:27'),
(35, 14, '2026-01-27', '11:30:00', '13:30:00', '2026-01-27 04:27:15', '2026-01-27 04:27:15'),
(36, 14, '2026-01-27', '13:30:00', '15:30:00', '2026-01-27 04:28:07', '2026-01-27 04:28:07'),
(37, 14, '2026-01-27', '16:30:00', '18:30:00', '2026-01-27 04:28:31', '2026-01-27 04:28:31'),
(38, 14, '2026-02-01', '08:30:00', '10:30:00', '2026-01-27 04:28:54', '2026-01-27 04:28:54'),
(39, 14, '2026-02-01', '11:30:00', '13:30:00', '2026-01-27 04:29:15', '2026-01-27 04:29:15'),
(41, 14, '2026-02-01', '14:00:00', '16:00:00', '2026-01-27 07:00:51', '2026-01-27 07:00:51'),
(42, 14, '2026-02-01', '16:30:00', '18:30:00', '2026-01-27 07:06:38', '2026-01-27 07:06:38'),
(43, 14, '2026-02-01', '19:15:00', '21:15:00', '2026-01-27 07:07:54', '2026-01-27 07:08:15'),
(44, 14, '2026-02-02', '08:15:00', '10:15:00', '2026-01-27 07:45:56', '2026-01-27 07:46:09'),
(45, 16, '2026-02-01', '08:00:00', '22:00:00', '2026-01-31 06:28:34', '2026-01-31 06:28:34'),
(46, 17, '2026-02-02', '08:10:00', '10:10:00', '2026-01-31 06:43:29', '2026-01-31 06:43:29'),
(47, 18, '2026-02-11', '08:00:00', '10:00:00', '2026-02-11 11:40:51', '2026-02-11 11:41:27'),
(49, 18, '2026-02-11', '20:00:00', '22:00:00', '2026-02-11 11:44:33', '2026-02-11 11:44:33'),
(50, 18, '2026-02-12', '08:00:00', '10:00:00', '2026-02-11 11:44:54', '2026-02-11 11:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `lapangans`
--

CREATE TABLE `lapangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lapangan` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('aktif','maintenance') NOT NULL DEFAULT 'aktif',
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lapangans`
--

INSERT INTO `lapangans` (`id`, `nama_lapangan`, `deskripsi`, `harga`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Lapangan 1', 'Lapangan padel dengan standar profesional, permukaan berkualitas, dan fasilitas pendukung yang nyaman. Cocok untuk latihan, permainan santai, maupun pertandingan.\r\n\r\nDilengkapi dengan pagar kaca dan besi sesuai standar padel, lapangan ini mendukung permainan yang dinamis dan kompetitif. Pencahayaan yang memadai memungkinkan permainan tetap optimal baik pada siang maupun malam hari.', 195000, 'aktif', 'lapangan/1770848719_Padel.jfif', '2026-01-11 18:02:00', '2026-02-11 22:25:19'),
(3, 'Lapangan 2', 'Lapangan padel dengan standar profesional, permukaan berkualitas, dan fasilitas pendukung yang nyaman. Cocok untuk latihan, permainan santai, maupun pertandingan.\r\n\r\nDilengkapi dengan pagar kaca dan besi sesuai standar padel, lapangan ini mendukung permainan yang dinamis dan kompetitif. Pencahayaan yang memadai memungkinkan permainan tetap optimal baik pada siang maupun malam hari.', 225000, 'aktif', 'lapangan/1770848740_Padel_time_________.jfif', '2026-01-11 18:44:41', '2026-02-11 22:25:40'),
(4, 'Lapangan 3', 'Lapangan padel dengan standar profesional, permukaan berkualitas, dan fasilitas pendukung yang nyaman. Cocok untuk latihan, permainan santai, maupun pertandingan.\r\n\r\nDilengkapi dengan pagar kaca dan besi sesuai standar padel, lapangan ini mendukung permainan yang dinamis dan kompetitif. Pencahayaan yang memadai memungkinkan permainan tetap optimal baik pada siang maupun malam hari.', 160000, 'aktif', 'lapangan/1770848751_padel_hijau.jfif', '2026-01-11 18:45:06', '2026-02-11 22:25:51'),
(5, 'Lapangan 4 (VIP Only)', 'Lapangan padel VIP dengan fasilitas eksklusif, permukaan lapangan berkualitas tinggi, serta pencahayaan optimal. Memberikan pengalaman bermain yang lebih nyaman dan privat bagi pemain yang mengutamakan kualitas.', 400000, 'aktif', 'lapangan/1770848770_Padel__our_new_pastime_________.jfif', '2026-01-16 19:12:02', '2026-02-11 22:26:10'),
(6, 'Lapangan 5 (VIP only)', 'Lapangan padel VIP dengan fasilitas eksklusif, permukaan lapangan berkualitas tinggi, serta pencahayaan optimal. Memberikan pengalaman bermain yang lebih nyaman dan privat bagi pemain yang mengutamakan kualitas.', 315001, 'maintenance', 'lapangan/1770848790_download__1_.jfif', '2026-01-16 19:14:27', '2026-02-11 22:26:30'),
(14, 'Lapangan 6 (VIP only)', 'Lapangan padel VIP dengan fasilitas eksklusif, permukaan lapangan berkualitas tinggi, serta pencahayaan optimal. Memberikan pengalaman bermain yang lebih nyaman dan privat bagi pemain yang mengutamakan kualitas.', 475000, 'aktif', 'lapangan/1770848803_download_3_.jfif', '2026-01-27 04:22:36', '2026-02-11 22:26:43'),
(16, 'Lapangan 8', 'ertyuiop', 654321, 'aktif', 'lapangan/1770848836__padel.jfif', '2026-01-31 06:26:07', '2026-02-11 22:27:16'),
(17, 'Lapangan 11', 'qwerty', 788888, 'aktif', 'lapangan/1770848847_download.jfif', '2026-01-31 06:42:08', '2026-02-11 22:27:27'),
(18, 'Lapangan 20', 'dawwadwwdawdwadawdaw', 899999, 'aktif', 'lapangan/1770808072_48833.jpg', '2026-02-11 11:07:52', '2026-02-11 11:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_11_164701_create_users_table', 1),
(5, '2026_01_11_164736_create_lapangans_table', 1),
(6, '2026_01_11_164821_create_jadwals_table', 1),
(7, '2026_01_11_164841_create_reservasis_table', 1),
(8, '2026_01_11_164901_create_pembayarans_table', 1),
(9, '2026_01_12_003801_add_gambar_to_lapangan_table', 2),
(10, '2026_01_12_030031_add_invoice_fields_to_reservasis_table', 3),
(11, '2026_01_12_043204_add_total_harga_to_reservasis_table', 4),
(12, '2026_01_12_044136_add_jadwal_id_to_reservasis_table', 5),
(13, '2026_01_12_045646_make_jam_nullable_in_reservasis_table', 6),
(14, '2026_01_27_143423_add_deskripsi_to_lapangans_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservasi_id` bigint(20) UNSIGNED NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `reservasi_id`, `bukti_pembayaran`, `tanggal_bayar`, `total`, `created_at`, `updated_at`) VALUES
(3, 11, 'bukti_pembayaran/SyWoXrPOo2lzfaA18oiTltHYKRYzMVHDdfDtB3Ky.pdf', '2026-01-12', 380000.00, '2026-01-12 06:52:20', '2026-01-12 06:52:20'),
(4, 12, 'bukti_pembayaran/rQj91DxiB06uDes4AvUS14Gjjh0eh9I5zuEqfMLc.pdf', '2026-01-12', 380000.00, '2026-01-12 07:03:09', '2026-01-12 07:03:09'),
(5, 13, 'bukti_pembayaran/V5u65SrVWFYsOF2kYFPcNgTy07zudfxzOYsnMWyf.pdf', '2026-01-12', 675000.00, '2026-01-12 07:46:39', '2026-01-12 07:46:39'),
(6, 14, 'bukti_pembayaran/Ztc0WooZ0mHNbuUe9dM6t8IEaa81L4F1Xv4Rs1xh.pdf', '2026-01-12', 380000.00, '2026-01-12 11:05:10', '2026-01-12 11:05:10'),
(7, 15, 'bukti_pembayaran/c6VXFUOW67SgYu2K3kCjtJVC7tFmTVk9HycQjSIw.pdf', '2026-01-14', 160000.00, '2026-01-13 23:29:11', '2026-01-13 23:29:11'),
(8, 16, 'bukti_pembayaran/4a0OIZbQiuxLPGEnlkJA8ujUuxVpSoL9dQR4u3mh.pdf', '2026-01-15', 380000.00, '2026-01-15 08:55:40', '2026-01-15 08:55:40'),
(9, 10, 'bukti_pembayaran/ouAmXeCsxKHQHBnXjCM34x68NcYWP16bOUt8IxsP.pdf', '2026-01-17', 675000.00, '2026-01-16 19:34:01', '2026-01-16 19:34:01'),
(11, 19, 'bukti_pembayaran/0Sx4HNRSX3B8qqbAFocHn0xJq2VJtU5bhyl7Zwvs.pdf', '2026-01-17', 1200000.00, '2026-01-16 20:55:58', '2026-01-16 20:55:58'),
(12, 20, 'bukti_pembayaran/znao6QfChP5P5VaFasUVOyHsT6naMShihcBBndqY.pdf', '2026-01-17', 1200000.00, '2026-01-16 21:35:57', '2026-01-16 21:35:57'),
(15, 23, 'bukti_pembayaran/AWrVAVYlHOIfVTiGADiahpqaClhVnGoIKs41sumi.pdf', '2026-01-26', 390000.00, '2026-01-25 22:06:24', '2026-01-25 22:06:24'),
(16, 27, 'bukti_pembayaran/8accdzJXGjOaluqQwCpxHNkO0pzPxt0jKgQuazUX.pdf', '2026-01-27', 950000.00, '2026-01-27 04:31:02', '2026-01-27 04:31:02'),
(17, 28, 'bukti_pembayaran/gJ3AOdFgbjvBfFILuNlfoDZDhAsYBCEH7CUiEeGE.pdf', '2026-01-27', 950000.00, '2026-01-27 04:52:08', '2026-01-27 04:52:08'),
(18, 29, 'bukti_pembayaran/Ztt4onHm5Nz8JfYXSXEULbN8i6K7shT6tc1Uos21.pdf', '2026-01-27', 950000.00, '2026-01-27 05:07:43', '2026-01-27 05:07:43'),
(19, 29, 'bukti_pembayaran/yYaaUaVpqFjGeW4ZihYLfDG50GembpALfXYhF4t7.pdf', '2026-01-27', 950000.00, '2026-01-27 05:09:27', '2026-01-27 05:09:27'),
(20, 30, 'bukti_pembayaran/sg5gj5NLQhqeQ2EZkSaXRetvawjeG6K5pdsQZvT1.pdf', '2026-01-27', 950000.00, '2026-01-27 07:02:01', '2026-01-27 07:02:01'),
(21, 31, 'bukti_pembayaran/Um3PIwkigkKBpjgLhRsITSHYIcIipWdHZOOnofgs.pdf', '2026-01-27', 950000.00, '2026-01-27 07:09:50', '2026-01-27 07:09:50'),
(22, 32, 'bukti_pembayaran/tCWojd8lOB9vgKoT8ldnbn7m8HtId0H98wkVGSTp.pdf', '2026-01-27', 950000.00, '2026-01-27 07:46:53', '2026-01-27 07:46:53'),
(23, 33, 'bukti_pembayaran/q3xPz0SKY8jpklKBePFOXStO8fINu7aOVWttBGZo.pdf', '2026-01-31', 9160494.00, '2026-01-31 06:29:46', '2026-01-31 06:29:46'),
(24, 34, 'bukti_pembayaran/2vkiXdoA0l3lcOzf7yQolKvmDHzglcABubOLNJ0J.pdf', '2026-01-31', 1577776.00, '2026-01-31 06:45:13', '2026-01-31 06:45:13'),
(25, 35, 'bukti_pembayaran/1770810378_INV-2026-00035.pdf', '2026-02-11', 1799998.00, '2026-02-11 11:46:18', '2026-02-11 11:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `reservasis`
--

CREATE TABLE `reservasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(255) DEFAULT NULL,
  `status` enum('pending','paid','rejected') NOT NULL DEFAULT 'pending',
  `invoice_number` varchar(255) DEFAULT NULL,
  `invoice_file` varchar(255) DEFAULT NULL,
  `status_pembayaran` enum('unpaid','waiting_verification','paid') NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_harga` int(11) NOT NULL DEFAULT 0,
  `jadwal_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasis`
--

INSERT INTO `reservasis` (`id`, `user_id`, `lapangan_id`, `tanggal`, `jam`, `status`, `invoice_number`, `invoice_file`, `status_pembayaran`, `created_at`, `updated_at`, `total_harga`, `jadwal_id`) VALUES
(8, 3, 4, '2026-01-12', '13:00:00 - 14:00:00', 'paid', 'INV-2026-00008', 'invoices/INV-2026-00008.pdf', 'paid', '2026-01-11 22:15:48', '2026-01-11 23:55:43', 160000, 5),
(9, 3, 4, '2026-01-12', '15:00:00 - 16:00:00', 'paid', 'INV-2026-00009', 'invoices/INV-2026-00009.pdf', 'paid', '2026-01-11 22:59:45', '2026-01-11 23:55:46', 160000, 7),
(10, 3, 3, '2026-01-12', '17:00:00 - 20:00:00', 'paid', 'INV-2026-00010', 'invoices/INV-2026-00010.pdf', 'paid', '2026-01-12 00:01:58', '2026-01-16 19:34:32', 675000, 4),
(11, 3, 1, '2026-01-12', '16:00:00 - 18:00:00', 'paid', 'INV-2026-00011', 'invoices/INV-2026-00011.pdf', 'paid', '2026-01-12 06:48:35', '2026-01-12 06:53:41', 380000, 2),
(12, 3, 1, '2026-01-12', '14:00:00 - 16:00:00', 'paid', 'INV-2026-00012', 'invoices/INV-2026-00012.pdf', 'paid', '2026-01-12 07:02:35', '2026-01-12 07:03:26', 380000, 1),
(13, 5, 3, '2026-01-12', '20:00:00 - 23:00:00', 'paid', 'INV-2026-00013', 'invoices/INV-2026-00013.pdf', 'paid', '2026-01-12 07:46:17', '2026-01-12 07:47:05', 675000, 8),
(14, 5, 1, '2026-01-13', '14:00:00 - 16:00:00', 'paid', 'INV-2026-00014', 'invoices/INV-2026-00014.pdf', 'paid', '2026-01-12 11:04:46', '2026-01-12 11:05:35', 380000, 1),
(15, 3, 4, '2026-01-14', '20:00:00 - 21:00:00', 'paid', 'INV-2026-00015', 'invoices/INV-2026-00015.pdf', 'paid', '2026-01-13 23:28:29', '2026-01-13 23:29:44', 160000, 15),
(16, 3, 1, '2026-01-15', '14:00:00 - 16:00:00', 'paid', 'INV-2026-00016', 'invoices/INV-2026-00016.pdf', 'paid', '2026-01-15 08:54:33', '2026-01-15 08:56:07', 380000, 1),
(19, 6, 5, '2026-01-17', '10:00:00 - 13:00:00', 'paid', 'INV-2026-00019', 'invoices/INV-2026-00019.pdf', 'paid', '2026-01-16 20:55:38', '2026-01-16 20:56:28', 1200000, 16),
(20, 6, 5, '2026-01-17', '13:00:00 - 16:00:00', 'paid', 'INV-2026-00020', 'invoices/INV-2026-00020.pdf', 'paid', '2026-01-16 21:35:02', '2026-01-16 21:40:34', 1200000, 17),
(23, 6, 1, '2026-01-27', '10:00:00 - 12:00:00', 'paid', 'INV-2026-00023', 'invoices/INV-2026-00023.pdf', 'paid', '2026-01-25 22:01:31', '2026-01-25 22:07:44', 390000, 30),
(27, 6, 14, '2026-02-01', '08:30:00 - 10:30:00', 'paid', 'INV-2026-00027', 'invoices/INV-2026-00027.pdf', 'paid', '2026-01-27 04:30:37', '2026-01-27 04:31:46', 950000, 38),
(28, 6, 14, '2026-01-27', '13:30:00 - 15:30:00', 'paid', 'INV-2026-00028', 'invoices/INV-2026-00028.pdf', 'paid', '2026-01-27 04:51:44', '2026-01-27 05:06:47', 950000, 36),
(29, 6, 14, '2026-01-27', '16:30:00 - 18:30:00', 'paid', 'INV-2026-00029', 'invoices/INV-2026-00029.pdf', 'paid', '2026-01-27 05:07:31', '2026-01-27 05:13:10', 950000, 37),
(30, 6, 14, '2026-02-01', '11:30:00 - 13:30:00', 'paid', 'INV-2026-00030', 'invoices/INV-2026-00030.pdf', 'paid', '2026-01-27 07:01:41', '2026-01-27 07:02:44', 950000, 39),
(31, 6, 14, '2026-02-01', '14:00:00 - 16:00:00', 'paid', 'INV-2026-00031', 'invoices/INV-2026-00031.pdf', 'paid', '2026-01-27 07:08:47', '2026-01-27 07:13:41', 950000, 41),
(32, 6, 14, '2026-02-02', '08:15:00 - 10:15:00', 'paid', 'INV-2026-00032', 'invoices/INV-2026-00032.pdf', 'paid', '2026-01-27 07:46:33', '2026-01-27 07:47:19', 950000, 44),
(33, 6, 16, '2026-02-01', '08:00:00 - 22:00:00', 'paid', 'INV-2026-00033', 'invoices/INV-2026-00033.pdf', 'paid', '2026-01-31 06:29:28', '2026-01-31 06:30:14', 9160494, 45),
(34, 6, 17, '2026-02-02', '08:10:00 - 10:10:00', 'paid', 'INV-2026-00034', 'invoices/INV-2026-00034.pdf', 'paid', '2026-01-31 06:44:52', '2026-01-31 06:45:36', 1577776, 46),
(35, 6, 18, '2026-02-11', '20:00:00 - 22:00:00', 'paid', 'INV-2026-00035', 'invoices/INV-2026-00035.pdf', 'paid', '2026-02-11 11:45:39', '2026-02-11 11:46:48', 1799998, 49);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff','customer') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', NULL, NULL, NULL),
(3, 'Customer', 'customer@gmail.com', 'f4ad231214cb99a985dff0f056a36242', 'customer', NULL, NULL, NULL),
(5, 'saoki ramada', 'saoki.ramada@gmail.com', '1d23c9d6c79168e311a23a811e30106a', 'customer', NULL, '2026-01-11 10:51:11', '2026-01-11 10:51:11'),
(6, 'budi', 'budi@gmail.com', '9c5fa085ce256c7c598f6710584ab25d', 'customer', NULL, '2026-01-16 20:54:24', '2026-01-16 20:54:24'),
(8, 'enrique', 'enrique@gmail.com', '62809ab7c1d80677b47e96da5359b178', 'customer', NULL, '2026-01-25 22:32:20', '2026-01-25 22:32:20'),
(9, 'jono', 'jono@gmail.com', 'ef9322a1a342a36856e9e8929b19437a', 'customer', NULL, '2026-02-11 14:15:05', '2026-02-11 14:15:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_lapangan_id_foreign` (`lapangan_id`);

--
-- Indexes for table `lapangans`
--
ALTER TABLE `lapangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_reservasi_id_foreign` (`reservasi_id`);

--
-- Indexes for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservasis_user_id_foreign` (`user_id`),
  ADD KEY `reservasis_lapangan_id_foreign` (`lapangan_id`),
  ADD KEY `reservasis_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `lapangans`
--
ALTER TABLE `lapangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reservasis`
--
ALTER TABLE `reservasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_lapangan_id_foreign` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_reservasi_id_foreign` FOREIGN KEY (`reservasi_id`) REFERENCES `reservasis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservasis`
--
ALTER TABLE `reservasis`
  ADD CONSTRAINT `reservasis_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasis_lapangan_id_foreign` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
