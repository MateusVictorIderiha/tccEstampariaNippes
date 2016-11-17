-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 17-Nov-2016 às 15:37
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
create database tccestamparia;
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
(1, 'Vermelho');

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
-- Estrutura da tabela `tcc_estoque`
--

CREATE TABLE `tcc_estoque` (
  `id_estoque` int(10) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_tamanho` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_estoque`
--

INSERT INTO `tcc_estoque` (`id_estoque`, `quantidade`, `id_produto`, `id_tamanho`) VALUES
(1, 11, 1, 1);

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
  `modeloEstampa` varchar(30) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_produtos`
--

CREATE TABLE `tcc_produtos` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `preco` float DEFAULT NULL,
  `fotoProduto` varchar(255) DEFAULT NULL,
  `id_modelo` int(10) UNSIGNED DEFAULT NULL,
  `material` varchar(30) DEFAULT NULL,
  `id_cor` int(10) UNSIGNED DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `tipoProduto` char(1) DEFAULT NULL,
  `personalizado` char(1) NOT NULL,
  `peso` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_produtos`
--

INSERT INTO `tcc_produtos` (`id_produto`, `nome`, `preco`, `fotoProduto`, `id_modelo`, `material`, `id_cor`, `categoria`, `tipoProduto`, `personalizado`, `peso`) VALUES
(1, 'Camiseta', 40, NULL, NULL, 'AlgodÃ£o', 1, 'Dia dos Pais', NULL, 'N', 0.1),
(2, 'Nippes', 20, 'produtos\\17-11-2016 0108\\img7.png', 1, '100% algodão', 1, 'Verão', NULL, 'N', 0.05);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc_produtovenda`
--

CREATE TABLE `tcc_produtovenda` (
  `quantidade` int(11) NOT NULL,
  `preco` float DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_ModEstampa` int(10) UNSIGNED DEFAULT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_venda` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc_produtovenda`
--

INSERT INTO `tcc_produtovenda` (`quantidade`, `preco`, `foto`, `id_ModEstampa`, `id_produto`, `id_venda`) VALUES
(3, NULL, NULL, NULL, 1, 1),
(4, NULL, NULL, NULL, 1, 2),
(4, NULL, NULL, NULL, 1, 3);

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
(1, 'M');

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
('45899604867', NULL, '123456', '561647246', '1998-05-21', 'Mateus Victor Ideriha Rego', 'uc', 1),
('12345678910', 'mateus@hotmail.com', '123456', '12345679', '2016-05-11', 'Mateus ASDASD', 'uc', 2),
('11155566677', 'renan@hotmail.com', '123456789', '12365478921', '2016-05-11', 'Renan Matos', 'uc', 3),
('12365474113', 'Natalia@hotamail.com', '25f9e794323b453885f5181f1b624d0b', '135464879', '2016-05-11', 'Natalia Silva', 'uc', 4);

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
(3, '2016-11-10 00:00:00', NULL, 'Aberto', 'V', NULL, NULL, 1, NULL, NULL, NULL);

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
-- Indexes for table `tcc_estoque`
--
ALTER TABLE `tcc_estoque`
  ADD PRIMARY KEY (`id_produto`,`id_tamanho`),
  ADD KEY `FK_idTamanho_estoque` (`id_tamanho`);

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
  ADD KEY `FK_idModelo_produtos` (`id_modelo`);

--
-- Indexes for table `tcc_produtovenda`
--
ALTER TABLE `tcc_produtovenda`
  ADD PRIMARY KEY (`id_venda`,`id_produto`),
  ADD KEY `FK_idProduto_prodVenda` (`id_produto`),
  ADD KEY `FK_ModEstampa_ProdVenda` (`id_ModEstampa`);

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
  MODIFY `id_cor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `tcc_modelo`
--
ALTER TABLE `tcc_modelo`
  MODIFY `id_modelo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tcc_modeloestampa`
--
ALTER TABLE `tcc_modeloestampa`
  MODIFY `id_ModEstampa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcc_produtos`
--
ALTER TABLE `tcc_produtos`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tcc_promocao`
--
ALTER TABLE `tcc_promocao`
  MODIFY `id_promocao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcc_tamanho`
--
ALTER TABLE `tcc_tamanho`
  MODIFY `id_tamanho` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tcc_tipomaterial`
--
ALTER TABLE `tcc_tipomaterial`
  MODIFY `id_material` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcc_usuario`
--
ALTER TABLE `tcc_usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tcc_vendas`
--
ALTER TABLE `tcc_vendas`
  MODIFY `id_venda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Limitadores para a tabela `tcc_estoque`
--
ALTER TABLE `tcc_estoque`
  ADD CONSTRAINT `FK_idProduto_estoque` FOREIGN KEY (`id_produto`) REFERENCES `tcc_produtos` (`id_produto`),
  ADD CONSTRAINT `FK_idTamanho_estoque` FOREIGN KEY (`id_tamanho`) REFERENCES `tcc_tamanho` (`id_tamanho`);

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
  ADD CONSTRAINT `FK_idModelo_produtos` FOREIGN KEY (`id_modelo`) REFERENCES `tcc_modelo` (`id_modelo`);

--
-- Limitadores para a tabela `tcc_produtovenda`
--
ALTER TABLE `tcc_produtovenda`
  ADD CONSTRAINT `FK_ModEstampa_ProdVenda` FOREIGN KEY (`id_ModEstampa`) REFERENCES `tcc_modeloestampa` (`id_ModEstampa`),
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
