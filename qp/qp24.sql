/*
SQLyog Community
MySQL - 10.4.28-MariaDB : Database - quizplay
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `answers` */

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_room` bigint(20) unsigned NOT NULL,
  `id_quiz` bigint(20) unsigned NOT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_id_room_foreign` (`id_room`),
  KEY `answers_id_quiz_foreign` (`id_quiz`),
  KEY `answers_id_user_foreign` (`id_user`),
  CONSTRAINT `answers_id_quiz_foreign` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE CASCADE,
  CONSTRAINT `answers_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  CONSTRAINT `answers_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `answers` */

insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (50,1,1,9,'eliash','<p>1+2</p>','d',0,'salah','2023-12-18 08:57:58','2023-12-18 08:57:58',NULL);
insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (51,1,2,9,'eliash','<p>benar apa salah</p>','b',0,'salah','2023-12-18 08:57:58','2023-12-18 08:57:58',NULL);
insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (52,1,5,9,'eliash','<p>benar apa salah</p>','b',0,'salah','2023-12-18 08:57:59','2023-12-18 08:57:59',NULL);
insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (53,3,8,6,'ilmi','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','b',0,'salah','2023-12-19 03:56:46','2023-12-19 03:56:46',NULL);
insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (54,3,11,6,'ilmi','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','b',0,'salah','2023-12-19 03:56:46','2023-12-19 03:56:46',NULL);
insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (55,3,12,6,'ilmi','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','a',1,'benar','2023-12-19 03:56:46','2023-12-19 03:56:46',NULL);
insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (67,4,13,9,'eliash','<p>dfhdfhdf</p>','a',-211,'salah','2024-03-07 03:20:14','2024-03-07 03:20:14',NULL);
insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (68,3,8,10,'yovi','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','a',1433,'benar','2024-03-07 06:20:09','2024-03-07 06:20:09',NULL);
insert  into `answers`(`id`,`id_room`,`id_quiz`,`id_user`,`username`,`question`,`answer`,`score`,`desc`,`created_at`,`updated_at`,`duration`) values (69,3,12,10,'yovi','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','a',1433,'benar','2024-03-07 06:20:09','2024-03-07 06:20:09',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jawabans` */

DROP TABLE IF EXISTS `jawabans`;

CREATE TABLE `jawabans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `jawaban_pengguna` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jawabans_pertanyaan_id_foreign` (`pertanyaan_id`),
  KEY `jawabans_user_id_foreign` (`user_id`),
  CONSTRAINT `jawabans_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaans` (`id`),
  CONSTRAINT `jawabans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jawabans` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_100000_create_password_reset_tokens_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2019_08_19_000000_create_failed_jobs_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2019_12_14_000001_create_personal_access_tokens_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2023_06_19_060848_room',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2023_06_19_060852_quiz',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2023_06_19_060901_answer',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (8,'2023_12_01_023328_create_pertanyaans_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (9,'2023_12_01_032449_create_jawabans_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `pertanyaans` */

DROP TABLE IF EXISTS `pertanyaans`;

CREATE TABLE `pertanyaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pertanyaans` */

/*Table structure for table `queue_participants` */

DROP TABLE IF EXISTS `queue_participants`;

CREATE TABLE `queue_participants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `room_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `fk_queue_participants_room_id` (`room_id`),
  KEY `fk_queue_participants_user_id` (`user_id`),
  KEY `id` (`id`),
  CONSTRAINT `fk_queue_participants_room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  CONSTRAINT `fk_queue_participants_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `queue_participants` */

insert  into `queue_participants`(`id`,`user_id`,`room_id`,`created_at`,`updated_at`) values (1,9,4,'2024-03-07 03:19:43','2024-03-07 03:19:43');
insert  into `queue_participants`(`id`,`user_id`,`room_id`,`created_at`,`updated_at`) values (2,10,3,'2024-03-07 05:25:02','2024-03-07 05:25:02');
insert  into `queue_participants`(`id`,`user_id`,`room_id`,`created_at`,`updated_at`) values (3,10,3,'2024-03-07 05:29:50','2024-03-07 05:29:50');

/*Table structure for table `quiz` */

DROP TABLE IF EXISTS `quiz`;

CREATE TABLE `quiz` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_room` bigint(20) unsigned NOT NULL,
  `question` text NOT NULL,
  `a` varchar(255) DEFAULT NULL,
  `b` varchar(255) DEFAULT NULL,
  `c` varchar(255) DEFAULT NULL,
  `d` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id_room_foreign` (`id_room`),
  CONSTRAINT `quiz_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `quiz` */

insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (1,1,'<p>1+2</p>','1','2','3','4','a','1701655791.jpg','2023-12-04 02:09:51','2023-12-04 02:09:51');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (2,1,'<p>benar apa salah</p>','salah','benar',NULL,NULL,'a','','2023-12-06 05:05:05','2023-12-06 05:05:05');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (3,2,'<p>salah apa bener</p>\r\n\r\n<p>jawab saja benar</p>\r\n\r\n<p>&nbsp;</p>','salah','benar',NULL,NULL,'b','','2023-12-12 04:19:49','2023-12-12 04:19:49');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (4,2,'<p>1+2</p>','1','2','3','4','a','1701655791.jpg','2023-12-04 02:09:51','2023-12-04 02:09:51');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (5,1,'<p>benar apa salah</p>','salah','benar',NULL,NULL,'a','','2023-12-06 05:05:05','2023-12-06 05:05:05');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (6,2,'<p>salah apa bener</p>\r\n\r\n<p>jawab saja benar</p>\r\n\r\n<p>&nbsp;</p>','salah','benar',NULL,NULL,'b','','2023-12-12 04:19:49','2023-12-12 04:19:49');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (7,2,'<p>1+2</p>','1','2','3','4','a','1701655791.jpg','2023-12-04 02:09:51','2023-12-04 02:09:51');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (8,3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem ipsum dolor sit amet,','Lorem ipsum dolor sit amet,',NULL,NULL,'a','1702365312.jpg','2023-12-12 07:15:12','2023-12-12 07:15:12');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (9,1,'<p>benar apa salah</p>','salah','benar',NULL,NULL,'a','','2023-12-06 05:05:05','2023-12-06 05:05:05');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (10,2,'<p>salah apa bener</p>\r\n\r\n<p>jawab saja benar</p>\r\n\r\n<p>&nbsp;</p>','salah','benar',NULL,NULL,'b','','2023-12-12 04:19:49','2023-12-12 04:19:49');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (11,3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem ipsum dolor sit amet,','Lorem ipsum dolor sit amet,',NULL,NULL,'a','1702365312.jpg','2023-12-12 07:15:12','2023-12-12 07:15:12');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (12,3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','Lorem ipsum dolor sit amet,','Lorem ipsum dolor sit amet,',NULL,NULL,'a','1702365312.jpg','2023-12-12 07:15:12','2023-12-12 07:15:12');
insert  into `quiz`(`id`,`id_room`,`question`,`a`,`b`,`c`,`d`,`key`,`image`,`created_at`,`updated_at`) values (13,4,'<p>dfhdfhdf</p>','salah','benar',NULL,NULL,'b','','2024-03-07 03:11:48','2024-03-07 03:11:48');

/*Table structure for table `rooms` */

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start` timestamp NULL DEFAULT NULL,
  `end` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rooms` */

insert  into `rooms`(`id`,`code`,`room`,`is_active`,`created_at`,`updated_at`,`start`,`end`) values (1,'934563','mtk',1,'2023-12-04 02:08:33','2024-03-07 03:00:35',NULL,NULL);
insert  into `rooms`(`id`,`code`,`room`,`is_active`,`created_at`,`updated_at`,`start`,`end`) values (2,'812862','room 2',1,'2023-12-07 10:10:16','2023-12-12 04:51:04',NULL,NULL);
insert  into `rooms`(`id`,`code`,`room`,`is_active`,`created_at`,`updated_at`,`start`,`end`) values (3,'181515','room 3',1,'2023-12-12 07:13:24','2024-03-07 06:19:02','2024-03-07 06:19:02',NULL);
insert  into `rooms`(`id`,`code`,`room`,`is_active`,`created_at`,`updated_at`,`start`,`end`) values (4,'948908','bbb',0,'2024-03-07 03:11:19','2024-03-07 03:20:38',NULL,'2024-03-07 04:20:38');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (1,'Guru 1','guru1','guru1@email.com',NULL,'$2y$10$LVHMBMUDQiW/sgUk5NzckeeW.5vH0Wx3o1l9v9CROncbD9NZKQApq','admin',NULL,'2023-12-04 02:03:11','2023-12-04 02:03:11',NULL);
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (2,'Guru 2','guru2','guru2@email.com',NULL,'$2y$10$LVHMBMUDQiW/sgUk5NzckeeW.5vH0Wx3o1l9v9CROncbD9NZKQApq','guru',NULL,'2023-12-04 02:03:11','2023-12-04 02:03:11',NULL);
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (3,'user','user','user@user.com',NULL,'$2y$10$LVHMBMUDQiW/sgUk5NzckeeW.5vH0Wx3o1l9v9CROncbD9NZKQApq','siswa',NULL,'2023-12-04 02:05:25','2023-12-19 04:33:27',NULL);
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (4,'pelajar','pelajar','pelajar@gmail.com',NULL,'$2y$10$zTLfX89loDL9V08eh1aETO4TmY2.pVtc3g7.Y.eUJGq4BCSrr/5A2','pelajar',NULL,'2023-12-07 09:50:34','2023-12-07 09:50:34',NULL);
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (6,'ilmi suara','ilmi','ilmisuara@gmail.com',NULL,'$2y$10$lUaWbVoIBU/vozfDaDoUUeVxMw3fTAwB5BNt3Q5LuZyUp9B9P.jCK','guru',NULL,'2023-12-12 03:55:38','2023-12-19 04:34:27','https://lh3.googleusercontent.com/a/ACg8ocL8f26Wk8bFbbmBrZy2WYe9vOUmHYKSWtYPUeL6SdEnrw=s96-c');
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (9,'Eliash el Hasan','eliash','redoolf@gmail.com',NULL,'$2y$10$9Cb1dXoFSD9k7afnBygdQeC.Uy7Pf0QG26A2PkvjH6CZuXOwd4tfW','pelajar',NULL,'2023-12-12 04:20:35','2023-12-12 04:20:35','https://lh3.googleusercontent.com/a/ACg8ocL8f26Wk8bFbbmBrZy2WYe9vOUmHYKSWtYPUeL6SdEnrw=s96-c');
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (10,'tsanawi ilyas','yovi','tsanawiilyas@gmail.com',NULL,'$2y$10$ZRjClfJuWHG76XYNxKal2evEhfAITV15DZuZxyzirJrf9fS7g4y7K','pelajar',NULL,'2023-12-12 06:01:29','2023-12-12 06:01:29',NULL);
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (11,'BMN Berkah Manfaat Nusantara','bmn','bermantra@gmail.com',NULL,'$2y$10$eCdeIJIxH.O.0Y1PKxinRO0b/OBnkqK065dPDpm9t/A3GpH94y6ae','admin',NULL,'2023-12-13 04:54:16','2023-12-19 04:37:51',NULL);
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (15,'ilyas hasan','ilyas','elmasrury@gmail.com',NULL,'$2y$10$mSfSI7e4G47AnQc3OdDIte82JGcqRpwu19A.eH2bQr62mbE7/GiCC','pelajar',NULL,'2024-03-06 09:27:14','2024-03-06 09:27:14',NULL);
insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`role`,`remember_token`,`created_at`,`updated_at`,`avatar`) values (18,'casper trans','casper','caspertrans.com@gmail.com',NULL,'$2y$10$6JTTIR7zvTEQX83xt/Gnre1YpaAOlssKpY5iIX02xYNWPs0GIC6qS','pelajar',NULL,'2024-03-07 10:28:32','2024-03-07 10:28:32','https://lh3.googleusercontent.com/a/ACg8ocL8f26Wk8bFbbmBrZy2WYe9vOUmHYKSWtYPUeL6SdEnrw=s96-c');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
