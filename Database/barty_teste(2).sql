-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jul-2023 às 17:45
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `barty_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `preco_total` decimal(10,2) NOT NULL,
  `status` enum('agendado','cancelado','realizado') NOT NULL,
  `cancelar` tinyint(1) NOT NULL DEFAULT 0,
  `razao_cancelar` text DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time_expected` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `data`, `hora`, `id_cliente`, `id_funcionario`, `id_servico`, `preco_total`, `status`, `cancelar`, `razao_cancelar`, `start_time`, `end_time_expected`) VALUES
(4, '2023-04-27', '00:00:00', 1, 3, 1, 23.00, 'agendado', 0, NULL, '2023-05-15 18:23:35', NULL),
(5, '2023-07-04', '16:45:00', 1, 3, 12, 0.00, 'realizado', 0, NULL, '2023-07-03 06:50:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `barber_admin`
--

CREATE TABLE `barber_admin` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `barber_admin`
--

INSERT INTO `barber_admin` (`admin_id`, `username`, `email`, `img`, `full_name`, `password`) VALUES
(0, 'tyir', 'tyirluf@gmail.com', '', 'Tyir luf', '9b68eca9ea3692838ab854e5ed37ff2ee2ff8b51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `primeiro_nome` varchar(100) NOT NULL,
  `ultimo_nome` varchar(100) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nif` int(9) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `code` int(50) NOT NULL,
  `data_code` datetime DEFAULT NULL,
  `estado_id` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `primeiro_nome`, `ultimo_nome`, `genero`, `username`, `password`, `nif`, `telefone`, `email`, `data_nascimento`, `data_cadastro`, `code`, `data_code`, `estado_id`) VALUES
(1, 'JOSEP', 'Chaves', '2', '', '7c222fb2927d828af22f592134e8932480637c0d', 3024956, '923834524', 'gab@gmail.com', '2003-02-12', '2023-04-04 23:00:00', 0, NULL, 3),
(2, '', '', '', '', '', 0, '', '', '0000-00-00', '0000-00-00 00:00:00', 0, NULL, 3),
(3, '', '', '', '', '', 0, '', '', '0000-00-00', '2023-04-23 16:29:33', 0, NULL, 3),
(4, 'Josep', 'Fernando', '', 'josep', '28836d655152897399c43bc8ea7d0b011ec54009', 0, '923834529', 'josep@gmail.com', '2003-04-17', '2023-04-23 16:30:38', 0, NULL, 3),
(5, 'Roberto', 'Josep', '', 'Rojosep', '7c222fb2927d828af22f592134e8932480637c0d', 0, '924736082', 'rober@gmail.com', '0000-00-00', '2023-04-23 16:31:29', 0, NULL, 3),
(6, 'Hinata', 'Shoyo', '', '', '1ef669619bf6adca1e1b9a4667433783f8280cc9', 0, '', 'hinata@gmail.com', '1993-06-23', '2023-06-10 11:17:39', 0, NULL, 3),
(8, 'Guci', 'vani', '', '', '$2y$10$p9ZxGHc8ZglcSueoCkUHz.fD3VMItKqid', 0, '', 'vani2@gmail.com', '0000-00-00', '2023-06-30 21:16:39', 0, NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(5) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `telefone` int(9) NOT NULL,
  `email` varchar(40) NOT NULL,
  `horario_trabalho` varchar(300) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `loc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `logo`, `descricao`, `telefone`, `email`, `horario_trabalho`, `endereco`, `loc`) VALUES
(1, 'Barty Barber', '', '', 924736082, 'inforbarty@gmail.com', 'segunda-feira	10:00–13:00, 14:30–19:30\r\nterça-feira	10:00–13:00, 14:30–19:30\r\nquarta-feira	10:00–13:00, 14:30–19:30\r\nquinta-feira	10:00–13:00, 14:30–19:30\r\nsexta-feira	10:00–13:00, 14:30–19:30\r\nsábado	        09:30–17:00\r\ndomingo	Encerrado\r\n', 'R. de Soares dos Reis 191, 4430-315 Vila Nova de Gaia', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.6125828840522!2d-8.612739489349014!3d41.12115141234908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2464d37c6fd5e3%3A0x949db42f6a9ff2f0!2sR.%20de%20Soares%20dos%20Reis%20191%2C%204430-999%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1686781889660!5m2!1spt-PT!2spt\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_user`
--

CREATE TABLE `estado_user` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estado_user`
--

INSERT INTO `estado_user` (`id`, `estado`) VALUES
(1, 'Ativo'),
(2, 'Inativo'),
(3, 'Aguardando Confirmação'),
(4, 'Bloqueado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `func_id` int(11) NOT NULL,
  `primeiro_nome` varchar(100) NOT NULL,
  `ultimo_nome` varchar(100) NOT NULL,
  `imagem` varchar(500) DEFAULT NULL,
  `genero` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL DEFAULT 'barber12345',
  `confirmar_senha` varchar(225) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `especializacao` varchar(150) NOT NULL,
  `anos_experiencia` varchar(100) NOT NULL,
  `salario` decimal(10,2) NOT NULL DEFAULT 5.69,
  `horarios_trabalho` time NOT NULL DEFAULT '07:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`func_id`, `primeiro_nome`, `ultimo_nome`, `imagem`, `genero`, `username`, `senha`, `confirmar_senha`, `descricao`, `telefone`, `email`, `data_nascimento`, `especializacao`, `anos_experiencia`, `salario`, `horarios_trabalho`) VALUES
(2, 'Juan', ' Guedes', './assets/images/team/1.jpg', 'Masculino', 'Jguedes', '0ae79f716854035c6a24cbb2156c14183b99f317', '', 'Teste', '1231232312', 'jguedes@gmail.com', '1987-02-03', 'Barba', '5 anos', 5.69, '10:00:00'),
(3, 'Alife ', 'Henrique', './assets/images/team/2.jpg', 'Masculino\r\n', 'Ahenrique', '0ae79f716854035c6a24cbb2156c14183b99f317', '', '12ds', '', 'ahenrique@gmail.com', '1999-10-30', '', '', 5.69, '07:00:00'),
(4, 'Alexandre ', 'Santos', './assets/images/team/4.jpg', 'Masculino', 'Asantos', '0ae79f716854035c6a24cbb2156c14183b99f317', '', '', '', 'asantos@gmail.com', '2023-03-16', '', '', 5.69, '07:00:00'),
(5, 'Ana', 'Rodrigues', './assets/images/team/5.jpg', 'Femino', 'Aricardo', '0ae79f716854035c6a24cbb2156c14183b99f317', '', '', '', '', '1976-09-15', '', '', 5.69, '07:00:00'),
(6, 'Lionel', 'Paulo', '', 'Masculino', 'lipaulo', '0ae79f716854035c6a24cbb2156c14183b99f317', '', 'Bom em tudo', '923834529', 'lionelpaul@gmail.com', '2000-04-20', '', '5 anos', 5.69, '07:00:00'),
(7, 'Tiago', 'Rodrigues', NULL, 'Masculino', '', 'T12345', 'T12345', 'Teste 125', '12345678910', 'tig@gmail.com', '0000-00-00', '', '', 5.69, '07:00:00'),
(9, 'Vania', 'Julia', NULL, 'Feminino', '', 'vani12345', 'vani12345', 'Teste 125', '12345678910', 'vania@gmail.com', '0000-00-00', '', '', 5.69, '07:00:00'),
(10, 'Rute', 'SLa', NULL, 'Feminino', '', '../../', '../../', 'Teste 125', '12345678910', 'Rute@gmail.com', '0000-00-00', '', '', 5.69, '07:00:00'),
(11, 'sdfsdf', 'sdfs', NULL, 'Feminino', '', 'sfdsf', 'sfdsf', 'fsdfsd', '12345678912345', 'vani@gmail.com', '0000-00-00', '', '', 5.69, '07:00:00'),
(12, 'dfdsfsdf', 'dsfsdfs', NULL, 'Feminino', '', 'vxv', 'vxv', 'sdfsdsdfsf', '12345678912345', 'vani@gmail.com', '0000-00-00', '', '', 5.69, '07:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_agendamento`
--

CREATE TABLE `funcionario_agendamento` (
  `id` int(5) NOT NULL,
  `funcionario_id` int(2) NOT NULL,
  `day_id` tinyint(1) NOT NULL,
  `hora_para` time NOT NULL,
  `hora_de` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `id_agendamento` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `valor_pagamento` decimal(10,2) NOT NULL,
  `forma_pagamento` varchar(50) NOT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `servico_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `link_img` varchar(300) DEFAULT NULL,
  `tipo` int(4) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `tempo_estimado` time NOT NULL,
  `status` enum('disponível,indisponível') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`servico_id`, `nome`, `descricao`, `link_img`, `tipo`, `preco`, `tempo_estimado`, `status`) VALUES
(1, 'Undercut', 'Corte de cabelo em que os lados e a parte de trás são raspados ou aparados curtos, enquanto o topo é deixado mais longo', './assets/images/banner/servicos/1.jpeg', 1, 16.00, '00:30:00', 'disponível,indisponível'),
(2, 'Pompadour', ' Um corte de cabelo em que o cabelo é mantido mais curto nas laterais e na parte de trás, enquanto o topo é penteado para trás e levantado para criar volume', './assets/images/banner/servicos/Pompadour.png\r\n', 1, 18.00, '00:45:00', 'disponível,indisponível'),
(3, 'Fade', 'Um corte de cabelo gradualmente aparado, no qual o cabelo é mais curto nas laterais e na parte de trás, fundindo-se suavemente com o topo', './assets/images/banner/servicos/Side-Part-Fade-Haircut.png', 1, 13.00, '00:30:00', 'disponível,indisponível'),
(4, 'Crew Cu', 'Um corte de cabelo curto e uniforme em toda a cabeça, geralmente com uma pequena quantidade de comprimento no topo', './assets/images/banner/servicos/haircut.png', 1, 11.00, '00:30:00', 'disponível,indisponível'),
(5, 'Bob', 'Um corte de cabelo curto, geralmente na altura do queixo, com as pontas cortadas em linha reta ou em ângulo', './assets/images/banner/servicos/Bob.png', 1, 18.00, '00:50:00', 'disponível,indisponível'),
(6, 'Long Layers', 'Um corte de cabelo em camadas, com comprimento mais longo, que cria movimento e textura no cabelo', './assets/images/banner/servicos/Shay-Maria-Hairstyles-For-Long-Layered-Hair-With-Bangs.png', 1, 20.00, '01:00:00', 'disponível,indisponível'),
(9, 'Barba Lenhador', 'Uma barba cheia e densa, geralmente mantida em um comprimento médio a longo', './assets/images/banner/servicos/Barba Lenhador.png', 2, 11.00, '00:25:00', 'disponível,indisponível'),
(10, 'Barba Cavanhaque', 'Um estilo de barba que se concentra no queixo, com o resto da face raspada ou com pelos mais curtos', './assets/images/banner/servicos/Barba Cavanhaque.png', 2, 8.00, '00:15:00', 'disponível,indisponível'),
(11, 'Barba Desenhada', 'Uma barba com um design específico, como linhas definidas, formas geométricas ou outros padrões personalizados', './assets/images/banner/servicos/Barba Desenhada.png', 2, 15.00, '35:00:00', 'disponível,indisponível'),
(12, 'Bigode Handlebar', 'Um bigode mais curto e bem definido, geralmente moldado em formato de arco acima do lábio superior', './assets/images/banner/servicos/Bigode Handlebar.png', 2, 6.00, '00:10:00', 'disponível,indisponível'),
(13, 'Bigode Inglês', 'Um bigode mais curto e bem definido, geralmente moldado em formato de arco acima do lábio superior', './assets/images/banner/servicos/Bigode Inglês.png', 2, 6.00, '00:10:00', 'disponível,indisponível'),
(14, 'Bigode Dali', 'Um bigode longo e fino, com as pontas curvadas para cima de maneira acentuada, criando uma aparência distinta e dramática', './assets/images/banner/servicos/Bigode Dali.png', 2, 6.00, '00:10:00', 'disponível,indisponível');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_agendados`
--

CREATE TABLE `servicos_agendados` (
  `agendamento_id` int(5) NOT NULL,
  `servico_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_servico`
--

CREATE TABLE `tipo_servico` (
  `id` int(4) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo_servico`
--

INSERT INTO `tipo_servico` (`id`, `nome`, `descricao`, `imagem`) VALUES
(1, 'Cortes de cabelo', 'Cortes de cabelo masculino e feminino ', './assets/images/icons/scissor-and-comb.png'),
(2, 'Barba', 'cortes de barba e também inclui tratamentos para amaciar e hidratar a barba.', './assets/images/icons/corte-de-barba.png'),
(3, 'Acabamento e contorno', ' Cuidado e aperfeiçoamento dos detalhes do corte de cabelo e barba.', './assets/images/icons/razor.png'),
(4, 'Tratamentos capilares', 'Tratamentos de hidratação, revitalização, fortalecimento ou até mesmo tratamentos específicos para o couro cabeludo.', './assets/images/icons/pente-de-cabelo.png'),
(5, 'Massagista facial', 'fghd fghdfh dfh dh dh dhg dfg', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `servicos` (`id_servico`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estado_user`
--
ALTER TABLE `estado_user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`func_id`);

--
-- Índices para tabela `funcionario_agendamento`
--
ALTER TABLE `funcionario_agendamento`
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agendamento` (`id_agendamento`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`servico_id`),
  ADD KEY `tipo` (`tipo`);

--
-- Índices para tabela `servicos_agendados`
--
ALTER TABLE `servicos_agendados`
  ADD KEY `agendamento_id` (`agendamento_id`),
  ADD KEY `servico_id` (`servico_id`);

--
-- Índices para tabela `tipo_servico`
--
ALTER TABLE `tipo_servico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estado_user`
--
ALTER TABLE `estado_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `func_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tipo_servico`
--
ALTER TABLE `tipo_servico`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`cliente_id`),
  ADD CONSTRAINT `agendamentos_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`func_id`),
  ADD CONSTRAINT `agendamentos_ibfk_3` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`servico_id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estado_user` (`id`);

--
-- Limitadores para a tabela `funcionario_agendamento`
--
ALTER TABLE `funcionario_agendamento`
  ADD CONSTRAINT `funcionario_agendamento_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`func_id`);

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`id_agendamento`) REFERENCES `agendamentos` (`id`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_servico` (`id`);

--
-- Limitadores para a tabela `servicos_agendados`
--
ALTER TABLE `servicos_agendados`
  ADD CONSTRAINT `servicos_agendados_ibfk_1` FOREIGN KEY (`agendamento_id`) REFERENCES `agendamentos` (`id`),
  ADD CONSTRAINT `servicos_agendados_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`servico_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
