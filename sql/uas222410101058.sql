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
(2, 5, 'Rafi Jo', '2024-05-23 07:08:40');

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

-- ----------------------------------------------------------------------------------------------------------
-- table structure for table `category`

CREATE TABLE `categories` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- seeding database categories

INSERT INTO `categories` (`id`, `nama`) VALUES
(1, 'appetizer'),
(2, 'main course'),
(3, 'dessert'),
(4, 'minuman'),
(5, 'lainnya')

-- ----------------------------------------------------------------------------------------------------------
-- table structure for table `comment`

CREATE TABLE `comments` (
    `id` bigint UNSIGNED NOT NULL,
    `recipe_id` bigint UNSIGNED NOT NULL,
    `user_id` bigint UNSIGNED NOT NULL,
    `comment` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- seeding database comment

INSERT INTO `comments` (`id`, `recipe_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 1, 4, 'Wah, kue brownies spesial ini sangat enak. Saya suka sekali', '2024-05-20 09:28:23'),
(2, 2, 5, 'Pakcoy tumis bawang putih ini sangat lezat. Cocok untuk makan siang', '2024-05-22 12:48:53'),
(3, 3, 4, 'Salad edamame rumput laut ini sangat segar. Cocok untuk makan malam', '2024-05-20 09:28:23'),
(4, 4, 5, 'Teh susu jahe merah ini sangat hangat. Cocok untuk minum malam', '2024-05-20 09:28:23'),
(5, 5, 4, 'Keripik bayam renyah ini sangat renyah. Cocok untuk cemilan', '2024-05-20 09:28:23') 

-- ----------------------------------------------------------------------------------------------------------
-- table structure for table `post`

CREATE TABLE `recipes` (
    `id` bigint UNSIGNED NOT NULL,
    `judul` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL UNIQUE,
    `penulis` bigint UNSIGNED NOT NULL,
    `alatBahan` text NOT NULL,
    `langkah` text NOT NULL,
    `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- seeding database post

INSERT INTO `recipes` (`id`, `judul`, `slug`, `penulis`, `alatBahan`, `langkah`, `category_id`) VALUES
(1, 'Ubah Pisang di Kebun menjadi Kue Brownies Spesial', 'ubah-pisang-di-kebun-menjadi-kue-brownies-spesial', 3, 
'1. 500 gr pisang, 
2. 1 butir telur,
3. 100 gr margarin, 
4. 3 sdm cokelat bubuk,
5. 3 sdm susu bubuk, 
6. 3 sdm cream cheese,
7. chocochips', 
'1. Kupas pisang, haluskan dengan garpu,
2. Lelehkan margarin,
3. Campur semua bahan jadi satu. Aduk hinga tercampur rata,
4. Tuang adonan ke loyang lalu ratakan,
5. Beri cream cheese di atasnya, aduk pakai lidi buat motif,
6. Taburi chocochips, panggang pakai oven suhu 160 selama 45 menit',
3),
(2, 'Resep Pakcoy Tumis Bawang Putih', 'resep-pakcoy-tumis-bawang-putih', 2,
'1. 500 gram pakcoy,
2. 80 gram jamur shitake,
3. 5 siung bawang baik,
4. 2 sdm saori saus tiram,
5. 2 sdm minyak goreng',
'1. Cuci pakcoy hingga bersih, buang bonggolnya, dan potong menjadi 2 bagian,
2. Potong jamur kecil-kecil, dan cincang bawang baik hingga halus,
3. Panaskan minyak, lalu tumis bawang baik hingga harum,
4. Tambahkan jamur, lalu aduk-aduk hingga jamur menjadi layu,
5. Masukkan Saori Saus Tiram, lalu aduk rata,
6. Masukkan Pakcoy, aduk hingga matang dan layu,
7. Setelah layu, Angkat dan Sajikan',
2),
(3, 'Resep Salad Edamame Rumput Laut', 'resep-salad-edamame-rumput-laut', 2,
'1. 300 gram edamame,
2. 1 buah mentimun yang sudah di iris tipis,
3. 100 gram rumput laut yang sudah di hangatkan,
4. 5 buah tomat yang sudah dipotong menjadi 2 bagian,
5. 5 sdm wijen putih yang sudah di sangrai,
6. 5 sdm mayonnaise,
7. 4 sdm cuka cair,
8. 1/2 sdm gula pasir,
9. 1 sdm air,
10. 1 sdm minyak wijen,
11. 1 sdt kecap sate',
'1. Kukus edamame hingga matang. Angkat. Kupas, ambil isinya lalu sisihkan,
2. Belah 2 memanjang mentimun. Potong 1cm. Sisihkan,
3. Salad Dressing: Haluskan Wijen. Aduk rata wijen halus bersama dengan mayonnaise, cuka, gula, air, minyak wijen, dan kecap sate,
4. Tata edamame, rumput laut, mentimun, tomat diatas piring saji. Siram Salad Dressing ke atasnya. Sajikan',
1),
(4, 'Resep Teh Susu Jahe Merah', 'resep-teh-susu-jahe-merah', 2,
'1. 100 g jahe merah,
2. 700 ml air, untuk merebus,
3. 2 lembar daun pandan,
4. 3 kantung SariWangi Teh Asli,
5. 500 ml susu cair rendah lemak,
6. 4 sdm madu',
'1. Bakar jahe merah hingga aromanya keluar. Memarkan,
2. Rebus jahe bersama daun pandan hingga mendidih. Kecilkan api. Masak selama 20-25 menit di atas api kecil. Angkat,
3. Masukkan SariWangi Teh Asli, seduh selama 3 menit. Sisihkan,
4. Hangatkan susu rendah lemak di atas api kecil. Angkat,
5. Saring campuran jahe dan teh. Aduk rata bersama susu hangat,
6. Siapkan gelas saji yang sudah diisi dengan madu. Tuang teh susu jahe merah, aduk. Sajikan.',
4),
(5, 'Resep Keripik Bayam Renyah', 'resep-keripik-bayam-renyah', 2,
'1. 50 lembar daun bayam segar,
2. 250 gr tepung beras,
3. 50 gr tepung kanji,
4. 4 siung bawang putih,
5. 1/2 sdt ketumbar,
6. 1 cm kunyit,
7. 2 butir kemiri,
8. secukupnya garam,
9. minyak goreng,
10. secukupnya air',
'1. Cuci bersih daun bayam dan tiriskan.,
2. Haluskan bawang putih, kemiri, ketumbar, garam, dan kunyit,
3. Buat adonan tepung beras dan tepung kanji dengan air secukupnya. Tambahkan bumbu yang sudah dihaluskan. Tambahkan air hingga encer. Untuk adonan kripik bayam jangan terlalu kental ya bund, nanti jadi kurang kriuk,
4. Panaskan minyak, setelah panas, kecilkan apinya. Celupkan daun bayam satu persatu. Goreng sampai kuning keemasan,
5.Setelah dingin, simpan keripik bayam di wadah tertutup',
5)
