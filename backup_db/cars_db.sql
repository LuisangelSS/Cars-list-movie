-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2025 a las 04:08:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cars_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nivel` int(11) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `color`, `tipo`, `nivel`, `foto`) VALUES
(7, 'Rayo Mcqueen', 'Rojo', 'Chevrolet Corvette C6', 10, 0x6f675f636172735f6c696768746e696e676d63717565656e6461795f31383234345f34343335663237612e6a706567),
(8, 'Doc Hudson', 'Azul Oscuro', 'Hudson Hornet 1951', 9, 0x64626334363733633032643235383864356632663563646137633964636639322e6a7067),
(9, 'Sally Carrera', 'Azul Claro', 'Porsche 911', 6, 0x62653638613566326664613036633333346436366330633762366162643066392e6a7067),
(10, 'Mater', 'Marrón oxidado ', 'Camioneta Chevrolet 1951', 5, 0x39366335363439376430316436623135346433396137386166343233626539382e6a7067),
(11, 'Luigi', 'Amarillo', 'Fiat 500', 3, 0x61623232613934306566393535633830303162353538633535633631643563372e6a7067),
(12, 'Guido', 'Azul Claro', 'Montacargas', 7, 0x68713732302e6a7067),
(13, 'Sheriff', 'Negro y Blanco', 'Plymouth Fury 1950', 6, 0x65343163376565336235313563376461336365393663336334653130666464652e6a7067),
(14, 'King', 'Azul Claro', 'Plymouth Superbird amarillo de 1970', 8, 0x62343031323937333930653331343833636335643765393164623132383666612e6a7067),
(15, 'Chick Hicks', 'Verde', 'Shyster Cremlin de 1979', 7, 0x39326331653638323031373038363332356139303466383930666630386239372e6a7067);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
