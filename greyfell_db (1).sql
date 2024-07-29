-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 01:47 AM
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
-- Database: `greyfell_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `total_cost` double NOT NULL,
  `duration` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `free_session` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `client_id`, `membership_id`, `total_cost`, `duration`, `start_date`, `end_date`, `free_session`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 100, 1603.92, '6', '2024-07-28 23:43:37', '2025-01-28', 3, 'Active', '2024-07-28 15:43:37', '2024-07-28 15:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `account_programs`
--

CREATE TABLE `account_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_programs`
--

INSERT INTO `account_programs` (`id`, `account_id`, `program_id`, `start_date`, `end_date`, `duration`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 68, '2024-07-22', '2024-08-07', '6 days', 420, 'active', NULL, NULL),
(2, 1, 80, '2024-07-06', '2024-07-29', '93 days', 940, 'active', NULL, NULL),
(3, 1, 94, '2024-07-14', '2024-07-31', '100 days', 508, 'active', NULL, NULL),
(4, 1, 95, '2024-07-03', '2024-08-26', '29 days', 411, 'inactive', NULL, NULL),
(5, 1, 98, '2024-07-01', '2024-08-19', '50 days', 456, 'inactive', NULL, NULL),
(6, 1, 5, '2024-07-09', '2024-08-18', '4 days', 466, 'inactive', NULL, NULL),
(7, 1, 20, '2024-07-18', '2024-08-13', '26 days', 686, 'inactive', NULL, NULL),
(8, 1, 57, '2024-07-10', '2024-08-21', '87 days', 182, 'inactive', NULL, NULL),
(9, 1, 13, '2024-07-10', '2024-08-07', '21 days', 175, 'inactive', NULL, NULL),
(10, 1, 39, '2024-07-02', '2024-08-04', '85 days', 522, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `addressline` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT 'images/default-person.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `fname`, `lname`, `addressline`, `phone`, `zipcode`, `age`, `gender`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'User', '0890', '789', '789', 789, '798', 'images/zayn.webp', '2024-07-28 14:52:01', '2024-07-28 14:52:01'),
(2, 2, 'bjk', 'bkj', 'bkj', 'bjk', 'bkj', 687, '678', 'images/11.jpg', '2024-07-28 15:43:30', '2024-07-28 15:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `addressline` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT 'images/default-person.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`id`, `fname`, `lname`, `addressline`, `phone`, `zipcode`, `age`, `gender`, `image_path`, `created_at`, `updated_at`) VALUES
(3, 'Laura', 'Schrader', '789 Oak St, Seattle, WA 98101', '555-2702', '42664', 49, 'Female', 'images/man2.jpg', '2024-07-13 14:59:08', '2024-07-13 14:59:08'),
(4, 'Jimmy', 'Pinkman', '789 Oak St, Seattle, WA 98101', '555-1892', '70695', 35, 'Male', 'images/man3.jpg', '2024-06-30 14:59:08', '2024-06-30 14:59:08'),
(5, 'Ava', 'Wilson', '2000 Avenue of the Stars, Los Angeles, CA 90067', '555-9593', '81564', 42, 'Female', 'images/man4.jpg', '2024-06-29 14:59:08', '2024-06-29 14:59:08'),
(6, 'Charlotte', 'Moore', '789 Oak St, Seattle, WA 98101', '555-8811', '69096', 65, 'Female', 'images/man5.jpg', '2024-07-21 14:59:08', '2024-07-21 14:59:08'),
(7, 'Mia', 'White', '456 Market St, San Francisco, CA 94105', '555-8497', '59592', 39, 'Female', 'images/man6.jpg', '2024-07-11 14:59:08', '2024-07-11 14:59:08'),
(8, 'Gus', 'White', '1000 5th Avenue, New York, NY 10028', '555-9971', '61539', 37, 'Male', 'images/man7.jpg', '2024-07-06 14:59:08', '2024-07-06 14:59:08'),
(9, 'Paul', 'Goodman', '350 Fifth Avenue, New York, NY 10118', '555-1824', '86186', 45, 'Female', 'images/man8.jpg', '2024-07-13 14:59:08', '2024-07-13 14:59:08'),
(10, 'Skyler', 'Moore', '101 Pine St, San Diego, CA 92101', '555-6427', '81662', 65, 'Female', 'images/man9.jpg', '2024-07-15 14:59:08', '2024-07-15 14:59:08'),
(11, 'Sophia', 'Fring', '789 Oak St, Seattle, WA 98101', '555-2237', '65722', 32, 'Male', 'images/man10.jpg', '2024-07-17 14:59:08', '2024-07-17 14:59:08'),
(12, 'Chuck', 'McGill', '2000 Avenue of the Stars, Los Angeles, CA 90067', '555-8363', '39753', 63, 'Male', 'images/man11.jpg', '2024-07-10 14:59:08', '2024-07-10 14:59:08'),
(13, 'Chuck', 'Smith', '350 Fifth Avenue, New York, NY 10118', '555-2369', '96768', 34, 'Female', 'images/man12.jpg', '2024-07-16 14:59:08', '2024-07-16 14:59:08'),
(14, 'Ethan', 'Jones', '1601 Willow Road, Menlo Park, CA 94025', '555-6207', '85749', 64, 'Male', 'images/man13.jpg', '2024-07-23 14:59:08', '2024-07-23 14:59:08'),
(15, 'Skyler', 'Jackson', '202 Maple St, Austin, TX 73301', '555-9171', '16493', 46, 'Male', 'images/man14.jpg', '2024-07-15 14:59:08', '2024-07-15 14:59:08'),
(16, 'Paul', 'Schrader', '456 Market St, San Francisco, CA 94105', '555-2717', '83146', 52, 'Female', 'images/man15.jpg', '2024-07-13 14:59:08', '2024-07-13 14:59:08'),
(17, 'Ryan', 'White', '1601 Willow Road, Menlo Park, CA 94025', '555-2379', '83408', 25, 'Male', 'images/man16.jpg', '2024-07-01 14:59:08', '2024-07-01 14:59:08'),
(18, 'Isabella', 'Fring', '2000 Avenue of the Stars, Los Angeles, CA 90067', '555-5444', '12925', 64, 'Male', 'images/man17.jpg', '2024-07-15 14:59:08', '2024-07-15 14:59:08'),
(19, 'Hank', 'Ehrmantraut', '2000 Avenue of the Stars, Los Angeles, CA 90067', '555-3428', '61503', 42, 'Male', 'images/man18.jpg', '2024-07-04 14:59:08', '2024-07-04 14:59:08'),
(20, 'Skyler', 'Fring', '123 Main St, Boston, MA 02110', '555-4742', '35987', 60, 'Male', 'images/man19.jpg', '2024-07-01 14:59:08', '2024-07-01 14:59:08'),
(21, 'Ethan', 'Taylor', '12 Wall Street, New York, NY 10005', '555-6747', '57177', 35, 'Female', 'images/man20.jpg', '2024-07-24 14:59:08', '2024-07-24 14:59:08'),
(22, 'Laura', 'McGill', '12 Wall Street, New York, NY 10005', '555-2258', '77051', 37, 'Female', 'images/man21.jpg', '2024-07-15 14:59:08', '2024-07-15 14:59:08'),
(23, 'Olivia', 'McGill', '350 Fifth Avenue, New York, NY 10118', '555-4391', '66939', 33, 'Female', 'images/man22.jpg', '2024-07-24 14:59:08', '2024-07-24 14:59:08'),
(24, 'Harper', 'Thomas', '123 Main St, Boston, MA 02110', '555-2354', '89306', 26, 'Male', 'images/man23.jpg', '2024-07-26 14:59:08', '2024-07-26 14:59:08'),
(25, 'Olivia', 'Jackson', '1601 Willow Road, Menlo Park, CA 94025', '555-9633', '58266', 30, 'Male', 'images/man24.jpg', '2024-06-30 14:59:08', '2024-06-30 14:59:08'),
(26, 'Anna', 'Thomas', '789 Oak St, Seattle, WA 98101', '555-5024', '51530', 46, 'Male', 'images/man25.jpg', '2024-07-25 14:59:08', '2024-07-25 14:59:08'),
(27, 'Isabella', 'Ehrmantraut', '101 Pine St, San Diego, CA 92101', '555-7651', '21667', 40, 'Male', 'images/man26.jpg', '2024-07-24 14:59:08', '2024-07-24 14:59:08'),
(28, 'Ava', 'Moore', '101 Pine St, San Diego, CA 92101', '555-3234', '54255', 64, 'Female', 'images/man27.jpg', '2024-07-09 14:59:08', '2024-07-09 14:59:08'),
(29, 'Liam', 'Jackson', '1 Infinite Loop, Cupertino, CA 95014', '555-1849', '25673', 48, 'Female', 'images/man28.jpg', '2024-06-30 14:59:08', '2024-06-30 14:59:08'),
(30, 'Isabella', 'Jackson', '1601 Willow Road, Menlo Park, CA 94025', '555-8949', '41800', 31, 'Female', 'images/man29.jpg', '2024-07-21 14:59:08', '2024-07-21 14:59:08'),
(31, 'Saul', 'Moore', '2000 Avenue of the Stars, Los Angeles, CA 90067', '555-2993', '45610', 41, 'Male', 'images/man30.jpg', '2024-07-12 14:59:08', '2024-07-12 14:59:08'),
(32, 'Saul', 'McGill', '456 Elm St, Chicago, IL 60614', '555-6506', '46563', 49, 'Female', 'images/man31.jpg', '2024-07-26 14:59:08', '2024-07-26 14:59:08'),
(33, 'Amelia', 'White', '789 Oak St, Seattle, WA 98101', '555-3735', '28866', 44, 'Female', 'images/man32.jpg', '2024-07-07 14:59:08', '2024-07-07 14:59:08'),
(34, 'Ava', 'Williams', '123 Main St, Boston, MA 02110', '555-1460', '64850', 48, 'Female', 'images/man33.jpg', '2024-07-23 14:59:08', '2024-07-23 14:59:08'),
(35, 'Gus', 'Moore', '1601 Willow Road, Menlo Park, CA 94025', '555-5764', '15895', 60, 'Female', 'images/man34.jpg', '2024-07-26 14:59:08', '2024-07-26 14:59:08'),
(36, 'Paul', 'Jackson', '1601 Willow Road, Menlo Park, CA 94025', '555-5423', '33696', 40, 'Male', 'images/man35.jpg', '2024-07-23 14:59:08', '2024-07-23 14:59:08'),
(37, 'Olivia', 'Brown', '789 Oak St, Seattle, WA 98101', '555-1852', '68479', 44, 'Female', 'images/man36.jpg', '2024-07-20 14:59:08', '2024-07-20 14:59:08'),
(38, 'Kim', 'Davis', '123 Main St, Boston, MA 02110', '555-4260', '15273', 41, 'Male', 'images/man37.jpg', '2024-07-06 14:59:08', '2024-07-06 14:59:08'),
(39, 'Amelia', 'Taylor', '2 Microsoft Way, Redmond, WA 98052', '555-8897', '13061', 58, 'Male', 'images/man38.jpg', '2024-07-19 14:59:08', '2024-07-19 14:59:08'),
(40, 'Ryan', 'Martin', '123 Main St, Boston, MA 02110', '555-1945', '73892', 42, 'Male', 'images/man39.jpg', '2024-07-17 14:59:08', '2024-07-17 14:59:08'),
(41, 'Jimmy', 'Thomas', '12 Wall Street, New York, NY 10005', '555-1196', '55705', 51, 'Female', 'images/man40.jpg', '2024-07-10 14:59:08', '2024-07-10 14:59:08'),
(42, 'Hank', 'Wilson', '29 W 35th St, New York, NY 10001', '555-6331', '38302', 34, 'Female', 'images/man41.jpg', '2024-07-12 14:59:08', '2024-07-12 14:59:08'),
(43, 'Ryan', 'Thomas', '202 Maple St, Austin, TX 73301', '555-9120', '46787', 59, 'Male', 'images/man42.jpg', '2024-07-01 14:59:08', '2024-07-01 14:59:08'),
(44, 'Charlotte', 'Jones', '1600 Amphitheatre Parkway, Mountain View, CA 94043', '555-6231', '88973', 54, 'Female', 'images/man43.jpg', '2024-07-24 14:59:08', '2024-07-24 14:59:08'),
(45, 'Amelia', 'Fring', '12 Wall Street, New York, NY 10005', '555-1418', '18080', 30, 'Female', 'images/man44.jpg', '2024-07-17 14:59:08', '2024-07-17 14:59:08'),
(46, 'Hank', 'Pinkman', '1600 Amphitheatre Parkway, Mountain View, CA 94043', '555-8658', '59126', 65, 'Male', 'images/man45.jpg', '2024-07-25 14:59:08', '2024-07-25 14:59:08'),
(47, 'Liam', 'Jones', '2 Microsoft Way, Redmond, WA 98052', '555-7079', '46215', 60, 'Male', 'images/man46.jpg', '2024-07-26 14:59:08', '2024-07-26 14:59:08'),
(48, 'Kim', 'Davis', '789 Oak St, Seattle, WA 98101', '555-8021', '83067', 34, 'Female', 'images/man47.jpg', '2024-07-03 14:59:08', '2024-07-03 14:59:08'),
(49, 'Walter', 'Jackson', '101 Pine St, San Diego, CA 92101', '555-3385', '50087', 64, 'Female', 'images/man48.jpg', '2024-07-01 14:59:08', '2024-07-01 14:59:08'),
(50, 'Anna', 'Thomas', '2 Microsoft Way, Redmond, WA 98052', '555-6783', '40242', 58, 'Female', 'images/man49.jpg', '2024-07-07 14:59:08', '2024-07-07 14:59:08'),
(51, 'Isabella', 'Williams', '101 Pine St, San Diego, CA 92101', '555-4837', '40957', 58, 'Female', 'images/man50.jpg', '2024-07-07 14:59:08', '2024-07-07 14:59:08');

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
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `allow_visitors` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT 'images/default-membership.jpg',
  `cost` double NOT NULL,
  `perks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `title`, `description`, `duration`, `allow_visitors`, `image`, `cost`, `perks`, `created_at`, `updated_at`) VALUES
