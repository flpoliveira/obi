-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Fev-2020 às 23:19
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `obi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `nome` int(11) NOT NULL,
  `dataHoraInsercao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataHoraAtualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dataHoraInsercao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataHoraAtualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dificuldades`
--

CREATE TABLE `dificuldades` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dataHoraInsercao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataHoraAtualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dataHoraInsercao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataHoraAtualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modalidades`
--

INSERT INTO `modalidades` (`id`, `descricao`, `dataHoraInsercao`, `dataHoraAtualizacao`, `ativo`) VALUES
(1, 'Modalidade Iniciação - Nível Júnior', '2020-02-26 21:12:26', '2020-02-26 21:12:26', 1),
(2, 'Modalidade Iniciação - Nível 1', '2020-02-26 21:12:26', '2020-02-26 21:12:26', 1),
(3, 'Modalidade Iniciação - Nível 2', '2020-02-26 21:13:08', '2020-02-26 21:13:08', 1),
(4, 'Modalidade Programação - Nível Júnior', '2020-02-26 21:13:08', '2020-02-26 21:13:08', 1),
(5, 'Modalidade Programação - Nível 1', '2020-02-26 21:13:50', '2020-02-26 21:13:50', 1),
(6, 'Modalidade Programação - Nível 2', '2020-02-26 21:13:50', '2020-02-26 21:13:50', 1),
(7, 'Modalidade Programação - Nível Sênior', '2020-02-26 21:14:13', '2020-02-26 21:14:13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE `provas` (
  `id` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `modalidades_id` int(11) NOT NULL,
  `arquivos_id` int(11) NOT NULL,
  `dataHoraInsercao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataHoraAtualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `provas_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `dificuldades_id` int(11) NOT NULL,
  `arquivos_id` int(11) NOT NULL,
  `dataHoraInsercao` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataHoraAtualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dificuldades`
--
ALTER TABLE `dificuldades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `provas`
--
ALTER TABLE `provas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_id` (`modalidades_id`),
  ADD KEY `arquivos_id` (`arquivos_id`);

--
-- Índices para tabela `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provas_id` (`provas_id`),
  ADD KEY `categorias_id` (`categorias_id`),
  ADD KEY `dificuldades_id` (`dificuldades_id`),
  ADD KEY `arquivos_id` (`arquivos_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dificuldades`
--
ALTER TABLE `dificuldades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `provas`
--
ALTER TABLE `provas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `provas`
--
ALTER TABLE `provas`
  ADD CONSTRAINT `provas_ibfk_1` FOREIGN KEY (`modalidades_id`) REFERENCES `modalidades` (`id`),
  ADD CONSTRAINT `provas_ibfk_2` FOREIGN KEY (`arquivos_id`) REFERENCES `arquivos` (`id`);

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `questoes_ibfk_1` FOREIGN KEY (`arquivos_id`) REFERENCES `arquivos` (`id`),
  ADD CONSTRAINT `questoes_ibfk_2` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `questoes_ibfk_3` FOREIGN KEY (`dificuldades_id`) REFERENCES `dificuldades` (`id`),
  ADD CONSTRAINT `questoes_ibfk_4` FOREIGN KEY (`provas_id`) REFERENCES `provas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
