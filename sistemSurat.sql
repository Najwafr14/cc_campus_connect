-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Apr 2025 pada 07.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemSurat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_create_roles_table', 1),
(5, '0002_create_prodis_table', 1),
(6, '0003_create_tipe_surats_table', 1),
(7, '0004_create_surat_pengajuans_table', 1),
(8, '2025_04_16_175201_add_columns_to_users_table', 1),
(9, '2025_04_16_181940_create_personal_access_tokens_table', 2),
(10, '2025_04_18_034726_create_surat_table', 3),
(11, '2025_04_18_041625_add_column_to_surat_table', 4),
(12, '2025_04_18_043528_add_file_path_to_surat_table', 5),
(13, '2025_04_18_043752_modify_file_content_column_in_surat_table', 6),
(14, '2025_04_18_044806_add_file_path_to_surat_table', 7),
(15, '2025_04_18_045055_make_file_content_nullable_in_surat_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', NULL, NULL),
(2, 'Sistem Informasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Mahasiswa', NULL, NULL),
(2, 'Kaprodi', NULL, NULL),
(3, 'Tata Usaha', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Px83TsPBAHnRvG8zqttftm7GGbi90ET324Jwn4zZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3p1U3NkMzRiZnhpdXRQN1NmTkRBdFc5Z3k1V0c5N1dUV3lrREQyayI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1744995481);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_content` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surat_pengajuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `file_name`, `file_content`, `created_at`, `updated_at`, `surat_pengajuan_id`, `file_path`) VALUES
(1, '58.+Ammi+Prayoga.pdf', 0x7075626c69632f73757261742d70656e67616a75616e2f6b59614a686b7165555868537a554e766677694b5435535738663178494742625959744e384675462e706466, '2025-04-17 20:03:12', '2025-04-17 20:03:12', NULL, NULL),
(2, '58.+Ammi+Prayoga.pdf', 0x7075626c69632f73757261742d70656e67616a75616e2f657a7a55485479756a364d537377627545536679667638534f536e623161327754476e38706164782e706466, '2025-04-17 20:17:51', '2025-04-17 20:17:51', NULL, NULL),
(3, '4-6359.pdf', 0x7075626c69632f73757261742d70656e67616a75616e2f535a6f4441705064307061663845564e356d4f73764971333665443144305234636b446f624168312e706466, '2025-04-17 20:19:40', '2025-04-17 20:19:40', 19, NULL),
(4, 'Basis Data Terdistribusi(4).pdf', 0x7075626c69632f73757261742d70656e67616a75616e2f4e77596756574373364d63556833663432517374356a48756f6562656451514464314562613432782e706466, '2025-04-17 20:24:30', '2025-04-17 20:24:30', 21, NULL),
(5, '58.+Ammi+Prayoga.pdf', NULL, '2025-04-17 20:52:19', '2025-04-17 20:52:19', 16, 'public/surat-pengajuan/KXPtDFJ77P5U8KU4sA7UiBLfiv4ROu69cAY71TH7.pdf'),
(6, '4-6359.pdf', NULL, '2025-04-17 21:01:00', '2025-04-17 21:01:00', 21, 'public/surat-pengajuan/6Dv3R18DegkS9z7P42nr1LdISAGlOcFxRBiDf4rF.pdf'),
(7, 'KXPtDFJ77P5U8KU4sA7UiBLfiv4ROu69cAY71TH7.pdf', NULL, '2025-04-17 21:01:21', '2025-04-17 21:01:21', 18, 'public/surat-pengajuan/wfUlGunppZIOsO80pELsuOEXjFfm9gUtsvWI4GnI.pdf'),
(8, 'KXPtDFJ77P5U8KU4sA7UiBLfiv4ROu69cAY71TH7.pdf', NULL, '2025-04-17 21:02:33', '2025-04-17 21:02:33', 8, 'public/surat-pengajuan/wn3Xhuke6qd6fvgJwfLFfn2GLPrU7ocMUATSbB85.pdf'),
(9, '4-6359.pdf', NULL, '2025-04-18 03:20:02', '2025-04-18 03:20:02', 1, 'public/surat-pengajuan/SItVNezLvSZWxeQTpmDhMjJhImylRthEPKoL5lfD.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pengajuans`
--

CREATE TABLE `surat_pengajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tipe_surat_id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `keperluan` text DEFAULT NULL,
  `kode_mk` varchar(255) DEFAULT NULL,
  `nama_mk` varchar(255) DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `topik` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_pengajuans`
--

