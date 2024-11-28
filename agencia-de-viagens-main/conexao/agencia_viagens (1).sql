-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 08:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agencia_viagens`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `user_type`) VALUES
(1, 'Admin', 'admin@exemplo.com', '12345', 'admin'),
(2, 'Lucas sol Henrique Jacques de Oliveira', 'teste@gmail.com', '$2y$10$XPfgtLqlWFxcZV.P64SklO.GsYkR9OYXqVTMNeeldL0rXwvf6iH76', 'user'),
(3, 'Lucas sol Henrique Jacques de Oliveira', 'te1ste@gmail.com', '$2y$10$4MstDBCQwS4pmLatIJ5SI.X7Prpgj.OWOJQ0jKUwroIRMCo/fcK5y', ''),
(4, 'João', 'Joao@a.com', '$2y$10$FzjMt33/0EomJ8HGi/BOhe/geTXp.w7wcc4QSMsfvx6AJdtX2kjMC', 'user'),
(5, 'ADM', 'Admin1@gmail.com', '$2y$10$5RifXPuv7JG9AR4opE4EfOY2UBDVfUx9jEoPBQXfHuqqe7cz7IuUG', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
