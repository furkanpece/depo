-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 May 2023, 10:48:12
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `depo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alisfaturasi`
--

CREATE TABLE `alisfaturasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `urunadi` varchar(255) NOT NULL,
  `adet` varchar(255) NOT NULL,
  `fiyat` varchar(255) NOT NULL,
  `kdvsiztoplam` varchar(255) NOT NULL,
  `kdvoran` int(11) NOT NULL,
  `kdvtutar` varchar(255) NOT NULL,
  `kdvlitoplam` varchar(255) NOT NULL,
  `depo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anasayfa`
--

CREATE TABLE `anasayfa` (
  `id` int(11) NOT NULL,
  `üstbaslik` char(255) NOT NULL,
  `altbaslik` char(255) NOT NULL,
  `altbaslik2` char(255) NOT NULL,
  `altbaslik3` char(255) NOT NULL,
  `altbaslik4` char(255) NOT NULL,
  `altbaslik5` char(255) NOT NULL,
  `altbaslik6` char(255) NOT NULL,
  `altbaslik7` char(255) NOT NULL,
  `linkmetin` char(255) NOT NULL,
  `link` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `anasayfa`
--

INSERT INTO `anasayfa` (`id`, `üstbaslik`, `altbaslik`, `altbaslik2`, `altbaslik3`, `altbaslik4`, `altbaslik5`, `altbaslik6`, `altbaslik7`, `linkmetin`, `link`) VALUES
(1, 'Merhaba Depo Kontrol Merkezine Hoş Geldiniz Tek Ekrandan Deponuza Hakim Olun Hemen Üye Olup Deponuzu Kontrol Etmeye Başlayın', 'HADİ BAŞLIYALIM', 'İki farklı depo arasında malzemenizi bir depodan diğer depoya sistem üzerinden kolaylıkla transfer edebilirsiniz. Belgeler arasında kaybolmadan hem depolar arası transferin denetimini sağlar hem de hata ve gözden kaçmaların önüne geçebilirsiniz. Tüm depol', 'Tek Ekrandan Deponuza Hakim Olun, SatınAlma Süreçlerinizin Verimliliği Artsın !', 'YoneTeam SatınAlma Yazılımının Depo Yönetim Sistemi, SatınAlma süreci sonrasındaki işlemlerinizinin dijitalleşmesi yolundaki ilk adımınızdır. Tüm projelerinizdeki depoları tek ekrandan ilişkilendirin,kontrol edin, hakimiyet sizde olsun.  Teslim alınan mal', 'Depolar Arası Transfer Yapın', 'Hareket Dökümünü Raporlayın', 'Ürün Ekleyin', 'ÜYE OL', 'kayit');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birim`
--

