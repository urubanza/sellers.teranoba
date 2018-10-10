-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 04:47 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nobarwanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `acount_activation`
--

CREATE TABLE `acount_activation` (
  `activation_id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `codes` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acount_activation`
--

INSERT INTO `acount_activation` (`activation_id`, `userId`, `codes`, `date`) VALUES
(1, 2, '482846095630831178', '2018-06-23 23:36:33'),
(2, 3, '1943136586223930674', '2018-06-23 23:39:45'),
(3, 4, '3143198944426534175', '2018-06-23 23:41:34'),
(4, 5, '2509885903545036508', '2018-06-23 23:47:52'),
(5, 6, '3526398834098813896', '2018-06-23 23:49:40'),
(6, 1, '4049135022409639295', '2018-06-23 23:51:09'),
(7, 1, '4261186212690847275', '2018-06-23 23:55:16'),
(8, 2, '42972380673720942486', '2018-06-23 23:56:57'),
(9, 1, '891720906154002478', '2018-06-24 00:08:09'),
(10, 2, '3114526284697220413', '2018-06-24 07:06:32'),
(11, 3, '3172512220422936497', '2018-06-24 07:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cartId`, `productId`, `user_id`, `date`, `Quantity`) VALUES
(17, 1, 1, '2018-04-17 17:09:16', 2),
(18, 1, 1, '2018-04-18 12:29:13', 1),
(19, 1, 1, '2018-04-19 09:39:54', 2),
(20, 0, 1, '2018-05-07 14:39:23', 1),
(21, 1, 1, '2018-05-07 14:40:33', 23),
(22, 5, 1, '2018-05-07 14:43:26', 200),
(23, 5, 1, '2018-05-07 14:45:49', 14),
(24, 1, 1, '2018-05-07 14:47:16', 14),
(25, 1, 1, '2018-05-07 14:48:10', 167),
(31, 1, 1, '2018-05-08 12:39:56', 178);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL COMMENT 'category name',
  `description` varchar(2048) NOT NULL,
  `shop` int(11) NOT NULL COMMENT 'Shop with these categories',
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `shop`, `dateAdded`) VALUES
(16, 'electronica', '                           here you will find millions of electronics materials\r\n                ', 1, '2018-10-02 00:43:13'),
(17, 'clothing', 'here all mens and womens will find confortable wearings\r\n    ', 1, '2018-10-02 00:44:35'),
(18, 'helps mes', 'conglaturaton\r\n            ', 1, '2018-10-02 01:31:25'),
(19, 'clothings', 'hghjg hhfhfjh\r\n    ', 1, '2018-10-03 03:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE `noti` (
  `not_id` int(11) NOT NULL,
  `not_contents` varchar(80) NOT NULL,
  `not_client` int(11) NOT NULL,
  `not_admin` int(11) NOT NULL,
  `direction` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noti`
--

INSERT INTO `noti` (`not_id`, `not_contents`, `not_client`, `not_admin`, `direction`, `type`, `orderId`, `seen`) VALUES
(2, 'add a product on a cart', 1, 1, 1, 0, 22, 1),
(3, ' changed quantity on a cart from  to 34 ', 1, 1, 1, 0, 22, 1),
(4, ' changed quantity on a cart from  to 23 ', 1, 1, 1, 0, 22, 1),
(5, ' changed quantity on a cart from                  ', 1, 1, 1, 0, 22, 1),
(6, ' changed quantity on a cart from                  ', 1, 1, 1, 0, 22, 1),
(7, ' changed quantity on a cart from 50 to 23 ', 1, 1, 1, 0, 22, 1),
(8, ' changed quantity on a cart from                  ', 1, 1, 1, 0, 22, 1),
(9, ' changed quantity on a cart from                  ', 1, 1, 1, 0, 19, 1),
(10, ' changed quantity on a cart from 50 to 23 ', 1, 1, 1, 0, 22, 1),
(11, ' changed quantity on a cart from                  ', 1, 1, 1, 0, 20, 1),
(12, ' changed quantity on a cart from                                 34 to 67 ', 1, 1, 1, 0, 19, 1),
(13, ' changed quantity on a cart from 2000 to 34 ', 1, 1, 1, 0, 22, 1),
(14, ' changed quantity on a cart from 34 to 14 ', 1, 1, 1, 0, 22, 1),
(15, ' deleted a product on the cart', 1, 1, 1, 0, 22, 1),
(16, ' deleted a product on the cart', 1, 1, 1, 0, 22, 1),
(17, ' deleted a product on the cart', 1, 1, 1, 0, 22, 1),
(18, ' deleted a product on the cart', 1, 1, 1, 0, 22, 1),
(19, ' deleted a product on the cart', 1, 1, 1, 0, 21, 1),
(20, ' deleted a product on the cart', 1, 1, 1, 0, 21, 1),
(21, ' deleted a product on the cart', 1, 1, 1, 0, 21, 1),
(22, ' deleted a product on the cart', 1, 1, 1, 0, 21, 1),
(23, ' deleted a product on the cart', 1, 1, 1, 0, 21, 1),
(24, ' deleted a product on the cart', 1, 1, 1, 0, 21, 1),
(25, ' deleted a product on the cart', 1, 1, 1, 0, 21, 1),
(26, ' deleted a product on the cart', 1, 1, 1, 0, 20, 1),
(27, ' changed quantity on a cart from 67 to 24 ', 1, 1, 1, 0, 19, 1),
(28, ' changed quantity on a cart from 23 to 900 ', 1, 1, 1, 0, 8, 1),
(29, ' deleted an ordered product', 1, 1, 1, 0, 17, 1),
(30, 'added a product on orders', 1, 1, 1, 0, 22, 1),
(31, ' changed quantity on a cart from 900 to 12 ', 1, 1, 1, 0, 8, 1),
(32, ' changed quantity on a cart from 5 to 88 ', 12, 1, 1, 0, 13, 1),
(33, ' deleted an ordered product', 12, 1, 1, 0, 19, 1),
(34, 'add a product on a cart', 8, 1, 1, 0, 23, 1),
(35, 'added a product on orders', 8, 1, 1, 0, 23, 1),
(36, ' deleted an ordered product', 8, 1, 1, 0, 23, 1),
(37, ' deleted a product on the cart', 8, 1, 1, 0, 23, 1),
(38, ' deleted a product on the cart', 8, 1, 1, 0, 23, 1),
(39, ' deleted a product on the cart', 8, 1, 1, 0, 23, 1),
(40, ' deleted a product on the cart', 8, 1, 1, 0, 12, 1),
(41, ' deleted a product on the cart', 8, 1, 1, 0, 12, 1),
(42, ' deleted a product on the cart', 8, 1, 1, 0, 12, 1),
(43, ' deleted a product on the cart', 8, 1, 1, 0, 12, 1),
(44, ' deleted a product on the cart', 8, 1, 1, 0, 12, 1),
(45, ' deleted a product on the cart', 8, 1, 1, 0, 12, 1),
(46, ' deleted a product on the cart', 8, 1, 1, 0, 12, 1),
(47, ' deleted a product on the cart', 8, 1, 1, 0, 23, 1),
(48, ' deleted a product on the cart', 8, 1, 1, 0, 23, 1),
(49, ' deleted a product on the cart', 8, 1, 1, 0, 18, 1),
(50, ' deleted a product on the cart', 8, 1, 1, 0, 18, 1),
(51, 'added a product on orders', 1, 1, 1, 0, 24, 1),
(52, 'add a product on a cart', 1, 1, 1, 0, 24, 1),
(53, ' changed quantity on a cart from 24 to  ', 1, 1, 1, 0, 19, 1),
(54, ' deleted a product on the cart', 1, 1, 1, 0, 24, 1),
(55, ' deleted a product on the cart', 1, 1, 1, 0, 24, 1),
(56, ' deleted a product on the cart', 1, 1, 1, 0, 19, 1),
(57, 'add a product on a cart', 1, 1, 1, 0, 25, 1),
(58, 'added a product on orders', 1, 1, 1, 0, 25, 1),
(59, 'added a product on orders', 1, 1, 1, 0, 26, 1),
(60, ' deleted a product on the cart', 1, 1, 1, 0, 25, 1),
(61, 'added a product on orders', 1, 1, 1, 0, 27, 1),
(62, ' deleted an ordered product', 1, 1, 1, 0, 27, 1),
(63, 'added a product on orders', 1, 1, 1, 0, 28, 1),
(64, ' deleted an ordered product', 1, 1, 1, 0, 28, 1),
(65, ' deleted an ordered product', 1, 1, 1, 0, 26, 1),
(66, ' deleted a product on the cart', 1, 1, 1, 0, 9, 1),
(67, ' deleted an ordered product', 1, 1, 1, 0, 25, 1),
(68, 'add a product on a cart', 1, 1, 1, 0, 26, 1),
(69, ' deleted a product on the cart', 1, 1, 1, 0, 26, 1),
(70, 'add a product on a cart', 1, 1, 1, 0, 27, 1),
(71, ' deleted a product on the cart', 1, 1, 1, 0, 27, 1),
(72, ' deleted a product on the cart', 1, 1, 1, 0, 8, 1),
(73, 'add a product on a cart', 1, 1, 1, 0, 28, 1),
(74, ' deleted a product on the cart', 1, 1, 1, 0, 28, 1),
(75, 'add a product on a cart', 1, 1, 1, 0, 29, 1),
(76, ' changed quantity on a cart from 45 to 45 ', 1, 1, 1, 0, 29, 1),
(77, ' changed quantity on a cart from 45 to 100 ', 1, 1, 1, 0, 29, 1),
(78, ' changed quantity on a cart from 100 to 200 ', 1, 1, 1, 0, 29, 1),
(79, ' changed quantity on a cart from 200 to 10 ', 1, 1, 1, 0, 29, 1),
(80, 'added a product on orders', 1, 1, 1, 0, 29, 1),
(81, ' deleted an ordered product', 1, 1, 1, 1, 22, 1),
(82, 'add a product on a cart', 1, 1, 1, 0, 30, 1),
(83, 'add a product on a cart', 1, 1, 1, 0, 31, 1),
(84, ' changed quantity on a cart from 34 to 3 ', 1, 1, 1, 0, 31, 1),
(85, ' changed quantity on a cart from 12 to 5 ', 1, 1, 1, 0, 30, 1),
(86, ' changed quantity on a cart from 10 to 15 ', 1, 1, 1, 0, 29, 1),
(87, 'likes your product', 1, 0, 1, 0, 2, 0),
(88, 'likes your product', 1, 0, 1, 0, 3, 0),
(89, 'likes your product', 1, 0, 1, 0, 4, 0),
(90, 'likes your product', 1, 0, 1, 0, 5, 0),
(91, 'likes your product', 1, 0, 1, 0, 6, 0),
(92, 'likes your product', 1, 0, 1, 0, 7, 0),
(93, 'likes your product', 1, 1, 1, 0, 8, 0),
(94, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(95, 'likes your product', 1, 1, 1, 0, 9, 0),
(96, 'dislikes your product', 1, 7, 1, 0, 0, 0),
(97, 'dislikes your product', 1, 7, 1, 0, 0, 0),
(98, 'likes your product', 1, 7, 1, 0, 10, 0),
(99, 'likes your product', 1, 7, 1, 0, 11, 0),
(100, 'likes your product', 1, 7, 1, 0, 12, 0),
(101, 'dislikes your product', 1, 7, 1, 0, 0, 0),
(102, 'likes your product', 1, 7, 1, 0, 13, 0),
(103, 'likes your product', 1, 7, 1, 0, 14, 0),
(104, 'dislikes your product', 1, 7, 1, 0, 0, 0),
(105, 'likes your product', 1, 7, 1, 0, 15, 0),
(106, 'dislikes your product', 1, 7, 1, 0, 0, 0),
(107, 'likes your product', 1, 7, 1, 0, 16, 0),
(108, 'dislikes your product', 1, 7, 1, 0, 0, 0),
(109, 'likes your product', 1, 7, 1, 0, 17, 0),
(110, 'dislikes your product', 1, 7, 1, 0, 0, 0),
(111, 'likes your product', 1, 7, 1, 0, 18, 0),
(112, 'likes your product', 1, 1, 1, 0, 19, 0),
(113, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(114, 'likes your product', 1, 1, 1, 0, 20, 0),
(115, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(116, 'likes your product', 1, 1, 1, 0, 21, 0),
(117, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(118, 'likes your product', 1, 1, 1, 0, 22, 0),
(119, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(120, 'likes your product', 1, 1, 1, 0, 23, 0),
(121, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(122, 'likes your product', 1, 1, 1, 0, 24, 0),
(123, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(124, 'likes your product', 1, 1, 1, 0, 25, 0),
(125, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(126, 'likes your product', 1, 1, 1, 0, 26, 0),
(127, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(128, 'dislikes your product', 1, 7, 1, 0, 0, 0),
(129, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(130, 'likes your product', 1, 1, 1, 0, 27, 0),
(131, 'likes your product', 1, 1, 1, 0, 28, 0),
(132, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(133, 'likes your product', 1, 1, 1, 0, 29, 0),
(134, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(135, 'dislikes your product', 1, 1, 1, 0, 0, 0),
(136, 'likes your product', 1, 1, 1, 0, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordersId` int(11) NOT NULL,
  `orderstitle` varchar(100) NOT NULL,
  `ordersquantity` int(11) NOT NULL,
  `ordersdesc` varchar(300) NOT NULL,
  `ordersicon` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordersId`, `orderstitle`, `ordersquantity`, `ordersdesc`, `ordersicon`, `userId`, `orderDate`, `shop`) VALUES
(5, 'bdsfs', 67, 'xgfbdgf bvxgfxfg', '', 1, '2018-04-03 15:52:46', 0),
(6, 'haguma', 45, 'hfgghdfdhch nvcfghfthdgh      \r\n    hamis', '', 16, '2018-05-08 12:30:39', 0),
(7, 'else if', 45, 'else if is an html condition s     \r\n    ', '', 1, '2018-05-08 12:15:58', 0),
(8, 'gfdghf', 34, 'fgrtrts   \r\n    ', '', 1, '2018-04-20 07:59:42', 0),
(9, 'yrtyd good morning kabisa', 45, '																gdgyhdghdc      \r\n    														', '', 1, '2018-05-08 12:43:48', 0),
(10, 'well', 34, 'ghdhgxdg xtdgfxdfgx cgfxg', '', 1, '2018-05-08 10:32:33', 0),
(11, 'je suis good', 23, '								njsdgbfhsdjfv dnsmfbhsdjfhsd							', '', 1, '2018-05-08 12:32:07', 0),
(12, 'allways', 1, 'goods', '', 1, '2018-05-08 13:09:59', 0),
(13, 'well', 1, 'amsdjfbcjsd', '', 1, '2018-05-09 17:51:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(128) NOT NULL,
  `productPrice` float NOT NULL,
  `promotion` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `productCategory` int(11) NOT NULL,
  `productDescription` varchar(1024) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productIcon` varchar(100) NOT NULL,
  `shop` int(11) NOT NULL,
  `special` tinyint(1) NOT NULL,
  `slides` tinyint(1) NOT NULL,
  `_views` int(11) NOT NULL,
  `subCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productPrice`, `promotion`, `quantity`, `currency`, `productCategory`, `productDescription`, `notes`, `dateAdded`, `productIcon`, `shop`, `special`, `slides`, `_views`, `subCategory`) VALUES
(39, 'try again', 23444, 2345, 1237, 0, 16, ' sds sdfsf sgret ertegd sfdsdf           \r\n        ', 'sadsad asdasfdwer wrwerwe            \r\n        ', '2018-10-02 01:40:49', 'http://localhost/seller.teranoba.com/img/aab3238922bcc25a6f606eb525ffdc56.jpg', 1, 1, 1, 0, 0),
(40, 'iphone 6', 2000, 2000, 2300, 0, 16, '            sadjkhd sajdfbjksdfh kjsdfhsdfh\r\n        ', '            sajdhaifdj fsnasidofjoasf ofhsiodfjs\r\n        ', '2018-10-02 18:09:13', 'http://localhost/seller.teranoba.com/img/../img/8f14e45fceea167a5a36dedd4bea2543.jpg', 1, 0, 0, 0, 0),
(41, 'solar panel', 2000, 100, 100, 0, 16, '  every prods will be here to be convs          \r\n        ', 'homeagain\r\n        ', '2018-10-02 22:52:20', 'http://localhost/seller.teranoba.com/img/9bf31c7ff062936a96d3c8bd1f8f2ff3.jpg', 1, 0, 0, 0, 0),
(42, 'battery ', 5000, 1800, 230, 0, 16, 'exe one are available here            \r\n        ', 'this is product notes (quantity limit ', '2018-10-02 22:56:32', 'http://localhost/seller.teranoba.com/img/c74d97b01eae257e44aa9d5bade97baf.jpg', 1, 0, 0, 0, 0),
(43, 't-shirts', 15600, 12000, 120, 0, 17, 'everygangs all this           \r\n        ', 'homess            \r\n        ', '2018-10-02 23:20:11', 'http://localhost/seller.teranoba.com/img/c51ce410c124a10e0db5e4b97fc2af39.png', 1, 0, 0, 0, 0),
(44, 'drops', 1200, 1920, 23, 0, 18, 'bsndvasd             \r\n        ', '    nnhjgsdakjda        \r\n        ', '2018-10-02 23:23:31', 'http://localhost/seller.teranoba.com/img/aab3238922bcc25a6f606eb525ffdc56.png', 1, 1, 0, 0, 0),
(45, 'sambusa', 1000, 800, 34, 0, 18, '            \r\n        ', 'fffhhjkkjbbv\r\n        ', '2018-10-03 03:12:57', 'http://localhost/seller.teranoba.com/img/c74d97b01eae257e44aa9d5bade97baf.png', 1, 1, 0, 0, 0),
(46, 'frigde', 100000, 90000, 3, 0, 16, 'home again           \r\n        ', 'buy 20 get 50% discounts, no order less than 10 pieces\r\n        ', '2018-10-10 13:18:47', 'http://localhost/seller.teranoba.com/img/6f4922f45568161a8cdf4ad2299f6d23.jpg', 1, 0, 0, 0, 0),
(47, 'radio', 456, 500, 200, 0, 17, 'descvbb\r\n        ', 'gfdhgggfjgf jhvfyufv            \r\n        ', '2018-10-10 13:28:19', 'http://localhost/seller.teranoba.com/img/1f0e3dad99908345f7439f8ffabdffc4.jpg', 1, 0, 0, 0, 0),
(48, 'solar panel', 7899, 6666, 456, 0, 17, ' jxhcjshjdfs smdfbskhfsd           \r\n        ', 'juheruweih werbhweuihrweur            \r\n        ', '2018-10-10 13:39:18', 'http://localhost/seller.teranoba.com/img/98f13708210194c475687be6106a3b84.jpg', 1, 0, 0, 0, 25),
(49, 'solar panel', 7899, 6666, 456, 0, 17, ' jxhcjshjdfs smdfbskhfsd           \r\n        ', 'juheruweih werbhweuihrweur            \r\n        ', '2018-10-10 13:40:47', 'http://localhost/seller.teranoba.com/img/3c59dc048e8850243be8079a5c74d079.jpg', 1, 0, 0, 0, 25);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `news_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `contents` longtext NOT NULL,
  `datas` text NOT NULL,
  `dateup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`news_id`, `title`, `subtitle`, `icon`, `contents`, `datas`, `dateup`, `categorie`) VALUES
