SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `vn_nagecco`
--




CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  `luot_xem` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO album VALUES
("1","1","1","","1-1.jpg","1","1501556646","5","0");




CREATE TABLE `dathang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_den` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_di` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tong_cong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `do_la` int(20) NOT NULL,
  `loai_phong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_phong` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `so_nguoi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tre_em` int(20) NOT NULL,
  `nguoi_lon` int(11) NOT NULL,
  `thanh_toan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `dua_don` int(1) NOT NULL,
  `thoi_gian_den` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chuyen_bay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_di` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_dua_don` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenphong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO dathang VALUES
("1","Ho Ten","0987654321","","Email@gmail.com","","","","0","Tieu de","","","0","0","","Noi dung","0","","","","","","","0","0");




CREATE TABLE `donhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `yeu_cau` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `tien` int(11) NOT NULL,
  `congty` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ma` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `thanh_toan` varchar(255) NOT NULL,
  `custom_id` int(11) NOT NULL,
  `cod` varchar(10) NOT NULL,
  `activate` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO donhang VALUES
("2","B????i quang t????n","???????? N??????ng","0909090909","buiquang@gmail.com","okk","<table width=\"100%\" cellpadding=\"3\" cellspacing=\"3\" class=\"table table-hover table-condensed\" ><tr><th>T????n s??????n ph??????m</th><th>Gi????</th><th>S??????? l??????????ng</th><th>Th????nh ti??????n</th></tr><tr><td>S??????n ph??????m #4</td><td>120.000 <sup>?????/sp</sup></td><td>1 </td><td>120.000 <sup>?????</sup></td></tr><tr><td>S??????n ph??????m #3</td><td>400.000 <sup>?????/sp</sup></td><td>1 </td><td>400.000 <sup>?????</sup></td></tr><tr><td>S??????n ph??????m #2</td><td>200.000 <sup>?????/sp</sup></td><td>5 </td><td>1.000.000 <sup>?????</sup></td></tr><tr><td>S??????n ph??????m #1</td><td>350.000 <sup>?????/sp</sup></td><td>1 </td><td>350.000 <sup>?????</sup></td></tr><tr><td colspan=\"3\"><b>T???????ng c???????ng </b><br /></td><td><b style=\"font-weight: bold; font-size: 15px; color: #ff0000;\">1.870.000 <sup>?????</sup></b></td></tr></table>","1505791819","0","1870000","Vina","5Eh5BM89","Thanh to????n b??????ng h????nh th??????c chuy??????n kho??????n","0","","0"),
("3","B????i minh t????","Qu??????ng Nam","0987444333","buiquang@gmail.com","????dasd","<table width=\"100%\" cellpadding=\"3\" cellspacing=\"3\" class=\"table table-hover table-condensed\" ><tr><th>T????n s??????n ph??????m</th><th>Gi????</th><th>S??????? l??????????ng</th><th>Th????nh ti??????n</th></tr><tr><td>S??????n ph??????m #1</td><td>350.000 <sup>?????/sp</sup></td><td>1 </td><td>350.000 <sup>?????</sup></td></tr><tr><td colspan=\"3\"><b>T???????ng c???????ng </b><br /></td><td><b style=\"font-weight: bold; font-size: 15px; color: #ff0000;\">350.000 <sup>?????</sup></b></td></tr></table>","1505792110","0","350000","","","Thanh to????n b??????ng ti??????n m??????t","0","","0");




CREATE TABLE `hangsx` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quocgia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thutu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `kichhoat_kh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `activate` int(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `hien_thi` int(1) DEFAULT '0',
  `kh_id` int(11) NOT NULL,
  `time_kh` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO kichhoat_kh VALUES
("1","se8687","1","1","1","1","25","1503908116","0"),
("2","2469iK","0","1","1","1","23","1503977168","0"),
("3","Lm4232","0","0","2","0","9","0","1505791819"),
("4","9vm532","0","0","2","0","8","0","1505791819"),
("5","c748I9","0","0","2","0","7","0","1505791819"),
("6","s8F248","0","0","2","0","6","0","1505791819");




CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display` int(1) NOT NULL DEFAULT '1',
  `thu_tu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


INSERT INTO language VALUES
("1","Vi???????t Nam","vn","1","1"),
("10","English","en","1","2");




CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `view` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO lienhe VALUES
("4","B????i quang t????n","buiquang@gmail.com","text","","","0909090909","","0","1506417404","1");




CREATE TABLE `list_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_size` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luot_tai` int(11) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `noi_bat` int(1) NOT NULL,
  `time` int(11) NOT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  `luot_xem` int(11) NOT NULL DEFAULT '0',
  `ngon_ngu` int(1) NOT NULL,
  `kieu` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `cat1` int(11) NOT NULL,
  `cat2` int(11) NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luot_xem` int(11) NOT NULL,
  `noi_bat` int(1) NOT NULL DEFAULT '0',
  `post_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_edit` int(11) NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_edit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option1` int(1) NOT NULL DEFAULT '0',
  `option2` int(1) NOT NULL DEFAULT '0',
  `thu_tu` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_size` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dir_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `giang_vien` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;


INSERT INTO post VALUES
("5","4","2","0","5-khoi-cong-du-an-muong-thanh-hotel.jpg","1","1506330667","5","28","1","post_detail","1506496058","2017-09/post/","5","1","0","0","","","","0"),
("6","4","2","0","6-tin-tuc-1.jpg","1","1506330678","5","1","1","post_detail","1506496050","2017-09/post/","5","0","0","0","","","","0"),
("21","25","24","11","no","1","1508139229","5","0","0","catproduct_detail","1508139229","","5","0","0","0","","","","0"),
("7","34","0","0","no","1","1506481196","5","0","0","video_detail","1506481196","","5","0","0","0","","","","0"),
("8","34","0","0","no","1","1506481213","5","0","0","video_detail","1506481213","","5","0","0","0","","","","0"),
("9","34","0","0","no","1","1506481230","5","0","0","video_detail","1506481230","","5","0","0","0","","","","0"),
("10","34","0","0","no","1","1506481245","5","0","0","video_detail","1506481245","","5","0","0","0","","","","0"),
("11","34","0","0","no","1","1506481259","5","0","0","video_detail","1506481259","","5","0","0","0","","","","0"),
("12","34","0","0","no","1","1506481271","5","0","0","video_detail","1506481271","","5","0","0","0","","","","0"),
("13","34","0","0","no","1","1506481287","5","0","0","video_detail","1506481287","","5","0","0","0","","","","0"),
("14","13","10","0","14-lap-du-an-1.jpg","1","1506655103","5","0","0","catproduct_detail","1507733342","2017-09/post/","5","0","0","0","","","","0"),
("15","17","15","10","15-chung-cu-1.jpg","1","1506655460","5","0","0","catproduct_detail","1506655460","2017-09/post/","5","0","0","0","","","","0"),
("16","17","15","10","16-chung-cu-2.jpg","1","1506655482","5","0","0","catproduct_detail","1506655482","2017-09/post/","5","0","0","0","","","","0"),
("17","17","15","10","17-chung-cu-3.jpg","1","1506655505","5","0","0","catproduct_detail","1506655505","2017-09/post/","5","0","0","0","","","","0"),
("18","17","15","10","18-chung-cu-4.jpg","1","1506655553","5","0","0","catproduct_detail","1506655553","2017-09/post/","5","0","0","0","","","","0"),
("19","17","15","10","19-chung-cu-5.jpg","1","1506655570","5","0","0","catproduct_detail","1506655570","2017-09/post/","5","0","0","0","","","","0"),
("20","17","15","10","20-chung-cu-6.jpg","1","1506655587","5","0","0","catproduct_detail","1506655587","2017-09/post/","5","0","0","0","","","","0");




CREATE TABLE `post_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `catalog` int(11) NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'no',
  `time` int(11) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `hien_thi` int(11) NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO post_album VALUES
