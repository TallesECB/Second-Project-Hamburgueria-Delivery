-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/06/2019 às 13:49
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `carcodig` int(11) NOT NULL,
  `clicodig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `carrinho`
--

INSERT INTO `carrinho` (`carcodig`, `clicodig`) VALUES
(31, 1),
(32, 1),
(33, 2),
(34, 1),
(35, 1),
(36, 1);
-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `catcodig` int(11) NOT NULL,
  `catdescr` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`catcodig`, `catdescr`) VALUES
(1, 'Hamburguers'),
(2, 'Refrigerantes'),
(3, 'Aperitivos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `clicodig` int(11) NOT NULL,
  `clinome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cliemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clisenha` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `clientes`
--

INSERT INTO `clientes` (`clicodig`, `clinome`, `cliemail`, `clisenha`) VALUES
(1, 'João', '', ''),
(2, 'Maria', '', ''),
(3, 'Talles', 'talles@gmail.com', '1234');

-- --------------------------------------------------------



--
-- Estrutura para tabela `itensCarrinho`
--

CREATE TABLE `itensCarrinho` (
  `procodig` int(11) NOT NULL,
  `itequant` int(11) NOT NULL,
  `carcodig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `itensCarrinho`
--

INSERT INTO `itensCarrinho` (`procodig`, `itequant`, `carcodig`) VALUES
(54, 1, 31),
(53, 1, 31),
(54, 1, 32),
(31, 1, 32),
(29, 1, 32),
(49, 1, 32),
(52, 1, 32),
(53, 1, 32),
(29, 1, 33),
(31, 2, 33),
(28, 10, 33),
(28, 1, 34),
(29, 1, 34),
(28, 1, 35),
(29, 1, 35),
(31, 1, 35),
(49, 1, 35),
(52, 1, 35),
(53, 1, 35),
(54, 1, 35),
(54, 1, 36),
(49, 1, 36),
(31, 1, 36),
(28, 1, 36),
(29, 1, 36),
(52, 1, 36);


--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `procodig` int(11) NOT NULL,
  `pronome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prodesc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `procateg` int(11) NOT NULL,
  `propreco` decimal(10,2) NOT NULL,
  `proimg` varchar(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`procodig`, `pronome`, `prodesc`, `procateg`, `propreco`, `proimg`) VALUES
(28, 'Coca-Cola', 'Coca-cola', 2, '5.40', '564x/82/98/3f/82983f620eab10dd9a1c71123a449190.jpg'),
(29, 'Sabonete', 'Lux', 1, '2.00', '564x/82/98/3f/82983f620eab10dd9a1c71123a449190.jpg'),
(31, 'Sprite', 'Coca-Cola', 2, '4.23', '564x/82/98/3f/82983f620eab10dd9a1c71123a449190.jpg'),
(49, 'Coca-Cola', 'Coca-cola', 2, '0.00', '564x/82/98/3f/82983f620eab10dd9a1c71123a449190.jpg'),
(52, 'Sprite', 'Coca-Cola2', 1, '0.00', '564x/82/98/3f/82983f620eab10dd9a1c71123a449190.jpg'),
(53, 'Escovadentes', 'Kolinos', 1, '0.00', '564x/82/98/3f/82983f620eab10dd9a1c71123a449190.jpg'),
(54, 'Macarrao', 'Isabela', 3, '6.20', '564x/82/98/3f/82983f620eab10dd9a1c71123a449190.jpg');


--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`carcodig`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`catcodig`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clicodig`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`procodig`),
  ADD KEY `prodcat` (`procateg`);
--
-- AUTO_INCREMENT de tabelas apagadas
--


--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `carcodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `catcodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clicodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `procodig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `prodcat` FOREIGN KEY (`procateg`) REFERENCES `categorias` (`catcodig`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
