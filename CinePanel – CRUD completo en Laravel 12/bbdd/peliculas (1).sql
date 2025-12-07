-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2025 a las 11:15:32
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
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre`) VALUES
(1, 'Acción'),
(2, 'Comedia'),
(3, 'Terror'),
(4, 'Aventura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idpelis` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `año` year(4) NOT NULL,
  `sinopsis` varchar(300) NOT NULL,
  `portada` varchar(100) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp(),
  `idcategoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idpelis`, `titulo`, `direccion`, `año`, `sinopsis`, `portada`, `fecha_alta`, `idcategoria`) VALUES
(1, 'Misión Explosiva', 'John Matrix', '2021', 'Un agente especial debe desactivar una amenaza global.', 'mision.jpg', '2025-12-01 12:20:38', 1),
(2, 'Rescate Extremo', 'Jane Carter', '2022', 'Un comando élite en una operación suicida.', 'rescate.jpg', '2025-12-01 12:20:38', 1),
(3, 'Risas de Oficina', 'Tom Humor', '2020', 'Una serie de enredos en una empresa disfuncional.', 'risas.jpg', '2025-12-01 12:20:38', 2),
(4, 'Vacaciones Locas', 'Lola Funny', '2023', 'Unas vacaciones que se salen completamente de control.', 'vacaciones.jpg', '2025-12-01 12:20:38', 2),
(5, 'El Último Invierno', 'Carlos Nieve', '2021', 'Una historia sobre amor y pérdida en tiempos difíciles.', 'ultimo.jpg', '2025-12-01 12:20:38', 3),
(6, 'Caminos Cruzados', 'Ana Trama', '2019', 'Dos vidas unidas por el destino.', 'camino-cruzado.jpg', '2025-12-01 12:20:38', 3),
(7, 'Neón Galáctico', 'Zoe Future', '2025', 'Una batalla interestelar por la supervivencia.', 'neo.jpg', '2025-12-01 12:20:38', 4),
(8, 'Código Cuántico', 'Max Quantum', '2024', 'Un hacker viaja entre dimensiones.', 'codigo.jpg', '2025-12-01 12:20:38', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$2HLF0l2S.dgCwtsam78u4OVPcvSqXE7LnsZU4k61Zv4EnYlXfgQtu', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `categorias_idcategoria_unique` (`idcategoria`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idpelis`),
  ADD UNIQUE KEY `peliculas_idpelis_unique` (`idpelis`),
  ADD KEY `peliculas_idcategoria_foreign` (`idcategoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idpelis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
