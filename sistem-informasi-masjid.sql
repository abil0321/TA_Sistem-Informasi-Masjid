-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2025 at 11:59 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-informasi-masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_donatur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id`, `nama_donatur`, `email`, `no_telp`, `jumlah`, `user_id`, `created_at`, `updated_at`) VALUES
(82, 'iman', 'iman@gmail.com', '21123123123', 1000000, 124, '2025-02-27 19:54:35', '2025-02-27 19:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kegiatan`
--

CREATE TABLE `kategori_kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_kegiatan`
--

INSERT INTO `kategori_kegiatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Zakat Fitrah', '2025-02-14 05:26:03', '2025-02-16 21:51:59'),
(2, 'Modi distinctio voluptas.', '2025-02-14 05:26:03', '2025-02-14 05:26:03'),
(3, 'Est aut vitae.', '2025-02-14 05:26:03', '2025-02-14 05:26:03'),
(4, 'Ea illo odio.', '2025-02-14 05:26:03', '2025-02-14 05:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pengumuman`
--

CREATE TABLE `kategori_pengumuman` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_pengumuman`
--

INSERT INTO `kategori_pengumuman` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Tempore quam magnam.', '2025-02-14 05:26:03', '2025-02-14 05:26:03'),
(2, 'Et exercitationem.', '2025-02-14 05:26:03', '2025-02-14 05:26:03'),
(3, 'Odit in modi.', '2025-02-14 05:26:03', '2025-02-14 05:26:03'),
(4, 'Zakat Fitrah', '2025-02-14 05:26:03', '2025-02-16 21:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_transaksi`
--

CREATE TABLE `kategori_transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_transaksi`
--

