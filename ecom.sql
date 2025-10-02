-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 06:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(70) NOT NULL,
  `sub_category_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `category_name`, `sub_category_name`) VALUES
(12, 'grocery', 'vegetable'),
(13, 'electronics', 'device'),
(14, 'mobile', 'vivo'),
(16, 'clothes', 'men'),
(17, 'clothes', 'women'),
(18, 'clothes', 'kids'),
(19, 'furniture', 'room furniture'),
(20, 'beauty', 'cosmetic'),
(21, 'toys', 'item'),
(22, 'sports', 'type'),
(23, 'mobile', 'samsung');

-- --------------------------------------------------------

--
-- Table structure for table `orderrs`
--

CREATE TABLE `orderrs` (
  `orderid` int(11) NOT NULL,
  `name` varchar(800) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(5000) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` int(20) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productquantity` int(20) NOT NULL,
  `productprice` varchar(10) NOT NULL,
  `productimage` varchar(3000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderrs`
--

INSERT INTO `orderrs` (`orderid`, `name`, `email`, `contact`, `address`, `state`, `city`, `pincode`, `productname`, `productquantity`, `productprice`, `productimage`, `date`) VALUES
(0, 'Arman', 'rrajtiwari4567@gmail.com', '6389036801', 'Mujahi Bazar', 'Pratapgarh', 'Patti', 230135, 'Samsung s24 ultra', 1, '120000', 'assets/s24.jpg', '2024-12-07'),
(0, 'Arman', 'rrajtiwari4567@gmail.com', '6389036801', 'Mujahi Bazar', 'Pratapgarh', 'Patti', 230135, 'Airpods', 1, '9500', 'assets/a1.png', '2024-12-07'),
(0, 'Arman', 'rrajtiwari4567@gmail.com', '6389036801', 'Mujahi Bazar', 'Pratapgarh', 'Patti', 230135, 'Samsung s24 ultra', 1, '120000', 'assets/s24.jpg', '2024-12-07'),
(0, 'Arman', 'rrajtiwari4567@gmail.com', '6389036801', 'Mujahi Bazar', 'Pratapgarh', 'Patti', 230135, 'Airpods', 1, '9500', 'assets/a1.png', '2024-12-07'),
(1, 'Abhishek Kumar Gupta', 'rrajtiwari4567@gmail.com', '630657022', 'ganganganj', 'Kanpur', 'kanpur', 208020, 'Airpods', 1, '9500', 'assets/a1.png', '2024-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `orderid` int(11) NOT NULL,
  `response` varchar(49) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `email` varchar(800) NOT NULL,
  `otp` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`email`, `otp`) VALUES
('armanraza6801@gmail.com', 6890),
('jhinjhak8318@gmail.com', 1891),
('hv442098@gmail.com', 6292),
('armanraza6801@gmail.com', 7485),
('armanraza6801@gmail.com', 2096);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(80) NOT NULL,
  `pcategory` varchar(80) NOT NULL,
  `psubcategory` varchar(80) NOT NULL,
  `pquantity` int(60) NOT NULL,
  `pdiscription` varchar(3000) NOT NULL,
  `ppicture` varchar(100) NOT NULL,
  `pprice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pcategory`, `psubcategory`, `pquantity`, `pdiscription`, `ppicture`, `pprice`) VALUES
