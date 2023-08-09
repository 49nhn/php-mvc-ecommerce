-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 06:11 PM
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
-- Database: `php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `display`, `detail`, `description`) VALUES
(1, 'KM1', 1, '20%', 'Giảm 20%'),
(2, 'KM2', 2, '25%', 'Giảm 25%'),
(3, 'KM3', 3, '30%', 'Giảm 30%');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `status`, `total`) VALUES
(4, 1, '0', 0),
(5, 2, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_id`, `product_id`, `quantity`, `price`) VALUES
(0, 2, 1, 27490000),
(5, 2, 2, 27490000),
(5, 3, 1, 14990000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL,
  `display` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keyword` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `display`, `title`, `keyword`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dtdd', 0, 1, 'Điện thoại, smartphone chính hãng giá rẻ, trả góp 0%', 'điện thoại, dtdd, smartphone, điện thoại thông minh, điện thoại di động, Samsung, Apple, iPhone, OPPO, Vivo, Xiaomi, Huawei, Realme, Vsmart, Nokia, Mobell, Itel, Coolpad, Mobiistar, ASUS, ASUS Zenfone, BlackBerry, HTC, Redmi, Mi', 'Mua online điện thoại, smartphone, điện thoại thông minh giá rẻ, chính hãng. Giao nhanh, đem nhiều mẫu chọn, cà thẻ tại nhà. Trả góp 0%, bảo hành tại hơn 3000 điểm toàn quốc.', '2023-05-25 01:58:53', '2023-05-25 01:58:53'),
(2, 'Laptop', 'laptop-ldp', 0, 1, 'Laptop | Máy tính xách tay Giá rẻ, Trả góp 0%', 'Máy tính xách tay, laptop, laptop chính hãng, laptop giá rẻ, máy tính xách tay giá rẻ, laptop trả góp, máy tính xách tay trả góp', 'Mua máy tính laptop tại Thế Giới Di Động, giao nhanh 1 giờ, mang nhiều máy để lựa, bảo hành tại hơn 3000 điểm trên toàn quốc. Cà thẻ tại nhà, trả góp 0%.', '2023-05-25 02:03:07', '2023-05-25 02:03:07'),
(3, 'Tablet', 'may-tinh-bang', 0, 1, 'Máy tính bảng, tablet giá rẻ, trả góp 0%', 'máy tính bảng, tablet, iPad, Apple iPad, Samsung, Masstel, Lenovo, Mobell, Huawei, iPad Pro, iPad Air, iPad Mini, iPad Wifi, iPad Cellular, iPad Wifi Cellular, iPad 2017, iPad 2018, iPad 2019, Samsung Tab, Galaxy Tab, Tab, Huawei MediaPad, MediaPad, Lenovo Tab, Masstel Tab, Mobell Tab', 'Mua máy tính bảng, tablet tại Thế giới di động, giao nhanh 1 giờ, mang nhiều máy để chọn. Bảo hành 1 đổi 1 tháng đầu. Cà thẻ tại nhà, trả góp 0%.', '2023-05-25 02:33:44', '2023-05-25 02:33:44'),
(4, 'Home', 'Home', 0, 2, 'Menu footer', 'Trang chủ ở đây', 'Thông tin về trang chủ', '2023-05-25 01:58:53', '2023-05-25 01:58:53'),
(5, 'About', 'About', 0, 2, 'Menu footer', 'Trang About ở đây', 'Thông tin về About', '2023-05-25 01:58:53', '2023-05-25 01:58:53'),
(6, 'Services', 'Services', 0, 2, 'Menu footer', 'Trang Services ở đây', 'Thông tin về Services', '2023-05-25 01:58:53', '2023-05-25 01:58:53'),
(7, 'Testimonial', 'Testimonial', 0, 2, 'Menu footer', 'Trang Testimonial ở đây', 'Thông tin về Testimonial', '2023-05-25 01:58:53', '2023-05-25 01:58:53'),
(8, 'Blog', 'Blog', 0, 2, 'Menu footer', 'Trang Blog ở đây', 'Thông tin về Blog', '2023-05-25 01:58:53', '2023-05-25 01:58:53'),
(9, 'Contact', 'Contact', 0, 2, 'Menu footer', 'Trang Contact ở đây', 'Thông tin về Contact', '2023-05-25 01:58:53', '2023-05-25 01:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` int(11) DEFAULT 0,
  `ttnb` varchar(255) DEFAULT NULL,
  `bonho` varchar(255) DEFAULT NULL,
  `mau` varchar(255) DEFAULT NULL,
  `chitiet` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `parent_id`, `img`, `price`, `ttnb`, `bonho`, `mau`, `chitiet`, `title`, `keyword`, `description`) VALUES
