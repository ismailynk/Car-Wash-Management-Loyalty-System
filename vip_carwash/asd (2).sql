-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 01 Mar 2023, 21:54:30
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `asd`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac`
--

DROP TABLE IF EXISTS `arac`;
CREATE TABLE IF NOT EXISTS `arac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plaka` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kadi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(11) COLLATE utf8_unicode_ci DEFAULT 'Girilmedi',
  `counter` int(11) DEFAULT '0',
  `durum` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `arac`
--

INSERT INTO `arac` (`id`, `plaka`, `model`, `kadi`, `tel`, `counter`, `durum`) VALUES
(4, '27YY137', 'Yusuf', 'yıldız', '05316960560', NULL, 0),
(5, '23KL444', 'Sedan', 'Hakkı Bulut', '05123698789', 12, 0),
(8, '31Mİ4040', 'sedan', 'ismail', 'Girilmedi', 1, 0),
(9, '50kl47', 'muhlis', 'clio', 'Girilmedi', 1, 0),
(10, '50nc137', 'kamyon', 'hasan', 'Girilmedi', 1, 0),
(32, '40kl076', 'hatchpack', 'ahmet', 'Girilmedi', 1, 0),
(33, '18kj78', 'sedan', 'ali', 'Girilmedi', 1, 0),
(34, '34uk456', 'sedan', 'akif', 'Girilmedi', 2, 0),
(35, '52HL127', 'HATCHBACK', 'BEKIR KARA', 'Girilmedi', 4, 0),
(36, '40DY167', 'şAHIN', 'AHMET YANıK', 'Girilmedi', 1, 0),
(37, '61KK457', 'RENAULT', 'SAMET KARA', 'Girilmedi', 1, 0),
(38, '40DY157', 'şAHIN', 'AHMET', 'Girilmedi', 2, 0),
(39, '40DY158', 'şAHIN', 'AHMET', '05364810020', 1, 0),
(40, '56456', '1123123', '123123123', '2313ffff', 28, 0),
(41, '12KK789', 'SEDAN', 'MEHMET', '023541', 1, 0),
(42, '45HH654', 'JIP', 'KAIHER', '456789', 2, 0),
(43, '23KZ2323', 'SMAO', 'KAMP', 'HJHJHJHJ', 0, 0),
(44, '78HY456', 'JIP', 'KASıM', 'Aralık', 2, 0),
(45, '23KL456', 'MALATYA', 'ELAZığ', 'kırşehit', 1, 0),
(46, '89DS567', 'KLJ', 'MNB', 'uıo', 2, 0),
(47, '40DF467', 'MERCEDES', 'HATİCE', '5364812250', 3, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

DROP TABLE IF EXISTS `hizmetler`;
CREATE TABLE IF NOT EXISTS `hizmetler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hizmet` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiyat` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `hizmet`, `fiyat`) VALUES
(9, 'İç TEMIZLIK', 250),
(3, 'Dış Yıkama', 50),
(4, 'Detaylı Temizlik', 50),
(8, 'KOLTUK YıKAMA', 600);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `islemler`
--

DROP TABLE IF EXISTS `islemler`;
CREATE TABLE IF NOT EXISTS `islemler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yid` int(11) NOT NULL,
  `had` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiyat` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `islemler`
--

INSERT INTO `islemler` (`id`, `yid`, `had`, `fiyat`) VALUES
(20, 56, 'İç TEMIZLIK', 75),
(21, 56, 'Dış Yıkama', 50),
(22, 56, 'Detaylı Temizlik', 50),
(23, 56, 'KOLTUK YıKAMA', 600),
(24, 57, 'İç TEMIZLIK', 100),
(25, 57, 'Dış Yıkama', 50),
(26, 57, 'Detaylı Temizlik', 50),
(27, 57, 'KOLTUK YıKAMA', 600),
(28, 58, 'İç TEMIZLIK', 100),
(29, 58, 'Dış Yıkama', 50),
(30, 59, 'İç TEMIZLIK', 250),
(31, 59, 'Dış Yıkama', 50),
(32, 59, 'KOLTUK YıKAMA', 600);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayıt`
--

