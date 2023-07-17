-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jul-2023 às 15:37
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
  `reserva` int(11) NOT NULL DEFAULT 1,
  `preco_total` decimal(10,2) NOT NULL,
  `status` enum('por realizar','cancelado','realizado') NOT NULL DEFAULT 'por realizar',
  `senha` varchar(100) DEFAULT NULL,
  `cancelar` tinyint(1) NOT NULL DEFAULT 0,
  `razao_cancelar` text DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time_expected` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `data`, `hora`, `id_cliente`, `id_funcionario`, `id_servico`, `reserva`, `preco_total`, `status`, `senha`, `cancelar`, `razao_cancelar`, `start_time`, `end_time_expected`) VALUES
(135, '2023-07-20', '09:20:00', 1, 4, 1, 1, '0.00', 'por realizar', '0', 0, NULL, '2023-07-16 00:13:00', NULL),
(136, '2023-07-07', '11:18:00', 1, 5, 14, 1, '0.00', 'por realizar', '0', 0, NULL, '2023-07-16 00:14:37', NULL),
(137, '2023-07-14', '11:28:00', 1, 5, 13, 1, '0.00', 'por realizar', '0', 0, NULL, '2023-07-16 00:24:49', NULL),
(138, '2023-07-14', '11:28:00', 1, 5, 6, 1, '0.00', 'por realizar', '0', 0, NULL, '2023-07-16 00:25:43', NULL),
(139, '2023-07-14', '11:28:00', 1, 5, 13, 1, '0.00', 'por realizar', '0', 0, NULL, '2023-07-16 00:25:43', NULL),
(140, '2023-07-14', '11:28:00', 1, 5, 3, 1, '13.00', 'por realizar', '0', 0, NULL, '2023-07-16 00:26:26', NULL),
(141, '2023-07-14', '11:28:00', 1, 5, 6, 1, '13.00', 'por realizar', '0', 0, NULL, '2023-07-16 00:26:26', NULL),
(142, '2023-07-14', '11:28:00', 1, 5, 13, 1, '13.00', 'por realizar', '0', 0, NULL, '2023-07-16 00:26:26', NULL),
(146, '2023-07-06', '12:16:00', 1, 2, 2, 1, '18.00', 'por realizar', '0', 0, NULL, '2023-07-16 07:12:48', NULL),
(150, '2023-07-06', '12:16:00', 1, 4, 2, 1, '18.00', 'por realizar', '0', 0, NULL, '2023-07-16 07:12:55', NULL),
(152, '2023-07-06', '12:16:00', 1, 5, 2, 1, '18.00', 'por realizar', '0', 0, NULL, '2023-07-16 07:12:58', NULL),
(153, '2023-07-06', '12:16:00', 1, 4, 2, 1, '18.00', 'por realizar', '0', 0, NULL, '2023-07-16 07:13:00', NULL),
(154, '2023-07-06', '12:16:00', 1, 4, 2, 1, '18.00', 'por realizar', '0', 0, NULL, '2023-07-16 07:13:02', NULL),
(155, '2023-07-06', '12:16:00', 1, 4, 2, 1, '18.00', 'por realizar', '0', 0, NULL, '2023-07-16 07:13:04', NULL),
(156, '2023-07-06', '12:16:00', 1, 5, 2, 1, '18.00', 'realizado', '0', 0, NULL, '2023-07-16 07:13:05', NULL);

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
(1, 'JOSEP', 'Chaves', '2', '', '96f2ebb77a22ff1c2f35286ec99bd19cd7aeba3d', 3024956, '923834524', 'gab@gmail.com', '2003-02-12', '2023-04-04 23:00:00', 0, NULL, 1),
(4, 'Josep', 'Fernando', '', 'josep', '28836d655152897399c43bc8ea7d0b011ec54009', 0, '923834529', 'josep@gmail.com', '2003-04-17', '2023-04-23 16:30:38', 0, NULL, 3),
(5, 'Roberto', 'Josep', '', 'Rojosep', '7c222fb2927d828af22f592134e8932480637c0d', 0, '924736082', 'rober@gmail.com', '0000-00-00', '2023-04-23 16:31:29', 0, NULL, 3),
(6, 'Hinata', 'Shoyo', '', '', '1ef669619bf6adca1e1b9a4667433783f8280cc9', 0, '', 'hinata@gmail.com', '1993-06-23', '2023-06-10 11:17:39', 0, NULL, 3),
(11, 'Guci', 'vani', '1', 'gcv', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 12323, '', 'gucivanimufuma@gmail.com', '2023-07-11', '2023-07-16 00:01:16', 551448, NULL, 3),
(12, 'Tyir', 'Luff', '2', 'tyirluf', '96f2ebb77a22ff1c2f35286ec99bd19cd7aeba3d', 123456, '', 'tyirluf@gmail.com', '2015-01-15', '2023-07-16 07:56:05', 0, NULL, 1),
(16, 'Teste B.O', 'B.O', 'Masculino', '', '96f2ebb77a22ff1c2f35286ec99bd19cd7aeba3d', 324342, '+55 3123-213123', 'jucivaniemanuel@gmail.com', '0000-00-00', '2023-07-17 10:35:44', 0, NULL, 1),
(17, 'Teste B.O', 'editar', 'Masculino', '', '', 0, '', '', '0000-00-00', '2023-07-17 11:03:53', 0, NULL, 3),
(18, 'Teste B.O', 'editar', 'Masculino', '', '', 0, '', '', '0000-00-00', '2023-07-17 11:04:02', 0, NULL, 3),
(19, 'Guciee', 'vani', 'Masculino', '', '', 0, '', 'vani2@gmail.com', '0000-00-00', '2023-07-17 11:32:38', 0, NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(5) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `telefone` int(9) NOT NULL,
  `email` varchar(40) NOT NULL,
  `instagram` varchar(150) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `twitter` varchar(150) NOT NULL,
  `horario_trabalho` varchar(300) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `loc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `logo`, `imagem`, `descricao`, `telefone`, `email`, `instagram`, `facebook`, `twitter`, `horario_trabalho`, `endereco`, `loc`) VALUES
