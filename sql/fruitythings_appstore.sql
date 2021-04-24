-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 04:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitythings_appstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `address`, `phone`, `user_id`) VALUES
(1, '123 Admin Lane,\r\nAdmin City,\r\nCo. Adminton,\r\nAdminland', '012-345-6789', 1),
(2, '321 Customer Lane,\r\nCustomer City,\r\nCo. Custo,\r\nCustland', '123-456-7891', 2);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Action RPG'),
(2, 'Roguelike'),
(3, 'Arcade'),
(4, 'Racing'),
(5, 'Real Time Strategy'),
(6, 'Simulator'),
(7, 'Point & Click'),
(8, 'Turn Based Strategy'),
(9, 'Adventure'),
(10, 'Horror'),
(11, 'First Person Shooter'),
(12, 'Sandbox'),
(13, 'Roguelite');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`) VALUES
(1, 'uploads/placeholder.jpg'),
(2, 'uploads/1618852078607db8eea6879.png'),
(3, 'uploads/1617808291606dcba38fb35.jpg'),
(4, 'uploads/darksouls3.jpg'),
(5, 'uploads/dyinglight.jpeg'),
(6, 'uploads/endzone.jpg'),
(7, 'uploads/golfwithyourfriends.jpeg'),
(8, 'uploads/novadrift.jpeg'),
(9, 'uploads/outriders.jpeg'),
(10, 'uploads/projectzomboid.jpg'),
(11, 'uploads/ror2.png'),
(12, 'uploads/satisfactory.jpeg'),
(13, 'uploads/soma.jpeg'),
(14, 'uploads/squad.jpeg'),
(15, 'uploads/stellaris.jpg'),
(16, 'uploads/theyarebillions.jpeg'),
(17, 'uploads/gtfo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `payment_method`, `customer_id`) VALUES
(6, '2021-04-09', 'Credit Card', 2),
(7, '2021-04-09', 'Credit Card', 2),
(8, '2021-04-09', 'Credit Card', 2),
(9, '2021-04-09', 'Credit Card', 2),
(10, '2021-04-09', 'Credit Card', 2),
(11, '2021-04-09', 'Credit Card', 2),
(12, '2021-04-09', 'Credit Card', 2),
(13, '2021-04-19', 'Credit Card', 2),
(14, '2021-04-19', 'Credit Card', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`) VALUES
(1, 6, 2),
(2, 6, 7),
(3, 6, 10),
(4, 7, 2),
(5, 7, 7),
(6, 7, 10),
(7, 8, 2),
(8, 8, 7),
(9, 8, 10),
(10, 9, 2),
(11, 9, 7),
(12, 9, 10),
(13, 10, 2),
(14, 10, 7),
(15, 10, 10),
(16, 11, 7),
(17, 11, 9),
(18, 11, 6),
(19, 12, 7),
(20, 12, 9),
(21, 12, 6),
(22, 13, 1),
(23, 14, 11),
(24, 14, 2),
(25, 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `age_rating` enum('3+','7+','13+','18+') NOT NULL,
  `average_rating` enum('Overwhelmingly Positive','Very Positive','Positive','Mostly Positive','Mixed','Mostly Negative','Negative','Very Negative','Overwhelmingly Negative') NOT NULL,
  `release_date` date NOT NULL,
  `on_windows` tinyint(1) DEFAULT NULL,
  `on_linux` tinyint(1) DEFAULT NULL,
  `on_mac` tinyint(1) DEFAULT NULL,
  `developer` varchar(40) NOT NULL,
  `publisher` varchar(40) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `age_rating`, `average_rating`, `release_date`, `on_windows`, `on_linux`, `on_mac`, `developer`, `publisher`, `genre_id`, `image_id`) VALUES
