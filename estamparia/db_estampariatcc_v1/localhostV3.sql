-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 03/10/2016 às 16:27
-- Versão do servidor: 5.6.11-log
-- Versão do PHP: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `estampariatcc`
--
CREATE DATABASE IF NOT EXISTS `estampariatcc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estampariatcc`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cep`
--

CREATE TABLE IF NOT EXISTS `cep` (
  `cep` char(8) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  PRIMARY KEY (`cep`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cep`
--

INSERT INTO `cep` (`cep`, `estado`, `cidade`, `rua`, `bairro`) VALUES
('18070710', 'SP', 'SOROCABA', 'RUA FRANCISCO BUENO DE CAMARGO', 'NOVA SOROCABA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cpf_cliente` char(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `RG` varchar(100) NOT NULL,
  `dataNascimento` date NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`cpf_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cliente`
--

INSERT INTO `cliente` (`cpf_cliente`, `email`, `senha`, `RG`, `dataNascimento`, `nome`) VALUES
('1234567811', 'Pedro@etec.gov.sp.br', '159753', '987456321', '1999-12-21', 'Pedro'),
('45899604867', 'Mateus.victor@etec.gov.sp.br', '123456', '567241646', '1998-05-21', 'Mateus Victor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `codigo`
--

CREATE TABLE IF NOT EXISTS `codigo` (
  `id_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `id_padraoDaCor` int(11) DEFAULT NULL,
  `id_cor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_codigo`),
  KEY `FK_IdPadraoDaCor` (`id_padraoDaCor`),
  KEY `FK_IdCor` (`id_cor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) DEFAULT NULL,
  `contato` varchar(70) NOT NULL,
  `cpf_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_contato`),
  KEY `FK_cpfCliente` (`cpf_cliente`),
  KEY `FK_idTipo` (`id_tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `contato`
--

INSERT INTO `contato` (`id_contato`, `id_tipo`, `contato`, `cpf_cliente`) VALUES
(1, 2, '996068325', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cor`
--

CREATE TABLE IF NOT EXISTS `cor` (
  `id_cor` int(11) NOT NULL AUTO_INCREMENT,
  `cor` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_cor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(9) NOT NULL,
  `cep` char(8) DEFAULT NULL,
  `cpf_cliente` char(11) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `FK_cep` (`cep`),
  KEY `FK_cliente` (`cpf_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `numero`, `cep`, `cpf_cliente`, `complemento`) VALUES
(1, '2195', '18070710', '45899604867', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE IF NOT EXISTS `estoque` (
  `id_estoque` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL DEFAULT '0',
  `id_tamanho` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produto`,`id_tamanho`),
  KEY `FK_idTamanho` (`id_tamanho`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `cpf_funcionario` char(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `dataNascimento` date NOT NULL,
  `senha` varchar(255) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cpf_funcionario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `img_estampa`
--

CREATE TABLE IF NOT EXISTS `img_estampa` (
  `id_estampa` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `id_ModEstampa` int(11) NOT NULL,
  `id_local` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estampa`),
  KEY `FK_idModEstampa` (`id_ModEstampa`),
  KEY `FK_idLocal` (`id_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `local_estampa`
--

CREATE TABLE IF NOT EXISTS `local_estampa` (
  `id_local` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(30) NOT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modeloestampa`
--

CREATE TABLE IF NOT EXISTS `modeloestampa` (
  `id_ModEstampa` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ModEstampa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `padraodacor`
--

CREATE TABLE IF NOT EXISTS `padraodacor` (
  `id_padraoDaCor` int(11) NOT NULL AUTO_INCREMENT,
  `padraoDaCor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_padraoDaCor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `padraodacor`
--

INSERT INTO `padraodacor` (`id_padraoDaCor`, `padraoDaCor`) VALUES
(1, 'RGB)'),
(2, 'CMYK');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(20) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `preco` float DEFAULT NULL,
  `fotoCamiseta` varchar(100) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_tecido` int(11) DEFAULT NULL,
  `id_cor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `FK_idModelo` (`id_modelo`),
  KEY `FK_idTipo` (`id_tipo`),
  KEY `FK_idTecido` (`id_tecido`),
  KEY `FK_idCor` (`id_cor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_venda`
--

CREATE TABLE IF NOT EXISTS `produto_venda` (
  `id_produtoVenda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_ModEstampa` int(11) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  PRIMARY KEY (`id_produtoVenda`),
  KEY `FK_idModEstampa` (`id_ModEstampa`),
  KEY `FK_produto` (`id_produto`),
  KEY `FK_venda` (`id_venda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `promocao`
--

CREATE TABLE IF NOT EXISTS `promocao` (
  `id_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `dataInicial` datetime NOT NULL,
  `dataFinal` datetime NOT NULL,
  `precoPromocao` float NOT NULL,
  `promocao` varchar(30) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_promocao`),
  KEY `FK_idProduto` (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tamanho`
--

CREATE TABLE IF NOT EXISTS `tamanho` (
  `id_tamanho` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tamanho`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tecido`
--

CREATE TABLE IF NOT EXISTS `tecido` (
  `id_tecido` int(11) NOT NULL AUTO_INCREMENT,
  `tecido` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tecido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_contato`
--

CREATE TABLE IF NOT EXISTS `tipo_contato` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `tipo_contato`
--

INSERT INTO `tipo_contato` (`id_tipo`, `tipo`) VALUES
(1, 'Telefone'),
(2, 'Celular'),
(3, 'E-mail'),
(4, 'Facebook');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
