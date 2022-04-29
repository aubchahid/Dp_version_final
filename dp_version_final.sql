-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 05:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dp_version_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidats`
--

CREATE TABLE `candidats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'photo.png',
  `phoneNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cniRecto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cniVerso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarifs` int(11) NOT NULL,
  `paid` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidats`
--

INSERT INTO `candidats` (`id`, `user_id`, `school_id`, `photo`, `phoneNo`, `birthdate`, `sexe`, `cni`, `cniRecto`, `cniVerso`, `contrat`, `certificat`, `tarifs`, `paid`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, 9, 'photo.png', '0745888155', '1995-12-12', '1', 'D154855', '1651240259Carte_identité_électronique_française_(2021,_recto).png', '1651240259specimen-eID-verso-ICAO-fr.jpg', '1651240259preview-contrat-de-travail-bratva-1.jpg', '1651240259preview-certificat-medical-1.jpg', 2700, 1200, '0', '2022-04-29 13:50:59', '2022-04-29 13:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'photo.png',
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometrage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schoolName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `fullname`, `phoneNo`, `email`, `schoolName`, `address`, `city`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '0655448888', 'johndoe@gmail.com', 'Elghazi', 'Rue de saada avenue des far Res Al Fateh Appt 4 & 5', 'Rabat', NULL, 0, '2022-04-28 16:08:11', '2022-04-28 17:05:33'),
(2, 'Karim El Ouali', '0544785555', 'karim511@gmail.com', 'Takkadom', '120, avenue des Forces Auxiliaires (Mly Rchid), Hay Sadri', 'Meknes', NULL, 0, '2022-04-28 17:11:57', '2022-04-28 21:37:42'),
(3, 'Amal Senitisi', '0658858455', 'amalsentisi@gmail.com', 'Sentisi', ' bd Ambassadeur Ben Aïcha, 20290 Quartier: Roches noires', 'Casablanca', NULL, 0, '2022-04-28 17:14:18', '2022-04-29 10:39:21'),
(4, 'Moujahid Elharmi', '0654488484', 'Moujahidelhemri@gmail.com', 'Elhamri', '4, place Otmane Ibn Affane, Agdal', 'Rabat', NULL, 100, '2022-04-28 17:18:52', '2022-04-29 11:21:10'),
(5, 'Soukaina Mountasir', '0785488848', 'Soukaina018@gmail.com', 'Mountasir', '146, avenue Hassan II', 'Rabat', NULL, 0, '2022-04-28 17:20:00', '2022-04-29 10:33:28'),
(6, 'Hafid Moutawakil', '0544884848', 'Hafid15@gmail.com', 'Moutawakil', 'rue Saad Ibn Abi Ouakas -ex Longwy, 5° et. nÂ, Grand Casablanca', ' Casablanca', NULL, 1, '2022-04-28 17:20:54', '2022-04-29 11:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_04_28_155840_create_inscriptions_table', 1),
(7, '2022_04_28_165653_create_schools_table', 2),
(8, '2022_04_28_201030_add_foreign_to_schools', 3),
(9, '2022_04_28_201120_add_role_to_users', 3),
(11, '2022_04_29_123847_create_candidats_table', 4),
(12, '2022_04_29_124238_create_moniteurs_table', 5),
(13, '2022_04_29_124330_create_cars_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `moniteurs`
--

CREATE TABLE `moniteurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'photo.png',
  `phoneNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cniRecto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cniVerso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carteMoniteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroCarteMoniteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrokingTime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `experience`, `address`, `city`, `phoneNo`, `logo`, `founded`, `wrokingTime`, `description`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(9, 'El Haj Errachidi', '6', 'Rue de casablanca n°80', 'Agadir', '0758448855', NULL, '2015', '9h-17h', NULL, 0, '2022-04-29 11:15:09', '2022-04-29 11:15:09', 10),
(10, 'Moutawakil', NULL, 'rue Saad Ibn Abi Ouakas -ex Longwy, 5° et. nÂ, Grand Casablanca', ' Casablanca', '0544884848', NULL, '2015', '9h-17h', NULL, 0, '2022-04-29 11:21:03', '2022-04-29 11:21:03', 11),
(11, 'Otmani', NULL, 'Rue de sbata n°65 Grand Casablanca', 'Casablanca', '0858448484', NULL, NULL, NULL, NULL, 0, '2022-04-29 14:05:51', '2022-04-29 14:05:51', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Chahid Ayoub', 'chahidayoubdev@gmail.com', NULL, '$2a$12$P6BhL5WPznOZA1tuwfHlFu7mGp.0LxPycZRitmIcPaXwAqtlA8ttW', 'mfE9x2bNbtAOK49zWX8jKCetXli9RYO4OjJmPqNqmylWPQ2uGQiNDfmRgKnU', 'ROLE_ADMIN', '2022-04-28 16:42:25', '2022-04-28 16:42:26'),
(10, 'Ahmad Errachidi', 'Ahmaderrachidi@gmail.com', NULL, '$2y$10$40UpeXWnTDuTrj874WdxKe58fOJezi0sPHc2/OWQwsTRUHsc9G6zG', NULL, 'ROLE_SCHOOL', '2022-04-29 11:15:09', '2022-04-29 11:15:09'),
(11, 'Hafid Moutawakil', 'Hafid15@gmail.com', NULL, '$2y$10$KTUvHbZCXNGDjQaGwElw/eYISZDh/OrktP4Mk/u47Ypi6QCh.iaSW', NULL, 'ROLE_SCHOOL', '2022-04-29 11:21:03', '2022-04-29 11:21:03'),
(15, 'Mehdi El Mir', 'mehdielmir@gmail.com', NULL, '$2y$10$fPdDALGJ0wkALmCqjaK6i.nK4X9cb1MA6psnM6TnSIoj.k/EkmvSe', NULL, 'ROLE_CANDIDAT', '2022-04-29 13:50:59', '2022-04-29 13:50:59'),
(16, 'Aouatif Otmani', 'Aoutif0505@gmail.com', NULL, '$2y$10$0lMLdM9jImpSbJQJLnPbM.W5p4NYE.dYV5rqYfW.UNsB9Sby2jtJS', NULL, 'ROLE_SCHOOL', '2022-04-29 14:05:51', '2022-04-29 14:05:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidats_user_id_foreign` (`user_id`),
  ADD KEY `candidats_school_id_foreign` (`school_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_school_id_foreign` (`school_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moniteurs`
--
ALTER TABLE `moniteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moniteurs_user_id_foreign` (`user_id`),
  ADD KEY `moniteurs_school_id_foreign` (`school_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `moniteurs`
--
ALTER TABLE `moniteurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `candidats_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moniteurs`
--
ALTER TABLE `moniteurs`
  ADD CONSTRAINT `moniteurs_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moniteurs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
