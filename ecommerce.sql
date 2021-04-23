-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2021 at 08:34 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `mail`, `password`, `address`) VALUES
(1, 'elalfee', '01001000322', 'elalfee@yahoo.com', '123123Aa', '123 street'),
(2, 'aya', '01001000322', 'aya@yahoo.com', '123123Aa', '123 street'),
(3, 'nadeen', '01001000322', 'nadeen@yahoo.com', '123123Aa', '123 street'),
(4, 'donia', '01001000322', 'donia@yahoo.com', '123123Aa', '123 street'),
(5, 'hadeer', '01001000322', 'hadeer@yahoo.com', '123123Aa', '123 street');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `mail`, `password`, `address`) VALUES
(1, 'Abdelrahman', '010022332244', 'asasa@yahoo.com', '123123Aa', 'port saeed');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salary` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `mail`, `password`, `salary`, `role`) VALUES
(1, 'bedo', '01001545783', 'bedo@yahoo.com', '123123Bb', 3425, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `decription` varchar(500) NOT NULL,
  `productid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `customerid`, `decription`, `productid`) VALUES
(7, 1, 'Good price & quality', 47),
(8, 1, 'Bad Product', 44),
(9, 1, 'Good One', 41),
(10, 1, 'not the best', 33);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `precentage` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `precentage`, `productid`) VALUES
(1, 'rmd2021', 45, 17),
(2, 'happdo', 35, 45),
(28, 'dola21', 65, 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerid`, `productid`, `price`) VALUES
(1, 1, 19, 250),
(5, 1, 17, 450),
(8, 1, 26, 35),
(10, 1, 18, 350),
(16, 1, 94, 1290),
(17, 1, 21, 570);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(16000) DEFAULT NULL,
  `quantity` varchar(100) NOT NULL,
  `sectionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `photo`, `quantity`, `sectionid`) VALUES
