-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2021 lúc 05:07 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecom_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Chí Thanh', 'chithanh@gmail.com', '151099', 'ANIMEGIN.jpg', 'Việt Nam', '<p>Tạ Ch&iacute; Thanh, sinh ng&agrave;y 15 th&aacute;ng 10 năm 1999. Đảm nhận chức năng quản trị của trang web n&agrave;y.<br /><a href=\"#\">Tạ Ch&iacute; Thanh&nbsp;</a><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus natus ex, minus molestiae itaque excepturi maxime repellat enim voluptate odio tenetur quaerat deserunt, temporibus veniam nobis velit exercitationem nemo labore.</p>', '0942-645-121', 'Thiết kế Web'),
(3, 'Thanh Chí Tạ', 'tchithanh15@gmail.com', '6789', 'anime.jpg', 'VIỆT NAM', '<p>Nge n&oacute;i c&agrave; mau gần lắm</p>', '1234-567-890', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'Chúng tôi yêu các bạn', 'Chúng tôi luôn luôn giành một tình cảm chân thành đến quý khách hàng, nếu không có các bạn chắc chắn rằng shop của chúng tôi sẽ khó phát triển. Chân thành cảm ơn tất cả mọi người đã ủng hộ shop. Chúng tôi yêu các bạn!'),
(2, 'Giá tốt nhất', 'Chúng tôi luôn đem đến cho khách hàng những sản phẩm mà giá của nó là giá tốt nhất, nhưng chất lượng của sản phẩm vẫn được bảo đảm tuyệt đối. Vì vậy chúng tôi rất mong bạn tin tưởng và ủng hộ những sản phẩm của chúng tôi!'),
(3, 'Sản phẩm có xuất xứ', 'Chúng tôi luôn đem đến cho khách hàng những sản phẩm 100% có nguồn gốc xuất xứ, sản phẩm chất lượng, nhưng giá cả của nó tuyệt đối là tốt nhất. Vì vậy chúng tôi rất mong bạn tin tưởng và ủng hộ những sản phẩm của chúng tôi!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL,
  `price_ship` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Nam', 'Bộ sưu tập cho nam giới'),
(2, 'Nữ', 'Bộ sưu tập cho phái đẹp'),
(3, 'Trẻ em', 'Bộ sư tập cho bé'),
(5, 'Khác', 'Dành cho mọi người.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(4, 13, 'Mã Giảm Giá Sơ Mi', '70000', '1234567', 5, 1),
(5, 7, 'Mã giảm giá của Áo Thun Nam Hàn Quốc', '99000', '123', 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Ngô Trung Quang', 'chithanh@gmail.com', '54321', 'Việt Nam', 'Cà Mau', '0942-645-121', 'Cà Mau', '125791591_2880436715574984_6237802247543549589_o.jpg', '::1'),
(4, 'Phương Mỹ Chi', 'mychi@gmail.com', '12345', 'Việt Nam', 'Hồ Chí Minh', '082 333 333', 'Sân bay Tân Sơn Nhất', '48151750527_16e041bc20_b.jpg', '::1'),
(11, 'Chris Evans', 'chrisevans@gmail.com', '34567', 'Mỹ', 'Hà Nội', '1234-5678-1234', 'Sân bay Nội Bài', 'q6D9oh7.jpg', '::1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` text NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `ship` varchar(255) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email`
--

CREATE TABLE `email` (
  `mail_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `email`
--

INSERT INTO `email` (`mail_id`, `name`, `email`, `subject`, `message`) VALUES
(11, 'Ta Chi Thanh', 'thanh.pro@gmail.com', 'Góp ý', 'Sản phẩm rất tốt, tôi rất hài lòng về sản phẩm này.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `o_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_label` text NOT NULL,
  `product_sale` int(100) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`, `product_label`, `product_sale`, `amount`) VALUES
(5, 6, 2, '2021-05-21 14:58:46', 'Sơ Mi Nữ', '65719129_2324549207805988_7892096113996464128_o.jpg', '65370961_2324549577805951_8650683996709060608_o.jpg', '65188678_2324549714472604_7817738556381593600_o.jpg', 250000, 'Áo thun nam hàn quốc', '<p>Sơ mi nữ phong c&aacute;ch trẻ trung, năng động</p>', 'Mới', 0, 30),
(6, 4, 2, '2021-05-21 15:03:12', 'Đầm Dạ Hội', '81090549_2481185388809035_7955383887327133696_o.jpg', '81070717_2481184978809076_2107956170621714432_o.jpg', '81510749_2482144968713077_1879449496564269056_o.jpg', 150000, 'Đầm nữ', '<p>Đầm nữ thời trang sang trọng</p>', 'Giảm Giá', 75000, 12),
(7, 6, 1, '2021-05-21 14:28:00', 'Áo Sơ Mi Nam', '123644974_2872749346343721_724442053634546877_o.jpg', '123835423_2872749246343731_8998132366587093728_o.jpg', '124549079_2872749316343724_4611901827007574962_o.jpg', 150000, 'Sơ mi nam', '<p>Sơ mi nam trẻ trung</p>', 'Mới', 0, 50),
(8, 4, 2, '2021-05-21 15:00:30', 'Áo Phông Nữ', '82196573_2481185252142382_7444610077085925376_o.jpg', '81946706_2482145155379725_488774098692866048_o.jpg', '81759829_2482145062046401_4483470721971912704_o.jpg', 350000, 'Đầm nữ', '<p>&Aacute;o sơ mi + ch&acirc;n v&aacute;y</p>', 'Giảm Giá', 85000, 50),
(9, 4, 2, '2021-05-21 15:01:38', 'Đầm Nữ Dạ Hội', '72126862_2399196567007918_36652662493544448_o.jpg', '60337718_2294678607459715_7587335581248520192_o.jpg', '72300551_2399191497008425_479029857280327680_o.jpg', 350000, 'Đầm nữ', '<p>Đầm nữ thời trang, sang trọng, trẻ trung</p>', 'Mới', 0, 50),
(10, 4, 2, '2021-05-21 15:02:09', 'Váy Nữ Thời Trang', '82155370_2487346704859570_6619670137970622464_o.jpg', '81781534_2487346688192905_8144859079714537472_o.jpg', '82549341_2487346878192886_5518287798534144000_o.jpg', 250000, 'Đầm nữ', '<p>Đầm nữ phong c&aacute;ch thời trang, sang trọng...</p>', 'Giảm Giá', 85000, 49),
(13, 4, 2, '2021-05-21 15:04:07', 'Áo Phông Thời Trang', '81510749_2482144968713077_1879449496564269056_o.jpg', '81759829_2482145062046401_4483470721971912704_o.jpg', '81946706_2482145155379725_488774098692866048_o.jpg', 250000, 'Đầm nữ', '<p>Đầm nữ sang trọng, trẻ trung</p>', 'Mới', 175000, 49),
(18, 4, 2, '2021-05-21 15:02:58', 'Đầm Nữ Thời Trang', '129646589_2778719239055647_5672869489056169002_o.jpg', '87385314_2535040080090232_936441791245189120_o.jpg', '89021214_2535040043423569_2145711342630207488_o.jpg', 250000, 'Đầm nữ', '<p>Đầm nữ thời trang</p>', 'Giảm Giá', 85000, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Áo Khoác', 'Bộ sưu tập áo khoác với phong cách trẻ trung, thiết kế thời trang. Hứa hẹn sẽ đem đén sự hài lòng và đem lại sự ấm áp cho quý khách hàng.'),
(2, 'Quần Short', 'Bộ sưu tập quần short với phong cách trẻ trung, thời thượng. Sẽ là sự lựa chọn tuyệt vời của quý khách hàng.'),
(4, 'Đầm', 'Bộ sưu tập theo phong cách thể thao'),
(5, 'Áo Thun', 'Bộ sưu tập áo thun với phong cách trẻ trung, năng động, phù hợp cho mọi lứa tuổi. Hứa hẹn sẽ đem đén sự hài lòng cho quý khách hàng.'),
(6, 'Sơ Mi', 'Áo sơ mi nam thời trang, phông cách trẻ trung, lịch lãm và thời thượng. Hứa hẹn sẽ đem đến sự hài lòng cho quý khách hàng.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipcod`
--

CREATE TABLE `shipcod` (
  `id_ship` int(10) NOT NULL,
  `name_ship` text NOT NULL,
  `price_ship` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shipcod`
--

INSERT INTO `shipcod` (`id_ship`, `name_ship`, `price_ship`) VALUES
(1, 'Cà Mau', 20000),
(2, 'Thành phố Hồ Chí Minh', 25000),
(3, 'Hà Nội', 50000),
(4, 'Bạc Liêu', 15000),
(10, 'Lào Cai', 43000),
(11, 'Hoà Bình', 55000),
(12, 'Sơn La', 55000),
(13, 'ĐIện Biên', 55000),
(14, 'Lai Châu', 55000),
(15, 'Yên Bái', 55000),
(16, 'Thanh Hoá', 45000),
(17, 'Nghệ An', 45000),
(18, 'Hà Tĩnh', 45000),
(19, 'Quảng Bình', 45000),
(20, 'Quảng Trị', 45000),
(21, 'Thừa Thiên Huế', 45000),
(22, 'Bà Rịa Vũng Tàu', 50000),
(23, 'Bình Dương', 47000),
(24, 'Bình Phước', 47000),
(25, 'Đồng Nai', 43000),
(26, 'Tây Ninh', 43000),
(27, 'Phú Thọ', 46000),
(28, 'Hà Giang', 46000),
(29, 'Tuyên Quang', 46000),
(30, 'Cao Bằng', 43000),
(31, 'Bắc Kạn', 42000),
(32, 'Thái Nguyên', 50000),
(33, 'Lạng Sơn', 45000),
(34, 'Bắc Giang', 47000),
(35, 'Quảng Ninh', 44000),
(36, 'Đà Nẵng', 44000),
(37, 'Quảng Nam', 44000),
(38, 'Quảng Ngãi', 42000),
(39, 'Bình Định', 46000),
(40, 'Phú Yên', 33000),
(41, 'Khánh Hoà', 48000),
(42, 'Ninh Thuận', 47000),
(43, 'Bình Thuận', 48000),
(44, 'An Giang', 44000),
(45, 'Bến Tre', 44000),
(46, 'Đồng Tháp', 22000),
(47, 'Hậu Giang', 5000),
(48, 'Kiên Giang', 22000),
(49, 'Long An', 33000),
(50, 'Tiền Giang', 30000),
(51, 'Trà Vinh', 25000),
(52, 'Vĩnh Long', 20000),
(53, 'Bắc Ninh', 35000),
(54, 'Hà Nam', 38000),
(55, 'Hải Dương', 44000),
(56, 'Hải Phòng', 44000),
(57, 'Hưng Yên', 44000),
(58, 'Nam Định', 45000),
(60, 'Thái Bình', 33000),
(61, 'Vĩnh Phúc', 44000),
(62, 'Ninh Bình', 46000),
(63, 'Kon Tum', 50000),
(64, 'Gia Lai', 50000),
(65, 'Đắk Lắk', 48000),
(66, 'Đắk Nông', 48000),
(67, 'Lâm Đồng', 47000),
(68, 'Cần Thơ', 10000),
(69, 'Newyork', 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`) VALUES
(9, 'Thanh 1', 'thanh2.jpg', 'index.php'),
(10, 'Thanh 2', 'thanh3.png', 'shop.php'),
(11, 'Thanh 3', 'thanh1.jpg', 'contact.php'),
(15, 'Hình 4', 'thanh4.png', 'customer_register.php');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`) USING BTREE;

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`mail_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Chỉ mục cho bảng `shipcod`
--
ALTER TABLE `shipcod`
  ADD PRIMARY KEY (`id_ship`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT cho bảng `email`
--
ALTER TABLE `email`
  MODIFY `mail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `shipcod`
--
ALTER TABLE `shipcod`
  MODIFY `id_ship` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
