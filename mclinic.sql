-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2022 at 12:54 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `scid` int(11) NOT NULL,
  `ClientID` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `department` text NOT NULL,
  `type` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `apstatus` text NOT NULL,
  `notes` text NOT NULL,
  `findings` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`scid`, `ClientID`, `name`, `phone`, `department`, `type`, `date`, `time`, `apstatus`, `notes`, `findings`, `created_at`, `updated_at`) VALUES
(1, '1', 'xtian', '', '', 'consultation', '2022-09-22', '08:17:00', 'approved', '', '', '2022-09-06 22:08:10', '2022-09-12 21:18:40'),
(2, '2', 'ffsdvs', '', '', 'dsv', '2022-09-22', '09:01:00', 'approved', '', '', '2022-09-06 22:25:12', '2022-09-12 21:18:40'),
(3, '1', 'christian', '231231', 'none', 'medical checkup', '2022-09-11', '10:05', 'approved', 'ewqefsgfb', '', '2022-09-08 21:05:26', '2022-09-12 21:18:40'),
(4, '3', 'christian', '213213', 'none', 'medical checkup', '2022-10-07', '08:10', 'approved', 'eqfeasdvf', '', '2022-09-08 21:08:14', '2022-09-12 21:19:24'),
(5, '1', 'christian', '', 'none', 'dental checkup', '2022-09-12', '11:49', 'approved', 'afsdfs', '', '2022-09-09 10:49:32', '2022-09-12 21:20:30'),
(6, '1', 'christian', '', '', '', '2022-09-23', '', 'approved', 'fgsrdnhgksgd', '', '2022-09-16 20:38:18', '2022-09-16 20:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `clinicstaff`
--

CREATE TABLE `clinicstaff` (
  `csid` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `picture` text NOT NULL,
  `schedule` text NOT NULL,
  `status` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinicstaff`
--

INSERT INTO `clinicstaff` (`csid`, `name`, `type`, `picture`, `schedule`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Angela Mendoza', 'College Physician', '', 'MONDAY; FRIDAY; ', 'ACTIVE', '2022-09-05 13:03:11', '2022-09-09 10:23:14'),
(2, 'Nikki Minaj', 'College Dentist', 'images/Screenshot (1).png', 'MONDAY; TUESDAY; WEDNESDAY; THURSDAY; ', 'ACTIVE', '2022-09-05 14:33:16', '2022-09-05 20:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `medelivery`
--

CREATE TABLE `medelivery` (
  `mid` int(11) NOT NULL,
  `medID` text NOT NULL,
  `quantity` text NOT NULL,
  `until` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medelivery`
--

INSERT INTO `medelivery` (`mid`, `medID`, `quantity`, `until`, `created_at`, `updated_at`) VALUES
(1, '1', '10', '12/22/2024', '2022-09-03 21:29:41', '2022-09-03 13:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `stocks` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `description`, `type`, `category`, `stocks`, `created_at`, `updated_at`) VALUES
(1, 'Medicol Advance', 'gamot sa sakit ng ulo', 'Capsule', 'Analgesics', '27', '2022-09-03 21:29:00', '2022-09-13 16:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `smed`
--

CREATE TABLE `smed` (
  `sid` int(11) NOT NULL,
  `scid` text NOT NULL,
  `name` text NOT NULL,
  `medID` text NOT NULL,
  `medname` text NOT NULL,
  `take` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smed`
--

INSERT INTO `smed` (`sid`, `scid`, `name`, `medID`, `medname`, `take`, `created_at`) VALUES
(1, '3', 'christian', '1', 'medicol advance', '1 every 4 hours', '2022-09-10 22:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `stocklogs`
--

CREATE TABLE `stocklogs` (
  `sid` int(11) NOT NULL,
  `name` text NOT NULL,
  `medID` text NOT NULL,
  `oldq` text NOT NULL,
  `type` text NOT NULL,
  `quantity` text NOT NULL,
  `validity` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocklogs`
--

INSERT INTO `stocklogs` (`sid`, `name`, `medID`, `oldq`, `type`, `quantity`, `validity`, `created_at`, `updated_at`) VALUES
(6, 'Medicol Advances', '', '24', 'inbound', '2', '2022-10-08', '2022-09-04 21:04:50', '0000-00-00 00:00:00'),
(7, 'Medicol Advances', '1', '26', 'inbound', '1', '2022-09-22', '2022-09-04 21:05:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `aid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`aid`, `name`, `email`, `password`, `token`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'christian', 'student', '$2y$10$kWUMvSfEYVnnxVVvokBgr.BRqc.T0nudG01UtdlDzcy0hJxa2mjHy', '$2y$10$kWUMvSfEYVnnxVVvokBgr.BRqc.T0nudG01UtdlDzcy0hJxa2mjHy', 'student', 'active', '2022-09-07 21:42:46', '2022-09-09 21:26:58'),
(2, 'christian', 'nurse', '$2y$10$kWUMvSfEYVnnxVVvokBgr.BRqc.T0nudG01UtdlDzcy0hJxa2mjHy', '$2y$10$kWUMvSfEYVnnxVVvokBgr.BRqc.T0nudG01UtdlDzcy0hJxa2mjHy', 'nurse', 'active', '2022-09-07 21:42:46', '2022-09-07 13:41:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `clinicstaff`
--
ALTER TABLE `clinicstaff`
  ADD PRIMARY KEY (`csid`);

--
-- Indexes for table `medelivery`
--
ALTER TABLE `medelivery`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smed`
--
ALTER TABLE `smed`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `stocklogs`
--
ALTER TABLE `stocklogs`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clinicstaff`
--
ALTER TABLE `clinicstaff`
  MODIFY `csid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medelivery`
--
ALTER TABLE `medelivery`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smed`
--
ALTER TABLE `smed`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stocklogs`
--
ALTER TABLE `stocklogs`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
