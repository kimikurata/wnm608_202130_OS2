-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2021 at 01:57 AM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.27

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
  `id` int(20) NOT NULL,
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
(1, '2021-04-23 18:09:44', '2021-04-23 18:09:44', 'Moon Terrarium', 'Terrarium', 'moon_terrarium_1.png', 'moon_terrarium_thu.png', 'moon_terrarium_2.png,moon_terrarium_3.png', 214.99, 'Beautiful terrarium inspired from the moon surface textures and figures. Have a small piece of the moon on your balcony and take a trip all the way to the moon. ', '10” tall in a 12\" diameter hexagonal, 6\" height planter', 'Terra cotta', 'Bright to indirect light', 'Every 1-2 weeks', 0, 0, '2021-04-18', '2021-05-25'),
(2, '2021-04-23 18:14:19', '2021-04-23 18:14:19', 'Solstice Premium', 'Echeveria', 'solistice_premium_1.png', 'solistice_premium_thu.png', 'solistice_premium_2.png,solistice_premium_3.png', 35.00, 'Solstice premium is a tall plant with thick and rounded leaves that form a beautiful flower shape. It blooms pink and orange flowers every 2 years during the spring season.  ', '8\" tall in a 5 x 5 x 6 planter', 'Ceramic', 'Low to indirect light', 'Every 3 weeks', 0, 20, '2021-03-01', '2021-03-29'),
(3, '2021-04-23 18:13:54', '2021-04-23 18:13:54', 'Sunshine Beam', 'Echeveria', 'sunshine_beam_1.png', 'sunshine_beam_thu.png', 'sunshine_beam_2.png,sunshine_beam_3.png', 19.99, 'Get every day\'s sunshine from this irresistible flower shape succulent. This plant blooms yellow flowers every year.', '4” tall in a 6 x 6 x 6 planter', 'Plastic', 'Bright and direct light', 'Every 1 week', 0, 10, '2021-03-01', '2021-03-29'),
(4, '2021-04-23 18:13:05', '2021-04-23 18:13:05', 'Space Star', 'Senecio', 'space_star_1.png', 'space_star_thu.png', 'space_star_2.png,space_star_3.png', 10.50, 'Travel all the way to the geometry space world. These peculiar triangle-shaped leaves have white dots all over them. This is a plant easy to take care ideal for small spaces with direct light.', '2.5\" tall in a 2 x 2 x 2.5 planter', 'Ceramic', 'Bright to indirect light', 'Every 3-5 days', 1, 10, '2021-04-19', '2025-08-29'),
(5, '2021-04-23 18:12:39', '2021-04-23 18:12:39', 'Imperfect Perfection', 'Senecio', 'imperfect_perfection_1.png', 'imperfect_perfection_thu.png', 'imperfect_perfection_2.png,imperfect_perfection_3.png', 44.99, 'This succulent is a very hardy and ornamental plant with small, rounded, fleshy leaves tightly stacked, and usually multicolored resembling a string of beads like on a necklace.', '6” tall in a 6 x 6 x 6 planter', 'Plastic', 'Low to indirect light', 'Every 1-2 weeks', 0, 10, '2021-03-01', '2021-03-29'),
(6, '2021-04-23 18:11:42', '2021-04-23 18:11:42', 'Bubble Shot', 'Senecio', 'bubble_shot_1.png', 'bubble_shot_thu.png', 'bubble_shot_2.png,bubble_shot_3.png', 16.50, 'Bubble Shot is a beautiful, cascading succulent that will add that little quirk to any house.  with its small green bubbles along a slender stem, recalls the plastic pop-apart beads of childhood dress-up bins.', '0.5\" tall in an 3 x 3 x 3 planter', 'Plastic', 'Low to indirect light', 'Every 3 weeks', 0, 15, '2021-03-01', '2021-03-29'),
(7, '2021-04-23 18:11:16', '2021-04-23 18:11:16', 'Venus Flower', 'Echeveria', 'venus_flower_1.png', 'venus_flower_thu.png', 'venus_flower_2.png,venus_flower_3.png', 25.99, 'This is one of the most beautiful and easy to find succulents. It has a really nice purple-ish color along the edges.', '7\" tall in a 5 x 5 x 6 planter', 'Plastic', 'Bright and direct light', 'Every 1 week', 0, 15, '2021-03-01', '2021-03-29'),
(8, '2021-04-23 18:10:46', '2021-04-23 18:10:46', 'Red Venus', 'Echeveria', 'red_venus_1.png', 'red_venus_thu.png', 'red_venus_2.png,red_venus_3.png', 50.99, 'This beautiful echeveria has gorgeous dark green, purplish, and almost black leaves. Upon closer inspection, you will catch a tinge of yellowish-green in the center of the rosette which spreads outward to the tips of the leaves.', '6\" tall in a 12\" diameter hexagonal, 6\" height planter', 'Terra cotta', 'Bright and direct light', 'Every 3-5 days', 1, 50, '2021-04-19', '2025-08-29'),
(9, '2021-04-23 18:10:27', '2021-04-23 18:10:27', 'Lion Mane', 'Echeveria', 'lion_mane_1.png', 'lion_mane_thu.png', 'lion_mane_2.png,lion_mane_3.png', 15.99, 'Lion Mane is a succulent that has yellow and green variegated rosettes and deep red to plum margins when received plenty of sunlight or placed in cool temperatures. ', '2\" tall in a 3 x 3 x 4 planter', 'Terra cotta', 'Bright and direct light', 'Every 1-2 weeks', 0, 50, '2021-03-01', '2021-03-29'),
(10, '2021-04-23 18:10:08', '2021-04-23 18:10:08', 'Neptune Orbit ', 'Senecio', 'neptune_orbit_1.png', 'neptune_orbit_thu.png', 'neptune_orbit_2.png,neptune_orbit_3.png', 25.50, 'A small shrublet with thick, wedge-like leaves and a velvety coating. Its fuzzy leaves are striped green and cream and have a toothed edge like claws on a paw.', '6\" tall in a 3.5 x 3.5 x 3 planter', 'Plastic', 'Low to indirect light', 'Every 3-5 days', 0, 20, '2021-03-01', '2021-03-29'),
(11, '2021-04-09 17:52:07', '2021-04-09 17:52:07', 'Strawberry Planter', 'Accessory', 'strawberry_pot_1.png', 'strawberry_pot_thu.png', 'strawberry_pot_2.png,strawberry_pot_3.png', 4.99, 'Great for the home, in the office, and more. Perfect for use indoors in a variety of rooms or outside on patios, porches, in gardens, on walkways, and more.', ' 5\" Dia x 4\" height', 'Ceramic', 'Wipe clean with a damp cloth.', 'Not applicable', 1, 50, '2021-04-19', '2021-05-25'),
(12, '2021-04-09 17:47:40', '2021-04-09 17:47:40', 'Origami Planter', 'Accessory', 'origami_pot_1.png', 'origami_pot_thu.png', 'origami_pot_2.png,origami_pot_3.png', 3.79, 'Round ceramic planter with shiny glaze finish. Weather-resistant design for use indoors or out perfect for bright flowering plants, cactus, succulents, and more.', ' 5\" Dia x 4\" height', 'Ceramic', 'Wipe clean with a damp cloth.', 'Not applicable', 1, 50, '2021-04-19', '2021-05-25'),
(13, '2021-04-09 17:45:31', '2021-04-09 17:45:31', 'Blue Ship Planter', 'Accessory', 'blue_ship_pot_1.png', 'blue_ship_pot_thu.png', 'blue_ship_pot_2.png,blue_ship_pot_3.png', 9.74, 'Ideal for indoor or outdoor use, \r\nmade from lightweight recycled materials also resistant to frost and fade.', '12\" Dia x 8\" height', 'Plastic', 'Wipe clean with a damp cloth.', 'Not applicable', 1, 50, '2021-04-19', '2021-05-25'),
(14, '2021-04-23 18:13:37', '2021-04-23 18:13:37', 'Lotto Sensation', 'Echeveria', 'lotto_sensation_1.png', 'lotto_sensation_thu.png', 'lotto_sensation_2.png,lotto_sensation_3.png', 30.30, 'Lotto sensation is a favorite succulent for a lot of people! She’s a really pretty light purple color and has a perfectly shaped rosette.  Displays beautiful yellow, bell-shaped flowers in the Spring.', '5\" tall in a 5 x 5 x 5 planter', 'Ceramic', 'Bright to indirect light', 'Every 3 weeks', 0, 20, '2021-03-01', '2021-03-29'),
(15, '2021-04-23 18:09:16', '2021-04-23 18:09:16', 'Earth Utopia', 'Terrarium', 'earth_utopia_1.png', 'earth_utopia_thu.png', 'earth_utopia_2.png,earth_utopia_3.png', 120.67, 'In this stylish hexagon-shaped planter, you\'ll find a wonderful variety of succulents in different shapes, colors, and sizes—all of which will flourish with the help of easy care.', '8” tall in a 12\" diameter hexagonal, 6\" height planter', 'Terra cotta', 'Bright to indirect light', 'Every 3 weeks', 0, 10, '2021-03-01', '2021-03-29');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
