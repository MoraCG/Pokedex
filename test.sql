-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2024 a las 20:23:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

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
(1, 1, 'Bulbasaur', 'bulbasaur.png', 'Durante un tiempo después de nacer, vive de la luz que toma del sol y de los nutrientes que guarda en su bulbo, y depende de otros Pokémon para sobrevivir hasta que es lo suficientemente maduro.'),
(2, 2, 'Ivysaur', 'ivysaur.png', '	El bulbo de la espalda crece al absorber nutrientes. Cuando florece, emite un aroma delicioso.'),
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
(21, 21, 'Spearow', 'spearow.png', 'Spearow es un pájaro pequeño pero agresivo. Se le ve en grupos atacando a otros Pokémon para proteger su territorio.'),
(22, 22, 'Fearow', 'fearow.png', 'Fearow tiene un pico largo y afilado. Puede volar largas distancias y cazar presas desde el aire.'),
(23, 23, 'Ekans', 'ekans.png', 'Ekans es una serpiente que puede moverse sigilosamente y envolverse alrededor de sus enemigos para atraparlos.'),
(24, 24, 'Arbok', 'arbok.png', 'Arbok es una serpiente grande con un collar amenazante que usa para asustar a sus enemigos.'),
(25, 25, 'Pikachu', 'pikachu.png', 'Pikachu es un ratón eléctrico que puede acumular energía en sus mejillas y liberar poderosos rayos.'),
(26, 26, 'Raichu', 'raichu.png', 'Raichu es la forma evolucionada de Pikachu y puede almacenar grandes cantidades de electricidad en su cola.'),
(27, 27, 'Sandshrew', 'sandshrew.png', 'Sandshrew tiene un caparazón resistente y puede rodar para esquivar ataques.'),
(28, 28, 'Sandslash', 'sandslash.png', 'Sandslash tiene garras afiladas que usa para excavar y defenderse de los depredadores.'),
(29, 29, 'Nidoran♀', 'nidoranf.png', 'Nidoran♀ tiene orejas puntiagudas y un cuerno venenoso que usa para protegerse.'),
(30, 30, 'Nidorina', 'nidorina.png', 'Nidorina es la forma evolucionada de Nidoran♀. Es protectora y suele estar en grupos familiares.'),
(31, 31, 'Nidoqueen', 'nidoqueen.png', 'Nidoqueen es poderosa y usa su cuerpo robusto para proteger a sus crías y atacar a los enemigos.'),
(32, 32, 'Nidoran♂', 'nidoranm.png', 'Nidoran♂ tiene un cuerno venenoso en su frente que usa para atacar y defenderse.'),
(33, 33, 'Nidorino', 'nidorino.png', 'Nidorino es la forma evolucionada de Nidoran♂. Es agresivo y ataca con su cuerno afilado.'),
(34, 34, 'Nidoking', 'nidoking.png', 'Nidoking es un Pokémon grande y fuerte que usa su cola y cuerno para atacar a sus enemigos.'),
(35, 35, 'Clefairy', 'clefairy.png', 'Clefairy es un Pokémon de tipo hada que usa movimientos mágicos para confundir a sus enemigos.'),
(36, 36, 'Clefable', 'clefable.png', 'Clefable es la forma evolucionada de Clefairy. Puede usar habilidades mágicas y es conocido por su gracia.'),
(37, 37, 'Vulpix', 'vulpix.png', 'Vulpix es un zorro de fuego con varias colas que puede usar para controlar el fuego y asustar a sus enemigos.'),
(38, 38, 'Ninetales', 'ninetales.png', 'Ninetales es un zorro místico con nueve colas. Se dice que puede vivir cientos de años y tiene habilidades mágicas.'),
(39, 39, 'Jigglypuff', 'jigglypuff.png', 'Jigglypuff es un Pokémon tipo hada que puede cantar canciones de cuna para dormir a sus enemigos.'),
(40, 40, 'Wigglytuff', 'wigglytuff.png', 'Wigglytuff es la forma evolucionada de Jigglypuff. Tiene un cuerpo elástico y puede inflarse para rebotar los ataques.'),
(41, 41, 'Zubat', 'zubat.png', 'Zubat es un murciélago que puede usar ondas sónicas para navegar en la oscuridad y cazar a sus presas.'),
(42, 42, 'Golbat', 'golbat.png', 'Golbat es la forma evolucionada de Zubat. Tiene alas grandes y puede succionar la sangre de sus enemigos.'),
(43, 43, 'Oddish', 'oddish.png', 'Oddish es una planta Pokémon que puede moverse de noche para evitar la luz del sol.'),
(44, 44, 'Gloom', 'gloom.png', 'Gloom es la forma evolucionada de Oddish. Tiene una flor que puede emitir un fuerte olor para alejar a sus enemigos.'),
(45, 45, 'Vileplume', 'vileplume.png', 'Vileplume es la forma final de Oddish. Su flor es grande y puede liberar polen tóxico para protegerse.'),
(46, 46, 'Paras', 'paras.png', 'Paras es un Pokémon con hongos en su espalda que puede liberar esporas para controlar a otros Pokémon.'),
(47, 47, 'Parasect', 'parasect.png', 'Parasect es la forma evolucionada de Paras. Su cuerpo está controlado por el hongo y puede liberar esporas para atacar.'),
(48, 48, 'Venonat', 'venonat.png', 'Venonat es un Pokémon tipo insecto con ojos grandes que le permiten ver incluso en la oscuridad.'),
(49, 49, 'Venomoth', 'venomoth.png', 'Venomoth es la forma evolucionada de Venonat. Tiene alas grandes y puede liberar polen venenoso para atacar.'),
(50, 50, 'Diglett', 'diglett.png', 'Diglett es un Pokémon que vive bajo tierra y solo asoma la cabeza. Puede excavar túneles rápidamente.'),
(51, 51, 'Dugtrio', 'dugtrio.png', 'Dugtrio es la forma evolucionada de Diglett. Tiene tres cabezas y puede excavar a altas velocidades.'),
(52, 52, 'Meowth', 'meowth.png', 'Meowth es un gato Pokémon que puede caminar sobre dos patas y usar monedas como arma.'),
(53, 53, 'Persian', 'persian.png', 'Persian es la forma evolucionada de Meowth. Es elegante y usa sus garras afiladas para cazar.'),
(54, 54, 'Psyduck', 'psyduck.png', 'Psyduck es un pato Pokémon que sufre de dolores de cabeza. Puede usar habilidades psíquicas cuando está estresado.'),
(55, 55, 'Golduck', 'golduck.png', 'Golduck es la forma evolucionada de Psyduck. Es un excelente nadador y puede usar habilidades psíquicas en combate.'),
(56, 56, 'Mankey', 'mankey.png', 'Mankey es un mono Pokémon con un temperamento volátil. Ataca cuando se siente irritado o amenazado.'),
(57, 57, 'Primeape', 'primeape.png', 'Primeape es la forma evolucionada de Mankey. Es extremadamente agresivo y no se calma fácilmente.'),
(58, 58, 'Growlithe', 'growlithe.png', 'Growlithe es un perro Pokémon de tipo fuego. Es leal y protegerá a su entrenador a toda costa.'),
(59, 59, 'Arcanine', 'arcanine.png', 'Arcanine es la forma evolucionada de Growlithe. Es grande y puede correr a grandes velocidades, generando llamas con su movimiento.'),
(60, 60, 'Poliwag', 'poliwag.png', 'Poliwag es un Pokémon acuático con una espiral en su vientre que usa para hipnotizar a sus enemigos.'),
(61, 61, 'Poliwhirl', 'poliwhirl.png', 'Poliwhirl es la forma evolucionada de Poliwag. Puede usar sus puños para pelear y tiene habilidades acuáticas.'),
(62, 62, 'Poliwrath', 'poliwrath.png', 'Poliwrath es la forma evolucionada de Poliwhirl. Es fuerte y puede usar movimientos de lucha en combate.'),
(63, 63, 'Abra', 'abra.png', 'Abra es un Pokémon psíquico que duerme la mayor parte del tiempo. Puede teletransportarse para escapar del peligro.'),
(64, 64, 'Kadabra', 'kadabra.png', 'Kadabra es la forma evolucionada de Abra. Puede usar habilidades psíquicas poderosas para atacar a sus enemigos.'),
(65, 65, 'Alakazam', 'alakazam.png', 'Alakazam es la forma final de Abra. Es extremadamente inteligente y puede usar habilidades psíquicas avanzadas.'),
(66, 66, 'Machop', 'machop.png', 'Machop es un Pokémon tipo lucha. Es fuerte y puede levantar objetos que superan su propio peso.'),
(67, 67, 'Machoke', 'machoke.png', 'Machoke es la forma evolucionada de Machop. Es musculoso y puede usar movimientos de lucha con gran habilidad.'),
(68, 68, 'Machamp', 'machamp.png', 'Machamp es la forma evolucionada de Machoke. Tiene cuatro brazos y puede atacar con movimientos poderosos.'),
(69, 69, 'Bellsprout', 'bellsprout.png', 'Bellsprout es un Pokémon planta. Tiene un tallo delgado pero flexible que puede usar para atrapar a sus enemigos.'),
(70, 70, 'Weepinbell', 'weepinbell.png', 'Weepinbell es la forma evolucionada de Bellsprout. Puede usar su boca grande para atrapar a sus enemigos.'),
(71, 71, 'Victreebel', 'victreebel.png', 'Victreebel es la forma final de Bellsprout. Es carnívoro y puede usar sus hojas para atrapar a sus enemigos.'),
(72, 72, 'Tentacool', 'tentacool.png', 'Tentacool es un Pokémon acuático con tentáculos que puede usar para atacar y envenenar a sus enemigos.'),
(73, 73, 'Tentacruel', 'tentacruel.png', 'Tentacruel es la forma evolucionada de Tentacool. Tiene tentáculos largos y puede liberar toxinas para atacar.'),
(74, 74, 'Geodude', 'geodude.png', 'Geodude es un Pokémon roca que parece una piedra con brazos. Puede usar su cuerpo duro para resistir ataques.'),
(75, 75, 'Graveler', 'graveler.png', 'Graveler es la forma evolucionada de Geodude. Es más grande y puede rodar para moverse a alta velocidad.'),
(76, 76, 'Golem', 'golem.png', 'Golem es la forma final de Geodude. Tiene un caparazón duro y puede usar movimientos de tipo tierra.'),
(77, 77, 'Ponyta', 'ponyta.png', 'Ponyta es un Pokémon tipo fuego con una crin de llamas. Puede correr a alta velocidad y dejar un rastro de fuego.'),
(78, 78, 'Rapidash', 'rapidash.png', 'Rapidash es la forma evolucionada de Ponyta. Puede alcanzar velocidades extremas y sus llamas son intensas.'),
(79, 79, 'Slowpoke', 'slowpoke.png', 'Slowpoke es un Pokémon acuático y psíquico que se mueve lentamente. Puede usar su cola para pescar.'),
(80, 80, 'Slowbro', 'slowbro.png', 'Slowbro es la forma evolucionada de Slowpoke. Tiene un Shellder en su cola que le da habilidades adicionales.'),
(81, 81, 'Magnemite', 'magnemite.png', 'Magnemite es un Pokémon metálico que puede usar campos magnéticos para levitar y atacar con electricidad.'),
(82, 82, 'Magneton', 'magneton.png', 'Magneton es la forma evolucionada de Magnemite. Consiste en tres Magnemites unidos y puede generar fuertes campos eléctricos.'),
(83, 83, 'Farfetch d', 'farfetchd.png', 'Farfetch d es un Pokémon pájaro que usa un puerro como arma. Es raro y se le ve pocas veces en la naturaleza.'),
(84, 84, 'Doduo', 'doduo.png', 'Doduo es un Pokémon pájaro con dos cabezas. Puede correr rápido a pesar de no poder volar.'),
(85, 85, 'Dodrio', 'dodrio.png', 'Dodrio es la forma evolucionada de Doduo. Tiene tres cabezas y puede atacar desde diferentes ángulos.'),
(86, 86, 'Seel', 'seel.png', 'Seel es un Pokémon acuático que puede nadar y sumergirse por largos períodos de tiempo.'),
(87, 87, 'Dewgong', 'dewgong.png', 'Dewgong es la forma evolucionada de Seel. Es más grande y puede nadar en aguas frías y heladas.'),
(88, 88, 'Grimer', 'grimer.png', 'Grimer es un Pokémon de lodo tóxico. Puede contaminar su entorno y dejar rastros de suciedad.'),
(89, 89, 'Muk', 'muk.png', 'Muk es la forma evolucionada de Grimer. Es más grande y puede emitir un olor muy desagradable para disuadir a sus enemigos.'),
(90, 90, 'Shellder', 'shellder.png', 'Shellder es un Pokémon acuático con un caparazón duro. Puede usar su concha para protegerse de ataques.'),
(91, 91, 'Cloyster', 'cloyster.png', 'Cloyster es la forma evolucionada de Shellder. Tiene un caparazón muy duro y puede atacar con picos de hielo.'),
(92, 92, 'Gastly', 'gastly.png', 'Gastly es un Pokémon fantasma que parece una nube de gas. Puede atravesar objetos y asustar a sus enemigos.'),
(93, 93, 'Haunter', 'haunter.png', 'Haunter es la forma evolucionada de Gastly. Tiene manos flotantes y puede usar movimientos fantasmales para atacar.'),
(94, 94, 'Gengar', 'gengar.png', 'Gengar es la forma final de Gastly. Puede volverse invisible y atacar desde las sombras.'),
(95, 95, 'Onix', 'onix.png', 'Onix es un Pokémon roca y tierra que parece una gran serpiente de piedras. Puede excavar túneles y resistir ataques fuertes.'),
(96, 96, 'Drowzee', 'drowzee.png', 'Drowzee es un Pokémon psíquico que puede hipnotizar a sus enemigos y hacerlos dormir.'),
(97, 97, 'Hypno', 'hypno.png', 'Hypno es la forma evolucionada de Drowzee. Tiene un péndulo que usa para hipnotizar a sus enemigos.'),
(98, 98, 'Krabby', 'krabby.png', 'Krabby es un Pokémon cangrejo con grandes pinzas. Puede usar sus pinzas para defenderse y atacar.'),
(99, 99, 'Kingler', 'kingler.png', 'Kingler es la forma evolucionada de Krabby. Tiene una gran pinza que puede usar para aplastar a sus enemigos.'),
(100, 100, 'Voltorb', 'voltorb.png', 'Voltorb es una forma de vida accidental, proveniente de fábricas de pokébolas. Puede autodestruirse al sentirse amenazado.'),
(101, 101, 'Electrode', 'electrode.png', 'Electrode es la forma evolucionada de Voltorb. Es aún más grande y puede generar una gran cantidad de electricidad para atacar.'),
(102, 102, 'Exeggcute', 'exeggcute.png', 'Exeggcute es un grupo de seis huevos que se comunican telepáticamente. Puede usar movimientos psíquicos para protegerse.'),
(103, 103, 'Exeggutor', 'exeggutor.png', 'Exeggutor es la forma evolucionada de Exeggcute. Tiene tres cabezas y puede usar habilidades psíquicas y de planta.'),
(104, 104, 'Cubone', 'cubone.png', 'Cubone es un Pokémon que lleva un hueso en su cabeza. Usa el hueso para atacar y protegerse.'),
(105, 105, 'Marowak', 'marowak.png', 'Marowak es la forma evolucionada de Cubone. Usa un hueso grande para luchar y es conocido por ser un guerrero fuerte.'),
(106, 106, 'Hitmonlee', 'hitmonlee.png', 'Hitmonlee es un Pokémon tipo lucha que puede extender sus piernas para patear a grandes distancias.'),
(107, 107, 'Hitmonchan', 'hitmonchan.png', 'Hitmonchan es un Pokémon tipo lucha que usa sus puños para lanzar golpes rápidos. Puede aprender diferentes movimientos de boxeo.'),
(108, 108, 'Lickitung', 'lickitung.png', 'Lickitung es un Pokémon que tiene una lengua muy larga. Puede usarla para atacar y limpiar su entorno.'),
(109, 109, 'Koffing', 'koffing.png', 'Koffing es un Pokémon que emite gases venenosos. Puede usar estos gases para atacar y protegerse.'),
(110, 110, 'Weezing', 'weezing.png', 'Weezing es la forma evolucionada de Koffing. Tiene dos cabezas y puede liberar gases tóxicos para atacar a sus enemigos.'),
(111, 111, 'Rhyhorn', 'rhyhorn.png', 'Rhyhorn es un Pokémon roca y tierra. Tiene un cuerpo robusto y puede embestir a sus enemigos con gran fuerza.'),
(112, 112, 'Rhydon', 'rhydon.png', 'Rhydon es la forma evolucionada de Rhyhorn. Tiene un cuerno grande y puede usar habilidades de roca y tierra para atacar.'),
(113, 113, 'Chansey', 'chansey.png', 'Chansey es un Pokémon que lleva un huevo en su vientre. Es muy amigable y conocido por su habilidad para curar a otros Pokémon.'),
(114, 114, 'Tangela', 'tangela.png', 'Tangela es un Pokémon planta cubierto de enredaderas. Puede usar sus enredaderas para atrapar a sus enemigos y defenderse.'),
(115, 115, 'Kangaskhan', 'kangaskhan.png', 'Kangaskhan es un Pokémon grande que lleva a su cría en una bolsa. Es muy protector y atacará a cualquiera que amenace a su cría.'),
(116, 116, 'Horsea', 'horsea.png', 'Horsea es un Pokémon acuático que puede disparar chorros de agua con precisión. Puede nadar rápidamente para escapar del peligro.'),
(117, 117, 'Seadra', 'seadra.png', 'Seadra es la forma evolucionada de Horsea. Puede liberar tinta para confundirse y escapar de sus enemigos.'),
(118, 118, 'Goldeen', 'goldeen.png', 'Goldeen es un Pokémon pez con un cuerno afilado. Puede nadar con gracia y usar su cuerno para defenderse.'),
(119, 119, 'Seaking', 'seaking.png', 'Seaking es la forma evolucionada de Goldeen. Es más grande y puede usar movimientos acuáticos para atacar.'),
(120, 120, 'Staryu', 'staryu.png', 'Staryu es un Pokémon estrella de mar que puede regenerar sus extremidades. Puede emitir luz para comunicarse con otros Pokémon.'),
(121, 121, 'Starmie', 'starmie.png', 'Starmie es la forma evolucionada de Staryu. Tiene un núcleo que brilla y puede usar habilidades psíquicas para atacar.'),
(122, 122, 'Mr. Mime', 'mrmime.png', 'Mr. Mime es un Pokémon psíquico que puede crear barreras invisibles. Puede usar sus habilidades para confundir a sus enemigos.'),
(123, 123, 'Scyther', 'scyther.png', 'Scyther es un Pokémon tipo insecto con cuchillas afiladas en sus brazos. Puede moverse rápidamente y usar sus cuchillas para atacar.'),
(124, 124, 'Jynx', 'jynx.png', 'Jynx es un Pokémon psíquico y hielo que puede usar sus habilidades para congelar a sus enemigos. También puede cantar para confundir a otros Pokémon.'),
(125, 125, 'Electabuzz', 'electabuzz.png', 'Electabuzz es un Pokémon eléctrico que puede generar electricidad con su cuerpo. Puede usar esta electricidad para atacar y defenderse.'),
(126, 126, 'Magmar', 'magmar.png', 'Magmar es un Pokémon tipo fuego que parece una llama viviente. Puede usar fuego para atacar y generar calor intenso.'),
(127, 127, 'Pinsir', 'pinsir.png', 'Pinsir es un Pokémon tipo insecto con grandes pinzas en su cabeza. Puede usarlas para atrapar y aplastar a sus enemigos.'),
(128, 128, 'Tauros', 'tauros.png', 'Tauros es un Pokémon tipo normal con tres colas. Es muy agresivo y puede embestir con gran fuerza.'),
(129, 129, 'Magikarp', 'magikarp.png', 'Magikarp es un Pokémon pez que no es muy poderoso. Puede saltar y chapotear, pero no es bueno para luchar.'),
(130, 130, 'Gyarados', 'gyarados.png', 'Gyarados es la forma evolucionada de Magikarp. Es un Pokémon de gran tamaño y puede usar movimientos poderosos para atacar.'),
(131, 131, 'Lapras', 'lapras.png', 'Lapras es un Pokémon acuático grande y amigable. Puede transportar personas en su espalda y usar habilidades acuáticas para luchar.'),
(132, 132, 'Ditto', 'ditto.png', 'Ditto es un Pokémon que puede transformarse en otros Pokémon. Puede imitar sus habilidades y movimientos.'),
(133, 133, 'Eevee', 'eevee.png', 'Eevee es un Pokémon con múltiples posibilidades de evolución. Puede evolucionar en diferentes formas dependiendo de ciertos factores.'),
(134, 134, 'Vaporeon', 'vaporeon.png', 'Vaporeon es la forma evolucionada de Eevee cuando se usa una Piedra Agua. Puede usar habilidades acuáticas y nadar rápidamente.'),
(135, 135, 'Jolteon', 'jolteon.png', 'Jolteon es la forma evolucionada de Eevee cuando se usa una Piedra Trueno. Puede usar electricidad para atacar y moverse rápidamente.'),
(136, 136, 'Flareon', 'flareon.png', 'Flareon es la forma evolucionada de Eevee cuando se usa una Piedra Fuego. Puede usar habilidades de fuego para atacar y defenderse.'),
(137, 137, 'Porygon', 'porygon.png', 'Porygon es un Pokémon digital creado por el hombre. Puede moverse a través de sistemas informáticos y cambiar de forma.'),
(138, 138, 'Omanyte', 'omanyte.png', 'Omanyte es un Pokémon fósil que proviene de la era prehistórica. Tiene un caparazón duro y puede usar habilidades acuáticas para defenderse.'),
(139, 139, 'Omastar', 'omastar.png', 'Omastar es la forma evolucionada de Omanyte. Tiene tentáculos que puede usar para atrapar a sus enemigos y un caparazón duro para protegerse.'),
(140, 140, 'Kabuto', 'kabuto.png', 'Kabuto es un Pokémon fósil con un caparazón duro. Puede moverse rápidamente bajo el agua y tiene garras para defenderse.'),
(141, 141, 'Kabutops', 'kabutops.png', 'Kabutops es la forma evolucionada de Kabuto. Tiene brazos afilados y puede moverse rápidamente en el agua.'),
(142, 142, 'Aerodactyl', 'aerodactyl.png', 'Aerodactyl es un Pokémon fósil con alas. Puede volar a altas velocidades y tiene dientes afilados para atacar.'),
(143, 143, 'Snorlax', 'snorlax.png', 'Snorlax es un Pokémon grande y perezoso. Duerme la mayor parte del tiempo, pero cuando se despierta, es muy fuerte y puede usar movimientos poderosos.'),
(144, 144, 'Articuno', 'articuno.png', 'Articuno es un Pokémon legendario de hielo y volador. Puede crear tormentas de nieve y usar habilidades de hielo para luchar.'),
(145, 145, 'Zapdos', 'zapdos.png', 'Zapdos es un Pokémon legendario eléctrico y volador. Puede generar rayos y usar habilidades eléctricas para atacar.'),
(146, 146, 'Moltres', 'moltres.png', 'Moltres es un Pokémon legendario de fuego y volador. Puede generar llamas y usar habilidades de fuego para atacar y defenderse.'),
(147, 147, 'Dratini', 'dratini.png', 'Dratini es un Pokémon dragón. Puede vivir bajo el agua y usa habilidades de dragón para defenderse.'),
(148, 148, 'Dragonair', 'dragonair.png', 'Dragonair es la forma evolucionada de Dratini. Puede usar habilidades de dragón y controlar el clima.'),
(149, 149, 'Dragonite', 'dragonite.png', 'Dragonite es la forma final de Dratini. Puede volar y usar habilidades de dragón poderosas para luchar y proteger.'),
(150, 150, 'Mewtwo', 'mewtwo.png', 'Mewtwo es un Pokémon legendario psíquico. Fue creado por el hombre y tiene habilidades psíquicas extremadamente poderosas y peligrosas.'),
(151, 151, 'Mew', 'mew.png', 'Mew es un Pokémon legendario psíquico. Es raro y puede aprender cualquier habilidad de otros Pokémon. Solo se le aparece a personas con enorme deseo de verlo. Se dice ser el ancestro de todos los Pokémon.');

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
(21, 4),
(21, 7),
(22, 4),
(22, 7),
(23, 2),
(24, 2),
(25, 9),
(26, 9),
(27, 8),
(28, 8),
(29, 2),
(30, 2),
(31, 2),
(31, 8),
(32, 2),
(33, 2),
(34, 2),
(34, 8),
(35, 11),
(36, 11),
(37, 3),
(38, 3),
(39, 7),
(39, 11),
(40, 7),
(40, 11),
(41, 2),
(41, 4),
(42, 2),
(42, 4),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 2),
(46, 6),
(47, 2),
(47, 6),
(48, 2),
(48, 6),
(49, 2),
(49, 6),
(50, 8),
(51, 8),
(52, 7),
(53, 7),
(54, 5),
(55, 5),
(56, 10),
(57, 10),
(58, 3),
(59, 3),
(60, 5),
(61, 5),
(62, 5),
(62, 10),
(63, 13),
(64, 13),
(65, 13),
(66, 10),
(67, 10),
(68, 10),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 2),
(72, 5),
(73, 2),
(73, 5),
(74, 8),
(74, 14),
(75, 8),
(75, 14),
(76, 8),
(76, 14),
(77, 3),
(78, 3),
(79, 5),
(79, 13),
(80, 5),
(80, 13),
(81, 9),
(82, 9),
(83, 4),
(83, 7),
(84, 4),
(84, 7),
(85, 4),
(85, 7),
(86, 5),
(87, 5),
(87, 12),
(88, 2),
(89, 2),
(90, 5),
(91, 5),
(91, 12),
(92, 2),
(92, 15),
(93, 2),
(93, 15),
(94, 2),
(94, 15),
(95, 8),
(95, 14),
(96, 13),
(97, 13),
(98, 5),
(98, 8),
(99, 5),
(99, 8),
(100, 9),
(101, 9),
(102, 1),
(102, 13),
(103, 1),
(103, 13),
(104, 8),
(105, 8),
(106, 10),
(107, 10),
(108, 7),
(109, 2),
(110, 2),
(111, 8),
(111, 14),
(112, 8),
(112, 14),
(113, 11),
(114, 1),
(115, 7),
(116, 5),
(117, 5),
(118, 5),
(119, 5),
(120, 5),
(121, 5),
(121, 13),
(122, 13),
(123, 4),
(123, 6),
(124, 12),
(124, 13),
(125, 9),
(126, 3),
(127, 6),
(128, 7),
(129, 5),
(130, 4),
(130, 5),
(131, 5),
(131, 12),
(132, 7),
(133, 7),
(134, 5),
(135, 9),
(136, 3),
(137, 7),
(138, 5),
(138, 14),
(139, 5),
(139, 14),
(140, 5),
(140, 14),
(141, 5),
(141, 14),
(142, 4),
(142, 14),
(143, 7),
(144, 4),
(144, 12),
(145, 4),
(145, 9),
(146, 3),
(146, 4),
(147, 17),
(148, 17),
(149, 4),
(149, 17),
(150, 13),
(151, 13);

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
(16, 'Acero'),
(5, 'Agua'),
(6, 'Bicho'),
(17, 'Dragón'),
(9, 'Eléctrico'),
(15, 'Fantasma'),
(3, 'Fuego'),
(11, 'Hada'),
(12, 'Hielo'),
(10, 'Lucha'),
(7, 'Normal'),
(1, 'Planta'),
(13, 'Psíquico'),
(14, 'Roca'),
(8, 'Tierra'),
(2, 'Veneno'),
(4, 'Volador');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

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
