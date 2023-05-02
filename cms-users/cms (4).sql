-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 05:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_admin`
--

CREATE TABLE `cms_admin` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_admin`
--

INSERT INTO `cms_admin` (`name`, `email`, `password`, `profile_image`) VALUES
('Admin', 'cmsadmin@gmail.com', '000', 'images/adminProfile/admin-white.png');

-- --------------------------------------------------------

--
-- Table structure for table `cms_assign`
--

CREATE TABLE `cms_assign` (
  `assignID` int(11) NOT NULL,
  `complaintID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_assign`
--

INSERT INTO `cms_assign` (`assignID`, `complaintID`, `staffID`, `status`, `creationDate`) VALUES
(3, 12, 5, 'assigned', '2023-01-15 14:33:53'),
(5, 13, 9, 'assigned', '2023-01-19 19:20:39'),
(6, 14, 7, 'assigned', '2023-01-19 19:57:57'),
(7, 14, 7, 'assigned', '2023-01-22 16:27:02'),
(8, 14, 7, 'assigned', '2023-01-22 16:32:23'),
(9, 14, 7, 'assigned', '2023-01-22 16:34:02'),
(10, 14, 7, 'assigned', '2023-01-22 16:37:26'),
(11, 14, 10, 'assigned', '2023-01-22 16:47:59'),
(12, 14, 9, 'assigned', '2023-01-22 19:09:58'),
(13, 14, 10, 'assigned', '2023-01-22 19:12:56'),
(14, 18, 3, 'assigned', '2023-02-24 13:30:01'),
(15, 18, 3, 'assigned', '2023-02-24 15:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `cms_staff`
--

CREATE TABLE `cms_staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_staff`
--

INSERT INTO `cms_staff` (`staff_id`, `name`, `category`, `contact`, `image`, `status`) VALUES
(2, 'New Staff', 'category 1', '33333333333333', 'images/staff/New Staff33333333333333/', 'available'),
(3, 'Old Staff', 'category 4', '22556600', 'images/staff/Old Staff2222222222222222222/', 'busy'),
(4, 'bot', 'category 1', '0000000111111', 'images/staff/bot0000000111111/', 'available'),
(5, 'worker', 'category 2', '3333300000000', 'images/staff/worker3333300000000/', 'busy'),
(6, 'Employee5', 'category 4', '51111113333', 'images/staff/evil Employee51111113333/', 'busy'),
(7, 'Employee4', 'category 3', '55', 'images/staff/Riki55/', 'available'),
(8, 'Employee1', 'category 3', '00', 'images/staff/Godai00/', 'available'),
(9, 'Employee2', 'category 3', '0000', 'images/staff/Toraji0000/', 'available'),
(10, 'Employee3', 'category 3', '11', 'images/staff/Toraichi11/', 'busy'),
(11, 'Google employee', 'category 1', '0555515', 'images/staff/Google employee0555515/2021-12-29 18_34_31-Vita3K.exe - Shortcut.jpg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `location` varchar(500) NOT NULL,
  `evidenceImage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `email`, `category`, `subject`, `description`, `status`, `creationDate`, `location`, `evidenceImage`) VALUES
(12, 'xxx@gmail.com', 'category 2', 'Road Block', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 'pending', '2023-01-05 21:22:01', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'images/users/xxx/evidence/'),
(13, 'nekketsu333@gmail.com', 'category 3', 'Water Leakage', 'Water Leakage', 'fulfilled', '2023-01-19 19:06:45', 'Uptown', 'images/users/nekketsu333/evidence/2018-11-22 21_33_37-Citra Nightly _ HEAD-ad4097e.jpg'),
(14, 'nekketsu1992@gmail.com', 'category 3', 'Water pump burst', 'Water pump burst', 'requested', '2023-01-19 19:57:01', 'Downtown', 'images/users/nekketsu1992/evidence/'),
(15, 'nekketsu1992@gmail.com', 'category 2', 'Road repair needed', 'Road repair needed', 'fulfilled', '2023-01-22 20:52:45', 'Downtown', 'images/users/nekketsu1992/evidence/2020-01-26 00_02_58-kanshasai.jpg'),
(16, 'nekketsu333@gmail.com', 'category 3', 'Heavy rocks blocking road', 'Heavy rocks blocking road', 'pending', '2023-02-21 13:03:51', 'xxxxxx', 'images/users/nekketsu333/evidence/Tom Clancy\'s Ghost Recon Future Soldier™ 18-Nov-18 8_14_21 PM.png'),
(18, 'nekketsu333@gmail.com', 'category 4', 'Sewer maintenance required', 'Sewer maintenance required', 'pending', '2023-02-21 14:23:22', 'rrrr..............', 'images/users/nekketsu333/evidence/2018-12-06 15_47_21-Hex Editor - RAM_ 0x6A.jpg'),
(19, 'nekketsu333@gmail.com', 'category 3', 'Test Complaint', 'Just a test complaint', 'fulfilled', '2023-02-24 14:33:29', 'ffffffffffffffffffffffffffffffffffffffffffffffffffff', 'images/users/nekketsu333/evidence/'),
(20, 'www@gmail.com', 'category 2', 'Water pipeline leakage', 'There\'s a water pipeline leakage in our area. The streets are heavily affected by it.', 'requested', '2023-02-25 19:34:42', 'xxxxx street 5/12, xxxxx town', 'images/users/www/evidence/'),
(21, 'www@gmail.com', 'category 1', 'Drain Blockage', 'The drains in our area are blocked by garbage. It\'s causing water blockage.', 'pending', '2023-02-25 19:38:51', 'xxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxx', 'images/users/www/evidence/'),
(22, 'www@gmail.com', 'category 3', 'Road Damaged', 'Some roads in our area are heavily damaged. Vehicles are having difficulty driving on them.', 'fulfilled', '2023-02-25 19:48:33', 'xxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'images/users/www/evidence/'),
(23, 'www@gmail.com', 'category 4', 'Damaged electricity pole', ' An electricity pole in our area is damaged and there\'s a high risk of being electrocuted on near contact.', 'requested', '2023-02-25 20:01:13', 'xxxxxxx xxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxx', 'images/users/www/evidence/'),
(24, 'www@gmail.com', 'category 2', 'Water outage in pond', 'There\'s a crack causing water outage in a nearby pond. This also causing difficulty crossing the street with all the water.', 'rejected', '2023-02-25 20:07:24', 'xxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'images/users/www/evidence/'),
(25, 'www@gmail.com', 'category 3', 'Garbage dump full', 'Our nearby garbage dump is full and it is causing horrible smell and it may start cause various diseases soon. ', 'pending', '2023-02-25 20:37:23', 'xxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxx', 'images/users/www/evidence/');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `email`, `complaint_id`, `status`, `subject`, `message`, `creation_time`) VALUES
(1, 'nekketsu333@gmail.com', 18, 'info', 'ooooooooooo', 'Our staff Old Staff has been assigned for the following complaint: ooooooooooo', '2023-02-24 13:30:01'),
(2, 'nekketsu333@gmail.com', 19, 'rejected', 'Test Complaint', 'The following complaint: Test Complaint has been rejected by the administrator', '2023-02-24 14:33:49'),
(3, 'nekketsu333@gmail.com', 19, 'pending', 'Test Complaint', 'The following complaint: Test Complaint is being reviewed', '2023-02-24 14:46:44'),
(4, 'nekketsu333@gmail.com', 13, 'fulfilled', 'No opponents left', 'The following complaint: No opponents left has been resolved', '2023-02-24 14:55:29'),
(5, 'nekketsu333@gmail.com', 19, 'fulfilled', 'Test Complaint', 'The following complaint: <strong>Test Complaint</strong> has been resolved', '2023-02-24 15:03:55'),
(6, 'nekketsu333@gmail.com', 18, 'pending', 'ooooooooooo', 'The following complaint: <strong>ooooooooooo</strong> is being reviewed', '2023-02-24 15:04:20'),
(7, 'nekketsu333@gmail.com', 18, 'info', 'ooooooooooo', 'Our staff <strong>Old Staff</strong> has been assigned for the following complaint: <strong>ooooooooooo</strong>', '2023-02-24 15:07:01'),
(8, 'www@gmail.com', 21, 'pending', 'Drain Blockage', 'The following complaint: <strong>Drain Blockage</strong> is being reviewed', '2023-02-25 20:46:34'),
(9, 'www@gmail.com', 24, 'fulfilled', 'Water outage in pond', 'The following complaint: <strong>Water outage in pond</strong> has been resolved', '2023-02-25 20:47:01'),
(10, 'www@gmail.com', 24, 'rejected', 'Water outage in pond', 'The following complaint: <strong>Water outage in pond</strong> has been rejected by the administrator', '2023-02-25 20:47:48'),
(11, 'www@gmail.com', 22, 'fulfilled', 'Road Damaged', 'The following complaint: <strong>Road Damaged</strong> has been resolved', '2023-02-25 20:48:11'),
(12, 'www@gmail.com', 25, 'pending', 'Garbage dump full', 'The following complaint: <strong>Garbage dump full</strong> is being reviewed', '2023-02-25 20:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `userName` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `userName`, `password`, `phone`, `address`, `image`) VALUES
('aaa@gmail.com', 'aaa', 'Aaa.00000', '111111111', 'aaaaaaaaaaaaaaaaaaaaa', 'images/users/aaa/profilePicture/'),
('nekketsu1992@gmail.com', 'Kunio Kun', 'AAAA35%#dW', '11270', 'Downtown', 'images/users/nekketsu1992/profilePicture/'),
('nekketsu333@gmail.com', 'Rage', 'Barf!1127', '1127', 'Downtown', 'images/users/nekketsu333/profilePicture/3in1 (ES-Q800C)(FSS)_000.png'),
('rtx@gmail.com', 'nvidia', '...000Ad', '5090', '999999999', 'images/users/rtx/profilePicture/'),
('www@gmail.com', 'Vijay Kumar', 'w$dX53376', '9023331111', 'Some Place that exists', 'images/users/www/profilePicture/v3_0215736.jpg'),
('xxx@gmail.com', 'Riju Mistri', '000', '9875583471', '3/8 Jatin Das Nagar,Belgharia Kolkata', 'images/users/xxx/profilePicture/'),
('xxxxx@gmail.com', 'XXXXXX', 'Xxxx.1234', '878888', 'tagaefw', 'images/users/xxxxx/profilePicture/'),
('xyz@gmail.com', 'some other user', 'wwwwwwW5#', '55555509', 'oooooooooooo', 'images/users/xyz/profilePicture/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_admin`
--
ALTER TABLE `cms_admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `cms_assign`
--
ALTER TABLE `cms_assign`
  ADD PRIMARY KEY (`assignID`),
  ADD KEY `complaintID` (`complaintID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `cms_staff`
--
ALTER TABLE `cms_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `complaint_id` (`complaint_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_assign`
--
ALTER TABLE `cms_assign`
  MODIFY `assignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cms_staff`
--
ALTER TABLE `cms_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_assign`
--
ALTER TABLE `cms_assign`
  ADD CONSTRAINT `cms_assign_ibfk_1` FOREIGN KEY (`complaintID`) REFERENCES `complaint` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cms_assign_ibfk_2` FOREIGN KEY (`staffID`) REFERENCES `cms_staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
