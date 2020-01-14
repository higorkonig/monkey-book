-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2019 at 02:14 PM
-- Server version: 10.3.18-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shumpxyz_monkey`
--

-- --------------------------------------------------------

--
-- Table structure for table `mb_livros`
--

CREATE TABLE `mb_livros` (
  `livro_id` int(11) NOT NULL,
  `livro_nome` text NOT NULL,
  `livro_resumo` text NOT NULL,
  `livro_capa` text NOT NULL,
  `livro_pdf` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_livros`
--

INSERT INTO `mb_livros` (`livro_id`, `livro_nome`, `livro_resumo`, `livro_capa`, `livro_pdf`) VALUES
(1, 'Harry Potter e o CÃ¡lice de Fogo', 'Harry retorna para seu quarto ano na Escola de Magia e Bruxaria de Hogwarts, junto com os seus amigos Rony e Hermione. Desta vez, acontece um torneio entre as trÃªs maiores escola de magia, com um participante selecionado de cada escola pelo CÃ¡lice de Fogo. O nome de Harry aparece, mesmo nÃ£o tendo se inscrito, e ele precisa competir.', '9f358c3992f146675226e6460864f1ee.jpg', '2b718cfa8da88b7dd9f82cd097034f27.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `mb_usuarios`
--

CREATE TABLE `mb_usuarios` (
  `user_id` int(11) NOT NULL,
  `user_nome` text NOT NULL,
  `user_email` text NOT NULL,
  `user_senha` text NOT NULL,
  `user_token` text NOT NULL,
  `user_admin` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mb_usuarios`
--

INSERT INTO `mb_usuarios` (`user_id`, `user_nome`, `user_email`, `user_senha`, `user_token`, `user_admin`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$oI80ZNkz6dPQKZ91f9slGepZBL.FEc60QszaULThqvKGv78CRl8P2', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mb_livros`
--
ALTER TABLE `mb_livros`
  ADD PRIMARY KEY (`livro_id`);

--
-- Indexes for table `mb_usuarios`
--
ALTER TABLE `mb_usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mb_livros`
--
ALTER TABLE `mb_livros`
  MODIFY `livro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mb_usuarios`
--
ALTER TABLE `mb_usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