(1, 'gaz level detector', 'detect gaz level from everywhere', 'img/Pi2Mod.jpg', 'Wt is a C++ library for developing web applications. Admitted, C++ doesn’t come to mind\r\nas the first choice for a programming language when one talks about web development. Web\r\ndevelopment is usually associated with scripting languages, and is usually implemented at the\r\nlevel of generating responses for incoming requests. Since both requests and responses are text\r\nencodings, web programming is ultimately a text processing task, and thus conveniently expressed\r\nin a scripting language.', '', '2018-03-25 13:32:37', 0),
(9, 'ex gangs', 'self me', 'http://localhost/seller.teranoba.com/img/../img/8f14e45fceea167a5a36dedd4bea2543.png', 'lolp lota piosta minds\r\n        ', '', '2018-10-02 17:39:50', 1),
(10, 'ex gangs', 'self me', 'http://localhost/seller.teranoba.com/img/../img/1679091c5a880faf6fb5e6087eb1b2dc.jpg', 'vianerys\r\n        ', '', '2018-10-02 17:41:35', 1),
(11, 'ex gangs', 'sub hip hop', 'http://localhost/seller.teranoba.com/img/70efdf2ec9b086079795c442636b55fb.jpg', 'dommssgf nbvjhfjh\r\n        ', '', '2018-10-03 01:44:35', 4);

