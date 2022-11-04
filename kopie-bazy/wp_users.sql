-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 04 Lis 2022, 03:45
-- Wersja serwera: 10.5.17-MariaDB-cll-lve
-- Wersja PHP: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `weblide2_msnew`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `nip` bigint(11) NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `firma` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `first_address_line` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `second_address_line` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `kod` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `wojewodztwo` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `telefon` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Zrzut danych tabeli `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `nip`, `first_name`, `last_name`, `firma`, `first_address_line`, `second_address_line`, `city`, `kod`, `wojewodztwo`, `telefon`) VALUES
(3, 'weblider', '$P$BbYvanrnMVevaMBmO2U5y7sBeUsNYn1', 'weblider', 'weblider@weblider.eu', '', '2022-05-19 16:11:00', '', 0, 'weblider', 0, '', '', '', '', '', '', '', '', ''),
(241, 'nike123', '$P$Byo9wyt9NrkcFqIJTQ8hZKH49ZiK1r/', 'nike123', 'nike123@gmail.com', '', '2022-10-30 10:07:57', '1667124478:$P$BV3D1fROe4BtW8kEkxQJa5RH0zBzgE0', 0, 'jan kowalski', 5272184991, 'jan', 'kowalski', '\"NIKE POLAND\" SPÓŁKA Z OGRANICZONĄ ODPOWIEDZIALNOŚCIĄ', 'Warszawa', 'Plac marsz. Józefa Piłsudskiego', 'Warszawa', '00-078', 'MAZOWIECKIE', ''),
(242, 'Weblider Magdalena Was', '$P$Bt6DWxRTOslsf9f6f8u5VFHTCJyl9Z1', 'weblider-magdalena-was', 'website@weblider.eu', '', '2022-11-02 20:39:36', '1667421577:$P$Bjv.o2XCCWjFdNS68tHElId9NdvCBW0', 0, 'MAGDALENA WĄS', 6443138433, 'MAGDALENA', 'WĄS', 'Weblider.eu', 'Gliwice', 'ul. Łabędzka', 'Gliwice', '44-100', '', ''),
(243, 'adidas123', '$P$BI/HSAHOO/usQMjH97jMannfkGRKAQ1', 'adidas123', 'adidas123@gmail.com', '', '2022-11-03 07:53:55', '1667462035:$P$BH1wlXGj4V0iFMEcnt7h8PCu.W8tvY.', 0, 'kuba kubsinski', 5220000080, 'kuba', 'kubsinski', '\"ADIDAS POLAND\" SPÓŁKA Z OGRANICZONĄ ODPOWIEDZIALNOŚCIĄ', 'Warszawa', 'ul. Żwirki i Wigury', 'Warszawa', '02-092', 'MAZOWIECKIE', ''),
(244, 'honorata', '$P$B2rcglsgTUMyoE8c6bBw7nCznoinn1/', 'honorata', 'sekretariat.bielsko@mbm.edu.pl', '', '2022-11-03 11:56:45', '1667476605:$P$BPnXNaAsbuB7HPmO5VSUGfbKof.73a/', 0, 'HONORATA WIEWIÓRA', 5482089454, 'HONORATA', 'WIEWIÓRA', 'MBM', 'Strumień', 'ul. Graniczna', 'Strumień', '43-246', '', ''),
(246, 'monika', '$P$BijMGdxYvkjnxlY3xMlgOsrU8GdTqW0', 'monika', 'monika.czyz@mbm.edu.pl', '', '2022-11-03 22:06:35', '1667513196:$P$BKwnqZobukyNChISCMy4o9fsc8KQRy0', 0, 'Monika Czyż', 5482089454, 'Monika', 'Czyż', 'MBM', 'Strumień', 'ul. Graniczna', 'Strumień', '43-246', '', ''),
(247, 'klaudiusz', '$P$Bfk/FrS8RilNZhEEAea6Dr2R/3ZUlG.', 'klaudiusz', 'klaudiusz.blaszczyk@mbm.edu.pl', '', '2022-11-03 22:07:54', '1667513274:$P$BxZR6rtEU7CcfgtQ/8h8YCpQMreRcg1', 0, 'Klaudiusz Blaszczyk', 5482089454, 'Klaudiusz', 'Blaszczyk', 'MBM', 'Strumień', 'ul. Graniczna', 'Strumień', '43-246', '', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
