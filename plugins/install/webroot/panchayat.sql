-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2012 at 08:53 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.3-1ubuntu9.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test-garama`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_name`) VALUES
(1, 'கணக்கு எண் 1'),
(2, 'கணக்கு எண் 2'),
(3, 'கணக்கு எண் 3'),
(4, 'கணக்கு எண் 4'),
(5, 'கணக்கு எண் 5'),
(6, 'கணக்கு எண் 6');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE IF NOT EXISTS `attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_number` bigint(20) NOT NULL,
  `job_card_number` bigint(20) NOT NULL,
  `attendance_register_id` bigint(20) NOT NULL,
  `no_of_days_worked` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attendances`
--


-- --------------------------------------------------------

--
-- Table structure for table `attendance_registers`
--

CREATE TABLE IF NOT EXISTS `attendance_registers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workdetail_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount_per_head` double NOT NULL,
  `amount_paid` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attendance_registers`
--


-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE IF NOT EXISTS `bank_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `acc_openning_year` date NOT NULL,
  `acc_closing_year` date NOT NULL,
  `account_number` bigint(20) NOT NULL,
  `bank_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opening_cash_balance` double NOT NULL,
  `opening_bank_balance` double NOT NULL,
  `closing_cash_balance` double NOT NULL,
  `closing_bank_balance` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bank_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`) VALUES
(1, 'வீட்டு வரி ரசீது'),
(2, 'தொழில் வரி ரசீது'),
(3, 'பொது  ரசீது');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE IF NOT EXISTS `book_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `company_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `book_number` bigint(20) NOT NULL,
  `start_receipt_number` bigint(20) NOT NULL,
  `end_receipt_number` bigint(20) NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `book_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `cash_books`
--

CREATE TABLE IF NOT EXISTS `cash_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `opening_date` date NOT NULL,
  `opening_cash` double NOT NULL,
  `opening_bank` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cash_books`
--


-- --------------------------------------------------------

--
-- Table structure for table `cash_to_banks`
--

CREATE TABLE IF NOT EXISTS `cash_to_banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_detail_id` int(11) NOT NULL,
  `transfer_date` date NOT NULL,
  `transfer_amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cash_to_banks`
--


-- --------------------------------------------------------

--
-- Table structure for table `contract_bill_estimations`
--

CREATE TABLE IF NOT EXISTS `contract_bill_estimations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_number` bigint(20) NOT NULL,
  `voucher_number` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contractor_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estimation_amt` double NOT NULL,
  `workdone_amt` double NOT NULL,
  `cement` double NOT NULL,
  `steel` double NOT NULL,
  `door` double NOT NULL,
  `windows` double NOT NULL,
  `toilet_basin` double NOT NULL,
  `emd` double NOT NULL,
  `it` double NOT NULL,
  `scst` double NOT NULL,
  `ec` double NOT NULL,
  `vat` double NOT NULL,
  `lwf` double NOT NULL,
  `deduction_amt` double NOT NULL,
  `cheque_amt` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contract_bill_estimations`
--


-- --------------------------------------------------------

--
-- Table structure for table `dotax_receipts`
--

CREATE TABLE IF NOT EXISTS `dotax_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_date` date NOT NULL,
  `receipt_number` int(11) NOT NULL,
  `demand_number` int(11) NOT NULL,
  `door_number` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `emd` double NOT NULL,
  `do_pending` double NOT NULL,
  `do_current` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dotax_receipts`
--


-- --------------------------------------------------------

--
-- Table structure for table `do_demands`
--

CREATE TABLE IF NOT EXISTS `do_demands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demand_number` int(11) NOT NULL,
  `demand_date` date NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emd` double NOT NULL,
  `do_pending` double NOT NULL,
  `do_current` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `do_demands`
--


-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employees`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE IF NOT EXISTS `employee_salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salary_id` int(11) NOT NULL,
  `employee_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employee_designation` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employee_pay` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employee_salaries`
--


-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `header_id` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `voucher_number` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expense_amount` double NOT NULL,
  `drawee_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cheque_number` bigint(20) NOT NULL,
  `cheque_date` date NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `expenses`
--


-- --------------------------------------------------------

--
-- Table structure for table `hamlets`
--

CREATE TABLE IF NOT EXISTS `hamlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hamlet_code` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hamlet_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hamlets`
--


-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

CREATE TABLE IF NOT EXISTS `headers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `header_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `header_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `receipt` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `headers`
--


-- --------------------------------------------------------

--
-- Table structure for table `housetax_receipts`
--

CREATE TABLE IF NOT EXISTS `housetax_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_date` date NOT NULL,
  `receipt_number` int(11) NOT NULL,
  `demand_number` int(11) NOT NULL,
  `door_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hamlet_id` int(11) NOT NULL,
  `survey_number` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `square_feet_estimation` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ht_pending` double NOT NULL,
  `ht_current` double NOT NULL,
  `lc_pending` double NOT NULL,
  `lc_current` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `housetax_receipts`
--


-- --------------------------------------------------------

--
-- Table structure for table `ht_demands`
--

CREATE TABLE IF NOT EXISTS `ht_demands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demand_number` int(11) NOT NULL,
  `demand_date` date NOT NULL,
  `door_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hamlet_id` int(11) NOT NULL,
  `ht_pending` double NOT NULL,
  `ht_current` double NOT NULL,
  `lc_pending` double NOT NULL,
  `lc_current` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ht_demands`
--


-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE IF NOT EXISTS `incomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `header_id` int(11) NOT NULL,
  `income_date` date NOT NULL,
  `income_amount` double NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `incomes`
