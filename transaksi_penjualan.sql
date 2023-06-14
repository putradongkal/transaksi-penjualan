-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table transaksi_penjualan.auth_activation_attempts
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_activation_attempts: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.auth_groups
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_groups: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.auth_groups_permissions
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_groups_permissions: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.auth_groups_users
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_groups_users: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.auth_logins
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_logins: ~5 rows (approximately)
INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
	(1, '::1', 'admin', NULL, '2023-06-13 16:51:54', 0),
	(2, '::1', 'admin', NULL, '2023-06-13 16:58:19', 0),
	(3, '::1', 'admin@mail.com', 1, '2023-06-13 16:58:36', 1),
	(4, '::1', 'irfan@mail.com', 1, '2023-06-13 17:01:24', 1),
	(5, '::1', 'irfan@mail.com', 1, '2023-06-14 00:48:30', 1),
	(6, '::1', 'irfan', NULL, '2023-06-14 01:53:14', 0),
	(7, '::1', 'irfan@mail.com', 1, '2023-06-14 01:53:21', 1);

-- Dumping structure for table transaksi_penjualan.auth_permissions
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_permissions: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.auth_reset_attempts
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_reset_attempts: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.auth_tokens
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_tokens: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.auth_users_permissions
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.auth_users_permissions: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_barang` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.barang: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.migrations: ~4 rows (approximately)
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1686648500, 1),
	(11, '2023-06-13-093226', 'App\\Database\\Migrations\\Supplier', 'default', 'App', 1686662409, 2),
	(12, '2023-06-13-093227', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1686662409, 2),
	(15, '2023-06-13-093253', 'App\\Database\\Migrations\\Transaksi', 'default', 'App', 1686703868, 3);

-- Dumping structure for table transaksi_penjualan.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.supplier: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_transaksi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.transaksi: ~0 rows (approximately)

-- Dumping structure for table transaksi_penjualan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table transaksi_penjualan.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'irfan@mail.com', 'irfan', '$2y$10$39EvIrEX.zzR3g.ZjUW76eNlRxRpsMFvdANG1aINE8lJXUatpR3mC', NULL, NULL, NULL, '7e0abaed5d33d7f6f1e2d6ebebef85da', NULL, NULL, 1, 0, '2023-06-13 16:57:41', '2023-06-13 16:57:41', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
