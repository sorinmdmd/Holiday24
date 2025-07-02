-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2025 at 07:48 PM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iksy2_holiday24`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `customerid` varchar(36) DEFAULT NULL,
  `travelbundleid` varchar(36) DEFAULT NULL,
  `booked_slots` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customerid`, `travelbundleid`, `booked_slots`) VALUES
('1244bbc6-ad4b-4486-b79d-a3642041ea32', '317283a7-3be8-4cdc-a124-dab79514b626', '20345678', 2),
('4b5f1ddc-0018-422b-b217-ffee5a9cedf6', '8da52d07-3ad7-4d28-8729-ae11baaa6587', '20456789', 2),
('6800b616-ddbc-4857-a07e-206cd62a8bb1', '0', '22397704', 2),
('72466f26-73ed-48a2-8bac-01a61cdfc1a4', 'bbfbdb74-9d34-4378-abd1-191022e1bf38', '20234567', 3),
('97a006b8-244f-4fe8-8ba8-1332a6ea2f6b', '8da52d07-3ad7-4d28-8729-ae11baaa6587', '17604161', 2),
('b7b10e9d-901a-44bf-89ba-76ac345f0a9e', 'bbfbdb74-9d34-4378-abd1-191022e1bf38', '17604161', 1),
('dfc0bd90-9391-4485-8a22-2f10d1564ff8', 'bbfbdb74-9d34-4378-abd1-191022e1bf38', '20123456', 6),
('ed61be82-5ccf-425a-8b40-2741fe29baef', 'bbfbdb74-9d34-4378-abd1-191022e1bf38', '20456789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `last_name` varchar(40) DEFAULT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `last_name`, `first_name`, `password_hash`, `email`, `role`, `verified`) VALUES
('0', 'Admin', 'Admin', '$2y$12$56Hfk20m6tjHxjl.MNCr7.5Edbf/UemGMyyV9kI4IyOsJRa.DLFR.', 'admin@admin.com', 'admin', 1),
('08835df5-cfc3-428b-a240-8a46d023392d', 'test', 'Iksy', '$2y$12$ANsL/dmjQiWdfV0bjHQXT.pPMZQoFCAMbmX3f9TBwGhiNk3s8Bo2.', 'rivahej486@coasah.com', 'customer', 1),
('317283a7-3be8-4cdc-a124-dab79514b626', 'K', 'Ana', '$2y$10$Znj2JVOfgXbr0xyRv4gXU.cGdMyybc1GH9uzvquQTaD9GbFZYdj5O', 'ana.schwengber-kelm@stud.hs-bochum.de', 'customer', 1),
('32fef0c7-fb75-40fe-84b5-fbe79f6049b7', 'B', 'F', '$2y$10$NI/osrVEz.J3OmAVeKkcw.o7YjzUlSI.GRKXH59RRj/chvNkDygFG', 'fb1@byom.de', 'customer', 1),
('43cb6195-c91b-40e8-a4aa-f4f673c2f0da', 'Meyer', 'Alex', '$2y$12$/yENI7iTkZHbeWmyP21e7.Lbcn5sfCImdP4giiWSlW/ngqXfHY2mm', 'muratcor03@gmail.com', 'customer', 1),
('44af381a-a2c2-4cf1-b31c-14140d5f83aa', 'Test', 'Dennis', '$2y$12$lSFykdeXrT2thv4gKIObbuP1A6DFLrbqrKZtnBCdqjaSHk/aldUMG', 'lojav16104@nomrista.com', 'customer', 1),
('47192edf-61e9-41fe-9a58-0e554066a39e', 'christoph2', 'christoph1', '$2y$10$ddVx1/Ss10WuFynDzwRu2uf3PnKOQvC2w3XuGjBR2iCzV6BRNDx2O', 'mtu_2qfg47wzxnqi@byom.de', 'admin', 1),
('5bd68279-2c4f-49d6-a2b8-78005b70ee41', 'Tourist1', 'Dennis', '$2y$12$5NziCwJD1xV2Hv.Py3Ln0uFKt25ALqnpNqiT12TAax.Y/.K8lBqPa', 'nylasone@cyclelove.cc', 'customer', 1),
('5c9b7eb1-b8a7-4ba7-94d3-08772351ab69', 'teso', 'testo', '$2y$12$I/D.oo0EEjAZDqQzSGEKZOc9dynP1wE7456Hwh6hh/7g3W/uyms3S', 'teso@test.com', 'customer', 0),
('6037cba7-3617-490a-acac-34de8fba59b1', 'Tourist2', 'Dennis', '$2y$12$LfxkIWsuOMzlHuQ7dil4huD4tXwnOmhF4pv.EKyw46ucqOoPkgnpO', 'czernicki67@gmail.com', 'customer', 0),
('65e5811d-8ae8-4957-a892-cd609cd39c7f', 'asdasd', 'dadad', '$2y$12$3NWS25uceAIxwdvTR4zPcOvy/bZQnyAtBmQoGWyHU7ZS37TFnvPO.', 'yobefa4383@magpit.com', 'customer', 1),
('78b5ad7a-12e8-454e-aaf7-1b22fd0d5ea9', 'Hallo2', 'Hallo', '$2y$12$U./3UySSnN2ZcVnTl54lZOSd1F9dXAvSG7OrEn66HybOrVopjdjUe', 'wi63giznna@dygovil.com', 'customer', 1),
('82db5d7b-1f69-4de9-9c5e-b2f0747bb35e', 'Corbaci', 'Murat', '$2y$12$8U1FMn3GneZg4lSSN481L.vKxg6Gv8Ohv0ivEsD6OTjmFS3C/i.fu', 'murat@test.com', 'customer', 0),
('89351f9d-562d-4abd-a020-cac313603294', 'dasd', 'Hallod', '$2y$12$eYAI6C2KsQ3gTnFR7CSWF.DKKNCXdMTPA6QWSJ.Bj9RgXmfAMbXfm', 'federal.impala.mpab@letterhaven.net', 'customer', 0),
('8da52d07-3ad7-4d28-8729-ae11baaa6587', 'K', 'Ana', '$2y$10$qDnWvhFAZWiVYElW0rWC4ePyfkAgkpDNHg/YF44hAO26RNm89MOrG', 'schwengberrrrr@hotmail.com', 'customer', 1),
('90866f82-8a7d-42a2-b6ad-8ddd3f424a4e', 'test4', 'test4', '$2y$12$NZ6N2piFo/jUBqqQqhwGsOTr9ldnFHceP07FIxqfKzluxHU/rGqDS', 'test4@test.com', 'customer', 0),
('95f87a78-9961-4909-b16c-337ace048e2c', 'Test', 'Test', '$2y$12$RYqjoVd7zKmJ7cYu9syVv.1MMCFVNvHNNtHlOSD0Mt8lM9.IxJxwC', 'dabofa4156@dpcos.com', 'customer', 1),
('b66d68f9-4838-4927-99d1-d8dbd4b13e08', 'Test', 'Account', '$2y$12$2Lr3s/31mhEIBFKNc7ZdtOtnedFInjkxFeK/7FQwvI6TcY9kgDemm', 'tiwiw78120@bauscn.com', 'customer', 1),
('b73fe21d-437a-4d55-a62b-221573e86537', 'realemail', 'realemail', '$2y$12$C7E1flo2MDb8XSt8aJ8dhu9jY/wATps.iOgV77Eli3LJu41y89QrG', 'busy.trout.abdn@letterprotect.com', 'customer', 1),
('bbfbdb74-9d34-4378-abd1-191022e1bf38', 'Otel', 'Sorin', '$2y$10$g49K11/MGIVyLOphQmpCG.UZvbP2wNEFfRzkG3kPomF51mACON0rm', 'otelsorin@gmail.com', 'customer', 1),
('de6940bb-5297-4534-8f2a-0faa4a5c2755', 'dennis', 'dennis', '$2y$12$RjYX7cGcEZ1dobdEcGt.5.HPtwDLy60udolAPnk/B1oXDWLRQDC1q', 'dennis@dennis.com', 'customer', 0),
('f3429ee9-9e1a-4add-a484-4f0b7dbc15bd', 'Binde', 'Len', '$2y$12$ARTnZBi5sCAdgmVp6/DHUufraKnH7XsrcHA0YnlCz30Xckbu1bKX.', 'yiyapeg721@coasah.com', 'customer', 1),
('f65f7cdb-468f-4142-8b87-7538a87723aa', 'Dennis', 'Dennis', '$2y$12$lZzH4A69BI1rE3ZOoYnAz.aq9F/4Rk8dye6kn5N2yLDUW8Q6bI1OO', 'dennis@test.com', 'customer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `adress` text DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `adress`, `city`, `country`) VALUES
(1, 'NANNAI Noronha', 'BR 363', 'Fernando de Noronha', 'Brazil'),
(10123456, 'Hotel Solace', '10 Seaside Road', 'Barcelona', 'Spain'),
(10234567, 'Hotel Lumière', '88 Eiffel Blvd', 'Paris', 'France'),
(10345678, 'Royal Taj Inn', '22 Curry Lane', 'Delhi', 'India'),
(10456789, 'Sakura View Hotel', '55 Sakura St', 'Tokyo', 'Japan'),
(10567890, 'Coral Bay Lodge', '777 Kangaroo Way', 'Sydney', 'Australia'),
(10678901, 'Liberty Grand', '2 Liberty Ave', 'New York', 'USA'),
(10789012, 'Tulip Gardens Hotel', '98 Tulip Square', 'Amsterdam', 'Netherlands'),
(10890123, 'Maple Leaf Suites', '34 Maple Dr', 'Toronto', 'Canada'),
(10901234, 'Andes Escape', '19 Andes Ave', 'Santiago', 'Chile'),
(11012345, 'Savannah Resort', '123 Safari Trail', 'Nairobi', 'Kenya'),
(18381110, 'Munic City Hotel', 'Munichstraße 222', 'Munich', 'Germany'),
(42019678, 'Testhotel', 'Teststraße 22', 'Test', 'Test'),
(68916315, 'Joe&Joe', 'Beco do Boticário, 26', 'Rio de Janeiro', 'Brazil'),
(91145485, 'E', 'Frohnhauser Straße 145', 'Essen', 'Deutschland');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `travelbundle`
--

CREATE TABLE `travelbundle` (
  `id` varchar(36) NOT NULL DEFAULT '',
  `available_spaces` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `hotelid` varchar(36) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travelbundle`
--

INSERT INTO `travelbundle` (`id`, `available_spaces`, `price`, `hotelid`, `start_date`, `end_date`, `img_path`) VALUES
('17604161', 0, 1000.00, '18381110', '2025-07-03', '2025-07-10', 'https://www.grayline.com/wp-content/uploads/2025/05/shutterstock_2486175537-scaled.jpg'),
('20123456', 10, 850.00, '10123456', '2025-07-10', '2025-07-17', 'https://a.storyblok.com/f/239725/1440x832/098048a814/01_es_barcelona_hero.png/m/3840x2219'),
('20234567', 1, 960.00, '10234567', '2025-08-05', '2025-08-12', 'https://static.independent.co.uk/2025/04/25/13/42/iStock-1498516775.jpg'),
('20345678', 10, 720.00, '10345678', '2025-09-01', '2025-09-08', 'https://images.ctfassets.net/bth3mlrehms2/6Es3E3magIVIdIw7DqVecS/d2869442886911438779837b08a0b9cb/Inde_New_Dehli_Humayun_Tomb.jpg?w=1400&q=60&fm=webp'),
('20456789', 3, 1050.00, '10456789', '2025-07-20', '2025-07-27', 'https://www.universalweather.com/blog/wp-content/uploads/2019/07/tokyo-ops-7-19.jpg'),
('20567890', 8, 980.00, '10567890', '2025-10-01', '2025-10-08', 'https://www.sydneytravelguide.com.au/wp-content/uploads/2024/09/sydney-australia.jpg'),
('20678901', 6, 1120.00, '10678901', '2025-08-15', '2025-08-22', 'https://www.travelguide.net/media/new-york.jpeg'),
('20789012', 7, 890.00, '10789012', '2025-09-10', '2025-09-17', 'https://www.ab-in-den-urlaub.de/magazin/wp-content/uploads/2020/10/1603878302_Amsterdam-Niederlande.jpg'),
('20890123', 13, 870.00, '10890123', '2025-07-25', '2025-08-01', 'https://2024-rd-staging.nyc3.cdn.digitaloceanspaces.com/2024-prepare-for-canada/2022/01/16153618/Torronto-Main.jpg'),
('20901234', 10, 750.00, '10901234', '2025-11-01', '2025-11-08', 'https://back-packer.org/wp-content/uploads/Sehenswurdigkeiten-in-Santiago-de-Chile-14.jpg'),
('21012345', 15, 810.00, '11012345', '2025-12-10', '2025-12-17', 'https://www.asiliaafrica.com/wp-content/uploads/2024/04/Asilia-Africa_Destinations_Nairobi-1.jpg'),
('22397704', 18, 1500.00, '68916315', '2025-09-05', '2025-09-12', 'https://www.ahstatic.com/photos/b467_ho_01_p_1024x768.jpg'),
('44140653', 29, 1000.00, '42019678', '2025-08-08', '2025-08-29', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ35AJH9k29QYTK8cS3jTLiRJvqOW7lLsfegA&s'),
('71768307', 5, 100.00, '91145485', '2025-07-04', '2025-07-17', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpwPe8Tf4agwxjOFoeWFc4xe0YRdvqe3ckAw&s'),
('99348423', 15, 5000.00, '1', '2025-05-17', '2025-05-30', 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/365600045.jpg?k=38181ec1a901c07b001b49ea4ca458f91cc1d7499ec765cc507838c2dd056cdb&o=&hp=1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer` (`customerid`),
  ADD KEY `fk_travelbundle` (`travelbundleid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travelbundle`
--
ALTER TABLE `travelbundle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travelbundle_ibfk_1` (`hotelid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94054483;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_travelbundle` FOREIGN KEY (`travelbundleid`) REFERENCES `travelbundle` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
