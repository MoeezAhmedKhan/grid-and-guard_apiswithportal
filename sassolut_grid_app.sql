-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2023 at 04:54 AM
-- Server version: 10.3.38-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sassolut_grid_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `accept_request`
--

CREATE TABLE `accept_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guard_id` int(11) NOT NULL,
  `guard_location` varchar(255) DEFAULT NULL,
  `task_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inprogress',
  `end_job_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accept_request`
--

INSERT INTO `accept_request` (`id`, `user_id`, `guard_id`, `guard_location`, `task_id`, `type`, `status`, `end_job_date`) VALUES
(716, 115, 117, NULL, 91, 'Petroling Service', 'inprogress', NULL),
(717, 115, 117, NULL, 93, 'Petroling Service', 'inprogress', NULL),
(718, 115, 159, NULL, 92, 'Petroling Service', 'inprogress', NULL),
(719, 161, 159, '{\"latitude\":24.9050091,\"longitude\":67.0784286}', 451, 'On Demand', 'completed', '2023-04-06 11:19:55'),
(720, 162, 159, '{\"latitude\":24.9050504,\"longitude\":67.0784284}', 452, 'On Demand', 'completed', '2023-04-06 12:28:24'),
(721, 162, 159, '{\"latitude\":24.9050347,\"longitude\":67.0784362}', 453, 'On Demand', 'completed', '2023-04-06 12:37:12'),
(722, 162, 159, '{\"latitude\":24.8631744,\"longitude\":67.0538103}', 454, 'On Demand', 'completed', '2023-04-06 12:58:29'),
(723, 162, 159, '{\"latitude\":24.8631799,\"longitude\":67.0538118}', 455, 'On Demand', 'completed', '2023-04-06 12:58:29'),
(724, 162, 159, '{\"latitude\":24.8631752,\"longitude\":67.053786}', 462, 'On Demand', 'completed', '2023-04-07 15:44:29'),
(725, 115, 117, '{\"latitude\":24.9049152,\"longitude\":67.078408}', 464, 'On Demand', 'completed', '2023-04-08 02:51:33'),
(726, 115, 117, '{\"latitude\":24.9046144,\"longitude\":67.0782946}', 465, 'On Demand', 'completed', '2023-04-08 05:38:59'),
(727, 115, 117, '{\"latitude\":24.9049372,\"longitude\":67.0784016}', 466, 'On Demand', 'completed', '2023-04-08 06:02:26'),
(728, 115, 117, '{\"latitude\":24.9049231,\"longitude\":67.0784229}', 467, 'On Demand', 'completed', '2023-04-08 07:23:02'),
(729, 115, 117, '{\"latitude\":24.9049231,\"longitude\":67.0784229}', 468, 'On Demand', 'completed', '2023-04-08 07:28:00'),
(730, 115, 117, '{\"latitude\":24.9049025,\"longitude\":67.0783933}', 469, 'On Demand', 'completed', '2023-04-08 07:28:59'),
(731, 162, 117, '{\"latitude\":24.9049025,\"longitude\":67.0783933}', 463, 'On Demand', 'completed', '2023-04-08 07:30:32'),
(732, 115, 117, '{\"latitude\":24.9049066,\"longitude\":67.0783896}', 470, 'On Demand', 'completed', '2023-04-10 04:32:33'),
(733, 162, 159, '{\"latitude\":24.8631703,\"longitude\":67.0537924}', 461, 'On Demand', 'completed', '2023-04-14 16:10:46'),
(734, 162, 159, '{\"latitude\":24.8631744,\"longitude\":67.0537968}', 472, 'On Demand', 'completed', '2023-04-14 16:14:04'),
(735, 162, 159, '{\"latitude\":24.8631759,\"longitude\":67.0537934}', 473, 'On Demand', 'completed', '2023-04-14 16:17:42'),
(736, 162, 159, '{\"latitude\":24.86317,\"longitude\":67.0537885}', 474, 'On Demand', 'completed', '2023-04-14 16:18:45'),
(737, 162, 159, '{\"latitude\":24.8631748,\"longitude\":67.0537967}', 456, 'On Demand', 'completed', '2023-04-14 16:18:58'),
(738, 162, 159, '{\"latitude\":24.8631748,\"longitude\":67.0537967}', 457, 'On Demand', 'completed', '2023-04-14 16:19:06'),
(739, 162, 159, '{\"latitude\":24.8631748,\"longitude\":67.0537967}', 471, 'On Demand', 'completed', '2023-04-14 16:19:16'),
(740, 162, 159, '{\"latitude\":24.8631724,\"longitude\":67.053798}', 459, 'On Demand', 'completed', '2023-04-14 16:19:24'),
(741, 162, 159, '{\"latitude\":24.8631724,\"longitude\":67.053798}', 458, 'On Demand', 'completed', '2023-04-14 16:19:31'),
(742, 162, 159, '{\"latitude\":24.8631724,\"longitude\":67.053798}', 460, 'On Demand', 'completed', '2023-04-14 16:19:40'),
(743, 162, 159, '{\"latitude\":24.8631706,\"longitude\":67.0537898}', 475, 'On Demand', 'completed', '2023-04-14 16:21:35'),
(744, 148, 159, '{\"latitude\":24.8631677,\"longitude\":67.0538023}', 476, 'On Demand', 'completed', '2023-04-14 16:29:00'),
(745, 164, 159, '{\"latitude\":24.8631764,\"longitude\":67.0537863}', 477, 'On Demand', 'completed', '2023-04-14 17:16:59'),
(746, 164, 159, '{\"latitude\":24.8631684,\"longitude\":67.0537959}', 478, 'On Demand', 'completed', '2023-04-14 17:21:41'),
(747, 164, 159, NULL, 94, 'Petroling Service', 'inprogress', NULL),
(748, 164, 159, '{\"latitude\":24.8380635,\"longitude\":67.0736064}', 479, 'On Demand', 'completed', '2023-04-15 15:31:57'),
(749, 162, 159, '{\"latitude\":38.5836708,\"longitude\":-121.4040213}', 480, 'On Demand', 'inprogress', NULL),
(750, 164, 117, '{\"latitude\":24.8631741,\"longitude\":67.0537933}', 481, 'On Demand', 'completed', '2023-04-19 16:26:37'),
(751, 164, 117, '{\"latitude\":24.8631741,\"longitude\":67.0537933}', 482, 'On Demand', 'completed', '2023-04-19 16:26:48'),
(752, 164, 117, '{\"latitude\":24.8631722,\"longitude\":67.0537877}', 483, 'On Demand', 'completed', '2023-04-19 16:26:59'),
(753, 167, 117, '{\"latitude\":24.8631722,\"longitude\":67.0537877}', 484, 'On Demand', 'completed', '2023-04-19 16:27:07'),
(754, 162, 117, '{\"latitude\":0,\"longitude\":0}', 486, 'On Demand', 'inprogress', NULL),
(755, 115, 117, '{\"latitude\":24.9048883,\"longitude\":67.0783891}', 491, 'On Demand', 'completed', '2023-04-27 04:42:52'),
(756, 115, 117, '{\"latitude\":24.9048964,\"longitude\":67.0783908}', 494, 'On Demand', 'completed', '2023-04-27 06:17:59'),
(757, 115, 117, NULL, 95, 'Petroling Service', 'inprogress', NULL),
(758, 115, 117, NULL, 96, 'Petroling Service', 'inprogress', NULL),
(759, 115, 170, '{\"latitude\":24.8631833,\"longitude\":67.0537983}', 492, 'On Demand', 'completed', '2023-04-27 16:53:30'),
(760, 115, 170, '{\"latitude\":24.8631791,\"longitude\":67.0537944}', 493, 'On Demand', 'completed', '2023-04-27 16:54:31'),
(761, 165, 170, '{\"latitude\":24.8631781,\"longitude\":67.0537975}', 495, 'On Demand', 'completed', '2023-04-27 16:56:02'),
(762, 165, 170, '{\"latitude\":24.8631829,\"longitude\":67.0537903}', 496, 'On Demand', 'completed', '2023-04-27 17:06:21'),
(763, 165, 170, '{\"latitude\":24.8631835,\"longitude\":67.0537893}', 497, 'On Demand', 'completed', '2023-04-28 14:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `add_bank`
--

CREATE TABLE `add_bank` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `iban_number` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_bank`
--

