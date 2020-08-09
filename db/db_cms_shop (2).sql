-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: mysql
-- Thời gian đã tạo: Th8 09, 2020 lúc 01:20 AM
-- Phiên bản máy phục vụ: 8.0.19
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_cms_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_orders`
--

CREATE TABLE `bill_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `bill_date` datetime NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_type` tinyint NOT NULL DEFAULT '0',
  `total_price` bigint NOT NULL DEFAULT '0',
  `coupon` int NOT NULL DEFAULT '0',
  `total_money` bigint NOT NULL DEFAULT '0',
  `total_quantity` bigint NOT NULL DEFAULT '0',
  `pair_pay` bigint NOT NULL DEFAULT '0',
  `lack` bigint NOT NULL DEFAULT '0',
  `bill_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_orders`
--

INSERT INTO `bill_orders` (`id`, `bill_code`, `input_id`, `supplier_id`, `bill_date`, `notes`, `sell_type`, `total_price`, `coupon`, `total_money`, `total_quantity`, `pair_pay`, `lack`, `bill_detail`, `user_practise`, `bill_status`, `created_at`, `updated_at`) VALUES
(7, 'HDM-6628355991', 4, 2, '2020-01-03 00:00:00', 'aaa', 1, 17500000, 0, 17400000, 0, 17500000, 100000, '[{\"id\":\"5\",\"product_code\":\"SKU-9119441918847\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 01\",\"amount_bill\":\"15\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"1500000\",\"product_sell_amount\":\"15\"},{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"amount_bill\":\"20\",\"product_origin_price\":\"150000\",\"total_money_bill\":\"3000000\",\"product_sell_amount\":\"20\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"amount_bill\":\"50\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"5000000\",\"product_sell_amount\":\"50\"},{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"amount_bill\":\"80\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"8000000\",\"product_sell_amount\":\"80\"},{\"id\":\"5\",\"product_code\":\"SKU-9119441918847\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 01\",\"amount_bill\":\"15\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"1500000\",\"product_sell_amount\":\"15\"},{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"amount_bill\":\"20\",\"product_origin_price\":\"150000\",\"total_money_bill\":\"3000000\",\"product_sell_amount\":\"20\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"amount_bill\":\"50\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"5000000\",\"product_sell_amount\":\"50\"},{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"amount_bill\":\"80\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"8000000\",\"product_sell_amount\":\"80\"},{\"id\":\"5\",\"product_code\":\"SKU-9119441918847\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 01\",\"amount_bill\":\"15\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"1500000\",\"product_sell_amount\":\"15\"},{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"amount_bill\":\"20\",\"product_origin_price\":\"150000\",\"total_money_bill\":\"3000000\",\"product_sell_amount\":\"20\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"amount_bill\":\"50\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"5000000\",\"product_sell_amount\":\"50\"},{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"amount_bill\":\"80\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"8000000\",\"product_sell_amount\":\"80\"},{\"id\":\"5\",\"product_code\":\"SKU-9119441918847\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 01\",\"amount_bill\":\"15\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"1500000\",\"product_sell_amount\":\"15\"},{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"amount_bill\":\"20\",\"product_origin_price\":\"150000\",\"total_money_bill\":\"3000000\",\"product_sell_amount\":\"20\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"amount_bill\":\"50\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"5000000\",\"product_sell_amount\":\"50\"},{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"amount_bill\":\"80\",\"product_origin_price\":\"100000\",\"total_money_bill\":\"8000000\",\"product_sell_amount\":\"80\"}]', 'system admin', 0, '2020-08-04 15:52:02', '2020-08-04 15:52:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_birthday` date NOT NULL,
  `customer_gender` tinyint NOT NULL,
  `user_practise` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_code`, `customer_email`, `customer_phone`, `customer_address`, `customer_birthday`, `customer_gender`, `user_practise`, `customer_note`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Hiệp', 'KH-428143479', 'nguyentranhiep96@gmail.com', '0985940019', 'Ngõ 1 - Phạm Văn Đồng - Hà Nội', '1997-01-30', 1, 'system admin', NULL, '2020-06-24 16:00:47', '2020-06-24 16:00:47'),
(2, 'Lý Nguyễn Hoàng', 'KH-6121601242', 'hoang@gmail.com', '0333111000', 'Mai Dịch - Cầu Giấy - Hà Nội', '1997-05-04', 1, 'system admin', NULL, '2020-06-24 16:01:34', '2020-06-24 16:01:34'),
(3, 'Nguyễn Văn Thành', 'KH-5677070428', 'thanh@gmail.com', '0985940018', 'Ngõ 1 - Phạm Văn Đồng - Hà Nội', '1995-01-03', 1, 'system admin', NULL, '2020-06-24 16:02:17', '2020-06-24 16:02:17'),
(4, 'Nguyen Van Ga', 'KH-4321205012', 'ga123@gmail.com', '03895523456', 'Ngõ 1 - Phạm Văn Đồng - Hà Nội', '1997-05-04', 1, 'system admin', NULL, '2020-07-06 15:01:18', '2020-07-06 15:01:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exchange_bills`
--

