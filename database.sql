-- Jalankan melalui phpMyAdmin (tab SQL) atau MySQL CLI.
-- Hanya untuk database latihan lokal; data contoh dapat diganti.
CREATE DATABASE IF NOT EXISTS db_lab9web
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_lab9web;

CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  telepon VARCHAR(25) NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data demonstrasi: hindari menjalankan INSERT berulang pada database yang sama.
INSERT IGNORE INTO users (nama, email, telepon) VALUES
('Andi Pratama', 'andi@example.test', '081234567890'),
('Dina Lestari', 'dina@example.test', '081298765432'),
('Siti Rahma', 'siti@example.test', NULL);
