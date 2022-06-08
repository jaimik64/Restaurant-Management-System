-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2021 at 06:35 PM
-- Server version: 10.3.27-MariaDB-cll-lve
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
-- Database: `yajmanre_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `banquet_booking_user`
--

CREATE TABLE `banquet_booking_user` (
  `Bbid` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(250) NOT NULL,
  `reason_to_book` varchar(200) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `extra_services` varchar(250) NOT NULL,
  `total_bill` int(12) NOT NULL,
  `remaining_payment` int(12) NOT NULL,
  `status` int(2) NOT NULL,
  `no_of_slots` int(10) NOT NULL,
  `mbid` int(10) NOT NULL,
  `end_time` time NOT NULL,
  `person` int(12) NOT NULL,
  `menu_plan` int(12) NOT NULL,
  `booking_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banquet_booking_user`
--


--
-- Table structure for table `banquet_installment`
--

CREATE TABLE `banquet_installment` (
  `Bid` int(10) NOT NULL,
  `Booking_id` int(10) NOT NULL,
  `type` varchar(150) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banquet_installment`
--

--
-- Table structure for table `banquet_menu`
--

CREATE TABLE `banquet_menu` (
  `booking_id` int(10) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banquet_menu`
--

INSERT INTO `banquet_menu` (`booking_id`, `details`, `price`, `description`) VALUES
(191, '                        Drink-1    Starter        Veggies-1    Paneer(Special)  Kadhi  Pulav  Roti Naan     Ice-Cream_With_Two_Sauce    Soup    Butter-Milk Special-Sweet                        ', 250, ''),
(192, '                            Starter  Salad-2 Farsan  Baked-Dish         Kadhi   Biryani     Paratha      Soup     Special-Sweet                        ', 210, 'Customized Plan'),
(192, '                        Selected Items Here                        ', 210, ''),
(192, '                        Drink-1     Salad-1   Snacks Baked-Dish       Paneer(Special)    Pulav       Sweet(Regular)  Ice-Cream_With_Three_Sauce                                ', 220, ''),
(192, '                        Selected Items Here                        ', 210, ''),
(192, '                        Selected Items Here                        ', 190, ''),
(192, '                        Selected Items Here                        ', 100, ''),
(192, '                        Selected Items Here                        ', 200, ''),
(193, '                        Drink-1    Starter    Snacks    Veggies-1   Paneer Paneer(Special) Dal  Rice                 Butter-Milk                         ', 200, ''),
(193, '                         Drink-2 Soup-1   Salad-1    Baked-Dish   Veggies-1    Paneer(Special) Dal  Rice    Naan     Ice-Cream_With_Two_Sauce      Tea/Coffee                           ', 250, ''),
(193, '                         Drink-2   Starter    Snacks    Veggies-1    Paneer(Special) Dal  Rice   Roti  Tawa-Roti    Ice-Cream_With_Two_Sauce       Chaat  Special-Sweet                        ', 250, ''),
(196, '                        Drink-1    Starter    Snacks    Veggies-1   Paneer Paneer(Special) Dal  Rice                                          ', 200, ''),
(203, '                        Selected Items Here                        ', 260, '');

-- --------------------------------------------------------

--
-- Table structure for table `banquet_menu_plan`
--

CREATE TABLE `banquet_menu_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `menu` varchar(2000) NOT NULL,
  `price` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banquet_menu_plan`
--

INSERT INTO `banquet_menu_plan` (`id`, `name`, `menu`, `price`) VALUES
(1, 'Plan 1', 'Any One Soup, One Starter, Greeen Salad, Two Subji(ONE Punjabi, ONE VEG.), DAL, RICE, TWO TYPES OF ROTIES, ONE PLAIN ICE-CREAM, ACCOMPANIMENTS, PAPAD, PICKLE, CHUTNEY', 250),
(2, 'Plan 2', 'Any One Welcome Drink, Choice Of any  Soup, Green Salad, One Farsan, One Sweet(Regular), One Paneer(Special), One Veg.(Special), Dal/Kadhi, Rice/Pulav/Biryani, Two Types Of Roti, Plain Ice-cream, Accompaniments, Papad, Pickle, Chutney', 300),
(3, 'Plan 3', 'Any One Welcome Drink, One Soup, One Starter, Green Salad, Two Veggies, One Dal, One Rice, Two Types Of Roties, One Sweet(Regular), One Plain Ice-cream With Three Sauce(Vanilla, Strawberry, Cherry Berry)(Limited), Accompaniments ', 350),
(4, 'Plan 4', 'Any One Welcome Drink, Two Soups, One Starter, One Salad, One Baked Dish, Two Veggies, One Dal , One Rice/Pulav, Two Types Of Roties, One Sweet (Premium), One Plain Ice-cream with Three Sauce(Vanilla / Strawberry/Cherry-Berry)(Limited), Accompaniments, Papad, Pickle, Chutney', 450),
(5, 'Plan 5', 'Any Two Welcome Drink, Two Soups, One Starter, Two Salad, One Farsan/Snacks , One Baked Dish,  One Italian/ Mexican, Three Veggies, One Dal/Kadhi, One Rice/Pulav/Biryani, Three Types Of Roties(Roti/Kulcha/Naan), One Sweet(Regular), One Sweet(Premium), One Plain Ice-Cream With Three Sauces(Vanilla/Strawberry/Cherry-Berry), Accompaniment, Papad, Pickle, Chutney   ', 550);

-- --------------------------------------------------------

--
-- Table structure for table `banquet_plans`
--

CREATE TABLE `banquet_plans` (
  `mbid` int(10) NOT NULL,
  `feature_list` varchar(150) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banquet_plans`
--

INSERT INTO `banquet_plans` (`mbid`, `feature_list`, `plan_name`, `price`, `img`) VALUES
(3, 'Wedding Sofa, Fulll Decoration', 'Design - 7', 21000, 'plan_image/Rs. 21000.jpeg'),
(10, 'Birhday Decoration', 'Design - 2', 8000, 'plan_image/Rs - 8000.jpeg'),
(11, 'All decoration ', 'Design - 6', 12000, 'plan_image/Rs. 12000.jpeg'),
(12, 'All decoration ', 'Design - 1', 5000, 'plan_image/ss1.jpg'),
(13, 'Birhday Decoration', 'Design - 3', 8000, 'plan_image/Rs. 8000.jpeg'),
(14, 'All decoration ', 'Design - 4', 10000, 'plan_image/Rs. 10000.jpeg'),
(15, 'Full Decoration', 'Design - 5', 11000, 'plan_image/Rs. 11000.jpeg'),
(16, 'Full Decoration', 'Design - 8', 25000, 'plan_image/Rs. 25000.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `name`, `img`) VALUES
(1, 'Soup & Chinese Shorba', 'menu_img/'),
(3, 'Tandoori Starters', 'menu_img/tandoori.jpg'),
(4, 'Chinese Starters', 'menu_img/tandoori.jpg'),
(5, 'Pantry', 'menu_img/pantry.jpg'),
(6, 'Raita', 'menu_img/pantry.jpg'),
(7, 'Paneer Se...', 'menu_img/paneer.jpg'),
(8, 'Vegetable Se...', 'menu_img/vegetable se.jpg'),
(9, 'Kofta', 'menu_img/kofta 1.jpg'),
(10, 'Kajuwali', 'menu_img/kajuwali.jpg'),
(11, 'Mushroom', 'menu_img/mushroom.jpg'),
(12, 'Chinese Main Course', 'menu_img/chinese.jpg'),
(13, 'Chinese Rice Se...', 'menu_img/rice.jpg'),
(14, 'Sizzler Hot', 'menu_img/sizler.jpg'),
(15, 'Tandoor Ka Kamal', 'menu_img/tandoor.jpg'),
(16, 'Basmati Ka Kamal...', 'menu_img/rice1.jpg'),
(17, 'Dal Se...', 'menu_img/dal.jpg'),
(18, 'Fast Food', 'menu_img/f1.jpg'),
(19, 'Pasta', 'menu_img/pasta.jpg'),
(20, 'Kathiyawadi', 'menu_img/kathiyawadi.jpg'),
(21, 'Continental', 'menu_img/c.jpg'),
(22, 'Hot Beverages', 'menu_img/tea.jpg'),
(23, 'Appetizer', 'menu_img/lime water.jpg'),
(24, 'Ice Cream', 'menu_img/ice.jpg'),
(25, 'Thaali', 'menu_img/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `comments` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `foid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `mid` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_order`
--


--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `mid` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `priority` int(10) NOT NULL,
  `restaurant_show` varchar(10) NOT NULL,
  `takeaway_show` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`mid`, `name`, `image`, `description`, `priority`, `restaurant_show`, `takeaway_show`, `price`, `type`) VALUES
(18, 'Tomato Soup', '', '', 2, 'YES', 'YES', 90, 1),
(19, 'Minestrone Soup', '', '', 2, 'YES', 'YES', 100, 1),
(20, 'Veg. Clear Soup', '', '', 2, 'YES', 'YES', 90, 1),
(21, 'Veg. Sweet Corn Soup', '', '', 2, 'YES', 'YES', 100, 1),
(22, 'Veg. Munchow Soup', '', '', 2, 'YES', 'YES', 110, 1),
(23, 'Veg. Hot & Sour Soup', '', '', 2, 'YES', 'YES', 110, 1),
(24, 'Veg. Manchurian Soup', '', '', 2, 'YES', 'YES', 115, 1),
(25, 'Broccoli Almond Soup', '', '', 2, 'YES', 'YES', 120, 1),
(26, 'Cheese Corn Soup', '', '', 2, 'YES', 'YES', 130, 1),
(27, 'Lemon Coriander Soup', '', '', 2, 'YES', 'YES', 120, 1),
(28, 'Cream Of Mushroom Soup', '', '', 3, 'YES', 'YES', 125, 1),
(29, 'Palak Ka Shorba', '', '', 3, 'YES', 'YES', 100, 1),
(30, 'Hara Bhara Kabab', '', '', 3, 'YES', 'YES', 180, 3),
(31, 'Veg. Sheek Kabab', '', '', 2, 'YES', 'YES', 190, 3),
(32, 'Veg. Rock Kabab', '', '', 2, 'YES', 'YES', 200, 3),
(33, 'Resmi Kabab', '', '', 3, 'YES', 'YES', 200, 3),
(34, 'Veg. Dahi Kabab', '', '', 2, 'YES', 'YES', 190, 3),
(35, 'Paneer Tikka Dry', '', '', 2, 'YES', 'YES', 210, 3),
(36, 'Paneer Garlic Tikka Dry', '', '', 2, 'YES', 'YES', 210, 3),
(37, 'Paneer Hariyali Tikka Dry', '', '', 2, 'YES', 'YES', 215, 3),
(38, 'Paneer Achari Tikka Dry', '', '', 2, 'YES', 'YES', 215, 3),
(39, 'Paneer Ajwani Tikka Dry', '', '', 2, 'YES', 'YES', 220, 3),
(40, 'Paneer Chilly Dry', '', '', 3, 'YES', 'YES', 200, 4),
(41, 'Paneer 65', '', '', 2, 'YES', 'YES', 200, 4),
(42, 'Paneer Manchurian Dry', '', '', 1, 'YES', 'YES', 200, 4),
(43, 'Paneer Crunchy Dry', '', '', 3, 'YES', 'YES', 210, 4),
(44, 'Veg. Spring Roll', '', '', 2, 'YES', 'YES', 190, 4),
(45, 'Veg. Crispy', '', '', 3, 'YES', 'YES', 190, 4),
(46, 'Veg. 65', '', '', 2, 'YES', 'YES', 180, 4),
(47, 'Cheese Balls', '', '', 2, 'YES', 'YES', 210, 4),
(48, 'Mushroom Chilly Dry', '', '', 2, 'YES', 'YES', 200, 4),
(49, 'Baby Corn Chilly Dry', '', '', 2, 'YES', 'YES', 200, 4),
(50, 'Veg. Manchurian Dry', '', '', 3, 'YES', 'YES', 150, 4),
(51, 'Green Salad', '', '', 2, 'YES', 'YES', 60, 5),
(52, 'Tomato Salad', '', '', 2, 'YES', 'YES', 40, 5),
(53, 'Russian Salad', '', '', 2, 'YES', 'YES', 70, 5),
(54, 'Cucumber Salad', '', '', 2, 'YES', 'YES', 50, 5),
(55, 'Roasted Papad', '', '', 2, 'YES', 'YES', 20, 5),
(56, 'Masala Papad', '', '', 2, 'YES', 'YES', 25, 5),
(57, 'Fried Papad', '', '', 3, 'YES', 'YES', 20, 5),
(58, 'Butter Milk', '', '', 2, 'YES', 'YES', 20, 5),
(59, 'Masala Butter Milk', '', '', 2, 'YES', 'YES', 30, 5),
(60, 'Lassi Salt', '', '', 2, 'YES', 'YES', 40, 5),
(61, 'Lassi Sweet', '', '', 2, 'YES', 'YES', 45, 5),
(62, 'S.P.L Lassi', '', '', 2, 'YES', 'YES', 80, 5),
(63, 'S.P.L Lassi With Ice Cream', '', '', 3, 'YES', 'YES', 100, 5),
(64, 'Mix Raita', '', '', 3, 'YES', 'YES', 45, 6),
(65, 'Mix Fruit Raita', '', '', 3, 'YES', 'YES', 50, 6),
(66, 'Boondi Raita', '', '', 2, 'YES', 'YES', 60, 6),
(67, 'Onion Raita', '', '', 3, 'YES', 'YES', 50, 6),
(68, 'Paneer Butter Masala', '', '', 3, 'YES', 'YES', 170, 7),
(69, 'Paneer Tikka Masala', '', '', 3, 'YES', 'YES', 180, 7),
(70, 'Paneer Kadai', '', '', 3, 'YES', 'YES', 170, 7),
(71, 'Paneer Handi', '', '', 3, 'YES', 'YES', 180, 7),
(72, 'Paneer Balti', '', '', 3, 'YES', 'YES', 170, 7),
(73, 'Paneer Tawa Masala', '', '', 2, 'YES', 'YES', 180, 7),
(74, 'Paneer Patiala', '', '', 3, 'YES', 'YES', 190, 7),
(75, 'Paneer Angara', '', '', 2, 'YES', 'YES', 190, 7),
(76, 'Paneer Laziz', '', '', 3, 'YES', 'YES', 190, 7),
(77, 'Paneer Do Payaza', '', '', 3, 'YES', 'YES', 180, 7),
(78, 'Paneer Toofani', '', '', 2, 'YES', 'YES', 190, 7),
(79, 'Paneer Chatpata', '', '', 2, 'YES', 'YES', 190, 7),
(80, 'Paneer Adraki', '', '', 2, 'YES', 'YES', 180, 7),
(81, 'Paneer Pasanda', '', '', 3, 'YES', 'YES', 190, 7),
(82, 'Palak Paneer', '', '', 2, 'YES', 'YES', 150, 7),
(83, 'Mutter Paneer', '', '', 2, 'YES', 'YES', 130, 7),
(84, 'Paneer Bhurji', '', '', 3, 'YES', 'YES', 200, 7),
(85, 'Yajmaan Special Paneer', '', '', 2, 'YES', 'YES', 230, 7),
(86, 'Mix Veg.', '', '', 2, 'YES', 'YES', 100, 8),
(87, 'Veg. Makhanwala', '', '', 2, 'YES', 'YES', 120, 8),
(88, 'Veg. Kolhapuri', '', '', 2, 'YES', 'YES', 130, 8),
(89, 'Veg. Kadai', '', '', 2, 'YES', 'YES', 120, 8),
(90, 'Veg. Handi', '', '', 3, 'YES', 'YES', 130, 8),
(91, 'Veg. Tawa Masala', '', '', 2, 'YES', 'YES', 135, 8),
(92, 'Veg. Patiala', '', '', 3, 'YES', 'YES', 135, 8),
(93, 'Veg. Jaipuri', '', '', 3, 'YES', 'YES', 120, 8),
(94, 'Veg. Toofani', '', '', 2, 'YES', 'YES', 130, 8),
(95, 'Veg. Hariyali', '', '', 3, 'YES', 'YES', 130, 8),
(96, 'Veg. Korma', '', '', 2, 'YES', 'YES', 120, 8),
(97, 'Diwani Handi', '', '', 1, 'YES', 'YES', 135, 8),
(98, 'Veg. Angara', '', '', 2, 'YES', 'YES', 140, 8),
(99, 'Veg. Garlic Masala', '', '', 2, 'YES', 'YES', 140, 8),
(100, 'Veg. Pahadi', '', '', 2, 'YES', 'YES', 160, 8),
(101, 'Veg. Do Payaza', '', '', 2, 'YES', 'YES', 140, 8),
(102, 'Yajmaan Special Vegetable', '', '', 4, 'YES', 'YES', 200, 8),
(103, 'Malai Kofta Sweet', '', '', 2, 'YES', 'YES', 150, 9),
(104, 'Veg. Kofta', '', '', 3, 'YES', 'YES', 140, 9),
(105, 'Nargis Kofta', '', '', 2, 'YES', 'YES', 145, 9),
(106, 'Cheese Kofta', '', '', 2, 'YES', 'YES', 160, 9),
(107, 'Paneer Kofta', '', '', 2, 'YES', 'YES', 150, 9),
(108, 'Kaju Curry', '', '', 2, 'YES', 'YES', 180, 10),
(109, 'Kaju Masala', '', '', 2, 'YES', 'YES', 190, 10),
(110, 'Kaju Butter Masala', '', '', 2, 'YES', 'YES', 200, 10),
(111, 'Khoya Kaju Sweet ', '', '', 2, 'YES', 'YES', 190, 10),
(112, 'Khoya Cheese Masala', '', '', 2, 'YES', 'YES', 200, 10),
(113, 'Khoya Paneer Masala', '', '', 3, 'YES', 'YES', 200, 10),
(114, 'Mushroom Masala', '', '', 3, 'YES', 'YES', 180, 11),
(115, 'Mushroom Butter Masala', '', '', 2, 'YES', 'YES', 190, 11),
(116, 'Mushroom Mutter', '', '', 2, 'YES', 'YES', 150, 11),
(117, 'Mushroom Corn Masala', '', '', 2, 'YES', 'YES', 160, 11),
(118, 'Veg. Hakka Noodle', '', '', 2, 'YES', 'YES', 130, 12),
(119, 'Veg. Chow Chow', '', '', 2, 'YES', 'YES', 140, 12),
(120, 'Veg. Chowmein', '', '', 2, 'YES', 'YES', 135, 12),
(121, 'Veg. American Chopsuey', '', '', 3, 'YES', 'YES', 140, 12),
(122, 'Chinese Chopsuey', '', '', 2, 'YES', 'YES', 135, 12),
(123, 'Veg. Balls Hot Garlic Sauce', '', '', 3, 'YES', 'YES', 150, 12),
(124, 'Schezwan Noodles', '', '', 2, 'YES', 'YES', 150, 12),
(125, 'Veg. Fried Rice', '', '', 2, 'YES', 'YES', 120, 13),
(126, 'Lemon Fried Rice', '', '', 2, 'YES', 'YES', 125, 13),
(127, 'Schezwan Fried Rice', '', '', 2, 'YES', 'YES', 130, 13),
(128, 'Manchurian Fried Rice', '', '', 2, 'YES', 'YES', 125, 13),
(129, 'Tripal Fried Rice', '', '', 3, 'YES', 'YES', 140, 13),
(130, 'Chinese Bhel', '', '', 1, 'YES', 'YES', 130, 13),
(131, 'Veg. Sizzler', '', '', 2, 'YES', 'YES', 260, 14),
(132, 'Chinese Sizzler', '', '', 1, 'YES', 'YES', 280, 14),
(133, 'Paneer Stick Sizzler', '', '', 4, 'YES', 'YES', 300, 14),
(134, 'Paneer Shashlik Sizzler', '', '', 1, 'YES', 'YES', 300, 14),
(135, 'Yajmaan Special Sizzler', '', '1 Cold Drink + Roasted Papad + Salad', 1, 'YES', 'YES', 500, 14),
(136, 'Plain Roti', '', '', 1, 'YES', 'YES', 20, 15),
(137, 'Butter Roti ', '', '', 3, 'YES', 'YES', 25, 15),
(138, 'Missi Roti', '', '', 2, 'YES', 'YES', 35, 15),
(139, 'Plain Naan ', '', '', 2, 'YES', 'YES', 35, 15),
(140, 'Butter Naan', '', '', 1, 'YES', 'YES', 40, 15),
(141, 'Plain Paratha', '', '', 2, 'YES', 'YES', 40, 15),
(142, 'Butter Paratha', '', '', 3, 'YES', 'YES', 45, 15),
(143, 'Butter Kulcha', '', '', 2, 'YES', 'YES', 50, 15),
(144, 'Onion Kulcha', '', '', 2, 'YES', 'YES', 55, 15),
(145, 'Paneer Kulcha', '', '', 2, 'YES', 'YES', 60, 15),
(146, 'Stuff Kulcha', '', '', 2, 'YES', 'YES', 50, 15),
(147, 'Cheese Naan', '', '', 1, 'YES', 'YES', 65, 15),
(148, 'Garlic Naan', '', '', 2, 'YES', 'YES', 50, 15),
(149, 'Kashmiri Naan', '', '', 3, 'YES', 'YES', 60, 15),
(150, 'Cheese Chilly Naan', '', '', 1, 'YES', 'YES', 70, 15),
(151, 'Methi Paratha', '', '', 2, 'YES', 'YES', 45, 15),
(152, 'Aloo Paratha with Curd', '', '', 2, 'YES', 'YES', 100, 15),
(153, 'Plain Rice', '', '', 2, 'YES', 'YES', 70, 16),
(154, 'Jeera Rice', '', '', 4, 'YES', 'YES', 80, 16),
(155, 'Veg. Pulao', '', '', 2, 'YES', 'YES', 110, 16),
(156, 'Veg. Biryani', '', '', 3, 'YES', 'YES', 120, 16),
(157, 'Veg. Hyderabadi Biryani', '', '', 3, 'YES', 'YES', 120, 16),
(158, 'Handi Dum Biryani', '', '', 3, 'YES', 'YES', 130, 16),
(159, 'Kashmiri Pulao(Sweet)', '', '', 2, 'YES', 'YES', 110, 16),
(160, 'Kolhapuri Biryani', '', '', 1, 'YES', 'YES', 130, 16),
(161, 'Yajmaan Special Biryani', '', '', 2, 'YES', 'YES', 150, 16),
(162, 'Dal Fry ', '', '', 1, 'YES', 'YES', 80, 17),
(163, 'Dal Tadka', '', '', 1, 'YES', 'YES', 100, 17),
(164, 'Dal Makhani', '', '', 2, 'YES', 'YES', 110, 17),
(165, 'Dal Palak ', '', '', 1, 'YES', 'YES', 100, 17),
(166, 'Bread Butter', '', '', 2, 'YES', 'YES', 50, 18),
(167, 'Bread Butter with Jam', '', '', 2, 'YES', 'YES', 60, 18),
(168, 'Garlic Bread', '', '', 2, 'YES', 'YES', 90, 18),
(169, 'Veg. Sandwich', '', '', 3, 'YES', 'YES', 80, 18),
(170, 'Cheese Sandwich', '', '', 3, 'YES', 'YES', 100, 18),
(171, 'Veg. Grill Sandwich', '', '', 4, 'YES', 'YES', 110, 18),
(172, 'Cheese Grill Sandwich', '', '', 2, 'YES', 'YES', 120, 18),
(173, 'Veg. Pizza', '', '', 1, 'YES', 'YES', 100, 18),
(174, 'Cheese Pizza', '', '', 4, 'YES', 'YES', 120, 18),
(175, 'Margarita Pizza', '', '', 1, 'YES', 'YES', 120, 18),
(176, 'Italian Pizza', '', '', 1, 'YES', 'YES', 120, 18),
(177, 'Mexican Pizza', '', '', 1, 'YES', 'YES', 130, 18),
(178, 'Yajmaan Special Pizza', '', '', 2, 'YES', 'YES', 140, 18),
(179, 'Arrabbiata Pasta', '', '', 1, 'YES', 'YES', 220, 19),
(180, 'Pink Sauce Pasta', '', '', 3, 'YES', 'YES', 230, 19),
(181, 'Alfredo Pasta', '', '', 1, 'YES', 'YES', 230, 19),
(182, 'Sev Tomato', '', '', 2, 'YES', 'YES', 90, 20),
(183, 'Undhiyu', '', '', 2, 'YES', 'YES', 100, 20),
(184, 'Rajwadi Dhokla', '', '', 2, 'YES', 'YES', 120, 20),
(185, 'Bharela Bhinda', '', '', 2, 'YES', 'YES', 130, 20),
(186, 'Baigan Ka Bhartha', '', '', 2, 'YES', 'YES', 120, 20),
(187, 'Bhindi Masala', '', '', 2, 'YES', 'YES', 110, 20),
(188, 'Bhindi Fry', '', '', 4, 'YES', 'YES', 120, 20),
(189, 'Lasaniya Bataka', '', '', 2, 'YES', 'YES', 110, 20),
(190, 'Dahi Tikhari', '', '', 5, 'YES', 'YES', 130, 20),
(191, 'Desi Chana', '', '', 1, 'YES', 'YES', 130, 20),
(192, 'Shuki Chori', '', '', 1, 'YES', 'YES', 130, 20),
(193, 'Mag. Masala', '', '', 2, 'YES', 'YES', 130, 20),
(194, 'Dal Bhat (Lunch)', '', '', 2, 'YES', 'YES', 100, 20),
(195, 'Kadhi Khichdi (Dinner)', '', '', 2, 'YES', 'YES', 120, 20),
(196, 'Rajwadi Khichdi', '', '', 2, 'YES', 'YES', 150, 20),
(197, 'Plain Chapati', '', '', 2, 'YES', 'YES', 10, 20),
(198, 'Butter Chapati', '', '', 2, 'YES', 'YES', 15, 20),
(199, 'Tawa Paratha', '', '', 3, 'YES', 'YES', 20, 20),
(200, 'Bajra Ka Rotla', '', '', 2, 'YES', 'YES', 25, 20),
(201, 'Vagharelo Rotlo', '', '', 2, 'YES', 'YES', 50, 20),
(202, 'Baked Macaroni', '', '', 2, 'YES', 'YES', 200, 21),
(203, 'Baked Macaroni with Cheese', '', '', 2, 'YES', 'YES', 220, 21),
(204, 'Baked Veg. With Cheese', '', '', 3, 'YES', 'YES', 200, 21),
(205, 'Tea', '', '', 3, 'YES', 'YES', 20, 22),
(206, 'Tea Masala', '', '', 1, 'YES', 'YES', 25, 22),
(207, 'Hot Coffee', '', '', 2, 'YES', 'YES', 30, 22),
(208, 'Hot Milk', '', '', 2, 'YES', 'YES', 40, 22),
(209, 'Fresh Lemon Water', '', '', 1, 'YES', 'YES', 30, 23),
(210, 'Jal-Jeera', '', '', 1, 'YES', 'YES', 35, 23),
(211, 'Fresh Lemon Soda (Sweet / Salt)', '', '', 2, 'YES', 'YES', 40, 23),
(212, 'Mint Lemon Water (Sweet)', '', '', 2, 'YES', 'YES', 35, 23),
(213, 'Mineral Water', '', '', 2, 'YES', 'YES', 20, 23),
(214, 'Cold Drink 200ml.', '', '', 2, 'YES', 'YES', 20, 23),
(215, 'Fix Thaali', '', '2 Subji, 3 Butter Roti, Dal Fry, Jeera Rice, Roasted Papad, Butter Milk', 2, 'YES', 'YES', 120, 25),
(216, 'Special Thaali', '', 'Paneer Subji, Veg. Subji, Butter Roti 3 / Tawa Roti 4 / Tandoori Roti 3, Dal Fry, Jeera Rice & Pulao, Sweet, Roasted Papad, Butter Milk, Onion & Pickle', 2, 'YES', 'YES', 140, 25);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_user`
--

CREATE TABLE `restaurant_user` (
  `uid` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `foid` int(10) NOT NULL,
  `total_bill` int(12) NOT NULL,
  `date` date NOT NULL,
  `table_no` varchar(10) NOT NULL,
  `order_delivered` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `takeaway_user`
--

CREATE TABLE `takeaway_user` (
  `tuid` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date_time` datetime NOT NULL,
  `total_bill` int(12) NOT NULL,
  `status` int(2) NOT NULL,
  `time_of_delivery` time NOT NULL,
  `payment_mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banquet_booking_user`
--
ALTER TABLE `banquet_booking_user`
  ADD PRIMARY KEY (`Bbid`),
  ADD KEY `mbid` (`mbid`);

--
-- Indexes for table `banquet_installment`
--
ALTER TABLE `banquet_installment`
  ADD PRIMARY KEY (`Bid`),
  ADD KEY `booking` (`Booking_id`);

--
-- Indexes for table `banquet_menu`
--
ALTER TABLE `banquet_menu`
  ADD KEY `booking id` (`booking_id`);

--
-- Indexes for table `banquet_menu_plan`
--
ALTER TABLE `banquet_menu_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banquet_plans`
--
ALTER TABLE `banquet_plans`
  ADD PRIMARY KEY (`mbid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`foid`),
  ADD KEY `user` (`userid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `category` (`type`);

--
-- Indexes for table `restaurant_user`
--
ALTER TABLE `restaurant_user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `food` (`foid`);

--
-- Indexes for table `takeaway_user`
--
ALTER TABLE `takeaway_user`
  ADD PRIMARY KEY (`tuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banquet_booking_user`
--
ALTER TABLE `banquet_booking_user`
  MODIFY `Bbid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `banquet_installment`
--
ALTER TABLE `banquet_installment`
  MODIFY `Bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `banquet_menu_plan`
--
ALTER TABLE `banquet_menu_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banquet_plans`
--
ALTER TABLE `banquet_plans`
  MODIFY `mbid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `foid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `restaurant_user`
--
ALTER TABLE `restaurant_user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `takeaway_user`
--
ALTER TABLE `takeaway_user`
  MODIFY `tuid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banquet_booking_user`
--
ALTER TABLE `banquet_booking_user`
  ADD CONSTRAINT `mbid` FOREIGN KEY (`mbid`) REFERENCES `banquet_plans` (`mbid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banquet_installment`
--
ALTER TABLE `banquet_installment`
  ADD CONSTRAINT `booking` FOREIGN KEY (`Booking_id`) REFERENCES `banquet_booking_user` (`Bbid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banquet_menu`
--
ALTER TABLE `banquet_menu`
  ADD CONSTRAINT `booking id` FOREIGN KEY (`booking_id`) REFERENCES `banquet_booking_user` (`Bbid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_order`
--
ALTER TABLE `food_order`
  ADD CONSTRAINT `mid` FOREIGN KEY (`mid`) REFERENCES `menu` (`mid`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `takeaway_user` (`tuid`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `category` FOREIGN KEY (`type`) REFERENCES `category` (`cid`);

--
-- Constraints for table `restaurant_user`
--
ALTER TABLE `restaurant_user`
  ADD CONSTRAINT `food` FOREIGN KEY (`foid`) REFERENCES `food_order` (`foid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