DROP TABLE IF EXISTS `kayıt`;
CREATE TABLE IF NOT EXISTS `kayıt` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `aracid` int(11) NOT NULL,
  `Tarih` datetime DEFAULT NULL,
  `sayı` int(11) DEFAULT NULL,
  `durum` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `kayıt`
--

INSERT INTO `kayıt` (`id`, `aracid`, `Tarih`, `sayı`, `durum`) VALUES
(3, 4, '2001-03-10 17:16:18', 15, 0),
(4, 5, '2001-03-10 17:16:18', 2, 0),
(5, 4, '2001-03-10 17:16:18', 16, 1),
(6, 34, '2001-03-10 17:16:18', 2, 0),
(7, 35, '2001-03-10 17:16:18', 1, 0),
(8, 35, '2001-03-10 17:16:18', 2, 0),
(9, 35, '2001-03-10 17:16:18', 3, 0),
(10, 35, '2001-03-10 17:16:18', 4, 0),
(11, 37, '2001-03-10 17:16:18', 1, 0),
(12, 4, '2001-03-10 17:16:18', 17, 0),
(13, 5, '2022-03-18 18:00:25', 6, 0),
(14, 38, '2022-03-18 18:01:10', 2, 0),
(15, 39, '2022-03-18 18:01:27', 1, 0),
(16, 5, '2022-03-18 18:04:06', 10, 0),
(17, 5, '2022-03-18 18:04:23', 10, 1),
(18, 5, '2022-03-18 18:06:22', 10, 0),
(19, 5, '2022-03-18 18:06:32', 11, 0),
(20, 40, '2022-03-20 12:16:50', 1, 0),
(21, 40, '2022-03-20 12:17:21', 2, 0),
(22, 40, '2022-03-24 11:14:08', 3, 0),
(23, 40, '2022-03-24 11:15:05', 4, 0),
(24, 40, '2022-03-24 11:15:24', 5, 0),
(25, 41, '2022-03-24 11:16:49', 1, 0),
(26, 42, '2022-03-24 11:18:05', 1, 0),
(27, 44, '2022-03-24 12:39:22', 1, 0),
(28, 44, '2022-03-24 12:40:13', 2, 0),
(29, 40, '2022-03-24 12:40:48', 6, 0),
(30, 42, '2022-03-24 12:42:00', 2, 0),
(31, 45, '2022-03-24 12:42:30', 1, 0),
(32, 40, '2022-03-24 12:46:50', 7, 0),
(33, 40, '2022-03-24 12:47:31', 8, 0),
(34, 40, '2022-03-24 12:47:49', 9, 0),
(35, 46, '2022-03-24 12:48:40', 1, 0),
(36, 46, '2022-03-24 12:48:52', 2, 0),
(37, 40, '2022-03-26 15:20:23', 10, 0),
(38, 40, '2022-03-26 15:20:29', 11, 0),
(39, 40, '2022-03-26 15:20:33', 12, 0),
(40, 40, '2022-03-26 15:20:38', 13, 0),
(41, 40, '2022-03-26 15:23:20', 14, 0),
(42, 40, '2022-03-26 15:23:55', 15, 0),
(43, 40, '2022-03-26 15:29:44', 16, 0),
(44, 40, '2022-03-26 15:29:57', 17, 0),
(45, 40, '2022-03-26 15:30:33', 18, 0),
(46, 40, '2022-03-26 15:31:11', 19, 0),
(47, 40, '2022-03-26 15:32:24', 20, 0),
(48, 40, '2022-03-26 15:32:46', 21, 0),
(49, 40, '2022-03-26 15:33:35', 22, 0),
(50, 40, '2022-03-26 15:34:32', 23, 0),
(51, 40, '2022-03-26 15:42:44', 24, 0),
(52, 40, '2022-03-26 15:44:35', 25, 0),
(53, 40, '2022-03-26 15:45:03', 26, 0),
(54, 40, '2022-03-26 15:46:31', 27, 0),
(55, 40, '2022-03-26 15:49:39', 28, 0),
(56, 47, '2022-10-06 10:56:28', 1, 0),
(57, 47, '2022-12-29 09:31:45', 2, 0),
(58, 47, '2022-12-29 09:49:59', 3, 0),
(59, 5, '2022-12-29 09:55:23', 12, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
