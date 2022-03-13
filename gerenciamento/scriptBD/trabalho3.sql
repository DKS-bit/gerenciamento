-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Mar-2022 às 22:50
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
  `nomeCliente` varchar(255) NOT NULL DEFAULT 'Sem nome',
  `dtNascCliente` date NOT NULL DEFAULT '1970-01-01',
  `cpfCliente` decimal(11,0) UNSIGNED ZEROFILL NOT NULL,
  `rgCliente` varchar(15) NOT NULL DEFAULT '',
  `telefoneCliente` decimal(13,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`nomeCliente`, `dtNascCliente`, `cpfCliente`, `rgCliente`, `telefoneCliente`) VALUES
('Miguelito', '2001-01-01', '10395153042', '84477', '971516789'),
('Luciana', '1970-02-12', '40810998041', '4693', '46931425'),
('Morty', '2005-05-05', '45149633801', '2132132214', '11947474540');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecocliente`
--

CREATE TABLE `enderecocliente` (
  `idEndereco` int(11) NOT NULL,
  `cpfCliente` decimal(11,0) NOT NULL,
  `lougradouroEndereco` varchar(32) NOT NULL,
  `bairroEndereco` varchar(32) NOT NULL,
  `cidadeEndereco` varchar(128) NOT NULL,
  `ufEndereco` varchar(2) NOT NULL,
  `complementoEndereco` varchar(32) NOT NULL,
  `referenciaEndereco` varchar(128) NOT NULL,
  `cepEndereco` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `enderecocliente`
--

INSERT INTO `enderecocliente` (`idEndereco`, `cpfCliente`, `lougradouroEndereco`, `bairroEndereco`, `cidadeEndereco`, `ufEndereco`, `complementoEndereco`, `referenciaEndereco`, `cepEndereco`) VALUES
(3, '45149633801', 'Castro Alves', 'Planalto', 'Lagarto', 'SP', 'Galeria 9', ' Posto', '8900000'),
(4, '45149633801', 'Joao Silva', 'Morrao', 'Lima', 'RJ', 'Nole 9', 'Dogao', '870000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `username`, `password`) VALUES
(1, 'username', 'senha'),
(2, 'dks', '123'),
(4, 'usuario', 'password');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpfCliente`);

--
-- Índices para tabela `enderecocliente`
--
ALTER TABLE `enderecocliente`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `cpfCliente` (`cpfCliente`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enderecocliente`
--
ALTER TABLE `enderecocliente`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
