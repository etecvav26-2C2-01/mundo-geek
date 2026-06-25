-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/06/2026 às 23:21
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mundo-geek`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `image` varchar(500) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `weight` decimal(10,3) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `width` decimal(10,2) NOT NULL,
  `length` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `stock`, `created_at`, `weight`, `height`, `width`, `length`) VALUES
(3, 'Caixa de Som Flutuante Death Star™', 'Star Wars - Transforme seu ambiente com a imponência da lendária Estrela da Morte. A Caixa de Som Flutuante Death Star™ combina tecnologia, design e entretenimento em um produto único, perfeito para fãs de Star Wars e amantes de inovação.  Com tecnologia Maglev, a esfera levita de forma real sobre a base magnética, criando um efeito visual impressionante. Além disso, conta com Bluetooth 5.0 para conexão rápida e estável, oferecendo áudio em 360° de alta qualidade para suas músicas, filmes e jogos.  A iluminação LED ambiente destaca os detalhes da Estrela da Morte e cria uma atmosfera futurista e sofisticada em qualquer espaço. Seu carregamento via USB garante praticidade para o uso diário.', 178.90, 'product_6a3bed2ad62664.65367147.jpeg', 14, '2026-06-24 15:27:39', 0.556, 15.00, 12.00, 12.00),
(4, 'Luminária LED – Naruto x Sasuke', 'Transforme seu espaço com uma iluminação que combina estilo, personalidade e paixão pelo universo geek. A luminária LED 3D Naruto x Sasuke cria um efeito visual impressionante, destacando dois dos personagens mais icônicos dos animes em um design moderno e cheio de atitude.  Ideal para quartos, escritórios, setups gamers e coleções, ela oferece iluminação suave e decorativa, perfeita para dar um toque único ao ambiente sem ocupar muito espaço.', 59.90, 'product_6a3d097f9eb099.55786287.png', 503, '2026-06-25 10:57:03', 0.348, 14.00, 10.00, 10.00),
(5, 'Headset Gamer RGB Premium', 'Mergulhe em uma experiência sonora imersiva e leve seu setup para outro nível. O Headset Gamer RGB Premium foi desenvolvido para quem busca qualidade de áudio, conforto e um visual moderno que combina perfeitamente com qualquer ambiente gamer.  Com som potente e detalhes cristalinos, você escuta cada passo, efeito e diálogo com precisão, garantindo mais desempenho em jogos competitivos e maior imersão em filmes, séries e músicas.', 109.90, 'product_6a3d0b5bc313f2.05776083.png', 8, '2026-06-25 11:04:59', 0.320, 20.00, 18.00, 15.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
