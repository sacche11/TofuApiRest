-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 05:43:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tofu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog`
--

CREATE TABLE `catalog` (
  `id_series_and_films` int(11) NOT NULL,
  `id_gender` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `type` varchar(60) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `synopsis` varchar(200) CHARACTER SET latin1 NOT NULL,
  `duration` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `release_year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalog`
--

INSERT INTO `catalog` (`id_series_and_films`, `id_gender`, `name`, `type`, `synopsis`, `duration`, `release_year`) VALUES
(33, 22, 'The Walking Dead', 'Serie', 'Tras un apocalipsis zombie, un grupo de supervivientes, dirigidos por el policía Rick Grimes, recorre los Estados Unidos para ponerse a salvo.', '11 Temps', '2010-07-14'),
(34, 26, 'Smile', 'Pelicula', 'Tras presenciar un extraño y traumático incidente con un paciente, la doctora Rose Cotter (Sosie Bacon) comienza a experimentar sucesos aterradores que no puede explicar.', '130 mins', '2022-05-07'),
(35, 19, 'Loki', 'Serie', 'Loki, el impredecible villano Loki (Hiddleston) regresa como el Dios del engaño en una nueva serie tras los acontecimientos de Avengers', '1 Temp', '2021-03-04'),
(36, 23, 'Vesper', 'Pelicula', 'Vesper, una niña de 13 años que lucha por sobrevivir con su padre paralizado, conoce a una misteriosa mujer con un secreto que obliga a Vesper a utilizar sus habilidades.', '125 mins', '2020-11-12'),
(37, 18, 'Los 100', 'Serie', ' La historia está centrada en lo que ocurre con la civilización casi cien años después de que una guerra nuclear la haya devastado.', '7 Temps', '2014-09-14'),
(38, 24, 'Burning Lies', 'Pelicula', 'Una mujer se enamora de un guapo bombero después de que él la rescata de un sospechoso accidente automovilístico. Pero nada es lo que parece.', '120 mins', '2021-05-25'),
(40, 20, 'Smile Part 2', 'Pelicula', 'Tras presenciar un extraño y traumático incidente con un paciente, la doctora Rose Cotter (Sosie Bacon) comienza a experimentar sucesos aterradores que no puede explicar.', '120 mins', '2022-10-10'),
(41, 21, 'Vesper Part 2', 'Pelicula', 'Vesper, una niña de 13 años que lucha por sobrevivir con su padre paralizado, conoce a una misteriosa mujer con un secreto que obliga a Vesper a utilizar sus habilidades.', '150 mins', '2022-10-05'),
(42, 22, 'Titanic', 'Pelicula', 'Tras un apocalipsis zombie, un grupo de supervivientes, dirigidos por el policía Rick Grimes, recorre los Estados Unidos para ponerse a salvo.', '130 mins', '2010-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gender`
--

CREATE TABLE `gender` (
  `id_gender` int(11) NOT NULL,
  `gender` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gender`
--

INSERT INTO `gender` (`id_gender`, `gender`) VALUES
(18, 'Misterio'),
(19, 'Aventura'),
(20, 'Ciencia Ficcion'),
(21, 'Thriller'),
(22, 'Romance'),
(23, 'Misterio'),
(24, 'Guerra'),
(25, 'Accion'),
(26, 'Policial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `email`, `password`) VALUES
(6, 'user123@ejemplo.com', '$2y$10$D57dOu70nqphJgySEet9fuFDP393hlIDcR5a1ooIfHvlOigzsDday');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id_series_and_films`),
  ADD KEY `catalog_fk` (`id_gender`);

--
-- Indices de la tabla `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id_series_and_films` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `gender`
--
ALTER TABLE `gender`
  MODIFY `id_gender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
