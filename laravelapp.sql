-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Maj 2020, 23:23
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `laravelapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Laptopy i komputery', '2020-05-29 15:20:50', '2020-05-29 15:20:50'),
(2, 'Podzespoły komputerowe', '2020-05-29 15:20:50', '2020-05-29 15:20:50'),
(3, 'Smartfony', '2020-05-29 15:20:50', '2020-05-29 15:20:50'),
(4, 'Gaming', '2020-05-29 15:20:50', '2020-05-29 15:20:50'),
(5, 'AGD', '2020-05-29 15:20:50', '2020-05-29 15:20:50'),
(6, 'Akcesoria', '2020-05-29 15:20:50', '2020-05-29 15:20:50'),
(7, 'Konsole i gry', '2020-05-29 15:20:50', '2020-05-29 15:20:50'),
(8, 'Fotografia i wideo', '2020-05-29 15:20:50', '2020-05-29 15:20:50'),
(9, 'TV i audio', '2020-05-29 15:20:50', '2020-05-29 15:20:50');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_27_140547_create_roles_table', 1),
(4, '2020_05_27_140909_create_role_user_table', 1),
(5, '2020_05_27_155156_create_products_table', 1),
(6, '2020_05_28_153258_create_categories_table', 1),
(7, '2020_05_28_154436_add_categories_to_products', 1),
(8, '2020_05_30_201915_add_discounted_price_to_products', 2),
(9, '2020_05_30_204959_add_discounted_price_to_products', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `created_at`, `updated_at`, `category_name`, `discounted_price`) VALUES
(1, 'Samsung Galaxy s20', '3500.25', 'To jest nowy Samsung. Jest drogi ale fajny!!', '2020-05-29 15:21:39', '2020-05-30 17:58:25', 'Smartfony', NULL),
(7, 'Samsung Galaxy s10', '2800.23', 'To jest trochę starszy model Samsunga.', '2020-05-30 17:08:43', '2020-05-30 19:19:17', 'Smartfony', '2400.00'),
(8, 'Sony PlayStation 4 Slim 500GB', '1359.00', 'Poznaj mniejszą i smuklejszą konsolę PlayStation 4 Slim. Poza nowym wyglądem urządzenie oferuje graczom niesamowite wrażenia wizualne dzięki obecności grafiki HDR.', '2020-05-30 17:09:48', '2020-05-30 19:16:33', 'Konsole i gry', '1100.10'),
(10, 'Razer Kraken Essential', '189.00', 'Wejdź do gry ze słuchawkami Razer Kraken Essential.', '2020-05-30 18:32:28', '2020-05-30 18:32:28', 'Gaming', NULL),
(11, 'LG 43UM7500', '1519.00', 'Zrelaksuj się w pełni przed 43-calowym ekranem telewizora LG 43UM7500 i zapomnij o żmudnym wyszukiwaniu ulubionych treści.', '2020-05-30 18:41:03', '2020-05-30 19:13:11', 'TV i audio', '1420.20'),
(12, 'Logitech G102', '89.99', 'Genialna w swojej prostocie, zapewniająca najlepsze wrażenia z rozgrywki - Logitech G102 to myszka gamingowa, dzięki której zdominujesz pole bitwy.', '2020-05-30 18:53:25', '2020-05-30 18:53:25', 'Gaming', NULL),
(13, 'Plextor 512GB 2,5\"', '299.00', 'Seria M8V wyposażona jest w wysokiej jakości kontroler i 64-warstwowe układy 3D NAND.', '2020-05-30 19:04:44', '2020-05-30 19:04:44', 'Podzespoły komputerowe', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-05-29 15:20:04', '2020-05-29 15:20:04'),
(2, 'user', '2020-05-29 15:20:04', '2020-05-29 15:20:04');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.pl', NULL, '$2y$10$ybxZbvDJd8OrNjXOb8Lbw.qgCxi4EWY4gpl.unz03KSS9dwBXyEsS', NULL, '2020-05-29 15:20:05', '2020-05-29 15:20:05'),
(2, 'user', 'user@user.pl', NULL, '$2y$10$WQbrId4loSV2LyTYd3QI/eBaCUQYmGBkL/du214mP7aoLKFjv6KLC', NULL, '2020-05-29 15:20:05', '2020-05-29 15:20:05');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
