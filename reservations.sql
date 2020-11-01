-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 12:06 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservations`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `ar_description`, `en_description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Reprehenderit aut mo', 'Minima laborum Qui', 'K7a4mhAygLgfMxLr31j2NcO0BwJS1e6ENyrdJNlW.jpeg', '2020-08-23 15:57:17', '2020-08-23 15:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@app.com', '$2y$10$nPQQ8Faa98SM.flD8nDubePd3k4cYwMzId2lMqxTOQ2p/RLRXvRdG', 'avatar.png', 0, NULL, '2020-08-23 12:57:14', '2020-08-23 12:57:14'),
(2, 'Ginger Curtis', 'vikip@mailinator.com', '$2y$10$amF3NMMYPcEmD5LGAGHao.Oras3we.cUkQFKCqeHgdOkTET4aVTVe', 'q2wC1a7BwHdWyPMXqZGTostxobQ6Q6FDCACx1mFf.jpeg', 1, NULL, '2020-08-23 13:00:24', '2020-08-24 13:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `appointment` time NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `user_id`, `day`, `appointment`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-08-23', '18:00:00', 2, 200, '2020-08-23 13:02:25', '2020-08-23 13:02:25'),
(2, 2, 1, '2020-08-23', '17:00:00', 1, 200, '2020-08-23 13:03:21', '2020-08-23 13:03:21'),
(3, 2, 1, '2020-08-24', '21:30:00', 0, 150, '2020-08-23 13:05:36', '2020-08-23 13:05:36'),
(4, 2, 1, '2020-08-23', '17:30:00', 2, 200, '2020-08-24 14:12:08', '2020-08-24 14:12:08'),
(8, 2, 1, '2020-09-06', '18:30:00', 2, 200, '2020-09-06 12:51:03', '2020-09-06 12:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_notifications`
--

CREATE TABLE `appointment_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_notifications`
--

INSERT INTO `appointment_notifications` (`id`, `user_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, ' Make an appointment at6:30 PM', 1, '2020-09-06 11:52:41', '2020-09-06 11:52:41'),
(4, 1, ' Make an appointment at 6:30 PM', 1, '2020-09-06 12:51:03', '2020-09-06 12:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `ar_author`, `en_author`, `ar_title`, `en_title`, `ar_content`, `en_content`, `ar_meta_tag`, `en_meta_tag`, `image`, `created_at`, `updated_at`) VALUES
(1, 'In dolor aut eligend', 'Vitae accusantium qu', 'Quo nihil eu reprehe', 'Animi eius voluptat', '<p>Mollitia est nostrum.</p>', '<p>Ipsum inventore temp.</p>', 'Quam culpa nulla dol', 'Consequatur cum cill', 'gkuT1YNWf84KuQ9WGVHpmtequacIk73rSJpNNvUP.jpeg', '2020-08-24 09:53:33', '2020-08-24 09:53:33'),
(2, 'Non excepteur eaque', 'Ad incididunt assume', 'Cum adipisci sint l', 'Qui aut deserunt est', '<p>Ut magna ea ut conse.</p>', '<p>Nesciunt, sequi est .</p>', 'Ipsa ut nisi volupt', 'Ut est molestiae es', 'd9ZrChejS4bth0EI1SsHH6A5bOx1NFvW3qxqV8OJ.jpeg', '2020-08-24 09:54:00', '2020-08-24 09:54:50'),
(3, 'Dolor vitae ut quis', 'Saepe esse adipisic', 'Voluptatem magnam e', 'Voluptatum aliqua D', '<p>Quidem illum, nemo a.</p>', '<p>Mollitia qui in et u.</p>', 'Lorem consectetur un', 'In illum delectus', 'prTYKl5UilKO8p1Rmnq035963OsMupl9KTfSeTJU.jpeg', '2020-08-24 09:54:25', '2020-08-24 09:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `client_histories`
--

CREATE TABLE `client_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_case` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_case` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'MFVBLgb25EDrzBVLce3F2HKwz5SPFnOGzwSOcRH2.png', '2020-08-24 10:35:18', '2020-08-25 12:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_07_27_122405_create_sliders_table', 1),
(4, '2020_07_27_150345_create_services_table', 1),
(5, '2020_07_28_111253_create_abouts_table', 1),
(6, '2020_07_28_111604_create_testimonials_table', 1),
(7, '2020_07_28_112621_create_contacts_table', 1),
(8, '2020_07_28_151051_create_blogs_table', 1),
(9, '2020_07_28_175733_create_team_members_table', 1),
(10, '2020_07_29_140143_create_projects_table', 1),
(11, '2020_08_04_091617_create_website_settings_table', 1),
(12, '2020_08_04_114528_create_logos_table', 1),
(13, '2020_08_10_124838_create_visitors_table', 1),
(14, '2020_08_12_113818_create_themes_table', 1),
(15, '2020_08_12_172309_create_contactuses_table', 1),
(16, '2020_08_16_141856_create_admins_table', 1),
(17, '2020_08_17_104400_create_client_histories_table', 1),
(18, '2020_08_17_141121_create_reservations_table', 1),
(19, '2020_08_19_124111_create_appointments_table', 1),
(21, '2020_09_06_125925_create_appointment_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `waiting_time` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `doctor_id`, `day`, `start_time`, `end_time`, `waiting_time`, `price`, `creator`, `created_at`, `updated_at`) VALUES
(1, 2, '2020-09-06', '17:00:00', '20:00:00', 30, 200, 'Admin', '2020-09-06 13:37:47', '2020-08-23 13:01:08'),
(2, 2, '2020-09-07', '21:00:00', '23:30:00', 15, 150, 'Admin', '2020-09-07 13:01:52', '2020-08-23 13:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `ar_meta_tag`, `en_meta_tag`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Saepe autem unde qui', 'Est fuga Error accu', 'Accusamus voluptatem', 'Est laborum pariatur', 'Laborum et dolor ali', 'Impedit sunt imped', 'aVW0awxnNMghQxVRNUKauAbbOWT9xd93DOIMvj7o.jpeg', '2020-08-24 08:56:44', '2020-08-25 11:18:38'),
(2, 'Assumenda et sit exc', 'Eum corrupti error', 'In eum in illum nob', 'Consectetur minima', 'Harum est dolorum u', 'Aut eum velit corru', '8fdtNHWS2dRRVBVspQYi6uWYVWf9aVCpOAlecCvj.jpeg', '2020-08-24 08:57:00', '2020-08-25 11:19:12'),
(3, 'Consequatur quidem d', 'Ut suscipit tempore', 'At itaque vel porro', 'A sint pariatur Iu', 'Sunt quod ad enim r', 'Voluptatem adipisci', '8fdtNHWS2dRRVBVspQYi6uWYVWf9aVCpOAlecCvj.jpeg', '2020-08-24 08:57:16', '2020-08-24 08:57:16'),
(4, 'Voluptas vel dicta n', 'Est molestiae molest', 'Doloremque quo sit d', 'Voluptatibus sint e', 'Modi laudantium eaq', 'Aut mollitia eiusmod', 'aVW0awxnNMghQxVRNUKauAbbOWT9xd93DOIMvj7o.jpeg', '2020-08-24 08:57:30', '2020-08-24 08:57:30'),
(5, 'Accusamus est nulla', 'Aliquid consequuntur', 'Possimus quis conse', 'Necessitatibus bland', 'Officia molestias di', 'Molestiae fugit vel', '8fdtNHWS2dRRVBVspQYi6uWYVWf9aVCpOAlecCvj.jpeg', '2020-08-24 08:57:44', '2020-08-24 08:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Veritatis cupidatat', 'Quod consectetur no', 'Quibusdam enim esse', 'Mollitia veniam sed', 'Skx8hDruxdGE9dHOAkr617kjRRq2ZtfKEVgM1OGb.jpeg', '2020-08-23 15:46:14', '2020-08-23 15:46:14'),
(2, 'Enim ducimus conseq', 'Ipsam modi fugiat as', 'Laboris voluptate mo', 'Labore iure velit qu', 'XWM7vuqkCpCIvFCO2hnPDppZ142VDvJdyS2XqmDh.jpeg', '2020-08-23 15:49:12', '2020-08-23 15:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `ar_name`, `en_name`, `ar_title`, `en_title`, `ar_description`, `en_description`, `role`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kelly Pugh', 'Hadley Newton', 'Necessitatibus nulla', 'Laboris vel quasi vo', 'Aut culpa laboriosa', 'Dolorum quam archite', 1, 'CSuVzusZ1xelcUK3YbL35WkUgOvMBCxDSxmcrRhZ.jpeg', '2020-08-24 09:15:52', '2020-08-24 09:15:52'),
(2, 'Jocelyn Farrell', 'Grant Sweeney', 'Aut cumque aliqua N', 'Et reprehenderit se', 'Pariatur Obcaecati', 'Ratione quo ullam od', 2, '1jmvYSirTNYRLbvCW47Q8ZGS1LbnlXTsaj3zq2xM.png', '2020-08-24 09:16:20', '2020-08-24 09:16:20'),
(3, 'Drake Mendez', 'Galvin Gallegos', 'Dolor sint dolore ad', 'Nesciunt consectetu', 'Eveniet eligendi vo', 'Rerum ut explicabo', 1, 'ZYOHkUqyF2l5coWyuArfjn7o7K1vIF5CId9t1xkH.jpeg', '2020-08-24 09:16:42', '2020-08-24 09:16:42'),
(4, 'Elizabeth Norton', 'Mary Buck', 'Nesciunt et odio ea', 'Voluptatem eos vol', 'Autem architecto ull', 'Eos veniam ullamco', 2, '7cZZmBVUrJKKYdtuEsPBA4bgZf4zdcQ45rnejo9A.jpeg', '2020-08-24 09:17:02', '2020-08-24 09:17:02'),
(5, 'Daniel Daniels', 'Eugenia Bray', 'Laborum dolore dolor', 'Dolore et sit alias', 'Similique tempor nul', 'Blanditiis veritatis', 2, '7217iug2qjNG8XNuYKLYufXmBuc3cja7tuZLTJoo.jpeg', '2020-08-25 11:18:01', '2020-08-25 11:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `ar_name`, `en_name`, `ar_title`, `en_title`, `ar_description`, `en_description`, `ar_meta_tag`, `en_meta_tag`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Josiah Williams', 'Odette Rose', 'Eius mollit omnis na', 'Aliquam temporibus n', 'Doloremque eum sunt', 'Et magnam exercitati', 'Et sint cum molestia', 'Molestiae consequat', '3ORIfbZCdzPuBXpHKlEZwAg7CSHvHCXpjkcYMsKO.jpeg', '2020-08-24 09:42:22', '2020-08-24 09:42:22'),
(2, 'Adrian Mcpherson', 'Indigo Ballard', 'Qui non consequuntur', 'Nihil blanditiis vol', 'In ducimus aut adip', 'Sunt culpa officia', 'Pariatur Et volupta', 'Voluptatem Ut aut a', 'PsKP0QEDM4Gw9Q2KmbVtRrIoFjd30IVGqXTzk3aL.jpeg', '2020-08-24 09:42:45', '2020-08-24 09:42:45'),
(3, 'Yen Waller', 'Driscoll Patrick', 'In labore tenetur al', 'Mollitia tenetur ver', 'Consequatur iusto n', 'Quia quaerat aute au', 'Magnam accusantium p', 'Adipisicing illo ea', 'oW0hGF5QSCTfhMC0YUX7yQ8WdktQ0LS6LYYwHgR5.jpeg', '2020-08-24 09:43:09', '2020-08-24 09:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `ar_title`, `en_title`, `status`, `created_at`, `updated_at`) VALUES
(13, 'الأول', 'first', 1, '2020-08-23 14:24:25', '2020-08-23 14:36:07'),
(14, 'الثاني', 'second', 0, '2020-08-23 14:24:25', '2020-08-23 14:24:25'),
(15, 'الثالث', 'third', 0, '2020-08-23 14:24:26', '2020-08-23 14:24:26'),
(16, 'الرابع', 'fourth', 0, '2020-08-23 14:24:26', '2020-08-23 14:24:26'),
(17, 'الخامس', 'fifth', 0, '2020-08-23 14:24:26', '2020-08-25 00:51:23'),
(18, 'السادس', 'sixth', 0, '2020-08-23 14:24:26', '2020-08-25 12:21:24'),
(19, 'السابع', 'seventh', 0, '2020-08-23 14:24:26', '2020-08-25 13:50:34'),
(20, 'الثامن', 'eighth', 0, '2020-08-23 14:24:26', '2020-08-25 13:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Omar Ashour', 'omar@gmail.com', NULL, NULL, '$2y$10$kezWSSkOaDAOAE.BjRcoB.UWC5q2ZIvwwJTXGuscV.64upG0Pr81i', NULL, NULL, '2020-08-23 12:57:15', '2020-08-23 12:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `page`, `created_at`, `updated_at`) VALUES
(1, '127:0:0:1', 'home', '2020-08-23 12:57:16', '2020-08-23 12:57:16'),
(2, '127.0.0.1', 'home', '2020-08-23 13:05:37', '2020-08-23 13:05:37'),
(3, '127.0.0.1', 'appointments', '2020-08-23 13:08:52', '2020-08-23 13:08:52'),
(4, '127.0.0.1', 'home', '2020-08-24 08:43:03', '2020-08-24 08:43:03'),
(5, '127.0.0.1', 'about', '2020-08-24 10:58:47', '2020-08-24 10:58:47'),
(6, '127.0.0.1', 'services', '2020-08-24 11:20:44', '2020-08-24 11:20:44'),
(7, '127.0.0.1', 'team', '2020-08-24 11:49:42', '2020-08-24 11:49:42'),
(8, '127.0.0.1', 'blogs', '2020-08-24 12:19:48', '2020-08-24 12:19:48'),
(9, '127.0.0.1', 'contact-us', '2020-08-24 12:49:12', '2020-08-24 12:49:12'),
(10, '127.0.0.1', 'appointments', '2020-08-24 13:14:24', '2020-08-24 13:14:24'),
(11, '127.0.0.1', 'home', '2020-08-24 23:53:46', '2020-08-24 23:53:46'),
(12, '127.0.0.1', 'team', '2020-08-25 11:34:27', '2020-08-25 11:34:27'),
(13, '127.0.0.1', 'home', '2020-08-28 09:57:49', '2020-08-28 09:57:49'),
(14, '127.0.0.1', 'about', '2020-08-28 09:58:31', '2020-08-28 09:58:31'),
(15, '127.0.0.1', 'services', '2020-08-28 10:08:51', '2020-08-28 10:08:51'),
(16, '::1', 'home', '2020-08-28 10:21:41', '2020-08-28 10:21:41'),
(17, '127.0.0.1', 'team', '2020-08-28 18:02:12', '2020-08-28 18:02:12'),
(18, '127.0.0.1', 'home', '2020-08-30 09:45:56', '2020-08-30 09:45:56'),
(19, '127.0.0.1', 'home', '2020-08-31 12:03:32', '2020-08-31 12:03:32'),
(20, '127.0.0.1', 'home', '2020-09-03 13:48:30', '2020-09-03 13:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_filter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `page_filter`, `color`, `created_at`, `updated_at`) VALUES
(1, '\"a:8:{i:0;s:5:\\\"about\\\";i:1;s:12:\\\"our_projects\\\";i:2;s:8:\\\"contacts\\\";i:3;s:12:\\\"our_services\\\";i:4;s:4:\\\"stat\\\";i:5;s:12:\\\"team_members\\\";i:6;s:12:\\\"testimonials\\\";i:7;s:11:\\\"latest_blog\\\";}\"', 1, '2020-08-23 12:57:15', '2020-08-23 12:57:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

--
-- Indexes for table `appointment_notifications`
--
ALTER TABLE `appointment_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_histories`
--
ALTER TABLE `client_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_histories_user_id_foreign` (`user_id`),
  ADD KEY `client_histories_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment_notifications`
--
ALTER TABLE `appointment_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_histories`
--
ALTER TABLE `client_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_notifications`
--
ALTER TABLE `appointment_notifications`
  ADD CONSTRAINT `appointment_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_histories`
--
ALTER TABLE `client_histories`
  ADD CONSTRAINT `client_histories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
