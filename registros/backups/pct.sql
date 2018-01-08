-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jan-2018 às 18:33
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pct`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_adiantamentos`
--

CREATE TABLE `tb_adiantamentos` (
  `ID` int(11) NOT NULL,
  `ID_SERVIDOR_BENEFICIARIO` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `VL_RECEBIDO` decimal(10,2) NOT NULL,
  `DT_RECEBIMENTO` date NOT NULL,
  `NM_ORDEM_BANCARIA` varchar(255) NOT NULL,
  `VL_MATERIAL_CONSUMO` decimal(10,2) NOT NULL,
  `VL_SERVICOS_PF` decimal(10,2) NOT NULL,
  `VL_SERVICOS_PJ` decimal(10,2) NOT NULL,
  `VL_DEVOLVIDO` decimal(10,2) NOT NULL,
  `DT_PRESTACAO_CONTAS` date NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_adiantamentos`
--

INSERT INTO `tb_adiantamentos` (`ID`, `ID_SERVIDOR_BENEFICIARIO`, `ID_ORGAO`, `VL_RECEBIDO`, `DT_RECEBIMENTO`, `NM_ORDEM_BANCARIA`, `VL_MATERIAL_CONSUMO`, `VL_SERVICOS_PF`, `VL_SERVICOS_PJ`, `VL_DEVOLVIDO`, `DT_PRESTACAO_CONTAS`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(1, 2, 8, '2620.55', '2017-12-12', '0003OB2017', '1000.00', '1500.55', '120.00', '142.88', '2017-12-21', '2017-12-12', 1),
(3, 3, 8, '9100.00', '2017-12-12', '7000OB2017', '5000.00', '4000.00', '100.00', '5850.00', '2017-12-13', '2017-12-12', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_classificacao_contabil_rma`
--

CREATE TABLE `tb_classificacao_contabil_rma` (
  `ID` int(11) NOT NULL,
  `NM_CLASSIFICACAO_CONTABIL` varchar(255) NOT NULL,
  `NM_DENOMINACAO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tb_classificacao_contabil_rma`
--

INSERT INTO `tb_classificacao_contabil_rma` (`ID`, `NM_CLASSIFICACAO_CONTABIL`, `NM_DENOMINACAO`) VALUES
(1, '3.3.3.9.0.30.07', 'GÊNERO ALIMENTICIO\r\n\r\n'),
(2, '3.3.3.9.030.16', 'EXPEDIENTE'),
(3, '3.3.3.9.0.30.17', 'PROCESSAMENTO DE DADOS'),
(4, '3.3.3.9.0.30.22', 'LIMPEZA E PROD. HIGIENIZAÇÃO'),
(5, '3.3.3.9.0.30.26', 'ELETRO E ELETRÔNICO'),
(6, '3.3.3.9.0.30.28', 'PROTEÇÃO E SEGURANÇA'),
(7, '3.3.3.9.0.30.21', 'COPA E COZINHA'),
(8, '3.3.3.9.0.30.23', 'UNIFORMES,TECIDOS E AVIAMENTOS'),
(9, '3.3.3.9.0.30.30', 'MATERIAL PARA COMUNICAÇÕES'),
(10, '3.3.3.9.0.30.44', 'MATERIAL DE SINALIZAÇÃO VISUAL E OUTROS'),
(11, '3.3.3.9.030.35', 'MATERIAL DE LABORATÓRIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_classificacao_contabil_rmb`
--

CREATE TABLE `tb_classificacao_contabil_rmb` (
  `ID` int(11) NOT NULL,
  `NM_CLASSIFICACAO_CONTABIL` varchar(255) NOT NULL,
  `NM_DENOMINACAO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tb_classificacao_contabil_rmb`
--

INSERT INTO `tb_classificacao_contabil_rmb` (`ID`, `NM_CLASSIFICACAO_CONTABIL`, `NM_DENOMINACAO`) VALUES
(1, '1.2.3.1.1.01.06', 'APARELHOS E EQUIPAMENTOS DE COMUNICAÇÃO'),
(2, '1.2.3.1.1.01.30', 'MÁQUINAS E EQUIPAMENTOS ENERGÉTICOS'),
(3, '1.2.3.1.1.01.32', 'MÁQUINAS E EQUIPAMENTOS GRÁFICOS'),
(4, '1.2.3.1.1.01.39', 'EQUIPAMENTOS E UTENSÍLIOS HIDRÁULICOS E ELÉTRICOS'),
(5, '1.2.3.1.1.02.35', 'EQUIPAMENTOS DE PROCESSAMENTO DE DADOS'),
(6, '1.2.3.1.1.03.12', 'APARELHOS E UTENSÍLIOS DOMÉSTICOS'),
(7, '1.2.3.1.1.03.34', 'MÁQUINAS UTENSÍLIOS E EQUIPAMENTOS DIVERSOS'),
(8, '1.2.3.1.1.03.36', 'MÁQUINAS E UTENSÍLIOS DE ESCRITÓRIO'),
(9, '1.2.3.1.1.03.42', 'MOBILIÁRIO EM GERAL'),
(10, '1.2.3.1.1.04.18', 'COLEÇÕES E MATERIAIS BIBLIOGRÁFICOS'),
(11, '1.2.3.1.1.04.33', 'EQUIPAMENTOS PARA ÁUDIO VÍDEO E FOTO'),
(12, '1.2.3.1.1.99.51', 'PEÇAS NAO INCORPORÁVEIS A IMÓVEIS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_combustivel`
--

CREATE TABLE `tb_combustivel` (
  `ID` int(11) NOT NULL,
  `ID_VEICULO` int(11) NOT NULL,
  `DT_ABASTECIMENTO` date NOT NULL,
  `NR_TOTAL_LITROS_ABASTECIDOS` decimal(10,2) NOT NULL,
  `VL_LITRO_ABASTECIDO` decimal(10,2) NOT NULL,
  `NR_COTA_SEMANAL` decimal(10,2) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_combustivel`
--

INSERT INTO `tb_combustivel` (`ID`, `ID_VEICULO`, `DT_ABASTECIMENTO`, `NR_TOTAL_LITROS_ABASTECIDOS`, `VL_LITRO_ABASTECIDO`, `NR_COTA_SEMANAL`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(1, 1, '2017-12-15', '25.00', '3.98', '56.00', '2017-12-15', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contratos`
--

CREATE TABLE `tb_contratos` (
  `ID` int(11) NOT NULL,
  `ID_EMPRESA` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_GESTOR` varchar(255) NOT NULL,
  `NM_OBJETO` varchar(255) NOT NULL,
  `NM_MODALIDADE` varchar(255) NOT NULL,
  `NM_PROCESSO` varchar(255) NOT NULL,
  `NM_VINCULACAO` varchar(255) NOT NULL,
  `DT_ASSINATURA` date NOT NULL,
  `DT_INICIO` date NOT NULL,
  `DT_PUBLICACAO` date NOT NULL,
  `DT_TERMINO` date NOT NULL,
  `NM_NUMERO_CONTRATO` varchar(255) NOT NULL,
  `NM_NUMERO_CONTRATO_SIAFI` varchar(255) NOT NULL,
  `VL_GLOBAL` decimal(10,2) NOT NULL,
  `VL_EMPENHADO` decimal(10,2) NOT NULL,
  `VL_LIQUIDADO` decimal(10,2) NOT NULL,
  `VL_PAGO` decimal(10,2) NOT NULL,
  `BL_PRORROGAVEL` tinyint(1) NOT NULL,
  `NR_TERMO_ADITIVO` int(11) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_contratos`
--

INSERT INTO `tb_contratos` (`ID`, `ID_EMPRESA`, `ID_ORGAO`, `NM_GESTOR`, `NM_OBJETO`, `NM_MODALIDADE`, `NM_PROCESSO`, `NM_VINCULACAO`, `DT_ASSINATURA`, `DT_INICIO`, `DT_PUBLICACAO`, `DT_TERMINO`, `NM_NUMERO_CONTRATO`, `NM_NUMERO_CONTRATO_SIAFI`, `VL_GLOBAL`, `VL_EMPENHADO`, `VL_LIQUIDADO`, `VL_PAGO`, `BL_PRORROGAVEL`, `NR_TERMO_ADITIVO`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(13, 3, 1, 'TESTE LALA', 'TESE', 'PREGÃO', '00000 000000/0000', 'TESTE', '2017-12-04', '2017-12-04', '2017-12-04', '2017-12-04', '000/0000', '000/0000', '30000.00', '3000.00', '30.00', '3700.00', 0, 11, '2017-12-19', 1),
(14, 3, 8, 'JOãO DA SILVA', 'REFORMA DA CGE', 'PREGÃO', '00000 000000/0000', 'VINCULAçãO', '2017-12-13', '2017-12-30', '2017-12-31', '2018-01-16', '000/0000', '000/0000', '5000.00', '10000.00', '3000.00', '1000.00', 0, 1000, '2017-12-18', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_convenios`
--

CREATE TABLE `tb_convenios` (
  `ID` int(11) NOT NULL,
  `NM_TIPO` varchar(255) NOT NULL,
  `NM_CONCEDENTE` varchar(255) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `BL_FECOEP` tinyint(1) NOT NULL,
  `NM_OBJETO` varchar(255) NOT NULL,
  `DT_INICIO` date NOT NULL,
  `DT_TERMINO` date NOT NULL,
  `NM_NUMERO_SIAFE` varchar(255) NOT NULL,
  `NM_NUMERO_SICONV` varchar(255) NOT NULL,
  `NM_NUMERO_SIAFI` varchar(255) NOT NULL,
  `VL_PARTIDA_TOTAL` decimal(10,2) NOT NULL,
  `VL_PARTIDA_LIBERADO` decimal(10,2) NOT NULL,
  `VL_CONTRAPARTIDA_TOTAL` decimal(10,2) NOT NULL,
  `VL_CONTRAPARTIDA_LIBERADO` decimal(10,2) NOT NULL,
  `VL_ADITIVO` decimal(10,2) NOT NULL,
  `DT_PRAZO_ADITIVO` date NOT NULL,
  `DT_ULTIMA_LIBERACAO` date NOT NULL,
  `DT_PRORROGACAO` date NOT NULL,
  `DT_PRESTACAO_CONTAS` date NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_correicao`
--

CREATE TABLE `tb_correicao` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_NUMERO_PORTARIA` varchar(255) NOT NULL,
  `DT_PUBLICACAO_PORTARIA` date NOT NULL,
  `NM_TIPO_PROCEDIMENTO` enum('SINDICANCIA ADMINISTRATIVA','PROCESSO ADMINISTRATIVO DISCIPLINAR') NOT NULL,
  `NM_NUMERO_PROCESSO` varchar(255) NOT NULL,
  `DT_INSTAURACAO` date NOT NULL,
  `NM_SITUACAO` varchar(255) NOT NULL,
  `NM_NUMERO_DECRETO` varchar(255) NOT NULL,
  `DT_PUBLICACAO_DECRETO` date NOT NULL,
  `NM_PENALIDADE` enum('ARQUIVAMENTO DE PROCESSO','APLICACAO DE PENALIDADE E ADVERTENCIA, OU SUSPENSAO ATE 30 DIAS','INSTAURACAO DE UM PAD','ADVERTENCIA','SUSPENSAO','DEMISSAO','CASSSACAO DE APOSENTADORIA OU DISPONIBILIDADE','DESTITUICAO DE FUNCAO COMISSIONADA') NOT NULL,
  `NM_MOTIVO` varchar(255) NOT NULL,
  `NM_CARGO_OCUPADO` varchar(255) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_despesas`
--

CREATE TABLE `tb_despesas` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `ID_DESPESA` int(11) NOT NULL,
  `NR_MES` int(2) NOT NULL,
  `NR_ANO` year(4) NOT NULL,
  `DS_DESPESA` varchar(255) NOT NULL,
  `VL_DESPESA` decimal(20,2) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tb_despesas`
--

INSERT INTO `tb_despesas` (`ID`, `ID_ORGAO`, `ID_DESPESA`, `NR_MES`, `NR_ANO`, `DS_DESPESA`, `VL_DESPESA`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(6, 8, 40, 1, 2018, 'SDASDASDAS', '10000.00', '2018-01-03', 1),
(7, 8, 23, 1, 2018, 'SDADASDSA', '30000.00', '2018-01-03', 1),
(8, 8, 2, 1, 2018, 'DSDASDAS', '400.00', '2018-01-03', 1),
(9, 15, 2, 1, 2018, 'SADASDASD', '900.00', '2018-01-03', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_diarias`
--

CREATE TABLE `tb_diarias` (
  `ID` int(11) NOT NULL,
  `ID_SERVIDOR_BENEFICIARIO` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_DESTINO` varchar(255) NOT NULL,
  `NM_OBJETIVO` varchar(255) NOT NULL,
  `NM_MEIO_TRANSPORTE` varchar(255) NOT NULL,
  `DT_INICIO` date NOT NULL,
  `NR_DIARIAS` decimal(10,2) NOT NULL,
  `NM_TIPO` varchar(255) NOT NULL,
  `VL_PAGO` decimal(10,2) NOT NULL,
  `NM_NUMERO_PORTARIA` varchar(255) NOT NULL,
  `DT_PUBLICACAO` date NOT NULL,
  `DT_PRESTACAO_CONTADT_PRESTACAO_CONTAS` date NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_diarias`
--

INSERT INTO `tb_diarias` (`ID`, `ID_SERVIDOR_BENEFICIARIO`, `ID_ORGAO`, `NM_DESTINO`, `NM_OBJETIVO`, `NM_MEIO_TRANSPORTE`, `DT_INICIO`, `NR_DIARIAS`, `NM_TIPO`, `VL_PAGO`, `NM_NUMERO_PORTARIA`, `DT_PUBLICACAO`, `DT_PRESTACAO_CONTADT_PRESTACAO_CONTAS`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(16, 2, 8, 'SãO PAULO - SP', 'ODP', 'AEREO', '2017-03-01', '18.00', 'B2', '4620.00', '3231212/2017', '2017-02-28', '0000-00-00', '2017-11-24', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_empresas`
--

CREATE TABLE `tb_empresas` (
  `ID` int(11) NOT NULL,
  `NM_EMPRESA` varchar(255) NOT NULL,
  `CD_EMPRESA` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_empresas`
--

INSERT INTO `tb_empresas` (`ID`, `NM_EMPRESA`, `CD_EMPRESA`) VALUES
(3, 'CONSERG/EMPR PROM DE SERV TERC. E OBRAS ENG.', '02.297.645/0001-63');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupos`
--

CREATE TABLE `tb_grupos` (
  `ID` int(11) NOT NULL,
  `NM_GRUPO` varchar(255) NOT NULL,
  `NM_NIVEL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_grupos`
--

INSERT INTO `tb_grupos` (`ID`, `NM_GRUPO`, `NM_NIVEL`) VALUES
(1, 'I', 'CGGC'),
(2, 'I', 'DG'),
(3, 'I', 'RE'),
(4, 'I', 'SE'),
(5, 'I', 'SEES'),
(6, 'I', 'DGA'),
(7, 'I', 'DIP'),
(8, 'I', 'GTR-1'),
(9, 'I', 'PG'),
(10, 'I', 'PJC'),
(11, 'I', 'SEE'),
(12, 'I', 'VRE'),
(13, 'II', 'SUP-S'),
(14, 'II', 'ASEG'),
(15, 'II', 'SUP-1'),
(16, 'II', 'AEG-1'),
(17, 'II', 'ASEC'),
(18, 'II', 'CCE'),
(19, 'II', 'DIRE'),
(20, 'II', 'PGA'),
(21, 'II', 'SUP-2'),
(22, 'II', 'ASE-1'),
(23, 'II', 'COE-1'),
(24, 'II', 'GERE'),
(25, 'II', 'ATE'),
(26, 'II', 'CHG'),
(27, 'II', 'CRG'),
(28, 'II', 'CRG-1'),
(29, 'II', 'GTR-3'),
(30, 'II', 'SUP-3'),
(31, 'II', 'VPJC'),
(32, 'II', 'ASCI'),
(33, 'II', 'AGC'),
(34, 'II', 'ACI-1'),
(35, 'II', 'AEG-2'),
(36, 'II', 'ASE-2'),
(37, 'II', 'ASSE-2'),
(38, 'II', 'DCSP'),
(39, 'II', 'PRE-1'),
(40, 'II', 'SGJC'),
(41, 'II', 'AG'),
(42, 'II', 'AGT'),
(43, 'II', 'ASSUP'),
(44, 'II', 'AEG-3'),
(45, 'II', 'ASE-3'),
(46, 'II', 'COJ'),
(47, 'II', 'COS-1'),
(48, 'II', 'GER'),
(49, 'II', 'CRG-2'),
(50, 'II', 'OUV-1'),
(51, 'II', 'PRE-2'),
(52, 'II', 'Efetivo Ocupante de Cargo de Nível Superior'),
(53, 'II', 'Membro de Órgão Colegiado Integrante do Poder Executivo'),
(54, 'III', 'AE'),
(55, 'III', 'ASSI'),
(56, 'III', 'ASSP'),
(57, 'III', 'ASTTE'),
(58, 'III', 'AGG'),
(59, 'III', 'ASC-1'),
(60, 'III', 'ASSC'),
(61, 'III', 'ASTT'),
(62, 'III', 'ACI-2'),
(63, 'III', 'ASUNC-1'),
(64, 'III', 'DCE'),
(65, 'III', 'OUV-2'),
(66, 'III', 'SUPE'),
(67, 'III', 'AS-1'),
(68, 'III', 'OUV-3'),
(69, 'III', 'AST-1'),
(70, 'III', 'AS-2'),
(71, 'III', 'AST-2'),
(72, 'III', 'ASUNC-2'),
(73, 'III', 'CRG-3'),
(74, 'III', 'AAG'),
(75, 'III', 'AGES'),
(76, 'III', 'ASA'),
(77, 'IV', 'AS-3'),
(78, 'IV', 'AST-3'),
(79, 'IV', 'AGS'),
(80, 'IV', 'AS-4'),
(81, 'IV', 'AST-4'),
(82, 'IV', 'ASTI'),
(83, 'IV', 'Efetivo Ocupante de Cargo de Nível Médio e Elementar'),
(84, 'sem grupo', 'sem nível');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lai`
--

CREATE TABLE `tb_lai` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_NUMERO_PROCESSO` varchar(255) NOT NULL,
  `NM_NUMERO_PROTOCOLO` varchar(255) NOT NULL,
  `NM_CANAL_ACESSO` enum('FISICO','TELEFONE','SITE','') NOT NULL,
  `NM_ASSUNTO` varchar(255) NOT NULL,
  `DT_ABERTURA_PROCESSO` date NOT NULL,
  `DT_RECEBIMENTO_SOLICITACAO` date NOT NULL,
  `DT_FINAL_EXPEDICAO_RESPOSTA` date NOT NULL,
  `DT_PRORROGACAO` date NOT NULL,
  `DT_ENVIO_RESPOSTA` date NOT NULL,
  `DT_FINAL_RECEBIMENTO_RECURSO` date NOT NULL,
  `NM_TIPO_PESSOA` enum('PESSOA FISICA','PESSOA JURIDICA','','') NOT NULL,
  `ID_UF` int(11) NOT NULL,
  `NM_SITUACAO` varchar(255) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_lai`
--

INSERT INTO `tb_lai` (`ID`, `ID_ORGAO`, `NM_NUMERO_PROCESSO`, `NM_NUMERO_PROTOCOLO`, `NM_CANAL_ACESSO`, `NM_ASSUNTO`, `DT_ABERTURA_PROCESSO`, `DT_RECEBIMENTO_SOLICITACAO`, `DT_FINAL_EXPEDICAO_RESPOSTA`, `DT_PRORROGACAO`, `DT_ENVIO_RESPOSTA`, `DT_FINAL_RECEBIMENTO_RECURSO`, `NM_TIPO_PESSOA`, `ID_UF`, `NM_SITUACAO`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(2, 8, '111111', '2222222', 'FISICO', 'ASSUNTO DA LAI', '2017-12-01', '2017-12-03', '2017-12-05', '2017-12-07', '2017-12-09', '2017-12-17', 'PESSOA FISICA', 18, 'SITUAçãO DO SOLICITANTE', '2018-01-02', 3),
(3, 8, '1213234134', '2222222', 'FISICO', 'ASSUNTO DA LAI', '2018-01-04', '2018-01-20', '2018-01-30', '2018-01-31', '2018-02-03', '2018-02-15', 'PESSOA FISICA', 20, 'SITUAçãO DO SOLICITANTE', '2018-01-02', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lai_pedidos`
--

CREATE TABLE `tb_lai_pedidos` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NR_TOTAL_PEDIDOS_CLASSIFICACAO_INFORMACAO` int(11) NOT NULL,
  `NR_TOTAL_PEDIDOS_DESCLASSIFICACAO_INFORMACAO` int(11) NOT NULL,
  `NR_TOTAL_PEDIDOS_REAVALIACAO_INFORMACAO` int(11) NOT NULL,
  `NR_TOTAL_PEDIDOS_ATENDIDOS` int(11) NOT NULL,
  `NR_TOTAL_PEDIDOS_NAO_ATENDIDOS` int(11) NOT NULL,
  `NR_TOTAL_PEDIDOS_INDEFERIDOS` int(11) NOT NULL,
  `NR_MES` int(2) NOT NULL,
  `NR_ANO` year(4) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_lai_pedidos`
--

INSERT INTO `tb_lai_pedidos` (`ID`, `ID_ORGAO`, `NR_TOTAL_PEDIDOS_CLASSIFICACAO_INFORMACAO`, `NR_TOTAL_PEDIDOS_DESCLASSIFICACAO_INFORMACAO`, `NR_TOTAL_PEDIDOS_REAVALIACAO_INFORMACAO`, `NR_TOTAL_PEDIDOS_ATENDIDOS`, `NR_TOTAL_PEDIDOS_NAO_ATENDIDOS`, `NR_TOTAL_PEDIDOS_INDEFERIDOS`, `NR_MES`, `NR_ANO`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(1, 2, 5, 6, 7, 10, 5, 1, 1, 2018, '2018-01-01', 1),
(2, 2, 2, 4, 5, 6, 7, 2, 2, 2018, '2018-01-01', 1),
(4, 8, 11, 12, 13, 14, 15, 16, 1, 2018, '2018-01-03', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_obras`
--

CREATE TABLE `tb_obras` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_DENOMINACAO_OBRA` enum('CONSTRUÇÃO','REFORMA','AMPLIAÇÃO','') NOT NULL,
  `NM_OBJETO` varchar(255) NOT NULL,
  `NM_LOCAL` varchar(255) NOT NULL,
  `DT_INICIO` date NOT NULL,
  `DT_TERMINO` date NOT NULL,
  `NM_STATUS` varchar(255) NOT NULL,
  `NM_PERCENTUAL_EXECUCAO` varchar(255) NOT NULL,
  `DT_REFERENCIA_EXECUCAO` date NOT NULL,
  `NM_BENEFICIARIOS` varchar(255) NOT NULL,
  `ID_CONTRATO` int(11) NOT NULL,
  `VL_OBRA` decimal(10,2) NOT NULL,
  `NM_ORIGEM_RECURSOS` varchar(255) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_obras`
--

INSERT INTO `tb_obras` (`ID`, `ID_ORGAO`, `NM_DENOMINACAO_OBRA`, `NM_OBJETO`, `NM_LOCAL`, `DT_INICIO`, `DT_TERMINO`, `NM_STATUS`, `NM_PERCENTUAL_EXECUCAO`, `DT_REFERENCIA_EXECUCAO`, `NM_BENEFICIARIOS`, `ID_CONTRATO`, `VL_OBRA`, `NM_ORIGEM_RECURSOS`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(8, 8, 'REFORMA', 'REFORMA DA CGE', 'PRADO, 25, MACEIó - ALAGOAS', '2017-12-12', '2019-02-14', 'EM ANDAMENTO', '15%', '2018-04-27', 'BENEFICIáRIOS', 14, '50000.00', 'GOVERNO ESTADUAL', '2017-12-19', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_orgaos`
--

CREATE TABLE `tb_orgaos` (
  `ID` int(6) NOT NULL,
  `CD_ORGAO` varchar(10) NOT NULL,
  `UG_ORGAO` int(11) DEFAULT NULL,
  `NM_ORGAO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_orgaos`
--

INSERT INTO `tb_orgaos` (`ID`, `CD_ORGAO`, `UG_ORGAO`, `NM_ORGAO`) VALUES
(1, 'ADEAL', 520555, 'AGÊNCIA DE DEFESA E INSPEÇÃO AGROPECUÁRIA DE ALAGOAS'),
(2, 'DESENVOLVE', 250505, 'AGENCIA DE FOMENTO DE ALAGOAS'),
(3, 'AMGESP', 410548, 'AGÊNCIA DE MODERNIZAÇÃO DA GESTÃO DE PROCESSOS '),
(4, 'ARSAL', 410504, 'AGÊNCIA REGULADORA DE SERVIÇOS PÚBLICOS DO ESTADO DE ALAGOAS'),
(6, 'AL-PREV', 130569, 'ALAGOAS PREVIDÊNCIA'),
(7, 'CARHP', 410510, 'COMPANHIA ALAGOANA DE RECURSOS HUMANOS E PATRIMONIAIS'),
(8, 'CGE', 110008, 'CONTROLADORIA GERAL DO ESTADO'),
(9, 'CBMAL', 540036, 'CORPO DE BOMBEIROS MILITAR DE ALAGOAS'),
(11, 'DER', 530538, 'DEPARTAMENTO DE ESTRADAS DE RODAGEM DE ALAGOAS'),
(12, 'DETRAN', 410512, 'DEPARTAMENTO ESTADUAL DE TRÂNSITO DE ALAGOAS'),
(13, 'DITEAL', 510520, 'DIRETORIA DE TEATROS DO ESTADO DE ALAGOAS '),
(14, 'FAPEAL', 510514, 'FUNDAÇÃO DE AMPARO À PESQUISA DE ALAGOAS'),
(15, 'GCG', 110006, 'GABINETE CIVIL DO GOVERNADOR'),
(16, 'GVG', 210013, 'GABINETE DO VICE GOVERNADOR'),
(18, 'IPASEAL', 510551, 'INSTITUTO DE ASSISTÊNCIA À SAÚDE DOS SERVIDORES DO ESTADO DE ALAGOAS'),
(19, 'IDERAL', 140566, 'INSTITUTO DE DESENVOLVIMENTO RURAL E ABASTECIMENTO DE ALAGOAS '),
(20, 'EMATER', 140566, 'INSTITUTO DE INOVAÇÃO PARA O DESENVOLVIMENTO RURAL SUSTENTÁVEL '),
(21, 'INMEQ', 520537, 'INSTITUTO DE METROLOGIA E QUALIDADE DE ALAGOAS'),
(22, 'ITEC', 410506, 'INSTITUTO DE TECNOLOGIA EM INFORMÁTICA E INFORMAÇÃO DO ESTADO DE ALAGOAS '),
(23, 'ITERAL', 530541, 'INSTITUTO DE TERRAS E REFORMA AGRÁRIA DE ALAGOAS'),
(24, 'IMA', 530542, 'INSTITUTO DO MEIO AMBIENTE DO ESTADO DE ALAGOAS'),
(25, 'IZP', 510517, 'INSTITUTO ZUMBI DOS PALMARES'),
(26, 'JUCEAL', 520534, 'JUNTA COMERCIAL DE  ESTADO DE ALAGOAS '),
(28, 'POAL', NULL, 'PERICIA OFICIAL DO ESTADO DE ALAGOAS'),
(29, 'PCAL', NULL, 'POLICIA CIVIL DO ESTADO DE ALAGOAS'),
(30, 'PMAL', NULL, 'POLICIA MILITAR DE ALAGOAS'),
(31, 'PGE', NULL, 'PROCURADORIA GERAL DO ESTADO'),
(32, 'SEAGRE', NULL, 'SEC DE ESTADO DA AGRICULTURA PECUARIA PESCA E AQUICULTURA'),
(34, 'SEADES', NULL, 'SECRETARIA DE ESTADO DA ASSISTENCIA E DESENVOLVIMENTO SOCIAL'),
(35, 'SECTI', NULL, 'SECRETARIA DE ESTADO DA CIENCIA DA TECNOLOGIA E DA INOVACAO'),
(36, 'SECOM', NULL, 'SECRETARIA DE ESTADO DA COMUNICACAO'),
(37, 'SECULT', NULL, 'SECRETARIA DE ESTADO DA CULTURA'),
(38, 'SEDUC', NULL, 'SECRETARIA DE ESTADO DA EDUCACAO'),
(39, 'SEFAZ', NULL, 'SECRETARIA DE ESTADO DA FAZENDA'),
(40, 'SEINFRA', NULL, 'SECRETARIA DE ESTADO DA INFRA ESTRUTURA'),
(41, 'SEMUDH', NULL, 'SECRETARIA DE ESTADO DA MULHER CIDADANIA DIREITOS HUMANOS'),
(42, 'SEPAQ', NULL, 'SECRETARIA DE ESTADO DA PESCA E AQUICULTURA  DE ALAGOAS'),
(43, 'SESAU', NULL, 'SECRETARIA DE ESTADO DA SAUDE'),
(44, 'SSP', NULL, 'SECRETARIA DE ESTADO DA SEGURANCA PUBLICA'),
(45, 'SEAP', NULL, 'SECRETARIA DE ESTADO DE ARTICULAÇÃO POLÍTICA DE ALAGOAS'),
(46, 'SEPREV', NULL, 'SECRETARIA DE ESTADO DE PREVENCAO A VIOLENCIA'),
(47, 'SERIS', NULL, 'SECRETARIA DE ESTADO DE RESSOCIALIZACAO E INCLUSAO SOCIAL'),
(48, 'SETRAND', NULL, 'SECRETARIA DE ESTADO DE TRANSPORTE E DESENVOLVIMENTO URBANO'),
(49, 'SEDETUR', NULL, 'SECRETARIA DE ESTADO DO DESENVOLVIMENTO ECONOMICO E TURISMO'),
(50, 'SELAJ', NULL, 'SECRETARIA DE ESTADO DO ESPORTE LAZER E JUVENTUDE'),
(51, 'SEMARH', NULL, 'SECRETARIA DE ESTADO DO MEIO AMBIENTE E RECURSOS HIDRICOS'),
(53, 'SEPLAG', NULL, 'SECRETARIA DE ESTADO DO PLANEJAMENTO GESTAO E PATRIMONIO'),
(54, 'SETE', NULL, 'SECRETARIA DE ESTADO DO TRABALHO E EMPREGO'),
(55, 'SERVEAL', NULL, 'SERVICOS DE ENGENHARIA DE ALAGOAS S/A'),
(56, 'SGAP', NULL, 'SUPERINTENDÊNCIA GERAL DE ADMINISTRAÇÃO PENITENCIÁRIA'),
(57, 'UNEAL', NULL, 'UNIVERSIDADE ESTADUAL DE ALAGOAS'),
(58, 'UNCISAL', NULL, 'UNIVERSIDADE ESTADUAL DE CIENCIAS DA SAUDE DE ALAGOAS'),
(59, 'CEPAL', NULL, 'IMPRENSA OFICIAL GRACILIANO RAMOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ouvidoria`
--

CREATE TABLE `tb_ouvidoria` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_NUMERO_PROCESSO` varchar(255) NOT NULL,
  `DT_RECEBIMENTO_MANIFESTACAO` date NOT NULL,
  `DT_ABERTURA` date NOT NULL,
  `NM_TIPO_MANIFESTACAO` enum('SOLICITAÇÃO DE PROVIDENCIA','RECLAMAÇÃO','DENUNCIA','SUGESTAO','ELOGIO') NOT NULL,
  `NM_CARACTERISTICA_MANIFESTACAO` varchar(255) NOT NULL,
  `NM_ASSUNTO` varchar(255) NOT NULL,
  `NM_CANAL_RECEBIMENTO_MANIFESTACAO` enum('TELEFONE','ONLINE','PRESENCIAL','') NOT NULL,
  `NM_TIPO_PESSOA` enum('FISICA','JURIDICA','','') NOT NULL,
  `DT_EMAIL_CONFIRMACAO` date NOT NULL,
  `DT_EMAIL_RESPOSTA` date NOT NULL,
  `ID_ORGAO_VINCULADO_ENCAMINHADO` int(11) DEFAULT NULL,
  `NM_SITUACAO` enum('OUVIDORIA','AGUARDANDO RESPOSTA','','') NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_passagens_aereas`
--

CREATE TABLE `tb_passagens_aereas` (
  `ID` int(11) NOT NULL,
  `ID_SERVIDOR_BENEFICIARIO` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `DT_IDA` date NOT NULL,
  `DT_VOLTA` date NOT NULL,
  `VL_IDA` decimal(10,2) NOT NULL,
  `VL_VOLTA` decimal(10,2) NOT NULL,
  `NM_FINALIDADE` varchar(255) NOT NULL,
  `NM_DESTINO` varchar(255) NOT NULL,
  `DT_PRESTACAO_CONTAS` date NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_passagens_aereas`
--

INSERT INTO `tb_passagens_aereas` (`ID`, `ID_SERVIDOR_BENEFICIARIO`, `ID_ORGAO`, `DT_IDA`, `DT_VOLTA`, `VL_IDA`, `VL_VOLTA`, `NM_FINALIDADE`, `NM_DESTINO`, `DT_PRESTACAO_CONTAS`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(1, 3, 8, '2017-12-13', '2017-12-13', '895.00', '1200.00', 'VIAGEM A CURSO DE PHP!!!!', 'BRASÍLIA - DF', '2018-01-03', '2017-12-13', 1),
(2, 1, 8, '2017-05-18', '2017-06-18', '2000.00', '1000.00', 'PASSEIO COM A FAMILIA', 'DELMIRO GOUVEIA', '2017-07-18', '2017-12-13', 1),
(3, 3, 8, '2017-12-13', '2017-12-14', '80.00', '30.00', 'FAZER CURSO DE QLIKVIEW', 'SAO PAULO', '2017-12-28', '2017-12-13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_permissoes`
--

CREATE TABLE `tb_permissoes` (
  `ID` int(11) NOT NULL,
  `ID_SERVIDOR` int(11) NOT NULL,
  `VISUALIZAR_CONTRATOS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_CONVENIOS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_DIARIAS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_ADIANTAMENTOS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_RECEITAS_DESPESAS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_PASSAGENS_AEREAS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_VEICULOS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_COMBUSTIVEL` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_TELEFONIA` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_LAI` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_LAI_PEDIDOS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_CORREICAO` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_OUVIDORIA` tinyint(1) NOT NULL,
  `VISUALIZAR_OBRAS` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_RMB` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_RMA` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_TI` tinyint(1) NOT NULL DEFAULT '0',
  `VISUALIZAR_SERVIDORES` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_CONTRATOS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_CONVENIOS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_DIARIAS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_ADIANTAMENTOS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_RECEITAS_DESPESAS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_PASSAGENS_AEREAS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_VEICULOS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_COMBUSTIVEL` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_TELEFONIA` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_LAI` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_LAI_PEDIDOS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_CORREICAO` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_OUVIDORIA` tinyint(1) NOT NULL,
  `GERENCIAR_OBRAS` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_RMB` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_RMA` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_TI` tinyint(1) NOT NULL DEFAULT '0',
  `GERENCIAR_SERVIDORES` tinyint(1) NOT NULL DEFAULT '0',
  `VISAO_TODOS_ORGAOS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_permissoes`
--

INSERT INTO `tb_permissoes` (`ID`, `ID_SERVIDOR`, `VISUALIZAR_CONTRATOS`, `VISUALIZAR_CONVENIOS`, `VISUALIZAR_DIARIAS`, `VISUALIZAR_ADIANTAMENTOS`, `VISUALIZAR_RECEITAS_DESPESAS`, `VISUALIZAR_PASSAGENS_AEREAS`, `VISUALIZAR_VEICULOS`, `VISUALIZAR_COMBUSTIVEL`, `VISUALIZAR_TELEFONIA`, `VISUALIZAR_LAI`, `VISUALIZAR_LAI_PEDIDOS`, `VISUALIZAR_CORREICAO`, `VISUALIZAR_OUVIDORIA`, `VISUALIZAR_OBRAS`, `VISUALIZAR_RMB`, `VISUALIZAR_RMA`, `VISUALIZAR_TI`, `VISUALIZAR_SERVIDORES`, `GERENCIAR_CONTRATOS`, `GERENCIAR_CONVENIOS`, `GERENCIAR_DIARIAS`, `GERENCIAR_ADIANTAMENTOS`, `GERENCIAR_RECEITAS_DESPESAS`, `GERENCIAR_PASSAGENS_AEREAS`, `GERENCIAR_VEICULOS`, `GERENCIAR_COMBUSTIVEL`, `GERENCIAR_TELEFONIA`, `GERENCIAR_LAI`, `GERENCIAR_LAI_PEDIDOS`, `GERENCIAR_CORREICAO`, `GERENCIAR_OUVIDORIA`, `GERENCIAR_OBRAS`, `GERENCIAR_RMB`, `GERENCIAR_RMA`, `GERENCIAR_TI`, `GERENCIAR_SERVIDORES`, `VISAO_TODOS_ORGAOS`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_receitas`
--

CREATE TABLE `tb_receitas` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `ID_RECEITA` int(11) NOT NULL,
  `NR_MES` int(2) NOT NULL,
  `NR_ANO` year(4) NOT NULL,
  `DS_RECEITA` varchar(255) NOT NULL,
  `VL_RECEITA` decimal(20,2) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_receitas`
--

INSERT INTO `tb_receitas` (`ID`, `ID_ORGAO`, `ID_RECEITA`, `NR_MES`, `NR_ANO`, `DS_RECEITA`, `VL_RECEITA`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(10, 8, 1, 1, 2018, 'JAN', '1000000000.00', '2018-01-03', 2),
(11, 8, 2, 1, 2018, 'JAN/18', '500000000.00', '2018-01-03', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_rma`
--

CREATE TABLE `tb_rma` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `ID_CLASSIFICACAO_CONTABIL` int(11) NOT NULL,
  `VL_SALDO` decimal(10,2) NOT NULL,
  `VL_SALDO_ANTERIOR` decimal(10,2) NOT NULL,
  `VL_ENTRADAS` decimal(10,2) NOT NULL,
  `VL_ENTRADAS_EXTRAS` decimal(10,2) DEFAULT NULL,
  `VL_SAIDAS` decimal(10,2) NOT NULL,
  `VL_SALDO_ATUAL` decimal(10,2) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_rma`
--

INSERT INTO `tb_rma` (`ID`, `ID_ORGAO`, `ID_CLASSIFICACAO_CONTABIL`, `VL_SALDO`, `VL_SALDO_ANTERIOR`, `VL_ENTRADAS`, `VL_ENTRADAS_EXTRAS`, `VL_SAIDAS`, `VL_SALDO_ATUAL`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(12, 8, 4, '1111.00', '2222.00', '3333.00', '4444.00', '5555.00', '6666.00', '2017-12-21', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_rmb`
--

CREATE TABLE `tb_rmb` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_TIPO_PATRIMONIO` enum('MÓVEL','IMÓVEL') NOT NULL,
  `ID_CLASSIFICACAO_CONTABIL` int(11) NOT NULL,
  `VL_SALDO` decimal(10,2) NOT NULL,
  `VL_SALDO_ANTERIOR` decimal(10,2) NOT NULL,
  `VL_ENTRADAS` decimal(10,2) NOT NULL,
  `VL_ENTRADAS_EXTRAS` decimal(10,2) DEFAULT NULL,
  `VL_SAIDAS` decimal(10,2) NOT NULL,
  `VL_SALDO_ATUAL` decimal(10,2) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_rmb`
--

INSERT INTO `tb_rmb` (`ID`, `ID_ORGAO`, `NM_TIPO_PATRIMONIO`, `ID_CLASSIFICACAO_CONTABIL`, `VL_SALDO`, `VL_SALDO_ANTERIOR`, `VL_ENTRADAS`, `VL_ENTRADAS_EXTRAS`, `VL_SAIDAS`, `VL_SALDO_ATUAL`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(10, 8, 'MÓVEL', 9, '2313434.00', '1232345.00', '1231241.00', '123123.00', '123123.00', '1111111.00', '2017-12-19', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servidores`
--

CREATE TABLE `tb_servidores` (
  `ID` int(11) NOT NULL,
  `NM_SERVIDOR` varchar(255) NOT NULL,
  `CPF_SERVIDOR` varchar(14) NOT NULL,
  `CNH_SERVIDOR` varchar(255) DEFAULT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_MATRICULA` varchar(255) NOT NULL,
  `NM_CARGO` varchar(255) NOT NULL,
  `ID_GRUPO` int(11) NOT NULL,
  `NM_CONDICAO` varchar(255) NOT NULL,
  `NM_EMAIL` varchar(255) NOT NULL,
  `NM_ARQUIVO_FOTO` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `SENHA` varchar(32) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_servidores`
--

INSERT INTO `tb_servidores` (`ID`, `NM_SERVIDOR`, `CPF_SERVIDOR`, `CNH_SERVIDOR`, `ID_ORGAO`, `NM_MATRICULA`, `NM_CARGO`, `ID_GRUPO`, `NM_CONDICAO`, `NM_EMAIL`, `NM_ARQUIVO_FOTO`, `SENHA`) VALUES
(1, 'JUDSON MELO BANDEIRA', '062.200.904-46', NULL, 8, '0000-0', 'ANALISTA DE TECNOLOGIA DA INFORMAçãO', 84, 'BOLSISTA', 'judson.bandeira@cge.al.gov.br', 'perfil.jpg', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'THIAGO PAIVA FERREIRA', '057.996.054-46', NULL, 8, '119-8', 'ASSESSOR DE GOVERNANçA E TRANSPARêNCIA', 42, 'COMISSIONADO', 'thiago.paiva@cge.al.gov.br', 'default.jpg', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'VILKER TENóRIO CABRAL LOBO', '057.520.314-51', '12345678', 8, '00000-0', 'ANALISTA DE TECNOLOGIA DA INFORMAçãO', 84, 'BOLSISTA', 'vilker.tenorio@cge.al.gov.br', 'default.jpg', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_telefonia`
--

CREATE TABLE `tb_telefonia` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_NUMERO` varchar(255) NOT NULL,
  `NM_TIPO` varchar(255) NOT NULL,
  `VL_COTA_MENSAL` decimal(10,2) NOT NULL,
  `ID_SERVIDOR_RESPONSAVEL` int(11) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_telefonia`
--

INSERT INTO `tb_telefonia` (`ID`, `ID_ORGAO`, `NM_NUMERO`, `NM_TIPO`, `VL_COTA_MENSAL`, `ID_SERVIDOR_RESPONSAVEL`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(1, 8, '99660-2021', 'FIXO', '460.00', 3, '2017-12-14', 1),
(2, 8, '99552-2222', 'MOVEL', '50.00', 2, '2017-12-19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ti`
--

CREATE TABLE `tb_ti` (
  `ID` int(11) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `NM_EQUIPAMENTO` varchar(255) NOT NULL,
  `NR_QUANTIDADE_PROPRIO` int(11) NOT NULL,
  `NR_QUANTIDADE_ALUGADO` int(11) NOT NULL,
  `NR_QUANTIDADE_CEDIDO` int(11) NOT NULL,
  `ID_ORGAO_CEDIDO` int(11) DEFAULT NULL,
  `NR_QUANTIDADE_RECEBIDO` int(11) NOT NULL,
  `ID_ORGAO_ORIGEM` int(11) DEFAULT NULL,
  `NR_TOTAL_DISPONIVEL` int(11) NOT NULL,
  `NM_OBSERVACAO` varchar(255) NOT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipos_despesas`
--

CREATE TABLE `tb_tipos_despesas` (
  `ID` int(11) NOT NULL,
  `CD_DESPESA` varchar(15) NOT NULL,
  `NM_TIPO` varchar(8) NOT NULL,
  `NM_DESPESA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tipos_despesas`
--

INSERT INTO `tb_tipos_despesas` (`ID`, `CD_DESPESA`, `NM_TIPO`, `NM_DESPESA`) VALUES
(1, '3.3.3.5.0.41.03', 'Variável', 'Transferências a Instituições Privadas'),
(2, '3.3.3.9.0.14.00', 'Variável', 'Diárias Pessoal Civil'),
(3, '3.3.3.9.0.30.04', 'Variável', 'Gás e Outros Materiais Engarrafados'),
(4, '3.3.3.9.0.30.07', 'Variável', 'Gêneros de Alimentação'),
(5, '3.3.3.9.0.30.11', 'Variável', 'Material Químico'),
(6, '3.3.3.9.0.30.16', 'Variável', 'Material de Expediente'),
(7, '3.3.3.9.0.30.17', 'Variável', 'Material de Processamento de Dados'),
(8, '3.3.3.9.0.30.19', 'Variável', 'Material de Acondicionamento e Embalagem'),
(9, '3.3.3.9.0.30.21', 'Variável', 'Material de Copa e Cozinha'),
(10, '3.3.3.9.0.30.22', 'Variável', 'Material de Limpeza e Produtos de Higienização'),
(11, '3.3.3.9.0.30.24', 'Variável', 'Material para Manutenção de Bens Imóveis'),
(12, '3.3.3.9.0.30.30', 'Variável', 'Material para Comunicações'),
(13, '3.3.3.9.0.30.44', 'Variável', 'Material de Sinalização Visual'),
(14, '3.3.3.9.0.30.96', 'Variável', 'Material de Consumo - Pagamento Antecipado'),
(15, '3.3.3.9.0.33.01', 'Variável', 'Passagens para o País'),
(16, '3.3.3.9.0.35.00', 'Variável', 'Serviços de Consultoria'),
(17, '3.3.3.9.0.36.15', 'Fixa', 'Locação de Imóveis'),
(18, '3.3.3.9.0.36.19', 'Variável', 'Locação de Imóveis - CAUCAO'),
(19, '3.3.3.9.0.36.96', 'Variável', 'Outros Serviços de Terceiros PF - Pagamento Antecipado'),
(20, '3.3.3.9.0.37.02', 'Fixa', 'Limpeza e Conservação'),
(21, '3.3.3.9.0.39.01', 'Variável', 'Assinatura de Periódicos e Anuidades'),
(22, '3.3.3.9.0.39.05', 'Variável', 'Serviços Técnicos Profissionais'),
(23, '3.3.3.9.0.39.16', 'Variável', 'Manutenção e Conservação de Bens Imóveis'),
(24, '3.3.3.9.0.39.17', 'Variável', 'Manutenção e Conservação de Máquinas e Equipamentos'),
(25, '3.3.3.9.0.39.19', 'Variável', 'Manutenção e Conservação de Veículos'),
(26, '3.3.3.9.0.39.22', 'Variável', 'Exposições, Congressos e Conferências'),
(27, '3.3.3.9.0.39.24', 'Fixa', 'Locação de Veículos'),
(28, '3.3.3.9.0.39.43', 'Fixa', 'Serviços de Energia Elétrica'),
(29, '3.3.3.9.0.39.44', 'Fixa', 'Serviços de Água e Esgoto'),
(30, '3.3.3.9.0.39.48', 'Variável', 'Serviços de Seleção e Treinamento'),
(31, '3.3.3.9.0.39.56', 'Fixa', 'Serviço de Telefonia'),
(32, '3.3.3.9.0.39.57', 'Variável', 'Serviços de Processamento de Dados'),
(33, '3.3.3.9.0.39.58', 'Variável', 'Serviços de Telecomunicações'),
(34, '3.3.3.9.0.39.63', 'Variável', 'Serviços Gráficos'),
(35, '3.3.3.9.0.39.87', 'Variável', 'Serviço de Recarga de Cartuchos e Tonners para Impressoras'),
(36, '3.3.3.9.0.39.96', 'Variável', 'Outros Serviços de Terceiros PJ - Pagamento Antecipado'),
(37, '3.3.3.9.0.39.97', 'Variável', 'Serviço de Teleprocessamento'),
(38, '3.3.3.9.0.47.00', 'Variável', 'Obrigações Tributárias e Contributivas'),
(39, '3.3.3.9.0.47.15', 'Variável', 'Multas'),
(40, '3.3.3.9.0.47.18', 'Variável', 'Contribuições Previdenciárias - Serviços de Terceiros'),
(41, '3.3.3.9.0.93.01', 'Variável', 'Indenizações e Restituições'),
(42, '3.3.9.0.30.42', 'Variável', 'Taxa de coleta de lixo'),
(43, '3.4.4.9.0.51.00', 'Variável', 'Obras e Instalações'),
(44, '3.4.4.9.0.52.00', 'Variável', 'Equipamentos e Material Permanente'),
(45, '33903026', 'Variável', 'MATERIAL ELÉTRICO ELETRÔNICO'),
(46, 'PF0000001', 'Fixa', 'Folha de pessoal'),
(47, 'PF0000002', 'Fixa', 'Contribuições');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipos_receitas`
--

CREATE TABLE `tb_tipos_receitas` (
  `ID` int(11) NOT NULL,
  `CD_RECEITA` varchar(15) NOT NULL,
  `NM_RECEITA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tipos_receitas`
--

INSERT INTO `tb_tipos_receitas` (`ID`, `CD_RECEITA`, `NM_RECEITA`) VALUES
(1, '0000001', 'Cota Secretaria da Fazenda'),
(2, '0000002', 'Cota extra'),
(3, '333903096', 'Devolução de Adiantamento'),
(4, 'PF0000001', 'Folha de pessoal'),
(5, 'PF0000002', 'Contribuições'),
(6, '', 'Convênios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_uf`
--

CREATE TABLE `tb_uf` (
  `ID` int(11) NOT NULL,
  `NM_SIGLA` varchar(255) NOT NULL,
  `NM_NOME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tb_uf`
--

INSERT INTO `tb_uf` (`ID`, `NM_SIGLA`, `NM_NOME`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RS', 'Rio Grande do Sul'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculos`
--

CREATE TABLE `tb_veiculos` (
  `ID` int(11) NOT NULL,
  `NM_PLACA` varchar(255) NOT NULL,
  `NM_LOCADO_PROPRIO` varchar(255) NOT NULL,
  `NM_LOCADORA` varchar(255) DEFAULT NULL,
  `NM_PADRAO` varchar(255) NOT NULL,
  `VL_ALUGUEL_MENSAL` decimal(10,2) DEFAULT NULL,
  `NM_MODELO` varchar(255) NOT NULL,
  `NM_RENAVAM` varchar(255) NOT NULL,
  `NM_ANO_FABRICACAO` varchar(255) NOT NULL,
  `BL_LICENCIADO` tinyint(1) NOT NULL,
  `ID_ORGAO` int(11) NOT NULL,
  `ID_ORGAO_RECEBIDO` int(11) DEFAULT NULL,
  `NR_TERMO_CESSAO` int(11) DEFAULT NULL,
  `DT_ULTIMA_MANUTENCAO` date NOT NULL,
  `BL_LOGOMARCA` tinyint(1) NOT NULL,
  `BL_SEGURO` tinyint(1) NOT NULL,
  `BL_CHIPADO` tinyint(1) NOT NULL,
  `NM_MAPA_CONTROLE` enum('SIM','NÃO') NOT NULL,
  `ID_SERVIDOR_CONDUTOR` int(11) NOT NULL,
  `BL_RECOLHIDO_NOITE` tinyint(1) NOT NULL,
  `BL_MULTA` tinyint(1) NOT NULL,
  `NM_AVARIA` varchar(255) DEFAULT NULL,
  `NM_OBSERVACOES` varchar(255) DEFAULT NULL,
  `DT_ULTIMA_ATUALIZACAO` date NOT NULL,
  `ID_SERVIDOR_ATUALIZOU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_veiculos`
--

INSERT INTO `tb_veiculos` (`ID`, `NM_PLACA`, `NM_LOCADO_PROPRIO`, `NM_LOCADORA`, `NM_PADRAO`, `VL_ALUGUEL_MENSAL`, `NM_MODELO`, `NM_RENAVAM`, `NM_ANO_FABRICACAO`, `BL_LICENCIADO`, `ID_ORGAO`, `ID_ORGAO_RECEBIDO`, `NR_TERMO_CESSAO`, `DT_ULTIMA_MANUTENCAO`, `BL_LOGOMARCA`, `BL_SEGURO`, `BL_CHIPADO`, `NM_MAPA_CONTROLE`, `ID_SERVIDOR_CONDUTOR`, `BL_RECOLHIDO_NOITE`, `BL_MULTA`, `NM_AVARIA`, `NM_OBSERVACOES`, `DT_ULTIMA_ATUALIZACAO`, `ID_SERVIDOR_ATUALIZOU`) VALUES
(1, 'OXN-5960', 'PROPRIO', 'NÃO', 'PADRÃO', '0.00', 'HB-20', '12312377848783', '2013/2014', 1, 8, NULL, NULL, '2017-12-15', 0, 1, 1, '', 1, 0, 0, 'ARRANHAO NA PARTE DIANTEIRA', 'EM PERFEITO ESTADO', '2017-12-16', 1),
(2, 'AAA-2222', 'PROPRIO', '', 'E1.1', '11111.00', 'FIESTA', '000000000', '2017/2018', 1, 8, 7, 0, '2017-12-11', 1, 0, 1, '', 2, 1, 0, 'FAROL DIANTEIRO QUEBRADO', 'A SERVIçO DO PRESIDENTE', '2017-12-18', 3),
(3, 'AAA-2222', 'LOCADO', 'A.& AMORIM', 'B', '11232343.00', 'GOL', '13454565656', '2015/2016', 1, 8, 19, 123344546, '2017-12-19', 1, 0, 1, 'NÃO', 3, 0, 0, 'FAROL DIANTEIRO QUEBRADO', 'PRECISA DE MANUTENÇÃO', '2017-12-19', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_adiantamentos`
--
ALTER TABLE `tb_adiantamentos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_SERVIDOR_BENEFICIARIO` (`ID_SERVIDOR_BENEFICIARIO`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_classificacao_contabil_rma`
--
ALTER TABLE `tb_classificacao_contabil_rma`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_classificacao_contabil_rmb`
--
ALTER TABLE `tb_classificacao_contabil_rmb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_combustivel`
--
ALTER TABLE `tb_combustivel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_VEICULO` (`ID_VEICULO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_contratos`
--
ALTER TABLE `tb_contratos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_EMPRESA` (`ID_EMPRESA`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_convenios`
--
ALTER TABLE `tb_convenios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO_CONVENENTE` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_correicao`
--
ALTER TABLE `tb_correicao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_despesas`
--
ALTER TABLE `tb_despesas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_DESPESA` (`ID_DESPESA`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_diarias`
--
ALTER TABLE `tb_diarias`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_BENEFICIARIO` (`ID_SERVIDOR_BENEFICIARIO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_empresas`
--
ALTER TABLE `tb_empresas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_grupos`
--
ALTER TABLE `tb_grupos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_lai`
--
ALTER TABLE `tb_lai`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`),
  ADD KEY `ID_UF` (`ID_UF`);

--
-- Indexes for table `tb_lai_pedidos`
--
ALTER TABLE `tb_lai_pedidos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_obras`
--
ALTER TABLE `tb_obras`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_CONTRATO` (`ID_CONTRATO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_orgaos`
--
ALTER TABLE `tb_orgaos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_ouvidoria`
--
ALTER TABLE `tb_ouvidoria`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_ORGAO_VINCULADO_ENCAMINHADO` (`ID_ORGAO_VINCULADO_ENCAMINHADO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_passagens_aereas`
--
ALTER TABLE `tb_passagens_aereas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_SERVIDOR_BENEFICIARIO` (`ID_SERVIDOR_BENEFICIARIO`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_permissoes`
--
ALTER TABLE `tb_permissoes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_SERVIDOR` (`ID_SERVIDOR`);

--
-- Indexes for table `tb_receitas`
--
ALTER TABLE `tb_receitas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_RECEITA` (`ID_RECEITA`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_rma`
--
ALTER TABLE `tb_rma`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`),
  ADD KEY `ID_CLASSIFICACAO_CONTABIL` (`ID_CLASSIFICACAO_CONTABIL`);

--
-- Indexes for table `tb_rmb`
--
ALTER TABLE `tb_rmb`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`),
  ADD KEY `ID_CLASSIFICACAO_CONTABIL` (`ID_CLASSIFICACAO_CONTABIL`);

--
-- Indexes for table `tb_servidores`
--
ALTER TABLE `tb_servidores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_GRUPO` (`ID_GRUPO`);

--
-- Indexes for table `tb_telefonia`
--
ALTER TABLE `tb_telefonia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_SERVIDOR_RESPONSAVEL` (`ID_SERVIDOR_RESPONSAVEL`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_ti`
--
ALTER TABLE `tb_ti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_ORGAO_CEDIDO_` (`ID_ORGAO_CEDIDO`),
  ADD KEY `ID_ORGAO_ORIGEM` (`ID_ORGAO_ORIGEM`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- Indexes for table `tb_tipos_despesas`
--
ALTER TABLE `tb_tipos_despesas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_tipos_receitas`
--
ALTER TABLE `tb_tipos_receitas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_uf`
--
ALTER TABLE `tb_uf`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ORGAO` (`ID_ORGAO`),
  ADD KEY `ID_ORGAO_RECEBIDO` (`ID_ORGAO_RECEBIDO`),
  ADD KEY `ID_SERVIDOR_CONDUTOR` (`ID_SERVIDOR_CONDUTOR`),
  ADD KEY `ID_SERVIDOR_ATUALIZOU` (`ID_SERVIDOR_ATUALIZOU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_adiantamentos`
--
ALTER TABLE `tb_adiantamentos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_classificacao_contabil_rma`
--
ALTER TABLE `tb_classificacao_contabil_rma`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_classificacao_contabil_rmb`
--
ALTER TABLE `tb_classificacao_contabil_rmb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_combustivel`
--
ALTER TABLE `tb_combustivel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_contratos`
--
ALTER TABLE `tb_contratos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_convenios`
--
ALTER TABLE `tb_convenios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_correicao`
--
ALTER TABLE `tb_correicao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_despesas`
--
ALTER TABLE `tb_despesas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_diarias`
--
ALTER TABLE `tb_diarias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_empresas`
--
ALTER TABLE `tb_empresas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_grupos`
--
ALTER TABLE `tb_grupos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `tb_lai`
--
ALTER TABLE `tb_lai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_lai_pedidos`
--
ALTER TABLE `tb_lai_pedidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_obras`
--
ALTER TABLE `tb_obras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_orgaos`
--
ALTER TABLE `tb_orgaos`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `tb_ouvidoria`
--
ALTER TABLE `tb_ouvidoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_passagens_aereas`
--
ALTER TABLE `tb_passagens_aereas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_permissoes`
--
ALTER TABLE `tb_permissoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_receitas`
--
ALTER TABLE `tb_receitas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_rma`
--
ALTER TABLE `tb_rma`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_rmb`
--
ALTER TABLE `tb_rmb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_servidores`
--
ALTER TABLE `tb_servidores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_telefonia`
--
ALTER TABLE `tb_telefonia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_ti`
--
ALTER TABLE `tb_ti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tipos_despesas`
--
ALTER TABLE `tb_tipos_despesas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tb_tipos_receitas`
--
ALTER TABLE `tb_tipos_receitas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_uf`
--
ALTER TABLE `tb_uf`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_adiantamentos`
--
ALTER TABLE `tb_adiantamentos`
  ADD CONSTRAINT `tb_adiantamentos_ibfk_1` FOREIGN KEY (`ID_SERVIDOR_BENEFICIARIO`) REFERENCES `tb_servidores` (`ID`),
  ADD CONSTRAINT `tb_adiantamentos_ibfk_2` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_adiantamentos_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_combustivel`
--
ALTER TABLE `tb_combustivel`
  ADD CONSTRAINT `tb_combustivel_ibfk_1` FOREIGN KEY (`ID_VEICULO`) REFERENCES `tb_veiculos` (`ID`),
  ADD CONSTRAINT `tb_combustivel_ibfk_2` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_contratos`
--
ALTER TABLE `tb_contratos`
  ADD CONSTRAINT `tb_contratos_ibfk_1` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `tb_empresas` (`ID`),
  ADD CONSTRAINT `tb_contratos_ibfk_2` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_contratos_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_convenios`
--
ALTER TABLE `tb_convenios`
  ADD CONSTRAINT `tb_convenios_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_convenios_ibfk_2` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_correicao`
--
ALTER TABLE `tb_correicao`
  ADD CONSTRAINT `tb_correicao_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_correicao_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_despesas`
--
ALTER TABLE `tb_despesas`
  ADD CONSTRAINT `tb_despesas_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_despesas_ibfk_2` FOREIGN KEY (`ID_DESPESA`) REFERENCES `tb_tipos_despesas` (`ID`),
  ADD CONSTRAINT `tb_despesas_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_diarias`
--
ALTER TABLE `tb_diarias`
  ADD CONSTRAINT `tb_diarias_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_diarias_ibfk_2` FOREIGN KEY (`ID_SERVIDOR_BENEFICIARIO`) REFERENCES `tb_servidores` (`ID`),
  ADD CONSTRAINT `tb_diarias_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_lai`
--
ALTER TABLE `tb_lai`
  ADD CONSTRAINT `tb_lai_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_lai_ibfk_2` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`),
  ADD CONSTRAINT `tb_lai_ibfk_3` FOREIGN KEY (`ID_UF`) REFERENCES `tb_uf` (`ID`);

--
-- Limitadores para a tabela `tb_lai_pedidos`
--
ALTER TABLE `tb_lai_pedidos`
  ADD CONSTRAINT `tb_lai_pedidos_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_lai_pedidos_ibfk_2` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_obras`
--
ALTER TABLE `tb_obras`
  ADD CONSTRAINT `tb_obras_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_obras_ibfk_2` FOREIGN KEY (`ID_CONTRATO`) REFERENCES `tb_contratos` (`ID`),
  ADD CONSTRAINT `tb_obras_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_ouvidoria`
--
ALTER TABLE `tb_ouvidoria`
  ADD CONSTRAINT `tb_ouvidoria_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_ouvidoria_ibfk_2` FOREIGN KEY (`ID_ORGAO_VINCULADO_ENCAMINHADO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_ouvidoria_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_passagens_aereas`
--
ALTER TABLE `tb_passagens_aereas`
  ADD CONSTRAINT `tb_passagens_aereas_ibfk_1` FOREIGN KEY (`ID_SERVIDOR_BENEFICIARIO`) REFERENCES `tb_servidores` (`ID`),
  ADD CONSTRAINT `tb_passagens_aereas_ibfk_2` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_passagens_aereas_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_permissoes`
--
ALTER TABLE `tb_permissoes`
  ADD CONSTRAINT `tb_permissoes_ibfk_1` FOREIGN KEY (`ID_SERVIDOR`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_receitas`
--
ALTER TABLE `tb_receitas`
  ADD CONSTRAINT `tb_receitas_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_receitas_ibfk_2` FOREIGN KEY (`ID_RECEITA`) REFERENCES `tb_tipos_receitas` (`ID`),
  ADD CONSTRAINT `tb_receitas_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_rma`
--
ALTER TABLE `tb_rma`
  ADD CONSTRAINT `tb_rma_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_rma_ibfk_2` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`),
  ADD CONSTRAINT `tb_rma_ibfk_3` FOREIGN KEY (`ID_CLASSIFICACAO_CONTABIL`) REFERENCES `tb_classificacao_contabil_rma` (`ID`);

--
-- Limitadores para a tabela `tb_rmb`
--
ALTER TABLE `tb_rmb`
  ADD CONSTRAINT `tb_rmb_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_rmb_ibfk_2` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`),
  ADD CONSTRAINT `tb_rmb_ibfk_3` FOREIGN KEY (`ID_CLASSIFICACAO_CONTABIL`) REFERENCES `tb_classificacao_contabil_rmb` (`ID`);

--
-- Limitadores para a tabela `tb_servidores`
--
ALTER TABLE `tb_servidores`
  ADD CONSTRAINT `tb_servidores_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_servidores_ibfk_2` FOREIGN KEY (`ID_GRUPO`) REFERENCES `tb_grupos` (`ID`);

--
-- Limitadores para a tabela `tb_telefonia`
--
ALTER TABLE `tb_telefonia`
  ADD CONSTRAINT `tb_telefonia_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_telefonia_ibfk_2` FOREIGN KEY (`ID_SERVIDOR_RESPONSAVEL`) REFERENCES `tb_servidores` (`ID`),
  ADD CONSTRAINT `tb_telefonia_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_ti`
--
ALTER TABLE `tb_ti`
  ADD CONSTRAINT `tb_ti_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_ti_ibfk_2` FOREIGN KEY (`ID_ORGAO_CEDIDO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_ti_ibfk_3` FOREIGN KEY (`ID_ORGAO_ORIGEM`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_ti_ibfk_4` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

--
-- Limitadores para a tabela `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  ADD CONSTRAINT `tb_veiculos_ibfk_1` FOREIGN KEY (`ID_ORGAO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_veiculos_ibfk_2` FOREIGN KEY (`ID_ORGAO_RECEBIDO`) REFERENCES `tb_orgaos` (`ID`),
  ADD CONSTRAINT `tb_veiculos_ibfk_3` FOREIGN KEY (`ID_SERVIDOR_CONDUTOR`) REFERENCES `tb_servidores` (`ID`),
  ADD CONSTRAINT `tb_veiculos_ibfk_4` FOREIGN KEY (`ID_SERVIDOR_ATUALIZOU`) REFERENCES `tb_servidores` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
