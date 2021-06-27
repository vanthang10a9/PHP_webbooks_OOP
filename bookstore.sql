-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2021 lúc 07:20 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `isbn` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `author` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` text COLLATE utf8_unicode_ci NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`isbn`, `author`, `title`, `category`, `images`, `price`) VALUES
('0-672-31697-8', 'Michael Morgan', 'Java 2 for Professional Developers', '', '', 34.99),
('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 'novel', '', 24.99);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_reviews`
--

CREATE TABLE `book_reviews` (
  `isbn` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_reviews`
--

INSERT INTO `book_reviews` (`isbn`, `review`) VALUES
('0-672-31697-8', 'Đẹp là như cầu của mỗi người trong chúng ta ngày nay. Tôi tin là như vậy. Và một người phụ nữ vừa thông minh, hiểu biết và yêu bản thân mình thì càng được...'),
('0-672-31745-1', 'Bạn đã thực sự hiểu về “Sống chậm”? Khái niệm “Sống Chậm” hay sống đơn giản hẳn bạn cũng từng nghe, nhưng thực sự hiểu về nó thì chưa chắc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customerid`, `Name`, `Address`, `City`) VALUES
(1, 'Julie Smith', '25 Oak Street', 'Airport West'),
(2, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
(3, 'Michelle Arthur', '357 North Road', 'Yarraville');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `isbn` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`orderid`, `isbn`, `quantity`) VALUES
(0, '0-672-31697-8', 3),
(0, '0-672-31745-1', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Chỉ mục cho bảng `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD PRIMARY KEY (`isbn`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`isbn`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `isbn_book_reviews` FOREIGN KEY (`isbn`) REFERENCES `book_reviews` (`isbn`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `isbn_books_order` FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
