-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2025 at 10:38 PM
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
  `opis` varchar(300) NOT NULL DEFAULT 'Brak opisu.',
  `ilosc_polubien` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `haslo` varchar(40) NOT NULL,
  `punkty` int(11) NOT NULL DEFAULT 0,
  `punkty_alltime` int(11) NOT NULL DEFAULT 0,
  `zdjecie_profilowe` mediumblob DEFAULT NULL COMMENT 'max 16mb',
  `uprawnienia` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ranga`
--

CREATE TABLE `ranga` (
  `id_rangi` int(11) NOT NULL,
  `nazwa_rangi` varchar(50) DEFAULT NULL,
  `prog_punktowy` int(11) NOT NULL,
  `zdjecie_rangi` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprawnosci`
--

CREATE TABLE `sprawnosci` (
  `id_sprawnosci` int(11) NOT NULL,
  `nazwa_sprawnosci` varchar(50) NOT NULL,
  `cena` int(11) NOT NULL DEFAULT 9999999,
  `zdjecie_sprawnosci` mediumblob DEFAULT NULL COMMENT 'max 16mb'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- AUTO_INCREMENT for table `logowania`
--
ALTER TABLE `logowania`
  MODIFY `id_logowania` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranga`
--
ALTER TABLE `ranga`
  MODIFY `id_rangi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sprawnosci`
--
ALTER TABLE `sprawnosci`
  MODIFY `id_sprawnosci` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zdobyte_rangi`
--
ALTER TABLE `zdobyte_rangi`
  MODIFY `id_zdobytej_rangi` int(11) NOT NULL AUTO_INCREMENT;

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