("1","14","0","74FY7Y","","1-0Chrysanthemum.jpg","0","0","1","media_list/"),
("2","14","0","GAJKUQ","","2-1Desert.jpg","0","4","1","media_list/"),
("3","14","0","LIOH7P","","3-2Hydrangeas.jpg","0","3","1","media_list/"),
("4","14","0","IAQKHD","","4-3Jellyfish.jpg","0","2","1","media_list/"),
("5","14","0","Y47FAV","","5-4Koala.jpg","0","1","1","media_list/");




CREATE TABLE `post_album_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cat` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `sp_id` int(11) NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `post_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `catalog` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `noi_dung` text NOT NULL,
  `file` varchar(100) DEFAULT 'no',
  `file_size` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `hien_thi` int(11) NOT NULL,
  `dir` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `post_file_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `post_file_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `sp_id` int(11) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `chu_thich` text NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `post_file_menu_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_menu_id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `post_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `lang_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_kd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich_kd` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_kd` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_seo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `old_price` varchar(255) NOT NULL,
  `new_price` varchar(255) NOT NULL,
  `wholesale_price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;


INSERT INTO post_lang VALUES
("21","21","vn","text","text","","","","","","text.html","","","","",""),
("5","5","vn","Kh??????i c????ng d?????? ????n M??????????ng Thanh Hotel","Khoi cong du an Muong Thanh Hotel","Lorem ipsum dolor sit amet, lectus quis elit eget mattis ut nunc, faucibus ut. Nunc neque maecenas nec adipiscing, sit nunc consequat consequat duis vulputate, donec lorem quam mi.","Lorem ipsum dolor sit amet, lectus quis elit eget mattis ut nunc, faucibus ut. Nunc neque maecenas nec adipiscing, sit nunc consequat consequat duis vulputate, donec lorem quam mi.","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, lectus quis elit eget mattis ut nunc, faucibus ut. Nunc neque maecenas nec adipiscing, sit nunc consequat consequat duis vulputate, donec lorem quam mi. Orci mi. Eu nulla ante enim, justo tempor, praesent ut bibendum erat etiam leo nisl, ut quis molestie, congue dui vehicula nunc. Id at phasellus pede vel faucibus a, integer cras ligula eget, mauris et eros luctus lectus, sed nullam, venenatis dignissim pulvinar a elementum. Purus cras, porta eu amet lacus massa dui, eu amet pulvinar eu tristique.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Magna sit eleifend, adipiscing accumsan consequat suspendisse ac ipsum enim, sodales ac commodo dignissim scelerisque neque, mi ut pede nisl in porttitor nec. Sed augue, est est quisque imperdiet consequatur vel fermentum, wisi sagittis donec, nascetur vestibulum, suspendisse a non placerat conubia ut. Et sed etiam mauris. Tellus justo rhoncus tortor justo ac porttitor, congue consectetuer vitae vulputate. A lacus diam tristique ut habitant, etiam porta, mi sit eu sagittis, ultrices non. Malesuada faucibus sed risus porta massa, eros laoreet quis non, cras ut tellus ex dolor quis semper, vel id auctor. Id porta minima, lacinia vel mi, sapien metus justo volutpat, id hac dui sodales suspendisse, consequat vel. Vitae blandit tellus ornare curabitur, nunc vitae, vitae in nec vel enim interdum gravida. Ut elit facilisis leo sem pharetra consequat. Dolor nascetur adipiscing dolor quam, ultrices orci donec vestibulum, etiam sed diam diam, tincidunt gravida velit nonummy. Nisl mattis pharetra mauris, maecenas quis, ullamcorper mattis mi, auctor metus, ullamcorper auctor id. Id est libero donec, ac pulvinar nulla elit lacinia ac, erat dui nibh a ut pellentesque vel, a dui odio pellentesque varius nec, mauris fermentum id sit at.</p>\n","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, lectus quis elit eget mattis ut nunc, faucibus ut. Nunc neque maecenas nec adipiscing, sit nunc consequat consequat duis vulputate, donec lorem quam mi. Orci mi. Eu nulla ante enim, justo tempor, praesent ut bibendum erat etiam leo nisl, ut quis molestie, congue dui vehicula nunc. Id at phasellus pede vel faucibus a, integer cras ligula eget, mauris et eros luctus lectus, sed nullam, venenatis dignissim pulvinar a elementum. Purus cras, porta eu amet lacus massa dui, eu amet pulvinar eu tristique.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Magna sit eleifend, adipiscing accumsan consequat suspendisse ac ipsum enim, sodales ac commodo dignissim scelerisque neque, mi ut pede nisl in porttitor nec. Sed augue, est est quisque imperdiet consequatur vel fermentum, wisi sagittis donec, nascetur vestibulum, suspendisse a non placerat conubia ut. Et sed etiam mauris. Tellus justo rhoncus tortor justo ac porttitor, congue consectetuer vitae vulputate. A lacus diam tristique ut habitant, etiam porta, mi sit eu sagittis, ultrices non. Malesuada faucibus sed risus porta massa, eros laoreet quis non, cras ut tellus ex dolor quis semper, vel id auctor. Id porta minima, lacinia vel mi, sapien metus justo volutpat, id hac dui sodales suspendisse, consequat vel. Vitae blandit tellus ornare curabitur, nunc vitae, vitae in nec vel enim interdum gravida. Ut elit facilisis leo sem pharetra consequat. Dolor nascetur adipiscing dolor quam, ultrices orci donec vestibulum, etiam sed diam diam, tincidunt gravida velit nonummy. Nisl mattis pharetra mauris, maecenas quis, ullamcorper mattis mi, auctor metus, ullamcorper auctor id. Id est libero donec, ac pulvinar nulla elit lacinia ac, erat dui nibh a ut pellentesque vel, a dui odio pellentesque varius nec, mauris fermentum id sit at.</p>\n","","khoi-cong-du-an-muong-thanh-hotel.html","","","","",""),
("6","6","vn","Tin t??????c #1","Tin tuc #1","Lorem ipsum dolor sit amet, lectus quis elit eget mattis ut nunc, faucibus ut. Nunc neque maecenas nec adipiscing, sit nunc consequat consequat duis vulputate","Lorem ipsum dolor sit amet, lectus quis elit eget mattis ut nunc, faucibus ut. Nunc neque maecenas nec adipiscing, sit nunc consequat consequat duis vulputate","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, lectus quis elit eget mattis ut nunc, faucibus ut. Nunc neque maecenas nec adipiscing, sit nunc consequat consequat duis vulputate, donec lorem quam mi. Orci mi. Eu nulla ante enim, justo tempor, praesent ut bibendum erat etiam leo nisl, ut quis molestie, congue dui vehicula nunc. Id at phasellus pede vel faucibus a, integer cras ligula eget, mauris et eros luctus lectus, sed nullam, venenatis dignissim pulvinar a elementum. Purus cras, porta eu amet lacus massa dui, eu amet pulvinar eu tristique.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Magna sit eleifend, adipiscing accumsan consequat suspendisse ac ipsum enim, sodales ac commodo dignissim scelerisque neque, mi ut pede nisl in porttitor nec. Sed augue, est est quisque imperdiet consequatur vel fermentum, wisi sagittis donec, nascetur vestibulum, suspendisse a non placerat conubia ut. Et sed etiam mauris. Tellus justo rhoncus tortor justo ac porttitor, congue consectetuer vitae vulputate. A lacus diam tristique ut habitant, etiam porta, mi sit eu sagittis, ultrices non. Malesuada faucibus sed risus porta massa, eros laoreet quis non, cras ut tellus ex dolor quis semper, vel id auctor. Id porta minima, lacinia vel mi, sapien metus justo volutpat, id hac dui sodales suspendisse, consequat vel. Vitae blandit tellus ornare curabitur, nunc vitae, vitae in nec vel enim interdum gravida. Ut elit facilisis leo sem pharetra consequat. Dolor nascetur adipiscing dolor quam, ultrices orci donec vestibulum, etiam sed diam diam, tincidunt gravida velit nonummy. Nisl mattis pharetra mauris, maecenas quis, ullamcorper mattis mi, auctor metus, ullamcorper auctor id. Id est libero donec, ac pulvinar nulla elit lacinia ac, erat dui nibh a ut pellentesque vel, a dui odio pellentesque varius nec, mauris fermentum id sit at.</p>\n","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, lectus quis elit eget mattis ut nunc, faucibus ut. Nunc neque maecenas nec adipiscing, sit nunc consequat consequat duis vulputate, donec lorem quam mi. Orci mi. Eu nulla ante enim, justo tempor, praesent ut bibendum erat etiam leo nisl, ut quis molestie, congue dui vehicula nunc. Id at phasellus pede vel faucibus a, integer cras ligula eget, mauris et eros luctus lectus, sed nullam, venenatis dignissim pulvinar a elementum. Purus cras, porta eu amet lacus massa dui, eu amet pulvinar eu tristique.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Magna sit eleifend, adipiscing accumsan consequat suspendisse ac ipsum enim, sodales ac commodo dignissim scelerisque neque, mi ut pede nisl in porttitor nec. Sed augue, est est quisque imperdiet consequatur vel fermentum, wisi sagittis donec, nascetur vestibulum, suspendisse a non placerat conubia ut. Et sed etiam mauris. Tellus justo rhoncus tortor justo ac porttitor, congue consectetuer vitae vulputate. A lacus diam tristique ut habitant, etiam porta, mi sit eu sagittis, ultrices non. Malesuada faucibus sed risus porta massa, eros laoreet quis non, cras ut tellus ex dolor quis semper, vel id auctor. Id porta minima, lacinia vel mi, sapien metus justo volutpat, id hac dui sodales suspendisse, consequat vel. Vitae blandit tellus ornare curabitur, nunc vitae, vitae in nec vel enim interdum gravida. Ut elit facilisis leo sem pharetra consequat. Dolor nascetur adipiscing dolor quam, ultrices orci donec vestibulum, etiam sed diam diam, tincidunt gravida velit nonummy. Nisl mattis pharetra mauris, maecenas quis, ullamcorper mattis mi, auctor metus, ullamcorper auctor id. Id est libero donec, ac pulvinar nulla elit lacinia ac, erat dui nibh a ut pellentesque vel, a dui odio pellentesque varius nec, mauris fermentum id sit at.</p>\n","","tin-tuc-1.html","","","","",""),
("7","7","vn","Video #1","Video #1","RoU2I0gx3AQ","RoU2I0gx3AQ","","","","video-1.html","","","","",""),
("8","8","vn","Video #2","Video #2","3cJFEnGahPM","3cJFEnGahPM","","","","video-2.html","","","","",""),
("9","9","vn","Video #3","Video #3","Z9WoL7v3Yz8","Z9WoL7v3Yz8","","","","video-3.html","","","","",""),
("10","10","vn","Video #4","Video #4","Cc20DMHLLc4","Cc20DMHLLc4","","","","video-4.html","","","","",""),
("11","11","vn","Video #5","Video #5","tkXr-V87Z1I","tkXr-V87Z1I","","","","video-5.html","","","","",""),
("12","12","vn","Video #6","Video #6","AjCld7dSbKo","AjCld7dSbKo","","","","video-6.html","","","","",""),
("13","13","vn","Video #7","Video #7","uvXsEoqg6V8","uvXsEoqg6V8","","","","video-7.html","","","","",""),
("14","14","vn","L??????p d?????? ????n #11","Lap du an #11","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","","lap-du-an-11.html","","","","",""),
("15","15","vn","Chung c???? #1","Chung cu #1","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl.","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl.","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","","chung-cu-1.html","","","","",""),
("16","16","vn","Chung c???? #2","Chung cu #2","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","","chung-cu-2.html","","","","",""),
("17","17","vn","Chung c???? #3","Chung cu #3","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","","chung-cu-3.html","","","","",""),
("18","18","vn","Chung c???? #4","Chung cu #4","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat.","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat.","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","","chung-cu-4.html","","","","",""),
("19","19","vn","Chung c???? #5","Chung cu #5","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","<span style=\"font-family:arial,helvetica,sans-serif;\"></span><span style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif;\">Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</span>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","<span style=\"font-family:arial,helvetica,sans-serif;\"></span><span style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif;\">Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</span>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","","chung-cu-5.html","","","","",""),
("20","20","vn","Chung c???? #6","Chung cu #6","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis.","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Lorem ipsum dolor sit amet, vestibulum pharetra velit sed nisl. Nostra ligula facilisis a feugiat nulla vel, nec leo in sociis. Dis elit et scelerisque sodales eget integer, massa cursus interdum nec ridiculus, donec mauris lectus erat, donec pede hendrerit erat a nec. Vitae ligula adipiscing donec vel, conubia rutrum justo diam vestibulum, vel malesuada in donec, tortor phasellus irure et. Porta suscipit donec dis volutpat volutpat, semper aenean aliquet eleifend id, ut in. Integer dictum arcu suspendisse vehicula ipsum, mauris sociis varius convallis rutrum, donec vivamus et vel non, pellentesque non amet per vehicula vitae orci, facilisis vestibulum at cursus. Venenatis et et risus placerat.</p>\n<p align=\"justify\" style=\"color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; margin-bottom: 0px;\">\n	Nam a vestibulum eros integer mi imperdiet, mattis lectus vel enim nunc, pede a eget praesent et vel felis, purus libero lorem, tellus eget et aliquam vestibulum posuere. Luctus eros, in vestibulum massa nulla sed nam, ac litora nulla, cum etiam lorem condimentum nobis sagittis sed. Imperdiet enim parturient ultrices, fusce non aut donec. Vivamus luctus tortor luctus orci, vel ac, aptent natoque posuere sed luctus convallis. Sociosqu eu, eros at sodales suscipit magna pellentesque. Aliquam velit dapibus augue sodales natoque, justo vitae, mi erat vestibulum. Vitae maecenas suspendisse mollis, non placerat commodo diam maecenas, curabitur eros auctor elementum elit porttitor. Nam pede pulvinar per non etiam, leo eleifend adipiscing pulvinar adipiscing quam turpis. Placerat magna quisque molestie, ornare feugiat ipsum eleifend consequat mauris. Eget eget fringilla.</p>\n","","chung-cu-6.html","","","","","");




CREATE TABLE `post_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `lang_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `post_meta_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thu_tu` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rows` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  `post_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idmenu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `postcat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cat` int(5) NOT NULL,
  `hien_thi` int(2) NOT NULL,
  `noi_bat` int(1) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL,
  `dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO postcat VALUES
