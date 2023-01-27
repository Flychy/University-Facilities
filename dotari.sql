-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:8111
-- Timp de generare: ian. 20, 2023 la 09:41 PM
-- Versiune server: 10.4.22-MariaDB
-- Versiune PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `dotari`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `departament`
--

CREATE TABLE `departament` (
  `ID Departament` int(255) NOT NULL,
  `ID Facultate` int(255) NOT NULL,
  `Nume departament` varchar(50) NOT NULL,
  `Cod departament` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `departament`
--

INSERT INTO `departament` (`ID Departament`, `ID Facultate`, `Nume departament`, `Cod departament`) VALUES
(1, 1, 'Calculatoare', 1),
(2, 1, 'Automatica si Ingineria Sistemelor', 2),
(3, 1, 'Automatica si Informatica Industriala', 3),
(4, 2, 'Electronică Aplicată şi Ingineria Informaţiei', 4),
(5, 2, 'Telecomunicatii', 5),
(6, 2, 'Dispozitive, Circuite si Arhitecturi Electronice', 6),
(7, 2, 'Tehnologie Electronică şi Fiabilitate', 7),
(8, 3, 'Electrothenica', 14),
(9, 3, 'Masini, materiale si actionari electrice', 15);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `dispozitive`
--

CREATE TABLE `dispozitive` (
  `ID Dispozitiv` int(255) NOT NULL,
  `Nume dispozitiv` varchar(50) NOT NULL,
  `Cod dispozitiv` char(10) NOT NULL,
  `Specificatii` varchar(255) NOT NULL,
  `Garantie` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `dispozitive`
--

INSERT INTO `dispozitive` (`ID Dispozitiv`, `Nume dispozitiv`, `Cod dispozitiv`, `Specificatii`, `Garantie`) VALUES
(1, 'Monitor AllienWare', '330', '165Hz', 1),
(2, 'Mouse HP', '10', '2500 DPI', 3),
(3, 'Proiector Acer', '500', 'Full HD', 10),
(6, 'Mouse Microsoft', '11', '2000 DPI', 3),
(7, 'Monitor HuaweiMateview', '333', '145Hz', 0),
(8, 'Proiector EPSON', '510', 'HD', 15),
(9, 'Router ASUS', '210', '2.4GHz', 7),
(10, 'Router Gigabit', '220', '2.4GHz', 8),
(11, 'Router TP-Link', '230', '5GHz', 5),
(12, 'Tastatura Microsoft', '610', 'Mecanica', 4),
(13, 'Tastatura Logitech', '620', 'Regular', 5),
(14, 'Unitate de baza HP', '710', 'Frecventa:3.1GHz,RAM:6GB ', 10),
(15, 'Unitate de baza ASUS', '720', 'Frecventa:4.2GHz,RAM:8GB ', 11),
(16, 'Placa dezvoltare Arduino UNO', '51', '12V', 3),
(17, 'Placa de dezvoltare Ardunio MEGA', '52', '12V', 5),
(18, 'Potentiometru', '53', '', 2),
(19, 'Tranzsitor', '54', '-', 3),
(20, 'Microcontroller', '69', 'Durabil', 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `facultate`
--

CREATE TABLE `facultate` (
  `ID Facultate` int(255) NOT NULL,
  `Nume Facultate` varchar(50) NOT NULL,
  `Adresa` varchar(50) DEFAULT NULL,
  `Telefon` char(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `Descriere` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `facultate`
--

INSERT INTO `facultate` (`ID Facultate`, `Nume Facultate`, `Adresa`, `Telefon`, `Email`, `Website`, `Descriere`) VALUES
(1, 'Automatica si Calculatoare', 'Splaiul Independentei nr. 313 Sector 6, Bucureşti,', '021 402 92', 'secretariat@acs.upb.ro', 'acs.pub.ro', 'Facultatea de Automatică și Calculatoare pregăteşte ingineri specialiști în domeniile Ingineria Sistemelor și Calculatoare și Tehnologia Informaţiei'),
(2, 'Electronica Telecomunicatii si Tehnologia Informat', 'Bulevardul Iuliu Maniu 1-3, București 061071', '0751 049 9', 'secretariat@etti.upb.ro', 'www.electronica.pub', 'Facultatea de Electronică, Telecomunicații și Tehnologia Informației (ETTI) este una dintre cele mai mari și mai cunoscute facultăți din țară, școlarizând peste 3000 de studenți și oferind studenților'),
(3, 'Inginerie Electrica', 'Splaiul Independentei 313, sector 6, Bucuresti, co', '4021402914', 'inginerie.electrica@upb.ro', 'www.electro.pub.ro', 'Facultatea de Inginerie Electrică asigură absolvenţilor competenţe teoretice şi practice în domeniul ingineriei electrice, prin formarea de abilităţi tehnice şi informatice pentru cercetare, proiectar'),
(4, 'Transporturi', 'adresa', '', '', '', ''),
(17, 'Inginerie Aerospatiala', 'Strada Polizu 1, București 011061', '0214023812', 'inginerie.aerospatiala@upb.ro', 'http://www.aero.pub.ro', 'Misiunea Facultății de Inginerie Aerospațială (FIA) este definită în Carta Universității Politehnica din București și anume de cercetare avansată și educație, ca o intersecție a educaţiei, prin formar');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `personal`
--

CREATE TABLE `personal` (
  `ID Personal` int(255) NOT NULL,
  `ID Departament` int(255) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `Functie` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `personal`
--

INSERT INTO `personal` (`ID Personal`, `ID Departament`, `Nume`, `Prenume`, `Functie`) VALUES
(1, 3, 'Moisescu', 'Mihnea Alexandru ', 'Decan'),
(2, 3, 'Oara', 'Cristian', 'Director de departament'),
(3, 2, 'Slușanschi', ' Emil ', 'Director de departament'),
(4, 1, 'Ionita', 'Anca', 'Director de departament'),
(5, 5, 'Udrea', 'Mihnea', 'Decan'),
(6, 5, 'Obrejea', 'Georgica', 'Director de departament'),
(7, 7, 'Vladescu', 'Marian', 'Director de departament'),
(8, 4, 'Florea', 'Bogdan', 'Director de departament'),
(9, 8, 'Grigorescu', 'Dan', 'Director de departament'),
(10, 9, 'Damian', 'Laurentiu', 'Director de departament'),
(11, 8, 'Niculae', 'Dragos', 'Decan');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sala`
--

CREATE TABLE `sala` (
  `ID Sala` int(255) NOT NULL,
  `ID Facultate` int(255) NOT NULL,
  `Nume sala` varchar(50) NOT NULL,
  `Locuri` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `sala`
--

INSERT INTO `sala` (`ID Sala`, `ID Facultate`, `Nume sala`, `Locuri`) VALUES
(1, 1, 'PR001', 500),
(2, 1, 'EC105', 120),
(3, 1, 'ED218', 20),
(4, 1, 'ED210', 15),
(5, 1, 'ED301', 20),
(6, 1, 'ED318', 25),
(7, 1, 'PR002', 100),
(8, 1, 'EC102', 120),
(9, 2, 'A001', 50),
(10, 2, 'B105', 100),
(11, 2, 'F001', 25),
(12, 2, 'B106', 200),
(13, 2, 'B218', 45),
(14, 2, 'A315', 47),
(15, 3, 'FB101', 150),
(16, 3, 'FA001', 50),
(17, 3, 'FA202', 100),
(18, 17, 'K100', 85),
(19, 4, 'BM', 255);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `saladispozitive`
--

CREATE TABLE `saladispozitive` (
  `ID Sala` int(255) NOT NULL,
  `ID Dispozitiv` int(255) NOT NULL,
  `Cantitate dispozitive` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `saladispozitive`
--

INSERT INTO `saladispozitive` (`ID Sala`, `ID Dispozitiv`, `Cantitate dispozitive`) VALUES
(1, 1, 2),
(1, 8, 1),
(1, 11, 1),
(2, 8, 1),
(2, 11, 1),
(3, 1, 20),
(3, 2, 20),
(3, 9, 1),
(3, 12, 20),
(3, 15, 3),
(4, 16, 12),
(4, 17, 3),
(4, 18, 77),
(4, 19, 48),
(5, 2, 10),
(5, 13, 10),
(6, 6, 25),
(6, 7, 25),
(6, 13, 25),
(7, 8, 1),
(9, 3, 1),
(9, 11, 1),
(10, 8, 1),
(10, 15, 2),
(11, 3, 1),
(12, 3, 1),
(13, 16, 20),
(13, 17, 15),
(13, 18, 115),
(13, 19, 102),
(14, 1, 27),
(14, 2, 27),
(14, 13, 27),
(15, 3, 1),
(15, 10, 1),
(16, 8, 1),
(17, 1, 25),
(17, 2, 25),
(17, 3, 1),
(17, 13, 25);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `ID User` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`ID User`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'carmen', 'ispir'),
(3, 'sir_rolland', 'terros'),
(4, 'admini', 'strator');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `departament`
--
ALTER TABLE `departament`
  ADD PRIMARY KEY (`ID Departament`),
  ADD KEY `Dep-Fac` (`ID Facultate`);

--
-- Indexuri pentru tabele `dispozitive`
--
ALTER TABLE `dispozitive`
  ADD PRIMARY KEY (`ID Dispozitiv`);

--
-- Indexuri pentru tabele `facultate`
--
ALTER TABLE `facultate`
  ADD PRIMARY KEY (`ID Facultate`);

--
-- Indexuri pentru tabele `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`ID Personal`),
  ADD KEY `Pers-Dep` (`ID Departament`);

--
-- Indexuri pentru tabele `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`ID Sala`),
  ADD KEY `Sala-Fac` (`ID Facultate`);

--
-- Indexuri pentru tabele `saladispozitive`
--
ALTER TABLE `saladispozitive`
  ADD PRIMARY KEY (`ID Sala`,`ID Dispozitiv`),
  ADD KEY `Saladisp-disp` (`ID Dispozitiv`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID User`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `departament`
--
ALTER TABLE `departament`
  MODIFY `ID Departament` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `dispozitive`
--
ALTER TABLE `dispozitive`
  MODIFY `ID Dispozitiv` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `facultate`
--
ALTER TABLE `facultate`
  MODIFY `ID Facultate` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `personal`
--
ALTER TABLE `personal`
  MODIFY `ID Personal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pentru tabele `sala`
--
ALTER TABLE `sala`
  MODIFY `ID Sala` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `saladispozitive`
--
ALTER TABLE `saladispozitive`
  MODIFY `ID Sala` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `ID User` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `departament`
--
ALTER TABLE `departament`
  ADD CONSTRAINT `Dep-Fac` FOREIGN KEY (`ID Facultate`) REFERENCES `facultate` (`ID Facultate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `Pers-Dep` FOREIGN KEY (`ID Departament`) REFERENCES `departament` (`ID Departament`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `Sala-Fac` FOREIGN KEY (`ID Facultate`) REFERENCES `facultate` (`ID Facultate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `saladispozitive`
--
ALTER TABLE `saladispozitive`
  ADD CONSTRAINT `Saladisp-disp` FOREIGN KEY (`ID Dispozitiv`) REFERENCES `dispozitive` (`ID Dispozitiv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Saladisp-sala` FOREIGN KEY (`ID Sala`) REFERENCES `sala` (`ID Sala`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