INSERT INTO `kategori_transaksi` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pemasukan', '2025-02-14 05:26:03', '2025-02-14 05:26:03'),
(2, 'Pengeluaran', '2025-02-14 05:26:03', '2025-02-14 05:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_selesai` timestamp NULL DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_kegiatan_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `deskripsi`, `tanggal_mulai`, `tanggal_selesai`, `lokasi`, `jumlah`, `foto`, `kategori_kegiatan_id`, `user_id`, `created_at`, `updated_at`) VALUES
(223, 'iman 1', 'iman@gmail.com sadfasdfasd', '2025-02-23 17:00:00', '2025-02-23 17:00:00', 'jawa', 100000, NULL, 1, 124, '2025-02-28 09:48:52', '2025-02-28 09:48:52'),
(224, 'iman 2', 'iman@gmail.com sadfasdfasd', '2025-02-23 17:00:00', '2025-02-23 17:00:00', 'jawa', 50000, NULL, 1, 124, '2025-02-28 09:49:11', '2025-02-28 09:49:11'),
(226, 'iman 4', 'iman@gmail.com sadfasdfasd', '2025-02-23 17:00:00', '2025-02-23 17:00:00', 'jawa', 100000, NULL, 1, 124, '2025-06-03 20:58:05', '2025-06-03 20:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_02_03_003836_create_kategori_transaksi_table', 1),
(2, '2025_02_03_003958_create_kategori_kegiatan_table', 1),
(3, '2025_02_03_004542_create_kategori_pengumuman_table', 1),
(4, '0001_01_01_000000_create_users_table', 2),
(5, '0001_01_01_000001_create_cache_table', 2),
(6, '0001_01_01_000002_create_jobs_table', 2),
(11, '2025_02_03_004129_create_kegiatan_table', 3),
(12, '2025_02_03_004229_create_transaksi_keuangan_table', 3),
(13, '2025_02_03_004615_create_pengumuman_table', 3),
(14, '2025_02_03_004911_create_donasi_table', 3),
(15, '2025_02_05_153615_create_permission_tables', 3),
(19, '2025_02_14_133345_create_personal_access_tokens_table', 4),
(20, '2025_02_14_141335_add_donasi_id_to_transaksi_keuangan_table', 4),
(22, '2025_02_16_082829_add_foto_to_kegiatan_table', 5),
(23, '2025_02_17_014941_drop_transaksi_id_from_donasi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(24, 'App\\Models\\User', 123),
(25, 'App\\Models\\User', 124);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_pengumuman_id` bigint UNSIGNED NOT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` timestamp NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `kategori_pengumuman_id`, `referensi`, `tanggal`, `user_id`, `created_at`, `updated_at`) VALUES
(37, 'Adipisci rerum aut corporis consectetur.', 'Quod dolorem eum quasi distinctio ut qui accusamus. Voluptatum modi error velit laborum amet non et. Est hic aliquid aut repudiandae. Perspiciatis perferendis dolores deleniti consequatur architecto impedit sed. Voluptate numquam aut commodi.', 2, 'Adipisci earum est molestiae et. Totam accusantium quibusdam quia iusto officia vel.', '2024-08-26 22:57:09', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(38, 'Hic quae architecto quia repellendus.', 'Voluptates sequi est et in ducimus. Voluptates deleniti ullam qui quo et doloremque ullam. Voluptatem voluptas accusantium cum optio. Omnis consequuntur similique sint est. Quod similique soluta fugiat dolores sint.', 2, 'Aliquam aliquid recusandae reprehenderit velit. Sed ea sed earum.', '2024-08-10 11:48:45', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(39, 'Corrupti quisquam sed qui.', 'Vel nisi quae explicabo. Suscipit molestias quisquam non omnis libero. Adipisci voluptatem in aut. Fuga eius dolores quo et nihil.', 2, 'Assumenda commodi et modi reiciendis.', '2024-10-05 01:38:13', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(40, 'Non cum sed cumque.', 'Eaque et et aut omnis. Velit ut qui debitis et aut unde labore. Vel cupiditate in accusantium temporibus. Quo rerum voluptatem doloremque dicta sit. Et et ut autem.', 2, 'Enim vitae magni est omnis.', '2024-03-01 16:18:44', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(41, 'Quia temporibus maxime.', 'Consequatur non voluptatem maxime unde accusamus et nisi. Facilis numquam et officia quo dolores. Ipsa doloribus nihil qui excepturi aliquid qui est.', 2, 'Ut tenetur cupiditate facilis vitae.', '2024-06-01 19:13:07', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(42, 'Earum nulla ab ex.', 'Ut ea et vero in eum eos ut. Ea eveniet autem consequatur ratione laborum. Temporibus amet sunt magnam fugit aliquam necessitatibus delectus. Vel numquam iusto voluptatem ea.', 3, 'Qui nisi officia labore corporis eligendi autem accusantium. Ratione est aut excepturi omnis sit.', '2025-02-10 19:09:36', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(43, 'Aut voluptatum possimus est.', 'At minima sapiente dolore est molestiae corporis minus. Ipsam odio cumque libero sunt veniam. Illum neque nihil vel ea placeat illum. Eum mollitia necessitatibus eos.', 1, 'Natus eos ut est earum.', '2024-06-20 03:29:40', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(44, 'Reprehenderit et vel provident.', 'Cumque id et sit et sit earum eum accusamus. Aut laboriosam labore quia vitae iste error. Eligendi libero voluptas quidem esse nihil labore. Cum aspernatur omnis rerum officia eos minima ducimus. Quisquam deserunt et hic quia modi voluptatem sed. Voluptatum laboriosam et consequatur magnam.', 1, 'Sed magni aliquid vel illum. Et deleniti laboriosam eveniet ut labore ex minima.', '2024-09-05 00:09:57', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(45, 'Molestiae nobis hic ad.', 'Magnam molestiae nostrum similique aliquid vero eum. Perspiciatis laboriosam praesentium ducimus molestiae est hic consequatur. Consequuntur eligendi quis quisquam quia sed ullam sed.', 4, 'Quis quia accusantium et. Voluptatum natus velit placeat voluptatem natus error minus at.', '2024-05-17 01:38:18', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(46, 'Animi non qui sit.', 'Ex assumenda voluptas odit quo iusto. Sint maiores voluptas natus voluptate saepe. Beatae magnam totam esse ab sed.', 1, 'Occaecati repudiandae et consequuntur qui similique et quo. Aut est enim exercitationem asperiores veritatis dolorem deleniti et.', '2024-08-22 16:12:21', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(47, 'Non ipsam eos.', 'Quia rerum consequatur autem omnis quis. Vel iusto et quaerat laudantium. Iusto eos sit molestiae id illum. Voluptate quam sed velit autem.', 1, 'Est animi qui debitis vel et itaque. Id provident asperiores est qui quisquam.', '2024-10-22 00:22:15', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(48, 'Eum atque omnis.', 'Praesentium veniam corrupti sequi non. Suscipit necessitatibus architecto consequatur cupiditate tempore autem. Aliquid dolor iure reprehenderit dolorem rerum totam rerum. Dolor omnis voluptas in enim accusantium enim et.', 4, 'Voluptatem architecto in quia ipsa porro iure quia dolore. Deleniti odit perferendis et est qui.', '2024-04-15 00:44:07', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(49, 'Molestiae nemo rem.', 'Ea odio vel ut vitae sint. Esse et quidem ut magni. Sed maiores ut quod laborum cum aliquid similique. Est tempore dolor sunt et id rerum voluptas.', 4, 'Nulla sed eos sit odio ad debitis autem. Consequatur qui ut distinctio molestias architecto et.', '2024-05-13 16:43:37', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(50, 'Laborum atque nihil ea earum.', 'Reiciendis cupiditate rem ut ratione cumque aperiam ut. Dolores cum voluptatem adipisci omnis vitae perferendis non. Eos eum vitae quibusdam est.', 1, 'Ullam unde voluptas quos quibusdam laboriosam deleniti.', '2024-12-24 00:00:04', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(51, 'Consequatur voluptatem doloremque voluptatum.', 'Eius consectetur dolore non quo. Dicta distinctio vel est. Tempora quidem asperiores explicabo quo error suscipit voluptates. Quis in fuga id ex. Officia rerum a excepturi illo et error.', 2, 'Qui iste eos sequi illo quia illum sunt. Placeat dicta aut laboriosam saepe consequatur et.', '2024-05-28 00:01:40', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(52, 'Exercitationem asperiores et ut.', 'Minima perspiciatis eligendi culpa aperiam ratione rerum. Quis atque tenetur pariatur odio. Enim beatae praesentium molestiae sunt voluptates repudiandae atque rerum. Repellat enim accusantium nihil sit.', 4, 'Qui earum illo ab ea.', '2024-12-07 03:05:38', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(53, 'Inventore error laboriosam.', 'Autem saepe incidunt omnis sit tenetur. Possimus dignissimos vitae qui laboriosam corporis qui omnis voluptas. Est vitae dolor consequatur totam qui. Qui suscipit error sed placeat cumque odio. Eum distinctio rerum quod. Error et et quo ut.', 2, 'Doloremque aut sunt est adipisci et nihil. Rerum molestias amet et ea.', '2024-03-08 15:05:46', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(54, 'Rerum consequatur aliquam.', 'Quia suscipit inventore voluptatem voluptatibus sit aspernatur ipsum. Necessitatibus explicabo neque molestiae quis minima dolores magni. Nesciunt voluptatem voluptatibus tenetur harum dolor. Eos ut sit fuga consectetur et maxime.', 3, 'Voluptatibus iste quo distinctio in ex aut.', '2024-03-09 11:47:10', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(55, 'Ut accusantium eum non totam.', 'Molestiae suscipit autem magnam numquam cupiditate magnam officia ut. Quibusdam voluptas voluptatem rerum qui sint veniam. Error quia voluptatibus fugiat corrupti et. Sunt praesentium provident ratione iure nobis sit.', 4, 'Aliquid molestias ut expedita aperiam expedita magnam. Qui illo eveniet similique et.', '2024-07-18 15:34:02', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(56, 'Excepturi dolore non.', 'Dolorum ea ipsum perspiciatis adipisci. Maxime autem sequi qui qui inventore atque aut. Minus quia quae velit. Ipsum quos voluptatem iste sapiente facilis. Nam ipsam omnis aliquam tenetur nihil numquam ipsa.', 1, 'Quo in est quaerat quo recusandae odit.', '2024-08-25 10:31:54', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(57, 'Velit qui ut.', 'Rem rem itaque qui ipsam. Voluptate cupiditate vel nam officia quia. Sed eveniet aut optio porro nulla. Voluptatem nostrum perspiciatis aut sunt.', 4, 'Autem molestiae eveniet beatae corrupti sapiente sed.', '2024-11-05 10:28:37', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(58, 'Commodi dolorem ut.', 'Cumque voluptas sunt sed qui quis. Aut facilis consequatur ipsam cumque. Cupiditate magni exercitationem similique deleniti. Occaecati qui ratione ipsam et libero similique. Sit non quod cumque ullam laudantium aperiam magni.', 2, 'Ut cumque minima cupiditate qui.', '2024-06-14 21:01:19', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(59, 'Aut et ut.', 'Qui voluptas eum fugiat nam alias unde. Et perferendis vitae magnam facere consequatur omnis. Blanditiis et et facilis recusandae veniam. In in et provident ut voluptate praesentium. Quod aperiam sint doloremque est. Voluptas eaque accusantium eos similique.', 4, 'Beatae alias aut voluptatem maiores odio sunt. Facere ad rerum voluptatem.', '2024-03-06 18:05:05', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(60, 'Eveniet at aut.', 'Est dolorem quis earum natus id dolorem voluptatem. Harum dolorem quia iure voluptas. Iure ut inventore explicabo non sit expedita. Possimus nemo qui tempore quisquam sed.', 2, 'Ducimus voluptatem nihil qui et. Odio exercitationem libero assumenda voluptatum.', '2025-02-22 11:38:12', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(61, 'Quae et esse id.', 'Officiis itaque fuga quas occaecati voluptatem libero amet. Rerum iusto esse dicta eaque veniam esse odit. Consequuntur dolores quia natus. Asperiores at aperiam aut nihil assumenda.', 1, 'Est illum atque nam maiores hic. Dolorem natus quibusdam sunt aut error et.', '2024-10-14 05:58:27', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(62, 'Doloribus tenetur.', 'Autem voluptatem ullam unde qui quia sed. Doloremque esse recusandae rerum cum vitae. Facilis voluptas corrupti voluptatem.', 3, 'Pariatur ipsa placeat dolorum aut velit.', '2024-04-13 23:53:46', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(63, 'Et itaque nesciunt.', 'Et voluptate similique cumque veritatis. Atque doloremque non omnis provident placeat et eos. Necessitatibus reiciendis impedit sint officiis. Consectetur dolorem aut unde.', 2, 'Qui quasi possimus provident sed commodi.', '2024-09-17 02:54:22', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(64, 'Autem non.', 'Autem ut explicabo corporis enim iusto quis. Alias voluptas voluptatem ex incidunt. Similique dolores et modi eum.', 1, 'Natus facere ducimus sint distinctio eligendi accusamus. Qui cumque nihil molestiae.', '2024-08-22 02:48:07', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(65, 'Placeat consequatur a vel.', 'Sit laudantium consequatur mollitia. Explicabo quis in non consequuntur tenetur repudiandae. Sint quo molestiae fugiat rerum voluptate unde quia. Vel itaque et sed qui saepe dolor repellendus. Molestiae nam consequatur dolor officia.', 3, 'Nobis deleniti excepturi beatae harum voluptates voluptate error.', '2024-03-07 08:20:56', 124, '2025-02-26 17:53:37', '2025-02-26 17:53:37'),
(66, 'Facilis hic aspernatur dolores.', 'Omnis quo voluptas expedita corporis. Quaerat consequatur commodi vel sunt aut. Id qui facilis aspernatur et magni eius voluptatem.', 1, 'Mollitia et sapiente dolorem neque quas quia.', '2024-11-24 01:24:56', 123, '2025-02-26 17:53:37', '2025-02-26 17:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(172, 'user.view', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(173, 'user.create', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(174, 'user.edit', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(175, 'user.delete', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(176, 'role.view', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(177, 'role.create', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(178, 'role.edit', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(179, 'role.delete', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(180, 'donasi.view', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(181, 'donasi.create', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(182, 'donasi.edit', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(183, 'donasi.delete', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(184, 'kegiatan.view', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(185, 'kegiatan.create', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(186, 'kegiatan.edit', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(187, 'kegiatan.delete', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(188, 'pengumuman.view', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(189, 'pengumuman.create', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(190, 'pengumuman.edit', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(191, 'pengumuman.delete', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(192, 'transaksi.view', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(21, 'App\\Models\\User', 124, 'auth_token', '7ff4913741aa0af47102d7f39ee5cb5b186faec8c13bdbbf24f242947b83b7a9', '[\"*\"]', '2025-06-03 20:58:04', NULL, '2025-02-26 01:51:50', '2025-06-03 20:58:04'),
(22, 'App\\Models\\User', 123, 'auth_token', 'c9d3d9e1a4d35816e2af72171868cfc48f055b10ff424e1deec1088704efa274', '[\"*\"]', '2025-02-26 02:22:25', NULL, '2025-02-26 01:52:08', '2025-02-26 02:22:25'),
(24, 'App\\Models\\User', 123, 'auth_token', '3949997c4dbee7409554ca0f656ec580286fe780808e5d9e5ab997cdc4d3cb7c', '[\"*\"]', NULL, NULL, '2025-05-26 03:44:24', '2025-05-26 03:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(24, 'admin', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19'),
(25, 'pengurus', 'web', '2025-02-26 01:49:19', '2025-02-26 01:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(172, 24),
(173, 24),
(174, 24),
(175, 24),
(176, 24),
(177, 24),
(178, 24),
(179, 24),
(180, 24),
(181, 24),
(182, 24),
(183, 24),
(184, 24),
(185, 24),
(186, 24),
(187, 24),
(188, 24),
(189, 24),
(190, 24),
(191, 24),
(192, 24),
(180, 25),
(181, 25),
(182, 25),
(183, 25),
(184, 25),
(185, 25),
(186, 25),
(187, 25),
(188, 25),
(189, 25),
(190, 25),
(191, 25),
(192, 25);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DdGjq2C32GGQRhf2OkKhUCtD3loJmOI6Qym8ZM0b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnpTQXYybHF5OHFDMmg0MGh0OW1qb0tWWXZacFlnOWlzU3FBNzZsayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5ndW11bWFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740620518),
('Ik2qPeCjqkkNOjyRJZdy4ZoqrheBSmb3vszT64tL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYm5UTGVkbFNLdUVmdDA1TVNsdVVFYWVIaVFIaGJmVENqOWxoQzN1aSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746871244),
('ilY3jIFfKtnKt0wpnzaIqYs3zLLa04wioUCZDrjo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVBkMmNwaDNFSGxDaWw3T3hUaldzMDRodXRPTGVqQUdWTXA3c2wyVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzM6Imh0dHA6Ly8zNDY0LTI0MDAtOTgwMC02MDMyLTljMC0yZDRjLWJkMzItYzkyZC1jYTEwLm5ncm9rLWZyZWUuYXBwL3RlbnRhbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746871750),
('JCQp8SvtuNQaPjrh6voXd51jHfnzTKPff7gQPbxP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2dJd29LaHliTEJzNmJRdnNCYU5rT2xzOWIzV21HUG1ISXJBWmpycyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHA6Ly8yYTUyLTI0MDAtOTgwMC02MDMyLTljMC0yZDRjLWJkMzItYzkyZC1jYTEwLm5ncm9rLWZyZWUuYXBwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746871285),
('tCf0DTBt2d2ixvLsSF8vTMbHSoK5Zvn0fiYgj2g0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVVBenBsMDdVRzJSeUFrYlAzSkE5bzZmYTA2d1RIRWdJUkhONE9ONSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5ndW11bWFuLzM3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1740643769),
('xgDUAmWjGIX7BShcTtbSCMCGT604RobwyHzrZEzk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicEZISnB0b21NMlkzVEx3MlN3Y3ZQRFFBMmt1c29OUXV1d0F1WkR1NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746871225),
('YLer52z8hhA38SxLet0cLJ1lDvxkWBPTuIfnByTP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDJwU0VMYldIemdZSG5Pdkk1dmdIUEpRd05KakF3dktidzB0ZVU2cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746871259);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keuangan`
--

CREATE TABLE `transaksi_keuangan` (
  `id` bigint UNSIGNED NOT NULL,
  `saldo` int NOT NULL,
  `tanggal` timestamp NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_transaksi_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kegiatan_id` bigint UNSIGNED DEFAULT NULL,
  `donasi_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_keuangan`
--

INSERT INTO `transaksi_keuangan` (`id`, `saldo`, `tanggal`, `keterangan`, `kategori_transaksi_id`, `user_id`, `kegiatan_id`, `donasi_id`, `created_at`, `updated_at`) VALUES
(265, 1000000, '2025-02-28 02:54:35', 'Donasi dari iman', 1, 124, NULL, 82, '2025-02-27 19:54:35', '2025-02-27 19:54:35'),
(490, 900000, '2025-02-28 16:48:52', 'Pengeluaran untuk iman 1', 2, 124, 223, NULL, '2025-02-28 09:48:52', '2025-02-28 09:48:52'),
(491, 850000, '2025-02-28 16:49:11', 'Pengeluaran untuk iman 2', 2, 124, 224, NULL, '2025-02-28 09:49:11', '2025-02-28 09:49:11'),
(495, 750000, '2025-02-28 16:52:12', 'Pembatalan donasi dari iman 5', 2, 124, NULL, NULL, '2025-02-28 09:52:12', '2025-02-28 09:52:12'),
(496, 850000, '2025-02-28 16:54:17', 'Pembatalan pengeluaran untuk iman 4', 1, 124, NULL, NULL, '2025-02-28 09:54:17', '2025-02-28 09:54:17'),
(497, 750000, '2025-06-04 03:58:05', 'Pengeluaran untuk iman 4', 2, 124, 226, NULL, '2025-06-03 20:58:05', '2025-06-03 20:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_telp`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(123, 'Admin1', 'admin@masjid.com', '$2y$12$Pv/lJr84kDa5hoks.7HVG.peFYl7lton7RlLYdzFsRMbOI5YSWEtG', NULL, '2025-02-26 01:49:19', 'QPGZP0XQTq', '2025-02-26 01:49:20', '2025-02-26 01:49:20'),
(124, 'Pengurus1', 'pengurus@masjid.com', '$2y$12$7gzQ6rbzKyz6NquWGI1rO.TzpbEKtD1kj.AXyeG3A8fmYe7hHyxfy', NULL, '2025-02-26 01:49:20', 'D9Y2j8hU4A', '2025-02-26 01:49:20', '2025-02-26 01:49:20');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donasi_user_id_index` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `kategori_kegiatan`
--
ALTER TABLE `kategori_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pengumuman`
--
ALTER TABLE `kategori_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_kategori_kegiatan_id_index` (`kategori_kegiatan_id`),
  ADD KEY `kegiatan_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_kategori_pengumuman_id_index` (`kategori_pengumuman_id`),
  ADD KEY `pengumuman_user_id_index` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_keuangan_kategori_transaksi_id_index` (`kategori_transaksi_id`),
  ADD KEY `transaksi_keuangan_user_id_index` (`user_id`),
  ADD KEY `transaksi_keuangan_kegiatan_id_index` (`kegiatan_id`),
  ADD KEY `transaksi_keuangan_donasi_id_index` (`donasi_id`);

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
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_kegiatan`
--
ALTER TABLE `kategori_kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_pengumuman`
--
ALTER TABLE `kategori_pengumuman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_kategori_kegiatan_id_foreign` FOREIGN KEY (`kategori_kegiatan_id`) REFERENCES `kategori_kegiatan` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kegiatan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_kategori_pengumuman_id_foreign` FOREIGN KEY (`kategori_pengumuman_id`) REFERENCES `kategori_pengumuman` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengumuman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD CONSTRAINT `transaksi_keuangan_donasi_id_foreign` FOREIGN KEY (`donasi_id`) REFERENCES `donasi` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksi_keuangan_kategori_transaksi_id_foreign` FOREIGN KEY (`kategori_transaksi_id`) REFERENCES `kategori_transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_keuangan_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksi_keuangan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
