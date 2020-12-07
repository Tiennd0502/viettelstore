-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2020 lúc 08:27 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pro1014`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `slug`, `icon`, `created_time`, `updated_time`) VALUES
(1, 'Điện thoại', 'dien-thoai', '&lt;i class=&quot;fal fa-mobile&quot;&gt;&lt;/i&gt;', 1606526006, 1606527543),
(2, 'Laptop', 'laptop', '&lt;i class=&quot;fal fa-laptop&quot;&gt;&lt;/i&gt;', 1606526058, 1606527558),
(3, 'Máy tính bảng', 'may-tinh-bang', '<i class=\"fal fa-tablet\"></i>', 1606527014, 0),
(4, 'Đồng hồ thông minh', 'thiet-bi-deo', '<i class=\"fal fa-watch-calculator\"></i>', 1606527629, 0),
(5, 'Phụ Kiện', 'phu-kien', '<i class=\"fal fa-headphones\"></i>', 1606527670, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custumers`
--

CREATE TABLE `custumers` (
  `id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evaluates`
--

CREATE TABLE `evaluates` (
  `id` int(11) NOT NULL,
  `custumer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `voted` tinyint(4) NOT NULL,
  `content` text NOT NULL,
  `share` tinyint(1) NOT NULL,
  `created_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` char(200) NOT NULL,
  `created_time` int(11) NOT NULL DEFAULT 0,
  `updated_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(300) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `trademark_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_hot` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `hot` tinyint(4) NOT NULL DEFAULT 0,
  `installment` int(11) NOT NULL,
  `description` text NOT NULL,
  `number_view` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `trademark_id`, `name`, `image`, `image_hot`, `price`, `discount`, `hot`, `installment`, `description`, `number_view`, `active`, `created_time`, `updated_time`) VALUES
(1, 1, 2, 'Samsung Galaxy Note20', '/28-11-2020/Care-SS-Note20-Mint-1 (1).jpg', '/28-11-2020/Note20-t11-2 (1).jpg', 23990000, 5, 1, 0, '<h2>Đặc điểm nổi bật</h2>\r\n\r\n<p><strong>Galaxy Note 20 series chắc chắn sẽ tạo n&ecirc;n cơn sốt khi được thừa hưởng rất nhiều ưu điểm của smartphone Samsung tiền nhiệm v&agrave; kế thừa đặc trưng của d&ograve;ng Note vốn c&oacute;. C&ugrave;ng t&igrave;m hiểu về Galaxy Note 20 qua b&agrave;i viết dưới đ&acirc;y.</strong></p>\r\n\r\n<p><strong><img alt=\"Galaxy Note 20+ xuất hiện bất ngờ trên trang web HTML5 Test\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/06/Galaxy-Note-20-Plus-xuat-hien-1.jpg\" /></strong></p>\r\n\r\n<p><strong>Thiết kế</strong></p>\r\n\r\n<p>Galaxy Note 20 được Samsung trang bị cho một ng&ocirc;n ngữ thiết kế ho&agrave;n to&agrave;n mới pha trộn với những gi&aacute; trị cũ của m&aacute;y. Theo đ&oacute; th&igrave; tổng thể vu&ocirc;ng vức vẫn được giữ lại nhưng m&agrave; Samsung đ&atilde; bo tr&ograve;n nhẹ c&aacute;c đường viền v&agrave; g&oacute;c để cho cảm gi&aacute;c hiện đại hơn.<br />\r\n<br />\r\n<strong>M&agrave;n h&igrave;nh&nbsp;</strong></p>\r\n\r\n<p>M&agrave;n h&igrave;nh Dynamic AMOLED tr&agrave;n cạnh ho&agrave;n hảo v&agrave; kh&ocirc;ng c&ograve;n những viền benzen giới hạn tr&iacute; tưởng tượng nữa. Th&ocirc;ng số được tiết lộ cho biết, Galaxy Note 20 sẽ c&oacute; m&agrave;n h&igrave;nh OLED 6,4 inch, độ ph&acirc;n giải 2.345 x 1.084 pixel, mật độ điểm ảnh 404 ppi, tỷ lệ khung h&igrave;nh 19.5:9. Nếu được trang bị tấm nền LTPO mới th&igrave; c&oacute; khả năng sẽ hỗ trợ tần số 120Hz, nếu sử dụng tấm nền LTPS cũ th&igrave; sẽ chỉ hỗ trợ 60Hz, th&ocirc;ng tin n&agrave;y hiện vẫn chưa thể khẳng định...</p>\r\n\r\n<p><img alt=\"Cảm ứng màn hình Galaxy Note 20 series sẽ do BH và Interflex đảm nhận\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/06/cam-ung-man-hinh-Galaxy-Note-20-1.jpg\" /></p>\r\n\r\n<p>Trước đ&acirc;y, mọi người bảo thiết kế m&agrave;n h&igrave;nh cong kh&ocirc;ng ph&ugrave; hợp với việc sử dụng Spen- Samsung đ&atilde; chứng minh ngược lại, bằng c&aacute;ch đưa m&agrave;n h&igrave;nh cong danh tiếng của h&atilde;ng l&ecirc;n Galaxy Note 20, Note 20 Plus . M&agrave;n h&igrave;nh cong kh&ocirc;ng những cho khả năng hiển thị mượt m&agrave; hơn m&agrave; c&ograve;n gi&uacute;p trải nghiệm s&aacute;ng tạo tr&ecirc;n Note 20 tuyệt vời hơn nữa, khi m&agrave; những c&ocirc;ng cụ, t&iacute;nh năng được đặt ở viền cong m&agrave;n h&igrave;nh, gi&uacute;p những thứ hiển thị tr&ecirc;n bề mặt phẳng ho&agrave;n to&agrave;n chỉ bị giới hạn bởi tr&iacute; tưởng tượng của bạn.</p>\r\n\r\n<p><strong>Hiệu năng&nbsp;</strong></p>\r\n\r\n<p>Tất nhi&ecirc;n một mẫu smartphone với thiết kế v&agrave; m&agrave;n h&igrave;nh đỉnh cao như Galaxy Note 20 sẽ kh&ocirc;ng thiếu đi sức mạnh phần cứng đến từ con chip Exynos mới tr&ecirc;n t&ugrave;y thị trường. D&ugrave; l&agrave; phi&ecirc;n bản n&agrave;o th&igrave; hiệu năng của m&aacute;y cũng thuộc hạng đứng đầu trong thế giới c&ocirc;ng nghệ thời điểm hiện tại.</p>\r\n\r\n<p><img alt=\"Samsung hợp tác cùng BH và Interflex để sản xuất màn hình cảm ứng cho Galaxy Note 20\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/06/cam-ung-man-hinh-Galaxy-Note-20-2.jpg\" /></p>\r\n\r\n<p>Đi k&egrave;m với hiệu năng si&ecirc;u khủng đ&oacute; chắc chắn sẽ l&agrave; một bộ chip đồ họa c&ugrave;ng chip nhớ ho&agrave;n to&agrave;n mới do Samsung sản xuất. Với những phần cứng n&agrave;y th&igrave; Galaxy Note 20 đủ sức trở th&agrave;nh một văn ph&ograve;ng di động đ&uacute;ng nghĩa. Mọi c&ocirc;ng việc của bạn sẽ c&oacute; thể được thực hiện chỉ với một chiếc Galaxy Note 20 nhỏ gọn ngay trong tầm tay.<br />\r\n<br />\r\nHệ thống &acirc;m thanh chuẩn dolby kh&ocirc;ng chỉ ấn tượng m&agrave; c&ograve;n rất gọn g&agrave;ng khi m&agrave; tất cả mọi thứ đều được đặt ở vị tr&iacute; dưới m&agrave;n h&igrave;nh. Với Galaxy Note 20 &acirc;m thanh m&agrave; bạn nhận được sẽ tương đương một mẫu loa di động đắt tiền m&agrave; lại nhỏ gọn hơn rất nhiều lần. Từ đ&oacute; tạo ra trải nghiệm xem phim, nghe nhạc si&ecirc;u chất lượng.</p>\r\n\r\n<p>C&ocirc;ng nghệ cảm biến v&acirc;n tay đ&atilde; c&oacute; nhiều bước tiến triển, đặc biệt l&agrave; c&aacute;c nh&agrave; sản xuất đ&atilde; c&oacute; thể t&iacute;ch hợp cảm biến v&acirc;n tay b&ecirc;n dưới m&agrave;n h&igrave;nh cảm ứng của smartphone.&nbsp;</p>\r\n\r\n<p>B&uacute;t S pen l&agrave; linh hồn của một chiếc Galaxy Note v&agrave; tr&ecirc;n Galaxy Note 20 th&igrave; c&acirc;y b&uacute;t n&agrave;y c&ograve;n mang lại th&ecirc;m những gi&aacute; trị mới, hiện đại hơn, độc đ&aacute;o hơn.&nbsp;</p>\r\n\r\n<p><strong>Camera&nbsp;</strong></p>\r\n\r\n<p><strong><img alt=\"Samsung Galaxy Note 20 dự kiến ra mắt vào tháng 8/2020 tại sự kiện Unpacked\" src=\"https://tintuc.viettelstore.vn/wp-content/uploads/2020/06/cam-ung-man-hinh-Galaxy-Note-20-3.jpg\" /></strong></p>\r\n\r\n<p>Cụm camera của m&aacute;y với ng&ocirc;n ngữ thiết kế h&igrave;nh chữ nhật mới kh&ocirc;ng chỉ ấn tượng trong phong c&aacute;ch m&agrave; t&iacute;nh năng của n&oacute;&nbsp;cũng thực sự mới. Kh&ocirc;ng chỉ c&oacute; t&aacute;c dụng chụp h&igrave;nh m&agrave; c&ograve;n hỗ trợ c&aacute;c t&aacute;c vụ AR thực tế ảo tăng cường.&nbsp;</p>\r\n\r\n<p>Samsung lu&ocirc;n được đ&aacute;nh gi&aacute; cao về m&aacute;y ảnh, đặc biệt về khả năng chụp đ&ecirc;m. Ở lần n&agrave;y, c&oacute; thể h&atilde;ng sẽ cải thiện v&agrave; n&acirc;ng cấp việc chụp thiếu s&aacute;ng tốt hơn nữa để mang lại chiếc điện thoại chụp h&igrave;nh tốt v&agrave; kh&ocirc;ng để c&aacute;c đối thủ qua mặt, mang lại cho người d&ugrave;ng những bức h&igrave;nh lu&ocirc;n đẹp, r&otilde; v&agrave; chất lượng nhất.</p>\r\n', 233, 0, 1606569477, 1606572404);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `screen` varchar(100) NOT NULL,
  `operating_system` varchar(50) NOT NULL,
  `rear_camera` varchar(100) NOT NULL,
  `front_camera` varchar(50) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `internal_memory` varchar(20) NOT NULL,
  `memory_stick` varchar(50) NOT NULL,
  `sim` varchar(50) NOT NULL,
  `battery_capacity` varchar(50) NOT NULL,
  `port_connect` varchar(50) NOT NULL,
  `conversation` varchar(50) NOT NULL,
  `graphic_card` varchar(100) NOT NULL,
  `design` varchar(50) NOT NULL,
  `size` varchar(100) NOT NULL,
  `launch_time` int(11) NOT NULL DEFAULT 0,
  `face_diameter` varchar(25) NOT NULL,
  `face_material` varchar(100) NOT NULL,
  `frame_material` varchar(100) NOT NULL,
  `wire_material` varchar(25) NOT NULL,
  `wire_width` varchar(10) NOT NULL,
  `utilities` varchar(100) NOT NULL,
  `waterproof` varchar(100) NOT NULL,
  `battery_life_time` varchar(50) NOT NULL,
  `object_use` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `screen`, `operating_system`, `rear_camera`, `front_camera`, `cpu`, `ram`, `internal_memory`, `memory_stick`, `sim`, `battery_capacity`, `port_connect`, `conversation`, `graphic_card`, `design`, `size`, `launch_time`, `face_diameter`, `face_material`, `frame_material`, `wire_material`, `wire_width`, `utilities`, `waterproof`, `battery_life_time`, `object_use`) VALUES
