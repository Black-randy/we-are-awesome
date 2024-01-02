-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 05:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weareawesome`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_id` int(11) NOT NULL,
  `Customer_loyalty` varchar(10) DEFAULT NULL CHECK (`Customer_loyalty` in ('Loyal','Regular')),
  `Order_count` int(11) DEFAULT NULL,
  `Customer_name` varchar(50) DEFAULT NULL,
  `Customer_Birthday` date DEFAULT NULL,
  `Customer_Address` varchar(100) DEFAULT NULL,
  `Customer_Phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_id`, `Customer_loyalty`, `Order_count`, `Customer_name`, `Customer_Birthday`, `Customer_Address`, `Customer_Phone`) VALUES
(1, 'Regular', 3, 'Isuru Sahan', '1990-05-15', '123 Main St, Kandy', NULL),
(2, 'Loyal', 8, 'Asiri Dhananjaya', '1985-08-22', '456 Oak St, Gampaha', NULL),
(3, 'Regular', 5, 'Brevian Adithya', '1995-01-10', '789 Pine St, Anuradhapura', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `Order_id` int(11) NOT NULL,
  `Order_type` enum('Dine-in','Take-away','Delivery') DEFAULT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `Pizza_id` int(11) DEFAULT NULL,
  `topping_1_id` int(11) DEFAULT NULL,
  `topping_2_id` int(11) DEFAULT NULL,
  `topping_3_id` int(11) DEFAULT NULL,
  `Pizza_size` enum('Personal','Regular','Large') DEFAULT NULL,
  `Food_id` int(11) DEFAULT NULL,
  `Menu_id` int(11) DEFAULT NULL,
  `Order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `DeliveryPerson_id` int(11) DEFAULT NULL,
  `OrderTaker_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`Order_id`, `Order_type`, `Customer_id`, `Pizza_id`, `topping_1_id`, `topping_2_id`, `topping_3_id`, `Pizza_size`, `Food_id`, `Menu_id`, `Order_date`, `DeliveryPerson_id`, `OrderTaker_id`) VALUES
