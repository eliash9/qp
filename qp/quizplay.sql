-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2023 pada 18.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizplay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_room` bigint(20) UNSIGNED NOT NULL,
  `id_quiz` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `answers`
--

INSERT INTO `answers` (`id`, `id_room`, `id_quiz`, `id_user`, `username`, `question`, `answer`, `score`, `desc`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 3, 'siswa', '<p>soal satu</p>', 'b', 1, 'benar', '2023-12-08 22:12:07', '2023-12-08 22:12:24'),
(4, 1, 1, 5, 'faqi', '<p>soal satu</p>', 'b', 1, 'benar', '2023-12-09 00:34:57', '2023-12-09 00:34:57'),
(5, 2, 2, 5, 'faqi', '<p>sddgsdg</p>', 'a', 1, 'benar', '2023-12-09 01:48:56', '2023-12-09 10:00:50'),
(6, 2, 3, 5, 'faqi', '<p>soalan kedua.. papap apapffapsfpafas fapsf asfpas</p>', 'b', 0, 'salah', '2023-12-09 07:55:11', '2023-12-09 10:00:50'),
(7, 2, 4, 5, 'faqi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet turpis. Maecenas volutpat sapien id turpis viverra, iaculis interdum arcu porttitor. In et metus ut lorem rhoncus egestas vel id leo. Mauris ullamcorper massa risus, sit amet venenatis tortor dignissim nec. Pellentesque porta est nec pulvinar pulvinar. In hac habitasse platea dictumst. Donec efficitur rutrum orci ac aliquet. Duis vel elit varius, blandit sapien eu, blandit velit. Sed consequat quam non cursus ultricies. Aliquam vitae ornare ipsum.</p>', 'b', 0, 'salah', '2023-12-09 07:55:11', '2023-12-09 09:31:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_06_19_060848_room', 1),
(13, '2023_06_19_060852_quiz', 1),
(14, '2023_06_19_060901_answer', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_room` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `a` varchar(255) DEFAULT NULL,
  `b` varchar(255) DEFAULT NULL,
  `c` varchar(255) DEFAULT NULL,
  `d` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`id`, `id_room`, `question`, `a`, `b`, `c`, `d`, `key`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>soal satu</p>', 'benar', 'salah', NULL, NULL, 'b', '', '2023-12-08 21:35:06', '2023-12-08 21:35:06'),
(2, 2, '<p>sddgsdg</p>', 'sdgsd', 'sdgs', 'sdg', 'sdg', 'a', '1702129049.png', '2023-12-09 00:35:56', '2023-12-09 06:37:29'),
(3, 2, '<p>soalan kedua.. papap apapffapsfpafas fapsf asfpas</p>', 'pilih saya', 'jangan pilih saya', NULL, NULL, 'a', '1702129381.png', '2023-12-09 06:43:01', '2023-12-09 06:43:01'),
(4, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet turpis. Maecenas volutpat sapien id turpis viverra, iaculis interdum arcu porttitor. In et metus ut lorem rhoncus egestas vel id leo. Mauris ullamcorper massa risus, sit amet venenatis tortor dignissim nec. Pellentesque porta est nec pulvinar pulvinar. In hac habitasse platea dictumst. Donec efficitur rutrum orci ac aliquet. Duis vel elit varius, blandit sapien eu, blandit velit. Sed consequat quam non cursus ultricies. Aliquam vitae ornare ipsum.</p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet turpis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet turpis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet turpis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet turpis.', 'd', '1702129497.png', '2023-12-09 06:44:57', '2023-12-09 06:44:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `code`, `room`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '236964', 'Room 1', 1, '2023-12-08 21:25:07', '2023-12-08 21:59:14'),
(2, '972591', 'room 2', 1, '2023-12-08 21:25:36', '2023-12-09 01:39:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Guru 1', 'guru1', 'guru1@email.com', NULL, '$2y$10$SDn4TKTbm2UHjfHdzGcuYOgbufJXp.gAS3r/wh7Zvf6mXQKgFBGAy', 'guru', NULL, '2023-12-08 21:20:46', '2023-12-08 21:20:46'),
(2, 'Guru 2', 'guru2', 'guru2@email.com', NULL, '$2y$10$FNgr1.7BuUYSMdf2lgp5b.DSG7vx7xjbpykd.NcCZdNa8WPvK7U9G', 'guru', NULL, '2023-12-08 21:20:46', '2023-12-08 23:18:25'),
(3, 'siswa', 'siswa', 'siswa@siswa.com', NULL, '$2y$10$SDn4TKTbm2UHjfHdzGcuYOgbufJXp.gAS3r/wh7Zvf6mXQKgFBGAy', 'pelajar', NULL, '2023-12-08 21:22:11', '2023-12-08 21:22:11'),
(5, 'faqi', 'faqi', 'faalpokemon@gmail.com', NULL, '$2y$10$bq9wkIP3C34oOMPhNXh7EO6TgQ14Ob6WCVOXEbKmV6wpesVaZA3G.', 'pelajar', NULL, '2023-12-09 00:19:47', '2023-12-09 00:19:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_id_room_foreign` (`id_room`),
  ADD KEY `answers_id_quiz_foreign` (`id_quiz`),
  ADD KEY `answers_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id_room_foreign` (`id_room`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_id_quiz_foreign` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
