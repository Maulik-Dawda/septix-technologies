-- Septix Technologies - Complete Database Schema & Initial Data Dump
-- Suitable for phpMyAdmin / MySQL 5.7+ / 8.0+

CREATE DATABASE IF NOT EXISTS `septix_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `septix_db`;

-- --------------------------------------------------------
-- Table structure for `admin_users`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(80) NOT NULL UNIQUE,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `role` VARCHAR(30) DEFAULT 'admin',
  `mfa_secret` VARCHAR(100) DEFAULT NULL,
  `mfa_enabled` TINYINT(1) DEFAULT 0,
  `status` VARCHAR(20) DEFAULT 'active',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_login` DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Initial Admin Account (username: admin, password: SeptixAdmin@2026)
INSERT INTO `admin_users` (`username`, `email`, `password_hash`, `role`, `status`) VALUES
('admin', 'admin@septixtechnologies.com', '$2y$10$Wq2.O3k6b3P7z0zK3P7z0uOqJ4x4X1v8z2w3P4z5P6z7P8z9P0z1', 'superadmin', 'active')
ON DUPLICATE KEY UPDATE `id`=`id`;

-- --------------------------------------------------------
-- Table structure for `blogs`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `slug` VARCHAR(200) NOT NULL UNIQUE,
  `title` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `author` VARCHAR(100) DEFAULT 'Septix Editorial Team',
  `image` VARCHAR(255) NOT NULL,
  `summary` TEXT NOT NULL,
  `content` LONGTEXT NOT NULL,
  `read_time` VARCHAR(50) DEFAULT '5 min read',
  `views` INT DEFAULT 0,
  `status` VARCHAR(20) DEFAULT 'published',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `otp_tokens`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `otp_tokens` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `otp_code` VARCHAR(10) NOT NULL,
  `type` VARCHAR(30) NOT NULL,
  `expires_at` DATETIME NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `login_attempts`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ip_address` VARCHAR(45) NOT NULL,
  `username` VARCHAR(100) DEFAULT NULL,
  `attempted_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `success` TINYINT(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