("2","0","1","0","1","","1","","post"),
("3","0","1","0","1","","1","","post"),
("4","2","1","0","1","","2","","post"),
("5","2","1","0","2","","2","","post"),
("6","2","1","0","3","","2","","post"),
("7","3","1","0","1","","2","","post"),
("8","3","1","0","2","","2","","post"),
("9","3","1","0","3","","2","","post"),
("100","0","1","0","1","10-tu-van-thiet-ke.jpg","1","2017-10/postcat/","catproduct"),
("11","0","1","0","2","11-tu-van-quan-ly-du-an-va-giam-sat.jpg","1","2017-09/postcat/","catproduct"),
("12","0","1","0","3","12-khao-sat-do-dac-thi-cong-xay-dung-nen-mong-.jpg","1","2017-09/postcat/","catproduct"),
("13","10","1","0","1","13-lap-du-an.jpg","2","2017-09/postcat/","catproduct"),
("14","10","1","0","2","14-thiet-ke-quy-hoach.jpg","2","2017-09/postcat/","catproduct"),
("15","10","1","0","3","15-thiet-ke-kien-truc.jpg","2","2017-09/postcat/","catproduct"),
("16","10","1","0","4","16-dich-vu-giay-phep.jpg","2","2017-09/postcat/","catproduct"),
("17","15","1","0","1","17-chung-cu.jpg","3","2017-09/postcat/","catproduct"),
("18","15","1","0","2","18-van-phong.jpg","3","2017-09/postcat/","catproduct"),
("19","15","1","0","3","19-khach-san-resort.jpg","3","2017-09/postcat/","catproduct"),
("20","15","1","0","4","20-giao-duc.jpg","3","2017-09/postcat/","catproduct"),
("21","15","1","0","5","21-van-hoa-the-thao.jpg","3","2017-09/postcat/","catproduct"),
("22","15","1","0","6","22-trung-tam-thuong-mai.jpg","3","2017-09/postcat/","catproduct"),
("23","15","1","0","7","23-cong-trinh-nong-nghiep.jpg","3","2017-09/postcat/","catproduct"),
("24","11","1","0","1","24-tham-tra-thiet-ke-va-du-toan.jpg","2","2017-09/postcat/","catproduct"),
("25","11","1","0","2","25-danh-gia-tac-dong-moi-truong.jpg","3","2017-09/postcat/","catproduct"),
("26","11","1","0","3","26-tu-van-dau-thau.jpg","2","2017-09/postcat/","catproduct"),
("27","11","1","0","4","27-giam-sat-thi-cong.jpg","2","2017-09/postcat/","catproduct"),
("28","11","1","0","5","28-quan-ly-du-an.jpg","2","2017-09/postcat/","catproduct"),
("29","11","1","0","6","29-chung-nhan-phu-hop.jpg","2","2017-09/postcat/","catproduct"),
("30","11","1","0","7","30-kiem-dinh-chat-luong.jpg","2","2017-09/postcat/","catproduct"),
("31","12","1","0","1","31-do-dac-dia-hinh-va-lap-ban-do.jpg","2","2017-09/postcat/","catproduct"),
("32","12","1","0","2","32-thi-cong-xay-dung-nen-mong.jpg","2","2017-09/postcat/","catproduct"),
("33","12","1","0","3","33-khao-sat-dia-chat.jpg","2","2017-09/postcat/","catproduct"),
("34","0","1","0","0","","1","","video");




