-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 10:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrs_mom_event_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_intro_head` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_post_date` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_external` tinyint(1) NOT NULL DEFAULT 0,
  `external_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog_intro_head`, `blog_post_date`, `slug`, `intro_description`, `intro_image`, `is_external`, `external_url`, `sort_order`, `blog_description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mrs MOM Event 2023, Bengaluru', NULL, '2025-03-03 18:30:00', 'mrs-mom-event-2023-bengaluru', 'The vibrant city of Bengaluru witnessed an empowering and an', 'dr-shilpi-reddy-hyd-mrs-mom-event-2023-bengaluru-67c6ab5838a55-1741073240232.webp', 0, NULL, NULL, '<p>The vibrant city of Bengaluru witnessed an empowering and an unique gathering as Mrs Mom Season 7 unfolded offering education and fun together for all the pregnant couples.</p>\r\n\r\n\r\n\r\n<p>Hosted by the esteemed Dr. K Shilpi Reddy, this year’s event reached new heights, bringing together pregnant couples together. The theme echoed through the venue – education on pregnancy journeys, post-pregnancy care, insights into designer babies, and embracing a happy and healthy pregnancy.</p>\r\n\r\n\r\n\r\n<p>The event reached its zenith with the esteemed presence of Mrs. Sudha Murthy, a woman of intellect, grace, and philanthropy. As the chief guest, Mrs. Murthy’s wisdom and interactive sessions elevated the event to an extraordinary level. Her words resonated deeply with the audience.</p>\r\n\r\n\r\n\r\n<p>The event served as a beacon of knowledge, guiding mothers-to-be through the paths of pregnancy. Expert sessions delved into essential aspects, including nutrition, childcare, and the therapeutic influence of music. And what set Mrs Mom Season 7 apart was its inclusivity. Recognizing the importance of familial support, activities were designed to involve husbands too. Pregnant couples participated enthusiastically, supporting each other and building a sense of togetherness and shared responsibility.</p>\r\n\r\n\r\n\r\n<p>Mrs Mom Event – Bengaluru enriched all the participants with loads of awareness, fun, interaction.</p>\r\n\r\n\r\n\r\n<p>With amazing experience sharing from Mrs Sanjana Galrani it became a never forgeting day.</p>\r\n\r\n\r\n\r\n<p>Stay tuned as Mrs Mom Season 8 will be come back next year with more zeal and more knowledge!</p>', 1, '2025-03-04 01:57:20', '2025-03-04 01:57:20'),
