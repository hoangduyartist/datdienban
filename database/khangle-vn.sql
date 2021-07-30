-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2020 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `khangle-vn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yeu_cau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `tien` int(11) NOT NULL,
  `congty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanh_toan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `ten`, `diachi`, `tel`, `email`, `yeu_cau`, `noi_dung`, `time`, `status`, `tien`, `congty`, `ma`, `cat`, `thanh_toan`) VALUES
(1, 'Tran', 'Da anang', '0968888888', 'email@gmail.com', 'asdasdasd', '<table><tr><th style=\"padding:10px;border: 1px solid #ccc\">TÃªn</th><th style=\"padding:10px;border: 1px solid #ccc\">GiÃ¡</th><th style=\"padding:10px;border: 1px solid #ccc\">Sá»‘ lÆ°á»£ng</th><th style=\"padding:10px;border: 1px solid #ccc\">Tá»•ng cá»™ng</th></tr><tr><td style=\"padding:10px;border: 1px solid #ccc\"><div><p style=\"text-transform: uppercase;display: block;margin-bottom: 10px;\">Demo Fashion</p></div></td><td style=\"padding:10px;border: 1px solid #ccc\">Call</td><td style=\"padding:10px;border: 1px solid #ccc\">1</td><td style=\"padding:10px;border: 1px solid #ccc\"></td></tr><tr><td style=\"padding:10px;border: 1px solid #ccc\"><div><p style=\"text-transform: uppercase;display: block;margin-bottom: 10px;\">Demo Fashion</p></div></td><td style=\"padding:10px;border: 1px solid #ccc\">98 <sup>Ä‘/sp</sup></td><td style=\"padding:10px;border: 1px solid #ccc\">1</td><td style=\"padding:10px;border: 1px solid #ccc\">98 <sup>Ä‘</sup></td></tr><tr><td colspan=\"3\" style=\"padding:10px;border: 1px solid #ccc\"><b>Tá»•ng cá»™ng </b><br /></td><td style=\"padding:10px;border: 1px solid #ccc\"><b style=\"font-weight: bold; font-size: 15px; color: #ff0000;\">98 <sup>Ä‘</sup></b></td></tr></table>', 1589302572, 1, 98, '', '', '', 2),
(2, 'Tran', 'asdasdasdas', '0968888888', 'email@gmail.com', 'asdasdasdasdasd', '<table><tr><th style=\"padding:10px;border: 1px solid #ccc\">TÃªn</th><th style=\"padding:10px;border: 1px solid #ccc\">GiÃ¡</th><th style=\"padding:10px;border: 1px solid #ccc\">Sá»‘ lÆ°á»£ng</th><th style=\"padding:10px;border: 1px solid #ccc\">Tá»•ng cá»™ng</th></tr><tr><td style=\"padding:10px;border: 1px solid #ccc\"><div><p style=\"text-transform: uppercase;display: block;margin-bottom: 10px;\">Demo Fashion</p></div></td><td style=\"padding:10px;border: 1px solid #ccc\">Call</td><td style=\"padding:10px;border: 1px solid #ccc\">1</td><td style=\"padding:10px;border: 1px solid #ccc\"></td></tr><tr><td style=\"padding:10px;border: 1px solid #ccc\"><div><p style=\"text-transform: uppercase;display: block;margin-bottom: 10px;\">Demo Fashion</p></div></td><td style=\"padding:10px;border: 1px solid #ccc\">Call</td><td style=\"padding:10px;border: 1px solid #ccc\">1</td><td style=\"padding:10px;border: 1px solid #ccc\"></td></tr><tr><td style=\"padding:10px;border: 1px solid #ccc\"><div><p style=\"text-transform: uppercase;display: block;margin-bottom: 10px;\">Demo Fashion</p><ul><li>SIZE: xxl</li><li>COLOUR: <span style=\"display: inline-block;background-color: #ddd;margin-left: 10px;width: 35px;height: 20px;vertical-align: text-bottom;\"></span></li></ul></div></td><td style=\"padding:10px;border: 1px solid #ccc\">89 <sup>Ä‘/sp</sup></td><td style=\"padding:10px;border: 1px solid #ccc\">4</td><td style=\"padding:10px;border: 1px solid #ccc\">356 <sup>Ä‘</sup></td></tr><tr><td colspan=\"3\" style=\"padding:10px;border: 1px solid #ccc\"><b>Tá»•ng cá»™ng </b><br /></td><td style=\"padding:10px;border: 1px solid #ccc\"><b style=\"font-weight: bold; font-size: 15px; color: #ff0000;\">356 <sup>Ä‘</sup></b></td></tr></table>', 1589302755, 0, 356, '', '', '', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(1) NOT NULL DEFAULT '1',
  `thu_tu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `language`
--

INSERT INTO `language` (`id`, `name`, `code`, `display`, `thu_tu`) VALUES
(1, 'Viá»‡t Nam', 'vn', 0, 1),
(10, 'English', 'en', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma`
--

CREATE TABLE `ma` (
  `id` int(5) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_ma` int(1) NOT NULL DEFAULT '0',
  `chiet_khau` int(5) NOT NULL,
  `so_lan_tong` int(5) NOT NULL,
  `so_lan_con` int(5) NOT NULL,
  `thoi_gian` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media_file`
--

CREATE TABLE `media_file` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mine` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media_file`
--

INSERT INTO `media_file` (`id`, `name`, `dir_folder`, `file_name`, `file_size`, `file_type`, `mine`, `time`) VALUES
(1, 'logo', '05-2020', 'logo.png', '21143', 'png', 'image', '2020-05-08 14:18:59'),
(2, 'favicon', '05-2020', 'favicon.png', '28469', 'png', 'image', '2020-05-08 14:19:13'),
(3, 'home1', '05-2020', 'home1.png', '1817909', 'png', 'image', '2020-05-08 14:25:24'),
(4, 'home2', '05-2020', 'home2.png', '1823237', 'png', 'image', '2020-05-08 14:25:24'),
(5, '11111', '05-2020', '11111.jpg', '110302', 'jpg', 'image', '2020-05-10 07:11:51'),
(6, '234234234', '05-2020', '234234234.jpg', '116369', 'jpg', 'image', '2020-05-10 07:11:51'),
(7, 'asdqasda', '05-2020', 'asdqasda.jpg', '239967', 'jpg', 'image', '2020-05-10 07:11:51'),
(8, 'mysize', '05-2020', 'mysize.jpg', '233111', 'jpg', 'image', '2020-05-10 15:56:18'),
(9, 'sp1', '05-2020', 'sp1.jpg', '34276', 'jpg', 'image', '2020-05-10 16:40:03'),
(10, 'sp2', '05-2020', 'sp2.jpg', '39518', 'jpg', 'image', '2020-05-10 16:40:03'),
(11, 'sp3', '05-2020', 'sp3.png', '97169', 'png', 'image', '2020-05-10 16:40:03'),
(12, 'sp4', '05-2020', 'sp4.jpg', '38411', 'jpg', 'image', '2020-05-10 16:40:03'),
(13, 'al1', '05-2020', 'al1.jpg', '46574', 'jpg', 'image', '2020-05-12 04:00:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media_relationship`
--

CREATE TABLE `media_relationship` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parent_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `noi_bat` int(1) NOT NULL DEFAULT '0',
  `thu_tu` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media_relationship`
--

INSERT INTO `media_relationship` (`id`, `media_id`, `parent_id`, `parent_type`, `type`, `title`, `note`, `url`, `hien_thi`, `noi_bat`, `thu_tu`, `time`, `title_en`, `note_en`, `url_en`) VALUES
(1, 1, 1, 'gallery', 'gallery', 'logo', '', '', 1, 0, 0, '2020-05-08 14:19:03', '', '', ''),
(2, 2, 2, 'gallery', 'gallery', 'favicon', '', '', 1, 0, 0, '2020-05-08 14:19:18', '', '', ''),
(3, 3, 1, 'info', 'avatar', '', '', '', 1, 0, 0, '2020-05-08 14:25:30', '', '', ''),
(4, 4, 2, 'info', 'avatar', '', '', '', 1, 0, 0, '2020-05-08 14:25:37', '', '', ''),
(6, 6, 13, 'postcat', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 07:29:12', '', '', ''),
(7, 5, 12, 'postcat', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 07:29:25', '', '', ''),
(8, 7, 3, 'gallery', 'gallery', 'asdqasda', '', '', 1, 0, 0, '2020-05-10 07:32:17', '', '', ''),
(19, 3, 11, 'postcat', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 14:42:34', '', '', ''),
(20, 3, 10, 'postcat', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 14:42:59', '', '', ''),
(21, 8, 12, 'postcat', 'album', 'mysize', '', '', 1, 0, 0, '2020-05-10 15:56:21', '', '', ''),
(22, 8, 12, 'postcat', 'album', 'mysize', '', '', 1, 0, 0, '2020-05-10 16:14:40', '', '', ''),
(23, 9, 9, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 16:40:14', '', '', ''),
(24, 10, 12, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 16:40:27', '', '', ''),
(25, 11, 13, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 16:40:37', '', '', ''),
(26, 12, 14, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 16:40:45', '', '', ''),
(27, 12, 15, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 16:40:59', '', '', ''),
(28, 11, 16, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 16:41:09', '', '', ''),
(29, 10, 17, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 16:41:19', '', '', ''),
(30, 9, 18, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-10 16:41:26', '', '', ''),
(31, 13, 9, 'post', 'album', 'al1', '', '', 1, 0, 0, '2020-05-12 04:00:26', '', '', ''),
(32, 13, 9, 'post', 'album', 'al1', '', '', 1, 0, 0, '2020-05-12 07:52:14', '', '', ''),
(33, 13, 9, 'post', 'album', 'al1', '', '', 1, 0, 0, '2020-05-12 08:14:39', '', '', ''),
(34, 13, 9, 'post', 'album', 'al1', '', '', 1, 0, 0, '2020-05-12 08:14:43', '', '', ''),
(35, 13, 9, 'post', 'album', 'al1', '', '', 1, 0, 0, '2020-05-12 08:15:22', '', '', ''),
(44, 7, 31, 'post', 'avatar', '', '', '', 1, 0, 0, '2020-05-12 18:25:47', '', '', ''),
(46, 8, 6, 'gallery', 'gallery', 'mysize', '', '', 1, 0, 0, '2020-05-14 15:22:25', '', '', ''),
(47, 8, 7, 'gallery', 'gallery', 'mysize', '', '', 1, 0, 0, '2020-05-14 15:22:33', '', '', ''),
(48, 8, 5, 'gallery', 'gallery', 'mysize', '', '', 1, 0, 0, '2020-05-14 15:35:56', '', '', ''),
(50, 4, 8, 'gallery', 'gallery', 'home2', '', '', 1, 0, 0, '2020-05-14 16:23:39', '', '', ''),
(51, 13, 9, 'gallery', 'gallery', 'al1', '', '', 1, 0, 0, '2020-05-14 16:23:49', '', '', ''),
(52, 6, 4, 'gallery', 'gallery', '234234234', '', '', 1, 0, 0, '2020-05-14 16:23:59', '', '', ''),
(53, 7, 10, 'gallery', 'gallery', 'asdqasda', '', '', 1, 0, 0, '2020-05-14 16:24:09', '', '', ''),
(54, 3, 11, 'gallery', 'gallery', 'home1', '', '', 1, 0, 0, '2020-05-14 16:24:18', '', '', ''),
(55, 8, 12, 'gallery', 'gallery', 'mysize', '', '', 1, 0, 0, '2020-05-14 16:24:27', '', '', ''),
(57, 8, 3, 'gallery', 'gallery', 'mysize', '', '', 1, 0, 0, '2020-05-14 17:00:36', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `cat1` int(11) NOT NULL,
  `cat2` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `time_edit` int(11) NOT NULL,
  `time_public` int(10) NOT NULL,
  `time_new_icon` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_edit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luot_xem` int(11) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `noi_bat` int(1) NOT NULL DEFAULT '0',
  `thu_tu` int(11) NOT NULL,
  `post_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_display` int(1) NOT NULL DEFAULT '0',
  `department` int(10) NOT NULL,
  `option3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `room_level` int(1) NOT NULL DEFAULT '0',
  `hierarchy` int(3) NOT NULL DEFAULT '0',
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon_hoc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `cat`, `cat1`, `cat2`, `time`, `time_edit`, `time_public`, `time_new_icon`, `user`, `user_edit`, `luot_xem`, `hien_thi`, `noi_bat`, `thu_tu`, `post_type`, `home_display`, `department`, `option3`, `is_public`, `room_level`, `hierarchy`, `is_new`, `is_delete`, `type`, `sex`, `mon_hoc`) VALUES
(1, 7, 0, 0, 1589016391, 1588957200, 0, 0, '5', '5', 88, 1, 1, 0, 'news_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(2, 7, 0, 0, 1589016410, 1589016410, 0, 1589016410, '5', '5', 1, 1, 1, 0, 'news_detail', 0, 0, '', 1, 0, 0, 0, 0, '', '', ''),
(3, 7, 0, 0, 1589016418, 1589016418, 0, 1589016418, '5', '5', 3, 1, 1, 0, 'news_detail', 0, 0, '', 1, 0, 0, 0, 0, '', '', ''),
(4, 8, 0, 0, 1589016453, 1589016453, 0, 1589016453, '5', '5', 7, 1, 1, 0, 'news_detail', 0, 0, '', 1, 0, 0, 0, 0, '', '', ''),
(5, 8, 0, 0, 1589016466, 1589016466, 0, 1589016466, '5', '5', 2, 1, 1, 0, 'news_detail', 0, 0, '', 1, 0, 0, 0, 0, '', '', ''),
(6, 8, 0, 0, 1589016476, 1589016476, 0, 1589016476, '5', '5', 1, 1, 1, 0, 'news_detail', 0, 0, '', 1, 0, 0, 0, 0, '', '', ''),
(7, 9, 0, 0, 1589016586, 1588957200, 0, 0, '5', '5', 16, 1, 1, 0, 'news_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(8, 9, 0, 0, 1589016884, 1589016884, 0, 1589016884, '5', '5', 2, 1, 1, 0, 'news_detail', 0, 0, '', 1, 0, 0, 0, 0, '', '', ''),
(9, 12, 4, 0, 1589045770, 1589043600, 0, 0, '5', '5', 407, 1, 0, 0, 'sanpham_detail', 0, 0, '', 1, 0, 0, 1, 0, '2', '0', ''),
(10, 14, 0, 0, 1589093905, 1589043600, 0, 0, '5', '5', 0, 1, 0, 0, 'video_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(11, 14, 0, 0, 1589118986, 1589118986, 0, 1589118986, '5', '5', 0, 1, 0, 0, 'video_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(12, 12, 4, 0, 1589128827, 1589043600, 0, 0, '5', '5', 0, 1, 0, 0, 'sanpham_detail', 0, 0, '', 1, 0, 0, 1, 0, '1', '0', ''),
(13, 12, 4, 0, 1589128837, 1589043600, 0, 0, '5', '5', 0, 1, 0, 0, 'sanpham_detail', 0, 0, '', 1, 0, 0, 1, 0, '1', '0', ''),
(14, 12, 4, 0, 1589128845, 1589128845, 0, 1589128845, '5', '5', 0, 1, 0, 0, 'sanpham_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(15, 12, 4, 0, 1589128859, 1589128859, 0, 1589128859, '5', '5', 0, 1, 0, 0, 'sanpham_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(16, 12, 4, 0, 1589128862, 1589043600, 0, 0, '5', '5', 0, 1, 0, 0, 'sanpham_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(17, 12, 4, 0, 1589128879, 1589128879, 0, 1589128879, '5', '5', 1, 1, 0, 0, 'sanpham_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(18, 12, 4, 0, 1589128886, 1589043600, 0, 0, '5', '5', 0, 1, 0, 0, 'sanpham_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(20, 16, 0, 0, 1589249463, 1589249463, 0, 1589249463, '5', '5', 0, 1, 0, 0, 'other_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(21, 16, 0, 0, 1589249480, 0, 0, 0, '5', '5', 0, 1, 0, 0, 'other_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(22, 15, 0, 0, 1589250432, 1589250432, 0, 1589250432, '5', '5', 0, 1, 0, 0, 'other_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(23, 15, 0, 0, 1589250439, 1589250439, 0, 1589250439, '5', '5', 0, 1, 0, 0, 'other_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(24, 15, 0, 0, 1589250445, 1589250445, 0, 1589250445, '5', '5', 0, 1, 0, 0, 'other_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', ''),
(25, 15, 0, 0, 1589250464, 1589250464, 0, 1589250464, '5', '5', 0, 1, 0, 0, 'other_detail', 0, 0, '', 1, 0, 0, 0, 0, '0', '0', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `postcat`
--

CREATE TABLE `postcat` (
  `id` int(5) NOT NULL,
  `cat` int(5) NOT NULL,
  `hien_thi` int(2) NOT NULL,
  `noi_bat` int(1) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `post_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_keys` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` int(10) NOT NULL,
  `theme` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_menu` int(1) NOT NULL DEFAULT '0',
  `hide_link` int(1) NOT NULL DEFAULT '0',
  `collection` int(9) NOT NULL,
  `video` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `postcat`
--

INSERT INTO `postcat` (`id`, `cat`, `hien_thi`, `noi_bat`, `thu_tu`, `level`, `post_type`, `theme_keys`, `department`, `theme`, `select_menu`, `hide_link`, `collection`, `video`) VALUES
(11, 5, 1, 0, 0, 2, 'sanpham', '', 0, '', 0, 0, 4, 10),
(4, 0, 1, 0, 0, 1, 'sanpham', 'theme_1', 0, '', 0, 0, 3, 10),
(5, 0, 1, 0, 0, 1, 'sanpham', 'theme_1', 0, '', 0, 0, 3, 10),
(12, 4, 1, 0, 0, 2, 'sanpham', '', 0, '', 0, 0, 0, 0),
(7, 0, 1, 1, 1, 1, 'news', 'theme_2', 0, '', 0, 0, 0, 0),
(8, 0, 1, 1, 2, 1, 'news', 'theme_2', 0, '', 0, 0, 0, 0),
(9, 0, 1, 1, 3, 1, 'news', 'theme_1', 0, '', 0, 0, 0, 0),
(10, 5, 1, 0, 0, 2, 'sanpham', '', 0, '', 0, 0, 0, 0),
(13, 4, 1, 0, 0, 2, 'sanpham', '', 0, '', 0, 0, 0, 0),
(14, 0, 1, 0, 0, 1, 'video', '', 0, '', 0, 0, 0, 0),
(15, 0, 1, 0, 0, 1, 'other', '', 0, '', 0, 0, 0, 0),
(16, 0, 1, 0, 0, 1, 'other', '', 0, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `postcat_lang`
--

CREATE TABLE `postcat_lang` (
  `id` int(11) NOT NULL,
  `postcat_id` int(11) NOT NULL,
  `lang_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_display` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Slug uu tien'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `postcat_lang`
--

INSERT INTO `postcat_lang` (`id`, `postcat_id`, `lang_id`, `name`, `name_display`, `slug`, `note`, `title_seo`, `keywords`, `description`, `title_h1`, `url`) VALUES
(10, 10, 'en', 'For Sale', '', 'for-sale', '', '', '', '', '', ''),
(4, 4, 'en', 'Women', '', 'women', '', '', '', '', '', ''),
(5, 5, 'en', 'Men', '', 'men', '', '', '', '', '', ''),
(11, 11, 'en', 'For Rent', '', 'for-rent', '', '', '', '', '', ''),
(7, 7, 'en', 'Service', '', 'service', '', '', '', '', '', ''),
(8, 8, 'en', 'POLICIES', '', 'policies', '', '', '', '', '', ''),
(9, 9, 'en', 'Contact', '', 'about-us', '', '', '', '', '', ''),
(12, 12, 'en', 'For Sale', '', 'for-sale-12', '', '', '', '', '', ''),
(13, 13, 'en', 'For Rent', '', 'for-rent-13', '', '', '', '', '', ''),
(14, 14, 'en', 'Show fashion', '', 'show-fashion', '', '', '', '', '', ''),
(15, 15, 'en', 'Size', '', 'size', '', '', '', '', '', ''),
(16, 16, 'en', 'MÃ u', '', 'mau', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_album`
--

CREATE TABLE `post_album` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `catalog` int(11) NOT NULL,
  `ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `time` int(11) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `hien_thi` int(11) NOT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_album_menu`
--

CREATE TABLE `post_album_menu` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `sp_id` int(11) NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chu_thich` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_lang`
--

CREATE TABLE `post_lang` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `lang_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_kd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chu_thich` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chu_thich_kd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung_kd` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wholesale_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_lang`
--

INSERT INTO `post_lang` (`id`, `post_id`, `lang_id`, `ten`, `ten_kd`, `chu_thich`, `chu_thich_kd`, `noi_dung`, `noi_dung_kd`, `keywords`, `slug`, `title_seo`, `description`, `old_price`, `new_price`, `wholesale_price`) VALUES
(1, 1, 'en', 'Size guide', 'Size guide', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a dui et lorem faucibus interdum. Integer vitae tellus neque. In ut purus in turpis iaculis mattis quis a dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent porta congue euismod. Praesent augue nisi, fringilla vitae suscipit non, luctus eget augue. Ut fermentum maximus iaculis. Donec nunc magna, sollicitudin id dapibus quis, euismod id ex. Pellentesque sodales turpis nec consequat iaculis. Vestibulum vehicula massa diam, molestie porta lectus consequat sed. Proin ut ultrices nisi. Aliquam sit amet rhoncus mi, ut accumsan erat. Pellentesque ac semper lacus, non aliquam quam. Maecenas luctus faucibus quam eget placerat. Proin tempor sollicitudin nulla, eu eleifend tortor ornare quis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a dui et lorem faucibus interdum. Integer vitae tellus neque. In ut purus in turpis iaculis mattis quis a dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent porta congue euismod. Praesent augue nisi, fringilla vitae suscipit non, luctus eget augue. Ut fermentum maximus iaculis. Donec nunc magna, sollicitudin id dapibus quis, euismod id ex. Pellentesque sodales turpis nec consequat iaculis. Vestibulum vehicula massa diam, molestie porta lectus consequat sed. Proin ut ultrices nisi. Aliquam sit amet rhoncus mi, ut accumsan erat. Pellentesque ac semper lacus, non aliquam quam. Maecenas luctus faucibus quam eget placerat. Proin tempor sollicitudin nulla, eu eleifend tortor ornare quis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a dui et lorem faucibus interdum. Integer vitae tellus neque. In ut purus in turpis iaculis mattis quis a dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent porta congue euismod. Praesent augue nisi, fringilla vitae suscipit non, luctus eget augue. Ut fermentum maximus iaculis. Donec nunc magna, sollicitudin id dapibus quis, euismod id ex. Pellentesque sodales turpis nec consequat iaculis. Vestibulum vehicula massa diam, molestie porta lectus consequat sed. Proin ut ultrices nisi. Aliquam sit amet rhoncus mi, ut accumsan erat. Pellentesque ac semper lacus, non aliquam quam. Maecenas luctus faucibus quam eget placerat. Proin tempor sollicitudin nulla, eu eleifend tortor ornare quis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a dui et lorem faucibus interdum. Integer vitae tellus neque. In ut purus in turpis iaculis mattis quis a dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent porta congue euismod. Praesent augue nisi, fringilla vitae suscipit non, luctus eget augue. Ut fermentum maximus iaculis. Donec nunc magna, sollicitudin id dapibus quis, euismod id ex. Pellentesque sodales turpis nec consequat iaculis. Vestibulum vehicula massa diam, molestie porta lectus consequat sed. Proin ut ultrices nisi. Aliquam sit amet rhoncus mi, ut accumsan erat. Pellentesque ac semper lacus, non aliquam quam. Maecenas luctus faucibus quam eget placerat. Proin tempor sollicitudin nulla, eu eleifend tortor ornare quis.', '', 'size-guide.html', '', '', '0', '0', '0'),
(2, 2, 'en', 'Shipping & Returns', 'Shipping & Returns', '', '', '', '', '', 'shipping-returns.html', '', '', '0', '0', '0'),
(3, 3, 'en', 'FAQ', 'FAQ', '', '', '', '', '', 'faq.html', '', '', '0', '0', '0'),
(4, 4, 'en', 'Privacy Policy', 'Privacy Policy', '', '', '', '', '', 'privacy-policy.html', '', '', '0', '0', '0'),
(5, 5, 'en', 'Cookie Policy', 'Cookie Policy', '', '', '', '', '', 'cookie-policy.html', '', '', '0', '0', '0'),
(6, 6, 'en', 'Terms & Conditions', 'Terms & Conditions', '', '', '', '', '', 'terms-conditions.html', '', '', '0', '0', '0'),
(7, 7, 'en', 'About us', 'About us', '', '', 'Khangle was launched in 2014 as a fashion brand by the former name Khang Le (Tin Tin). The label embodies a vast range of luxury products inspired by PrÃªt-Ã -Porte high fashion and unique &quot;Avant-garde&quot; styles. Khangle&rsquo;s designs have expanded to encompass additional fashion merchandise, which include shoes, purses, bags, and jewelry.&nbsp;<br />\r\n&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp;In addition to clothing design, Khangle works extensively with models and photographers. Khangle established his team of elite models, #TeamKhangle, in 2015. His current team has over 30 models from Upstate NY. He manages and trains his models using various personalized techniques in order to maximize their potential talent. Khangle offers modeling workshops throughout the year at his studio based in Syracuse, NY as well as studios throughout the Northeast and Mid-Atlantic regions. Moreover, he conducts cutting-edge photo shoots for models and strategically strengthens their portfolios.<br />\r\n&nbsp;\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://khangle.vn/uploads/images/images/adasdsadas.jpg\" /></td>\r\n			<td><img alt=\"\" src=\"http://khangle.vn/uploads/images/images/dasdasdasdas.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n&nbsp; &nbsp; &nbsp;Khangle has been a featured model for Goldwell Hair products, Trendzoom 2015-2016-2017, and the International Beauty Festival. He placed 1st as &quot;Perdo King&quot; of Vietnam in 2016 and he was previously a teen model at the age of 15 for Yeah1 Network. His prolific modeling background has contributed to his success as a runway coach and fashion show director.&nbsp;&nbsp;<br />\r\n&nbsp;<br />\r\n&nbsp; &nbsp; Khangle has attended and directed numerous fashion shows which include: &quot;Who Am I&quot; Fashion Show, &quot;Evolution&quot; Fashion Show, and &quot;International&quot; Fashion Show. He also directs beauty pageants, such as Ms. Golden World 2017 in MA and Miss Fantastic 2017 in Houston, TX. Khangle&#39;s designs and runway coaching were featured at International Fashion Week 2015-2016 in Japan and Vietnam which is one of the most prestigious fashion events in the world.<br />\r\n&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp;Recently, Khangle was the Lead Couture at Rochester Fashion Week 2017-2018-2019, NYFW Fashion Show 2017, and Syracuse Fashion Week 2017-18-19. His collection was broadcast on news-channel WKTV9 as part of a charity event that raised over $2,000 for breast cancer awareness in Herkimer, NY. He&#39;s also the creative director of Golden World entertaiment, produced over 3 internatonal pageant events, and a casting director of Stitched NY.&nbsp;<br />\r\n&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp;Khangle has a degree in Fashion Buying &amp; Merchandising from Herkimer College.&nbsp;', 'Khangle was launched in 2014 as a fashion brand by the former name Khang Le (Tin Tin). The label embodies a vast range of luxury products inspired by Pret-a-Porte high fashion and unique &quot;Avant-garde&quot; styles. Khangle&rsquo;s designs have expanded to encompass additional fashion merchandise, which include shoes, purses, bags, and jewelry.&nbsp;<br />\r\n&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp;In addition to clothing design, Khangle works extensively with models and photographers. Khangle established his team of elite models, #TeamKhangle, in 2015. His current team has over 30 models from Upstate NY. He manages and trains his models using various personalized techniques in order to maximize their potential talent. Khangle offers modeling workshops throughout the year at his studio based in Syracuse, NY as well as studios throughout the Northeast and Mid-Atlantic regions. Moreover, he conducts cutting-edge photo shoots for models and strategically strengthens their portfolios.<br />\r\n&nbsp;\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"http://khangle.vn/uploads/images/images/adasdsadas.jpg\" /></td>\r\n			<td><img alt=\"\" src=\"http://khangle.vn/uploads/images/images/dasdasdasdas.jpg\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n&nbsp; &nbsp; &nbsp;Khangle has been a featured model for Goldwell Hair products, Trendzoom 2015-2016-2017, and the International Beauty Festival. He placed 1st as &quot;Perdo King&quot; of Vietnam in 2016 and he was previously a teen model at the age of 15 for Yeah1 Network. His prolific modeling background has contributed to his success as a runway coach and fashion show director.&nbsp;&nbsp;<br />\r\n&nbsp;<br />\r\n&nbsp; &nbsp; Khangle has attended and directed numerous fashion shows which include: &quot;Who Am I&quot; Fashion Show, &quot;Evolution&quot; Fashion Show, and &quot;International&quot; Fashion Show. He also directs beauty pageants, such as Ms. Golden World 2017 in MA and Miss Fantastic 2017 in Houston, TX. Khangle&#39;s designs and runway coaching were featured at International Fashion Week 2015-2016 in Japan and Vietnam which is one of the most prestigious fashion events in the world.<br />\r\n&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp;Recently, Khangle was the Lead Couture at Rochester Fashion Week 2017-2018-2019, NYFW Fashion Show 2017, and Syracuse Fashion Week 2017-18-19. His collection was broadcast on news-channel WKTV9 as part of a charity event that raised over $2,000 for breast cancer awareness in Herkimer, NY. He&#39;s also the creative director of Golden World entertaiment, produced over 3 internatonal pageant events, and a casting director of Stitched NY.&nbsp;<br />\r\n&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp;Khangle has a degree in Fashion Buying &amp; Merchandising from Herkimer College.&nbsp;', '', 'about-us.html', '', '', '0', '0', '0'),
(8, 8, 'en', 'Flagship Store', 'Flagship Store', '', '', '', '', '', 'flagship-store.html', '', '', '0', '0', '0'),
(9, 9, 'en', 'Demo Fashion', 'Demo Fashion', 'A kimono style linen wrap top with a corded tie. Designed to be reversible', 'A kimono style linen wrap top with a corded tie. Designed to be reversible', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', 'demo-fashion.html', '', '', '0', '89', '0'),
(10, 10, 'en', '05/2020', '05/2020', 'https://www.youtube.com/watch?v=2y2Cr3XcAgM', 'https://www.youtube.com/watch?v=2y2Cr3XcAgM', '', '', '', '052020.html', '', '', '0', '0', '0'),
(11, 11, 'en', 'Show fashion', 'Show fashion', 'https://www.youtube.com/watch?v=2y2Cr3XcAgM', 'https://www.youtube.com/watch?v=2y2Cr3XcAgM', '', '', '', 'show-fashion.html', '', '', '0', '0', '0'),
(12, 12, 'en', 'Demo Fashion', 'Demo Fashion', '', '', '', '', '', 'demo-fashion-s12.html', '', '', '0', '0', '0'),
(13, 13, 'en', 'Demo Fashion', 'Demo Fashion', '', '', '', '', '', 'demo-fashion-s13.html', '', '', '0', '0', '0'),
(14, 14, 'en', 'Demo Fashion', 'Demo Fashion', '', '', '', '', '', 'demo-fashion-s14.html', '', '', '0', '0', '0'),
(15, 15, 'en', 'Demo Fashion', 'Demo Fashion', '', '', '', '', '', 'demo-fashion-s15.html', '', '', '0', '0', '0'),
(16, 16, 'en', 'Demo Fashion', 'Demo Fashion', '', '', '', '', '', 'demo-fashion-s16.html', '', '', '0', '0', '0'),
(17, 17, 'en', 'Demo Fashion', 'Demo Fashion', '', '', '', '', '', 'demo-fashion-s17.html', '', '', '0', '0', '0'),
(18, 18, 'en', 'Demo Fashion', 'Demo Fashion', '', '', '', '', '', 'demo-fashion-s18.html', '', '', '102', '98', '0'),
(20, 20, 'en', 'MÃ u Ä‘en', 'Mau den', '#000', '#000', '', '', '', 'mau-den.html', '', '', '0', '0', '0'),
(21, 21, 'en', 'MÃ u tráº¯ng', 'Mau trang', '#ddd', '#ddd', '', '', '', 'mau-trang.html', '', '', '0', '0', '0'),
(22, 22, 'en', '1', '1', 'Xl', 'Xl', '', '', '', '1.html', '', '', '0', '0', '0'),
(23, 23, 'en', '2', '2', 'xm', 'xm', '', '', '', '2.html', '', '', '0', '0', '0'),
(24, 24, 'en', '3', '3', 'xxl', 'xxl', '', '', '', '3.html', '', '', '0', '0', '0'),
(25, 25, 'en', '4', '4', 'sm', 'sm', '', '', '', '4.html', '', '', '0', '0', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_meta`
--

CREATE TABLE `post_meta` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `lang_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_meta_key`
--

CREATE TABLE `post_meta_key` (
  `id` int(11) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rows` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `chu_thich` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_kd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `sort` int(10) NOT NULL,
  `title_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id`, `name`, `name_kd`, `slug`, `note`, `time`, `sort`, `title_seo`, `keywords`, `description`, `count`) VALUES
(1, 'sanpham', 'sanpham', 'sanpham', '', 1589305627, 0, '', '', '', 0),
(2, 'no kia', 'no kia', 'no-kia', '', 1589305627, 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag_relationship`
--

CREATE TABLE `tag_relationship` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag_relationship`
--

INSERT INTO `tag_relationship` (`post_id`, `tag_id`, `sort`) VALUES
(1, 1, 0),
(1, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_bien`
--

CREATE TABLE `vn_bien` (
  `id` int(11) NOT NULL,
  `key_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_tri` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(3) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_bien`
--

INSERT INTO `vn_bien` (`id`, `key_name`, `gia_tri`, `nhom`, `lang`, `ten`, `sort`, `type`) VALUES
(1, 'title', 'Glass Slipper', 'GENERAL', 'vn', 'TiÃªu Ä‘á»', 1, 1),
(2, 'address', '457 QL13, Hiá»‡p BÃ¬nh PhÆ°á»›c, Thá»§ Äá»©c, Há»“ ChÃ­ Minh, Viá»‡t Nam', 'GENERAL', 'vn', 'Äá»‹a chá»‰', 3, 1),
(3, 'meta_author', 'Glass Slipper', 'GENERAL', 'vn', 'Author', 4, 1),
(51, 'meta_description', '', 'GENERAL', 'en', 'Desctiption', 8, 1),
(5, 'meta_keywords', '', 'GENERAL', 'vn', 'Keywords', 5, 1),
(6, 'meta_copyright', '', 'GENERAL', 'vn', 'Copyright', 7, 1),
(7, 'title', 'Glass Slipper', 'GENERAL', 'en', 'Title', 3, 1),
(13, 'email', 'herohandsome2013@gmail.com', 'OTHER', 'none', 'Email', 0, 1),
(8, 'address', 'Were located in Sydney, Australia', 'GENERAL', 'en', 'Address', 5, 1),
(9, 'meta_author', '', 'GENERAL', 'en', 'Author', 6, 1),
(50, 'meta_description', '', 'GENERAL', 'vn', 'Desctiption', 6, 1),
(11, 'meta_keywords', '', 'GENERAL', 'en', 'Keywords', 7, 1),
(12, 'meta_copyright', 'Â© Copyright 2020 Glass Slipper', 'GENERAL', 'en', 'Copyright', 9, 1),
(14, 'email_transport', 'noreply.abcemail@gmail.com', 'PHPMAILER', 'none', 'Email Transport', 0, 1),
(15, 'pass_transport', 'pfxscazjoxzzplkh', 'PHPMAILER', 'none', 'Pass Transport', 0, 1),
(16, 'RESIZE1', '400x300', 'RESIZE', 'none', 'Tin tá»©c', 0, 1),
(17, 'facebook', 'https://www.facebook.com/homnayngaymoi', 'SOCIAL', 'none', 'Facebook', 0, 1),
(18, 'google-plus', '', 'SOCIAL', 'none', 'Google', 1, 1),
(20, 'phone', '+61 2 9191 0245', 'OTHER', 'none', 'Phone', 3, 1),
(56, 'fax', '(028) 38871559', 'OTHER', 'none', 'Fax', 4, 1),
(22, 'maps', '10.844696, 106.718030', 'OTHER', 'none', 'Maps', 5, 1),
(24, 'name', 'Glass Slipper', 'GENERAL', 'vn', 'TÃªn cÃ´ng ty', 2, 1),
(25, 'name', 'Glass Slipper', 'GENERAL', 'en', 'Name Company', 4, 1),
(70, 'RESIZE6apb42m53s', '255x383', 'RESIZE', 'none', 'Sáº£n pháº©m quáº§n Ã¡o', 0, 1),
(34, 'OTHER72sv5H7u1s', '', 'OTHER', 'none', 'Url Website', 2, 1),
(41, 'OTHER773t13QCwY', 'https://www.facebook.com', 'OTHER', 'none', 'Link fanpage facebook', 1, 1),
(43, 'RESIZE42ant38ox5', '380x250', 'RESIZE', 'none', 'Sáº£n pháº©m/Tin tá»©c (home)', 0, 1),
(57, 'youtube', 'https://www.youtube.com', 'SOCIAL', 'none', 'Youtube', 2, 1),
(66, 'OTHERH8M889pcm9', 'ON', 'OTHER', 'none', 'Languages public', 0, 1),
(67, 'RESIZE8672iq8csN', '300x300', 'RESIZE', 'none', 'HÃ¬nh vuÃ´ng', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_cat`
--

CREATE TABLE `vn_cat` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL,
  `noi_bat` int(1) NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu_tu` int(11) NOT NULL DEFAULT '1',
  `_product` int(1) DEFAULT '0',
  `_cms` int(1) NOT NULL DEFAULT '0',
  `_gallery` int(1) NOT NULL DEFAULT '0',
  `_file` int(1) NOT NULL DEFAULT '0',
  `_list` int(1) NOT NULL DEFAULT '0',
  `_project` int(1) NOT NULL DEFAULT '0',
  `_anhsp` int(1) NOT NULL DEFAULT '0',
  `_filesp` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_cat`
--

INSERT INTO `vn_cat` (`id`, `ten`, `ten_en`, `hien_thi`, `noi_bat`, `hinh`, `thu_tu`, `_product`, `_cms`, `_gallery`, `_file`, `_list`, `_project`, `_anhsp`, `_filesp`) VALUES
(1, 'List', 'List', 0, 0, '', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(2, 'Gallery', 'Gallery', 1, 0, '', 1, 0, 0, 1, 0, 0, 0, 0, 0),
(3, 'Album', 'Album', 1, 0, '', 0, 0, 0, 0, 0, 0, 0, 1, 0),
(5, 'File Manager', 'File Manager', 1, 0, '', 0, 0, 0, 0, 1, 0, 0, 0, 0),
(9, 'Video', 'video', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(11, 'Images', 'Images', 1, 0, '', 1, 0, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_contacts`
--

CREATE TABLE `vn_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `view` int(1) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` int(10) NOT NULL DEFAULT '0',
  `ngay_sinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_facebook` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_contacts`
--

INSERT INTO `vn_contacts` (`id`, `name`, `email`, `content`, `address`, `subject`, `phone`, `company_name`, `post_id`, `time`, `view`, `type`, `type_name`, `user_id`, `full_url`, `department`, `ngay_sinh`, `cmnd`, `link_facebook`) VALUES
(1, 'Sao', 'herohandsome2013@gmail.com', 'asdasdasdasd', '', '', '0989989989', '', 0, 1589303714, 0, 'LIENHE', 'LiÃªn há»‡', 0, '//localhost:3000/contact.html', 0, '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_gallery_menu`
--

CREATE TABLE `vn_gallery_menu` (
  `id` int(11) NOT NULL,
  `cat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_gallery_menu`
--

INSERT INTO `vn_gallery_menu` (`id`, `cat`, `thu_tu`, `hien_thi`, `hinh`, `post_type`) VALUES
(1, '2', 1, 1, 'no', 'catgal'),
(2, '2', 2, 1, 'no', 'catgal'),
(3, '11', 1, 1, 'no', 'catgal'),
(4, '11', 2, 1, 'no', 'catgal'),
(5, '2', 3, 1, 'no', 'catgal'),
(6, '2', 4, 1, 'no', 'catgal'),
(7, '2', 5, 1, 'no', 'catgal'),
(8, '11', 3, 1, 'no', 'catgal'),
(9, '11', 4, 1, 'no', 'catgal'),
(10, '11', 5, 1, 'no', 'catgal'),
(11, '11', 6, 1, 'no', 'catgal'),
(12, '11', 7, 1, 'no', 'catgal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_gallery_menu_lang`
--

CREATE TABLE `vn_gallery_menu_lang` (
  `id` int(11) NOT NULL,
  `gallery_menu_id` int(11) NOT NULL,
  `lang_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chu_thich` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_gallery_menu_lang`
--

INSERT INTO `vn_gallery_menu_lang` (`id`, `gallery_menu_id`, `lang_id`, `ten`, `chu_thich`, `slug`) VALUES
(1, 1, 'en', 'logo', '', 'logo'),
(2, 2, 'en', 'favicon', '', 'favicon'),
(3, 3, 'en', '05/2020', '', '052020'),
(4, 4, 'en', '06/2020', '', '062020'),
(5, 5, 'en', 'Banner NEW ARRIVALS', '', 'banner-new-arrivals'),
(6, 6, 'en', 'Banner SALE', '', 'banner-sale'),
(7, 7, 'en', 'Banner RENT', '', 'banner-rent'),
(8, 8, 'en', 'asdasdasd', '', 'asdasdasd'),
(9, 9, 'en', 'asdasdasd', '', 'asdasdasd'),
(10, 10, 'en', 'asdasdasd', '', 'asdasdasd'),
(11, 11, 'en', 'asdasdasdasd', '', 'asdasdasdasd'),
(12, 12, 'en', 'asdasdasd', '', 'asdasdasd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_gianhang`
--

CREATE TABLE `vn_gianhang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kiem_duyet` int(1) NOT NULL DEFAULT '0',
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_import`
--

CREATE TABLE `vn_import` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_menu`
--

CREATE TABLE `vn_menu` (
  `menu_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_cat` int(1) NOT NULL,
  `type_link` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_menu`
--

INSERT INTO `vn_menu` (`menu_id`, `cat`, `post_type`, `menu_cat`, `type_link`, `name`, `slug`, `class_name`, `images_url`) VALUES
('4', '0', 'postcat', 2, 0, 'Women', 'women', '', ''),
('5', '0', 'postcat', 2, 0, 'Men', 'men', '', ''),
('p8', '0', 'page', 2, 0, 'Bag', 'bag.html', '', ''),
('p6', '0', 'page', 2, 0, 'Search', 'search.html', '', ''),
('p16', '0', 'page', 1, 0, 'New Arrivals', 'new-arrivals.html', '', ''),
('p9', '0', 'page', 1, 0, 'Sale', 'sale.html', '', ''),
('p10', '0', 'page', 1, 0, 'Rent', 'rent.html', '', ''),
('p3', '0', 'page', 1, 0, 'Collection', 'collection.html', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_modules`
--

CREATE TABLE `vn_modules` (
  `id` int(11) NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_type` int(11) NOT NULL,
  `module_html_tag` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html_list_tag` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_display` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_online`
--

CREATE TABLE `vn_online` (
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_online`
--

INSERT INTO `vn_online` (`ip`, `time`, `site`, `agent`, `user`) VALUES
('127.0.0.1', '1589475909', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_online_daily`
--

CREATE TABLE `vn_online_daily` (
  `ngay` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bo_dem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_online_daily`
--

INSERT INTO `vn_online_daily` (`ngay`, `bo_dem`) VALUES
('08/05/2020', 15),
('09/05/2020', 19),
('10/05/2020', 32),
('11/05/2020', 21),
('12/05/2020', 32),
('13/05/2020', 11),
('14/05/2020', 15),
('15/05/2020', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_page`
--

CREATE TABLE `vn_page` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `luot_xem` int(11) DEFAULT '1',
  `option1` int(11) NOT NULL,
  `post_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_page`
--

INSERT INTO `vn_page` (`id`, `time`, `user`, `luot_xem`, `option1`, `post_type`, `hien_thi`, `alias`, `home`) VALUES
(1, 1589214469, 5, 1, 0, '', 1, 'home1', 0),
(2, 1589214475, 5, 1, 0, '', 1, 'home2', 0),
(3, 1588948939, 5, 1, 0, 'gallery', 1, '', 0),
(4, 1588948959, 5, 1, 1, 'home', 1, '', 0),
(5, 1588948978, 5, 1, 0, 'contact', 1, '', 0),
(6, 1588949023, 5, 90, 0, 'search', 1, '', 0),
(7, 1589017253, 5, 43, 0, '', 1, 'workTime', 0),
(8, 1589207203, 5, 3750, 0, 'cart', 1, '', 0),
(9, 1589207584, 5, 1, 0, 'pagesale', 1, '', 0),
(10, 1589207660, 5, 2, 0, 'pagerent', 1, '', 0),
(11, 1589214151, 5, 213, 0, 'order', 1, '', 0),
(12, 1589215694, 5, 1, 0, '', 1, 'tien_mat', 0),
(13, 1589215708, 5, 1, 0, '', 1, 'chuyen_khoan', 0),
(14, 1589292677, 5, 1, 0, '', 1, 'ShippingReturns', 0),
(15, 1589292859, 5, 1, 0, '', 1, 'NeedHelp', 0),
(16, 1589469505, 5, 1, 0, 'NewArrivals', 1, '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_page_lang`
--

CREATE TABLE `vn_page_lang` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `lang_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chu_thich` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_page_lang`
--

INSERT INTO `vn_page_lang` (`id`, `page_id`, `lang_id`, `ten`, `chu_thich`, `url`, `noi_dung`, `title_seo`, `keywords`, `description`, `slug`) VALUES
(1, 1, 'en', 'Banner left', '', '/men/', '', '', '', '', ''),
(2, 2, 'en', 'Banner right', '', '/women/', '', '', '', '', ''),
(3, 3, 'en', 'Collection', '', '', '', '', '', '', 'collection.html'),
(4, 4, 'en', 'Home', '', '', '', '', '', '', 'home.html'),
(5, 5, 'en', 'Contact', '', '', '', '', '', '', 'contact.html'),
(6, 6, 'en', 'Search', '', '', '', '', '', '', 'search.html'),
(9, 7, 'en', 'Customer Care hours:', '', '', 'Monday - Friday | 9am to 4.30pm AEST', '', '', '', ''),
(10, 8, 'en', 'Bag', '', '', '', '', '', '', 'bag.html'),
(11, 9, 'en', 'Sale', '', '', '', '', '', '', 'sale.html'),
(12, 10, 'en', 'Rent', '', '', '', '', '', '', 'rent.html'),
(13, 11, 'en', 'Order', '', '', '', '', '', '', 'order.html'),
(14, 12, 'en', 'Thanh toÃ¡n tiá»n máº·t', '', '', '', '', '', '', ''),
(15, 13, 'en', 'Thanh toÃ¡n chuyá»ƒn khoáº£n', '', '', '', '', '', '', ''),
(16, 14, 'en', 'Shipping & returns', '', '', '', '', '', '', ''),
(17, 15, 'en', 'Need help?', '', '', '', '', '', '', ''),
(18, 16, 'en', 'New Arrivals', '', '', '', '', '', '', 'new-arrivals.html');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_sanpham_mau`
--

CREATE TABLE `vn_sanpham_mau` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_sanpham_mau`
--

INSERT INTO `vn_sanpham_mau` (`id`, `san_pham_id`) VALUES
(21, 9),
(20, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_sanpham_size`
--

CREATE TABLE `vn_sanpham_size` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_sanpham_size`
--

INSERT INTO `vn_sanpham_size` (`id`, `san_pham_id`) VALUES
(22, 9),
(24, 9),
(25, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_support`
--

CREATE TABLE `vn_support` (
  `id` int(11) NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `yahoo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `luot_xem` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_user`
--

CREATE TABLE `vn_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `level` int(1) DEFAULT '1',
  `trang_thai` int(1) NOT NULL DEFAULT '0',
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` int(10) NOT NULL,
  `id_user_group` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_user`
--

INSERT INTO `vn_user` (`id`, `username`, `password`, `ten`, `email`, `dien_thoai`, `dia_chi`, `level`, `trang_thai`, `images`, `time`, `dir`, `department`, `id_user_group`) VALUES
(5, 'coder', '0ea4a0db010efd4ed3ca4ebee723b65c', 'Tran Bao', 'trannhatbaoit@gmail.com', '0962.864.230', 'ÄÃ  Náºµng', 0, 1, '5-coder.jpg', 1466390221, 'member/', 0, 1),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'trannhatbaoid@gmail.com', '0962.864.230', 'ÄÃ  Náºµng', 1, 1, '4-admin.jpg', 1465871477, 'member/', 0, 1),
(27, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'tran@gmail.com', '0989989989', 'Da Nang', 1, 1, '', 1578481798, '', 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_user_group`
--

CREATE TABLE `vn_user_group` (
  `id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_administrator` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_user_group`
--

INSERT INTO `vn_user_group` (`id`, `name`, `role`, `is_administrator`) VALUES
(1, 'Administrator', 'Administrator', 1),
(2, 'Admin', 'Admin', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_user_permission`
--

CREATE TABLE `vn_user_permission` (
  `id_user_group` int(10) NOT NULL,
  `id_user_action` int(10) NOT NULL,
  `is_check` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vn_user_permission`
--

INSERT INTO `vn_user_permission` (`id_user_group`, `id_user_action`, `is_check`) VALUES
(2, 30, 1),
(2, 31, 1),
(2, 33, 1),
(2, 36, 1),
(2, 35, 1),
(2, 34, 1),
(2, 28, 1),
(2, 29, 1),
(2, 27, 1),
(2, 26, 1),
(2, 25, 1),
(2, 24, 1),
(2, 23, 1),
(2, 22, 1),
(2, 21, 1),
(2, 19, 1),
(2, 17, 1),
(2, 16, 1),
(2, 15, 1),
(2, 45, 1),
(2, 14, 1),
(2, 44, 1),
(2, 43, 1),
(2, 42, 1),
(2, 41, 1),
(2, 12, 1),
(2, 11, 1),
(2, 10, 1),
(2, 9, 1),
(2, 40, 1),
(2, 39, 1),
(2, 38, 1),
(2, 37, 1),
(2, 8, 1),
(2, 7, 1),
(2, 6, 1),
(2, 5, 1),
(2, 4, 1),
(2, 3, 1),
(2, 2, 1),
(2, 1, 1),
(2, 32, 1),
(2, 46, 1),
(2, 47, 1),
(2, 48, 1),
(2, 49, 1),
(2, 50, 1),
(2, 51, 1),
(2, 52, 1),
(2, 53, 1),
(2, 54, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ma`
--
ALTER TABLE `ma`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `media_file`
--
ALTER TABLE `media_file`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `media_relationship`
--
ALTER TABLE `media_relationship`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `postcat`
--
ALTER TABLE `postcat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `postcat_lang`
--
ALTER TABLE `postcat_lang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_album`
--
ALTER TABLE `post_album`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_album_menu`
--
ALTER TABLE `post_album_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_lang`
--
ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_meta`
--
ALTER TABLE `post_meta`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_meta_key`
--
ALTER TABLE `post_meta_key`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_bien`
--
ALTER TABLE `vn_bien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_cat`
--
ALTER TABLE `vn_cat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_contacts`
--
ALTER TABLE `vn_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_gallery_menu`
--
ALTER TABLE `vn_gallery_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_gallery_menu_lang`
--
ALTER TABLE `vn_gallery_menu_lang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_gianhang`
--
ALTER TABLE `vn_gianhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_import`
--
ALTER TABLE `vn_import`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_modules`
--
ALTER TABLE `vn_modules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_page`
--
ALTER TABLE `vn_page`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_page_lang`
--
ALTER TABLE `vn_page_lang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_support`
--
ALTER TABLE `vn_support`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vn_user`
--
ALTER TABLE `vn_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `vn_user_group`
--
ALTER TABLE `vn_user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `ma`
--
ALTER TABLE `ma`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media_file`
--
ALTER TABLE `media_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `media_relationship`
--
ALTER TABLE `media_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `postcat`
--
ALTER TABLE `postcat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `postcat_lang`
--
ALTER TABLE `postcat_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `post_album`
--
ALTER TABLE `post_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_album_menu`
--
ALTER TABLE `post_album_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_lang`
--
ALTER TABLE `post_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `post_meta`
--
ALTER TABLE `post_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_meta_key`
--
ALTER TABLE `post_meta_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `vn_bien`
--
ALTER TABLE `vn_bien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `vn_cat`
--
ALTER TABLE `vn_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `vn_contacts`
--
ALTER TABLE `vn_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vn_gallery_menu`
--
ALTER TABLE `vn_gallery_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `vn_gallery_menu_lang`
--
ALTER TABLE `vn_gallery_menu_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `vn_gianhang`
--
ALTER TABLE `vn_gianhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vn_import`
--
ALTER TABLE `vn_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vn_modules`
--
ALTER TABLE `vn_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vn_page`
--
ALTER TABLE `vn_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `vn_page_lang`
--
ALTER TABLE `vn_page_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `vn_support`
--
ALTER TABLE `vn_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vn_user`
--
ALTER TABLE `vn_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `vn_user_group`
--
ALTER TABLE `vn_user_group`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