-- --------------------------------------------------------

--
-- Table structure for table `projects_categories`
--

CREATE TABLE `projects_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `icon` varchar(300) NOT NULL,
  `descr` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_categories`
--

INSERT INTO `projects_categories` (`id`, `name`, `icon`, `descr`) VALUES
(1, 'wellcome', 'http://localhost/seller.teranoba.com/img/../img/eccbc87e4b5ce2fe28308fd9f2a7baf3.png', 'wellcome home again\r\n    '),
(2, 'clothings', 'http://localhost/seller.teranoba.com/img/../img/c20ad4d76fe97759aa27a0c99bff6710.jpg', 'home again\r\n    '),
(3, 'technology', 'http://localhost/seller.teranoba.com/img/c51ce410c124a10e0db5e4b97fc2af39.jpg', 'homeagain\r\n    '),
(4, 'electronics', 'http://localhost/seller.teranoba.com/img/9bf31c7ff062936a96d3c8bd1f8f2ff3.png', 'foods\r\n    ');

-- --------------------------------------------------------

--
-- Table structure for table `pubs`
--

CREATE TABLE `pubs` (
  `pubid` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pubs`
--

INSERT INTO `pubs` (`pubid`, `link`, `icon`, `position`) VALUES
(7, 'www.teranoba.com', 'img/fgfdgdg_.gif', 0),
(8, 'www.teranoba.com', 'img/lalamo.gif', 1),
(9, 'www.teranoba.com', 'img/lalamox.gif', 1),
(10, 'www.teranoba.com', 'img/lalamoxc.gif', 1),
(11, 'www.teranoba.com', 'img/lalamoxcx.gif', 1),
(12, 'www.teranoba.com', 'img/ban444.gif', 2),
(13, 'www.teranoba.com', 'img/ban4445.gif', 2),
(14, 'www.teranoba.com', 'img/ban44455.gif', 2),
(15, 'www.teranoba.com', 'img/ban444553.gif', 2),
(16, 'bnn', 'img/1519e954ae6bd629544356cae3e51766_L.jpg', 2),
(17, 'bnn', 'img/arton2228.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shopName` varchar(256) NOT NULL,
  `admin` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shopIcon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shopName`, `admin`, `dateAdded`, `shopIcon`) VALUES
(1, 'Noba Electronics ltd', 1, '2018-03-19 07:25:19', 'http://localhost/seller.teranoba.com/img/c20ad4d76fe97759aa27a0c99bff6710.png'),
(4, 'ware hood', 0, '2018-09-30 19:37:06', 'http://localhost/seller.teranoba.com/img/downloadzzzzzzzzzzzzzz.jpg'),
(12, 'ware home', 0, '2018-10-01 07:11:43', 'http://localhost/seller.teranoba.com/img/shops.png'),
(13, 'muteremuko', 0, '2018-10-01 07:11:54', 'http://localhost/seller.teranoba.com/img/shops.png'),
(14, 'exelance', 0, '2018-10-03 01:41:47', 'http://localhost/seller.teranoba.com/img/shops.png'),
(15, 'simba', 0, '2018-10-03 01:42:17', 'http://localhost/seller.teranoba.com/img/shops.png'),
(16, 'nakumat', 0, '2018-10-03 01:42:56', 'http://localhost/seller.teranoba.com/img/shops.png');

-- --------------------------------------------------------

--
-- Table structure for table `shopusers`
--

CREATE TABLE `shopusers` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopusers`
--

INSERT INTO `shopusers` (`id`, `userId`, `shopId`, `dateAdded`) VALUES
(1, 4, 1, '2018-04-03 13:00:34'),
(2, 0, 3, '2018-09-29 14:35:21'),
(3, 8, 3, '2018-09-29 14:41:53'),
(4, 9, 1, '2018-09-29 14:52:26'),
(5, 10, 3, '2018-09-29 15:26:06'),
(6, 11, 1, '2018-09-30 15:30:01'),
(7, 12, 1, '2018-09-30 15:34:44'),
(8, 13, 3, '2018-09-30 15:47:58'),
(9, 14, 3, '2018-09-30 16:02:32'),
(10, 15, 3, '2018-09-30 16:02:54'),
(11, 16, 6, '2018-09-30 20:01:24'),
(12, 17, 5, '2018-09-30 20:13:03'),
(13, 18, 4, '2018-10-01 00:58:50'),
(14, 20, 1, '2018-10-01 05:57:08'),
(15, 22, 1, '2018-10-02 08:15:01'),
(16, 23, 13, '2018-10-02 17:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `categorieId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`cat_id`, `name`, `descr`, `categorieId`) VALUES
(1, 'homes', 'wellcome home and wait for thee caps', 2),
(2, 'rugando', '5', 0),
(3, 'rugando', '5', 0),
(4, 'rugando', '5', 0),
(5, 'rugando', '5', 0),
(6, 'rugando', '6', 0),
(7, 'rugando', 'bdsfdsfsdf\r\n        ', 6),
(8, 'chickens', 'this contains all microcomputer boards micro controllers microprocessors and their kits\r\n        ', 6),
(13, 'rugando', 'xczvdd\r\n        ', 14),
(14, 'rugando', '\r\n        ', 15),
(16, 'chickens', '\r\n        ', 5),
(17, 'rugando', '\r\n        ', 5),
(18, 'ruga', '                                  hfghjcdghc hgdgdhg                        ', 7),
(19, 'chickensbbbb', '                 every time there nnn\r\n                    ', 7),
(20, 'phonexxzz', '                                  all about mobile phones\r\n                                ', 16),
(21, 'mens', '\r\n        ', 17),
(22, 'rugando', 'ggggggggg\r\n        ', 18),
(23, 'chickens', 'gffst hfghdty\r\n        ', 18),
(24, 'retsaw', 'allways\r\n        ', 18),
(25, 'rugando', '\r\n        ', 17),
(26, 'phones45', '                 \r\n                    ', 17),
(27, 'foods', '\r\n        ', 19);

-- --------------------------------------------------------

--
-- Table structure for table `usermessages`
--

CREATE TABLE `usermessages` (
  `messId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `contents` longtext NOT NULL,
  `messdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `direction` tinyint(1) NOT NULL,
  `seen1` tinyint(1) NOT NULL,
  `seen2` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermessages`
--

INSERT INTO `usermessages` (`messId`, `userId`, `shop`, `contents`, `messdate`, `direction`, `seen1`, `seen2`) VALUES
(1, 1, 1, 'jhghjgujef wsnvfhjwveugfwe fnwefvhuwegfugwef wenfbwegfuwegf nejtgfbweugfebf en fjhewfvuweggfe njegfuefbjne  guergfuwebfew fjebfuywegfb efgjwebgfeuwgf', '2018-05-16 10:02:07', 0, 0, 1),
(2, 1, 1, 'hgxdgfdfgd hgxtdrtdyh hgggdtydtydy ghhdytdtdt', '2018-05-16 10:02:07', 1, 0, 1),
(3, 1, 1, '    jasdgSJFBSAFAFJSHFASFV', '2018-05-16 10:02:07', 1, 0, 1),
(4, 1, 1, '   JHGSDGASFGA FSJFBSUFGSEFV ', '2018-05-16 10:02:07', 1, 0, 1),
(5, 1, 1, '   JHGSDGASFGA FSJFBSUFGSEFV ', '2018-05-16 10:02:07', 1, 0, 1),
(6, 1, 1, ' loop from this.   ', '2018-05-16 10:02:07', 1, 0, 1),
(7, 1, 1, ' hello words   ', '2018-05-16 10:02:07', 1, 0, 1),
(8, 1, 3, 'ghdhgdhgd  nncuydrtuutd nbctyrydr jhfyururu', '2018-05-16 10:02:18', 0, 0, 1),
(9, 1, 3, 'loops    ', '2018-05-16 10:02:18', 1, 0, 1),
(10, 1, 1, 'local loval', '2018-05-16 10:02:07', 0, 0, 1),
(11, 1, 1, '    again na none', '2018-05-16 10:02:07', 1, 0, 1),
(12, 5, 1, 'rupussy', '2018-05-16 09:15:19', 1, 0, 0),
(13, 0, 1, '    ', '2018-06-04 18:30:34', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profilePicture` varchar(1024) DEFAULT NULL,
  `type` varchar(6) DEFAULT 'member',
  `password` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `lname`, `fname`, `email`, `profilePicture`, `type`, `password`, `activated`) VALUES
(4, 'morning', 'ross', 'admin@me.rw', 'http://localhost/seller.teranoba.com/img/download.jpg', 'admin', '100100', 1),
(18, ' jean claude', 'hood', 'ishimwep05@yahoo.fr', 'http://localhost/seller.teranoba.com/img/mo.png', 'seller', '800800', 0),
(20, 'peter rukara', 'hakizimana', 'ishimwep05@yahoo.frx', 'img/users.png', 'seller', '123456789', 1),
(22, 'wallace', 'hakizimana', 'ishimwep05@yahoo.frv', 'img/users.png', 'seller', '123456789', 0),
(23, 'olivier', 'hakizimana', 'paci3ishimwe@gnmai.c', 'http://localhost/seller.teranoba.com/img/users.png', 'seller', '123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `_favorites`
--

CREATE TABLE `_favorites` (
  `favoritesId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_favorites`
--

INSERT INTO `_favorites` (`favoritesId`, `userId`, `productId`) VALUES
(1, 2, 12),
(2, 17, 1),
(30, 1, 19),
(4, 1, 28),
(5, 1, 33),
(27, 1, 18),
(9, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `_followers`
--

CREATE TABLE `_followers` (
  `followersId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_searches`
--

CREATE TABLE `_searches` (
  `searchesId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_searches`
--

INSERT INTO `_searches` (`searchesId`, `userId`, `keyword`, `date`) VALUES
(1, 2, 'arduino', '2018-08-09 02:55:42'),
(2, 0, 'a', '2018-08-09 03:01:03'),
(3, 0, 'ar', '2018-08-09 03:01:03'),
(4, 0, 'ard', '2018-08-09 03:01:03'),
(5, 1, 'u', '2018-08-09 03:01:48'),
(6, 1, 'um', '2018-08-09 03:01:48'),
(7, 1, 'umu', '2018-08-09 03:01:49'),
(8, 1, 'umut', '2018-08-09 03:01:49'),
(9, 1, 'umuti', '2018-08-09 03:01:49'),
(10, 0, 'undefined', '2018-08-09 03:02:09'),
(11, 0, 'undefined', '2018-08-09 03:05:20'),
(12, 0, 'undefined', '2018-08-09 03:46:53'),
(13, 0, 'undefined', '2018-08-11 00:00:54'),
(14, 0, 'undefined', '2018-08-11 00:28:29'),
(15, 0, 'h', '2018-08-11 00:28:34'),
(16, 0, 'ho', '2018-08-11 00:28:35'),
(17, 0, 'hoo', '2018-08-11 00:28:35'),
(18, 0, 'hood', '2018-08-11 00:28:37'),
(19, 0, 'hoo', '2018-08-11 00:28:38'),
(20, 0, 'ho', '2018-08-11 00:28:38'),
(21, 0, 'h', '2018-08-11 00:28:38'),
(22, 0, 'undefined', '2018-08-11 00:29:21'),
(23, 1, 'undefined', '2018-08-11 01:14:02'),
(24, 1, 'undefined', '2018-08-11 01:15:54'),
(25, 1, 'undefined', '2018-08-11 01:18:40'),
(26, 0, 'P', '2018-08-11 01:56:34'),
(27, 0, 'undefined', '2018-08-11 01:57:05'),
(28, 0, 'undefined', '2018-08-11 01:57:53'),
(29, 1, 'undefined', '2018-08-11 02:21:31'),
(30, 1, 'undefined', '2018-08-11 02:23:31'),
(31, 1, 'undefined', '2018-08-11 02:24:14'),
(32, 1, 'undefined', '2018-08-11 02:24:23'),
(33, 1, 'undefined', '2018-08-11 02:26:45'),
(34, 1, 'undefined', '2018-08-11 02:53:20'),
(35, 1, 'undefined', '2018-08-11 02:57:39'),
(36, 1, 'undefined', '2018-08-11 02:57:43'),
(37, 1, 'undefined', '2018-08-11 03:04:59'),
(38, 1, 'undefined', '2018-08-11 03:05:43'),
(39, 0, 'undefined', '2018-08-11 03:27:15'),
(40, 0, 'undefined', '2018-08-11 03:29:10'),
(41, 0, 'undefined', '2018-08-11 03:30:54'),
(42, 0, 'undefined', '2018-08-11 03:34:42'),
(43, 0, 'undefined', '2018-08-11 03:38:55'),
(44, 0, 'undefined', '2018-08-11 03:39:06'),
(45, 0, 'undefined', '2018-08-11 03:39:43'),
(46, 0, 'undefined', '2018-08-11 03:42:38'),
(47, 0, 'undefined', '2018-08-11 03:50:34'),
(48, 0, 'undefined', '2018-08-11 03:51:48'),
(49, 0, 'undefined', '2018-08-11 03:58:04'),
(50, 0, 'undefined', '2018-08-14 13:20:00'),
(51, 0, 'undefined', '2018-08-14 14:54:46'),
(52, 0, 'undefined', '2018-08-14 18:13:53'),
(53, 0, 'undefined', '2018-08-20 16:01:24'),
(54, 0, 'undefined', '2018-08-22 16:39:00'),
(55, 0, 'undefined', '2018-08-22 16:41:29'),
(56, 0, 'undefined', '2018-08-23 15:04:50'),
(57, 0, 'undefined', '2018-08-23 18:19:07'),
(58, 0, 'undefined', '2018-08-23 18:19:18'),
(59, 0, 'undefined', '2018-08-23 18:21:26'),
(60, 0, 'undefined', '2018-08-23 18:22:09'),
(61, 0, 'undefined', '2018-08-23 18:22:42'),
(62, 0, 'undefined', '2018-08-23 18:22:53'),
(63, 0, 'undefined', '2018-08-23 18:34:36'),
(64, 0, 'undefined', '2018-08-23 18:38:42'),
(65, 0, 'undefined', '2018-08-24 08:16:01'),
(66, 0, 'undefined', '2018-08-24 08:19:26'),
(67, 0, 'undefined', '2018-08-28 06:04:14'),
(68, 0, 'undefined', '2018-08-29 08:43:26'),
(69, 0, 'undefined', '2018-08-29 08:46:18'),
(70, 0, 'undefined', '2018-08-29 19:32:53'),
(71, 0, 'undefined', '2018-08-31 12:03:44'),
(72, 0, 'undefined', '2018-09-03 16:08:41'),
(73, 0, 'undefined', '2018-09-03 20:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `_sessions`
--

CREATE TABLE `_sessions` (
  `sessionsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `sessionCountry` varchar(100) NOT NULL,
  `sessionRegion` varchar(100) NOT NULL,
  `sessionCity` varchar(100) NOT NULL,
  `device` varchar(100) NOT NULL,
  `webVersions` int(11) NOT NULL,
  `timeIn` datetime NOT NULL,
  `Output` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_sessions`
--

INSERT INTO `_sessions` (`sessionsId`, `userId`, `sessionCountry`, `sessionRegion`, `sessionCity`, `device`, `webVersions`, `timeIn`, `Output`) VALUES
(1, 1, 'hoods', 'hoods', 'hoods', 'mobile', 1, '2018-08-09 00:00:00', 2147483647),
(2, 1, 'Rwanda', 'Kigali', 'Rwanda', 'Desktop', 1, '0000-00-00 00:00:00', 0),
(3, 1, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '0000-00-00 00:00:00', 0),
(4, 0, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-08 22:43:06', 1),
(5, 1, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-08 22:43:25', 0),
(6, 0, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-08 22:46:08', 1),
(7, 1, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-08 23:01:43', 0),
(8, 0, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-08 23:02:09', 1),
(9, 1, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-08 23:33:22', 0),
(10, 0, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-08 23:46:53', 1),
(11, 1, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-10 19:59:54', 0),
(12, 0, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-10 20:00:54', 1),
(13, 1, 'Rwanda', 'Kigali', 'Kigali', 'Desktop', 1, '2018-08-10 21:04:22', 0),
(14, 1, '', '', '', 'Desktop', 1, '2018-08-10 23:29:22', 0),
(15, 0, '', '', '', 'Desktop', 1, '2018-08-10 23:30:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_views`
--

CREATE TABLE `_views` (
  `viewsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_views`
--

INSERT INTO `_views` (`viewsId`, `userId`, `productId`, `date`) VALUES
(1, 1, 18, '2018-08-11 02:55:20'),
(2, 1, 18, '2018-08-11 02:55:38'),
(3, 1, 19, '2018-08-11 02:57:27'),
(4, 1, 19, '2018-08-11 02:57:27'),
(5, 1, 18, '2018-08-11 02:58:19'),
(6, 1, 17, '2018-08-11 02:59:57'),
(7, 1, 20, '2018-08-11 03:00:13'),
(8, 1, 20, '2018-08-11 03:00:13'),
(9, 1, 35, '2018-08-11 03:00:18'),
(10, 1, 35, '2018-08-11 03:00:18'),
(11, 1, 35, '2018-08-11 03:00:18'),
(12, 1, 35, '2018-08-11 03:00:18'),
(13, 1, 35, '2018-08-11 03:00:18'),
(14, 1, 35, '2018-08-11 03:00:18'),
(15, 1, 35, '2018-08-11 03:00:18'),
(16, 1, 17, '2018-08-11 03:01:33'),
(17, 1, 19, '2018-08-11 03:03:03'),
(18, 1, 18, '2018-08-11 03:03:08'),
(19, 1, 18, '2018-08-11 03:03:08'),
(20, 1, 19, '2018-08-11 03:03:11'),
(21, 1, 19, '2018-08-11 03:03:11'),
(22, 0, 36, '2018-08-11 03:26:36'),
(23, 0, 18, '2018-08-11 03:28:00'),
(24, 0, 36, '2018-08-11 03:28:10'),
(25, 0, 18, '2018-08-11 03:28:58'),
(26, 1, 17, '2018-08-11 03:29:38'),
(27, 0, 17, '2018-08-11 03:34:33'),
(28, 0, 17, '2018-08-11 03:36:23'),
(29, 0, 17, '2018-08-11 03:38:51'),
(30, 0, 17, '2018-08-11 03:39:01'),
(31, 0, 17, '2018-08-11 03:42:35'),
(32, 0, 17, '2018-08-11 03:42:45'),
(33, 0, 17, '2018-08-11 03:49:38'),
(34, 0, 17, '2018-08-11 03:50:32'),
(35, 0, 28, '2018-08-11 03:51:45'),
(36, 0, 17, '2018-08-11 03:57:56'),
(37, 0, 24, '2018-08-14 08:57:11'),
(38, 0, 17, '2018-08-14 08:57:42'),
(39, 0, 26, '2018-08-14 08:57:50'),
(40, 0, 26, '2018-08-14 08:57:50'),
(41, 0, 26, '2018-08-14 08:57:50'),
(42, 0, 26, '2018-08-14 08:57:50'),
(43, 0, 26, '2018-08-14 08:57:50'),
(44, 0, 17, '2018-08-14 12:51:48'),
(45, 0, 18, '2018-08-14 13:35:22'),
(46, 0, 22, '2018-08-14 18:18:07'),
(47, 0, 17, '2018-08-20 16:01:14'),
(48, 0, 36, '2018-08-20 16:01:26'),
(49, 0, 33, '2018-08-22 16:37:12'),
(50, 0, 18, '2018-08-22 16:37:31'),
(51, 0, 35, '2018-08-22 16:37:51'),
(52, 0, 34, '2018-08-22 16:37:59'),
(53, 0, 34, '2018-08-22 16:37:59'),
(54, 0, 34, '2018-08-22 16:37:59'),
(55, 0, 18, '2018-08-22 16:39:18'),
(56, 0, 19, '2018-08-22 16:39:27'),
(57, 0, 19, '2018-08-22 16:39:27'),
(58, 0, 17, '2018-08-22 16:39:53'),
(59, 0, 36, '2018-08-22 16:40:00'),
(60, 0, 36, '2018-08-22 16:40:00'),
(61, 0, 36, '2018-08-22 16:40:09'),
(62, 0, 33, '2018-08-22 16:40:47'),
(63, 0, 23, '2018-08-22 16:40:52'),
(64, 0, 23, '2018-08-22 16:40:52'),
(65, 0, 18, '2018-08-22 16:41:46'),
(66, 0, 28, '2018-08-22 16:41:52'),
(67, 0, 18, '2018-08-23 18:26:36'),
(68, 0, 36, '2018-08-23 18:30:14'),
(69, 0, 36, '2018-08-23 18:30:14'),
(70, 0, 36, '2018-08-23 18:30:14'),
(71, 0, 36, '2018-08-23 18:30:50'),
(72, 0, 36, '2018-08-23 18:30:51'),
(73, 0, 36, '2018-08-23 18:30:51'),
(74, 0, 36, '2018-08-23 18:30:51'),
(75, 0, 36, '2018-08-23 18:30:51'),
(76, 0, 36, '2018-08-23 18:30:54'),
(77, 0, 36, '2018-08-23 18:30:54'),
(78, 0, 36, '2018-08-23 18:30:54'),
(79, 0, 35, '2018-08-23 18:31:26'),
(80, 0, 35, '2018-08-23 18:31:26'),
(81, 0, 24, '2018-08-23 18:34:10'),
(82, 0, 24, '2018-08-23 18:34:11'),
(83, 0, 24, '2018-08-23 18:34:11'),
(84, 0, 24, '2018-08-23 18:34:11'),
(85, 0, 24, '2018-08-23 18:34:11'),
(86, 0, 24, '2018-08-23 18:34:11'),
(87, 0, 24, '2018-08-23 18:34:12'),
(88, 0, 24, '2018-08-23 18:34:12'),
(89, 0, 24, '2018-08-23 18:34:12'),
(90, 0, 24, '2018-08-23 18:34:12'),
(91, 0, 24, '2018-08-23 18:34:12'),
(92, 0, 24, '2018-08-23 18:34:12'),
(93, 0, 24, '2018-08-23 18:34:13'),
(94, 0, 24, '2018-08-23 18:34:13'),
(95, 0, 24, '2018-08-23 18:34:13'),
(96, 0, 24, '2018-08-23 18:34:13'),
(97, 0, 24, '2018-08-23 18:34:13'),
(98, 0, 24, '2018-08-23 18:34:13'),
(99, 0, 24, '2018-08-23 18:34:13'),
(100, 0, 24, '2018-08-23 18:34:13'),
(101, 0, 24, '2018-08-23 18:34:13'),
(102, 0, 24, '2018-08-23 18:34:14'),
(103, 0, 24, '2018-08-23 18:34:14'),
(104, 0, 24, '2018-08-23 18:34:14'),
(105, 0, 24, '2018-08-23 18:34:14'),
(106, 0, 24, '2018-08-23 18:34:14'),
(107, 0, 24, '2018-08-23 18:34:14'),
(108, 0, 24, '2018-08-23 18:34:18'),
(109, 0, 24, '2018-08-23 18:34:18'),
(110, 0, 22, '2018-08-23 18:37:17'),
(111, 0, 18, '2018-08-23 18:37:55'),
(112, 0, 17, '2018-08-23 19:04:11'),
(113, 0, 28, '2018-08-24 08:15:49'),
(114, 0, 13, '2018-08-24 08:18:55'),
(115, 0, 27, '2018-08-24 08:20:09'),
(116, 0, 18, '2018-08-28 06:01:54'),
(117, 0, 28, '2018-08-28 06:03:40'),
(118, 0, 36, '2018-08-28 06:05:11'),
(119, 0, 35, '2018-08-28 06:05:52'),
(120, 0, 35, '2018-08-28 06:05:52'),
(121, 0, 36, '2018-08-28 06:06:04'),
(122, 0, 36, '2018-08-28 06:06:04'),
(123, 0, 23, '2018-08-31 11:32:33'),
(124, 0, 24, '2018-08-31 11:32:46'),
(125, 0, 24, '2018-08-31 11:32:46'),
(126, 0, 24, '2018-08-31 11:32:47'),
(127, 0, 24, '2018-08-31 11:32:47'),
(128, 0, 23, '2018-08-31 11:33:08'),
(129, 0, 23, '2018-08-31 11:33:08'),
(130, 0, 21, '2018-08-31 12:03:09'),
(131, 0, 36, '2018-08-31 12:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `_visits`
--

CREATE TABLE `_visits` (
  `visitsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `timeIn` datetime NOT NULL,
  `visitCountry` varchar(100) NOT NULL,
  `visitRegion` varchar(100) NOT NULL,
  `visitCity` varchar(100) NOT NULL,
  `visitIp` varchar(50) NOT NULL,
  `device` varchar(100) NOT NULL,
  `webVersion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_visits`
--

INSERT INTO `_visits` (`visitsId`, `userId`, `timeIn`, `visitCountry`, `visitRegion`, `visitCity`, `visitIp`, `device`, `webVersion`) VALUES
(1, 1, '2018-08-10 23:01:25', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(2, 1, '2018-08-10 23:05:38', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(3, 0, '2018-08-10 23:19:04', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(4, 0, '2018-08-10 23:26:29', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(5, 0, '2018-08-10 23:36:20', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(6, 0, '2018-08-10 23:38:48', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(7, 0, '2018-08-10 23:39:40', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(8, 0, '2018-08-10 23:49:29', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(9, 0, '2018-08-10 23:56:53', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(10, 0, '2018-08-14 04:57:02', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(11, 0, '2018-08-14 08:22:04', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(12, 0, '2018-08-14 08:39:04', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(13, 0, '2018-08-14 09:00:26', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(14, 0, '2018-08-14 09:12:01', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(15, 0, '2018-08-14 09:13:46', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(16, 0, '2018-08-14 09:15:17', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(17, 0, '2018-08-14 09:17:00', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(18, 0, '2018-08-14 09:19:39', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(19, 0, '2018-08-14 09:24:08', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(20, 0, '2018-08-14 09:24:38', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(21, 0, '2018-08-14 09:27:40', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(22, 0, '2018-08-14 09:27:55', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(23, 0, '2018-08-14 09:28:31', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(24, 0, '2018-08-14 09:29:50', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(25, 0, '2018-08-14 09:30:15', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(26, 0, '2018-08-14 09:31:16', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(27, 0, '2018-08-14 09:32:08', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(28, 0, '2018-08-14 09:37:29', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(29, 0, '2018-08-14 09:41:01', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(30, 0, '2018-08-14 09:42:21', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(31, 0, '2018-08-14 09:58:26', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(32, 0, '2018-08-14 09:59:14', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(33, 0, '2018-08-14 10:05:18', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(34, 0, '2018-08-14 10:09:42', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(35, 0, '2018-08-14 10:17:40', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(36, 0, '2018-08-14 10:18:29', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(37, 0, '2018-08-14 10:19:44', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(38, 0, '2018-08-14 10:20:24', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(39, 0, '2018-08-14 10:20:54', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(40, 0, '2018-08-14 10:22:55', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(41, 0, '2018-08-14 10:28:30', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(42, 0, '2018-08-14 10:29:29', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(43, 0, '2018-08-14 10:38:12', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(44, 0, '2018-08-14 10:38:57', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(45, 0, '2018-08-14 10:39:52', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(46, 0, '2018-08-14 10:42:13', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(47, 0, '2018-08-14 10:48:05', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(48, 0, '2018-08-14 10:48:34', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(49, 0, '2018-08-14 10:52:31', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(50, 0, '2018-08-14 11:31:18', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(51, 0, '2018-08-14 11:42:00', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(52, 0, '2018-08-14 11:42:15', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(53, 0, '2018-08-14 11:43:32', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(54, 0, '2018-08-14 11:44:07', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(55, 0, '2018-08-14 11:44:22', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(56, 0, '2018-08-14 11:45:31', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(57, 0, '2018-08-14 11:49:05', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(58, 0, '2018-08-14 11:49:36', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(59, 0, '2018-08-14 11:49:59', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(60, 0, '2018-08-14 12:06:07', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(61, 0, '2018-08-14 12:16:04', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(62, 0, '2018-08-14 12:17:42', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(63, 0, '2018-08-14 12:27:16', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(64, 0, '2018-08-14 12:29:18', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(65, 0, '2018-08-14 12:31:02', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(66, 0, '2018-08-14 12:31:42', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(67, 0, '2018-08-14 12:37:55', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(68, 0, '2018-08-14 12:38:06', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(69, 0, '2018-08-14 12:43:25', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(70, 0, '2018-08-14 12:44:45', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(71, 0, '2018-08-14 12:45:40', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(72, 0, '2018-08-14 12:46:29', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(73, 0, '2018-08-14 12:48:18', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(74, 0, '2018-08-14 12:48:28', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(75, 0, '2018-08-14 12:48:48', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(76, 0, '2018-08-14 12:51:07', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(77, 0, '2018-08-14 12:51:51', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(78, 0, '2018-08-14 14:11:22', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.70', '', 1),
(79, 0, '2018-08-16 07:04:28', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.70', '', 1),
(80, 0, '2018-08-16 21:10:50', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(81, 0, '2018-08-17 22:59:03', 'United States', 'California', 'Mountain View', '66.249.79.149', '', 1),
(82, 0, '2018-08-18 23:24:54', 'United States', 'California', 'Mountain View', '66.249.79.145', '', 1),
(83, 0, '2018-08-20 06:17:42', 'Rwanda', 'Kigali', 'Kigali', '154.68.126.5', '', 1),
(84, 0, '2018-08-20 07:51:26', 'Rwanda', 'Kigali', 'Kigali', '154.68.126.5', '', 1),
(85, 0, '2018-08-20 07:57:36', 'Rwanda', 'Kigali', 'Kigali', '154.68.126.5', '', 1),
(86, 0, '2018-08-20 10:26:16', 'Guatemala', 'Departamento de Guatemala', 'Guatemala City', '181.174.101.108', '', 1),
(87, 0, '2018-08-20 12:00:54', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1),
(88, 0, '2018-08-20 17:21:52', 'United States', 'California', 'Mountain View', '66.249.79.145', '', 1),
(89, 0, '2018-08-21 18:30:55', 'United States', 'California', 'Mountain View', '66.249.73.77', '', 1),
(90, 0, '2018-08-22 10:23:37', 'United States', 'California', 'Mountain View', '66.249.73.77', '', 1),
(91, 0, '2018-08-22 12:03:01', 'Rwanda', 'Kigali', 'Kigali', '154.68.126.5', '', 1),
(92, 0, '2018-08-22 12:36:57', 'Rwanda', 'Kigali', 'Kigali', '154.68.126.5', '', 1),
(93, 0, '2018-08-23 14:16:53', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.66', '', 1),
(94, 0, '2018-08-23 14:18:19', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.66', '', 1),
(95, 0, '2018-08-23 14:18:22', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.66', '', 1),
(96, 0, '2018-08-23 14:18:35', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.66', '', 1),
(97, 0, '2018-08-23 14:54:18', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.66', '', 1),
(98, 0, '2018-08-23 14:56:00', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.66', '', 1),
(99, 0, '2018-08-23 14:56:03', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.66', '', 1),
(100, 0, '2018-08-23 14:57:56', 'United States', 'Virginia', 'Ashburn', '66.249.70.16', '', 1),
(101, 0, '2018-08-23 15:04:02', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.66', '', 1),
(102, 0, '2018-08-24 04:13:35', 'Rwanda', 'Kigali', 'Kigali', '197.234.245.1', '', 1),
(103, 0, '2018-08-24 04:17:10', 'Rwanda', 'Kigali', 'Kigali', '197.234.245.1', '', 1),
(104, 0, '2018-08-24 05:31:49', 'Rwanda', 'Kigali', 'Kigali', '197.234.245.1', '', 1),
(105, 0, '2018-08-24 17:11:03', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.72', '', 1),
(106, 0, '2018-08-26 04:07:37', 'United States', 'New Jersey', 'Newark', '66.220.149.5', '', 1),
(107, 0, '2018-08-28 22:35:03', 'United States', 'Virginia', 'Ashburn', '66.249.70.16', '', 1),
(108, 0, '2018-08-29 13:21:21', 'Rwanda', 'Kigali', 'Kigali', '197.234.245.1', '', 1),
(109, 0, '2018-08-30 19:07:29', 'United States', 'Virginia', 'Ashburn', '66.249.70.16', '', 1),
(110, 0, '2018-08-31 07:59:49', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.70', '', 1),
(111, 0, '2018-09-02 10:31:06', 'Rwanda', 'Kigali', 'Kigali', '41.186.83.70', '', 1),
(112, 0, '2018-09-03 16:00:56', 'Rwanda', 'Kigali', 'Kigali', '197.234.245.1', '', 1),
(113, 0, '2018-09-03 18:36:16', 'Rwanda', 'Kigali', 'Kigali', '41.74.174.254', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acount_activation`
--
ALTER TABLE `acount_activation`
  ADD PRIMARY KEY (`activation_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `projects_categories`
--
ALTER TABLE `projects_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pubs`
--
ALTER TABLE `pubs`
  ADD PRIMARY KEY (`pubid`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopusers`
--
ALTER TABLE `shopusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `usermessages`
--
ALTER TABLE `usermessages`
  ADD PRIMARY KEY (`messId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects_categories`
--
ALTER TABLE `projects_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pubs`
--
ALTER TABLE `pubs`
  MODIFY `pubid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shopusers`
--
ALTER TABLE `shopusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `usermessages`
--
ALTER TABLE `usermessages`
  MODIFY `messId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