CREATE TABLE `exchange_bills` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `exchange_date` datetime NOT NULL,
  `exchange_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_ammount` bigint NOT NULL,
  `exchange_price` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inputs`
--

CREATE TABLE `inputs` (
  `id` bigint UNSIGNED NOT NULL,
  `input_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pur_order_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `input_date` datetime NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_price` bigint NOT NULL DEFAULT '0',
  `total_quantity` bigint NOT NULL DEFAULT '0',
  `import_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `inputs`
--

INSERT INTO `inputs` (`id`, `input_code`, `pur_order_id`, `supplier_id`, `input_date`, `notes`, `total_price`, `total_quantity`, `import_detail`, `user_practise`, `input_status`, `created_at`, `updated_at`) VALUES
(4, 'PNK-7680358837', 4, 2, '2020-01-03 00:00:00', NULL, 17500000, 165, '[{\"id\":\"5\",\"product_code\":\"SKU-9119441918847\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 01\",\"amount_get\":\"15\",\"amount_ship\":\"15\",\"amount_input\":\"15\",\"origin_price\":\"100000\",\"total_money_input\":\"1500000\",\"product_sell_amount\":\"15\"},{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"amount_get\":\"20\",\"amount_ship\":\"20\",\"amount_input\":\"20\",\"origin_price\":\"150000\",\"total_money_input\":\"3000000\",\"product_sell_amount\":\"20\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"amount_get\":\"50\",\"amount_ship\":\"50\",\"amount_input\":\"50\",\"origin_price\":\"100000\",\"total_money_input\":\"5000000\",\"product_sell_amount\":\"50\"},{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"amount_get\":\"80\",\"amount_ship\":\"80\",\"amount_input\":\"80\",\"origin_price\":\"100000\",\"total_money_input\":\"8000000\",\"product_sell_amount\":\"80\"}]', 'system admin', 0, '2020-08-02 15:30:43', '2020-08-02 15:30:43'),
(5, 'PNK-8867012733', 6, 2, '2020-01-05 00:00:00', NULL, 3550000, 31, '[{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"amount_get\":\"9\",\"amount_ship\":\"9\",\"amount_input\":\"9\",\"origin_price\":\"150000\",\"total_money_input\":\"1350000\",\"product_sell_amount\":\"9\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"amount_get\":\"11\",\"amount_ship\":\"11\",\"amount_input\":\"11\",\"origin_price\":\"100000\",\"total_money_input\":\"1100000\",\"product_sell_amount\":\"11\"},{\"id\":\"9\",\"product_code\":\"SKU-1463513570141\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 05\",\"amount_get\":\"11\",\"amount_ship\":\"11\",\"amount_input\":\"11\",\"origin_price\":\"100000\",\"total_money_input\":\"1100000\",\"product_sell_amount\":\"11\"}]', 'system admin', 0, '2020-08-02 15:30:55', '2020-08-02 15:30:55'),
(6, 'PNK-6603274995', 5, 2, '2020-05-03 00:00:00', NULL, 1500000, 15, '[{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"amount_get\":\"5\",\"amount_ship\":\"5\",\"amount_input\":\"5\",\"origin_price\":\"100000\",\"total_money_input\":\"500000\",\"product_sell_amount\":\"5\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"amount_get\":\"5\",\"amount_ship\":\"5\",\"amount_input\":\"5\",\"origin_price\":\"100000\",\"total_money_input\":\"500000\",\"product_sell_amount\":\"5\"},{\"id\":\"9\",\"product_code\":\"SKU-1463513570141\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 05\",\"amount_get\":\"5\",\"amount_ship\":\"5\",\"amount_input\":\"5\",\"origin_price\":\"100000\",\"total_money_input\":\"500000\",\"product_sell_amount\":\"5\"}]', 'system admin', 0, '2020-08-02 15:31:07', '2020-08-02 15:31:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` bigint NOT NULL DEFAULT '0',
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `quantity`, `user_practise`, `created_at`, `updated_at`) VALUES
(1, 6, 10, 'system admin', '2020-08-02 07:27:05', '2020-08-02 07:27:05'),
(2, 8, 10, 'system admin', '2020-08-02 07:29:04', '2020-08-02 07:29:04'),
(3, 9, 10, 'system admin', '2020-08-02 07:29:27', '2020-08-02 07:29:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `id` bigint UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` text COLLATE utf8mb4_unicode_ci,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`id`, `manufacture_name`, `manufacture_slug`, `manufacture_description`, `user_practise`, `manufacture_status`, `created_at`, `updated_at`) VALUES
(1, 'Nhà sản xuất 1', 'nha-san-xuat-1', NULL, 'system admin', 1, '2020-06-24 13:55:39', '2020-06-24 13:55:39'),
(2, 'Nhà sản xuất 2', 'nha-san-xuat-2', NULL, 'system admin', 1, '2020-06-24 13:55:47', '2020-06-24 13:55:47'),
(3, 'Nhà sản xuất 3', 'nha-san-xuat-3', NULL, 'system admin', 1, '2020-06-24 13:55:54', '2020-06-24 13:55:54'),
(4, 'Nhà sản xuất 4', 'nha-san-xuat-4', NULL, 'system admin', 1, '2020-06-24 13:55:59', '2020-06-24 13:55:59'),
(5, 'Nhà sản xuất 5', 'nha-san-xuat-5', NULL, 'system admin', 1, '2020-06-24 13:56:05', '2020-06-24 13:56:05'),
(7, 'Nhà sản xuất 6', 'nha-san-xuat-6', NULL, 'system admin', 1, '2020-06-24 13:56:33', '2020-06-24 13:56:33'),
(8, 'Nhà sản xuất 7', 'nha-san-xuat-7', NULL, 'system admin', 1, '2020-06-24 13:56:48', '2020-06-24 13:56:48'),
(9, 'Nhà sản xuất 8', 'nha-san-xuat-8', NULL, 'system admin', 1, '2020-06-24 13:57:26', '2020-06-24 13:57:26'),
(10, 'Nhà sản xuất 9', 'nha-san-xuat-9', NULL, 'system admin', 1, '2020-06-24 13:57:36', '2020-06-24 13:57:36'),
(11, 'Nhà sản xuất 10', 'nha-san-xuat-10', NULL, 'system admin', 1, '2020-06-24 13:57:48', '2020-06-24 13:57:48'),
(12, 'Nhà sản xuất 11', 'nha-san-xuat-11', NULL, 'system admin', 1, '2020-06-24 13:57:57', '2020-06-24 13:58:06'),
(13, 'Nhà sản xuất 12', 'nha-san-xuat-12', NULL, 'system admin', 1, '2020-06-24 13:58:17', '2020-06-24 13:58:17'),
(14, 'Nhà sản xuất 13', 'nha-san-xuat-13', NULL, 'system admin', 1, '2020-06-24 13:58:27', '2020-06-24 13:58:27'),
(15, 'Nhà sản xuất 14', 'nha-san-xuat-14', NULL, 'system admin', 1, '2020-06-24 13:58:37', '2020-06-24 13:58:37'),
(16, 'Nhà sản xuất 15', 'nha-san-xuat-15', NULL, 'system admin', 1, '2020-06-24 13:58:50', '2020-06-24 13:58:50'),
(17, 'Nhà sản xuất 16', 'nha-san-xuat-16', NULL, 'system admin', 1, '2020-06-24 13:58:58', '2020-06-24 13:58:58'),
(18, 'Nhà sản xuất 17', 'nha-san-xuat-17', NULL, 'system admin', 1, '2020-06-24 13:59:08', '2020-06-24 13:59:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_04_000000_create_users_table', 1),
(4, '2020_04_04_193354_create_product_groups_table', 1),
(5, '2020_04_04_193423_create_manufactures_table', 1),
(7, '2020_04_04_193458_create_suppliers_table', 1),
(10, '2020_04_21_145845_create_customers_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 2),
(22, '2020_04_04_193443_create_products_table', 2),
(23, '2020_04_04_193521_create_orders_table', 2),
(24, '2020_04_04_193530_create_inventories_table', 2),
(25, '2020_05_14_230220_create_jobs_table', 2),
(26, '2020_06_22_145741_create_inputs_table', 2),
(27, '2020_07_09_134516_create_purchase_orders_table', 2),
(28, '2020_07_12_153327_create_bill_orders_table', 2),
(29, '2020_08_01_075014_create_product_defectives_table', 2),
(30, '2020_08_01_075027_create_exchange_bills_table', 2),
(32, '2020_08_01_075033_create_out_stock_bills_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_date` datetime NOT NULL,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int NOT NULL,
  `total_origin_price` bigint NOT NULL DEFAULT '0',
  `total_price` bigint NOT NULL DEFAULT '0',
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_type` tinyint NOT NULL DEFAULT '0',
  `coupon` bigint NOT NULL DEFAULT '0',
  `total_money` bigint NOT NULL DEFAULT '0',
  `total_quantity` bigint NOT NULL DEFAULT '0',
  `customer_pay` bigint NOT NULL DEFAULT '0',
  `lack` bigint NOT NULL DEFAULT '0',
  `order_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `sell_date`, `user_practise`, `customer_id`, `total_origin_price`, `total_price`, `notes`, `sell_type`, `coupon`, `total_money`, `total_quantity`, `customer_pay`, `lack`, `order_detail`, `order_status`, `created_at`, `updated_at`) VALUES
(7, 'DH-1094289129', '2020-08-08 10:23:13', 'system admin', 1, 350000, 1500000, 'aaa', 0, 150000, 1350000, 6, 1500000, 150000, '[{\"id\":\"9\",\"product_code\":\"SKU-1463513570141\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 05\",\"product_amount\":\"141\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"1\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:29:26\",\"updated_at\":\"2020-08-06 14:59:09\",\"deleted_at\":null,\"product_sell_amount\":\"4\"},{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"product_amount\":\"177\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"150000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/4Bng9d_simg_d0daf0_800x1200_max.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:05\",\"updated_at\":\"2020-08-06 14:59:30\",\"deleted_at\":null,\"product_sell_amount\":\"1\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"product_amount\":\"226\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/56451192_6117953237866_4080207545241698304_n.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:43\",\"updated_at\":\"2020-08-06 14:59:30\",\"deleted_at\":null,\"product_sell_amount\":\"1\"}]', 0, '2020-08-08 10:23:13', '2020-08-08 10:23:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `out_stock_bills`
--

CREATE TABLE `out_stock_bills` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_out_stock_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `bill_out_stock_date` datetime NOT NULL,
  `total_price` bigint NOT NULL DEFAULT '0',
  `total_quantity` bigint NOT NULL DEFAULT '0',
  `bill_out_stock_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_out_stock_reason` text COLLATE utf8mb4_unicode_ci,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_out_stock_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `out_stock_bills`
--

INSERT INTO `out_stock_bills` (`id`, `bill_out_stock_code`, `supplier_id`, `bill_out_stock_date`, `total_price`, `total_quantity`, `bill_out_stock_detail`, `bill_out_stock_reason`, `user_practise`, `bill_out_stock_status`, `created_at`, `updated_at`) VALUES
(4, 'PXK-7723818769', 2, '2020-01-03 00:00:00', 2050000, 0, '[{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"product_amount\":\"186\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"150000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/4Bng9d_simg_d0daf0_800x1200_max.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:05\",\"updated_at\":\"2020-08-06 14:37:58\",\"deleted_at\":null,\"product_sell_amount\":\"7\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"product_amount\":\"233\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/56451192_6117953237866_4080207545241698304_n.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:43\",\"updated_at\":\"2020-08-06 14:37:58\",\"deleted_at\":null,\"product_sell_amount\":\"5\"},{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"product_amount\":\"264\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:28:38\",\"updated_at\":\"2020-08-02 15:31:07\",\"deleted_at\":null,\"product_sell_amount\":\"5\"}]', 'aaaa', 'system admin', 0, '2020-08-06 14:58:43', '2020-08-06 14:58:43'),
(5, 'PXK-8076317637', 2, '2020-01-03 00:00:00', 450000, 0, '[{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"product_amount\":\"228\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/56451192_6117953237866_4080207545241698304_n.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:43\",\"updated_at\":\"2020-08-06 14:58:43\",\"deleted_at\":null,\"product_sell_amount\":\"1\"},{\"id\":\"9\",\"product_code\":\"SKU-1463513570141\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 05\",\"product_amount\":\"142\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"1\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:29:26\",\"updated_at\":\"2020-08-02 15:31:07\",\"deleted_at\":null,\"product_sell_amount\":\"1\"},{\"id\":\"5\",\"product_code\":\"SKU-9119441918847\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 01\",\"product_amount\":\"121\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"150000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/0bf5122cc5c3672d0ed2f85f5f82a61f.jpeg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:25:57\",\"updated_at\":\"2020-08-06 14:37:58\",\"deleted_at\":null,\"product_sell_amount\":\"1\"},{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"product_amount\":\"179\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"150000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/4Bng9d_simg_d0daf0_800x1200_max.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:05\",\"updated_at\":\"2020-08-06 14:58:43\",\"deleted_at\":null,\"product_sell_amount\":\"1\"}]', 'aaaa', 'system admin', 0, '2020-08-06 14:59:09', '2020-08-06 14:59:09'),
(6, 'PXK-7652251376', 1, '2020-01-03 00:00:00', 350000, 0, '[{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"product_amount\":\"178\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"150000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/4Bng9d_simg_d0daf0_800x1200_max.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:05\",\"updated_at\":\"2020-08-06 14:59:09\",\"deleted_at\":null,\"product_sell_amount\":\"1\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"product_amount\":\"227\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/56451192_6117953237866_4080207545241698304_n.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:43\",\"updated_at\":\"2020-08-06 14:59:09\",\"deleted_at\":null,\"product_sell_amount\":\"1\"},{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"product_amount\":\"259\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:28:38\",\"updated_at\":\"2020-08-06 14:58:43\",\"deleted_at\":null,\"product_sell_amount\":\"1\"}]', 'aádádads', 'system admin', 0, '2020-08-06 14:59:30', '2020-08-06 14:59:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_amount` int NOT NULL DEFAULT '0',
  `product_amount_inventory` int NOT NULL DEFAULT '0',
  `product_origin_price` int NOT NULL DEFAULT '0',
  `product_sell_price` int NOT NULL DEFAULT '0',
  `product_inventory` tinyint NOT NULL DEFAULT '0',
  `product_allow_negative` tinyint NOT NULL DEFAULT '0',
  `product_manufacture_id` bigint UNSIGNED NOT NULL,
  `product_group_id` bigint UNSIGNED NOT NULL,
  `product_image_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `product_status` tinyint NOT NULL DEFAULT '1',
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_amount`, `product_amount_inventory`, `product_origin_price`, `product_sell_price`, `product_inventory`, `product_allow_negative`, `product_manufacture_id`, `product_group_id`, `product_image_url`, `product_description`, `product_status`, `user_practise`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'SKU-9119441918847', 'sản phẩm 01', 120, 0, 100000, 150000, 0, 0, 1, 1, 'http://localhost/storage/photos/1/0bf5122cc5c3672d0ed2f85f5f82a61f.jpeg', NULL, 1, 'system admin', '2020-08-02 07:25:57', '2020-08-06 14:59:09', NULL),
(6, 'SKU-5846054525899', 'sản phẩm 02', 176, 10, 150000, 250000, 1, 0, 1, 1, 'http://localhost/storage/photos/1/4Bng9d_simg_d0daf0_800x1200_max.jpg', NULL, 1, 'system admin', '2020-08-02 07:27:05', '2020-08-08 10:23:13', NULL),
(7, 'SKU-4046548266565', 'sản phẩm 03', 225, 0, 100000, 250000, 0, 0, 1, 1, 'http://localhost/storage/photos/1/56451192_6117953237866_4080207545241698304_n.jpg', NULL, 1, 'system admin', '2020-08-02 07:27:43', '2020-08-08 10:23:13', NULL),
(8, 'SKU-8348891675977', 'sản phẩm 04', 258, 10, 100000, 250000, 1, 0, 1, 1, 'http://localhost/storage/photos/1/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg', NULL, 1, 'system admin', '2020-08-02 07:28:38', '2020-08-06 14:59:30', NULL),
(9, 'SKU-1463513570141', 'sản phẩm 05', 137, 10, 100000, 250000, 1, 1, 1, 1, 'http://localhost/storage/photos/1/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg', NULL, 1, 'system admin', '2020-08-02 07:29:26', '2020-08-08 10:23:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_defectives`
--

CREATE TABLE `product_defectives` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_groups`
--

CREATE TABLE `product_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `pro_group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_group_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_group_description` text COLLATE utf8mb4_unicode_ci,
  `pro_group_parent_id` tinyint NOT NULL DEFAULT '0',
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_group_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_groups`
--

INSERT INTO `product_groups` (`id`, `pro_group_name`, `pro_group_slug`, `pro_group_description`, `pro_group_parent_id`, `user_practise`, `pro_group_status`, `created_at`, `updated_at`) VALUES
(1, 'Danh mục 1', 'danh-muc-1', NULL, 0, 'system admin', 1, '2020-06-24 13:51:48', '2020-06-24 13:51:48'),
(2, 'Danh mục 2', 'danh-muc-2', NULL, 0, 'system admin', 1, '2020-06-24 13:51:55', '2020-06-24 13:51:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `pur_order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `pur_order_date` datetime NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_price` bigint NOT NULL DEFAULT '0',
  `total_quantity` bigint NOT NULL DEFAULT '0',
  `pur_order_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pur_order_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `pur_order_code`, `supplier_id`, `pur_order_date`, `notes`, `total_price`, `total_quantity`, `pur_order_detail`, `user_practise`, `pur_order_status`, `created_at`, `updated_at`) VALUES
(4, 'PYC-3733544192', 2, '2020-01-03 00:00:00', 'aaa', 17500000, 0, '[{\"id\":\"5\",\"product_code\":\"SKU-9119441918847\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 01\",\"product_amount\":\"92\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"150000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/0bf5122cc5c3672d0ed2f85f5f82a61f.jpeg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:25:57\",\"updated_at\":\"2020-08-02 08:17:22\",\"deleted_at\":null,\"product_sell_amount\":\"15\"},{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"product_amount\":\"120\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"150000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/4Bng9d_simg_d0daf0_800x1200_max.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:05\",\"updated_at\":\"2020-08-02 08:01:21\",\"deleted_at\":null,\"product_sell_amount\":\"20\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"product_amount\":\"96\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/56451192_6117953237866_4080207545241698304_n.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:43\",\"updated_at\":\"2020-08-02 08:17:52\",\"deleted_at\":null,\"product_sell_amount\":\"50\"},{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"product_amount\":\"99\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:28:38\",\"updated_at\":\"2020-08-02 08:16:54\",\"deleted_at\":null,\"product_sell_amount\":\"80\"}]', 'system admin', 0, '2020-08-02 14:29:25', '2020-08-02 14:29:25'),
(5, 'PYC-7783897519', 2, '2020-01-03 00:00:00', 'ssss', 1500000, 0, '[{\"id\":\"8\",\"product_code\":\"SKU-8348891675977\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 04\",\"product_amount\":\"99\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:28:38\",\"updated_at\":\"2020-08-02 08:16:54\",\"deleted_at\":null,\"product_sell_amount\":\"5\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"product_amount\":\"96\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/56451192_6117953237866_4080207545241698304_n.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:43\",\"updated_at\":\"2020-08-02 08:17:52\",\"deleted_at\":null,\"product_sell_amount\":\"5\"},{\"id\":\"9\",\"product_code\":\"SKU-1463513570141\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 05\",\"product_amount\":\"104\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"1\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:29:26\",\"updated_at\":\"2020-08-02 08:17:22\",\"deleted_at\":null,\"product_sell_amount\":\"5\"}]', 'system admin', 0, '2020-08-02 14:30:14', '2020-08-02 14:30:14'),
(6, 'PYC-5623250714', 2, '2020-01-03 00:00:00', 'aaa', 3550000, 0, '[{\"id\":\"6\",\"product_code\":\"SKU-5846054525899\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 02\",\"product_amount\":\"120\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"150000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/4Bng9d_simg_d0daf0_800x1200_max.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:05\",\"updated_at\":\"2020-08-02 08:01:21\",\"deleted_at\":null,\"product_sell_amount\":\"9\"},{\"id\":\"7\",\"product_code\":\"SKU-4046548266565\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 03\",\"product_amount\":\"96\",\"product_amount_inventory\":\"0\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"0\",\"product_allow_negative\":\"0\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/56451192_6117953237866_4080207545241698304_n.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:27:43\",\"updated_at\":\"2020-08-02 08:17:52\",\"deleted_at\":null,\"product_sell_amount\":\"11\"},{\"id\":\"9\",\"product_code\":\"SKU-1463513570141\",\"product_name\":\"s\\u1ea3n ph\\u1ea9m 05\",\"product_amount\":\"104\",\"product_amount_inventory\":\"10\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"250000\",\"product_inventory\":\"1\",\"product_allow_negative\":\"1\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":null,\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-08-02 07:29:26\",\"updated_at\":\"2020-08-02 08:17:22\",\"deleted_at\":null,\"product_sell_amount\":\"11\"}]', 'system admin', 0, '2020-08-02 14:37:16', '2020-08-02 14:37:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ATM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_input` datetime DEFAULT NULL,
  `total_money_input` bigint NOT NULL DEFAULT '0',
  `lack_input` bigint NOT NULL DEFAULT '0',
  `supplier_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_code`, `supplier_name`, `supplier_phone`, `supplier_email`, `address`, `ATM`, `last_input`, `total_money_input`, `lack_input`, `supplier_note`, `user_practise`, `created_at`, `updated_at`) VALUES
(1, 'NCC-115411', 'Nhà cung cấp 1', '0985940019', 'nhacungcap1@gmail.com', 'Ba Vì - Hà Nội', '1234567890123', NULL, 0, 0, 'aaa', 'system admin', '2020-06-25 02:48:24', '2020-06-25 02:48:24'),
(2, 'NCC-427651', 'Nhà cung cấp 2', '01234567890', 'nhacungcap2@gmail.com', 'Phạm Văn Đồng - Hà Nội', '1234567890123', NULL, 0, 0, 'nhà cung cấp 2', 'system admin', '2020-06-25 02:49:24', '2020-06-25 02:49:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int NOT NULL DEFAULT '1',
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `gender` tinyint DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `avatar`, `fullname`, `level`, `user_code`, `name`, `phone`, `address`, `gender`, `birthday`, `info`, `email`, `email_verified_at`, `password`, `status`, `user_practise`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 0, 'QTV-01', 'system admin', NULL, NULL, NULL, NULL, NULL, 'admin@admin.com', NULL, '$2y$10$l4atcW.UW5pBQBh.G953zeb1AykXCi.Oi6Yo77eecAxGazZKwCJSe', 1, 'system admin', NULL, '2020-06-24 13:48:08', '2020-06-24 13:48:08'),
(6, NULL, NULL, 1, 'NV-942314', 'Nguyễn Văn Hiệp', NULL, NULL, NULL, NULL, NULL, 'nguyentranhiep96@gmail.com', NULL, '$2y$10$kPngKTtH6WxLj9fRwyz7vuFJEFmX8HFuTpIROubmxLdPlAwVzMyvC', 1, 'system admin', NULL, '2020-08-08 02:26:01', '2020-08-08 02:26:01'),
(7, NULL, NULL, 2, 'NV-227780', 'Lý Nguyễn Hoàng', NULL, NULL, NULL, NULL, NULL, 'hoang@gmail.com', NULL, '$2y$10$bis5LCyfWt7EMaTaChcI/uBpmhktgdu6KGVfArzyB3dwsKtAREEaG', 1, 'system admin', NULL, '2020-08-08 02:26:29', '2020-08-08 02:26:29'),
(8, NULL, NULL, 3, 'NV-385135', 'Dương Bá Trường', NULL, NULL, NULL, NULL, NULL, 'truong@gmail.com', NULL, '$2y$10$rXLPcy/Z0WtDnEGvB9ryyOmoWvv8kxw5KjKDb9FTIIhjPunseMeFu', 1, 'system admin', NULL, '2020-08-08 02:27:06', '2020-08-08 02:27:06'),
(9, NULL, NULL, 4, 'NV-977778', 'Lê Yến Nhi', NULL, NULL, NULL, NULL, NULL, 'nhi97@gmail.com', NULL, '$2y$10$KpJmqLR8IfaiY/3zAndIPOEi3HvHI.W8Dupm24QkxR7Nf87x5PZrO', 1, 'system admin', NULL, '2020-08-08 02:27:42', '2020-08-08 02:27:42'),
(10, NULL, NULL, 4, 'NV-833600', 'Nguyễn Thu Hiền', NULL, NULL, NULL, NULL, NULL, 'hien97@gmail.com', NULL, '$2y$10$GTEy3ue9gZujHjvHq6W2E.RKYkNLjE6qoCxMk6vHKZxpIvhnhUO6y', 1, 'system admin', NULL, '2020-08-08 02:28:07', '2020-08-08 02:28:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill_orders`
--
ALTER TABLE `bill_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bill_orders_bill_code_unique` (`bill_code`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_customer_code_unique` (`customer_code`),
  ADD UNIQUE KEY `customers_customer_email_unique` (`customer_email`),
  ADD UNIQUE KEY `customers_customer_phone_unique` (`customer_phone`),
  ADD KEY `customers_customer_name_index` (`customer_name`);

--
-- Chỉ mục cho bảng `exchange_bills`
--
ALTER TABLE `exchange_bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inputs_input_code_unique` (`input_code`);

--
-- Chỉ mục cho bảng `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manufactures_manufacture_name_unique` (`manufacture_name`),
  ADD UNIQUE KEY `manufactures_manufacture_slug_unique` (`manufacture_slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`);

--
-- Chỉ mục cho bảng `out_stock_bills`
--
ALTER TABLE `out_stock_bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `out_stock_bills_bill_out_stock_code_unique` (`bill_out_stock_code`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`),
  ADD KEY `products_product_manufacture_id_foreign` (`product_manufacture_id`),
  ADD KEY `products_product_group_id_foreign` (`product_group_id`),
  ADD KEY `products_product_amount_index` (`product_amount`),
  ADD KEY `products_product_amount_inventory_index` (`product_amount_inventory`),
  ADD KEY `products_product_origin_price_index` (`product_origin_price`),
  ADD KEY `products_product_sell_price_index` (`product_sell_price`);

--
-- Chỉ mục cho bảng `product_defectives`
--
ALTER TABLE `product_defectives`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_groups_pro_group_name_unique` (`pro_group_name`),
  ADD UNIQUE KEY `product_groups_pro_group_slug_unique` (`pro_group_slug`);

--
-- Chỉ mục cho bảng `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_orders_pur_order_code_unique` (`pur_order_code`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_supplier_name_unique` (`supplier_name`),
  ADD KEY `suppliers_supplier_code_index` (`supplier_code`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_code_index` (`user_code`),
  ADD KEY `users_name_index` (`name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill_orders`
--
ALTER TABLE `bill_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `exchange_bills`
--
ALTER TABLE `exchange_bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `out_stock_bills`
--
ALTER TABLE `out_stock_bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_defectives`
--
ALTER TABLE `product_defectives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_group_id_foreign` FOREIGN KEY (`product_group_id`) REFERENCES `product_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_manufacture_id_foreign` FOREIGN KEY (`product_manufacture_id`) REFERENCES `manufactures` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
