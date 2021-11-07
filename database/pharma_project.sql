-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2020 at 03:19 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_img` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_img`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'rsz_doctor.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(9, 'Covid essentials', 'essenetials supplements'),
(2, 'Ayurveda Care', 'ayurvedic products'),
(6, 'Nutrition & Vitamins', 'Suppliments'),
(7, 'Mother & Baby Care', 'baby products'),
(11, 'Personal Care', 'Here you can get daily products'),
(12, 'diabetic care', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(100) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_image`, `customer_ip`) VALUES
(4, 'pooja', 'pooja123@gmail.com', '1234', '98765432', 'qa1.png', '::1'),
(10, 'kirti neet', 'kiruu@neet.com', 'asdf', '6578903215', 'rsz.png', '::1'),
(8, 'bhavana', 'bhavana@gmail.com', 'abc', '1234567898', 'face1.jpg', '::1'),
(11, 'ajit', 'ajit@gmail.com', '1234', '1234567898', 'pharm.png', '::1'),
(12, 'pb', 'pb@gmail.com', '1234', '9876032912', 'qa1.png', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE IF NOT EXISTS `customer_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `product_id`, `product_title`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`) VALUES
(38, 4, 28, 'healthvit joinneed', 420, 1579603328, 2, '2020-10-25 15:06:54', 'pending'),
(36, 8, 27, 'Healthvit fitness capsule', 240, 955400828, 2, '2020-10-25 14:34:18', 'pending'),
(37, 4, 18, 'Garnier face mask sheet', 198, 41845081, 2, '2020-10-25 15:01:54', 'pending'),
(39, 10, 28, 'healthvit joinneed', 420, 409594419, 2, '2020-10-28 13:52:43', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(100) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `code` int(100) NOT NULL,
  `payment_date` text NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 0, 500, '', 2147483647, 0, '2020-07-08'),
(2, 0, 500, '', 2147483647, 0, '0035-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

DROP TABLE IF EXISTS `pending_order`;
CREATE TABLE IF NOT EXISTS `pending_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`order_id`, `customer_id`, `product_id`, `product_title`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`) VALUES
(41, 4, 31, 'Johnsons baby soap', 70, 863633451, 2, '2020-10-28 13:32:44', 'pending'),
(43, 10, 18, 'Garnier face mask sheet', 198, 1154625592, 2, '2020-10-28 13:56:04', 'pending'),
(44, 10, 18, 'Garnier face mask sheet', 198, 1338228433, 2, '2020-10-28 14:00:08', 'pending'),
(45, 10, 20, 'Oral B electrical Toothbrush', 190, 901390121, 1, '2020-10-28 14:01:44', 'pending'),
(47, 11, 19, 'dabur chyavanprash', 500, 1890539428, 2, '2020-10-28 14:55:27', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL,
  `product_title` text NOT NULL,
  `product_img1` blob NOT NULL,
  `product_img2` blob NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `p_cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_price`, `product_desc`, `product_keyword`) VALUES
(9, 2, 31, '2020-10-22 15:20:45', 'Dabur Paste', 0x64616275722d70617374652e6a7067, 0x64616261722d70617374652e6a7067, 50, '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">Dabur</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;Red&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">toothpaste</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;is packed with the power of 13 active ayurvedic ingredients like laung, pudina and tomar, that keep all your dental problems away. It is the first-ever&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">toothpaste</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;which keeps all your dental problems away, thereby providing you strong teeth.</span></p>', 'Tooth Paste'),
(19, 2, 31, '2020-10-22 14:49:13', 'dabur chyavanprash', 0x64616261722d63686176616e312e6a7067, 0x64616261722d63686176616e322e6a7067, 250, '<p>Dabur Chyavanprash is a ayurvedic health product, it keeps you helathy.</p>', 'dabur chyavanprash'),
(20, 11, 30, '2020-10-22 15:13:11', 'Oral B electrical Toothbrush', 0x6f72616c2d62727573682d6d2e6a7067, 0x6f72616c2d62727573682d6d312e6a7067, 190, '<p>It is an electricl toothbrush, which helps to clean plaque from teeth.</p>', 'tooth brush'),
(21, 7, 38, '2020-10-22 15:13:34', 'Nivea Body lotion', 0x6e692d626f64792d662e6a7067, 0x6e692d626f64792d622e6a7067, 220, '<p>It moisturizes mothers skin</p>', 'body lotion'),
(22, 7, 38, '2020-10-22 16:31:02', 'Nivea care shower & diamond', 0x6e692d62776173682d662e6a7067, 0x6e692d62776173682d622e6a7067, 270, '', 'body wash'),
(23, 7, 33, '2020-10-22 15:14:36', 'mamaearth hair shampoo', 0x6d616d612d7368616d706f6f2e6a7067, 0x6d616d612d7368616d706f6f2d622e6a7067, 120, '', 'hair shampoo'),
(24, 7, 33, '2020-10-22 15:15:12', 'mamaearth face cream', 0x666163652e6a7067, 0x6d6f6973742e6a7067, 70, 'Made With Natural Ingredients. Gives You A Glowing Skin. Safe Organic', 'face cream'),
(30, 7, 42, '2020-10-24 12:57:53', 'johnsons baby shampoo', 0x6a6f686e2d7368616d2d662e706e67, 0x6a6f686e2d7368616d2d622e706e67, 120, '', 'baby shampoo'),
(31, 7, 42, '2020-10-24 12:58:27', 'Johnsons baby soap', 0x6a6f686e2d736f6170312e706e67, 0x6a6f686e2d736f6170312e706e67, 35, '', 'baby soap'),
(32, 7, 42, '2020-10-24 12:58:42', 'johnsons baby wipes', 0x6a6f686e2d776970652d662e706e67, 0x6a6f686e2d776970652d622e706e67, 75, '', 'baby wipes'),
(25, 9, 39, '2020-10-22 15:15:36', 'dettol hand wash', 0x646574746f6c2d68616e642e6a7067, 0x646574746f6c2d68616e642d622e6a7067, 50, 'Dettol Antiseptic Wash & contains the active ingredient benzalkonium chloride. it keeps away bacterias from your health.', 'hand wash'),
(34, 43, 9, '2020-10-29 02:22:28', 'mask', 0x636f2d6d61736b2e6a7067, '', 30, '<p>This mask protects you from harmful bacteria.</p>', 'covid'),
(35, 44, 12, '2020-10-29 02:26:02', 'injection', 0x696e6a656374696f6e2e6a7067, '', 40, '', 'insulin'),
(36, 43, 9, '2020-10-29 02:27:27', 'covid machine', 0x636f7669645f6d616368696e652e6a7067, '', 120, '<p>This machine detects temperature of a human body.</p>', 'covid'),
(12, 2, 26, '2020-10-22 15:21:05', 'Kapiva Juice', 0x6b61706976612d6a756963652e6a7067, 0x6b61706976612d6a756963652d622e6a7067, 175, '<p>ayurvedic</p>', 'kapiva juice'),
(17, 11, 30, '2020-10-22 15:16:16', 'Oral-B brush', 0x6f72616c2d62727573682e6a7067, 0x6f72616c2d6272757368312e6a7067, 50, '<p>It is a tooth brush which has soft brissels which protects your gums from harsh brushing.</p>', 'Tooth brush'),
(18, 11, 32, '2020-10-22 16:09:16', 'Garnier face mask sheet', 0x6d61736b2e6a7067, 0x6761722d6d61736b322e6a7067, 99, '<p>It is a garnier face mask which helps to hydrate your face.</p>', 'face mask'),
(26, 9, 39, '2020-10-22 15:18:27', 'dettol liquid', 0x646574746f6c2d6c69712e6a7067, 0x646574746f6c2d6c69712d622e6a7067, 35, 'Dettol liquid antiseptic and disinfectant is light yellow in colour in the concentrated form. It use to clean your wounds or you can use this to clean your floor. it is for your own hygiene.', 'dettol liquid covid essential'),
(27, 6, 34, '2020-10-22 15:19:16', 'Healthvit fitness capsule', 0x6865616c74682d6669742d662e6a7067, 0x6865616c74682d6669742d622e6a7067, 120, '', 'fitness capsule'),
(28, 6, 34, '2020-10-22 15:19:49', 'healthvit joinneed', 0x6865616c74682d6a6f696e742d662e6a7067, 0x6865616c74682d6a6f696e742d622e6a7067, 210, '', 'healthvit joint pain capsules'),
(29, 11, 32, '2020-10-22 14:18:54', 'Garnier Body Lotion', 0x6761722d6c6f74696f6e2d662e6a7067, 0x6761722d6c6f74696f6e2d622e6a7067, 120, '<p>body lotion</p>', 'Body lotion');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `p_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `category` int(100) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `category`, `p_cat_title`, `p_cat_desc`) VALUES
(31, 2, 'Dabur', 'healthy product '),
(32, 11, 'Garnier', 'for face mask and face wash'),
(33, 7, 'mamaearth', 'It helps to nourishes skin of baby and mother'),
(26, 2, 'kapiva', '<p>Kapiva is an ayurvedic product which is a tonic helps you to be fit.</p>'),
(30, 11, 'Oral-B care', 'Oral Hygiene'),
(34, 6, 'Healthvit', 'this is just a supplement can work only when you take proper diet'),
(40, 9, 'lifebuoy', ''),
(39, 9, 'dettol', ''),
(37, 2, 'zandu', ''),
(38, 7, 'nivea', 'It moisturize skin'),
(43, 9, 'essentials', ''),
(42, 7, 'johnson baby', 'baby products'),
(44, 12, 'insulin', '');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_detail`
--

DROP TABLE IF EXISTS `shipping_detail`;
CREATE TABLE IF NOT EXISTS `shipping_detail` (
  `ship_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(100) NOT NULL,
  `ship_contact` int(10) NOT NULL,
  `ship_add` varchar(255) NOT NULL,
  `ship_city` varchar(255) NOT NULL,
  `ship_pin` int(6) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`ship_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipping_detail`
--

INSERT INTO `shipping_detail` (`ship_id`, `customer_id`, `ship_contact`, `ship_add`, `ship_city`, `ship_pin`, `status`) VALUES
(31, 8, 2147483647, 'sfgh', 'panvel', 410678, ''),
(30, 8, 1234567894, 'dsdghf', 'ghdf', 123456, ''),
(32, 4, 1234548543, 'panvel', 'panvel', 410206, ''),
(33, 4, 1234556894, 'kamotha', 'panvel', 410234, ''),
(34, 4, 1234567893, 'padkf', 'panvel', 321684, ''),
(35, 11, 2147483647, 'fweejh', 'dgrgj', 121232, 'paid online'),
(36, 11, 1234567894, 'sadsdf', 'dgesr', 123234, ''),
(37, 11, 1234567895, 'afrjhgfdjhg', 'alkjhg', 12345, 'pending');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
