-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2025 at 06:56 AM
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
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_tittle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_tittle`) VALUES
(9, 'Bootstrap'),
(10, 'Javascript'),
(12, 'Php'),
(14, 'Java'),
(19, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(30, 22, 'javascript', 'javascript@gmail.com', 'javascript comment', 'disapprove', '2023-11-27 05:13:47'),
(31, 24, 'bootstrap', 'bootstrap@gmail.com', 'boootstrap comment', 'approve', '2023-11-26 17:57:59'),
(32, 25, 'boot2', 'boot2@gmail.com', 'boot 2 comment', 'approve', '2023-11-26 17:57:59'),
(33, 23, 'cms2', 'cms2@gmail.com', 'cms comment', 'approve', '2023-11-26 17:57:59'),
(35, 27, 'safiya', 'safiya@gmail.com', 'javascript comment', 'approve', '2023-11-27 07:19:36'),
(36, 28, 'cms', 'cms@gmail.com', 'cms comment', 'disapproved', '2023-11-27 07:13:06'),
(37, 29, 'nice', 'nice@gmail.com', 'nice post', 'disapproved', '2023-11-27 07:20:57'),
(40, 32, 'chart', 'chart@gmail.com', 'chart comment', 'disapproved', '2023-11-27 07:23:20'),
(41, 34, 'beautiful', 'beautiful@gmail.com', 'beautiful post', 'disapproved', '2023-11-27 07:24:31'),
(42, 31, 'insta', 'insta@gmail.com', 'insta post', 'approve', '2023-12-09 16:48:07'),
(46, 33, 'hora', 'horahora@gmail.com', 'horanhi thaabhi hora', 'approve', '2023-12-11 10:07:16'),
(47, 36, 'bootstrap new', 'chart@gmail.com', 'dbcjdfc', 'approve', '2023-12-12 16:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `para` varchar(1500) NOT NULL,
  `primary_button` varchar(255) NOT NULL,
  `secondary_button` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `content_section` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `icon_class` varchar(255) NOT NULL,
  `content_page_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `image`, `heading`, `para`, `primary_button`, `secondary_button`, `sub_heading`, `content_section`, `caption`, `c_name`, `icon_class`, `content_page_id`) VALUES
