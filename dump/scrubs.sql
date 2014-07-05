-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 01 2014 г., 09:37
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `scrubs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `subtype` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(6) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `doctors_patients`
--

CREATE TABLE IF NOT EXISTS `doctors_patients` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `doctors_rooms`
--

CREATE TABLE IF NOT EXISTS `doctors_rooms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `operations`
--

CREATE TABLE IF NOT EXISTS `operations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `card_num` int(6) NOT NULL,
  `history` longtext,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `insurance_num` int(16) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` varchar(6) NOT NULL,
  `native_city_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `card_num` (`card_num`),
  UNIQUE KEY `insurance_num` (`insurance_num`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `card_num`, `history`, `photo`, `name`, `insurance_num`, `email`, `sex`, `native_city_id`) VALUES
(100, 846792, 'Tears flowed down the creek, going green snot and sore throat ... expired second year', NULL, 'Vitaliy', NULL, 'glob@mail.ru', 'never', 0),
(101, 742721, 'Head injury, swelling, concussion. A patient suffering from amnesia and headaches.', NULL, '*Forgoten*', NULL, 'forgotten@maila.net', 'may be', 0),
(102, 0, NULL, NULL, 'Vitaliy', NULL, NULL, 'more t', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `area` float DEFAULT NULL,
  `num` varchar(4) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
