-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2022 at 08:55 PM
-- Server version: 5.7.40
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bagmarts_krill`
--

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
(3, '2017_08_11_073824_create_menus_wp_table', 1),
(4, '2017_08_11_074006_create_menu_items_wp_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `rel_post_category`
--

CREATE TABLE `rel_post_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rel_post_category`
--

INSERT INTO `rel_post_category` (`id`, `post_id`, `category_id`) VALUES
(34, 5, 6),
(35, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_groups`
--

CREATE TABLE `tbl_admin_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_groups`
--

INSERT INTO `tbl_admin_groups` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Have all the access', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_menus`
--

CREATE TABLE `tbl_admin_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `menu_name` varchar(191) DEFAULT NULL,
  `menu_controller` varchar(191) DEFAULT NULL,
  `menu_link` varchar(191) DEFAULT NULL,
  `menu_css` varchar(191) DEFAULT NULL,
  `menu_icon` varchar(191) DEFAULT NULL,
  `menu_order` int(10) UNSIGNED NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_menus`
--

INSERT INTO `tbl_admin_menus` (`id`, `parent_id`, `menu_name`, `menu_controller`, `menu_link`, `menu_css`, `menu_icon`, `menu_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Homepage', NULL, NULL, NULL, 'fa-gears', 2, '1', NULL, NULL),
(2, 0, 'Logs', NULL, NULL, NULL, 'fa-gears', 101, '1', NULL, NULL),
(3, 5, 'Pages', 'AdminPagesController', 'pages.index', NULL, 'fa-bullseye', 4, '1', NULL, NULL),
(4, 0, 'Roles Management', NULL, NULL, NULL, 'fa-gears', 4, '1', NULL, NULL),
(5, 0, 'Media Management', NULL, 'dashboard', NULL, 'fa-gears', 3, '1', NULL, NULL),
(6, 4, 'User Groups', 'AdminGroupController', 'usergroup.index', NULL, 'fa-bullseye', 1, '1', NULL, NULL),
(7, 4, 'Roles Access', 'AdminRoleAccessController', 'role-access.index', NULL, 'fa-gears', 2, '1', NULL, NULL),
(8, 1, 'Menu Management', 'AdminMenuController', 'menu', NULL, 'fa-bullseye', 2, '0', NULL, NULL),
(9, 1, 'Site Managment', 'AdminSiteSettingController', 'setting', NULL, 'fa-gears', 1, '1', NULL, NULL),
(10, 5, 'Posts', 'AdminPostsController', 'posts.index', NULL, 'fa-gears', 3, '0', NULL, NULL),
(11, 5, 'Category', 'AdminCategoryController', 'category.index', NULL, 'fa-bullseye', 2, '0', NULL, NULL),
(12, 5, 'Media Library', 'AdminDashboardController', 'medialibrary', NULL, 'fa-gears', 100, '1', NULL, NULL),
(13, 1, 'FAQ Mangement', 'AdminFaqController', 'faq.index', NULL, 'fa-bullseye', 10, '1', NULL, NULL),
(14, 1, 'Slider', 'AdminSliderController', 'slider.index', NULL, 'fa-bullseye', 3, '0', NULL, NULL),
(15, 1, 'Feedback List', 'AdminContactController', 'contact.index', NULL, 'fa-gears', 14, '1', NULL, NULL),
(16, 2, 'Login Logs', 'AdminSiteSettingController', 'successlogin', NULL, 'fa-bullseye', 1, '1', NULL, NULL),
(17, 2, 'Fail Login Logs', 'AdminSiteSettingController', 'faillogin', NULL, 'fa-bullseye', 2, '1', NULL, NULL),
(18, 5, 'Author', 'AdminAuthorController', 'author.index', NULL, 'fa-bullseye', 1, '0', NULL, NULL),
(19, 0, 'Configuration', NULL, NULL, NULL, 'fa-gears', 1, '1', NULL, NULL),
(20, 19, 'Country', 'AdminCountryController', 'country.index', NULL, 'fa-bullseye', 3, '0', NULL, NULL),
(21, 1, 'Study Abroad', 'AdminStudyAbroadController', 'study-abroad.index', NULL, 'fa-bullseye', 3, '0', NULL, NULL),
(22, 1, 'Why Choose Us', 'AdminWhyChooseController', 'why-choose.index', NULL, 'fa-bullseye', 3, '0', NULL, NULL),
(23, 19, 'Testimonial', 'AdminTestimonialController', 'testimonial.index', NULL, 'fa-bullseye', 3, '1', NULL, NULL),
(24, 1, 'Event', 'AdminEventController', 'event.index', NULL, 'fa-bullseye', 3, '0', NULL, NULL),
(25, 19, 'University', 'AdminUniversityController', 'university.index', NULL, 'fa-bullseye', 3, '0', NULL, NULL),
(26, 1, 'How we work', 'AdminWorkingController', 'working.index', NULL, 'fa-bullseye', 3, '0', NULL, NULL),
(27, 1, 'Certificate', 'AdminCertificateController', 'certificate.index', NULL, 'fa-bullseye', 4, '0', NULL, NULL),
(28, 19, 'Scholarship Offer', 'AdminScholarshipOfferController', 'scholarship-offer.index', NULL, 'fa-bullseye', 3, '0', NULL, NULL),
(29, 19, 'Partner', 'AdminPartnerController', 'partner.index', NULL, 'fa-bullseye', 1, '1', NULL, NULL),
(30, 19, 'Service', 'AdminServiceController', 'service.index', NULL, 'fa-bullseye', 1, '1', NULL, NULL),
(31, 19, 'Value', 'AdminValueController', 'value.index', NULL, 'fa-bullseye', 1, '1', NULL, NULL),
(32, 19, 'Feature', 'AdminFeatureController', 'feature.index', NULL, 'fa-bullseye', 1, '1', NULL, NULL),
(33, 19, 'Team', 'AdminTeamController', 'team.index', NULL, 'fa-bullseye', 1, '1', NULL, NULL),
(34, 1, 'Mailing List', 'AdminContactController', 'mailinglist', NULL, 'fa-gears', 14, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_roles`
--

CREATE TABLE `tbl_admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_group_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `allow_view` enum('1','0') NOT NULL DEFAULT '1',
  `allow_add` enum('1','0') NOT NULL DEFAULT '1',
  `allow_edit` enum('1','0') NOT NULL DEFAULT '1',
  `allow_delete` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_roles`
--

INSERT INTO `tbl_admin_roles` (`id`, `user_group_id`, `menu_id`, `allow_view`, `allow_add`, `allow_edit`, `allow_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '0', '0', '0', '2022-08-14 09:31:39', NULL),
(2, 1, 2, '1', '0', '0', '0', '2022-08-14 09:31:39', NULL),
(3, 1, 3, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(4, 1, 4, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(5, 1, 5, '1', '0', '0', '0', '2022-08-14 09:31:39', NULL),
(6, 1, 6, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(7, 1, 7, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(8, 1, 8, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(9, 1, 9, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(10, 1, 10, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(11, 1, 11, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(12, 1, 12, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(13, 1, 13, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(14, 1, 14, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(15, 1, 15, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(16, 1, 16, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(17, 1, 17, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(18, 1, 18, '1', '1', '1', '1', '2022-08-14 09:31:39', NULL),
(19, 1, 19, '1', '0', '0', '0', '2022-08-14 09:31:40', NULL),
(20, 1, 20, '1', '1', '1', '1', '2022-08-14 09:33:37', NULL),
(21, 1, 21, '1', '1', '1', '1', '2022-08-14 11:54:33', NULL),
(22, 1, 22, '1', '1', '1', '1', '2022-08-14 13:53:25', NULL),
(23, 1, 23, '1', '1', '1', '1', '2022-08-14 14:30:24', NULL),
(24, 1, 24, '1', '1', '1', '1', '2022-08-14 14:45:28', NULL),
(25, 1, 25, '1', '1', '1', '1', '2022-08-14 16:31:48', NULL),
(26, 1, 26, '1', '1', '1', '1', '2022-08-16 04:02:30', NULL),
(27, 1, 27, '1', '1', '1', '1', '2022-08-17 16:10:02', NULL),
(28, 1, 28, '1', '1', '1', '1', '2022-08-29 07:57:16', NULL),
(29, 1, 29, '1', '1', '1', '1', '2022-11-12 16:41:01', NULL),
(30, 1, 30, '1', '1', '1', '1', '2022-11-12 17:47:45', NULL),
(31, 1, 31, '1', '1', '1', '1', '2022-11-12 17:47:45', NULL),
(32, 1, 32, '1', '1', '1', '1', '2022-11-13 17:19:09', NULL),
(33, 1, 33, '1', '1', '1', '1', '2022-11-14 17:01:42', NULL),
(34, 1, 34, '1', '1', '1', '1', '2022-11-14 18:21:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_users`
--

CREATE TABLE `tbl_admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobileno` varchar(20) DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `hub_id` int(10) DEFAULT NULL,
  `ui_skin` varchar(50) DEFAULT 'skin-blue',
  `user_group_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `lastlogin` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_users`
--

INSERT INTO `tbl_admin_users` (`id`, `username`, `password`, `name`, `email`, `mobileno`, `address`, `hub_id`, `ui_skin`, `user_group_id`, `status`, `lastlogin`, `created_at`, `updated_at`) VALUES
(1, 'iquita2005', '$2y$10$y9y3UP42546JurmBv3LEReaMf7YJTy91iaBVDBlP579P19v6HDbj.', 'SuperAdmin', 'emmanuel@krillpay.com', '9864832952', 0, NULL, 'skin-purple-light', 1, '1', '2022-11-15 15:21:36', '2022-11-11 02:14:03', '2022-11-15 15:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text,
  `slug` text,
  `description` text,
  `image` varchar(256) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'Shoshana Blanchard', 'shoshana-blanchard', 'Laboriosam omnis se', 'public/uploads/shares/10.jpg', '1', 1, 0, '2022-03-08 22:25:44', '2022-03-08 22:25:44'),
(4, 'GSRXEjq8Gu', 'gsrxejq8gu', 'nTfncjOK5U', 'public/uploads/shares/testimonial/hari.png', '1', 1, 0, '2022-11-12 10:07:37', '2022-11-12 10:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text,
  `sub_title` varchar(256) DEFAULT NULL,
  `slug` text,
  `description` text,
  `status` tinyint(4) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `sub_title`, `slug`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'Notifications', 'Smart Banking', 'notifications', 'Smart Banking', 1, 1, 0, '2022-11-13 10:59:07', '2022-11-13 10:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificates`
--

CREATE TABLE `tbl_certificates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `certificate_type` int(10) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_certificates`
--

INSERT INTO `tbl_certificates` (`id`, `title`, `image`, `certificate_type`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cert 12', 'public/uploads/shares/breadcrumb-image.jpg', 1, 1, 1, 1, '2022-08-17 10:40:08', '2022-08-17 10:40:51'),
(3, 'cert 2', 'public/uploads/shares/a.jpg', 2, 1, NULL, 1, '2022-08-17 10:41:52', '2022-08-17 10:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text,
  `slug` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `title`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'USA', NULL, 1, 1, 1, '2022-08-14 03:51:24', '2022-08-14 05:45:55'),
(3, 'UK', NULL, 1, 1, 0, '2022-08-15 11:17:14', '2022-08-15 11:17:14'),
(4, 'Nepal', NULL, 1, 1, 0, '2022-08-27 22:17:28', '2022-08-27 22:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `title`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ex corporis delectus', 1, 1, '2022-03-09 22:27:21', '2022-03-09 22:27:43'),
(3, 'Molestiae ad asperio', 2, 1, '2022-03-09 23:16:30', '2022-03-09 23:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) UNSIGNED NOT NULL,
  `province_id` int(11) UNSIGNED NOT NULL,
  `district_name_en` varchar(200) NOT NULL,
  `district_name_np` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` tinyint(3) UNSIGNED DEFAULT NULL,
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `province_id`, `district_name_en`, `district_name_np`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(101, 1, 'TAPLEJUNG', 'ताप्लेजुङ', '2019-01-10 12:10:05', '2020-11-09 09:38:57', NULL, NULL, 0),
(102, 1, 'SANKHUWASABHA', 'संखुवासभा', '2019-01-10 12:10:05', '2020-11-09 09:39:15', NULL, NULL, 0),
(103, 1, 'SOLUKHUMBU', 'सोलुखुम्बु', '2019-01-10 12:10:05', '2020-11-09 09:39:15', NULL, NULL, 0),
(104, 1, 'OKHALDHUNGA', 'ओखलढुङ्गा', '2019-01-10 12:10:05', '2020-11-09 09:39:15', NULL, NULL, 0),
(105, 1, 'KHOTANG', 'खोटाङ', '2019-01-10 12:10:05', '2020-11-09 09:39:15', NULL, NULL, 0),
(106, 1, 'BHOJPUR', 'भोजपुर', '2019-01-10 12:10:05', '2019-09-04 09:16:15', NULL, NULL, 0),
(107, 1, 'DHANKUTA', 'धनकुटा', '2019-01-10 12:10:05', '2020-11-09 09:39:15', NULL, NULL, 0),
(108, 1, 'TERHATHUM', 'तेह्रथुम', '2019-01-10 12:10:05', '2020-11-09 09:39:15', NULL, NULL, 0),
(109, 1, 'PANCHTHAR', 'पाँचथर', '2019-01-10 12:10:05', '2020-11-09 09:39:15', NULL, NULL, 0),
(110, 1, 'ILAM', 'इलाम', '2019-01-10 12:10:05', '2020-11-09 09:39:15', NULL, NULL, 0),
(111, 1, 'JHAPA', 'झापा', '2019-01-10 12:10:05', '2020-11-09 09:39:29', NULL, NULL, 1),
(112, 1, 'MORANG', 'मोरङ', '2019-01-10 12:10:05', '2020-11-09 09:39:31', NULL, NULL, 1),
(113, 1, 'SUNSARI', 'सुनसरी', '2019-01-10 12:10:05', '2020-11-09 09:39:37', NULL, NULL, 1),
(114, 1, 'UDAYAPUR', 'उदयपुर', '2019-01-10 12:10:05', '2020-11-09 09:39:41', NULL, NULL, 1),
(201, 2, 'SAPTARI', 'सप्तरी', '2019-01-10 12:10:05', NULL, NULL, NULL, 1),
(202, 2, 'SIRAHA', 'सिरहा', '2019-01-10 12:10:05', NULL, NULL, NULL, 1),
(203, 2, 'DHANUSA', 'धनुषा', '2019-01-10 12:10:05', NULL, NULL, NULL, 1),
(204, 2, 'MAHOTTARI', 'महोत्तरी', '2019-01-10 12:10:05', NULL, NULL, NULL, 1),
(205, 2, 'SARLAHI', 'सर्लाही', '2019-01-10 12:10:05', '2020-11-09 09:40:09', NULL, NULL, 0),
(206, 2, 'RAUTAHAT ', 'रौतहट', '2019-01-10 12:10:05', '2020-11-09 09:40:12', NULL, NULL, 0),
(207, 2, 'BARA', 'बारा', '2019-01-10 12:10:05', '2020-11-09 09:40:16', NULL, NULL, 0),
(208, 2, 'PARSA', 'पर्सा', '2019-01-10 12:10:05', NULL, NULL, NULL, 1),
(301, 3, 'DOLAKHA', 'दोलखा', '2019-01-10 12:10:05', '2020-11-09 09:40:31', NULL, NULL, 0),
(302, 3, 'SINDHUPALCHOK', 'सिन्धुपाल्चोक', '2019-01-10 12:10:05', '2020-11-09 09:40:42', NULL, NULL, 0),
(303, 3, 'RASUWA', 'रसुवा', '2019-01-10 12:10:05', '2020-11-09 09:40:42', NULL, NULL, 0),
(304, 3, 'DHADING', 'धादिङ', '2019-01-10 12:10:05', '2020-11-09 09:40:42', NULL, NULL, 0),
(305, 3, 'NUWAKOT', 'नुवाकोट', '2019-01-10 12:10:05', '2020-11-09 09:40:42', NULL, NULL, 0),
(306, 3, 'KATHMANDU', 'काठमाडौँ', '2019-01-10 12:10:05', '2020-11-09 09:40:51', NULL, NULL, 1),
(307, 3, 'BHAKTAPUR', 'भक्तपुर', '2019-01-10 12:10:05', '2020-11-09 09:40:53', NULL, NULL, 1),
(308, 3, 'LALITPUR', 'ललितपुर', '2019-01-10 12:10:05', '2020-11-09 09:40:55', NULL, NULL, 1),
(309, 3, 'KAVREPALANCHOK', 'काभ्रेपलाञ्चोक', '2019-01-10 12:10:05', '2020-11-09 09:40:59', NULL, NULL, 1),
(310, 3, 'RAMECHHAP', 'रामेछाप', '2019-01-10 12:10:05', '2020-11-09 09:40:42', NULL, NULL, 0),
(311, 3, 'SINDHULI', 'सिन्धुली', '2019-01-10 12:10:05', '2020-11-09 09:40:42', NULL, NULL, 0),
(312, 3, 'MAKWANPUR', 'मकवानपुर', '2019-01-10 12:10:05', '2020-11-09 09:41:02', NULL, NULL, 1),
(313, 3, 'CHITAWAN', 'चितवन', '2019-01-10 12:10:05', '2020-11-09 09:41:04', NULL, NULL, 1),
(401, 4, 'GORKHA', 'गोरखा', '2019-01-10 12:10:05', '2020-12-21 07:20:36', NULL, NULL, 1),
(402, 4, 'MANANG', 'मनाङ', '2019-01-10 12:10:05', '2020-11-09 09:41:28', NULL, NULL, 0),
(403, 4, 'MUSTANG', 'मुस्ताङ', '2019-01-10 12:10:05', '2020-11-09 09:41:42', NULL, NULL, 1),
(404, 4, 'MYAGDI', 'म्याग्दी', '2019-01-10 12:10:05', '2020-11-09 09:41:46', NULL, NULL, 1),
(405, 4, 'KASKI', 'कास्की', '2019-01-10 12:10:05', '2020-11-09 09:41:48', NULL, NULL, 1),
(406, 4, 'LAMJUNG', 'लमजुङ', '2019-01-10 12:10:05', '2020-11-09 09:41:28', NULL, NULL, 0),
(407, 4, 'TANAHU', 'तनहुँ', '2019-01-10 12:10:05', '2020-11-09 09:41:51', NULL, NULL, 1),
(408, 4, 'NAWALPARASI EAST', 'नवलपरासी (बर्दघाट सुस्ता पूर्व)', '2019-01-10 12:10:05', '2020-11-09 09:41:54', NULL, NULL, 1),
(409, 4, 'SYANGJA', 'स्याङजा', '2019-01-10 12:10:05', '2020-11-09 09:41:56', NULL, NULL, 1),
(410, 4, 'PARBAT', 'पर्वत', '2019-01-10 12:10:05', '2020-11-09 09:41:59', NULL, NULL, 1),
(411, 4, 'BAGLUNG', 'बागलुङ', '2019-01-10 12:10:05', '2020-11-09 09:42:00', NULL, NULL, 1),
(501, 5, 'RUKUM EAST', 'रुकुम (पूर्वी भाग)', '2019-01-10 12:10:05', '2019-02-13 09:43:59', NULL, NULL, 0),
(502, 5, 'ROLPA', 'रोल्पा', '2019-01-10 12:10:05', '2019-02-13 09:43:50', NULL, NULL, 0),
(503, 5, 'PYUTHAN', 'प्यूठान', '2019-01-10 12:10:05', '2019-02-13 09:43:45', NULL, NULL, 0),
(504, 5, 'GULMI', 'गुल्मी', '2019-01-10 12:10:05', '2019-02-13 09:43:27', NULL, NULL, 0),
(505, 5, 'ARGHAKHANCHI', 'अर्घाखाँची', '2019-01-10 12:10:05', '2019-02-13 09:43:13', NULL, NULL, 0),
(506, 5, 'PALPA', 'पाल्पा', '2019-01-10 12:10:05', '2019-02-13 09:43:40', NULL, NULL, 0),
(507, 5, 'NAWALPARASI WEST', 'नवलपरासी (बर्दघाट सुस्ता पश्चिम)', '2019-01-10 12:10:05', '2019-02-13 09:43:33', NULL, NULL, 0),
(508, 5, 'RUPANDEHI', 'रुपन्देही', '2019-01-10 12:10:05', '2020-11-18 05:57:29', NULL, NULL, 1),
(509, 5, 'KAPILBASTU', 'कपिलवस्तु', '2019-01-10 12:10:05', '2019-02-12 15:20:30', NULL, NULL, 0),
(510, 5, 'DANG', 'दाङ', '2019-01-10 12:10:05', NULL, NULL, NULL, 1),
(511, 5, 'BANKE', 'बाँके', '2019-01-10 12:10:05', NULL, NULL, NULL, 1),
(512, 5, 'BARDIYA', 'बर्दिया', '2019-01-10 12:10:05', NULL, NULL, NULL, 1),
(601, 6, 'DOLPA', 'डोल्पा', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(602, 6, 'MUGU', 'मुगु', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(603, 6, 'HUMLA', 'हुम्ला', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(604, 6, 'JUMLA', 'जुम्ला', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(605, 6, 'KALIKOT', 'कालिकोट', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(606, 6, 'DAILEKH', 'दैलेख', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(607, 6, 'JAJARKOT', 'जाजरकोट', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(608, 6, 'RUKUM WEST', 'रुकुम (पश्चिम भाग)', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(609, 6, 'SALYAN', 'सल्यान', '2019-01-10 12:10:05', '2020-11-09 09:42:29', NULL, NULL, 0),
(610, 6, 'SURKHET', 'सुर्खेत', '2019-01-10 12:10:05', '2020-11-09 09:42:37', NULL, NULL, 1),
(701, 7, 'BAJURA', 'बाजुरा', '2019-01-10 12:10:05', '2020-11-09 09:42:51', NULL, NULL, 0),
(702, 7, 'BAJHANG', 'बझाङ', '2019-01-10 12:10:05', '2020-11-09 09:42:51', NULL, NULL, 0),
(703, 7, 'DARCHULA', 'दार्चुला', '2019-01-10 12:10:05', '2020-11-09 09:42:51', NULL, NULL, 0),
(704, 7, 'BAITADI', 'बैतडी', '2019-01-10 12:10:05', '2020-11-09 09:42:51', NULL, NULL, 0),
(705, 7, 'DADELDHURA', 'डँडेलधुरा', '2019-01-10 12:10:05', '2020-11-09 09:42:51', NULL, NULL, 0),
(706, 7, 'DOTI', 'डोटी', '2019-01-10 12:10:05', '2020-11-09 09:42:51', NULL, NULL, 0),
(707, 7, 'ACHHAM', 'अछाम', '2019-01-10 12:10:05', '2019-05-02 13:59:54', NULL, NULL, 0),
(708, 7, 'KAILALI', 'कैलाली', '2019-01-10 12:10:05', '2020-11-09 09:43:00', NULL, NULL, 1),
(709, 7, 'KANCHANPUR', 'कञ्चनपुर', '2019-01-10 12:10:05', '2020-11-09 09:43:02', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `description` text,
  `location` varchar(256) DEFAULT NULL,
  `is_event` tinyint(4) DEFAULT NULL,
  `facebook_link` varchar(256) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `image`, `description`, `location`, `is_event`, `facebook_link`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Velit placeat ducim', 'public/uploads/shares/10.jpg', '<p>Nesciunt, voluptas s.</p>', 'Dolore cumque error', 1, 'Pariatur Temporibus', '2022-08-25', '11 am to 2 pm', 1, '2022-08-14 10:31:52', '2022-08-29 01:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` text,
  `description` longtext,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`id`, `title`, `description`, `sort_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Title 1', '<p>Title 1 Description</p>', 1, '1', 1, 1, '2021-02-09 03:43:57', '2022-08-29 01:43:06'),
(2, 'Title 2', '<p>Title 2 Descirption</p>', 2, '1', 1, 1, '2021-02-09 03:44:19', '2022-08-29 01:43:16'),
(5, 'Usa faq 1', '<p>This is faq&nbsp; of usa</p>', 3, '1', 1, NULL, '2022-08-29 01:41:50', '2022-08-29 01:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_features`
--

CREATE TABLE `tbl_features` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `sub_title` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`id`, `title`, `sub_title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Get a digital bank account instantly​', NULL, '<p>The quick and easy way to open an account online. Begin sending or receiving money as soon as you register your account. Manage your money effectively and stay on top of your expenses. You can shop and save with your KrillPay physical or virtual debit card. These are just a few of the reasons why banking with KrillPay is so convenient.</p>', 'public/uploads/shares/features/feature-11.png', 1, '2022-11-13 11:35:16', '2022-11-15 12:06:42'),
(2, 'Accelerate your savings objectives with KrillPay', NULL, '<p>KrillPay can assist you in visualizing your short- and long-term financial objectives, whether you\'re saving for a home, a phone, or a rainy day. You can open virtual savings accounts and make as many deposits or withdrawals as you wish.</p>', 'public/uploads/shares/features/feature-2.png', 1, '2022-11-13 11:36:19', '2022-11-15 08:33:17'),
(4, 'A digital banking experience for all', NULL, '<ul style=\"list-style-type: disc;\">\r\n<li><span style=\"color: #000000;\"><strong>Convenient</strong> - One app for all your needs</span></li>\r\n<li><span style=\"color: #000000;\"><strong>Fast</strong> - Get a full Digital account in minutes</span></li>\r\n<li><span style=\"color: #000000;\"><strong>Smart</strong> - Your own assistant KrillPay in the App</span></li>\r\n<li><span style=\"color: #000000;\"><strong>Innovative</strong> - Financial management tools at your fingertips</span></li>\r\n</ul>', 'public/uploads/shares/features/feature33.png', 1, '2022-11-14 00:07:23', '2022-11-15 12:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `service` text,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `message` text,
  `ip_address` varchar(50) DEFAULT NULL,
  `viewed` enum('1','0') NOT NULL DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `name`, `address`, `service`, `email`, `phone`, `subject`, `message`, `ip_address`, `viewed`, `status`, `created_at`, `updated_at`) VALUES
(6, 'kya2X838qj', NULL, 'WhsdGGlONH', 'ngxxp@mox6.com', '4727640120', NULL, '9032356779', NULL, '0', '1', '2022-11-10 11:19:13', '2022-11-10 11:19:13'),
(7, 'Narayan Adhikari', NULL, 'here is interest', 'adhikarin641@gmail.com', '9841414141', NULL, 'here is message', NULL, '1', '1', '2022-11-13 12:12:37', '2022-11-13 12:13:22'),
(8, 'May Nixon', NULL, 'Et dolor deserunt di', 'buliqyda@mailinator.com', '+1 (834) 576-3527', NULL, 'Voluptatem quia sunt', NULL, '0', '1', '2022-11-15 04:46:55', '2022-11-15 04:46:55'),
(9, 'Emma Clemons', NULL, 'Optio atque anim Na', 'zygotazel@mailinator.com', '+1 (766) 286-1045', NULL, 'Minim amet excepteu', NULL, '0', '1', '2022-11-15 04:47:25', '2022-11-15 04:47:25'),
(10, 'Geraldine Wall', NULL, 'Quis nihil commodi q', 'ludux@mailinator.com', '+1 (629) 271-5454', NULL, 'Harum voluptas sunt', NULL, '0', '1', '2022-11-15 04:50:07', '2022-11-15 04:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback_reply`
--

CREATE TABLE `tbl_feedback_reply` (
  `id` int(10) UNSIGNED NOT NULL,
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `message_reply` text,
  `inserted_datetime` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_fail_logs`
--

CREATE TABLE `tbl_login_fail_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) NOT NULL,
  `fail_password` varchar(191) NOT NULL,
  `ip_address` varchar(191) NOT NULL,
  `login_device` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Primary Menu', '2020-01-17 18:05:08', '2020-01-17 18:05:08'),
(2, 'Quick Links', '2020-01-18 05:11:56', '2022-08-29 02:38:21'),
(3, 'Quick Links - sidemenu', '2020-01-18 05:12:14', '2022-08-29 02:38:40'),
(4, 'Information', '2022-03-10 22:35:49', '2022-03-10 22:35:49'),
(5, 'SideMenu', '2022-08-28 23:59:33', '2022-08-28 23:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_items`
--

CREATE TABLE `tbl_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menu_items`
--

INSERT INTO `tbl_menu_items` (`id`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'http://localhost/consultancy', 0, 0, NULL, 1, 0, '2020-01-17 18:05:15', '2022-08-28 23:47:25'),
(2, 'Study Abroad', '#', 0, 1, NULL, 1, 0, '2020-01-17 18:05:32', '2022-08-28 23:53:42'),
(4, 'Contact', 'http://localhost/consultancy/contact', 0, 6, NULL, 1, 0, '2020-01-17 18:06:32', '2022-08-29 02:36:30'),
(5, 'University', 'http://localhost/consultancy/universities', 0, 5, NULL, 1, 0, '2020-01-17 18:06:51', '2022-08-29 02:36:30'),
(11, 'Study in Uk', 'http://localhost/consultancy/study-abroad/study-in-uk', 2, 2, NULL, 1, 1, '2020-01-17 18:08:03', '2022-08-28 23:53:40'),
(20, 'Home', 'http://localhost/consultancy', 0, 0, NULL, 2, 0, '2020-01-18 05:12:04', '2022-08-29 00:23:54'),
(21, 'About us', 'http://localhost/consultancy/page/about-us', 0, 0, NULL, 3, 0, '2020-01-18 05:12:24', '2022-08-29 02:44:12'),
(22, 'Testimonial', 'http://localhost/consultancy/testimonial', 0, 1, NULL, 3, 0, '2020-01-18 05:12:35', '2022-08-29 02:43:56'),
(28, 'Contact us', 'http://localhost/consultancy/contact', 0, 1, NULL, 2, 0, '2020-01-17 18:08:24', '2022-08-29 00:24:31'),
(30, 'School Program', 'http://localhost/aoc/', 0, 1, NULL, 4, 0, '2022-03-10 22:36:17', '2022-03-10 22:36:17'),
(31, 'Overview', '#', 0, 0, NULL, 5, 0, '2022-08-28 23:59:47', '2022-08-29 00:00:52'),
(32, 'About Us', 'http://localhost/consultancy/page/about-us', 31, 1, NULL, 5, 1, '2022-08-29 00:00:52', '2022-08-29 00:00:58'),
(33, 'Why Choose', 'http://localhost/consultancy/why-choose', 31, 2, NULL, 5, 1, '2022-08-29 00:01:31', '2022-08-29 00:03:13'),
(34, 'Study In UK', 'http://localhost/consultancy/study-abroad/study-in-uk', 35, 4, NULL, 5, 1, '2022-08-29 00:03:13', '2022-08-29 00:03:38'),
(35, 'Study Abroad', '#', 0, 3, NULL, 5, 0, '2022-08-29 00:03:20', '2022-08-29 00:03:24'),
(36, 'University', '#', 0, 7, NULL, 5, 0, '2022-08-29 00:03:38', '2022-08-29 02:37:38'),
(37, 'University of Nepal', 'http://localhost/consultancy/university/nepal', 36, 8, NULL, 5, 1, '2022-08-29 00:04:07', '2022-08-29 02:37:38'),
(38, 'Testimonial', 'http://localhost/consultancy/testimonial', 0, 10, NULL, 5, 0, '2022-08-29 00:04:48', '2022-08-29 02:37:38'),
(39, 'Contact Us', 'http://localhost/consultancy/contact', 0, 11, NULL, 5, 0, '2022-08-29 00:05:08', '2022-08-29 02:37:38'),
(40, 'FAQ', 'http://localhost/consultancy/faq', 0, 9, NULL, 5, 0, '2022-08-29 01:56:00', '2022-08-29 02:37:38'),
(41, 'Scholarship', '#', 0, 3, NULL, 1, 0, '2022-08-29 02:35:51', '2022-08-29 02:36:28'),
(42, 'Scholarship Offers', 'http://localhost/consultancy/scholarship-offer', 41, 4, NULL, 1, 1, '2022-08-29 02:36:28', '2022-08-29 02:36:31'),
(43, 'Scholarship', '#', 0, 5, NULL, 5, 0, '2022-08-29 02:37:21', '2022-08-29 02:37:38'),
(44, 'Scholarship Offers', 'http://localhost/consultancy/scholarship-offer', 43, 6, NULL, 5, 1, '2022-08-29 02:37:31', '2022-08-29 02:37:38'),
(45, 'Contact Us', 'http://localhost/consultancy/contact', 0, 2, NULL, 3, 0, '2022-08-29 02:44:29', '2022-08-29 02:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter_list`
--

CREATE TABLE `tbl_newsletter_list` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_newsletter_list`
--

INSERT INTO `tbl_newsletter_list` (`id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Qekkum7jc0', 'zdxyp@kgwj.com', 1, '2022-11-14 18:01:10', '2022-11-14 18:01:10'),
(2, 'hxnvxi8m4S', '2vpgt@zcl9.com', 1, '2022-11-14 18:02:56', '2022-11-14 18:02:56'),
(3, 'YAlodCOyAC', 'qhfmh@er9a.com', 1, '2022-11-14 18:03:26', '2022-11-14 18:03:26'),
(4, 'PDbwteG88W', 'b7wcc@r776.com', 1, '2022-11-15 04:48:08', '2022-11-15 04:48:08'),
(5, 'torivome@mailinator.com', 'gatotumi@mailinator.com', 1, '2022-11-15 04:49:51', '2022-11-15 04:49:51'),
(6, 'EQ5fod7Pvx', 'r8izb@ur6n.com', 1, '2022-11-15 08:51:06', '2022-11-15 08:51:06'),
(7, '71fZsnKbSD', 'bvvkl@gmbd.com', 1, '2022-11-15 11:01:03', '2022-11-15 11:01:03'),
(8, 'GtQYzUcExc', 'gksq7@7vx0.com', 1, '2022-11-15 11:01:14', '2022-11-15 11:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` text,
  `title` text,
  `sub_title` varchar(100) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `meta_title` text,
  `meta_keywords` text,
  `meta_description` text,
  `description` longtext,
  `viewcount` int(10) UNSIGNED DEFAULT '1',
  `show_on_homepage` enum('0','1') DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `slug`, `title`, `sub_title`, `image`, `published_date`, `meta_title`, `meta_keywords`, `meta_description`, `description`, `viewcount`, `show_on_homepage`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(6, 'about-us', 'About Us', 'A Neobank that connects Africa with North America', 'public/uploads/shares/about/about-us.jpeg', '2022-11-13', 'About Us', 'About Us', 'About Us', '<p class=\"elementor-icon-list-item\" style=\"line-height: 18.0pt;\"><span style=\"font-family: \'Open Sans\',sans-serif; color: #444444;\">KrillPay is the newest entrant to the financial scene as a digital bank that aims to provide financial inclusion for the unbanked. A Neobank that connects African immigrants in the United States with their friends and family members in Sub-Saharan Africa.</span></p>\r\n<p class=\"elementor-icon-list-item\" style=\"line-height: 18.0pt;\"><span style=\"font-family: \'Open Sans\',sans-serif; color: #444444;\">A Neobank for Africa\'s unbanked and underbanked to say goodbye to long lines at ATMs, long hours inside bank buildings, and goodbye to inconveniences. KrillPay promises a digital banking experience you&rsquo;d expect from traditional banks, but without the hassle of keeping a large balance and hidden fees. Begin saving for the future with a variety of savings and interest-bearing accounts.</span></p>', 1, '1', 1, 1, '1', '2022-11-13 12:06:35', '2022-11-15 08:36:10'),
(7, 'fueled-by-technology', 'Fueled by Technology', 'Fueled by Technology', 'public/uploads/shares/about/about-us-2.jpeg', '2022-11-14', 'About Us', 'About Us', 'About Us', '<p><span style=\"color: #000000;\">Consumer behaviors and expectations are always changing, compelling industries to reassess their goals, adopt new technology, and innovate at a faster rate. As digital technology becomes an integral part of daily life, the banking and financial sector must abandon its previous conservative strategy and instead prioritize the disruptive use of technology to engage clients and maintain a competitive advantage over other businesses.</span></p>\r\n<p><span style=\"color: #000000;\">Krillpay focuses on constructing a technology platform to deliver a one-of-a-kind digital banking experience for the unbanked and underbanked by emphasizing convenience, a customer-centric culture, and security.</span></p>', 1, '1', 1, 1, '1', '2022-11-14 13:18:57', '2022-11-15 08:38:07'),
(8, 'terms-and-conditions', 'Terms and Conditions', 'Terms and Conditions', 'public/uploads/shares/usa_flag_resized.png', '2022-11-15', 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', '<p><span style=\"color: #000000;\">We provide economic infrastructure for the internet. Businesses of all sizes use our software and services to accept payments and manage their businesses online. Stripe cares about the security and privacy of the personal data that is entrusted to us. This Privacy Policy (&ldquo;Policy&rdquo;) describes the &ldquo;Personal Data&rdquo; that we collect about you, how we use it, how we share it, your rights and choices, and how you can contact us about our privacy practices. This Policy also outlines your data subject rights, including the right to object to some uses of your Personal Data by us. Please visit the Stripe Privacy Center for more information about our privacy practices. &ldquo;Stripe&rdquo;, &ldquo;we&rdquo;, &ldquo;our&rdquo; or &ldquo;us&rdquo; means the Stripe entity responsible for the collection and use of personal data under this Privacy Policy. It differs depending on your country. Learn more. &ldquo;Personal Data&rdquo; means any information that relates to an identified or identifiable individual, and can include information about how you engage with our Services (e.g. device information, IP address).</span></p>\r\n<p><span style=\"color: #000000;\">&ldquo;Services&rdquo; means the products and services that Stripe indicates are covered by this Policy, which may include Stripe-provided devices and apps. Our &ldquo;Business Services&rdquo; are Services provided by Stripe to entities (&ldquo;Business Users&rdquo;) who directly and indirectly provide us with &ldquo;End Customer&rdquo; Personal Data in connection with those Business Users&rsquo; own business and activities. Our &ldquo;End User Services&rdquo; are those Services which Stripe directs to individuals (rather than entities) so that those individuals do business directly with Stripe. &ldquo;Sites&rdquo; means Stripe.com and the other websites that Stripe indicates are covered by this Policy. Collectively, we refer to Sites, Business Services and End User Services as &ldquo;Services&rdquo;.</span></p>\r\n<p><span style=\"color: #000000;\">&nbsp;</span></p>', 1, '1', 1, 1, '1', '2022-11-15 10:05:57', '2022-11-15 10:42:22'),
(9, 'privacy-policy', 'Privacy Policy', 'Privacy Policy', 'public/uploads/shares/usa_flag_resized_jpeg.jpg', '2022-11-15', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '<p><span style=\"color: #000000;\">We provide economic infrastructure for the internet. Businesses of all sizes use our software and services to accept payments and manage their businesses online. Stripe cares about the security and privacy of the personal data that is entrusted to us. This Privacy Policy (&ldquo;Policy&rdquo;) describes the &ldquo;Personal Data&rdquo; that we collect about you, how we use it, how we share it, your rights and choices, and how you can contact us about our privacy practices. This Policy also outlines your data subject rights, including the right to object to some uses of your Personal Data by us. Please visit the Stripe Privacy Center for more information about our privacy practices. &ldquo;Stripe&rdquo;, &ldquo;we&rdquo;, &ldquo;our&rdquo; or &ldquo;us&rdquo; means the Stripe entity responsible for the collection and use of personal data under this Privacy Policy. It differs depending on your country. Learn more. &ldquo;Personal Data&rdquo; means any information that relates to an identified or identifiable individual, and can include information about how you engage with our Services (e.g. device information, IP address).</span></p>\r\n<p><span style=\"color: #000000;\">&ldquo;Services&rdquo; means the products and services that Stripe indicates are covered by this Policy, which may include Stripe-provided devices and apps. Our &ldquo;Business Services&rdquo; are Services provided by Stripe to entities (&ldquo;Business Users&rdquo;) who directly and indirectly provide us with &ldquo;End Customer&rdquo; Personal Data in connection with those Business Users&rsquo; own business and activities. Our &ldquo;End User Services&rdquo; are those Services which Stripe directs to individuals (rather than entities) so that those individuals do business directly with Stripe. &ldquo;Sites&rdquo; means Stripe.com and the other websites that Stripe indicates are covered by this Policy. Collectively, we refer to Sites, Business Services and End User Services as &ldquo;Services&rdquo;.</span></p>\r\n<p><span style=\"color: #000000;\">&nbsp;</span></p>', 1, '1', 1, 1, '1', '2022-11-15 10:07:59', '2022-11-15 10:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner`
--

CREATE TABLE `tbl_partner` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_partner`
--

INSERT INTO `tbl_partner` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Cameroon', 'public/uploads/shares/partners/cameroon.png', 1, '2022-11-15 07:42:46', '2022-11-15 07:42:46'),
(4, 'Nigeria', 'public/uploads/shares/partners/nigeria.png', 1, '2022-11-15 07:43:11', '2022-11-15 07:43:11'),
(5, 'Benin', 'public/uploads/shares/partners/benin.png', 1, '2022-11-15 07:43:28', '2022-11-15 07:43:28'),
(6, 'Togo', 'public/uploads/shares/partners/togo.png', 1, '2022-11-15 07:43:52', '2022-11-15 07:43:52'),
(7, 'Ghana', 'public/uploads/shares/partners/ghana.png', 1, '2022-11-15 07:44:07', '2022-11-15 07:46:07'),
(8, 'USA', 'public/uploads/shares/partners/usa.png', 1, '2022-11-15 07:44:28', '2022-11-15 07:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(10) NOT NULL,
  `title` text,
  `slug` text,
  `description` longtext,
  `image` varchar(250) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `sub_title` text,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `video_link` varchar(256) DEFAULT NULL,
  `image_slideshow_text` text,
  `viewcount` int(11) DEFAULT '1',
  `meta_title` varchar(256) DEFAULT NULL,
  `meta_keywords` varchar(256) DEFAULT NULL,
  `meta_description` varchar(256) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `title`, `slug`, `description`, `image`, `file`, `published_date`, `sub_title`, `author_id`, `video_link`, `image_slideshow_text`, `viewcount`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Real time Notifications', '', '<p>Your customer stay informed in real time with everything that&rsquo;s happening on his account: payments, transfer, advice. Get visibility on your customers\' flows to anticipate their needs.</p>\n<p>&nbsp;</p>', 'public/uploads/shares/notifications/feature-item-1.png', NULL, NULL, 'Smart Banking', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1', 1, 1, '2022-11-13 11:06:27', '2022-11-13 11:11:27'),
(6, 'Real time Notifications', 'real-time-notifications', '<section class=\"features-section features-section-two\">\r\n<div class=\"overlay pt-60\">\r\n<div class=\"container wow fadeInUp\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"top-section\">\r\n<p>Your customer stay informed in real time with everything that&rsquo;s happening on his account: payments, transfer, advice. Get visibility on your customers\' flows to anticipate their needs.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', 'public/uploads/shares/notifications/feature-item-2.png', NULL, NULL, 'Smart Banking', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1', 1, NULL, '2022-11-13 11:13:37', '2022-11-13 11:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`id`, `title`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'State 1', 1, 1, NULL, NULL),
(2, 'State 2', 1, 1, NULL, NULL),
(3, 'State 3', 1, 1, NULL, NULL),
(4, 'State 4', 1, 1, NULL, NULL),
(5, 'State 5', 1, 1, NULL, NULL),
(6, 'State 6', 1, 1, NULL, NULL),
(7, 'State 7', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholarship_offers`
--

CREATE TABLE `tbl_scholarship_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `description` text,
  `scholarship_amount` text,
  `valid_till` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_scholarship_offers`
--

INSERT INTO `tbl_scholarship_offers` (`id`, `country_id`, `title`, `image`, `description`, `scholarship_amount`, `valid_till`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Debitis tempore vol', 'public/uploads/shares/authorization-background.jpg', '<p>Occaecat aliquid rer.</p>', '<p>Est in itaque dolore.</p>', '2002-08-10', 1, '2022-08-29 02:20:07', '2022-08-29 02:20:07'),
(2, 3, 'Nam labore sed cumqu', 'public/uploads/shares/slider_11_(1).png', '<p>Velit, optio, quaera.</p>', '<p>Qui deserunt praesen.</p>', '2018-05-05', 1, '2022-08-29 02:28:57', '2022-08-29 02:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(10) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Push notifications', 'Thanks to real-time push notifications, you can monitor all incoming and outgoing transactions on your bank account.', 'public/uploads/shares/service/our-solutions-icon-1.png', 1, '2022-11-12 12:09:33', '2022-11-14 15:42:09'),
(2, 'Track Expenses', 'Not certain where your money is going? In real-time, our Insights tool automatically categorizes your spending.', 'public/uploads/shares/service/our-solutions-icon-2.png', 1, '2022-11-12 12:10:10', '2022-11-14 15:44:25'),
(3, 'Live support', 'If you have any queries or have any issues, our KrillPay Customer Support team is always available to assist you.', 'public/uploads/shares/service/our-solutions-icon-3.png', 1, '2022-11-12 12:11:04', '2022-11-14 16:05:41'),
(4, 'Advanced security', 'With Passwordless Multi-Factor Authentication and Biometric login, your online and in-store purchases are safe and secure.', 'public/uploads/shares/service/more-features-icon-3.png', 1, '2022-11-12 12:11:48', '2022-11-14 15:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_setting`
--

CREATE TABLE `tbl_site_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `phone_no` varchar(500) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `instagram` varchar(500) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `fav_icon` varchar(500) DEFAULT NULL,
  `map_detail` text,
  `skype` varchar(500) DEFAULT NULL,
  `linkedin` varchar(500) DEFAULT NULL,
  `youtube` varchar(500) DEFAULT NULL,
  `call_to_action_title` varchar(500) DEFAULT NULL,
  `call_to_action_text` text,
  `study_abroad_title` varchar(500) DEFAULT NULL,
  `study_abroad_text` text,
  `why_choose_title` varchar(256) DEFAULT NULL,
  `why_choose_text` text,
  `years_of_experience` varchar(100) DEFAULT NULL,
  `countries` varchar(100) DEFAULT NULL,
  `universities` varchar(100) DEFAULT NULL,
  `success_stories` varchar(100) DEFAULT NULL,
  `visa_success_ratio_text` text,
  `how_we_work_text` text,
  `testimonial_title` varchar(256) DEFAULT NULL,
  `testimonial_text` text,
  `authorization_title` varchar(500) DEFAULT NULL,
  `authorization_text` text,
  `authorization_bg_image` varchar(500) DEFAULT NULL,
  `event_title` varchar(500) DEFAULT NULL,
  `employees_number` varchar(100) DEFAULT NULL,
  `office_no` varchar(100) DEFAULT NULL,
  `volumn_no` varchar(100) DEFAULT NULL,
  `customer_satisfaction` varchar(100) DEFAULT NULL,
  `active_user` varchar(100) DEFAULT NULL,
  `new_user_per_week` varchar(100) DEFAULT NULL,
  `our_value_header` varchar(200) DEFAULT NULL,
  `who_we_are_header` varchar(200) DEFAULT NULL,
  `ready_to_start` text,
  `wwr_video_url` varchar(200) DEFAULT NULL,
  `service_header` varchar(200) DEFAULT NULL,
  `testimonial_header` varchar(200) DEFAULT NULL,
  `app_link` varchar(200) DEFAULT NULL,
  `download_header` varchar(200) DEFAULT NULL,
  `homepage_first_banner_image` varchar(200) DEFAULT NULL,
  `mobile_app_image` varchar(200) DEFAULT NULL,
  `faq_banner_image` varchar(200) DEFAULT NULL,
  `get_start_banner_image` varchar(200) DEFAULT NULL,
  `event_text` text,
  `homepage_first_section_title` text,
  `homepage_first_section_desc` text,
  `meta_descriptions` varchar(500) DEFAULT NULL,
  `meta_keywords` varchar(500) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_site_setting`
--

INSERT INTO `tbl_site_setting` (`id`, `title`, `email`, `address`, `mobile_no`, `phone_no`, `facebook`, `twitter`, `instagram`, `logo`, `fav_icon`, `map_detail`, `skype`, `linkedin`, `youtube`, `call_to_action_title`, `call_to_action_text`, `study_abroad_title`, `study_abroad_text`, `why_choose_title`, `why_choose_text`, `years_of_experience`, `countries`, `universities`, `success_stories`, `visa_success_ratio_text`, `how_we_work_text`, `testimonial_title`, `testimonial_text`, `authorization_title`, `authorization_text`, `authorization_bg_image`, `event_title`, `employees_number`, `office_no`, `volumn_no`, `customer_satisfaction`, `active_user`, `new_user_per_week`, `our_value_header`, `who_we_are_header`, `ready_to_start`, `wwr_video_url`, `service_header`, `testimonial_header`, `app_link`, `download_header`, `homepage_first_banner_image`, `mobile_app_image`, `faq_banner_image`, `get_start_banner_image`, `event_text`, `homepage_first_section_title`, `homepage_first_section_desc`, `meta_descriptions`, `meta_keywords`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Krillpay', 'krillpay@gmail.com', '3720 Rime Village Drive, Hoover AL 35216. USA', '+1 (205) 452-9541', '+1 (205) 452-9541', 'https://www.facebook.com/', 'https://twitter.com', 'https://instagram.com', 'https://krill.bagmarts.com/public/uploads/shares/mainlogo.png', 'http://localhost/revive-management/public/uploads/shares/10.jpg', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1825.9459186909382!2d90.38663166995215!3d23.751236206760797!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a52bb2e7df%3A0x2db066ca098cb0d6!2sNHP+Education+Consultants!5e0!3m2!1sen!2s!4v1395339610404', 'https://skype.com', 'https://linkedin.com', 'https://youtube.com', 'Get a free consultation', 'Book an appointment with our experieneced consultanats to discuss your study abroad options.', 'Choose Your Country', 'NHP processes Student Visa, Student Spouse Visa and Parents Visitors Visa for UK, USA, Canada, Australia and Malaysia.', 'Why Choose NHP?', 'In confusion, many can\'t decide where to get proper knowing for his or her desired aim and sometimes it can be an unwise decision.', '16', '5', '100', '2000', 'We have a very good visa success rates due to our very professional commitment towards our students.', 'It is very easy to apply through NHP Education Consultants. It starts from career counselling and ends in pre-departure orientation.', 'What Our Students Say?', 'We’ve chosen a selection of student testimonials to give you a better insight about us, our honesty, transparency and our devotion towards our students.', 'Authorization And Certificate Of Recognitions', 'It is always better to apply through Authorized, Trained, Experienced Consultants. NHP Education Consultants is the Authorized Agent of many UK, USA, Canada, Australia and Malaysian Universities and Colleges.', 'http://localhost/consultancy/public/uploads/shares/authorization-background.jpg', 'Event and University Visits', '200', '6', '$10 Millions', '90', '1', '10', 'The values that drive everything we do', 'Last-mile access to basic digital banking services for those in remote areas.', 'It only takes a few minutes to register your FREE KrillPay account.', 'https://www.youtube.com/watch?v=tDad6tsZU1Y', NULL, NULL, 'https://play.google.com/store/apps/details?id=io.zotto.linkpay', 'Our digital bank app is currently under development. Join our waitlist and we will notify you when the development is completed and the app is ready for download.', 'https://krill.bagmarts.com/public/uploads/shares/banners/banner_img.png', 'https://krill.bagmarts.com/public/uploads/shares/banners/apps_1.png', 'https://krill.bagmarts.com/public/uploads/shares/banners/get_the_venmo_app_-_desktop_1.png', NULL, 'Keep an eye on our regular Education Event, University Visits, Seminar, etc.', 'A Neobank that connects Africa with North America', 'KrillPay is a new digital bank that connects African immigrants in the US with their family and friends in Sub-Saharan Africa. A quick and easy way to send and receive money for free.', 'descr', 'keyword', 1, '2018-04-30 17:06:36', '2022-11-15 15:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `title` varchar(500) NOT NULL,
  `sub_title` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` text NOT NULL,
  `btn_text` varchar(256) DEFAULT NULL,
  `btn_url` varchar(500) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `slug`, `title`, `sub_title`, `image`, `description`, `btn_text`, `btn_url`, `published_date`, `sort_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'quos-fugiat-nostrud', 'Reprehenderit et sit', NULL, 'public/uploads/shares/slider/slider-1.jpg', '<p>Consequatur consecte.</p>', NULL, NULL, '1933-10-24', 3, 1, 1, 1, '2022-03-08 23:00:25', '2022-08-15 10:06:38'),
(2, 'ea-dolor-aut-ab-dolo', 'Thinking of Becoming CA', NULL, 'public/uploads/shares/slider/slider-1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>', NULL, NULL, '2022-03-15', 2, 1, 1, 1, '2022-03-10 21:15:10', '2022-08-15 10:06:02'),
(5, 'slider-1', 'Slider 1', 'Slider sub title 1', 'public/uploads/shares/slider_11_(1).png', '<p>This is the description of slider 1</p>\r\n<p>&nbsp;</p>', 'Read More', 'https://www.google.com/', '2022-08-14', 1, 1, 1, 1, '2022-08-14 02:32:57', '2022-08-15 10:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_category`
--

CREATE TABLE `tbl_staff_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `sort_order` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT '0',
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_staff_category`
--

INSERT INTO `tbl_staff_category` (`id`, `title`, `slug`, `sort_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Board Director', 'board-director', 1, 1, 1, 1, '2020-01-26 18:07:48', '2020-01-26 18:11:19'),
(2, 'Executive Member', 'executive-member', 2, 1, 1, 1, '2020-01-26 18:12:10', '2020-01-26 18:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statistic`
--

CREATE TABLE `tbl_statistic` (
  `id` int(10) NOT NULL,
  `title` text,
  `data_value` varchar(50) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_statistic`
--

INSERT INTO `tbl_statistic` (`id`, `title`, `data_value`, `image`, `sort_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Speaker', '27+', 'public/uploads/shares/statistic/mic.png', 1, '1', NULL, NULL, '2020-08-06 04:01:31', '2020-08-06 04:01:31'),
(2, 'Workshops', '47+', 'public/uploads/shares/statistic/workshop.png', 2, '1', NULL, NULL, '2020-08-06 04:02:23', '2020-08-06 04:02:23'),
(3, 'Country', '4+', 'public/uploads/shares/statistic/globe.png', 3, '1', NULL, NULL, '2020-08-06 04:02:38', '2020-08-06 04:02:38'),
(4, 'Sponsor', '12+', NULL, 4, '1', NULL, NULL, '2020-08-06 04:03:02', '2020-08-06 04:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_study_abroad`
--

CREATE TABLE `tbl_study_abroad` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `heading_title` varchar(500) DEFAULT NULL,
  `sub_title` text,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `banner_image` varchar(256) DEFAULT NULL,
  `description` text,
  `req_document_desc` text,
  `application_procedure_desc` text,
  `visa_procedure_fee_desc` text,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_study_abroad`
--

INSERT INTO `tbl_study_abroad` (`id`, `title`, `slug`, `heading_title`, `sub_title`, `country_id`, `image`, `banner_image`, `description`, `req_document_desc`, `application_procedure_desc`, `visa_procedure_fee_desc`, `meta_title`, `meta_keywords`, `meta_description`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Study in UK', 'study-in-uk', 'Thinking about studying in UK from Bangladesh?', 'Do you want to study in UK from Bangladesh? Process your application through the British Council Trained Agent Counselor.', 3, 'public/uploads/shares/country/usa-flag.png', 'public/uploads/shares/slider_11_(1).png', '<p>One of the main advantages of studying in the UK is that you will be exposed to different cultures and experiences. The sights, sounds and tastes of the UK are varied. Whether you enjoy exploring cities or prefer to get out into the countryside, the UK has something to offer you.</p>\r\n<h6>Global Leader in International Education</h6>\r\n<p>According to the QS World University Rankings (2012), four of the top six universities in the world are in the UK. By studying in the UK, you have the opportunity to graduate from one of the best education systems in the world!</p>\r\n<h6>Excellent International Reputation</h6>\r\n<p>British qualifications are recognised internationally and valued by employers, universities and governments throughout the world. The UK is a popular destination for international students, and well respected for world-class standards of teaching. The UK is also renowned for the excellence of its research and teaching.</p>\r\n<h6>Value for Money</h6>\r\n<p>UK undergraduate study offers fantastic value for money and the sort of experience you can&rsquo;t put a price on. Undergraduate and postgraduate courses in the UK are generally much shorter than those abroad, which helps to reduce the amount of money require in paying tuition fees and living costs. Most undergraduate courses take three years to complete, although in Scotland it would be typically four years. A postgraduate Masters course will normally only take 1 year, whereas PhD will take 3 or 4 years. Furthermore, as an international student, you can work as well as study. If you are studying at degree level or above, you are permitted to work up to 20 hours a week during term time, with no limit during vacation periods. This can help you to gain both extra finances to support your studies and valuable work experience.. You will also have access to free health care on the National Health Service.</p>\r\n<h6>Improve your English</h6>\r\n<p>By studying and living in the UK, you will be immersed in the language and have the opportunity to perfect your English communication skills. Practise your English language skills every day, in shops and caf&eacute;s and while you&rsquo;re out with English-speaking friends, as well as in seminars and discussion groups on your course.</p>\r\n<h6>Multicultural Experience</h6>\r\n<p>UK is a multicultural, multi-faith country that has always welcomed migrants and visitors from abroad. By living in the UK, you will have the opportunity to experience new culture and meet people from different culture and countries. And, because the UK is such a popular destination for international students, you are sure to meet people from all over the world during your time in the UK.</p>', '<h6>Documents required for University Application:</h6>\r\n<ul>\r\n<li>\r\n<p>Scan copy of your passport</p>\r\n</li>\r\n<li>\r\n<p>Scan copies (original) of all educational Certificates &amp; Marksheets</p>\r\n</li>\r\n<li>\r\n<p>Scan copies (original) of Two Academic Reference Letter (For PG)</p>\r\n</li>\r\n<li>\r\n<p>Statement of Purpose</p>\r\n</li>\r\n<li>\r\n<p>Scan copy (original) of UKVI/Academic IELTS Certificate</p>\r\n</li>\r\n<li>\r\n<p>Job experience letter (if required)</p>\r\n</li>\r\n<li>\r\n<p>Other supporting documents (if available, e.g extracurricular activities)</p>\r\n</li>\r\n</ul>\r\n<h6>Documents required for Tier 4 Visa Application:</h6>\r\n<ul>\r\n<li>\r\n<p>A valid Passport</p>\r\n</li>\r\n<li>\r\n<p>A completed Online Visa Application Form</p>\r\n</li>\r\n<li>\r\n<p>Appropriate Visa Application Fee</p>\r\n</li>\r\n<li>\r\n<p>Immigration Health Surcharge (IHS)</p>\r\n</li>\r\n<li>\r\n<p>Confirmation of Acceptance for Studies (CAS) Letter from your sponsor (University)</p>\r\n</li>\r\n<li>\r\n<p>Medical Test - IOM</p>\r\n</li>\r\n<li>\r\n<p>Bank Statement and Bank Solvency Certificate (from Listed Bank only)</p>\r\n</li>\r\n<li>\r\n<p>All educational Certificates and Marksheets (Original)</p>\r\n</li>\r\n<li>\r\n<p>IELTS/TOEFL Certificate</p>\r\n</li>\r\n<li>\r\n<p>Job experience letter (if required)</p>\r\n</li>\r\n<li>\r\n<p>Other supporting documents (if available, e.g extracurricular activities)</p>\r\n</li>\r\n</ul>', '<h6>Intakes</h6>\r\n<p>The main intake offered by all Universities is September / October few universities offer Jan / Feb intake also.</p>\r\n<h6>English Language Requirements</h6>\r\n<p>UKVI IELTS is mandatory for Foundation programs. UKVI/Academic IELTS score of 5.5 to 6.5 is required for Undergraduate programs. For Postgraduate programs UKVI or Academic IELTS score of 6.0 to 6.5 is required.</p>\r\n<h6>Academic Requirement</h6>\r\n<p><strong>Undergraduate &ndash; Bachelors</strong></p>\r\n<ul>\r\n<li>\r\n<p>GPA 4.75 to 5.0 in HSC / Min 2C in A Level to 3A* in A Level</p>\r\n</li>\r\n<li>\r\n<p>Few Universities require Math course in 12th Grade for Business and Science programs</p>\r\n</li>\r\n</ul>\r\n<p><strong>Postgraduate &ndash; Masters</strong></p>\r\n<ul>\r\n<li>\r\n<p>CGPA 2.50+</p>\r\n</li>\r\n<li>\r\n<p>GRE or GMAT is not required for Business, Science and Engineering programs</p>\r\n</li>\r\n<li>\r\n<p>For MBA programs at some Universities students need to have work experience along with GMAT Score</p>\r\n</li>\r\n</ul>\r\n<p>Each institution sets its own entry requirements, and you will find that they vary between universities. Your application will normally be assessed on your current level of qualification.</p>\r\n<p>To make sure you meet all the admissions criteria for the course(s) you wish to apply for, contact the International Office at the institution(s) you are applying to and check.</p>', '<h6>Points required to obtain Tier 4 General Student Visa:</h6>\r\n<p>To successfully apply for a Tier 4 General visa, you must have to score 40 out of 40 points.</p>\r\n<ul>\r\n<li>\r\n<p>Confirmation of Acceptance for Studies (CAS) Letter &ndash; 30 Points.</p>\r\n</li>\r\n<li>\r\n<p>Maintenance (Funds) &ndash; 10 points</p>\r\n</li>\r\n</ul>\r\n<h6>Funds to be shown:</h6>\r\n<ul>\r\n<li>\r\n<p>If you wish to study within London borough &ndash; First year tuition + &pound;12,006</p>\r\n</li>\r\n<li>\r\n<p>Outside London borough &ndash; First year tuition + &pound;9,207</p>\r\n</li>\r\n</ul>\r\n<p><strong>Living Expenses:</strong>&nbsp;Estimated at &pound;500 - &pound;1000 (per month).</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Acceptable Funds:</strong>&nbsp;Bank balance in Savings Account, FDR Account (listed Bank only).</p>\r\n<h6>Visa Application Fees</h6>\r\n<ul>\r\n<li>\r\n<p>Tier 4 (General) or Tier 4 (Child) - &pound;348</p>\r\n</li>\r\n</ul>\r\n<h6>Visa processing times for Bangladesh</h6>\r\n<ul>\r\n<li>\r\n<p>7 Working Days (Premium) to 20 Working Days (Normal)</p>\r\n</li>\r\n</ul>', NULL, NULL, NULL, 1, 1, 1, '2022-08-15 11:17:02', '2022-08-15 11:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teams`
--

CREATE TABLE `tbl_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text,
  `linkedin_link` varchar(100) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED DEFAULT '1',
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teams`
--

INSERT INTO `tbl_teams` (`id`, `name`, `department_id`, `designation`, `image`, `description`, `linkedin_link`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Emmanuel Umoh', NULL, 'Cofounder & CEO', 'public/uploads/shares/team/emmanuel_umoh.jpg', NULL, 'https://www.linkedin.com/in/emmanuel-e-umoh/', 1, 1, '2022-11-14 17:04:22', '2022-11-15 09:24:38'),
(9, 'Niki Moyer', NULL, 'Cofounder & Business Development', 'public/uploads/shares/team/niki_moyer.jfif', NULL, NULL, 1, 1, '2022-11-14 19:16:29', '2022-11-14 19:16:29'),
(10, 'Rosemary Obasi', NULL, 'Chief Compliance Officer', 'public/uploads/shares/team/rosemary_obasi.jfif', NULL, 'https://www.linkedin.com/in/rosemary-obasi-084433b8/', 1, 1, '2022-11-14 19:18:05', '2022-11-15 09:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`id`, `name`, `designation`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Sophiya Sharma', 'United Kingdom', '<p><span style=\"color: #000000;\">It\'s been 2 years since I found KrillPay, and it\'s such a relief as a small</span><br /><span style=\"color: #000000;\"> business owner to not worry about unnecessary fees. I lost my credit card once, and</span><br /><span style=\"color: #000000;\"> the service was so prompt that I was back to work the next day!</span></p>', 'public/uploads/shares/testimonial/group_50.png', 0, '2022-11-10 12:17:42', '2022-11-15 13:49:34'),
(8, 'Sumita Sharma', 'Nepal', '<p><span style=\"color: #000000;\">Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter.</span></p>', 'public/uploads/shares/testimonial/group_50.png', 0, '2022-11-10 12:23:18', '2022-11-15 13:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_universities`
--

CREATE TABLE `tbl_universities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text,
  `image` varchar(256) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `website_link` varchar(256) DEFAULT NULL,
  `facebook_link` varchar(256) DEFAULT NULL,
  `twitter_link` varchar(256) DEFAULT NULL,
  `youtube_link` varchar(256) DEFAULT NULL,
  `facts_and_figure` text,
  `finance_and_intake` text,
  `video_url` varchar(256) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_universities`
--

INSERT INTO `tbl_universities` (`id`, `title`, `slug`, `country_id`, `description`, `image`, `logo`, `location`, `website_link`, `facebook_link`, `twitter_link`, `youtube_link`, `facts_and_figure`, `finance_and_intake`, `video_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'University of Ilinois', 'university-of-ilinois', 1, '<p>Itaque iusto eu qui .</p>', 'public/uploads/shares/a.jpg', NULL, 'Canada', 'https://www.vedulukurypily.cm', 'Eveniet illum cons', 'Est asperiores enim', 'Atque et corrupti e', '<p>Dolorem facilis cons.</p>', '<p>Id pariatur. Commodo.</p>', 'Facilis occaecat est', 1, '2022-08-15 08:31:07', '2022-08-27 22:42:36'),
(2, 'Nepal', 'nepal', 3, '<p>University of Kathmandu</p>', 'public/uploads/shares/slider_11_(1).png', 'public/uploads/shares/authorization-background.jpg', 'Kathmandu', 'https://www.buvyvuciq.com', 'Earum sint esse rec', 'Nemo omnis rerum max', 'Illum debitis itaqu', '<ul>\r\n<li>Established in 1959</li>\r\n<li>Public University</li>\r\n<li>Member of U15</li>\r\n<li>Very high Research Facilities</li>\r\n<li>Total Number of Students - 35,000+</li>\r\n<li>Total Number of Staff - 4,000+</li>\r\n<li>More than 100 programs</li>\r\n<li>Campus Size - 1,112 Acres</li>\r\n<li>World Ranking - Below 150</li>\r\n</ul>', '<ul>\r\n<li>Avg Cost of Tuition/Year NRs. 100</li>\r\n<li>Cost of Living/Year NRs. 100</li>\r\n<li>Application Fee N/A</li>\r\n<li>Intakes N/A</li>\r\n</ul>', 'https://youtu.be/mu53hBMQp10', 1, '2022-08-27 22:17:04', '2022-08-28 07:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login_logs`
--

CREATE TABLE `tbl_user_login_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `login_date` timestamp NULL DEFAULT NULL,
  `login_device` varchar(191) DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_login_logs`
--

INSERT INTO `tbl_user_login_logs` (`id`, `user_id`, `login_date`, `login_device`, `ip_address`) VALUES
(1, 1, '2022-11-13 18:21:50', 'Chrome', '103.163.182.202'),
(2, 1, '2022-11-13 18:52:45', 'Chrome', '103.163.182.202'),
(3, 1, '2022-11-13 23:44:26', 'Chrome', '75.228.82.122'),
(4, 1, '2022-11-14 00:17:56', 'Chrome', '75.228.82.122'),
(5, 1, '2022-11-14 13:02:37', 'Chrome', '75.228.82.122'),
(6, 1, '2022-11-14 15:06:49', 'Chrome', '103.186.197.165'),
(7, 1, '2022-11-14 15:40:17', 'Chrome', '75.228.82.122'),
(8, 1, '2022-11-14 17:28:17', 'Chrome', '75.228.82.122'),
(9, 1, '2022-11-15 01:39:40', 'Chrome', '75.228.82.122'),
(10, 1, '2022-11-15 04:39:18', 'Chrome', '103.163.182.74'),
(11, 1, '2022-11-15 07:32:32', 'Chrome', '103.163.182.28'),
(12, 1, '2022-11-15 13:48:39', 'Chrome', '75.228.82.122'),
(13, 1, '2022-11-15 15:21:36', 'Chrome', '111.119.49.133');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_value`
--

CREATE TABLE `tbl_value` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_value`
--

INSERT INTO `tbl_value` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Innovation', 'Lorem ipsum dolor sit amet consectetur imp adipiscing elit justo aliquet elit sed convallisolo neque aliquam elementum dolr.', 'public/uploads/shares/value/values-icon-1.png', 1, '2022-11-12 12:14:56', '2022-11-12 12:14:56'),
(2, 'Accountability', 'Lorem ipsum dolor sit amet consectetur imp adipiscing elit justo aliquet elit sed convallisolo neque aliquam elementum dolr.', 'public/uploads/shares/value/values-icon-2.png', 1, '2022-11-12 12:15:20', '2022-11-12 12:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_why_choose`
--

CREATE TABLE `tbl_why_choose` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `icon` varchar(100) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_why_choose`
--

INSERT INTO `tbl_why_choose` (`id`, `title`, `description`, `icon`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EXPERIENCE', '<p>Experience - all that matters! Having more than 16+ years of experience in education consultancy, NHP Education Consultants have constructed a history of success and unprecedented growth from a small consulting firm. Our dedication and unwavering commitment made it possible to create the goodwill that we achieved. We have a team of trained professional that you can rely on and trust. With us, you will get services from the best in the industry. We provide accurate, factual and updated information only. There are many pitfalls to avoid, important decisions to make, and systems to navigate. Our experts will make sure you have the best advice throughout your study abroad journey.</p>', 'flaticon-consultant', 1, 1, 1, '2022-08-14 08:13:57', '2022-08-15 21:48:16'),
(2, 'Transparency', '<p>Straight Talk is Good Business! Our services are our commitments to you and we deliver what we commit. We do not chase the impossible and make fake promises - we live in reality. We are truthful to our words and maintain accountability and integrity. We maintain transparency (openness, communication and accountability) in every aspect of our business. We work to ensure students and families receive the fullest picture of admissions with real insight into how they can navigate their futures, guiding them through the whole admissions process, visa application and even pre-departure orientation.</p>', 'flaticon-badge', 1, NULL, 1, '2022-08-15 21:49:44', '2022-08-15 21:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workings`
--

CREATE TABLE `tbl_workings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `image` varchar(256) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_workings`
--

INSERT INTO `tbl_workings` (`id`, `title`, `description`, `image`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Career Counselling', '<p>Career Counselling - Course and Institution Selection - University Application</p>', 'public/uploads/shares/workings/hww-counselling.jpg', 1, 1, 1, '2022-08-15 22:23:32', '2022-08-15 22:28:19'),
(2, 'Visa Documents Preparation', '<p>Visa Documents Preparation - Interview Preparation - Visa Application</p>', 'public/uploads/shares/workings/hww-visaapplication.jpg', 1, 1, 1, '2022-08-15 22:23:55', '2022-08-15 22:28:31'),
(3, 'Accommodation Arrangement', '<p>Accommodation Arrangement - Airport Pick Up - Pre-departure Orientation</p>', 'public/uploads/shares/workings/hww-departure.jpg', 1, 1, 1, '2022-08-15 22:24:17', '2022-08-15 22:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verify_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno_verify` tinyint(3) UNSIGNED DEFAULT '0',
  `discount_id` int(10) UNSIGNED DEFAULT NULL,
  `email_verify` tinyint(3) UNSIGNED DEFAULT '0',
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_contact_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_status` tinyint(4) DEFAULT NULL,
  `province_id` int(10) UNSIGNED DEFAULT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `pickup_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `change_status` tinyint(4) DEFAULT NULL,
  `bank_profile_status` tinyint(4) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT '0',
  `mail_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `verify_token`, `mobileno`, `address`, `mobileno_verify`, `discount_id`, `email_verify`, `company_name`, `alt_contact_no`, `website`, `image`, `image_status`, `province_id`, `district_id`, `city_id`, `pickup_address`, `description`, `change_status`, `bank_profile_status`, `status`, `mail_status`) VALUES
(1, 'Ram', 'ram@gmail.com', '2021-02-02 23:18:23', '$2y$10$ageNtP0OAMFNOmhiMwdjnOa2QonkX8IdbDIyZcSy3IUSP7ItcE4kK', NULL, '2021-02-03 23:18:23', '2021-02-03 23:18:23', NULL, '9808915987', 'Bhaktapur', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(2, 'Nivaj', 'nivajshakya@gmail.com', '2021-02-07 07:37:49', '$2y$10$qamcxDZ.WBgv93AIFpkA6uJNKAC54kXidzL9RjyqkneLkqbrI410W', 'wWZVbHqfr94qFBYfg0XsFHrtP6msr9ygwGEyouLvNz7GsILO2yakl85maz4O', '2021-02-07 07:37:23', '2021-02-15 09:36:42', NULL, '9841980800', 'manbhawan-05,lalitpur', 0, NULL, 1, NULL, NULL, NULL, 'images/logos/nivaj/ppjpg-1613380834.jpg', NULL, 3, 308, 50, 'manbhawan-05,lalitpur', NULL, 1, 1, 1, NULL),
(3, 'Rakshak Bajracharya', 'bajracharyarakshak@gmail.com', '2021-02-07 11:51:40', '$2y$10$84UuuZsfv.2YQOPWncNim.KfbUM8eYsLVZCasCC9a6.JLOah/oM7y', NULL, '2021-02-07 11:51:21', '2021-04-07 06:26:32', NULL, '9808553183', 'Banglamukhi', 0, 4, 1, 'name', NULL, NULL, 'images/logos/271681jpg-1614741378.jpg', 1, 3, 308, 34, 'Banglamukhi', NULL, 1, 1, 1, 1),
(4, 'Joy Bradley', 'fakumogus@mailinator.net', NULL, '$2y$10$KawOhgyrO5zlGFQLl.yIeOblWpVfEwHeXbPtGj50bxACHLgdf6yEW', NULL, '2021-02-08 08:28:29', '2021-02-08 08:28:29', 'c5qs6ReJVA4hjzxPl6hDrbYPCABXWugVeWjcFGkP', '43', NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(5, 'Ninzaj Nivaj', 'ninzajnivaj@gmail.com', '2021-02-08 11:18:19', '$2y$10$RlIuxnxxHDEizq.8MHeJeuroki8j0Q1rzJH1LIU4rdxKuaTGG3AGu', NULL, '2021-02-08 11:17:35', '2021-03-03 05:20:23', NULL, '9841980801', NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL),
(6, 'Saroj Manandhar', 'saroses.smdr@gmail.com', '2021-02-09 09:13:53', '$2y$10$b7Rek9iadbJ2O2ftMEwNGODM0cZuI7O/VgbHWRxQcM71FIlj21Xb.', NULL, '2021-02-09 09:13:00', '2021-02-28 00:26:01', NULL, '9808915988', 'asdf', 0, NULL, 1, 'fasdfasd', NULL, NULL, NULL, NULL, 2, 203, 75, 'asdff', NULL, NULL, NULL, 1, 1),
(7, 'Ronis Shrestha', 'shrestharonis@gmail.com', '2021-02-15 08:55:49', '$2y$10$yPZcU6q.qHyFA2PdpBnFwuHCLMumOEjKqpNvha/bXSiYf1iEw.ZlO', NULL, '2021-02-15 08:55:08', '2021-02-15 09:19:36', NULL, '9851173279', NULL, 0, NULL, 1, 'Nonstop Delivery', '9851125131', 'www.stxavierconsult.com.np', 'images/logos/ronis_shrestha/img-6599jpg-1613380776.JPG', NULL, 3, 308, 40, 'Lagankhel', '<p>abc</p>', 1, NULL, 1, NULL),
(8, 'Sarose 2', 'developersarose@gmail.com', '2021-02-15 09:05:04', '$2y$10$tspV6TdmkrKf82tQNBKgfuchlb2FregPBrnCmhkX63Pmezd.2KJnK', NULL, '2021-02-15 09:04:06', '2021-02-15 09:20:28', NULL, '98610152054', NULL, 0, NULL, 1, NULL, NULL, NULL, 'images/logos/sarose_2/tote1jpeg-1613380828.jpeg', NULL, 1, 112, 69, 'ok', NULL, 1, NULL, 1, NULL),
(9, '9800000000', 'noreply.candidnepal@gmail.com', '2021-02-15 11:31:22', '$2y$10$awy9VNVJtvb5aGt3922SJu.bOwIpljUpTXpYF4nyHmwqT7gfmy4jO', NULL, '2021-02-15 11:29:28', '2021-02-23 21:47:31', NULL, '9800000000', 'Baneshwor', 0, NULL, 1, 'Company', NULL, NULL, 'images/logos/9800000000/bizip8ie70cyszfqktovjtvde852hjd5eoqnvrg5jpeg-1613388832.jpeg', NULL, 3, 308, 34, 'alko', NULL, 1, NULL, 1, 1),
(10, 'Sajan Tamrakar', 'trivenisolution@gmail.com', '2021-02-15 13:41:32', '$2y$10$RJ2jGFFRqNZGv9t3GeHSKusHZHs7EWDM1UU0GYVPylH4HCGgX3iAG', NULL, '2021-02-15 13:40:26', '2021-02-28 01:25:17', NULL, '9841388640', 'Pulchowk', 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 3, 308, 50, 'MEGA COLLEGE', NULL, 1, 1, 2, NULL),
(11, 'Saroj Manandhar', 'saroj@candidnepal.com', '2021-03-02 12:08:45', '$2y$10$1nC6BGhbE3i.fd4TZk1x8eaNPYTev43VuolrclCTGC8SCGhTrfxgm', NULL, '2021-03-02 12:03:58', '2021-03-04 04:43:38', NULL, '9808195444', 'bhaktapur', 0, 0, 1, '333', NULL, '333', 'images/logos/saroj_manandhar/balajijpeg-1614687920.jpeg', 1, 3, 308, 47, 'bhaktapur, 25 mn', NULL, 1, 1, 2, 1),
(12, 'Rakshak Bajracharya A', 'rakshak@candidnepal.com', NULL, '$2y$10$UQh9QNGCyGxhxRfqCEQzqOWV7HuPmXosk0FsPjNIKclw3a0dF1Kha', NULL, '2021-03-02 12:04:14', '2021-03-05 07:30:48', NULL, '9808553181', 'Shankhamul', 0, 0, 1, NULL, NULL, NULL, 'images/logos/rakshak_bajracharya_a/shoulder3jpeg-1614771407.jpeg', 2, 3, 308, 37, 'Alko', NULL, 1, 1, 1, 1),
(13, 'Poppy Petals', 'tamrakars01@gmail.com', '2021-03-04 06:54:57', '$2y$10$aA2yIFAHcz8hbu95or5SBek4..v3KcDhWD5JcPdTyaZ3r6AqHYwLC', NULL, '2021-03-04 06:53:53', '2021-03-08 12:34:03', NULL, '9801363515', 'Lagankhel', 0, 0, 1, NULL, NULL, NULL, 'images/logos/sandeep_tamrakar/balajijpeg-1614921995.jpeg', 2, 3, 308, 40, 'Kumaripati', NULL, 1, 1, 1, 1),
(14, 'Nepastore', 'salesnepastore@gmail.com', '2021-03-09 05:22:10', '$2y$10$qcIAiXPaXK5u41Rrwc6tturck4BgvsiwZnuFDcPCWWYEOhJItiD.2', NULL, '2021-03-09 05:21:41', '2021-03-09 05:25:15', NULL, '9801363511', 'Prayagpokhari, Lagankhel', 0, 0, 1, NULL, NULL, 'nepastore.com', NULL, NULL, 3, 308, 40, 'Prayagpokhari, Lagankhel', NULL, 1, NULL, 1, 1),
(17, 'Saroj Manandhar', 'sarosessmdr@gmail.com', NULL, '$2y$10$gL5df08X4a0NslDm4Djg7um326VmLGWmXuglPUEsupbE7LcUumC4e', NULL, '2021-04-07 04:09:20', '2021-04-07 04:10:50', NULL, '9861015205', 'Bhaktapur', 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `rel_post_category`
--
ALTER TABLE `rel_post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_groups`
--
ALTER TABLE `tbl_admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_menus`
--
ALTER TABLE `tbl_admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_group_id_foreign` (`user_group_id`),
  ADD KEY `user_roles_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_certificates`
--
ALTER TABLE `tbl_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`province_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback_reply`
--
ALTER TABLE `tbl_feedback_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login_fail_logs`
--
ALTER TABLE `tbl_login_fail_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_items`
--
ALTER TABLE `tbl_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `tbl_newsletter_list`
--
ALTER TABLE `tbl_newsletter_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_scholarship_offers`
--
ALTER TABLE `tbl_scholarship_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_setting`
--
ALTER TABLE `tbl_site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff_category`
--
ALTER TABLE `tbl_staff_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_statistic`
--
ALTER TABLE `tbl_statistic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_study_abroad`
--
ALTER TABLE `tbl_study_abroad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teams`
--
ALTER TABLE `tbl_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_universities`
--
ALTER TABLE `tbl_universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_login_logs`
--
ALTER TABLE `tbl_user_login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_value`
--
ALTER TABLE `tbl_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_why_choose`
--
ALTER TABLE `tbl_why_choose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_workings`
--
ALTER TABLE `tbl_workings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobileno_unique` (`mobileno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rel_post_category`
--
ALTER TABLE `rel_post_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_admin_groups`
--
ALTER TABLE `tbl_admin_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin_menus`
--
ALTER TABLE `tbl_admin_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_certificates`
--
ALTER TABLE `tbl_certificates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=710;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_features`
--
ALTER TABLE `tbl_features`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_feedback_reply`
--
ALTER TABLE `tbl_feedback_reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login_fail_logs`
--
ALTER TABLE `tbl_login_fail_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu_items`
--
ALTER TABLE `tbl_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_newsletter_list`
--
ALTER TABLE `tbl_newsletter_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_scholarship_offers`
--
ALTER TABLE `tbl_scholarship_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_site_setting`
--
ALTER TABLE `tbl_site_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_staff_category`
--
ALTER TABLE `tbl_staff_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_statistic`
--
ALTER TABLE `tbl_statistic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_study_abroad`
--
ALTER TABLE `tbl_study_abroad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_teams`
--
ALTER TABLE `tbl_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_universities`
--
ALTER TABLE `tbl_universities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_login_logs`
--
ALTER TABLE `tbl_user_login_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_value`
--
ALTER TABLE `tbl_value`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_why_choose`
--
ALTER TABLE `tbl_why_choose`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_workings`
--
ALTER TABLE `tbl_workings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
