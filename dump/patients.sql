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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