(17, 'Flash1Boots For Women – Black', 450, 'bootswomen.jpeg', 'Available', 11),
(18, 'Wellz Random Pattern Wide Leg Pants - Black', 350, 'wide pants1.jpeg', 'Available', 11),
(19, 'American Eagle High-Waisted Corduroy Jegging - OLIVE', 700, 'ae high waist.jpeg', 'Available', 11),
(20, 'Sun Set SunSet Lined Blouse For Women - Soft - Long Sleeve - Black', 500, 'linedblouse.jpeg', 'Available', 11),
(21, 'Celmia Women Puff Sleeve Button-down Long Sleeve Office Blouse', 570, 'puff sleeve.jpeg', 'Available', 11),
(22, 'Zanzea Womens Button Down Front Adjustable Sleeve Shirts', 500, '1.jpeg', 'Available', 11),
(23, 'A Distinctive Casual Jacket For Women', 800, 'ww.jpeg', 'Available', 11),
(24, 'Leather Jacket, Elegant, Chic, Model 2021', 1100, 'jacket.jpeg', 'Available', 11),
(25, 'Islamic Wooden Lantern', 100, 'lantern.jpeg', 'Available', 15),
(26, 'Ramadan Decoration - 250 Cm - Multi Color', 35, 'ramadandecoration.jpeg', 'Available', 15),
(27, 'LED String Lights Star Curtain - Ramadan Decoration', 100, 'ledstring.jpeg', 'Available', 15),
(28, 'Electric Incense Burner - Bronzer', 180, 'burnerbronze.jpeg', 'Available', 15),
(29, 'Electric Bakhour Incense Burner - silver', 170, 'burnersilver.jpeg', 'Available', 15),
(30, 'Tajweed Holy Quran - 17 X 24 ', 100, 'quran.jpeg', 'Available', 15),
(31, 'Incense Burner - gold', 200, 'burnergold.jpeg', 'Available', 15),
(32, 'Holy Quran - 17 X 24', 100, 'quranblack.jpeg', 'Available', 15),
(33, 'Babyliss 6604E Le Pro Light Hair Dryer - 2000 W', 525, 'hair dryer.jpeg', 'Available', 13),
(34, 'Axe Excite Deodorant Spray - for Men - 150 ml', 35, 'axe.jpeg', 'Available', 13),
(35, 'Nivea Men DEEP Black Carbon Antibacterial Antiperspirant Deodorant Roll-on - For Men - 50ml', 25, 'nivea.jpeg', 'Available', 13),
(36, 'Maybelline New York Fit Me Matte & Poreless Mini Face Foundation - 128 Warm', 80, 'fitme.jpeg', 'Available', 13),
(37, 'Maybelline New York Ancill Fit Me Concealer - 25 Medium', 100, 'may.jpeg', 'Available', 13),
(38, 'The Ordinary Niacinamide 10% + Zinc 1% Skin Serum - 30ml', 370, 'ord.jpeg', 'Available', 13),
(39, 'Garnier Micellar Cleansing Water In Oil For Waterproof Make-up - 400ml', 130, 'gar.jpeg', 'Available', 13),
(41, 'Jaguar Classic – EDT - For Men – 75Ml', 310, 'per.jpeg', 'Available', 13),
(42, 'Nokia 105 (2017) - 1.8 Dual SIM Mobile Phone - Blue', 350, 'n105.jpeg', 'Available', 12),
(43, 'XIAOMI Redmi Note 9 Pro - 6.67-inch 64GB/6GB Dual SIM Mobile Phone - Interstellar Grey', 3400, 'xai.jpeg', 'Available', 12),
(44, 'Samsung Galaxy A02 - 6.5-inch 32GB/3GB Dual SIM 4G Mobile Phone - Blue', 1800, 'a02.jpeg', 'Available', 12),
(45, 'Apple 12.9-inch iPad Pro (Early 2020) 128GB Wi-Fi - Space Gray', 22500, 'ipad.jpeg', 'Available', 12),
(46, 'Samsung Galaxy Tab A 8.0 (2019) - 8.0-inch 32GB/2GB Single SIM 4G Table - Black', 2700, 'tab.jpeg', 'Available', 12),
(47, 'Apple iPhone XR with FaceTime - 128GB - (Product) Red', 12400, 'xr.jpeg', 'Available', 12),
(48, 'Nokia 3.2 - 6.26-inch 16GB/2GB Mobile Phone - Black', 1600, 'n32.jpeg', 'Available', 12),
(49, 'Huawei nova 7 5G - 6.53-inch 256GB/8GB Mobile Phone - Midsummer Purple', 6900, 'haw.jpeg', 'Available', 12),
(69, 'Sun Set SunSet Chemise For Women _ Soft _BUTTONS_YELLOW', 150, '2.jpg', 'Available', 11),
(70, 'Sun Set Buttoned Down Shirt For Women - KAROHAT', 190, '1.jpg', 'Available', 11),
(71, 'Ravin Turtle Neck Light Coffee Basic Pullover', 150, '4.jpg', 'Available', 11),
(72, 'SHEIN Mock Neck Dobby Mesh Rib-knit Velvet Tee-02733', 199, '3.jpg', 'Available', 11),
(73, 'Gogh Mens Jacket2020', 500, '5.jpg', 'Available', 11),
(74, 'Andora Knitted Ribbed High Neck Pullover - Black', 100, '6.jpg', 'Available', 11),
(75, 'Defacto Man Navy Slim Fit Long Sleeve Cardigan / Bolero', 169, '7.jpg', 'Available', 11),
(76, 'Defacto Man Grey Slim Fit College Neck Long Sleeve Cardigan / Bolero', 186, '8.jpg', 'Available', 11),
(77, 'Simple White Children Dress Summer 2020', 400, '10.jpg', 'Available', 11),
(78, 'Fashion New Kids Boy Clothes Baby Gentleman Suit Clothing Sets Fake Two Piece Vest Shirt Toddler Children 1-4Y Birthday Party Dress XYX(#Dark Grey)', 350, '9.jpg', 'Available', 11),
(79, 'iphone 12 pro . 128gb', 18600, 'iphone.jpg', 'Available', 12),
(80, 'iPhone 11 pro max  .  512 gb', 19000, 'iPhone-11-Pro-Max.jpg', 'Available', 12),
(81, 'iphone 12 .64gb', 14350, 'iPhone-12.jpg', 'Available', 12),
(82, 'iPhone 11  .  256 gb', 12000, 'iPhone-11.jpg', 'Available', 12),
(83, 'Xiaomi Redmi Note 10 Pro/128gb /android 11', 4999, 'Redmi-Note-10-Pro.jpg', 'Available', 12),
(84, 'Xiaomi Poco X3 Pro. 256gb /android 11', 5100, 'Poco-X3-Pro.jpg', 'Available', 12),
(85, 'Oppo Find X3 Pro/ 256gb/ android 11', 19000, 'Oppo-Find-X3-Pro-1.jpg', 'Available', 12),
(86, 'Huawei Nova 8 5G/ android 10 / 256gb', 8500, 'Huawei-Nova-8-5G.jpg', 'Available', 12),
(87, 'Huawei Nova 5T/ 128gb/ android 9.0', 5200, 'Nova-5T.jpg', 'Available', 12),
(88, 'Huawei P40 Pro/ android 10 / 256gb', 14000, 'P40-Pro-2.jpg', 'Available', 12),
(89, 'Forever Lina Mini Silicone Ultrasonic Facial Cleanser Brush - Blue', 60, 'a.jpg', 'Available', 13),
(90, 'Sokany Facial IONIC Steamer Sokany - White', 200, 'b.jpg', 'Available', 13),
(91, '5IN1 5-in-1 Beauty Care Massager For Face And Body', 50, 'c.jpg', 'Available', 13),
(92, 'Relax Tone Massage - Blue/White', 145, 'D.jpg', 'Available', 13),
(93, 'Braun Series 3 310s Rechargeable Wet & Dry Electric Shaver - Blue', 490, 'E.jpg', 'Available', 13),
(94, 'Braun MGK5280 9 In One Trimmer Multi Grooming Kit', 1290, 'f.jpg', 'Available', 13),
(95, 'Carolina Herrera 212 Vip Black – EDP - For Men – 200Ml', 1330, 'g.jpg', 'Available', 13),
(96, 'Guess Gold - EDP - For Women - 75ml', 420, 'h.jpg', 'Available', 13),
(97, 'Bio Balance Aknesun Mattifying Face Aqua Fusion - 40 Ml (1+1 Free)', 258, 'ii.jpg', 'Available', 13),
(98, 'Garnier Fast Fairness Tissue Mask With Vitamin C & Milky Essence', 35, 'j.jpg', 'Available', 13);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `quantity`) VALUES
(11, 'Fashion', 'Available'),
(12, 'Phones & Tablets', 'Available'),
(13, 'Health & Beauty ', 'Available'),
(15, 'Ramadan', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectionid` (`sectionid`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `products` (`id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sectionid`) REFERENCES `sections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
