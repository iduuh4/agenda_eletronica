-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para users
CREATE DATABASE IF NOT EXISTS `users` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `users`;

-- Copiando estrutura para tabela users.atividades
CREATE TABLE IF NOT EXISTS `atividades` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) DEFAULT NULL,
  `descricao` varchar(256) DEFAULT NULL,
  `data_inicio` datetime(6) NOT NULL,
  `data_termino` datetime(6) NOT NULL,
  `status` varchar(50) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela users.atividades: ~6 rows (aproximadamente)
INSERT INTO `atividades` (`id`, `nome`, `descricao`, `data_inicio`, `data_termino`, `status`, `usuario_id`) VALUES
	(6, 'Assistir filme', 'Auto da Compadecida 2', '2025-03-26 18:00:00.000000', '2025-03-26 21:00:00.000000', 'Pendente', 2),
	(9, 'Fazer compras', 'supermercado', '2025-03-27 16:01:00.000000', '2025-03-27 20:01:00.000000', 'Pendente', 2),
	(16, 'Ler um livro', 'Verity', '2025-03-19 17:58:00.000000', '2025-03-19 21:58:00.000000', 'Pendente', 6),
	(17, 'Estudar', 'Tecnologias em geral.', '2025-03-21 17:59:00.000000', '2025-03-27 17:59:00.000000', 'Pendente', 6),
	(18, 'Praticar esporte', 'Futebol', '2025-03-19 18:00:00.000000', '2025-03-19 20:00:00.000000', 'Pendente', 2),
	(22, 'Academia', 'Treinar', '2025-03-19 20:24:00.000000', '2025-03-19 23:24:00.000000', 'pendente', 6);

-- Copiando estrutura para tabela users.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `limite_atividades` int(11) DEFAULT 10,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela users.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `login`, `senha`, `limite_atividades`) VALUES
	(2, 'eduardo', '$2y$10$9N9t.grzg.IbBp0B8YXei.nSSfclOAVjWwvDw.lewglNiI7o2UQqy', 4),
	(6, 'admin', '$2y$10$xCBhND4PL0SgweIntFFxzuEF1o7WNaT2zyqhF69chOyMQvnO1EpNu', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