CREATE TABLE `postcat_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcat_id` int(11) NOT NULL,
  `lang_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_seo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;


INSERT INTO postcat_lang VALUES
("2","2","vn","Tin t??????c","tin-tuc","","","",""),
("3","3","vn","G????c t???? v??????n","goc-tu-van","","","",""),
("4","4","vn","Tin t??????c Nagecco","tin-tuc-nagecco","","","",""),
("5","5","vn","Quan h??????? c??????? ?????????ng","quan-he-co-dong","","","",""),
("6","6","vn","Tin t??????c t???????ng h??????p","tin-tuc-tong-hop","","","",""),
("7","7","vn","Thi??????t k??????","thiet-ke","","","",""),
("8","8","vn","Qu??????n l???? d?????? ????n v???? gi????m s????t","quan-ly-du-an-va-giam-sat","","","",""),
("9","9","vn","Kh??????o s????t - ?????o ???????????c - thi c????ng x????y d??????ng n??????n m????ng","khao-sat-do-dac-thi-cong-xay-dung-nen-mong-9","","","",""),
("34","34","vn","Th???? vi???????n video","thu-vien-video","","","",""),
("10","100","vn","T???? v??????n thi??????t k??????","tu-van-thiet-ke","","","",""),
("11","11","vn","T???? v??????n qu??????n l???? d?????? ????n v???? gi????m s????t","tu-van-quan-ly-du-an-va-giam-sat","","","",""),
("12","12","vn","Kh??????o s????t - ?????o ???????????c - thi c????ng x????y d??????ng n??????n m????ng","khao-sat-do-dac-thi-cong-xay-dung-nen-mong","","","",""),
("13","13","vn","L??????p d?????? ????n","lap-du-an","","","",""),
("14","14","vn","Thi??????t k?????? quy ho??????ch","thiet-ke-quy-hoach","","","",""),
("15","15","vn","Thi??????t k?????? ki??????n tr????c","thiet-ke-kien-truc","","","",""),
("16","16","vn","D???????ch v?????? gi??????y ph????p","dich-vu-giay-phep","","","",""),
("17","17","vn","Chung c????","chung-cu","","","",""),
("18","18","vn","V????n ph????ng","van-phong","","","",""),
("19","19","vn","Kh????ch s??????n - Resort","khach-san-resort","","","",""),
("20","20","vn","Gi????o d??????c","giao-duc","","","",""),
("21","21","vn","V????n h????a - Th?????? thao","van-hoa-the-thao","","","",""),
("22","22","vn","Trung t????m th????????ng m??????i","trung-tam-thuong-mai","","","",""),
("23","23","vn","C????ng tr????nh n????ng nghi???????p","cong-trinh-nong-nghiep","","","",""),
("24","24","vn","Th??????m tra thi??????t k?????? v???? d?????? to????n","tham-tra-thiet-ke-va-du-toan","","","",""),
("25","25","vn","????????nh gi???? t????c ????????????ng m????i tr??????????ng","danh-gia-tac-dong-moi-truong","","","",""),
("26","26","vn","T???? v??????n ???????????u th??????u","tu-van-dau-thau","","","",""),
("27","27","vn","Gi????m s????t thi c????ng","giam-sat-thi-cong","","","",""),
("28","28","vn","Qu??????n l???? d?????? ????n","quan-ly-du-an","","","",""),
("29","29","vn","Ch??????ng nh??????n ph???? h??????p","chung-nhan-phu-hop","","","",""),
("30","30","vn","Ki??????m ????????????nh ch??????t l??????????ng","kiem-dinh-chat-luong","","","",""),
("31","31","vn","????o ???????????c ????????????a h????nh v???? l??????p b??????n ????????????","do-dac-dia-hinh-va-lap-ban-do","","","",""),
("32","32","vn","Thi c????ng x????y d??????ng n??????n m????ng","thi-cong-xay-dung-nen-mong","","","",""),
("33","33","vn","Kh??????o s????t ????????????a ch??????t","khao-sat-dia-chat","","","",""),
("35","2","en","News","news","","","",""),
("36","3","en","Consultation","consultation","","","","");




CREATE TABLE `slug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `post_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;


INSERT INTO slug VALUES
("64","21","catproduct_detail","text.html",""),
("6","2","post","tin-tuc",""),
("7","3","post","goc-tu-van",""),
("8","4","post","tin-tuc-nagecco",""),
("9","5","post","quan-he-co-dong",""),
("10","6","post","tin-tuc-tong-hop",""),
("11","7","post","thiet-ke",""),
("12","8","post","quan-ly-du-an-va-giam-sat",""),
("13","9","post","khao-sat-do-dac-thi-cong-xay-dung-nen-mong-9",""),
("14","10","catproduct","tu-van-thiet-ke",""),
("15","11","catproduct","tu-van-quan-ly-du-an-va-giam-sat",""),
("16","12","catproduct","khao-sat-do-dac-thi-cong-xay-dung-nen-mong",""),
("17","13","catproduct","lap-du-an",""),
("18","14","catproduct","thiet-ke-quy-hoach",""),
("19","15","catproduct","thiet-ke-kien-truc",""),
("20","16","catproduct","dich-vu-giay-phep",""),
("21","17","catproduct","chung-cu",""),
("22","18","catproduct","van-phong",""),
("23","19","catproduct","khach-san-resort",""),
("24","20","catproduct","giao-duc",""),
("25","21","catproduct","van-hoa-the-thao",""),
("26","22","catproduct","trung-tam-thuong-mai",""),
("27","23","catproduct","cong-trinh-nong-nghiep",""),
("28","24","catproduct","tham-tra-thiet-ke-va-du-toan",""),
("29","25","catproduct","danh-gia-tac-dong-moi-truong",""),
("30","26","catproduct","tu-van-dau-thau",""),
("31","27","catproduct","giam-sat-thi-cong",""),
("32","28","catproduct","quan-ly-du-an",""),
("33","29","catproduct","chung-nhan-phu-hop",""),
("34","30","catproduct","kiem-dinh-chat-luong",""),
("35","31","catproduct","do-dac-dia-hinh-va-lap-ban-do",""),
("36","32","catproduct","thi-cong-xay-dung-nen-mong",""),
("37","33","catproduct","khao-sat-dia-chat",""),
("38","5","post_detail","khoi-cong-du-an-muong-thanh-hotel.html",""),
("39","6","post_detail","tin-tuc-1.html",""),
("45","34","video","thu-vien-video",""),
("46","7","video_detail","video-1.html",""),
("47","8","video_detail","video-2.html",""),
("48","9","video_detail","video-3.html",""),
("49","10","video_detail","video-4.html",""),
("50","11","video_detail","video-5.html",""),
("51","12","video_detail","video-6.html",""),
("52","13","video_detail","video-7.html",""),
("55","14","catproduct_detail","lap-du-an-11.html",""),
("56","15","catproduct_detail","chung-cu-1.html",""),
("57","16","catproduct_detail","chung-cu-2.html",""),
("58","17","catproduct_detail","chung-cu-3.html",""),
("59","18","catproduct_detail","chung-cu-4.html",""),
("60","19","catproduct_detail","chung-cu-5.html",""),
("61","20","catproduct_detail","chung-cu-6.html",""),
("62","2","post","news",""),
("63","3","post","consultation","");




CREATE TABLE `vn_bien` (
  `key_name` varchar(32) NOT NULL,
  `gia_tri` text NOT NULL,
  `nhom` varchar(50) NOT NULL,
  `lang` varchar(5) NOT NULL DEFAULT 'none',
  `ten` varchar(50) NOT NULL,
  `sort` int(3) NOT NULL,
  PRIMARY KEY (`key_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO vn_bien VALUES
