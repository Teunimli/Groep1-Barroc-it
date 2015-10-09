-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 09 okt 2015 om 10:11
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `barroc_it`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_appointment`
--

CREATE TABLE IF NOT EXISTS `tbl_appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `description` text,
  `lastcontact` datetime DEFAULT NULL,
  `employee` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appointment_customer1_idx` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(45) NOT NULL,
  `contact_lastname` varchar(45) NOT NULL,
  `companyname` varchar(45) NOT NULL,
  `first_adress` varchar(45) NOT NULL,
  `first_zipcode` varchar(15) NOT NULL,
  `first_city` varchar(45) NOT NULL,
  `first_housenumber` varchar(10) NOT NULL,
  `second_adress` varchar(45) DEFAULT NULL,
  `second_zipcode` varchar(15) DEFAULT NULL,
  `second_city` varchar(45) DEFAULT NULL,
  `second_housenumber` varchar(10) DEFAULT NULL,
  `contactperson` varchar(45) NOT NULL,
  `initials` varchar(15) NOT NULL,
  `first_telephonenumber` varchar(45) NOT NULL,
  `second_telephonenumber` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `ledgeraccountnumber` varchar(45) DEFAULT NULL,
  `taxcode` varchar(45) DEFAULT NULL,
  `creditworty` tinyint(1) NOT NULL DEFAULT '0',
  `bkrcheck` tinyint(1) NOT NULL DEFAULT '0',
  `open_project` tinyint(1) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `contact_name`, `contact_lastname`, `companyname`, `first_adress`, `first_zipcode`, `first_city`, `first_housenumber`, `second_adress`, `second_zipcode`, `second_city`, `second_housenumber`, `contactperson`, `initials`, `first_telephonenumber`, `second_telephonenumber`, `fax`, `email`, `ledgeraccountnumber`, `taxcode`, `creditworty`, `bkrcheck`, `open_project`, `updated_at`, `archived_at`, `created_at`) VALUES
(1, 'Teun', 'Aarts', 'efew', 'fewfw', 'fewfwef', 'wefwefwe', 'wef', NULL, NULL, NULL, NULL, 'wefew', 'wefw', 'efwefw', NULL, 'wef', 'wef@ese.nl', 'wefwef', 'efwe', 0, 0, 0, NULL, NULL, NULL),
(2, 'uy', 'uy', 'vuy', 'vuy', 'vu', 'yvu', 'vyu', 'vy', 'uyv', 'uyv', 'v', 'uv', 'uyv', 'yuv', 'yvu', 'v', 'uu@efe.nl', 'v', 'wdw', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_invoices`
--

CREATE TABLE IF NOT EXISTS `tbl_invoices` (
  `id` int(11) NOT NULL,
  `date_of_invoice` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `projects_id` int(11) NOT NULL,
  `description` text,
  `total_price` decimal(10,2) DEFAULT NULL,
  `paid` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoices_projects_idx` (`projects_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects`
--

CREATE TABLE IF NOT EXISTS `tbl_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectname` varchar(45) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `hardware` varchar(200) DEFAULT NULL,
  `software` varchar(200) DEFAULT NULL,
  `operating_system` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `limit` decimal(10,2) NOT NULL,
  `maintenance_contract` tinyint(1) NOT NULL DEFAULT '0',
  `application` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `paid_invoices` int(11) DEFAULT NULL,
  `remaining_invoices` int(11) DEFAULT NULL,
  `deadline` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projects_customer1_idx` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_role`
--

CREATE TABLE IF NOT EXISTS `tbl_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `desciption` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_users_role1_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `fk_appointment_customer1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD CONSTRAINT `fk_invoices_projects` FOREIGN KEY (`projects_id`) REFERENCES `tbl_projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD CONSTRAINT `fk_projects_customer1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `fk_users_role1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
