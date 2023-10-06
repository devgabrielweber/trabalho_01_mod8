-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;

-- Copiando estrutura para tabela laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela laravel.hospede
CREATE TABLE IF NOT EXISTS `hospede` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.hospede: ~2 rows (aproximadamente)
INSERT INTO `hospede` (`id`, `nome`, `cpf`, `email`, `telefone`, `created_at`, `updated_at`) VALUES
	(1, 'Hiury Gabriel Tressoldi', '023.023.023-23', 'hiury.gt@aluno.ifsc.edu.br', '(49) 98883-0613', '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(2, 'Gabriel Augusto Weber', '456.456.456-45', 'gabriel.aw@aluno.ifsc.edu.br', '(49) 99154-4587', '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(3, 'Daniel Molo', '981.981.981-81', 'dani.molo@gmail.com', '(11) 95684-3155', '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(4, 'Lukas Marques', '470.470.470-81', 'luka.mqs@gmail.com', '(11) 99941-3156', '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(5, 'José de Alencar', '222.222.222-22', 'jose.alencar@edu.br', '(21) 91111-1111', '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(6, 'Machado de Assis', '000.000.000-00', 'machado.assis@edu.com', '(21) 90045-4242', '2023-10-06 05:20:36', '2023-10-06 05:20:36');

-- Copiando estrutura para tabela laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_10_04_170304_create_hospede_table', 1),
	(6, '2023_10_04_174132_create_quarto_table', 1),
	(7, '2023_10_04_181209_create_reserva_table', 1);

-- Copiando estrutura para tabela laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela laravel.quarto
CREATE TABLE IF NOT EXISTS `quarto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numero` int NOT NULL,
  `qtd_camas` int NOT NULL,
  `descricao` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaria` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.quarto: ~3 rows (aproximadamente)
INSERT INTO `quarto` (`id`, `numero`, `qtd_camas`, `descricao`, `diaria`, `created_at`, `updated_at`) VALUES
	(1, 440, 1, 'Suíte para 2 pessoas. SMART TV 50\'\' e ar condicionado', 249.99, '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(2, 103, 2, 'Quarto para até 4 pessoas. Equipado com frigobar, um banheiro e aquecedor elétrico', 299.99, '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(3, 102, 3, '1 cama de casal e duas de solteiro. Planejado para o maior conforto para famílias viajando', 399.99, '2023-10-06 05:20:36', '2023-10-06 05:20:36');

-- Copiando estrutura para tabela laravel.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hospede_id` bigint unsigned DEFAULT NULL,
  `quarto_id` bigint unsigned DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reserva_hospede_id_foreign` (`hospede_id`),
  KEY `reserva_quarto_id_foreign` (`quarto_id`),
  CONSTRAINT `reserva_hospede_id_foreign` FOREIGN KEY (`hospede_id`) REFERENCES `hospede` (`id`),
  CONSTRAINT `reserva_quarto_id_foreign` FOREIGN KEY (`quarto_id`) REFERENCES `quarto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.reserva: ~4 rows (aproximadamente)
INSERT INTO `reserva` (`id`, `hospede_id`, `quarto_id`, `data_inicio`, `data_fim`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '2023-10-04', '2023-10-10', '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(2, 2, 2, '2023-10-11', '2023-10-14', '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(3, 5, 1, '2023-10-04', '2023-10-10', '2023-10-06 05:20:36', '2023-10-06 05:20:36'),
	(4, 3, 3, '2023-12-23', '2023-12-31', '2023-10-06 05:20:36', '2023-10-06 05:20:36');

-- Copiando estrutura para tabela laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela laravel.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
