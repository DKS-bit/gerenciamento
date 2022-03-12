-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Mar-2022 às 21:28
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(255) NOT NULL DEFAULT 'Sem nome',
  `dtNascCliente` date NOT NULL DEFAULT '1970-01-01',
  `cpfCliente` decimal(11,0) UNSIGNED ZEROFILL UNIQUE NOT NULL,
  `rgCliente` varchar(15) NOT NULL DEFAULT UNIQUE '',
  `telefoneCliente` decimal(13,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecocliente`
--

CREATE TABLE `enderecocliente` (
  `idEndereco` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `lougradouroEndereco` varchar(255) NOT NULL,
  `bairroEndereco` varchar(32) NOT NULL DEFAULT 'São José do Vale do Rio Preto',
  `cidadeEndereco` varchar(32) NOT NULL,
  `ufEndereco` varchar(2) NOT NULL,
  `complementoEndereco` varchar(255) NOT NULL,
  `referenciaEndereco` varchar(255) NOT NULL,
  `cepEndereco` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `enderecocliente`
--
ALTER TABLE `enderecocliente`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `fk_enderecocliente_idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `enderecocliente`
--
ALTER TABLE `enderecocliente`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `enderecocliente`
--
ALTER TABLE `enderecocliente`
  ADD CONSTRAINT `fk_enderecocliente_idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
