-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 28, 2022 lúc 09:33 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom9`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Samsung\r\n'),
(2, 'Xiaomi'),
(3, 'Oppo'),
(4, 'Huawei'),
(5, 'Apple'),
(6, 'Asus');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `feature` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `sold` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10250005 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `created_at`, `sold`, `in_stock`) VALUES
(11, 'OPPO Find X3 Pro 5G', 3, 1, 18790000, 'oppo-find-x3-pro-5g-3.jpg', 'Thiết kế hoàn thiện nguyên khối, bền bỉ - Thiết kế nhôm nguyên khối sang trọng, chống chọi lực va đập hiệu quả\r\nMàn hình sắc nét, hiển thị màu sắc rực rỡ - Màn hình 6.7\" AMOLED đạt chuẩn 2K, 120Hz, hiển thị 1 tỷ màu\r\nCấu hình mạnh mẽ, chiến game cực đỉnh - Bộ vi xử lý Snapdragon 888, 12GB RAM và 256GB bộ nhớ trong\r\nCamera chụp ảnh ấn tượng, chống rung ổn định - Bộ 4 camera lên đến 50MP, hỗ trợ HDR và tối ưu chụp đêm sắc nét\r\nDung lượng pin khá lớn đi kèm nhiều tiện ích - Viên pin dung lượng 4500 mAh, sạc nhanh 65W, sạc không dây 30W', 1, '2022-11-14 02:57:26', 15, 50),
(8, 'Xiaomi Pad 5', 2, 3, 7990000, 'xiaomi-mi-pad-5.jpg', 'Thiết kế mỏng nhẹ, tinh tế - Thiết kế vuông vức, chỉ dày khoảng 7mm và nặng 500g\r\nTrải nghiệm không gian không giới hạn - Màn hình 11\" IPS LCD, độ phân giải 2K, hỗ trợ HDR10 và 120Hz\r\nHiệu năng vượt trội - Chip Snapdragon 860 mạnh mẽ, RAM 6 GB, GPU Adreno 640\r\nDung lượng pin dồi dào - Viên pin khủng 8720mAh, hỗ trợ sạc nhanh 33W', 0, '2022-11-14 02:50:20', 0, 50),
(9, 'Tai nghe không dây Xiaomi Buds 3T Pro', 2, 4, 1990000, 'Xiaomi-buds.jpg', 'Trải nghiệm âm thanh chân thật với hiệu ứng âm thanh vòm\r\nKhả năng chống ồn lên đến 40dB, loại bỏ 99% tiếng ồn\r\nTrò chuyện mà không cần tháo tai nghe với tính năng xuyên âm được tích hợp\r\nĐàm thoại rõ ràng không với 3 micro khử ồn\r\n6 giờ sử dụng cho 1 lần, 24 giờ với hộp sạc', 0, '2022-11-14 02:53:25', 0, 50),
(10, 'Đồng hồ thông minh Xiaomi Watch S1 Active', 2, 5, 3970000, 'xiaomi-watch.png', 'Tập luyện thả ga - 117 chế độ thể thao, 19 chế độ chuyên nghiệp\r\nKết nối không ngừng - Nhận cuộc gọi thông qua kết nối bluetooth với điện thoại\r\nTích hợp GPS - Ghi lại quãng đường luyện tập tốt hơn\r\nHoạt động bền bỉ - 12 ngày ở chế độ thông thường\r\nHiển thị sắc nét - Màn hình Amoled 1.43 inch rực rỡ, không ngại nắng chói', 0, '2022-11-14 02:56:52', 0, 50),
(6, 'Xiaomi 12 Pro (5G)', 2, 1, 22390000, 'Xiaomi-12-pro.png', 'Cân mọi tác vụ với CPU thế hệ mới - Vi xử lí Snapdragon 8 Gen 1 cùng RAM 12GB\r\nTrải ngiệm giải trí hoàn hảo với màn hình tràn viền sắc nét - Kích thước 6.73 inches, AMOLED\r\nCụm camera đa chức năng, lưu giữ mọi khoảnh khắc - Camera chính 50 MP đa dạng chế độ chụp\r\nThoải mái sử dụng cả ngày dài - Pin 4600 mAh, hỗ trợ sạc nhanh 120W', 0, '2022-11-14 02:48:11', 0, 50),
(7, 'Laptop Xiaomi RedmiBook 15', 2, 2, 13290000, 'xiaomiredmibookaaaa15.jpg', 'Ram 8GB, Chip Intel Core i5 thế hệ 11 - Xử lý liền mạch các tác vụ hằng ngày\r\nLưu trữ thoải mái, khởi động nhanh chóng - 512GB SSD\r\nMàn hình FHD, kích thước 15.6 inch - Màn hình lớn cải thiện chất lượng làm việc\r\nMỏng và nhẹ - Nặng chỉ 1.8kg, dày 19.9mm\r\nThực hiện cuộc gọi qua video - Tích hợp camera 720P', 0, '2022-11-14 02:50:20', 12, 50),
(1, 'Samsung Galaxy Z Fold4', 1, 1, 39790000, 'samsung_galaxy_z_fold_4.jpg', 'Camera mắt thần bóng đêm cho trải nghiệm chụp ảnh ấn tượng - Camera chính: 50MP\r\nKhai mở trải nghiệm di động linh hoạt biến hóa - Màn hình ngoài 6.2\" cùng màn hình chính 7.6\"\" độc đáo\r\nHiệu năng mạnh mẽ đến từ dòng chip cao cấp của Qualcomm - Snapdragon 8 Plus Gen 1\r\nViên pin ấn tượng, sạc nhanh tức tốc - Pin 4,400 mAh, sạc nhanh 25 W', 1, '2022-11-14 02:36:06', 30, 50),
(3, 'Samsung Galaxy Tab S8 Ultra 5G', 1, 3, 25990000, 'tab_s8_ultra.jpg', 'Chiếc Samsung Galaxy Tab S lớn nhất, hiển thị sống động - 14.6\", Super AMOLED 120Hz\r\nThế hệ S Pen hoàn toàn mới - Độ nhạy cao, độ trễ thấp 2,8ms, nét bút mảnh\r\nGhi lại khoảnh khắc đắt giá - Cụm 2 camera trước 12MP\r\nSử dụng cả ngày dài - Pin khủng 11.200 mAh, sạc nhanh siêu tốc 45W', 1, '2022-11-14 02:36:06', 20, 50),
(4, 'Tai nghe Bluetooth Samsung Galaxy Buds Pro', 1, 4, 2190000, 'buds-pro.jpg', 'Chống ồn chủ động ANC lọc mọi tạp âm của môi trường\r\nChế độ xuyên âm cho phép nghe thấy giọng nói của người xung quanh\r\nÂm thanh 3D với loa 2 chiều (loa trầm 11mm,loa bổng 6.5mm)\r\n3 micro khử ồn hiệu quả\r\nThiết kế hạt đậu ôm khít tai,không rơi khi vận động\r\nKháng nước IPX7,không lo vào nước khi tập luyện\r\nPin 5 giờ và 13 giờ khi dùng cùng hộp sạc', 0, '2022-11-14 02:47:34', 0, 50),
(5, 'Samsung Galaxy Watch5 Pro', 1, 5, 10250000, 'watch-5-pro.jpg', 'Siêu bền bỉ - Khung viền titaniunm, mặt kính sapphire trống trầy xước\r\nHiệu năng mạnh mẽ - Exynos W920 tốc độ xử lý nhanh chóng, hệ điều hành WearOS hỗ trợ nhiều ứng dụng trên Playstore\r\nTheo dõi sức khoẻ - Điện tâm đồ ECG, đo huyết áp, đo nhịp tim, đo nồng độ oxy trong máu (SpO2), đếm số bước chân...\r\nViên pin 590 mAh cho thời gian sử dụng lên đến 80 giờ, sạc 45% trong 30 phút\r\nChống nước 5ATM - Thoải mái mang đồng hồ đi mưa, rửa tay', 1, '2022-11-14 02:43:49', 10, 50),
(13, 'OPPO Pad Air', 3, 3, 6990000, 'oppo-pad.png', 'Thiết kế dẫn đầu xu hướng - Thanh mảnh, mỏng nhẹ chỉ 440g\r\nKhông gian hiển thị mãn nhãn - Màn hình IPS LCD kích thước 10.36 inch độ phân giải 1200 x 2000 Pixels\r\nCấu hình ổn định, xử lí đa tác vụ - Qualcomm Snapdragon 680, 4GB\r\nHỗ trợ chụp ảnh quay phim rõ nét - Camera 8 MP với khẩu độ f/2.0, lấy nét tự động liên tục', 0, '2022-11-14 02:57:26', 0, 50),
(14, 'Tai nghe Bluetooth OPPO Enco Buds 2', 3, 4, 1090000, 'oppo-bud.jpg', 'Driver 10mm mạ Titan mang đến chất âm vô cùng sống động\r\nTận hưởng âm thanh liên tục 7h với tai nghe và 28h khi kèm hộp sạc.\r\nChống nước IPX4 không lo mồ hôi và mưa phùn khi luyện tập thể thao \r\nĐIều khiển dễ dàng với thao tác chạm cảm ứng.\r\nKết nối ổn định và khoảng cách kết nối giữa điện thoại và tai nghe rộng hơn với bluetooth 5.2.', 0, '2022-11-14 03:04:10', 0, 50),
(15, 'Đồng hồ thông minh Oppo Watch 2', 3, 5, 5990000, 'dong-ho-thong-minh-oppo-watch-2.jpg', 'Thiết kế sang trọng, màn hình AMOLED hiển thị sắc nét\r\nHỗ trợ GPS cùng nhiều tính năng theo dõi sức khỏe\r\nCấu hình mạnh với chip Qualcomm Snapdragon Wear 4100 và Apollo 4s', 1, '2022-11-14 03:04:10', 25, 50),
(16, 'Huawei P30 Pro', 4, 1, 23990000, 'huawei-p30.png', 'Thiết kế viền mỏng, màn hình giọt nước tích hợp cảm biến vân tay\r\nCấu hình mạnh mẽ với chip Kirin 980, chất lượng âm thanh được cải tiến\r\nHệ thống camera đỉnh cao với ống kính tiềm vọng\r\nDung lượng pin lên đến 4200mAh đi kèm nhiều công nghệ hiện đại', 0, '2022-11-14 03:10:45', 0, 50),
(17, 'Laptop Huawei Matebook 14', 4, 2, 23490000, 'huawei-matebook.png', 'Thiết kế thời thượng - vỏ nhôm cao cấp, nhẹ chỉ 1.49kg\r\nMàn hình cảm ứng độ phân giải 2K, độ phủ màu 100% sRGB - thỏa sức xem phim hay edit hình ảnh\r\n16GB Ram, chip intel core i5 thế hệ 12 - Hiệu năng vượt trội, không ngại các tác vụ nặng\r\n512GB SSD - Giúp máy khởi động nhanh hơn, lưu trữ các file nặng\r\nBàn phím tích hợp led cho trải nghiệm làm việc hiệu quả hơn', 0, '2022-11-14 03:10:45', 20, 50),
(18, 'Huawei MatePad 11', 4, 3, 9900000, 'huawei-tablet-matepad-11.jpg', 'Thiết kế tối giản, màu sắc thanh lịch - chỉ mỏng khoảng 7.25 mm và trọng lượng 485 g\r\nHiển thị sắc nét từng khung hình - Màn hình 10.9 inch, độ phân giải là 2K, tấm nền IPS LCD, hỗ trợ HDR\r\nHiệu năng mạnh mẽ đến từ chip Snapdragon 865 đi kèm RAM 6GB 128GB\r\nViên pin lớn, sử dụng cả ngày dài - Viên pin lớn 7250 mAh sử dụng từ 10 - 12h, tha hồ xử lí đa tác vụ', 0, '2022-11-14 03:19:49', 0, 50),
(19, 'Tai nghe không dây Huawei Freebuds 4', 4, 4, 1990000, 'huawei-freebuds-4.jpg', 'Driver 14.3mm cho trải nghiệm âm thanh chất lượng cao\r\nTự động chọn chế độ chống ồn phù hợp với người dùng\r\nChế độ giọng nói loại bỏ âm thanh bên ngoài khi ghi âm\r\nKết nối cùng lúc 2 thiết bị,cho phép chuyển đổi nhanh chóng\r\nCông nghệ giảm độ trễ chỉ còn 90ms', 1, '2022-11-14 03:19:49', 37, 50),
(20, 'Đồng hồ thông minh Huawei Watch GT3 Pro', 4, 5, 12990000, 'watch-gt-3-pro_1.jpg', 'Đồng hồ thông minh Huawei Watch GT3 Pro 43mm dây gốm – Sang trọng, đẳng cấp\r\nHoàn thiện từ chất liệu đẳng cấp, thu hút mọi ánh nhìn\r\nBảo vệ sức khỏe với ECG, công nghệ chăm sóc sức khỏe tiên tiến\r\n', 1, '2022-11-14 03:21:47', 24, 50),
(21, 'iPhone 14 Pro Max', 5, 1, 49990000, 'iphone-14.png', 'Màn hình Dynamic Island - Sự biến mất của màn hình tai thỏ thay thế bằng thiết kế viên thuốc, OLED 6,7 inch, hỗ trợ always-on display\r\nCấu hình iPhone 14 Pro Max mạnh mẽ, hiệu năng cực khủng từ chipset A16 Bionic\r\nLàm chủ công nghệ nhiếp ảnh - Camera sau 48MP, cảm biến TOF sống động\r\nPin liền lithium-ion kết hợp cùng công nghệ sạc nhanh cải tiến', 1, '2022-11-14 03:23:15', 32, 50),
(22, 'Macbook Pro 16 M1 Max', 5, 2, 82590000, 'macbook.png', 'Macbook Pro 16 M1 Max 10 CPU - 32 GPU 32GB 1TB 2021 Chính hãng Apple Việt Nam\r\nMàn hình tai thỏ, màn hình rõ nét\r\nHiệu năng ấn tượng với Apple M1 Max  \r\nVề cấu hình trên màn hình độ phân cao cùng tấm nền Liquid Retina, có khả năng hiển thị màu sắc rực rỡ nhưng tiết kiệm được năng lượng.', 1, '2022-11-14 03:23:15', 30, 50),
(23, 'iPad Pro 11', 5, 3, 48990000, 'ipad-pro-13.jpg', 'Chip M2 thực sự chuyên nghiệp, thực sự mạnh mẽ\r\nMàn hình Retina 11 inch lộng lẫy và trung thực\r\niPadOS nâng cao trải nghiệm Pro\r\nTầm nhìn rộng mở 122 độ của camera selfie\r\nGiữ bạn luôn ở trung tâm trong mọi khuôn hình\r\nCông thức hoàn hảo của hệ thống camera xuất sắc\r\nSử dụng Wi-Fi 6E, kết nối nhanh gấp đôi thế hệ cũ\r\nKhai phá tiềm năng vô tận nhờ thiết bị ngoại vi\r\nPhát huy tối đa sức mạnh của Apple Pencil\r\nTương thích hoàn hảo với một triệu ứng dụng', 1, '2022-11-14 03:29:22', 0, 50),
(24, 'Apple AirPods Pro 2022', 5, 4, 6390000, 'airpod.png', 'Hỗ trợ tính năng chống ồn chủ động ANC 2X\r\nTính năng xuyên âm giúp người dùng nghe được âm thanh của môi trường xung quanh\r\nThời gian sử dụng 6 giờ khi bật chế độ chống ồn, 30 giờ khi đi kèm với hộp sạc\r\nTrang bị cổng sạc Lightning, 5 phút sạc cho 1 giờ sử dụng\r\nKích hoạt trợ lý ảo Siri bằng cách gọi \"\"Hey Siri\"\"\r\nChống nước chuẩn IPX4 cho phép thoải mái luyện tập mà không lo thấm mồ hôi\r\nCó khả năng định vị tai nghe bị thất lạc', 0, '2022-11-14 03:32:30', 0, 50),
(25, 'Apple Watch Ultra', 5, 5, 22990000, 'apple-watch-ultra.jpg', 'Bền bỉ trước mọi thử thách - Khung viền titan, mặt kính Sapphire mang lại độ bền chuẩn quân đội MIL-STD 810H\r\nTrợ lý sức khoẻ 24/24 - Cảm biến nhịp tim, cảm biến nhiệt, nhận diện va chạm xe\r\nTập luyện chuyên nghiệp - Tích hợp nhiều chế độ thể thao đo như lặn, bơi, đạp xe\r\nLặn sâu đến 40m, chống bụi xâm nhập - Đạt chứng nhận EN13319, IPX6\r\nPin lên đến 36 giờ khi sử dụng thông thường, 60 giờ ở chế độ tiết kiệm pin\r\nNhiều tính năng tiện lợi - Nghe nhạc trên đồng hồ, trợ lý ảo', 1, '2022-11-14 03:33:18', 0, 50),
(26, 'Laptop Asus Rog Strix Scar 15', 6, 2, 77990000, 'asus-rog-strix.png', 'Thiết kế chuẩn Gaming với đèn LED RGB ấn tượng, nổi tượng\r\nChơi game sống động với màn hình lớn, thiết kế bàn phím đặc biệt\r\nCầu hình mạnh mẽ và ổ cứng dung lượng khủng\r\nTản nhiệt được cải tiến, kết nối nâng cao', 1, '2022-11-14 08:19:24', 1, 50),
(10250004, 'TEST 1', 6, 2, 77990000, 'asus-rog-strix.png', 'Thiết kế chuẩn Gaming với đèn LED RGB ấn tượng, nổi tượng\r\nChơi game sống động với màn hình lớn, thiết kế bàn phím đặc biệt\r\nCầu hình mạnh mẽ và ổ cứng dung lượng khủng\r\nTản nhiệt được cải tiến, kết nối nâng cao', 1, '2022-11-14 08:19:24', 1, 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Phone'),
(2, 'Laptop'),
(3, 'Tablet'),
(4, 'Earphones'),
(5, 'Watch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role_id`, `email`, `phone`, `address`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1, 'giaosu@gmail.com', '0912134312', 'Binh Duong'),
(2, 'user1', '202cb962ac59075b964b07152d234b70', 2, 'giaosu@gmail.com', '0912134312', 'Lam Dong'),
(3, 'thang', '202cb962ac59075b964b07152d234b70', 2, 'thangdt@gmail.com', '0912134312', 'Lam Dong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_user`, `id_product`) VALUES
(0, 1, '10'),
(1, 1, '7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
