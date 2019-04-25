-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Abr-2019 às 19:55
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

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

CREATE TABLE `tbclientes` (
  `CLI_ID` int(11) NOT NULL,
  `CLI_CPF` varchar(14) DEFAULT NULL,
  `CLI_NOME` varchar(50) DEFAULT NULL,
  `CLI_TEL` varchar(16) DEFAULT NULL,
  `CLI_DATA` varchar(20) DEFAULT NULL,
  `CLI_BAIRRO` varchar(40) DEFAULT NULL,
  `CLI_CIDADE` varchar(40) DEFAULT NULL,
  `CLI_ENDERECO` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprodutos`
--

CREATE TABLE `tbprodutos` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_NOME` varchar(50) NOT NULL,
  `PRO_QTD` varchar(10) NOT NULL,
  `PRO_VAL_CUSTO` varchar(10) NOT NULL,
  `PRO_VAL_VENDA` varchar(10) NOT NULL,
  `PRO_ATIVO` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbprodutos`
--

INSERT INTO `tbprodutos` (`PRO_ID`, `PRO_NOME`, `PRO_QTD`, `PRO_VAL_CUSTO`, `PRO_VAL_VENDA`, `PRO_ATIVO`) VALUES
(57, 'CERVEJA', '10', '1', '1', NULL),
(58, 'PÃ£o', '100', '0,3', '0,6', NULL),
(59, 'PORÃ‡ÃƒO DE BATATA COM QUEIJO E BACON', '30', '10', '10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuarios`
--

CREATE TABLE `tbusuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuarios`
--

INSERT INTO `tbusuarios` (`id`, `login`, `nome`, `email`, `senha`, `nivel`, `deleted`) VALUES
(1, 'admin', 'Administrador do Sistemas', 'adminsitradores@gmail.com', 'ee10c315eba2c75b403ea99136f5b48d', 1, NULL),
(4, 'Douglas', 'Douglas', 'teste@gmail.com', 'e358efa489f58062f10dd7316b65649e', 2, NULL),
(5, 'a', 't', 'teste@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 2, 1),
(6, 'asdas', 'teste', 'dsa@dsadas', 'c99a11a53a3748269e3f86d7ac38df11', 2, 1),
(7, 'dsadas', 'dsadas', 'das@das', 'c99a11a53a3748269e3f86d7ac38df11', 2, 1),
(8, 'asdas', 'dsad', 'asdasda@asda', '8f4031bfc7640c5f267b11b6fe0c2507', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD PRIMARY KEY (`CLI_ID`);

--
-- Indexes for table `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- Indexes for table `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `CLI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbprodutos`
--
ALTER TABLE `tbprodutos`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbusuarios`
--
ALTER TABLE `tbusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
