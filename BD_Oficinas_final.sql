-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Out-2018 às 14:17
-- Versão do servidor: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oficinas`
--
CREATE DATABASE IF NOT EXISTS `oficinas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oficinas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
`codigo` int(11) NOT NULL,
  `rua` varchar(500) NOT NULL,
  `numero` int(11) NOT NULL,
  `cidade` varchar(5000) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `FK_hospital_cnpj` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `geocoding`
--

DROP TABLE IF EXISTS `geocoding`;
CREATE TABLE IF NOT EXISTS `geocoding` (
  `address` varchar(255) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `cnpj` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` char(5) NOT NULL,
  `idade` int(11) NOT NULL,
  `FK_hospital_cnpj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
 ADD PRIMARY KEY (`codigo`), ADD KEY `FK_hospital_cnpj` (`FK_hospital_cnpj`);

--
-- Indexes for table `geocoding`
--
ALTER TABLE `geocoding`
 ADD PRIMARY KEY (`address`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
 ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
 ADD PRIMARY KEY (`cpf`), ADD KEY `FK_hospital_cnpj` (`FK_hospital_cnpj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`FK_hospital_cnpj`) REFERENCES `hospital` (`cnpj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`FK_hospital_cnpj`) REFERENCES `hospital` (`cnpj`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