("meta_author_vn","Huy Dung","GENERAL","vn","Author","4"),
("meta_copyright_vn","Copyright ???? 2017 Ki??????u ph????????ng Spa, All Rights Reserved ","GENERAL","vn","Copyright","7"),
("meta_description_vn","Ki??????u ph????????ng Spa","GENERAL","vn","Decription","5"),
("meta_keywords_vn","Ki??????u ph????????ng Spa","GENERAL","vn","Keywords","6"),
("title_vn","Ki??????u ph????????ng Spa ","GENERAL","vn","Title","1"),
("linh1","https://plus.google.com/ 1","SOCIAL","none","Google 1","0"),
("link2","","SOCIAL","none","Yahoo","0"),
("link3","Vui l????ng ??????????? l??????i th????ng tin, chuy????n vi????n t???? v??????n c??????a ch????ng t????i s?????? li????n h???????, t???? v??????n v???? g??????i th????ng tin cho Qu???? v??????? trong th??????i gian nhanh nh??????t.","SOCIAL","none","Skyper","0"),
("link4","https://www.facebook.com/imdb","SOCIAL","none","Facebook","0"),
("link5","https://www.twitter.com/","SOCIAL","none","Twitter","0"),
("maps","10.807224, 106.639261","MAPS","none","T??????a ???????????? b??????n ????????????","0"),
("title_en","Kieu phuong spa","GENERAL","en","Title","1"),
("hotline1","0905 090 905","PHONE","none","Hotline 1","0"),
("hotline2","0905 000 000","PHONE","none","Hotline 2","0"),
("address_vn","53 Nguy???????n V????n Linh, Qu??????n H??????i Ch????u, TP ???????? N??????ng","GENERAL","vn","Address","2"),
("email_transport","noreplay365@gmail.com","PHPMAILER","none","Email Transport","0"),
("pass_transport","Vinadesign@365d235","PHPMAILER","none","Pass Transport","0"),
("company_en","Ki??????u ph????????ng Spa","GENERAL","en","Company","3"),
("company_vn","Ki??????u ph????????ng Spa","GENERAL","vn","Company","3"),
("address_en","53 Nguy???????n V????n Linh, Qu??????n H??????i Ch????u, TP ???????? N??????ng","GENERAL","en","Address","2"),
("EMAIL11","","MAIL","none","Email 2","0"),
("MAIL1","","MAIL","none","Email 1","0"),
("meta_copyright_en","c","GENERAL","en","Copyright","6"),
("meta_keywords_en","b","GENERAL","en","Keywords","5"),
("meta_description_en","a","GENERAL","en","Decription","4");