--


-- --------------------------------------------------------

--
-- Table structure for table `jobcards`
--

CREATE TABLE IF NOT EXISTS `jobcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nregs_stock_id` int(11) NOT NULL,
  `jobcard_date` date NOT NULL,
  `jobcard_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `jobcards`
--


-- --------------------------------------------------------

--
-- Table structure for table `nmr_rolls`
--

CREATE TABLE IF NOT EXISTS `nmr_rolls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_date` date NOT NULL,
  `starting_roll_no` bigint(20) NOT NULL,
  `ending_roll_no` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nmr_rolls`
--


-- --------------------------------------------------------

--
-- Table structure for table `nregs_registrations`
--

CREATE TABLE IF NOT EXISTS `nregs_registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_number` int(11) NOT NULL,
  `job_card_number` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_or_husband_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hamlet_id` int(11) NOT NULL,
  `sex` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `community` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ration_card_number` int(20) NOT NULL,
  `voter_id_number` int(20) NOT NULL,
  `bank_account_number` bigint(20) NOT NULL,
  `bank_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_branch` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `application_date` date NOT NULL,
  `job_card_issue_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nregs_registrations`
--


-- --------------------------------------------------------

--
-- Table structure for table `nregs_stocks`
--

CREATE TABLE IF NOT EXISTS `nregs_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nregs_stocks`
--


-- --------------------------------------------------------

--
-- Table structure for table `others_receipts`
--

CREATE TABLE IF NOT EXISTS `others_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_date` date NOT NULL,
  `receipt_number` bigint(20) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `header_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `others_receipts`
--


-- --------------------------------------------------------

--
-- Table structure for table `professionaltax_receipts`
--

CREATE TABLE IF NOT EXISTS `professionaltax_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_date` date NOT NULL,
  `receipt_number` int(11) NOT NULL,
  `demand_number` int(11) NOT NULL,
  `door_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hamlet_id` int(11) NOT NULL,
  `company_name` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `half_yearly_income` double NOT NULL,
  `part1_pending` double NOT NULL,
  `part1_current` double NOT NULL,
  `part2_pending` double NOT NULL,
  `part2_current` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `professionaltax_receipts`
--


-- --------------------------------------------------------

--
-- Table structure for table `pt_demands`
--

CREATE TABLE IF NOT EXISTS `pt_demands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demand_number` int(11) NOT NULL,
  `demand_date` date NOT NULL,
  `door_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hamlet_id` int(11) NOT NULL,
  `company_name` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `half_yearly_income` double NOT NULL,
  `part1_pending` double NOT NULL,
  `part1_current` double NOT NULL,
  `part2_pending` double NOT NULL,
  `part2_current` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pt_demands`
--


-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_date` date NOT NULL,
  `company_name` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `voucher_number` bigint(20) NOT NULL,
  `cheque_number` bigint(20) NOT NULL,
  `cheque_date` date NOT NULL,
  `tax_amount` double NOT NULL,
  `total_amt` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `purchases`
--


-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE IF NOT EXISTS `purchase_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `opening_stock` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_rate` double NOT NULL,
  `item_tot_amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `purchase_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE IF NOT EXISTS `salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salary_date` date NOT NULL,
  `drawee_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `voucher_number` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cheque_number` bigint(20) NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `salaries`
--


-- --------------------------------------------------------

--
-- Table structure for table `scraps`
--

CREATE TABLE IF NOT EXISTS `scraps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scrap_detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `estimation_date` date NOT NULL,
  `estimation_amount` double NOT NULL,
  `tender_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tender_date` date NOT NULL,
  `tender_amount` double NOT NULL,
  `tender_confirmation_date` date NOT NULL,
  `tender_confirmation_amount` double NOT NULL,
  `tender_taken_by` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `scraps`
--


-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_name` (`item_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stocks`
--


-- --------------------------------------------------------

--
-- Table structure for table `stock_issues`
--

CREATE TABLE IF NOT EXISTS `stock_issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `closing_item_quantity` int(11) NOT NULL,
  `hand_over_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stock_issues`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tokenhash` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `tokenhash`, `active`) VALUES
(1, 'admin', 'k.sanmugam2@gmail.com', 'admin', 'f689cd43f789dd9589fb40e99eae01837c34c538', '9cdc0d9d072d2a1ed2f5d2c2af594c39c5f1d51c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `watertax_receipts`
--

CREATE TABLE IF NOT EXISTS `watertax_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_date` date NOT NULL,
  `receipt_number` int(11) NOT NULL,
  `demand_number` int(11) NOT NULL,
  `door_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hamlet_id` int(11) NOT NULL,
  `wt_pending` double NOT NULL,
  `wt_current` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `watertax_receipts`
--


-- --------------------------------------------------------

--
-- Table structure for table `workdetails`
--

CREATE TABLE IF NOT EXISTS `workdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` date NOT NULL,
  `name_of_work` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estimation_amount` double NOT NULL,
  `as_number` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `workdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `wt_demands`
--

CREATE TABLE IF NOT EXISTS `wt_demands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demand_number` int(11) NOT NULL,
  `demand_date` date NOT NULL,
  `door_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hamlet_id` int(11) NOT NULL,
  `wt_pending` double NOT NULL,
  `wt_current` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wt_demands`
--

