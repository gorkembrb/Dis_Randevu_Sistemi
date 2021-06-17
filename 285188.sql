-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Haz 2021, 16:06:46
-- Sunucu sürümü: 10.3.22-MariaDB-log
-- PHP Sürümü: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `285188`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar`
--

CREATE TABLE `doktorlar` (
  `doktorid` int(11) NOT NULL,
  `doktoradi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `doktorsoyadi` varchar(25) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doktorlar`
--

INSERT INTO `doktorlar` (`doktorid`, `doktoradi`, `doktorsoyadi`) VALUES
(1, 'Mehmet', 'Elçi'),
(2, 'Feridun', 'Kalem'),
(3, 'Fatma', 'Kılınç'),
(4, 'Kazım', 'Kağan'),
(5, 'Derya', 'Toköz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kullaniciadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kullanicisoyadi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kullanicitc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `kullanicicinsiyet` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kullanicidogumtarihi` date NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullaniciadi`, `kullanicisoyadi`, `kullanicitc`, `kullanicicinsiyet`, `kullanicidogumtarihi`, `sifre`) VALUES
(13, 'Görkem', 'Berberoğlu', '12345678912', 'Erkek', '1999-12-21', 'd60134260958b6fdf0842597c00dbcde1e5d7ad709096698d6642c4c75279507');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

CREATE TABLE `randevu` (
  `randevuid` int(11) NOT NULL,
  `randevutc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `randevudoktoradi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `randevudoktorsoyadi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `randevutarih` date NOT NULL,
  `randevusaati` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`randevuid`, `randevutc`, `randevudoktoradi`, `randevudoktorsoyadi`, `randevutarih`, `randevusaati`) VALUES
(37, '12345678912', 'Mehmet', 'Elçi', '2021-06-22', '16:00:00'),
(38, '12345678912', 'Kazım', 'Kağan', '2021-06-24', '12:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD PRIMARY KEY (`doktorid`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanicitc` (`kullanicitc`);

--
-- Tablo için indeksler `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`randevuid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `doktorlar`
--
ALTER TABLE `doktorlar`
  MODIFY `doktorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
  MODIFY `randevuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
