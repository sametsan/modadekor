-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 15 Eki 2022, 10:51:56
-- Sunucu sürümü: 10.3.36-MariaDB
-- PHP Sürümü: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `modarnet_tayfur`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `degisken` varchar(9999) NOT NULL,
  `deger` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

CREATE TABLE `galeri` (
  `no` int(11) NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `no` int(11) NOT NULL,
  `kno` int(11) NOT NULL,
  `kategori` varchar(99) NOT NULL,
  `sira` int(11) NOT NULL,
  `resim_no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `no` int(11) NOT NULL,
  `mesaj` text NOT NULL,
  `yazan` int(11) NOT NULL,
  `urun_no` int(11) NOT NULL,
  `uye_no` int(11) NOT NULL,
  `uye_ziyaret` int(11) NOT NULL,
  `yonetim_ziyaret` int(11) NOT NULL,
  `zaman` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemeler`
--

CREATE TABLE `odemeler` (
  `no` int(11) NOT NULL,
  `ad` varchar(99) NOT NULL,
  `aciklama` varchar(999) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `asgari` int(11) NOT NULL,
  `azami` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `online`
--

CREATE TABLE `online` (
  `ip` varchar(999) NOT NULL,
  `zaman` int(11) NOT NULL,
  `sayfa` varchar(99) NOT NULL,
  `geldigi_sayfa` varchar(999) NOT NULL,
  `tarayici` varchar(999) NOT NULL,
  `ad` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `no` int(11) NOT NULL,
  `uye` int(11) NOT NULL,
  `urun` int(11) NOT NULL,
  `adet` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `no` int(11) NOT NULL,
  `uye_no` int(11) NOT NULL,
  `durum` varchar(999) NOT NULL,
  `urun` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `tarih` varchar(99) NOT NULL,
  `saat` varchar(99) NOT NULL,
  `kargo_tarih` varchar(99) NOT NULL,
  `kargo_saat` varchar(99) NOT NULL,
  `kargo_sirket` varchar(99) NOT NULL,
  `kargo_no` varchar(99) NOT NULL,
  `aciklama` mediumtext NOT NULL,
  `odeme` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `no` int(11) NOT NULL,
  `kno` int(11) NOT NULL DEFAULT 0,
  `ad` varchar(99) DEFAULT NULL,
  `resim` varchar(999) DEFAULT NULL,
  `tanim` varchar(99) DEFAULT NULL,
  `aciklama` mediumtext DEFAULT NULL,
  `adet` int(11) NOT NULL DEFAULT 0,
  `eski_fiyat` int(11) NOT NULL DEFAULT 0,
  `fiyat` varchar(99) DEFAULT NULL,
  `indirim` int(11) NOT NULL DEFAULT 0,
  `begen` int(11) NOT NULL DEFAULT 0,
  `teslim_suresi` int(11) NOT NULL DEFAULT 0,
  `sayac` int(11) NOT NULL DEFAULT 0,
  `vitrin` int(11) NOT NULL DEFAULT 0,
  `vitrin_sira` int(11) NOT NULL DEFAULT 0,
  `slayt` int(11) NOT NULL DEFAULT 0,
  `sanalpazar` varchar(999) DEFAULT NULL,
  `gittigidiyor` varchar(999) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `no` int(11) NOT NULL,
  `ad` varchar(9999) NOT NULL,
  `soyad` varchar(999) NOT NULL,
  `kullanici` varchar(999) NOT NULL,
  `parola` varchar(999) NOT NULL,
  `telefon` varchar(999) NOT NULL,
  `eposta` varchar(99) NOT NULL,
  `adres` mediumtext NOT NULL,
  `sepet` mediumtext NOT NULL,
  `yetki` int(11) NOT NULL,
  `il` varchar(999) NOT NULL,
  `ilce` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`no`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`no`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`no`);

--
-- Tablo için indeksler `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`no`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`no`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`no`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`no`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`no`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `galeri`
--
ALTER TABLE `galeri`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
