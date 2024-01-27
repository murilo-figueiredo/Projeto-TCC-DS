-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Nov-2023 às 23:48
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdtripixel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_jogo`
--

DROP TABLE IF EXISTS `tb_jogo`;
CREATE TABLE IF NOT EXISTS `tb_jogo` (
  `id_jogo` int NOT NULL AUTO_INCREMENT,
  `nome_jogo` varchar(30) NOT NULL,
  `descricao_jogo` text NOT NULL,
  `preco_jogo` decimal(5,2) NOT NULL,
  `dta_lancamento_jogo` date NOT NULL,
  PRIMARY KEY (`id_jogo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_jogo`
--

INSERT INTO `tb_jogo` (`id_jogo`, `nome_jogo`, `descricao_jogo`, `preco_jogo`, `dta_lancamento_jogo`) VALUES
(1, 'The Blind Monk', 'Jogue como um monge que perdeu sua visão, vivendo em uma cidade utópica lutando pelos seus direitos em intensos combates.', '0.00', '2023-11-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_progresso`
--

DROP TABLE IF EXISTS `tb_progresso`;
CREATE TABLE IF NOT EXISTS `tb_progresso` (
  `id_progresso` int NOT NULL AUTO_INCREMENT,
  `id_jogo` int NOT NULL,
  `id_usuario` int NOT NULL,
  `prim_entrada_progresso` date DEFAULT NULL,
  `fase_atual_progresso` int DEFAULT NULL,
  `tempo_jogo_progresso` time DEFAULT NULL,
  PRIMARY KEY (`id_progresso`),
  KEY `id_jogo` (`id_jogo`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(30) NOT NULL,
  `email_usuario` varchar(80) NOT NULL,
  `senha_usuario` varbinary(255) NOT NULL,
  `foto_usuario` varchar(100) DEFAULT 'sem_foto_perfil.png',
  `status_usuario` enum('ATIVO','DESATIVO') NOT NULL DEFAULT 'ATIVO',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `UQemail_usuario` (`email_usuario`),
  UNIQUE KEY `UQnome_usuario` (`nome_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
