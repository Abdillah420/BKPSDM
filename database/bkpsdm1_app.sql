-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2025 at 08:15 AM
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
-- Database: `bkpsdm1_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `tanggal`, `title`, `created_at`, `updated_at`) VALUES
(2, '2025-02-21', 'agenda 1\r\n', '2025-02-09 23:06:14', '2025-02-09 23:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `view` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `isi` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `view`, `title`, `isi`, `slug`, `created_at`, `updated_at`) VALUES
(2, 11212, 'artikel 1\r\n', 'Pemerintahan Republik Indonesia secara terus menerus melakukan perbaikan-perbaikan dan penyempurnaan organisasi serta regulasi dalam usaha mewujudkan pengelolaan Aparatur Negara, khususnya Pegawai Negeri Sipil (PNS). Peraturan Perundang-undangan yang mengatur tentang Aparatur Negara yang didalamnya terdapat PNS  dipandang perlu adanya penyesuaian terhadap perkembangan zaman. PNS adalah Aparatur Negara, Abdi Negara dan Abdi Masyarakat  yang diangkat dan dipekerjakan berdasarkan Undang-Undang Nomor 8 Tahun 1974 disempurnakan dengan Undang-Undang Nomor 43 Tahun 1999 dan diberikan hak pensiun atau jaminan hari tua beserta pensiun janda/duda/untuk anak PNS, berdasarkan Undang-Undang Nomor 11 Tahun 1969. \r\n\r\nMenindaklanjuti Undang-Undang Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara (ASN) Kepala Badan Kepegawaian Negara mengeluarkan surat Nomor K.26-30/V.7-3/99 tanggal 17 Januari 2014 perihal Batas Usia Pensiun Pegawai Negeri Sipil. Untuk lebih jelasnya dapat disampaikan sebagai berikut :\r\n\r\nUndang-Undang Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara (ASN) yang telah disahkan oleh Presiden Republik Indonesia dan diundangkan mulai tanggal 15 Januari 2014, bahwa :\r\nPasal 135 disebutkan bahwa Pada saat Undang-Undang ini mulai berlaku, PNS Pusat dan PNS Daerah disebut sebagai Pegawai ASN.\r\nPasal 136 disebutkan bahwa Pada saat Undang-Undang ini berlaku, Undang-Undang  Undang-Undang Nomor 8 Tahun 1974 tentang Pokok-Pokok Kepegawaian (LN RI Tahun 1974 Nomor 55 dan 3041) sebagaimana telah diubah dengan Undang-Undang Nomor 43 Tahun 1999 tentang Pokok-Pokok Kepegawaian (LN RI Tahun 1999 Nomor 169 dan 3890) dicabut dan dinyatakan tidak berlaku. \r\nPasal 139 disebutkan bahwa Pada saat Undang-Undang ini mulai berlaku, semua peraturan perundang-undangan yang merupakan peraturanpelaksanaan dari Undang-Undang Nomor 8 Tahun 1974 tentang Pokok-Pokok Kepegawaian (LN RI Tahun 1974 Nomor 55 dan 3041) sebagaimana telah diubah dengan Undang-Undang Nomor 43 Tahun 1999 tentang Pokok-Pokok Kepegawaian (LN RI Tahun 1999 Nomor 169 dan 3890)  dinyatakan masih tetap berlaku sepanjang tidak bertentangan dan belum diganti berdasarkan Undang-Undang ini.\r\nPasal 1, ASN adalah Profesi bagi PNS dan Pegawai Pemerintah dengan Perjanjian Kerja yang bekerja pada Instansi Pemerintah.\r\nPasal 6, Pegawai ASN adalah PNS dan Pegawai Pemerintah dengan Perjanjian Kerja (PPPK).\r\nPasal 7, PNS merupakan pegawai ASN yang diangkat sebagai pegawai tetap oleh pejabat Pembina kepegawaian dan memiliki nomor induk pegawai secara nasional. PPPK merupakan pegawai ASN yang diangkat sebagai pegawai dengan perjanjian kerja oleh pejabat Pembina kepegawaian sesuai dengan kebutuhan instansi pemerintah dan ketentuan undang-undang ini.\r\nPasal 96 ayat (2) Pengadaan calon PPPK dilakukan melalui tahapan perencanaan, pengumuman lowongan, pelamaran, seleksi, pengumuman hasil seleksi, dan pengangkatan menjadi PPPK.\r\nPasal 99, PPPK tidak dapat diangkat secara otomatis menjadi calon PNS dan untuk diangkat menjadi calon PNS, PPPK harus mengikuti semua proses seleksi yang dilaksanakan bagi calon PNS dan sesuai dengan ketentuan peraturan perundang-undangan.\r\nPasal 13,14,18,19,131 Jabatan ASN adalah :\r\nJabatan Administrasi terdiri atas :\r\nJabatan administrator setara dengan jabatan eselon III;\r\nJabatan pengawas setara dengan jabatan eselon IV;\r\nJabatan pelaksana setara dengan jabatan eselon V dan fungsional umum.\r\nJabatan Fungsional terdiri atas :\r\nJabatan fungsional keahlian :\r\nAhli utama;\r\nAhli madya;\r\nAhli muda;\r\nAhli pertama.\r\nJabatan fungsional keterampilan :\r\nPenyelia;\r\nMahir;\r\nTerampil;\r\nPemula.\r\nJabatan Pimpinan Tinggi :\r\nJabatan pimpinan tinggi utama setara dengan jabatan eselon Ia kepala lembaga pemerintah nonkementerian;\r\nJabatan pimpinan tinggi madya setara dengan jabatan eselon Ia dan eselon Ib;\r\nJabatan pimpinan tinggi pratama setara dengan jabatan eselon II.\r\nPasal 20, \r\nJabatan ASN diisi dari pegawai ASN\r\nJabatan ASN tertentu dapat diisi dari :\r\nPrajurit TNI\r\nAnggota Kepolisian Negara Republik Indonesia\r\nPasal 21, PNS berhak memperoleh :\r\nGaji, tunjangan, dan fasilitas;\r\nCuti;\r\nJaminan pension dan jaminan hari tua;\r\nPerlindungan; dan\r\nPengembangan kompetensi.\r\nPasal 22, PPP berhak memperoleh :\r\nGaji dan tunjangan;\r\nCuti;\r\nPerlindungan; dan\r\nPengembangan kompetensi.\r\nPasal 90, Batas usia pensiun PNS :\r\n58 tahun bagi Pejabat Administrasi;\r\n60 tahun bagi Pejabat Pimpinan Tinggi;\r\nSesuai peraturan perundang-undangan bagi Pejabat Fungsional.\r\n \r\n\r\nDalam surat Kepala Badan Kepegawaian Negara tersebut diatas, menyebutkan bahwa sambil menunggu ditetapkan Peraturan Pemerintah yang mengatur tentang Batas Usia Pensiun (BUP) Pegawai Negeri Sipil, juga menyampaikan contoh perhitungan PNS kapan waktu pensiun atau BUP, yaitu apabila PNS pada akhir bulan Desember 2013 mencapai usia 56 tahun, maka yang bersangkutan pensiun BUP pada tanggal 1 Januari 2014. Selanjutnya apabila pada akhir bulan Desember 2013 belum mencapai usia 56 tahun, maka batas usia pensiunnya 58 tahun.\r\n\r\n(Sumber : http://ropeg.kemenag.go.id/index.php?a=artikel&id=23637)', 'one\r\n', '2025-02-10 00:18:25', '2025-02-10 00:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `penting` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `view`, `title`, `isi`, `image`, `penting`, `slug`, `created_at`, `updated_at`) VALUES
(1, 0, 'berita 1', 'BKPSDM (Badan Kepegawaian dan Pengembangan Sumber Daya Manusia)\r\nBKPSDM adalah singkatan dari Badan Kepegawaian dan Pengembangan Sumber Daya Manusia, yaitu instansi pemerintah daerah yang memiliki tugas utama dalam pengelolaan kepegawaian serta pengembang', 'beritas/fugOJ16uJlb4Q3lX3D5DMerLO1b8NnnSxjq8Uing.png', 0, 'one', '2025-02-09 18:28:59', '2025-02-09 18:28:59'),
(2, 0, 'berita 2', 'BKPSDM (Badan Kepegawaian dan Pengembangan Sumber Daya Manusia)\r\nBKPSDM adalah singkatan dari Badan Kepegawaian dan Pengembangan Sumber Daya Manusia, yaitu instansi pemerintah daerah yang memiliki tugas utama dalam pengelolaan kepegawaian serta pengembang', 'beritas/x2oSzzhDHRbJ1lSxe1a5kEV1DcD1sPExy3YDxLka.png', 1, 'two', '2025-02-09 22:07:26', '2025-02-09 22:07:26'),
(3, 0, 'berita 3', 'BKPSDM (Badan Kepegawaian dan Pengembangan Sumber Daya Manusia)\r\nBKPSDM adalah singkatan dari Badan Kepegawaian dan Pengembangan Sumber Daya Manusia, yaitu instansi pemerintah daerah yang memiliki tugas utama dalam pengelolaan kepegawaian serta pengembang', 'beritas/ekau7uSqRJkH2FdDoHPGmWYVoOY6pKxWWqaRG7gn.png', 1, 'three', '2025-02-10 07:50:18', '2025-02-10 07:50:18'),
(4, 0, 'berita 4', 'BKPSDM (Badan Kepegawaian dan Pengembangan Sumber Daya Manusia)\r\nBKPSDM adalah singkatan dari Badan Kepegawaian dan Pengembangan Sumber Daya Manusia, yaitu instansi pemerintah daerah yang memiliki tugas utama dalam pengelolaan kepegawaian serta pengembang', 'beritas/u9W1h1tKulCoizRvADfzdVGcVbqiLEcBfaxyROmC.png', 0, 'four\r\n', '2025-02-10 08:20:58', '2025-02-10 08:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@example.com|127.0.0.1', 'i:2;', 1744173980),
('admin@example.com|127.0.0.1:timer', 'i:1744173980;', 1744173980),
('superadmin@gmail.com|127.0.0.1', 'i:1;', 1744175512),
('superadmin@gmail.com|127.0.0.1:timer', 'i:1744175512;', 1744175512),
('superuser@example.com|127.0.0.1', 'i:2;', 1744175199),
('superuser@example.com|127.0.0.1:timer', 'i:1744175199;', 1744175199),
('user@example.com|127.0.0.1', 'i:2;', 1744175313),
('user@example.com|127.0.0.1:timer', 'i:1744175313;', 1744175313);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_unduhs`
--

