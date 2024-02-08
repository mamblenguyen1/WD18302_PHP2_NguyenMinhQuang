-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2024 at 09:16 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `Invoice_id` int NOT NULL,
  `Invoice_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_adress` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`Invoice_id`, `Invoice_date`, `status`, `user_name`, `user_adress`, `user_phone`) VALUES
(78, '2024-01-31 12:37:16', 1, 'duytp', 'Đắk Nông', '0456789123');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `Invoice_detail_id` int NOT NULL,
  `Invoice_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`Invoice_detail_id`, `Invoice_id`, `product_id`, `product_quantity`) VALUES
(92, 78, 2, 2),
(93, 78, 10, 2),
(94, 78, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_quantity` int NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_user` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_user` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_user` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_deleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_description`, `product_img`, `created_user`, `created_at`, `updated_user`, `updated_at`, `deleted_user`, `deleted_at`, `is_deleted`) VALUES
(1, 'Smartphone XYZ', 10000000, 50, 'Smartphone hiện đại với camera chất lượng cao và hiệu suất mạnh mẽ.', 'smartphone_xyz.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Laptop ABC', 20000000, 30, 'Laptop siêu mỏng và nhẹ, màn hình cảm ứng và bảo mật vân tay.', 'laptop_abc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'Tai nghe Bluetooth QWERTY', 1500000, 80, 'Tai nghe Bluetooth không dây với chất âm sống động và thiết kế thoải mái.', 'bluetooth_headphones_qwerty.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Smart TV 4K Ultra HD', 30000000, 40, 'Smart TV với độ phân giải 4K Ultra HD, tích hợp trí tuệ nhân tạo và hệ điều hành thông minh.', 'smart_tv_4k.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Máy ảnh Mirrorless XYZ', 15000000, 60, 'Máy ảnh không gương lật với cảm biến lớn và khả năng quay video 4K.', 'mirrorless_camera_xyz.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Đồng hồ thông minh ABC', 5000000, 45, 'Đồng hồ thông minh với nhiều tính năng thông minh, đo sức khỏe và theo dõi hoạt động.', 'smartwatch_abc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Loa Bluetooth Mini', 800000, 25, 'Loa di động nhỏ gọn với âm thanh mạnh mẽ và kết nối Bluetooth thuận tiện.', 'bluetooth_speaker_mini.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 'Ổ cứng SSD Ultra-Fast', 1200000, 70, 'Ổ cứng SSD tốc độ cao, giúp tăng tốc độ đọc và ghi dữ liệu.', 'ssd_ultra_fast.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 'Máy in Laser Monochrome', 8000000, 90, 'Máy in laser đen trắng với khả năng in nhanh và chất lượng cao.', 'laser_printer_monochrome.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, 'Camera An Ninh IP', 2500000, 20, 'Camera an ninh IP giám sát từ xa với chất lượng hình ảnh sắc nét.', 'security_camera_ip.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, 'Tai nghe Gaming RGB', 1200000, 35, 'Tai nghe gaming với đèn RGB đa dạng màu sắc, âm thanh vòm 7.1 và micro chống ồn.', 'gaming_headphones_rgb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, 'Máy pha cà phê tự động', 16000000, 28, 'Máy pha cà phê tự động với nhiều chế độ pha cà phê và thiết kế sang trọng.', 'automatic_coffee_maker.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, 'Loa Soundbar 2.1 Channel', 3500000, 75, 'Soundbar với hệ thống loa 2.1 kênh, tạo ra âm thanh vòm chất lượng cao.', 'soundbar_2.1_channel.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, 'Bàn là làm tóc Ceramic', 1800000, 60, 'Bàn là làm tóc với lớp phủ ceramic, nhiệt độ điều chỉnh và thiết kế chống tóc.', 'ceramic_hair_straightener.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, 'Ổ sạc USB nhanh QuickCharge', 800000, 50, 'Ổ sạc USB nhanh QuickCharge với khả năng sạc nhanh cho điện thoại di động và các thiết bị khác.', 'quickcharge_usb_charger.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, 'Máy lọc không khí HEPA', 3500000, 45, 'Máy lọc không khí với bộ lọc HEPA, loại bỏ bụi, vi khuẩn và mùi khó chịu.', 'hepa_air_purifier.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, 'Máy làm kem tự động', 4500000, 55, 'Máy làm kem tự động với nhiều chế độ làm kem và công nghệ làm kem nhanh.', 'automatic_ice_cream_maker.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, 'Bếp từ đa năng Induction', 10000000, 40, 'Bếp từ đa năng sử dụng công nghệ induction, giúp nấu nướng nhanh chóng và an toàn.', 'induction_cooktop.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, 'Máy sấy quần áo Smart', 6000000, 80, 'Máy sấy quần áo thông minh với nhiều chế độ sấy và tính năng tiết kiệm năng lượng.', 'smart_clothes_dryer.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, 'Camera hành trình Full HD', 1200000, 30, 'Camera hành trình ô tô ghi lại hình ảnh Full HD để bảo vệ an toàn khi lái xe.', 'car_dash_camera_full_hd.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, 'Máy massage toàn thân', 20000000, 35, 'Máy massage toàn thân với nhiều chế độ và chức năng massage linh hoạt.', 'full_body_massager.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, 'Máy sưởi dầu PTC', 8000000, 65, 'Máy sưởi dầu PTC với công nghệ sưởi nhanh, tiết kiệm điện và an toàn.', 'oil_heater_ptc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, 'Loa Karaoke Bluetooth', 1500000, 70, 'Loa Karaoke di động kết nối Bluetooth, hỗ trợ hát Karaoke vui vẻ.', 'karaoke_bluetooth_speaker.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, 'Máy hủy tài liệu Cross-Cut', 2500000, 50, 'Máy hủy tài liệu Cross-Cut với khả năng hủy tài liệu an toàn và hiệu quả.', 'cross_cut_paper_shredder.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, 'Quạt thông hơi Ionizer', 1200000, 75, 'Quạt thông hơi với chế độ ionizer giúp làm sạch không khí và làm mát hiệu quả.', 'ionizer_cooling_fan.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, 'Máy rửa chén tự động', 18000000, 28, 'Máy rửa chén tự động với nhiều chế độ rửa và khả năng tiết kiệm nước.', 'automatic_dishwasher.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(27, 'Máy làm sữa hạt', 3500000, 60, 'Máy làm sữa hạt tự động với nhiều lựa chọn hạt và độ mịn.', 'automatic_soy_milk_maker.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(28, 'Máy xay cà phê Espresso', 6000000, 45, 'Máy xay cà phê Espresso với nhiều cấp độ xay và tính năng tự động.', 'espresso_coffee_grinder.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(29, 'Máy lọc nước RO', 8000000, 55, 'Máy lọc nước RO loại bỏ tạp chất và vi khuẩn, cung cấp nước sạch và an toàn.', 'ro_water_purifier.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, 'Máy hút bụi Robot', 12000000, 40, 'Máy hút bụi tự động với công nghệ AI, lên lịch hút và tránh vật cản.', 'robot_vacuum_cleaner.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_adress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_created` int DEFAULT NULL,
  `user_updated` int DEFAULT NULL,
  `user_deleted` int DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '1',
  `user_phone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_adress`, `user_email`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `user_created`, `user_updated`, `user_deleted`, `user_password`, `role_id`, `user_phone`) VALUES
(45, 'quangmoi1', 'ởđây', 'nguyenvana@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 46, 73, 1, 'Abcd1234', 2, '0123456789'),
(46, 'trantuanb', 'Hồ  Chí   Minh', 'trantuanb@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Efgh5678', 1, '0234567891'),
(47, 'lethih', 'Đà Nẵng', 'lethih@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Ijkl9012', 1, '0345678912'),
(48, 'phamquangc', 'Hải Phòng', 'phamquangc@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Mnop3456', 1, '0456789123'),
(49, 'vuvand', 'Cần Thơ', 'vuvand@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Qrst7890', 1, '0567891234'),
(50, 'hoangthih', 'Huế', 'hoangthih@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Uvwx1234', 1, '0678912345'),
(51, 'nguyenquanm', 'Quảng Ninh', 'nguyenquanm@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Yzab5678', 1, '0789123456'),
(52, 'ngovank', 'Gia Lai', 'ngovank@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Cdef9012', 1, '0891234567'),
(53, 'vuongb', 'Bình Dương', 'vuongb@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Ghij3456', 1, '0902345678'),
(54, 'trananhc', 'An Giang', 'trananhc@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Klmn7890', 1, '0123456780'),
(55, 'nghiat', 'Bà Rịa-Vũng Tàu', 'nghiat@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Opqr1234', 1, '1234567890'),
(56, 'quynhnh', 'Bắc Ninh', 'quynhnh@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Stuv5678', 1, '2345678901'),
(57, 'thut', 'Bạc Liêu', 'thut@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Wxyz9012', 1, '3456789012'),
(58, 'thanhvx', 'Bắc Giang', 'thanhvx@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Abcd3456', 1, '4567890123'),
(59, 'dinhq', 'Bắc Kạn', 'dinhq@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Efgh7890', 1, '5678901234'),
(60, 'giangnt', 'Bến Tre', 'giangnt@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Ijkl1234', 1, '6789012345'),
(61, 'thuytt', 'Bình Định', 'thuytt@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Mnop5678', 1, '7890123456'),
(62, 'quangln', 'Bình Phước', 'quangln@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Qrst9012', 1, '8901234567'),
(63, 'linhnt', 'Bình Thuận', 'linhnt@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Uvwx3456', 1, '9012345678'),
(64, 'khoiv', 'Cà Mau', 'khoiv@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Yzab7890', 1, '0123456789'),
(65, 'maiht', 'Cao Bằng', 'maiht@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Cdef1234', 1, '0234567891'),
(66, 'quangnd', 'Đắk Lắk', 'quangnd@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Ghij5678', 1, '0345678912'),
(67, 'duytp', 'Đắk Nông', 'duytp@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Klmn9012', 1, '0456789123'),
(68, 'tinhb', 'Điện Biên', 'tinhb@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Opqr3456', 1, '0567891234'),
(69, 'hiept', 'Đồng Nai', 'hiept@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Stuv7890', 1, '0678912345'),
(70, 'nhungnn', 'Đồng Tháp', 'nhungnn@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Wxyz1234', 1, '0789123456'),
(71, 'quynht', 'Gia Lai', 'quynht@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Abcd5678', 1, '0891234567'),
(72, 'hieuvt', 'Hà Giang', 'hieuvt@example.com', 0, '2024-01-31 12:35:46', '2024-01-31 12:35:46', '2024-01-31 12:35:46', 1, 73, 1, 'Efgh9012', 1, '0902345678'),
(73, 'quang', 'Vĩnh Long', 'quangnmpc07626@fpt.edu.vn', 0, '2024-01-31 12:36:30', '2024-01-31 12:36:30', '2024-01-31 12:36:30', 34, 73, NULL, 'Quang123', 1, '0769628651'),
(141, 'quang1', NULL, 'nmquang1997@gmail.com', 0, '2024-02-08 16:03:23', '2024-02-08 16:03:23', '2024-02-08 16:03:23', NULL, NULL, NULL, 'Quang123', 1, NULL),
(142, 'quang43', NULL, 'quand3@gamil.com', 0, '2024-02-08 16:12:02', '2024-02-08 16:12:02', '2024-02-08 16:12:02', NULL, NULL, NULL, 'Quang123', 1, NULL),
(143, 'quang213123', NULL, 'Quang44@gamil.com', 0, '2024-02-08 16:12:42', '2024-02-08 16:12:42', '2024-02-08 16:12:42', NULL, NULL, NULL, 'Quang123', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`Invoice_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`Invoice_detail_id`),
  ADD KEY `Invoice_id` (`Invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `Invoice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `Invoice_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`Invoice_id`) REFERENCES `invoices` (`Invoice_id`),
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
