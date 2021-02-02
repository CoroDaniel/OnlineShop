-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2020 at 06:11 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `user_id`) VALUES
(1, 3, 4, 2),
(2, 1, 3, 2),
(6, 2, 3, 2),
(8, 4, 2, 8),
(9, 5, 1, 16),
(10, 4, 1, 16),
(11, 3, 1, 16),
(12, 3, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `image` text NOT NULL,
  `price` double(8,2) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `dimensions` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `category`, `description`, `dimensions`) VALUES
(1, 'Usa Exterior termorezistenta', 'usa1.jpg', 850.00, 'usa_exterior', 'Usa metalica Ady B56Q mahon este decupata, vopsita cu lac ecologic in camp electrostatic si are continutul din carton rigidizat. Aceasta este ermetizata cu garnitura de cauciuc pe tot perimetrul.Pe langa rolul practic de protectie, usa de la intrare reprezinta totodata si cartea de vizita a locuintei dumneavoastra. Usa este cea ofera o prima impresie asupra spatiului in care urmeaza sa patrundeti.', '90x202'),
(2, 'Fereastra PVC termopan KBE ', 'fereastra1.jpg', 480.00, 'fereastra_termopan', NULL, NULL),
(3, 'Usa Interior Lemn', 'usa2.jpg', 620.00, 'usa_interior', '', ''),
(4, 'Fereastra Lemn', 'fereastra2.jpg', 360.00, 'fereastra_lemn', NULL, NULL),
(5, 'Usa metalica de exterior', 'usa9.jpg', 920.00, 'usa_exterior', 'Usile metalice de exterior NOVO DOORS gama LUX sunt comercializate numai in kit complet, adica pachetul contine foaie de usa, toc cu o latime de 5 centimetri,3 balamale, broasca cu cheie.  Usile sunt confectionate din metal si au izolatie din carton intre foile de tabla  Se pot monta atat acasa cat si in birouri sau spatii comerciale, fiind foarte elegante  cadrul interior al usii este realizat din metal, avand rol de sustinere.', '88X200'),
(6, 'Fereastra lemn stratificat', 'fereastra10.jpg', 370.00, 'fereastra_lemn', 'Avantajele ferestrelor din lemn stratificat:<br> <br>  - proprietati termoizolante si fonice ridicate <br> - reducerea formarii mucegaiului si condensului, lemnul fiind un material care rezista sute de ani dovedindu-si calitatile sale unice<br>- deoarece lemnul este un material natural poate fi vopsit in orice culoare se doreste, oferind astfel un plus de eleganta si valoare locuintei', '140x120'),
(7, 'Usa metalica', 'usa6.jpg', 2100.00, 'usa_exterior', 'Usa metalica de exterior Tracia Atlas dubla este destinata intrarilor in locuinte (case), fiind rezistenta la intemperii.<br>Are doua fete imbinate prin sudura, iar tocul este realizat din tabla zincata de 1.5 mm grosime.  Usa metalica este vopsita cu vopsea pulbere in camp electrostatic. Vopseaua are o buna rezistenta la imbatranire in conditii atmosferice si la radiatii UV. Grosimea stratului de vopsea fiind de 60-80 microni.', '205x140'),
(9, 'Fereastra mansarda', 'fereastra4.jpg', 285.00, 'fereastra_termopan', 'Fereastra de mansarda din lemn cu deschidere mediana, cu clapeta de ventilatie, din gama Optilight.Fereastra de mansarda Optilight VB este dotata cu o clapeta de ventilatie ce asigura patrunderea aerului proaspat in incapere atunci cand fereastra este inchisa, reducandu-se astfel riscul formarii condensului.', '65x115'),
(10, 'Usa lemn masiv', 'usa4.jpg', 540.00, 'usa_interior', 'Usa interior din lemn masiv, rezistenta. <br>Usa are un design frumos si o culoare pala.', '90x200'),
(11, 'fereastra lemn cu obloane', 'fereastra3.jpg', 750.00, 'fereastra_lemn', 'Fereastra de inalta calitate cu obloane foarte stabile ce ofera confort si intimitate.', '140x135'),
(12, 'Usa matÄƒ interior ', 'usa12.jpg', 500.00, 'usa_interior', 'Usa are geam cu forme de frunze si are o culoare crem deschis.', '205x92'),
(13, 'Fereastra mahon', 'fereastra6.jpg', 410.00, 'fereastra_termopan', 'Fereastra Mahon inchis, cu inchidere buna a garniturilor, incat sansele de condens si transpiratia geamului sa fie minima.', '130x110');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `position` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `position`) VALUES
(2, 'dani', 'dani@gmail.com', '06c5c671b979dc2d963902e692acedf7', 1),
(4, 'mara', 'mara@gmail.com', 'e70e89097ce414a40fa0e0c01fed349e', 0),
(5, 'ana', 'ana@gmail.com', '98913e0a438f1e6376eedaef8541569b', 0),
(6, 'dan', 'dan@gmail.com', '4ba715503ca0b64f5d52d816dcae75e0', 0),
(7, 'mesesan', 'mese@gmail.com', 'f161a83d7535f827bb31b1b396330c27', 0),
(8, 'mihai', 'mihai@gmail.com', '6f8730b8c03e28e9186d703fcc17ee46', 0),
(9, 'victor', 'victor@yahoo.com', 'ffc150a160d37e92012c196b6af4160d', 0),
(10, 'ioan', 'ioan@gmail.com', '99032a4ea8bc59abaf0831d69918d82c', 0),
(11, 'miron', 'miron@yahoo.com', '02005f7a032c86959defe3391e77daed', 0),
(12, 'morar', 'mo@yah.com', '5d74518c89bbae2ab81f395a088389e3', 0),
(15, 'iosif', 'iosif@gmail.com', 'ae6a555357490eef4f0bedc3e5c911cf', 0),
(16, 'daria', 'daria@gmail.com', '9280b43fc4589291743b48d67b5f8453', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
