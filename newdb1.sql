-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 06:24 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `img_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `heading`, `text`, `img_id`, `page_id`) VALUES
(1, 'Fighters', 'Designed for maneuvering engagements, these aircraft offer the greatest variety of tactics to use. Fighters are divided according to nation, design school, and the ways in which they can be employed in battle.', 4, 2),
(2, 'Multirole Figthers', 'Universal warplanes, designed for a wide range of combat tasks. These planes can conduct active maneuvering combat with enemy planes, and deal significant damage to ground targets for the benefit of their team.', 5, 2),
(3, 'Heavy Fighters', 'These hunters offer the advantages of heavy armament and good airspeed. Heavy fighters feature poor maneuverability and dynamics, but prove deadly in diving attacks. They often carry a rear gunner for defensive purposes.', 6, 2),
(4, 'Attack Aircraft', 'Strike aircraft ideal for destroying ground targets. These aircraft carry the widest range of bombs and rockets along with powerful machine guns and autocannons.', 7, 2),
(5, 'Bombers', 'High-speed aircraft designed to attack ground targets by dropping bombs from a high altitude. Carry high load of bombs and powerful defensive armament', 8, 2),
(6, 'Win and repeat', 'From 15 June Trough 18 June get x3 XP with the first victory', 9, 3),
(7, 'Weekly Missions & Offers', 'Both the weekly offers and weekend specials can be found inside the game', 10, 3),
(8, 'Materials to improve Equipment', 'Let\'s take a closer look at Materials the new type of in-game asset introduced in Update 2.0.5. You can find more in the game', 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `id_page` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `src`, `alt`, `id_page`) VALUES
(1, 'img/img1.png', 'World of Warplanes', 1),
(2, 'img/img2.png', 'World of Warplanes', 1),
(3, 'img/img3.png', 'World of Warplanes', 1),
(4, 'img/fighter.png', 'fighter', NULL),
(5, 'img/multirole.jpg', 'multirole', NULL),
(6, 'img/heavy.png', 'heavy fighter', NULL),
(7, 'img/aa.png', 'Attack aircraft', NULL),
(8, 'img/bomber.png', 'bombers', NULL),
(9, 'img/new1.png', 'wows news', NULL),
(10, 'img/new2.png', 'wows news', NULL),
(11, 'img/new3.png', 'wows news', NULL),
(12, 'img/gal.jpg', 'world of warplanes', 4),
(13, 'img/gal2.jpg', 'world of warplanes', 4),
(14, 'img/gal11.jpg', 'world of warplanes', 4),
(15, 'img/gal3.jpg', 'world of warplanes', 4),
(16, 'img/gal4.jpg', 'world of warplanes', 4),
(17, 'img/gal5.jpg', 'world of warplanes', 4),
(18, 'img/gal1.jpg', 'word of warplanes', 4),
(19, 'img/gal6.jpg', 'world of warplanes', 4),
(20, 'img/gal7.jpg', 'world of warplnes', 4),
(21, 'img/gal8.jpg', 'world of warplnes', 4),
(22, 'img/gal9.jpg', 'world of warplanes', 4),
(23, 'img/gal10.jpg', 'world of warplanes', 4),
(24, 'img/shop1.png', 'Lockheed XP-58 Chain Lightning', NULL),
(25, 'img/shop2.png', 'SNCAC NC 1070', NULL),
(26, 'img/shop3.png', 'Supermarine Seafang F.32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `page_id`) VALUES
(1, 'HOME', 1),
(2, 'WARPLANES', 2),
(3, 'NEWS', 3),
(4, 'GALLERY', 4),
(5, 'SHOP', 5),
(6, 'AUTHOR', 6),
(7, 'CONTACT US', 7);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `heading`, `href`) VALUES
(1, 'HOME', 'index.php'),
(2, 'TYPES OF AIRCRAFTS YOU CAN FIND IN THE GAME', 'warplanes'),
(3, 'LATEST NEWS', 'news'),
(4, 'GALLERY', 'gallery'),
(5, 'WELCOME TO THE SHOP', 'shop'),
(6, 'AUTHOR', 'author'),
(7, 'GET IN TOUCH', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `price`, `img_id`) VALUES
(1, 'Lockheed XP-58 Chain Lightning 	', '$10', 24),
(2, 'SNCAC NC 1070', '$20', 25),
(3, 'Supermarine Seafang F.32', '$30', 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mark` int(10) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `mark`, `id_role`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 2),
(8, 'yyyzzx@gmail.com', '0ffe2ec53ff3f8c3bdfa960c259b7225', 1, 2),
(9, 'jokanovic.ignjat@gmail.com', '0ffe2ec53ff3f8c3bdfa960c259b7225', 0, 2),
(10, 'username@gmail.com', '5d026fa9c54a6920ae377d6dd685f6ec', 0, 2),
(11, 'user.name@gmail.com', '5d026fa9c54a6920ae377d6dd685f6ec', 0, 2),
(12, 'exe.ignjat@gmail.com', '0ffe2ec53ff3f8c3bdfa960c259b7225', 0, 2),
(13, 'example@gmail.com', '1a79a4d60de6718e8e5b326e338ae533', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_img` (`id_page`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`img_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_page`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
