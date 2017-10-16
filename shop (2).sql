-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 12:40 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_06_151341_TableMigrations', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`id`, `bank_name`, `name`, `rekening`, `created_at`, `updated_at`) VALUES
(1, 'BNI', 'PT Tokoonline Indonesia', '621262317721', '2017-10-07 17:34:00', '2017-10-07 17:34:00'),
(2, 'BNI', 'PT TokoOnline Indonesia', '0912931212', '2017-10-08 17:17:43', '2017-10-08 17:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon`
--

CREATE TABLE `tb_diskon` (
  `id_diskon` int(11) UNSIGNED NOT NULL,
  `nama` varchar(60) NOT NULL,
  `potongan` varchar(60) NOT NULL,
  `mulai` date NOT NULL,
  `berakhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_diskon`
--

INSERT INTO `tb_diskon` (`id_diskon`, `nama`, `potongan`, `mulai`, `berakhir`) VALUES
(3, 'Promo Bulan Oktober', '50', '2017-10-10', '2017-10-21'),
(4, 'Diskon September Ceria', '20', '2017-10-10', '2017-10-21'),
(5, 'Promo Murah', '20,50', '2017-10-10', '2017-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int(10) UNSIGNED NOT NULL,
  `foto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Androids', '2017-10-06 23:00:03', '2017-10-08 17:28:19'),
(2, 'Perlengkapan', '2017-10-09 09:14:56', '2017-10-09 09:14:56'),
(3, 'Komputer', '2017-10-11 04:20:22', '2017-10-11 04:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bank` int(10) UNSIGNED NOT NULL,
  `id_transaksi` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `permalink` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(10) UNSIGNED DEFAULT NULL,
  `id_diskon` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_produk`, `stok_produk`, `harga_produk`, `permalink`, `deskripsi`, `foto`, `id_kategori`, `id_diskon`, `created_at`, `updated_at`) VALUES
(3, 'Android Bagus', 1, 120000, 'android-bagus', 'Android Bagus', '1507379767.jpg', 1, 5, '2017-10-07 05:36:07', '2017-10-11 01:20:27'),
(4, 'Hp Murah', 72, 10000, 'hp-murah', 'Hp Canggih', '1507423789.jpg', 1, 5, '2017-10-07 17:49:49', '2017-10-14 09:50:51'),
(7, 'Kulkas 2 pintu', 14, 2000000, 'kulkas-2-pintu', 'Kulkas Ok', '1507566985.jpg', 2, 0, '2017-10-09 09:36:25', '2017-10-12 11:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_detail`
--

CREATE TABLE `tb_transaksi_detail` (
  `id_transaksi` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penerima` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_transaksi` tinyint(4) NOT NULL,
  `id_transaksi_satuan` int(10) UNSIGNED DEFAULT NULL,
  `id_transaksi_keranjang` int(10) UNSIGNED DEFAULT NULL,
  `status_transaksi` tinyint(4) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi_detail`
--

INSERT INTO `tb_transaksi_detail` (`id_transaksi`, `nama_penerima`, `alamat_penerima`, `jenis_transaksi`, `id_transaksi_satuan`, `id_transaksi_keranjang`, `status_transaksi`, `kode_unik`, `total`, `diskon`, `id_user`, `created_at`, `updated_at`) VALUES
('TRNP0WHLXXPZHO1', 'admins', 'jalan', 1, 101, NULL, 1, 663, 2000000, 0, 3, '2017-10-10 09:54:32', '2017-10-10 09:55:26'),
('TRNEUINVSE3NMSO', 'admins', 'jalan', 1, 102, NULL, 1, 997, 48000, 0, 3, '2017-10-10 09:54:54', '2017-10-10 09:55:23'),
('TRNZG8QXSDMQNN0', 'admins', 'jalan', 1, 103, NULL, 2, 656, 2000000, 0, 3, '2017-10-10 09:55:10', '2017-10-14 09:04:21'),
('TRNTDJYERY1J7PZ', 'admins', 'jalan', 1, 104, NULL, 2, 936, 10000, 10000, 3, '2017-10-10 09:55:43', '2017-10-14 09:04:21'),
('TRNRIKPSRLMRVTW', 'ahmad', 'Jalan Raya', 2, NULL, 71, 2, 667, 48000, 0, 8, '2017-10-10 20:53:12', '2017-10-14 09:04:21'),
('TRNGLLJTHZREVVS', 'admins', 'jalan', 1, 105, NULL, 1, 913, 48000, 48000, 3, '2017-10-10 20:56:06', '2017-10-10 22:35:01'),
('TRNFUFA1UIOL22D', 'admins', 'jalan', 1, 106, NULL, 1, 157, 120000, 0, 3, '2017-10-10 22:29:16', '2017-10-10 22:34:57'),
('TRNDG7FXFLRY5B8', 'admins', 'jalan', 1, 107, NULL, 1, 841, 2000000, 0, 3, '2017-10-10 22:34:02', '2017-10-10 22:34:49'),
('TRN4BQVDMEXLPYM', 'admins', 'jalan', 1, 108, NULL, 2, 455, 2000000, 0, 3, '2017-10-10 22:35:15', '2017-10-14 09:04:21'),
('TRNMGN0WGPGMAMY', 'admins', 'jalan', 1, 109, NULL, 2, 895, 10000, 10000, 3, '2017-10-11 00:43:01', '2017-10-14 09:04:21'),
('TRNOBUKNQOOW1HZ', 'admins', 'jalan', 1, 110, NULL, 2, 514, 2000000, 0, 3, '2017-10-11 00:48:49', '2017-10-14 09:04:21'),
('TRN3I7ICR8GILS5', 'admins', 'jalan', 1, 111, NULL, 2, 299, 4000, 0, 3, '2017-10-11 03:57:57', '2017-10-14 09:05:36'),
('TRNLQOPOW21KV7E', 'admins', 'jalan', 1, 112, NULL, 1, 323, 2000000, 0, 3, '2017-10-11 04:20:51', '2017-10-11 04:21:08'),
('TRNTNLJUMZXD6IW', 'admins', 'jalan', 1, 113, NULL, 1, 978, 2000000, 0, 3, '2017-10-11 04:21:21', '2017-10-11 04:21:27'),
('TRNNPKNCR0COVY2', 'admins', 'jalan', 1, 114, NULL, 1, 998, 2000000, 0, 3, '2017-10-11 04:21:36', '2017-10-11 04:21:42'),
('TRNDJO1HAGNZRHD', 'admins', 'jalan', 1, 115, NULL, 2, 289, 8000, 8000, 3, '2017-10-11 04:21:57', '2017-10-14 09:04:21'),
('TRNMIYKRQEQH1GR', 'admins', 'jalan', 1, 116, NULL, 2, 831, 4000000, 0, 3, '2017-10-11 04:39:26', '2017-10-14 09:04:21'),
('TRNVUHEIJQMFGLZ', 'admins', 'jalan', 1, 117, NULL, 2, 431, 4000000, 0, 3, '2017-10-11 04:40:01', '2017-10-14 09:04:21'),
('TRNJVNV8UUMO9V7', 'admins', 'jalan', 1, 118, NULL, 1, 244, 24000000, 0, 3, '2017-10-11 04:41:28', '2017-10-11 04:44:03'),
('TRNVTZUMVDKJWX2', 'admins', 'jalan', 2, NULL, 77, 1, 186, 2000000, 0, 3, '2017-10-11 04:43:30', '2017-10-11 04:44:01'),
('TRNVTZUMVDKJWX2', 'admins', 'jalan', 2, NULL, 78, 1, 186, 4000, 0, 3, '2017-10-11 04:43:30', '2017-10-11 04:44:01'),
('TRNWKNQUIU3GJLN', 'admins', 'jalan', 1, 119, NULL, 1, 446, 2000000, 0, 3, '2017-10-12 11:22:47', '2017-10-12 11:48:58'),
('TRN0OKVLEQD2ZPV', 'admins', 'jalan', 1, 122, NULL, 1, 469, 2000000, 0, 3, '2017-10-12 11:51:56', '2017-10-12 11:52:07'),
('TRNZZMK5U3ISSQK', 'admins', 'jalan', 1, 123, NULL, 2, 548, 4000, 0, 3, '2017-10-14 09:03:30', '2017-10-14 09:05:36'),
('TRNLMSGEU3SBENE', 'admins', 'jalan', 1, 124, NULL, 2, 822, 4000, 0, 3, '2017-10-14 09:07:50', '2017-10-14 09:08:05'),
('TRNSAIZLSDPBXTK', 'admins', 'jalan', 1, 125, NULL, 2, 465, 4000, 0, 3, '2017-10-14 09:09:25', '2017-10-14 09:51:41'),
('TRNB19TCWV5ZETJ', 'admins', 'jalan', 1, 126, NULL, 2, 276, 4000, 0, 3, '2017-10-14 09:47:10', '2017-10-14 09:48:13'),
('TRNII0BVPJ5DK47', 'admins', 'jalan', 1, 127, NULL, 2, 746, 4000, 0, 3, '2017-10-14 09:49:25', '2017-10-14 09:49:52'),
('TRN5TJGLGCMWJUZ', 'admins', 'jalan', 1, 128, NULL, 0, 919, 4000, 0, 3, '2017-10-14 09:50:51', '2017-10-14 09:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_keranjang`
--

CREATE TABLE `tb_transaksi_keranjang` (
  `id_transaksi_keranjang` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_produk` int(10) UNSIGNED NOT NULL,
  `jumlah_produk` int(11) DEFAULT NULL,
  `diskon` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi_keranjang`
--

INSERT INTO `tb_transaksi_keranjang` (`id_transaksi_keranjang`, `id_user`, `id_produk`, `jumlah_produk`, `diskon`, `harga`, `subtotal`, `status`, `created_at`, `updated_at`) VALUES
(71, 8, 3, 1, '20,50', 120000, 48000, 1, '2017-10-10 20:52:50', '2017-10-10 20:53:12'),
(77, 3, 7, 1, '0', 2000000, 2000000, 1, '2017-10-11 04:37:33', '2017-10-11 04:43:30'),
(78, 3, 4, 1, '20,50', 10000, 4000, 1, '2017-10-11 04:42:51', '2017-10-11 04:43:30'),
(81, 3, 4, 1, '20,50', 10000, 4000, 1, '2017-10-12 11:53:55', '2017-10-12 11:58:48'),
(82, 3, 7, 1, '0', 2000000, 2000000, 1, '2017-10-12 11:53:59', '2017-10-12 11:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_satuan`
--

CREATE TABLE `tb_transaksi_satuan` (
  `id_transaksi_satuan` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_produk` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi_satuan`
--

INSERT INTO `tb_transaksi_satuan` (`id_transaksi_satuan`, `id_user`, `id_produk`, `status`, `jumlah_produk`, `harga`, `diskon`, `subtotal`, `deleted`, `created_at`, `updated_at`) VALUES
(89, 3, 7, 0, 1, 2000000, '50', 1000000, NULL, '2017-10-10 01:50:07', '2017-10-10 01:50:07'),
(90, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 01:50:19', '2017-10-10 01:50:19'),
(91, 3, 3, 0, 1, 120000, '20,50', 48000, NULL, '2017-10-10 01:50:36', '2017-10-10 01:50:36'),
(92, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 01:51:09', '2017-10-10 01:51:09'),
(93, 3, 3, 0, 1, 120000, '20,50', 48000, NULL, '2017-10-10 01:52:25', '2017-10-10 01:52:25'),
(94, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 01:52:40', '2017-10-10 01:52:40'),
(95, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 01:52:47', '2017-10-10 01:52:47'),
(96, 3, 3, 0, 1, 120000, '20,50', 48000, NULL, '2017-10-10 01:53:24', '2017-10-10 01:53:24'),
(97, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 01:56:05', '2017-10-10 01:56:05'),
(98, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 01:56:12', '2017-10-10 01:56:12'),
(99, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 01:56:17', '2017-10-10 01:56:17'),
(100, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 09:29:02', '2017-10-10 09:29:02'),
(101, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-10 09:54:32', '2017-10-10 09:54:32'),
(102, 3, 3, 0, 1, 120000, '20,50', 48000, NULL, '2017-10-10 09:54:54', '2017-10-10 09:54:54'),
(103, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-10 09:55:10', '2017-10-10 09:55:10'),
(104, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-10 09:55:43', '2017-10-10 09:55:43'),
(105, 3, 3, 0, 1, 120000, '20,50', 48000, NULL, '2017-10-10 20:56:06', '2017-10-10 20:56:06'),
(106, 3, 4, 0, 12, 10000, '0', 120000, NULL, '2017-10-10 22:29:16', '2017-10-10 22:29:16'),
(107, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-10 22:34:02', '2017-10-10 22:34:02'),
(108, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-10 22:35:15', '2017-10-10 22:35:15'),
(109, 3, 4, 0, 1, 10000, '0', 10000, NULL, '2017-10-11 00:43:01', '2017-10-11 00:43:01'),
(110, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-11 00:48:49', '2017-10-11 00:48:49'),
(111, 3, 4, 0, 1, 10000, '20,50', 4000, NULL, '2017-10-11 03:57:57', '2017-10-11 03:57:57'),
(112, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-11 04:20:51', '2017-10-11 04:20:51'),
(113, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-11 04:21:21', '2017-10-11 04:21:21'),
(114, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-11 04:21:36', '2017-10-11 04:21:36'),
(115, 3, 4, 0, 2, 10000, '20,50', 8000, NULL, '2017-10-11 04:21:57', '2017-10-11 04:21:57'),
(116, 3, 7, 0, 2, 2000000, '0', 4000000, NULL, '2017-10-11 04:39:25', '2017-10-11 04:39:25'),
(117, 3, 7, 0, 2, 2000000, '0', 4000000, NULL, '2017-10-11 04:40:01', '2017-10-11 04:40:01'),
(118, 3, 7, 0, 12, 2000000, '0', 24000000, NULL, '2017-10-11 04:41:28', '2017-10-11 04:41:28'),
(119, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-12 11:22:47', '2017-10-12 11:22:47'),
(120, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-12 11:45:44', '2017-10-12 11:45:44'),
(121, 3, 4, 0, 1, 10000, '20,50', 4000, NULL, '2017-10-12 11:48:18', '2017-10-12 11:48:18'),
(122, 3, 7, 0, 1, 2000000, '0', 2000000, NULL, '2017-10-12 11:51:56', '2017-10-12 11:51:56'),
(123, 3, 4, 0, 1, 10000, '20,50', 4000, NULL, '2017-10-14 09:03:30', '2017-10-14 09:03:30'),
(124, 3, 4, 0, 1, 10000, '20,50', 4000, NULL, '2017-10-14 09:07:50', '2017-10-14 09:07:50'),
(125, 3, 4, 0, 1, 10000, '20,50', 4000, NULL, '2017-10-14 09:09:25', '2017-10-14 09:09:25'),
(126, 3, 4, 0, 1, 10000, '20,50', 4000, NULL, '2017-10-14 09:47:10', '2017-10-14 09:47:10'),
(127, 3, 4, 0, 1, 10000, '20,50', 4000, NULL, '2017-10-14 09:49:25', '2017-10-14 09:49:25'),
(128, 3, 4, 0, 1, 10000, '20,50', 4000, NULL, '2017-10-14 09:50:51', '2017-10-14 09:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_transaction`
--

CREATE TABLE `tb_user_transaction` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `total_voucher` int(11) DEFAULT NULL,
  `total_transaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_transaction`
--

INSERT INTO `tb_user_transaction` (`id_user`, `total_voucher`, `total_transaksi`) VALUES
(3, 3525200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_voucher`
--

CREATE TABLE `tb_voucher` (
  `id_voucher` int(11) NOT NULL,
  `banyak_transaksi` int(11) NOT NULL,
  `persen` int(11) NOT NULL,
  `aktif` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_voucher`
--

INSERT INTO `tb_voucher` (`id_voucher`, `banyak_transaksi`, `persen`, `aktif`) VALUES
(6, 3, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` tinyint(4) NOT NULL,
  `foto` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama_lengkap`, `password`, `email`, `no_hp`, `alamat`, `jk`, `foto`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'farisw', 'farisw', '$2y$10$OhXoq8gB4UBcEm4wtSJRneg7TthEDRApL.ZnmUxAn3P66we6XcsaC', 'mail@gmail.com', NULL, 'ajlan', 1, NULL, 1, 'NoumhX8E3VM9oskMMWf01qRNYrWXspgRe3Tqlk4PjVwyC81xPWtuDe8PIHYQ', '2017-10-07 04:48:28', '2017-10-07 04:48:28'),
(2, 'admin', 'admin', '$2y$10$chzucwJWgWOnDMLZUzKbO.PrJqYKd4AM3r5N7cql086T4Wcc5y/XS', 'admin@admin.com', NULL, 'jalan', 1, NULL, 2, 'bIj4jVG7jFB4K0DtatREJHm0yl9djXxoQCUbQalYmL3QNZCPl3UDvUjrAALf', '2017-10-07 05:07:04', '2017-10-07 05:07:04'),
(3, 'admins', 'admins', '$2y$10$MIEJKOfdVY7RTV2j7VTSYuZmKbQFK5749EeYYtJa6N./awckn4lUK', 'admin123@admin.com', NULL, 'jalan', 1, NULL, 2, '8W5BxgvbZKuvh9DN2mm9TTybIYgQzc5Bep2luyseq4NbGAkAmgmxnosZjGJ9', '2017-10-07 05:58:51', '2017-10-07 05:58:51'),
(4, 'budi', 'budi', '$2y$10$OKrCmg8IEvcPYIZZz1EbSO9PN24bSNw/zT4Ryiy6JIkCeaiD4NXla', 'budi@budi.com', NULL, 'ksjians', 1, NULL, 1, '8P5OlSs19uQK9tMKY9XwBHbchbue2diRPEDa1nSsbxMaMEyHCVg8wGUpo6zE', '2017-10-07 06:04:09', '2017-10-07 06:04:09'),
(5, 'fariswi', 'fariswi', '$2y$10$1wl3jHKTJqGm.v2iMG/UcODZMCZzuyTWYFMTDChduK7rZwW9rGPQ2', 'fariswi@gmail.com', NULL, 'aksjas', 1, NULL, 1, NULL, '2017-10-07 06:54:54', '2017-10-07 06:54:54'),
(6, 'rama', 'budiman tanurejo', '$2y$10$L/fctSfOAs1xcmMMPDAah.d5QIl9m0ebv1cSfZCCenvH4DAE/4juG', 'rama@mail.com', '082121', 'Jalan Raya', 1, '1507462722.jpg', 1, 'H2IO7ZWegcDqR4h3H86IOkp3DYZXilxQ7BkEyswuyfUFTpMyJwm9XzpteuEv', '2017-10-08 04:06:31', '2017-10-08 04:38:42'),
(7, 'faris@faris.com', 'faris widhiarta', '$2y$10$oTbFCymp3vSRgd.JtFP9bOeq5EBCPBxyinfc6xrM9nfwtu5OV6Woi', 'faris@faris.co.id', NULL, 'Jalan Raya', 1, NULL, 1, NULL, '2017-10-09 02:03:58', '2017-10-09 02:03:58'),
(8, 'ahmad', 'ahmad', '$2y$10$QgY7FGu85fi7M5VDMRKfQOCSonwmASICVfSwBpdez1c7KQMcsTEVa', 'ahmad@gmail.com', NULL, 'Jalan Raya', 1, NULL, 1, 'cXOK6WedRXAD3Di6zu7LCfA9Isu88k8eZ0BFr5RTOUmXKmKwDdGmCniAoZYF', '2017-10-10 20:51:56', '2017-10-10 20:51:56'),
(9, 'ahmad123', 'ahmad', '$2y$10$nUys/t30O8jZ/MKtHvpTduOLInBlSMtqwGsmmQiODgzp0XUdIV58a', 'ahmad12@gmail.com', NULL, 'jalan', 1, NULL, 1, 'ST03x3HltsJBuXffsoJq8GMiJ9TU5MRq0KryTa5Xbjs7wmtbKAaTkGV5qbBu', '2017-10-11 01:09:00', '2017-10-11 01:09:00'),
(10, 'ahmadbarjo', 'ahmad barjo', '$2y$10$e7uTaHzng6mT4YN/6/FrWe2gFZGl/afW8/beHOaVTZuM3SkQVYyUG', 'barjo@gmail.com', NULL, 'jalan raya', 1, NULL, 1, NULL, '2017-10-11 01:14:38', '2017-10-11 01:14:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pembayaran_id_bank_foreign` (`id_bank`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_produk_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD KEY `tb_transaksi_detail_id_transaksi_satuan_foreign` (`id_transaksi_satuan`),
  ADD KEY `id_transaksi_keranjang` (`id_transaksi_keranjang`);

--
-- Indexes for table `tb_transaksi_keranjang`
--
ALTER TABLE `tb_transaksi_keranjang`
  ADD PRIMARY KEY (`id_transaksi_keranjang`),
  ADD KEY `tb_transaksi_keranjang_id_produk_foreign` (`id_produk`),
  ADD KEY `tb_transaksi_keranjang_id_user_foreign` (`id_user`);

--
-- Indexes for table `tb_transaksi_satuan`
--
ALTER TABLE `tb_transaksi_satuan`
  ADD PRIMARY KEY (`id_transaksi_satuan`),
  ADD KEY `tb_transaksi_satuan_id_produk_foreign` (`id_produk`),
  ADD KEY `tb_transaksi_satuan_id_user_foreign` (`id_user`);

--
-- Indexes for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD PRIMARY KEY (`id_voucher`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id_diskon` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_transaksi_keranjang`
--
ALTER TABLE `tb_transaksi_keranjang`
  MODIFY `id_transaksi_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tb_transaksi_satuan`
--
ALTER TABLE `tb_transaksi_satuan`
  MODIFY `id_transaksi_satuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_id_bank_foreign` FOREIGN KEY (`id_bank`) REFERENCES `tb_bank` (`id`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`);

--
-- Constraints for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD CONSTRAINT `tb_transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi_keranjang`) REFERENCES `tb_transaksi_keranjang` (`id_transaksi_keranjang`),
  ADD CONSTRAINT `tb_transaksi_detail_id_transaksi_satuan_foreign` FOREIGN KEY (`id_transaksi_satuan`) REFERENCES `tb_transaksi_satuan` (`id_transaksi_satuan`);

--
-- Constraints for table `tb_transaksi_keranjang`
--
ALTER TABLE `tb_transaksi_keranjang`
  ADD CONSTRAINT `tb_transaksi_keranjang_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id`),
  ADD CONSTRAINT `tb_transaksi_keranjang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `tb_transaksi_satuan`
--
ALTER TABLE `tb_transaksi_satuan`
  ADD CONSTRAINT `tb_transaksi_satuan_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id`),
  ADD CONSTRAINT `tb_transaksi_satuan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
