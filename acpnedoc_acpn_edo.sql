-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2022 at 10:58 PM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acpnedoc_acpn_edo`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
