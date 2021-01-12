-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jan-2021 às 03:26
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `xyz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Computer'),
(2, 'Mobile Phone'),
(3, 'Smartphone');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dbuser`
--

CREATE TABLE `dbuser` (
  `dbuser_id` int(11) NOT NULL,
  `dbuser_name` varchar(50) DEFAULT NULL,
  `dbuser_password` varchar(50) DEFAULT NULL,
  `dbuser_employee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dbuser`
--

INSERT INTO `dbuser` (`dbuser_id`, `dbuser_name`, `dbuser_password`, `dbuser_employee`) VALUES
(1, 'aalves', '202cb962ac59075b964b07152d234b70', 1),
(2, 'ccastanheira', '900150983cd24fb0d6963f7d28e17f72', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Sales'),
(2, 'IT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `employee_phone` int(9) DEFAULT NULL,
  `employee_department` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_phone`, `employee_department`) VALUES
(1, 'Antonio Alves', 912345678, 1),
(2, 'Barbara Borges', 962233445, 1),
(3, 'Carla Castanheira', 933476098, 2),
(4, 'Dinis Damas', 926765234, 2),
(5, 'Elsa Eira', 969384750, 1),
(6, 'Frederico Fortuna', 928473920, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipment`
--

CREATE TABLE `equipment` (
  `equipment_id` int(11) NOT NULL,
  `equipment_reference` char(8) DEFAULT NULL,
  `equipment_category` int(11) DEFAULT NULL,
  `equipment_employee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `equipment_reference`, `equipment_category`, `equipment_employee`) VALUES
(1, 'PC111111', 1, 1),
(2, 'TS222221', 2, 1),
(3, 'PC111112', 1, 2),
(4, 'TS222223', 2, 2),
(5, 'PC111113', 1, 3),
(6, 'SP333331', 3, 3),
(7, 'PC111114', 1, 4),
(8, 'SP333332', 3, 4),
(9, 'PC111115', 1, 5),
(10, 'TS222222', 2, 6),
(11, 'PC111116', 1, 6),
(12, 'SP333333', 3, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `observation`
--

CREATE TABLE `observation` (
  `observation_id` int(11) NOT NULL,
  `observation_equipment` int(11) DEFAULT NULL,
  `observation_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `observation`
--

INSERT INTO `observation` (`observation_id`, `observation_equipment`, `observation_content`) VALUES
(1, 2, '3 key not working'),
(2, 4, 'Free calls'),
(3, 6, 'Android'),
(4, 7, 'Linux'),
(5, 11, 'OSX'),
(6, 12, 'iPhone');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Índices para tabela `dbuser`
--
ALTER TABLE `dbuser`
  ADD PRIMARY KEY (`dbuser_id`),
  ADD KEY `dbuser_employee` (`dbuser_employee`);

--
-- Índices para tabela `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Índices para tabela `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee_department` (`employee_department`);

--
-- Índices para tabela `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`),
  ADD KEY `equipment_category` (`equipment_category`),
  ADD KEY `equipment_employee` (`equipment_employee`);

--
-- Índices para tabela `observation`
--
ALTER TABLE `observation`
  ADD PRIMARY KEY (`observation_id`),
  ADD KEY `observation_equipment` (`observation_equipment`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `dbuser`
--
ALTER TABLE `dbuser`
  MODIFY `dbuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `observation`
--
ALTER TABLE `observation`
  MODIFY `observation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dbuser`
--
ALTER TABLE `dbuser`
  ADD CONSTRAINT `dbuser_ibfk_1` FOREIGN KEY (`dbuser_employee`) REFERENCES `employee` (`employee_id`);

--
-- Limitadores para a tabela `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`employee_department`) REFERENCES `department` (`department_id`);

--
-- Limitadores para a tabela `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`equipment_category`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`equipment_employee`) REFERENCES `employee` (`employee_id`);

--
-- Limitadores para a tabela `observation`
--
ALTER TABLE `observation`
  ADD CONSTRAINT `observation_ibfk_1` FOREIGN KEY (`observation_equipment`) REFERENCES `equipment` (`equipment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
