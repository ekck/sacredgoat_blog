-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2020 at 04:11 AM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donbenzo`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogtitles`
--

DROP TABLE IF EXISTS `blogtitles`;
CREATE TABLE IF NOT EXISTS `blogtitles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogtitles`
--

INSERT INTO `blogtitles` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Story of Two Love Birds', 1, '2018-09-11 00:30:15', '2018-09-11 00:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Bonfire', '2018-05-03 21:00:00', '2018-05-03 21:00:00'),
(2, 'Life', '2018-05-03 21:00:00', '2018-05-03 21:00:00'),
(3, 'People', '2018-05-03 21:00:00', '2018-05-03 21:00:00'),
(4, 'Books', '2018-05-03 21:00:00', '2018-05-03 21:00:00'),
(5, 'Travel', '2018-05-03 21:00:00', '2018-05-03 21:00:00'),
(6, 'Relationships', '2018-05-03 21:00:00', '2018-05-03 21:00:00'),
(7, 'Growing Up', '2018-05-03 21:00:00', '2018-05-03 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 17, 'John Legend', 'This is the best blog i have read in a long while. You are a genius my friend', '2018-05-06 05:26:55', '2018-05-06 05:26:55'),
(2, 17, 'John Legend', 'This is the best blog i have read in a long while. You are a genius my friend', '2018-05-06 05:27:31', '2018-05-06 05:27:31'),
(3, 17, 'James Collins', 'Wembley Wembley here were are wembley', '2018-05-06 05:31:51', '2018-05-06 05:31:51'),
(4, 20, 'Ezekiel Njogu', 'This is me', '2018-05-06 14:30:34', '2018-05-06 14:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `document` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `blog_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1.jpeg', '2018-09-11 00:32:59', '2018-09-11 00:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_01_07_040128_create_titles_table', 1),
(2, '2018_01_07_183702_createParagraphsTable', 2),
(3, '2018_01_09_030221_createDocumentsTable', 3),
(4, '2018_04_12_113017_create_gallery_table', 4),
(5, '2018_05_03_115736_create_story_category_table', 5),
(6, '2018_05_03_120047_create_categories_table', 5),
(7, '2018_05_06_080916_create_comments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `paragraphs`
--

DROP TABLE IF EXISTS `paragraphs`;
CREATE TABLE IF NOT EXISTS `paragraphs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `paragraph` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paragraphs`
--

INSERT INTO `paragraphs` (`id`, `paragraph`, `blog_id`, `created_at`, `updated_at`) VALUES
(1, 'On 12th May 2018, President Uhuru Kenyatta launched the National Tree Planting Day under the slogan “Panda Miti, Penda Kenya”. It was another of those Jubilee-ese slogans that ring hollow. The event took place in Kamkunji sub-county at the Moi Forces Academy in the Eastlands part of Nairobi. This was the government’s knee-jerk response to the heavy long rains season that sparked an environmental crisis around the country. There were 32 counties affected and over 300,000 Kenyans were displaced. In his official speech, the President repeated the familiar pledge to achieve at least ten per cent forest cover, as required by the constitution, and to mitigate the effects of climate change.', 1, '2018-09-11 00:31:38', '2018-09-11 00:31:38'),
(2, 'The news reporting of the event focused on the power politics between Nairobi governor Mike Sonko Mbuvi and Environmental Cabinet Secretary Keriako Tobiko. Two weeks after the launch, news reports were awash with the latest financial scandal. Sh2 billion allocated to establish the green school project in all 47 counties under the auspices of the Kenya Forest Service (KFS) had been embezzled. A task force chaired by Marion Wakanyi Kamau of the Green Belt Movement released a report that revealed that Kenya’s forest depletion occurred at an alarming rate of about 5,000 hectares annually and which implicated KFS personnel. Kenyans, numbed by the numerous other cases of grand theft in the Jubilee government, hardly reacted.', 1, '2018-09-11 00:31:55', '2018-09-11 00:31:55'),
(3, 'The news reporting of the event focused on the power politics between Nairobi governor Mike Sonko Mbuvi and Environmental Cabinet Secretary Keriako Tobiko. Two weeks after the launch, news reports were awash with the latest financial scandal. Sh2 billion allocated to establish the green school project in all 47 counties under the auspices of the Kenya Forest Service (KFS) had been embezzled. A task force chaired by Marion Wakanyi Kamau of the Green Belt Movement released a report that revealed that Kenya’s forest depletion occurred at an alarming rate of about 5,000 hectares annually and which implicated KFS personnel. Kenyans, numbed by the numerous other cases of grand theft in the Jubilee government, hardly reacted.', 1, '2018-09-11 00:32:00', '2018-09-11 00:32:00'),
(4, 'The news reporting of the event focused on the power politics between Nairobi governor Mike Sonko Mbuvi and Environmental Cabinet Secretary Keriako Tobiko. Two weeks after the launch, news reports were awash with the latest financial scandal. Sh2 billion allocated to establish the green school project in all 47 counties under the auspices of the Kenya Forest Service (KFS) had been embezzled. A task force chaired by Marion Wakanyi Kamau of the Green Belt Movement released a report that revealed that Kenya’s forest depletion occurred at an alarming rate of about 5,000 hectares annually and which implicated KFS personnel. Kenyans, numbed by the numerous other cases of grand theft in the Jubilee government, hardly reacted.', 1, '2018-09-11 00:32:02', '2018-09-11 00:32:02'),
(5, 'The news reporting of the event focused on the power politics between Nairobi governor Mike Sonko Mbuvi and Environmental Cabinet Secretary Keriako Tobiko. Two weeks after the launch, news reports were awash with the latest financial scandal. Sh2 billion allocated to establish the green school project in all 47 counties under the auspices of the Kenya Forest Service (KFS) had been embezzled. A task force chaired by Marion Wakanyi Kamau of the Green Belt Movement released a report that revealed that Kenya’s forest depletion occurred at an alarming rate of about 5,000 hectares annually and which implicated KFS personnel. Kenyans, numbed by the numerous other cases of grand theft in the Jubilee government, hardly reacted.', 1, '2018-09-11 00:32:03', '2018-09-11 00:32:03'),
(6, 'The news reporting of the event focused on the power politics between Nairobi governor Mike Sonko Mbuvi and Environmental Cabinet Secretary Keriako Tobiko. Two weeks after the launch, news reports were awash with the latest financial scandal. Sh2 billion allocated to establish the green school project in all 47 counties under the auspices of the Kenya Forest Service (KFS) had been embezzled. A task force chaired by Marion Wakanyi Kamau of the Green Belt Movement released a report that revealed that Kenya’s forest depletion occurred at an alarming rate of about 5,000 hectares annually and which implicated KFS personnel. Kenyans, numbed by the numerous other cases of grand theft in the Jubilee government, hardly reacted.', 1, '2018-09-11 00:32:05', '2018-09-11 00:32:05'),
(7, 'The news reporting of the event focused on the power politics between Nairobi governor Mike Sonko Mbuvi and Environmental Cabinet Secretary Keriako Tobiko. Two weeks after the launch, news reports were awash with the latest financial scandal. Sh2 billion allocated to establish the green school project in all 47 counties under the auspices of the Kenya Forest Service (KFS) had been embezzled. A task force chaired by Marion Wakanyi Kamau of the Green Belt Movement released a report that revealed that Kenya’s forest depletion occurred at an alarming rate of about 5,000 hectares annually and which implicated KFS personnel. Kenyans, numbed by the numerous other cases of grand theft in the Jubilee government, hardly reacted.', 1, '2018-09-11 00:32:08', '2018-09-11 00:32:08'),
(8, 'The news reporting of the event focused on the power politics between Nairobi governor Mike Sonko Mbuvi and Environmental Cabinet Secretary Keriako Tobiko. Two weeks after the launch, news reports were awash with the latest financial scandal. Sh2 billion allocated to establish the green school project in all 47 counties under the auspices of the Kenya Forest Service (KFS) had been embezzled. A task force chaired by Marion Wakanyi Kamau of the Green Belt Movement released a report that revealed that Kenya’s forest depletion occurred at an alarming rate of about 5,000 hectares annually and which implicated KFS personnel. Kenyans, numbed by the numerous other cases of grand theft in the Jubilee government, hardly reacted.', 1, '2018-09-11 00:32:09', '2018-09-11 00:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `storycategory`
--

DROP TABLE IF EXISTS `storycategory`;
CREATE TABLE IF NOT EXISTS `storycategory` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storycategory`
--

INSERT INTO `storycategory` (`id`, `blog_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-09-11 00:30:16', '2018-09-11 00:30:16'),
(2, 1, 2, '2018-09-11 00:30:16', '2018-09-11 00:30:16'),
(3, 1, 3, '2018-09-11 00:30:16', '2018-09-11 00:30:16'),
(4, 1, 4, '2018-09-11 00:30:16', '2018-09-11 00:30:16'),
(5, 1, 5, '2018-09-11 00:30:16', '2018-09-11 00:30:16'),
(6, 1, 6, '2018-09-11 00:30:16', '2018-09-11 00:30:16'),
(7, 1, 7, '2018-09-11 00:30:16', '2018-09-11 00:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Don Benzo', 'donbenzo@greyera.com', '$2y$10$fenWCrvmbemw5mbizXjs5urYcZKJ1B1asAlBsoURjz34fLe8c6LdW', 26, 'Z7AqFevGIzeb7ayDTsj7cVLFgpBtZ9MBSmijhgAmGtzlEJ35uq2GPJxenI5l', '2018-01-06 10:46:00', '2018-01-06 10:46:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
