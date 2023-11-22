-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 22/11/2023 às 16:27
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `raffle29_rifas`
--
CREATE DATABASE IF NOT EXISTS `raffle29_rifas` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `raffle29_rifas`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `affiliate_click`
--

CREATE TABLE `affiliate_click` (
  `id` int(11) NOT NULL,
  `affiliate_ref` varchar(200) NOT NULL,
  `user_ip` varchar(200) NOT NULL,
  `affiliate_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `affiliate_click`
--

INSERT INTO `affiliate_click` (`id`, `affiliate_ref`, `user_ip`, `affiliate_data`) VALUES
(1, '123', '::1', '2023-05-27 09:25:52'),
(2, '123', '::1', '2023-05-27 09:26:47'),
(3, '123', '123::1', '2023-05-27 09:26:47'),
(4, '123', '123::1', '2023-05-27 09:26:47'),
(5, '123', '::1', '2023-05-28 00:03:12'),
(6, '87126', '189.74.191.66', '2023-05-30 19:09:33'),
(7, '1178060961', '201.7.31.251', '2023-08-13 16:46:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `affiliate_comission`
--

CREATE TABLE `affiliate_comission` (
  `id` int(11) NOT NULL,
  `comission_payment_id` varchar(200) NOT NULL COMMENT 'id da transacao no banco',
  `comission_amount` varchar(200) NOT NULL COMMENT 'valor do pagamentos',
  `comission_porcentage` varchar(200) NOT NULL COMMENT 'porcentamgem de comissao',
  `comission_date` datetime NOT NULL COMMENT 'data',
  `comission_status` int(11) NOT NULL COMMENT '0 - Pendente/\r\n1 - Repassados',
  `comission_payer` int(11) NOT NULL COMMENT 'usuario que fez o pagamento',
  `comission_receiver` int(11) NOT NULL,
  `comission` varchar(200) NOT NULL COMMENT 'comissao a ser recebida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `affiliate_comission`
--

INSERT INTO `affiliate_comission` (`id`, `comission_payment_id`, `comission_amount`, `comission_porcentage`, `comission_date`, `comission_status`, `comission_payer`, `comission_receiver`, `comission`) VALUES
(8, '123', '10', '20', '2023-08-21 19:53:08', 1, 35, 34, '10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `affiliate_comission_history`
--

CREATE TABLE `affiliate_comission_history` (
  `id` int(11) NOT NULL,
  `comission_amount` varchar(200) NOT NULL,
  `comission_date` varchar(200) NOT NULL,
  `comission_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `affiliate_comission_history`
--

INSERT INTO `affiliate_comission_history` (`id`, `comission_amount`, `comission_date`, `comission_user`) VALUES
(8, '10', '2023-08-13 20:18:20', '34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `affiliate_setting`
--

CREATE TABLE `affiliate_setting` (
  `id` int(11) NOT NULL,
  `c_porcentage` varchar(11) NOT NULL,
  `c_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `affiliate_setting`
--

INSERT INTO `affiliate_setting` (`id`, `c_porcentage`, `c_active`) VALUES
(1, '20', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_raffle` int(11) NOT NULL,
  `cart_amount` float NOT NULL,
  `cart_user` int(11) NOT NULL,
  `cart_data` varchar(200) NOT NULL,
  `cart_time` varchar(200) NOT NULL,
  `cart_expiration` varchar(200) NOT NULL,
  `cart_discount` int(11) NOT NULL,
  `cart_discount_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL COMMENT '1 - ativo | - 0 excluido'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cart`
--

INSERT INTO `cart` (`id`, `cart_raffle`, `cart_amount`, `cart_user`, `cart_data`, `cart_time`, `cart_expiration`, `cart_discount`, `cart_discount_id`, `cart_status`) VALUES
(96, 27, 40, 19, '07-03-2023', '12:36', '12:56', 0, 0, 1),
(94, 27, 20, 11, '07-03-2023', '09:55', '10:15', 0, 0, 1),
(102, 7, 20, 15, '07-03-2023', '23:29', '23:49', 0, 0, 1),
(126, 50, 1, 10, '30-05-2023', '17:47', '18:07', 0, 0, 1),
(142, 60, 10, 34, '14-08-2023', '14:20', '14:40', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cart_discount`
--

CREATE TABLE `cart_discount` (
  `id` int(11) NOT NULL,
  `cart_discount_code` varchar(200) NOT NULL,
  `cart_discount_porcentage` int(11) NOT NULL,
  `cart_discount_limit` int(11) NOT NULL,
  `cart_discount_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cart_discount`
--

INSERT INTO `cart_discount` (`id`, `cart_discount_code`, `cart_discount_porcentage`, `cart_discount_limit`, `cart_discount_status`) VALUES
(2, 'RIFA30', 30, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cart_tickets`
--

CREATE TABLE `cart_tickets` (
  `id` int(11) NOT NULL,
  `cart_raffle` int(11) NOT NULL,
  `cart_ticket` int(11) NOT NULL,
  `cart_user` int(11) NOT NULL,
  `cart_data` varchar(200) NOT NULL,
  `cart_time` varchar(200) NOT NULL,
  `cart_expiration` varchar(200) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cart_tickets`
--

INSERT INTO `cart_tickets` (`id`, `cart_raffle`, `cart_ticket`, `cart_user`, `cart_data`, `cart_time`, `cart_expiration`, `cart_status`) VALUES
(979, 7, 46, 15, '07-03-2023', '23:29', '23:49', 1),
(978, 7, 63, 15, '07-03-2023', '23:29', '23:49', 1),
(1167, 50, 28, 10, '30-05-2023', '17:47', '18:07', 1),
(1408, 60, 10, 34, '14-08-2023', '14:20', '14:40', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `configurations`
--

CREATE TABLE `configurations` (
  `id` int(11) NOT NULL,
  `configuracoes_social_facebook` varchar(200) NOT NULL,
  `configuracoes_social_twitter` varchar(200) NOT NULL,
  `configuracoes_social_instagram` varchar(200) NOT NULL,
  `configuracoes_contato_telefone` varchar(200) NOT NULL,
  `configuracoes_contato_email` varchar(200) NOT NULL,
  `configuracoes_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `configurations`
--

INSERT INTO `configurations` (`id`, `configuracoes_social_facebook`, `configuracoes_social_twitter`, `configuracoes_social_instagram`, `configuracoes_contato_telefone`, `configuracoes_contato_email`, `configuracoes_logo`) VALUES
(1, 'https://www.facebook.com', 'https://twitter.com', 'https://instagram.com', '62993615598', 'contato@betraffle.com', '1670253202logo.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cron_raffles`
--

CREATE TABLE `cron_raffles` (
  `id` int(11) NOT NULL,
  `raffles_id` int(11) NOT NULL,
  `run_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cron_raffles`
--

INSERT INTO `cron_raffles` (`id`, `raffles_id`, `run_date`) VALUES
(2, 52, '2023-05-30 19:25:02'),
(3, 53, '2023-08-10 21:34:03'),
(4, 54, '2023-08-10 22:00:05'),
(5, 55, '2023-08-13 21:17:03'),
(6, 61, '2023-08-19 19:17:03');

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL,
  `depoimentos_title` varchar(200) NOT NULL,
  `depoimentos_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `depoimentos`
--

INSERT INTO `depoimentos` (`id`, `depoimentos_title`, `depoimentos_content`) VALUES
(4, 'Juliana Silva', 'Fácil e emocionante! Ganhei minha rifa.\r\n'),
(5, 'Hélio Souzz', 'Amo participar dos sorteios da Betraffle. Super confiável!'),
(6, 'Ana Martins', 'A Betraffle me deu a chance de ganhar prêmios incríveis!\r\n'),
(7, 'Carlos Antonio', 'Rifas divertidas e transparentes. Recomendo a Betraffle!'),
(8, 'Heitor Santos', 'Nunca tinha ganhado nada até participar dos sorteios da Betraffle. Sensacional!'),
(10, 'Ana Martins', 'A Betraffle mudou minha sorte! Ganhei um prêmio incrível!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `faq_title` varchar(200) NOT NULL,
  `faq_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `faq`
--

INSERT INTO `faq` (`id`, `faq_title`, `faq_content`) VALUES
(9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type aLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type aLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a'),
(10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type aLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type aLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type aLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type aLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a');

-- --------------------------------------------------------

--
-- Estrutura para tabela `gateways`
--

CREATE TABLE `gateways` (
  `id` int(11) NOT NULL,
  `gateway_me_public` varchar(200) NOT NULL,
  `gateway_me_secret` varchar(200) NOT NULL,
  `gateway_pay_public` varchar(200) NOT NULL,
  `gateway_pay_secret` varchar(200) NOT NULL,
  `gateway_act_public` varchar(200) NOT NULL,
  `gateway_act_secret` varchar(200) NOT NULL,
  `gateway_act_list` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `gateways`
--

INSERT INTO `gateways` (`id`, `gateway_me_public`, `gateway_me_secret`, `gateway_pay_public`, `gateway_pay_secret`, `gateway_act_public`, `gateway_act_secret`, `gateway_act_list`) VALUES
(1, 'APP_USR-30ee6627-5206-434f-bc5c-ffab163e0840', 'APP_USR-1940081059365251-021420-2418e3d3c3c80523783038cbfb8dc3ed-733723318', '', '', 'https://natanecommerce.api-us1.com', '0a3a1c0dd5d2d870006368934c42c80f42cb06885cbdd56b2db12d912665efe791c100aa', '3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `gateways_notification`
--

CREATE TABLE `gateways_notification` (
  `id` int(11) NOT NULL,
  `notifications` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_amount` varchar(200) NOT NULL,
  `order_user` int(11) NOT NULL,
  `order_date` varchar(200) NOT NULL,
  `order_time` varchar(200) NOT NULL,
  `order_type` varchar(200) NOT NULL COMMENT '1 - gateway | 0 - creditos',
  `order_status` int(11) NOT NULL COMMENT '0 - pendente|\r\n1 - processado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `order`
--

INSERT INTO `order` (`id`, `order_amount`, `order_user`, `order_date`, `order_time`, `order_type`, `order_status`) VALUES
(47, '10', 34, '2023-08-14', '00:36:24', '0', 0),
(48, '10', 34, '2023-08-14', '00:36:29', '0', 0),
(49, '10', 34, '2023-08-14', '00:36:51', '0', 0),
(50, '10', 34, '2023-08-14', '14:20:54', '0', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `order_raffles`
--

CREATE TABLE `order_raffles` (
  `id` int(11) NOT NULL,
  `raffles_order` int(11) NOT NULL,
  `raffles_id` int(11) NOT NULL,
  `raffles_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `order_raffles`
--

INSERT INTO `order_raffles` (`id`, `raffles_order`, `raffles_id`, `raffles_user`) VALUES
(89, 50, 60, 34),
(88, 49, 56, 34),
(87, 48, 56, 34),
(86, 47, 56, 34);

-- --------------------------------------------------------

--
-- Estrutura para tabela `order_raffles_tickets`
--

CREATE TABLE `order_raffles_tickets` (
  `id` int(11) NOT NULL,
  `raffles_order` int(11) NOT NULL,
  `raffles_id` int(11) NOT NULL,
  `raffles_user` int(11) NOT NULL,
  `raffles_ticket` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `order_raffles_tickets`
--

INSERT INTO `order_raffles_tickets` (`id`, `raffles_order`, `raffles_id`, `raffles_user`, `raffles_ticket`) VALUES
(834, 89, 60, 34, '10'),
(833, 88, 56, 34, '1'),
(832, 88, 56, 34, '17'),
(831, 88, 56, 34, '33'),
(830, 88, 56, 34, '49'),
(829, 88, 56, 34, '65'),
(828, 88, 56, 34, '66'),
(827, 88, 56, 34, '50'),
(826, 88, 56, 34, '34'),
(825, 88, 56, 34, '18'),
(824, 88, 56, 34, '2'),
(823, 87, 56, 34, '1'),
(822, 87, 56, 34, '17'),
(821, 87, 56, 34, '33'),
(820, 87, 56, 34, '49'),
(819, 87, 56, 34, '65'),
(818, 87, 56, 34, '66'),
(817, 87, 56, 34, '50'),
(816, 87, 56, 34, '34'),
(815, 87, 56, 34, '18'),
(814, 87, 56, 34, '2'),
(813, 86, 56, 34, '1'),
(812, 86, 56, 34, '17'),
(811, 86, 56, 34, '33'),
(810, 86, 56, 34, '49'),
(809, 86, 56, 34, '65'),
(808, 86, 56, 34, '66'),
(807, 86, 56, 34, '50'),
(806, 86, 56, 34, '34'),
(805, 86, 56, 34, '18'),
(804, 86, 56, 34, '2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payments_id` varchar(200) DEFAULT NULL,
  `payments_order` int(11) NOT NULL,
  `payments_amount` float NOT NULL,
  `payments_status` int(11) NOT NULL COMMENT '1 sucesso / 2 pendente / 3 recusado // 4 estornado',
  `payments_user` int(11) NOT NULL,
  `payments_date` varchar(200) NOT NULL,
  `payments_time` varchar(200) NOT NULL,
  `payments_proccess` varchar(200) NOT NULL COMMENT '1 - gateway|\r\n0 - interno ',
  `payments_type` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `payments`
--

INSERT INTO `payments` (`id`, `payments_id`, `payments_order`, `payments_amount`, `payments_status`, `payments_user`, `payments_date`, `payments_time`, `payments_proccess`, `payments_type`) VALUES
(56, '966497494', 1, 50, 1, 21, '16-04-2023', '01:49:40', '0', 'creditos'),
(55, '2044051641', 1, 50, 1, 22, '16-04-2023', '01:48:29', '0', 'creditos'),
(54, '1313112779', 38, 50, 1, 12, '08-03-2023', '15:24:42', '1', 'credit_card'),
(46, '563828493', 1, 30, 1, 12, '07-03-2023', '20:12:11', '0', 'creditos'),
(47, NULL, 33, 70.01, 2, 15, '07-03-2023', '22:37:38', '1', NULL),
(48, '311790994', 1, 0.01, 1, 15, '07-03-2023', '22:52:18', '0', 'creditos'),
(49, '1038240781', 1, 10, 1, 15, '07-03-2023', '22:52:18', '0', 'creditos'),
(50, NULL, 34, 20, 2, 15, '07-03-2023', '22:55:54', '1', NULL),
(51, NULL, 35, 20, 2, 15, '07-03-2023', '22:55:55', '1', NULL),
(52, NULL, 36, 20, 2, 15, '07-03-2023', '22:55:58', '1', NULL),
(53, '1311976238', 37, 20, 1, 15, '07-03-2023', '23:02:40', '1', 'credit_card'),
(57, '1794886440', 1, 930, 1, 10, '28-05-2023', '14:26:41', '0', 'creditos'),
(58, NULL, 39, 0, 2, 10, '28-05-2023', '19:34:42', '1', NULL),
(59, NULL, 40, 0, 2, 10, '28-05-2023', '19:34:43', '1', NULL),
(60, NULL, 41, 0, 2, 10, '28-05-2023', '19:36:59', '1', NULL),
(61, NULL, 42, 0, 2, 10, '28-05-2023', '19:37:08', '1', NULL),
(62, NULL, 43, 0, 2, 10, '28-05-2023', '19:37:11', '1', NULL),
(63, '125914190', 1, 0, 1, 10, '28-05-2023', '19:37:20', '0', 'creditos'),
(64, NULL, 44, 179.97, 2, 10, '28-05-2023', '20:29:29', '1', NULL),
(65, NULL, 45, 179.97, 2, 10, '28-05-2023', '20:29:30', '1', NULL),
(66, '1850762083', 1, 0, 1, 10, '28-05-2023', '20:29:56', '0', 'creditos'),
(67, '897791267', 1, 179.97, 1, 10, '28-05-2023', '20:29:56', '0', 'creditos'),
(68, '1848107259', 1, 10, 1, 10, '28-05-2023', '23:24:11', '0', 'creditos'),
(69, '300922075', 1, 10, 1, 10, '28-05-2023', '23:44:16', '0', 'creditos'),
(70, '1682500532', 1, 10, 1, 10, '28-05-2023', '23:46:48', '0', 'creditos'),
(71, '1865312491', 1, 0.5, 1, 10, '29-05-2023', '00:30:16', '0', 'creditos'),
(72, '1751800382', 1, 0.04, 1, 10, '29-05-2023', '00:34:15', '0', 'creditos'),
(73, '654116792', 1, 0.01, 1, 10, '29-05-2023', '00:34:37', '0', 'creditos'),
(74, '56731190', 1, 9, 1, 10, '30-05-2023', '17:35:11', '0', 'creditos'),
(75, NULL, 46, 1, 2, 10, '30-05-2023', '17:47:43', '1', NULL),
(76, '1161463270', 1, 0, 4, 31, '30-05-2023', '19:13:29', '0', 'creditos'),
(77, '573829178', 1, 43, 1, 31, '30-05-2023', '19:24:58', '0', 'creditos'),
(78, '1437139167', 1, 510, 1, 33, '10-08-2023', '21:29:12', '0', 'creditos'),
(79, '30884056', 1, 490, 1, 32, '10-08-2023', '21:29:58', '0', 'creditos'),
(80, '1636206186', 1, 250, 1, 33, '10-08-2023', '21:56:58', '0', 'creditos'),
(81, '106434333', 1, 250, 1, 32, '10-08-2023', '21:57:38', '0', 'creditos'),
(82, '507908702', 1, 2, 1, 35, '13-08-2023', '20:52:42', '0', 'creditos'),
(83, '1211641525', 1, 2, 1, 34, '13-08-2023', '21:16:48', '0', 'creditos'),
(84, NULL, 47, 10, 2, 34, '14-08-2023', '00:36:25', '1', NULL),
(85, NULL, 48, 10, 2, 34, '14-08-2023', '00:36:29', '1', NULL),
(86, NULL, 49, 10, 2, 34, '14-08-2023', '00:36:51', '1', NULL),
(87, '417648381', 1, 0, 1, 34, '14-08-2023', '00:38:07', '0', 'creditos'),
(88, '700969984', 1, 0, 1, 35, '14-08-2023', '00:58:18', '0', 'creditos'),
(89, '466956652', 1, 3, 1, 35, '14-08-2023', '13:55:19', '0', 'creditos'),
(90, '470763605', 1, 1, 1, 34, '14-08-2023', '13:56:14', '0', 'creditos'),
(91, NULL, 50, 10, 2, 34, '14-08-2023', '14:20:55', '1', NULL),
(92, '538353887', 1, 48, 1, 33, '19-08-2023', '18:50:27', '0', 'creditos'),
(93, '2519672', 1, 50, 1, 32, '19-08-2023', '18:51:38', '0', 'creditos'),
(94, '1216848155', 1, 2, 1, 32, '19-08-2023', '19:01:44', '0', 'creditos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `privacy_title` varchar(200) NOT NULL,
  `privacy_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `privacy`
--

INSERT INTO `privacy` (`id`, `privacy_title`, `privacy_content`) VALUES
(1, 'Privacidade', 'Na Betraffle, privacidade e segurança são prioridades e nos comprometemos com a transparência do tratamento de dados pessoais dos nossos usuários/clientes. Por isso, esta presente Política de Privacidade estabelece como é feita a coleta, uso e transferência de informações de clientes ou outras pessoas que acessam ou usam nosso site.\r\n\r\nAo utilizar nossos serviços, você entende que coletaremos e usaremos suas informações pessoais nas formas descritas nesta Política, sob as normas da Constituição Federal de 1988 (art. 5º, LXXIX; e o art. 22º, XXX – incluídos pela EC 115/2022), das normas de Proteção de Dados (LGPD, Lei Federal 13.709/2018), das disposições consumeristas da Lei Federal 8078/1990 e as demais normas do ordenamento jurídico brasileiro aplicáveis.\r\n\r\nDessa forma, a Betraffle, doravante denominada simplesmente como “Betraffle”, inscrita no CNPJ/MF sob o nº (nº do CNPJ), no papel de Controladora de Dados, obriga-se ao disposto na presente Política de Privacidade.\r\n\r\n1. Quais dados coletamos sobre você e para qual finalidade?\r\nNosso site coleta e utiliza alguns dados pessoais seus, de forma a viabilizar a prestação de serviços e aprimorar a experiência de uso.\r\n\r\n1.1. Dados pessoais fornecidos pelo titular\r\n Dado e finalidade\r\n Dado e finalidade\r\n Dado e finalidade\r\n Dado e finalidade\r\n1.2. Dados pessoais coletados automaticamente\r\n Dado e finalidade\r\n Dado e finalidade\r\n Dado e finalidade\r\n Dado e finalidade\r\n2. Como coletamos os seus dados?\r\nNesse sentido, a coleta dos seus dados pessoais ocorre da seguinte forma:\r\n\r\n Como se coleta\r\n Como se coleta\r\n Como se coleta\r\n Como se coleta\r\n2.1. Consentimento\r\nÉ a partir do seu consentimento que tratamos os seus dados pessoais. O consentimento é a manifestação livre, informada e inequívoca pela qual você autoriza a Betraffle a tratar seus dados.\r\n\r\nAssim, em consonância com a Lei Geral de Proteção de Dados, seus dados só serão coletados, tratados e armazenados mediante prévio e expresso consentimento. \r\n\r\nO seu consentimento será obtido de forma específica para cada finalidade acima descrita, evidenciando o compromisso de transparência e boa-fé da Betraffle para com seus usuários/clientes, seguindo as regulações legislativas pertinentes.\r\n\r\nAo utilizar os serviços da Betraffle e fornecer seus dados pessoais, você está ciente e consentindo com as disposições desta Política de Privacidade, além de conhecer seus direitos e como exercê-los.\r\n\r\nA qualquer tempo e sem nenhum custo, você poderá revogar seu consentimento.\r\n\r\nÉ importante destacar que a revogação do consentimento para o tratamento dos dados pode implicar a impossibilidade da performance adequada de alguma funcionalidade do site que dependa da operação. Tais consequências serão informadas previamente.\r\n\r\n3. Quais são os seus direitos?\r\nA Betraffle assegura a seus usuários/clientes seus direitos de titular previstos no artigo 18 da Lei Geral de Proteção de Dados. Dessa forma, você pode, de maneira gratuita e a qualquer tempo:\r\n\r\nConfirmar a existência de tratamento de dados, de maneira simplificada ou em formato claro e completo.\r\nAcessar seus dados, podendo solicitá-los em uma cópia legível sob forma impressa ou por meio eletrônico, seguro e idôneo.\r\nCorrigir seus dados, ao solicitar a edição, correção ou atualização destes.\r\nLimitar seus dados quando desnecessários, excessivos ou tratados em desconformidade com a legislação através da anonimização, bloqueio ou eliminação.\r\nSolicitar a portabilidade de seus dados, através de um relatório de dados cadastrais que a Betraffle trata a seu respeito.\r\nEliminar seus dados tratados a partir de seu consentimento, exceto nos casos previstos em lei.\r\nRevogar seu consentimento, desautorizando o tratamento de seus dados.\r\nInformar-se sobre a possibilidade de não fornecer seu consentimento e sobre as consequências da negativa.\r\n4. Como você pode exercer seus direitos de titular?\r\nPara exercer seus direitos de titular, você deve entrar em contato com a Betraffle através dos seguintes meios disponíveis:\r\n\r\n Meio de contato\r\n Meio de contato\r\nDe forma a garantir a sua correta identificação como titular dos dados pessoais objeto da solicitação, é possível que solicitemos documentos ou demais comprovações que possam comprovar sua identidade. Nessa hipótese, você será informado previamente.\r\n\r\n5. Como e por quanto tempo seus dados serão armazenados?\r\nSeus dados pessoais coletados pela Betraffle serão utilizados e armazenados durante o tempo necessário para a prestação do serviço ou para que as finalidades elencadas na presente Política de Privacidade sejam atingidas, considerando os direitos dos titulares dos dados e dos controladores.\r\n\r\nDe modo geral, seus dados serão mantidos enquanto a relação contratual entre você e a Betraffle perdurar. Findado o período de armazenamento dos dados pessoais, estes serão excluídos de nossas bases de dados ou anonimizados, ressalvadas as hipóteses legalmente previstas no artigo 16 lei geral de proteção de dados, a saber:\r\n\r\nI – cumprimento de obrigação legal ou regulatória pelo controlador;\r\n\r\nII – estudo por órgão de pesquisa, garantida, sempre que possível, a anonimização dos dados pessoais;\r\n\r\nIII – transferência a terceiro, desde que respeitados os requisitos de tratamento de dados dispostos nesta Lei; ou\r\n\r\nIV – uso exclusivo do controlador, vedado seu acesso por terceiro, e desde que anonimizados os dados.\r\n\r\nIsto é, informações pessoais sobre você que sejam imprescindíveis para o cumprimento de determinações legais, judiciais e administrativas e/ou para o exercício do direito de defesa em processos judiciais e administrativos serão mantidas, a despeito da exclusão dos demais dados. \r\n\r\nO armazenamento de dados coletados pela Betraffle reflete o nosso compromisso com a segurança e privacidade dos seus dados. Empregamos medidas e soluções técnicas de proteção aptas a garantir a confidencialidade, integridade e inviolabilidade dos seus dados. Além disso, também contamos com medidas de segurança apropriadas aos riscos e com controle de acesso às informações armazenadas.\r\n\r\n6. O que fazemos para manter seus dados seguros?\r\nPara mantermos suas informações pessoais seguras, usamos ferramentas físicas, eletrônicas e gerenciais orientadas para a proteção da sua privacidade.\r\n\r\nAplicamos essas ferramentas levando em consideração a natureza dos dados pessoais coletados, o contexto e a finalidade do tratamento e os riscos que eventuais violações gerariam para os direitos e liberdades do titular dos dados coletados e tratados.\r\n\r\nEntre as medidas que adotamos, destacamos as seguintes:\r\n\r\nApenas pessoas autorizadas têm acesso a seus dados pessoais\r\nO acesso a seus dados pessoais é feito somente após o compromisso de confidencialidade\r\nSeus dados pessoais são armazenados em ambiente seguro e idôneo.\r\nA Betraffle se compromete a adotar as melhores posturas para evitar incidentes de segurança. Contudo, é necessário destacar que nenhuma página virtual é inteiramente segura e livre de riscos. É possível que, apesar de todos os nossos protocolos de segurança, problemas de culpa exclusivamente de terceiros ocorram, como ataques cibernéticos de hackers, ou também em decorrência da negligência ou imprudência do próprio usuário/cliente.\r\n\r\nEm caso de incidentes de segurança que possa gerar risco ou dano relevante para você ou qualquer um de nossos usuários/clientes, comunicaremos aos afetados e a Autoridade Nacional de Proteção de Dados sobre o ocorrido, em consonância com as disposições da Lei Geral de Proteção de Dados.\r\n\r\n7. Com quem seus dados podem ser compartilhados?\r\nTendo em vista a preservação de sua privacidade, a Betraffle não compartilhará seus dados pessoais com nenhum terceiro não autorizado. \r\n\r\nSeus dados poderão ser compartilhados com nossos parceiros comerciais: (nome completo ou empresarial do parceiro comercial), inscrito no CPF/CNPJ sob o nº (número do CPF Ou CNPJ do parceiro comercial).\r\n\r\nEstes recebem seus dados apenas na medida do necessário para a prestação dos serviços contratados e nossos contratos são orientados pelas normas de proteção de dados do ordenamento jurídico brasileiro.\r\n\r\nTodavia, nossos parceiros têm suas próprias Políticas de Privacidade, que podem divergir desta. Recomendamos a leitura desses documentos, que você pode acessar aqui:\r\n\r\nPolítica de Privacidade do nosso parceiro: (link para a política de privacidade do parceiro comercial).\r\n\r\nAlém disso, também existem outras hipóteses em que seus dados poderão ser compartilhados, que são:\r\n\r\nI – Determinação legal, requerimento, requisição ou ordem judicial, com autoridades judiciais, administrativas ou governamentais competentes.\r\n\r\nII – Caso de movimentações societárias, como fusão, aquisição e incorporação, de forma automática\r\n\r\nIII – Proteção dos direitos da Betraffle em qualquer tipo de conflito, inclusive os de teor judicial.\r\n\r\n7.1. Transferência internacional de dados\r\nAlguns dos terceiros com quem compartilhamos seus dados podem ser localizados ou ou possuir instalações localizadas em países estrangeiros. Nessas condições, de toda forma, seus dados pessoais estarão sujeitos à Lei Geral de Proteção de Dados e às demais legislações brasileiras de proteção de dados\r\n\r\nNesse sentido, a Betraffle se compromete a sempre adotar eficientes padrões de segurança cibernética e de proteção de dados, nos melhores esforços de garantir e cumprir as exigências legislativas.\r\n\r\nAo concordar com essa Política de Privacidade, você concorda com esse compartilhamento, que se dará conforme as finalidades descritas no presente instrumento.\r\n\r\n8. Cookies ou dados de navegação\r\nA Betraffle faz uso de Cookies, que são arquivos de texto enviados pela plataforma ao seu computador e que nele se armazenam, que contém informações relacionadas à navegação do site. Em suma, os Cookies são utilizados para aprimorar a experiência de uso.\r\n\r\nAo acessar nosso site e consentir com o uso de Cookies, você manifesta conhecer e aceitar a utilização de um sistema de coleta de dados de navegação com o uso de Cookies em seu dispositivo.\r\n\r\nA Betraffle utiliza os seguintes Cookies: (descrição dos tipos de Cookies utilizados pelo site).\r\n\r\nVocê pode, a qualquer tempo e sem nenhum custo, alterar as permissões, bloquear ou recusar os Cookies. Todavia, a revogação do consentimento de determinados Cookies pode inviabilizar o funcionamento correto de alguns recursos da plataforma.\r\n\r\nPara gerenciar os cookies do seu navegador, basta fazê-lo diretamente nas configurações do navegador, na área de gestão de Cookies. Você pode acessar tutoriais sobre o tema diretamente nos links abaixo:\r\n\r\nSe você usa o Internet Explorer.\r\n\r\nSe você usa o Firefox.\r\n\r\nSe você usa o Safari.\r\n\r\nSe você usa o Google Chrome.\r\n\r\nSe você usa o Microsoft Edge.\r\n\r\nSe você usa o Opera.\r\n\r\nVocê pode ter maiores informações sobre os Cookies que utilizamos e como eles funcionam na nossa Política de Cookies, disponível neste link (link para a Política de Cookies).\r\n\r\n9. Alteração desta Política de Privacidade\r\nA atual versão da Política de Privacidade foi formulada e atualizada pela última vez em: (data da última atualização da Política de Privacidade).\r\n\r\nReservamos o direito de modificar essa Política de Privacidade a qualquer tempo, principalmente em função da adequação a eventuais alterações feitas em nosso site ou em âmbito legislativo. Recomendamos que você a revise com frequência.\r\n\r\nEventuais alterações entrarão em vigor a partir de sua publicação em nosso site e sempre lhe notificaremos acerca das mudanças ocorridas.\r\n\r\nAo utilizar nossos serviços e fornecer seus dados pessoais após tais modificações, você as consente. \r\n\r\n10. Responsabilidade\r\nA Betraffle prevê a responsabilidade dos agentes que atuam nos processos de tratamento de dados, em conformidade com os artigos 42 ao 45 da Lei Geral de Proteção de Dados.\r\n\r\nNos comprometemos em manter esta Política de Privacidade atualizada, observando suas disposições e zelando por seu cumprimento.\r\n\r\nAlém disso, também assumimos o compromisso de buscar condições técnicas e organizativas seguramente aptas a proteger todo o processo de tratamento de dados.\r\n\r\nCaso a Autoridade Nacional de Proteção de Dados exija a adoção de providências em relação ao tratamento de dados realizado pela Betraffle, comprometemo-nos a segui-las. \r\n\r\n10.1 Isenção de responsabilidade\r\nConforme mencionado no Tópico 6, embora adotemos elevados padrões de segurança a fim de evitar incidentes, não há nenhuma página virtual inteiramente livre de riscos. Nesse sentido, a Betraffle não se responsabiliza por:\r\n\r\nI – Quaisquer consequências decorrentes da negligência, imprudência ou imperícia dos usuários em relação a seus dados individuais. Garantimos e nos responsabilizamos apenas pela segurança dos processos de tratamento de dados e do cumprimento das finalidades descritas no presente instrumento.\r\n\r\nDestacamos que a responsabilidade em relação à confidencialidade dos dados de acesso é do usuário.\r\n\r\nII – Ações maliciosas de terceiros, como ataques de hackers, exceto se comprovada conduta culposa ou deliberada da Betraffle.\r\n\r\nDestacamos que em caso de incidentes de segurança que possam gerar risco ou dano relevante para você ou qualquer um de nossos usuários/clientes, comunicaremos aos afetados e a Autoridade Nacional de Proteção de Dados sobre o ocorrido e cumpriremos as providências necessárias.\r\n\r\nIII – Inveracidade das informações inseridas pelo usuário/cliente nos registros necessários para a utilização dos serviços da Betraffle; quaisquer consequências decorrentes de informações falsas ou inseridas de má-fé são de inteiramente responsabilidade do usuário/cliente.\r\n\r\n11. Encarregado de Proteção de Dados\r\nA Betraffle disponibiliza os seguintes meios para que você possa entrar em contato conosco para exercer seus direitos de titular: (meios de contato).\r\n\r\nCaso tenha dúvidas sobre esta Política de Privacidade ou sobre os dados pessoais que tratamos, você pode entrar em contato com o nosso Encarregado de Proteção de Dados Pessoais, através dos seguintes canais:\r\n\r\nEquipe Betraffle\r\n\r\ncontato@betraffle.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `raffles`
--

CREATE TABLE `raffles` (
  `id` int(11) NOT NULL,
  `raffles_title` varchar(200) NOT NULL,
  `raffles_description` varchar(1000) NOT NULL,
  `raffles_image` varchar(200) NOT NULL,
  `raffles_image_featured` varchar(200) NOT NULL,
  `raffles_tickets` int(11) NOT NULL,
  `raffles_tickets_limit` int(11) NOT NULL,
  `raffles_tickets_value` float NOT NULL,
  `raffles_progress` float NOT NULL DEFAULT '0',
  `raffles_status_publish` int(11) NOT NULL COMMENT '1 - publicado | 0 - rascunho',
  `raffles_status_random` int(11) NOT NULL COMMENT '1 -aberto | 2 em sortio | 3 - finalizado | 4 cancelado',
  `raffles_category` int(11) NOT NULL,
  `raffles_date` varchar(200) NOT NULL,
  `raffles_time` varchar(200) NOT NULL,
  `raffles_user` int(11) NOT NULL,
  `raffles_featured` int(11) NOT NULL DEFAULT '0',
  `raffles_cashback` int(11) NOT NULL COMMENT '0 - no/\r\n1- yes',
  `raffles_cashback_amount` int(11) NOT NULL COMMENT '%',
  `raffles_isfree` int(11) NOT NULL COMMENT '0 - no/\r\n1- yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `raffles`
--

INSERT INTO `raffles` (`id`, `raffles_title`, `raffles_description`, `raffles_image`, `raffles_image_featured`, `raffles_tickets`, `raffles_tickets_limit`, `raffles_tickets_value`, `raffles_progress`, `raffles_status_publish`, `raffles_status_random`, `raffles_category`, `raffles_date`, `raffles_time`, `raffles_user`, `raffles_featured`, `raffles_cashback`, `raffles_cashback_amount`, `raffles_isfree`) VALUES
(56, 'teste 1', '&lt;p&gt;dfdsjfkjds&lt;/p&gt;', '1547670707CAPA-POSTS-PRONTOS-PARA-ADV-14.jpg.webp', '1133266021CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', 100, 100, 1, 30, 1, 3, 2, '13/08/2023', '22:01:35', 1, 1, 1, 100, 1),
(57, 'Vale Transporte4 Vale Transporte4 Vale Transporte4 Vale Transporte4', '&lt;p&gt;kkkkkkkkkkkkkkkkkkkk&lt;/p&gt;', '825831408CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', '181880175CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', 10, 5, 1, 0, 1, 4, 3, '14/08/2023', '02:40:34', 1, 1, 1, 50, 0),
(52, 'Sorteio com casback', '&lt;p&gt;casback de 50%&lt;/p&gt;', '1181430429jpeg2000-home.jpg', '1679126015jpeg2000-home.jpg', 2, 100, 21.5, 100, 1, 3, 2, '30/05/2023', '19:23:49', 1, 1, 1, 50, 0),
(53, 'TESTE KAUAN E NATAN', '&lt;p&gt;TESTE&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;TESTE&lt;/p&gt;', '1794137857Captura de Tela (1).png', '310500546Captura de Tela (1).png', 100, 60, 10, 100, 1, 3, 1, '10/08/2023', '21:21:31', 1, 1, 1, 10, 0),
(54, 'NOVO TESTE', '&lt;p&gt;NOVO TESTE&lt;/p&gt;', '455259101Captura de Tela (4).png', '1240862560Captura de Tela (4).png', 50, 60, 10, 100, 1, 3, 1, '10/08/2023', '21:56:05', 1, 1, 1, 50, 0),
(55, 'Sorteio Teste', '&lt;p&gt;bom dia&lt;/p&gt;', '1590815923CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', '2050555786CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', 4, 50, 1, 100, 1, 3, 1, '13/08/2023', '20:34:51', 1, 1, 1, 100, 0),
(51, 'Sorteio Gratuito', '&lt;p&gt;Testando a cria&amp;ccedil;ao de rifa gratuita.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://img.freepik.com/vetores-premium/ilustracao-vetorial-de-loteria-aposta-de-jackpot-de-cassino-aposta-de-jogo-rifa-sorteio-de-dinheiro-777-conceito-de-slots-icone-de-linha-vetorial-para-negocios-e-publicidade_399089-4896.jpg?w=2000&quot; alt=&quot;Ilustra&amp;ccedil;&amp;atilde;o vetorial de loteria aposta de jackpot de cassino, aposta de  jogo, rifa, sorteio de dinheiro 777 conceito de slots &amp;iacute;cone de linha  vetorial para neg&amp;oacute;cios e publicidade | Vetor Premium&quot;&gt;&lt;/p&gt;', '1367484871CAMPANHA-VOTOPARLAMENTAR (1).png', '780201576CAMPANHA-VOTOPARLAMENTAR.png', 100, 10, 10, 10, 1, 4, 1, '30/05/2023', '19:06:29', 1, 1, 1, 0, 1),
(58, 'casback teste', '&lt;p&gt;,kkkkkkkkkkkk&lt;/p&gt;', '190380509CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', '1570827613CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', 5, 3, 1, 0, 1, 4, 3, '14/08/2023', '13:40:06', 1, 1, 1, 50, 0),
(59, 'cacback', '&lt;p&gt;asuisaaksj&lt;/p&gt;', '995729689CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', '1860930857CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', 5, 3, 1, 80, 1, 3, 3, '14/08/2023', '13:41:43', 1, 1, 1, 50, 0),
(60, 'j', '&lt;p&gt;afsfds&lt;/p&gt;', '1024008CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', '295791206CAPA-POSTS-PRONTOS-PARA-ADV-13.png.webp', 10, 1, 10, 0, 1, 1, 3, '14/08/2023', '14:20:31', 1, 1, 0, 0, 0),
(61, 'CASH BACK 50%', '&lt;p&gt;TESTE&amp;nbsp;&lt;/p&gt;', '1596965998Captura de Tela (4).png', '45035397Captura de Tela (4).png', 100, 80, 1, 100, 1, 3, 1, '19/08/2023', '18:47:03', 1, 1, 1, 50, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `raffles_buyed`
--

CREATE TABLE `raffles_buyed` (
  `id` int(11) NOT NULL,
  `raffles_id` int(11) NOT NULL,
  `raffles_user` int(11) NOT NULL,
  `raffles_amount` float NOT NULL,
  `raffles_payment` int(11) NOT NULL,
  `raffles_data` varchar(200) NOT NULL,
  `raffles_time` varchar(200) NOT NULL,
  `raffles_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `raffles_buyed`
--

INSERT INTO `raffles_buyed` (`id`, `raffles_id`, `raffles_user`, `raffles_amount`, `raffles_payment`, `raffles_data`, `raffles_time`, `raffles_status`) VALUES
(78, 59, 34, 1, 90, '14-08-2023', '13:56', 0),
(77, 59, 35, 3, 89, '14-08-2023', '13:55', 0),
(76, 56, 35, 0, 88, '14-08-2023', '00:58', 0),
(75, 56, 34, 0, 87, '14-08-2023', '00:38', 0),
(74, 55, 34, 2, 83, '13-08-2023', '21:16', 0),
(73, 55, 35, 2, 82, '13-08-2023', '20:52', 0),
(72, 54, 32, 250, 81, '10-08-2023', '21:57', 0),
(71, 54, 33, 250, 80, '10-08-2023', '21:56', 0),
(70, 53, 32, 490, 79, '10-08-2023', '21:29', 0),
(69, 53, 33, 510, 78, '10-08-2023', '21:29', 0),
(68, 52, 31, 43, 77, '30-05-2023', '19:24', 0),
(67, 51, 31, 0, 76, '30-05-2023', '19:13', 1),
(79, 61, 33, 48, 92, '19-08-2023', '18:50', 0),
(80, 61, 32, 50, 93, '19-08-2023', '18:51', 0),
(81, 0, 0, 52, 94, '19-08-2023', '19:01:44', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `raffles_category`
--

CREATE TABLE `raffles_category` (
  `id` int(11) NOT NULL,
  `raffles_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `raffles_category`
--

INSERT INTO `raffles_category` (`id`, `raffles_name`) VALUES
(1, 'Dinheiro'),
(2, 'Tecnologia'),
(3, 'Eletrodoméstico'),
(4, 'Eletroeletrônicos'),
(5, 'Moda'),
(6, 'Viagens');

-- --------------------------------------------------------

--
-- Estrutura para tabela `raffles_tickets_buyed`
--

CREATE TABLE `raffles_tickets_buyed` (
  `id` int(11) NOT NULL,
  `ticket_raffle` int(11) NOT NULL,
  `ticket_number` int(11) NOT NULL,
  `ticket_user` int(11) NOT NULL,
  `ticket_date` varchar(200) NOT NULL,
  `ticket_time` varchar(200) NOT NULL,
  `ticket_payment_id` varchar(200) NOT NULL,
  `ticket_payment_type` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `raffles_tickets_buyed`
--

INSERT INTO `raffles_tickets_buyed` (`id`, `ticket_raffle`, `ticket_number`, `ticket_user`, `ticket_date`, `ticket_time`, `ticket_payment_id`, `ticket_payment_type`) VALUES
(943, 54, 48, 32, '10-08-2023', '21:57:38', '1326651288', 'credits'),
(942, 54, 47, 32, '10-08-2023', '21:57:38', '390049500', 'credits'),
(941, 54, 46, 32, '10-08-2023', '21:57:38', '524508792', 'credits'),
(940, 54, 19, 32, '10-08-2023', '21:57:38', '135045147', 'credits'),
(939, 54, 18, 32, '10-08-2023', '21:57:38', '12520718', 'credits'),
(938, 54, 45, 32, '10-08-2023', '21:57:38', '1407688076', 'credits'),
(937, 54, 1, 33, '10-08-2023', '21:56:58', '241885697', 'credits'),
(936, 54, 2, 33, '10-08-2023', '21:56:58', '72178966', 'credits'),
(935, 54, 3, 33, '10-08-2023', '21:56:58', '1783068677', 'credits'),
(934, 54, 4, 33, '10-08-2023', '21:56:58', '1569688005', 'credits'),
(933, 54, 5, 33, '10-08-2023', '21:56:58', '2095174563', 'credits'),
(932, 54, 6, 33, '10-08-2023', '21:56:58', '1758293105', 'credits'),
(931, 54, 7, 33, '10-08-2023', '21:56:58', '2126276383', 'credits'),
(930, 54, 8, 33, '10-08-2023', '21:56:58', '82956185', 'credits'),
(929, 54, 9, 33, '10-08-2023', '21:56:58', '1624956013', 'credits'),
(928, 54, 10, 33, '10-08-2023', '21:56:58', '2104279319', 'credits'),
(927, 54, 11, 33, '10-08-2023', '21:56:58', '1160950205', 'credits'),
(926, 54, 12, 33, '10-08-2023', '21:56:58', '1724611915', 'credits'),
(925, 54, 25, 33, '10-08-2023', '21:56:58', '817104637', 'credits'),
(924, 54, 26, 33, '10-08-2023', '21:56:58', '1335650756', 'credits'),
(923, 54, 27, 33, '10-08-2023', '21:56:58', '132942878', 'credits'),
(922, 54, 28, 33, '10-08-2023', '21:56:58', '964521989', 'credits'),
(921, 54, 29, 33, '10-08-2023', '21:56:58', '1316980728', 'credits'),
(920, 54, 30, 33, '10-08-2023', '21:56:58', '213366771', 'credits'),
(919, 54, 39, 33, '10-08-2023', '21:56:58', '1390951528', 'credits'),
(918, 54, 40, 33, '10-08-2023', '21:56:58', '1101829697', 'credits'),
(917, 54, 41, 33, '10-08-2023', '21:56:58', '848061721', 'credits'),
(916, 54, 42, 33, '10-08-2023', '21:56:58', '573240761', 'credits'),
(915, 54, 43, 33, '10-08-2023', '21:56:58', '1730058484', 'credits'),
(914, 54, 44, 33, '10-08-2023', '21:56:58', '721638343', 'credits'),
(913, 54, 50, 33, '10-08-2023', '21:56:58', '697410191', 'credits'),
(912, 53, 2, 32, '10-08-2023', '21:29:58', '1392104647', 'credits'),
(911, 53, 4, 32, '10-08-2023', '21:29:58', '510660761', 'credits'),
(910, 53, 5, 32, '10-08-2023', '21:29:58', '1783158418', 'credits'),
(909, 53, 11, 32, '10-08-2023', '21:29:58', '824513226', 'credits'),
(908, 53, 12, 32, '10-08-2023', '21:29:58', '1001972930', 'credits'),
(907, 53, 14, 32, '10-08-2023', '21:29:58', '501111181', 'credits'),
(906, 53, 17, 32, '10-08-2023', '21:29:58', '1915205850', 'credits'),
(905, 53, 18, 32, '10-08-2023', '21:29:58', '1184123037', 'credits'),
(904, 53, 20, 32, '10-08-2023', '21:29:58', '723597094', 'credits'),
(903, 53, 24, 32, '10-08-2023', '21:29:58', '816038521', 'credits'),
(902, 53, 49, 32, '10-08-2023', '21:29:58', '765834568', 'credits'),
(901, 53, 47, 32, '10-08-2023', '21:29:58', '865064035', 'credits'),
(900, 53, 46, 32, '10-08-2023', '21:29:58', '843561347', 'credits'),
(899, 53, 45, 32, '10-08-2023', '21:29:58', '1842780768', 'credits'),
(898, 53, 43, 32, '10-08-2023', '21:29:58', '1620998772', 'credits'),
(897, 53, 42, 32, '10-08-2023', '21:29:58', '325508198', 'credits'),
(896, 53, 39, 32, '10-08-2023', '21:29:58', '1743537541', 'credits'),
(895, 53, 37, 32, '10-08-2023', '21:29:58', '1987148419', 'credits'),
(894, 53, 35, 32, '10-08-2023', '21:29:58', '954428559', 'credits'),
(893, 53, 32, 32, '10-08-2023', '21:29:58', '265203090', 'credits'),
(892, 53, 31, 32, '10-08-2023', '21:29:58', '2045190257', 'credits'),
(891, 53, 30, 32, '10-08-2023', '21:29:58', '1914460439', 'credits'),
(890, 53, 28, 32, '10-08-2023', '21:29:58', '341699088', 'credits'),
(889, 53, 27, 32, '10-08-2023', '21:29:58', '2049565446', 'credits'),
(888, 53, 26, 32, '10-08-2023', '21:29:58', '1477171624', 'credits'),
(887, 53, 53, 32, '10-08-2023', '21:29:58', '1268867690', 'credits'),
(886, 53, 78, 32, '10-08-2023', '21:29:58', '2086666846', 'credits'),
(885, 53, 77, 32, '10-08-2023', '21:29:58', '1843589879', 'credits'),
(884, 53, 79, 32, '10-08-2023', '21:29:58', '981971574', 'credits'),
(883, 53, 57, 32, '10-08-2023', '21:29:58', '802805617', 'credits'),
(882, 53, 83, 32, '10-08-2023', '21:29:58', '1947890120', 'credits'),
(881, 53, 59, 32, '10-08-2023', '21:29:58', '847746007', 'credits'),
(880, 53, 84, 32, '10-08-2023', '21:29:58', '1774089485', 'credits'),
(879, 53, 60, 32, '10-08-2023', '21:29:58', '1174562594', 'credits'),
(878, 53, 85, 32, '10-08-2023', '21:29:58', '1078670995', 'credits'),
(877, 53, 62, 32, '10-08-2023', '21:29:58', '24455546', 'credits'),
(876, 53, 87, 32, '10-08-2023', '21:29:58', '994888423', 'credits'),
(875, 53, 63, 32, '10-08-2023', '21:29:58', '931657428', 'credits'),
(874, 53, 64, 32, '10-08-2023', '21:29:58', '1469473986', 'credits'),
(873, 53, 65, 32, '10-08-2023', '21:29:58', '1387265614', 'credits'),
(872, 53, 92, 32, '10-08-2023', '21:29:58', '22277015', 'credits'),
(871, 53, 93, 32, '10-08-2023', '21:29:58', '1205655071', 'credits'),
(870, 53, 94, 32, '10-08-2023', '21:29:58', '1981882355', 'credits'),
(869, 53, 69, 32, '10-08-2023', '21:29:58', '335039535', 'credits'),
(868, 53, 71, 32, '10-08-2023', '21:29:58', '1249597896', 'credits'),
(867, 53, 72, 32, '10-08-2023', '21:29:58', '1286950501', 'credits'),
(866, 53, 73, 32, '10-08-2023', '21:29:58', '1747534866', 'credits'),
(865, 53, 98, 32, '10-08-2023', '21:29:58', '1940884891', 'credits'),
(864, 53, 97, 32, '10-08-2023', '21:29:58', '1589959883', 'credits'),
(863, 53, 40, 33, '10-08-2023', '21:29:12', '1436661641', 'credits'),
(862, 53, 36, 33, '10-08-2023', '21:29:12', '933041075', 'credits'),
(861, 53, 16, 33, '10-08-2023', '21:29:12', '742907043', 'credits'),
(860, 53, 33, 33, '10-08-2023', '21:29:12', '567244417', 'credits'),
(859, 53, 34, 33, '10-08-2023', '21:29:12', '1056131367', 'credits'),
(858, 53, 25, 33, '10-08-2023', '21:29:12', '479181723', 'credits'),
(857, 53, 9, 33, '10-08-2023', '21:29:12', '1424027165', 'credits'),
(856, 53, 8, 33, '10-08-2023', '21:29:12', '938500100', 'credits'),
(855, 53, 7, 33, '10-08-2023', '21:29:12', '1893030288', 'credits'),
(854, 53, 6, 33, '10-08-2023', '21:29:12', '2066718111', 'credits'),
(853, 53, 86, 33, '10-08-2023', '21:29:12', '1259953025', 'credits'),
(852, 53, 89, 33, '10-08-2023', '21:29:12', '486114894', 'credits'),
(851, 53, 55, 33, '10-08-2023', '21:29:12', '730580805', 'credits'),
(850, 53, 67, 33, '10-08-2023', '21:29:12', '75569828', 'credits'),
(849, 53, 68, 33, '10-08-2023', '21:29:12', '1801744050', 'credits'),
(848, 53, 51, 33, '10-08-2023', '21:29:12', '567424254', 'credits'),
(847, 53, 50, 33, '10-08-2023', '21:29:12', '1733503174', 'credits'),
(846, 53, 48, 33, '10-08-2023', '21:29:12', '1533159633', 'credits'),
(845, 53, 38, 33, '10-08-2023', '21:29:12', '1243388238', 'credits'),
(844, 53, 29, 33, '10-08-2023', '21:29:12', '2093978611', 'credits'),
(843, 53, 100, 33, '10-08-2023', '21:29:12', '1908351200', 'credits'),
(842, 53, 99, 33, '10-08-2023', '21:29:12', '1121943610', 'credits'),
(841, 53, 96, 33, '10-08-2023', '21:29:12', '341862641', 'credits'),
(840, 53, 95, 33, '10-08-2023', '21:29:12', '1132804541', 'credits'),
(839, 53, 91, 33, '10-08-2023', '21:29:12', '649632483', 'credits'),
(838, 53, 90, 33, '10-08-2023', '21:29:12', '918460405', 'credits'),
(837, 53, 88, 33, '10-08-2023', '21:29:12', '39545751', 'credits'),
(836, 53, 82, 33, '10-08-2023', '21:29:12', '1656502768', 'credits'),
(835, 53, 81, 33, '10-08-2023', '21:29:12', '688558641', 'credits'),
(834, 53, 80, 33, '10-08-2023', '21:29:12', '1668166684', 'credits'),
(833, 53, 76, 33, '10-08-2023', '21:29:12', '617130955', 'credits'),
(832, 53, 75, 33, '10-08-2023', '21:29:12', '1783629510', 'credits'),
(831, 53, 74, 33, '10-08-2023', '21:29:12', '640859779', 'credits'),
(830, 53, 70, 33, '10-08-2023', '21:29:12', '1792188366', 'credits'),
(829, 53, 52, 33, '10-08-2023', '21:29:12', '1628296053', 'credits'),
(828, 53, 3, 33, '10-08-2023', '21:29:12', '373730925', 'credits'),
(827, 53, 19, 33, '10-08-2023', '21:29:12', '1731870108', 'credits'),
(826, 53, 54, 33, '10-08-2023', '21:29:12', '1809343217', 'credits'),
(825, 53, 56, 33, '10-08-2023', '21:29:12', '1292960310', 'credits'),
(824, 53, 58, 33, '10-08-2023', '21:29:12', '99047506', 'credits'),
(823, 53, 41, 33, '10-08-2023', '21:29:12', '1020627283', 'credits'),
(822, 53, 1, 33, '10-08-2023', '21:29:12', '1446620784', 'credits'),
(821, 53, 23, 33, '10-08-2023', '21:29:12', '1826425712', 'credits'),
(820, 53, 22, 33, '10-08-2023', '21:29:12', '1762175940', 'credits'),
(819, 53, 21, 33, '10-08-2023', '21:29:12', '910837294', 'credits'),
(818, 53, 66, 33, '10-08-2023', '21:29:12', '1382865881', 'credits'),
(817, 53, 61, 33, '10-08-2023', '21:29:12', '828269220', 'credits'),
(816, 53, 44, 33, '10-08-2023', '21:29:12', '842442201', 'credits'),
(815, 53, 15, 33, '10-08-2023', '21:29:12', '1703349900', 'credits'),
(814, 53, 13, 33, '10-08-2023', '21:29:12', '1982078059', 'credits'),
(813, 53, 10, 33, '10-08-2023', '21:29:12', '176869160', 'credits'),
(812, 52, 1, 31, '30-05-2023', '19:24:58', '753884844', 'credits'),
(811, 52, 2, 31, '30-05-2023', '19:24:58', '1323020768', 'credits'),
(810, 51, 29, 31, '30-05-2023', '19:13:29', '1631468644', 'credits'),
(809, 51, 13, 31, '30-05-2023', '19:13:29', '1098045254', 'credits'),
(808, 51, 19, 31, '30-05-2023', '19:13:29', '1562648254', 'credits'),
(807, 51, 20, 31, '30-05-2023', '19:13:29', '375635887', 'credits'),
(806, 51, 26, 31, '30-05-2023', '19:13:29', '1415289920', 'credits'),
(805, 51, 27, 31, '30-05-2023', '19:13:29', '1557628783', 'credits'),
(804, 51, 25, 31, '30-05-2023', '19:13:29', '1289561814', 'credits'),
(803, 51, 28, 31, '30-05-2023', '19:13:29', '265638179', 'credits'),
(802, 51, 22, 31, '30-05-2023', '19:13:29', '1816801254', 'credits'),
(801, 51, 21, 31, '30-05-2023', '19:13:29', '714927837', 'credits'),
(944, 54, 49, 32, '10-08-2023', '21:57:38', '279778263', 'credits'),
(945, 54, 24, 32, '10-08-2023', '21:57:38', '90437320', 'credits'),
(946, 54, 23, 32, '10-08-2023', '21:57:38', '1682311139', 'credits'),
(947, 54, 22, 32, '10-08-2023', '21:57:38', '557119348', 'credits'),
(948, 54, 21, 32, '10-08-2023', '21:57:38', '279229556', 'credits'),
(949, 54, 20, 32, '10-08-2023', '21:57:38', '1032136679', 'credits'),
(950, 54, 17, 32, '10-08-2023', '21:57:38', '1328396204', 'credits'),
(951, 54, 16, 32, '10-08-2023', '21:57:38', '140256726', 'credits'),
(952, 54, 15, 32, '10-08-2023', '21:57:38', '213560569', 'credits'),
(953, 54, 14, 32, '10-08-2023', '21:57:38', '1499791308', 'credits'),
(954, 54, 13, 32, '10-08-2023', '21:57:38', '1966065411', 'credits'),
(955, 54, 38, 32, '10-08-2023', '21:57:38', '983419033', 'credits'),
(956, 54, 37, 32, '10-08-2023', '21:57:38', '1714623297', 'credits'),
(957, 54, 36, 32, '10-08-2023', '21:57:38', '297865208', 'credits'),
(958, 54, 35, 32, '10-08-2023', '21:57:38', '52076569', 'credits'),
(959, 54, 34, 32, '10-08-2023', '21:57:38', '2077940709', 'credits'),
(960, 54, 33, 32, '10-08-2023', '21:57:38', '227537108', 'credits'),
(961, 54, 32, 32, '10-08-2023', '21:57:38', '1742297613', 'credits'),
(962, 54, 31, 32, '10-08-2023', '21:57:38', '1811917733', 'credits'),
(963, 55, 3, 35, '13-08-2023', '20:52:42', '286446927', 'credits'),
(964, 55, 2, 35, '13-08-2023', '20:52:42', '1467913731', 'credits'),
(965, 55, 4, 34, '13-08-2023', '21:16:48', '366393908', 'credits'),
(966, 55, 1, 34, '13-08-2023', '21:16:48', '1597228034', 'credits'),
(967, 56, 5, 34, '14-08-2023', '00:38:07', '1748313177', 'credits'),
(968, 56, 21, 34, '14-08-2023', '00:38:07', '255268772', 'credits'),
(969, 56, 53, 34, '14-08-2023', '00:38:07', '1696746378', 'credits'),
(970, 56, 37, 34, '14-08-2023', '00:38:07', '99217954', 'credits'),
(971, 56, 69, 34, '14-08-2023', '00:38:07', '1205997574', 'credits'),
(972, 56, 55, 34, '14-08-2023', '00:38:07', '192103888', 'credits'),
(973, 56, 6, 34, '14-08-2023', '00:38:07', '2005948537', 'credits'),
(974, 56, 22, 34, '14-08-2023', '00:38:07', '452891858', 'credits'),
(975, 56, 38, 34, '14-08-2023', '00:38:07', '242867584', 'credits'),
(976, 56, 54, 34, '14-08-2023', '00:38:07', '2064591218', 'credits'),
(977, 56, 70, 34, '14-08-2023', '00:38:07', '306997101', 'credits'),
(978, 56, 71, 34, '14-08-2023', '00:38:07', '582272256', 'credits'),
(979, 56, 39, 34, '14-08-2023', '00:38:07', '1300841263', 'credits'),
(980, 56, 23, 34, '14-08-2023', '00:38:07', '1724949447', 'credits'),
(981, 56, 7, 34, '14-08-2023', '00:38:07', '711639316', 'credits'),
(982, 56, 10, 35, '14-08-2023', '00:58:18', '68089588', 'credits'),
(983, 56, 26, 35, '14-08-2023', '00:58:18', '189059154', 'credits'),
(984, 56, 42, 35, '14-08-2023', '00:58:18', '590815890', 'credits'),
(985, 56, 58, 35, '14-08-2023', '00:58:18', '418976373', 'credits'),
(986, 56, 74, 35, '14-08-2023', '00:58:18', '1158194473', 'credits'),
(987, 56, 40, 35, '14-08-2023', '00:58:18', '2119184416', 'credits'),
(988, 56, 56, 35, '14-08-2023', '00:58:18', '1041965079', 'credits'),
(989, 56, 72, 35, '14-08-2023', '00:58:18', '1827280711', 'credits'),
(990, 56, 73, 35, '14-08-2023', '00:58:18', '7759310', 'credits'),
(991, 56, 57, 35, '14-08-2023', '00:58:18', '531532517', 'credits'),
(992, 56, 41, 35, '14-08-2023', '00:58:18', '712354798', 'credits'),
(993, 56, 25, 35, '14-08-2023', '00:58:18', '1724170525', 'credits'),
(994, 56, 9, 35, '14-08-2023', '00:58:18', '1348128466', 'credits'),
(995, 56, 8, 35, '14-08-2023', '00:58:18', '1785373420', 'credits'),
(996, 56, 24, 35, '14-08-2023', '00:58:18', '1681346906', 'credits'),
(997, 59, 3, 35, '14-08-2023', '13:55:19', '1099245541', 'credits'),
(998, 59, 2, 35, '14-08-2023', '13:55:19', '1846060240', 'credits'),
(999, 59, 1, 35, '14-08-2023', '13:55:19', '1529138024', 'credits'),
(1000, 59, 4, 34, '14-08-2023', '13:56:14', '118610782', 'credits'),
(1001, 61, 88, 33, '19-08-2023', '18:50:27', '1894719438', 'credits'),
(1002, 61, 90, 33, '19-08-2023', '18:50:27', '1949656406', 'credits'),
(1003, 61, 92, 33, '19-08-2023', '18:50:27', '193714247', 'credits'),
(1004, 61, 93, 33, '19-08-2023', '18:50:27', '1599013330', 'credits'),
(1005, 61, 97, 33, '19-08-2023', '18:50:27', '1998233473', 'credits'),
(1006, 61, 85, 33, '19-08-2023', '18:50:27', '2123573117', 'credits'),
(1007, 61, 34, 33, '19-08-2023', '18:50:27', '1620180293', 'credits'),
(1008, 61, 17, 33, '19-08-2023', '18:50:27', '358028006', 'credits'),
(1009, 61, 16, 33, '19-08-2023', '18:50:27', '913761585', 'credits'),
(1010, 61, 50, 33, '19-08-2023', '18:50:27', '2046724870', 'credits'),
(1011, 61, 49, 33, '19-08-2023', '18:50:27', '481213955', 'credits'),
(1012, 61, 32, 33, '19-08-2023', '18:50:27', '172614800', 'credits'),
(1013, 61, 31, 33, '19-08-2023', '18:50:27', '890277208', 'credits'),
(1014, 61, 14, 33, '19-08-2023', '18:50:27', '1159205321', 'credits'),
(1015, 61, 30, 33, '19-08-2023', '18:50:27', '1634652787', 'credits'),
(1016, 61, 13, 33, '19-08-2023', '18:50:27', '1428204993', 'credits'),
(1017, 61, 23, 33, '19-08-2023', '18:50:27', '1544975190', 'credits'),
(1018, 61, 6, 33, '19-08-2023', '18:50:27', '614721168', 'credits'),
(1019, 61, 7, 33, '19-08-2023', '18:50:27', '1160313387', 'credits'),
(1020, 61, 8, 33, '19-08-2023', '18:50:27', '2098718264', 'credits'),
(1021, 61, 28, 33, '19-08-2023', '18:50:27', '15522727', 'credits'),
(1022, 61, 27, 33, '19-08-2023', '18:50:27', '1746535629', 'credits'),
(1023, 61, 45, 33, '19-08-2023', '18:50:27', '2064892105', 'credits'),
(1024, 61, 63, 33, '19-08-2023', '18:50:27', '171436674', 'credits'),
(1025, 61, 64, 33, '19-08-2023', '18:50:27', '1839349237', 'credits'),
(1026, 61, 81, 33, '19-08-2023', '18:50:27', '353756737', 'credits'),
(1027, 61, 82, 33, '19-08-2023', '18:50:27', '1651004676', 'credits'),
(1028, 61, 80, 33, '19-08-2023', '18:50:27', '1162969921', 'credits'),
(1029, 61, 79, 33, '19-08-2023', '18:50:27', '1229283429', 'credits'),
(1030, 61, 78, 33, '19-08-2023', '18:50:27', '2125129818', 'credits'),
(1031, 61, 74, 33, '19-08-2023', '18:50:27', '387679108', 'credits'),
(1032, 61, 73, 33, '19-08-2023', '18:50:27', '103114223', 'credits'),
(1033, 61, 72, 33, '19-08-2023', '18:50:27', '643911982', 'credits'),
(1034, 61, 71, 33, '19-08-2023', '18:50:27', '1244107870', 'credits'),
(1035, 61, 35, 33, '19-08-2023', '18:50:27', '1021931643', 'credits'),
(1036, 61, 37, 33, '19-08-2023', '18:50:27', '1184805528', 'credits'),
(1037, 61, 54, 33, '19-08-2023', '18:50:27', '264425040', 'credits'),
(1038, 61, 55, 33, '19-08-2023', '18:50:27', '1117611526', 'credits'),
(1039, 61, 57, 33, '19-08-2023', '18:50:27', '147118588', 'credits'),
(1040, 61, 58, 33, '19-08-2023', '18:50:27', '825977104', 'credits'),
(1041, 61, 42, 33, '19-08-2023', '18:50:27', '572369271', 'credits'),
(1042, 61, 38, 33, '19-08-2023', '18:50:27', '966141837', 'credits'),
(1043, 61, 39, 33, '19-08-2023', '18:50:27', '64370729', 'credits'),
(1044, 61, 22, 33, '19-08-2023', '18:50:27', '668695389', 'credits'),
(1045, 61, 21, 33, '19-08-2023', '18:50:27', '21614417', 'credits'),
(1046, 61, 20, 33, '19-08-2023', '18:50:27', '377299973', 'credits'),
(1047, 61, 1, 33, '19-08-2023', '18:50:27', '1855808185', 'credits'),
(1048, 61, 2, 33, '19-08-2023', '18:50:27', '1130180291', 'credits'),
(1049, 61, 77, 32, '19-08-2023', '18:51:38', '1659209675', 'credits'),
(1050, 61, 53, 32, '19-08-2023', '18:51:38', '1710042310', 'credits'),
(1051, 61, 52, 32, '19-08-2023', '18:51:38', '1194548212', 'credits'),
(1052, 61, 29, 32, '19-08-2023', '18:51:38', '1682554812', 'credits'),
(1053, 61, 33, 32, '19-08-2023', '18:51:38', '1032578772', 'credits'),
(1054, 61, 56, 32, '19-08-2023', '18:51:38', '1230570359', 'credits'),
(1055, 61, 83, 32, '19-08-2023', '18:51:38', '1197139237', 'credits'),
(1056, 61, 84, 32, '19-08-2023', '18:51:38', '1902128501', 'credits'),
(1057, 61, 59, 32, '19-08-2023', '18:51:38', '1991357750', 'credits'),
(1058, 61, 60, 32, '19-08-2023', '18:51:38', '1983365296', 'credits'),
(1059, 61, 86, 32, '19-08-2023', '18:51:38', '873316595', 'credits'),
(1060, 61, 36, 32, '19-08-2023', '18:51:38', '1232449077', 'credits'),
(1061, 61, 61, 32, '19-08-2023', '18:51:38', '681822095', 'credits'),
(1062, 61, 62, 32, '19-08-2023', '18:51:38', '803534045', 'credits'),
(1063, 61, 87, 32, '19-08-2023', '18:51:38', '789599708', 'credits'),
(1064, 61, 89, 32, '19-08-2023', '18:51:38', '833985382', 'credits'),
(1065, 61, 91, 32, '19-08-2023', '18:51:38', '1122633785', 'credits'),
(1066, 61, 66, 32, '19-08-2023', '18:51:38', '1714557347', 'credits'),
(1067, 61, 67, 32, '19-08-2023', '18:51:38', '1227493483', 'credits'),
(1068, 61, 95, 32, '19-08-2023', '18:51:38', '1326811687', 'credits'),
(1069, 61, 94, 32, '19-08-2023', '18:51:38', '990475459', 'credits'),
(1070, 61, 98, 32, '19-08-2023', '18:51:38', '113443478', 'credits'),
(1071, 61, 96, 32, '19-08-2023', '18:51:38', '1943818375', 'credits'),
(1072, 61, 99, 32, '19-08-2023', '18:51:38', '1438832159', 'credits'),
(1073, 61, 100, 32, '19-08-2023', '18:51:38', '53754318', 'credits'),
(1074, 61, 75, 32, '19-08-2023', '18:51:38', '1801203504', 'credits'),
(1075, 61, 70, 32, '19-08-2023', '18:51:38', '765224018', 'credits'),
(1076, 61, 69, 32, '19-08-2023', '18:51:38', '1179649202', 'credits'),
(1077, 61, 68, 32, '19-08-2023', '18:51:38', '1419882543', 'credits'),
(1078, 61, 65, 32, '19-08-2023', '18:51:38', '1254810802', 'credits'),
(1079, 61, 40, 32, '19-08-2023', '18:51:38', '709797889', 'credits'),
(1080, 61, 41, 32, '19-08-2023', '18:51:38', '2089227541', 'credits'),
(1081, 61, 43, 32, '19-08-2023', '18:51:38', '1740967659', 'credits'),
(1082, 61, 44, 32, '19-08-2023', '18:51:38', '423563636', 'credits'),
(1083, 61, 46, 32, '19-08-2023', '18:51:38', '1893898919', 'credits'),
(1084, 61, 47, 32, '19-08-2023', '18:51:38', '1678659348', 'credits'),
(1085, 61, 48, 32, '19-08-2023', '18:51:38', '2103670824', 'credits'),
(1086, 61, 25, 32, '19-08-2023', '18:51:38', '1339819496', 'credits'),
(1087, 61, 24, 32, '19-08-2023', '18:51:38', '1099262123', 'credits'),
(1088, 61, 19, 32, '19-08-2023', '18:51:38', '878317903', 'credits'),
(1089, 61, 18, 32, '19-08-2023', '18:51:38', '1491332102', 'credits'),
(1090, 61, 15, 32, '19-08-2023', '18:51:38', '125429049', 'credits'),
(1091, 61, 12, 32, '19-08-2023', '18:51:38', '1716584687', 'credits'),
(1092, 61, 11, 32, '19-08-2023', '18:51:38', '1964658071', 'credits'),
(1093, 61, 10, 32, '19-08-2023', '18:51:38', '1895787842', 'credits'),
(1094, 61, 9, 32, '19-08-2023', '18:51:38', '438400749', 'credits'),
(1095, 61, 5, 32, '19-08-2023', '18:51:38', '265873003', 'credits'),
(1096, 61, 4, 32, '19-08-2023', '18:51:38', '33475773', 'credits'),
(1097, 61, 3, 32, '19-08-2023', '18:51:38', '809344164', 'credits'),
(1098, 61, 76, 32, '19-08-2023', '18:51:38', '1919383352', 'credits'),
(1099, 61, 26, 32, '19-08-2023', '19:01:44', '860112498', 'credits'),
(1100, 61, 51, 32, '19-08-2023', '19:01:44', '332176903', 'credits');

-- --------------------------------------------------------

--
-- Estrutura para tabela `raffles_winners`
--

CREATE TABLE `raffles_winners` (
  `id` int(11) NOT NULL,
  `winner_user` int(11) NOT NULL,
  `winner_raffle` int(11) NOT NULL,
  `winner_ticket` int(11) NOT NULL,
  `winner_date` varchar(200) NOT NULL,
  `winner_time` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `raffles_winners`
--

INSERT INTO `raffles_winners` (`id`, `winner_user`, `winner_raffle`, `winner_ticket`, `winner_date`, `winner_time`) VALUES
(36, 33, 61, 85, '19-08-2023', '19:17'),
(35, 35, 59, 3, '14-08-2023', '13:56'),
(34, 35, 56, 25, '14-08-2023', '02:27'),
(33, 35, 55, 2, '13-08-2023', '21:17'),
(32, 33, 54, 1, '10-08-2023', '22:00'),
(31, 32, 53, 28, '10-08-2023', '21:34'),
(30, 31, 52, 2, '30-05-2023', '19:25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `terms_title` varchar(200) NOT NULL,
  `terms_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `terms`
--

INSERT INTO `terms` (`id`, `terms_title`, `terms_content`) VALUES
(1, 'Termos e Condições', 'Os seguintes Termos se aplicam a todas as compras de Ingressos Raffolux e todas as Inscrições enviadas para qualquer Competição no Site ou Aplicativo do Promotor.\r\n\r\nTERMOS\r\nAo ingressar na Raffolux, os Participantes deverão assinalar no Site ou Aplicativo que leram e aceitaram estes Termos e concordaram em ficar vinculados a eles.\r\n\r\nO Promotor\r\nTodas as Competições são operadas pelo Promotor, e o Promotor é o patrocinador oficial de cada Competição, a menos que especificado de outra forma. Quando o produto for proveniente de um Parceiro Raffolux, o Promotor está autorizado por esse Parceiro Raffolux a oferecer seu(s) respectivo(s) Produto(s) como Prêmio nos Concursos.\r\nComo entrar\r\n\r\nAo enviar uma Inscrição, uma Inscrição Postal ou uma Inscrição por Telefone, os Participantes concordam em ficar vinculados a estes Termos. Se você não concorda em ser vinculado, não compre ingressos Raffolux e não envie uma inscrição, inscrição postal ou inscrição por telefone.\r\n\r\nPara comprar Bilhetes Raffolux de forma válida e participar de uma Competição de forma válida, um Visitante deve se tornar um Usuário Registrado preenchendo todos os detalhes no Formulário de Associação no Site ou Aplicativo, ou fazendo login por meio de uma das plataformas de mídia social vinculadas e deve então:\r\n\r\npagar uma quantia para comprar o número desejado de Bilhetes Raffolux e, assim, fazer uma Inscrição antes da Data de Encerramento daquela Competição em particular;\r\nOU\r\n\r\nenviar uma inscrição na Competição por meio da opção de inscrição postal gratuita (consulte os termos 6 e 7 para obter mais detalhes sobre a inscrição postal)\r\nOU\r\n\r\nEnvie uma inscrição gratuita para qualquer Competição Flash através da opção de inscrição por telefone (consulte os termos 8 e 9 para obter mais detalhes sobre a inscrição por telefone).\r\n\r\nAs compras de bilhetes Raffolux devem ser processadas pela Cashflows Europe Limited. Isso estará sujeito aos termos e condições dos provedores de pagamento, que estão disponíveis para visualização em seu site.\r\n\r\nOs compradores de ingressos Raffolux serão solicitados a fornecer seus dados de contato, incluindo um endereço de e-mail e, opcionalmente, um número de telefone. Esta informação será processada de acordo com o disposto abaixo e com a Política de Privacidade e Proteção de Dados da Promotora. O provedor de pagamento relevante do Promotor exigirá os detalhes de pagamento com cartão do comprador e poderá exigir seu código postal. Assim que o pedido de compra dos Ingressos Raffolux for enviado, o pagamento com cartão do Usuário Registrado será aprovado eletronicamente e o Promotor não reterá nenhum registro dos detalhes do cartão do Usuário Registrado.\r\n\r\nOs Participantes que participarem de uma Competição gratuitamente por Entrada Postal devem se tornar um Usuário Registrado e, em seguida, enviar por e-mail seu nome completo e um número de telefone de contato (incluindo código de área se fornecer um número fixo) e o e-mail registrado em sua Conta, bem como o título da Competição que desejam participar, para Raffolux Ltd, Aviation House, 125 Kingsway, Londres, WC2B 6NH. As informações acima mencionadas devem ser manuscritas para serem válidas e impressas em inglês legível. Esta informação será processada de acordo com o disposto nestes Termos e na Política de Privacidade e Proteção de Dados da Promotora.\r\n\r\nAs Inscrições Postais devem ser enviadas por selo de primeira ou segunda classe e devem ser recebidas pelo Promotor em Raffolux Ltd, Aviation House, 125 Kingsway, Londres, WC2B 6NH antes da Data do Sorteio da Competição relevante ou do ponto em que a Competição esgota - o que ocorrer primeiro - para poder participar do Concurso. As inscrições postais devem ser enviadas em um cartão postal ou carta não anexada. Inscrições Postais Tentativas recebidas em outra forma que não seja um cartão postal ou uma carta não serão aceitas. O Participante deve especificar em qual Concurso deseja participar. No caso de inscrições múltiplas recebidas em um único cartão postal ou dentro de um único envelope, apenas uma inscrição será inscrita no Concurso relevante. Se a Conta do Participante não puder ser identificada a partir dos detalhes fornecidos na Entrada Postal, a entrada do Bilhete Único específico da Competição não será processada. Entradas postais sem postagem correta e suficiente paga serão inválidas e não serão consideradas. Não serão aceitas entregas pessoais e em mãos.\r\n\r\nOs participantes que participarem de uma Competição Flash podem fazê-lo gratuitamente por meio de Inscrição por Telefone. Os participantes que participarem de Competições Flash por meio de inscrição por telefone devem se tornar um Usuário Registrado e, em seguida, ligar para 07727650878. Todas as chamadas recebidas por este número de telefone serão cobradas apenas à taxa normal, sem custos adicionais. Os participantes da Inscrição por Telefone devem fornecer seu nome completo, o e-mail associado à sua conta Raffolux, o título da Competição Flash em que desejam participar e um número de telefone de contato para participar da Competição Flash. Esta informação será processada de acordo com o disposto nestes Termos e na Política de Privacidade e Proteção de Dados da Promotora.\r\n');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_surname` varchar(200) NOT NULL,
  `user_credit` float NOT NULL DEFAULT '0',
  `user_email` varchar(200) NOT NULL,
  `user_affiliate` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_ddd` varchar(200) NOT NULL,
  `user_phone` varchar(200) NOT NULL,
  `user_cpf` varchar(200) NOT NULL,
  `user_ref` varchar(200) DEFAULT NULL,
  `user_date` varchar(200) NOT NULL,
  `user_time` varchar(200) NOT NULL,
  `user_status` int(200) NOT NULL,
  `user_pix_type` varchar(200) DEFAULT NULL,
  `user_pix_key` varchar(200) DEFAULT NULL,
  `user_level` int(200) NOT NULL,
  `user_ip` varchar(200) NOT NULL,
  `user_token` varchar(200) NOT NULL,
  `user_admin` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_surname`, `user_credit`, `user_email`, `user_affiliate`, `user_password`, `user_ddd`, `user_phone`, `user_cpf`, `user_ref`, `user_date`, `user_time`, `user_status`, `user_pix_type`, `user_pix_key`, `user_level`, `user_ip`, `user_token`, `user_admin`) VALUES
(11, 'Natan', 'Vianna', 1234580, 'admin@betraffle.com.br', '30948', 'e708f7754a03b4ec94716784818fbd65', '(99)', '99999-99998', '045.001.451-76', '', '14-08-2022', '06:21:59', 1, '', '', 1, '::1', '1322630142', 1),
(35, 'Daniel', 'Ribei', 0, 'danrib2018@gmail.com', '1498947549', 'e10adc3949ba59abbe56e057f20f883e', '(62)', '99999-8888', '181.506.700-41', '1178060961', '13-08-2023', '16:47:00', 1, 'cnpj', '98749897879', 1, '201.7.31.251', '1617565266', NULL),
(34, 'Antonio', 'Nunes', 1.5, 'dantars@outlook.com', '1178060961', 'e10adc3949ba59abbe56e057f20f883e', '(62)', '77777-7777', '767.650.790-17', '', '13-08-2023', '16:41:39', 1, 'cnpj', '44444444444444', 1, '201.7.31.251', '1747450571', NULL),
(32, 'Kauan', 'Pìres', 233, 'kauanpires452@gmail.com', '1984294958', '1a0a21d4613e96a8cf0d4d064b603b2b', '(21)', '96438-8354', '197.606.607-76', '', '10-08-2023', '21:25:20', 1, NULL, NULL, 1, '191.212.221.44', '1064220323', NULL),
(33, 'Tatiana', 'Pires', 192, 'tatiana.ecommerce01@gmail.com', '1657369684', '5329c0c1f4acfc1f11e2f9acb141300d', '(21)', '99210-1851', '105.453.087-47', '', '10-08-2023', '21:27:29', 1, NULL, NULL, 1, '179.67.206.61', '70891054', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `affiliate_click`
--
ALTER TABLE `affiliate_click`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `affiliate_comission`
--
ALTER TABLE `affiliate_comission`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `affiliate_comission_history`
--
ALTER TABLE `affiliate_comission_history`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `affiliate_setting`
--
ALTER TABLE `affiliate_setting`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cart_discount`
--
ALTER TABLE `cart_discount`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cart_tickets`
--
ALTER TABLE `cart_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cron_raffles`
--
ALTER TABLE `cron_raffles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `gateways_notification`
--
ALTER TABLE `gateways_notification`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `order_raffles`
--
ALTER TABLE `order_raffles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `order_raffles_tickets`
--
ALTER TABLE `order_raffles_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `raffles`
--
ALTER TABLE `raffles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `raffles_buyed`
--
ALTER TABLE `raffles_buyed`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `raffles_category`
--
ALTER TABLE `raffles_category`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `raffles_tickets_buyed`
--
ALTER TABLE `raffles_tickets_buyed`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `raffles_winners`
--
ALTER TABLE `raffles_winners`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `affiliate_click`
--
ALTER TABLE `affiliate_click`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `affiliate_comission`
--
ALTER TABLE `affiliate_comission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `affiliate_comission_history`
--
ALTER TABLE `affiliate_comission_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `affiliate_setting`
--
ALTER TABLE `affiliate_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de tabela `cart_discount`
--
ALTER TABLE `cart_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cart_tickets`
--
ALTER TABLE `cart_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1509;

--
-- AUTO_INCREMENT de tabela `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cron_raffles`
--
ALTER TABLE `cron_raffles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `gateways_notification`
--
ALTER TABLE `gateways_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `order_raffles`
--
ALTER TABLE `order_raffles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `order_raffles_tickets`
--
ALTER TABLE `order_raffles_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=835;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `raffles`
--
ALTER TABLE `raffles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `raffles_buyed`
--
ALTER TABLE `raffles_buyed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `raffles_category`
--
ALTER TABLE `raffles_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `raffles_tickets_buyed`
--
ALTER TABLE `raffles_tickets_buyed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT de tabela `raffles_winners`
--
ALTER TABLE `raffles_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