INSERT INTO `surat_pengajuans` (`id`, `user_id`, `tipe_surat_id`, `prodi_id`, `semester`, `keperluan`, `kode_mk`, `nama_mk`, `tujuan`, `topik`, `status`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', NULL, '2025-04-16 13:11:42', '2025-04-18 03:19:30'),
(2, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2025-04-16 13:12:17', '2025-04-16 13:12:17'),
(3, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2025-04-16 13:12:22', '2025-04-16 13:12:22'),
(4, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2025-04-16 20:47:19', '2025-04-16 20:47:19'),
(5, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2025-04-16 21:00:06', '2025-04-16 21:00:06'),
(6, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', NULL, '2025-04-16 21:00:17', '2025-04-16 21:00:17'),
(7, 2, 4, 1, '2', 'test', 'Mk1', 'Itu', 'test', 'test', 'Approved', NULL, '2025-04-16 21:02:59', '2025-04-17 20:17:36'),
(8, 2, 3, 1, '2', 'TEST', 'TEST', 'TEST', 'ETST', 'test', 'Approved', NULL, '2025-04-16 21:14:32', '2025-04-17 20:00:33'),
(9, 2, 4, 1, '1', '1', '1', '1', '1', '1', 'Rejected', NULL, '2025-04-16 21:20:26', '2025-04-17 02:40:27'),
(10, 2, 2, 1, '1', '2', '2', '2', '2', '2', 'Approved', 'surat-pengajuan/DSWxHlcWEqhzAPCeznBIhmmMpZZlSOK1edukojPJ.pdf', '2025-04-16 21:20:54', '2025-04-17 19:55:56'),
(11, 2, 1, 1, '3', '3', '3', '3', '3', '3', 'Approved', NULL, '2025-04-16 21:21:26', '2025-04-17 19:55:31'),
(12, 2, 3, 1, '3', '3', '3', '3', '3', '2', 'Approved', 'surat-pengajuan/LUlmKdaCZlVWl95oAVvnnSbqZQB1NSkYWnKXhv5n.pdf', '2025-04-16 21:26:21', '2025-04-17 00:52:38'),
(13, 2, 2, 1, '5', '555555', '5', '5', '5', '5', 'Rejected', NULL, '2025-04-16 21:39:31', '2025-04-17 00:26:08'),
(14, 2, 4, 1, '11!11', '111', '1', '1', '11', '1', 'Approved', NULL, '2025-04-16 22:18:27', '2025-04-17 00:26:04'),
(15, 2, 1, 1, '2', 'a', NULL, NULL, NULL, NULL, 'Rejected', NULL, '2025-04-17 01:44:18', '2025-04-17 01:57:41'),
(16, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', NULL, '2025-04-17 01:46:42', '2025-04-17 01:57:40'),
(17, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', NULL, '2025-04-17 01:50:48', '2025-04-17 01:57:38'),
(18, 2, 1, 1, '4', 'a', NULL, NULL, NULL, NULL, 'Approved', NULL, '2025-04-17 01:50:59', '2025-04-17 01:57:37'),
(20, 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Rejected', NULL, '2025-04-17 01:54:03', '2025-04-17 01:57:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_surats`
--

CREATE TABLE `tipe_surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tipe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tipe_surats`
--

INSERT INTO `tipe_surats` (`id`, `nama_tipe`, `created_at`, `updated_at`) VALUES
(1, 'Surat Keterangan Mahasiswa Aktif', NULL, NULL),
(2, 'Surat Pengantar Tugas Kuliah', NULL, NULL),
(3, 'Surat Keterangan Lulus', NULL, NULL),
(4, 'Surat Laporan Hasil Studi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `prodi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `prodi_id`) VALUES
(1, 'Admin TU', 'tu@example.com', NULL, '$2y$12$8UJFWE75lHjf1Y05l2q8WupRK/3Nb4JA1bpJFbmtsvkGMGfgNERIe', NULL, NULL, NULL, 3, 1),
(2, 'test', 'test@example.com', NULL, '$2y$12$dm1C3aDurdvCNRREeneJhOyJ7C.qB.uSklt7j5ylUYyzeKHgHWaGO', NULL, '2025-04-16 11:11:55', '2025-04-16 11:11:55', 1, 1),
(3, 'Kaprodi Example', 'kaprodi@example.com', NULL, '$2y$12$670NuvpetTuKBKfopjL2b.6f9Ve7IP8bwnyHdL88G7zEI/uos5P4y', NULL, '2025-04-16 13:14:08', '2025-04-16 13:14:08', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_pengajuans`
--
ALTER TABLE `surat_pengajuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_pengajuans_user_id_foreign` (`user_id`),
  ADD KEY `surat_pengajuans_tipe_surat_id_foreign` (`tipe_surat_id`),
  ADD KEY `surat_pengajuans_prodi_id_foreign` (`prodi_id`);

--
-- Indeks untuk tabel `tipe_surats`
--
ALTER TABLE `tipe_surats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_prodi_id_foreign` (`prodi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `surat_pengajuans`
--
ALTER TABLE `surat_pengajuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tipe_surats`
--
ALTER TABLE `tipe_surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat_pengajuans`
--
ALTER TABLE `surat_pengajuans`
  ADD CONSTRAINT `surat_pengajuans_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`),
  ADD CONSTRAINT `surat_pengajuans_tipe_surat_id_foreign` FOREIGN KEY (`tipe_surat_id`) REFERENCES `tipe_surats` (`id`),
  ADD CONSTRAINT `surat_pengajuans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