(1, 'Dynamic AMOLED 2X, 6.7', 'Android 10', 'Chính 64 MP & phụ 12 MP, 12 MP, TOF 3D', '10 MP', 'Exynos 990 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 1 TB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4500 mAh, có sạc nhanh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trademarks`
--

CREATE TABLE `trademarks` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `path` varchar(100) NOT NULL,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trademarks`
--

INSERT INTO `trademarks` (`id`, `category_id`, `name`, `path`, `created_time`, `updated_time`) VALUES
(1, 1, 'iPhone', '/28-11-2020/iPhone-(Apple)42-b_16 (1).jpg', 1606532648, 0),
(2, 1, 'Samsung', '/28-11-2020/Samsung42-b_25.jpg', 1606532846, 0),
(3, 1, 'Oppo', '/28-11-2020/OPPO42-b_27.png', 1606547706, 0),
(4, 1, 'Vivo', '/28-11-2020/Vivo42-b_50.jpg', 1606547745, 0),
(5, 1, 'Nokia', '/28-11-2020/Nokia42-b_21.jpg', 1606547804, 0),
(6, 1, 'Viettel', '/28-11-2020/viettel.png', 1606547859, 0),
(7, 1, 'Vsmart', '/28-11-2020/Vsmart42-b_40.png', 1606547911, 0),
(8, 1, 'Energizer', '/28-11-2020/Energizer42-b_32.jpg', 1606547949, 0),
(9, 1, 'Realme', '/28-11-2020/Realme42-b_37.png', 1606548018, 0),
(10, 1, 'Xiaomi', '/28-11-2020/Xiaomi42-b_45.jpg', 1606548041, 0),
(11, 1, 'Masstel', '/28-11-2020/Masstel42-b_0.png', 1606548060, 0),
(12, 1, 'Itel', '/28-11-2020/Itel42-b_54.jpg', 1606548094, 0),
(13, 1, 'Wiko', '/28-11-2020/wiko.png', 1606548144, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `active` bit(1) NOT NULL DEFAULT b'0',
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `avatar`, `email`, `phone`, `address`, `status`, `active`, `created_time`, `updated_time`) VALUES
(1, 'admin', '$2y$10$5ahjK0sgY.7zAA8TGG.cLOz.ci5Z2DId926RmNWrFvRFu9KJlBikq', 'Admin Nguyen', 'avatar-1.jpg', 'Admin01@gmail.com', '0979081574', 'Số 13 Thanh Vinh 8, Đà Nẵng', b'1', b'1', 1602861151, 1602861151);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `custumers`
--
ALTER TABLE `custumers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `evaluates`
--
ALTER TABLE `evaluates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custumer_idfk_2` (`custumer_id`),
  ADD KEY `product_idfk_4` (`product_id`);

--
-- Chỉ mục cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id__ibfk1` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order__ibfk_1` (`order_id`),
  ADD KEY `productId__pifk_1` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category__ibfk_1` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `custumers`
--
ALTER TABLE `custumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `evaluates`
--
ALTER TABLE `evaluates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `evaluates`
--
ALTER TABLE `evaluates`
  ADD CONSTRAINT `custumer_idfk_2` FOREIGN KEY (`custumer_id`) REFERENCES `custumers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_idfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `product_id__ibfk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order__ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productId__pifk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  ADD CONSTRAINT `category__ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
