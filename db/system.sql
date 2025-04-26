-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/04/2025 às 19:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `system`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `camisa`
--

CREATE TABLE `camisa` (
  `id_produto` int(11) NOT NULL,
  `tipo_gola` varchar(50) DEFAULT NULL,
  `tipo_manga` varchar(50) DEFAULT NULL,
  `tecido` varchar(50) DEFAULT NULL,
  `possui_bolsos` tinyint(1) DEFAULT NULL,
  `estampa_personalizada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(3, 'jogos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogo_cartas`
--

CREATE TABLE `jogo_cartas` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `tipo_baralho` varchar(50) DEFAULT NULL,
  `tamanho_cartas` varchar(20) DEFAULT NULL,
  `material_cartas` varchar(50) DEFAULT NULL,
  `tipo_jogo` varchar(50) DEFAULT NULL,
  `numero_cartas` int(11) DEFAULT NULL,
  `ilustrado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogo_cartas`
--

INSERT INTO `jogo_cartas` (`id`, `id_produto`, `tipo_baralho`, `tamanho_cartas`, `material_cartas`, `tipo_jogo`, `numero_cartas`, `ilustrado`) VALUES
(1, 20, '432', '432', '432', '432', 431, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogo_tabuleiro`
--

CREATE TABLE `jogo_tabuleiro` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd_pecas` int(11) DEFAULT NULL,
  `tamanho_tabuleiro` varchar(50) DEFAULT NULL,
  `material_tabuleiro` varchar(50) DEFAULT NULL,
  `tipo_tabuleiro` varchar(50) DEFAULT NULL,
  `complexidade` varchar(30) DEFAULT NULL,
  `possui_cartas` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogo_tabuleiro`
--

INSERT INTO `jogo_tabuleiro` (`id`, `id_produto`, `qtd_pecas`, `tamanho_tabuleiro`, `material_tabuleiro`, `tipo_tabuleiro`, `complexidade`, `possui_cartas`) VALUES
(1, 21, 321, '321', '321', '21', '321', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `moletom`
--

CREATE TABLE `moletom` (
  `id_produto` int(11) NOT NULL,
  `tipo_capuz` tinyint(1) DEFAULT NULL,
  `espessura_tecido` varchar(30) DEFAULT NULL,
  `material_forro` varchar(50) DEFAULT NULL,
  `possui_zíper` tinyint(1) DEFAULT NULL,
  `resistente_agua` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `unidades` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `fornecedor` varchar(100) DEFAULT NULL,
  `transportadora` varchar(100) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `imagem`, `preco`, `desconto`, `unidades`, `descricao`, `fornecedor`, `transportadora`, `id_categoria`) VALUES
(18, 'teste-categoria', '../../assets/images/products_db/Abada05.png', 123.00, NULL, 123, '123', '123', '112', 3),
(19, 'categoria oae', '../../assets/images/products_db/Abada10.png', 123.00, NULL, 123, '123', '123', '123', 3),
(20, 'VAIAGORAA', '../../assets/images/products_db/Abada11.png', 432.00, NULL, 432, '432', '432', '432', 3),
(21, 'TESTETABULEIRO', '../../assets/images/products_db/Axé02.png', 321.00, NULL, 321, '321', '321', '321', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_jogo`
--

CREATE TABLE `produto_jogo` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `tema` varchar(100) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `qtd_pessoas` int(11) DEFAULT NULL,
  `classificacao_indicativa` varchar(10) DEFAULT NULL,
  `duracao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto_jogo`
--

INSERT INTO `produto_jogo` (`id`, `id_produto`, `tema`, `genero`, `qtd_pessoas`, `classificacao_indicativa`, `duracao`) VALUES
(9, 18, '123', '123', 123, '123', '123'),
(10, 19, '321', '321', 12, '321', '123'),
(11, 20, '432', '432', 432, '432', '432'),
(12, 21, '321', '321', 321, '231', '321');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_roupa`
--

CREATE TABLE `produto_roupa` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `tamanho` varchar(10) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `dimensoes` varchar(50) DEFAULT NULL,
  `numero_modelo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `numero_telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo_usuario` enum('pessoa fisica','admin') NOT NULL,
  `data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `numero_telefone`, `email`, `usuario`, `senha`, `tipo_usuario`, `data_criacao`) VALUES
(18, 'Davi Valetins de Sousa', '68992123961', 'davivalentns@gmail.com', 'davivalentinn', '$2y$10$RO21HGEFWw42zYMRXUIZEeBnn9vwHSLFF.E8TQBWWFnGbmoLcdk.m', 'pessoa fisica', '2025-04-19 14:55:28'),
(19, 'admin', '098423908', 'admin@gmail.com', 'admin', '$2y$10$3uuKwBNLwGC/eXVv3qwb/.ES3uZgpLvMQb4AOZxT8vbFJ7RC9SsTi', 'admin', '2025-04-24 07:24:28');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `camisa`
--
ALTER TABLE `camisa`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `jogo_cartas`
--
ALTER TABLE `jogo_cartas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jogo_cartas_produto` (`id_produto`);

--
-- Índices de tabela `jogo_tabuleiro`
--
ALTER TABLE `jogo_tabuleiro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jogo_tabuleiro_produto` (`id_produto`);

--
-- Índices de tabela `moletom`
--
ALTER TABLE `moletom`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `produto_jogo`
--
ALTER TABLE `produto_jogo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto` (`id_produto`);

--
-- Índices de tabela `produto_roupa`
--
ALTER TABLE `produto_roupa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_roupa` (`id_produto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jogo_cartas`
--
ALTER TABLE `jogo_cartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `jogo_tabuleiro`
--
ALTER TABLE `jogo_tabuleiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `produto_jogo`
--
ALTER TABLE `produto_jogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produto_roupa`
--
ALTER TABLE `produto_roupa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `camisa`
--
ALTER TABLE `camisa`
  ADD CONSTRAINT `camisa_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `jogo_cartas`
--
ALTER TABLE `jogo_cartas`
  ADD CONSTRAINT `fk_jogo_cartas_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `jogo_tabuleiro`
--
ALTER TABLE `jogo_tabuleiro`
  ADD CONSTRAINT `fk_jogo_tabuleiro_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `moletom`
--
ALTER TABLE `moletom`
  ADD CONSTRAINT `moletom_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Restrições para tabelas `produto_jogo`
--
ALTER TABLE `produto_jogo`
  ADD CONSTRAINT `fk_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `produto_roupa`
--
ALTER TABLE `produto_roupa`
  ADD CONSTRAINT `fk_produto_roupa` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
