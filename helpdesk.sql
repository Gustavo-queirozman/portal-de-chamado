-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Abr-2023 às 20:13
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `tipo`, `categoria`) VALUES
(1, 'Software', 'Cardio'),
(2, 'Software', 'CardioWeb'),
(3, 'Software', 'Hilum'),
(4, 'Software', 'Pirâmide'),
(5, 'Hardware', 'Tonner');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `prioridade` varchar(15) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `atendente` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `fkUsuario` int(11) DEFAULT NULL,
  `criadoDataHora` datetime DEFAULT current_timestamp(),
  `data` date NOT NULL DEFAULT current_timestamp(),
  `alteradoDataHora` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `concluidoDataHora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `chamado`
--

INSERT INTO `chamado` (`id`, `tipo`, `titulo`, `prioridade`, `descricao`, `status`, `atendente`, `categoria`, `fkUsuario`, `criadoDataHora`, `data`, `alteradoDataHora`, `concluidoDataHora`) VALUES
(1, 'Software', 'Titulo 1', 'Alta', 'dsasa', NULL, NULL, 'categoriax', 1, '2023-04-06 16:00:28', '2023-04-19', '2023-04-27 14:39:06', NULL),
(2, 'Hardware', 'Titulo 2', NULL, NULL, 'Análise', NULL, NULL, 1, '2023-04-10 13:34:13', '2023-04-19', '2023-04-25 10:06:14', NULL),
(3, 'Hardware', 'Titulo 3asd', 'Alta', 'SSSSASASA', NULL, NULL, NULL, 1, '2023-04-10 14:18:28', '2023-04-19', '2023-04-27 14:32:57', NULL),
(4, 'Software', 'Titulo 4', 'Normal', 'ergreg', 'Fechado', NULL, 'sd', 1, '2023-04-10 14:25:31', '2020-12-01', '2023-04-25 10:06:23', NULL),
(5, 'Hardware', 'Titulo 5', 'Normal', 'sdfdsfdsf', 'Aberto', NULL, 'sd', 1, '2023-04-10 14:26:26', '2023-04-19', '2023-04-25 10:06:26', NULL),
(6, 'Software', 'Titulo 6', 'Normal', 'sdfdsfdsf', 'Aberto', NULL, 'sd', 1, '2023-04-10 14:26:40', '2023-04-19', '2023-04-25 10:06:30', NULL),
(7, 'Hardware', 'Titulo 7', 'Normal', 'edew', 'Aberto', NULL, 'sd', 1, '2023-04-17 16:26:06', '2023-04-19', '2023-04-25 10:06:34', NULL),
(8, 'Software', 'Titulo 8', 'Normal', 'sdfsd', NULL, NULL, 'sd', 1, '2023-04-17 16:46:16', '2023-04-19', '2023-04-27 14:40:10', NULL),
(9, 'Hardware', 'Titulo 9', 'Média', 'descrição1', 'Análise', NULL, 'sd', 1, '2023-04-18 07:44:21', '2023-04-19', '2023-04-25 13:44:34', NULL),
(10, 'Hardware', 'Titulo 10', 'Normal', 'descrição2', 'Aberto', NULL, 'sd', 1, '2023-04-18 08:05:10', '2023-04-19', '2023-04-25 13:44:28', NULL),
(11, 'Software', 'Titulo 11', 'Normal', 'tyt', 'Aberto', NULL, 'sd', 1, '2023-04-19 13:49:16', '2023-04-19', '2023-04-25 10:06:53', NULL),
(12, 'Hardware', 'Titulo 12', 'prioridade', 'descrição', 'Em espera', 'atendente', 'categoria', 1, '2023-04-19 14:32:27', '2013-02-01', '2023-04-25 10:05:08', '2023-04-19 14:31:59'),
(13, 'Software', 'Titulo 13', 'Normal', 'descrição', 'Fechado', NULL, 'sd', 1, '2023-04-20 14:45:46', '2023-04-20', '2023-04-25 10:06:56', NULL),
(14, 'Software', 'Titulo 14', 'Normal', 'descrçaõ', 'Fechado', NULL, 'sd', 1, '2023-04-24 11:18:16', '2023-04-24', '2023-04-25 10:07:00', NULL),
(15, 'Software', 'Titulo15', 'Normal', 'descrição', 'Fechado', NULL, 'sd', 1, '2023-04-24 11:18:40', '2023-04-24', '2023-04-25 10:07:04', NULL),
(16, 'Software', 'Titulo 16', 'Normal', 'descrição', 'Análise', NULL, 'sd', 1, '2023-04-24 11:18:41', '2023-04-24', '2023-04-25 10:07:08', NULL),
(17, 'Software', 'Titulo 17', 'Normal', 'descrição', 'Análise', NULL, 'sd', 1, '2023-04-24 13:10:52', '2023-04-24', '2023-04-25 10:07:12', NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-27 10:58:10', '2023-04-27', '2023-04-27 10:58:10', NULL),
(19, 'Software', 'dsffs', 'Média', 'ddsfdsfdsf', NULL, NULL, 'sd', NULL, '2023-04-27 14:10:19', '2023-04-27', '2023-04-27 14:10:19', NULL),
(20, NULL, 'd', NULL, 'de', NULL, NULL, NULL, NULL, '2023-04-27 14:18:06', '2023-04-27', '2023-04-27 14:18:06', NULL),
(21, 'Software', 'ytusa', 'Média', 'sasdasd', NULL, NULL, 'sd', NULL, '2023-04-27 14:33:20', '2023-04-27', '2023-04-27 14:33:20', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostachamado`
--

