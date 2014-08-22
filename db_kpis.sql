-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 22-08-2014 a las 22:22:40
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_kpis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts_receivable`
--

CREATE TABLE `accounts_receivable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `currency_id` int(11) NOT NULL,
  `range_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_accounts_receivable_currency1_idx` (`currency_id`),
  KEY `fk_accounts_receivable_range1_idx` (`range_id`),
  KEY `fk_accounts_receivable_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `backorder`
--

CREATE TABLE `backorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `currency_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_backorder_currency1_idx` (`currency_id`),
  KEY `fk_backorder_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `people_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contact_people1_idx` (`people_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`id`, `title`, `people_id`) VALUES
(1, '', 2),
(2, '', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `prefix` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `currency`
--

INSERT INTO `currency` (`id`, `name`, `prefix`) VALUES
(1, 'Dolar', 'US'),
(2, 'Peso', 'MX'),
(3, 'Euro', 'EU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) NOT NULL,
  `account_name` varchar(45) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_customer_contact1_idx` (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`id`, `company_name`, `account_name`, `contact_id`, `create_time`) VALUES
(1, 'CUENTA 1', NULL, NULL, '2014-08-20 17:26:03'),
(2, 'CUENTA 2', NULL, NULL, '2014-08-20 17:26:03'),
(3, 'CUENTA 3', NULL, NULL, '2014-08-20 17:26:03'),
(4, 'CUENTA 4', NULL, NULL, '2014-08-20 17:26:03'),
(5, 'CUENTA 5', NULL, NULL, '2014-08-20 17:26:03'),
(6, 'prueba empresa ññ', '', 1, '2014-08-21 18:36:59'),
(7, 'fer', '', 2, '2014-08-21 22:55:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_id` int(11) NOT NULL,
  `week_collection` double NOT NULL,
  `depot_stock` double NOT NULL,
  `week_embarked` double NOT NULL,
  `register_date` date NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_data_currency1_idx` (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`id`, `currency_id`, `week_collection`, `depot_stock`, `week_embarked`, `register_date`, `create_at`) VALUES
(1, 1, 10000, 10000, 10000, '0000-00-00', '2014-08-22 19:28:23'),
(2, 1, 10000, 10000, 10000, '2014-08-22', '2014-08-22 19:29:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deal`
--

CREATE TABLE `deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_name` varchar(45) NOT NULL,
  `value` double NOT NULL,
  `currency_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `advance_percent` decimal(2,0) NOT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `create_time` varchar(45) NOT NULL,
  `delete_status` int(11) NOT NULL,
  `deal_status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_deal_currency1_idx` (`currency_id`),
  KEY `fk_deal_employee1_idx` (`employee_id`),
  KEY `fk_deal_sector1_idx` (`sector_id`),
  KEY `fk_deal_deal_status1_idx` (`deal_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `deal`
--

INSERT INTO `deal` (`id`, `deal_name`, `value`, `currency_id`, `employee_id`, `sector_id`, `advance_percent`, `comment`, `create_time`, `delete_status`, `deal_status_id`) VALUES
(1, 'Test ññ', 123, 1, 1, 2, 0, '', '2014-08-22', 1, 2),
(2, 'Prueba 2 ñññ', 12333, 1, 1, 2, 0, '', '2014-08-22', 1, 1),
(3, 'prueba testttet ññññññ', 123434432, 1, 1, 3, 0, '', '2014-08-22', 1, 2),
(4, 'prueba testttet ññññññ', 123434432, 1, 1, 3, 0, '', '2014-08-22', 1, 2),
(5, 'prueba testttet ññññññ', 123434432, 1, 1, 3, 0, '', '2014-08-22', 1, 2),
(6, 'prueba testttet ññññññ', 123434432, 1, 1, 3, 0, '', '2014-08-22', 1, 2),
(7, 'prueba testttet ññññññ', 123434432, 1, 1, 1, 0, '', '2014-08-22', 1, 1),
(8, 'prueba testttet ññññññ', 123434432, 1, 1, 1, 0, '', '2014-08-22', 1, 1),
(9, 'prueba testttet ññññññ', 123434432, 1, 1, 1, 0, '', '2014-08-22', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deal_status`
--

CREATE TABLE `deal_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `prefix` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `deal_status`
--

INSERT INTO `deal_status` (`id`, `name`, `prefix`) VALUES
(1, 'ForeCast', NULL),
(2, 'BackOrder', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `prefix` varchar(45) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `people_id` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_employee_idx` (`manager_id`),
  KEY `fk_employee_people1_idx` (`people_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`id`, `title`, `prefix`, `manager_id`, `people_id`, `delete_status`) VALUES
(1, 'Ing', NULL, NULL, 2, 1),
(2, 'Ing', NULL, NULL, 1, 1),
(3, 'ing', NULL, NULL, 3, 1),
(4, 'ing', NULL, NULL, 4, 1),
(5, 'ing', NULL, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kpi_customer`
--

CREATE TABLE `kpi_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kpi_customer_customer1_idx` (`customer_id`),
  KEY `fk_kpi_customer_currency1_idx` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kpi_employee`
--

CREATE TABLE `kpi_employee` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `employee_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kpi_employee_employee1_idx` (`employee_id`),
  KEY `fk_kpi_employee_currency1_idx` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pending_referrals`
--

CREATE TABLE `pending_referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `currency_id` int(11) NOT NULL,
  `range_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_pending_referrals_currency1_idx` (`currency_id`),
  KEY `fk_pending_referrals_range1_idx` (`range_id`),
  KEY `fk_pending_referrals_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `cellphone` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `email`, `birthdate`, `cellphone`, `phone`) VALUES
(1, 'Fernando', 'Beltrán', 'fernando@gruposellcom.com', NULL, NULL, NULL),
(2, 'Javier', 'Calvillo', 'javier@gruposellcom.com', NULL, NULL, NULL),
(3, 'Omar', 'Larios', 'omar@gruposellcom.com', NULL, NULL, NULL),
(4, 'Ruy', 'Trinidad', 'ruy@gruposellcom.com', NULL, NULL, NULL),
(5, 'S', '!', 'sellcom@gruposellcom.com', NULL, NULL, NULL),
(6, 'nombre ñññ', 'apellido ñññ', 'prueba@gmail.com', NULL, NULL, '123456789'),
(7, 'sds', 'aasdad', 'm@gmail.com', NULL, NULL, '312312312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`id`, `name`) VALUES
(1, 'Administrador'),
(2, 'Finanzas'),
(3, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `range`
--

CREATE TABLE `range` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `range_start` int(11) NOT NULL,
  `range_end` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `currency_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_sales_currency1_idx` (`currency_id`),
  KEY `fk_sales_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `prefix` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `name`, `prefix`) VALUES
(1, 'Banca', NULL),
(2, 'Bal', NULL),
(3, 'Otros', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `currency_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_stock_currency1_idx` (`currency_id`),
  KEY `fk_stock_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `people_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_user_people1_idx` (`people_id`),
  KEY `fk_user_profile1_idx` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `people_id`, `profile_id`, `password`, `create_at`) VALUES
(1, 2, 1, '12345', '2014-08-21 16:03:29'),
(2, 1, 3, '12345', '2014-08-21 16:03:29'),
(3, 3, 1, '12345', '2014-08-22 19:44:05'),
(4, 4, 2, '12345', '2014-08-22 19:44:22'),
(5, 5, 1, '12345', '2014-08-22 19:44:32');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  ADD CONSTRAINT `fk_accounts_receivable_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accounts_receivable_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accounts_receivable_range1` FOREIGN KEY (`range_id`) REFERENCES `range` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `backorder`
--
ALTER TABLE `backorder`
  ADD CONSTRAINT `fk_backorder_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_backorder_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contact_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_contact1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `fk_data_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `fk_deal_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deal_deal_status1` FOREIGN KEY (`deal_status_id`) REFERENCES `deal_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deal_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deal_sector1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_employee` FOREIGN KEY (`manager_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `kpi_customer`
--
ALTER TABLE `kpi_customer`
  ADD CONSTRAINT `fk_kpi_customer_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kpi_customer_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `kpi_employee`
--
ALTER TABLE `kpi_employee`
  ADD CONSTRAINT `fk_kpi_employee_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kpi_employee_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pending_referrals`
--
ALTER TABLE `pending_referrals`
  ADD CONSTRAINT `fk_pending_referrals_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pending_referrals_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pending_referrals_range1` FOREIGN KEY (`range_id`) REFERENCES `range` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_currency1` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_profile1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