(1, 'Take-away', 1, 1, 4, 5, 1, 'Personal', 1, 1, '2023-12-17 12:47:44', 0, 1),
(2, 'Dine-in', 1, 3, 5, 3, 2, 'Personal', 2, 2, '2023-12-18 13:27:44', 0, 2),
(3, 'Dine-in', 1, 1, 3, 6, 4, 'Personal', 3, 1, '2023-12-19 14:57:34', 0, 1),
(4, 'Delivery', 2, 1, 3, 2, 1, 'Personal', 4, 2, '2023-12-15 09:47:44', 1, 2),
(5, 'Delivery', 2, 2, 4, 5, 6, 'Regular', 5, 1, '2023-12-16 09:47:44', 2, 1),
(6, 'Delivery', 2, 3, 5, 6, 2, 'Regular', 6, 2, '2023-12-16 09:47:44', 1, 2),
(7, 'Delivery', 2, 4, 2, 1, 3, 'Regular', 1, 1, '2023-12-17 09:47:44', 1, 1),
(8, 'Take-away', 2, 1, 3, 1, 5, 'Regular', 2, 2, '2023-12-18 09:47:44', 0, 2),
(9, 'Dine-in', 2, 2, 5, 2, 4, 'Regular', 3, 1, '2023-12-19 09:47:44', 0, 1),
(10, 'Delivery', 2, 3, 4, 6, 3, 'Regular', 4, 2, '2023-12-20 09:47:44', 2, 2),
(11, 'Delivery', 2, 4, 2, 4, 5, 'Large', 5, 1, '2023-12-20 09:47:44', 2, 1),
(12, 'Take-away', 3, 4, 5, 6, 1, 'Large', 6, 2, '2023-12-21 09:47:44', 0, 1),
(13, 'Delivery', 3, 3, 4, 1, 2, 'Large', 1, 1, '2023-12-22 09:47:44', 1, 2),
(14, 'Delivery', 3, 2, 3, 5, 2, 'Large', 2, 2, '2023-12-22 09:47:44', 2, 1),
(15, 'Take-away', 3, 1, 5, 3, 4, 'Large', 3, 1, '2023-12-23 09:47:44', 0, 2),
(16, 'Take-away', 3, 4, 2, 6, 1, 'Large', 4, 2, '2023-12-24 09:47:44', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryperson`
--

CREATE TABLE `deliveryperson` (
  `Deliveryperson_id` int(11) NOT NULL,
  `Deliveryperson_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveryperson`
--

INSERT INTO `deliveryperson` (`Deliveryperson_id`, `Deliveryperson_name`) VALUES
(0, 'No Delivery person'),
(1, 'Lahiru Madhushan'),
(2, 'Pathum Eranga');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_id` int(11) NOT NULL,
  `Food_name` varchar(50) DEFAULT NULL,
  `Food_type` varchar(20) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_id`, `Food_name`, `Food_type`, `Price`) VALUES
(1, 'Garlic Bread', 'Starter', 699.00),
(2, 'Chocolate Lava Cake', 'Dessert', 899.00),
(3, 'coca-cola', 'Beverage', 299.00),
(4, 'Pasta Alfredo', 'Pasta', 1299.00),
(5, 'Promo Pizza', 'Pizza', 1499.00),
(6, 'Promo Pasta', 'Pasta', 1199.00);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Menu_id` int(11) NOT NULL,
  `Menu_Name` varchar(50) DEFAULT NULL,
  `Menu_type` varchar(20) DEFAULT NULL,
  `Pizza_id` int(11) DEFAULT NULL,
  `Topping_id` int(11) DEFAULT NULL,
  `Food_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Menu_id`, `Menu_Name`, `Menu_type`, `Pizza_id`, `Topping_id`, `Food_id`) VALUES
(1, NULL, 'Regular', NULL, NULL, NULL),
(2, NULL, 'Promotional', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertaker_person`
--

CREATE TABLE `ordertaker_person` (
  `OrderTaker_id` int(11) NOT NULL,
  `OrderTaker_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertaker_person`
--

INSERT INTO `ordertaker_person` (`OrderTaker_id`, `OrderTaker_name`) VALUES
(1, 'Kavindu Madhushanka'),
(2, 'Thenal Reigns');

-- --------------------------------------------------------

--
-- Table structure for table `phoneno`
--

CREATE TABLE `phoneno` (
  `phonenoID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phoneNo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phoneno`
--

INSERT INTO `phoneno` (`phonenoID`, `user_id`, `phoneNo`) VALUES
(1, 1, '123456789'),
(2, 2, '0774564897'),
(3, 3, '0774564897');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `Pizza_id` int(11) NOT NULL,
  `Pizza_name` varchar(50) DEFAULT NULL,
  `Pizza_type` varchar(20) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Pizza_size` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`Pizza_id`, `Pizza_name`, `Pizza_type`, `Price`, `Pizza_size`) VALUES
(1, 'Margherita', 'Traditional Italiano', 1099.00, NULL),
(2, 'Pepperoni Feast', 'Modern Magic', 1299.00, NULL),
(3, 'Vegetarian Delight', 'Traditional Italiano', 1199.00, NULL),
(4, 'Hawaiian Bliss', 'Modern Magic', 1399.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `Topping_id` int(11) NOT NULL,
  `Topping_name` varchar(50) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`Topping_id`, `Topping_name`, `Price`) VALUES