CREATE TABLE `respostachamado` (
  `id` int(11) NOT NULL,
  `fkUsuario` int(11) DEFAULT NULL,
  `fkChamado` int(11) DEFAULT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `dataHora` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `respostachamado`
--

INSERT INTO `respostachamado` (`id`, `fkUsuario`, `fkChamado`, `resposta`, `dataHora`) VALUES
(1, 1, 2, '<p>iefjowefoi</p>', '2023-04-14 15:51:17'),
(2, 1, 1, '<strong>dwdqwdqd</strong>', '2023-04-14 15:52:07'),
(3, 1, 1, '<p>efewfwef</p>', '2023-04-17 07:07:13'),
(4, 1, 1, '<p>ewedwe</p>', '2023-04-17 11:26:50'),
(5, 1, 1, '<p>q</p>', '2023-04-17 11:26:54'),
(6, 1, 2, '<p>ddqwdwq</p>', '2023-04-20 14:33:32'),
(7, 1, 1, '<p>qwqdwdwq</p>', '2023-04-20 14:37:17'),
(8, 1, 1, '<p>basic</p>', '2023-04-20 14:37:23'),
(9, 1, 1, '<h2>ee ee</h2>', '2023-04-25 11:49:00'),
(10, 1, 1, '<p><strong>fdbdb</strong><i><strong>fdbd</strong>dddbdb</i>dbdbdbd</p>', '2023-04-25 16:20:11'),
(11, 1, 1, '<blockquote><p>ç</p></blockquote>', '2023-04-25 16:54:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `setor` varchar(255) NOT NULL,
  `ramal` varchar(255) NOT NULL,
  `codAnydesk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `type`, `setor`, `ramal`, `codAnydesk`) VALUES
(1, 'Gustavo Queiroz', 'suport3@unimednet.com.br', 'Gustavo.Queiroz', '1234', NULL, 'Atendimento', 'dfg', 'hkydasds'),
(106, 'asd', 'sad@gmail.com', 'sad', 'sad', NULL, 'Atualização', 'da', 'ssad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `setor` varchar(255) DEFAULT NULL,
  `criadoDataHora` datetime DEFAULT current_timestamp(),
  `alteradoDataHora` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `ramal` varchar(255) DEFAULT NULL,
  `codAnydesk` varchar(255) DEFAULT NULL,
  `nivelPermisao` varchar(255) NOT NULL DEFAULT 'solicitante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `senha`, `nome`, `email`, `setor`, `criadoDataHora`, `alteradoDataHora`, `ramal`, `codAnydesk`, `nivelPermisao`) VALUES
(1, 'Gustavo.Queiroz', '81709', 'Gustavo Queiroz', 'gustavoqueirozmit@gmail.com', 'TI', '2023-03-29 14:42:38', '2023-04-06 07:56:35', NULL, NULL, 'solicitante'),
(2, NULL, '36846', NULL, 'suporteeti3@unimednet.com.br', NULL, '2023-04-05 13:30:03', '2023-04-24 11:58:11', NULL, NULL, 'solicitante'),
(3, NULL, '36846', NULL, 'supoeerteti3@unimednet.com.br', NULL, '2023-04-05 13:32:32', '2023-04-24 11:58:15', NULL, NULL, 'solicitante'),
(4, NULL, '36846', NULL, 'supotrteti3@unimednet.com.br', NULL, '2023-04-05 13:34:23', '2023-04-24 11:58:29', NULL, NULL, 'solicitante'),
(5, NULL, '36846', NULL, 'supowerteti3@unimednet.com.br', NULL, '2023-04-05 13:36:04', '2023-04-24 11:58:18', NULL, NULL, 'solicitante');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_chamado_2` (`fkUsuario`);

--
-- Índices para tabela `respostachamado`
--
ALTER TABLE `respostachamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_responde_1` (`fkUsuario`),
  ADD KEY `FK_responde_2` (`fkChamado`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `chamado`
--
ALTER TABLE `chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `respostachamado`
--
ALTER TABLE `respostachamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `FK_chamado_2` FOREIGN KEY (`fkUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `respostachamado`
--
ALTER TABLE `respostachamado`
  ADD CONSTRAINT `FK_responde_1` FOREIGN KEY (`fkUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_responde_2` FOREIGN KEY (`fkChamado`) REFERENCES `chamado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
