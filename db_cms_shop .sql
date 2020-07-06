-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: mysql
-- Thời gian đã tạo: Th6 20, 2020 lúc 01:42 AM
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
(1, 'Nguyễn Văn Hiệp', 'KH001', 'nguyentranhiep96@gmail.com', '0985940019', 'Ngõ 1 - Phạm Văn Đồng - Hà Nội', '2020-01-30', 1, 'System Admin', NULL, '2020-06-19 15:14:32', '2020-06-19 15:14:32');

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
(1, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:02:08', '2020-06-19 13:02:08'),
(2, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:02:15', '2020-06-19 13:02:15'),
(3, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:02:17', '2020-06-19 13:02:17'),
(4, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:03:04', '2020-06-19 13:03:04'),
(5, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:03:08', '2020-06-19 13:03:08'),
(6, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:03:41', '2020-06-19 13:03:41'),
(7, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:04:06', '2020-06-19 13:04:06'),
(8, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:04:08', '2020-06-19 13:04:08'),
(9, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:04:21', '2020-06-19 13:04:21'),
(10, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:04:30', '2020-06-19 13:04:30'),
(11, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:04:43', '2020-06-19 13:04:43'),
(12, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:04:53', '2020-06-19 13:04:53'),
(13, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:05:01', '2020-06-19 13:05:01'),
(14, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:05:11', '2020-06-19 13:05:11'),
(15, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:12:16', '2020-06-19 13:12:16'),
(16, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:12:18', '2020-06-19 13:12:18'),
(17, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:14:28', '2020-06-19 13:14:28'),
(18, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:15:47', '2020-06-19 13:15:47'),
(19, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:17:23', '2020-06-19 13:17:23'),
(20, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:17:42', '2020-06-19 13:17:42'),
(21, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:18:15', '2020-06-19 13:18:15'),
(22, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:23:28', '2020-06-19 13:23:28'),
(23, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:24:12', '2020-06-19 13:24:12'),
(24, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:24:18', '2020-06-19 13:24:18'),
(25, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:25:59', '2020-06-19 13:25:59'),
(26, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:26:02', '2020-06-19 13:26:02'),
(27, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:26:31', '2020-06-19 13:26:31'),
(28, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:26:41', '2020-06-19 13:26:41'),
(29, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:27:04', '2020-06-19 13:27:04'),
(30, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:28:25', '2020-06-19 13:28:25'),
(31, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:28:28', '2020-06-19 13:28:28'),
(32, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:28:32', '2020-06-19 13:28:32'),
(33, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:28:59', '2020-06-19 13:28:59'),
(34, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:29:31', '2020-06-19 13:29:31'),
(35, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:29:43', '2020-06-19 13:29:43'),
(36, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 13:29:48', '2020-06-19 13:29:48'),
(37, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:57:17', '2020-06-19 14:57:17'),
(38, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:57:19', '2020-06-19 14:57:19'),
(39, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:57:23', '2020-06-19 14:57:23'),
(40, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:57:39', '2020-06-19 14:57:39'),
(41, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:57:45', '2020-06-19 14:57:45'),
(42, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:57:57', '2020-06-19 14:57:57'),
(43, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:58:06', '2020-06-19 14:58:06'),
(44, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:58:10', '2020-06-19 14:58:10'),
(45, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:58:15', '2020-06-19 14:58:15'),
(46, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 14:58:28', '2020-06-19 14:58:28'),
(47, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:26:14', '2020-06-19 15:26:14'),
(48, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:26:23', '2020-06-19 15:26:23'),
(49, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:26:27', '2020-06-19 15:26:27'),
(50, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:26:32', '2020-06-19 15:26:32'),
(51, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:26:33', '2020-06-19 15:26:33'),
(52, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:26:35', '2020-06-19 15:26:35'),
(53, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:27:10', '2020-06-19 15:27:10'),
(54, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:27:15', '2020-06-19 15:27:15'),
(55, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:27:23', '2020-06-19 15:27:23'),
(56, 'cS__-KjkiwF5eYzl3T-ZDV:APA91bFXtktXUxq-ZdM-QbMAUq4BWyFu3b-Uy_TLUYNesL57hgtU7HZOd1FQWPHP0ALZFWHZzu0puLr4d5JzhAv7MvOSB269xE_V6EpLZ8f7gT2ijE0o6zs1Ylc4qhPSXqlAaUNNueQw', '172.19.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1, '2020-06-19 15:28:58', '2020-06-19 15:28:58');

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
(1, 'Gucci Việt Nam', 'gucci-viet-nam', NULL, 'System Admin', 1, '2020-06-19 13:03:01', '2020-06-19 13:03:01'),
(2, 'Off White Việt Nam', 'off-white-viet-nam', NULL, 'System Admin', 1, '2020-06-19 13:03:39', '2020-06-19 13:03:39'),
(3, 'Nhà may quân đội', 'nha-may-quan-doi', NULL, 'System Admin', 1, '2020-06-19 13:04:05', '2020-06-19 13:04:05');

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
(8, '2020_04_04_193521_create_orders_table', 1),
(9, '2020_04_04_193530_create_inventories_table', 1),
(10, '2020_04_04_211010_create_product_store_table', 1),
(11, '2020_04_21_145845_create_customers_table', 1),
(12, '2020_05_14_230220_create_jobs_table', 1),
(13, '2020_05_20_095432_create_device_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'SP0001', 'Váy bộ Tship s30 thun đẹp nhất', 100, 230000, 230000, 1, 1, 'http://localhost/storage/photos/1/gai-xinh-khoe-vong-1-bikini-hinh-1.jpg', '<p>aaa</p>', 1, 'System Admin', '2020-06-19 13:24:11', '2020-06-19 14:58:26', NULL),
(2, 'SP0002', 'Váy bộ Tship s30 thun đẹp nhất ok bạn êi', 100, 230000, 250000, 1, 1, 'http://localhost/storage/photos/1/gai-xinh-khoe-vong-1-bikini-hinh-1.jpg', '<p>aaa</p>', 1, 'System Admin', '2020-06-19 13:28:57', '2020-06-19 13:28:57', NULL),
(3, 'SP0003', 'Váy bộ Tship s40 thun đẹp nhất', 100, 150000, 240000, 1, 1, 'http://localhost/storage/photos/1/gai-xinh-khoe-vong-1-bikini-hinh-1.jpg', '<p>aaa</p>', 1, 'System Admin', '2020-06-19 13:29:30', '2020-06-19 14:57:56', NULL);

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
(1, 'Áo nam', 'ao-nam', NULL, 0, 'System Admin', 1, '2020-06-19 13:04:19', '2020-06-19 13:04:19'),
(2, 'Áo sơ mi', 'ao-so-mi', NULL, 1, 'System Admin', 1, '2020-06-19 13:04:29', '2020-06-19 13:04:29'),
(3, 'Áo cộc tay', 'ao-coc-tay', NULL, 1, 'System Admin', 1, '2020-06-19 13:04:42', '2020-06-19 13:04:42'),
(4, 'Quần nam', 'quan-nam', NULL, 0, 'System Admin', 1, '2020-06-19 13:04:51', '2020-06-19 13:04:51'),
(5, 'Quần âu', 'quan-au', NULL, 4, 'System Admin', 1, '2020-06-19 13:05:00', '2020-06-19 13:05:00'),
(6, 'Quần kaki', 'quan-kaki', NULL, 4, 'System Admin', 1, '2020-06-19 13:05:09', '2020-06-19 13:05:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_stores`
--

CREATE TABLE `product_stores` (
  `product_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int NOT NULL DEFAULT '1',
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

INSERT INTO `users` (`id`, `avatar`, `fullname`, `level`, `name`, `phone`, `address`, `gender`, `birthday`, `info`, `email`, `email_verified_at`, `password`, `status`, `user_practise`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 0, 'System Admin', NULL, NULL, NULL, NULL, NULL, 'admin@admin.com', NULL, '$2y$10$qvKvvCGC8o3gRGGjginZru8BWyuqfyBj.blvlaXDUoh2xL7FMTiqO', 1, 'System admin', NULL, '2020-06-19 12:56:21', '2020-06-19 12:56:21');

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
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_name_index` (`name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