(1, 'Samsung Galaxy A14', 'Samsung-Galaxy-A14', 1, '/san-pham/samsung-galaxy-a14-tlte-thumb-den-600x600.jpg', 4490000, '6.6', '6GB;4GB', 'Đen;Đỏ đô;Bạc', 'chi tiết', 'Samsung Galaxy A14 6GB - Chính hãng, giá tốt', 'Samsung Galaxy A14, Sámung Galaxy A14, Sámung Galaxy, Điện thoại Samsung Galaxy A14, giá Samsung Galaxy A14, thông tin Samsung Galaxy A14', 'Điện thoại Samsung Galaxy A14 6GB chính hãng tại TGDĐ giao nhanh, cà thẻ tại nhà, đem nhiều mẫu chọn. Bảo hành tại hơn 3000 điểm toàn quốc.'),
(2, 'iPhone 14 Pro Max', 'iphone-14-pro-max', 1, '/san-pham/iphone-14-pro-max-den-thumb-600x600.jpg', 27490000, '6.7\";Super Retina XDR', '128GB;256GB;512GB;1TB', 'Đen;Bạc;Vàng;Tím', 'chi tiết', 'iPhone 14 Pro Max giá tốt, trả góp 0%, chính hãng, ưu đãi hấp dẫn', 'iPhone 14 Pro Max, ip14promax, iphon 14 Pro max, , iPhone 14 Pro Mã, 14 Pro Max, 14promax', 'Mua iPhone 14 Pro Max chính hãng với giá tốt kèm trả góp 0%. Có hàng tại siêu thị với nhiều ưu đãi hấp dẫn. Đa dạng màu sắc: Vàng, Bạc, Đen, Tím,... Nhấn mua ngay!'),
(3, 'Acer Aspire 7 Gaming A715 42G R05G R5 5500U', 'acer-aspire-7-gaming-a715-42g-r05g-r5', 2, '/san-pham/acer-aspire-7-gaming-a715-42g-r05g-r5-nhqaysv007-(52).jpg', 14990000, '', 'Ram 8 GB; SSD 512 GB', NULL, 'chi tiết', 'Laptop Acer Aspire 7 Gaming A715 42G R05G (NH.QAYSV.007) | Chính hãng', 'Acer Aspire 7 Gaming A715 42G R05G R5 5500U/8GB/512GB/4GB GTX1650/144Hz/Win11 (NH.QAYSV.007), Acer Aspire 7 Gaming A715 42G R05G R5 5500U (NH.QAYSV.007), Acer Aspire 7 Gaming A715 42G R05G R5 5500U (NH.QAYSV.007), Laptop Acer Aspire 7 Gaming A715 42G R05G', 'Laptop Acer Aspire 7 Gaming A715 42G R05G R5 5500U (NH.QAYSV.007) giá rẻ, trả góp - Mua online, xét duyệt nhanh, giao hàng siêu tốc, cà thẻ tại nhà. Bảo hành toàn quốc. Xem ngay!'),
(4, 'Asus TUF Gaming F15 FX506LHB i5 10300H', 'Asus-TUF-Gaming-F15-FX506LHB-i5-10300H', 1, '/san-pham/asus-tuf-gaming-fx506lhb-i5-hn188w-(54).jpg', 15490000, '', 'Ram 8 GB; SSD 512 GB', 'xanh', 'chi tiết', 'Laptop Asus TUF Gaming F15 FX506LHB i5 (HN188W) - Chính hãng, trả góp', 'Asus TUF Gaming F15 FX506LHB i5 10300H/8GB/512GB/4GB GTX1650/144Hz/Win11 (HN188W), Asus TUF Gaming F15 FX506LHB i5 10300H (HN188W), Asus TUF Gaming F15 FX506LHB i5 10300H (HN188W)', 'Laptop Asus TUF Gaming F15 FX506LHB i5 10300H (HN188W) giá rẻ, trả góp - Mua online giao nhanh tận nơi trong 1 giờ, cà thẻ tại nhà. Bảo hành toàn quốc. Xem ngay!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('user','admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `role`) VALUES
(1, 'nam123', 'nnam4332@gmail.com', NULL, '222222', NULL, 'user'),
(2, 'nam', 'nnam4332@gmail.com', NULL, '123123', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
