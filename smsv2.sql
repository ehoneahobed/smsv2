-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 07:20 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smsv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `date` varchar(25) NOT NULL,
  `expenses_desc` text NOT NULL,
  `total_cost` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `expenses_desc`, `total_cost`) VALUES
(1, '07/26/2019', 'something', '75'),
(2, '07/26/2019', 'Electricity bill', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `inv_no` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `inv_no`, `customer_name`, `total_amount`, `date`) VALUES
(55, 444, 'kwame', '8888', '2019-07-11'),
(56, 444, 'kwame', '8888', '2019-07-11'),
(57, 444, 'kwame', '8888', '2019-07-11'),
(58, 444, 'kwame', '8888', '2019-07-11'),
(59, 444, 'kwame', '8888', '2019-07-11'),
(60, 444, 'kwame', '8888', '2019-07-11'),
(61, 444, 'knl', '8888', '0000-00-00'),
(62, 444, 'knl', '8888', '0000-00-00'),
(63, 444, 'jbvkd', '8888', '0000-00-00'),
(64, 444, 'Obed Ehoneah', '8888', '0000-00-00'),
(65, 444, 'Kwesi Mends', '8888', '0000-00-00'),
(66, 444, 'bkxv', '8888', '0000-00-00'),
(67, 444, 'ogjok', '07/12/2019', '0000-00-00'),
(68, 444, 'ddddddddddddd', '07/12/2019', '0000-00-00'),
(69, 444, 'yufgjhb', '8888', '0000-00-00'),
(70, 444, 'kjbhcdf', '8888', '07/12/2019'),
(71, 444, 'Kwesi', '8888', '07/18/2019'),
(72, 444, 'Yaw', '8888', '07/18/2019'),
(73, 444, 'jj', '8888', '07/18/2019'),
(74, 444, 'nnn', '8888', '07/18/2019'),
(75, 444, 'nlknvdl', '8888', '07/18/2019'),
(76, 444, 'man', '8888', '07/18/2019');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `item_desc` varchar(100) NOT NULL,
  `cost_price` varchar(50) NOT NULL,
  `selling_price` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_desc`, `cost_price`, `selling_price`, `qty`, `added_date`) VALUES
(1, 'Test1', '14', '16', '-30', '2019-07-11'),
(2, 'test2', '15', '17', '20', '2019-07-11'),
(4, 'item 3', '45', '47', '15', '2019-07-18'),
(10, 'item 4', '12', '15', '10', '2019-07-18'),
(11, 'item 5', '89', '90', '24', '2019-07-18'),
(13, 'poooods', '12', '15', '6', '2019-07-19'),
(14, 'jjjjjjjjjjj', '46', '645', '521', '2019-07-19'),
(15, 'uuuuuuuu', '10', '65', '46', '2019-07-19'),
(18, 'obed', '45', '46', '6', '2019-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `inv_id` int(11) NOT NULL,
  `item_desc` varchar(100) NOT NULL,
  `cost_price` varchar(100) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `inv_id`, `item_desc`, `cost_price`, `selling_price`, `qty`, `amount`) VALUES
(1, 45, 'HKKKK', 'Array', 64, 54, 4),
(2, 46, 'HKKKK', 'Array', 64, 54, 4),
(3, 47, 'papers', 'Array', 85, 4758, 74),
(4, 48, 'papers', 'Array', 85, 4758, 74),
(5, 49, 'papers', 'Array', 85, 4758, 74),
(6, 50, 'papers', 'Array', 85, 4758, 74),
(7, 51, 'papers', '1425', 85, 4758, 74),
(8, 52, 'cup', '654', 654, 65, 65),
(9, 53, 'rubber', '5555', 6544, 5654, 65546),
(10, 54, 'cups', '654', 654, 65, 65),
(11, 56, 'rubberbbbbbbbbbb', '5555', 6544, 5654, 65546),
(12, 56, 'cupsjgkjjjbbbbbb', '5555', 654, 65, 65),
(13, 57, 'rubberbbbbbbbbbb', '5555', 6544, 5654, 65546),
(14, 57, 'cupsjgkjjjbbbbbb', '5555', 654, 65, 65),
(15, 58, 'rubberbbbbbbbbbb', '5555', 6544, 5654, 65546),
(16, 58, 'cupsjgkjjjbbbbbb', '5555', 654, 65, 65),
(17, 59, 'rubberbbbbbbbbbb', '5555', 6544, 5654, 65546),
(18, 59, 'cupsjgkjjjbbbbbb', '5555', 654, 65, 65),
(19, 60, 'rubberbbbbbbbbbb', '5555', 6544, 5654, 65546),
(20, 60, 'cupsjgkjjjbbbbbb', '5555', 654, 65, 65),
(21, 61, 'nojhnov', '6', 56, 456, 651),
(22, 62, 'nkcnd', '6523', 654, 645, 654),
(23, 63, 'aaaaaaaa', '623', 6, 56, 78546),
(24, 64, 'Test1', '5', 2, 65, 130),
(25, 65, 'test2', '', 0, 0, 0),
(26, 66, 'hhgggggg', '', 0, 0, 0),
(27, 67, 'jbkv', '', 0, 0, 0),
(28, 68, 'ihknfpg', '', 0, 0, 0),
(29, 69, 'fuhgkj', '', 0, 0, 0),
(30, 70, 'bjkcjkf', '', 0, 0, 0),
(31, 71, 'test2', '15', 17, 2, 34),
(32, 72, 'Test1', '14', 16, 10, 160),
(33, 73, 'Test1', '14', 16, 20, 320),
(34, 74, 'Test1', '14', 16, 15, 240),
(35, 75, 'Test1', '14', 16, 1, 16),
(36, 76, 'test2', '15', 17, 5, 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
