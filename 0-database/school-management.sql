-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2024 at 06:55 PM
-- Server version: 8.0.37-0ubuntu0.22.04.3
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `sc_failed_jobs`
--

CREATE TABLE `sc_failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sc_jobs`
--

CREATE TABLE `sc_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sc_migrations`
--

CREATE TABLE `sc_migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sc_migrations`
--

INSERT INTO `sc_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_07_06_094517_create_posts_table', 2),
(8, '2024_07_06_124712_create_jobs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sc_password_resets`
--

CREATE TABLE `sc_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sc_password_resets`
--

INSERT INTO `sc_password_resets` (`email`, `token`, `created_at`) VALUES
('qikugalov@mailinator.com', '$2y$10$UEAUsKcSROFWeNY7NohVgeIWAMDm4z5akHIXyKh3VfkbL5Dr3hEfe', '2024-07-05 23:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `sc_personal_access_tokens`
--

CREATE TABLE `sc_personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sc_posts`
--

CREATE TABLE `sc_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `post_by` enum('admin','teacher') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'admin' COMMENT 'admin',
  `targete_user` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sc_posts`
--

INSERT INTO `sc_posts` (`id`, `user_id`, `title`, `description`, `post_by`, `targete_user`, `created_at`, `updated_at`) VALUES
(2, 4, 'Excepturi alias null', 'Provident quia irur', 'admin', NULL, '2024-07-06 05:27:44', '2024-07-06 05:27:44'),
(3, 4, 'Quisquam sunt volupt', 'Ullam excepteur blan', 'admin', NULL, '2024-07-06 05:27:53', '2024-07-06 05:27:53'),
(4, 4, 'Autem et possimus i', 'Rerum aute sint id', 'admin', NULL, '2024-07-06 05:27:57', '2024-07-06 05:27:57'),
(7, 4, 'Consequatur quis qu', 'Est est ipsam dolore', 'admin', NULL, '2024-07-06 05:51:11', '2024-07-06 05:51:11'),
(9, 4, 'Sed et ex voluptatem', 'Eaque vel quam eum c', 'admin', NULL, '2024-07-06 05:51:17', '2024-07-06 05:51:17'),
(10, 4, 'Enim error non quo e', 'Consectetur id sed', 'admin', NULL, '2024-07-06 05:51:25', '2024-07-06 05:51:25'),
(11, 6, 'Quia et id eos ut in', 'Unde mollit irure in', 'teacher', NULL, '2024-07-06 05:54:24', '2024-07-06 05:54:24'),
(12, 1, 'Molestiae aut dolor', 'Proident in et accu', 'teacher', NULL, '2024-07-06 05:58:11', '2024-07-06 05:58:11'),
(13, 1, 'Est ut nemo id ad l', 'Facere explicabo Et', 'teacher', NULL, '2024-07-06 06:03:50', '2024-07-06 06:03:50'),
(14, 1, 'Temporibus nesciunt', 'In quis eligendi inc', 'teacher', NULL, '2024-07-06 06:05:21', '2024-07-06 06:05:21'),
(15, 1, 'Quibusdam enim persp', 'Reprehenderit culpa', 'admin', 'student,parent', '2024-07-06 07:14:07', '2024-07-06 07:14:07'),
(16, 1, 'Sint sed quia incidi', 'Nemo lorem nemo quae', 'admin', 'student', '2024-07-06 07:15:42', '2024-07-06 07:15:42'),
(17, 1, 'Ut fuga Animi modi', 'Veniam quia adipisc', 'admin', 'parent', '2024-07-06 07:15:54', '2024-07-06 07:15:54'),
(18, 1, 'Sequi voluptate susc', 'Et anim magni volupt', 'admin', 'student', '2024-07-06 07:33:45', '2024-07-06 07:33:45'),
(19, 1, 'Eligendi in mollit e', 'Eos odio in exercit', 'admin', 'student', '2024-07-06 07:37:04', '2024-07-06 07:37:04'),
(20, 1, 'Atque occaecat quo e', 'Qui occaecat dolore', 'admin', 'parent', '2024-07-06 07:38:09', '2024-07-06 07:38:09'),
(21, 1, 'Quidem quo assumenda', 'Accusantium sunt eu', 'admin', 'student,parent', '2024-07-06 07:38:49', '2024-07-06 07:38:49'),
(22, 1, 'Quia ut et eu saepe', 'Ut nemo est error pr', 'admin', 'student', '2024-07-06 07:40:43', '2024-07-06 07:40:43'),
(23, 1, 'Student And Parent', 'Student And Parent', 'admin', 'student,parent', '2024-07-06 07:41:49', '2024-07-06 07:41:49'),
(24, 1, 'Libero aut veniam a', 'Nemo odit quia moles', 'admin', 'student,parent', '2024-07-06 07:46:08', '2024-07-06 07:46:08'),
(25, 1, 'Student', 'Student', 'admin', 'student', '2024-07-06 07:47:26', '2024-07-06 07:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `sc_users`
--

CREATE TABLE `sc_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','teacher','student','parent') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'student' COMMENT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('pending','active','inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active' COMMENT 'pending,active,inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sc_users`
--

INSERT INTO `sc_users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Merritt Tate', 'teacher@mailinator.com', 'teacher', NULL, '$2y$10$mQNH45RvcFZUGUv6KL87WevY1gCpMDqm9/vPKhs9Pet6DNipAyTwq', 'active', NULL, '2024-07-05 23:49:17', '2024-07-05 23:49:17'),
(2, 'Damon Rich', 'student@mailinator.com', 'student', NULL, '$2y$10$mQNH45RvcFZUGUv6KL87WevY1gCpMDqm9/vPKhs9Pet6DNipAyTwq', 'active', NULL, '2024-07-05 23:51:41', '2024-07-05 23:51:41'),
(3, 'Channing Parks', 'parent@mailinator.com', 'parent', NULL, '$2y$10$mQNH45RvcFZUGUv6KL87WevY1gCpMDqm9/vPKhs9Pet6DNipAyTwq', 'active', NULL, '2024-07-05 23:53:50', '2024-07-05 23:53:50'),
(4, 'Administrator', 'admin@mailinator.com', 'admin', NULL, '$2y$10$mQNH45RvcFZUGUv6KL87WevY1gCpMDqm9/vPKhs9Pet6DNipAyTwq', 'active', NULL, '2024-07-06 00:29:58', '2024-07-06 00:29:58'),
(5, 'Kylynn Stout', 'dacifitot@mailinator.com', 'parent', NULL, '$2y$10$1qzbeKOz6.8DMz1DD1mhqui/D9k97EI0C40Of58VizH2kg4/kB51G', 'active', NULL, '2024-07-06 03:27:52', '2024-07-06 03:27:52'),
(6, 'Nell Washington', 'xozafeb@mailinator.com', 'teacher', NULL, '$2y$10$H16BeQl/ZzRBFiFL6Tx13.8OHL03TBKCnTpESbLJEaX3BlMOs4rC2', 'active', NULL, '2024-07-06 03:31:55', '2024-07-06 03:31:55'),
(9, 'Elizabeth Hanson', 'fose@mailinator.com', 'teacher', NULL, '$2y$10$IOIot0wNldXaM7SDtWWk6.MW8DbM677Qb2j9IGLxhn3EXzOlutcGm', 'active', NULL, '2024-07-06 03:54:48', '2024-07-06 03:54:48'),
(11, 'Whilemina Becker', 'qujoc@mailinator.com', 'teacher', NULL, '$2y$10$e.xKRVRhFX6UyL.Vr2c/Du/GCapnF96osd.9ZQ6b9rCgl9iKa3GPy', 'active', NULL, '2024-07-06 03:54:57', '2024-07-06 03:54:57'),
(12, 'Madaline Reed', 'jyhu@mailinator.com', 'parent', NULL, '$2y$10$6/bluktUnWoTemI/RQs1xuvLm6hJ8o6OB3My7sPYrR8BtVZ.y1yma', 'active', NULL, '2024-07-06 03:55:03', '2024-07-06 03:55:03'),
(15, 'Jarrod Knowles', 'cibez@mailinator.com', 'student', NULL, '$2y$10$m.HCBuSke4tdPju7t4bu7uSTTQnbgAVPEcXHkIB3IX/cdHY6rBeTm', 'pending', NULL, '2024-07-06 06:05:13', '2024-07-06 06:05:13'),
(16, 'Susan Mcmillan', 'rode@mailinator.com', 'parent', NULL, '$2y$10$d3cD/CfJijiKYAqxBTWEDuMZuSD2ZuFSI.JE/xa2y4HJ3KO57thli', 'pending', NULL, '2024-07-06 06:25:22', '2024-07-06 06:25:22'),
(17, 'Melanie Cantu', 'huxiro@mailinator.com', 'parent', NULL, '$2y$10$fURNjCd.0ij81eHSxoRdIOdgohX1Md6e8prjgEhpRysOpwHfwcPM.', 'active', NULL, '2024-07-06 06:25:32', '2024-07-06 06:25:32'),
(19, 'Savannah Sanders', 'qulufeto@mailinator.com', 'student', NULL, '$2y$10$nCdMRwAzPrS1Qu9OV./tzub4sP132qD2pYto9jDTViLSW2J7UzYNm', 'active', NULL, '2024-07-06 06:32:12', '2024-07-06 06:32:12'),
(20, 'Hadassah Russo', 'pyfywixa@mailinator.com', 'parent', NULL, '$2y$10$Jfm25O0XvLwjPZmNMCYuyuh72.i1Eiq6svmkSRqrKUVHz.QkujaZa', 'inactive', NULL, '2024-07-06 06:40:29', '2024-07-06 06:40:29'),
(21, 'Hermione Willis', 'dohyzi@mailinator.com', 'parent', NULL, '$2y$10$TuZ/xHPV0taJsRGOKVCN0.SKTN82RLRHCo04w4ZG8OXR5ymWAZdAK', 'active', NULL, '2024-07-06 06:40:34', '2024-07-06 06:40:34'),
(23, 'Kerry Odom', 'cejuhet@mailinator.com', 'teacher', NULL, '$2y$10$w4MexJhp/bu5kDxAeduRS.OdhP8hEyRQRekq50hxCeY8878VOIoDq', 'active', NULL, '2024-07-06 07:48:49', '2024-07-06 07:48:49'),
(24, 'Clio Massey', 'bimomok@mailinator.com', 'parent', NULL, '$2y$10$qLlAaALW53ToPGjf9cRSXOowAwXH8HyaG1Otd2/I3EWfY.DPk0rbe', 'pending', NULL, '2024-07-06 07:48:54', '2024-07-06 07:48:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sc_failed_jobs`
--
ALTER TABLE `sc_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sc_failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `sc_jobs`
--
ALTER TABLE `sc_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sc_jobs_queue_index` (`queue`);

--
-- Indexes for table `sc_migrations`
--
ALTER TABLE `sc_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sc_password_resets`
--
ALTER TABLE `sc_password_resets`
  ADD KEY `sc_password_resets_email_index` (`email`);

--
-- Indexes for table `sc_personal_access_tokens`
--
ALTER TABLE `sc_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sc_personal_access_tokens_token_unique` (`token`),
  ADD KEY `sc_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sc_posts`
--
ALTER TABLE `sc_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sc_posts_user_id_index` (`user_id`);

--
-- Indexes for table `sc_users`
--
ALTER TABLE `sc_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sc_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sc_failed_jobs`
--
ALTER TABLE `sc_failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sc_jobs`
--
ALTER TABLE `sc_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sc_migrations`
--
ALTER TABLE `sc_migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sc_personal_access_tokens`
--
ALTER TABLE `sc_personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sc_posts`
--
ALTER TABLE `sc_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sc_users`
--
ALTER TABLE `sc_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sc_posts`
--
ALTER TABLE `sc_posts`
  ADD CONSTRAINT `sc_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `sc_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
