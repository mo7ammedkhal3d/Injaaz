-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2024 at 12:30 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `injaaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

DROP TABLE IF EXISTS `boards`;
CREATE TABLE IF NOT EXISTS `boards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `boards_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'المشروع النهائي للمخيم', 'المشروع النهائي', 4, '2024-01-15 18:28:45', '2024-01-18 06:29:10'),
(2, 'مشروع الأرشفة', 'مشروع الأرشفة', 1, '2024-01-16 07:36:21', '2024-01-16 07:36:21'),
(3, 'تستر', 'مشروع أختبارات', 1, '2024-01-16 07:36:47', '2024-01-18 05:13:11'),
(4, 'مشروع فرصة', 'مشروع فرصة', 1, '2024-01-16 07:37:02', '2024-01-16 07:37:02'),
(5, 'حفلات سوفت', 'حفلات سوفت', 1, '2024-01-16 07:37:24', '2024-01-16 07:37:24'),
(6, 'شهادة تك', 'شهادة تك', 1, '2024-01-16 07:37:55', '2024-01-16 07:37:55'),
(7, 'تقدم', 'تقدم', 3, '2024-01-16 07:38:19', '2024-01-19 07:32:51'),
(8, 'أي باي', 'محفظة رقمية', 1, '2024-01-16 08:01:46', '2024-01-16 08:01:46'),
(9, 'المتابع', 'محمد أمين ابو نشمي', 1, '2024-01-16 08:24:14', '2024-01-16 08:24:14'),
(10, 'مشروع أنجاز', 'مشروع أنجاز', 1, '2024-01-17 05:32:03', '2024-01-17 05:32:03'),
(14, 'متجر الحازمي', 'متجر الكتروني', 3, '2024-01-18 18:04:12', '2024-01-18 18:04:12'),
(13, 'مناقصة كلاود', 'مناقصة كلاود', 1, '2024-01-18 05:09:42', '2024-01-18 05:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `board_lists`
--

DROP TABLE IF EXISTS `board_lists`;
CREATE TABLE IF NOT EXISTS `board_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `board_lists_board_id_foreign` (`board_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board_lists`
--

INSERT INTO `board_lists` (`id`, `title`, `board_id`, `created_at`, `updated_at`) VALUES
(7, 'المنجز', 1, '2024-01-16 04:29:18', '2024-01-16 04:29:18'),
(6, 'جاري العمل', 1, '2024-01-16 04:29:09', '2024-01-16 04:29:09'),
(5, 'المؤجل', 1, '2024-01-16 04:28:57', '2024-01-16 04:28:57'),
(8, 'المنجز', 7, '2024-01-16 07:38:39', '2024-01-16 07:38:39'),
(9, 'المؤجل', 7, '2024-01-16 07:38:44', '2024-01-16 07:38:44'),
(10, 'جاري العمل', 7, '2024-01-16 07:38:50', '2024-01-16 07:38:50'),
(11, 'المنجز', 9, '2024-01-16 08:24:25', '2024-01-16 08:24:25'),
(12, 'المؤجل', 9, '2024-01-16 08:24:33', '2024-01-16 08:24:33'),
(13, 'جاري العمل', 9, '2024-01-16 08:24:38', '2024-01-16 08:24:38'),
(14, 'المنجز', 10, '2024-01-17 05:32:35', '2024-01-17 05:32:35'),
(15, 'جاري العمل', 10, '2024-01-17 05:32:40', '2024-01-17 05:32:40'),
(16, 'المؤجل', 10, '2024-01-17 05:32:45', '2024-01-17 05:32:45'),
(17, 'mkm', 1, '2024-01-17 17:19:34', '2024-01-17 17:19:34'),
(21, 'قائمة جديدة', 1, '2024-01-19 09:27:49', '2024-01-19 09:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `board_members`
--

DROP TABLE IF EXISTS `board_members`;
CREATE TABLE IF NOT EXISTS `board_members` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `board_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `board_members_user_id_foreign` (`user_id`),
  KEY `board_members_board_id_foreign` (`board_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board_members`
--

INSERT INTO `board_members` (`id`, `user_id`, `board_id`, `created_at`, `updated_at`) VALUES
(19, 1, 1, '2024-01-18 06:31:36', '2024-01-18 06:31:36'),
(2, 4, 1, '2024-01-16 07:33:00', '2024-01-16 07:33:00'),
(15, 1, 11, '2024-01-17 17:22:33', '2024-01-17 17:22:33'),
(4, 2, 1, '2024-01-16 07:33:49', '2024-01-16 07:33:49'),
(5, 1, 2, '2024-01-16 07:36:21', '2024-01-16 07:36:21'),
(6, 1, 3, '2024-01-16 07:36:47', '2024-01-16 07:36:47'),
(7, 1, 4, '2024-01-16 07:37:02', '2024-01-16 07:37:02'),
(8, 1, 5, '2024-01-16 07:37:24', '2024-01-16 07:37:24'),
(9, 1, 6, '2024-01-16 07:37:55', '2024-01-16 07:37:55'),
(11, 1, 8, '2024-01-16 08:01:46', '2024-01-16 08:01:46'),
(12, 1, 9, '2024-01-16 08:24:14', '2024-01-16 08:24:14'),
(13, 1, 10, '2024-01-17 05:32:03', '2024-01-17 05:32:03'),
(14, 2, 10, '2024-01-17 05:35:14', '2024-01-17 05:35:14'),
(21, 3, 14, '2024-01-18 18:04:12', '2024-01-18 18:04:12'),
(20, 3, 1, '2024-01-18 17:59:49', '2024-01-18 17:59:49'),
(18, 1, 13, '2024-01-18 05:09:42', '2024-01-18 05:09:42'),
(22, 3, 2, '2024-01-18 18:17:16', '2024-01-18 18:17:16'),
(27, 3, 7, '2024-01-19 07:29:30', '2024-01-19 07:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `board_list_id` bigint UNSIGNED NOT NULL,
  `progress_rate` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `due_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `position` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cards_board_list_id_foreign` (`board_list_id`),
  KEY `cards_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `title`, `description`, `board_list_id`, `progress_rate`, `user_id`, `due_date`, `start_date`, `position`, `created_at`, `updated_at`) VALUES
(49, 'تصميم الواجهة الرئيسية', '<p><strong>وصف&nbsp;</strong></p>', 6, 40, 1, '2024-01-16', '2024-01-03', 1, '2024-01-16 04:30:42', '2024-01-18 18:10:52'),
(48, 'البدء بالتحليل', NULL, 6, 0, 1, NULL, NULL, 2, '2024-01-16 04:30:26', '2024-01-18 18:10:53'),
(50, 'العرض التقديمي', '<blockquote><p><i><strong>أحمد بيعرض البور بوينت</strong></i></p></blockquote>', 9, 45, 1, '2024-01-10', '2023-12-11', 1, '2024-01-16 07:39:09', '2024-01-19 08:25:23'),
(47, 'تصميم الواجهات بالفيقما', '<p><i><strong>وصف للوحة</strong></i></p>', 5, 0, 1, '2024-01-17', NULL, 2, '2024-01-16 04:29:58', '2024-01-18 18:10:55'),
(46, 'تحليل قواعد البيانات', '<p>وصف</p>', 5, 88, 1, '2024-01-24', '2024-01-20', 1, '2024-01-16 04:29:44', '2024-01-19 05:06:27'),
(45, 'تحديد المتطلبات', '<p><i><strong>حمود</strong></i></p>', 6, 0, 1, NULL, NULL, 3, '2024-01-16 04:29:35', '2024-01-18 18:10:55'),
(51, 'تقييم المهارات', NULL, 12, 0, 1, NULL, NULL, 2, '2024-01-16 08:24:48', '2024-01-18 05:42:57'),
(52, 'تقييم السلوك', NULL, 13, 0, 1, NULL, NULL, 1, '2024-01-16 08:24:53', '2024-01-18 05:42:57'),
(53, 'إدارة التمارين', NULL, 12, 0, 1, NULL, NULL, 1, '2024-01-16 08:25:05', '2024-01-18 05:42:56'),
(54, 'إدارة الحضور والغياب', NULL, 13, 0, 1, NULL, NULL, 2, '2024-01-16 08:25:27', '2024-01-18 05:42:59'),
(55, 'إدارة المدرسين', NULL, 12, 0, 1, NULL, NULL, 3, '2024-01-16 08:25:37', '2024-01-18 05:42:59'),
(56, 'التحليل والمتطلبات', '<p><i><strong>وصف</strong></i></p>', 14, 0, 1, NULL, NULL, 1, '2024-01-17 05:33:03', '2024-01-18 05:53:33'),
(57, 'تحليل قاعدة البيانات', NULL, 14, 0, 1, NULL, NULL, 2, '2024-01-17 05:33:12', '2024-01-18 05:53:35'),
(58, 'مهمة جديدة', '<blockquote><p>وىخامتى</p></blockquote>', 17, 0, 1, '2024-01-17', NULL, 1, '2024-01-17 17:19:41', '2024-01-19 06:17:58'),
(63, 'المراجعة النهائية', NULL, 21, 45, 3, NULL, NULL, 1, '2024-01-19 09:28:21', '2024-01-19 09:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `card_assigned`
--

DROP TABLE IF EXISTS `card_assigned`;
CREATE TABLE IF NOT EXISTS `card_assigned` (
  `card_id` bigint UNSIGNED NOT NULL,
  `board_member_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`card_id`,`board_member_id`),
  KEY `card_assigned_board_member_id_foreign` (`board_member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `card_assigned`
--

INSERT INTO `card_assigned` (`card_id`, `board_member_id`) VALUES
(63, 2);

-- --------------------------------------------------------

--
-- Table structure for table `card_comments`
--

DROP TABLE IF EXISTS `card_comments`;
CREATE TABLE IF NOT EXISTS `card_comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `board_member_id` bigint UNSIGNED NOT NULL,
  `card_id` bigint UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `card_comments_board_member_id_foreign` (`board_member_id`),
  KEY `card_comments_card_id_foreign` (`card_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `card_comments`
--

INSERT INTO `card_comments` (`id`, `board_member_id`, `card_id`, `text`, `created_at`, `updated_at`) VALUES
(22, 20, 63, '<p>تعليق</p>', '2024-01-19 09:28:31', '2024-01-19 09:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_28_231055_create_boards_table', 1),
(7, '2023_12_28_231146_create_cards_table', 1),
(8, '2023_12_28_231216_create_board_lists_table', 1),
(9, '2023_12_28_232438_create_card_comments_table', 1),
(10, '2023_12_28_232529_create_board_members_table', 1),
(11, '2023_12_28_232659_create_card_assigned_table', 1),
(12, '2024_01_09_143436_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_user_id` bigint UNSIGNED NOT NULL,
  `recipient_user_id` bigint UNSIGNED NOT NULL,
  `board_id` bigint UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('inprogress','reject','confirm') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inprogress',
  `inbox` tinyint(1) NOT NULL DEFAULT '1',
  `readed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_sender_user_id_foreign` (`sender_user_id`),
  KEY `notifications_recipient_user_id_foreign` (`recipient_user_id`),
  KEY `notifications_board_id_foreign` (`board_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_user_id`, `recipient_user_id`, `board_id`, `text`, `status`, `inbox`, `readed`, `created_at`, `updated_at`) VALUES
(25, 3, 1, 7, 'Khaled Abdullah  قام بدعوتك للإنضمام الى  <span class=\"invited-to-board\">تقدم<span>', 'confirm', 1, 1, '2024-01-19 09:13:01', '2024-01-19 09:13:21'),
(24, 3, 1, 7, 'Khaled Abdullah  قام بدعوتك للإنضمام الى  <span class=\"invited-to-board\">تقدم<span>', 'confirm', 0, 1, '2024-01-19 09:09:28', '2024-01-19 09:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'محمد خالد بن حازم', 'm-m201289@hotmail.com', NULL, '$2y$12$K1/FRbDaRBvhrrawK0WqweoFEJ1t3rbterAbKxX9VW73..i8p6Mli', '770485277', NULL, 'q8CmyYekKXup1fATtN3aOPo5IZbznAnNI0NWeu054TYZ7y7es9cgVq4E5PHA', '2024-01-15 18:26:55', '2024-01-18 13:44:54'),
(2, 'Omer Salim', 'mo7ammedkhal3d@gmail.com', NULL, '$2y$12$jrPYoAYvag9uDzomptjt5u5rxcgD8s.NJRPzIT1u3CMOLDxmb.QFO', '777012165', NULL, NULL, '2024-01-16 06:20:37', '2024-01-16 06:20:37'),
(3, 'Khaled Abdullah', 'khaled2023@hotmail.com', NULL, '$2y$12$1vdCns2imy4bbFpKaQ8xbOjXdEFIRGbgEiw9P90ss4gIEMuCsLBz2', '733655488', NULL, NULL, '2024-01-16 07:30:20', '2024-01-16 07:30:20'),
(4, 'Ali Omer', 'Ali2023@hotmail.com', NULL, '$2y$12$L5lW3nL7h3HWzN5yD0QKG.Jcq3ZAm11NTUpzYf2q0cVLA5/EUV7Zu', '701074479', NULL, NULL, '2024-01-16 07:31:25', '2024-01-16 07:31:25'),
(5, 'محمد مزهر الديني', 'muhammed2024@gmail.com', NULL, '$2y$12$n4PhJWpPwwXg5aBO0Wh99eOHq3jSW2yFmkYvm8EgJRy4EgpFUMflO', '711300411', NULL, NULL, '2024-01-18 18:25:30', '2024-01-18 18:25:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
