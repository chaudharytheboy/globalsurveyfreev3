-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2019 at 07:02 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostingadmin_freev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` longtext DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL,
  `regular_price` varchar(100) DEFAULT NULL,
  `shipping` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `review_users` int(11) DEFAULT NULL,
  `reviews` varchar(255) DEFAULT NULL,
  `url_1` varchar(255) DEFAULT NULL,
  `url_2` varchar(255) DEFAULT NULL,
  `ct_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sort_order` int(11) NOT NULL,
  `img_popular` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `product_price`, `regular_price`, `shipping`, `quantity`, `images`, `review_users`, `reviews`, `url_1`, `url_2`, `ct_dt`, `sort_order`, `img_popular`) VALUES
(12, 'Offre spÃ©ciale un nouvel Samsung Galaxy S10Â©', 'Nouvelle offre!', '869.00', '1.50', '0.00', 3, 'images/products_image/13.png', 614, 'images/5-star.png', 'https://utxxqbi.com/path/out.php?b=1010', '', '2019-06-04 03:35:48', 1, ''),
(72, 'Obtenez Votre Samsung Galaxy S9Â©', 'Exclusif aux participants Ã  l\'enquÃªte seulement!', '869.99', '1.00', '0.00', 4, 'images/products_image/samsungS9.png', 590, NULL, 'https://utxxqbi.com/path/out.php?b=9999', '', '2019-06-04 03:33:28', 4, ''),
(75, 'Offre Speciale Un nouvel Samsung Galaxy WatchÂ©', 'Exclusif aux participants l\'enqute seulement!', '379.99', '1.00', '0.00', 4, 'images/products_image/samsungwatch3.png', 621, NULL, 'https://trk.adtrk15.com/aff_c?offer_id=10398&aff_id=12543&aff_sub={affiliate_id}&aff_sub2={transaction_id}', '', '2019-05-23 06:55:06', 5, ''),
(76, 'Obtenez votre iPhone XÂ©', '2019 iPhone le plus populaire!', '999.99', '1.50', '0.00', 3, 'images/products_image/FreeXRphone.jpg', 441, NULL, 'https://utxxqbi.com/path/out.php?b=3333', '', '2019-06-04 03:36:03', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ct_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `ct_dt`) VALUES
(1, 'freeus@crm.com', 'Admin@5', '2019-04-19 05:22:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