CREATE TABLE `vn_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL,
  `noi_bat` int(1) NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thu_tu` int(11) NOT NULL DEFAULT '1',
  `_product` int(1) DEFAULT '0',
  `_cms` int(1) NOT NULL DEFAULT '0',
  `_gallery` int(1) NOT NULL DEFAULT '0',
  `_file` int(1) NOT NULL DEFAULT '0',
  `_list` int(1) NOT NULL DEFAULT '0',
  `_project` int(1) NOT NULL DEFAULT '0',
  `_anhsp` int(1) NOT NULL DEFAULT '0',
  `_filesp` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


INSERT INTO vn_cat VALUES
("1","List","List","0","0","","1","0","0","0","0","1","0","0","0"),
("2","Gallery","Gallery","1","1","","1","0","0","1","0","0","0","0","0"),
("3","Album","Album","1","0","","1","0","0","0","0","0","0","1","0"),
("5","File Manager","","1","0","","1","0","0","0","1","0","0","0","0"),
("7","Th???? vi???????n","","1","0","","1","0","0","1","0","0","0","0","0"),
("9","Video","video","0","0","","1","0","0","0","0","0","0","0","1");




CREATE TABLE `vn_danhgia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `danhgia` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `kiem_duyet` int(1) NOT NULL DEFAULT '0',
  `noi_dung` text NOT NULL,
  `traloi` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `cat` int(11) NOT NULL,
  `luot_xem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;


INSERT INTO vn_danhgia VALUES
("1","B????i quang t????n","","5","1502870762","0","1","<p>Hihi em th&iacute;ch b&agrave;i h??????c n&agrave;y r??????t chi ti??????t v&agrave; ???????????y ???????????. Ch??????c ph??????i h??????c m??????y ng&agrave;y m???????i h??????t ???????????????c. c&aacute;m ????n ??????.</p>\n","<p>C??????m ????n em</p>\n","buiquangtinit@gmail.com","25","0"),
("2","Nguy???????n th??????? t??????????ng nga","","4","1502871995","0","1","<p>R??????t ?????????n gi??????n, x&uacute;c t&iacute;ch, d??????? hi??????u. Bi??????t c&aacute;ch l&ecirc;n n???????i dung, v&agrave; x?????? l&yacute; ph??????n m??????m h??????? tr?????? m???????t c&aacute;ch hi???????u qu??????.</p>\n","","tuongngaqt@gmail.com","25","0"),
("9","B????i Quang T????n","","3","1504154291","0","1","<p>ok ok</p>\n","","buiquangtinit@gmail.com","25","0"),
("8","B????i Quang T????n","","4","1504153657","0","1","<p>R??????t ok</p>\n","","buiquangtinit@gmail.com","25","0");




CREATE TABLE `vn_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `chu_thich` text NOT NULL,
  `file` varchar(255) DEFAULT 'no',
  `file_size` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `gia` double DEFAULT NULL,
  `time` int(11) NOT NULL,
  `luot_tai` int(11) NOT NULL DEFAULT '0',
  `noi_bat` int(1) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `vn_doc_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(20) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `vn_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'no',
  `file_size` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `noi_bat` int(1) NOT NULL,
  `loai` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  `luot_xem` int(11) NOT NULL DEFAULT '0',
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `vn_file_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `lang_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lien_ket` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `vn_file_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `post_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `vn_file_menu_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_menu_id` int(11) NOT NULL,
  `lang_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `vn_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'no',
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `noi_bat` int(1) NOT NULL,
  `loai` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  `luot_xem` int(11) NOT NULL DEFAULT '0',
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thu_tu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;


INSERT INTO vn_gallery VALUES
("1","1","1-trai-nghiem-hoc-tap-khong-gioi-han.jpg","1","0","0","1501635576","5","0","media_gal/","4"),
("2","1","2-trai-nghiem-hoc-tap-khong-gioi-han.jpg","1","0","0","1501635588","5","0","media_gal/","0"),
("3","1","3-trai-nghiem-hoc-tap-khong-gioi-han1.jpg","1","0","0","1501635592","5","0","media_gal/","2"),
("4","2","4-wxua7e.jpg","1","0","0","1502093008","5","0","media_gal/","0"),
("5","2","5-xhrca7.jpg","1","0","0","1502093008","5","0","media_gal/","0"),
("6","2","6-icqu1g.jpg","1","0","0","1502093008","5","0","media_gal/","0"),
("7","3","7-clzapj.jpg","1","0","0","1502093019","5","0","media_gal/","0"),
("8","3","8-8uxo5e.jpg","1","0","0","1502093019","5","0","media_gal/","0"),
("9","4","9-8a3oky.jpg","1","0","0","1502093029","5","0","media_gal/","0"),
("10","4","10-z220sp.jpg","1","0","0","1502093029","5","0","media_gal/","0"),
("11","4","11-4kqgr9.jpg","1","0","0","1502093029","5","0","media_gal/","0"),
("12","5","12-yva9ci.jpg","1","0","0","1502093039","5","0","media_gal/","0"),
("14","5","14-dbwgwo.jpg","1","0","0","1502093039","5","0","media_gal/","0"),
("15","5","15-q1wk5x.jpg","1","0","0","1502093039","5","0","media_gal/","0"),
("17","6","17-0img-gt.jpg","1","0","0","1505448234","5","0","media_gal/","0"),
("18","6","18-1img-gt1.jpg","1","0","0","1505448234","5","0","media_gal/","0"),
("19","6","19-2img-gt2.jpg","1","0","0","1505448234","5","0","media_gal/","0"),
("20","6","20-3img-gt3.jpg","1","0","0","1505448234","5","0","media_gal/","0"),
("21","7","21-ati0oy.jpg","1","0","0","1505465201","5","0","media_gal/","6"),
("22","7","22-bwgp29.jpg","1","0","0","1505465201","5","0","media_gal/","5"),
("23","7","23-0js86g.jpg","1","0","0","1505465201","5","0","media_gal/","4"),
("24","7","24-jbx5g9.jpg","1","0","0","1505465205","5","0","media_gal/","3"),
("25","7","25-ugocq5.jpg","1","0","0","1505465205","5","0","media_gal/","2"),
("26","7","26-dejtcu.jpg","1","0","0","1505465205","5","0","media_gal/","0"),
("27","7","27-jqeeya.jpg","1","0","0","1505465212","5","0","media_gal/","1"),
("28","8","28-02.jpg","1","0","0","1505698496","5","0","media_gal/","0"),
("29","8","29-02.jpg","1","0","0","1505699771","5","0","media_gal/","0"),
("30","8","30-02.jpg","1","0","0","1505700671","5","0","media_gal/","0"),
("31","8","31-02.jpg","1","0","0","1505701421","5","0","media_gal/","0"),
("33","8","33-02.jpg","1","0","0","1505719073","5","0","media_gal/","0"),
("34","8","34-02.jpg","1","0","0","1505743431","5","0","media_gal/","0"),
("35","8","35-02.jpg","1","0","0","1505788930","5","0","media_gal/","0");




