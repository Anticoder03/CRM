-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 01:26 PM
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
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `log_id` int(11) NOT NULL,
  `action_type` enum('created','updated','deleted') NOT NULL,
  `entity_type` enum('note','lead','task','customer') NOT NULL,
  `entity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `email`, `phone`, `company`, `address`, `created_at`) VALUES
(3, 'test2', 't', 'ap15381545@gmail.com', '1457896541', 'test', '05, Azad nagar dungrifaliya vapi', '2024-11-10 13:22:38'),
(5, 'test', 't', 'ap153821545@gmail.com', '1457896541', 'test', '05, Azad nagar dungrifaliya vapi', '2024-11-10 13:27:00'),
(6, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '09510050494', 'qseds', '05, Azad nagar dungrifaliya vapi', '2024-11-10 13:28:11'),
(7, 'Ashish', 'Prajapati', 'as5381545@gmail.com', '09510050494', 'sxsdvrdvf', '05, Azad nagar dungrifaliya vapi', '2024-11-10 13:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` enum('active','inactive','prospect') DEFAULT 'prospect',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `postal_code`, `country`, `tags`, `company_name`, `position`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '9510050494', '05, Azad nagar dungrifaliya vapi', 'vapi', 'Gujarat', '396195', 'India', 'VIP', 'comp 1', 'chairman', 'test note 1', 'prospect', '2024-11-08 10:13:22', '2024-11-26 20:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `lead_source` varchar(50) DEFAULT NULL,
  `lead_status` enum('new','contacted','qualified','converted','lost') DEFAULT 'new',
  `opportunity_value` decimal(10,2) DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `first_name`, `last_name`, `email`, `phone`, `company_name`, `position`, `lead_source`, `lead_status`, `opportunity_value`, `close_date`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'person2', 'last', 'person2@gmail.com', '1547896542', 'test2', 'test', 'web', 'qualified', 5000.00, '2024-11-19', 'test2', '2024-11-07 19:42:58', '2024-11-07 19:42:58'),
