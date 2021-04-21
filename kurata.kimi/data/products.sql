-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2021 at 06:07 PM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kimikurata_wnm608`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(13) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modify` datetime NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `image_main` varchar(256) NOT NULL,
  `image_thumbnail` varchar(256) NOT NULL,
  `image_other` varchar(512) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `description` text NOT NULL,
  `dimentions` text NOT NULL,
  `planter_type` varchar(56) NOT NULL,
  `plant_care` text NOT NULL,
  `watering` text NOT NULL,
  `on_sale` tinyint(1) NOT NULL,
  `discount` int(3) NOT NULL,
  `sale_start_date` date DEFAULT NULL,
  `sale_end_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `date_create`, `date_modify`, `product_name`, `category`, `image_main`, `image_thumbnail`, `image_other`, `price`, `description`, `dimentions`, `planter_type`, `plant_care`, `watering`, `on_sale`, `discount`, `sale_start_date`, `sale_end_date`) VALUES
(1, '2021-04-19 17:06:31', '2021-04-19 17:06:31', 'Moon Terrarium', 'Terrarium', 'moon_terrarium_1.png', 'moon_terrarium_thu.png', 'moon_terrarium_2.png, moon_terrarium_3.png', 214.99, 'Beautiful terrarium inspired from the moon surface textures and figures. Have a small piece of the moon on your balcony and take a trip all the way to the moon. ', '10” tall in a 12\" diameter hexagonal, 6\" height planter', 'Terra cotta', 'Bright to indirect light', 'Every 1-2 weeks', 0, 0, '2021-04-18', '2021-05-25'),
(2, '2021-04-19 17:28:12', '2021-04-19 17:28:12', 'Solstice Premium', 'Echeveria', 'solistice_premium_1.png', 'solistice_premium_thu.png', 'solistice_premium_2.png, solistice_premium_3.png', 35.00, 'Solstice premium is a tall plant with thick and rounded leaves that form a beautiful flower shape. It blooms pink and orange flowers every 2 years during the spring season.  ', '8\" tall in a 5 x 5 x 6 planter', 'Ceamic', 'Low to indirect light', 'Every 3 weeks', 0, 20, '2021-03-01', '2021-03-29'),
(3, '2021-04-19 17:36:11', '2021-04-19 17:36:11', 'Sunshine Beam', 'Echeveria', 'sunshine_beam_1.png', 'sunshine_beam_thu.png', 'sunshine_beam_2.png, sunshine_beam_3.png', 19.99, 'Get every day\'s sunshine from this irresistible flower shape succulent. This plant blooms yellow flowers every year.', '4” tall in a 6 x 6 x 6 planter', 'Plastic', 'Bright and direct light', 'Every 1 week', 0, 10, NULL, NULL),
(4, '2021-04-19 17:47:32', '2021-04-19 17:47:32', 'Space Star', 'Haworthia', 'space_star_1.png', 'space_star_thu.png', 'space_star_2.png, space_star_3.png', 10.50, 'Travel all the way to the geometry space world. These peculiar triangle-shaped leaves have white dots all over them. This is a plant easy to take care ideal for small spaces with direct light.', '2.5\" tall in a 2 x 2 x 2.5 planter', 'Ceamic', 'Bright to indirect light', 'Every 3-5 days', 0, 10, '2021-03-01', '2021-03-29'),
(5, '2021-04-19 17:50:51', '2021-04-19 17:50:51', 'Imperfect Perfection', 'Crassula', 'imperfect_perfection_1.png', 'imperfect_perfection_thu.png', 'imperfect_perfection_2.png, imperfect_perfection_3.png', 44.99, 'This succulent is a very hardy and ornamental plant with small, rounded, fleshy leaves tightly stacked, and usually multicolored resembling a string of beads like on a necklace.', '6” tall in a 6 x 6 x 6 planter', 'Plastic', 'Low to indirect light', 'Every 1-2 weeks', 0, 10, '2021-03-01', '2021-03-29'),
(6, '2021-04-19 17:52:45', '2021-04-19 17:52:45', 'Bubble Shot', 'Senecio', 'bubble_shot_1.png', 'bubble_shot_thu.png', 'bubble_shot_2.png, bubble_shot_3.png', 16.50, 'Bubble Shot is a beautiful, cascading succulent that will add that little quirk to any house.  with its small green bubbles along a slender stem, recalls the plastic pop-apart beads of childhood dress-up bins.', '0.5\" tall in an 3 x 3 x 3 planter', 'Plastic', 'Low to indirect light', 'Every 3 weeks', 0, 15, '2021-03-01', '2021-03-29'),
(7, '2021-04-19 17:55:05', '2021-04-19 17:55:05', 'Venus Flower', 'Echeveria', 'venus_flower_1.png', 'venus_flower_thu.png', 'venus_flower_2.png, venus_flower_3.png', 25.99, 'This is one of the most beautiful and easy to find succulents. It has a really nice purple-ish color along the edges.', '7\" tall in a 5 x 5 x 6 planter', 'Plastic', 'Bright and direct light', 'Every 1 week', 0, 15, '2021-03-01', '2021-03-29'),
(8, '2021-04-19 18:00:22', '2021-04-19 18:00:22', 'Red Venus', 'Echeveria', 'red_venus_1.png', 'red_venus_thu.png', 'red_venus_2.png, red_venus_3.png', 50.99, 'This beautiful echeveria has gorgeous dark green, purplish, and almost black leaves. Upon closer inspection, you will catch a tinge of yellowish-green in the center of the rosette which spreads outward to the tips of the leaves.', '6\" tall in a 12\" diameter hexagonal, 6\" height planter', 'Terra cotta', 'Bright and direct light', 'Every 3-5 days', 1, 50, '2021-04-19', '2025-08-29'),
(9, '2021-04-19 18:04:29', '2021-04-19 18:04:29', 'Lion Mane', 'Echeveria', 'lion_mane_1.png', 'lion_mane_thu.png', 'lion_mane_2.png, lion_mane_3.png', 15.99, 'Lion Mane is a succulent that has yellow and green variegated rosettes and deep red to plum margins when received plenty of sunlight or placed in cool temperatures. ', '2\" tall in a 3 x 3 x 4 planter', 'Terra cotta', 'Bright and direct light', 'Every 1-2 weeks', 1, 50, '2021-04-19', '2025-08-29'),
(10, '2021-04-19 18:06:03', '2021-04-19 18:06:03', 'Neptune Orbit ', 'Senecio', 'neptune_orbot_1.png', 'neptune_orbot_thu.png', 'neptune_orbot_2.png, neptune_orbot_3.png', 25.50, 'A small shrublet with thick, wedge-like leaves and a velvety coating. Its fuzzy leaves are striped green and cream and have a toothed edge like claws on a paw.', '6\" tall in a 3.5 x 3.5 x 3 planter', 'Plastic', 'Low to indirect light', 'Every 3-5 days', 1, 20, '2021-04-19', '2025-08-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
