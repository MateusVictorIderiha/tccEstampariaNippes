-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30-Nov-2016 às 04:55
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tccestamparia`
--
CREATE DATABASE IF NOT EXISTS `tccestamparia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tccestamparia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_categoria`
--

CREATE TABLE `tcc_categoria` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_cep`
--

CREATE TABLE `tcc_cep` (
  `cep` char(8) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `id_cep` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_cep`
--

INSERT INTO `tcc_cep` (`cep`, `estado`, `cidade`, `rua`, `bairro`, `id_cep`) VALUES
('18070710', 'sp', 'sorocaba', 'rua francisco bueno de camargo', 'nova sorocaba', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_codigocor`
--

CREATE TABLE `tcc_codigocor` (
  `id_codigo` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `padraoDaCor` varchar(40) DEFAULT NULL,
  `id_cor` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_codigocor`
--

INSERT INTO `tcc_codigocor` (`id_codigo`, `codigo`, `padraoDaCor`, `id_cor`) VALUES
(1, 'FF0000', 'Hexadecimal', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_contato`
--

CREATE TABLE `tcc_contato` (
  `id_contato` int(11) UNSIGNED NOT NULL,
  `tipo` varchar(70) DEFAULT NULL,
  `contato` varchar(70) NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_contato`
--

INSERT INTO `tcc_contato` (`id_contato`, `tipo`, `contato`, `id_usuario`) VALUES
(1, 'Celular', '15996068325', 1),
(4, 'Email', 'mateus_victor_ideriha@outlook.com', 1),
(5, 'Celular', '15998127400', 2),
(6, 'Telefone', '1533887400', 3),
(7, 'Celular', '1599816644', 3),
(8, 'Celular', '1597128565', 3),
(9, 'Celular', '15995038215', 3),
(10, 'Telefone', '1564798123', 4),
(11, 'Celular', '1599605846', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_cor`
--

CREATE TABLE `tcc_cor` (
  `id_cor` int(10) UNSIGNED NOT NULL,
  `cor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_cor`
--

INSERT INTO `tcc_cor` (`id_cor`, `cor`) VALUES
(1, 'Vermelho'),
(2, 'Azul'),
(3, 'Rosa'),
(4, 'Branco'),
(5, 'Preto'),
(6, 'Cinza'),
(7, 'Amarelo'),
(8, 'Roxo'),
(9, 'Verde'),
(10, 'Azul Claro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_endereco`
--

CREATE TABLE `tcc_endereco` (
  `id_endereco` int(11) UNSIGNED NOT NULL,
  `numero` varchar(9) NOT NULL,
  `complemento` varchar(70) DEFAULT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_cep` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_endereco`
--

INSERT INTO `tcc_endereco` (`id_endereco`, `numero`, `complemento`, `id_usuario`, `id_cep`) VALUES
(1, '2195', NULL, 1, 1),
(2, '133', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_imgestampa`
--

CREATE TABLE `tcc_imgestampa` (
  `id_estampa` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `id_ModEstampa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_localestampa`
--

CREATE TABLE `tcc_localestampa` (
  `id_local` int(10) UNSIGNED NOT NULL,
  `local` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_lotes`
--

CREATE TABLE `tcc_lotes` (
  `id_lotes` int(10) UNSIGNED NOT NULL,
  `dataIniciada` date NOT NULL,
  `dataFinalizada` date DEFAULT NULL,
  `ativa` char(1) DEFAULT NULL,
  `quantidade` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_lotes`
--

INSERT INTO `tcc_lotes` (`id_lotes`, `dataIniciada`, `dataFinalizada`, `ativa`, `quantidade`) VALUES
(1, '2016-11-22', NULL, 'S', 10),
(2, '2016-11-25', NULL, 'S', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_modelo`
--

CREATE TABLE `tcc_modelo` (
  `id_modelo` int(10) UNSIGNED NOT NULL,
  `modelo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_modelo`
--

INSERT INTO `tcc_modelo` (`id_modelo`, `modelo`) VALUES
(1, 'Camiseta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_modeloestampa`
--

CREATE TABLE `tcc_modeloestampa` (
  `id_ModEstampa` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `imagemEstampa` varchar(255) DEFAULT NULL,
  `dataCriada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_modeloestampa`
--

INSERT INTO `tcc_modeloestampa` (`id_ModEstampa`, `descricao`, `imagemEstampa`, `dataCriada`) VALUES
(1, 'asdasdasd', 'asdsadasd', '2016-11-11'),
(2, 'OlÃ¡ estou fazendo um orcamento e blabla', NULL, '2016-11-25'),
(3, 'Array', NULL, '2016-11-25'),
(4, NULL, NULL, '2016-11-27'),
(5, 'Array', NULL, '2016-11-27'),
(6, 'Array', NULL, '2016-11-27'),
(7, 'asdasdsad', NULL, '2016-11-27'),
(8, 'asdasdsad', NULL, '2016-11-27'),
(9, 'asdasdsad', NULL, '2016-11-27'),
(10, 'asdasdsad', NULL, '2016-11-27'),
(11, 'asdasd', NULL, '2016-11-28'),
(12, 'asdasd', NULL, '2016-11-28'),
(13, 'asdasd', NULL, '2016-11-28'),
(14, '13', NULL, '2016-11-28'),
(15, '13', NULL, '2016-11-28'),
(16, '13', NULL, '2016-11-28'),
(17, '14', NULL, '2016-11-28'),
(18, 'asdasd', NULL, '2016-11-28'),
(19, 'asdfasfsdf', NULL, '2016-11-28'),
(20, '32', NULL, '2016-11-28'),
(21, 'asd', NULL, '2016-11-28'),
(22, 'adasd', NULL, '2016-11-28'),
(23, 'asdasd', NULL, '2016-11-28'),
(24, 'asdasd', NULL, '2016-11-28'),
(25, 'asdasd', NULL, '2016-11-28'),
(26, 'asdfasdfa', NULL, '2016-11-28'),
(27, 'asdasd', NULL, '2016-11-28'),
(28, '', NULL, '2016-11-28'),
(29, '', NULL, '2016-11-28'),
(30, '', NULL, '2016-11-28'),
(31, '', NULL, '2016-11-28'),
(32, '', NULL, '2016-11-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_produtos`
--

CREATE TABLE `tcc_produtos` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `preco` float DEFAULT NULL,
  `fotoProduto` varchar(255) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `material` varchar(30) DEFAULT NULL,
  `id_cor` int(10) UNSIGNED DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `tipoProduto` varchar(30) DEFAULT NULL,
  `personalizado` char(1) NOT NULL,
  `peso` float DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `id_tamanho` int(10) UNSIGNED DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_produtos`
--

INSERT INTO `tcc_produtos` (`id_produto`, `nome`, `preco`, `fotoProduto`, `modelo`, `material`, `id_cor`, `categoria`, `tipoProduto`, `personalizado`, `peso`, `descricao`, `id_tamanho`, `quantidade`) VALUES
(3, 'Nippes Wolf', 25, NULL, NULL, 'algodão', 2, NULL, NULL, 'N', NULL, 'Camiseta2', 2, NULL),
(5, 'Polo', 20, 'produtos/22-11-2016 1821/polo.png', '1', NULL, 1, NULL, 'Camiseta', 'M', NULL, '', 1, NULL),
(6, 'Polo', 20, 'produtos/22-11-2016 1821/polo.png', NULL, NULL, 1, NULL, NULL, 'M', NULL, '', 2, NULL),
(7, 'Polo', 30, 'produtos/22-11-2016 1821/polo.png', NULL, NULL, 1, NULL, NULL, '', NULL, '', 4, NULL),
(8, 'Lisa', 20, NULL, '1', NULL, 1, NULL, 'Camiseta', 'M', NULL, '', 2, NULL),
(9, 'Polo', 20, NULL, '1', NULL, 2, NULL, NULL, 'M', NULL, '', 5, NULL),
(10, 'Polo', 20, NULL, NULL, NULL, 1, NULL, NULL, 'M', NULL, '', 5, NULL),
(11, 'Lion&Wolf Nippes', 30, 'produtos/', 'Gola V', 'Poliester', 5, NULL, NULL, 'N', NULL, NULL, 1, -40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_produtovenda`
--

CREATE TABLE `tcc_produtovenda` (
  `id_produtoVenda` int(10) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_ModEstampa` int(10) UNSIGNED DEFAULT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_venda` int(10) UNSIGNED NOT NULL,
  `descricaoPedido` varchar(255) DEFAULT NULL,
  `tipoFormandos` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_produtovenda`
--

INSERT INTO `tcc_produtovenda` (`id_produtoVenda`, `quantidade`, `preco`, `foto`, `id_ModEstampa`, `id_produto`, `id_venda`, `descricaoPedido`, `tipoFormandos`) VALUES
(1, 1, NULL, NULL, 1, 3, 3, NULL, NULL),
(2, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(3, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(4, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(5, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(6, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(7, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(8, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(9, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(10, 5, NULL, NULL, 3, 6, 3, NULL, NULL),
(11, 6, NULL, NULL, 10, 5, 5, '"Uma frase"', 'S'),
(12, 4, NULL, NULL, 10, 6, 5, 'asdad', 'S'),
(13, 4, NULL, NULL, 10, 5, 5, 'asdad', 'S'),
(14, 4, NULL, NULL, 10, 6, 5, 'asdad', 'S'),
(15, 4, NULL, NULL, 10, 5, 5, 'asdad', 'S'),
(16, 4, NULL, NULL, 10, 6, 5, 'asdad', 'S'),
(17, 4, NULL, NULL, 10, 5, 5, 'asdad', 'S'),
(18, 4, NULL, NULL, 10, 6, 5, 'asdad', 'S'),
(19, 4, NULL, NULL, 10, 5, 5, 'asdad', 'S'),
(20, 4, NULL, NULL, 10, 6, 5, 'asdad', 'S'),
(21, 4, NULL, NULL, 10, 5, 5, 'asdad', 'S'),
(22, 3, NULL, NULL, 10, 5, 43, 'asdasd', 'S'),
(23, 3, NULL, NULL, 10, 5, 44, 'asdasd', 'S'),
(24, 5, NULL, NULL, 10, 8, 45, '1414', 'S'),
(25, 5, NULL, NULL, 10, 8, 46, '1414', 'S'),
(26, 5, NULL, NULL, 10, 8, 47, '1414', 'S'),
(27, 4, NULL, NULL, 10, 5, 48, '14141', 'S'),
(28, 4, NULL, NULL, 10, 10, 49, 'asdasd', 'S'),
(29, 14, NULL, NULL, 10, 8, 50, 'fasdfasdfadsf', 'S'),
(30, 40, NULL, NULL, 10, 5, 51, 'fghfjh', 'S'),
(31, 14, NULL, NULL, 10, 5, 52, 'asdasd', 'S'),
(32, 15, NULL, NULL, 10, 5, 53, 'asdasd', 'S'),
(33, 26, NULL, NULL, 10, 5, 54, 'asdasdasd', 'S'),
(34, 14, NULL, NULL, 10, 5, 55, 'dasdasd', 'S'),
(35, 14, NULL, NULL, 10, 5, 56, 'sdfsdf', 'S'),
(36, 41, NULL, NULL, 10, 9, 56, 'asdfadsfdsaf', 'S'),
(37, 14, NULL, NULL, 10, 7, 56, 'asdfasdfasdf', 'S'),
(38, 4, NULL, NULL, 10, 5, 56, '', 'S'),
(39, 4, NULL, NULL, 10, 5, 56, '', 'S'),
(40, 4, NULL, NULL, 10, 5, 56, '', 'S'),
(41, 4, NULL, NULL, 10, 5, 56, '', 'S'),
(42, 4, NULL, NULL, 10, 5, 56, '', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_promocao`
--

CREATE TABLE `tcc_promocao` (
  `id_promocao` int(10) UNSIGNED NOT NULL,
  `dataInicial` datetime NOT NULL,
  `dataFinal` datetime NOT NULL,
  `precoPromocao` float NOT NULL,
  `promocao` varchar(30) NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_tamanho`
--

CREATE TABLE `tcc_tamanho` (
  `id_tamanho` int(10) UNSIGNED NOT NULL,
  `tamanho` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_tamanho`
--

INSERT INTO `tcc_tamanho` (`id_tamanho`, `tamanho`) VALUES
(1, 'PP'),
(2, 'P'),
(3, 'M'),
(4, 'G'),
(5, 'GG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_tipomaterial`
--

CREATE TABLE `tcc_tipomaterial` (
  `id_material` int(10) UNSIGNED NOT NULL,
  `material` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_tipoproduto`
--

CREATE TABLE `tcc_tipoproduto` (
  `id_tipo` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_usuario`
--

CREATE TABLE `tcc_usuario` (
  `cpf_usuario` char(11) NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `RG` varchar(100) DEFAULT NULL,
  `dataNascimento` date NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nivel` varchar(255) NOT NULL DEFAULT 'uc',
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_usuario`
--

INSERT INTO `tcc_usuario` (`cpf_usuario`, `login`, `senha`, `RG`, `dataNascimento`, `nome`, `nivel`, `id_usuario`) VALUES
('45899604867', 'Mateus Victor', '123456', '561647246', '1998-05-21', 'Mateus Victor Ideriha Rego', 'uc', 1),
('12345678910', 'mateus@hotmail.com', '123456', '12345679', '2016-05-11', 'Mateus ASDASD', 'uc', 2),
('11155566677', 'renan@hotmail.com', '136879', '12365478921', '2016-05-11', 'Renan Matos', 'uc', 3),
('12365474113', 'Natalia@hotamail.com', '25f9e794323b453885f5181f1b624d0b', '135464879', '2016-05-11', 'Natalia Silva', 'uc', 4),
('10548678791', 'luan@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '13546748721', '2016-05-11', 'Luan', 'uc', 5),
('45899604867', 'nippes2016', '97381e3ae722268461dc7748923aa7e4', NULL, '2016-11-29', 'Fernando', 'M2U2NjMzNjcwOTUyYmM0MmNjNGNjYzM5N2Y2NGIwNzE=', 6),
('12346579455', 'Lucas@hotamail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', '2016-05-11', '', 'uc', 7),
('31154687754', 'victor@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '156487543', '2016-05-11', 'victor', 'uc', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_vendas`
--

CREATE TABLE `tcc_vendas` (
  `id_venda` int(10) UNSIGNED NOT NULL,
  `dataAberto` datetime NOT NULL,
  `dataFinalizada` datetime DEFAULT NULL,
  `VendaStatus` varchar(40) NOT NULL,
  `tipoVenda` char(1) NOT NULL,
  `desconto` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_funcionario` int(10) UNSIGNED DEFAULT NULL,
  `id_endereco` int(10) UNSIGNED DEFAULT NULL,
  `dataOrcamento` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_vendas`
--

INSERT INTO `tcc_vendas` (`id_venda`, `dataAberto`, `dataFinalizada`, `VendaStatus`, `tipoVenda`, `desconto`, `total`, `id_cliente`, `id_funcionario`, `id_endereco`, `dataOrcamento`) VALUES
(1, '2016-11-09 07:52:47', NULL, 'Aberto', 'V', NULL, 50, 1, NULL, 1, NULL),
(2, '2016-11-09 08:36:55', NULL, 'Aberto', 'V', NULL, NULL, 1, NULL, 1, NULL),
(3, '2016-11-24 09:45:04', NULL, 'Aberto', 'V', NULL, NULL, 1, NULL, NULL, NULL),
(4, '2016-05-03 00:00:00', NULL, 'Solicitado', 'O', NULL, NULL, 2, NULL, NULL, NULL),
(5, '2016-11-24 10:22:51', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(6, '2016-11-24 10:23:50', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(7, '2016-11-24 10:26:33', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(8, '2016-11-24 10:29:28', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(9, '2016-11-24 10:39:23', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(10, '2016-11-24 10:39:39', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(11, '2016-11-24 10:39:46', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(12, '2016-11-24 10:39:57', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(13, '2016-11-24 10:40:32', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(14, '2016-11-24 23:09:31', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(15, '2016-11-24 23:11:40', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(16, '2016-11-24 23:12:16', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(17, '2016-11-24 23:18:00', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(18, '2016-11-24 23:19:04', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(19, '2016-11-24 23:21:15', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(20, '2016-11-24 23:22:06', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(21, '2016-11-24 23:25:12', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(22, '2016-11-24 23:26:47', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(23, '2016-11-24 23:30:44', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(24, '2016-11-24 23:34:38', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(25, '2016-11-24 23:35:10', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(26, '2016-11-24 23:36:06', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(27, '2016-11-24 23:38:17', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(28, '2016-11-25 00:17:45', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(29, '2016-11-25 00:25:08', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(30, '2016-11-25 00:26:15', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(31, '2016-11-25 00:27:21', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(32, '2016-11-25 00:34:50', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(33, '2016-11-25 00:36:46', NULL, 'Solicitado', 'O', NULL, NULL, 4, NULL, NULL, NULL),
(34, '2016-11-25 00:38:01', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(35, '2016-11-25 14:13:59', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, NULL, NULL),
(36, '2016-11-27 16:13:54', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(37, '2016-11-27 16:14:13', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(38, '2016-11-27 16:38:59', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(39, '2016-11-27 16:40:28', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(40, '2016-11-27 16:40:37', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(41, '2016-11-27 16:43:49', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(42, '2016-11-28 00:26:28', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(43, '2016-11-28 00:28:20', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(44, '2016-11-28 00:30:03', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(45, '2016-11-28 00:31:57', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(46, '2016-11-28 00:39:43', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(47, '2016-11-28 00:40:15', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(48, '2016-11-28 00:47:08', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(49, '2016-11-28 00:47:34', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(50, '2016-11-28 00:48:09', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(51, '2016-11-28 00:49:03', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(52, '2016-11-28 00:54:13', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(53, '2016-11-28 00:54:35', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(54, '2016-11-28 00:57:03', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(55, '2016-11-28 00:57:32', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL),
(56, '2016-11-28 01:09:03', NULL, 'Solicitado', 'O', NULL, NULL, 5, NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tcc_categoria`
--
ALTER TABLE `tcc_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `tcc_cep`
--
ALTER TABLE `tcc_cep`
  ADD PRIMARY KEY (`id_cep`);

--
-- Indexes for table `tcc_codigocor`
--
ALTER TABLE `tcc_codigocor`
  ADD PRIMARY KEY (`id_codigo`),
  ADD KEY `FK_IdCor` (`id_cor`);

--
-- Indexes for table `tcc_contato`
--
ALTER TABLE `tcc_contato`
  ADD PRIMARY KEY (`id_contato`),
  ADD KEY `FK_idUsuario_Contato` (`id_usuario`);

--
-- Indexes for table `tcc_cor`
--
ALTER TABLE `tcc_cor`
  ADD PRIMARY KEY (`id_cor`);

--
-- Indexes for table `tcc_endereco`
--
ALTER TABLE `tcc_endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `FK_idUsuario_endereco` (`id_usuario`),
  ADD KEY `FK_idCep_endereco` (`id_cep`);

--
-- Indexes for table `tcc_imgestampa`
--
ALTER TABLE `tcc_imgestampa`
  ADD PRIMARY KEY (`id_estampa`),
  ADD KEY `FK_idModEstampa` (`id_ModEstampa`);

--
-- Indexes for table `tcc_localestampa`
--
ALTER TABLE `tcc_localestampa`
  ADD PRIMARY KEY (`id_local`);

--
-- Indexes for table `tcc_lotes`
--
ALTER TABLE `tcc_lotes`
  ADD PRIMARY KEY (`id_lotes`);

--
-- Indexes for table `tcc_modelo`
--
ALTER TABLE `tcc_modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indexes for table `tcc_modeloestampa`
--
ALTER TABLE `tcc_modeloestampa`
  ADD PRIMARY KEY (`id_ModEstampa`);

--
-- Indexes for table `tcc_produtos`
--
ALTER TABLE `tcc_produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `FK_idCorProduto` (`id_cor`),
  ADD KEY `FK_idTamanho_produtos` (`id_tamanho`);

--
-- Indexes for table `tcc_produtovenda`
--
ALTER TABLE `tcc_produtovenda`
  ADD PRIMARY KEY (`id_produtoVenda`),
  ADD KEY `FK_idProduto_prodVenda` (`id_produto`),
  ADD KEY `FK_idVenda_prodVenda` (`id_venda`);

--
-- Indexes for table `tcc_promocao`
--
ALTER TABLE `tcc_promocao`
  ADD PRIMARY KEY (`id_promocao`),
  ADD KEY `FK_idProduto` (`id_produto`);

--
-- Indexes for table `tcc_tamanho`
--
ALTER TABLE `tcc_tamanho`
  ADD PRIMARY KEY (`id_tamanho`);

--
-- Indexes for table `tcc_tipomaterial`
--
ALTER TABLE `tcc_tipomaterial`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `tcc_tipoproduto`
--
ALTER TABLE `tcc_tipoproduto`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `tcc_usuario`
--
ALTER TABLE `tcc_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `tcc_vendas`
--
ALTER TABLE `tcc_vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `FK_idClienteUser_Venda` (`id_cliente`),
  ADD KEY `FK_idFuncionarioUser_Venda` (`id_funcionario`),
  ADD KEY `FK_idEndereco_Venda` (`id_endereco`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tcc_cep`
--
ALTER TABLE `tcc_cep`
  MODIFY `id_cep` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tcc_codigocor`
--
ALTER TABLE `tcc_codigocor`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tcc_contato`
--
ALTER TABLE `tcc_contato`
  MODIFY `id_contato` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tcc_cor`
--
ALTER TABLE `tcc_cor`
  MODIFY `id_cor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tcc_endereco`
--
ALTER TABLE `tcc_endereco`
  MODIFY `id_endereco` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tcc_imgestampa`
--
ALTER TABLE `tcc_imgestampa`
  MODIFY `id_estampa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcc_localestampa`
--
ALTER TABLE `tcc_localestampa`
  MODIFY `id_local` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcc_lotes`
--
ALTER TABLE `tcc_lotes`
  MODIFY `id_lotes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tcc_modelo`
--
ALTER TABLE `tcc_modelo`
  MODIFY `id_modelo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tcc_modeloestampa`
--
ALTER TABLE `tcc_modeloestampa`
  MODIFY `id_ModEstampa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tcc_produtos`
--
ALTER TABLE `tcc_produtos`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tcc_produtovenda`
--
ALTER TABLE `tcc_produtovenda`
  MODIFY `id_produtoVenda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tcc_promocao`
--
ALTER TABLE `tcc_promocao`
  MODIFY `id_promocao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcc_tamanho`
--
ALTER TABLE `tcc_tamanho`
  MODIFY `id_tamanho` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tcc_tipomaterial`
--
ALTER TABLE `tcc_tipomaterial`
  MODIFY `id_material` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcc_usuario`
--
ALTER TABLE `tcc_usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tcc_vendas`
--
ALTER TABLE `tcc_vendas`
  MODIFY `id_venda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tcc_codigocor`
--
ALTER TABLE `tcc_codigocor`
  ADD CONSTRAINT `FK_IdCor` FOREIGN KEY (`id_cor`) REFERENCES `tcc_cor` (`id_cor`);

--
-- Limitadores para a tabela `tcc_contato`
--
ALTER TABLE `tcc_contato`
  ADD CONSTRAINT `FK_idUsuario_Contato` FOREIGN KEY (`id_usuario`) REFERENCES `tcc_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tcc_endereco`
--
ALTER TABLE `tcc_endereco`
  ADD CONSTRAINT `FK_idCep_endereco` FOREIGN KEY (`id_cep`) REFERENCES `tcc_cep` (`id_cep`),
  ADD CONSTRAINT `FK_idUsuario_endereco` FOREIGN KEY (`id_usuario`) REFERENCES `tcc_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tcc_imgestampa`
--
ALTER TABLE `tcc_imgestampa`
  ADD CONSTRAINT `FK_idModEstampa` FOREIGN KEY (`id_ModEstampa`) REFERENCES `tcc_modeloestampa` (`id_ModEstampa`);

--
-- Limitadores para a tabela `tcc_produtos`
--
ALTER TABLE `tcc_produtos`
  ADD CONSTRAINT `FK_idCorProduto` FOREIGN KEY (`id_cor`) REFERENCES `tcc_cor` (`id_cor`),
  ADD CONSTRAINT `FK_idTamanho_produtos` FOREIGN KEY (`id_tamanho`) REFERENCES `tcc_tamanho` (`id_tamanho`);

--
-- Limitadores para a tabela `tcc_produtovenda`
--
ALTER TABLE `tcc_produtovenda`
  ADD CONSTRAINT `FK_idProduto_prodVenda` FOREIGN KEY (`id_produto`) REFERENCES `tcc_produtos` (`id_produto`),
  ADD CONSTRAINT `FK_idVenda_prodVenda` FOREIGN KEY (`id_venda`) REFERENCES `tcc_vendas` (`id_venda`);

--
-- Limitadores para a tabela `tcc_promocao`
--
ALTER TABLE `tcc_promocao`
  ADD CONSTRAINT `FK_idProduto` FOREIGN KEY (`id_produto`) REFERENCES `tcc_produtos` (`id_produto`);

--
-- Limitadores para a tabela `tcc_vendas`
--
ALTER TABLE `tcc_vendas`
  ADD CONSTRAINT `FK_idClienteUser_Venda` FOREIGN KEY (`id_cliente`) REFERENCES `tcc_usuario` (`id_usuario`),
  ADD CONSTRAINT `FK_idEndereco_Venda` FOREIGN KEY (`id_endereco`) REFERENCES `tcc_endereco` (`id_endereco`),
  ADD CONSTRAINT `FK_idFuncionarioUser_Venda` FOREIGN KEY (`id_funcionario`) REFERENCES `tcc_usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