(1, 'Mushrooms', 150.00),
(2, 'Olives', 125.00),
(3, 'Extra Cheese', 200.00),
(4, 'Pepperoni', 175.00),
(5, 'Chicken', 250.00),
(6, 'Pineapple', 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`,`user_email`, `LastName`, `FirstName`, `Password`, `Role`, `address`) VALUES
(1, 'Heshara@hmail.com' ,'Samarajeewa', 'Heshara' , '1205k', 0, '910, sri jayanthi mawatha'),
(2, 'Yasal@ymail.com'   ,'Samarajeewa', 'Yasal'   , '1305y', 1, '911, kanthi mawatha'),
(3, '123456789@1mail.com'   ,'Samarajeewa', 'Yasal'   , '1305y', 1, '911, kanthi mawatha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `fk_customer_order_customer` (`Customer_id`),
  ADD KEY `fk_customer_order_deliveryperson` (`DeliveryPerson_id`),
  ADD KEY `fk_customer_order_ordertaker` (`OrderTaker_id`),
  ADD KEY `fk_customer_order_menu` (`Menu_id`),
  ADD KEY `fk_customer_order_pizza` (`Pizza_id`),
  ADD KEY `fk_customer_order_food` (`Food_id`),
  ADD KEY `fk_topping_1` (`topping_1_id`),
  ADD KEY `fk_topping_2` (`topping_2_id`),
  ADD KEY `fk_topping_3` (`topping_3_id`);

--
-- Indexes for table `deliveryperson`
--
ALTER TABLE `deliveryperson`
  ADD PRIMARY KEY (`Deliveryperson_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Menu_id`),
  ADD KEY `fk_menu_pizza` (`Pizza_id`),
  ADD KEY `fk_menu_topping` (`Topping_id`),
  ADD KEY `fk_menu_food` (`Food_id`);

--
-- Indexes for table `ordertaker_person`
--
ALTER TABLE `ordertaker_person`
  ADD PRIMARY KEY (`OrderTaker_id`);

--
-- Indexes for table `phoneno`
--
ALTER TABLE `phoneno`
  ADD PRIMARY KEY (`phonenoID`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`Pizza_id`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`Topping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `phoneno`
--
ALTER TABLE `phoneno`
  MODIFY `phonenoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `fk_customer_order_customer` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`),
  ADD CONSTRAINT `fk_customer_order_deliveryperson` FOREIGN KEY (`DeliveryPerson_id`) REFERENCES `deliveryperson` (`Deliveryperson_id`),
  ADD CONSTRAINT `fk_customer_order_food` FOREIGN KEY (`Food_id`) REFERENCES `food` (`Food_id`),
  ADD CONSTRAINT `fk_customer_order_menu` FOREIGN KEY (`Menu_id`) REFERENCES `menu` (`Menu_id`),
  ADD CONSTRAINT `fk_customer_order_ordertaker` FOREIGN KEY (`OrderTaker_id`) REFERENCES `ordertaker_person` (`OrderTaker_id`),
  ADD CONSTRAINT `fk_customer_order_pizza` FOREIGN KEY (`Pizza_id`) REFERENCES `pizza` (`Pizza_id`),
  ADD CONSTRAINT `fk_customer_order_topping` FOREIGN KEY (`topping_1_id`) REFERENCES `topping` (`Topping_id`),
  ADD CONSTRAINT `fk_topping_1` FOREIGN KEY (`topping_1_id`) REFERENCES `topping` (`Topping_id`),
  ADD CONSTRAINT `fk_topping_2` FOREIGN KEY (`topping_2_id`) REFERENCES `topping` (`Topping_id`),
  ADD CONSTRAINT `fk_topping_3` FOREIGN KEY (`topping_3_id`) REFERENCES `topping` (`Topping_id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_food` FOREIGN KEY (`Food_id`) REFERENCES `food` (`Food_id`),
  ADD CONSTRAINT `fk_menu_pizza` FOREIGN KEY (`Pizza_id`) REFERENCES `pizza` (`Pizza_id`),
  ADD CONSTRAINT `fk_menu_topping` FOREIGN KEY (`Topping_id`) REFERENCES `topping` (`Topping_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
