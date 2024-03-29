-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 12:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartpickzdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`) VALUES
(1, 'Men\'s Apparel'),
(2, 'Women\'s Apparel'),
(5, 'Electronics'),
(6, 'Beauty'),
(8, 'Baby Items');

-- --------------------------------------------------------

--
-- Table structure for table `final_array_view`
--

CREATE TABLE `final_array_view` (
  `id` int(11) NOT NULL,
  `PRODUCT` varchar(255) DEFAULT NULL,
  `13` float DEFAULT NULL,
  `14` float DEFAULT NULL,
  `15` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_array_view`
--

INSERT INTO `final_array_view` (`id`, `PRODUCT`, `13`, `14`, `15`) VALUES
(1, 'Face Cream', 0.418738, 0.175606, 0.707721),
(2, 'eyeliner', 0.295296, 0.0492429, 0.57497),
(3, 'Tshirt', 0.297032, 0.05859, 0.569138);

-- --------------------------------------------------------

--
-- Table structure for table `item_ids`
--

CREATE TABLE `item_ids` (
  `order_id` int(11) NOT NULL,
  `item_ids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_ids`
--

INSERT INTO `item_ids` (`order_id`, `item_ids`) VALUES
(24, 2),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 3),
(30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'people',
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `username`, `password`, `usertype`, `fullname`, `email`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 'admin', 'admin@gmail.com'),
(13, 'priyanka', 'bfa04c7244ae997cab2b7fc2fcd5e915', 'people', 'Priyanka Tamang', 'tamangpriyanka35@gmail.com'),
(14, 'tandukar1', '7af9ca142b0f1d38e9b1bc3d92f5ba98', 'people', 'Shanti Tandukar', 'shanti@gmail.com'),
(15, 'pranitatamang', 'c1ff5c7d9b4cfd00fed562673045c4a3', 'people', 'Pranita Tamang', 'pranita@gmail.com'),
(16, 'shreejal1', '7cb422b90a59de4874f0ad427e173535', 'people', 'Shreejal Maharjan', 'shree@gmail.com'),
(17, 'dronatamang', '377202b205dccd38dd06bd7577a11c0a', 'people', 'Drona Tamang', 'dronatamang@gmail.com'),
(18, 'nischalsingh', '011302b03443dfac026fd322e155c78e', 'people', 'Nischal Dangol', 'nischalsingh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `sid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `sugesstions` varchar(500) NOT NULL,
  `number` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(24, 13, 'Priyanka Tamang', '9848567610', 'tamangpriyanka35@gmail.com', 'cash on delivery', 'Balaju', ', eyeliner (1) , Face Cream (1) ', 1500, '27-Sep-2023', 'completed'),
(25, 15, 'Pranita Tamang', '9841308281', 'pranita@gmail.com', 'cash on delivery', 'Balaju', ', Face Cream (1) ', 1000, '27-Sep-2023', 'completed'),
(26, 16, 'Shreejal Maharjan', '9841345698', 'shree@gmail.com', 'cash on delivery', 'Bafal', ', Face Cream (1) ', 1000, '27-Sep-2023', 'completed'),
(27, 17, 'Drona Tamang', '9841308281', 'dronatamang@gmail.com', 'cash on delivery', 'Balaju', ', Face Cream (1) ', 1000, '27-Sep-2023', 'completed'),
(28, 18, 'Nischal Dangol', '9869606147', 'nischalsingh@gmail.com', 'cash on delivery', 'bafal', ', Face Cream (1) ', 1000, '27-Sep-2023', 'completed'),
(29, 16, 'Shreejal Maharjan', '9848765610', 'shree@gmail.com', 'cash on delivery', 'Bafal', ', Tshirt (1) ', 1500, '27-Sep-2023', 'completed'),
(30, 13, 'Priyanka Tamang', '9848567610', 'tamangpriyanka35@gmail.com', 'cash on delivery', 'Balaju', ', Tshirt (1) ', 1500, '27-Sep-2023', 'completed');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_ratings_view_no_prod_name`
-- (See below for the actual view)
--
CREATE TABLE `product_ratings_view_no_prod_name` (
`col3` bigint(11)
,`col7` bigint(11)
,`col8` bigint(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `shop_keyword` varchar(255) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`product_id`, `title`, `description`, `price`, `cat_id`, `image`, `shop_keyword`, `added_date`) VALUES
(1, 'Face Cream', 'Lotus Face Cream for dry skins', 1000, 6, 'lotus cream.PNG', 'lotus, face cream, cream', '2023-09-27'),
(2, 'eyeliner', 'matte black eyeliner', 500, 6, 'liquid eye liner.PNG', 'black, eyeliner', '2023-09-27'),
(3, 'Tshirt', 'Men\'s Tshirt in Brown', 1500, 1, 'menshirt.png', 'tshirt, men, brown', '2023-09-27'),
(4, 'Lip Balm', 'Nivea Lip Balm for Dry lips', 250, 6, 'nivea c.PNG', 'lip balms, nivea', '2023-09-27'),
(5, 'red lipstick', 'red lipstick<br />\r\nmatte red', 750, 6, 'velvet slim stick lipstick.PNG', 'red lipstick, lipstick', '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_ratings`
--

INSERT INTO `user_ratings` (`id`, `user_id`, `item_id`, `rating`) VALUES
(25, 13, 2, 5),
(26, 13, 1, 3),
(27, 15, 1, 3),
(28, 16, 1, 3),
(29, 17, 1, 3),
(30, 18, 1, 3),
(31, 16, 3, 4),
(32, 13, 3, 5);

-- --------------------------------------------------------

--
-- Structure for view `product_ratings_view_no_prod_name`
--
DROP TABLE IF EXISTS `product_ratings_view_no_prod_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_ratings_view_no_prod_name`  AS SELECT coalesce(max(ifnull(case when `u`.`log_id` = 3 then `r`.`rating` end,0)),0) AS `col3`, coalesce(max(ifnull(case when `u`.`log_id` = 7 then `r`.`rating` end,0)),0) AS `col7`, coalesce(max(ifnull(case when `u`.`log_id` = 8 then `r`.`rating` end,0)),0) AS `col8` FROM ((`shop` `p` left join `user_ratings` `r` on(`p`.`product_id` = `r`.`item_id`)) left join `login` `u` on(`r`.`user_id` = `u`.`log_id`)) WHERE `u`.`usertype` = 'people' GROUP BY `p`.`product_id``product_id`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `final_array_view`
--
ALTER TABLE `final_array_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_ids`
--
ALTER TABLE `item_ids`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_ids` (`item_ids`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `final_array_view`
--
ALTER TABLE `final_array_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_ids`
--
ALTER TABLE `item_ids`
  ADD CONSTRAINT `item_ids_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_ids_ibfk_2` FOREIGN KEY (`item_ids`) REFERENCES `shopping` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`log_id`);

--
-- Constraints for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD CONSTRAINT `user_ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`log_id`),
  ADD CONSTRAINT `user_ratings_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `shopping` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
