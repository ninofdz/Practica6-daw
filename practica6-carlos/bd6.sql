-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2017 a las 18:36:52
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd6`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_libros`
--

CREATE TABLE `td_libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `td_libros`
--

INSERT INTO `td_libros` (`id`, `titulo`, `autor`, `genero`, `precio`) VALUES
(22, 'don quijote de la mancha', 'Miguel de cervantes', 'ensayo', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_usuarios`
--

CREATE TABLE `td_usuarios` (
  `usuario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `td_usuarios`
--

INSERT INTO `td_usuarios` (`usuario`, `password`) VALUES
('cliente', 'cliente'),
('admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `td_libros`
--
ALTER TABLE `td_libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `td_libros`
--
ALTER TABLE `td_libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
