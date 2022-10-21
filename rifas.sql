-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Out-2022 às 10:41
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rifas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
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
  `cart_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`id`, `cart_raffle`, `cart_amount`, `cart_user`, `cart_data`, `cart_time`, `cart_expiration`, `cart_discount`, `cart_discount_id`, `cart_status`) VALUES
(69, 8, 24.08, 10, '21-10-2022', '04:08', '04:38', 0, 0, 1),
(70, 18, 40, 10, '21-10-2022', '06:40', '07:10', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart_discount`
--

CREATE TABLE `cart_discount` (
  `id` int(11) NOT NULL,
  `cart_discount_code` varchar(200) NOT NULL,
  `cart_discount_porcentage` int(11) NOT NULL,
  `cart_discount_limit` int(11) NOT NULL,
  `cart_discount_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cart_discount`
--

INSERT INTO `cart_discount` (`id`, `cart_discount_code`, `cart_discount_porcentage`, `cart_discount_limit`, `cart_discount_status`) VALUES
(1, 'RIFA20', 50, 0, 1),
(2, 'RIFA30', 30, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart_tickets`
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
-- Extraindo dados da tabela `cart_tickets`
--

INSERT INTO `cart_tickets` (`id`, `cart_raffle`, `cart_ticket`, `cart_user`, `cart_data`, `cart_time`, `cart_expiration`, `cart_status`) VALUES
(834, 8, 47, 10, '21-10-2022', '04:08', '04:38', 1),
(833, 8, 30, 10, '21-10-2022', '04:08', '04:38', 1),
(832, 8, 13, 10, '21-10-2022', '04:08', '04:38', 1),
(835, 8, 64, 10, '21-10-2022', '04:08', '04:38', 1),
(836, 8, 65, 10, '21-10-2022', '04:08', '04:38', 1),
(837, 8, 48, 10, '21-10-2022', '04:08', '04:38', 1),
(838, 8, 31, 10, '21-10-2022', '04:08', '04:38', 1),
(839, 18, 28, 10, '21-10-2022', '06:40', '07:10', 1),
(840, 18, 27, 10, '21-10-2022', '06:40', '07:10', 1),
(841, 18, 10, 10, '21-10-2022', '06:40', '07:10', 1),
(842, 18, 9, 10, '21-10-2022', '06:40', '07:10', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gateways`
--

CREATE TABLE `gateways` (
  `id` int(11) NOT NULL,
  `gateway_me_public` varchar(200) NOT NULL,
  `gateway_me_secret` varchar(200) NOT NULL,
  `gateway_pay_public` varchar(200) NOT NULL,
  `gateway_pay_secret` varchar(200) NOT NULL,
  `gateway_act_public` varchar(200) NOT NULL,
  `gateway_act_secret` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gateways`
--

INSERT INTO `gateways` (`id`, `gateway_me_public`, `gateway_me_secret`, `gateway_pay_public`, `gateway_pay_secret`, `gateway_act_public`, `gateway_act_secret`) VALUES
(1, 'teste_me1', 'teste_me2', 'teste_me3', 'teste_me3', 'teste_me4', 'teste_me5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payments_raffle` int(11) NOT NULL,
  `payments_amount` float NOT NULL,
  `payments_status` int(11) NOT NULL COMMENT '1 sucesso / 2 pendente / 3 recusado // 4 estornado',
  `payments_user` int(11) NOT NULL,
  `payments_date` varchar(200) NOT NULL,
  `payments_time` varchar(200) NOT NULL,
  `payments_gateway` varchar(200) NOT NULL,
  `payment_type` varchar(200) NOT NULL COMMENT '0 gateway// 1 interno'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `payments`
--

INSERT INTO `payments` (`id`, `payments_raffle`, `payments_amount`, `payments_status`, `payments_user`, `payments_date`, `payments_time`, `payments_gateway`, `payment_type`) VALUES
(8, 9, 330, 1, 10, '30-08-2022', '02:44:29', 'creditos', '1'),
(7, 22, 32.97, 4, 10, '29-08-2022', '23:21:53', 'creditos', '1'),
(9, 9, 638, 1, 10, '30-08-2022', '02:49:57', 'creditos', '1'),
(10, 6, 0.01, 1, 10, '30-08-2022', '02:59:35', 'creditos', '1'),
(11, 9, 330, 1, 10, '30-08-2022', '03:10:53', 'creditos', '1'),
(12, 9, 902, 1, 10, '30-08-2022', '03:12:10', 'creditos', '1'),
(13, 22, 32.97, 1, 10, '21-10-2022', '04:03:13', 'creditos', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `privacy_title` varchar(200) NOT NULL,
  `privacy_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `privacy`
--

INSERT INTO `privacy` (`id`, `privacy_title`, `privacy_content`) VALUES
(1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum aperiam. Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum aperiam.\r\n                Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam. Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam. \r\nPerspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.\r\n\r\nPerspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.\r\n                        ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raffles`
--

CREATE TABLE `raffles` (
  `id` int(11) NOT NULL,
  `raffles_title` varchar(200) NOT NULL,
  `raffles_description` varchar(1000) NOT NULL,
  `raffles_image` varchar(200) NOT NULL,
  `raffles_tickets` int(11) NOT NULL,
  `raffles_tickets_limit` int(11) NOT NULL,
  `raffles_tickets_value` float NOT NULL,
  `raffles_progress` float NOT NULL DEFAULT 0,
  `raffles_status_publish` int(11) NOT NULL COMMENT '1 - publicado | 0 - rascunho',
  `raffles_status_random` int(11) NOT NULL COMMENT '1 -aberto | 2 em sortio | 3 - finalizado | 4 cancelado',
  `raffles_category` int(11) NOT NULL,
  `raffles_date` varchar(200) NOT NULL,
  `raffles_time` varchar(200) NOT NULL,
  `raffles_user` int(11) NOT NULL,
  `raffles_featured` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `raffles`
--

INSERT INTO `raffles` (`id`, `raffles_title`, `raffles_description`, `raffles_image`, `raffles_tickets`, `raffles_tickets_limit`, `raffles_tickets_value`, `raffles_progress`, `raffles_status_publish`, `raffles_status_random`, `raffles_category`, `raffles_date`, `raffles_time`, `raffles_user`, `raffles_featured`) VALUES
(8, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 666, 34, 3.44, 0, 0, 2, 1, '14/08/2022', '11:58:50', 1, 0),
(3, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 555, 34, 3.44, 0, 0, 2, 1, '14/08/2022', '11:58:50', 1, 1),
(6, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 10, 1, 0.01, 33, 0, 1, 2, '14/08/2022', '12:21:22', 1, 0),
(7, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 100, 10, 10, 90, 0, 1, 1, '14/08/2022', '12:22:03', 1, 1),
(9, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 4444, 100, 22, 2, 0, 1, 3, '14/08/2022', '12:01:00', 1, 1),
(11, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 8, 1, 0.01, 0, 0, 1, 2, '14/08/2022', '12:21:22', 1, 0),
(12, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 777, 10, 10, 0, 0, 1, 1, '14/08/2022', '12:22:03', 1, 0),
(13, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 111, 34, 3.44, 0, 0, 2, 1, '14/08/2022', '11:58:50', 1, 0),
(14, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 6666, 34, 3.44, 88, 0, 2, 1, '14/08/2022', '11:58:50', 1, 0),
(17, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 10, 3, 0.01, 30, 0, 1, 2, '14/08/2022', '12:21:22', 1, 0),
(18, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 100, 10, 10, 44, 0, 1, 1, '14/08/2022', '12:22:03', 1, 0),
(20, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 800, 50, 123.12, 0, 1, 1, 2, '14/08/2022', '12:03:10', 1, 0),
(21, 'Sorteio Exemplo ', 'teste', '172319579logo.png', 3, 1, 0.01, 0, 1, 1, 1, '14/08/2022', '12:21:22', 1, 0),
(22, 'Sorteio Exemplo ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, ex esse! Itaque ratione officiis dolor sint, culpa facilis id? Aut omnis quo nostrum laudantium reiciendis officiis velit atque quae dignissimos', '172319579logo.png', 600, 55, 10.99, 0, 1, 4, 3, '14/08/2022', '12:22:03', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `raffles_buyed`
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
-- Extraindo dados da tabela `raffles_buyed`
--

INSERT INTO `raffles_buyed` (`id`, `raffles_id`, `raffles_user`, `raffles_amount`, `raffles_payment`, `raffles_data`, `raffles_time`, `raffles_status`) VALUES
(25, 0, 0, 968, 9, '30-08-2022', '02:49:57', 0),
(24, 9, 10, 330, 8, '30-08-2022', '02:44', 0),
(23, 22, 10, 32.97, 7, '29-08-2022', '23:21', 1),
(26, 6, 10, 0.01, 10, '30-08-2022', '02:59', 0),
(27, 0, 0, 660, 11, '30-08-2022', '03:10:54', 0),
(28, 0, 0, 1232, 12, '30-08-2022', '03:12:10', 0),
(29, 0, 0, 65.94, 13, '21-10-2022', '04:03:13', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `raffles_category`
--

CREATE TABLE `raffles_category` (
  `id` int(11) NOT NULL,
  `raffles_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `raffles_category`
--

INSERT INTO `raffles_category` (`id`, `raffles_name`) VALUES
(1, 'Dinheiro'),
(2, 'Tecnologia'),
(3, 'Eletrodoméstico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raffles_tickets_buyed`
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
-- Extraindo dados da tabela `raffles_tickets_buyed`
--

INSERT INTO `raffles_tickets_buyed` (`id`, `ticket_raffle`, `ticket_number`, `ticket_user`, `ticket_date`, `ticket_time`, `ticket_payment_id`, `ticket_payment_type`) VALUES
(568, 9, 601, 10, '30-08-2022', '03:12:10', '2057074368', 'credits'),
(567, 9, 618, 10, '30-08-2022', '03:12:10', '1837559600', 'credits'),
(566, 9, 635, 10, '30-08-2022', '03:12:10', '378701842', 'credits'),
(565, 9, 652, 10, '30-08-2022', '03:12:10', '1249792341', 'credits'),
(564, 9, 669, 10, '30-08-2022', '03:12:10', '666411439', 'credits'),
(563, 9, 670, 10, '30-08-2022', '03:12:10', '2002662758', 'credits'),
(562, 9, 653, 10, '30-08-2022', '03:12:10', '1604749870', 'credits'),
(561, 9, 636, 10, '30-08-2022', '03:12:10', '1032548173', 'credits'),
(560, 9, 619, 10, '30-08-2022', '03:12:10', '907576314', 'credits'),
(559, 9, 602, 10, '30-08-2022', '03:12:10', '1511797332', 'credits'),
(558, 9, 603, 10, '30-08-2022', '03:12:10', '1190722722', 'credits'),
(557, 9, 620, 10, '30-08-2022', '03:12:10', '2840441', 'credits'),
(556, 9, 637, 10, '30-08-2022', '03:12:10', '2090559373', 'credits'),
(555, 9, 654, 10, '30-08-2022', '03:12:10', '783645628', 'credits'),
(554, 9, 671, 10, '30-08-2022', '03:12:10', '167260253', 'credits'),
(553, 9, 672, 10, '30-08-2022', '03:12:10', '2032383866', 'credits'),
(552, 9, 673, 10, '30-08-2022', '03:12:10', '1252823120', 'credits'),
(550, 9, 639, 10, '30-08-2022', '03:12:10', '1146348013', 'credits'),
(551, 9, 656, 10, '30-08-2022', '03:12:10', '1216613223', 'credits'),
(549, 9, 622, 10, '30-08-2022', '03:12:10', '685515806', 'credits'),
(548, 9, 630, 10, '30-08-2022', '03:12:10', '217086348', 'credits'),
(547, 9, 629, 10, '30-08-2022', '03:12:10', '1462511639', 'credits'),
(546, 9, 628, 10, '30-08-2022', '03:12:10', '1661052796', 'credits'),
(545, 9, 610, 10, '30-08-2022', '03:12:10', '958730011', 'credits'),
(544, 9, 627, 10, '30-08-2022', '03:12:10', '466204822', 'credits'),
(543, 9, 626, 10, '30-08-2022', '03:12:10', '1863333664', 'credits'),
(542, 9, 644, 10, '30-08-2022', '03:12:10', '1792839724', 'credits'),
(541, 9, 645, 10, '30-08-2022', '03:12:10', '427137914', 'credits'),
(540, 9, 663, 10, '30-08-2022', '03:12:10', '188240879', 'credits'),
(539, 9, 660, 10, '30-08-2022', '03:12:10', '1903642329', 'credits'),
(538, 9, 643, 10, '30-08-2022', '03:12:10', '1725794407', 'credits'),
(537, 9, 609, 10, '30-08-2022', '03:12:10', '763013772', 'credits'),
(536, 9, 608, 10, '30-08-2022', '03:12:10', '1962026305', 'credits'),
(535, 9, 607, 10, '30-08-2022', '03:12:10', '902687276', 'credits'),
(534, 9, 606, 10, '30-08-2022', '03:12:10', '2082795564', 'credits'),
(533, 9, 605, 10, '30-08-2022', '03:12:10', '925573697', 'credits'),
(532, 9, 604, 10, '30-08-2022', '03:12:10', '185615585', 'credits'),
(531, 9, 621, 10, '30-08-2022', '03:12:10', '753837867', 'credits'),
(530, 9, 638, 10, '30-08-2022', '03:12:10', '1563195361', 'credits'),
(529, 9, 655, 10, '30-08-2022', '03:12:10', '1047907443', 'credits'),
(528, 9, 641, 10, '30-08-2022', '03:12:10', '574519595', 'credits'),
(527, 9, 33, 10, '30-08-2022', '03:10:54', '684205967', 'credits'),
(526, 9, 16, 10, '30-08-2022', '03:10:54', '1972698511', 'credits'),
(525, 9, 15, 10, '30-08-2022', '03:10:54', '1656828738', 'credits'),
(524, 9, 32, 10, '30-08-2022', '03:10:54', '624992931', 'credits'),
(523, 9, 49, 10, '30-08-2022', '03:10:54', '449349727', 'credits'),
(522, 9, 50, 10, '30-08-2022', '03:10:54', '1486230496', 'credits'),
(521, 9, 67, 10, '30-08-2022', '03:10:54', '1747956712', 'credits'),
(520, 9, 66, 10, '30-08-2022', '03:10:54', '361317467', 'credits'),
(519, 9, 83, 10, '30-08-2022', '03:10:54', '1312086275', 'credits'),
(518, 9, 84, 10, '30-08-2022', '03:10:54', '723907561', 'credits'),
(517, 9, 85, 10, '30-08-2022', '03:10:54', '1308344179', 'credits'),
(516, 9, 68, 10, '30-08-2022', '03:10:54', '282757910', 'credits'),
(515, 9, 51, 10, '30-08-2022', '03:10:54', '1188425989', 'credits'),
(514, 9, 34, 10, '30-08-2022', '03:10:54', '1816148377', 'credits'),
(513, 9, 17, 10, '30-08-2022', '03:10:54', '785534664', 'credits'),
(512, 6, 3, 10, '30-08-2022', '02:59:35', '1232273494', 'credits'),
(511, 9, 14, 10, '30-08-2022', '02:49:57', '793379170', 'credits'),
(510, 9, 13, 10, '30-08-2022', '02:49:57', '1539377287', 'credits'),
(509, 9, 12, 10, '30-08-2022', '02:49:57', '874892575', 'credits'),
(508, 9, 29, 10, '30-08-2022', '02:49:57', '51059846', 'credits'),
(507, 9, 30, 10, '30-08-2022', '02:49:57', '361113472', 'credits'),
(506, 9, 31, 10, '30-08-2022', '02:49:57', '1771070281', 'credits'),
(505, 9, 48, 10, '30-08-2022', '02:49:57', '1316054907', 'credits'),
(504, 9, 47, 10, '30-08-2022', '02:49:57', '1971682611', 'credits'),
(503, 9, 46, 10, '30-08-2022', '02:49:57', '1033999757', 'credits'),
(502, 9, 63, 10, '30-08-2022', '02:49:57', '1341563212', 'credits'),
(501, 9, 64, 10, '30-08-2022', '02:49:57', '594314090', 'credits'),
(500, 9, 65, 10, '30-08-2022', '02:49:57', '2047172606', 'credits'),
(499, 9, 82, 10, '30-08-2022', '02:49:57', '1036705607', 'credits'),
(498, 9, 81, 10, '30-08-2022', '02:49:57', '712730156', 'credits'),
(497, 9, 80, 10, '30-08-2022', '02:49:57', '674255762', 'credits'),
(496, 9, 8, 10, '30-08-2022', '02:49:57', '329568593', 'credits'),
(495, 9, 7, 10, '30-08-2022', '02:49:57', '248662199', 'credits'),
(494, 9, 6, 10, '30-08-2022', '02:49:57', '353747458', 'credits'),
(493, 9, 5, 10, '30-08-2022', '02:49:57', '104000934', 'credits'),
(492, 9, 4, 10, '30-08-2022', '02:49:57', '644416655', 'credits'),
(491, 9, 21, 10, '30-08-2022', '02:49:57', '1625682055', 'credits'),
(490, 9, 38, 10, '30-08-2022', '02:49:57', '1866871992', 'credits'),
(489, 9, 39, 10, '30-08-2022', '02:49:57', '1644394045', 'credits'),
(488, 9, 22, 10, '30-08-2022', '02:49:57', '864630823', 'credits'),
(487, 9, 23, 10, '30-08-2022', '02:49:57', '1289364175', 'credits'),
(486, 9, 40, 10, '30-08-2022', '02:49:57', '402447965', 'credits'),
(485, 9, 57, 10, '30-08-2022', '02:49:57', '1683038695', 'credits'),
(484, 9, 58, 10, '30-08-2022', '02:49:57', '2144209018', 'credits'),
(483, 9, 41, 10, '30-08-2022', '02:49:57', '402222261', 'credits'),
(482, 9, 9, 10, '30-08-2022', '02:44:29', '990119867', 'credits'),
(481, 9, 26, 10, '30-08-2022', '02:44:29', '919761359', 'credits'),
(480, 9, 43, 10, '30-08-2022', '02:44:29', '402483534', 'credits'),
(479, 9, 60, 10, '30-08-2022', '02:44:29', '1130060967', 'credits'),
(478, 9, 77, 10, '30-08-2022', '02:44:29', '594209514', 'credits'),
(477, 9, 78, 10, '30-08-2022', '02:44:29', '1817625230', 'credits'),
(476, 9, 61, 10, '30-08-2022', '02:44:29', '1745754501', 'credits'),
(475, 9, 44, 10, '30-08-2022', '02:44:29', '618712669', 'credits'),
(474, 9, 79, 10, '30-08-2022', '02:44:29', '2073112456', 'credits'),
(473, 9, 62, 10, '30-08-2022', '02:44:29', '1385737301', 'credits'),
(472, 9, 45, 10, '30-08-2022', '02:44:29', '158299855', 'credits'),
(471, 9, 28, 10, '30-08-2022', '02:44:29', '1933003636', 'credits'),
(470, 9, 11, 10, '30-08-2022', '02:44:29', '983830550', 'credits'),
(469, 9, 10, 10, '30-08-2022', '02:44:29', '1942661693', 'credits'),
(468, 9, 27, 10, '30-08-2022', '02:44:29', '26221251', 'credits'),
(467, 22, 10, 10, '29-08-2022', '23:21:53', '469334507', 'credits'),
(466, 22, 9, 10, '29-08-2022', '23:21:53', '2033990270', 'credits'),
(465, 22, 8, 10, '29-08-2022', '23:21:53', '1686974451', 'credits'),
(569, 22, 28, 10, '21-10-2022', '04:03:13', '1686968879', 'credits'),
(570, 22, 12, 10, '21-10-2022', '04:03:13', '1298251319', 'credits'),
(571, 22, 29, 10, '21-10-2022', '04:03:13', '46934626', 'credits');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raffles_winners`
--

CREATE TABLE `raffles_winners` (
  `id` int(11) NOT NULL,
  `winner_user` int(11) NOT NULL,
  `winner_raffle` int(11) NOT NULL,
  `winner_ticket` int(11) NOT NULL,
  `winner_date` varchar(200) NOT NULL,
  `winner_time` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `terms_title` varchar(200) NOT NULL,
  `terms_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `terms`
--

INSERT INTO `terms` (`id`, `terms_title`, `terms_content`) VALUES
(1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum aperiam. Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum aperiam.\r\n                Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam. Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam. \r\nPerspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.\r\n\r\nPerspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.Perspiciatis, porroLorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere  necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum  aperiam.\r\n                        ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_surname` varchar(200) NOT NULL,
  `user_credit` float NOT NULL DEFAULT 0,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_ddd` varchar(200) NOT NULL,
  `user_phone` varchar(200) NOT NULL,
  `user_cpf` varchar(200) NOT NULL,
  `user_ref` varchar(200) DEFAULT NULL,
  `user_date` varchar(200) NOT NULL,
  `user_time` varchar(200) NOT NULL,
  `user_status` int(200) NOT NULL,
  `user_level` int(200) NOT NULL,
  `user_ip` varchar(200) NOT NULL,
  `user_token` varchar(200) NOT NULL,
  `user_admin` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_surname`, `user_credit`, `user_email`, `user_password`, `user_ddd`, `user_phone`, `user_cpf`, `user_ref`, `user_date`, `user_time`, `user_status`, `user_level`, `user_ip`, `user_token`, `user_admin`) VALUES
(10, 'Daniel', 'Ribeiro', 1234580, 'dantars@outlook.com', '612553ddb25198fd3c2c90540df9a70a', '(99)', '99999-99998', '045.001.451-76', '', '14-08-2022', '06:21:59', 2, 1, '::1', '1322630142', 0),
(11, 'Daniel', 'Ribeiro', 1234580, 'admin@outlook.com', '612553ddb25198fd3c2c90540df9a70a', '(99)', '99999-99998', '045.001.451-76', '', '14-08-2022', '06:21:59', 2, 1, '::1', '1322630142', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cart_discount`
--
ALTER TABLE `cart_discount`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cart_tickets`
--
ALTER TABLE `cart_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `raffles`
--
ALTER TABLE `raffles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `raffles_buyed`
--
ALTER TABLE `raffles_buyed`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `raffles_category`
--
ALTER TABLE `raffles_category`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `raffles_tickets_buyed`
--
ALTER TABLE `raffles_tickets_buyed`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `raffles_winners`
--
ALTER TABLE `raffles_winners`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `cart_discount`
--
ALTER TABLE `cart_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cart_tickets`
--
ALTER TABLE `cart_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=843;

--
-- AUTO_INCREMENT de tabela `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `raffles`
--
ALTER TABLE `raffles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `raffles_buyed`
--
ALTER TABLE `raffles_buyed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `raffles_category`
--
ALTER TABLE `raffles_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `raffles_tickets_buyed`
--
ALTER TABLE `raffles_tickets_buyed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=572;

--
-- AUTO_INCREMENT de tabela `raffles_winners`
--
ALTER TABLE `raffles_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
