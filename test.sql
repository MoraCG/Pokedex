-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2024 a las 16:03:13
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `password`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id`, `numero`, `nombre`, `imagen`, `descripcion`) VALUES
(1, 1, 'Bulbasaur', 'bulbasaur.png', 'Bulbasaur puede ser visto absorbiendo luz solar con la espalda. La semilla en su lomo madura para una flor.'),
(2, 2, 'Ivysaur', 'ivysaur.png', 'Ivysaur tiene el bulbo de una semilla en su espalda y un par de pequeñas hojas.'),
(3, 3, 'Venusaur', 'venusaur.png', 'Venusaur es la forma final de Bulbasaur. Tiene una gran flor en su espalda que emite un aroma fuerte.'),
(4, 4, 'Charmander', 'charmander.png', 'Charmander tiene una llama en la punta de su cola. La llama se enciende cuando se siente emocionado.'),
(5, 5, 'Charmeleon', 'charmeleon.png', 'Charmeleon tiene una naturaleza feroz y nunca retrocede ante un oponente más fuerte.'),
(6, 6, 'Charizard', 'charizard.png', 'Charizard vuela por el cielo y lanza llamas a sus oponentes desde arriba.'),
(7, 7, 'Squirtle', 'squirtle.png', 'Squirtle puede ocultarse en su caparazón y disparar agua con gran precisión.'),
(8, 8, 'Wartortle', 'wartortle.png', 'Wartortle puede nadar fácilmente en mares y ríos, moviendo su cola para impulsarse.'),
(9, 9, 'Blastoise', 'blastoise.png', 'Blastoise tiene cañones de agua en su caparazón que dispara con gran precisión.'),
(10, 10, 'Caterpie', 'caterpie.png', 'Caterpie tiene un apetito insaciable y puede devorar grandes cantidades de hojas en poco tiempo.'),
(11, 11, 'Metapod', 'metapod.png', 'Metapod se endurece como una roca cuando se siente amenazado, protegiéndose con su caparazón.'),
(12, 12, 'Butterfree', 'butterfree.png', 'Butterfree tiene antenas que emiten un olor dulce que puede hacer dormir a sus enemigos.'),
(13, 13, 'Weedle', 'weedle.png', 'Weedle tiene un aguijón venenoso en la parte superior de su cabeza que usa para defenderse.'),
(14, 14, 'Kakuna', 'kakuna.png', 'Kakuna permanece inmóvil mientras desarrolla su caparazón duro que lo protege de los ataques.'),
(15, 15, 'Beedrill', 'beedrill.png', 'Beedrill es muy agresivo y atacará a cualquier intruso que se acerque a su colmena.'),
(16, 16, 'Pidgey', 'pidgey.png', 'Pidgey tiene una vista aguda y puede encontrar comida fácilmente, incluso en áreas urbanas.'),
(17, 17, 'Pidgeotto', 'pidgeotto.png', 'Pidgeotto puede volar a grandes alturas y tiene garras afiladas para atrapar a su presa.'),
(18, 18, 'Pidgeot', 'pidgeot.png', 'Pidgeot tiene una gran envergadura y puede volar a grandes velocidades, superando fácilmente a sus presas.'),
(19, 19, 'Rattata', 'rattata.png', 'Rattata es nocturno y se mueve con sigilo para robar comida de los almacenes de las casas.'),
(20, 20, 'Raticate', 'raticate.png', 'Raticate tiene poderosos dientes que puede usar para morder y triturar incluso los objetos más duros.'),
(21, 21, 'Metapod', 'metapod.png', 'Metapod se endurece como una roca cuando se siente amenazado, protegiéndose con su caparazón.'),
(22, 22, 'Butterfree', 'butterfree.png', 'Butterfree tiene antenas que emiten un olor dulce que puede hacer dormir a sus enemigos.'),
(23, 23, 'Weedle', 'weedle.png', 'Weedle tiene un aguijón venenoso en la parte superior de su cabeza que usa para defenderse.'),
(24, 24, 'Kakuna', 'kakuna.png', 'Kakuna permanece inmóvil mientras desarrolla su caparazón duro que lo protege de los ataques.'),
(25, 25, 'Beedrill', 'beedrill.png', 'Beedrill es muy agresivo y atacará a cualquier intruso que se acerque a su colmena.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon_tipo`
--

CREATE TABLE `pokemon_tipo` (
  `pokemon_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon_tipo`
--

INSERT INTO `pokemon_tipo` (`pokemon_id`, `tipo_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 3),
(5, 3),
(6, 3),
(6, 4),
(7, 5),
(8, 5),
(9, 5),
(10, 6),
(11, 6),
(12, 4),
(12, 6),
(13, 2),
(13, 6),
(14, 2),
(14, 6),
(15, 2),
(15, 6),
(16, 4),
(16, 7),
(17, 4),
(17, 7),
(18, 4),
(18, 7),
(19, 7),
(20, 7),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 2),
(25, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(16, 'acero'),
(5, 'agua'),
(6, 'bicho'),
(17, 'dragón'),
(9, 'eléctrico'),
(15, 'fantasma'),
(3, 'fuego'),
(11, 'hada'),
(12, 'hielo'),
(10, 'lucha'),
(7, 'normal'),
(1, 'planta'),
(13, 'psíquico'),
(14, 'roca'),
(8, 'tierra'),
(2, 'veneno'),
(4, 'volador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pokemon_tipo`
--
ALTER TABLE `pokemon_tipo`
  ADD PRIMARY KEY (`pokemon_id`,`tipo_id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pokemon_tipo`
--
ALTER TABLE `pokemon_tipo`
  ADD CONSTRAINT `pokemon_tipo_ibfk_1` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`id`),
  ADD CONSTRAINT `pokemon_tipo_ibfk_2` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