CREATE TABLE `vn_gallery_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `lang_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lien_ket` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;


INSERT INTO vn_gallery_lang VALUES
("1","1","vn","Tr??????i nghi???????m h??????c t??????p kh????ng gi???????i h??????n","","",""),
("2","1","en","Z408JM","","",""),
("3","2","vn","Tr??????i nghi???????m h??????c t??????p kh????ng gi???????i h??????n","","",""),
("4","2","en","DZGOU6","","",""),
("5","3","vn","Tr??????i nghi???????m h??????c t??????p kh????ng gi???????i h??????n1","","",""),
("6","3","en","K7T6Y5","","",""),
("7","4","vn","WXUA7E","","",""),
("8","4","en","WXUA7E","","",""),
("9","5","vn","XHRCA7","","",""),
("10","5","en","XHRCA7","","",""),
("11","6","vn","ICQU1G","","",""),
("12","6","en","ICQU1G","","",""),
("13","7","vn","CLZAPJ","","",""),
("14","7","en","CLZAPJ","","",""),
("15","8","vn","8UXO5E","","",""),
("16","8","en","8UXO5E","","",""),
("17","9","vn","8A3OKY","","",""),
("18","9","en","8A3OKY","","",""),
("19","10","vn","Z220SP","","",""),
("20","10","en","Z220SP","","",""),
("21","11","vn","4KQGR9","","",""),
("22","11","en","4KQGR9","","",""),
("23","12","vn","YVA9CI","","",""),
("24","12","en","YVA9CI","","",""),
("27","14","vn","DBWGWO","","",""),
("28","14","en","DBWGWO","","",""),
("29","15","vn","Q1WK5X","","",""),
("30","15","en","Q1WK5X","","",""),
("33","17","vn","HZVVJ3","","",""),
("34","18","vn","X3V2RM","","",""),
("35","19","vn","0OUZ43","","",""),
("36","20","vn","Z1R2IC","","",""),
("37","21","vn","ATI0OY","","",""),
("38","22","vn","BWGP29","","",""),
("39","23","vn","0JS86G","","",""),
("40","24","vn","JBX5G9","","",""),
("41","25","vn","UGOCQ5","","",""),
("42","26","vn","DEJTCU","","",""),
("43","27","vn","JQEEYA","","",""),
("44","28","vn","Banner trang li????n h???????","","",""),
("45","29","vn","Banner trang tin t??????c & tuy??????n d??????ng","","",""),
("46","30","vn","Banner trang gi???????i thi???????u","","",""),
("47","31","vn","Banner t???? v??????n - thi??????t k?????? & nguy????n c??????u","","",""),
("49","33","vn","Banner trang s??????n ph??????m","","",""),
("50","34","vn","Banner trang chi ti??????t s??????n ph??????m","","",""),
("51","35","vn","Banner trang gi?????? h????ng","","","");




CREATE TABLE `vn_gallery_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thu_tu` int(11) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `post_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO vn_gallery_menu VALUES
("1","2","1","1","no","catgal"),
("2","7","1","1","no",""),
("3","7","2","1","no",""),
("4","7","3","1","no",""),
("5","7","4","1","no",""),
("6","2","2","1","no","catgal"),
("7","2","3","1","no","catgal"),
("8","2","4","1","no","catgal");




CREATE TABLE `vn_gallery_menu_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_menu_id` int(11) NOT NULL,
  `lang_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;


INSERT INTO vn_gallery_menu_lang VALUES
("1","1","vn","Slide Trang Ch??????","","slide-trang-chu"),
("2","2","vn","Th???? vi???????n #1","","thu-vien-#1"),
("3","2","en","Gallery #1","","gallery-#1"),
("4","3","vn","Th???? vi???????n #2","","thu-vien-#2"),
("5","3","en","Gallery #2","","gallery-#2"),
("6","4","vn","Th???? vi???????n #3","","thu-vien-#3"),
("7","4","en","Gallery #3","","gallery-#3"),
("8","5","vn","Th???? vi???????n #4","","thu-vien-#4"),
("9","5","en","Gallery #4","","gallery-#4"),
("10","6","vn","H????nh anh cho ?????o??????n gi???????i thi???????u trang ch??????","","hinh-anh-cho-doan-gioi-thieu-trang-chu"),
("11","7","vn","Slide ????????????i t????c","","slide-doi-tac"),
("12","8","vn","Banner Trang Con","","banner-trang-con");




CREATE TABLE `vn_gianhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dien_thoai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kiem_duyet` int(1) NOT NULL DEFAULT '0',
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `vn_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;


INSERT INTO vn_mail VALUES
("1","buiquangtinit@gmail.com","1501740772"),
("2","buiquangtinit@gmail.com","1501741679"),
("3","buiquangtinit@gmail.com","1501741708"),
("4","buiquangtinit@gmail.com","1501741750"),
("5","buiquangtinit@gmail.com","1501742275"),
("6","buiquangtinit@gmail.com","1501742442"),
("7","buiquangtinit@gmail.com","1501742451"),
("8","buiquangtinit@gmail.com","1501742464"),
("9","buiquangtinit@gmail.com","1501742581"),
("10","buiquangtinit@gmail.com","1501742604"),
("11","buiquangtinit@gmail.com","1501742629"),
("12","buiquangtinit@gmail.com","1501742630"),
("13","buiquangtinit@gmail.com","1501742638"),
("14","buiquangtinit@gmail.com","1501742695"),
("15","buiquangtinit@gmail.com","1501742726"),
("16","buiquangtinit@gmail.com","1501742776"),
("17","buiquangtinit@gmail.com","1501742786"),
("18","buiquangtinit@gmail.com","1501742803"),
("19","buiquangtinit@gmail.com","1501742832"),
("20","buiquangtinit@gmail.com","1501742849"),
("21","buiquangtinit@gmail.com","1501742898");




