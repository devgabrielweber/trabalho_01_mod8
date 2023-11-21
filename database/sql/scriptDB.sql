-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 21, 2023 at 12:46 AM
-- Server version: 8.1.0
-- PHP Version: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `adicional`
--

CREATE TABLE `adicional` (
  `id` bigint UNSIGNED NOT NULL,
  `hospede_id` bigint UNSIGNED NOT NULL,
  `espaco_id` bigint UNSIGNED NOT NULL,
  `reserva_id` bigint UNSIGNED NOT NULL,
  `pessoas` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chale`
--

CREATE TABLE `chale` (
  `id` bigint UNSIGNED NOT NULL,
  `numero` int NOT NULL,
  `pessoas` int NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diaria` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chale`
--

INSERT INTO `chale` (`id`, `numero`, `pessoas`, `descricao`, `foto`, `diaria`, `created_at`, `updated_at`) VALUES
(1, 123, 4, 'Chalé Bonito', 'https://distribuidoradnc.com.br/wp-content/uploads/2023/02/IMG_7476.jpg', 449.99, '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(2, 666, 6, 'Habitado por algum demônio', 'https://www.creativefabrica.com/wp-content/uploads/2022/11/15/Haunted-Cottage-In-The-Middle-Of-The-Forest-Tim-Allen-46829517-1.png', 499.99, '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(3, 875, 3, 'Espaçoso, mal iluminado,confortável', 'https://media-cdn.tripadvisor.com/media/photo-s/1c/03/ee/fd/chales-encanto-das-pedras.jpg', 199.99, '2023-11-21 00:30:54', '2023-11-21 00:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `espaco`
--

CREATE TABLE `espaco` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(8,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `espaco`
--

INSERT INTO `espaco` (`id`, `nome`, `descricao`, `valor`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Piscina', 'Acesso à piscina do hotel, em tamanho olímpico', 29.99, 'piscina.jpg', '2023-11-21 00:30:54', '2023-11-21 00:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospede`
--

CREATE TABLE `hospede` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospede`
--

INSERT INTO `hospede` (`id`, `nome`, `cpf`, `email`, `telefone`, `created_at`, `updated_at`) VALUES
(1, 'Hiury Gabriel Tressoldi', '023.023.023-23', 'hiury.gt@aluno.ifsc.edu.br', '(49) 98883-0613', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(2, 'Gabriel Augusto Weber', '456.456.456-45', 'gabriel.aw@aluno.ifsc.edu.br', '(49) 99154-4587', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(3, 'Daniel Molo', '981.981.981-81', 'dani.molo@gmail.com', '(11) 95684-3155', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(4, 'Lukas Marques', '470.470.470-81', 'luka.mqs@gmail.com', '(11) 99941-3156', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(5, 'José de Alencar', '222.222.222-22', 'jose.alencar@edu.br', '(21) 91111-1111', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(6, 'Machado de Assis', '000.000.000-00', 'machado.assis@edu.com', '(21) 90045-4242', '2023-11-21 00:30:54', '2023-11-21 00:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_04_170304_create_hospede_table', 1),
(6, '2023_10_04_174132_create_quarto_table', 1),
(7, '2023_10_04_181209_create_reserva_table', 1),
(8, '2023_10_11_133236_create_chales_table', 1),
(9, '2023_10_11_171238_create_espaco_table', 1),
(10, '2023_10_11_194942_create_adicional_table', 1),
(11, '2023_11_20_110522_create_ramals_table', 1),
(12, '2023_11_20_132931_create_servicos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quarto`
--

CREATE TABLE `quarto` (
  `id` bigint UNSIGNED NOT NULL,
  `numero` int NOT NULL,
  `qtd_camas` int NOT NULL,
  `descricao` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaria` double(8,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quarto`
--

INSERT INTO `quarto` (`id`, `numero`, `qtd_camas`, `descricao`, `diaria`, `foto`, `created_at`, `updated_at`) VALUES
(1, 440, 1, 'Suíte para 2 pessoas. SMART TV 50\'\' e ar condicionado', 249.99, 'q1.jpg', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(2, 103, 2, 'Quarto para até 4 pessoas. Equipado com frigobar, um banheiro e aquecedor elétrico', 299.99, 'q2.jpg', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(3, 102, 3, '1 cama de casal e duas de solteiro. Planejado para o maior conforto para famílias viajando', 399.99, 'q3.jpg', '2023-11-21 00:30:54', '2023-11-21 00:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `ramals`
--

CREATE TABLE `ramals` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsavel` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `id` bigint UNSIGNED NOT NULL,
  `hospede_id` bigint UNSIGNED DEFAULT NULL,
  `quarto_id` bigint UNSIGNED DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserva`
--

INSERT INTO `reserva` (`id`, `hospede_id`, `quarto_id`, `data_inicio`, `data_fim`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-10-04', '2023-10-10', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(2, 2, 2, '2023-10-11', '2023-10-14', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(3, 5, 1, '2023-10-04', '2023-10-10', '2023-11-21 00:30:54', '2023-11-21 00:30:54'),
(4, 3, 3, '2023-12-23', '2023-12-31', '2023-11-21 00:30:54', '2023-11-21 00:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

CREATE TABLE `servicos` (
  `id` bigint UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` double(8,2) NOT NULL,
  `responsavel` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'weber', 'weber@weber.com', NULL, '$2y$10$lSXAX8206EB7XzXZS5yZMeaC3p2ShiMkRYZE0dB.yt5E8cxsBVECW', NULL, NULL, NULL),
(2, 'hiury', 'hiury@hiury.com', NULL, '$2y$10$7djzkjFpRDue9RJC47a2X.XXwbnjt6UHwEIbu6IxwEbir6GTZbMze', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adicional`
--
ALTER TABLE `adicional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adicional_hospede_id_foreign` (`hospede_id`),
  ADD KEY `adicional_espaco_id_foreign` (`espaco_id`),
  ADD KEY `adicional_reserva_id_foreign` (`reserva_id`);

--
-- Indexes for table `chale`
--
ALTER TABLE `chale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espaco`
--
ALTER TABLE `espaco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospede`
--
ALTER TABLE `hospede`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ramals`
--
ALTER TABLE `ramals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_hospede_id_foreign` (`hospede_id`),
  ADD KEY `reserva_quarto_id_foreign` (`quarto_id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adicional`
--
ALTER TABLE `adicional`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chale`
--
ALTER TABLE `chale`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `espaco`
--
ALTER TABLE `espaco`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospede`
--
ALTER TABLE `hospede`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quarto`
--
ALTER TABLE `quarto`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ramals`
--
ALTER TABLE `ramals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adicional`
--
ALTER TABLE `adicional`
  ADD CONSTRAINT `adicional_espaco_id_foreign` FOREIGN KEY (`espaco_id`) REFERENCES `espaco` (`id`),
  ADD CONSTRAINT `adicional_hospede_id_foreign` FOREIGN KEY (`hospede_id`) REFERENCES `hospede` (`id`),
  ADD CONSTRAINT `adicional_reserva_id_foreign` FOREIGN KEY (`reserva_id`) REFERENCES `reserva` (`id`);

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_hospede_id_foreign` FOREIGN KEY (`hospede_id`) REFERENCES `hospede` (`id`),
  ADD CONSTRAINT `reserva_quarto_id_foreign` FOREIGN KEY (`quarto_id`) REFERENCES `quarto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
