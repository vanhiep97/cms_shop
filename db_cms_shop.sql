-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: mysql
-- Thời gian đã tạo: Th7 09, 2020 lúc 04:13 PM
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
(4, 'Nguyen Van Ga', 'KH-4321205012', 'ga123@gmail.com', '03895523456', 'Ngõ 1 - Phạm Văn Đồng - Hà Nội', '1997-05-04', 1, 'system admin', NULL, '2020-07-06 15:01:18', '2020-07-06 15:01:18'),
(6, 'adasdsdasda', 'KH-1667801709', 'thanh1@gmail.com', '123456', 'Long ND-Bac Cạn', '2020-02-23', 1, 'system admin', NULL, '2020-07-06 15:24:56', '2020-07-06 15:24:56'),
(7, 'đasdasad', 'KH-6158407112', 'nguyentranhiep916@gmail.com', '12123', 'Ngõ 1 - Phạm Văn Đồng - Hà Nội', '2020-02-23', 1, 'system admin', NULL, '2020-07-06 15:31:21', '2020-07-06 15:31:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `device_tokens`
--

INSERT INTO `device_tokens` (`id`, `device_token`, `ip_address`, `browser_login`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:48:26', '2020-06-24 13:48:26'),
(2, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:48:28', '2020-06-24 13:48:28'),
(3, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:48:30', '2020-06-24 13:48:30'),
(4, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:48:32', '2020-06-24 13:48:32'),
(5, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:51:01', '2020-06-24 13:51:01'),
(6, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:51:38', '2020-06-24 13:51:38'),
(7, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:51:49', '2020-06-24 13:51:49'),
(8, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:51:56', '2020-06-24 13:51:56'),
(9, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:52:01', '2020-06-24 13:52:01'),
(10, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:52:06', '2020-06-24 13:52:06'),
(11, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:52:20', '2020-06-24 13:52:20'),
(12, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:52:30', '2020-06-24 13:52:30'),
(13, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:52:43', '2020-06-24 13:52:43'),
(14, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:52:51', '2020-06-24 13:52:51'),
(15, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:52:57', '2020-06-24 13:52:57'),
(16, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:53:06', '2020-06-24 13:53:06'),
(17, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:53:14', '2020-06-24 13:53:14'),
(18, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:53:21', '2020-06-24 13:53:21'),
(19, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:53:31', '2020-06-24 13:53:31'),
(20, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:53:38', '2020-06-24 13:53:38'),
(21, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:53:47', '2020-06-24 13:53:47'),
(22, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:53:54', '2020-06-24 13:53:54'),
(23, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:54:02', '2020-06-24 13:54:02'),
(24, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:54:09', '2020-06-24 13:54:09'),
(25, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:54:17', '2020-06-24 13:54:17'),
(26, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:54:23', '2020-06-24 13:54:23'),
(27, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:54:46', '2020-06-24 13:54:46'),
(28, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:55:40', '2020-06-24 13:55:40'),
(29, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:55:48', '2020-06-24 13:55:48'),
(30, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:55:55', '2020-06-24 13:55:55'),
(31, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:56:00', '2020-06-24 13:56:00'),
(32, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:56:07', '2020-06-24 13:56:07'),
(33, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:56:24', '2020-06-24 13:56:24'),
(34, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:56:34', '2020-06-24 13:56:34'),
(35, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:56:51', '2020-06-24 13:56:51'),
(36, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:57:29', '2020-06-24 13:57:29'),
(37, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:57:39', '2020-06-24 13:57:39'),
(38, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:57:51', '2020-06-24 13:57:51'),
(39, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:57:57', '2020-06-24 13:57:57'),
(40, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:58:08', '2020-06-24 13:58:08'),
(41, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:58:19', '2020-06-24 13:58:19'),
(42, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:58:28', '2020-06-24 13:58:28'),
(43, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:58:38', '2020-06-24 13:58:38'),
(44, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:58:51', '2020-06-24 13:58:51'),
(45, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:58:59', '2020-06-24 13:58:59'),
(46, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:59:09', '2020-06-24 13:59:09'),
(47, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:59:18', '2020-06-24 13:59:18'),
(48, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:59:25', '2020-06-24 13:59:25'),
(49, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:59:34', '2020-06-24 13:59:34'),
(50, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:59:37', '2020-06-24 13:59:37'),
(51, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 13:59:41', '2020-06-24 13:59:41'),
(52, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 14:03:13', '2020-06-24 14:03:13'),
(53, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 14:04:22', '2020-06-24 14:04:22'),
(54, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 14:10:07', '2020-06-24 14:10:07'),
(55, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:40:59', '2020-06-24 15:40:59'),
(56, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:41:01', '2020-06-24 15:41:01'),
(57, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:41:05', '2020-06-24 15:41:05'),
(58, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:41:08', '2020-06-24 15:41:08'),
(59, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:41:11', '2020-06-24 15:41:11'),
(60, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:41:35', '2020-06-24 15:41:35'),
(61, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:42:03', '2020-06-24 15:42:03'),
(62, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:45:01', '2020-06-24 15:45:01'),
(63, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:45:12', '2020-06-24 15:45:12'),
(64, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:45:27', '2020-06-24 15:45:27'),
(65, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:46:03', '2020-06-24 15:46:03'),
(66, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:46:26', '2020-06-24 15:46:26'),
(67, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:46:49', '2020-06-24 15:46:49'),
(68, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:46:56', '2020-06-24 15:46:56'),
(69, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:47:48', '2020-06-24 15:47:48'),
(70, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:47:58', '2020-06-24 15:47:58'),
(71, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:48:48', '2020-06-24 15:48:48'),
(72, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:49:27', '2020-06-24 15:49:27'),
(73, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:50:08', '2020-06-24 15:50:08'),
(74, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:50:48', '2020-06-24 15:50:48'),
(75, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:50:52', '2020-06-24 15:50:52'),
(76, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:50:55', '2020-06-24 15:50:55'),
(77, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:51:44', '2020-06-24 15:51:44'),
(78, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:51:50', '2020-06-24 15:51:50'),
(79, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:52:05', '2020-06-24 15:52:05'),
(80, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:52:21', '2020-06-24 15:52:21'),
(81, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:53:22', '2020-06-24 15:53:22'),
(82, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:53:35', '2020-06-24 15:53:35'),
(83, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:53:48', '2020-06-24 15:53:48'),
(84, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:54:00', '2020-06-24 15:54:00'),
(85, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:54:20', '2020-06-24 15:54:20'),
(86, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:54:23', '2020-06-24 15:54:23'),
(87, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:54:31', '2020-06-24 15:54:31'),
(88, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:54:40', '2020-06-24 15:54:40'),
(89, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:54:47', '2020-06-24 15:54:47'),
(90, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:54:50', '2020-06-24 15:54:50'),
(91, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:54:54', '2020-06-24 15:54:54'),
(92, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:55:08', '2020-06-24 15:55:08'),
(93, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:55:18', '2020-06-24 15:55:18'),
(94, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:55:33', '2020-06-24 15:55:33'),
(95, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:55:52', '2020-06-24 15:55:52'),
(96, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:56:03', '2020-06-24 15:56:03'),
(97, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:56:17', '2020-06-24 15:56:17'),
(98, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:56:30', '2020-06-24 15:56:30'),
(99, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:56:33', '2020-06-24 15:56:33'),
(100, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:56:44', '2020-06-24 15:56:44'),
(101, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:56:58', '2020-06-24 15:56:58'),
(102, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:57:04', '2020-06-24 15:57:04'),
(103, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:57:19', '2020-06-24 15:57:19'),
(104, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:57:26', '2020-06-24 15:57:26'),
(105, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:57:40', '2020-06-24 15:57:40'),
(106, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:57:42', '2020-06-24 15:57:42'),
(107, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:57:48', '2020-06-24 15:57:48'),
(108, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:58:04', '2020-06-24 15:58:04'),
(109, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:58:15', '2020-06-24 15:58:15'),
(110, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:58:30', '2020-06-24 15:58:30'),
(111, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:58:32', '2020-06-24 15:58:32'),
(112, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:58:38', '2020-06-24 15:58:38'),
(113, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:58:51', '2020-06-24 15:58:51'),
(114, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:58:56', '2020-06-24 15:58:56'),
(115, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:59:07', '2020-06-24 15:59:07'),
(116, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:59:13', '2020-06-24 15:59:13'),
(117, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:59:29', '2020-06-24 15:59:29'),
(118, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:59:34', '2020-06-24 15:59:34'),
(119, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:59:47', '2020-06-24 15:59:47'),
(120, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:59:51', '2020-06-24 15:59:51'),
(121, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 15:59:58', '2020-06-24 15:59:58'),
(122, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:10:05', '2020-06-24 16:10:05'),
(123, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:10:07', '2020-06-24 16:10:07'),
(124, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:10:12', '2020-06-24 16:10:12'),
(125, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:10:32', '2020-06-24 16:10:32'),
(126, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:10:35', '2020-06-24 16:10:35'),
(127, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:10:38', '2020-06-24 16:10:38'),
(128, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:10:42', '2020-06-24 16:10:42'),
(129, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:10:43', '2020-06-24 16:10:43'),
(130, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:12:25', '2020-06-24 16:12:25'),
(131, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:12:29', '2020-06-24 16:12:29'),
(132, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:12:32', '2020-06-24 16:12:32'),
(133, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:12:35', '2020-06-24 16:12:35'),
(134, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:12:36', '2020-06-24 16:12:36'),
(135, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:12:56', '2020-06-24 16:12:56'),
(136, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:13:00', '2020-06-24 16:13:00'),
(137, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:13:10', '2020-06-24 16:13:10'),
(138, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:13:15', '2020-06-24 16:13:15'),
(139, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:13:28', '2020-06-24 16:13:28'),
(140, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:13:30', '2020-06-24 16:13:30'),
(141, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:13:31', '2020-06-24 16:13:31'),
(142, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:13:33', '2020-06-24 16:13:33'),
(143, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:13:34', '2020-06-24 16:13:34'),
(144, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:38:51', '2020-06-24 16:38:51'),
(145, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:38:53', '2020-06-24 16:38:53');
INSERT INTO `device_tokens` (`id`, `device_token`, `ip_address`, `browser_login`, `user_id`, `created_at`, `updated_at`) VALUES
(146, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:38:57', '2020-06-24 16:38:57'),
(147, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:39:34', '2020-06-24 16:39:34'),
(148, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:39:36', '2020-06-24 16:39:36'),
(149, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:39:47', '2020-06-24 16:39:47'),
(150, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:39:58', '2020-06-24 16:39:58'),
(151, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:40:10', '2020-06-24 16:40:10'),
(152, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:40:24', '2020-06-24 16:40:24'),
(153, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:41:02', '2020-06-24 16:41:02'),
(154, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:42:37', '2020-06-24 16:42:37'),
(155, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-24 16:47:45', '2020-06-24 16:47:45'),
(156, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:30:54', '2020-06-25 02:30:54'),
(157, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:33:06', '2020-06-25 02:33:06'),
(158, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:33:16', '2020-06-25 02:33:16'),
(159, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:28', '2020-06-25 02:35:28'),
(160, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:29', '2020-06-25 02:35:29'),
(161, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:32', '2020-06-25 02:35:32'),
(162, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:33', '2020-06-25 02:35:33'),
(163, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:35', '2020-06-25 02:35:35'),
(164, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:37', '2020-06-25 02:35:37'),
(165, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:39', '2020-06-25 02:35:39'),
(166, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:41', '2020-06-25 02:35:41'),
(167, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:43', '2020-06-25 02:35:43'),
(168, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:35:45', '2020-06-25 02:35:45'),
(169, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:42:58', '2020-06-25 02:42:58'),
(170, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:05', '2020-06-25 02:43:05'),
(171, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:12', '2020-06-25 02:43:12'),
(172, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:14', '2020-06-25 02:43:14'),
(173, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:16', '2020-06-25 02:43:16'),
(174, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:18', '2020-06-25 02:43:18'),
(175, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:25', '2020-06-25 02:43:25'),
(176, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:27', '2020-06-25 02:43:27'),
(177, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:29', '2020-06-25 02:43:29'),
(178, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:31', '2020-06-25 02:43:31'),
(179, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:33', '2020-06-25 02:43:33'),
(180, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:43:35', '2020-06-25 02:43:35'),
(181, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:48:25', '2020-06-25 02:48:25'),
(182, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:49:25', '2020-06-25 02:49:25'),
(183, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:49:48', '2020-06-25 02:49:48'),
(184, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:49:51', '2020-06-25 02:49:51'),
(185, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:52:33', '2020-06-25 02:52:33'),
(186, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 02:52:45', '2020-06-25 02:52:45'),
(187, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 04:14:50', '2020-06-25 04:14:50'),
(188, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 04:14:52', '2020-06-25 04:14:52'),
(189, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 04:16:19', '2020-06-25 04:16:19'),
(190, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 04:16:24', '2020-06-25 04:16:24'),
(191, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 04:16:27', '2020-06-25 04:16:27'),
(192, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.23.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-25 04:17:41', '2020-06-25 04:17:41'),
(193, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.22.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-06 14:06:43', '2020-07-06 14:06:43'),
(194, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.22.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-06 14:06:44', '2020-07-06 14:06:44'),
(195, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.22.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-06 14:06:50', '2020-07-06 14:06:50'),
(196, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.22.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-06 16:12:01', '2020-07-06 16:12:01'),
(197, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.22.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-06 16:12:03', '2020-07-06 16:12:03'),
(198, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.22.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-06 16:15:12', '2020-07-06 16:15:12'),
(199, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.22.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-06 16:15:44', '2020-07-06 16:15:44'),
(200, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:19:45', '2020-07-08 13:19:45'),
(201, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:20:37', '2020-07-08 13:20:37'),
(202, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:20:42', '2020-07-08 13:20:42'),
(203, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:38:31', '2020-07-08 13:38:31'),
(204, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:38:52', '2020-07-08 13:38:52'),
(205, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:39:06', '2020-07-08 13:39:06'),
(206, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:39:15', '2020-07-08 13:39:15'),
(207, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:47:30', '2020-07-08 13:47:30'),
(208, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:48:24', '2020-07-08 13:48:24'),
(209, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:49:42', '2020-07-08 13:49:42'),
(210, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:51:46', '2020-07-08 13:51:46'),
(211, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:54:24', '2020-07-08 13:54:24'),
(212, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:54:29', '2020-07-08 13:54:29'),
(213, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:54:37', '2020-07-08 13:54:37'),
(214, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:55:04', '2020-07-08 13:55:04'),
(215, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:55:53', '2020-07-08 13:55:53'),
(216, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:55:57', '2020-07-08 13:55:57'),
(217, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:56:33', '2020-07-08 13:56:33'),
(218, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:56:40', '2020-07-08 13:56:40'),
(219, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:56:44', '2020-07-08 13:56:44'),
(220, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:56:47', '2020-07-08 13:56:47'),
(221, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:57:03', '2020-07-08 13:57:03'),
(222, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:57:13', '2020-07-08 13:57:13'),
(223, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:57:56', '2020-07-08 13:57:56'),
(224, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 13:58:41', '2020-07-08 13:58:41'),
(225, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:03:10', '2020-07-08 14:03:10'),
(226, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:03:21', '2020-07-08 14:03:21'),
(227, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:03:30', '2020-07-08 14:03:30'),
(228, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:03:46', '2020-07-08 14:03:46'),
(229, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:04:15', '2020-07-08 14:04:15'),
(230, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:04:21', '2020-07-08 14:04:21'),
(231, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:04:27', '2020-07-08 14:04:27'),
(232, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:04:35', '2020-07-08 14:04:35'),
(233, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:14:40', '2020-07-08 14:14:40'),
(234, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:15:00', '2020-07-08 14:15:00'),
(235, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:15:27', '2020-07-08 14:15:27'),
(236, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:16:51', '2020-07-08 14:16:51'),
(237, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:21:13', '2020-07-08 14:21:13'),
(238, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:21:25', '2020-07-08 14:21:25'),
(239, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:22:07', '2020-07-08 14:22:07'),
(240, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:22:53', '2020-07-08 14:22:53'),
(241, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:42:40', '2020-07-08 14:42:40'),
(242, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:42:43', '2020-07-08 14:42:43'),
(243, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:42:45', '2020-07-08 14:42:45'),
(244, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:44:53', '2020-07-08 14:44:53'),
(245, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:45:39', '2020-07-08 14:45:39'),
(246, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:47:03', '2020-07-08 14:47:03'),
(247, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:47:39', '2020-07-08 14:47:39'),
(248, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:49:59', '2020-07-08 14:49:59'),
(249, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:50:29', '2020-07-08 14:50:29'),
(250, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:51:00', '2020-07-08 14:51:00'),
(251, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:52:17', '2020-07-08 14:52:17'),
(252, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 14:56:42', '2020-07-08 14:56:42'),
(253, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:36:52', '2020-07-08 15:36:52'),
(254, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:36:55', '2020-07-08 15:36:55'),
(255, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:36:59', '2020-07-08 15:36:59'),
(256, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:39:54', '2020-07-08 15:39:54'),
(257, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:42:55', '2020-07-08 15:42:55'),
(258, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:43:45', '2020-07-08 15:43:45'),
(259, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:45:22', '2020-07-08 15:45:22'),
(260, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:47:13', '2020-07-08 15:47:13'),
(261, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 15:58:52', '2020-07-08 15:58:52'),
(262, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 16:00:08', '2020-07-08 16:00:08'),
(263, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-08 16:01:36', '2020-07-08 16:01:36'),
(264, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:03:01', '2020-07-09 13:03:01'),
(265, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:03:06', '2020-07-09 13:03:06'),
(266, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:03:13', '2020-07-09 13:03:13'),
(267, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:05:30', '2020-07-09 13:05:30'),
(268, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:05:32', '2020-07-09 13:05:32'),
(269, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:05:34', '2020-07-09 13:05:34'),
(270, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:05:42', '2020-07-09 13:05:42'),
(271, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:17:55', '2020-07-09 13:17:55'),
(272, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:17:58', '2020-07-09 13:17:58'),
(273, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:18:04', '2020-07-09 13:18:04'),
(274, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:18:24', '2020-07-09 13:18:24'),
(275, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:18:27', '2020-07-09 13:18:27'),
(276, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:20:47', '2020-07-09 13:20:47'),
(277, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:22:53', '2020-07-09 13:22:53'),
(278, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:22:55', '2020-07-09 13:22:55'),
(279, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:23:25', '2020-07-09 13:23:25'),
(280, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:23:30', '2020-07-09 13:23:30'),
(281, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:24:25', '2020-07-09 13:24:25'),
(282, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:29:39', '2020-07-09 13:29:39'),
(283, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:30:13', '2020-07-09 13:30:13'),
(284, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:30:39', '2020-07-09 13:30:39'),
(285, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:31:19', '2020-07-09 13:31:19'),
(286, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:46:25', '2020-07-09 13:46:25'),
(287, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:46:43', '2020-07-09 13:46:43'),
(288, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:48:05', '2020-07-09 13:48:05'),
(289, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:50:55', '2020-07-09 13:50:55'),
(290, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:53:43', '2020-07-09 13:53:43');
INSERT INTO `device_tokens` (`id`, `device_token`, `ip_address`, `browser_login`, `user_id`, `created_at`, `updated_at`) VALUES
(291, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 13:54:21', '2020-07-09 13:54:21'),
(292, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 14:08:47', '2020-07-09 14:08:47'),
(293, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 14:11:13', '2020-07-09 14:11:13'),
(294, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 14:11:19', '2020-07-09 14:11:19'),
(295, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 14:11:23', '2020-07-09 14:11:23'),
(296, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 14:11:25', '2020-07-09 14:11:25'),
(297, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 14:13:52', '2020-07-09 14:13:52'),
(298, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 14:14:51', '2020-07-09 14:14:51'),
(299, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 15:18:47', '2020-07-09 15:18:47'),
(300, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 15:18:55', '2020-07-09 15:18:55'),
(301, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 15:19:04', '2020-07-09 15:19:04'),
(302, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 15:21:06', '2020-07-09 15:21:06'),
(303, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 15:21:36', '2020-07-09 15:21:36'),
(304, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 15:26:26', '2020-07-09 15:26:26'),
(305, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 15:27:26', '2020-07-09 15:27:26'),
(306, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 15:28:48', '2020-07-09 15:28:48'),
(307, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:03:39', '2020-07-09 16:03:39'),
(308, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:05:19', '2020-07-09 16:05:19'),
(309, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:05:22', '2020-07-09 16:05:22'),
(310, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:07:15', '2020-07-09 16:07:15'),
(311, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:07:26', '2020-07-09 16:07:26'),
(312, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:08:11', '2020-07-09 16:08:11'),
(313, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:08:47', '2020-07-09 16:08:47'),
(314, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:11:47', '2020-07-09 16:11:47'),
(315, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-07-09 16:11:49', '2020-07-09 16:11:49');

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
  `supplier_id` bigint UNSIGNED NOT NULL,
  `input_date` datetime NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_price` bigint NOT NULL DEFAULT '0',
  `total_quantity` bigint NOT NULL DEFAULT '0',
  `discount` bigint NOT NULL DEFAULT '0',
  `total_money` bigint NOT NULL DEFAULT '0',
  `pair_pay` bigint NOT NULL DEFAULT '0',
  `lack` bigint NOT NULL DEFAULT '0',
  `import_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `inputs`
--

INSERT INTO `inputs` (`id`, `input_code`, `supplier_id`, `input_date`, `notes`, `total_price`, `total_quantity`, `discount`, `total_money`, `pair_pay`, `lack`, `import_detail`, `user_practise`, `input_status`, `created_at`, `updated_at`) VALUES
(1, 'PNK-9393810438', 1, '2020-01-03 00:00:00', 'aaa', 35000000, 0, 0, 35000000, 50000000, 15000000, '[{\"id\":\"1\",\"product_code\":\"SP-2956541911\",\"product_name\":\"S\\u1ea3n ph\\u1ea9m 01\",\"product_amount\":\"100\",\"product_origin_price\":\"230000\",\"product_sell_price\":\"250000\",\"product_manufacture_id\":\"1\",\"product_group_id\":\"1\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/0bf5122cc5c3672d0ed2f85f5f82a61f.jpeg\",\"product_description\":\"<p>S\\u1ea3n ph\\u1ea9m 01<\\/p>\",\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-06-24 15:48:46\",\"updated_at\":\"2020-06-24 15:48:46\",\"deleted_at\":null,\"product_sell_amount\":\"50\"},{\"id\":\"3\",\"product_code\":\"SP-7689770689\",\"product_name\":\"S\\u1ea3n ph\\u1ea9m 03\",\"product_amount\":\"23\",\"product_origin_price\":\"150000\",\"product_sell_price\":\"250000\",\"product_manufacture_id\":\"10\",\"product_group_id\":\"3\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/56451192_6117953237866_4080207545241698304_n.jpg\",\"product_description\":\"<p>S\\u1ea3n ph\\u1ea9m 03<\\/p>\",\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-06-24 15:50:07\",\"updated_at\":\"2020-06-24 15:50:07\",\"deleted_at\":null,\"product_sell_amount\":\"50\"},{\"id\":\"4\",\"product_code\":\"SP-3014426661\",\"product_name\":\"S\\u1ea3n ph\\u1ea9m 04\",\"product_amount\":\"100\",\"product_origin_price\":\"100000\",\"product_sell_price\":\"200000\",\"product_manufacture_id\":\"5\",\"product_group_id\":\"5\",\"product_image_url\":\"http:\\/\\/localhost\\/storage\\/photos\\/1\\/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg\",\"product_description\":\"<p>S\\u1ea3n ph\\u1ea9m 05<\\/p>\",\"product_status\":\"1\",\"user_practise\":\"system admin\",\"created_at\":\"2020-06-24 15:50:48\",\"updated_at\":\"2020-06-24 15:50:48\",\"deleted_at\":null,\"product_sell_amount\":\"50\"}]', 'system admin', 1, '2020-07-08 16:02:31', '2020-07-08 16:02:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, 'Nhà sản xuất 17', 'nha-san-xuat-17', NULL, 'system admin', 1, '2020-06-24 13:59:08', '2020-06-24 13:59:08'),
(19, 'Nhà sản xuất 18', 'nha-san-xuat-18', NULL, 'system admin', 1, '2020-06-24 13:59:17', '2020-06-24 13:59:17'),
(20, 'Nhà sản xuất 19', 'nha-san-xuat-19', NULL, 'system admin', 1, '2020-06-24 13:59:25', '2020-06-24 13:59:25'),
(21, 'Nhà sản xuất 20', 'nha-san-xuat-20', NULL, 'system admin', 1, '2020-06-24 13:59:34', '2020-06-24 13:59:34');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_02_04_000000_create_users_table', 1),
(4, '2020_04_04_193354_create_product_groups_table', 1),
(5, '2020_04_04_193423_create_manufactures_table', 1),
(6, '2020_04_04_193443_create_products_table', 1),
(7, '2020_04_04_193458_create_suppliers_table', 1),
(9, '2020_04_04_193530_create_inventories_table', 1),
(10, '2020_04_21_145845_create_customers_table', 1),
(11, '2020_05_14_230220_create_jobs_table', 1),
(12, '2020_05_20_095432_create_device_tokens_table', 1),
(14, '2020_04_04_193521_create_orders_table', 2),
(15, '2020_06_22_145741_create_inputs_table', 3),
(16, '2020_07_09_134516_create_purchase_orders_table', 4);

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
  `product_amount` int NOT NULL,
  `product_origin_price` int NOT NULL,
  `product_sell_price` int NOT NULL,
  `product_manufacture_id` bigint UNSIGNED NOT NULL,
  `product_group_id` bigint UNSIGNED NOT NULL,
  `product_image_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `product_status` tinyint NOT NULL,
  `user_practise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_amount`, `product_origin_price`, `product_sell_price`, `product_manufacture_id`, `product_group_id`, `product_image_url`, `product_description`, `product_status`, `user_practise`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SP-2956541911', 'Sản phẩm 01', 100, 230000, 250000, 1, 1, 'http://localhost/storage/photos/1/0bf5122cc5c3672d0ed2f85f5f82a61f.jpeg', '<p>Sản phẩm 01</p>', 1, 'system admin', '2020-06-24 15:48:46', '2020-06-24 15:48:46', NULL),
(2, 'SP-6629570224', 'Sản phẩm 02', 34, 100000, 150000, 1, 1, 'http://localhost/storage/photos/1/35964_1_1.jpg', '<p>Sản phẩm 02</p>', 1, 'system admin', '2020-06-24 15:49:26', '2020-06-24 15:49:26', NULL),
(3, 'SP-7689770689', 'Sản phẩm 03', 23, 150000, 250000, 10, 3, 'http://localhost/storage/photos/1/56451192_6117953237866_4080207545241698304_n.jpg', '<p>Sản phẩm 03</p>', 1, 'system admin', '2020-06-24 15:50:07', '2020-06-24 15:50:07', NULL),
(4, 'SP-3014426661', 'Sản phẩm 04', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/Qim-Thi-t-K-C-a-Ri-ng-B-n-Logo-Th-ng-Hi-u-H.jpg_q50.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:50:48', '2020-06-24 15:50:48', NULL),
(5, 'SP-3014426665', 'Sản phẩm 05', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/UqKwfM_simg_d0daf0_800x1200_max.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:51:42', '2020-06-24 15:51:42', NULL),
(6, 'SP-3014426668', 'Sản phẩm 06', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/UqKwfM_simg_d0daf0_800x1200_max.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:52:04', '2020-06-24 15:52:04', NULL),
(7, 'SP-3014426669', 'Sản phẩm 07', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/UqKwfM_simg_d0daf0_800x1200_max.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:52:20', '2020-06-24 15:52:20', NULL),
(12, 'SP-3014426356', 'Sản phẩm 08', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/UqKwfM_simg_d0daf0_800x1200_max.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:53:21', '2020-06-24 15:53:21', NULL),
(13, 'SP-3014426667', 'Sản phẩm 10', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/UqKwfM_simg_d0daf0_800x1200_max.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:53:34', '2020-06-24 15:53:34', NULL),
(14, 'SP-30144266633', 'Sản phẩm 11', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/UqKwfM_simg_d0daf0_800x1200_max.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:53:46', '2020-06-24 15:53:46', NULL),
(15, 'SP-3014426656', 'Sản phẩm 12', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/thoi-trang-tre-em-hot.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:53:58', '2020-06-24 15:59:45', NULL),
(17, 'SP-3014426650', 'Sản phẩm 13', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/thoi-trang-tre-em-d.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:54:19', '2020-06-24 15:59:28', NULL),
(18, 'SP-3014426652', 'Sản phẩm 14', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/quan-ong-rong-vai-voan-6.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:55:06', '2020-06-24 15:59:06', NULL),
(19, 'SP-3014426657', 'Sản phẩm 15', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/quan-ong-rong-vai-voan-4.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:55:17', '2020-06-24 15:58:50', NULL),
(20, 'SP-3014426651', 'Sản phẩm 16', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/quan-ao-tre-em-loai-nao-dep.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:55:31', '2020-06-24 15:58:29', NULL),
(22, 'SP-3014426659', 'Sản phẩm 17', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/pngtree-summer-womens-clothing-cartoon-short-t-shirt-black-top-navel-dress-png-image_3942873.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:55:49', '2020-06-24 15:58:03', NULL),
(23, 'SP-3014426605', 'Sản phẩm 18', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/nhung-bo-quan-ao-mua-he-dep-nhat-05.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:56:02', '2020-06-24 15:57:39', NULL),
(24, 'SP-3014426604', 'Sản phẩm 19', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/image019260.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:56:15', '2020-06-24 15:57:17', NULL),
(25, 'SP-3014426653', 'Sản phẩm 20', 100, 100000, 200000, 5, 5, 'http://localhost/storage/photos/1/hoa-has-store-121214.jpg', '<p>Sản phẩm 05</p>', 1, 'system admin', '2020-06-24 15:56:29', '2020-06-24 15:56:57', NULL);

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
(2, 'Danh mục 2', 'danh-muc-2', NULL, 0, 'system admin', 1, '2020-06-24 13:51:55', '2020-06-24 13:51:55'),
(3, 'Danh mục 3', 'danh-muc-3', NULL, 0, 'system admin', 1, '2020-06-24 13:52:00', '2020-06-24 13:52:00'),
(4, 'Danh mục 4', 'danh-muc-4', NULL, 0, 'system admin', 1, '2020-06-24 13:52:05', '2020-06-24 13:52:05'),
(5, 'Danh mục 5', 'danh-muc-5', NULL, 0, 'system admin', 1, '2020-06-24 13:52:19', '2020-06-24 13:52:19'),
(6, 'Danh mục 6', 'danh-muc-6', NULL, 0, 'system admin', 1, '2020-06-24 13:52:28', '2020-06-24 13:52:28'),
(7, 'Danh mục 7', 'danh-muc-7', NULL, 0, 'system admin', 1, '2020-06-24 13:52:43', '2020-06-24 13:52:43'),
(8, 'Danh mục 8', 'danh-muc-8', NULL, 0, 'system admin', 1, '2020-06-24 13:52:50', '2020-06-24 13:52:50'),
(9, 'Danh mục 9', 'danh-muc-9', NULL, 0, 'system admin', 1, '2020-06-24 13:52:56', '2020-06-24 13:52:56'),
(10, 'Danh mục 10', 'danh-muc-10', NULL, 0, 'system admin', 1, '2020-06-24 13:53:03', '2020-06-24 13:53:03'),
(11, 'Danh mục 11', 'danh-muc-11', NULL, 0, 'system admin', 1, '2020-06-24 13:53:12', '2020-06-24 13:53:12'),
(12, 'Danh mục 12', 'danh-muc-12', NULL, 0, 'system admin', 1, '2020-06-24 13:53:20', '2020-06-24 13:53:20'),
(13, 'Danh mục 13', 'danh-muc-13', NULL, 0, 'system admin', 1, '2020-06-24 13:53:29', '2020-06-24 13:53:29'),
(14, 'Danh mục 14', 'danh-muc-14', NULL, 0, 'system admin', 1, '2020-06-24 13:53:37', '2020-06-24 13:53:37'),
(15, 'Danh mục 15', 'danh-muc-15', NULL, 0, 'system admin', 1, '2020-06-24 13:53:45', '2020-06-24 13:53:45'),
(16, 'Danh mục 16', 'danh-muc-16', NULL, 0, 'system admin', 1, '2020-06-24 13:53:53', '2020-06-24 13:53:53'),
(17, 'Danh mục 17', 'danh-muc-17', NULL, 0, 'system admin', 1, '2020-06-24 13:54:01', '2020-06-24 13:54:01'),
(18, 'Danh mục 18', 'danh-muc-18', NULL, 0, 'system admin', 1, '2020-06-24 13:54:08', '2020-06-24 13:54:08'),
(19, 'Danh mục 19', 'danh-muc-19', NULL, 0, 'system admin', 1, '2020-06-24 13:54:16', '2020-06-24 13:54:16'),
(20, 'Danh mục 20', 'danh-muc-20', NULL, 0, 'system admin', 1, '2020-06-24 13:54:22', '2020-06-24 13:54:22');

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
(1, 'PYC-8437404046', 1, '2020-01-03 00:00:00', 'aaa', 580000, 0, 'null', 'system admin', 0, '2020-07-09 15:29:17', '2020-07-09 15:29:17');

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
(3, NULL, NULL, 3, 'NV-857950', 'Nguyễn Văn Hiệp', NULL, NULL, NULL, NULL, NULL, 'nguyentranhiep96@gmail.com', NULL, '$2y$10$98sfa5p9eP6o4tKxerUAAeLkH/xQERXtEiOQiTMVljIkqHL4U4TOq', 0, 'system admin', NULL, '2020-06-24 15:46:02', '2020-06-24 15:46:02'),
(4, NULL, NULL, 2, 'NV-101730', 'Lý Nguyễn Hoàng', NULL, NULL, NULL, NULL, NULL, 'hoang@gmail.com', NULL, '$2y$10$8ZgH1eLzT8N1/1htJvMGUeWG2K.yQQWjAzqoAcu8sF6J4nvV.8XBO', 0, 'system admin', NULL, '2020-06-24 15:46:26', '2020-06-24 15:46:26'),
(5, NULL, NULL, 1, 'NV-574648', 'Nguyễn Văn Thành', NULL, NULL, NULL, NULL, NULL, 'thanh@gmail.com', NULL, '$2y$10$B2/paS06O4ZUxI656HSqnOhgRt5HjNno3PE2UEg93j27C4UpoAS9u', 0, 'system admin', NULL, '2020-06-24 15:46:49', '2020-06-24 15:46:49');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `device_tokens`
--
ALTER TABLE `device_tokens`
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
  ADD KEY `products_product_origin_price_index` (`product_origin_price`),
  ADD KEY `products_product_sell_price_index` (`product_sell_price`);

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
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
