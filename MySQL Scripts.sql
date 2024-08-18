-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 01:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrs`
--
CREATE DATABASE  IF NOT EXISTS `hrs` /*!40100 DEFAULT CHARACTER SET latin1 */;
use `hrs`;
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
('end', 's:10:\"2024-05-10\";', 1714519052),
('start', 's:10:\"2024-05-03\";', 1714519052);

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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstname`, `lastname`, `email`, `address`, `phoneNo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Merissa', 'John', 'shawnellem101@gmail.com', 'test', '784-965-9652', NULL, '2024-04-29 23:43:01', '2024-04-29 23:43:01'),
(5, 'Merissa', 'John', 'shawnellem101@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 00:04:16', '2024-04-30 00:04:16'),
(6, 'Merissa', 'John', 'shawnellem101@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 00:38:32', '2024-04-30 00:38:32'),
(7, 'Merissa', 'Craig', 'shawnellem101@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 01:59:30', '2024-04-30 01:59:30'),
(8, 'Merissa', 'Craig', 'shawnellem101@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 02:39:09', '2024-04-30 02:39:09'),
(9, 'Merissa', 'Craig', 'shawnellem101@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 02:39:41', '2024-04-30 02:39:41'),
(10, 'Merissa', 'John', 'shawnelle@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 15:50:12', '2024-04-30 15:50:12'),
(11, 'Shawnelle', 'John', 'shawnelle1@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 17:45:01', '2024-04-30 17:45:01'),
(12, 'Shawnelle', 'John', 'shawnellem101@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 17:52:23', '2024-04-30 17:52:23'),
(13, 'Shuting', 'Tang', 'shuting1@gmail.com', 'testt', '123-456-7890', NULL, '2024-04-30 18:19:26', '2024-04-30 18:19:26'),
(14, 'Merissa', 'sfvtbtg', 'shawnellem101@gmail.com', 'test', '123-456-7890', NULL, '2024-04-30 23:08:42', '2024-04-30 23:08:42');

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
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `roomNo` varchar(3) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `numberOfDays` int(11) NOT NULL,
  `numberOfGuests` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`bookingID`, `customerID`, `roomNo`, `checkIn`, `checkOut`, `numberOfDays`, `numberOfGuests`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '101', '2024-04-30', '2024-05-04', 4, 2, 400, '2024-04-30 00:38:32', '2024-04-30 00:38:32'),
(8, 1, '101', '2024-04-30', '2024-05-10', 10, 2, 1000, '2024-04-30 02:50:08', '2024-04-30 02:50:08'),
(9, 1, '101', '2024-04-30', '2024-05-09', 9, 2, 900, '2024-04-30 07:12:27', '2024-04-30 07:12:27'),
(10, 10, '201', '2024-05-01', '2024-05-08', 7, 2, 1050, '2024-04-30 15:50:12', '2024-04-30 15:50:12'),
(11, 10, '0', '2024-05-01', '2024-05-08', 7, 2, NULL, '2024-04-30 17:25:23', '2024-04-30 17:25:23'),
(12, 10, '0', '2024-05-01', '2024-05-03', 2, 2, NULL, '2024-04-30 17:28:18', '2024-04-30 17:28:18'),
(13, 1, '101', '2024-05-02', '2024-06-06', 35, 2, NULL, '2024-04-30 17:35:27', '2024-04-30 17:35:27'),
(14, 1, '0', '2024-05-02', '2024-06-06', 35, 2, NULL, '2024-04-30 17:38:10', '2024-04-30 17:38:10'),
(15, 1, '101', '2024-05-01', '2024-05-03', 2, 2, NULL, '2024-04-30 17:41:52', '2024-04-30 17:41:52'),
(16, 11, '201', '2024-05-02', '2024-05-11', 9, 2, 1350, '2024-04-30 17:45:01', '2024-04-30 17:45:01'),
(17, 11, '301', '2024-05-09', '2024-05-11', 2, 1, 400, '2024-04-30 17:50:58', '2024-04-30 17:50:58'),
(18, 1, '101', '2024-05-01', '2024-05-11', 10, 2, 1000, '2024-04-30 17:52:23', '2024-04-30 17:52:23'),
(19, 13, '101', '2024-05-02', '2024-05-09', 7, 2, 700, '2024-04-30 18:19:26', '2024-04-30 18:19:26'),
(20, 1, '101', '2024-05-10', '2024-05-11', 1, 1, 100, '2024-04-30 23:08:42', '2024-04-30 23:08:42'),
(21, 10, '101', '2024-05-03', '2024-05-10', 7, 2, 700, '2024-05-01 02:17:42', '2024-05-01 02:17:42');

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
('fLMjtb5n7ntcFgA5CVm5u7FRzYevTfxyPr97ucuH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVnl6SHhuUmJtTXFUNHlxYkRsSm16NFNHN0xkbzFzWmdFblhXZHZZTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToic3RhcnQiO3M6MTA6IjIwMjQtMDUtMDMiO3M6MzoiZW5kIjtzOjEwOiIyMDI0LTA1LTEwIjtzOjExOiJudW1fcGVyc29ucyI7czoxOiIyIjtzOjg6Im51bV9kYXlzIjtpOjc7fQ==', 1714517293);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `phoneNo`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Merissa', 'John', 'shawnelle@gmail.com', NULL, '123-456-7890', '$2y$12$I9CGZF3p26PcqEQ9S99fQuoHkAnFSzbSw/ltiznjp66ZOhfs5hWF6', 'tzIJgfhFVnUe0oeevveZbcvd0UvbPtGnjD518esbKiIttJdJ683smbwdZxlV', '2024-04-30 05:16:23', '2024-05-01 02:48:09'),
(2, 'Shawnelle', 'John', 'shawnelle1@gmail.com', NULL, '123-456-7890', '$2y$12$yaxPJs7u1WQRgErSHNxF0./MKwZZp1GtwxHEegLg5uOfCc/VktpY.', '7c88295bee5d8b3df92ca943a359915c4697ddd733fc557275ef15d8a0975427', '2024-04-30 17:44:28', '2024-04-30 17:51:41'),
(3, 'Shuting', 'Tang', 'shuting1@gmail.com', NULL, '123-456-7890', '$2y$12$0APu0zI7wiaowsd5W.Dq.eIsPRrYYRZfz/7RL.MrTzdKx.bvYg4Vy', '87a5fe1320828c8005028a590a70e8a403769580c8b54516bffa40390b4316fc', '2024-04-30 18:18:01', '2024-04-30 18:18:14');

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;