(2, 'Mrs MOM Event 2023, Chennai', 'Mrs Mom Season 7 Enthralls Chennai with Education, Fun, and Expert Insights', '2025-03-03 18:30:00', 'mrs-mom-event-2023-chennai', 'Mrs Mom Season 7 Enthralls Chennai with Education, Fun, and', 'dr-shilpi-reddy-hyd-mrs-mom-event-2023-chennai-67c6d540f377e-1741083968998.webp', 0, NULL, NULL, '<p>The much-anticipated Mrs Mom Season 7 event unfolded, casting a spotlight on the beautiful journey of motherhood. Hosted by the renowned Dr. K Shilpi Reddy, this year’s event promised to be a memorable mix of learning, fun, and expert insights, catering to moms to be and their partners.<br>The event aimed to empower and educate attendees on diverse aspects of pregnancy, post-pregnancy care, and the art of nurturing happy and healthy families. What set this event apart was its involvement of husbands in the activities, emphasizing the importance of shared experiences and mutual support in the journey to parenthood.</p>\r\n\r\n\r\n\r\n<p>Mrs Mom Season 7 in Chennai brought together a stellar lineup of guests of honor, each renowned in their respective fields. Mrs. Jayanthi Natarajan, a distinguished lawyer and politician, graced the occasion, Dr. Uma Ram, a multifaceted personality, Singer and Actress Mrs. Selvi Sarathy added some excitement, Mrs. Nalini Rani, a seasoned actress and Miss India Runner-up, Shreya Rao, brought an energetic vibe, connecting with expecting moms and inspiring them to plan the journey ahead with confidence.</p>\r\n\r\n\r\n\r\n<p>Pregnant couples engaged in interactive workshops that covered topics ranging from nutrition and childcare and sessions with experts.</p>\r\n\r\n\r\n\r\n<p>Dr. K Shilpi Reddy’s vision of an inclusive, informative, and enjoyable event came to life, leaving a lasting impact on the pregnant couples who are on this memorable journey together.</p>\r\n\r\n\r\n\r\n<p>As the curtains closed on Mrs Mom Season 7 in Chennai, the memories of education, fun, excitement and the promise of new beginnings lingered, echoing the sentiment that motherhood is a shared adventure best experienced with love, knowledge, and a supportive partner.</p>', 1, '2025-03-04 04:56:12', '2025-03-04 04:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_images`
--

CREATE TABLE `blogs_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs_images`
--

INSERT INTO `blogs_images` (`id`, `blog_image`, `blog_id`, `created_at`, `updated_at`) VALUES
(1, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Bengaluru-67c6ab587d498-1741073240513.webp', 1, '2025-03-04 01:57:20', '2025-03-04 01:57:20'),
(2, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Bengaluru-67c6ab58d6992-1741073240879.webp', 1, '2025-03-04 01:57:21', '2025-03-04 01:57:21'),
(3, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Bengaluru-67c6ab5918ed2-1741073241102.webp', 1, '2025-03-04 01:57:21', '2025-03-04 01:57:21'),
(4, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Bengaluru-67c6ab5954fe9-1741073241348.webp', 1, '2025-03-04 01:57:21', '2025-03-04 01:57:21'),
(5, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Bengaluru-67c6ab59892a8-1741073241562.webp', 1, '2025-03-04 01:57:21', '2025-03-04 01:57:21'),
(7, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Bengaluru-67c6ab59ee57f-1741073241976.webp', 1, '2025-03-04 01:57:22', '2025-03-04 01:57:22'),
(8, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Chennai-67c6d544b926d-1741083972758.webp', 2, '2025-03-04 04:56:12', '2025-03-04 04:56:12'),
(9, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Chennai-67c6d544f1354-1741083972988.webp', 2, '2025-03-04 04:56:17', '2025-03-04 04:56:17'),
(10, 'dr-shilpi-reddy-hyd-Mrs-MOM-Event-2023-Chennai-67c6d549248ed-1741083977150.webp', 2, '2025-03-04 04:56:17', '2025-03-04 04:56:17');

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
-- Table structure for table `featured_in_logos`
--

CREATE TABLE `featured_in_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_in_logos`
--

INSERT INTO `featured_in_logos` (`id`, `img_title`, `img_file`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'dr-shilpi-reddy-hyd-67c6ccf575d90-1741081845483.webp', 1, '2025-03-04 04:20:46', '2025-03-04 04:20:46'),
(2, NULL, 'dr-shilpi-reddy-hyd-67c6ccf62402f-1741081846148.webp', 1, '2025-03-04 04:20:46', '2025-03-04 04:20:46'),
(3, NULL, 'dr-shilpi-reddy-hyd-67c6ccf629ffa-1741081846172.webp', 1, '2025-03-04 04:20:46', '2025-03-04 04:20:46'),
(4, NULL, 'dr-shilpi-reddy-hyd-67c6ccf631d79-1741081846204.webp', 1, '2025-03-04 04:20:46', '2025-03-04 04:20:46'),
(5, NULL, 'dr-shilpi-reddy-hyd-67c6ccf638b6c-1741081846232.webp', 1, '2025-03-04 04:20:46', '2025-03-04 04:20:46'),
(6, NULL, 'dr-shilpi-reddy-hyd-67c6ccf63ee8e-1741081846258.webp', 1, '2025-03-04 04:20:46', '2025-03-04 04:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_categories`
--

INSERT INTO `gallery_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Mrs MOM 2024 - Siddipet', 1, '2025-03-04 00:40:48', '2025-03-04 00:40:48'),
(5, 'Mrs MOM 2024 - Warangal', 1, '2025-03-04 07:39:15', '2025-03-04 07:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_categories_id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_categories_id`, `image_path`, `sort_order`, `created_at`, `updated_at`) VALUES
(39, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69df9140b2-1741069817082.webp', '0', '2025-03-04 01:00:17', '2025-03-04 01:00:17'),
(40, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69df951f10-1741069817336.webp', '0', '2025-03-04 01:00:17', '2025-03-04 01:00:17'),
(41, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69df97fe97-1741069817524.webp', '0', '2025-03-04 01:00:17', '2025-03-04 01:00:17'),
(42, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69df9af4af-1741069817718.webp', '0', '2025-03-04 01:00:17', '2025-03-04 01:00:17'),
(43, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69df9dc4aa-1741069817902.webp', '0', '2025-03-04 01:00:18', '2025-03-04 01:00:18'),
(44, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfa187c2-1741069818100.webp', '0', '2025-03-04 01:00:18', '2025-03-04 01:00:18'),
(45, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfa45d70-1741069818286.webp', '0', '2025-03-04 01:00:18', '2025-03-04 01:00:18'),
(46, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfa6fedc-1741069818458.webp', '0', '2025-03-04 01:00:18', '2025-03-04 01:00:18'),
(47, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfa9cae1-1741069818642.webp', '0', '2025-03-04 01:00:18', '2025-03-04 01:00:18'),
(48, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfac4da3-1741069818806.webp', '0', '2025-03-04 01:00:18', '2025-03-04 01:00:18'),
(49, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfaf1e24-1741069818991.webp', '0', '2025-03-04 01:00:19', '2025-03-04 01:00:19'),
(50, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfb28050-1741069819164.webp', '0', '2025-03-04 01:00:19', '2025-03-04 01:00:19'),
(51, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfb54cdc-1741069819347.webp', '0', '2025-03-04 01:00:19', '2025-03-04 01:00:19'),
(52, 4, 'dr-shilpi-reddy-hyd-mrs-mom-2024---siddipet-67c69dfb8205b-1741069819533.webp', '0', '2025-03-04 01:00:19', '2025-03-04 01:00:19'),
(53, 5, 'dr-shilpi-reddy-hyd-mrs-mom-2024---warangal-67c6fbd8bcf70-1741093848774.webp', '0', '2025-03-04 07:40:49', '2025-03-04 07:40:49'),
(54, 5, 'dr-shilpi-reddy-hyd-mrs-mom-2024---warangal-67c6fbd913d8c-1741093849081.webp', '0', '2025-03-04 07:40:49', '2025-03-04 07:40:49'),
(55, 5, 'dr-shilpi-reddy-hyd-mrs-mom-2024---warangal-67c6fbd94aaf4-1741093849306.webp', '0', '2025-03-04 07:40:49', '2025-03-04 07:40:49'),
(56, 5, 'dr-shilpi-reddy-hyd-mrs-mom-2024---warangal-67c6fbd98f57d-1741093849587.webp', '0', '2025-03-04 07:40:49', '2025-03-04 07:40:49'),
(57, 5, 'dr-shilpi-reddy-hyd-mrs-mom-2024---warangal-67c6fbd9c6673-1741093849813.webp', '0', '2025-03-04 07:40:50', '2025-03-04 07:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `home_carousel`
--

CREATE TABLE `home_carousel` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_carousel`
--

INSERT INTO `home_carousel` (`id`, `image_path`, `sort_order`, `created_at`, `updated_at`) VALUES
(2, 'dr-shilpi-reddy-hyd-67c7fe2a2d0a3-1741159978184.webp', '0', '2025-03-05 02:02:58', '2025-03-05 02:02:58'),
(3, 'dr-shilpi-reddy-hyd-67c7fe2a4986d-1741159978301.webp', '0', '2025-03-05 02:02:58', '2025-03-05 02:02:58'),
(4, 'dr-shilpi-reddy-hyd-67c7fe2a641f8-1741159978410.webp', '0', '2025-03-05 02:02:58', '2025-03-05 02:02:58'),
(5, 'dr-shilpi-reddy-hyd-67c7fe2a7d7dc-1741159978514.webp', '0', '2025-03-05 02:02:58', '2025-03-05 02:02:58'),
(6, 'dr-shilpi-reddy-hyd-67c7fe2a991dd-1741159978627.webp', '0', '2025-03-05 02:02:58', '2025-03-05 02:02:58'),
(7, 'dr-shilpi-reddy-hyd-67c7fe2ab6f8b-1741159978749.webp', '0', '2025-03-05 02:02:58', '2025-03-05 02:02:58'),
(8, 'dr-shilpi-reddy-hyd-67c7fe2ad422b-1741159978869.webp', '0', '2025-03-05 02:02:58', '2025-03-05 02:02:58'),
(9, 'dr-shilpi-reddy-hyd-67c7fe2af011e-1741159978983.webp', '0', '2025-03-05 02:02:59', '2025-03-05 02:02:59'),
(10, 'dr-shilpi-reddy-hyd-67c7fe2b0e637-1741159979059.webp', '0', '2025-03-05 02:03:01', '2025-03-05 02:03:01'),
(11, 'dr-shilpi-reddy-hyd-67c7fe2da9392-1741159981693.webp', '0', '2025-03-05 02:03:01', '2025-03-05 02:03:01'),
(12, 'dr-shilpi-reddy-hyd-67c7fe2dc7500-1741159981816.webp', '0', '2025-03-05 02:03:01', '2025-03-05 02:03:01'),
(13, 'dr-shilpi-reddy-hyd-67c7fe2de6e6e-1741159981946.webp', '0', '2025-03-05 02:03:02', '2025-03-05 02:03:02'),
(14, 'dr-shilpi-reddy-hyd-67c7fe2e0f241-1741159982062.webp', '0', '2025-03-05 02:03:02', '2025-03-05 02:03:02'),
(15, 'dr-shilpi-reddy-hyd-67c7fe2e288a0-1741159982166.webp', '0', '2025-03-05 02:03:02', '2025-03-05 02:03:02'),
(16, 'dr-shilpi-reddy-hyd-67c7fe2e40ab8-1741159982265.webp', '0', '2025-03-05 02:03:02', '2025-03-05 02:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `ibu_care`
--

CREATE TABLE `ibu_care` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_image_or_youtube` tinyint(1) NOT NULL DEFAULT 0,
  `youtube_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `is_image_or_youtube`, `youtube_link`, `media_image`, `sort_order`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c223df1-1741076674147.webp', '3', 1, '2025-03-04 02:54:34', '2025-03-04 02:55:37'),
(3, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c27ea59-1741076674519.webp', '1', 1, '2025-03-04 02:54:35', '2025-03-04 02:55:37'),
(4, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c307256-1741076675029.webp', '0', 1, '2025-03-04 02:54:35', '2025-03-04 02:54:35'),
(5, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c3348ab-1741076675215.webp', '0', 1, '2025-03-04 02:54:35', '2025-03-04 02:54:35'),
(6, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c34e381-1741076675320.webp', '0', 1, '2025-03-04 02:54:35', '2025-03-04 02:54:35'),
(7, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c3cb811-1741076675834.webp', '0', 1, '2025-03-04 02:54:35', '2025-03-04 02:54:35'),
(8, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c3dbf63-1741076675901.webp', '0', 1, '2025-03-04 02:54:36', '2025-03-04 02:54:36'),
(9, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c46047a-1741076676394.webp', '0', 1, '2025-03-04 02:54:36', '2025-03-04 02:54:36'),
(10, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c4df65e-1741076676915.webp', '0', 1, '2025-03-04 02:54:37', '2025-03-04 02:54:37'),
(11, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c5c3492-1741076677800.webp', '0', 1, '2025-03-04 02:54:38', '2025-03-04 02:54:38'),
(12, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c6b2bf8-1741076678732.webp', '0', 1, '2025-03-04 02:54:39', '2025-03-04 02:54:39'),
(13, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c74573e-1741076679284.webp', '0', 1, '2025-03-04 02:54:39', '2025-03-04 02:54:39'),
(14, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c76e9a5-1741076679453.webp', '0', 1, '2025-03-04 02:54:39', '2025-03-04 02:54:39'),
(15, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c7de14c-1741076679910.webp', '0', 1, '2025-03-04 02:54:40', '2025-03-04 02:54:40'),
(16, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c856cd2-1741076680356.webp', '0', 1, '2025-03-04 02:54:40', '2025-03-04 02:54:40'),
(17, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c8c61f5-1741076680812.webp', '0', 1, '2025-03-04 02:54:40', '2025-03-04 02:54:40'),
(18, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c8ecf25-1741076680971.webp', '0', 1, '2025-03-04 02:54:41', '2025-03-04 02:54:41'),
(19, NULL, 0, NULL, 'dr-shilpi-reddy-hyd-67c6b8c990ab3-1741076681593.webp', '0', 1, '2025-03-04 02:54:42', '2025-03-04 02:54:42'),
(20, NULL, 1, 'https://www.youtube.com/embed/MOmahfdMvzY', NULL, '0', 1, '2025-03-04 03:00:45', '2025-03-04 03:00:45');

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
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2024_06_03_060632_create_featured_in_logos_table', 1),
(27, '2024_06_04_095209_create_testimonials_table', 1),
(28, '2024_06_05_063729_create_our_works_table', 1),
(29, '2024_06_05_064154_create_our_works_image_table', 1),
(30, '2024_06_16_065513_create_media_table', 1),
(31, '2024_06_16_101709_create_blogs_table', 1),
(32, '2024_06_16_102203_create_blogs_images_table', 1),
(33, '2024_06_17_104152_create_ibu_care_table', 1),
(34, '2024_07_01_103237_create_permission_tables', 1),
(35, '2024_07_19_071049_create_visitors_table', 1),
(36, '2025_02_25_045424_add_fields_to_blogs_table', 1),
(37, '2025_02_25_112553_add_new_fields_to_blogs_table', 1),
(38, '2025_02_27_061018_add_sort_order_to_media_table', 1),
(39, '2025_03_03_104624_create_gallery_categories_table', 2),
(40, '2025_03_03_104634_create_gallery_images_table', 2),
(41, '2025_03_04_074036_add_column_to_media_table', 3),
(42, '2025_03_05_070821_create_table_home-carousel_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_works`
--

CREATE TABLE `our_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_work_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_works_image`
--

CREATE TABLE `our_works_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `our_work_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_work_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonials_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_img`, `phone_number`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. K. Shilpi Reddy', 'webadmin@gmail.com', 'profile-hospital_1718689619.jpg', 12, NULL, '$2y$10$TofMzfGZF7WLKtP4iks2GegBoLkM76Lcg/J6yXMXBbaHa.HN9ebtS', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs_images`
--
ALTER TABLE `blogs_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_images_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `featured_in_logos`
--
ALTER TABLE `featured_in_logos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_in_logos_user_id_foreign` (`user_id`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_categories_id_foreign` (`gallery_categories_id`);

--
-- Indexes for table `home_carousel`
--
ALTER TABLE `home_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ibu_care`
--
ALTER TABLE `ibu_care`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ibu_care_user_id_foreign` (`user_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_user_id_foreign` (`user_id`);

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
-- Indexes for table `our_works`
--
ALTER TABLE `our_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `our_works_user_id_foreign` (`user_id`);

--
-- Indexes for table `our_works_image`
--
ALTER TABLE `our_works_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `our_works_image_our_work_id_foreign` (`our_work_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs_images`
--
ALTER TABLE `blogs_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_in_logos`
--
ALTER TABLE `featured_in_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `home_carousel`
--
ALTER TABLE `home_carousel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ibu_care`
--
ALTER TABLE `ibu_care`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `our_works`
--
ALTER TABLE `our_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `our_works_image`
--
ALTER TABLE `our_works_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blogs_images`
--
ALTER TABLE `blogs_images`
  ADD CONSTRAINT `blogs_images_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `featured_in_logos`
--
ALTER TABLE `featured_in_logos`
  ADD CONSTRAINT `featured_in_logos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_categories_id_foreign` FOREIGN KEY (`gallery_categories_id`) REFERENCES `gallery_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ibu_care`
--
ALTER TABLE `ibu_care`
  ADD CONSTRAINT `ibu_care_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `our_works`
--
ALTER TABLE `our_works`
  ADD CONSTRAINT `our_works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `our_works_image`
--
ALTER TABLE `our_works_image`
  ADD CONSTRAINT `our_works_image_our_work_id_foreign` FOREIGN KEY (`our_work_id`) REFERENCES `our_works` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