(8, 'Rice', 'grocery', 'vegetable', 1, 'It is good for health.', 'assets/rice.jpg', '1200'),
(9, 'Dal', 'grocery', 'vegetable', 1, 'Legends choice.', 'assets/dal.jpg', '800'),
(10, 'Gobhi', 'grocery', 'vegetable', 1, 'Good for health.', 'assets/gobhi.webp', '45'),
(11, 'Aata', 'grocery', 'vegetable', 1, 'Good for health.', 'assets/aata.jpg', '800'),
(12, 'Laptop', 'electronics', 'device', 1, 'Dell laptop with an Intel Core i5 processor.\r\nConfigurations range from 8GB to 16GB DDR4, expandable in most models.', 'assets/laptop.jpg', '520000'),
(13, 'Samsung s24 ultra', 'mobile', 'samsung', 1, 'A robust 5000mAh battery ensures all-day usage, complemented by fast charging and wireless charging capabilities.\r\nAvailable in 256GB, 512GB, and 1TB variants, with ample space for all your apps, media, and files.', 'assets/s24.jpg', '120000'),
(14, 'Airpods', 'electronics', 'device', 1, 'Easily portable and comfortable for extended wear.', 'assets/a1.png', '9500'),
(15, 'Washing machine', 'electronics', 'device', 1, 'Offers various cycles for fabrics like cotton, wool, and synthetics.', 'assets/image1.png', '12990'),
(16, 'Air conditioner', 'electronics', 'device', 1, ' Systems designed for cooling entire homes or buildings, offering consistent temperature control.', 'assets/ac1.png', '30999'),
(17, 'Shirt', 'clothes', 'men', 1, 'More relaxed, often featuring vibrant colors, patterns, or short sleeves.', 'assets/cloths1.jpg', '1290'),
(18, 'Sofa', 'furniture', 'room furniture', 1, 'Composed of multiple pieces, they provide flexible seating arrangements.', 'assets/home2.jpg', '17999'),
(19, 'Lipstick', 'beauty', 'cosmetic', 1, ' Provides a flat, non-shiny finish for a bold, long-lasting look.\r\nOffers a shiny, hydrated look with a softer finish.', 'assets/buety4.avif', '450'),
(20, 'Remote control car', 'toys', 'item', 1, ' Powered by rechargeable batteries.', 'assets/toy1.avif', '750'),
(21, 'Cricket bat', 'sports', 'type', 1, 'A flat, wooden bat typically made of willow, designed to hit a cricket ball.', 'assets/sport2.jpg', '1668'),
(22, 'Jacket', 'clothes', 'women', 1, 'A jacket is a type of outerwear designed to provide warmth and protection against the elements. ', 'assets/cloths2.webp', '3400'),
(23, 'jeans', 'clothes', 'men', 1, 'Relaxed fit jeans ', 'assets/cloths4.webp', '1200'),
(24, 'Rajasthani suite', 'clothes', 'women', 1, 'It is the culture of Rajasthan ', 'assets/cloth3.webp', '3600'),
(25, 'Wooden Table', 'furniture', 'room furniture', 1, 'Stylish and portable wooden table.', 'assets/home4.jpg', '8332'),
(26, 'Lakme eyeconic', 'beauty', 'cosmetic', 1, 'Best product .', 'assets/buty1.jpg', '700'),
(27, 'Taddy wear', 'toys', 'item', 1, 'Taddy Wear – Redefining Casual Comfort.\r\n', 'assets/toy2.webp', '499');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `contact`, `password`, `user_type`, `gender`, `address`, `image`) VALUES
('Mohammad Arman', 'armanraza6801@gmail.com', '6389036801', 'arman123', 'user', 'male', 'Bhushar Mujahi Bazar Patti Pratapgarh\r\nUttar Pradesh', ''),
('Ayan Khan', 'jhinjhak8318@gmail.com', '8318848559', '123', 'user', 'male', 'Jhinjhak Kanpur Dehat', ''),
('Harsh Vardhan Tiwari', 'hv442098@gmail.com', '8630177804', '231', 'user', 'male', 'Prithvirampur Bakewar Etawah', ''),
('Abhishek Kumar Gupta', 'abhishekgupta90058@gmail.com', '6306979022', 'abhi123', 'user', 'male', 'Narayanpur Ghughali Maharajganj', 'assets/abhi.jpg'),
('Raj Tiwari', 'rrajtiwari4567@gmail.com', '9696311724', 'raj123', 'user', 'male', 'One hundred fifteen Devide Two hundered sixty six Maswanpur Kanpur', 'assets/raj.jpg'),
('Abhishek', 'abhishekkumargupta90058@gmail.com', '9598579022', '1234', 'user', 'male', 'Gorakhpur Uttar Pradesh.', ''),
('Mohammad Arman', 'armanraza6801@gmail.com', '6389036801', '123', 'admin', 'male', 'Pratapgarh', 'assets/arman.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
