-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2024 lúc 10:42 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsv_tms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_students`
--

CREATE TABLE `table_students` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` datetime NOT NULL,
  `gender` int(11) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `table_students`
--

INSERT INTO `table_students` (`id`, `fullname`, `dob`, `gender`, `hometown`, `level`, `group_id`) VALUES
(4, 'Nguyễn Văn Lợi', '2024-12-02 00:00:00', 1, 'Hà Nội 29C', 0, 9),
(5, 'Nguyễn Viết Khôi', '2024-12-03 00:00:00', 1, 'Hà Nội 29B', 0, 9),
(6, 'Nguyễn Hữu Huy', '2024-12-04 00:00:00', 1, 'Hà Nội 29B', 0, 9),
(7, 'Nguyễn Ngọc Phước', '2024-12-05 00:00:00', 1, 'Nam Định 18B', 0, 9),
(9, 'Giáp Ngọc Duy Anh', '2024-12-07 00:00:00', 1, 'Hà Nội 29B', 0, 9);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_students`
--
ALTER TABLE `table_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `table_students`
--
ALTER TABLE `table_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