CREATE TABLE `file_unduhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_unduhs`
--

INSERT INTO `file_unduhs` (`id`, `nama`, `deskripsi`, `path`, `created_at`, `updated_at`) VALUES
(5, 'title 1', 'BKPSDM (Badan Kepegawaian dan Pengembangan Sumber Daya Manusia)\r\nBKPSDM adalah singkatan dari Badan Kepegawaian dan Pengembangan Sumber Daya Manusia, yaitu instansi pemerintah daerah yang memiliki tugas utama dalam pengelolaan kepegawaian serta pengembang', 'file_unduhs/YznD0CI8QKKT8u6s6YkHpLEzvzLnlwmOGVmCuhoV.pdf', '2025-02-10 08:57:59', '2025-02-10 08:57:59'),
(6, 'title 2', 'BKPSDM (Badan Kepegawaian dan Pengembangan Sumber Daya Manusia)\r\nBKPSDM adalah singkatan dari Badan Kepegawaian dan Pengembangan Sumber Daya Manusia, yaitu instansi pemerintah daerah yang memiliki tugas utama dalam pengelolaan kepegawaian serta pengembang', 'file_unduhs/9aHShhi0XMDx5SR2RoxDo7BF88gJ0Nthc9MJYdDw.pdf', '2025-02-10 09:57:14', '2025-02-10 09:57:14'),
(7, 'title 3', 'BKPSDM (Badan Kepegawaian dan Pengembangan Sumber Daya Manusia)\r\nBKPSDM adalah singkatan dari Badan Kepegawaian dan Pengembangan Sumber Daya Manusia, yaitu instansi pemerintah daerah yang memiliki tugas utama dalam pengelolaan kepegawaian serta pengembang', 'file_unduhs/G9sd30ajxF1WojZp1NwlGcTi8trAlR1hJmsefpV9.pdf', '2025-02-27 21:53:39', '2025-02-27 21:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE `fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `path`, `title`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 'fotos/l8Ih7EmGv7PUc2xjriF02kP4Ydu0x7MknP36CEzP.png', 'foto 2', '2025-02-11 00:00:00', '2025-02-09 23:32:14', '2025-02-09 23:32:14'),
(3, 'fotos/Xymw8Fs0aLx5JtkB349ze8lOT0uY7daSoaGvxqhH.png', 'foto 3\r\n', '2025-02-21 00:00:00', '2025-02-10 08:16:42', '2025-02-10 08:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2025_02_09_110408_create_slides_table', 1),
(5, '2025_02_09_111708_create_beritas_table', 1),
(6, '2025_02_09_112210_create_artikels_table', 1),
(7, '2025_02_09_112312_create_file_unduhs_table', 1),
(8, '2025_02_09_112423_create_agendas_table', 1),
(9, '2025_02_09_112538_create_fotos_table', 1),
(10, '2025_02_09_112650_create_vidios_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5yB3QIkLAQwxkypuYHsuRVqAdrusZM7vyBcrHQFw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazdCQzF0eGgyZzl3YVVkS2lRVGRCSGVtSFR1NzFJQVh0SGJ0ZTN3eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744078141),
('AkBPzbxQaFNkK9CSA1zHqn1yXg6xb4rk5iVz140f', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFZUMzZTa2JsQ0xsTlhZbXFCZGNIUzhXTE5UR0ZyUTZJMU9QMTVCUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742354030),
('AO8pHAWl8onTBny1GH6UHjjmzgn1YI7gNjNRJHkI', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmxZY0RUYlE0d0Rrc0RGZDhtQkFCNFZqbHdrZnNJZGFvYVNiUFRjUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326933),
('cotdpwInfaDW6UjTMJ33A7yU8qwq0qCjIg7a6xUB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGZ6NmNHMkVLVzZzYldUd2RlTUY0dE1DREs1RjdQTDh4YVJpOGxlNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742354032),
('cP6mpQ4drfdwhGCgDHxGTjORmDoDWMnURLTqpPP2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVhMSUo0YXBscG9wMkJCUDUzS1k1RjMzbjNSWllvMUZrY3NsMEZIeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742066548),
('dthSzNHRIJZI6foahyXX3AkpddX29bhxMEz7bqXl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibVJoM0h4blhFaWZXWG9WRThRZFpHZ2V4NGptZUVkNWhaNno2V3ZIRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcnRpa2VsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742354429),
('EFIe2gwxCEKi9BPl5x1wF6TxKtJu7WqUDcOsmNHd', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUdWSE9nZ0xuYTBpM2ZBNmlhcHFOMXFKdlVlMmM2ZUxXWWhYM05aUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326932),
('HHT63Ex5AG1lZaY3lGKH6o2RF6cl6PVHkjqft7nj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkMzQm56MXZDWXdKTnVySTR2ZFZ1czNLQmZUc1lObGZxWkdCNTZWbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742146276),
('HSru7t6nRQ5mLmgNjV0goDdYdiUkLeBLlWuJXjoE', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0hqWFkwVHNqUlZGNGFxSUs4OFFDUTNMZUNzVmJHZUZob05KcWlJcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326933),
('hVsfvpbmn8Qhbk2B5LZCQDRqqI4G0noxQ6G9jvee', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVJyWTVkQ0JwNDZST1Z6MUhKeTlKM1RTUVZEQXNpQ01qRzIxRnJWMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744179273),
('klx2TQxg6SgTmbwwjEYHPzwhHWYZzSgPq9qXh1Fp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXVoVUd4YkcwTnU5c3prZ1ZQdE5XT3RDRm53T1RUOW5OSU1kRnlURCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91bmR1aCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742628701),
('LnLFpcEv1FE6jBQAfnqGQzx9S3oKj0HrE1AmmmSF', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3NYN0NLUjkwODZxRm5CMU81d1ViT1JCQlZwTm9wa2sxeWJxYTd2YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326929),
('Q6m5MzXK899Jlo2ApZOz08xeilHgBB9WXVzmU7gx', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkd0SHNwcUZacWlROTRGcEZqZGFxSkpxTnVIT0o2Y003TURnWGY5bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741326994),
('qq12D2yCdUcEe6vNfRlmf0SZbpPHIbQ0nOji8pU3', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVdUTWdrQTVSOHVWTk5CcE82RHJEOEhtM2cxYXRqelhIcjNLcFZ2dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326933),
('quSXTnpIW5RRYKrwCSr7LWDHSk5XfIyOhizp5Mxc', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2lVVkhra21MVjFqb2dNdkxUcU9wOTZZN2NpeURNbEFwc0dtREdUWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326931),
('Rxh4CJgLKgbseCJ1IN32leQ1aE21bQMqYr0J2erN', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1pDSkd5c3RmeEpOd1BrdzNFb3hMWGdQWEQ5TlVXbHM3d0NlZWxjbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326931),
('THIBhR0P3Rxc9kpXadvWUXYdxzNHTmzumBBSVthf', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVTBrYkI5MmQ0TWRHUUViTlNuMFRQR2VtTUxhckRmZnZsdVdxRUhlSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742175496),
('tNKRGQEnbGzjVvOH3Rzcg1x6MbCaMZ9yCZYHknoB', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFZocXhyUXdMMzRqcTNjUThYZ09waHJubHNVREVOTkhDZmVjM040ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741316666),
('uRoRDqOHhmUydlWFnJ4lcWrimYyAdTLVI7uHi2wF', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUxSTkx3dVFLUW9iVmh5SlhSa3pETjBUZGRWUnlmVTBPcHR4M0NCVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326932),
('vWFkHxvaY5iKUbDcAPJ5DLrTVO1kuhqppUSN7oNo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjdkNERyRzNiU3ZKTXhxQ2YzeE4zRUdFNkpQelp0Zmh3OEpJT3htUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742354031),
('ZjGHSMDYBesvPS1xCDf1U9vicOjXPRExmQahgQlu', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmFhQ21zQThLazU4ejV5MUVNZFlWSWlUR29LS3pSQ1BwN1FNSEFtSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iZXJpdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741326932);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `path`, `title`, `created_at`, `updated_at`) VALUES
(14, 'slides/1axFGLZf1XaCAto6xT53kIowDQY02yGlFTgrQrTI.jpg', 'pertama', '2025-02-10 10:26:15', '2025-02-10 10:26:15'),
(15, 'slides/7iO1MMaFFXXw27N33lAUwruWmTzWO20RarH3Bvev.jpg', 'kedua', '2025-02-10 10:26:28', '2025-02-10 10:26:28'),
(16, 'slides/9MkJ1mcubOMNYDYKmObWtkBXgDQtxvPLKhoDVNvW.jpg', 'ketiga', '2025-02-10 10:26:41', '2025-02-10 10:26:41'),
(20, 'slides/svQEPvPbPhoIJSlDOSFEuzHvHJuz5giMfALz0XNL.png', 'berita ke 5', '2025-02-23 20:46:12', '2025-02-23 20:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_user','user') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdillah', 'user@example.com', NULL, '$2y$12$tb.IX7T6E.2WfvXaDWsIdOtaZq.S88..ZuJkxkqVjlaKgByozU.Hm', 'user', 'vUFebUU3LTIBb6sYKInfyWDAzfKNP7plmgt2faZ3DFT3QW1sPhqijVrN6YY2', '2025-02-09 18:26:02', '2025-02-09 18:26:02'),
(2, 'super admin', 'super@example.com', NULL, 'password', 'super_user', NULL, NULL, NULL),
(7, 'jamal', 'user@gmail.com', '2025-04-09 05:06:33', 'user', 'user', NULL, '2025-04-09 05:06:33', '2025-04-09 05:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `vidios`
--

CREATE TABLE `vidios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link_vidio` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vidios`
--

INSERT INTO `vidios` (`id`, `link_vidio`, `created_at`, `updated_at`) VALUES
(1, 'https://youtu.be/dglSDK94hf8?si=4ZoIqvpuh0OUoMfF', '2025-03-01 01:21:18', '2025-03-01 01:21:18'),
(2, 'https://youtu.be/dglSDK94hf8?si=4ZoIqvpuh0OUoMfF', '2025-03-01 01:21:18', '2025-03-01 01:21:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_unduhs`
--
ALTER TABLE `file_unduhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vidios`
--
ALTER TABLE `vidios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_unduhs`
--
ALTER TABLE `file_unduhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vidios`
--
ALTER TABLE `vidios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
