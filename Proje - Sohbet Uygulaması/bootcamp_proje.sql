-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 Ara 2022, 00:27:08
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bootcamp_proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int NOT NULL,
  `adi` varchar(255) NOT NULL,
  `sohbet` int NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `adi`, `sohbet`, `sifre`) VALUES
(1, 'Kubilay', 1, 'aaa'),
(2, 'Mehmet', 1, 'aaa'),
(3, 'Selçuk', 0, 'aaa'),
(5, 'Ahmet', 1, 'aaa'),
(9, 'Hakan', 1, 'aaa'),
(10, 'Muhammed', 1, 'aaa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `id` int NOT NULL,
  `gonderen` int NOT NULL,
  `alici` int NOT NULL,
  `mesaj` longtext NOT NULL,
  `zaman` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`id`, `gonderen`, `alici`, `mesaj`, `zaman`) VALUES
(36, 1, 2, 'Merhaba Mehmet, bu ilk deneme mesajım.', '1670026824'),
(37, 2, 1, 'Merhaba Kubilay, bu da benim ilk deneme mesajım.', '1670026852'),
(38, 2, 1, 'Hava bu gün çok güzeldi', '1670026889'),
(39, 2, 1, 'Yarın bir işim var', '1670026904'),
(40, 1, 2, 'Ahtapot', '1670026917'),
(41, 1, 2, 'Karides', '1670026942'),
(42, 1, 2, 'Balık', '1670026947'),
(43, 2, 1, 'Güzel', '1670026956'),
(44, 1, 3, 'Selçuk ile deneme 1', '1670026971'),
(45, 3, 1, 'Deneme mesajı 2', '1670026996'),
(46, 3, 1, 'bana daha fazla mesaj gönderemeyeceksin, sohbet özelliğimi kısa süreliğine devre dışı bırakıyorum', '1670027023'),
(47, 1, 5, 'Merhaba Ahmet', '1670027059'),
(48, 5, 1, 'Merhaba Kubilay', '1670027085'),
(49, 5, 2, 'Merhaba Mehmet', '1670027099'),
(50, 2, 5, 'Merhaba Ahmet', '1670027180');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adi` (`adi`);

--
-- Tablo için indeksler `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