(2, 'Daily Pass', 'Distinctio consequatur quaerat est aliquid et eligendi aliquam vel consequatur consequatur ullam placeat.', '3 months', 0, 'images/default-membership.jpg', 119.66, 'Priority Booking', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(3, 'Couples Plan', 'Aperiam dolor voluptas enim qui non ad sed debitis cupiditate ea nam.', '6 months', 0, 'images/default-membership.jpg', 446.96, 'Discounted Spa Services, Free Personal Training, Free Group Classes', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(4, 'Student Plan', 'Exercitationem quasi exercitationem id quo qui voluptate deserunt.', '6 months', 1, 'images/default-membership.jpg', 70.34, 'Extended Gym Hours, Priority Booking, Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(5, 'Daily Pass', 'Porro dolore repudiandae consequatur nulla cum qui ea at.', '12 months', 1, 'images/default-membership.jpg', 42.15, 'Free Guest Pass, Discounted Spa Services, Extended Gym Hours, Complimentary Drinks, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(6, 'Family Plan', 'Et consequatur nesciunt impedit magnam commodi odio et et odio nulla.', '1 month', 0, 'images/default-membership.jpg', 257.91, 'Extended Gym Hours, Free Personal Training, Free Group Classes, Complimentary Drinks, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(7, 'Weekend Plan', 'Soluta provident quo aut alias repudiandae repellendus.', '12 months', 1, 'images/default-membership.jpg', 188.27, 'Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(8, 'Daily Pass', 'Illo asperiores reiciendis fugit aliquam delectus doloribus molestias qui.', '6 months', 0, 'images/default-membership.jpg', 389.13, 'Priority Booking, Access to Pool, Free Towel Service, Free Fitness Assessment, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(9, 'Senior Plan', 'Quis suscipit quisquam perspiciatis culpa qui est voluptatem quos ratione.', '1 month', 0, 'images/default-membership.jpg', 447.64, 'Discounted Spa Services, Free Personal Training, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(10, 'Couples Plan', 'Non iusto et omnis sit velit ab natus deserunt ea ea.', '1 month', 0, 'images/default-membership.jpg', 433.78, 'Free Towel Service, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(11, 'Senior Plan', 'Fugiat totam officiis dolor impedit blanditiis modi aut officia necessitatibus placeat incidunt.', '6 months', 1, 'images/default-membership.jpg', 178.02, 'Access to Pool, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(12, 'Basic Plan', 'Optio impedit aut et itaque nesciunt sapiente expedita reprehenderit adipisci quis consequatur quibusdam ut.', '1 month', 0, 'images/default-membership.jpg', 116.93, 'Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(13, 'Basic Plan', 'Velit vel qui voluptas eum vel delectus quam.', '12 months', 1, 'images/default-membership.jpg', 420.57, 'Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(14, 'Premium Plan', 'Laudantium quia sequi delectus saepe ipsam necessitatibus saepe et et pariatur.', '3 months', 1, 'images/default-membership.jpg', 324.91, 'Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(15, 'Family Plan', 'Sit ipsa facilis quia dolores provident pariatur tempora sit non.', '1 month', 1, 'images/default-membership.jpg', 392, 'Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(16, 'Student Plan', 'Velit est modi consequuntur et quia saepe perferendis nobis.', '12 months', 1, 'images/default-membership.jpg', 384.8, 'Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(17, 'Couples Plan', 'Repudiandae accusantium et quam a et laudantium quia at magni distinctio.', '1 month', 1, 'images/default-membership.jpg', 438.71, 'Free Guest Pass, Free Fitness Assessment, Discounted Spa Services, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(18, 'Standard Plan', 'Ut hic sint debitis fugit in et vero quos occaecati architecto deleniti.', '6 months', 0, 'images/default-membership.jpg', 323.18, 'Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(19, 'Corporate Plan', 'Quis rerum ducimus ea mollitia aut dignissimos quo voluptates delectus voluptas voluptas quae iste.', '3 months', 0, 'images/default-membership.jpg', 393.78, 'Access to Pool, Priority Booking, Free Fitness Assessment, Free Group Classes, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(20, 'Family Plan', 'Amet sint nam nihil mollitia est vero.', '3 months', 1, 'images/default-membership.jpg', 125.76, 'Access to Pool, Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(21, 'Daily Pass', 'Odit aut facilis qui quam recusandae veniam voluptas rerum quis explicabo a.', '6 months', 1, 'images/default-membership.jpg', 30.66, 'Free Guest Pass, Free Towel Service, Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(22, 'Daily Pass', 'Iure ipsam non dolor deleniti dolore ullam quis aliquam id.', '12 months', 1, 'images/default-membership.jpg', 65.43, 'Free Guest Pass, Access to Pool, Complimentary Drinks, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(23, 'Basic Plan', 'Porro fuga velit sapiente et reiciendis praesentium deserunt quam.', '6 months', 1, 'images/default-membership.jpg', 374.7, 'Discounted Spa Services, Free Personal Training, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(24, 'Corporate Plan', 'Iste qui tempora in nihil natus doloribus natus magni totam nam ab tempora voluptas.', '3 months', 1, 'images/default-membership.jpg', 136.39, 'Discounted Spa Services, Free Towel Service, Complimentary Drinks, Priority Booking, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(25, 'Weekend Plan', 'In quos aspernatur molestiae at impedit et in nam quisquam maxime nostrum maiores mollitia.', '1 month', 1, 'images/default-membership.jpg', 131.02, 'Free Fitness Assessment, Free Towel Service, Priority Booking, Discounted Spa Services, Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(26, 'Corporate Plan', 'Qui eum optio voluptatibus enim voluptatem praesentium dolorem eos et voluptas ut.', '3 months', 1, 'images/default-membership.jpg', 161.58, 'Complimentary Drinks, Free Fitness Assessment, Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(27, 'Basic Plan', 'Vero assumenda sequi eveniet libero qui quasi consequatur cupiditate necessitatibus aperiam ipsa nihil rerum.', '12 months', 1, 'images/default-membership.jpg', 197.79, 'Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(28, 'Basic Plan', 'Magnam aut eum perferendis ab autem laudantium.', '3 months', 0, 'images/default-membership.jpg', 124.77, 'Access to Pool, Extended Gym Hours, Free Group Classes', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(29, 'Basic Plan', 'Omnis exercitationem sit et laboriosam corporis et.', '6 months', 1, 'images/default-membership.jpg', 53.81, 'Complimentary Drinks, Free Personal Training, Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(30, 'Basic Plan', 'Aut eum amet provident magnam quod perspiciatis perferendis.', '6 months', 1, 'images/default-membership.jpg', 138.53, 'Access to Pool, Free Guest Pass, Complimentary Drinks, Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(31, 'Standard Plan', 'Libero tempore reprehenderit neque voluptatem a nulla.', '12 months', 1, 'images/default-membership.jpg', 23.88, 'Free Group Classes, Free Fitness Assessment, Complimentary Drinks, Free Personal Training, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(32, 'Corporate Plan', 'Distinctio perspiciatis beatae eos eveniet et iste voluptas aut ut et.', '1 month', 0, 'images/default-membership.jpg', 408.53, 'Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(33, 'Premium Plan', 'Magnam id repellendus dolorem qui quae laborum ratione numquam et facere.', '1 month', 1, 'images/default-membership.jpg', 258.25, 'Access to Pool, Free Fitness Assessment, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(34, 'Student Plan', 'Distinctio eum minima assumenda nesciunt quis ducimus non sit.', '3 months', 1, 'images/default-membership.jpg', 367.62, 'Priority Booking, Discounted Spa Services, Free Fitness Assessment, Extended Gym Hours, Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(35, 'Corporate Plan', 'Ab est mollitia voluptatem praesentium ex praesentium rerum qui numquam excepturi.', '12 months', 1, 'images/default-membership.jpg', 54.33, 'Free Guest Pass, Access to Pool, Free Towel Service, Free Group Classes, Priority Booking', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(36, 'Daily Pass', 'Voluptatem sunt eius sint aut libero praesentium dignissimos fugiat quia consectetur ut aut et.', '12 months', 0, 'images/default-membership.jpg', 154.64, 'Priority Booking, Free Group Classes', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(37, 'Weekend Plan', 'Aut voluptas provident voluptates quae nobis alias soluta eius.', '6 months', 0, 'images/default-membership.jpg', 417.57, 'Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(38, 'Weekend Plan', 'Nostrum voluptatum totam voluptatum fuga consectetur tempora in voluptas hic quas nesciunt sint illum.', '12 months', 1, 'images/default-membership.jpg', 115.39, 'Access to Pool, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(39, 'Weekend Plan', 'Ut voluptates enim nihil laboriosam aliquid voluptas consectetur.', '6 months', 0, 'images/default-membership.jpg', 73.32, 'Free Personal Training, Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(40, 'Premium Plan', 'Autem qui dicta repellendus ut impedit dolor recusandae velit velit dolores.', '6 months', 0, 'images/default-membership.jpg', 135.05, 'Free Personal Training, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(41, 'Corporate Plan', 'Saepe sed dignissimos quia doloremque a necessitatibus sint eveniet sunt ullam et.', '6 months', 0, 'images/default-membership.jpg', 274.89, 'Free Fitness Assessment, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(42, 'Family Plan', 'Qui modi fugiat libero cumque fugit debitis accusamus neque.', '3 months', 1, 'images/default-membership.jpg', 77.32, 'Free Guest Pass, Free Towel Service, Access to Pool, Priority Booking, Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(43, 'Weekend Plan', 'Consequatur sint voluptas optio et hic vero ut sequi sapiente ut ullam.', '1 month', 0, 'images/default-membership.jpg', 173.83, 'Access to Pool, Free Towel Service, Free Personal Training, Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(44, 'Student Plan', 'Minima perferendis earum quaerat beatae totam nobis quod sint.', '3 months', 0, 'images/default-membership.jpg', 82.8, 'Free Group Classes, Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(45, 'Daily Pass', 'Est eligendi ut iure ut ut libero.', '6 months', 0, 'images/default-membership.jpg', 208.18, 'Priority Booking, Discounted Spa Services, Extended Gym Hours, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(46, 'Standard Plan', 'Voluptas blanditiis quidem explicabo nesciunt et magnam rem omnis et quo natus nihil facere.', '12 months', 1, 'images/default-membership.jpg', 418.98, 'Free Group Classes, Discounted Spa Services, Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(47, 'Corporate Plan', 'Et architecto reiciendis repudiandae vitae magnam exercitationem velit et cupiditate.', '3 months', 1, 'images/default-membership.jpg', 68.36, 'Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(48, 'Corporate Plan', 'Consectetur accusamus et sint quaerat repellendus velit explicabo iusto numquam quis quo.', '12 months', 1, 'images/default-membership.jpg', 466.19, 'Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(49, 'Premium Plan', 'Molestiae voluptate totam consectetur ut ullam sed aut.', '6 months', 0, 'images/default-membership.jpg', 51.72, 'Free Fitness Assessment, Extended Gym Hours, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(50, 'Corporate Plan', 'Vel rerum ut aut hic quisquam quasi ex temporibus quis dolor voluptatem.', '3 months', 0, 'images/default-membership.jpg', 166.45, 'Free Personal Training, Free Towel Service, Free Group Classes, Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(51, 'Corporate Plan', 'Autem qui veritatis molestiae similique architecto placeat reprehenderit blanditiis aperiam voluptatem quas eligendi.', '6 months', 0, 'images/default-membership.jpg', 369.43, 'Discounted Spa Services, Free Group Classes, Extended Gym Hours, Free Guest Pass, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(52, 'Corporate Plan', 'Et tempore voluptatem libero ducimus non pariatur officiis quidem eum fugit est sint.', '12 months', 0, 'images/default-membership.jpg', 426.57, 'Discounted Spa Services, Extended Gym Hours, Priority Booking, Free Fitness Assessment, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(53, 'Weekend Plan', 'Molestiae quibusdam in quae est ut nihil tempora necessitatibus.', '12 months', 1, 'images/default-membership.jpg', 430.24, 'Free Towel Service, Complimentary Drinks, Free Guest Pass, Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(54, 'Premium Plan', 'In et error nulla quo rerum iure.', '6 months', 1, 'images/default-membership.jpg', 36.92, 'Free Guest Pass, Complimentary Drinks, Free Personal Training, Access to Pool, Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(55, 'Student Plan', 'Velit accusamus placeat officiis id velit optio.', '6 months', 0, 'images/default-membership.jpg', 136.94, 'Access to Pool, Free Fitness Assessment, Free Personal Training, Free Group Classes', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(56, 'Corporate Plan', 'Qui omnis vel quasi et cumque qui animi repellendus accusantium et pariatur enim.', '3 months', 1, 'images/default-membership.jpg', 334.01, 'Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(57, 'Basic Plan', 'Quod adipisci cum qui corporis adipisci saepe eum voluptatem magnam.', '12 months', 0, 'images/default-membership.jpg', 444.32, 'Free Towel Service, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(58, 'Basic Plan', 'In et in quisquam eius minima consequatur et quidem maiores ea nesciunt.', '1 month', 1, 'images/default-membership.jpg', 221.14, 'Free Fitness Assessment, Free Group Classes, Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(59, 'Senior Plan', 'Ut et cupiditate quidem ipsam ea magnam quia est officia esse sapiente.', '1 month', 0, 'images/default-membership.jpg', 64.76, 'Access to Pool, Extended Gym Hours, Priority Booking, Free Towel Service, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(60, 'Couples Plan', 'Praesentium repudiandae omnis aut harum placeat deserunt.', '1 month', 1, 'images/default-membership.jpg', 454.03, 'Free Personal Training, Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(61, 'Senior Plan', 'Asperiores optio cumque enim corrupti deserunt odio est et.', '3 months', 1, 'images/default-membership.jpg', 281.67, 'Free Group Classes', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(62, 'Family Plan', 'Impedit quasi possimus porro delectus quo vero eos doloremque veritatis deleniti deleniti.', '3 months', 1, 'images/default-membership.jpg', 25.87, 'Priority Booking, Free Fitness Assessment, Free Towel Service, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(63, 'Family Plan', 'Repudiandae quia dolorum est nemo ut ipsa quia sunt incidunt quis accusantium.', '6 months', 0, 'images/default-membership.jpg', 418.23, 'Complimentary Drinks, Free Group Classes, Free Personal Training, Access to Pool, Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(64, 'Weekend Plan', 'Odit perferendis distinctio beatae sit ut velit accusantium.', '12 months', 0, 'images/default-membership.jpg', 263.63, 'Access to Pool, Complimentary Drinks, Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(65, 'Standard Plan', 'Officiis blanditiis voluptatem reiciendis praesentium illo repellendus facere officiis ducimus cum architecto aut culpa.', '6 months', 0, 'images/default-membership.jpg', 178.65, 'Free Towel Service, Extended Gym Hours, Complimentary Drinks, Free Guest Pass, Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(66, 'Couples Plan', 'Quas distinctio aut dolor porro distinctio commodi error.', '12 months', 0, 'images/default-membership.jpg', 246.39, 'Discounted Spa Services, Priority Booking, Extended Gym Hours, Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(67, 'Senior Plan', 'Iusto corrupti praesentium ut distinctio minima esse porro architecto aut dolorem rerum sit illum.', '6 months', 0, 'images/default-membership.jpg', 159.63, 'Free Group Classes, Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(68, 'Daily Pass', 'Officia impedit at aliquid et sed eum et quibusdam.', '3 months', 0, 'images/default-membership.jpg', 353.26, 'Discounted Spa Services, Free Group Classes', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(69, 'Daily Pass', 'Quidem dolorum est eos quisquam a corrupti iste minus itaque consequatur qui ut sit.', '12 months', 1, 'images/default-membership.jpg', 188.76, 'Access to Pool, Free Fitness Assessment, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(70, 'Weekend Plan', 'Aut debitis assumenda iure beatae culpa temporibus eum fuga accusamus voluptatem et et.', '6 months', 1, 'images/default-membership.jpg', 372.58, 'Priority Booking, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(71, 'Family Plan', 'Beatae nihil nemo ut doloribus dolore eos qui.', '6 months', 0, 'images/default-membership.jpg', 293.33, 'Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(72, 'Premium Plan', 'Minus quaerat natus sint delectus est quo provident.', '3 months', 0, 'images/default-membership.jpg', 492.12, 'Discounted Spa Services, Free Group Classes', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(73, 'Student Plan', 'Enim officiis molestiae expedita minus temporibus vel.', '3 months', 0, 'images/default-membership.jpg', 385.56, 'Priority Booking, Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(74, 'Student Plan', 'Et nulla velit deserunt dolor quis voluptas exercitationem et ad amet illum sit.', '3 months', 1, 'images/default-membership.jpg', 29.22, 'Priority Booking, Free Fitness Assessment, Free Group Classes, Free Guest Pass, Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(75, 'Daily Pass', 'Amet debitis omnis consequatur nihil pariatur ea ea nam sunt neque fuga.', '6 months', 1, 'images/default-membership.jpg', 440.47, 'Access to Pool, Complimentary Drinks, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(76, 'Student Plan', 'Fuga perspiciatis dicta at maiores qui non eius accusamus.', '6 months', 1, 'images/default-membership.jpg', 199.85, 'Free Guest Pass, Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(77, 'Couples Plan', 'Illo laborum qui itaque qui praesentium animi quis nobis aut.', '12 months', 1, 'images/default-membership.jpg', 266.42, 'Access to Pool, Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(78, 'Standard Plan', 'Eos unde aut saepe illo ipsa ex libero.', '12 months', 0, 'images/default-membership.jpg', 126.4, 'Free Personal Training, Access to Pool, Free Guest Pass, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(79, 'Family Plan', 'Vero aut omnis ab cupiditate quo placeat.', '3 months', 0, 'images/default-membership.jpg', 377.57, 'Free Fitness Assessment, Free Guest Pass, Free Towel Service, Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(80, 'Standard Plan', 'Odit corrupti cum sint quia dolorum quam nisi numquam voluptates ut.', '6 months', 1, 'images/default-membership.jpg', 385.67, 'Extended Gym Hours, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(81, 'Daily Pass', 'Illum et quod et magni et qui beatae sint architecto omnis.', '12 months', 1, 'images/default-membership.jpg', 95.13, 'Free Fitness Assessment, Discounted Spa Services, Free Towel Service, Priority Booking', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(82, 'Student Plan', 'Quo sed aut corporis maxime quo qui.', '3 months', 0, 'images/default-membership.jpg', 229.54, 'Extended Gym Hours, Free Fitness Assessment, Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(83, 'Couples Plan', 'Excepturi ipsum corrupti consequuntur doloribus fuga quisquam amet animi eum alias ut repellendus similique et.', '6 months', 1, 'images/default-membership.jpg', 95.29, 'Free Towel Service, Free Group Classes, Access to Pool, Priority Booking, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(84, 'Daily Pass', 'Et est nihil et iure quidem sapiente.', '1 month', 1, 'images/default-membership.jpg', 476.69, 'Access to Pool, Complimentary Drinks, Discounted Spa Services, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(85, 'Family Plan', 'Accusamus sed sit rem qui dolore consectetur at illo quia.', '3 months', 1, 'images/default-membership.jpg', 176.97, 'Free Personal Training, Free Guest Pass', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(86, 'Corporate Plan', 'Aliquam fugiat beatae et beatae explicabo corrupti consequatur animi debitis quas molestias et perspiciatis.', '1 month', 0, 'images/default-membership.jpg', 363.78, 'Free Personal Training, Free Towel Service, Extended Gym Hours, Priority Booking', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(87, 'Family Plan', 'Esse dolor occaecati tempore vero et facilis architecto voluptas impedit natus iusto.', '6 months', 1, 'images/default-membership.jpg', 110.24, 'Free Group Classes, Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(88, 'Senior Plan', 'Dolorem et velit nihil beatae sed omnis aut rerum qui consectetur similique ad quibusdam.', '3 months', 0, 'images/default-membership.jpg', 256.48, 'Free Fitness Assessment, Complimentary Drinks, Free Personal Training, Discounted Spa Services, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(89, 'Weekend Plan', 'Qui iusto illum sunt qui asperiores et quidem.', '6 months', 1, 'images/default-membership.jpg', 144.19, 'Free Fitness Assessment, Free Personal Training, Free Towel Service, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(90, 'Family Plan', 'Excepturi corrupti nostrum quia ratione tenetur id eligendi.', '6 months', 1, 'images/default-membership.jpg', 56.6, 'Complimentary Drinks, Access to Pool, Free Fitness Assessment, Free Guest Pass, Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(91, 'Weekend Plan', 'Ad nostrum occaecati deserunt quisquam voluptas eaque.', '12 months', 0, 'images/default-membership.jpg', 489.77, 'Free Towel Service, Free Fitness Assessment, Free Guest Pass, Complimentary Drinks, Free Group Classes', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(92, 'Premium Plan', 'Amet ut in dolore rem odio nesciunt vel.', '1 month', 1, 'images/default-membership.jpg', 499.47, 'Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(93, 'Student Plan', 'Temporibus reprehenderit placeat laudantium possimus voluptatem illum.', '3 months', 0, 'images/default-membership.jpg', 183.5, 'Complimentary Drinks, Extended Gym Hours, Free Group Classes, Free Personal Training', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(94, 'Corporate Plan', 'Sed voluptas commodi quis dolores voluptas nisi quia.', '12 months', 0, 'images/default-membership.jpg', 301.65, 'Discounted Spa Services, Free Guest Pass, Free Towel Service', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(95, 'Family Plan', 'Enim rerum fugiat et porro optio ipsa blanditiis maiores rerum commodi.', '6 months', 0, 'images/default-membership.jpg', 308.06, 'Complimentary Drinks, Priority Booking, Extended Gym Hours, Discounted Spa Services, Access to Pool', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(96, 'Daily Pass', 'Itaque error omnis earum harum rerum impedit eveniet pariatur.', '3 months', 0, 'images/default-membership.jpg', 198.23, 'Access to Pool, Free Group Classes, Free Towel Service, Free Personal Training, Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(97, 'Premium Plan', 'Aperiam odio id tempore aperiam consequatur eum doloremque corporis.', '12 months', 1, 'images/default-membership.jpg', 151.67, 'Free Group Classes, Free Guest Pass, Extended Gym Hours', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(98, 'Senior Plan', 'Voluptatem id enim praesentium eaque aut repellendus ducimus omnis libero quia corrupti fuga.', '3 months', 1, 'images/default-membership.jpg', 15.72, 'Complimentary Drinks, Discounted Spa Services', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(99, 'Senior Plan', 'Quas distinctio aspernatur consequuntur eligendi itaque possimus minus quae quo voluptatum voluptatem omnis.', '3 months', 0, 'images/default-membership.jpg', 365.72, 'Priority Booking, Free Guest Pass, Free Group Classes, Access to Pool, Complimentary Drinks', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(100, 'Senior Plan', 'Quibusdam voluptatem necessitatibus neque fugiat nobis reprehenderit consequatur fugit qui.', '3 months', 0, 'images/default-membership.jpg', 267.32, 'Free Group Classes, Free Fitness Assessment', '2024-07-28 14:59:08', '2024-07-28 14:59:08');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_06_12_071012_create_client_table', 1),
(7, '2024_06_16_094012_create_coach_table', 1),
(8, '2024_06_17_061746_create_program_table', 1),
(9, '2024_06_17_135332_create_membership_table', 1),
(10, '2024_07_03_040447_edit_users_table', 1),
(11, '2024_07_04_050923_create_account_table', 1),
(12, '2024_07_08_002547_create_account_programs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\User', 1, 'authToken', '71a6dd964d96133306929885776ab6b3afda6ef88feeb56032b453d1a7a5b024', '[\"*\"]', NULL, NULL, '2024-07-28 15:43:43', '2024-07-28 15:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'images/default-program.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `coach_id`, `title`, `description`, `duration`, `cost`, `difficulty`, `schedule`, `image`, `created_at`, `updated_at`) VALUES
(5, 5, 'Boxinggggg', 'Ex omnis fuga qui vero quia quae iusto pariatur voluptate vero ea.', '2 months', 260, 'Easy', 'wednesday, thursday, friday, saturday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 15:30:26'),
(6, 21, 'Functional Fitness', 'Illum sequi ab voluptatem possimus exercitationem quia aut minus hic.', '3 months', 471, 'Hard', 'Tuesday, Thursday, Saturday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(7, 9, 'Stretching', 'Fuga quis odio earum nihil eaque adipisci labore repudiandae.', '12 months', 224, 'Intermediate', 'Monday, Thursday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(8, 45, 'Zumba', 'Esse voluptas quia voluptatibus quis in et reiciendis consectetur corrupti.', '4 months', 320, 'Hard', 'Wednesday, Thursday, Sunday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(9, 7, 'Spin Classes', 'Qui et ea molestiae tempore sed animi voluptatum.', '4 months', 196, 'Easy', 'Tuesday, Thursday, Saturday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(10, 30, 'Functional Fitness', 'Porro esse dolorem ut tempora facilis magnam.', '11 months', 211, 'Intermediate', 'Wednesday, Thursday, Sunday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(11, 36, 'Strength Training', 'Magnam soluta ab dignissimos et dolorem tempora sit nemo tempora.', '11 months', 407, 'Hard', 'Tuesday, Friday, Sunday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(12, 36, 'Aerobics', 'Voluptas iusto ratione veritatis reprehenderit consectetur incidunt suscipit eum nihil vero ab iure delectus.', '5 months', 447, 'Hard', 'Tuesday, Thursday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(13, 14, 'Circuit Training', 'Qui incidunt neque vel soluta quam nihil.', '8 months', 409, 'Hard', 'Saturday, Sunday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(14, 14, 'Bootcamp', 'Voluptatibus quae debitis quia nihil eligendi quidem qui quod illo.', '10 months', 423, 'Intermediate', 'Monday, Tuesday, Thursday, Saturday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(15, 32, 'Bodybuilding', 'Sapiente quia doloribus cumque aliquam tempore quod quidem saepe hic qui quos.', '9 months', 266, 'Hard', 'Monday, Tuesday, Wednesday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(16, 36, 'Rowing', 'Quidem distinctio quia sint magnam et consequatur et labore in dolor ut consectetur.', '3 months', 63, 'Easy', 'Monday, Tuesday, Wednesday, Saturday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(17, 21, 'Swimming', 'Voluptas neque odit est earum doloremque quia illo optio.', '12 months', 320, 'Hard', 'Monday, Wednesday, Friday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(18, 41, 'Strength Training', 'Sunt porro veritatis praesentium suscipit at laborum hic unde et qui quo quia soluta unde.', '9 months', 127, 'Easy', 'Monday, Tuesday, Thursday, Saturday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(19, 32, 'Strength Training', 'Qui ut nemo adipisci ut placeat delectus omnis voluptas sunt commodi deserunt.', '4 months', 379, 'Easy', 'Tuesday, Friday, Sunday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(20, 16, 'Zumba', 'Ab assumenda consequatur minima vitae et accusantium et adipisci explicabo.', '8 months', 406, 'Hard', 'Wednesday, Thursday, Sunday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(21, 3, 'Stretching', 'Distinctio ipsam provident iure maiores quibusdam quo veritatis possimus enim pariatur.', '12 months', 329, 'Intermediate', 'Tuesday, Thursday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(22, 19, 'Bodybuilding', 'Itaque est rem corporis incidunt aut rem.', '9 months', 335, 'Hard', 'Saturday, Sunday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(24, 3, 'Resistance Band Training', 'Dolor reiciendis aliquam quos blanditiis beatae minima aut magnam voluptatem expedita at suscipit dolor.', '2 months', 186, 'Easy', 'Monday, Thursday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(25, 6, 'Rowing', 'Ipsum aspernatur commodi qui quis consequatur suscipit assumenda.', '7 months', 452, 'Intermediate', 'Wednesday, Friday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(26, 43, 'Boxing', 'Id porro accusamus adipisci explicabo omnis hic nihil non.', '8 months', 228, 'Easy', 'Tuesday, Friday, Sunday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(27, 38, 'Kettlebell Workouts', 'Omnis nobis sunt architecto rem non sed molestias dolores maiores.', '5 months', 314, 'Hard', 'Monday, Thursday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(28, 47, 'CrossFit', 'Ad earum recusandae ipsam suscipit architecto amet reprehenderit.', '1 month', 128, 'Hard', 'Wednesday, Friday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(29, 11, 'Zumba', 'Sit voluptatem facilis doloribus rerum sed consequatur minus voluptas qui.', '3 months', 255, 'Easy', 'Tuesday, Thursday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(30, 20, 'Bootcamp', 'Nemo officia enim libero repellendus eum sit rem praesentium.', '11 months', 401, 'Easy', 'Monday, Wednesday, Friday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(31, 47, 'Zumba', 'Est odit fugit placeat omnis dolorem alias eos natus similique fugiat velit.', '9 months', 383, 'Intermediate', 'Tuesday, Thursday, Saturday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(32, 45, 'Functional Fitness', 'Necessitatibus qui eaque voluptatem est ea minima aut aut itaque dicta.', '4 months', 373, 'Hard', 'Tuesday, Thursday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(33, 48, 'Zumba', 'Pariatur voluptatibus inventore consequuntur porro eum inventore.', '5 months', 407, 'Easy', 'Tuesday, Thursday, Saturday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(34, 28, 'Advanced Pilates', 'Placeat repudiandae blanditiis cupiditate earum qui et quia non aut vitae dignissimos natus explicabo.', '9 months', 415, 'Easy', 'Monday, Wednesday, Friday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(35, 42, 'Yoga Basics', 'Quia eaque possimus non fugiat ea dolores qui dicta eveniet debitis aut veniam autem.', '3 months', 326, 'Intermediate', 'Saturday, Sunday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(36, 41, 'Advanced Pilates', 'Vel eveniet aut ullam dolores laborum expedita autem provident sint dolorem quibusdam minus.', '6 months', 340, 'Intermediate', 'Monday, Tuesday, Thursday, Saturday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(37, 48, 'Martial Arts', 'Aut dolor officiis unde tempora nulla repellat est exercitationem quo quo.', '1 month', 391, 'Hard', 'Monday, Tuesday, Thursday, Saturday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(38, 12, 'Cardio Blast', 'Nobis dolores eligendi autem vitae minus laborum iure recusandae totam magnam molestiae quis.', '8 months', 477, 'Intermediate', 'Monday, Thursday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(39, 45, 'Bodybuilding', 'Explicabo quo voluptate adipisci architecto non saepe totam.', '5 months', 92, 'Hard', 'Tuesday, Friday, Sunday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(40, 33, 'Strength Training', 'Deleniti qui perferendis quos doloremque asperiores molestiae aperiam id libero ut sunt.', '11 months', 187, 'Easy', 'Monday, Tuesday, Thursday, Saturday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(41, 11, 'Aerobics', 'Qui id quidem nobis inventore eos quasi est inventore illum molestiae pariatur.', '12 months', 436, 'Intermediate', 'Monday, Tuesday, Wednesday, Saturday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(42, 46, 'Functional Fitness', 'Similique dignissimos iusto ut amet laudantium rerum adipisci natus sit iure rem.', '4 months', 186, 'Easy', 'Wednesday, Thursday, Sunday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(43, 19, 'Kettlebell Workouts', 'Tempora sunt hic rerum ea saepe reiciendis.', '10 months', 289, 'Hard', 'Friday, Saturday, Sunday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(44, 32, 'Boxing', 'Suscipit pariatur odit est quia qui cum ipsam dolor.', '10 months', 190, 'Easy', 'Monday, Thursday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(45, 3, 'Core Strength', 'Dolores illo vitae est ut qui molestias.', '1 month', 307, 'Intermediate', 'Wednesday, Thursday, Sunday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(46, 41, 'Aerobics', 'Dolorem totam vitae incidunt et accusamus laudantium voluptatem exercitationem repellat est.', '2 months', 268, 'Easy', 'Wednesday, Thursday, Sunday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(47, 16, 'Circuit Training', 'Debitis hic quaerat dicta consectetur debitis qui.', '2 months', 176, 'Hard', 'Saturday, Sunday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(48, 38, 'Advanced Pilates', 'A enim iure similique reprehenderit sequi nesciunt ut.', '7 months', 143, 'Hard', 'Tuesday, Friday, Sunday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(49, 18, 'Stretching', 'Enim id possimus inventore ut sit fugit laborum asperiores soluta fuga quia et.', '7 months', 456, 'Intermediate', 'Monday, Thursday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(50, 39, 'Aerobics', 'At beatae ut provident enim soluta omnis sequi dolorem dicta sunt ex soluta eos.', '2 months', 342, 'Hard', 'Monday, Tuesday, Thursday, Saturday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(51, 22, 'Aerobics', 'Non architecto quo molestiae dolore et provident laudantium quibusdam mollitia autem ut.', '10 months', 365, 'Easy', 'Monday, Wednesday, Friday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(52, 38, 'Strength Training', 'Et corrupti et ipsum numquam perferendis ea ea provident.', '1 month', 70, 'Intermediate', 'Tuesday, Friday, Sunday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(54, 6, 'Circuit Training', 'Ut iste ex vero laudantium hic vero rerum eius.', '7 months', 377, 'Intermediate', 'Monday, Tuesday, Wednesday, Saturday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(55, 37, 'Cardio Blast', 'Voluptas ipsum est non vel amet hic et dicta.', '10 months', 207, 'Hard', 'Friday, Saturday, Sunday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(56, 20, 'Rowing', 'Quibusdam et est officiis aperiam aut exercitationem fugiat veniam ipsa consequatur incidunt reprehenderit est.', '3 months', 273, 'Intermediate', 'Monday, Tuesday, Wednesday, Saturday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(57, 23, 'Kettlebell Workouts', 'Debitis doloribus voluptas ut fugiat ut voluptas ducimus.', '9 months', 491, 'Hard', 'Monday, Wednesday, Friday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(58, 50, 'Stretching', 'Sint aut aliquam voluptates enim voluptas adipisci et voluptatibus neque rem.', '7 months', 105, 'Intermediate', 'Monday, Tuesday, Thursday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(59, 47, 'Swimming', 'Qui vel numquam assumenda aut voluptate ea sint.', '3 months', 196, 'Intermediate', 'Wednesday, Friday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(60, 46, 'Cardio Blast', 'Eos deleniti vero quo sunt id eos.', '9 months', 152, 'Easy', 'Saturday, Sunday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(61, 48, 'Resistance Band Training', 'Et accusamus sit doloremque nam nemo eum nihil voluptas mollitia.', '11 months', 489, 'Easy', 'Tuesday, Thursday, Saturday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(62, 44, 'Kettlebell Workouts', 'Eligendi vitae esse rem incidunt culpa sed cumque reprehenderit eveniet hic vero earum doloremque.', '8 months', 276, 'Hard', 'Saturday, Sunday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(63, 3, 'Yoga Basics', 'Iusto ut et nostrum quo eveniet hic harum enim et laudantium.', '9 months', 189, 'Hard', 'Tuesday, Friday, Sunday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(64, 40, 'Bodybuilding', 'Earum et est assumenda atque sit non commodi ut laudantium libero quasi enim assumenda voluptatem.', '4 months', 492, 'Intermediate', 'Wednesday, Friday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(65, 51, 'Spin Classes', 'Rerum veritatis omnis aut est quis tempora.', '12 months', 372, 'Hard', 'Wednesday, Thursday, Sunday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(66, 5, 'Cardio Blast', 'Libero sed nam magni ut quos maiores.', '10 months', 347, 'Intermediate', 'Tuesday, Thursday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(67, 40, 'Resistance Band Training', 'Labore autem molestiae sunt quis neque eum et.', '3 months', 140, 'Intermediate', 'Wednesday, Friday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(68, 51, 'Spin Classes', 'Voluptates blanditiis dolores suscipit occaecati ad quia maiores distinctio.', '7 months', 198, 'Intermediate', 'Wednesday, Friday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(69, 39, 'Aerobics', 'Qui esse et a unde excepturi quis explicabo.', '3 months', 252, 'Hard', 'Monday, Tuesday, Wednesday, Saturday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(70, 45, 'Zumba', 'Possimus optio expedita et et eos reprehenderit qui provident a modi sed.', '2 months', 350, 'Hard', 'Tuesday, Thursday, Saturday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(71, 7, 'Martial Arts', 'Inventore non qui soluta iusto est quia.', '4 months', 177, 'Hard', 'Monday, Thursday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(72, 12, 'Yoga Basics', 'Rerum voluptatem quo dolorem ratione ut aut vel sit mollitia distinctio dolorem at.', '10 months', 243, 'Easy', 'Wednesday, Thursday, Sunday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(73, 20, 'Bootcamp', 'Cum aliquid voluptatem non aut voluptate hic.', '9 months', 449, 'Intermediate', 'Monday, Thursday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(74, 25, 'Yoga Basics', 'Molestiae praesentium praesentium soluta vero et voluptatum eligendi sint incidunt recusandae magni at.', '5 months', 84, 'Easy', 'Tuesday, Friday, Sunday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(75, 24, 'Yoga Basics', 'Harum porro consequatur quaerat omnis perferendis commodi esse modi.', '6 months', 471, 'Intermediate', 'Monday, Tuesday, Wednesday, Saturday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(76, 6, 'Boxing', 'Dignissimos sed commodi mollitia optio quia explicabo eveniet cupiditate.', '5 months', 347, 'Intermediate', 'Monday, Tuesday, Thursday, Saturday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(77, 50, 'CrossFit', 'Sed adipisci eligendi omnis veritatis assumenda ipsam.', '5 months', 337, 'Intermediate', 'Monday, Thursday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(78, 14, 'CrossFit', 'Sit eos similique qui voluptas quas ut.', '6 months', 398, 'Hard', 'Monday, Wednesday, Friday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(79, 17, 'Advanced Pilates', 'Blanditiis quisquam et corrupti ut repudiandae enim provident occaecati eaque nostrum assumenda reiciendis quia.', '7 months', 384, 'Easy', 'Friday, Saturday, Sunday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(80, 4, 'Core Strength', 'Saepe voluptatem minima natus qui quis a occaecati labore facere omnis fugit.', '10 months', 205, 'Hard', 'Tuesday, Friday, Sunday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(81, 11, 'Functional Fitness', 'Omnis est eos qui omnis reprehenderit architecto.', '10 months', 265, 'Hard', 'Monday, Wednesday, Friday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(82, 8, 'Stretching', 'Voluptatem qui ratione illum voluptatem provident velit.', '3 months', 80, 'Intermediate', 'Friday, Saturday, Sunday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(83, 48, 'Rowing', 'Perferendis ratione enim dolorum qui sequi minus rerum esse nobis qui ad veritatis molestiae consectetur.', '12 months', 365, 'Intermediate', 'Tuesday, Friday, Sunday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(84, 48, 'Spin Classes', 'Cupiditate vel voluptatum eum quaerat magnam architecto sit eos enim autem.', '6 months', 150, 'Intermediate', 'Monday, Wednesday, Friday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(85, 26, 'Strength Training', 'At recusandae reiciendis blanditiis animi quidem aspernatur eos repellat itaque ipsa quod labore.', '5 months', 134, 'Easy', 'Wednesday, Thursday, Sunday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(86, 45, 'Core Strength', 'Dignissimos est corporis voluptatibus fugit excepturi animi quidem.', '6 months', 69, 'Intermediate', 'Tuesday, Friday, Sunday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(87, 3, 'Resistance Band Training', 'Tempore voluptas qui ut similique qui nam enim aliquam nihil.', '2 months', 129, 'Intermediate', 'Monday, Thursday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(88, 49, 'Bootcamp', 'Voluptatem sint ad aut quae debitis ipsam doloribus iste veniam consequuntur officia.', '8 months', 370, 'Intermediate', 'Monday, Tuesday, Thursday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(89, 8, 'Martial Arts', 'Dicta et voluptas consectetur rem sunt vitae at est quod.', '8 months', 370, 'Hard', 'Friday, Saturday, Sunday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(90, 17, 'Bootcamp', 'Rem non saepe id qui pariatur nobis consequatur corporis labore sapiente molestiae ducimus nulla.', '2 months', 428, 'Easy', 'Monday, Wednesday, Friday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(91, 14, 'HIIT Training', 'Quam facilis quasi voluptatem dolorem qui delectus impedit.', '12 months', 371, 'Easy', 'Tuesday, Friday, Sunday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(92, 16, 'Stretching', 'Enim vitae autem consequatur nostrum dignissimos saepe cum ut perspiciatis architecto voluptas expedita voluptatum.', '2 months', 472, 'Easy', 'Monday, Thursday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(93, 38, 'Bodybuilding', 'Est eos laborum architecto et mollitia voluptates et aliquid a illum qui molestias fugiat.', '10 months', 428, 'Easy', 'Monday, Thursday', 'default-program1.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(94, 46, 'Advanced Pilates', 'Accusamus quia ab quisquam enim voluptatem et.', '1 month', 253, 'Hard', 'Monday, Tuesday, Thursday, Saturday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(95, 49, 'CrossFit', 'Quia qui totam in repellendus ipsum ut est fuga est sint aspernatur.', '11 months', 131, 'Intermediate', 'Monday, Tuesday, Wednesday, Saturday', 'default-program5.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(96, 13, 'HIIT Training', 'Rem ut ipsa nostrum ipsum quia earum sunt dolores id totam.', '1 month', 366, 'Hard', 'Tuesday, Friday, Sunday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(97, 26, 'Circuit Training', 'Ut quia odit iste sunt quia minus.', '3 months', 339, 'Intermediate', 'Tuesday, Thursday, Saturday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(98, 48, 'Stretching', 'Neque enim cumque debitis natus sit dolorem voluptatem ea ex est quisquam dolor.', '3 months', 156, 'Easy', 'Tuesday, Friday, Sunday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(99, 31, 'Bodybuilding', 'Nemo incidunt ea odio perspiciatis ex aut.', '7 months', 234, 'Easy', 'Monday, Tuesday, Thursday, Saturday', 'default-program3.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(100, 37, 'Rowing', 'Nobis est quaerat repellat id et at et assumenda et eum.', '3 months', 106, 'Hard', 'Monday, Tuesday, Wednesday, Saturday', 'default-program2.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08'),
(101, 44, 'Resistance Band Training', 'Sed quia excepturi architecto incidunt vero incidunt explicabo reiciendis iste.', '3 months', 487, 'Intermediate', 'Tuesday, Friday, Sunday', 'default-program4.jpg', '2024-07-28 14:59:08', '2024-07-28 14:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin User', 'admin@gmail.com', NULL, '$2y$10$CpWSQuquy4Bicog3izsU3OyMjuYDrB7yv13.JoCjIF3kWZzuWpMKm', NULL, '2024-07-28 14:52:01', '2024-07-28 14:52:01', 1),
(2, 'bjk bkj', 'hhh@gmail.com', NULL, '$2y$10$0PG89XJIdbJu2YDddjN//uGKaxu/sa0xDqB03ztrYjYnZ/BS93Zz2', NULL, '2024-07-28 15:43:30', '2024-07-28 15:43:30', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_client_id_foreign` (`client_id`);

--
-- Indexes for table `account_programs`
--
ALTER TABLE `account_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_programs_account_id_foreign` (`account_id`),
  ADD KEY `account_programs_program_id_foreign` (`program_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_user_id_foreign` (`user_id`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
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
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_coach_id_foreign` (`coach_id`);

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
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_programs`
--
ALTER TABLE `account_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `account_programs`
--
ALTER TABLE `account_programs`
  ADD CONSTRAINT `account_programs_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `account_programs_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