(3, 'test', '3', 'test3@gamil.com', '1547896532', 'test3', 'test3', 'ewb', 'new', 57813.00, '2024-11-28', 'test3', '2024-11-07 20:52:28', '2024-11-07 20:52:28'),
(4, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 145000.00, '2024-11-15', 'tests', '2024-11-07 20:53:44', '2024-11-07 20:53:44'),
(5, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 17000.00, '2024-11-15', 'tests', '2024-11-07 20:54:02', '2024-11-08 09:51:46'),
(6, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 185000.00, '2024-11-15', 'tests', '2024-11-07 20:54:02', '2024-11-08 09:52:03'),
(7, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 145000.00, '2024-11-15', 'tests', '2024-11-07 20:54:02', '2024-11-07 20:54:02'),
(8, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 115000.00, '2024-11-15', 'tests', '2024-11-07 20:54:02', '2024-11-08 09:53:19'),
(9, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 190000.00, '2024-11-15', 'tests', '2024-11-07 20:54:02', '2024-11-08 09:53:03'),
(10, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 165000.00, '2024-11-15', 'tests', '2024-11-07 20:54:02', '2024-11-08 09:52:47'),
(11, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 140000.00, '2024-11-15', 'tests', '2024-11-07 20:54:02', '2024-11-08 09:52:32'),
(12, 'test', 'test', 'test@gmail.com', '1457896523', 'tests', 'test', 'web', 'new', 125000.00, '2024-11-15', 'tests', '2024-11-07 20:54:02', '2024-11-08 09:52:20'),
(13, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '09510050494', 'rvmas', 'chairman', 'web', 'qualified', 12000.00, '2024-11-22', 'teas x', '2024-11-09 17:11:46', '2024-11-09 17:11:46'),
(14, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '09510050494', 'rvmas', 'test', 'web', 'converted', 11000.00, '2024-11-20', 'dfdffg', '2024-11-09 17:12:16', '2024-11-09 17:12:16'),
(15, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '09510050494', 'rvmas', 'test3', 'web', 'lost', 120500.00, '2024-11-21', 'qw', '2024-11-09 17:13:14', '2024-11-09 17:13:14'),
(16, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '09510050494', 'rvmas', 'test', 'web', 'converted', 154000.00, '2024-12-25', 'cfg', '2024-11-09 17:14:25', '2024-11-09 17:14:25'),
(17, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '09510050494', 'rvmas', '', '', 'lost', 0.00, '0000-00-00', '', '2024-11-09 17:16:20', '2024-11-09 17:16:20'),
(18, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '9510050494', 'test', 'chairman', 'web', 'qualified', 12000.00, '2024-11-28', 'no', '2024-11-28 20:17:24', '2024-11-28 20:17:24'),
(19, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '09510050494', 'test', 'test', 'web', 'contacted', 52000.00, '2024-11-26', 'no', '2024-11-28 20:21:17', '2024-11-28 20:21:17'),
(20, 'Ashish', 'Prajapati', 'ap5381545@gmail.com', '09510050494', 'rvmas', '', 'dv', 'qualified', 52520.00, '2024-11-23', 'no', '2024-11-28 20:22:08', '2024-11-28 20:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `associated_type` enum('customer','lead','task') NOT NULL,
  `associated_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` varchar(100) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `attachments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `title`, `content`, `associated_type`, `associated_id`, `created_by`, `created_at`, `updated_at`, `category`, `tags`, `attachments`) VALUES
(1, 'Notes 1', 'this is a note', 'task', 101, 1, '2024-12-02 18:00:01', '2024-12-02 18:00:01', 'sales', 'html,css,js', NULL),
(5, 'notes 4', 'this is notes 4', 'customer', 106, 1, '2024-12-02 18:16:14', '2024-12-02 18:16:14', 'none', 'customer,salse', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `sale_date` date DEFAULT NULL,
  `sale_amount` decimal(10,2) DEFAULT NULL,
  `sale_status` enum('pending','completed','cancelled') DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_date`, `sale_amount`, `sale_status`, `payment_method`, `notes`, `created_at`, `updated_at`) VALUES
(2, '2024-11-13', 150000.00, 'completed', 'Chekq', 'none2', '2024-11-09 13:31:22', '2024-11-09 13:56:38'),
(3, '2024-11-13', 15000.00, 'cancelled', 'Chekq', 'none2', '2024-11-09 13:31:52', '2024-11-09 13:51:30'),
(4, '2024-11-09', 12000.00, 'pending', 'Card', 'note', '2024-11-09 13:41:08', '2024-11-09 13:50:27'),
(5, '2024-11-09', 140000.00, 'completed', 'Cash', 'note x', '2024-11-09 15:42:48', NULL),
(6, '2024-11-09', 45000.00, 'pending', 'Cradit', 'note X+1', '2024-11-09 15:43:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `assigned_member` varchar(50) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `priority` enum('low','medium','high') DEFAULT 'medium',
  `status` enum('pending','in-progress','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reminder_sent` tinyint(1) DEFAULT 0,
  `email` varchar(100) DEFAULT NULL,
  `completion_percentage` int(3) DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `description`, `assigned_member`, `due_date`, `priority`, `status`, `created_at`, `reminder_sent`, `email`, `completion_percentage`, `updated_at`, `completed_at`) VALUES
(8, 'Task1', 'task', 'member2', '2024-11-29', 'high', 'in-progress', '2024-11-27 14:07:52', 0, 'member2@gmail.com', 0, NULL, NULL),
(9, 'Task2', 'task2', 'member3', '2024-11-28', 'medium', 'pending', '2024-11-27 14:08:21', 0, 'bfghfg@gmail.com', 0, NULL, NULL),
(10, 'Task3', 'task3', 'member2', '2024-11-30', 'high', 'pending', '2024-11-27 14:08:45', 0, 'mem3@gmail.com', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