INSERT INTO `add_bank` (`id`, `bank_name`, `iban_number`, `created_at`) VALUES
(1, 'Allied Ltd', 'PK00000000000000', '2023-01-21 08:31:16'),
(2, 'UBL Bank', '11013-2506-613948', '2023-01-21 12:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `add_petroling_service`
--

CREATE TABLE `add_petroling_service` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `service_address` varchar(255) DEFAULT NULL,
  `week_days` varchar(255) DEFAULT NULL,
  `petrols_daily` int(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `promo_id` int(255) DEFAULT NULL,
  `discounted_amount` int(255) DEFAULT NULL,
  `actual_amount` int(255) DEFAULT NULL,
  `post_order` int(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_petroling_service`
--

INSERT INTO `add_petroling_service` (`id`, `user_id`, `start_date`, `end_date`, `service_address`, `week_days`, `petrols_daily`, `location`, `time`, `promo_id`, `discounted_amount`, `actual_amount`, `post_order`, `status`, `created_at`) VALUES
(95, 115, '27-04-2023', '04-05-2023', 'Gulshan-e-Iqbal Karachi, Pakistan', '[\"Thu\"]', 1, '{\"latitude\":24.9180271,\"longitude\":67.0970916}', '1', 0, 0, 50, 27, 'inprogress', '2023-04-27 10:04:19'),
(96, 115, '27-04-2023', '04-05-2023', 'Osif Center Block 13 A Gulshan-e-Iqbal, Karachi, Pakistan', '[\"Thu\"]', 1, '{\"latitude\":24.9049815,\"longitude\":67.0782555}', '1', 0, 0, 50, 27, 'inprogress', '2023-04-27 10:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `add_post_service`
--

CREATE TABLE `add_post_service` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_of_location` varchar(255) NOT NULL,
  `address_of_location` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gate_code` varchar(255) NOT NULL,
  `quite_time_rule` varchar(255) NOT NULL,
  `lock_ups` varchar(255) NOT NULL,
  `tow_company` varchar(255) NOT NULL,
  `tow_company_phone` varchar(255) NOT NULL,
  `two_red_zone_parking_violation` varchar(255) NOT NULL,
  `can_security_sign_for_permit_only_towing` varchar(255) NOT NULL,
  `maintenance_on_call_name` varchar(255) NOT NULL,
  `maintenance_on_phone_call` varchar(255) NOT NULL,
  `additional_notes` varchar(255) NOT NULL,
  `is_delete` varchar(255) NOT NULL DEFAULT 'No',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_post_service`
--

INSERT INTO `add_post_service` (`id`, `user_id`, `name_of_location`, `address_of_location`, `phone`, `gate_code`, `quite_time_rule`, `lock_ups`, `tow_company`, `tow_company_phone`, `two_red_zone_parking_violation`, `can_security_sign_for_permit_only_towing`, `maintenance_on_call_name`, `maintenance_on_phone_call`, `additional_notes`, `is_delete`, `created_at`) VALUES
(25, 100, 'Test Location ', 'My location ', '0000000000', '0000', 'undefined', 'undefined', 'test', '0000000000', 'false', 'false', 'test', '0000000000', 'test notes', 'No', '2023-02-21 16:07:13'),
(26, 101, 'Hey', 'Bbb', '999', 'Nn', 'undefined', 'undefined', 'nnn', 'b99', 'false', 'false', '9nn', 'n9', '9n', 'No', '2023-02-21 16:21:29'),
(27, 115, 'Zhzh', 'Sbsb', '4949', 'Sbsb', 'undefined', 'undefined', 'Zbsb', '5949', 'false', 'false', 'Sbsb', '9449', 'Sbsb', 'No', '2023-02-28 11:17:29'),
(28, 120, 'Gh', 'Gg', '5555', 'Gggg', 'undefined', 'undefined', 'Gggg', '5555', 'false', 'false', 'Ggggghh', '66666', 'Vbbb', 'No', '2023-03-01 12:37:19'),
(29, 149, 'Bzhz', 'Dbdbsbs', '494949449', 'Xbzbzb', 'undefined', 'undefined', 'Shsbshs', '464646', 'false', 'false', 'Whwhwh', '466', 'Dbdbb', 'No', '2023-03-13 20:09:23'),
(30, 156, 'Hey', 'Yoo', '466446', 'Sbsbs', 'undefined', 'undefined', 'Shsbs', '494949', 'false', 'false', 'Zbzb', '4949', 'Sbsb', 'No', '2023-03-22 12:14:34'),
(31, 157, 'Shsh', 'Eheh', '4994', 'Sbbs', 'undefined', 'undefined', 'Shshs', '49646', 'false', 'false', 'Shshe', '1616', 'Eheh', 'No', '2023-03-25 09:27:06'),
(32, 119, 'test', 'twtsw', '00000000000000', 'bsgsus', 'undefined', 'undefined', 'nxhsysjzb', '686549466', 'false', 'false', 'hb, bzhz', '908463461', 'bzgshs', 'No', '2023-04-04 14:11:45'),
(33, 164, 'Home', 'Downtown Houston', '3025258191', '420', 'undefined', 'undefined', 'Abcd', '3025258198', 'true', 'true', 'Abc', '3025258197', 'None', 'No', '2023-04-15 00:13:47'),
(34, 164, 'Home', 'Downtown Houston', '3025258191', '420', 'undefined', 'undefined', 'Abcd', '3025258198', 'true', 'true', 'Abc', '3025258197', 'None', 'Yes', '2023-04-15 00:13:47'),
(35, 164, 'Home', 'Downtown Houston', '3025258191', '420', 'undefined', 'undefined', 'Abcd', '3025258198', 'true', 'true', 'Abc', '3025258197', 'None', 'Yes', '2023-04-15 00:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `add_report_data`
--

CREATE TABLE `add_report_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `shedule_id` int(11) NOT NULL DEFAULT 0,
  `guard_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file_type` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'On Demand',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_report_data`
--

INSERT INTO `add_report_data` (`id`, `user_id`, `task_id`, `shedule_id`, `guard_id`, `image`, `file_type`, `location`, `description`, `type`, `created_at`) VALUES
(228, 115, 491, 0, 117, '202304274241Guard_Report.jpg', 'image', '{\"latitude\":24.9049042,\"longitude\":67.0783877}', 'testing', 'On Demand', '2023-04-27 10:42:41'),
(229, 115, 494, 0, 117, '202304271309Guard_Report.jpg', 'image', '{\"latitude\":24.9048964,\"longitude\":67.0783908}', NULL, 'On Demand', '2023-04-27 12:13:09'),
(230, 115, 494, 0, 117, '202304271503Guard_Report.jpg', 'image', '{\"latitude\":24.9049034,\"longitude\":67.0783977}', NULL, 'On Demand', '2023-04-27 12:15:03'),
(231, 115, 494, 0, 117, '202304271738Guard_Report.jpg', 'image', '{\"latitude\":24.9048922,\"longitude\":67.0784151}', 'Keyboard', 'On Demand', '2023-04-27 12:17:38'),
(232, 115, 96, 1119, 117, '202304272658Guard_Report.jpg', 'image', '{\"latitude\":24.9049416,\"longitude\":67.0783678}', NULL, 'Petroling Service', '2023-04-27 12:26:58'),
(233, 165, 497, 0, 170, '202304281438Guard_Report.jpg', 'image', '{\"latitude\":24.8631781,\"longitude\":67.0537928}', 'Description testing', 'On Demand', '2023-04-28 20:14:38'),
(234, 165, 497, 0, 170, '202304281445Guard_Report.jpg', 'image', '{\"latitude\":24.8631781,\"longitude\":67.0537928}', 'Description testing', 'On Demand', '2023-04-28 20:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `add_report_for_schedule`
--

CREATE TABLE `add_report_for_schedule` (
  `id` int(11) NOT NULL,
  `guard_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_standing_security`
--

CREATE TABLE `add_standing_security` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `week_days` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `service_address` varchar(255) DEFAULT NULL,
  `petrols_daily` varchar(255) DEFAULT NULL,
  `shift_start_time` varchar(255) DEFAULT NULL,
  `specific_post_order` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `promo_id` int(255) DEFAULT NULL,
  `discounted_amount` int(255) DEFAULT NULL,
  `actual_amount` int(255) DEFAULT NULL,
  `post_orders` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_vacational_petrol`
--

CREATE TABLE `add_vacational_petrol` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `service_address` varchar(255) DEFAULT NULL,
  `petrols_daily` int(11) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_request`
--

CREATE TABLE `assign_request` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `request_id` int(11) NOT NULL,
  `guard_id` int(11) NOT NULL,
  `guard_location` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'engaged',
  `accepted_at` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `end_job_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_account_log`
--

CREATE TABLE `deleted_account_log` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '	0 for admin, 1 for individual, 2 for company, 3 for vendor, 4 for guard	',
  `business_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `company_direct_contact_person_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_alter_phone` varchar(255) DEFAULT NULL,
  `standing_service_per_hour_charge` varchar(255) DEFAULT NULL,
  `per_petrol_charge` varchar(255) DEFAULT NULL,
  `company_license_document` varchar(255) DEFAULT NULL,
  `insurance_document` varchar(255) DEFAULT NULL,
  `auto_insurance_document` varchar(255) DEFAULT NULL,
  `w9_Form_document` varchar(255) DEFAULT NULL,
  `state_operating_license_document` varchar(255) DEFAULT NULL,
  `user_agreement_document` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `notification_token` varchar(255) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deleted_account_log`
--

INSERT INTO `deleted_account_log` (`id`, `role_id`, `business_name`, `company_name`, `first_name`, `last_name`, `service`, `company_direct_contact_person_name`, `email`, `username`, `phone`, `company_alter_phone`, `standing_service_per_hour_charge`, `per_petrol_charge`, `company_license_document`, `insurance_document`, `auto_insurance_document`, `w9_Form_document`, `state_operating_license_document`, `user_agreement_document`, `password`, `address`, `zipcode`, `country`, `profile`, `notification_token`, `social_id`, `status`, `created_at`) VALUES
(1, 1, '', '', 'habibi', 'habibi', '', '', 'habibi@gmail.com', 'habibi123', '03122255210', '', '', '', '', '', '', '', '', '', 'sameer1256', 'habib colony', '78455', 'pakistan', '202301243202Individual_Profile.png', '', '', 'suspended', '2023-01-20 15:28:16'),
(2, 2, 'Company', '', '', '', '', '', 'company@gmail.com', 'company', '1111111111', '', '', '', '', '', '', '', '', '', '11111111', 'Hssb', '0000', 'US', '202302162648Company_Profile.jpg', 'b777f9f1-7cc3-4b7c-b305-26d2d4d4adb3', '', 'active', '2023-02-11 11:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `end_job_for_schedule`
--

CREATE TABLE `end_job_for_schedule` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guard_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `police_restriction` varchar(255) DEFAULT NULL,
  `under_contruction` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `end_job_date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guard_documentation`
--

CREATE TABLE `guard_documentation` (
  `id` int(11) NOT NULL,
  `guard_id` int(11) DEFAULT NULL,
  `type` varchar(250) NOT NULL COMMENT 'types are "glicense" , "Armlicense" , "BatonLicense" ,  "VehicleLicense" , "W9" , "I9" , \r\n"DriverLicense" , "StateTaxDoc"',
  `file_url` varchar(250) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guard_documentation`
--

INSERT INTO `guard_documentation` (`id`, `guard_id`, `type`, `file_url`, `created_at`, `updated_at`) VALUES
(8, 117, 'glicense', '117_glicense20230405115004.png', '2023-04-05 13:50:04', '2023-04-05 12:17:31'),
(9, 117, 'StateTaxDoc', '117_StateTaxDoc20230405120030.jpg', '2023-04-05 14:00:31', '2023-04-26 10:05:44'),
(10, 117, 'Armlicense', '117_Armlicense20230405121424.jpg', '2023-04-05 14:14:26', '2023-04-05 12:21:39'),
(11, 117, 'I9', '117_I920230405121927.jpg', '2023-04-05 14:19:27', '2023-04-05 12:20:12'),
(12, 117, 'VehicleLicense', '117_VehicleLicense20230405122055.png', '2023-04-05 14:20:55', '2023-04-05 14:20:55'),
(13, 117, 'W9', '117_W920230405122112.jpg', '2023-04-05 14:21:12', '2023-04-05 12:21:49'),
(14, 159, 'glicense', '159_glicense20230405023447.jpg', '2023-04-05 16:34:49', '2023-04-06 09:50:31'),
(15, 159, 'StateTaxDoc', '159_StateTaxDoc20230405023619.jpg', '2023-04-05 16:36:20', '2023-04-14 09:17:41'),
(16, 159, 'DriverLicense', '159_DriverLicense20230406011332.jpg', '2023-04-06 15:13:34', '2023-04-06 15:13:34'),
(17, 159, 'I9', '159_I920230406011423.jpg', '2023-04-06 15:14:25', '2023-04-06 15:14:25'),
(18, 159, 'W9', '159_W920230406011442.jpg', '2023-04-06 15:14:44', '2023-04-06 15:14:44'),
(19, 159, 'VehicleLicense', '159_VehicleLicense20230406031622.jpg', '2023-04-06 17:16:25', '2023-04-06 17:16:25'),
(20, 159, 'Armlicense', '159_Armlicense20230406041750.jpg', '2023-04-06 18:17:54', '2023-04-06 18:17:54'),
(21, 159, 'BatonLicense', '159_BatonLicense20230406042859.jpg', '2023-04-06 18:29:01', '2023-04-06 18:29:01'),
(22, 117, 'BatonLicense', '117_BatonLicense20230427064925.jpg', '2023-04-27 08:49:25', '2023-04-27 08:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `guard_status`
--

CREATE TABLE `guard_status` (
  `id` int(11) NOT NULL,
  `guard_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'idle',
  `job_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guard_status`
--

INSERT INTO `guard_status` (`id`, `guard_id`, `status`, `job_type`) VALUES
(12, 117, 'idle', 'Petroling Service'),
(13, 159, 'engaged', 'On Demand'),
(14, 170, 'idle', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inbox_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `last_message` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'notread',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inbox_id`, `task_id`, `type`, `sender_id`, `reciever_id`, `last_message`, `status`, `date`) VALUES
(42, 61, 'Petroling Service', 159, 115, 'yess', 'unread', '2023-04-06 07:41:28'),
(43, 91, 'Petroling Service', 117, 115, 'wah', 'unread', '2023-04-07 09:52:08'),
(44, 91, 'Petroling Service', 115, 117, 'wah', 'read', '2023-04-07 09:52:08'),
(45, 451, 'On Demand', 161, 159, 'audio.mp3', 'unread', '2023-04-06 15:08:37'),
(46, 451, 'On Demand', 159, 161, 'audio.mp3', 'read', '2023-04-06 15:08:37'),
(47, 452, 'On Demand', 159, 162, 'calm them tits daddy is on thw way', 'unread', '2023-04-06 16:26:05'),
(48, 452, 'On Demand', 162, 159, 'calm them tits daddy is on thw way', 'read', '2023-04-06 16:26:05'),
(49, 476, 'On Demand', 159, 148, 'Hello', 'unread', '2023-04-14 20:25:28'),
(50, 476, 'On Demand', 148, 159, 'Hello', 'read', '2023-04-14 20:25:28'),
(51, 477, 'On Demand', 164, 159, 'Hello', 'read', '2023-04-14 21:15:06'),
(52, 477, 'On Demand', 159, 164, 'Hello', 'unread', '2023-04-14 21:15:06'),
(53, 495, 'On Demand', 165, 170, 'Hello', 'read', '2023-04-27 20:55:46'),
(54, 495, 'On Demand', 170, 165, 'Hello', 'unread', '2023-04-27 20:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `m_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `Data` longtext DEFAULT NULL,
  `last_message` varchar(255) DEFAULT NULL,
  `is_read` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'newmessage',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `task_id`, `type`, `sender_id`, `reciever_id`, `Data`, `last_message`, `is_read`, `status`, `created_at`) VALUES
(50, 61, 'Petroling Service', 159, 115, '[{\"message_id\":1,\"user_massage\":\"fyhgf\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:11:38\"},{\"message_id\":2,\"user_massage\":\"fhc\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:12:10\"},{\"message_id\":3,\"user_massage\":\"helllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:17:34\"},{\"message_id\":4,\"user_massage\":\"heys\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:06\"},{\"message_id\":5,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:18\"},{\"message_id\":6,\"user_massage\":\"hdkllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:43\"},{\"message_id\":7,\"user_massage\":\"heys\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:28\"},{\"message_id\":8,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:42\"},{\"message_id\":9,\"user_massage\":\" Hola\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:43\"},{\"message_id\":10,\"user_massage\":\"this is my new job chat\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:54\"},{\"message_id\":11,\"user_massage\":\"this is another one\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:20:06\"},{\"message_id\":12,\"user_massage\":\"Boi\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:22:28\"},{\"message_id\":13,\"user_massage\":\"kay baat\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:22:55\"},{\"message_id\":14,\"user_massage\":\"manboos\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:23:10\"},{\"message_id\":15,\"user_massage\":\"Yo\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:24:08\"},{\"message_id\":16,\"user_massage\":\"Heu\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:24:43\"},{\"message_id\":17,\"user_massage\":\"hwllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:27:19\"},{\"message_id\":18,\"user_massage\":\"this is my pehli chal \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:27:39\"},{\"message_id\":19,\"user_massage\":\"Ok h?\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:28:08\"},{\"message_id\":20,\"user_massage\":\"Hn set hai boii\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:28:17\"},{\"message_id\":21,\"user_massage\":\"uploads/1680766111CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766111CHAT.jpeg\",\"created_at\":\"2023-04-06 07:28:33\"},{\"message_id\":22,\"user_massage\":\"uploads/1680766291CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766291CHAT.mp3\",\"created_at\":\"2023-04-06 07:31:31\"},{\"message_id\":23,\"user_massage\":\"uploads/1680766303CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766303CHAT.mp3\",\"created_at\":\"2023-04-06 07:31:43\"},{\"message_id\":24,\"user_massage\":\" Ola\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:37:15\"},{\"message_id\":25,\"user_massage\":\"Yuu\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:40:09\"},{\"message_id\":26,\"user_massage\":\"vvvvvvb\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:40:35\"},{\"message_id\":27,\"user_massage\":\"yess\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:41:28\"}]', 'yess', 'read', 'sentmessage', '2023-04-06 08:44:03'),
(51, 61, 'Petroling Service', 115, 159, '[{\"message_id\":1,\"user_massage\":\"fyhgf\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:11:38\"},{\"message_id\":2,\"user_massage\":\"fhc\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:12:10\"},{\"message_id\":3,\"user_massage\":\"helllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:17:34\"},{\"message_id\":4,\"user_massage\":\"heys\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:06\"},{\"message_id\":5,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:18\"},{\"message_id\":6,\"user_massage\":\"hdkllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:43\"},{\"message_id\":7,\"user_massage\":\"heys\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:28\"},{\"message_id\":8,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:42\"},{\"message_id\":9,\"user_massage\":\" Hola\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:43\"},{\"message_id\":10,\"user_massage\":\"this is my new job chat\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:54\"},{\"message_id\":11,\"user_massage\":\"this is another one\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:20:06\"},{\"message_id\":12,\"user_massage\":\"Boi\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:22:28\"},{\"message_id\":13,\"user_massage\":\"kay baat\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:22:55\"},{\"message_id\":14,\"user_massage\":\"manboos\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:23:10\"},{\"message_id\":15,\"user_massage\":\"Yo\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:24:08\"},{\"message_id\":16,\"user_massage\":\"Heu\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:24:43\"},{\"message_id\":17,\"user_massage\":\"hwllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:27:19\"},{\"message_id\":18,\"user_massage\":\"this is my pehli chal \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:27:39\"},{\"message_id\":19,\"user_massage\":\"Ok h?\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:28:08\"},{\"message_id\":20,\"user_massage\":\"Hn set hai boii\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:28:17\"},{\"message_id\":21,\"user_massage\":\"uploads/1680766111CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766111CHAT.jpeg\",\"created_at\":\"2023-04-06 07:28:33\"},{\"message_id\":22,\"user_massage\":\"uploads/1680766291CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766291CHAT.mp3\",\"created_at\":\"2023-04-06 07:31:31\"},{\"message_id\":23,\"user_massage\":\"uploads/1680766303CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766303CHAT.mp3\",\"created_at\":\"2023-04-06 07:31:43\"},{\"message_id\":24,\"user_massage\":\" Ola\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:37:15\"},{\"message_id\":25,\"user_massage\":\"Yuu\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:40:09\"},{\"message_id\":26,\"user_massage\":\"vvvvvvb\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:40:35\"},{\"message_id\":27,\"user_massage\":\"yess\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:41:28\"}]', 'yess', 'notread', 'newmessage', '2023-04-06 08:44:03'),
(54, 86, 'Standing Security', 159, 115, '[{\"message_id\":1,\"user_massage\":\"fyhgf\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:11:38\"},{\"message_id\":2,\"user_massage\":\"fhc\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:12:10\"},{\"message_id\":3,\"user_massage\":\"helllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:17:34\"},{\"message_id\":4,\"user_massage\":\"heys\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:06\"},{\"message_id\":5,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:18\"},{\"message_id\":6,\"user_massage\":\"hdkllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:43\"},{\"message_id\":7,\"user_massage\":\"heys\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:28\"},{\"message_id\":8,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:42\"},{\"message_id\":9,\"user_massage\":\" Hola\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:43\"},{\"message_id\":10,\"user_massage\":\"this is my new job chat\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:54\"},{\"message_id\":11,\"user_massage\":\"this is another one\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:20:06\"},{\"message_id\":12,\"user_massage\":\"Boi\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:22:28\"},{\"message_id\":13,\"user_massage\":\"kay baat\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:22:55\"},{\"message_id\":14,\"user_massage\":\"manboos\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:23:10\"},{\"message_id\":15,\"user_massage\":\"Yo\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:24:08\"},{\"message_id\":16,\"user_massage\":\"Heu\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:24:43\"},{\"message_id\":17,\"user_massage\":\"hwllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:27:19\"},{\"message_id\":18,\"user_massage\":\"this is my pehli chal \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:27:39\"},{\"message_id\":19,\"user_massage\":\"Ok h?\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:28:08\"},{\"message_id\":20,\"user_massage\":\"Hn set hai boii\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:28:17\"},{\"message_id\":21,\"user_massage\":\"uploads/1680766111CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766111CHAT.jpeg\",\"created_at\":\"2023-04-06 07:28:33\"},{\"message_id\":22,\"user_massage\":\"uploads/1680766291CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766291CHAT.mp3\",\"created_at\":\"2023-04-06 07:31:31\"},{\"message_id\":23,\"user_massage\":\"uploads/1680766303CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766303CHAT.mp3\",\"created_at\":\"2023-04-06 07:31:43\"},{\"message_id\":24,\"user_massage\":\" Ola\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:37:15\"},{\"message_id\":25,\"user_massage\":\"Yuu\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:40:09\"},{\"message_id\":26,\"user_massage\":\"vvv\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:40:23\"},{\"message_id\":27,\"user_massage\":\" Yyyyyyy\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:41:18\"},{\"message_id\":28,\"user_massage\":\"yasss\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:41:36\"}]', 'yasss', 'read', 'sentmessage', '2023-04-06 09:11:38'),
(55, 86, 'Standing Security', 115, 159, '[{\"message_id\":1,\"user_massage\":\"fyhgf\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:11:38\"},{\"message_id\":2,\"user_massage\":\"fhc\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:12:10\"},{\"message_id\":3,\"user_massage\":\"helllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:17:34\"},{\"message_id\":4,\"user_massage\":\"heys\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:06\"},{\"message_id\":5,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:18\"},{\"message_id\":6,\"user_massage\":\"hdkllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:18:43\"},{\"message_id\":7,\"user_massage\":\"heys\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:28\"},{\"message_id\":8,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:42\"},{\"message_id\":9,\"user_massage\":\" Hola\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:43\"},{\"message_id\":10,\"user_massage\":\"this is my new job chat\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:19:54\"},{\"message_id\":11,\"user_massage\":\"this is another one\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:20:06\"},{\"message_id\":12,\"user_massage\":\"Boi\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:22:28\"},{\"message_id\":13,\"user_massage\":\"kay baat\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:22:55\"},{\"message_id\":14,\"user_massage\":\"manboos\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:23:10\"},{\"message_id\":15,\"user_massage\":\"Yo\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:24:08\"},{\"message_id\":16,\"user_massage\":\"Heu\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:24:43\"},{\"message_id\":17,\"user_massage\":\"hwllo\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:27:19\"},{\"message_id\":18,\"user_massage\":\"this is my pehli chal \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:27:39\"},{\"message_id\":19,\"user_massage\":\"Ok h?\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:28:08\"},{\"message_id\":20,\"user_massage\":\"Hn set hai boii\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:28:17\"},{\"message_id\":21,\"user_massage\":\"uploads/1680766111CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766111CHAT.jpeg\",\"created_at\":\"2023-04-06 07:28:33\"},{\"message_id\":22,\"user_massage\":\"uploads/1680766291CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766291CHAT.mp3\",\"created_at\":\"2023-04-06 07:31:31\"},{\"message_id\":23,\"user_massage\":\"uploads/1680766303CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680766303CHAT.mp3\",\"created_at\":\"2023-04-06 07:31:43\"},{\"message_id\":24,\"user_massage\":\" Ola\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:37:15\"},{\"message_id\":25,\"user_massage\":\"Yuu\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:40:09\"},{\"message_id\":26,\"user_massage\":\"vvv\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:40:23\"},{\"message_id\":27,\"user_massage\":\" Yyyyyyy\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:41:18\"},{\"message_id\":28,\"user_massage\":\"yasss\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:41:36\"}]', 'yasss', 'notread', 'newmessage', '2023-04-06 09:11:38'),
(56, 449, 'On Demand', 159, 115, '[{\"message_id\":1,\"user_massage\":\"ondemand \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:43:10\"}]', 'ondemand ', 'read', 'sentmessage', '2023-04-06 09:43:10'),
(57, 449, 'On Demand', 115, 159, '[{\"message_id\":1,\"user_massage\":\"ondemand \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 07:43:10\"}]', 'ondemand ', 'unread', 'newmessage', '2023-04-06 09:43:10'),
(58, 91, 'Petroling Service', 117, 115, '[{\"message_id\":1,\"user_massage\":\"hy\",\"data_type\":\"text\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 12:30:54\"},{\"message_id\":2,\"user_massage\":\"Hy\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"117\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 12:31:06\"},{\"message_id\":3,\"user_massage\":\"hy\",\"data_type\":\"text\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 12:31:16\"},{\"message_id\":4,\"user_massage\":\"Jii\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"117\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 12:31:24\"},{\"message_id\":5,\"user_massage\":\"uploads/1680787484CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787484CHAT.mp3\",\"created_at\":\"2023-04-06 13:24:44\"},{\"message_id\":6,\"user_massage\":\"uploads/1680861089CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"115\",\"reciever_id\":\"117\",\"data_resource\":\"uploads/1680861089CHAT.jpeg\",\"created_at\":\"2023-04-07 09:51:29\"},{\"message_id\":7,\"user_massage\":\"uploads/video/1680861105CHAT.mp4\",\"data_type\":\"video\",\"sender_id\":\"115\",\"reciever_id\":\"117\",\"data_resource\":\"uploads/video/1680861105CHAT.mp4\",\"created_at\":\"2023-04-07 09:51:45\"},{\"message_id\":8,\"user_massage\":\"wah\",\"data_type\":\"text\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 09:52:07\"}]', 'wah', 'read', 'sentmessage', '2023-04-06 14:30:54'),
(59, 91, 'Petroling Service', 115, 117, '[{\"message_id\":1,\"user_massage\":\"hy\",\"data_type\":\"text\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 12:30:54\"},{\"message_id\":2,\"user_massage\":\"Hy\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"117\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 12:31:06\"},{\"message_id\":3,\"user_massage\":\"hy\",\"data_type\":\"text\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 12:31:16\"},{\"message_id\":4,\"user_massage\":\"Jii\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"117\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 12:31:24\"},{\"message_id\":5,\"user_massage\":\"uploads/1680787484CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787484CHAT.mp3\",\"created_at\":\"2023-04-06 13:24:44\"},{\"message_id\":6,\"user_massage\":\"uploads/1680861089CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"115\",\"reciever_id\":\"117\",\"data_resource\":\"uploads/1680861089CHAT.jpeg\",\"created_at\":\"2023-04-07 09:51:29\"},{\"message_id\":7,\"user_massage\":\"uploads/video/1680861105CHAT.mp4\",\"data_type\":\"video\",\"sender_id\":\"115\",\"reciever_id\":\"117\",\"data_resource\":\"uploads/video/1680861105CHAT.mp4\",\"created_at\":\"2023-04-07 09:51:45\"},{\"message_id\":8,\"user_massage\":\"wah\",\"data_type\":\"text\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 09:52:07\"}]', 'wah', 'notread', 'newmessage', '2023-04-06 14:30:54'),
(60, 92, 'Petroling Service', 159, 115, '[{\"message_id\":1,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:19:41\"},{\"message_id\":2,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:19:54\"},{\"message_id\":3,\"user_massage\":\"Zbdjjs\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:19:56\"},{\"message_id\":4,\"user_massage\":\"hell\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:00\"},{\"message_id\":5,\"user_massage\":\"xhdhjd\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:00\"},{\"message_id\":6,\"user_massage\":\"helll\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:02\"},{\"message_id\":7,\"user_massage\":\"xhhhd\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:04\"},{\"message_id\":8,\"user_massage\":\"xhhhddbdhxbx\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:06\"},{\"message_id\":9,\"user_massage\":\"dbsbs\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:08\"},{\"message_id\":10,\"user_massage\":\"bdbdb\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:10\"},{\"message_id\":11,\"user_massage\":\"uploads/1680787246CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787246CHAT.jpeg\",\"created_at\":\"2023-04-06 13:20:47\"},{\"message_id\":12,\"user_massage\":\"uploads/1680787269CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787269CHAT.mp3\",\"created_at\":\"2023-04-06 13:21:09\"},{\"message_id\":13,\"user_massage\":\"uploads/1680787283CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680787283CHAT.mp3\",\"created_at\":\"2023-04-06 13:21:23\"},{\"message_id\":14,\"user_massage\":\"uploads/1680787307CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787307CHAT.mp3\",\"created_at\":\"2023-04-06 13:21:47\"},{\"message_id\":15,\"user_massage\":\"uploads/1680787322CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787322CHAT.mp3\",\"created_at\":\"2023-04-06 13:22:02\"},{\"message_id\":16,\"user_massage\":\"uploads/1680787361CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787361CHAT.mp3\",\"created_at\":\"2023-04-06 13:22:41\"},{\"message_id\":17,\"user_massage\":\"uploads/1680787384CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787384CHAT.mp3\",\"created_at\":\"2023-04-06 13:23:04\"},{\"message_id\":18,\"user_massage\":\"uploads/1680787394CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787394CHAT.mp3\",\"created_at\":\"2023-04-06 13:23:14\"},{\"message_id\":19,\"user_massage\":\"chat shainha ha na bhatay \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:23:40\"},{\"message_id\":20,\"user_massage\":\"uploads/1680787453CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680787453CHAT.mp3\",\"created_at\":\"2023-04-06 13:24:13\"},{\"message_id\":21,\"user_massage\":\"uploads/1680787512CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680787512CHAT.mp3\",\"created_at\":\"2023-04-06 13:25:12\"},{\"message_id\":22,\"user_massage\":\"uploads/1680787550CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680787550CHAT.mp3\",\"created_at\":\"2023-04-06 13:25:50\"},{\"message_id\":23,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 14:48:03\"}]', 'hello', 'read', 'sentmessage', '2023-04-06 15:19:41'),
(61, 92, 'Petroling Service', 115, 159, '[{\"message_id\":1,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:19:41\"},{\"message_id\":2,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:19:54\"},{\"message_id\":3,\"user_massage\":\"Zbdjjs\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:19:56\"},{\"message_id\":4,\"user_massage\":\"hell\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:00\"},{\"message_id\":5,\"user_massage\":\"xhdhjd\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:00\"},{\"message_id\":6,\"user_massage\":\"helll\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:02\"},{\"message_id\":7,\"user_massage\":\"xhhhd\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:04\"},{\"message_id\":8,\"user_massage\":\"xhhhddbdhxbx\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:06\"},{\"message_id\":9,\"user_massage\":\"dbsbs\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:08\"},{\"message_id\":10,\"user_massage\":\"bdbdb\",\"data_type\":\"text\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:20:10\"},{\"message_id\":11,\"user_massage\":\"uploads/1680787246CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787246CHAT.jpeg\",\"created_at\":\"2023-04-06 13:20:47\"},{\"message_id\":12,\"user_massage\":\"uploads/1680787269CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787269CHAT.mp3\",\"created_at\":\"2023-04-06 13:21:09\"},{\"message_id\":13,\"user_massage\":\"uploads/1680787283CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680787283CHAT.mp3\",\"created_at\":\"2023-04-06 13:21:23\"},{\"message_id\":14,\"user_massage\":\"uploads/1680787307CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787307CHAT.mp3\",\"created_at\":\"2023-04-06 13:21:47\"},{\"message_id\":15,\"user_massage\":\"uploads/1680787322CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787322CHAT.mp3\",\"created_at\":\"2023-04-06 13:22:02\"},{\"message_id\":16,\"user_massage\":\"uploads/1680787361CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787361CHAT.mp3\",\"created_at\":\"2023-04-06 13:22:41\"},{\"message_id\":17,\"user_massage\":\"uploads/1680787384CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787384CHAT.mp3\",\"created_at\":\"2023-04-06 13:23:04\"},{\"message_id\":18,\"user_massage\":\"uploads/1680787394CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"uploads/1680787394CHAT.mp3\",\"created_at\":\"2023-04-06 13:23:14\"},{\"message_id\":19,\"user_massage\":\"chat shainha ha na bhatay \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 13:23:40\"},{\"message_id\":20,\"user_massage\":\"uploads/1680787453CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680787453CHAT.mp3\",\"created_at\":\"2023-04-06 13:24:13\"},{\"message_id\":21,\"user_massage\":\"uploads/1680787512CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680787512CHAT.mp3\",\"created_at\":\"2023-04-06 13:25:12\"},{\"message_id\":22,\"user_massage\":\"uploads/1680787550CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"115\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680787550CHAT.mp3\",\"created_at\":\"2023-04-06 13:25:50\"},{\"message_id\":23,\"user_massage\":\"hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 14:48:03\"}]', 'hello', 'notread', 'newmessage', '2023-04-06 15:19:41'),
(62, 451, 'On Demand', 161, 159, '[{\"message_id\":1,\"user_massage\":\"Boi\",\"data_type\":\"text\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:02:40\"},{\"message_id\":2,\"user_massage\":\"hello on demand job is here\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"161\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:02:46\"},{\"message_id\":3,\"user_massage\":\"Chikny\",\"data_type\":\"text\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:02:50\"},{\"message_id\":4,\"user_massage\":\"balo walay\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"161\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:02:59\"},{\"message_id\":5,\"user_massage\":\"uploads/1680793390CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"161\",\"data_resource\":\"uploads/1680793390CHAT.mp3\",\"created_at\":\"2023-04-06 15:03:10\"},{\"message_id\":6,\"user_massage\":\"uploads/1680793410CHAT.png\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"161\",\"data_resource\":\"uploads/1680793410CHAT.png\",\"created_at\":\"2023-04-06 15:03:30\"},{\"message_id\":7,\"user_massage\":\"Boii\",\"data_type\":\"text\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:03:54\"},{\"message_id\":8,\"user_massage\":\"uploads/1680793665CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680793665CHAT.jpeg\",\"created_at\":\"2023-04-06 15:07:45\"},{\"message_id\":9,\"user_massage\":\"uploads/video/1680793689CHAT.mp4\",\"data_type\":\"video\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/video/1680793689CHAT.mp4\",\"created_at\":\"2023-04-06 15:08:10\"},{\"message_id\":10,\"user_massage\":\"uploads/1680793717CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680793717CHAT.mp3\",\"created_at\":\"2023-04-06 15:08:37\"}]', 'audio.mp3', 'read', 'sentmessage', '2023-04-06 17:02:40'),
(63, 451, 'On Demand', 159, 161, '[{\"message_id\":1,\"user_massage\":\"Boi\",\"data_type\":\"text\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:02:40\"},{\"message_id\":2,\"user_massage\":\"hello on demand job is here\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"161\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:02:46\"},{\"message_id\":3,\"user_massage\":\"Chikny\",\"data_type\":\"text\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:02:50\"},{\"message_id\":4,\"user_massage\":\"balo walay\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"161\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:02:59\"},{\"message_id\":5,\"user_massage\":\"uploads/1680793390CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"161\",\"data_resource\":\"uploads/1680793390CHAT.mp3\",\"created_at\":\"2023-04-06 15:03:10\"},{\"message_id\":6,\"user_massage\":\"uploads/1680793410CHAT.png\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"161\",\"data_resource\":\"uploads/1680793410CHAT.png\",\"created_at\":\"2023-04-06 15:03:30\"},{\"message_id\":7,\"user_massage\":\"Boii\",\"data_type\":\"text\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 15:03:54\"},{\"message_id\":8,\"user_massage\":\"uploads/1680793665CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680793665CHAT.jpeg\",\"created_at\":\"2023-04-06 15:07:45\"},{\"message_id\":9,\"user_massage\":\"uploads/video/1680793689CHAT.mp4\",\"data_type\":\"video\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/video/1680793689CHAT.mp4\",\"created_at\":\"2023-04-06 15:08:10\"},{\"message_id\":10,\"user_massage\":\"uploads/1680793717CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"161\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680793717CHAT.mp3\",\"created_at\":\"2023-04-06 15:08:37\"}]', 'audio.mp3', 'notread', 'newmessage', '2023-04-06 17:02:40'),
(64, 452, 'On Demand', 159, 162, '[{\"message_id\":1,\"user_massage\":\"help is on the way\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:25:42\"},{\"message_id\":2,\"user_massage\":\"kha ho baby\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:25:43\"},{\"message_id\":3,\"user_massage\":\"calm them tits daddy is on thw way\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:26:04\"}]', 'calm them tits daddy is on thw way', 'read', 'sentmessage', '2023-04-06 18:25:42'),
(65, 452, 'On Demand', 162, 159, '[{\"message_id\":1,\"user_massage\":\"help is on the way\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:25:42\"},{\"message_id\":2,\"user_massage\":\"kha ho baby\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:25:43\"},{\"message_id\":3,\"user_massage\":\"calm them tits daddy is on thw way\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:26:04\"}]', 'calm them tits daddy is on thw way', 'notread', 'newmessage', '2023-04-06 18:25:42'),
(66, 453, 'On Demand', 159, 162, '[{\"message_id\":1,\"user_massage\":\"hole\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:37:04\"},{\"message_id\":2,\"user_massage\":\"hola\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:37:05\"}]', 'hola', 'read', 'sentmessage', '2023-04-06 18:37:04'),
(67, 453, 'On Demand', 162, 159, '[{\"message_id\":1,\"user_massage\":\"hole\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:37:04\"},{\"message_id\":2,\"user_massage\":\"hola\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:37:05\"}]', 'hola', 'notread', 'newmessage', '2023-04-06 18:37:04'),
(68, 454, 'On Demand', 162, 159, '[{\"message_id\":1,\"user_massage\":\"Hello \",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:54:20\"},{\"message_id\":2,\"user_massage\":\"Testing \",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:54:45\"},{\"message_id\":3,\"user_massage\":\"Hi \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:54:56\"},{\"message_id\":4,\"user_massage\":\"Testing\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:55:02\"}]', 'Testing', 'notread', 'newmessage', '2023-04-06 18:54:20'),
(69, 454, 'On Demand', 159, 162, '[{\"message_id\":1,\"user_massage\":\"Hello \",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:54:20\"},{\"message_id\":2,\"user_massage\":\"Testing \",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:54:45\"},{\"message_id\":3,\"user_massage\":\"Hi \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:54:56\"},{\"message_id\":4,\"user_massage\":\"Testing\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 16:55:02\"}]', 'Testing', 'read', 'sentmessage', '2023-04-06 18:54:20'),
(70, 455, 'On Demand', 162, 159, '[{\"message_id\":1,\"user_massage\":\"Hello \",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 19:02:36\"},{\"message_id\":2,\"user_massage\":\"uploads/video/1680807857CHAT.mp4\",\"data_type\":\"video\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/video/1680807857CHAT.mp4\",\"created_at\":\"2023-04-06 19:04:22\"},{\"message_id\":3,\"user_massage\":\"uploads/1680814067CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"uploads/1680814067CHAT.mp3\",\"created_at\":\"2023-04-06 20:47:47\"},{\"message_id\":4,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 16:40:37\"},{\"message_id\":5,\"user_massage\":\"Testing chating\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 16:40:58\"}]', 'Testing chating', 'read', 'sentmessage', '2023-04-06 21:02:36'),
(71, 455, 'On Demand', 159, 162, '[{\"message_id\":1,\"user_massage\":\"Hello \",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-06 19:02:36\"},{\"message_id\":2,\"user_massage\":\"uploads/video/1680807857CHAT.mp4\",\"data_type\":\"video\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/video/1680807857CHAT.mp4\",\"created_at\":\"2023-04-06 19:04:22\"},{\"message_id\":3,\"user_massage\":\"uploads/1680814067CHAT.mp3\",\"data_type\":\"audio\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"uploads/1680814067CHAT.mp3\",\"created_at\":\"2023-04-06 20:47:47\"},{\"message_id\":4,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 16:40:37\"},{\"message_id\":5,\"user_massage\":\"Testing chating\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 16:40:58\"}]', 'Testing chating', 'notread', 'newmessage', '2023-04-06 21:02:36'),
(72, 93, 'Petroling Service', 117, 115, '[{\"message_id\":1,\"user_massage\":\"dono chat per phr same message ku\",\"data_type\":\"text\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 09:52:35\"}]', 'dono chat per phr same message ku', 'read', 'sentmessage', '2023-04-07 11:52:35'),
(73, 93, 'Petroling Service', 115, 117, '[{\"message_id\":1,\"user_massage\":\"dono chat per phr same message ku\",\"data_type\":\"text\",\"sender_id\":\"117\",\"reciever_id\":\"115\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 09:52:35\"}]', 'dono chat per phr same message ku', 'unread', 'newmessage', '2023-04-07 11:52:35'),
(74, 462, 'On Demand', 162, 159, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 19:37:41\"},{\"message_id\":2,\"user_massage\":\"Testing\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 19:38:25\"},{\"message_id\":3,\"user_massage\":\"Coming \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 19:38:41\"},{\"message_id\":4,\"user_massage\":\"uploads/1680896344CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680896344CHAT.jpeg\",\"created_at\":\"2023-04-07 19:39:04\"}]', 'rn_image_picker_lib_temp_c2e347fe-8564-40ac-a3b5-e55ef5ee2f10.jpg', 'read', 'sentmessage', '2023-04-07 21:37:41'),
(75, 462, 'On Demand', 159, 162, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 19:37:41\"},{\"message_id\":2,\"user_massage\":\"Testing\",\"data_type\":\"text\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 19:38:25\"},{\"message_id\":3,\"user_massage\":\"Coming \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"162\",\"data_resource\":\"None\",\"created_at\":\"2023-04-07 19:38:41\"},{\"message_id\":4,\"user_massage\":\"uploads/1680896344CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"162\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1680896344CHAT.jpeg\",\"created_at\":\"2023-04-07 19:39:04\"}]', 'rn_image_picker_lib_temp_c2e347fe-8564-40ac-a3b5-e55ef5ee2f10.jpg', 'notread', 'newmessage', '2023-04-07 21:37:41'),
(76, 476, 'On Demand', 159, 148, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"148\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 20:25:28\"}]', 'Hello', 'read', 'sentmessage', '2023-04-14 22:25:28'),
(77, 476, 'On Demand', 148, 159, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"148\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 20:25:28\"}]', 'Hello', 'unread', 'newmessage', '2023-04-14 22:25:28'),
(78, 477, 'On Demand', 164, 159, '[{\"message_id\":1,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 21:14:29\"},{\"message_id\":2,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 21:15:05\"}]', 'Hello', 'notread', 'newmessage', '2023-04-14 23:14:29'),
(79, 477, 'On Demand', 159, 164, '[{\"message_id\":1,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 21:14:29\"},{\"message_id\":2,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 21:15:05\"}]', 'Hello', 'read', 'sentmessage', '2023-04-14 23:14:29');
INSERT INTO `messages` (`m_id`, `task_id`, `type`, `sender_id`, `reciever_id`, `Data`, `last_message`, `is_read`, `status`, `created_at`) VALUES
(80, 478, 'On Demand', 159, 164, '[{\"message_id\":1,\"user_massage\":\"Hello testing 5\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 21:19:43\"},{\"message_id\":2,\"user_massage\":\"uploads/1681507213CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1681507213CHAT.jpeg\",\"created_at\":\"2023-04-14 21:20:16\"},{\"message_id\":3,\"user_massage\":\"uploads/1681507222CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"uploads/1681507222CHAT.jpeg\",\"created_at\":\"2023-04-14 21:20:23\"}]', 'rn_image_picker_lib_temp_1147b8c2-c6a8-4ce4-8454-3d4138491bb9.jpg', 'read', 'sentmessage', '2023-04-14 23:19:43'),
(81, 478, 'On Demand', 164, 159, '[{\"message_id\":1,\"user_massage\":\"Hello testing 5\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 21:19:43\"},{\"message_id\":2,\"user_massage\":\"uploads/1681507213CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"uploads/1681507213CHAT.jpeg\",\"created_at\":\"2023-04-14 21:20:16\"},{\"message_id\":3,\"user_massage\":\"uploads/1681507222CHAT.jpeg\",\"data_type\":\"image\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"uploads/1681507222CHAT.jpeg\",\"created_at\":\"2023-04-14 21:20:23\"}]', 'rn_image_picker_lib_temp_1147b8c2-c6a8-4ce4-8454-3d4138491bb9.jpg', 'notread', 'newmessage', '2023-04-14 23:19:44'),
(82, 94, 'Petroling Service', 159, 164, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:26:14\"},{\"message_id\":2,\"user_massage\":\" Hey\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:29:26\"},{\"message_id\":3,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:29:45\"},{\"message_id\":4,\"user_massage\":\"Hello \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:30:45\"},{\"message_id\":5,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:31:10\"},{\"message_id\":6,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-17 19:50:28\"}]', 'Hi', 'notread', 'newmessage', '2023-04-15 00:26:14'),
(83, 94, 'Petroling Service', 164, 159, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:26:14\"},{\"message_id\":2,\"user_massage\":\" Hey\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:29:26\"},{\"message_id\":3,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:29:45\"},{\"message_id\":4,\"user_massage\":\"Hello \",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:30:45\"},{\"message_id\":5,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-14 22:31:10\"},{\"message_id\":6,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-17 19:50:28\"}]', 'Hi', 'read', 'sentmessage', '2023-04-15 00:26:15'),
(84, 479, 'On Demand', 164, 159, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-15 19:30:32\"},{\"message_id\":2,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-15 19:30:46\"}]', 'Hello', 'notread', 'newmessage', '2023-04-15 21:30:32'),
(85, 479, 'On Demand', 159, 164, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"164\",\"reciever_id\":\"159\",\"data_resource\":\"None\",\"created_at\":\"2023-04-15 19:30:32\"},{\"message_id\":2,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"159\",\"reciever_id\":\"164\",\"data_resource\":\"None\",\"created_at\":\"2023-04-15 19:30:46\"}]', 'Hello', 'read', 'sentmessage', '2023-04-15 21:30:33'),
(86, 495, 'On Demand', 165, 170, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"165\",\"reciever_id\":\"170\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:55:22\"},{\"message_id\":2,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:55:46\"}]', 'Hello', 'notread', 'newmessage', '2023-04-27 22:55:22'),
(87, 495, 'On Demand', 170, 165, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"165\",\"reciever_id\":\"170\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:55:22\"},{\"message_id\":2,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:55:46\"}]', 'Hello', 'read', 'sentmessage', '2023-04-27 22:55:23'),
(88, 496, 'On Demand', 170, 165, '[{\"message_id\":1,\"user_massage\":\"Hey\",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:58:13\"},{\"message_id\":2,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"165\",\"reciever_id\":\"170\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:58:45\"},{\"message_id\":3,\"user_massage\":\"Checked In \",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:59:06\"},{\"message_id\":4,\"user_massage\":\"Hello testing \",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 21:05:52\"}]', 'Hello testing ', 'read', 'sentmessage', '2023-04-27 22:58:13'),
(89, 496, 'On Demand', 165, 170, '[{\"message_id\":1,\"user_massage\":\"Hey\",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:58:13\"},{\"message_id\":2,\"user_massage\":\"Hi\",\"data_type\":\"text\",\"sender_id\":\"165\",\"reciever_id\":\"170\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:58:45\"},{\"message_id\":3,\"user_massage\":\"Checked In \",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 20:59:06\"},{\"message_id\":4,\"user_massage\":\"Hello testing \",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-27 21:05:52\"}]', 'Hello testing ', 'notread', 'newmessage', '2023-04-27 22:58:13'),
(90, 497, 'On Demand', 165, 170, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"165\",\"reciever_id\":\"170\",\"data_resource\":\"None\",\"created_at\":\"2023-04-28 18:12:59\"},{\"message_id\":2,\"user_massage\":\"Hello testing 2\",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-28 18:13:16\"}]', 'Hello testing 2', 'notread', 'newmessage', '2023-04-28 20:12:59'),
(91, 497, 'On Demand', 170, 165, '[{\"message_id\":1,\"user_massage\":\"Hello\",\"data_type\":\"text\",\"sender_id\":\"165\",\"reciever_id\":\"170\",\"data_resource\":\"None\",\"created_at\":\"2023-04-28 18:12:59\"},{\"message_id\":2,\"user_massage\":\"Hello testing 2\",\"data_type\":\"text\",\"sender_id\":\"170\",\"reciever_id\":\"165\",\"data_resource\":\"None\",\"created_at\":\"2023-04-28 18:13:16\"}]', 'Hello testing 2', 'read', 'sentmessage', '2023-04-28 20:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `content`, `purpose`, `created_at`) VALUES
(8, 162, 'Your account has been debited for $80 as guard has finished job', 'order', '2023-01-28 12:15:17'),
(9, 87, 'Hello 71', 'order', '2023-01-28 12:15:17'),
(10, 87, 'test', 'promo', '2023-01-28 12:15:17'),
(11, 87, 'test', 'promo', '2023-01-28 12:15:17'),
(12, 87, 'Laraib', 'promo', '2023-01-28 12:15:17'),
(13, 87, 'Laraib', 'promo', '2023-01-28 12:15:17'),
(14, 87, 'Laraib K bare bare Lulle', 'promo', '2023-01-28 12:15:17'),
(15, 87, 'Hello ', 'order', '2023-01-28 12:15:17'),
(16, 87, 'Hello Zeeshan Guard', 'promo', '2023-01-28 12:15:17'),
(17, 69, 'Hello Indivduals Account', 'promo', '2023-01-28 12:15:17'),
(18, 71, 'Hello Indivduals Account', 'promo', '2023-01-28 12:15:17'),
(19, 80, 'test chowkidar', 'promo', '2023-01-28 12:15:17'),
(20, 87, 'Hello Company', 'order', '2023-01-28 12:15:17'),
(21, 117, 'fgh', 'promo', '2023-02-28 12:02:41'),
(22, 117, 'gggg', 'order', '2023-02-28 12:03:37'),
(23, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-06 18:37:12'),
(24, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-06 18:58:20'),
(25, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-06 18:58:29'),
(26, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-07 21:44:29'),
(27, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 08:51:33'),
(28, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 11:38:59'),
(29, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 12:02:26'),
(30, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 13:21:09'),
(31, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 13:21:12'),
(32, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 13:21:32'),
(33, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 13:22:10'),
(34, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 13:23:02'),
(35, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 13:28:00'),
(36, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 13:28:59'),
(37, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-08 13:30:32'),
(38, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-10 10:32:33'),
(39, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:10:46'),
(40, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:14:04'),
(41, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:17:42'),
(42, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:18:45'),
(43, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:18:58'),
(44, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:19:06'),
(45, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:19:16'),
(46, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:19:24'),
(47, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:19:31'),
(48, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:19:40'),
(49, 162, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:21:35'),
(50, 148, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 22:29:00'),
(51, 164, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 23:16:59'),
(52, 164, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-14 23:21:41'),
(53, 164, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-15 21:31:57'),
(54, 164, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-19 22:26:37'),
(55, 164, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-19 22:26:48'),
(56, 164, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-19 22:26:59'),
(57, 167, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-19 22:27:07'),
(58, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-27 10:42:52'),
(59, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-27 12:17:59'),
(60, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-27 22:53:30'),
(61, 115, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-27 22:54:31'),
(62, 165, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-27 22:56:02'),
(63, 165, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-27 23:06:21'),
(64, 165, 'Your account has been debited for $100 as job has been compelted.', 'Payment', '2023-04-28 20:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `on_demand_guard_response`
--

CREATE TABLE `on_demand_guard_response` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `guard_response` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `on_demand_request`
--

CREATE TABLE `on_demand_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_of_location` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `end_location` varchar(500) DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `promoCode_id` int(255) DEFAULT NULL,
  `discounted_amount` double NOT NULL DEFAULT 0,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `on_demand_request`
--

INSERT INTO `on_demand_request` (`id`, `user_id`, `name_of_location`, `location`, `end_location`, `additional_notes`, `image`, `video`, `promoCode_id`, `discounted_amount`, `amount`, `status`, `created_at`) VALUES
(491, 115, 'Test', '{\"latitude\":24.916217682383508,\"longitude\":67.08063025027514}', '{\"latitude\":24.9049061,\"longitude\":67.0783969}', 'Test', NULL, NULL, 0, 0, '100', 'completed', '2023-04-27 10:41:24'),
(492, 115, 'Lucky one', '{\"latitude\":24.936193174652917,\"longitude\":67.08475582301617}', '{\"latitude\":24.8631812,\"longitude\":67.0537895}', 'Jaldi ajao', NULL, NULL, 0, 0, '100', 'completed', '2023-04-27 11:54:57'),
(493, 115, 'Sareena mobile market', '{\"latitude\":24.955610983824208,\"longitude\":67.06089589744806}', '{\"latitude\":24.8631781,\"longitude\":67.0537975}', 'Idhr ao bacha', NULL, NULL, 0, 0, '100', 'completed', '2023-04-27 11:55:19'),
(494, 115, 'Gulshan e iqbal', '{\"latitude\":24.915397906304953,\"longitude\":67.09627993404865}', '{\"latitude\":24.9049395,\"longitude\":67.0784039}', 'Yaha bh ao', NULL, NULL, 0, 0, '100', 'completed', '2023-04-27 11:55:43'),
(495, 165, 'Office', '{\"latitude\":24.8631839,\"longitude\":67.0537983}', '{\"latitude\":24.8631818,\"longitude\":67.0537963}', 'Come to me', NULL, NULL, 0, 0, '100', 'completed', '2023-04-27 22:52:28'),
(496, 165, 'Office', '{\"latitude\":24.8631839,\"longitude\":67.0537983}', '{\"latitude\":24.8631784,\"longitude\":67.0537958}', 'Come to me', NULL, NULL, 0, 0, '100', 'completed', '2023-04-27 22:56:30'),
(497, 165, 'Test ', '{\"latitude\":24.8631839,\"longitude\":67.0537983}', '{\"latitude\":24.8631848,\"longitude\":67.0537904}', 'Test', NULL, NULL, 0, 0, '100', 'completed', '2023-04-28 20:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL COMMENT 'This is id from user table for only those who are vendor or rid it self',
  `amount` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL DEFAULT '0',
  `type` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `vendor_id`, `amount`, `fee`, `type`, `created_at`) VALUES
(1, 75, '100', '0', 'On Demand', '2023-02-16 11:54:20'),
(3, 75, '25', '0', 'Petroling Service', '2023-02-16 11:54:20'),
(4, 75, '150', '0', 'Standing Security', '2023-02-16 11:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `promo_code`, `percentage`, `created_at`, `start_date_time`, `end_date_time`, `vendor_id`) VALUES
(1, '00001', '20', '2023-02-16 11:52:59', '2023-02-28 11:52:59', '2023-04-20 11:52:59', 75);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_job`
--

CREATE TABLE `schedule_job` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guard_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `Start_Date_Time` datetime NOT NULL,
  `End_Date_Time` datetime DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'engaged',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schedule_job`
--

INSERT INTO `schedule_job` (`id`, `user_id`, `guard_id`, `task_id`, `Start_Date_Time`, `End_Date_Time`, `type`, `status`, `created_at`) VALUES
(1117, 115, 117, 95, '2023-04-27 13:00:00', NULL, 'Petroling Service', 'engaged', '2023-04-27 12:22:04'),
(1118, 115, 117, 95, '2023-05-04 13:00:00', NULL, 'Petroling Service', 'engaged', '2023-04-27 12:22:04'),
(1119, 115, 117, 96, '2023-04-27 13:00:00', NULL, 'Petroling Service', 'completed', '2023-04-27 12:26:10'),
(1120, 115, 117, 96, '2023-05-04 13:00:00', NULL, 'Petroling Service', 'engaged', '2023-04-27 12:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `security_service_contract`
--

CREATE TABLE `security_service_contract` (
  `id` int(11) NOT NULL,
  `contract` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `security_service_contract`
--

INSERT INTO `security_service_contract` (`id`, `contract`) VALUES
(1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `test_crone`
--

CREATE TABLE `test_crone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test_crone`
--

INSERT INTO `test_crone` (`id`, `name`) VALUES
(1, 'testing'),
(2, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL DEFAULT '0',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `type`, `transaction_id`, `amount`, `created_at`) VALUES
(21, 118, 'credit', '625825133_2328021826', '50', '2023-02-28 10:18:26'),
(22, 118, 'credit', '668802365_2328021904', '100', '2023-02-28 10:19:04'),
(23, 118, 'credit', '1878408812_2328022012', '1000', '2023-02-28 10:20:12'),
(24, 118, 'credit', '433433642_2328022431', '200', '2023-02-28 10:24:31'),
(25, 118, 'credit', '1850414473_2328022551', '0', '2023-02-28 10:25:51'),
(26, 118, 'credit', '686656032_2328022725', '0', '2023-02-28 10:27:25'),
(27, 118, 'credit', '965243146_2328023856', '5', '2023-02-28 10:38:56'),
(28, 115, 'credit', '15365495_2328024555', '424', '2023-02-28 11:45:55'),
(29, 115, 'credit', '840333306_2328025536', '0', '2023-02-28 11:55:36'),
(30, 115, 'credit', '31889437_2328025720', '0', '2023-02-28 11:57:20'),
(31, 115, 'credit', '939980757_2328020103', '0', '2023-02-28 12:01:03'),
(32, 115, 'credit', '1153953794_2328021806', '0', '2023-02-28 12:18:06'),
(33, 115, 'credit', '411705728_2328024301', '26', '2023-02-28 13:43:01'),
(34, 115, 'credit', '1834818122_2301033811', '1000', '2023-03-01 08:38:11'),
(35, 115, 'credit', '377902776_2301032940', '50', '2023-03-01 09:29:40'),
(36, 115, 'credit', '1911018744_2301033048', '0', '2023-03-01 09:30:48'),
(37, 115, 'credit', '481771535_2301033127', '100', '2023-03-01 09:31:27'),
(38, 115, 'credit', '1877496099_2301033230', '100', '2023-03-01 09:32:30'),
(39, 115, 'credit', '877264115_2301033352', '200', '2023-03-01 09:33:52'),
(40, 115, 'credit', '283658429_2302033429', '1000', '2023-03-02 07:34:29'),
(41, 115, 'credit', '1531035831_2302035443', '100', '2023-03-02 07:54:43'),
(42, 115, 'credit', '1646880807_2302033510', '1000', '2023-03-02 08:35:10'),
(43, 115, 'credit', '1551125016_2302033542', '1000', '2023-03-02 08:35:42'),
(44, 115, 'credit', '486169163_2302033735', '12', '2023-03-02 08:37:35'),
(45, 115, 'credit', '1537049585_2302033751', '20', '2023-03-02 08:37:51'),
(46, 115, 'credit', '1994595919_2302033856', '1000', '2023-03-02 08:38:56'),
(47, 115, 'credit', '1697597359_2302033930', '7000', '2023-03-02 08:39:30'),
(48, 115, 'credit', '1732240705_2302034028', '1000', '2023-03-02 08:40:28'),
(49, 115, 'credit', '1237536858_2302034029', '1000', '2023-03-02 08:40:29'),
(50, 115, 'credit', '1052885121_2302034057', '8', '2023-03-02 08:40:57'),
(51, 115, 'credit', '1772372569_2302034058', '8', '2023-03-02 08:40:58'),
(52, 115, 'credit', '1428330516_2302034256', '2', '2023-03-02 08:42:56'),
(53, 115, 'credit', '947193590_2302034259', '2', '2023-03-02 08:42:59'),
(54, 115, 'credit', '1813660421_2302034615', '8', '2023-03-02 08:46:15'),
(55, 115, 'credit', '839417870_2302034737', '70', '2023-03-02 08:47:37'),
(56, 115, 'credit', '1254373255_2302034808', '70', '2023-03-02 08:48:08'),
(57, 146, 'credit', '494864945_2302032333', '700', '2023-03-02 14:23:33'),
(58, 146, 'credit', '102380576_2302032356', '300', '2023-03-02 14:23:56'),
(59, 146, 'credit', '395540336_2302035416', '100', '2023-03-02 14:54:16'),
(60, 148, 'credit', '2091894171_2310034026', '100', '2023-03-10 21:40:26'),
(61, 119, 'credit', '284802666_2316032034', '200', '2023-03-16 18:20:34'),
(62, 154, 'credit', '929374932_2316032018', '500', '2023-03-16 23:20:18'),
(63, 115, 'debit', '66099237_2317035642', '100', '2023-03-17 09:56:42'),
(64, 115, 'debit', '830768284_2317035642', '100', '2023-03-17 09:56:42'),
(65, 115, 'debit', '1180439587_2317035642', '100', '2023-03-17 09:56:42'),
(66, 115, 'debit', '854641063_2317033210', '100', '2023-03-17 14:32:10'),
(67, 115, 'debit', '665201111_2317033349', '100', '2023-03-17 15:33:49'),
(68, 115, 'credit', '821350759_2317031923', '222', '2023-03-17 16:19:23'),
(69, 154, 'debit', '696696514_2317032535', '0', '2023-03-17 23:25:35'),
(70, 115, 'debit', '466789988_2320033153', '100', '2023-03-20 14:31:53'),
(71, 115, 'debit', '1425791661_2320033242', '80', '2023-03-20 14:32:42'),
(72, 115, 'credit', '1056539657_2320034422', '100', '2023-03-20 15:44:22'),
(73, 115, 'credit', '1434882881_2320034430', '100', '2023-03-20 15:44:30'),
(74, 115, 'credit', '370749339_2320034513', '100', '2023-03-20 15:45:13'),
(75, 115, 'credit', '289802841_2320034705', '200', '2023-03-20 15:47:05'),
(76, 115, 'debit', '2071857437_2320031132', '100', '2023-03-20 16:11:32'),
(77, 115, 'credit', '1077030268_2320033112', '8', '2023-03-20 16:31:12'),
(78, 115, 'credit', '1453174714_2320033133', '50', '2023-03-20 16:31:33'),
(79, 115, 'debit', '1264826591_2323034801', '80', '2023-03-23 07:48:01'),
(80, 154, 'debit', '1116790936_2323035045', '0', '2023-03-23 07:50:45'),
(81, 115, 'debit', '387216803_2323030244', '100', '2023-03-23 08:02:44'),
(82, 115, 'debit', '607002645_2323032704', '100', '2023-03-23 08:27:04'),
(83, 157, 'credit', '922736456_2324034931', '4000', '2023-03-24 12:49:31'),
(84, 157, 'debit', '1981006744_2324030421', '100', '2023-03-24 16:04:21'),
(85, 157, 'debit', '1183529849_2325033710', '100', '2023-03-25 15:37:10'),
(86, 157, 'debit', '1628914972_2327031428', '100', '2023-03-27 14:14:28'),
(87, 157, 'debit', '1858504192_2327031733', '100', '2023-03-27 14:17:33'),
(88, 115, 'debit', '965532110_2327035132', '100', '2023-03-27 17:51:32'),
(89, 157, 'debit', '129280220_2327034559', '100', '2023-03-27 18:45:59'),
(90, 157, 'debit', '253923943_2328035253', '100', '2023-03-28 09:52:53'),
(91, 115, 'debit', '1251186018_2330030526', '100', '2023-03-30 07:05:26'),
(92, 115, 'debit', '2137489171_2330034333', '100', '2023-03-30 08:43:33'),
(93, 117, 'debit', '2718923_2330030308', '100', '2023-03-30 11:03:08'),
(94, 115, 'debit', '112487933_2331033136', '100', '2023-03-31 09:31:36'),
(95, 115, 'debit', '324935964_2331033503', '100', '2023-03-31 09:35:03'),
(96, 115, 'debit', '516033673_2331033538', '100', '2023-03-31 09:35:38'),
(97, 115, 'debit', '1937763338_2304045715', '100', '2023-04-04 11:57:15'),
(98, 115, 'debit', '1367423076_2304045716', '100', '2023-04-04 11:57:16'),
(99, 115, 'debit', '730576894_2305040327', '80', '2023-04-05 12:03:27'),
(100, 115, 'debit', '1595973860_2305042204', '80', '2023-04-05 12:22:04'),
(101, 115, 'debit', '58097155_2305042258', '100', '2023-04-05 18:22:58'),
(102, 115, 'debit', '1107784766_2305042345', '100', '2023-04-05 18:23:45'),
(103, 115, 'debit', '1574308504_2305043355', '100', '2023-04-05 18:33:55'),
(104, 115, 'debit', '2083450736_2305043952', '100', '2023-04-05 18:39:52'),
(105, 115, 'debit', '188484830_2305044100', '100', '2023-04-05 18:41:00'),
(106, 115, 'debit', '1994613378_2305044607', '100', '2023-04-05 18:46:07'),
(107, 115, 'debit', '1576017953_2305044824', '100', '2023-04-05 18:48:24'),
(108, 115, 'debit', '639651056_2305045030', '100', '2023-04-05 18:50:30'),
(109, 115, 'debit', '2121211268_2305045321', '100', '2023-04-05 18:53:21'),
(110, 115, 'debit', '409787761_2305045438', '100', '2023-04-05 18:54:38'),
(111, 160, 'credit', '70236518_2306044302', '10000', '2023-04-06 07:43:02'),
(112, 160, 'debit', '125577253_2306044636', '100', '2023-04-06 07:46:36'),
(113, 115, 'debit', '1491169294_2306044417', '100', '2023-04-06 09:44:17'),
(114, 115, 'debit', '1992254233_2306040429', '100', '2023-04-06 13:04:29'),
(115, 161, 'credit', '223103518_2306044838', '10000', '2023-04-06 16:48:39'),
(116, 161, 'debit', '2084551641_2306041955', '100', '2023-04-06 17:19:55'),
(117, 162, 'credit', '1856798156_2306042442', '5000', '2023-04-06 18:24:42'),
(118, 162, 'debit', '53978905_2306042824', '80', '2023-04-06 18:28:24'),
(119, 162, 'debit', '1432778955_2306043712', '100', '2023-04-06 18:37:12'),
(120, 162, 'debit', '1611253203_2306045820', '100', '2023-04-06 18:58:20'),
(121, 162, 'debit', '15827190_2306045829', '100', '2023-04-06 18:58:29'),
(122, 162, 'credit', '847512375_2306045918', '500', '2023-04-06 18:59:18'),
(123, 162, 'credit', '900611429_2306045519', '5000', '2023-04-06 20:55:19'),
(124, 162, 'debit', '531843638_2307044429', '100', '2023-04-07 21:44:29'),
(125, 115, 'debit', '17722561_2308045133', '100', '2023-04-08 08:51:33'),
(126, 115, 'debit', '1981233509_2308043859', '100', '2023-04-08 11:38:59'),
(127, 115, 'debit', '1960564891_2308040226', '100', '2023-04-08 12:02:26'),
(128, 115, 'debit', '490980184_2308042109', '100', '2023-04-08 13:21:09'),
(129, 115, 'debit', '1938561797_2308042112', '100', '2023-04-08 13:21:12'),
(130, 115, 'debit', '1502701345_2308042132', '100', '2023-04-08 13:21:32'),
(131, 115, 'debit', '519895337_2308042210', '100', '2023-04-08 13:22:10'),
(132, 115, 'debit', '1160166098_2308042302', '100', '2023-04-08 13:23:02'),
(133, 115, 'debit', '187951972_2308042800', '100', '2023-04-08 13:28:00'),
(134, 115, 'debit', '1084988334_2308042859', '100', '2023-04-08 13:28:59'),
(135, 162, 'debit', '1803398346_2308043032', '100', '2023-04-08 13:30:32'),
(136, 115, 'debit', '1897758880_2310043233', '100', '2023-04-10 10:32:33'),
(137, 162, 'debit', '76295048_2314041046', '100', '2023-04-14 22:10:46'),
(138, 162, 'debit', '1800670390_2314041404', '100', '2023-04-14 22:14:04'),
(139, 162, 'debit', '100471989_2314041742', '100', '2023-04-14 22:17:42'),
(140, 162, 'debit', '1863723631_2314041845', '100', '2023-04-14 22:18:45'),
(141, 162, 'debit', '554499693_2314041858', '100', '2023-04-14 22:18:58'),
(142, 162, 'debit', '1712012328_2314041906', '100', '2023-04-14 22:19:06'),
(143, 162, 'debit', '1729573096_2314041916', '100', '2023-04-14 22:19:16'),
(144, 162, 'debit', '786669715_2314041924', '100', '2023-04-14 22:19:24'),
(145, 162, 'debit', '1567139969_2314041931', '100', '2023-04-14 22:19:31'),
(146, 162, 'debit', '1075710093_2314041940', '100', '2023-04-14 22:19:40'),
(147, 162, 'debit', '1831022788_2314042135', '100', '2023-04-14 22:21:35'),
(148, 148, 'debit', '1825561290_2314042900', '100', '2023-04-14 22:29:00'),
(149, 164, 'credit', '295281762_2314041314', '50000', '2023-04-14 23:13:14'),
(150, 164, 'debit', '812494146_2314041659', '100', '2023-04-14 23:16:59'),
(151, 164, 'debit', '1509704066_2314042141', '100', '2023-04-14 23:21:41'),
(152, 164, 'debit', '389450409_2315043157', '100', '2023-04-15 21:31:57'),
(153, 164, 'credit', '1264387198_2317041445', '500', '2023-04-18 00:14:45'),
(154, 167, 'credit', '296583675_2319041811', '1000', '2023-04-19 22:18:11'),
(155, 164, 'debit', '1811589445_2319042637', '100', '2023-04-19 22:26:37'),
(156, 164, 'debit', '1677032723_2319042648', '100', '2023-04-19 22:26:48'),
(157, 164, 'debit', '24839924_2319042659', '100', '2023-04-19 22:26:59'),
(158, 167, 'debit', '1582349732_2319042707', '100', '2023-04-19 22:27:07'),
(159, 165, 'credit', '1979749131_2319045051', '1000', '2023-04-19 23:50:51'),
(160, 168, 'credit', '1701818272_2320043948', '1000', '2023-04-20 02:39:48'),
(161, 169, 'credit', '2095786058_2320045850', '1000', '2023-04-20 02:58:50'),
(162, 115, 'debit', '160580166_2327044252', '100', '2023-04-27 10:42:52'),
(163, 115, 'debit', '1377165063_2327041759', '100', '2023-04-27 12:17:59'),
(164, 115, 'debit', '773184071_2327045330', '100', '2023-04-27 22:53:30'),
(165, 115, 'debit', '556041319_2327045431', '100', '2023-04-27 22:54:31'),
(166, 165, 'debit', '825263981_2327045602', '100', '2023-04-27 22:56:02'),
(167, 165, 'debit', '1695376935_2327040621', '100', '2023-04-27 23:06:21'),
(168, 165, 'debit', '88571733_2328041458', '100', '2023-04-28 20:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL COMMENT '0 for admin, 1 for individual, 2 for company, 3 for vendor, 4 for guard',
  `provider_company` int(11) DEFAULT 75 COMMENT '75 is Grid id which is super admin',
  `business_name` varchar(255) DEFAULT NULL COMMENT 'only for company',
  `company_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `company_direct_contact_person_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_alter_phone` varchar(255) DEFAULT NULL,
  `standing_service_per_hour_charge` varchar(255) DEFAULT NULL,
  `per_petrol_charge` varchar(255) DEFAULT NULL,
  `company_license_document` varchar(255) DEFAULT NULL,
  `insurance_document` varchar(255) DEFAULT NULL,
  `auto_insurance_document` varchar(255) DEFAULT NULL,
  `w9_Form_document` varchar(255) DEFAULT NULL,
  `state_operating_license_document` varchar(255) DEFAULT NULL,
  `user_agreement_document` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `notification_token` varchar(255) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active',
  `current_location` varchar(250) DEFAULT NULL,
  `Wallaet_Balance` varchar(255) NOT NULL DEFAULT '0',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `provider_company`, `business_name`, `company_name`, `first_name`, `last_name`, `service`, `company_direct_contact_person_name`, `email`, `username`, `phone`, `company_alter_phone`, `standing_service_per_hour_charge`, `per_petrol_charge`, `company_license_document`, `insurance_document`, `auto_insurance_document`, `w9_Form_document`, `state_operating_license_document`, `user_agreement_document`, `password`, `address`, `zipcode`, `country`, `profile`, `notification_token`, `social_id`, `status`, `current_location`, `Wallaet_Balance`, `created_at`) VALUES
(75, 0, 75, 'Texas', 'Grid', 'Nathan', 'admin', NULL, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '0', '2023-02-20 07:58:18'),
(115, 2, 75, 'Danny', NULL, 'Daniel', 'Smith', NULL, NULL, 'laraibriaz8889@gmail.com', 'Laraib', '1212122121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 'Uk', '6969', 'Uraa', '202303291021Company_Profile.jpg', '7bd0d0ca-58bb-4748-888b-e3d45c7c911d', '107519220196271424279', 'active', NULL, '11260', '2023-02-23 10:06:49'),
(116, 1, 75, NULL, NULL, 'Andy', 'Andersion', NULL, NULL, 'Andy@gmail.com', 'johndoe', '9860649709', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test1234', 'sbchajjzKakzka', '74900', 'Belgium', NULL, '42f7d4f8-a8f1-446f-9e42-f20acaf3c8e2', '107242646244046110185', 'active', NULL, '0', '2023-02-23 10:20:36'),
(117, 4, 75, NULL, NULL, 'John', 'Smith', 'armed', NULL, 'john@gmail.com', 'sami7741', '03131313222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'john12345', '34 Meade Ave', '000', 'Miami Florida', '202304055922Guard_Profile.jpg', '3a2aa552-9f9e-44b2-b0e1-141223ebb142', NULL, 'active', '{\"latitude\":39.2622585,\"longitude\":-120.9728495}', '-100', '2023-02-23 10:35:41'),
(118, 1, 75, NULL, NULL, 'Laraib', 'Laraib', NULL, NULL, 'Laraib@gmail.com', 'Laraib', '4994949494', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Xbxbxbxb', 'b9999', '9bbbb', NULL, '99e4cafa-579c-4749-b4fb-2bf751294d75', 'null', 'active', NULL, '1355', '2023-02-23 10:38:51'),
(119, 1, 75, NULL, NULL, 'james', 'wood', NULL, NULL, 's.shahbaz.51200@gmail.com', 'yooo', '6464644646', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', '6464644646', '46464', 'shshsh', '202303165204Individual_Profile.jpg', '0fc126ab-cc59-4b83-822e-7d67878cb2a6', '101046513007072496047', 'active', NULL, '200', '2023-02-25 11:26:49'),
(120, 1, 75, NULL, NULL, 'laraib', 'Xnxnx', NULL, NULL, 'individual@gmail.com', 'Individual', '4645484548', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', '4645484548', '9994', 'Bssb', '202303015554Individual_Profile.jpg', '3d8ef4ee-8599-4408-a164-122a7b592bba', 'null', 'active', NULL, '0', '2023-03-01 12:27:12'),
(121, 1, 75, NULL, NULL, 'Yo', 'Shhs', NULL, NULL, 'Dbsh@gmail.com', 'Sbsbsb', '7979799949', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Zbsbbs', '59959', 'Dbdbdb', NULL, '3d8ef4ee-8599-4408-a164-122a7b592bba', 'null', 'active', NULL, '0', '2023-03-01 13:18:31'),
(122, 1, 75, NULL, NULL, 'Laraib', 'Champu', NULL, NULL, 'Hay@gmail.com', 'Me nhh btaon ga', '0312345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Hdhd', '2880', 'Jsvsgd', NULL, '3d8ef4ee-8599-4408-a164-122a7b592bba', 'null', 'active', NULL, '0', '2023-03-01 13:26:21'),
(123, 2, 75, 'Obhost', NULL, NULL, NULL, NULL, NULL, 'check@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:30:32'),
(124, 2, 75, 'Obhost', NULL, NULL, NULL, NULL, NULL, 'check1@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:32:21'),
(125, 1, 75, 'Obhost', NULL, NULL, NULL, NULL, NULL, 'check21@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:34:40'),
(126, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check22@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:38:49'),
(127, 1, 75, 'obhost', NULL, NULL, NULL, NULL, NULL, 'check25@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:40:03'),
(128, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check28@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:41:01'),
(129, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check29@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:42:51'),
(130, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check30@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:48:58'),
(131, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check31@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:53:11'),
(132, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check32@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:53:50'),
(133, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check33@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:56:30'),
(134, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check34@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 13:58:08'),
(135, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check35@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:02:52'),
(136, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check36@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:03:34'),
(137, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check37@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:04:11'),
(138, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check38@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:05:32'),
(139, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check39@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:08:51'),
(140, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check40@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:10:19'),
(141, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check41@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:10:55'),
(142, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check42@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:12:54'),
(143, 1, 75, NULL, NULL, '', '', NULL, NULL, 'check43@gmail.com', 'obhost', '0311111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'obhost120', 'gulshan', '1784', 'pakistan', NULL, 'APA91bFoi3lMMre9G3', NULL, 'active', NULL, '0', '2023-03-01 14:15:14'),
(144, 1, 75, NULL, NULL, 'Zbzb', 'Dbb', NULL, NULL, 'Bzzbh@gmail.com', 'Snsnn', '4494679494', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Sbsb', '7949', 'Sbsb', NULL, '3d8ef4ee-8599-4408-a164-122a7b592bba', 'null', 'active', NULL, '0', '2023-03-01 14:18:44'),
(145, 1, 75, NULL, NULL, 'Otrig', 'Carter', NULL, NULL, 'carter.otrig@gmail.com', 'Carter.otrig', '3055258192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 'Down town ', '33334', 'United States ', NULL, 'f9a07abf-a50e-427a-8539-f3d9cb4f598e', '100684191030885332269', 'active', NULL, '0', '2023-03-01 23:05:27'),
(146, 1, 75, NULL, NULL, 'Babu', 'Rao', NULL, NULL, 'Baburao@gmail.com', 'BabuBhaiya', '3422224234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Shamshan ghat andher nagri', '6969', 'Pluto', '202303023102Individual_Profile.jpg', '484bfc77-0bd1-44e9-96b4-1e529a37760c', 'null', 'active', NULL, '1100', '2023-03-02 14:23:11'),
(147, 2, 75, 'Zbzb', NULL, NULL, NULL, NULL, NULL, 'Bdbdb@gmail.com', 'Sbsbzsbsbbsbb', '4949949494', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', 'Shhs', '59949', 'Zbbz', NULL, 'abf4255f-7b13-48b5-a674-2529ffd187d9', 'null', 'active', NULL, '0', '2023-03-09 11:59:12'),
(148, 1, 75, NULL, NULL, 'Smith', 'Donald', NULL, NULL, 'donald@techlabsteam.com', 'Donald ', '3025258192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 'Down Town', '33334', 'United States ', NULL, '84904f23-11ac-4077-acec-ea8698681eee', '112623238782516086190', 'active', NULL, '0', '2023-03-10 21:38:13'),
(149, 1, 75, NULL, NULL, 'Laraib', 'Boii', NULL, NULL, 'larib@gmail.com', 'Laraib', '1234879794', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Shhsb', '79797', 'Zbsb', NULL, 'e7e8a4ad-f08e-4cf8-8fef-e804375d54ab', 'null', 'active', NULL, '0', '2023-03-13 20:04:56'),
(150, 2, 75, 'Ckmpo', NULL, NULL, NULL, NULL, NULL, 'Shsjj@gnail.com', 'Ssbsb', '4979797976', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Xbzbzb', '59898', 'Dbdbdb', NULL, 'e7e8a4ad-f08e-4cf8-8fef-e804375d54ab', 'null', 'active', NULL, '0', '2023-03-13 20:19:18'),
(151, 1, 75, NULL, NULL, 'indi', 'Vidual', NULL, NULL, 'ducket@gmail.com', 'Individual', '1212121212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Uk', '12345', 'Uk', NULL, 'e12dfb99-fc9c-4fa7-b378-a4a2d3fc3bbb', 'null', 'active', NULL, '0', '2023-03-13 22:51:18'),
(152, 2, 75, 'Laliga', NULL, NULL, NULL, NULL, NULL, 'messi@gmail.com', 'Messi', '1212121211', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Uk', '12121', 'Uk', NULL, 'e12dfb99-fc9c-4fa7-b378-a4a2d3fc3bbb', 'null', 'active', NULL, '0', '2023-03-13 22:52:56'),
(153, 1, 75, NULL, NULL, 'Daniel', 'Smirh', NULL, NULL, 'daniel@gmail.com', 'daniel', '0359959595', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test1234', 'Test', '98959', 'USA', NULL, '234d4ef1-a555-4b28-8153-3bf09d917f74', 'null', 'active', NULL, '0', '2023-03-13 22:54:01'),
(154, 1, 75, NULL, NULL, 'Donald ', 'Trump ', NULL, NULL, 'betaxperts@gmail.com', 'Donald@techlabsteam.com', '3025258192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123qwe123', 'Downtown', '33331', 'US', NULL, '566efb84-a563-4031-a217-574a24db6968', 'null', 'active', NULL, '500', '2023-03-16 23:17:47'),
(155, 2, 75, 'COMPI', NULL, NULL, NULL, NULL, NULL, 'company@gmail.com', 'Compi', '7997794949', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Dhdj', '866', 'Dbdb', NULL, 'afbf1005-1f1f-4d1e-a051-c7368cef64af', 'null', 'active', NULL, '0', '2023-03-21 13:37:24'),
(156, 1, 75, NULL, NULL, 'Zbb', 'Sbb', NULL, NULL, 'Dbdb@gnail.com', 'Sbsb', '4949494949', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Hhshsh', '49949', 'Dbdbd', NULL, 'fe27be19-cada-4d63-a9c7-75123704a950', 'null', 'active', NULL, '0', '2023-03-22 11:09:25'),
(157, 1, 75, NULL, NULL, 'Solu', 'Singh', NULL, NULL, 'Farzam@gmail.com', 'Hshsh', '4949464946', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', '4949464946', '49944', 'Zbsbb', '202303254307Individual_Profile.jpg', '35eefdac-ce90-45e4-af66-9435e880bacb', 'null', 'active', NULL, '3400', '2023-03-24 10:59:27'),
(160, 2, 75, 'Farzam', NULL, NULL, NULL, NULL, NULL, 'frzamn64ml@gmail.com', 'Fdff', '2636666666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 'Ggg', '5666', 'Vggg', NULL, 'e6bf13ae-11bd-4ec8-a67a-c576c47ebfde', '105061496312539900347', 'active', NULL, '9900', '2023-04-06 07:41:33'),
(161, 1, 75, NULL, NULL, 'Lara', 'Lara', NULL, NULL, 'laraibriaz2020@gmail.com', 'Lara', '4949494994', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Sbsbsb', '95656', 'Dbdbrb', '202304064120Individual_Profile.jpg', '35eefdac-ce90-45e4-af66-9435e880bacb', 'null', 'active', NULL, '9900', '2023-04-06 16:39:43'),
(162, 1, 75, NULL, NULL, 'Jordan', 'James', NULL, NULL, 'jordan@gmail.com', 'jordan', '2398989898', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test1234', 'Testing', '65959', 'USA', '202304062703Individual_Profile.png', '067a56ce-e244-4e91-b53d-1d8b27daefbe', 'null', 'active', NULL, '8820', '2023-04-06 18:23:11'),
(163, 1, 75, NULL, NULL, 'Danny', 'daniels', NULL, NULL, 'danny@gmail.com', 'dann', '8995959599', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test1234', 'Test', '64995', 'undefined', NULL, '234d4ef1-a555-4b28-8153-3bf09d917f74', 'null', 'active', NULL, '0', '2023-04-07 20:36:36'),
(164, 1, 75, NULL, NULL, 'Richard', 'Gibson', NULL, NULL, 'richardagibson94@gmail.com', 'Richard Gibson', '3025258191', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Richardgibson321', '3025258191', '33334', 'undefined', '202304145255Individual_Profile.jpg', '81463520-1491-4569-98f5-8953c9c73599', 'null', 'active', NULL, '49900', '2023-04-14 23:11:00'),
(165, 2, 75, 'Get Secured Now', NULL, NULL, NULL, NULL, NULL, 'tylermike611@gmail.com', 'Mike Tyler', '3025258196', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Miketyler321', 'Downtown Houston', '33334', 'undefined', NULL, '7156123b-eb11-4c9c-9ecf-8c4432e16848', 'null', 'active', NULL, '700', '2023-04-15 02:08:55'),
(166, 2, 75, 'ABC apartments', NULL, NULL, NULL, NULL, NULL, 'Nmcguire@grideconomy.com', 'abctest', '5303204302', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guardian1', 'Smith st', '95959', 'undefined', NULL, 'aae4ddda-bb0d-426d-a9d7-0df43075c9d8', 'null', 'active', NULL, '0', '2023-04-19 21:53:07'),
(167, 1, 75, NULL, NULL, 'Frank', 'Clark', NULL, NULL, 'frank.clarklord@gmail.com', 'frankclark', '3027224378', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', '3027224378', '33334', 'undefined', NULL, '47916ea8-f313-4be7-b34e-610d600989b6', 'null', 'active', NULL, '900', '2023-04-19 22:16:20'),
(168, 1, 75, NULL, NULL, 'Customer', 'test', NULL, NULL, 'customer@gmail.com', 'customertest', '3212875440', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', 'Houston', '33334', 'US', NULL, 'bc2cc838-5252-4e3a-b9be-dd1ea0a860f5', NULL, 'active', NULL, '1000', '2023-04-19 23:03:38'),
(169, 1, 75, NULL, NULL, 'Forman', 'Made', NULL, NULL, 'Forman@gmail.com', 'Forman', '3035258199', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', 'Houston', '33334', 'US', NULL, '258a1b55-5e5c-480e-808b-793d5c18ed46', NULL, 'active', NULL, '1000', '2023-04-20 02:52:10'),
(170, 4, 75, NULL, NULL, 'Guard', 'Test', 'armed', NULL, 'Guardtest@gmail.com', 'Guardtest', '3045258198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test12345', 'Houston', NULL, 'US', '202320045342Guard_Image.jpg', '6a4980dc-8f8b-4eff-b206-e9f2e325ed6a', NULL, 'active', '{\"latitude\":24.8631857,\"longitude\":67.053791}', '0', '2023-04-20 02:53:42'),
(171, 4, 75, NULL, NULL, 'Guard', 'Test', 'armed', NULL, 'Guard12345@gmail.com', 'Guard12345', '3095258197', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test12345', 'Houston', NULL, 'Us', '202320045507Guard_Image.jpg', NULL, NULL, 'active', NULL, '0', '2023-04-20 02:55:07'),
(172, 1, 75, NULL, NULL, 'Skksk', 'Snsnsn', NULL, NULL, 'Bsbsh@gmail.com', 'Sbsb', '4848494944', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Karachi Pakistan', '12221', 'undefined', NULL, '8f95fc7e-99fe-463f-9875-a1c7df20d76c', 'null', 'active', NULL, '0', '2023-04-26 16:43:25'),
(173, 1, 75, NULL, NULL, 'Sjdj', 'Shs', NULL, NULL, 'Dhdjdj@gmail.xom', 'Dhshhdd', '4956664465', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', 'Karachi Pakistan', '55555', 'undefined', NULL, '8f95fc7e-99fe-463f-9875-a1c7df20d76c', 'null', 'active', NULL, '0', '2023-04-26 17:14:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_request`
--
ALTER TABLE `accept_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_bank`
--
ALTER TABLE `add_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_petroling_service`
--
ALTER TABLE `add_petroling_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_post_service`
--
ALTER TABLE `add_post_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_report_data`
--
ALTER TABLE `add_report_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_report_for_schedule`
--
ALTER TABLE `add_report_for_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_standing_security`
--
ALTER TABLE `add_standing_security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_vacational_petrol`
--
ALTER TABLE `add_vacational_petrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_request`
--
ALTER TABLE `assign_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted_account_log`
--
ALTER TABLE `deleted_account_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `end_job_for_schedule`
--
ALTER TABLE `end_job_for_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guard_documentation`
--
ALTER TABLE `guard_documentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guard_status`
--
ALTER TABLE `guard_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_demand_guard_response`
--
ALTER TABLE `on_demand_guard_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_demand_request`
--
ALTER TABLE `on_demand_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_job`
--
ALTER TABLE `schedule_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_service_contract`
--
ALTER TABLE `security_service_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_crone`
--
ALTER TABLE `test_crone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accept_request`
--
ALTER TABLE `accept_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=764;

--
-- AUTO_INCREMENT for table `add_bank`
--
ALTER TABLE `add_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `add_petroling_service`
--
ALTER TABLE `add_petroling_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `add_post_service`
--
ALTER TABLE `add_post_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `add_report_data`
--
ALTER TABLE `add_report_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `add_report_for_schedule`
--
ALTER TABLE `add_report_for_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `add_standing_security`
--
ALTER TABLE `add_standing_security`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `add_vacational_petrol`
--
ALTER TABLE `add_vacational_petrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assign_request`
--
ALTER TABLE `assign_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deleted_account_log`
--
ALTER TABLE `deleted_account_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `end_job_for_schedule`
--
ALTER TABLE `end_job_for_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guard_documentation`
--
ALTER TABLE `guard_documentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `guard_status`
--
ALTER TABLE `guard_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `on_demand_guard_response`
--
ALTER TABLE `on_demand_guard_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `on_demand_request`
--
ALTER TABLE `on_demand_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_job`
--
ALTER TABLE `schedule_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1121;

--
-- AUTO_INCREMENT for table `security_service_contract`
--
ALTER TABLE `security_service_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_crone`
--
ALTER TABLE `test_crone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
