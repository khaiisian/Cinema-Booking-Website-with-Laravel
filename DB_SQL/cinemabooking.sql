-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 12:14 PM
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
-- Database: `cinemabooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `booking_code` varchar(255) DEFAULT NULL,
  `booking_status` varchar(255) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `showtime_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`deleted_at`, `booking_id`, `booking_code`, `booking_status`, `total_price`, `u_id`, `showtime_id`, `created_at`, `updated_at`) VALUES
(NULL, 5, NULL, 'canceled', 10000.00, 2, 62, NULL, '2025-01-09 07:12:25'),
(NULL, 7, 'B677aca4c', 'canceled', 10000.00, 2, 65, '2025-01-05 18:07:08', '2025-01-09 08:37:10'),
(NULL, 8, 'B677acaec', 'booked', 10000.00, 2, 68, '2025-01-05 18:09:48', '2025-01-05 18:09:48'),
(NULL, 9, 'B677acb0c', 'booked', 10000.00, 2, 74, '2025-01-05 18:10:20', '2025-01-05 18:10:20'),
(NULL, 10, 'B677f75dc', 'canceled', 45000.00, 2, 98, '2025-01-09 07:08:12', '2025-01-11 05:17:47'),
(NULL, 11, 'B677f83ec', 'booked', 20000.00, 2, 92, '2025-01-09 08:08:12', '2025-01-09 08:08:12'),
(NULL, 12, 'B6781fdf1', 'canceled', 20000.00, 2, 97, '2025-01-11 05:13:21', '2025-01-11 05:19:29'),
(NULL, 13, 'B6781fe15', 'booked', 20000.00, 2, 93, '2025-01-11 05:13:57', '2025-01-11 05:13:57'),
(NULL, 14, 'B6781ff76', 'booked', 30000.00, 2, 97, '2025-01-11 05:19:50', '2025-01-11 05:19:50'),
(NULL, 15, 'B678205e4', 'booked', 46000.00, 2, 115, '2025-01-11 05:47:16', '2025-01-11 05:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `booking_seats`
--

CREATE TABLE `booking_seats` (
  `booking_seat_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_seats`
--

INSERT INTO `booking_seats` (`booking_seat_id`, `booking_id`, `seat_id`, `created_at`, `updated_at`) VALUES
(11, 5, 1, NULL, NULL),
(13, 7, 1, NULL, NULL),
(14, 8, 4, NULL, NULL),
(15, 9, 10, NULL, NULL),
(16, 10, 202, NULL, NULL),
(17, 10, 203, NULL, NULL),
(18, 10, 204, NULL, NULL),
(19, 11, 31, NULL, NULL),
(20, 11, 32, NULL, NULL),
(21, 12, 1, NULL, NULL),
(22, 12, 2, NULL, NULL),
(23, 13, 1, NULL, NULL),
(24, 13, 2, NULL, NULL),
(25, 14, 209, NULL, NULL),
(26, 14, 210, NULL, NULL),
(27, 15, 231, NULL, NULL),
(28, 15, 232, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_msg` varchar(255) NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `genre_description` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`deleted_at`, `genre_id`, `genre`, `genre_description`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'Action', 'A genre characterized by high-energy sequences, intense battles, chases, and heroic feats, designed to thrill and entertain with fast-paced plots and adrenaline-pumping moments.', '2024-11-20 22:59:37', '2024-12-29 09:26:43'),
(NULL, 2, 'Comedy', 'don\'t start the sentence with comedy\r\nA storytelling genre that uses humor to entertain and amuse, comedy often showcases the oddities and peculiarities of life.', '2024-11-20 22:59:37', '2025-01-11 04:37:29'),
(NULL, 3, 'Drama', '', '2024-11-20 22:59:37', '2024-11-20 22:59:37'),
(NULL, 4, 'Horror', '', '2024-11-20 22:59:37', '2024-11-20 22:59:37'),
(NULL, 5, 'Science Fiction', '', '2024-11-20 22:59:37', '2024-11-20 22:59:37'),
(NULL, 6, 'Romance', '', '2024-11-20 22:59:37', '2024-11-20 22:59:37'),
(NULL, 7, 'Adventure', '', '2024-11-20 22:59:37', '2024-11-20 22:59:37'),
(NULL, 8, 'Fantasy', '', '2024-11-20 22:59:37', '2024-11-20 22:59:37'),
(NULL, 9, 'Thriller', '', '2024-11-20 22:59:37', '2024-11-20 22:59:37'),
(NULL, 10, 'Animation', '', '2024-11-20 22:59:37', '2024-11-20 22:59:37'),
('2025-01-11 04:31:58', 11, 'New genre', 'New Description', '2024-12-28 22:50:38', '2025-01-11 04:31:58'),
('2024-12-29 09:34:45', 12, 'Action', 'A genre characterized by high-energy sequences, intense battles, chases, and heroic feats, designed to thrill and entertain with fast-paced plots and adrenaline-pumping moments.', '2024-12-29 09:10:56', '2024-12-29 09:34:45'),
('2024-12-29 09:34:41', 13, 'Action', 'A genre characterized by high-energy sequences, intense battles, chases, and heroic feats, designed to thrill and entertain with fast-paced plots and adrenaline-pumping moments.', '2024-12-29 09:16:57', '2024-12-29 09:34:41'),
('2025-01-11 04:31:54', 14, 'New genre', 'ewrwre', '2025-01-11 04:29:02', '2025-01-11 04:31:54'),
('2025-01-11 04:29:07', 15, 'New genre', 'ewrwre', '2025-01-11 04:29:02', '2025-01-11 04:29:07'),
('2025-01-11 04:32:33', 16, 'New genre', 'RRRRRRRRRRRRRR', '2025-01-11 04:32:28', '2025-01-11 04:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `genre_movies`
--

CREATE TABLE `genre_movies` (
  `mgenre_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre_movies`
--

INSERT INTO `genre_movies` (`mgenre_id`, `genre_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(2, 2, 1, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(3, 3, 2, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(4, 1, 3, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(5, 5, 3, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(6, 6, 4, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(7, 7, 4, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(8, 8, 5, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(9, 9, 5, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(10, 2, 6, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(11, 4, 6, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(12, 3, 8, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(13, 8, 9, '2024-11-23 11:41:36', '2024-11-23 11:41:36'),
(14, 2, 2, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(15, 10, 2, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(16, 1, 4, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(17, 2, 4, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(18, 10, 5, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(19, 6, 5, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(20, 3, 6, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(21, 7, 7, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(22, 10, 7, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(23, 1, 8, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(24, 8, 8, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(25, 1, 9, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(26, 9, 9, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(27, 8, 10, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(28, 9, 10, '2024-11-24 00:53:34', '2024-11-24 00:53:34'),
(29, 9, 11, NULL, NULL),
(30, 5, 11, NULL, NULL),
(31, 10, 12, NULL, NULL),
(40, 2, 13, NULL, NULL),
(41, 6, 13, NULL, NULL),
(42, 10, 13, NULL, NULL),
(43, 4, 14, NULL, NULL),
(44, 5, 14, NULL, NULL),
(45, 9, 14, NULL, NULL),
(47, 7, 15, NULL, NULL),
(48, 2, 15, NULL, NULL),
(49, 9, 15, NULL, NULL),
(50, 4, 15, NULL, NULL),
(51, 4, 16, NULL, NULL),
(52, 10, 17, NULL, NULL),
(53, 3, 18, NULL, NULL),
(54, 10, 19, NULL, NULL),
(55, 4, 20, NULL, NULL),
(56, 7, 1, NULL, NULL);

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
(1, '2014_10_12_000001_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_02_070210_create_genres_table', 1),
(6, '2024_11_02_070615_create_movies_table', 1),
(7, '2024_11_02_072348_create_genere_movies_table', 1),
(8, '2024_11_02_181949_create_theaters_table', 1),
(9, '2024_11_02_182655_create_showtime_table', 1),
(10, '2024_11_02_212408_create_seat_types_table', 1),
(11, '2024_11_02_212633_create_seats_table', 1),
(12, '2024_11_03_130903_create_contactus_table', 1),
(13, '2024_11_03_134704_create_bookings_table', 1),
(14, '2024_11_03_143229_create_booking_seats_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `movie_title` varchar(150) NOT NULL,
  `movie_content` varchar(500) NOT NULL,
  `movie_image` varchar(255) DEFAULT NULL,
  `release_date` date NOT NULL,
  `movie_duration` decimal(6,2) NOT NULL,
  `movie_status` varchar(20) NOT NULL,
  `age_rating` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`deleted_at`, `movie_id`, `movie_title`, `movie_content`, `movie_image`, `release_date`, `movie_duration`, `movie_status`, `age_rating`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'The Equalizer 3', 'A former government assassin turned street-level vigilante fights crime in Southern Italy.', 'equalizer.jpg', '2024-11-15', 120.00, 'Showing', 'R', '2024-11-18 23:28:45', '2025-01-09 07:38:39'),
(NULL, 2, 'Inside Out 2', 'This heartwarming and imaginative film takes you inside the mind of a young girl, where her emotions - Joy, Sadness, Anger, Fear, and Disgust - navigate through the challenges of growing up and adjusting to a new city.', 'insideout2.jpg', '2024-10-20', 90.00, 'Showing', 'PG', '2024-11-19 01:17:01', '2024-11-19 01:17:01'),
(NULL, 3, 'Venom 3', 'Eddie Brock continues to navigate life with the alien symbiote Venom. They face new challenges and adversaries as they try to protect the world from a looming threat.', 'venom3.jpg', '2024-10-25', 120.00, 'Showing', 'PG-13', '2024-11-19 01:19:44', '2024-11-19 01:19:44'),
(NULL, 4, 'Red One', 'A holiday-themed action-comedy that follows a special team led by Dwayne Johnson and Chris Evans on a daring mission during the Christmas season. As they navigate a world filled with both festive cheer and high-stakes challenges, they must work together t', 'redone.jpg', '2023-11-17', 130.00, 'Showing', 'PG-13', '2024-11-18 23:28:45', '2024-11-18 23:28:45'),
(NULL, 5, 'The Garfield Movie', 'After Garfield\'s unexpected reunion with his long-lost father, scruffy street cat Vic, he and his canine friend Odie are forced from their perfectly pampered lives to join Vic on a hilarious, high-stakes heist. As they embark on this wild adventure, they', 'garfield.jpg', '2024-05-24', 130.00, 'Showing', 'PG', '2024-11-19 01:43:59', '2024-11-19 01:43:59'),
(NULL, 6, 'Joker: Folie à Deux', 'The sequel to the critically acclaimed \"Joker,\" this film explores the complex relationship between Arthur Fleck (Joaquin Phoenix) and Dr. Harleen Quinzel (Lady Gaga) as they navigate the dark corners of their minds and Gotham City. The story delves into', 'joker.jpg', '2024-10-04', 125.00, 'Showing', 'R', '2024-11-19 01:49:16', '2024-11-19 01:49:16'),
(NULL, 7, 'Moana 2', 'Moana embarks on a new adventure across the seas, facing mythical creatures and discovering new lands, all while protecting her home and people from new threats.', 'moana2.jpg', '2024-12-05', 120.00, 'Upcoming', 'PG', '2024-11-18 23:31:01', '2024-11-18 23:31:01'),
(NULL, 8, 'How to Train Your Dragon Live-Action Remake', 'A live-action adaptation of the beloved animated series, this film follows Hiccup and Toothless as they navigate a world where dragons and humans coexist.', 'hotd.jpg', '2024-12-25', 130.00, 'Upcoming', 'PG', '2024-11-18 23:31:01', '2024-11-18 23:31:01'),
(NULL, 9, 'John Wick: Ballerina', 'A spin-off from the John Wick universe, this film follows a young female assassin as she seeks revenge against those who killed her family.', 'ballerina.jpg', '2024-12-15', 120.00, 'Upcoming', 'R', '2024-11-18 23:31:01', '2024-11-18 23:31:01'),
(NULL, 10, 'A Minecraft Movie', 'In a world made entirely of blocks, a hero must save their homeland from the Ender Dragon, uncovering secrets and forming alliances along the way.', 'minecraft.jpg', '2024-11-20', 108.00, 'Upcoming', 'PG', '2024-11-18 23:31:01', '2024-11-18 23:31:01'),
('2024-12-18 18:13:28', 11, 'testing Movie', 'Testing', 'me.jpg', '2024-12-28', 300.00, 'showing', 'P', '2024-12-18 18:12:21', '2024-12-18 18:13:28'),
('2024-12-18 18:41:45', 12, 'image remove', 'image remove', 'greatWall.jpg', '2024-12-29', 342.00, 'showing', 'PR', '2024-12-18 18:41:27', '2024-12-18 18:41:45'),
('2024-12-20 10:19:43', 13, 'Update testing', 'Update testing', 'Bagan.jpg', '2025-01-30', 455.00, 'Showing', 'PR8', '2024-12-18 21:07:37', '2024-12-20 10:19:43'),
('2024-12-21 07:48:34', 14, 'New Movie', 'kdsafhlkjdsahflkjsahg', '1beef79c0678fdefc5ea24852d81393b.jpg', '2025-01-15', 120.00, 'Upcoming', 'PG-13', '2024-12-20 10:30:35', '2024-12-21 07:48:34'),
('2025-01-09 07:25:01', 15, 'Nyein\'s Movie', 'Nyein\'s Content', '1beef79c0678fdefc5ea24852d81393b.jpg', '2025-01-15', 320.00, 'Showing', 'PRG', '2024-12-21 07:55:03', '2025-01-09 07:25:01'),
('2025-01-09 07:27:04', 16, 'testing', 'testing', '441044496_754930386845631_2183264507511332015_n.jpg', '2025-01-31', 120.00, 'Upcoming', 'PG-13', '2025-01-09 07:26:19', '2025-01-09 07:27:04'),
('2025-01-09 07:34:04', 17, 'testing Movie', 'asfdasdf', '441044496_754930386845631_2183264507511332015_n.jpg', '2025-01-12', 34.00, 'Showing', 'PR8', '2025-01-09 07:33:11', '2025-01-09 07:34:04'),
('2025-01-09 07:43:51', 18, 'testing Movie', 'tewrt', '441044496_754930386845631_2183264507511332015_n.jpg', '2025-01-23', 342.00, 'Showing', 'PRT', '2025-01-09 07:35:11', '2025-01-09 07:43:51'),
('2025-01-09 07:45:10', 19, 'testing', 'testing', '441044496_754930386845631_2183264507511332015_n.jpg', '2025-01-22', 200.00, 'Showing', 'PR8', '2025-01-09 07:44:50', '2025-01-09 07:45:10'),
(NULL, 20, 'testing Movie', 'testing', '441044496_754930386845631_2183264507511332015_n.jpg', '2025-01-26', 80.00, 'Showing', 'PRT', '2025-01-09 07:48:31', '2025-01-09 07:48:31');

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
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `seat_code` varchar(255) NOT NULL,
  `seat_status` varchar(255) NOT NULL,
  `seat_type_id` bigint(20) UNSIGNED NOT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`deleted_at`, `seat_id`, `seat_code`, `seat_status`, `seat_type_id`, `theater_id`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'A001', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 2, 'A002', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 3, 'A003', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 4, 'A004', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 5, 'A005', 'usable', 1, 1, '2024-11-29 07:00:00', '2025-01-06 07:05:46'),
(NULL, 6, 'A006', 'usable', 1, 1, '2024-11-29 07:00:00', '2025-01-04 21:12:59'),
(NULL, 7, 'A007', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 8, 'A008', 'maintenance', 1, 1, '2024-11-29 07:00:00', '2025-01-07 05:39:54'),
(NULL, 9, 'A009', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 10, 'A010', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 11, 'A011', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 12, 'A012', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 13, 'B001', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 14, 'B002', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 15, 'B003', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 16, 'B004', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 17, 'B005', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 18, 'B006', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 19, 'B007', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 20, 'B008', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 21, 'B009', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 22, 'B010', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 23, 'B011', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 24, 'B012', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 25, 'C001', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 26, 'C002', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 27, 'C003', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 28, 'C004', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 29, 'C005', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 30, 'C006', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 31, 'C007', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 32, 'C008', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 33, 'C009', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 34, 'C010', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 35, 'C011', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 36, 'C012', 'usable', 1, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 37, 'D001', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 38, 'D002', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 39, 'D003', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 40, 'D004', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 41, 'D005', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 42, 'D006', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 43, 'D007', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 44, 'D008', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 45, 'D009', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 46, 'D010', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 47, 'D011', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 48, 'D012', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 49, 'E001', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 50, 'E002', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 51, 'E003', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 52, 'E004', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 53, 'E005', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 54, 'E006', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 55, 'E007', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 56, 'E008', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 57, 'E009', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 58, 'E010', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 59, 'E011', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 60, 'E012', 'usable', 2, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 61, 'F001', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 62, 'F002', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 63, 'F003', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 64, 'F004', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 65, 'F005', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 66, 'F006', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 67, 'F007', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 68, 'F008', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 69, 'F009', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 70, 'F010', 'usable', 3, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 71, 'G001', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 72, 'G002', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 73, 'G003', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 74, 'G004', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 75, 'G005', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 76, 'G006', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 77, 'G007', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 78, 'G008', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 79, 'G009', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 80, 'G010', 'usable', 4, 1, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 161, 'A001', 'maintenance', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 162, 'A002', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 163, 'A003', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 164, 'A004', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 165, 'A005', 'maintenance', 1, 2, '2024-11-29 07:00:00', '2025-01-05 09:25:58'),
(NULL, 166, 'A006', 'usable', 1, 2, '2024-11-29 07:00:00', '2025-01-04 21:12:59'),
(NULL, 167, 'A007', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 168, 'A008', 'usable', 1, 2, '2024-11-29 07:00:00', '2025-01-11 05:56:14'),
(NULL, 169, 'A009', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 170, 'A010', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 171, 'A011', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 172, 'A012', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 173, 'B001', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 174, 'B002', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 175, 'B003', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 176, 'B004', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 177, 'B005', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 178, 'B006', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 179, 'B007', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 180, 'B008', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 181, 'B009', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 182, 'B010', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 183, 'B011', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 184, 'B012', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 185, 'C001', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 186, 'C002', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 187, 'C003', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 188, 'C004', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 189, 'C005', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 190, 'C006', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 191, 'C007', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 192, 'C008', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 193, 'C009', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 194, 'C010', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 195, 'C011', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 196, 'C012', 'usable', 1, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 197, 'D001', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 198, 'D002', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 199, 'D003', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 200, 'D004', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 201, 'D005', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 202, 'D006', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 203, 'D007', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 204, 'D008', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 205, 'D009', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 206, 'D010', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 207, 'D011', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 208, 'D012', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 209, 'E001', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 210, 'E002', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 211, 'E003', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 212, 'E004', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 213, 'E005', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 214, 'E006', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 215, 'E007', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 216, 'E008', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 217, 'E009', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 218, 'E010', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 219, 'E011', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 220, 'E012', 'usable', 2, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 221, 'F001', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 222, 'F002', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 223, 'F003', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 224, 'F004', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 225, 'F005', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 226, 'F006', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 227, 'F007', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 228, 'F008', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 229, 'F009', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 230, 'F010', 'usable', 3, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 231, 'G001', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 232, 'G002', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 233, 'G003', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 234, 'G004', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 235, 'G005', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 236, 'G006', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 237, 'G007', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 238, 'G008', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 239, 'G009', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00'),
(NULL, 240, 'G010', 'usable', 4, 2, '2024-11-29 07:00:00', '2024-11-29 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seat_types`
--

CREATE TABLE `seat_types` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `seat_type_id` bigint(20) UNSIGNED NOT NULL,
  `seat_type` varchar(255) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_types`
--

INSERT INTO `seat_types` (`deleted_at`, `seat_type_id`, `seat_type`, `price`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'Standard Seats', 10000.00, '2024-11-29 06:59:00', '2024-11-29 06:59:00'),
(NULL, 2, 'Premium Seats', 15000.00, '2024-11-29 06:59:00', '2024-11-29 06:59:00'),
(NULL, 3, 'VIP Seats', 20000.00, '2024-11-29 06:59:00', '2024-11-29 06:59:00'),
(NULL, 4, 'Couple Seats', 23000.00, '2024-11-29 06:59:00', '2024-11-29 06:59:00'),
(NULL, 5, 'TESTING', 100.00, '2024-12-29 10:21:03', '2025-01-11 06:04:58'),
('2025-01-11 06:01:26', 6, 'Testing Seat Type', 200.00, '2024-12-29 10:21:19', '2025-01-11 06:01:26'),
('2025-01-11 06:01:22', 7, 'Testing Seat Type', 250.00, '2024-12-29 13:23:20', '2025-01-11 06:01:22'),
('2024-12-29 18:44:06', 8, 'Testing Seat Type', 300.00, '2024-12-29 18:39:01', '2024-12-29 18:44:06'),
('2024-12-29 18:44:04', 9, 'Testing Seat Type', 500.00, '2024-12-29 18:39:09', '2024-12-29 18:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `showtime_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `showtime_start` time NOT NULL,
  `showtime_end` time NOT NULL,
  `showtime_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`deleted_at`, `showtime_id`, `movie_id`, `theater_id`, `showtime_start`, `showtime_end`, `showtime_date`, `created_at`, `updated_at`) VALUES
(NULL, 50, 1, 1, '09:00:00', '11:00:00', '2025-01-04', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 51, 6, 1, '12:00:00', '14:04:59', '2025-01-04', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 52, 5, 1, '15:04:59', '17:04:59', '2025-01-04', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 53, 4, 2, '09:00:00', '11:10:00', '2025-01-04', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 54, 2, 2, '12:10:00', '13:40:00', '2025-01-04', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 55, 3, 2, '14:40:00', '16:40:00', '2025-01-04', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 56, 4, 1, '09:00:00', '11:10:00', '2025-01-05', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 57, 1, 1, '12:10:00', '14:10:00', '2025-01-05', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 58, 5, 1, '15:10:00', '17:10:00', '2025-01-05', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 59, 6, 2, '09:00:00', '11:04:59', '2025-01-05', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 60, 2, 2, '12:04:59', '13:34:59', '2025-01-05', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 61, 3, 2, '14:34:59', '16:34:59', '2025-01-05', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 62, 1, 1, '09:00:00', '11:00:00', '2025-01-06', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 63, 3, 1, '12:00:00', '14:00:00', '2025-01-06', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 64, 6, 1, '15:00:00', '17:04:59', '2025-01-06', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 65, 4, 2, '09:00:00', '11:10:00', '2025-01-06', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 66, 2, 2, '12:10:00', '13:40:00', '2025-01-06', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 67, 5, 2, '14:40:00', '16:40:00', '2025-01-06', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 68, 2, 1, '09:00:00', '10:30:00', '2025-01-07', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 69, 1, 1, '11:30:00', '13:30:00', '2025-01-07', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 70, 3, 1, '14:30:00', '16:30:00', '2025-01-07', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 71, 6, 2, '09:00:00', '11:04:59', '2025-01-07', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 72, 5, 2, '12:04:59', '14:04:59', '2025-01-07', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 73, 4, 2, '15:04:59', '17:15:00', '2025-01-07', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 74, 5, 1, '09:00:00', '11:00:00', '2025-01-08', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 75, 2, 1, '12:00:00', '13:30:00', '2025-01-08', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 76, 1, 1, '14:30:00', '16:30:00', '2025-01-08', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 77, 4, 2, '09:00:00', '11:10:00', '2025-01-08', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 78, 3, 2, '12:10:00', '14:10:00', '2025-01-08', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 79, 6, 2, '15:10:00', '17:15:00', '2025-01-08', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 80, 3, 1, '09:00:00', '11:00:00', '2025-01-09', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 81, 1, 1, '12:00:00', '14:00:00', '2025-01-09', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 82, 6, 1, '15:00:00', '17:04:59', '2025-01-09', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 83, 4, 2, '09:00:00', '11:10:00', '2025-01-09', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 84, 2, 2, '12:10:00', '13:40:00', '2025-01-09', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 85, 5, 2, '14:40:00', '16:40:00', '2025-01-09', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 86, 6, 1, '09:00:00', '11:04:59', '2025-01-10', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 87, 3, 1, '12:04:59', '14:04:59', '2025-01-10', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 88, 2, 1, '15:04:59', '16:34:59', '2025-01-10', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 89, 4, 2, '09:00:00', '11:10:00', '2025-01-10', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 90, 1, 2, '12:10:00', '14:10:00', '2025-01-10', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 91, 5, 2, '15:10:00', '17:10:00', '2025-01-10', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 92, 3, 1, '09:00:00', '11:00:00', '2025-01-11', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 93, 2, 1, '12:00:00', '13:30:00', '2025-01-11', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 94, 5, 1, '14:30:00', '16:30:00', '2025-01-11', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 95, 1, 2, '09:00:00', '11:00:00', '2025-01-11', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 96, 4, 2, '12:00:00', '14:10:00', '2025-01-11', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 97, 6, 2, '15:10:00', '17:15:00', '2025-01-11', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 98, 6, 1, '09:00:00', '11:04:59', '2025-01-12', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 99, 4, 1, '12:04:59', '14:15:00', '2025-01-12', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 100, 5, 1, '15:15:00', '17:15:00', '2025-01-12', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 101, 2, 2, '09:00:00', '10:30:00', '2025-01-12', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 102, 1, 2, '11:30:00', '13:30:00', '2025-01-12', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 103, 3, 2, '14:30:00', '16:30:00', '2025-01-12', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 104, 5, 1, '09:00:00', '11:00:00', '2025-01-13', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 105, 3, 1, '12:00:00', '14:00:00', '2025-01-13', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 106, 4, 1, '15:00:00', '17:10:00', '2025-01-13', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 107, 2, 2, '09:00:00', '10:30:00', '2025-01-13', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 108, 1, 2, '11:30:00', '13:30:00', '2025-01-13', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 109, 6, 2, '14:30:00', '16:34:59', '2025-01-13', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 110, 6, 1, '09:00:00', '11:04:59', '2025-01-14', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 111, 3, 1, '12:04:59', '14:04:59', '2025-01-14', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 112, 1, 1, '15:04:59', '17:04:59', '2025-01-14', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 113, 2, 2, '09:00:00', '10:30:00', '2025-01-14', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 114, 4, 2, '11:30:00', '13:40:00', '2025-01-14', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 115, 5, 2, '14:40:00', '16:40:00', '2025-01-14', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 116, 5, 1, '09:00:00', '11:00:00', '2025-01-15', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 117, 3, 1, '12:00:00', '14:00:00', '2025-01-15', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 118, 1, 1, '15:00:00', '17:00:00', '2025-01-15', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 119, 4, 2, '09:00:00', '11:10:00', '2025-01-15', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 120, 2, 2, '12:10:00', '13:40:00', '2025-01-15', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 121, 6, 2, '14:40:00', '16:45:00', '2025-01-15', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 122, 1, 1, '09:00:00', '11:00:00', '2025-01-16', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 123, 3, 1, '12:00:00', '14:00:00', '2025-01-16', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 124, 6, 1, '15:00:00', '17:04:59', '2025-01-16', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 125, 2, 2, '09:00:00', '10:30:00', '2025-01-16', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 126, 4, 2, '11:30:00', '13:40:00', '2025-01-16', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 127, 5, 2, '14:40:00', '16:40:00', '2025-01-16', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 128, 6, 1, '09:00:00', '11:04:59', '2025-01-17', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 129, 4, 1, '12:04:59', '14:15:00', '2025-01-17', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 130, 5, 1, '15:15:00', '17:15:00', '2025-01-17', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 131, 1, 2, '09:00:00', '11:00:00', '2025-01-17', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 132, 2, 2, '12:00:00', '13:30:00', '2025-01-17', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 133, 3, 2, '14:30:00', '16:30:00', '2025-01-17', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 134, 2, 1, '09:00:00', '10:30:00', '2025-01-18', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 135, 4, 1, '11:30:00', '13:40:00', '2025-01-18', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 136, 1, 1, '14:40:00', '16:40:00', '2025-01-18', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 137, 3, 2, '09:00:00', '11:00:00', '2025-01-18', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 138, 5, 2, '12:00:00', '14:00:00', '2025-01-18', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 139, 6, 2, '15:00:00', '17:04:59', '2025-01-18', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 140, 1, 1, '09:00:00', '11:00:00', '2025-01-19', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 141, 3, 1, '12:00:00', '14:00:00', '2025-01-19', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 142, 2, 1, '15:00:00', '16:30:00', '2025-01-19', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 143, 6, 2, '09:00:00', '11:04:59', '2025-01-19', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 144, 5, 2, '12:04:59', '14:04:59', '2025-01-19', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 145, 4, 2, '15:04:59', '17:15:00', '2025-01-19', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 146, 2, 1, '09:00:00', '10:30:00', '2025-01-20', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 147, 6, 1, '11:30:00', '13:34:59', '2025-01-20', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 148, 5, 1, '14:34:59', '16:34:59', '2025-01-20', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 149, 4, 2, '09:00:00', '11:10:00', '2025-01-20', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 150, 1, 2, '12:10:00', '14:10:00', '2025-01-20', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 151, 3, 2, '15:10:00', '17:10:00', '2025-01-20', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 152, 3, 1, '09:00:00', '11:00:00', '2025-01-21', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 153, 4, 1, '12:00:00', '14:10:00', '2025-01-21', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 154, 5, 1, '15:10:00', '17:10:00', '2025-01-21', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 155, 6, 2, '09:00:00', '11:04:59', '2025-01-21', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 156, 1, 2, '12:04:59', '14:04:59', '2025-01-21', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 157, 2, 2, '15:04:59', '16:34:59', '2025-01-21', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 158, 5, 1, '09:00:00', '11:00:00', '2025-01-22', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 159, 1, 1, '12:00:00', '14:00:00', '2025-01-22', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 160, 4, 1, '15:00:00', '17:10:00', '2025-01-22', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 161, 6, 2, '09:00:00', '11:04:59', '2025-01-22', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 162, 2, 2, '12:04:59', '13:34:59', '2025-01-22', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 163, 3, 2, '14:34:59', '16:34:59', '2025-01-22', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 164, 5, 1, '09:00:00', '11:00:00', '2025-01-23', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 165, 4, 1, '12:00:00', '14:10:00', '2025-01-23', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 166, 3, 1, '15:10:00', '17:10:00', '2025-01-23', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 167, 2, 2, '09:00:00', '10:30:00', '2025-01-23', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 168, 1, 2, '11:30:00', '13:30:00', '2025-01-23', '2025-01-03 01:34:31', '2025-01-03 01:34:31'),
(NULL, 169, 6, 2, '14:30:00', '16:34:59', '2025-01-23', '2025-01-03 01:34:31', '2025-01-03 01:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

CREATE TABLE `theaters` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `theater_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`deleted_at`, `theater_id`, `theater_name`, `capacity`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'Theater A', 80, '2024-11-18 03:13:17', '2024-12-29 18:35:13'),
(NULL, 2, 'Theater B', 81, '2024-11-18 03:13:17', '2025-01-11 04:26:52'),
('2024-12-29 18:37:59', 3, 'Testing', 80, '2024-12-29 18:25:06', '2024-12-29 18:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `u_code` varchar(255) DEFAULT NULL,
  `u_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `u_type` varchar(255) NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`deleted_at`, `u_id`, `u_code`, `u_name`, `email`, `email_verified_at`, `password`, `acc_name`, `u_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(NULL, 1, NULL, 'admin', 'admin@gmail.com', NULL, '$2y$12$PwUGa8JKg8uATbuCmJpyVOZgqsoFzxC/K2R9rJD77h5IW2kTc1kz.', 'admin_01', 'admin', 'y6lfDFZgo59zBopzHqcD0KLX60L3uKKEFeUe9SdoQYnVwJOlS6Mzj8hfmZhA', NULL, '2025-01-08 18:33:21'),
(NULL, 2, 'U_6763ce15', 'Khai', 'khai@gmail.com', NULL, '$2y$12$eR7XgOxQ6doCasyvrPuFp.a5hcyIKY8rn4FpTI2PkV3mjR7lc0lmq', 'Khai_08020', 'customer', NULL, '2024-12-19 07:41:09', '2025-01-11 06:18:39'),
('2025-01-08 18:35:44', 3, NULL, 'test_user', 'testing@gmail.com', NULL, '08022003', 'tester', 'customer', NULL, NULL, '2025-01-08 18:35:44'),
('2025-01-11 06:15:26', 4, 'U_67820bd6', 'Nyein Thawdar Swe', 'nancy@gmail.com', NULL, '$2y$12$BGVIhVx3yAghKMReuoC3gucGR4Tl9qrINi8./pAwBWyzAFx8Y832W', 'Khai\'s bae', 'customer', NULL, '2025-01-11 06:12:38', '2025-01-11 06:15:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `bookings_booking_code_unique` (`booking_code`),
  ADD KEY `bookings_u_id_foreign` (`u_id`),
  ADD KEY `bookings_showtime_id_foreign` (`showtime_id`);

--
-- Indexes for table `booking_seats`
--
ALTER TABLE `booking_seats`
  ADD PRIMARY KEY (`booking_seat_id`),
  ADD KEY `booking_seats_booking_id_foreign` (`booking_id`),
  ADD KEY `booking_seats_seat_id_foreign` (`seat_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `contactus_u_id_foreign` (`u_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `genre_movies`
--
ALTER TABLE `genre_movies`
  ADD PRIMARY KEY (`mgenre_id`),
  ADD KEY `genre_movies_genre_id_foreign` (`genre_id`),
  ADD KEY `genre_movies_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

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
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `seats_seat_type_id_foreign` (`seat_type_id`),
  ADD KEY `seats_theater_id_foreign` (`theater_id`);

--
-- Indexes for table `seat_types`
--
ALTER TABLE `seat_types`
  ADD PRIMARY KEY (`seat_type_id`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`showtime_id`),
  ADD KEY `showtimes_movie_id_foreign` (`movie_id`),
  ADD KEY `showtimes_theater_id_foreign` (`theater_id`);

--
-- Indexes for table `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`theater_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_u_code_unique` (`u_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `booking_seats`
--
ALTER TABLE `booking_seats`
  MODIFY `booking_seat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `genre_movies`
--
ALTER TABLE `genre_movies`
  MODIFY `mgenre_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `seat_types`
--
ALTER TABLE `seat_types`
  MODIFY `seat_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `theater_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_showtime_id_foreign` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`showtime_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_seats`
--
ALTER TABLE `booking_seats`
  ADD CONSTRAINT `booking_seats_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_seats_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`) ON DELETE CASCADE;

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `contactus_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `genre_movies`
--
ALTER TABLE `genre_movies`
  ADD CONSTRAINT `genre_movies_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `genre_movies_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_seat_type_id_foreign` FOREIGN KEY (`seat_type_id`) REFERENCES `seat_types` (`seat_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seats_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`theater_id`) ON DELETE CASCADE;

--
-- Constraints for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `showtimes_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`theater_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