(1, 'Nova Drift', 'If Asteroids were a roguelite!', '13.99', '3+', 'Overwhelmingly Positive', '2019-03-27', 1, 1, 1, 'Chimeric', 'Pixeljam', 13, 8),
(2, 'Risk of Rain 2', 'Expect many showers and no sun.', '19.99', '7+', 'Overwhelmingly Positive', '2021-03-10', 1, 1, 0, 'Hopoo Games', 'Gearbox Publishing', 2, 11),
(3, 'They Are Billions', ' They Are Billions is a strategy game in a distant future about building and managing human colonies after a zombie apocalypse destroyed almost all of human kind.', '29.99', '13+', 'Very Positive', '2020-09-10', 1, 1, 0, 'Numantian Games', 'Numantian Games', 5, 16),
(4, 'Project Zomboid ', 'Project Zomboid is an open-ended zombie-infested sandbox. It asks one simple question – how will you die? ', '13.99', '13+', 'Positive', '2021-04-15', 1, 1, 1, 'The Indie Stone', 'The Indie Stone', 10, 10),
(5, 'OUTRIDERS', 'OUTRIDERS is a 1-3 player co-op RPG shooter set in an original, dark and desperate sci-fi universe. ', '59.99', '18+', 'Very Positive', '2021-04-30', 1, 1, 1, 'People Can Fly', 'Square Enix', 1, 9),
(6, 'RARhammer 30k', 'The endless trials start now.', '6.66', '13+', 'Very Positive', '2020-10-08', 1, 1, 0, 'FruityThings', 'FruityThings', 1, 2),
(7, 'Satisfactory', 'Satisfactory is a first-person open-world factory building game with a dash of exploration and combat. Play alone or with friends, explore an alien planet, create multi-story factories, and enter conveyor belt heaven!', '29.99', '7+', 'Mixed', '2021-06-10', 1, 1, 1, 'Coffee Stain Studios', 'Coffee Stain Publishing', 12, 12),
(8, 'Coffee Drinkers Anonymous', 'I like to drink coffee and you will too.', '8.40', '3+', 'Mixed', '2021-01-18', 1, 1, 1, 'FruityThings', 'FruityThings', 6, 3),
(9, 'SOMA', 'SOMA is a sci-fi horror game from Frictional Games, the creators of Amnesia: The Dark Descent. It is an unsettling story about identity, consciousness, and what it means to be human.', '27.99', '18+', 'Positive', '2021-03-26', 1, 0, 1, 'Frictional Games', 'Frictional Games', 10, 13),
(10, 'Dying Light', 'From the creators of hit titles Dead Island and Call of Juarez. Winner of over 50 industry awards and nominations. The game whose uncompromising approach to gameplay set new standards for first-person zombie games. Still supported with new content and free community events years after the release.', '39.99', '18+', 'Mostly Positive', '2020-07-15', 1, 0, 0, 'Techland', 'Techland', 10, 5),
(11, 'Stellaris', 'Get ready to explore, discover and interact with a multitude of species as you journey among the stars. Forge a galactic empire by sending out science ships to survey and explore, while construction ships build stations around newly discovered planets. Discover buried treasures and galactic wonders as you spin a direction for your society, creating limitations and evolutions for your explorers. Alliances will form and wars will be declared.', '39.99', '7+', 'Overwhelmingly Positive', '2021-04-30', 1, 1, 1, 'Paradox Development Studio', 'Paradox Interactive', 8, 15),
(13, 'DARK SOULS™ III Deluxe Edition', 'DARK SOULS™ III continues to push the boundaries with the latest, ambitious chapter in the critically-acclaimed and genre-defining series.', '84.98', '13+', 'Overwhelmingly Positive', '2019-06-12', 1, 1, 1, 'FromSoftware, Inc.', 'BANDAI NAMCO Entertainment', 1, 4),
(14, 'Squad', 'Squad is a large scale combined arms multiplayer first-person shooter emphasizing combat realism through communication, team play, emphasizing strong squad cohesion mechanics as well as larger-scale coordination, tactics, and planning.', '44.99', '18+', 'Positive', '2020-05-13', 1, 1, 0, 'Offworld Industries', 'Offworld Industries', 11, 14),
(15, 'Golf With Your Friends', '', '14.99', '3+', 'Very Positive', '2019-05-08', 1, 1, 1, 'Blacklight Interactive', 'Team 17', 3, 7),
(16, 'GTFO', 'GTFO is a 4 player action/horror cooperative first-person shooter for hardcore gamers looking for a real challenge. Players get to play as a team of prisoners, forced to explore and extract valuable artifacts from a vast underground complex that has been overrun by terrifying creatures. Gather weapons, tools, and resources to help you survive - and work to unearth the answers about your past and how to escape. ', '34.99', '18+', 'Very Positive', '2020-10-14', 1, 0, 0, '10 Chambers Collective', '10 Chambers Collective', 10, 17),
(17, 'Endzone - A World Apart', 'In 2021, a group of terrorists blew up nuclear power plants around the world and plunged the world into chaos. Only few were able to escape into underground facilities called \"Endzones\". 150 years later, mankind returns to the surface - under your command! In an extremely hostile environment full of radioactivity, contaminated rain and extreme climate change, you\'ll have to prove your worth as a leader.', '29.99', '7+', 'Very Positive', '2020-02-07', 1, 1, 1, 'Gentlymad Studios', 'Assemble Entertainment', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(4, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(40) NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role_id`) VALUES
(1, 'admin@test.ie', '$2y$10$Y6DwtMSCc.IFl7deJVhA/ur6klE/bKgqXcAkE.VJ4ZgYwzkyQH8dW', 'Seán Óg', 1),
(2, 'customer@test.ie', '$2y$10$ltZHrBX2cV8C88Mnzqe/8ecgfIKmRL3yK83Ah4dIrlvloqPqA.Qj2', 'Mr. Customer', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_customers_fk` (`user_id`) USING BTREE;

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_orders_fk` (`customer_id`) USING BTREE;

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_orders_products_fk` (`order_id`) USING BTREE,
  ADD KEY `products_orders_products_fk` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_genres_fk` (`genre_id`),
  ADD KEY `products_images_fk` (`image_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_users_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customers_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_orders_products_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `products_orders_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_genres_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `products_images_fk` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles_users_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
