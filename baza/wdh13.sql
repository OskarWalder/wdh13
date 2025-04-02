-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2025 at 03:32 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdh13`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `formularze_kontaktowe`
--

CREATE TABLE `formularze_kontaktowe` (
  `id_formularza` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `imie_nazwisko` varchar(40) NOT NULL,
  `temat` varchar(50) NOT NULL,
  `wiadomosc` varchar(300) NOT NULL,
  `zgoda` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formularze_kontaktowe`
--

INSERT INTO `formularze_kontaktowe` (`id_formularza`, `email`, `imie_nazwisko`, `temat`, `wiadomosc`, `zgoda`) VALUES
(1, 'xxx@gmail.com', 'Oskar Walder', 'Wiadomość testowa', 'Zawartość wiadomości.', 1),
(11, 'xxx@gmail.com', 'fghfghfg', 'fghdgfg', 'fghfghfg', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz`
--

CREATE TABLE `komentarz` (
  `id_komentarza` int(11) NOT NULL,
  `id_posta` int(11) NOT NULL,
  `id_autora_kom` int(11) NOT NULL,
  `tresc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowania`
--

CREATE TABLE `logowania` (
  `id_logowania` int(11) NOT NULL,
  `id_profilu` int(11) NOT NULL,
  `data_logowania` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logowania`
--

INSERT INTO `logowania` (`id_logowania`, `id_profilu`, `data_logowania`) VALUES
(1, 1, '2025-03-31 20:31:21'),
(2, 3, '2025-04-01 09:10:07'),
(3, 3, '2025-04-01 09:11:17'),
(4, 3, '2025-04-01 09:17:46'),
(5, 3, '2025-04-01 09:24:55'),
(6, 3, '2025-04-01 09:26:10'),
(7, 3, '2025-04-01 09:49:45'),
(8, 3, '2025-04-01 09:50:23'),
(9, 3, '2025-04-01 09:58:40'),
(10, 4, '2025-04-01 10:11:05'),
(11, 5, '2025-04-01 10:13:57'),
(12, 4, '2025-04-01 10:18:23'),
(13, 6, '2025-04-01 11:15:55'),
(14, 4, '2025-04-01 11:25:34'),
(15, 4, '2025-04-01 11:36:47'),
(16, 4, '2025-04-02 00:05:53'),
(17, 1, '2025-04-02 01:18:56'),
(18, 1, '2025-04-02 02:19:29'),
(19, 1, '2025-04-02 02:29:37'),
(20, 1, '2025-04-02 02:32:24'),
(21, 1, '2025-04-02 02:35:46'),
(22, 1, '2025-04-02 02:40:08'),
(23, 1, '2025-04-02 02:41:27'),
(24, 1, '2025-04-02 02:46:33'),
(25, 1, '2025-04-02 02:47:02'),
(26, 1, '2025-04-02 02:47:28'),
(27, 1, '2025-04-02 02:48:10'),
(28, 1, '2025-04-02 02:55:13'),
(29, 1, '2025-04-02 03:00:29'),
(30, 1, '2025-04-02 03:24:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polubienia`
--

CREATE TABLE `polubienia` (
  `id_polubienia` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_posta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `id_posta` int(11) NOT NULL,
  `id_autora_post` int(11) NOT NULL,
  `zdjecie_post` mediumblob DEFAULT NULL,
  `opis` varchar(700) NOT NULL DEFAULT 'Brak opisu.',
  `ilosc_polubien` int(11) NOT NULL DEFAULT 0,
  `data_utworzenia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `haslo` varchar(200) NOT NULL,
  `zgoda_na_przetwarzanie_danych` tinyint(1) NOT NULL DEFAULT 0,
  `punkty` int(11) NOT NULL DEFAULT 0,
  `punkty_alltime` int(11) NOT NULL DEFAULT 0,
  `zdjecie_profilowe` text DEFAULT 'default.jpg',
  `uprawnienia` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nazwa_uzytkownika`, `email`, `haslo`, `zgoda_na_przetwarzanie_danych`, `punkty`, `punkty_alltime`, `zdjecie_profilowe`, `uprawnienia`) VALUES
(1, 'proski37', 'xxx@gmail.com', '$2y$10$6a6sKziNN8x3qmsQWX3p3uZJSx6AqxjfePtVaMzkkK3dWETZcSjra', 1, 0, 0, 'proski37.jpg', 'admin'),
(3, 'tescik', 'test@mail.com', '$2y$10$/yPJp12qXCibAK.eoOPOD.EqMzr.cx0RG', 1, 0, 0, NULL, 'user'),
(4, 'dsjofgs', 'xxx@videos.com', '$2y$10$U6OV3tkXRmpUdFSjBL.L5.aVxhF.LVdoPzj04bvi3rMEoOLBNXZeq', 1, 0, 0, NULL, 'user'),
(5, 'dddddddddd', 'ddd@mail.com', '$2y$10$os3lQ8zn/G9ksFIvY6k9CezvMEP/TT9QJwjv2AnCgXey3GoMGGRpO', 1, 0, 0, NULL, 'user'),
(6, 'peter', 'peter@gmail.com', '$2y$10$Orn5lvkkHXbzv7P0mKrnHehfUvoAWzFQDjTe09OVhHRtQLWAOPu7C', 1, 0, 0, NULL, 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ranga`
--

CREATE TABLE `ranga` (
  `id_rangi` int(11) NOT NULL,
  `nazwa_rangi` varchar(50) DEFAULT NULL,
  `prog_punktowy` int(11) NOT NULL,
  `zdjecie_rangi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranga`
--

INSERT INTO `ranga` (`id_rangi`, `nazwa_rangi`, `prog_punktowy`, `zdjecie_rangi`) VALUES
(1, 'Ochotniczka/Młodzik', 1000, 'rng1.png'),
(2, 'Tropicielka/Wywiadowca', 3000, 'rng2.png'),
(3, 'Pionierka/Odkrywca', 7000, 'rng3.png'),
(4, 'Samarytanka/Ćwik', 12000, 'rng4.png'),
(5, 'Harcerka Orla/Harcerz Orli', 20000, 'rng5.png'),
(6, 'Harcerka Rzeczypospolitej/Harcerz Rzeczypospolitej', 30000, 'rng6.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprawnosci`
--

CREATE TABLE `sprawnosci` (
  `id_sprawnosci` int(11) NOT NULL,
  `nazwa_sprawnosci` varchar(50) NOT NULL,
  `cena` int(11) NOT NULL DEFAULT 9999999,
  `zdjecie_sprawnosci` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sprawnosci`
--

INSERT INTO `sprawnosci` (`id_sprawnosci`, `nazwa_sprawnosci`, `cena`, `zdjecie_sprawnosci`) VALUES
(1, 'Ognik', 500, 'ognik.jpg'),
(2, 'Astronom', 500, 'Astronom.jpg'),
(3, 'Historyk', 500, 'Historyk.jpg'),
(4, 'Grafik', 500, 'Grafik.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdobyte_rangi`
--

CREATE TABLE `zdobyte_rangi` (
  `id_zdobytej_rangi` int(11) NOT NULL,
  `id_wlasciciela_rangi` int(11) NOT NULL,
  `id_rangi` int(11) NOT NULL,
  `data_zdobycia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zdobyte_rangi`
--

INSERT INTO `zdobyte_rangi` (`id_zdobytej_rangi`, `id_wlasciciela_rangi`, `id_rangi`, `data_zdobycia`) VALUES
(1, 1, 5, '2025-04-02 02:29:05'),
(5, 1, 1, '2025-04-02 02:47:17'),
(6, 1, 6, '2025-04-02 02:47:43');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdobyte_sprawnosci`
--

CREATE TABLE `zdobyte_sprawnosci` (
  `id_zdobytej_sprawnosci` int(11) NOT NULL,
  `id_wlasciciela_sprawnosci` int(11) NOT NULL,
  `id_sprawnosci` int(11) NOT NULL,
  `data_zdobycia` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `formularze_kontaktowe`
--
ALTER TABLE `formularze_kontaktowe`
  ADD PRIMARY KEY (`id_formularza`);

--
-- Indeksy dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  ADD KEY `id_posta` (`id_posta`),
  ADD KEY `id_autora_kom` (`id_autora_kom`);

--
-- Indeksy dla tabeli `logowania`
--
ALTER TABLE `logowania`
  ADD PRIMARY KEY (`id_logowania`),
  ADD KEY `id_profilu` (`id_profilu`);

--
-- Indeksy dla tabeli `polubienia`
--
ALTER TABLE `polubienia`
  ADD PRIMARY KEY (`id_polubienia`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_posta` (`id_posta`);

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_posta`),
  ADD KEY `id_autora_post` (`id_autora_post`);

--
-- Indeksy dla tabeli `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD UNIQUE KEY `nazwa_uzytkownika` (`nazwa_uzytkownika`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `ranga`
--
ALTER TABLE `ranga`
  ADD PRIMARY KEY (`id_rangi`);

--
-- Indeksy dla tabeli `sprawnosci`
--
ALTER TABLE `sprawnosci`
  ADD PRIMARY KEY (`id_sprawnosci`);

--
-- Indeksy dla tabeli `zdobyte_rangi`
--
ALTER TABLE `zdobyte_rangi`
  ADD PRIMARY KEY (`id_zdobytej_rangi`),
  ADD KEY `id_wlasciciela_rangi` (`id_wlasciciela_rangi`),
  ADD KEY `id_rangi` (`id_rangi`);

--
-- Indeksy dla tabeli `zdobyte_sprawnosci`
--
ALTER TABLE `zdobyte_sprawnosci`
  ADD PRIMARY KEY (`id_zdobytej_sprawnosci`),
  ADD KEY `id_wlasciciela_sprawnosci` (`id_wlasciciela_sprawnosci`),
  ADD KEY `id_sprawnosci` (`id_sprawnosci`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formularze_kontaktowe`
--
ALTER TABLE `formularze_kontaktowe`
  MODIFY `id_formularza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logowania`
--
ALTER TABLE `logowania`
  MODIFY `id_logowania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `polubienia`
--
ALTER TABLE `polubienia`
  MODIFY `id_polubienia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_posta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ranga`
--
ALTER TABLE `ranga`
  MODIFY `id_rangi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sprawnosci`
--
ALTER TABLE `sprawnosci`
  MODIFY `id_sprawnosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zdobyte_rangi`
--
ALTER TABLE `zdobyte_rangi`
  MODIFY `id_zdobytej_rangi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zdobyte_sprawnosci`
--
ALTER TABLE `zdobyte_sprawnosci`
  MODIFY `id_zdobytej_sprawnosci` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentarz`
--
ALTER TABLE `komentarz`
  ADD CONSTRAINT `komentarz_ibfk_1` FOREIGN KEY (`id_posta`) REFERENCES `post` (`id_posta`),
  ADD CONSTRAINT `komentarz_ibfk_2` FOREIGN KEY (`id_autora_kom`) REFERENCES `profil` (`id_profil`);

--
-- Constraints for table `logowania`
--
ALTER TABLE `logowania`
  ADD CONSTRAINT `logowania_ibfk_1` FOREIGN KEY (`id_profilu`) REFERENCES `profil` (`id_profil`);

--
-- Constraints for table `polubienia`
--
ALTER TABLE `polubienia`
  ADD CONSTRAINT `polubienia_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `profil` (`id_profil`),
  ADD CONSTRAINT `polubienia_ibfk_2` FOREIGN KEY (`id_posta`) REFERENCES `post` (`id_posta`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_autora_post`) REFERENCES `profil` (`id_profil`);

--
-- Constraints for table `zdobyte_rangi`
--
ALTER TABLE `zdobyte_rangi`
  ADD CONSTRAINT `zdobyte_rangi_ibfk_1` FOREIGN KEY (`id_wlasciciela_rangi`) REFERENCES `profil` (`id_profil`),
  ADD CONSTRAINT `zdobyte_rangi_ibfk_2` FOREIGN KEY (`id_rangi`) REFERENCES `ranga` (`id_rangi`);

--
-- Constraints for table `zdobyte_sprawnosci`
--
ALTER TABLE `zdobyte_sprawnosci`
  ADD CONSTRAINT `zdobyte_sprawnosci_ibfk_1` FOREIGN KEY (`id_wlasciciela_sprawnosci`) REFERENCES `profil` (`id_profil`),
  ADD CONSTRAINT `zdobyte_sprawnosci_ibfk_2` FOREIGN KEY (`id_sprawnosci`) REFERENCES `sprawnosci` (`id_sprawnosci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
