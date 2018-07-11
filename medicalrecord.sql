-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Iul 2018 la 09:25
-- Versiune server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalrecord`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$hTh3bFGJiTGP.80vlnZgqOfFOcw.Iy9A84N4LQrAOXF9OnopYgjL2', 'nvawI7oiZxnomxuWnSZ4zlVgelwOSKcxqHKwBmb57UvMq8I4VzoFYvohzh6Y', '2018-04-12 08:34:03', '2018-04-12 08:34:03');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameCompany` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `company`
--

INSERT INTO `company` (`id`, `nameCompany`, `address`, `phoneNumber`, `fax`, `created_at`, `updated_at`) VALUES
(80, 'Oreo', 'Papadiilor', '05845241855', '525205255', '2018-04-16 03:51:08', '2018-04-16 08:29:02'),
(87, 'Milka', 'Laleleor', '058452418555', '5252052555', '2018-04-16 08:30:20', '2018-04-16 08:30:20'),
(88, 'Oreo2', 'Papadiilor', '05845241855', '525205255', '2018-04-16 09:20:49', '2018-04-16 09:20:49'),
(89, 'Nestea', 'Papadiilor333', '058452418554', '5252052554', '2018-04-18 05:23:01', '2018-04-18 05:23:01'),
(90, 'Nesteafrrre', 'Papadiilor333rrt', '058452418554rrr', '5252052554', '2018-04-18 07:05:22', '2018-04-18 07:05:22'),
(91, 'rrfrf', 'vfvfvvvf', '444444', '444444', '2018-04-20 08:00:19', '2018-04-20 08:00:19'),
(92, 'Danesa', 'rogerius', '075555555', '55555', '2018-04-20 09:10:43', '2018-04-20 09:10:43');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `medicalfile`
--

CREATE TABLE `medicalfile` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPatient` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idCompany` int(11) NOT NULL,
  `file` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendations` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicalOpinion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `medicalfile`
--

INSERT INTO `medicalfile` (`id`, `idUser`, `idPatient`, `idCompany`, `file`, `type`, `recommendations`, `medicalOpinion`, `created_at`, `updated_at`) VALUES
(79, 8, '113', 90, 66, '2', 'gnnngn', '3', '2018-04-25 08:39:52', '2018-04-25 09:40:46'),
(80, 8, '114', 90, 55, '2', 'gggggg', '4', '2018-04-25 08:50:31', '2018-04-25 08:50:31'),
(82, 3, '114', 88, 23, '3', 'nnnnn', '2', '2018-04-26 11:01:24', '2018-04-26 11:01:24'),
(83, 5, '115', 88, 1, '3', 'ffssfsffsfff', '1', '2018-05-01 04:14:16', '2018-05-01 04:14:16'),
(84, 3, '116', 89, 3, '4', 'effeffef', '4', '2018-05-01 04:15:42', '2018-05-01 04:15:42');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_05_094034_patient', 1),
(4, '2018_04_05_104123_company', 2),
(5, '2018_04_10_064735_medical_record', 3),
(6, '2018_04_10_070955_medical_record', 4),
(7, '2018_04_12_065943_doctor', 5),
(8, '2018_04_12_071623_doctor', 6),
(9, '2018_04_12_073617_doctor', 7);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `patient`
--

CREATE TABLE `patient` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CNP` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idUser` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `patient`
--

INSERT INTO `patient` (`id`, `firstName`, `lastName`, `CNP`, `occupation`, `job`, `idUser`, `created_at`, `updated_at`) VALUES
(101, 'ddd', 'ddd', '2222222222222', 'ffddddddd', 'ffdd', 5, '2018-04-18 08:08:44', '2018-04-18 08:08:44'),
(103, 'Pop', 'Raluca', '2222222222221', 'ddffr', 'frfrfrf', 7, '2018-04-20 07:40:39', '2018-04-20 07:40:39'),
(104, 'rfrfrf', 'ffrfr', '5555555555551', 'o9o9o9oo', 'ggggtg', 7, '2018-04-20 07:44:58', '2018-04-20 07:44:58');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rucm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `address`, `cif`, `rucm`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Andreea', '', 'andreea@example.com', '', '', '0', '$2y$10$j0hZ1YjgGtw5ab9MiRdPVObwhIlekMZwb9BKwdQu44kDPQdwdGCy.', 'FY9yOGTNuC4PAxb53Jrurji0PERnwJAhC1xiPu7RqIUysEq0C3afwWiBniLX', '2018-04-12 05:35:29', '2018-04-12 05:35:29'),
(4, 'andreea', '', 'andreeat@example.com1', '', '', '0', '$2y$10$hnVO.cmhu2U3tgtp3cNliuUSOPrpONPPo76X079sbPWGyjlMgwwdO', NULL, '2018-04-12 06:09:04', '2018-04-12 06:09:04'),
(5, 'nadina', '', 'nadina@example.com', '', '', '0', '$2y$10$fz6FpEiM221ORgMIJzyUmOWYt6a4bCuR0uLuf9fBzHxkYj/lL6QJ2', '0cwkEW7hKhzRX6JXwjbAiHb8yPkXl5VsidrTdq4DEG9lY59NrKhMcO2jw6ib', '2018-04-12 07:08:30', '2018-04-12 07:08:30'),
(6, 'example', '', 'example@example.com', '', '', '0', '$2y$10$V6ciyjf7UqqFhM/loRROKOK3mkhozVWtEXx1zkTEJpfRKwL9zPpaW', 'fKQUh3lGwk7mBXpdQNVwAE21icDzyPo1xhxSTr7fUNTpJlpVIVZw02rFl55Q', '2018-04-13 11:19:54', '2018-04-13 11:19:54'),
(7, 'Giani', 'varga', 'giagffffgni@example.com', 'Samartin, nr4', '454445', '444444', '$2y$10$GB/nBr/45PDqEX54D4KaXu/KmbMf.XzGTIhUCyXHgespofCUXsyWW', 'RWTXvcAztZR4md4YRVxal6IER5hDhDzYtbT56ayebQZV27FudWvvKGYOTnNb', '2018-04-20 05:07:07', '2018-04-20 11:20:43'),
(8, 'Andreea', 'Terebent1', 'andreea@11digits.com', 'Sanmartin', '2548715', '256498515', '$2y$10$FWQBjXY17qi3l2A.9moXkuYfw4HPohvLyYlJ/Xu4IbnJiCT2/iB/m', 'GxWh408hDq4IYDpyFQIRLKizQt7tGbJFA9VPzykt8rkCKg83bOvnoKEIEyoh', '2018-04-23 04:00:23', '2018-04-25 07:58:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_email_unique` (`email`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalfile`
--
ALTER TABLE `medicalfile`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `medicalfile`
--
ALTER TABLE `medicalfile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
