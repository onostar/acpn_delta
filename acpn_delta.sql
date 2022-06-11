-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 10:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acpn_delta`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `tdate` date NOT NULL,
  `pharmacy_name` varchar(50) NOT NULL,
  `depositor_name` varchar(50) NOT NULL,
  `depositor_position` varchar(50) NOT NULL,
  `supretendent_pharmacist` varchar(50) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `pharmacist_email` varchar(255) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `payment_ref` varchar(50) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `payment_evidence` varchar(100) NOT NULL,
  `pcn_payment` varchar(100) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `receipt_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tdate`, `pharmacy_name`, `depositor_name`, `depositor_position`, `supretendent_pharmacist`, `payment_method`, `pharmacist_email`, `bank`, `payment_ref`, `amount_paid`, `payment_evidence`, `pcn_payment`, `payment_status`, `receipt_number`) VALUES
(5, '2022-04-12', 'Test pharmacy', '', '', 'Kelly Ikpefua', 'Online Payment', 'onostarkels@gmail.com', '', '', 0, 'beans-with-plantain.jpg', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `pharmacist_class` varchar(255) NOT NULL,
  `first_time_reg` varchar(255) NOT NULL,
  `previous_place` varchar(255) NOT NULL,
  `previous_address` varchar(255) NOT NULL,
  `previous_director` varchar(255) NOT NULL,
  `previous_director_contact` varchar(255) NOT NULL,
  `position_held` varchar(255) NOT NULL,
  `resignation` varchar(1024) NOT NULL,
  `acceptance` varchar(1024) NOT NULL,
  `fellow` varchar(255) NOT NULL,
  `pharmacist` varchar(50) NOT NULL,
  `pharmacist_passport` varchar(200) NOT NULL,
  `pharmacist_email` varchar(50) NOT NULL,
  `pharmacist_address` varchar(100) NOT NULL,
  `pharmacy_name` varchar(50) NOT NULL,
  `pharmacy_address` varchar(100) NOT NULL,
  `contact_gender` varchar(50) NOT NULL,
  `contact_pcn_reg` varchar(50) NOT NULL,
  `contact_birth_date` date NOT NULL,
  `contact_next_of_kin` varchar(50) NOT NULL,
  `contact_next_of_kin_phone` varchar(15) NOT NULL,
  `contact_next_of_kin_address` varchar(100) NOT NULL,
  `pharmacy_exist` varchar(50) NOT NULL,
  `pharmacy_location` varchar(50) NOT NULL,
  `practice_type` varchar(50) NOT NULL,
  `pharmacy_director` varchar(50) NOT NULL,
  `pharmacist_director_phone` varchar(255) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_password`, `pharmacist_class`, `first_time_reg`, `previous_place`, `previous_address`, `previous_director`, `previous_director_contact`, `position_held`, `resignation`, `acceptance`, `fellow`, `pharmacist`, `pharmacist_passport`, `pharmacist_email`, `pharmacist_address`, `pharmacy_name`, `pharmacy_address`, `contact_gender`, `contact_pcn_reg`, `contact_birth_date`, `contact_next_of_kin`, `contact_next_of_kin_phone`, `contact_next_of_kin_address`, `pharmacy_exist`, `pharmacy_location`, `practice_type`, `pharmacy_director`, `pharmacist_director_phone`, `registration_number`, `registration_date`) VALUES
(2, 'admin', '12345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(13, '07068897068', '425716', 'Superintendent Pharmacist', 'Yes', 'Efe Samtex Pharmacy', '23 Sapele Road Benin', 'Moses London', '08012233445', 'Head Pharmacist', '', '', 'No', 'Kelly Ikpefua', 'chef pee.png', 'onostarkels@gmail.com', '27 Father Hilly Street Off Ometan Road', 'Test pharmacy', '23 benin road', 'Female', '1089787', '1981-02-10', 'Victory Ilpefua', '07057456881', '27 seple raod', 'Existing Pharmacy', 'Bomadi', 'Retail', 'Godwin oguas', '08035716496', '080808', '2022-04-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
