-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/10/2021 às 14:34
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdOng`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbBeneficioFamilia`
--

CREATE TABLE `tbBeneficioFamilia` (
  `idBeneFamilia` int(11) NOT NULL,
  `idFamilia` int(11) NOT NULL,
  `idBeneficio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbBeneficioFamilia`
--

INSERT INTO `tbBeneficioFamilia` (`idBeneFamilia`, `idFamilia`, `idBeneficio`) VALUES
(1, 1, 2),
(2, 1, 3),
(4, 1, 2),
(5, 2, 2),
(6, 4, 1),
(7, 4, 3),
(8, 4, 13),
(9, 6, 1),
(10, 11, 2),
(11, 11, 13),
(12, 11, 14),
(13, 12, 2),
(14, 12, 14),
(15, 12, 17),
(16, 13, 2),
(17, 13, 14),
(18, 13, 16),
(19, 14, 1),
(20, 14, 14),
(21, 14, 16),
(22, 15, 2),
(23, 15, 14),
(24, 16, 14),
(25, 16, 16);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbBeneficios`
--

CREATE TABLE `tbBeneficios` (
  `idBeneficios` int(11) NOT NULL,
  `descBeneficios` varchar(2500) NOT NULL,
  `ativaBeneficio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbBeneficios`
--

INSERT INTO `tbBeneficios` (`idBeneficios`, `descBeneficios`, `ativaBeneficio`) VALUES
(1, 'Minha casa minha vida', 1),
(2, 'Aposentadoria', 1),
(14, 'Bolsa emprego', 1),
(16, 'Bolsa merenda', 1),
(17, 'Vale gás', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbCategoriaDoacao`
--

CREATE TABLE `tbCategoriaDoacao` (
  `idCategoriaDoacao` int(11) NOT NULL,
  `descCategoriaDoacao` varchar(100) NOT NULL,
  `ativaCategoriaDoacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbCategoriaDoacao`
--

INSERT INTO `tbCategoriaDoacao` (`idCategoriaDoacao`, `descCategoriaDoacao`, `ativaCategoriaDoacao`) VALUES
(5, 'Vestimentas', 1),
(6, 'Alimentícios', 1),
(12, 'Monetário', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbDoador`
--

CREATE TABLE `tbDoador` (
  `idDoador` int(11) NOT NULL,
  `nomeDoador` varchar(100) NOT NULL,
  `representanteDoador` varchar(100) DEFAULT NULL,
  `emailDoador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbDoador`
--

INSERT INTO `tbDoador` (`idDoador`, `nomeDoador`, `representanteDoador`, `emailDoador`) VALUES
(1, 'ANÔNIMO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbEntradaDoacao`
--

CREATE TABLE `tbEntradaDoacao` (
  `idEntradaDoacao` int(11) NOT NULL,
  `idItemDoacao` int(11) NOT NULL,
  `dataEntradaDoacao` date NOT NULL,
  `qtdeEntradaDoacao` int(255) NOT NULL,
  `idDoador` int(11) NOT NULL,
  `ativaEntradaDoacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbEntradaDoacao`
--

INSERT INTO `tbEntradaDoacao` (`idEntradaDoacao`, `idItemDoacao`, `dataEntradaDoacao`, `qtdeEntradaDoacao`, `idDoador`, `ativaEntradaDoacao`) VALUES
(2, 12, '2021-09-14', 600, 1, 0),
(3, 9, '2021-10-04', 5, 1, 1),
(4, 15, '2020-12-24', 50, 1, 1),
(5, 12, '2021-10-04', 700, 1, 1),
(6, 12, '2021-09-27', 6, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbFamilia`
--

CREATE TABLE `tbFamilia` (
  `idFamilia` int(11) NOT NULL,
  `chefeFamilia` varchar(100) NOT NULL,
  `idPrioridade` int(11) NOT NULL,
  `rendaFamilia` varchar(30) NOT NULL,
  `cepFamilia` varchar(10) NOT NULL,
  `bairroFamilia` varchar(50) NOT NULL,
  `logradouroFamilia` varchar(50) NOT NULL,
  `numeroFamilia` int(11) NOT NULL,
  `complementoFamilia` varchar(30) DEFAULT NULL,
  `referenciaFamilia` varchar(100) DEFAULT NULL,
  `situacaoImovelFamilia` varchar(30) NOT NULL,
  `ativaFamilia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbFamilia`
--

INSERT INTO `tbFamilia` (`idFamilia`, `chefeFamilia`, `idPrioridade`, `rendaFamilia`, `cepFamilia`, `bairroFamilia`, `logradouroFamilia`, `numeroFamilia`, `complementoFamilia`, `referenciaFamilia`, `situacaoImovelFamilia`, `ativaFamilia`) VALUES
(11, 'Fernando Diogo Freita', 1, '01 a 02 Salários mínimos', '49043359', 'São Conrado ', 'Travessa Q1 ', 952, '---', '---', 'Financiada', 1),
(12, 'Luna Josefa Fátima Pires', 2, '01 a 02 Salários mínimos', '58062200', 'Paratibe ', 'Rua Aposentada Josefa Mesquita da Silva', 213, '5', '', 'Alugada', 1),
(13, 'Miguel Kaique Levi Viana', 3, '03 a 05 Salários mínimos', '49007211', 'Zona de Expansão (Areia Branca)', 'Rua C ', 1214, '345', '', 'Financiada', 1),
(14, 'Elza Stella Clarice dos Santos', 1, '01 a 02 Salários mínimos', '79046002', 'Residencial Damha II ', 'Alameda Recanto das Garças', 469, '', 'Mercado Bigboom', 'Alugada', 1),
(15, 'Isabelly Adriana Caroline', 2, '03 a 05 Salários mínimos', '88064615', 'Ribeirão da Ilha', 'Servidão Melicia Rosalina Pinho', 434, '', '', 'Financiada', 1),
(16, 'Kaique Fernando Lopes', 1, 'Menos de 01 Salário mínimo', '35703386', 'Cidade de Deus', 'Rua Ataíde Duarte', 342, '', '', 'Cedida', 1),
(17, 'Rebeca Emily Almada', 1, 'Menos de 01 Salário mínimo', '70684460', 'Setor Noroeste', 'CRNW 505 Bloco B Lote 1', 12, '15', '', 'Cedida', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbIntegrantes`
--

CREATE TABLE `tbIntegrantes` (
  `idIntegrante` int(11) NOT NULL,
  `nomeIntegrante` varchar(100) DEFAULT NULL,
  `dataNascIntegrante` date DEFAULT NULL,
  `generoIntegrante` varchar(30) NOT NULL,
  `corIntegrante` varchar(15) NOT NULL,
  `escolaridadeIntegrante` varchar(50) NOT NULL,
  `estadoCivilIntegrante` varchar(30) NOT NULL,
  `rgIntegrante` varchar(30) NOT NULL,
  `cpfIntegrante` varchar(30) NOT NULL,
  `chefeIntegrante` tinyint(1) DEFAULT NULL,
  `idFamilia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbIntegrantes`
--

INSERT INTO `tbIntegrantes` (`idIntegrante`, `nomeIntegrante`, `dataNascIntegrante`, `generoIntegrante`, `corIntegrante`, `escolaridadeIntegrante`, `estadoCivilIntegrante`, `rgIntegrante`, `cpfIntegrante`, `chefeIntegrante`, `idFamilia`) VALUES
(12, 'Carolina Tereza Alice Campos', '2003-10-15', 'Feminino cis', 'Parda', 'Ensino médio concluído', 'Solteiro(a)', '441378584', '94721652224', 1, 11),
(13, 'Carolina Tereza Alice Campos', '2003-10-15', 'Feminino cis', 'Parda', 'Ensino superior inconcluído/cursando', 'Morando Junto', '441378584', '94721652224', 0, 11),
(14, 'Gabriela Eliane Cecília Assis', '1970-03-03', 'Feminino cis', 'Parda', '', 'Solteiro(a)', 'asafggASDFG', '', 0, 11),
(18, 'Luna Josefa Fátima Pires', '1997-02-12', 'Feminino cis', 'Parda', 'Ensino médio concluído', 'Solteiro(a)', '486863955', '56131510407', 1, 12),
(19, 'Analu Carla Sophia', '1999-01-20', 'Feminino cis', 'Branca', '', 'Solteiro(a)', '208625501', '70712429336', 0, 12),
(20, 'Paulo Afonso', '2002-10-22', 'Masculino cis', 'Preta', 'Ensino superior inconcluído/cursando', 'Solteiro(a)', '161303444', '46860862998', 0, 12),
(21, 'Miguel Kaique Levi Viana', '1992-04-14', 'Masculino cis', 'Parda', 'Ensino superior concluído', 'Casado(a)', '73409819428', '73409819428', 1, 13),
(22, 'Francisca Jéssica Josefa', '1994-04-13', '', 'Cor (IBGE)', 'Ensino médio concluído', 'Casado(a)', '452098233', '34660209300', 0, 13),
(23, 'Elza Stella Clarice dos Santos', '1988-08-17', 'Masculino cis', 'Branca', 'Sem instrução', 'Casado(a)', '216191968', '39231206133', 1, 14),
(24, 'Ruan Raimundo dos Santos', '2009-06-23', 'Masculino cis', 'Parda', 'Ensino fundamental concluído', 'Solteiro(a)', '500712402', '47359535409', 0, 14),
(25, 'Isabelly Adriana Caroline', '1999-01-13', 'Feminino cis', 'Branca', 'Ensino médio inconcluído/cursando', 'Solteiro(a)', '500712402', '47359535409', 1, 15),
(26, 'Kaique Fernando Lopes', '1975-07-16', 'Prefere não identificar', 'Branca', 'Ensino fundamental concluído', 'Casado(a)', '238697861', '70626312809', 1, 16),
(27, 'Rebeca Emily Almada', '2002-05-15', 'Travesti', 'Preta', 'Ensino médio concluído', 'União Estável', '307447522', '39437361487', 1, 17);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbItemDoacao`
--

CREATE TABLE `tbItemDoacao` (
  `idItemDoacao` int(11) NOT NULL,
  `idCategoriaDoacao` int(11) NOT NULL,
  `descItemDoacao` varchar(2500) NOT NULL,
  `AtivaItemDoacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbItemDoacao`
--

INSERT INTO `tbItemDoacao` (`idItemDoacao`, `idCategoriaDoacao`, `descItemDoacao`, `AtivaItemDoacao`) VALUES
(9, 5, 'Casaco', 1),
(12, 6, 'Enlatados', 1),
(15, 6, 'Cesta básica', 1),
(16, 5, 'Cobertor', 1),
(18, 6, 'Cesta de natal', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbPrioridade`
--

CREATE TABLE `tbPrioridade` (
  `idPrioridade` int(11) NOT NULL,
  `descPrioridade` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbPrioridade`
--

INSERT INTO `tbPrioridade` (`idPrioridade`, `descPrioridade`) VALUES
(1, 'Vermelho'),
(2, 'Amarelo'),
(3, 'Verde');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbSaidaDoacao`
--

CREATE TABLE `tbSaidaDoacao` (
  `idSaidaDoacao` int(11) NOT NULL,
  `idFamilia` int(11) NOT NULL,
  `dataSaidaDoacao` date NOT NULL,
  `qtdeSaidaDoacao` int(255) NOT NULL,
  `idEntradaDoacao` int(11) NOT NULL,
  `ativaSaidaDoacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbSaidaDoacao`
--

INSERT INTO `tbSaidaDoacao` (`idSaidaDoacao`, `idFamilia`, `dataSaidaDoacao`, `qtdeSaidaDoacao`, `idEntradaDoacao`, `ativaSaidaDoacao`) VALUES
(1, 3, '2021-09-15', 5, 2, 1),
(2, 3, '2021-09-08', 5, 2, 0),
(3, 3, '2021-09-15', 5, 2, 1),
(4, 11, '2021-03-23', 300, 3, 1),
(5, 11, '2021-10-05', 5, 5, 1),
(6, 11, '2021-10-19', 6, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbTelefone`
--

CREATE TABLE `tbTelefone` (
  `idTelefone` int(11) NOT NULL,
  `idFamilia` int(11) NOT NULL,
  `numeroTelefone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbTelefoneDoador`
--

CREATE TABLE `tbTelefoneDoador` (
  `idTelefoneDoador` int(11) NOT NULL,
  `idDoador` int(11) NOT NULL,
  `numeroTelefoneDoador` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbUsuarios`
--

CREATE TABLE `tbUsuarios` (
  `idUsuario` int(11) NOT NULL,
  `loginUsuario` varchar(70) NOT NULL,
  `senhaUsuario` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbUsuarios`
--

INSERT INTO `tbUsuarios` (`idUsuario`, `loginUsuario`, `senhaUsuario`) VALUES
(3, 'Admin', 'ihelp123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbBeneficioFamilia`
--
ALTER TABLE `tbBeneficioFamilia`
  ADD PRIMARY KEY (`idBeneFamilia`),
  ADD KEY `idFamilia` (`idFamilia`),
  ADD KEY `idBeneficio` (`idBeneficio`);

--
-- Índices de tabela `tbBeneficios`
--
ALTER TABLE `tbBeneficios`
  ADD PRIMARY KEY (`idBeneficios`);

--
-- Índices de tabela `tbCategoriaDoacao`
--
ALTER TABLE `tbCategoriaDoacao`
  ADD PRIMARY KEY (`idCategoriaDoacao`);

--
-- Índices de tabela `tbDoador`
--
ALTER TABLE `tbDoador`
  ADD PRIMARY KEY (`idDoador`);

--
-- Índices de tabela `tbEntradaDoacao`
--
ALTER TABLE `tbEntradaDoacao`
  ADD PRIMARY KEY (`idEntradaDoacao`),
  ADD KEY `idItemDoacao` (`idItemDoacao`),
  ADD KEY `idDoador` (`idDoador`);

--
-- Índices de tabela `tbFamilia`
--
ALTER TABLE `tbFamilia`
  ADD PRIMARY KEY (`idFamilia`),
  ADD KEY `idPrioridade` (`idPrioridade`);

--
-- Índices de tabela `tbIntegrantes`
--
ALTER TABLE `tbIntegrantes`
  ADD PRIMARY KEY (`idIntegrante`),
  ADD KEY `idFamilia` (`idFamilia`);

--
-- Índices de tabela `tbItemDoacao`
--
ALTER TABLE `tbItemDoacao`
  ADD PRIMARY KEY (`idItemDoacao`),
  ADD KEY `idCategoriaDoacao` (`idCategoriaDoacao`);

--
-- Índices de tabela `tbPrioridade`
--
ALTER TABLE `tbPrioridade`
  ADD PRIMARY KEY (`idPrioridade`);

--
-- Índices de tabela `tbSaidaDoacao`
--
ALTER TABLE `tbSaidaDoacao`
  ADD PRIMARY KEY (`idSaidaDoacao`),
  ADD KEY `idFamilia` (`idFamilia`),
  ADD KEY `idEntradaDoacao` (`idEntradaDoacao`);

--
-- Índices de tabela `tbTelefone`
--
ALTER TABLE `tbTelefone`
  ADD PRIMARY KEY (`idTelefone`),
  ADD KEY `idFamilia` (`idFamilia`);

--
-- Índices de tabela `tbTelefoneDoador`
--
ALTER TABLE `tbTelefoneDoador`
  ADD PRIMARY KEY (`idTelefoneDoador`),
  ADD KEY `idDoador` (`idDoador`);

--
-- Índices de tabela `tbUsuarios`
--
ALTER TABLE `tbUsuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbBeneficioFamilia`
--
ALTER TABLE `tbBeneficioFamilia`
  MODIFY `idBeneFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tbBeneficios`
--
ALTER TABLE `tbBeneficios`
  MODIFY `idBeneficios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbCategoriaDoacao`
--
ALTER TABLE `tbCategoriaDoacao`
  MODIFY `idCategoriaDoacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbDoador`
--
ALTER TABLE `tbDoador`
  MODIFY `idDoador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbEntradaDoacao`
--
ALTER TABLE `tbEntradaDoacao`
  MODIFY `idEntradaDoacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbFamilia`
--
ALTER TABLE `tbFamilia`
  MODIFY `idFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbIntegrantes`
--
ALTER TABLE `tbIntegrantes`
  MODIFY `idIntegrante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tbItemDoacao`
--
ALTER TABLE `tbItemDoacao`
  MODIFY `idItemDoacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbPrioridade`
--
ALTER TABLE `tbPrioridade`
  MODIFY `idPrioridade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbSaidaDoacao`
--
ALTER TABLE `tbSaidaDoacao`
  MODIFY `idSaidaDoacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbTelefone`
--
ALTER TABLE `tbTelefone`
  MODIFY `idTelefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbTelefoneDoador`
--
ALTER TABLE `tbTelefoneDoador`
  MODIFY `idTelefoneDoador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbUsuarios`
--
ALTER TABLE `tbUsuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbBeneficioFamilia`
--
ALTER TABLE `tbBeneficioFamilia`
  ADD CONSTRAINT `tbBeneficioFamilia_ibfk_1` FOREIGN KEY (`idFamilia`) REFERENCES `tbFamilia` (`idFamilia`),
  ADD CONSTRAINT `tbBeneficioFamilia_ibfk_2` FOREIGN KEY (`idBeneficio`) REFERENCES `tbBeneficios` (`idBeneficios`);

--
-- Restrições para tabelas `tbEntradaDoacao`
--
ALTER TABLE `tbEntradaDoacao`
  ADD CONSTRAINT `tbEntradaDoacao_ibfk_1` FOREIGN KEY (`idDoador`) REFERENCES `tbDoador` (`idDoador`),
  ADD CONSTRAINT `tbEntradaDoacao_ibfk_2` FOREIGN KEY (`idItemDoacao`) REFERENCES `tbItemDoacao` (`idItemDoacao`);

--
-- Restrições para tabelas `tbFamilia`
--
ALTER TABLE `tbFamilia`
  ADD CONSTRAINT `tbFamilia_ibfk_1` FOREIGN KEY (`idPrioridade`) REFERENCES `tbPrioridade` (`idPrioridade`);

--
-- Restrições para tabelas `tbIntegrantes`
--
ALTER TABLE `tbIntegrantes`
  ADD CONSTRAINT `tbIntegrantes_ibfk_1` FOREIGN KEY (`idFamilia`) REFERENCES `tbFamilia` (`idFamilia`);

--
-- Restrições para tabelas `tbItemDoacao`
--
ALTER TABLE `tbItemDoacao`
  ADD CONSTRAINT `tbItemDoacao_ibfk_1` FOREIGN KEY (`idCategoriaDoacao`) REFERENCES `tbCategoriaDoacao` (`idCategoriaDoacao`);

--
-- Restrições para tabelas `tbSaidaDoacao`
--
ALTER TABLE `tbSaidaDoacao`
  ADD CONSTRAINT `tbSaidaDoacao_ibfk_1` FOREIGN KEY (`idFamilia`) REFERENCES `tbFamilia` (`idFamilia`),
  ADD CONSTRAINT `tbSaidaDoacao_ibfk_2` FOREIGN KEY (`idEntradaDoacao`) REFERENCES `tbEntradaDoacao` (`idEntradaDoacao`);

--
-- Restrições para tabelas `tbTelefone`
--
ALTER TABLE `tbTelefone`
  ADD CONSTRAINT `tbTelefone_ibfk_1` FOREIGN KEY (`idFamilia`) REFERENCES `tbFamilia` (`idFamilia`);

--
-- Restrições para tabelas `tbTelefoneDoador`
--
ALTER TABLE `tbTelefoneDoador`
  ADD CONSTRAINT `tbTelefoneDoador_ibfk_1` FOREIGN KEY (`idDoador`) REFERENCES `tbDoador` (`idDoador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