(65, '1703766739_df3350ea5fbe133ef0a1.jpg', 'Responsive', '<span style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" sans\",=\"\" \"liberation=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 20px;\"=\"\">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins</span><br>', 'primary', 'Secondary', '', 'bootstrap', '', '', '', 8),
(67, '1703917700_f77d643d3bf4e2a5e1f3.jpg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '', '', 'Explore', 'feature', '', '', 'yin-yang', 7),
(68, '1703917597_9c2c48d4e33b093f1eba.jpg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '', '', 'feature', 'feature', '', '', 'feather', 7),
(87, '1703918955_20b6f09186b70d0d2e8d.jpg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '', '', 'Lights', 'feature', '', '', 'x-ray', 8),
(107, '1703918880_b55c93ffbd20a6a3099c.jpg', '', '        <p>cfsdfr</p>', '', '', '', 'courosel', 'safiya', 'sadiya', '', 8),
(108, '1703917074_91f3e1d5391930b8ae2e.jpg', '', '  <p>fvdfv</p>', '', '', '', 'courosel', 'ndsbcjfsd', 'sadiya', '', 7),
(109, '1703860234_de6f06f1add1722124f1.jpg', '', ' <p>fvdfv</p>', '', '', '', 'courosel', 'ndsbcjfsd', 'sadiya', '', 7),
(118, '', 'Features', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '', '', 'Our', 'feature_heading', '', '', '', 8),
(119, '1703917545_572be1488c5f4d934eda.jpg', '', 'Inspirational photography quotes don’t just act as embellishments for trendy, viral Instagram posts. ', '', '', 'photography', 'feature', '', '', 'camera-retro', 7),
(120, '1703918162_5f792840edfab00efdbb.jpg', '', 'Your data is protected from malware, phishing, and other threats by the ThinkShield® suite of hardware and software security features.', '', '', 'Safety first with ThinkShield®', 'feature', '', '', 'atom', 8),
(121, '1703918617_e0a8ecb9fa216e41a195.jpg', '', 'Create a secret folder for your most sensitive information with Moto Secure while easily managing network security and controlling app permissions.', '', '', 'Moto Secure for Added security', 'feature', '', '', 'record-vinyl', 8),
(122, '1703766739_df3350ea5fbe133ef0a1.jpg', 'Responsive', '<span style=\"color: rgb(33, 37, 41); font-family: system-ui, -apple-system, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" sans\",=\"\" \"liberation=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 20px;\"=\"\">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins</span><br>', 'primary', 'Secondary', '', 'bootstrap', '', '', '', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `slug`, `created_at`, `updated_at`) VALUES
(7, 'about us', 'about-us', '2023-12-28 10:53:45', '2023-12-28 10:53:45'),
(8, 'pricing', 'pricing', '2023-12-29 05:21:39', '2023-12-29 05:21:39'),
(9, 'Contact US', 'contact-us', '2024-01-03 12:24:49', '2024-01-03 12:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_tittle` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_status` varchar(255) NOT NULL,
  `post_likes_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_tittle`, `post_author`, `post_user`, `post_category_id`, `post_content`, `post_image`, `post_tags`, `post_comment_count`, `post_date`, `post_status`, `post_likes_count`) VALUES
(30, 'post1', 'post 1 changed', '', 12, 'post1 content', '1702119932_bab276964b267aa0706f.jpg', 'post1', 0, '2023-12-12 11:23:33', 'published', 7),
(33, 'post4', 'post 4 author', '', 14, 'post 4 content', '1701068845_54592a7ef8b0bf0b35a0.jpg', 'post4', 1, '2023-12-22 13:18:08', 'published', 6),
(35, 'post 6', 'post 6 content', '', 10, 'post 6 content', '1701068913_3012754e1a0f7292a417.png', 'post 6', 0, '2023-12-23 05:33:42', 'published', 3),
(36, 'bootstrap test', 'me', '', 10, 'palestine', '1701433150_d4bfe90baa585f780ffb.jpg', 'test', 1, '2023-12-23 06:31:16', 'published', 11),
(37, 'Test Post', 'Test Author', '', 16, 'Test Content', '1701953103_9ec774ac9795afd34e0a.jpg', 'Test Tags', 0, '2023-12-11 11:26:19', 'published', 13),
(38, 'Test Empty', 'dd', '', 16, 'sdsdsdsddsddddgg', '1701953226_f3ea055721cfd9834326.png', 'post empty ', 0, '2023-12-26 07:33:36', 'published', 1),
(40, 'test template', 'nbvjdff', '', 9, 'ndbvjfdvdf', '1702102088_9e2dfbb3a8450f4f13e0.png', 'template ,hjdjesd,ejhdeu', 0, '2023-12-12 16:55:18', 'published', 1),
(43, 'dsbcjsdc', 'dcfdcv', '', 9, '<p>cmsdfcjdc</p>', '1702112228_fbbf35a3bde955697597.jpg', 'dcdsjcv', 0, '2023-12-12 11:26:20', 'published', 1),
(46, 'something', 'gvgjhj', '', 9, '<p>xjbxjkjvck</p>', '1703243128_da81621aa5d82a5b6910.jpg', 'adsxcndsj', 0, '2023-12-22 11:05:28', 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `action_type` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `action_type`, `table_name`, `created_at`, `action_description`) VALUES
(2, 'created', 'posts', '2023-12-22 11:34:15', 'admin create a post'),
(3, 'updated', 'posts', '2023-12-22 11:48:51', 'admin update a post'),
(4, 'deleted', 'posts', '2023-12-22 11:52:00', 'admin delete a post'),
(5, 'created', 'category', '2023-12-22 12:41:27', 'admin creates a new category'),
(6, 'deleted', 'category', '2023-12-22 12:41:53', 'admin delete a category'),
(7, 'deleted', 'category', '2023-12-22 12:41:57', 'admin delete a category'),
(8, 'deleted', 'comments', '2023-12-23 05:33:42', 'admin delete a comments'),
(9, 'added', 'contents', '2023-12-23 05:38:47', 'admin add data to sliders'),
(10, 'copy', 'contents', '2023-12-23 05:42:28', 'admin copy data of sliders'),
(11, 'deleted', 'contents', '2023-12-23 05:42:44', 'admin delete data of sliders'),
(12, 'updated', 'contents', '2023-12-23 05:43:11', 'admin update data of sliders'),
(13, 'copied', 'contents', '2023-12-23 05:51:27', 'admin copied feature'),
(14, 'deleted', 'contents', '2023-12-23 05:51:47', 'admin deleted feature'),
(15, 'updated', 'contents', '2023-12-23 05:52:10', 'admin update feature'),
(16, 'updated', 'contents', '2023-12-23 05:52:31', 'admin update feature heading'),
(17, 'copied', 'contents', '2023-12-23 05:52:47', 'admin copied feature heading'),
(18, 'deleted', 'contents', '2023-12-23 05:53:05', 'admin delete feature heading'),
(19, 'updated', 'profile', '2023-12-23 05:57:04', 'admin update his profile'),
(20, 'updated', 'profile', '2023-12-23 05:57:19', 'admin update his profile'),
(21, 'copied', 'contents', '2023-12-23 06:01:46', 'admin copied a section'),
(22, 'updated', 'contents', '2023-12-23 06:02:03', 'admin updates a section'),
(23, 'deleted', 'contents', '2023-12-23 06:02:14', 'admin deletes a section'),
(24, 'copy', 'contents', '2023-12-23 10:58:21', 'admin copy data of sliders'),
(25, 'deleted', 'contents', '2023-12-23 10:58:26', 'admin delete data of sliders'),
(26, 'copied', 'contents', '2023-12-23 11:01:14', 'admin copied feature'),
(27, 'deleted', 'contents', '2023-12-23 11:01:48', 'admin deleted feature'),
(28, 'added', 'contents', '2023-12-27 13:01:38', 'admin add data to sliders'),
(29, 'deleted', 'contents', '2023-12-27 13:02:08', 'admin delete data of sliders'),
(30, 'deleted', 'pages', '2023-12-28 10:18:17', 'admin delete a page'),
(31, 'deleted', 'pages', '2023-12-28 10:41:25', 'admin delete a page'),
(32, 'deleted', 'pages', '2023-12-28 10:59:58', 'admin delete a page'),
(33, 'added', 'contents', '2023-12-28 12:17:57', 'admin add data to sliders'),
(34, 'updated', 'contents', '2023-12-28 12:18:35', 'admin update data of sliders'),
(35, 'added', 'contents', '2023-12-28 12:19:24', 'admin add data to sliders'),
(36, 'updated', 'contents', '2023-12-28 12:25:00', 'admin update data of sliders'),
(37, 'updated', 'contents', '2023-12-28 12:25:33', 'admin update data of sliders'),
(38, 'added', 'contents', '2023-12-28 12:26:15', 'admin add data to sliders'),
(39, 'updated', 'contents', '2023-12-28 12:26:48', 'admin update data of sliders'),
(40, 'copy', 'contents', '2023-12-28 12:27:08', 'admin copy data of sliders'),
(41, 'updated', 'contents', '2023-12-28 12:27:36', 'admin update data of sliders'),
(42, 'created', 'contents', '2023-12-28 12:32:19', 'admin create a new section'),
(43, 'updated', 'contents', '2023-12-28 12:33:22', 'admin updates a section'),
(44, 'updated', 'contents', '2023-12-28 12:34:27', 'admin updates a section'),
(45, 'updated', 'contents', '2023-12-28 12:34:54', 'admin updates a section'),
(46, 'updated', 'contents', '2023-12-28 12:35:19', 'admin updates a section'),
(47, 'updated', 'contents', '2023-12-28 12:36:18', 'admin updates a section'),
(48, 'updated', 'contents', '2023-12-28 12:36:30', 'admin updates a section'),
(49, 'updated', 'contents', '2023-12-28 12:37:31', 'admin updates a section'),
(50, 'updated', 'contents', '2023-12-28 12:39:45', 'admin updates a section'),
(51, 'updated', 'contents', '2023-12-28 12:42:35', 'admin updates a section'),
(52, 'updated', 'contents', '2023-12-28 12:45:00', 'admin updates a section'),
(53, 'updated', 'contents', '2023-12-28 12:45:52', 'admin update data of sliders'),
(54, 'updated', 'contents', '2023-12-28 12:45:58', 'admin update data of sliders'),
(55, 'updated', 'contents', '2023-12-28 12:47:57', 'admin update data of sliders'),
(56, 'updated', 'contents', '2023-12-28 12:48:24', 'admin update data of sliders'),
(57, 'updated', 'contents', '2023-12-28 12:50:00', 'admin updates a section'),
(58, 'updated', 'contents', '2023-12-28 12:50:44', 'admin updates a section'),
(59, 'updated', 'contents', '2023-12-28 12:52:11', 'admin updates a section'),
(60, 'updated', 'contents', '2023-12-28 12:52:38', 'admin updates a section'),
(61, 'updated', 'contents', '2023-12-28 12:54:17', 'admin updates a section'),
(62, 'updated', 'contents', '2023-12-28 12:55:03', 'admin updates a section'),
(63, 'updated', 'contents', '2023-12-28 12:55:15', 'admin updates a section'),
(64, 'updated', 'contents', '2023-12-28 12:55:49', 'admin updates a section'),
(65, 'updated', 'contents', '2023-12-28 12:57:10', 'admin updates a section'),
(66, 'updated', 'contents', '2023-12-28 12:58:29', 'admin updates a section'),
(67, 'updated', 'contents', '2023-12-28 12:59:03', 'admin updates a section'),
(68, 'updated', 'contents', '2023-12-28 12:59:42', 'admin updates a section'),
(69, 'updated', 'contents', '2023-12-28 13:00:12', 'admin updates a section'),
(70, 'updated', 'contents', '2023-12-28 13:00:41', 'admin updates a section'),
(71, 'added', 'contents', '2023-12-28 13:02:09', 'admin added new feature heading'),
(72, 'updated', 'contents', '2023-12-28 13:02:16', 'admin update feature heading'),
(73, 'updated', 'contents', '2023-12-28 13:02:50', 'admin update feature heading'),
(74, 'added', 'contents', '2023-12-28 13:05:29', 'admin added feature'),
(75, 'copied', 'contents', '2023-12-28 13:06:02', 'admin copied feature'),
(76, 'copied', 'contents', '2023-12-28 13:06:04', 'admin copied feature'),
(77, 'updated', 'contents', '2023-12-28 13:06:20', 'admin update feature'),
(78, 'updated', 'contents', '2023-12-28 13:06:34', 'admin update feature'),
(79, 'updated', 'contents', '2023-12-28 13:10:00', 'admin update feature'),
(80, 'updated', 'contents', '2023-12-28 13:10:58', 'admin update feature'),
(81, 'updated', 'contents', '2023-12-28 13:11:32', 'admin update feature'),
(82, 'updated', 'contents', '2023-12-28 13:12:04', 'admin update feature'),
(83, 'updated', 'contents', '2023-12-28 13:12:09', 'admin update feature'),
(84, 'updated', 'contents', '2023-12-28 13:12:16', 'admin update feature'),
(85, 'updated', 'contents', '2023-12-28 13:12:22', 'admin update feature'),
(86, 'updated', 'contents', '2023-12-28 15:29:13', 'admin update feature'),
(87, 'updated', 'contents', '2023-12-28 16:40:39', 'admin updates a section'),
(88, 'created', 'contents', '2023-12-28 16:41:03', 'admin create a new section'),
(89, 'deleted', 'contents', '2023-12-28 16:41:24', 'admin deletes a section'),
(90, 'updated', 'contents', '2023-12-28 16:41:38', 'admin updates a section'),
(91, 'updated', 'contents', '2023-12-28 16:41:53', 'admin update data of sliders'),
(92, 'added', 'contents', '2023-12-28 16:42:12', 'admin add data to sliders'),
(93, 'deleted', 'contents', '2023-12-28 16:42:44', 'admin delete data of sliders'),
(94, 'updated', 'contents', '2023-12-28 16:43:09', 'admin update feature'),
(95, 'added', 'contents', '2023-12-28 16:43:26', 'admin added feature'),
(96, 'deleted', 'contents', '2023-12-28 16:43:44', 'admin deleted feature'),
(97, 'copied', 'contents', '2023-12-28 16:43:51', 'admin copied feature'),
(98, 'deleted', 'contents', '2023-12-28 16:43:57', 'admin deleted feature'),
(99, 'copied', 'contents', '2023-12-28 16:45:59', 'admin copied feature'),
(100, 'deleted', 'contents', '2023-12-28 16:46:03', 'admin deleted feature'),
(101, 'updated', 'contents', '2023-12-28 16:46:36', 'admin update feature heading'),
(102, 'copy', 'contents', '2023-12-28 16:50:07', 'admin copy data of sliders'),
(103, 'deleted', 'contents', '2023-12-28 16:50:34', 'admin delete data of sliders'),
(104, 'copied', 'contents', '2023-12-28 16:50:51', 'admin copied a section'),
(105, 'deleted', 'contents', '2023-12-28 16:51:10', 'admin deletes a section'),
(106, 'copied', 'contents', '2023-12-28 16:51:16', 'admin copied feature'),
(107, 'deleted', 'contents', '2023-12-28 16:51:22', 'admin deleted feature'),
(108, 'copied', 'contents', '2023-12-28 16:51:36', 'admin copied feature heading'),
(109, 'deleted', 'contents', '2023-12-28 16:52:11', 'admin delete feature heading'),
(110, 'copied', 'contents', '2023-12-28 16:54:34', 'admin copied feature'),
(111, 'added', 'contents', '2023-12-28 17:37:03', 'admin add data to sliders'),
(112, 'deleted', 'contents', '2023-12-28 17:45:41', 'admin delete data of sliders'),
(113, 'added', 'contents', '2023-12-28 17:46:32', 'admin add data to sliders'),
(114, 'added', 'contents', '2023-12-28 17:51:29', 'admin add data to sliders'),
(115, 'added', 'contents', '2023-12-28 17:59:41', 'admin add data to sliders'),
(116, 'added', 'contents', '2023-12-28 18:06:39', 'admin add data to sliders'),
(117, 'deleted', 'contents', '2023-12-28 18:08:08', 'admin delete data of sliders'),
(118, 'deleted', 'contents', '2023-12-28 18:08:14', 'admin delete data of sliders'),
(119, 'deleted', 'contents', '2023-12-28 18:08:18', 'admin delete data of sliders'),
(120, 'copy', 'contents', '2023-12-28 18:08:21', 'admin copy data of sliders'),
(121, 'added', 'contents', '2023-12-28 18:20:41', 'admin add data to sliders'),
(122, 'deleted', 'contents', '2023-12-28 18:23:27', 'admin delete data of sliders'),
(123, 'added', 'contents', '2023-12-29 04:58:29', 'admin add data to sliders'),
(124, 'added', 'contents', '2023-12-29 05:02:29', 'admin add data to sliders'),
(125, 'deleted', 'contents', '2023-12-29 05:02:56', 'admin delete data of sliders'),
(126, 'deleted', 'contents', '2023-12-29 05:02:59', 'admin delete data of sliders'),
(127, 'deleted', 'contents', '2023-12-29 05:03:03', 'admin delete data of sliders'),
(128, 'added', 'contents', '2023-12-29 05:14:31', 'admin add data to sliders'),
(129, 'created', 'contents', '2023-12-29 05:21:01', 'admin create a new section'),
(130, 'deleted', 'contents', '2023-12-29 05:21:54', 'admin deletes a section'),
(131, 'created', 'contents', '2023-12-29 05:22:11', 'admin create a new section'),
(132, 'added', 'contents', '2023-12-29 05:56:38', 'admin add data to sliders'),
(133, 'deleted', 'contents', '2023-12-29 05:57:09', 'admin deletes a section'),
(134, 'deleted', 'contents', '2023-12-29 05:57:16', 'admin delete data of sliders'),
(135, 'deleted', 'contents', '2023-12-29 06:22:36', 'admin delete data of sliders'),
(136, 'added', 'contents', '2023-12-29 06:22:52', 'admin add data to sliders'),
(137, 'added', 'contents', '2023-12-29 06:24:27', 'admin add data to sliders'),
(138, 'created', 'contents', '2023-12-29 07:59:42', 'admin create a new section'),
(139, 'copy', 'contents', '2023-12-29 09:31:21', 'admin copy data of sliders'),
(140, 'copy', 'contents', '2023-12-29 09:32:41', 'admin copy data of sliders'),
(141, 'created', 'contents', '2023-12-29 09:41:46', 'admin create a new section'),
(142, 'updated', 'contents', '2023-12-29 09:56:29', 'admin update feature'),
(143, 'deleted', 'contents', '2023-12-29 10:01:23', 'admin delete data of sliders'),
(144, 'deleted', 'contents', '2023-12-29 10:01:28', 'admin delete data of sliders'),
(145, 'deleted', 'contents', '2023-12-29 10:01:31', 'admin delete data of sliders'),
(146, 'deleted', 'contents', '2023-12-29 10:01:35', 'admin delete data of sliders'),
(147, 'added', 'contents', '2023-12-29 10:01:48', 'admin add data to sliders'),
(148, 'added', 'contents', '2023-12-29 10:02:07', 'admin add data to sliders'),
(149, 'copy', 'contents', '2023-12-29 10:02:36', 'admin copy data of sliders'),
(150, 'copied', 'contents', '2023-12-29 10:02:57', 'admin copied a section'),
(151, 'deleted', 'contents', '2023-12-29 10:03:28', 'admin deletes a section'),
(152, 'deleted', 'contents', '2023-12-29 10:03:32', 'admin deletes a section'),
(153, 'created', 'contents', '2023-12-29 10:03:48', 'admin create a new section'),
(154, 'copied', 'contents', '2023-12-29 10:03:54', 'admin copied a section'),
(155, 'deleted', 'contents', '2023-12-29 10:04:45', 'admin deletes a section'),
(156, 'deleted', 'contents', '2023-12-29 10:04:51', 'admin deletes a section'),
(157, 'deleted', 'contents', '2023-12-29 10:15:38', 'admin delete data of sliders'),
(158, 'deleted', 'contents', '2023-12-29 10:38:25', 'admin delete data of sliders'),
(159, 'deleted', 'contents', '2023-12-29 10:38:28', 'admin delete data of sliders'),
(160, 'added', 'contents', '2023-12-29 10:45:01', 'admin add data to sliders'),
(161, 'updated', 'contents', '2023-12-29 10:47:18', 'admin update data of sliders'),
(162, 'updated', 'contents', '2023-12-29 10:47:52', 'admin update data of sliders'),
(163, 'copy', 'contents', '2023-12-29 10:50:12', 'admin copy data of sliders'),
(164, 'created', 'contents', '2023-12-29 11:01:35', 'admin create a new section'),
(165, 'deleted', 'contents', '2023-12-29 11:02:09', 'admin deletes a section'),
(166, 'updated', 'contents', '2023-12-29 11:31:21', 'admin updates a section'),
(167, 'copied', 'contents', '2023-12-29 11:31:58', 'admin copied a section'),
(168, 'updated', 'contents', '2023-12-29 11:32:05', 'admin updates a section'),
(169, 'added', 'contents', '2023-12-29 13:52:40', 'admin added feature'),
(170, 'deleted', 'contents', '2023-12-29 13:53:20', 'admin deleted feature'),
(171, 'updated', 'contents', '2023-12-29 13:59:59', 'admin update feature'),
(172, 'updated', 'contents', '2023-12-29 14:03:07', 'admin update feature'),
(173, 'updated', 'contents', '2023-12-29 14:04:27', 'admin update feature'),
(174, 'updated', 'contents', '2023-12-29 14:23:52', 'admin update feature heading'),
(175, 'copied', 'contents', '2023-12-29 14:24:49', 'admin copied feature heading'),
(176, 'deleted', 'contents', '2023-12-29 14:25:53', 'admin delete feature heading'),
(177, 'updated', 'contents', '2023-12-29 14:29:57', 'admin update data of sliders'),
(178, 'updated', 'contents', '2023-12-29 14:30:17', 'admin update data of sliders'),
(179, 'updated', 'contents', '2023-12-29 14:30:34', 'admin update data of sliders'),
(180, 'updated', 'contents', '2023-12-29 14:31:24', 'admin update data of sliders'),
(181, 'updated', 'contents', '2023-12-30 06:17:24', 'admin update data of sliders'),
(182, 'updated', 'contents', '2023-12-30 06:17:55', 'admin update data of sliders'),
(183, 'deleted', 'contents', '2023-12-30 06:18:33', 'admin delete data of sliders'),
(184, 'deleted', 'contents', '2023-12-30 06:18:36', 'admin delete data of sliders'),
(185, 'updated', 'contents', '2023-12-30 06:18:50', 'admin update data of sliders'),
(186, 'updated', 'contents', '2023-12-30 06:19:29', 'admin update data of sliders'),
(187, 'added', 'contents', '2023-12-30 06:25:45', 'admin added feature'),
(188, 'updated', 'contents', '2023-12-30 06:26:37', 'admin update feature'),
(189, 'updated', 'contents', '2023-12-30 06:28:20', 'admin update feature'),
(190, 'updated', 'contents', '2023-12-30 06:33:49', 'admin updates a section'),
(191, 'deleted', 'contents', '2023-12-30 06:34:01', 'admin deletes a section'),
(192, 'added', 'contents', '2023-12-30 06:36:02', 'admin added feature'),
(193, 'updated', 'contents', '2023-12-30 06:37:10', 'admin update feature'),
(194, 'updated', 'contents', '2023-12-30 06:41:54', 'admin update feature'),
(195, 'added', 'contents', '2023-12-30 06:43:37', 'admin added feature'),
(196, 'updated', 'contents', '2023-12-30 06:44:58', 'admin update data of sliders'),
(197, 'updated', 'contents', '2023-12-30 06:48:00', 'admin update data of sliders'),
(198, 'updated', 'contents', '2023-12-30 06:49:15', 'admin update feature'),
(199, 'updated', 'contents', '2023-12-30 06:50:52', 'admin update feature'),
(200, 'copied', 'contents', '2024-01-03 12:25:19', 'admin copied a section'),
(201, 'updated', 'contents', '2024-01-03 12:25:36', 'admin updates a section'),
(202, 'updated', 'profile', '2024-01-04 04:53:41', 'admin update his profile'),
(203, 'updated', 'profile', '2024-01-04 04:55:01', 'admin update his profile'),
(204, 'updated', 'profile', '2024-01-04 07:51:45', 'admin update his profile'),
(205, 'created', 'contents', '2024-01-04 09:56:03', 'admin create a new section'),
(206, 'deleted', 'pages', '2024-01-04 10:40:56', 'admin delete a page');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(455) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `reset_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`, `user_image`, `reset_token`) VALUES
(9, 'sadiya', '$2y$10$QFHrKtmtKIEfhJwVCahoDesaM80RPwkfQ01nYUVSDPms6BvLrmtHm', 'saniya', 'khan', 'saniyakhan@gmail.com', 'subscriber', '', ''),
(11, 'safiya', '$2y$10$lsY0z2l8k1Zp1Lt/sh638eB0JYCPqUsWyi1p53aGboDiioIfqx4UG', 'safiya', 'shaikh', 'saffu@gmail.com', 'subscriber', '', ''),
(14, 'sadiya', '$2y$10$GrilVdjn4./pEVNC0i3Si.gN6cNuwvcWWuEHLD4OW3AR0p7o5o5GW', 'sadiya', 'shaikh', 'rutuja@gmail.com', 'subscriber', '', ''),
(17, 'shruti', '$2y$10$TGBZr/OLhmD8luV6N3uSKeCc0OqRF9ft0ULpb7jxPtqBR7qrw6qC.', '', '', 'shruti@gmail.com', 'subscriber', '', ''),
(18, 'shadab', '$2y$10$OTbF3amGCavPKn02SXyEkOpNyC525TTKSrDWTuQ7v4arS11SWUEBu', '', '', 'somebody@gmail.com', 'subscriber', '', ''),
(19, 'kaamu_ini', '$2y$10$euuE87350pxrAScJnrnnQOSudsMjv6b8IDrOEUWxMsHNO83PymgoG', 'kaamini', 'shaikh', 'nasxjasx@gmail.com', 'subscriber', '', ''),
(20, 'ritu', '$2y$10$d8J/PXeizTWtYmXFK4FodOZ04LTRMA/rghLAWvTlbC1g1wUpLjoou', '', '', 'ritu@gmail.com', 'subscriber', '', ''),
(21, 'sadiya', '$2y$10$FPtK88uQdqNolOUh/Ptmceb8EQ8vIcv4tUfGkLZcgEhBm1HDvVS0C', '', '', 'tina@gmail.com', 'subscriber', '', ''),
(23, 'shafi', '$2y$10$XcvcD056OxZ8xxCG/yNtKen.RD6OyNIMJJYBNe1ptmz7RZFjb2Dqm', 'shaikh', 'shafia', 'shafi@gmail.com', 'subscriber', '', ''),
(24, 'bxnbfrddfbhrdf', '$2y$10$mHXysGyEzgveZto0bqAx.evicjtNMyOvVHSdBup2XkC3SPCntCJGS', 'mfbrjfrwjcf', 'hjbejfwef', 'fatema@gmail.com', 'subscriber', '', ''),
(25, 'rahul', '$2y$10$0gWdJNtlJc2nnvReBb/.7eniJg6Xgj2nAciVBXRCzieD6ZPM/tQvy', '', '', 'rahul@gmail.com', 'subscriber', '', ''),
(26, 'rohit', '$2y$10$Opp8C.KRayPRDtFYyhIia.lpx7Lu2kjTEYtipLeD8LgnbGAMOaz/i', '', '', 'rohit@gmail.com', 'subscriber', '', ''),
(27, 'shubham', '$2y$10$KskjJiT9NOZ5pcZm40UtzefnSAygxLkMd1xPeU1Pf6A.IHN0CrrBm', 'shubham', 'khokle', 'shubham@gmail.com', 'subscriber', '', ''),
(28, 'sachin', '$2y$10$XVfYKO.5YkAQvjg4WC71yele/dVJ951qqM7FDo43f4scm99DB4.3i', 'sachin', 'khan', 'sachin@gmail.com', 'subscriber', '', ''),
(29, 'sachin2', '$2y$10$kJI1jPoM0s2rTpskaamZA.D0rRInkf6Ipvvbl.ayTojlJu5nkyyTe', 'sachin', 'tendulkar', 'sachin2@gmail.com', 'admin', '', ''),
(30, 'mahi', '$2y$10$u3cL0yvIxkvidIQkJyfeiORMVhGINqrEshhMlRAmWUWmxHLxVu8pK', 'mahi', 'dhoni', 'mahi@gmail.com', 'subscriber', '', ''),
(34, 'msdcfbdsrf', '$2y$10$1iH0DRuxkyyWcpwxPDuQcOagq5knZgHex5ryhnEGEjeIH/UjRvH1m', 'hscgds', 'shdcfskjf', 'dscjs@gmail.com', 'subscriber', '', ''),
(35, 'fizu', '$2y$10$0w5PBoskaB/lk.7mfM4./OG9wfyZH7x2A.r/nAZNQl4r9CAw9RAie', 'fiza', 'shaikh', 'fizu@gmail.com', 'subscriber', '', ''),
(36, 'ramsha', '$2y$10$/wlVPC5DW0TAR3s0nvwtceGnr.cyxjlcIzVTqH/p8iEtxMYuG6PFu', '', '', 'ramsha@gmail.com', 'subscriber', '', ''),
(37, 'dhoni2', '$2y$10$3/XhbtavZxU0Oxf/GTroN.GxgHkxzwwL7VzxxI.xB9ejnP8/LzcTi', 'mahi', 'singh', 'dhoni@gmail.com', 'admin', '', ''),
(38, 'jadeja', '$2y$10$R904TtWEbqFOrkHdURTYZ.MlG3sWvB.COZ0gQC/nzHSkGunM0Get6', 'jaddu', 'jaddu', 'jadeja@gmail.com', 'subscriber', '', ''),
(39, 'pasoori', '$2y$10$XfVyuAIQ5vP9A3gtUaRkaOE9AvXtHXXLZD2te1o6MWIkCMsyULwWi', '', '', 'pasoori@gmail.com', 'subscriber', '', ''),
(40, 'testing', '$2y$10$9kHOtTF4Sov3/nRRU9lJIe3Iim9nK8hf6hT0LzPZAau67N/Lm1T3i', '', '', 'testingadmin@gmail.com', 'admin', '', ''),
(41, 'shonu', '$2y$10$uJ7dWh0sTULgy/Z6l7h0jesci.jurr9P9CSlgftUJDUBP7SaisWh2', 'shona', 'shaikh', 'shona@gmail.com', 'subscriber', '', ''),
(45, 'sana', '$2y$10$CkbG.v7pR09w9cBHZJYSQO.ZH4ZThp.i.YloSzV3tEfxy0kX8xybK', '', '', 'sana@gmail.com', 'subscriber', '', ''),
(46, 'hina', '$2y$10$SDI1VII38ozxQJc5gPH1/uHVUnB8mbynASnvHGSIMg6v4z9l2DF3y', '', '', 'hina@gmail.com', 'subscriber', '', ''),
(47, 'kausar', '$2y$10$SaS9TE4hVurGHT5p4bn.pO.uIHiCHe4/mdB6XD7.ijPvnWN5pkeCW', '', '', 'kausar@gmail.com', 'subscriber', '', ''),
(48, 'jnk', '$2y$10$gtScEJnvdx9FCgVh2U.sd.xOdeDPzm9eJMBbDbdmSt7PuAdEa5e4y', '', '', 'fctfdyw@gmail.com', 'subscriber', '', ''),
(49, 'sadiya', '$2y$10$7QCqlWwx.VZSJpNJjBYZIu54VjZtDN.U9Ghoxz/wms1HQVSL9wOay', '', '', 'sadiya@gmail.com', 'admin', '', 'ee91dfb23dfa87261c0b2484bba9080c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_page_id_fk` (`content_page_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_page_id_fk` FOREIGN KEY (`content_page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
