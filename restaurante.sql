-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18-Abr-2019 às 16:23
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbclientes`
--

DROP TABLE IF EXISTS `tbclientes`;
CREATE TABLE IF NOT EXISTS `tbclientes` (
  `CLI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLI_CPF` varchar(15) DEFAULT NULL,
  `CLI_NOME` varchar(50) DEFAULT NULL,
  `CLI_TEL` int(11) DEFAULT NULL,
  `CLI_DATA` varchar(20) DEFAULT NULL,
  `CLI_BAIRRO` varchar(40) DEFAULT NULL,
  `CLI_CIDADE` varchar(40) DEFAULT NULL,
  `CLI_ENDERECO` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`CLI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprodutos`
--

DROP TABLE IF EXISTS `tbprodutos`;
CREATE TABLE IF NOT EXISTS `tbprodutos` (
  `PRO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_NOME` varchar(50) NOT NULL,
  `PRO_QTD` varchar(10) NOT NULL,
  `PRO_VAL_CUSTO` varchar(10) NOT NULL,
  `PRO_VAL_VENDA` varchar(10) NOT NULL,
  `PRO_ATIVO` int(2) DEFAULT NULL,
  PRIMARY KEY (`PRO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbprodutos`
--

INSERT INTO `tbprodutos` (`PRO_ID`, `PRO_NOME`, `PRO_QTD`, `PRO_VAL_CUSTO`, `PRO_VAL_VENDA`, `PRO_ATIVO`) VALUES
(4, 'DOUGLAS', '1', '0', '0,5', 1),
(5, 'VODKA', '2', '4', '5', 1),
(6, 'daniel', '1', '3', '4', 1),
(7, 'daniel2', '21', '1', '1', 1),
(8, 'dsadas', '12', '1', '12', 1),
(9, 'teste', '12', '12', '12', 1),
(10, 'a', '1', '1', '1', 1),
(11, 'testee', '11', '1', '1', 1),
(12, 'console', '12', '1', '1', 1),
(13, 'teste', '3', '3', '3', 1),
(14, 'afdf', '1', '1', '1', 1),
(15, 'CERVEJA', '1', '1', '1', NULL),
(16, 'VODKA', '10', '1', '1', 1),
(17, 'WISKY', '1', '1', '1', NULL),
(18, 'ENERGETICO', '1', '1', '1', NULL),
(19, 'teste', '1', '1', '1', NULL),
(20, 'tftftf', '1', '1', '1', NULL),
(21, 'tftftf', '1', '1', '1', NULL),
(22, 'tf', '1', '1', '1', NULL),
(23, 'dsa', '1', '1', '1', NULL),
(24, 'dsa', '1', '1', '1', NULL),
(25, 'a', '1', '2', '3', NULL),
(26, '3', '1', '4', '5', NULL),
(27, '3', '4', '5', '6', NULL),
(28, '3', '4', '5', '6', NULL),
(29, 'ff', '2', '3', '4', NULL),
(30, 'ff', '2', '3', '4', NULL),
(31, 'fffff', '123', '123', '123', NULL),
(32, 'asadsa', '1', '2', '3', NULL),
(33, 'asadsa', '1', '2', '3', NULL),
(34, 'asadsa', '1', '2', '3', NULL),
(35, 'asadsa', '1', '2', '3', NULL),
(36, 'sadasd', '1', '2', '3', NULL),
(37, 'ssdsd', '', 'dssd', 'sdds', NULL),
(38, 'ddddddddd', '12', '12', '12', NULL),
(39, 'ddd', '', '12', '1', NULL),
(40, 'wqewe', '2', 'a', '2', NULL),
(41, 'aaa', '', 'sd', 'sd', NULL),
(42, 'aaa', '12', '123', '32', 1),
(43, 'gfgf', '', '2', '3', 1),
(44, 'teste23', '12', '12', '12', NULL),
(45, '123', '', 'wqe', 'wqe', NULL),
(46, 'ddsfd', '', 'dgfd', 'dgdgf', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE IF NOT EXISTS `tbusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuarios`
--

INSERT INTO `tbusuarios` (`id`, `login`, `nome`, `email`, `senha`, `nivel`, `deleted`) VALUES
(1, 'admin', 'Administrador do Sistema', 'adminsitrador@gmail.com', 'ee10c315eba2c75b403ea99136f5b48d', 1, NULL),
(4, 'Viado', 'Douglas', 'teste@gmail.com', 'e358efa489f58062f10dd7316b65649e', 2, NULL),
(5, 'a', 't', 'teste@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 2, 1),
(6, 'asdas', 'teste', 'dsa@dsadas', 'c99a11a53a3748269e3f86d7ac38df11', 2, 1),
(7, 'dsadas', 'dsadas', 'das@das', 'c99a11a53a3748269e3f86d7ac38df11', 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
