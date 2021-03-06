-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Lis 2018, 18:00
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pai_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(20) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(2, 'Inna kategoria'),
(1, 'Testowa kategoria');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `content` text COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `title`, `content`, `date`, `category_id`) VALUES
(1, 1, '\0L\0o\0r\0e\0m\0 \0i\0p\0s\0u\0m', '\0d\0o\0l\0o\0r\0 \0s\0i\0t\0 \0a\0m\0e\0t\0,\0 \0c\0o\0n\0s\0e\0c\0t\0e\0t\0u\0r\0 \0a\0d\0i\0p\0i\0s\0c\0i\0n\0g\0 \0e\0l\0i\0t\0.\0 \0N\0u\0l\0l\0a\0m\0 \0p\0u\0r\0u\0s\0 \0n\0u\0n\0c\0,\0 \0g\0r\0a\0v\0i\0d\0a\0 \0t\0i\0n\0c\0i\0d\0u\0n\0t\0 \0e\0n\0i\0m\0 \0q\0u\0i\0s\0,\0 \0c\0u\0r\0s\0u\0s\0 \0v\0u\0l\0p\0u\0t\0a\0t\0e\0 \0d\0u\0i\0.\0 \0F\0u\0s\0c\0e\0 \0n\0i\0s\0l\0 \0s\0e\0m\0,\0 \0p\0o\0r\0t\0a\0 \0n\0e\0c\0 \0u\0l\0t\0r\0i\0c\0e\0s\0 \0s\0i\0t\0 \0a\0m\0e\0t\0,\0 \0u\0l\0t\0r\0i\0c\0i\0e\0s\0 \0s\0e\0d\0 \0n\0i\0s\0l\0.\0 \0M\0o\0r\0b\0i\0 \0a\0t\0 \0a\0n\0t\0e\0 \0a\0l\0i\0q\0u\0e\0t\0,\0 \0e\0f\0f\0i\0c\0i\0t\0u\0r\0 \0n\0i\0s\0i\0 \0f\0e\0u\0g\0i\0a\0t\0,\0 \0c\0o\0n\0v\0a\0l\0l\0i\0s\0 \0n\0i\0s\0l\0.\0 \0F\0u\0s\0c\0e\0 \0h\0e\0n\0d\0r\0e\0r\0i\0t\0 \0m\0i\0 \0l\0e\0o\0,\0 \0u\0t\0 \0a\0l\0i\0q\0u\0e\0t\0 \0n\0u\0l\0l\0a\0 \0f\0e\0r\0m\0e\0n\0t\0u\0m\0 \0i\0n\0.\0 \0S\0e\0d\0 \0u\0t\0 \0s\0o\0d\0a\0l\0e\0s\0 \0n\0i\0s\0i\0,\0 \0v\0i\0t\0a\0e\0 \0e\0f\0f\0i\0c\0i\0t\0u\0r\0 \0q\0u\0a\0m\0.\0 \0O\0r\0c\0i\0 \0v\0a\0r\0i\0u\0s\0 \0n\0a\0t\0o\0q\0u\0e\0 \0p\0e\0n\0a\0t\0i\0b\0u\0s\0 \0e\0t\0 \0m\0a\0g\0n\0i\0s\0 \0d\0i\0s\0 \0p\0a\0r\0t\0u\0r\0i\0e\0n\0t\0 \0m\0o\0n\0t\0e\0s\0,\0 \0n\0a\0s\0c\0e\0t\0u\0r\0 \0r\0i\0d\0i\0c\0u\0l\0u\0s\0 \0m\0u\0s\0.\0 \0N\0u\0l\0l\0a\0m\0 \0n\0e\0c\0 \0c\0o\0n\0g\0u\0e\0 \0o\0r\0c\0i\0,\0 \0q\0u\0i\0s\0 \0v\0e\0n\0e\0n\0a\0t\0i\0s\0 \0t\0e\0l\0l\0u\0s\0.\0 \0S\0e\0d\0 \0i\0n\0 \0m\0o\0l\0e\0s\0t\0i\0e\0 \0n\0i\0s\0l\0.\0 \0C\0u\0r\0a\0b\0i\0t\0u\0r\0 \0v\0o\0l\0u\0t\0p\0a\0t\0 \0v\0e\0h\0i\0c\0u\0l\0a\0 \0s\0a\0p\0i\0e\0n\0 \0q\0u\0i\0s\0 \0s\0a\0g\0i\0t\0t\0i\0s\0.\0\r\0\n\0\r\0\n', '2018-10-02 18:31:27', 1),
(2, 1, 'PHP', 'PHP ??? interpretowany skryptowy j??zyk programowania zaprojektowany do generowania stron internetowych i budowania aplikacji webowych w czasie rzeczywistym.\r\n\r\nPHP jest najcz????ciej stosowany do tworzenia skrypt??w po stronie serwera WWW, ale mo??e by?? on r??wnie?? u??ywany do przetwarzania danych z poziomu wiersza polece??, a nawet do pisania program??w pracuj??cych w trybie graficznym (np. za pomoc?? biblioteki GTK+, u??ywaj??c rozszerzenia PHP-GTK). Implementacja PHP wraz z serwerem WWW Apache oraz serwerem baz danych MySQL okre??lana jest jako platforma AMP (w ??rodowisku Linux ??? LAMP, w Windows ??? WAMP).', '2018-10-02 18:34:41', 1),
(3, 1, 'Przedsprzeda?? NVIDIA Quadro RTX 6000 i RTX 5000', 'Karty do u??ytku profesjonalnego. W sierpniu tego roku, podczas eventu SIGGRAPH Nvidia zapowiedzia??a profesjonalne karty Quadro oparte na architekturze Turinga. Nowe procesory graficzne to NVIDIA Quadro RTX 8000, RTX 6000 i RTX 5000. Dwa ostatnie s?? od teraz dost??pne w przedsprzeda??y, na pierwsz?? b??dziemy musieli jeszcze poczeka??.\r\n\r\nProcesory graficzne z przeznaczeniem do zada?? specjalnych NVIDIA Quadro RTX 6000 i RTX 5000 s?? ju?? dost??pne w przedsprzeda??y na stronie producenta. Karta RTX 6000 (TU102), kt??r?? wyceniono na 6300 dolar??w otrzyma??a 4608 rdzeni CUDA, 576 rdzeni Tensor i 24 GB 384-bitowej pami??ci GDDR6 od Samsunga. Z kolei RTX 5000 (TU104), kt??r?? wyceniono na 2300 dolar??w to ju?? 3072 rdzenie CUDA, 384 rdzenie Tensor i 16 GB 256-bitowej pami??ci GDDR6.', '2018-10-02 18:58:26', 2),
(4, 1, 'INFORMACJE DLA SPRAWDZAJ??CEGO', 'Witam na stronie projektu. Mo??e on by?? przegl??dany zar??wno z plik??w lokalnych jak i pod adresem projektzpracowniwitryn.cba.pl\r\n\r\nHas??o do systemu logowania na stronie jak i obszaru chronionego domeny to:\r\nLOGIN: szyper\r\nHAS??O: PHP7tozajebistyjezyk\r\n\r\nWszystkie funkcjonalno??ci opieraj?? si?? o do????czon?? baz?? danych. Obecne dane maj?? charakter przyk??adowy i mog?? ulec zmianie.\r\n\r\n??ycz?? mi??ego wstrzykiwania SQL :)', '2018-10-02 19:41:04', 1),
(5, 3, 'Surface Pro 6 i Surface Studio 2', 'Microsoft Surface Pro 6 to najnowsza hybryda laptopa i tabletu, kt??ra z generacji na generacj?? robi coraz wi??ksze wra??enie, cho?? tym razem nowo??ci jest niewiele. Ponownie mamy tutaj do czynienia z 12,3-calowym, dotykowym wy??wietlaczem PixelSense, ale za to znacz??co poprawiona ma by?? wydajno????. \r\n\r\nW??r??d dost??pnych opcji odnajdujemy czterordzeniowe procesory Intel Core i5/i7 8. generacji, 16 GB pami??ci RAM i SSD o pojemno??ci nawet do 1 TB. Wygl??da to wi??c naprawd?? dobrze. Do tego dochodz?? jeszcze modu??y Wi-Fi AC i Bluetooth 4.1 oraz kamery 5 i 8 Mpix. \r\n\r\nJe??li chodzi o dost??pne gniazda, to s?? to: USB 3.0, miniDisplayPort, Surface Connect, audio i slot microSDXC, a na??adowany do pe??na akumulator ma zapewnia?? do 13,5 godziny dzia??ania. Ceny natomiast rozpoczn?? si?? od 899 dolar??w, a premiera odb??dzie si?? jeszcze w tym miesi??cu.', '2018-10-03 18:28:35', 2),
(6, 2, 'To jest Pa??ski przyk??adowy post', 'Jaka?? tre????, kt??rej nie chcia??o mi si?? wymy??la?? :P', '2018-10-03 18:30:10', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_bin NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `active`) VALUES
(1, '2137', 'tuniemahasel', 'dupa@dupa.pl', 1),

--
-- Indeksy dla zrzut??w tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `cat_in` (`category`);

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_ind` (`category_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `name` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzut??w tabel
--

--
-- Ograniczenia dla tabeli `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
