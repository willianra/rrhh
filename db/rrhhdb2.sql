-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2019 a las 05:32:30
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rrhhdb2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato`
--

CREATE TABLE `candidato` (
  `idcandidato` int(11) NOT NULL,
  `emaill` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `cargo` int(11) NOT NULL,
  `horario` int(11) NOT NULL,
  `sueldo` int(11) NOT NULL,
  `tipo_de_contrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE `convocatoria` (
  `idconvocatoria` int(11) NOT NULL,
  `nombreconvocatoria` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cargo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sueldo` int(255) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`idconvocatoria`, `nombreconvocatoria`, `descripcion`, `cargo`, `sueldo`, `condicion`) VALUES
(1, 'Departamento de gerencia', 'Experiencia de 2 años licenciado en admiinstracion de empresas', 'gerente', 2540, 1),
(2, 'Departamento de Sistema', 'Experiencias de 3 años licenciados en sistemas , informatica ,redes  contrato anual co beneficios sociales para el area de desarrollo', 'ing Sistema', 2540, 1),
(3, 'departamento de recursos humanos', 'se solicita una persona con facilidad de palabra  puntual  buen manejo de redes sociales  debe saber contestar llamadas  preferencia lecenciados en administracion o comercial', 'ejecutivo de ventas', 3000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `funciones` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombredepartamento` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `funciones`, `nombredepartamento`, `condicion`) VALUES
(1, 'creacion de aplicaciones web y admistracion de sistemas', 'Departamento de Sistema', 1),
(2, 'administracion de  la empresa en general', 'Departamento de gerencia', 1),
(3, 'gestiona los empleados en gneral', 'Departamento de Recursos Humanos', 1),
(4, 'manejar la contabilidad de la empresa', 'Departamento de administracion', 1),
(5, 'administracion , soporte y creacion de sistemas', 'Departamento de Informatica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecv`
--

CREATE TABLE `detallecv` (
  `iddetallecv` int(11) NOT NULL,
  `detalle` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detallecv`
--

INSERT INTO `detallecv` (`iddetallecv`, `detalle`, `fechaInicio`, `fechaFin`, `condicion`) VALUES
(1, 'fjgdfglfvmdndndjknfjsknvjf', '2018-04-09', '2018-05-04', 1),
(2, 'nfnkdfnkdjgnjfkgnjdfkgnrng', '2018-03-09', '2018-05-10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `cargo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `sueldomensual` int(255) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `idpersona`, `cargo`, `fecha`, `sueldomensual`, `condicion`) VALUES
(1, 1, 'ing Informactico', '0000-00-00', 7000, 1),
(2, 0, 'ing Redes', '0000-00-00', 5682, 1),
(3, 0, 'ing Sistema', '0000-00-00', 5782, 1),
(4, 3, 'contador', '0000-00-00', 5800, 1),
(5, 14, 'sistemas', '2010-01-05', 5000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluador`
--

CREATE TABLE `evaluador` (
  `idevaluador` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `evaluador`
--

INSERT INTO `evaluador` (`idevaluador`, `idpersona`, `iddepartamento`, `condicion`) VALUES
(3, 3, 1, 1),
(4, 12, 2, 1),
(5, 12, 5, 1),
(6, 12, 4, 1),
(7, 12, 3, 1),
(8, 13, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `idformulario` int(11) NOT NULL,
  `idconvocatoria` int(11) NOT NULL,
  `idpostulante` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idempleado` int(100) NOT NULL,
  `fecha` longtext COLLATE utf8mb4_spanish2_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`idformulario`, `idconvocatoria`, `idpostulante`, `idempleado`, `fecha`, `condicion`) VALUES
(1, 1, '0', 4, 'nombre: juan carlos rojas alba\r\nprofesion: ingeniero de sistemas \r\nexperiencia laboral:12 años\r\npretencion salarial:3000 bs\r\nuniversidad :uagrm 2019\r\ncolegio :la salle\r\ncursos realizados: cursos avanzados de programacion\r\ningles :avanzado\r\nconocimiento extra: manejo de servidores \r\naptitudes: responsable adaptable  y trabajo bajo presion', 1),
(2, 3, '9', 0, 'nombre: juan carlos rojas alba\r\nprofesion: ingeniero de sistemas \r\nexperiencia laboral:12 años\r\npretencion salarial:3000 bs\r\nuniversidad :uagrm 2019\r\ncolegio :la salle\r\ncursos realizados: cursos avanzados de programacion\r\ningles :avanzado\r\nconocimiento extra: manejo de servidores \r\naptitudes: responsable adaptable  y trabajo bajo presion', 1),
(3, 3, '10', 0, 'nombre: juan carlos rojas alba\r\nprofesion: ingeniero de sistemas \r\nexperiencia laboral:12 años\r\npretencion salarial:3000 bs\r\nuniversidad :uagrm 2019\r\ncolegio :la salle\r\ncursos realizados: cursos avanzados de programacion\r\ningles :avanzado\r\nconocimiento extra: manejo de servidores \r\naptitudes: responsable adaptable  y trabajo bajo presion', 1),
(4, 2, '10', 0, 'nombre: juan carlos rojas alba\r\nprofesion: ingeniero de sistemas \r\nexperiencia laboral:12 años\r\npretencion salarial:3000 bs\r\nuniversidad :uagrm 2019\r\ncolegio :la salle\r\ncursos realizados: cursos avanzados de programacion\r\ningles :avanzado\r\nconocimiento extra: manejo de servidores \r\naptitudes: responsable adaptable  y trabajo bajo presion', 1),
(5, 2, '10', 5, 'nombre: jose marcos ponce martinez\r\nprofesion: ingeniero de sistemas \r\nexperiencia laboral:12 años\r\npretencion salarial:3000 bs\r\nfecha:02/052013', 1),
(6, 1, '9', 0, 'nombre: juan carlos rojas alba\r\nprofesion: ingeniero de sistemas \r\nexperiencia laboral:12 años\r\npretencion salarial:3000 bs\r\nuniversidad :uagrm 2019\r\ncolegio :la salle\r\ncursos realizados: cursos avanzados de programacion\r\ningles :avanzado\r\nconocimiento extra: manejo de servidores \r\naptitudes: responsable adaptable  y trabajo bajo presion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_vida`
--

CREATE TABLE `hoja_de_vida` (
  `idhojavida` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `hoja_de_vida`
--

INSERT INTO `hoja_de_vida` (`idhojavida`, `fechaRegistro`, `descripcion`, `condicion`) VALUES
(1, '2018-03-08', 'dkmfkdskmkfklfkfnjknfjknf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idnotificacion` int(11) NOT NULL,
  `idpostulante` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`idnotificacion`, `idpostulante`, `descripcion`, `correo`, `condicion`) VALUES
(1, 1, 'Necesita traer sus documentos originales para su entrevista', 'lorenamichel_2012@hotmail.com', 1),
(2, 2, 'Se solicita traer sus documentos', 'mariana@gmail.com', 1),
(3, 3, 'Falta su hoja de vida', 'mauricio@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Almacen'),
(3, 'Compras'),
(4, 'Ventas'),
(5, 'Acceso'),
(6, 'Consulta Compras'),
(7, 'Consulta Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `condicion`) VALUES
(2, 'empleado', 'willian rojas alba', 'CEDULA', '79430522', 'av radial 13', '61599811', 'willianrojasa@gmail.com', 1),
(3, 'evaluador', 'juan carlos rojas alba', 'DNI', '57656', 'radial 13, 4 to anillo', '61588040', 'carlosmedicina3@gmail.com', 0),
(4, 'postulante', 'osmar delgadillo rojas alba', 'CEDULA', '76557756', 'av marcelo dias', '76177755', 'osmar@gmail.com', 1),
(5, 'postulante', 'neysa delgadillo moreno', 'CEDULA', '233423', 'av principal', '7156667', 'nes@gmail.com', 1),
(6, 'postulante', 'daniela saldias lapace', 'CEDULA', '32343244', 'av martines calle 3', '6556577', '', 1),
(7, 'postulante', 'leo guzmas', 'CEDULA', '6212068', 'av radial 13', '67780800', 'leonardo@gmail.com', 1),
(8, 'postulante', 'julio m', 'CEDULA', '752564', 'santos domunt', '6156555', 'mikicho_za@hotmail.com', 1),
(9, 'postulante', 'Lorena Ponce Yepez', 'ci', '23233233', 'av 5to anillo', '2442424244', 'lorena@gmail.com', 1),
(10, 'postulante', 'alejandra vaca flores', 'ci', '9794192', 'los lotes', '69012935', 'alejandravaca@gmail.com', 1),
(11, 'postulante', 'antonio hurtado roca', 'carnet', '58554466', 'los cusis', '65225545', 'antonio@gmail.com', 1),
(12, 'evaluador', 'reyes ponce yepez', 'carnet', '6522554', 'la colorada', '5545555', 'reyes@gmail.com', 1),
(13, 'evaluador', 'salvatieraa lopez', 'carnet', '61555885', 'los cusis', '651155', 'salvatierra@gmail.com', 1),
(14, 'empleado', 'jose marcos ponce martinez', 'carnet', '6155588', 'av los pozos 3334', '62544555', 'jose@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `idpostulante` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `cargo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`idpostulante`, `idpersona`, `codigo`, `cargo`, `condicion`) VALUES
(1, 4, 101, 'sistemas', 1),
(2, 5, 2, 'informatica', 1),
(3, 6, 3, 'soporte informatico', 1),
(4, 7, 4, 'secretaria', 1),
(5, 8, 5, 'administracion', 1),
(6, 9, 2, 'informatica', 1),
(7, 10, 101, 'sistemas', 1),
(8, 11, 4, 'secretaria', 1),
(9, 11, 101, 'sistemas', 1),
(10, 11, 1212, 'limpieza', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'admin', 'Se encargara de administrar todo el sistema', 1),
(2, 'encargado del sistema', 'Se encargara de administrar la parte de usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccion`
--

CREATE TABLE `seleccion` (
  `codigo` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `cargo`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'admin', 'DNI', '47715777', 'administrador', '61599811', 'willianrojasa@gmail.com', 'ADMINISTRADOR', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1487132068.jpg', 1),
(6, 'juan carlos rojas alba', 'DNI', '333333333', 'radial 13, 4 to anillo', '61588040', 'willianrojasa@gmail.com', '', 'cajero', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1548613497.jpg', 1),
(7, 'lorena', 'CEDULA', '234324', '', '', 'lorena@gmail.com', 'gerente', 'lorena', '2bed7dfed277df864e5843e57f8ae14e38198053648a141dead0b7b1ce7307e5', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(103, 1, 1),
(104, 1, 2),
(105, 1, 3),
(106, 1, 4),
(107, 1, 5),
(108, 1, 6),
(109, 1, 7),
(129, 6, 1),
(130, 6, 2),
(131, 6, 3),
(132, 6, 4),
(133, 6, 6),
(134, 6, 7),
(135, 7, 1),
(136, 7, 2),
(137, 7, 3),
(138, 7, 4),
(139, 7, 5),
(140, 7, 6),
(141, 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacante`
--

CREATE TABLE `vacante` (
  `idvacante` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total_venta` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idcliente`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total_venta`, `estado`) VALUES
(1, 2, 1, 'Ticket', '', '61599811', '2019-01-18 00:00:00', '0.00', '11.00', 'Aceptado'),
(2, 4, 1, 'Ticket', '2', '1', '2019-01-18 00:00:00', '0.00', '11.00', 'Aceptado'),
(3, 4, 1, 'Boleta', '', '1', '2019-01-18 00:00:00', '0.00', '7.00', 'Aceptado'),
(4, 2, 1, 'Ticket', '', '', '2019-01-18 00:00:00', '0.00', '190.00', 'Aceptado'),
(5, 2, 1, 'Boleta', '', '', '2019-01-18 00:00:00', '0.00', '50.00', 'Aceptado'),
(6, 2, 1, 'Boleta', '', '', '2019-01-18 00:00:00', '15.00', '100.00', 'Aceptado'),
(7, 2, 1, 'Factura', '', '', '2019-01-18 00:00:00', '14.00', '150.00', 'Aceptado'),
(8, 2, 1, 'Factura', '', '', '2019-01-18 00:00:00', '14.00', '24.00', 'Aceptado'),
(9, 2, 1, 'Factura', '', '120222222', '2019-01-18 00:00:00', '12.00', '43.00', 'Aceptado'),
(10, 2, 1, 'Ticket', '', '', '2019-01-18 00:00:00', '0.00', '24.00', 'Aceptado'),
(11, 6, 1, 'Factura', '', '', '2019-01-18 00:00:00', '0.00', '29.00', 'Aceptado'),
(12, 4, 1, 'Ticket', '', '', '2019-01-26 00:00:00', '0.00', '24.00', 'Aceptado'),
(13, 4, 1, 'Factura', '', '', '2019-01-26 00:00:00', '0.00', '43.00', 'Anulado'),
(14, 4, 1, 'Factura', '', '', '2019-01-26 00:00:00', '20.00', '25.00', 'Anulado'),
(15, 4, 1, 'Ticket', '', '', '2019-01-26 00:00:00', '0.00', '10.00', 'Aceptado'),
(16, 6, 6, 'Ticket', '', '', '2019-01-27 00:00:00', '0.00', '2.00', 'Aceptado'),
(17, 5, 1, 'Ticket', '', '', '2019-01-27 00:00:00', '0.00', '57.00', 'Aceptado'),
(18, 2, 6, 'Ticket', '', '', '2019-01-28 00:00:00', '0.00', '2.00', 'Aceptado'),
(19, 2, 6, 'Ticket', '', '', '2019-02-02 00:00:00', '0.00', '770.00', 'Aceptado'),
(20, 2, 6, 'Ticket', '', '', '2019-02-02 00:00:00', '0.00', '1500.00', 'Aceptado'),
(21, 8, 6, 'Ticket', '', '', '2019-02-02 00:00:00', '0.00', '200.00', 'Aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificar`
--

CREATE TABLE `verificar` (
  `idverificar` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `identrevista` int(11) NOT NULL,
  `idformulario` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `verificar`
--

INSERT INTO `verificar` (`idverificar`, `idusuario`, `identrevista`, `idformulario`, `descripcion`, `fecha`, `condicion`) VALUES
(1, 1, 2, 2, 'fdfkdjfffffssssssssssssss', '2019-04-02', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`idcandidato`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`idconvocatoria`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `detallecv`
--
ALTER TABLE `detallecv`
  ADD PRIMARY KEY (`iddetallecv`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `evaluador`
--
ALTER TABLE `evaluador`
  ADD PRIMARY KEY (`idevaluador`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `iddepartamento` (`iddepartamento`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`idformulario`);

--
-- Indices de la tabla `hoja_de_vida`
--
ALTER TABLE `hoja_de_vida`
  ADD PRIMARY KEY (`idhojavida`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idnotificacion`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`idpostulante`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permiso_idx` (`idpermiso`),
  ADD KEY `fk_usuario_permiso_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `vacante`
--
ALTER TABLE `vacante`
  ADD PRIMARY KEY (`idvacante`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_persona_idx` (`idcliente`),
  ADD KEY `fk_venta_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `verificar`
--
ALTER TABLE `verificar`
  ADD PRIMARY KEY (`idverificar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidato`
--
ALTER TABLE `candidato`
  MODIFY `idcandidato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  MODIFY `idconvocatoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detallecv`
--
ALTER TABLE `detallecv`
  MODIFY `iddetallecv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `evaluador`
--
ALTER TABLE `evaluador`
  MODIFY `idevaluador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `idformulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `hoja_de_vida`
--
ALTER TABLE `hoja_de_vida`
  MODIFY `idhojavida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `idpostulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de la tabla `vacante`
--
ALTER TABLE `vacante`
  MODIFY `idvacante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `verificar`
--
ALTER TABLE `verificar`
  MODIFY `idverificar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evaluador`
--
ALTER TABLE `evaluador`
  ADD CONSTRAINT `evaluador_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `evaluador_ibfk_2` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`);

--
-- Filtros para la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD CONSTRAINT `postulante_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permiso` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_persona` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