CREATE TABLE `birim` (
  `id` int(10) UNSIGNED NOT NULL,
  `birimadi` varchar(50) NOT NULL,
  `kisaltma` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `birim`
--

INSERT INTO `birim` (`id`, `birimadi`, `kisaltma`) VALUES
(1, 'Adet', 'Ad'),
(2, 'Düzine', 'Dz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `depolar`
--

CREATE TABLE `depolar` (
  `id` int(10) UNSIGNED NOT NULL,
  `depoadi` text NOT NULL,
  `acilistarihi` varchar(55) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `depolar`
--

INSERT INTO `depolar` (`id`, `depoadi`, `acilistarihi`, `aciklama`) VALUES
(15, 'furkan', '2023-05-06 14:25', 'Kalitenin tek adresi'),
(18, 'barış', '2023-05-30 13:07', 'kalitenin tek adresi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `depotransfer`
--

CREATE TABLE `depotransfer` (
  `id` int(11) NOT NULL,
  `cikandepo` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `girendepo` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `miktar` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun` int(11) NOT NULL,
  `islemtarihi` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `depotransfer`
--

INSERT INTO `depotransfer` (`id`, `cikandepo`, `girendepo`, `miktar`, `urun`, `islemtarihi`) VALUES
(5, '15', '18', '25', 63, '2023-05-30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kdvler`
--

CREATE TABLE `kdvler` (
  `id` int(10) UNSIGNED NOT NULL,
  `kdvorani` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kdvler`
--

INSERT INTO `kdvler` (`id`, `kdvorani`) VALUES
(1, 18);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kadi` char(50) NOT NULL,
  `parola` char(50) NOT NULL,
  `yetki` tinyint(4) NOT NULL,
  `email` char(50) NOT NULL,
  `aktif` bit(1) NOT NULL DEFAULT b'1',
  `stokgrup` int(11) NOT NULL,
  `depo` int(11) NOT NULL,
  `transfer` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `birim` int(11) NOT NULL,
  `marka` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `kdv` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kadi`, `parola`, `yetki`, `email`, `aktif`, `stokgrup`, `depo`, `transfer`, `kategori`, `birim`, `marka`, `model`, `kdv`, `kullanici`) VALUES
(1, 'FURKAN PEÇE', '77f5473ccc1cbc0a1e3374b98662bb82', 1, 'furkanpece61furkanpece@gmail.com', b'1', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(22, 'barış çanka', 'e10adc3949ba59abbe56e057f20f883e', 2, 'barisbeb@gmail.com', b'1', 1, 1, 1, 0, 0, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `markalar`
--

CREATE TABLE `markalar` (
  `id` int(10) UNSIGNED NOT NULL,
  `markaadi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `markalar`
--

INSERT INTO `markalar` (`id`, `markaadi`) VALUES
(1, 'Samsung'),
(2, 'Iphone');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `modeller`
--

CREATE TABLE `modeller` (
  `id` int(10) UNSIGNED NOT NULL,
  `modeladi` text NOT NULL,
  `markadi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `modeller`
--

INSERT INTO `modeller` (`id`, `modeladi`, `markadi`) VALUES
(1, 'X', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_about`
--

CREATE TABLE `qp_about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `addate` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_about`
--

INSERT INTO `qp_about` (`id`, `title`, `description`, `addate`, `user_id`, `statu`) VALUES
(1, 'başlık', 'acıklama', '2023-04-18 10:26:21', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satisfaturasi`
--

CREATE TABLE `satisfaturasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `urunadi` varchar(11) NOT NULL,
  `adet` varchar(11) NOT NULL,
  `fiyat` varchar(11) NOT NULL,
  `kdvsiztoplam` varchar(11) NOT NULL,
  `kdvoran` varchar(11) NOT NULL,
  `kdvtutar` varchar(11) NOT NULL,
  `kdvlitoplam` varchar(11) NOT NULL,
  `depo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stokgruplar`
--

CREATE TABLE `stokgruplar` (
  `id` int(10) UNSIGNED NOT NULL,
  `stokgrupadi` text NOT NULL,
  `resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `stokgruplar`
--

INSERT INTO `stokgruplar` (`id`, `stokgrupadi`, `resim`) VALUES
(16, 'Elektronik', ''),
(17, 'Moda', ''),
(18, 'Ev, Yaşam, Kırtasiye, Ofis', ''),
(19, 'Oto, Bahçe, Yapı Market', ''),
(20, 'Anne, Bebek, Oyuncak', ''),
(21, 'Spor, Outdoor', ''),
(22, 'Kozmetik, Kişisel Bakım', ''),
(23, 'Süpermarket, Pet Shop', ''),
(24, 'Kitap, Müzik, Film, Hobi', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(10) UNSIGNED NOT NULL,
  `urunadi` varchar(255) NOT NULL,
  `urunkodu` varchar(255) NOT NULL,
  `urunbarkodu` int(11) NOT NULL,
  `alisfiyati` varchar(255) NOT NULL,
  `satisfiyati` varchar(255) NOT NULL,
  `kdvorani` int(11) NOT NULL,
  `stokgrubu` text NOT NULL,
  `markasi` varchar(70) NOT NULL,
  `modeli` varchar(70) NOT NULL,
  `resmi` varchar(255) NOT NULL,
  `uyarilimiti` int(11) NOT NULL,
  `otvoran` int(11) NOT NULL,
  `kdvsizalisfiyati` int(11) NOT NULL,
  `kdvsizsatisfiyati` int(11) NOT NULL,
  `birimadi` int(11) NOT NULL,
  `ozellikler` text NOT NULL,
  `ekleyen` int(11) NOT NULL,
  `depoadi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urunadi`, `urunkodu`, `urunbarkodu`, `alisfiyati`, `satisfiyati`, `kdvorani`, `stokgrubu`, `markasi`, `modeli`, `resmi`, `uyarilimiti`, `otvoran`, `kdvsizalisfiyati`, `kdvsizsatisfiyati`, `birimadi`, `ozellikler`, `ekleyen`, `depoadi`) VALUES
(63, 'ıphone', '790752', 2147483647, '11.8', '944000', 18, '16', '2', '1', 'urinresim/1646144438iphone.png', 85, 0, 10, 800000, 1, '', 0, '16'),
(64, 'SAMSUNG CURVED TV 55', '553170', 2147483647, '11.8', '17.523', 18, '16', '1', '1', 'urinresim/1646144421samsungtv.png', 85, 0, 10, 15, 1, '', 0, '15'),
(65, 'Buzdolabı', '909095', 2147483647, '1770', '9440', 18, '16', '1', '1', 'urinresim/1646144453samsungbuzdolabi.png', 85, 0, 1500, 8000, 1, '', 0, '15');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `alisfaturasi`
--
ALTER TABLE `alisfaturasi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `anasayfa`
--
ALTER TABLE `anasayfa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `birim`
--
ALTER TABLE `birim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `depolar`
--
ALTER TABLE `depolar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `depotransfer`
--
ALTER TABLE `depotransfer`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kdvler`
--
ALTER TABLE `kdvler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kadi` (`kadi`);

--
-- Tablo için indeksler `markalar`
--
ALTER TABLE `markalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `modeller`
--
ALTER TABLE `modeller`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_about`
--
ALTER TABLE `qp_about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satisfaturasi`
--
ALTER TABLE `satisfaturasi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stokgruplar`
--
ALTER TABLE `stokgruplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `alisfaturasi`
--
ALTER TABLE `alisfaturasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `anasayfa`
--
ALTER TABLE `anasayfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `birim`
--
ALTER TABLE `birim`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `depolar`
--
ALTER TABLE `depolar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `depotransfer`
--
ALTER TABLE `depotransfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `kdvler`
--
ALTER TABLE `kdvler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `markalar`
--
ALTER TABLE `markalar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `modeller`
--
ALTER TABLE `modeller`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `qp_about`
--
ALTER TABLE `qp_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `satisfaturasi`
--
ALTER TABLE `satisfaturasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `stokgruplar`
--
ALTER TABLE `stokgruplar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
