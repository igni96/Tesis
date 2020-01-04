-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2018 a las 03:24:55
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lambda`
--
CREATE DATABASE IF NOT EXISTS `lambda` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `lambda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `idusuario`) VALUES
(2, 2),
(3, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_juego`
--

DROP TABLE IF EXISTS `carrito_juego`;
CREATE TABLE IF NOT EXISTS `carrito_juego` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcarrito` int(11) NOT NULL,
  `idjuego` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcarrito` (`idcarrito`),
  KEY `idjuego` (`idjuego`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carrito_juego`
--

INSERT INTO `carrito_juego` (`id`, `idcarrito`, `idjuego`, `cantidad`) VALUES
(1, 2, 2, 6),
(6, 3, 6, 1),
(7, 4, 2, 1),
(8, 4, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `plataforma1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `plataforma2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `plataforma3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `imagen` text COLLATE utf8_unicode_ci NOT NULL,
  `trailer` text COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desarrollador` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `titulo`, `genero`, `plataforma1`, `plataforma2`, `plataforma3`, `precio`, `descripcion`, `imagen`, `trailer`, `categoria`, `desarrollador`) VALUES
(1, 'Playerunknown’s Battlegrounds', 'Acción', 'Xbox', 'Steam', '0', 60, 'PLAYERUNKNOWN’S BATTLEGROUNDS es un shooter basado en el modo Battle Royale que está siendo desarrollado a través de la retroalimentación con la comunidad. Comenzando de la nada, los usuarios tienen que luchar uno contra el otro para localizar armas y suministros para ser el único sobreviviente. Este juego realista de alta tensión se establece en una isla masiva de 8x8 km con un nivel de detalle que muestra las capacidades de Unreal Engine 4. \r\n\r\nComo creador del modo de juego Battle Royale de las series ARMA y H1Z1: King of the Kill, Greene está desarrollando el juego conjuntamente con un equipo veterano de la empresa Bluehole para crear la más diversa y robusta experiencia de Battle Royale hasta la fecha. \r\n\r\nDatos:\r\nGenero: Acción.\r\nFecha de lanzamiento: 7 Jul 2015.\r\nDesarrollador: Bluehole, inc.', 'img/playerunknowns-battlegrounds.jpg', 'https://www.youtube.com/embed/m0Tnp-3W3z4', 'Más vendidos', 'Bluehole'),
(2, 'FIFA 18', 'Deportes', 'Playstation', 'Xbox', 'Nintendo', 62.9, 'Se trata de la nueva entrega anual de esta exitosa y aclamada saga de simuladores de fútbol de Electronic Arts. Para la ocasión ofrecerá una jugabilidad más pulida y gráficos mejorados, y entre sus principales características destaca el regreso del modo The Journey, un Modo Historia que debutó por primera vez en FIFA 17 en el que teníamos que seguir la vida del joven futbolista Alex Hunter para conseguir que se abriera paso en la Premier League y convertirlo en una leyenda de este deporte.\r\n\r\nFIFA 18, aunque solo para las plataformas de nueva generación, vuelve a contar con el galardonado motor gráfico Frostbite 3.0, esta vez acompañado de lo que han llamado tecnología de movimiento de jugadores reales, una gran novedad nunca antes empleada en la saga con la que mediante captura de movimientos se ha conseguido dar al juego una fluidez y naturalidad de movimientos como la de los jugadores reales.', 'img/fifa18.jpg', 'https://www.youtube.com/embed/pjR51wO7vII', 'Novedades', 'EA'),
(3, 'Call of Duty: WWII', 'Acción', 'Xbox', 'Playstation', 'Steam', 70, 'Call of Duty regresa a sus raíces con Call of Duty: WWII, una experiencia sobrecogedora que redefine la Segunda Guerra Mundial para toda una nueva generación de jugadores. Desembarca en Normandía el Día D y combate por toda Europa en algunos de los escenarios más emblemáticos de la guerra más cruenta de la historia. Vive el combate clásico de Call of Duty, los lazos de camaradería y la naturaleza imperdonable de la guerra contra una potencia global que sume al mundo en la tiranía.\r\n\r\nCall of Duty: WWII acerca la experiencia definitiva de la Segunda Guerra Mundial a la nueva generación con tres modos de juego diferentes: campaña, multijugador y cooperativo. La campaña y sus espectaculares gráficos trasladan a los jugadores al teatro europeo para sumergirse en una nueva historia de Call of Duty ambientada en las icónicas batallas de la Segunda Guerra Mundial. El multijugador supone una vuelta al juego terrestre clásico de Call of Duty. ', 'img/callofdutyww2.png', 'https://www.youtube.com/embed/D4Q_XYVescc', 'Novedades', 'Activision'),
(4, 'Battlefield 1', 'Acción', 'Playstation', 'Xbox', 'Origen', 60, 'Battlefield™ 1 takes you back to The Great War, WW1, where new technology and worldwide conflict changed the face of warfare forever. Take part in every battle, control every massive vehicle, and execute every maneuver that turns an entire fight around. The whole world is at war – see what’s beyond the trenches.', 'img/battlefield.jpg', 'https://www.youtube.com/embed/c7nRTF2SowQ', 'Más vendidos', 'Electronic Arts'),
(5, 'PES 2018', 'Deportes', 'Playstation', 'Xbox', 'Steam', 30, 'Novedades de PES 2018:\r\n• Juego magistral: con regates estratégicos, Toque Realista y jugadas a balón parado, la experiencia de juego alcanza un nuevo nivel\r\n• Presentación mejorada: nuevos menús e imágenes reales\r\n• Integración de PES League: compite en PES League con nuevos modos incluyendo myClub\r\n• Cooperativo online: Se ha añadido un nuevo modo cooperativo\r\n•Selección de partido al azar: este modo regresa con una nueva presentación y más funciones\r\n• Liga Master mejorada: vive como un entrenador con torneos de pretemporada, transferencias mejoradas, nueva presentación y funciones \r\n• Fox Engine mejorado: nueva iluminación, modelos de jugadores perfeccionados y animaciones, expresiones faciales a movimientos del cuerpo para que el juego cobre vida.', 'img/pes2018.jpg', 'https://www.youtube.com/embed/jGgNxN0rQYw', 'Novedades', 'Konami'),
(6, 'Assassin\'s creed origins', 'Aventura', 'Steam', 'Playstation', 'Xbox', 50, 'ASSASSIN’S CREED® ORIGINS ES UN NUEVO COMIENZO\r\n\r\nEl esplendor y la intriga del antiguo Egipto se desdibujan en una cruenta lucha por el poder. Desvela secretos y mitos ya olvidados en un momento crucial: el origen de la Hermandad de los Assassins\r\n\r\nUN PAÍS POR DESCUBRIR\r\nNavega por el Nilo, explora una tierra vasta e impredecible y descubre los misterios de las pirámides mientras sobrevives a peligrosas facciones y bestias salvajes.\r\n\r\nUNA NUEVA HISTORIA EN CADA PARTIDA\r\nParticipa en las misiones y embárcate en apasionantes historias en las que tu camino se cruzará con personajes carismáticos, desde nobles acaudalados hasta miserables marginados.\r\n\r\nSORPRÉNDETE\r\nVive la acción desde una luz completamente distinta Tobii Eye Tracking (sistema de seguimiento visual). La función de vision extendida te ofrece una perspectiva más amplia, la iluminación dinámica y los efectos de luz solar te sumergen en las arenosas dunas dependiendo de cuál sea tu objetivo. Etiquetar, apuntar y bloquear a tus objetivos será mucho más natural cuando lo hagas con tan solo mirarlos. Deja que tus ojos guien el camino y mejoren tu jugabilidad. ', 'img/assassinscreed.jpg', 'https://www.youtube.com/embed/2DnxjpdJi5E', 'Novedades', 'Ubisoft'),
(7, 'Overwatch', 'Estrategia', 'Blizzard', 'Playstation', 'Xbox', 60, 'LUCHA POR EL FUTURO\r\nSoldados. Científicos. Aventureros. Prodigios. \r\n\r\nEn una época de crisis global, un grupo de héroes formó un escuadrón internacional en aras de devolver la paz a un mundo devastado por la guerra. Este grupo se autodenominó OVERWATCH. \r\n\r\nOverwatch puso fin a la crisis y mantuvo la paz durante las décadas posteriores, dando pie a toda una era de exploración, innovación y descubrimiento.\r\n\r\nAhora, con el mundo sumiéndose en el caos una vez más, héroes de antaño y de ahora acuden a la llamada. ¿Te apuntas?', 'img/overwatch.jpg', 'https://www.youtube.com/embed/Xq9X-Q-b4hY', 'Más vendidos', 'Blizzard'),
(8, 'Dark Souls 2', 'Aventura', 'Steam', 'Playstation', 'Xbox', 40, '¡Consigue ahora mismo el Season Pass de DARK SOULS™ III y ponte a prueba con todo el contenido disponible!\r\n\r\n\"Mejor juego de rol\" de la Gamescom 2015 y más de 35 premios y nominaciones en la E3 2015.\r\n\r\nDARK SOULS™ III continúa redefiniendo los límites con el nuevo y ambicioso capítulo de esta serie revolucionaria, tan aclamada por la crítica.\r\n\r\nAdéntrate en un universo lleno de enemigos y entornos descomunales, un mundo en ruinas en el que las llamas se están apagando. Los jugadores se sumergirán en la atmósfera épica de un mundo de oscuridad gracias a un juego más rápido y una intensidad de combate ampliada. Tanto fans como recién llegados disfrutarán de una acción gratificante y gráficos absorbentes.\r\nSolo quedan las ascuas... ¡Prepárate una vez más para sumergirte en la oscuridad!', 'img/darksouls.jpg', 'https://www.youtube.com/embed/U6uyuIQYlfY', '', 'FromSoftware, Inc'),
(9, 'Far Cry 5', 'Aventura', 'Xbox', 'Playstation', 'Steam', 60, 'Far Cry llega a Estados Unidos en la última entrega de la exitosa franquicia.\r\n\r\nBienvenido a Hope County, Montana, la tierra de los valientes y de la libertad, pero también de la secta apocalíptica conocida como \"Puerta del Edén\". Enfréntate a Joseph Seed, el líder de la secta, y a sus hermanos para prender la llama de la resistencia y liberar a la comunidad.\r\n\r\nENFRÉNTATE A LA SECTA LETAL\r\nLibera el condado de Hope solo o en en cooperativo de 2 jugadores.\r\nRecluta pistoleros y animales salvajes para derrotar a la secta.\r\n\r\nUN MUNDO AGRESIVO\r\nDestruye la secta, y prepárate para sufrir la ira de Joseph Seed y sus fieles.\r\n\r\nELIGE TU CAMINO\r\n¡Crea tu personaje y elige tu aventura en el Far Cry más personalizable!\r\n\r\nJUGUETES DINÁMICOS\r\nControla bólidos míticos, quads, aviones y mucho más.', 'img/farcry5.jpg', 'https://www.youtube.com/embed/G4IFgu6wVao', '', 'Ubisoft'),
(10, 'Counter Strike Global Offensive', 'Acción', 'Steam', 'Xbox', 'Apple', 12, 'Counter-Strike: Global Offensive (CS: GO) ampliará la jugabilidad de acción por equipos que fue pionera en su lanzamiento hace 12 años.\r\n\r\nCS: GO incluirá nuevos mapas, personajes y armas y ofrecerá versiones actualizadas del contenido clásico de CS (de_dust2, etc.). Además, CS: GO introducirá nuevos modos de juego, matchmaking, marcadores y mucho más.\r\n\r\n\"Counter-Strike cogió la industria de los videojuegos por sorpresa cuando, contra todo pronóstico, el MOD se convirtió en el juego de acción online para PC más jugado del mundo tras su lanzamiento en agosto de 1999\", dijo Doug Lombardi de Valve. \"En los últimos 12 años, ha continuado siendo uno de los juegos más jugados del mundo, el protagonista de los torneos de videojuegos competitivos y se han vendido más de 25 millones de copias por todo el mundo. CS: GO promete ampliar la aclamada jugabilidad de CS y ofrecerla a los jugadores de PC, así como a los de las consolas de última generación y Mac.\"', 'img/csgo.jpg', 'https://www.youtube.com/embed/edYCtaNueQY', 'Especiales', 'Valve'),
(11, 'Grand Theft Auto V', 'Simuladores', 'Playstation', 'Xbox', 'Steam', 60, '\r\n\r\nGrand Theft Auto V para PC también incluye Grand Theft Auto Online, compatible con 30 jugadores y dos espectadores. Grand Theft Auto Online para PC incluirá todas las mejoras y contenidos creados por Rockstar desde la fecha de lanzamiento de Grand Theft Auto Online, incluidos los golpes y los modos Adversario.\r\n\r\nLa versión para PC de Grand Theft Auto V y Grand Theft Auto Online incluye la vista en primera persona, que ofrece a los jugadores la posibilidad de explorar todos los detalles del mundo de Los Santos y el condado de Blaine de una forma totalmente nueva.\r\n\r\n\r\n\r\n', 'img/gtav.jpg', 'https://www.youtube.com/embed/QkkoHAzjnUs', 'Más vendidos', 'Rockstar'),
(12, 'Rocket League', 'Indie', 'Nintendo', 'Steam', 'Xbox', 20, 'Rocket League combina de forma espectacular las carreras de coches con el fútbol, proponiéndonos enfrentarnos a los rivales en intensos duelos en los que prácticamente todo está permitido. \r\n\r\nEl concepto del manejo es totalmente arcade, apoyándose en un concepto de la física totalmente exagerado que le sienta de maravilla a los intensos encuentros de cinco minutos que duran en Rocket League. En resumen, auténticos bólidos, fútbol y propulsores para un juego multijugador muy divertido.', 'img/rocketleague.jpg', 'https://www.youtube.com/embed/X5V6x3lpGlY', 'Ofertas', 'Psyonix, Inc'),
(13, 'Forza Motorsport 7', 'Carreras', 'Xbox', 'Steam', '0', 60, 'Forza 7 es la entrega para Xbox One, Xbox One X y PC de la conocida saga de simulación y velocidad Forza firmada por Turn 10. El Lamborghini Centenario es su \"coche de portada\", aunque hay una prometedora asociación con Porsche y con el potente Porsche 911 GT2RS en cabeza. Forza 7 saca partido de la potencia de las distintas versiones de la consola y de los ordenadores de la actualidad para ofrecer la misma exactitud en su experiencia de conducción y unos gráficos a la altura de lo que la serie ha venido acostumbrando. \r\n\r\nCon más de 700 autos y una imponente resolución de 4k nativos y 60 frames por segundo en Xbox One S, la antiguamente conocida plataforma Project Scorpio, el título de velocidad y simulación de conducción Forza Motorsport 7 vuelve a ser un espectacular referente visual plagado de modos de juego para asegurar horas y horas de conducción.', 'img/forza.jpg', 'https://www.youtube.com/embed/QITXLdS3eW0', 'Novedades', 'Turn 10'),
(14, 'Need for Speed Payback', 'Carreras', 'Playstation', 'Xbox', 'Steam', 62, 'Need For Speed Payback, desarrollado por Ghost Games y distribuido por Electronic Arts para PC, PlayStation 4 y Xbox One, es el nuevo título de la reconocida franquicia de conducción y carreras callejeras. Esta explosiva aventura incluirá intensas misiones, batallas de velocidad con arriesgadas apuestas, persecuciones policiales y muchas opciones de personalización. Need For Speed Payback será un auténtico blockbuster, con una apasionante historia de traición y venganza. Esta vez, no será suficiente con cruzar la línea de meta para demostrar que eres el mejor, ahora tendrás que hacer una carrera perfecta sin soltar el pie del acelerador.', 'img/needforspeed.jpg', 'https://www.youtube.com/embed/K-5EdHZ0hBs', 'Más vendidos', 'Ghost Games'),
(15, 'NBA 2K18', 'Deportes', 'Playstation', 'Nintendo', 'Steam', 50, 'NBA 2K18 salta a la cancha del videojuego con todo el espíritu del mejor basket NBA con licencia oficial. El juego de 2K Sports busca sorprender otra temporada más a los seguidores del baloncesto más exigente y divertido, contando además con un uevo miembro del Hall of Fame de la NBA, icono del baloncesto y pívot dominante por excelencia, Shaquille O’Neal como protagonista de la portada de la edición especial de NBA 2K18. \r\n\r\nEntre las novedades jugables de este NBA 2K18 nos encontramos con un nuevo sistema de animaciones, nuevo sistema de tiro y mejoras de IA entre otros, pero sobre todo la incorporación de El Barrio, una especie de lugar de encuentro o centro neurálgico online persistente en el que podremos retar a otros jugadores en partidos urbanos o entablar relación con ellos.', 'img/nba.jpg', 'https://www.youtube.com/embed/lwBqitrE3ww', 'Novedades', 'Visual Concepts'),
(16, 'Bendy and the Ink Machine', 'Indie', 'Steam', 'Apple', '0', 0, 'BENDY AND THE INK MACHINE es un juego en primera persona de tipo puzzle, acción y horror que comienza en los días lejanos de la animación y termina en un muy oscuro futuro. Te adentrarás en un estudio en el cuerpo de un joven llamado Henry y tendrás que intentar escapar de Bendy, el demonio de tinta.', 'img/bendy.jpg', 'https://www.youtube.com/embed/WaYBYA4AsHo', 'Ofertas', 'TheMeatly'),
(17, 'Left 4 Dead', 'Acción', 'Xbox', 'Steam', '0', 20, 'Basado en motor gráfico de Counter-Strike Source, LEFT 4 DEAD es un título de acción en primera persona, está protagonizado por una atípica banda de cuatro héroes, que deberán enfrentarse a toda una legión de zombis y demás monstruosas criaturas.', 'img/left4dead.jpg', 'https://www.youtube.com/embed/HfaGBwedwso', 'Especiales', 'Turtle Rock'),
(18, 'Amnesia: The Dark Descent', 'Aventura', 'Playstation', 'Oculus Rift', 'Apple', 20, 'Los últimos recuerdos se desvanecen en las tinieblas. Tu mente es un caos y lo único que queda es esa sensación de ser la presa. Debes escapar.\r\nDespierta...\r\nAmnesia: The Dark Descent es un juego de horror y supervivencia en primera persona. Un juego sobre la inmersión, el descubrimiento y la vida dentro de una pesadilla. Una experiencia que te helará la sangre.\r\nVas tropezando por los estrechos pasillos cuando escuchas un grito en la lejanía.\r\nSe está acercando.\r\nExplora...\r\nAmnesia: The Dark Descent te pone en las botas de Daniel, que despierta en un lúgubre castillo recordando a duras penas algún destello sobre su pasado. Además de explorar los fantasmagóricos senderos, deberás implicarte en los perturbados recuerdos de Daniel. El horror no sólo viene del exterior, también puebla su atormentada mente. Te aguarda una inquietante odisea por los más oscuros rincones de la mente humana.\r\n¿Ese sonido es de pies que se arrastran?. ¿O tu mente te está jugando una mala pasada?', 'img/amnesia.jpg', 'https://www.youtube.com/embed/u1nY_5-UrY4', 'Especiales', 'Frictional Games'),
(19, 'Outlast', 'Aventura', 'Nintendo', 'Steam', 'Playstation', 20, 'Outlast en un survival Horror en el que participan veteranos desarrolladores provenientes de Ubisoft y EA, la compañía Red Barrels. El juego está protagonizado por el periodista Miles Upshur, que investiga una denuncia anónima en un hospital psiquiátrico, que desencadenará en una truculenta historia de terror y suspense. Outlast es un videojuego cargado de una sensación de vulnerabilidad máxima que ayuda a una cosa, pasar miedo.', 'img/outlast.jpg', 'https://www.youtube.com/embed/YabrGV34_mk', 'Especiales', 'Red Barrels'),
(20, 'Resident Evil 7: Biohazard', 'Acción', 'Playstation', 'Xbox', 'Steam', 30, 'RE 7 es la séptima entrega numérica de la serie Resident Evil (biohazard en Japón). Zombies, personajes conocidos de la franquicia y un regreso a las raíces survival horror de la saga por parte de Capcom. Resident Evil 7 puede jugarse tanto en modo estándar como totalmente en realidad virtual en el caso de la versión de PS4 gracias a las gafas PS VR, ofreciendo en ambos casos una emocionante experiencia de horror inmersiva para los cinco sentidos apoyada en una perspectiva en primera persona y gráficos fotorrealistas.', 'img/residentevil1.jpg', 'https://www.youtube.com/embed/W1OUs3HwIuo', 'Más vendidos', 'Capcom'),
(21, 'Resident Evil: Operation Raccoon City', 'Acción', 'Xbox', 'Playstation', 'Steam', 30, 'Resident Evil: Raccoon City es una entrega de la popular saga Resident Evil que, en esta ocasión, está protagonizado por varios miembros de las fuerzas de seguridad de Umbrella, y cuya misión consiste en eliminar todas las pruebas del desastre provocado por el virus T y acabar con los supervivientes del incidente de Raccoon City.', 'img/residentevil2.jpg', 'https://www.youtube.com/embed/dy4sUsldPlc', 'Especiales', 'Slant Six');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fechanac` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `pais`, `email`, `usuario`, `password`, `fechanac`) VALUES
(1, 'Ignacio', 'Aguirre', 'AR', 'igni96@hotmail.com', 'NachoAguirre', 'abc123', '1996-10-10'),
(2, 'Juan Manuel', 'Landaburu', 'AR', 'juanma-96@live.com', 'JuanmaLandaburu', 'jml2396', '1996-07-23'),
(3, 'Juan', 'Lopez', 'AR', 'juanlopez@yahoo.com', 'juanlopez1', 'jl4567', '1998-02-02'),
(4, 'Pepe', 'Peron', 'BH', 'pepe@pepe.com', 'pepe', 'pepe', '2018-01-09'),
(5, 'Santiago', 'Aguirre', 'AR', 'santiago.aguirre@fibertel.com.ar', 'santia', 'etc', '2018-01-08');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `carrito_juego`
--
ALTER TABLE `carrito_juego`
  ADD CONSTRAINT `carrito_juego_ibfk_1` FOREIGN KEY (`idcarrito`) REFERENCES `carrito` (`id`),
  ADD CONSTRAINT `carrito_juego_ibfk_2` FOREIGN KEY (`idjuego`) REFERENCES `juegos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
