-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 09:13 AM
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
-- Database: `db_siakad`
--

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
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `fakultas`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Ekonomi', 'th-1712122389.jpg', '2024-04-02 19:27:41', '2024-04-02 22:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fakultas_id` bigint(20) UNSIGNED NOT NULL,
  `kode_jurusan` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `fakultas_id`, `kode_jurusan`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 1, 'TEST', 'Test', '2024-04-02 19:28:30', '2024-04-02 19:28:30'),
(2, 1, 'TEST2', 'Test 2', '2024-04-02 22:33:32', '2024-04-02 22:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `mata_kuliah_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik_id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) NOT NULL,
  `nilai` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `user_id`, `dosen_id`, `mata_kuliah_id`, `tahun_akademik_id`, `semester`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 10, 9, 1, 1, '1', 'A', '2024-04-02 21:45:34', '2024-04-02 22:18:44'),
(2, 10, 9, 3, 1, '1', 'B', '2024-04-02 22:38:50', '2024-04-03 00:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_studi_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kode_mata_kuliah` varchar(255) NOT NULL,
  `mata_kuliah` varchar(255) NOT NULL,
  `jumlah_sks` varchar(255) NOT NULL,
  `semester_wajib` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `program_studi_id`, `user_id`, `kode_mata_kuliah`, `mata_kuliah`, `jumlah_sks`, `semester_wajib`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'MTEST', 'Matkul Test', '4', '1', '2024-04-02 19:29:17', '2024-04-02 19:29:17'),
(2, 2, 9, 'MTEST2', 'Matkul Test 2', '5', '1', '2024-04-02 22:34:17', '2024-04-02 22:34:17'),
(3, 1, 9, 'MTEST3', 'Matkul Test 3', '6', '1', '2024-04-02 22:35:15', '2024-04-02 22:35:15');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_01_093216_create_role_table', 1),
(6, '2024_04_01_093647_add_role_id_to_users_table', 2),
(7, '2024_04_02_132252_create_fakultas_table', 3),
(9, '2024_04_02_142520_create_jurusan_table', 4),
(11, '2024_04_02_164958_create_program_studi_table', 5),
(13, '2024_04_02_171134_create_mata_kuliah_table', 6),
(15, '2024_04_03_012757_create_tahun_akademik_table', 7),
(16, '2024_04_03_022604_add_foreign_to_users_table', 8),
(19, '2024_04_03_035327_create_krs_table', 9);

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `gelar_lulusan` varchar(255) NOT NULL,
  `kode_program_studi` varchar(255) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id`, `jurusan_id`, `gelar_lulusan`, `kode_program_studi`, `program_studi`, `created_at`, `updated_at`) VALUES
(1, 1, 'S.E', 'PSTEST', 'PS Test', '2024-04-02 19:28:46', '2024-04-02 19:28:46'),
(2, 2, 'S.E.2', 'PSTEST2', 'PS Test 2', '2024-04-02 22:33:53', '2024-04-02 22:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Dosen', NULL, NULL),
(4, 'Mahasiswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_akademik` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id`, `tahun_akademik`, `semester`, `created_at`, `updated_at`) VALUES
(1, '2023-2024', 'Ganjil', '2024-04-02 19:31:18', '2024-04-02 19:31:18'),
(2, '2023-2024', 'Genap', '2024-04-02 23:30:48', '2024-04-02 23:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `fakultas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_studi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_akademik_id` bigint(20) UNSIGNED DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nidn`, `nim`, `nama`, `email`, `jenis_kelamin`, `agama`, `alamat`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `email_verified_at`, `password`, `fakultas_id`, `jurusan_id`, `program_studi_id`, `tahun_akademik_id`, `semester`, `role_id`, `foto_profil`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Super Admin', 'superadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 10:31:59', '$2y$10$Zw6mp4S7FscStfhSzDo//O0Obm7er0HT47jDJNvsFLA2k0tecsdTa', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(7, NULL, NULL, 'Admin', 'admin@gmail.com', 'Laki-laki', 'Islam', 'bandung', '123456789', 'bandung', '2024-04-02', '2024-04-02 01:23:42', '$2y$12$Q5MNPHfuizjspD.XBetMKO.i0UuSqHWp3xzXd2/HmJImp1uYR/XmW', NULL, NULL, NULL, NULL, NULL, 2, 'fp-1712052614.jpg', NULL, '2024-04-02 01:23:16', '2024-04-02 03:10:14'),
(8, NULL, NULL, 'admin 1', 'admin1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$T8FBefrEKyIKbsOPiNzKKeDiiC6pdJC7nQf/Ybeuf/VqshpPhz.Iu', NULL, NULL, NULL, NULL, NULL, 2, NULL, 'G3VSeOFcqxA64ENfK536fsiG9Of9CIKE81x9xDf3DPu1PH1i2cDfmYuaQwoG', '2024-04-02 02:08:04', '2024-04-02 02:08:04'),
(9, '123', NULL, 'Dosen', 'dosen@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-02 03:18:29', '$2y$12$L.0U8leydhTTVXFBJ9.xCuxBwK6Vzgd1VSUtd0cMRGbca9Pf9s0x6', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, '2024-04-02 03:17:13', '2024-04-02 03:18:29'),
(10, NULL, '1234', 'mitra pasundan', 'mitrapasundan23@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-02 19:38:17', '$2y$12$Sh1dO.Q7/T5jUuOBZeeZ6uifBh6P4tUiyWSjgpYr4rTkKR8mZWCtW', 1, 1, 1, 1, '1', 4, NULL, NULL, '2024-04-02 19:31:49', '2024-04-02 19:38:17'),
(11, NULL, NULL, 'sendy', 'sendycitralesmana@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-02 23:17:59', '$2y$12$i29dK73o37vEE8vLjUg0keY5bL58kOzLfeOFHX5LVrtSzcmVMr9Nq', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2024-04-02 23:16:55', '2024-04-02 23:17:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jurusan_kode_jurusan_unique` (`kode_jurusan`),
  ADD KEY `jurusan_fakultas_id_foreign` (`fakultas_id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `krs_user_id_foreign` (`user_id`),
  ADD KEY `krs_dosen_id_foreign` (`dosen_id`),
  ADD KEY `krs_mata_kuliah_id_foreign` (`mata_kuliah_id`),
  ADD KEY `krs_tahun_akademik_id_foreign` (`tahun_akademik_id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mata_kuliah_kode_mata_kuliah_unique` (`kode_mata_kuliah`),
  ADD KEY `mata_kuliah_program_studi_id_foreign` (`program_studi_id`),
  ADD KEY `mata_kuliah_user_id_foreign` (`user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_studi_kode_program_studi_unique` (`kode_program_studi`),
  ADD KEY `program_studi_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `nidn` (`nidn`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_fakultas_id_foreign` (`fakultas_id`),
  ADD KEY `users_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `users_program_studi_id_foreign` (`program_studi_id`),
  ADD KEY `users_tahun_akademik_id_foreign` (`tahun_akademik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_fakultas_id_foreign` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_mata_kuliah_id_foreign` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_tahun_akademik_id_foreign` FOREIGN KEY (`tahun_akademik_id`) REFERENCES `tahun_akademik` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_program_studi_id_foreign` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mata_kuliah_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fakultas_id_foreign` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_program_studi_id_foreign` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_tahun_akademik_id_foreign` FOREIGN KEY (`tahun_akademik_id`) REFERENCES `tahun_akademik` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
