CREATE DATABASE IF NOT EXISTS `sso-basic`;
USE `sso-basic`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `created_at` DATETIME NOT NULL
);

-- Insert test user (password: test123)
INSERT INTO `users` (`username`, `password`, `email`, `created_at`) 
VALUES ('test', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'test@example.com', NOW()); 