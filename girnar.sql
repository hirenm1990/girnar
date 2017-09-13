-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2017 at 10:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `girnar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `phone2` varchar(20) CHARACTER SET utf8 NOT NULL,
  `account_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `phone2` varchar(20) CHARACTER SET utf8 NOT NULL,
  `weighbridge_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `weighbridge_reg_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `gst_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `iec_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lut_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pan_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `website` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE `containers` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `container_size` varchar(100) CHARACTER SET utf8 NOT NULL,
  `container_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `self_seal_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `line_seal_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gross weight` int(11) NOT NULL,
  `container_product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `container_product`
--

CREATE TABLE `container_product` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `gross_weight` double DEFAULT NULL,
  `net_weight` double DEFAULT NULL,
  `packag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `contract_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contract_date` date NOT NULL DEFAULT '0000-00-00',
  `surveyor_id` int(11) NOT NULL,
  `buyer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `buyer_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `notifier_party` varchar(255) CHARACTER SET utf8 NOT NULL,
  `consignee_party` varchar(255) CHARACTER SET utf8 NOT NULL,
  `delivery_terms_id` int(11) NOT NULL,
  `payment_terms_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_terms`
--

CREATE TABLE `delivery_terms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `permission_no` varchar(50) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hs_code` varchar(50) NOT NULL,
  `shortcode` varchar(50) NOT NULL,
  `dbk_scheme_no` varchar(50) NOT NULL DEFAULT '',
  `fob` varchar(50) NOT NULL DEFAULT '',
  `file_no` varchar(50) NOT NULL DEFAULT '',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sealing_details`
--

CREATE TABLE `sealing_details` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `invoice_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `invoice_date` date NOT NULL,
  `are_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `are_date` date NOT NULL,
  `dbk_rate` varchar(100) CHARACTER SET utf8 NOT NULL,
  `file_no` varchar(100) CHARACTER SET utf8 NOT NULL,
  `freight` varchar(100) CHARACTER SET utf8 NOT NULL,
  `extra_charge_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `extra_charge_amount` double NOT NULL,
  `examining_officer` varchar(100) CHARACTER SET utf8 NOT NULL,
  `supervision_officer` varchar(100) CHARACTER SET utf8 NOT NULL,
  `examined` varchar(100) CHARACTER SET utf8 NOT NULL,
  `container_markings` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment` varchar(100) CHARACTER SET utf8 NOT NULL,
  `shipment_code` varchar(100) CHARACTER SET utf8 NOT NULL,
  `shipment_notes` varchar(255) CHARACTER SET utf8 NOT NULL,
  `loading_port_id` int(11) NOT NULL,
  `discharge_port_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `destination_country_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isActive` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(255) NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `vgm_details`
--

CREATE TABLE `vgm_details` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `name_authorized` varchar(255) CHARACTER SET utf8 NOT NULL,
  `designation_authorized` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact_detail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `max_weight_csc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gross_mass` double DEFAULT NULL,
  `gross_method` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `gross_net` double DEFAULT NULL,
  `gross_tare` double DEFAULT NULL,
  `gross_packing` text CHARACTER SET utf8,
  `date_time` varchar(255) CHARACTER SET utf8 NOT NULL,
  `weight_slip_no` text CHARACTER SET utf8 NOT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `hazardous` varchar(255) CHARACTER SET utf8 NOT NULL,
  `booking` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `container_product`
--
ALTER TABLE `container_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_terms`
--
ALTER TABLE `delivery_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vgm_details`
--
ALTER TABLE `vgm_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `container_product`
--
ALTER TABLE `container_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_terms`
--
ALTER TABLE `delivery_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vgm_details`
--
ALTER TABLE `vgm_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
