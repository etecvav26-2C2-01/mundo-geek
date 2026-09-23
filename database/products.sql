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
(6, 'Luminária de Mesa Portal do Mundo Invertido', 'Luminária decorativa de mesa inspirada no universo de Stranger Things, com uma abertura estilizada para representar um portal para o Mundo Invertido. Possui iluminação LED e acabamento em preto, criando um efeito visual marcante para setups gamers, quartos e ambientes geek.', 89.90, 'product_6aa6a687070c47.04548394.png', 15, '2026-09-23 17:25:07', 0.650, 18.00, 14.00, 14.00),
(7, 'Teclado Mecânico Anime — Edição Especial', 'Um teclado feito para quem quer transformar o setup em algo único. O visual inspirado na estética de anime, combinado com iluminação RGB e teclas personalizadas, faz dele muito mais do que um periférico: é uma peça de destaque para sua mesa.', 299.90, 'product_6ab40c1a4dcc56.08312795.png', 14, '2026-09-23 17:27:54', 0.85
(8, 'Baú Decorativo Gomu Gomu no Mi', 'Leve um pedaço do mundo de One Piece para a sua coleção. Esse baú inspirado nos tesouros dos grandes piratas guarda uma réplica detalhada da Gomu Gomu no Mi, iluminada por uma suave luz LED. Fechado, já é uma peça incrível de decoração; aberto, vira o destaque da coleção.', 129.90, 'product_6ab40c7ada3b42.65590041.png', 15, '2026-09-23 17:29:30', 0.780, 12.00, 14.00, 14.00),
(9, 'Pikachu na Pokébola — Luminária Decorativa', 'Leve a energia do Pikachu para o seu cantinho! Nesta peça, o Pokémon mais querido da região de Kanto aparece saindo de uma Pokébola iluminada, criando um visual divertido e cheio de personalidade. Perfeita para dar vida ao setup, quarto ou coleção de qualquer fã de Pokémon.', 149.90, 'product_6ab40cc85f8748.36569497.png', 12, '2026-09-23 17:30:48', 0.650, 18.00, 16.00, 16.00),
(10, 'Death Note — Caderno de Anotações', 'Entre no universo de Death Note com este caderno inspirado no icônico livro da série. Com capa preta de textura semelhante a couro, acabamento elegante e encadernação espiral, ele combina funcionalidade com uma estética sombria e marcante. Ideal para anotações, desenhos, ideias ou simplesmente para fazer parte da coleção de um fã.', 59.90, 'product_6ab40d687f3820.75455421.png', 20, '2026-09-23 17:33:28', 0.380, 21.00, 14.80, 2.00),
(11, 'Conjunto de Broches — Cavaleiros do Zodíaco', 'Leve os Cavaleiros do Zodíaco para sua coleção com este conjunto de broches inspirado nas armaduras dos lendários guerreiros. Cada broche representa um cavaleiro diferente, com detalhes metálicos e acabamento esmaltado que valorizam os elementos característicos de cada armadura. Perfeitos para personalizar mochilas, jaquetas, bolsas ou exibir na sua coleção.', 89.90, 'product_6ab40dc8bcc8d8.68949732.png', 15, '2026-09-23 17:35:04', 0.085, 3.50, 3.00, 1.50),
(12, 'Arma de Portais de Rick and Morty — Objeto Decorativo', 'Leve o universo de Rick and Morty para sua coleção com esta réplica decorativa da icônica arma de portais. Com design inspirado no visual da série, iluminação verde que reproduz o efeito de um portal e efeitos sonoros ao ser ativada, a peça combina presença visual e interatividade. Acompanha uma base de exposição que mantém a arma em destaque, sendo ideal para setups, estantes e coleções geek.', 249.90, 'product_6ab40e07487e01.86083732.png', 8, '2026-09-23 17:36:07', 0.720, 19.00, 12.00, 29.00),
(13, 'Junkrat — Action Figure', 'Leve o caos de Junkrat para sua coleção com esta action figure inspirada no excêntrico personagem de Overwatch. A peça apresenta o personagem em uma pose dinâmica, com seu lançador de granadas, mochila de explosivos e perna mecânica, além de uma base temática que complementa a cena. Os detalhes da pintura e dos acessórios dão destaque à personalidade imprevisível e ao visual característico do personagem.', 559.90, 'product_6ab40f41b71813.77240210.png', 8, '2026-09-23 17:41:21', 0.780, 25.00, 16.00, 15.00),
(14, 'Yoriichi — Espada Decorativa', 'Leve a presença de Yoriichi Tsugikuni para sua coleção com esta espada decorativa inspirada em Demon Slayer. A peça apresenta uma lâmina com acabamento detalhado, guarda ornamentada, cabo revestido e bainha decorada com elementos florais, acompanhada de uma base própria para exposição. Ideal para fãs que desejam uma peça marcante para decorar o quarto, setup ou coleção.', 349.90, 'product_6ab4101b2f8489.98393335.png', 6, '2026-09-23 17:44:59', 1.200, 9.00, 15.00, 100.00);

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