CREATE TABLE `vn_menu` (
  `menu_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cat` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_cat` int(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_link` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO vn_menu VALUES
("p6","0","page","1","trang-chu.html","Trang ch??????","1"),
("p8","0","page","1","gioi-thieu.html","Gi???????i thi???????u","2"),
("p9","p8","page","1","gioi-thieu-chung.html","Gi???????i thi???????u chung","0"),
("p10","p8","page","1","tuyen-ngon-chat-luong.html","Tuy????n ng????n ch??????t l??????????ng","0"),
("p11","p8","page","1","qua-trinh-hinh-thanh.html","Qu???? tr????nh h????nh th????nh","0"),
("p12","p8","page","1","so-do-to-chuc.html","S???? ???????????? t??????? ch??????c","0"),
("p100","0","page","1","san-pham.html","S??????n ph??????m","2"),
("100","p100","postcat","1","tu-van-thiet-ke","T???? v??????n thi??????t k??????","0"),
("11","p100","postcat","1","tu-van-quan-ly-du-an-va-giam-sat","T???? v??????n qu??????n l???? d?????? ????n v???? gi????m s????t","0"),
("12","p100","postcat","1","khao-sat-do-dac-thi-cong-xay-dung-nen-mong","Kh??????o s????t - ?????o ???????????c - thi c????ng x????y d??????ng n??????n m????ng","0"),
("3","0","postcat","1","goc-tu-van","G????c t???? v??????n","0"),
("7","3","postcat","1","thiet-ke","Thi??????t k??????","0"),
("8","3","postcat","1","quan-ly-du-an-va-giam-sat","Qu??????n l???? d?????? ????n v???? gi????m s????t","0"),
("9","3","postcat","1","khao-sat-do-dac-thi-cong-xay-dung-nen-mong-9","Kh??????o s????t - ?????o ???????????c - thi c????ng x????y d??????ng n??????n m????ng","0"),
("2","0","postcat","2","tin-tuc","Tin t??????c","0"),
("4","2","postcat","2","tin-tuc-nagecco","Tin t??????c Nagecco","0"),
("5","2","postcat","2","quan-he-co-dong","Quan h??????? c??????? ?????????ng","0"),
("6","2","postcat","2","tin-tuc-tong-hop","Tin t??????c t???????ng h??????p","0"),
("p4","0","page","2","doi-tac.html","???????????i t????c","0"),
("p7","0","page","2","thu-vien.html","Th???? vi???????n","2"),
("p2","p7","page","2","hinh-anh.html","H????nh ??????nh","0"),
("p3","p7","page","2","video.html","Video","0"),
("p1","0","page","2","lien-he.html","Li????n h???????","0");




CREATE TABLE `vn_online` (
  `ip` varchar(255) NOT NULL DEFAULT '',
  `time` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) NOT NULL DEFAULT '',
  `agent` varchar(255) NOT NULL DEFAULT '',
  `user` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO vn_online VALUES
("127.0.0.1","1508337325","","Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/66.4.120 Chrome/60.4.3112.120 Safari/537.36","0");




CREATE TABLE `vn_online_daily` (
  `ngay` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bo_dem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO vn_online_daily VALUES
("28/08/2017","43"),
("29/08/2017","16"),
("30/08/2017","9"),
("31/08/2017","17"),
("05/09/2017","8"),
("06/09/2017","22"),
("07/09/2017","16"),
("08/09/2017","11"),
("09/09/2017","3"),
("11/09/2017","5"),
("12/09/2017","8"),
("14/09/2017","10"),
("15/09/2017","22"),
("17/09/2017","14"),
("18/09/2017","34"),
("19/09/2017","15"),
("20/09/2017","2"),
("21/09/2017","6"),
("22/09/2017","10"),
("24/09/2017","5"),
("25/09/2017","16"),
("26/09/2017","25"),
("27/09/2017","20"),
("28/09/2017","12"),
("29/09/2017","20"),
("11/10/2017","19"),
("12/10/2017","27"),
("13/10/2017","26"),
("14/10/2017","27"),
("16/10/2017","24"),
("17/10/2017","30"),
("18/10/2017","8");




CREATE TABLE `vn_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `luot_xem` int(11) DEFAULT '1',
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option1` int(11) NOT NULL,
  `post_type` varchar(50) NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `alias` varchar(100) NOT NULL,
  `home` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;


INSERT INTO vn_page VALUES
("1","1507795092","5","1","","","0","contact","1","","0"),
("2","1507795173","5","1","","","0","gallery","1","","0"),
("3","1507795185","5","1","","","0","video","1","","0"),
("4","1507795226","5","1","","","0","doi_tac","1","","0"),
("100","1507948327","5","1","","","1","page_none","1","","0"),
("6","1507948335","5","1","","","0","page_none","1","","1"),
("7","1507944620","5","1","","","1","page_none","1","","0"),
("8","1507948204","5","1","","","1","page_none","1","","0"),
("9","1508126685","5","1","","","0","about_us_detail","1","","0"),
("10","1507948447","5","1","","","0","about_us_detail","1","","0"),
("11","1507948445","5","1","","","0","about_us_detail","1","","0"),
("12","1507948444","5","1","","","0","about_us_detail","1","","0");




CREATE TABLE `vn_page_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `lang_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_seo` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;


INSERT INTO vn_page_lang VALUES
("1","1","vn","Li????n h???????","","","","","","","lien-he.html"),
("2","1","en","Contact us","","","","","","","contact-us.html"),
("3","2","vn","H????nh ??????nh","","","","","","","hinh-anh.html"),
("4","2","en","Gallery","","","","","","","gallery.html"),
("5","3","vn","Video","","","","","","","video.html"),
("6","3","en","Video","","","","","","","video-3.html"),
("7","4","vn","???????????i t????c","","","","","","","doi-tac.html"),
("8","4","en","Partner","","","","","","","partner.html"),
("9","100","vn","S??????n ph??????m","","","","","","","san-pham.html"),
("10","100","en","Products","","","","","","","products.html"),
("11","6","vn","Trang ch??????","","","","","","","trang-chu.html"),
("12","6","en","Home","","","","","","","home.html"),
("13","7","vn","Th???? vi???????n","","","","","","","thu-vien.html"),
("14","7","en","Library","","","","","","","library.html"),
("15","8","vn","Gi???????i thi???????u","","","","","","","gioi-thieu.html"),
("16","8","en","About us","","","","","","","about-us.html"),
("17","9","vn","Gi???????i thi???????u chung","","","","","","","gioi-thieu-chung.html"),
("18","10","vn","Tuy????n ng????n ch??????t l??????????ng","","","","","","","tuyen-ngon-chat-luong.html"),
("19","11","vn","Qu???? tr????nh h????nh th????nh","","","","","","","qua-trinh-hinh-thanh.html"),
("20","12","vn","S???? ???????????? t??????? ch??????c","","","","","","","so-do-to-chuc.html");




CREATE TABLE `vn_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `yahoo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tel` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hien_thi` int(1) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `luot_xem` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tieude` (`tieude`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `vn_thanh_vien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dien_thoai` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `trang_thai` int(1) NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL,
  `yahoo` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `ngay` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO vn_thanh_vien VALUES
("1","B????i Quang T????n","buiquangtinit@gmail.com","827ccb0eea8a706c4c34a16891f84e7b","0972696904","???????? n??????ng","1","1502961918","","","","17/08/2017");




CREATE TABLE `vn_trang_thai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trang_thai` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO vn_trang_thai VALUES
("1","13","1","1");




CREATE TABLE `vn_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'no',
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dien_thoai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dia_chi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `level` int(1) DEFAULT '0',
  `trang_thai` int(1) NOT NULL DEFAULT '0',
  `images` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `dir` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO vn_user VALUES
("5","coder","0ea4a0db010efd4ed3ca4ebee723b65c","B????i quang t????n","buiquangtinit@gmail.com","0972696904","???????? N??????ng","0","1","5-coder.jpg","1466390221","member/"),
("4","admin","21232f297a57a5a743894a0e4a801fc3","admin","admin@gmai.com","09999999999","???????? N??????ng","1","1","4-admin.jpg","1465871477","member/");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;