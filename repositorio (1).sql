-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 09:56:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `repositorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `contacto_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`contacto_id`, `nombre`, `email`, `mensaje`, `fecha`) VALUES
(1, 'Prueba', 'Prueba@itc.edu.co', 'Test', '2024-05-28 11:49:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `docente_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `formacion_academica` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`docente_id`, `nombre`, `cargo`, `formacion_academica`, `email`, `imagen`) VALUES
(4, 'Socrates Rojas Amador', 'Profesor - Facultad de sistemas', 'Maestría/Magister UNIVERSIDAD DISTRITAL FRANCISCO JOSÉ DE CALDAS\r\nMaestría en comunicación educación énfasis en medios interactivos\r\nAgostode2012 - Diciembrede 2016\r\nGestión del conocimiento aplicado en la investigación\r\n \r\nEspecialización UNIVERSIDAD DISTRITAL FRANCISCO JOSÉ DE CALDAS\r\nIngenieria de Software\r\nEnerode2000 - de 2000\r\nDesarrollo de seguridad en redes de informacion\r\n \r\nPregrado/Universitario UNIVERSIDAD DE LA SABANA\r\nLicenciado En Administracion y Supervision Educati\r\nEnerode1996 - de 1999\r\nDiseño de Formacion Aplicada en informatica\r\n \r\nTécnico - nivel superior FUNACION UNIVERSITARIA CIDCA\r\nIngenieria de Sistemas\r\nEnerode1980 - de 1986', 'rsocratesa@itc.edu.co', '../scr/docen/322478419_1612458042503966_3886220446178636115_n.jpg'),
(8, 'Eduardo Hernandez Ortiz', 'Profesor - Facultad de sistemas', 'Maestría/Magister UNIVERSIDAD AUTONOMA DE BUCARAMANGA\r\nMaestría en Software Libre\r\nMarzode2010 - de\r\n \r\nMaestría/Magister Nova Southeastern University\r\nMASTER OF SCIENCE IN EDUCATION WITH A SPECIALIZATION IN CURRICULUM INSTRUCTION & TECHNOLOGY\r\nAgostode2013 - Septiembrede 2015\r\n \r\nEspecialización UNIVERSIDAD DISTRITAL FRANCISCO JOSÉ DE CALDAS\r\nEsp. en gestión de proyectos\r\nEnerode2002 - Octubrede 2004\r\n \r\nPregrado/Universitario UNIVERSIDAD DISTRITAL FRANCISCO JOSÉ DE CALDAS\r\ningenieria de sistemas\r\nAgostode1992 - Juliode 1999', 'ehortiz@itc.edu.co', '../scr/docen/Eduardo-Ortiz-9.png'),
(9, 'Andrea Garcia Rivas', 'Profesor - Facultad de Mecanica', 'Maestría/Magister Corporación Educativa Minuto de Dios\r\nEducación\r\nEnerode2019 - Abrilde 2021\r\nDificultades en la apropiación del concepto de computabilidad en estudiantes de Ingeniería de Sistemas\r\n \r\nEspecialización UNIVERSIDAD SERGIO ARBOLEDA\r\nMatemática aplicada\r\nEnerode2015 - Diciembrede 2015\r\n \r\nPregrado/Universitario Universidad Distrital Francisco José de Caldas\r\nMatemáticas\r\nEnerode2007 - Abrilde 2013\r\nDetección de puntos singulares o picos en una señal mediante transformada wavelet\r\n \r\nPregrado/Universitario UNIVERSIDAD NACIONAL DE COLOMBIA\r\nIngeniería química\r\nEnerode2014 - Octubrede 2020', 'agrivas@itc.edu.co', '../scr/docen/1627507036759.jfif'),
(10, 'José Alfredo Trejos Motato', 'Profesor - Facultad de sistemas', 'Maestría/Magister Universidad Internacional de La Rioja\r\nMaestría en Diseño y Gestión de Proyectos Tecnológicos\r\nAgosto de 2012 - Marzo de 2014\r\nDiseño de un prototipo de cédula digital para el ingreso a la escuela tecnológica\r\n \r\nEspecialización UNIVERSIDAD COOPERATIVA DE COLOMBIA\r\nGerencia de Proyectos educativos\r\nFebrero de 2010 - Marzo de 2011\r\nESTRATEGIAS DIGITALES PARA EL DESARROLLO DE COMPETENCIAS MATEMATICAS PARA LA INSTITUCIÓN IED FERICO GARCIA LORCA\r\n \r\nPregrado/Universitario UNIVERSIDAD NACIONAL ABIERTA Y A DISTANCIA\r\nINGENIERIA DE SISTEMAS\r\nEnero de1995 - de 2000', 'jtrejos@itc.edu.co', '../scr/docen/imagen_2024-05-31_193150871.png'),
(11, 'Alexander Sabogal Rueda', 'Profesor - Facultad de sistemas', 'Especialización Universidad Autónoma De Colombia\r\nRedes\r\nFebrero de 2002 - Diciembre de 2003\r\nSistema de Consulta de Notas Vía Web para Coruniversitec\r\n \r\nEspecialización Universidad Autónoma De Colombia\r\nRedes\r\nFebrero de 2001 - Octubre de 2002\r\n \r\nPregrado/Universitario Universidad Autónoma De Colombia\r\nIngeniería de Sistemas\r\nFebrero de1994 - Abril de 2000\r\nSistema de Distribución de la Planta Física en Instituciones de Educación Superior\r\n \r\nSecundario Institución Educativa Instituto Técnico Industrial\r\n\r\nFebrero de 1984 - Diciembre de 1990\r\n \r\nPrimaria Escuela Central Integrada\r\n\r\nFebrero de1979 - Noviembre de 1984', 'asabogalr@itc.edu.co', '../scr/docen/imagen_2024-05-31_193534704.png'),
(12, 'Gonzalo Martin Rodriguez Carrillo', 'Profesor - Facultad de sistemas', 'Pregrado/Universitario UNIVERSIDAD NACIONAL DE COLOMBIA\r\nMatemáticas\r\nFebrero de1989 - Diciembre de 2004\r\nClases de Complejidad Computacional\r\nFormación Complementaria\r\n \r\nCursos de corta duración Escuela Tecnológica Instituto Técnico Central\r\nUnidad de extensión\r\nAgosto de 2016 - Agosto de 2016\r\n \r\nCursos de corta duración UNIVERSITY OF TORONTO\r\nTecnología\r\nAgosto de 2012 - Diciembre de 2012\r\n \r\nCursos de corta duración Asociación Colombiana Para El Avance De La Ciencia - Acac\r\nInformática\r\nJunio de 2014 - Julio de 2014\r\n \r\nCursos de corta duración ASOCIACION COLOMBIANA DE INGENIEROS DE SISTEMAS\r\nIngeniería\r\nNoviembre de 2005 - Noviembre de 2005\r\n \r\nCursos de corta duración ASOCIACION COLOMBIANA DE INGENIEROS DE SISTEMAS\r\nIngeniería\r\nAbril de 2007 - Abril de 2007\r\n \r\nCursos de corta duración JOHNS HOPKINS UNIVERSITY\r\nEstadística\r\nAgosto de 2012 - Diciembre de 2012\r\n \r\nCursos de corta duración Ministerio de Tecnologías de la Información y las Comunicaciones\r\nTecnología\r\nAbril de 2013 - Mayo de 2013\r\n \r\nCursos de corta duración UNIVERSIDAD POLITÉCNICA DE VALENCIA - INTERNACIONAL\r\nAula abierta\r\nFebrero de 2013 - Mayo de 2013\r\n \r\nCursos de corta duración Ministerio de Tecnologías de la Información y las Comunicaciones\r\nTecnología\r\nAbril de 2013 - Mayo de 2013\r\n \r\nCursos de corta duración ASOCIACION COLOMBIANA DE INGENIEROS DE SISTEMAS\r\nIngeniería\r\nMarzo de 2011 - Marzo de 2011\r\n \r\nExtensión CORPORACIÓN UNIVERSITARIA MINUTO DE DIOS - UNIMINUTO\r\nEducación\r\nMarzo de 2009 - Agosto de 2009', 'grodriguezc@itc.edu.co', '../scr/docen/imagen_2024-05-31_194140561.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes_proyectos`
--

CREATE TABLE `docentes_proyectos` (
  `id` int(11) NOT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `proyecto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `estudiante_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `proyecto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`estudiante_id`, `nombre`, `proyecto_id`) VALUES
(7, 'Eleanora Edinboro', NULL),
(8, 'Keeley Wolfendale', NULL),
(9, 'Marlo Baudinot', NULL),
(10, 'Schuyler Ferrierio', NULL),
(11, 'Swen Daily', NULL),
(12, 'Thedrick Greasty', NULL),
(13, 'Shepherd Huckin', NULL),
(14, 'Nollie Linch', NULL),
(15, 'Tomkin Harwell', NULL),
(16, 'Christen Kidsley', NULL),
(17, 'Kenneth Devin', NULL),
(18, 'Salomone Lucks', NULL),
(19, 'Rosaleen Salkeld', NULL),
(20, 'Hetti Postle', NULL),
(21, 'Seymour Scurry', NULL),
(22, 'Chrysler Bedenham', NULL),
(23, 'Karrah Lange', NULL),
(24, 'Halette Bennison', NULL),
(25, 'Kaitlin Turfes', NULL),
(26, 'Shir Haggerty', NULL),
(27, 'Lynelle Wheway', NULL),
(28, 'Felizio Haslen', NULL),
(29, 'Jason Turneaux', NULL),
(30, 'Birk Younge', NULL),
(31, 'Nadiya MacQuist', NULL),
(32, 'Fernande Aberdeen', NULL),
(33, 'Jennica Hartfield', NULL),
(34, 'Yoshiko Sharpless', NULL),
(35, 'Dwight Rampage', NULL),
(36, 'Mignon Busfield', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financiamiento_indep`
--

CREATE TABLE `financiamiento_indep` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financiamiento_invest`
--

CREATE TABLE `financiamiento_invest` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financiamiento_semi`
--

CREATE TABLE `financiamiento_semi` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias`
--

CREATE TABLE `guias` (
  `section` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guias`
--

INSERT INTO `guias` (`section`, `content`) VALUES
('intro', 'Los semilleros de investigación de la ETITC, son grupos constituidos por estudiantes de los programas académicos de Educación Superior, dirigidos por un docente, que motivados por su espíritu de indagación, se reúnen en torno a un problema de investigación buscan a través de la elaboración de un proyecto, visualizar problemáticas, aportar discusiones y posibles soluciones a una determinada temática, articulada con los intereses de alguna de las líneas y grupos de investigación reconocidos por la Vicerrectoría de Investigación, Extensión y Transferencia; el semillero se propone tratar metodológica y rigurosamente un problema académico, social, técnico, hasta llegar a una producción académica en la que se socializa la posible solución  (Fuente: Articulo 1, Acuerdo 012 de 2021).');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias_documents`
--

CREATE TABLE `guias_documents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guias_documents`
--

INSERT INTO `guias_documents` (`id`, `title`, `description`, `file`) VALUES
(2, 'Resolución 362 de 14 de julio de 2022 - Por la cual se crea la Red de lnvestigación Estudiantil de la Escuela Tecnológica lnstituto Técnico Central - \"REDIETITC\"', 'Los semilleros de investigación de la ETITC, son grupos constituidos por estudiantes de los programas académicos de Educación Superior, dirigidos por un docente, que motivados por su espíritu de indagación, se reúnen en torno a un problema de investigación buscan a través de la elaboración de un proyecto, visualizar problemáticas, aportar discusiones y posibles soluciones a una determinada temática, articulada con los intereses de alguna de las líneas y grupos de investigación reconocidos por la Vicerrectoría de Investigación, Extensión y Transferencia; el semillero se propone tratar metodológica y rigurosamente un problema académico, social, técnico, hasta llegar a una producción académica en la que se socializa la posible solución  (Fuente: Articulo 1, Acuerdo 012 de 2021).', '../scr/doc/res3622022.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guias_videos`
--

CREATE TABLE `guias_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guias_videos`
--

INSERT INTO `guias_videos` (`id`, `title`, `url`) VALUES
(1, 'Bienvenido', 'https://www.youtube.com/watch?v=wTgVoEOHmKw'),
(2, 'Test 2', 'https://www.youtube.com/watch?v=1qGIMcqSYao');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `proyecto_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `semillero_id` int(11) DEFAULT NULL,
  `documentacion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`proyecto_id`, `nombre`, `descripcion`, `semillero_id`, `documentacion`, `imagen`) VALUES
(14, 'Exploración y análisis de datos de texto masivos relativos a la crisis del COVID-19', 'La pandemia del COVID-19 trajo consigo grandes implicaciones para la\r\nhumanidad, desde poner el mundo en jaque frente a las restricciones de\r\nmovilidad, hasta llegar a implicar nuevos retos para los científicos; con el fin de\r\ntratar y hacerle frente a la situación. Esto conllevó, entre otras cosas, al\r\ndesarrollo de nuevas vacunas en tiempo récord, apoyados desde luego,\r\ntambién en áreas de las ciencias de la computación, como lo es la Inteligencia\r\nArtificial', NULL, '../scr/doc/k-ia.pdf', '../scr/proy/MicrosoftTeams-image (1) (1).png'),
(15, 'Desarrollo de un sistema de realidad mixta sobre manipulación y uso del mando del VANT DJI AGRAS T10', 'La Escuela Tecnológica Instituto Técnico Central (ETITC) ha comenzado a\r\nincursionar, investigar en la aplicación de las TIC al sector agrícola, promoviendo\r\ny generando mejores practicas que generen un valor agregado o impacto en\r\neste entorno económico. Con la adquisición de los vehículos aéreos no\r\ntripulados (VANT) DJI AGRAS T10 en el marco del proyecto de investigación del\r\ngrupo K – DEMY, se busca mejorar los procesos agrícolas con el uso de este\r\nVANT. Desde el semillero de investigación K-INMMERSION se desarrollara un\r\nsistema de realidad mixta que optimice los proceso de aprendizaje del manejo\r\ndel VANT.', NULL, '../scr/doc/k-immersion.pdf', '../scr/proy/imagen_2024-06-05_011029294.png'),
(16, 'Proyecto K‐knowledge', 'El proyecto K‐Knowledge tiene como propósito la implementación de OVA para \r\nel aprendizaje de las técnicas de Inteligencia Artificial que sean de fácil  \r\nincorporación y uso en diferentes plataformas e‐learning.\r\nEl proyecto K‐Knowledge ayudará a profundizar en técnicas de Inteligencia \r\nArtificial como los algoritmos evolutivos o los autómatas celulares,  y tener un \r\nconocimiento más amplio de las ciencias computacionales y software para \r\nestas.', NULL, '../scr/doc/kerub.pdf', '../scr/proy/imagen_2024-06-05_011512645.png'),
(17, 'Sensores para internet of things: Aplicación en Agricultura', 'El Internet de las cosas (IoT) es una Tecnología de\r\nla denominada industria 4.0 que permite conectar\r\nelementos físicos cotidianos al Internet: se propone\r\nla medición de parámetros físicos en cultivos como\r\napoyo a sistemas de procesamiento de imágenes y\r\nestablecer con ellos la salud de las plantas en cultivo.\r\nPartiendo del supuesto que el entorno del cultivo\r\npermite definir la sanidad de una planta\r\nEs una tecnología que influye e impacta en diversos\r\námbitos en este caso la agricultura.', NULL, '../scr/doc/siot.pdf', '../scr/proy/imagen_2024-06-05_011833220.png'),
(18, 'Análisis de vulnerabilidades a la ETITC', 'Mas del 83% de las pequeñas y medianas empresas carecen de\r\nprotocolos de respuesta a la violación de políticas de seguridad de la\r\ninformación, esto según el informe de seguridad que publico la CCIT,\r\npara periodo 2019-2020 [1]. La principal razón es porque las empresas\r\nen Colombia no conocen su infraestructura y ecosistema de\r\nciberseguridad, aún más de sus vulnerabilidades y activos de valor en\r\nalto riesgo, por lo que realizar un Pentesting es el de vital importancia\r\npara brindar una visibilidad completa de los fallos en ciberseguridad que\r\ntiene cada empresa y con esto desprender un lineamiento especializado\r\npara cada entidad en ciberseguridad. ', NULL, '../scr/doc/sapientiam.pdf', '../scr/proy/sapientiam.jpeg'),
(19, 'Enlace', 'Resumen\r\nHablar del Proyecto Articulador del programa de sistemas, es hablar de una idea que desde\r\naños atrás ha buscado integrar estudiantes y docentes en torno a una sola propuesta que\r\npermita el dialogo entre pares, es decir estudiantes entre estudiantes y la forma de\r\nimplementarlo en el proyecto.. Así, los estudiantes no tienen que desarrollar varios\r\nproyectos para cada asignatura, sino que realiza un proyecto donde todas las asignaturas\r\nparticipan.', NULL, '../scr/doc/virtualaprende.pdf', '../scr/proy/imagen_2024-06-05_012149404.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_docentes`
--

CREATE TABLE `proyecto_docentes` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyecto_docentes`
--

INSERT INTO `proyecto_docentes` (`id`, `proyecto_id`, `docente_id`) VALUES
(20, 14, 4),
(21, 15, 9),
(22, 15, 4),
(23, 16, 4),
(24, 16, 11),
(25, 17, 4),
(26, 17, 9),
(27, 18, 10),
(28, 19, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_estudiantes`
--

CREATE TABLE `proyecto_estudiantes` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) DEFAULT NULL,
  `estudiante_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyecto_estudiantes`
--

INSERT INTO `proyecto_estudiantes` (`id`, `proyecto_id`, `estudiante_id`) VALUES
(26, 14, 8),
(27, 14, 11),
(28, 14, 7),
(29, 15, 8),
(30, 15, 11),
(31, 16, 36),
(32, 16, 30),
(33, 16, 26),
(34, 17, 18),
(35, 17, 19),
(36, 18, 20),
(37, 18, 21),
(38, 18, 22),
(39, 19, 31),
(40, 19, 25),
(41, 19, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_semilleros`
--

CREATE TABLE `proyecto_semilleros` (
  `proyecto_id` int(11) NOT NULL,
  `semillero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyecto_semilleros`
--

INSERT INTO `proyecto_semilleros` (`proyecto_id`, `semillero_id`) VALUES
(14, 10),
(15, 9),
(16, 8),
(17, 7),
(18, 3),
(19, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semilleros`
--

CREATE TABLE `semilleros` (
  `semillero_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `contacto_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `semilleros`
--

INSERT INTO `semilleros` (`semillero_id`, `nombre`, `descripcion`, `imagen`, `contacto_email`) VALUES
(3, 'Sapientiam', 'Misión: Somos un semillero que analiza el contexto nacional e internacional para identificar las amenazas existentes o futuras para la seguridad de la información y soportados en procedimientos técnico científicos, proponer soluciones de aseguramiento.\r\nVisión: Ser un semillero reconocido en la ETITC, entes Educativos y Empresariales, por la calidad de sus contribuciones a la sociedad y a la comunidad académica en temas de seguridad de la información.', '../scr/semi/image (4).png', 'Sapi@etitc.edu.co'),
(5, 'Semillero Virtual-Aprende', 'Hablar del Proyecto Articulador del programa de sistemas, es hablar de una idea que desde años atrás ha buscado integrar estudiantes y docentes en torno a una sola propuesta que permita el dialogo entre pares, es decir estudiantes entre estudiantes y la forma de implementarlo en el proyecto.. Así, los estudiantes no tienen que desarrollar varios proyectos para cada asignatura, sino que realiza un proyecto donde todas las asignaturas participan.', '../scr/semi/imagen_2024-05-31_201701668.png', 'ehernandezo@itc.edu.co'),
(7, 'SEMILLERO INTERNET OF THINGS - SIOT', 'Misión: El grupo IoT se crea con la idea de generar soluciones basadas en la tecnología 4.0 aplicándola en diversos sectores.\r\nVisión: Para el año 2024 se espera que el semillero sea reconocido a nivel institucional y a nivel local, como un espacio de investigación y desarrollo de diversos tipos de soluciones susceptibles de ser aplicados en diferentes sectores. \r\nObjetivos: Desarrollar e implementar un sistema térmico susceptible de ser manejado mediante IoT\r\nConstruir un sistema térmico el cual contendrá un sensor (LM35) y un actuador (bombilla de 100W)\r\nModelar usando MatLab el sistema térmico encontrando su función de transferencia\r\nDiseñar y simular un modelo de control a partir de la función de transferencia\r\nImplementar en tecnología Arduino WiFi, ESP 8266 Mod el modelo de control generado\r\nDesarrollar el sistema IoT usando módulos y la plataforma Ubidots\r\nEvaluar el desempeño del sistema comparando los datos de simulación con los obtenidos en la plataforma térmica IoT', '../scr/semi/MicrosoftTeams-image (5).png', 'siot@itc.edu.co'),
(8, 'SEMILLERO DE INTELIGENCIA ARTIFICIAL Y CIENCIA DE DATOS K-SMART - KERUB', 'Misión: Aplicación de técnicas de Inteligencia Artificial para la solución de modelaciones con agentes dinámicos.\r\n\r\nVisión: Fortalecimiento de competencias en técnicas de Inteligencia Artificial en la ETITC. \r\n\r\nObjetivos: El objetivo de este semillero es aplicar técnicas  de Inteligencia Artificial en problemáticas de la vida real, mediante modelaciones,  simulaciones y prototipos tecnológicos.', '../scr/semi/MicrosoftTeams-image (1) (1).png', 'kerub@itc.edu.co'),
(9, 'SEMILLERO K-IMMERSION', 'La Escuela Tecnológica Instituto Técnico Central (ETITC) ha comenzado a\r\nincursionar, investigar en la aplicación de las TIC al sector agrícola, promoviendo\r\ny generando mejores practicas que generen un valor agregado o impacto en\r\neste entorno económico\r\nDesarrollar de un sistema de realidad mixta sobre manipulación y uso del\r\nmando del VANT DJI AGRAS T10', '../scr/semi/MicrosoftTeams-image (1) (1).png', 'k-inmersion@itc.edu.co'),
(10, 'K-IA.', 'Misión: Aplicación de técnicas de Inteligencia Artificial para la solución de modelaciones con agentes dinámicos y que apalanquen las operaciones del quehacer diario de las organizaciones de tal manera que les permita ser más productivas.\r\n\r\nVisión: Para el 2030 fortalecer las competencias en técnicas de Inteligencia Artificial en la ETITC.\r\n\r\nObjetivos: Diseñar e implementar soluciones de Inteligencia artificial que apalanquen las operaciones del quehacer diario de las organizaciones de tal manera que les permita ser más productivas.', '../scr/semi/MicrosoftTeams-image (1) (1).png', 'k-ia@itc.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `email`, `password`, `rol`) VALUES
(1, 'admin@example.com', '0192023a7bbd73250516f069df18b500', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`contacto_id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`docente_id`);

--
-- Indices de la tabla `docentes_proyectos`
--
ALTER TABLE `docentes_proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `proyecto_id` (`proyecto_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`estudiante_id`),
  ADD KEY `proyecto_id` (`proyecto_id`);

--
-- Indices de la tabla `financiamiento_indep`
--
ALTER TABLE `financiamiento_indep`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `financiamiento_invest`
--
ALTER TABLE `financiamiento_invest`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `financiamiento_semi`
--
ALTER TABLE `financiamiento_semi`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guias`
--
ALTER TABLE `guias`
  ADD PRIMARY KEY (`section`);

--
-- Indices de la tabla `guias_documents`
--
ALTER TABLE `guias_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guias_videos`
--
ALTER TABLE `guias_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`proyecto_id`),
  ADD KEY `semillero_id` (`semillero_id`);

--
-- Indices de la tabla `proyecto_docentes`
--
ALTER TABLE `proyecto_docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `proyecto_docentes_ibfk_1` (`proyecto_id`);

--
-- Indices de la tabla `proyecto_estudiantes`
--
ALTER TABLE `proyecto_estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `proyecto_estudiantes_ibfk_1` (`proyecto_id`);

--
-- Indices de la tabla `proyecto_semilleros`
--
ALTER TABLE `proyecto_semilleros`
  ADD PRIMARY KEY (`proyecto_id`,`semillero_id`),
  ADD KEY `semillero_id` (`semillero_id`);

--
-- Indices de la tabla `semilleros`
--
ALTER TABLE `semilleros`
  ADD PRIMARY KEY (`semillero_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `contacto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `docente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `docentes_proyectos`
--
ALTER TABLE `docentes_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `estudiante_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `financiamiento_indep`
--
ALTER TABLE `financiamiento_indep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `financiamiento_invest`
--
ALTER TABLE `financiamiento_invest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `financiamiento_semi`
--
ALTER TABLE `financiamiento_semi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `guias_documents`
--
ALTER TABLE `guias_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `guias_videos`
--
ALTER TABLE `guias_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `proyecto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proyecto_docentes`
--
ALTER TABLE `proyecto_docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `proyecto_estudiantes`
--
ALTER TABLE `proyecto_estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `semilleros`
--
ALTER TABLE `semilleros`
  MODIFY `semillero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docentes_proyectos`
--
ALTER TABLE `docentes_proyectos`
  ADD CONSTRAINT `docentes_proyectos_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`docente_id`),
  ADD CONSTRAINT `docentes_proyectos_ibfk_2` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`proyecto_id`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`proyecto_id`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`semillero_id`) REFERENCES `semilleros` (`semillero_id`);

--
-- Filtros para la tabla `proyecto_docentes`
--
ALTER TABLE `proyecto_docentes`
  ADD CONSTRAINT `proyecto_docentes_ibfk_1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`proyecto_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proyecto_docentes_ibfk_2` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`docente_id`);

--
-- Filtros para la tabla `proyecto_estudiantes`
--
ALTER TABLE `proyecto_estudiantes`
  ADD CONSTRAINT `proyecto_estudiantes_ibfk_1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`proyecto_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proyecto_estudiantes_ibfk_2` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`estudiante_id`);

--
-- Filtros para la tabla `proyecto_semilleros`
--
ALTER TABLE `proyecto_semilleros`
  ADD CONSTRAINT `proyecto_semilleros_ibfk_1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`proyecto_id`),
  ADD CONSTRAINT `proyecto_semilleros_ibfk_2` FOREIGN KEY (`semillero_id`) REFERENCES `semilleros` (`semillero_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
