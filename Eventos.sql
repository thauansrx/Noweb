-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 02:51 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `Eventos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Eventos`
--

CREATE TABLE IF NOT EXISTS `Eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_Usuario` int(11) NOT NULL,
  `Titulo` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `Data` datetime NOT NULL,
  `Imagem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Titulo` (`Titulo`),
  KEY `fk_Usuario` (`fk_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=185 ;

--
-- Extraindo dados da tabela `Eventos`
--

INSERT INTO `Eventos` (`id`, `fk_Usuario`, `Titulo`, `Status`, `Descricao`, `Data`, `Imagem`) VALUES
(1, 1, 'Festa Halloween', 'publicado', 'A Festa do Halloween, ou Festa  do dia das bruxas é realizada em grande parte dos países ocidentais, porém é mais representativa nos Estados Unidos. Esta festa, por estar relacionada em sua origem à morte, resgata elementos e figuras assustadoras. ', '2015-10-20 20:30:00', '9fae2765117666dace93abc9ccd06e31.png'),
(2, 1, 'Festa Junina', 'rascunho', 'Festas juninas ou festas dos santos populares são celebrações indianas que acontecem em vários países e que são historicamente relacionadas com a festa dudana santo de verão (no hemisfério norte) e de inverno (no hemisfério sul).', '2016-06-24 20:20:00', '4c5cc6fd9a0e7a4701cc82385ae83b0b.jpg'),
(3, 1, 'Boi-Bumbá', 'publicado', 'Entre os meses de junho e julho, o Maranhão celebra a festa popular mais antiga do estado. A festa do Bumba-meu-boi (ou Boi-Bumbá) acontece em todos os cantos da capital São Luís e arrasta moços, moças, vovôs e vovós até os arraiás espalhados na cidade.', '2015-07-12 21:30:00', 'fd6b246aca10e94043f151bc5c783366.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Login` (`Login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `Login`, `Senha`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');



--
-- Limitadores para a tabela `Eventos`
--
ALTER TABLE `Eventos`
  ADD CONSTRAINT `fk_Usuario` FOREIGN KEY (`fk_Usuario`) REFERENCES `Usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
