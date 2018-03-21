-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2018 a las 09:50:37
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beitech_db`
--

CREATE DATABASE beitech_db;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `available_products`
--

CREATE TABLE `available_products` (
  `PRODUCT_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `available_products`
--

INSERT INTO `available_products` (`PRODUCT_ID`, `CUSTOMER_ID`) VALUES
(1, 654798),
(2, 654798),
(3, 654798),
(4, 12345),
(5, 568884),
(5, 987463),
(6, 568884),
(7, 23456),
(7, 568884),
(7, 654798),
(8, 654798),
(9, 654798);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `CUSTOMER_NAME` varchar(255) NOT NULL,
  `CUSTOMER_EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `CUSTOMER_NAME`, `CUSTOMER_EMAIL`) VALUES
(12345, 'Alan Turing', 'alan.turing@hotmail.com'),
(23456, 'Linus Torvadls ', 'linus.torvalds@gmail.com'),
(568884, 'Biil Gates', 'biil.gates@hotmail.com'),
(654798, 'Steve Jobs', 'steve.jobs@hotmail.com'),
(987463, 'Steve Bosnyak', 'steve.bosnyak@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_`
--

CREATE TABLE `order_` (
  `ORDER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `ORDER_DELIVERYADDRES` varchar(255) DEFAULT NULL,
  `ORDER_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_detail`
--

CREATE TABLE `order_detail` (
  `ORDER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `ORDERDETAIL_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(255) NOT NULL,
  `PRODUCT_PRICE` int(11) NOT NULL,
  `PRODUCT_DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_DESCRIPTION`) VALUES
(1, 'Macbook', 650, 'Apple Macbook Pro 2016 13 8gb Intel Core I5 2.0ghz Ssd 256gb'),
(2, 'Apple Watch', 200, 'Apple Watch Series 1 38mm Aluminum Case Black Sport Band - (MP022LL/A)'),
(3, 'MacBook Air', 500, 'Apple MacBook Air 13.3\" Laptop (Mid 2013) - i5 1.3GHz 4GB RAM 256GB SSD'),
(4, 'DJI Mavic Air ', 799, 'DJI Mavic Air - Arctic White Drone - 4K Camera, 32MP Sphere Panoramas!'),
(5, 'Tactical Lantern ', 200, 'Tactical 50000Lumens T6 LED Flashlight Zoomable 18650 Military Focus Torch'),
(6, 'Xbox One ', 299, 'Xbox One S 1TB PlayerUnknown\'s Battlegrounds Bundle'),
(7, 'Wristwatch', 425, 'Citizen Men\'s BL5250-02L Brown Leather Japanese Quartz Dress Watch'),
(8, 'Iphone 7', 380, 'Apple iPhone 7 Plus, 7, 256GB 128GB 32GB Factory Unlocked 4G LTE iOS Smartphone'),
(9, 'Iphone 6s', 280, 'iPhone 6S 16gb/32gb/64gb Unlocked Smartphone in Gold, Silver, Gray or Rose'),
(10, 'iPhone 6', 200, 'Apple iPhone 6 16GB 4G LTE Factory Unlocked Smartphone Grey Gold Perfect');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `available_products`
--
ALTER TABLE `available_products`
  ADD PRIMARY KEY (`PRODUCT_ID`,`CUSTOMER_ID`),
  ADD KEY `FK_CUSTOMER_CUSTOMPROD` (`CUSTOMER_ID`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indices de la tabla `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `FK_CUSTOMER_ORDER` (`CUSTOMER_ID`);

--
-- Indices de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ORDER_ID`,`PRODUCT_ID`),
  ADD KEY `FK_PRODUCT_ORDERDET` (`PRODUCT_ID`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `available_products`
--
ALTER TABLE `available_products`
  ADD CONSTRAINT `FK_CUSTOMER_CUSTOMPROD` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`CUSTOMER_ID`),
  ADD CONSTRAINT `FK_PRODUCT_AVAILABLEPRO` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`);

--
-- Filtros para la tabla `order_`
--
ALTER TABLE `order_`
  ADD CONSTRAINT `FK_CUSTOMER_ORDER` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customer` (`CUSTOMER_ID`);

--
-- Filtros para la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_ORDER_ORDERDETA` FOREIGN KEY (`ORDER_ID`) REFERENCES `order_` (`ORDER_ID`),
  ADD CONSTRAINT `FK_PRODUCT_ORDERDET` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
