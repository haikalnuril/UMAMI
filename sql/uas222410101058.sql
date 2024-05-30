SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- database: `uas222410101058`

-- ----------------------------------------------------------------------------------------------------------

-- table structure for table `roles`

CREATE TABLE `roles` (
    `id`bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- seeding database roles

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Writer'),
(3, 'Reader');

-- -----------------------------------------------------------------------------------------------------------

-- Table structure for table `admin`

CREATE TABLE `admin` (
    `id` bigint UNSIGNED NOT NULL,
    `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- seeding database admin

INSERT INTO `admin` (`id`, `name`, `user_id`) VALUES
(1, 'admin', 1);

-- ----------------------------------------------------------------------------------------------------------

-- table structure for table `writers`

CREATE TABLE `writers` (
    `id` bigint UNSIGNED NOT NULL,
    `user_id` bigint UNSIGNED NOT NULL,
    `name` varchar(255) NOT NULL,
    `phone` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- seeding database writers

INSERT INTO `writers` (`id`, `user_id`, `name`, `phone`, `created_at`) VALUES
(1, 2, 'Jetro Sulthan', '0831033410568', '2024-05-22 10:28:23'),
(2, 3, 'Haikal Nuril', '0895370577773', '2024-05-22 12:48:53');

-- ----------------------------------------------------------------------------------------------------------

-- table structure for table `readers`

CREATE TABLE `readers` (
    `id` bigint UNSIGNED NOT NULL,
    `user_id` bigint UNSIGNED NOT NULL,
    `name` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- seeding database readers

INSERT INTO `readers` (`id`, `user_id`, `name`, `created_at`) VALUES
(1, 4, 'Haikal AlKamily', '2024-05-23 06:04:05'),
(1, 5, 'Rafi Jo', '2024-05-23 07:08:40');

-- ----------------------------------------------------------------------------------------------------------

-- table structure for table `users`

CREATE TABLE `users` (
    `id` bigint UNSIGNED NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `role_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- seeding database users

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$B9x5oUtKpomXzmViL11CweTAkaKLDEo6/N/pclxnniSwqXDQQrMeO', 'admin@example.com', 1, '2024-05-20 09:28:23', '2024-05-20 09:28:23'),
(2, 'Jeje', '$2y$12$ns.mhAYJbarTI/F3wM3ZWOdveeyZupm/2ArVchCyMABImR/GVDAhy', 'jetrosulthan@gmail.com', 2, '2024-05-22 10:28:23', '2024-05-22 10:28:23'),
(3, 'nuril', '$2y$12$e1jD42aY5CvPVQdnJT0RzelcSWIBnOsST1UbkKc51F1lubPP60X46', 'haikal.nuril23@gmail.com', 2, '2024-05-22 12:48:53', '2024-05-22 12:48:53'),
(4, 'haikal', '$2y$12$YJhurfxjQn8PkBbyep2mgOp3t4ofGSNrXVvHnDr2b0mFbEbrCaXyC', 'haikalteroris@gmail.com', 3, '2024-05-23 06:04:05', '2024-05-23 06:04:05'),
(5, 'jo', '$2y$12$MjibErpURSjL.4O7Q31eDOP75oBhMpy662LBClQL1.JE/0tBmPgVW', 'rafijoe@gmail.com', 3, '2024-05-23 07:08:40', '2024-05-23 07:08:40');

