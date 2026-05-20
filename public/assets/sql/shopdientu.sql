-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 03:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdientu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_quyen` int(11) NOT NULL COMMENT '1: Admin, 2: Kế Toán, 3: Nhân Viên',
  `ho_va_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `que_quan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` int(11) NOT NULL,
  `cccd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_block` int(11) NOT NULL,
  `hash_reset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `id_quyen`, `ho_va_ten`, `ngay_sinh`, `que_quan`, `so_dien_thoai`, `gioi_tinh`, `cccd`, `is_block`, `hash_reset`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@master.com', '$2y$10$c1DAuOTWrg2B3zedRvPHXOvyBqf6vezGlxW1pq.N9ZpiPchBs5S4C', 1, 'Admin', '2002-10-15', 'Đà Nẵng', '0333314445', 1, '6560163338', 0, NULL, NULL, NULL),
(3, 'LeHien', 'hienlemanh2002@gmail.com', '$2y$10$VKa40MOBulvtDCPy7muO1OEBt8LbNhXnFgSX0x5sBzy8SnSiN9lae', 2, 'Lê Mạnh Hiền', '2023-08-31', 'Quảng Ngãi', '0377191497', 1, '34928893412', 0, NULL, '2023-08-31 08:18:46', '2023-08-31 08:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `cau_hinhs`
--

CREATE TABLE `cau_hinhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_cau_hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cau_hinhs`
--

INSERT INTO `cau_hinhs` (`id`, `ten_cau_hinh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, '6GB-256GB', 1, '2023-09-19 09:15:18', '2023-09-19 09:15:18'),
(2, '6GB-512GB', 1, '2023-09-19 09:15:27', '2023-09-19 09:15:27'),
(3, '6GB-1TB', 1, '2023-09-19 09:15:34', '2023-09-19 09:15:34'),
(4, '8GB-256GB', 1, '2023-09-19 09:15:51', '2023-09-19 09:15:51'),
(5, '8GB-512GB', 1, '2023-09-19 09:15:57', '2023-09-19 09:15:57'),
(6, '8GB-1TB', 1, '2023-09-19 09:16:08', '2023-09-19 09:16:08'),
(7, '16GB-512GB', 1, '2023-09-19 09:16:24', '2023-09-19 09:16:24'),
(8, '16GB-1TB', 1, '2023-09-19 09:16:33', '2023-09-19 09:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `don_hang_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `so_luong`, `created_at`, `updated_at`) VALUES
(13, 55761, 16, 1, '2023-09-22 08:17:28', '2023-09-22 08:17:28'),
(14, 62731, 6, 1, '2023-09-22 08:18:10', '2023-09-22 08:18:10'),
(15, 62731, 8, 1, '2023-09-22 08:18:10', '2023-09-22 08:18:10'),
(16, 62731, 4, 1, '2023-09-22 08:18:10', '2023-09-22 08:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `chuc_nangs`
--

CREATE TABLE `chuc_nangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_chuc_nang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chuc_nangs`
--

INSERT INTO `chuc_nangs` (`id`, `ten_chuc_nang`, `ten_group`, `created_at`, `updated_at`) VALUES
(100, 'Tạo Mới product', 'Product', NULL, NULL),
(101, 'Xem Thông Tin sản phẩm', 'Product', NULL, NULL),
(102, 'Đổi Trạng Thái Product', 'Product', NULL, NULL),
(103, 'Xem Chi Tiết Product', 'Product', NULL, NULL),
(104, 'Xóa Product', 'Product', NULL, NULL),
(105, 'Cập Nhật Product', 'Product', NULL, NULL),
(106, 'Tạo Mới Tài Khoản Khách Hàng', 'Tài Khoản Khách', NULL, NULL),
(107, 'Lấy Thông Tin Khách Hàng', 'Tài Khoản Khách', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `hinh_anh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Gamming', 'https://www.anphatpc.com.vn/media/news/1308_Laptop-Gaming-tot-nhat-2022.jpg', 1, '2023-09-19 08:57:45', '2023-09-19 08:57:45'),
(2, 'Học tập - văn phòng', 'https://cdn.tgdd.vn/Files/2021/02/21/1329129/toplaptop10_799x447.jpg', 1, '2023-09-19 08:54:39', '2023-09-19 08:55:07'),
(4, 'Đồ họa - kĩ thuật', 'https://laptop88.vn/media/news/1303_laptopvedohoatot3.png', 1, '2023-09-19 08:55:33', '2023-09-19 08:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_tai_khoans`
--

CREATE TABLE `danh_sach_tai_khoans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_va_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_block` int(11) NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change_password_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_sach_tai_khoans`
--

INSERT INTO `danh_sach_tai_khoans` (`id`, `email`, `password`, `so_dien_thoai`, `ngay_sinh`, `dia_chi`, `ho_va_ten`, `is_block`, `tinh_trang`, `created_at`, `updated_at`, `active_code`, `change_password_code`, `checkout_code`) VALUES
(2, 'hienlemanh2002@gmail.com', '$2y$10$gAceQ3aeCnRnSt08ZG.scO.fWG2lkZNq33N48maxw6MglBdsHJ1r6', '0377191497', '2023-09-19', 'Quảng ngãi', 'Lê Mạnh Hiền', 0, 1, '2023-09-19 08:48:13', '2023-09-22 08:18:04', NULL, 'e7132d1f-de04-4df2-bfb7-c938a6e65146', NULL),
(3, 'lemanhhien2002@gmail.com', '$2y$10$3cXh6WTSSjjtd9DjxYa6/e4nsaMY2q5WDJBoQYWmXrGgKUPO4uxja', '0377191497', '2023-09-20', 'QJJAS', 'Lê Van a', 0, 1, '2023-09-19 11:04:50', '2023-09-19 23:18:52', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ten_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_thuc_thanh_toan` int(11) NOT NULL COMMENT '1: thanh toán khi nhân hàng, 2: Chuyển khoản',
  `trang_thai` int(11) NOT NULL COMMENT '1: đang xử lý, 2: đang giao, 3: đã giao, 0: đã hủy',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `user_id`, `tong_tien`, `ten_nguoi_nhan`, `dia_chi`, `so_dien_thoai`, `hinh_thuc_thanh_toan`, `trang_thai`, `created_at`, `updated_at`) VALUES
(55761, '2', 20015000, 'Lê Mạnh Hiền', 'Quảng Ngãi', '0377191497', 1, 4, '2023-09-22 08:17:28', '2023-09-22 08:27:43'),
(62731, '2', 64275000, 'Lê Mạnh Hiền', 'Quảng Ngãi', '0377191497', 1, 4, '2023-09-22 08:18:10', '2023-09-22 08:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `user_id`, `product_id`, `so_luong`, `created_at`, `updated_at`) VALUES
(8, 3, 13, 1, '2023-09-19 23:20:16', '2023-09-19 23:20:16'),
(9, 3, 41, 1, '2023-09-19 23:20:28', '2023-09-19 23:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_mau_sac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mau_sacs`
--

INSERT INTO `mau_sacs` (`id`, `ten_mau_sac`, `hinh_anh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Đen', 'https://haycafe.vn/wp-content/uploads/2022/03/background-black-background-den.jpg', 1, '2023-08-23 11:36:35', '2023-08-24 01:19:48'),
(2, 'Đỏ', 'https://antimatter.vn/wp-content/uploads/2022/05/background-do-sang-trong-1.jpg', 1, '2023-08-23 11:40:08', '2023-08-24 01:17:11'),
(4, 'Cam', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcnk_VQtlNul6nquL14ORwZQ0Yquy5IWmHDQ&usqp=CAU', 1, '2023-08-24 01:28:54', '2023-08-24 01:28:54'),
(5, 'Hồng', 'https://tophinhanhdep.com/wp-content/uploads/2021/10/Plain-Pink-Wallpapers.jpg', 1, '2023-08-24 01:29:27', '2023-08-24 01:29:27'),
(7, 'Trắng', 'https://img.freepik.com/premium-photo/top-view-abstract-paper-texture-background_225709-2718.jpg?w=2000', 1, '2023-08-24 01:43:38', '2023-08-24 01:43:38'),
(8, 'Nâu', 'https://phunugioi.com/wp-content/uploads/2021/11/Background-nau.jpg', 1, '2023-08-24 08:58:38', '2023-08-24 08:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_22_161552_create_thuong_hieus_table', 1),
(6, '2023_08_23_181237_create_mau_sacs_table', 1),
(7, '2023_08_24_141917_create_danh_mucs_table', 1),
(8, '2023_08_24_161746_create_danh_sach_tai_khoans_table', 1),
(9, '2023_08_25_000258_create_admins_table', 1),
(10, '2023_08_27_055447_create_products_table', 1),
(11, '2023_08_27_055513_create_product_variants_table', 1),
(12, '2023_08_30_092959_create_quyens_table', 1),
(13, '2023_08_30_093732_create_quyen_chuc_nangs_table', 1),
(14, '2023_08_30_101752_create_chuc_nangs_table', 1),
(15, '2023_09_07_153441_them_cot', 1),
(16, '2023_09_07_162139_create_gio_hangs_table', 1),
(17, '2023_09_10_072543_create_don_hangs_table', 1),
(18, '2023_09_10_073501_create_chi_tiet_don_hangs_table', 1),
(19, '2023_09_10_155143_checkout_code', 1),
(20, '2023_09_12_165810_cau_hinh', 1),
(21, '2023_09_16_063140_them_cot_2', 1),
(22, '2023_09_19_174919_create_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `danh_muc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thuong_hieu_id` int(11) NOT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `gia` int(11) NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ten_san_pham`, `hinh_anh`, `mo_ta`, `danh_muc_id`, `thuong_hieu_id`, `luot_xem`, `gia`, `tinh_trang`, `created_at`, `updated_at`) VALUES
(1, 'Apple MacBook Air M1', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', '<p>M1 sẽ c&oacute; 8 nh&acirc;n, bao gồm 4 nh&acirc;n hiệu suất cao v&agrave; 4 nh&acirc;n hiệu suất thấp mang đến sức mạnh vượt trội cho thiết bị rất. Sức mạnh tr&ecirc;n M1 256GB hơn 98% so với c&aacute;c laptop Windows v&agrave; hiệu năng vượt trội hơn so với c&aacute;c phi&ecirc;n bản Air sử dụng chip Intel.</p>\n\n<p><img alt=\"Chip M1, hiệu năng cực đỉnh\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/macbook/Air/M1-2020/macbook-air-2020-m1-3.jpg\" /></p>\n\n<p>RAM 8GB v&agrave; card đồ họa VGA 7-core GPU gi&uacute;p m&aacute;y c&oacute; thể xử l&yacute; nhanh ch&oacute;ng c&aacute;c t&aacute;c vụ hằng ng&agrave;y. Ngo&agrave;i ra với việc trang bị ổ cứng SSD dung lượng 256GB sẽ cho người d&ugrave;ng tốc độ đọc, sao ch&eacute;p, ghi cực nhanh so với ổ HDD th&ocirc;ng thường.</p>\n\n<h3><strong>B&agrave;n ph&iacute;m Magic Keyboard, Touch ID tiện lợi</strong></h3>\n\n<p><strong>Macbook Air M1 2020</strong>&nbsp;được trang bị b&agrave;n ph&iacute;m Magic Keyboard tr&ecirc;n cơ chế cắt ch&eacute;o với bước ph&iacute;m chỉ 1mm. M&aacute;y c&oacute; ph&iacute;m Esc vật l&yacute; đồng thời cụm ph&iacute;m mũi t&ecirc;n được bố tr&iacute; theo kiểu chữ &quot;T&quot; đảo ngược. Với thiết kế n&agrave;y mang lại cho người d&ugrave;ng trải nghiệm đ&aacute;nh m&aacute;y ch&iacute;nh x&aacute;c, &ecirc;m &aacute;i v&agrave; v&ocirc; c&ugrave;ng thoải m&aacute;i.</p>\n\n<p><img alt=\"Bàn phím Magic Keyboard, Touch ID tiện lợi\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/macbook/Air/M1-2020/macbook-air-2020-m1-2.jpg\" /></p>\n\n<p>Touch ID được t&iacute;ch hợp v&agrave;o MacBook Air mang đến độ bảo mật cao, an to&agrave;n tuyệt đối. Chỉ cần đặt ng&oacute;n tay v&agrave;o cảm biến Touch ID sẽ gi&uacute;p m&aacute;y t&iacute;nh MacBook Air mở kh&oacute;a dễ d&agrave;ng. Sử dụng v&acirc;n tay để truy cập v&agrave;o c&aacute;c t&agrave;i liệu, ghi ch&uacute; đồng thời thiết lập hệ thống đ&atilde; kh&oacute;a.</p>\n\n<p>B&ecirc;n cạnh đ&oacute;,bạn cũng c&oacute; thể sử dụng Apple Pay để thanh to&aacute;n an to&agrave;n v&agrave; tiện dụng khi mua sắm trực tuyến. C&aacute;c thao t&aacute;c nhập th&ocirc;ng tin giao h&agrave;ng hay h&oacute;a đơn, hay c&aacute;c chi tiết thẻ của bạn sẽ được bảo mật tuyệt đối.</p>\n\n<h3><strong>Thunderbolt 3 gi&uacute;p kết nối dễ d&agrave;ng, thời lượng pin ấn tượng</strong></h3>\n\n<p>MacBook Air M1 256GB 2020&nbsp;kết nối dễ d&agrave;ng với c&aacute;c thiết bị bằng Thunderbolt. Đ&acirc;y l&agrave; giao diện phần cứng được tận dụng cổng USB Type-C thuận nghịch mang đến đ&ocirc;i tốc độ gấp đ&ocirc;i so với người tiền nhiệm. Cổng c&ograve;n hỗ trợ USB4, cho ph&eacute;p kết nối với nhiều thiết bị ngoại vi hơn, kể cả m&agrave;n h&igrave;nh Apple Pro Display XDR c&oacute; độ ph&acirc;n giải cao nhất l&agrave; 6K.</p>\n\n<p><img alt=\"Thunderbolt 3 giúp kết nối dễ dàng, thời lượng pin ấn tượng\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/macbook/Air/M1-2020/macbook-air-2020-m1-1.jpg\" /></p>\n\n<p>Do sử dụng chip M1 rất &iacute;t tỏa nhiệt, n&ecirc;n m&aacute;y rất tiết kiệm điện năng mang lại khả năng tối ưu pin v&agrave; thời gian sử dụng. Bạn c&oacute; thể thoải m&aacute;i lướt web trong v&ograve;ng 15 tiếng v&agrave; 18 tiếng xem video m&agrave; kh&ocirc;ng lo hết pin.</p>\n\n<h2><strong>So s&aacute;nh Macbook Air M1 2020 với Macbook Air M2</strong></h2>\n\n<table>\n	<tbody>\n		<tr>\n			<td>&nbsp;</td>\n			<td><strong>MacBook Air M1 2020</strong></td>\n			<td><strong>Macbook Air M2 2022</strong></td>\n		</tr>\n		<tr>\n			<td>\n			<p>Gi&aacute; ni&ecirc;m yết</p>\n			</td>\n			<td>\n			<p>28.990.000đ</p>\n			</td>\n			<td>\n			<p>32.990.000đ</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>M&agrave;n h&igrave;nh</p>\n			</td>\n			<td>\n			<p>13.3 inches</p>\n\n			<p>Retina Display</p>\n\n			<p>2560 x 1600 pixels (2K)</p>\n\n			<p>Tấm nền IPS</p>\n			</td>\n			<td>\n			<p>13 inches</p>\n\n			<p>Liquid Retina Display</p>\n\n			<p>2560 x 1664 pixels</p>\n\n			<p>Tấm nền IPS</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>CPU - GPU</p>\n			</td>\n			<td>\n			<p>Apple M1</p>\n\n			<p>GPU 7 nh&acirc;n, 16 nh&acirc;n Neural Engine</p>\n			</td>\n			<td>\n			<p>Apple M2</p>\n\n			<p>8 nh&acirc;n GPU, 16 nh&acirc;n Neural Engine</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Thời lượng pin</p>\n			</td>\n			<td>\n			<p>49.9-watt-hour</p>\n			</td>\n			<td>\n			<p>52,6 Wh</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Cổng giao tiếp</p>\n			</td>\n			<td>\n			<p>2 cổng Thunderbolt / USB 4</p>\n			</td>\n			<td>\n			<p>Cổng HDMI v&agrave; đầu đọc thẻ SD, USB Type-C</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Nh&igrave;n chung, với ch&ecirc;nh lệch 200 USD Macbook Air M2 v&agrave; M1 kh&ocirc;ng c&oacute; qu&aacute; nhiều kh&aacute;c biệt, trừ con chip mạnh hơn. Tuy nhi&ecirc;n, trong c&aacute;c trải nghiệm cơ bản th&igrave; kh&oacute; để nhận thấy sự kh&aacute;c biệt giữa 2 thế hệ, do đ&oacute; với gi&aacute; b&aacute;n rẻ hơn th&igrave;&nbsp;Macbook Air M1 2020 vẫn l&agrave; một lựa chọn s&aacute;ng gi&aacute; tại thời điểm n&agrave;y.</p>\n\n<h2><strong>Macbook Air M1 2020 gi&aacute; bao nhi&ecirc;u?</strong></h2>\n\n<p>Macbook Air 2020 được trang bị con chip M1 mới với gi&aacute; b&aacute;n khởi điểm tại thị trường Mỹ l&agrave; 999 USD, trong đ&oacute; phi&ecirc;n bản max cấu h&igrave;nh c&oacute; gi&aacute; l&ecirc;n tới 1449 USD, tương đương từ 25,000,000 đến 40,000,000 đồng tại Việt Nam.</p>\n\n<p>Gi&aacute; b&aacute;n c&aacute;c phi&ecirc;n bản của Macbook Air M1 cụ thể như sau:</p>\n\n<table border=\"0\">\n	<tbody>\n		<tr>\n			<td>Phi&ecirc;n bản</td>\n			<td>\n			<p>Gi&aacute; b&aacute;n</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>&nbsp;Macbook Air M1 8GB - 256GB</p>\n			</td>\n			<td>\n			<p>Chỉ từ 23.990.000 đồng</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Macbook Air M1 16GB - 256GB</p>\n			</td>\n			<td>\n			<p>Chỉ từ 28.990.000 đồng</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Macbook Air M1 8GB - 512GB</p>\n			</td>\n			<td>\n			<p>Chỉ từ 28.990.000 đồng</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>&nbsp;Macbook Air M1 16GB - 512GB</p>\n			</td>\n			<td>\n			<p>Chỉ từ 36.500.000 đồng&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Lưu &yacute;: Gi&aacute; b&aacute;n trong b&agrave;i viết c&oacute; thể thay đổi t&ugrave;y theo trương tr&igrave;nh khuyến m&atilde;i, để biết được gi&aacute; b&aacute;n ch&iacute;nh x&aacute;c thời điểm hiện tại, truy cập website CellphoneS để biết th&ecirc;m th&ocirc;ng tin chi tiết.</p>', '2', 1, 3, 18850000, 1, '2023-09-19 09:25:07', '2023-09-22 08:17:36'),
(2, 'Laptop ASUS TUF Gaming F15 FX506HC-HN144W', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>&quot;Chip I5-11400H c&ugrave;ng card đồ họa rời GeForce RTX 3050, trải nghiệm c&aacute;c tựa game AAA h&agrave;ng đầu hay xử l&yacute; c&aacute;c t&aacute;c vụ đồ hoạ nặng nề</li>\n	<li>Ram 8GB + 1 khe trống, n&acirc;ng cấp tối đa 32GB c&ugrave;ng ổ cứng SSD c&oacute; kh&ocirc;ng gian lưu trữ l&ecirc;n tới 512GB. Đa nhiệm tốt, thoải m&aacute;i mở nhiều ứng dụng c&ugrave;ng l&uacute;c</li>\n	<li>M&agrave;n h&igrave;nh 15.6 inches Full HD c&ugrave;ng độ phủ m&agrave;u SRGB 62.5%, chất lượng hiển thị r&otilde; r&agrave;ng. H&igrave;nh ảnh sắc n&eacute;t.</li>\n	<li>T&iacute;ch hợp HD 720p cho ph&eacute;p đ&agrave;m thoại th&ocirc;ng qua video thoải m&aacute;i</li>\n	<li>Đa dạng cổng giao tiếp, dễ d&agrave;ng sử dụng</li>\n	<li>B&agrave;n ph&iacute;m được t&iacute;ch hợp đ&egrave;n nền LED RGB gi&uacute;p thỏa sức l&agrave;m việc trong m&ocirc;i trường thiếu s&aacute;ng</li>\n	<li>Vỏ nhựa cứng c&aacute;p, trọng lượng m&aacute;y 2.30 kg cho cảm gi&aacute;c cầm chắc tay</li>\n	<li>M&aacute;y đi k&egrave;m Windows 11 Home bản quyền</li>\n	<li>&quot;</li>\n</ul>\n\n<h2><strong>Laptop Asus TUF Gaming F15 FX506HC-HN144W - Độc đ&aacute;o từ thiết kế, mạnh mẽ ở hiệu năng</strong></h2>\n\n<p><strong>Laptop Asus TUF Gaming F15 FX506HC-HN144W</strong>&nbsp;sở hữu thiết kế t&aacute;o bạo v&agrave; độc đ&aacute;o bậc nhất tr&ecirc;n thị trường với gam m&agrave;u Graphite black nổi bật m&agrave; cực huyền b&iacute;. Với hiệu năng đỉnh cao v&agrave; linh kiện cấu th&agrave;nh c&oacute; chất lượng đứng đầu thị trường, chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/asus/gaming.html\"><strong>laptop Asus Gaming</strong></a>&nbsp;n&agrave;y được kỳ vọng dễ d&agrave;ng chinh phục mọi thử th&aacute;ch v&agrave; đồng h&agrave;nh với c&aacute;c game thủ tr&ecirc;n mọi đấu trường.</p>\n\n<h3><strong>Vẻ ngo&agrave;i mạnh mẽ m&agrave; cực huyền b&iacute; đến từ gam m&agrave;u Graphite black</strong></h3>\n\n<p>Những chiếc laptop d&ograve;ng Gaming từ l&acirc;u đ&atilde; mang vẻ ngo&agrave;i đầy cuốn h&uacute;t với những thiết kế mạnh mẽ v&agrave; độc đ&aacute;o. Kh&ocirc;ng nằm ngo&agrave;i xu hướng đ&oacute;, những chiếc Laptop Asus TUF Gaming F15 FX506HC-HN144W cũng sở hữu vẻ ngo&agrave;i cực ấn tượng đặc biệt l&agrave; khi n&oacute; được kho&aacute;c l&ecirc;n m&igrave;nh chiếc &aacute;o đượm m&agrave;u huyền b&iacute; - Graphite black.</p>\n\n<p><img alt=\"Laptop Asus TUF Gaming F15 FX506HC-HN144W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Laptop-Asus-TUF-Gaming-F15-FX506HC-HN144W-1.png\" /></p>\n\n<p>Những đường cắt đầy nghệ thuật tr&ecirc;n lớp vỏ của chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/do-hoa.html\" target=\"_blank\"><strong>laptop thiết kế đồ họa</strong></a>&nbsp;n&agrave;y kh&ocirc;ng chỉ đ&oacute;ng vai tr&ograve; như sự trang tr&iacute; c&aacute;ch điệu m&agrave; c&ograve;n gi&uacute;p chiếc m&aacute;y ghi dấu ấn mạnh mẽ từ vẻ ngo&agrave;i. Phần mặt dưới được thiết kế những h&igrave;nh tổ ong để chiếc m&aacute;y được cố định tr&ecirc;n mặt phẳng tốt hơn đồng thời c&oacute; những khe tản nhiệt mảnh gi&uacute;p tăng khả năng tản nhiệt cho m&aacute;y.</p>\n\n<p>Với vẻ ngo&agrave;i độc đ&aacute;o đầy t&iacute;nh nghệ thuật đương đại v&agrave; tr&agrave;n đầy kh&iacute; thế, Asus TUF Gaming F15 FX506HC-HN144W được xem l&agrave; đứa con cưng của Asus - kiệt t&aacute;c mới trong l&agrave;ng c&ocirc;ng nghệ.</p>\n\n<h3><strong>Tối ưu hiệu suất l&agrave;m việc với cấu h&igrave;nh si&ecirc;u khủng</strong></h3>\n\n<p>&Ocirc;ng lớn Asus đ&atilde; c&oacute; m&agrave;n đầu tư cực ngoạn mục cho đứa con cưng của m&igrave;nh khi trang bị cho n&oacute; bộ vi xử l&yacute; cao cấp đến từ Intel l&agrave; Intel core i5. Với bộ vi xử l&yacute; n&agrave;y chiến binh đến từ nh&agrave; Asus c&oacute; thể c&acirc;n mọi t&aacute;c vụ một c&aacute;ch nhẹ nh&agrave;ng.</p>\n\n<p>Bộ nhớ đệm khủng l&ecirc;n đến 8GB của Laptop Asus TUF Gaming F15 FX506HC-HN144W gi&uacute;p tối ưu h&oacute;a trải nghiệm cho người d&ugrave;ng để bạn c&oacute; những ph&uacute;t trải nghiệm với tốc độ vận h&agrave;nh vượt trội với chiếc Laptop n&agrave;y. B&ecirc;n cạnh đ&oacute; để đ&aacute;p ứng việc chiến c&aacute;c tựa game đồ họa đỉnh cao như PUBG, LOL, War tank, GTA 5,... d&ograve;ng laptop gaming đến từ nh&agrave; Asus đ&atilde; được trang bị th&ecirc;m VGA Geforce RTX. Nhờ card đồ họa cao cấp n&agrave;y m&agrave; bạn kh&ocirc;ng bao giờ bị trễ h&igrave;nh ảnh game cũng như kh&ocirc;ng gặp bất cứ vấn đề n&agrave;o trong đa nhiệm c&aacute;c thao t&aacute;c. Tốc độ qu&eacute;t nhanh c&ugrave;ng hiệu ứng h&igrave;nh ảnh ch&acirc;n thực l&agrave; vũ kh&iacute; sắc b&eacute;n đồng h&agrave;nh c&ugrave;ng anh em game thủ tr&ecirc;n mọi đấu trường.</p>\n\n<p><img alt=\"Laptop Asus TUF Gaming F15 FX506HC-HN144W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Laptop-Asus-TUF-Gaming-F15-FX506HC-HN144W-2.png\" /></p>\n\n<p>Bộ nhớ cũng được xem l&agrave; thế mạnh của d&ograve;ng&nbsp;<a href=\"https://cellphones.com.vn/laptop/gaming.html\" target=\"_blank\"><strong>laptop gaming</strong></a>&nbsp;n&agrave;y với dung lượng ROM l&ecirc;n đến 512GB đ&oacute;ng vai tr&ograve; một thư viện t&agrave;i liệu khổng lồ nơi bạn c&oacute; thể lưu trữ bất cứ dữ liệu cần thiết n&agrave;o cho bản th&acirc;n.</p>\n\n<p>Laptop Asus TUF Gaming F15 FX506HC-HN144W duy tr&igrave; hiệu suất l&agrave;m việc tối ưu bằng c&aacute;ch trang bị hệ thống tản nhiệt cao cấp. Nhờ hệ thống n&agrave;y m&agrave; chiếc laptop n&agrave;y kh&ocirc;ng bao giờ gặp t&igrave;nh trạng treo, giật, lag do n&oacute;ng m&aacute;y. Từ đ&oacute; ổn định năng suất xử l&yacute; cũng như n&acirc;ng cao tuổi thọ của thiết bị.</p>\n\n<h3><strong>Trải nghiệm từng khung h&igrave;nh với m&agrave;n h&igrave;nh 15.6 inch Full HD</strong></h3>\n\n<p>Laptop Asus TUF Gaming F15 FX506HC-HN144W đem đến trải nghiệm cực ch&acirc;n thực cho game thủ th&ocirc;ng qua m&agrave;n h&igrave;nh 15.6 inch c&oacute; độ ph&acirc;n giải Full HD. Độ qu&eacute;t m&agrave;n h&igrave;nh l&ecirc;n đến 144Hz mang đến khả năng hiển thị h&igrave;nh ảnh sắc n&eacute;t v&agrave; kịp thời. Dải m&agrave;u rộng c&ugrave;ng khung h&igrave;nh lớn l&agrave; thứ k&iacute;ch th&iacute;ch thị gi&aacute;c của người sử dụng kết hợp c&ocirc;ng nghệ chống ch&oacute;i gi&uacute;p chiếc laptop nh&agrave; Asus c&oacute; thể hoạt động tốt ngay cả khi ở m&ocirc;i trường ch&oacute;i s&aacute;ng.</p>\n\n<p><img alt=\"Laptop Asus TUF Gaming F15 FX506HC-HN144W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Laptop-Asus-TUF-Gaming-F15-FX506HC-HN144W-3.png\" /></p>\n\n<p>&Acirc;m thanh cũng l&agrave; một phần tạo n&ecirc;n những trải nghiệm kh&oacute; qu&ecirc;n với Laptop Asus TUF Gaming F15 FX506HC-HN144W. Được trang bị 2 loa thiết kế cắt t&aacute;o bạo tạo n&ecirc;n những &acirc;m rung đầy mạnh mẽ. &Acirc;m thanh được ph&aacute;t ra kịp thời để n&acirc;ng cao trải nghiệm sử dụng đồng thời đa dạng c&aacute;c chế độ t&ugrave;y chỉnh để mang đến hệ thống &acirc;m ch&iacute;nh x&aacute;c tuyệt đối.</p>\n\n<h3><strong>Kết nối đa chiều với hệ thống cổng kết nối đa dạng của Asus TUF Gaming F15 FX506HC</strong></h3>\n\n<p>Trong thời đại c&ocirc;ng nghệ th&ocirc;ng tin, việc chuyển đổi dữ liệu đa chiều l&agrave; điều kiện bắt buộc để tối ưu h&oacute;a hiệu suất l&agrave;m việc. Để l&agrave;m được điều n&agrave;y, người ta thường t&igrave;m đến những chiếc laptop c&oacute; nhiều cổng kết nối như Asus TUF Gaming F15 FX506HC</p>\n\n<p><img alt=\"Laptop Asus TUF Gaming F15 FX506HC-HN144W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Laptop-Asus-TUF-Gaming-F15-FX506HC-HN144W-4.png\" /></p>\n\n<p>Chiếc laptop n&agrave;y đang sở hữu tr&ecirc;n m&igrave;nh c&aacute;c cổng kết nối như:</p>\n\n<p>- 1 cổng RJ45 LAN</p>\n\n<p>- 1 cổng Thunderbolt 4 support DisplayPort</p>\n\n<p>- 3 cổng USB 3.2 Gen 1 Type-A</p>\n\n<p>- 1 cổng 3.5mm Combo Audio Jack</p>\n\n<p>Với đầy đủ khả năng kết nối mạng LAN qua d&acirc;y cắm v&agrave; kết nối wifi, Asus TUF Gaming F15 FX506HC l&agrave; sự lựa chọn để c&oacute; thể tối ưu mọi c&ocirc;ng việc.</p>\n\n<h2><strong>Mua laptop Asus TUF Gaming F15 FX506HC-HN144W ch&iacute;nh h&atilde;ng tại CellphoneS</strong></h2>\n\n<p>Ưu việt từ thiết kế đến hiệu suất gi&uacute;p chiếc Laptop Asus TUF Gaming F15 FX506HC-HN144W trở th&agrave;nh kiệt t&aacute;c m&agrave; kh&ocirc;ng game thủ n&agrave;o c&oacute; thể từ chối. Sở hữu ngay những chiếc laptop Asus TUF Gaming F15 FX506HC ch&iacute;nh h&atilde;ng ngay tại CellphoneS để c&oacute; mức gi&aacute; tốt nhất tr&ecirc;n thị trường c&ugrave;ng chế độ bảo h&agrave;nh hấp dẫn nh&eacute;.</p>', '1', 3, 3, 17990000, 1, '2023-09-19 09:27:59', '2023-09-22 07:59:55'),
(3, 'Laptop Asus VivoBook Go 14 E1404FA-NK177W', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-08t005130.908.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Sở hữu thiết kế sang trọng, trọng lượng nhẹ, dễ d&agrave;ng mang theo b&ecirc;n m&igrave;nh</li>\n	<li>RAM 16GB gi&uacute;p bạn dễ d&agrave;ng c&aacute;c tab m&agrave; kh&ocirc;ng lo lag m&aacute;y</li>\n	<li>Ở cứng SSD 512GB gi&uacute;p bạn c&oacute; kh&ocirc;ng gian lưu trữ lớn</li>\n	<li>Sở hữu cảm biến v&acirc;n tay gi&uacute;p thao t&aacute;c mở m&agrave;n h&igrave;nh thuận tiện hơn</li>\n</ul>\n\n<h2><strong>Laptop Asus Vivobook Go 14 E1404FA-NK177W &ndash; Thiết kế mỏng nhẹ, hiệu năng ổn định</strong></h2>\n\n<p>L&agrave; một sản phẩm thuộc series&nbsp;<a href=\"https://cellphones.com.vn/laptop/asus/vivobook.html\" target=\"_blank\"><strong>Asus Vivobook</strong></a>&nbsp;do đ&oacute; laptop Asus Vivobook Go 14 E1404FA-NK177W sở hữu nhiều đặc điểm của series n&agrave;y. B&ecirc;n cạnh đ&oacute; l&agrave; nhiều t&iacute;nh năng được n&acirc;ng cấp, hỗ trợ tối ưu trong qu&aacute; tr&igrave;nh sử dụng của người d&ugrave;ng.</p>\n\n<h3><strong>Bộ nhớ RAM lớn đa nhiệm ổn định c&ugrave;ng SSD PCIE 512GB</strong></h3>\n\n<p>Asus Vivobook Go 14 E1404FA-NK177W được h&atilde;ng sản xuất trang bị bộ nhớ RAM l&ecirc;n đến 16GB. Với dung lượng RAM ấn tượng n&agrave;y m&aacute;y c&oacute; thể thoải m&aacute;i đa nhiệm nhờ đ&oacute; người d&ugrave;ng c&oacute; thể sử dụng c&ugrave;ng l&uacute;c nhiều ứng dụng.</p>\n\n<p><img alt=\"Đánh giá laptop Asus Vivobook Go 14 E1404FA-NK177W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-go-14-e1404fa-nk177w-1.jpg\" /></p>\n\n<p>B&ecirc;n cạnh đ&oacute; th&igrave; laptop c&ograve;n được trang bị ổ cứng thể rắn SSD chuẩn PCIE với dung lượng l&ecirc;n đến 512GB. Nhờ đ&oacute; m&aacute;y kh&ocirc;ng chỉ sở hữu một kh&ocirc;ng gian lưu trữ lớn m&agrave; c&ograve;n xử l&yacute; c&aacute;c t&aacute;c vụ như khởi động ứng dụng, mở kh&oacute;a m&aacute;y một c&aacute;ch nhanh ch&oacute;ng.</p>\n\n<p><img alt=\"Đánh giá laptop Asus Vivobook Go 14 E1404FA-NK177W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-go-14-e1404fa-nk177w-2.jpg\" /></p>\n\n<h3><strong>Thiết kế mỏng nhẹ c&ugrave;ng cổng kết nối đa dạng, bản lề gập mở 180 độ</strong></h3>\n\n<p>Laptop Asus Vivobook Go 14 E1404FA-NK177W sở hữu một thiết kế si&ecirc;u mỏng nhẹ với tổng trọng lượng chỉ khoảng 1.38kg. laptop với thiết kế bản lề phẳng c&oacute; thể mở rộng l&ecirc;n đến 180 độ. B&agrave;n ph&iacute;m thiết bị với thiết kế r&uacute;t gọn sở hữu một h&agrave;nh tr&igrave;nh ph&iacute;m tối ưu c&ugrave;ng độ nảy tốt gi&uacute;p mang lại cho người d&ugrave;ng trải nghiệm g&otilde; thoải m&aacute;i.</p>\n\n<p><img alt=\"Đánh giá laptop Asus Vivobook Go 14 E1404FA-NK177W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-go-14-e1404fa-nk177w-3.jpg\" /></p>\n\n<p>M&aacute;y sở hữu cổng kết nối đa dạng từ USB 2.0 đến HDMI hay jack tai nghe mang lại khả năng kết nối đa dạng. Về m&agrave;u sắc, Asus Vivobook Go 14 E1404FA-NK177W sẽ c&oacute; tới ba phi&ecirc;n bản m&agrave;u l&agrave; xanh, đen v&agrave; bạc.</p>\n\n<p><img alt=\"Đánh giá laptop Asus Vivobook Go 14 E1404FA-NK177W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-go-14-e1404fa-nk177w-4.jpg\" /></p>', '2', 3, 1, 13450000, 1, '2023-09-19 09:30:02', '2023-09-19 23:20:12'),
(4, 'Laptop ASUS X515MA-BR481W', 'https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/a/s/asus_x515ma-br481w.png', '<h2>Laptop Asus X515MA-BR481W - Gọn Nhẹ Với Thiết Kế Năng Động</h2>\n\n<p>Laptop Asus X515MA-BR481W l&agrave; chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/asus/vivobook.html\" target=\"_blank\"><strong>laptop Asus Vivobook</strong></a>&nbsp;được thiết kế năng động với hiệu năng mạnh mẽ v&agrave; ph&ugrave; hợp với t&uacute;i tiền của nhiều người d&ugrave;ng. Asus X515MA-BR481W sẽ l&agrave; một lựa chọn kh&ocirc;ng thể tuyệt vời hơn d&agrave;nh cho c&aacute;c bạn học sinh, sinh vi&ecirc;n.</p>\n\n<h3>Thiết kế gọn - mỏng - nhẹ v&agrave; g&oacute;c nh&igrave;n rộng hơn</h3>\n\n<p>Đặc điểm nổi bật của laptop Asus X515MA-BR481W ch&iacute;nh l&agrave; thiết kế gọn - mỏng - nhẹ, linh động cho người d&ugrave;ng trong những chuyến c&ocirc;ng t&aacute;c, đi học hay phải thường xuy&ecirc;n di chuyển. Asus X515MA-BR481W c&ograve;n sở hữu vẻ ngo&agrave;i bắt mắt với thiết kế m&agrave;u bạc s&agrave;nh điệu c&ugrave;ng với lớp giả kim loại bao phủ b&ecirc;n ngo&agrave;i. Tổng thể của chiếc laptop gần như l&agrave; đồng nhất tạo được ấn tượng nhờ v&agrave;o logo b&oacute;ng bẩy c&ugrave;ng viền đen hợp l&yacute;.</p>\n\n<p><img alt=\"Thiết kế gọn - mỏng - nhẹ và góc nhìn rộng hơn\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/laptop-asus-x515ma-br481w-1.jpg\" /></p>\n\n<p>Cạnh đ&oacute;, laptop Asus X515MA-BR481W c&ograve;n g&acirc;y được sự ch&uacute; &yacute; khi sở hữu m&agrave;n h&igrave;nh l&ecirc;n đến 15.6 inch trong trọng lượng chỉ 1.7 kg. Thiết kế m&agrave;n h&igrave;nh mỏng v&agrave; g&oacute;c nh&igrave;n rộng hơn đ&atilde; gi&uacute;p cho chiếc laptop tạo được ấn tượng tốt nhất.</p>\n\n<h3>L&agrave;m việc hiệu quả với hiệu suất cao</h3>\n\n<p>Laptop Asus X515MA-BR481W đ&atilde; được trang bị sẵn 4GB RAM v&agrave; 256GB PCIE ổ cứng với sự hỗ trợ của bộ vi xử l&yacute; Intel Celeron N4020 gi&uacute;p tăng tốc m&aacute;y t&iacute;nh v&agrave; hỗ trợ tối đa c&aacute;c t&aacute;c vụ văn ph&ograve;ng. Sử dụng hệ điều h&agrave;nh Windows 11 bản quyền, người d&ugrave;ng c&oacute; thể dễ d&agrave;ng cập nhật những t&iacute;nh năng mới nhất v&agrave; gi&uacute;p mọi hoạt động trở n&ecirc;n ổn định, mượt m&agrave; hơn rất nhiều.</p>\n\n<p><img alt=\"Laptop Asus X515MA-BR481W hiệu suất ổn định\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/laptop-asus-x515ma-br481w-2.jpg\" /></p>\n\n<p>Asus X515MA-BR481W c&ograve;n hỗ trợ kết nối đầy đủ với c&aacute;c cổng bao gồm cổng USB 3.0; USB 2.0 Type-A; cổng HDMI, đầu lọc thẻ v&agrave; cổng USB Type-C 3.2 c&oacute; thể cắm đảo ngược. B&agrave;n ph&iacute;m đầy đủ ph&iacute;m số với độ nảy cao, đ&aacute;p ứng nhu cầu c&ocirc;ng th&aacute;i học, gi&uacute;p người d&ugrave;ng dễ d&agrave;ng thao t&aacute;c hơn.</p>', '2', 3, 0, 6990000, 1, '2023-09-19 09:33:02', '2023-09-19 09:33:02'),
(5, 'Laptop Lenovo Ideapad 5 Pro 16ARH7', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/2/h/2h08.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Chip R5-6600HS c&ugrave;ng card rời GTX 1650 xử l&yacute; tốt c&aacute;c phần mềm đồ hoạ, c&aacute;c tựa game AAA ở mức setting trung b&igrave;nh,</li>\n	<li>Dung lượng lớn Ram 16GB, ổ cứng SSD 512GB mang đến tốc độ xử l&yacute; nhanh c&ugrave;ng đa nhiệm mượt m&agrave;.</li>\n	<li>Độ ph&acirc;n giải 2.5K , tần số qu&eacute;t 120Hz m&agrave;n h&igrave;nh lớn 16.0 inch với tấm nền IPS, 350 nits, 100% sRGB mang lại chất lượng hiển thị r&otilde; n&eacute;t, mượt m&agrave;.</li>\n	<li>T&iacute;ch hợp webcam 1080p - Chất lượng cuộc gọi sắc n&eacute;t.</li>\n	<li>B&agrave;n ph&iacute;m được t&iacute;ch hợp đ&egrave;n - Thỏa sức l&agrave;m việc trong m&ocirc;i trường thiếu s&aacute;ng.</li>\n	<li>Năng lượng bất tận cả ng&agrave;y với vi&ecirc;n pin 3 Cell, 75Wh.</li>\n	<li>Thiết kế vỏ kim loại sang trọng, nặng 1.95 kg thuận tiện di chuyển, mang theo.</li>\n	<li>M&aacute;y đi k&egrave;m Windows 11 bản quyền</li>\n</ul>\n\n<h2>Laptop Lenovo Ideapad 5 Pro 16ARH7 82SN003MVN cho khả năng đ&aacute;p ứng mọi t&aacute;c vụ</h2>\n\n<p>Laptop Lenovo Ideapad 5 Pro 16ARH7 82SN003MVN thuộc d&ograve;ng sản phẩm cao cấp mang đến hiệu suất hoạt động ấn tượng, cho khả năng đ&aacute;p ứng đầy đủ mọi t&aacute;c vụ. B&ecirc;n cạnh đ&oacute; laptop&nbsp;<a href=\"https://cellphones.com.vn/laptop/lenovo/ideapad.html\" target=\"_blank\"><strong>Lenovo Ideapad</strong></a>&nbsp;n&agrave;y c&ograve;n tạo điểm nhấn ở m&agrave;n h&igrave;nh đẹp mắt với chế độ chống ch&oacute;i v&agrave; giảm &aacute;nh s&aacute;ng xanh gi&uacute;p bảo vệ thị lực khi phải l&agrave;m việc trong thời gian d&agrave;i.</p>\n\n<h3>Đ&aacute;p ứng đầy đủ mọi t&aacute;c vụ với tốc độ ấn tượng</h3>\n\n<p>Laptop sử dụng d&ograve;ng chip AMD Ryzen 5-6600HS với 6 nh&acirc;n v&agrave; 12 luồng, c&oacute; tốc độ hoạt động tối đa đạt đến 4,5GHz. Nhờ v&agrave;o đặc t&iacute;nh n&agrave;y thiết bị c&oacute; khả năng xử l&yacute; những t&aacute;c vụ nặng với tốc độ nhanh ch&oacute;ng.</p>\n\n<p><img alt=\"Đánh giá laptop Lenovo Ideapad 5 Pro 16ARH7 82SN003MVN\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Lenovo/laptop-lenovo-ideapad-5-pro-16arh7-82sn003mvn-1.png\" /></p>\n\n<p>Về dung lượng bộ nhớ, laptop đi k&egrave;m với 16GB RAM v&agrave; 512GB SSD. Dung lượng RAM lớn cho khả năng đa nhiệm c&ugrave;ng l&uacute;c nhiều t&aacute;c vụ một c&aacute;ch mượt m&agrave;. Bộ nhớ trong với mức dung lượng ấn tượng đến 512GB cho ph&eacute;p lưu trữ thoải m&aacute;i dữ liệu, cũng như tải xuống c&aacute;c ứng dụng hay tr&ograve; chơi.</p>\n\n<h3>Khung h&igrave;nh đẹp mắt với c&ocirc;ng nghệ h&igrave;nh ảnh ti&ecirc;n tiến</h3>\n\n<p>M&agrave;n h&igrave;nh của chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/laptop-16-inch.html\" target=\"_blank\"><strong>laptop 16 inch gi&aacute; rẻ</strong></a>&nbsp;được thiết kế&nbsp;với k&iacute;ch thước rộng đến 16 inch v&agrave; độ ph&acirc;n giải cao 2560x1600 c&ugrave;ng tần số qu&eacute;t đạt 120Hz. Theo đ&oacute; người d&ugrave;ng sẽ được trải nghiệm những h&igrave;nh ảnh r&otilde; n&eacute;t, cũng như kh&ocirc;ng c&ograve;n gặp phải hiện tượng x&eacute; h&igrave;nh khi chơi game.</p>\n\n<p><img alt=\"Khung hình đẹp mắt với công nghệ hình ảnh tiên tiến\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Lenovo/laptop-lenovo-ideapad-5-pro-16arh7-82sn003mvn-2.png\" /></p>\n\n<p>Laptop c&ograve;n đi k&egrave;m với hai c&ocirc;ng nghệ ti&ecirc;n tiến l&agrave; Anti Glare v&agrave; Low Blue Light. Khi sử dụng m&aacute;y dưới &aacute;nh nắng trực tiếp, m&agrave;n h&igrave;nh sẽ kh&ocirc;ng bị ch&oacute;i, cũng như nhờ khả năng giảm &aacute;nh s&aacute;ng xanh thị lực của bạn sẽ được đảm bảo nếu thường xuy&ecirc;n l&agrave;m việc trong thời gian d&agrave;i.</p>', '2', 2, 3, 19990000, 1, '2023-09-19 09:34:53', '2023-09-22 08:17:10'),
(6, 'Macbook Pro 2022 Apple Macbook Pro 13 M2 2022', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Chip R5-6600HS c&ugrave;ng card rời GTX 1650 xử l&yacute; tốt c&aacute;c phần mềm đồ hoạ, c&aacute;c tựa game AAA ở mức setting trung b&igrave;nh,</li>\n	<li>Dung lượng lớn Ram 16GB, ổ cứng SSD 512GB mang đến tốc độ xử l&yacute; nhanh c&ugrave;ng đa nhiệm mượt m&agrave;.</li>\n	<li>Độ ph&acirc;n giải 2.5K , tần số qu&eacute;t 120Hz m&agrave;n h&igrave;nh lớn 16.0 inch với tấm nền IPS, 350 nits, 100% sRGB mang lại chất lượng hiển thị r&otilde; n&eacute;t, mượt m&agrave;.</li>\n	<li>T&iacute;ch hợp webcam 1080p - Chất lượng cuộc gọi sắc n&eacute;t.</li>\n	<li>B&agrave;n ph&iacute;m được t&iacute;ch hợp đ&egrave;n - Thỏa sức l&agrave;m việc trong m&ocirc;i trường thiếu s&aacute;ng.</li>\n	<li>Năng lượng bất tận cả ng&agrave;y với vi&ecirc;n pin 3 Cell, 75Wh.</li>\n	<li>Thiết kế vỏ kim loại sang trọng, nặng 1.95 kg thuận tiện di chuyển, mang theo.</li>\n	<li>M&aacute;y đi k&egrave;m Windows 11 bản quyền</li>\n</ul>\n\n<h2>Laptop Lenovo Ideapad 5 Pro 16ARH7 82SN003MVN cho khả năng đ&aacute;p ứng mọi t&aacute;c vụ</h2>\n\n<p>Laptop Lenovo Ideapad 5 Pro 16ARH7 82SN003MVN thuộc d&ograve;ng sản phẩm cao cấp mang đến hiệu suất hoạt động ấn tượng, cho khả năng đ&aacute;p ứng đầy đủ mọi t&aacute;c vụ. B&ecirc;n cạnh đ&oacute; laptop&nbsp;<a href=\"https://cellphones.com.vn/laptop/lenovo/ideapad.html\" target=\"_blank\"><strong>Lenovo Ideapad</strong></a>&nbsp;n&agrave;y c&ograve;n tạo điểm nhấn ở m&agrave;n h&igrave;nh đẹp mắt với chế độ chống ch&oacute;i v&agrave; giảm &aacute;nh s&aacute;ng xanh gi&uacute;p bảo vệ thị lực khi phải l&agrave;m việc trong thời gian d&agrave;i.</p>\n\n<h3>Đ&aacute;p ứng đầy đủ mọi t&aacute;c vụ với tốc độ ấn tượng</h3>\n\n<p>Laptop sử dụng d&ograve;ng chip AMD Ryzen 5-6600HS với 6 nh&acirc;n v&agrave; 12 luồng, c&oacute; tốc độ hoạt động tối đa đạt đến 4,5GHz. Nhờ v&agrave;o đặc t&iacute;nh n&agrave;y thiết bị c&oacute; khả năng xử l&yacute; những t&aacute;c vụ nặng với tốc độ nhanh ch&oacute;ng.</p>\n\n<p><img alt=\"Đánh giá laptop Lenovo Ideapad 5 Pro 16ARH7 82SN003MVN\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Lenovo/laptop-lenovo-ideapad-5-pro-16arh7-82sn003mvn-1.png\" /></p>\n\n<p>Về dung lượng bộ nhớ, laptop đi k&egrave;m với 16GB RAM v&agrave; 512GB SSD. Dung lượng RAM lớn cho khả năng đa nhiệm c&ugrave;ng l&uacute;c nhiều t&aacute;c vụ một c&aacute;ch mượt m&agrave;. Bộ nhớ trong với mức dung lượng ấn tượng đến 512GB cho ph&eacute;p lưu trữ thoải m&aacute;i dữ liệu, cũng như tải xuống c&aacute;c ứng dụng hay tr&ograve; chơi.</p>\n\n<h3>Khung h&igrave;nh đẹp mắt với c&ocirc;ng nghệ h&igrave;nh ảnh ti&ecirc;n tiến</h3>\n\n<p>M&agrave;n h&igrave;nh của chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/laptop-16-inch.html\" target=\"_blank\"><strong>laptop 16 inch gi&aacute; rẻ</strong></a>&nbsp;được thiết kế&nbsp;với k&iacute;ch thước rộng đến 16 inch v&agrave; độ ph&acirc;n giải cao 2560x1600 c&ugrave;ng tần số qu&eacute;t đạt 120Hz. Theo đ&oacute; người d&ugrave;ng sẽ được trải nghiệm những h&igrave;nh ảnh r&otilde; n&eacute;t, cũng như kh&ocirc;ng c&ograve;n gặp phải hiện tượng x&eacute; h&igrave;nh khi chơi game.</p>\n\n<p><img alt=\"Khung hình đẹp mắt với công nghệ hình ảnh tiên tiến\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Lenovo/laptop-lenovo-ideapad-5-pro-16arh7-82sn003mvn-2.png\" /></p>\n\n<p>Laptop c&ograve;n đi k&egrave;m với hai c&ocirc;ng nghệ ti&ecirc;n tiến l&agrave; Anti Glare v&agrave; Low Blue Light. Khi sử dụng m&aacute;y dưới &aacute;nh nắng trực tiếp, m&agrave;n h&igrave;nh sẽ kh&ocirc;ng bị ch&oacute;i, cũng như nhờ khả năng giảm &aacute;nh s&aacute;ng xanh thị lực của bạn sẽ được đảm bảo nếu thường xuy&ecirc;n l&agrave;m việc trong thời gian d&agrave;i.</p>', '2', 1, 1, 29690000, 1, '2023-09-19 09:40:12', '2023-09-22 08:03:00'),
(7, 'Laptop Asus VivoBook 14 OLED A1405VA-KM095W', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_5__1.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Sở hữu thiết kế gọn nhẹ c&ugrave;ng t&ocirc;ng m&agrave;u bạc sang trọng, chắc hẳn l&agrave; một sản phẩm được mọi người y&ecirc;u th&iacute;ch</li>\n	<li>M&agrave;n h&igrave;nh 14 inch đi k&egrave;m với độ&nbsp;phủ m&agrave;u 100% DCI-P3 chắc hẳn sẽ đem lại trải nghiệm tuyệt vời về h&igrave;nh ảnh, video</li>\n	<li>Trang bị CPU Intel Core&nbsp;i5-13500H gi&uacute;p bạn xử l&yacute; được c&aacute;c t&aacute;c vụ văn ph&ograve;ng, giải tr&iacute; v&agrave; chỉnh sửa h&igrave;nh ảnh nhẹ tr&ecirc;n PTS</li>\n	<li>Ổ cứng SSD 512GB gi&uacute;p bạn c&oacute; được kh&ocirc;ng gian lưu trữ dữ liệu rộng lớn</li>\n</ul>\n\n<h2><strong>Laptop Asus Vivobook 14 OLED A1405VA-KM095W - M&agrave;n h&igrave;nh rộng, sắc n&eacute;t</strong></h2>\n\n<p><strong>Laptop Asus Vivobook 14 OLED A1405VA-KM095W</strong>&nbsp;c&oacute; sự nổi bật nhất l&agrave; m&agrave;n h&igrave;nh OLED, chuẩn điện ảnh, đem lại trải nghiệm về thị gi&aacute;c cực kỳ tốt. B&ecirc;n cạnh đ&oacute;, chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/asus/vivobook.html\"><strong>laptop Asus Vivobook</strong></a>&nbsp;n&agrave;y thiết kế theo dạng bản lề xoay 180 độ, để điều chỉnh ph&ugrave; hợp với tầm nh&igrave;n của người d&ugrave;ng.&nbsp;</p>\n\n<h3><strong>Hiệu năng đỉnh cao</strong></h3>\n\n<p>Laptop Asus Vivobook 14 OLED A1405VA-KM095W sở hữu con chip thế hệ thứ 13, v&agrave; khi kết hợp với t&iacute;nh năng Dynamic Performance tối ưu c&ocirc;ng suất vượt trội khi chơi game.</p>\n\n<p><img alt=\"Laptop Asus Vivobook 14 OLED A1405VA-KM095W - Màn hình rộng, sắc nét\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-14-oled-a1405va-km095w-1.png\" /></p>\n\n<p>Đặc biệt, sản phẩm c&ograve;n hỗ trợ giải ph&oacute;ng c&ocirc;ng suất 40W nhanh ch&oacute;ng, gi&uacute;p cho CPU hoạt động hiệu quả hơn, xử l&yacute; dữ liệu trong chốc l&aacute;t.&nbsp;</p>\n\n<p>Ngo&agrave;i ra, chiếc m&aacute;y t&iacute;nh x&aacute;ch tay n&agrave;y c&oacute; ti&ecirc;u chuẩn kh&aacute;ng khuẩn ASUS Antimicrobial Guard Plus, để người d&ugrave;ng y&ecirc;n t&acirc;m hơn khi tiếp x&uacute;c với b&agrave;n ph&iacute;m .&nbsp;</p>\n\n<h3><strong>M&agrave;n h&igrave;nh sắc n&eacute;t</strong></h3>\n\n<p>Laptop Asus Vivobook 14 OLED A1405VA-KM095W c&oacute; tỷ lệ m&agrave;n h&igrave;nh 16:10, hiển thị được kh&aacute; nhiều nội dung khi đọc b&aacute;o, lướt mạng x&atilde; hội. B&ecirc;n cạnh đ&oacute;, chiếc laptop n&agrave;y c&ograve;n đạt chuẩn PANTONE độ ch&iacute;nh x&aacute;c m&agrave;u sắc cao.&nbsp;</p>\n\n<p><img alt=\"Laptop Asus Vivobook 14 OLED A1405VA-KM095W - Màn hình rộng, sắc nét\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Asus/Vivobook/laptop-asus-vivobook-14-oled-a1405va-km095w-2.png\" /></p>\n\n<p>Về kiểu d&aacute;ng thiết kế, h&atilde;ng Asus in ấn logo ph&iacute;a b&ecirc;n tr&aacute;i phần mặt lưng, v&agrave; c&oacute; phần &aacute;nh bạc tạo n&ecirc;n vẻ ngoại h&igrave;nh cực kỳ sang trọng.&nbsp;</p>', '2', 1, 3, 17890000, 1, '2023-09-19 09:41:48', '2023-09-19 23:12:08'),
(8, 'Laptop MSI Modern 14 C7M-212VN', 'https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/t/e/text_ng_n_21_.png', '<h2><strong>Laptop MSI Gaming GF63 Thin 11SC-664VN - d&ograve;ng laptop Gaming với thiết kế mỏng nhẹ</strong></h2>\n\n<p><strong><a href=\"https://cellphones.com.vn/laptop/msi.html\" target=\"_self\">Laptop MSI</a>&nbsp;Gaming GF63 Thin 11SC-664VN</strong>&nbsp;l&agrave; sản phẩm thuộc ph&acirc;n kh&uacute;c gi&aacute; tầm trung, ph&ugrave; hợp với những game thủ. Đ&acirc;y l&agrave; d&ograve;ng laptop c&oacute; vẻ ngo&agrave;i nhỏ gọn nhưng vẫn mang đậm phong c&aacute;ch gaming.</p>\n\n<h3><strong>Vẻ ngo&agrave;i thanh mảnh nhưng vẫn đậm chất gaming</strong></h3>\n\n<p>Nh&igrave;n chung, chiếc laptop mang một vẻ ngo&agrave;i kh&aacute; thon gọn, tổng bề d&agrave;y chỉ 21,7 mm v&agrave; c&oacute; khối lượng khoảng 1,86kg. Tuy nhi&ecirc;n v&igrave; l&agrave; d&ograve;ng m&aacute;y gaming n&ecirc;n ở phần giữa của nắp m&aacute;y được in ch&igrave;m logo rồng đỏ quen thuộc nhằm tạo điểm nhấn. Đặc biệt hơn, phần th&ocirc;ng gi&oacute; ở ph&iacute;a dưới được in ẩn h&igrave;nh chữ X kh&aacute; độc đ&aacute;o.</p>\n\n<p><img alt=\"Vẻ ngoài thanh mảnh nhưng vẫn đậm chất gaming\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/laptop-msi-gaming-gf63-thin-11sc-664vn-3.jpg\" /></p>\n\n<h3><strong>Cấu h&igrave;nh mạnh mẽ đ&aacute;p ứng c&aacute;c t&aacute;c vụ nặng</strong></h3>\n\n<p>D&ograve;ng Laptop MSI Gaming GF63 Thin 11SC-664VN được trang bị bộ vi xử l&yacute; Intel Core thế hệ thứ 11 gi&uacute;p tăng hiệu suất l&agrave;m việc l&ecirc;n 15% so với c&aacute;c d&ograve;ng m&aacute;y thế hệ trước.</p>\n\n<p>B&ecirc;n cạnh đ&oacute;, m&aacute;y c&ograve;n được t&iacute;ch hợp dung lượng RAM l&ecirc;n đến 8GB v&agrave; ổ cứng SSD 512GB. Cả RAM v&agrave; ổ cứng SSD đều c&oacute; thể được n&acirc;ng cấp nếu bạn muốn chiếc laptop của m&igrave;nh th&ecirc;m phần mạnh mẽ.</p>\n\n<p>Ngo&agrave;i ra, d&ograve;ng m&aacute;y c&ograve;n được trang bị card đồ họa rời Nvidia GeForce GTX 1650 Max-Q cho ph&eacute;p bạn c&oacute; thể thiết kế đồ họa 2D/3D, chỉnh sửa h&igrave;nh ảnh, video v&agrave; chiến c&aacute;c tựa game nặng một c&aacute;ch mượt m&agrave;.</p>\n\n<p><img alt=\"Laptop MSI Gaming GF63 Thin 11SC-664VN - dòng laptop Gaming với thiết kế mỏng nhẹ\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/laptop-msi-gaming-gf63-thin-11sc-664vn-1_1.jpg\" /></p>\n\n<h3><strong>B&agrave;n ph&iacute;m s&aacute;ng đ&egrave;n nổi bật</strong></h3>\n\n<p><a href=\"https://cellphones.com.vn/laptop/gaming.html\" target=\"_blank\"><strong>Laptop gaming gi&aacute; rẻ</strong></a>&nbsp;n&agrave;y được trang bị cả đ&egrave;n Led đỏ ở phần b&agrave;n ph&iacute;m. Bạn c&oacute; thể thoải m&aacute;i g&otilde; ph&iacute;m ngay trong điều kiện thiếu &aacute;nh s&aacute;ng. Hơn nữa, n&uacute;t ph&iacute;m rất to, c&aacute;ch đều v&agrave; font chữ dễ nh&igrave;n cũng đem đến những trải nghiệm g&otilde; m&aacute;y mượt m&agrave; cho người d&ugrave;ng.</p>\n\n<p><img alt=\"Bàn phím sáng đèn nổi bật\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/laptop-msi-gaming-gf63-thin-11sc-664vn-2.jpg\" /></p>', '1', 4, 0, 14890000, 1, '2023-09-19 09:43:50', '2023-09-19 09:43:50'),
(9, 'Laptop Gaming Acer Nitro 5 Eagle AN515-57-5669 NH.QEHSV.001', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_2__1.png', '<h2><strong>Laptop MSI Gaming GF63 Thin 11SC-664VN - d&ograve;ng laptop Gaming với thiết kế mỏng nhẹ</strong></h2>\n\n<p><strong><a href=\"https://cellphones.com.vn/laptop/msi.html\" target=\"_self\">Laptop MSI</a>&nbsp;Gaming GF63 Thin 11SC-664VN</strong>&nbsp;l&agrave; sản phẩm thuộc ph&acirc;n kh&uacute;c gi&aacute; tầm trung, ph&ugrave; hợp với những game thủ. Đ&acirc;y l&agrave; d&ograve;ng laptop c&oacute; vẻ ngo&agrave;i nhỏ gọn nhưng vẫn mang đậm phong c&aacute;ch gaming.</p>\n\n<h3><strong>Vẻ ngo&agrave;i thanh mảnh nhưng vẫn đậm chất gaming</strong></h3>\n\n<p>Nh&igrave;n chung, chiếc laptop mang một vẻ ngo&agrave;i kh&aacute; thon gọn, tổng bề d&agrave;y chỉ 21,7 mm v&agrave; c&oacute; khối lượng khoảng 1,86kg. Tuy nhi&ecirc;n v&igrave; l&agrave; d&ograve;ng m&aacute;y gaming n&ecirc;n ở phần giữa của nắp m&aacute;y được in ch&igrave;m logo rồng đỏ quen thuộc nhằm tạo điểm nhấn. Đặc biệt hơn, phần th&ocirc;ng gi&oacute; ở ph&iacute;a dưới được in ẩn h&igrave;nh chữ X kh&aacute; độc đ&aacute;o.</p>\n\n<p><img alt=\"Vẻ ngoài thanh mảnh nhưng vẫn đậm chất gaming\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/laptop-msi-gaming-gf63-thin-11sc-664vn-3.jpg\" /></p>\n\n<h3><strong>Cấu h&igrave;nh mạnh mẽ đ&aacute;p ứng c&aacute;c t&aacute;c vụ nặng</strong></h3>\n\n<p>D&ograve;ng Laptop MSI Gaming GF63 Thin 11SC-664VN được trang bị bộ vi xử l&yacute; Intel Core thế hệ thứ 11 gi&uacute;p tăng hiệu suất l&agrave;m việc l&ecirc;n 15% so với c&aacute;c d&ograve;ng m&aacute;y thế hệ trước.</p>\n\n<p>B&ecirc;n cạnh đ&oacute;, m&aacute;y c&ograve;n được t&iacute;ch hợp dung lượng RAM l&ecirc;n đến 8GB v&agrave; ổ cứng SSD 512GB. Cả RAM v&agrave; ổ cứng SSD đều c&oacute; thể được n&acirc;ng cấp nếu bạn muốn chiếc laptop của m&igrave;nh th&ecirc;m phần mạnh mẽ.</p>\n\n<p>Ngo&agrave;i ra, d&ograve;ng m&aacute;y c&ograve;n được trang bị card đồ họa rời Nvidia GeForce GTX 1650 Max-Q cho ph&eacute;p bạn c&oacute; thể thiết kế đồ họa 2D/3D, chỉnh sửa h&igrave;nh ảnh, video v&agrave; chiến c&aacute;c tựa game nặng một c&aacute;ch mượt m&agrave;.</p>\n\n<p><img alt=\"Laptop MSI Gaming GF63 Thin 11SC-664VN - dòng laptop Gaming với thiết kế mỏng nhẹ\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/laptop-msi-gaming-gf63-thin-11sc-664vn-1_1.jpg\" /></p>\n\n<h3><strong>B&agrave;n ph&iacute;m s&aacute;ng đ&egrave;n nổi bật</strong></h3>\n\n<p><a href=\"https://cellphones.com.vn/laptop/gaming.html\" target=\"_blank\"><strong>Laptop gaming gi&aacute; rẻ</strong></a>&nbsp;n&agrave;y được trang bị cả đ&egrave;n Led đỏ ở phần b&agrave;n ph&iacute;m. Bạn c&oacute; thể thoải m&aacute;i g&otilde; ph&iacute;m ngay trong điều kiện thiếu &aacute;nh s&aacute;ng. Hơn nữa, n&uacute;t ph&iacute;m rất to, c&aacute;ch đều v&agrave; font chữ dễ nh&igrave;n cũng đem đến những trải nghiệm g&otilde; m&aacute;y mượt m&agrave; cho người d&ugrave;ng.</p>\n\n<p><img alt=\"Bàn phím sáng đèn nổi bật\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/laptop-msi-gaming-gf63-thin-11sc-664vn-2.jpg\" /></p>', '1', 4, 0, 14990000, 1, '2023-09-19 09:50:36', '2023-09-19 09:50:36'),
(10, 'Mac mini M2 2023', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Hiệu năng vượt trội với con chip M2 c&ugrave;ng 10 nh&acirc;n GPU - Chạy tốt c&aacute;c t&aacute;c vụ như render video, chỉnh sửa h&igrave;nh ảnh</li>\n	<li>Đa nhiệm tốt, mở c&ugrave;ng l&uacute;c nhiều ứng dụng với dung lượng ram l&ecirc;n đến 16GB</li>\n	<li>SSD 256GB gi&uacute;p m&aacute;y khởi động nhanh ch&oacute;ng, cho ph&eacute;p người d&ugrave;ng lưu trữ nhiều dữ liệu</li>\n	<li>Thiết kế nhỏ gọn c&ugrave;ng trọng lượng chỉ 1.18kg - dễ d&agrave;ng di chuyển mọi l&uacute;c mọi nơi</li>\n	<li>Hệ điều h&agrave;nh MacOS Ventura mang đến khả năng bảo mật vượt trội, bảo vệ mọi dữ liẹu của người d&ugrave;ng</li>\n</ul>\n\n<h2><strong>Mac Mini M2 16GB 2023 &ndash; Đa nhiệm tốt, hoạt động hiệu quả</strong></h2>\n\n<p>Mac Mini M2 16GB 2023 mang trong m&igrave;nh nhiều đặc điểm vượt trội hơn hẳn thế hệ tiền nhiệm. Th&ocirc;ng qua nguồn &ldquo;sức mạnh&rdquo; của con chip M2, sản phẩm&nbsp;<a href=\"https://cellphones.com.vn/laptop/mac/mini.html\" target=\"_blank\"><strong>Mac mini</strong></a>&nbsp;n&agrave;y chắc chắn bạn sẽ h&agrave;i l&ograve;ng với hiệu quả m&agrave; phi&ecirc;n bản mang đến trong qu&aacute; tr&igrave;nh hoạt động.</p>\n\n<h3><strong>Thiết kế tinh tế, trọng lượng nhỏ nhẹ 1.18kg</strong></h3>\n\n<p>Với trọng lượng chỉ 1.18 kg, Mac Mini M2 16GB 2023 gi&uacute;p người d&ugrave;ng dễ d&agrave;ng di chuyển đến bất cứ vị tr&iacute; n&agrave;o m&agrave; kh&ocirc;ng lo cồng kềnh hay vướng v&iacute;u trong qu&aacute; tr&igrave;nh x&ecirc; dịch. Qua vẻ ngo&agrave;i sang trọng, phi&ecirc;n bản cho bạn tự tin thể hiện phong c&aacute;ch s&agrave;nh điệu, thời thượng mọi l&uacute;c mọi nơi với thiết kế theo kiểu cubic tinh tế.</p>\n\n<p><img alt=\"Đánh giá Mac Mini M2 16GB 2023\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/pc/Mac-mini/M2/mac-mini-m2-16gb-2023-2.jpg\" /></p>\n\n<h3><strong>Chip M2 mạnh mẽ, hệ điều h&agrave;nh MacOS Ventura th&acirc;n thiện</strong></h3>\n\n<p>Mac Mini M2 16GB 2023 mang trong m&igrave;nh con chip M2 c&ugrave;ng 10 nh&acirc;n GPU cho ph&eacute;p tăng cường hiệu suất l&ecirc;n 20% so với th&ocirc;ng thường. Với 16 nh&acirc;n Neural Engine, phi&ecirc;n bản sẵn s&agrave;ng chạy tốt c&aacute;c t&aacute;c vụ đ&ograve;i hỏi cao như render video, chỉnh ảnh, thiết kế đồ họa,&hellip; c&ugrave;ng bộ nhớ 16GB RAM cho tốc độ xử l&yacute; ổn định. Ngo&agrave;i ra, th&ocirc;ng qua hệ điều h&agrave;nh MacOS Ventura, bạn ho&agrave;n to&agrave;n c&oacute; thể y&ecirc;n t&acirc;m về t&iacute;nh bảo mật dữ liệu, cũng như khả năng truy xuất th&ocirc;ng tin trong qu&aacute; tr&igrave;nh sử dụng.</p>\n\n<p><img alt=\"Đánh giá Mac Mini M2 16GB 2023\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/pc/Mac-mini/M2/mac-mini-m2-16gb-2023-1.jpg\" /></p>', '2', 1, 0, 19989999, 1, '2023-09-19 09:53:40', '2023-09-19 09:53:40'),
(11, 'Laptop Lenovo IdeaPad 3 15ITL6 82H80388VN', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_22__28.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Mang thiết kế hiện đại với tone m&agrave;u x&aacute;m thanh lịch</li>\n	<li>CPU Intel Core i5-1135G7 chinh phục nhanh ch&oacute;ng c&aacute;c t&aacute;c vụ văn ph&ograve;ng</li>\n	<li>Card đồ họa Intel Iris Xe Graphics hỗ trợ chỉnh sửa h&igrave;nh ảnh cơ bản</li>\n	<li>RAM 8 GB v&agrave; ổ cứng SSD 256 GB đa nhiệm mượt m&agrave;, hỗ trợ truy xuất dữ liệu nhanh ch&oacute;ng</li>\n	<li>M&agrave;n h&igrave;nh 15.6 inch c&ugrave;ng c&ocirc;ng nghệ Anti Glare hạn chế t&igrave;nh trạng ch&oacute;i, lo&aacute; ở nơi c&oacute; &aacute;nh s&aacute;ng mạnh</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2><strong>Laptop Lenovo Ideapad 3 15ITL6 82H80388VN - Mỏng nhẹ với bộ cấu h&igrave;nh mạnh mẽ</strong></h2>\n\n<p><strong>Laptop Lenovo Ideapad 3 15ITL6 82H80388VN</strong>&nbsp;được đ&aacute;nh gi&aacute; cao khi sở hữu thiết kế thanh lịch v&agrave; bộ cấu h&igrave;nh mạnh mẽ. Được t&iacute;ch hợp bộ vi xử l&yacute; thế hệ mới của Intel, laptop c&oacute; thể đ&aacute;p ứng mọi nhu cầu học tập v&agrave; l&agrave;m việc của người d&ugrave;ng. Ngo&agrave;i ra, chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/lenovo/ideapad.html\"><strong>laptop Lenovo Ideapad</strong></a>&nbsp;cũng sở hữu m&agrave;n h&igrave;nh chống ch&oacute;i gi&uacute;p hạn chế t&igrave;nh trạng mỏi mắt khi l&agrave;m việc trong thời gian d&agrave;i.&nbsp;</p>\n\n<h3><strong>Đ&aacute;p ứng mọi t&aacute;c vụ học tập v&agrave; l&agrave;m việc với cấu h&igrave;nh ấn tượng</strong></h3>\n\n<p>Mẫu laptop thế hệ mới đến từ thương hiệu Lenovo được trang bị con chip Intel Core i5-1155G7 mạnh mẽ gi&uacute;p đẩy nhanh tốc độ xử l&yacute; mọi t&aacute;c vụ. Hơn nữa, năng suất l&agrave;m việc của bạn cũng được cải tiến đ&aacute;ng kể khi thiết bị sở hữu dung lượng RAM l&ecirc;n đến 8GB hỗ trợ đa nhiệm mượt m&agrave; v&agrave; bộ nhớ SSD 256GB.&nbsp;</p>\n\n<p><img alt=\"Laptop Lenovo IdeaPad 3 15ITL6 82H80388VN\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Lenovo/Ideapad/laptop-lenovo-ideapad-3-15itl6-82h80388vn-2.jpg\" /></p>\n\n<h3><strong>Thiết kế mỏng nhẹ với phong c&aacute;ch thanh lịch&nbsp;</strong></h3>\n\n<p>Laptop được ho&agrave;n thiện với lớp vỏ nhựa bền bỉ v&agrave; khả năng chống trầy xước tối ưu. Hơn nữa, tổng khối lượng của sản phẩm chỉ nặng khoảng 1.65kg gi&uacute;p bạn dễ d&agrave;ng xếp gọn v&agrave;o balo của m&igrave;nh. Với t&ocirc;ng m&agrave;u thanh lịch, ngoại h&igrave;nh của laptop được đ&aacute;nh gi&aacute; l&agrave; v&ocirc; c&ugrave;ng thanh lịch, ph&ugrave; hợp với học sinh, sinh vi&ecirc;n v&agrave; d&acirc;n văn ph&ograve;ng.&nbsp;</p>\n\n<p><img alt=\"Laptop Lenovo IdeaPad 3 15ITL6 82H80388VN\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Lenovo/Ideapad/laptop-lenovo-ideapad-3-15itl6-82h80388vn-1.jpg\" /></p>', '2', 2, 0, 11090000, 1, '2023-09-19 09:56:58', '2023-09-19 09:56:58'),
(12, 'Laptop MSI Modern 14 C7M-212VN6', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>CPU R5-7530U hỗ trợ tối đa trong c&aacute;c t&aacute;c vụ văn ph&ograve;ng cũng như chỉnh sửa ảnh nhẹ</li>\n	<li>M&agrave;n h&igrave;nh 14 inch c&ugrave;ng viền mỏng sẽ đem lại sự ấn tượng trong l&uacute;c xem h&igrave;nh ảnh, video</li>\n	<li>RAM 16GB hỗ trợ tốt trong việc mở nhiều tab m&agrave; kh&ocirc;ng lo lag m&aacute;y</li>\n	<li>Ổ cứng SSD 512GB cho ph&eacute;p lưu trữ nhiều th&ocirc;ng tin, dữ liệu tr&ecirc;n m&aacute;y t&iacute;nh</li>\n	<li>Thiết kế m&agrave;u đen tinh tế, sang trọng, trọng lượng nhẹ chỉ 1.4kg, dễ d&agrave;ng mang theo b&ecirc;n m&igrave;nh</li>\n</ul>\n\n<h2><strong>Laptop MSI modern 14 C7M-212VN - M&agrave;n h&igrave;nh si&ecirc;u sắc n&eacute;t</strong></h2>\n\n<p><strong>Laptop MSI modern 14 C7M-212VN&nbsp;</strong>với thiết kế cực kỳ hiện đại, đẳng cấp v&agrave; nhỏ gọn. Bạn c&oacute; thể linh hoạt mang theo laptop sử dụng cho c&ocirc;ng việc, học tập. Với vi xử l&yacute; AMD Ryzen 5 7530U, RAM 16GB v&agrave; ổ cứng PCIe 512GB, đ&acirc;y l&agrave; một chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop/msi/modern.html\"><strong>laptop MSI Modern</strong></a>&nbsp;đ&aacute;ng ch&uacute; &yacute; với hiệu năng vượt trội.</p>\n\n<h3><strong>Thiết kế đẳng cấp</strong></h3>\n\n<p>Laptop MSI Modern 14 C7M-212VN c&oacute; thiết kế thanh lịch v&agrave; mỏng nhẹ, gi&uacute;p bạn dễ d&agrave;ng mang theo bất cứ nơi n&agrave;o bạn muốn. Với m&agrave;u đen sang trọng, n&oacute; mang lại vẻ đẹp tinh tế v&agrave; chuy&ecirc;n nghiệp.</p>\n\n<p><img alt=\"Laptop MSI modern 14 C7M-212VN - Màn hình siêu sắc nét\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/MSI/modern/laptop-msi-modern-14-c7m-212vn-1.png\" /></p>\n\n<p>Sở hữu m&agrave;n h&igrave;nh k&iacute;ch thước 14.0 inch Full HD, MSI modern 14 C7M-212VN mang đến một trải nghiệm về phần nh&igrave;n một c&aacute;ch ch&acirc;n thật. Với độ ph&acirc;n giải cao, gi&uacute;p hiển thị được c&aacute;c m&agrave;u sắc sống động, bạn sẽ c&oacute; trải nghiệm sử dụng th&uacute; vị hơn cả.</p>\n\n<h3><strong>Hiệu năng mạnh mẽ vượt trội</strong></h3>\n\n<p>Laptop được trang bị vi xử l&yacute; AMD Ryzen 5 7530U, đem đến hiệu suất mạnh mẽ v&agrave; khả năng xử l&yacute; đa nhiệm mượt m&agrave;. Với RAM 16GB, bạn c&oacute; đủ t&agrave;i nguy&ecirc;n để chạy c&aacute;c ứng dụng đa nhiệm v&agrave; xử l&yacute; dữ liệu nhanh ch&oacute;ng.</p>\n\n<p><img alt=\"Laptop MSI modern 14 C7M-212VN - Màn hình siêu sắc nét\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/MSI/modern/laptop-msi-modern-14-c7m-212vn-2.png\" /></p>\n\n<p>Ổ cứng PCIe 512GB cho ph&eacute;p người d&ugrave;ng c&oacute; th&ecirc;m kh&ocirc;ng gian lưu trữ cực kỳ rộng r&atilde;i. Bạn đ&atilde; c&oacute; thể tải dữ liệu, lưu t&agrave;i liệu v&agrave; c&aacute;c ứng dụng kh&aacute;c của bạn một c&aacute;ch dễ d&agrave;ng.&nbsp;</p>', '1', 4, 0, 12190000, 1, '2023-09-19 09:59:57', '2023-09-19 09:59:57');
INSERT INTO `products` (`id`, `ten_san_pham`, `hinh_anh`, `mo_ta`, `danh_muc_id`, `thuong_hieu_id`, `luot_xem`, `gia`, `tinh_trang`, `created_at`, `updated_at`) VALUES
(13, 'Laptop ASUS TUF DASH Gaming F15 FX517ZC-HN079W', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/0/10h45_2.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Chip I5-12450H c&ugrave;ng card rời GeForce RTX 3050 chiến mọi tựa game ở mức đồ hoạ trung b&igrave;nh trở l&ecirc;n, chỉnh sửa h&igrave;nh ảnh tr&ecirc;n PTS, edit Video tr&ecirc;n Premier</li>\n	<li>Ram 8GB với 2 khe cắm c&oacute; thể n&acirc;ng cấp tối đa l&ecirc;n 32GB c&ugrave;ng ổ cứng SSD 512GB mang đến tốc độ xử l&yacute; nhanh c&ugrave;ng đa nhiệm mượt m&agrave;</li>\n	<li>M&agrave;n h&igrave;nh 15.6 inches với độ ph&acirc;n giải Full HD c&ugrave;ng tần số 144Hz mang đến trải nghiệm chơi game si&ecirc;u mượt m&agrave;, m&agrave;n h&igrave;nh chống l&oacute;a gi&uacute;p bảo vệ mắt khỏi &aacute;nh s&aacute;ng xanh</li>\n	<li>Trọng lượng 2.00 Kg mang lại cảm gi&aacute;c cầm chắc tay</li>\n	<li>Đa dạng cổng giao tiếp thuận tiện cho sử dụng</li>\n	<li>T&iacute;ch hợp web cam HD 720p cho ph&eacute;p đ&agrave;m thoại th&ocirc;ng qua video thoải m&aacute;i</li>\n	<li>M&aacute;y đi k&egrave;m Windows 11 Home SL bản quyền</li>\n</ul>\n\n<h2><strong>Laptop Asus Tuf Gaming F15 FX507ZC-HN124W - Hiệu năng mạnh mẽ</strong></h2>\n\n<p><strong>Laptop Asus Tuf Gaming F15 FX507ZC-HN124W</strong>&nbsp;l&agrave; thiết kế gaming c&oacute; hiệu năng khủng nhất, cải tiến mọi kh&iacute;a cạnh để trợ gi&uacute;p c&aacute;c game thủ. Nếu bạn muốn trở h&agrave;nh tay chơi game đi&ecirc;u luyện, đừng qu&ecirc;n chọn cho m&igrave;nh chiếc&nbsp;<a href=\"https://cellphones.com.vn/laptop.html\">laptop Asus Gaming</a>&nbsp;tối ưu nhất.</p>\n\n<h3><strong>Hiệu năng mạnh mẽ, xử l&yacute; t&aacute;c vụ nhanh ch&oacute;ng</strong></h3>\n\n<p>Laptop Asus Tuf Gaming F15 FX507ZC-HN124W sở hữu con chip Intel Gen 12 thế hệ mới đảm bảo tốc độ tối đa đạt 4.7 GHz. Hiệu suất c&oacute; sức mạnh cực lớn để xử l&yacute; c&aacute;c t&aacute;c vụ y&ecirc;u cầu độ kh&oacute; cao của đơn nh&acirc;n v&agrave; đa nh&acirc;n.</p>\n\n<p>Ram 8GB DDR5 hiện đại c&ugrave;ng ổ cứng dung lượng khủng 512GB, gi&uacute;p bạn lưu trữ những phần mềm ứng dụng v&agrave; đa nhiệm kh&ocirc;ng giật lag. H&igrave;nh ảnh được hỗ trợ bởi c&ocirc;ng nghệ card đồ họa rời RTX 3050 gi&uacute;p h&igrave;nh ảnh trở n&ecirc;n mượt m&agrave;, sinh động.</p>\n\n<p><img alt=\"Laptop ASUS TUF DASH Gaming F15 FX517ZC-HN079W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Laptop-Asus-Tuf-Gaming-F15-FX507ZC-HN124W-1_1.jpg\" /></p>\n\n<h3><strong>H&igrave;nh ảnh ch&acirc;n thực, mượt m&agrave;</strong></h3>\n\n<p>Laptop Asus Tuf Gaming F15 FX507ZC-HN124W c&ograve;n được hỗ trợ bởi m&agrave;n h&igrave;nh 15.6 inch si&ecirc;u mỏng với tỷ lệ m&agrave;n h&igrave;nh 80%. Kết hợp c&ugrave;ng tấm nền IPS v&agrave; độ ph&acirc;n giải Full HD cho trải nghiệm h&igrave;nh ảnh hiển thị v&ocirc; c&ugrave;ng đặc sắc.</p>\n\n<p>Tần số qu&eacute;t m&agrave;n h&igrave;nh của&nbsp;<a href=\"https://cellphones.com.vn/laptop/do-hoa.html\" target=\"_blank\"><strong>laptop đồ họa gi&aacute; rẻ</strong></a>&nbsp;n&agrave;y đạt 144Hz, gi&uacute;p h&igrave;nh ảnh lu&ocirc;n mượt mịn kh&ocirc;ng bị x&eacute; h&igrave;nh v&agrave; bắt kịp tốc độ chuyển cảnh.</p>\n\n<p><img alt=\"Laptop ASUS TUF DASH Gaming F15 FX517ZC-HN079W\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Laptop-Asus-Tuf-Gaming-F15-FX507ZC-HN124W-2_1.jpg\" /></p>', '4', 3, 0, 18950000, 1, '2023-09-19 10:04:11', '2023-09-19 10:04:11'),
(14, 'Laptop Asus Gaming Rog Strix G15 G513IH HN015W', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>&quot;Chip R7-4800H c&ugrave;ng card đồ họa rời Geforce GTX 1650 cho khả năng chiến c&aacute;c tựa game nặng, chỉnh sửa h&igrave;nh ảnh tr&ecirc;n PTS, Render video ngắn mượt m&agrave;</li>\n	<li>Ram 8GB + 1 khe, n&acirc;ng cấp tối đa 32GB c&ugrave;ng ổ cứng SSD c&oacute; kh&ocirc;ng gian lưu trữ l&ecirc;n tới 512GB cho tốc độ xử l&yacute; mượt m&agrave;, nhanh ch&oacute;ng, kh&ocirc;ng lo giật lag</li>\n	<li>M&agrave;n h&igrave;nh 15.6 inches tr&ecirc;n tấm nền IPS với độ ph&acirc;n giải Full HD c&ugrave;ng tần số 144Hz cho trải nghiệm h&igrave;nh ảnh, m&agrave;u sắc ch&acirc;n thực, sinh động</li>\n	<li>Đa dạng cổng giao tiếp, dễ d&agrave;ng sử dụng</li>\n	<li>Trọng lượng 2.1 kg thuận tiện cho di chuyển v&agrave; mang theo</li>\n	<li>M&aacute;y đi k&egrave;m Windows 11 SL bản quyền</li>\n	<li>&quot;</li>\n</ul>\n\n<h2><strong>Laptop Asus gaming Rog Strix G15 G513IH-HN015W - Cấu h&igrave;nh mạnh mẽ chiến game</strong></h2>\n\n<p>Asus ROG Strix G15 G513IH-HN015TW l&agrave; chiếc laptop c&oacute; cấu h&igrave;nh mạnh mẽ, đ&aacute;p ứng được hầu hết c&aacute;c tựa game tr&ecirc;n thị trường hiện nay. Ngay cả khi hoạt động trong nhiều giờ liền m&aacute;y vẫn kh&aacute; m&aacute;t mẻ do c&oacute; hệ thống tản nhiệt cao cấp. Nếu bạn l&agrave; một game thủ hay người d&ugrave;ng muốn t&igrave;m m&aacute;y c&oacute; cấu h&igrave;nh cao th&igrave; đừng bỏ qua chiếc laptop Asus chất lượng n&agrave;y.</p>\n\n<h3><strong>Thiết kế mạnh mẽ</strong></h3>\n\n<p><a href=\"https://cellphones.com.vn/laptop/asus/gaming.html\" target=\"_blank\"><strong>Asus ROG</strong></a>&nbsp;Strix G15 G513IH-HN015TW c&oacute; ngoại h&igrave;nh v&ocirc; c&ugrave;ng mạnh mẽ với m&agrave;u sắc trang nh&atilde;. Khung m&aacute;y c&oacute; k&iacute;ch thước nhỏ hơn đến 7% so với thế hệ trước gi&uacute;p bạn c&oacute; thể chơi bất cứ tựa game n&agrave;o m&agrave; bạn muốn.&nbsp;</p>\n\n<p><img alt=\"Thiết kế mạnh mẽ\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/LAPTOP-ASUS-GAMING-ROG-STRIX-G15-1.jpg\" /></p>\n\n<p>Những đường cắt hay biểu tượng tr&ecirc;n m&aacute;y cũng được thiết kế tinh tế. D&ugrave; đặt ở bất cứ vị tr&iacute; n&agrave;o m&aacute;y cũng cực kỳ thu h&uacute;t v&agrave; ấn tượng. Hệ thống đ&egrave;n chiếu s&aacute;ng mặt đ&aacute;y c&ugrave;ng hệ thống Aura Sync nổi bật từ logo kim loại của ROG c&agrave;ng khiến Asus ROG Strix G15 thu h&uacute;t hơn.</p>\n\n<h3><strong>Đ&egrave;n LED RGB tỏa s&aacute;ng rực rỡ</strong></h3>\n\n<p>Hệ thống đ&egrave;n LED&nbsp;nhiều m&agrave;u sắc&nbsp;của&nbsp;<a href=\"https://cellphones.com.vn/laptop/do-hoa.html\" target=\"_blank\"><strong>laptop đồ họa gi&aacute; rẻ</strong></a>&nbsp;vừa c&oacute; khả năng tăng cường độ bảo mật đ&egrave;n LED vừa tạo n&ecirc;n hiệu ứng &aacute;nh s&aacute;ng nổi bật tại mắt đ&aacute;y. Mặt lưng được l&agrave;m bằng chất liệu nh&ocirc;m cứng c&aacute;p cho cảm gi&aacute;c khung m&aacute;y trở n&ecirc;n b&oacute;ng bẩy hơn. Phần chiếu nghỉ tay được phủ bằng soft-touch cho cảm gi&aacute;c kh&aacute; dễ chịu v&agrave; thoải m&aacute;i.&nbsp;</p>\n\n<p><img alt=\"Đèn LED RGB tỏa sáng rực rỡ\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/LAPTOP-ASUS-GAMING-ROG-STRIX-G15-2.jpg\" /></p>\n\n<h3><strong>Hệ thống tản nhiệt tốt</strong></h3>\n\n<p>Asus ROG Strix G15 G513IH-HN015TW c&oacute; hệ thống tản nhiệt si&ecirc;u khủng. Với keo tản nhiệt kim loại lỏng tr&ecirc;n CPU m&aacute;y sở hữu khả năng l&agrave;m m&aacute;t v&ocirc; c&ugrave;ng tuyệt vời. So với phương ph&aacute;p l&agrave;m m&aacute;t truyền thống th&igrave; phương ph&aacute;p n&agrave;y c&oacute; t&iacute;nh vượt trội hơn nhiều lần.</p>\n\n<p><img alt=\"Hệ thống tản nhiệt tốt\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/LAPTOP-ASUS-GAMING-ROG-STRIX-G15-3.jpg\" /></p>\n\n<p>Ch&uacute;ng hoạt động theo nguy&ecirc;n tắc, đi l&ecirc;n đến 6 ống đồng v&agrave; 4 khe tản nhiệt c&oacute; k&iacute;ch thước lớn. L&uacute;c n&agrave;y ROG Strix series&nbsp; sẽ hoạt động mạnh, l&agrave;m m&aacute;t nhưng rất &ecirc;m &aacute;i. Độ ồn ở mức kh&aacute; thấp gi&uacute;p cho game thủ kh&ocirc;ng cảm thấy bị ph&acirc;n t&acirc;m. Ngay cả khi chơi li&ecirc;n tục trong nhiều giờ đồng hồ, m&aacute;y cũng n&oacute;ng l&ecirc;n kh&ocirc;ng đ&aacute;ng kể. Đ&acirc;y l&agrave; một trong những t&iacute;nh năng được rất nhiều game thủ y&ecirc;u th&iacute;ch.</p>\n\n<h3><strong>B&agrave;n di chuột lớn hơn</strong></h3>\n\n<p>B&agrave;n di chuột của Asus ROG Strix G15 G513IH-HN015TW R7 c&oacute; diện t&iacute;ch lớn hơn. Việc n&agrave;y thuận tiện hơn khi bạn cần sử m&aacute;y h&agrave;ng ng&agrave;y. Thiết kế n&agrave;y gi&uacute;p bạn c&oacute; kh&ocirc;ng gian lớn hơn để l&agrave;m việc. Khi thực hiện c&aacute;c thao t&aacute;c, động t&aacute;c độ ch&iacute;nh x&aacute;c sẽ cao hơn v&agrave; cảm gi&aacute;c b&agrave;n tay được thoải m&aacute;i hơn nhiều lần. B&agrave;n di chuột cứng được phủ một lớp nh&aacute;m mang đến cảm gi&aacute;c mềm mại; mượt m&agrave; khi chạm v&agrave;o.&nbsp;</p>\n\n<p><img alt=\"Bàn di chuột lớn hơn\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/LAPTOP-ASUS-GAMING-ROG-STRIX-G15-4.jpg\" /></p>\n\n<h3><strong>Chiến game si&ecirc;u mượt</strong></h3>\n\n<p>Khả năng chiến game của Asus ROG Strix G15 G513IH-HN015TW được đ&aacute;nh gi&aacute; rất xuất sắc. Với m&agrave;n h&igrave;nh FHD 144Hz c&ugrave;ng Adaptive-Sync gi&uacute;p loại bỏ hiện tượng x&eacute; viền. Kh&ocirc;ng chỉ vậy, nh&agrave; sản xuất lu&ocirc;n ch&uacute; trọng đến trải nghiệm cho người d&ugrave;ng khi thiết kế viền chỉ mỏng 4,5mm ở 3 cạnh. Bạn ho&agrave;n to&agrave;n tập trung v&agrave;o những trận chiến m&agrave; kh&ocirc;ng bị bất cứ yếu tố n&agrave;o l&agrave;m ph&acirc;n t&acirc;m.</p>\n\n<p><img alt=\"Chiến game siêu mượt\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/LAPTOP-ASUS-GAMING-ROG-STRIX-G15-5.jpg\" /></p>', '4', 3, 1, 17890000, 1, '2023-09-19 10:06:44', '2023-09-19 23:20:22'),
(15, 'Laptop MSI Cyborg 15 A12UCX-281VN', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_12__1.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Sở hữu thiết kế mỏng nhẹ, gi&uacute;p bạn mang theo b&ecirc;n người m&agrave; kh&ocirc;ng c&oacute; cảm gi&aacute;c qu&aacute; nặng</li>\n	<li>CPU&nbsp;I5-12450H c&ugrave;ng card đồ họa&nbsp;RTX2050&nbsp;gi&uacute;p bạn thỏa th&iacute;ch trải nghiệm c&aacute;c tựa game m&agrave; kh&ocirc;ng lo m&aacute;y lag</li>\n	<li>Ổ cứng SSD 512GB c&ugrave;ng RAM 8GB gi&uacute;p bạn c&oacute; một kh&ocirc;ng gian lưu trữ lớn nhưng laptop vẫn hoạt động mượt m&agrave;</li>\n	<li>M&agrave;n h&igrave;nh 15.6 inch c&ugrave;ng độ phủ m&agrave;u 45% NTSC đem lại trải nghiệm sắc n&eacute;t khi chơi game</li>\n</ul>\n\n<h2><strong>Laptop MSI Cyborg 15 A12UCX-281VN - Cấu h&igrave;nh mạnh mẽ, m&agrave;n h&igrave;nh tốc độ cao</strong></h2>\n\n<p>Laptop MSI Cyborg 15 A12UCX-281VN tuy được xếp v&agrave;o ph&acirc;n kh&uacute;c tầm trung nhưng lại c&oacute; cấu h&igrave;nh mạnh mẽ, l&agrave;m việc với đồ họa mượt m&agrave;. Với thiết kế trẻ trung c&ugrave;ng m&agrave;n h&igrave;nh chất lượng th&igrave; đ&acirc;y l&agrave; mẫu&nbsp;<a href=\"https://cellphones.com.vn/laptop/msi.html\" target=\"_blank\"><strong>lapotp MSI</strong></a>&nbsp;khiến bạn kh&oacute; l&ograve;ng bỏ qua.</p>\n\n<h3><strong>Xử l&yacute; đa nhiệm nhanh ch&oacute;ng, ổ cứng SSD lưu trữ dễ d&agrave;ng</strong></h3>\n\n<p>Laptop MSI Cyborg 15 A12UCX-281VN được trang bị vi xử l&yacute; Intel c&oacute; tốc độ tối đa 4.4 GHz đi c&ugrave;ng card đồ họa NVIDIA, đ&aacute;p ứng tốt c&aacute;c nhu cầu l&agrave;m việc với phần mềm đ&ograve;i hỏi cấu h&igrave;nh cao. Mặt kh&aacute;c, RAM DDR5 8GB, cho ph&eacute;p m&aacute;y xử l&yacute; nhanh ch&oacute;ng c&aacute;c t&aacute;c vụ đa nhiệm.</p>\n\n<p><img alt=\"Đánh giá laptop MSI Cyborg 15 A12UCX-281VN\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/MSI/laptop-msi-cyborg-15-a12ucx-281vn-2.jpg\" /></p>\n\n<p>Ngo&agrave;i ra, MSI Cyborg 15 A12UCX-281VN c&ograve;n cung cấp kh&ocirc;ng gian lưu trữ rộng r&atilde;i với ổ cứng SSD 512GB. Do đ&oacute;, từ c&aacute;c file tệp c&aacute; nh&acirc;n, ứng dụng hay c&aacute;c dữ liệu kh&aacute;c đều được lưu giữ một c&aacute;ch dễ d&agrave;ng.&nbsp;</p>\n\n<h3><strong>Thiết kế cứng c&aacute;p, năng động với gam m&agrave;u đen sang trọng</strong></h3>\n\n<p>Laptop MSI Cyborg 15 A12UCX-281VN sở hữu kiểu d&aacute;ng đơn giản với nắp lưng từ chất liệu cứng c&aacute;p. B&ecirc;n trong laptop c&ograve;n c&oacute; trang bị m&agrave;n h&igrave;nh k&iacute;ch thước lớn, độ ph&acirc;n giải Full HD cho h&igrave;nh ảnh sắc n&eacute;t c&ugrave;ng khả năng phản hồi tức th&igrave;.</p>\n\n<p><img alt=\"Đánh giá laptop MSI Cyborg 15 A12UCX-281VN\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/MSI/laptop-msi-cyborg-15-a12ucx-281vn-1.jpg\" /></p>\n\n<p>B&agrave;n ph&iacute;m của laptop c&ograve;n được l&agrave;m từ nhựa trong suốt c&oacute; t&iacute;ch hợp đ&egrave;n nền n&ecirc;n c&oacute; thể d&ugrave;ng tốt ngay trong m&ocirc;i trường thiếu &aacute;nh s&aacute;ng.</p>', '4', 4, 1, 17490000, 1, '2023-09-19 10:09:17', '2023-09-22 08:03:15'),
(16, 'Laptop Lenovo Legion LOQ 15IRH8 82XV000PVN', 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_21_.png', '<h2>ĐẶC ĐIỂM NỔI BẬT</h2>\n\n<ul>\n	<li>Sở hữu thiết kế sang trọng với gam m&agrave;u x&aacute;m tinh tế, dễ d&agrave;ng thu h&uacute;t người nh&igrave;n</li>\n	<li>C&acirc;n mọi t&aacute;c vụ học tập với CPU&nbsp;Intel Core&nbsp;I5-13420H</li>\n	<li>Card m&agrave;n h&igrave;nh&nbsp;NVIDIA GeForce RTX 4050 hỗ trợ tối đa việc chơi game, chỉnh sửa h&igrave;nh ảnh</li>\n	<li>Bộ nhớ SSD 512 GB cho ph&eacute;p bạn lưu trữ nhiều dữ liệu m&agrave; kh&ocirc;ng cần sao ch&eacute;p ra ngo&agrave;i</li>\n	<li>M&agrave;n h&igrave;nh 15.5 inch c&ugrave;ng c&ocirc;ng nghệ chống ch&oacute;i gi&uacute;p bạn c&oacute; những gi&acirc;y ph&uacute;t tận hưởng h&igrave;nh ảnh sắc n&eacute;t</li>\n</ul>\n\n<h2><strong>Laptop Lenovo LOQ 15IRH8 82XV000PVN &ndash; Đa dạng trải nghiệm</strong></h2>\n\n<p><strong>Laptop Lenovo LOQ 15IRH8 82XV000PVN</strong>&nbsp;l&agrave; một chiếc laptop tầm trung của h&atilde;ng với thiết kế bắt mắt. Với hiệu năng cực khủng, bạn c&oacute; thể thỏa sức chinh phục mọi t&aacute;c vụ &ldquo;chỉ trong t&iacute;ch tắc&rdquo; với&nbsp;<strong><a href=\"https://cellphones.com.vn/laptop/lenovo/gaming.html\">laptop Lenovo Gaming</a></strong>&nbsp;n&agrave;y, ngay cả khi sử dụng nhiều ứng dụng đồng thời.</p>\n\n<h3><strong>RAM nhạy b&eacute;n, ổ cứng mạnh mẽ</strong></h3>\n\n<p>Laptop Lenovo LOQ 15IRH8 82XV000PVN được trang bị bộ nhớ RAM DDR5 dung lượng 8GB. Đ&acirc;y l&agrave; một th&ocirc;ng số đ&aacute;ng ch&uacute; &yacute; để chạy c&aacute;c ứng dụng nặng v&agrave; đa nhiệm mượt m&agrave;, đồng thời cũng hỗ trợ cho việc chơi game hiệu quả.&nbsp;</p>\n\n<p><img alt=\"Laptop Lenovo LOQ 15IRH8 82XV000PVN – Đa dạng trải nghiệm\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Lenovo/legion/laptop-lenovo-loq-15irh8-82xv000pvn-1.jpg\" /></p>\n\n<p>B&ecirc;n cạnh đ&oacute;, ổ cứng SSD 512 GB c&ograve;n tiết kiệm điện năng cho m&aacute;y t&iacute;nh v&agrave; giảm thiểu tiếng ồn trong qu&aacute; tr&igrave;nh hoạt động. Ngo&agrave;i ra, người d&ugrave;ng c&ograve;n được ph&eacute;p n&acirc;ng cấp RAM tối đa 16GB sao cho ph&ugrave; hợp với mục đ&iacute;ch sử dụng.</p>\n\n<h3><strong>Thiết kế tinh giản, sắc m&agrave;u thanh lịch</strong></h3>\n\n<p>Laptop Lenovo LOQ 15IRH8 82XV000PVN c&oacute; diện mạo sang trọng nổi bật qua c&aacute;c chi tiết kim loại đẳng cấp. Vỏ m&aacute;y được l&agrave;m bằng nhựa cứng c&aacute;p, tạo n&ecirc;n vẻ ngo&agrave;i chắc chắn v&agrave; bền bỉ theo thời gian.&nbsp;</p>\n\n<p><img alt=\"Laptop Lenovo LOQ 15IRH8 82XV000PVN – Đa dạng trải nghiệm\" src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/laptop/Lenovo/legion/laptop-lenovo-loq-15irh8-82xv000pvn-2.jpg\" /></p>\n\n<p>Hơn thế nữa, laptop cũng c&oacute; k&iacute;ch thước kh&aacute; nhỏ gọn, dễ d&agrave;ng mang theo khi di chuyển với trọng lượng nhẹ chỉ khoảng 2.4 kg. Ngo&agrave;i ra, sản phẩm c&ograve;n sở hữu nhiều gam m&agrave;u tinh tế theo xu hướng hiện nay nhằm n&acirc;ng tầm thẩm mỹ cho người d&ugrave;ng.</p>', '4', 2, 1, 28890000, 1, '2023-09-19 10:11:18', '2023-09-22 08:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `cau_hinh_id` int(11) NOT NULL,
  `mau_sac_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_dieu_chinh` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `cau_hinh_id`, `mau_sac_id`, `so_luong`, `hinh_anh`, `gia_dieu_chinh`, `created_at`, `updated_at`, `luot_xem`) VALUES
(1, 1, 4, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 18750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(2, 1, 4, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 18750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(3, 1, 4, 4, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 18750000, '2023-09-19 09:25:07', '2023-09-19 23:19:02', 0),
(4, 1, 5, 1, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 20750000, '2023-09-19 09:25:07', '2023-09-22 08:18:10', 0),
(5, 1, 5, 2, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 20750000, '2023-09-19 09:25:07', '2023-09-19 23:19:02', 0),
(6, 1, 5, 4, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 20750000, '2023-09-19 09:25:07', '2023-09-22 08:18:10', 0),
(7, 1, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 22750000, '2023-09-19 09:25:07', '2023-09-19 09:25:07', 0),
(8, 1, 7, 2, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/a/i/air_m2.png', 22750000, '2023-09-19 09:25:07', '2023-09-22 08:18:10', 0),
(9, 2, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', 17990000, '2023-09-19 09:27:59', '2023-09-19 09:27:59', 0),
(10, 2, 7, 5, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', 17990000, '2023-09-19 09:27:59', '2023-09-19 10:39:45', 0),
(11, 2, 8, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', 19990000, '2023-09-19 09:27:59', '2023-09-19 09:27:59', 0),
(12, 2, 8, 5, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/5/h/5h53.png', 19990000, '2023-09-19 09:27:59', '2023-09-19 10:39:45', 0),
(13, 3, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-08t005130.908.png', 13450000, '2023-09-19 09:30:02', '2023-09-19 09:30:02', 0),
(14, 4, 5, 7, 200, 'https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/a/s/asus_x515ma-br481w.png', 7290000, '2023-09-19 09:33:02', '2023-09-19 09:33:02', 0),
(15, 4, 4, 7, 200, 'https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/a/s/asus_x515ma-br481w.png', 6990000, '2023-09-19 09:33:02', '2023-09-19 09:33:02', 0),
(16, 5, 5, 7, 192, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/2/h/2h08.png', 19990000, '2023-09-19 09:34:53', '2023-09-22 08:17:28', 0),
(17, 6, 4, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 29690000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(18, 6, 4, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 29690000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(19, 6, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 33990000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(20, 6, 5, 7, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 33990000, '2023-09-19 09:40:12', '2023-09-22 08:03:40', 0),
(21, 6, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 39990000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(22, 6, 7, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/p/r/pro-m2.jpg', 39990000, '2023-09-19 09:40:12', '2023-09-19 09:40:12', 0),
(24, 8, 7, 1, 200, 'https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/t/e/text_ng_n_21_.png', 14890000, '2023-09-19 09:43:50', '2023-09-19 09:43:50', 0),
(25, 9, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_2__1.png', 14990000, '2023-09-19 09:50:36', '2023-09-19 09:50:36', 0),
(26, 10, 4, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 19990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(27, 10, 5, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 20990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(28, 10, 6, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 21990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(29, 10, 7, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 22990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(30, 10, 8, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/m/a/macbook_mini_m2.png', 24990000, '2023-09-19 09:53:40', '2023-09-19 09:53:40', 0),
(31, 11, 4, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_22__28.png', 11090000, '2023-09-19 09:56:58', '2023-09-19 09:56:58', 0),
(32, 12, 4, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 12190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(33, 12, 4, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 12190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(34, 12, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 13190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(35, 12, 5, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 13190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(36, 12, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 15190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(37, 12, 7, 2, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_ng_n_-_2023-06-19t181236.684.png', 15190000, '2023-09-19 09:59:57', '2023-09-19 09:59:57', 0),
(38, 13, 7, 7, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/0/10h45_2.png', 18950000, '2023-09-19 10:04:11', '2023-09-19 10:04:11', 0),
(39, 13, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/0/10h45_2.png', 18950000, '2023-09-19 10:04:11', '2023-09-19 10:04:11', 0),
(40, 14, 5, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', 17890000, '2023-09-19 10:06:44', '2023-09-19 10:06:44', 0),
(41, 14, 6, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', 19890000, '2023-09-19 10:06:44', '2023-09-19 10:06:44', 0),
(42, 14, 7, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', 20890000, '2023-09-19 10:06:44', '2023-09-19 10:06:44', 0),
(43, 14, 8, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/4/h/4h43.png', 22890000, '2023-09-19 10:06:44', '2023-09-19 10:06:44', 0),
(44, 15, 7, 1, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_12__1.png', 17490000, '2023-09-19 10:09:17', '2023-09-22 08:03:40', 0),
(45, 16, 7, 1, 199, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_21_.png', 28890000, '2023-09-19 10:11:18', '2023-09-22 08:15:34', 0),
(52, 7, 8, 1, 200, 'https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/t/e/text_d_i_5__1.png', 19765000, '2023-09-22 09:59:00', '2023-09-22 09:59:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quyens`
--

CREATE TABLE `quyens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_quyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyens`
--

INSERT INTO `quyens` (`id`, `ten_quyen`, `tinh_trang`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2023-08-30 03:26:00', '2023-08-30 03:26:00'),
(2, 'Employee', 1, '2023-08-31 07:52:30', '2023-08-31 07:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `quyen_chuc_nangs`
--

CREATE TABLE `quyen_chuc_nangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_quyen` int(11) NOT NULL,
  `id_chuc_nang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen_chuc_nangs`
--

INSERT INTO `quyen_chuc_nangs` (`id`, `id_quyen`, `id_chuc_nang`, `created_at`, `updated_at`) VALUES
(1, 1, 100, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(2, 1, 101, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(3, 1, 102, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(4, 1, 103, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(5, 1, 104, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(6, 1, 105, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(7, 1, 106, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(8, 1, 107, '2023-08-30 03:32:40', '2023-08-30 03:32:40'),
(17, 2, 100, '2023-09-22 08:27:31', '2023-09-22 08:27:31'),
(18, 2, 101, '2023-09-22 08:27:31', '2023-09-22 08:27:31'),
(19, 2, 102, '2023-09-22 08:27:31', '2023-09-22 08:27:31'),
(20, 2, 103, '2023-09-22 08:27:31', '2023-09-22 08:27:31'),
(21, 2, 104, '2023-09-22 08:27:31', '2023-09-22 08:27:31'),
(22, 2, 105, '2023-09-22 08:27:31', '2023-09-22 08:27:31'),
(23, 2, 106, '2023-09-22 08:27:31', '2023-09-22 08:27:31'),
(24, 2, 107, '2023-09-22 08:27:31', '2023-09-22 08:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `thuong_hieus`
--

CREATE TABLE `thuong_hieus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_thuong_hieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuong_hieus`
--

INSERT INTO `thuong_hieus` (`id`, `ten_thuong_hieu`, `mo_ta`, `hinh_anh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '<p>apple</p>', 'https://media.designrush.com/inspiration_images/134802/conversions/_1511456315_653_apple-preview.jpg', 1, '2023-09-19 09:18:44', '2023-09-19 09:18:44'),
(2, 'Lenovo', '<p>lenovo</p>', 'https://upload.wikimedia.org/wikipedia/commons/1/1a/Lenovo_Corporate_Logo.png', 1, '2023-09-19 09:19:13', '2023-09-19 09:19:13'),
(3, 'Asus', '<p>asus</p>', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/AsusTek-black-logo.png/1200px-AsusTek-black-logo.png', 1, '2023-09-19 09:19:41', '2023-09-19 09:19:41'),
(4, 'Msi', '<p>msi</p>', 'https://upload.wikimedia.org/wikipedia/vi/6/6c/Msi_logo.png', 1, '2023-09-19 09:20:22', '2023-09-19 09:20:22'),
(5, 'Dell', '<p>dell</p>', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Dell_Logo.svg/768px-Dell_Logo.svg.png', 1, '2023-09-19 09:21:48', '2023-09-19 09:21:48'),
(6, 'Acer', '<p>acer</p>', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Acer_Logo.svg/2560px-Acer_Logo.svg.png', 1, '2023-09-19 09:47:01', '2023-09-19 09:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cau_hinhs`
--
ALTER TABLE `cau_hinhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_nangs`
--
ALTER TABLE `chuc_nangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_sach_tai_khoans`
--
ALTER TABLE `danh_sach_tai_khoans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyens`
--
ALTER TABLE `quyens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen_chuc_nangs`
--
ALTER TABLE `quyen_chuc_nangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuong_hieus`
--
ALTER TABLE `thuong_hieus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cau_hinhs`
--
ALTER TABLE `cau_hinhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chuc_nangs`
--
ALTER TABLE `chuc_nangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `danh_sach_tai_khoans`
--
ALTER TABLE `danh_sach_tai_khoans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62732;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `quyens`
--
ALTER TABLE `quyens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quyen_chuc_nangs`
--
ALTER TABLE `quyen_chuc_nangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `thuong_hieus`
--
ALTER TABLE `thuong_hieus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
