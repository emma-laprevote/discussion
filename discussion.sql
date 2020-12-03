-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2020 at 11:46 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discussion`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(140) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_utilisateur`, `date`) VALUES
(1, 'Salut tout le monde, je cherche un bon spot aux alentours de Marseille, quelqu\'un à une petite idée?', 1, '2020-12-02'),
(4, 'Salut, tu peux aller voir au niveau de Vaufrèges, il y\'a souvent du monde, mais le spot est immense ! ', 2, '2020-12-02'),
(5, 'Si t\'as pas froid aux yeux, essaye de voir au niveau des usines désaffectées...', 2, '2020-12-02'),
(6, 'Yo, des filles motivées pour monter un crew?', 3, '2020-12-02'),
(7, 'Moi ça va tente bien! :) Je te rejoins en privée ! ', 4, '2020-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `avatar`) VALUES
(1, 'Emka', '$2y$10$0B1G/Z8HGcDqE9yxVCObS./aawuzSLQrgz1m6BJVkcFrlCPjO4eje', '1.jpg'),
(2, 'VonOtto', '$2y$10$jFKmHLzGOq9//40SwBVmIOVD71E0/aovmyFYay5JcZfWe7q9xbEl.', '2.jpg'),
(3, 'Luda13', '$2y$10$F2q8sOoYJNqxfPbU/6Cyg.KxuXrKT7D3G37Wh5yflwKbo9d7ECMAG', '3.jpg'),
(4, 'Lisakikine', '$2y$10$g7cf.Xh6D79dJH/j/EYRm.ct0wRUurcxqIuVft6okYKo8NHLcNstq', '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