(1, 'Barber Barty', '', './assets/images/banner/banner.png', 'A Barbearia Barty é um estabelecimento de excelência, que busca oferecer serviços de qualidade, uma experiência única e um ambiente acolhedor aos clientes. Com base em um planejamento detalhado e uma abordagem profissional, a barbearia busca se destacar no mercado e proporcionar uma jornada satisfatória e memorável para todos os clientes que a visitam.', 924736082, 'inforbarty@gmail.com', 'https://www.instagram.com/barber_barty/', 'https://www.facebook.com/profile.php?id=100095079541664', 'https://twitter.com/barberbarty', 'segunda-feira	10:00–13:00, 14:30–19:30\r\nterça-feira	10:00–13:00, 14:30–19:30\r\nquarta-feira	10:00–13:00, 14:30–19:30\r\nquinta-feira	10:00–13:00, 14:30–19:30\r\nsexta-feira	10:00–13:00, 14:30–19:30\r\nsábado	        09:30–17:00\r\ndomingo	Encerrado\r\n', 'Av. Nuno Álvares, 4400-233 Vila Nova de Gaia', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.566291816639!2d-8.615531924706007!3d41.1221622124059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2464d451a09af9%3A0x5b4479f6fb3e3945!2sEscola%20Secund%C3%A1ria%20Ant%C3%B3nio%20S%C3%A9rgio!5e0!3m2!1spt-PT!2spt!4v1689521207758!5m2!1spt-PT!2spt\" width=\"800\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

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
  `funcao` int(11) DEFAULT 1,
  `rede_social` varchar(150) NOT NULL,
  `especializacao` varchar(150) NOT NULL,
  `anos_experiencia` varchar(100) NOT NULL,
  `salario` decimal(10,2) NOT NULL DEFAULT 5.69,
  `horarios_trabalho` time NOT NULL DEFAULT '07:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`func_id`, `primeiro_nome`, `ultimo_nome`, `imagem`, `genero`, `username`, `senha`, `confirmar_senha`, `descricao`, `telefone`, `email`, `data_nascimento`, `funcao`, `rede_social`, `especializacao`, `anos_experiencia`, `salario`, `horarios_trabalho`) VALUES
(2, 'Juan', ' Guedes', './assets/images/team/1.jpg', 'Masculino', 'Jguedes', '0ae79f716854035c6a24cbb2156c14183b99f317', '', 'Teste', '1231232312', 'jguedes@gmail.com', '1987-02-03', 1, '', 'Barba', '5 anos', '5.69', '10:00:00'),
(4, 'Alexandre ', 'Santos', '', 'Masculino', 'Asantos', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', 'asantos@gmail.com', '0000-00-00', 3, '', 'dormir', '', '5.69', '07:00:00'),
(5, 'Ana', 'Rodrigues', '', 'Masculino', 'Aricardo', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', '', '', '0000-00-00', 3, '', '', '', '5.69', '07:00:00'),
(16, 'João Gome', 'Celestina', '', 'Masculino', 'tyirluf@gmail.com', '96f2ebb77a22ff1c2f35286ec99bd19cd7aeba3d', '', 'asda', '+55 3123-213123', 'josep@gmail.com', '0000-00-00', 4, '', '0', '3', '5.69', '07:00:00');

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
-- Estrutura da tabela `newsletter_inscritos`
--

CREATE TABLE `newsletter_inscritos` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_inscricao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `newsletter_inscritos`
--

INSERT INTO `newsletter_inscritos` (`id`, `email`, `data_inscricao`) VALUES
(15, 'tyirluf@gmail.com', '2023-07-17 00:35:04');

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
(1, 'Undercut', 'Corte de cabelo em que os lados e a parte de trás são raspados ou aparados curtos, enquanto o topo é deixado mais longo', './assets/images/banner/servicos/1.jpeg', 1, '16.00', '00:30:00', 'disponível,indisponível'),
(2, 'Pompadour', ' Um corte de cabelo em que o cabelo é mantido mais curto nas laterais e na parte de trás, enquanto o topo é penteado para trás e levantado para criar volume', './assets/images/banner/servicos/Pompadour.png\r\n', 1, '18.00', '00:45:00', 'disponível,indisponível'),
(3, 'Fade', 'Um corte de cabelo gradualmente aparado, no qual o cabelo é mais curto nas laterais e na parte de trás, fundindo-se suavemente com o topo', './assets/images/banner/servicos/Side-Part-Fade-Haircut.png', 1, '13.00', '00:30:00', 'disponível,indisponível'),
(4, 'Crew Cu', 'Um corte de cabelo curto e uniforme em toda a cabeça, geralmente com uma pequena quantidade de comprimento no topo', './assets/images/banner/servicos/haircut.png', 1, '11.00', '00:30:00', 'disponível,indisponível'),
(5, 'Bob', 'Um corte de cabelo curto, geralmente na altura do queixo, com as pontas cortadas em linha reta ou em ângulo', './assets/images/banner/servicos/Bob.png', 1, '18.00', '00:50:00', 'disponível,indisponível'),
(6, 'Long Layers', 'Um corte de cabelo em camadas, com comprimento mais longo, que cria movimento e textura no cabelo', './assets/images/banner/servicos/Shay-Maria-Hairstyles-For-Long-Layered-Hair-With-Bangs.png', 1, '20.00', '01:00:00', 'disponível,indisponível'),
(9, 'Barba Lenhador', 'Uma barba cheia e densa, geralmente mantida em um comprimento médio a longo', './assets/images/banner/servicos/Barba Lenhador.png', 2, '11.00', '00:25:00', 'disponível,indisponível'),
(10, 'Barba Cavanhaque', 'Um estilo de barba que se concentra no queixo, com o resto da face raspada ou com pelos mais curtos', './assets/images/banner/servicos/Barba Cavanhaque.png', 2, '8.00', '00:15:00', 'disponível,indisponível'),
(11, 'Barba Desenhada', 'Uma barba com um design específico, como linhas definidas, formas geométricas ou outros padrões personalizados', './assets/images/banner/servicos/Barba Desenhada.png', 2, '15.00', '35:00:00', 'disponível,indisponível'),
(12, 'Bigode Handlebar', 'Um bigode mais curto e bem definido, geralmente moldado em formato de arco acima do lábio superior', './assets/images/banner/servicos/Bigode Handlebar.png', 2, '6.00', '00:10:00', 'disponível,indisponível'),
(13, 'Bigode Inglês', 'Um bigode mais curto e bem definido, geralmente moldado em formato de arco acima do lábio superior', './assets/images/banner/servicos/Bigode Inglês.png', 2, '6.00', '00:10:00', 'disponível,indisponível'),
(14, 'Bigode Dali', 'Um bigode longo e fino, com as pontas curvadas para cima de maneira acentuada, criando uma aparência distinta e dramática', './assets/images/banner/servicos/Bigode Dali.png', 2, '6.00', '00:10:00', 'disponível,indisponível');

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
  ADD KEY `servicos` (`id_servico`),
  ADD KEY `reserva` (`reserva`);

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
  ADD PRIMARY KEY (`func_id`),
  ADD KEY `funcao` (`funcao`);

--
-- Índices para tabela `funcionario_agendamento`
--
ALTER TABLE `funcionario_agendamento`
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `newsletter_inscritos`
--
ALTER TABLE `newsletter_inscritos`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `func_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `newsletter_inscritos`
--
ALTER TABLE `newsletter_inscritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `agendamentos_ibfk_3` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`servico_id`),
  ADD CONSTRAINT `agendamentos_ibfk_4` FOREIGN KEY (`reserva`) REFERENCES `servicos` (`servico_id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estado_user` (`id`);

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`funcao`) REFERENCES `tipo_servico` (`id`);

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
